function buscar_usuario(){
    var cedula=$("#ControlAcceso_cedula").val();
    var url='../../rutas.php';
    var metodo="ControlAcceso/buscar_usuario/cedula:"+cedula;
    data="Modelo";
    $.post(url,{
        Modelo:metodo
    }, function(data) {
        $('#resultado').html(data);
    });
    
}