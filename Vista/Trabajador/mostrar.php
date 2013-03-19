<?php
session_start();

 foreach ($_SESSION['respuesta']['respuesta'] as $key => $value) {
            echo("key: ".$key." value: ".$value);
        }
?>
