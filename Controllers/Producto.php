<?php 

	/**
	* 
	*/
	class Producto extends Controllers
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


		public function producto()
		{

			$data['page_tag']='producto';
			$data['page_title']='GESTION DE KARDEX';
			$data['page_name']='Producto';
			$data['page_function_js']='function_producto.js';
			$this->views->getView($this,'producto',$data);
		}


		public function delCconsumo($idConsumo)
		{
			
				$intidConsumo	= intval(strClean($idConsumo));
				$requestDelete 	= $this->model->deleteCconsumo($intidConsumo);

				if ($requestDelete > 0) {
					$arrResponse = 	[
										"status"=> true,
										"title"	=> "Centro de Consumo",
										"msg" 	=> "Cconsumo Eliminado Correctamente.",
									];

				}else if($requestDelete == 'exist'){
					$arrResponse = 	[
										"status"=> false,
										"title"	=> "Alerta!",
										"msg" 	=> "No se puede eliminar el Cconsumo, esta asociado a un Personal.",
									];
				}else{
					$arrResponse = 	[
										"status"=> false,
										"title"	=> "Error!",
										"msg" 	=> "Error al eliminar el Cconsumo",
									];
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			
				die();
		}


		public function delDocumento($idConsumo)
		{
			
				$intidConsumo	= intval(strClean($idConsumo));
				$requestDelete 	= $this->model->deleteDocumento($intidConsumo);

				if ($requestDelete > 0) {
					$arrResponse = 	[
										"status"=> true,
										"title"	=> "Centro de Consumo",
										"msg" 	=> "Documento Eliminado Correctamente.",
									];

				}else if($requestDelete == 'exist'){
					$arrResponse = 	[
										"status"=> false,
										"title"	=> "Alerta!",
										"msg" 	=> "No se puede eliminar el Documento, esta asociado a un Movimiento.",
									];
				}else{
					$arrResponse = 	[
										"status"=> false,
										"title"	=> "Error!",
										"msg" 	=> "Error al eliminar el Documento",
									];
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			
				die();
		}

				public function delalmacen($idConsumo)
		{
			
				$intidConsumo	= intval(strClean($idConsumo));
				$requestDelete 	= $this->model->deletealmacen($intidConsumo);

				if ($requestDelete > 0) {
					$arrResponse = 	[
										"status"=> true,
										"title"	=> "ALMACEN",
										"msg" 	=> "Almacen Eliminado Correctamente.",
									];

				}else if($requestDelete == 'exist'){
					$arrResponse = 	[
										"status"=> false,
										"title"	=> "Alerta!",
										"msg" 	=> "No se puede eliminar el Almacen, esta asociado a movimientos.",
									];
				}else{
					$arrResponse = 	[
										"status"=> false,
										"title"	=> "Error!",
										"msg" 	=> "Error al eliminar el Almacen",
									];
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			
				die();
		}


		public function getCconsumoedit($idconsumo)
		{

			$intIdCconsumo = intval(strClean($idconsumo));

			if ($intIdCconsumo > 0) {
				
				$arrData = $this->model->selectCconsumoedit($intIdCconsumo);

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

		public function setCconsumo()
		{
			//dep($_POST); exit;
			if($_POST){
				if(empty($_POST['consumo'])){
					$arrResponse = 	[
								    	"status"=> false,
								    	"title"	=> "Error!",
								    	"msg" 	=> "Verificar Datos.",
									]; 
				}else{
					$intIdCconsumo		= intval(strClean($_POST['IdCconsumo']));
					$intControl			= intval(strClean($_POST['controlCconsumo']));
					$strconsumo			= strClean($_POST['consumo']);
					
					$intUserSession		= intval(strClean($_SESSION['idUser']));
					$intEstado			= intval(strClean($_POST['estado']));
					
					if($intControl == 0){
						$requestCargo	= $this->model->insertCconsumo($strconsumo, $intUserSession);
					}else{
						$requestCargo	= $this->model->updateCconsumo($intIdCconsumo, $strconsumo,$intUserSession, $intEstado);
					}

					if($requestCargo > 0){

						if($intControl == 0){
							$arrResponse = 	[
											    "status"=> true,
											    "title"	=> "Cargos",
											    "msg" 	=> "Datos Guardados Correctamente.",
											];
						}else{
							$arrResponse = 	[
											    "status"=> true,
											    "title"	=> "Cargos",
											    "msg" 	=> "Datos Actualizados Correctamente.",
											];
						}
					}else if($requestCargo == 'exist'){
						$arrResponse = 	[
										    "status"=> false,
										    "title"	=> "Alerta!",
										    "msg" 	=> "Ya se encuentra registrado este Cargo.",
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

		public function getCconsumo()
		{
			
			$output = array();

			$arrData = $this->model->selectCconsumo();
			
			for ($i=0; $i <  count($arrData[0]); $i++) { 
				# code...
				$arrData[0][$i]['orden'] 	= 	$i+1;
				$arrData[0][$i]['Estado'] 	= 	$arrData[0][$i]['Estado'] == 1 ? '<span class="label label-success label-pill m-w-60">ACTIVO</span>' : '<span class="label label-danger label-pill m-w-60">INACTIVO</span>';
				$arrData[0][$i]['opciones'] =	'<a class="btn btn-primary btn-xs" title="Editar" onclick="editarCconsumo('.$arrData[0][$i]['IdCentroConsumo'].')">
													<i class="zmdi zmdi-edit zmdi-hc-fw"></i>
												</a>
                                				<a class="btn btn-danger btn-xs" title="Eliminar" onclick="eliminarCconsumo('.$arrData[0][$i]['IdCentroConsumo'].')">
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

		public function setProyecto()
		{
			if($_POST){
				if( empty($_POST['descripcion'])|| empty($_POST['detalles'])){
					$arrResponse = 	[
								    	"status"=> false,
								    	"title"	=> "Error!",
								    	"msg" 	=> "Verificar Datos.",
									]; 
				}else{
					$intIdProyecto	= intval(strClean($_POST['IdProyecto']));
					$intControl		= intval(strClean($_POST['controlProyecto']));
					
					$strDescripcion	= strClean($_POST['descripcion']);
					$strDetalles	= strClean($_POST['detalles']);
					$intUserSession	= intval(strClean($_SESSION['idUser']));
					//$intEstado		= intval(strClean($_POST['estado']));
					
					if($intControl == 0){//ya no entra aqui 
						$requestProyecto	= $this->model->insertProyecto( $strDescripcion,$strDetalles, $intUserSession);
					}else{// entra aqui como 1
						$requestProyecto	= $this->model->updateProyecto($intIdProyecto, $strDescripcion, $strDetalles);
					}

					if($requestProyecto > 0){

						if($intControl == 0){
							$arrResponse = 	[
											    "status"=> true,
											    "title"	=> "Proyecto",
											    "msg" 	=> "Datos Guardados Correctamente.",
											];
						}else{
							$arrResponse = 	[
											    "status"=> true,
											    "title"	=> "Proyecto",
											    "msg" 	=> "Datos Actualizados Correctamente.",
											];
						}
					}else if($requestProyecto == 'exist'){
						$arrResponse = 	[
										    "status"=> false,
										    "title"	=> "Alerta!",
										    "msg" 	=> "Ya se encuentra registrado este Proyecto.",
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


		public function setFamilia()
		{ 
			if($_POST){
				if( empty($_POST['descripcion'])){
					$arrResponse = 	[
								    	"status"=> false,
								    	"title"	=> "Error!",
								    	"msg" 	=> "Verificar Datos.",
									]; 
				}else{
					$intIdFamilia	= intval(strClean($_POST['IdFamilia']));
					$intControl		= intval(strClean($_POST['controlFamilia']));
					$strDescripcion	= strClean($_POST['descripcion']);
					$intEstado		= intval(strClean($_POST['estado']));
					$intUserSession	= intval(strClean($_SESSION['idUser']));
					
					
					if($intControl == 0){//ya no entra aqui 
						$requestFamilia	= $this->model->insertFamilia( $strDescripcion, $intUserSession);
					}else{// entra aqui como 1
						$requestFamilia	= $this->model->updateFamilia($intIdFamilia, $strDescripcion,$intEstado);
					}

					if($requestFamilia != 'exist'){

						if($intControl == 0){
							$arrResponse = 	[
											    "status"=> true,
											    "title"	=> "Familia",
											    "msg" 	=> "Datos Guardados Correctamente.",
											];
						}else{
							$arrResponse = 	[
											    "status"=> true,
											    "title"	=> "Familia",
											    "msg" 	=> "Datos Actualizados Correctamente.",
											];
						}
					}else if($requestFamilia == 'exist'){
						$arrResponse = 	[
										    "status"=> false,
										    "title"	=> "Alerta!",
										    "msg" 	=> "Ya se encuentra registrado esta Familia.",
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



			public function setUma()
		{ 
			if($_POST){
				if( empty($_POST['descripcion'])){
					$arrResponse = 	[
								    	"status"=> false,
								    	"title"	=> "Error!",
								    	"msg" 	=> "Verificar Datos.",
									]; 
				}else{
					$intIdUma		= intval(strClean($_POST['IdUma']));
					$intControl		= intval(strClean($_POST['controlUma']));
					$strDescripcion	= strClean($_POST['descripcion']);
					$intEstado		= intval(strClean($_POST['estado']));
					$intUserSession	= intval(strClean($_SESSION['idUser']));
					
					
					if($intControl == 0){
						$requestUma	= $this->model->insertUma( $strDescripcion, $intUserSession);
					}else{
						$requestUma	= $this->model->updateUma($intIdUma, $strDescripcion,$intEstado );
					}



					if($requestUma != 'exist'){

						if($intControl == 0){
							$arrResponse = 	[
											    "status"=> true,
											    "title"	=> "UMA",
											    "msg" 	=> "Datos Guardados Correctamente.",
											];
						}else{
							$arrResponse = 	[
											    "status"=> true,
											    "title"	=> "UMA",
											    "msg" 	=> "Datos Actualizados Correctamente.",
											];
						}
					}else if($requestUma == 'exist'){
						$arrResponse = 	[
										    "status"=> false,
										    "title"	=> "Alerta!",
										    "msg" 	=> "Ya se encuentra registrado esta UMA.",
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

			public function setAlmacen()
		{ 
			if($_POST){
				if( empty($_POST['descripcion'])){
					$arrResponse = 	[
								    	"status"=> false,
								    	"title"	=> "Error!",
								    	"msg" 	=> "Verificar Datos.",
									]; 
				}else{
					$intIdAlmacen	= intval(strClean($_POST['IdAlmacen']));
					$intControl		= intval(strClean($_POST['controlAlmacen']));
					$strDescripcion	= strClean($_POST['descripcion']);
					$intEstado		= intval(strClean($_POST['estado']));
					$intUserSession	= intval(strClean($_SESSION['idUser']));
					
					
					if($intControl == 0){
						$requestUma	= $this->model->insertalmacen( $strDescripcion, $intUserSession);
					}else{
						$requestUma	= $this->model->updateAlmacen($intIdAlmacen, $strDescripcion,$intEstado,$intUserSession );
					}

					if($requestUma > 0){

						if($intControl == 0){
							$arrResponse = 	[
											    "status"=> true,
											    "title"	=> "ALMACEN",
											    "msg" 	=> "Datos Guardados Correctamente.",
											];
						}else{
							$arrResponse = 	[
											    "status"=> true,
											    "title"	=> "ALMACEN",
											    "msg" 	=> "Datos Actualizados Correctamente.",
											];
						}
					}else if($requestUma == 'exist'){
						$arrResponse = 	[
										    "status"=> false,
										    "title"	=> "Alerta!",
										    "msg" 	=> "Ya se encuentra registrado este Almacen.",
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


		  public function setDocumento()
		{ 
			if($_POST){
				if( empty($_POST['descripcion'])){
					$arrResponse = 	[
								    	"status"=> false,
								    	"title"	=> "Error!",
								    	"msg" 	=> "Verificar Datos.",
									]; 
				}else{
					$intIdDocumento	= intval(strClean($_POST['IdDocumento']));
					$intControl		= intval(strClean($_POST['controlDocumento']));
					$strDescripcion	= strClean($_POST['descripcion']);
					$intEstado		= intval(strClean($_POST['estado']));
					$intUserSession	= intval(strClean($_SESSION['idUser']));
					
					
					if($intControl == 0){
						$requestUma	= $this->model->insertdocumento($strDescripcion, $intUserSession);
					}else{
						$requestUma	= $this->model->updatedocumento($intIdDocumento, $strDescripcion,$intEstado,$intUserSession );
					}

					if($requestUma > 0){

						if($intControl == 0){
							$arrResponse = 	[
											    "status"=> true,
											    "title"	=> "DOCUMENTO",
											    "msg" 	=> "Datos Guardados Correctamente.",
											];
						}else{
							$arrResponse = 	[
											    "status"=> true,
											    "title"	=> "DOCUMENTO",
											    "msg" 	=> "Datos Actualizados Correctamente.",
											];
						}
					}else if($requestUma == 'exist'){
						$arrResponse = 	[
										    "status"=> false,
										    "title"	=> "Alerta!",
										    "msg" 	=> "Ya se encuentra registrado este DOCUMENTO.",
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


			public function setProceso()
		{ 
			if($_POST){
				if( empty($_POST['descripcion'])){
					$arrResponse = 	[
								    	"status"=> false,
								    	"title"	=> "Error!",
								    	"msg" 	=> "Verificar Datos.",
									]; 
				}else{
					$intIdProceso	= intval(strClean($_POST['IdProceso']));
					$intControl		= intval(strClean($_POST['controlProceso']));
					$strDescripcion	= strClean($_POST['descripcion']);
					$strFechaInicio	= strClean($_POST['fechainicio']);
					$strFechaFin	= strClean($_POST['fechafin']);
					$intEstado			= intval(strClean($_POST['estado']));
					$intUserSession	= intval(strClean($_SESSION['idUser']));
					
					
					if($intControl == 0){//ya no entra aqui 
						$requestUma	= $this->model->insertProceso($strDescripcion,$strFechaInicio,$strFechaFin ,$intUserSession);
					}else{// entra aqui como 1
						$requestUma	= $this->model->updateProceso($intIdProceso, $strDescripcion,$strFechaInicio,$strFechaFin,$intEstado,$intUserSession);
					}

					if($requestUma > 0){

						if($intControl == 0){
							$arrResponse = 	[
											    "status"=> true,
											    "title"	=> "PROCESO",
											    "msg" 	=> "Datos Guardados Correctamente.",
											];
						}else{
							$arrResponse = 	[
											    "status"=> true,
											    "title"	=> "PROCESO",
											    "msg" 	=> "Datos Actualizados Correctamente.",
											];
						}
					}else if($requestUma == 'exist'){
						$arrResponse = 	[
										    "status"=> false,
										    "title"	=> "Alerta!",
										    "msg" 	=> "Ya se encuentra registrado esta Familia.",
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

		public function setClase()
		{ 
			if($_POST){
				if( empty($_POST['descripcion'])){
					$arrResponse = 	[
								    	"status"=> false,
								    	"title"	=> "Error!",
								    	"msg" 	=> "Verificar Datos.",
									]; 
				}else{
					$intIdClase		= intval(strClean($_POST['IdClase']));
					$intControl		= intval(strClean($_POST['controlClase']));
					$strDescripcion	= strClean($_POST['descripcion']);
					$intIdFamilia	= intval(strClean($_POST['IdFamilia']));
					$intEstado		= intval(strClean($_POST['estado']));
					$intUserSession	= intval(strClean($_SESSION['idUser']));
					
					
					if($intControl == 0){
						$requestClase	= $this->model->insertClase( $strDescripcion, $intIdFamilia,$intUserSession);
					}else{
						$requestClase	= $this->model->updateClase($intIdClase, $strDescripcion,$intIdFamilia,$intEstado);
					}

					if($requestClase != 'exist'){

						if($intControl == 0){
							$arrResponse = 	[
											    "status"=> true,
											    "title"	=> "Clase",
											    "msg" 	=> "Datos Guardados Correctamente.",
											];
						}else{
							$arrResponse = 	[
											    "status"=> true,
											    "title"	=> "Clase",
											    "msg" 	=> "Datos Actualizados Correctamente.",
											];
						}
					}else if($requestClase == 'exist'){
						$arrResponse = 	[
										    "status"=> false,
										    "title"	=> "Alerta!",
										    "msg" 	=> "Ya se encuentra registrado esta Clase.",
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





	


		public function getFamilias()
		{
			
			$output = array();

			$arrData = $this->model->selectFamiliass();
			
			for ($i=0; $i <  count($arrData[0]); $i++) { 
				# code...
				$arrData[0][$i]['orden'] 	= 	$i+1;
				$arrData[0][$i]['Estado'] 	= 	$arrData[0][$i]['Estado'] == 1 ? '<span class="label label-success label-pill m-w-60">ACTIVO</span>' : '<span class="label label-danger label-pill m-w-60">INACTIVO</span>';
				$arrData[0][$i]['opciones'] =	'<a class="btn btn-primary btn-xs" title="Editar" onclick="editarFamilia('.$arrData[0][$i]['IdFamilia'].')">
													<i class="zmdi zmdi-edit zmdi-hc-fw"></i>
												</a>
                                				<a class="btn btn-danger btn-xs" title="Eliminar" onclick="eliminarFamilia('.$arrData[0][$i]['IdFamilia'].')">
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


		public function getPersonal()
		{
			
			$output = array();

			$arrData = $this->model->selectPersonalsalida();
			
			for ($i=0; $i <  count($arrData[0]); $i++) { 
				# code...
				$arrData[0][$i]['orden'] 	= 	$i+1;
				$arrData[0][$i]['Estado'] 	= 	$arrData[0][$i]['Estado'] == 1 ? '<span class="label label-success label-pill m-w-60">ACTIVO</span>' : '<span class="label label-danger label-pill m-w-60">INACTIVO</span>';
				$arrData[0][$i]['opciones'] =	'<a class="btn btn-primary btn-xs" title="Editar" onclick="editarPersonal('.$arrData[0][$i]['IdPersonal'].')">
													<i class="zmdi zmdi-edit zmdi-hc-fw"></i>
												
                                				</a>
                                				<a class="btn btn-danger btn-xs" title="Eliminar" onclick="eliminarPersonal('.$arrData[0][$i]['IdPersonal'].')">
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


	public function getUmas()
		{
			
			$output = array();

			$arrData = $this->model->selectUmass();
			
			for ($i=0; $i <  count($arrData[0]); $i++) { 
				# code...
				$arrData[0][$i]['orden'] 	= 	$i+1;
				$arrData[0][$i]['Estado'] 	= 	$arrData[0][$i]['Estado'] == 1 ? '<span class="label label-success label-pill m-w-60">ACTIVO</span>' : '<span class="label label-danger label-pill m-w-60">INACTIVO</span>';
				$arrData[0][$i]['opciones'] =	'<a class="btn btn-primary btn-xs" title="Editar" onclick="editarUma('.$arrData[0][$i]['IdUma'].')">
													<i class="zmdi zmdi-edit zmdi-hc-fw"></i>
												</a>
                                				<a class="btn btn-danger btn-xs" title="Eliminar" onclick="eliminarUma('.$arrData[0][$i]['IdUma'].')">
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


	public function getAlmacen()
		{
			
			$output = array();

			$arrData = $this->model->selectAlmacens();
			
			for ($i=0; $i <  count($arrData[0]); $i++) { 
				# code...
				$arrData[0][$i]['orden'] 	= 	$i+1;
				$arrData[0][$i]['Estado'] 	= 	$arrData[0][$i]['Estado'] == 1 ? '<span class="label label-success label-pill m-w-60">ACTIVO</span>' : '<span class="label label-danger label-pill m-w-60">INACTIVO</span>';
				$arrData[0][$i]['opciones'] =	'<a class="btn btn-primary btn-xs" title="Editar" onclick="editarAlmacen('.$arrData[0][$i]['IdSucursal'].')">
													<i class="zmdi zmdi-edit zmdi-hc-fw"></i>
												</a>

												<a class="btn btn-danger btn-xs" title="Eliminar" onclick="eliminarAlmacen('.$arrData[0][$i]['IdSucursal'].')">
                                					<i data-toggle="tooltip" title="Eiiminar"class="zmdi zmdi-delete zmdi-hc-fw"></i>
                                				</a>';			}

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


			public function getDocumentos()
		{
			
			$output = array();

			$arrData = $this->model->selectDocumentos();
			
			for ($i=0; $i <  count($arrData[0]); $i++) { 
				# code...
				$arrData[0][$i]['orden'] 	= 	$i+1;
				$arrData[0][$i]['Estado'] 	= 	$arrData[0][$i]['Estado'] == 1 ? '<span class="label label-success label-pill m-w-60">ACTIVO</span>' : '<span class="label label-danger label-pill m-w-60">INACTIVO</span>';
				$arrData[0][$i]['opciones'] =	'<a class="btn btn-primary btn-xs" title="Editar" onclick="editarDocumento('.$arrData[0][$i]['IdTipoDocumento'].')">
													<i class="zmdi zmdi-edit zmdi-hc-fw"></i>
												</a>
                                				<a class="btn btn-danger btn-xs" title="Eliminar" onclick="eliminarDocumento('.$arrData[0][$i]['IdTipoDocumento'].')">
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


		public function getProceso()
		{
			
			$output = array();

			$arrData = $this->model->selectProcesos();
			
			for ($i=0; $i <  count($arrData[0]); $i++) { 
				# code...
				$arrData[0][$i]['orden'] 	= 	$i+1;
				$arrData[0][$i]['Estado'] 	= 	$arrData[0][$i]['Estado'] == 1 ? '<span class="label label-success label-pill m-w-60">ACTIVO</span>' : '<span class="label label-danger label-pill m-w-60">INACTIVO</span>';
				$arrData[0][$i]['opciones'] =	'<a class="btn btn-primary btn-xs" title="Editar" onclick="editarProceso('.$arrData[0][$i]['IdProceso'].')">
													<i class="zmdi zmdi-edit zmdi-hc-fw"></i>
												</a>
                                				<a class="btn btn-danger btn-xs" title="Eliminar" onclick="eliminarproceso('.$arrData[0][$i]['IdProceso'].')">
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



			public function getClases()
		{
			
			$output = array();

			$arrData = $this->model->selectClases(); //para que usas el dep ?
			//$filtro = ($_POST["search"]["value"]!= '') ? $arrData[1] : $arrData[2];
			for ($i=0; $i <  count($arrData[0]); $i++) { 
				# code...
				$arrData[0][$i]['orden'] 	= 	$i+1;
				$arrData[0][$i]['Estado'] 	= 	$arrData[0][$i]['Estado'] == 1 ? '<span class="label label-success label-pill m-w-60">ACTIVO</span>' : '<span class="label label-danger label-pill m-w-60">INACTIVO</span>';
				$arrData[0][$i]['opciones'] =	'<a class="btn btn-primary btn-xs" title="Editar" onclick="editarClase('.$arrData[0][$i]['IdClase'].')">
													<i class="zmdi zmdi-edit zmdi-hc-fw"></i>
												</a>
												<a class="btn btn-danger btn-xs" title="Eliminar" onclick="eliminarClase('.$arrData[0][$i]['IdClase'].')">
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

		


			public function getFamilia($idfamilia)
		{

			$intIdFamilia = intval(strClean($idfamilia));

			if ($intIdFamilia > 0) {
				
				$arrData = $this->model->selectFamilia($intIdFamilia);

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

		public function getUma($iduma)
		{

			$intIdUma = intval(strClean($iduma));

			if ($intIdUma > 0) {
				
				$arrData = $this->model->selectUma($intIdUma);

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

			public function getAlmacens($idalmacen)
		{

			$intidalmacen= intval(strClean($idalmacen));

			if ($intidalmacen > 0) {
				
				$arrData = $this->model->selectAlmacen($intidalmacen);

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


		 public function getDocumento($iddocumento)
		{

			$intiddocumento= intval(strClean($iddocumento));

			if ($intiddocumento > 0) {
				
				$arrData = $this->model->selectidDocumento($intiddocumento);

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



		  



			public function getProcesoss($idproceso)
		{	

			$intidproceso = intval(strClean($idproceso));

			if ($intidproceso > 0) {
				
				$arrData = $this->model->selectProceso($intidproceso);

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



		public function getClase($idClase) // muestra en las cajas de texto al momendo de hacer click botton de update
		{

			$intIdClase = intval(strClean($idClase));

			if ($intIdClase > 0) {
				
				$arrData = $this->model->selectClase($intIdClase);

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


		public function delClase($idclase)
		{
				
				$intidclase		= intval(strClean($idclase));
				$requestDelete 	= $this->model->deleteClase($intidclase);


				if ($requestDelete > 0) {
					$arrResponse = 	[
										"status"=> true,
										"title"	=> "Uma",
										"msg" 	=> "Clase Eliminada Correctamente.",
									];

				}else if($requestDelete == 'exist'){
					$arrResponse = 	[
										"status"=> false,
										"title"	=> "Alerta!",
										"msg" 	=> "No se puede eliminar esta Clase, esta asociado a un Movimiento.",
									];
				}else{
					$arrResponse = 	[
										"status"=> false,
										"title"	=> "Error!",
										"msg" 	=> "Error al eliminar la Clase",
									];
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			
				die();
		}


		public function delUma($idUma)
		{
				
				$intidUma		= intval(strClean($idUma));
				$requestDelete 	= $this->model->deleteUma($intidUma);


				if ($requestDelete > 0) {
					$arrResponse = 	[
										"status"=> true,
										"title"	=> "Uma",
										"msg" 	=> "Uma Eliminado Correctamente.",
									];

				}else if($requestDelete == 'exist'){
					$arrResponse = 	[
										"status"=> false,
										"title"	=> "Alerta!",
										"msg" 	=> "No se puede eliminar esta Uma, esta asociado a un Movimiento.",
									];
				}else{
					$arrResponse = 	[
										"status"=> false,
										"title"	=> "Error!",
										"msg" 	=> "Error al eliminar la Uma",
									];
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			
				die();
		}




		public function delProducto($idProducto)
		{
				
				$intidProducto	= intval(strClean($idProducto));
				$requestDelete 	= $this->model->deleteProducto($intidProducto);


				if ($requestDelete > 0) {
					$arrResponse = 	[
										"status"=> true,
										"title"	=> "Producto",
										"msg" 	=> "Producto Eliminado Correctamente.",
									];

				}else if($requestDelete == 'exist'){
					$arrResponse = 	[
										"status"=> false,
										"title"	=> "Alerta!",
										"msg" 	=> "No se puede eliminar este Producto, esta asociado a un Movimiento.",
									];
				}else{
					$arrResponse = 	[
										"status"=> false,
										"title"	=> "Error!",
										"msg" 	=> "Error al eliminar el Producto",
									];
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			
				die();
		}

		public function delProceso($idProceso)
		{
				
				$intIdProceso 	= intval(strClean($idProceso));
				$requestDelete 	= $this->model->deleteProceso($intIdProceso);


				if ($requestDelete > 0) {
					$arrResponse = 	[
										"status"=> true,
										"title"	=> "Proceso",
										"msg" 	=> "Proceso Eliminado Correctamente.",
									];

				}else if($requestDelete == 'existss'){
					$arrResponse = 	[
										"status"=> false,
										"title"	=> "Alerta!",
										"msg" 	=> "No se puede eliminar este Proceso, esta asociado a un Movimiento.",
									];
				}else{
					$arrResponse = 	[
										"status"=> false,
										"title"	=> "Error!",
										"msg" 	=> "Error al eliminar el Proceso",
									];
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			
				die();
		}



		public function delFamilia($idFamilia)
		{
				// id a eliminar 
				$intIdFamilia 	= intval(strClean($idFamilia));
				$requestDelete 	= $this->model->deleteFamilia($intIdFamilia);

				if ($requestDelete > 0) {
					$arrResponse = 	[
										"status"=> true,
										"title"	=> "Familia",
										"msg" 	=> "Familia Eliminado Correctamente.",
									];

				}else if($requestDelete == 'existss'){
					$arrResponse = 	[
										"status"=> false,
										"title"	=> "Alerta!",
										"msg" 	=> "No se puede eliminar este Familia, esta asociado a un Movimiento.",
									];
				}else{
					$arrResponse = 	[
										"status"=> false,
										"title"	=> "Error!",
										"msg" 	=> "Error al eliminar el Familia",
									];
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			
				die();
		}


		public function delLote($idLote)
		{
				// id a eliminar 
				$intIdLote	= intval(strClean($idLote));
				$requestDelete 	= $this->model->deleteLote($intIdLote);

				if ($requestDelete > 0) {
					$arrResponse = 	[
										"status"=> true,
										"title"	=> "Lote",
										"msg" 	=> "Lote Eliminado Correctamente.",
									];

				}else{
					$arrResponse = 	[
										"status"=> false,
										"title"	=> "Error!",
										"msg" 	=> "Error al eliminar la Medida",
									];
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			
				die();
		}





			public function getSelectFamilia()
		{
			$htmlOptions = '<option value="">[ Seleccione Familia ]</option>';
			$arrData = $this->model->selectcboFamilias();
			if(count($arrData) > 0){
				for ($i=0; $i < count($arrData) ; $i++) { 
					$htmlOptions .='<option value="'.$arrData[$i]['IdFamilia'].'"> '.$arrData[$i]['Descripcion'].'</option>';
				}
			}
			echo $htmlOptions;
			die();
		}

			public function getSelectClase()
		{
			$htmlOptions = '<option value="">[ Seleccione Clase ]</option>';
			$arrData = $this->model->selectcboClases();
			if(count($arrData) > 0){
				for ($i=0; $i < count($arrData) ; $i++) { 
					$htmlOptions .='<option value="'.$arrData[$i]['IdClase'].'"> '.$arrData[$i]['Descripcion'].'</option>';
				}
			}
			echo $htmlOptions;
			die();
		}

			public function getSelectUma()
		{
			$htmlOptions = '<option value="">[ Seleccione Uma ]</option>';
			$arrData = $this->model->selectcboUmas();
			if(count($arrData) > 0){
				for ($i=0; $i < count($arrData) ; $i++) { 
					$htmlOptions .='<option value="'.$arrData[$i]['IdUma'].'"> '.$arrData[$i]['Descripcion'].'</option>';
				}
			}
			echo $htmlOptions;
			die();
		}

			public function getSelectConsumo()
		{
			$htmlOptions = '<option value="">[ Seleccione Centro Consumo ]</option>';
			$arrData = $this->model->selectcboConsumo();
			if(count($arrData) > 0){
				for ($i=0; $i < count($arrData) ; $i++) { 
					$htmlOptions .='<option value="'.$arrData[$i]['IdCentroConsumo'].'"> '.$arrData[$i]['Descripcion'].'</option>';
				}
			}
			echo $htmlOptions;
			die();
		}

			public function getSelectCargo()
		{
			$htmlOptions = '<option value="">[ Seleccione Cargo ]</option>';
			$arrData = $this->model->selectcboCargo();
			if(count($arrData) > 0){
				for ($i=0; $i < count($arrData) ; $i++) { 
					$htmlOptions .='<option value="'.$arrData[$i]['id_cargo'].'"> '.$arrData[$i]['cargo'].'</option>';
				}
			}
			echo $htmlOptions;
			die();
		}


			public function getSelectLote()
		{
			$htmlOptions = '<option value="">[ Seleccione el Lote ]</option>';
			$arrData = $this->model->selectcboLote();
			if(count($arrData) > 0){
				for ($i=0; $i < count($arrData) ; $i++) { 
					$htmlOptions .='<option value="'.$arrData[$i]['IdLote'].'"> '.$arrData[$i]['Descripcion'].'</option>';
				}
			}
			echo $htmlOptions;
			die();
		}



			public function getSelectMedida()
		{
			$htmlOptions = '<option value="">[ Seleccione la Medida ]</option>';
			$arrData = $this->model->selectcboMedida();
			if(count($arrData) > 0){
				for ($i=0; $i < count($arrData) ; $i++) { 
					$htmlOptions .='<option value="'.$arrData[$i]['IdMedida'].'"> '.$arrData[$i]['Descripcion'].'</option>';
				}
			}
			echo $htmlOptions;
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
					$intEstado    	= intval($_POST['estado']);
					$intUserSession	= intval(strClean($_SESSION['idUser']));

					
					if($intControl == 0){
						$requestPersonal	= $this->model->insertProducto($intDescripcion,$intCodigo, $intIdClase, $intIdUma,$intUserSession);
					}else{
						if($intControl == 1){
							$requestPersonal	= $this->model->updateProducto($intIdProducto,$intDescripcion,$intCodigo, $intIdClase, $intIdUma,$intEstado,$intUserSession);
						}else{
							$requestPersonal	= $this->model->updateProducto($intIdProducto,$intNumero, $intProyecto, $intLote, $intMedida, $strCaracteristicas,$intPrecioCompra,$intPrecioVenta,$intPrecioInicial,$intUserSession);
						}
					}


					if($requestPersonal != 'exist'){

						if($intControl == 0){
							$arrResponse = 	[
											    "status"=> true,
											    "title"	=> "Registro",
											    "msg" 	=> "Datos Guardados Correctamente.",
											];
						}else{
							$arrResponse = 	[
											    "status"=> true,
											    "title"	=> "PRODUCTO",
											    "msg" 	=> "Datos Actualizados Correctamente.",
											];
						}
					}else if($requestPersonal == 'exist'){
						$arrResponse = 	[
										    "status"=> false,
										    "title"	=> "Alerta!",
										    "msg" 	=> "El CODIGO DEL PRODUCTO O NOMBRE YA SE ENCUENTRA REGISTRADO",
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


		public function setPersonal()
		{
			 //dep($_POST); exit;
			if($_POST){
				if(empty($_POST['Dni'])){
					$arrResponse = 	[
								    	"status"=> false,
								    	"title"	=> "Error!",
								    	"msg" 	=> "Verificar Datos.",
									]; 
				}else{
					$intIdPersonal	= intval(strClean($_POST['IdPersonal']));
					$intControl		= intval(strClean($_POST['ControlPersonal']));
					$intDni 		= intval($_POST['Dni']);
					$StrNombre		= strClean($_POST['Nombre']);
					$intIdConsumo	= intval($_POST['Consumo']);
					$intIdCargo    	= intval($_POST['Cargo']);
					$intEstado		= intval(strClean($_POST['estado']));
					$intUserSession	= intval(strClean($_SESSION['idUser']));

					
					if($intControl == 0){
						$requestPersonal	= $this->model->insertPersonalsalida($intDni,$StrNombre, $intIdConsumo, $intIdCargo,$intUserSession);
					}else{
						if($intControl == 1){
							$requestPersonal	= $this->model->updatePersonalsalida($intIdPersonal,$intDni, $StrNombre, $intIdConsumo,$intIdCargo,$intEstado,$intUserSession);
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

		public function delPersonal($idPersonal)
		{
				// id a eliminar 
				$intidPersonal 	= intval(strClean($idPersonal));
				$requestDelete 	= $this->model->deletePersonal($intidPersonal);

				if ($requestDelete > 0) {
					$arrResponse = 	[
										"status"=> true,
										"title"	=> "Personal",
										"msg" 	=> "Personal Eliminado Correctamente.",
									];

				}else{
					$arrResponse = 	[
										"status"=> false,
										"title"	=> "Error!",
										"msg" 	=> "Error al eliminar el Personal",
									];
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
				$arrData[0][$i]['Estado'] 	= 	$arrData[0][$i]['Estado'] == 1 ? '<span class="label label-success label-pill m-w-60">ACTIVO</span>' : '<span class="label label-danger label-pill m-w-60">INACTIVO</span>';
				$arrData[0][$i]['opciones'] =	'<a class="btn btn-primary btn-xs" title="Editar" onclick="editarProducto('.$arrData[0][$i]['IdProducto'].')"><i class="zmdi zmdi-edit zmdi-hc-fw"></i></a>
				<a class="btn btn-danger btn-xs" title="Eliminar" onclick="eliminarProducto('.$arrData[0][$i]['IdProducto'].')">
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



		public function getPersonals($idPersonal)
		{

			$intIdPersonal = intval(strClean($idPersonal));

			if ($intIdPersonal > 0) {
				
				$arrData = $this->model->selectPersonals($intIdPersonal);

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





	}

?>