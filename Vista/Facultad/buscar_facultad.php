<?php
include '../../configuracion/Nucleo.php';
?>

<?php
if (empty($_SESSION['respuesta']['error'])) {
    ?>
<!--    <form>
        <fieldset>
    	<legend> Facultad</legend>
    	<div class = "compo_fielset">
    	    <label>Nombre</label>-->

    	    <select id="combobox_facultad" class="combobox_facultad">
    		<option value="">Select one...</option>
		    <?php
		    foreach ($_SESSION['respuesta']['respuesta'] as $key => $value) {
			echo('<option name="fk_facultad" value="' . $key . '">' . $value["nombre"] . '</option>');
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