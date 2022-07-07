<?php 

	/**
	* 
	*/
	class Dashboard extends Controllers
	{
		
		public function __construct()
		{
			# code...
			session_start();
			if(empty($_SESSION['login'])){
				header('Location: '.base_url().'/login');
				exit;
			}
			parent::__construct();
			
		}

		public function dashboard()
		{

			$data['page_tag']='Inicio';
			$data['page_title']='BIENVENIDO - SISTEMA KARDEX - ONPE';
			$data['page_name']='dashboard';
			$data['page_function_js']='function_dashboard.js';
			$this->views->getView($this,'dashboard',$data);
		}


		public function getGerencias()
		{
			$requestGerencia	= $this->model->selectGerencias();
			//dep($requestGerencia);

			$data='';
			foreach ($requestGerencia as $a) {
					$data .='	<div class="font-14">Registrados <b>' .$a['abreviatura'].'</b> : '.$a['cantidad']. '</div>';
			}	

			$arrResponse = 	[
								    	"status"=> true,
								    	"title"	=> "Control de Acceso!",
								    	"msg" 	=> "Datos por Gerencia.",
								    	"data"	=> $data
									];

			echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
		}


		public function getrequerimientocant()
		{
			$requestUsuarios	= $this->model->selectgetrequerimientocant();
			//dep($requestUsuarios); exit;
			$data='';
			foreach ($requestUsuarios as $a) {
					$data .='	<div class="wt-number">Total de Req = '.$a['cantidad']. ' </div>';
			}	

			$arrResponse = 	[
								    	"status"=> true,
								    	"title"	=> "Control de Acceso!",
								    	"msg" 	=> "Datos por Gerencia.",
								    	"data"	=> $data
									];

			echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
		}

		public function getrequerimientoaten()
		{
			$requestUsuarios	= $this->model->selectgetrequerimientoaten();
			//dep($requestUsuarios); exit;
			$data='';
			foreach ($requestUsuarios as $a) {
					$data .='	<div class="wt-number">Atendidos = '.$a['cantidad']. ' </div>';
			}	

			$arrResponse = 	[
								    	"status"=> true,
								    	"title"	=> "Control de Acceso!",
								    	"msg" 	=> "Datos por Gerencia.",
								    	"data"	=> $data
									];

			echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
		}

		public function getrequerimientopen()
		{
			$requestUsuarios	= $this->model->selectgetrequerimientopen();
			//dep($requestUsuarios); exit;
			$data='';
			foreach ($requestUsuarios as $a) {
					$data .='	<div class="wt-number">Pendientes = '.$a['cantidad']. ' </div>';
			}	

			$arrResponse = 	[
								    	"status"=> true,
								    	"title"	=> "Control de Acceso!",
								    	"msg" 	=> "Datos por Gerencia.",
								    	"data"	=> $data
									];

			echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
		}



		public function getControlIngreso()
		{
			$requestControl	= $this->model->selectControlIngreso();
			//dep($requestControl); exit;
			$data='';
			foreach ($requestControl as $a) {
			
					$dateFormat = "'".$a['fecha_registro']."'";
					$data 	.=	'<tr  class="itemConsulta">
                					<td>'.$a['fecha_registro'].'</td>
                					<td><a href="#" onclick="viewTablaTotaldeIngresos('.$dateFormat.')">'.$a['total'].'</a></td>
 					
                				</tr>';
			}	

			$arrResponse = 	[
								    	"status"=> true,
								    	"title"	=> "Control de Acceso!",
								    	"msg" 	=> "Datos por Gerencia.",
								    	"data"	=> $data
									];

			echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
		}


		public function getControlSalida()
		{
			$requestControl	= $this->model->selectControlSalida();
			//dep($requestControl); exit;
			$data='';
			foreach ($requestControl as $a) {
			
					$dateFormate = "'".$a['fecha_registro']."'";
					$data 	.=	'<tr  class="itemConsultas">
                					<td>'.$a['fecha_registro'].'</td>
                					<td><a href="#" onclick="viewTablaTotaldeSalidas('.$dateFormate.')">'.$a['total'].'</a></td>
 					
                				</tr>';
			}	

			$arrResponse = 	[
								    	"status"=> true,
								    	"title"	=> "Control de Acceso!",
								    	"msg" 	=> "Datos por Gerencia.",
								    	"data"	=> $data
									];

			echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
		}


		public function getControlRequerimiento()
		{
			$requestControl	= $this->model->selectControlRequerimiento();
			//dep($requestControl); exit;
			$data='';
			foreach ($requestControl as $a) {
			
					$dateFormat = "'".$a['fecha_registro']."'";
					$data 	.=	'<tr  class="itemConsulta">
                					<td>'.$a['fecha_registro'].'</td>
                					<td><a href="#" onclick="viewTablaTotaldeRequerimiento('.$dateFormat.')">'.$a['total'].'</a></td>
 					
                				</tr>';
			}	

			$arrResponse = 	[
								    	"status"=> true,
								    	"title"	=> "Control de Acceso!",
								    	"msg" 	=> "Datos por Gerencia.",
								    	"data"	=> $data
									];

			echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
		}


		public function gettabletotalingresosDash()
			{
		
			$output = array();			
			$datefechadesde = strClean($_POST['fechaFormat']);	

			$arrData = $this->model->selecttabletotalingresosDash($datefechadesde);
			
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

		public function gettabletotalsalidasDash()
			{
			
			$output = array();			
			$datefechadesde = strClean($_POST['fechaFormate']);

			$arrData = $this->model->selecttabletotalsalidasDash($datefechadesde);
			
			for ($i=0; $i <  count($arrData); $i++) { 
				# code...
				$arrData[$i]['orden'] 	= 	$i+1;
				$arrData[$i]['Estado'] 	= 	$arrData[$i]['Estado'] == 1 ? '<span class="label label-success label-pill m-w-60">ACTIVO</span>' : '<span class="label label-danger label-pill m-w-60">ANULADO</span>';
				$arrData[$i]['opciones'] =	'<a class="btn btn-primary btn-xs" title="Visualizar Detalle" onclick="VisualizarTablaDetalleIngresos('.$arrData[$i]['IdSalida'].')">
													<i class="zmdi zmdi-eye zmdi-hc-fw"></i>
												</a>
												<a class="btn btn-success btn-xs" title="Imprimir" onclick="pdfsalida('.$arrData[$i]['IdSalida'].')">
                                					<i data-toggle="tooltip" title="Imprimir"class="zmdi zmdi-print zmdi-hc-fw"></i>
                                				</a>
                                				<a class="btn btn-warning	 btn-xs" title="Descargar" onclick="pdfsalida('.$arrData[$i]['IdSalida'].')">
                                					<i data-toggle="tooltip" title="Descargar"class="zmdi zmdi-download zmdi-hc-fw"></i>
                                				</a>
                                				<a class="btn btn-danger btn-xs" title="Eliminar" onclick="Visualizarmodalanular('.$arrData[$i]['IdSalida'].')">
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


		public function gettabletotalrequerimientoscontrolDash()
			{			

			$output = array();			
			$datefechadesde = strClean($_POST['fechaFormate']);

			$arrData = $this->model->selecttabletotalrequerimientoDash($datefechadesde);
			
			for ($i=0; $i <  count($arrData); $i++) { 
				# code...
				$arrData[$i]['orden'] 	= 	$i+1;

				$arrData[$i]['Prioridad'] 	= 	$arrData[$i]['Prioridad'] ;


					switch ($arrData[$i]['Prioridad']) {
							  case '0':
							   $arrData[$i]['Prioridad'] = '<span class="label label-success label-pill m-w-60">BAJA</span>';
							    break;
							  case '1':
							   $arrData[$i]['Prioridad'] = '<span class="label label-warning label-pill m-w-60">MEDIA</span>';
							    break;
							  case '2':
							   $arrData[$i]['Prioridad'] = '<span class="label label-danger label-pill m-w-60">ALTA</span>';
							    break;					  
							
							 
							  default:
							    //Declaraciones ejecutadas cuando ninguno de los valores coincide con el valor de la expresión
							    break;
							};

				$arrData[$i]['Estado'] 	= 	$arrData[$i]['Estado']; 
					switch ($arrData[$i]['Estado']) {
							  case '0':
							   $arrData[$i]['Estado'] = '<span class="label label-danger label-pill m-w-60">ANULADO</span>';
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
							   $arrData[$i]['Estado'] = '<span class="label label-warning label-pill m-w-60">PENDIENTE</span>';
							   $btnextornar='disabled';	
							   $btneliminar = '';
							   $btnextornaronclick = '';
							   $btneliminaronclick ='onclick="eliminarRequerimiento('.$arrData[$i]['IdRequerimiento'].')"';
							   $Ocultar = '';
							   $btnVer = '';
							   $btnimprimir = 'disabled';
							   $btnimprimironclick = '';

							    break;
							  case '2':
							   $arrData[$i]['Estado'] = '<span class="label label-success label-pill m-w-60">APROBADO</span>';
							   $btnextornar='';
							   $btneliminar='disabled';
							   $btnextornaronclick = 'onclick="Visualizarmodalanularreq('.$arrData[$i]['IdRequerimiento'].')"';
							   $btneliminaronclick ='';
							   $Ocultar = '';
							   $btnVer = '';
							   $btnimprimir = '';
							   $btnimprimironclick = 'onclick="pdfCrequerimiento('.$arrData[$i]['IdRequerimiento'].')"';

							    break;	

							  case '3':
							   $arrData[$i]['Estado'] = '<span class="label label-success label-pill m-w-60">DESPACHADO</span>';
							   $btnextornar='disabled';
							   $btneliminar='disabled';
							   $btnextornaronclick = '';
							   $btneliminaronclick ='';
							   $Ocultar = '';
							   $btnVer = '';
							   $btnimprimir = '';
							   $btnimprimironclick = 'onclick="pdfCrequerimiento('.$arrData[$i]['IdRequerimiento'].')"';

							    break;					  

							  case '4':
							   $arrData[$i]['Estado'] = '<span class="label label-danger label-pill m-w-60">EXTORNADO</span>';
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

			


			}

			$output = array(
			
				"data"				=>	$arrData
			);
			echo json_encode($output,JSON_UNESCAPED_UNICODE);
			die();
			// dep($arrData[0][0]['estado']);
		}


		public function getControlDate()
		{
			//dep($_POST); exit;
			
			$output 	= array();
			$strFecha	= strClean($_POST['fecha']);
			$arrData 	= $this->model->selectControlDate($strFecha);
			//dep($arrData); exit;
			//$filtro = ($_POST["search"]["value"]!= '') ? $arrData[1] : $arrData[2];
			for ($i=0; $i <  count($arrData); $i++) { 
				# code...
				$arrData[$i]['orden'] 	= 	$i+1;

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

	}

?>