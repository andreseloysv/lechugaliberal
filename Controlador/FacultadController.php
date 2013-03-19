<?php

include '../ControladorAplicacion.php';

class FacultadController extends ControladorAplicacion {

    function agregar_facultad($campos = array(), $modelos = array()) {
	$this->agregar($campos, $modelos);
	Redireccion::DireccionarVista("default", "dialogo_respuesta");
    }

    function buscar_facultad($campos, $modelo, $condiciones) {
	$datos = $this->buscar($campos, "Facultad", $condiciones);
	$_SESSION['respuesta'] = $datos;
	if (empty($datos['respuesta'])) {
	    $_SESSION['respuesta']['respuesta'] = array();
	}
	Redireccion::DireccionarVista("Facultad", "buscar_facultad");
    }

}

$facultad = new FacultadController();
if (method_exists($facultad, $_SESSION['comportamiento'])) {
    $facultad->$_SESSION['comportamiento']($_SESSION['campos'], $_SESSION['modelo'], $_SESSION['condiciones']);
}
?>
