<?php

class Redireccion {

    var $url = 'http://127.0.0.1';

    public static function DireccionarVista($modelo, $funcion) {
        $url = 'http://127.0.0.1';
        header("Location: " . $url . "/comedor/Vista/" . $modelo . "/" . $funcion . ".php");
    }

    public static function DireccionarControlador($modelo, $funcion=NULL) {
        $url = 'http://127.0.0.1';
        header("Location: " . $url . "/comedor/Controlador/" . $modelo . "Controller.php");
    }

}

?>
