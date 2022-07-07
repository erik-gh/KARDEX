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

Cbofamilia();
CboClase();
CboUma();
CboConsumo();
CboCargo();


function eliminarClase(id){
	//alert('ID a eliminar es: '+id)
	$('.confirm').removeClass('btn btn-success').removeClass('btn btn-danger').removeClass('btn btn-warning');
  	swal({  title: "Eliminar Clase",
      	text: "¿Desea eliminar esta Clase?",
      	type: "warning",
      	showCancelButton: true,
      	cancelButtonText: "Cancelar",

      	
      	confirmButtonColor: "#ff9600",
      	confirmButtonText: "Aceptar",
      	closeOnConfirm: false },
      	function(){ 
          	$.ajax({
	            type:'DELETE',
	            url: base_url+"/Producto/delClase/"+id,
	            dataType:'json',
	            success: function(data, textStatus, jqXHR){
	              	if(jqXHR.status == 200){
	              		console.log(data);
	              		if(data.status){

	              			swal(data.title, data.msg, "success");
		        			$('.confirm').removeClass('btn btn-danger').removeClass('btn btn-warning').addClass('btn btn-success');
		        			$('#tableClase').DataTable().ajax.reload();
		        			cancelClase();
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



function eliminarUma(id){
	//alert('ID a eliminar es: '+id)
	$('.confirm').removeClass('btn btn-success').removeClass('btn btn-danger').removeClass('btn btn-warning');
  	swal({  title: "Eliminar Uma",
      	text: "¿Desea eliminar esta Uma?",
      	type: "warning",
      	showCancelButton: true,
      	cancelButtonText: "Cancelar",

      	
      	confirmButtonColor: "#ff9600",
      	confirmButtonText: "Aceptar",
      	closeOnConfirm: false },
      	function(){ 
          	$.ajax({
	            type:'DELETE',
	            url: base_url+"/Producto/delUma/"+id,
	            dataType:'json',
	            success: function(data, textStatus, jqXHR){
	              	if(jqXHR.status == 200){
	              		console.log(data);
	              		if(data.status){

	              			swal(data.title, data.msg, "success");
		        			$('.confirm').removeClass('btn btn-danger').removeClass('btn btn-warning').addClass('btn btn-success');
		        			$('#tableUma').DataTable().ajax.reload();
		        			cancelUma();
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

function eliminarProducto(id){
	//alert('ID a eliminar es: '+id)
	$('.confirm').removeClass('btn btn-success').removeClass('btn btn-danger').removeClass('btn btn-warning');
  	swal({  title: "Eliminar Producto",
      	text: "¿Desea eliminar este Producto?",
      	type: "warning",
      	showCancelButton: true,
      	cancelButtonText: "Cancelar",

      	
      	confirmButtonColor: "#ff9600",
      	confirmButtonText: "Aceptar",
      	closeOnConfirm: false },
      	function(){ 
          	$.ajax({
	            type:'DELETE',
	            url: base_url+"/Producto/delProducto/"+id,
	            dataType:'json',
	            success: function(data, textStatus, jqXHR){
	              	if(jqXHR.status == 200){
	              		console.log(data);
	              		if(data.status){

	              			swal(data.title, data.msg, "success");
		        			$('.confirm').removeClass('btn btn-danger').removeClass('btn btn-warning').addClass('btn btn-success');
		        			$('#tableProducto').DataTable().ajax.reload();
		        			cancelProducto();
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


/*================================================  FUNCTIONS ALMACEN  ================================================*/
/* TABLE ALMACEN */
var tableAlmacen = $('#tablealmacen').DataTable({
	"processing": true,
	"serverSide": true,
	"order": [],
	"language": {
		"url": base_url+'/Assets/js/es-pe.json'
	},
	"ajax": {
		"url": base_url+"/Producto/getAlmacen",
		"type": "POST",
		"dataType": "json"
	},
	"columns": [
	{"data":"orden"}, 	
	{"data":"Descripcion"}, 	
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


/* REGISTER ALMACEN */
$("#form_almacen").submit(function() { 
    
    var descripcion	= $('#txtnombrealmacen').val();
    var total 		= descripcion.length ; 

    var requestalmacen 					= new Object();
    requestalmacen["IdAlmacen"]			= $("#txtIdalmacen").val(); 
    requestalmacen["controlAlmacen"]	= $("#txtcontrolalmacen").val(); 
	requestalmacen["descripcion"]		= $("#txtnombrealmacen").val();
	requestalmacen["estado"]			= ($('#chkestadoalmacen').prop('checked') ? '1' : '2');
	
	console.log(requestalmacen);

    if (total>0){ 
        $.ajax({
            url: base_url+'/Producto/setAlmacen',
	        type: "POST",     
	        dataType: 'json',
	        data:requestalmacen,    
	        cache: false,

	        	
	        success: function(data, textStatus, jqXHR){
	        	console.log(data);

	        	if(jqXHR.status == 200){
	        		if(data.status){
						/*console.log(textStatus);
		        		console.log(jqXHR.status);*/
		        		swal(data.title, data.msg, "success");
		        		$('.confirm').removeClass('btn btn-danger').removeClass('btn btn-warning').addClass('btn btn-success');
		        		$('#tablealmacen').DataTable().ajax.reload();
		        		cancelAlmacen();
		        		return false;

	        		}else{
		        		swal({  title: 	data.title,
							    text: 	data.msg,
							    type: 	"error"},
							    function(){ 
							    	setTimeout(function() {
							          $('#txtdescripcionuma').focus();
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


/* SHOW ALMACEN */
function editarAlmacen(id){
	
	$('#txtIdalmacen').val(id);
    $('#txtcontrolalmacen').val('1');
    $("#updatealmacen").removeAttr('style');
    $("#agregaralmacen").css("display","none");
    $("#titlealmacen").html("<strong>EDITAR UMA</strong>");
    $('#estado_almacen').show();
    

	$.ajax({
      	type:'GET',
      	url: base_url+"/Producto/getAlmacens/"+id,
      	dataType:'json',
      	success: function(data, textStatus, jqXHR){
	       	
	       	if(jqXHR.status == 200){
	       		console.log(data);
		        if(data.status){
			       
			        $('#txtnombrealmacen').val(data.data.Descripcion);
			        var estado = (data.data.Estado == 1) ? true : false;			      
			        $('#chkestadoalmacen').prop("checked",estado);
			    				        
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

/* CANCEL ALMACEN */
function cancelAlmacen(){
      $("#agregaralmacen").removeAttr('style');
      $("#updatealmacen").css("display","none");
      $("#titlealmacen").html("<strong>REGISTRAR ALMACEN </strong>");
      $('#estado_almacen').hide();
      $('#form_almacen')[0].reset();
      $('#form_almacen').validate().resetForm();
      $('#txtcontrolalmacen').val('0');
      $('#form_almacen .form-group').removeClass('has-success');
      
}



/*================================================  FUNCTIONS ALMACEN  ================================================*/



/*================================================  FUNCTIONS DOCUMENTO  ================================================*/
/* TABLE ALMACEN */
var tableDocumento = $('#tabledocumento').DataTable({
	"processing": true,
	"serverSide": true,
	"order": [],
	"language": {
		"url": base_url+'/Assets/js/es-pe.json'
	},
	"ajax": {
		"url": base_url+"/Producto/getDocumentos",
		"type": "POST",
		"dataType": "json"
	},
	"columns": [
	{"data":"orden"}, 	
	{"data":"Descripcion"}, 	
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


/* REGISTER ALMACEN */
$("#form_documento").submit(function() { 
    
    var descripcion	= $('#txtnombredocumento').val();
    var total 		= descripcion.length ; 

    var requestdocumento 						= new Object();
    requestdocumento["IdDocumento"]				= $("#txtIddocumento").val(); 
    requestdocumento["controlDocumento"]		= $("#txtcontroldocumento").val(); 
	requestdocumento["descripcion"]				= $("#txtnombredocumento").val();
	requestdocumento["estado"]					= ($('#chkestadodocumento').prop('checked') ? '1' : '2');
	
	console.log(requestdocumento);

    if (total>0){ 
        $.ajax({
            url: base_url+'/Producto/setDocumento',
	        type: "POST",     
	        dataType: 'json',
	        data:requestdocumento,    
	        cache: false,

	        	
	        success: function(data, textStatus, jqXHR){
	        	console.log(data);

	        	if(jqXHR.status == 200){
	        		if(data.status){
						/*console.log(textStatus);
		        		console.log(jqXHR.status);*/
		        		swal(data.title, data.msg, "success");
		        		$('.confirm').removeClass('btn btn-danger').removeClass('btn btn-warning').addClass('btn btn-success');
		        		$('#tabledocumento').DataTable().ajax.reload();
		        		cancelDocumento();
		        		return false;

	        		}else{
		        		swal({  title: 	data.title,
							    text: 	data.msg,
							    type: 	"error"},
							    function(){ 
							    	setTimeout(function() {
							          $('#txtnombredocumento').focus();
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


/* SHOW ALMACEN */
function editarDocumento(id){
	
	$('#txtIddocumento').val(id);
    $('#txtcontroldocumento').val('1');
    $("#updatedocumento").removeAttr('style');
    $("#agregardocumento").css("display","none");
    $("#titledocumento").html("<strong>EDITAR DOCUMENTO</strong>");
    $('#estado_documento').show();
    

	$.ajax({
      	type:'GET',
      	url: base_url+"/Producto/getDocumento/"+id,
      	dataType:'json',
      	success: function(data, textStatus, jqXHR){
	       	
	       	if(jqXHR.status == 200){
	       		console.log(data);
		        if(data.status){
			       
			        $('#txtnombredocumento').val(data.data.Descripcion);
			        var estado = (data.data.Estado == 1) ? true : false;			      
			        $('#chkestadodocumento').prop("checked",estado);
			    				        
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

/* CANCEL ALMACEN */
function cancelDocumento(){
      $("#agregardocumento").removeAttr('style');
      $("#updatedocumento").css("display","none");
      $("#titledocumento").html("<strong>REGISTRAR ALMACEN </strong>");
      $('#estado_documento').hide();
      $('#form_documento')[0].reset();
      $('#form_documento').validate().resetForm();
      $('#txtcontroldocumento').val('0');
      $('#form_documento .form-group').removeClass('has-success');
      
}



/*================================================  FUNCTIONS DOCUMENTO  ================================================*/





/*================================================  FUNCTIONS FAMILIA  ================================================*/
/* TABLE FAMILIA */
var tableFamilia = $('#tableFamilia').DataTable({
	"processing": true,
	"serverSide": true,
	"order": [],
	"language": {
		"url": base_url+'/Assets/js/es-pe.json'
	},
	"ajax": {
		"url": base_url+"/Producto/getFamilias",
		"type": "POST",
		"dataType": "json"
	},
	"columns": [
	{"data":"orden"}, 
	
	{"data":"Descripcion"}, 
	
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


/* REGISTER FAMILIA */
$("#form_registerfamilia").submit(function() { 
    
    var descripcion	= $('#txtdescripcionfamilia').val();
    var total 		= descripcion.length ; // preguntar a edie 

    var requestMedida 				= new Object();
    requestMedida["IdFamilia"]		= $("#txtIdfamilia").val(); //este espara cuando vas a editar te guarde el id del proyecto
    requestMedida["controlFamilia"]	= $("#txtcontrolfamilia").val(); //este hace el control si vas a registrar o editar (0=registra y 1=edita)
	requestMedida["descripcion"]	= $("#txtdescripcionfamilia").val();
	requestMedida["estado"]			= ($('#chkestadofamilia').prop('checked') ? '1' : '2');
	
	console.log(requestMedida);

    if (total>0){ 
        $.ajax({
            url: base_url+'/Producto/setFamilia',
	        type: "POST",     
	        dataType: 'json',
	        data:requestMedida,    
	        cache: false,

	        	
	        success: function(data, textStatus, jqXHR){
	        	console.log(data);

	        	if(jqXHR.status == 200){
	        		if(data.status){
						/*console.log(textStatus);
		        		console.log(jqXHR.status);*/
		        		swal(data.title, data.msg, "success");
		        		$('.confirm').removeClass('btn btn-danger').removeClass('btn btn-warning').addClass('btn btn-success');
		        		$('#tableFamilia').DataTable().ajax.reload();
		        		cancelFamilia();
		        		return false;

	        		}else{
		        		swal({  title: 	data.title,
							    text: 	data.msg,
							    type: 	"error"},
							    function(){ 
							    	setTimeout(function() {
							          $('#txtdescripcionfamilia').focus();
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


/* SHOW FAMILIA */
function editarFamilia(id){
	//alert('ID a mostrar: '+id);
	$('#txtIdfamilia').val(id);
    $('#txtcontrolfamilia').val('1');
    $("#updateFamilia").removeAttr('style');
    $("#agregarFamilia").css("display","none");
    $("#titleFamilia").html("<strong>EDITAR FAMILIA</strong>");
    $('#estado_familia').show();

	$.ajax({
      	type:'GET',
      	url: base_url+"/Producto/getFamilia/"+id,
      	dataType:'json',
      	success: function(data, textStatus, jqXHR){
	       	
	       	if(jqXHR.status == 200){
	       		console.log(data);
		        if(data.status){
			       
			        $('#txtdescripcionfamilia').val(data.data.Descripcion);
			        var estado = (data.data.Estado == 1) ? true : false;			      
			        $('#chkestadofamilia').prop("checked",estado);
			    
			        
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


/* DELETE FAMILIA */
function eliminarFamilia(id){
	//alert('ID a eliminar es: '+id)
	$('.confirm').removeClass('btn btn-success').removeClass('btn btn-danger').removeClass('btn btn-warning');
  	swal({  title: "Eliminar Familia",
      	text: "¿Desea eliminar esta Familia?",
      	type: "warning",
      	showCancelButton: true,
      	cancelButtonText: "Cancelar",
      	confirmButtonColor: "#ff9600",
      	confirmButtonText: "Aceptar",
      	closeOnConfirm: false },
      	function(){ 
          	$.ajax({
	            type:'DELETE',
	            url: base_url+"/Producto/delFamilia/"+id,
	            dataType:'json',
	            success: function(data, textStatus, jqXHR){
	              	if(jqXHR.status == 200){
	              		console.log(data);
	              		if(data.status){

	              			swal(data.title, data.msg, "success");
		        			$('.confirm').removeClass('btn btn-danger').removeClass('btn btn-warning').addClass('btn btn-success');
		        			$('#tableFamilia').DataTable().ajax.reload();
		        			cancelFamilia();
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


/* CANCEL FAMILIA */
function cancelFamilia(){
      $("#agregarFamilia").removeAttr('style');
      $("#updateFamilia").css("display","none");
      $("#titleFamilia").html("<strong>REGISTRAR FAMILIA</strong>");
      //$('#estado_perfil').hide();
      $('#form_registerfamilia')[0].reset();
      $('#form_registerfamilia').validate().resetForm();
      $('#txtcontrolfamilia').val('0');
      //$('#txtperfil').attr('disabled',false);
      $('#form_registerfamilia .form-group').removeClass('has-success');
}

/*================================================  FUNCTIONS UMA  ================================================*/
/* TABLE UMA */
var tableUma = $('#tableUma').DataTable({
	"processing": true,
	"serverSide": true,
	"order": [],
	"language": {
		"url": base_url+'/Assets/js/es-pe.json'
	},
	"ajax": {
		"url": base_url+"/Producto/getUmas",
		"type": "POST",
		"dataType": "json"
	},
	"columns": [
	{"data":"orden"}, 
	
	{"data":"Descripcion"}, 
	
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


/* REGISTER UMA */
$("#form_uma").submit(function() { 
    
    var descripcion	= $('#txtdescripcionuma').val();
    var total 		= descripcion.length ; 

    var requestUma 				= new Object();
    requestUma["IdUma"]			= $("#txtIdUma").val(); 
    requestUma["controlUma"]	= $("#txtcontrolUma").val(); 
	requestUma["descripcion"]	= $("#txtdescripcionuma").val();
	requestUma["estado"]		= ($('#chkestadouma').prop('checked') ? '1' : '2');
	
	console.log(requestUma);

    if (total>0){ 
        $.ajax({
            url: base_url+'/Producto/setUma',
	        type: "POST",     
	        dataType: 'json',
	        data:requestUma,    
	        cache: false,

	        	
	        success: function(data, textStatus, jqXHR){
	        	console.log(data);

	        	if(jqXHR.status == 200){
	        		if(data.status){
						/*console.log(textStatus);
		        		console.log(jqXHR.status);*/
		        		swal(data.title, data.msg, "success");
		        		$('.confirm').removeClass('btn btn-danger').removeClass('btn btn-warning').addClass('btn btn-success');
		        		$('#form_uma')[0].reset();
						$('#form_uma').validate().resetForm();
		        		$('#tableUma').DataTable().ajax.reload();
		        		cancelUma();
		        		return false;

	        		}else{
		        		swal({  title: 	data.title,
							    text: 	data.msg,
							    type: 	"error"},
							    function(){ 
							    	setTimeout(function() {
							          $('#txtdescripcionuma').focus();
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


/* SHOW UMA */
function editarUma(id){
	//alert('ID a mostrar: '+id);
	$('#txtIdUma').val(id);
    $('#txtcontrolUma').val('1');
    $("#updateUma").removeAttr('style');
    $("#agregarUma").css("display","none");
    $("#titleUma").html("<strong>EDITAR UMA</strong>");
    $('#estado_uma').show();
    

	$.ajax({
      	type:'GET',
      	url: base_url+"/Producto/getUma/"+id,
      	dataType:'json',
      	success: function(data, textStatus, jqXHR){
	       	
	       	if(jqXHR.status == 200){
	       		console.log(data);
		        if(data.status){
			       
			        $('#txtdescripcionuma').val(data.data.Descripcion);
			        var estado = (data.data.Estado == 1) ? true : false;			      
			        $('#chkestadouma').prop("checked",estado);
			    				        
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

/* CANCEL UMA */
function cancelUma(){
      $("#agregarUma").removeAttr('style');
      $("#updateUma").css("display","none");
      $("#titleUma").html("<strong>REGISTRAR UMA/strong>");
      //$('#estado_perfil').hide();
      $('#form_uma')[0].reset();
      $('#form_uma').validate().resetForm();
      $('#txtcontrolUma').val('0');
      $('#form_uma .form-group').removeClass('has-success');
      
}



/*================================================  FUNCTIONS PROCESO  ================================================*/
/* TABLE UMA */
var tableProceso = $('#tableproceso').DataTable({
	"processing": true,
	"serverSide": true,
	"order": [],
	"language": {
		"url": base_url+'/Assets/js/es-pe.json'
	},
	"ajax": {
		"url": base_url+"/Producto/getProceso",
		"type": "POST",
		"dataType": "json"
	},
	"columns": [
	{"data":"orden"},	
	{"data":"Descripcion"}, 
	{"data":"FechaInicio"}, 
	{"data":"FechaFin"}, 	
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


/* REGISTER UMA */
$("#form_proceso").submit(function() { 
    
    var descripcion	= $('#txtnombreproceso').val();
    var total 		= descripcion.length ; 

    var requestProceso 					= new Object();
    requestProceso["IdProceso"]			= $("#txtIdProceso").val(); 
    requestProceso["controlProceso"]	= $("#txtcontrolProceso").val(); 
	requestProceso["descripcion"]		= $("#txtnombreproceso").val();
	requestProceso["fechainicio"]		= $("#txtfechainicio").val();
	requestProceso["fechafin"]			= $("#txtfechafin").val();
	requestProceso["estado"]			= ($('#chkestadoproceso').prop('checked') ? '1' : '2');
	
	console.log(requestProceso);

    if (total>0){ 
        $.ajax({
            url: base_url+'/Producto/setProceso',
	        type: "POST",     
	        dataType: 'json',
	        data:requestProceso,    
	        cache: false,

	        	
	        success: function(data, textStatus, jqXHR){
	        	console.log(data);

	        	if(jqXHR.status == 200){
	        		if(data.status){
						/*console.log(textStatus);
		        		console.log(jqXHR.status);*/
		        		swal(data.title, data.msg, "success");
		        		$('.confirm').removeClass('btn btn-danger').removeClass('btn btn-warning').addClass('btn btn-success');
		        		$('#tableproceso').DataTable().ajax.reload();
		        		CancelProceso();
		        		return false;

	        		}else{
		        		swal({  title: 	data.title,
							    text: 	data.msg,
							    type: 	"error"},
							    function(){ 
							    	setTimeout(function() {
							          $('#txtnombreproceso').focus();
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


/* SHOW UMA */
function editarProceso(id){
	//alert('ID a mostrar: '+id);
	$('#txtIdProceso').val(id);
    $('#txtcontrolProceso').val('1');
    $("#updateproceso").removeAttr('style');
    $("#agregarproceso").css("display","none");
    $("#titleproceso").html("<strong>EDITAR PROCESO</strong>");
    $('#estado_proceso').show();
    

	$.ajax({
      	type:'GET',
      	url: base_url+"/Producto/getProcesoss/"+id,
      	dataType:'json',
      	success: function(data, textStatus, jqXHR){
	       	
	       	if(jqXHR.status == 200){
	       		console.log(data);
		        if(data.status){
			       
			        $('#txtnombreproceso').val(data.data.Descripcion);
			        $('#txtfechainicio').val(data.data.FechaInicio);
			        $('#txtfechafin').val(data.data.FechaFin);

			        var estado = (data.data.Estado == 1) ? true : false;
			        
			      //  $('#txtnombreproceso').val(data.data.cargo).attr('disabled',false);
			        $('#chkestadoproceso').prop("checked",estado);
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


function eliminarproceso(id){
	//alert('ID a eliminar es: '+id)
	$('.confirm').removeClass('btn btn-success').removeClass('btn btn-danger').removeClass('btn btn-warning');
  	swal({  title: "Eliminar Proceso",
      	text: "¿Desea eliminar este Proceso?",
      	type: "warning",
      	showCancelButton: true,
      	cancelButtonText: "Cancelar",

      	
      	confirmButtonColor: "#ff9600",
      	confirmButtonText: "Aceptar",
      	closeOnConfirm: false },
      	function(){ 
          	$.ajax({
	            type:'DELETE',
	            url: base_url+"/producto/delProceso/"+id,
	            dataType:'json',
	            success: function(data, textStatus, jqXHR){
	              	if(jqXHR.status == 200){
	              		console.log(data);
	              		if(data.status){

	              			swal(data.title, data.msg, "success");
		        			$('.confirm').removeClass('btn btn-danger').removeClass('btn btn-warning').addClass('btn btn-success');
		        			$('#tableproceso').DataTable().ajax.reload();
		        			CancelProceso();
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

/* CANCEL UMA */
function CancelProceso(){
      $("#agregarproceso").removeAttr('style');
      $("#updateproceso").css("display","none");
      $("#titleproceso").html("<strong>REGISTRAR PROCESO/strong>");
      //$('#estado_perfil').hide();
      $('#form_proceso')[0].reset();
      $('#form_proceso').validate().resetForm();
      $('#txtcontrolProceso').val('0');
      $('#form_proceso .form-group').removeClass('has-success');
      
}



/* DELETE FAMILIA */
function eliminarFamilia(id){
	//alert('ID a eliminar es: '+id)
	$('.confirm').removeClass('btn btn-success').removeClass('btn btn-danger').removeClass('btn btn-warning');
  	swal({  title: "Eliminar Familia",
      	text: "¿Desea eliminar esta Familia?",
      	type: "warning",
      	showCancelButton: true,
      	cancelButtonText: "Cancelar",
      	confirmButtonColor: "#ff9600",
      	confirmButtonText: "Aceptar",
      	closeOnConfirm: false },
      	function(){ 
          	$.ajax({
	            type:'DELETE',
	            url: base_url+"/Producto/delFamilia/"+id,
	            dataType:'json',
	            success: function(data, textStatus, jqXHR){
	              	if(jqXHR.status == 200){
	              		console.log(data);
	              		if(data.status){

	              			swal(data.title, data.msg, "success");
		        			$('.confirm').removeClass('btn btn-danger').removeClass('btn btn-warning').addClass('btn btn-success');
		        			$('#tableFamilia').DataTable().ajax.reload();
		        			cancelFamilia();
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


/* CANCEL FAMILIA */
function cancelUma(){
      $("#agregaruma").removeAttr('style');
      $("#updateuma").css("display","none");
      $("#titleUma").html("<strong>REGISTRAR UMA</strong>");
      //$('#estado_perfil').hide();
      $('#form_uma')[0].reset();
      $('#form_uma').validate().resetForm();
      $('#txtcontroluma').val('0');
      //$('#txtperfil').attr('disabled',false);
      $('#form_uma .form-group').removeClass('has-success');
}



/*================================================  FUNCTIONS CLASE  ================================================*/
/* TABLE CLASE */
var tableClase = $('#tableClase').DataTable({
	"processing": true,
	"serverSide": true,
	"order": [],
	"language": {
		"url": base_url+'/Assets/js/es-pe.json'
	},
	"ajax": {
		"url": base_url+"/Producto/getClases",
		"type": "POST",
		"dataType": "json"
	},
	"columns": [
	{"data":"orden"}, 
	
	{"data":"Clase"}, 
	{"data":"Familia"}, 
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


/* REGISTER CLASE */
$("#form_registerclase").submit(function() { 
    
    var descripcion	= $('#txtdescripcionclase').val();
    var total 		= descripcion.length ; 

    var requestClase 				= new Object();
    requestClase["IdClase"]			= $("#txtIdclase").val(); //este espara cuando vas a editar te guarde el id del proyecto
    requestClase["controlClase"]	= $("#txtcontrolclase").val(); //este hace el control si vas a registrar o editar (0=registra y 1=edita)
	requestClase["descripcion"]		= $("#txtdescripcionclase").val();
	requestClase["IdFamilia"]		= $("#cbofamilia").val();
	requestClase["estado"]			= ($('#chkestadoclase').prop('checked') ? '1' : '2');
	
	console.log(requestClase);

    if (total>0){ 
        $.ajax({
            url: base_url+'/Producto/setClase',
	        type: "POST",     
	        dataType: 'json',
	        data:requestClase,    
	        cache: false,

	        	
	        success: function(data, textStatus, jqXHR){
	        	console.log(data);

	        	if(jqXHR.status == 200){
	        		if(data.status){
					
		        		swal(data.title, data.msg, "success");
		        		$('.confirm').removeClass('btn btn-danger').removeClass('btn btn-warning').addClass('btn btn-success');
		        		$('#tableClase').DataTable().ajax.reload();
		        		cancelClase();
		        		return false;

	        		}else{
		        		swal({  title: 	data.title,
							    text: 	data.msg,
							    type: 	"error"},
							    function(){ 
							    	setTimeout(function() {
							          $('#txtdescripcionclase').focus();
							    	}, 10)
								});
		        		$('.confirm').removeClass('btn btn-success').removeClass('btn btn-warning').addClass('btn btn-danger');
		        		return false;
		        	}
		        }

            },
            error: function(jqXHR,textStatus,errorThrown){
            	console.log(errorThrown);
            	
        	}
        });
        return false;
    }
});


/* SHOW CLASE */
function editarClase(id){
	//alert('ID a mostrar: '+id);
	$('#txtIdclase').val(id);
    $('#txtcontrolclase').val('1');
    $("#updateClase").removeAttr('style');
    $("#agregarClase").css("display","none");
    $("#titleClase").html("<strong>EDITAR CLASE</strong>");
    $('#estado_clase').show();

	$.ajax({
      	type:'GET',
      	url: base_url+"/Producto/getClase/"+id,
      	dataType:'json',
      	success: function(data, textStatus, jqXHR){
	       	
	       	if(jqXHR.status == 200){
	       		console.log(data);
		        if(data.status){
			       
			        $('#txtdescripcionclase').val(data.data.nombreclase);
			        $('#cbofamilia').selectpicker('val',data.data.IdFamilia);

			        var estado = (data.data.Estado == 1) ? true : false;			      
			        $('#chkestadoclase').prop("checked",estado);
			        
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





/* CANCEL CLASE */
function cancelClase(){
      $("#agregarClase").removeAttr('style');
      $("#updateClase").css("display","none");
      $("#titleClase").html("<strong>REGISTRAR CLASE</strong>");
      //$('#estado_perfil').hide();
      $('#form_registerclase')[0].reset();
      $('#form_registerclase').validate().resetForm();
      $('#txtcontrolclase').val('0');
      //$('#txtperfil').attr('disabled',false);
      $('#form_registerclase .form-group').removeClass('has-success');
      $('#cbofamilia').selectpicker('refresh');
}








/*================================================  FUNCTIONS PRODUCTO  ================================================*/

/* TABLE PRODUCTO */
var tableProducto = $('#tableProducto').DataTable({
	"processing": true,
	"serverSide": true,
	"order": [],
	"language": {
		"url": base_url+'/Assets/js/es-pe.json'
	},
	"ajax": {
		"url": base_url+"/Producto/getProducto",
		"type": "POST",
		"dataType": "json"
	},
	"columns": [
	{"data":"orden"},
	{"data":"codigo"}, 
	{"data":"producto"}, 
	{"data":"clase"}, 
	{"data":"uma"}, 
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



function Cbofamilia(){
	$.ajax({
	    type: "GET",
	    async : false,
	    url: base_url+'/Producto/getSelectFamilia', 
	    success: function(data, textStatus, jqXHR){
	    	if(jqXHR.status == 200){
	            //console.log(data);
	            $("#cbofamilia").selectpicker('destroy');
	            $("#cbofamilia").html(data).selectpicker('refresh');
	        }
	    }
	});
}

function CboClase(){
	$.ajax({
	    type: "GET",
	    async : false,
	    url: base_url+'/Producto/getSelectClase', 
	    success: function(data, textStatus, jqXHR){
	    	if(jqXHR.status == 200){
	            //console.log(data);
	            $("#cboclase").selectpicker('destroy');
	            $("#cboclase").html(data).selectpicker('refresh');
	        }
	    }
	});
}

function CboUma(){
	$.ajax({
	    type: "GET",
	    async : false,
	    url: base_url+'/Producto/getSelectUma', 
	    success: function(data, textStatus, jqXHR){
	    	if(jqXHR.status == 200){
	            //console.log(data);
	            $("#cbouma").selectpicker('destroy');
	            $("#cbouma").html(data).selectpicker('refresh');
	        }
	    }
	});
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
	        }
	    }
	});
}


function CboCargo(){
	$.ajax({
	    type: "GET",
	    async : false,
	    url: base_url+'/Producto/getSelectCargo', 
	    success: function(data, textStatus, jqXHR){
	    	if(jqXHR.status == 200){
	            //console.log(data);
	            $("#cbocargo").selectpicker('destroy');
	            $("#cbocargo").html(data).selectpicker('refresh');
	        }
	    }
	});
}


/* **** REGISTER PERSONAL *********/

$("#form_personal").submit(function() { 
	//var numero 		=	$('#txtnumero').val()
    var clase 		= 	$('#txtdni').val();

    var requestPersonal					= new Object();
    requestPersonal["IdPersonal"]		= $("#txtIdPersonal").val();
    requestPersonal["ControlPersonal"]	= $("#txtcontrolPersonal").val();
    requestPersonal["Dni"]				= $("#txtdni").val();
	requestPersonal["Nombre"]			= $("#txtnombre").val();
	requestPersonal["Consumo"]			= $("#cboconsumo").val();
	requestPersonal["Cargo"]			= $("#cbocargo").val();
	requestPersonal["estado"]			= ($('#chkestadopersonal').prop('checked') ? '1' : '2');
	
	

	    
	    	if($('#txtdni').val().length != 0){
					$.ajax({
						url: base_url+'/Producto/setPersonal',
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
									$('#form_personal')[0].reset();
									$('#form_personal').validate().resetForm();
     	 							$('#tablePersonal').DataTable().ajax.reload(); //falta tabla ver !! 									
									CboConsumo();
									CboCargo();
									
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

/* SHOW PRODUCTO */
function editarPersonal(id){
	// alert('ID a mostrar: '+id);
	$('#txtIdPersonal').val(id);
    $('#txtcontrolPersonal').val('1');
    $("#updatepersonal").removeAttr('style');
    $("#agregarpersonal").css("display","none");
    $("#titlePersonal").html("<strong>EDITAR PERSONAL</strong>");
    $('#estado_personal').show();	


	$.ajax({
      	type:'GET',
      	url: base_url+"/Producto/getPersonals/"+id,
      	dataType:'json',
      	success: function(data, textStatus, jqXHR){
	       	
	       	if(jqXHR.status == 200){
	       		console.log(data);
		        if(data.status){
			      
			        $('#txtdni').val(data.data.Dni);
			        $('#txtnombre').val(data.data.Nombres);
			        $('#cboconsumo').selectpicker('val',data.data.IdCentroConsumo);
			        $('#cbocargo').selectpicker('val',data.data.id_cargo);


			        var estado = (data.data.Estado == 1) ? true : false;
			        $('#txtnombre').val(data.data.Nombres).attr('disabled',false);
			        
			        $('#chkestadopersonal').prop("checked",estado);
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


var tablePersonal = $('#tablePersonal').DataTable({
	"processing": true,
	"serverSide": true,
	"order": [],
	"language": {
		"url": base_url+'/Assets/js/es-pe.json'
	},
	"ajax": {
		"url": base_url+"/Producto/getPersonal",
		"type": "POST",
		"dataType": "json"
	},
	"columns": [
	{"data":"orden"}, 	
	{"data":"Nombres"}, 
	{"data":"Dni"},
	{"data":"Descripcion"}, 
	{"data":"cargo"},  	
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


/* DELETE FAMILIA */
function eliminarPersonal(id){
	//alert('ID a eliminar es: '+id)
	$('.confirm').removeClass('btn btn-success').removeClass('btn btn-danger').removeClass('btn btn-warning');
  	swal({  title: "Eliminar Personal",
      	text: "¿Desea eliminar este Personal?",
      	type: "warning",
      	showCancelButton: true,
      	cancelButtonText: "Cancelar",
      	confirmButtonColor: "#ff9600",
      	confirmButtonText: "Aceptar",
      	closeOnConfirm: false },
      	function(){ 
          	$.ajax({
	            type:'DELETE',
	            url: base_url+"/Producto/delPersonal/"+id,
	            dataType:'json',
	            success: function(data, textStatus, jqXHR){
	              	if(jqXHR.status == 200){
	              		console.log(data);
	              		if(data.status){

	              			swal(data.title, data.msg, "success");
		        			$('.confirm').removeClass('btn btn-danger').removeClass('btn btn-warning').addClass('btn btn-success');
		        			$('#tablePersonal').DataTable().ajax.reload();
		        			cancelPersonal();
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


/* CANCEL personal */
function cancelPersonal(){
      $("#agregarpersonal").removeAttr('style');
      $("#updatepersonal").css("display","none");
      $("#titlePersonal").html("<strong>CREAR PERSONAL</strong>");
      $('#estado_personal').hide();
      $('#form_personal')[0].reset();
      $('#form_personal').validate().resetForm();
      $('#txtcontrolPersonal').val('0');
      $('#txtnombre').attr('disabled',false);
      $('#form_personal .form-group').removeClass('has-success');
      $('#cbocargo').selectpicker('refresh');
      $('#cboconsumo').selectpicker('refresh');
}


/****** FIN PERSONAL *************/






/* REGISTER PRODUCTO */
$("#form_registerproducto").submit(function() { 
	//var numero 		=	$('#txtnumero').val()
    var clase 		= 	$('#cboclase').val();

    var requestProducto				= new Object();
    requestProducto["IdProducto"]		= $("#txtIdProducto").val();
    requestProducto["ControlProducto"]	= $("#txtcontrolProducto").val();
    requestProducto["Descripcion"]		= $("#txtdescripcion").val();
	requestProducto["IdClase"]			= $("#cboclase").val();
	requestProducto["IdUma"]			= $("#cbouma").val();
	requestProducto["Codigo"]			= $("#txtcodigo").val();
	requestProducto["estado"]			= ($('#chkestadoproducto').prop('checked') ? '1' : '2');
	
	

	    
	    	if($('#cboclase').val().length != 0){
					$.ajax({
						url: base_url+'/Producto/setProducto',
						type: "POST",     
						dataType: 'json',
						data:requestProducto,    
						cache: false,
									        	
						success: function(data, textStatus, jqXHR){
						console.log(data.msg);

							if(jqXHR.status == 200){
								if(data.status){
									swal(data.title, data.msg, "success");
									$('.confirm').removeClass('btn btn-danger').removeClass('btn btn-warning').addClass('btn btn-success');
									$('#form_registerproducto')[0].reset();
									$('#form_registerproducto').validate().resetForm();
     	 							$('#tableProducto').DataTable().ajax.reload();

									
									Cbofamilia();
									CboClase();
									CboUma();

									
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



/* SHOW PRODUCTO */
function editarProducto(id){
	// alert('ID a mostrar: '+id);
	$('#txtIdProducto').val(id);
    $('#txtcontrolProducto').val('1');
    $("#updateProducto").removeAttr('style');
    $("#agregarProducto").css("display","none");
    $("#titleProducto").html("<strong>EDITAR PRODUCTO</strong>");
    $('#estado_producto').show();
    


	$.ajax({
      	type:'GET',
      	url: base_url+"/Producto/getProductos/"+id,
      	dataType:'json',
      	success: function(data, textStatus, jqXHR){
	       	
	       	if(jqXHR.status == 200){
	       		console.log(data);
		        if(data.status){
			      
			        $('#txtdescripcion').val(data.data.Descripcion);
			        $('#txtcodigo').val(data.data.CodProducto);
			        $('#cboclase').selectpicker('val',data.data.IdClase);
			        $('#cbolote').selectpicker('val',data.data.IdLote);
			        $('#cbouma').selectpicker('val',data.data.IdUma);

			        var estado = (data.data.Estado == 1) ? true : false;
			        $('#chkestadoproducto').prop("checked",estado);
			    
			        
			        
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



function cancelProducto(){
	  
      
      $('#form_registerproducto')[0].reset();
      $('#form_registerproducto').validate().resetForm();
      $('#txtcontrolProducto').val('0');
      $('#cboclase').selectpicker('refresh');
      $('#cbouma').selectpicker('refresh');
      $("#titleProducto").html("<strong>REGISTRAR PRODUCTO</strong>");
      $("#agregarProducto").removeAttr('style');
      $("#updateProducto").css("display","none");
      $('#form_registerproducto .form-group').removeClass('has-success');
      
      }


/*================================================  FIN FUNCTIONS PRODUCTO ================================================*/

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


/* REGISTER PROVEEDOR */
$("#form_proveedor").submit(function() { 
    
    var descripcion	= $('#txtrazonsocial').val();
    var total 		= descripcion.length ; 

    var requestProveedor					= new Object();
    requestProveedor["IdProveedor"]			= $("#txtIdProveedor").val(); //este espara cuando vas a editar te guarde el id del proyecto
    requestProveedor["controlProveedor"]	= $("#txtcontrolProveedor").val(); //este hace el control si vas a registrar o editar (0=registra y 1=edita)
	requestProveedor["razonsocial"]			= $("#txtrazonsocial").val();
	requestProveedor["ruc"]					= $("#txtruc").val();
	requestProveedor["celular"]				= $("#txtcelular").val();
	requestProveedor["estado"]				= ($('#chkestadoproveedor').prop('checked') ? '1' : '2');


	
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
		        		cancelProveedor();
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




/* SHOW PROVEEDOR */
function editarProveedor(id){
	//alert('ID a mostrar: '+id);
	$('#txtIdProveedor').val(id);
    $('#txtcontrolProveedor').val('1');
    $("#updateproveedor").removeAttr('style');
    $("#agregarproveedor").css("display","none");
    $("#titleProveedor").html("<strong>EDITAR PROVEEDOR</strong>");
    $('#estado_proveedor').show();

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

			    	var estado = (data.data.Estado == 1) ? true : false;
			        $('#txtnombre').val(data.data.RazonSocial).attr('disabled',false);
			        
			        $('#chkestadoproveedor').prop("checked",estado);
			        
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


function eliminarProveedor(id){
	//alert('ID a eliminar es: '+id)
	$('.confirm').removeClass('btn btn-success').removeClass('btn btn-danger').removeClass('btn btn-warning');
  	swal({  title: "Eliminar Proveedor",
      	text: "¿Desea eliminar este Proveedor?",
      	type: "warning",
      	showCancelButton: true,
      	cancelButtonText: "Cancelar",
      	confirmButtonColor: "#ff9600",
      	confirmButtonText: "Aceptar",
      	closeOnConfirm: false },
      	function(){ 
          	$.ajax({
	            type:'DELETE',
	            url: base_url+"/Compra/delProveedor/"+id,
	            dataType:'json',
	            success: function(data, textStatus, jqXHR){
	              	if(jqXHR.status == 200){
	              		console.log(data);
	              		if(data.status){

	              			swal(data.title, data.msg, "success");
		        			$('.confirm').removeClass('btn btn-danger').removeClass('btn btn-warning').addClass('btn btn-success');
		        			$('#tableProveedor').DataTable().ajax.reload();
		        			cancelProveedor();
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




/* CANCEL PROVEEDOR */
function cancelProveedor(){
      $("#agregarProveedor").removeAttr('style');
      $("#updateProveedor").css("display","none");
      $("#titleProveedor").html("<strong>REGISTRAR PROVEEDOR</strong>");
      $('#estado_proveedor').hide();
      $('#form_proveedor')[0].reset();
      $('#form_proveedor').validate().resetForm();
      $('#txtcontrolProveedor').val('0');
      //$('#txtperfil').attr('disabled',false);
      $('#form_proveedor .form-group').removeClass('has-success');
}


var tableCargos = $('#tableCargos').DataTable({
	"processing": true,
	"serverSide": true,
	"order": [],
	"language": {
		"url": base_url+'/Assets/js/es-pe.json'
	},
	"ajax": {
		"url": base_url+"/Cargo/getCargos",
		"type": "POST",
		"dataType": "json"
	},
	"columns": [
	{"data":"orden"}, 
	{"data":"cargo"},
	{"data":"remuneracion"}, 
	{"data":"estado"},
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




/* REGISTER CARGOS */
$("#form_registerCargo").submit(function() {
    var cargo 			= $('#txtcargo').val();
  
    var total 			= cargo.length ;

    var requestCArgo 				= new Object();
    requestCArgo["Idcargo"]			= $("#txtIDCargo").val();
    requestCArgo["controlCargo"]	= $("#txtcontrolCargo").val();
    requestCArgo["cargo"]			= $("#txtcargo").val();
	
	requestCArgo["estado"]			= ($('#chkestadoCargo').prop('checked') ? '1' : '2');

    if (total>0){
        $.ajax({
            url: base_url+'/Cargo/setCargo',
	        type: "POST",     
	        dataType: 'json',
	        data:requestCArgo,    
	        cache: false,
	        	
	        success: function(data, textStatus, jqXHR){
	        	console.log(data.msg);

	        	if(jqXHR.status == 200){
	        		if(data.status){
						/*console.log(textStatus);
		        		console.log(jqXHR.status);*/
		        		swal(data.title, data.msg, "success");
		        		$('.confirm').removeClass('btn btn-danger').removeClass('btn btn-warning').addClass('btn btn-success');
		        		$('#tableCargos').DataTable().ajax.reload();
		        		cancelCargo();
		        		CboConsumo();
						CboCargo();
		        		return false;

	        		}else{
		        		swal({  title: 	data.title,
							    text: 	data.msg,
							    type: 	"error"},
							    function(){ 
							    	setTimeout(function() {
							          $('#txtcargo').focus();
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


/* SHOW CARGO */
function editarCargo(id){
	// alert('ID a mostrar: '+id);
	$('#txtIDCargo').val(id);
    $('#txtcontrolCargo').val('1');
    $("#updateCargo").removeAttr('style');
    $("#agregarCargo").css("display","none");
    $("#titleCargo").html("<strong>EDITAR CARGO</strong>");
    $('#estado_cargo').show();

	$.ajax({
      	type:'GET',
      	url: base_url+"/Cargo/getCargo/"+id,
      	dataType:'json',
      	success: function(data, textStatus, jqXHR){
	       	
	       	if(jqXHR.status == 200){
	       		console.log(data);
		        if(data.status){
			        
			        var estado = (data.data.estado == 1) ? true : false;
			        $('#txtcargo').val(data.data.cargo).attr('disabled',false);
			        
			        $('#chkestadoCargo').prop("checked",estado);
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


/* DELETE CARGO */
function eliminarCargo(id){
	//alert('ID a eliminar es: '+id)
	$('.confirm').removeClass('btn btn-success').removeClass('btn btn-danger').removeClass('btn btn-warning');
  	swal({  title: "Eliminar Cargo",
      	text: "¿Desea eliminar este Cargo?",
      	type: "warning",
      	showCancelButton: true,
      	cancelButtonText: "Cancelar",
      	confirmButtonColor: "#ff9600",
      	confirmButtonText: "Aceptar",
      	closeOnConfirm: false },
      	function(){ 
          	$.ajax({
	            type:'DELETE',
	            url: base_url+"/Cargo/delCargo/"+id,
	            dataType:'json',
	            success: function(data, textStatus, jqXHR){
	              	if(jqXHR.status == 200){
	              		console.log(data);
	              		if(data.status){

	              			swal(data.title, data.msg, "success");
		        			$('.confirm').removeClass('btn btn-danger').removeClass('btn btn-warning').addClass('btn btn-success');
		        			$('#tableCargos').DataTable().ajax.reload();
		        			cancelCargo();
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


/* CANCEL CARGO */
function cancelCargo(){
      $("#agregarCargo").removeAttr('style');
      $("#updateCargo").css("display","none");
      $("#titleCargo").html("<strong>REGISTRAR CARGO</strong>");
      $('#estado_cargo').hide();
      $('#form_registerCargo')[0].reset();
      $('#form_registerCargo').validate().resetForm();
      $('#txtcontrolCargo').val('0');
      $('#txtcargo').attr('disabled',false);
      $('#form_registerCargo .form-group').removeClass('has-success');
}


/************ CENTRO DE CONSUMO ***************/


var tableConsumo = $('#tableCconsumo').DataTable({
	"processing": true,
	"serverSide": true,
	"order": [],
	"language": {
		"url": base_url+'/Assets/js/es-pe.json'
	},
	"ajax": {
		"url": base_url+"/Producto/getCconsumo",
		"type": "POST",
		"dataType": "json"
	},
	"columns": [
	{"data":"orden"}, 	
	{"data":"Descripcion"}, 	
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


/* REGISTER CONSUMO */
$("#form_registercentroconsumo").submit(function() {
    var consumo 			= $('#txtcconsumo').val();  
    var total 				= consumo.length ;

    var requestCArgo 					= new Object();
    requestCArgo["IdCconsumo"]			= $("#txtIdCentroConsumo").val();
    requestCArgo["controlCconsumo"]		= $("#txtcontrolCentroConsumo").val();
    requestCArgo["consumo"]				= $("#txtcconsumo").val();	
	requestCArgo["estado"]				= ($('#chkestadocconsumo').prop('checked') ? '1' : '2');


    if (total>0){
        $.ajax({
            url: base_url+'/Producto/setCconsumo',
	        type: "POST",     
	        dataType: 'json',
	        data:requestCArgo,    
	        cache: false,
	        	
	        success: function(data, textStatus, jqXHR){
	        	console.log(data.msg);

	        	if(jqXHR.status == 200){
	        		if(data.status){
						swal(data.title, data.msg, "success");
		        		$('.confirm').removeClass('btn btn-danger').removeClass('btn btn-warning').addClass('btn btn-success');
		        		$('#tableCconsumo').DataTable().ajax.reload();
		        		cancelCconsumo();
		        		return false;

	        		}else{
		        		swal({  title: 	data.title,
							    text: 	data.msg,
							    type: 	"error"},
							    function(){ 
							    	setTimeout(function() {
							          $('#txtcconsumo').focus();
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


/* SHOW CONSUMO */
function editarCconsumo(id){
	// alert('ID a mostrar: '+id);
	$('#txtIdCentroConsumo').val(id);
    $('#txtcontrolCentroConsumo').val('1');
    $("#updateCconsumo").removeAttr('style');
    $("#agregarCconsumo").css("display","none");
    $("#titleCconsumo").html("<strong>EDITAR CENTRO DE CONSUMO</strong>");
    $('#estado_consumo').show();

	$.ajax({
      	type:'GET',
      	url: base_url+"/Producto/getCconsumoedit/"+id,
      	dataType:'json',
      	success: function(data, textStatus, jqXHR){
	       	
	       	if(jqXHR.status == 200){
	       		console.log(data);
		        if(data.status){
			        
			        var estado = (data.data.Estado == 1) ? true : false;
			        $('#txtcconsumo').val(data.data.Descripcion).attr('disabled',false);
			        
			        $('#chkestadocconsumo').prop("checked",estado);
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

/* DELETE CONSUMO */
function eliminarCconsumo(id){
	//alert('ID a eliminar es: '+id)
	$('.confirm').removeClass('btn btn-success').removeClass('btn btn-danger').removeClass('btn btn-warning');
  	swal({  title: "Eliminar Centro de Consumo",
      	text: "¿Desea eliminar este Cconsumo?",
      	type: "warning",
      	showCancelButton: true,
      	cancelButtonText: "Cancelar",
      	confirmButtonColor: "#ff9600",
      	confirmButtonText: "Aceptar",
      	closeOnConfirm: false },
      	function(){ 
          	$.ajax({
	            type:'DELETE',
	            url: base_url+"/Producto/delCconsumo/"+id,
	            dataType:'json',
	            success: function(data, textStatus, jqXHR){
	              	if(jqXHR.status == 200){
	              		console.log(data);
	              		if(data.status){

	              			swal(data.title, data.msg, "success");
		        			$('.confirm').removeClass('btn btn-danger').removeClass('btn btn-warning').addClass('btn btn-success');
		        			$('#tableCconsumo').DataTable().ajax.reload();
		        			cancelCconsumo();
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
/* DELETE documento */
function eliminarDocumento(id){
	//alert('ID a eliminar es: '+id)
	$('.confirm').removeClass('btn btn-success').removeClass('btn btn-danger').removeClass('btn btn-warning');
  	swal({  title: "Eliminar Documento",
      	text: "¿Desea eliminar este Documento?",
      	type: "warning",
      	showCancelButton: true,
      	cancelButtonText: "Cancelar",
      	confirmButtonColor: "#ff9600",
      	confirmButtonText: "Aceptar",
      	closeOnConfirm: false },
      	function(){ 
          	$.ajax({
	            type:'DELETE',
	            url: base_url+"/Producto/delDocumento/"+id,
	            dataType:'json',
	            success: function(data, textStatus, jqXHR){
	              	if(jqXHR.status == 200){
	              		console.log(data);
	              		if(data.status){

	              			swal(data.title, data.msg, "success");
		        			$('.confirm').removeClass('btn btn-danger').removeClass('btn btn-warning').addClass('btn btn-success');
		        			$('#tabledocumento').DataTable().ajax.reload();
		        			cancelDocumento();
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


/* DELETE CONSUMO */
function eliminarAlmacen(id){
	//alert('ID a eliminar es: '+id)
	$('.confirm').removeClass('btn btn-success').removeClass('btn btn-danger').removeClass('btn btn-warning');
  	swal({  title: "Eliminar Almacen",
      	text: "¿Desea eliminar este Almacen?",
      	type: "warning",
      	showCancelButton: true,
      	cancelButtonText: "Cancelar",
      	confirmButtonColor: "#ff9600",
      	confirmButtonText: "Aceptar",
      	closeOnConfirm: false },
      	function(){ 
          	$.ajax({
	            type:'DELETE',
	            url: base_url+"/Producto/delalmacen/"+id,
	            dataType:'json',
	            success: function(data, textStatus, jqXHR){
	              	if(jqXHR.status == 200){
	              		console.log(data);
	              		if(data.status){

	              			swal(data.title, data.msg, "success");
		        			$('.confirm').removeClass('btn btn-danger').removeClass('btn btn-warning').addClass('btn btn-success');
		        			$('#tablealmacen').DataTable().ajax.reload();
		        			cancelCconsumo();
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



/* CANCEL CARGO */
function cancelCconsumo(){
      $("#agregarCconsumo").removeAttr('style');
      $("#updateCconsumo").css("display","none");
      $("#titleCconsumo").html("<strong>REGISTRAR CENTRO DE CONSUMO</strong>");
      $('#estado_consumo').hide();
      $('#form_registercentroconsumo')[0].reset();
      $('#form_registercentroconsumo').validate().resetForm();
      $('#txtcontrolCentroConsumo').val('0');
      $('#txtcconsumo').attr('disabled',false);
      $('#form_registercentroconsumo .form-group').removeClass('has-success');
}

// CREAR USUARIO CREA A CENTRO DE CONSUMO


