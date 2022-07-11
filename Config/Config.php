<?php 

	define('BASE_URL', 'http://localhost/kardex');
	// const BASE_URL = 'http://10.50.20.132/kardex';
	// const BASE_URL = 'http://192.168.1.2/kardex';

	// ZONA HORARIA
	date_default_timezone_set('America/Lima');

	// DATOS DE LA BASE DE DATOS
	const DB_HOST 		= "localhost";
	const DB_NAME 		= "sistema_ka";
	const DB_USER 		= "root";
	//const DB_PASSWORD 	= ".@dmin#Root-2020.";
	const DB_PASSWORD 	= "";
	const DB_CHARSET 	= "charset=utf8";

	
	//DELIMITADOR DECIMAL Y MILES EJ 24,500.77
	const SPD = ".";
	const SPM = ",";

	// SIMBOLO DE LA MONEDA
	const SMONEY = 'S/ ';

	// NOMBRE DEL SISTE;A
	const NAMESYSTEM 	= "CONTROL DE PERSONAL";

?>