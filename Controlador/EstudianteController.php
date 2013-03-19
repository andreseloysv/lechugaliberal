<?php

include '../ControladorAplicacion.php';

class EstudianteController extends ControladorAplicacion {

    function agregar_estudiante($campos=  array(), $modelos=  array()) {
        $this->agregar($campos,$modelos);
        Redireccion::DireccionarVista("default", "dialogo_respuesta");
    }

}

$estudiante = new EstudianteController();
if (method_exists($estudiante, $_SESSION['comportamiento'])) {
    $estudiante->$_SESSION['comportamiento']($_SESSION['campos'], $_SESSION['modelo'], $_SESSION['condiciones']);
}
?>
