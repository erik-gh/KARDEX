<?php 

	/**
	* 
	*/
	class General extends Controllers
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

		public function general()
		{

			$data['page_tag']='Configuracion General';
			$data['page_title']='CONFIGURACION GENERAL';
			$data['page_name']='general';
			$data['page_function_js']='function_general.js';
			$this->views->getView($this,'general',$data);
		}



	}

?>