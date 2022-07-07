<?php 

	/**
	* 
	*/
	class Rotulo extends Controllers
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


		public function rotulo()
		{

			$data['page_tag']='rotulo';
			$data['page_title']='Rotulos';
			$data['page_name']='Rotulo';
			$data['page_function_js']='function_rotulo.js';
			$this->views->getView($this,'rotulo',$data);
		}

		public function getSelectProducto()
		{

			$htmlOptions = '<option value="">[ Seleccione Producto]</option>';
			$arrData = $this->model->getSelectProcuctoSeguimiento();
			if(count($arrData) > 0){
				for ($i=0; $i < count($arrData) ; $i++) { 
					$htmlOptions .='<option value="'.$arrData[$i]['IdProducto'].'"> '.$arrData[$i]['Descripcion'].'</option>';
				}
			}
			echo $htmlOptions;
			die();
		}


		public function generarPdfRotulopallet($valores){

			$valor = explode(',',strClean($valores));
			$categoria = strClean($valor[3]);
			$IdProducto 	= intval(strClean($valor[0]));
			//$IdProducto2 	= intval(strClean($id2));

			$cantidad = intval(strClean($valor[1]));
			$divisor = intval(strClean($valor[2]));
			


			
	 	$iteraciones 	= floor($cantidad/$divisor);
	    $residuo 		= $cantidad%$divisor;

	     //¿¿dep($iteraciones);
	     //dep($residuo);

		if($residuo > 0) {
				$iteraciones++; 
			}

			$requestPdfReq	= $this->model->selectproductorotulo($IdProducto);

					//$requestPdfRequerimiento	= $this->model->consultareportedetallerequerimientos($IdRequerimiento);

						
					require('libraries/fpdf/fpdf_Pallet.php');

					$pdf = new FPDF('P','mm','A4');
					$pdf->AddPage('L');
					$pdf->setTitle('Formato Pallet');


		for($i = 1; $i <= $iteraciones; $i++)
				{

					#$pdf->Image('Assets/images/onpelogo.jpg',5,-2,50,50);
					
					//$pdf->Cell(float w [, float h [, string txt [, mixed border [, int ln [, string align [, boolean fill [, mixed link]]]]]]]);
					
					$pdf->SetFont('Arial','B',12);
					$pdf->Cell(40,4,'','L,T,R',0,'C');
					$pdf->Cell(190,4,'','L,T,R',0,'C');
					$pdf->SetFont('Arial','',6);
					$pdf->Cell(25,4,'Codigo:',1,0,'C');
					$pdf->SetFont('Arial','',6);
					$pdf->Cell(25,4,'FM03-GGE/GME:',1,1,'C');
					$pdf->SetFont('Arial','B',12);
					$pdf->Cell(40,4,'','L,R',0,'C');
					$pdf->Cell(190,4,'FORMATO','L,B,R',0,'C');
					$pdf->SetFont('Arial','',6);
					$pdf->Cell(25,4,'Version:',1,0,'C');
					$pdf->SetFont('Arial','',6);
					$pdf->Cell(25,4,'02',1,1,'C');

					$pdf->Cell(40,4,'','L,R',0,'C');
					$pdf->Cell(190,4,'','L,T,R',0,'C');
					$pdf->SetFont('Arial','',6);
					$pdf->Cell(25,4,'Fecha de:','L,R,T',0,'C');
					$pdf->SetFont('Arial','',8);
					$pdf->Cell(25,4,'12/11/2021','L,R,T',1,'C');

					$pdf->SetFont('Arial','B',16);
					$pdf->Cell(40,4,'','L,R',0,'C');
					$pdf->Cell(190,4,utf8_decode('      RÓTULO DE IDENTICACIÓN DE PALLET'),'L,R',0,'C');
					$pdf->SetFont('Arial','',6);
					$pdf->Cell(25,4,'Aprobacion:','L,R,B',0,'C');
					$pdf->SetFont('Arial','',6);
					$pdf->Cell(25,4,'','L,R,B',1,'C');

					$pdf->Cell(40,4,'','L,R',0,'C');
					$pdf->Cell(190,4,'','L,R',0,'C');
					$pdf->SetFont('Arial','',6);
					$pdf->Cell(25,4,'','L,R',0,'C');
					$pdf->SetFont('Arial','',6);
					$pdf->Cell(25,4,'','L,R',1,'C');

					$pdf->Cell(40,4,'','L,R,B',0,'C');
					$pdf->Cell(190,4,'','L,R,B',0,'C');
					$pdf->SetFont('Arial','',8);
					$pdf->Cell(25,4,'Pagina:','L,R,B',0,'C');
					$pdf->SetFont('Arial','',8);
					$pdf->Cell(25,4,$i.' de '.$iteraciones,'L,R,B',1,'C');

					$pdf->Ln();

					$pdf->SetFillColor(0,0,0);
					$pdf->SetTextColor(255,255,255);
					$pdf->SetFont('Arial','B',15);
					$pdf->Cell(280,6,utf8_decode('DENOMINACIÓN DEL MATERIAL ELECTORAL'),1,1,'C',1);

					$pdf->SetTextColor(0,0,0);	
					$pdf->SetFont('Arial','B',40);
					//$pdf->MultiCell(280,30,'12345678901234567890123456789012345678901234567890123456789012',1,'C',0);

					$pdf->MultiCell(280,30,utf8_decode($requestPdfReq['producto']),1,'C',0);

					$pdf->SetFillColor(0,0,0);
					$pdf->SetTextColor(255,255,255);	
					$pdf->SetFont('Arial','B',10);
					$pdf->Cell(25,8,utf8_decode('CODIGO'),1,0,'C',1);

					$pdf->SetTextColor(0,0,0);
					$pdf->SetFont('Arial','B',14);
					$pdf->Cell(55,8,$requestPdfReq['codigo'],1,0,'C');
					$pdf->SetFont('Arial','B',10);

					$pdf->SetFillColor(0,0,0);
					$pdf->SetTextColor(255,255,255);
					$pdf->Cell(30,8,utf8_decode('UMA'),1,0,'C',1);

					$pdf->SetTextColor(0,0,0);
					$pdf->SetFont('Arial','B',10);
					$pdf->Cell(45,8,$requestPdfReq['uma'],1,0,'C');

					$pdf->SetFillColor(0,0,0);
					$pdf->SetTextColor(255,255,255);
					$pdf->SetFont('Arial','B',10);
					$pdf->Cell(30,8,utf8_decode('MEDIDA'),1,0,'C',1);

					$pdf->SetTextColor(0,0,0);
					$pdf->SetFont('Arial','B',10);
					$pdf->Cell(95,8,utf8_decode('--'),1,1,'C');

					$pdf->SetFillColor(0,0,0);
					$pdf->SetTextColor(255,255,255);	
					$pdf->SetFont('Arial','B',10);
					$pdf->Cell(25,8,utf8_decode('FAMILIA'),1,0,'C',1);

					$pdf->SetTextColor(0,0,0);
					$pdf->SetFont('Arial','B',10);
					$pdf->Cell(130,8,$requestPdfReq['familia'],1,0,'C');

					$pdf->SetFillColor(0,0,0);
					$pdf->SetTextColor(255,255,255);
					$pdf->Cell(30,8,utf8_decode('CLASE'),1,0,'C',1);
					
					$pdf->SetTextColor(0,0,0);
					$pdf->SetFont('Arial','B',10);
					$pdf->Cell(95,8,$requestPdfReq['clase'],1,1,'C');


					$pdf->Cell(280,2,utf8_decode(''),0,1,'C');
					$pdf->SetFont('Arial','B',12);
					$pdf->Cell(110,6,utf8_decode('CATEGORIA'),1,0,'C');
					$pdf->Cell(170,6,utf8_decode('CANTIDAD'),1,1,'C');

					$pdf->SetFont('Arial','B',110);
					$pdf->Cell(110,60,utf8_decode($categoria),1,0,'C');
					if ($i == $iteraciones) {
						if ($residuo > 0) {
							$pdf->Cell(170,60,utf8_decode($residuo),1,1,'C');
						} else{
							$pdf->Cell(170,60,utf8_decode($divisor),1,1,'C');
						}
						
					} else{

						$pdf->Cell(170,60,utf8_decode($divisor),1,1,'C');
					}
					

				

				
				
				}
					
				$pdf->Output();

		}	

			public function getcantidades($idProducto)
		{

			$intIdProducto = intval(strClean($idProducto));

			if ($intIdProducto > 0) {
				
				$arrData = $this->model->selectcantidadesproducto($intIdProducto);

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


		public function gettabletotalStock()
			{
			
			$producto 		= intval(strClean($_POST['producto']));

			$arrData = $this->model->selectstockproducto($producto);
			
			
			for ($i=0; $i <  count($arrData); $i++) { 
				# code...
				$arrData[$i]['orden'] 	= 	$i+1;
				$arrData[$i]['Estado'] 	= 	$arrData[$i]['Estado'] == 1 ? '<span class="label label-success label-pill m-w-60">ACTIVO</span>' : '<span class="label label-danger label-pill m-w-60">INACTIVO</span>';
				
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




		// aqui termina 


		public function StockSucursalExcel()
		{

			date_default_timezone_set('America/Lima');
    		$fecha = date("d-m-Y");
    		$fechaC = date("d/m/Y (h:i:s a)");
			$requestReporte	= $this->model->selectReporteStockSucursal();
			dep($requestReporte); exit;

			if(count($requestReporte) > 0 ){

				if (PHP_SAPI == 'cli')
					die('Este archivo solo se puede ver desde un navegador web');
					
					//require_once './Assets/lib/PHPExcel-1.8.2/Classes/PHPExcel.php';
					require_once './Assets/lib/PHPExcel-1.8/Classes/PHPExcel.php';

					// Se crea el objeto PHPExcel
					$objPHPExcel = new PHPExcel();

					// Se asignan las propiedades del libro
					$objPHPExcel->getProperties()->setCreator(strtoupper ('SUCURSAL')) //Autor
								 ->setLastModifiedBy("Usuario") //Ultimo usuario que lo modificó
								 ->setTitle("Reporte de total de Stock por Sucursal")
								 ->setSubject("Reporte de Persoanl")
								 ->setDescription("Reporte de Stock Sucursal")
								 ->setKeywords("Reporte de Sucursal Stock")
								 ->setCategory("Reporte excel");

					$tituloReporte = "LISTA DE PRODUCTOS POR SUCURSAL -  ".strtoupper ('GGE');
					$titulosColumnas = array('Nº',' ALMACEN ',' PRODUCTO ', ' FAMILIA ', ' CLASE ', ' UMA' , ' AT', ' BT', ' CT', ' EXISTENCIA', ' ESTADO');

					#Combinacion de celdas Titulo General
					$objPHPExcel->setActiveSheetIndex(0)
								->mergeCells('B1:F1')
				            	->mergeCells('C3:D3')
				            	->mergeCells('C4:D4')
				            	->mergeCells('F3:H3');

					// Se agregan los titulos del reporte
					$objPHPExcel->setActiveSheetIndex(0)
	  					        ->setCellValue('B1',  $tituloReporte)
	  					        ->setCellValue('A7', $titulosColumnas[0])
	          		  	  		->setCellValue('B7', $titulosColumnas[1])
	          		  	  		->setCellValue('C7', $titulosColumnas[2])
	                    		->setCellValue('D7', $titulosColumnas[3])
	                    		->setCellValue('E7', $titulosColumnas[4])
	                    		->setCellValue('F7', $titulosColumnas[5])
	                    		->setCellValue('G7', $titulosColumnas[6])
	                    		->setCellValue('H7', $titulosColumnas[7])
	                    		->setCellValue('I7', $titulosColumnas[8])
	                    		->setCellValue('J7', $titulosColumnas[9])
	                    		->setCellValue('K7', $titulosColumnas[10]);

	                $objPHPExcel->setActiveSheetIndex(0)
		                  	->setCellValue('B3', 'GERENCIA:')
		                  	->setCellValue('C3', strtoupper('GGE'))
		                  	->setCellValue('B4', 'DIRECCIÓN:')
		                  	->setCellValue('c4', strtoupper('CEPSA 1'))
		                    ->setCellValue('E3', 'FECHA:')
		                    ->setCellValue('F3', $fechaC);
			       	
	                $i = 8;
	                $c = 0;
					foreach ($requestReporte as $value){
						$c = $c+1;
						$estado = ($value['Estado'] == 1) ? 'ACTIVO': 'INACTIVO';
				        $objPHPExcel->setActiveSheetIndex(0)
				                    ->setCellValue('A'.$i,  $c)
				                    ->setCellValue('B'.$i,  $value['sucursal'])
				                    ->setCellValue('C'.$i,  $value['producto'])
				                    ->setCellValue('D'.$i,  $value['familia'])
				                    ->setCellValue('E'.$i,  $value['clase'])
				                    ->setCellValue('F'.$i,  $value['uma'])
				                    ->setCellValue('G'.$i,  $value['at'])
				                    ->setCellValue('H'.$i,  $value['bt'])
				                    ->setCellValue('I'.$i,  $value['ct'])
				                    ->setCellValue('J'.$i,  $value['Existencia'])
				                    ->setCellValue('K'.$i,  $estado);
				        $i++;
				    }

	                $estiloTituloReporte = array(
			        	'font' => array(
				        	'name'      => 'Calibri',
			    	        'bold'      => true,
			        	    'italic'    => false,
			              	'strike'    => false,
			              	'size' 		  => 11,
			              	'underline' => 'single',
			              	'color'     => array(
			            		'rgb'   => '0C5C97'
		       			 	)
		            	),
			        	
			        	'fill' => array(
							//'type'	=> PHPExcel_Style_Fill::FILL_SOLID,
						),
	            		'borders' => array(
	               			'allborders' => array(
			               	//'style' => PHPExcel_Style_Border::BORDER_NONE                    
			               	)
			            ), 
	            		'alignment' =>  array(
		        			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
		        			'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
		        			'rotation'   => 0,
		        			'wrap'       => TRUE
		    			)
		        	);

					$estiloTituloColumnas = array(
			            'font' => array(
			                'name'      => 'Calibri',
			                'bold'      => true,
			                'size' 		=> 11,
			                'color'     => array(
			            		'rgb'   => '087630'
			       			 )                         
			            ),
			            'fill' 	=> array(
							//'type'		=> PHPExcel_Style_Fill::FILL_SOLID,
						),
			            'borders' => array(
			            	'top'     => array(
			                //'style' => PHPExcel_Style_Border::BORDER_NONE ,

			                ),
			                'bottom'     => array(
			                    //'style' => PHPExcel_Style_Border::BORDER_NONE ,
			                )
			            ),
						'alignment' =>  array(
			        			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
			        			'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
			        			'rotation'   => 0,
			        			'wrap'       => TRUE
			    		)
					);
				
					$estiloInformacion = new PHPExcel_Style();
					$estiloInformacion->applyFromArray(
						array(
			           		'font' => array(
			               	'name'      => 'Calibri',
			               	'color'     => array(
			            		'rgb'   => '3D3D3D'
			       			 	)

			           		),
				           	'fill' 	=> array(
								//'type'		=> PHPExcel_Style_Fill::FILL_SOLID,
								
							),
				           	'borders' => array(
				               	'left'     => array(
				                   	//'style' => PHPExcel_Style_Border::BORDER_THIN ,
				               	)             
				           	)
			        	)
			        );

			        $estiloSubTitulo = array(
			        	'font' => array(
			                'name'    => 'Calibri',
			                'bold'    => true,
			                'size'    => 11,
			                'color'   => array(
			                'rgb'   => '000000'
			             )                         
			            ),
			          	'fill' 	=> array(
							//'type'		=> PHPExcel_Style_Fill::FILL_SOLID,
						),
			            'borders' => array(
			            	'top'     => array(
			                //'style' => PHPExcel_Style_Border::BORDER_NONE ,

			                ),
			                'bottom'     => array(
			                    //'style' => PHPExcel_Style_Border::BORDER_NONE ,
			                )
		            	)
			        );

			        $estiloCode = array(
			          'font' => array(
			                'name'    => 'Calibri',
			                'bold'    => true,
			                'size'    => 1,
			                'color'   => array(
			                'rgb'   => 'FFFFFF'
			             )                         
			            ),
			        );
			        //CODE
			        // $objPHPExcel->getSheet(0)->getStyle('Z200')->applyFromArray($estiloCode);

			        $objPHPExcel->getActiveSheet()->getStyle('B1:F1')->applyFromArray($estiloTituloReporte);
					$objPHPExcel->getActiveSheet()->getStyle('A7:K7')->applyFromArray($estiloTituloColumnas);	 
					$objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A8:K".($i-1));
					$objPHPExcel->getActiveSheet()->getStyle('B3:B4')->applyFromArray($estiloSubTitulo);
				    $objPHPExcel->getActiveSheet()->getStyle('E3:E4')->applyFromArray($estiloSubTitulo);
					$objPHPExcel->getActiveSheet()->getStyle('L3:N3')->applyFromArray($estiloSubTitulo);
				    $objPHPExcel->getActiveSheet()->getStyle('B1:B'.(count($requestReporte)+7))->getNumberFormat()->setFormatCode( PHPExcel_Style_NumberFormat::FORMAT_TEXT );

				    	//Zoom de la hoja Excel
					$objPHPExcel->getSheet(0)->getSheetView()->setZoomScale(80);


					for($i = 'A'; $i <= 'K'; $i++){
						$objPHPExcel->setActiveSheetIndex(0)			
								->getColumnDimension($i)->setAutoSize(TRUE);
					}


					// Se asigna el nombre a la hoja
					//$objPHPExcel->getActiveSheet()->setTitle('Reporte_Trabajadores');
					$objPHPExcel->getSheet(0)->setTitle('Reporte_Sucursal');
					// Se activa la hoja para que sea la que se muestre cuando el archivo se abre
					$objPHPExcel->setActiveSheetIndex(0);
					// Inmovilizar paneles 
					//$objPHPExcel->getActiveSheet(0)->freezePane('A4');

					$objPHPExcel->getActiveSheet(0)->freezePaneByColumnAndRow(0,8);
					//$objPHPExcel->getActiveSheet(0)->freezePaneByColumnAndRow(5,10);

					$excelName = "REPORTE_SUCURSAL_".strtoupper('GGE')."_".$fecha.".xlsx";
					$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
					$objWriter->save($excelName);
					//echo $excelName;
					$arrResponse = 	[
										"status"=> true,
										"title"	=> "Reporte de Stock Sucursal",
										"msg" 	=> "Se descargo el Reporte correctamente",
										"data"	=>	$excelName,
									]; 
					
		
			}else{
				$arrResponse = 	[
										"status"=> false,
										"title"	=> "Alerta!",
										"msg" 	=> "No hay Datos para mostrar.",
									]; 
			}

			echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			die();
		}







			public function getSelectSucursales()
		{
			$htmlOptions = '<option value="">[ Seleccione Tipo De Sucursal]</option>';
			$arrData = $this->model->getSelectSucursal();
			if(count($arrData) > 0){
				for ($i=0; $i < count($arrData) ; $i++) { 
					$htmlOptions .='<option value="'.$arrData[$i]['IdSucursal'].'"> '.$arrData[$i]['Descripcion'].'</option>';
				}
			}
			echo $htmlOptions;
			die();
		}


		

		public function gettabletazproducto()
			{
			
			$output 		= array();
			$sucursal 		= intval(strClean($_POST['sucursal']));
			$producto 		= intval(strClean($_POST['producto']));
			$desde 			= strClean($_POST['desde']);
			$hasta 			= strClean($_POST['hasta']);

			$arrData = $this->model->selecttabletrazprod($sucursal,$producto,$desde,$hasta);
			
			
			for ($i=0; $i <  count($arrData); $i++) { 
				# code...
				$arrData[$i]['orden'] 	= 	$i+1;
				
				$arrData[$i]['opciones'] =	'<a class="btn btn-primary btn-xs" title="Visualizar Detalle" onclick="VisualizarModalDetalleIngresos('.$arrData[$i]['IdProducto'].')">
													<i class="zmdi zmdi-edit zmdi-hc-fw"></i>
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


		




		public function gettablebuscarproducto()
		{
			
			$output = array();

			$arrData = $this->model->selecttablebuscarproductos();
			
			for ($i=0; $i <  count($arrData[0]); $i++) { 
				# code...
				$arrData[0][$i]['orden'] 	= 	$i+1;
				$arrData[0][$i]['Estado'] 	= 	$arrData[0][$i]['Estado'] == 1 ? '<span class="label label-success label-pill m-w-60">ACTIVO</span>' : '<span class="label label-danger label-pill m-w-60">INACTIVO</span>';
				$arrData[0][$i]['opciones'] =	'<a class="btn btn-primary btn-xs" title="Agregar Producto" onclick="addProduct('.$arrData[0][$i]['IdTarjetaProd'].')">
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






	}

?>