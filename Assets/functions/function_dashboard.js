// JavaScript Document
$(document).ready(function(){

   	cantidadGerencias();
   	cantidadRequerimientospen();
   	cantidadRequerimientosaten();
   	cantidadRequerimientos();
   	cantidadControlIngreso();
   	cantidadControlSalida();
   	cantidadControlRequerimiento();

   	$('#paneldetallecompras').hide();
   	$('#paneldetallesalidas').hide();
   	$('#paneldetallerequerimiento').hide();

   	$('#tableControlDate').DataTable({
   		"lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "All"]]
   	});
	
});

function SoloNum() {
	if ((event.keyCode < 48) || (event.keyCode > 57)) 
  	event.returnValue = false;
}

function SoloLetras() {
 	if ((event.keyCode != 32) && (event.keyCode < 65) || (event.keyCode > 90) && (event.keyCode < 97) || (event.keyCode > 122) && (event.keyCode < 164))
  	event.returnValue = false;
}

function Validador(correo){
	var tester = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-]+)\.)+([a-zA-Z0-9]{2,4})+$/;
	return tester.test(correo);
}


/*================================================  FUNCTIONS ASISTENCIA  ================================================*/

function cantidadGerencias(){

   	$.ajax({
      	type:'POST',
      	url: base_url+'/Dashboard/getGerencias',
      	dataType: 'json',
      	//data:'id='+id,
      	success: function(data, textStatus, jqXHR){
			//console.log(data.data);
			if(jqXHR.status == 200){
		        if(data.status){
		        	//var datos = JSON.parse(data);
		        	$('#gerencias').html(data.data);
		        }
		    }
      	},
		error: function(jqXHR,textStatus,errorThrown){
	    	console.log(errorThrown);
	        // console.log(textStatus);
	       	// console.log(jqXHR.status);
	    }
    });
   	return false;
}



function cantidadRequerimientos(){

   	$.ajax({
      	type:'POST',
      	url: base_url+'/Dashboard/getrequerimientocant',
      	dataType: 'json',
      	//data:'id='+id,
      	success: function(data, textStatus, jqXHR){
			//console.log(data.data);
			if(jqXHR.status == 200){
		        if(data.status){
		        	//var datos = JSON.parse(data);
		        	$('#requerimientocant').html(data.data);
		        }
		    }
      	},
		error: function(jqXHR,textStatus,errorThrown){
	    	console.log(errorThrown);
	        // console.log(textStatus);
	       	// console.log(jqXHR.status);
	    }
    });
   	return false;
}


function cantidadRequerimientosaten(){

   	$.ajax({
      	type:'POST',
      	url: base_url+'/Dashboard/getrequerimientoaten',
      	dataType: 'json',
      	//data:'id='+id,
      	success: function(data, textStatus, jqXHR){
			//console.log(data.data);
			if(jqXHR.status == 200){
		        if(data.status){
		        	//var datos = JSON.parse(data);
		        	$('#requerimientoaten').html(data.data);
		        }
		    }
      	},
		error: function(jqXHR,textStatus,errorThrown){
	    	console.log(errorThrown);
	        // console.log(textStatus);
	       	// console.log(jqXHR.status);
	    }
    });
   	return false;
}



function cantidadRequerimientospen(){

   	$.ajax({
      	type:'POST',
      	url: base_url+'/Dashboard/getrequerimientopen',
      	dataType: 'json',
      	//data:'id='+id,
      	success: function(data, textStatus, jqXHR){
			//console.log(data.data);
			if(jqXHR.status == 200){
		        if(data.status){
		        	//var datos = JSON.parse(data);
		        	$('#requerimientopen').html(data.data);
		        }
		    }
      	},
		error: function(jqXHR,textStatus,errorThrown){
	    	console.log(errorThrown);
	        // console.log(textStatus);
	       	// console.log(jqXHR.status);
	    }
    });
   	return false;
}


function cantidadControlIngreso(){

   	$.ajax({
      	type:'POST',
      	url: base_url+'/Dashboard/getControlIngreso',
      	dataType: 'json',
      	//data:'id='+id,
      	success: function(data, textStatus, jqXHR){
			//console.log(data.data);
			if(jqXHR.status == 200){
		        if(data.status){
		        	//var datos = JSON.parse(data);
		        	$('#tableControlIngreso tbody').html(data.data);
		        }
		    }
      	},
		error: function(jqXHR,textStatus,errorThrown){
	    	console.log(errorThrown);
	        // console.log(textStatus);
	       	// console.log(jqXHR.status);
	    }
    });
   	return false;
}



function cantidadControlSalida(){

   	$.ajax({
      	type:'POST',
      	url: base_url+'/Dashboard/getControlSalida',
      	dataType: 'json',
      	//data:'id='+id,
      	success: function(data, textStatus, jqXHR){
			//console.log(data.data);
			if(jqXHR.status == 200){
		        if(data.status){
		        	//var datos = JSON.parse(data);
		        	$('#tableControlSalida tbody').html(data.data);
		        }
		    }
      	},
		error: function(jqXHR,textStatus,errorThrown){
	    	console.log(errorThrown);
	        // console.log(textStatus);
	       	// console.log(jqXHR.status);
	    }
    });
   	return false;
}



function cantidadControlRequerimiento(){

   	$.ajax({
      	type:'POST',
      	url: base_url+'/Dashboard/getControlRequerimiento',
      	dataType: 'json',
      	//data:'id='+id,
      	success: function(data, textStatus, jqXHR){
			//console.log(data.data);
			if(jqXHR.status == 200){
		        if(data.status){
		        	//var datos = JSON.parse(data);
		        	$('#tableControlRequerimiento tbody').html(data.data);
		        }
		    }
      	},
		error: function(jqXHR,textStatus,errorThrown){
	    	console.log(errorThrown);
	        // console.log(textStatus);
	       	// console.log(jqXHR.status);
	    }
    });
   	return false;
}


function nosalida(fecha,fechaFormat){
	$('#control_date').html('<b>LISTADO DE PERSONAL ('+fechaFormat+')</b>')
	var tableControlDate = $('#tableControlDate').DataTable({
		//"processing": true,
		//"serverSide": true,
		"destroy": true,
		"order": [],
		"language": {
			"url": base_url+'/Assets/js/es-pe.json'
		},
		"ajax": {
			"url": base_url+"/Dashboard/getControlDate",
			"type": "POST",
			'data' : { 'fecha' : fecha },
			"dataType": "json"
		},
		"columns": [
		{"data":"orden"}, 
		{"data":"dni"},
		{"data":"nombre"}, 
		{"data":"cargo"},
		{"data":"abreviatura"},
		{"data":"hora_ingreso"},
		],
		"resonsieve":"true",
		"dDestroy": true,
		"iDisplayLength": 5,
		"lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "All"]]
		/*"order": [[0,"asc"]],*/
		/*"columnDefs": [{
			"targets": [0 , 5],
			"orderable": false,
		}, ],*/
	});

} 


function viewTablaTotaldeIngresos(fechaFormat){ 

	$('#paneldetallecompras').show();
   	$('#paneldetallesalidas').hide();
   	$('#paneldetallerequerimiento').hide();

	
var tabletotalingresos = $('#tableTotalIngresos').DataTable({
	//"processing": true,
	//"serverSide": true,
	"destroy": true,
	"order": [],
	"language": {
		"url": base_url+'/Assets/js/es-pe.json'
	},
	"ajax": {
		"url": base_url+"/Dashboard/gettabletotalingresosDash",
		"type": "POST",
		'data' : { 'fechaFormat' : fechaFormat },
		"dataType": "json"
	},
	"columns": [
	{"data":"orden"}, 
	{"data":"sucursal"},
	{"data":"RazonSocial"}, 
	{"data":"Descripcion"}, 
	{"data":"Serie"}, 
	{"data":"FechaDoc"},
	{"data":"nombre"},	
	{"data":"Estado"},
	
	],
	"resonsieve":"true",
	"dDestroy": true,
	"iDisplayLength": 10,
	/*"order": [[0,"asc"]],*/
	"columnDefs": [{
		"targets": [0 , 3],
		"orderable": false,
	}, ],
});
}


function viewTablaTotaldeSalidas(fechaFormate){ 	

	$('#paneldetallecompras').hide();
   	$('#paneldetallesalidas').show();
   	$('#paneldetallerequerimiento').hide();

var tabletotalsalidas = $('#tableTotalSalidas').DataTable({
	//"processing": true,
	//"serverSide": true,
	"destroy": true,
	"order": [],
	"language": {
		"url": base_url+'/Assets/js/es-pe.json'
	},
	"ajax": {
		"url": base_url+"/Dashboard/gettabletotalsalidasDash",
		"type": "POST",
		'data' : { 'fechaFormate' : fechaFormate },
		"dataType": "json"
	},
	"columns": [
	{"data":"centroconsumo"}, 
	{"data":"Serie"},
	{"data":"FechaCrea"}, 
	{"data":"sucursal"}, 
	{"data":"proceso"}, 
	{"data":"personalrec"},
	{"data":"nombre"},	
	{"data":"Estado"},
	
	
	],
	"resonsieve":"true",
	"dDestroy": true,
	"iDisplayLength": 10,
	
	"columnDefs": [{
		"targets": [0 , 3],
		"orderable": false,
	}, ],
});
}


function viewTablaTotaldeRequerimiento(fechaFormate){ 	

	$('#paneldetallecompras').hide();
   	$('#paneldetallesalidas').hide();
   	$('#paneldetallerequerimiento').show();

var tabletotalReq = $('#tableTotalRequerimientos').DataTable({
	//"processing": true,
	//"serverSide": true,
	"destroy": true,
	"order": [],
	"language": {
		"url": base_url+'/Assets/js/es-pe.json'
	},
	"ajax": {
		"url": base_url+"/Dashboard/gettabletotalrequerimientoscontrolDash",
		"type": "POST",
		'data' : { 'fechaFormate' : fechaFormate },
		"dataType": "json"
	},
	"columns": [
	{"data":"orden"}, 	 
	{"data":"Descripcion"},
	{"data":"nombre"},  
	{"data":"NroOrden"}, 
	{"data":"Fecha"},
	{"data":"FechaProcesa"},
	{"data":"FechaDespacha"},
	{"data":"Prioridad"},	
	{"data":"Estado"},
	
	
	
	],
	"resonsieve":"true",
	"dDestroy": true,
	"iDisplayLength": 10,
	
	"columnDefs": [{
		"targets": [0 , 3],
		"orderable": false,
	}, ],
});
}



