<?php 

/**
* 
*/
class RotuloModel extends Mysql
{
	


	public function __construct()
	{
		# code...
		parent::__construct();
	}



	
	public function getSelectProcuctoSeguimiento()
	{
		

		$query = "SELECT prod.IdProducto , CONCAT(prod.CodProducto, ' ', prod.Descripcion) as Descripcion
						FROM tarjetamovimiento tjm 
						INNER JOIN producto prod on tjm.IdProducto = prod.IdProducto
						GROUP BY tjm.IdProducto ";
		$request = $this->select_all($query);
		return $request;

	} 

	public function selectcantidadesproducto(int $idProducto)
	{
		$this->intIdProducto 	= $idProducto;
		$query = "SELECT stk.IdStockProd,pro.Descripcion, stk.at, stk.bt, stk.ct, stk.Existencia,stk.Estado
					FROM
					stockprod stk 
					INNER JOIN producto pro on stk.IdProducto = pro.IdProducto
					INNER JOIN sucursal su on su.IdSucursal = stk.IdSucursal
					WHERE su.IdSucursal = 1 and pro.IdProducto = $this->intIdProducto";
		$request = $this->select($query);
		return $request;
	}

	public function selectproductorotulo(int $IdProducto)
	{
		$this->intIdProducto	= $IdProducto;

		$query = "SELECT p.IdProducto,CONCAT('0', f.IdFamilia,'.', c.IdClase,'.', p.CodProducto)as codigo, f.IdFamilia,c.IdClase, p.CodProducto, p.Descripcion as 'producto',u.Descripcion as 'uma', c.Descripcion as 'clase',f.Descripcion as 'familia' 
					FROM producto p
					INNER JOIN uma u on u.IdUma = p.IdUma
					INNER JOIN clase c on c.IdClase = p.IdClase
					INNER JOIN familia f on f.IdFamilia = c.IdFamilia
					WHERE p.Estado != 0 and p.IdProducto = '{$this->intIdProducto}'";
		$request = $this->select($query);		

		return $request;


	}


	public function selectstockproducto(int $producto)
	{
			$this->intproducto 	= $producto;
		

		$query = "SELECT stk.IdStockProd,pro.Descripcion, stk.at, stk.bt, stk.ct, stk.Existencia,stk.Estado
					FROM
					stockprod stk 
					INNER JOIN producto pro on stk.IdProducto = pro.IdProducto
					INNER JOIN sucursal su on su.IdSucursal = stk.IdSucursal
					WHERE su.IdSucursal = 1 and pro.IdProducto = '{$this->intproducto}'";

		$request = $this->select_all($query);

		return $request;
	}

	#aqui termina


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
				$where = "WHERE su.IdSucursal = $this->intsucursal ORDER BY tjm.IdTarjetaMov asc"; 

			}else if($this->intsucursal == 0 && $this->intproducto != 0 && $this->intdesde == '' && $this->inthasta == ''){
				$where = " WHERE prod.IdProducto = $this->intproducto ORDER BY tjm.IdTarjetaMov asc"; 

			}else if($this->intsucursal == 0 && $this->intproducto == 0 && $this->intdesde != '' && $this->inthasta ==  ''){
				$where = "WHERE DATE(tjm.FechaCrea) = '{$this->intdesde}' ORDER BY tjm.IdTarjetaMov asc";

			}else if($this->intsucursal == 0 && $this->intproducto != 0 && $this->intdesde != '' && $this->inthasta != ''){
				$where = " WHERE prod.IdProducto  = $this->intproducto and DATE(tjm.FechaCrea)  BETWEEN '{$this->intdesde}' AND '{$this->inthasta}' ORDER BY tjm.IdTarjetaMov asc";

			}else if($this->intsucursal != 0 && $this->intproducto != 0 && $this->intdesde != '' && $this->inthasta != ''){
				$where = " WHERE su.IdSucursal = $this->intsucursal and prod.IdProducto  = $this->intproducto and DATE(tjm.FechaCrea)  BETWEEN '{$this->intdesde}' AND '{$this->inthasta}' ORDER BY tjm.IdTarjetaMov asc";

			}else if($this->intsucursal == 0 && $this->intproducto != 0 && $this->intdesde != '' && $this->inthasta == ''){
				$where = " WHERE prod.IdProducto  = $this->intproducto and DATE(tjm.FechaCrea)  = '{$this->intdesde}' ORDER BY tjm.IdTarjetaMov asc";

			}else if($this->intsucursal != 0 && $this->intproducto == 0 && $this->intdesde != '' && $this->inthasta != ''){
				$where = " WHERE su.IdSucursal  = $this->intsucursal and DATE(tjm.FechaCrea)  BETWEEN '{$this->intdesde}' AND '{$this->inthasta}' ORDER BY tjm.IdTarjetaMov asc";

			}else if($this->intsucursal == 0 && $this->intproducto == 0 && $this->intdesde != '' && $this->inthasta != ''){
				$where = " WHERE  DATE(tjm.FechaCrea)  BETWEEN '{$this->intdesde}' AND '{$this->inthasta}' ORDER BY tjm.IdTarjetaMov asc";
			}




		$query = "SELECT prod.IdProducto,su.Descripcion as Sucursal,prod.CodProducto,prod.Descripcion as Producto, tpi.Descripcion as Movimiento,
			IF(tjm.kardex = 1, 'Ingreso','Salida') As kardex , tjm.a, tjm.b, tjm.c, tjm.Entrada, tjm.Salida, tjm.Existencia, 
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

	public function getSelectProcucto(){

		$query = "SELECT prod.IdProducto , prod.Descripcion
						FROM tarjetamovimiento tjm 
						INNER JOIN producto prod on tjm.IdProducto = prod.IdProducto
						GROUP BY tjm.IdProducto ";
		$request = $this->select_all($query);
		return $request;

	} 



	



}


?>