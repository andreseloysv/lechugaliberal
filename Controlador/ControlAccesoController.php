<?php

include '../ControladorAplicacion.php';
include_once '../Modelo/ControlAcceso.php';

class ControlAccesoController extends ControladorAplicacion {

    function __construct() {
        
    }

    function buscar_usuario($campos, $modelo, $condiciones) {
        $datos = $this->buscar($campos, "Estudiante", $condiciones);
        $_SESSION['respuesta'] = $datos;
        if (empty($datos['respuesta'])) {
            $_SESSION['respuesta']['respuesta'] = array();
            $datos = $this->buscar($campos, "Trabajador", $condiciones);
            unset($_SESSION['respuesta']);
            $_SESSION['respuesta'] = $datos;
            if (empty($datos['respuesta'])) {
                $_SESSION['respuesta']['respuesta'] = array();
            }
        }
        Redireccion::DireccionarVista("ControlAcceso", "buscar_usuario");
    }
}

$control_acceso = new ControlAccesoController();
if (method_exists($control_acceso, $_SESSION['comportamiento'])) {
    $control_acceso->$_SESSION['comportamiento']($_SESSION['campos'], $_SESSION['modelo'], $_SESSION['condiciones']);
}
?>
