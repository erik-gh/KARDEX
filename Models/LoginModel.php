<?php 

/**
* 
*/
class LoginModel extends Mysql
{
	//CONSULTAS A LA BD, PARA RETORNAR AL CONTROLADOR 

	private $intIdUsuario;
	private $strUsuario;
	private $strPassword; 
	private $intIdPerfil;


	public function __construct()
	{
		# code...
		parent::__construct();

	}

	public function loginUser(string $usuario, string $password)
	{
		
		$this->strUsuario 	= $usuario;
		$this->strPassword	= $password;
		$queryUser = "SELECT id_usuario FROM usuario WHERE username = '{$this->strUsuario}'";
		$requestUser = $this->select($queryUser);

		if(empty($requestUser)){
			return 'user';
		}else{

			$query = "SELECT id_usuario, CONCAT(nombre,' ',apellido) AS nombre, estado, id_perfil FROM usuario WHERE username = '{$this->strUsuario}' AND password = '{$this->strPassword}'";
			$request = $this->select($query);
			return $request;
		}
		 
	}


	public function loginUserModulo(int $idPerfil)
	{
		
		$this->intIdPerfil 	= $idPerfil;
		$query = "	SELECT m.url
		                FROM perfil p INNER JOIN perfil_modulo pm ON p.id_perfil = pm.id_perfil 
		     			INNER JOIN modulo m ON m.id_modulo = pm .id_modulo
		                WHERE p.id_perfil  = '{$this->intIdPerfil}'";

		$request = $this->select_all($query);

		return $request;
		
		 
	}

}


?>