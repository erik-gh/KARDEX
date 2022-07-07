// JavaScript Document
$(document).ready(function(){

	//verlistadoModulos();
	
});




cboSucursal();

resetCbo();
Cbofamilia();
cboProductotrazabilidad();


function descargarstockSucursal(){
	$.ajax({
    	url:  base_url+'/Reportes/StockSucursalExcel',
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


function buttontrazproducto(){ 
	var sucursal      	= $("#cbosucursalT").val();
	var producto      	= $("#cboproducto").val(); 
	var desde 	      	= $("#txtfechadesde").val();
	var hasta 	      	= $("#txtfechahasta").val();  

var tableTRAZ = $('#tableTrazProd').DataTable({
	//"processing": true,
	//"serverSide": true,
	"destroy": true,
	"order": [],
	//////////////////////
	dom: 'Bfrtip',
        buttons: [
        //   'copy', 'csv', 'excel', 'print',
           'excel','print',
          {
              extend: 'pdfHtml5',
              orientation: 'landscape',
              pageSize: 'A4',
              /* 
              // Para orientación horizontal y tamaño de hoja oficio
              orientation: 'landscape',
              pageSize: 'LEGAL',
              */
          }
        ],
     //////////////////////////////
	"language": {
		"url": base_url+'/Assets/js/es-pe.json'
	},
	"ajax": {
		"url": base_url+"/Reportes/gettabletazproducto",
		"type": "POST",
		"scrollX": true,
		'data' : { 'sucursal' : sucursal ,'producto' : producto ,'desde' : desde ,'hasta' : hasta },
		"dataType": "json"
	},
	"columns": [
	{"data":"orden"}, 
	{"data":"Sucursal"},
	{"data":"CodProducto"}, 
	{"data":"Producto"}, 
	{"data":"Movimiento"},
	{"data":"kardex"},
	{"data":"a"}, 
	{"data":"b"}, 
	{"data":"c"}, 
	{"data":"Entrada"},
	{"data":"Salida"},
	{"data":"Existencia"},
	{"data":"FechaCrea"},	
	{"data":"nombre"}, 
	
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

/*================================================  FUNCTIONS STOCK  ================================================*/
/* TABLE STOCK */
function buttonconsultastock(){ 
	var sucursal      	= $("#cbosucursal").val();
	var familia      		= $("#cbofamiliarepor").val();
	var clase	      		= $("#cboclaserepor").val();
	var producto	      = $("#cboproductorepor").val();

    
var tableStock = $('#tableStockProductos').DataTable({
	//"processing": true,
	//"serverSide": true,
	"destroy": true,
	"order": [],
	//////////////////////
	dom: 'Bfrtip',
        buttons: [
        //   'copy', 'csv', 'excel', 'print',
           'excel','print',
          {
              extend: 'pdfHtml5',
              orientation: 'landscape',
              pageSize: 'A4',
              /* 
              // Para orientación horizontal y tamaño de hoja oficio
              orientation: 'landscape',
              pageSize: 'LEGAL',
              */
          }
        ],
     //////////////////////////////
	"language": {
		"url": base_url+'/Assets/js/es-pe.json'
	},
	"ajax": {
		"url": base_url+"/Reportes/gettabletotalStock",
		"type": "POST",
		'data' : { 'sucursal' : sucursal,'familia' : familia ,'clase' : clase,'producto' : producto},
		"dataType": "json"
	},
	"columns": [
	{"data":"CodProducto"}, 
	{"data":"sucursal"}, 
	{"data":"Descripcion"}, 
	{"data":"at"}, 
	{"data":"bt"}, 
	{"data":"ct"}, 
	{"data":"Existencia"},
	{"data":"IdFamilia"},	
	{"data":"familia"},
	{"data":"IdClase"},	
	{"data":"clase"}, 
	{"data":"uma"},
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

$('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-primary text-white mr-1');

function cboSucursal(){
	$.ajax({
	    type: "GET",
	    async : false,
	    url: base_url+'/Reportes/getSelectSucursales', 
	    success: function(data, textStatus, jqXHR){
	    	if(jqXHR.status == 200){
	            //console.log(data);
	            $("#cbosucursal").selectpicker('destroy');
	            $("#cbosucursal").html(data).selectpicker('refresh');

	            $("#cbosucursalT").selectpicker('destroy');
	            $("#cbosucursalT").html(data).selectpicker('refresh');
	           
	        }
	    }
	});
}


function cboProducto(){

if($('#cboclaserepor').val() != ''){ 
    var requestClase          = new Object();
    requestClase["IdClase"] = $("#cboclaserepor").val();
    
      $.ajax({
         url: base_url+'/Reportes/getSelectProductoOnchange',
          type: "POST",     
          // dataType: 'json',
          data:requestClase,    
          cache: false,
            
          success: function(data, textStatus, jqXHR){
            // console.log(data);
            if(jqXHR.status == 200){

              //$("#cboproducto").selectpicker('destroy');
	            //$("#cboproducto").html(data).selectpicker('refresh');

	            $("#cboproductorepor").selectpicker('destroy');
	            $("#cboproductorepor").html(data).selectpicker('refresh');

            }

          },
          
      });
      return false;

  }else{
        
      resetCbo();

  }

}

function cboProductotrazabilidad(){

	$.ajax({
	    type: "GET",
	    async : false,
	    url: base_url+'/Reportes/getSelectProducto', 
	    success: function(data, textStatus, jqXHR){
	    	if(jqXHR.status == 200){
	            //console.log(data);
	            $("#cboproducto").selectpicker('destroy');
	            $("#cboproducto").html(data).selectpicker('refresh');


	        }
	    }
	});
}



function CboClase(){

if($('#cbofamiliarepor').val() != ''){ 
    var requestFamilia          = new Object();
    requestFamilia["IdFamilia"] = $("#cbofamiliarepor").val();
    
      $.ajax({
          url: base_url+'/Reportes/getSelectClase',
          type: "POST",     
          // dataType: 'json',
          data:requestFamilia,    
          cache: false,
            
          success: function(data, textStatus, jqXHR){
            // console.log(data);
            if(jqXHR.status == 200){

              $("#cboclaserepor").selectpicker('destroy');
	            $("#cboclaserepor").html(data).selectpicker('refresh');

            }

          },
          
      });
      return false;

  }else{
        
      resetCbo();

  }

}

function resetCbo(){
 
  $('#cboclaserepor').selectpicker('destroy');
  $('#cboclaserepor').html( '<option value="">[ Seleccione Clase ]</option>' ).selectpicker('refresh');

}


function Cbofamilia(){
	$.ajax({
	    type: "GET",
	    async : false,
	    url: base_url+'/Producto/getSelectFamilia', 
	    success: function(data, textStatus, jqXHR){
	    	if(jqXHR.status == 200){
	            //console.log(data);
	            $("#cbofamiliarepor").selectpicker('destroy');
	            $("#cbofamiliarepor").html(data).selectpicker('refresh');
	        }
	    }
	});
}



function VisualizarPanel(){ 

	$('#paneldetallecompras').hide();
	$('#panelboton').hide();
	$('#panelcompra').show();

		

}





function VisualizarModalProducto(){ 

	$('#modal_buscarproducto').modal('show');

	//$('#paneldetallecompras').hide();
	//$('#panelboton').hide();
	//$('#panelcompra').show();

		

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



/*================================================  FUNCTION TABLE DETALLE DE INGRESOS   ================================================*/
/* TABLE TOTAL DE INGRESOS */







