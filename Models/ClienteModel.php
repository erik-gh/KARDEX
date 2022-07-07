<?php 

/**
* 
*/
class ClienteModel extends Mysql
{
	//CONSULTAS A LA BD, PARA RETORNAR AL CONTROLADOR 
	
	private $intControl;	
	private $intIdCliente;
	private $strNombre;
	private $strDni;
	private $intIdProducto;


	public function __construct()
	{
		# code...
		parent::__construct();
	}





	public function selectClientes()
	{

		$query = "SELECT IdCliente, Nombre,  Dni, Celular, Correo, Contacto  FROM cliente WHERE estado != 0 ";
		if(isset($_POST["search"]["value"]))
		{
		 	
		    $query .= "AND Nombre LIKE '%".$_POST["search"]["value"]."%' ";
		}

		if(isset($_POST["order"]))
		{
			$query .= ' ORDER BY '.(1+$_POST['order']['0']['column']).' '.$_POST['order']['0']['dir'].' ';
		}
		else
		{
			$query .= ' ORDER BY IdCliente ';
		}

		if ( isset( $_POST['start'] ) && $_POST['length'] != '-1' )
		{
			$query .= " LIMIT ".$_POST['start'].", ".$_POST['length'];
		}
		//return $query; exit;
		$request = $this->select_all($query);
	

		$query = "SELECT COUNT(*) as row FROM cliente WHERE estado != 0 ";
		if(isset($_POST["search"]["value"]))
		{
		 	
		    $query .= "AND Nombre LIKE '%".$_POST["search"]["value"]."%' ";
		}
		$request2 = $this->select($query);

		
		$query = "SELECT COUNT(*) as row FROM cliente WHERE estado != 0";
		$request3 = $this->select($query);

		$requestData=[$request,$request2,$request3];

		return $requestData;
	}
	

	//function para jalar el proyecto por id
	public function selectCliente(int $idCliente)
	{
		$this->intIdCliente 	= $idCliente;
		$query = "SELECT * FROM cliente WHERE IdCliente = $this->intIdCliente";
		$request = $this->select($query);
		return $request;
	}

	

	//eliminacion logica nada mas
	public function deleteCliente(int $idCliente)
	{
		
			$this->intIdCliente	=  $idCliente;
		
		
			$query 	= "UPDATE cliente SET estado = ? WHERE IdCliente = $this->intIdCliente ";
			$arrData= array(0);
			$request = $this->update($query, $arrData);
			
			return $request;
		
	}






	public function insertCliente(string $Nombre,int $Dni,string $Direccion,string $FechaNacimiento, int $Celular,string $Correo,string $Contacto, int $userSession)
	{
		
		
		$this->intNombre 				= $Nombre;
		$this->intDni 					= $Dni;
		$this->strDireccion				= $Direccion;
		$this->intFechaNacimiento		= $FechaNacimiento;
		$this->intCelular				= $Celular;
		$this->strCorreo				= $Correo;
		$this->strContacto				= $Contacto;
		$this->intUserSession			= $userSession;

			$query = "INSERT INTO cliente(Nombre, Dni, Direccion, FechaNacimiento, Celular, Correo, Contacto,UsuarioCrea,Estado) 
			VALUES(?,?,?,?,?,?,?,?,1)";
			$arrData = array($this->intNombre, $this->intDni, $this->strDireccion, $this->intFechaNacimiento, $this->intCelular, $this->strCorreo, $this->strContacto ,$this->intUserSession);
			$requestInsert = $this->insert($query, $arrData);

			return $requestInsert;

	}



	public function insertVenta(int $IdProducto, int $Cliente, int $Asesor,int $Banco,string $Fecha,string $Voucher, int $Inicial,string $Observacion, int $userSession)
	{
		
		$this->intIdProducto			= $IdProducto;
		$this->intCliente 				= $Cliente;
		$this->intAsesor 				= $Asesor;
		$this->intBanco					= $Banco;
		$this->intFecha					= $Fecha;
		$this->strVoucher				= $Voucher;
		$this->intInicial				= $Inicial;
		$this->strObservacion			= $Observacion;
		$this->intUserSession			= $userSession;

			$query = "INSERT INTO venta(IdProducto,IdCliente,IdPersonal,IdBanco,Voucher,FechaOperacion,Inicial1,Observacion,UsuarioCrea,Estado) 
			VALUES(?,?,?,?,?,?,?,?,?,1)";


			$arrData = array($this->intIdProducto, $this->intCliente, $this->intAsesor, $this->intBanco, $this->strVoucher, $this->intFecha,  $this->intInicial, $this->strObservacion ,$this->intUserSession);
			$requestInsert = $this->insert($query, $arrData);

			if($requestInsert){
				$queryDetalle = "INSERT INTO detalleventa (IdVenta,Inicial1, UsuarioCrea2,Estado) VALUES(?,?,?,1)"; 
				$arrDataDetalle = array($requestInsert, $this->intInicial, $this->intUserSession); 
				$requestInsert = $this->insert($queryDetalle, $arrDataDetalle);
			}

			if($requestInsert){
				$queryTarjeta = "INSERT INTO tarjetaingresos (DetalleVenta,Monto, IdConcepto,UsuarioCrea,Estado) VALUES(?,?,1,?,1)"; 
				$arrDataTarjeta = array($requestInsert, $this->intInicial, $this->intUserSession); 
				$requestInsert = $this->insert($queryTarjeta, $arrDataTarjeta);
			}




		
			$query 	= "UPDATE  producto set Estado = ? WHERE IdProducto = $this->intIdProducto ";
			$arrData= array(3);
			$requestInsert = $this->update($query, $arrData);
			
			



			return $requestInsert;

	}




		public function insertDetalleVenta(int $IdDetalleVenta, int $Cliente, int $Banco,string $Fecha,string $Voucher, int $Inicial2,string $FechaPago, $Cuotas, $Monto,int $userSession)
	{
		
		$this->intIdDetalleVenta		= $IdDetalleVenta;
		$this->intCliente 				= $Cliente;
		$this->intBanco					= $Banco;
		$this->intFecha					= $Fecha;
		$this->strVoucher				= $Voucher;
		$this->intInicial2				= $Inicial2;
		$this->strFechaPago 			= $FechaPago;
		$this->intCuotas				= $Cuotas;
		$this->intMonto 				= $Monto;
		$this->intUserSession			= $userSession;

		// Insertando por segunda vez en la tabla detalleventa
			$query 	= "UPDATE  detalleventa set IdBanco = ? ,Voucher2 =?, FechaOperacion2=?,Inicial2=?,UsuarioCrea2=? WHERE Detalleventa = $this->intIdDetalleVenta ";
			$arrData= array($this->intBanco, $this->strVoucher, $this->intFecha, $this->intInicial2, $this->intUserSession);
			$requestInsert = $this->update($query, $arrData);

	   // Insertando en tarjeta ingresos, control de ingresos
			if($requestInsert){
				$queryTarjeta = "INSERT INTO tarjetaingresos (DetalleVenta,Monto, IdConcepto,UsuarioCrea,Estado) VALUES(?,?,3,?,1)"; 
				$arrDataTarjeta = array($this->intIdDetalleVenta, $this->intInicial2, $this->intUserSession); 
				$requestInsert = $this->insert($queryTarjeta, $arrDataTarjeta);
			}


		// cambiando el estado del producto / ubicando el idproducto mediante inner join 
			$query 	= "UPDATE  producto set Estado = ? WHERE IdProducto = (SELECT v.IdProducto from detalleventa dv inner join venta v on v.IdVenta= dv.IdVenta where dv.DetalleVenta  = '{$this->intIdDetalleVenta}') ";
			$arrData= array(4);
			$requestInsert = $this->update($query, $arrData);


	    // Insertando en la tabla Cuotas
			$queryCuotas = "INSERT INTO cuotas (DetalleVenta,FechaPago,CantidadCuotas,UsuarioCrea,Estado) VALUES(?,?,?,?,1)"; 
				$arrDataCuotas = array($this->intIdDetalleVenta, $this->strFechaPago, $this->intCuotas,$this->intUserSession); 
				$requestInsert = $this->insert($queryCuotas, $arrDataCuotas);
			
			



			return $requestInsert;

	}


	public function insertSeparar(int $IdProducto, int $Cliente, int $Asesor,int $Banco,string $Fecha,string $Voucher, int $Inicial,string $Observacion, int $userSession)
	{
		
		$this->intIdProducto			= $IdProducto;
		$this->intCliente 				= $Cliente;
		$this->intAsesor 				= $Asesor;
		$this->intBanco					= $Banco;
		$this->intFecha					= $Fecha;
		$this->strVoucher				= $Voucher;
		$this->intInicial				= $Inicial;
		$this->strObservacion			= $Observacion;
		$this->intUserSession			= $userSession;

			$query = "INSERT INTO venta(IdProducto,IdCliente,IdPersonal,IdBanco,Voucher,FechaOperacion,Inicial1,Observacion,UsuarioCrea,Estado) 
			VALUES(?,?,?,?,?,?,?,?,?,1)";


			$arrData = array($this->intIdProducto, $this->intCliente, $this->intAsesor, $this->intBanco, $this->strVoucher, $this->intFecha,  $this->intInicial, $this->strObservacion ,$this->intUserSession);
			$requestInsert = $this->insert($query, $arrData);

			
				if($requestInsert){
				$queryDetalle = "INSERT INTO detalleventa (IdVenta,Inicial1, UsuarioCrea2,Estado) VALUES(?,?,?,1)"; 
				$arrDataDetalle = array($requestInsert, $this->intInicial, $this->intUserSession); 
				$requestInsert = $this->insert($queryDetalle, $arrDataDetalle);
			}

			if($requestInsert){
				$queryTarjeta = "INSERT INTO tarjetaingresos (DetalleVenta,Monto, IdConcepto,UsuarioCrea,Estado) VALUES(?,?,2,?,1)"; 
				$arrDataTarjeta = array($requestInsert, $this->intInicial, $this->intUserSession); 
				$requestInsert = $this->insert($queryTarjeta, $arrDataTarjeta);
			}



		
			$query 	= "UPDATE  producto set Estado = ? WHERE IdProducto = $this->intIdProducto ";
			$arrData= array(2);
			$requestInsert = $this->update($query, $arrData);
			
			



			return $requestInsert;

	}

		public function updateCliente(int $IdCliente,string $Nombre,int $Dni,string $Direccion,string $FechaNacimiento, int $Celular,string $Correo,string $Contacto, int $userSession)
	{

		$this->intIdCliente 			= $IdCliente;
		$this->intNombre 				= $Nombre;
		$this->intDni 					= $Dni;
		$this->strDireccion				= $Direccion;
		$this->intFechaNacimiento		= $FechaNacimiento;
		$this->intCelular				= $Celular;
		$this->strCorreo				= $Correo;
		$this->strContacto				= $Contacto;
		$this->intUserSession			= $userSession;

		$queryPersonal = "SELECT * FROM cliente WHERE Nombre = '{$this->intNombre}' AND IdCliente != $this->intIdCliente AND Estado != 0 ";
		$requestPersonal = $this->select($queryPersonal);

		if(empty($requestPersonal)){
			
			$query = "UPDATE cliente SET Nombre = ?, Dni = ?, Direccion = ?, FechaNacimiento = ?, Celular = ?, Correo = ?,Contacto = ?,UsuarioCrea = ?,Estado = ? WHERE IdCliente = $this->intIdCliente";
			$arrData = array($this->intNombre, $this->intDni, $this->strDireccion, $this->intFechaNacimiento,$this->intCelular,$this->strCorreo,$this->strContacto, $this->intUserSession, 1);
			$request = $this->update($query, $arrData);

			return $request;

		}else{
			
			return  'exist';

		}
	}

		public function selectcboCliente(){

		$query = "SELECT IdCliente, Nombre FROM cliente WHERE Estado = 1 ORDER BY IdCliente";
		$request = $this->select_all($query);
		return $request;

	} 


	public function selectcboAsesor(){

		$query = "SELECT id_personal, nombre FROM personal WHERE Estado = 1 ORDER BY id_personal";
		$request = $this->select_all($query);
		return $request;

	} 

	public function selectcboBanco(){

		$query = "SELECT IdBanco, Descripcion FROM banco WHERE Estado = 1 ORDER BY IdBanco";
		$request = $this->select_all($query);
		return $request;

	} 


		public function gettablaproducto($proyecto)
		{

			
			$this->strproyecto = $proyecto;





		$query = " SELECT p.IdProducto, pro.Descripcion as 'Proyecto', p.NumeroNombre as 'Lote', l.Descripcion as 'Manzana',
					m.Descripcion as 'Medida', p.Caracteristicas as 'Detalles', p.PrecioVenta as 'Precio', p.Estado
					from producto p 
					inner join proyecto pro on p.IdProyecto = pro.IdProyecto
					inner join lote l on p.IdLote= l.IdLote
					inner join medida m on m.IdMedida= p.IdMedida  WHERE p.Estado = 1
                    and pro.IdProyecto = '{$this->strproyecto}'";

		$request = $this->select_all($query);

		return $request;
	}



		public function gettablaproducto2($proyecto)
		{

			
			$this->strproyecto = $proyecto;





		$query = " SELECT  dv.DetalleVenta, c.Nombre as 'Cliente', p.NumeroNombre as 'Lote', l.Descripcion as 'Manzana',
					m.Descripcion as 'Medida',p.Inicial as 'Inicial', v.Inicial1 as 'Inicialdep', p.PrecioVenta as 'Precio', p.Estado
					from producto p 
					inner join proyecto pro on p.IdProyecto = pro.IdProyecto
					inner join lote l on p.IdLote= l.IdLote
                    inner join venta v on v.IdProducto = p.IdProducto
                    inner join DetalleVenta dv on dv.IdVenta = v.IdVenta
                    inner join cliente c on c.IdCliente = v.IdCliente
					inner join medida m on m.IdMedida= p.IdMedida  WHERE p.Estado in(2,3)
                    and pro.IdProyecto = '{$this->strproyecto}'";

		$request = $this->select_all($query);

		return $request;
	}

		}



?>