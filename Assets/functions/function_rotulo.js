// JavaScript Document
$(document).ready(function(){

	//verlistadoModulos();
	
});



$('#form_radiobuton').hide();
$('#panelstock').hide();
cboProducto();

function MostrarCantidades(id){
	// alert('ID a mostrar: '+id);
		//$('#cboproductorepor').val(id);

			var producto	 = $("#cboproductorepor").val();
    

	$.ajax({
      	type:'GET',
      	url: base_url+"/Rotulo/getcantidades/"+producto,
      	dataType:'json',
      	success: function(data, textStatus, jqXHR){
	       	
	       	if(jqXHR.status == 200){
	       		console.log(data);
		        if(data.status){
			      
			        $('#txtA').val(data.data.at);
			        $('#txtB').val(data.data.bt);
			        $('#txtC').val(data.data.ct);			        
			       

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


/*================================================  FUNCTIONS STOCK  ================================================*/
/* TABLE STOCK */
function buttonconsultastock(){ 
	$('#form_radiobuton').show();
	$('#panelstock').show();
	var producto	      = $("#cboproductorepor").val();

    
var tableStk = $('#tableStocks').DataTable({
	
	"destroy": true,
	"order": [],
	"language": {
		"url": base_url+'/Assets/js/es-pe.json'
	},
	"ajax": {
		"url": base_url+"/Rotulo/gettabletotalStock",
		"type": "POST",
		'data' : {'producto' : producto},
		"dataType": "json"
	},
	"columns": [
	{"data":"Descripcion"}, 
	{"data":"at"}, 
	{"data":"bt"}, 
	{"data":"ct"}, 
	{"data":"Existencia"}, 	

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

function pdfRotuloPallet(categoria){

	var producto	 	 = $("#cboproductorepor").val();
	var cant 			 	 = $("#txt"+categoria).val();
	var RA 			 	   = $("#txtr"+categoria).val();
	var valores 		 = [producto,cant,RA,categoria];



	//resultado = catA + RA;
	
			$('<form target="_blank" action="Rotulo/generarPdfRotulopallet/'+valores+'" method="POST"></form>').appendTo('body').submit();
		}




function cboProducto(){
	$.ajax({
	    type: "GET",
	    async : false,
	    url: base_url+'/Rotulo/getSelectProducto', 
	    success: function(data, textStatus, jqXHR){
	    	if(jqXHR.status == 200){
	            //console.log(data);
	            
	            $("#cboproductorepor").selectpicker('destroy');
	            $("#cboproductorepor").html(data).selectpicker('refresh');

	        }
	    }
	});
}


