// JavaScript Document
// Requerimiento (0Anulado - 1PENDIENTE -2PROCESADO) DETREQ (0ELIMINADO-1PROCESADO)


// ################      ESTADOS    ##################////
//0 Anulado sin procesar // 1 pendiente // 2 Procesado // 3  Despachado //4 Extornar


//$(document).ready(function(){

//	setInterval(function(){ 
  // 		cantidadPersonal();
//	}, 1000);
	
//});

$('#paneldetallerequerimientoid').hide();
$('#paneldetallerequerimientoidaprobado').hide();
$('#panelsolicitante').hide();


$('#paneldetallerequerimientoidconfirmar').hide();
$('#paneldetallerequerimientoidaprobadoconfirmar').hide();
$('#panelsolicitanteconfirmar').hide();





/* REGISTER PROVEEDOR */
$("#form_anularrequerimiento").submit(function() { 
    
    var idanular	= $('#txtidrequerimiento').val();
    var total 		= idanular.length ; 


    var requesAnularRequerimiento					= new Object();
    requesAnularRequerimiento["IdAnular"]				= $("#txtidrequerimiento").val();
    requesAnularRequerimiento["control"]				= $("#txtcontrolanular").val();
    requesAnularRequerimiento["Observaciones"]			= $("#txtobsanular").val();


	console.log(requesAnularRequerimiento);

    if (total>0){ 
        $.ajax({
            url: base_url+'/CRequerimiento/setAnular',
	        type: "POST",     
	        dataType: 'json',
	        data:requesAnularRequerimiento,    
	        cache: false,

	        	
	        success: function(data, textStatus, jqXHR){
	        	console.log(data);

	        	if(jqXHR.status == 200){
	        		if(data.status){
						
		        		swal(data.title, data.msg, "success");
		        		$('.confirm').removeClass('btn btn-danger').removeClass('btn btn-warning').addClass('btn btn-success');
		        		$('#tableTotalRequerimientos').DataTable().ajax.reload();
		        		


		        		$('#form_anularrequerimiento')[0].reset();
					$('#form_anularrequerimiento').validate().resetForm();
     	 		    		$('#modal_anularrequerimiento').modal('hide');
		        	
		        		return false;

	        		}else{
		        		swal({  title: 	data.title,
							    text: 	data.msg,
							    type: 	"error"},
							    function(){ 
							    	setTimeout(function() {
							          $('#txtobsanular').focus();
							    	}, 10)
								});
		        		$('.confirm').removeClass('btn btn-success').removeClass('btn btn-warning').addClass('btn btn-danger');
		        		return false;
		        	}
		        }

            },
            error: function(jqXHR,textStatus,errorThrown){
            	console.log(errorThrown);
            	/*console.log(textStatus);
        		console.log(jqXHR.status);*/
        	}
        });
        return false;
    }
});



function Visualizarmodalanularreq(id){ 

	$('#txtidrequerimiento').val(id);
	$('#modal_anularrequerimiento').modal('show');


}



function pdfCrequerimiento(id){

	var IdRequerimiento = id;
			$('<form target="_blank" action="Crequerimiento/generarPdf/'+IdRequerimiento+'" method="POST"></form>').appendTo('body').submit();
		}
		

function eliminarRequerimiento(id){
	//alert('ID a eliminar es: '+id)
	$('.confirm').removeClass('btn btn-success').removeClass('btn btn-danger').removeClass('btn btn-warning');
  	swal({  title: "Eliminar Requerimiento",
      	text: "¿Desea eliminar esta Requerimiento?",
      	type: "warning",
      	showCancelButton: true,
      	cancelButtonText: "Cancelar",
      	confirmButtonColor: "#ff9600",
      	confirmButtonText: "Aceptar",
      	closeOnConfirm: false },
      	function(){ 
          	$.ajax({
	            type:'DELETE',
	            url: base_url+"/Crequerimiento/deleterequerimiento/"+id,
	            dataType:'json',
	            success: function(data, textStatus, jqXHR){
	              	if(jqXHR.status == 200){
	              		console.log(data);
	              		if(data.status){

	              			swal(data.title, data.msg, "success");
		        			$('.confirm').removeClass('btn btn-danger').removeClass('btn btn-warning').addClass('btn btn-success');
		        			$('#tableTotalRequerimientos').DataTable().ajax.reload();
		        			
		        			return false;

	              		}else{
	              			swal(data.title, data.msg, "error");
		        			$('.confirm').removeClass('btn btn-success').removeClass('btn btn-warning').addClass('btn btn-danger');
		        			return false;
	              		}
	              	}
            	}
          	});
			return false;
      	});
}

function BloquearBottonReq(id){
	
	$.ajax({
      	type:'GET',
      	url: base_url+"/Crequerimiento/getBottonReq/"+id,
      	dataType:'json',
      	success: function(data, textStatus, jqXHR){
	       	
	       	if(jqXHR.status == 200){
	       		console.log(data);
		        if(data.status){

		        	//$('#txtestadodcc').val(data.data.Estado);
		        	

		        	var estado = (data.data.Estado);
		        	if (estado == 3 || estado == 2 || estado == 0 || estado == 4 ) {		        		
					//$("#btnconfirmastock").css('display','none'); //oculta
					$("#btnrequerimiento").prop('disabled',true); // inhabilita
					$('#paneldetallerequerimientoid').hide();
					$('#paneldetallerequerimientoidaprobado').show();

		        	} else{	        		

					$("#btnrequerimiento").show();
					$("#btnrequerimiento").prop('disabled', false);

		        	}

		        	
        		        	        
			      	return false;

		      	}else{
					swal(data.title, data.msg, "error");
		        	$('.confirm').removeClass('btn btn-success').removeClass('btn btn-warning').addClass('btn btn-danger');
		        	return false;
		      	}
	      	}
    	}
  	});
  return false;
}


function BloquearBottonReqConfirmar(id){
	
	$.ajax({
      	type:'GET',
      	url: base_url+"/Crequerimiento/getBottonReq/"+id,
      	dataType:'json',
      	success: function(data, textStatus, jqXHR){
	       	
	       	if(jqXHR.status == 200){
	       		console.log(data);
		        if(data.status){

		        	//$('#txtestadodcc').val(data.data.Estado);
		        	

		        	var estado = (data.data.Estado);
		        	if (estado == 1  ||estado == 3 || estado == 0 || estado == 4 ) {		        		
					//$("#btnconfirmastock").css('display','none'); //oculta
					$("#btnrequerimientoconfirmar").prop('disabled',true); // inhabilita
					$('#paneldetallerequerimientoidconfirmar').hide();
					$('#paneldetallerequerimientoidaprobadoconfirmar').show();

		        	} else{	        		

					$("#btnrequerimientoconfirmar").show();
					$("#btnrequerimientoconfirmar").prop('disabled', false);

		        	}

		        	
        		        	        
			      	return false;

		      	}else{
					swal(data.title, data.msg, "error");
		        	$('.confirm').removeClass('btn btn-success').removeClass('btn btn-warning').addClass('btn btn-danger');
		        	return false;
		      	}
	      	}
    	}
  	});
  return false;
}

function eliminarfiladetalle(id){
	//alert('ID a eliminar es: '+id)
	$('.confirm').removeClass('btn btn-success').removeClass('btn btn-danger').removeClass('btn btn-warning');
  	swal({  title: "Eliminar Producto del Requerimiento",
      	text: "¿Desea eliminar esta fila?",
      	type: "warning",
      	showCancelButton: true,
      	cancelButtonText: "Cancelar",
      	confirmButtonColor: "#ff9600",
      	confirmButtonText: "Aceptar",
      	closeOnConfirm: false },
      	function(){ 
          	$.ajax({
	            type:'DELETE',
	            url: base_url+"/Crequerimiento/delfiladetallerequerimiento/"+id,
	            dataType:'json',
	            success: function(data, textStatus, jqXHR){
	              	if(jqXHR.status == 200){
	              		console.log(data);
	              		if(data.status){

	              			swal(data.title, data.msg, "success");
		        			$('.confirm').removeClass('btn btn-danger').removeClass('btn btn-warning').addClass('btn btn-success');
		        			$('#tabledetallerequerimientoid').DataTable().ajax.reload();
		        			//cancelFamilia();
		        			return false;

	              		}else{
	              			swal(data.title, data.msg, "error");
		        			$('.confirm').removeClass('btn btn-success').removeClass('btn btn-warning').addClass('btn btn-danger');
		        			return false;
	              		}
	              	}
            	}
          	});
			return false;
      	});
}

function verificaCantidad(cantMax, valor, idProducto, tipo){
var etiqueta = '';
if (tipo == 1) {
	etiqueta = 'cantA'+idProducto;
} else if(tipo == 2){
	etiqueta = 'cantB'+idProducto;
} else{
	etiqueta = 'cantC'+idProducto;
}

console.log("Valor: "+valor+", cantMax: "+cantMax);
if(valor > cantMax) {
	swal({   
		title: "¡Atención!",   
		text: "El producto supera el stock",   
		type: "warning",   
		confirmButtonColor: "#DD6B55",   
		confirmButtonText: "¡Entendido!",   
		closeOnConfirm: false });
	//alert('El producto supera el stock');
	$("#"+etiqueta).val(cantMax);
}

}


function agruparDetalleRequerimiento(){
	var row;
	var rows = new Array(); 
	
	$('#tabledetallerequerimientoid input[name="idProducto"]').each(function(){
		var idProducto = $(this).val();
		var cantidadA = $('#cantA'+idProducto).val();
		var cantidadB = $('#cantB'+idProducto).val();
		var cantidadC = $('#cantC'+idProducto).val();

		row = new Object();
		row['idProducto'] = idProducto;
		row['cantidadA'] = cantidadA;
		row['cantidadB'] = cantidadB;
		row['cantidadC'] = cantidadC;
		rows.push(row);
		
	});
	return rows;
}


function InsertarDetalleRequerimiento(){

	 var datosCrequerimiento = new Object();
	
	datosCrequerimiento['IdRequerimiento'] 				= $("#txtIdrequerimiento").val();
	datosCrequerimiento['detalleReq'] 					= JSON.stringify(agruparDetalleRequerimiento());
	

	console.log("Datos a enviar: datosCrequerimiento:"+datosCrequerimiento);


    
        $.ajax({
        	url: base_url+'/Crequerimiento/setCrequerimiento',
        	type: "POST",     
	        dataType: 'json',
	        data:datosCrequerimiento,    
	        cache: false,

	           success: function(data, textStatus, jqXHR){
	        	console.log(data);

	        	if(jqXHR.status == 200){
	        		if(data.status){
						
		        		swal(data.title, data.msg, "success");
		        		$('.confirm').removeClass('btn btn-danger').removeClass('btn btn-warning').addClass('btn btn-success');
		        		
		        		$('#tableTotalRequerimientos').DataTable().ajax.reload();
		        		cancelcRequerimiento();
		        		//bottonRegresar();

		        		return false;

	        		}else{
		        		swal({  title: 	data.title,
							    text: 	data.msg,
							    type: 	"error"},
							    function(){ 
							    	setTimeout(function() {
							         // $('#cboproceso').focus();
							    	}, 10)
								});
		        		$('.confirm').removeClass('btn btn-success').removeClass('btn btn-warning').addClass('btn btn-danger');
		        		return false;
		        	}
		        }

            },

          

	        	
	
        });
        return false;

}


function ConfirmarDespachoRequerimiento(){

	 var datosCrequerimiento = new Object();
	
	datosCrequerimiento['IdRequerimiento'] 				= $("#txtIdrequerimiento2").val();
	datosCrequerimiento['detalleReq'] 					= JSON.stringify(agruparDetalleRequerimiento());
	

	console.log("Datos a enviar: datosCrequerimiento:"+datosCrequerimiento);


    
        $.ajax({
        	url: base_url+'/Crequerimiento/setDespachoRequerimiento',
        	type: "POST",     
	        dataType: 'json',
	        data:datosCrequerimiento,    
	        cache: false,

	           success: function(data, textStatus, jqXHR){
	        	console.log(data);

	        	if(jqXHR.status == 200){
	        		if(data.status){
						
		        		swal(data.title, data.msg, "success");
		        		$('.confirm').removeClass('btn btn-danger').removeClass('btn btn-warning').addClass('btn btn-success');
		        		
		        		$('#tableTotalRequerimientosconfirmar').DataTable().ajax.reload();
		        		cancelcRequerimientoConfirmar();
		        		//bottonRegresar();

		        		return false;

	        		}else{
		        		swal({  title: 	data.title,
							    text: 	data.msg,
							    type: 	"error"},
							    function(){ 
							    	setTimeout(function() {
							         // $('#cboproceso').focus();
							    	}, 10)
								});
		        		$('.confirm').removeClass('btn btn-success').removeClass('btn btn-warning').addClass('btn btn-danger');
		        		return false;
		        	}
		        }

            },

          

	        	
	
        });
        return false;

}


function MostrarDetalleRequerimiento(id){
	
	  $('#txtIdrequerimiento').val(id);
      $('#txtcontrolrequerimiento').val('1');
 
    


	$.ajax({
      	type:'GET',
      	url: base_url+"/Crequerimiento/getDetalleCabeceraReq/"+id,
      	dataType:'json',
      	success: function(data, textStatus, jqXHR){
	       	
	       	if(jqXHR.status == 200){
	       		console.log(data);
		        if(data.status){

		        	
		        	$('#txtproceso').val(data.data.proceso);
		        	$('#txtcentroconsumo').val(data.data.consumo);
		        	$('#txtsolicitante').val(data.data.nombre);
		        	$('#txtobservaciones').val(data.data.Observaciones);
		        	$('#txtactividad').val(data.data.Actividad);
		        	$('#norden').val(data.data.NroOrden);
		        	$('#alinea').val(data.data.Alinea);
		        	$('#fase').val(data.data.fase);

					$('#paneldetallerequerimientoid').show();
					$('#panelsolicitante').show();
					$('#paneldetallerequerimiento').hide();

	        	
        		        	        
			      	return false;

		      	}else{
					swal(data.title, data.msg, "error");
		        	$('.confirm').removeClass('btn btn-success').removeClass('btn btn-warning').addClass('btn btn-danger');
		        	return false;
		      	}
	      	}
    	}
  	});
  return false;
}


function MostrarDetalleRequerimientoconfirmar(id){
	
	  $('#txtIdrequerimiento2').val(id);
      $('#txtcontrolrequerimiento2').val('1');
 
    


	$.ajax({
      	type:'GET',
      	url: base_url+"/Crequerimiento/getDetalleCabeceraReq/"+id,
      	dataType:'json',
      	success: function(data, textStatus, jqXHR){
	       	
	       	if(jqXHR.status == 200){
	       		console.log(data);
		        if(data.status){

		        	
		        	$('#txtproceso2').val(data.data.proceso);
		        	$('#txtcentroconsumo2').val(data.data.consumo);
		        	$('#txtsolicitante2').val(data.data.nombre);
		        	$('#txtobservaciones2').val(data.data.Observaciones);
		        	$('#norden2').val(data.data.NroOrden);

					$('#paneldetallerequerimientoidconfirmar').show();
					$('#panelsolicitanteconfirmar').show();
					$('#paneldetallerequerimientoconfirmar').hide();

	        	
        		        	        
			      	return false;

		      	}else{
					swal(data.title, data.msg, "error");
		        	$('.confirm').removeClass('btn btn-success').removeClass('btn btn-warning').addClass('btn btn-danger');
		        	return false;
		      	}
	      	}
    	}
  	});
  return false;
}




function VisualizarTablaDetalleRequerimiento(id){ 
	//alert(id);

var idDetalleRequerimiento = id;
$('#paneldetallerequerimientoid').show();
$('#paneldetallerequerimientoidaprobado').hide();

var tabledetallerequerimiento = $('#tabledetallerequerimientoid').DataTable({
	"destroy":true, // consultar si esta bien ?
	"processing": true,
	"serverSide": true,
	"order": [],
	"language": {
		"url": base_url+'/Assets/js/es-pe.json'
	},
	"ajax": {
		"url": base_url+"/Crequerimiento/gettabledetallerequerimiento/"+idDetalleRequerimiento,
		"type": "POST",
		"dataType": "json"
	},
	"columns": [
	{"data":"orden"}, 	
	{"data":"Descripcion"}, 
	{"data":"Cantidad"},
	{"data":"at"},
	{"data":"a"}, 
	{"data":"bt"},
	{"data":"b"},
	{"data":"ct"},
	{"data":"c"},
	{"data":"opciones"}, 
	],
	"resonsieve":"true",
	"dDestroy": true,
	"iDisplayLength": 50,
	
	"columnDefs": [{
		"targets": [0 , 3],
		"orderable": false,
	}, ],
});

}



function VisualizarTablaDetalleRequerimientoconfirmar(id){ 
	//alert(id);

var idDetalleRequerimiento = id;
$('#paneldetallerequerimientoidconfirmar').show();
$('#paneldetallerequerimientoidaprobadoconfirmar').hide();

var tabledetallerequerimientoconfirmar = $('#tabledetallerequerimientoidconfirmar').DataTable({
	"destroy":true, // consultar si esta bien ?
	"processing": true,
	"serverSide": true,
	"order": [],
	"language": {
		"url": base_url+'/Assets/js/es-pe.json'
	},
	"ajax": {
		"url": base_url+"/Crequerimiento/gettabledetallerequerimientoconfirmar/"+idDetalleRequerimiento,
		"type": "POST",
		"dataType": "json"
	},
	"columns": [
	{"data":"orden"}, 	
	{"data":"Descripcion"}, 
	{"data":"Cantidad"},
	{"data":"at"},
	{"data":"a"}, 
	{"data":"bt"},
	{"data":"b"},
	{"data":"ct"},
	{"data":"c"},
	{"data":"opciones"}, 
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


function VisualizarTablaDetalleRequerimientoaprobado(id){ 
	//alert(id);

var idDetalleRequerimiento = id;
$('#paneldetallerequerimientoid').hide();
$('#paneldetallerequerimientoidaprobado').show();

var tabledetallerequerimiento = $('#tabledetallerequerimientoidaprobado').DataTable({
	"destroy":true, // consultar si esta bien ?
	"processing": true,
	"serverSide": true,
	"order": [],
	"language": {
		"url": base_url+'/Assets/js/es-pe.json'
	},
	"ajax": {
		"url": base_url+"/Crequerimiento/gettabledetallerequerimientoaprobado/"+idDetalleRequerimiento,
		"type": "POST",
		"dataType": "json"
	},
	"columns": [
	{"data":"orden"}, 	
	{"data":"CodProducto"}, 	
	{"data":"Descripcion"}, 
	{"data":"Cantidad"},
	{"data":"Aa"},
	{"data":"Ab"}, 
	{"data":"Ac"},
	
	{"data":"Estado"},
	
	],
	"resonsieve":"true",
	"dDestroy": true,
	"iDisplayLength": 50,
	
	"columnDefs": [{
		"targets": [0 , 3],
		"orderable": false,
	}, ],
});

}


function VisualizarTablaDetalleRequerimientoaprobadoconfirmar(id){ 
	//alert(id);

var idDetalleRequerimiento = id;
$('#paneldetallerequerimientoidconfirmar').hide();
$('#paneldetallerequerimientoidaprobadoconfirmar').show();

var tabledetallerequerimientoconfirmar = $('#tabledetallerequerimientoidaprobadoconfirmar').DataTable({
	"destroy":true, // consultar si esta bien ?
	"processing": true,
	"serverSide": true,
	"order": [],
	"language": {
		"url": base_url+'/Assets/js/es-pe.json'
	},
	"ajax": {
		"url": base_url+"/Crequerimiento/gettabledetallerequerimientoaprobado/"+idDetalleRequerimiento,
		"type": "POST",
		"dataType": "json"
	},
	"columns": [
	{"data":"orden"}, 	
	{"data":"Descripcion"}, 
	{"data":"Cantidad"},
	{"data":"Aa"},
	{"data":"Ab"}, 
	{"data":"Ac"},
	
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




var tabletotalReq = $('#tableTotalRequerimientos').DataTable({
	"processing": true,
	"serverSide": true,
	"order": [],
	"language": {
		"url": base_url+'/Assets/js/es-pe.json'
	},
	"ajax": {
		"url": base_url+"/Crequerimiento/gettabletotalrequerimientoscontrol",
		"type": "POST",
		"dataType": "json"
	},
	"columns": [

	{"data":"orden"}, 	 
	{"data":"Descripcion"}, 
	{"data":"NroOrden"}, 
	{"data":"Fecha"},
	{"data":"FechaProcesa"},
	{"data":"FechaDespacha"},
	{"data":"Prioridad"},	
	{"data":"Estado"},
	{"data":"opciones"}, 
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



var tabletotalReq = $('#tableTotalRequerimientosconfirmar').DataTable({
	"processing": true,
	"serverSide": true,
	"order": [],
	"language": {
		"url": base_url+'/Assets/js/es-pe.json'
	},
	"ajax": {
		"url": base_url+"/Crequerimiento/gettabletotalrequerimientoscontrolconfirmar",
		"type": "POST",
		"dataType": "json"
	},
	"columns": [
	{"data":"orden"}, 	 
	{"data":"Descripcion"}, 
	//{"data":"nombre"}, 
	{"data":"Fecha"},
	{"data":"FechaProcesa"},
	{"data":"FechaDespacha"},
	{"data":"Prioridad"},	
	{"data":"Estado"},
	{"data":"opciones"}, 
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

/*================================================  fin de linea ================================================*/









function cancelcRequerimiento(){
      
      $(".claseSelect").val('').trigger('change');
      $(".claseInput").val('');
      $("#tablarequesolicitud").html('');

      $('#paneldetallerequerimientoid').hide();
      $('#paneldetallerequerimientoidaprobado').hide();
	  $('#panelsolicitante').hide();
	  $('#paneldetallerequerimiento').show();

      
}

function cancelcRequerimientoConfirmar(){
      
      $(".claseSelect").val('').trigger('change');
      $(".claseInput").val('');
     

      $('#paneldetallerequerimientoidconfirmar').hide();
      $('#paneldetallerequerimientoidaprobadoconfirmar').hide();
	  $('#panelsolicitanteconfirmar').hide();
	  $('#paneldetallerequerimientoconfirmar').show();

      
}








function cboProceso(){
	$.ajax({
	    type: "GET",
	    async : false,
	    url: base_url+'/Compra/getSelectProceso', 
	    success: function(data, textStatus, jqXHR){
	    	if(jqXHR.status == 200){
	            //console.log(data);
	            $("#cboproceso").selectpicker('destroy');
	            $("#cboproceso").html(data).selectpicker('refresh');
	        }
	    }
	});
}






function VisualizarPanel(){ 

	$('#paneldetallerequerimiento').hide();
	$('#panelboton').hide();
	$('#panelrequerimiento').show();
	$('#paneldetallerequerimientoid').hide();

	
}


function OcultarPanel(){ 

	$('#paneldetallerequerimiento').show();
	$('#panelboton').show();
	$('#panelrequerimiento').hide();

	
}

function VisualizarModalProducto(){ 

	$('#modal_buscarproducto').modal('show');

}
function Visualizarmodarcrearproveedor(){ 

	$('#modal_crearproveedor').modal('show');
	
}









/*================================================  FUNCTION TABLE TOTAL DE INGRESOS   ================================================*/
/* TABLE TOTAL DE INGRESOS */







