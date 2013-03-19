<?php
include '../../configuracion/Nucleo.php';
?>

<?php
if (empty($_SESSION['respuesta']['error'])) {
    ?>
<!--    <form>
        <fieldset>
    	<legend> Escuela</legend>
    	<div class = "compo_fielset">
    	    <label>Nombre</label>-->

    	    <select id="combobox_escuela" class="combobox_escuela" name="fk_escuela">
    		<option value="">Select one...</option>
		    <?php
		    foreach ($_SESSION['respuesta']['respuesta'] as $key => $value) {
			echo('<option name="fk_escuela" value="' . $key . '">' . $value["nombre"] . '</option>');
		    }
		    ?>
    	    </select>

<!--
    	</div>
        </fieldset>
    </form>-->
    <?php
} else {
    Redireccion::DireccionarVista("Error", "index");
}
?>