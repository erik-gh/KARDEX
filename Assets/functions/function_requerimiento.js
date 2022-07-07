// JavaScript Document

// ################      ESTADOS    ##################////
//0 Anulado sin procesar // 1 pendiente // 2 Procesado //3 Despachado //  4 Extornar

$('#panelrequerimiento').hide();
$('#paneldetallerequerimientoid').hide();

$('#panelrequerimientoformato').hide();
$('#paneldetallerequerimientoidformato').hide();




cboProceso();
cboAlinea();
cboFase();
cboturno();
CboConsumo();


$("#form_crearanalistaturno").submit(function() { 
	
    var clase 		= 	$('#txtdnit').val();

    var requestPersonal					= new Object();
    requestPersonal["IdPersonalt"]		= $("#txtidpersonalt").val();
    requestPersonal["ControlPersonalt"]	= $("#txtcontrolpersonalt").val();
    requestPersonal["Dnit"]				= $("#txtdnit").val();
	requestPersonal["Nombret"]			= $("#txtnombret").val();
	requestPersonal["Consumot"]			= $("#cboconsumot").val();
	

	    	if($('#txtdnit').val().length != 0){
					$.ajax({
						url: base_url+'/Requerimiento/setPersonalturno',
						type: "POST",     
						dataType: 'json',
						data:requestPersonal,    
						cache: false,
									        	
						success: function(data, textStatus, jqXHR){
						console.log(data.msg);

							if(jqXHR.status == 200){
								if(data.status){
									swal(data.title, data.msg, "success");
									$('.confirm').removeClass('btn btn-danger').removeClass('btn btn-warning').addClass('btn btn-success');
									$('#form_crearanalista')[0].reset();
									$('#form_crearanalista').validate().resetForm();
     	 							 									
									CboConsumo();
									cboAlinea();
									cboturno();
									$('#modal_crearanalistadeturno').modal('hide');
																		
									return false;

								}else{
									swal({  title: 	data.title,
											text: 	data.msg,
											type: 	"error"},
											function(){ 
												setTimeout(function() {
													// $('#txtperfil').focus();
												}, 10)
										});
										$('.confirm').removeClass('btn btn-success').removeClass('btn btn-warning').addClass('btn btn-danger');
										return false;
								}
							}

						},
						error: 	function(jqXHR,textStatus,errorThrown){
									console.log(errorThrown);
									// console.log(textStatus);
									// console.log(jqXHR.status);
						}
					});
					return false;
				
		    }
	    return false; 
	
});



$("#form_crearanalista").submit(function() { 
	
    var clase 		= 	$('#txtdni').val();

    var requestPersonal					= new Object();
    requestPersonal["IdPersonal"]		= $("#txtidpersonal").val();
    requestPersonal["ControlPersonal"]	= $("#txtcontrolpersonal").val();
    requestPersonal["Dni"]				= $("#txtdni").val();
	requestPersonal["Nombre"]			= $("#txtnombre").val();
	requestPersonal["Consumo"]			= $("#cboconsumo").val();
	

	    	if($('#txtdni').val().length != 0){
					$.ajax({
						url: base_url+'/Requerimiento/setPersonal',
						type: "POST",     
						dataType: 'json',
						data:requestPersonal,    
						cache: false,
									        	
						success: function(data, textStatus, jqXHR){
						console.log(data.msg);

							if(jqXHR.status == 200){
								if(data.status){
									swal(data.title, data.msg, "success");
									$('.confirm').removeClass('btn btn-danger').removeClass('btn btn-warning').addClass('btn btn-success');
									$('#form_crearanalista')[0].reset();
									$('#form_crearanalista').validate().resetForm();
     	 							 									
									CboConsumo();
									cboAlinea();
									$('#modal_crearanalistadelinea').modal('hide');
																		
									return false;

								}else{
									swal({  title: 	data.title,
											text: 	data.msg,
											type: 	"error"},
											function(){ 
												setTimeout(function() {
													// $('#txtperfil').focus();
												}, 10)
										});
										$('.confirm').removeClass('btn btn-success').removeClass('btn btn-warning').addClass('btn btn-danger');
										return false;
								}
							}

						},
						error: 	function(jqXHR,textStatus,errorThrown){
									console.log(errorThrown);
									// console.log(textStatus);
									// console.log(jqXHR.status);
						}
					});
					return false;
				
		    }
	    return false; 
	
});


function SoloNum() {
	if ((event.keyCode < 48) || (event.keyCode > 57)) 
  	event.returnValue = false;
}


function cancelPersonal(){
           
      $('#form_crearanalista')[0].reset();
      $('#form_crearanalista').validate().resetForm();
      $('#txtnombre').attr('disabled',false);
      $('#form_crearanalista .form-group').removeClass('has-success');
}
function cancelPersonalturno(){
           
      $('#form_crearanalistaturno')[0].reset();
      $('#form_crearanalistaturno').validate().resetForm();
      $('#txtnombre').attr('disabled',false);
      $('#form_crearanalistaturno .form-group').removeClass('has-success');
}


function CboConsumo(){
	$.ajax({
	    type: "GET",
	    async : false,
	    url: base_url+'/Producto/getSelectConsumo', 
	    success: function(data, textStatus, jqXHR){
	    	if(jqXHR.status == 200){
	            //console.log(data);
	            $("#cboconsumo").selectpicker('destroy');
	            $("#cboconsumo").html(data).selectpicker('refresh');

	            $("#cboconsumot").selectpicker('destroy');
	            $("#cboconsumot").html(data).selectpicker('refresh');
	        }
	    }
	});
}

function Visualizarmodalanalistalinea(){ 

	$('#modal_crearanalistadelinea').modal('show');	

}


function Visualizarmodalanalistaturno(){ 

	$('#modal_crearanalistadeturno').modal('show');	

}


function cboAlinea(){
	$.ajax({
	    type: "GET",
	    async : false,
	    url: base_url+'/Requerimiento/selectcbolineareque', 
	    success: function(data, textStatus, jqXHR){
	    	if(jqXHR.status == 200){
	            //console.log(data);
	            $("#cboanalistalinea").selectpicker('destroy');
	            $("#cboanalistalinea").html(data).selectpicker('refresh');
	           
	            $("#cboanalistalineaformato").selectpicker('destroy');
	            $("#cboanalistalineaformato").html(data).selectpicker('refresh');
	           
	        }
	    }
	});
}


function cboturno(){
	$.ajax({
	    type: "GET",
	    async : false,
	    url: base_url+'/Requerimiento/selectcboturnoreque', 
	    success: function(data, textStatus, jqXHR){
	    	if(jqXHR.status == 200){
	            //console.log(data);
	           
	            $("#cboanalistaturno").selectpicker('destroy');
	            $("#cboanalistaturno").html(data).selectpicker('refresh');

	            
	            $("#cboanalistaturnoformato").selectpicker('destroy');
	            $("#cboanalistaturnoformato").html(data).selectpicker('refresh');
	        }
	    }
	});
}

function pdfCrequerimientoFM04(id){

	var IdRequerimiento = id;
			$('<form target="_blank" action="Requerimiento/generarPdfFm04/'+IdRequerimiento+'" method="POST"></form>').appendTo('body').submit();
		}


function pdfCrequerimientoFormato(id){

	var IdRequerimiento = id;
			$('<form target="_blank" action="Requerimiento/generarPdfFormato/'+IdRequerimiento+'" method="POST"></form>').appendTo('body').submit();
		}





/*================================================  FUNCTIONS PROVEEDOR  ================================================*/

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



function VisualizarTablaDetalleRequerimiento(id){ 
	//alert(id);

var idDetalleRequerimiento = id;
$('#paneldetallerequerimientoid').show();

var tabledetallerequerimiento = $('#tabledetallerequerimientoid').DataTable({
	"destroy":true, // consultar si esta bien ?
	"processing": true,
	"serverSide": true,
	"order": [],
	"language": {
		"url": base_url+'/Assets/js/es-pe.json'
	},
	"ajax": {
		"url": base_url+"/Requerimiento/gettabledetallerequerimiento/"+idDetalleRequerimiento,
		"type": "POST",
		"dataType": "json"
	},
	"columns": [
	{"data":"orden"}, 
	{"data":"Fecha"},
	{"data":"CodProducto"}, 
	{"data":"Descripcion"}, 
	{"data":"Cantidad"},	
	
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

/*************** INICIO VER DETALLE DE FORMATO **************************/

function VisualizarTablaDetalleformato(id){ 
	//alert(id);

var idDetalleRequerimiento = id;
$('#paneldetallerequerimientoidformato').show();

var tabledetalleformato = $('#tabledetalleformatoid').DataTable({
	"destroy":true, // consultar si esta bien ?
	"processing": true,
	"serverSide": true,
	"order": [],
	"language": {
		"url": base_url+'/Assets/js/es-pe.json'
	},
	"ajax": {
		"url": base_url+"/Requerimiento/gettabledetalleformato/"+idDetalleRequerimiento,
		"type": "POST",
		"dataType": "json"
	},
	"columns": [
	{"data":"orden"}, 
	{"data":"Fecha"}, 
	{"data":"Descripcion"}, 
	{"data":"Cantidad"},	
	{"data":"nombre"},
	{"data":"Estado"},
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

/*************** FIN DETALLE  DE FORMATO **************************/




function addProductformato(idProducto){
	
	if ($("#fila-"+idProducto).length == 0) { 
	 $.ajax({
	 	url: base_url+"/Requerimiento/llenartablaproductoformato/"+idProducto,
	 	type: 'post',
	 	 	success: function(respuesta){

	 		// console.log('Respuesta: '+respuesta);
	 	// /*	
	 		$("#tableDetalleRequerimientoformato tbody").append(respuesta);
	 	},
	 	error: function(respuesta){
	 	//	console.log('Respuesta: '+respuesta);
	 	}
	 });
	 $("#IdMaterial").val('');
	}
}

function agruparDetalleRequerimientoformato(){
	var row;
	var rows = new Array(); 
	
	$('#tableDetalleRequerimientoformato input[name="idProducto"]').each(function(){
		var idProducto = $(this).val();
		var cantidadA = $('#cantA'+idProducto).val();
		

		row = new Object();
		row['idProducto'] = idProducto;
		row['cantidadA'] = cantidadA;
		rows.push(row);
		//alert(idProducto+' - '+cantidadA+' - '+cantidadB+' - '+cantidadC);
	});
	return rows;
}

function enviarFormato(){
 	$("#form_requerimientoformato").submit();
 }



$("#form_requerimientoformato").submit(function() { 
    
    var datosRequerimiento = new Object();
	datosRequerimiento['txtcontrolRequerimiento'] 		= $("#txtcontrolrequerimientoformato").val();
	datosRequerimiento['cboproceso'] 					= $("#cboprocesoformato").val();
	datosRequerimiento['consumo']						= $("#txtIdCentroconsumoformato").val();
	datosRequerimiento['solicitante'] 					= $("#txtsolicitanteformato").val();
	datosRequerimiento['prioridad'] 					= $("#cboprioridadformato").val();
	datosRequerimiento['fase'] 							= $("#cbofaseformato").val();
	datosRequerimiento['cantidad'] 						= $("#txtcantidadformato").val();
	datosRequerimiento['turno'] 						= $("#cboturnoformato").val();
	datosRequerimiento['norden'] 						= $("#txtordenformato").val();
	datosRequerimiento['actividad'] 					= $("#txtactividadformato").val();
	datosRequerimiento['fechaactividad'] 				= $("#txtfechaactividadformato").val();	
	datosRequerimiento['alinea'] 						= $("#cboanalistalineaformato").val();
	datosRequerimiento['aturno'] 						= $("#cboanalistaturnoformato").val();
	datosRequerimiento['observaciones'] 				= $("#txtobservacionesformato").val();

	datosRequerimiento['detalleFormato'] 				= JSON.stringify(agruparDetalleRequerimientoformato());
	

	console.log("Datos a enviar: datosIngreso:"+datosRequerimiento);

    
        $.ajax({
        	url: base_url+'/Requerimiento/setFormato',
        	type: "POST",     
	        dataType: 'json',
	        data:datosRequerimiento,    
	        cache: false,

	           success: function(data, textStatus, jqXHR){
	        	console.log(data);

	        	if(jqXHR.status == 200){
	        		if(data.status){
						
		        		swal(data.title, data.msg, "success");
		        		$('.confirm').removeClass('btn btn-danger').removeClass('btn btn-warning').addClass('btn btn-success');
		        		$('#tableTotalFormatos').DataTable().ajax.reload();
		        		cancelFormato();
		        		

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
        return false;
});


/*************** INICIO DE FORMATO **************************/



function agruparDetalleRequerimiento (){
	var row;
	var rows = new Array(); 
	
	$('#tableDetalleRequerimiento input[name="idProducto"]').each(function(){
		var idProducto = $(this).val();
		var cantidadA = $('#cantA'+idProducto).val();
		

		row = new Object();
		row['idProducto'] = idProducto;
		row['cantidadA'] = cantidadA;
		rows.push(row);
		//alert(idProducto+' - '+cantidadA+' - '+cantidadB+' - '+cantidadC);
	});
	return rows;
}

function verificaDetalleRequerimiento (){
	// se verificará si la tabla de los productos vienen en 0, en caso de que haya ceros, no realiza el post de la tabla
	var CantidadDeProductosEnCeros = 0;
	var cantProductos = 0;
	

	
	$('#tableDetalleRequerimiento input[name="idProducto"]').each(function(){
		var idProducto = $(this).val();
		var cantidadA  = $('#cantA'+idProducto).val();

		if (cantidadA == 0) {
			CantidadDeProductosEnCeros++;

			}

		if(idProducto > 0){
 					cantProductos++;
			}
	});
	// envia 0 si todos tienen cantidad, en caso contrario notifica cuántos hay con 0
	var valores = [cantProductos, CantidadDeProductosEnCeros];
	console.log(valores);
	console.log(CantidadDeProductosEnCeros);
	return valores;
}

function enviarRequerimiento(){
	var hayceros = 0;
	hayceros = verificaDetalleRequerimiento();
	if (hayceros[0] >= 1 && hayceros[1] == 0) {
 		$("#form_requerimiento").submit();
 	} else{
 		swal({  
 			title: 	"",
		    text: 	"Llenar productos y cantidades.",
		    type: 	"error"},
		    function(){ 
		    	setTimeout(function() {
		          $('#cboproceso').focus();
		    	}, 10)
		});
 	}
 }



$("#form_requerimiento").submit(function() { 
    
    var datosRequerimiento = new Object();
	datosRequerimiento['txtcontrolRequerimiento'] 		= $("#txtcontrolrequerimiento").val();
	datosRequerimiento['cboproceso'] 					= $("#cboproceso").val();
	datosRequerimiento['consumo']						= $("#txtIdCentroconsumo").val();
	datosRequerimiento['solicitante'] 					= $("#txtsolicitante").val();
	datosRequerimiento['prioridad'] 					= $("#cboprioridad").val();
	datosRequerimiento['fase'] 							= $("#cbofase").val();
	datosRequerimiento['cantidad'] 						= $("#txtcantidad").val();
	datosRequerimiento['turno'] 						= $("#cboturno").val();
	datosRequerimiento['norden'] 						= $("#txtorden").val();
	datosRequerimiento['actividad'] 					= $("#txtactividad").val();
	datosRequerimiento['fechaactividad'] 				= $("#txtfechaactividad").val();	
	datosRequerimiento['alinea'] 						= $("#cboanalistalinea").val();
	datosRequerimiento['aturno'] 						= $("#cboanalistaturno").val();
	datosRequerimiento['observaciones'] 				= $("#txtobservaciones").val();

	datosRequerimiento['detalleReq'] 					= JSON.stringify(agruparDetalleRequerimiento());
	

	console.log("Datos a enviar: datosIngreso:"+datosRequerimiento);

    
        $.ajax({
        	url: base_url+'/Requerimiento/setRequerimiento',
        	type: "POST",     
	        dataType: 'json',
	        data:datosRequerimiento,    
	        cache: false,

	           success: function(data, textStatus, jqXHR){
	        	//console.log(data);

	        	if(jqXHR.status == 200){
	        		if(data.status){
						
		        		swal(data.title, data.msg, "success");
		        		$('.confirm').removeClass('btn btn-danger').removeClass('btn btn-warning').addClass('btn btn-success');
		        		$('#tableTotalIngresos').DataTable().ajax.reload();
		        		cancelRequerimiento();
		        		OcultarPanel();

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
        return false;
});

function cancelRequerimiento(){
      
      $(".claseSelect").val('').trigger('change');
      $(".claseInput").val('');
      $("#tablarequesolicitud").html('');


    $('#paneldetallerequerimiento').show();
	$('#panelboton').show();
	$('#panelrequerimiento').hide();
	$('#paneldetallerequerimientoid').hide();
	

	
      
}

function cancelformato(){
      
      $(".claseSelect").val('').trigger('change');
      $(".claseInput").val('');
      $("#tablarequesolicitudformato").html('');


    $('#paneldetallerequerimientoformato').show();
	$('#panelbotonformato').show();
	$('#panelrequerimientoformato').hide();
	$('#paneldetallerequerimientoidformato').hide();
      
}


function cancelFormato(){
      
      $(".claseSelect").val('').trigger('change');
      $(".claseInput").val('');
      $("#tablarequesolicitudformato").html('');


    $('#paneldetallerequerimientoformato').show();
	$('#panelbotonformato').show();
	$('#panelrequerimientoformato').hide();
	$('#paneldetallerequerimientoidformato').show();
      
}





function addProduct(idProducto){
	
	if ($("#fila-"+idProducto).length == 0) { 
	 $.ajax({
	 	url: base_url+"/Requerimiento/llenartablaproductorequerimiento/"+idProducto,
	 	type: 'post',
	 	 	success: function(respuesta){

	 		// console.log('Respuesta: '+respuesta);
	 	// /*	
	 		$("#tableDetalleRequerimiento tbody").append(respuesta);
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
	            $("#cboprocesoformato").selectpicker('destroy');
	            $("#cboprocesoformato").html(data).selectpicker('refresh');
	        }
	    }
	});
}

function cboFase(){
	$.ajax({
	    type: "GET",
	    async : false,
	    url: base_url+'/Requerimiento/getSelectFase', 
	    success: function(data, textStatus, jqXHR){
	    	if(jqXHR.status == 200){
	            //console.log(data);
	            $("#cbofase").selectpicker('destroy');
	            $("#cbofase").html(data).selectpicker('refresh');
	            $("#cbofaseformato").selectpicker('destroy');
	            $("#cbofaseformato").html(data).selectpicker('refresh');
	        }
	    }
	});
}



function llamarusuario(){	

	$.ajax({
      	type:'GET',
      	url: base_url+"/Requerimiento/getusuario",
      	dataType:'json',
      	success: function(data, textStatus, jqXHR){
	       	
	       	if(jqXHR.status == 200){
	       		console.log(data);
		        if(data.status){
			       
			        $('#txtcentroconsumo').val(data.data.Descripcion);
			    	$('#txtsolicitante').val(data.data.nombre);
			    	$('#txtIdCentroconsumo').val(data.data.IdCentroConsumo);

			    	$('#txtcentroconsumoformato').val(data.data.Descripcion);
			    	$('#txtsolicitanteformato').val(data.data.nombre);
			    	$('#txtIdCentroconsumoformato').val(data.data.IdCentroConsumo);

			    	txtIdCentroconsumo
			    				        
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



function VisualizarPanel(){ 

	$('#paneldetallerequerimiento').hide();
	$('#panelboton').hide();
	$('#panelrequerimiento').show();
	$('#paneldetallerequerimientoid').hide();

	
}

function VisualizarPanelformato(){ 

	$('#paneldetallerequerimientoformato').hide();
	$('#panelbotonformato').hide();
	$('#panelrequerimientoformato').show();
	$('#paneldetallerequerimientoidformato').hide();

	
}



function OcultarPanel(){ 

	$('#paneldetallerequerimiento').show();
	$('#panelboton').show();
	$('#panelrequerimiento').hide();

	
}

function VisualizarModalProducto(){ 

	$('#modal_buscarproducto').modal('show');

}

function VisualizarModalProductoformato(){ 

	$('#modal_buscarproductoformato').modal('show');

}
function Visualizarmodarcrearproveedor(){ 

	$('#modal_crearproveedor').modal('show');
	
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
		"url": base_url+"/Requerimiento/gettablebuscarproductoReq",
		"type": "POST",
		"dataType": "json"
	},
	"columns": [
	{"data":"orden"}, 
	{"data":"CodProducto"}, 
	{"data":"producto"}, 
	{"data":"uma"}, 
	{"data":"tipo"}, 
	{"data":"Existencia"}, 	
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


/*================================================  FUNCTIONS BUSCAR PRODUCTO  ================================================*/
/* TABLE BUSCAR PRODUCTO FORMATO */
var tablebuscarproductoformato = $('#tablebuscarproductoformato').DataTable({
	"processing": true,
	"serverSide": true,
	"order": [],
	"language": {
		"url": base_url+'/Assets/js/es-pe.json'
	},
	"ajax": {
		"url": base_url+"/Requerimiento/gettablebuscarproductoReqformato",
		"type": "POST",
		"dataType": "json"
	},
	"columns": [
	{"data":"orden"}, 
	{"data":"CodProducto"}, 
	{"data":"producto"}, 
	{"data":"uma"}, 
	{"data":"tipo"}, 
		
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





/*================================================  FUNCTION TABLE TOTAL DE INGRESOS   ================================================*/
/* TABLE TOTAL DE INGRESOS */
var tabletotalingresos = $('#tableTotalIngresos').DataTable({
	"processing": true,
	"serverSide": true,
	"order": [],
	"language": {
		"url": base_url+'/Assets/js/es-pe.json'
	},
	"ajax": {
		"url": base_url+"/Requerimiento/gettabletotalrequerimientos",
		"type": "POST",
		"dataType": "json"
	},
	"columns": [
	{"data":"orden"}, 	 
	{"data":"Descripcion"}, 
	{"data":"nombre"}, 
	{"data":"Fecha"},
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


/*================================================  FUNCTION TABLE DETALLE DE INGRESOS   ================================================*/
/* TABLE TOTAL DE INGRESOS */



/*================================================  FUNCTION TABLE TOTAL DE FORMATO   ================================================*/
/* TABLE TOTAL DE INGRESOS */
var tabletotalformatos = $('#tableTotalFormatos').DataTable({
	"processing": true,
	"serverSide": true,
	"order": [],
	"language": {
		"url": base_url+'/Assets/js/es-pe.json'
	},
	"ajax": {
		"url": base_url+"/Requerimiento/gettabletotalformato",
		"type": "POST",
		"dataType": "json"
	},
	"columns": [
	{"data":"orden"}, 	 
	{"data":"Descripcion"}, 
	{"data":"nombre"}, 
	{"data":"Fecha"},
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


/*================================================  FUNCTION TABLE DETALLE DE FORMATO   ================================================*/
/* TABLE TOTAL DE INGRESOS */FORMATO


function VisualizarModalDetalleIngresos(id){ 
	alert(id);
	$('#modal_detalledeingresos').modal('show');

	


var tabledetalleingresos = $('#tabledetalledeingresos').DataTable({
	"processing": true,
	"serverSide": true,
	"order": [],
	"language": {
		"url": base_url+'/Assets/js/es-pe.json'
	},
	"ajax": {
		"url": base_url+"/Compra/gettabledetalleingresos/"+id,
		"type": "POST",
		"dataType": "json"
	},
	"columns": [
	{"data":"orden"}, 
	{"data":"Fecha"}, 
	{"data":"Serie"}, 
	{"data":"producto"}, 
	{"data":"tipo"},
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





