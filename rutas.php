<?php

include 'configuracion/Redireccion.php';
session_start();
if (isset($_POST['Modelo'])) {
    $aux = explode("/", $_POST['Modelo']);
    $_SESSION['modelo'] = $aux[0];
    $_SESSION['comportamiento'] = $comportamiento = $aux[1];

    if (isset($_POST['campos'])) {
	unset($_POST['campos']["enviar_formulario"]);
        unset($_POST['campos']["Modelo"]);
	$campos = $_POST['campos'];

	foreach ($campos as $key => $value) {
	    if (intval($value))
		$campos[$key] = intval($value);
	}
    } else {
	$campos = NULL;
    }

    $arreglo_condiciones = array();
    $condiciones = explode(",", $aux[2]);
    if (!empty($condiciones)) {
	foreach ($condiciones as $key => $value) {
	    $aux = explode(":", $value);
	    if (!empty($aux[0])) {
		$arreglo_condiciones[$aux[0]] = $aux[1];
	    }
	}
    }
    $_SESSION['condiciones'] = $arreglo_condiciones;
    $_SESSION['campos'] = $campos;
    Redireccion::DireccionarControlador($_SESSION['modelo']);
}
?>