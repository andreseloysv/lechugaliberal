<?php

include 'ModeloAplicacion.php';
session_start();

class ControladorAplicacion {

    var $modelo = array();
    var $respuesta = array();
    var $dao;

    public function agregar($campos=  array(), $modelos=  array()) {
        unset($_SESSION['respuesta']);
        $this->dao = new Dao();
        $modelos = explode(',', $modelos);
        foreach ($modelos as $key => $modelo) {
            $this->dao->carga_modelo($modelo);
            $this->modelo = new $modelo();
            $this->respuesta = $this->modelo->Agregar($campos, $modelo);
            $_SESSION['respuesta']=$this->respuesta;
            return $this->respuesta;
        }
    }

        public static function mostrar($campos, $modelo, $condiciones) {
        $this->dao = new Dao();
        $this->dao->carga_modelo($modelo);
        $this->modelo = new $modelo();
        $this->respuesta = $this->modelo->Mostrar($campos, $modelo, $condiciones);
        $_SESSION['respuesta'] = $this->respuesta;
        Redireccion::Direccionar($this->modelo, "mostrar");
    }

    public function buscar($campos, $modelos, $condiciones) {
        $this->dao = new Dao();
        $modelos = explode(',', $modelos);
        foreach ($modelos as $key => $modelo) {
            $this->dao->carga_modelo($modelo);
            $this->modelo = new $modelo();
            $this->respuesta = $this->modelo->Mostrar($campos, $modelo, $condiciones);
            return $this->respuesta;
        }
    }

}

?>