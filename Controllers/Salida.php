<?php 

	/**
	* 
	*/
	class Salida extends Controllers
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


		public function salida()
		{

			$data['page_tag']='salida';
			$data['page_title']='GESTION DE SALIDAS';
			$data['page_name']='Salida';
			$data['page_function_js']='function_salida.js';
			$this->views->getView($this,'salida',$data);
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
						$EvaluarEstado	= $this->model->EvaluarEstado($intIdAnular);
						$Estado = $EvaluarEstado['Estado'];	
						
						
						if ($Estado == 1) {

							$requestExtornar	= $this->model->insertExtornarSal($intIdAnular,$strObservacion, $intUserSession);

							$requestEstComprayDtll		= $this->model->CambiarEstadoSal($intIdAnular, $intUserSession);

							$requestInsertarTarjetaMovExtornar	= $this->model->InsertarTarjetaMovExtornarSal($intIdAnular);

							$UpdateStockP	= $this->model->UpdateStockExtornarSal($intIdAnular);

							$UpdateTjmExt	= $this->model->UpdateTjmExtSal($intIdAnular);
							
						}else{


						$arrResponse = 	[
											    "status"=> true,
											    "title"	=> "Anulado",
											    "msg" 	=> "Esta Salida ya se encuentra anulado",
											]; 

					   }


					}else{
						//$requestExtornar	= $this->model->updateProveedor($intIdProveedor, $strRazonSocial,$intRuc,$intCelular,$intEstado,$intUserSession);
					}

					if($Estado == 1){

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
										    "msg" 	=> "Esta Salida ya se encuentra anulado",
										];
					}

				}
			}
			echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			die();
		}




	public function buscarproducto()
		{

				$strTexto = strClean($_POST['texto']); 
				$arrData = $this->model->buscarproductotext($strTexto);

				

			
			echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
			die();
			//echo $datos;
			//var_dump($nombres);
			//echo json_encode($datos);
			 

		}


		public function generarPdfSalida($id){


						
				$IdSalida = intval(strClean($id));
				//$output = array();
				//$arrData = $this->model->selectllenarproducto($IdCompra);

			$requestPdfCompra	= $this->model->consultareportecabecera($IdSalida);

			$requestPdfCompras	= $this->model->consultareportedetalle($IdSalida);

				
			require('libraries/fpdf/fpdf.php');

			$pdf = new FPDF('P','mm','A4');
			$pdf->AddPage();
			$pdf->setTitle('Guia de Salida');
			$pdf->SetFont('Arial','B',12);
			$pdf->Cell(190,10,$requestPdfCompra['Descripcion'],0,1,'C');
			
			$pdf->SetFont('Arial','B',14);
			$pdf->Cell(190,10,utf8_decode('GUÍA DE DESPACHO'),0,1,'C');
			
			$pdf->Image('Assets/images/onpelogo.jpg',4,4,50,50);
		
			$pdf->Ln();

			$pdf->SetFont('Arial','B',10);
			$pdf->Cell(30,6,'Centro Consumo:',0,0,'L');
			$pdf->SetFont('Arial','',9);
			$pdf->Cell(40,6,$requestPdfCompra['centroconsumo'],0,0,'L');

			$pdf->SetFont('Arial','B',10);
			$pdf->Cell(80,6,'Fecha Doc:',0,0,'R');
			$pdf->SetFont('Arial','',9);
			$pdf->Cell(40,6,$requestPdfCompra['FechaCrea'],0,0,'C');

			$pdf->Ln();

			$pdf->SetFont('Arial','B',10);
			$pdf->Cell(30,6,'Nro Doc.:  001-',0,0,'L');
			$pdf->SetFont('Arial','',9);
			$pdf->Cell(40,6,$requestPdfCompra['IdSalida'],0,0,'L');

			$pdf->SetFont('Arial','B',10);
			$pdf->Cell(80,6,'Registrado Por:',0,0,'R');
			$pdf->SetFont('Arial','',9);
			$pdf->Cell(40,6,$requestPdfCompra['nombre'],0,0,'C');

			$pdf->Ln();

			$pdf->SetFont('Arial','B',10);
			$pdf->Cell(30,6,'.',0,0,'L');
			$pdf->SetFont('Arial','',9);
			$pdf->Cell(40,6,'',0,0,'L');

			$pdf->SetFont('Arial','B',10);
			$pdf->Cell(80,6,utf8_decode('Fecha de impresión:'),0,0,'R');
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



	public function gettabletotalsalidas()
			{
			
			$output = array();

			$arrData = $this->model->selecttabletotalsalidas();
			
			for ($i=0; $i <  count($arrData[0]); $i++) { 
				# code...
				$arrData[0][$i]['orden'] 	= 	$i+1;
				$arrData[0][$i]['Estado'] 	= 	$arrData[0][$i]['Estado'] == 1 ? '<span class="label label-success label-pill m-w-60">ACTIVO</span>' : '<span class="label label-danger label-pill m-w-60">ANULADO</span>';
				$arrData[0][$i]['opciones'] =	'<a class="btn btn-primary btn-xs" title="Visualizar Detalle" onclick="VisualizarTablaDetalleIngresos('.$arrData[0][$i]['IdSalida'].')">
													<i class="zmdi zmdi-eye zmdi-hc-fw"></i>
												</a>
												<a class="btn btn-success btn-xs" title="Imprimir" onclick="pdfsalida('.$arrData[0][$i]['IdSalida'].')">
                                					<i data-toggle="tooltip" title="Imprimir"class="zmdi zmdi-print zmdi-hc-fw"></i>
                                				</a>
                                				<a class="btn btn-warning	 btn-xs" title="Descargar" onclick="pdfsalida('.$arrData[0][$i]['IdSalida'].')">
                                					<i data-toggle="tooltip" title="Descargar"class="zmdi zmdi-download zmdi-hc-fw"></i>
                                				</a>
                                				<a class="btn btn-danger btn-xs" title="Eliminar" onclick="Visualizarmodalanular('.$arrData[0][$i]['IdSalida'].')">
                                					<i data-toggle="tooltip" title="Eliminar"class="zmdi zmdi-delete zmdi-hc-fw"></i>
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


		public function gettabledetallesalidas($idSalida)

			{

				$intIdSalida = intval(strClean($idSalida));

			
			$output = array();

			$arrData = $this->model->selecttabledetallesalidas($intIdSalida);
			
			for ($i=0; $i <  count($arrData[0]); $i++) { 
				# code...
				$arrData[0][$i]['orden'] 	= 	$i+1;
				$arrData[0][$i]['Estado'] 	= 	$arrData[0][$i]['Estado'] == 1 ? '<span class="label label-success label-pill m-w-60">ATENDIDO</span>' : '<span class="label label-danger label-pill m-w-60">INACTIVO</span>';
				$arrData[0][$i]['opciones'] =	'<a class="btn btn-primary btn-xs" title="Visualizar Detalle" onclick="botondetabladetalle('.$arrData[0][$i]['IdSalida'].')">
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




		public function getSelectCentroConsumo()
		{
			$htmlOptions = '<option value="">[ Seleccione Documento ]</option>';
			$arrData = $this->model->selectcboCentroConsumo();
			if(count($arrData) > 0){
				for ($i=0; $i < count($arrData) ; $i++) { 
					$htmlOptions .='<option value="'.$arrData[$i]['IdCentroConsumo'].'"> '.$arrData[$i]['Descripcion'].'</option>';
				}
			}
			echo $htmlOptions;
			die();
		}


		public function getSelectRecibidoPor()
		{
			$intIdConsumo				= intval(strClean($_POST['IdConsumo']));

			$htmlOptions = '<option value="">[ Seleccione Documento ]</option>';
			$arrData = $this->model->selectRecibidoPor($intIdConsumo);
			if(count($arrData) > 0){
				for ($i=0; $i < count($arrData) ; $i++) { 
					$htmlOptions .='<option value="'.$arrData[$i]['IdPersonal'].'"> '.$arrData[$i]['Nombres'].'</option>';
				}
			}
			echo $htmlOptions;
			die();
		}


		public function cboEntregadopor()
		{
			$htmlOptions = '<option value="">[ Seleccione Personal ]</option>';
			$arrData = $this->model->selectcboEntregadoPorSalida();
			if(count($arrData) > 0){
				for ($i=0; $i < count($arrData) ; $i++) { 
					$htmlOptions .='<option value="'.$arrData[$i]['IdPersonal'].'"> '.$arrData[$i]['Nombres'].'</option>';
				}
			}
			echo $htmlOptions;
			die();
		}


				public function cboRecibidoPor()
		{
			$htmlOptions = '<option value="">[ Seleccione Personal ]</option>';
			$arrData = $this->model->selectcboRecibidoPorSalida();
			if(count($arrData) > 0){
				for ($i=0; $i < count($arrData) ; $i++) { 
					$htmlOptions .='<option value="'.$arrData[$i]['IdPersonal'].'"> '.$arrData[$i]['Nombres'].'</option>';
				}
			}
			echo $htmlOptions;
			die();
		}

//evaluar
			public function selectcboturno()
		{
			$htmlOptions = '<option value="">[ Seleccione Personal ]</option>';
			$arrData = $this->model->selecttcboturno();
			if(count($arrData) > 0){
				for ($i=0; $i < count($arrData) ; $i++) { 
					$htmlOptions .='<option value="'.$arrData[$i]['IdPersonal'].'"> '.$arrData[$i]['Nombres'].'</option>';
				}
			}
			echo $htmlOptions;
			die();
		}
			public function setSalida()
		{  
			if($_POST){
				if( empty($_POST['cboproceso']) || empty($_POST['cbocconsumo']) || empty($_POST['cborecibidopor']) || empty($_POST['entregadopor']) || empty($_POST['txtfechadoc'])){
					$arrResponse = 	[
								    	"status"=> false,
								    	"title"	=> "Error!",
								    	"msg" 	=> "Llenar Campos de Salida - Verificar Datos.",
									]; 
				}else{
					
					$intControl				= intval(strClean($_POST['txtcontrolVenta']));
					$intcboproceso			= intval(strClean($_POST['cboproceso']));
					$intcbocconsumo			= intval(strClean($_POST['cbocconsumo']));
					$intcborecibidopor		= intval(strClean($_POST['cborecibidopor']));
					$intentregadopor		= intval(strClean($_POST['entregadopor']));
					$strtxtfechadoc			= strClean($_POST['txtfechadoc']);
					$strtxtobservaciones	= strClean($_POST['txtobservaciones']);
					$strtxtSerie			= strClean($_POST['serie']);
					$intUserSession			= intval(strClean($_SESSION['idUser']));
					$detallesIngreso 		= json_decode($_POST['detalleIng']);
					
					if($intControl == 0){
						$requestSalida	= $this->model->insertSalida($intcboproceso,$intcbocconsumo	,$intcborecibidopor,$intentregadopor,$strtxtfechadoc,$strtxtobservaciones,$strtxtSerie, $intUserSession);
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
										    "msg" 	=> "El producto debe ser mayor o igual a 0",
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

							$Salida = $cantidadA + $cantidadB + $cantidadC;

							#PRIMERO CONSULTAMOS EL PRODUCTO EN STOCK

							$requestSelectStock = $this->model->selectStockProductos($idProducto);

							$varCantidad = $requestSelectStock['IdStockProd'];
							#var_dump($requestSelectStock);

							if ($varCantidad == 0) {
								$requestInsertStock = $this->model->insertStockProductos($idProducto);

								$requestUpdateStock = $this->model->updateStockProductos($cantidadA ,$cantidadB,$cantidadC, $Salida, $idProducto);
							} else{
								$requestUpdateStock = $this->model->updateStockProductos($cantidadA ,$cantidadB,$cantidadC, $Salida, $idProducto);
							}



							$requestTarjetaMov = $this->model->insertTarjetaMovimiento($idProducto, $requestSalida, $cantidadA, $cantidadB, $cantidadC,$Salida,$intUserSession);

							
									$requestDetalleCompra = $this->model->insertDetalleSalida($requestSalida, $idProducto, $requestTarjetaMov,$Salida);

						}

						$requestUpdateTarjetaMov = $this->model->updateTarjetaMovimiento($requestSalida);

						


					}else{
						//$requestFamilia	= $this->model->updateProveedor($intIdProveedor, $strRazonSocial,$intRuc,$intCelular, $intUserSession);
					}

					if($requestTarjetaMov > 0){

						if($intControl == 0){
							$arrResponse = 	[
											    "status"=> true,
											    "title"	=> "Salida",
											    "msg" 	=> "Datos Guardados Correctamente.",
											];
						}else{
							$arrResponse = 	[
											    "status"=> true,
											    "title"	=> "Salida",
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


	

			



		

		public function gettablebuscarproducto()
			{
			
			$output = array();

			$arrData = $this->model->selecttablebuscarproductossalida();
			
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


				$stock = $arrData['Existencia'];
				//var_dump($stock);
				//exit;
				
				if (empty($stock)) {

					
					echo'<script type="text/javascript">
					// mensajeSwal("Producto sin Stock", "warning");
						 alert("Producto sin Stock");						
						</script>';
					
				} else{

				$campos = '<tr id="fila-'.$arrData['IdProducto'].'">
							  <!-- td class="text-center" width="10%">N</td-->
                              <td class="text-center" width="20%">'.$arrData['producto'].'</td>
                              <td class="text-center" width="10%">'.$arrData['uma'].'</td>
                              
                              <td class="text-primary"  width="10%">'.$arrData['at'].'</td>
                              <td class="text-center" width="10%"><input class="form-control vld" type="number" max="'.$arrData['at'].'" style="width:60px" step="1" id="cantA'.$arrData['IdProducto'].'" value="0" onchange="verificaCantidad('.$arrData['at'].', this.value, '.$arrData['IdProducto'].', 1);" required="">

                              <td class="text-primary" width="10%">'.$arrData['bt'].'</td>
                              <td class="text-center" width="10%"><input class="form-control vld" type="number" max="'.$arrData['bt'].'" style="width:60px" step="1" id="cantB'.$arrData['IdProducto'].'" value="0" onchange="verificaCantidad('.$arrData['bt'].', this.value, '.$arrData['IdProducto'].', 2);" required="">
                              
                              <td class="text-primary" width="10%">'.$arrData['ct'].'</td>
                              <td class="text-center" width="10%"><input class="form-control vld" type="number" max="'.$arrData['ct'].'" style="width:60px" step="1" id="cantC'.$arrData['IdProducto'].'" value="0" onchange="verificaCantidad('.$arrData['ct'].', this.value, '.$arrData['IdProducto'].', 3);" required="">

                              <input type="hidden" value="'.$arrData['IdProducto'].'" name="idProducto"></td>
                              
                              <td class="text-center" width="10%"><a onclick="eliminarFila(\'fila-'.$arrData['IdProducto'].'\');" class="btn btn-danger btn-xs" title="Eliminar Producto">
													<i class="zmdi zmdi-close zmdi-hc-fw"></i>
												</a></td>
						   </tr>';

						   	 echo $campos;
							 die();

						}
			 
			
			#echo json_encode($campos);
		
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
					$htmlOptions .='<option value="'.$arrData[$i]['IdProceso'].'"> '.$arrData[$i]['Descripcion'].'</option>';
				}
			}
			echo $htmlOptions;
			die();
		}













		


	

	}

?>