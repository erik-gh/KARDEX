<?php 

/**
* 
*/
class ProductoModel extends Mysql
{
	//CONSULTAS A LA BD, PARA RETORNAR AL CONTROLADOR 
	
	private $intControl;	
	private $intIdProyecto;
	private $strDescripcion;
	private $strDetalle;


	public function __construct()
	{
		# code...
		parent::__construct();
	}


		public function deletealmacen(int $idsucursal)
	{
		$this->intIdSucursal 	=  $idsucursal;
		
		$queryPersonal 	= "SELECT IdSucursal FROM compra WHERE IdSucursal = $this->intIdSucursal AND Estado != 0 ";
		$requestPersonal = $this->select($queryPersonal);

		if(empty($requestPersonal)){
			$query 	= "UPDATE sucursal SET Estado = ? WHERE IdSucursal = $this->intIdSucursal ";
			$arrData= array(0);
			$request = $this->update($query, $arrData);
			
			return $request;
		}else{

			return  'exist';
		}
	}


	public function deleteCconsumo(int $idCconsumo)
	{
		$this->intIdConsumo 	=  $idCconsumo;
		
		$queryPersonal 	= "SELECT IdPersonal FROM personalsalida WHERE IdCentroConsumo = $this->intIdConsumo AND Estado != 0 ";
		$requestPersonal = $this->select($queryPersonal);

		if(empty($requestPersonal)){
			$query 	= "UPDATE centroconsumo SET Estado = ? WHERE IdCentroConsumo = $this->intIdConsumo ";
			$arrData= array(0);
			$request = $this->update($query, $arrData);
			
			return $request;
		}else{

			return  'exist';
		}
	}


	public function deleteDocumento(int $idCconsumo)
	{
		$this->intIdConsumo 	=  $idCconsumo;
		
		$queryPersonal 	= "SELECT IdTipoDocumento FROM compra WHERE IdTipoDocumento = $this->intIdConsumo AND Estado != 0 ";
		$requestPersonal = $this->select($queryPersonal);

		if(empty($requestPersonal)){
			$query 	= "UPDATE tipodocumento SET Estado = ? WHERE IdTipoDocumento = $this->intIdConsumo ";
			$arrData= array(0);
			$request = $this->update($query, $arrData);
			
			return $request;
		}else{

			return  'exist';
		}
	}


	public function updateCconsumo(int $idCconsumo, string $consumo,  int $userSession, int $estado)
	{

		$this->intIdCconsumo		= $idCconsumo;
		$this->strconsumo 			= $consumo;		
		$this->intUserSession 		= $userSession;
		$this->intEstado 			= $estado;

		$queryCargo = "SELECT * FROM centroconsumo WHERE Descripcion = '{$this->strconsumo}' AND IdCentroConsumo != $this->intIdCconsumo AND estado != 0 ";
		$requestCargo = $this->select($queryCargo);

		if(empty($requestCargo)){
			
			$query = "UPDATE centroconsumo SET Descripcion = ?,  UsuarioCrea = ?, Estado = ? WHERE IdCentroConsumo = $this->intIdCconsumo";
			$arrData = array($this->strconsumo,  $this->intUserSession, $this->intEstado);
			$request = $this->update($query, $arrData);

			
			return $request;

		}else{
			
			return  'exist';

		}
	}



	public function selectCconsumoedit(int $idconsumo)
	{
		$this->intIdconsumo	= $idconsumo;
		$query = "SELECT * FROM centroconsumo WHERE IdCentroConsumo = $this->intIdconsumo";
		$request = $this->select($query);
		return $request;
	}

	public function insertCconsumo(string $consumo, int $userSession)
	{
		
		$this->strconsumo		= $consumo;		
		$this->intUserSession 	= $userSession;

		$queryCargo = "SELECT IdCentroConsumo FROM centroconsumo WHERE Descripcion = '{$this->strconsumo}' AND Estado != 0 ";
		$requestCargo = $this->select($queryCargo);

		if(empty($requestCargo)){
			
			$query = "INSERT INTO centroconsumo(Descripcion,UsuarioCrea, Estado) VALUES(?,?,1)";
			$arrData = array($this->strconsumo, $this->intUserSession);
			$requestInsert = $this->insert($query, $arrData);
			
			return $requestInsert;

		}else{

			return  'exist';
		}
	}



	public function selectCconsumo()
	{


		$query = "SELECT IdCentroConsumo,Descripcion,Estado FROM centroconsumo
					where Estado  != 0";

		if(isset($_POST["search"]["value"]))
		{
		 	
		    $query .= " AND Descripcion LIKE '%".$_POST["search"]["value"]."%' ";
		}

		if(isset($_POST["order"]))
		{
			$query .= ' ORDER BY '.(1+$_POST['order']['0']['column']).' '.$_POST['order']['0']['dir'].' ';
		}
		else
		{
			$query .= ' ORDER BY IdCentroConsumo';
		}

		if ( isset( $_POST['start'] ) && $_POST['length'] != '-1' )
		{
			$query .= " LIMIT ".$_POST['start'].", ".$_POST['length'];
		}
		//return $query; exit;
		$request = $this->select_all($query);
	 

		$query = "SELECT COUNT(*) as row FROM centroconsumo
					where Estado  != 0";
		if(isset($_POST["search"]["value"]))
		{
		 	
		    $query .= " AND Descripcion LIKE '%".$_POST["search"]["value"]."%' ";
		}
		$request2 = $this->select($query);

		
		$query = "SELECT COUNT(*) as row FROM centroconsumo
					where Estado  != 0";
		$request3 = $this->select($query);

		$requestData=[$request,$request2,$request3];

		return $requestData;
	}



		public function insertProyecto( string $descripcion,string $detalles, int $userSession)
	{
		
		
		$this->strDescripcion	= $descripcion;
		$this->strDetalles		= $detalles;
		$this->intUserSession 	= $userSession;

		$queryProyecto = "SELECT idproyecto FROM proyecto WHERE descripcion = '{$this->strDescripcion}' AND estado != 0 ";
		$requestProyecto = $this->select($queryProyecto);

		if(empty($requestProyecto)){
			
			$query = "INSERT INTO proyecto(descripcion,detalles, user_create, estado) VALUES(?,?,?,1)";
			$arrData = array( $this->strDescripcion,$this->strDetalles ,$this->intUserSession);
			$requestInsert = $this->insert($query, $arrData);
			
			return $requestInsert;

		}else{

			return  'exist';
		}
	}

		public function insertFamilia( string $descripcion, int $userSession)
	{
		
		
		$this->strDescripcion	= $descripcion;
		$this->intUserSession 	= $userSession;

		$queryFamilia = "SELECT IdFamilia FROM familia WHERE Descripcion = '{$this->strDescripcion}' AND estado != 0 ";
		$requestFamilia = $this->select($queryFamilia);

		if(empty($requestFamilia)){
			
			$query = "INSERT INTO familia(Descripcion, UsuarioCrea, Estado) VALUES(?,?,1)";
			$arrData = array( $this->strDescripcion ,$this->intUserSession);
			$requestInsert = $this->insert($query, $arrData);
			
			return $requestInsert;

		}else{

			return  'exist';
		}
	}

	public function insertUma( string $descripcion, int $userSession)
	{
		
		
		$this->strDescripcion	= $descripcion;
		$this->intUserSession 	= $userSession;

		$queryUma = "SELECT IdUma FROM uma WHERE Descripcion = '{$this->strDescripcion}' AND estado != 0 ";
		$requestUma = $this->select($queryUma);

		if(empty($requestUma)){
			
			$query = "INSERT INTO uma(Descripcion, UsuarioCrea, Estado) VALUES(?,?,1)";
			$arrData = array( $this->strDescripcion ,$this->intUserSession);
			$requestInsert = $this->insert($query, $arrData);
			
			return $requestInsert;

		}else{

			return  'exist';
		}
	}


	public function insertalmacen( string $descripcion, int $userSession)
	{
		
		
		$this->strDescripcion	= $descripcion;
		$this->intUserSession 	= $userSession;

		$queryalmacen = "SELECT IdSucursal FROM sucursal WHERE Descripcion = '{$this->strDescripcion}' AND Estado != 0 ";
		$requestalmacen = $this->select($queryalmacen);

		if(empty($requestalmacen)){
			
			$query = "INSERT INTO sucursal(Descripcion, UsuarioCrea, Estado) VALUES(?,?,1)";
			$arrData = array( $this->strDescripcion ,$this->intUserSession);
			$requestInsert = $this->insert($query, $arrData);
			
			return $requestInsert;

		}else{

			return  'exist';
		}
	}


		public function insertdocumento(string $descripcion, int $userSession)
	{
		
		
		$this->strDescripcion	= $descripcion;
		$this->intUserSession 	= $userSession;

		$querydocumento = "SELECT IdTipoDocumento FROM tipodocumento WHERE Descripcion = '{$this->strDescripcion}' AND Estado != 0 ";
		$resquestdocumento = $this->select($querydocumento);

		if(empty($resquestdocumento)){
			
			$query = "INSERT INTO tipodocumento(Descripcion, UsuarioCrea, Estado) VALUES(?,?,1)";
			$arrData = array( $this->strDescripcion ,$this->intUserSession);
			$requestInsert = $this->insert($query, $arrData);
			
			return $requestInsert;

		}else{

			return  'exist';
		}
	}




		public function insertProceso( string $descripcion, string $fechainicio,string $fechafin, int $userSession)
	{
		
		
		$this->strDescripcion	= $descripcion;
		$this->strFechaInicio	= $fechainicio;
		$this->strFechaFin		= $fechafin;
		$this->intUserSession 	= $userSession;

		$queryProceso = "SELECT IdProceso FROM proceso WHERE Descripcion = '{$this->strDescripcion}' AND estado != 0 ";
		$requestProceso = $this->select($queryProceso);

		if(empty($requestProceso)){
			
			$query = "INSERT INTO proceso(Descripcion,FechaInicio,FechaFin, UsuarioCrea, Estado) VALUES(?,?,?,?,1)";
			$arrData = array( $this->strDescripcion ,$this->strFechaInicio,$this->strFechaFin,$this->intUserSession);
			$requestInsert = $this->insert($query, $arrData);
			
			return $requestInsert;

		}else{

			return  'exist';
		}
	}



	public function deleteProceso(int $idproceso)
	{
		$this->intIdProceso 	=  $idproceso;
		
		$queryProceso  	= "SELECT IdProceso FROM compra WHERE IdProceso ='{$this->intIdProceso}' AND Estado != 0 ";
		$requestProcesos = $this->select($queryProceso);

		if(empty($requestProcesos)){
			$query 	= "UPDATE proceso SET Estado = ? WHERE IdProceso = $this->intIdProceso";
			$arrData= array(0);
			$request = $this->update($query, $arrData);
			
			return $request;

		}else{

			return  'existss';
		}
	}

	public function deleteProducto(int $Idproducto)
	{
		$this->intIdproducto 	=  $Idproducto;
		
		$queryProducto  	= "SELECT IdProducto FROM detallecompra WHERE IdProducto ='{$this->intIdproducto}' AND Estado != 0 ";
		$requestProducto    = $this->select($queryProducto);

		if(empty($requestProducto)){
			$query 	= "UPDATE producto SET Estado = ? WHERE IdProducto = $this->intIdproducto";
			$arrData= array(0);
			$request = $this->update($query, $arrData);
			
			return $request;
			
		}else{

			return  'exist';
		}
	}


	public function deleteClase(int $IdClase)
	{
		$this->intIdClase 	=  $IdClase;
		
		$queryUma		  	= "SELECT IdClase FROM producto WHERE IdClase ='{$this->intIdClase}' AND Estado != 0 ";
		$requestUma    		= $this->select($queryUma);

		if(empty($requestUma)){
			$query 	= "UPDATE clase SET Estado = ? WHERE IdClase = $this->intIdClase";
			$arrData= array(0);
			$request = $this->update($query, $arrData);
			
			return $request;
			
		}else{

			return  'exist';
		}
	}



	public function deleteUma(int $IdUma)
	{
		$this->intIdUma 	=  $IdUma;
		
		$queryUma		  	= "SELECT IdUma FROM producto WHERE IdUma ='{$this->intIdUma}' AND Estado != 0 ";
		$requestUma    		= $this->select($queryUma);

		if(empty($requestUma)){
			$query 	= "UPDATE uma SET Estado = ? WHERE IdUma = $this->intIdUma";
			$arrData= array(0);
			$request = $this->update($query, $arrData);
			
			return $request;
			
		}else{

			return  'exist';
		}
	}

		public function insertClase( string $descripcion, $IdFamilia,int $userSession)
	{
		
		
		$this->strDescripcion	= $descripcion;
		$this->intUserSession 	= $userSession;
		$this->intIdFamilia 	= $IdFamilia;

		$queryClase = "SELECT IdClase FROM clase WHERE Descripcion = '{$this->strDescripcion}' AND Estado != 0 ";
		$requestClase = $this->select($queryClase);

		if(empty($requestClase)){
			
			$query = "INSERT INTO clase(Descripcion,IdFamilia ,UsuarioCrea, Estado) VALUES(?,?,?,1)";
			$arrData = array( $this->strDescripcion ,$this->intIdFamilia,$this->intUserSession);
			$requestInsert = $this->insert($query, $arrData);
			
			return $requestInsert;

		}else{

			return  'exist';
		}
	}
	


		public function selectFamiliass()
	{


		$query = "SELECT IdFamilia,  Descripcion, Estado FROM familia WHERE Estado != 0";

		if(isset($_POST["search"]["value"]))
		{
		 	
		    $query .= " AND Descripcion LIKE '%".$_POST["search"]["value"]."%' ";
		}

		if(isset($_POST["order"]))
		{
			$query .= ' ORDER BY '.(1+$_POST['order']['0']['column']).' '.$_POST['order']['0']['dir'].' ';
		}
		else
		{
			$query .= ' ORDER BY IdFamilia ';
		}

		if ( isset( $_POST['start'] ) && $_POST['length'] != '-1' )
		{
			$query .= " LIMIT ".$_POST['start'].", ".$_POST['length'];
		}
		//return $query; exit;
		$request = $this->select_all($query);
	 

		$query = "SELECT COUNT(*) as row FROM familia WHERE Estado != 0 ";
		if(isset($_POST["search"]["value"]))
		{
		 	
		    $query .= " AND Descripcion LIKE '%".$_POST["search"]["value"]."%' ";
		}
		$request2 = $this->select($query);

		
		$query = "SELECT COUNT(*) as row FROM familia WHERE Estado != 0";
		$request3 = $this->select($query);

		$requestData=[$request,$request2,$request3];

		return $requestData;
	}



	public function selectPersonalsalida()
	{


		$query = "SELECT ps.IdPersonal, ps.Nombres, ps.Dni, cc.Descripcion, c.cargo , ps.Estado FROM personalsalida ps
					inner join centroconsumo cc on ps.IdCentroConsumo = cc.IdCentroConsumo
					inner join cargo c on c.id_cargo = ps.id_cargo
					WHERE ps.Estado != 0";

		if(isset($_POST["search"]["value"]))
		{
		 	
		    $query .= " AND ps.Nombres LIKE '%".$_POST["search"]["value"]."%' ";
		}

		if(isset($_POST["order"]))
		{
			$query .= ' ORDER BY '.(1+$_POST['order']['0']['column']).' '.$_POST['order']['0']['dir'].' ';
		}
		else
		{
			$query .= ' ORDER BY IdPersonal ';
		}

		if ( isset( $_POST['start'] ) && $_POST['length'] != '-1' )
		{
			$query .= " LIMIT ".$_POST['start'].", ".$_POST['length'];
		}
		//return $query; exit;
		$request = $this->select_all($query);
	 

		$query = "SELECT COUNT(*) as row FROM personalsalida ps
					inner join centroconsumo cc on ps.IdCentroConsumo = cc.IdCentroConsumo
					inner join cargo c on c.id_cargo = ps.id_cargo
					WHERE ps.Estado != 0 ";
		if(isset($_POST["search"]["value"]))
		{
		 	
		    $query .= " AND ps.Nombres LIKE '%".$_POST["search"]["value"]."%' ";
		}
		$request2 = $this->select($query);

		
		$query = "SELECT COUNT(*) as row FROM personalsalida ps
					inner join centroconsumo cc on ps.IdCentroConsumo = cc.IdCentroConsumo
					inner join cargo c on c.id_cargo = ps.id_cargo
					WHERE ps.Estado != 0";
		$request3 = $this->select($query);

		$requestData=[$request,$request2,$request3];

		return $requestData;
	}





	public function selectUmass()
	{


		$query = "SELECT IdUma,  Descripcion, Estado FROM uma WHERE Estado != 0";

		if(isset($_POST["search"]["value"]))
		{
		 	
		    $query .= " AND Descripcion LIKE '%".$_POST["search"]["value"]."%' ";
		}

		if(isset($_POST["order"]))
		{
			$query .= ' ORDER BY '.(1+$_POST['order']['0']['column']).' '.$_POST['order']['0']['dir'].' ';
		}
		else
		{
			$query .= ' ORDER BY IdUma ';
		}

		if ( isset( $_POST['start'] ) && $_POST['length'] != '-1' )
		{
			$query .= " LIMIT ".$_POST['start'].", ".$_POST['length'];
		}
		//return $query; exit;
		$request = $this->select_all($query);
	 

		$query = "SELECT COUNT(*) as row FROM uma WHERE Estado != 0 ";
		if(isset($_POST["search"]["value"]))
		{
		 	
		    $query .= " AND Descripcion LIKE '%".$_POST["search"]["value"]."%' ";
		}
		$request2 = $this->select($query);

		
		$query = "SELECT COUNT(*) as row FROM uma WHERE Estado != 0";
		$request3 = $this->select($query);

		$requestData=[$request,$request2,$request3];

		return $requestData;
	}


	public function selectAlmacens()
	{


		$query = "SELECT IdSucursal,  Descripcion, Estado FROM sucursal WHERE Estado != 0";

		if(isset($_POST["search"]["value"]))
		{
		 	
		    $query .= " AND Descripcion LIKE '%".$_POST["search"]["value"]."%' ";
		}

		if(isset($_POST["order"]))
		{
			$query .= ' ORDER BY '.(1+$_POST['order']['0']['column']).' '.$_POST['order']['0']['dir'].' ';
		}
		else
		{
			$query .= ' ORDER BY IdSucursal ';
		}

		if ( isset( $_POST['start'] ) && $_POST['length'] != '-1' )
		{
			$query .= " LIMIT ".$_POST['start'].", ".$_POST['length'];
		}
		//return $query; exit;
		$request = $this->select_all($query);
	 

		$query = "SELECT COUNT(*) as row FROM sucursal WHERE Estado != 0 ";
		if(isset($_POST["search"]["value"]))
		{
		 	
		    $query .= " AND Descripcion LIKE '%".$_POST["search"]["value"]."%' ";
		}
		$request2 = $this->select($query);

		
		$query = "SELECT COUNT(*) as row FROM sucursal WHERE Estado != 0";
		$request3 = $this->select($query);

		$requestData=[$request,$request2,$request3];

		return $requestData;
	}


	public function selectDocumentos()
	{


		$query = "SELECT IdTipoDocumento, Descripcion, Estado FROM tipodocumento WHERE Estado != 0";

		if(isset($_POST["search"]["value"]))
		{
		 	
		    $query .= " AND Descripcion LIKE '%".$_POST["search"]["value"]."%' ";
		}

		if(isset($_POST["order"]))
		{
			$query .= ' ORDER BY '.(1+$_POST['order']['0']['column']).' '.$_POST['order']['0']['dir'].' ';
		}
		else
		{
			$query .= ' ORDER BY IdTipoDocumento ';
		}

		if ( isset( $_POST['start'] ) && $_POST['length'] != '-1' )
		{
			$query .= " LIMIT ".$_POST['start'].", ".$_POST['length'];
		}
		//return $query; exit;
		$request = $this->select_all($query);
	 

		$query = "SELECT COUNT(*) as row FROM tipodocumento WHERE Estado != 0";
		if(isset($_POST["search"]["value"]))
		{
		 	
		    $query .= " AND Descripcion LIKE '%".$_POST["search"]["value"]."%' ";
		}
		$request2 = $this->select($query);

		
		$query = "SELECT COUNT(*) as row FROM tipodocumento WHERE Estado != 0";
		$request3 = $this->select($query);

		$requestData=[$request,$request2,$request3];

		return $requestData;
	}






	public function selectProcesos()
	{


		$query = "SELECT IdProceso,  Descripcion,FechaInicio,FechaFin, Estado FROM proceso WHERE Estado != 0";

		if(isset($_POST["search"]["value"]))
		{
		 	
		    $query .= " AND Descripcion LIKE '%".$_POST["search"]["value"]."%' ";
		}

		if(isset($_POST["order"]))
		{
			$query .= ' ORDER BY '.(1+$_POST['order']['0']['column']).' '.$_POST['order']['0']['dir'].' ';
		}
		else
		{
			$query .= ' ORDER BY IdProceso ';
		}

		if ( isset( $_POST['start'] ) && $_POST['length'] != '-1' )
		{
			$query .= " LIMIT ".$_POST['start'].", ".$_POST['length'];
		}
		//return $query; exit;
		$request = $this->select_all($query);
	 

		$query = "SELECT COUNT(*) as row FROM uma WHERE Estado != 0 ";
		if(isset($_POST["search"]["value"]))
		{
		 	
		    $query .= " AND Descripcion LIKE '%".$_POST["search"]["value"]."%' ";
		}
		$request2 = $this->select($query);

		
		$query = "SELECT COUNT(*) as row FROM proceso WHERE Estado != 0";
		$request3 = $this->select($query);

		$requestData=[$request,$request2,$request3];

		return $requestData;
	}

	public function selectClases()
	{


		$query = "SELECT c.IdClase, c.Descripcion as 'Clase', f.Descripcion as 'Familia', c.Estado as 'Estado' from clase c 
					inner join familia f on f.IdFamilia = c.IdFamilia WHERE c.Estado != 0";

		if(isset($_POST["search"]["value"]))
		{
		 	
		    $query .= " AND c.Descripcion LIKE '%".$_POST["search"]["value"]."%' ";
		}

		if(isset($_POST["order"]))
		{
			$query .= ' ORDER BY '.(1+$_POST['order']['0']['column']).' '.$_POST['order']['0']['dir'].' ';
		}
		else
		{
			$query .= ' ORDER BY c.IdClase ';
		}

		if ( isset( $_POST['start'] ) && $_POST['length'] != '-1' )
		{
			$query .= " LIMIT ".$_POST['start'].", ".$_POST['length'];
		}
		//return $query; exit;
		$request = $this->select_all($query);
	 

		$query = "SELECT COUNT(*) as row FROM clase c 
					inner join familia f on f.IdFamilia = c.IdFamilia WHERE c.Estado != 0 ";
		if(isset($_POST["search"]["value"]))
		{
		 	
		    $query .= " AND c.Descripcion LIKE '%".$_POST["search"]["value"]."%' ";
		}
		$request2 = $this->select($query);

		
		$query = "SELECT COUNT(*) as row FROM clase WHERE Estado != 0";
		$request3 = $this->select($query);

		$requestData=[$request,$request2,$request3];

		return $requestData;
	}

	public function selectProductos()
	{


		$query = "SELECT p.CodProducto as 'codigo', p.IdProducto, p.Descripcion as 'producto' , c.Descripcion as 'clase', 
					u.Descripcion as 'uma' , p.Estado
					FROM producto p
					inner join clase c on p.IdClase = c.IdClase
					inner join uma u on u.IdUma = p.IdUma  WHERE p.Estado != 0";

		if(isset($_POST["search"]["value"]))
		{
		 	
		    $query .= " AND (p.Descripcion LIKE '%".$_POST["search"]["value"]."%' ";
		    $query .= " OR p.CodProducto LIKE '%".$_POST["search"]["value"]."%' )";
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
		 	
		    $query .= " AND (p.Descripcion LIKE '%".$_POST["search"]["value"]."%' ";
		    $query .= " OR p.CodProducto LIKE '%".$_POST["search"]["value"]."%' )";
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


		public function selectPersonals(int $idPersonal)
	{
		$this->intIdPersonal 	= $idPersonal;
		$query = "SELECT * FROM personalsalida WHERE IdPersonal = $this->intIdPersonal";
		$request = $this->select($query);
		return $request;
	}


	

	public function updateFamilia(int $IdFamilia, string $Descripcion,int $estado)
	{

		$this->intIdFamilia 	= $IdFamilia;
		$this->strDescripcion 	= $Descripcion;
		$this->intestado		= $estado;
	

		$queryFamilia = "SELECT * FROM familia WHERE Descripcion = '{$this->strDescripcion}' AND IdFamilia != $this->intIdFamilia AND Estado != 0 ";
		$requestFamilia = $this->select($queryFamilia);

		if(empty($requestFamilia)){
			
			$query = "UPDATE familia SET descripcion = ? , Estado = ? WHERE IdFamilia = $this->intIdFamilia";
			$arrData = array($this->strDescripcion,$this->intestado);
			$request = $this->update($query, $arrData);

			return $request;

		}else{
			
			return  'exist';

		}
	}

	public function updateUma(int $IdUma, string $Descripcion,int $estado)
	{

		$this->intIdUma			= $IdUma;
		$this->strDescripcion 	= $Descripcion;
		$this->intestado		= $estado;
	

		$queryUma = "SELECT * FROM uma WHERE Descripcion = '{$this->strDescripcion}' AND IdUma != $this->intIdUma AND Estado != 0 ";
		$requestUma = $this->select($queryUma);

		if(empty($requestUma)){
			
			$query = "UPDATE uma SET descripcion = ? , Estado = ? WHERE IdUma = $this->intIdUma";
			$arrData = array($this->strDescripcion,$this->intestado);
			$request = $this->update($query, $arrData);

			return $request;

		}else{
			
			return  'exist';

		}
	}


	public function updateAlmacen(int $IdAlmacen, string $Descripcion,int $estado, int $Usuario)
	{

		$this->intIdAlmacen			= $IdAlmacen;
		$this->strDescripcion 		= $Descripcion;
		$this->intestado			= $estado;
		$this->intUsuario			= $Usuario;
	

		$queryAlmacen = "SELECT * FROM sucursal WHERE Descripcion = '{$this->strDescripcion}' AND IdSucursal != $this->intIdAlmacen AND Estado != 0 ";
		$resquestAlmacen = $this->select($queryAlmacen);

		if(empty($resquestAlmacen)){
			
			$query = "UPDATE sucursal SET descripcion = ? , Estado = ? , UsuarioCrea = ? WHERE IdSucursal = $this->intIdAlmacen";
			$arrData = array($this->strDescripcion,$this->intestado,$this->intUsuario);
			$request = $this->update($query, $arrData);

			return $request;

		}else{
			
			return  'exist';

		}
	}


	public function updatedocumento(int $IdDocumento, string $Descripcion,int $estado, int $Usuario)
	{

		$this->intIdDocumento			= $IdDocumento;
		$this->strDescripcion 		= $Descripcion;
		$this->intestado			= $estado;
		$this->intUsuario			= $Usuario;
	

		$queryAlmacen = "SELECT * FROM tipodocumento WHERE Descripcion = '{$this->strDescripcion}' AND IdTipoDocumento != $this->intIdDocumento AND Estado != 0 ";
		$resquestAlmacen = $this->select($queryAlmacen);

		if(empty($resquestAlmacen)){
			
			$query = "UPDATE tipodocumento SET descripcion = ? , Estado = ? , UsuarioCrea = ? WHERE Idtipodocumento = $this->intIdDocumento";
			$arrData = array($this->strDescripcion,$this->intestado,$this->intUsuario);
			$request = $this->update($query, $arrData);

			return $request;

		}else{
			
			return  'exist';

		}
	}


	public function updateProceso( int $idproceso, string $descripcion, string $fechainicio,string $fechafin,int $estado , int $userSession)
	{
		
		$this->intProceso		= $idproceso;
		$this->strDescripcion	= $descripcion;
		$this->strFechaInicio	= $fechainicio;
		$this->strFechaFin		= $fechafin;
		$this->intEstado		= $estado;
		$this->intUserSession 	= $userSession;
	

		$queryUma = "SELECT * FROM proceso WHERE Descripcion = '{$this->strDescripcion}' AND IdProceso != $this->intProceso AND Estado != 0 ";
		$requestUma = $this->select($queryUma);

		if(empty($requestUma)){
			
			$query = "UPDATE proceso SET Descripcion = ? , FechaInicio = ?, FechaFin = ? ,Estado = ?  WHERE IdProceso = $this->intProceso";
			$arrData = array($this->strDescripcion, $this->strFechaInicio,$this->strFechaFin,$this->intEstado);
			$request = $this->update($query, $arrData);

			return $request;

		}else{
			
			return  'exist';

		}
	}



	public function updateClase(int $IdClase, string $Descripcion, int $IdFamilia ,int $estado)
	{

		$this->intIdClase 	    = $IdClase;
		$this->strDescripcion 	= $Descripcion;
		$this->intIdFamilia 	= $IdFamilia;
		$this->intEstado	    = $estado;
	

		$queryLote = "SELECT * FROM clase WHERE Descripcion = '{$this->strDescripcion}' AND IdClase != $this->intIdClase AND Estado != 0 ";
		$requestLote = $this->select($queryLote);

		if(empty($requestLote)){
			
			$query = "UPDATE clase SET Descripcion = ? , IdFamilia=? , Estado = ? WHERE IdClase = $this->intIdClase";
			$arrData = array($this->strDescripcion,$this->intIdFamilia, $this->intEstado);
			$request = $this->update($query, $arrData);

			return $request;

		}else{
			
			return  'exist';

		}
	}


	

	public function selectFamilia(int $idfamilia)
	{
		$this->intIdFamilia	= $idfamilia;
		$query = "SELECT * FROM familia WHERE IdFamilia = $this->intIdFamilia";
		$request = $this->select($query);
		return $request;
	}


	public function selectUma(int $iduma)
	{
		$this->intIdUma	= $iduma;
		$query = "SELECT * FROM uma WHERE IdUma = $this->intIdUma";
		$request = $this->select($query);
		return $request;
	}

	public function selectAlmacen(int $idalmacen)
	{
		$this->intidalmacen	= $idalmacen;
		$query = "SELECT * FROM sucursal WHERE IdSucursal = $this->intidalmacen";
		$request = $this->select($query);
		return $request;
	}


	public function selectidDocumento(int $documento)
	{
		$this->intdocumento	= $documento;
		$query = "SELECT * FROM tipodocumento WHERE IdTipoDocumento = $this->intdocumento";
		$request = $this->select($query);
		return $request;
	}


		public function selectProceso(int $idproceso)
	{
		$this->intIdProceso	= $idproceso;
		$query = "SELECT * FROM proceso WHERE IdProceso = $this->intIdProceso";
		$request = $this->select($query);
		return $request;
	}


		public function selectClase(int $idClase)
	{
		$this->intIdClase	= $idClase;
		$query = "SELECT c.descripcion as 'nombreclase', c.IdFamilia , c.Estado FROM clase c
					inner join familia f on f.IdFamilia= c.IdFamilia WHERE IdClase = $this->intIdClase";
		$request = $this->select($query);
		return $request;
	}






		public function deleteFamilia(int $IdFamilia)
	{
		
		$this->intIdFamilia 	=  $IdFamilia;
		
		$queryfamilia		  	= "SELECT IdFamilia FROM clase WHERE IdFamilia ='{$this->intIdFamilia}' AND Estado != 0 ";
		$requestfamilia    		= $this->select($queryfamilia);

		if(empty($requestfamilia)){
			$query 	= "UPDATE familia SET Estado = ? WHERE IdFamilia = $this->intIdFamilia ";
			$arrData= array(0);
			$request = $this->update($query, $arrData);
			
			return $request;
			
		}else{

			return  'exist';
		}	
		
			
		
	}

			public function deletePersonal(int $IdPersonal)
	{
		
			$this->intIdPersonal 	=  $IdPersonal;
		
		
			$query 	= "UPDATE personalsalida SET Estado = ? WHERE IdPersonal = $this->intIdPersonal ";
			$arrData= array(0);
			$request = $this->update($query, $arrData);
			
			return $request;
		
	}






		public function selectcboFamilias()
		{

		$query = "SELECT IdFamilia, Descripcion FROM familia WHERE Estado = 1 	 ORDER BY IdFamilia ";
		$request = $this->select_all($query);
		return $request;

		} 

	public function selectcboClases(){

		$query = "SELECT IdClase, Descripcion FROM clase WHERE Estado = 1  ORDER BY IdClase";
		$request = $this->select_all($query);
		return $request;

	} 

	public function selectcboUmas(){

		$query = "SELECT IdUma, Descripcion FROM uma WHERE Estado = 1   ORDER BY IdUma";
		$request = $this->select_all($query);
		return $request;

	} 


	public function selectcboConsumo(){

		$query = "SELECT IdCentroConsumo, Descripcion FROM centroconsumo WHERE Estado = 1   ORDER BY IdCentroConsumo";
		$request = $this->select_all($query);
		return $request;

	} 


	public function selectcboCargo(){

		$query = "SELECT id_cargo, cargo FROM cargo WHERE estado = 1   ORDER BY id_cargo";
		$request = $this->select_all($query);
		return $request;

	} 

	

	



	public function insertProducto(string $Descripcion,string $Codigo,int $IdClase,int $IdUma,int $userSession)
	{
		
		
		$this->intDescripcion		= $Descripcion;
		$this->intCodigo			= $Codigo;
		$this->intIdClase			= $IdClase;
		$this->intIdUma				= $IdUma;
		$this->intUserSession		= $userSession;



		$queryPersonal = "SELECT IdProducto FROM producto WHERE CodProducto = $this->intCodigo or Descripcion ='$this->intDescripcion' ";
		$requestPersona = $this->select($queryPersonal);

		if(empty($requestPersona)){
			
			$query = "INSERT INTO producto(Descripcion,CodProducto, IdClase, IdUma,UsuarioCrea, Estado) 
			VALUES(?,?,?,?,?,1)";
			$arrData = array($this->intDescripcion,$this->intCodigo, $this->intIdClase, $this->intIdUma, $this->intUserSession);
			$requestInsert = $this->insert($query, $arrData);
			
			return $requestInsert;

		}else{

			return  'exist';
		}			

	}


		public function insertPersonalsalida(int $dni,string $nombre,int $idconsumo,int $idcargo,int $userSession)
	{
		
		$this->intdni			 	= $dni;
		$this->intnombre			= $nombre;
		$this->intidconsumo			= $idconsumo;
		$this->intidcargo			= $idcargo;
		$this->intUserSession		= $userSession;

			$query = "INSERT INTO personalsalida(Nombres,Dni, IdCentroConsumo, id_cargo,UsuarioCrea, Estado) 
			VALUES(?,?,?,?,?,1)";
			$arrData = array($this->intnombre,$this->intdni, $this->intidconsumo, $this->intidcargo, $this->intUserSession);
			$requestInsert = $this->insert($query, $arrData);


			return $requestInsert;




	}

		public function updateProducto(int $IdProducto,string $Descripcion,string $Codigo,	int $IdClase,int $IdUma,int $idEstado,int $userSession)
	{

		$this->intIdProducto 		= $IdProducto;
		$this->intDescripcion		= $Descripcion;
		$this->intCodigo			= $Codigo;
		$this->intIdClase			= $IdClase;
		$this->intIdUma				= $IdUma;
		$this->intEstado			= $idEstado;
		$this->intUserSession		= $userSession;

		
		$queryProducto = "SELECT * FROM producto WHERE Descripcion = '{$this->intDescripcion}' AND IdProducto != $this->intIdProducto AND Estado != 0 ";
		$requestProducto = $this->select($queryProducto);

		if(empty($requestProducto)){
			
			$query = "UPDATE producto SET Descripcion = ?, CodProducto = ?,IdClase = ?, IdUma = ? , Estado = ? , UsuarioCrea = ? WHERE IdProducto = $this->intIdProducto";
			$arrData = array($this->intDescripcion,$this->intCodigo, $this->intIdClase, $this->intIdUma,$this->intEstado, $this->intUserSession);
			$request = $this->update($query, $arrData);



				return $request;

			//return $request,$requestInsert2;

		}else{
			
			return  'exist';

		}
	}



		public function updatePersonalsalida(int $IdPersonal,int $dni,string $nombres,int $consumo,int $cargo,int $estado,int $userSession)
	{

		$this->intIdPersonal		= $IdPersonal;
		$this->intnombres			= $nombres;
		$this->intdni				= $dni;
		$this->intconsumo			= $consumo;
		$this->intcargo				= $cargo;
		$this->intestado			= $estado;
		$this->intUserSession		= $userSession;

		
		$queryPersonal = "SELECT * FROM personalsalida WHERE Nombres = '{$this->intnombres}' AND IdPersonal != $this->intIdPersonal	 AND Estado != 0 ";
		$requestPersonal = $this->select($queryPersonal);

		if(empty($requestPersonal)){
			
			$query = "UPDATE personalsalida SET Dni = ?, Nombres = ?,IdCentroConsumo = ?, id_cargo = ? ,Estado = ?, UsuarioCrea = ? WHERE IdPersonal = $this->intIdPersonal";
			$arrData = array($this->intdni,$this->intnombres, $this->intconsumo, $this->intcargo, $this->intestado, $this->intUserSession);
			$request = $this->update($query, $arrData);



				return $request;

			

		}else{
			
			return  'exist';

		}
	}




















}


?>