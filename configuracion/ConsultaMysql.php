<?php

include 'BaseDatos.php';

class ConsultaMysql {

    var $conexion;
    var $BaseDatos;
    var $respuesta;

    public function __construct() {
	$this->BaseDatos = new BaseDatos();
    }

    function conectar() {
	$this->conexion = mysql_connect($this->BaseDatos->servidor, $this->BaseDatos->nombre, $this->BaseDatos->clave);
	if (!$this->conexion) {
	    die('No se puede conectar: ' . mysql_error());
	}
	$db_selected = mysql_select_db('comedor', $this->conexion);
	if (!$db_selected) {
	    die('Can\'t use comedor : ' . mysql_error());
	}
    }

    function limpia_cadena($cadena) {
	str_replace("-", " ", $cadena);
	return $cadena;
    }

    function valida_columnas($tabla, $columnas = array()) {
	$columnas_validas = array();
	$this->conectar();
	$query = "SELECT * FROM " . $this->limpia_cadena($tabla);
	$result = mysql_query($query, $this->conexion);
	$numero_resultados = mysql_num_fields($result);
	$interador = 0;
	while ($numero_resultados > $interador) {
	    $columnas_validas[] = mysql_field_name($result, $interador);
	    $interador++;
	}

	if (count(array_intersect(array_keys($columnas), $columnas_validas)) == count($columnas))
	    return TRUE;
	else
	    return FALSE;
    }

    function insertar($campos = array(), $tablas = array(), $columnas = array()) {
	$this->conectar();
	$this->respuesta = array();
	$this->respuesta['error'] = '';
	$this->respuesta['consulta_sql'] = '';
	$this->respuesta['respuesta'] = array();

	$query = "INSERT INTO ";
	foreach ($tablas as $key => $value) {
	    $query .= $this->limpia_cadena($value) . " ";
	}

	if ((!empty($campos)) && ($this->valida_columnas($tablas[0], $campos))) {
	    $query .=" ( ";
	    $contador = 1;
	    $cantidad_campos = count($campos);
	    foreach ($campos as $key => $value) {
		if ($cantidad_campos > $contador) {
		    $query .= $this->limpia_cadena($key) . ", ";
		} else {
		    $query .= $this->limpia_cadena($key);
		}
		$contador++;
	    }
	    $query .=" ) ";


	    $query .="VALUES (";
	    $contador = 1;
	    foreach ($campos as $key => $value) {
		if ($cantidad_campos > $contador) {
		    $query .= "'" . $this->limpia_cadena($value) . "', ";
		} else {
		    $query .= "'" . $this->limpia_cadena($value) . "'";
		}
		$contador++;
	    }
	    $query .=" ) ";
	} else {
	    return $this->respuesta['error'][] = "No hay camos o valores.";
	}
	$this->respuesta['consulta_sql'] = $query;

	$result = mysql_query($query, $this->conexion);

	if ($result === TRUE) {
	    return $this->respuesta['DDL'] = 'Operacion realizada con exito.';
	} elseif ($result === FALSE) {
	    if (mysql_errno() === 1062) {
		return $this->respuesta['error'][] ="El usuario ya esta registrado.";
	    }
	    else
		return $this->respuesta['error'][] ="No se encotraron datos.";
	}
	return $this->respuesta['respuesta'][] = "Se guardo con exito.";
    }

    function consulta($campos = array(), $tablas = array(), $condiciones = array()) {
	$this->conectar();
	$this->respuesta = array();
	$this->respuesta['error'] = array();
	$this->respuesta['consulta_sql'] = '';
	$this->respuesta['respuesta'] = array();

	$query = "SELECT ";
	if (empty($campos)) {
	    $query .=" * ";
	} else {
	    foreach ($campos as $key => $value) {
		$query .= $this->limpia_cadena($value) . " ";
	    }
	}
	$query .="FROM ";
	foreach ($tablas as $key => $value) {
	    $query .= $this->limpia_cadena($value) . " ";
	}


	if (!empty($condiciones)) {
	    $query .="WHERE ";
	    $contador = 1;
	    $tamano_arreglo = count($condiciones);
	    foreach ($condiciones as $key => $value) {
		if ($contador < $tamano_arreglo) {
		    $query .= $key . "=" . $this->limpia_cadena($value) . " and ";
		} else {
		    $query .= $key . "=" . $this->limpia_cadena($value);
		}
		$contador++;
	    }
	}
	$this->respuesta['consulta_sql'] = $query;
	$result = mysql_query($query, $this->conexion);
	if ($result === TRUE) {
	    $this->respuesta['DDL'] = 'Operacion realizada con exito.';
	} elseif ($result === FALSE) {
	    $this->respuesta['error'][] = "No se encotraron datos.";
	} else {
	    if (mysql_num_rows($result) == 0) {
		$this->respuesta['error'][] = "Por favor registrese.";
	    } else {
		while ($row = mysql_fetch_assoc($result)) {
		    $this->respuesta['respuesta'][] = $row;
		}
	    }
	}
	return $this->respuesta;
    }

}

?>