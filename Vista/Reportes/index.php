<?php
include '../../configuracion/Nucleo.php';
?>
<div id="pagina">
    <div id="banner">
        <a href="../../index.php" ><div id="banner_titulo"></div></a>
        <a href="../../index.php" ><div id="logo"></div></a>
    </div>
    <div name="menu" id="menu">
	<ul id="button">
	    <li><a href="../ControlAcceso/index.php"> Inicio</a></li><li><a href="../Reportes/index.php"> Reportes</a></li>
	    <li><a href="../Estudiante/agregar.php"> +Estudiante</a></li>
	    <li><a href="../Trabajador/agregar.php"> +Trabajador</a></li>    
	</ul>
    </div>
    <div id="contenido">
        <div id="barra_busqueda">
            <form id="buscar_usuario" action="../../rutas.php" method="POST" >
                <label>Codigo del Carnet: </label>
                <input type="text" name="ControlAcceso_cedula" id="ControlAcceso_cedula">
                <input type="submit" value="buscar">
            </form>
        </div>
        <div id="foto"></div>
	<div id="fondo_resultado" name="fondo_resultado" class="fondo_resultado"></div>
        <div id="resultado" name="resultado"></div>
    </div>
    <div id="barra_mapa_del_sitio"></div>
    <div id="mapa_del_sitio">
	<div id="columna_1_mapa_sitio">
	    <ul id="links_mapa_sitio">
		<li><a href="../ControlAcceso/index.php"> Inicio</a></li><li><a href="../Reportes/index.php"> Reportes</a></li>
		<li><a href="../Estudiante/agregar.php"> +Estudiante</a></li>
		<li><a href="../Trabajador/agregar.php"> +Trabajador</a></li>    
	    </ul>
	</div>

    </div>
    <div id="footer">
	<label id="texto_footer">� 2013 Comedor UCV Todos los Derechos Reservados</label>
    </div>

    <div id="contenido_error" class="dialogo" title="Download complete">
	<p>
	    <span class="ui-icon ui-icon-circle-check" style="float: left; margin: 0 7px 50px 0;"></span>
	    Your files have downloaded successfully into the My Downloads folder.
	</p>
	<p>
	    Currently using <b>36% of your storage space</b>.
	</p>
    </div>
</div>
