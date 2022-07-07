<?php 

/**
* 
*/
class PersonalModel extends Mysql
{
	//CONSULTAS A LA BD, PARA RETORNAR AL CONTROLADOR 
	private $intIdPersonal;	
	private $intControl;	
	private $strDNI;			
	private $strNombre;
	private $strNombreC;		
	private $intCargo;
	private $intGerencia;
	private $strImagen;		
	private $intUserSession;	
	private $intEstado;

	public function __construct()
	{
		# code...
		parent::__construct();

	}


	public function insertPersonal(string $dni, string $nombre, int $cargo, int $gerencia,int $turno, int $userSession, string $imagen)
	{
		
		$this->strDNI 			= $dni;
		$this->strNombre 		= $nombre;
		$this->intCargo			= $cargo;
		$this->intGerencia		= $gerencia;
		$this->intTurno  		= $turno;
		$this->intUserSession	= $userSession;
		$this->strImagen		= $imagen;

		$queryPersonal = "SELECT id_personal FROM personal WHERE estado != 0 AND dni = $this->strDNI ";
		$requestPersona = $this->select($queryPersonal);

		if(empty($requestPersona)){
			
			$query = "INSERT INTO personal(dni, nombre, id_cargo, id_gerencia, id_responsable ,id_horario , user_create, imagen, estado) VALUES(?,?,?,?,1,?,?,?,1)";
			$arrData = array($this->strDNI, $this->strNombre, $this->intCargo, $this->intGerencia,$this->intTurno, $this->intUserSession, $this->strImagen);
			$requestInsert = $this->insert($query, $arrData);
			
			return $requestInsert;

		}else{

			return  'exist';
		}
	}


	public function selectPersonal()
	{

		$query = "	SELECT p.id_personal, p.dni, p.nombre, c.cargo, g.abreviatura AS gerencia, p.estado
					FROM personal p
					INNER JOIN cargo c ON p.id_cargo = c.id_cargo
					INNER JOIN gerencia g ON p.id_gerencia = g.id_gerencia and p.id_responsable= 1
					INNER JOIN horario h on h.id_horario = p.id_horario
					WHERE p.estado != 0 AND c.estado != 0 ";

		if(isset($_POST["search"]["value"]))
		{
		 	$query .= "AND ( p.dni LIKE '%".$_POST["search"]["value"]."%' ";
		    $query .= "OR p.nombre LIKE '%".$_POST["search"]["value"]."%' ";
		    $query .= "OR c.cargo LIKE '%".$_POST["search"]["value"]."%' ";
		    $query .= "OR p.id_gerencia LIKE '%".$_POST["search"]["value"]."%' )";
		}

		if(isset($_POST["order"]))
		{
			$query .= ' ORDER BY '.(1+$_POST['order']['0']['column']).' '.$_POST['order']['0']['dir'].' ';
		}
		else
		{
			$query .= ' ORDER BY p.estado, p.id_gerencia, p.nombre, c.cargo ';
		}

		if ( isset( $_POST['start'] ) && $_POST['length'] != '-1' )
		{
			$query .= " LIMIT ".$_POST['start'].", ".$_POST['length'];
		}
		$request = $this->select_all($query);
	

		$query = "	SELECT count(*) as row 
					FROM personal p
					INNER JOIN cargo c ON p.id_cargo = c.id_cargo and p.id_responsable= 1
					WHERE p.estado != 0 AND c.estado != 0 ";
		if(isset($_POST["search"]["value"]))
		{
		 	$query .= "AND ( p.dni LIKE '%".$_POST["search"]["value"]."%' ";
		    $query .= "OR p.nombre LIKE '%".$_POST["search"]["value"]."%' ";
		    $query .= "OR c.cargo LIKE '%".$_POST["search"]["value"]."%' ";
		    $query .= "OR p.id_gerencia LIKE '%".$_POST["search"]["value"]."%' )";
		}
		$request2 = $this->select($query);

		
		$query = "	SELECT count(*) as row 
					FROM personal p
					INNER JOIN cargo c ON p.id_cargo = c.id_cargo and p.id_responsable= 1
					WHERE p.estado != 0 AND c.estado != 0 ";
		$request3 = $this->select($query);

		$requestData=[$request,$request2,$request3];

		return $requestData;
	}


	public function selectPersona(int $idPersonal)
	{
		$this->intIdPersonal = $idPersonal;
		$query = "SELECT * FROM personal WHERE id_personal = $this->intIdPersonal";
		$request = $this->select($query);
		return $request;
	}


	public function updatePersonal(int $idPersonal, string $dni, string $nombreC, int $cargo, int $gerencia, int $turno, string $FechaIngreso, int $userSession, int $estado, string $imagen)
	{

		$this->intIdPersonal 	= $idPersonal;
		$this->strDNI 			= $dni;
		$this->strNombreC		= $nombreC;
		$this->intCargo			= $cargo;
		$this->intGerencia		= $gerencia; 
		$this->intTurno  		= $turno;
		$this->intFechaIn   	= $FechaIngreso;
		$this->intUserSession 	= $userSession;
		$this->intEstado 		= $estado;
		$this->strImagen		= $imagen;

		$queryPersonal = "SELECT * FROM personal WHERE dni = '{$this->strDNI}' AND id_personal != $this->intIdPersonal AND estado != 0 ";
		$requestPersonal = $this->select($queryPersonal);

		if(empty($requestPersonal)){
			
			$query = "UPDATE personal SET dni = ?, nombre = ?, id_cargo = ?, id_gerencia = ?, id_horario = ? ,FechaIngreso=?,user_update = ?, estado = ?, imagen = ? WHERE id_personal = $this->intIdPersonal";
			$arrData = array($this->strDNI, $this->strNombreC, $this->intCargo, $this->intGerencia,$this->intTurno, $this->intFechaIn,$this->intUserSession, $this->intEstado, $this->strImagen);
			$request = $this->update($query, $arrData);

			return $request;

		}else{
			
			return  'exist';

		}
	}


	public function deletePersonal(int $idPersonal)
	{
		$this->intIdPersonal 	=  $idPersonal;
		
		$query 	= "UPDATE personal SET estado = ? WHERE id_personal = $this->intIdPersonal ";
		$arrData= array(0);
		$request = $this->update($query, $arrData);
			
		return $request;
		
	}

	public function selectcboCargos(){

		$query = "SELECT id_cargo, cargo FROM cargo WHERE estado = 1 ORDER BY id_cargo";
		$request = $this->select_all($query);
		return $request;

	}

	public function selectExcelPersonal()
	{
		$query = "SELECT id_personal, dni, id_gerencia FROM personal WHERE estado != 0 ";
		$request = $this->select_all($query);
		return $request;

	}

	public function importarPersonal(string $dni, string $nombre, int $cargo, int $gerencia, int $userSession, int $estado, int $idResponsable)
	{
		
		$this->strDNI 			= $dni;
		$this->strNombre 		= $nombre;
		$this->intCargo			= $cargo;
		$this->intGerencia		= $gerencia;
		$this->intUserSession	= $userSession;
		$this->intEstado 		= $estado;
		$this->intidResponsable	= $idResponsable;

		
		$query = "INSERT INTO personal(dni, nombre, id_cargo, id_gerencia, user_create, estado, id_responsable) VALUES(?,?,?,?,?,?,?)";
		$arrData = array($this->strDNI, $this->strNombre, $this->intCargo, $this->intGerencia, $this->intUserSession, $this->intEstado, $this->intidResponsable);
		$requestInsert = $this->insert($query, $arrData);
			
		return $requestInsert;

	}

	public function selectReportePersonal()
	{
		$query = "	SELECT p.id_personal, p.dni, p.nombre, c.cargo, g.abreviatura AS gerencia, p.estado
					FROM personal p
					INNER JOIN cargo c ON p.id_cargo = c.id_cargo
					INNER JOIN gerencia g ON p.id_gerencia = g.id_gerencia
					WHERE p.estado != 0 AND c.estado != 0 
					ORDER BY p.estado, g.id_gerencia, p.nombre, c.cargo ";
		$request = $this->select_all($query);
		return $request;
	} 


	public function selectcboGerencias(){

		$query = "SELECT id_gerencia, gerencia, abreviatura FROM gerencia WHERE estado = 1 ORDER BY id_gerencia";
		$request = $this->select_all($query);
		return $request;

	} 

	public function selectcboturno(){

		$query = "SELECT id_horario, turno from horario where estado = 1 order by id_horario";
		$request = $this->select_all($query);
		return $request;

	} 


	public function selectcboResponsable(){

		$query = "SELECT id_responsable, responsable FROM responsable WHERE estado = 1 ORDER BY id_responsable";
		$request = $this->select_all($query);
		return $request;

	} 


}


?>