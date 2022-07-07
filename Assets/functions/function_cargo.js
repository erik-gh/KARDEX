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


/*================================================  FUNCTIONS CARGO  ================================================*/
/* TABLE CARGOSS */
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
			        $('#txtcargo').val(data.data.cargo).attr('disabled',true);
			        $('#txtremuneracion').val(data.data.remuneracion);
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



function descargarCargo(){
	$.ajax({
    	url: base_url+'/Cargo/getexportCargo',
    	type: "POST",     
    	dataType: 'json',
    	cache: false,

    	success: function(data, textStatus, jqXHR){ console.log(data);
    		console.log(data.msg);

    		if(jqXHR.status == 200){
    			if(data.status){
    				// console.log(textStatus);
    				// console.log(jqXHR.status);
    				window.open(base_url+'/'+data.data);
			        setTimeout(function() {
			        	eliminarfile(data.data);
			        },5000);
    				
    				return false;

    			}else{
    				swal({  title: 	data.title,
    					text: 	data.msg,
    					type: 	"warning"},
    					function(){ 
    						setTimeout(function() {
    							// $('#txtperfil').focus();
    						}, 10)
    					});
    				$('.confirm').removeClass('btn btn-success').removeClass('btn btn-danger').addClass('btn btn-warning');
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


function eliminarfile(id){
      
	$.ajax({
		type:'DELETE',
		url: base_url+'/Cargo/eliminarfile/'+id,
		success: function(data){

		}
	});
   	return false;
}