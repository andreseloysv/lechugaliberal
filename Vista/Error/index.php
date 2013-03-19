<?php
include '../../configuracion/Nucleo.php';
?>

<div id="contenido_error">
    <?php
    foreach ($_SESSION['respuesta']['error'] as $key => $value) {
        echo("Error: " . $value);
    }
    ?>
</div>