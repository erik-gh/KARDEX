// JavaScript Document
$(document).ready(function(){

	//verlistadoModulos();

   
});




$('#panelcompra').hide();
$('#paneldetallesalidaid').hide();




cboCentroConsumo();
cboEntregadopor();
cboRecibidoPorN(); 
cboTipoDocumento();
cboProveedor();
cboProceso();
cboTipoDeIngreso();




/*$('#IdMaterial').autocomplete({

	source: function(request, response){
		var materialBuscar = new Object();
		materialBuscar['material'] = $('#IdMaterial').val();
		$.ajax({
			 type : 'POST',
			 url: base_url+'/Salida/buscarproducto',
			 dataType:"json",
			 data: JSON.stringify(materialBuscar),
			 success:function(data){
			 		response(data);


			 }
		});
	},
	minlength:1,
	select:function(event,ui){
		alert("selecciono:"+ ui.item.label);
	}

});*/


/* REGISTER PROVEEDOR */
$("#form_anularsalida").submit(function() { 
    
    var idanular	= $('#txtidanular').val();
    var total 		= idanular.length ; 


    var requesAnularSalida						= new Object();
    requesAnularSalida["IdAnular"]				= $("#txtidanular").val();
    requesAnularSalida["control"]				= $("#txtcontrolanular").val();
    requesAnularSalida["Observaciones"]			= $("#txtobsanular").val();


	console.log(requesAnularSalida);

    if (total>0){ 
        $.ajax({
            url: base_url+'/Salida/setAnular',
	        type: "POST",     
	        dataType: 'json',
	        data:requesAnularSalida,    
	        cache: false,

	        	
	        success: function(data, textStatus, jqXHR){
	        	console.log(data);

	        	if(jqXHR.status == 200){
	        		if(data.status){
						
		        		swal(data.title, data.msg, "success");
		        		$('.confirm').removeClass('btn btn-danger').removeClass('btn btn-warning').addClass('btn btn-success');
		        		$('#tableTotalSalidas').DataTable().ajax.reload();
		        		


		        		$('#form_anularsalida')[0].reset();
						$('#form_anularsalida').validate().resetForm();
     	 		    	$('#modal_anularsalida').modal('hide');
		        	
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





function Visualizarmodalanular(id){ 

	$('#txtidanular').val(id);
	$('#modal_anularsalida').modal('show');


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

//evaluar que no sean numeros negativos
if(valor < 0) {
	swal({   
		title: "¡Atención!",   
		text: "El producto debe ser mayor o igual a 0",   
		type: "warning",   
		confirmButtonColor: "#DD6B55",   
		confirmButtonText: "¡Entendido!",   
		closeOnConfirm: false });
	//alert('El producto supera el stock');
	$("#"+etiqueta).val(0);
}

}

function pdfsalida(id){

	var IdSalida = id;
			$('<form target="_blank" action="Salida/generarPdfSalida/'+IdSalida+'" method="POST"></form>').appendTo('body').submit();
		}



$("#IdMaterial").autocomplete({
        //Los datos, que son invocado mediante JQuery ajax
		
            source: function (request, response) {
                $.ajax({

			  type: "post",
                    url: base_url+'/Salida/buscarproducto',
                    data: { texto: $("#IdMaterial").val() },
                    dataType: "json",
                    success: function (data) {
                        response($.map(data, function (item) {
                            return {

                                value: item.producto,
                                //el Label si lo desean
                               // label: item.Nombre,
                                //y el ID
                                id: item.IdProducto
                            }
                        }))
                    }
                })
            },
            //Minima letra permitida para mostrar la lista de resultado
            minLength: 1,
            //Cuando seleccione un valor muestra su resultado
            select: function (event, ui) {
            	
            	//Al seleccionar donde quieres que se muestre
                	//alert("Selecciono Valor: " + ui.item.value + ", id: " + ui.item.id );

                		addProduct( ui.item.id);
                		$("#IdMaterial").val('');
                		
                		

            }
        });


			


/*================================================  FUNCTION TABLE TOTAL DE INGRESOS   ================================================*/
/* TABLE TOTAL DE INGRESOS */
var tabletotalsalidas = $('#tableTotalSalidas').DataTable({
	"processing": true,
	"serverSide": true,
	"order": [],
	"language": {
		"url": base_url+'/Assets/js/es-pe.json'
	},
	"ajax": {
		"url": base_url+"/Salida/gettabletotalsalidas",
		"type": "POST",
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


function VisualizarTablaDetalleIngresos(id){ 
	//alert(id);

var idDetalleSalida = id;
$('#paneldetallesalidaid').show();

var tabledetalleingresos = $('#tabledetalledesalidaid').DataTable({
	"destroy":true, // consultar si esta bien ?
	"processing": true,
	"serverSide": true,
	"order": [],
	"language": {
		"url": base_url+'/Assets/js/es-pe.json'
	},
	"ajax": {
		"url": base_url+"/Salida/gettabledetallesalidas/"+idDetalleSalida,
		"type": "POST",
		"dataType": "json"
	},
	"columns": [
	{"data":"orden"}, 
	{"data":"FechaCrea"}, 
	{"data":"Descripcion"}, 
	{"data":"a"},
	{"data":"b"},
	{"data":"c"},
	{"data":"Cantidad"},	
	{"data":"nombre"},
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

function cboRecibidoPorN(){
	$.ajax({
	    type: "GET",
	    async : false,
	    url: base_url+'/Salida/cboRecibidoPor', 
	    success: function(data, textStatus, jqXHR){
	    	if(jqXHR.status == 200){
	            //console.log(data);
	            $("#cborecibidopor").selectpicker('destroy');
	            $("#cborecibidopor").html(data).selectpicker('refresh');
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




function agruparDetalle (){
	var row;
	var rows = new Array(); 
	
	$('#tableDetalleIngreso input[name="idProducto"]').each(function(){
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
		//alert(idProducto+' - '+cantidadA+' - '+cantidadB+' - '+cantidadC);
	});
	return rows;
}

function verificarAgruparDetalle (){
	var contador = 0;
	
	
	$('#tableDetalleIngreso input[name="idProducto"]').each(function(){
		var idProducto = $(this).val();
		var cantidadA = $('#cantA'+idProducto).val();
		var cantidadB = $('#cantB'+idProducto).val();
		var cantidadC = $('#cantC'+idProducto).val();

		if (cantidadA == 0 && cantidadB == 0 && cantidadC == 0) { contador++;}
	});
	return contador;
}


 function enviarFormSalida(){
 	$("#form_salida").submit();
 }


$("#form_salida").submit(function() { 
    
    var datosSalida = new Object();
	datosSalida['txtcontrolVenta'] 		= $("#txtcontrolVenta").val();
	datosSalida['cboproceso'] 			= $("#cboproceso").val();
	datosSalida['cbocconsumo'] 			= $("#cbocconsumo").val();
	datosSalida['cborecibidopor']		= $("#cborecibidopor").val();
	datosSalida['entregadopor'] 		= $("#entregadopor").val();
	datosSalida['txtfechadoc'] 			= $("#txtfechadoc").val();
	datosSalida['txtobservaciones'] 	= $("#txtobservaciones").val();
	datosSalida['serie'] 				= $("#txtserie").val();
	datosSalida['detalleIng'] 			= JSON.stringify(agruparDetalle());
	

	console.log("Datos a enviar: datosSalida:"+datosSalida);
	var verificaCeros = verificarAgruparDetalle();
    if(verificaCeros == 0){
        $.ajax({
        	url: base_url+'/Salida/setSalida',
        	type: "POST",     
	        dataType: 'json',
	        data:datosSalida,    
	        cache: false,

	           success: function(data, textStatus, jqXHR){
	        	console.log(data);

	        	if(jqXHR.status == 200){
	        		if(data.status){
						
		        		swal(data.title, data.msg, "success");
		        		$('.confirm').removeClass('btn btn-danger').removeClass('btn btn-warning').addClass('btn btn-success');
		        		$('#tableTotalSalidas').DataTable().ajax.reload();
		        		cancelDetalleSalida();
		        		return false;

	        		}else{
		        		swal({  title: 	data.title,
							    text: 	data.msg,
							    type: 	"error"},
							    function(){ 
							    	setTimeout(function() {
							          $('#cboproceso').focus();
							    	}, 10)
								});
		        		$('.confirm').removeClass('btn btn-success').removeClass('btn btn-warning').addClass('btn btn-danger');
		        		return false;
		        	}
		        }

            },

        });
    }  else{
    	swal({  title: 	"",
							    text: 	"Debe tener mas de \"0\" en una de las categorias",
							    type: 	"error"},
							    function(){ 
							    	setTimeout(function() {
							         
							    	}, 10)
								});
    	return false;
    }
        return false;
    
});









/* CANCEL PROVEEDOR */
function cancelProveedor(){
      $("#agregarProveedor").removeAttr('style');
      $("#updateProveedor").css("display","none");
      $("#titleProveedor").html("<strong>REGISTRAR PROVEEDOR</strong>");
      //$('#estado_perfil').hide();
      $('#form_proveedor')[0].reset();
      $('#form_proveedor').validate().resetForm();
      $('#txtcontrolProveedor').val('0');
      //$('#txtperfil').attr('disabled',false);
      $('#form_proveedor .form-group').removeClass('has-success');
}




function VisualizarPanel(){ 

	$('#paneldetallecompras').hide();
	$('#panelboton').hide();
	$('#panelcompra').show();
	$('#paneldetallesalidaid').hide();

		

}

function cancelDetalleSalida(){
      
      $(".claseSelect").val('').trigger('change');
      $(".claseInput").val('');
      $("#tablaIngresosBody").html('');

	 
      $("#paneldetallesalidaid").hide();
      $("#panelcompra").hide();

      
      $("#panelboton").show();
      $("#paneldetallecompras").show();     
        
}





function VisualizarModalProducto(){ 

	$('#modal_buscarproducto').modal('show');

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











/*================================================  FUNCTIONS BUSCAR PRODUCTO  ================================================*/
/* TABLE BUSCAR PRODUCTO */
var tablebuscarproducto = $('#tablebuscarproducto').DataTable({
	"processing": true,
	"serverSide": true,
	"order": [],
	"language": {
		"url": base_url+'/Assets/js/es-pe.json'
	},
	"ajax": {
		"url": base_url+"/Salida/gettablebuscarproducto",
		"type": "POST",
		"dataType": "json"
	},
	"columns": [
	{"data":"orden"},
	{"data":"CodProducto"},  
	{"data":"producto"}, 
	{"data":"uma"}, 
	//{"data":"tipo"},
	{"data":"Existencia"},
	{"data":"Estado"},
	{"data":"opciones"}, 
	],
	"responsieve":"true",
	"dDestroy": true,
	"iDisplayLength": 10,
	/*"order": [[0,"asc"]],*/
	"columnDefs": [{
		"targets": [0 , 3],
		"orderable": false,
	}, ],
});

function addProduct(idProducto){
	
	if ($("#fila-"+idProducto).length == 0) { 
	 $.ajax({
	 	url: base_url+"/Salida/llenartablaproducto/"+idProducto,
	 	type: 'post',
	 	 	success: function(respuesta){

	 		// console.log('Respuesta: '+respuesta);
	 	// /*	
	 		$("#tableDetalleIngreso tbody").append(respuesta);
	 	},
	 	error: function(respuesta){
	 	//	console.log('Respuesta: '+respuesta);
	 	}
	 });
	 $("#IdMaterial").val('');
	}
}

function eliminarFila(fila){
	$("#"+fila).remove();
}











