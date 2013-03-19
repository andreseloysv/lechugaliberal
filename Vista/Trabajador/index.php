<?php
include '../../configuracion/Nucleo.php';
?>
<div id="pagina">
    <div id="banner">
        <a href="../../index.php" ><div id="banner_titulo"></div></a>
        <a href="../../index.php" ><div id="logo"></div></a>
    </div>
    <div id="contenido">
        <form action="../../rutas.php" method="POST" >
            <label>Buscar: </label>
            <input type="text" name="id">
            <input type="hidden" name="Modelo" value="Trabajador/mostrar">
            <input type="submit" value="buscar">
        </form>
    </div>
</div>