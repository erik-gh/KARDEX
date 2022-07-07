// JavaScript Document
$(document).ready(function(){

	//verlistadoModulos();
	
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

cboProyecto();
cboCliente();
cboAsesor();
cboBanco();
cboBanco2();

/*================================================  FUNCTIONS CLIENTE  ================================================*/
/* TABLE CLIENTE */
var tableProyecto = $('#tableCliente').DataTable({
	"processing": true,
	"serverSide": true,
	"order": [],
	"language": {
		"url": base_url+'/Assets/js/es-pe.json'
	},
	"ajax": {
		"url": base_url+"/Cliente/getClientes",
		"type": "POST",
		"dataType": "json"
	},
	"columns": [
	{"data":"orden"}, 
	
	{"data":"Nombre"}, 
	{"data":"Dni"}, 
	{"data":"Celular"},
	{"data":"Correo"},
	{"data":"Contacto"},
	{"data":"opciones"}, 
	],
	"resonsieve":"true",
	"dDestroy": true,
	"iDisplayLength": 10,
	/*"order": [[0,"asc"]],*/
	"columnDefs": [{
		"targets": [0 , 4],
		"orderable": false,
	}, ],
});


/* REGISTER CLIENTE */
$("#form_registercliente").submit(function() {
    
    var nombre		= $('#txtnombre').val();
    var dni			= $('#txtdni').val();
    var total 		= nombre.length * dni.length;

    var requestCliente 					= new Object();
    requestCliente["IdCliente"]			= $("#txtIdCliente").val(); //este espara cuando vas a editar te guarde el id del proyecto
    requestCliente["controlCliente"]	= $("#txtcontrolCliente").val(); //este hace el control si vas a registrar o editar (0=registra y 1=edita)
    
	requestCliente["nombre"]			= $("#txtnombre").val();
	requestCliente["dni"]				= $("#txtdni").val();
	requestCliente["direccion"]			= $("#txtdireccion").val();
	requestCliente["fechanacimiento"]	= $("#txtfechanacimiento").val();
	requestCliente["celular"]			= $("#txtcelular").val();
	requestCliente["correo"]			= $("#txtcorreo").val();
	requestCliente["contacto"]			= $("#txtcontacto").val();





	//requestPerfil["estado"]			= ($('#chkestadoPerfil').prop('checked') ? '1' : '2'); // consultar a edie

    if (total>0){
        $.ajax({
            url: base_url+'/Cliente/setCliente',
	        type: "POST",     
	        dataType: 'json',
	        data:requestCliente,    
	        cache: false,
	        	
	        success: function(data, textStatus, jqXHR){
	        	console.log(data);

	        	if(jqXHR.status == 200){
	        		if(data.status){
						/*console.log(textStatus);
		        		console.log(jqXHR.status);*/
		        		swal(data.title, data.msg, "success");
		        		$('.confirm').removeClass('btn btn-danger').removeClass('btn btn-warning').addClass('btn btn-success');
		        		$('#tableCliente').DataTable().ajax.reload();
		        		$('#form_registercliente')[0].reset();
		        		$('#form_registercliente').validate().resetForm();
		        		cancelProyecto();
		        		return false;

	        		}else{
		        		swal({  title: 	data.title,
							    text: 	data.msg,
							    type: 	"error"},
							    function(){ 
							    	setTimeout(function() {
							          $('#txtnombre').focus();
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


/* SHOW PROYECTO */
function editarCliente(id){
	// alert('ID a mostrar: '+id);
	$('#txtIdCliente').val(id);
    $('#txtcontrolCliente').val('1');
    $("#updateCliente").removeAttr('style');
    $("#agregarCliente").css("display","none");
    $("#titlePerfil").html("<strong>EDITAR CLIENTE</strong>");
    //$('#estado_perfil').show();

	$.ajax({
      	type:'GET',
      	url: base_url+"/Cliente/getCliente/"+id,
      	dataType:'json',
      	success: function(data, textStatus, jqXHR){
	       	
	       	if(jqXHR.status == 200){
	       		console.log(data);
		        if(data.status){
			      
			        $('#txtnombre').val(data.data.Nombre);
			        $('#txtdni').val(data.data.Dni);
			        $('#txtdireccion').val(data.data.Direccion);
			        $('#txtfechanacimiento').val(data.data.FechaNacimiento);
			        $('#txtcelular').val(data.data.Celular);
			        $('#txtcorreo').val(data.data.Correo);
			        $('#txtcontacto').val(data.data.Contacto);


			        
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


/* DELETE Proyecto */
function eliminarCliente(id){
	//alert('ID a eliminar es: '+id)
	$('.confirm').removeClass('btn btn-success').removeClass('btn btn-danger').removeClass('btn btn-warning');
  	swal({  title: "Eliminar Cliente",
      	text: "¿Desea eliminar este Cliente?",
      	type: "warning",
      	showCancelButton: true,
      	cancelButtonText: "Cancelar",
      	confirmButtonColor: "#ff9600",
      	confirmButtonText: "Aceptar",
      	closeOnConfirm: false },
      	function(){ 
          	$.ajax({
	            type:'DELETE',
	            url: base_url+"/Cliente/delCliente/"+id,
	            dataType:'json',
	            success: function(data, textStatus, jqXHR){
	              	if(jqXHR.status == 200){
	              		console.log(data);
	              		if(data.status){

	              			swal(data.title, data.msg, "success");
		        			$('.confirm').removeClass('btn btn-danger').removeClass('btn btn-warning').addClass('btn btn-success');
		        			$('#tableCliente').DataTable().ajax.reload();
		        			cancelCliente();
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


/* CANCEL Proyecto */
function cancelCliente(){
      $("#agregarCliente").removeAttr('style');
      $("#updateCliente").css("display","none");
      $("#titleCliente").html("<strong>REGISTRAR CLIENTE</strong>");
      //$('#estado_perfil').hide();
      $('#form_registercliente')[0].reset();
      $('#form_registercliente').validate().resetForm();
      $('#txtcontrolCliente').val('0');
      //$('#txtperfil').attr('disabled',false);
      $('#form_registercliente .form-group').removeClass('has-success');
      $('#txtnombre').focus();
}

function cboProyecto(){
	$.ajax({
	    type: "GET",
	    async : false,
	    url: base_url+'/Producto/getSelectProyecto', 
	    success: function(data, textStatus, jqXHR){
	    	if(jqXHR.status == 200){
	            //console.log(data);
	            $("#cboproyecto").selectpicker('destroy');
	            $("#cboproyecto").html(data).selectpicker('refresh');
	        }
	    }
	});
}


function cboCliente(){
	$.ajax({
	    type: "GET",
	    async : false,
	    url: base_url+'/Cliente/getSelectCliente', 
	    success: function(data, textStatus, jqXHR){
	    	if(jqXHR.status == 200){
	            //console.log(data);
	            $("#cbocliente").selectpicker('destroy');
	            $("#cbocliente").html(data).selectpicker('refresh');
	        }
	    }
	});
}


function cboAsesor(){
	$.ajax({
	    type: "GET",
	    async : false,
	    url: base_url+'/Cliente/getSelectAsesor', 
	    success: function(data, textStatus, jqXHR){
	    	if(jqXHR.status == 200){
	            //console.log(data);
	            $("#cboasesor").selectpicker('destroy');
	            $("#cboasesor").html(data).selectpicker('refresh');
	        }
	    }
	});
}


function cboBanco(){
	$.ajax({
	    type: "GET",
	    async : false,
	    url: base_url+'/Cliente/getSelectBanco', 
	    success: function(data, textStatus, jqXHR){
	    	if(jqXHR.status == 200){
	            //console.log(data);
	            $("#cbobanco").selectpicker('destroy');
	            $("#cbobanco").html(data).selectpicker('refresh');
	        }
	    }
	});
}

function cboBanco2(){
	$.ajax({
	    type: "GET",
	    async : false,
	    url: base_url+'/Cliente/getSelectBanco', 
	    success: function(data, textStatus, jqXHR){
	    	if(jqXHR.status == 200){
	            //console.log(data);
	            $("#cbobanco2").selectpicker('destroy');
	            $("#cbobanco2").html(data).selectpicker('refresh');
	        }
	    }
	});
}

function viewTablaproductos(){ 
   
    var proyecto  = $("#cboproyecto").val();

    var tableCursoEspec = $('#tableProducto').DataTable({
        //"processing": true,
        //"serverSide": true,
        "destroy": true,
        "order": [],
        "language": {
            "url": base_url+'/Assets/js/es-pe.json'
        },
        "ajax": {
            "url": base_url+'/Cliente/tablaproducto',
            "type": "POST",
            'data' : {'proyecto' : proyecto},
            "dataType": "json"
        },
        "columns": [
        {"data":"orden"},
		{"data":"Proyecto"}, 
		{"data":"Lote"}, 
		{"data":"Manzana"}, 
		{"data":"Medida"}, 
		{"data":"Detalles"}, 
		{"data":"Precio"}, 
		{"data":"Estado"}, 
		{"data":"opciones"}, 
        ],
        "resonsieve":"true",
        "dDestroy": true,
        "iDisplayLength": 10,
        /*"order": [[0,"asc"]],*/
        "columnDefs": [{
            "targets": [0],
            "orderable": false,
        }, ],
    });
}


function viewTablaproductos2(){ 
   
    var proyecto  = $("#cboproyecto").val();

    var tableCursoEspec = $('#tableProducto2').DataTable({
        //"processing": true,
        //"serverSide": true,
        "destroy": true,
        "order": [],
        "language": {
            "url": base_url+'/Assets/js/es-pe.json'
        },
        "ajax": {
            "url": base_url+'/Cliente/tablaproducto2',
            "type": "POST",
            'data' : {'proyecto' : proyecto},
            "dataType": "json"
        },
        "columns": [
        {"data":"orden"},
		{"data":"Cliente"}, 
		{"data":"Lote"}, 
		{"data":"Manzana"}, 
		{"data":"Medida"}, 
		{"data":"Inicial"},
		{"data":"Inicialdep"}, 
		{"data":"Precio"}, 
		{"data":"Estado"}, 
		{"data":"opciones"}, 
        ],
        "resonsieve":"true",
        "dDestroy": true,
        "iDisplayLength": 10,
        /*"order": [[0,"asc"]],*/
        "columnDefs": [{
            "targets": [0],
            "orderable": false,
        }, ],
    });
}

/* REGISTER VENTA */
$("#form_registerventa").submit(function() {

    var cliente		= $('#cbocliente').val();
    var asesor		= $('#cboasesor').val();
    var total 		= cliente.length * asesor.length;

    var requestVenta					= new Object();
    requestVenta["IdProducto"]			= $("#txtIdProducto").val(); //este espara cuando vas a editar te guarde el id del proyecto
    requestVenta["controlVenta"]		= $("#txtcontrolIdVenta").val(); //este hace el control si vas a registrar o editar (0=registra y 1=edita)
    
	requestVenta["cliente"]				= $("#cbocliente").val();
	requestVenta["asesor"]				= $("#cboasesor").val();
	requestVenta["banco"]				= $("#cbobanco").val();
	requestVenta["fecha"]				= $("#txtFecha").val();
	requestVenta["voucher"]				= $("#txtvoucher").val();
	requestVenta["inicial"]				= $("#txtinicial").val();
	requestVenta["observacion"]			= $("#txtObservacion").val();

	requestVenta["select-evento"]			= $("#cboselect-evento").val();
	// algo asi


    if (total>0){
        $.ajax({
            url: base_url+'/Cliente/setVenta',
	        type: "POST",     
	        dataType: 'json',
	        data:requestVenta,    
	        cache: false,
	        	
	        success: function(data, textStatus, jqXHR){
	        	console.log(data);

	        	if(jqXHR.status == 200){
	        		if(data.status){
						/*console.log(textStatus);
		        		console.log(jqXHR.status);*/
		        		swal(data.title, data.msg, "success");
		        		$('.confirm').removeClass('btn btn-danger').removeClass('btn btn-warning').addClass('btn btn-success');
		        		
		        		$('#tableProducto').DataTable().ajax.reload();
		        		$('#tableProducto2').DataTable().ajax.reload();
		        		$('#form_registerventa')[0].reset();
		        		$('#form_registerventa').validate().resetForm();
		        		$('#modal_moduloventa').modal('hide');
		        		


		        		//cancelProyecto();
		        		return false;

	        		}else{
		        		swal({  title: 	data.title,
							    text: 	data.msg,
							    type: 	"error"},
							    function(){ 
							    	setTimeout(function() {
							          $('#txtnombre').focus();
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


/* REGISTER VENTA */
$("#form_registerventa").submit(function() {

    var cliente		= $('#cbocliente').val();
    var asesor		= $('#cboasesor').val();
    var total 		= cliente.length * asesor.length;

    var requestVenta					= new Object();
    requestVenta["IdProducto"]			= $("#txtIdProducto").val(); //este espara cuando vas a editar te guarde el id del proyecto
    requestVenta["controlVenta"]		= $("#txtcontrolIdVenta").val(); //este hace el control si vas a registrar o editar (0=registra y 1=edita)
    
	requestVenta["cliente"]				= $("#cbocliente").val();
	requestVenta["asesor"]				= $("#cboasesor").val();
	requestVenta["banco"]				= $("#cbobanco").val();
	requestVenta["fecha"]				= $("#txtFecha").val();
	requestVenta["voucher"]				= $("#txtvoucher").val();
	requestVenta["inicial"]				= $("#txtinicial").val();
	requestVenta["observacion"]			= $("#txtObservacion").val();

	requestVenta["select-evento"]			= $("#cboselect-evento").val();
	// algo asi


    if (total>0){
        $.ajax({
            url: base_url+'/Cliente/setVenta',
	        type: "POST",     
	        dataType: 'json',
	        data:requestVenta,    
	        cache: false,
	        	
	        success: function(data, textStatus, jqXHR){
	        	console.log(data);

	        	if(jqXHR.status == 200){
	        		if(data.status){
						/*console.log(textStatus);
		        		console.log(jqXHR.status);*/
		        		swal(data.title, data.msg, "success");
		        		$('.confirm').removeClass('btn btn-danger').removeClass('btn btn-warning').addClass('btn btn-success');
		        		
		        		$('#tableProducto').DataTable().ajax.reload();
		        		$('#tableProducto2').DataTable().ajax.reload();
		        		$('#form_registerventa')[0].reset();
		        		$('#form_registerventa').validate().resetForm();
		        		$('#modal_moduloventa').modal('hide');
		        		


		        		//cancelProyecto();
		        		return false;

	        		}else{
		        		swal({  title: 	data.title,
							    text: 	data.msg,
							    type: 	"error"},
							    function(){ 
							    	setTimeout(function() {
							          $('#txtnombre').focus();
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


/* REGISTER DETALLEVENTA */
$("#form_registerdetalleventa").submit(function() {

    var cliente		= $('#txtcliente').val();
    var banco		= $('#cbobanco2').val();
    var total 		= cliente.length * banco.length;

    var requestDetalleVenta					= new Object();
    requestDetalleVenta["IdDetalleVenta"]			= $("#txtDetalleVenta").val(); //este espara cuando vas a editar te guarde el id del proyecto
    requestDetalleVenta["controlDetalleVenta"]		= $("#txtcontrolIdDetalleVenta").val(); //este hace el control si vas a registrar o editar (0=registra y 1=edita)
    
	requestDetalleVenta["cliente"]				= $("#txtcliente").val();
	requestDetalleVenta["banco"]				= $("#cbobanco2").val();
	requestDetalleVenta["fecha"]				= $("#txtFecha2").val();
	requestDetalleVenta["voucher"]				= $("#txtvoucher2").val();
	requestDetalleVenta["inicial2"]				= $("#txtinicial2").val();
	requestDetalleVenta["fechapago"]			= $("#txtfechapago").val();
	requestDetalleVenta["cuotas"]				= $("#txtcuotas").val();
	requestDetalleVenta["monto"]				= $("#txtmontocuotas").val();

	
	// algo asi


    if (total>0){
        $.ajax({
            url: base_url+'/Cliente/setDetalleVenta',
	        type: "POST",     
	        dataType: 'json',
	        data:requestDetalleVenta,    
	        cache: false,
	        	
	        success: function(data, textStatus, jqXHR){
	        	console.log(data);

	        	if(jqXHR.status == 200){
	        		if(data.status){
						/*console.log(textStatus);
		        		console.log(jqXHR.status);*/
		        		swal(data.title, data.msg, "success");
		        		$('.confirm').removeClass('btn btn-danger').removeClass('btn btn-warning').addClass('btn btn-success');
		        		
		        		$('#tableProducto').DataTable().ajax.reload();
		        		$('#tableProducto2').DataTable().ajax.reload();
		        		$('#form_registerdetalleventa')[0].reset();
		        		$('#form_registerdetalleventa').validate().resetForm();
		        		$('#modal_modulodetalleventa').modal('hide');
		        		


		        		//cancelProyecto();
		        		return false;

	        		}else{
		        		swal({  title: 	data.title,
							    text: 	data.msg,
							    type: 	"error"},
							    function(){ 
							    	setTimeout(function() {
							          $('#txtvoucher').focus();
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


function VisualizarModal(id){ 

	$('#modal_moduloventa').modal('show');
	
	$('#txtIdProducto').val(id);

	

}


function VisualizarModaldetalleventa(id){ 

	$('#modal_modulodetalleventa').modal('show');
	$('#txtDetalleVenta').val(id);

	$('#txtcliente').val(data.data.Nombre).addClass('vld').attr('disabled',true);

	
	
}



function cancelRegistroVenta(){
   
    $('#form_registerventa')[0].reset();
    $('#form_registerventa').validate().resetForm();
    $('#form_registerventa .form-group').removeClass('has-success');
    $("#cbobanco").selectpicker('destroy');
    $("#cboasesor").selectpicker('destroy');
    $("#cbocliente").selectpicker('destroy');

    $("#cbobanco").html(data).selectpicker('refresh');
    $("#cbocliente").html(data).selectpicker('refresh');
    $("#cboasesor").html(data).selectpicker('refresh');
  
   
    
}








