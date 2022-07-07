<?php 

/**
* 
*/
class UsuarioModel extends Mysql
{
	//CONSULTAS A LA BD, PARA RETORNAR AL CONTROLADOR 
	private $intIdUsuario;	
	private $intControl;	
	private $strDNI;			
	private $strApellido;	
	private $strNombre;		
	private $intPerfil;		
	private $strUsuario;		
	private $strPassword;	
	private $intUserSession;	
	private $intEstado;		


	public function __construct()
	{
		# code...
		parent::__construct();
	}


	public function selectCbocentroconsumo(){
		$query = "SELECT * FROM centroconsumo WHERE Estado = 1 ORDER BY IdCentroConsumo";
		$request = $this->select_all($query);
		return $request;
	}


	public function insertUsuario(string $dni, string $apellido, string $nombre, int $perfil,int $consumo ,string $usuario, String $password, int $userSession)
	{
		
		$this->strDNI 			= $dni;
		$this->strApellido		= $apellido;
		$this->strNombre 		= $nombre;
		$this->intPerfil		= $perfil;
		$this->intConsumo		= $consumo;
		$this->strUsuario	 	= $usuario;
		$this->strPassword 		= $password;
		$this->intUserSession	= $userSession;

		$queryUsuario = "SELECT id_usuario FROM usuario WHERE estado != 0 AND (dni_usuario = $this->strDNI OR  username ='{$this->strUsuario}') ";
		$requestUsuario = $this->select($queryUsuario);

		if(empty($requestUsuario)){
			
			$query = "INSERT INTO usuario(dni_usuario, apellido, nombre, username, password, id_perfil,IdCentroConsumo, user_create, estado) VALUES(?,?,?,?,?,?,?,?,1)";
			$arrData = array($this->strDNI, $this->strApellido, $this->strNombre, $this->strUsuario, $this->strPassword, $this->intPerfil,$this->intConsumo, $this->intUserSession);
			$requestInsert = $this->insert($query, $arrData);
			
			return $requestInsert;

		}else{

			return  'exist';
		}
	}


	public function selectUsuarios()
	{

		$query = "SELECT u.id_usuario, u.dni_usuario, u.apellido, u.nombre, p.perfil, u.username, u.estado FROM perfil p INNER JOIN usuario u ON p.id_perfil = u.id_perfil WHERE p.estado != 0 AND u.estado != 0 AND u.id_usuario != 1 ";
		if(isset($_POST["search"]["value"]))
		{
		 	$query .= "AND ( u.dni_usuario LIKE '%".$_POST["search"]["value"]."%' ";
		    $query .= "OR u.apellido LIKE '%".$_POST["search"]["value"]."%' ";
		    $query .= "OR u.nombre LIKE '%".$_POST["search"]["value"]."%' ";
		    $query .= "OR p.perfil LIKE '%".$_POST["search"]["value"]."%' ";
		    $query .= "OR u.username LIKE '%".$_POST["search"]["value"]."%' )";
		}

		if(isset($_POST["order"]))
		{
			$query .= ' ORDER BY '.(1+$_POST['order']['0']['column']).' '.$_POST['order']['0']['dir'].' ';
		}
		else
		{
			$query .= ' ORDER BY apellido, nombre ';
		}

		if ( isset( $_POST['start'] ) && $_POST['length'] != '-1' )
		{
			$query .= " LIMIT ".$_POST['start'].", ".$_POST['length'];
		}
		$request = $this->select_all($query);
	

		$query = "SELECT count(*) as row FROM perfil p INNER JOIN usuario u ON p.id_perfil = u.id_perfil WHERE p.estado != 0 AND u.estado != 0 AND u.id_usuario != 1 ";
		if(isset($_POST["search"]["value"]))
		{
		 	$query .= "AND ( u.dni_usuario LIKE '%".$_POST["search"]["value"]."%' ";
		    $query .= "OR u.apellido LIKE '%".$_POST["search"]["value"]."%' ";
		    $query .= "OR u.nombre LIKE '%".$_POST["search"]["value"]."%' ";
		    $query .= "OR p.perfil LIKE '%".$_POST["search"]["value"]."%' ";
		    $query .= "OR u.username LIKE '%".$_POST["search"]["value"]."%' )";
		}
		$request2 = $this->select($query);

		
		$query = "SELECT count(*) as row FROM perfil p INNER JOIN usuario u ON p.id_perfil = u.id_perfil WHERE p.estado != 0 AND u.estado != 0 AND u.id_usuario != 1 ";
		$request3 = $this->select($query);

		$requestData=[$request,$request2,$request3];

		return $requestData;
	}


	public function selectusuario(int $idUsuario)
	{
		$this->intIdUsuario = $idUsuario;
		$query = "SELECT * FROM usuario WHERE id_usuario = $this->intIdUsuario";
		$request = $this->select($query);
		return $request;
	}



	public function updateUsuario(int $idUsuario, string $dni, string $apellido, string $nombre, int $perfil,int $consumo, string $usuario, int $userSession, int $estado)
	{

		$this->intIdUsuario 	= $idUsuario;
		$this->strDNI 			= $dni;
		$this->strApellido		= $apellido;
		$this->strNombre		= $nombre;
		$this->intPerfil		= $perfil;
		$this->intConsumo		= $consumo;
		$this->strUsuario		= $usuario;
		$this->intUserSession 	= $userSession;
		$this->intEstado 		= $estado;

		$queryUsuario = "SELECT * FROM usuario WHERE ((dni_usuario = '{$this->strDNI}' AND id_usuario != $this->intIdUsuario) OR (username = '{$this->strUsuario}' AND id_usuario != $this->intIdUsuario)) AND estado != 0 ";
		$requestUsuario = $this->select($queryUsuario);

		if(empty($requestUsuario)){
			
			$query = "UPDATE usuario SET dni_usuario = ?, apellido = ?, nombre = ?, username = ?, user_update = ?, estado = ?, id_perfil = ? , IdCentroConsumo = ? WHERE id_usuario = $this->intIdUsuario";
			$arrData = array($this->strDNI, $this->strApellido, $this->strNombre, $this->strUsuario, $this->intUserSession, $this->intEstado , $this->intPerfil,$this->intConsumo);
			$request = $this->update($query, $arrData);

			return $request;

		}else{
			
			return  'exist';

		}
	}


	public function updateUsuarioPass(int $idUsuario ,string $password)
	{

		$this->intIdUsuario 	= $idUsuario;		
		$this->strPassword 		= $password;

		$query = "UPDATE usuario SET password = ? WHERE id_usuario = $this->intIdUsuario";
		$arrData = array($this->strPassword);
		$request = $this->update($query, $arrData);

		return $request;
	}


	public function deleteUsuario(int $idUsuario)
	{
		$this->intIdUsuario 	=  $idUsuario;
		
		$query 	= "UPDATE usuario SET estado = ? WHERE id_usuario = $this->intIdUsuario ";
		$arrData= array(0);
		$request = $this->update($query, $arrData);
			
		return $request;
		
	}


	public function selectCboUsuarios(){
		$query = "SELECT * FROM usuario WHERE estado = 1 ORDER BY apellido, nombre";
		$request = $this->select_all($query);
		return $request;
	}
	

}


?>