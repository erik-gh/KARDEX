<?php 

/**
* 
*/
class CompraModel extends Mysql
{
	//CONSULTAS A LA BD, PARA RETORNAR AL CONTROLADOR 
	
	private $intControl;	
	private $intIdProyecto;
	private $strDescripcion;
	private $strDetalle;

	private $intIdProducto;
	private $intIdCompra;
	private $intCantidadA;
	private $intCantidadB;
	private $intCantidadC;

	public function __construct()
	{
		# code...	
		parent::__construct();
	}


	public function EvaluarEstadoSal(int $Id)
	{
		$this->intId	= $Id;
		
				
			$query = "SELECT  Estado FROM compra WHERE IdCompra  = $this->intId";
							
			$request = $this->select($query);				
			return $request;		

	}



	public function UpdateTjmExt(int $Id)
	{
		$this->intId	= $Id;
		
				
			$query = " UPDATE tarjetamovimiento tjm 
						INNER JOIN compra c on tjm.IdCompra = c.IdCompra
						INNER JOIN stockprod stk on tjm.IdProducto = stk.IdProducto set tjm.Existencia = stk.Existencia
						WHERE tjm.IdCompra = ? and tjm.IdSucursal = stk.IdSucursal and tjm.kardex = 3";
			$arrData = array($this->intId);
			$request = $this->update($query, $arrData);	
			
			return $request;		

	}



public function EvaluarStockExtornar(int $Id)
	{
		$this->intId	= $Id;
		
				
			$query = "SELECT SUM(IF(stk.at >= tjm.a,0,1)) AS productoA, SUM(IF(stk.bt >= tjm.b,0,1)) AS productoB, SUM(IF(stk.ct >= tjm.c,0,1)) AS productoC 
				FROM stockprod stk
				INNER JOIN tarjetamovimiento tjm ON stk.IdProducto = tjm.IdProducto
				WHERE tjm.kardex = 1 AND stk.IdSucursal= tjm.IdSucursal AND tjm.IdCompra = $this->intId";
							
			$request = $this->select($query);				
			return $request;		

	}

	public function UpdateStockExtornar(int $Id)
	{
		$this->intId	= $Id;
		
				
			$query = "UPDATE stockprod stk INNER JOIN tarjetamovimiento tjm ON stk.IdProducto = tjm.IdProducto SET stk.at = (stk.at - tjm.a),
						stk.bt = (stk.bt - tjm.b),stk.ct = (stk.ct - tjm.c), stk.Existencia = (stk.Existencia - tjm.a - tjm.b-tjm.c) 
						WHERE tjm.IdCompra = ? and stk.IdSucursal= tjm.IdSucursal and tjm.kardex = 3";
			$arrData = array($this->intId);
			$request = $this->update($query, $arrData);	
			
			return $request;		

	}

	 public function InsertarTarjetaMovExtornar(int $id)
	{
		$this->intId = $id;
		

			$query = "INSERT INTO tarjetamovimiento(IdSucursal,IdCompra,IdSalida,IdComprarepliegue,IdCcalidad,IdRequerimiento,TipoMovimiento,kardex,a,b,c,at,bt,ct,IdProducto,Entrada,Salida,Existencia,UsuarioCrea,Estado) 
						SELECT c.IdSucursal,c.IdCompra,0,0,0,0,1,3,tjm.a,tjm.b,tjm.c,0,0,0,tjm.IdProducto,0,(tjm.a+tjm.b+tjm.c),0,c.UsuarioMod,1  
						FROM	compra c 
						INNER JOIN  tarjetamovimiento tjm on tjm.IdCompra = c.IdCompra
						WHERE tjm.IdCompra = ? ";
			$arrData = array($this->intId);
			$request = $this->update($query, $arrData);	


			/*$query2 = "INSERT INTO stockprod (IdSucursal, IdProducto, at, bt, ct , Existencia , Estado)
						SELECT rq.IdSucursal, T1.IdProducto,0,0,0,0,1 
						FROM tarjetamovimiento T1
						INNER JOIN requerimiento rq on T1.IdRequerimiento = rq.IdRequerimiento
						WHERE T1.IdRequerimiento = ? AND T1.IdProducto NOT IN (SELECT IdProducto FROM stockprod)";
			$arrData2 = array($this->intIdRequerimiento);
			$request2 = $this->insert($query2, $arrData2);	

			$requestData=[$request,$request2];*/

			return $request;


			

	}



		public function CambiarEstado(int $id, int $userSession)
	{
		
		$this->intId 			=  $id;
		$this->intUserSession 	= $userSession;
		$fecha = date('Y-m-d');
		
			$query 	= "UPDATE compra SET Estado = ? , UsuarioMod = ? , FechaMod= ? WHERE IdCompra = $this->intId ";
			$arrData= array(0,$this->intUserSession, $fecha);
			$request = $this->update($query, $arrData);

			$query2 	= "UPDATE detallecompra SET Estado = ? , UsuarioMod = ? , FechaMod= ? WHERE IdCompra = $this->intId ";
			$arrData2= array(0,$this->intUserSession, $fecha);
			$request2 = $this->update($query2, $arrData2);

			
			$requestData=[$request,$request2];

		return $requestData;
			
		
	}	



		public function insertExtornar(int $id,string $Observaciones, int $userSession)
	{
		
		$this->intid 			= $id;
		$this->strObservaciones	= $Observaciones;
		$this->intUserSession 	= $userSession;

			
			$query = "INSERT INTO extornar(IdIngSalReq,IdTipoExtornar ,Observaciones, UsuarioCrea, Estado) VALUES(?,1,?,?,1)";
			$arrData = array( $this->intid,$this->strObservaciones  ,$this->intUserSession);
			$requestInsert = $this->insert($query, $arrData);
			
			return $requestInsert;

		
	}



	public function UpdateEstadoCompra(int $idCompra,int $UserSession)
	{
		
		$this->intidCompra				= $idCompra;	
		$this->intUserSession			= $UserSession;	
		

			
			$query = "UPDATE compra set Estado = ? UsuarioMod =?
						where IdCompra = ? ";
			$arrData = array($this->intCantidadA ,$this->intCantidadB,$this->intCantidadC,$this->intUserSession,$this->intidProducto,$this->intIdRequerimiento);
			$requestInsert = $this->update($query, $arrData);
			
			return $requestInsert;
		
	}



	public function consultareportecabeceracompra(int $idCompra)
	{
		$this->intIdCompra	= $idCompra;

		$query = "SELECT c.IdCompra,proc.Descripcion,p.RazonSocial ,s.Descripcion 'sucursal',c.FechaCrea , c.Serie, prod.Descripcion as 'producto',tm.a, tm.b, tm.c ,dc.Cantidad, u.nombre,c.Estado
					from compra c
					inner join detallecompra dc on c.IdCompra = dc.IdCompra
					inner join tarjetamovimiento tm on tm.IdTarjetaMov = dc.IdTarjetaMov
					inner join proveedor p on p.IdProveedor = c.IdProveedor
					inner join producto prod on prod.IdProducto = tm.IdProducto
					inner join usuario u on u.id_usuario = c.UsuarioCrea
                    inner join proceso proc on proc.IdProceso = c.IdProceso
                    inner join sucursal s on s.IdSucursal = c.IdSucursal
                    where c.IdCompra = '{$this->intIdCompra}'";
		$request = $this->select($query);		

		return $request;


	}


public function consultareportedetallecompra(int $idCompra)
	{
		$this->intIdCompra	= $idCompra;


		$query = "SELECT prod.CodProducto ,prod.descripcion as 'producto', tm.a, tm.b,tm.c , um.Descripcion as 'uma' FROM detallecompra dc 
				inner join tarjetamovimiento tm on tm.IdTarjetaMov = dc.IdTarjetaMov
				inner join producto prod on prod.IdProducto = tm.IdProducto 
				inner join uma um on um.IdUma = prod.IdUma where dc.idcompra = '{$this->intIdCompra}'";
		$request = $this->select_all($query);		

		return $request;


	}




		public function selectProveedores()
	{


		$query = "SELECT IdProveedor, RazonSocial,Ruc,Celular, Estado FROM proveedor WHERE Estado != 0";

		if(isset($_POST["search"]["value"]))
		{
		 	
		    $query .= " AND RazonSocial LIKE '%".$_POST["search"]["value"]."%' ";
		}

		if(isset($_POST["order"]))
		{
			$query .= ' ORDER BY '.(1+$_POST['order']['0']['column']).' '.$_POST['order']['0']['dir'].' ';
		}
		else
		{
			$query .= ' ORDER BY IdProveedor ';
		}

		if ( isset( $_POST['start'] ) && $_POST['length'] != '-1' )
		{
			$query .= " LIMIT ".$_POST['start'].", ".$_POST['length'];
		}
		//return $query; exit;
		$request = $this->select_all($query);
	 

		$query = "SELECT COUNT(*) as row FROM proveedor WHERE Estado != 0 ";
		if(isset($_POST["search"]["value"]))
		{
		 	
		    $query .= " AND RazonSocial LIKE '%".$_POST["search"]["value"]."%' ";
		}
		$request2 = $this->select($query);

		
		$query = "SELECT COUNT(*) as row FROM proveedor WHERE Estado != 0";
		$request3 = $this->select($query);

		$requestData=[$request,$request2,$request3];

		return $requestData;
	}


	public function selecttablebuscarproductos()
	{


		$query = "SELECT p.IdProducto,p.CodProducto ,p.Descripcion as 'producto', u.Descripcion as 'uma', c.Descripcion as 'tipo', p.Estado 
					From producto p
					inner join uma u on u.IdUma = p.IdUma
					inner join clase c on c.IdClase = p.IdClase
					WHERE p.Estado != 0";

		if(isset($_POST["search"]["value"]))
		{
		 	
		    $query .= " AND p.Descripcion LIKE '%".$_POST["search"]["value"]."%' ";
		    $query .= " OR p.CodProducto LIKE '%".$_POST["search"]["value"]."%' ";
		    
		}

		if(isset($_POST["order"]))
		{
			$query .= ' ORDER BY '.(1+$_POST['order']['0']['column']).' '.$_POST['order']['0']['dir'].' ';
		}
		else
		{
			$query .= ' ORDER BY p.Descripcion ';
		}

		if ( isset( $_POST['start'] ) && $_POST['length'] != '-1' )
		{
			$query .= " LIMIT ".$_POST['start'].", ".$_POST['length'];
		}
		//return $query; exit;
		$request = $this->select_all($query);
	 

		$query = "SELECT COUNT(*) as row From producto p
					inner join uma u on u.IdUma = p.IdUma
					inner join clase c on c.IdClase = p.IdClase
					WHERE p.Estado != 0";
		if(isset($_POST["search"]["value"]))
		{
		 	
		    $query .= " AND p.Descripcion  LIKE '%".$_POST["search"]["value"]."%' ";
		}
		$request2 = $this->select($query);

		
		$query = "SELECT COUNT(*) as row From producto p
					inner join uma u on u.IdUma = p.IdUma
					inner join clase c on c.IdClase = p.IdClase
					WHERE p.Estado != 0";
		$request3 = $this->select($query);

		$requestData=[$request,$request2,$request3];

		return $requestData;
	}


		public function selecttabletotalingresos(string $fechadesde, string $fechahasta, int $almacen)
	{

			$this->stralmacen    = $almacen;
			$this->strfechadesde = $fechadesde;
			$this->strfechahasta = $fechahasta;

			//echo($this->stralmacen );
			//exit;

			$where = '';

			if($this->stralmacen == 0 && $this->strfechadesde == '' &&  $this->strfechahasta == ''){
				$where = ' WHERE 1 ORDER BY c.idCompra desc' ;
			}else if($this->stralmacen != 0 && $this->strfechadesde == '' && $this->strfechahasta == ''){
				$where = " WHERE s.IdSucursal = $this->stralmacen ORDER BY c.idCompra desc"; 
			}else if($this->stralmacen != 0 && $this->strfechadesde != '' && $this->strfechahasta == ''){
				$where = " WHERE s.IdSucursal = $this->stralmacen and c.FechaDoc= '{$this->strfechadesde}' ORDER BY c.idCompra desc"; 
			}else if($this->stralmacen != 0 && $this->strfechadesde != '' && $this->strfechahasta != ''){
				$where = " WHERE s.IdSucursal = $this->stralmacen and c.FechaDoc BETWEEN '{$this->strfechadesde}' AND '{$this->strfechahasta}' ORDER BY c.idCompra desc"; 
			}else if($this->stralmacen == 0 && $this->strfechadesde != '' && $this->strfechahasta == ''){
				$where = " WHERE c.FechaDoc= '{$this->strfechadesde}' ORDER BY c.idCompra desc";
			}else{
				$where = " WHERE c.FechaDoc BETWEEN '{$this->strfechadesde}' AND '{$this->strfechahasta}' ORDER BY c.idCompra desc";
			}



		$query = "SELECT c.IdCompra,s.Descripcion as sucursal ,p.RazonSocial,tpd.Descripcion ,c.Serie, c.FechaDoc , u.nombre , c.Estado 
					FROM compra c 
					inner join proveedor p on c.IdProveedor = p.IdProveedor
					inner join usuario u on u.id_usuario = c.UsuarioCrea
					inner join sucursal s on s.IdSucursal = c.IdSucursal
					inner join tipodocumento tpd on tpd.IdTipoDocumento = c.IdTipoDocumento
					  ".$where;
		
		$request = $this->select_all($query);

		return $request;
	}

		public function selecttabletotalingresos2()
	{



		$query = "SELECT c.IdCompra,s.Descripcion as sucursal ,p.RazonSocial,tpd.Descripcion ,c.Serie, c.FechaDoc , u.nombre , c.Estado 
					FROM compra c 
					inner join proveedor p on c.IdProveedor = p.IdProveedor
					inner join usuario u on u.id_usuario = c.UsuarioCrea
					inner join sucursal s on s.IdSucursal = c.IdSucursal
					inner join tipodocumento tpd on tpd.IdTipoDocumento = c.IdTipoDocumento ORDER BY c.idCompra desc";
		
		$request = $this->select_all($query);

		return $request;
	}


	public function selecttabledetalleingresos(int $idCompra)
	{

		$this->intIdCompra = $idCompra;
		$query = "SELECT c.IdCompra, c.FechaCrea , c.Serie,CONCAT('0',f.IdFamilia, '.', '0',prod.IdClase,'.', prod.CodProducto) as codigo, prod.Descripcion as 'producto',tm.a, tm.b, tm.c ,dc.Cantidad, u.nombre,c.Estado
					from compra c
					inner join detallecompra dc on c.IdCompra = dc.IdCompra
					inner join tarjetamovimiento tm on tm.IdTarjetaMov = dc.IdTarjetaMov
					inner join proveedor p on p.IdProveedor = c.IdProveedor
					inner join producto prod on prod.IdProducto = tm.IdProducto
					inner join usuario u on u.id_usuario = c.UsuarioCrea
					inner join clase cl on cl.IdClase = prod.IdClase
					inner join familia f on f.IdFamilia = cl.IdFamilia
					where  c.IdCompra = '{$this->intIdCompra}'";

		if(isset($_POST["search"]["value"]))
		{
		 	
		    $query .= " AND prod.Descripcion LIKE '%".$_POST["search"]["value"]."%' ";
		}

		if(isset($_POST["order"]))
		{
			$query .= ' ORDER BY '.(1+$_POST['order']['0']['column']).' '.$_POST['order']['0']['dir'].' ';
		}
		else
		{
			$query .= ' ORDER BY c.IdCompra ';
		}

		if ( isset( $_POST['start'] ) && $_POST['length'] != '-1' )
		{
			$query .= " LIMIT ".$_POST['start'].", ".$_POST['length'];
		}
		//return $query; exit;
		$request = $this->select_all($query);
	 

		$query = "SELECT COUNT(*) as row from compra c
					inner join detallecompra dc on c.IdCompra = dc.IdCompra
					inner join tarjetamovimiento tm on tm.IdTarjetaMov = dc.IdTarjetaMov
					inner join proveedor p on p.IdProveedor = c.IdProveedor
					inner join producto prod on prod.IdProducto = tm.IdProducto
					inner join usuario u on u.id_usuario = c.UsuarioCrea
					inner join clase cl on cl.IdClase = prod.IdClase
					inner join familia f on f.IdFamilia = cl.IdFamilia
					where  c.IdCompra = '{$this->intIdCompra}'";
		if(isset($_POST["search"]["value"]))
		{
		 	
		    $query .= " AND prod.Descripcion LIKE '%".$_POST["search"]["value"]."%' ";
		}
		$request2 = $this->select($query);

		
		$query = "SELECT COUNT(*) as row from compra c
					inner join detallecompra dc on c.IdCompra = dc.IdCompra
					inner join tarjetamovimiento tm on tm.IdTarjetaMov = dc.IdTarjetaMov
					inner join proveedor p on p.IdProveedor = c.IdProveedor
					inner join producto prod on prod.IdProducto = tm.IdProducto
					inner join usuario u on u.id_usuario = c.UsuarioCrea
					inner join clase cl on cl.IdClase = prod.IdClase
					inner join familia f on f.IdFamilia = cl.IdFamilia
					where  c.IdCompra = '{$this->intIdCompra}'";
		$request3 = $this->select($query);

		$requestData=[$request,$request2,$request3];

		return $requestData;
	}


	public function insertProveedorMODAL(string $razonsocial,string $ruc,int $celular, int $userSession)
	{
		
		
		$this->strRazonSocial	= $razonsocial;
		$this->intRuc 		 	= $ruc;
		$this->intCelular	 	= $celular;
		$this->intUserSession 	= $userSession;

		$queryprove = "SELECT IdProveedor FROM proveedor WHERE Ruc = '{$this->intRuc}' AND Estado != 0 ";
		$requestprovee = $this->select($queryprove);

		if(empty($requestprovee)){
			
			$query = "INSERT INTO proveedor(RazonSocial,Ruc,Celular, UsuarioCrea, Estado) VALUES(?,?,?,?,1)";
			$arrData = array( $this->strRazonSocial,$this->intRuc ,$this->intCelular  ,$this->intUserSession);
			$requestInsert = $this->insert($query, $arrData);
			
			return $requestInsert;

		}else{

			return  'exist';
		}
	}

		public function deleteProveedor(int $IdProveedor)
	{
		
		$this->intIdProveedor 	=  $IdProveedor;
		
		$queryproveedor		  	= "SELECT IdProveedor FROM compra WHERE IdProveedor ='{$this->intIdProveedor}' AND Estado != 0 ";
		$requestProveedor    		= $this->select($queryproveedor);

		if(empty($requestProveedor)){
				$query 	= "UPDATE proveedor SET Estado = ? WHERE IdProveedor = $this->intIdProveedor ";
			$arrData= array(0);
			$request = $this->update($query, $arrData);
			
			return $request;
			
		}else{

			return  'exist';
		}	




			
		
		
		
		
	}



	public function insertCompra(int $cboalmacen,int $cboproceso,  int $cbotipodocumento,int $cboproveedor,string $txtfechadoc, string $txtserie, int $UserSession)
	{
		
		$this->strtxtfechadoc				= $txtfechadoc;
		$this->intcbotipodocumento 		 	= $cbotipodocumento;
		//$this->intcbotipoingreso 		 	= $cbotipoingreso;
		$this->strtxtserie					= $txtserie;
		$this->intcboproceso 		 		= $cboproceso;		
		$this->intcboproveedor 		 		= $cboproveedor;
		$this->intcboalmacen		 		= $cboalmacen;
		$this->intUserSession 				= $UserSession;	
		
			
			$query = "INSERT INTO compra (FechaDoc,IdTipoDocumento,IdTipoIngreso,Serie,IdSucursal,IdProceso,IdProveedor,UsuarioCrea, Estado) VALUES(?,?,1,?,?,?,?,?,1)";
			$arrData = array( $this->strtxtfechadoc, $this->intcbotipodocumento ,$this->strtxtserie,$this->intcboalmacen,$this->intcboproceso,$this->intcboproveedor ,$this->intUserSession);
			$requestInsert = $this->insert($query, $arrData);
			
			return $requestInsert;

		
	}


	public function insertCompraAdqui(int $cboalmacen,int $cboproceso,  int $cbotipodocumento,int $cboproveedor,string $txtfechadoc, string $txtserie,string $txtnumeropedido,string $txtordecompra,string $txtpecosa, int $UserSession)
	{
		
		$this->strtxtfechadoc				= $txtfechadoc;
		$this->intcbotipodocumento 		 	= $cbotipodocumento;
		//$this->intcbotipoingreso 		 	= $cbotipoingreso;
		$this->strtxtserie					= $txtserie;
		$this->strtxtnumeropedido			= $txtnumeropedido;
		$this->strtxtordecompra				= $txtordecompra;
		$this->strtxtpecosa					= $txtpecosa;
		$this->intcboproceso 		 		= $cboproceso;		
		$this->intcboproveedor 		 		= $cboproveedor;
		$this->intcboalmacen		 		= $cboalmacen;
		$this->intUserSession 				= $UserSession;	
		
			
			$query = "INSERT INTO comprarepliegue (FechaDoc,IdTipoDocumento,IdTipoIngreso,Serie,NroPedido,OrdenCompra,Pecosa,IdSucursal,IdProceso,IdProveedor,UsuarioCrea, Estado) VALUES(?,?,2,?,?,?,?,?,?,?,?,1)";
			$arrData = array( $this->strtxtfechadoc, $this->intcbotipodocumento ,$this->strtxtserie,$this->strtxtnumeropedido,$this->strtxtordecompra,$this->strtxtpecosa,$this->intcboalmacen,$this->intcboproceso,$this->intcboproveedor ,$this->intUserSession);
			$requestInsert = $this->insert($query, $arrData);
			
			return $requestInsert;

		
	}


		public function insertrepliegue(int $cboalmacen,int $cboproceso,  int $cbotipodocumento,int $cboproveedor,string $txtfechadoc, string $txtserie,string $txtnumeropedido,string $txtordecompra,string $txtpecosa, int $UserSession)
	{
		
		$this->strtxtfechadoc				= $txtfechadoc;
		$this->intcbotipodocumento 		 	= $cbotipodocumento;
		//$this->intcbotipoingreso 		 	= $cbotipoingreso;
		$this->strtxtserie					= $txtserie;
		$this->strtxtnumeropedido			= $txtnumeropedido;
		$this->strtxtordecompra				= $txtordecompra;
		$this->strtxtpecosa					= $txtpecosa;
		$this->intcboproceso 		 		= $cboproceso;		
		$this->intcboproveedor 		 		= $cboproveedor;
		$this->intcboalmacen		 		= $cboalmacen;
		$this->intUserSession 				= $UserSession;	
		
			
			$query = "INSERT INTO comprarepliegue (FechaDoc,IdTipoDocumento,IdTipoIngreso,Serie,NroPedido,OrdenCompra,Pecosa,IdSucursal,IdProceso,IdProveedor,UsuarioCrea, Estado) VALUES(?,?,3,?,?,?,?,?,?,?,?,1)";
			$arrData = array( $this->strtxtfechadoc, $this->intcbotipodocumento ,$this->strtxtserie,$this->strtxtnumeropedido,$this->strtxtordecompra,$this->strtxtpecosa,$this->intcboalmacen,$this->intcboproceso,$this->intcboproveedor ,$this->intUserSession);
			$requestInsert = $this->insert($query, $arrData);
			
			return $requestInsert;

		
	}


		public function selectStockProductos(int $idProducto, int $idalmacen)
	{

		$this->intIdProducto		= $idProducto;
		$this->intidalmacen			= $idalmacen;

		
		$query = "SELECT COUNT(IdStockProd) AS IdStockProd FROM stockprod WHERE IdSucursal = $this->intidalmacen AND IdProducto = $this->intIdProducto";
		$request = $this->select($query);
		return $request;
		
	}


		public function insertStockProductos(int $idProducto, int $idalmacen)
	{
		
		$this->intIdProducto		= $idProducto;
		$this->intidalmacen			= $idalmacen;

			
			$query = "INSERT INTO stockprod(IdSucursal,IdProducto, at,bt,ct,Existencia,Estado) values(?,?,0,0,0,0,1)";
			$arrData = array($this->intidalmacen,$this->intIdProducto);
			$requestInsert = $this->insert($query, $arrData);
			
			return $requestInsert;
		
	}


	public function updateStockProductos(int $intCantidadA , int $intCantidadB,int $intCantidadC,int $intEntrada,int $intIdProducto, int $idalmacen)
	{

		$this->intIdProducto		= $intIdProducto;
		$this->intidalmacen			= $idalmacen;
		$this->intCantidadA		 	= ($intCantidadA > 0) ? $intCantidadA : 0;
		$this->intCantidadB		 	= ($intCantidadB > 0) ? $intCantidadB : 0;
		$this->intCantidadC 		= ($intCantidadC > 0) ? $intCantidadC : 0;	
		$this->intEntrada	  		= ($intEntrada > 0) ? $intEntrada : 0;
	

			
			$query = "UPDATE stockprod SET at=(at+?), bt=(bt+?), ct=(ct+?),Existencia=(Existencia+?) WHERE IdProducto = ? and IdSucursal=?";
			$arrData = array($this->intCantidadA ,$this->intCantidadB,$this->intCantidadC,$this->intEntrada,$this->intIdProducto,$this->intidalmacen	);
			$request = $this->update($query, $arrData);

			return $request;

	}


	public function insertTarjetaMovimiento(int $idProducto,  int $idCompra,int $idsucursal,int $cantA, int $cantB, int $cantC, int $entrada,int $UserSession)
	{
		



		$this->intIdProducto		= $idProducto;
		$this->intIdCompra		 	= $idCompra;
		$this->intidsucursal	 	= $idsucursal;
		$this->intCantidadA		 	= $cantA;
		$this->intCantidadB		 	= $cantB;
		$this->intCantidadC 		= $cantC;	
		$this->intEntrada	  		= $entrada;
		$this->intUserSession 	    = $UserSession;	

			
			$query = "INSERT INTO tarjetamovimiento (IdCompra,a,b,c,Entrada,IdProducto,IdSucursal,TipoMovimiento,Kardex,Existencia,Estado,UsuarioCrea) VALUES(?,?,?,?,?,?,?,1,1,0,1,?)";
			$arrData = array( $this->intIdCompra, $this->intCantidadA ,$this->intCantidadB,$this->intCantidadC,$this->intEntrada,$this->intIdProducto,$this->intidsucursal,$this->intUserSession);
			$requestInsert = $this->insert($query, $arrData);
			
			return $requestInsert;
		
	}




	public function updateTarjetaMovimiento(int $intidcompra)
	{

		$this->intIdCompra		= $intidcompra;

			
			$query = "UPDATE tarjetamovimiento tjm 
						INNER JOIN compra c on c.IdCompra = tjm.IdCompra
						INNER JOIN stockprod stk ON tjm.idProducto = stk.idProducto SET tjm.Existencia = stk.Existencia
						WHERE tjm.idCompra = ? AND stk.idSucursal = c.IdSucursal";
			$arrData = array($this->intIdCompra);
			$request = $this->update($query, $arrData);

			return $request;

	}



	public function insertDetalleCompra(int $idCompra, int $idProducto, int $idtarjetamov, int $Entrada)
	{
		
		$this->intidCompra			= $idCompra;
		$this->intidProducto	 	= $idProducto;
		$this->intidtarjetamov	 	= $idtarjetamov;
		$this->intEntrada		 	= $Entrada;
		
			
			$query = "INSERT INTO detallecompra (IdCompra,IdProducto,IdTarjetaMov,Cantidad,Estado) VALUES(?,?,?,?,1)";
			$arrData = array( $this->intidCompra, $this->intidProducto ,$this->intidtarjetamov,$this->intEntrada);
			$requestInsert = $this->insert($query, $arrData);
			
			return $requestInsert;
		
	}

		public function insertDetalleCompraAdqui(int $idCompra, int $idProducto, int $cantidadA)
	{
		
		$this->intidCompra			= $idCompra;
		$this->intidProducto	 	= $idProducto;
		$this->intcantidadA	 		= $cantidadA;
		
			
			$query = "INSERT INTO detallecomprarepliegue (IdComprarepliegue,IdProducto,Cantidad,Estado) VALUES(?,?,?,1)";
			$arrData = array( $this->intidCompra, $this->intidProducto ,$this->intcantidadA);
			$requestInsert = $this->insert($query, $arrData);
			
			return $requestInsert;
		
	}







	public function updateProveedor(int $IdProveedor, string $razonsocial,string $ruc,int $celular,int $estado, int $userSession)
	{

		$this->intIdProveedor	= $IdProveedor;
		$this->strRazonSocial	= $razonsocial;
		$this->intRuc 		 	= $ruc;
		$this->intCelular	 	= $celular;
		$this->intEstado	 	= $estado;
		$this->intUserSession 	= $userSession;
	

		$queryProveedor = "SELECT * FROM proveedor WHERE RazonSocial = '{$this->strRazonSocial}' AND IdProveedor != $this->intIdProveedor AND Estado != 0 ";
		$requestProveedor = $this->select($queryProveedor);

		if(empty($requestProveedor)){
			
			$query = "UPDATE proveedor SET RazonSocial = ? , Ruc =?,Celular=? , Estado=? WHERE IdProveedor = $this->intIdProveedor";
			$arrData = array($this->strRazonSocial,$this->intRuc ,$this->intCelular ,$this->intEstado);
			$request = $this->update($query, $arrData);

			return $request;

		}else{
			
			return  'exist';

		}
	}


	

	public function selectProductos()
	{


		$query = "SELECT p.IdProducto, p.Descripcion as 'producto' , c.Descripcion as 'clase', 
					u.Descripcion as 'uma' 
					FROM producto p
					inner join clase c on p.IdClase = c.IdClase
					inner join uma u on u.IdUma = p.IdUma  WHERE p.Estado != 0";

		if(!isset($_POST["search"]["value"]))
		{
		 	
		    $query .= " AND p.Descripcion LIKE '%".$_POST["search"]["value"]."%' ";
		}

		if(isset($_POST["order"]))
		{
			$query .= ' ORDER BY '.(1+$_POST['order']['0']['column']).' '.$_POST['order']['0']['dir'].' ';
		}
		else
		{
			$query .= ' ORDER BY p.IdProducto';
		}

		if ( isset( $_POST['start'] ) && $_POST['length'] != '-1' )
		{
			$query .= " LIMIT ".$_POST['start'].", ".$_POST['length'];
		}
		
		$request = $this->select_all($query);
	 

		$query = "SELECT COUNT(*) as row FROM producto p
					inner join clase c on p.IdClase = c.IdClase
					inner join uma u on u.IdUma = p.IdUma  WHERE p.Estado != 0 ";
		if(isset($_POST["search"]["value"]))
		{
		 	
		    $query .= " AND p.Descripcion LIKE '%".$_POST["search"]["value"]."%' ";
		}
		$request2 = $this->select($query);

		
		$query = "SELECT COUNT(*) as row FROM producto WHERE Estado != 0";
		$request3 = $this->select($query);

		$requestData=[$request,$request2,$request3];

		return $requestData;
	}


		//function para jalar el proyecto por id
	public function selectProductoss(int $idProducto)
	{
		$this->intIdProducto 	= $idProducto;
		$query = "SELECT * FROM producto WHERE IdProducto = $this->intIdProducto";
		$request = $this->select($query);
		return $request;
	}


	public function selectllenarproducto(int $idtarjetaproducto)
	{
		$this->intIdTarjetaProducto = $idtarjetaproducto;
		$query = "SELECT p.IdProducto, p.Descripcion as 'producto', u.Descripcion as 'uma', c.Descripcion as 'tipo', p.Estado From producto p
					inner join uma u on u.IdUma = p.IdUma
					inner join clase c on c.IdClase = p.IdClase
					WHERE p.Estado != 0 and p.IdProducto in ('{$this->intIdTarjetaProducto}')";

		$request = $this->select($query);
		return $request;
	}

	

	

	

	public function selectProveedor(int $idproveedor)
	{
		$this->intProveedor	= $idproveedor;
		$query = "SELECT * FROM proveedor WHERE IdProveedor = $this->intProveedor";
		$request = $this->select($query);
		return $request;
	}


	public function selectcboTipoDocumento(){

		$query = "SELECT IdTipoDocumento, Descripcion FROM tipodocumento WHERE Estado = 1 ORDER BY IdTipoDocumento";
		$request = $this->select_all($query);
		return $request;

	} 

		public function selectcboalmacen(){

		$query = "SELECT IdSucursal, Descripcion FROM sucursal WHERE Estado = 1 ORDER BY IdSucursal";
		$request = $this->select_all($query);
		return $request;

	} 


	public function selectcboProveedor(){

		$query = "SELECT IdProveedor, RazonSocial FROM proveedor WHERE Estado = 1 ORDER BY IdProveedor";
		$request = $this->select_all($query);
		return $request;

	} 


	public function selectcboProceso(){

		$query = "SELECT IdProceso, Descripcion FROM proceso WHERE Estado = 1 ORDER BY IdProceso";
		$request = $this->select_all($query);
		return $request;

	} 

		public function selectcboTipoIngreso(){

		$query = "SELECT IdTipoIngreso, Descripcion FROM tipoingreso WHERE Estado = 1 ORDER BY IdTipoIngreso";
		$request = $this->select_all($query);
		return $request;

	} 

	



}


?>