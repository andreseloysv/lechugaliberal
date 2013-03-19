$(document).ready(function() {
    countdown=0; //constante que sirve para reiniciar el contador en #timer
    $('#buscar_usuario').submit(function() {
	buscar_usuario();  
	return false;
    });
    $('#ControlAcceso_cedula').on('keyup',function(){
	buscar_usuario();  
    });
    
    $('#agregar_estudiante').submit(function() {    
	if ($("#agregar_estudiante").valid()) {
	    agregar_estudiante($('#agregar_estudiante :input'));
	}
	return false;
    });
    $('#agregar_trabajador').submit(function() { 
	if ($("#agregar_trabajador").valid()) {
	    agregar_trabajador($('#agregar_trabajador :input'));
	}
	return false;
    });
    
});
//function conteo_regresivo(url){
//    $(function(){
//	count =3;
//	clearInterval(countdown);
//	countdown = setInterval(function(){
//	    $("#timer").html("Redireccionando en: "+count);
//	    if(count <= 1){
//		clearInterval(countdown);
//		window.location = url;
//	    }
//	    count --;
//	}, 1000);
//    });
//}


function carga_dialogo(dialogo){
    $(dialogo).dialog({
	modal: true,
	autoOpen: true,
	resizable: false,
	buttons: {
	    Ok: function() {
		$( this ).dialog( "close" );
	    }
	}
    });
}

function isNumber(n) {
  return !isNaN(parseFloat(n)) && isFinite(n);
}