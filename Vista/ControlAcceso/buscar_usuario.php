<?php
include '../../configuracion/Nucleo.php';
?>

<?php
if (empty($_SESSION['respuesta']['error'])) {
    ?>
    <form>
        <fieldset>
            <legend> Estudiante</legend>
            <div class = "compo_fielset">
                <label>Cedula</label>
                <input type = "text" placeholder = "Cedula" value="<?php echo $_SESSION['respuesta']['respuesta'][0]['cedula']; ?> ">
            </div>
            <div class = "compo_fielset">
                <label>Nombre</label>
                <input type = "text" placeholder = "Nombre" value="<?php echo $_SESSION['respuesta']['respuesta'][0]['nombre']; ?> ">
            </div>
            <div class = "compo_fielset">
                <label>Apellido</label>
                <input type = "text" placeholder = "Apellido" value="<?php echo $_SESSION['respuesta']['respuesta'][0]['apellido']; ?> ">
            </div>
            </div>
        </fieldset>
    </form>
    <?php
} else {
    Redireccion::DireccionarVista("Error", "index");
}
?>