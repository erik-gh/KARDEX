// JavaScript Document
$(document).ready(function(){

   	cantidadGerencias();
   	cantidadUsuarios();
	
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
			console.log(data.data);
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



function cantidadUsuarios(){

   	$.ajax({
      	type:'POST',
      	url: base_url+'/Dashboard/getUsuarios',
      	dataType: 'json',
      	//data:'id='+id,
      	success: function(data, textStatus, jqXHR){
			console.log(data.data);
			if(jqXHR.status == 200){
		        if(data.status){
		        	//var datos = JSON.parse(data);
		        	$('#usuarios').html(data.data);
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
