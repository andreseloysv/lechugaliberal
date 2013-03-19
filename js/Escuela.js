function buscar_escuela(ubicacion,id_combobox){    
    var values = {};
    var url='../../rutas.php';
    var metodo="Escuela/buscar_escuela/";
    data="Modelo";
    $.post(url,{
	Modelo:metodo, 
	campos:values 
    }, function (data) {
	$(ubicacion).append(data);
	$( id_combobox ).combobox();
    });
        	
}