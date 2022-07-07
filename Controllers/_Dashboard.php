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
			}
			parent::__construct();
			
		}

		public function dashboard()
		{

			$data['page_tag']='Inicio';
			$data['page_title']='SISTEMA DE FORMATOS - GGEs';
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


		public function getUsuarios()
		{
			$requestUsuarios	= $this->model->selectUsuarios();
			//dep($requestUsuarios); exit;
			$data='';
			foreach ($requestUsuarios as $a) {
					$data .='	<div class="wt-number">Registrados '.$a['cantidad']. ' </div>';
			}	

			$arrResponse = 	[
								    	"status"=> true,
								    	"title"	=> "Control de Acceso!",
								    	"msg" 	=> "Datos por Gerencia.",
								    	"data"	=> $data
									];

			echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
		}



	}

?>