<?php 

/**
* 
*/
class CcalidadModel extends Mysql
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



		public function selecttabletotalingresosccalidad()
	{


		$query = "SELECT distinct(cr.IdComprarepliegue),cr.Serie, pv.RazonSocial,ti.Descripcion as 'tipo', s.Descripcion, cr.FechaDoc, cr.FechaCrea , cr.Estado FROM detallecomprarepliegue dtcr 
					inner join comprarepliegue cr on cr.IdComprarepliegue = dtcr.IdComprarepliegue
					inner join producto p on p.IdProducto = dtcr.IdProducto
					inner join proveedor pv on pv.IdProveedor = cr.IdProveedor
					inner join tipodocumento tp on tp.IdTipoDocumento = cr.IdTipoDocumento
					inner join sucursal s on s.IdSucursal = cr.IdSucursal
                    inner join tipoingreso ti on ti.IdTipoIngreso = cr.IdTipoIngreso
                    WHERE cr.Estado != 0";

		if(isset($_POST["search"]["value"]))
		{
		 	
		    $query .= " AND pv.RazonSocial LIKE '%".$_POST["search"]["value"]."%' ";
		}

		if(isset($_POST["order"]))
		{
			$query .= ' ORDER BY '.(1+$_POST['order']['0']['column']).' '.$_POST['order']['0']['dir'].' ';
		}
		else
		{
			$query .= ' ORDER BY  cr.IdComprarepliegue desc';
		}

		if ( isset( $_POST['start'] ) && $_POST['length'] != '-1' )
		{
			$query .= " LIMIT ".$_POST['start'].", ".$_POST['length'];
		}
		//return $query; exit;
		$request = $this->select_all($query);
	 

		$query = "SELECT COUNT(*) as row FROM detallecomprarepliegue dtcr 
					inner join comprarepliegue cr on cr.IdComprarepliegue = dtcr.IdComprarepliegue
					inner join producto p on p.IdProducto = dtcr.IdProducto
					inner join proveedor pv on pv.IdProveedor = cr.IdProveedor
					inner join tipodocumento tp on tp.IdTipoDocumento = cr.IdTipoDocumento
					inner join sucursal s on s.IdSucursal = cr.IdSucursal
					WHERE cr.Estado != 0";
		if(isset($_POST["search"]["value"]))
		{
		 	
		    $query .= " AND pv.RazonSocial LIKE '%".$_POST["search"]["value"]."%' ";
		}
		$request2 = $this->select($query);

		
		$query = "SELECT COUNT(*) as row FROM detallecomprarepliegue dtcr 
					inner join comprarepliegue cr on cr.IdComprarepliegue = dtcr.IdComprarepliegue
					inner join producto p on p.IdProducto = dtcr.IdProducto
					inner join proveedor pv on pv.IdProveedor = cr.IdProveedor
					inner join tipodocumento tp on tp.IdTipoDocumento = cr.IdTipoDocumento
					inner join sucursal s on s.IdSucursal = cr.IdSucursal
					WHERE cr.Estado != 0";
		$request3 = $this->select($query);

		$requestData=[$request,$request2,$request3];

		return $requestData;
	}


	


	public function selecttableaprobarccalidad(int $IdComprarepliegue)
	{

		$this->intIdComprarepliegue = $IdComprarepliegue;


		$query = " SELECT cc.IdCcalidad, cr.IdComprarepliegue, p.RazonSocial ,cr.Serie , ps.Nombres, cc.FechaCrea, cc.Estado FROM ccalidad cc
					inner join comprarepliegue cr on cr.IdComprarepliegue = cc.IdComprarepliegue
					inner join personalsalida ps on ps.IdPersonal = cc.IdPersonal
					inner JOIN proveedor p on p.IdProveedor = cr.IdProveedor WHERE cr.Estado != 0 and cr.IdComprarepliegue='{$this->intIdComprarepliegue}'";
					

		if(isset($_POST["search"]["value"]))
		{
		 	
		    $query .= " AND p.RazonSocial LIKE '%".$_POST["search"]["value"]."%' ";
		}

		if(isset($_POST["order"]))
		{
			$query .= ' ORDER BY '.(1+$_POST['order']['0']['column']).' '.$_POST['order']['0']['dir'].' ';
		}
		else
		{
			$query .= ' ORDER BY  cc.IdCcalidad';
		}

		if ( isset( $_POST['start'] ) && $_POST['length'] != '-1' )
		{
			$query .= " LIMIT ".$_POST['start'].", ".$_POST['length'];
		}
		//return $query; exit;
		$request = $this->select_all($query);
	 

		$query = "SELECT COUNT(*) as row FROM ccalidad cc
					inner join comprarepliegue cr on cr.IdComprarepliegue = cc.IdComprarepliegue
					inner join personalsalida ps on ps.IdPersonal = cc.IdPersonal
					inner JOIN proveedor p on p.IdProveedor = cr.IdProveedor WHERE cr.Estado != 0 and cr.IdComprarepliegue='{$this->intIdComprarepliegue}'";
					
		if(isset($_POST["search"]["value"]))
		{
		 	
		    $query .= " AND p.RazonSocial LIKE '%".$_POST["search"]["value"]."%' ";
		}
		$request2 = $this->select($query);

		
		$query = "SELECT COUNT(*) as row FROM ccalidad cc
					inner join comprarepliegue cr on cr.IdComprarepliegue = cc.IdComprarepliegue
					inner join personalsalida ps on ps.IdPersonal = cc.IdPersonal
					inner JOIN proveedor p on p.IdProveedor = cr.IdProveedor WHERE cr.Estado != 0 and cr.IdComprarepliegue='{$this->intIdComprarepliegue}'";
					
		$request3 = $this->select($query);

		$requestData=[$request,$request2,$request3];

		return $requestData;
	}


		public function selecttablecontrolcalidad(int $IdComprarepliegue)
	{

		$this->intIdComprarepliegue = $IdComprarepliegue;
		$query = "SELECT cr.IdComprarepliegue,p.IdProducto,p.Descripcion,cr.IdTipoIngreso, dtcr.TcA,dtcr.TcB,dtcr.TcC,dtcr.Cantidad , (dtcr.Cantidad - dtcr.TcA) as Cantidad2 FROM detallecomprarepliegue dtcr 
					inner join comprarepliegue cr on cr.IdComprarepliegue = dtcr.IdComprarepliegue
					inner join producto p on p.IdProducto = dtcr.IdProducto
					inner join proveedor pv on pv.IdProveedor = cr.IdProveedor
					inner join tipodocumento tp on tp.IdTipoDocumento = cr.IdTipoDocumento
					inner join sucursal s on s.IdSucursal = cr.IdSucursal
					WHERE cr.Estado != 0 and cr.IdComprarepliegue='{$this->intIdComprarepliegue}'";

		if(isset($_POST["search"]["value"]))
		{
		 	
		    $query .= " AND p.Descripcion LIKE '%".$_POST["search"]["value"]."%' ";
		}

		if(isset($_POST["order"]))
		{
			$query .= ' ORDER BY '.(1+$_POST['order']['0']['column']).' '.$_POST['order']['0']['dir'].' ';
		}
		else
		{
			$query .= ' ORDER BY  cr.IdComprarepliegue ';
		}

		if ( isset( $_POST['start'] ) && $_POST['length'] != '-1' )
		{
			$query .= " LIMIT ".$_POST['start'].", ".$_POST['length'];
		}
		//return $query; exit;
		$request = $this->select_all($query);
	 

		$query = "SELECT COUNT(*) as row FROM detallecomprarepliegue dtcr 
					inner join comprarepliegue cr on cr.IdComprarepliegue = dtcr.IdComprarepliegue
					inner join producto p on p.IdProducto = dtcr.IdProducto
					inner join proveedor pv on pv.IdProveedor = cr.IdProveedor
					inner join tipodocumento tp on tp.IdTipoDocumento = cr.IdTipoDocumento
					inner join sucursal s on s.IdSucursal = cr.IdSucursal
					WHERE cr.Estado != 0 and cr.IdComprarepliegue='{$this->intIdComprarepliegue}'";
		if(isset($_POST["search"]["value"]))
		{
		 	
		    $query .= " AND p.Descripcion LIKE '%".$_POST["search"]["value"]."%' ";
		}
		$request2 = $this->select($query);

		
		$query = "SELECT COUNT(*) as row FROM detallecomprarepliegue dtcr 
					inner join comprarepliegue cr on cr.IdComprarepliegue = dtcr.IdComprarepliegue
					inner join producto p on p.IdProducto = dtcr.IdProducto
					inner join proveedor pv on pv.IdProveedor = cr.IdProveedor
					inner join tipodocumento tp on tp.IdTipoDocumento = cr.IdTipoDocumento
					inner join sucursal s on s.IdSucursal = cr.IdSucursal
					WHERE cr.Estado != 0 and cr.IdComprarepliegue='{$this->intIdComprarepliegue}'";
		$request3 = $this->select($query);

		$requestData=[$request,$request2,$request3];

		return $requestData;
	}


	public function selecttabledetallecontrolcalidad(int $IdCcalidad)
	{

		$this->intIdIdCcalidad = $IdCcalidad;

		$query = "SELECT cc.IdCcalidad, cr.IdComprarepliegue, p.RazonSocial ,pd.IdProducto,pd.Descripcion, dtc.a,dtc.b,dtc.c,dtc.Estado FROM ccalidad cc inner join comprarepliegue cr on cr.IdComprarepliegue = cc.IdComprarepliegue inner join detalleccalidad dtc on dtc.IdCcalidad = cc.IdCcalidad inner join producto pd on pd.IdProducto = dtc.IdProducto inner join personalsalida ps on ps.IdPersonal = cc.IdPersonal inner JOIN proveedor p on p.IdProveedor = cr.IdProveedor
					WHERE cr.Estado != 0 and cc.IdCcalidad='{$this->intIdIdCcalidad}'";

		if(isset($_POST["search"]["value"]))
		{
		 	
		    $query .= " AND pd.Descripcion LIKE '%".$_POST["search"]["value"]."%' ";
		}

		if(isset($_POST["order"]))
		{
			$query .= ' ORDER BY '.(1+$_POST['order']['0']['column']).' '.$_POST['order']['0']['dir'].' ';
		}
		else
		{
			$query .= ' ORDER BY  cc.IdCcalidad ';
		}

		if ( isset( $_POST['start'] ) && $_POST['length'] != '-1' )
		{
			$query .= " LIMIT ".$_POST['start'].", ".$_POST['length'];
		}
		//return $query; exit;
		$request = $this->select_all($query);
	 

		$query = "SELECT COUNT(*) as row FROM ccalidad cc inner join comprarepliegue cr on cr.IdComprarepliegue = cc.IdComprarepliegue inner join detalleccalidad dtc on dtc.IdCcalidad = cc.IdCcalidad inner join producto pd on pd.IdProducto = dtc.IdProducto inner join personalsalida ps on ps.IdPersonal = cc.IdPersonal inner JOIN proveedor p on p.IdProveedor = cr.IdProveedor
					WHERE cr.Estado != 0 and cc.IdCcalidad ='{$this->intIdIdCcalidad}'";
		if(isset($_POST["search"]["value"]))
		{
		 	
		    $query .= " AND pd.Descripcion LIKE '%".$_POST["search"]["value"]."%' ";
		}
		$request2 = $this->select($query);

		
		$query = "SELECT COUNT(*) as row FROM ccalidad cc inner join comprarepliegue cr on cr.IdComprarepliegue = cc.IdComprarepliegue inner join detalleccalidad dtc on dtc.IdCcalidad = cc.IdCcalidad inner join producto pd on pd.IdProducto = dtc.IdProducto inner join personalsalida ps on ps.IdPersonal = cc.IdPersonal inner JOIN proveedor p on p.IdProveedor = cr.IdProveedor
					WHERE cr.Estado != 0 and cc.IdCcalidad ='{$this->intIdIdCcalidad}'";
		$request3 = $this->select($query);

		$requestData=[$request,$request2,$request3];

		return $requestData;
	}


	public function selectEstadoDCC(int $IdCcalidad)
	{
		$this->intIdCcalidad 	= $IdCcalidad;
		$query = "SELECT * FROM `detalleccalidad` where IdCcalidad = $this->intIdCcalidad";
		$request = $this->select($query);
		return $request;
	}


	public function updatecomprerepliegue(int $IdComprarepliegue,string $numeropedido,string $ordencompra, string $pecosa)
	{
		$this->intcomprarepliegue	= $IdComprarepliegue;
		$this->strnumeropedido		= $numeropedido;
		$this->strordencompra		= $ordencompra;
		$this->strpecosa 			= $pecosa;
	

			$query = "UPDATE comprarepliegue set NroPedido =?, OrdenCompra =? , Pecosa =? where IdComprarepliegue ='$this->intcomprarepliegue' ";
						
			$arrData = array($this->strnumeropedido,$this->strordencompra,$this->strpecosa);
			$request = $this->update($query, $arrData);			
			
			return $request;			

	}



	public function insertCcalidad(int $IdComprarepliegue,int $cborecibidopor,int $UserSession)
	{
		
		$this->intIdComprarepliegue		= $IdComprarepliegue;
		$this->intcborecibidopor	 	= $cborecibidopor;
		$this->intUserSession			= $UserSession;	
		

			
			$query = "INSERT INTO ccalidad(IdComprarepliegue,IdPersonal,UsuarioCrea,Estado)  VALUES(?,?,?,1)";
			$arrData = array( $this->intIdComprarepliegue ,$this->intcborecibidopor,$this->intUserSession);
			$requestInsert = $this->insert($query, $arrData);
			
			return $requestInsert;
		
	}


		public function UpdEstadoCompraR(int $IdComprarepliegue)
	{
		$this->intIdComprarepliegue	= $IdComprarepliegue;
		

			$query = "UPDATE comprarepliegue SET Estado = ? WHERE IdComprarepliegue = ?";
			$arrData = array('2',$this->intIdComprarepliegue);
			$request = $this->update($query2, $arrData2);		
			

			return $request;		
			

	}


		public function insertDetalleCcalidad(int $IdCcalidad,int $IdComprarepliegue,int $idProducto,int $cantidadA,int $cantidadB,int $cantidadC,int $UserSession)
	{
		
		$this->intIdCcalidad			= $IdCcalidad;
		$this->intIdComprarepliegue		= $IdComprarepliegue;
		$this->intidProducto	 		= $idProducto;
		$this->intcantidadA	 			= $cantidadA;
		$this->intcantidadB	 			= $cantidadB;
		$this->intcantidadC	 			= $cantidadC;
		$this->intUserSession			= $UserSession;	
		

			
			$query = "INSERT INTO detalleccalidad (IdCcalidad, IdComprarepliegue, IdProducto ,a,b,c, UsuarioCrea, Estado)  VALUES(?,?,?,?,?,?,?,1)";
			$arrData = array( $this->intIdCcalidad ,$this->intIdComprarepliegue,$this->intidProducto,$this->intcantidadA,$this->intcantidadB,$this->intcantidadC,$this->intUserSession);
			$requestInsert = $this->insert($query, $arrData);
			
			return $requestInsert;
		
	}


	public function updatedetallecomprarepliegue(int $IdComprarepliegue,int $IdCcalidad, int $userSession)
	{
		$this->intIdComprarepliegue	= $IdComprarepliegue;
		$this->intIdCcalidad		= $IdCcalidad;
		$this->intUserSession 		= $userSession;
	

			$query = "UPDATE detallecomprarepliegue dcr
					  inner join detalleccalidad dtc  on dcr.IdProducto = dtc.IdProducto 
					  set dcr.TcA = (dtc.a+dcr.TcA) , dcr.TcB = (dtc.b + dcr.TcB) , dcr.TcC = (dtc.c+dcr.TcC)
				      where dtc.IdComprarepliegue =? and dtc.IdCcalidad =?";
			$arrData = array($this->intIdComprarepliegue,$this->intIdCcalidad );
			$request = $this->update($query, $arrData);		

			$query2 = "UPDATE ccalidad SET Estado = ? WHERE IdCcalidad = ?";
			$arrData2 = array('2',$this->intIdCcalidad );
			$request2 = $this->update($query2, $arrData2);	

			$query3  = "UPDATE detalleccalidad SET Estado = ? WHERE IdCcalidad = ?";
			$arrData3 = array('2',$this->intIdCcalidad );
			$request3 = $this->update($query3, $arrData3);


			$requestData=[$request,$request2,$request3];											

			return $requestData;		
			

	}


		public function ResultadoCCalidad(int $IdComprarepliegue, int $userSession)
	{
		$this->intIdComprarepliegue	= $IdComprarepliegue;
		$this->intUserSession 		= $userSession;
	

		$queryProceso  	= "SELECT sum(TcA) - SUM(Cantidad) AS IdStockProd FROM detallecomprarepliegue where IdComprarepliegue ='{$this->intIdComprarepliegue}'";
		$requestProceso = $this->select($queryProceso);		
			
			return $requestProceso;
		

	}
		public function ResultadoCCalidadRepliegue(int $IdComprarepliegue, int $userSession)
	{
		$this->intIdComprarepliegue	= $IdComprarepliegue;
		$this->intUserSession 		= $userSession;
	

		$queryProceso  	= "SELECT sum(TcB) - SUM(Cantidad) AS IdStockProdto FROM detallecomprarepliegue where IdComprarepliegue ='{$this->intIdComprarepliegue}'";
		$requestProceso = $this->select($queryProceso);		
			
			return $requestProceso;
		

	}


	public function updatedetaModestado(int $IdComprarepliegue, int $userSession)
	{
		$this->intIdComprarepliegue	= $IdComprarepliegue;
		$this->intUserSession 		= $userSession;
	

			$query 	= "UPDATE comprarepliegue SET Estado = ? WHERE IdComprarepliegue = $this->intIdComprarepliegue";
			$arrData= array(2);
			$request = $this->update($query, $arrData);
			
			return $request;
		
		

	}


		public function InserintoTjm(int $IdComprarepliegue,int $IdCcalidad, int $userSession)
	{
		$this->intIdComprarepliegue	= $IdComprarepliegue;
		$this->intIdCcalidad		= $IdCcalidad;
		$this->intUserSession 		= $userSession;
	

			$query = "INSERT INTO tarjetamovimiento(IdSucursal,IdCompra,IdSalida,IdComprarepliegue,IdCcalidad,TipoMovimiento,Kardex,a,b,c,at,bt,ct,IdProducto,Entrada,Salida,Existencia,UsuarioCrea,Estado) 
				SELECT cmr.IdSucursal,0,0,dtc.IdComprarepliegue,dtc.IdCcalidad,cmr.IdTipoIngreso,1,dtc.a,dtc.b,dtc.c,0,0,0,dtc.IdProducto,(dtc.a+dtc.b+dtc.c),0,0,cmr.UsuarioCrea,1
				FROM detalleccalidad dtc 
				INNER JOIN comprarepliegue cmr ON dtc.IdComprarepliegue = cmr.IdComprarepliegue
				WHERE dtc.IdComprarepliegue = ? AND dtc.IdCcalidad = ?";
			$arrData = array($this->intIdComprarepliegue,$this->intIdCcalidad );
			$request = $this->update($query, $arrData);	


			$query2 = "INSERT INTO stockprod ( IdSucursal, IdProducto, at, bt, ct , Existencia , Estado)
						SELECT cr.IdSucursal, T1.IdProducto,0,0,0,0,1 
						FROM tarjetamovimiento T1
						INNER JOIN comprarepliegue cr on T1.IdComprarepliegue = cr.IdComprarepliegue
						WHERE T1.IdComprarepliegue = ? AND T1.IdProducto NOT IN (SELECT IdProducto FROM stockprod where stockprod.IdSucursal=cr.IdSucursal)";
			$arrData2 = array($this->intIdComprarepliegue);
			$request2 = $this->insert($query2, $arrData2);	

			$requestData=[$request,$request2];

			return $requestData;


	}


		public function UpdateStockProd(int $IdComprarepliegue,int $IdCcalidad, int $userSession)
	{
		$this->intIdComprarepliegue	= $IdComprarepliegue;
		$this->intIdCcalidad		= $IdCcalidad;
		$this->intUserSession 		= $userSession;
				
			$query = "UPDATE stockprod stk INNER JOIN tarjetamovimiento tjm ON stk.IdProducto = tjm.IdProducto SET stk.at = (stk.at + tjm.a),
				stk.bt = (stk.bt + tjm.b),stk.ct = (stk.ct + tjm.c), stk.Existencia = (stk.Existencia + tjm.a + tjm.b+tjm.c) 
				WHERE tjm.IdComprarepliegue = ? and tjm. IdCcalidad = ? and tjm.IdSucursal= stk.IdSucursal";
			$arrData = array($this->intIdComprarepliegue,$this->intIdCcalidad );
			$request = $this->update($query, $arrData);	
			
			return $request;		

	}


		public function UpdateTjm(int $IdComprarepliegue,int $IdCcalidad, int $userSession)
	{
		$this->intIdComprarepliegue	= $IdComprarepliegue;
		$this->intIdCcalidad		= $IdCcalidad;
		$this->intUserSession 		= $userSession;
				
			$query = "UPDATE tarjetamovimiento tjm INNER join comprarepliegue cmr on cmr.IdComprarepliegue= tjm.IdComprarepliegue 
				INNER JOIN stockprod stk on tjm.IdProducto = stk.IdProducto set tjm.Existencia = stk.Existencia
				WHERE tjm.IdComprarepliegue = ? and tjm.IdCcalidad = ? and tjm.IdSucursal = cmr.IdSucursal  and stk.IdSucursal = tjm.IdSucursal";
			$arrData = array($this->intIdComprarepliegue,$this->intIdCcalidad );
			$request = $this->update($query, $arrData);	
			
			return $request;		

	}





		public function selectIdproducto(int $IdComprarepliegue,int $IdCcalidad)
	{
		$this->intIdComprarepliegue	= $IdComprarepliegue;
		$this->intIdCcalidad		= $IdCcalidad;
		
		
		$query = "SELECT IdProducto FROM detalleccalidad WHERE IdComprarepliegue = $this->intIdComprarepliegue AND IdCcalidad = $this->intIdCcalidad";
		$request = $this->select($query);
		return $request;
		
	}




		public function selectDetallesCompraAdqui(int $intIdComprarepliegue)
	{
		$this->intintIdComprarepliegue 	= $intIdComprarepliegue;
		$query = "SELECT s.Descripcion 'almacen', pro.Descripcion 'proceso',cr.IdTipoIngreso,pv.RazonSocial 'proveedor',tp.Descripcion 'documento',cr.Serie,cr.NroPedido, cr.OrdenCompra,cr.Pecosa,cr.FechaDoc,cr.IdComprarepliegue,p.Descripcion, dtcr.Cantidad ,cr.Estado FROM detallecomprarepliegue dtcr 
					inner join comprarepliegue cr on cr.IdComprarepliegue = dtcr.IdComprarepliegue
					inner join producto p on p.IdProducto = dtcr.IdProducto
					inner join proveedor pv on pv.IdProveedor = cr.IdProveedor
					inner join tipodocumento tp on tp.IdTipoDocumento = cr.IdTipoDocumento
					inner join sucursal s on s.IdSucursal = cr.IdSucursal
                    inner join proceso pro on pro.IdProceso = cr.IdProceso                    
					WHERE cr.IdComprarepliegue = $this->intintIdComprarepliegue";
		$request = $this->select($query);
		return $request;
	}




	public function buscarproductotext(){


		$query = "SELECT Nombres FROM personalsalida";
		$request = $this->select_all($query);
		return $request;

	} 

	public function selectcboCentroConsumo(){

		$query = "SELECT IdCentroConsumo, Descripcion FROM centroconsumo WHERE Estado = 1 ORDER BY IdCentroConsumo";
		$request = $this->select_all($query);
		return $request;

	} 

		public function selectRecibidoPor(int $idconsumo)
	{

		$this->intIdconsumo = $idconsumo;
		$query = "SELECT IdPersonal, Nombres FROM personalsalida WHERE Estado = 1 AND IdCentroConsumo='{$this->intIdconsumo}' ORDER BY IdPersonal";
		$request = $this->select_all($query);
		return $request;

	} 



	public function selectcboEntregadoPor(){

		$query = "SELECT IdPersonal, Nombres FROM personalsalida WHERE Estado = 1 ORDER BY IdPersonal";
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


	


	public function selecttabledetalleingresos(int $idCompra)
	{

		$this->intIdCompra = $idCompra;
		$query = "SELECT c.IdCompra, c.FechaCrea , c.Serie, prod.Descripcion as 'producto',tm.a, tm.b, tm.c ,dc.Cantidad, u.nombre,c.Estado
					from compra c
					inner join detallecompra dc on c.IdCompra = dc.IdCompra
					inner join tarjetamovimiento tm on tm.IdTarjetaMov = dc.IdTarjetaMov
					inner join proveedor p on p.IdProveedor = c.IdProveedor
					inner join producto prod on prod.IdProducto = tm.IdProducto
					inner join usuario u on u.id_usuario = c.UsuarioCrea
					where  c.Estado != 0 and c.IdCompra = '{$this->intIdCompra}'";

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
					where  c.Estado != 0 and c.IdCompra = '{$this->intIdCompra}'";
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
					where  c.Estado != 0 and c.IdCompra = '{$this->intIdCompra}'";
		$request3 = $this->select($query);

		$requestData=[$request,$request2,$request3];

		return $requestData;
	}


	public function insertProveedor(string $razonsocial,int $ruc,int $celular, int $userSession)
	{
		
		
		$this->strRazonSocial	= $razonsocial;
		$this->intRuc 		 	= $ruc;
		$this->intCelular	 	= $celular;
		$this->intUserSession 	= $userSession;

		$queryFamilia = "SELECT IdProveedor FROM proveedor WHERE RazonSocial = '{$this->strRazonSocial}' AND Estado != 0 ";
		$requestFamilia = $this->select($queryFamilia);

		if(empty($requestFamilia)){
			
			$query = "INSERT INTO proveedor(RazonSocial,Ruc,Celular, UsuarioCrea, Estado) VALUES(?,?,?,?,1)";
			$arrData = array( $this->strRazonSocial,$this->intRuc ,$this->intCelular  ,$this->intUserSession);
			$requestInsert = $this->insert($query, $arrData);
			
			return $requestInsert;

		}else{

			return  'exist';
		}
	}


	public function insertSalida(int $cboproceso,  int $cbocconsumo,int $cborecibidopor,int $entregadopor,string $txtfechadoc, string $txtObservaciones, int $UserSession)
	{
		
		$this->intcborecibidopor		 	= $cborecibidopor;
		$this->intentregadopor 			 	= $entregadopor;
		$this->strtxtfechadoc				= $txtfechadoc;
		$this->strtxtObservaciones			= $txtObservaciones;
		$this->intcboproceso 		 		= $cboproceso;		
		$this->cbocconsumo 			 		= $cbocconsumo;
		$this->intUserSession 				= $UserSession;	
		
			
			$query = "INSERT INTO salida (FechaDoc,IdSucursal,IdProceso,IdCentroConsumo,IdPersonalRec,IdPersonalEnt,Observaciones,UsuarioCrea, Estado) VALUES(?,1,?,?,?,?,?,?,1)";
			$arrData = array( $this->strtxtfechadoc, $this->intcboproceso ,$this->cbocconsumo,$this->intcborecibidopor,$this->intentregadopor ,$this->strtxtObservaciones,$this->intUserSession);
			$requestInsert = $this->insert($query, $arrData);
			
			return $requestInsert;

		
	}


	


		public function insertStockProductos(int $idProducto)
	{
		
		$this->intIdProducto		= $idProducto;

			
			$query = "INSERT INTO stockprod(IdSucursal,IdProducto, at,bt,ct,Existencia) values(1,?,0,0,0,0)";
			$arrData = array($this->intIdProducto);
			$requestInsert = $this->insert($query, $arrData);
			
			return $requestInsert;
		
	}


	public function updateStockProductos(int $intCantidadA , int $intCantidadB,int $intCantidadC,int $intEntrada,int $intIdProducto)
	{

		$this->intIdProducto		= $intIdProducto;
		$this->intCantidadA		 	= ($intCantidadA > 0) ? $intCantidadA : 0;
		$this->intCantidadB		 	= ($intCantidadB > 0) ? $intCantidadB : 0;
		$this->intCantidadC 		= ($intCantidadC > 0) ? $intCantidadC : 0;	
		$this->intEntrada	  		= ($intEntrada > 0) ? $intEntrada : 0;
	

			
			$query = "UPDATE stockprod SET at=(at-?), bt=(bt-?), ct=(ct-?),Existencia=(Existencia-?) WHERE IdProducto = ?";
			$arrData = array($this->intCantidadA ,$this->intCantidadB,$this->intCantidadC,$this->intEntrada,$this->intIdProducto);
			$request = $this->update($query, $arrData);

			return $request;

	}


	public function insertTarjetaMovimiento(int $idProducto,  int $idCompra,int $cantA, int $cantB, int $cantC, int $entrada)
	{
		
		$this->intIdProducto		= $idProducto;
		$this->intIdCompra		 	= $idCompra;
		$this->intCantidadA		 	= $cantA;
		$this->intCantidadB		 	= $cantB;
		$this->intCantidadC 		= $cantC;	
		$this->intEntrada	  		= $entrada;

			
			$query = "INSERT INTO tarjetamovimiento (IdSalida,a,b,c,Entrada,IdProducto,IdSucursal,TipoMovimiento,Existencia) VALUES(?,?,?,?,?,?,1,2,0)";
			$arrData = array( $this->intIdCompra, $this->intCantidadA ,$this->intCantidadB,$this->intCantidadC,$this->intEntrada,$this->intIdProducto);
			$requestInsert = $this->insert($query, $arrData);
			
			return $requestInsert;
		
	}




	public function updateTarjetaMovimiento(int $intidcompra)
	{

		$this->intIdCompra		= $intidcompra;

			
			$query = "UPDATE tarjetamovimiento tjm INNER JOIN stockprod stk ON tjm.idProducto = stk.idProducto SET tjm.Existencia = stk.Existencia WHERE tjm.idCompra = ? AND stk.idSucursal = '1'";
			$arrData = array($this->intIdCompra);
			$request = $this->update($query, $arrData);

			return $request;

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