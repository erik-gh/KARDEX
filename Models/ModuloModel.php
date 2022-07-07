<?php 

/**
* 
*/
class ModuloModel extends Mysql
{
	//CONSULTAS A LA BD, PARA RETORNAR AL CONTROLADOR 

	private $intIdMdodulo;
	private $strModulo;
	private $strDescripcion;
	private $strURL;
	private $strIcono;
	private $intEstado;
	private $intIdPerfil;


	public function __construct()
	{
		# code...
		parent::__construct();
	}


	public function selectModulos()
	{

		$query = "SELECT id_modulo, modulo, descripcion, url, icono, estado FROM modulo WHERE estado != 0 ";
		if(isset($_POST["search"]["value"]))
		{
		 	$query .= "AND ( modulo LIKE '%".$_POST["search"]["value"]."%' ";
		    $query .= "OR descripcion LIKE '%".$_POST["search"]["value"]."%' ";
		    $query .= "OR url LIKE '%".$_POST["search"]["value"]."%' ";
		    $query .= "OR icono LIKE '%".$_POST["search"]["value"]."%' )";
		}

		if(isset($_POST["order"]))
		{
			$query .= ' ORDER BY '.(1+$_POST['order']['0']['column']).' '.$_POST['order']['0']['dir'].' ';
		}
		else
		{
			$query .= ' ORDER BY modulo ';
		}

		if ( isset( $_POST['start'] ) && $_POST['length'] != '-1' )
		{
			$query .= " LIMIT ".$_POST['start'].", ".$_POST['length'];
		}
		$request = $this->select_all($query);
	

		$query = "SELECT COUNT(*) as row FROM modulo WHERE estado != 0 ";
		if(isset($_POST["search"]["value"]))
		{
		 	$query .= "AND ( modulo LIKE '%".$_POST["search"]["value"]."%' ";
		    $query .= "OR descripcion LIKE '%".$_POST["search"]["value"]."%' ";
		    $query .= "OR url LIKE '%".$_POST["search"]["value"]."%' ";
		    $query .= "OR icono LIKE '%".$_POST["search"]["value"]."%' )";
		}
		$request2 = $this->select($query);

		
		$query = "SELECT COUNT(*) as row FROM modulo WHERE estado != 0";
		$request3 = $this->select($query);

		$requestData=[$request,$request2,$request3];

		return $requestData;
	}


	public function selectModulo(int $idMdodulo)
	{
		$this->intIdMdodulo = $idMdodulo;
		$query = "SELECT * FROM modulo WHERE id_modulo = $this->intIdMdodulo";
		$request = $this->select($query);
		return $request;
	}


	public function updateModulo(int $idModulo, string $modulo, string $descripcion, string $icono, int $estado)
	{

		$this->intIdMdodulo 	= $idModulo;
		$this->strModulo 		= $modulo;
		$this->strDescripcion	= $descripcion;
		$this->strIcono 		= $icono;
		$this->intEstado 		= $estado;

		$queryModulo = "SELECT * FROM modulo WHERE modulo = '{$this->strModulo}' AND id_modulo != $this->intIdMdodulo AND estado != 0 ";
		$requestModulo = $this->select($queryModulo);

		if(empty($requestModulo)){
			
			$query = "UPDATE modulo SET modulo = ?, descripcion = ?, icono = ?, estado = ? WHERE id_modulo = $this->intIdMdodulo";
			$arrData = array($this->strModulo, $this->strDescripcion, $this->strIcono, $this->intEstado);
			$request = $this->update($query, $arrData);
					
			return $request;

		}else{
			
			return  'exist';

		}
	}


	/* ASIGNAR */
	public function selectCboModulos(){
		$query = "SELECT * FROM modulo WHERE estado = 1 ORDER BY modulo";
		$request = $this->select_all($query);
		return $request;
	}


	public function insertAsignar(int $idperfil, int $idmodulo)
	{
		$this->intIdPerfil 		= $idperfil;
		$this->intIdMdodulo		= $idmodulo;

		$query = "INSERT INTO perfil_modulo(id_perfil, id_modulo) VALUES(?,?)";
		$arrData = array($this->intIdPerfil, $this->intIdMdodulo);
		$requestInsert = $this->insert($query, $arrData);

		return $requestInsert;
	}


	public function deleteAsignar(int $idPerfil)
	{
		$this->intIdPerfil 	=  $idPerfil;
		
		$query 	= "DELETE FROM perfil_modulo WHERE id_perfil = $this->intIdPerfil ";
		$request = $this->delete($query);
		return $request;
	}


	public function selectModulosAsignar()
	{

		$query = "SELECT p.id_perfil, group_concat(m.id_modulo ORDER BY m.id_modulo separator ', ') as id_modulo, p.perfil, p.descripcion, group_concat(m.modulo ORDER BY m.id_modulo separator ',') as modulos from perfil p INNER JOIN perfil_modulo pm ON p.id_perfil = pm.id_perfil INNER JOIN modulo m ON m.id_modulo = pm.id_modulo GROUP BY p.id_perfil ORDER BY p.id_perfil, m.id_modulo";
	
		$request = $this->select_all($query);

		return $request;
	}


	public function selectAsignar(int $idPerfil)
	{
		$this->intIdPerfil = $idPerfil;
		$query = "SELECT p.id_perfil, p.perfil, group_concat(pm.id_modulo separator ',') as modulos FROM perfil p inner join perfil_modulo pm on p.id_perfil = pm.id_perfil WHERE pm.id_perfil= $this->intIdPerfil GROUP BY pm.id_perfil";
		$request = $this->select($query);
		return $request;
	}

}

?>