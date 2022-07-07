<?php 

/**
* 
*/
class SalidaModel extends Mysql
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

		public function UpdateTjmExtSal(int $Id)
	{
		$this->intId	= $Id;
		
				
			$query = " UPDATE tarjetamovimiento tjm 
						INNER JOIN salida s on tjm.IdSalida = s.IdSalida
						INNER JOIN stockprod stk on tjm.IdProducto = stk.IdProducto set tjm.Existencia = stk.Existencia
						WHERE tjm.IdSalida = ? and tjm.IdSucursal = stk.IdSucursal and tjm.kardex = 3";
			$arrData = array($this->intId);
			$request = $this->update($query, $arrData);	
			
			return $request;		

	}


		public function UpdateStockExtornarSal(int $Id)
	{
		$this->intId	= $Id;
		
				
			$query = "UPDATE stockprod stk INNER JOIN tarjetamovimiento tjm ON stk.IdProducto = tjm.IdProducto SET stk.at = (stk.at + tjm.a),
						stk.bt = (stk.bt + tjm.b),stk.ct = (stk.ct + tjm.c), stk.Existencia = (stk.Existencia + tjm.a + tjm.b+tjm.c) 
						WHERE tjm.IdSalida = ? and stk.IdSucursal= tjm.IdSucursal and tjm.kardex = 3";
			$arrData = array($this->intId);
			$request = $this->update($query, $arrData);	
			
			return $request;		

	}

	public function InsertarTarjetaMovExtornarSal(int $id)
	{
		$this->intId = $id;
		

			$query = "INSERT INTO tarjetamovimiento
			(IdSucursal,IdCompra,IdSalida,IdComprarepliegue,IdCcalidad,IdRequerimiento,TipoMovimiento,kardex,a,b,c,at,bt,ct,IdProducto,Entrada,Salida,Existencia,UsuarioCrea,Estado) 
			SELECT s.IdSucursal,0,s.IdSalida,0,0,0,5,3,tjm.a,tjm.b,tjm.c,0,0,0,tjm.IdProducto,(tjm.a+tjm.b+tjm.c),0,0,s.UsuarioMod,1  
						FROM salida s 
						INNER JOIN  tarjetamovimiento tjm on tjm.IdSalida = s.IdSalida
						WHERE tjm.IdSalida = ? ";
			$arrData = array($this->intId);
			$request = $this->update($query, $arrData);	

			return $request;

	}

	public function CambiarEstadoSal(int $id, int $userSession)
	{
		
		$this->intId 			=  $id;
		$this->intUserSession 	= $userSession;
		$fecha = date('Y-m-d');
		
			$query 	= "UPDATE salida SET Estado = ? , UsuarioMod = ? , FechaMod= ? WHERE IdSalida = $this->intId ";
			$arrData= array(0,$this->intUserSession, $fecha);
			$request = $this->update($query, $arrData);

			$query2 	= "UPDATE detallesalida SET Estado = ? , UsuarioMod = ? , FechaMod= ? WHERE IdSalida = $this->intId ";
			$arrData2= array(0,$this->intUserSession, $fecha);
			$request2 = $this->update($query2, $arrData2);

			
			$requestData=[$request,$request2];

		return $requestData;
			
	}	


	
	public function insertExtornarSal(int $id,string $Observaciones, int $userSession)
	  {
		
		$this->intid 			= $id;
		$this->strObservaciones	= $Observaciones;
		$this->intUserSession 	= $userSession;

			
			$query = "INSERT INTO extornar(IdIngSalReq,IdTipoExtornar ,Observaciones, UsuarioCrea, Estado) VALUES(?,2,?,?,1)";
			$arrData = array( $this->intid,$this->strObservaciones  ,$this->intUserSession);
			$requestInsert = $this->insert($query, $arrData);
			
			return $requestInsert;

		}



	public function EvaluarEstado(int $Id)
	{
		$this->intId	= $Id;
		
				
			$query = "SELECT  Estado FROM salida WHERE IdSalida  = $this->intId";
							
			$request = $this->select($query);				
			return $request;		

	}




		public function selecttabletotalsalidas()
	{


		$query = "SELECT sl.IdSalida,sl.Serie, ccm.Descripcion 'centroconsumo',sl.FechaCrea, s.Descripcion 'sucursal' , pro.Descripcion 'proceso', ps.Nombres 'personalrec' , u.nombre, sl.Estado FROM salida sl
					inner join centroconsumo ccm on ccm.IdCentroConsumo = sl.IdCentroConsumo
					inner join sucursal s on s.IdSucursal =sl.IdSucursal
					inner join proceso pro on pro.IdProceso = sl.IdProceso
					inner join usuario u on u.id_usuario = sl.UsuarioCrea
					inner join personalsalida ps on ps.IdPersonal = sl.IdPersonalRec
					";

		if(isset($_POST["search"]["value"]))
		{
		 	
		    $query .= " AND( ccm.Descripcion LIKE '%".$_POST["search"]["value"]."%' ";
		    $query .= " OR sl.Serie LIKE '%".$_POST["search"]["value"]."%' )";
		}

		if(isset($_POST["order"]))
		{
			$query .= ' ORDER BY '.(1+$_POST['order']['0']['column']).' '.$_POST['order']['0']['dir'].' ';
		}
		else
		{
			$query .= ' ORDER BY sl.IdSalida desc';
		}

		if ( isset( $_POST['start'] ) && $_POST['length'] != '-1' )
		{
			$query .= " LIMIT ".$_POST['start'].", ".$_POST['length'];
		}
		//return $query; exit;
		$request = $this->select_all($query);
	 

		$query = "SELECT COUNT(*) as row FROM salida sl
					inner join centroconsumo ccm on ccm.IdCentroConsumo = sl.IdCentroConsumo
					inner join sucursal s on s.IdSucursal =sl.IdSucursal
					inner join proceso pro on pro.IdProceso = sl.IdProceso
					inner join usuario u on u.id_usuario = sl.UsuarioCrea
					inner join personalsalida ps on ps.IdPersonal = sl.IdPersonalRec
					WHERE sl.Estado != 0";
		if(isset($_POST["search"]["value"]))
		{
		 	
		     $query .= " AND( ccm.Descripcion LIKE '%".$_POST["search"]["value"]."%' ";
		     $query .= " OR sl.Serie LIKE '%".$_POST["search"]["value"]."%' )";

		}
		$request2 = $this->select($query);

		
		$query = "SELECT COUNT(*) as row FROM salida sl
					inner join centroconsumo ccm on ccm.IdCentroConsumo = sl.IdCentroConsumo
					inner join sucursal s on s.IdSucursal =sl.IdSucursal
					inner join proceso pro on pro.IdProceso = sl.IdProceso
					inner join usuario u on u.id_usuario = sl.UsuarioCrea
					inner join personalsalida ps on ps.IdPersonal = sl.IdPersonalRec
					WHERE sl.Estado != 0";
		$request3 = $this->select($query);

		$requestData=[$request,$request2,$request3];

		return $requestData;
	}


	public function consultareportecabecera(int $idsalida)
	{
		$this->intIdSalida	= $idsalida;

		$query = "SELECT sa.IdSalida,proc.Descripcion,s.Descripcion 'sucursal',cc.Descripcion as 'centroconsumo' ,sa.FechaCrea ,  prod.Descripcion as 'producto',
				tm.a, tm.b, tm.c ,ds.Cantidad, u.nombre,sa.Estado
					from salida sa
					inner join detallesalida ds on sa.IdSalida = ds.IdSalida
					inner join tarjetamovimiento tm on tm.IdTarjetaMov = ds.IdTarjetaMov
					inner join producto prod on prod.IdProducto = tm.IdProducto
					inner join usuario u on u.id_usuario = sa.UsuarioCrea
                    inner join proceso proc on proc.IdProceso = sa.IdProceso
                    inner join centroconsumo cc on cc.IdCentroConsumo = sa.IdCentroConsumo
                    inner join sucursal s on s.IdSucursal = sa.IdSucursal
                    where sa.IdSalida = '{$this->intIdSalida}'";
		$request = $this->select($query);		

		return $request;


	}


public function consultareportedetalle(int $idsalida)
	{
		$this->intIdSalida	= $idsalida;


		$query = "SELECT prod.CodProducto ,prod.descripcion as 'producto', tm.a, tm.b,tm.c , um.Descripcion as 'uma' FROM detallesalida ds 
				inner join tarjetamovimiento tm on tm.IdTarjetaMov = ds.IdTarjetaMov
				inner join producto prod on prod.IdProducto = tm.IdProducto 
				inner join uma um on um.IdUma = prod.IdUma where ds.IdSalida = '{$this->intIdSalida}'";
		$request = $this->select_all($query);		

		return $request;


	}


	public function selecttabledetallesalidas(int $idSalida)
	{

		$this->intidSalida = $idSalida;
		$query = "SELECT s.IdSalida,s.FechaCrea , pro.Descripcion , tm.a, tm.b, tm.c, ds.Cantidad , us.nombre , s.Estado from salida s
					inner join detallesalida ds on ds.IdSalida = s.IdSalida
					inner join producto pro on pro.IdProducto = ds.IdProducto
					inner join tarjetamovimiento tm on tm.IdTarjetaMov = ds.IdTarjetaMov
					inner join usuario us on us.id_usuario = s.UsuarioCrea where s.Estado != 0 and s.IdSalida = '{$this->intidSalida}'";

		if(isset($_POST["search"]["value"]))
		{
		 	
		    $query .= " AND pro.Descripcion LIKE '%".$_POST["search"]["value"]."%' ";
		}

		if(isset($_POST["order"]))
		{
			$query .= ' ORDER BY '.(1+$_POST['order']['0']['column']).' '.$_POST['order']['0']['dir'].' ';
		}
		else
		{
			$query .= ' ORDER BY s.IdSalida ';
		}

		if ( isset( $_POST['start'] ) && $_POST['length'] != '-1' )
		{
			$query .= " LIMIT ".$_POST['start'].", ".$_POST['length'];
		}
		//return $query; exit;
		$request = $this->select_all($query);
	 

		$query = "SELECT COUNT(*) as row from salida s
					inner join detallesalida ds on ds.IdSalida = s.IdSalida
					inner join producto pro on pro.IdProducto = ds.IdProducto
					inner join tarjetamovimiento tm on tm.IdTarjetaMov = ds.IdTarjetaMov
					inner join usuario us on us.id_usuario = s.UsuarioCrea where  s.Estado != 0 and s.IdSalida = '{$this->intidSalida}'";
		if(isset($_POST["search"]["value"]))
		{
		 	
		    $query .= " AND pro.Descripcion LIKE '%".$_POST["search"]["value"]."%' ";
		}
		$request2 = $this->select($query);

		
		$query = "SELECT COUNT(*) as row from salida s
					inner join detallesalida ds on ds.IdSalida = s.IdSalida
					inner join producto pro on pro.IdProducto = ds.IdProducto
					inner join tarjetamovimiento tm on tm.IdTarjetaMov = ds.IdTarjetaMov
					inner join usuario us on us.id_usuario = s.UsuarioCrea where s.Estado != 0 and s.IdSalida = '{$this->intidSalida}'";
		$request3 = $this->select($query);

		$requestData=[$request,$request2,$request3];

		return $requestData;
	}



	public function buscarproductotext(string $texto){


		$query = "SELECT p.IdProducto, p.Descripcion as 'producto' From producto p
					inner join uma u on u.IdUma = p.IdUma
					inner join clase c on c.IdClase = p.IdClase
					WHERE p.Estado != 0 AND p.Descripcion like '%".$texto."%'";
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

		$query = "SELECT IdPersonal, Nombres FROM personalsalida WHERE Estado = 1 and id_cargo= 91 ORDER BY IdPersonal";
		$request = $this->select_all($query);
		return $request;

	} 

		public function selectcboRecibidoPor(){

		$query = "SELECT IdPersonal, Nombres FROM personalsalida WHERE Estado = 1 and id_cargo= 90 ORDER BY IdPersonal";
		$request = $this->select_all($query);
		return $request;

	} 


	public function selectcboEntregadoPorSalida(){

		$query = "SELECT IdPersonal, Nombres FROM personalsalida WHERE Estado = 1  ORDER BY IdPersonal";
		$request = $this->select_all($query);
		return $request;

	} 

	public function selectcboRecibidoPorSalida(){

		$query = "SELECT IdPersonal, Nombres FROM personalsalida WHERE Estado = 1  ORDER BY IdPersonal";
		$request = $this->select_all($query);
		return $request;

	} 

	//Evaluar
	public function selecttcboturno(){

		$query = "SELECT IdPersonal, Nombres FROM personalsalida WHERE Estado = 1 and id_cargo= 90 ORDER BY IdPersonal";
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


	public function selecttablebuscarproductossalida()
	{


		$query = "SELECT p.IdProducto,p.CodProducto, p.Descripcion as 'producto', u.Descripcion as 'uma', c.Descripcion as 'tipo',stk.Existencia, p.Estado
						From producto p 
						inner join uma u on u.IdUma = p.IdUma 
						inner join clase c on c.IdClase = p.IdClase 
						LEFT join stockprod stk on stk.IdProducto = p.IdProducto
						WHERE p.Estado != 0 AND (stk.IdSucursal = 1 OR ISNULL(stk.IdSucursal))";

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
			$query .= ' ORDER BY stk.Existencia ';
		}

		if ( isset( $_POST['start'] ) && $_POST['length'] != '-1' )
		{
			$query .= " LIMIT ".$_POST['start'].", ".$_POST['length'];
		}
		//return $query; exit;
		$request = $this->select_all($query);
	 

		$query = "SELECT COUNT(*) as row
						From producto p 
						inner join uma u on u.IdUma = p.IdUma 
						inner join clase c on c.IdClase = p.IdClase 
						LEFT join stockprod stk on stk.IdProducto = p.IdProducto
						WHERE p.Estado != 0 AND (stk.IdSucursal = 1 OR ISNULL(stk.IdSucursal))";
		if(isset($_POST["search"]["value"]))
		{
		 	
		    $query .= " AND p.Descripcion  LIKE '%".$_POST["search"]["value"]."%' ";
		}
		$request2 = $this->select($query);

		
		$query = "SELECT COUNT(*) as row 
				From producto p 
						inner join uma u on u.IdUma = p.IdUma 
						inner join clase c on c.IdClase = p.IdClase 
						LEFT join stockprod stk on stk.IdProducto = p.IdProducto
						WHERE p.Estado != 0 AND (stk.IdSucursal = 1 OR ISNULL(stk.IdSucursal))";
		$request3 = $this->select($query);

		$requestData=[$request,$request2,$request3];

		return $requestData;
	}






	public function insertSalida(int $cboproceso,  int $cbocconsumo,int $cborecibidopor,int $entregadopor,string $txtfechadoc, string $txtObservaciones, string $txtserie, int $UserSession)
	{
		
		$this->intcborecibidopor		 	= $cborecibidopor;
		$this->intentregadopor 			 	= $entregadopor;
		$this->strtxtfechadoc				= $txtfechadoc;
		$this->strtxtObservaciones			= $txtObservaciones;
		$this->strtxtSerie					= $txtserie;
		$this->intcboproceso 		 		= $cboproceso;		
		$this->cbocconsumo 			 		= $cbocconsumo;
		$this->intUserSession 				= $UserSession;	
		
			
			$query = "INSERT INTO salida (FechaDoc,IdSucursal,IdProceso,IdCentroConsumo,IdPersonalRec,IdPersonalEnt,Serie,Observaciones,UsuarioCrea, Estado) VALUES(?,1,?,?,?,?,?,?,?,1)";
			$arrData = array( $this->strtxtfechadoc, $this->intcboproceso ,$this->cbocconsumo,$this->intcborecibidopor,$this->intentregadopor ,$this->strtxtSerie,$this->strtxtObservaciones,$this->intUserSession);
			$requestInsert = $this->insert($query, $arrData);
			
			return $requestInsert;

		
	}


		public function selectStockProductos(int $idProducto)
	{

		$this->intIdProducto		= $idProducto;

		
		$query = "SELECT COUNT(IdStockProd) AS IdStockProd FROM stockprod WHERE IdSucursal = 1 AND IdProducto = $this->intIdProducto";
		$request = $this->select($query);
		return $request;
		
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
	

			
			$query = "UPDATE stockprod SET at=(at-?), bt=(bt-?), ct=(ct-?),Existencia=(Existencia-?) WHERE IdProducto = ? and IdSucursal = 1";
			$arrData = array($this->intCantidadA ,$this->intCantidadB,$this->intCantidadC,$this->intEntrada,$this->intIdProducto);
			$request = $this->update($query, $arrData);

			return $request;

	}


	public function insertTarjetaMovimiento(int $idProducto,  int $idCompra,int $cantA, int $cantB, int $cantC, int $salida,int $Usuario)
	{
		
		$this->intIdProducto		= $idProducto;
		$this->intIdCompra		 	= $idCompra;
		$this->intCantidadA		 	= $cantA;
		$this->intCantidadB		 	= $cantB;
		$this->intCantidadC 		= $cantC;	
		$this->intSalida	  		= $salida;
		$this->intUsuario	  		= $Usuario;

			
			$query = "INSERT INTO tarjetamovimiento (IdSalida,a,b,c,Salida,IdProducto,IdSucursal,TipoMovimiento,kardex,Existencia,UsuarioCrea,Estado) VALUES(?,?,?,?,?,?,1,5,2,0,?,1)";
			$arrData = array( $this->intIdCompra, $this->intCantidadA ,$this->intCantidadB,$this->intCantidadC,$this->intSalida,$this->intIdProducto,$this->intUsuario);
			$requestInsert = $this->insert($query, $arrData);
			
			return $requestInsert;
		
	}




	public function updateTarjetaMovimiento(int $intidcompra)
	{

		$this->intIdCompra		= $intidcompra;

			
			$query = "UPDATE tarjetamovimiento tjm INNER JOIN stockprod stk ON tjm.IdProducto = stk.IdProducto SET tjm.Existencia = stk.Existencia WHERE tjm.IdSalida = ? AND stk.IdSucursal = '1'";
			$arrData = array($this->intIdCompra);
			$request = $this->update($query, $arrData);

			return $request;

	}



	public function insertDetalleSalida(int $idSalida, int $idProducto, int $idtarjetamov, int $Entrada)
	{
		
		$this->intidSalida			= $idSalida;
		$this->intidProducto	 	= $idProducto;
		$this->intidtarjetamov	 	= $idtarjetamov;
		$this->intEntrada		 	= $Entrada;
		
			
			$query = "INSERT INTO detallesalida (IdSalida,IdProducto,IdTarjetaMov,Cantidad,Estado) VALUES(?,?,?,?,1)";
			$arrData = array( $this->intidSalida, $this->intidProducto ,$this->intidtarjetamov,$this->intEntrada);
			$requestInsert = $this->insert($query, $arrData);
			
			return $requestInsert;
		
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
		$query = "SELECT p.IdProducto, p.Descripcion as 'producto', u.Descripcion as 'uma', c.Descripcion as 'tipo',stk.at, stk.bt,stk.ct,stk.Existencia,p.Estado
			From producto p inner join uma u on u.IdUma = p.IdUma inner join clase c on c.IdClase = p.IdClase LEFT join stockprod stk on stk.IdProducto = p.IdProducto 
			WHERE p.Estado != 0 and p.IdProducto in ('{$this->intIdTarjetaProducto}')";

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