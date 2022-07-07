<?php 

	/**
	* 
	*/
	class Reportes extends Controllers
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


		public function reportes()
		{

			$data['page_tag']='reportes';
			$data['page_title']='REPORTES';
			$data['page_name']='Reportes';
			$data['page_function_js']='function_reportes.js';
			$this->views->getView($this,'reportes',$data);
		}


		public function getSelectClase()
		{

			if($_POST){
				$intIdFamilia	= intval(strClean($_POST['IdFamilia']));

			$htmlOptions = '<option value="">[ Seleccione Clase ]</option>';
			$arrData = $this->model->selectcboClases($intIdFamilia);
			if(count($arrData) > 0){
				for ($i=0; $i < count($arrData) ; $i++) { 
					$htmlOptions .='<option value="'.$arrData[$i]['IdClase'].'"> '.$arrData[$i]['Descripcion'].'</option>';
				}
			}
			echo $htmlOptions;
			die();
			}
		}


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



			public function getSelectProductoOnchange()
		{

			if($_POST){
				$intIdClase	= intval(strClean($_POST['IdClase']));

			$htmlOptions = '<option value="">[ Seleccione Producto ]</option>';
			$arrData = $this->model->getSelectProcucto($intIdClase);
			if(count($arrData) > 0){
				for ($i=0; $i < count($arrData) ; $i++) { 
					$htmlOptions .='<option value="'.$arrData[$i]['IdProducto'].'"> '.$arrData[$i]['Descripcion'].'</option>';
				}
			}
			echo $htmlOptions;
			die();
			}



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


		public function gettabletotalStock()
			{
			
			$output 		= array();
			$sucursal 		= intval(strClean($_POST['sucursal']));
			$familia 		= intval(strClean($_POST['familia']));
			$clase 			= intval(strClean($_POST['clase']));
			$producto 		= intval(strClean($_POST['producto']));

			$arrData = $this->model->selecttableproductoporsucursal($sucursal,$familia,$clase,$producto);
			
			
			for ($i=0; $i <  count($arrData); $i++) { 
				# code...
				//$arrData[$i]['orden'] 	= 	$i+1;
				$arrData[$i]['Estado'] 	= 	$arrData[$i]['Estado'] == 1 ? '<span class="label label-success label-pill m-w-60">ACTIVO</span>' : '<span class="label label-danger label-pill m-w-60">INACTIVO</span>';
				$arrData[$i]['opciones'] =	'<a class="btn btn-primary btn-xs" title="Visualizar Detalle" onclick="VisualizarModalDetalleIngresos('.$arrData[$i]['IdStockProd'].')">
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
				$arrData[$i]['kardex'] 	= 	$arrData[$i]['kardex'] ;


					switch ($arrData[$i]['kardex']) {
							  case 'Inv.Inicial':
							   $arrData[$i]['kardex'] = '<span class="label label-primary label-pill m-w-60">INV.INICIAL</span>';
							    break;	
							  case 'Ingreso':
							   $arrData[$i]['kardex'] = '<span class="label label-success label-pill m-w-60">INGRESO</span>';
							    break;
							  case 'Salida':
							   $arrData[$i]['kardex'] = '<span class="label label-warning label-pill m-w-60">SALIDA</span>';
							    break;
							  case 'Extornar':
							   $arrData[$i]['kardex'] = '<span class="label label-danger label-pill m-w-60">EXTORNAR</span>';
							    break;					  
							
							 
							  default:
							    //Declaraciones ejecutadas cuando ninguno de los valores coincide con el valor de la expresión
							    break;
							};
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