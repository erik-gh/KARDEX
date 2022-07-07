<?php 

/**
* 
*/
class DashboardModel extends Mysql
{
	//CONSULTAS A LA BD, PARA RETORNAR AL CONTROLADOR 

	public function __construct()
	{
		# code...
		parent::__construct();

	}

	public function selectGerencias()
	{
		
		$query = "	SELECT g.abreviatura, COUNT(1) AS cantidad
					FROM personal p
					INNER JOIN gerencia g ON p.id_gerencia = g.id_gerencia
					where p.estado in (1)
					GROUP BY p.id_gerencia
					UNION ALL
					SELECT 'TOTAL', COUNT(1) AS cantidad
					FROM personal p
					INNER JOIN gerencia g ON p.id_gerencia = g.id_gerencia
					where p.estado in (1) ";

		$request = $this->select_all($query);

		return $request; 
	}


	public function selectUsuarios()
	{

		$query = "	SELECT COUNT(1) AS cantidad
					FROM usuario 
					WHERE estado in (1,2) AND id_usuario != 1";

		$request = $this->select_all($query);

		return $request;
	}

}


?>