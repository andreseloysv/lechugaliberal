<?php

include_once 'Dao.php';

class ModeloAplicacion {

    var $Dao;
    var $modelo;

    function Mostrar($campos, $modelo, $condiciones) {
        $this->Dao = new Dao();
        $this->$modelo = $this->Dao->carga_modelo($modelo);
        return $this->Dao->conexion_base_datos->consulta($campos, array(strtolower($this->$modelo)), $condiciones);
    }
    function Agregar($campos, $modelo) {
        $this->Dao = new Dao();
        $this->$modelo = $this->Dao->carga_modelo($modelo);
        return $this->Dao->conexion_base_datos->insertar($campos, array(strtolower($this->$modelo)));
    }

}

?>
