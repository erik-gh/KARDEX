// JavaScript Document
$(document).ready(function(){

	//verlistadoModulos();
	
});


function verificaCantidad(valor, idProducto,tipo){

var etiqueta = '';

if (tipo == 1) {
	etiqueta = 'cantA'+idProducto;
} else if(tipo == 2){
	etiqueta = 'cantB'+idProducto;
} else{
	etiqueta = 'cantC'+idProducto;
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
	
	$("#"+etiqueta).val(0);
}

}




function SoloNum() {
	if ((event.keyCode < 48) || (event.keyCode > 57)) 
  	event.returnValue = false;
}

function SoloLetras() {
 	if ((event.keyCode != 32) && (event.keyCode < 65) || (event.keyCode > 90) && (event.keyCode < 97) || (event.keyCode > 122) && (event.keyCode < 164))
  	event.returnValue = false;
}

$('#panelingreareainterna').hide();
$('#panelingrecompra').hide();
$('#paneldetallecompraid').hide();
$('#panelingresarepliegue').hide();	
$('#paneldetallecompras').hide();



cboTipoDocumento();
cboTipoDocumento2();
cboProveedor();
cboProveedor2();
cboProceso();
cboProceso2();
cboTipoDeIngreso();
CboAlmacen();
CboAlmacen2();



function eliminarCompra(id){
	//alert('ID a eliminar es: '+id)
	$('.confirm').removeClass('btn btn-success').removeClass('btn btn-danger').removeClass('btn btn-warning');
  	swal({  title: "ALERTA - AVISO IMPORTANTE",
      	text: "¿Desea eliminar esta COMPRA ?",
      	type: "warning",
      	showCancelButton: true,
      	cancelButtonText: "Cancelar",
      	confirmButtonColor: "#ff9600",
      	confirmButtonText: "Aceptar",
      	closeOnConfirm: false },
      	function(){ 
          	$.ajax({
	            type:'DELETE',
	            url: base_url+"/Compra/DeleteCompra/"+id,
	            dataType:'json',
	            success: function(data, textStatus, jqXHR){
	              	if(jqXHR.status == 200){
	              		console.log(data);
	              		if(data.status){

	              			swal(data.title, data.msg, "success");
		        			$('.confirm').removeClass('btn btn-danger').removeClass('btn btn-warning').addClass('btn btn-success');
		        			//$('#tableCargos').DataTable().ajax.reload();
		        			//cancelCargo();
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

	


$("#cbotipoingreso").change(function(){	 

      
       var opc = document.getElementById('#cbotipoingreso');
      
       alert(opc);

	    if(opc == 2){
	 	$('#panelrc').show();

	 }
 

	});



 $("#btnEditar").on("click", function () {
    var responsable_asignado=$('#responsable_asignado').val();
    alert (responsable_asignado);
  })



 $("#IdMaterialIng").autocomplete({
        //Los datos, que son invocado mediante JQuery ajax
		
            source: function (request, response) {
                $.ajax({

			  type: "post",
                    url: base_url+'/Salida/buscarproducto',
                    data: { texto: $("#IdMaterialIng").val() },
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





/*================================================  FUNCTIONS PROVEEDOR  ================================================*/
/* TABLE PROVEEDOR */
var tableProveedor = $('#tableProveedor').DataTable({
	"processing": true,
	"serverSide": true,
	"order": [],
	"language": {
		"url": base_url+'/Assets/js/es-pe.json'
	},
	"ajax": {
		"url": base_url+"/Compra/getProveedores",
		"type": "POST",
		"dataType": "json"
	},
	"columns": [
	{"data":"orden"}, 
	
	{"data":"RazonSocial"}, 
	{"data":"Ruc"}, 
	{"data":"Celular"}, 	
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

function agruparDetalleCompra (){
	var row;
	var rows = new Array(); 
	
	$('#tableDetalleIngresoCompra input[name="idProducto"]').each(function(){
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


function agruparDetalleRepliegue(){
	var row;
	var rows = new Array(); 
	
	$('#tableDetalleIngresoRepliegue input[name="idProducto"]').each(function(){
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

/* REGISTER AREA INTERNA */

 function enviarFormIngreso(){
 	$("#form_registrarIngreso").submit();
 }


$("#form_registrarIngreso").submit(function() { 
    
    var datosIngreso = new Object();
	datosIngreso['txtcontrolCompra'] 	= $("#txtcontrolCompra").val();
	datosIngreso['cboalmacen'] 			= $("#cboalmacen").val();
	datosIngreso['cboproceso'] 			= $("#cboproceso").val();
	datosIngreso['cbotipoingreso'] 		= $("#cbotipoingreso").val();
	datosIngreso['cboproveedor']		= $("#cboproveedor").val();
	datosIngreso['cbotipodocumento'] 	= $("#cbotipodocumento").val();
	datosIngreso['txtfechadoc'] 		= $("#txtfechadoc").val();
	datosIngreso['txtserie'] 			= $("#txtserie").val();
	datosIngreso['detalleIng'] 			= JSON.stringify(agruparDetalle());
	

	console.log("Datos a enviar: datosIngreso:"+datosIngreso);

    
        $.ajax({
        	url: base_url+'/Compra/setIngreso',
        	type: "POST",     
	        dataType: 'json',
	        data:datosIngreso,    
	        cache: false,

	           success: function(data, textStatus, jqXHR){
	        	console.log(data);

	        	if(jqXHR.status == 200){
	        		if(data.status){
						
		        		swal(data.title, data.msg, "success");
		        		$('.confirm').removeClass('btn btn-danger').removeClass('btn btn-warning').addClass('btn btn-success');
		        		
		        		$('#tableTotalIngresos2').DataTable().ajax.reload();
		        		cancelDetalleIngreso();

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


/* FIN REGISTER AREA INTERNA */



/* REGISTER COMPRA O ADQUI*/
 function enviarFormCompraAdqui(){
 	$("#form_registrarCompra").submit();
 }


$("#form_registrarCompra").submit(function() { 
    
    var datosIngreso = new Object();
	datosIngreso['txtcontrolCompra'] 	= $("#txtcontrolCompra").val();
	datosIngreso['cboalmacen'] 			= $("#cboalmacen2").val();
	datosIngreso['cboproceso'] 			= $("#cboproceso2").val();
	datosIngreso['cboproveedor']		= $("#cboproveedor2").val();
	datosIngreso['cbotipodocumento'] 	= $("#cbotipodocumento2").val();
	datosIngreso['txtfechadoc'] 		= $("#txtfechadoc2").val();
	datosIngreso['txtserie'] 			= $("#txtserie2").val();
	datosIngreso['txtnumeropedido'] 	= $("#txtnumeropedido").val();
	datosIngreso['txtordecompra'] 		= $("#txtordecompra").val();
	datosIngreso['txtpecosa'] 			= $("#txtpecosa").val();

	datosIngreso['detalleIng'] 			= JSON.stringify(agruparDetalleCompra());
	

	console.log("Datos a enviar: datosIngreso:"+datosIngreso);
    
        $.ajax({
        	url: base_url+'/Compra/setCompraAdqui',
        	type: "POST",     
	        dataType: 'json',
	        data:datosIngreso,    
	        cache: false,

	           success: function(data, textStatus, jqXHR){
	        	console.log(data);

	        	if(jqXHR.status == 200){
	        		if(data.status){
						
		        		swal(data.title, data.msg, "success");
		        		$('.confirm').removeClass('btn btn-danger').removeClass('btn btn-warning').addClass('btn btn-success');
		        		//$('#tableDetalleIngreso').DataTable().ajax.reload();
		        		cancelDetalleIngreso();

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


/* FIN REGISTER COMPRA O ADQUI*/




/* REGISTER REPLIEGUE*/
 function enviarFormRepliegue(){
 	$("#form_registrarRepliegue").submit();
 }


$("#form_registrarRepliegue").submit(function() { 
    
    var datosIngreso = new Object();
	datosIngreso['txtcontrolCompra'] 	= $("#txtcontrolCompra").val();
	datosIngreso['cboalmacen'] 			= $("#cboalmacen3").val();
	datosIngreso['cboproceso'] 			= $("#cboproceso3").val();
	datosIngreso['cboproveedor']		= $("#cboproveedor3").val();
	datosIngreso['cbotipodocumento'] 	= $("#cbotipodocumento3").val();
	datosIngreso['txtfechadoc'] 		= $("#txtfechadoc3").val();
	datosIngreso['txtserie'] 			= $("#txtserie3").val();
	datosIngreso['txtnumeropedido'] 	= $("#txtnumeropedido2").val();
	datosIngreso['txtordecompra'] 		= $("#txtordecompra2").val();
	datosIngreso['txtpecosa'] 			= $("#txtpecosa2").val();

	datosIngreso['detalleIng'] 			= JSON.stringify(agruparDetalleRepliegue	());
	

	console.log("Datos a enviar: datosIngreso:"+datosIngreso);

    
        $.ajax({
        	url: base_url+'/Compra/setRepliegue',
        	type: "POST",     
	        dataType: 'json',
	        data:datosIngreso,    
	        cache: false,

	           success: function(data, textStatus, jqXHR){
	        	console.log(data);

	        	if(jqXHR.status == 200){
	        		if(data.status){
						
		        		swal(data.title, data.msg, "success");
		        		$('.confirm').removeClass('btn btn-danger').removeClass('btn btn-warning').addClass('btn btn-success');
		        		//$('#tableDetalleIngreso').DataTable().ajax.reload();
		        		cancelDetalleIngreso();

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


/* FIN REGISTER REPLIEGUE*/







/* REGISTER PROVEEDOR */
$("#form_proveedor2").submit(function() { 
    
    var descripcion	= $('#txtrazonsocial2').val();
    var total 		= descripcion.length ; 


    var requestProveedor					= new Object();
    requestProveedor["IdProveedor"]			= $("#txtIdProveedor2").val();
    requestProveedor["controlProveedor"]	= $("#txtcontrolProveedor2").val();
	requestProveedor["razonsocial"]			= $("#txtrazonsocial2").val();
	requestProveedor["ruc"]					= $("#txtruc2").val();
	requestProveedor["celular"]				= $("#txtcelular2").val();
	requestProveedor["estado"]				= ($('#chkestadoproveedor2').prop('checked') ? '1' : '2');


	console.log(requestProveedor);

    if (total>0){ 
        $.ajax({
            url: base_url+'/Compra/setProveedor',
	        type: "POST",     
	        dataType: 'json',
	        data:requestProveedor,    
	        cache: false,

	        	
	        success: function(data, textStatus, jqXHR){
	        	console.log(data);

	        	if(jqXHR.status == 200){
	        		if(data.status){
						
		        		swal(data.title, data.msg, "success");
		        		$('.confirm').removeClass('btn btn-danger').removeClass('btn btn-warning').addClass('btn btn-success');
		        		$('#tableProveedor').DataTable().ajax.reload();
		        		cboProveedor();
						cboProveedor2();
		        		cancelProveedor();

		        		$('#form_proveedor2')[0].reset();
						$('#form_proveedor2').validate().resetForm();
     	 		    	$('#modal_crearproveedor').modal('hide');
		        		return false;

	        		}else{
		        		swal({  title: 	data.title,
							    text: 	data.msg,
							    type: 	"error"},
							    function(){ 
							    	setTimeout(function() {
							          $('#txtrazonsocial').focus();
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


function cancelAnularCompra(){
           
      $('#form_anularcompra')[0].reset();
      $('#form_anularcompra').validate().resetForm();
    
      $('#form_anularcompra .form-group').removeClass('has-success');
}




/* REGISTER PROVEEDOR */
$("#form_anularcompra").submit(function() { 
    
    var idanular	= $('#txtidanular').val();
    var total 		= idanular.length ; 


    var requestProveedor					= new Object();
    requestProveedor["IdAnular"]			= $("#txtidanular").val();
    requestProveedor["control"]				= $("#txtcontrolanular").val();
    requestProveedor["Observaciones"]		= $("#txtobsanular").val();


	console.log(requestProveedor);

    if (total>0){ 
        $.ajax({
            url: base_url+'/Compra/setAnular',
	        type: "POST",     
	        dataType: 'json',
	        data:requestProveedor,    
	        cache: false,

	        	
	        success: function(data, textStatus, jqXHR){
	        	console.log(data);

	        	if(jqXHR.status == 200){
	        		if(data.status){
						
		        		swal(data.title, data.msg, "success");
		        		$('.confirm').removeClass('btn btn-danger').removeClass('btn btn-warning').addClass('btn btn-success');
		        		//$('#tableTotalIngresos').DataTable().ajax.reload();
		        		$('#tableTotalIngresos2').DataTable().ajax.reload();
		        		


		        		$('#form_anularcompra')[0].reset();
						$('#form_anularcompra').validate().resetForm();
     	 		    	$('#modal_anularcompra').modal('hide');
		        	
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






/* SHOW PROVEEDOR */
function editarProveedor(id){
	//alert('ID a mostrar: '+id);
	$('#txtIdProveedor').val(id);
    $('#txtcontrolProveedor').val('1');
    $("#updateproveedor").removeAttr('style');
    $("#agregarproveedor").css("display","none");
    $("#titleProveedor").html("<strong>EDITAR PROVEEDOR</strong>");
    //$('#estado_perfil').show();

	$.ajax({
      	type:'GET',
      	url: base_url+"/Compra/getProveedor/"+id,
      	dataType:'json',
      	success: function(data, textStatus, jqXHR){
	       	
	       	if(jqXHR.status == 200){
	       		console.log(data);
		        if(data.status){
			       
			        $('#txtrazonsocial').val(data.data.RazonSocial);
			    	$('#txtruc').val(data.data.Ruc);
			    	$('#txtcelular').val(data.data.Celular);
			        
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

function cancelDetalleIngreso(){
      
      $(".claseSelect").val('').trigger('change');
      $(".claseInput").val('');
      $("#tablaIngresosBody").html('');
      $("#tablaIngresosBody2").html('');
      $("#tablaIngresosBody3").html('');

     	$('#panelingreareainterna').hide();
		$('#panelingrecompra').hide();
		$('#paneldetallecompraid').hide();
		$('#panelingresarepliegue').hide();	

		$('#panelboton').show();
		$('#paneldetallecompras').hide();
		$('#paneldetallecompras2').show();	
		$('#panelacordionbusq').show();
		


}


function VisualizarPanel(){ 

	$('#paneldetallecompras2').hide();
	$('#paneldetallecompras').hide();
	$('#panelboton').hide();
	$('#panelingreareainterna').show();
	$('#paneldetallecompraid').hide();
	$('#panelingresarepliegue').hide();	
	$('#panelacordionbusq').hide();



}



function VisualizarPanelRepliegue(){ 

	$('#paneldetallecompras2').hide();
	$('#paneldetallecompras').hide();
	$('#panelboton').hide();
	$('#panelingreareainterna').hide();
	$('#paneldetallecompraid').hide();
	$('#panelingresarepliegue').show();	
	$('#panelacordionbusq').hide();

}

function VisualizarPanelCompraoaqui(){ 

	$('#paneldetallecompras2').hide();
	$('#paneldetallecompras').hide();
	$('#panelboton').hide();
	$('#panelingrecompra').show();
	$('#paneldetallecompraid').hide();
	$('#panelingresarepliegue').hide();	
	$('#panelacordionbusq').hide();
		

}





function VisualizarModalProducto(){ 

	$('#modal_buscarproducto').modal('show');

	//$('#paneldetallecompras').hide();
	//$('#panelboton').hide();
	//$('#panelcompra').show();

		

}


function VisualizarModalProductoCompra(){ 

	$('#modal_buscarproductocompra').modal('show');

	//$('#paneldetallecompras').hide();
	//$('#panelboton').hide();
	//$('#panelcompra').show();

		

}

function VisualizarModalProductoRepliegue(){ 

	$('#modal_buscarproductorepliegue').modal('show');


	//$('#paneldetallecompras').hide();
	//$('#panelboton').hide();
	//$('#panelcompra').show();

		

}



function Visualizarmodarcrearproveedor(){ 

	$('#modal_crearproveedor').modal('show');


}



function Visualizarmodalanular(id){ 

	$('#txtidanular').val(id);
	$('#modal_anularcompra').modal('show');


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

function cboProveedor2(){
	$.ajax({
	    type: "GET",
	    async : false,
	    url: base_url+'/Compra/getSelectProveedor', 
	    success: function(data, textStatus, jqXHR){
	    	if(jqXHR.status == 200){
	            //console.log(data);
	            $("#cboproveedor2").selectpicker('destroy');
	            $("#cboproveedor2").html(data).selectpicker('refresh');
	            $("#cboproveedor3").selectpicker('destroy');
	            $("#cboproveedor3").html(data).selectpicker('refresh');
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

function cboProceso2(){
	$.ajax({
	    type: "GET",
	    async : false,
	    url: base_url+'/Compra/getSelectProceso', 
	    success: function(data, textStatus, jqXHR){
	    	if(jqXHR.status == 200){
	            //console.log(data);
	            $("#cboproceso2").selectpicker('destroy');
	            $("#cboproceso2").html(data).selectpicker('refresh');
	             $("#cboproceso3").selectpicker('destroy');
	            $("#cboproceso3").html(data).selectpicker('refresh');

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

function cboTipoDocumento2(){
	$.ajax({
	    type: "GET",
	    async : false,
	    url: base_url+'/Compra/getSelectTipoDocumento', 
	    success: function(data, textStatus, jqXHR){
	    	if(jqXHR.status == 200){
	            //console.log(data);
	            $("#cbotipodocumento2").selectpicker('destroy');
	            $("#cbotipodocumento2").html(data).selectpicker('refresh');
	            $("#cbotipodocumento3").selectpicker('destroy');
	            $("#cbotipodocumento3").html(data).selectpicker('refresh');
	        }
	    }
	});
}



function CboAlmacen(){
	$.ajax({
	    type: "GET",
	    async : false,
	    url: base_url+'/Compra/getSelectTipoAlmacen', 
	    success: function(data, textStatus, jqXHR){
	    	if(jqXHR.status == 200){
	            //console.log(data);
	            $("#cboalmacen").selectpicker('destroy');
	            $("#cboalmacen").html(data).selectpicker('refresh');
	        }
	    }
	});
}


function CboAlmacen2(){
	$.ajax({
	    type: "GET",
	    async : false,
	    url: base_url+'/Compra/getSelectTipoAlmacen', 
	    success: function(data, textStatus, jqXHR){
	    	if(jqXHR.status == 200){
	            //console.log(data);
	            $("#cboalmacen2").selectpicker('destroy');
	            $("#cboalmacen2").html(data).selectpicker('refresh');
	            $("#cboalmacen3").selectpicker('destroy');
	            $("#cboalmacen3").html(data).selectpicker('refresh');
	            $("#cboalmacenconsulta").selectpicker('destroy');
	            $("#cboalmacenconsulta").html(data).selectpicker('refresh');
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
		"url": base_url+"/Compra/gettablebuscarproducto",
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
if ($("#fila-"+idProducto).length == 0) { //para ver si existe el elemento y evitar duplicados
	 $.ajax({
	 	url: base_url+"/Compra/llenartablaproducto/"+idProducto,
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
	} 
}

function eliminarFila(fila){
	$("#"+fila).remove();
}



var tablebuscarproductocompra = $('#tablebuscarproductocompra').DataTable({
	"processing": true,
	"serverSide": true,
	"order": [],
	"language": {
		"url": base_url+'/Assets/js/es-pe.json'
	},
	"ajax": {
		"url": base_url+"/Compra/gettablebuscarproductocompras",
		"type": "POST",
		"dataType": "json"
	},
	"columns": [
	{"data":"orden"}, 
	{"data":"producto"}, 
	{"data":"uma"}, 
	{"data":"tipo"},
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

function addProductCompra(idProducto){
if ($("#fila-"+idProducto).length == 0) { //para ver si existe el elemento y evitar duplicados
	 $.ajax({
	 	url: base_url+"/Compra/llenartablaproductocompra/"+idProducto,
	 	type: 'post',
	 	 	success: function(respuesta){

	 		// console.log('Respuesta: '+respuesta);
	 	// /*	
	 		$("#tableDetalleIngresoCompra tbody").append(respuesta);
	 	},
	 	error: function(respuesta){
	 	//	console.log('Respuesta: '+respuesta);
	 	}
	 });
	} 
}


var tablebuscarproductorepliegue = $('#tablebuscarproductorepliegue').DataTable({
	"processing": true,
	"serverSide": true,
	"order": [],
	"language": {
		"url": base_url+'/Assets/js/es-pe.json'
	},
	"ajax": {
		"url": base_url+"/Compra/gettablebuscarproductorepliegue",
		"type": "POST",
		"dataType": "json"
	},
	"columns": [
	{"data":"orden"}, 
	{"data":"producto"}, 
	{"data":"uma"}, 
	{"data":"tipo"},
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


function addProductRepliegue(idProducto){
if ($("#fila-"+idProducto).length == 0) { //para ver si existe el elemento y evitar duplicados
	 $.ajax({
	 	url: base_url+"/Compra/llenartablaproductorepliegue/"+idProducto,
	 	type: 'post',
	 	 	success: function(respuesta){

	 		// console.log('Respuesta: '+respuesta);
	 	// /*	
	 		$("#tableDetalleIngresoRepliegue tbody").append(respuesta);
	 	},
	 	error: function(respuesta){
	 	//	console.log('Respuesta: '+respuesta);
	 	}
	 });
	} 
}


function btnpaneltotalingresos(){
$('#paneldetallecompras2').hide();
$('#paneldetallecompras').show();
}

/*================================================  FUNCTION TABLE TOTAL DE INGRESOS   ================================================*/
/* TABLE TOTAL DE INGRESOS */

function viewTablaTotaldeIngresos(){ 
	var almacen      	= $("#cboalmacenconsulta").val();
    var fechadesde      = $("#txtfechadesde").val();
    var fechahasta      = $("#txtfechahasta").val();


var tabletotalingresos = $('#tableTotalIngresos').DataTable({
	//"processing": true,
	//"serverSide": true,
	"destroy": true,
	"order": [],
	"language": {
		"url": base_url+'/Assets/js/es-pe.json'
	},
	"ajax": {
		"url": base_url+"/Compra/gettabletotalingresos",
		"type": "POST",
		'data' : { 'fechadesde' : fechadesde , 'fechahasta' : fechahasta , 'almacen' : almacen},
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

/*===========================SEGUNDA TABLE TOTAL INGRESOS ====================*/

var tabletotalingresos2 = $('#tableTotalIngresos2').DataTable({
	//"processing": true,
	//"serverSide": true,
	"destroy": true,
	"order": [],
	"language": {
		"url": base_url+'/Assets/js/es-pe.json'
	},
	"ajax": {
		"url": base_url+"/Compra/gettabletotalingresos2",
		"type": "POST",
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

function pdfcompra(id){

	var IdCompra = id;
			$('<form target="_blank" action="Compra/generarPdf/'+IdCompra+'" method="POST"></form>').appendTo('body').submit();
		}
		





function VisualizarTablaDetalleIngresos(id){ 
	//alert(id);

var idDetalleCompra = id;
$('#paneldetallecompraid').show();

var tabledetalleingresos = $('#tabledetalledeingresosid').DataTable({
	"destroy":true, // consultar si esta bien ?
	"processing": true,
	"serverSide": true,
	"order": [],
	"language": {
		"url": base_url+'/Assets/js/es-pe.json'
	},
	"ajax": {
		"url": base_url+"/Compra/gettabledetalleingresos/"+idDetalleCompra,
		"type": "POST",
		"dataType": "json"
	},
	"columns": [
	{"data":"orden"}, 
	{"data":"FechaCrea"}, 
	{"data":"Serie"},
	{"data":"codigo"}, 
	{"data":"producto"}, 
	{"data":"a"},
	{"data":"b"},
	{"data":"c"},
	{"data":"Cantidad"},	
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

