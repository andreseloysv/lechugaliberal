//function conteo_regresivo(url){
//    $(function(){
//        count =3;
//        clearInterval(countdown);
//        countdown = setInterval(function(){
//            $("#timer").html("Redireccionando en: "+count);
//            if(count <= 0){
//                clearInterval(countdown);
//                window.location = url;
//            }
//            count --;
//        }, 1000);
//    });
//}

function agregar_trabajador($inputs){    
    var values = {};
    $inputs.each(function() {
        
        if(this.name!=''){
            if (isNumber($(this).val())){
                values[this.name] = parseInt($(this).val());
            }
            else{
                console.debug(this.name);
                values[this.name] = $(this).val();
            }
        }
    });
    values["fk_facultad"]=$("#combobox_facultad option:selected").val();
    values["fk_escuela"]=$("#combobox_escuela option:selected").val();
    var url='../../rutas.php';
    var metodo="Trabajador/agregar_trabajador/";
    data="Modelo";
    $.post(url,{
        Modelo:metodo, 
        campos:values
    }, function(data) {	
        timer = document.createElement('div');
        timer.id="timer";
        $('#dialogo').html(data);
        $('#dialogo').append(timer);
        //conteo_regresivo("http://127.0.0.1/comedor/Vista/ControlAcceso/");
        carga_dialogo('#dialogo');
    });
}