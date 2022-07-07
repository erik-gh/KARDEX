<?php 

	/**
	* 
	*/
	class Cliente extends Controllers
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


		public function cliente()
		{

			$data['page_tag']='cliente';
			$data['page_title']='GESTI&OacuteN DE CLIENTES Y VENTAS';
			$data['page_name']='Cliente';
			$data['page_function_js']='function_cliente.js';
			$this->views->getView($this,'cliente',$data);
		}


		public function setCliente()
		{
			if($_POST){ 
				if( empty($_POST['nombre'])|| empty($_POST['dni'])){
					$arrResponse = 	[
								    	"status"=> false,
								    	"title"	=> "Error!",
								    	"msg" 	=> "Verificar Datos.",
									]; 
				}else{
					$intIdCliente	= intval(strClean($_POST['IdCliente']));
					$intControl		= intval(strClean($_POST['controlCliente']));
					
					$strNombre  	= strClean($_POST['nombre']);
					$intDni         = intval(strClean($_POST['dni']));
					$strDireccion	= strClean($_POST['direccion']);
					$strFechaNacimiento	= strClean($_POST['fechanacimiento']);
					$intCelular         = intval(strClean($_POST['celular']));
					$strCorreo          = strClean($_POST['correo']);
					$strContacto        = strClean($_POST['contacto']);
					$intUserSession	= intval(strClean($_SESSION['idUser']));
					
					
					if($intControl == 0){
						$requestCliente	= $this->model->insertCliente($strNombre,$intDni,$strDireccion,$strFechaNacimiento,$intCelular,$strCorreo ,$strContacto, $intUserSession);
					}else{// entra aqui como 1
						$requestCliente	= $this->model->updateCliente($intIdCliente,$strNombre,$intDni,$strDireccion,$strFechaNacimiento,$intCelular,$strCorreo ,$strContacto, $intUserSession);
					}

					if($requestCliente > 0){

						if($intControl == 0){
							$arrResponse = 	[
											    "status"=> true,
											    "title"	=> "Cliente",
											    "msg" 	=> "Datos Guardados Correctamente.",
											];
						}else{
							$arrResponse = 	[
											    "status"=> true,
											    "title"	=> "Cliente",
											    "msg" 	=> "Datos Actualizados Correctamente.",
											];
						}
					}else if($requestCliente == 'exist'){
						$arrResponse = 	[
										    "status"=> false,
										    "title"	=> "Alerta!",
										    "msg" 	=> "Ya se encuentra registrado este Cliente.",
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

		public function setVenta()
		{ 	//dep($_POST); exit;
			if($_POST){ 
				if( empty($_POST['cliente'])|| empty($_POST['asesor'])){
					$arrResponse = 	[
								    	"status"=> false,
								    	"title"	=> "Error!",
								    	"msg" 	=> "Verificar Datos.",
									]; 
				}else{
					$intIdProducto		= intval(strClean($_POST['IdProducto']));
					$intControl		    = intval(strClean(($_POST['select-evento'])));  
					
					
					$intCliente         = intval(strClean($_POST['cliente']));
					$intAsesor          = intval(strClean($_POST['asesor']));
					$intBanco           = intval(strClean($_POST['banco']));
					$strFecha  			= strClean($_POST['fecha']);
					$strVoucher         = strClean($_POST['voucher']);
					$intInicial         = intval(strClean($_POST['inicial']));
					$strObservacion     = strClean($_POST['observacion']);
					$intUserSession		= intval(strClean($_SESSION['idUser']));
					
					
					if($intControl == 0){
						$requestCliente	= $this->model->insertVenta($intIdProducto,$intCliente,$intAsesor,$intBanco,$strFecha,$strVoucher,$intInicial ,$strObservacion, $intUserSession);


					}else{
						$requestCliente	= $this->model->insertSeparar($intIdProducto,$intCliente,$intAsesor,$intBanco,$strFecha,$strVoucher,$intInicial ,$strObservacion, $intUserSession);
					}

					if($requestCliente > 0){

						if($intControl == 0){
							$arrResponse = 	[
											    "status"=> true,
											    "title"	=> "Cliente",
											    "msg" 	=> "Datos Guardados Correctamente.",
											];
						}else{
							$arrResponse = 	[
											    "status"=> true,
											    "title"	=> "Cliente",
											    "msg" 	=> "Datos Actualizados Correctamente.",
											];
						}
					}else if($requestCliente == 'exist'){
						$arrResponse = 	[
										    "status"=> false,
										    "title"	=> "Alerta!",
										    "msg" 	=> "Ya se encuentra registrado este Cliente.",
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



		public function setDetalleVenta()
		{ 
			if($_POST){ 
				if( empty($_POST['cliente'])|| empty($_POST['banco'])){
					$arrResponse = 	[
								    	"status"=> false,
								    	"title"	=> "Error!",
								    	"msg" 	=> "Verificar Datos.",
									]; 
				}else{
					$intIdDetalleVenta	= intval(strClean($_POST['IdDetalleVenta']));
					$intControl		    = intval(strClean(($_POST['controlDetalleVenta'])));  
					
					
					$intCliente         = intval(strClean($_POST['cliente']));
					$intBanco           = intval(strClean($_POST['banco']));
					$strFecha  			= strClean($_POST['fecha']);
					$strVoucher         = strClean($_POST['voucher']);
					$intInicial2         = intval(strClean($_POST['inicial2']));
					$strFechaPago		= strClean($_POST['fechapago']);
					$intCuotas          = intval(strClean($_POST['cuotas']));
					$intMonto          = intval(strClean($_POST['monto']));
					$intUserSession		= intval(strClean($_SESSION['idUser']));
					
					
					if($intControl == 0){
						$requestCliente	= $this->model->insertDetalleVenta($intIdDetalleVenta,$intCliente,$intBanco,$strFecha,$strVoucher,$intInicial2,$strFechaPago,$intCuotas,$intMonto,$intUserSession);


					}else{
						$requestCliente	= $this->model->insertSeparar($intIdProducto,$intCliente,$intAsesor,$intBanco,$strFecha,$strVoucher,$intInicial ,$strObservacion, $intUserSession);
					}

					if($requestCliente > 0){

						if($intControl == 0){
							$arrResponse = 	[
											    "status"=> true,
											    "title"	=> "Cliente",
											    "msg" 	=> "Datos Guardados Correctamente.",
											];
						}else{
							$arrResponse = 	[
											    "status"=> true,
											    "title"	=> "Cliente",
											    "msg" 	=> "Datos Actualizados Correctamente.",
											];
						}
					}else if($requestCliente == 'exist'){
						$arrResponse = 	[
										    "status"=> false,
										    "title"	=> "Alerta!",
										    "msg" 	=> "Ya se encuentra registrado este Cliente.",
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






		public function getClientes()
		{
			
			$output = array();
			
			$arrData = $this->model->selectClientes();
			//$filtro = ($_POST["search"]["value"]!= '') ? $arrData[1] : $arrData[2];
			for ($i=0; $i <  count($arrData[0]); $i++) { 
				# code...
				$arrData[0][$i]['orden'] 	= 	$i+1;
				
				$arrData[0][$i]['opciones'] =	'<a class="btn btn-primary btn-xs" title="Editar" onclick="editarCliente('.$arrData[0][$i]['IdCliente'].')">
													<i class="zmdi zmdi-edit zmdi-hc-fw"></i>
												</a>
                                				<a class="btn btn-danger btn-xs" title="Eliminar" onclick="eliminarCliente('.$arrData[0][$i]['IdCliente'].')">
                                					<i data-toggle="tooltip" title="Eiiminar"class="zmdi zmdi-delete zmdi-hc-fw"></i>
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




		public function getCliente($idCliente)
		{

			$intIdCliente = intval(strClean($idCliente));

			if ($intIdCliente > 0) {
				
				$arrData = $this->model->selectCliente($intIdCliente);

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


	



		public function delCliente($idCliente)
		{
				// id a eliminar 
				$intIdCliente 	= intval(strClean($idCliente));
				$requestDelete 	= $this->model->deleteCliente($intIdCliente);

				if ($requestDelete > 0) {
					$arrResponse = 	[
										"status"=> true,
										"title"	=> "Clientes",
										"msg" 	=> "Cliente Eliminado Correctamente.",
									];

				}else{
					$arrResponse = 	[
										"status"=> false,
										"title"	=> "Error!",
										"msg" 	=> "Error al eliminar el Cliente",
									];
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			
				die();
		}


		public function tablaproducto()
		{
			//dep($_POST); exit;
			
			$output = array();
			$proyecto = strClean($_POST['proyecto']);


			$arrData = $this->model->gettablaproducto($proyecto);


	
		

			for ($i=0; $i <  count($arrData); $i++) { 

				
				$arrData[$i]['orden'] 	= 	$i+1;
				$arrData[$i]['Estado'] 	= 	$arrData[$i]['Estado'] ;


					switch ($arrData[$i]['Estado']) {
							  case '1':
							   $arrData[$i]['Estado'] = '<span class="label label-success label-pill m-w-60">DISPONIBLE</span>';
							    break;
							  case '2':
							   $arrData[$i]['Estado'] = '<span class="label label-warning label-pill m-w-60">SEPARADO</span>';
							    break;

							  case '3':
							   $arrData[$i]['Estado'] = '<span class="label label-danger label-pill m-w-60">VENDIDO</span>';
							    break;
							
							 
							  default:
							    //Declaraciones ejecutadas cuando ninguno de los valores coincide con el valor de la expresión
							    break;
							};

						


				$arrData[$i]['opciones'] =	'<a class="btn btn-primary btn-xs" title="Ver" onclick="VisualizarModal('.$arrData[$i]['IdProducto'].')"><i class="zmdi zmdi-edit zmdi-hc-fw"></i></a>';
				
			}



			$output = array(
				
				"data"				=>	$arrData
			);
			echo json_encode($output,JSON_UNESCAPED_UNICODE);
			die();
			

				
		}

		public function tablaproducto2()
		{
			//dep($_POST); exit;
			
			$output = array();
			$proyecto = strClean($_POST['proyecto']);


			$arrData = $this->model->gettablaproducto2($proyecto);


	
		

			for ($i=0; $i <  count($arrData); $i++) { 

				
				$arrData[$i]['orden'] 	= 	$i+1;
				$arrData[$i]['Estado'] 	= 	$arrData[$i]['Estado'] ;


					switch ($arrData[$i]['Estado']) {
							  case '1':
							   $arrData[$i]['Estado'] = '<span class="label label-success label-pill m-w-60">DISPONIBLE</span>';
							    break;
							  case '2':
							   $arrData[$i]['Estado'] = '<span class="label label-warning label-pill m-w-60">SEPARADO</span>';
							    break;

							  case '3':
							   $arrData[$i]['Estado'] = '<span class="label label-danger label-pill m-w-60">VENDIDO</span>';
							    break;
							
							 
							  default:
							    //Declaraciones ejecutadas cuando ninguno de los valores coincide con el valor de la expresión
							    break;
							};

						


				$arrData[$i]['opciones'] =	'<a class="btn btn-primary btn-xs" title="Ver" onclick="VisualizarModaldetalleventa('.$arrData[$i]['DetalleVenta'].')"><i class="zmdi zmdi-edit zmdi-hc-fw"></i></a>';
				
			}



			$output = array(
				
				"data"				=>	$arrData
			);
			echo json_encode($output,JSON_UNESCAPED_UNICODE);
			die();
			

				
		}


		public function getSelectCliente()
		{
			$htmlOptions = '<option value="">[ Seleccione el Cliente ]</option>';
			$arrData = $this->model->selectcboCliente();
			if(count($arrData) > 0){
				for ($i=0; $i < count($arrData) ; $i++) { 
					$htmlOptions .='<option value="'.$arrData[$i]['IdCliente'].'"> '.$arrData[$i]['Nombre'].'</option>';
				}
			}
			echo $htmlOptions;
			die();
		}

			public function getSelectAsesor()
		{
			$htmlOptions = '<option value="">[ Seleccione el Asesor ]</option>';
			$arrData = $this->model->selectcboAsesor();
			if(count($arrData) > 0){
				for ($i=0; $i < count($arrData) ; $i++) { 
					$htmlOptions .='<option value="'.$arrData[$i]['id_personal'].'"> '.$arrData[$i]['nombre'].'</option>';
				}
			}
			echo $htmlOptions;
			die();
		}


			public function getSelectBanco() // 
		{
			$htmlOptions = '<option value="">[ Seleccione el Banco ]</option>';
			$arrData = $this->model->selectcboBanco();
			if(count($arrData) > 0){
				for ($i=0; $i < count($arrData) ; $i++) { 
					$htmlOptions .='<option value="'.$arrData[$i]['IdBanco'].'"> '.$arrData[$i]['Descripcion'].'</option>';
				}
			}
			echo $htmlOptions;
			die();
		}





	

	}

?>