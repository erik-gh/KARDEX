<?php 

	/**
	* 
	*/
	class Requerimiento extends Controllers
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


		public function requerimiento()
		{

			$data['page_tag']='requerimiento';
			$data['page_title']='GESTION DE REQUERIMIENTOS';
			$data['page_name']='Requerimiento';
			$data['page_function_js']='function_requerimiento.js';
			$this->views->getView($this,'requerimiento',$data);
		}

			public function selectcbolineareque()
		{
			$htmlOptions = '<option value="">[ Seleccione Personal ]</option>';
			$arrData = $this->model->selecttcbolineareque();
			if(count($arrData) > 0){
				for ($i=0; $i < count($arrData) ; $i++) { 
					$htmlOptions .='<option value="'.$arrData[$i]['Nombres'].'"> '.$arrData[$i]['Nombres'].'</option>';
				}
			}
			echo $htmlOptions;
			die();
		}


			public function selectcboturnoreque()
		{
			$htmlOptions = '<option value="">[ Seleccione Personal ]</option>';
			$arrData = $this->model->selecttcboturnoreque();
			if(count($arrData) > 0){
				for ($i=0; $i < count($arrData) ; $i++) { 
					$htmlOptions .='<option value="'.$arrData[$i]['Nombres'].'"> '.$arrData[$i]['Nombres'].'</option>';
				}
			}
			echo $htmlOptions;
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
					$intUserSession	= intval(strClean($_SESSION['idUser']));

					
					if($intControl == 0){
						$requestPersonal	= $this->model->insertAnalistalinea($intDni,$StrNombre, $intIdConsumo,$intUserSession);
					}else{
						
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


			public function setPersonalturno()
		{
			 //dep($_POST); exit;
			if($_POST){
				if(empty($_POST['Dnit'])){
					$arrResponse = 	[
								    	"status"=> false,
								    	"title"	=> "Error!",
								    	"msg" 	=> "Verificar Datos.",
									]; 
				}else{
					$intIdPersonal	= intval(strClean($_POST['IdPersonalt']));
					$intControl		= intval(strClean($_POST['ControlPersonalt']));
					$intDni 		= intval($_POST['Dnit']);
					$StrNombre		= strClean($_POST['Nombret']);
					$intIdConsumo	= intval($_POST['Consumot']);
					$intUserSession	= intval(strClean($_SESSION['idUser']));

					
					if($intControl == 0){
						$requestPersonal	= $this->model->insertAnalistaturno($intDni,$StrNombre, $intIdConsumo,$intUserSession);
					}else{
						
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


		public function getSelectFase()
		{
			$htmlOptions = '<option value="">[ Seleccione Fase ]</option>';
			$arrData = $this->model->selectcboFase();
			if(count($arrData) > 0){
				for ($i=0; $i < count($arrData) ; $i++) { 
					$htmlOptions .='<option value="'.$arrData[$i]['IdFase'].'"> '.$arrData[$i]['Descripcion'].'</option>';
				}
			}
			echo $htmlOptions;
			die();
		}


		public function generarPdfFm04($id){


						
			$IdRequerimiento = intval(strClean($id));
			//$output = array();
			//$arrData = $this->model->selectllenarproducto($IdCompra);

			$requestPdfReq	= $this->model->consultareportecabecerarequerimientos($IdRequerimiento);

			$requestPdfRequerimiento	= $this->model->consultareportedetallerequerimientos($IdRequerimiento);

				
			require('libraries/fpdf/fpdf.php');

			$pdf = new FPDF('P','mm','A4');
			$pdf->AddPage();
			$pdf->setTitle('Guia de Requerimiento');
			
			//$pdf->Cell(float w [, float h [, string txt [, mixed border [, int ln [, string align [, boolean fill [, mixed link]]]]]]]);
			
			$pdf->SetFont('Arial','B',8);
			$pdf->Cell(190,5,'MOVIMIENTO DE MATERIALES, INSUMOS Y HERRAMIENTAS',"T,L,R",1,'C');

			$pdf->SetFont('Arial','B',8);
			$pdf->Cell(190,5,$requestPdfReq['Abreviatura'],"B,L,R",1,'C');	
			
		

			$pdf->SetFont('Arial','B',6);
			$pdf->Cell(25,3,'TURNO:',"L",0,'L');
			$pdf->SetFont('Arial','',6);
			$pdf->Cell(39,3,$requestPdfReq['Turno'],0,0,'L');

			$pdf->SetFont('Arial','B',6);
			$pdf->Cell(15,3,'FECHA:',0,0,'C');
			$pdf->SetFont('Arial','',6);
			$pdf->Cell(35,3,$requestPdfReq['Fecha'],'B',0,'C');

			$pdf->SetFont('Arial','B',6);
			$pdf->Cell(38,3,'FASE:',0,0,'C');

			$pdf->SetFont('Arial','B',6);
			$pdf->Cell(38,3,'TIPO DE MOVIMIENTO:','R',0,'C');			

			$pdf->Ln();

			$pdf->SetFont('Arial','B',6);
			$pdf->Cell(25,4,'N ORDEN:',"L",0,'L');
			$pdf->SetFont('Arial','',6);
			$pdf->Cell(39,4,$requestPdfReq['NroOrden'],0,0,'L');

			$pdf->SetFont('Arial','B',6);
			$pdf->Cell(50,4,'',0,0,'C');
			
			$pdf->SetFont('Arial','',5);
			$pdf->Cell(30,4,$requestPdfReq['fase'],0,0,'C');

			$pdf->SetFont('Arial','',5);
			$pdf->Cell(8,4,'X',1,0,'C');

			$pdf->SetFont('Arial','',5);
			$pdf->Cell(28,4,'REQUERIMIENTO',0,0,'C');

			$pdf->SetFont('Arial','',6);
			$pdf->Cell(8,4,'X',1,0,'C');

			$pdf->SetFont('Arial','',5);
			$pdf->Cell(2,4,'','R',0,'C');

			$pdf->Ln();
			$pdf->SetFont('Arial','B',6);
			$pdf->Cell(25,5,'ACTIVIDAD:',"L",0,'L');
			$pdf->SetFont('Arial','',6);
			$pdf->Cell(89,5,$requestPdfReq['Actividad'],'B',0,'L');

			
			
			$pdf->SetFont('Arial','',5);
			$pdf->Cell(30,5,'',0,0,'C');

			$pdf->SetFont('Arial','',5);
			$pdf->Cell(8,5,'',0,0,'C');

			$pdf->SetFont('Arial','',5);
			$pdf->Cell(28,5,'',0,0,'C');

			$pdf->SetFont('Arial','',5);
			$pdf->Cell(8,5,'',0,0,'C');

			$pdf->SetFont('Arial','',5);
			$pdf->Cell(2,5,'','R',0,'C');


			$pdf->Ln();

			$pdf->SetFont('Arial','B',6);
			$pdf->Cell(25,4,'CANTIDAD:',"L",0,'L');
			$pdf->SetFont('Arial','',6);
			$pdf->Cell(89,4,$requestPdfReq['Cantidad'],0,0,'L');

			
			
			$pdf->SetFont('Arial','',5);
			$pdf->Cell(30,4,'',0,0,'C');

			$pdf->SetFont('Arial','',5);
			$pdf->Cell(8,4,'',0,0,'C');

			$pdf->SetFont('Arial','',5);
			$pdf->Cell(28,4,'',0,0,'C');

			$pdf->SetFont('Arial','',5);
			$pdf->Cell(8,4,'',0,0,'C');

			$pdf->SetFont('Arial','',5);
			$pdf->Cell(2,4,'','R',0,'C');		

			$pdf->Ln();


			$pdf->SetFont('Arial','B',6);
			$pdf->Cell(50,3,'FECHA DE INICIO DE LA ACTIVIDAD:',"L",0,'L');
			$pdf->SetFont('Arial','',6);
			$pdf->Cell(64,3,$requestPdfReq['FechaActividad'],0,0,'L');

			
			
			$pdf->SetFont('Arial','',5);
			$pdf->Cell(30,3,'',0,0,'C');

			$pdf->SetFont('Arial','',5);
			$pdf->Cell(8,3,'',0,0,'C');

			$pdf->SetFont('Arial','',5);
			$pdf->Cell(28,3,'',0,0,'C');

			$pdf->SetFont('Arial','',5);
			$pdf->Cell(8,3,'',0,0,'C');

			$pdf->SetFont('Arial','',5);
			$pdf->Cell(2,3,'','R',0,'C');


			$pdf->Ln();


			$pdf->SetFont('Arial','B',6);
			$pdf->Cell(50,3,'HORA DE INICIO DE LA ACTIVIDAD:',"L",0,'L');
			$pdf->SetFont('Arial','',6);
			$pdf->Cell(64,3,'08:30 hrs',0,0,'L');

			
			
			$pdf->SetFont('Arial','',5);
			$pdf->Cell(30,3,'',0,0,'C');

			$pdf->SetFont('Arial','',5);
			$pdf->Cell(8,3,'',0,0,'C');

			$pdf->SetFont('Arial','',5);
			$pdf->Cell(28,3,'',0,0,'C');

			$pdf->SetFont('Arial','',5);
			$pdf->Cell(8,3,'',0,0,'C');
			$pdf->SetFont('Arial','',5);
			$pdf->Cell(2,3,'','R',0,'C');


			$pdf->Ln();


			$pdf->SetFont('Arial','B',6);
			$pdf->Cell(114,3,'',"L",0,'L');
			
			$pdf->SetFont('Arial','',5);
			$pdf->Cell(30,3,'',0,0,'C');

			$pdf->SetFont('Arial','',5);
			$pdf->Cell(8,3,'',0,0,'C');

			$pdf->SetFont('Arial','',5);
			$pdf->Cell(28,3,'',0,0,'C');

			$pdf->SetFont('Arial','',5);
			$pdf->Cell(8,3,'',0,0,'C');

			$pdf->SetFont('Arial','',5);
			$pdf->Cell(2,3,'','R',0,'C');

			$pdf->Ln();

			$pdf->SetFont('Arial','B',6);
			$pdf->Cell(114,3,'',"L",0,'L');
			
			$pdf->SetFont('Arial','',5);
			$pdf->Cell(30,3,'',0,0,'C');

			$pdf->SetFont('Arial','',5);
			$pdf->Cell(8,3,'',0,0,'C');

			$pdf->SetFont('Arial','',5);
			$pdf->Cell(30,3,'',0,0,'C');

			$pdf->SetFont('Arial','',5);
			$pdf->Cell(8,3,'','R',0,'C');

			$pdf->Ln();

			$pdf->SetFont('Arial','B',6);
			$pdf->Cell(114,3,'',"L",0,'L');
			
			$pdf->SetFont('Arial','',5);
			$pdf->Cell(30,3,'',0,0,'C');

			$pdf->SetFont('Arial','',5);
			$pdf->Cell(8,3,'',0,0,'C');

			$pdf->SetFont('Arial','',5);
			$pdf->Cell(30,3,'',0,0,'C');

			$pdf->SetFont('Arial','',5);
			$pdf->Cell(8,3,'','R',0,'C');

			$pdf->Ln();

			$pdf->SetFont('Arial','B',6);
			$pdf->Cell(25,4,'OBSERVACIONES:',"L",0,'L');
			$pdf->SetFont('Arial','',6);
			$pdf->Cell(89,4,$requestPdfReq['Observaciones'],"B",0,'L');

			
			
			$pdf->SetFont('Arial','',5);
			$pdf->Cell(30,4,'',0,0,'C');

			$pdf->SetFont('Arial','',5);
			$pdf->Cell(8,4,'',0,0,'C');

			$pdf->SetFont('Arial','',5);
			$pdf->Cell(30,4,'',0,0,'C');

			$pdf->SetFont('Arial','',5);
			$pdf->Cell(8,4,'','R',0,'C');

			$pdf->Ln();

			$pdf->SetFont('Arial','B',6);
			$pdf->Cell(114,3,'',"L",0,'L');
			
			$pdf->SetFont('Arial','',5);
			$pdf->Cell(30,3,'',0,0,'C');

			$pdf->SetFont('Arial','',5);
			$pdf->Cell(8,3,'',0,0,'C');

			$pdf->SetFont('Arial','',5);
			$pdf->Cell(30,3,'',0,0,'C');

			$pdf->SetFont('Arial','',5);
			$pdf->Cell(8,3,'','R',0,'C');

			$pdf->Ln();

			$pdf->SetFont('Arial','B',6);
			$pdf->Cell(114,3,'',"L",0,'L');
			
			$pdf->SetFont('Arial','',5);
			$pdf->Cell(30,3,'',0,0,'C');

			$pdf->SetFont('Arial','',5);
			$pdf->Cell(8,3,'',0,0,'C');

			$pdf->SetFont('Arial','',5);
			$pdf->Cell(30,3,'',0,0,'C');

			$pdf->SetFont('Arial','',5);
			$pdf->Cell(8,3,'','R',0,'C');

			$pdf->Ln();

			$pdf->SetFont('Arial','B',6);
			$pdf->Cell(114,3,'',"L,B",0,'L');
			
			$pdf->SetFont('Arial','',5);
			$pdf->Cell(30,3,'',"B",0,'C');

			$pdf->SetFont('Arial','',5);
			$pdf->Cell(8,3,'',"B",0,'C');

			$pdf->SetFont('Arial','',5);
			$pdf->Cell(30,3,'',"B",0,'C');

			$pdf->SetFont('Arial','',5);
			$pdf->Cell(8,3,'',"B,R",0,'C');

			$pdf->Ln();

			$pdf->SetFont('Arial','B',6);
			$pdf->Cell(6,5,'Item',"1",0,'C');
			$pdf->Cell(94,5,'DESCRIPCION',1,0,'C');
			$pdf->Cell(8,5,'COD',"1",0,'C');
			$pdf->Cell(17,5,'Un.Medida:',1,0,'C');
			$pdf->Cell(21,5,'Cantidad',1,0,'C');
			$pdf->Cell(18,5,'Cant. Atendida',1,0,'C');
			$pdf->Cell(26,5,'Observaciones',1,0,'C');


			$pdf->Ln();

			
			$cont = 0;

			foreach ($requestPdfRequerimiento as $row) {

						
				$pdf->SetFont('Arial','',6);				
				$pdf->Cell(6,4,++$cont,1,0,'C',0);
				$pdf->Cell(94,4, utf8_decode($row['Descripcion']),1,0,'C',0);
				$pdf->Cell(8,4, utf8_decode($row['CodProducto']),1,0,'C',0);
				$pdf->Cell(17,4, utf8_decode($row['uma']),1,0,'C',0);
				$pdf->Cell(21,4, $row['Cantidad'],1,0,'C',0);
				$pdf->Cell(18,4,'',1,0,'C',0);
				$pdf->Cell(26,4,'',1,1,'C',0);
				
				
			}

		


					$pdf->SetY(-42);
				    
				    $pdf->SetFont('Arial','B',6);
					$pdf->Cell(7,3,'','T,L',0,'C');

					$pdf->SetFont('Arial','B',6);
					$pdf->Cell(25,3,'','T',0,'C');

					$pdf->SetFont('Arial','B',6);
					$pdf->Cell(48,3,'Asistente de Linea 4','T',0,'C');

					$pdf->SetFont('Arial','B',6);
					$pdf->Cell(2,3,'','T',0,'C');

					$pdf->SetFont('Arial','B',6);
					$pdf->Cell(47,3,'Analista de Turno 1','T',0,'C');

					$pdf->SetFont('Arial','B',6);
					$pdf->Cell(22,3,'','T',0,'C');

					$pdf->SetFont('Arial','B',6);
					$pdf->Cell(32,3,'Almacen','T',0,'C');

					$pdf->SetFont('Arial','B',6);
					$pdf->Cell(7,3,'','T,R',0,'C');			

					$pdf->Ln();	

					$pdf->SetFont('Arial','B',6);
					$pdf->Cell(7,3,'','L',0,'C');

					$pdf->SetFont('Arial','B',6);
					$pdf->Cell(25,3,'Nombre:',0,0,'C');

					$pdf->SetFont('Arial','B',6);
					$pdf->Cell(48,3,utf8_decode($requestPdfReq['Alinea']),'B',0,'C');

					$pdf->SetFont('Arial','B',6);
					$pdf->Cell(2,3,'',0,0,'C');

					$pdf->SetFont('Arial','B',6);
					$pdf->Cell(47,3,utf8_decode($requestPdfReq['Aturno']),'B',0,'C');

					$pdf->SetFont('Arial','B',6);
					$pdf->Cell(22,3,'Guia N:',0,0,'R');

					$pdf->SetFont('Arial','B',6);
					$pdf->Cell(32,3,'','B',0,'C');

					$pdf->SetFont('Arial','B',6);
					$pdf->Cell(7,3,'','R',0,'C');			

					$pdf->Ln();	

					$pdf->SetFont('Arial','B',6);
					$pdf->Cell(7,3,'','L',0,'C');

					$pdf->SetFont('Arial','B',6);
					$pdf->Cell(25,3,'',0,0,'C');

					$pdf->SetFont('Arial','B',6);
					$pdf->Cell(48,3,'',0,0,'C');

					$pdf->SetFont('Arial','B',6);
					$pdf->Cell(2,3,'',0,0,'C');

					$pdf->SetFont('Arial','B',6);
					$pdf->Cell(47,3,'',0,0,'C');

					$pdf->SetFont('Arial','B',6);
					$pdf->Cell(22,3,'Nombre:',0,0,'R');

					$pdf->SetFont('Arial','B',6);
					$pdf->Cell(32,3,'','B',0,'C');

					$pdf->SetFont('Arial','B',6);
					$pdf->Cell(7,3,'','R',0,'C');			

					$pdf->Ln();		

					$pdf->SetFont('Arial','B',6);
					$pdf->Cell(7,3,'','L',0,'C');

					$pdf->SetFont('Arial','B',6);
					$pdf->Cell(25,3,'Firma:',0,0,'C');

					$pdf->SetFont('Arial','B',6);
					$pdf->Cell(48,3,'','B',0,'C');

					$pdf->SetFont('Arial','B',6);
					$pdf->Cell(2,3,'',0,0,'C');

					$pdf->SetFont('Arial','B',6);
					$pdf->Cell(47,3,'','B',0,'C');

					$pdf->SetFont('Arial','B',6);
					$pdf->Cell(22,3,'V.B:',0,0,'R');

					$pdf->SetFont('Arial','B',6);
					$pdf->Cell(32,3,'','B',0,'C');

					$pdf->SetFont('Arial','B',6);
					$pdf->Cell(7,3,'','R',0,'C');			

					$pdf->Ln();	

					$pdf->SetFont('Arial','B',6);
					$pdf->Cell(7,3,'','L,B',0,'C');

					$pdf->SetFont('Arial','B',6);
					$pdf->Cell(25,3,'','B',0,'C');

					$pdf->SetFont('Arial','B',6);
					$pdf->Cell(48,3,'','B',0,'C');

					$pdf->SetFont('Arial','B',6);
					$pdf->Cell(2,3,'','B',0,'C');

					$pdf->SetFont('Arial','B',6);
					$pdf->Cell(47,3,'','B',0,'C');

					$pdf->SetFont('Arial','B',6);
					$pdf->Cell(22,3,'','B',0,'R');

					$pdf->SetFont('Arial','B',6);
					$pdf->Cell(32,3,'','B',0,'C');

					$pdf->SetFont('Arial','B',6);
					$pdf->Cell(7,3,'','R,B',0,'C');			

					$pdf->Ln();	
					$pdf->SetFont('Arial','',6);
					$pdf->Cell(40,3,'FM04-GGE/EMS',0,0,'L');

					$pdf->Ln();	
					$pdf->SetFont('Arial','',6);
					$pdf->Cell(40,3,'Version:00',0,0,'L');


				  				
				  


				    //$pdf->Cell(0,10,'Page '.$pdf->PageNo().'/{nb}',0,0,'C');



		
		
			$pdf->Output();
			

		}	


		public function generarPdfFormato($id){


						
			$IdFormato = intval(strClean($id));
			//$output = array();
			//$arrData = $this->model->selectllenarproducto($IdCompra);

			$requestPdfReq	= $this->model->consultareportecabeceraformato($IdFormato);

			$requestPdfRequerimiento	= $this->model->consultareportedetalleformato($IdFormato);

				
			require('libraries/fpdf/fpdf.php');

			$pdf = new FPDF('P','mm','A4');
			$pdf->AddPage();
			$pdf->setTitle('Guia de Requerimiento');
			
			//$pdf->Cell(float w [, float h [, string txt [, mixed border [, int ln [, string align [, boolean fill [, mixed link]]]]]]]);
			
			$pdf->SetFont('Arial','B',8);
			$pdf->Cell(190,5,'MOVIMIENTO DE MATERIALES, INSUMOS Y HERRAMIENTAS',"T,L,R",1,'C');

			$pdf->SetFont('Arial','B',8);
			$pdf->Cell(190,5,$requestPdfReq['Abreviatura'],"B,L,R",1,'C');	
			
		

			$pdf->SetFont('Arial','B',6);
			$pdf->Cell(25,3,'TURNO:',"L",0,'L');
			$pdf->SetFont('Arial','',6);
			$pdf->Cell(39,3,$requestPdfReq['Turno'],0,0,'L');

			$pdf->SetFont('Arial','B',6);
			$pdf->Cell(15,3,'FECHA:',0,0,'C');
			$pdf->SetFont('Arial','',6);
			$pdf->Cell(35,3,$requestPdfReq['Fecha'],'B',0,'C');

			$pdf->SetFont('Arial','B',6);
			$pdf->Cell(38,3,'FASE:',0,0,'C');

			$pdf->SetFont('Arial','B',6);
			$pdf->Cell(38,3,'TIPO DE MOVIMIENTO:','R',0,'C');			

			$pdf->Ln();

			$pdf->SetFont('Arial','B',6);
			$pdf->Cell(25,4,'N ORDEN:',"L",0,'L');
			$pdf->SetFont('Arial','',6);
			$pdf->Cell(39,4,$requestPdfReq['NroOrden'],0,0,'L');

			$pdf->SetFont('Arial','B',6);
			$pdf->Cell(50,4,'',0,0,'C');
			
			$pdf->SetFont('Arial','',5);
			$pdf->Cell(30,4,$requestPdfReq['fase'],0,0,'C');

			$pdf->SetFont('Arial','',5);
			$pdf->Cell(8,4,'X',1,0,'C');

			$pdf->SetFont('Arial','',5);
			$pdf->Cell(28,4,'REQUERIMIENTO',0,0,'C');

			$pdf->SetFont('Arial','',6);
			$pdf->Cell(8,4,'X',1,0,'C');

			$pdf->SetFont('Arial','',5);
			$pdf->Cell(2,4,'','R',0,'C');

			$pdf->Ln();
			$pdf->SetFont('Arial','B',6);
			$pdf->Cell(25,5,'ACTIVIDAD:',"L",0,'L');
			$pdf->SetFont('Arial','',6);
			$pdf->Cell(89,5,$requestPdfReq['Actividad'],'B',0,'L');

			
			
			$pdf->SetFont('Arial','',5);
			$pdf->Cell(30,5,'',0,0,'C');

			$pdf->SetFont('Arial','',5);
			$pdf->Cell(8,5,'',0,0,'C');

			$pdf->SetFont('Arial','',5);
			$pdf->Cell(28,5,'',0,0,'C');

			$pdf->SetFont('Arial','',5);
			$pdf->Cell(8,5,'',0,0,'C');

			$pdf->SetFont('Arial','',5);
			$pdf->Cell(2,5,'','R',0,'C');


			$pdf->Ln();

			$pdf->SetFont('Arial','B',6);
			$pdf->Cell(25,4,'CANTIDAD:',"L",0,'L');
			$pdf->SetFont('Arial','',6);
			$pdf->Cell(89,4,$requestPdfReq['Cantidad'],0,0,'L');

			
			
			$pdf->SetFont('Arial','',5);
			$pdf->Cell(30,4,'',0,0,'C');

			$pdf->SetFont('Arial','',5);
			$pdf->Cell(8,4,'',0,0,'C');

			$pdf->SetFont('Arial','',5);
			$pdf->Cell(28,4,'',0,0,'C');

			$pdf->SetFont('Arial','',5);
			$pdf->Cell(8,4,'',0,0,'C');

			$pdf->SetFont('Arial','',5);
			$pdf->Cell(2,4,'','R',0,'C');		

			$pdf->Ln();


			$pdf->SetFont('Arial','B',6);
			$pdf->Cell(50,3,'FECHA DE INICIO DE LA ACTIVIDAD:',"L",0,'L');
			$pdf->SetFont('Arial','',6);
			$pdf->Cell(64,3,$requestPdfReq['FechaActividad'],0,0,'L');

			
			
			$pdf->SetFont('Arial','',5);
			$pdf->Cell(30,3,'',0,0,'C');

			$pdf->SetFont('Arial','',5);
			$pdf->Cell(8,3,'',0,0,'C');

			$pdf->SetFont('Arial','',5);
			$pdf->Cell(28,3,'',0,0,'C');

			$pdf->SetFont('Arial','',5);
			$pdf->Cell(8,3,'',0,0,'C');

			$pdf->SetFont('Arial','',5);
			$pdf->Cell(2,3,'','R',0,'C');


			$pdf->Ln();


			$pdf->SetFont('Arial','B',6);
			$pdf->Cell(50,3,'HORA DE INICIO DE LA ACTIVIDAD:',"L",0,'L');
			$pdf->SetFont('Arial','',6);
			$pdf->Cell(64,3,'08:30 hrs',0,0,'L');

			
			
			$pdf->SetFont('Arial','',5);
			$pdf->Cell(30,3,'',0,0,'C');

			$pdf->SetFont('Arial','',5);
			$pdf->Cell(8,3,'',0,0,'C');

			$pdf->SetFont('Arial','',5);
			$pdf->Cell(28,3,'',0,0,'C');

			$pdf->SetFont('Arial','',5);
			$pdf->Cell(8,3,'',0,0,'C');
			$pdf->SetFont('Arial','',5);
			$pdf->Cell(2,3,'','R',0,'C');


			$pdf->Ln();


			$pdf->SetFont('Arial','B',6);
			$pdf->Cell(114,3,'',"L",0,'L');
			
			$pdf->SetFont('Arial','',5);
			$pdf->Cell(30,3,'',0,0,'C');

			$pdf->SetFont('Arial','',5);
			$pdf->Cell(8,3,'',0,0,'C');

			$pdf->SetFont('Arial','',5);
			$pdf->Cell(28,3,'',0,0,'C');

			$pdf->SetFont('Arial','',5);
			$pdf->Cell(8,3,'',0,0,'C');

			$pdf->SetFont('Arial','',5);
			$pdf->Cell(2,3,'','R',0,'C');

			$pdf->Ln();

			$pdf->SetFont('Arial','B',6);
			$pdf->Cell(114,3,'',"L",0,'L');
			
			$pdf->SetFont('Arial','',5);
			$pdf->Cell(30,3,'',0,0,'C');

			$pdf->SetFont('Arial','',5);
			$pdf->Cell(8,3,'',0,0,'C');

			$pdf->SetFont('Arial','',5);
			$pdf->Cell(30,3,'',0,0,'C');

			$pdf->SetFont('Arial','',5);
			$pdf->Cell(8,3,'','R',0,'C');

			$pdf->Ln();

			$pdf->SetFont('Arial','B',6);
			$pdf->Cell(114,3,'',"L",0,'L');
			
			$pdf->SetFont('Arial','',5);
			$pdf->Cell(30,3,'',0,0,'C');

			$pdf->SetFont('Arial','',5);
			$pdf->Cell(8,3,'',0,0,'C');

			$pdf->SetFont('Arial','',5);
			$pdf->Cell(30,3,'',0,0,'C');

			$pdf->SetFont('Arial','',5);
			$pdf->Cell(8,3,'','R',0,'C');

			$pdf->Ln();

			$pdf->SetFont('Arial','B',6);
			$pdf->Cell(25,4,'OBSERVACIONES:',"L",0,'L');
			$pdf->SetFont('Arial','',6);
			$pdf->Cell(89,4,$requestPdfReq['Observaciones'],"B",0,'L');

			
			
			$pdf->SetFont('Arial','',5);
			$pdf->Cell(30,4,'',0,0,'C');

			$pdf->SetFont('Arial','',5);
			$pdf->Cell(8,4,'',0,0,'C');

			$pdf->SetFont('Arial','',5);
			$pdf->Cell(30,4,'',0,0,'C');

			$pdf->SetFont('Arial','',5);
			$pdf->Cell(8,4,'','R',0,'C');

			$pdf->Ln();

			$pdf->SetFont('Arial','B',6);
			$pdf->Cell(114,3,'',"L",0,'L');
			
			$pdf->SetFont('Arial','',5);
			$pdf->Cell(30,3,'',0,0,'C');

			$pdf->SetFont('Arial','',5);
			$pdf->Cell(8,3,'',0,0,'C');

			$pdf->SetFont('Arial','',5);
			$pdf->Cell(30,3,'',0,0,'C');

			$pdf->SetFont('Arial','',5);
			$pdf->Cell(8,3,'','R',0,'C');

			$pdf->Ln();

			$pdf->SetFont('Arial','B',6);
			$pdf->Cell(114,3,'',"L",0,'L');
			
			$pdf->SetFont('Arial','',5);
			$pdf->Cell(30,3,'',0,0,'C');

			$pdf->SetFont('Arial','',5);
			$pdf->Cell(8,3,'',0,0,'C');

			$pdf->SetFont('Arial','',5);
			$pdf->Cell(30,3,'',0,0,'C');

			$pdf->SetFont('Arial','',5);
			$pdf->Cell(8,3,'','R',0,'C');

			$pdf->Ln();

			$pdf->SetFont('Arial','B',6);
			$pdf->Cell(114,3,'',"L,B",0,'L');
			
			$pdf->SetFont('Arial','',5);
			$pdf->Cell(30,3,'',"B",0,'C');

			$pdf->SetFont('Arial','',5);
			$pdf->Cell(8,3,'',"B",0,'C');

			$pdf->SetFont('Arial','',5);
			$pdf->Cell(30,3,'',"B",0,'C');

			$pdf->SetFont('Arial','',5);
			$pdf->Cell(8,3,'',"B,R",0,'C');

			$pdf->Ln();

			$pdf->SetFont('Arial','B',6);
			$pdf->Cell(5,5,'COD',"1",0,'C');
			$pdf->SetFont('Arial','B',6);
			$pdf->Cell(90,5,'DESCRIPCION',1,0,'C');

			$pdf->SetFont('Arial','B',6);
			$pdf->Cell(18,5,'Un.Medida:',1,0,'C');
			$pdf->SetFont('Arial','B',6);
			$pdf->Cell(21,5,'Cantidad',1,0,'C');

			$pdf->SetFont('Arial','B',6);
			$pdf->Cell(21,5,'Cantidad Atendida',1,0,'C');

			$pdf->SetFont('Arial','B',6);
			$pdf->Cell(35,5,'Observaciones',1,0,'C');


			$pdf->Ln();

			

			foreach ($requestPdfRequerimiento as $row) {

						
				$pdf->SetFont('Arial','',6);
				$pdf->Cell(5,4, utf8_decode($row['CodProducto']),1,0,'C',0);
				$pdf->Cell(90,4, utf8_decode($row['Descripcion']),1,0,'C',0);
				$pdf->Cell(18,4, utf8_decode($row['uma']),1,0,'C',0);
				$pdf->Cell(21,4, $row['Cantidad'],1,0,'C',0);
				$pdf->Cell(21,4,'',1,0,'C',0);
				$pdf->Cell(35,4,'',1,1,'C',0);
				
				
			}

		


					$pdf->SetY(-42);
				    
				    $pdf->SetFont('Arial','B',6);
					$pdf->Cell(7,3,'','T,L',0,'C');

					$pdf->SetFont('Arial','B',6);
					$pdf->Cell(25,3,'','T',0,'C');

					$pdf->SetFont('Arial','B',6);
					$pdf->Cell(48,3,'Asistente de Linea 4','T',0,'C');

					$pdf->SetFont('Arial','B',6);
					$pdf->Cell(2,3,'','T',0,'C');

					$pdf->SetFont('Arial','B',6);
					$pdf->Cell(47,3,'Analista de Turno 1','T',0,'C');

					$pdf->SetFont('Arial','B',6);
					$pdf->Cell(22,3,'','T',0,'C');

					$pdf->SetFont('Arial','B',6);
					$pdf->Cell(32,3,'Almacen','T',0,'C');

					$pdf->SetFont('Arial','B',6);
					$pdf->Cell(7,3,'','T,R',0,'C');			

					$pdf->Ln();	

					$pdf->SetFont('Arial','B',6);
					$pdf->Cell(7,3,'','L',0,'C');

					$pdf->SetFont('Arial','B',6);
					$pdf->Cell(25,3,'Nombre:',0,0,'C');

					$pdf->SetFont('Arial','B',6);
					$pdf->Cell(48,3,utf8_decode($requestPdfReq['Alinea']),'B',0,'C');

					$pdf->SetFont('Arial','B',6);
					$pdf->Cell(2,3,'',0,0,'C');

					$pdf->SetFont('Arial','B',6);
					$pdf->Cell(47,3,utf8_decode($requestPdfReq['Aturno']),'B',0,'C');

					$pdf->SetFont('Arial','B',6);
					$pdf->Cell(22,3,'Guia N:',0,0,'R');

					$pdf->SetFont('Arial','B',6);
					$pdf->Cell(32,3,'','B',0,'C');

					$pdf->SetFont('Arial','B',6);
					$pdf->Cell(7,3,'','R',0,'C');			

					$pdf->Ln();	

					$pdf->SetFont('Arial','B',6);
					$pdf->Cell(7,3,'','L',0,'C');

					$pdf->SetFont('Arial','B',6);
					$pdf->Cell(25,3,'',0,0,'C');

					$pdf->SetFont('Arial','B',6);
					$pdf->Cell(48,3,'',0,0,'C');

					$pdf->SetFont('Arial','B',6);
					$pdf->Cell(2,3,'',0,0,'C');

					$pdf->SetFont('Arial','B',6);
					$pdf->Cell(47,3,'',0,0,'C');

					$pdf->SetFont('Arial','B',6);
					$pdf->Cell(22,3,'Nombre:',0,0,'R');

					$pdf->SetFont('Arial','B',6);
					$pdf->Cell(32,3,'','B',0,'C');

					$pdf->SetFont('Arial','B',6);
					$pdf->Cell(7,3,'','R',0,'C');			

					$pdf->Ln();		

					$pdf->SetFont('Arial','B',6);
					$pdf->Cell(7,3,'','L',0,'C');

					$pdf->SetFont('Arial','B',6);
					$pdf->Cell(25,3,'Firma:',0,0,'C');

					$pdf->SetFont('Arial','B',6);
					$pdf->Cell(48,3,'','B',0,'C');

					$pdf->SetFont('Arial','B',6);
					$pdf->Cell(2,3,'',0,0,'C');

					$pdf->SetFont('Arial','B',6);
					$pdf->Cell(47,3,'','B',0,'C');

					$pdf->SetFont('Arial','B',6);
					$pdf->Cell(22,3,'V.B:',0,0,'R');

					$pdf->SetFont('Arial','B',6);
					$pdf->Cell(32,3,'','B',0,'C');

					$pdf->SetFont('Arial','B',6);
					$pdf->Cell(7,3,'','R',0,'C');			

					$pdf->Ln();	

					$pdf->SetFont('Arial','B',6);
					$pdf->Cell(7,3,'','L,B',0,'C');

					$pdf->SetFont('Arial','B',6);
					$pdf->Cell(25,3,'','B',0,'C');

					$pdf->SetFont('Arial','B',6);
					$pdf->Cell(48,3,'','B',0,'C');

					$pdf->SetFont('Arial','B',6);
					$pdf->Cell(2,3,'','B',0,'C');

					$pdf->SetFont('Arial','B',6);
					$pdf->Cell(47,3,'','B',0,'C');

					$pdf->SetFont('Arial','B',6);
					$pdf->Cell(22,3,'','B',0,'R');

					$pdf->SetFont('Arial','B',6);
					$pdf->Cell(32,3,'','B',0,'C');

					$pdf->SetFont('Arial','B',6);
					$pdf->Cell(7,3,'','R,B',0,'C');			

					$pdf->Ln();	
					$pdf->SetFont('Arial','',6);
					$pdf->Cell(40,3,'FM04-GGE/EMS',0,0,'L');

					$pdf->Ln();	
					$pdf->SetFont('Arial','',6);
					$pdf->Cell(40,3,'Version:00',0,0,'L');


				  				
				  


				    //$pdf->Cell(0,10,'Page '.$pdf->PageNo().'/{nb}',0,0,'C');



		
		
			$pdf->Output();
			

		}







		
			



		public function gettabledetallerequerimiento($idrequerimiento)

			{

				$intIdRequerimiento = intval(strClean($idrequerimiento));
			
			$output = array();

			$arrData = $this->model->selecttabledetallerequerimiento($intIdRequerimiento);
			
			for ($i=0; $i <  count($arrData[0]); $i++) { 
				# code...
				$arrData[0][$i]['orden'] 	= 	$i+1;
				

				$arrData[0][$i]['Estado'] 	= 	$arrData[0][$i]['Estado'] ;


					switch ($arrData[0][$i]['Estado']) {
							  case '0':
							   $arrData[0][$i]['Estado'] = '<span class="label label-danger label-pill m-w-60">ANULADO</span>';
							    break;
							  case '1':
							   $arrData[0][$i]['Estado'] = '<span class="label label-warning label-pill m-w-60">PENDIENTE</span>';
							    break;
							  case '2':
							   $arrData[0][$i]['Estado'] = '<span class="label label-success label-pill m-w-60">APROBADO</span>';
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
							};



				
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


			public function gettabledetalleformato($idformato)

			{

				$intidformato = intval(strClean($idformato));
			
			$output = array();

			$arrData = $this->model->selecttabledetalleformato($intidformato);
			
			for ($i=0; $i <  count($arrData[0]); $i++) { 
				# code...
				$arrData[0][$i]['orden'] 	= 	$i+1;
				$arrData[0][$i]['Estado'] 	= 	$arrData[0][$i]['Estado'] == 2 ? '<span class="label label-success label-pill m-w-60">PROCESADO</span>' : '<span class="label label-danger label-pill m-w-60">PENDIENTE</span>';
				$arrData[0][$i]['opciones'] =	'<a class="btn btn-danger btn-xs" title="Eliminar Producto" onclick="botondetabladetalle('.$arrData[0][$i]['IdFormato'].')">
													<i class="zmdi zmdi-close zmdi-hc-fw"></i>
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


		public function gettabletotalrequerimientos()
			{

			$intUserSession			= intval(strClean($_SESSION['idUser']));

			$output = array();
			$arrData = $this->model->selecttabletotalrequerimientos($intUserSession);
			
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
							   $btnimprimir = '';
							    $btnimprimironclick = 'onclick="pdfCrequerimientoFM04('.$arrData[0][$i]['IdRequerimiento'].')"';

							    break;
							  case '1':
							   $arrData[0][$i]['Estado'] = '<span class="label label-warning label-pill m-w-60">PENDIENTE</span>';
							   $btnimprimir = '';
							   $btnimprimironclick = 'onclick="pdfCrequerimientoFM04('.$arrData[0][$i]['IdRequerimiento'].')"';

							    break;
							  case '2':
							   $arrData[0][$i]['Estado'] = '<span class="label label-success label-pill m-w-60">APROBADO</span>';
							   $btnimprimir = '';
							   $btnimprimironclick = 'onclick="pdfCrequerimientoFM04('.$arrData[0][$i]['IdRequerimiento'].')"';

							    break;

							  case '3':
							   $arrData[0][$i]['Estado'] = '<span class="label label-success label-pill m-w-60">DESPACHADO</span>';
							   $btnimprimir = '';
							   $btnimprimironclick = 'onclick="pdfCrequerimientoFM04('.$arrData[0][$i]['IdRequerimiento'].')"';

							    break;
							  case '4':
							   $arrData[0][$i]['Estado'] = '<span class="label label-danger label-pill m-w-60">EXTORNADO</span>';
							   $btnimprimir = '';
							   $btnimprimironclick = 'onclick="pdfCrequerimientoFM04('.$arrData[0][$i]['IdRequerimiento'].')"';

							    break;
							  
							
							 
							  default:
							    //Declaraciones ejecutadas cuando ninguno de los valores coincide con el valor de la expresión
							    break;
							};

				$arrData[0][$i]['opciones'] =	'<a class="btn btn-primary btn-xs" title="Visualizar Detalle" onclick="VisualizarTablaDetalleRequerimiento('.$arrData[0][$i]['IdRequerimiento'].')">
													<i class="zmdi zmdi-eye zmdi-hc-fw"></i>
												</a>
												<a class="btn btn-success btn-xs" title="Imprimir" '.$btnimprimir.''.$btnimprimironclick.' target="_blank">
                                					<i data-toggle="tooltip" title="Imprimir"class="zmdi zmdi-print zmdi-hc-fw"></i>
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

			public function gettabletotalformato()
			{

			$intUserSession			= intval(strClean($_SESSION['idUser']));

			$output = array();
			$arrData = $this->model->selecttabletotalformatos($intUserSession);
			
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
							    break;
							  case '1':
							   $arrData[0][$i]['Estado'] = '<span class="label label-warning label-pill m-w-60">PENDIENTE</span>';
							    break;
							  case '2':
							   $arrData[0][$i]['Estado'] = '<span class="label label-success label-pill m-w-60">PROCESADO</span>';
							    break;


							  
							
							 
							  default:
							    //Declaraciones ejecutadas cuando ninguno de los valores coincide con el valor de la expresión
							    break;
							};
				$arrData[0][$i]['opciones'] =	'<a class="btn btn-primary btn-xs" title="Visualizar Detalle" onclick="VisualizarTablaDetalleformato('.$arrData[0][$i]['IdFormato'].')">
													<i class="zmdi zmdi-eye zmdi-hc-fw"></i>
												</a>
												<a class="btn btn-success btn-xs" title="Imprimir" onclick="pdfCrequerimientoFormato('.$arrData[0][$i]['IdFormato'].')" target="_blank">
                                					<i data-toggle="tooltip" title="Imprimir"class="zmdi zmdi-print zmdi-hc-fw"></i>
                                				</a>
                                				<a class="btn btn-warning	 btn-xs" title="Descargar" onclick="pdfCrequerimientoFormato('.$arrData[0][$i]['IdFormato'].')">
                                					<i data-toggle="tooltip" title="Descargar"class="zmdi zmdi-download zmdi-hc-fw"></i>
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


		public function setRequerimiento()
		{  
			if($_POST){
				if( empty($_POST['cboproceso']) || empty($_POST['consumo']) || empty($_POST['fase']) || empty($_POST['cantidad']) ||  empty($_POST['solicitante'])  || empty($_POST['fechaactividad'])  ||  empty($_POST['actividad']) ||  empty($_POST['norden'])  || empty($_POST['alinea']) ){
					$arrResponse = 	[
								    	"status"=> false,
								    	"title"	=> "Error!",
								    	"msg" 	=> "Verificar Datos.",
									]; 
				} else{
					
					$intControl				= intval(strClean($_POST['txtcontrolRequerimiento']));					
					$intcboproceso			= intval(strClean($_POST['cboproceso']));					
					$intconsumo 			= intval(strClean($_POST['consumo']));
					$intfase	  			= intval(strClean($_POST['fase']));
					$intcantidad	  		= strClean($_POST['cantidad']);
					$intcsolicitante 		= intval(strClean($_POST['solicitante']));
					$intprioridad			= intval(strClean($_POST['prioridad']));
					$intturno				= intval(strClean($_POST['turno']));
					$intnorden				= strClean($_POST['norden']);
					$intactividad			= strClean($_POST['actividad']);
					$intfechaactividad		= strClean($_POST['fechaactividad']);
					$intalinea				= strClean($_POST['alinea']);
					$intaturno				= strClean($_POST['aturno']);
					$inttxtobservaciones	= strClean($_POST['observaciones']);
					$intUserSession			= intval(strClean($_SESSION['idUser']));
					$detalleReq		 		= json_decode($_POST['detalleReq']);
					
					$hayCeros = false;

						foreach ($detalleReq as $row) {
							$cantidadA = intval(strClean($row->cantidadA));	

							$cantidadA = ($cantidadA > 0) ? $cantidadA : 0;						

							if($cantidadA == 0){
								$hayCeros = true;
							}
						}		
					
					if ($hayCeros == false) {
						if($intControl == 0){
							$requestRequerimiento	= $this->model->insertRequerimiento($intcboproceso,$intconsumo,$intfase,$intcantidad,$intcsolicitante,$intprioridad,$intturno,$intnorden,$intactividad,$intfechaactividad,$intalinea,$intaturno,$inttxtobservaciones, $intUserSession);

							foreach ($detalleReq as $row) {
								$cantidadA = intval(strClean($row->cantidadA));	
								$idProducto = intval(strClean($row->idProducto));						

								$cantidadA = ($cantidadA > 0) ? $cantidadA : 0;						

										$requestDetalleRequerimiento = $this->model->insertDetalleRequerimiento($requestRequerimiento, $idProducto, $cantidadA);
							}		

							$UpdateCantidad2= $this->model->updatecantidad2($requestRequerimiento);				
						
						}


					}else{
						//$requestFamilia	= $this->model->updateProveedor($intIdProveedor, $strRazonSocial,$intRuc,$intCelular, $intUserSession);
						$arrResponse = 	[
										    "status"=> false,
										    "title"	=> "Alerta!",
										    "msg" 	=> "No debe haber cantidades en 0.",
										];
						echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
						die();
					}

					if($requestRequerimiento > 0){

						if($intControl == 0){
							$arrResponse = 	[
											    "status"=> true,
											    "title"	=> "Requerimiento",
											    "msg" 	=> "Datos Guardados Correctamente.",
											];
						}else{
							$arrResponse = 	[
											    "status"=> true,
											    "title"	=> "Requerimiento",
											    "msg" 	=> "Datos Actualizados Correctamente.",
											];
						}
					}else if($sinvariable == 'exist'){
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



		public function setFormato()
		{  
			if($_POST){
				if( empty($_POST['cboproceso'])){
					$arrResponse = 	[
								    	"status"=> false,
								    	"title"	=> "Error!",
								    	"msg" 	=> "Verificar Datos.",
									]; 
				}else{
					
					$intControl				= intval(strClean($_POST['txtcontrolRequerimiento']));					
					$intcboproceso			= intval(strClean($_POST['cboproceso']));					
					$intconsumo 			= intval(strClean($_POST['consumo']));
					$intfase	  			= intval(strClean($_POST['fase']));
					$intcantidad	  		= intval(strClean($_POST['cantidad']));
					$intcsolicitante 		= intval(strClean($_POST['solicitante']));
					$intprioridad			= intval(strClean($_POST['prioridad']));
					$intturno				= intval(strClean($_POST['turno']));
					$intnorden				= strClean($_POST['norden']);
					$intactividad			= strClean($_POST['actividad']);
					$intfechaactividad		= strClean($_POST['fechaactividad']);
					$intalinea				= strClean($_POST['alinea']);
					$intaturno				= strClean($_POST['aturno']);
					$inttxtobservaciones	= strClean($_POST['observaciones']);
					$intUserSession			= intval(strClean($_SESSION['idUser']));
					$detalleFormato	 		= json_decode($_POST['detalleFormato']);
					
					if($intControl == 0){
						$requestFormato	= $this->model->insertformato($intcboproceso,$intconsumo,$intfase,$intcantidad,$intcsolicitante,$intprioridad,$intturno,$intnorden,$intactividad,$intfechaactividad,$intalinea,$intaturno,$inttxtobservaciones, $intUserSession);

						foreach ($detalleFormato as $row) {
							$cantidadA = intval(strClean($row->cantidadA));	
							$idProducto = intval(strClean($row->idProducto));						

							$cantidadA = ($cantidadA > 0) ? $cantidadA : 0;						

									$requestDetalleFormato= $this->model->insertDetalleformato($requestFormato, $idProducto, $cantidadA);
						}		


						


					}else{
						//$requestFamilia	= $this->model->updateProveedor($intIdProveedor, $strRazonSocial,$intRuc,$intCelular, $intUserSession);
					}

					if($requestFormato > 0){

						if($intControl == 0){
							$arrResponse = 	[
											    "status"=> true,
											    "title"	=> "Formato",
											    "msg" 	=> "Datos Guardados Correctamente.",
											];
						}else{
							$arrResponse = 	[
											    "status"=> true,
											    "title"	=> "Formato",
											    "msg" 	=> "Datos Actualizados Correctamente.",
											];
						}
					}else if($sinvariable == 'exist'){
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




		public function gettablebuscarproductoReq()
			{
			
			$output = array();

			$arrData = $this->model->selecttablebuscarproductosreq();
			
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


				public function gettablebuscarproductoReqformato()
			{
			
			$output = array();

			$arrData = $this->model->selecttablebuscarproductosformato();
			
			for ($i=0; $i <  count($arrData[0]); $i++) { 
				

				# code...
				$arrData[0][$i]['orden'] 	= 	$i+1;
				$arrData[0][$i]['Estado'] 	= 	$arrData[0][$i]['Estado'] == 1 ? '<span class="label label-success label-pill m-w-60">ACTIVO</span>' : '<span class="label label-danger label-pill m-w-60">INACTIVO</span>';
				$arrData[0][$i]['opciones'] =	'<a class="btn btn-primary btn-xs" title="Agregar Producto" onclick="addProductformato('.$arrData[0][$i]['IdProducto'].')">
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


		public function llenartablaproductorequerimiento(int $idProductos)				
			{
				$intIdTarjetaProducto = intval(strClean($idProductos));
				$output = array();
				$arrData = $this->model->selectllenarproductorequerimiento($intIdTarjetaProducto);


				$stock = $arrData['Existencia'];
				//var_dump($stock);
				//exit;
				
				if (empty($stock)) {

					echo'<script type="text/javascript">
						alert("Producto sin Stock");						
						</script>';
					
				} else{

				$campos = '<tr id="fila-'.$arrData['IdProducto'].'">
							  <!-- td class="text-center" width="10%">N</td-->
							  <td class="text-center" width="10%">'.$arrData['CodProducto'].'</td>
                              <td class="text-center" width="20%">'.$arrData['producto'].'</td>
                              <td class="text-center" width="10%">'.$arrData['uma'].'</td>
                              
                              <td class="text-primary"  width="10%">'.$arrData['Existencia'].'</td>
                              <td class="text-center" width="10%"><input class="form-control vld" type="number" style="width:60px" step="1" id="cantA'.$arrData['IdProducto'].'" value="0" onchange="verificaCantidad('.$arrData['Existencia'].', this.value, '.$arrData['IdProducto'].', 1);" required="">

                             

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



		public function llenartablaproductoformato(int $idProductos)				
			{
				$intIdTarjetaProducto = intval(strClean($idProductos));
				$output = array();
				$arrData = $this->model->selectllenarproductoformato($intIdTarjetaProducto);

				

				$campos = '<tr id="fila-'.$arrData['IdProducto'].'">
							  <!-- td class="text-center" width="10%">N</td-->
                              <td class="text-center" width="20%">'.$arrData['producto'].'</td>
                              <td class="text-center" width="10%">'.$arrData['uma'].'</td>
                              
                              
                              <td class="text-center" width="10%"><input class="form-control vld" type="number" style="width:60px" step="1" id="cantA'.$arrData['IdProducto'].'" value="0" 	 required="">

                             

                              <input type="hidden" value="'.$arrData['IdProducto'].'" name="idProducto"></td>
                              
                              <td class="text-center" width="10%"><a onclick="eliminarFila(\'fila-'.$arrData['IdProducto'].'\');" class="btn btn-danger btn-xs" title="Eliminar Producto">
													<i class="zmdi zmdi-close zmdi-hc-fw"></i>
												</a></td>
						   </tr>';

						   	 echo $campos;
							 die();

						
			
			#echo json_encode($campos);
		
			}	


		public function getusuario()
		{			
				$intUserSession		= intval(strClean($_SESSION['idUser']));
				
				$arrData = $this->model->selectUsuario($intUserSession);


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
			
			die();
		}


		















		


	

	}

?>