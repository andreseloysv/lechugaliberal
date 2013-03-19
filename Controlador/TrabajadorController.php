<?php
include '../ControladorAplicacion.php';

class TrabajadorController extends ControladorAplicacion {

    function agregar_trabajador($campos = array(), $modelos = array()) {
	$this->agregar($campos, $modelos);
	Redireccion::DireccionarVista("default", "dialogo_respuesta");
    }

}

$trabajador = new TrabajadorController();
if (method_exists($trabajador, $_SESSION['comportamiento'])) {
$trabajador->$_SESSION['comportamiento']($_SESSION['campos'], $_SESSION['modelo'], $_SESSION['condiciones']);
}
?>