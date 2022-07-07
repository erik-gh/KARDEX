<?php 

	/**
	* 
	*/
	class Ccalidad extends Controllers
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


		public function ccalidad()
		{

			$data['page_tag']='ccalidad';
			$data['page_title']='CONTROL DE CALIDAD';
			$data['page_name']='Ccalidad';
			$data['page_function_js']='function_ccalidad.js';
			$this->views->getView($this,'ccalidad',$data);
		}

		


		public function gettabletotalingresos()
			{
			
			$output = array();

			$arrData = $this->model->selecttabletotalingresosccalidad();
			
			for ($i=0; $i <  count($arrData[0]); $i++) { 


				# code...
				$arrData[0][$i]['orden'] 	= 	$i+1;
				

				$arrData[0][$i]['Estado'] 	= 	$arrData[0][$i]['Estado'] == 1 ? '<span class="label label-danger label-pill m-w-60">PENDIENTE</span>' : '<span class="label label-success label-pill m-w-60">CONCLUIDO</span>';


				$arrData[0][$i]['opciones'] =	'<a class="btn btn-primary btn-xs" title="Visualizar Detalle" id="btnvisualizardetalle" onclick="VisualizarTablaControlCalidad('.$arrData[0][$i]['IdComprarepliegue'].'),MostrarDetalle('.$arrData[0][$i]['IdComprarepliegue'].')">
													<i class="zmdi zmdi-eye zmdi-hc-fw"></i>
												</a>
												<a class="btn btn-success btn-xs" title="Control Calidad" onclick="VisualizarTablaAprobarccalidad('.$arrData[0][$i]['IdComprarepliegue'].')">
                                					<i data-toggle="tooltip" title="Control Calidad"class="zmdi zmdi-hourglass-alt zmdi-hc-fw"></i>
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


		public function gettableaprobarccalidad($IdComprarepliegue)
			{
				$intIdComprarepliegue = intval(strClean($IdComprarepliegue));
			
			$output = array();

			$arrData = $this->model->selecttableaprobarccalidad($intIdComprarepliegue);
			
			for ($i=0; $i <  count($arrData[0]); $i++) { 


				# code...
				$arrData[0][$i]['orden'] 	= 	$i+1;
				

				$arrData[0][$i]['Estado'] 	= 	$arrData[0][$i]['Estado'] == 1 ? '<span class="label label-danger label-pill m-w-60">PENDIENTES</span>' : '<span class="label label-success label-pill m-w-60">CONCLUIDO</span>';
				$arrData[0][$i]['opciones'] =	'<a class="btn btn-primary btn-xs" title="Visualizar Detalle" onclick="BloquearBotton('.$arrData[0][$i]['IdCcalidad'].'),VisualizarTablaDetalleCalidad('.$arrData[0][$i]['IdCcalidad'].','.$arrData[0][$i]['IdComprarepliegue'].')">
													<i class="zmdi zmdi-eye zmdi-hc-fw"></i>
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



		public function gettablecontrolcalidad($IdComprarepliegue)
			{

			$intIdComprarepliegue = intval(strClean($IdComprarepliegue));
			
			$output = array();

			$arrData = $this->model->selecttablecontrolcalidad($intIdComprarepliegue);

			
			//$varIdTipoIngreso = $arrData['IdTipoIngreso'];
						
			
			for ($i=0; $i <  count($arrData[0]); $i++) { 

				if ($arrData[0][$i]['Cantidad'] == $arrData[0][$i]['TcA'] or $arrData[0][$i]['Cantidad'] == $arrData[0][$i]['TcB']) {
					$variable1 = 'disabled';
					$variable2 = 'disabled';
					$variable3 = 'disabled';

					
				} else{
					//$disable = '';
					$variable1 = '';
					$variable2 = '';
					$variable3 = '';

				}

					if ($arrData[0][$i]['IdTipoIngreso'] == 2) {
					$variable2 = 'disabled';

					
				} else{
					$variable1 ='disabled';
				}


				# code...
				$arrData[0][$i]['orden'] 	= 	$i+1;
				$arrData[0][$i]['a'] = '<td class="text-center" width="10%"><input class="form-control " type="number" style="width:60px" step="1" onchange="verificaCantidad('.$arrData[0][$i]['Cantidad2'].', this.value,'.$arrData[0][$i]['IdProducto'].',1);" '.$variable1.'  id="cantA'.$arrData[0][$i]['IdProducto'].'" value="0" min="0" required="">';

				$arrData[0][$i]['b'] = '<td class="text-center" width="10%"><input class="form-control " type="number" style="width:60px" step="1" onchange="verificaCantidad('.$arrData[0][$i]['Cantidad2'].', this.value,'.$arrData[0][$i]['IdProducto'].',1);" '.$variable2.' id="cantB'.$arrData[0][$i]['IdProducto'].'" value="0" min="0" required="">';

				$arrData[0][$i]['c'] = '<td class="text-center" width="10%"><input class="form-control" type="number" min="0" style="width:60px" step="1" onchange="verificaCantidad('.$arrData[0][$i]['Cantidad2'].', this.value,'.$arrData[0][$i]['IdProducto'].',1);" '.$variable3.' id="cantC'.$arrData[0][$i]['IdProducto'].'" value="0" required=""><input type="hidden" '.$variable3.' value="'.$arrData[0][$i]['IdProducto'].'" name="idProducto">		
				<input type="hidden" value="'.$arrData[0][$i]['TcA'].'" class="vldA">	
					
				<input type="hidden" value="'.$arrData[0][$i]['Cantidad'].'" class="vldTotal"></td>';


				
				
				
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


		public function gettabledetallecontrolcalidad($IdCcalidad)
			{

			$intIdCcalidad = intval(strClean($IdCcalidad));
			
			$output = array();

			$arrData = $this->model->selecttabledetallecontrolcalidad($intIdCcalidad);
			
			for ($i=0; $i <  count($arrData[0]); $i++) { 


				# code...
				$arrData[0][$i]['orden'] 	= 	$i+1;

			
				$arrData[0][$i]['IdProducto'].'" name="idProducto"></td>';
				$arrData[0][$i]['IdComprarepliegue'].'" name="idComprarepliegue"></td>';
							
								
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


		public function getBotton($IdCcalidad)
		{

			$intIdCcalidad = intval(strClean($IdCcalidad));

			if ($intIdCcalidad > 0) {
				
				$arrData = $this->model->selectEstadoDCC($intIdCcalidad);

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


			public function getDetalle($IdComprarepliegue)
		{

			$intIdComprarepliegue = intval(strClean($IdComprarepliegue));

			if ($intIdComprarepliegue > 0) {
				
				$arrData = $this->model->selectDetallesCompraAdqui($intIdComprarepliegue);

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


		public function setCalidad()
		{  
			if($_POST){
				if( empty($_POST['cborecibidopor'])){
					$arrResponse = 	[
								    	"status"=> false,
								    	"title"	=> "Error!",
								    	"msg" 	=> "Verificar Datos.",
									]; 
				}else{
					
					$intcborecibidopor			 	= intval(strClean($_POST['cborecibidopor']));
					$intIdComprarepliegue		 	= intval(strClean($_POST['IdComprarepliegue']));
					$strtxtnumeropedido			 	= intval(strClean($_POST['txtnumeropedido']));
					$strOrdenCompra				 	= intval(strClean($_POST['txtordecompra']));
					$strpecosa				 		= intval(strClean($_POST['txtpecosa']));
					$intUserSession					= intval(strClean($_SESSION['idUser']));
					$detallesCcalidad 		  	 	= json_decode($_POST['detalleCal']);
					
					if($intcborecibidopor > 0){

						$uptecomprerepliegue	= $this->model->updatecomprerepliegue($intIdComprarepliegue,$strtxtnumeropedido,$strOrdenCompra,$strpecosa);


						$requestCcalidad	= $this->model->insertCcalidad($intIdComprarepliegue,$intcborecibidopor,$intUserSession);
						
						foreach ($detallesCcalidad as $row) {
							$cantidadA = intval(strClean($row->cantidadA));
							$cantidadB = intval(strClean($row->cantidadB));
							$cantidadC = intval(strClean($row->cantidadC));
							$idProducto = intval(strClean($row->idProducto));

							$cantidadA = ($cantidadA > 0) ? $cantidadA : 0;
							$cantidadB = ($cantidadB > 0) ? $cantidadB : 0;
							$cantidadC = ($cantidadC > 0) ? $cantidadC : 0;

							//$Total = $cantidadA - $cantidadC;

							$requestDetalleCcalidad = $this->model->insertDetalleCcalidad($requestCcalidad,$intIdComprarepliegue,$idProducto, $cantidadA,$cantidadB, $cantidadC,$intUserSession);

						}						

						


					}else{
						//$requestFamilia	= $this->model->updateProveedor($intIdProveedor, $strRazonSocial,$intRuc,$intCelular, $intUserSession);
					}

					if($requestCcalidad > 0){

						if($intcborecibidopor == 0){
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

		public function setAprobarCalidad()
			{  			
				
			if($_POST){
				if( empty($_POST['IdComprarepliegue'])){
					$arrResponse = 	[
								    	"status"=> false,
								    	"title"	=> "Error!",
								    	"msg" 	=> "Verificar Datos.",
									]; 
				}else{
					
					$intIdComprarepliegue		 	= intval(strClean($_POST['IdComprarepliegue']));
					$intIdCcalidad				 	= intval(strClean($_POST['IdCalidad']));
					$intUserSession					= intval(strClean($_SESSION['idUser']));
					
					
					if($intIdComprarepliegue > 0){

						$requestdetallecomprarepliegue	= $this->model->updatedetallecomprarepliegue($intIdComprarepliegue,$intIdCcalidad,$intUserSession);	

						//cambiar estado de compra o adqui
						$requestResultadoCC	= $this->model->ResultadoCCalidad($intIdComprarepliegue,$intUserSession);	
						$varCantidad = $requestResultadoCC['IdStockProd'];
							if ($varCantidad == 0) {
								$requestInsertStocks = $this->model->updatedetaModestado($intIdComprarepliegue,$intUserSession);						
							}else{
								//$requestInsertStocks = $this->model->updatedetaModestados($intIdComprarepliegue,$intUserSession);
							}


						//cambiar estado de Repliegue
						$requestResultadoCCR	= $this->model->ResultadoCCalidadRepliegue($intIdComprarepliegue,$intUserSession);	
						$varCantidad1 = $requestResultadoCCR['IdStockProdto'];
							if ($varCantidad1 == 0) {
								$requestInsertStocks = $this->model->updatedetaModestado($intIdComprarepliegue,$intUserSession);						
							}else{
								
							}



						$InsertIntoTarjetaMov	= $this->model->InserintoTjm($intIdComprarepliegue,$intIdCcalidad,$intUserSession);

						$UpdateStockP	= $this->model->UpdateStockProd($intIdComprarepliegue,$intIdCcalidad,$intUserSession);

						$UpdateTjm	= $this->model->UpdateTjm($intIdComprarepliegue,$intIdCcalidad,$intUserSession);

						
					}

					if($requestdetallecomprarepliegue > 0){

						if($requestdetallecomprarepliegue > 0){
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


	public function buscarproducto()
		{
				
				$arrData = $this->model->buscarproductotext();

				#$getClientes = $this->myModel->getClientes();
				    foreach ($arrData->result() as $row){
				        $nombres = $row->Nombres;
				    }

			
				
			#echo $datos;
			var_dump($nombres);
			#echo json_encode($datos);
			 

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
			$arrData = $this->model->selectcboEntregadoPor();
			if(count($arrData) > 0){
				for ($i=0; $i < count($arrData) ; $i++) { 
					$htmlOptions .='<option value="'.$arrData[$i]['IdPersonal'].'"> '.$arrData[$i]['Nombres'].'</option>';
				}
			}
			echo $htmlOptions;
			die();
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
                              <td class="text-center" width="10%"><input class="form-control vld" type="number" style="width:60px" step="1" id="cantA'.$arrData['IdProducto'].'" value="0" required="">
                              <td class="text-center" width="10%"><input class="form-control vld" type="number" style="width:60px" step="1" id="cantB'.$arrData['IdProducto'].'" value="0" required="">
                              <td class="text-center" width="10%"><input class="form-control vld" type="number" style="width:60px" step="1" id="cantC'.$arrData['IdProducto'].'" value="0" required="">

                              <input type="hidden" value="'.$arrData['IdProducto'].'" name="idProducto"></td>
                              
                              <td class="text-center" width="10%"><a onclick="eliminarFila(\'fila-'.$arrData['IdProducto'].'\');" class="btn btn-danger btn-xs" title="Eliminar Producto">
													<i class="zmdi zmdi-close zmdi-hc-fw"></i>
												</a></td>
						   </tr>';
			 
			
			#echo json_encode($campos);
			 echo $campos;
			die();
			}



		public function gettabledetalleingresos($idCompra)

			{

				$intIdCompra = intval(strClean($idCompra));

			
			$output = array();

			$arrData = $this->model->selecttabledetalleingresos($intIdCompra);
			
			for ($i=0; $i <  count($arrData[0]); $i++) { 
				# code...
				$arrData[0][$i]['orden'] 	= 	$i+1;
				$arrData[0][$i]['Estado'] 	= 	$arrData[0][$i]['Estado'] == 1 ? '<span class="label label-success label-pill m-w-60">INGRESADO</span>' : '<span class="label label-danger label-pill m-w-60">INACTIVO</span>';
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