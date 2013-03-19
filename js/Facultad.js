function buscar_facultad(ubicacion,id_combobox){    
    var values = {};
    var url='../../rutas.php';
    var metodo="Facultad/buscar_facultad/";
    data="Modelo";
    $.post(url,{
	Modelo:metodo, 
	campos:values
    }, function (data) {
	$(ubicacion).append(data);
	$( id_combobox ).combobox();
    });
        	
}
function buscar_facultad_escuela(ubicacion,id_combobox){    
    var values = {};
    var url='../../rutas.php';
    var metodo="Facultad/buscar_facultad/";
    data="Modelo";
    $.post(url,{
	Modelo:metodo, 
	campos:values
    }, function (data) {
	$(ubicacion).append(data);
	$( id_combobox ).combobox();
	buscar_escuela('#contenido_escuela',"#combobox_escuela");
    });
        	
}