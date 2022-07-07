<?php 

	/**
	* 
	*/
	class Crequerimiento extends Controllers
	{
		
		public function __construct()
		{
			# code...
			session_start();
			if(empty($_SESSION['login'])){
				header('Location: '.base_url().'/login');
			}

			parent::__construct();
			
		}


		public function crequerimiento()
		{

			$data['page_tag']='crequerimiento';
			$data['page_title']='CONTROL DE REQUERIMIENTOS';
			$data['page_name']='Crequerimiento';
			$data['page_function_js']='function_crequerimiento.js';
			$this->views->getView($this,'crequerimiento',$data);
		}



		public function setAnular()
		{ 
			if($_POST){
				if( empty($_POST['IdAnular']) || empty($_POST['Observaciones'])){

					$arrResponse = 	[
								    	"status"=> false,
								    	"title"	=> "Error!",
								    	"msg" 	=> "Completar Datos para la Anulacion.",
									]; 
				}else{
					$intIdAnular	= intval(strClean($_POST['IdAnular']));
					$intControl		= intval(strClean($_POST['control']));
					$strObservacion	= strClean($_POST['Observaciones']);
					$intUserSession	= intval(strClean($_SESSION['idUser']));
					
					
					if($intControl == 0){
						# consulta
						$EvaluarEstado	= $this->model->EvaluarEstadoReq($intIdAnular);
						$Estado = $EvaluarEstado['Estado'];	
						
						
						if ($Estado == 2) {

							$requestExtornar	= $this->model->insertExtornarReq($intIdAnular,$strObservacion, $intUserSession);

							$requestEstComprayDtll		= $this->model->CambiarEstadoReq($intIdAnular, $intUserSession);

							$requestInsertarTarjetaMovExtornar	= $this->model->InsertarTarjetaMovExtornarReq($intIdAnular);

							$UpdateStockP	= $this->model->UpdateStockExtornarReq($intIdAnular);

							$UpdateTjmExt	= $this->model->UpdateTjmExtReq($intIdAnular);
							
						}else{


						$arrResponse = 	[
											    "status"=> true,
											    "title"	=> "Anulado",
											    "msg" 	=> "Este Requerimiento ya se encuentra anulado",
											]; 

					   }


					}else{
						//$requestExtornar	= $this->model->updateProveedor($intIdProveedor, $strRazonSocial,$intRuc,$intCelular,$intEstado,$intUserSession);
					}

					if($Estado == 2){

						if($intControl == 0){
							$arrResponse = 	[
											    "status"=> true,
											    "title"	=> "Anulado",
											    "msg" 	=> "Requerimiento Anulado Correctamente.",
											];
						}
					}else {
						$arrResponse = 	[
										    "status"=> false,
										    "title"	=> "Alerta!!",
										    "msg" 	=> "Este Requerimiento ya se encuentra anulado",
										];
					}

				}
			}
			echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			die();
		}





		public function generarPdf($id){


						
				$IdRequerimiento = intval(strClean($id));
				//$output = array();
				//$arrData = $this->model->selectllenarproducto($IdCompra);

			$requestPdfReq				= $this->model->consultareportecabecerarequerimiento($IdRequerimiento);

			$requestPdfRequerimiento	= $this->model->consultareportedetallerequerimiento($IdRequerimiento);

				
			require('libraries/fpdf/fpdf.php');

			$pdf = new FPDF('P','mm','A4');
			$pdf->AddPage();
			$pdf->setTitle('Guia de Requerimiento');
			$pdf->SetFont('Arial','B',12);
			$pdf->Cell(190,10,$requestPdfReq['proceso'],0,1,'C');
			
			$pdf->SetFont('Arial','B',14);
			$pdf->Cell(190,10,'REQUERIMIENTO MATERIALES',0,1,'C');
			
			$pdf->Image('Assets/images/onpelogo.jpg',4,4,50,50);
		
			$pdf->Ln();

			$pdf->SetFont('Arial','B',10);
			$pdf->Cell(30,6,'C. Consumo :',0,0,'L');
			$pdf->SetFont('Arial','',9);
			$pdf->Cell(40,6,$requestPdfReq['centro'],0,0,'L');

			$pdf->SetFont('Arial','B',10);
			$pdf->Cell(80,6,'Almacen:',0,0,'R');
			$pdf->SetFont('Arial','',9);
			$pdf->Cell(40,6,$requestPdfReq['sucursal'],0,0,'C');

			$pdf->Ln();

			$pdf->SetFont('Arial','B',10);
			$pdf->Cell(30,6,'Solicitado Por:',0,0,'L');
			$pdf->SetFont('Arial','',9);
			$pdf->Cell(40,6,utf8_decode($requestPdfReq['apellido']),0,0,'L');

			$pdf->SetFont('Arial','B',10);
			$pdf->Cell(80,6,'Fecha de Solicitud:',0,0,'R');
			$pdf->SetFont('Arial','',9);
			$pdf->Cell(40,6,$requestPdfReq['Fecha'],0,0,'C');

			$pdf->Ln();

			$pdf->SetFont('Arial','B',10);
			$pdf->Cell(30,6,'Nro Doc.: 004-',0,0,'L');
			$pdf->SetFont('Arial','',9);
			$pdf->Cell(40,6,$requestPdfReq['IdRequerimiento'],0,0,'L');

			//$pdf->Cell(40,10,date('d/m/Y'),0,1,'L');

			$pdf->SetFont('Arial','B',10);
			$pdf->Cell(80,6,utf8_decode('Fecha Impresión:'),0,0,'R');
			$pdf->SetFont('Arial','',9);
			$pdf->Cell(40,6,date('d/m/Y'),0,0,'C');

			$pdf->Ln();
			$pdf->Ln();


				// Encabezado 
			//Line(float x1, float y1, float x2, float y2)
			$pdf->Line(10,65,200,65);
			$pdf->Line(10,73,200,73);
			$pdf->SetFont('Arial','B',10);
			$pdf->Cell(20,10,'CODIGO:',0,0,'C');
			$pdf->Cell(90,10,'DESCRIPCION:',0,0,'C');
			$pdf->Cell(18,10,'CANT.A:',0,0,'C');
			$pdf->Cell(18,10,'CANT.B:',0,0,'C');
			$pdf->Cell(18,10,'CANT.C:',0,0,'C');
			$pdf->Cell(25,10,'UMA',0,0,'C');			
			$pdf->Ln();

		foreach ($requestPdfRequerimiento as $row) {

						
				$pdf->SetFont('Arial','',7);
				
				$pdf->Cell(20,6, utf8_decode($row['CodProducto']),0,0,'C',0);
				
				#$pdf->Cell(90,6, utf8_decode($row['Descripcion']),0,0,'C',0);
				#/*
				$pdf->MultiCell(90, 6, utf8_decode($row['Descripcion']),0,'L');
				$current_y = $pdf->GetY();
				#$current_x = $pdf->GetX();
				$pdf->SetXY(120, $current_y -6);
				#*/
				$pdf->Cell(18,6, $row['Aa'],0,0,'C',0);
				$pdf->Cell(18,6, $row['Ab'],0,0,'C',0);
				$pdf->Cell(18,6, $row['Ac'],0,0,'C',0);
				$pdf->Cell(25,6, utf8_decode($row['uma']),0,1,'C',0);
				
				

			}
		
			     		
			
		
			$pdf->Output();
			

		}	
			



		public function deleterequerimiento($IdRequerimiento)
		{
			
				$intIdRequerimiento = intval(strClean($IdRequerimiento));
				$requestDelete 	= $this->model->deletereque($intIdRequerimiento);

				if ($requestDelete > 0) {
					$arrResponse = 	[
										"status"=> true,
										"title"	=> "Requerimiento Eliminado",
										"msg" 	=> "Eliminado Correctamente.",
									];

				}else{
					$arrResponse = 	[
										"status"=> false,
										"title"	=> "Error!",
										"msg" 	=> "Error al eliminar la Familia",
									];
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			
				die();
		}



		public function getBottonReq($IdReque)
		{

			$intIdReque = intval(strClean($IdReque));

			if ($intIdReque > 0) {
				
				$arrData = $this->model->selectEstadoReq($intIdReque);

				if(empty($arrData)){
					$arrResponse = 	[
										"status"=> false,
										"title"	=> "Error!",
										"msg" 	=> "Datos No Encontrados.",
									]; 
				}else{
					$arrResponse = 	[
										"status"=> true,
										"data" 	=> $arrData,
									]; 
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
			die();
		}


			public function delfiladetallerequerimiento($idfila)
		{
				// id a eliminar 
				$intidfila	= intval(strClean($idfila));
				$requestDelete 	= $this->model->deletefiladetalle($intidfila);

				if ($requestDelete > 0) {
					$arrResponse = 	[
										"status"=> true,
										"title"	=> "Producto Eliminado",
										"msg" 	=> "Fila Eliminada Correctamente.",
									];

				}else{
					$arrResponse = 	[
										"status"=> false,
										"title"	=> "Error!",
										"msg" 	=> "Error al eliminar la Familia",
									];
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			
				die();
		}


			public function setDespachoRequerimiento()
		{  
			if($_POST){
				if( empty($_POST['IdRequerimiento'])){
					$arrResponse = 	[
								    	"status"=> false,
								    	"title"	=> "Error!",
								    	"msg" 	=> "Verificar Datos.",
									]; 
				}else{
					
					
					$intIdRequerimiento			 	= intval(strClean($_POST['IdRequerimiento']));
					$intUserSession					= intval(strClean($_SESSION['idUser']));
					

					
					if($intIdRequerimiento > 0){						
					
										
							$requestModEstadoReq = $this->model->updateEstadoDespacho($intIdRequerimiento,$intUserSession);
									


					}else{
						
					}

					if($requestModEstadoReq > 0){

						if($intIdRequerimiento == 0){
							$arrResponse = 	[
											    "status"=> true,
											    "title"	=> "Despachado",
											    "msg" 	=> "Datos Guardados Correctamente.",
											];
						}else{
							$arrResponse = 	[
											    "status"=> true,
											    "title"	=> "Despachado",
											    "msg" 	=> "Datos Actualizados Correctamente.",
											];
						}
					}else{
						$arrResponse = 	[
										    "status"=> false,
										    "title"	=> "Error!",
										    "msg" 	=> "No se puede conectarse a la Base Datos",
										];
					}
				}
			}
			echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			die();
		}




		public function setCrequerimiento()
		{  
			if($_POST){
				if( empty($_POST['IdRequerimiento'])){
					$arrResponse = 	[
								    	"status"=> false,
								    	"title"	=> "Error!",
								    	"msg" 	=> "Verificar Datos.",
									]; 
				}else{
					
					
					$intIdRequerimiento			 	= intval(strClean($_POST['IdRequerimiento']));
					$intUserSession					= intval(strClean($_SESSION['idUser']));
					$detallesReque			  	 	= json_decode($_POST['detalleReq']);

					
					if($intIdRequerimiento > 0){

						
						foreach ($detallesReque as $row) {
							$cantidadA = intval(strClean($row->cantidadA));
							$cantidadB = intval(strClean($row->cantidadB));
							$cantidadC = intval(strClean($row->cantidadC));
							$idProducto = intval(strClean($row->idProducto));

							$cantidadA = ($cantidadA > 0) ? $cantidadA : 0;
							$cantidadB = ($cantidadB > 0) ? $cantidadB : 0;
							$cantidadC = ($cantidadC > 0) ? $cantidadC : 0;

							//$Total = $cantidadA - $cantidadC;

							$requestDetalleCrequerimiento = $this->model->UpdateDetallReque($intIdRequerimiento,$idProducto, $cantidadA,$cantidadB, $cantidadC,$intUserSession);		
						
							
						}	
						//modificar estado de Req					
							$requestModEstadoReq = $this->model->updateEstadoReq($intIdRequerimiento,$intUserSession);
						// insertar en tarjeta de movimiento	
							$requestInserTarjMov = $this->model->InserintoTjmRequerimiento($intIdRequerimiento);
							$UpdateStockP	= $this->model->UpdateStockProdReq($intIdRequerimiento);
							$UpdateTjm	= $this->model->UpdateTjmReq($intIdRequerimiento);

							$requestModEstadoDetalleReq = $this->model->updateEstadoDetalleReq($intIdRequerimiento,$intUserSession);					

						
						


					}else{
						
					}

					if($requestDetalleCrequerimiento > 0){

						if($intIdRequerimiento == 0){
							$arrResponse = 	[
											    "status"=> true,
											    "title"	=> "Ingreso",
											    "msg" 	=> "Datos Guardados Correctamente.",
											];
						}else{
							$arrResponse = 	[
											    "status"=> true,
											    "title"	=> "Ingreso",
											    "msg" 	=> "Datos Actualizados Correctamente.",
											];
						}
					}else{
						$arrResponse = 	[
										    "status"=> false,
										    "title"	=> "Error!",
										    "msg" 	=> "No se puede conectarse a la Base Datos",
										];
					}
				}
			}
			echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			die();
		}





		public function getDetalleCabeceraReq($IdRequerimiento)
		{

			$intIdRequerimiento = intval(strClean($IdRequerimiento));

			if ($intIdRequerimiento > 0) {
				
				$arrData = $this->model->selectDetalleRequerimiento($intIdRequerimiento);

				if(empty($arrData)){
					$arrResponse = 	[
										"status"=> false,
										"title"	=> "Error!",
										"msg" 	=> "Datos No Encontrados.",
									]; 
				}else{
					$arrResponse = 	[
										"status"=> true,
										"data" 	=> $arrData,
									]; 
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
			die();
		}


		public function gettabledetallerequerimiento($idrequerimiento)

			{

				$intIdRequerimiento = intval(strClean($idrequerimiento));
			
			$output = array();

			$arrData = $this->model->selecttabledetallerequerimientocontrol($intIdRequerimiento);
			
			for ($i=0; $i <  count($arrData[0]); $i++) { 

				if ($arrData[0][$i]['Estado'] == 0) {
					$variable1 = 'disabled';
					$variable2 = 'disabled';
					$variable3 = 'disabled';

					
				} else{
					//$disable = '';
					$variable1 = '';
					$variable2 = '';
					$variable3 = '';

				}

				$arrData[0][$i]['orden'] 	= 	$i+1;
				$arrData[0][$i]['opciones'] =	'<a class="btn btn-danger btn-xs" title="Eliminar Producto" onclick="eliminarfiladetalle('.$arrData[0][$i]['IdDetRequerimiento'].')">
													<i class="zmdi zmdi-close zmdi-hc-fw"></i>
												</a>

                                				';
				$arrData[0][$i]['a'] = '<td class="text-center" width="10%"><input class="form-control " type="number" style="width:60px" step="1"  onchange="verificaCantidad('.$arrData[0][$i]['at'].', this.value,'.$arrData[0][$i]['IdProducto'].',1);" '.$variable1.'  id="cantA'.$arrData[0][$i]['IdProducto'].'" value="0" min="0" required="">';

				$arrData[0][$i]['b'] = '<td class="text-center" width="10%"><input class="form-control " type="number" style="width:60px" step="1"  onchange="verificaCantidad('.$arrData[0][$i]['bt'].', this.value,'.$arrData[0][$i]['IdProducto'].',2);"'.$variable2.' id="cantB'.$arrData[0][$i]['IdProducto'].'" value="0" min="0" required="">';

				$arrData[0][$i]['c'] = '<td class="text-center" width="10%"><input class="form-control" type="number" min="0" style="width:60px" step="1"  onchange="verificaCantidad('.$arrData[0][$i]['ct'].', this.value,'.$arrData[0][$i]['IdProducto'].',3);" '.$variable3.'  id="cantC'.$arrData[0][$i]['IdProducto'].'" value="0" required=""><input type="hidden"  value="'.$arrData[0][$i]['IdProducto'].'" name="idProducto">		
				';
				              

				
			}

			$output = array(
				"draw"				=>	intval($_POST["draw"]),
				"recordsTotal"		=> 	$arrData[2]['row'],
				"recordsFiltered"	=>	$arrData[1]['row'],
				"data"				=>	$arrData[0]
			);
			echo json_encode($output,JSON_UNESCAPED_UNICODE);
			die();
			// dep($arrData[0][0]['estado']);
		}


		public function gettabledetallerequerimientoconfirmar($idrequerimiento)

			{

				$intIdRequerimiento = intval(strClean($idrequerimiento));
			
			$output = array();

			$arrData = $this->model->selecttabledetallerequerimientocontrol($intIdRequerimiento);
			
			for ($i=0; $i <  count($arrData[0]); $i++) { 

				if ($arrData[0][$i]['Estado'] == 0) {
					$variable1 = 'disabled';
					$variable2 = 'disabled';
					$variable3 = 'disabled';

					
				} else{
					//$disable = '';
					$variable1 = 'disabled';
					$variable2 = 'disabled';
					$variable3 = 'disabled';

				}

				$arrData[0][$i]['orden'] 	= 	$i+1;
				$arrData[0][$i]['opciones'] =	'<a class="btn btn-danger btn-xs" title="Eliminar Producto" 	>
													<i class="zmdi zmdi-close zmdi-hc-fw"></i>
												</a>

                                				';
				$arrData[0][$i]['a'] = '<td class="text-center" width="10%"><input class="form-control " type="number" style="width:60px" step="1"  onchange="verificaCantidad('.$arrData[0][$i]['at'].', this.value,'.$arrData[0][$i]['IdProducto'].',1);" '.$variable1.'  id="cantA'.$arrData[0][$i]['IdProducto'].'" value="0" min="0" required="">';

				$arrData[0][$i]['b'] = '<td class="text-center" width="10%"><input class="form-control " type="number" style="width:60px" step="1"  onchange="verificaCantidad('.$arrData[0][$i]['bt'].', this.value,'.$arrData[0][$i]['IdProducto'].',2);"'.$variable2.' id="cantB'.$arrData[0][$i]['IdProducto'].'" value="0" min="0" required="">';

				$arrData[0][$i]['c'] = '<td class="text-center" width="10%"><input class="form-control" type="number" min="0" style="width:60px" step="1"  onchange="verificaCantidad('.$arrData[0][$i]['ct'].', this.value,'.$arrData[0][$i]['IdProducto'].',3);" '.$variable3.'  id="cantC'.$arrData[0][$i]['IdProducto'].'" value="0" required=""><input type="hidden"  value="'.$arrData[0][$i]['IdProducto'].'" name="idProducto">		
				';
				              

				
			}

			$output = array(
				"draw"				=>	intval($_POST["draw"]),
				"recordsTotal"		=> 	$arrData[2]['row'],
				"recordsFiltered"	=>	$arrData[1]['row'],
				"data"				=>	$arrData[0]
			);
			echo json_encode($output,JSON_UNESCAPED_UNICODE);
			die();
			// dep($arrData[0][0]['estado']);
		}


		public function gettabledetallerequerimientoaprobado($idrequerimiento)
			{
			
			$intIdRequerimiento = intval(strClean($idrequerimiento));
			
			$output = array();

			$arrData = $this->model->selecttabledetallerequeaprobado($intIdRequerimiento);
			
			for ($i=0; $i <  count($arrData[0]); $i++) { 
				# code...
				$arrData[0][$i]['orden'] 	= 	$i+1;
				

				$arrData[0][$i]['Estado'] 	= 	$arrData[0][$i]['Estado']; 
					switch ($arrData[0][$i]['Estado']) {
							  case '0':
							   $arrData[0][$i]['Estado'] = '<span class="label label-danger label-pill m-w-60">ANULADO</span>';
							   
							    break;
							  case '1':
							   $arrData[0][$i]['Estado'] = '<span class="label label-primary label-pill m-w-60">PENDIENTE</span>';
							  
							    break;
							  case '2':
							   $arrData[0][$i]['Estado'] = '<span class="label label-success label-pill m-w-60">ATENDIDO</span>';
							    break;

							  case '3':
							   $arrData[0][$i]['Estado'] = '<span class="label label-success label-pill m-w-60">DESPACHADO</span>';
							    break;

							  case '4':
							   $arrData[0][$i]['Estado'] = '<span class="label label-danger label-pill m-w-60">EXTORNADO</span>';
							    break;
							    default:
							    //Declaraciones ejecutadas cuando ninguno de los valores coincide con el valor de la expresión
							    break;
							   
		
			}
			}

			$output = array(
				"draw"				=>	intval($_POST["draw"]),
				"recordsTotal"		=> 	$arrData[2]['row'],
				"recordsFiltered"	=>	$arrData[1]['row'],
				"data"				=>	$arrData[0]
			);
			echo json_encode($output,JSON_UNESCAPED_UNICODE);
			die();
			// dep($arrData[0][0]['estado']);
		
}



	public function gettabletotalrequerimientoscontrolconfirmar()
			{

			

			$output = array();
			$arrData = $this->model->selecttabletotalrequerimientoscontrolconfirmar();
			
			for ($i=0; $i <  count($arrData[0]); $i++) { 
				# code...
				$arrData[0][$i]['orden'] 	= 	$i+1;

				$arrData[0][$i]['Prioridad'] 	= 	$arrData[0][$i]['Prioridad'] ;


					switch ($arrData[0][$i]['Prioridad']) {
							  case '0':
							   $arrData[0][$i]['Prioridad'] = '<span class="label label-success label-pill m-w-60">BAJA</span>';
							    break;
							  case '1':
							   $arrData[0][$i]['Prioridad'] = '<span class="label label-warning label-pill m-w-60">MEDIA</span>';
							    break;
							  case '2':
							   $arrData[0][$i]['Prioridad'] = '<span class="label label-danger label-pill m-w-60">ALTA</span>';
							    break;					  
							
							 
							  default:
							    //Declaraciones ejecutadas cuando ninguno de los valores coincide con el valor de la expresión
							    break;
							};

				$arrData[0][$i]['Estado'] 	= 	$arrData[0][$i]['Estado']; 
					switch ($arrData[0][$i]['Estado']) {
							  case '0':
							   $arrData[0][$i]['Estado'] = '<span class="label label-danger label-pill m-w-60">ANULADO</span>';
							   $btnextornar='disabled';
							   $btneliminar = 'disabled';
							   $btnextornaronclick = '';
							   $btneliminaronclick = '';
							   $Ocultar = '';
							   $btnVer = '';
							   $btnimprimir = 'disabled';
							   $btnimprimironclick = '';

							   //$Ocultar ='<a class="btn btn-warning	 btn-xs" title="Descargar" onclick="pdfCrequerimiento('.$arrData[0][$i]['IdRequerimiento'].')">
                                					//<i data-toggle="tooltip" title="Descargar"class="zmdi zmdi-download zmdi-hc-fw"></i>
                                				//</a>';

							    break;
							  case '1':
							   $arrData[0][$i]['Estado'] = '<span class="label label-warning label-pill m-w-60">PENDIENTE</span>';
							   $btnextornar='disabled';	
							   $btneliminar = 'disabled';
							   $btnextornaronclick = '';
							   $btneliminaronclick ='';
							   $Ocultar = '';
							   $btnVer = '';
							   $btnimprimir = 'disabled';
							   $btnimprimironclick = '';

							    break;
							  case '2':
							   $arrData[0][$i]['Estado'] = '<span class="label label-success label-pill m-w-60">APROBADO</span>';
							   $btnextornar='disabled';
							   $btneliminar='disabled';
							   $btnextornaronclick = '';
							   $btneliminaronclick ='';
							   $Ocultar = '';
							   $btnVer = '';
							   $btnimprimir = '';
							   $btnimprimironclick = 'onclick="pdfCrequerimiento('.$arrData[0][$i]['IdRequerimiento'].')"';

							    break;	

							  case '3':
							   $arrData[0][$i]['Estado'] = '<span class="label label-success label-pill m-w-60">DESPACHADO</span>';
							   $btnextornar='disabled';
							   $btneliminar='disabled';
							   $btnextornaronclick = '';
							   $btneliminaronclick ='';
							   $Ocultar = '';
							   $btnVer = '';
							   $btnimprimir = '';
							   $btnimprimironclick = 'onclick="pdfCrequerimiento('.$arrData[0][$i]['IdRequerimiento'].')"';

							    break;					  

							  case '4':
							   $arrData[0][$i]['Estado'] = '<span class="label label-danger label-pill m-w-60">EXTORNADO</span>';
							   $btnextornar='disabled';
							   $btneliminar = 'disabled';
							   $btnextornaronclick = '';
							   $btneliminaronclick = '';
							   $Ocultar = '';
							   $btnVer = '';
							   $btnimprimir = 'disabled';
							   $btnimprimironclick = '';

							   //$Ocultar ='<a class="btn btn-warning	 btn-xs" title="Descargar" onclick="pdfCrequerimiento('.$arrData[0][$i]['IdRequerimiento'].')">
                                					//<i data-toggle="tooltip" title="Descargar"class="zmdi zmdi-download zmdi-hc-fw"></i>
                                				//</a>';

							    break;
							     default:
							    //Declaraciones ejecutadas cuando ninguno de los valores coincide con el valor de la expresión
							    break;
							};

				$arrData[0][$i]['opciones'] =	'<a class="btn btn-primary btn-xs" title="Visualizar Detalle" '.$btnVer.'onclick="MostrarDetalleRequerimientoconfirmar('.$arrData[0][$i]['IdRequerimiento'].');BloquearBottonReqConfirmar('.$arrData[0][$i]['IdRequerimiento'].');VisualizarTablaDetalleRequerimientoaprobadoconfirmar('.$arrData[0][$i]['IdRequerimiento'].');VisualizarTablaDetalleRequerimientoconfirmar('.$arrData[0][$i]['IdRequerimiento'].')">
													<i class="zmdi zmdi-eye zmdi-hc-fw"></i>
												</a>
												<a class="btn btn-success btn-xs" title="Imprimir" '.$btnimprimir.' '.$btnimprimironclick.'target="_blank">
                                					<i data-toggle="tooltip" title="Imprimir"class="zmdi zmdi-print zmdi-hc-fw"></i>
                                				</a>
                                				
                                				 '.$Ocultar.'

                                				<a class="btn btn-danger btn-xs" title="Eliminar" '.$btneliminar.''.$btneliminaronclick.'>
                                					<i data-toggle="tooltip" title="Eliminar"class="zmdi zmdi-delete zmdi-hc-fw"></i>
                                				</a>

                                				<a class="btn btn-danger btn-xs" title="Extornar"  '.$btnextornar.''.$btnextornaronclick.'>
                                					<i data-toggle="tooltip" title="Extornar"class="zmdi zmdi-close zmdi-hc-fw"></i>
                                				</a>
												
                                				';


			}

			$output = array(
				"draw"				=>	intval($_POST["draw"]),
				"recordsTotal"		=> 	$arrData[2]['row'],
				"recordsFiltered"	=>	$arrData[1]['row'],
				"data"				=>	$arrData[0]
			);
			echo json_encode($output,JSON_UNESCAPED_UNICODE);
			die();
			// dep($arrData[0][0]['estado']);
		}


		public function gettabletotalrequerimientoscontrol()
			{

			

			$output = array();
			$arrData = $this->model->selecttabletotalrequerimientoscontrol();
			
			for ($i=0; $i <  count($arrData[0]); $i++) { 
				# code...
				$arrData[0][$i]['orden'] 	= 	$i+1;

				$arrData[0][$i]['Prioridad'] 	= 	$arrData[0][$i]['Prioridad'] ;


					switch ($arrData[0][$i]['Prioridad']) {
							  case '0':
							   $arrData[0][$i]['Prioridad'] = '<span class="label label-success label-pill m-w-60">BAJA</span>';
							    break;
							  case '1':
							   $arrData[0][$i]['Prioridad'] = '<span class="label label-warning label-pill m-w-60">MEDIA</span>';
							    break;
							  case '2':
							   $arrData[0][$i]['Prioridad'] = '<span class="label label-danger label-pill m-w-60">ALTA</span>';
							    break;					  
							
							 
							  default:
							    //Declaraciones ejecutadas cuando ninguno de los valores coincide con el valor de la expresión
							    break;
							};

				$arrData[0][$i]['Estado'] 	= 	$arrData[0][$i]['Estado']; 
					switch ($arrData[0][$i]['Estado']) {
							  case '0':
							   $arrData[0][$i]['Estado'] = '<span class="label label-danger label-pill m-w-60">ANULADO</span>';
							   $btnextornar='disabled';
							   $btneliminar = 'disabled';
							   $btnextornaronclick = '';
							   $btneliminaronclick = '';
							   $Ocultar = '';
							   $btnVer = '';
							   $btnimprimir = 'disabled';
							   $btnimprimironclick = '';

							   //$Ocultar ='<a class="btn btn-warning	 btn-xs" title="Descargar" onclick="pdfCrequerimiento('.$arrData[0][$i]['IdRequerimiento'].')">
                                					//<i data-toggle="tooltip" title="Descargar"class="zmdi zmdi-download zmdi-hc-fw"></i>
                                				//</a>';

							    break;
							  case '1':
							   $arrData[0][$i]['Estado'] = '<span class="label label-warning label-pill m-w-60">PENDIENTE</span>';
							   $btnextornar='disabled';	
							   $btneliminar = '';
							   $btnextornaronclick = '';
							   $btneliminaronclick ='onclick="eliminarRequerimiento('.$arrData[0][$i]['IdRequerimiento'].')"';
							   $Ocultar = '';
							   $btnVer = '';
							   $btnimprimir = 'disabled';
							   $btnimprimironclick = '';

							    break;
							  case '2':
							   $arrData[0][$i]['Estado'] = '<span class="label label-success label-pill m-w-60">APROBADO</span>';
							   $btnextornar='';
							   $btneliminar='disabled';
							   $btnextornaronclick = 'onclick="Visualizarmodalanularreq('.$arrData[0][$i]['IdRequerimiento'].')"';
							   $btneliminaronclick ='';
							   $Ocultar = '';
							   $btnVer = '';
							   $btnimprimir = '';
							   $btnimprimironclick = 'onclick="pdfCrequerimiento('.$arrData[0][$i]['IdRequerimiento'].')"';

							    break;	

							  case '3':
							   $arrData[0][$i]['Estado'] = '<span class="label label-success label-pill m-w-60">DESPACHADO</span>';
							   $btnextornar='disabled';
							   $btneliminar='disabled';
							   $btnextornaronclick = '';
							   $btneliminaronclick ='';
							   $Ocultar = '';
							   $btnVer = '';
							   $btnimprimir = '';
							   $btnimprimironclick = 'onclick="pdfCrequerimiento('.$arrData[0][$i]['IdRequerimiento'].')"';

							    break;					  

							  case '4':
							   $arrData[0][$i]['Estado'] = '<span class="label label-danger label-pill m-w-60">EXTORNADO</span>';
							   $btnextornar='disabled';
							   $btneliminar = 'disabled';
							   $btnextornaronclick = '';
							   $btneliminaronclick = '';
							   $Ocultar = '';
							   $btnVer = '';
							   $btnimprimir = 'disabled';
							   $btnimprimironclick = '';

							   //$Ocultar ='<a class="btn btn-warning	 btn-xs" title="Descargar" onclick="pdfCrequerimiento('.$arrData[0][$i]['IdRequerimiento'].')">
                                					//<i data-toggle="tooltip" title="Descargar"class="zmdi zmdi-download zmdi-hc-fw"></i>
                                				//</a>';

							    break;
							     default:
							    //Declaraciones ejecutadas cuando ninguno de los valores coincide con el valor de la expresión
							    break;
							};

				$arrData[0][$i]['opciones'] =	'<a class="btn btn-primary btn-xs" title="Visualizar Detalle" '.$btnVer.'onclick="MostrarDetalleRequerimiento('.$arrData[0][$i]['IdRequerimiento'].');BloquearBottonReq('.$arrData[0][$i]['IdRequerimiento'].');VisualizarTablaDetalleRequerimientoaprobado('.$arrData[0][$i]['IdRequerimiento'].');VisualizarTablaDetalleRequerimiento('.$arrData[0][$i]['IdRequerimiento'].')">
													<i class="zmdi zmdi-eye zmdi-hc-fw"></i>
												</a>
												<a class="btn btn-success btn-xs" title="Imprimir" '.$btnimprimir.' '.$btnimprimironclick.'target="_blank">
                                					<i data-toggle="tooltip" title="Imprimir"class="zmdi zmdi-print zmdi-hc-fw"></i>
                                				</a>
                                				
                                				 '.$Ocultar.'

                                				<a class="btn btn-danger btn-xs" title="Eliminar" '.$btneliminar.''.$btneliminaronclick.'>
                                					<i data-toggle="tooltip" title="Eliminar"class="zmdi zmdi-delete zmdi-hc-fw"></i>
                                				</a>

                                				<a class="btn btn-danger btn-xs" title="Extornar"  '.$btnextornar.''.$btnextornaronclick.'>
                                					<i data-toggle="tooltip" title="Extornar"class="zmdi zmdi-close zmdi-hc-fw"></i>
                                				</a>
												
                                				';


			}

			$output = array(
				"draw"				=>	intval($_POST["draw"]),
				"recordsTotal"		=> 	$arrData[2]['row'],
				"recordsFiltered"	=>	$arrData[1]['row'],
				"data"				=>	$arrData[0]
			);
			echo json_encode($output,JSON_UNESCAPED_UNICODE);
			die();
			// dep($arrData[0][0]['estado']);
		}

###################
		



	


		

	

	}

?>