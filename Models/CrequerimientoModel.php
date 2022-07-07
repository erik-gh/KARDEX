<?php 

/**
* 
*/
class CrequerimientoModel extends Mysql
{
	//CONSULTAS A LA BD, PARA RETORNAR AL CONTROLADOR 
	
	

	public function __construct()
	{
		# code...
		parent::__construct();
	}




	public function updateEstadoDespacho(int $id, int $userSession)
	{
		
		$this->intId 			=  $id;
		$this->intUserSession 	= $userSession;
		$fecha = date('Y-m-d H:i:s');
		
			$query 	= "UPDATE requerimiento SET Estado = ? , UsuarioDespacha = ? , FechaDespacha= ? WHERE IdRequerimiento = $this->intId ";
			$arrData= array(3,$this->intUserSession, $fecha);
			$request = $this->update($query, $arrData);

			$query2 	= "UPDATE detallerequerimiento SET Estado = ? , UsuarioDespacha = ? , FechaDespacha = ? WHERE IdRequerimiento = $this->intId ";
			$arrData2= array(3,$this->intUserSession, $fecha);
			$request2 = $this->update($query2, $arrData2);

			
			$requestData=[$request,$request2];

		return $requestData;
			
	}	




		public function UpdateTjmExtReq(int $Id)
	{
		$this->intId	= $Id;
		
				
			$query = " UPDATE tarjetamovimiento tjm 
						INNER JOIN requerimiento r on tjm.IdRequerimiento = r.IdRequerimiento
						INNER JOIN stockprod stk on tjm.IdProducto = stk.IdProducto set tjm.Existencia = stk.Existencia
						WHERE tjm.IdRequerimiento = ? and tjm.IdSucursal = stk.IdSucursal and tjm.kardex = 3";
			$arrData = array($this->intId);
			$request = $this->update($query, $arrData);	
			
			return $request;		

	}



		public function UpdateStockExtornarReq(int $Id)
	{
		$this->intId	= $Id;
		
				
			$query = "UPDATE stockprod stk INNER JOIN tarjetamovimiento tjm ON stk.IdProducto = tjm.IdProducto SET stk.at = (stk.at + tjm.a),
						stk.bt = (stk.bt + tjm.b),stk.ct = (stk.ct + tjm.c), stk.Existencia = (stk.Existencia + tjm.a + tjm.b+tjm.c) 
						WHERE tjm.IdRequerimiento = ? and stk.IdSucursal= tjm.IdSucursal and tjm.kardex = 3";
			$arrData = array($this->intId);
			$request = $this->update($query, $arrData);	
			
			return $request;		

	}

		public function InsertarTarjetaMovExtornarReq(int $id)
	{
		$this->intId = $id;
		

			$query = "INSERT INTO tarjetamovimiento
			(IdSucursal,IdCompra,IdSalida,IdComprarepliegue,IdCcalidad,IdRequerimiento,TipoMovimiento,kardex,a,b,c,at,bt,ct,IdProducto,Entrada,Salida,Existencia,UsuarioCrea,Estado) 
			SELECT r.IdSucursal,0,0,0,0,r.IdRequerimiento,4,3,tjm.a,tjm.b,tjm.c,0,0,0,tjm.IdProducto,(tjm.a+tjm.b+tjm.c),0,0,r.UsuarioExtorna,1        FROM requerimiento r 
						INNER JOIN  tarjetamovimiento tjm on tjm.IdRequerimiento = r.IdRequerimiento
						WHERE tjm.IdRequerimiento = ? ";
			$arrData = array($this->intId);
			$request = $this->update($query, $arrData);	

			return $request;

	}


	public function CambiarEstadoReq(int $id, int $userSession)
	{
		
		$this->intId 			=  $id;
		$this->intUserSession 	= $userSession;
		$fecha = date('Y-m-d H:i:s');
		
			$query 	= "UPDATE requerimiento SET Estado = ? , UsuarioExtorna = ? , FechaExtorna= ? WHERE IdRequerimiento = $this->intId ";
			$arrData= array(4,$this->intUserSession, $fecha);
			$request = $this->update($query, $arrData);

			$query2 	= "UPDATE detallerequerimiento SET Estado = ? , UsuarioExtorna = ? , FechaExtorna = ? WHERE IdRequerimiento = $this->intId ";
			$arrData2= array(4,$this->intUserSession, $fecha);
			$request2 = $this->update($query2, $arrData2);

			
			$requestData=[$request,$request2];

		return $requestData;
			
	}	



	public function insertExtornarReq(int $id,string $Observaciones, int $userSession)
	  {
		
		$this->intid 			= $id;
		$this->strObservaciones	= $Observaciones;
		$this->intUserSession 	= $userSession;

			
			$query = "INSERT INTO extornar(IdIngSalReq,IdTipoExtornar ,Observaciones, UsuarioCrea, Estado) VALUES(?,3,?,?,1)";
			$arrData = array( $this->intid,$this->strObservaciones  ,$this->intUserSession);
			$requestInsert = $this->insert($query, $arrData);
			
			return $requestInsert;

		}


		public function EvaluarEstadoReq(int $Id)
	{
		$this->intId	= $Id;
		
				
			$query = "SELECT  Estado FROM requerimiento WHERE IdRequerimiento  = $this->intId";
							
			$request = $this->select($query);				
			return $request;		

	}

		public function consultareportedetallerequerimiento(int $idReque)
	{
		$this->intidReque	= $idReque;

		$query = "SELECT prod.CodProducto, prod.Descripcion, dtr.Aa, dtr.Ab, dtr.Ac, u.Descripcion as uma
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



		public function consultareportecabecerarequerimiento(int $idReque)
	{
		$this->intidReque	= $idReque;

		$query = "SELECT  rq.IdRequerimiento, pro.Descripcion as proceso, su.Descripcion as sucursal , cc.Descripcion as centro, us.apellido, rq.Fecha
					FROM requerimiento rq
					INNER JOIN detallerequerimiento dtr on rq.IdRequerimiento = dtr.IdRequerimiento
					INNER JOIN proceso pro on pro.IdProceso = rq.IdProceso
					INNER JOIN sucursal su on su.IdSucursal = rq.IdSucursal
					INNER JOIN centroconsumo cc on cc.IdCentroConsumo = rq.IdCentroConsumo
					INNER JOIN usuario us on us.id_usuario = rq.IdUsuario
					WHERE rq.IdRequerimiento  = '{$this->intidReque}'";

		$request = $this->select($query);		

		return $request;


	}


	public function deletereque(int $IdRequerimiento)
	{
		
			$this->intIdRequerimiento	=  $IdRequerimiento;
		
		
			$query 	= "UPDATE requerimiento SET Estado = ? WHERE IdRequerimiento = $this->intIdRequerimiento ";
			$arrData= array(0);
			$request = $this->update($query, $arrData);


			$query2 	= "UPDATE detallerequerimiento SET Estado = ? WHERE IdRequerimiento = $this->intIdRequerimiento ";
			$arrData2= array(0);
			$request2 = $this->update($query2, $arrData2);

			$requestData=[$request,$request2];

			return $requestData;
		
	}



	public function selectEstadoReq(int $IdReq)
	{
		$this->intIdReq	= $IdReq;
		$query = "SELECT * FROM `requerimiento` where IdRequerimiento = $this->intIdReq";
		$request = $this->select($query);
		return $request;
	}




	public function deletefiladetalle(int $idfila)
	{
		
			$this->intidfila	=  $idfila;
		
		
			$query 	= "UPDATE detallerequerimiento SET Estado = ? WHERE IdDetRequerimiento = $this->intidfila ";
			$arrData= array(0);
			$request = $this->update($query, $arrData);
			
			return $request;
		
	}


	public function UpdateTjmReq(int $IdRequerimiento)
	{
		$this->intIdRequerimiento	= $IdRequerimiento;
		
				
			$query = " UPDATE tarjetamovimiento tjm INNER JOIN requerimiento rq on tjm.IdRequerimiento = rq.IdRequerimiento
    			INNER JOIN stockprod stk on tjm.IdProducto = stk.IdProducto set tjm.Existencia = stk.Existencia
                WHERE tjm.IdRequerimiento = ? and tjm.IdSucursal = rq.IdSucursal";
			$arrData = array($this->intIdRequerimiento);
			$request = $this->update($query, $arrData);	
			
			return $request;		

	}



	public function UpdateStockProdReq(int $IdRequerimiento)
	{
		$this->intIdIdRequerimiento	= $IdRequerimiento;
		
				
			$query = "UPDATE stockprod stk INNER JOIN tarjetamovimiento tjm ON stk.IdProducto = tjm.IdProducto SET stk.at = (stk.at - tjm.a),
				stk.bt = (stk.bt - tjm.b),stk.ct = (stk.ct - tjm.c), stk.Existencia = (stk.Existencia - tjm.a - tjm.b-tjm.c) 
				WHERE tjm.IdRequerimiento = ? and stk.IdSucursal= 1";
			$arrData = array($this->intIdIdRequerimiento);
			$request = $this->update($query, $arrData);	
			
			return $request;		

	}



   public function InserintoTjmRequerimiento(int $IdRequerimiento)
	{
		$this->intIdRequerimiento= $IdRequerimiento;
		

			$query = "INSERT INTO tarjetamovimiento(IdSucursal,IdCompra,IdSalida,IdComprarepliegue,IdCcalidad,IdRequerimiento,TipoMovimiento,kardex,a,b,c,at,bt,ct,IdProducto,Entrada,Salida,Existencia,UsuarioCrea,Estado) 
						SELECT r.IdSucursal,0,0,0,0,dtr.IdRequerimiento,4,2,dtr.Aa,dtr.Ab,dtr.Ac,0,0,0,dtr.IdProducto,0,(dtr.Aa+dtr.Ab+dtr.Ac),0,dtr.UsuarioMod,1  
						FROM detallerequerimiento dtr
						INNER JOIN	requerimiento r on dtr.IdRequerimiento = r.IdRequerimiento
						WHERE r.IdRequerimiento = ? and dtr.Estado = 1";
			$arrData = array($this->intIdRequerimiento);
			$request = $this->update($query, $arrData);	


			$query2 = "INSERT INTO stockprod (IdSucursal, IdProducto, at, bt, ct , Existencia , Estado)
						SELECT rq.IdSucursal, T1.IdProducto,0,0,0,0,1 
						FROM tarjetamovimiento T1
						INNER JOIN requerimiento rq on T1.IdRequerimiento = rq.IdRequerimiento
						WHERE T1.IdRequerimiento = ? AND T1.IdProducto NOT IN (SELECT IdProducto FROM stockprod)";
			$arrData2 = array($this->intIdRequerimiento);
			$request2 = $this->insert($query2, $arrData2);	

			$requestData=[$request,$request2];

			return $requestData;


			

	}


	public function updateEstadoReq(int $IdReq, int $userSession)
	{
		$this->intIdIdReq			= $IdReq;
		$this->intUserSession 		= $userSession;
		$fecha = date('Y-m-d H:i:s');
	

			$query 	= "UPDATE requerimiento SET Estado = ? , UsuarioProcesa = ?, FechaProcesa = ?  WHERE IdRequerimiento = $this->intIdIdReq";
			$arrData= array(2,$this->intUserSession,$fecha);
			$request = $this->update($query, $arrData);
			
			return $request;
		
	
	}



	public function updateEstadoDetalleReq(int $IdReq, int $userSession)
	{
		$this->intIdIdReq			= $IdReq;
		$this->intUserSession 		= $userSession;
	

			$query 	= "UPDATE detallerequerimiento SET Estado = ? WHERE Estado = 1 and IdRequerimiento = $this->intIdIdReq";
			$arrData= array(2);
			$request = $this->update($query, $arrData);
			
			return $request;
		
	
	}




	public function UpdateDetallReque(int $idRequerimiento,int $idProducto,int $intCantidadA,int $intCantidadB,int $intCantidadC,int $UserSession)
	{
		
		$this->intIdRequerimiento		= $idRequerimiento;
		$this->intidProducto	 		= $idProducto;
		$this->intCantidadA		 			= ($intCantidadA > 0) ? $intCantidadA : 0;
		$this->intCantidadB		 			= ($intCantidadB > 0) ? $intCantidadB : 0;
		$this->intCantidadC 				= ($intCantidadC > 0) ? $intCantidadC : 0;	
		$this->intUserSession			= $UserSession;	
		

			
			$query = "UPDATE detallerequerimiento set Aa = ? , Ab= ? , Ac = ? , UsuarioMod =?
						where IdProducto = ? and IdRequerimiento  = ? ";
			$arrData = array($this->intCantidadA ,$this->intCantidadB,$this->intCantidadC,$this->intUserSession,$this->intidProducto,$this->intIdRequerimiento);
			$requestInsert = $this->update($query, $arrData);
			
			return $requestInsert;
		
	}




		public function selectDetalleRequerimiento(int $intIdReq)
	{
		$this->intintIdReq 	= $intIdReq;
		$query = "				SELECT rq.IdRequerimiento,rq.NroOrden,p.IdProducto,rq.Alinea,fa.Descripcion as fase, rq.Fecha,rq.Actividad, p.Descripcion, dtr.Cantidad , CONCAT( u.nombre,' ', u.apellido)as nombre, dtr.Estado, proc.Descripcion as 'proceso', 					cc.Descripcion as 'consumo',
					rq.Observaciones
					FROM requerimiento rq
					inner join centroconsumo cc on rq.IdCentroConsumo= cc.IdCentroConsumo
					inner join detallerequerimiento dtr on dtr.IdRequerimiento = rq.IdRequerimiento
					inner join producto p on p.IdProducto = dtr.IdProducto
          inner join proceso proc on rq.IdProceso = proc.IdProceso
					inner join usuario u on rq.IdUsuario = u.id_usuario 
					inner join fase fa on rq.IdFase = fa.IdFase WHERE rq.IdRequerimiento = $this->intintIdReq";
		$request = $this->select($query);
		return $request;
	}



	public function selecttabledetallerequerimientocontrol(int $idRequerimiento)
	{

		$this->intIdCompra = $idRequerimiento;

		$query = "SELECT dtr.IdDetRequerimiento, rq.IdRequerimiento, rq.Fecha, p.IdProducto, p.Descripcion, dtr.Cantidad , CONCAT( u.nombre,' ', u.apellido)as nombre, dtr.Estado, stk.at,stk.bt,stk.ct
					FROM requerimiento rq
					inner join centroconsumo cc on rq.IdCentroConsumo= cc.IdCentroConsumo
					inner join detallerequerimiento dtr on dtr.IdRequerimiento = rq.IdRequerimiento
					inner join producto p on p.IdProducto = dtr.IdProducto
                    inner join stockprod stk on p.IdProducto = stk.IdProducto
					inner join usuario u on rq.IdUsuario = u.id_usuario WHERE rq.Estado != 5  and stk.IdSucursal=1 and rq.IdRequerimiento = '{$this->intIdCompra}'";

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
                    inner join stockprod stk on p.IdProducto = stk.IdProducto
					inner join usuario u on rq.IdUsuario = u.id_usuario WHERE rq.Estado != 5  and stk.IdSucursal=1 and rq.IdRequerimiento = '{$this->intIdCompra}'";

		if(isset($_POST["search"]["value"]))
		{
		 	
		    $query .= " AND p.Descripcion LIKE '%".$_POST["search"]["value"]."%' ";
		}
		$request2 = $this->select($query);

		
		$query = "SELECT COUNT(*) as row FROM requerimiento rq
					inner join centroconsumo cc on rq.IdCentroConsumo= cc.IdCentroConsumo
					inner join detallerequerimiento dtr on dtr.IdRequerimiento = rq.IdRequerimiento
					inner join producto p on p.IdProducto = dtr.IdProducto
                    inner join stockprod stk on p.IdProducto = stk.IdProducto
					inner join usuario u on rq.IdUsuario = u.id_usuario WHERE rq.Estado != 5  and stk.IdSucursal=1 and rq.IdRequerimiento = '{$this->intIdCompra}'";

		$request3 = $this->select($query);

		$requestData=[$request,$request2,$request3];

		return $requestData;
	}


		public function selecttabledetallerequeaprobado(int $idRequerimiento)
	{

		$this->intIdCompra = $idRequerimiento;

		$query = "SELECT dtr.IdDetRequerimiento,p.CodProducto, rq.IdRequerimiento, p.IdProducto, p.Descripcion, dtr.Cantidad ,dtr.Aa,dtr.Ab,dtr.Ac , dtr.Estado
					FROM requerimiento rq
					inner join centroconsumo cc on rq.IdCentroConsumo= cc.IdCentroConsumo
					inner join detallerequerimiento dtr on dtr.IdRequerimiento = rq.IdRequerimiento
					inner join producto p on p.IdProducto = dtr.IdProducto
                    
					inner join usuario u on rq.IdUsuario = u.id_usuario WHERE rq.Estado != 5 and rq.IdRequerimiento = '{$this->intIdCompra}'";

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
                    
					inner join usuario u on rq.IdUsuario = u.id_usuario WHERE rq.Estado != 5 and rq.IdRequerimiento = '{$this->intIdCompra}'";

		if(isset($_POST["search"]["value"]))
		{
		 	
		    $query .= " AND p.Descripcion LIKE '%".$_POST["search"]["value"]."%' ";
		}
		$request2 = $this->select($query);

		
		$query = "SELECT COUNT(*) as row FROM requerimiento rq
					inner join centroconsumo cc on rq.IdCentroConsumo= cc.IdCentroConsumo
					inner join detallerequerimiento dtr on dtr.IdRequerimiento = rq.IdRequerimiento
					inner join producto p on p.IdProducto = dtr.IdProducto
                   
					inner join usuario u on rq.IdUsuario = u.id_usuario WHERE rq.Estado != 5 and rq.IdRequerimiento = '{$this->intIdCompra}'";

		$request3 = $this->select($query);

		$requestData=[$request,$request2,$request3];

		return $requestData;
	}



	public function selecttabletotalrequerimientoscontrol()
	{

		

		$query = "SELECT rq.IdRequerimiento,rq.NroOrden, cc.Descripcion, CONCAT( u.nombre,' ', u.apellido)as nombre, rq.Fecha,rq.FechaProcesa,rq.FechaDespacha,rq.Prioridad,rq.Estado 
				FROM requerimiento rq 
				inner join centroconsumo cc on rq.IdCentroConsumo= cc.IdCentroConsumo
				inner join usuario u on rq.IdUsuario = u.id_usuario WHERE rq.Estado != 5 ";

		if(isset($_POST["search"]["value"]))
		{
		 	
		    $query .= " AND (cc.Descripcion LIKE '%".$_POST["search"]["value"]."%' ";
		     $query .= " OR rq.NroOrden LIKE '%".$_POST["search"]["value"]."%' )";
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
				inner join usuario u on rq.IdUsuario = u.id_usuario WHERE rq.Estado != 4 ";

		if(isset($_POST["search"]["value"]))
		{
		 	
		    $query .= " AND cc.Descripcion LIKE '%".$_POST["search"]["value"]."%' ";
		}
		$request2 = $this->select($query);

		
		$query = "SELECT COUNT(*) as row FROM requerimiento rq 
				inner join centroconsumo cc on rq.IdCentroConsumo= cc.IdCentroConsumo
				inner join usuario u on rq.IdUsuario = u.id_usuario WHERE rq.Estado != 4 ";

		$request3 = $this->select($query);

		$requestData=[$request,$request2,$request3];

		return $requestData;
	}


	public function selecttabletotalrequerimientoscontrolconfirmar()
	{

		

		$query = "SELECT rq.IdRequerimiento, cc.Descripcion, CONCAT( u.nombre,' ', u.apellido)as nombre, rq.Fecha,rq.FechaProcesa,rq.FechaDespacha,rq.Prioridad,rq.Estado 
				FROM requerimiento rq 
				inner join centroconsumo cc on rq.IdCentroConsumo= cc.IdCentroConsumo
				inner join usuario u on rq.IdUsuario = u.id_usuario WHERE rq.Estado != 5 ";

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
				inner join usuario u on rq.IdUsuario = u.id_usuario WHERE rq.Estado != 4 ";

		if(isset($_POST["search"]["value"]))
		{
		 	
		    $query .= " AND cc.Descripcion LIKE '%".$_POST["search"]["value"]."%' ";
		}
		$request2 = $this->select($query);

		
		$query = "SELECT COUNT(*) as row FROM requerimiento rq 
				inner join centroconsumo cc on rq.IdCentroConsumo= cc.IdCentroConsumo
				inner join usuario u on rq.IdUsuario = u.id_usuario WHERE rq.Estado != 4 ";

		$request3 = $this->select($query);

		$requestData=[$request,$request2,$request3];

		return $requestData;
	}





/* ok pooooooooooooooo*/
	
	

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



	public function insertRequerimiento(int $cboproceso,  int $consumo,int $solicitante,int $prioridad,string $txtobservaciones, int $UserSession)
	{
		$this->intcboproceso 		 		= $cboproceso;
		$this->intconsumo		 			= $consumo;	
		$this->intsolicitante		 		= $solicitante;	
		$this->intprioridad			 		= $prioridad;
		$this->strtxtobservaciones			= $txtobservaciones;
		$this->intUserSession 				= $UserSession;	
	
			
			$query = "INSERT INTO requerimiento (IdProceso, IdSucursal,IdCentroConsumo, Prioridad,Observaciones,IdUsuario,Estado) VALUES(?,1,?,?,?,?,1)";
			$arrData = array( $this->intcboproceso, $this->intconsumo ,$this->intprioridad,$this->strtxtobservaciones,$this->intUserSession);
			$requestInsert = $this->insert($query, $arrData);
			
			return $requestInsert;

		
	}


	// saul limitar productos

	public function selecttablebuscarproductosreq()
	{


		$query = "SELECT p.IdProducto, p.Descripcion as 'producto', u.Descripcion as 'uma', c.Descripcion as 'tipo',stk.Existencia, p.Estado
			From producto p 
				inner join uma u on u.IdUma = p.IdUma 
				LEFT join stockprod stk on stk.IdProducto = p.IdProducto
				inner join clase c on c.IdClase = p.IdClase WHERE p.Estado != 0";

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
				inner join clase c on c.IdClase = p.IdClase WHERE p.Estado != 0";
		if(isset($_POST["search"]["value"]))
		{
		 	
		    $query .= " AND p.Descripcion  LIKE '%".$_POST["search"]["value"]."%' ";
		}
		$request2 = $this->select($query);

		
		$query = "SELECT COUNT(*) as row From producto p 
				inner join uma u on u.IdUma = p.IdUma 
				LEFT join stockprod stk on stk.IdProducto = p.IdProducto
				inner join clase c on c.IdClase = p.IdClase WHERE p.Estado != 0";
		$request3 = $this->select($query);

		$requestData=[$request,$request2,$request3];

		return $requestData;
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