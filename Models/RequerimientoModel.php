<?php 

/**
* 
*/
class RequerimientoModel extends Mysql
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


	public function selecttcbolineareque(){

		$query = "SELECT IdPersonal, Nombres FROM personalsalida WHERE Estado = 1 and id_cargo= 91 ORDER BY IdPersonal";
		$request = $this->select_all($query);
		return $request;

	} 


	public function selecttcboturnoreque(){

		$query = "SELECT IdPersonal, Nombres FROM personalsalida WHERE Estado = 1 and id_cargo= 90 ORDER BY IdPersonal";
		$request = $this->select_all($query);
		return $request;

	} 


	public function selectcboFase(){

		$query = "SELECT IdFase, Descripcion FROM fase WHERE Estado = 1 ORDER BY IdFase";
		$request = $this->select_all($query);
		return $request;

	} 

		public function insertAnalistalinea(int $dni,string $nombre,int $idconsumo,int $userSession)
	{
		
		$this->intdni			 	= $dni;
		$this->intnombre			= $nombre;
		$this->intidconsumo			= $idconsumo;
		$this->intUserSession		= $userSession;

			$query = "INSERT INTO personalsalida(Nombres,Dni, IdCentroConsumo, id_cargo,UsuarioCrea, Estado) 
			VALUES(?,?,?,91,?,1)";
			$arrData = array($this->intnombre,$this->intdni, $this->intidconsumo, $this->intUserSession);
			$requestInsert = $this->insert($query, $arrData);


			return $requestInsert;




	}


		public function insertAnalistaturno(int $dni,string $nombre,int $idconsumo,int $userSession)
	{
		
		$this->intdni			 	= $dni;
		$this->intnombre			= $nombre;
		$this->intidconsumo			= $idconsumo;
		$this->intUserSession		= $userSession;

			$query = "INSERT INTO personalsalida(Nombres,Dni, IdCentroConsumo, id_cargo,UsuarioCrea, Estado) 
			VALUES(?,?,?,90,?,1)";
			$arrData = array($this->intnombre,$this->intdni, $this->intidconsumo, $this->intUserSession);
			$requestInsert = $this->insert($query, $arrData);


			return $requestInsert;




	}



	 public function consultareportedetallerequerimientos(int $idReque)
	{
		$this->intidReque	= $idReque;

		$query = "SELECT prod.CodProducto, prod.Descripcion, dtr.Cantidad,dtr.Aa, dtr.Ab, dtr.Ac, u.Descripcion as uma
					FROM requerimiento rq
					INNER JOIN detallerequerimiento dtr on rq.IdRequerimiento = dtr.IdRequerimiento
					INNER JOIN proceso pro on pro.IdProceso = rq.IdProceso
					INNER JOIN sucursal su on su.IdSucursal = rq.IdSucursal
					INNER JOIN centroconsumo cc on cc.IdCentroConsumo = rq.IdCentroConsumo
					INNER JOIN usuario us on us.id_usuario = rq.IdUsuario
					INNER JOIN producto prod on prod.IdProducto = dtr.IdProducto
					INNER JOIN uma u on u.IdUma = prod.IdUma
					WHERE rq.IdRequerimiento  = '{$this->intidReque}'";

		$request = $this->select_all($query);		

		return $request;


	}



	public function consultareportecabecerarequerimientos(int $idReque)
	{
		$this->intidReque	= $idReque;

		$query = "SELECT  rq.IdRequerimiento,rq.Alinea ,rq.Aturno, rq.Turno,rq.NroOrden,rq.Actividad,rq.Cantidad,f.Descripcion as fase,rq.FechaActividad,rq.Observaciones,pro.Descripcion as proceso, su.Descripcion as sucursal , pro.Abreviatura,cc.Descripcion as centro, us.apellido, rq.Fecha
					FROM requerimiento rq
					INNER JOIN detallerequerimiento dtr on rq.IdRequerimiento = dtr.IdRequerimiento
					INNER JOIN proceso pro on pro.IdProceso = rq.IdProceso
					INNER JOIN sucursal su on su.IdSucursal = rq.IdSucursal
					INNER JOIN centroconsumo cc on cc.IdCentroConsumo = rq.IdCentroConsumo
					INNER JOIN fase f on rq.idfase= f.IdFase
					INNER JOIN usuario us on us.id_usuario = rq.IdUsuario
					WHERE rq.IdRequerimiento  = '{$this->intidReque}'";

		$request = $this->select($query);		

		return $request;


	}




	 public function consultareportedetalleformato(int $idformato)
	{
		$this->intidformato	= $idformato;

		$query = "SELECT prod.CodProducto, prod.Descripcion, dtr.Cantidad,dtr.Aa, dtr.Ab, dtr.Ac, u.Descripcion as uma
					FROM formato rq
					INNER JOIN detalleformato dtr on rq.IdFormato = dtr.IdFormato
					INNER JOIN proceso pro on pro.IdProceso = rq.IdProceso
					INNER JOIN sucursal su on su.IdSucursal = rq.IdSucursal
					INNER JOIN centroconsumo cc on cc.IdCentroConsumo = rq.IdCentroConsumo
					INNER JOIN usuario us on us.id_usuario = rq.IdUsuario
					INNER JOIN producto prod on prod.IdProducto = dtr.IdProducto
					INNER JOIN uma u on u.IdUma = prod.IdUma
					WHERE rq.IdFormato  = '{$this->intidformato}'";

		$request = $this->select_all($query);		

		return $request;


	}



	public function consultareportecabeceraformato(int $idformato)
	{
		$this->intidformato	= $idformato;

		$query = "SELECT  rq.IdFormato,rq.Alinea ,rq.Aturno, rq.Turno,rq.NroOrden,rq.Actividad,rq.Cantidad,f.Descripcion as fase,rq.FechaActividad,rq.Observaciones,pro.Descripcion as proceso, su.Descripcion as sucursal , pro.Abreviatura,cc.Descripcion as centro, us.apellido, rq.Fecha
					FROM formato rq
					INNER JOIN detalleformato dtr on rq.IdFormato = dtr.IdFormato
					INNER JOIN proceso pro on pro.IdProceso = rq.IdProceso
					INNER JOIN sucursal su on su.IdSucursal = rq.IdSucursal
					INNER JOIN centroconsumo cc on cc.IdCentroConsumo = rq.IdCentroConsumo
					INNER JOIN fase f on rq.idfase= f.IdFase
					INNER JOIN usuario us on us.id_usuario = rq.IdUsuario
					WHERE rq.IdFormato  = '{$this->intidformato}'";

		$request = $this->select($query);		

		return $request;


	}



	public function selecttabledetallerequerimiento(int $idRequerimiento)
	{

		$this->intIdCompra = $idRequerimiento;

		$query = "SELECT rq.IdRequerimiento, rq.Fecha, p.CodProducto, p.Descripcion, dtr.Cantidad , CONCAT( u.nombre,' ', u.apellido)as nombre, dtr.Estado
					FROM requerimiento rq
					inner join centroconsumo cc on rq.IdCentroConsumo= cc.IdCentroConsumo
					inner join detallerequerimiento dtr on dtr.IdRequerimiento = rq.IdRequerimiento
					inner join producto p on p.IdProducto = dtr.IdProducto
					inner join usuario u on rq.IdUsuario = u.id_usuario WHERE  rq.IdRequerimiento = '{$this->intIdCompra}'";

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
			$query .= ' ORDER BY IdRequerimiento';
		}

		if ( isset( $_POST['start'] ) && $_POST['length'] != '-1' )
		{
			$query .= " LIMIT ".$_POST['start'].", ".$_POST['length'];
		}
		//return $query; exit;
		$request = $this->select_all($query);
	 

		$query = "SELECT COUNT(*) as row FROM requerimiento rq
					inner join centroconsumo cc on rq.IdCentroConsumo= cc.IdCentroConsumo
					inner join detallerequerimiento dtr on dtr.IdRequerimiento = rq.IdRequerimiento
					inner join producto p on p.IdProducto = dtr.IdProducto
					inner join usuario u on rq.IdUsuario = u.id_usuario WHERE rq.Estado != 0 and rq.IdRequerimiento = '{$this->intIdCompra}'";

		if(isset($_POST["search"]["value"]))
		{
		 	
		    $query .= " AND p.Descripcion LIKE '%".$_POST["search"]["value"]."%' ";
		}
		$request2 = $this->select($query);

		
		$query = "SELECT COUNT(*) as row FROM requerimiento rq
					inner join centroconsumo cc on rq.IdCentroConsumo= cc.IdCentroConsumo
					inner join detallerequerimiento dtr on dtr.IdRequerimiento = rq.IdRequerimiento
					inner join producto p on p.IdProducto = dtr.IdProducto
					inner join usuario u on rq.IdUsuario = u.id_usuario WHERE rq.Estado != 0 and rq.IdRequerimiento = '{$this->intIdCompra}'";

		$request3 = $this->select($query);

		$requestData=[$request,$request2,$request3];

		return $requestData;
	}


	public function selecttabledetalleformato(int $idformato)
	{

		$this->intIdCompra = $idformato;

		$query = "SELECT rq.IdFormato, rq.Fecha, p.Descripcion, dtr.Cantidad , CONCAT( u.nombre,' ', u.apellido)as nombre, dtr.Estado
					FROM formato rq
					inner join centroconsumo cc on rq.IdCentroConsumo= cc.IdCentroConsumo
					inner join detalleformato dtr on dtr.IdFormato = rq.IdFormato
					inner join producto p on p.IdProducto = dtr.IdProducto
					inner join usuario u on rq.IdUsuario = u.id_usuario WHERE rq.Estado != 0 and rq.IdFormato = '{$this->intIdCompra}'";

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
			$query .= ' ORDER BY IdFormato';
		}

		if ( isset( $_POST['start'] ) && $_POST['length'] != '-1' )
		{
			$query .= " LIMIT ".$_POST['start'].", ".$_POST['length'];
		}
		//return $query; exit;
		$request = $this->select_all($query);
	 

		$query = "SELECT COUNT(*) as row FROM formato rq
					inner join centroconsumo cc on rq.IdCentroConsumo= cc.IdCentroConsumo
					inner join detalleformato dtr on dtr.IdFormato = rq.IdFormato
					inner join producto p on p.IdProducto = dtr.IdProducto
					inner join usuario u on rq.IdUsuario = u.id_usuario WHERE rq.Estado != 0 and rq.IdFormato = '{$this->intIdCompra}'";

		if(isset($_POST["search"]["value"]))
		{
		 	
		    $query .= " AND p.Descripcion LIKE '%".$_POST["search"]["value"]."%' ";
		}
		$request2 = $this->select($query);

		
		$query = "SELECT COUNT(*) as row FROM formato rq
					inner join centroconsumo cc on rq.IdCentroConsumo= cc.IdCentroConsumo
					inner join detalleformato dtr on dtr.IdFormato = rq.IdFormato
					inner join producto p on p.IdProducto = dtr.IdProducto
					inner join usuario u on rq.IdUsuario = u.id_usuario WHERE rq.Estado != 0 and rq.IdFormato = '{$this->intIdCompra}'";

		$request3 = $this->select($query);

		$requestData=[$request,$request2,$request3];

		return $requestData;
	}

	public function selecttabletotalrequerimientos(int $idusuario)
	{

		$this->intUsuario = $idusuario;

		$query = "SELECT rq.IdRequerimiento, cc.Descripcion, CONCAT( u.nombre,' ', u.apellido)as nombre, rq.Fecha,rq.Prioridad,rq.Estado 
				FROM requerimiento rq 
				inner join centroconsumo cc on rq.IdCentroConsumo= cc.IdCentroConsumo
				inner join usuario u on rq.IdUsuario = u.id_usuario WHERE rq.Estado != 5 AND rq.IdUsuario = '{$this->intUsuario}'";

		if(isset($_POST["search"]["value"]))
		{
		 	
		    $query .= " AND cc.Descripcion LIKE '%".$_POST["search"]["value"]."%' ";
		}

		if(isset($_POST["order"]))
		{
			$query .= ' ORDER BY '.(1+$_POST['order']['0']['column']).' '.$_POST['order']['0']['dir'].' ';
		}
		else
		{
			$query .= ' ORDER BY rq.IdRequerimiento DESC ';
		}

		if ( isset( $_POST['start'] ) && $_POST['length'] != '-1' )
		{
			$query .= " LIMIT ".$_POST['start'].", ".$_POST['length'];
		}
		//return $query; exit;
		$request = $this->select_all($query);
	 

		$query = "SELECT COUNT(*) as row FROM requerimiento rq 
				inner join centroconsumo cc on rq.IdCentroConsumo= cc.IdCentroConsumo
				inner join usuario u on rq.IdUsuario = u.id_usuario WHERE rq.Estado != 5 AND rq.IdUsuario = '{$this->intUsuario}'";

		if(isset($_POST["search"]["value"]))
		{
		 	
		    $query .= " AND cc.Descripcion LIKE '%".$_POST["search"]["value"]."%' ";
		}
		$request2 = $this->select($query);

		
		$query = "SELECT COUNT(*) as row FROM requerimiento rq 
				inner join centroconsumo cc on rq.IdCentroConsumo= cc.IdCentroConsumo
				inner join usuario u on rq.IdUsuario = u.id_usuario WHERE rq.Estado != 5 AND rq.IdUsuario = '{$this->intUsuario}'";

		$request3 = $this->select($query);

		$requestData=[$request,$request2,$request3];

		return $requestData;
	}


		public function selecttabletotalformatos(int $idusuario)
	{

		$this->intUsuario = $idusuario;

		$query = "SELECT rq.IdFormato, cc.Descripcion, CONCAT( u.nombre,' ', u.apellido)as nombre, rq.Fecha,rq.Prioridad,rq.Estado 
				FROM formato rq 
				inner join centroconsumo cc on rq.IdCentroConsumo= cc.IdCentroConsumo
				inner join usuario u on rq.IdUsuario = u.id_usuario WHERE rq.Estado != 4 AND rq.IdUsuario = '{$this->intUsuario}'";

		if(isset($_POST["search"]["value"]))
		{
		 	
		    $query .= " AND cc.Descripcion LIKE '%".$_POST["search"]["value"]."%' ";
		}

		if(isset($_POST["order"]))
		{
			$query .= ' ORDER BY '.(1+$_POST['order']['0']['column']).' '.$_POST['order']['0']['dir'].' ';
		}
		else
		{
			$query .= ' ORDER BY rq.IdFormato DESC ';
		}

		if ( isset( $_POST['start'] ) && $_POST['length'] != '-1' )
		{
			$query .= " LIMIT ".$_POST['start'].", ".$_POST['length'];
		}
		//return $query; exit;
		$request = $this->select_all($query);
	 

		$query = "SELECT COUNT(*) as row FROM formato rq 
				inner join centroconsumo cc on rq.IdCentroConsumo= cc.IdCentroConsumo
				inner join usuario u on rq.IdUsuario = u.id_usuario WHERE rq.Estado != 4 AND rq.IdUsuario = '{$this->intUsuario}'";

		if(isset($_POST["search"]["value"]))
		{
		 	
		    $query .= " AND cc.Descripcion LIKE '%".$_POST["search"]["value"]."%' ";
		}
		$request2 = $this->select($query);

		
		$query = "SELECT COUNT(*) as row FROM formato rq 
				inner join centroconsumo cc on rq.IdCentroConsumo= cc.IdCentroConsumo
				inner join usuario u on rq.IdUsuario = u.id_usuario WHERE rq.Estado != 4 AND rq.IdUsuario = '{$this->intUsuario}'";

		$request3 = $this->select($query);

		$requestData=[$request,$request2,$request3];

		return $requestData;
	}



	public function insertDetalleRequerimiento(int $idRequerimiento, int $idProducto, int $cantidadA)
	{
		
		$this->intidRequerimiento			= $idRequerimiento;
		$this->intidProducto	 			= $idProducto;
		$this->intcantidadA	 				= $cantidadA;
		
			
			$query = "INSERT INTO detallerequerimiento (IdRequerimiento,IdProducto,Cantidad,Estado) VALUES(?,?,?,1)";
			$arrData = array( $this->intidRequerimiento, $this->intidProducto ,$this->intcantidadA);
			$requestInsert = $this->insert($query, $arrData);
			
			return $requestInsert;
		
	}

		public function insertDetalleformato(int $idRequerimiento, int $idProducto, int $cantidadA)
	{
		
		$this->intidRequerimiento			= $idRequerimiento;
		$this->intidProducto	 			= $idProducto;
		$this->intcantidadA	 				= $cantidadA;
		
			
			$query = "INSERT INTO detalleformato(IdFormato,IdProducto,Cantidad,Estado) VALUES(?,?,?,1)";
			$arrData = array( $this->intidRequerimiento, $this->intidProducto ,$this->intcantidadA);
			$requestInsert = $this->insert($query, $arrData);
			
			return $requestInsert;
		
	}



	public function insertRequerimiento(int $cboproceso,  int $consumo,int $fase,string $cantidad,int $solicitante,int $prioridad,int $turno,string $norden,string $actividad,string $fechaactividad,string $alinea,string $aturno,string $txtobservaciones, int $UserSession)
	{
		$this->intcboproceso 		 		= $cboproceso;
		$this->intconsumo		 			= $consumo;	
		$this->intfase	 					= $fase;
		$this->intcantidad	 				= $cantidad;	
		$this->intsolicitante		 		= $solicitante;	
		$this->intprioridad			 		= $prioridad;
		$this->intturno			 			= $turno;
		$this->intnorden			 		= $norden;
		$this->intactividad			 		= $actividad;
		$this->intfechaactividad			= $fechaactividad;
		$this->intalinea			 		= $alinea;
		$this->intaturno			 		= $aturno;
		$this->strtxtobservaciones			= $txtobservaciones;
		$this->intUserSession 				= $UserSession;	
	
			
			$query = "INSERT INTO requerimiento (IdProceso, IdSucursal,IdCentroConsumo,IdFase,Cantidad,Prioridad,Turno,NroOrden,Actividad,FechaActividad,Alinea, Aturno,Observaciones,IdUsuario,Estado) VALUES(?,1,?,?,?,?,?,?,?,?,?,?,?,?,1)";
			$arrData = array( $this->intcboproceso, $this->intconsumo ,$this->intfase,$this->intcantidad ,$this->intprioridad,$this->intturno,$this->intnorden,$this->intactividad,$this->intfechaactividad,$this->intalinea,$this->intaturno,$this->strtxtobservaciones,$this->intUserSession);
			$requestInsert = $this->insert($query, $arrData);
			
			return $requestInsert;

		
	}


	public function insertformato(int $cboproceso,  int $consumo,int $fase,int $cantidad,int $solicitante,int $prioridad,int $turno,string $norden,string $actividad,string $fechaactividad,string $alinea,string $aturno,string $txtobservaciones, int $UserSession)
	{
		$this->intcboproceso 		 		= $cboproceso;
		$this->intconsumo		 			= $consumo;	
		$this->intfase	 					= $fase;
		$this->intcantidad	 				= $cantidad;	
		$this->intsolicitante		 		= $solicitante;	
		$this->intprioridad			 		= $prioridad;
		$this->intturno			 			= $turno;
		$this->intnorden			 		= $norden;
		$this->intactividad			 		= $actividad;
		$this->intfechaactividad			= $fechaactividad;
		$this->intalinea			 		= $alinea;
		$this->intaturno			 		= $aturno;
		$this->strtxtobservaciones			= $txtobservaciones;
		$this->intUserSession 				= $UserSession;	
	
			
			$query = "INSERT INTO formato(IdProceso, IdSucursal,IdCentroConsumo,IdFase,Cantidad,Prioridad,Turno,NroOrden,Actividad,FechaActividad,Alinea, Aturno,Observaciones,IdUsuario,Estado) VALUES(?,1,?,?,?,?,?,?,?,?,?,?,?,?,1)";
			$arrData = array( $this->intcboproceso, $this->intconsumo ,$this->intfase,$this->intcantidad ,$this->intprioridad,$this->intturno,$this->intnorden,$this->intactividad,$this->intfechaactividad,$this->intalinea,$this->intaturno,$this->strtxtobservaciones,$this->intUserSession);
			$requestInsert = $this->insert($query, $arrData);
			
			return $requestInsert;

		
	}


	// saul limitar productos

	public function selecttablebuscarproductosreq()
	{


		$query = "SELECT p.IdProducto, p.CodProducto, p.Descripcion as 'producto', u.Descripcion as 'uma', c.Descripcion as 'tipo',stk.Existencia, p.Estado
			From producto p 
				inner join uma u on u.IdUma = p.IdUma 
				LEFT join stockprod stk on stk.IdProducto = p.IdProducto
				inner join clase c on c.IdClase = p.IdClase WHERE p.Estado != 0 and stk.IdSucursal =1 and c.IdClase in (71,72,73,74,82,81,83,63,66,64,65,62,67,61,91,92,41,102,11,13,33,12,32,112) and p.vista = 0";

		if(isset($_POST["search"]["value"]))
		{
		 	
		    $query .= " AND( p.Descripcion LIKE '%".$_POST["search"]["value"]."%' ";
		    $query .= " OR p.CodProducto LIKE '%".$_POST["search"]["value"]."%' )";
		}

		if(isset($_POST["order"]))
		{
			$query .= ' ORDER BY '.(1+$_POST['order']['0']['column']).' '.$_POST['order']['0']['dir'].' ';
		}
		else
		{
			$query .= ' ORDER BY IdProducto ';
		}

		if ( isset( $_POST['start'] ) && $_POST['length'] != '-1' )
		{
			$query .= " LIMIT ".$_POST['start'].", ".$_POST['length'];
		}
		//return $query; exit;
		$request = $this->select_all($query);
	 

		$query = "SELECT COUNT(*) as row From producto p 
				inner join uma u on u.IdUma = p.IdUma 
				LEFT join stockprod stk on stk.IdProducto = p.IdProducto
				inner join clase c on c.IdClase = p.IdClase WHERE p.Estado != 0 and stk.IdSucursal =1 and c.IdClase in (71,72,73,74,82,81,83,63,66,64,65,62,67,61,91,92,41,102,11,13,33,12,32,112) and p.vista = 0";
		if(isset($_POST["search"]["value"]))
		{
		 	
		    $query .= " AND( p.Descripcion LIKE '%".$_POST["search"]["value"]."%' ";
		    $query .= " OR p.CodProducto LIKE '%".$_POST["search"]["value"]."%' )";
		}
		$request2 = $this->select($query);

		
		$query = "SELECT COUNT(*) as row From producto p 
				inner join uma u on u.IdUma = p.IdUma 
				LEFT join stockprod stk on stk.IdProducto = p.IdProducto
				inner join clase c on c.IdClase = p.IdClase WHERE p.Estado != 0 and stk.IdSucursal =1 and c.IdClase in (71,72,73,74,82,81,83,63,66,64,65,62,67,61,91,92,41,102,11,13,33,12,32,112) and p.vista = 0";
		$request3 = $this->select($query);

		$requestData=[$request,$request2,$request3];

		return $requestData;
	}


	public function selecttablebuscarproductosformato()
	{


		$query = "SELECT p.IdProducto, p.CodProducto, p.Descripcion as 'producto', u.Descripcion as 'uma', c.Descripcion as 'tipo', p.Estado
				From producto p 
				inner join uma u on u.IdUma = p.IdUma 				
				inner join clase c on c.IdClase = p.IdClase WHERE p.Estado != 0 ";

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
			$query .= ' ORDER BY IdProducto ';
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
				inner join clase c on c.IdClase = p.IdClase WHERE p.Estado != 0 ";

		if(isset($_POST["search"]["value"]))
		{
		 	
		    $query .= " AND p.Descripcion  LIKE '%".$_POST["search"]["value"]."%' ";
		}
		$request2 = $this->select($query);

		
		$query = "SELECT COUNT(*) as row 
				From producto p 
				inner join uma u on u.IdUma = p.IdUma 				
				inner join clase c on c.IdClase = p.IdClase WHERE p.Estado != 0 ";	

		$request3 = $this->select($query);

		$requestData=[$request,$request2,$request3];

		return $requestData;
	}





	public function selectllenarproductorequerimiento(int $idtarjetaproducto)
	{
		$this->intIdTarjetaProducto = $idtarjetaproducto;
		$query = "SELECT p.IdProducto, p.CodProducto, p.Descripcion as 'producto', u.Descripcion as 'uma',
					 c.Descripcion as 'tipo',stk.at, stk.bt,stk.ct,(stk.Existencia-(IFNULL(dtr.Cantidad,0))) as 'Existencia', stk.Existencia AS 'Existencia2',dtr.Cantidad As 'canDtr',p.Estado 
					 FROM producto p inner join uma u on u.IdUma = p.IdUma 
					 INNER JOIN clase c on c.IdClase = p.IdClase 
					 LEFT JOIN (SELECT SUM(IFNULL(Cantidad,0)) AS Cantidad, IdProducto FROM detallerequerimiento WHERE Estado = 1 GROUP BY IdProducto) dtr on dtr.IdProducto = p.IdProducto
					 LEFT join stockprod stk on stk.IdProducto = p.IdProducto
					 WHERE p.Estado != 0 and stk.IdSucursal=1 and p.IdProducto in ('{$this->intIdTarjetaProducto}')
					 ORDER BY dtr.IdProducto ASC";

		$request = $this->select($query);
		return $request;
	}


		public function selectllenarproductoformato(int $idtarjetaproducto)
	{
		$this->intIdTarjetaProducto = $idtarjetaproducto;
		$query = "SELECT p.IdProducto, p.Descripcion as 'producto', u.Descripcion as 'uma',
					 c.Descripcion as 'tipo',p.Estado 
					 FROM producto p inner join uma u on u.IdUma = p.IdUma 
					 INNER JOIN clase c on c.IdClase = p.IdClase					 
					 WHERE p.Estado != 0 and p.IdProducto in ('{$this->intIdTarjetaProducto}')
					 ORDER BY p.IdProducto ASC";

		$request = $this->select($query);
		return $request;
	}

	public function updatecantidad2(int $idRequerimiento)
	{
		$this->intIdRequerimiento = $idRequerimiento;

			$query = "UPDATE detallerequerimiento SET Cantidad=Cantidad WHERE IdRequerimiento=?";
			$arrData = array($this->intIdRequerimiento);
			$request = $this->update($query, $arrData);

		return $request;
	}



	public function selectUsuario(int $idUsuario)
	{
		$this->IntidUsuario	= $idUsuario;

		$query = "SELECT CONCAT( u.nombre,' ', u.apellido)as nombre, cc.Descripcion ,cc.IdCentroConsumo FROM usuario u inner join centroconsumo cc
					on cc.IdCentroConsumo = u.IdCentroConsumo where u.id_usuario= '$this->IntidUsuario' ";
		$request = $this->select($query);
		return $request;
	}

	



}


?>