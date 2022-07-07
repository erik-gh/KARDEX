<?php 

/**
* 
*/
class ReportesModel extends Mysql
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

	public function selectcboClases(int $idfamilia)
	{
		
		$this->intIdFamilia = $idfamilia;

		$query = "SELECT IdClase, Descripcion FROM clase WHERE  IdFamilia = $this->intIdFamilia  ORDER BY IdClase ";
		$request = $this->select_all($query);
		return $request;

	} 



		public function selectReporteStockSucursal()
	{
		$query = "		SELECT stk.IdStockProd, su.Descripcion as sucursal,prod.Descripcion as producto,fa.Descripcion as familia,
						cl.Descripcion as clase ,um.Descripcion as uma , stk.at, stk.bt, stk.ct, stk.Existencia , prod.Estado 
						FROM
						stockprod stk
						INNER JOIN producto prod on stk.IdProducto = prod.IdProducto
						INNER JOIN clase cl on prod.IdClase = cl.IdClase
						INNER JOIN familia fa on cl.IdFamilia = fa.IdFamilia
						INNER JOIN uma um on prod.IdUma = um.IdUma
						INNER JOIN sucursal su on stk.IdSucursal = su.IdSucursal ";
		$request = $this->select_all($query);
		return $request;
	} 


		public function selecttableproductoporsucursal(int $sucursal,int $familia,int $clase,int $producto)
	{
			$this->intsucursal 	= $sucursal;
			$this->intfamilia 	= $familia;
			$this->intclase 	= $clase;
			$this->intproducto 	= $producto;
		
		$where = '';

			if($this->intsucursal == 0 && $this->intfamilia == 0 && $this->intclase == 0 && $this->intproducto == 0){
				$where = ' WHERE 1';
			}else if($this->intsucursal != 0 && $this->intfamilia == 0 && $this->intclase == 0 && $this->intproducto == 0){
				$where = " WHERE su.IdSucursal = '{$this->intsucursal}'";				
			}else if($this->intsucursal != 0 && $this->intfamilia != 0 && $this->intclase == 0 && $this->intproducto == 0){
				$where = " WHERE su.IdSucursal = '{$this->intsucursal}' and fa.idfamilia  = '{$this->intfamilia}'";				
			}else if($this->intsucursal != 0 && $this->intfamilia != 0 && $this->intclase != 0 && $this->intproducto == 0){
				$where = " WHERE su.IdSucursal = '{$this->intsucursal}' and fa.IdFamilia  = '{$this->intfamilia}' and cl.IdClase = '{$this->intclase}'";					
			}else if($this->intsucursal != 0 && $this->intfamilia != 0 && $this->intclase != 0 && $this->intproducto != 0){
				$where = " WHERE su.IdSucursal = '{$this->intsucursal}' and fa.IdFamilia  = '{$this->intfamilia}' and cl.IdClase = '{$this->intclase}' and prod.IdProducto = '{$this->intproducto}'";			
			}

		$query = "SELECT stk.IdStockProd, prod.CodProducto,su.Descripcion as sucursal,prod.Descripcion, stk.at, stk.bt, stk.ct, stk.Existencia ,fa.IdFamilia, fa.Descripcion as familia,cl.IdClase,
						cl.Descripcion as clase , um.Descripcion as uma , prod.Estado 
						FROM
						stockprod stk
						INNER JOIN producto prod on stk.IdProducto = prod.IdProducto
						INNER JOIN clase cl on prod.IdClase = cl.IdClase
						INNER JOIN familia fa on cl.IdFamilia = fa.IdFamilia
						INNER JOIN uma um on prod.IdUma = um.IdUma
						INNER JOIN sucursal su on stk.IdSucursal = su.IdSucursal ".$where;

		$request = $this->select_all($query);
		return $request;
	}


		public function selecttabletrazprod(int $sucursal,int $producto,string $desde,string $hasta)
	{

		$this->intsucursal 		= $sucursal;
		$this->intproducto 		= $producto;	
		$this->intdesde 		= $desde;	
		$this->inthasta 		= $hasta;		

			$where = '';

			if($this->intsucursal == 0 && $this->intproducto == 0 && $this->intdesde == '' && $this->inthasta == ''){
				$where = ' WHERE 1';
			}else if($this->intsucursal != 0 && $this->intproducto == 0 && $this->intdesde == '' && $this->inthasta == ''){
				$where = "WHERE su.IdSucursal = $this->intsucursal ORDER BY tjm.FechaCrea asc"; 

			}else if($this->intsucursal == 0 && $this->intproducto != 0 && $this->intdesde == '' && $this->inthasta == ''){
				$where = " WHERE prod.IdProducto = $this->intproducto ORDER BY tjm.FechaCrea asc"; 

			}else if($this->intsucursal == 0 && $this->intproducto == 0 && $this->intdesde != '' && $this->inthasta ==  ''){
				$where = "WHERE DATE(tjm.FechaCrea) = '{$this->intdesde}' ORDER BY tjm.FechaCrea asc";

			}else if($this->intsucursal == 0 && $this->intproducto != 0 && $this->intdesde != '' && $this->inthasta != ''){
				$where = " WHERE prod.IdProducto  = $this->intproducto and DATE(tjm.FechaCrea)  BETWEEN '{$this->intdesde}' AND '{$this->inthasta}' ORDER BY tjm.FechaCrea asc";

			}else if($this->intsucursal != 0 && $this->intproducto != 0 && $this->intdesde != '' && $this->inthasta != ''){
				$where = " WHERE su.IdSucursal = $this->intsucursal and prod.IdProducto  = $this->intproducto and DATE(tjm.FechaCrea)  BETWEEN '{$this->intdesde}' AND '{$this->inthasta}' ORDER BY tjm.FechaCrea asc";

			}else if($this->intsucursal != 0 && $this->intproducto != 0 && $this->intdesde == '' && $this->inthasta == ''){
				$where = " WHERE su.IdSucursal = $this->intsucursal and prod.IdProducto  = $this->intproducto  ORDER BY tjm.FechaCrea asc";

			}else if($this->intsucursal == 0 && $this->intproducto != 0 && $this->intdesde != '' && $this->inthasta == ''){
				$where = " WHERE prod.IdProducto  = $this->intproducto and DATE(tjm.FechaCrea)  = '{$this->intdesde}' ORDER BY tjm.FechaCrea asc";

			}else if($this->intsucursal != 0 && $this->intproducto == 0 && $this->intdesde != '' && $this->inthasta != ''){
				$where = " WHERE su.IdSucursal  = $this->intsucursal and DATE(tjm.FechaCrea)  BETWEEN '{$this->intdesde}' AND '{$this->inthasta}' ORDER BY tjm.FechaCrea asc";

			}else if($this->intsucursal == 0 && $this->intproducto == 0 && $this->intdesde != '' && $this->inthasta != ''){
				$where = " WHERE  DATE(tjm.FechaCrea)  BETWEEN '{$this->intdesde}' AND '{$this->inthasta}' ORDER BY tjm.FechaCrea asc";
			}




		$query = "SELECT prod.IdProducto,su.Descripcion as Sucursal,prod.CodProducto,prod.Descripcion as Producto, tpi.Descripcion as Movimiento,
			CASE    WHEN tjm.kardex = 0 THEN
						'Inv.Inicial'
					WHEN tjm.kardex = 1 THEN
						'Ingreso'
					WHEN tjm.kardex = 2 THEN
						'Salida'
					WHEN tjm.kardex = 3 THEN
						'Extornar'
					ELSE
						'NULO'
				END as kardex , tjm.a, tjm.b, tjm.c, tjm.Entrada, tjm.Salida, tjm.Existencia, 
			tjm.FechaCrea, us.nombre , tjm.Estado
			FROM tarjetamovimiento tjm
			INNER JOIN producto prod on tjm.IdProducto = prod.IdProducto
			INNER JOIN sucursal su on tjm.IdSucursal = su.IdSucursal
			INNER JOIN tipoingreso tpi on tjm.TipoMovimiento = tpi.IdTipoIngreso
			INNER JOIN usuario us on tjm.UsuarioCrea = us.id_usuario
			".$where ;

		$request = $this->select_all($query);

		return $request;
	}


	public function getSelectSucursal(){

		$query = "SELECT IdSucursal, Descripcion FROM sucursal WHERE Estado = 1 ORDER BY IdSucursal";
		$request = $this->select_all($query);
		return $request;

	} 

	public function getSelectProcucto(int $idClase)
	{
		
		$this->intIdClase = $idClase;

		$query = "SELECT prod.IdProducto , prod.Descripcion, idclase
						FROM tarjetamovimiento tjm 
						INNER JOIN producto prod on tjm.IdProducto = prod.IdProducto
                        where prod.idclase=$this->intIdClase
						GROUP BY tjm.IdProducto ";
		$request = $this->select_all($query);
		return $request;

	} 

	public function getSelectProcuctoSeguimiento()
	{
		

		$query = "SELECT prod.IdProducto , prod.Descripcion
						FROM tarjetamovimiento tjm 
						INNER JOIN producto prod on tjm.IdProducto = prod.IdProducto
						GROUP BY tjm.IdProducto ";
		$request = $this->select_all($query);
		return $request;

	} 




	



}


?>