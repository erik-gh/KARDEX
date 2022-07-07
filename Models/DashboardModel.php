<?php 

/**
* 
*/
class DashboardModel extends Mysql
{
	//CONSULTAS A LA BD, PARA RETORNAR AL CONTROLADOR 
	private $strFecha;

	public function __construct()
	{
		# code...
		parent::__construct();

	}



		public function selecttabletotalingresosDash(string $fechadesde)
	{

			$this->strfechadesde = $fechadesde;	

			
		$query = "SELECT c.IdCompra,s.Descripcion as sucursal ,p.RazonSocial,tpd.Descripcion ,c.Serie, c.FechaDoc , u.nombre , c.Estado 
					FROM compra c 
					inner join proveedor p on c.IdProveedor = p.IdProveedor
					inner join usuario u on u.id_usuario = c.UsuarioCrea
					inner join sucursal s on s.IdSucursal = c.IdSucursal
					inner join tipodocumento tpd on tpd.IdTipoDocumento = c.IdTipoDocumento
					WHERE s.IdSucursal = 1 and DATE_FORMAT(c.FechaCrea,'%d/%m/%Y')= '{$this->strfechadesde}' ORDER BY c.idCompra desc";
		
		$request = $this->select_all($query);

		return $request;
	}


		public function selecttabletotalsalidasDash(string $fechadesde)
	{

			$this->strfechadesde = $fechadesde;	

			
		$query = "	SELECT sl.IdSalida,sl.Serie, ccm.Descripcion 'centroconsumo',sl.FechaCrea, s.Descripcion 'sucursal' , pro.Descripcion 'proceso', ps.Nombres 'personalrec' , u.nombre, sl.Estado FROM salida sl
					inner join centroconsumo ccm on ccm.IdCentroConsumo = sl.IdCentroConsumo
					inner join sucursal s on s.IdSucursal =sl.IdSucursal
					inner join proceso pro on pro.IdProceso = sl.IdProceso
					inner join usuario u on u.id_usuario = sl.UsuarioCrea
					inner join personalsalida ps on ps.IdPersonal = sl.IdPersonalRec
					WHERE s.IdSucursal = 1 and DATE_FORMAT(sl.FechaCrea,'%d/%m/%Y')= '{$this->strfechadesde}' ORDER BY sl.IdSalida desc";
		
		$request = $this->select_all($query);

		return $request;
	}



		public function selecttabletotalrequerimientoDash(string $fechadesde)
	{

			$this->strfechadesde = $fechadesde;	

			
		$query = "	SELECT rq.IdRequerimiento, rq.NroOrden,cc.Descripcion, CONCAT( u.nombre,' ', u.apellido)as nombre, rq.Fecha,rq.FechaProcesa,rq.FechaDespacha,rq.Prioridad,rq.Estado 
				FROM requerimiento rq 
				inner join centroconsumo cc on rq.IdCentroConsumo= cc.IdCentroConsumo
				inner join usuario u on rq.IdUsuario = u.id_usuario WHERE rq.Estado != 5 and DATE_FORMAT(rq.Fecha,'%d/%m/%Y')= '{$this->strfechadesde}' and  rq.Estado !=0 ORDER BY rq.IdRequerimiento desc";
		
		$request = $this->select_all($query);

		return $request;
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



	public function selectgetrequerimientocant()
	{

		$query = "	SELECT COUNT(1) AS cantidad  
					FROM requerimiento
					WHERE Estado in (1,2) ";

		$request = $this->select_all($query);

		return $request;
	}

		public function selectgetrequerimientoaten()
	{

		$query = "	SELECT COUNT(1) AS cantidad  
					FROM requerimiento
					WHERE Estado =2 ";

		$request = $this->select_all($query);

		return $request;
	}

		public function selectgetrequerimientopen()
	{

		$query = "	SELECT COUNT(1) AS cantidad  
					FROM requerimiento
					WHERE Estado =1 ";

		$request = $this->select_all($query);

		return $request;
	}





	public function selectControlIngreso()
	{

		$query = "	SELECT DATE_FORMAT(FechaCrea,'%d/%m/%Y') as fecha_registro,COUNT(DISTINCT IdCompra) as total from tarjetamovimiento 
					WHERE TipoMovimiento = 1
					GROUP BY DATE_FORMAT(FechaCrea,'%d/%m/%Y')
					ORDER BY IdCompra desc
					LIMIT 0,5 ";

		$request = $this->select_all($query);

		return $request;
	}

		public function selectControlSalida()
	{

		$query = "	SELECT DATE_FORMAT(FechaCrea,'%d/%m/%Y') as fecha_registro,COUNT(DISTINCT IdSalida) as total from tarjetamovimiento 
					WHERE TipoMovimiento = 5
					GROUP BY DATE_FORMAT(FechaCrea,'%d/%m/%Y')
					ORDER BY IdSalida desc
					LIMIT 0,5 ";

		$request = $this->select_all($query);

		return $request;
	}



		public function selectControlRequerimiento()
	{

		$query = "	SELECT DATE_FORMAT(FechaCrea,'%d/%m/%Y') as fecha_registro,COUNT(DISTINCT IdRequerimiento) as total from tarjetamovimiento 
					WHERE TipoMovimiento = 4
					GROUP BY DATE_FORMAT(FechaCrea,'%d/%m/%Y')
					ORDER BY IdRequerimiento desc
					LIMIT 0,5 ";

		$request = $this->select_all($query);

		return $request;
	}



	public function selectControlDate(string $fecha)
	{

		$this->strFecha 	= $fecha;

		$query = "	SELECT p.dni, p.nombre, c.cargo, TIME_FORMAT(a.hora_ingreso, '%h:%i:%s %p') AS hora_ingreso, g.abreviatura, 
					IF(a.hora_salida = '00:00:00', '--:--:--', TIME_FORMAT(a.hora_SALIDA, '%h %i %s %p')) as hora_salida
					FROM asistencia a
                    INNER JOIN personal p ON a.id_personal = p.id_personal 
					INNER JOIN cargo c ON p.id_cargo = c.id_cargo
					INNER JOIN gerencia g ON p.id_gerencia = g.id_gerencia
					WHERE fecha = '{$this->strFecha}' AND fecha_salida is NULL
                    ORDER BY nombre ";

		$request = $this->select_all($query);

		return $request;
	}




}


?>