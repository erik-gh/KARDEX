<?php 

	/**
	* 
	*/
	class Compra extends Controllers
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


		public function compra()
		{

			$data['page_tag']='compra';
			$data['page_title']='GESTION DE INGRESOS';
			$data['page_name']='Compra';
			$data['page_function_js']='function_compra.js';
			$this->views->getView($this,'compra',$data);
		}


		public function DeleteCompra($idCompra)
		{  

			$intidCompra	= intval(strClean($idCompra));
			$intUserSession	= intval(strClean($_SESSION['idUser']));

			if($_POST){
				if( empty($intidCompra)){
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

				

							$requestDetalleCrequerimiento = $this->model->UpdateDetallReque($intIdRequerimiento,$idProducto, $cantidadA,$cantidadB, $cantidadC,$intUserSession);		
						
							
					
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




		public function generarPdf($id){


						
				$IdCompra = intval(strClean($id));
				//$output = array();
				//$arrData = $this->model->selectllenarproducto($IdCompra);

			$requestPdfCompra	= $this->model->consultareportecabeceracompra($IdCompra);

			$requestPdfCompras	= $this->model->consultareportedetallecompra($IdCompra);

				
			require('libraries/fpdf/fpdf.php');

			$pdf = new FPDF('P','mm','A4');
			$pdf->AddPage();
			$pdf->setTitle('Guia de Ingreso');
			$pdf->SetFont('Arial','B',12);
			$pdf->Cell(190,10,$requestPdfCompra['Descripcion'],0,1,'C');
			
			$pdf->SetFont('Arial','B',14);
			$pdf->Cell(190,10,'GUIA DE ENTRADA',0,1,'C');
			
			$pdf->Image('Assets/images/onpelogo.jpg',4,4,50,50);
		
			$pdf->Ln();

			$pdf->SetFont('Arial','B',10);
			$pdf->Cell(30,6,'Proveedor:',0,0,'L');
			$pdf->SetFont('Arial','',9);
			$pdf->Cell(40,6,utf8_decode($requestPdfCompra['RazonSocial']),0,0,'L');

			$pdf->SetFont('Arial','B',10);
			$pdf->Cell(80,6,'Destino:',0,0,'R');
			$pdf->SetFont('Arial','',9);
			$pdf->Cell(40,6,$requestPdfCompra['sucursal'],0,0,'C');

			$pdf->Ln();

			$pdf->SetFont('Arial','B',10);
			$pdf->Cell(30,6,'Registrado Por:',0,0,'L');
			$pdf->SetFont('Arial','',9);
			$pdf->Cell(40,6,$requestPdfCompra['nombre'],0,0,'L');

			$pdf->SetFont('Arial','B',10);
			$pdf->Cell(80,6,'Fecha de Ingreso:',0,0,'R');
			$pdf->SetFont('Arial','',9);
			$pdf->Cell(40,6,$requestPdfCompra['FechaCrea'],0,0,'C');

			$pdf->Ln();

			$pdf->SetFont('Arial','B',10);
			$pdf->Cell(30,6,'Nro Doc.:',0,0,'L');
			$pdf->SetFont('Arial','',9);
			$pdf->Cell(40,6,$requestPdfCompra['Serie'],0,0,'L');

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

			foreach ($requestPdfCompras as $row) {

						
				$pdf->SetFont('Arial','',7);
				$pdf->Cell(20,6, utf8_decode($row['CodProducto']),0,0,'C',0);
				$pdf->MultiCell(90, 6, utf8_decode($row['producto']),0,'L');
				$current_y = $pdf->GetY();
				$pdf->SetXY(120, $current_y -6);
				$pdf->Cell(18,6, $row['a'],0,0,'C',0);
				$pdf->Cell(18,6, $row['b'],0,0,'C',0);
				$pdf->Cell(18,6, $row['c'],0,0,'C',0);
				$pdf->Cell(25,6, utf8_decode($row['uma']),0,1,'C',0);
			}			
			
			     		
			
		
			$pdf->Output();
			

		}	
					
		


		public function setProveedor()
		{ 
			if($_POST){
				if( empty($_POST['razonsocial'])){
					$arrResponse = 	[
								    	"status"=> false,
								    	"title"	=> "Error!",
								    	"msg" 	=> "Verificar Datos.",
									]; 
				}else{
					$intIdProveedor	= intval(strClean($_POST['IdProveedor']));
					$intControl		= intval(strClean($_POST['controlProveedor']));
					$strRazonSocial	= strClean($_POST['razonsocial']);
					$intRuc			= strClean($_POST['ruc']);
					$intCelular		= strClean($_POST['celular']);
					$intEstado			= intval(strClean($_POST['estado']));
					$intUserSession	= intval(strClean($_SESSION['idUser']));

				
					
					if($intControl == 0){
						$requestProvee	= $this->model->insertProveedorMODAL( $strRazonSocial,$intRuc,$intCelular, $intUserSession);
							
					
					}else{
						$requestProvee	= $this->model->updateProveedor($intIdProveedor, $strRazonSocial,$intRuc,$intCelular,$intEstado,$intUserSession);
					}

					if($requestProvee > 0){

						if($intControl == 0){
							$arrResponse = 	[
											    "status"=> true,
											    "title"	=> "Proveedor",
											    "msg" 	=> "Datos Guardados Correctamente.",
											];
						}else{
							$arrResponse = 	[
											    "status"=> true,
											    "title"	=> "Proveedor",
											    "msg" 	=> "Datos Actualizados Correctamente.",
											];
						}
					}else if($requestProvee == 'exist'){
						$arrResponse = 	[
										    "status"=> false,
										    "title"	=> "Alerta!",
										    "msg" 	=> "Ya se encuentra registrado esta Proveedor.",
										];
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
						$EvaluarStockExtornar	= $this->model->EvaluarStockExtornar($intIdAnular);

						$EvaluarEstadosal	= $this->model->EvaluarEstadoSal($intIdAnular);
						$Estado = $EvaluarEstadosal['Estado'];	
						
						
						
						$valorA = $EvaluarStockExtornar['productoA'];						
						$valorB = $EvaluarStockExtornar['productoB'];
						$valorC = $EvaluarStockExtornar['productoC'];
						# verificaion de campos en A,B y C
						$contador = 0;
						$mensaje = '';
					
						

						if ($valorA > 0) {
							$contador++;
							$mensaje .= $valorA.' producto (s) en A,';

						}

						if ($valorB > 0) {
							$contador++;
							$mensaje .= $valorB.' producto (s) en B,';
						}

						if ($valorC > 0) {
							$contador++;
							$mensaje .= $valorC.' producto (s) en C,';
						}


						if ($contador == 0 && $Estado == 1 ) {

							$requestExtornar			= $this->model->insertExtornar($intIdAnular,$strObservacion, $intUserSession);

							$requestEstComprayDtll		= $this->model->CambiarEstado($intIdAnular, $intUserSession);

							$requestInsertarTarjetaMovExtornar	= $this->model->InsertarTarjetaMovExtornar($intIdAnular);

							$UpdateStockP	= $this->model->UpdateStockExtornar($intIdAnular);

							$UpdateTjmExt	= $this->model->UpdateTjmExt($intIdAnular);
							
						}else{


						$arrResponse = 	[
											    "status"=> true,
											    "title"	=> "Anulado",
											    "msg" 	=> "No seee puede realizar el extornar porque hay ".$mensaje." que no cumplen la cantidad en stock, por favor verificar el stock y los productos a extornar.",
											]; 

					   }


					}else{
						//$requestExtornar	= $this->model->updateProveedor($intIdProveedor, $strRazonSocial,$intRuc,$intCelular,$intEstado,$intUserSession);
					}

					if($contador == 0 && $Estado == 1){

						if($intControl == 0){
							$arrResponse = 	[
											    "status"=> true,
											    "title"	=> "Anulado",
											    "msg" 	=> "Compra Anulada Correctamente.",
											];
						}
					}else {
						$arrResponse = 	[
										    "status"=> false,
										    "title"	=> "Alerta!!",
										    "msg" 	=> "No se puede realizar el extornar porque hay ".$mensaje." que no cumplen la cantidad en stock, por favor verificar el stock y los productos a extornar.",
										];
					}

				}
			}
			echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			die();
		}



		public function delProveedor($idProveedor)
		{
				// id a eliminar 
				$intidProveedor	= intval(strClean($idProveedor));
				$requestDelete 	= $this->model->deleteProveedor($intidProveedor);

				if ($requestDelete > 0) {
					$arrResponse = 	[
										"status"=> true,
										"title"	=> "Proveedor",
										"msg" 	=> "Proveedor Eliminado Correctamente.",
									];

				}else if($requestDelete == 'exist'){
					$arrResponse = 	[
										"status"=> false,
										"title"	=> "Alerta!",
										"msg" 	=> "No se puede eliminar este Proveedor, esta asociado a un Movimiento.",
									];
				}else{
					$arrResponse = 	[
										"status"=> false,
										"title"	=> "Error!",
										"msg" 	=> "Error al eliminar el Proveedor",
									];
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			
				die();
		}




		public function setIngreso()
		{  
			if($_POST){
				if( empty($_POST['cboproceso']) || empty($_POST['cboalmacen']) || empty($_POST['cboproveedor']) || empty($_POST['cbotipodocumento']) || empty($_POST['txtserie']) || empty($_POST['txtfechadoc'])){
					$arrResponse = 	[
								    	"status"=> false,
								    	"title"	=> "Error!",
								    	"msg" 	=> "Llenar Campos de Ingreso - Verificar Datos.",
									]; 
				}else{
					
					$intControl				= intval(strClean($_POST['txtcontrolCompra']));
					$intcboalmacen			= intval(strClean($_POST['cboalmacen']));
					$intcboproceso			= intval(strClean($_POST['cboproceso']));
					//$intcbotipoingreso		= intval(strClean($_POST['cbotipoingreso']));
					$intcboproveedor		= intval(strClean($_POST['cboproveedor']));
					$intcbotipodocumento	= intval(strClean($_POST['cbotipodocumento']));
					$inttxtfechadoc			= strClean($_POST['txtfechadoc']);
					$strtxtserie			= strClean($_POST['txtserie']);
					$intUserSession			= intval(strClean($_SESSION['idUser']));
					$detallesIngreso 		= json_decode($_POST['detalleIng']);
					
					if($intControl == 0){
						$requestCompra	= $this->model->insertCompra($intcboalmacen,$intcboproceso,$intcbotipodocumento,$intcboproveedor,$inttxtfechadoc,$strtxtserie, $intUserSession);

						$miConta = 0;

						foreach ($detallesIngreso as $row) {
							$cantidadA = intval(strClean($row->cantidadA));
							$cantidadB = intval(strClean($row->cantidadB));
							$cantidadC = intval(strClean($row->cantidadC));

							if ($cantidadA == 0 && $cantidadB == 0 && $cantidadC == 0) {
								$miConta++;
							}

						}

						if($miConta > 0){
							$arrResponse = 	[
										    "status"=> false,
										    "title"	=> "Error!",
										    "msg" 	=> "El Produdcto debe tener mas de 0 en una de las categorias",
										];
						  echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
							die();
						}

						foreach ($detallesIngreso as $row) {
							$cantidadA = intval(strClean($row->cantidadA));
							$cantidadB = intval(strClean($row->cantidadB));
							$cantidadC = intval(strClean($row->cantidadC));
							$idProducto = intval(strClean($row->idProducto));

							$cantidadA = ($cantidadA > 0) ? $cantidadA : 0;
							$cantidadB = ($cantidadB > 0) ? $cantidadB : 0;
							$cantidadC = ($cantidadC > 0) ? $cantidadC : 0;

							$Entrada = $cantidadA + $cantidadB + $cantidadC;

							#PRIMERO CONSULTAMOS EL PRODUCTO EN STOCK

							$requestSelectStock = $this->model->selectStockProductos($idProducto,$intcboalmacen);

							$varCantidad = $requestSelectStock['IdStockProd'];
							//var_dump($requestSelectStock);

							if ($varCantidad == 0) {
								$requestInsertStock = $this->model->insertStockProductos($idProducto,$intcboalmacen);

								$requestUpdateStock = $this->model->updateStockProductos($cantidadA ,$cantidadB,$cantidadC, $Entrada, $idProducto,$intcboalmacen);
							} else{
								$requestUpdateStock = $this->model->updateStockProductos($cantidadA ,$cantidadB,$cantidadC, $Entrada, $idProducto,$intcboalmacen);
							}



							$requestTarjetaMov = $this->model->insertTarjetaMovimiento($idProducto, $requestCompra, $intcboalmacen, $cantidadA, $cantidadB, $cantidadC,$Entrada,$intUserSession );

							
							$requestDetalleCompra = $this->model->insertDetalleCompra($requestCompra, $idProducto, $requestTarjetaMov,$Entrada);

						}

						$requestUpdateTarjetaMov = $this->model->updateTarjetaMovimiento($requestCompra);

						


					}else{
						//$requestFamilia	= $this->model->updateProveedor($intIdProveedor, $strRazonSocial,$intRuc,$intCelular, $intUserSession);
					}

					if($requestTarjetaMov > 0){

						if($intControl == 0){
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
					}else if($requestCompra == 'exist'){
						$arrResponse = 	[
										    "status"=> false,
										    "title"	=> "Alerta!",
										    "msg" 	=> "Ya se encuentra registrado esta Proveedor.",
										];
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




		public function setCompraAdqui()
		{  
			if($_POST){
				if( empty($_POST['cboproceso'])){
					$arrResponse = 	[
								    	"status"=> false,
								    	"title"	=> "Error!",
								    	"msg" 	=> "Verificar Datos.",
									]; 
				}else{
					
					$intControl				= intval(strClean($_POST['txtcontrolCompra']));
					$intcboalmacen			= intval(strClean($_POST['cboalmacen']));
					$intcboproceso			= intval(strClean($_POST['cboproceso']));
					//$intcbotipoingreso		= intval(strClean($_POST['cbotipoingreso']));
					$intcboproveedor		= intval(strClean($_POST['cboproveedor']));
					$intcbotipodocumento	= intval(strClean($_POST['cbotipodocumento']));
					$inttxtfechadoc			= strClean($_POST['txtfechadoc']);
					$strtxtserie			= strClean($_POST['txtserie']);
					$strtxtnumeropedido		= strClean($_POST['txtnumeropedido']);
					$strtxtordecompra		= strClean($_POST['txtordecompra']);
					$strtxtpecosa    		= strClean($_POST['txtpecosa']);
					$intUserSession			= intval(strClean($_SESSION['idUser']));
					$detallesIngreso 		= json_decode($_POST['detalleIng']);
					
					if($intControl == 0){
						$requestCompra	= $this->model->insertCompraAdqui($intcboalmacen,$intcboproceso,$intcbotipodocumento,$intcboproveedor,$inttxtfechadoc,$strtxtserie,$strtxtnumeropedido,$strtxtordecompra,$strtxtpecosa , $intUserSession);

						foreach ($detallesIngreso as $row) {
							$cantidadA = intval(strClean($row->cantidadA));	
							$idProducto = intval(strClean($row->idProducto));						

							$cantidadA = ($cantidadA > 0) ? $cantidadA : 0;						

									$requestDetalleCompra = $this->model->insertDetalleCompraAdqui($requestCompra, $idProducto, $cantidadA);

						}						

						


					}else{
						//$requestFamilia	= $this->model->updateProveedor($intIdProveedor, $strRazonSocial,$intRuc,$intCelular, $intUserSession);
					}

					if($requestDetalleCompra > 0){

						if($intControl == 0){
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
					}else if($requestCompra == 'exist'){
						$arrResponse = 	[
										    "status"=> false,
										    "title"	=> "Alerta!",
										    "msg" 	=> "Ya se encuentra registrado esta Proveedor.",
										];
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



		public function setRepliegue()
		{  
			if($_POST){
				if( empty($_POST['cboproceso'])){
					$arrResponse = 	[
								    	"status"=> false,
								    	"title"	=> "Error!",
								    	"msg" 	=> "Verificar Datos.",
									]; 
				}else{
					
					$intControl				= intval(strClean($_POST['txtcontrolCompra']));
					$intcboalmacen			= intval(strClean($_POST['cboalmacen']));
					$intcboproceso			= intval(strClean($_POST['cboproceso']));
					//$intcbotipoingreso		= intval(strClean($_POST['cbotipoingreso']));
					$intcboproveedor		= intval(strClean($_POST['cboproveedor']));
					$intcbotipodocumento	= intval(strClean($_POST['cbotipodocumento']));
					$inttxtfechadoc			= strClean($_POST['txtfechadoc']);
					$strtxtserie			= strClean($_POST['txtserie']);
					$strtxtnumeropedido		= strClean($_POST['txtnumeropedido']);
					$strtxtordecompra		= strClean($_POST['txtordecompra']);
					$strtxtpecosa    		= strClean($_POST['txtpecosa']);
					$intUserSession			= intval(strClean($_SESSION['idUser']));
					$detallesIngreso 		= json_decode($_POST['detalleIng']);
					
					if($intControl == 0){
						$requestCompra	= $this->model->insertrepliegue($intcboalmacen,$intcboproceso,$intcbotipodocumento,$intcboproveedor,$inttxtfechadoc,$strtxtserie,$strtxtnumeropedido,$strtxtordecompra,$strtxtpecosa , $intUserSession);

						foreach ($detallesIngreso as $row) {
							$cantidadA = intval(strClean($row->cantidadA));	
							$idProducto = intval(strClean($row->idProducto));						

							$cantidadA = ($cantidadA > 0) ? $cantidadA : 0;						

									$requestDetalleCompra = $this->model->insertDetalleCompraAdqui($requestCompra, $idProducto, $cantidadA);

						}						

						


					}else{
						//$requestFamilia	= $this->model->updateProveedor($intIdProveedor, $strRazonSocial,$intRuc,$intCelular, $intUserSession);
					}

					if($requestDetalleCompra > 0){

						if($intControl == 0){
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
					}else if($requestCompra == 'exist'){
						$arrResponse = 	[
										    "status"=> false,
										    "title"	=> "Alerta!",
										    "msg" 	=> "Ya se encuentra registrado esta Proveedor.",
										];
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




			



		public function getProveedores()
		{
			
			$output = array();

			$arrData = $this->model->selectProveedores();
			
			for ($i=0; $i <  count($arrData[0]); $i++) { 
				# code...
				$arrData[0][$i]['orden'] 	= 	$i+1;
				$arrData[0][$i]['Estado'] 	= 	$arrData[0][$i]['Estado'] == 1 ? '<span class="label label-success label-pill m-w-60">ACTIVO</span>' : '<span class="label label-danger label-pill m-w-60">INACTIVO</span>';
				$arrData[0][$i]['opciones'] =	'<a class="btn btn-primary btn-xs" title="Editar" onclick="editarProveedor('.$arrData[0][$i]['IdProveedor'].')">
													<i class="zmdi zmdi-edit zmdi-hc-fw"></i>
												</a>
                                				<a class="btn btn-danger btn-xs" title="Eliminar" onclick="eliminarProveedor('.$arrData[0][$i]['IdProveedor'].')">
                                					<i data-toggle="tooltip" title="Eliminar"class="zmdi zmdi-delete zmdi-hc-fw"></i>
                                				</a>';
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


			public function gettablebuscarproducto()
			{
			
			$output = array();

			$arrData = $this->model->selecttablebuscarproductos();
			
			for ($i=0; $i <  count($arrData[0]); $i++) { 
				

				# code...
				$arrData[0][$i]['orden'] 	= 	$i+1;
				$arrData[0][$i]['Estado'] 	= 	$arrData[0][$i]['Estado'] == 1 ? '<span class="label label-success label-pill m-w-60">ACTIVO</span>' : '<span class="label label-danger label-pill m-w-60">INACTIVO</span>';
				$arrData[0][$i]['opciones'] =	'<a class="btn btn-primary btn-xs" title="Agregar Producto" onclick="addProduct('.$arrData[0][$i]['IdProducto'].')">
													<i class="zmdi zmdi-edit zmdi-hc-fw"></i>
												</a>
                                				';
			}

			$output = array(
				"recordsTotal"		=> 	$arrData[2]['row'],
				"recordsFiltered"	=>	$arrData[1]['row'],
				"data"				=>	$arrData[0]
			);
			echo json_encode($output,JSON_UNESCAPED_UNICODE);
			die();
			// dep($arrData[0][0]['estado']);
		}

			public function llenartablaproducto(int $idProductos)				
			{
				$intIdTarjetaProducto = intval(strClean($idProductos));
				$output = array();
				$arrData = $this->model->selectllenarproducto($intIdTarjetaProducto);
							
			 	
			 	//$tipo = $arrData['Estado'] == 1 ? '<span class="label label-success label-pill m-w-60">ACTIVO</span>' : '<span class="label label-danger label-pill m-w-60">INACTIVO</span>';
				

				$campos = '<tr id="fila-'.$arrData['IdProducto'].'">
							  <!-- td class="text-center" width="10%">N</td-->
                              <td class="text-center" width="40%">'.$arrData['producto'].'</td>
                              <td class="text-center" width="10%">'.$arrData['uma'].'</td>
                              <td class="text-center" width="10%">'.$arrData['tipo'].'</td>
                              <td class="text-center" width="10%"><input class="form-control vld" type="number" style="width:60px" step="1" id="cantA'.$arrData['IdProducto'].'" value="0" onchange="verificaCantidad(this.value, '.$arrData['IdProducto'].',1);" required="">
                              <td class="text-center" width="10%"><input class="form-control vld" type="number" style="width:60px" step="1" id="cantB'.$arrData['IdProducto'].'" value="0" onchange="verificaCantidad(this.value, '.$arrData['IdProducto'].',2);" required="">
                              <td class="text-center" width="10%"><input class="form-control vld" type="number" style="width:60px" step="1" id="cantC'.$arrData['IdProducto'].'" value="0" onchange="verificaCantidad(this.value, '.$arrData['IdProducto'].',3);" required="">

                              <input type="hidden" value="'.$arrData['IdProducto'].'" name="idProducto"></td>
                              
                              <td class="text-center" width="10%"><a onclick="eliminarFila(\'fila-'.$arrData['IdProducto'].'\');" class="btn btn-danger btn-xs" title="Eliminar Producto">
													<i class="zmdi zmdi-close zmdi-hc-fw"></i>
												</a></td>
						   </tr>';
			 
			
			#echo json_encode($campos);
			 echo $campos;
			die();
			}

			public function gettablebuscarproductocompras()
			{
			
			$output = array();

			$arrData = $this->model->selecttablebuscarproductos();
			
			for ($i=0; $i <  count($arrData[0]); $i++) { 
				

				# code...
				$arrData[0][$i]['orden'] 	= 	$i+1;
				$arrData[0][$i]['Estado'] 	= 	$arrData[0][$i]['Estado'] == 1 ? '<span class="label label-success label-pill m-w-60">ACTIVO</span>' : '<span class="label label-danger label-pill m-w-60">INACTIVO</span>';
				$arrData[0][$i]['opciones'] =	'<a class="btn btn-primary btn-xs" title="Agregar Producto" onclick="addProductCompra('.$arrData[0][$i]['IdProducto'].')">
													<i class="zmdi zmdi-edit zmdi-hc-fw"></i>
												</a>
                                				';
			}

			$output = array(
				"recordsTotal"		=> 	$arrData[2]['row'],
				"recordsFiltered"	=>	$arrData[1]['row'],
				"data"				=>	$arrData[0]
			);
			echo json_encode($output,JSON_UNESCAPED_UNICODE);
			die();
			// dep($arrData[0][0]['estado']);
		}

			public function llenartablaproductocompra(int $idProductos)				
			{
				$intIdTarjetaProducto = intval(strClean($idProductos));
				$output = array();
				$arrData = $this->model->selectllenarproducto($intIdTarjetaProducto);
				
			
			 	
			 	//$tipo = $arrData['Estado'] == 1 ? '<span class="label label-success label-pill m-w-60">ACTIVO</span>' : '<span class="label label-danger label-pill m-w-60">INACTIVO</span>';
				

				$campos = '<tr id="fila-'.$arrData['IdProducto'].'">
							  <!-- td class="text-center" width="10%">N</td-->
                              <td class="text-center" width="40%">'.$arrData['producto'].'</td>
                              <td class="text-center" width="10%">'.$arrData['uma'].'</td>
                              <td class="text-center" width="10%">'.$arrData['tipo'].'</td>
                              <td class="text-center" width="10%"><input class="form-control vld" type="number" style="width:60px" step="1" id="cantA'.$arrData['IdProducto'].'" value="0" required="">
                             

                              <input type="hidden" value="'.$arrData['IdProducto'].'" name="idProducto"></td>
                              
                              <td class="text-center" width="10%"><a onclick="eliminarFila(\'fila-'.$arrData['IdProducto'].'\');" class="btn btn-danger btn-xs" title="Eliminar Producto">
													<i class="zmdi zmdi-close zmdi-hc-fw"></i>
												</a></td>
						   </tr>';
			 
			
			#echo json_encode($campos);
			 echo $campos;
			die();
			}


			public function gettablebuscarproductorepliegue()
			{
			
			$output = array();

			$arrData = $this->model->selecttablebuscarproductos();
			
			for ($i=0; $i <  count($arrData[0]); $i++) { 
				

				# code...
				$arrData[0][$i]['orden'] 	= 	$i+1;
				$arrData[0][$i]['Estado'] 	= 	$arrData[0][$i]['Estado'] == 1 ? '<span class="label label-success label-pill m-w-60">ACTIVO</span>' : '<span class="label label-danger label-pill m-w-60">INACTIVO</span>';
				$arrData[0][$i]['opciones'] =	'<a class="btn btn-primary btn-xs" title="Agregar Producto" onclick="addProductRepliegue('.$arrData[0][$i]['IdProducto'].')">
													<i class="zmdi zmdi-edit zmdi-hc-fw"></i>
												</a>
                                				';
			}

			$output = array(
				"recordsTotal"		=> 	$arrData[2]['row'],
				"recordsFiltered"	=>	$arrData[1]['row'],
				"data"				=>	$arrData[0]
			);
			echo json_encode($output,JSON_UNESCAPED_UNICODE);
			die();
			// dep($arrData[0][0]['estado']);
		}

		public function llenartablaproductorepliegue(int $idProductos)				
			{
				$intIdTarjetaProducto = intval(strClean($idProductos));
				$output = array();
				$arrData = $this->model->selectllenarproducto($intIdTarjetaProducto);
				
			
			 	
			 	//$tipo = $arrData['Estado'] == 1 ? '<span class="label label-success label-pill m-w-60">ACTIVO</span>' : '<span class="label label-danger label-pill m-w-60">INACTIVO</span>';
				

				$campos = '<tr id="fila-'.$arrData['IdProducto'].'">
							  <!-- td class="text-center" width="10%">N</td-->
                              <td class="text-center" width="40%">'.$arrData['producto'].'</td>
                              <td class="text-center" width="10%">'.$arrData['uma'].'</td>
                              <td class="text-center" width="10%">'.$arrData['tipo'].'</td>
                              <td class="text-center" width="10%"><input class="form-control vld" type="number" style="width:60px" step="1" id="cantA'.$arrData['IdProducto'].'" value="0" required="">
                             

                              <input type="hidden" value="'.$arrData['IdProducto'].'" name="idProducto"></td>
                              
                              <td class="text-center" width="10%"><a onclick="eliminarFila(\'fila-'.$arrData['IdProducto'].'\');" class="btn btn-danger btn-xs" title="Eliminar Producto">
													<i class="zmdi zmdi-close zmdi-hc-fw"></i>
												</a></td>
						   </tr>';
			 
			
			#echo json_encode($campos);
			 echo $campos;
			die();
			}





		public function gettabletotalingresos()
			{
		
			$output = array();

			$almacen 		= intval(strClean($_POST['almacen']));
			$datefechadesde = strClean($_POST['fechadesde']);
			$datefechahasta = strClean($_POST['fechahasta']);

			$arrData = $this->model->selecttabletotalingresos($datefechadesde,$datefechahasta,$almacen);
			
			for ($i=0; $i <  count($arrData); $i++) { 
				# code...
				$arrData[$i]['orden'] 	= 	$i+1;
				$arrData[$i]['Estado'] 	= 	$arrData[$i]['Estado'] == 1 ? '<span class="label label-success label-pill m-w-60">ACTIVO</span>' : '<span class="label label-danger label-pill m-w-60">ANULADO</span>';
				$arrData[$i]['opciones'] =	'<a class="btn btn-primary btn-xs" title="Visualizar Detalle" onclick="VisualizarTablaDetalleIngresos('.$arrData[$i]['IdCompra'].')">
													<i class="zmdi zmdi-eye zmdi-hc-fw"></i>
												</a>
												<a class="btn btn-success btn-xs" title="Imprimir" onclick="pdfcompra('.$arrData[$i]['IdCompra'].')" target="_blank">
                                					<i data-toggle="tooltip" title="Imprimir"class="zmdi zmdi-print zmdi-hc-fw"></i>
                                				</a>
                                				<a class="btn btn-warning	 btn-xs" title="Descargar" onclick="pdfcompra('.$arrData[$i]['IdCompra'].')">
                                					<i data-toggle="tooltip" title="Descargar"class="zmdi zmdi-download zmdi-hc-fw"></i>
                                				</a>
                                				<a class="btn btn-danger btn-xs" title="Eliminar" onclick="Visualizarmodalanular('.$arrData[$i]['IdCompra'].')">
                                					<i data-toggle="tooltip" title="Eliminar"class="zmdi zmdi-delete zmdi-hc-fw"></i>
                                				</a>
												
                                				';
			}

			$output = array(
				//"draw"				=>	intval($_POST["draw"]),
				//"recordsTotal"		=> 	$arrData[2]['row'],
				//"recordsFiltered"	=>	$arrData[1]['row'],
				"data"				=>	$arrData
			);
			echo json_encode($output,JSON_UNESCAPED_UNICODE);
			die();
			// dep($arrData[0][0]['estado']);
		}

		public function gettabletotalingresos2()
			{
		
			$output = array();

			$arrData = $this->model->selecttabletotalingresos2();
			
			for ($i=0; $i <  count($arrData); $i++) { 
				# code...
				$arrData[$i]['orden'] 	= 	$i+1;
				$arrData[$i]['Estado'] 	= 	$arrData[$i]['Estado'] == 1 ? '<span class="label label-success label-pill m-w-60">ACTIVO</span>' : '<span class="label label-danger label-pill m-w-60">ANULADO</span>';
				$arrData[$i]['opciones'] =	'<a class="btn btn-primary btn-xs" title="Visualizar Detalle" onclick="VisualizarTablaDetalleIngresos('.$arrData[$i]['IdCompra'].')">
													<i class="zmdi zmdi-eye zmdi-hc-fw"></i>
												</a>
												<a class="btn btn-success btn-xs" title="Imprimir" onclick="pdfcompra('.$arrData[$i]['IdCompra'].')" target="_blank">
                                					<i data-toggle="tooltip" title="Imprimir"class="zmdi zmdi-print zmdi-hc-fw"></i>
                                				</a>
                                				<a class="btn btn-warning	 btn-xs" title="Descargar" onclick="pdfcompra('.$arrData[$i]['IdCompra'].')">
                                					<i data-toggle="tooltip" title="Descargar"class="zmdi zmdi-download zmdi-hc-fw"></i>
                                				</a>
                                				<a class="btn btn-danger btn-xs" title="Eliminar" onclick="Visualizarmodalanular('.$arrData[$i]['IdCompra'].')">
                                					<i data-toggle="tooltip" title="Eliminar"class="zmdi zmdi-delete zmdi-hc-fw"></i>
                                				</a>
												
                                				';
			}

			$output = array(
				//"draw"				=>	intval($_POST["draw"]),
				//"recordsTotal"		=> 	$arrData[2]['row'],
				//"recordsFiltered"	=>	$arrData[1]['row'],
				"data"				=>	$arrData
			);
			echo json_encode($output,JSON_UNESCAPED_UNICODE);
			die();
			// dep($arrData[0][0]['estado']);
		}

		public function gettabledetalleingresos($idCompra)

			{

				$intIdCompra = intval(strClean($idCompra));
			
			$output = array();

			$arrData = $this->model->selecttabledetalleingresos($intIdCompra);
			
			for ($i=0; $i <  count($arrData[0]); $i++) { 
				# code...
				$arrData[0][$i]['orden'] 	= 	$i+1;
				$arrData[0][$i]['Estado'] 	= 	$arrData[0][$i]['Estado'] == 1 ? '<span class="label label-success label-pill m-w-60">INGRESADO</span>' : '<span class="label label-danger label-pill m-w-60">ANULADO</span>';
				$arrData[0][$i]['opciones'] =	'<a class="btn btn-primary btn-xs" title="Visualizar Detalle" onclick="botondetabladetalle('.$arrData[0][$i]['IdCompra'].')">
													<i class="zmdi zmdi-edit zmdi-hc-fw"></i>
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





			public function getProveedor($idproveedor)
		{

			$intIdProveedor = intval(strClean($idproveedor));

			if ($intIdProveedor > 0) {
				
				$arrData = $this->model->selectProveedor($intIdProveedor);

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

		


		public function setProducto()
		{
			 //dep($_POST); exit;
			if($_POST){
				if(empty($_POST['Descripcion'])){
					$arrResponse = 	[
								    	"status"=> false,
								    	"title"	=> "Error!",
								    	"msg" 	=> "Verificar Datos.",
									]; 
				}else{
					$intIdProducto	= intval(strClean($_POST['IdProducto']));
					$intControl		= intval(strClean($_POST['ControlProducto']));
					$intDescripcion	= strClean($_POST['Descripcion']);
					$intCodigo		= strClean($_POST['Codigo']);
					$intIdClase		= intval($_POST['IdClase']);
					$intIdUma    	= intval($_POST['IdUma']);
					$intUserSession	= intval(strClean($_SESSION['idUser']));

					
					if($intControl == 0){
						$requestPersonal	= $this->model->insertProducto($intDescripcion, $intCodigo, $intIdClase, $intIdUma,$intUserSession);
					}else{
						if($intControl == 1){
							$requestPersonal	= $this->model->updateProducto($intIdProducto,$intNumero, $intProyecto, $intLote, $intMedida, $strCaracteristicas,$intPrecioCompra,$intPrecioVenta,$intPrecioInicial,$intUserSession);
						}else{
							$requestPersonal	= $this->model->updateProducto($intIdProducto,$intNumero, $intProyecto, $intLote, $intMedida, $strCaracteristicas,$intPrecioCompra,$intPrecioVenta,$intPrecioInicial,$intUserSession);
						}
					}


					if($requestPersonal > 0){

						if($intControl == 0){
							$arrResponse = 	[
											    "status"=> true,
											    "title"	=> "Registro",
											    "msg" 	=> "Datos Guardados Correctamente.",
											];
						}else{
							$arrResponse = 	[
											    "status"=> true,
											    "title"	=> "Personal",
											    "msg" 	=> "Datos Actualizados Correctamente.",
											];
						}
					}else if($requestPersonal == 'exist'){
						$arrResponse = 	[
										    "status"=> false,
										    "title"	=> "Alerta!",
										    "msg" 	=> "El DNI ya se encuentrasssss registrado.",
										];
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


		public function getProducto()
		{
			
			$output = array();

			$arrData = $this->model->selectProductos(); 
		
			for ($i=0; $i <  count($arrData[0]); $i++) { 
				# code...
				$arrData[0][$i]['orden'] 	= 	$i+1;
				$arrData[0][$i]['opciones'] =	'<a class="btn btn-primary btn-xs" title="Editar" onclick="editarProducto('.$arrData[0][$i]['IdProducto'].')">
													<i class="zmdi zmdi-edit zmdi-hc-fw"></i>
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

		public function getProductos($idProducto)
		{

			$intIdProducto = intval(strClean($idProducto));

			if ($intIdProducto > 0) {
				
				$arrData = $this->model->selectProductoss($intIdProducto);

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

		public function getSelectTipoDocumento()
		{
			$htmlOptions = '<option value="">[ Seleccione Documento ]</option>';
			$arrData = $this->model->selectcboTipoDocumento();
			if(count($arrData) > 0){
				for ($i=0; $i < count($arrData) ; $i++) { 
					$htmlOptions .='<option value="'.$arrData[$i]['IdTipoDocumento'].'"> '.$arrData[$i]['Descripcion'].'</option>';
				}
			}
			echo $htmlOptions;
			die();
		}


			public function getSelectTipoAlmacen()
		{
			$htmlOptions = '<option value="">[ Seleccione el Almacen ]</option>';
			$arrData = $this->model->selectcboalmacen();
			if(count($arrData) > 0){
				for ($i=0; $i < count($arrData) ; $i++) { 
					$htmlOptions .='<option value="'.$arrData[$i]['IdSucursal'].'"> '.$arrData[$i]['Descripcion'].'</option>';
				}
			}
			echo $htmlOptions;
			die();
		}

		public function getSelectProveedor()
		{
			$htmlOptions = '<option value="">[ Seleccione Proveedor ]</option>';
			$arrData = $this->model->selectcboProveedor();
			if(count($arrData) > 0){
				for ($i=0; $i < count($arrData) ; $i++) { 
					$htmlOptions .='<option value="'.$arrData[$i]['IdProveedor'].'"> '.$arrData[$i]['RazonSocial'].'</option>';
				}
			}
			echo $htmlOptions;
			die();
		}

			public function getSelectProceso()
		{
			$htmlOptions = '<option value="">[ Seleccione Proceso ]</option>';
			$arrData = $this->model->selectcboProceso();
			if(count($arrData) > 0){
				for ($i=0; $i < count($arrData) ; $i++) { 
					$htmlOptions .='<option value="'.$arrData[$i]['IdProceso'].'"> '.$arrData[$i]['Descripcion'].'</option>';
				}
			}
			echo $htmlOptions;
			die();
		}

			public function getSelectTipoIngreso()
		{
			$htmlOptions = '<option value="">[ Seleccione Tipo De Ingreso ]</option>';
			$arrData = $this->model->selectcboTipoIngreso();
			if(count($arrData) > 0){
				for ($i=0; $i < count($arrData) ; $i++) { 
					$htmlOptions .='<option value="'.$arrData[$i]['IdTipoIngreso'].'"> '.$arrData[$i]['Descripcion'].'</option>';
				}
			}
			echo $htmlOptions;
			die();
		}













		


	

	}

?>