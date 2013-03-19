<?php

include '../../configuracion/Redireccion.php';
include '../../Modelo/Error.php';
session_start();

function IsAjax() {
    if (isset($_SERVER['HTTP_X_REQUESTED_WITH'])
            && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
        return TRUE;
    } else {
        return FALSE;
    }
}

if (!IsAjax()) {
    $_SESSION['css'] = array();
    $_SESSION['js'] = array();
    $nucleo = new Nucleo();
}

class Nucleo {

    public $directorio = "Modelo";
    public $direccion_css = "../../css/";
    public $direccion_js = "../../js/";
    public $direccion_plugins = "../../plugins/";

    function __construct() {
        $this->carga_css_plugins();
        $this->carga_js_plugins();
        $this->carga_css();
        $this->carga_js();
    }

    public function carga_css() {
        $key = 0;
        $directorio = opendir($this->direccion_css);
        while ($archivo = readdir($directorio)) {
            if (($archivo != ".") && ($archivo != "..")) {
                $archivo = explode(".", $archivo);
                $extension = $archivo[1];
                $nombre = $archivo[0];
                if ($extension === "css") {
                    echo$_SESSION['css'][$key] = stripslashes(addslashes("<link href='" . $this->direccion_css . $nombre . ".css' rel='stylesheet' type='text/css'>"));
                    $key++;
                }
            }
        }
        closedir($directorio);
    }

    public function carga_js() {
        $key = 0;
        $directorio = opendir($this->direccion_js);
        while ($archivo = readdir($directorio)) {
            if (($archivo != ".") && ($archivo != "..")) {
                $archivo = explode(".", $archivo);
                $extension = $archivo[1];
                $nombre = $archivo[0];
                if ($extension == "js") {
                    echo$_SESSION['js'][] = stripslashes(addslashes('<script src="' . $this->direccion_js . $nombre . '.js" type="text/javascript"></script>'));
                }
            }
        }
        closedir($directorio);
    }

    public function carga_css_plugins() {
        $key = 0;
        $directorio = opendir($this->direccion_plugins);
        while ($carpeta = readdir($directorio)) {
            if (($carpeta != ".") && ($carpeta != "..")) {
                $sub_directorio = opendir($this->direccion_plugins . $carpeta . "/css/");
                while ($archivo = readdir($sub_directorio)) {
                    if (($archivo != ".") && ($archivo != "..")) {
                        $archivo = explode(".c", $archivo);
                        if (count($archivo) > 1) {
                            $extension = "c" . $archivo[1];
                            $nombre = $archivo[0];
                            if ($extension === "css") {
                                echo$_SESSION['css'][$key] = stripslashes(addslashes("<link href='" . $this->direccion_plugins . $carpeta . "/css/" . $nombre . ".css' rel='stylesheet' type='text/css'>"));
                                $key++;
                            }
                        }
                    }
                }
                closedir($sub_directorio);
            }
        }
        closedir($directorio);
    }

    public function carga_js_plugins() {
        $key = 0;
        $directorio = opendir($this->direccion_plugins);
        while ($carpeta = readdir($directorio)) {
            if (($carpeta != ".") && ($carpeta != "..")) {
                $sub_directorio = opendir($this->direccion_plugins . $carpeta . "/js/");
                while ($archivo = readdir($sub_directorio)) {
                    if (($archivo != ".") && ($archivo != "..")) {
                        $archivo = explode(".j", $archivo);
                        if (count($archivo) > 1) {
                            $extension = "j" . $archivo[1];
                            $nombre = $archivo[0];
                            if ($extension == "js") {
                                echo$_SESSION['js'][] = stripslashes(addslashes('<script src="' . $this->direccion_plugins . $carpeta . "/js/" . $nombre . '.js" type="text/javascript"></script>'));
                            }
                        }
                    }
                }
                closedir($sub_directorio);
            }
        }
        closedir($directorio);
    }

}

?>
