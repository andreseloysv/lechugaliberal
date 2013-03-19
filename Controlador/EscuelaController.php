<?php

include '../ControladorAplicacion.php';

class EscuelaController extends ControladorAplicacion {

    function agregar_escuela($campos = array(), $modelos = array()) {
	$this->agregar($campos, $modelos);
	Redireccion::DireccionarVista("default", "dialogo_respuesta");
    }

    function buscar_escuela($campos, $modelo, $condiciones) {
	$datos = $this->buscar($campos, "Escuela", $condiciones);
	$_SESSION['respuesta'] = $datos;
	if (empty($datos['respuesta'])) {
	    $_SESSION['respuesta']['respuesta'] = array();
	}
	Redireccion::DireccionarVista("Escuela", "buscar_escuela");
    }

}

$escuela = new EscuelaController();
if (method_exists($escuela, $_SESSION['comportamiento'])) {
    $escuela->$_SESSION['comportamiento']($_SESSION['campos'], $_SESSION['modelo'], $_SESSION['condiciones']);
}
?>
