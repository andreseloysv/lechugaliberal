$(document).ready(function() {
    
    buscar_facultad_escuela('#contenido_facultad',"#combobox_facultad");
	
});

function conteo_regresivo(cuenta){    
    $(function(){
        count = cuenta;
        clearInterval(countdown);
        countdown = setInterval(function(){
            //$("#timer").html("Redireccionando en: "+count);
            if(count <= 0){
                clearInterval(countdown);
                 $('#resultado_dialogo').html('');
                return true;
            }
            count --;
        }, 1000);
    });
}
function redireccion(url){
    if(conteo_regresivo(3)){
        window.location = url;
    }
}

function agregar_estudiante($inputs){    
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
    var metodo="Estudiante/agregar_estudiante/";
    data="Modelo";
    console.debug($("#combobox_facultad option:selected").val());
    console.debug(values);
    $.post(url,{
        Modelo:metodo, 
        campos:values
    }, function(data) {
        carga_dialogo();
    });
}