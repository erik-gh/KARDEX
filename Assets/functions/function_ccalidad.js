
// JavaScript Document
$(document).ready(function(){

	//verlistadoModulos();


});



$('#panelcompra').hide();
$('#paneldetallecompraid').hide();
$('#panelingrecompra').hide();
$('#paneldetallecontrolcalidad').hide();



cboCentroConsumo();
cboEntregadopor();
cboRecibidoPorN(); 
cboTipoDocumento();
cboProveedor();
cboProceso();
cboTipoDeIngreso();




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

//*================================================  FUNCTION TABLE TOTAL DE INGRESOS   ================================================*/
/* TABLE TOTAL DE INGRESOS */
var tabletotalingresos = $('#tableTotalIngresos').DataTable({
	"processing": true,
	"serverSide": true,
	"order": [],
	"language": {
		"url": base_url+'/Assets/js/es-pe.json'
	},
	"ajax": {
		"url": base_url+"/Ccalidad/gettabletotalingresos",
		"type": "POST",
		"dataType": "json"
	},
	"columns": [
	{"data":"orden"}, 
	{"data":"Serie"}, 
	{"data":"RazonSocial"}, 
	{"data":"tipo"},
	{"data":"Descripcion"}, 
	{"data":"FechaDoc"},
	{"data":"FechaCrea"},	
	
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

function VisualizarTablaControlCalidad(id){ 

	
	var IdComprarepliegue = id;

		$('#panelingrecompra').show();
		$('#panelaprobarcontrolcalidad').hide();
		$('#paneldetallecontrolcalidad').hide();
		$('#paneldetallecompras').hide();

	//verificaCantidades();
 		 


var tablecontrolcalidad = $('#tableDetalleControlCalidad').DataTable({
	"destroy":true, // consultar si esta bien ?
	"processing": true,
	"serverSide": true,
	"order": [],
	"language": {
		"url": base_url+'/Assets/js/es-pe.json'
	},
	"ajax": {
		"url": base_url+"/Ccalidad/gettablecontrolcalidad/"+IdComprarepliegue,
		"type": "POST",
		"dataType": "json"
		 
	},
	"columns": [
	{"data":"orden"}, 
	{"data":"Descripcion"}, 
	{"data":"TcA"},
	{"data":"TcB"},
	{"data":"TcC"},
	
	{"data":"Cantidad"}, 
	{"data":"a"}, 
	{"data":"b"}, 
	{"data":"c"}, 	
	 
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

/*function verificaCantidades(){
	var sumaA = 0;
	var sumaTotal = 0;
	$('.vldA').each(function(){
	       sumaA += parseFloat($(this).val());

	});

	$('.vldTotal').each(function(){
	       sumaTotal += parseFloat($(this).val());
	});

	if (sumaTotal == sumaA) {
		$("#btncontrolcalidad").css('display','none');
		$("#btncontrolcalidad").prop('disabled',true);
	} else{
		$("#btncontrolcalidad").show();
		$("#btncontrolcalidad").prop('disabled', false);
	}
	console.log('Se ejecuta');
}*/



function VisualizarTablaDetalleCalidad(id,id2){ 
	var IdCcalidad = id;
	var IdComprarepliegue = id2;
	$("#txtIdCalidadid").val(id);
	$("#txtIdComprarepliegueid").val(id2);


$('#paneldetallecontrolcalidad').show();

var tablecontrolcalidad = $('#tabledetalleaprobarccalidad').DataTable({
	"destroy":true, // consultar si esta bien ?
	"processing": true,
	"serverSide": true,
	"order": [],
	"language": {
		"url": base_url+'/Assets/js/es-pe.json'
	},
	"ajax": {
		"url": base_url+"/Ccalidad/gettabledetallecontrolcalidad/"+IdCcalidad,
		"type": "POST",
		"dataType": "json"
	},
	"columns": [
	{"data":"orden"}, 	
	{"data":"Descripcion"},
	{"data":"a"},
	{"data":"b"}, 
	{"data":"c"}, 
	
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


function BloquearBotton(id){
	
	$.ajax({
      	type:'GET',
      	url: base_url+"/Ccalidad/getBotton/"+id,
      	dataType:'json',
      	success: function(data, textStatus, jqXHR){
	       	
	       	if(jqXHR.status == 200){
	       		console.log(data);
		        if(data.status){

		        	$('#txtestadodcc').val(data.data.Estado);
		        	

		        	var estado = (data.data.Estado);
		        	if (estado == 2) {		        		
					//$("#btnconfirmastock").css('display','none'); //oculta
					$("#btnconfirmastock").prop('disabled',true); // inhabilita

		        	} else{	        		

					$("#btnconfirmastock").show();
					$("#btnconfirmastock").prop('disabled', false);

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





function agruparDetalleCalidad (){
	var row;
	var rows = new Array(); // se declara el arreglo contenedor final
	
	$('#tableDetalleControlCalidad input[name="idProducto"]').each(function(){
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

function enviarFormCompraAdqui(){
	 var datosCalidad = new Object();
	
	datosCalidad['cborecibidopor'] 			= $("#cborecibidopor option:selected").val();
	datosCalidad['IdComprarepliegue'] 			= $("#txtIdComprarepliegue").val();
	datosCalidad['txtnumeropedido'] 			= $("#txtnumeropedido").val();
	datosCalidad['txtordecompra'] 			= $("#txtordecompra").val();
	datosCalidad['txtpecosa'] 				= $("#txtpecosa").val();

	datosCalidad['detalleCal'] 					= JSON.stringify(agruparDetalleCalidad());
	

	console.log("Datos a enviar: datosCalidad:"+datosCalidad);

    
        $.ajax({
        	url: base_url+'/Ccalidad/setCalidad',
        	type: "POST",     
	        dataType: 'json',
	        data:datosCalidad,    
	        cache: false,

	           success: function(data, textStatus, jqXHR){
	        	console.log(data);

	        	if(jqXHR.status == 200){
	        		if(data.status){
						
		        		swal(data.title, data.msg, "success");
		        		$('.confirm').removeClass('btn btn-danger').removeClass('btn btn-warning').addClass('btn btn-success');
		        		bottonRegresar();
		        		//$('#tableDetalleIngreso').DataTable().ajax.reload();
		        		//cancelDetalleIngreso();

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







function aprobarproductosCcalidad()
{
	

	 var datosDetalleCalidad = new Object();
	 	datosDetalleCalidad['IdComprarepliegue'] 		= $("#txtIdComprarepliegueid").val();
		datosDetalleCalidad['IdCalidad'] 			= $("#txtIdCalidadid").val();
	
	

	console.log("Datos a enviar: datosCalidad:"+datosDetalleCalidad);

    
        $.ajax({
        	url: base_url+'/Ccalidad/setAprobarCalidad',
        	type: "POST",     
	        dataType: 'json',
	        data:datosDetalleCalidad,    
	        cache: false,

	           success: function(data, textStatus, jqXHR){
	        	console.log(data);

	        	if(jqXHR.status == 200){
	        		if(data.status){
						
		        		swal(data.title, data.msg, "success");
		        		$('.confirm').removeClass('btn btn-danger').removeClass('btn btn-warning').addClass('btn btn-success');
		        		$('#tableaprobarccalidad').DataTable().ajax.reload();
		        		$('#tableTotalIngresos').DataTable().ajax.reload();

		        		

		        		//$("#btnconfirmastock").css('display','none'); //oculta
					$("#btnconfirmastock").prop('disabled',true); // inhabili

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


function VisualizarTablaAprobarccalidad(id){ 
	var IdComprarepliegue = id;

	$('#panelaprobarcontrolcalidad').show();
	$('#paneldetallecontrolcalidad').hide(); 


var tabletotalccalidad = $('#tableaprobarccalidad').DataTable({
	"destroy":true, // consultar si esta bien ?
	"processing": true,
	"serverSide": true,
	"order": [],
	"language": {
		"url": base_url+'/Assets/js/es-pe.json'
	},
	"ajax": {
		"url": base_url+"/Ccalidad/gettableaprobarccalidad/"+IdComprarepliegue,
		"type": "POST",
		"dataType": "json"
	},
	"columns": [
	{"data":"orden"}, 
	{"data":"RazonSocial"}, 
	{"data":"Serie"}, 
	{"data":"Nombres"},
	{"data":"FechaCrea"}, 
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

}


function agruparDetalle (){
	var row;
	var rows = new Array(); 
	
	$('#tableDetalleControlCalidad input[name="idProducto"]').each(function(){
		var idProducto = $(this).val();
		var cantidadA = $('#cantA'+idProducto).val();
		var cantidadC = $('#cantC'+idProducto).val();

		row = new Object();
		row['idProducto'] = idProducto;
		row['cantidadA'] = cantidadA;
		row['cantidadC'] = cantidadC;
		rows.push(row);
		alert(idProducto+' - '+cantidadA+' - '+cantidadB+' - '+cantidadC);
	});
	return rows;
}








function cboRecibidoPorN(){
	$.ajax({
	    type: "GET",
	    async : false,
	    url: base_url+'/Salida/cboEntregadopor', 
	    success: function(data, textStatus, jqXHR){
	    	if(jqXHR.status == 200){
	            //console.log(data);
	            $("#cborecibidopor").selectpicker('destroy');
	            $("#cborecibidopor").html(data).selectpicker('refresh');
	        }
	    }
	});
}


function MostrarDetalle(id){
	// alert('ID a mostrar: '+id);
	$('#txtIdComprarepliegue').val(id);
      $('#txtcontroltxtComprarepliegue').val('1');
      $("#updatepersonal").removeAttr('style');
      $("#agregarpersonal").css("display","none");
    


	$.ajax({
      	type:'GET',
      	url: base_url+"/Ccalidad/getDetalle/"+id,
      	dataType:'json',
      	success: function(data, textStatus, jqXHR){
	       	
	       	if(jqXHR.status == 200){
	       		console.log(data);
		        if(data.status){

		        	$('#txtalmacen').val(data.data.almacen);
		        	$('#txtproceso').val(data.data.proceso);
		        	$('#txtproveedor').val(data.data.proveedor);
		        	$('#txttipodocumento').val(data.data.documento);
		        	$('#txtserie2').val(data.data.Serie);
		        	$('#txtfechadoc').val(data.data.FechaDoc);
		        	$('#txtnumeropedido').val(data.data.NroPedido);
		        	$('#txtordecompra').val(data.data.OrdenCompra);
		        	$('#txtpecosa').val(data.data.Pecosa);

		        	var estado = (data.data.Estado);
		        	if (estado == 2) {

		        		$("#btncontrolcalidad").css('display','none');
					$("#btncontrolcalidad").prop('disabled',true);

					$("#btnconfirmastock").css('display','none');
					$("#btnconfirmastock").prop('disabled',true);

		        	} else{

		        		$("#btncontrolcalidad").show();
					$("#btncontrolcalidad").prop('disabled', false);

					$("#btnconfirmastock").show();
					$("#btnconfirmastock").prop('disabled', false);


		        	}


		        	/*var tipoingreso = (data.data.IdTipoIngreso);
		        	if (tipoingreso == 2) {

		        		$("#btncontrolcalidad").css('display','none');
					$("#btncontrolcalidad").prop('disabled',true);

					$("#btnconfirmastock").css('display','none');
					$("#btnconfirmastock").prop('disabled',true);

		        	} else{

		        		$("#btncontrolcalidad").show();
					$("#btncontrolcalidad").prop('disabled', false);

					$("#btnconfirmastock").show();
					$("#btnconfirmastock").prop('disabled', false);


		        	}*/





		        	
        		        	        
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


function cboCentroConsumo(){
	$.ajax({
	    type: "GET",
	    async : false,
	    url: base_url+'/Salida/getSelectCentroConsumo', 
	    success: function(data, textStatus, jqXHR){
	    	if(jqXHR.status == 200){
	            //console.log(data);
	            $("#cbocconsumo").selectpicker('destroy');
	            $("#cbocconsumo").html(data).selectpicker('refresh');
	        }
	    }
	});
}




function cboEntregadopor(){
	$.ajax({
	    type: "GET",
	    async : false,
	    url: base_url+'/Salida/cboEntregadopor', 
	    success: function(data, textStatus, jqXHR){
	    	if(jqXHR.status == 200){
	            //console.log(data);
	            $("#entregadopor").selectpicker('destroy');
	            $("#entregadopor").html(data).selectpicker('refresh');
	        }
	    }
	});
}

/*function RecibidoPor(){
	
	 onchange="javascript:RecibidoPor();"

	 var Consumo							= $('#cbocconsumo').val();

	var requestParametro					= new Object();
    requestParametro["IdConsumo"]			= $("#cbocconsumo").val(); 

    
    if(Consumo == 0){

   			$('option', '#cborecibidopor').remove();					
			$("#cborecibidopor").append('<option value="0">SELECCIONAR</option>');						
			$('#cborecibidopor').selectpicker('refresh');
	 } else {		

				$.ajax({


		        	url: base_url+'/Salida/getSelectRecibidoPor',
		        	type: "POST",     
			        dataType: 'json',
			        data:requestParametro,    
			        cache: false,

			        success: function(data, textStatus, jqXHR)
				    {
				    	if(jqXHR.status == 200){
				            //console.log(data);
				            $("#cborecibidopor").selectpicker('destroy');
				            $("#cborecibidopor").html(data).selectpicker('refresh');
				        }
				    }
				});
			}
}*/






 function enviarFormSalida(){
 	$("#form_registrarCcalidad").submit();
 }







function cancelDetalleIngreso(){
      
      //$('#estado_perfil').hide();
      $('#form_registrarIngreso')[0].reset();
      $('#form_registrarIngreso').validate().resetForm();
      //$('#txtcontrolProveedor').val('0');
      //$('#txtperfil').attr('disabled',false);
      $('#form_registrarIngreso .form-group').removeClass('has-success');
}






function bottonRegresar(){

	$('#panelingrecompra').hide();
	$('#paneldetallecompras').show();
      
     
}

function VisualizarPanel(){ 

	$('#paneldetallecompras').hide();
	$('#panelboton').hide();
	$('#panelcompra').show();
	$('#paneldetallecompraid').hide();

		

}





function VisualizarModalProducto(){ 

	$('#modal_buscarproducto').modal('show');

	//$('#paneldetallecompras').hide();
	//$('#panelboton').hide();
	//$('#panelcompra').show();

		

}


function Visualizarmodarcrearproveedor(){ 

	$('#modal_crearproveedor').modal('show');

	//$('#paneldetallecompras').hide();
	//$('#panelboton').hide();
	//$('#panelcompra').show();

		

}




function cboProveedor(){
	$.ajax({
	    type: "GET",
	    async : false,
	    url: base_url+'/Compra/getSelectProveedor', 
	    success: function(data, textStatus, jqXHR){
	    	if(jqXHR.status == 200){
	            //console.log(data);
	            $("#cboproveedor").selectpicker('destroy');
	            $("#cboproveedor").html(data).selectpicker('refresh');
	        }
	    }
	});
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





function cboTipoDeIngreso(){
	$.ajax({
	    type: "GET",
	    async : false,
	    url: base_url+'/Compra/getSelectTipoIngreso', 
	    success: function(data, textStatus, jqXHR){
	    	if(jqXHR.status == 200){
	            //console.log(data);
	            $("#cbotipoingreso").selectpicker('destroy');
	            $("#cbotipoingreso").html(data).selectpicker('refresh');
	        }
	    }
	});
}



function cboTipoDocumento(){
	$.ajax({
	    type: "GET",
	    async : false,
	    url: base_url+'/Compra/getSelectTipoDocumento', 
	    success: function(data, textStatus, jqXHR){
	    	if(jqXHR.status == 200){
	            //console.log(data);
	            $("#cbotipodocumento").selectpicker('destroy');
	            $("#cbotipodocumento").html(data).selectpicker('refresh');
	        }
	    }
	});
}




















