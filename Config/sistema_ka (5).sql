-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-03-2022 a las 22:49:05
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistema_ka`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `id_cargo` int(11) NOT NULL,
  `cargo` varchar(200) NOT NULL,
  `remuneracion` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `user_create` int(11) NOT NULL,
  `date_create` datetime NOT NULL DEFAULT current_timestamp(),
  `user_update` int(11) NOT NULL,
  `date_update` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`id_cargo`, `cargo`, `remuneracion`, `cantidad`, `estado`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
(86, 'GERENTE GENERAL', 2000, 0, 0, 12, '2021-11-28 23:41:17', 12, '2022-02-28 09:14:06'),
(87, 'ADMINISTRADOR', 2000, 0, 1, 12, '2021-11-28 23:41:27', 12, '2022-02-21 09:27:33'),
(88, 'ASESOR DE VENTAS', 1500, 0, 0, 12, '2022-01-06 00:32:35', 12, '2022-03-07 16:30:28'),
(89, 'ASISTENTE', 520033, 0, 0, 12, '2022-02-04 12:52:19', 12, '2022-02-18 14:32:37'),
(90, 'ANALISTA DE TURNO', 1, 0, 1, 12, '2022-03-08 11:08:30', 0, '0000-00-00 00:00:00'),
(91, 'ANALISTA DE LINEA', 1, 0, 1, 12, '2022-03-08 11:08:44', 0, '2022-03-09 09:19:47'),
(92, 'doc', 1, 0, 0, 12, '2022-03-08 11:14:08', 0, '2022-03-08 11:15:12'),
(93, 'ANALISTA DE CONTROL DE DATOS Y GUIAS 1', 1, 0, 1, 12, '2022-03-08 11:15:27', 0, '0000-00-00 00:00:00'),
(94, 'ASISTENTE DE ARCHIVO', 1, 0, 0, 12, '2022-03-08 11:17:14', 0, '2022-03-14 15:00:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo_funcion`
--

CREATE TABLE `cargo_funcion` (
  `id_cargofuncion` int(11) NOT NULL,
  `id_cargo` int(11) NOT NULL,
  `id_funcion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cargo_funcion`
--

INSERT INTO `cargo_funcion` (`id_cargofuncion`, `id_cargo`, `id_funcion`) VALUES
(84, 1, 5),
(85, 1, 6),
(86, 1, 7),
(87, 1, 8),
(90, 1, 9),
(88, 1, 10),
(83, 1, 11),
(89, 1, 87),
(97, 3, 19),
(102, 3, 20),
(99, 3, 21),
(100, 3, 22),
(98, 3, 23),
(101, 3, 87),
(108, 4, 5),
(109, 4, 24),
(106, 4, 25),
(107, 4, 26),
(112, 4, 27),
(111, 4, 28),
(110, 4, 29),
(113, 4, 30),
(115, 4, 31),
(114, 4, 87),
(121, 5, 5),
(120, 5, 26),
(119, 5, 32),
(117, 5, 33),
(118, 5, 34),
(116, 5, 35),
(122, 5, 87),
(126, 24, 218),
(123, 24, 219),
(127, 24, 220),
(124, 24, 221),
(125, 24, 222),
(128, 24, 223),
(145, 26, 223),
(144, 26, 224),
(140, 26, 225),
(139, 26, 226),
(141, 26, 227),
(142, 26, 228),
(143, 26, 229),
(137, 26, 230),
(138, 26, 231),
(81, 41, 87),
(80, 41, 166),
(82, 41, 167),
(78, 41, 168),
(79, 41, 169),
(56, 42, 19),
(62, 42, 87),
(58, 42, 170),
(61, 42, 171),
(57, 42, 172),
(59, 42, 173),
(60, 42, 174),
(74, 43, 87),
(72, 43, 175),
(73, 43, 176),
(76, 43, 177),
(68, 43, 178),
(77, 43, 180),
(71, 43, 181),
(69, 43, 182),
(75, 43, 183),
(70, 43, 217),
(54, 47, 87),
(46, 47, 184),
(51, 47, 185),
(45, 47, 186),
(55, 47, 187),
(50, 47, 188),
(47, 47, 189),
(49, 47, 190),
(53, 47, 191),
(52, 47, 192),
(48, 47, 193),
(44, 48, 87),
(36, 48, 194),
(42, 48, 195),
(40, 48, 196),
(41, 48, 197),
(35, 48, 198),
(32, 48, 199),
(34, 48, 200),
(37, 48, 201),
(38, 48, 202),
(31, 48, 203),
(33, 48, 204),
(39, 48, 205),
(43, 48, 206),
(29, 49, 87),
(21, 49, 94),
(27, 49, 209),
(24, 49, 210),
(23, 49, 211),
(25, 49, 212),
(26, 49, 213),
(28, 49, 214),
(22, 49, 215),
(30, 49, 216);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ccalidad`
--

CREATE TABLE `ccalidad` (
  `IdCcalidad` int(11) NOT NULL,
  `IdComprarepliegue` int(11) NOT NULL,
  `IdPersonal` int(11) DEFAULT NULL,
  `UsuarioCrea` int(11) NOT NULL,
  `FechaCrea` datetime NOT NULL DEFAULT current_timestamp(),
  `Estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `centroconsumo`
--

CREATE TABLE `centroconsumo` (
  `IdCentroConsumo` int(11) NOT NULL,
  `Descripcion` varchar(100) NOT NULL,
  `UsuarioCrea` int(11) NOT NULL,
  `Estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `centroconsumo`
--

INSERT INTO `centroconsumo` (`IdCentroConsumo`, `Descripcion`, `UsuarioCrea`, `Estado`) VALUES
(1, 'DATOS Y GUIAS', 12, 1),
(2, 'ARCHIVO ELECTORAL', 12, 1),
(3, 'ENSAMBLAJE', 12, 1),
(5, 'dsfdsf', 21, 0),
(7, 'ass', 21, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clase`
--

CREATE TABLE `clase` (
  `IdClase` int(11) NOT NULL,
  `Descripcion` varchar(100) NOT NULL,
  `IdFamilia` int(11) NOT NULL,
  `UsuarioCrea` int(11) NOT NULL,
  `FechaCrea` datetime NOT NULL DEFAULT current_timestamp(),
  `Estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clase`
--

INSERT INTO `clase` (`IdClase`, `Descripcion`, `IdFamilia`, `UsuarioCrea`, `FechaCrea`, `Estado`) VALUES
(11, 'UTILES Y HERRAMIENTAS DE OFICINA', 1, 12, '2022-01-20 16:21:04', 1),
(12, 'REPUESTOS Y ACCESORIOS INFORMATICO', 1, 12, '2022-01-20 16:21:04', 1),
(13, 'CARTONERIA Y PAPELERIA', 1, 12, '2022-01-20 16:21:04', 1),
(14, 'MATERIAL PARA IMPRENTA ONPE', 1, 12, '2022-01-20 16:21:04', 1),
(21, 'MEDICINA', 2, 12, '2022-01-20 16:21:04', 1),
(22, 'MOBILIARIOS Y EQUIPOS MEDICOS', 2, 12, '2022-01-20 16:21:04', 1),
(31, 'INDUMENTARIA DE TRABAJO', 3, 12, '2022-01-20 16:21:04', 1),
(32, 'EPP Y HERRAMIENTA DE SEGURIDAD', 3, 12, '2022-01-20 16:21:04', 1),
(33, 'MATERIAL DE LIMPIEZA', 3, 12, '2022-01-20 16:21:04', 1),
(34, 'MATERIAL EN CUSTODIA', 3, 12, '2022-01-20 16:21:04', 1),
(41, 'MAQUINARIAS Y EQUIPOS ELECTRONICOS', 4, 12, '2022-01-20 16:21:04', 1),
(42, 'EQUIPOS INFORMATICOS ADMINISTRATIVOS', 4, 12, '2022-01-20 16:21:04', 1),
(43, 'MOBILIARIOS', 4, 12, '2022-01-20 16:21:04', 1),
(44, 'ESTRUCTURA PARA ALMACENES', 4, 12, '2022-01-20 16:21:04', 1),
(45, 'MATERIALES ELECTRICOS', 4, 12, '2022-01-20 16:21:04', 1),
(46, 'MATERIAL DE GASFITERIA', 4, 12, '2022-01-20 16:21:04', 1),
(47, 'MATERIAL DE FERRETERIA', 4, 12, '2022-01-20 16:21:04', 1),
(48, 'MATERIAL DE CARPINTERIA', 4, 12, '2022-01-20 16:21:04', 1),
(51, 'ABARROTES Y MENAJE', 5, 12, '2022-01-20 16:21:04', 1),
(52, 'GOLOSINAS Y BEBIDAS', 5, 12, '2022-03-14 12:30:50', 1),
(61, 'UTILES ELECTORALES', 6, 12, '2022-01-20 16:21:04', 1),
(62, 'LAMINAS Y ETIQUETAS ', 6, 12, '2022-01-20 16:21:04', 1),
(63, ' SOBRES PLASTICOS Y DE PAPEL', 6, 12, '2022-01-20 16:21:04', 1),
(64, 'FORMATOS Y ROTULOS ELECTORALES', 6, 12, '2022-01-20 16:21:04', 1),
(65, 'IMPLEMENTOS ELECTORALES', 6, 12, '2022-01-20 16:21:04', 1),
(66, 'FORMATOS GOECOR', 6, 12, '2022-03-21 09:51:15', 1),
(67, 'PRE ENSAMBLADOS', 6, 12, '2022-01-20 16:21:04', 1),
(68, 'MATERIAL ENSAMBLADO', 6, 12, '2022-03-21 09:51:15', 1),
(70, 'ETIQUETAS AUTOADHESIVAS DE COLOR', 7, 12, '2022-01-20 16:21:04', 1),
(71, 'BOLSA DE POLIETILENO', 7, 12, '2022-01-20 16:21:04', 1),
(72, 'CAJAS DE CARTON Y POLIETILENO', 7, 12, '2022-01-20 16:21:04', 1),
(73, 'CINTAS DE EMBALAJE Y STRECH FILM', 7, 12, '2022-01-20 16:21:04', 1),
(74, 'OTROS MAT.EMBALAJE Y PRECINTO D SEGURIDA', 7, 12, '2022-01-20 16:21:04', 1),
(81, 'MANUAL INTRUCCIONES CARTILLAS Y GUIAS', 8, 12, '2022-03-21 09:52:39', 1),
(82, 'CARTELES Y AFICHES', 8, 12, '2022-03-21 09:52:39', 1),
(83, 'SEÑALETICAS', 8, 12, '2022-01-20 16:21:04', 1),
(91, 'MATERIAL CRITICO CAPACITACION', 9, 12, '2022-03-21 09:55:44', 1),
(92, 'MATERIAL CRITICO SUFRAGIO', 9, 12, '2022-01-20 16:21:04', 1),
(101, 'INSUMOS EIE', 10, 12, '2022-01-20 16:21:04', 1),
(102, 'DISPOSITIVOS EIE\r\n', 10, 12, '2022-03-21 09:55:44', 1),
(111, 'EIE EQUIPOS REPLEGADOS', 11, 12, '2022-01-20 16:21:04', 1),
(112, 'EIE DISPOSITIVOS / ACCESORIOS REPLEGADOS', 11, 12, '2022-03-21 09:57:21', 1),
(113, 'OTROS', 11, 12, '2022-03-21 09:57:21', 1),
(121, 'MATERIAL CRITICO REPLEGADO', 12, 12, '2022-03-14 11:44:35', 1),
(122, 'IMPLEMENTO Y MAT. ELECTORAL REPLEGADO\r\n', 12, 12, '2022-03-21 09:58:24', 1),
(123, 'OTROS REPLEGADO', 12, 12, '2022-03-21 09:58:24', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colaborador`
--

CREATE TABLE `colaborador` (
  `id_colaborador` int(11) NOT NULL,
  `id_personal` int(11) NOT NULL,
  `id_cargo` int(11) NOT NULL,
  `nro_contrato` varchar(50) NOT NULL,
  `fecha_contrato` date NOT NULL,
  `ruc` varchar(20) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `telefono` int(11) NOT NULL,
  `departamento` varchar(200) NOT NULL,
  `provincia` varchar(200) NOT NULL,
  `distrito` varchar(200) NOT NULL,
  `estado` int(11) DEFAULT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fecha_fin` date NOT NULL,
  `id_pedido` int(11) NOT NULL,
  `requerimiento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `IdCompra` int(11) NOT NULL,
  `FechaCrea` datetime NOT NULL DEFAULT current_timestamp(),
  `FechaDoc` date DEFAULT NULL,
  `IdTipoDocumento` int(11) NOT NULL,
  `IdTipoIngreso` int(11) NOT NULL,
  `Serie` varchar(100) NOT NULL,
  `IdSucursal` int(11) NOT NULL,
  `IdProceso` int(11) NOT NULL,
  `IdProveedor` int(11) NOT NULL,
  `UsuarioCrea` int(11) NOT NULL,
  `UsuarioMod` int(11) DEFAULT 0,
  `FechaMod` date DEFAULT NULL,
  `Estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`IdCompra`, `FechaCrea`, `FechaDoc`, `IdTipoDocumento`, `IdTipoIngreso`, `Serie`, `IdSucursal`, `IdProceso`, `IdProveedor`, `UsuarioCrea`, `UsuarioMod`, `FechaMod`, `Estado`) VALUES
(75, '2022-03-23 16:43:40', '2022-03-16', 1, 1, 'jhgjhg', 1, 1, 1, 12, 0, NULL, 1),
(76, '2022-03-23 16:44:14', '2022-03-23', 1, 1, 'gfdgfd', 1, 1, 1, 12, 0, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comprarepliegue`
--

CREATE TABLE `comprarepliegue` (
  `IdComprarepliegue` int(11) NOT NULL,
  `FechaCrea` datetime NOT NULL DEFAULT current_timestamp(),
  `FechaDoc` date DEFAULT NULL,
  `IdTipoDocumento` int(11) NOT NULL,
  `IdTipoIngreso` int(11) NOT NULL,
  `Serie` varchar(100) NOT NULL,
  `NroPedido` varchar(100) DEFAULT NULL,
  `OrdenCompra` varchar(100) DEFAULT NULL,
  `Pecosa` varchar(100) DEFAULT NULL,
  `IdSucursal` int(11) NOT NULL,
  `IdProceso` int(11) NOT NULL,
  `IdProveedor` int(11) NOT NULL,
  `UsuarioCrea` int(11) NOT NULL,
  `Estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleccalidad`
--

CREATE TABLE `detalleccalidad` (
  `IdDetalleCcalidad` int(11) NOT NULL,
  `IdCcalidad` int(11) NOT NULL,
  `IdComprarepliegue` int(11) NOT NULL,
  `IdProducto` int(11) NOT NULL,
  `a` int(11) NOT NULL,
  `b` int(11) NOT NULL,
  `c` int(11) DEFAULT NULL,
  `UsuarioCrea` int(11) NOT NULL,
  `FechaCrea` datetime NOT NULL DEFAULT current_timestamp(),
  `Estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallecompra`
--

CREATE TABLE `detallecompra` (
  `IdDetalleCompra` int(11) NOT NULL,
  `IdCompra` int(11) NOT NULL,
  `IdProducto` int(11) NOT NULL,
  `IdTarjetaMov` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `UsuarioMod` int(11) DEFAULT 0,
  `FechaMod` int(11) DEFAULT NULL,
  `Estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detallecompra`
--

INSERT INTO `detallecompra` (`IdDetalleCompra`, `IdCompra`, `IdProducto`, `IdTarjetaMov`, `Cantidad`, `UsuarioMod`, `FechaMod`, `Estado`) VALUES
(123, 75, 546, 2348, 1000, 0, NULL, 1),
(124, 76, 552, 2349, 2000, 0, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallecomprarepliegue`
--

CREATE TABLE `detallecomprarepliegue` (
  `IdDetallecomprarepliegue` int(11) NOT NULL,
  `IdComprarepliegue` int(11) NOT NULL,
  `IdProducto` int(11) NOT NULL,
  `IdTarjetaMov` int(11) NOT NULL,
  `TcA` int(11) NOT NULL,
  `TcB` int(11) NOT NULL,
  `TcC` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleformato`
--

CREATE TABLE `detalleformato` (
  `IdDetFormato` int(11) NOT NULL,
  `IdFormato` int(11) NOT NULL,
  `IdProducto` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Aa` int(11) DEFAULT 0,
  `Ab` int(11) DEFAULT 0,
  `Ac` int(11) DEFAULT 0,
  `UsuarioMod` int(11) DEFAULT 0,
  `Estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalleformato`
--

INSERT INTO `detalleformato` (`IdDetFormato`, `IdFormato`, `IdProducto`, `Cantidad`, `Aa`, `Ab`, `Ac`, `UsuarioMod`, `Estado`) VALUES
(5, 7, 1130, 10, 0, 0, 0, 0, 1),
(6, 7, 1452, 10, 0, 0, 0, 0, 1),
(7, 8, 1130, 10, 0, 0, 0, 0, 1),
(8, 9, 1130, 2, 0, 0, 0, 0, 1),
(9, 9, 1452, 2, 0, 0, 0, 0, 1),
(10, 10, 110, 1, 0, 0, 0, 0, 1),
(11, 10, 168, 1, 0, 0, 0, 0, 1),
(12, 11, 37, 1000, 0, 0, 0, 0, 1),
(13, 11, 37, 1000, 0, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallerequerimiento`
--

CREATE TABLE `detallerequerimiento` (
  `IdDetRequerimiento` int(11) NOT NULL,
  `IdRequerimiento` int(11) NOT NULL,
  `IdProducto` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Aa` int(11) DEFAULT 0,
  `Ab` int(11) DEFAULT 0,
  `Ac` int(11) DEFAULT 0,
  `UsuarioMod` int(11) DEFAULT 0,
  `UsuarioExtorna` int(11) DEFAULT NULL,
  `FechaExtorna` date DEFAULT NULL,
  `Estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detallerequerimiento`
--

INSERT INTO `detallerequerimiento` (`IdDetRequerimiento`, `IdRequerimiento`, `IdProducto`, `Cantidad`, `Aa`, `Ab`, `Ac`, `UsuarioMod`, `UsuarioExtorna`, `FechaExtorna`, `Estado`) VALUES
(101, 70, 546, 100, 0, 0, 0, 0, NULL, NULL, 1),
(102, 70, 552, 200, 0, 0, 0, 0, NULL, NULL, 1),
(103, 71, 552, 500, 0, 0, 0, 0, NULL, NULL, 1),
(104, 72, 546, 900, 0, 0, 0, 0, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallesalida`
--

CREATE TABLE `detallesalida` (
  `IdDetalleSalida` int(11) NOT NULL,
  `IdSalida` int(11) NOT NULL,
  `IdProducto` int(11) NOT NULL,
  `IdTarjetaMov` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `UsuarioMod` int(11) DEFAULT NULL,
  `FechaMod` date DEFAULT NULL,
  `Estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadoprod`
--

CREATE TABLE `estadoprod` (
  `IdEstado` int(11) NOT NULL,
  `Descripcion` varchar(100) NOT NULL,
  `Estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `extornar`
--

CREATE TABLE `extornar` (
  `IdExtornar` int(11) NOT NULL,
  `IdIngSalReq` int(11) NOT NULL,
  `IdTipoExtornar` int(11) NOT NULL,
  `Observaciones` varchar(100) NOT NULL,
  `UsuarioCrea` int(11) NOT NULL,
  `FechaCrea` datetime DEFAULT current_timestamp(),
  `Estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `extornar`
--

INSERT INTO `extornar` (`IdExtornar`, `IdIngSalReq`, `IdTipoExtornar`, `Observaciones`, `UsuarioCrea`, `FechaCrea`, `Estado`) VALUES
(21, 51, 1, 'dfdsf', 12, '2022-03-21 00:00:00', 1),
(22, 52, 1, 'POR QUE SI', 12, '2022-03-22 16:02:12', 1),
(23, 9, 2, 'PORQUE SI', 25, '2022-03-22 16:35:15', 1),
(24, 56, 1, 'PORQUE SI', 25, '2022-03-22 16:39:33', 1),
(25, 64, 3, 'anular requerimiento', 12, '2022-03-23 15:41:17', 1),
(26, 63, 3, 'anular requerimiento', 12, '2022-03-23 15:43:17', 1),
(27, 60, 3, 'anular requerimiento', 12, '2022-03-23 15:43:22', 1),
(28, 58, 3, 'anular requerimiento', 12, '2022-03-23 15:43:29', 1),
(29, 70, 1, 'SI', 12, '2022-03-23 15:55:04', 1),
(30, 13, 2, 'VCDSFCS', 12, '2022-03-23 15:56:22', 1),
(31, 66, 3, 'HBGFHGF', 12, '2022-03-23 16:19:24', 1),
(32, 68, 3, 'todo ok', 12, '2022-03-23 16:35:22', 1),
(33, 69, 3, 'ok anular', 12, '2022-03-23 16:41:23', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `familia`
--

CREATE TABLE `familia` (
  `IdFamilia` int(11) NOT NULL,
  `Descripcion` varchar(100) NOT NULL,
  `UsuarioCrea` int(11) NOT NULL,
  `FechaCrea` datetime NOT NULL DEFAULT current_timestamp(),
  `Estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `familia`
--

INSERT INTO `familia` (`IdFamilia`, `Descripcion`, `UsuarioCrea`, `FechaCrea`, `Estado`) VALUES
(1, 'UTILES OFICINA Y MATERIALES AUXILIARES', 12, '2022-01-20 14:07:21', 1),
(2, 'MEDICAMENTO MOBILIARIOS Y EQUIP MEDICO', 12, '2022-01-20 14:40:34', 1),
(3, 'LIMPIEZA INDUMENTARIA EPP Y MAT CUSTODIA', 12, '2022-01-20 14:41:06', 1),
(4, 'MUEBLES MAQUINARIAS FERRETERIA Y EQUIPOS', 12, '2022-01-20 15:12:23', 1),
(5, 'ENSERES Y PERECIBLES', 12, '2022-01-20 15:12:30', 1),
(6, 'MATERIAL ELECTORAL', 12, '2022-01-20 15:13:48', 1),
(7, 'MATERIAL DE EMBALAJE', 12, '2022-01-20 15:13:59', 1),
(8, 'MATERIAL EDUCATIVO Y SEÑALETICAS', 12, '2022-01-20 15:14:05', 1),
(9, 'MATERIAL ELECTORAL CRITICO', 12, '2022-01-20 15:14:13', 1),
(10, 'E.I.E DISPOSITIVOS Y MATERIALES', 12, '2022-01-20 15:14:19', 1),
(11, 'E.I.E Y DISPOSITIVOS REPLEGADOS', 12, '2022-01-20 15:14:26', 1),
(12, 'MATERIAL ELECTORAL REPLEGADO', 12, '2022-03-14 11:30:55', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fase`
--

CREATE TABLE `fase` (
  `IdFase` int(11) NOT NULL,
  `Descripcion` varchar(100) NOT NULL,
  `Estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `fase`
--

INSERT INTO `fase` (`IdFase`, `Descripcion`, `Estado`) VALUES
(1, 'RECUPERACION MAT.', 1),
(2, 'ACONDICIONAM. MAT.', 1),
(3, 'TALLER ', 1),
(4, 'CAPACITACION', 1),
(5, '1° JORNADA DE CAPACITACION', 1),
(6, '2° JORNADA DE CAPACITACION', 1),
(7, 'SUFRAGIO', 1),
(8, 'RESERVA', 1),
(9, 'DESPLIEGUE', 1),
(10, 'REPLIEGUE', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formato`
--

CREATE TABLE `formato` (
  `IdFormato` int(11) NOT NULL,
  `Fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `IdProceso` int(11) DEFAULT NULL,
  `IdSucursal` int(11) NOT NULL,
  `IdCentroConsumo` int(11) NOT NULL,
  `IdFase` int(11) DEFAULT 0,
  `Cantidad` int(11) DEFAULT 0,
  `Prioridad` int(11) NOT NULL,
  `Turno` int(11) DEFAULT 0,
  `NroOrden` varchar(100) DEFAULT '0',
  `Actividad` varchar(100) DEFAULT '0',
  `FechaActividad` date DEFAULT NULL,
  `Alinea` varchar(100) DEFAULT '0',
  `Aturno` varchar(100) DEFAULT '0',
  `Observaciones` varchar(100) NOT NULL,
  `IdUsuario` int(11) NOT NULL,
  `Estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `formato`
--

INSERT INTO `formato` (`IdFormato`, `Fecha`, `IdProceso`, `IdSucursal`, `IdCentroConsumo`, `IdFase`, `Cantidad`, `Prioridad`, `Turno`, `NroOrden`, `Actividad`, `FechaActividad`, `Alinea`, `Aturno`, `Observaciones`, `IdUsuario`, `Estado`) VALUES
(7, '2022-03-10 09:43:37', 1, 1, 2, 1, 654, 1, 2, '654', '654', '2022-03-10', 'Freddy Gomez', 'NEDY AVELDAÑO ABC', 'fdg', 12, 1),
(8, '2022-03-10 11:25:07', 1, 1, 2, 3, 5645, 1, 1, 'dfdsf4555', 'dsfds', '2022-03-10', 'Freddy Gomez', 'NEDY AVELDAÑO ABC', '', 12, 1),
(9, '2022-03-10 11:27:17', 1, 1, 2, 5, 6546, 2, 1, 'hgjhg', 'jhgj', '2022-03-10', 'abraham', 'NEDY AVELDAÑO ABC', '', 12, 1),
(10, '2022-03-21 15:57:43', 1, 1, 1, 2, 50, 1, 3, 'fdsfsd', 'fdsfds', '2022-03-21', 'NEDY AVENDAÑO', 'JUAN RAMIREZ', 'sfds', 12, 1),
(11, '2022-03-22 10:48:22', 1, 1, 1, 1, 45, 2, 2, 'gfhgf4', 'gfhgf', '2022-03-22', 'NEDY AVENDAÑO', 'NEDY AVELDAÑO ABC', 'fhgfhgfh', 12, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `funcion`
--

CREATE TABLE `funcion` (
  `id_funcion` int(11) NOT NULL,
  `funcion` varchar(350) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `funcion`
--

INSERT INTO `funcion` (`id_funcion`, `funcion`, `estado`) VALUES
(5, 'Apoyar en la elaboración de los pedidos de compra y servicios.', 1),
(6, 'Apoyar en la evaluación de las especificaciones técnicas y términos de referencia presentados por los responsables de los procesos de la GGE, para la adquisición de bienes y servicios proponiendo los ajustes necesarios.', 1),
(7, 'Apoyar en la revisión de las conformidades  presentada por los responsables de los procesos de la SGOE de los bienes y servicios adquiridos, proponiendo los ajustes necesarios.', 1),
(8, 'Elaborar memorando, informes y otros que sean necesarios por la SGOE.', 1),
(9, 'Registrar y realizar el seguimiento de los documentos emitidos de la SGOE en materia Logística y Legal.', 1),
(10, 'Realizar asesoramiento técnico legal para la formulación de recomendaciones y sugerencias orientadas a la solución de observaciones de la elaboración de los pedidos, TDR y ET.', 1),
(11, 'Apoyar en el soporte legal al personal administrativo encargado en la elaboración de los términos de referencia y/o especificaciones técnicas relacionadas con la adquisición de bienes y la contratación de servicios de la Subgerencia de Operaciones Electorales.', 1),
(13, 'Brindar asesoría en Gestión Administrativa de recursos dentro del marco de la normatividad  vigente y a la Ley de Modernización del Estado.', 1),
(14, 'Analizar y revisar la gestión de los bienes y servicios contratados para el proceso electoral.', 1),
(15, 'Gestionar las acciones de control de los procesos ejecutados y por ejecutar para el proceso electoral.', 1),
(16, 'Apoyar en la evaluación de las especificaciones técnicas y términos de referencia del proceso electoral.', 1),
(17, 'Coordinar con el personal de la Subgerencia de Control Patrimonial  para la atención oportuna de los requerimientos para la implementación de los servicios y mantenimiento del proceso electoral.', 1),
(18, 'Coordinar el control de Bienes patrimoniales y generación de sus guías de transferencia y desplazamiento. ', 1),
(19, 'Brindar Asesoría en Gestión Operativa, Implementación de Sistemas  Integrados y Administración de Recursos dentro del marco  de la normatividad vigente y la Ley de Modernización del Estado.', 1),
(20, 'Revisar y/o elaborar los documentos normativos (en materia de procesos y sistema de gestión de la calidad) proponiendo cambios y mejoras de la Gerencia de Gestión Electoral para el proceso electoral.', 1),
(21, 'Organizar y Supervisar los equipos de trabajo para la sistematización y automatización de los procesos de la Gerencia de Gestión Electoral en lo que respecta al proceso electoral.', 1),
(22, 'Realizar la revisión de los diversos procesos de la Gerencia de Gestión Electoral en lo que respecta al proceso electoral.', 1),
(23, 'Formular y proponer proyectos de mejora e innovación en sistemas logísticos para el proceso electoral.', 1),
(24, 'Apoyar en la elaboración de los términos de referencia y especificaciones técnicas.', 1),
(25, 'Apoyar en el seguimiento y monitoreo de los servicios y/o adquisiciones de bienes emitidos.', 1),
(26, 'Apoyar en la elaboración de conformidades de servicios y/o adquisición de bienes.', 1),
(27, 'Apoyar en la gestión de los trámites documentarios del proceso electoral.', 1),
(28, 'Apoyar en la generación de expedientes de los requerimientos de bienes y servicios.', 1),
(29, 'Apoyar en la elaboración de memorándums, informes y otros que me fueron requeridos.', 1),
(30, 'Apoyar en la organización y administración del archivo de los documentos generados.', 1),
(31, 'Registrar y realizar el seguimiento de los documentos recibidos y emitidos.', 1),
(32, 'Apoyar en el seguimiento de la programación presupuestal de la Gerencia de Gestión Electoral.', 1),
(33, 'Apoyar en el análisis de la información presupuestal de la Gerencia de Gestión Electoral.', 1),
(34, 'Apoyar en el control y registro de la ejecución del presupuesto asignado para actividades electorales de la Gerencia de Gestión Electoral.', 1),
(35, 'Apoyar en el acopio de información y registro del avance en el cumplimiento de metas presupuestales de la Gerencia de Gestión Electoral.', 1),
(36, 'Elaborar, diseñar y actualizar las bases de datos utilizadas por la GGE durante el proceso electoral.', 1),
(37, 'Administrar y actualizar la base de datos de los EIE utilizados en el proceso electoral.', 1),
(38, 'Realizar el mantenimiento de los aplicativos utilizados para dar soporte a actividades del proceso electoral.', 1),
(39, 'Actualizar los controles sistematizados implementados por la GGE para la realización de sus actividades.', 1),
(40, 'Apoyar en el diseño y emisión de reportes de las bases de datos utilizadas por la GGE durante el proceso electoral.', 1),
(41, 'Generar copias de seguridad de las bases de datos del proceso electoral.', 1),
(42, 'Proponer e implementar proyectos de mejora en el área de acuerdo a las actividades.', 1),
(43, 'Informé permanentemente sobre el desarrollo de actividades al Coordinador de Control de Datos y Guías.', 1),
(44, 'Otras actividades que le asigne la Gerencia de Gestión Electoral.', 1),
(45, 'Realizar la inducción  sobre los  parámetros de control de calidad de los formatos y materiales electorales al personal.', 1),
(46, 'Elaborar y actualizar el cuadro de control de ingresos  y avances de control de calidad del material electoral de capacitación y sufragio.', 1),
(47, 'Elaborar y actualizar el cuadro de control de ingresos y avances en el control de calidad de los materiales de voto electrónico por solución tecnológica.', 1),
(48, 'Actualizar el reporte de control de calidad (FM01-GGE-RCD) por cada material y  por proceso electoral.', 1),
(49, 'Asignar las labores y actividades a cada línea de trabajo para luego inspeccionar el desarrollo del trabajo en los controles de calidad.', 1),
(50, 'Apoyar en las actividades de control de calidad u ordenamiento de cedulas de sufragio y reserva mediante el aplicativo “Registro y control de cedulas por paquete\\\"', 1),
(51, 'Apoyar en la verificación y control de las actividades del proceso de Control de calidad de cedulas, mediante el aplicativo “Control de calidad automatizada de cedulas\\\".', 1),
(52, 'Apoyar en la verificación y recepción de los dispositivos USB, mediante el aplicativo \\\"Control TOKEN USB de sufragio\\\"', 1),
(53, 'Apoyar en la verificación y control de los rótulos de números de mesa de sufragio mediante el aplicativo \\\"Control y validación de los rótulos número de mesa  de sufragio\\\".', 1),
(54, 'Apoyar en la verificación y control de los rótulos de grupo de votación de sufragio mediante el aplicativo \\\"control y validación de los rótulos de grupo de votación de sufragio\\\"', 1),
(55, 'Apoyar en la  verificación y control de la apertura, clasificación y consolidación de los materiales replegados por proceso electoral.', 1),
(56, 'Actualizar el consolidado de clasificación de material electoral  replegado por proceso  y coordinar la entrega al área de control de datos y guías.', 1),
(57, 'Elaborar los reportes e informes de Control de Calidad sobre el desarrollo del proceso electoral.', 1),
(58, 'Acompañar en caso necesario, el material electoral durante el despliegue desde la GGE hacia las ODPE y/o ORC.', 1),
(59, 'Acompañar en caso necesario, los documentos electorales e implementos electorales, durante el repliegue desde las sedes de las ODPE y/o ORC hacia la GGE.', 1),
(60, 'Apoyar en actividades de Digitalizacion y Archivo Electoral de Documentos Electorales', 1),
(62, 'Coordiar el pre despacho y el despacho vía aérea o terrestre de productos terminados y equipos informáticos electorales, por etapas del proceso y punto de distribución.', 1),
(63, 'Verificar y controlar la recepción, registro, peso, volumen custodia y despliegue de producto terminado mediante el Aplicativo de despacho, software de pesaje y ERP.', 1),
(64, 'Apoyar en la recepción, control de calidad, registro, organización, ordenamiento y despacho del material electoral y producto terminado.', 1),
(65, 'Asistir en el control, recopilación, organización y los procesamiento del ingreso y salida del material electoral y productos terminados.', 1),
(66, 'Efectuar el seguimiento y control de los registros de la recepción, almacenamiento y distribución de materiales electorales y productos terminados.', 1),
(67, 'Realizar la inducción y control de acceso del personal a cargo, durante las diferentes actividades que me asignaron.', 1),
(68, 'Informar las incidencias ocurridas en el área durante las actividades, al coordinador de materiales.', 1),
(69, 'Establecer las áreas de seguridad para realizar las operaciones de despacho.', 1),
(70, 'Apoyar en la ejecución de inventario y control de stocks del material electoral.', 1),
(71, 'Proponer e implementar proyectos de mejoras en el área de acuerdo a mis actividades.', 1),
(72, 'Acompañar el material electoral y equipos informáticos electorales  durante su traslado a los puntos de distribución.', 1),
(73, 'Informar permanentemente sobre la ejecución, seguimiento, control y resultados de mis actividades al coordinador de materiales.', 1),
(74, 'Relizar otras actividades que me asignó  la Gerencia de Gestión Electoral.', 1),
(75, 'Apoyar en la elaboración y preparación de los expedientes del personal de Locación de Servicios y gestione el pago del personal.', 1),
(76, 'Apoyar en la supervisión y coordinación de seguimiento para la atención de prorrogas de contratos del personal por Locación de Servicios de la GGE para el proceso electoral.', 1),
(77, 'Apoyar en la gestión de trámites documentarios del proceso electoral.', 1),
(78, 'Apoyar en el registro de las cuentas de ahorro para remitir al área de Tesorería de la Subgerencia de Finanzas.', 1),
(79, 'Apoyar en la elaboración de memorándums, informes y otros que le sean requeridos.', 1),
(81, 'Apoyar en trámites documentarios administrativos.', 1),
(82, 'Apoyar para organizar y administrar el archivo de los documentos.', 1),
(83, 'Apoyar en el registro y seguimiento de los documentos recibidos y emitidos.', 1),
(84, 'Tramitar la correspondencia de los documentos generados por la Gerencia.', 1),
(85, 'Apoyar en actividades de Digitalización y Archivo Electoral de Documentos Electorales.', 1),
(86, 'Apoyar en actividades de Ensamblaje de Material Electoral y EIE.', 1),
(87, 'Realizar otras actividades que me asignó la Gerencia de Gestión Electoral.', 1),
(88, 'Apoyar en labores de reparación de mesas, sillas y carpintería en general para la implementación de la planta de ensamblaje de materiales electorales.', 1),
(89, 'Apoyar en labores de acondicionamiento de muebles y ambientes de oficina.', 1),
(90, 'Apoyar en labores de acondicionamiento de electricidad para la planta de ensamblaje de materiales electorales.', 1),
(91, 'Apoyar en labores de acondicionamiento de servicios higiénicos y de gasfitería.', 1),
(92, 'Apoyar en labores de acondicionamiento y habilitación del local.', 1),
(93, 'Apoyar en labores preventivas y correctivas de mantenimiento industrial.', 1),
(94, 'Apoyar en la verificación de ejecución de servicios de terceros en el local de la Gerencia de Gestión Electoral.', 1),
(95, 'Proponer e implementar proyectos de mejoras en el área de acuerdo a sus actividades.', 1),
(96, 'Informar permanentemente sobre el desarrollo de actividades al Coordinador de Control de Datos y Guías.', 1),
(97, 'Coordinar y realizar la verificación del proceso de recepción, control de ingresos  y entrega de los formatos y materiales electorales por proceso.', 1),
(98, 'Realizar la inducción sobre las directivas, procedimientos, instructivos y parámetros de control de calidad al personal.', 1),
(99, 'Realizar la verificación y actualización del cuadro de control de ingreso, avances del control calidad y elaboración del reporte de control de calidad (FM1-GGE-RCD).', 1),
(100, 'Acondicionar y establecer las áreas de seguridad para el desarrollo de las actividades.', 1),
(101, 'Coordinar y realizar el seguimiento de las actividades de control de calidad por proceso electoral.', 1),
(102, 'Supervisar el registro, control y ordenamiento de cedulas de votación mediante el aplicativo “Registro y control de cedulas\\\"', 1),
(103, 'Supervisar la verificación y control de las cedulas de sufragio y reserva mediante el aplicativo (Control de calidad automatizada de cedulas).', 1),
(105, 'Verificar y controlar los rótulos de números de mesa de sufragio mediante el aplicativo \\\"Control y validación de los rótulos número de mesa  de sufragio\\\"', 1),
(106, 'Verificar y controlar los rótulos de grupo de votación de sufragio mediante el aplicativo “Control y validación de los rótulos de grupo de votación de sufragio\\\"', 1),
(107, 'Verificar, controlar y consolidar los materiales replegados por proceso electoral.', 1),
(108, 'Elaborar los reportes e informes durante el desarrollo del proceso electoral.', 1),
(109, 'Coordinar con el Asistente de Data y Estadística el Backup de cada aplicativo, al término del proceso y verificar su entrega a la Coordinadora de Control de Datos y Guías.', 1),
(110, 'Proponer e implementar proyectos de mejora en el área de acuerdo a los requerido.', 1),
(111, 'Apoyar en la diagramación de los rótulos, reportes y guías de despacho para la distribución del material de capacitación, simulacro, sufragio y reserva.', 1),
(112, 'Apoyar en recopilar y centralizar la información de datos de mesas, locales y otros referente al proceso, para su procesamiento y elaboración de reportes y cuadros descriptivos necesarios para las diferentes operaciones que realiza la Gerencia.', 1),
(113, 'Apoyar en el registro de cambios en la base de datos y efectué el seguimiento para el control de cambios por incidencia, al igual que el registro y seguimiento de su impacto en cada fase de las actividades a cargo de la GGE.', 1),
(114, 'Apoyar en la atención de los requerimientos de rótulos, su impresión y emisión oportuna conjuntamente con los reportes en cada etapa del proceso de ensamblaje.', 1),
(115, 'Apoyar en la coordinación del diseño y contenido de las guías de despacho, validar su aprobación y su correspondiente elaboración.', 1),
(116, 'Apoyar en el seguimiento y control de las guías de despacho de material electoral y acuses de recibos para el informe de conformidad del despliegue.', 1),
(117, 'Apoyar en registrar el material electoral replegado y emisión de los recibos de custodia.', 1),
(118, 'Apoyar en supervisar y verificar la instalación, mantenimiento, control de equipos para la recepción de documentos electorales y la descripción documental.', 1),
(119, 'Apoyar en la supervisión de la instalación y el seguimiento del buen funcionamiento del software para la recepción de documentos electorales y la descripción documental.', 1),
(120, 'Informar permanentemente sobre la ejecución de mis actividades al Coordinador de Estadística e Información Electoral.', 1),
(121, 'Coordinar y controlar la recepción de insumos electorales de acuerdo a las respectivas E.T y PECOSAS.', 1),
(122, 'Controlar los movimientos de insumos electorales su registro y generación de reportes de consumos y saldos.', 1),
(123, 'Organizar y controlar los documentos de sustento del material electoral, verificando su recepción y archivo.', 1),
(124, 'Elaborar informes de conformidad por la adquisición de insumos y materiales electorales y de servicios de terceros.', 1),
(125, 'Recepcionar, verificar y controlar los materiales electorales replegados de las ODPES.', 1),
(126, 'Ejecutar el inventario de materiales electorales de fin de proceso.', 1),
(127, 'Recopilar, organizar y procesar la información de ingreso y salida de material y en la elaboración de reportes.', 1),
(128, 'Elaborar las estadísticas y el flujo de material electoral.', 1),
(129, 'Informar la ejecución de sus actividades al analista 1.', 1),
(130, 'Preparar los cuadros estadísticos para elaborar el informe final de las actividades realizadas.', 1),
(131, 'Proponer e implementé proyectos de mejoras en el área de acuerdo a mis actividades.', 1),
(132, 'Realizar la inducción y control de acceso del personal a cargo durante las diferentes actividades que se asigne.', 1),
(133, 'Desarrollar y realizar actividades electorales programadas para el proceso de impresión.', 1),
(134, 'Apoyar en el proceso de impresión de requerimientos de las unidades orgánicas.', 1),
(135, 'Coordinar con las imprentas externas e interna a cargo del servicio de impresiones tales como: Cédula de capacitación y sufragio, Carteles de candidatos y opciones, Cédulas enmicadas para        capacitación, cartillas, afiches y formatos genéricos, por encarg', 1),
(136, 'Coordinar la impresión del material educativo, carteles, cédulas y otros formatos electorales,    organicé equipos de trabajo para el cumplimiento de las actividades necesarias para la impresión del material educativo, carteles de candidatos , cédulas y otros ', 1),
(137, 'Elaborar cuadros y gráficos estadísticos de avance de actividades para el proceso electoral.', 1),
(138, 'Planificar en coordinación con la SGOE el despliegue de material electoral y/o EIE.', 1),
(139, 'Coordinar el Despliegue vía terrestre de material Electoral y/o EIE a las sedes de ODPE/ORC Provincia y a los locales de votación en Lima Metropolitana y Callao.', 1),
(140, 'Coordinar la estiba y distribución de material Electoral y/o EIE vía aérea a sedes de ODPE Provincia.', 1),
(141, 'Planificar en coordinación con la SGOE el repliegue de material electoral, EIE y documentos electorales.', 1),
(142, 'Coordinar el Repliegue vía terrestre desde las sedes de ODPE/ ORC hacia el local de almacenamiento de material y equipos de la GGE y desde los locales de votación en Lima y Callao.', 1),
(143, 'Coordinar el Repliegue vía aérea desde las sedes de ODPE/ORC ( Actividad preparatoria para estiba y repliegue del material electoral y documentos electorales desde las sedes de ODPE/ ORC Provincia a hacia el local de la GGE (vía aérea).', 1),
(144, 'Actividades posteriores al repliegue del material electoral, EIE y documentos electorales.', 1),
(145, 'Realizar las labores previas a la coordinación de programación y producción para las actividades de ensamblaje de material electoral y producción.', 1),
(146, 'Programar las diferentes tareas de las actividades del ensamblaje de material electoral y lleve el control de produccion de las mismas, para el proceso electoral.', 1),
(147, 'Desarrollar en caso necesario, la labor de Coordinador de Turno en el proceso electoral.', 1),
(148, 'Coordinar con el Coordinador de insumos sobre la organizacion de los materiales a utilizar en las diferentes tareas programadas en el proceso electoral.', 1),
(149, 'Emitir las ordenes de trabajo correspondientes a las actividades previas para el ensamblaje de materiales electorales para el proceso electoral.', 1),
(150, 'Diseñar las lineas de produccion en los diferentes ambientes del local de produccion, para las actividades de ensamblaje de materiales electorales para el proceso electoral.', 1),
(151, 'Implementar los controles adecuados para el seguimiento de las actividades y tareas previas para el ensamblaje de materiales electorales para el proceso electoral.', 1),
(152, 'Elaborar reportes que reflejen el cumplimiento de las tareas programadas para el proceso electoral.', 1),
(153, 'Realizar la inducción del personal operativo para las actividades previas del ensamblaje de material electoral (Coordinadores de turno, Coordinadores de linea, Asistentes de produccion y Auxiliares de produccion) para el proceso electoral.', 1),
(154, 'Elaborar las estadisticas y control de tiempos de las tareas ejecutadas para el proceso electoral.', 1),
(155, 'Informar diariamente al Asistente Administrativo 1, sobre las actividades encomendadas para el proceso electoral.', 1),
(156, 'Brindar asesoría en Gestión Administrativa, logística y administración de recursos dentro del marco de la normatividad vigente y a la Ley de Modernización del Estado.', 1),
(157, 'Seguimiento y monitoreo de los pedidos y/o requerimientos de bienes y/o servicios del proceso electoral.', 1),
(158, 'Gestionar la coordinación con las áreas usuarias en los requerimientos de bienes y servicios del proceso electoral.', 1),
(159, 'Coordinar con el personal de la Subgerencia de Logística para la atención oportuna de los requerimientos para la adquisición de los bienes y prestaciones de servicios del proceso electoral.', 1),
(160, 'Gestionar y asegurar la formulación de documentos de gestión y normativos internos de la Gerencia de Gestión Electoral.', 1),
(161, 'Elaborar, registrar y realizar seguimiento de los documentos recibidos y/o emitidos y otros que sean requeridos.', 1),
(162, 'Coordiné con las áreas usuarias para la emisión oportuna de las conformidades de bienes y servicios del proceso electoral.', 1),
(163, 'Supervisé  y coordiné el seguimiento para la atención de prórrogas de contratos del personal por Locación de Servicios de la GGE para el proceso electoral.', 1),
(164, 'Mantuve informada a la GGE, o al personal que ésta designe, sobre el desarrollo y avance de sus actividades.', 1),
(165, 'Coordiné con la Gerencia la designación de los miembros que conformarán los Comités de selección para la adquisición de los bienes y servicios del proceso electoral.', 1),
(166, 'Realizar las correcciones ortográficas de los siguientes materiales: Base de datos, Cédulas de Sufragio, Carteles, Formatos Electorales.', 1),
(167, 'Realizar reportes e informé diariamente el avance de corrección de cédulas, carteles y formatos electorales.', 1),
(168, 'Elaborar el informe final sobre las actividades realizadas, resultados, logros y dificultades durante el proceso.', 1),
(169, 'Mantener informado permanentemente sobre mis actividades a cargo.', 1),
(170, 'Gestionar y asegurar el abastecimiento,  control de calidad y ensamblaje  del material electoral, para su despliegue  en cada fase del proceso, así como su repliegue y clasificación final.', 1),
(171, 'Organizar y Supervisar  los equipos de trabajo para la sistematización y automatización de los procesos de la Gerencia de Gestión Electoral, así como el desarrollo  de proyectos en el marco de su competencia.', 1),
(172, 'Coordinar, Supervisar  y monitorear  el despliegue y repliegue de los equipos informáticos y material electoral que se realizaron en cada fase del proceso. Verificar el cumplimiento de los lineamientos y normatividad durante  su ejecución.', 1),
(173, 'Gestionar y Coordinar la capacitación e inducción para el personal de la gerencia que viajó en comisión de servicios.', 1),
(174, 'Implementar las recomendaciones derivadas  de las acciones y actividades de control ejecutadas en la entidad, según las disposiciones que la Gerencia impartió para el efecto.', 1),
(175, 'Participar y contribuí en la confección del listado de materiales que componen las ánforas electorales (Receta).', 1),
(176, 'Programar las actividades de las diferentes áreas operativas de la SGOE y elaboré el Cronograma general de tareas, definiendo su planificación en calendario, la cantidad de personal requerido y la ejecución oportuna del despliegue y repliegue del material elec', 1),
(177, 'Revisar y examinar el presupuesto del proceso electoral, a fin de verificar la presencia de los requerimientos logísticos de bienes y servicios necesarios para el cumplimiento de las actividades y tareas programadas.', 1),
(178, 'Acopiar y consolidar los Términos de Referencia y Especificaciones Técnicas elaborados por las diferentes áreas operativas de la SGOE, para su revisión y validación con el techo presupuestal aprobado para el proceso electoral.', 1),
(180, 'Supervisar, controlar y registrar el cumplimiento de la programación de actividades y tareas de impresiones, almacén, ensamblaje, base de datos, compaginación de hologramas, despacho y despliegue y repliegue de material electoral, en concordancia con el Cronograma del proceso.\n6. Controlar y verificar la ejecución de los procesos y procedimientos e', 1),
(181, 'Difundir, capacitar y promover el desarrollo y ejecución del proceso electoral bajo un marco de calidad y mejoramiento continuo, en coordinación con los responsables de cada área operativa de la SGOE.', 1),
(182, 'Brindar apoyo y asesoría a las diferentes áreas operativas, a fin de instruir y establecí alternativas de solución, en el desarrollo de actividades o tareas que se compliquen por dificultades logísticas de bienes, servicios o disponibilidad de mano de obra.', 1),
(183, 'Reportar diariamente a la Sub Gerencia de Operaciones Electorales de la GGE los avances de las tareas encomendadas.', 1),
(184, 'Brindar primeros auxilios en casos de accidentes o problemas de salud que presentó el personal de la Gerencia de Gestión Electoral.', 1),
(185, 'Indicar y alertar sobre situaciones de riesgos en los locales y ambientes de trabajo de la Gerencia de Gestión Electoral.', 1),
(186, 'Apoyar en la capacitación del personal que conforman las brigadas de emergencia en la Gerencia de Gestión Electoral.', 1),
(187, 'Supervisar y controlar  el uso de implementos de seguridad personal en la Gerencia de Gestión Electoral.', 1),
(188, 'Establecer, señalicé e instruí sobre las zonas de seguridad de los locales de la GGE.', 1),
(189, 'Coordinar con el Área de Seguridad de ONPE, las charlas al personal y la elaboración de instructivos de seguridad, para las ECE 2020.', 1),
(190, 'Elaborar y mantuve un registro de descansos médicos requeridos por locadores de servicios e informé a la Gerencia.', 1),
(191, 'Llevar un registro general de los casos atendidos e informé periódicamente a la Gerencia.', 1),
(192, 'Informar permanentemente a la Gerencia sobre situaciones de riesgos que se presentaron y propuse las acciones preventivas y correctivas para las ECE 2020.', 1),
(193, 'Elaborar un informe final a la Gerencia sobre actividades realizadas durante el proceso, logros, dificultades y resultados del proceso para las ECE 2020.', 1),
(194, 'Coordinar las actividades de impresión con el Coordinador de Diseño e Impresión de Material Electoral.', 1),
(195, 'Realizar el fotomontaje y pre prensa de los materiales electorales que se imprimirán para capacitación, tales como: formatos genéricos para capacitación y sufragio, formatos con data variable para sufragio, cédula de capacitación y sufragio, carteles de opciones para capacitación y sufragio, cartillas y afiches.', 1),
(196, 'Operar las máquinas offset a color sistema al alcohol.', 1),
(197, 'Operar los equipos de post prensa para realizar el acabado final del material electoral.', 1),
(198, 'Apoyar en la impresión del material electoral en las Prensas Digitales.', 1),
(199, 'Apoyar en el control de calidad de la impresión del material electoral para talleres de capacitación, capacitación permanente, jornadas de capacitación, simulacro de computo, sufragio y reserva.', 1),
(200, 'Apoyar en el Ensamblaje de Equipos para talleres de capacitación, capacitación permanente, jornadas de capacitación, simulacro de computo y para el sufragio.', 1),
(201, 'De ser necesario, acompañar el material electoral y equipos electorales de sufragio y reserva durante el despliegue desde el local de la GGE hasta su entrega en las ODPE y/o ORC.', 1),
(202, 'De ser necesario, acompañar la documentación electoral, material electoral y equipos electorales durante el repliegue desde las ODPE y/o ORC hasta el local de la GGE.', 1),
(203, 'Apoyar en actividades en general relativas a servicios de impresión.', 1),
(204, 'Apoyar en el Ensamblaje de Equipos de Capacitación y Sufragio VE, de Material de Capacitación VE y Convencional y Material de Simulacro VE y Convencional.', 1),
(205, 'Informar permanentemente al Coordinador de Diseño e Impresión de Material Electoral sobre las incidencias que puedan afectar el proceso de Impresión del Material Electoral.', 1),
(206, 'Realizar labores de Digitalización de Documentos Electorales.', 1),
(209, 'Realizar labores de reparación del mobiliario y carpintería en general para la implementación de la planta de ensamblaje de materiales electorales para las ECE 2020.', 1),
(210, 'Realizar labores de acondicionamiento de muebles y ambientes de oficina para las ECE 2020.', 1),
(211, 'Realizar labores de acondicionamiento de electricidad para la planta de ensamblaje de materiales electorales para las ECE 2020.', 1),
(212, 'Realizar labores de acondicionamiento de servicios higiénicos y de gasfitería para las ECE 2020.', 1),
(213, 'Realizar labores de acondicionamiento y habilitación del local para las ECE 2020.', 1),
(214, 'Realizar labores preventivas y correctivas de mantenimiento industrial para las ECE 2020.', 1),
(215, 'Efectuar el pintado, señalización de áreas de seguridad de acuerdo a las indicaciones del coordinador.', 1),
(216, 'Reportar directamente a la Gerencia todo lo relacionado con sus actividades.', 1),
(217, 'Controlar y verificar la ejecución de los procesos y procedimientos en cada una de las tareas operativas del proceso electoral.', 1),
(218, 'Apoyé en las actividades del Proceso de Producción de Material Electoral, como: el control de las impresiones de formatos y materiales electorales de capacitación, simulacro, sufragio y reserva.', 1),
(219, 'Apoyé en la recopilación de los materiales electorales producidos en las imprentas.', 1),
(220, 'Apoyé en todas las actividades operativas relacionadas al proceso de impresiones ya sea realizado por la entidad o realizada por un tercero.', 1),
(221, 'Apoyé en las actividades  operativas de los demás procesos de la GGE, como Gestión de Material Electoral, Ensamblaje  de Material de electoral, Despliegue y Repliegue.', 1),
(222, 'Apoyé en las actividades de Digitalización de Documentos Electorales y Archivo Electoral en cualquiera de sus etapas.', 1),
(223, 'Otras actividades que me asignó la Gerencia de Gestión Electoral.', 1),
(224, 'Desarrollé en forma eficiente y de acuerdo a los procedimientos prestablecidos, cada una de las tareas para el ensamblaje de materiales electorales, de acuerdo a las indicaciones de su Coordinador de Línea.', 1),
(225, 'Apoyé en el acondicionamiento, ordenamiento y traslado de los insumos electorales.', 1),
(226, 'Apoyé en el acondicionamiento, digitalización y ordenamiento de los documentos electorales.', 1),
(227, 'Apoyé en el control de calidad de la impresión de los materiales electorales y desplazarse hacia  las sedes, lugares y horarios programados por el área de Diseño e Impresiones.', 1),
(228, 'Apoyé en el ensamblaje de materiales electorales.', 1),
(229, 'Apoyé en el inventario de materiales electorales.', 1),
(230, 'Acompañe en caso necesario, el material electoral durante el despliegue desde la GGE hacia las ODPE y/o ORC para las ECE 2020.', 1),
(231, 'Acompañe en caso necesario, los documentos electorales e implementos electorales, durante el repliegue desde las sedes de las ODPE y/o ORC hacia la GGE para las ECE 2020.', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gerencia`
--

CREATE TABLE `gerencia` (
  `id_gerencia` int(11) NOT NULL,
  `gerencia` varchar(250) NOT NULL,
  `abreviatura` varchar(10) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `gerencia`
--

INSERT INTO `gerencia` (`id_gerencia`, `gerencia`, `abreviatura`, `estado`) VALUES
(1, 'MICASAGROUP', 'MGP', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `id_horario` int(11) NOT NULL,
  `turno` varchar(100) NOT NULL,
  `hora` time NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `horario`
--

INSERT INTO `horario` (`id_horario`, `turno`, `hora`, `estado`) VALUES
(1, 'MAÑANA', '07:00:00', 2),
(2, 'MAÑANA', '08:00:00', 1),
(3, 'TARDE', '14:00:00', 1),
(4, 'TARDE', '15:00:00', 2),
(5, 'NOCHE', '23:00:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulo`
--

CREATE TABLE `modulo` (
  `id_modulo` int(11) NOT NULL,
  `modulo` varchar(200) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `icono` varchar(100) NOT NULL,
  `url` varchar(200) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `modulo`
--

INSERT INTO `modulo` (`id_modulo`, `modulo`, `descripcion`, `icono`, `url`, `estado`) VALUES
(1, 'Inicio', 'Dashboard del Sistema de Boletas', 'home', 'dashboard', 1),
(2, 'Cargos', 'Gestion de Cargos', 'settings', 'cargo', 0),
(3, 'Registrar Colaboradores', 'Gestion de Colaboradores', 'assignment-check', 'colaborador', 0),
(4, 'Registro Control de Acceso', 'Registro de Personal para el ingreso al Local', 'folder-person', 'personal', 1),
(5, 'Perfiles y Usuarios', 'Permite la asignacion de modulos', 'account', 'usuario', 1),
(13, 'Mantenimiento', 'Gestion de productos', 'shape', 'producto', 1),
(16, 'Ingresos', 'Gestion de compras  y  creacion de proveedores ', 'shopping-cart', 'compra', 1),
(18, 'Requerimiento', 'Requerimiento de materiales diferentes areas ', 'file-text', 'requerimiento', 1),
(19, 'Salida', 'Modulo Gestion de Salidas', 'redo', 'salida', 1),
(20, 'Control de Calidad', 'Modulo para control de calidad', 'search', 'ccalidad', 1),
(21, 'Control de Requerimiento', 'Modulo para la verificacion y confirmacion de los requerimientos / diferentes areas', 'search-replace', 'crequerimiento', 1),
(22, 'Reportes', 'formulario de consultas de reportes', 'desktop-mac', 'reportes', 1),
(23, 'Rotulo de Identificacion', 'Generar rotulo de identificacion de pallet', 'collection-pdf', 'rotulo', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido_cargo`
--

CREATE TABLE `pedido_cargo` (
  `id_pedidocargo` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  `id_cargo` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `id_perfil` int(11) NOT NULL,
  `perfil` varchar(100) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `user_create` int(11) NOT NULL,
  `date_create` datetime NOT NULL DEFAULT current_timestamp(),
  `user_update` int(11) NOT NULL,
  `date_update` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`id_perfil`, `perfil`, `descripcion`, `user_create`, `date_create`, `user_update`, `date_update`, `estado`) VALUES
(1, 'ADMIN SYSTEM', 'SUPER ADMIN DEL SISTEMA', 1, '2020-09-24 01:24:47', 1, '2020-12-02 23:32:34', 1),
(2, 'ADMINISTRADOR', 'ADMINISTRADOR DEL SISTEMA', 1, '2020-10-30 14:15:11', 0, '2020-12-02 20:01:00', 1),
(3, 'SEGURIDAD', 'ENCARGADO DE REALIZAR EL CONTROL DE ACCESO', 1, '2020-11-23 14:23:33', 0, '2022-02-28 11:19:21', 0),
(4, 'SEGUIMIENTO', 'PERSONAL', 1, '2020-12-02 19:23:21', 0, '2022-02-28 11:19:18', 0),
(5, 'PRODUCCION', 'PRODUCCION', 1, '2021-03-22 13:08:01', 0, '2022-02-28 11:19:05', 0),
(6, 'CONTROL PRODUCCION', 'CONTROL PRODUCCION', 1, '2021-05-05 12:10:59', 0, '2022-02-28 11:19:10', 0),
(8, 'REQUERIMIENTOS', 'REGISTRO DE REQUERIMIENTOS DIFERENTES AREAS', 12, '2022-01-26 16:34:07', 0, '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil_modulo`
--

CREATE TABLE `perfil_modulo` (
  `id_perfilmodulo` int(11) NOT NULL,
  `id_perfil` int(11) NOT NULL,
  `id_modulo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `perfil_modulo`
--

INSERT INTO `perfil_modulo` (`id_perfilmodulo`, `id_perfil`, `id_modulo`) VALUES
(253, 1, 1),
(257, 1, 4),
(254, 1, 5),
(260, 1, 13),
(263, 1, 16),
(265, 1, 18),
(274, 1, 19),
(275, 1, 20),
(276, 1, 21),
(277, 1, 22),
(278, 1, 23),
(185, 2, 1),
(187, 2, 4),
(186, 2, 5),
(267, 6, 1),
(268, 6, 18),
(271, 8, 1),
(272, 8, 13),
(273, 8, 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `id_personal` int(11) NOT NULL,
  `dni` int(8) UNSIGNED ZEROFILL DEFAULT NULL,
  `nombre` varchar(250) NOT NULL,
  `estado` int(11) DEFAULT NULL,
  `id_cargo` int(11) NOT NULL,
  `id_gerencia` int(11) NOT NULL,
  `id_proceso` int(11) NOT NULL,
  `id_responsable` int(11) NOT NULL,
  `id_horario` int(11) NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `user_create` int(11) NOT NULL,
  `date_create` datetime NOT NULL DEFAULT current_timestamp(),
  `user_update` int(11) NOT NULL,
  `date_update` datetime NOT NULL,
  `FechaIngreso` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`id_personal`, `dni`, `nombre`, `estado`, `id_cargo`, `id_gerencia`, `id_proceso`, `id_responsable`, `id_horario`, `imagen`, `user_create`, `date_create`, `user_update`, `date_update`, `FechaIngreso`) VALUES
(966, 46376778, 'MONTALVO BARBOZA SMITH JESUS', 1, 25, 1, 0, 1, 2, '', 3, '2021-03-02 08:11:15', 12, '2021-05-03 08:03:33', '2021-03-02'),
(1428, 43040045, 'GONZALES ', 0, 87, 1, 0, 1, 2, '12', 2021, '2021-11-28 23:46:31', 0, '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personalsalida`
--

CREATE TABLE `personalsalida` (
  `IdPersonal` int(11) NOT NULL,
  `Nombres` varchar(100) NOT NULL,
  `Dni` int(11) NOT NULL,
  `IdCentroConsumo` int(11) NOT NULL,
  `id_cargo` int(11) NOT NULL,
  `UsuarioCrea` int(11) NOT NULL,
  `FechaCrea` datetime NOT NULL DEFAULT current_timestamp(),
  `Estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `personalsalida`
--

INSERT INTO `personalsalida` (`IdPersonal`, `Nombres`, `Dni`, `IdCentroConsumo`, `id_cargo`, `UsuarioCrea`, `FechaCrea`, `Estado`) VALUES
(1, 'Jose Luisss', 654633, 1, 87, 12, '2022-02-04 15:15:39', 0),
(5, 'Freddy Gomez', 546546, 2, 91, 12, '2022-02-04 15:29:55', 0),
(7, 'maria', 64, 1, 86, 12, '2022-02-21 09:34:09', 0),
(8, 'HERNAN HUAMANCHUMO CAPUÑAY', 45061598, 1, 93, 12, '2022-03-08 11:15:51', 1),
(9, 'NEDY AVELDAÑO ABC', 7496325, 3, 90, 12, '2022-03-08 11:16:11', 1),
(30, 'NEDY AVENDAÑO', 45078932, 3, 91, 21, '2022-03-14 15:38:56', 1),
(31, 'JUAN RAMIREZ', 40698567, 3, 90, 21, '2022-03-14 15:39:18', 1),
(32, 'NORA FLORES', 1, 3, 91, 21, '2022-03-22 12:13:22', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proceso`
--

CREATE TABLE `proceso` (
  `IdProceso` int(11) NOT NULL,
  `Descripcion` varchar(100) NOT NULL,
  `Abreviatura` varchar(100) DEFAULT '0',
  `FechaInicio` date DEFAULT NULL,
  `FechaFin` date DEFAULT NULL,
  `UsuarioCrea` int(11) NOT NULL,
  `Estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proceso`
--

INSERT INTO `proceso` (`IdProceso`, `Descripcion`, `Abreviatura`, `FechaInicio`, `FechaFin`, `UsuarioCrea`, `Estado`) VALUES
(1, 'ELECCIONES INTERNAS 2022', 'EI2022', '2022-01-01', '2022-12-31', 12, 1),
(3, 'procesodsdsds', '0', '2022-02-09', '2022-02-09', 12, 0),
(4, 'proceso 2', '0', '2022-02-12', '2022-02-10', 12, 0),
(5, 'abc', '0', '2022-03-08', '2022-03-14', 21, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `IdProducto` int(11) NOT NULL,
  `Descripcion` varchar(100) NOT NULL,
  `CodProducto` varchar(100) DEFAULT NULL,
  `IdClase` int(11) NOT NULL,
  `IdUma` int(11) NOT NULL,
  `UsuarioCrea` int(11) NOT NULL,
  `FechaCrea` datetime NOT NULL DEFAULT current_timestamp(),
  `Estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`IdProducto`, `Descripcion`, `CodProducto`, `IdClase`, `IdUma`, `UsuarioCrea`, `FechaCrea`, `Estado`) VALUES
(1, 'ANFORAS DE RESERVA', '0001', 121, 3, 12, '2022-03-21 10:38:21', 1),
(2, 'ANFORAS DE MESA NO INSTALADA', '0002', 121, 3, 12, '2022-03-21 10:38:21', 1),
(3, 'DOCUMENTOS ELECTORALES REP.', '0003', 121, 3, 12, '2022-03-21 10:38:21', 1),
(4, 'HOLOGRAMAS REP', '0004', 121, 3, 12, '2022-03-21 10:38:21', 1),
(5, 'ANFORAS PLEGADAS REP.', '0005', 122, 3, 12, '2022-03-21 10:38:21', 1),
(6, 'CABINAS DE VOTACION REP', '0006', 122, 3, 12, '2022-03-21 10:38:21', 1),
(7, 'CAJAS PLEGADAS', '0007', 122, 3, 12, '2022-03-21 10:38:21', 1),
(8, 'UTILES ELECTORALES', '0008', 122, 3, 12, '2022-03-21 10:38:21', 1),
(9, 'MATERIAL DE CAPACITACION', '0009', 122, 3, 12, '2022-03-21 10:38:21', 1),
(10, 'RESTOS ELECTORALES', '0010', 123, 3, 12, '2022-03-21 10:38:22', 1),
(11, 'PAQUETE DE COORDINADOR', '0011', 123, 3, 12, '2022-03-21 10:38:22', 1),
(12, 'LAPTOP SEA REP', '0012', 111, 3, 12, '2022-03-21 10:37:26', 1),
(13, 'IMPRESORA A4 SEA REP', '0013', 111, 3, 12, '2022-03-21 10:37:26', 1),
(14, 'INVERSOR', '0014', 111, 3, 12, '2022-03-21 10:37:26', 1),
(15, 'BGAN', '0015', 111, 3, 12, '2022-03-21 10:37:26', 1),
(16, 'LECTORA DE CODIGO DE BARRAS', '0016', 111, 3, 12, '2022-03-21 10:37:26', 1),
(17, 'MODULO DE ORIENTACION', '0017', 111, 3, 12, '2022-03-21 10:37:27', 1),
(18, 'TABLET', '0018', 111, 3, 12, '2022-03-21 10:37:27', 1),
(19, 'CVE', '0019', 111, 3, 12, '2022-03-21 10:37:26', 1),
(20, 'ECI', '0020', 111, 3, 12, '2022-03-21 10:37:26', 1),
(21, 'TOKEN USB', '0021', 112, 3, 12, '2022-03-21 10:37:26', 1),
(22, 'TARJETAS INTELIGENTES', '0022', 112, 3, 12, '2022-03-21 10:37:26', 1),
(23, 'AUDIFONOS Y LAPIZ OPTICO', '0023', 112, 3, 12, '2022-03-21 10:37:26', 1),
(24, 'TINTAS', '0024', 113, 3, 12, '2022-03-21 10:37:27', 1),
(25, 'PAPEL TERMICO', '0025', 113, 3, 12, '2022-03-21 10:37:27', 1),
(26, 'MODEM', '0026', 113, 3, 12, '2022-03-21 10:37:27', 1),
(27, 'CINTA DE EMBALAJE 1 X 36 YRD ', '0027', 11, 17, 12, '2022-03-21 10:52:23', 1),
(28, 'CINTA SCOTCH 1/2\"X36 yds', '0028', 11, 17, 12, '2022-03-21 10:52:23', 1),
(29, 'CINTA SCOTCH 1\"X72 yds', '0029', 11, 17, 12, '2022-03-21 10:52:23', 1),
(30, 'ARCHIVADOR DE PALANCA MEDIO OFICIO', '0030', 11, 13, 12, '2022-03-21 10:52:21', 1),
(31, 'ARCHIVADOR DE PALANCA A4', '0031', 11, 13, 12, '2022-03-21 10:52:21', 1),
(32, 'ARCHIVADOR PIONNER A4', '0032', 11, 13, 12, '2022-03-21 10:52:22', 1),
(33, 'COLECTOR REVISTERO ( LOMO ANCHO )', '0033', 11, 13, 12, '2022-03-21 10:52:23', 1),
(34, 'COLECTOR REVISTERO ( LOMO DELGADO )', '0034', 11, 13, 12, '2022-03-21 10:52:23', 1),
(35, 'BORRADOR DE COLOR', '0035', 11, 13, 12, '2022-03-21 10:52:22', 1),
(36, 'BORRADOR BLANCO', '0036', 11, 13, 12, '2022-03-21 10:52:22', 1),
(37, 'DISPENSADOR DE MANO P/ CINTA DE EMBALAJE ', '0037', 11, 13, 12, '2022-03-21 10:52:24', 1),
(38, 'DISPENSADOR DE CINTA DE GRANDE 36/72 yds', '0038', 11, 13, 12, '2022-03-21 10:52:24', 1),
(39, 'DISPENSADOR DE MESA P/ CINTA DE EMBALAJE', '0039', 11, 13, 12, '2022-03-21 10:52:24', 1),
(40, 'CLIPS DE METAL MEDIANO', '0040', 11, 4, 12, '2022-03-21 10:52:23', 1),
(41, 'CLIPS DE METAL CHICO x 100', '0041', 11, 4, 12, '2022-03-21 10:52:23', 1),
(42, 'CLIPS DE COLOR CHICO x 100', '0042', 11, 4, 12, '2022-03-21 10:52:23', 1),
(43, 'CLIPS DE MARIPOSA CHICO x 50', '0043', 11, 4, 12, '2022-03-21 10:52:23', 1),
(44, 'CLIPS DE MARIPOSA GRANDE x 12 ', '0044', 11, 4, 12, '2022-03-21 10:52:23', 1),
(45, 'CUADERNO RAYADO ESPIRAL A4', '0045', 11, 13, 12, '2022-03-21 10:52:24', 1),
(46, 'CUADERNO CUADRICULADO ESPIRAL A4 ', '0046', 11, 13, 12, '2022-03-21 10:52:23', 1),
(47, 'ESPONJEROS', '0047', 11, 13, 12, '2022-03-21 10:52:24', 1),
(48, 'CUBIERTA MICA P.ANILLADO A4', '0048', 11, 13, 12, '2022-03-21 10:52:24', 1),
(49, 'FASTENER GUSANILLO X 25', '0049', 11, 4, 12, '2022-03-21 10:52:24', 1),
(50, 'FASTENER DE METAL x 50', '0050', 11, 4, 12, '2022-03-21 10:52:24', 1),
(51, 'LAMINA P/ENMICADO 22X6.5', '0051', 11, 13, 12, '2022-03-21 10:52:25', 1),
(52, 'LAMINA P/ENMICADO 22X13.5', '0052', 11, 13, 12, '2022-03-21 10:52:25', 1),
(53, 'MICA PORTA PAPEL A4', '0053', 11, 13, 12, '2022-03-21 10:52:26', 1),
(54, 'MICA PORTA PAPEL A3 S/PERFORACIONES', '0054', 11, 13, 12, '2022-03-21 10:52:26', 1),
(55, 'MICA PORTA PAPEL A3 C/3 PERFORACIONES', '0055', 11, 13, 12, '2022-03-21 10:52:25', 1),
(56, 'MICA PORTA PAPEL A3 C/4 PERFORACIONES', '0056', 11, 13, 12, '2022-03-21 10:52:25', 1),
(57, 'TAPA DE CARTON P/ ANILLADO', '0057', 11, 13, 12, '2022-03-21 10:52:28', 1),
(58, 'ESPIRAL P/ 20 HOJAS', '0058', 11, 13, 12, '2022-03-21 10:52:24', 1),
(59, 'ESPIRAL P/ 50 HOJAS', '0059', 11, 13, 12, '2022-03-21 10:52:24', 1),
(60, 'ESPIRAL P/ 200 HOJAS', '0060', 11, 13, 12, '2022-03-21 10:52:24', 1),
(61, 'GOMA LIQUIDA', '0061', 11, 13, 12, '2022-03-21 10:52:25', 1),
(62, 'GRAPA 23/15 x 1000', '0062', 11, 4, 12, '2022-03-21 10:52:25', 1),
(63, 'GRAPA 23/6 x 1000', '0063', 11, 4, 12, '2022-03-21 10:52:25', 1),
(64, 'GRAPA 23/10 x 1000', '0064', 11, 4, 12, '2022-03-21 10:52:25', 1),
(65, 'GRAPA 23/8 x 1000', '0065', 11, 4, 12, '2022-03-21 10:52:25', 1),
(66, 'GRAPA 19/8 R13/8 X 5000', '0066', 11, 4, 12, '2022-03-21 10:52:25', 1),
(67, 'GRAPA 26/6 x 5000', '0067', 11, 4, 12, '2022-03-21 10:52:25', 1),
(68, 'LAPIZ 2B', '0068', 11, 13, 12, '2022-03-21 10:52:25', 1),
(69, 'NOTAS AUTOADHESIVAS 653 CHICO', '0069', 11, 11, 12, '2022-03-21 10:52:26', 1),
(70, 'BANDERITAS ADHESIVAS', '0070', 11, 13, 12, '2022-03-21 10:52:22', 1),
(71, 'TABLERO ACRILICO ', '0071', 11, 13, 12, '2022-03-21 10:52:28', 1),
(72, 'TINTA P/TAMPON C/ AZUL', '0072', 11, 13, 12, '2022-03-21 10:52:29', 1),
(73, 'TINTA TAMPON C/ NEGRO', '0073', 11, 13, 12, '2022-03-21 10:52:29', 1),
(74, 'TAMPON ROJO', '0074', 11, 13, 12, '2022-03-21 10:52:28', 1),
(75, 'TINTA NUMERADOR C/ ROJO', '0075', 11, 13, 12, '2022-03-21 10:52:29', 1),
(76, 'TINTA NUMERADOR C/ NEGRO', '0076', 11, 13, 12, '2022-03-21 10:52:28', 1),
(77, 'SELLO TRODAT 4910', '0077', 11, 13, 12, '2022-03-21 10:52:28', 1),
(78, 'SELLO TRODAT 4729 ', '0078', 11, 13, 12, '2022-03-21 10:52:28', 1),
(79, 'SELLO TRODAT 4922 -DIGITADOR ANTARES-', '0079', 11, 13, 12, '2022-03-21 10:52:28', 1),
(80, 'SELLO TRODAT 4912  JEFE DE LINEA ', '0080', 11, 13, 12, '2022-03-21 10:52:28', 1),
(81, 'SELLO TRODAT 4922 ENVIO AL JEFE.', '0081', 11, 13, 12, '2022-03-21 10:52:28', 1),
(82, 'SELLO FECHADOR TRODAT 4810', '0082', 11, 13, 12, '2022-03-21 10:52:28', 1),
(83, 'SELLO DE CANCELADO', '0083', 11, 13, 12, '2022-03-21 10:52:27', 1),
(84, 'SELLO DE MADERA PAG 1 AL 6', '0084', 11, 13, 12, '2022-03-21 10:52:27', 1),
(85, 'SUJETADOR DE SELLO DE MADERA', '0085', 11, 13, 12, '2022-03-21 10:52:28', 1),
(86, 'SELLO METAL Nro45 NUMERADOR AUTOMATICO', '0086', 11, 13, 12, '2022-03-21 10:52:28', 1),
(87, 'SELLO TRODAT FECHADOR MANUAL', '0087', 11, 13, 12, '2022-03-21 10:52:28', 1),
(88, 'ALMOHADILLA P-SELLO TRODAT 5440', '0088', 11, 13, 12, '2022-03-21 10:52:21', 1),
(89, 'ALMOHADILLA P-SELLO TRODAT 4910', '0089', 11, 13, 12, '2022-03-21 10:52:21', 1),
(90, 'ALMOHADILLA P-SELLO TRODAT 4911 ', '0090', 11, 13, 12, '2022-03-21 10:52:21', 1),
(91, 'ALMOHADILLA P-SELLO TRODAT 4912', '0091', 11, 13, 12, '2022-03-21 10:52:21', 1),
(92, 'ALMOHADILLA P-SELLO TRODAT 4915', '0092', 11, 13, 12, '2022-03-21 10:52:21', 1),
(93, 'ALMOHADILLA P-SELLO TRODAT 4922', '0093', 11, 13, 12, '2022-03-21 10:52:21', 1),
(94, 'ALMOHADILLA P-SELLO TRODAT 4923', '0094', 11, 13, 12, '2022-03-21 10:52:21', 1),
(95, 'ALMOHADILLA P-SELLO TRODAT 4926', '0095', 11, 13, 12, '2022-03-21 10:52:21', 1),
(96, 'ALMOHADILLA P-SELLO AUTO ENTINTADO 10x26mm', '0096', 11, 13, 12, '2022-03-21 10:52:21', 1),
(97, 'ALMOHADILLA P-SELLO AUTO ENTINTADO 20x20mm', '0097', 11, 13, 12, '2022-03-21 10:52:21', 1),
(98, 'ALMOHADILLA P-SELLO AUTO ENTINTADO 30x30mm', '0098', 11, 13, 12, '2022-03-21 10:52:21', 1),
(99, 'ALMOHADILLA P-SELLO AUTO ENTINTADO 49x28mm', '0099', 11, 13, 12, '2022-03-21 10:52:21', 1),
(100, 'ALMOHADILLA P-SELLO AUTO ENTINTADO 75x25mm', '0100', 11, 13, 12, '2022-03-21 10:52:21', 1),
(101, 'ALMOHADILLA P-SELLO AUTO ENTINTADO 75x38mm', '0101', 11, 13, 12, '2022-03-21 10:52:21', 1),
(102, 'REGLA DE 30 CM.', '0102', 11, 13, 12, '2022-03-21 10:52:27', 1),
(103, 'SEPARADOR INDEX DE COLORES', '0103', 11, 13, 12, '2022-03-21 10:52:28', 1),
(104, 'CAJA D/ PLASTICO CON RUEDAS', '0104', 11, 13, 12, '2022-03-21 10:52:22', 1),
(105, 'PIZARRA ACRILICA 1.20 X 2M', '0105', 11, 13, 12, '2022-03-21 10:52:26', 1),
(106, 'PIZARRA ACRILICA 1.80 X 2M', '0106', 11, 13, 12, '2022-03-21 10:52:26', 1),
(107, 'PASTA PARA CUADERNO ANILLADO', '0107', 11, 13, 12, '2022-03-21 10:52:26', 1),
(108, 'VINIFAN T-OFICIO', '0108', 11, 13, 12, '2022-03-21 10:52:29', 1),
(109, 'VINIFAN T-A4', '0109', 11, 13, 12, '2022-03-21 10:52:29', 1),
(110, 'HIGROMETRO', '0110', 41, 13, 12, '2022-03-21 10:38:34', 1),
(111, 'GONIOMETRO IMPORTADO', '0111', 11, 13, 12, '2022-03-21 10:52:25', 1),
(112, 'RELOJ DE PARED', '0112', 11, 13, 12, '2022-03-21 10:52:27', 1),
(113, 'PERFORADOR DE HOJAS (METAL)', '0113', 11, 13, 12, '2022-03-21 10:52:26', 1),
(114, 'PERFORADOR INDUSTRIAL 3 ESPIGAS P/ 150 HOJAS', '0114', 11, 13, 12, '2022-03-21 10:52:26', 1),
(115, 'PERFORADOR CARL Nro85 x50 HOJAS', '0115', 11, 13, 12, '2022-03-21 10:52:26', 1),
(116, 'LIGA Nro18 ', '0116', 11, 4, 12, '2022-03-21 10:52:25', 1),
(117, 'MOTA P/PIZARRA ACRILICA', '0117', 11, 13, 12, '2022-03-21 10:52:26', 1),
(118, 'PORTA TRIPTICOS ACRILICO DE 12 X 12', '0118', 11, 13, 12, '2022-03-21 10:52:27', 1),
(119, 'CALCULADORA 12 DIGITOS OFICINA', '0119', 11, 13, 12, '2022-03-21 10:52:22', 1),
(120, 'CALCULADORA 8 DIGITOS', '0120', 11, 13, 12, '2022-03-21 10:52:22', 1),
(121, 'CALCULADORA (CHICO)', '0121', 11, 13, 12, '2022-03-21 10:52:22', 1),
(122, 'GUILLOTINA CORTA PAPEL', '0122', 11, 13, 12, '2022-03-21 10:52:25', 1),
(123, 'CUTER', '0123', 11, 13, 12, '2022-03-21 10:52:24', 1),
(124, 'MINI ENGRADOR DE METAL', '0124', 11, 13, 12, '2022-03-21 10:52:26', 1),
(125, 'ENGRAPADOR INDUSTRIAL 220 HOJAS', '0125', 11, 13, 12, '2022-03-21 10:52:24', 1),
(126, 'ENGRAPADOR INDUSTRIAL 240 HOJAS', '0126', 11, 13, 12, '2022-03-21 10:52:24', 1),
(127, 'ENGRAPADOR INDUSTRIAL 140 HOJAS', '0127', 11, 13, 12, '2022-03-21 10:52:24', 1),
(128, 'ENGRAPADOR TIPO ALICATE DE METAL', '0128', 11, 13, 12, '2022-03-21 10:52:24', 1),
(129, 'SACAGRAPAS', '0129', 11, 13, 12, '2022-03-21 10:52:27', 1),
(130, 'GLICERINA USP X 1L', '0130', 11, 8, 12, '2022-03-21 10:52:25', 1),
(131, 'GLICERINA LIQUIDA x4L', '0131', 11, 5, 12, '2022-03-21 10:52:25', 1),
(132, 'CABLE USB DE DATOS', '0132', 12, 13, 12, '2022-03-21 10:52:19', 1),
(133, 'EXTENSION DE CABLE USB HEMBRA 1.5M', '0133', 12, 13, 12, '2022-03-21 10:52:20', 1),
(134, 'CABLE PODER TRIFASICO', '0134', 12, 13, 12, '2022-03-21 10:52:19', 1),
(135, 'USB 64GB', '0135', 12, 13, 12, '2022-03-21 10:52:21', 1),
(136, 'USB 128GB', '0136', 12, 13, 12, '2022-03-21 10:52:21', 1),
(137, 'CD - RW', '0137', 12, 13, 12, '2022-03-21 10:52:20', 1),
(138, 'DVD - RW 4.7 GB', '0138', 12, 13, 12, '2022-03-21 10:52:20', 1),
(139, 'PROTECTOR DE PANTALLA', '0139', 12, 13, 12, '2022-03-21 10:52:20', 1),
(140, 'EXTENSION DE CABLE USB HEMBRA 3M', '0140', 12, 13, 12, '2022-03-21 10:52:20', 1),
(141, 'PAPEL BOND A3 75 GR', '0141', 13, 16, 12, '2022-03-21 10:52:17', 1),
(142, 'PAPEL KRAFT', '0142', 13, 15, 12, '2022-03-21 10:52:17', 1),
(143, 'PAPEL BOND A3 ALISADO', '0143', 13, 16, 12, '2022-03-21 10:52:17', 1),
(144, 'PAPEL CUADRICULADO P/CUADERNO ANILLADO', '0144', 13, 13, 12, '2022-03-21 10:52:17', 1),
(145, 'PAPEL CONTINUO P/IMPRESORA MATRICIAL', '0145', 13, 10, 12, '2022-03-21 10:52:17', 1),
(146, 'TIRADOR CIRCULAR ACERO INOXIDABLE', '0146', 47, 18, 12, '2022-03-21 10:38:46', 1),
(147, 'PAPEL BOND 90 GR/M2 MEDIDAS 61 CM X 86 CM', '0147', 14, 16, 12, '2022-03-21 10:52:18', 1),
(148, 'CHALECO ONPE TALLA S C/AZUL (VELCRO)', '0148', 31, 13, 12, '2022-03-21 10:37:31', 1),
(149, 'CHALECO C/LOGO ONPE TALLA L C/AZUL', '0149', 31, 13, 12, '2022-03-21 10:37:31', 1),
(150, 'CHALECO C/LOGO ONPE TALLA XL C/AZUL', '0150', 31, 13, 12, '2022-03-21 10:37:31', 1),
(151, 'CHALECO C/LOGO ONPE TALLA XXL C/AZUL', '0151', 31, 13, 12, '2022-03-21 10:37:31', 1),
(152, 'POLO ONPE MANGA CORTA TALLA S C/BLANCO', '0152', 31, 13, 12, '2022-03-21 10:37:32', 1),
(153, 'POLO ONPE MANGA CORTA TALLA M C/BLANCO', '0153', 31, 13, 12, '2022-03-21 10:37:32', 1),
(154, 'POLO ONPE MANGA CORTA TALLA L C/BLANCO', '0154', 31, 13, 12, '2022-03-21 10:37:32', 1),
(155, 'POLO ONPE MANGA CORTA TALLA XL C/BLANCO', '0155', 31, 13, 12, '2022-03-21 10:37:32', 1),
(156, 'POLO ONPE MANGA CORTA TALLA XXL C/BLANCO', '0156', 31, 13, 12, '2022-03-21 10:37:32', 1),
(157, 'POLO ONPE MANGA LARGA TALLA XXL C/BLANCO', '0157', 31, 13, 12, '2022-03-21 10:37:32', 1),
(158, 'POLAR ONPE MANGA LARGA TALLA M C/AZUL', '0158', 31, 13, 12, '2022-03-21 10:37:32', 1),
(159, 'POLAR ONPE MANGA LARGA TALLA L C/AZUL', '0159', 31, 13, 12, '2022-03-21 10:37:32', 1),
(160, 'POLAR ONPE MANGA LARGA TALLA XL C/AZUL', '0160', 31, 13, 12, '2022-03-21 10:37:32', 1),
(161, 'POLAR ONPE MANGA LARGA TALLA XXL C/AZUL', '0161', 31, 13, 12, '2022-03-21 10:37:32', 1),
(162, 'GORRO DRIL ONPE C/AZUL', '0162', 31, 13, 12, '2022-03-21 10:37:31', 1),
(163, 'MOCHILA AZUL ONPE C/AZUL', '0163', 31, 13, 12, '2022-03-21 10:37:32', 1),
(164, 'CANGURO BOLSO ONPE C/AZUL', '0164', 31, 13, 12, '2022-03-21 10:37:30', 1),
(165, 'CANGURO MARK STARS C/NEGRO', '0165', 31, 13, 12, '2022-03-21 10:37:30', 1),
(166, 'GUARDAPOLVO TELA COLOR BLANCO M/LARGA', '0166', 31, 13, 12, '2022-03-21 10:37:31', 1),
(167, 'GUARDAPOLVO DE TELA ONPE TALLA S C/BLANCO', '0167', 31, 13, 12, '2022-03-21 10:37:31', 1),
(168, 'DESTRUCTORA DOCUMENTOS', '0168', 41, 18, 12, '2022-03-21 10:38:34', 1),
(169, 'DETECTOR ULTRAVIOLETA', '0169', 41, 18, 12, '2022-03-21 10:38:34', 1),
(170, 'EQUIPO ILUMINACION EMERGENCIA', '0170', 41, 18, 12, '2022-03-21 10:38:34', 1),
(171, 'ESTABILIZADOR', '0171', 41, 18, 12, '2022-03-21 10:38:34', 1),
(172, 'MEGAFONO', '0172', 41, 18, 12, '2022-03-21 10:38:35', 1),
(173, 'GUARDAPOLVO DE TELA ONPE TALLA M C/BLANCO', '0173', 31, 13, 12, '2022-03-21 10:37:31', 1),
(174, 'SURTIDOR AGUA ELECTRICO', '0174', 41, 18, 12, '2022-03-21 10:38:36', 1),
(175, 'GUARDAPOLVO DE TELA ONPE TALLA L C/BLANCO', '0175', 31, 13, 12, '2022-03-21 10:37:31', 1),
(176, 'TELEFONO CISCO (NEGRO)', '0176', 41, 18, 12, '2022-03-21 10:38:36', 1),
(177, 'GUARDAPOLVO DE TELA ONPE TALLA XL C/BLANCO', '0177', 31, 13, 12, '2022-03-21 10:37:31', 1),
(178, 'VENTILADOR ELECTRICO DE MESA O PIE', '0178', 41, 18, 12, '2022-03-21 10:38:36', 1),
(179, 'VENTILADOR ', '0179', 41, 18, 12, '2022-03-21 10:38:36', 1),
(180, 'CAPOTIN IMPERMEABLE TALLA L C/AMARILLO', '0180', 31, 13, 12, '2022-03-21 10:37:30', 1),
(181, 'CAPOTIN IMPERMEABLE TALLA XL C/AMARILLO', '0181', 31, 13, 12, '2022-03-21 10:37:31', 1),
(182, 'SELLADORA BOLSA X 10 CM', '0182', 41, 18, 12, '2022-03-21 10:38:35', 1),
(183, 'SELLADORA BOLSA X 20 CM', '0183', 41, 18, 12, '2022-03-21 10:38:36', 1),
(184, 'SELLADORA BOLSA X 30 CM', '0184', 41, 18, 12, '2022-03-21 10:38:36', 1),
(185, 'CAPOTIN IMPERMEABLE TALLA L C/ANARANJADO', '0185', 31, 13, 12, '2022-03-21 10:37:30', 1),
(186, 'SELLADORA BOLSA X 50 CM', '0186', 41, 18, 12, '2022-03-21 10:38:36', 1),
(187, 'LINTERNAS', '0187', 41, 18, 12, '2022-03-21 10:38:35', 1),
(188, 'LINTERNA LUZ ULTRAVIOLETA', '0188', 41, 18, 12, '2022-03-21 10:38:35', 1),
(189, 'LINTERNA LETECH C/ CARGADOR', '0189', 41, 18, 12, '2022-03-21 10:38:35', 1),
(190, 'LINTERNA LED DE TRAFICO', '0190', 41, 18, 12, '2022-03-21 10:38:35', 1),
(191, 'LINTERNA LED D/ EMERGENCIA', '0191', 41, 18, 12, '2022-03-21 10:38:34', 1),
(192, 'LINTERNA OPALUX', '0192', 41, 18, 12, '2022-03-21 10:38:35', 1),
(193, 'LINTERNA VINCHA LUZ LED', '0193', 41, 18, 12, '2022-03-21 10:38:35', 1),
(194, 'CHALECO REFLECTIVO TALLA M C/ANARANJADO', '0194', 31, 13, 12, '2022-03-21 10:37:31', 1),
(195, 'LINTERNA DE METAL MODELO (CN-L114A-Z)', '0195', 41, 18, 12, '2022-03-21 10:38:34', 1),
(196, 'LINTERNA DE METAL MODELO (CN-L8805A)', '0196', 41, 18, 12, '2022-03-21 10:38:34', 1),
(197, 'CHALECO REFLECTIVO TALLA L C/ANARANJADO', '0197', 31, 13, 12, '2022-03-21 10:37:31', 1),
(198, 'BALANZA GRAMERA 06 KG', '0198', 41, 18, 12, '2022-03-21 10:38:34', 1),
(199, 'BALANZA ELECTRONICA 15KG', '0199', 41, 18, 12, '2022-03-21 10:38:34', 1),
(200, 'CHALECO REFLECTIVO TALLA XL C/ANARANJADO', '0200', 31, 13, 12, '2022-03-21 10:37:31', 1),
(201, 'BALANZA ELECTRONICA 50KG', '0201', 41, 18, 12, '2022-03-21 10:38:34', 1),
(202, 'ARNES DE SEGURIDAD POLIESTER', '0202', 32, 13, 12, '2022-03-21 10:37:28', 1),
(203, 'BALANZA ELECTRONICA 100 KG', '0203', 41, 18, 12, '2022-03-21 10:38:34', 1),
(204, 'BOTA PUNTA DE ACERO ', '0204', 32, 12, 12, '2022-03-21 10:37:28', 1),
(205, 'PABILO', '0205', 47, 13, 12, '2022-03-21 10:38:42', 1),
(206, 'CASCO AZUL', '0206', 32, 13, 12, '2022-03-21 10:37:28', 1),
(207, 'HORNO MICROONDAS ', '0207', 41, 18, 12, '2022-03-21 10:38:34', 1),
(208, 'CASCO BLANCO', '0208', 32, 13, 12, '2022-03-21 10:37:28', 1),
(209, 'RADIO TRANSMISOR RECEPTOR (LINTON)', '0209', 41, 18, 12, '2022-03-21 10:38:35', 1),
(210, 'CASCO ROJO', '0210', 32, 13, 12, '2022-03-21 10:37:28', 1),
(211, 'ACUMULADOR DE ENERGIA (EQUIPO DE UPS)', '0211', 41, 18, 12, '2022-03-21 10:38:33', 1),
(212, 'CASCO VERDE', '0212', 32, 13, 12, '2022-03-21 10:37:28', 1),
(213, 'MICROMETRO', '0213', 41, 18, 12, '2022-03-21 10:38:35', 1),
(214, 'FAJA ERGONOMICA TALLA S', '0214', 32, 13, 12, '2022-03-21 10:37:28', 1),
(215, 'RELOJ ELECTROMECANICO', '0215', 41, 18, 12, '2022-03-21 10:38:35', 1),
(216, 'FAJA ERGONOMICA TALLA L', '0216', 32, 13, 12, '2022-03-21 10:37:28', 1),
(217, 'LUMINARIA P/EXTERIOR LED TIPO CAMPANA 4000K - 100W ', '0217', 41, 18, 12, '2022-03-21 10:38:35', 1),
(218, 'FAJA ERGONOMICA TALLA XL', '0218', 32, 13, 12, '2022-03-21 10:37:28', 1),
(219, 'NEBULIZADOR PARA DESINFECCIÓN - MODELO NEBULO230', '0219', 41, 18, 12, '2022-03-21 10:38:35', 1),
(220, 'FAJA ERGONOMICA TALLA XXL', '0220', 32, 13, 12, '2022-03-21 10:37:29', 1),
(221, 'MOTOFUMIGADORA A MOTOR MARCA HONDA MOD.WJR 4025 SERIE QCA MT65223569', '0221', 41, 18, 12, '2022-03-21 10:38:35', 1),
(222, 'FILTRO P/RESPIRADOR ANTIGAS', '0222', 32, 13, 12, '2022-03-21 10:37:29', 1),
(223, 'MOCHILA PULVERIZADORA MANUAL ', '0223', 41, 18, 12, '2022-03-21 10:38:35', 1),
(224, 'ADAPTADOR PS/2', '0224', 42, 18, 12, '2022-03-21 10:38:28', 1),
(225, 'AUDÍFONO', '0225', 42, 18, 12, '2022-03-21 10:38:28', 1),
(226, 'BASE DE LECTORAS', '0226', 42, 18, 12, '2022-03-21 10:38:28', 1),
(227, 'GUANTES DE NITRILO T-M', '0227', 32, 12, 12, '2022-03-21 10:37:29', 1),
(228, 'ESCANER HP SCANJET 4070 PHOT', '0228', 42, 18, 12, '2022-03-21 10:38:29', 1),
(229, 'IMPRESORA EPSON M105', '0229', 42, 18, 12, '2022-03-21 10:38:29', 1),
(230, 'GUANTES DE NITRILO T-L', '0230', 32, 4, 12, '2022-03-21 10:37:29', 1),
(231, 'EQUIPO MULTIFUNCIONAL COPIADORA IMPRESORA SCANNER Y/O FAX', '0231', 42, 18, 12, '2022-03-21 10:38:29', 1),
(232, 'GUANTES DE NEOPRENO T-M', '0232', 32, 12, 12, '2022-03-21 10:37:29', 1),
(233, 'IMPRESORA A INYECCION DE TINTA HP', '0233', 42, 18, 12, '2022-03-21 10:38:29', 1),
(234, 'GUANTES LATEX DESCARTABLES x 50 PARES. T-M', '0234', 32, 4, 12, '2022-03-21 10:37:29', 1),
(235, 'CAPTURADOR DE IMAGEN SCANNER KODAK', '0235', 42, 18, 12, '2022-03-21 10:38:29', 1),
(236, 'LÁPIZ ÓPTICO', '0236', 42, 18, 12, '2022-03-21 10:38:31', 1),
(237, 'MONITOR PLANO DELL', '0237', 42, 18, 12, '2022-03-21 10:38:31', 1),
(238, 'LAPTOP LENOVO ADM', '0238', 42, 18, 12, '2022-03-21 10:38:30', 1),
(239, 'GUANTES LATEX DESCARTABLES  T-8 (S)', '0239', 32, 12, 12, '2022-03-21 10:37:29', 1),
(240, 'LECTORA  DE CODIGO BARRA ZEBRA', '0240', 42, 18, 12, '2022-03-21 10:38:30', 1),
(241, 'MASCARILLA x 50 UNID.', '0241', 32, 4, 12, '2022-03-21 10:37:30', 1),
(242, 'LECTORA DE CODIGO DE BARRAS SYMBOL SOBRE MESA', '0242', 42, 18, 12, '2022-03-21 10:38:30', 1),
(243, 'LECTORA GRABADORA MULTIFUNCIONAL', '0243', 42, 13, 12, '2022-03-21 10:38:30', 1),
(244, 'MANGA DE CUERO P/SOLDADURA NACIONAL', '0244', 32, 13, 12, '2022-03-21 10:37:30', 1),
(245, 'MONITOR A COLOR HP', '0245', 42, 18, 12, '2022-03-21 10:38:31', 1),
(246, 'MONITOR LED DELL', '0246', 42, 18, 12, '2022-03-21 10:38:31', 1),
(247, 'MONITOR PLANO COMPAQ', '0247', 42, 18, 12, '2022-03-21 10:38:31', 1),
(248, 'GUANTES INDUSTRIAL T-M (LIMPIEZA)', '0248', 32, 12, 12, '2022-03-21 10:37:29', 1),
(249, 'MOUSE PARA PC ANTIGUA ', '0249', 42, 18, 12, '2022-03-21 10:38:32', 1),
(250, 'GUANTES INDUSTRIAL T-L (LIMPIEZA)', '0250', 32, 12, 12, '2022-03-21 10:37:29', 1),
(251, 'MOUSE RETRACTIL', '0251', 42, 18, 12, '2022-03-21 10:38:32', 1),
(252, 'PANTALLA ECRAN', '0252', 42, 18, 12, '2022-03-21 10:38:32', 1),
(253, 'LENTES GOOGLE C/ANTIPARRAS', '0253', 32, 13, 12, '2022-03-21 10:37:29', 1),
(254, 'RUTEADOR DE RED - ROUTER', '0254', 42, 18, 12, '2022-03-21 10:38:32', 1),
(255, 'LENTES PROTECTOR ANTIPARRAS', '0255', 32, 13, 12, '2022-03-21 10:37:29', 1),
(256, 'SCANNER FUJITSU', '0256', 42, 18, 12, '2022-03-21 10:38:32', 1),
(257, 'LENTES PROTECTOR LUNA CLARA', '0257', 32, 13, 12, '2022-03-21 10:37:30', 1),
(258, 'SWITCH DE RED', '0258', 42, 18, 12, '2022-03-21 10:38:33', 1),
(259, 'RESPIRADOR VERDE EGUSA S/FILTRO ANTIGAS', '0259', 32, 13, 12, '2022-03-21 10:37:30', 1),
(260, 'TECLADO ', '0260', 42, 18, 12, '2022-03-21 10:38:33', 1),
(261, 'UNIDAD CENTRAL DE PROCESO - CPU - ADVANCE', '0261', 42, 18, 12, '2022-03-21 10:38:33', 1),
(262, 'RESPIRADOR 3M S/FILTRO T-S', '0262', 32, 13, 12, '2022-03-21 10:37:30', 1),
(263, 'MONITOR PLANO ADVANCE', '0263', 42, 18, 12, '2022-03-21 10:38:31', 1),
(264, 'RESPIRADOR 3M  C/FILTRO T-M', '0264', 32, 13, 12, '2022-03-21 10:37:30', 1),
(265, 'RESPIRADOR 3M  C/FILTRO T-L', '0265', 32, 13, 12, '2022-03-21 10:37:30', 1),
(266, 'LAPTOP FUJITSU', '0266', 42, 18, 12, '2022-03-21 10:38:29', 1),
(267, 'CONO DE SEGURIDAD', '0267', 32, 13, 12, '2022-03-21 10:37:28', 1),
(268, 'MONITOR LED HP', '0268', 42, 18, 12, '2022-03-21 10:38:31', 1),
(269, 'PROYECTOR MULTIMEDIA EPSON POWERLITE X24', '0269', 42, 18, 12, '2022-03-21 10:38:32', 1),
(270, 'PROTECTOR DE MANGA', '0270', 32, 12, 12, '2022-03-21 10:37:30', 1),
(271, 'LECTORA DE CODIGO DE BARRA DATALOGIC ', '0271', 42, 18, 12, '2022-03-21 10:38:30', 1),
(272, 'LECTORA DE CODIGO DE BARRA MOTOROLA ', '0272', 42, 18, 12, '2022-03-21 10:38:30', 1),
(273, 'CINTA REFLECTIVA AMARILLA', '0273', 32, 13, 12, '2022-03-21 10:37:28', 1),
(274, 'LECTORA DE CODIGO DE BARRA HONEYWELL', '0274', 42, 18, 12, '2022-03-21 10:38:30', 1),
(275, 'LECTORA DE CODIGO DE BARRA SYMBOL ', '0275', 42, 18, 12, '2022-03-21 10:38:30', 1),
(276, 'CAPTURADOR DE IMAGEN SCANNER FUJITSU', '0276', 42, 18, 12, '2022-03-21 10:38:29', 1),
(277, 'MONITOR PLANO HP', '0277', 42, 18, 12, '2022-03-21 10:38:31', 1),
(278, 'TECLADO ADVANCE', '0278', 42, 18, 12, '2022-03-21 10:38:33', 1),
(279, 'CINTA ANTIDESLIZANTE NEGRA P/ESCALERA ', '0279', 32, 13, 12, '2022-03-21 10:37:28', 1),
(280, 'IMPRESORA DE CÓDIGO DE BARRA ZEBRA', '0280', 42, 18, 12, '2022-03-21 10:38:29', 1),
(281, 'ATORNILLADOR INALAMBRICO', '0281', 47, 18, 12, '2022-03-21 10:38:38', 1),
(282, 'TECLADO INALAMBRICO', '0282', 42, 18, 12, '2022-03-21 10:38:33', 1),
(283, 'GUANTE CUERO TALLA L', '0283', 32, 12, 12, '2022-03-21 10:37:29', 1),
(284, 'MOUSE INALAMBRICO ', '0284', 42, 18, 12, '2022-03-21 10:38:31', 1),
(285, 'ALL IN ONE ', '0285', 42, 18, 12, '2022-03-21 10:38:28', 1),
(286, 'CAPTURADOR DE HUELLA DACTILAR SICON', '0286', 42, 18, 12, '2022-03-21 10:38:29', 1),
(287, 'MODEN ZITE', '0287', 42, 18, 12, '2022-03-21 10:38:31', 1),
(288, 'GUANTE DE HILO CON PALMA DE LATEX TALLA L', '0288', 32, 12, 12, '2022-03-21 10:37:29', 1),
(289, 'TECLADO DELL', '0289', 42, 18, 12, '2022-03-21 10:38:33', 1),
(290, 'UNIDAD CENTRAL DE PROCESO - CPU - DELL', '0290', 42, 18, 12, '2022-03-21 10:38:33', 1),
(291, 'MOUSE NO RETRACTIL ', '0291', 42, 18, 12, '2022-03-21 10:38:32', 1),
(292, 'GUANTES DE NEOPRENO T- XL', '0292', 32, 12, 12, '2022-03-21 10:37:29', 1),
(293, 'LECTORA CODIGO BARRA INTERMEC', '0293', 42, 18, 12, '2022-03-21 10:38:30', 1),
(294, 'SWITCH PARA RED CISCO', '0294', 42, 18, 12, '2022-03-21 10:38:33', 1),
(295, 'GUANTE DIELECTRICO 5000V', '0295', 32, 12, 12, '2022-03-21 10:37:29', 1),
(296, 'IMPRESORA LASER HP', '0296', 42, 18, 12, '2022-03-21 10:38:29', 1),
(297, 'UNIDAD CENTRAL DE PROCESO - CPU - HP', '0297', 42, 18, 12, '2022-03-21 10:38:33', 1),
(298, 'MAMELUCO IMPERMEABLE CON CAPUCHA COLOR AZUL MARINO TALLA XL', '0298', 32, 13, 12, '2022-03-21 10:37:30', 1),
(299, 'LAPTOP HP', '0299', 42, 18, 12, '2022-03-21 10:38:29', 1),
(300, 'MAMELUCO IMPERMEABLE CON CAPUCHA COLOR AZUL MARINO TALLA L', '0300', 32, 13, 12, '2022-03-21 10:37:30', 1),
(301, 'SMART CELL BATHERY', '0301', 42, 18, 12, '2022-03-21 10:38:32', 1),
(302, 'LAPIZ OPTICO', '0302', 42, 18, 12, '2022-03-21 10:38:29', 1),
(303, 'ADAPTADORES DE AUDIO', '0303', 42, 18, 12, '2022-03-21 10:38:28', 1),
(304, 'ALCOHOL GEL x 1 LT', '0304', 33, 8, 12, '2022-03-21 10:37:33', 1),
(305, 'LECTORA CODIGO BARRA ZEBRA (DS2008)', '0305', 42, 18, 12, '2022-03-21 10:38:30', 1),
(306, 'ALCOHOL ISOPROPILICO x 1 LT', '0306', 33, 8, 12, '2022-03-21 10:37:33', 1),
(307, 'BALDE', '0307', 33, 13, 12, '2022-03-21 10:37:33', 1),
(308, 'ARMARIO DE MELAMINA', '0308', 43, 18, 12, '2022-03-21 10:52:15', 1),
(309, 'DEODORIZADOR AMBIENTE SPRAY', '0309', 33, 13, 12, '2022-03-21 10:37:33', 1),
(310, 'ARMARIO DE METAL', '0310', 43, 18, 12, '2022-03-21 10:52:15', 1),
(311, 'BANCA DE MADERA', '0311', 43, 18, 12, '2022-03-21 10:52:15', 1),
(312, 'DESATORADOR DE BAÑO', '0312', 33, 13, 12, '2022-03-21 10:37:33', 1),
(313, 'CASILLERO DE METAL - LOCKER', '0313', 43, 18, 12, '2022-03-21 10:52:16', 1),
(314, 'ESCRITORIO DE MADERA', '0314', 43, 18, 12, '2022-03-21 10:52:16', 1),
(315, 'DISPENSADOR DE PAPEL HIGIENICO', '0315', 33, 13, 12, '2022-03-21 10:37:34', 1),
(316, 'ESCRITORIO DE MELAMINA', '0316', 43, 18, 12, '2022-03-21 10:52:16', 1),
(317, 'ESTANTE DE MELAMINA', '0317', 43, 18, 12, '2022-03-21 10:52:16', 1),
(318, 'DISPENSADOR DE PAPEL TOALLA', '0318', 33, 13, 12, '2022-03-21 10:37:34', 1),
(319, 'MESA DE METAL', '0319', 43, 18, 12, '2022-03-21 10:52:16', 1),
(320, 'MESA DE MADERA', '0320', 43, 18, 12, '2022-03-21 10:52:16', 1),
(321, 'DISPENSADOR DE JABON', '0321', 33, 13, 12, '2022-03-21 10:37:33', 1),
(322, 'MESA DE METAL Y MELAMINA', '0322', 43, 18, 12, '2022-03-21 10:52:16', 1),
(323, 'JABON LIQUIDO GEL x800 M', '0323', 33, 13, 12, '2022-03-21 10:37:34', 1),
(324, 'MESA PLEGABLE DE MELAMINA', '0324', 43, 18, 12, '2022-03-21 10:52:16', 1),
(325, 'SILLA DE ACRILICO', '0325', 43, 18, 12, '2022-03-21 10:52:16', 1),
(326, 'SILLA FIJA DE MADERA', '0326', 43, 18, 12, '2022-03-21 10:52:17', 1),
(327, 'PAPEL TOALLA', '0327', 33, 17, 12, '2022-03-21 10:37:35', 1),
(328, 'SILLA FIJA DE METAL', '0328', 43, 18, 12, '2022-03-21 10:52:17', 1),
(329, 'PAPEL HIGIENICO', '0329', 33, 13, 12, '2022-03-21 10:37:35', 1),
(330, 'SILLA FIJA DE OTRO MATERIAL', '0330', 43, 18, 12, '2022-03-21 10:52:17', 1),
(331, 'TRAPO INDUSTRIAL x 4 KG', '0331', 33, 7, 12, '2022-03-21 10:37:35', 1),
(332, 'PARANTE ORDENADOR DE FILAS', '0332', 43, 18, 12, '2022-03-21 10:52:16', 1),
(333, 'TRAPO INDUSTRIAL A COLOR x 4 KG', '0333', 33, 7, 12, '2022-03-21 10:37:35', 1),
(334, 'SILLA GIRATORIA DE METAL', '0334', 43, 18, 12, '2022-03-21 10:52:17', 1),
(335, 'SILLON GIRATORIO DE METAL', '0335', 43, 18, 12, '2022-03-21 10:52:17', 1),
(336, 'WAYPE x 3 KG', '0336', 33, 7, 12, '2022-03-21 10:37:35', 1),
(337, 'DISPENSADOR FLUIDO DEODORIZADOR', '0337', 32, 13, 12, '2022-03-21 10:37:28', 1),
(338, 'PERNO CABEZA COCHE CON ARANADELA 1/2x 1.1/2 CON TUERCA', '0338', 47, 13, 12, '2022-03-21 10:38:43', 1),
(339, 'MANGA DE PLASTICO COLOR AZUL', '0339', 33, 17, 12, '2022-03-21 10:37:34', 1),
(340, 'RECOGEDOR', '0340', 33, 13, 12, '2022-03-21 10:37:35', 1),
(341, 'CEPILLO DE ESCOBA DE METAL /AMARILLO', '0341', 33, 13, 12, '2022-03-21 10:37:33', 1),
(342, 'HISOPO ESCOBILLA PARA INODORO', '0342', 33, 13, 12, '2022-03-21 10:37:34', 1),
(343, 'SODA CAUSTICA - NACIONAL', '0343', 33, 13, 12, '2022-03-21 10:37:35', 1),
(344, 'TACHO DE BASURA (80LT)', '0344', 33, 13, 12, '2022-03-21 10:37:35', 1),
(345, 'TACHO DE BASURA (20LT)W', '0345', 33, 13, 12, '2022-03-21 10:37:35', 1),
(346, 'PAÑOS DE LIMPIEZA PARA SCANNER 5X8 PULG.', '0346', 33, 13, 12, '2022-03-21 10:37:35', 1),
(347, 'ALCOHOL ETILICO DE 96 x 1 LT', '0347', 33, 8, 12, '2022-03-21 10:37:32', 1),
(348, 'LEJIA', '0348', 33, 5, 12, '2022-03-21 10:37:34', 1),
(349, 'ALCOHOL ISOPROPILICO 53', '0349', 33, 8, 12, '2022-03-21 10:37:33', 1),
(350, 'ROCEADOR', '0350', 33, 13, 12, '2022-03-21 10:37:35', 1),
(351, 'TABLERO ELECTRICO DE CONTROL', '0351', 41, 18, 12, '2022-03-21 10:38:36', 1),
(352, 'DESINFECTANTE CONCENTRADO SOLUBLE x 1LT', '0352', 33, 13, 12, '2022-03-21 10:37:33', 1),
(353, 'DESINFECTANTE VIRUCIDA PH NEUTRO', '0353', 33, 5, 12, '2022-03-21 10:37:33', 1),
(354, 'ESTRUCTURA DE METAL', '0354', 44, 18, 12, '2022-03-21 10:38:33', 1),
(355, 'PARIHUELA DE MADERA 1.10 MT X 1.15MT X 11.8CM', '0355', 43, 3, 12, '2022-03-21 10:52:16', 1),
(356, 'CUCHARITA DE PLASTICO X 100 UNID', '0356', 51, 1, 12, '2022-03-21 10:37:27', 1),
(357, 'VIGA DE METAL - 1TONELADA', '0357', 44, 18, 12, '2022-03-21 10:38:33', 1),
(358, 'MATERIAL DE CONTINGENCIA', '0358', 123, 3, 12, '2022-03-21 10:38:21', 1),
(359, 'VASOS TECKNOPOR x50', '0359', 51, 11, 12, '2022-03-21 10:37:27', 1),
(360, 'BALASTRO P/FLUORESCENTE DE 54W', '0360', 45, 18, 12, '2022-03-21 10:38:50', 1),
(361, 'FLUORESCENTE RECTO DE 2X54 W', '0361', 45, 18, 12, '2022-03-21 10:47:20', 1),
(362, 'FLUORESCENTE 18W GELECTR T/8', '0362', 45, 18, 12, '2022-03-21 10:47:20', 1),
(363, 'FLUORESCENTE TUBULAR RECTO 36W PHILIPS', '0363', 45, 18, 12, '2022-03-21 10:47:20', 1),
(364, 'PAPEL TERMICO BLANCO - CAPACITACION', '0364', 101, 17, 12, '2022-03-21 10:37:26', 1),
(365, 'RESISTENCIA P/ SELLADORA 8CM', '0365', 45, 18, 12, '2022-03-21 10:52:14', 1),
(366, 'PAPEL TERMICO CON LOGO AZUL - SUFRAGIO', '0366', 101, 17, 12, '2022-03-21 10:37:26', 1),
(367, 'RESISTENCIA P/ SELLADORA 10CM', '0367', 45, 13, 12, '2022-03-21 10:52:14', 1),
(368, 'RESISTENCIA P/ SELLADORA 15CM', '0368', 45, 18, 12, '2022-03-21 10:52:14', 1),
(369, 'PAPEL TERMICO SEPIA -  SIMULACRO', '0369', 101, 17, 12, '2022-03-21 10:37:26', 1),
(370, 'TINTA HP 664 NEGRO', '0370', 101, 13, 12, '2022-03-21 10:37:26', 1),
(371, 'RESISTENCIA P/SELLADORA  20CM', '0371', 45, 13, 12, '2022-03-21 10:52:14', 1),
(372, 'TOMA CORRIENTE DOBLE', '0372', 45, 13, 12, '2022-03-21 10:52:15', 1),
(373, 'RESISTENCIA P/SELLADORA 30CM', '0373', 45, 13, 12, '2022-03-21 10:52:14', 1),
(374, 'TINTA HP Nro95 COLOR', '0374', 101, 13, 12, '2022-03-21 10:37:26', 1),
(375, 'TINTA HP Nro98 NEGRO', '0375', 101, 13, 12, '2022-03-21 10:37:26', 1),
(376, 'TINTA COLOR 75 HP', '0376', 101, 13, 12, '2022-03-21 10:37:26', 1),
(377, 'TINTA EPSON NEGRO Nro7741', '0377', 101, 13, 12, '2022-03-21 10:37:26', 1),
(378, 'PAÑOS DE MICROFIBRA 40x40cm', '0378', 33, 13, 12, '2022-03-21 10:37:35', 1),
(379, 'PAPEL SECANTE X 250', '0379', 51, 11, 12, '2022-03-21 10:37:27', 1),
(380, 'JUEGO ACCESORIO P/INODORO TANQUE BAJO ', '0380', 46, 6, 12, '2022-03-21 10:38:49', 1),
(381, 'ASIENTO Y TAPA P/INODORO MELAMIMEX', '0381', 46, 13, 12, '2022-03-21 10:38:49', 1),
(382, 'FILTRO DE AGUA CARB. ACTIV. 5UM X 2 1/2 X 10 IN', '0382', 46, 13, 12, '2022-03-21 10:38:49', 1),
(383, 'LLAVE MIXTA VARIAS', '0383', 47, 13, 12, '2022-03-21 10:38:42', 1),
(384, 'MANUBRIO PESADO PTANQUE DE INODORO CROMADO ', '0384', 46, 13, 12, '2022-03-21 10:38:50', 1),
(385, 'ENGANCHE DE MANGUERA P/LLAVE ESFERICA', '0385', 46, 13, 12, '2022-03-21 10:38:49', 1),
(386, 'MAYOLICA CELIMA BLANCO 30 X 30', '0386', 47, 13, 12, '2022-03-21 10:38:42', 1),
(387, 'LLAVE P/LAVATORIO TEMPORIZADA', '0387', 46, 13, 12, '2022-03-21 10:38:49', 1),
(388, 'TUBO ABASTO C/REF 1/2 X 5/8 X 40M-H', '0388', 46, 13, 12, '2022-03-21 10:38:50', 1),
(389, 'UNION UNIVERSAL 2 1/2', '0389', 46, 13, 12, '2022-03-21 10:38:50', 1),
(390, 'CINTA AISLANTE 3/4 X 18 MTS', '0390', 47, 13, 12, '2022-03-21 10:38:39', 1),
(391, 'CINTA P/ CONDUCTOS 1.88 X 60 YDS', '0391', 47, 13, 12, '2022-03-21 10:38:39', 1),
(392, 'TAPA CIEGA CIRCULAR', '0392', 47, 13, 12, '2022-03-21 10:38:45', 1),
(393, 'NIPLE FIERRO GALVANIZADO DE 1/2 X 1 1/2', '0393', 47, 13, 12, '2022-03-21 10:38:42', 1),
(394, 'RESISTENCIA P/SELLADORA 50 CM', '0394', 45, 13, 12, '2022-03-21 10:52:14', 1),
(395, 'NIPLE FIERRO GALVANIZADO 1/2 X 2', '0395', 47, 13, 12, '2022-03-21 10:38:42', 1),
(396, 'RESISTENCIA 10 OHM SW CERAMICO', '0396', 45, 13, 12, '2022-03-21 10:52:14', 1),
(397, 'NIPLE 2 1/2 10CM', '0397', 47, 13, 12, '2022-03-21 10:38:42', 1),
(398, 'RESISTENCIA 5 OHM SW CERAMICO', '0398', 45, 13, 12, '2022-03-21 10:52:14', 1),
(399, 'SET DE RESISTENCIA MAS TEFLON', '0399', 45, 13, 12, '2022-03-21 10:52:14', 1),
(400, 'NIPLE 2 1/2 20CM', '0400', 47, 13, 12, '2022-03-21 10:38:42', 1),
(401, 'TEFLON P/SELLADORA 10CM', '0401', 45, 13, 12, '2022-03-21 10:52:15', 1),
(402, 'CINTILLO NYLON 4.8mm X 30cm COLOR NEGRO', '0402', 47, 13, 12, '2022-03-21 10:38:39', 1),
(403, 'TEFLON P/SELLADORA 13CM', '0403', 45, 13, 12, '2022-03-21 10:52:15', 1),
(404, 'PERNO BRONCE FIJACION TANQUE INODORO', '0404', 47, 13, 12, '2022-03-21 10:38:43', 1),
(405, 'TEFLON P/SELLADORA 15CM', '0405', 45, 13, 12, '2022-03-21 10:52:15', 1),
(406, 'CINTA TEFLON 12mmX0.075mmX12mt', '0406', 47, 13, 12, '2022-03-21 10:38:39', 1),
(407, 'TEFLON P/SELLADORA 20CM', '0407', 45, 13, 12, '2022-03-21 10:52:15', 1),
(408, 'TEFLON P/SELLADORA 30CM', '0408', 45, 13, 12, '2022-03-21 10:52:15', 1),
(409, 'TEFLON P/SELLADORA 50 CM', '0409', 45, 13, 12, '2022-03-21 10:52:15', 1),
(410, 'CAJA ADOSABLE 2X4', '0410', 45, 13, 12, '2022-03-21 10:47:19', 1),
(411, 'CAJA PASE RECTANGULAR PVC', '0411', 45, 13, 12, '2022-03-21 10:47:20', 1),
(412, 'BOMBILLA P/LAMPARA REFLECTIVA 400W', '0412', 45, 13, 12, '2022-03-21 10:38:51', 1),
(413, 'PILA LITIO LR 1130', '0413', 45, 13, 12, '2022-03-21 10:51:56', 1),
(414, 'PILA  ALCALINA  AA', '0414', 45, 12, 12, '2022-03-21 10:51:56', 1),
(415, 'PILA  ALCALINA  AAA', '0415', 45, 12, 12, '2022-03-21 10:51:56', 1),
(416, 'PILA D2 DURACELL', '0416', 45, 13, 12, '2022-03-21 10:51:56', 1),
(417, 'AGUA P/BATERIA', '0417', 45, 5, 12, '2022-03-21 10:38:50', 1),
(418, 'BATERIA RECARGABLE DE 6V X 4AH', '0418', 45, 13, 12, '2022-03-21 10:38:50', 1),
(419, 'BATERIA S 12 V X 4.0 AMP', '0419', 45, 13, 12, '2022-03-21 10:38:50', 1),
(420, 'ADAPTADOR REDONDO A PLANO', '0420', 45, 13, 12, '2022-03-21 10:38:50', 1),
(421, 'VALVULA PASO 1/2', '0421', 47, 13, 12, '2022-03-21 10:38:48', 1),
(422, 'ADAPTADOR UNIVERSAL 16 A 250 V.', '0422', 45, 13, 12, '2022-03-21 10:38:50', 1),
(423, 'CINTA AUTOADHESIVA 5cm X 90mt FIBRA DE VIDRIO C/BLANCO', '0423', 47, 17, 12, '2022-03-21 10:38:39', 1),
(424, 'BALASTRO ELECTROMAGNETICO P/ FLUORESCENTE 54W', '0424', 45, 13, 12, '2022-03-21 10:38:50', 1),
(425, 'CABLE TELEFONICO 2 HILOS X 150 MTS', '0425', 45, 13, 12, '2022-03-21 10:47:19', 1),
(426, 'CINTA MASKINGTAPE 1 X40yds', '0426', 47, 17, 12, '2022-03-21 10:38:39', 1),
(427, 'SOBRE MANILA EXTRA OFICIO (30.5 x 44 cm)', '0427', 11, 13, 12, '2022-03-21 10:52:28', 1),
(428, 'CINTA MASKINGTAPE 1/2 X40yds', '0428', 47, 17, 12, '2022-03-21 10:38:39', 1),
(429, 'CIRCUITO INTEGRADO LM339N', '0429', 45, 13, 12, '2022-03-21 10:47:20', 1),
(430, 'CODO SIN ROSCA PVC SAP DE 3/4', '0430', 45, 13, 12, '2022-03-21 10:47:20', 1),
(431, 'CINTA MASKINGTAPE  1 1/2', '0431', 47, 17, 12, '2022-03-21 10:38:39', 1),
(432, 'CODO DE CANALETA 2X1/2 PULG.', '0432', 45, 13, 12, '2022-03-21 10:47:20', 1),
(433, 'CINTA YUTE 18mm X 2 X 65mt', '0433', 47, 17, 12, '2022-03-21 10:38:39', 1),
(434, 'CONTACTOR DE 3 POLOS X 400 V', '0434', 45, 13, 12, '2022-03-21 10:47:20', 1),
(435, 'TAPA TORNILLO A PRESIÓN BLANCO', '0435', 45, 13, 12, '2022-03-21 10:52:15', 1),
(436, 'VALVULA PASO 2 1/2', '0436', 47, 13, 12, '2022-03-21 10:38:48', 1),
(437, 'RELAY TERMICO DE SOBRECARGA', '0437', 45, 13, 12, '2022-03-21 10:52:14', 1),
(438, 'FRAN RELAY DE 24V X 6', '0438', 45, 13, 12, '2022-03-21 10:47:20', 1),
(439, 'INTERRUPTOR TERMOM. ENGRANPE 3X160 AMP', '0439', 45, 13, 12, '2022-03-21 10:47:21', 1),
(440, 'INTERRUPTOR TERMOM. ENGRANPE 3X150 AMP', '0440', 45, 13, 12, '2022-03-21 10:47:21', 1),
(441, 'INTERRUPTOR TERMOM. 3X50A', '0441', 45, 13, 12, '2022-03-21 10:47:21', 1),
(442, 'INTERRUPTOR AUTOM. CJA MOLEAD 3X125 AMP', '0442', 45, 13, 12, '2022-03-21 10:47:21', 1),
(443, 'INTERRUPTOR DE EMERGENCIA', '0443', 45, 13, 12, '2022-03-21 10:47:21', 1),
(444, 'INTERRUPTOR SIMPLE CON CAJA P/ ADOSAR 15A', '0444', 45, 13, 12, '2022-03-21 10:47:21', 1),
(445, 'INTERRUPTOR DOBLE CON CAJA P/ ADOSAR 15A', '0445', 45, 13, 12, '2022-03-21 10:47:21', 1),
(446, 'INTERRUPTOR DOBLE 10 AMP', '0446', 45, 13, 12, '2022-03-21 10:47:21', 1),
(447, 'INTERRUPTOR DOBLE C/CAJA P/ADOSAR 10AMP', '0447', 45, 13, 12, '2022-03-21 10:47:21', 1),
(448, 'TOMACORRIENTE UNIV. C/LINEA A TIERRA 4 TOMAS ', '0448', 45, 13, 12, '2022-03-21 10:52:15', 1),
(449, 'LLAVE TERMICA TIPO RIEL 2 X 20 AMP', '0449', 45, 13, 12, '2022-03-21 10:47:21', 1),
(450, 'LLAVE TERMICA TIPO RIEL 2 X 40 AMP', '0450', 45, 13, 12, '2022-03-21 10:47:21', 1),
(451, 'LLAVE TERMOMAGNET ENGRAMPE 2 X 15 AMP', '0451', 45, 13, 12, '2022-03-21 10:47:21', 1),
(452, 'LLAVE TERMOMAGNET ENGRAMPE 2 X 20 AMP', '0452', 45, 13, 12, '2022-03-21 10:47:21', 1),
(453, 'LLAVE TERMOMAGNET ENGRAMPE 2 X 30 AMP', '0453', 45, 13, 12, '2022-03-21 10:56:37', 1),
(454, 'LLAVE TERMOMAGNET ENGRAMPE 2 X 60 AMP', '0454', 45, 13, 12, '2022-03-21 10:51:56', 1),
(455, 'GARRUCHA GIRATORIA  4 C/ LLANTA CAUCHO', '0455', 47, 17, 12, '2022-03-21 10:38:40', 1),
(456, 'LLAVE TERMOMAGNET ENGRAMPE 3 X 100 AMP', '0456', 45, 13, 12, '2022-03-21 10:51:56', 1),
(457, 'LLAVE TERMOMAGNET ENGRAMPE 3 X 20 AMP', '0457', 45, 13, 12, '2022-03-21 10:51:56', 1),
(458, 'LIJA AL AGUA N 80', '0458', 47, 13, 12, '2022-03-21 10:38:41', 1),
(459, 'LLAVE TERMOMAGNET ENGRAMPE 3 X 30 AMP', '0459', 45, 13, 12, '2022-03-21 10:51:56', 1),
(460, 'LIJA DE FIERRO N° 80', '0460', 47, 13, 12, '2022-03-21 10:38:41', 1),
(461, 'LLAVE TERMOMAGNET ENGRAMPE 3 X 40 AMP', '0461', 45, 13, 12, '2022-03-21 10:51:56', 1),
(462, 'LLAVE TERMOMAGNET ENGRAMPE 3 X 50 AMP', '0462', 45, 13, 12, '2022-03-21 10:51:56', 1),
(463, 'LIJA DE FIERRO N° 120', '0463', 47, 13, 12, '2022-03-21 10:38:41', 1),
(464, 'LLAVE TERMOMAGNET ENGRAMPE 3 X 60 AMP', '0464', 45, 13, 12, '2022-03-21 10:51:56', 1),
(465, 'LLAVE TERMOMAGNETICA T/PERNO 3X150', '0465', 45, 13, 12, '2022-03-21 10:51:56', 1),
(466, 'REACTOR 36 WATTS', '0466', 45, 13, 12, '2022-03-21 10:52:14', 1),
(467, 'REFLECTOR REDONDO 100 W.', '0467', 45, 13, 12, '2022-03-21 10:52:14', 1),
(468, 'REFLECTOR RECTANGULAR LED 400W', '0468', 45, 13, 12, '2022-03-21 10:52:14', 1),
(469, 'SOQUET P/ FLUORECENTE T5', '0469', 45, 13, 12, '2022-03-21 10:52:15', 1),
(470, 'CURVA PVC 3/4', '0470', 45, 13, 12, '2022-03-21 10:47:20', 1),
(471, 'TRANSFORMADOR 18 V X 220 V', '0471', 45, 13, 12, '2022-03-21 10:52:15', 1),
(472, 'RELAY 24 V C/SOCKET', '0472', 45, 13, 12, '2022-03-21 10:52:14', 1),
(473, 'TERMINAL D/COBRE 3/8', '0473', 45, 13, 12, '2022-03-21 10:52:15', 1),
(474, 'INTERRUPTOR TERMOMAGNETICO 3X 63A RIEL', '0474', 45, 13, 12, '2022-03-21 10:47:21', 1),
(475, 'CONTACTOR  3X60 AMP 600 V', '0475', 45, 13, 12, '2022-03-21 10:47:20', 1),
(476, 'CABLE PUESTA A TIERRA', '0476', 45, 13, 12, '2022-03-21 10:47:19', 1),
(477, 'TAPA METALICA P/TOMA CORRIENTE DOBLE', '0477', 45, 13, 12, '2022-03-21 10:52:15', 1),
(478, 'EXTENSION 2 TOMAS X 1.20MTS', '0478', 45, 13, 12, '2022-03-21 10:47:20', 1),
(479, 'CABLE EXTENSION ANARANJADO 10 MTS', '0479', 45, 13, 12, '2022-03-21 10:47:19', 1),
(480, 'CABLE DE EXTENSION DE 4 TOMAS X 1.20 MT.', '0480', 45, 13, 12, '2022-03-21 10:38:51', 1),
(481, 'CABLE DE EXTENSION AMARILLO 20 MTS', '0481', 45, 13, 12, '2022-03-21 10:38:51', 1),
(482, 'CABLE DE EXTENSION DE 2 TOMAS X 10 MTS', '0482', 45, 13, 12, '2022-03-21 10:38:51', 1),
(483, 'CABLE DE EXTENSION DE 4 TOMAS X 10 MTS', '0483', 45, 13, 12, '2022-03-21 10:38:51', 1),
(484, 'PAQUETE DE ETIQUETA PARA CIERRE DE CARTILLA DE HOLOGRAMAS x4', '0484', 67, 11, 12, '2022-03-21 10:38:15', 1),
(485, 'SEÑALIZADOR INDEX X10', '0485', 11, 4, 12, '2022-03-21 10:52:28', 1),
(486, 'ETIQUETA P/CIERRE DE SOBRE ACTA ELECTORAL PCH x 4 UNID ', '0486', 62, 14, 12, '2022-03-21 10:38:08', 1),
(487, 'ROTULOS DE TABLETS DE ORIENTACION', '0487', 64, 13, 12, '2022-03-21 10:38:06', 1),
(488, 'ETIQUETA P/EQUIPO CON FALLAS COLOR ROJO', '0488', 62, 13, 12, '2022-03-21 10:38:08', 1),
(489, 'BISAGRA AJUSTABLE DE RETEN 2 TIEMPOS', '0489', 48, 13, 12, '2022-03-21 10:38:36', 1),
(490, 'ETIQUETA P/CAJA DE RESTOS ELECTORALES SEA CAPA (GRANEL)', '0490', 64, 13, 12, '2022-03-21 10:37:55', 1),
(491, 'HOLOGRAMAS', '0491', 34, 13, 12, '2022-03-21 10:37:36', 1),
(492, 'ETIQUETA P/CAJA DE RESTOS ELECTORALES VEP CAPA (GRANEL)', '0492', 62, 13, 12, '2022-03-21 10:38:08', 1),
(493, 'ETIQUETA P/CAJA DE RESTOS ELECTORALES CONV CAPA (GRANEL)', '0493', 64, 13, 12, '2022-03-21 10:37:55', 1),
(494, 'ETIQUETA P/CAJA DE RESTOS ELECTORALES CONV SUF', '0494', 64, 17, 12, '2022-03-21 10:37:55', 1),
(495, 'PAQUETE DE ÚTILES CON', '0495', 61, 11, 12, '2022-03-21 10:38:16', 1),
(496, 'ETIQUETA P/CAJA DE RESTOS ELECTORALES SEA SUF', '0496', 64, 17, 12, '2022-03-21 10:37:55', 1),
(497, 'PAQUETE DE ÚTILES VEP', '0497', 61, 11, 12, '2022-03-21 10:38:16', 1),
(498, 'SOBRE PLASTICO CELESTE 30X50 CONV', '0498', 63, 13, 12, '2022-03-21 10:37:52', 1),
(499, 'ETIQUETA P/CAJA DE RESTOS ELECTORALES VEP SUF', '0499', 62, 17, 12, '2022-03-21 10:38:08', 1),
(500, 'PAQUETE DE ÚTILES CONTINGENCIA VEP', '0500', 61, 11, 12, '2022-03-21 10:38:16', 1),
(501, 'ETIQUETA P/ROTULO FRONTAL C/AMARILLO ORO  ', '0501', 70, 17, 12, '2022-03-21 10:37:39', 1),
(502, 'PAQUETE DE ÚTILES SEA CAP', '0502', 61, 11, 12, '2022-03-21 10:38:16', 1),
(503, 'PISTOLA DE CLAVOS', '0503', 47, 13, 12, '2022-03-21 10:38:44', 1),
(504, 'BOLIGRAFO TINTA SECA S/LOGO COLOR AZUL', '0504', 61, 13, 12, '2022-03-21 10:38:16', 1),
(505, 'ETIQUETA P/ROTULO FRONTAL C/AMARILLO PASTEL  ', '0505', 70, 17, 12, '2022-03-21 10:37:40', 1),
(506, 'CIZALLA', '0506', 47, 13, 12, '2022-03-21 10:38:39', 1),
(507, 'ETIQUETA P/ROTULO FRONTAL C/AZUL ACERO   ', '0507', 70, 17, 12, '2022-03-21 10:37:40', 1),
(508, 'SOBRE PLASTICO ROJO 30X50 CONV', '0508', 63, 13, 12, '2022-03-21 10:37:52', 1),
(509, 'SOBRE PLASTICO VERDE 30X50 CONV', '0509', 63, 13, 12, '2022-03-21 10:37:52', 1),
(510, 'SOBRE PLASTICO PLOMO 30X50 CONV', '0510', 63, 13, 12, '2022-03-21 10:37:52', 1),
(511, 'ETIQUETA P/ROTULO FRONTAL C/CELESTE   ', '0511', 70, 17, 12, '2022-03-21 10:37:40', 1),
(512, 'SOBRE PLASTICO ANARANJADO 30X50 CONV', '0512', 63, 13, 12, '2022-03-21 10:37:51', 1),
(513, 'ETIQUETA P/ROTULO FRONTAL C/LILA   ', '0513', 70, 17, 12, '2022-03-21 10:37:40', 1),
(514, 'SOBRE PLASTICO MORADO 30X50 CONV', '0514', 63, 13, 12, '2022-03-21 10:37:52', 1),
(515, 'ETIQUETA P/ROTULO FRONTAL C/TURQUEZA   ', '0515', 70, 17, 12, '2022-03-21 10:37:41', 1),
(516, 'SOBRE PLASTICO ROJO 30X50 SEA', '0516', 63, 13, 12, '2022-03-21 10:37:52', 1),
(517, 'ETIQUETA P/ROTULO FRONTAL C/AZUL VIOLETA   ', '0517', 70, 17, 12, '2022-03-21 10:37:40', 1),
(518, 'SOBRE PLASTICO C/ROJO SEA 43X23.5CM', '0518', 63, 13, 12, '2022-03-21 10:37:51', 1),
(519, 'ETIQUETA P/ROTULO FRONTAL C/VERDE OLIVO   ', '0519', 70, 17, 12, '2022-03-21 10:37:41', 1),
(520, 'MASCARA  DE SOLDAR', '0520', 47, 13, 12, '2022-03-21 10:38:42', 1),
(521, 'AMOLADORA', '0521', 47, 13, 12, '2022-03-21 10:38:38', 1),
(522, 'ETIQUETA P/ROTULO FRONTAL C/MELON PASTEL   ', '0522', 70, 17, 12, '2022-03-21 10:37:40', 1),
(523, 'ETIQUETA P/ROTULO FRONTAL C/VERDE BOSQUE', '0523', 70, 17, 12, '2022-03-21 10:37:41', 1),
(524, 'ETIQUETA P/ROTULO FRONTAL C/MORADO   ', '0524', 70, 17, 12, '2022-03-21 10:37:40', 1),
(525, 'ETIQUETA P/ROTULO FRONTAL C/SALMON   ', '0525', 70, 17, 12, '2022-03-21 10:37:41', 1),
(526, 'ETIQUETA P/ROTULO FRONTAL C/ROJO   ', '0526', 70, 17, 12, '2022-03-21 10:37:41', 1),
(527, 'ETIQUETA P/ROTULO FRONTAL C/PLOMO   ', '0527', 70, 17, 12, '2022-03-21 10:37:40', 1),
(528, 'ETIQUETA P/ROTULO FRONTAL C/MARRON CLARO   ', '0528', 70, 17, 12, '2022-03-21 10:37:40', 1),
(529, 'ETIQUETA P/ROTULO FRONTAL C/MARACUYA   ', '0529', 70, 17, 12, '2022-03-21 10:37:40', 1),
(530, 'LLAVE STINSON', '0530', 47, 13, 12, '2022-03-21 10:38:42', 1),
(531, 'ETIQUETA P/ROTULO FRONTAL C/TABACO   ', '0531', 70, 17, 12, '2022-03-21 10:37:41', 1),
(532, 'SERRUCHO', '0532', 47, 13, 12, '2022-03-21 10:38:45', 1),
(533, 'ETIQUETA P/ROTULO FRONTAL C/ROJO LADRILLO   ', '0533', 70, 17, 12, '2022-03-21 10:37:41', 1),
(534, 'SOBRE PLASTICO CELESTE 43X23.5CM', '0534', 63, 13, 12, '2022-03-21 10:37:52', 1),
(535, 'ETIQUETA P/ROTULO FRONTAL C/VERDE AGUA   ', '0535', 70, 17, 12, '2022-03-21 10:37:41', 1),
(536, 'ETIQUETA P/ROTULO FRONTAL C/ROSADO PASTEL   ', '0536', 70, 17, 12, '2022-03-21 10:37:41', 1),
(537, 'SOBRE PLASTICO ANARANJADO 43X23.5CM', '0537', 63, 13, 12, '2022-03-21 10:37:51', 1),
(538, 'ETIQUETA P/ROTULO FRONTAL C/AGUA MARINA   ', '0538', 70, 17, 12, '2022-03-21 10:37:39', 1),
(539, 'ETIQUETA P/ROTULO FRONTAL C/PALO ROSA   ', '0539', 70, 17, 12, '2022-03-21 10:37:40', 1),
(540, 'RODILLO PARA PINTAR', '0540', 47, 13, 12, '2022-03-21 10:38:45', 1),
(541, 'ETIQUETA P/ROTULO FRONTAL C/VERDE MANZANA   ', '0541', 70, 17, 12, '2022-03-21 10:37:41', 1),
(542, 'PROTECTOR FACIAL JLOVA', '0542', 32, 13, 12, '2022-03-21 10:37:30', 1),
(543, 'SOBRE PLASTICO C/ROJO VEP 43X23.5CM', '0543', 63, 13, 12, '2022-03-21 10:37:52', 1),
(544, 'ETIQUETA P/ROTULO FRONTAL C/AMARILLO ENCENDIDO ', '0544', 70, 17, 12, '2022-03-21 10:37:39', 1),
(545, 'ETIQUETA P/ROTULO FRONTAL C/ROJO CEREZA  ', '0545', 70, 17, 12, '2022-03-21 10:37:41', 1),
(546, 'BOLSA P/USB DE SEGURIDAD C/PLOMO', '0546', 71, 13, 12, '2022-03-21 10:37:37', 1),
(547, 'ETIQUETA P/ROTULO FRONTAL C/VERDE LIMON', '0547', 70, 17, 12, '2022-03-21 10:37:41', 1),
(548, 'ETIQUETA P/ROTULO FRONTAL C/ANARANJADO   ', '0548', 70, 17, 12, '2022-03-21 10:37:40', 1),
(549, 'ETIQUETA P/ROTULO FRONTAL C/FUCSIA   ', '0549', 70, 17, 12, '2022-03-21 10:37:40', 1),
(550, 'ETIQUETA P/ROTULO FRONTAL C/BLANCO   ', '0550', 70, 17, 12, '2022-03-21 10:37:40', 1),
(551, 'SOBRE PLASTICO PLOMO 43X23.5CM', '0551', 63, 13, 12, '2022-03-21 10:37:52', 1),
(552, 'BOLSA P/PAQUETE ÚTILES CON LOGO IMPRESO (12.00 X 25.50 X 1.5 )', '0552', 71, 13, 12, '2022-03-21 10:37:37', 1),
(553, 'ETIQUETA P/ROTULO FRONTAL C/MINI ROTULO BLANCO  ', '0553', 70, 17, 12, '2022-03-21 10:37:40', 1),
(554, 'TAMPÓN CERAMICO', '0554', 61, 13, 12, '2022-03-21 10:38:17', 1),
(555, 'SOBRE PLASTICO VERDE  43X23.5CM', '0555', 63, 13, 12, '2022-03-21 10:37:52', 1),
(556, 'TAMPON PARA HUELLA DACTILAR CON LOGO (AT)', '0556', 61, 13, 12, '2022-03-21 10:38:17', 1),
(557, 'DUNLOPILLO ', '0557', 74, 14, 12, '2022-03-21 10:37:44', 1),
(558, 'ETIQUETA P/ROTULO LATERAL C/AMARILLO PASTEL ', '0558', 70, 17, 12, '2022-03-21 10:37:42', 1),
(559, 'SUPERLONG', '0559', 74, 17, 12, '2022-03-21 10:37:45', 1),
(560, 'SOBRE PLASTICO MORADO 43X23.5CM (CONSULTA)', '0560', 63, 13, 12, '2022-03-21 10:37:52', 1),
(561, 'FILM NEGRO 18 PULGADAS', '0561', 73, 13, 12, '2022-03-21 10:37:39', 1),
(562, 'SOBRE PLASTICO MORADO 43X23.5CM (ORG. POLT)', '0562', 63, 13, 12, '2022-03-21 10:37:52', 1),
(563, 'SOBRE P/IMPUGNACION DEL VOTO E IDENTIDAD DEL ELECTOR SUF ', '0563', 63, 18, 12, '2022-03-21 10:37:51', 1),
(564, 'SOBRE P/IMPUGNACION DEL VOTO E IDENTIDAD DEL ELECTOR CAPA', '0564', 63, 13, 12, '2022-03-21 10:37:51', 1),
(565, 'TAMPON HUELLA DACTILAR COMPACTO 4CM', '0565', 61, 13, 12, '2022-03-21 10:38:17', 1),
(566, 'ETIQUETA P/ROTULO LATERAL C/AZUL ACERO   ', '0566', 70, 17, 12, '2022-03-21 10:37:42', 1),
(567, 'TAMPON HUELLA DACTILAR ', '0567', 61, 13, 12, '2022-03-21 10:38:17', 1),
(568, 'ETIQUETA P/ROTULO LATERAL C/AMARILLO ORO   ', '0568', 70, 17, 12, '2022-03-21 10:37:42', 1),
(569, 'CARGO DE RETENCION DEL DOCUMENTO DE IDENTIDAD - CAPA.', '0569', 64, 13, 12, '2022-03-21 10:37:55', 1),
(570, 'CARGO DE RETENCION DEL DOCUMENTO DE IDENTIDAD - SUF ', '0570', 64, 13, 12, '2022-03-21 10:37:55', 1),
(571, 'ETIQUETA P/ROTULO LATERAL C/CELESTE   ', '0571', 70, 17, 12, '2022-03-21 10:37:42', 1),
(572, 'CABINA DE VOTACIÓN  DE CARTON 134cmX88cm CONV', '0572', 65, 13, 12, '2022-03-21 10:38:06', 1),
(573, 'ETIQUETA P/ROTULO LATERAL C/LILA   ', '0573', 70, 17, 12, '2022-03-21 10:37:42', 1),
(574, 'BOLSA POLIETILENO 83.0 X 1.70 X 2.00 P/CABINA VOTACION VE ', '0574', 71, 13, 12, '2022-03-21 10:37:38', 1),
(575, 'ANFORA DE VOTACION C/LOGO ONPE 29.8cmx48cmx12.8cm ', '0575', 65, 13, 12, '2022-03-21 10:38:06', 1),
(576, 'FORMATO DE OBSERVACIONES O RECLAMOS AL ESCRUTINIO CAP', '0576', 64, 13, 12, '2022-03-21 10:37:56', 1),
(577, 'ETIQUETA P/ROTULO LATERAL C/TURQUEZA   ', '0577', 70, 17, 12, '2022-03-21 10:37:43', 1),
(578, 'FORMATO DE OBSERVACIONES O RECLAMOS AL ESCRUTINIO SUF', '0578', 64, 13, 12, '2022-03-21 10:37:56', 1),
(579, 'ROTULO DEL PAQUETE DE MAT. P/ INSTALACION DE LA MESA CAPA - CONV', '0579', 64, 13, 12, '2022-03-21 10:38:00', 1),
(580, 'ETIQUETA P/ROTULO LATERAL C/AZUL VIOLETA   ', '0580', 70, 17, 12, '2022-03-21 10:37:42', 1),
(581, 'ANFORA DE VOTACION C/LOGO ONPE 30.6cmx49cmx13.6cm', '0581', 65, 13, 12, '2022-03-21 10:38:06', 1),
(582, 'ETIQUETA P/ROTULO LATERAL C/VERDE OLIVO   ', '0582', 70, 17, 12, '2022-03-21 10:37:43', 1),
(583, 'CARGO DE ENTREGA DE ACTAS Y MATERIAL ELECTORAL AL COORDINADOR DE LA ONPE SUF CONV ', '0583', 64, 13, 12, '2022-03-21 10:37:54', 1),
(584, 'ANFORA DE VOTACION C/LOGO ONPE 30.6cmx49cmx13.6cm POR LAVAR', '0584', 65, 13, 12, '2022-03-21 10:38:06', 1),
(585, 'ETIQUETA P/ROTULO LATERAL C/MELON PASTEL   ', '0585', 70, 17, 12, '2022-03-21 10:37:42', 1),
(586, 'CARGO DE ENTREGA DE ACTAS Y MATERIAL ELECTORAL AL COORDINADOR DE LA ONPE SUF SEA', '0586', 64, 13, 12, '2022-03-21 10:37:54', 1),
(587, 'ETIQUETA P/ROTULO LATERAL C/VERDE LIMON   ', '0587', 70, 17, 12, '2022-03-21 10:37:43', 1),
(588, 'ANFORA DE VOTACION C/LOGO ONPE 29.8cmx48cmx12.8cm POR LAVAR', '0588', 65, 13, 12, '2022-03-21 10:38:06', 1),
(589, 'PAPEL DE SEGURIDAD SERIADO P/IMPRESIÓN SEA  (TIPO 1)', '0589', 64, 13, 12, '2022-03-21 10:37:57', 1),
(590, 'ETIQUETA P/ROTULO LATERAL C/MORADO   ', '0590', 70, 17, 12, '2022-03-21 10:37:42', 1),
(591, 'PAPEL BOND A4 CON SELLO \"MUESTRA DE PAPEL DE SEGURIDAD\" ', '0591', 64, 13, 12, '2022-03-21 10:37:57', 1),
(592, 'ETIQUETA P/ROTULO LATERAL C/SALMON   ', '0592', 70, 17, 12, '2022-03-21 10:37:43', 1),
(593, 'ETIQUETA P/ROTULO LATERAL C/ROJO   ', '0593', 70, 17, 12, '2022-03-21 10:37:43', 1),
(594, 'ETIQUETA P/ROTULO LATERAL C/PLOMO   ', '0594', 70, 17, 12, '2022-03-21 10:37:42', 1),
(595, 'ACTA DE NO INSTALACION DE MESA DE SUFRAGIO', '0595', 64, 13, 12, '2022-03-21 10:37:54', 1),
(596, 'ROTULO P/LAMINAS PARA PROTECCION DEL RECUADRO DE OBSERVACIONES - SEA', '0596', 64, 13, 12, '2022-03-21 10:38:05', 1),
(597, 'RODILLO PARA PINTAR 9pulgadas', '0597', 47, 13, 12, '2022-03-21 10:38:45', 1);
INSERT INTO `producto` (`IdProducto`, `Descripcion`, `CodProducto`, `IdClase`, `IdUma`, `UsuarioCrea`, `FechaCrea`, `Estado`) VALUES
(598, 'PARANTE DE ACERO GALVANIZADO 0.45mm x 38 mm x 89 mm x 3m', '0598', 47, 13, 12, '2022-03-21 10:38:42', 1),
(599, 'ROTULO PQT MAT ESCRUTINIO STAE-SUF', '0599', 64, 13, 12, '2022-03-21 10:38:05', 1),
(600, 'ROTULO PQT P/INSTALACION MESA STAE-SUF ', '0600', 64, 13, 12, '2022-03-21 10:38:06', 1),
(601, 'ROTULO P/CERRAR LA CARTILLA DE HOLOGRAMA', '0601', 64, 13, 12, '2022-03-21 10:38:04', 1),
(602, 'ROTULO P/PAPEL DE SEGURIDAD IMPRESION - STAE', '0602', 64, 13, 12, '2022-03-21 10:38:05', 1),
(603, 'ROTULO PQT MAT CONTING CAP ', '0603', 64, 13, 12, '2022-03-21 10:38:05', 1),
(604, 'MASILLA PARA DRYWALL X 27 KG', '0604', 47, 13, 12, '2022-03-21 10:38:42', 1),
(605, 'ESQUINERO DE METAL GALVANIZADO 30mm x 30 mm x 3m', '0605', 47, 13, 12, '2022-03-21 10:38:40', 1),
(606, 'ANFORA DE VOTACION C/LOGO ONPE - POR LAVAR', '0606', 65, 13, 12, '2022-03-21 10:38:06', 1),
(607, 'ROTULO PQT DE SEÑALES PARA EL LOCAL DE VOTACION - CONV ', '0607', 64, 13, 12, '2022-03-21 10:38:05', 1),
(608, 'ROTULO DEL PAQUETE DE SEÑALES PARA EL LOCAL DE VOTACION - SEA', '0608', 64, 13, 12, '2022-03-21 10:38:01', 1),
(609, 'ETIQUETA P/ROTULO LATERAL C/MARRON CLARO   ', '0609', 70, 17, 12, '2022-03-21 10:37:42', 1),
(610, 'ETIQUETA P/ROTULO LATERAL C/MARACUYA   ', '0610', 70, 17, 12, '2022-03-21 10:37:42', 1),
(611, 'ETIQUETA P/ROTULO LATERAL C/TABACO  ', '0611', 70, 17, 12, '2022-03-21 10:37:43', 1),
(612, 'ETIQUETA P/ROTULO LATERAL C/ROJO LADRILLO', '0612', 70, 17, 12, '2022-03-21 10:37:43', 1),
(613, 'ETIQUETA P/ROTULO LATERAL C/VERDE AGUA', '0613', 70, 17, 12, '2022-03-21 10:37:43', 1),
(614, 'ETIQUETA P/ROTULO LATERAL C/ROSADO PASTEL ', '0614', 70, 17, 12, '2022-03-21 10:37:43', 1),
(615, 'BOLSA P/ACTA PADRÓN - SUFRAGIO (38.00 X 59.00 X 1.5)', '0615', 71, 13, 12, '2022-03-21 10:37:36', 1),
(616, 'ETIQUETA P/ROTULO LATERAL C/AGUA MARINA   ', '0616', 70, 17, 12, '2022-03-21 10:37:41', 1),
(617, 'BOLSA POLIETILENO 1.2 X 1.60 X 2.00 P/CABINA VOTACIÓN CONV', '0617', 71, 13, 12, '2022-03-21 10:37:37', 1),
(618, 'ETIQUETA P/ROTULO LATERAL C/PALO ROSA   ', '0618', 70, 17, 12, '2022-03-21 10:37:42', 1),
(619, 'CABINA PORTATIL PARA VOTACION', '0619', 65, 13, 12, '2022-03-21 10:38:07', 1),
(620, 'SEÑAL PARA EL BAÑO DE HOMBRES C/AZUL', '0620', 83, 13, 12, '2022-03-21 10:37:50', 1),
(621, 'BOLSA P/CAJA 1 ANFORA (51.20 X 74.60 X 2.5)', '0621', 71, 13, 12, '2022-03-21 10:37:36', 1),
(622, 'SEÑAL PARA EL BAÑO DE MUJERES  C/AZUL', '0622', 83, 13, 12, '2022-03-21 10:37:50', 1),
(623, 'BOLSA  P/CAJA 2 ANFORAS (65.80 X 89.20 X 2.5)', '0623', 71, 13, 12, '2022-03-21 10:37:36', 1),
(624, 'SEÑAL PARA EL CENTRO DE ACOPIO C/AZUL', '0624', 83, 13, 12, '2022-03-21 10:37:50', 1),
(625, 'ETIQUETA P/ROTULO LATERAL C/AMARILLO ENCENDIDO   ', '0625', 70, 17, 12, '2022-03-21 10:37:42', 1),
(626, 'BOLSA POLIETILENO 72.50 X 91.50 X 2.5 P/CAJA 3 ANFORAS', '0626', 71, 13, 12, '2022-03-21 10:37:38', 1),
(627, 'SEÑAL DE PROHIBIDO EL PASO C/NEGRO Y ROJO', '0627', 83, 13, 12, '2022-03-21 10:37:49', 1),
(628, 'ETIQUETA P/ROTULO LATERAL C/VERDE MANZANA   ', '0628', 70, 17, 12, '2022-03-21 10:37:43', 1),
(629, 'BOLSA P/CAJA MATERIAL ELECTORAL - TRASLADO DE 1 (47.00 X 55.00 X 2.5)', '0629', 71, 13, 12, '2022-03-21 10:37:36', 1),
(630, 'SEÑAL DE PROHIBIDO FUMAR  C/NEGRO Y ROJO', '0630', 83, 13, 12, '2022-03-21 10:37:49', 1),
(631, 'BOLSA  P/PAQUETE ELECTORAL (27.00 X 40.00 X 1.5)', '0631', 71, 13, 12, '2022-03-21 10:37:36', 1),
(632, 'ETIQUETA P/ROTULO LATERAL C/ROJO CEREZA   ', '0632', 70, 17, 12, '2022-03-21 10:37:43', 1),
(633, 'SEÑAL DE RUTA PARA PERSONAS CON DISCAPACIDAD C/AZUL', '0633', 83, 13, 12, '2022-03-21 10:37:50', 1),
(634, 'BOLSA P/PAQUETE ÚTILES (12.00 X 25.50 X 1.5 )', '0634', 71, 13, 12, '2022-03-21 10:37:37', 1),
(635, 'ETIQUETA P/ROTULO LATERAL C/VERDE BOSQUE', '0635', 70, 17, 12, '2022-03-21 10:37:43', 1),
(636, 'SEÑAL FLECHA C/VERDE', '0636', 83, 13, 12, '2022-03-21 10:37:50', 1),
(637, 'BOLSA P/TACHO BASURA (71.10 X 83.82 X 1.5)', '0637', 71, 13, 12, '2022-03-21 10:37:37', 1),
(638, 'ETIQUETA P/ROTULO LATERAL C/FUCSIA   ', '0638', 70, 17, 12, '2022-03-21 10:37:42', 1),
(639, 'BOLSA P/DESECHOS COLOR NEGRO (0.50 X 0.80 X 1.5)', '0639', 71, 13, 12, '2022-03-21 10:37:37', 1),
(640, 'SEÑAL DE INGRESO C/VERDE', '0640', 83, 13, 12, '2022-03-21 10:37:49', 1),
(641, 'ETIQUETA P/ROTULO LATERAL C/ANARANJADO   ', '0641', 70, 17, 12, '2022-03-21 10:37:42', 1),
(642, 'BOLSA POLIETILENO 66.00 X 59.00 X 2.5 P/CAJA IMPRESORA  ', '0642', 71, 13, 12, '2022-03-21 10:37:37', 1),
(643, 'BOLSA P/CAJA INVERSOR (45.00 X 40.00 X 2.5)', '0643', 71, 13, 12, '2022-03-21 10:37:36', 1),
(644, 'ETIQUETA P/ROTULO LATERAL C/BLANCO   ', '0644', 70, 17, 12, '2022-03-21 10:37:42', 1),
(645, 'BOLSA POLIETILENO 66.00 X 77.00 X 2.5 P/CAJA MODULO KI', '0645', 71, 13, 12, '2022-03-21 10:37:37', 1),
(646, 'ETIQUETA P/ROTULO MESA C/AMARILLO ORO   ', '0646', 70, 17, 12, '2022-03-21 10:37:43', 1),
(647, 'BOLSA POLIETILENO 66.00 X 77.00 X 2.5 P/CAJA MODULO KV', '0647', 71, 13, 12, '2022-03-21 10:37:37', 1),
(648, 'BOLSA POLIETILENO 30.48 X 50.80 P/ACTA ELECTORAL', '0648', 71, 13, 12, '2022-03-21 10:37:37', 1),
(649, 'BOLSA P/ANFORA (70.90 X 48.20 X 2.5)', '0649', 71, 13, 12, '2022-03-21 10:37:36', 1),
(650, 'BOLSA POLIETILENO 44 X 65 X 2.5 CAJA DE MATERIAL (ANTIGUA) ', '0650', 71, 13, 12, '2022-03-21 10:37:37', 1),
(651, 'ETIQUETA P/ROTULO MESA C/AMARILLO PASTEL   ', '0651', 70, 17, 12, '2022-03-21 10:37:43', 1),
(652, 'BOLSA P/CAJA TRASLADO DE 1 TIPO 2 (47.00 X 64.00 X 2.5)', '0652', 71, 13, 12, '2022-03-21 10:37:36', 1),
(653, 'ETIQUETA P/ROTULO MESA C/AZUL ACERO   ', '0653', 70, 17, 12, '2022-03-21 10:37:43', 1),
(654, 'BOLSA P/CAJA TRASLADO DE 2 TIPO 2 (57.00 X 70.00 X 2.5) ', '0654', 71, 13, 12, '2022-03-21 10:37:37', 1),
(655, 'BOLSA P/CAJA TRASLADO DE 3 TIPO 2 (67.00 X 85.00 X 2.5) ', '0655', 71, 13, 12, '2022-03-21 10:37:37', 1),
(656, 'BOLSA P/CAJA TRASLADO DE 4 TIPO 2 (81.00 X 85.00 X 2.5 )', '0656', 71, 13, 12, '2022-03-21 10:37:37', 1),
(657, 'BOLSA P/CAJA TRASLADO DE 2 (57.00 X 70.00)', '0657', 71, 13, 12, '2022-03-21 10:37:37', 1),
(658, 'ETIQUETA P/ROTULO MESA C/CELESTE   ', '0658', 70, 17, 12, '2022-03-21 10:37:43', 1),
(659, 'BOLSA P/CAJA TRASLADO DE 3 (67.00 X 76.00 X 2.5)', '0659', 71, 13, 12, '2022-03-21 10:37:37', 1),
(660, 'BOLSA P/CAJA TRASLADO DE 4 (81.00 X 76.00 X 2.5)', '0660', 71, 13, 12, '2022-03-21 10:37:37', 1),
(661, 'ETIQUETA P/ROTULO MESA C/LILA   ', '0661', 70, 17, 12, '2022-03-21 10:37:43', 1),
(662, 'BOLSA POLIETILENO RECICLAJE 27.00 X 40.00 CM-STAE', '0662', 71, 13, 12, '2022-03-21 10:37:38', 1),
(663, 'BOLSA POLIETILENO 27.00 X 40.00 X 1.5 RECICLAJE - VEP', '0663', 71, 13, 12, '2022-03-21 10:37:37', 1),
(664, 'ETIQUETA P/ROTULO MESA C/TURQUEZA   ', '0664', 70, 17, 12, '2022-03-21 10:37:44', 1),
(665, 'BOLSA RECICLAJE - CONV  (27.00 X 40.00 X 1.5)', '0665', 71, 13, 12, '2022-03-21 10:37:38', 1),
(666, 'BOLSA POLIETILENO 27.00 X 40.00 X 1.5 RECICLAJE TIPO 2 CONV  ', '0666', 71, 13, 12, '2022-03-21 10:37:37', 1),
(667, 'ETIQUETA P/ROTULO MESA C/AZUL VIOLETA   ', '0667', 70, 17, 12, '2022-03-21 10:37:43', 1),
(668, 'ETIQUETA P/ROTULO MESA C/VERDE OLIVO   ', '0668', 70, 17, 12, '2022-03-21 10:37:44', 1),
(669, 'SEÑAL DE SALIDA  C/VERDE', '0669', 83, 13, 12, '2022-03-21 10:37:50', 1),
(670, 'SEÑAL PARA LA ZONA DE SEGURIDAD C/NEGRO Y VERDE', '0670', 83, 13, 12, '2022-03-21 10:37:50', 1),
(671, 'SEÑAL PARA LA ATENCIÓN PREFERENTE ', '0671', 83, 13, 12, '2022-03-21 10:37:50', 1),
(672, 'SEÑAL PROHIBIDO EL USO DE CELULARES CÁMARAS FOTOGRÁFICAS Y DE VÍDEO EN LA CÁMARA SECRETA C/NEGRO Y R', '0672', 83, 13, 12, '2022-03-21 10:37:50', 1),
(673, 'ETIQUETA P/ROTULO MESA C/MELON PASTEL   ', '0673', 70, 17, 12, '2022-03-21 10:37:44', 1),
(674, 'CINTA ADHESIVA ONPE 5.08  X 10 mts ROJO', '0674', 73, 17, 12, '2022-03-21 10:37:39', 1),
(675, 'SEÑAL DE PUNTO DE TRANSMISIÓN  C/AZÚL', '0675', 83, 13, 12, '2022-03-21 10:37:49', 1),
(676, 'ETIQUETA P/ROTULO MESA C/VERDE LIMON   ', '0676', 70, 17, 12, '2022-03-21 10:37:44', 1),
(677, 'CINTA ADHESIVA ONPE 5.08  X 10 MTS PLOMO', '0677', 73, 17, 12, '2022-03-21 10:37:39', 1),
(678, 'SEÑAL PARA EL AULA C/AZUL', '0678', 83, 13, 12, '2022-03-21 10:37:50', 1),
(679, 'CINTA ADHESIVA ONPE 5.08  X 100 MTS PLOMO', '0679', 73, 17, 12, '2022-03-21 10:37:39', 1),
(680, 'SEÑAL AULA ESPECIAL C/ROJO', '0680', 83, 13, 12, '2022-03-21 10:37:49', 1),
(681, 'ETIQUETA P/ROTULO MESA C/SALMON   ', '0681', 70, 17, 12, '2022-03-21 10:37:44', 1),
(682, 'SEÑAL DE MODULO TEMPORAL DE VOTACIÓN C/AZUL', '0682', 83, 13, 12, '2022-03-21 10:37:49', 1),
(683, 'CINTA ADHESIVA ONPE 5.08  X 100 MTS ROJO', '0683', 73, 17, 12, '2022-03-21 10:37:39', 1),
(684, 'ETIQUETA P/ROTULO MESA C/MORADO ', '0684', 70, 17, 12, '2022-03-21 10:37:44', 1),
(685, 'CINTA DE EMBALAJE 5 X 100mt - TRANSPARENTE', '0685', 11, 17, 12, '2022-03-21 10:52:23', 1),
(686, 'STRETCH FILM 18', '0686', 73, 17, 12, '2022-03-21 10:37:39', 1),
(687, 'ETIQUETA P/ROTULO MESA C/ROJO  ', '0687', 70, 17, 12, '2022-03-21 10:37:44', 1),
(688, 'STRETCH FILM 9', '0688', 73, 17, 12, '2022-03-21 10:37:39', 1),
(689, 'PRECINTO ADHESIVO EIE 4cmX15cmX1000unid C/AZUL ', '0689', 74, 13, 12, '2022-03-21 10:37:44', 1),
(690, 'PRECINTO ADHESIVO EIE 2.5cmX7cmX1000unid C/GRIS', '0690', 74, 13, 12, '2022-03-21 10:37:44', 1),
(691, 'ETIQUETA P/ROTULO MESA C/PLOMO   ', '0691', 70, 17, 12, '2022-03-21 10:37:44', 1),
(692, 'PRECINTO ADHESIVO EIE 4cmX15cmX1000unid C/GRIS', '0692', 74, 13, 12, '2022-03-21 10:37:44', 1),
(693, 'ETIQUETA P/ROTULO MESA C/MARRON CLARO', '0693', 70, 17, 12, '2022-03-21 10:37:44', 1),
(694, 'PRECINTO CELESTE COLA DE RATON', '0694', 74, 13, 12, '2022-03-21 10:37:45', 1),
(695, 'ETIQUETA P/ROTULO MESA C/MARACUYA   ', '0695', 70, 17, 12, '2022-03-21 10:37:43', 1),
(696, 'PRECINTO BLANCO COLA DE RATON', '0696', 74, 13, 12, '2022-03-21 10:37:45', 1),
(697, 'ETIQUETA P/ROTULO MESA C/TABACO   ', '0697', 70, 17, 12, '2022-03-21 10:37:44', 1),
(698, 'PRECINTO AZUL COLA DE RATON GRANDE', '0698', 74, 13, 12, '2022-03-21 10:37:44', 1),
(699, 'ETIQUETA P/ROTULO MESA C/ROJO LADRILLO   ', '0699', 70, 17, 12, '2022-03-21 10:37:44', 1),
(700, 'PRECINTO AZUL COLA DE RATON CHICO', '0700', 74, 13, 12, '2022-03-21 10:37:44', 1),
(701, 'PRECINTO TURQUEZA GRANDE', '0701', 74, 13, 12, '2022-03-21 10:37:45', 1),
(702, 'ETIQUETA P/ROTULO MESA C/VERDE AGUA  ', '0702', 70, 17, 12, '2022-03-21 10:37:44', 1),
(703, 'CAJA P/1 ANFORA (51.20 X 32.10 X 15.10)', '0703', 72, 13, 12, '2022-03-21 10:37:38', 1),
(704, 'ETIQUETA P/ROTULO MESA C/ROSADO PASTEL   ', '0704', 70, 17, 12, '2022-03-21 10:37:44', 1),
(705, 'CAJA P/2 ANFORAS (51.20 X 32.10 X 29.70)', '0705', 72, 13, 12, '2022-03-21 10:37:38', 1),
(706, 'ETIQUETA P/ROTULO MESA C/AGUA MARINA   ', '0706', 70, 17, 12, '2022-03-21 10:37:43', 1),
(707, 'CAJA P/TRASLADO DE 1 CAJA DE MATERIAL ELECTORAL (34.50 X 35.00 X 10.00)', '0707', 72, 13, 12, '2022-03-21 10:37:38', 1),
(708, 'ETIQUETA P/ROTULO MESA C/PALO ROSA   ', '0708', 70, 17, 12, '2022-03-21 10:37:44', 1),
(709, 'CAJA P/TRASLADO DE 2 CAJA DE MATERIAL ELECTORAL (34.50 X 35.00 X 21.00)', '0709', 72, 13, 12, '2022-03-21 10:37:39', 1),
(710, 'ETIQUETA P/ROTULO MESA C/VERDE MANZANA   ', '0710', 70, 17, 12, '2022-03-21 10:37:44', 1),
(711, 'ETIQUETA P/ROTULO MESA C/VERDE BOSQUE', '0711', 70, 17, 12, '2022-03-21 10:37:44', 1),
(712, 'CAJA P/TRASLADO DE 3 CAJA DE MATERIAL ELECTORAL (34.50 X 35.00 X 30.50)', '0712', 72, 13, 12, '2022-03-21 10:37:39', 1),
(713, 'ETIQUETA P/ROTULO MESA C/ROJO CEREZA   ', '0713', 70, 17, 12, '2022-03-21 10:37:44', 1),
(714, 'ETIQUETA P/ROTULO MESA C/ANARANJADO   ', '0714', 70, 17, 12, '2022-03-21 10:37:43', 1),
(715, 'CAJA P/TRASLADO DE 4 CAJA DE MATERIAL ELECTORAL (34.50 X 35.00 X 40.00)', '0715', 72, 13, 12, '2022-03-21 10:37:39', 1),
(716, 'ETIQUETA P/ROTULO MESA C/FUCSIA   ', '0716', 70, 17, 12, '2022-03-21 10:37:43', 1),
(717, 'CAJA P/MATERIAL ELECTORAL (32.00 X 33.00 X 9.00 )', '0717', 72, 13, 12, '2022-03-21 10:37:38', 1),
(718, 'ETIQUETA P/ROTULO MESA C/AMARILLO ENCENDIDO   ', '0718', 70, 17, 12, '2022-03-21 10:37:43', 1),
(719, 'CAJA P/MAT ELECTORAL TIPO 2 (42.00 X 32.00 X 9.00 )', '0719', 72, 13, 12, '2022-03-21 10:37:38', 1),
(720, 'ETIQUETA P/ROTULO MESA C/BLANCO   ', '0720', 70, 17, 12, '2022-03-21 10:37:43', 1),
(721, 'ETIQUETA AUTOADHESIVA P/ROTULO ENTERO C/BLANCO HUMO   ', '0721', 70, 17, 12, '2022-03-21 10:37:39', 1),
(722, 'CAJA P/TRASLADO 1 TIPO 2 (34.50 X 44.00 X 10.00)', '0722', 72, 13, 12, '2022-03-21 10:37:38', 1),
(723, 'ETIQUETA AUTOADHESIVA P/ROTULO ENTERO C/AMARILLO ORO   ', '0723', 62, 17, 12, '2022-03-21 10:38:07', 1),
(724, 'ETIQUETA AUTOADHESIVA P/ROTULO ENTERO C/MELON PASTEL   ', '0724', 62, 17, 12, '2022-03-21 10:38:07', 1),
(725, 'CAJA P/TRASLADO 2 TIPO 2 ( 34.50 X 44.00 X 21.00)', '0725', 72, 13, 12, '2022-03-21 10:37:38', 1),
(726, 'CAJA P/TRASLADO 3 TIPO 2 (34.50 X 44.00 X 30.50)', '0726', 72, 13, 12, '2022-03-21 10:37:38', 1),
(727, 'CAJA P/TRASLADO 4 TIPO 2 ( 34.50 X 44.00 X 40.00)', '0727', 72, 13, 12, '2022-03-21 10:37:38', 1),
(728, 'CAJA DE CARTON 15.50 X 47.30 X 27.10 P/IMPRESORA', '0728', 72, 13, 12, '2022-03-21 10:37:38', 1),
(729, 'ETIQUETA AUTOADHESIVA P/ROTULO ENTERO C/VERDE OLIVO   ', '0729', 62, 17, 12, '2022-03-21 10:38:07', 1),
(730, 'CAJA  P/LAPTOP (50 X 30.5 X 7.1)', '0730', 72, 13, 12, '2022-03-21 10:37:38', 1),
(731, 'ETIQUETA AUTOADHESIVA P/ROTULO ENTERO C/MARRON CLARO   ', '0731', 62, 17, 12, '2022-03-21 10:38:07', 1),
(732, 'ETIQUETA AUTOADHESIVA P/ROTULO ENTERO C/ROJO CEREZA', '0732', 62, 17, 12, '2022-03-21 10:38:07', 1),
(733, 'ETIQUETA AUTOADHESIVA P/ROTULO ENTERO C/LILA   ', '0733', 62, 17, 12, '2022-03-21 10:38:07', 1),
(734, 'ETIQUETA AUTOADHESIVA P/ROTULO ENTERO C/VERDE MANZANA   ', '0734', 62, 17, 12, '2022-03-21 10:38:07', 1),
(735, 'ETIQUETA AUTOADHESIVA P/ROTULO ENTERO C/AZUL ACERO   ', '0735', 62, 17, 12, '2022-03-21 10:38:07', 1),
(736, 'ETIQUETA AUTOADHESIVA P/ROTULO ENTERO C/SALMON   ', '0736', 62, 17, 12, '2022-03-21 10:38:07', 1),
(737, 'LAMINA P/PROTECCION DE RESULTADOS 22 x 35 x 1 PZA ', '0737', 62, 13, 12, '2022-03-21 10:38:11', 1),
(738, 'LAMINA P/PROTECCION DE RESULTADOS 20 x 16 x 2 PZA', '0738', 62, 14, 12, '2022-03-21 10:38:11', 1),
(739, 'LAMINA AUTOADHESIVA  10 X 06 CM X 3 PZA P/PROTECCION DE RESULTADOS', '0739', 62, 14, 12, '2022-03-21 10:38:09', 1),
(740, 'FM01-GOECOR/RME FORMATO DE RUTA PARA EL REPLIEGUE DE SOBRES PLOMOS POR ENTREGAR A LA SEDE ODPE', '0740', 66, 6, 12, '2022-03-21 10:37:53', 1),
(741, 'LAMINA P/PROTECCION DE RESULTADOS 10 x 06 x 6 PZA', '0741', 62, 14, 12, '2022-03-21 10:38:10', 1),
(742, 'ROTULO FRONTAL DE CARTEL DE CANDIDATOS SEA - PROV. (SUF)', '0742', 64, 13, 12, '2022-03-21 10:38:01', 1),
(743, 'RIBBON CERA 220 X 450 MTS', '0743', 101, 13, 12, '2022-03-21 10:37:26', 1),
(744, 'LAMINA AUTOADHESIVA 11.5 X 22 CM X 1 PZA P/PROTECCION DE RESULTADOS', '0744', 62, 13, 12, '2022-03-21 10:38:09', 1),
(745, 'HOJAS DE CUTTER 11CM X 1.8CM ', '0745', 11, 13, 12, '2022-03-21 10:52:25', 1),
(746, 'LAMINA  P/PROTECCION DE RESULTADOS 13 X 04 X 2 PZA ', '0746', 62, 14, 12, '2022-03-21 10:38:09', 1),
(747, 'LAMINA P/PROTECCION DE RESULTADOS 13 X 04 X 4 PZA ', '0747', 62, 14, 12, '2022-03-21 10:38:10', 1),
(748, 'LAMINA P/PROTECCIÓN DE RESULTADOS 14 x 12 x 1 PZA ', '0748', 62, 13, 12, '2022-03-21 10:38:11', 1),
(749, 'LAMINA AUTOADHESIVA  15 X 08 CM X 1 PZA P/PROTECCION DE RESULTADOS', '0749', 62, 13, 12, '2022-03-21 10:38:09', 1),
(750, 'LAMINA AUTOADHESIVA  15 X 03 CM X 1 PZA P/PROTECCION DE RESULTADOS', '0750', 62, 13, 12, '2022-03-21 10:38:09', 1),
(751, 'LAMINA AUTOADHESIVA 15 X 03 CM X 2 PZA P/PROTECCION DE RESULTADOS', '0751', 62, 14, 12, '2022-03-21 10:38:09', 1),
(752, 'LAMINA AUTOADHESIVA 15 X 03 CM X 4 PZA P/PROTECCION DE RESULTADOS', '0752', 62, 14, 12, '2022-03-21 10:38:09', 1),
(753, 'LAMINA AUTOADHESIVA  15 X 06  CM X 1 PZA P/PROTECCION DE RESULTADOS', '0753', 62, 13, 12, '2022-03-21 10:38:09', 1),
(754, 'LAMINA P/PROTECCION DE RESULTADOS 15 x 11 x 1 PZA ', '0754', 62, 13, 12, '2022-03-21 10:38:10', 1),
(755, 'LAMINA P/PROTECCION DE RESULTADOS  15 X 11 X 2 PZA', '0755', 62, 14, 12, '2022-03-21 10:38:10', 1),
(756, 'LAMINA P/PROTECCION DE RESULTADOS 15 X 22 X 2 PZA ', '0756', 62, 14, 12, '2022-03-21 10:38:10', 1),
(757, 'LAMINA P/PROTECCION DE RESULTADOS 15 x 08 x 2 PZA ', '0757', 62, 14, 12, '2022-03-21 10:38:10', 1),
(758, 'LAMINA AUTOADHESIVA 17.5 X 18 CM X 1 PZA P/PROTECCION DE RESULTADOS', '0758', 62, 13, 12, '2022-03-21 10:38:09', 1),
(759, 'LAMINA AUTOADHESIVA 18 X 18 CM X 1 PZA P/PROTECCION DE RESULTADOS', '0759', 62, 13, 12, '2022-03-21 10:38:09', 1),
(760, 'LAMINA P/PROTECCION DE RESULTADOS 20 x 03 x 1 PZA', '0760', 62, 13, 12, '2022-03-21 10:38:10', 1),
(761, 'LAMINA P/PROTECCION DE RESULTADOS 20 x 03 x 2 PZA ', '0761', 62, 14, 12, '2022-03-21 10:38:10', 1),
(762, 'LAMINA P/PROTECCION DE RESULTADOS 20 x 03 x 4 PZA ', '0762', 62, 14, 12, '2022-03-21 10:38:11', 1),
(763, 'LAMINA AUTOADHESIVA  20 X 05 CM X 1 PZA P/PROTECCION DE RESULTADOS', '0763', 62, 13, 12, '2022-03-21 10:38:09', 1),
(764, 'LAMINA P/PROTECCION DE RESULTADOS 20 x 05 x 3 PZA ', '0764', 62, 14, 12, '2022-03-21 10:38:11', 1),
(765, 'LAMINA AUTOADHESIVA 20 X 5.5 CM X 8 PZA P/PROTECCION DE RESULTADOS', '0765', 62, 14, 12, '2022-03-21 10:38:09', 1),
(766, 'LAMINA AUTOADHESIVA 20 X 06 CM X 1 PZA P/PROTECCION DE RESULTADOS', '0766', 62, 13, 12, '2022-03-21 10:38:09', 1),
(767, 'LAMINA P/PROTECCION DE RESULTADOS 20 x 16 x 1 PZA', '0767', 62, 13, 12, '2022-03-21 10:38:11', 1),
(768, 'ALCOHOL GEL (GLN)', '0768', 33, 5, 12, '2022-03-21 10:37:33', 1),
(769, 'LAMINA P/PROTECCION DE RESULTADOS 22 X 03  X 1 PZA', '0769', 62, 13, 12, '2022-03-21 10:38:11', 1),
(770, 'LAMINA AUTOADHESIVA 22 X 05 CM X 1 PZA P/PROTECCION DE RESULTADOS', '0770', 62, 13, 12, '2022-03-21 10:38:09', 1),
(771, 'LAMINA AUTOADHESIVA 22 X 09 CM X 1 PZA P/PROTECCION DE RESULTADOS', '0771', 62, 13, 12, '2022-03-21 10:38:10', 1),
(772, 'LAMINA AUTOADHESIVA 23 X 03 CM X 5 PZA P/PROTECCION DE RESULTADOS', '0772', 62, 14, 12, '2022-03-21 10:38:10', 1),
(773, 'LAMINA  P/PROTECCION DE RESULTADOS 24.5 X 4.5 X 5 PZA', '0773', 62, 14, 12, '2022-03-21 10:38:09', 1),
(774, 'LAMINA AUTOADHESIVA 26 X 02 CM X 1 PZA P/PROTECCION DE RESULTADOS', '0774', 62, 13, 12, '2022-03-21 10:38:10', 1),
(775, 'LAMINA P/PROTECCION DE RESULTADOS 26 X 06 X 3 PZA ', '0775', 62, 14, 12, '2022-03-21 10:38:11', 1),
(776, 'LAMINA P/PROTECCIÓN DE RESULTADOS 26 X 04 X 6 PZA ', '0776', 62, 14, 12, '2022-03-21 10:38:11', 1),
(777, 'LAMINA AUTOADHESIVA 32cmX7cmX4pza P/PROTECCION DE RESULTADOS', '0777', 62, 14, 12, '2022-03-21 10:38:10', 1),
(778, 'ETIQUETAS CENTRO DE ACOPIO (ANFORA) PROV.', '0778', 62, 13, 12, '2022-03-21 10:38:08', 1),
(779, 'TONER NEGRO P/IMPRESORA HP LASER JET P2055', '0779', 14, 13, 12, '2022-03-21 10:52:19', 1),
(780, 'PARIHUELA D/ PLASTICO C/NEGRO 16.5CM X 1.00CM X 1.20CM ', '0780', 43, 13, 12, '2022-03-21 10:52:16', 1),
(781, 'CARRETILLA HIDRAULICA', '0781', 43, 13, 12, '2022-03-21 10:52:16', 1),
(782, 'JERINGA DESCARTABLE ESTERIL 5ML', '0782', 21, 13, 12, '2022-03-21 10:38:24', 1),
(783, 'VENDA ELASTICA 5\" X 5YRD.', '0783', 21, 13, 12, '2022-03-21 10:38:25', 1),
(784, 'VENDA ELASTICA 3\" x 5YRD.', '0784', 21, 13, 12, '2022-03-21 10:38:25', 1),
(785, 'MESA METALICA RODABLE PARA CURACION', '0785', 22, 13, 12, '2022-03-21 10:38:28', 1),
(786, 'SILLA DE RUEDAS METALICA', '0786', 22, 13, 12, '2022-03-21 10:38:28', 1),
(787, 'BALON DE OXIGENO', '0787', 22, 13, 12, '2022-03-21 10:38:26', 1),
(788, 'COCHE PARA BALON DE OXIGENO', '0788', 22, 13, 12, '2022-03-21 10:38:26', 1),
(789, 'DESFIBRILADOR', '0789', 22, 13, 12, '2022-03-21 10:38:27', 1),
(790, 'RESUCITADOR', '0790', 22, 13, 12, '2022-03-21 10:38:28', 1),
(791, 'TENSIOMETRO  DIGITAL', '0791', 22, 13, 12, '2022-03-21 10:38:28', 1),
(792, 'KETOROLACO 10MG', '0792', 21, 13, 12, '2022-03-21 10:38:24', 1),
(793, 'OMEPRAZOL 20 MG', '0793', 21, 13, 12, '2022-03-21 10:38:24', 1),
(794, 'ESPARADRAPO 2\" X 10 YRD.', '0794', 21, 13, 12, '2022-03-21 10:38:23', 1),
(795, 'COLLARIN CERVICAL', '0795', 22, 13, 12, '2022-03-21 10:38:27', 1),
(796, 'AEROCAMARA ADULTO', '0796', 22, 13, 12, '2022-03-21 10:38:25', 1),
(797, 'MASCARA DE OXIGENO T/XL (ADULTO GRAND)', '0797', 22, 13, 12, '2022-03-21 10:38:28', 1),
(798, 'MASCARA DE OXIGENO T/XS (NEONATO)', '0798', 22, 13, 12, '2022-03-21 10:38:28', 1),
(799, 'CANULA NASAL DE OXIGENO', '0799', 22, 13, 12, '2022-03-21 10:38:26', 1),
(800, 'EQUIPO DE INFUSION DESECHABLE', '0800', 22, 13, 12, '2022-03-21 10:38:27', 1),
(801, 'PAPEL BOND A4 BLANCO P/ PRUEBA DE IMPRESIÓN', '0801', 13, 13, 12, '2022-03-21 10:52:17', 1),
(802, 'ESPATULA', '0802', 47, 13, 12, '2022-03-21 10:38:40', 1),
(803, 'TIJERA', '0803', 11, 13, 12, '2022-03-21 10:52:28', 1),
(804, 'MANIJA P/ESCRITORIO NEGRO', '0804', 48, 13, 12, '2022-03-21 10:38:37', 1),
(805, 'PAQUETE DE CONTINGENCIA', '0805', 123, 3, 12, '2022-03-21 10:38:22', 1),
(806, 'COLLARIN IMOVILIZADOR T/L', '0806', 22, 13, 12, '2022-03-21 10:38:27', 1),
(807, 'MOCHILA DE EMERGENCIA', '0807', 22, 13, 12, '2022-03-21 10:38:28', 1),
(808, 'CHALECO AMARILLO FOSFORESCENTE ', '0808', 22, 13, 12, '2022-03-21 10:38:26', 1),
(809, 'ETIQUETA AUTOADHESIVA TERMICA PARA LA STOCKA CON BALANZA', '0809', 74, 17, 12, '2022-03-21 10:37:44', 1),
(810, 'RANITIDINA 300 MG', '0810', 21, 13, 12, '2022-03-21 10:38:25', 1),
(811, 'AMOXICILINA 500 MG', '0811', 21, 13, 12, '2022-03-21 10:38:22', 1),
(812, 'SUBSALICITATO DE BISMUTO 262.5 MG', '0812', 21, 13, 12, '2022-03-21 10:38:25', 1),
(813, 'IBUPROFENO 400 MG', '0813', 21, 13, 12, '2022-03-21 10:38:23', 1),
(814, 'SALES DE HIDRATACION ORAL ', '0814', 21, 13, 12, '2022-03-21 10:38:25', 1),
(815, 'RANITIDINA 50MG. / 2ML (AMPOLLAS)', '0815', 21, 13, 12, '2022-03-21 10:38:25', 1),
(816, 'DIMENHIDRINATO 50MG', '0816', 21, 13, 12, '2022-03-21 10:38:23', 1),
(817, 'DIMENHIDRINATO 50MG./5ML. (AMPOLLAS)', '0817', 21, 13, 12, '2022-03-21 10:38:23', 1),
(818, 'FENAZOPIRIDINA 100MG', '0818', 21, 13, 12, '2022-03-21 10:38:23', 1),
(819, 'FUROSEMIDA 20MG/2ML (AMPOLLAS)', '0819', 21, 13, 12, '2022-03-21 10:38:23', 1),
(820, 'NEOENZIMAX  100 CAPSULA', '0820', 21, 13, 12, '2022-03-21 10:38:24', 1),
(821, 'ACICLOVIR 5MG. (CREMA)', '0821', 21, 13, 12, '2022-03-21 10:38:22', 1),
(822, 'CAPTOPRIL', '0822', 21, 13, 12, '2022-03-21 10:38:22', 1),
(823, 'MUPIROCINA 2% / 20MG (CREMA)', '0823', 21, 13, 12, '2022-03-21 10:38:24', 1),
(824, 'NAPROXENO SODICO 550MG', '0824', 21, 13, 12, '2022-03-21 10:38:24', 1),
(825, 'CIPROFLOXACINO0,3/DEXAMETASONA0,1(GOTAS)', '0825', 21, 13, 12, '2022-03-21 10:38:22', 1),
(826, 'DINITRATO DE ISOSORBIDA 5MG', '0826', 21, 13, 12, '2022-03-21 10:38:23', 1),
(827, 'SIMETICONA 80MG', '0827', 21, 13, 12, '2022-03-21 10:38:25', 1),
(828, 'BANDEJA DESCARTABLE PARA DNI', '0828', 61, 13, 12, '2022-03-21 10:38:16', 1),
(829, 'PAPEL BOND A4 80gr', '0829', 13, 16, 12, '2022-03-21 10:52:17', 1),
(830, 'DICLOFENACO 1% / 50MG. (GEL)', '0830', 21, 13, 12, '2022-03-21 10:38:23', 1),
(831, 'DICLOFENACO 2% / 50MG. (GEL)', '0831', 21, 13, 12, '2022-03-21 10:38:23', 1),
(832, 'ORFENADRINA CITRATO 60MG/2ML (AMPLLS)', '0832', 21, 13, 12, '2022-03-21 10:38:24', 1),
(833, 'DICLOFENACO 50MG', '0833', 21, 13, 12, '2022-03-21 10:38:23', 1),
(834, 'METAMIZOL SODICO 500MG.', '0834', 21, 13, 12, '2022-03-21 10:38:24', 1),
(835, 'TRAMADOL 50MG', '0835', 21, 13, 12, '2022-03-21 10:38:25', 1),
(836, 'PARACETAMOL 500MG', '0836', 21, 13, 12, '2022-03-21 10:38:24', 1),
(837, 'MULTIMYCIN UNGÜENTO 14MG', '0837', 21, 13, 12, '2022-03-21 10:38:24', 1),
(838, 'ESTETOSCOPIO', '0838', 22, 13, 12, '2022-03-21 10:38:27', 1),
(839, 'BIOMBO DE MADERA', '0839', 22, 13, 12, '2022-03-21 10:38:26', 1),
(840, 'FERULAS DE AIRE DE EMERGENCIA ', '0840', 22, 13, 12, '2022-03-21 10:38:27', 1),
(841, 'RECIPIENTE DE METAL', '0841', 22, 13, 12, '2022-03-21 10:38:28', 1),
(842, 'RIÑONERA', '0842', 22, 13, 12, '2022-03-21 10:38:28', 1),
(843, 'TAMBOR', '0843', 22, 13, 12, '2022-03-21 10:38:28', 1),
(844, 'BANDEJA PARA INSTRUMENTO', '0844', 22, 13, 12, '2022-03-21 10:38:26', 1),
(845, 'PINZA DE PRECISION ', '0845', 22, 13, 12, '2022-03-21 10:38:28', 1),
(846, 'PINZA QUIRURGICA', '0846', 22, 13, 12, '2022-03-21 10:38:28', 1),
(847, 'MANGO DE BISTURI', '0847', 22, 13, 12, '2022-03-21 10:38:27', 1),
(848, 'BARILLA ', '0848', 22, 13, 12, '2022-03-21 10:38:26', 1),
(849, 'PORTA AGUJA MAYO HEGAR 14 CM', '0849', 22, 13, 12, '2022-03-21 10:38:28', 1),
(850, 'PINZA CRILE 14 CM RECTA', '0850', 22, 13, 12, '2022-03-21 10:38:28', 1),
(851, 'FORCEPS', '0851', 22, 13, 12, '2022-03-21 10:38:27', 1),
(852, 'GASA ESTERIL 10X10CM.', '0852', 21, 13, 12, '2022-03-21 10:38:23', 1),
(853, 'BAJALENGUAS', '0853', 21, 13, 12, '2022-03-21 10:38:22', 1),
(854, 'CURITAS ESTERIL', '0854', 21, 13, 12, '2022-03-21 10:38:23', 1),
(855, 'POVIDONA YODADA 10% / 1000ML.', '0855', 21, 13, 12, '2022-03-21 10:38:24', 1),
(856, 'JERINGA ESTERIL 20ML/CC', '0856', 21, 13, 12, '2022-03-21 10:38:24', 1),
(857, 'CONTENEDOR DE POLIETILENO', '0857', 43, 13, 12, '2022-03-21 10:52:16', 1),
(858, 'CLORFENAMINA MALEATO 4MG', '0858', 21, 13, 12, '2022-03-21 10:38:22', 1),
(859, 'MELOXICAN 15MG', '0859', 21, 13, 12, '2022-03-21 10:38:24', 1),
(860, 'PREDNISONA 20MG', '0860', 21, 13, 12, '2022-03-21 10:38:25', 1),
(861, 'LOPERAMIDA 2MG', '0861', 21, 13, 12, '2022-03-21 10:38:24', 1),
(862, 'PREDNISONA 50MG', '0862', 21, 13, 12, '2022-03-21 10:38:25', 1),
(863, 'AZITROMICINA 500MG', '0863', 21, 13, 12, '2022-03-21 10:38:22', 1),
(864, 'DICLOXACILINA 500MG ', '0864', 21, 13, 12, '2022-03-21 10:38:23', 1),
(865, 'CIPROFLOXACINO 500MG', '0865', 21, 13, 12, '2022-03-21 10:38:22', 1),
(866, 'CLINDAMICINA 300MG', '0866', 21, 13, 12, '2022-03-21 10:38:22', 1),
(867, 'ERITROMICINA ESTEARATO 500MG', '0867', 21, 13, 12, '2022-03-21 10:38:23', 1),
(868, 'MIGRALIVIA', '0868', 21, 13, 12, '2022-03-21 10:38:24', 1),
(869, 'SALBUTAMOL AEROSOL 100MCG', '0869', 21, 13, 12, '2022-03-21 10:38:25', 1),
(870, 'SUMATRIPTAN/NAPROXENO 85MG/500MG', '0870', 21, 13, 12, '2022-03-21 10:38:25', 1),
(871, 'DICLOFENACO 75MG/3ML. (AMPOLLAS)', '0871', 21, 13, 12, '2022-03-21 10:38:23', 1),
(872, 'DEXAMETASONA 4MG/2ML (AMPOLLAS)', '0872', 21, 13, 12, '2022-03-21 10:38:23', 1),
(873, 'AGUA ESTERIL (AMPOLLAS)', '0873', 21, 13, 12, '2022-03-21 10:38:22', 1),
(874, 'METOCL CLORHID 10MG/2ML (AMPOLLAS)', '0874', 21, 13, 12, '2022-03-21 10:38:24', 1),
(875, 'BISTURI', '0875', 22, 13, 12, '2022-03-21 10:38:26', 1),
(876, 'AGUJA SEDA NEGRA TRENZADA ', '0876', 21, 13, 12, '2022-03-21 10:38:22', 1),
(877, 'AGUJA NYLON AZUL MONOFILAMENTO', '0877', 21, 13, 12, '2022-03-21 10:38:22', 1),
(878, 'CATETER INTRAVENOSO 20X1 1/4\"', '0878', 21, 13, 12, '2022-03-21 10:38:22', 1),
(879, 'CLORURO DE SODIO 0,9% 100ML', '0879', 21, 13, 12, '2022-03-21 10:38:23', 1),
(880, 'MULETA DE MADERA', '0880', 22, 13, 12, '2022-03-21 10:38:28', 1),
(881, 'ESCALERA METALICA', '0881', 22, 13, 12, '2022-03-21 10:38:27', 1),
(882, 'CAMA DE MADERA  Y MADERAS', '0882', 22, 13, 12, '2022-03-21 10:38:26', 1),
(883, 'COLCHON', '0883', 22, 13, 12, '2022-03-21 10:38:27', 1),
(884, 'BUSCAPINA HIOSCINA N-BUTILBROMURO10MG/PARACETAMOL 500MG', '0884', 21, 13, 12, '2022-03-21 10:38:22', 1),
(885, 'JERINGA DESCARTABLE ESTERIL 1ML', '0885', 21, 13, 12, '2022-03-21 10:38:24', 1),
(886, 'MUCOASMAT SOBRE PO 2MG', '0886', 21, 13, 12, '2022-03-21 10:38:24', 1),
(887, 'TENSIOMETRO MANUAL', '0887', 22, 13, 12, '2022-03-21 10:38:28', 1),
(888, 'DOLODRAN EXTRA FORTE DICLOFENACO 50MG /PARACETAMOL 500MG', '0888', 21, 13, 12, '2022-03-21 10:38:23', 1),
(889, 'VIGA DE METAL - 2 TONELADAS', '0889', 44, 13, 12, '2022-03-21 10:38:33', 1),
(890, 'BOTIQUIN', '0890', 22, 13, 12, '2022-03-21 10:38:26', 1),
(891, 'FORMATERIA', '0891', 123, 3, 12, '2022-03-21 10:38:21', 1),
(892, 'BALDAS DE METAL', '0892', 44, 13, 12, '2022-03-21 10:38:33', 1),
(893, 'ANFORA DE CONTIGENCIA', '0893', 123, 3, 12, '2022-03-21 10:38:21', 1),
(894, 'ALMOHADILLA SEPARADORA PARA FUJITSU ', '0894', 12, 13, 12, '2022-03-21 10:52:19', 1),
(895, 'JUEGO DE RODILLO P/ FUJITSU (PICK ROLLER)', '0895', 12, 13, 12, '2022-03-21 10:52:20', 1),
(896, 'RODILLO DE FRENO P/ FUJITSU (BRAKE ROLLER)', '0896', 12, 13, 12, '2022-03-21 10:52:20', 1),
(897, 'RODILLO P/ PAPEL P/ FUJITSU (SEPARADOR ROLLER)', '0897', 12, 13, 12, '2022-03-21 10:52:20', 1),
(898, 'VASOS BIODEGRADABLE x50', '0898', 51, 11, 12, '2022-03-21 10:37:27', 1),
(899, 'CUCHARITAS BIODEGRADABLES x100', '0899', 51, 13, 12, '2022-03-21 10:37:27', 1),
(900, 'THINNER ACRILICO x1LT', '0900', 33, 8, 12, '2022-03-21 10:37:35', 1),
(901, 'FRANELA AMARILLA 70 CM', '0901', 33, 9, 12, '2022-03-21 10:37:34', 1),
(902, 'PERNO DE EXPANSION 1/2 x 4', '0902', 47, 13, 12, '2022-03-21 10:38:43', 1),
(903, 'MANGUERA CONTRA INCENDIOS', '0903', 47, 18, 12, '2022-03-21 10:38:42', 1),
(904, 'GARRUCHA FIJA 4', '0904', 47, 18, 12, '2022-03-21 10:38:40', 1),
(905, 'TARUGO D/MADERA 1/4', '0905', 47, 13, 12, '2022-03-21 10:38:45', 1),
(906, 'TARUGO DE PVC DE 1/2 GRIS', '0906', 47, 13, 12, '2022-03-21 10:38:45', 1),
(907, 'TARUGO DE PVC DE 5/8 NEGRO', '0907', 47, 13, 12, '2022-03-21 10:38:45', 1),
(908, 'WINCHA METRICA ', '0908', 47, 13, 12, '2022-03-21 10:38:49', 1),
(909, 'BROCA PARA CONCRETO SDS PLUS 1/2 TRUPER', '0909', 47, 13, 12, '2022-03-21 10:38:38', 1),
(910, 'BROCA PARA CONCRETO SDS PLUS 1/4 TRUPER', '0910', 47, 13, 12, '2022-03-21 10:38:38', 1),
(911, 'BROCA PARA CONCRETO SDS PLUS 3/8 TRUPER', '0911', 47, 13, 12, '2022-03-21 10:38:38', 1),
(912, 'CANDADO DE 70mm ARCO S8 F-70 FORTE', '0912', 47, 13, 12, '2022-03-21 10:38:38', 1),
(913, 'CERRADURA MECANICA DE 3GOLPES FORTE BLINDADO 900', '0913', 47, 13, 12, '2022-03-21 10:38:39', 1),
(914, 'CERRADURA PARA LOCKER TIPO LENGUETA LARGA CON LLAVES', '0914', 47, 13, 12, '2022-03-21 10:38:39', 1),
(915, 'DISCO DE CORTE PARA FIERRO DE 7- NORTON', '0915', 47, 13, 12, '2022-03-21 10:38:40', 1),
(916, 'LIJA CIRCULAR PARA PULIR DE 7- NORTON', '0916', 47, 13, 12, '2022-03-21 10:38:41', 1),
(917, 'LLAVE CORONA MIXTA 1/2 STANLEY', '0917', 47, 13, 12, '2022-03-21 10:38:41', 1),
(918, 'ROLLO MALLA RASCHEL NEGRO/VERDE  ', '0918', 47, 17, 12, '2022-03-21 10:38:45', 1),
(919, 'GARRUCHA FIJA 3 PULGADAS', '0919', 47, 18, 12, '2022-03-21 10:38:40', 1),
(920, 'PARANTE ORDENADOR DE FILA', '0920', 43, 18, 12, '2022-03-21 10:52:16', 1),
(921, 'TONER NEGRO P/IMPRESORA SHARP MX561NT', '0921', 14, 13, 12, '2022-03-21 10:52:19', 1),
(922, 'CAJA ORGANIZADORA PLASTICO Nro50', '0922', 11, 13, 12, '2022-03-21 10:52:22', 1),
(923, 'STRETCH FILM 20', '0923', 73, 17, 12, '2022-03-21 10:37:39', 1),
(924, 'RESPIRADOR AMRLL CHEMICAL NP 305 CON FLITRO', '0924', 32, 18, 12, '2022-03-21 10:37:30', 1),
(925, 'CREDENZA DE METAL', '0925', 43, 13, 12, '2022-03-21 10:52:16', 1),
(926, 'TELEVISOR LED ', '0926', 42, 18, 12, '2022-03-21 10:38:33', 1),
(927, 'RACK DE TV', '0927', 42, 18, 12, '2022-03-21 10:38:32', 1),
(928, 'GABINETE', '0928', 12, 13, 12, '2022-03-21 10:52:20', 1),
(929, 'BOLSA P/MIEMBRO DE MESA DE BIOSEGURIDAD ROJA (20x29)', '0929', 71, 1, 12, '2022-03-21 10:37:37', 1),
(930, 'CARGADOR APILADOR MANUAL', '0930', 43, 13, 12, '2022-03-21 10:52:15', 1),
(931, 'CARRETILLA EN GENERAL', '0931', 43, 18, 12, '2022-03-21 10:52:16', 1),
(932, 'CARRO DE METAL TRANSPORTADOR', '0932', 43, 18, 12, '2022-03-21 10:52:16', 1),
(933, 'ESCALERA D/ METAL DE 4 PELDAÑOS', '0933', 41, 18, 12, '2022-03-21 10:38:34', 1),
(934, 'PIZARRA DE CORCHO', '0934', 11, 18, 12, '2022-03-21 10:52:26', 1),
(935, 'CARRETILLA HIDRAULICA CON BALANZA', '0935', 42, 18, 12, '2022-03-21 10:38:29', 1),
(936, 'SOBRE MANILA A4 (24X34CM)', '0936', 11, 13, 12, '2022-03-21 10:52:28', 1),
(937, 'ENCHUFE TOMACORRIENTE', '0937', 45, 18, 12, '2022-03-21 10:47:20', 1),
(938, 'CABLE DE EXTENSION DE 1 TOMA X 1.20 MT.', '0938', 45, 13, 12, '2022-03-21 10:38:51', 1),
(939, 'FOLDER DE MANILA A4', '0939', 11, 13, 12, '2022-03-21 10:52:25', 1),
(940, 'LAMINA P/PROTECCION DE RESULTADOS 26 x 06 x 1 PZA', '0940', 62, 13, 12, '2022-03-21 10:38:11', 1),
(941, 'CARGADOR DE ATORNILLADOR INALAMBRICO', '0941', 47, 18, 12, '2022-03-21 10:38:39', 1),
(942, 'DESARMADOR TIPO ESTRELLA GRANDE 6 PULGADAS', '0942', 47, 18, 12, '2022-03-21 10:38:39', 1),
(943, 'GUANTES DE NITRILO T-L PARES', '0943', 32, 12, 12, '2022-03-21 10:37:29', 1),
(944, 'ROTULO MATERIAL P/CLV', '0944', 64, 13, 12, '2022-03-21 10:38:04', 1),
(945, 'ROTULO MATERIAL P/CLV SEA', '0945', 64, 13, 12, '2022-03-21 10:38:04', 1),
(946, 'BIDONES DE AGUA AZUL ', '0946', 33, 13, 12, '2022-03-21 10:37:33', 1),
(947, 'REFLECTOR TIPO CAMPANA 250 WTS', '0947', 45, 13, 12, '2022-03-21 10:52:14', 1),
(948, 'PALO DE ESCOBA DE METAL - REPUESTO', '0948', 33, 13, 12, '2022-03-21 10:37:35', 1),
(949, 'MANGO DE ALUMNIO BLANCO', '0949', 33, 13, 12, '2022-03-21 10:37:34', 1),
(950, 'JALADOR DE AGUA', '0950', 33, 13, 12, '2022-03-21 10:37:34', 1),
(951, 'REFLECTOR IP66 - 100W', '0951', 45, 13, 12, '2022-03-21 10:52:14', 1),
(952, 'ROTULO HOJAS PRUEBA DE IMPRESION SEA', '0952', 64, 13, 12, '2022-03-21 10:38:04', 1),
(953, 'HOJAS DE CUCHILLA STANLEY', '0953', 11, 13, 12, '2022-03-21 10:52:25', 1),
(954, 'BANDEJA PARA RODILLO DE PINTURA', '0954', 47, 13, 12, '2022-03-21 10:38:38', 1),
(955, 'BROCHA 4\"', '0955', 47, 13, 12, '2022-03-21 10:38:38', 1),
(956, 'BROCHA 2 1/2\"', '0956', 47, 13, 12, '2022-03-21 10:38:38', 1),
(957, 'PINTURA EN SPRAY X 400 ML C/ALUMINIO', '0957', 47, 13, 12, '2022-03-21 10:38:44', 1),
(958, 'GRAPA DE METAL PARA ZUNCHO', '0958', 47, 13, 12, '2022-03-21 10:38:41', 1),
(959, 'ALGODON HIDROFILICO 250 GR', '0959', 21, 13, 12, '2022-03-21 10:38:22', 1),
(960, 'HISOPO PLASTICO X 100 UND', '0960', 21, 13, 12, '2022-03-21 10:38:23', 1),
(961, 'CERRADURA PARA ESCRITORIO O MUEBLE', '0961', 47, 13, 12, '2022-03-21 10:38:39', 1),
(962, 'BISAGRA AJUSTABLE DE 2 TIEMPOS', '0962', 47, 13, 12, '2022-03-21 10:38:38', 1),
(963, 'PELACABLE', '0963', 47, 13, 12, '2022-03-21 10:38:43', 1),
(964, 'PINTURA FAST BLANCO HUMO', '0964', 47, 13, 12, '2022-03-21 10:38:44', 1),
(965, 'FRANELA ROJA 70 CM', '0965', 33, 9, 12, '2022-03-21 10:37:34', 1),
(966, 'SILICONA EN BARRA DELGADA', '0966', 47, 13, 12, '2022-03-21 10:38:45', 1),
(967, 'GARRUCHA GIRATORIA  8 S/LLANTA', '0967', 47, 18, 12, '2022-03-21 10:38:40', 1),
(968, 'BARRA P/ CONO DE SEGURIDAD', '0968', 32, 13, 12, '2022-03-21 10:37:28', 1),
(969, 'JUEGO DE RODILLO PARA FUJITSU (PAD)', '0969', 12, 13, 12, '2022-03-21 10:52:20', 1),
(970, 'CABLE DE EXTENSION DE 15 MTS', '0970', 41, 13, 12, '2022-03-21 10:38:34', 1),
(971, 'CABLE DE EXTENSION DE 12 MTS', '0971', 41, 13, 12, '2022-03-21 10:38:34', 1),
(972, 'EQUIPO DE ALARMA Y PROTECCION', '0972', 45, 18, 12, '2022-03-21 10:47:20', 1),
(973, 'REFLECTOR DE EMERGENCIA', '0973', 45, 18, 12, '2022-03-21 10:52:14', 1),
(974, 'MULTIMETRO - MULTITESTER', '0974', 45, 18, 12, '2022-03-21 10:51:56', 1),
(975, 'COMPRESORA DE AIRE', '0975', 45, 18, 12, '2022-03-21 10:47:20', 1),
(976, 'TALADRO ELECTRICO PORTATIL', '0976', 41, 18, 12, '2022-03-21 10:38:36', 1),
(977, 'MAQUINA ENZUNCHADORA', '0977', 48, 18, 12, '2022-03-21 10:38:37', 1),
(978, 'CAPTURADOR DE IMAGEN  - FUJITSU', '0978', 42, 18, 12, '2022-03-21 10:38:29', 1),
(979, 'CAPTURADOR DE IMAGEN OFICINA - HP', '0979', 42, 18, 12, '2022-03-21 10:38:29', 1),
(980, 'CONTROL DE ACCESO BIOMETRICO', '0980', 42, 18, 12, '2022-03-21 10:38:29', 1),
(981, 'REFLECTOR CON TRIPODE', '0981', 42, 18, 12, '2022-03-21 10:38:32', 1),
(982, 'REFRIGERADORA ELECTRICA DOMESTICA', '0982', 45, 18, 12, '2022-03-21 10:52:14', 1),
(983, 'BIOMBO DE METAL', '0983', 22, 18, 12, '2022-03-21 10:38:26', 1),
(984, 'ESCALERA D/ METAL DE 2 PELDAÑOS', '0984', 47, 18, 12, '2022-03-21 10:38:40', 1),
(985, 'TERMO METALICO', '0985', 45, 18, 12, '2022-03-21 10:52:15', 1),
(986, 'PAQUETE TOPICO ', '0986', 21, 11, 12, '2022-03-21 10:38:24', 1),
(987, 'CAJON DE MASCARILLA X 40 CJAS ', '0987', 21, 4, 12, '2022-03-21 10:38:22', 1),
(988, 'REPISA DE MELAMINA', '0988', 43, 18, 12, '2022-03-21 10:52:16', 1),
(989, 'STAND DE MADERA', '0989', 43, 18, 12, '2022-03-21 10:52:17', 1),
(990, 'SOFA DE MADERA', '0990', 22, 18, 12, '2022-03-21 10:38:28', 1),
(991, 'CAMILLA PARA EXAMEN GINECOLOGICO', '0991', 22, 18, 12, '2022-03-21 10:38:26', 1),
(992, 'GARRUCHA GIRATORIA 3  C/LLANTA CAUCHO', '0992', 47, 18, 12, '2022-03-21 10:38:41', 1),
(993, 'PINTURA TRAFICO AMARILLO ACRILICO RESINA', '0993', 47, 5, 12, '2022-03-21 10:38:44', 1),
(994, 'PINTURA SINCROMATO BASE COLOR VERDE', '0994', 47, 5, 12, '2022-03-21 10:38:44', 1),
(995, 'TEROKAL TECKNO', '0995', 47, 5, 12, '2022-03-21 10:38:46', 1),
(996, 'PINTURA TRAFICO AZUL ACRILICO RESINA', '0996', 47, 5, 12, '2022-03-21 10:38:44', 1),
(997, 'SEÑAL PROHIBIDO EL USO DE CELULARES (PLASTIFICADA)', '0997', 83, 13, 12, '2022-03-21 10:37:50', 1),
(998, 'SEÑAL DE PROHIBIDO FUMAR (PLASTIFICADA)', '0998', 83, 13, 12, '2022-03-21 10:37:49', 1),
(999, 'SEÑAL DE PROHIBIDO EL PASO (PLASTIFICADA)', '0999', 83, 13, 12, '2022-03-21 10:37:49', 1),
(1000, 'SEÑAL DE RUTA PARA PERSONAS CON DISCAPACIDAD (PLASTIFICADA)', '1000', 83, 13, 12, '2022-03-21 10:37:50', 1),
(1001, 'SEÑAL PARA EL BAÑO DE HOMBRES (PLASTIFICADA)', '1001', 83, 13, 12, '2022-03-21 10:37:50', 1),
(1002, 'SEÑAL PARA EL BAÑO DE MUJERES (PLASTIFICADA)', '1002', 83, 13, 12, '2022-03-21 10:37:50', 1),
(1003, 'SEÑAL PARA EL CENTRO DE ACOPIO (PLASTIFICADA)', '1003', 83, 13, 12, '2022-03-21 10:37:50', 1),
(1004, 'SEÑAL DE POLITICA DE CALIDAD (PLASTIFICADA)', '1004', 83, 13, 12, '2022-03-21 10:37:49', 1),
(1005, 'SEÑAL DE POLITICA DE SEGURIDAD DE LA INFORMACION PLASTIFICADA', '1005', 83, 13, 12, '2022-03-21 10:37:49', 1),
(1006, 'SEÑAL DE POLITICA INSTITUCION 5S PLASTIFICADA', '1006', 83, 13, 12, '2022-03-21 10:37:49', 1),
(1007, 'SEÑAL VISION Y MISION ONPE (PLASTIFICADA)', '1007', 83, 13, 12, '2022-03-21 10:37:50', 1),
(1008, 'ESPONJA CELULOSA', '1008', 33, 13, 12, '2022-03-21 10:37:34', 1),
(1009, 'CABLE ELECTRICO VULCANIZADO 3 X 12 AWG', '1009', 45, 17, 12, '2022-03-21 10:47:19', 1),
(1010, 'CABLE ELECTRICO VULCANIZADO 3 X 14 AWG', '1010', 45, 17, 12, '2022-03-21 10:38:51', 1),
(1011, 'WINCHA PASACABLE DE 20 MT', '1011', 45, 18, 12, '2022-03-21 10:52:15', 1),
(1012, 'CONECTOR JACK RJ 45 CAT 6', '1012', 45, 18, 12, '2022-03-21 10:47:20', 1),
(1013, 'CABLE UTP (CAT 6)  DE 1 MT. ', '1013', 45, 4, 12, '2022-03-21 10:47:19', 1),
(1014, 'CABLE UTP (CAT 5-E) DE 2.1 MT.', '1014', 45, 4, 12, '2022-03-21 10:47:19', 1),
(1015, 'CAJA DE PASE ADOSABLE 20X20X10.', '1015', 45, 18, 12, '2022-03-21 10:47:19', 1),
(1016, 'CABLE CONECTOR RJ45 CAT 5E', '1016', 45, 4, 12, '2022-03-21 10:38:51', 1),
(1017, 'WINCHA PASACABLE DE 15 M', '1017', 45, 18, 12, '2022-03-21 10:52:15', 1),
(1018, 'CANALETA DE PVC DE 60 MM X 40 MM X 2M', '1018', 45, 18, 12, '2022-03-21 10:47:20', 1),
(1019, 'CINTA ADHESIVA DE TELA PARA DUCTO 2\"', '1019', 45, 18, 12, '2022-03-21 10:47:20', 1),
(1020, 'TAPA PARA ENCHUFE DE 2 TOMAS', '1020', 45, 18, 12, '2022-03-21 10:52:15', 1),
(1021, 'PATCH CORD CAT 6 X 2M', '1021', 45, 13, 12, '2022-03-21 10:51:56', 1),
(1022, 'PATCH CORD CAT 6 X 3M', '1022', 45, 13, 12, '2022-03-21 10:51:56', 1),
(1023, 'ETIQUETA AUTOADHESIVA LOGO ONPE', '1023', 62, 13, 12, '2022-03-21 10:38:07', 1),
(1024, 'ETIQUETA AUTOADHESIVA TU DECIDES CON TU VOTO', '1024', 62, 13, 12, '2022-03-21 10:38:08', 1),
(1025, 'PLUMON P/PIZARRA - AZUL', '1025', 11, 18, 12, '2022-03-21 10:52:27', 1),
(1026, 'PLUMON P/PIZARRA - NEGRO', '1026', 11, 18, 12, '2022-03-21 10:52:27', 1),
(1027, 'PLUMON P/PIZARRA  - ROJO', '1027', 11, 18, 12, '2022-03-21 10:52:27', 1),
(1028, 'PEGAMENTO LIQUIDO 250 GR ', '1028', 11, 2, 12, '2022-03-21 10:52:26', 1),
(1029, 'PEGAMENTO EN BARRA X 40 GR', '1029', 11, 18, 12, '2022-03-21 10:52:26', 1),
(1030, 'PLUMON GRUESO P/PAPEL C/ NEGRO', '1030', 11, 18, 12, '2022-03-21 10:52:26', 1),
(1031, 'RESALTADOR AMARILLO', '1031', 11, 18, 12, '2022-03-21 10:52:27', 1),
(1032, 'DISPENSADOR DE CINTA PEQUEÑO DE 1/2 -  3/4 ', '1032', 11, 18, 12, '2022-03-21 10:52:24', 1),
(1033, 'LIGA ANCHA 140mm x 10 mm ', '1033', 11, 1, 12, '2022-03-21 10:52:25', 1),
(1034, 'BOLIGRAFO TINTA LIQUIDA AZUL', '1034', 11, 18, 12, '2022-03-21 10:52:22', 1),
(1035, 'BOLIGRAFO TINTA LIQUIDA ROJA', '1035', 11, 18, 12, '2022-03-21 10:52:22', 1),
(1036, 'BOLIGRAFO TINTA SECA NEGRO', '1036', 11, 18, 12, '2022-03-21 10:52:22', 1),
(1037, 'BOLIGRAFO TINTA SECA AZUL', '1037', 11, 18, 12, '2022-03-21 10:52:22', 1),
(1038, 'BOLIGRAFO TINTA SECA ROJA', '1038', 11, 18, 12, '2022-03-21 10:52:22', 1),
(1039, 'BOLIGRAFO TINTA GEL AZUL', '1039', 11, 18, 12, '2022-03-21 10:52:22', 1),
(1040, 'ROTULO FRONTAL DE LAPTOP STAE', '1040', 64, 13, 12, '2022-03-21 10:38:02', 1),
(1041, 'ROTULO FRONTAL DE IMPRESORA STAE', '1041', 64, 13, 12, '2022-03-21 10:38:02', 1),
(1042, 'ROTULO MESA ANFORA DE INVERSOR SEA', '1042', 64, 13, 12, '2022-03-21 10:38:04', 1),
(1043, 'ROTULO P/LAMINAS PARA PROTECCION DE RESULTADOS Y RECUADRO DE OBSERVACIONES \"PRESIDENCIAL\"', '1043', 64, 13, 12, '2022-03-21 10:38:05', 1),
(1044, 'ROTULO P/LAMINAS PARA PROTECCION DE RESULTADOS Y RECUADRO DE OBSERVACIONES \" CONGRESAL\"', '1044', 64, 13, 12, '2022-03-21 10:38:04', 1),
(1045, 'ROTULO P/LAMINAS PARA PROTECCION DE RESULTADOS Y RECUADRO DE OBSERVACIONES \"PARLAMENTO ANDINO\"', '1045', 64, 13, 12, '2022-03-21 10:38:04', 1),
(1046, 'ROTULO DEL PAQUETE DE MATERIALES PARA EL ESCRUTINIO CAPA SEA', '1046', 64, 13, 12, '2022-03-21 10:38:00', 1),
(1047, 'SOBRES USB C/PLOMO', '1047', 63, 13, 12, '2022-03-21 10:37:53', 1),
(1048, 'SOBRE DE USB - CONGRESISTAS Y PARLAMENTO ANDINO C/BLANCO', '1048', 63, 13, 12, '2022-03-21 10:37:51', 1),
(1049, 'CARTILLA DE HOLOGRAMAS NACIONAL CAPA.', '1049', 91, 13, 12, '2022-03-21 10:38:18', 1),
(1050, 'ROTULO DEL PAQUETE DE MATERIALES PARA EL ESCRUTINIO CAPA CONV', '1050', 64, 13, 12, '2022-03-21 10:38:00', 1),
(1051, 'CARGO DE ENTREGA DE ACTAS Y MATERIAL ELECTORAL AL COORDINADOR DE LA ONPE CAPA CONV ', '1051', 64, 13, 12, '2022-03-21 10:37:54', 1),
(1052, 'ROTULO PQT MAT RESPONSABLE LV CONV-CAP', '1052', 64, 13, 12, '2022-03-21 10:38:05', 1),
(1053, 'ROTULO PQT MAT RESPONSABLE LV CONV-SUF', '1053', 64, 13, 12, '2022-03-21 10:38:05', 1),
(1054, 'PLANTILLA BRAILLE - CAPA.', '1054', 91, 13, 12, '2022-03-21 10:38:19', 1),
(1055, 'ROTULO DEL PAQUETE DE MAT. P/ INSTALACION DE LA MESA CAPA - SEA', '1055', 64, 13, 12, '2022-03-21 10:38:00', 1),
(1056, 'CARGO DE ENTREGA DE ACTAS Y MATERIAL ELECTORAL AL COORDINADOR DE LA ONPE CAPA - SEA', '1056', 64, 13, 12, '2022-03-21 10:37:54', 1),
(1057, 'RÓTULO DEL PAQUETE DE MATERIALES PARA EL COORDINADOR DEL LOCAL DE VOTACIÓN CAPA - SEA', '1057', 64, 13, 12, '2022-03-21 10:38:06', 1),
(1058, 'CONSTANCIA DE ASISTENCIA A SUFRAGAR - CAPA', '1058', 64, 13, 12, '2022-03-21 10:37:55', 1),
(1059, 'CONSTANCIA DE ASISTENCIA A SUFRAGAR - SUF', '1059', 64, 13, 12, '2022-03-21 10:37:55', 1),
(1060, 'RÓTULO \"FORMATOS PARA EL CONTROL DE DOCUMENTOS Y MATERIAL ELECTORAL EN EL LOCAL DE VOTACION\"', '1060', 64, 13, 12, '2022-03-21 10:38:06', 1),
(1061, 'SOBRE CLAVE TECNICO TRANSMISION-SUF', '1061', 63, 13, 12, '2022-03-21 10:37:50', 1),
(1062, 'ROTULO P/LAMINAS PARA PROTECCION DE RESULTADOS Y RECUADRO DE OBSERVACIONES - CONV', '1062', 64, 13, 12, '2022-03-21 10:38:05', 1),
(1063, 'PAQUETE DE LAMINAS PARA PROTECCION DE RESULTADOS Y RECUADRO DE OBSERVACIONES - PROVINCIA', '1063', 67, 11, 12, '2022-03-21 10:38:15', 1),
(1064, 'ETIQUETA P/CIERRE DE CART. HOLOGRAMA', '1064', 62, 18, 12, '2022-03-21 10:38:08', 1),
(1065, 'PROTECTOR FACIAL', '1065', 32, 13, 12, '2022-03-21 10:37:30', 1),
(1066, 'SOBRE DE IMPUGNACION DEL VOTO Y DE IDENTIDAD DEL ELECTOR CON SELLO INHABILITADO - CAPA', '1066', 67, 13, 12, '2022-03-21 10:38:16', 1),
(1067, 'PAQUETE DE PAPEL BOND A4 CON SELLO MUESTRA DE PAPEL DE SEGURIDAD PARA IMPRESION DEL SEA ', '1067', 67, 11, 12, '2022-03-21 10:38:16', 1),
(1068, 'LIJA DE AGUA N°100', '1068', 47, 18, 12, '2022-03-21 10:38:41', 1),
(1069, 'PAQUETE DE LAMINAS PARA PROTECCION DE RESULTADOS Y RECUADRO DE OBSERVACIONES - LIMA', '1069', 67, 11, 12, '2022-03-21 10:38:15', 1),
(1070, 'ROTULO FRONTAL DE TINTAS STAE', '1070', 64, 13, 12, '2022-03-21 10:38:03', 1),
(1071, 'PINTURA TRAFICO NEGRA ACRILICO RESINA', '1071', 47, 5, 12, '2022-03-21 10:38:44', 1),
(1072, 'PINTURA ROJO TEJA LATEX', '1072', 47, 5, 12, '2022-03-21 10:38:44', 1),
(1073, 'PINTURA ALABASTRO LATEX', '1073', 47, 5, 12, '2022-03-21 10:38:44', 1),
(1074, 'PLUMON DELGADO INDELEBLE C/ROJO', '1074', 11, 18, 12, '2022-03-21 10:52:26', 1),
(1075, 'PLUMON P.D. ARTESCO MAX 45 - NEGRO ', '1075', 11, 18, 12, '2022-03-21 10:52:26', 1),
(1076, 'PLUMON P.G. P/PIZARRA LAYCONSA L123 - AZUL', '1076', 11, 18, 12, '2022-03-21 10:52:27', 1),
(1077, 'PLUMON DELGADO INDELEBLE C/AZUL', '1077', 11, 18, 12, '2022-03-21 10:52:26', 1),
(1078, 'PLUMON DELGADO INDELEBLE C/NEGRO', '1078', 11, 18, 12, '2022-03-21 10:52:26', 1),
(1079, 'PLUMON P.D. VINIFAN BEST 421 PLUS - NEGRO ', '1079', 11, 18, 12, '2022-03-21 10:52:26', 1),
(1080, 'PLUMON DELGADO INDELEBLE 421 VERDE', '1080', 11, 18, 12, '2022-03-21 10:52:26', 1),
(1081, 'AGUA DE MESA SIN GAS X 20 L ', '1081', 52, 4, 12, '2022-03-21 10:37:27', 1),
(1082, 'ROTULO FRONTAL KIT DE CAPACITACION - CONV', '1082', 64, 13, 12, '2022-03-21 10:38:03', 1),
(1083, 'CORRECTOR TIPO BOLIGRAFO LIQUIDO', '1083', 11, 13, 12, '2022-03-21 10:52:23', 1),
(1084, 'BOLIGRAFO TINTA LIQUIDA NEGRO', '1084', 11, 13, 12, '2022-03-21 10:52:22', 1),
(1085, 'PLUMON GRUESO INDELEBLE C/NEGRO', '1085', 11, 13, 12, '2022-03-21 10:52:26', 1),
(1086, 'ROTULO DEL PAQUETE DE MAT. P/ INSTALACION DE LA MESA SUF - CONV', '1086', 64, 13, 12, '2022-03-21 10:38:00', 1),
(1087, 'ROTULO DEL PAQUETE DE MATERIALES PARA EL ESCRUTINIO SUF - CONV', '1087', 64, 13, 12, '2022-03-21 10:38:00', 1),
(1088, 'ROTULO DEL PAQUETE DE SEÑALES DE BIOSEGURIDAD PARA EL LOCAL DE VOTACION', '1088', 64, 13, 12, '2022-03-21 10:38:01', 1),
(1089, 'CAJA ARCHIVERA 16X31X46 CM', '1089', 34, 13, 12, '2022-03-21 10:37:35', 1),
(1090, 'ROTULO FRONTAL DE PAQUETE DEL COORDINADOR', '1090', 64, 13, 12, '2022-03-21 10:38:02', 1),
(1091, 'FM07-GOECOR/JEL - SEA - CONTROL DE DOCUMENTOS Y MATERIAL ELECTORAL EN EL CENTRO DE ACOPIO', '1091', 66, 13, 12, '2022-03-21 10:37:54', 1),
(1092, 'ROTULO FRONTAL DE ANFORAS PLEGADAS - SEA CAPA', '1092', 64, 13, 12, '2022-03-21 10:38:01', 1),
(1093, 'ROTULO FRONTAL DE ANFORAS PLEGADAS', '1093', 64, 13, 12, '2022-03-21 10:38:01', 1),
(1094, 'NOTAS AUTOADHESIVAS 654 MEDIANO', '1094', 11, 11, 12, '2022-03-21 10:52:26', 1),
(1095, 'FE DE ERRATAS PARA EL SOBRE PLASTICO C/CELESTE', '1095', 62, 13, 12, '2022-03-21 10:38:09', 1),
(1096, 'LAPTOP SEA', '1096', 67, 3, 12, '2022-03-21 10:38:14', 1),
(1097, 'IMPRESORA SEA', '1097', 67, 3, 12, '2022-03-21 10:38:14', 1),
(1098, 'GUANTES DE NEOPRENO T-XL', '1098', 32, 12, 12, '2022-03-21 10:37:29', 1),
(1099, 'INVERSOR SEA', '1099', 67, 3, 12, '2022-03-21 10:38:14', 1),
(1100, 'TINTAS ADICIONALES', '1100', 67, 3, 12, '2022-03-21 10:38:16', 1),
(1101, 'ROTULO DE MESA ANFORA DE INVERSOR', '1101', 64, 13, 12, '2022-03-21 10:37:59', 1),
(1102, 'ROTULO NUMERO DE MESA PARA SER COLOCADO EN LA MESA DE SUFRAGIO', '1102', 64, 13, 12, '2022-03-21 10:38:04', 1),
(1103, 'ROTULO NUMERO DE MESA PARA SER COLOCADO EN LA CABINA DE VOTACION', '1103', 64, 13, 12, '2022-03-21 10:38:04', 1),
(1104, 'ROTULO DE MESA POR ORDEN ALFABETICO NORMAL', '1104', 64, 13, 12, '2022-03-21 10:38:00', 1),
(1105, 'RÓTULO DEL PAQUETE DE MATERIALES PARA EL COORDINADOR DEL LOCAL DE VOTACIÓN SUF SEA', '1105', 64, 13, 12, '2022-03-21 10:38:06', 1),
(1106, 'HOJA DE SIERRA 12 PULGADAS', '1106', 47, 13, 12, '2022-03-21 10:38:41', 1),
(1107, 'DESARMADOR AMARILLO x12 pza', '1107', 47, 11, 12, '2022-03-21 10:38:39', 1),
(1108, 'CARGO DE ENTREGA DE ACTAS Y MATERIAL ELECTORAL AL RESPONSABLE DEL LOCAL DE VOTACION EXTRANJERO SUF C', '1108', 64, 13, 12, '2022-03-21 10:37:55', 1),
(1109, 'FORMATO DE OBSERVACIONES O RECLAMOS AL ESCRUTINIO EXTRANJERO SUF', '1109', 64, 13, 12, '2022-03-21 10:37:56', 1),
(1110, 'CARGO DE RETENCION DEL DOCUMENTO DE IDENTIDAD EXTRANJERO SUF', '1110', 64, 13, 12, '2022-03-21 10:37:55', 1),
(1111, 'ROTULO FRONTAL DE RELACION DE ELECTORES DE CAPACITACION SEA', '1111', 64, 13, 12, '2022-03-21 10:38:03', 1),
(1112, 'ROTULO FRONTAL DE RELACION DE ELECTORES DE CAPACITACION CONV.', '1112', 64, 13, 12, '2022-03-21 10:38:02', 1),
(1113, 'PAQUETE DE ESCRUTINIO CONV - PROVINCIA', '1113', 67, 11, 12, '2022-03-21 10:38:14', 1),
(1114, 'CEDULA DE CAPACITACION', '1114', 91, 11, 12, '2022-03-21 10:38:18', 1),
(1115, 'DOCUMENTOS ELECTORALES ', '1115', 91, 13, 12, '2022-03-21 10:38:18', 1),
(1116, 'LISTA DE ELECTORES ', '1116', 91, 13, 12, '2022-03-21 10:38:19', 1),
(1117, 'PAQUETE DE ESCRUTINIO SEA - PROVINCIA', '1117', 67, 11, 12, '2022-03-21 10:38:15', 1),
(1118, 'PAQUETE DE ESCRUTINIO SEA', '1118', 67, 11, 12, '2022-03-21 10:38:15', 1),
(1119, 'PAQUETE DE ESCRUTINIO CONV - LIMA', '1119', 67, 11, 12, '2022-03-21 10:38:14', 1),
(1120, 'ROTULO FRONTAL KIT DE CAPACITACION - STAE', '1120', 64, 13, 12, '2022-03-21 10:38:03', 1),
(1121, 'ROTULO FRONTAL DE CARTEL DE CANDIDATOS CONV. - LIMA (CAPA))', '1121', 64, 13, 12, '2022-03-21 10:38:01', 1),
(1122, 'ROTULO FRONTAL DE CARTEL  DE CANDIDATOS SEA - PROV. (CAPA)', '1122', 64, 13, 12, '2022-03-21 10:38:01', 1),
(1123, 'PAQUETE DE MATERIALES PARA EL COORDINADOR DEL LOCAL DE VOTACIÓN  CONV.', '1123', 67, 11, 12, '2022-03-21 10:38:16', 1),
(1124, 'PAQUETE DE MATERIALES PARA EL COORDINADOR DEL LOCAL DE VOTACIÓN SEA', '1124', 67, 11, 12, '2022-03-21 10:38:16', 1),
(1125, 'CARTILLA DE INSTRUCCION PARA MIEMBRO DE MESA CONV.', '1125', 81, 13, 12, '2022-03-21 10:37:47', 1),
(1126, 'CARTILLA DE INSTRUCCION PARA MIEMBRO DE MESA CONV. PROVINCIA', '1126', 81, 13, 12, '2022-03-21 10:37:47', 1),
(1127, 'CARTILLA DE INSTRUCCION PARA MIEMBRO DE MESA EXTRANJERO', '1127', 81, 13, 12, '2022-03-21 10:37:47', 1),
(1128, 'MANUAL INSTRUCCION MM STAE', '1128', 81, 13, 12, '2022-03-21 10:37:49', 1),
(1129, 'CARTILLA DE INSTRUCCION PARA MIEMBRO DE MESA SEA PROVINCIA', '1129', 81, 13, 12, '2022-03-21 10:37:47', 1),
(1130, 'ABRAZADERA FIERRO GALVANIZADO 2pulg 1/4', '1130', 47, 13, 12, '2022-03-21 10:38:37', 1),
(1131, 'GUIA PARA MIEMBROS DE MESA EN EL ESCRUTINIO AUTOMATIZADO', '1131', 81, 13, 12, '2022-03-21 10:37:48', 1),
(1132, 'GUIA PARA MIEMBROS DE MESA EN EL ESCRUTINIO AUTOMATIZADO PROVINCIA', '1132', 81, 13, 12, '2022-03-21 10:37:48', 1),
(1133, 'CARTILLA TU DEBES ELEGIR', '1133', 81, 13, 12, '2022-03-21 10:37:48', 1),
(1134, 'CARTILLA TU DEBES ELEGIR CONV. MADRE DE DIOS TIPO 2', '1134', 81, 13, 12, '2022-03-21 10:37:48', 1),
(1135, 'CARTILLA DE INSTRUCCIONES PARA PERSONERAS(OS) DE MESA CONV. Y SEA', '1135', 81, 13, 12, '2022-03-21 10:37:47', 1),
(1136, 'CARTILLA DE INSTRUCCIONES PARA LAS FF.AA Y LA PNP', '1136', 64, 13, 12, '2022-03-21 10:37:55', 1),
(1137, 'CARTILLA INFORMATIVA PARA LOS REPRESENTANTES DEL MINISTERIO PUBLICO', '1137', 81, 13, 12, '2022-03-21 10:37:48', 1),
(1138, 'AFICHE COMO VOTAR CONV. TIPO 1', '1138', 82, 13, 12, '2022-03-21 10:37:45', 1);
INSERT INTO `producto` (`IdProducto`, `Descripcion`, `CodProducto`, `IdClase`, `IdUma`, `UsuarioCrea`, `FechaCrea`, `Estado`) VALUES
(1139, 'AFICHE COMO VOTAR MADRE DE DIOS TIPO 2', '1139', 82, 13, 12, '2022-03-21 10:37:45', 1),
(1140, 'AFICHE LOS PASOS DE LA VOTACION', '1140', 82, 13, 12, '2022-03-21 10:37:46', 1),
(1141, 'AFICHE INTERCULTURAL BILINGUE SHIPIBO', '1141', 82, 13, 12, '2022-03-21 10:37:46', 1),
(1142, 'AFICHE INTERCULTURAL BILINGUE QUECHUA CHANKA', '1142', 82, 13, 12, '2022-03-21 10:37:46', 1),
(1143, 'AFICHE INTERCULTURAL BILINGUE MATSIGENKA', '1143', 82, 13, 12, '2022-03-21 10:37:45', 1),
(1144, 'AFICHE INTERCULTURAL BILINGUE AYMARA', '1144', 82, 13, 12, '2022-03-21 10:37:45', 1),
(1145, 'AFICHE INTERCULTURAL BILINGUE AWAJÚN', '1145', 82, 13, 12, '2022-03-21 10:37:45', 1),
(1146, 'AFICHE INTERCULTURAL BILINGUE ASHANINKA', '1146', 82, 13, 12, '2022-03-21 10:37:45', 1),
(1147, 'AFICHE RESPETO A LA DIVERSIDAD', '1147', 82, 13, 12, '2022-03-21 10:37:46', 1),
(1148, 'AFICHE DE INSTALACION', '1148', 82, 13, 12, '2022-03-21 10:37:45', 1),
(1149, 'AFICHE DE SUFRAGIO', '1149', 82, 13, 12, '2022-03-21 10:37:45', 1),
(1150, 'AFICHE DE ESCRUTINIO', '1150', 82, 13, 12, '2022-03-21 10:37:45', 1),
(1151, 'ANFORAS PLEGADAS SEA', '1151', 67, 3, 12, '2022-03-21 10:38:13', 1),
(1152, 'ANFORAS PLEGADAS CONV.', '1152', 67, 3, 12, '2022-03-21 10:38:13', 1),
(1153, 'CAJA CON MATERIAL ELECTORAL CONV. PROVINCIA', '1153', 67, 3, 12, '2022-03-21 10:38:13', 1),
(1154, 'KIT DE CAPACITACION CONV. PROVINCIA', '1154', 67, 3, 12, '2022-03-21 10:38:14', 1),
(1155, 'RELACION DE ELECTORES.', '1155', 91, 13, 12, '2022-03-21 10:38:19', 1),
(1156, 'CARTEL DE CANDIDATOS - CAPA.', '1156', 91, 13, 12, '2022-03-21 10:38:17', 1),
(1157, 'CARTEL DE CANDIDATOS CONGRESISTAS LIMA CAPA', '1157', 91, 13, 12, '2022-03-21 10:38:17', 1),
(1158, 'CARTEL DE CANDIDATOS CONGRESISTAS PROVINCIA CAPA.', '1158', 91, 13, 12, '2022-03-21 10:38:17', 1),
(1159, 'CARTEL DE CANDIDATOS PARLAMENTO ANDINO CAPA.', '1159', 91, 13, 12, '2022-03-21 10:38:17', 1),
(1160, 'KIT DE CAPACITACION CONV. LIMA', '1160', 67, 3, 12, '2022-03-21 10:38:14', 1),
(1161, 'CAJA CON MATERIAL ELECTORAL SEA. PROVINCIA', '1161', 67, 3, 12, '2022-03-21 10:38:14', 1),
(1162, 'SELLO DE MADERA INHABILITADO ', '1162', 11, 13, 12, '2022-03-21 10:52:27', 1),
(1163, 'CAJA CON MATERIAL ELECTORAL SEA. LIMA', '1163', 67, 3, 12, '2022-03-21 10:38:14', 1),
(1164, 'CAJA CON MATERIAL ELECTORAL CON. LIMA', '1164', 67, 3, 12, '2022-03-21 10:38:13', 1),
(1165, 'NOTIFICACION DE MIEMBRO DE MESA CONV.', '1165', 64, 13, 12, '2022-03-21 10:37:56', 1),
(1166, 'NOTIFICACION DE MIEMBRO DE MESA SEA', '1166', 64, 13, 12, '2022-03-21 10:37:56', 1),
(1167, 'SEÑAL DE USO OBLIGATORIO DE MASCARILLA', '1167', 83, 13, 12, '2022-03-21 10:37:50', 1),
(1168, 'SEÑAL DE DISTANCIAMIENTO', '1168', 83, 13, 12, '2022-03-21 10:37:49', 1),
(1169, 'SEÑAL DE FRECUENTE HIGIENE DE MANOS', '1169', 83, 13, 12, '2022-03-21 10:37:49', 1),
(1170, 'SEÑAL DE AREA LIMPIA Y DESINFECTADA', '1170', 83, 13, 12, '2022-03-21 10:37:49', 1),
(1171, 'ROTULO FRONTAL DE NOTIFICACIONES DE MIEMBRO DE MESA CONV.', '1171', 64, 13, 12, '2022-03-21 10:38:02', 1),
(1172, 'ROTULO FRONTAL DE NOTIFICACIONES DE MIEMBRO DE MESA SEA', '1172', 64, 13, 12, '2022-03-21 10:38:02', 1),
(1173, 'CAJA DE MATERIAL PARA RESPONSABLE DEL LOCAL DE VOTACION - CONV', '1173', 68, 3, 12, '2022-03-21 10:38:12', 1),
(1174, 'CAJA DE MATERIAL PARA RESPONSABLE DEL LOCAL DE VOTACION - SEA', '1174', 68, 3, 12, '2022-03-21 10:38:12', 1),
(1175, 'SET DE GUIAS DE IMAGENES PARA KODAK', '1175', 12, 6, 12, '2022-03-21 10:52:21', 1),
(1176, 'ROTULO FRONTAL DE RELACION DE ELECTORES DE CAPA. - CARTELES DE CANDIDATOS - EI2022', '1176', 64, 13, 12, '2022-03-21 10:38:02', 1),
(1177, 'CARTEL DE CANDIDATOS Y RELACION DE ELECTORES', '1177', 68, 3, 12, '2022-03-21 10:38:12', 1),
(1178, 'FILTRANTE MANZANILLA', '1178', 52, 4, 12, '2022-03-21 10:37:27', 1),
(1179, 'FILTRANTE ANÍS', '1179', 52, 4, 12, '2022-03-21 10:37:27', 1),
(1180, 'SOBRE MANILA OFICIO (25X38CM)', '1180', 34, 13, 12, '2022-03-21 10:37:36', 1),
(1181, 'PAQUETE DE NOTIFICACION DE MIEMBRO DE MESA SEA', '1181', 68, 3, 12, '2022-03-21 10:38:12', 1),
(1182, 'ESCOBILLA DE FIERRO ', '1182', 48, 18, 12, '2022-03-21 10:38:36', 1),
(1183, 'PAQUETE DE NOTIFICACION DE MIEMBRO DE MESA CONV.', '1183', 68, 3, 12, '2022-03-21 10:38:12', 1),
(1184, 'ROTULO FRONTAL DE MATERIAL DE CONTINGENCIA STAE', '1184', 64, 13, 12, '2022-03-21 10:38:02', 1),
(1185, 'GUIAS DE DESPACHO - MATERIAL', '1185', 81, 13, 12, '2022-03-21 10:37:48', 1),
(1186, 'ROTULO FRONTAL AFICHE INTERCULTURAL BILINGUE MATSIGENKA', '1186', 64, 13, 12, '2022-03-21 10:38:01', 1),
(1187, 'ROTULO FRONTAL AFICHE INTERCULTURAL BILINGUE SHIPIBO', '1187', 64, 13, 12, '2022-03-21 10:38:01', 1),
(1188, 'ROTULO FRONTAL PQT SEÑALES Y ROTULOS P/ LV - STAE', '1188', 64, 13, 12, '2022-03-21 10:38:03', 1),
(1189, 'ROTULO PQT DE SEÑALES PARA EL LOCAL DE VOTACION - CONV EI2022', '1189', 64, 13, 12, '2022-03-21 10:38:05', 1),
(1190, 'ROTULO FRONTAL KIT DE FACILITADOR- CONV', '1190', 64, 13, 12, '2022-03-21 10:38:03', 1),
(1191, 'ROTULO FRONTAL KIT DE FACILITADOR- STAE', '1191', 64, 13, 12, '2022-03-21 10:38:03', 1),
(1192, 'KIT DEL FACILITADOR SEA', '1192', 68, 3, 12, '2022-03-21 10:38:12', 1),
(1193, 'KIT DEL FACILITADOR CONV', '1193', 68, 3, 12, '2022-03-21 10:38:12', 1),
(1194, 'MATERIAL DE CONTINGENCIA SEA - PROVINCIA', '1194', 68, 3, 12, '2022-03-21 10:38:12', 1),
(1195, 'MATERIAL DE CONTINGENCIA SEA - LIMA', '1195', 68, 3, 12, '2022-03-21 10:38:12', 1),
(1196, 'PQT EMBALADO Y ROTULADO DE ANFORAS', '1196', 68, 3, 12, '2022-03-21 10:38:13', 1),
(1197, 'RODILLO DE PRESION PARA ZEBRA', '1197', 42, 18, 12, '2022-03-21 10:38:32', 1),
(1198, 'KIT MEDIA GUIDE ASSY PARA ZEBRA', '1198', 42, 18, 12, '2022-03-21 10:38:29', 1),
(1199, 'CABEZAL PARA IMPRESORA ZEBRA', '1199', 42, 18, 12, '2022-03-21 10:38:29', 1),
(1200, 'PQT ENSAMBLAJE FINAL 1 JORNADA CONV LIMA', '1200', 68, 3, 12, '2022-03-21 10:38:13', 1),
(1201, 'KIT PARA CAPACITACION SEA - PROVINCIA', '1201', 68, 3, 12, '2022-03-21 10:38:12', 1),
(1202, 'KIT PARA CAPACITACION SEA - LIMA', '1202', 68, 3, 12, '2022-03-21 10:38:12', 1),
(1203, 'HOLOGRAMAS  DE SEGURIDAD', '1203', 92, 18, 12, '2022-03-21 10:38:20', 1),
(1204, 'ROTULO FRONTAL DE MANUAL DE INSTRUCCIONES PARA MIEMBROS DE MESA EXTRANJERO', '1204', 64, 13, 12, '2022-03-21 10:38:02', 1),
(1205, 'PAQUETE DE LAMINAS PARA PROTECCION DE RESULTADOS Y RECUADRO DE OBSERVACIONES - EXTRANJERO', '1205', 67, 11, 12, '2022-03-21 10:38:15', 1),
(1206, 'PQT CON SEÑALES PARA EL LOCAL DE VOTACION CONV', '1206', 68, 3, 12, '2022-03-21 10:38:13', 1),
(1207, 'PQT CON SEÑALES PARA EL LOCAL DE VOTACION - SEA', '1207', 68, 3, 12, '2022-03-21 10:38:13', 1),
(1208, 'ARCHIVADOR LOMO ANCHO T/OFICIO', '1208', 11, 13, 12, '2022-03-21 10:52:22', 1),
(1209, 'BOLSA P/EMPAQUETADO DE IMPLEMENTOS DE SEGURIDAD PARA EL MIEMBRO DE MESA  (12.00 X 22.00 X 1.5)', '1209', 71, 13, 12, '2022-03-21 10:37:37', 1),
(1210, 'MESA DE MELAMINE (ALQUILER)', '1210', 34, 13, 12, '2022-03-21 10:37:36', 1),
(1211, 'STRETCH FILM (CUSTODIA)', '1211', 34, 4, 12, '2022-03-21 10:37:36', 1),
(1212, 'PQT DE MANUALES PARA MIEMBROS DE MESA - EXTRANJERO', '1212', 68, 3, 12, '2022-03-21 10:38:13', 1),
(1213, 'BROCA PARA CONCRETO SDS PLUS 1/8 TRUPER', '1213', 47, 13, 12, '2022-03-21 10:38:38', 1),
(1214, 'CINTA DE PAPEL MICRO PERFORADO 5 CM x 90 M C/BLANCO', '1214', 47, 13, 12, '2022-03-21 10:38:39', 1),
(1215, 'ACEITE MULTIUSOS 3 en 1 - 90ml', '1215', 47, 13, 12, '2022-03-21 10:38:37', 1),
(1216, 'LIJA PARA FIERRO N° 40', '1216', 47, 13, 12, '2022-03-21 10:38:41', 1),
(1217, 'LIJA PARA FIERRO N° 60', '1217', 47, 13, 12, '2022-03-21 10:38:41', 1),
(1218, 'THINNER ACRILICO - GL', '1218', 33, 5, 12, '2022-03-21 10:37:35', 1),
(1219, 'ARNES CON LINEA DE VIDA', '1219', 32, 18, 12, '2022-03-21 10:37:27', 1),
(1220, 'PERNO DE EXPANSION 1/2\"x  5', '1220', 47, 13, 12, '2022-03-21 10:38:43', 1),
(1221, 'TE CON ROSCA GALVANIZADO 1/2\"', '1221', 47, 13, 12, '2022-03-21 10:38:46', 1),
(1222, 'BALASTRO ELECTRONICO PARA PANEL LED 30W', '1222', 45, 13, 12, '2022-03-21 10:38:50', 1),
(1223, 'CRIMPADORA RJ45', '1223', 45, 13, 12, '2022-03-21 10:47:20', 1),
(1224, 'ALICATE DE CORTE DE 6\"', '1224', 47, 13, 12, '2022-03-21 10:38:38', 1),
(1225, 'CINTA AMARILLA P/CIERRE DE S/COLORES 1 X 72 YDS CAPACITACION', '1225', 73, 17, 12, '2022-03-21 10:37:39', 1),
(1226, 'BOLSA P/ACTA PADRÓN - CAPACITACIÓN  (32.00 X 54.00 X 1.5)', '1226', 71, 13, 12, '2022-03-21 10:37:36', 1),
(1227, 'ROTULO PARA CAJA DE TRASLADO - RESERVA', '1227', 64, 13, 12, '2022-03-21 10:38:05', 1),
(1228, 'PARIHUELA DE MADERA (ALQUILER)', '1228', 34, 18, 12, '2022-03-21 10:37:36', 1),
(1229, 'ROTULO DE MESA POR ORDEN ALFABETICO ESPECIAL', '1229', 64, 13, 12, '2022-03-21 10:37:59', 1),
(1230, 'SANITARIOS PORTATILES (ALQUILER)', '1230', 34, 18, 12, '2022-03-21 10:37:36', 1),
(1231, 'PAPEL AUTOADHESIVO', '1231', 62, 13, 12, '2022-03-21 10:38:11', 1),
(1232, 'KIT DE CONSUMIBLES P/ESCANER KODAK', '1232', 12, 18, 12, '2022-03-21 10:52:20', 1),
(1233, 'CABLE ELECTRICO VULCANIZADO 3 X 10 AWG	', '1233', 45, 17, 12, '2022-03-21 10:46:32', 1),
(1234, 'MASILLA PARA PARED x1kg', '1234', 47, 1, 12, '2022-03-21 10:38:42', 1),
(1235, 'SOBRE DOBLADOS PARA USB ', '1235', 67, 13, 12, '2022-03-21 10:38:16', 1),
(1236, 'SOBRE DOBLADOS PARA USB CONGRESISTAS Y PARLAMENTO ANDINO', '1236', 67, 13, 12, '2022-03-21 10:38:16', 1),
(1237, 'GRAPA 23/13 x 1000', '1237', 11, 4, 12, '2022-03-21 10:52:25', 1),
(1243, 'ROTULO FRONTAL SEÑALETICA', '1243', 64, 13, 12, '2022-03-21 10:38:03', 1),
(1244, 'ANGULO RANURADO', '1244', 44, 13, 12, '2022-03-21 10:38:33', 1),
(1245, 'AIRE ACONDICINADO - Tipo Doméstico', '1245', 45, 13, 12, '2022-03-21 10:38:50', 1),
(1246, 'PAQUETE DE SOBRES DE PLASTICO DE COLORES (50x30cm)', '1246', 68, 11, 12, '2022-03-21 10:38:13', 1),
(1247, 'ROTULO FRONTAL DE CARTEL DE DIFUSION', '1247', 64, 13, 12, '2022-03-21 10:38:02', 1),
(1248, 'PAQUETE DE SOBRES DE PLASTICO DE COLORES (50x30cm) SEA', '1248', 67, 11, 12, '2022-03-21 10:38:16', 1),
(1249, 'PAQUETE DE SOBRE PARA IMPUGNACION DEL VOTO', '1249', 68, 6, 12, '2022-03-21 10:38:13', 1),
(1250, 'ROTULOS PARA RESTOS ELECTORALES LIMA', '1250', 64, 13, 12, '2022-03-21 10:38:06', 1),
(1251, 'PAQUETE DE ESCRUTINIO CONV - EXTRANJERO', '1251', 67, 11, 12, '2022-03-21 10:38:14', 1),
(1252, 'SOBRE SEA GRIS - PRESIDENTE Y VICEPRESIDENTE', '1252', 63, 13, 12, '2022-03-21 10:37:52', 1),
(1253, 'SOBRE SEA BLANCO - CONGRESISTA Y PARLAMENTO ANDINO', '1253', 63, 13, 12, '2022-03-21 10:37:52', 1),
(1254, 'MASCARILLA EMBOLSADA P/PQTE DE BIOSEGURIDAD (PACK)', '1254', 67, 13, 12, '2022-03-21 10:38:14', 1),
(1255, 'PAQUETE DE MATERIAL PARA EL CLV NO CRITICO ', '1255', 67, 11, 12, '2022-03-21 10:38:15', 1),
(1256, 'ROTULO FRONTAL DE LAPTOP TRANSMISION', '1256', 64, 13, 12, '2022-03-21 10:38:02', 1),
(1257, 'ROTULOS DE SIMULACRO', '1257', 64, 13, 12, '2022-03-21 10:38:06', 1),
(1258, 'PAQUETE DE MATERIAL DE INSTALACION NO CRITICO CONV. PROVINCIA', '1258', 67, 11, 12, '2022-03-21 10:38:15', 1),
(1259, 'SOBRE USB - CAPA', '1259', 63, 13, 12, '2022-03-21 10:37:53', 1),
(1260, 'SOBRE CON USB', '1260', 63, 13, 12, '2022-03-21 10:37:51', 1),
(1261, 'CEDULA SUFRAGIO EXTRANJERO', '1261', 92, 13, 12, '2022-03-21 10:38:19', 1),
(1262, 'RELACION DE ELECTORES SUF. PROVINCIA', '1262', 92, 13, 12, '2022-03-21 10:38:20', 1),
(1263, 'LISTA DE MIEMBRO DE MESA CON DNI DE PRUEBA', '1263', 64, 13, 12, '2022-03-21 10:37:56', 1),
(1264, 'HOJA BORRADOR PARA PRUEBAS', '1264', 64, 13, 12, '2022-03-21 10:37:56', 1),
(1265, 'ACTA DE INSTALACION Y SUFRAGIO PARA PRUEBAS', '1265', 64, 13, 12, '2022-03-21 10:37:54', 1),
(1266, 'CEDULA SUFRAGIO PROVINCIA', '1266', 92, 13, 12, '2022-03-21 10:38:20', 1),
(1267, 'PAQUETE DE MATERIAL DE INSTALACION NO CRITICO CONV. LIMA', '1267', 67, 11, 12, '2022-03-21 10:38:15', 1),
(1268, 'PAQUETE DE MATERIAL DE INSTALACION NO CRITICO SEA PROVINCIA', '1268', 67, 11, 12, '2022-03-21 10:38:15', 1),
(1269, 'PAQUETE DE MATERIAL DE INSTALACION NO CRITICO SEA LIMA', '1269', 67, 11, 12, '2022-03-21 10:38:15', 1),
(1270, 'CEDULAS DE MUESTRAS VISADAS', '1270', 92, 13, 12, '2022-03-21 10:38:20', 1),
(1271, 'ROTULO DE MESA DE SUFRAGIO - SEA PROVINCIA', '1271', 64, 13, 12, '2022-03-21 10:37:59', 1),
(1272, 'ROTULO DE MESA DE SUFRAGIO - SEA LIMA', '1272', 64, 13, 12, '2022-03-21 10:37:59', 1),
(1273, 'RELACION DE ELECTORES SUF. EXTRANJERO', '1273', 92, 13, 12, '2022-03-21 10:38:20', 1),
(1274, 'REFRIGERIOS', '1274', 34, 13, 12, '2022-03-21 10:37:36', 1),
(1275, 'CHALECO C/LOGO ONPE TALLA S C/AZUL', '1275', 31, 13, 12, '2022-03-21 10:37:31', 1),
(1276, 'ROTULO LATERAL DE RESERVA ', '1276', 64, 13, 12, '2022-03-21 10:38:04', 1),
(1277, 'CHALECO C/LOGO ONPE TALLA M C/AZUL', '1277', 31, 13, 12, '2022-03-21 10:37:31', 1),
(1278, 'ROTULO FRONTAL DE MODEM USB', '1278', 64, 13, 12, '2022-03-21 10:38:02', 1),
(1279, 'ROTULOS PARA RESTOS ELECTORALES EXTRANJERO', '1279', 64, 13, 12, '2022-03-21 10:38:06', 1),
(1280, 'ROTULO DE EXTRANJEROS ', '1280', 64, 13, 12, '2022-03-21 10:37:59', 1),
(1281, 'ROTULOS PARA RESTOS ELECTORALES PROVINCIA', '1281', 64, 13, 12, '2022-03-21 10:38:06', 1),
(1282, 'ROTULO FRONTAL DE PAQUETE DEL COORDINADOR - CONV. CAPA', '1282', 64, 13, 12, '2022-03-21 10:38:02', 1),
(1283, 'ACTA PADRON (DOCUMENTO Y LISTA) SUFRAGIO PROV', '1283', 92, 13, 12, '2022-03-21 10:38:19', 1),
(1284, 'ACTA PADRON (DOCUMENTO Y LISTA) SUF. EXTRANJERO', '1284', 92, 13, 12, '2022-03-21 10:38:19', 1),
(1285, 'CARTEL DE CANDIDATOS PRESIDENTE Y VICEPRESIDENTE SUF.', '1285', 92, 13, 12, '2022-03-21 10:38:19', 1),
(1286, 'CARTEL DE CANDIDATOS PARLAMENTO ANDINO SUF.', '1286', 92, 13, 12, '2022-03-21 10:38:19', 1),
(1287, 'CARTEL DE CANDIDATOS CONGRESISTAS - PERUANOS RESIDENTES EN EL EXTRANJERO SUF.', '1287', 92, 13, 12, '2022-03-21 10:38:19', 1),
(1288, 'ROTULO FRONTAL DE ANFORAS PLEGADAS SUFRAGIO PROV', '1288', 64, 11, 12, '2022-03-21 10:38:01', 1),
(1289, 'ROTULO FRONTAL DE CABINAS DE VOTACION', '1289', 64, 13, 12, '2022-03-21 10:38:01', 1),
(1290, 'ROTULO FRONTAL DE RESERVA', '1290', 64, 13, 12, '2022-03-21 10:38:03', 1),
(1291, 'ROTULO DE CABINA DE VOTACION SUFRAGIO - CONV. PROVINCIA', '1291', 64, 13, 12, '2022-03-21 10:37:58', 1),
(1292, 'ROTULO DE MESA DE SUFRAGIO - CONV. PROVINCIA', '1292', 64, 13, 12, '2022-03-21 10:37:59', 1),
(1293, 'ROTULO DE ORDEN ALFABETICO NORMAL SUFRAGIO - CONV. PROVINCIA', '1293', 64, 13, 12, '2022-03-21 10:38:00', 1),
(1294, 'ROTULO DE ORDEN ALFABETICO ESPECIAL SUFRAGIO CONV. PROVINCIA', '1294', 64, 13, 12, '2022-03-21 10:38:00', 1),
(1295, 'DOCUMENTOS ELECTORALES (MATERIAL DE PRUEBA ) ', '1295', 92, 11, 12, '2022-03-21 10:38:20', 1),
(1296, 'ROTULO DE MESA PARA ANFORA DE VOTACION SUFRAGIO PROV', '1296', 64, 11, 12, '2022-03-21 10:37:59', 1),
(1297, 'ROTULO PARA CAJA DE TRASLADO SUFRAGIO PROV', '1297', 64, 11, 12, '2022-03-21 10:38:05', 1),
(1298, 'CARTEL DE CANDIDATOS CONGRESISTAS PROVINCIA SUF.', '1298', 92, 13, 12, '2022-03-21 10:38:19', 1),
(1299, 'CARTEL DE CANDIDATOS CONGRESISTAS LIMA SUF.', '1299', 92, 13, 12, '2022-03-21 10:38:19', 1),
(1300, 'FM03-GOECOR/RME -SEA - CONTROL DE EQUIPOS INFORMATICOS ELECTORALES A REPLEGAR', '1300', 66, 13, 12, '2022-03-21 10:37:53', 1),
(1301, 'ROTULO DE MESA DE SUFRAGIO - CONV. LIMA', '1301', 64, 13, 12, '2022-03-21 10:37:59', 1),
(1302, 'FM07-GOECOR/JEL - CONV. - CONTROL DE DOCUMENTOS Y MATERIAL ELECTORAL EN EL CENTRO DE ACOPIO', '1302', 66, 13, 12, '2022-03-21 10:37:54', 1),
(1303, 'FM03-GOECOR/JEL - CONV. - CONTROL DE DISTRIBUCION DEL MATERIAL DURANTE LA JORNADA ELECTORAL', '1303', 66, 13, 12, '2022-03-21 10:37:53', 1),
(1304, 'CAJA CON MATERIAL ELECTORAL SUFRAGIO-EXTRANJERO', '1304', 67, 3, 12, '2022-03-21 10:38:14', 1),
(1305, 'FM02-GOECOR/RME - CONV. - HOJA DE RUTA PARA EL REPLIEGUE DE DOCUMENTOS ELECTORALES', '1305', 66, 13, 12, '2022-03-21 10:37:53', 1),
(1306, 'CAJA CON MATERIAL ELECTORAL-RESERVA-EXTRANJERO', '1306', 67, 3, 12, '2022-03-21 10:38:14', 1),
(1307, 'CARTELES DE CANDIDATOS SUFRAGIO', '1307', 82, 3, 12, '2022-03-21 10:37:47', 1),
(1308, 'BULTOS DE CABINAS DE VOTACION EXTRANJERO', '1308', 122, 3, 12, '2022-03-21 10:38:21', 1),
(1309, 'ANFORAS PLEGADAS CON EXTRANJERO', '1309', 122, 3, 12, '2022-03-21 10:38:20', 1),
(1310, 'PQT DEL COORDINADOR DEL LOCAL DE VOTACION EXTRANJERO-CONV ', '1310', 67, 3, 12, '2022-03-21 10:38:16', 1),
(1311, 'MANUAL PARA MIEMBROS DE MESA A SER CAPACITADOS Y FUNCIONARIOS CONSULARES', '1311', 81, 3, 12, '2022-03-21 10:37:49', 1),
(1312, 'PLANTILLA BRAILLE SUFRAGIO PROV.', '1312', 92, 13, 12, '2022-03-21 10:38:20', 1),
(1313, 'AZUCAR RUBIA (sachet x5gr)', '1313', 52, 19, 12, '2022-03-21 10:37:27', 1),
(1314, 'CAFE INSTANTANEO (sachet x2gr)', '1314', 52, 19, 12, '2022-03-21 10:37:27', 1),
(1315, 'GALLETA SODA 40gr', '1315', 52, 13, 12, '2022-03-21 10:37:27', 1),
(1316, 'GALLETA VAINILLA 28gr', '1316', 52, 13, 12, '2022-03-21 10:37:27', 1),
(1317, 'RELACION DE ELECTORES SUF. LIMA CONV.', '1317', 92, 13, 12, '2022-03-21 10:38:20', 1),
(1318, 'RELACION DE ELECTORES SUF. LIMA SEA', '1318', 92, 13, 12, '2022-03-21 10:38:20', 1),
(1319, 'FM04-GOECOR/RME - SEA - CARGO DE ENTREGA Y RECEPCION DEL USB EN LA ODPE', '1319', 66, 13, 12, '2022-03-21 10:37:53', 1),
(1320, 'FM11-GOECOR/RME -SEA - CONTROL DE DISPOSITIVOS, DOCUMENTOS Y OTROS MATERIALES A REPLEGAR', '1320', 66, 13, 12, '2022-03-21 10:37:54', 1),
(1321, 'FM04-GOECOR/JEL-SEA - CONTROL DE DISTRIBUCION DE EQUIPOS DURANTE LA JORNADA ELECTORAL', '1321', 66, 13, 12, '2022-03-21 10:37:53', 1),
(1322, 'FM08-GOECOR/JEL-SEA - CADENA DE CUSTODIA DE DISPOSITIVO ELECTRONICO', '1322', 66, 13, 12, '2022-03-21 10:37:54', 1),
(1323, 'FM10-GOECOR/JEL-SEA - CARGO DE ENTREGA Y RECEPCION DE E.I.E DEL CENTRO DE ACOPIO AL PUNTO DE TRANS. ', '1323', 66, 13, 12, '2022-03-21 10:37:54', 1),
(1324, 'FM06-GOECOR/RME - CARGO DE ENTREGA DEL MATERIAL DE RERVA AL CM/CTM', '1324', 66, 13, 12, '2022-03-21 10:37:54', 1),
(1325, 'FM09-GOECOR/RME - CARGO DE RECEPCION DE SOBRES ROJOS, MORADOS Y ANARANJADOS EN CUSTODIA - ODPE', '1325', 66, 13, 12, '2022-03-21 10:37:54', 1),
(1326, 'FM02-GOECOR/JEL - LISTA DE CHEQUEO DE ACONDICIONAMIENTO Y SEÑALIZACION DEL LOCAL DE VOTACION', '1326', 66, 13, 12, '2022-03-21 10:37:53', 1),
(1327, 'FM05-GOECOR/JEL - REPORTE DE LA JORNADA ELECTORAL', '1327', 66, 13, 12, '2022-03-21 10:37:53', 1),
(1328, 'FM06-GOECOR/JEL - CONTROL DE RECEPCION DE DOCUMENTOS Y MATERIALES ELECTORALES EN LAS MESAS DE SUFRAG', '1328', 66, 13, 12, '2022-03-21 10:37:54', 1),
(1329, 'FM11-GOECOR/JEL - ACTA DE RECEPCION/DEVOLUCION DEL LOCAL DE VOTACION', '1329', 66, 13, 12, '2022-03-21 10:37:54', 1),
(1330, 'CARGO DE ENTREGA DE MATERIAL ELECTORAL Y REFRIGERIOS', '1330', 66, 13, 12, '2022-03-21 10:37:53', 1),
(1331, 'ROTULO DE CABINA DE VOTACION SUFRAGIO - CONV. LIMA', '1331', 64, 13, 12, '2022-03-21 10:37:58', 1),
(1332, 'ROTULO DE CABINA DE VOTACION SUFRAGIO - SEA LIMA', '1332', 64, 13, 12, '2022-03-21 10:37:58', 1),
(1333, 'ROTULO DE CABINA DE VOTACION SUFRAGIO - SEA PROVINCIA', '1333', 64, 13, 12, '2022-03-21 10:37:59', 1),
(1334, 'ROTULO DE ORDEN ALFABETICO NORMAL SUFRAGIO - CONV. LIMA', '1334', 64, 13, 12, '2022-03-21 10:38:00', 1),
(1335, 'ROTULO DE ORDEN ALFABETICO ESPECIAL SUFRAGIO - CONV. LIMA', '1335', 64, 13, 12, '2022-03-21 10:38:00', 1),
(1336, 'ROTULO DE ORDEN ALFABETICO ESPECIAL SUFRAGIO - SEA LIMA', '1336', 64, 13, 12, '2022-03-21 10:38:00', 1),
(1337, 'ROTULO DE ORDEN ALFABETICO NORMAL SUFRAGIO - SEA PROVINCIA', '1337', 64, 13, 12, '2022-03-21 10:38:00', 1),
(1338, 'ROTULO DE ORDEN ALFABETICO NORMAL SUFRAGIO - SEA LIMA', '1338', 64, 13, 12, '2022-03-21 10:38:00', 1),
(1339, 'ETIQUETA DE COLORES - PRESIDENCIAL', '1339', 62, 13, 12, '2022-03-21 10:38:08', 1),
(1340, 'ETIQUETA DE COLORES - PARLAMENTO ANDINO', '1340', 62, 13, 12, '2022-03-21 10:38:08', 1),
(1341, 'ETIQUETA DE COLORES - CONGRESISTAS', '1341', 62, 13, 12, '2022-03-21 10:38:08', 1),
(1342, 'ETIQUETA DE COLOR ANARANJADO', '1342', 62, 13, 12, '2022-03-21 10:38:08', 1),
(1343, 'PAQUETE DE CARTEL DE DIFUSION-EXTRANJERO', '1343', 82, 3, 12, '2022-03-21 10:37:47', 1),
(1344, 'ROTULO FRONTAL DE PAQUETE DEL COORDINADOR - CAPA STAE', '1344', 64, 13, 12, '2022-03-21 10:38:02', 1),
(1345, 'DOCUMENTOS ELECTORALES - CONTINGENCIA', '1345', 92, 13, 12, '2022-03-21 10:38:20', 1),
(1346, 'FM03-GOECOR/JEL - SEA - CONTROL DE DISTRIBUCION DEL MATERIAL DURANTE LA JORNADA ELECTORAL', '1346', 66, 13, 12, '2022-03-21 10:37:53', 1),
(1347, 'ROTULO DE BGAN - SEA LIMA - SIMULACRO', '1347', 64, 13, 12, '2022-03-21 10:37:58', 1),
(1348, 'CEDULA SUFRAGIO LIMA', '1348', 92, 13, 12, '2022-03-21 10:38:19', 1),
(1349, 'PLANTILLA BRAILLE SUFRAGIO', '1349', 92, 13, 12, '2022-03-21 10:38:20', 1),
(1350, 'BGAN SEA', '1350', 111, 3, 12, '2022-03-21 10:37:26', 1),
(1351, 'PQTE CON SEÑALES Y ROTULOS PARA LOCAL DE VOTACION CON-EXTRANJERO', '1351', 67, 3, 12, '2022-03-21 10:38:16', 1),
(1352, 'TRANSMISION SEA', '1352', 42, 3, 12, '2022-03-21 10:38:33', 1),
(1353, 'MODEN ALCATEL', '1353', 42, 3, 12, '2022-03-21 10:38:31', 1),
(1354, 'CAJA CON MATERIAL ELECTORAL SEA-SIMULACRO', '1354', 68, 3, 12, '2022-03-21 10:38:12', 1),
(1355, 'MATERIAL ELECTORAL', '1355', 68, 3, 12, '2022-03-21 10:38:12', 1),
(1356, 'PAQUETE DEL COORDINADOR DEL LOCAL DE VOTACION SEA LIMA', '1356', 67, 3, 12, '2022-03-21 10:38:16', 1),
(1357, 'CAJA CON MATERIAL DE RESERVA', '1357', 67, 3, 12, '2022-03-21 10:38:13', 1),
(1358, 'ANFORA DE VOTACION SIMULACRO GITE', '1358', 65, 3, 12, '2022-03-21 10:38:06', 1),
(1359, 'CABINAS DE VOTACION SIMULACRO GITE', '1359', 67, 3, 12, '2022-03-21 10:38:13', 1),
(1360, 'DISPOSITIVO USB CAPACITACION', '1360', 12, 13, 12, '2022-03-21 10:52:20', 1),
(1361, 'USB SIMULACRO PRUEBAS', '1361', 12, 13, 12, '2022-03-21 10:52:21', 1),
(1362, 'ROTULO DE INVERSOR STAE', '1362', 64, 13, 12, '2022-03-21 10:37:59', 1),
(1363, 'FM02-GOECOR/RME - SEA - HOJA DE RUTA PARA EL REPLIEGUE DE DOCUMENTOS ELECTORALES', '1363', 66, 13, 12, '2022-03-21 10:37:53', 1),
(1364, 'ROTULO PARA CAJA DE TRASLADO SUFRAGIO LIMA', '1364', 64, 11, 12, '2022-03-21 10:38:05', 1),
(1365, 'ROTULO DE MESA PARA ANFORA DE VOTACION SUFRAGIO LIMA', '1365', 64, 11, 12, '2022-03-21 10:37:59', 1),
(1366, 'ROTULO FRONTAL DE CABINA DE VOTACION SUFRAGIO LIMA', '1366', 64, 11, 12, '2022-03-21 10:38:01', 1),
(1367, 'ROTULO FRONTAL DE ANFORAS PLEGADAS SUFRAGIO LIMA', '1367', 64, 11, 12, '2022-03-21 10:38:01', 1),
(1368, 'ACTA PADRON (DOCUMENTO Y LISTA) SUFRAGIO LIMA', '1368', 92, 13, 12, '2022-03-21 10:38:19', 1),
(1369, 'ROTULO DE CONTINGENCIA SUFRAGIO - SEA PROV', '1369', 64, 13, 12, '2022-03-21 10:37:59', 1),
(1370, 'ROTULO DE CONTINGENCIA SUFRAGIO - SEA LIMA', '1370', 64, 13, 12, '2022-03-21 10:37:59', 1),
(1371, 'ETIQUETAS AUTOADHESIVAS A4 C/ROJO', '1371', 11, 13, 12, '2022-03-21 10:52:24', 1),
(1372, 'ETIQUETAS AUTOADHESIVAS A4 C/NARANJA', '1372', 11, 13, 12, '2022-03-21 10:52:24', 1),
(1373, 'ETIQUETAS AUTOADHESIVAS A4 C/PLOMO', '1373', 11, 13, 12, '2022-03-21 10:52:24', 1),
(1374, 'ETIQUETAS AUTOADHESIVAS A4 C/VERDE', '1374', 11, 13, 12, '2022-03-21 10:52:24', 1),
(1375, 'CINTA AMARILLA P/CIERRE DE S/COLORES x 250MT SUFRAGIO', '1375', 73, 17, 12, '2022-03-21 10:37:39', 1),
(1376, 'ETIQUETAS AUTOADHESIVAS A4 C/MORADO', '1376', 11, 13, 12, '2022-03-21 10:52:24', 1),
(1377, 'CAJA CON MATERIAL ELECTORAL DE SUFRAGIO -CONV-PROVINCIA', '1377', 68, 3, 12, '2022-03-21 10:38:12', 1),
(1378, 'CAJA CON MATERIAL ELECTORAL-SUFRAGIO-PROVINCIA', '1378', 68, 3, 12, '2022-03-21 10:38:12', 1),
(1379, 'PAQUETE DE INSTALACION CON-PROVINCIA', '1379', 68, 3, 12, '2022-03-21 10:38:12', 1),
(1380, 'CAJA CON SEÑALES Y ROTULOS PARA EL LOCAL DE VOTACION CONV-SUGRAGIO', '1380', 67, 3, 12, '2022-03-21 10:38:14', 1),
(1381, 'PQT CON SEÑALES Y ROTULOS PARA EL LOCAL DE VOTACION SUFRAGIO-CON-PROVINCIA', '1381', 67, 3, 12, '2022-03-21 10:38:16', 1),
(1382, 'CAJA CON MATERIAL DE RESERVA PROVINCIA', '1382', 67, 3, 12, '2022-03-21 10:38:13', 1),
(1383, 'DOCUMENTOS UTILIZADOS', '1383', 121, 3, 12, '2022-03-21 10:38:21', 1),
(1384, 'PAQUETE CON SEÑALETICA', '1384', 123, 3, 12, '2022-03-21 10:38:22', 1),
(1385, 'OTROS REP', '1385', 123, 3, 12, '2022-03-21 10:38:21', 1),
(1386, 'CABINA PORTATILES REP', '1386', 122, 3, 12, '2022-03-21 10:38:21', 1),
(1387, 'PAQUETE DE COORDINADOR DEL LOCAL DE VOTACION CON-PROVINCIA', '1387', 67, 3, 12, '2022-03-21 10:38:14', 1),
(1388, 'MASCARILLA PARA BIOSEGURIDAD', '1388', 32, 13, 12, '2022-03-21 10:37:30', 1),
(1389, 'CINTA SCOTH 1 x 36 YDS', '1389', 11, 17, 12, '2022-03-21 10:52:23', 1),
(1390, 'CINTA ADHESIVA DE EMBALAJE HABANO 5.08 X100 MTS', '1390', 73, 17, 12, '2022-03-21 10:37:39', 1),
(1391, 'PLANTILLA BRAILLE SUFRAGIO EXTRANJERO', '1391', 92, 13, 12, '2022-03-21 10:38:20', 1),
(1392, 'SEPARADORES P/REPUESTO KODAK', '1392', 12, 13, 12, '2022-03-21 10:52:21', 1),
(1393, 'NEUMATICO P/REPUESTO KODAK', '1393', 12, 13, 12, '2022-03-21 10:52:20', 1),
(1394, 'CONSTANCIA DE ASISTENCIA A SUFRAGAR EXTRANJERO SUF', '1394', 64, 13, 12, '2022-03-21 10:37:55', 1),
(1395, 'PAQUETE DE COORDINADOR DEL LOCAL DE VOTACION SEA', '1395', 67, 3, 12, '2022-03-21 10:38:14', 1),
(1396, 'PAQUETE DE COORDINADOR DEL LOCAL DE VOTACION CON-LIMA', '1396', 67, 3, 12, '2022-03-21 10:38:14', 1),
(1397, 'CAJA CON MATERIAL DE RESERVA SEA', '1397', 67, 3, 12, '2022-03-21 10:38:13', 1),
(1398, 'CARTILLA DE HOLOGRAMAS NACIONAL SUF', '1398', 92, 13, 12, '2022-03-21 10:38:19', 1),
(1399, 'ROTULO DEL PAQUETE DE UTILES', '1399', 64, 13, 12, '2022-03-21 10:38:01', 1),
(1400, 'PAQUETE DE ESCRUTINIO CONV CAPAC', '1400', 67, 11, 12, '2022-03-21 10:38:14', 1),
(1401, 'CARTILLA DE HOLOGRAMAS DOBLADAS', '1401', 91, 13, 12, '2022-03-21 10:38:17', 1),
(1402, 'ROTULO DE LAPTOP SEA', '1402', 64, 13, 12, '2022-03-21 10:37:59', 1),
(1403, 'MANIJA P/ESCRITORIO BEIGE', '1403', 48, 13, 12, '2022-03-21 10:38:37', 1),
(1404, 'ETIQUETA AUTOADHESIVA EN BLANCO', '1404', 70, 13, 12, '2022-03-21 10:37:39', 1),
(1405, 'ROTULO FRONTAL DE SUFRAGIO', '1405', 64, 13, 12, '2022-03-21 10:38:03', 1),
(1406, 'ROTULO LATERAL DE SUFRAGIO', '1406', 64, 13, 12, '2022-03-21 10:38:04', 1),
(1407, 'ROTULO MESA ANFORA DE SUFRAGIO', '1407', 64, 13, 12, '2022-03-21 10:38:04', 1),
(1408, 'HOJA DE RESUMEN DERECHOS Y PROHIBICIONES PERSONEROS SUF', '1408', 81, 13, 12, '2022-03-21 10:37:48', 1),
(1409, 'HOJA DE RESUMEN EXTRANJERO SUF.', '1409', 81, 13, 12, '2022-03-21 10:37:48', 1),
(1410, 'HOJA DE RESUMEN SEA SUF.', '1410', 81, 13, 12, '2022-03-21 10:37:48', 1),
(1411, 'MASCARILLA KN-95', '1411', 32, 13, 12, '2022-03-21 10:37:30', 1),
(1412, 'CARTEL DE CANDIDATOS PARA DIFUSION - SUF LIMA Y CALLAO', '1412', 82, 13, 12, '2022-03-21 10:37:47', 1),
(1413, 'TONER DE IMPRESION CIAN - LEXMARK Cod.Ref. C950X2CG', '1413', 14, 18, 12, '2022-03-21 10:52:19', 1),
(1414, 'TONER DE IMPRESORA HP W9037MC NEGRO', '1414', 14, 18, 12, '2022-03-21 10:52:19', 1),
(1415, 'ETIQUETAS CENTRO DE ACOPIO (ANFORA) LIMA', '1415', 62, 13, 12, '2022-03-21 10:38:08', 1),
(1416, 'HOJA DE RESUMEN DE COMO CONDUCIR LA MESA DE SUFRAGIO NACIONAL', '1416', 81, 13, 12, '2022-03-21 10:37:48', 1),
(1417, 'FE DE ERRATAS PARA EL SOBRE PLASTICO C/ANARANJADO', '1417', 62, 13, 12, '2022-03-21 10:38:09', 1),
(1418, 'CORRECTOR DE PLACA POSITIVA 100ml', '1418', 14, 13, 12, '2022-03-21 10:52:17', 1),
(1419, 'FUNDA TUBULAR ANCHA 170mm', '1419', 14, 9, 12, '2022-03-21 10:52:17', 1),
(1420, 'LEVANTADOR DE MANTILLA DE 115gr', '1420', 14, 18, 12, '2022-03-21 10:52:18', 1),
(1421, 'LIMPIADOR DE PLANCHAS x1LT', '1421', 14, 8, 12, '2022-03-21 10:52:18', 1),
(1422, 'DILUYENTE LIQUIDO x1LT', '1422', 14, 18, 12, '2022-03-21 10:52:17', 1),
(1423, 'MANTILLA COMPRESIBLE DE 47cmX42cm', '1423', 14, 18, 12, '2022-03-21 10:52:18', 1),
(1424, 'MANTILLA COMPRESIBLE DE 675cm x 580cm x1.95cm', '1424', 14, 18, 12, '2022-03-21 10:52:18', 1),
(1425, 'SOLUCION DE FUENTE x 01Galon', '1425', 14, 18, 12, '2022-03-21 10:52:19', 1),
(1426, 'PASTA LIMPIADORA DE RODILLO x1KG', '1426', 14, 18, 12, '2022-03-21 10:52:18', 1),
(1427, 'PASTA SUAVIZANTE PARA TINTA OFFSET x1KG', '1427', 14, 7, 12, '2022-03-21 10:52:19', 1),
(1428, 'TINTA IMPRESION OFFSET AMARILLA x2.5KG', '1428', 14, 18, 12, '2022-03-21 10:52:19', 1),
(1429, 'TINTA IMPRESION OFFSET AZUL BRONCE x1KG', '1429', 14, 18, 12, '2022-03-21 10:52:19', 1),
(1430, 'TINTA IMPRESION OFFSET AZUL REFLEJO x1KG', '1430', 14, 18, 12, '2022-03-21 10:52:19', 1),
(1431, 'TINTA IMPRESION OFFSET MAGENTA x2.5KG', '1431', 14, 18, 12, '2022-03-21 10:52:19', 1),
(1432, 'TINTA IMPRESION OFFSET NEGRO x2.5KG', '1432', 14, 18, 12, '2022-03-21 10:52:19', 1),
(1433, 'TINTA IMPRESION OFFSET ROJO FUEGO x1KG', '1433', 14, 18, 12, '2022-03-21 10:52:19', 1),
(1434, 'TINTA IMPRESION OFFSET CIAN x2.5KG', '1434', 14, 18, 12, '2022-03-21 10:52:19', 1),
(1435, 'PAQUETE DE CONTINGENCIA SEA', '1435', 68, 3, 12, '2022-03-21 10:38:12', 1),
(1436, 'FM57-GITE/TI REGISTRO DE PRUEBAS DE FUNCIONALIDAD', '1436', 64, 13, 12, '2022-03-21 10:37:56', 1),
(1437, 'PAPELOGRAFO BLANCO 120g / 69cm x 89cm', '1437', 14, 16, 12, '2022-03-21 10:52:18', 1),
(1438, 'LAMINA AUTOADHESIVA 20 x 16 X 4PZA P/PROTECCION DE RESULTADOS', '1438', 62, 14, 12, '2022-03-21 10:38:09', 1),
(1439, 'PAQUETE DE LAMINAS', '1439', 62, 11, 12, '2022-03-21 10:38:11', 1),
(1440, 'POLO ONPE MANGA LARGA TALLA XS C/BLANCO', '1440', 31, 13, 12, '2022-03-21 10:37:32', 1),
(1441, 'POLO ONPE MANGA LARGA TALLA S C/BLANCO', '1441', 31, 13, 12, '2022-03-21 10:37:32', 1),
(1442, 'POLO ONPE MANGA LARGA TALLA M C/BLANCO', '1442', 31, 13, 12, '2022-03-21 10:37:32', 1),
(1443, 'POLO ONPE MANGA LARGA TALLA L C/BLANCO', '1443', 31, 13, 12, '2022-03-21 10:37:32', 1),
(1444, 'POLO ONPE MANGA LARGA TALLA XL C/BLANCO', '1444', 31, 13, 12, '2022-03-21 10:37:32', 1),
(1445, 'CASACA ONPE TALLA S C/AZUL ', '1445', 31, 13, 12, '2022-03-21 10:37:31', 1),
(1446, 'CASACA ONPE TALLA M C/AZUL ', '1446', 31, 13, 12, '2022-03-21 10:37:31', 1),
(1447, 'CASACA ONPE TALLA L C/AZUL ', '1447', 31, 13, 12, '2022-03-21 10:37:31', 1),
(1448, 'CASACA ONPE TALLA XXL C/AZUL ', '1448', 31, 13, 12, '2022-03-21 10:37:31', 1),
(1449, 'CASCO CON FACIAL P/ SOLDAR', '1449', 32, 13, 12, '2022-03-21 10:37:28', 1),
(1450, 'PEGAMENTO INSTANTANEO x3G', '1450', 48, 18, 12, '2022-03-21 10:38:37', 1),
(1451, 'SOLDADURA CELLOCORD 1/8 (VARILLA )', '1451', 47, 7, 12, '2022-03-21 10:38:45', 1),
(1452, 'ABRAZADERA FIERRO GALVANIZADO 1/2 2orejas', '1452', 47, 13, 12, '2022-03-21 10:38:37', 1),
(1453, 'ABRAZADERA FIERRO GALVANIZADO 3/4 2orejas', '1453', 47, 13, 12, '2022-03-21 10:38:37', 1),
(1454, 'CLAVO ACERO P/FIJACION', '1454', 47, 18, 12, '2022-03-21 10:38:39', 1),
(1455, 'DISCO DE CORTE DE CONCRETO 4 1/2 NORTON', '1455', 47, 13, 12, '2022-03-21 10:38:40', 1),
(1456, 'GRAPA PVC P/CABLE DE ACERO', '1456', 47, 13, 12, '2022-03-21 10:38:41', 1),
(1457, 'PANELES DE YESO  1/2 - 1.22 x 2.44 mts', '1457', 48, 13, 12, '2022-03-21 10:38:37', 1),
(1458, 'PANEL FIBRACEMENTO 6mm -1.22 X 2.44mts', '1458', 48, 13, 12, '2022-03-21 10:38:37', 1),
(1459, 'PARANTES DRYWALL x3MTS', '1459', 48, 13, 12, '2022-03-21 10:38:37', 1),
(1460, 'RIELES DRYWALL 25mm x 90mm x 3mts', '1460', 48, 13, 12, '2022-03-21 10:38:37', 1),
(1461, 'MASILLA DRYWALL x5kg', '1461', 48, 13, 12, '2022-03-21 10:38:37', 1),
(1462, 'DISCO CORTE DE MADERA 7 1/4 BOSCH', '1462', 48, 13, 12, '2022-03-21 10:38:36', 1),
(1463, 'ESQUINERO P/CANALETA PVC 1/2', '1463', 48, 13, 12, '2022-03-21 10:38:36', 1),
(1464, 'CAJAS DE ARCHIVO C/DOCUM ELECTORALES - CUSTODIA', '1464', 34, 4, 12, '2022-03-21 10:37:36', 1),
(1465, 'RESISTENCIA P/SELLADORA 12CM', '1465', 45, 13, 12, '2022-03-21 10:52:14', 1),
(1466, 'TEFLON P/SELLADORA ', '1466', 45, 20, 12, '2022-03-21 10:52:15', 1),
(1467, 'CONECTOR PVC 1- 1/2', '1467', 45, 13, 12, '2022-03-21 10:47:20', 1),
(1468, 'ENCHUFE MONOFASICO PLANO', '1468', 45, 13, 12, '2022-03-21 10:47:20', 1),
(1469, 'PLUMON GRUESO INDELEBLE C/AZUL', '1469', 11, 13, 12, '2022-03-21 10:52:26', 1),
(1470, 'ENCHUFE SIMPLE 90 MONOFASICO PLANO', '1470', 45, 13, 12, '2022-03-21 10:47:20', 1),
(1471, 'PLUMON GRUESO INDELEBLE C/ROJO', '1471', 11, 13, 12, '2022-03-21 10:52:26', 1),
(1472, 'ENCHUFE SIMPLE RECTO MONOFASICO PLANO', '1472', 45, 13, 12, '2022-03-21 10:47:20', 1),
(1473, 'FOCO LED UFO 15w LUZ BLANCA', '1473', 45, 13, 12, '2022-03-21 10:47:20', 1),
(1474, 'INTERRUPTOR SIMPLE PARA ADOSAR 16A', '1474', 45, 13, 12, '2022-03-21 10:47:21', 1),
(1475, 'INTERRUPTOR TERMOMAGNETICO 3x100A RIEL', '1475', 45, 13, 12, '2022-03-21 10:47:21', 1),
(1476, 'SOCKETS P/ FOCO DE ADOSAR', '1476', 45, 13, 12, '2022-03-21 10:52:15', 1),
(1477, 'SOCKETS E27 P/ INTEMPERIE', '1477', 45, 13, 12, '2022-03-21 10:52:14', 1),
(1478, 'TOMACORRIENTES PESADO P/ ADOSAR DOBLES 16A', '1478', 45, 13, 12, '2022-03-21 10:52:15', 1),
(1479, 'TORNILLO SPACK 4.5 x50', '1479', 47, 13, 12, '2022-03-21 10:38:48', 1),
(1480, 'TORNILLO SPACK 4x25', '1480', 47, 13, 12, '2022-03-21 10:38:48', 1),
(1481, 'TORNILLO SPACK 4x35', '1481', 47, 13, 12, '2022-03-21 10:38:48', 1),
(1482, 'TORNILLO WAFER PUNTA BROCA 8x1/2', '1482', 47, 13, 12, '2022-03-21 10:38:48', 1),
(1483, 'TORNILLO WAFER PUNTA FINA 8x1/2', '1483', 47, 13, 12, '2022-03-21 10:38:48', 1),
(1484, 'INTERRUPTOR TERMOM. ENGRAMPE 3x63A', '1484', 47, 13, 12, '2022-03-21 10:38:41', 1),
(1485, 'ABRAZADERA TUBERIA DE 2- DE 2OREJAS', '1485', 47, 13, 12, '2022-03-21 10:38:37', 1),
(1486, 'DISCO CORTE METAL 4 1/2 P/ AMOLADORA', '1486', 47, 13, 12, '2022-03-21 10:38:40', 1),
(1487, 'CLAVO ACERO 1 PARA FULMINANTE ', '1487', 47, 13, 12, '2022-03-21 10:38:39', 1),
(1488, 'DISCO DE DESBASTE 4 1/2 P/ AMOLEDORA', '1488', 47, 13, 12, '2022-03-21 10:38:40', 1),
(1489, 'ESCOBILLA DE METAL 4 1/2 PARA AMOLADORA', '1489', 47, 13, 12, '2022-03-21 10:38:40', 1),
(1490, 'BARRA ROSCADA GALVANIZADA DE 3/8 x1MT', '1490', 47, 13, 12, '2022-03-21 10:38:38', 1),
(1491, 'FULMINANTE Nro22 VERDE - DRYWALL', '1491', 47, 13, 12, '2022-03-21 10:38:40', 1),
(1492, 'PERNO 1/4 x1 x2h', '1492', 47, 13, 12, '2022-03-21 10:38:43', 1),
(1493, 'PERNO GALVANIZADO 3/8 x1 1/2 x2H', '1493', 47, 13, 12, '2022-03-21 10:38:43', 1),
(1494, 'STOVE BOLT 5/32 x1 1/2', '1494', 47, 13, 12, '2022-03-21 10:38:45', 1),
(1495, 'STOVE BOLT 3/16 x1 1/2', '1495', 47, 13, 12, '2022-03-21 10:38:45', 1),
(1496, 'PIEDRA CARBURADA PARA AFILAR', '1496', 47, 13, 12, '2022-03-21 10:38:43', 1),
(1497, 'TARUGO PLASTICO PARA DRYWALL 1 1/2', '1497', 47, 13, 12, '2022-03-21 10:38:46', 1),
(1498, 'TARUGO PLASTICO AZUL 5/16', '1498', 47, 13, 12, '2022-03-21 10:38:46', 1),
(1499, 'TARUGO PLASTICO VERDE 1/4', '1499', 47, 13, 12, '2022-03-21 10:38:46', 1),
(1500, 'TARUGO PLASTICO  ANARANJADO 3/8', '1500', 47, 13, 12, '2022-03-21 10:38:46', 1),
(1501, 'GARRUCHA GIRATORIA  8 C/LLANTA', '1501', 47, 18, 12, '2022-03-21 10:38:40', 1),
(1502, 'TIRAFON DE 1/4  x2', '1502', 47, 13, 12, '2022-03-21 10:38:47', 1),
(1503, 'TIRAFON DE 1/4 x 1-1/2', '1503', 47, 13, 12, '2022-03-21 10:38:47', 1),
(1504, 'TORNILLO AUTOPERFORANTE 10x1', '1504', 47, 13, 12, '2022-03-21 10:38:47', 1),
(1505, 'TORNILLO AUTORROSCANTE 10x1 1/2', '1505', 47, 13, 12, '2022-03-21 10:38:47', 1),
(1506, 'TORNILLO AUTORROSCANTE 8x1 ', '1506', 47, 13, 12, '2022-03-21 10:38:47', 1),
(1507, 'TORNILLO AUTOPERFORANTE 12x2 ', '1507', 47, 13, 12, '2022-03-21 10:38:47', 1),
(1508, 'TORNILLO PUNTA BROCA  7x 7/16 - DRYWALL', '1508', 47, 13, 12, '2022-03-21 10:38:47', 1),
(1509, 'TORNILLO PUNTA FINA 6x1 - DRYWALL', '1509', 47, 13, 12, '2022-03-21 10:38:47', 1),
(1510, 'TORNILLO PUNTA FINA 7x 7/16 - DRYWALL', '1510', 47, 13, 12, '2022-03-21 10:38:47', 1),
(1511, 'ADAPTADOR CON ROSCA DE PVC 1/2', '1511', 45, 13, 12, '2022-03-21 10:38:50', 1),
(1512, 'BARNIZ MARINO', '1512', 48, 5, 12, '2022-03-21 10:38:36', 1),
(1513, 'COLA P/MADERA COLOR BLANCA CLASICA', '1513', 48, 5, 12, '2022-03-21 10:38:36', 1),
(1514, 'LACA SELLADORA P/MADERA', '1514', 48, 5, 12, '2022-03-21 10:38:36', 1),
(1515, 'BARNIZ CERAMICO EN FRIO', '1515', 47, 5, 12, '2022-03-21 10:38:38', 1),
(1516, 'THINNER STANDAR 3.5 ltrs', '1516', 47, 5, 12, '2022-03-21 10:38:46', 1),
(1517, 'VALVULA GLOBO DE BRONCE 1/2', '1517', 47, 13, 12, '2022-03-21 10:38:48', 1),
(1518, 'YEE PVC 1/2', '1518', 47, 13, 12, '2022-03-21 10:38:49', 1),
(1519, 'CABLE VULCANIZADO 100mts 2X8', '1519', 45, 17, 12, '2022-03-21 10:47:19', 1),
(1520, 'AGUA DE MESA SIN GAS X 625 ML', '1520', 52, 2, 12, '2022-03-21 10:37:27', 1),
(1521, 'CABINA DE VOTACIÓN DE CARTON DE VOTO ELECTRONICO VEP', '1521', 65, 13, 12, '2022-03-21 10:38:07', 1),
(1522, 'CANON IMAGE RUNNER 2525 ALMOHADILLA DE SEPARACIÓN', '1522', 12, 13, 12, '2022-03-21 10:52:19', 1),
(1523, 'SHARP MX-M503N UNIDAD FUSORA 220V', '1523', 12, 13, 12, '2022-03-21 10:52:21', 1),
(1524, 'CANON IMAGE RUNNER 2525 RUEDA DE BANDEJAS', '1524', 12, 13, 12, '2022-03-21 10:52:20', 1),
(1525, 'CANON IMAGE RUNNER 2525 RUEDA DE TRANSFERENCIA', '1525', 12, 13, 12, '2022-03-21 10:52:20', 1),
(1526, ' CANON IMAGE RUNNER 2525 REVELADO', '1526', 12, 13, 12, '2022-03-21 10:52:19', 1),
(1527, 'CANON IMAGE RUNNER 2525 RODILLO DE RECOGIDA', '1527', 12, 13, 12, '2022-03-21 10:52:20', 1),
(1528, 'CANON IMAGE RUNNER 2525 UNIDAD DE IMAGEN ', '1528', 12, 13, 12, '2022-03-21 10:52:20', 1),
(1529, 'TONER XEROX', '1529', 12, 13, 12, '2022-03-21 10:52:21', 1),
(1530, 'FOLDER BLANCO C/LOGO ONPE T-OFICIO', '1530', 11, 13, 12, '2022-03-21 10:52:24', 1),
(1531, 'SOBRE MANILA RADIOGRAFICO', '1531', 11, 13, 12, '2022-03-21 10:52:28', 1),
(1532, 'CINTA ADHESIVA DE EMBALAJE C/TABACO 2 \" X 100M', '1532', 11, 17, 12, '2022-03-21 10:52:22', 1),
(1533, 'GUANTES LATEX DESCARTABLES X 50 PARES T - L', '1533', 32, 4, 12, '2022-03-21 10:37:29', 1),
(1534, 'GUARDAPOLVO C/BEIGE M/CORTA TALLA S', '1534', 31, 18, 12, '2022-03-21 10:37:31', 1),
(1535, 'FILTRO P/RESPIRADOR 3M', '1535', 32, 18, 12, '2022-03-21 10:37:29', 1),
(1536, 'RESPIRADOR AMRLL CHEMICAL NP 305 S/ FLITRO', '1536', 32, 18, 12, '2022-03-21 10:37:30', 1),
(1537, 'CABLE DE RED', '1537', 45, 18, 12, '2022-03-21 10:38:51', 1),
(1538, 'SILICONA LIQUIDA 250 ML', '1538', 48, 18, 12, '2022-03-21 10:38:37', 1),
(1539, 'GARRUCHA FIJA 3 C/LLANTA CAUCHO', '1539', 47, 5, 12, '2022-03-21 10:38:40', 1),
(1540, 'TABLERO DE MADERA', '1540', 11, 13, 12, '2022-03-21 10:52:28', 1),
(1541, 'HERVIDOR ELECTRICO', '1541', 45, 13, 12, '2022-03-21 10:47:21', 1),
(1542, 'IMPRESORA A INYECCION DE TINTA EPSON', '1542', 42, 13, 12, '2022-03-21 10:38:29', 1),
(1543, 'BOLSA NEGRA 25L ', '1543', 33, 17, 12, '2022-03-21 10:37:33', 1),
(1544, 'DETERGENTE 15 KG', '1544', 33, 7, 12, '2022-03-21 10:37:33', 1),
(1545, 'GUANTES LATEX DESCARTABLES T-9 (M)', '1545', 33, 12, 12, '2022-03-21 10:37:34', 1),
(1546, 'DESINFECTANTE DE BAÑO DISCOS ACTIVOS', '1546', 33, 18, 12, '2022-03-21 10:37:33', 1),
(1547, 'ESPONJA 2 EN 1 PARA COCINA', '1547', 33, 18, 12, '2022-03-21 10:37:34', 1),
(1548, 'DESINFECTANTE LIMPIADOR AROMATICO X 1 GAL - PINO', '1548', 33, 5, 12, '2022-03-21 10:37:33', 1),
(1549, 'AMBIENTADOR LIQUIDO X 1 GAL - LAVANDA', '1549', 33, 5, 12, '2022-03-21 10:37:33', 1),
(1550, 'LIMPIA VIDRIOS X 1 GAL ', '1550', 33, 5, 12, '2022-03-21 10:37:34', 1),
(1551, 'BOLSA NEGRA 140 LITROS', '1551', 33, 18, 12, '2022-03-21 10:37:33', 1),
(1552, 'BOLSA NEGRA 75 LITROS', '1552', 33, 18, 12, '2022-03-21 10:37:33', 1),
(1553, 'LIMPIADOR  QUITASARRO CREMOSO  GEL ', '1553', 33, 5, 12, '2022-03-21 10:37:34', 1),
(1554, 'BOLSA DE POLIETILENO DE BIOSEGURIDAD 75 LITROS', '1554', 33, 18, 12, '2022-03-21 10:37:33', 1),
(1555, 'CERA LIQUIDA PARA MUEBLES EN SPRAY 400 ML ', '1555', 33, 18, 12, '2022-03-21 10:37:33', 1),
(1556, 'DETERGENTE EN PASTA LAVA VAJILLA 225 GR ', '1556', 33, 18, 12, '2022-03-21 10:37:33', 1),
(1557, 'DESINFECTANTE LIMPIADOR AROMATICO X 1 GALON - LIMON', '1557', 33, 5, 12, '2022-03-21 10:37:33', 1),
(1558, 'ESCOBILLON DE CERDA PARA PISO X 30 CM', '1558', 33, 18, 12, '2022-03-21 10:37:34', 1),
(1559, 'LIMPIADOR QUITASARRO X 1 GALON ', '1559', 33, 5, 12, '2022-03-21 10:37:34', 1),
(1560, 'DETERGENTE EN GEL LAVA VAJILLA X 1 LT.', '1560', 33, 18, 12, '2022-03-21 10:37:33', 1),
(1561, 'ESCOBA DE POLIPROPILENO 265 MM X 55 MM', '1561', 33, 18, 12, '2022-03-21 10:37:34', 1),
(1562, 'ESCOBILLA DE  MANO ', '1562', 33, 18, 12, '2022-03-21 10:37:34', 1),
(1563, 'PAÑO DE MICROFIBRA 38 CM X 38 CM', '1563', 33, 18, 12, '2022-03-21 10:37:35', 1),
(1564, 'TRAPEADOR DE MICROFIBRA 45 CM X 70 CM', '1564', 33, 18, 12, '2022-03-21 10:37:35', 1),
(1565, 'ABRAZADERA FIERRO GALVANIZADO 3/4 DE UNA OREJA', '1565', 47, 18, 12, '2022-03-21 10:38:37', 1),
(1566, 'TUBO CONDUIT EMT 3/4 X 3 MTS PESADO', '1566', 47, 18, 12, '2022-03-21 10:38:48', 1),
(1567, 'CONECTOR CONDUIT EMT 3/4 PESADO', '1567', 47, 18, 12, '2022-03-21 10:38:39', 1),
(1568, 'UNIONES CONDUIT EMT 3/4 PESADO', '1568', 47, 18, 12, '2022-03-21 10:38:48', 1),
(1569, 'CURVAS CONDUIT EMT 3/4 PESADO', '1569', 47, 18, 12, '2022-03-21 10:38:39', 1),
(1570, 'CAJA MODULAR CONDUIT EMT RECT. 5 SALIDAS 3/4', '1570', 47, 18, 12, '2022-03-21 10:38:38', 1),
(1571, 'CAJA MODULAR RECTANGULAR 2 X 4 DE PVC', '1571', 47, 18, 12, '2022-03-21 10:38:38', 1),
(1572, 'CABLE NH 80  -  4 MM (2 ROJOS Y 2 AMAR)  X 100 MTRS', '1572', 47, 18, 12, '2022-03-21 10:38:38', 1),
(1573, 'TORNILLO DE PACK 4.0 X 30 MM', '1573', 47, 18, 12, '2022-03-21 10:38:47', 1),
(1574, 'TOMACORRIENTE SIMPLE CON LINEA A TIERRA', '1574', 47, 18, 12, '2022-03-21 10:38:47', 1),
(1575, 'SIERRA COPA COBALTADA 25 MM - 1', '1575', 47, 18, 12, '2022-03-21 10:38:45', 1),
(1576, 'JABON LIQUIDO X GALON ', '1576', 33, 18, 12, '2022-03-21 10:37:34', 1),
(1577, 'ESPONJA DE FIBRA SINTETICA ABRASIVA ', '1577', 33, 18, 12, '2022-03-21 10:37:34', 1),
(1578, 'ROTULO FRONTAL KIT DE CAPACITACION TIPO 1 - SEA', '1578', 64, 18, 12, '2022-03-21 10:38:03', 1),
(1579, 'ROTULO FRONTAL KIT DE CAPACITACION TIPO 2 - SEA', '1579', 64, 18, 12, '2022-03-21 10:38:03', 1),
(1580, 'ROTULO FRONTAL KIT DE CAPACITACION TIPO 3 -SEA', '1580', 64, 18, 12, '2022-03-21 10:38:03', 1),
(1581, 'ROTULO FRONTAL KIT DEL FACILITADOR TIPO 1 - SEA', '1581', 64, 18, 12, '2022-03-21 10:38:03', 1),
(1582, 'ROTULO FRONTAL KIT DEL FACILITADOR TIPO 2 - SEA', '1582', 64, 18, 12, '2022-03-21 10:38:03', 1),
(1583, 'ROTULO  FRONTAL KIT DEL FACILITADOR TIPO 3 -SEA', '1583', 64, 18, 12, '2022-03-21 10:37:57', 1),
(1584, 'ROTULO FRONTAL KIT DEL FACILITADOR TIPO 3 - SEA', '1584', 64, 18, 12, '2022-03-21 10:38:03', 1),
(1585, 'ROTULO CARTEL DE OPCIONES EN CONSULTA TIPO 01 - SEA', '1585', 64, 18, 12, '2022-03-21 10:37:58', 1),
(1586, 'ROTULO CARTEL DE OPCIONES EN CONSULTA TIPO 02 - SEA', '1586', 64, 18, 12, '2022-03-21 10:37:58', 1),
(1587, 'ROTULO CARTEL DE OPCIONES EN CONSULTA TIPO 03 - SEA', '1587', 64, 18, 12, '2022-03-21 10:37:58', 1),
(1588, 'ROTULO FRONTAL  MANUAL DE INSTRUCCIONES PARA MIEMBRO DE MESA SEA - CAPAC.', '1588', 64, 18, 12, '2022-03-21 10:38:01', 1),
(1589, 'ROTULO CARTILLA CASOS  ESPECIALES EN LA MESA DE SUFRAGIO SEA - CAPAC.', '1589', 64, 18, 12, '2022-03-21 10:37:58', 1),
(1590, 'ROTULO GUIA PARA MIEMBROS DE MESA EN EL ESCRUTINIO AUTOMATIZADO SEA -CAPAC', '1590', 64, 18, 12, '2022-03-21 10:38:03', 1),
(1591, 'ROTULO CARTILLAS DEL LECTOR TIPO 1  CAPACITACION SEA', '1591', 64, 18, 12, '2022-03-21 10:37:58', 1),
(1592, 'ROTULO CARTILLAS DEL LECTOR TIPO 2  CAPACITACION SEA', '1592', 64, 18, 12, '2022-03-21 10:37:58', 1),
(1593, 'ROTULO CARTILLAS DEL LECTOR TIPO 3  CAPACITACION SEA', '1593', 64, 18, 12, '2022-03-21 10:37:58', 1),
(1594, 'ROTULO CARTILLAS DEL PERSONERO DE MESA CAPACITACION - SEA', '1594', 64, 18, 12, '2022-03-21 10:37:58', 1),
(1595, 'ROTULO CARTILLA INFORMATIVA PARA LOS REPRESENTANTES DEL MINISTERIO PUBLICO ', '1595', 64, 18, 12, '2022-03-21 10:37:58', 1),
(1596, 'ROTULO CARTILLA DE INSTRUCCION PARA EFECTIVOS DE LAS  FF.AA Y PNP', '1596', 64, 18, 12, '2022-03-21 10:37:58', 1),
(1597, 'ROTULO AFICHE COMO VOTAR TIPO 1 ', '1597', 64, 18, 12, '2022-03-21 10:37:57', 1),
(1598, 'ROTULO AFICHE COMO VOTAR TIPO 2', '1598', 64, 18, 12, '2022-03-21 10:37:57', 1),
(1599, 'ROTULO AFICHE COMO VOTAR TIPO 3', '1599', 64, 18, 12, '2022-03-21 10:37:57', 1),
(1600, 'ROTULO AFICHE PASOS DE LA VOTACION (02)', '1600', 64, 18, 12, '2022-03-21 10:37:58', 1),
(1601, 'ROTULO AFICHE RESPETO A LA DIVERSIDAD', '1601', 64, 18, 12, '2022-03-21 10:37:58', 1),
(1602, 'ROTULO CARTILLAS DEL LECTOR ', '1602', 64, 18, 12, '2022-03-21 10:37:58', 1),
(1603, 'ROTULO AFICHE COMO VOTAR', '1603', 64, 18, 12, '2022-03-21 10:37:57', 1),
(1604, 'ETIQUETA DE IMPUGNACION DEL VOTO  - SEA', '1604', 62, 18, 12, '2022-03-21 10:38:08', 1),
(1605, 'INDUMENTARIA POR ODPE', '1605', 31, 18, 12, '2022-03-21 10:37:31', 1),
(1606, 'AFICHE COMO VOTAR', '1606', 82, 18, 12, '2022-03-21 10:37:45', 1),
(1607, 'AFICHE AQUI VOTAMOS TODOS', '1607', 82, 18, 12, '2022-03-21 10:37:45', 1),
(1608, 'AFICHE COMO VOTAR TIPO 2', '1608', 82, 18, 12, '2022-03-21 10:37:45', 1),
(1609, 'AFICHE COMO VOTAR TIPO 3', '1609', 82, 18, 12, '2022-03-21 10:37:45', 1),
(1610, 'FE DE ERRATAS PARA EL SOBRE PLASTICO MORADO', '1610', 64, 18, 12, '2022-03-21 10:37:56', 1),
(1611, 'FE DE ERRATAS PARA EL SOBRE PLASTICO ROJO', '1611', 64, 18, 12, '2022-03-21 10:37:56', 1),
(1612, 'CEDULA DE CAPACITACION TIPO 01', '1612', 91, 11, 12, '2022-03-21 10:38:18', 1),
(1613, 'CEDULA DE CAPACITACION TIPO 02', '1613', 91, 11, 12, '2022-03-21 10:38:18', 1),
(1614, 'CEDULA DE CAPACITACION TIPO 03', '1614', 91, 11, 12, '2022-03-21 10:38:18', 1),
(1615, 'CARTEL DE AUTORIDADES SOMETIDAS A CONSULTA TIPO 01', '1615', 91, 18, 12, '2022-03-21 10:38:17', 1),
(1616, 'CARTEL DE AUTORIDADES SOMETIDAS A CONSULTA TIPO 02', '1616', 91, 18, 12, '2022-03-21 10:38:17', 1),
(1617, 'CARTEL DE AUTORIDADES SOMETIDAS A CONSULTA TIPO 03', '1617', 91, 18, 12, '2022-03-21 10:38:17', 1),
(1618, 'DERECHOS Y PROHIBICIONES DE LA PERSONERA O PERSONERO EN LA MESA DE SUFRAGIO', '1618', 91, 18, 12, '2022-03-21 10:38:18', 1),
(1619, 'COMO CONDUCIR LA MESA DE SUFRAGIO (RESUMEN)', '1619', 91, 18, 12, '2022-03-21 10:38:18', 1),
(1620, 'DOCUMENTOS ELECTORALES TIPO 01', '1620', 91, 18, 12, '2022-03-21 10:38:18', 1),
(1621, 'DOCUMENTOS ELECTORALES TIPO 02', '1621', 91, 18, 12, '2022-03-21 10:38:19', 1),
(1622, 'DOCUMENTOS ELECTORALES TIPO 03', '1622', 91, 18, 12, '2022-03-21 10:38:19', 1),
(1623, 'MANUAL DE INSTRUCCIÓN PARA MIEMBROS DE MESA ', '1623', 81, 13, 12, '2022-03-21 10:37:48', 1),
(1624, 'CARTILLA P/CASOS ESPECIALES EN LA MESA DE SUFRAGIO', '1624', 81, 13, 12, '2022-03-21 10:37:48', 1),
(1625, 'CARTILLA DEL ELECTOR', '1625', 81, 13, 12, '2022-03-21 10:37:47', 1),
(1626, 'CARTILLA DEL PERSONERO DE MESA', '1626', 81, 13, 12, '2022-03-21 10:37:47', 1),
(1627, 'FOLLETO DE MIEMBRO DE MESA', '1627', 83, 13, 12, '2022-03-21 10:37:49', 1),
(1628, 'FOLLETO DEL PERSONERO', '1628', 81, 13, 12, '2022-03-21 10:37:48', 1),
(1629, 'CARTILLA DE ELECTOR TIPO 1 ', '1629', 81, 13, 12, '2022-03-21 10:37:47', 1),
(1630, 'CARTILLA DE ELECTOR TIPO 2', '1630', 81, 13, 12, '2022-03-21 10:37:47', 1),
(1631, 'CARTILLA DE ELECTOR TIPO 3', '1631', 81, 13, 12, '2022-03-21 10:37:47', 1),
(1632, 'BOLSA P/HOLOGRAMAS  (12.50 X 25.50 X 1.5)', '1632', 71, 13, 12, '2022-03-21 10:37:37', 1),
(1633, 'SERVIDOR -PC', '1633', 42, 18, 12, '2022-03-21 10:38:32', 1),
(1634, 'LAPTOP TOSHIBA', '1634', 42, 18, 12, '2022-03-21 10:38:30', 1),
(1635, 'TABLET PAD ', '1635', 42, 18, 12, '2022-03-21 10:38:33', 1),
(1636, 'TERMOMETRO INFRAROJO', '1636', 102, 18, 12, '2022-03-21 10:37:25', 1),
(1637, 'PINTURA A BASE DE LATEX TIPO 1 COLOR RAL7047', '1637', 47, 5, 12, '2022-03-21 10:38:44', 1),
(1638, 'TERMOMETRO INFRAROJO REP', '1638', 113, 3, 12, '2022-03-21 10:37:27', 1),
(1639, 'NIVEL DE BURBUJA GRANDE', '1639', 47, 13, 12, '2022-03-21 10:38:42', 1),
(1640, 'CORTADORA DE VIDRIO', '1640', 47, 13, 12, '2022-03-21 10:38:39', 1),
(1641, 'PISTOLA DE SOLDADURA', '1641', 47, 18, 12, '2022-03-21 10:38:44', 1),
(1642, 'LLAVE FRANCESA', '1642', 47, 18, 12, '2022-03-21 10:38:42', 1),
(1643, 'COMBA', '1643', 47, 18, 12, '2022-03-21 10:38:39', 1),
(1644, 'MARTILLO', '1644', 47, 18, 12, '2022-03-21 10:38:42', 1),
(1645, 'GARLOPA', '1645', 47, 18, 12, '2022-03-21 10:38:40', 1),
(1646, 'PLANCHA PARA EMPASTADO', '1646', 47, 18, 12, '2022-03-21 10:38:44', 1),
(1647, 'ALICATE UNIVERSAL', '1647', 47, 18, 12, '2022-03-21 10:38:38', 1),
(1648, 'ARCO DE SIERRA', '1648', 47, 18, 12, '2022-03-21 10:38:38', 1),
(1649, 'PISTOLA PARA SILICONA', '1649', 47, 18, 12, '2022-03-21 10:38:44', 1),
(1650, 'TIJERA HOJALATERA', '1650', 47, 18, 12, '2022-03-21 10:38:46', 1),
(1651, 'FORMON', '1651', 47, 18, 12, '2022-03-21 10:38:40', 1),
(1652, 'DESTORNILLADOR ESTRELLA', '1652', 47, 18, 12, '2022-03-21 10:38:40', 1),
(1653, 'DESTORNILLADOR PLANO', '1653', 47, 18, 12, '2022-03-21 10:38:40', 1),
(1654, 'LIMA TRIANGULAR', '1654', 47, 18, 12, '2022-03-21 10:38:41', 1),
(1655, 'LIMA PLANA', '1655', 47, 18, 12, '2022-03-21 10:38:41', 1),
(1656, 'ALICATE PUNTA LARGA', '1656', 47, 18, 12, '2022-03-21 10:38:38', 1),
(1657, 'SINCEL EN PUNTA', '1657', 47, 18, 12, '2022-03-21 10:38:45', 1),
(1658, 'PATA DE CABRA PEQUEÑA', '1658', 47, 18, 12, '2022-03-21 10:38:43', 1),
(1659, 'DETECTORES DE HUMO', '1659', 41, 18, 12, '2022-03-21 10:38:34', 1),
(1660, 'PINTURA PARA LOSA C/GRIS CLARO', '1660', 48, 5, 12, '2022-03-21 10:38:37', 1),
(1661, 'PINTURA ESMALTE SINTETICO AZUL ELECTRICO', '1661', 47, 5, 12, '2022-03-21 10:38:44', 1),
(1662, 'PISTOLA P/SILICONA EN BARRA 60W', '1662', 48, 18, 12, '2022-03-21 10:38:37', 1),
(1663, 'ESPEJO DE PARED', '1663', 43, 18, 12, '2022-03-21 10:52:16', 1),
(1664, 'GUANTES DE NEOPRENO T- L', '1664', 32, 12, 12, '2022-03-21 10:37:29', 1),
(1665, 'ZUNCHO', '1665', 48, 17, 12, '2022-03-21 10:38:37', 1),
(1666, 'DESARMADOR ESTRELLA 5MM X4 PULGADAS', '1666', 47, 18, 12, '2022-03-21 10:38:39', 1),
(1667, 'PIN METALICO  P/CARRETILLA HIDRAULICA', '1667', 47, 18, 12, '2022-03-21 10:38:43', 1),
(1668, 'TAPA TORNILLO AUTOADHESIVO NEGRO', '1668', 47, 18, 12, '2022-03-21 10:38:45', 1),
(1669, 'PERNO DE FIERRO 5/8 X 3 1/2', '1669', 47, 18, 12, '2022-03-21 10:38:43', 1),
(1670, 'REMACHE ALUMINIO 4 X 15MM', '1670', 47, 18, 12, '2022-03-21 10:38:44', 1),
(1671, 'TAPACANTO DELGADO BLANCO 3 CM X 22 MM', '1671', 47, 18, 12, '2022-03-21 10:38:45', 1),
(1672, 'TUERCA DE FIERRO 5/8', '1672', 47, 18, 12, '2022-03-21 10:38:48', 1),
(1673, 'ENCHUFE CON ENTRADA USB ', '1673', 12, 18, 12, '2022-03-21 10:52:20', 1),
(1674, 'CAJA DE CUSTODIA ', '1674', 34, 11, 12, '2022-03-21 10:37:36', 1),
(1675, 'PAPELOGRAFO BLANCO 90g / 61cm x 86cm X 250 pzas', '1675', 14, 16, 12, '2022-03-21 10:52:18', 1),
(1676, 'PAPELOGRAFO BLANCO 90g / 61cm x 86cm X 500 pzas', '1676', 14, 16, 12, '2022-03-21 10:52:18', 1),
(1677, 'PAPELOGRAFO BLANCO ALISADO 90g / 61cm x 86cm X 500 pzas', '1677', 14, 16, 12, '2022-03-21 10:52:18', 1),
(1678, 'PAPEL ADHESIVO / 70cm x 100cm  X 100 pzas', '1678', 14, 16, 12, '2022-03-21 10:52:18', 1),
(1679, 'PAPEL COUCHE ADHESIVO 150g / 69cm x 89cm X 250 pzas', '1679', 14, 16, 12, '2022-03-21 10:52:18', 1),
(1680, 'PAPEL DE SEGURIDAD SERIADO P/IMPRESIÓN SEA  (TIPO 2)', '1680', 64, 13, 12, '2022-03-21 10:37:57', 1),
(1681, 'PAPEL DE SEGURIDAD SERIADO P/IMPRESIÓN SEA  (TIPO 3)', '1681', 64, 13, 12, '2022-03-21 10:37:57', 1);
INSERT INTO `producto` (`IdProducto`, `Descripcion`, `CodProducto`, `IdClase`, `IdUma`, `UsuarioCrea`, `FechaCrea`, `Estado`) VALUES
(1682, 'PAPEL FOLCOTE CALIBRE 12 X 100 pzas', '1682', 14, 16, 12, '2022-03-21 10:52:18', 1),
(1683, 'PAPEL COUCHE 150g / 69cm x 89cm X 250pzas', '1683', 14, 16, 12, '2022-03-21 10:52:18', 1),
(1684, 'CARTULINA OPALINA / 70cm x 100cm X 100PZAS', '1684', 14, 16, 12, '2022-03-21 10:52:17', 1),
(1685, 'PAPELOGRAFO BLANCO 56g / 69cm x 89cm X 500 pzas', '1685', 14, 16, 12, '2022-03-21 10:52:18', 1),
(1686, 'PAPELOGRAFO BLANCO 56g / 61cm x 86cm X 500 pzas', '1686', 14, 16, 12, '2022-03-21 10:52:18', 1),
(1687, 'CINTA PARA MAQUINA CONTADORA (CONTOMETRO)', '1687', 14, 17, 12, '2022-03-21 10:52:17', 1),
(1688, 'ESPIRAL 12MM (PAQUETE X 50 pzas)', '1688', 14, 11, 12, '2022-03-21 10:52:17', 1),
(1689, 'ESPIRAL 30MM (PAQUETE X 20 pzas)', '1689', 14, 11, 12, '2022-03-21 10:52:17', 1),
(1690, 'ESPIRAL 25MM (PAQUETE X 10 pzas)', '1690', 14, 11, 12, '2022-03-21 10:52:17', 1),
(1691, 'PAPELOGRAFO BLANCO ALISADO 90g / 61cm x 86cm X 250 pzas', '1691', 14, 16, 12, '2022-03-21 10:52:18', 1),
(1692, 'GOMA PROTECTORA DE PLACA', '1692', 14, 5, 12, '2022-03-21 10:52:18', 1),
(1693, 'REDUCTOR DELGADO P/TINTA', '1693', 14, 8, 12, '2022-03-21 10:52:19', 1),
(1694, 'ULTRA CLEANER P/PLACA', '1694', 14, 8, 12, '2022-03-21 10:52:19', 1),
(1695, 'SOLUCION DE FUENTE  X 5 LITROS', '1695', 14, 5, 12, '2022-03-21 10:52:19', 1),
(1696, 'ALARMA DE INCENDIO CON LUZ  ESTROBOSCOPICA', '1696', 41, 13, 12, '2022-03-21 10:38:34', 1),
(1697, 'SELLO TRODAT 4911 - CONTROL DE CALIDAD', '1697', 11, 13, 12, '2022-03-21 10:52:28', 1),
(1698, 'BOLSA POLIETILENO 95.5 X 91.6 X 2.5 P/CAJA 4 ANFORAS', '1698', 71, 13, 12, '2022-03-21 10:37:38', 1),
(1699, 'BOLSA P/CAJA TRASLADO DE 2 (ANTIGUO) 87.00 X 70.00 X 2.5', '1699', 71, 13, 12, '2022-03-21 10:37:37', 1),
(1700, 'CAJA RODANTE DE MELAMINA', '1700', 43, 13, 12, '2022-03-21 10:52:15', 1),
(1701, 'ETIQUETA AUTOADHESIVA A4', '1701', 11, 13, 12, '2022-03-21 10:52:24', 1),
(1702, 'CARGO DE ENTREGA DE ACTAS Y MATERIAL ELECTORAL AL RESPONSABLE DE LA ONPE Delegados - CAPA', '1702', 64, 13, 12, '2022-03-21 10:37:55', 1),
(1703, 'CARGO DE ENTREGA DE ACTAS Y MATERIAL ELECTORAL AL RESPONSABLE DE LA ONPE REGIONAL - MUNICIPAL CONVEN', '1703', 64, 13, 12, '2022-03-21 10:37:55', 1),
(1704, 'ROTULO  PARA PROTECCION DEL RECUADRO DE OBSERVACIONES - REGIONAL', '1704', 64, 13, 12, '2022-03-21 10:37:57', 1),
(1705, 'ROTULO  PARA PROTECCION DEL RECUADRO DE OBSERVACIONES - MUNICIPAL', '1705', 64, 13, 12, '2022-03-21 10:37:57', 1),
(1706, 'ROTULO  PARA PROTECCION DEL RECUADRO DE OBSERVACIONES - DELEGADOS', '1706', 64, 13, 12, '2022-03-21 10:37:57', 1),
(1707, 'ROTULO DEL PAQUETE DE MATERIALES PARA LA INSTALACION DE LA MESA STAE - CAPA', '1707', 64, 13, 12, '2022-03-21 10:38:01', 1),
(1708, 'ETIQUETA PARA CAJA DE RESTOS ELECTORALES STAE - CAPA', '1708', 64, 13, 12, '2022-03-21 10:37:55', 1),
(1709, 'ROTULO DEL PAQUETE DE MATERIALES PARA EL ESCRUTINIO STAE - CAPA', '1709', 64, 13, 12, '2022-03-21 10:38:00', 1),
(1710, 'CARGO DE ENTREGA DE ACTAS Y MATERIAL ELECTORAL AL RESPONSABLE DE LA ONPE DELEGADOS O MUNICIPAL STAE ', '1710', 64, 13, 12, '2022-03-21 10:37:54', 1),
(1711, 'CARGO DE ENTREGA DE ACTAS Y MATERIAL ELECTORAL AL RESPONSABLE DE LA ONPE REG - MUNI - STAE - CAPA', '1711', 64, 13, 12, '2022-03-21 10:37:55', 1),
(1712, 'ROTULO DEL PAQUETE DE SEÑALES PARA EL LOCAL DE VOTACION STAE - CAPA', '1712', 64, 13, 12, '2022-03-21 10:38:01', 1),
(1713, 'ROTULO DEL PAQUETE DE MATERIALES PARA EL RESPONSABLE  DEL LOCAL DE VOTACION STAE - CAPA', '1713', 64, 13, 12, '2022-03-21 10:38:01', 1),
(1714, 'ROTULO CON EL NUMERO DE MESA DE SUFRAGIO PARA SER COLOCADO EN LA MESA DE SUFRAGIO STAE - CAPA', '1714', 64, 13, 12, '2022-03-21 10:37:58', 1),
(1715, 'ROTULO CON EL NUMERO DE MESA DE SUFRAGIO PARA SER COLOCADO EN  LA CABINA DE VOTACION STAE - CAPA', '1715', 64, 13, 12, '2022-03-21 10:37:58', 1),
(1716, 'ROTULO DE MESA POR ORDEN ALFABETICO STAE - CAPA', '1716', 64, 13, 12, '2022-03-21 10:38:00', 1),
(1717, 'SOBRE CLAVE  PARA EL TECNICO DE TRANSMISION STAE - CAPA', '1717', 64, 13, 12, '2022-03-21 10:38:06', 1),
(1718, 'ACTA DE NO INSTALACION DE MESA DE SUFRAGIO STAE', '1718', 64, 13, 12, '2022-03-21 10:37:54', 1),
(1719, 'ROTULO DEL PAQUETE DE SEÑALES DE BIOSEGURIDAD PARA EL LOCAL DE VOTACION STAE', '1719', 64, 13, 12, '2022-03-21 10:38:01', 1),
(1720, 'ROTULO PARA LAS LAMINAS PARA PROTECCION DEL RECUADRO DE OBSERVACIONES', '1720', 64, 13, 12, '2022-03-21 10:38:05', 1),
(1721, 'BOLSA RECICLAJE IMPRESION GRANDE - STAE - SUF', '1721', 71, 13, 12, '2022-03-21 10:37:38', 1),
(1722, 'ETIQUETA PARA CAJA DE RESTOS ELECTORALES STAE - SUF', '1722', 64, 17, 12, '2022-03-21 10:37:55', 1),
(1723, 'FE DE ERRATAS PARA SOBRE PLASTICO ANARANJADO - ANVERSO ORC - CAPA GENERICO', '1723', 64, 13, 12, '2022-03-21 10:37:56', 1),
(1724, 'FE DE ERRATAS PARA SOBRE PLASTICO ANARANJADO - ANVERSO CAPA GENERICO', '1724', 64, 13, 12, '2022-03-21 10:37:56', 1),
(1725, 'FE DE ERRATAS PARA SOBRE PLASTICO ANARANJADO - REVERSO COLOCAR AQUI - CAPA GENERICO', '1725', 64, 13, 12, '2022-03-21 10:37:56', 1),
(1726, 'FE DE ERRATAS PARA SOBRE PLASTICO PLOMO - ANVERSO ONPE - CAPA GENERICO', '1726', 64, 13, 12, '2022-03-21 10:37:56', 1),
(1727, 'FE DE ERRATAS PARA SOBRE PLASTICO PLOMO - ANVERSO - CAPA GENERICO', '1727', 64, 13, 12, '2022-03-21 10:37:56', 1),
(1728, 'FE DE ERRATAS PARA SOBRE PLASTICO PLOMO - REVERSO COLOCAR AQUI - CAPA STAE', '1728', 64, 13, 12, '2022-03-21 10:37:56', 1),
(1729, 'FE DE ERRATAS PARA SOBRE PLASTICO PLOMO - REVERSO COLOCAR AQUI - CAPA CONVENCIONAL', '1729', 64, 13, 12, '2022-03-21 10:37:56', 1),
(1730, 'FE DE ERRATAS PARA SOBRE PLASTICO MORADO - ANVERSO OEC - CAPA GENERICO', '1730', 64, 13, 12, '2022-03-21 10:37:56', 1),
(1731, 'FE DE ERRATAS PARA SOBRE PLASTICO MORADO - ANVERSO - PARA EL ORGANO ELECTORAL CENTRAL - CAPA GENERIC', '1731', 64, 13, 12, '2022-03-21 10:37:56', 1),
(1732, 'FE DE ERRATAS PARA SOBRE PLASTICO VERDE- REVERSO \"COLOCAR AQUI\" - CAPA GENERICO', '1732', 64, 13, 12, '2022-03-21 10:37:56', 1),
(1733, 'LAMINA DE SEGURIDAD AUTOADHESIVA 20x22x1', '1733', 62, 13, 12, '2022-03-21 10:38:10', 1),
(1734, 'SOBRE PLASTICO PLOMO 30X50 EI 2022', '1734', 63, 13, 12, '2022-03-21 10:37:52', 1),
(1735, 'SOBRE PLASTICO VERDE 30X50 EI 2022', '1735', 63, 13, 12, '2022-03-21 10:37:52', 1),
(1736, 'SOBRE PLASTICO MORADO 30X50 EI 2022', '1736', 63, 13, 12, '2022-03-21 10:37:52', 1),
(1737, 'SOBRE PLASTICO ANARANJADO 30X50 EI 2022', '1737', 63, 13, 12, '2022-03-21 10:37:51', 1),
(1738, 'SOBRE PLASTICO PLOMO 30X50 STAE - EI 2022', '1738', 63, 13, 12, '2022-03-21 10:37:52', 1),
(1739, 'SOBRE P/IMPUGNACION DEL VOTO E IDENTIDAD DEL ELECTOR C/ FE ERRATA - ANVERSO INFERIOR VERDE JNE - CAP', '1739', 64, 13, 12, '2022-03-21 10:38:06', 1),
(1740, 'FE DE ERRATAS PARA SOBRE PLASTICO ANARANJADO - ANVERSO LOGO ONPE - CAPA GENERICO', '1740', 64, 13, 12, '2022-03-21 10:37:56', 1),
(1741, 'RPSTO DE MANTENIM P/ XEROX cod.ref 109R00732', '1741', 12, 6, 12, '2022-03-21 10:52:21', 1),
(1742, 'SOBRE PLAST PLOMO P/REMITIR ACTA Y REPORTE PUESTA CERO VOTOS-ONPE C/CINTA AMARILLA 30 CM X 50 CM STA', '1742', 63, 13, 12, '2022-03-21 10:37:51', 1),
(1743, 'CEDULA MUNICIPAL CAP - EI2022', '1743', 91, 11, 12, '2022-03-21 10:38:18', 1),
(1744, 'GUANTE P/ EXAMEN DESCARTABLE T/ XL', '1744', 32, 4, 12, '2022-03-21 10:37:29', 1),
(1745, 'ROTULO P/ LAMINA P/ PROTECCIÓN RESULT Y RECUADRO OBS - REG - CAP', '1745', 64, 13, 12, '2022-03-21 10:38:04', 1),
(1746, 'ROTULO P/ LAMINA P/ PROTECCIÓN RESULT Y RECUADRO OBS - GENERICO - CAP', '1746', 64, 13, 12, '2022-03-21 10:38:04', 1),
(1747, 'ROTULO P/ LAMINA P/ PROTECCIÓN RESULT Y RECUADRO OBS - DELEGADOS - CAP', '1747', 64, 13, 12, '2022-03-21 10:38:04', 1),
(1748, 'ROTULO P/ LAMINA P/ PROTECCIÓN RESULT Y RECUADRO OBS - MUN - CAP', '1748', 64, 13, 12, '2022-03-21 10:38:04', 1),
(1749, 'Protector Facial p/ Esmerilar ', '1749', 32, 13, 12, '2022-03-21 10:37:30', 1),
(1750, 'CINTA  PELIGRO ROJO 5 x 500m', '1750', 73, 13, 12, '2022-03-21 10:37:39', 1),
(1751, 'LAMINA P/ENMICADO A3 - 30.30 x 42.60', '1751', 11, 13, 12, '2022-03-21 10:52:25', 1),
(1752, 'LAMINA P/ENMICADO A4 - 21.60 x 30.30', '1752', 11, 13, 12, '2022-03-21 10:52:25', 1),
(1753, 'GUANTE ANTICORTE T/ L', '1753', 32, 12, 12, '2022-03-21 10:37:29', 1),
(1754, 'RPSTO LUNA VIDRIO CLARO P/ CARETA DE SOLDAR', '1754', 32, 13, 12, '2022-03-21 10:37:30', 1),
(1755, 'RPSTO LUNA VIDRIO OSCURO P/ CARETA DE SOLDAR', '1755', 32, 13, 12, '2022-03-21 10:37:30', 1),
(1756, 'CADENA SEÑALIZACIÓN PLÁSTICO', '1756', 32, 13, 12, '2022-03-21 10:37:28', 1),
(1757, 'CINTA SEÑALIZACION SEGURIDAD Amarillo', '1757', 32, 13, 12, '2022-03-21 10:37:28', 1),
(1758, 'PALETA PLÁSTICO SIGA 10x15cm Con Soporte 10cm', '1758', 32, 13, 12, '2022-03-21 10:37:30', 1),
(1759, 'PILA RECARGABLE AAA', '1759', 45, 12, 12, '2022-03-21 10:52:14', 1),
(1760, 'SOBRE PLAST PLOMO ONPE C/CINTA AMARILLA 30 CM X 50 CM-CAP', '1760', 63, 13, 12, '2022-03-21 10:37:51', 1),
(1761, 'ANFORA DE VOT- CARTON CORRUGADO 48.70 X 16.40 X 34.40', '1761', 65, 13, 12, '2022-03-21 10:38:06', 1),
(1762, 'ROTULO PQT DE SEÑALES PARA EL LOCAL DE VOTACION - STAE EI2022', '1762', 64, 13, 12, '2022-03-21 10:38:05', 1),
(1763, 'CARGO DE RETENCION DEL DOCUMENTO DE IDENTIDAD - STAE CAPA', '1763', 64, 13, 12, '2022-03-21 10:37:55', 1),
(1764, 'ROTULO FRONTAL PQT SEÑALES Y ROTULOS P/ LV - CONV', '1764', 64, 13, 12, '2022-03-21 10:38:03', 1),
(1765, 'ESQUINERO DE DRYWALL', '1765', 47, 13, 12, '2022-03-21 10:38:40', 1),
(1766, 'SOBRE PLAST ANARANJADO  ORC C/CINTA AMARILLA 30 CM X 50 CM-CAP', '1766', 63, 13, 12, '2022-03-21 10:37:51', 1),
(1767, 'SOBRE PLAST MORADO  ACTA OEC C/CINTA AMARILLA 30 CM X 50 CM-CAP', '1767', 63, 13, 12, '2022-03-21 10:37:51', 1),
(1768, 'SOBRE PLAST VERDE  ACTA JNE C/CINTA AMARILLA 30 CM X 50 CM-CAP', '1768', 63, 13, 12, '2022-03-21 10:37:51', 1),
(1769, 'PALETA PLÁSTICO PARE 10x15cm Con Soporte 10cm', '1769', 32, 13, 12, '2022-03-21 10:37:30', 1),
(1770, 'RODILLO FUJITSU Cod Ref PA03450K011', '1770', 12, 13, 12, '2022-03-21 10:52:20', 1),
(1771, 'RODILLO FRENO FUJITSU Cod Ref PA03450K013', '1771', 12, 13, 12, '2022-03-21 10:52:20', 1),
(1772, 'RODILLO SEPARACION DE PAPEL FUJITSU Cod Ref PA03450K012', '1772', 12, 13, 12, '2022-03-21 10:52:21', 1),
(1773, 'CEDULA REG MUN CAP - EI2022', '1773', 91, 11, 12, '2022-03-21 10:38:18', 1),
(1774, 'LISTA ELECTORES-SUF', '1774', 92, 13, 12, '2022-03-21 10:38:20', 1),
(1775, 'DOCUMENTOS ELECTORALES CONV-SUF', '1775', 92, 13, 12, '2022-03-21 10:38:20', 1),
(1776, 'SOBRE PLAST PLOMO ONPE C/CINTA AMARILLA 30 CM X 50 CM-SUF', '1776', 63, 13, 12, '2022-03-21 10:37:51', 1),
(1777, 'CARTEL CANDIDATOS DELEGADOS NOMINAL', '1777', 82, 13, 12, '2022-03-21 10:37:46', 1),
(1778, 'CARTEL CANDIDATOS DELEGADOS LISTA', '1778', 82, 13, 12, '2022-03-21 10:37:46', 1),
(1779, 'CARTEL CANDIDATOS REG LISTA UNICA', '1779', 82, 13, 12, '2022-03-21 10:37:47', 1),
(1780, 'CARTEL CANDIDATOS REG MACRO REGIONES', '1780', 82, 13, 12, '2022-03-21 10:37:47', 1),
(1781, 'CARTEL CANDIDATOS MUN-PROV', '1781', 82, 13, 12, '2022-03-21 10:37:46', 1),
(1782, 'CARTEL CANDIDATOS MUN-PROV LISTA UNICA', '1782', 82, 13, 12, '2022-03-21 10:37:46', 1),
(1783, 'CARTEL CANDIDATOS MUN-DIST', '1783', 82, 13, 12, '2022-03-21 10:37:46', 1),
(1784, 'CARTEL CANDIDATOS MUN-DIST LISTA UNICA', '1784', 82, 13, 12, '2022-03-21 10:37:46', 1),
(1785, 'CARTEL INSTALACION', '1785', 82, 13, 12, '2022-03-21 10:37:47', 1),
(1786, 'CARTEL SUFRAGIO', '1786', 82, 13, 12, '2022-03-21 10:37:47', 1),
(1787, 'CARTEL ESCRUTINIO', '1787', 82, 13, 12, '2022-03-21 10:37:47', 1),
(1788, 'DOCUMENTOS ELECTORALES STAE-CAP', '1788', 91, 13, 12, '2022-03-21 10:38:18', 1),
(1789, 'DOCUMENTOS ELECTORALES STAE-SUF', '1789', 92, 13, 12, '2022-03-21 10:38:20', 1),
(1790, 'SOBRE C/USB DELEGADOS-SUF', '1790', 63, 13, 12, '2022-03-21 10:37:50', 1),
(1791, 'SOBRE C/USB CANDIDATOS-SUF', '1791', 63, 13, 12, '2022-03-21 10:37:50', 1),
(1792, 'ROTULO PQT MAT RESPONSABLE LV STAE-SUF', '1792', 64, 13, 12, '2022-03-21 10:38:05', 1),
(1793, 'ROTULO PQT MATERIAL CONTINGENCIA-STAE', '1793', 64, 13, 12, '2022-03-21 10:38:05', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `IdProveedor` int(11) NOT NULL,
  `RazonSocial` varchar(100) NOT NULL,
  `Ruc` varchar(255) NOT NULL,
  `Celular` int(11) NOT NULL,
  `UsuarioCrea` int(11) NOT NULL,
  `FechaCrea` datetime NOT NULL DEFAULT current_timestamp(),
  `Estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`IdProveedor`, `RazonSocial`, `Ruc`, `Celular`, `UsuarioCrea`, `FechaCrea`, `Estado`) VALUES
(1, 'ALMACEN CENTRAL', '65333', 5425, 12, '2022-01-23 11:15:49', 1),
(2, 'ALMACEN GGE', '6546546', 65465456, 12, '2022-01-23 12:26:27', 1),
(3, 'ANYPSA CORPORATION', '55444444444', 999944444, 12, '2022-01-23 12:26:46', 1),
(4, 'ANCRO SRL ', '666666', 99999, 12, '2022-01-23 12:29:15', 0),
(15, 'todoo', '8768', 7876, 12, '2022-02-11 15:09:24', 0),
(16, 'raulrr', '65456', 654564, 12, '2022-02-21 10:11:40', 0),
(17, 'mario dtod', '2147483647', 555555555, 12, '2022-02-21 10:23:21', 0),
(18, 'JAVIER HERNANDEZ TIERRA', '21474844444', 963248507, 12, '2022-03-08 11:07:37', 1),
(19, 'fdsfds', '3432', 324324, 12, '2022-03-14 09:33:46', 0),
(20, 'MArianao', '6546', 6546, 12, '2022-03-14 09:35:17', 0),
(21, 'ABCDF', '24444444444', 925637896, 21, '2022-03-14 15:33:44', 1),
(22, 'Maria Joses', '64645646545', 6465465, 12, '2022-03-23 12:13:33', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `requerimiento`
--

CREATE TABLE `requerimiento` (
  `IdRequerimiento` int(11) NOT NULL,
  `Fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `IdProceso` int(11) DEFAULT NULL,
  `IdSucursal` int(11) NOT NULL,
  `IdCentroConsumo` int(11) NOT NULL,
  `IdFase` int(11) DEFAULT 0,
  `Cantidad` int(11) DEFAULT 0,
  `Prioridad` int(11) NOT NULL,
  `Turno` int(11) DEFAULT 0,
  `NroOrden` varchar(100) DEFAULT '0',
  `Actividad` varchar(100) DEFAULT '0',
  `FechaActividad` date DEFAULT NULL,
  `Alinea` varchar(100) DEFAULT '0',
  `Aturno` varchar(100) DEFAULT '0',
  `Observaciones` varchar(100) NOT NULL,
  `IdUsuario` int(11) NOT NULL,
  `UsuarioMod` int(11) DEFAULT NULL,
  `FechaMod` date DEFAULT NULL,
  `Estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `requerimiento`
--

INSERT INTO `requerimiento` (`IdRequerimiento`, `Fecha`, `IdProceso`, `IdSucursal`, `IdCentroConsumo`, `IdFase`, `Cantidad`, `Prioridad`, `Turno`, `NroOrden`, `Actividad`, `FechaActividad`, `Alinea`, `Aturno`, `Observaciones`, `IdUsuario`, `UsuarioMod`, `FechaMod`, `Estado`) VALUES
(70, '2022-03-23 16:45:01', 1, 1, 1, 1, 1, 0, 1, '111', 'hfedgf', '2022-03-23', 'NEDY AVENDAÑO', 'NEDY AVELDAÑO ABC', 'gfdgfdgfd', 12, NULL, NULL, 1),
(71, '2022-03-23 16:45:22', 1, 1, 1, 1, 3, 0, 1, 'dsfds', 'fdsfds', '2022-03-23', 'NORA FLORES', 'JUAN RAMIREZ', 'fdsfds', 12, NULL, NULL, 1),
(72, '2022-03-23 16:45:49', 1, 1, 1, 2, 3433, 0, 1, '3434', '4343', '0000-00-00', 'NEDY AVENDAÑO', 'NEDY AVELDAÑO ABC', '4343', 12, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `responsable`
--

CREATE TABLE `responsable` (
  `id_responsable` int(11) NOT NULL,
  `responsable` varchar(200) NOT NULL,
  `estado` int(11) NOT NULL,
  `user_create` int(11) NOT NULL,
  `date_create` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_update` int(11) NOT NULL,
  `date_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `responsable`
--

INSERT INTO `responsable` (`id_responsable`, `responsable`, `estado`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
(1, ' GONZALES', 1, 1, '2021-03-12 02:34:55', 0, '2022-01-27 05:27:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salida`
--

CREATE TABLE `salida` (
  `IdSalida` int(11) NOT NULL,
  `FechaCrea` datetime NOT NULL DEFAULT current_timestamp(),
  `FechaDoc` date NOT NULL,
  `IdSucursal` int(11) NOT NULL,
  `IdProceso` int(11) NOT NULL,
  `IdCentroConsumo` int(11) NOT NULL,
  `IdPersonalRec` int(11) NOT NULL,
  `IdPersonalEnt` int(11) NOT NULL,
  `Observaciones` varchar(500) NOT NULL,
  `UsuarioCrea` int(11) NOT NULL,
  `UsuarioMod` int(11) DEFAULT NULL,
  `FechaMod` date DEFAULT NULL,
  `Estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stockprod`
--

CREATE TABLE `stockprod` (
  `IdStockProd` int(11) NOT NULL,
  `IdSucursal` int(11) NOT NULL,
  `IdProducto` int(11) NOT NULL,
  `at` int(11) NOT NULL,
  `bt` int(11) NOT NULL,
  `ct` int(11) NOT NULL,
  `Existencia` int(11) NOT NULL,
  `Estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `stockprod`
--

INSERT INTO `stockprod` (`IdStockProd`, `IdSucursal`, `IdProducto`, `at`, `bt`, `ct`, `Existencia`, `Estado`) VALUES
(2081, 1, 546, 1000, 0, 0, 1000, 1),
(2082, 1, 552, 2000, 0, 0, 2000, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursal`
--

CREATE TABLE `sucursal` (
  `IdSucursal` int(11) NOT NULL,
  `Descripcion` varchar(100) NOT NULL,
  `UsuarioCrea` int(11) DEFAULT 0,
  `FechaCrea` datetime DEFAULT current_timestamp(),
  `Estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sucursal`
--

INSERT INTO `sucursal` (`IdSucursal`, `Descripcion`, `UsuarioCrea`, `FechaCrea`, `Estado`) VALUES
(1, 'ALMACEN LURIN', 12, '2022-02-25 14:24:25', 1),
(2, 'ALMACEN2', 12, '2022-02-25 14:24:25', 1),
(9, 'scasc', 21, '2022-03-14 15:21:41', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarjetamovimiento`
--

CREATE TABLE `tarjetamovimiento` (
  `IdTarjetaMov` int(11) NOT NULL,
  `IdSucursal` int(11) NOT NULL,
  `IdCompra` int(11) DEFAULT 0,
  `IdSalida` int(11) DEFAULT 0,
  `IdComprarepliegue` int(11) DEFAULT 0,
  `IdCcalidad` int(11) DEFAULT 0,
  `IdRequerimiento` int(11) DEFAULT 0,
  `TipoMovimiento` int(11) NOT NULL,
  `kardex` int(11) DEFAULT 0,
  `a` int(11) NOT NULL,
  `b` int(11) NOT NULL,
  `c` int(11) NOT NULL,
  `at` int(11) NOT NULL,
  `bt` int(11) NOT NULL,
  `ct` int(11) NOT NULL,
  `IdProducto` int(11) NOT NULL,
  `Entrada` int(11) NOT NULL,
  `Salida` int(11) NOT NULL,
  `Existencia` int(11) NOT NULL,
  `UsuarioCrea` int(11) NOT NULL,
  `FechaCrea` datetime NOT NULL DEFAULT current_timestamp(),
  `Estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tarjetamovimiento`
--

INSERT INTO `tarjetamovimiento` (`IdTarjetaMov`, `IdSucursal`, `IdCompra`, `IdSalida`, `IdComprarepliegue`, `IdCcalidad`, `IdRequerimiento`, `TipoMovimiento`, `kardex`, `a`, `b`, `c`, `at`, `bt`, `ct`, `IdProducto`, `Entrada`, `Salida`, `Existencia`, `UsuarioCrea`, `FechaCrea`, `Estado`) VALUES
(2348, 1, 75, 0, 0, 0, 0, 1, 1, 1000, 0, 0, 0, 0, 0, 546, 1000, 0, 1000, 12, '2022-03-23 16:43:40', 1),
(2349, 1, 76, 0, 0, 0, 0, 1, 1, 2000, 0, 0, 0, 0, 0, 552, 2000, 0, 2000, 12, '2022-03-23 16:44:14', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarjetaproducto`
--

CREATE TABLE `tarjetaproducto` (
  `IdTarjetaProd` int(11) NOT NULL,
  `IdProducto` int(11) NOT NULL,
  `IdEstado` int(11) NOT NULL,
  `Stock` int(255) NOT NULL,
  `UsuarioCrea` int(11) NOT NULL,
  `FechaCrea` datetime NOT NULL DEFAULT current_timestamp(),
  `Estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipodocumento`
--

CREATE TABLE `tipodocumento` (
  `IdTipoDocumento` int(11) NOT NULL,
  `Descripcion` varchar(100) NOT NULL,
  `UsuarioCrea` int(11) DEFAULT 0,
  `FechaCrea` datetime NOT NULL DEFAULT current_timestamp(),
  `Estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipodocumento`
--

INSERT INTO `tipodocumento` (`IdTipoDocumento`, `Descripcion`, `UsuarioCrea`, `FechaCrea`, `Estado`) VALUES
(1, 'GUIA DE REMISION ', 12, '2022-02-25 15:03:57', 1),
(2, 'ACTA DE ENTREGA', 12, '2022-02-25 15:03:57', 1),
(3, 'AJUSTE POR INVENTARIO', 12, '2022-02-25 15:03:57', 1),
(4, 'AAAAAAAAAAA', 12, '2022-02-25 15:17:16', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoextornar`
--

CREATE TABLE `tipoextornar` (
  `IdTipoExtornar` int(11) NOT NULL,
  `Descripcion` varchar(100) NOT NULL,
  `Estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipoextornar`
--

INSERT INTO `tipoextornar` (`IdTipoExtornar`, `Descripcion`, `Estado`) VALUES
(1, 'AREA INTERNA', 1),
(2, 'SALIDA', 1),
(3, 'REQUERIMIENTO', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoingreso`
--

CREATE TABLE `tipoingreso` (
  `IdTipoIngreso` int(11) NOT NULL,
  `Descripcion` varchar(100) NOT NULL,
  `Estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipoingreso`
--

INSERT INTO `tipoingreso` (`IdTipoIngreso`, `Descripcion`, `Estado`) VALUES
(1, 'AREAS INTERNAS', 1),
(2, 'COMPRA O ADQUISICION', 1),
(3, 'REPLIEGUE', 1),
(4, 'REQUERIMIENTO', 1),
(5, 'SALIDA', 1),
(6, 'INVENTARIO INICIAL', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubigeo`
--

CREATE TABLE `ubigeo` (
  `id_ubigeo` int(11) NOT NULL,
  `cod_ubi` int(6) UNSIGNED ZEROFILL DEFAULT NULL,
  `depart_ubi` varchar(200) NOT NULL,
  `prov_ubi` varchar(200) NOT NULL,
  `dist_ubi` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ubigeo`
--

INSERT INTO `ubigeo` (`id_ubigeo`, `cod_ubi`, `depart_ubi`, `prov_ubi`, `dist_ubi`) VALUES
(1, 021001, 'ANCASH', 'PALLASCA', 'CABANA'),
(2, 021002, 'ANCASH', 'PALLASCA', 'BOLOGNESI'),
(3, 021003, 'ANCASH', 'PALLASCA', 'CONCHUCOS'),
(4, 021004, 'ANCASH', 'PALLASCA', 'HUACASCHUQUE'),
(5, 021005, 'ANCASH', 'PALLASCA', 'HUANDOVAL'),
(6, 021006, 'ANCASH', 'PALLASCA', 'LACABAMBA'),
(7, 021007, 'ANCASH', 'PALLASCA', 'LLAPO'),
(8, 021008, 'ANCASH', 'PALLASCA', 'PALLASCA'),
(9, 021009, 'ANCASH', 'PALLASCA', 'PAMPAS'),
(10, 021010, 'ANCASH', 'PALLASCA', 'SANTA ROSA'),
(11, 021011, 'ANCASH', 'PALLASCA', 'TAUCA'),
(12, 021301, 'ANCASH', 'SANTA', 'CHIMBOTE'),
(13, 021302, 'ANCASH', 'SANTA', 'CACERES DEL PERU'),
(14, 021303, 'ANCASH', 'SANTA', 'MACATE'),
(15, 021304, 'ANCASH', 'SANTA', 'MORO'),
(16, 021305, 'ANCASH', 'SANTA', 'NEPEÑA'),
(17, 021306, 'ANCASH', 'SANTA', 'SAMANCO'),
(18, 021307, 'ANCASH', 'SANTA', 'SANTA'),
(19, 021308, 'ANCASH', 'SANTA', 'COISHCO'),
(20, 021309, 'ANCASH', 'SANTA', 'NUEVO CHIMBOTE'),
(21, 021901, 'ANCASH', 'HUARMEY', 'HUARMEY'),
(22, 021902, 'ANCASH', 'HUARMEY', 'COCHAPETI'),
(23, 021903, 'ANCASH', 'HUARMEY', 'HUAYAN'),
(24, 021904, 'ANCASH', 'HUARMEY', 'MALVAS'),
(25, 010301, 'AMAZONAS', 'BONGARA', 'JUMBILLA'),
(26, 010302, 'AMAZONAS', 'BONGARA', 'COROSHA'),
(27, 010303, 'AMAZONAS', 'BONGARA', 'CUISPES'),
(28, 010304, 'AMAZONAS', 'BONGARA', 'CHISQUILLA'),
(29, 010305, 'AMAZONAS', 'BONGARA', 'CHURUJA'),
(30, 010306, 'AMAZONAS', 'BONGARA', 'FLORIDA'),
(31, 010307, 'AMAZONAS', 'BONGARA', 'RECTA'),
(32, 010308, 'AMAZONAS', 'BONGARA', 'SAN CARLOS'),
(33, 010309, 'AMAZONAS', 'BONGARA', 'SHIPASBAMBA'),
(34, 010310, 'AMAZONAS', 'BONGARA', 'VALERA'),
(35, 010311, 'AMAZONAS', 'BONGARA', 'YAMBRASBAMBA'),
(36, 010312, 'AMAZONAS', 'BONGARA', 'JAZAN'),
(37, 010401, 'AMAZONAS', 'LUYA', 'LAMUD'),
(38, 010402, 'AMAZONAS', 'LUYA', 'CAMPORREDONDO'),
(39, 010403, 'AMAZONAS', 'LUYA', 'COCABAMBA'),
(40, 010404, 'AMAZONAS', 'LUYA', 'COLCAMAR'),
(41, 010405, 'AMAZONAS', 'LUYA', 'CONILA'),
(42, 010406, 'AMAZONAS', 'LUYA', 'INGUILPATA'),
(43, 010407, 'AMAZONAS', 'LUYA', 'LONGUITA'),
(44, 010408, 'AMAZONAS', 'LUYA', 'LONYA CHICO'),
(45, 010409, 'AMAZONAS', 'LUYA', 'LUYA'),
(46, 010410, 'AMAZONAS', 'LUYA', 'LUYA VIEJO'),
(47, 010411, 'AMAZONAS', 'LUYA', 'MARIA'),
(48, 020302, 'ANCASH', 'BOLOGNESI', 'ABELARDO PARDO LEZAMETA'),
(49, 020304, 'ANCASH', 'BOLOGNESI', 'AQUIA'),
(50, 020305, 'ANCASH', 'BOLOGNESI', 'CAJACAY'),
(51, 020310, 'ANCASH', 'BOLOGNESI', 'HUAYLLACAYAN'),
(52, 020311, 'ANCASH', 'BOLOGNESI', 'HUASTA'),
(53, 020313, 'ANCASH', 'BOLOGNESI', 'MANGAS'),
(54, 020315, 'ANCASH', 'BOLOGNESI', 'PACLLON'),
(55, 020317, 'ANCASH', 'BOLOGNESI', 'SAN MIGUEL DE CORPANQUI'),
(56, 020320, 'ANCASH', 'BOLOGNESI', 'TICLLOS'),
(57, 020321, 'ANCASH', 'BOLOGNESI', 'ANTONIO RAIMONDI'),
(58, 020322, 'ANCASH', 'BOLOGNESI', 'CANIS'),
(59, 020323, 'ANCASH', 'BOLOGNESI', 'COLQUIOC'),
(60, 020324, 'ANCASH', 'BOLOGNESI', 'LA PRIMAVERA'),
(61, 020325, 'ANCASH', 'BOLOGNESI', 'HUALLANCA'),
(62, 022001, 'ANCASH', 'OCROS', 'ACAS'),
(63, 022002, 'ANCASH', 'OCROS', 'CAJAMARQUILLA'),
(64, 022003, 'ANCASH', 'OCROS', 'CARHUAPAMPA'),
(65, 022004, 'ANCASH', 'OCROS', 'COCHAS'),
(66, 022005, 'ANCASH', 'OCROS', 'CONGAS'),
(67, 022006, 'ANCASH', 'OCROS', 'LLIPA'),
(68, 022007, 'ANCASH', 'OCROS', 'OCROS'),
(69, 022008, 'ANCASH', 'OCROS', 'SAN CRISTOBAL DE RAJAN'),
(70, 021905, 'ANCASH', 'HUARMEY', 'CULEBRAS'),
(71, 030101, 'APURIMAC', 'ABANCAY', 'ABANCAY'),
(72, 030102, 'APURIMAC', 'ABANCAY', 'CIRCA'),
(73, 030103, 'APURIMAC', 'ABANCAY', 'CURAHUASI'),
(74, 030104, 'APURIMAC', 'ABANCAY', 'CHACOCHE'),
(75, 030105, 'APURIMAC', 'ABANCAY', 'HUANIPACA'),
(76, 030106, 'APURIMAC', 'ABANCAY', 'LAMBRAMA'),
(77, 030107, 'APURIMAC', 'ABANCAY', 'PICHIRHUA'),
(78, 030108, 'APURIMAC', 'ABANCAY', 'SAN PEDRO DE CACHORA'),
(79, 030109, 'APURIMAC', 'ABANCAY', 'TAMBURCO'),
(80, 030201, 'APURIMAC', 'AYMARAES', 'CHALHUANCA'),
(81, 030202, 'APURIMAC', 'AYMARAES', 'CAPAYA'),
(82, 030203, 'APURIMAC', 'AYMARAES', 'CARAYBAMBA'),
(83, 030204, 'APURIMAC', 'AYMARAES', 'COLCABAMBA'),
(84, 030205, 'APURIMAC', 'AYMARAES', 'COTARUSE'),
(85, 030206, 'APURIMAC', 'AYMARAES', 'CHAPIMARCA'),
(86, 030207, 'APURIMAC', 'AYMARAES', 'IHUAYLLO'),
(87, 030208, 'APURIMAC', 'AYMARAES', 'LUCRE'),
(88, 030209, 'APURIMAC', 'AYMARAES', 'POCOHUANCA'),
(89, 030210, 'APURIMAC', 'AYMARAES', 'SAÑAYCA'),
(90, 030211, 'APURIMAC', 'AYMARAES', 'SORAYA'),
(91, 030212, 'APURIMAC', 'AYMARAES', 'TAPAIRIHUA'),
(92, 030213, 'APURIMAC', 'AYMARAES', 'TINTAY'),
(93, 030214, 'APURIMAC', 'AYMARAES', 'TORAYA'),
(94, 030215, 'APURIMAC', 'AYMARAES', 'YANACA'),
(95, 030216, 'APURIMAC', 'AYMARAES', 'SAN JUAN DE CHACÑA'),
(96, 030217, 'APURIMAC', 'AYMARAES', 'JUSTO APU SAHUARAURA'),
(97, 021702, 'ANCASH', 'CARLOS FERMIN FITZCARRALD', 'YAUYA'),
(98, 021703, 'ANCASH', 'CARLOS FERMIN FITZCARRALD', 'SAN NICOLAS'),
(99, 021801, 'ANCASH', 'ASUNSION', 'CHACAS'),
(100, 021802, 'ANCASH', 'ASUNSION', 'ACOCHACA'),
(101, 020601, 'ANCASH', 'CORONGO', 'CORONGO'),
(102, 020602, 'ANCASH', 'CORONGO', 'ACO'),
(103, 020603, 'ANCASH', 'CORONGO', 'BAMBAS'),
(104, 020604, 'ANCASH', 'CORONGO', 'CUSCA'),
(105, 020605, 'ANCASH', 'CORONGO', 'LA PAMPA'),
(106, 020606, 'ANCASH', 'CORONGO', 'YANAC'),
(107, 020607, 'ANCASH', 'CORONGO', 'YUPAN'),
(108, 020701, 'ANCASH', 'HUAYLAS', 'CARAZ'),
(109, 020702, 'ANCASH', 'HUAYLAS', 'HUALLANCA'),
(110, 020703, 'ANCASH', 'HUAYLAS', 'HUATA'),
(111, 020704, 'ANCASH', 'HUAYLAS', 'HUAYLAS'),
(112, 020705, 'ANCASH', 'HUAYLAS', 'MATO'),
(113, 020706, 'ANCASH', 'HUAYLAS', 'PAMPAROMAS'),
(114, 020707, 'ANCASH', 'HUAYLAS', 'PUEBLO LIBRE'),
(115, 020708, 'ANCASH', 'HUAYLAS', 'SANTA CRUZ'),
(116, 020709, 'ANCASH', 'HUAYLAS', 'YURACMARCA'),
(117, 020710, 'ANCASH', 'HUAYLAS', 'SANTO TORIBIO'),
(118, 021501, 'ANCASH', 'YUNGAY', 'YUNGAY'),
(119, 021502, 'ANCASH', 'YUNGAY', 'CASCAPARA'),
(120, 021503, 'ANCASH', 'YUNGAY', 'MANCOS'),
(121, 030401, 'APURIMAC', 'ANTABAMBA', 'ANTABAMBA'),
(122, 030402, 'APURIMAC', 'ANTABAMBA', 'EL ORO'),
(123, 030403, 'APURIMAC', 'ANTABAMBA', 'HUAQUIRCA'),
(124, 030404, 'APURIMAC', 'ANTABAMBA', 'JUAN ESPINOZA MEDRANO'),
(125, 030405, 'APURIMAC', 'ANTABAMBA', 'OROPESA'),
(126, 030406, 'APURIMAC', 'ANTABAMBA', 'PACHACONAS'),
(127, 030407, 'APURIMAC', 'ANTABAMBA', 'SABAINO'),
(128, 030301, 'APURIMAC', 'ANDAHUAYLAS', 'ANDAHUAYLAS'),
(129, 030302, 'APURIMAC', 'ANDAHUAYLAS', 'ANDARAPA'),
(130, 030303, 'APURIMAC', 'ANDAHUAYLAS', 'CHIARA'),
(131, 030304, 'APURIMAC', 'ANDAHUAYLAS', 'HUANCARAMA'),
(132, 030305, 'APURIMAC', 'ANDAHUAYLAS', 'HUANCARAY'),
(133, 030306, 'APURIMAC', 'ANDAHUAYLAS', 'KISHUARA'),
(134, 030307, 'APURIMAC', 'ANDAHUAYLAS', 'PACOBAMBA'),
(135, 030308, 'APURIMAC', 'ANDAHUAYLAS', 'PAMPACHIRI'),
(136, 030309, 'APURIMAC', 'ANDAHUAYLAS', 'SAN ANTONIO DE CACHI'),
(137, 030310, 'APURIMAC', 'ANDAHUAYLAS', 'SAN JERONIMO'),
(138, 030311, 'APURIMAC', 'ANDAHUAYLAS', 'TALAVERA'),
(139, 030312, 'APURIMAC', 'ANDAHUAYLAS', 'TURPO'),
(140, 030313, 'APURIMAC', 'ANDAHUAYLAS', 'PACUCHA'),
(141, 030314, 'APURIMAC', 'ANDAHUAYLAS', 'POMACOCHA'),
(142, 021504, 'ANCASH', 'YUNGAY', 'MATACOTO'),
(143, 021505, 'ANCASH', 'YUNGAY', 'QUILLO'),
(144, 021506, 'ANCASH', 'YUNGAY', 'RANRAHIRCA'),
(145, 021507, 'ANCASH', 'YUNGAY', 'SHUPLUY'),
(146, 021508, 'ANCASH', 'YUNGAY', 'YANAMA'),
(147, 020901, 'ANCASH', 'MARISCAL LUZURIAGA', 'PISCOBAMBA'),
(148, 020902, 'ANCASH', 'MARISCAL LUZURIAGA', 'CASCA'),
(149, 020903, 'ANCASH', 'MARISCAL LUZURIAGA', 'LUCMA'),
(150, 020904, 'ANCASH', 'MARISCAL LUZURIAGA', 'FIDEL OLIVAS ESCUDERO'),
(151, 020905, 'ANCASH', 'MARISCAL LUZURIAGA', 'LLAMA'),
(152, 020906, 'ANCASH', 'MARISCAL LUZURIAGA', 'LLUMPA'),
(153, 020907, 'ANCASH', 'MARISCAL LUZURIAGA', 'MUSGA'),
(154, 020908, 'ANCASH', 'MARISCAL LUZURIAGA', 'ELEAZAR GUZMAN BARRON'),
(155, 021101, 'ANCASH', 'POMABAMBA', 'POMABAMBA'),
(156, 021102, 'ANCASH', 'POMABAMBA', 'HUAYLLAN'),
(157, 021103, 'ANCASH', 'POMABAMBA', 'PAROBAMBA'),
(158, 021104, 'ANCASH', 'POMABAMBA', 'QUINUABAMBA'),
(159, 021401, 'ANCASH', 'SIHUAS', 'SIHUAS'),
(160, 021402, 'ANCASH', 'SIHUAS', 'ALFONSO UGARTE'),
(161, 021403, 'ANCASH', 'SIHUAS', 'CHINGALPO'),
(162, 021404, 'ANCASH', 'SIHUAS', 'HUAYLLABAMBA'),
(163, 021405, 'ANCASH', 'SIHUAS', 'QUICHES'),
(164, 010412, 'AMAZONAS', 'LUYA', 'OCALLI'),
(165, 010413, 'AMAZONAS', 'LUYA', 'OCUMAL'),
(166, 010414, 'AMAZONAS', 'LUYA', 'PISUQUIA'),
(167, 010415, 'AMAZONAS', 'LUYA', 'SAN CRISTOBAL'),
(168, 010416, 'AMAZONAS', 'LUYA', 'SAN FRANCISCO DE YESO'),
(169, 010417, 'AMAZONAS', 'LUYA', 'SAN JERONIMO'),
(170, 010418, 'AMAZONAS', 'LUYA', 'SAN JUAN DE LOPECANCHA'),
(171, 010419, 'AMAZONAS', 'LUYA', 'SANTA CATALINA'),
(172, 010420, 'AMAZONAS', 'LUYA', 'SANTO TOMAS'),
(173, 010421, 'AMAZONAS', 'LUYA', 'TINGO'),
(174, 010422, 'AMAZONAS', 'LUYA', 'TRITA'),
(175, 010423, 'AMAZONAS', 'LUYA', 'PROVIDENCIA'),
(176, 010101, 'AMAZONAS', 'CHACHAPOYAS', 'CHACHAPOYAS'),
(177, 010102, 'AMAZONAS', 'CHACHAPOYAS', 'ASUNCION'),
(178, 010103, 'AMAZONAS', 'CHACHAPOYAS', 'BALSAS'),
(179, 010104, 'AMAZONAS', 'CHACHAPOYAS', 'CHETO'),
(180, 010105, 'AMAZONAS', 'CHACHAPOYAS', 'CHILIQUIN'),
(181, 010106, 'AMAZONAS', 'CHACHAPOYAS', 'CHUQUIBAMBA'),
(182, 010107, 'AMAZONAS', 'CHACHAPOYAS', 'GRANADA'),
(183, 010108, 'AMAZONAS', 'CHACHAPOYAS', 'HUANCAS'),
(184, 010109, 'AMAZONAS', 'CHACHAPOYAS', 'LA JALCA'),
(185, 021406, 'ANCASH', 'SIHUAS', 'SICSIBAMBA'),
(186, 021407, 'ANCASH', 'SIHUAS', 'ACOBAMBA'),
(187, 021408, 'ANCASH', 'SIHUAS', 'CASHAPAMPA'),
(188, 021409, 'ANCASH', 'SIHUAS', 'RAGASH'),
(189, 021410, 'ANCASH', 'SIHUAS', 'SAN JUAN'),
(190, 020201, 'ANCASH', 'AIJA', 'AIJA'),
(191, 020203, 'ANCASH', 'AIJA', 'CORIS'),
(192, 020205, 'ANCASH', 'AIJA', 'HUACLLAN'),
(193, 020206, 'ANCASH', 'AIJA', 'LA MERCED'),
(194, 020208, 'ANCASH', 'AIJA', 'SUCCHA'),
(195, 021201, 'ANCASH', 'RECUAY', 'RECUAY'),
(196, 021202, 'ANCASH', 'RECUAY', 'COTAPARACO'),
(197, 021203, 'ANCASH', 'RECUAY', 'HUAYLLAPAMPA'),
(198, 021204, 'ANCASH', 'RECUAY', 'MARCA'),
(199, 021205, 'ANCASH', 'RECUAY', 'PAMPAS CHICO'),
(200, 021206, 'ANCASH', 'RECUAY', 'PARARIN'),
(201, 021207, 'ANCASH', 'RECUAY', 'TAPACOCHA'),
(202, 021208, 'ANCASH', 'RECUAY', 'TICAPAMPA'),
(203, 021209, 'ANCASH', 'RECUAY', 'LLACLLIN'),
(204, 021210, 'ANCASH', 'RECUAY', 'CATAC'),
(205, 020501, 'ANCASH', 'CASMA', 'CASMA'),
(206, 020502, 'ANCASH', 'CASMA', 'BUENA VISTA ALTA'),
(207, 020503, 'ANCASH', 'CASMA', 'COMANDANTE NOEL'),
(208, 020505, 'ANCASH', 'CASMA', 'YAUTAN'),
(209, 010110, 'AMAZONAS', 'CHACHAPOYAS', 'LEYMEBAMBA'),
(210, 010111, 'AMAZONAS', 'CHACHAPOYAS', 'LEVANTO'),
(211, 010112, 'AMAZONAS', 'CHACHAPOYAS', 'MAGDALENA'),
(212, 010113, 'AMAZONAS', 'CHACHAPOYAS', 'MARISCAL CASTILLA'),
(213, 010114, 'AMAZONAS', 'CHACHAPOYAS', 'MOLINOPAMPA'),
(214, 010115, 'AMAZONAS', 'CHACHAPOYAS', 'MONTEVIDEO'),
(215, 010116, 'AMAZONAS', 'CHACHAPOYAS', 'OLLEROS'),
(216, 010117, 'AMAZONAS', 'CHACHAPOYAS', 'QUINJALCA'),
(217, 010118, 'AMAZONAS', 'CHACHAPOYAS', 'SAN FRANCISCO DE DAGUAS'),
(218, 010119, 'AMAZONAS', 'CHACHAPOYAS', 'SAN ISIDRO DE MAINO'),
(219, 010120, 'AMAZONAS', 'CHACHAPOYAS', 'SOLOCO'),
(220, 010121, 'AMAZONAS', 'CHACHAPOYAS', 'SONCHE'),
(221, 010501, 'AMAZONAS', 'RODRIGUEZ DE MENDOZA', 'SAN NICOLAS'),
(222, 010502, 'AMAZONAS', 'RODRIGUEZ DE MENDOZA', 'COCHAMAL'),
(223, 010503, 'AMAZONAS', 'RODRIGUEZ DE MENDOZA', 'CHIRIMOTO'),
(224, 010504, 'AMAZONAS', 'RODRIGUEZ DE MENDOZA', 'HUAMBO'),
(225, 010505, 'AMAZONAS', 'RODRIGUEZ DE MENDOZA', 'LIMABAMBA'),
(226, 010506, 'AMAZONAS', 'RODRIGUEZ DE MENDOZA', 'LONGAR'),
(227, 010507, 'AMAZONAS', 'RODRIGUEZ DE MENDOZA', 'MILPUCC'),
(228, 020411, 'ANCASH', 'CARHUAZ', 'YUNGAR'),
(229, 020801, 'ANCASH', 'HUARI', 'HUARI'),
(230, 020802, 'ANCASH', 'HUARI', 'CAJAY'),
(231, 020803, 'ANCASH', 'HUARI', 'CHAVIN DE HUANTAR'),
(232, 020804, 'ANCASH', 'HUARI', 'HUACACHI'),
(233, 020805, 'ANCASH', 'HUARI', 'HUACHIS'),
(234, 020806, 'ANCASH', 'HUARI', 'HUACCHIS'),
(235, 020807, 'ANCASH', 'HUARI', 'HUANTAR'),
(236, 020808, 'ANCASH', 'HUARI', 'MASIN'),
(237, 020809, 'ANCASH', 'HUARI', 'PAUCAS'),
(238, 020810, 'ANCASH', 'HUARI', 'PONTO'),
(239, 020811, 'ANCASH', 'HUARI', 'RAHUAPAMPA'),
(240, 020812, 'ANCASH', 'HUARI', 'RAPAYAN'),
(241, 020813, 'ANCASH', 'HUARI', 'SAN MARCOS'),
(242, 020814, 'ANCASH', 'HUARI', 'SAN PEDRO DE CHANA'),
(243, 020815, 'ANCASH', 'HUARI', 'UCO'),
(244, 020816, 'ANCASH', 'HUARI', 'ANRA'),
(245, 021601, 'ANCASH', 'ANTONIO RAIMONDI', 'LLAMELLIN'),
(246, 021602, 'ANCASH', 'ANTONIO RAIMONDI', 'ACZO'),
(247, 021603, 'ANCASH', 'ANTONIO RAIMONDI', 'CHACCHO'),
(248, 021604, 'ANCASH', 'ANTONIO RAIMONDI', 'CHINGAS'),
(249, 021605, 'ANCASH', 'ANTONIO RAIMONDI', 'MIRGAS'),
(250, 021606, 'ANCASH', 'ANTONIO RAIMONDI', 'SAN JUAN DE RONTOY'),
(251, 021701, 'ANCASH', 'CARLOS FERMIN FITZCARRALD', 'SAN LUIS'),
(252, 010508, 'AMAZONAS', 'RODRIGUEZ DE MENDOZA', 'MARISCAL BENAVIDES'),
(253, 010509, 'AMAZONAS', 'RODRIGUEZ DE MENDOZA', 'OMIA'),
(254, 010510, 'AMAZONAS', 'RODRIGUEZ DE MENDOZA', 'SANTA ROSA'),
(255, 010511, 'AMAZONAS', 'RODRIGUEZ DE MENDOZA', 'TOTORA'),
(256, 010512, 'AMAZONAS', 'RODRIGUEZ DE MENDOZA', 'VISTA ALEGRE'),
(257, 010201, 'AMAZONAS', 'BAGUA', 'LA PECA'),
(258, 010202, 'AMAZONAS', 'BAGUA', 'ARAMANGO'),
(259, 010203, 'AMAZONAS', 'BAGUA', 'COPALLIN'),
(260, 010204, 'AMAZONAS', 'BAGUA', 'EL PARCO'),
(261, 010206, 'AMAZONAS', 'BAGUA', 'IMAZA'),
(262, 010601, 'AMAZONAS', 'CONDORCANQUI', 'NIEVA'),
(263, 010602, 'AMAZONAS', 'CONDORCANQUI', 'RIO SANTIAGO'),
(264, 010603, 'AMAZONAS', 'CONDORCANQUI', 'EL CENEPA'),
(265, 010701, 'AMAZONAS', 'UTCUBAMBA', 'BAGUA GRANDE'),
(266, 010702, 'AMAZONAS', 'UTCUBAMBA', 'CAJARURO'),
(267, 010703, 'AMAZONAS', 'UTCUBAMBA', 'CUMBA'),
(268, 010704, 'AMAZONAS', 'UTCUBAMBA', 'EL MILAGRO'),
(269, 010705, 'AMAZONAS', 'UTCUBAMBA', 'JAMALCA'),
(270, 010706, 'AMAZONAS', 'UTCUBAMBA', 'LONYA GRANDE'),
(271, 010707, 'AMAZONAS', 'UTCUBAMBA', 'YAMON'),
(272, 020301, 'ANCASH', 'BOLOGNESI', 'CHIQUIAN'),
(273, 022009, 'ANCASH', 'OCROS', 'SAN PEDRO'),
(274, 022010, 'ANCASH', 'OCROS', 'SANTIAGO DE CHILCAS'),
(275, 020101, 'ANCASH', 'HUARAZ', 'HUARAZ'),
(276, 020102, 'ANCASH', 'HUARAZ', 'INDEPENDENCIA'),
(277, 020103, 'ANCASH', 'HUARAZ', 'COCHABAMBA'),
(278, 020104, 'ANCASH', 'HUARAZ', 'COLCABAMBA'),
(279, 020105, 'ANCASH', 'HUARAZ', 'HUANCHAY'),
(280, 020106, 'ANCASH', 'HUARAZ', 'JANGAS'),
(281, 020107, 'ANCASH', 'HUARAZ', 'LA LIBERTAD'),
(282, 020108, 'ANCASH', 'HUARAZ', 'OLLEROS'),
(283, 020109, 'ANCASH', 'HUARAZ', 'PAMPAS'),
(284, 020110, 'ANCASH', 'HUARAZ', 'PARIACOTO'),
(285, 020111, 'ANCASH', 'HUARAZ', 'PIRA'),
(286, 020112, 'ANCASH', 'HUARAZ', 'TARICA'),
(287, 020401, 'ANCASH', 'CARHUAZ', 'CARHUAZ'),
(288, 020402, 'ANCASH', 'CARHUAZ', 'ACOPAMPA'),
(289, 020403, 'ANCASH', 'CARHUAZ', 'AMASHCA'),
(290, 020404, 'ANCASH', 'CARHUAZ', 'ANTA'),
(291, 020405, 'ANCASH', 'CARHUAZ', 'ATAQUERO'),
(292, 020406, 'ANCASH', 'CARHUAZ', 'MARCARA'),
(293, 020407, 'ANCASH', 'CARHUAZ', 'PARIAHUANCA'),
(294, 020408, 'ANCASH', 'CARHUAZ', 'SAN MIGUEL DE ACO'),
(295, 020409, 'ANCASH', 'CARHUAZ', 'SHILLA'),
(296, 020410, 'ANCASH', 'CARHUAZ', 'TINCO'),
(297, 030315, 'APURIMAC', 'ANDAHUAYLAS', 'SANTA MARIA DE CHICMO'),
(298, 030316, 'APURIMAC', 'ANDAHUAYLAS', 'TUMAY HUARACA'),
(299, 030317, 'APURIMAC', 'ANDAHUAYLAS', 'HUAYANA'),
(300, 030318, 'APURIMAC', 'ANDAHUAYLAS', 'SAN MIGUEL DE CHACCRAMPA'),
(301, 030319, 'APURIMAC', 'ANDAHUAYLAS', 'KAQUIABAMBA'),
(302, 030701, 'APURIMAC', 'CHINCHEROS', 'CHINCHEROS'),
(303, 030702, 'APURIMAC', 'CHINCHEROS', 'ONGOY'),
(304, 030703, 'APURIMAC', 'CHINCHEROS', 'OCOBAMBA'),
(305, 030704, 'APURIMAC', 'CHINCHEROS', 'COCHARCAS'),
(306, 030705, 'APURIMAC', 'CHINCHEROS', 'ANCO HUALLO'),
(307, 030706, 'APURIMAC', 'CHINCHEROS', 'HUACCANA'),
(308, 030707, 'APURIMAC', 'CHINCHEROS', 'URANMARCA'),
(309, 030708, 'APURIMAC', 'CHINCHEROS', 'RANRACANCHA'),
(310, 030501, 'APURIMAC', 'COTABAMBAS', 'TAMBOBAMBA'),
(311, 030502, 'APURIMAC', 'COTABAMBAS', 'COYLLURQUI'),
(312, 030503, 'APURIMAC', 'COTABAMBAS', 'COTABAMBAS'),
(313, 030504, 'APURIMAC', 'COTABAMBAS', 'HAQUIRA'),
(314, 030505, 'APURIMAC', 'COTABAMBAS', 'MARA'),
(315, 030506, 'APURIMAC', 'COTABAMBAS', 'CHALLHUAHUACHO'),
(316, 030601, 'APURIMAC', 'GRAU', 'CHUQUIBAMBILLA'),
(317, 030602, 'APURIMAC', 'GRAU', 'CURPAHUASI'),
(318, 030603, 'APURIMAC', 'GRAU', 'HUAYLLATI'),
(319, 030604, 'APURIMAC', 'GRAU', 'MAMARA'),
(320, 030605, 'APURIMAC', 'GRAU', 'MARISCAL GAMARRA'),
(321, 030606, 'APURIMAC', 'GRAU', 'MICAELA BASTIDAS'),
(322, 030607, 'APURIMAC', 'GRAU', 'PROGRESO'),
(323, 030608, 'APURIMAC', 'GRAU', 'PATAYPAMPA'),
(324, 030609, 'APURIMAC', 'GRAU', 'SAN ANTONIO'),
(325, 030610, 'APURIMAC', 'GRAU', 'TURPAY'),
(326, 030611, 'APURIMAC', 'GRAU', 'VILCABAMBA'),
(327, 030612, 'APURIMAC', 'GRAU', 'VIRUNDO'),
(328, 030613, 'APURIMAC', 'GRAU', 'SANTA ROSA'),
(329, 030614, 'APURIMAC', 'GRAU', 'CURASCO'),
(330, 040101, 'AREQUIPA', 'AREQUIPA', 'AREQUIPA'),
(331, 040102, 'AREQUIPA', 'AREQUIPA', 'CAYMA'),
(332, 040103, 'AREQUIPA', 'AREQUIPA', 'CERRO COLORADO'),
(333, 040104, 'AREQUIPA', 'AREQUIPA', 'CHARACATO'),
(334, 040105, 'AREQUIPA', 'AREQUIPA', 'CHIGUATA'),
(335, 040106, 'AREQUIPA', 'AREQUIPA', 'LA JOYA'),
(336, 040107, 'AREQUIPA', 'AREQUIPA', 'MIRAFLORES'),
(337, 040108, 'AREQUIPA', 'AREQUIPA', 'MOLLEBAYA'),
(338, 040109, 'AREQUIPA', 'AREQUIPA', 'PAUCARPATA'),
(339, 040110, 'AREQUIPA', 'AREQUIPA', 'POCSI'),
(340, 040111, 'AREQUIPA', 'AREQUIPA', 'POLOBAYA'),
(341, 040112, 'AREQUIPA', 'AREQUIPA', 'QUEQUEÑA'),
(342, 040113, 'AREQUIPA', 'AREQUIPA', 'SABANDIA'),
(343, 040114, 'AREQUIPA', 'AREQUIPA', 'SACHACA'),
(344, 040115, 'AREQUIPA', 'AREQUIPA', 'SAN JUAN DE SIGUAS'),
(345, 040116, 'AREQUIPA', 'AREQUIPA', 'SAN JUAN DE TARUCANI'),
(346, 040117, 'AREQUIPA', 'AREQUIPA', 'SANTA ISABEL DE SIGUAS'),
(347, 040118, 'AREQUIPA', 'AREQUIPA', 'SANTA RITA DE SIHUAS'),
(348, 040119, 'AREQUIPA', 'AREQUIPA', 'SOCABAYA'),
(349, 040120, 'AREQUIPA', 'AREQUIPA', 'TIABAYA'),
(350, 040121, 'AREQUIPA', 'AREQUIPA', 'UCHUMAYO'),
(351, 040122, 'AREQUIPA', 'AREQUIPA', 'VITOR'),
(352, 040123, 'AREQUIPA', 'AREQUIPA', 'YANAHUARA'),
(353, 040124, 'AREQUIPA', 'AREQUIPA', 'YARABAMBA'),
(354, 040125, 'AREQUIPA', 'AREQUIPA', 'YURA'),
(355, 040126, 'AREQUIPA', 'AREQUIPA', 'MARIANO MELGAR'),
(356, 040127, 'AREQUIPA', 'AREQUIPA', 'JACOBO HUNTER'),
(357, 040128, 'AREQUIPA', 'AREQUIPA', 'ALTO SELVA ALEGRE'),
(358, 040129, 'AREQUIPA', 'AREQUIPA', 'JOSE LUIS BUSTAMANTE Y RIVERO'),
(359, 040701, 'AREQUIPA', 'ISLAY', 'MOLLENDO'),
(360, 040702, 'AREQUIPA', 'ISLAY', 'COCACHACRA'),
(361, 040703, 'AREQUIPA', 'ISLAY', 'DEAN VALDIVIA'),
(362, 040704, 'AREQUIPA', 'ISLAY', 'ISLAY'),
(363, 040705, 'AREQUIPA', 'ISLAY', 'MEJIA'),
(364, 040706, 'AREQUIPA', 'ISLAY', 'PUNTA DE BOMBON'),
(365, 040301, 'AREQUIPA', 'CAMANA', 'CAMANA'),
(366, 040302, 'AREQUIPA', 'CAMANA', 'JOSE MARIA QUIMPER'),
(367, 040303, 'AREQUIPA', 'CAMANA', 'MARIANO NICOLAS VALCARCEL'),
(368, 040304, 'AREQUIPA', 'CAMANA', 'MARISCAL CACERES'),
(369, 040305, 'AREQUIPA', 'CAMANA', 'NICOLAS DE PIEROLA'),
(370, 040306, 'AREQUIPA', 'CAMANA', 'OCOÑA'),
(371, 040307, 'AREQUIPA', 'CAMANA', 'QUILCA'),
(372, 040308, 'AREQUIPA', 'CAMANA', 'SAMUEL PASTOR'),
(373, 040401, 'AREQUIPA', 'CARAVELI', 'CARAVELI'),
(374, 040402, 'AREQUIPA', 'CARAVELI', 'ACARI'),
(375, 040403, 'AREQUIPA', 'CARAVELI', 'ATICO'),
(376, 040404, 'AREQUIPA', 'CARAVELI', 'ATIQUIPA'),
(377, 040405, 'AREQUIPA', 'CARAVELI', 'BELLA UNION'),
(378, 040406, 'AREQUIPA', 'CARAVELI', 'CAHUACHO'),
(379, 040407, 'AREQUIPA', 'CARAVELI', 'CHALA'),
(380, 040408, 'AREQUIPA', 'CARAVELI', 'CHAPARRA'),
(381, 040409, 'AREQUIPA', 'CARAVELI', 'HUANUHUANU'),
(382, 040410, 'AREQUIPA', 'CARAVELI', 'JAQUI'),
(383, 040411, 'AREQUIPA', 'CARAVELI', 'LOMAS'),
(384, 040412, 'AREQUIPA', 'CARAVELI', 'QUICACHA'),
(385, 040413, 'AREQUIPA', 'CARAVELI', 'YAUCA'),
(386, 040501, 'AREQUIPA', 'CASTILLA', 'APLAO'),
(387, 040502, 'AREQUIPA', 'CASTILLA', 'ANDAGUA'),
(388, 040503, 'AREQUIPA', 'CASTILLA', 'AYO'),
(389, 040504, 'AREQUIPA', 'CASTILLA', 'CHACHAS'),
(390, 040505, 'AREQUIPA', 'CASTILLA', 'CHILCAYMARCA'),
(391, 040506, 'AREQUIPA', 'CASTILLA', 'CHOCO'),
(392, 040507, 'AREQUIPA', 'CASTILLA', 'HUANCARQUI'),
(393, 040508, 'AREQUIPA', 'CASTILLA', 'MACHAGUAY'),
(394, 040509, 'AREQUIPA', 'CASTILLA', 'ORCOPAMPA'),
(395, 040510, 'AREQUIPA', 'CASTILLA', 'PAMPACOLCA'),
(396, 040511, 'AREQUIPA', 'CASTILLA', 'TIPAN'),
(397, 040512, 'AREQUIPA', 'CASTILLA', 'URACA'),
(398, 040513, 'AREQUIPA', 'CASTILLA', 'UÑON'),
(399, 040514, 'AREQUIPA', 'CASTILLA', 'VIRACO'),
(400, 040201, 'AREQUIPA', 'CAYLLOMA', 'CHIVAY'),
(401, 040202, 'AREQUIPA', 'CAYLLOMA', 'ACHOMA'),
(402, 040203, 'AREQUIPA', 'CAYLLOMA', 'CABANACONDE'),
(403, 040204, 'AREQUIPA', 'CAYLLOMA', 'CAYLLOMA'),
(404, 040205, 'AREQUIPA', 'CAYLLOMA', 'CALLALLI'),
(405, 040206, 'AREQUIPA', 'CAYLLOMA', 'COPORAQUE'),
(406, 040207, 'AREQUIPA', 'CAYLLOMA', 'HUAMBO'),
(407, 040208, 'AREQUIPA', 'CAYLLOMA', 'HUANCA'),
(408, 040209, 'AREQUIPA', 'CAYLLOMA', 'ICHUPAMPA'),
(409, 040210, 'AREQUIPA', 'CAYLLOMA', 'LARI'),
(410, 040211, 'AREQUIPA', 'CAYLLOMA', 'LLUTA'),
(411, 040212, 'AREQUIPA', 'CAYLLOMA', 'MACA'),
(412, 040213, 'AREQUIPA', 'CAYLLOMA', 'MADRIGAL'),
(413, 040214, 'AREQUIPA', 'CAYLLOMA', 'SAN ANTONIO DE CHUCA'),
(414, 040215, 'AREQUIPA', 'CAYLLOMA', 'SIBAYO'),
(415, 040216, 'AREQUIPA', 'CAYLLOMA', 'TAPAY'),
(416, 040217, 'AREQUIPA', 'CAYLLOMA', 'TISCO'),
(417, 040218, 'AREQUIPA', 'CAYLLOMA', 'TUTI'),
(418, 040219, 'AREQUIPA', 'CAYLLOMA', 'YANQUE'),
(419, 040220, 'AREQUIPA', 'CAYLLOMA', 'MAJES'),
(420, 040601, 'AREQUIPA', 'CONDESUYOS', 'CHUQUIBAMBA'),
(421, 040602, 'AREQUIPA', 'CONDESUYOS', 'ANDARAY'),
(422, 040603, 'AREQUIPA', 'CONDESUYOS', 'CAYARANI'),
(423, 040604, 'AREQUIPA', 'CONDESUYOS', 'CHICHAS'),
(424, 040605, 'AREQUIPA', 'CONDESUYOS', 'IRAY'),
(425, 040606, 'AREQUIPA', 'CONDESUYOS', 'SALAMANCA'),
(426, 040607, 'AREQUIPA', 'CONDESUYOS', 'YANAQUIHUA'),
(427, 040608, 'AREQUIPA', 'CONDESUYOS', 'RIO GRANDE'),
(428, 040801, 'AREQUIPA', 'LA UNION', 'COTAHUASI'),
(429, 040802, 'AREQUIPA', 'LA UNION', 'ALCA'),
(430, 040803, 'AREQUIPA', 'LA UNION', 'CHARCANA'),
(431, 040804, 'AREQUIPA', 'LA UNION', 'HUAYNACOTAS'),
(432, 040805, 'AREQUIPA', 'LA UNION', 'PAMPAMARCA'),
(433, 040806, 'AREQUIPA', 'LA UNION', 'PUYCA'),
(434, 040807, 'AREQUIPA', 'LA UNION', 'QUECHUALLA'),
(435, 040808, 'AREQUIPA', 'LA UNION', 'SAYLA'),
(436, 040809, 'AREQUIPA', 'LA UNION', 'TAURIA'),
(437, 040810, 'AREQUIPA', 'LA UNION', 'TOMEPAMPA'),
(438, 040811, 'AREQUIPA', 'LA UNION', 'TORO'),
(439, 050201, 'AYACUCHO', 'CANGALLO', 'CANGALLO'),
(440, 050204, 'AYACUCHO', 'CANGALLO', 'CHUSCHI'),
(441, 050206, 'AYACUCHO', 'CANGALLO', 'LOS MOROCHUCOS'),
(442, 050207, 'AYACUCHO', 'CANGALLO', 'PARAS'),
(443, 050208, 'AYACUCHO', 'CANGALLO', 'TOTOS'),
(444, 050211, 'AYACUCHO', 'CANGALLO', 'MARIA PARADO DE BELLIDO'),
(445, 050701, 'AYACUCHO', 'VICTOR FAJARDO', 'HUANCAPI'),
(446, 050702, 'AYACUCHO', 'VICTOR FAJARDO', 'ALCAMENCA'),
(447, 050703, 'AYACUCHO', 'VICTOR FAJARDO', 'APONGO'),
(448, 050704, 'AYACUCHO', 'VICTOR FAJARDO', 'CANARIA'),
(449, 050706, 'AYACUCHO', 'VICTOR FAJARDO', 'CAYARA'),
(450, 050707, 'AYACUCHO', 'VICTOR FAJARDO', 'COLCA'),
(451, 050708, 'AYACUCHO', 'VICTOR FAJARDO', 'HUAYA'),
(452, 050709, 'AYACUCHO', 'VICTOR FAJARDO', 'HUAMANQUIQUIA'),
(453, 050710, 'AYACUCHO', 'VICTOR FAJARDO', 'HUACARAYLLA'),
(454, 050713, 'AYACUCHO', 'VICTOR FAJARDO', 'SARHUA'),
(455, 050714, 'AYACUCHO', 'VICTOR FAJARDO', 'VILCANCHOS'),
(456, 050715, 'AYACUCHO', 'VICTOR FAJARDO', 'ASQUIPATA'),
(457, 050801, 'AYACUCHO', 'HUANCA SANCOS', 'SANCOS'),
(458, 050802, 'AYACUCHO', 'HUANCA SANCOS', 'SACSAMARCA'),
(459, 050803, 'AYACUCHO', 'HUANCA SANCOS', 'SANTIAGO DE LUCANAMARCA'),
(460, 050804, 'AYACUCHO', 'HUANCA SANCOS', 'CARAPO'),
(461, 050101, 'AYACUCHO', 'HUAMANGA', 'AYACUCHO'),
(462, 050102, 'AYACUCHO', 'HUAMANGA', 'ACOS VINCHOS'),
(463, 050103, 'AYACUCHO', 'HUAMANGA', 'CARMEN ALTO'),
(464, 050104, 'AYACUCHO', 'HUAMANGA', 'CHIARA'),
(465, 050105, 'AYACUCHO', 'HUAMANGA', 'QUINUA'),
(466, 050106, 'AYACUCHO', 'HUAMANGA', 'SAN JOSE DE TICLLAS'),
(467, 050107, 'AYACUCHO', 'HUAMANGA', 'SAN JUAN BAUTISTA'),
(468, 050108, 'AYACUCHO', 'HUAMANGA', 'SANTIAGO DE PISCHA'),
(469, 050109, 'AYACUCHO', 'HUAMANGA', 'VINCHOS'),
(470, 050110, 'AYACUCHO', 'HUAMANGA', 'TAMBILLO'),
(471, 050111, 'AYACUCHO', 'HUAMANGA', 'ACOCRO'),
(472, 050112, 'AYACUCHO', 'HUAMANGA', 'SOCOS'),
(473, 050113, 'AYACUCHO', 'HUAMANGA', 'OCROS'),
(474, 050114, 'AYACUCHO', 'HUAMANGA', 'PACAYCASA'),
(475, 050115, 'AYACUCHO', 'HUAMANGA', 'JESUS NAZARENO'),
(476, 050301, 'AYACUCHO', 'HUANTA', 'HUANTA'),
(477, 050302, 'AYACUCHO', 'HUANTA', 'AYAHUANCO'),
(478, 050303, 'AYACUCHO', 'HUANTA', 'HUAMANGUILLA'),
(479, 050304, 'AYACUCHO', 'HUANTA', 'IGUAIN'),
(480, 050305, 'AYACUCHO', 'HUANTA', 'LURICOCHA'),
(481, 050307, 'AYACUCHO', 'HUANTA', 'SANTILLANA'),
(482, 050308, 'AYACUCHO', 'HUANTA', 'SIVIA'),
(483, 050309, 'AYACUCHO', 'HUANTA', 'LLOCHEGUA'),
(484, 050401, 'AYACUCHO', 'LA MAR', 'SAN MIGUEL'),
(485, 050402, 'AYACUCHO', 'LA MAR', 'ANCO'),
(486, 050403, 'AYACUCHO', 'LA MAR', 'AYNA'),
(487, 050404, 'AYACUCHO', 'LA MAR', 'CHILCAS'),
(488, 050405, 'AYACUCHO', 'LA MAR', 'CHUNGUI'),
(489, 050406, 'AYACUCHO', 'LA MAR', 'TAMBO'),
(490, 050407, 'AYACUCHO', 'LA MAR', 'LUIS CARRANZA'),
(491, 050408, 'AYACUCHO', 'LA MAR', 'SANTA ROSA'),
(492, 050501, 'AYACUCHO', 'LUCANAS', 'PUQUIO'),
(493, 050502, 'AYACUCHO', 'LUCANAS', 'AUCARA'),
(494, 050503, 'AYACUCHO', 'LUCANAS', 'CABANA'),
(495, 050504, 'AYACUCHO', 'LUCANAS', 'CARMEN SALCEDO'),
(496, 050506, 'AYACUCHO', 'LUCANAS', 'CHAVIÑA'),
(497, 050508, 'AYACUCHO', 'LUCANAS', 'CHIPAO'),
(498, 050510, 'AYACUCHO', 'LUCANAS', 'HUAC-HUAS'),
(499, 050511, 'AYACUCHO', 'LUCANAS', 'LARAMATE'),
(500, 050512, 'AYACUCHO', 'LUCANAS', 'LEONCIO PRADO'),
(501, 050513, 'AYACUCHO', 'LUCANAS', 'LUCANAS'),
(502, 050514, 'AYACUCHO', 'LUCANAS', 'LLAUTA'),
(503, 050516, 'AYACUCHO', 'LUCANAS', 'OCAÑA'),
(504, 050517, 'AYACUCHO', 'LUCANAS', 'OTOCA'),
(505, 050520, 'AYACUCHO', 'LUCANAS', 'SANCOS'),
(506, 050521, 'AYACUCHO', 'LUCANAS', 'SAN JUAN'),
(507, 050522, 'AYACUCHO', 'LUCANAS', 'SAN PEDRO'),
(508, 050524, 'AYACUCHO', 'LUCANAS', 'SANTA ANA DE HUAYCAHUACHO'),
(509, 050525, 'AYACUCHO', 'LUCANAS', 'SANTA LUCIA'),
(510, 050529, 'AYACUCHO', 'LUCANAS', 'SAISA'),
(511, 050531, 'AYACUCHO', 'LUCANAS', 'SAN PEDRO DE PALCO'),
(512, 050532, 'AYACUCHO', 'LUCANAS', 'SAN CRISTOBAL'),
(513, 050601, 'AYACUCHO', 'PARINACOCHAS', 'CORACORA'),
(514, 050604, 'AYACUCHO', 'PARINACOCHAS', 'CORONEL CASTAÑEDA'),
(515, 050605, 'AYACUCHO', 'PARINACOCHAS', 'CHUMPI'),
(516, 050608, 'AYACUCHO', 'PARINACOCHAS', 'PACAPAUSA'),
(517, 050611, 'AYACUCHO', 'PARINACOCHAS', 'PULLO'),
(518, 050612, 'AYACUCHO', 'PARINACOCHAS', 'PUYUSCA'),
(519, 050615, 'AYACUCHO', 'PARINACOCHAS', 'SAN FRANCISCO DE RAVACAYCO'),
(520, 050616, 'AYACUCHO', 'PARINACOCHAS', 'UPAHUACHO'),
(521, 051001, 'AYACUCHO', 'PAUCAR DEL SARA SARA', 'PAUSA'),
(522, 051002, 'AYACUCHO', 'PAUCAR DEL SARA SARA', 'COLTA'),
(523, 051003, 'AYACUCHO', 'PAUCAR DEL SARA SARA', 'CORCULLA'),
(524, 051004, 'AYACUCHO', 'PAUCAR DEL SARA SARA', 'LAMPA'),
(525, 051005, 'AYACUCHO', 'PAUCAR DEL SARA SARA', 'MARCABAMBA'),
(526, 051006, 'AYACUCHO', 'PAUCAR DEL SARA SARA', 'OYOLO'),
(527, 051007, 'AYACUCHO', 'PAUCAR DEL SARA SARA', 'PARARCA'),
(528, 051008, 'AYACUCHO', 'PAUCAR DEL SARA SARA', 'SAN JAVIER DE ALPABAMBA'),
(529, 051009, 'AYACUCHO', 'PAUCAR DEL SARA SARA', 'SAN JOSE DE USHUA'),
(530, 051010, 'AYACUCHO', 'PAUCAR DEL SARA SARA', 'SARA SARA'),
(531, 050901, 'AYACUCHO', 'VILCAS HUAMAN', 'VILCAS HUAMAN'),
(532, 050902, 'AYACUCHO', 'VILCAS HUAMAN', 'VISCHONGO'),
(533, 050903, 'AYACUCHO', 'VILCAS HUAMAN', 'ACCOMARCA'),
(534, 050904, 'AYACUCHO', 'VILCAS HUAMAN', 'CARHUANCA'),
(535, 050905, 'AYACUCHO', 'VILCAS HUAMAN', 'CONCEPCION'),
(536, 050906, 'AYACUCHO', 'VILCAS HUAMAN', 'HUAMBALPA'),
(537, 050907, 'AYACUCHO', 'VILCAS HUAMAN', 'SAURAMA'),
(538, 050908, 'AYACUCHO', 'VILCAS HUAMAN', 'INDEPENDENCIA'),
(539, 051101, 'AYACUCHO', 'SUCRE', 'QUEROBAMBA'),
(540, 051102, 'AYACUCHO', 'SUCRE', 'BELEN'),
(541, 051103, 'AYACUCHO', 'SUCRE', 'CHALCOS'),
(542, 051104, 'AYACUCHO', 'SUCRE', 'SAN SALVADOR DE QUIJE'),
(543, 051105, 'AYACUCHO', 'SUCRE', 'PAICO'),
(544, 051106, 'AYACUCHO', 'SUCRE', 'SANTIAGO DE PAUCARAY'),
(545, 051107, 'AYACUCHO', 'SUCRE', 'SAN PEDRO DE LARCAY'),
(546, 051108, 'AYACUCHO', 'SUCRE', 'SORAS'),
(547, 051109, 'AYACUCHO', 'SUCRE', 'HUACAÑA'),
(548, 051110, 'AYACUCHO', 'SUCRE', 'CHILCAYOC'),
(549, 051111, 'AYACUCHO', 'SUCRE', 'MORCOLLA'),
(550, 060101, 'CAJAMARCA', 'CAJAMARCA', 'CAJAMARCA'),
(551, 060102, 'CAJAMARCA', 'CAJAMARCA', 'ASUNCION'),
(552, 060103, 'CAJAMARCA', 'CAJAMARCA', 'COSPAN'),
(553, 060104, 'CAJAMARCA', 'CAJAMARCA', 'CHETILLA'),
(554, 060105, 'CAJAMARCA', 'CAJAMARCA', 'ENCAÑADA'),
(555, 060106, 'CAJAMARCA', 'CAJAMARCA', 'JESUS'),
(556, 060107, 'CAJAMARCA', 'CAJAMARCA', 'LOS BAÑOS DEL INCA'),
(557, 060108, 'CAJAMARCA', 'CAJAMARCA', 'LLACANORA'),
(558, 060109, 'CAJAMARCA', 'CAJAMARCA', 'MAGDALENA'),
(559, 060110, 'CAJAMARCA', 'CAJAMARCA', 'MATARA'),
(560, 060111, 'CAJAMARCA', 'CAJAMARCA', 'NAMORA'),
(561, 060112, 'CAJAMARCA', 'CAJAMARCA', 'SAN JUAN'),
(562, 060201, 'CAJAMARCA', 'CAJABAMBA', 'CAJABAMBA'),
(563, 060202, 'CAJAMARCA', 'CAJABAMBA', 'CACHACHI'),
(564, 060203, 'CAJAMARCA', 'CAJABAMBA', 'CONDEBAMBA'),
(565, 060205, 'CAJAMARCA', 'CAJABAMBA', 'SITACOCHA'),
(566, 060301, 'CAJAMARCA', 'CELENDIN', 'CELENDIN'),
(567, 060302, 'CAJAMARCA', 'CELENDIN', 'CORTEGANA'),
(568, 060303, 'CAJAMARCA', 'CELENDIN', 'CHUMUCH'),
(569, 060304, 'CAJAMARCA', 'CELENDIN', 'HUASMIN'),
(570, 060305, 'CAJAMARCA', 'CELENDIN', 'JORGE CHAVEZ'),
(571, 060306, 'CAJAMARCA', 'CELENDIN', 'JOSE GALVEZ'),
(572, 060307, 'CAJAMARCA', 'CELENDIN', 'MIGUEL IGLESIAS'),
(573, 060308, 'CAJAMARCA', 'CELENDIN', 'OXAMARCA'),
(574, 060309, 'CAJAMARCA', 'CELENDIN', 'SOROCHUCO'),
(575, 060310, 'CAJAMARCA', 'CELENDIN', 'SUCRE'),
(576, 060311, 'CAJAMARCA', 'CELENDIN', 'UTCO'),
(577, 060312, 'CAJAMARCA', 'CELENDIN', 'LA LIBERTAD DE PALLAN'),
(578, 061201, 'CAJAMARCA', 'SAN MARCOS', 'PEDRO GALVEZ'),
(579, 061202, 'CAJAMARCA', 'SAN MARCOS', 'ICHOCAN'),
(580, 061203, 'CAJAMARCA', 'SAN MARCOS', 'GREGORIO PITA'),
(581, 061204, 'CAJAMARCA', 'SAN MARCOS', 'JOSE MANUEL QUIROZ'),
(582, 061205, 'CAJAMARCA', 'SAN MARCOS', 'EDUARDO VILLANUEVA'),
(583, 061206, 'CAJAMARCA', 'SAN MARCOS', 'JOSE SABOGAL'),
(584, 061207, 'CAJAMARCA', 'SAN MARCOS', 'CHANCAY'),
(585, 060601, 'CAJAMARCA', 'CHOTA', 'CHOTA'),
(586, 060602, 'CAJAMARCA', 'CHOTA', 'ANGUIA'),
(587, 060603, 'CAJAMARCA', 'CHOTA', 'COCHABAMBA'),
(588, 060604, 'CAJAMARCA', 'CHOTA', 'CONCHAN'),
(589, 060605, 'CAJAMARCA', 'CHOTA', 'CHADIN'),
(590, 060510, 'CAJAMARCA', 'CUTERVO', 'SAN LUIS DE LUCMA'),
(591, 060511, 'CAJAMARCA', 'CUTERVO', 'SANTA CRUZ'),
(592, 060512, 'CAJAMARCA', 'CUTERVO', 'STO. DOMINGO DE CAPILLA'),
(593, 060513, 'CAJAMARCA', 'CUTERVO', 'SANTO TOMAS'),
(594, 060514, 'CAJAMARCA', 'CUTERVO', 'SOCOTA'),
(595, 060515, 'CAJAMARCA', 'CUTERVO', 'TORIBIO CASANOVA'),
(596, 060701, 'CAJAMARCA', 'HUALGAYOC', 'BAMBAMARCA'),
(597, 060702, 'CAJAMARCA', 'HUALGAYOC', 'CHUGUR'),
(598, 060703, 'CAJAMARCA', 'HUALGAYOC', 'HUALGAYOC'),
(599, 060901, 'CAJAMARCA', 'SANTA CRUZ', 'SANTA CRUZ'),
(600, 060902, 'CAJAMARCA', 'SANTA CRUZ', 'CATACHE'),
(601, 060903, 'CAJAMARCA', 'SANTA CRUZ', 'CHANCAYBAÑOS'),
(602, 060904, 'CAJAMARCA', 'SANTA CRUZ', 'LA ESPERANZA'),
(603, 060905, 'CAJAMARCA', 'SANTA CRUZ', 'NINABAMBA'),
(604, 060906, 'CAJAMARCA', 'SANTA CRUZ', 'PULAN'),
(605, 060907, 'CAJAMARCA', 'SANTA CRUZ', 'SEXI'),
(606, 060908, 'CAJAMARCA', 'SANTA CRUZ', 'UTICYACU'),
(607, 060909, 'CAJAMARCA', 'SANTA CRUZ', 'YAUYUCAN'),
(608, 060910, 'CAJAMARCA', 'SANTA CRUZ', 'ANDABAMBA'),
(609, 060911, 'CAJAMARCA', 'SANTA CRUZ', 'SAUCEPAMPA'),
(610, 061001, 'CAJAMARCA', 'SAN MIGUEL', 'SAN MIGUEL'),
(611, 061002, 'CAJAMARCA', 'SAN MIGUEL', 'CALQUIS'),
(612, 061003, 'CAJAMARCA', 'SAN MIGUEL', 'LA FLORIDA'),
(613, 061004, 'CAJAMARCA', 'SAN MIGUEL', 'LLAPA'),
(614, 061005, 'CAJAMARCA', 'SAN MIGUEL', 'NANCHOC'),
(615, 061006, 'CAJAMARCA', 'SAN MIGUEL', 'NIEPOS'),
(616, 061007, 'CAJAMARCA', 'SAN MIGUEL', 'SAN GREGORIO'),
(617, 061008, 'CAJAMARCA', 'SAN MIGUEL', 'SAN SILVESTRE DE COCHAN'),
(618, 061009, 'CAJAMARCA', 'SAN MIGUEL', 'EL PRADO'),
(619, 061010, 'CAJAMARCA', 'SAN MIGUEL', 'UNION AGUA BLANCA'),
(620, 061011, 'CAJAMARCA', 'SAN MIGUEL', 'TONGOD'),
(621, 061012, 'CAJAMARCA', 'SAN MIGUEL', 'CATILLUC'),
(622, 061013, 'CAJAMARCA', 'SAN MIGUEL', 'BOLIVAR'),
(623, 060801, 'CAJAMARCA', 'JAEN', 'JAEN'),
(624, 060802, 'CAJAMARCA', 'JAEN', 'BELLAVISTA'),
(625, 060803, 'CAJAMARCA', 'JAEN', 'COLASAY'),
(626, 060804, 'CAJAMARCA', 'JAEN', 'CHONTALI'),
(627, 060805, 'CAJAMARCA', 'JAEN', 'POMAHUACA'),
(628, 060806, 'CAJAMARCA', 'JAEN', 'PUCARA'),
(629, 060807, 'CAJAMARCA', 'JAEN', 'SALLIQUE'),
(630, 060808, 'CAJAMARCA', 'JAEN', 'SAN FELIPE'),
(631, 060809, 'CAJAMARCA', 'JAEN', 'SAN JOSE DEL ALTO'),
(632, 060810, 'CAJAMARCA', 'JAEN', 'SANTA ROSA'),
(633, 060811, 'CAJAMARCA', 'JAEN', 'LAS PIRIAS'),
(634, 060812, 'CAJAMARCA', 'JAEN', 'HUABAL'),
(635, 061101, 'CAJAMARCA', 'SAN IGNACIO', 'SAN IGNACIO'),
(636, 061102, 'CAJAMARCA', 'SAN IGNACIO', 'CHIRINOS'),
(637, 061103, 'CAJAMARCA', 'SAN IGNACIO', 'HUARANGO'),
(638, 061104, 'CAJAMARCA', 'SAN IGNACIO', 'NAMBALLE'),
(639, 061105, 'CAJAMARCA', 'SAN IGNACIO', 'LA COIPA'),
(640, 061106, 'CAJAMARCA', 'SAN IGNACIO', 'SAN JOSE DE LOURDES'),
(641, 061107, 'CAJAMARCA', 'SAN IGNACIO', 'TABACONAS'),
(642, 060401, 'CAJAMARCA', 'CONTUMAZA', 'CONTUMAZA'),
(643, 060403, 'CAJAMARCA', 'CONTUMAZA', 'CHILETE'),
(644, 060404, 'CAJAMARCA', 'CONTUMAZA', 'GUZMANGO'),
(645, 060405, 'CAJAMARCA', 'CONTUMAZA', 'SAN BENITO'),
(646, 060406, 'CAJAMARCA', 'CONTUMAZA', 'CUPISNIQUE'),
(647, 060407, 'CAJAMARCA', 'CONTUMAZA', 'TANTARICA'),
(648, 060408, 'CAJAMARCA', 'CONTUMAZA', 'YONAN'),
(649, 060409, 'CAJAMARCA', 'CONTUMAZA', 'SANTA CRUZ DE TOLED'),
(650, 061301, 'CAJAMARCA', 'SAN PABLO', 'SAN PABLO'),
(651, 061302, 'CAJAMARCA', 'SAN PABLO', 'SAN BERNARDINO'),
(652, 061303, 'CAJAMARCA', 'SAN PABLO', 'SAN LUIS'),
(653, 061304, 'CAJAMARCA', 'SAN PABLO', 'TUMBADEN'),
(654, 240101, 'CALLAO', 'CALLAO', 'CALLAO'),
(655, 240102, 'CALLAO', 'CALLAO', 'BELLAVISTA'),
(656, 240103, 'CALLAO', 'CALLAO', 'LA PUNTA'),
(657, 240104, 'CALLAO', 'CALLAO', 'CARMEN DE LA LEGUA-REYNOSO'),
(658, 240105, 'CALLAO', 'CALLAO', 'LA PERLA'),
(659, 240106, 'CALLAO', 'CALLAO', 'VENTANILLA'),
(660, 070201, 'CUSCO', 'ACOMAYO', 'ACOMAYO'),
(661, 070202, 'CUSCO', 'ACOMAYO', 'ACOPIA'),
(662, 070203, 'CUSCO', 'ACOMAYO', 'ACOS'),
(663, 070204, 'CUSCO', 'ACOMAYO', 'POMACANCHI'),
(664, 070205, 'CUSCO', 'ACOMAYO', 'RONDOCAN'),
(665, 070206, 'CUSCO', 'ACOMAYO', 'SANGARARA'),
(666, 070207, 'CUSCO', 'ACOMAYO', 'MOSOC LLACTA'),
(667, 070501, 'CUSCO', 'CANAS', 'YANAOCA'),
(668, 070502, 'CUSCO', 'CANAS', 'CHECCA'),
(669, 070503, 'CUSCO', 'CANAS', 'KUNTURKANKI'),
(670, 070504, 'CUSCO', 'CANAS', 'LANGUI'),
(671, 070505, 'CUSCO', 'CANAS', 'LAYO'),
(672, 070506, 'CUSCO', 'CANAS', 'PAMPAMARCA'),
(673, 070507, 'CUSCO', 'CANAS', 'QUEHUE'),
(674, 070508, 'CUSCO', 'CANAS', 'TUPAC AMARU'),
(675, 070601, 'CUSCO', 'CANCHIS', 'SICUANI'),
(676, 070602, 'CUSCO', 'CANCHIS', 'COMBAPATA'),
(677, 070603, 'CUSCO', 'CANCHIS', 'CHECACUPE'),
(678, 070604, 'CUSCO', 'CANCHIS', 'MARANGANI'),
(679, 070605, 'CUSCO', 'CANCHIS', 'PITUMARCA'),
(680, 070606, 'CUSCO', 'CANCHIS', 'SAN PABLO'),
(681, 070607, 'CUSCO', 'CANCHIS', 'SAN PEDRO'),
(682, 070608, 'CUSCO', 'CANCHIS', 'TINTA'),
(683, 070101, 'CUSCO', 'CUSCO', 'CUSCO'),
(684, 070102, 'CUSCO', 'CUSCO', 'CCORCA'),
(685, 070103, 'CUSCO', 'CUSCO', 'POROY'),
(686, 070104, 'CUSCO', 'CUSCO', 'SAN JERONIMO'),
(687, 070105, 'CUSCO', 'CUSCO', 'SAN SEBASTIAN'),
(688, 070106, 'CUSCO', 'CUSCO', 'SANTIAGO'),
(689, 070107, 'CUSCO', 'CUSCO', 'SAYLLA'),
(690, 070108, 'CUSCO', 'CUSCO', 'WANCHAQ'),
(691, 070301, 'CUSCO', 'ANTA', 'ANTA'),
(692, 070302, 'CUSCO', 'ANTA', 'CHINCHAYPUJIO'),
(693, 070303, 'CUSCO', 'ANTA', 'HUAROCONDO'),
(694, 070304, 'CUSCO', 'ANTA', 'LIMATAMBO'),
(695, 070305, 'CUSCO', 'ANTA', 'MOLLEPATA'),
(696, 070306, 'CUSCO', 'ANTA', 'PUCYURA'),
(697, 070307, 'CUSCO', 'ANTA', 'ZURITE'),
(698, 070308, 'CUSCO', 'ANTA', 'CACHIMAYO'),
(699, 070309, 'CUSCO', 'ANTA', 'ANCAHUASI'),
(700, 071001, 'CUSCO', 'PARURO', 'PARURO'),
(701, 071002, 'CUSCO', 'PARURO', 'ACCHA'),
(702, 071003, 'CUSCO', 'PARURO', 'CCAPI'),
(703, 071004, 'CUSCO', 'PARURO', 'COLCHA'),
(704, 071005, 'CUSCO', 'PARURO', 'HUANOQUITE'),
(705, 071006, 'CUSCO', 'PARURO', 'OMACHA'),
(706, 071007, 'CUSCO', 'PARURO', 'YAURISQUE'),
(707, 071008, 'CUSCO', 'PARURO', 'PACCARITAMBO'),
(708, 060606, 'CAJAMARCA', 'CHOTA', 'CHIGUIRIP'),
(709, 060607, 'CAJAMARCA', 'CHOTA', 'CHIMBAN'),
(710, 060608, 'CAJAMARCA', 'CHOTA', 'HUAMBOS'),
(711, 060609, 'CAJAMARCA', 'CHOTA', 'LAJAS'),
(712, 060610, 'CAJAMARCA', 'CHOTA', 'LLAMA'),
(713, 060611, 'CAJAMARCA', 'CHOTA', 'MIRACOSTA'),
(714, 060612, 'CAJAMARCA', 'CHOTA', 'PACCHA'),
(715, 060613, 'CAJAMARCA', 'CHOTA', 'PION'),
(716, 060614, 'CAJAMARCA', 'CHOTA', 'QUEROCOTO'),
(717, 060615, 'CAJAMARCA', 'CHOTA', 'TACABAMBA'),
(718, 060616, 'CAJAMARCA', 'CHOTA', 'TOCMOCHE'),
(719, 060617, 'CAJAMARCA', 'CHOTA', 'SAN JUAN DE LICUPIS'),
(720, 060618, 'CAJAMARCA', 'CHOTA', 'CHOROPAMPA'),
(721, 060619, 'CAJAMARCA', 'CHOTA', 'CHALAMARCA'),
(722, 060501, 'CAJAMARCA', 'CUTERVO', 'CUTERVO'),
(723, 060502, 'CAJAMARCA', 'CUTERVO', 'CALLAYUC'),
(724, 060503, 'CAJAMARCA', 'CUTERVO', 'CUJILLO'),
(725, 060504, 'CAJAMARCA', 'CUTERVO', 'CHOROS'),
(726, 060505, 'CAJAMARCA', 'CUTERVO', 'LA RAMADA'),
(727, 060506, 'CAJAMARCA', 'CUTERVO', 'PIMPINGOS'),
(728, 060507, 'CAJAMARCA', 'CUTERVO', 'QUEROCOTILLO'),
(729, 060508, 'CAJAMARCA', 'CUTERVO', 'SAN ANDRES DE CUTERVO'),
(730, 060509, 'CAJAMARCA', 'CUTERVO', 'SAN JUAN DE CUTERVO'),
(731, 110326, 'JUNIN', 'JAUJA', 'SAN LORENZO'),
(732, 110327, 'JUNIN', 'JAUJA', 'SAN PEDRO DE CHUNAN'),
(733, 110328, 'JUNIN', 'JAUJA', 'SINCOS'),
(734, 110329, 'JUNIN', 'JAUJA', 'TUNAN MARCA'),
(735, 110330, 'JUNIN', 'JAUJA', 'YAULI'),
(736, 110331, 'JUNIN', 'JAUJA', 'CURICACA'),
(737, 110332, 'JUNIN', 'JAUJA', 'MASMA CHICCHE'),
(738, 110333, 'JUNIN', 'JAUJA', 'SAUSA'),
(739, 110334, 'JUNIN', 'JAUJA', 'YAUYOS'),
(740, 110401, 'JUNIN', 'JUNIN', 'JUNIN'),
(741, 110402, 'JUNIN', 'JUNIN', 'CARHUAMAYO'),
(742, 110403, 'JUNIN', 'JUNIN', 'ONDORES'),
(743, 110404, 'JUNIN', 'JUNIN', 'ULCUMAYO'),
(744, 110501, 'JUNIN', 'TARMA', 'TARMA'),
(745, 110502, 'JUNIN', 'TARMA', 'ACOBAMBA'),
(746, 110503, 'JUNIN', 'TARMA', 'HUARICOLCA'),
(747, 110504, 'JUNIN', 'TARMA', 'HUASAHUASI'),
(748, 110505, 'JUNIN', 'TARMA', 'LA UNION'),
(749, 110506, 'JUNIN', 'TARMA', 'PALCA'),
(750, 110507, 'JUNIN', 'TARMA', 'PALCAMAYO'),
(751, 110508, 'JUNIN', 'TARMA', 'SAN PEDRO DE CAJAS'),
(752, 110509, 'JUNIN', 'TARMA', 'TAPO'),
(753, 110601, 'JUNIN', 'YAULI', 'LA OROYA'),
(754, 110602, 'JUNIN', 'YAULI', 'CHACAPALPA'),
(755, 110603, 'JUNIN', 'YAULI', 'HUAY HUAY'),
(756, 110604, 'JUNIN', 'YAULI', 'MARCAPOMACOCHA'),
(757, 110605, 'JUNIN', 'YAULI', 'MOROCOCHA'),
(758, 110606, 'JUNIN', 'YAULI', 'PACCHA'),
(759, 110607, 'JUNIN', 'YAULI', 'SANTA BARBARA DE CARHUACAYAN'),
(760, 110608, 'JUNIN', 'YAULI', 'SUITUCANCHA'),
(761, 110609, 'JUNIN', 'YAULI', 'YAULI'),
(762, 110610, 'JUNIN', 'YAULI', 'SANTA ROSA DE SACCO'),
(763, 120501, 'LA LIBERTAD', 'PACASMAYO', 'SAN PEDRO DE LLOC'),
(764, 120503, 'LA LIBERTAD', 'PACASMAYO', 'GUADALUPE'),
(765, 120504, 'LA LIBERTAD', 'PACASMAYO', 'JEQUETEPEQUE'),
(766, 120506, 'LA LIBERTAD', 'PACASMAYO', 'PACASMAYO'),
(767, 120508, 'LA LIBERTAD', 'PACASMAYO', 'SAN JOSE'),
(768, 120801, 'LA LIBERTAD', 'ASCOPE', 'ASCOPE'),
(769, 120802, 'LA LIBERTAD', 'ASCOPE', 'CHICAMA'),
(770, 120803, 'LA LIBERTAD', 'ASCOPE', 'CHOCOPE'),
(771, 120804, 'LA LIBERTAD', 'ASCOPE', 'SANTIAGO DE CAO'),
(772, 120805, 'LA LIBERTAD', 'ASCOPE', 'MAGDALENA DE CAO'),
(773, 120806, 'LA LIBERTAD', 'ASCOPE', 'PAIJAN'),
(774, 120807, 'LA LIBERTAD', 'ASCOPE', 'RAZURI'),
(775, 120808, 'LA LIBERTAD', 'ASCOPE', 'CASA GRANDE'),
(776, 120901, 'LA LIBERTAD', 'CHEPEN', 'CHEPEN'),
(777, 120902, 'LA LIBERTAD', 'CHEPEN', 'PACANGA'),
(778, 120903, 'LA LIBERTAD', 'CHEPEN', 'PUEBLO NUEVO'),
(779, 121101, 'LA LIBERTAD', 'GRAN CHIMU', 'CASCAS'),
(780, 121102, 'LA LIBERTAD', 'GRAN CHIMU', 'LUCMA'),
(781, 121103, 'LA LIBERTAD', 'GRAN CHIMU', 'MARMOT'),
(782, 121104, 'LA LIBERTAD', 'GRAN CHIMU', 'SAYAPULLO'),
(783, 120601, 'LA LIBERTAD', 'PATAZ', 'TAYABAMBA'),
(784, 120602, 'LA LIBERTAD', 'PATAZ', 'BULDIBUYO'),
(785, 120603, 'LA LIBERTAD', 'PATAZ', 'CHILLIA'),
(786, 120604, 'LA LIBERTAD', 'PATAZ', 'HUAYLILLAS'),
(787, 120605, 'LA LIBERTAD', 'PATAZ', 'HUANCASPATA'),
(788, 120606, 'LA LIBERTAD', 'PATAZ', 'HUAYO'),
(789, 120607, 'LA LIBERTAD', 'PATAZ', 'ONGON'),
(790, 120608, 'LA LIBERTAD', 'PATAZ', 'PARCOY'),
(791, 120609, 'LA LIBERTAD', 'PATAZ', 'PATAZ'),
(792, 120610, 'LA LIBERTAD', 'PATAZ', 'PIAS'),
(793, 120611, 'LA LIBERTAD', 'PATAZ', 'TAURIJA'),
(794, 120612, 'LA LIBERTAD', 'PATAZ', 'URPAY'),
(795, 120613, 'LA LIBERTAD', 'PATAZ', 'SANTIAGO DE CHALLAS'),
(796, 120201, 'LA LIBERTAD', 'BOLIVAR', 'BOLIVAR'),
(797, 120202, 'LA LIBERTAD', 'BOLIVAR', 'BAMBAMARCA'),
(798, 120203, 'LA LIBERTAD', 'BOLIVAR', 'CONDORMARCA'),
(799, 120204, 'LA LIBERTAD', 'BOLIVAR', 'LONGOTEA'),
(800, 120205, 'LA LIBERTAD', 'BOLIVAR', 'UCUNCHA'),
(801, 120206, 'LA LIBERTAD', 'BOLIVAR', 'UCHUMARCA'),
(802, 120301, 'LA LIBERTAD', 'SANCHEZ CARRION', 'HUAMACHUCO'),
(803, 120302, 'LA LIBERTAD', 'SANCHEZ CARRION', 'COCHORCO'),
(804, 120303, 'LA LIBERTAD', 'SANCHEZ CARRION', 'CURGOS'),
(805, 120304, 'LA LIBERTAD', 'SANCHEZ CARRION', 'CHUGAY'),
(806, 120305, 'LA LIBERTAD', 'SANCHEZ CARRION', 'MARCABAL'),
(807, 120306, 'LA LIBERTAD', 'SANCHEZ CARRION', 'SANAGORAN'),
(808, 120307, 'LA LIBERTAD', 'SANCHEZ CARRION', 'SARIN'),
(809, 120308, 'LA LIBERTAD', 'SANCHEZ CARRION', 'SARTIMBAMBA'),
(810, 120701, 'LA LIBERTAD', 'SANTIAGO DE CHUCO', 'SANTIAGO DE CHUCO'),
(811, 120702, 'LA LIBERTAD', 'SANTIAGO DE CHUCO', 'CACHICADAN'),
(812, 120703, 'LA LIBERTAD', 'SANTIAGO DE CHUCO', 'MOLLEBAMBA'),
(813, 120704, 'LA LIBERTAD', 'SANTIAGO DE CHUCO', 'MOLLEPATA'),
(814, 120705, 'LA LIBERTAD', 'SANTIAGO DE CHUCO', 'QUIRUVILCA'),
(815, 120706, 'LA LIBERTAD', 'SANTIAGO DE CHUCO', 'SANTA CRUZ DE CHUCA'),
(816, 120707, 'LA LIBERTAD', 'SANTIAGO DE CHUCO', 'SITABAMBA'),
(817, 120708, 'LA LIBERTAD', 'SANTIAGO DE CHUCO', 'ANGASMARCA'),
(818, 120101, 'LA LIBERTAD', 'TRUJILLO', 'TRUJILLO'),
(819, 120102, 'LA LIBERTAD', 'TRUJILLO', 'HUANCHACO'),
(820, 120103, 'LA LIBERTAD', 'TRUJILLO', 'LAREDO'),
(821, 120104, 'LA LIBERTAD', 'TRUJILLO', 'MOCHE'),
(822, 120105, 'LA LIBERTAD', 'TRUJILLO', 'SALAVERRY'),
(823, 120106, 'LA LIBERTAD', 'TRUJILLO', 'SIMBAL'),
(824, 120107, 'LA LIBERTAD', 'TRUJILLO', 'VICTOR LARCO HERRERA'),
(825, 120109, 'LA LIBERTAD', 'TRUJILLO', 'POROTO'),
(826, 120110, 'LA LIBERTAD', 'TRUJILLO', 'EL PORVENIR'),
(827, 120111, 'LA LIBERTAD', 'TRUJILLO', 'LA ESPERANZA'),
(828, 120112, 'LA LIBERTAD', 'TRUJILLO', 'FLORENCIA DE MORA'),
(829, 120401, 'LA LIBERTAD', 'OTUZCO', 'OTUZCO'),
(830, 120402, 'LA LIBERTAD', 'OTUZCO', 'AGALLPAMPA'),
(831, 120403, 'LA LIBERTAD', 'OTUZCO', 'CHARAT'),
(832, 120404, 'LA LIBERTAD', 'OTUZCO', 'HUARANCHAL'),
(833, 120405, 'LA LIBERTAD', 'OTUZCO', 'LA CUESTA'),
(834, 120408, 'LA LIBERTAD', 'OTUZCO', 'PARANDAY'),
(835, 120409, 'LA LIBERTAD', 'OTUZCO', 'SALPO'),
(836, 120410, 'LA LIBERTAD', 'OTUZCO', 'SINSICAP'),
(837, 120411, 'LA LIBERTAD', 'OTUZCO', 'USQUIL'),
(838, 120413, 'LA LIBERTAD', 'OTUZCO', 'MACHE'),
(839, 121001, 'LA LIBERTAD', 'JULCAN', 'JULCAN'),
(840, 121002, 'LA LIBERTAD', 'JULCAN', 'CARABAMBA'),
(841, 121003, 'LA LIBERTAD', 'JULCAN', 'CALAMARCA'),
(842, 121004, 'LA LIBERTAD', 'JULCAN', 'HUASO'),
(843, 121201, 'LA LIBERTAD', 'VIRU', 'VIRU'),
(844, 121202, 'LA LIBERTAD', 'VIRU', 'CHAO'),
(845, 121203, 'LA LIBERTAD', 'VIRU', 'GUADALUPITO'),
(846, 130101, 'LAMBAYEQUE', 'CHICLAYO', 'CHICLAYO'),
(847, 130102, 'LAMBAYEQUE', 'CHICLAYO', 'CHONGOYAPE'),
(848, 130103, 'LAMBAYEQUE', 'CHICLAYO', 'ETEN'),
(849, 130104, 'LAMBAYEQUE', 'CHICLAYO', 'ETEN PUERTO'),
(850, 130105, 'LAMBAYEQUE', 'CHICLAYO', 'LAGUNAS'),
(851, 130106, 'LAMBAYEQUE', 'CHICLAYO', 'MONSEFU'),
(852, 130107, 'LAMBAYEQUE', 'CHICLAYO', 'NUEVA ARICA'),
(853, 130108, 'LAMBAYEQUE', 'CHICLAYO', 'OYOTUN'),
(854, 130109, 'LAMBAYEQUE', 'CHICLAYO', 'PICSI'),
(855, 130110, 'LAMBAYEQUE', 'CHICLAYO', 'PIMENTEL'),
(856, 130111, 'LAMBAYEQUE', 'CHICLAYO', 'REQUE'),
(857, 130112, 'LAMBAYEQUE', 'CHICLAYO', 'JOSE LEONARDO ORTIZ'),
(858, 130113, 'LAMBAYEQUE', 'CHICLAYO', 'SANTA ROSA'),
(859, 130114, 'LAMBAYEQUE', 'CHICLAYO', 'SAÑA'),
(860, 130115, 'LAMBAYEQUE', 'CHICLAYO', 'LA VICTORIA'),
(861, 130116, 'LAMBAYEQUE', 'CHICLAYO', 'CAYALTI'),
(862, 130117, 'LAMBAYEQUE', 'CHICLAYO', 'PATAPO'),
(863, 130118, 'LAMBAYEQUE', 'CHICLAYO', 'POMALCA'),
(864, 130119, 'LAMBAYEQUE', 'CHICLAYO', 'PUCALA'),
(865, 130120, 'LAMBAYEQUE', 'CHICLAYO', 'TUMAN'),
(866, 130201, 'LAMBAYEQUE', 'FERREÑAFE', 'FERREÑAFE'),
(867, 130202, 'LAMBAYEQUE', 'FERREÑAFE', 'INCAHUASI'),
(868, 130203, 'LAMBAYEQUE', 'FERREÑAFE', 'CAÑARIS'),
(869, 130204, 'LAMBAYEQUE', 'FERREÑAFE', 'PITIPO'),
(870, 130205, 'LAMBAYEQUE', 'FERREÑAFE', 'PUEBLO NUEVO'),
(871, 130206, 'LAMBAYEQUE', 'FERREÑAFE', 'MANUEL ANTONIO MESONES MURO'),
(872, 130301, 'LAMBAYEQUE', 'LAMBAYEQUE', 'LAMBAYEQUE'),
(873, 130302, 'LAMBAYEQUE', 'LAMBAYEQUE', 'CHOCHOPE'),
(874, 130303, 'LAMBAYEQUE', 'LAMBAYEQUE', 'ILLIMO'),
(875, 130304, 'LAMBAYEQUE', 'LAMBAYEQUE', 'JAYANCA'),
(876, 130305, 'LAMBAYEQUE', 'LAMBAYEQUE', 'MOCHUMI'),
(877, 130306, 'LAMBAYEQUE', 'LAMBAYEQUE', 'MORROPE'),
(878, 130307, 'LAMBAYEQUE', 'LAMBAYEQUE', 'MOTUPE'),
(879, 130308, 'LAMBAYEQUE', 'LAMBAYEQUE', 'OLMOS'),
(880, 130309, 'LAMBAYEQUE', 'LAMBAYEQUE', 'PACORA'),
(881, 130310, 'LAMBAYEQUE', 'LAMBAYEQUE', 'SALAS'),
(882, 130311, 'LAMBAYEQUE', 'LAMBAYEQUE', 'SAN JOSE'),
(883, 130312, 'LAMBAYEQUE', 'LAMBAYEQUE', 'TUCUME'),
(884, 140401, 'LIMA', 'CAÑETE', 'SAN VICENTE DE CAÑETE'),
(885, 071009, 'CUSCO', 'PARURO', 'PILLPINTO'),
(886, 070701, 'CUSCO', 'CHUMBIVILCAS', 'SANTO TOMAS'),
(887, 070702, 'CUSCO', 'CHUMBIVILCAS', 'CAPACMARCA'),
(888, 070703, 'CUSCO', 'CHUMBIVILCAS', 'COLQUEMARCA'),
(889, 070704, 'CUSCO', 'CHUMBIVILCAS', 'CHAMACA'),
(890, 070705, 'CUSCO', 'CHUMBIVILCAS', 'LIVITACA'),
(891, 070706, 'CUSCO', 'CHUMBIVILCAS', 'LLUSCO'),
(892, 070707, 'CUSCO', 'CHUMBIVILCAS', 'QUIÑOTA'),
(893, 070708, 'CUSCO', 'CHUMBIVILCAS', 'VELILLE'),
(894, 070801, 'CUSCO', 'ESPINAR', 'ESPINAR'),
(895, 070802, 'CUSCO', 'ESPINAR', 'CONDOROMA'),
(896, 070803, 'CUSCO', 'ESPINAR', 'COPORAQUE'),
(897, 070804, 'CUSCO', 'ESPINAR', 'OCORURO'),
(898, 070805, 'CUSCO', 'ESPINAR', 'PALLPATA'),
(899, 070806, 'CUSCO', 'ESPINAR', 'PICHIGUA'),
(900, 070807, 'CUSCO', 'ESPINAR', 'SUYCKUTAMBO'),
(901, 070808, 'CUSCO', 'ESPINAR', 'ALTO PICHIGUA'),
(902, 071101, 'CUSCO', 'PAUCARTAMBO', 'PAUCARTAMBO'),
(903, 071102, 'CUSCO', 'PAUCARTAMBO', 'CAICAY'),
(904, 071103, 'CUSCO', 'PAUCARTAMBO', 'COLQUEPATA'),
(905, 071104, 'CUSCO', 'PAUCARTAMBO', 'CHALLABAMBA'),
(906, 071105, 'CUSCO', 'PAUCARTAMBO', 'KOSÑIPATA'),
(907, 071106, 'CUSCO', 'PAUCARTAMBO', 'HUANCARANI'),
(908, 071201, 'CUSCO', 'QUISPICANCHI', 'URCOS'),
(909, 071202, 'CUSCO', 'QUISPICANCHI', 'ANDAHUAYLILLAS'),
(910, 071203, 'CUSCO', 'QUISPICANCHI', 'CAMANTI'),
(911, 071204, 'CUSCO', 'QUISPICANCHI', 'CCARHUAYO'),
(912, 071205, 'CUSCO', 'QUISPICANCHI', 'CCATCA'),
(913, 071206, 'CUSCO', 'QUISPICANCHI', 'CUSIPATA'),
(914, 071207, 'CUSCO', 'QUISPICANCHI', 'HUARO'),
(915, 071208, 'CUSCO', 'QUISPICANCHI', 'LUCRE'),
(916, 071209, 'CUSCO', 'QUISPICANCHI', 'MARCAPATA'),
(917, 071210, 'CUSCO', 'QUISPICANCHI', 'OCONGATE'),
(918, 071211, 'CUSCO', 'QUISPICANCHI', 'OROPESA'),
(919, 071212, 'CUSCO', 'QUISPICANCHI', 'QUIQUIJANA'),
(920, 070401, 'CUSCO', 'CALCA', 'CALCA'),
(921, 070402, 'CUSCO', 'CALCA', 'COYA'),
(922, 070403, 'CUSCO', 'CALCA', 'LAMAY'),
(923, 070404, 'CUSCO', 'CALCA', 'LARES'),
(924, 070405, 'CUSCO', 'CALCA', 'PISAC'),
(925, 070406, 'CUSCO', 'CALCA', 'SAN SALVADOR'),
(926, 070407, 'CUSCO', 'CALCA', 'TARAY'),
(927, 070408, 'CUSCO', 'CALCA', 'YANATILE'),
(928, 070901, 'CUSCO', 'LA CONVENCION', 'SANTA ANA'),
(929, 070902, 'CUSCO', 'LA CONVENCION', 'ECHARATI'),
(930, 070903, 'CUSCO', 'LA CONVENCION', 'HUAYOPATA'),
(931, 070904, 'CUSCO', 'LA CONVENCION', 'MARANURA'),
(932, 070905, 'CUSCO', 'LA CONVENCION', 'OCOBAMBA'),
(933, 070906, 'CUSCO', 'LA CONVENCION', 'SANTA TERESA'),
(934, 070907, 'CUSCO', 'LA CONVENCION', 'VILCABAMBA'),
(935, 070908, 'CUSCO', 'LA CONVENCION', 'QUELLOUNO'),
(936, 070909, 'CUSCO', 'LA CONVENCION', 'KIMBIRI'),
(937, 070910, 'CUSCO', 'LA CONVENCION', 'PICHARI'),
(938, 071301, 'CUSCO', 'URUBAMBA', 'URUBAMBA'),
(939, 071302, 'CUSCO', 'URUBAMBA', 'CHINCHERO'),
(940, 071303, 'CUSCO', 'URUBAMBA', 'HUAYLLABAMBA'),
(941, 071304, 'CUSCO', 'URUBAMBA', 'MACHUPICCHU'),
(942, 071305, 'CUSCO', 'URUBAMBA', 'MARAS'),
(943, 071306, 'CUSCO', 'URUBAMBA', 'OLLANTAYTAMBO'),
(944, 071307, 'CUSCO', 'URUBAMBA', 'YUCAY'),
(945, 080201, 'HUANCAVELICA', 'ACOBAMBA', 'ACOBAMBA'),
(946, 080202, 'HUANCAVELICA', 'ACOBAMBA', 'ANTA'),
(947, 080203, 'HUANCAVELICA', 'ACOBAMBA', 'ANDABAMBA'),
(948, 080204, 'HUANCAVELICA', 'ACOBAMBA', 'CAJA'),
(949, 080205, 'HUANCAVELICA', 'ACOBAMBA', 'MARCAS'),
(950, 080206, 'HUANCAVELICA', 'ACOBAMBA', 'PAUCARA'),
(951, 080207, 'HUANCAVELICA', 'ACOBAMBA', 'POMACOCHA'),
(952, 080208, 'HUANCAVELICA', 'ACOBAMBA', 'ROSARIO'),
(953, 080301, 'HUANCAVELICA', 'ANGARAES', 'LIRCAY'),
(954, 080302, 'HUANCAVELICA', 'ANGARAES', 'ANCHONGA'),
(955, 080303, 'HUANCAVELICA', 'ANGARAES', 'CALLANMARCA'),
(956, 080304, 'HUANCAVELICA', 'ANGARAES', 'CONGALLA'),
(957, 080305, 'HUANCAVELICA', 'ANGARAES', 'CHINCHO'),
(958, 080306, 'HUANCAVELICA', 'ANGARAES', 'HUAYLLAY-GRANDE'),
(959, 080307, 'HUANCAVELICA', 'ANGARAES', 'HUANCA HUANCA'),
(960, 080308, 'HUANCAVELICA', 'ANGARAES', 'JULCAMARCA'),
(961, 080309, 'HUANCAVELICA', 'ANGARAES', 'SAN ANTONIO DE ANTAPARCO'),
(962, 080310, 'HUANCAVELICA', 'ANGARAES', 'SANTO TOMAS DE PATA'),
(963, 080311, 'HUANCAVELICA', 'ANGARAES', 'SECCLLA'),
(964, 080312, 'HUANCAVELICA', 'ANGARAES', 'CCOCHACCASA'),
(965, 080101, 'HUANCAVELICA', 'HUANCAVELICA', 'HUANCAVELICA'),
(966, 080102, 'HUANCAVELICA', 'HUANCAVELICA', 'ACOBAMBILLA'),
(967, 080103, 'HUANCAVELICA', 'HUANCAVELICA', 'ACORIA'),
(968, 080104, 'HUANCAVELICA', 'HUANCAVELICA', 'CONAYCA'),
(969, 080105, 'HUANCAVELICA', 'HUANCAVELICA', 'CUENCA'),
(970, 080106, 'HUANCAVELICA', 'HUANCAVELICA', 'HUACHOCOLPA'),
(971, 080108, 'HUANCAVELICA', 'HUANCAVELICA', 'HUAYLLAHUARA'),
(972, 080109, 'HUANCAVELICA', 'HUANCAVELICA', 'IZCUCHACA'),
(973, 080110, 'HUANCAVELICA', 'HUANCAVELICA', 'LARIA'),
(974, 080111, 'HUANCAVELICA', 'HUANCAVELICA', 'MANTA'),
(975, 080112, 'HUANCAVELICA', 'HUANCAVELICA', 'MARISCAL CACERES'),
(976, 080113, 'HUANCAVELICA', 'HUANCAVELICA', 'MOYA'),
(977, 080114, 'HUANCAVELICA', 'HUANCAVELICA', 'NUEVO OCCORO'),
(978, 080115, 'HUANCAVELICA', 'HUANCAVELICA', 'PALCA'),
(979, 080116, 'HUANCAVELICA', 'HUANCAVELICA', 'PILCHACA'),
(980, 080117, 'HUANCAVELICA', 'HUANCAVELICA', 'VILCA'),
(981, 080118, 'HUANCAVELICA', 'HUANCAVELICA', 'YAULI'),
(982, 080119, 'HUANCAVELICA', 'HUANCAVELICA', 'ASCENCION'),
(983, 080120, 'HUANCAVELICA', 'HUANCAVELICA', 'HUANDO'),
(984, 080401, 'HUANCAVELICA', 'CASTROVIRREYNA', 'CASTROVIRREYNA'),
(985, 080402, 'HUANCAVELICA', 'CASTROVIRREYNA', 'ARMA'),
(986, 080403, 'HUANCAVELICA', 'CASTROVIRREYNA', 'AURAHUA'),
(987, 080405, 'HUANCAVELICA', 'CASTROVIRREYNA', 'CAPILLAS'),
(988, 080406, 'HUANCAVELICA', 'CASTROVIRREYNA', 'COCAS'),
(989, 080408, 'HUANCAVELICA', 'CASTROVIRREYNA', 'CHUPAMARCA'),
(990, 080409, 'HUANCAVELICA', 'CASTROVIRREYNA', 'HUACHOS'),
(991, 080410, 'HUANCAVELICA', 'CASTROVIRREYNA', 'HUAMATAMBO'),
(992, 080414, 'HUANCAVELICA', 'CASTROVIRREYNA', 'MOLLEPAMPA'),
(993, 080422, 'HUANCAVELICA', 'CASTROVIRREYNA', 'SAN JUAN'),
(994, 080427, 'HUANCAVELICA', 'CASTROVIRREYNA', 'TANTARA'),
(995, 080428, 'HUANCAVELICA', 'CASTROVIRREYNA', 'TICRAPO'),
(996, 080429, 'HUANCAVELICA', 'CASTROVIRREYNA', 'SANTA ANA');
INSERT INTO `ubigeo` (`id_ubigeo`, `cod_ubi`, `depart_ubi`, `prov_ubi`, `dist_ubi`) VALUES
(997, 080601, 'HUANCAVELICA', 'HUAYTARA', 'AYAVI'),
(998, 080602, 'HUANCAVELICA', 'HUAYTARA', 'CORDOVA'),
(999, 080603, 'HUANCAVELICA', 'HUAYTARA', 'HUAYACUNDO ARMA'),
(1000, 080604, 'HUANCAVELICA', 'HUAYTARA', 'HUAYTARA'),
(1001, 080605, 'HUANCAVELICA', 'HUAYTARA', 'LARAMARCA'),
(1002, 080606, 'HUANCAVELICA', 'HUAYTARA', 'OCOYO'),
(1003, 080607, 'HUANCAVELICA', 'HUAYTARA', 'PILPICHACA'),
(1004, 080608, 'HUANCAVELICA', 'HUAYTARA', 'QUERCO'),
(1005, 080609, 'HUANCAVELICA', 'HUAYTARA', 'QUITO ARMA'),
(1006, 080610, 'HUANCAVELICA', 'HUAYTARA', 'SAN ANTONIO DE CUSICANCHA'),
(1007, 080611, 'HUANCAVELICA', 'HUAYTARA', 'SAN FRANCISCO DE SANGAYAICO'),
(1008, 080612, 'HUANCAVELICA', 'HUAYTARA', 'SAN ISIDRO'),
(1009, 080613, 'HUANCAVELICA', 'HUAYTARA', 'SANTIAGO DE CHOCORVOS'),
(1010, 080614, 'HUANCAVELICA', 'HUAYTARA', 'SANTIAGO DE QUIRAHUARA'),
(1011, 080615, 'HUANCAVELICA', 'HUAYTARA', 'SANTO DOMINGO DE CAPILLAS'),
(1012, 080616, 'HUANCAVELICA', 'HUAYTARA', 'TAMBO'),
(1013, 080501, 'HUANCAVELICA', 'TAYACAJA', 'PAMPAS'),
(1014, 080502, 'HUANCAVELICA', 'TAYACAJA', 'ACOSTAMBO'),
(1015, 080503, 'HUANCAVELICA', 'TAYACAJA', 'ACRAQUIA'),
(1016, 080504, 'HUANCAVELICA', 'TAYACAJA', 'AHUAYCHA'),
(1017, 080506, 'HUANCAVELICA', 'TAYACAJA', 'COLCABAMBA'),
(1018, 080509, 'HUANCAVELICA', 'TAYACAJA', 'DANIEL HERNANDEZ'),
(1019, 080511, 'HUANCAVELICA', 'TAYACAJA', 'HUACHOCOLPA'),
(1020, 080512, 'HUANCAVELICA', 'TAYACAJA', 'HUARIBAMBA'),
(1021, 080515, 'HUANCAVELICA', 'TAYACAJA', 'ÑAHUIMPUQUIO'),
(1022, 080517, 'HUANCAVELICA', 'TAYACAJA', 'PAZOS'),
(1023, 080518, 'HUANCAVELICA', 'TAYACAJA', 'QUISHUAR'),
(1024, 080519, 'HUANCAVELICA', 'TAYACAJA', 'SALCABAMBA'),
(1025, 080520, 'HUANCAVELICA', 'TAYACAJA', 'SAN MARCOS DE ROCCHAC'),
(1026, 080523, 'HUANCAVELICA', 'TAYACAJA', 'SURCABAMBA'),
(1027, 080525, 'HUANCAVELICA', 'TAYACAJA', 'TINTAY PUNCU'),
(1028, 080526, 'HUANCAVELICA', 'TAYACAJA', 'SALCAHUASI'),
(1029, 080701, 'HUANCAVELICA', 'CHURCAMPA', 'CHURCAMPA'),
(1030, 080702, 'HUANCAVELICA', 'CHURCAMPA', 'ANCO'),
(1031, 080703, 'HUANCAVELICA', 'CHURCAMPA', 'CHINCHIHUASI'),
(1032, 080704, 'HUANCAVELICA', 'CHURCAMPA', 'EL CARMEN'),
(1033, 080705, 'HUANCAVELICA', 'CHURCAMPA', 'LA MERCED'),
(1034, 080706, 'HUANCAVELICA', 'CHURCAMPA', 'LOCROJA'),
(1035, 080707, 'HUANCAVELICA', 'CHURCAMPA', 'PAUCARBAMBA'),
(1036, 080708, 'HUANCAVELICA', 'CHURCAMPA', 'SAN MIGUEL DE MAYOCC'),
(1037, 080709, 'HUANCAVELICA', 'CHURCAMPA', 'SAN PEDRO DE CORIS'),
(1038, 080710, 'HUANCAVELICA', 'CHURCAMPA', 'PACHAMARCA'),
(1039, 090501, 'HUANUCO', 'MARAÑON', 'HUACRACHUCO'),
(1040, 090502, 'HUANUCO', 'MARAÑON', 'CHOLON'),
(1041, 090505, 'HUANUCO', 'MARAÑON', 'SAN BUENAVENTURA'),
(1042, 090901, 'HUANUCO', 'HUACAYBAMBA', 'HUACAYBAMBA'),
(1043, 090902, 'HUANUCO', 'HUACAYBAMBA', 'PINRA'),
(1044, 090903, 'HUANUCO', 'HUACAYBAMBA', 'CANCHABAMBA'),
(1045, 090904, 'HUANUCO', 'HUACAYBAMBA', 'COCHABAMBA'),
(1046, 090301, 'HUANUCO', 'DOS DE MAYO', 'LA UNION'),
(1047, 090307, 'HUANUCO', 'DOS DE MAYO', 'CHUQUIS'),
(1048, 090312, 'HUANUCO', 'DOS DE MAYO', 'MARIAS'),
(1049, 090314, 'HUANUCO', 'DOS DE MAYO', 'PACHAS'),
(1050, 090316, 'HUANUCO', 'DOS DE MAYO', 'QUIVILLA'),
(1051, 090317, 'HUANUCO', 'DOS DE MAYO', 'RIPAN'),
(1052, 090321, 'HUANUCO', 'DOS DE MAYO', 'SHUNQUI'),
(1053, 090322, 'HUANUCO', 'DOS DE MAYO', 'SILLAPATA'),
(1054, 090323, 'HUANUCO', 'DOS DE MAYO', 'YANAS'),
(1055, 090401, 'HUANUCO', 'HUAMALIES', 'LLATA'),
(1056, 090402, 'HUANUCO', 'HUAMALIES', 'ARANCAY'),
(1057, 090403, 'HUANUCO', 'HUAMALIES', 'CHAVIN DE PARIARCA'),
(1058, 090404, 'HUANUCO', 'HUAMALIES', 'JACAS GRANDE'),
(1059, 090405, 'HUANUCO', 'HUAMALIES', 'JIRCAN'),
(1060, 090406, 'HUANUCO', 'HUAMALIES', 'MIRAFLORES'),
(1061, 090407, 'HUANUCO', 'HUAMALIES', 'MONZON'),
(1062, 090408, 'HUANUCO', 'HUAMALIES', 'PUNCHAO'),
(1063, 090409, 'HUANUCO', 'HUAMALIES', 'PUÑOS'),
(1064, 090410, 'HUANUCO', 'HUAMALIES', 'SINGA'),
(1065, 090411, 'HUANUCO', 'HUAMALIES', 'TANTAMAYO'),
(1066, 090101, 'HUANUCO', 'HUANUCO', 'HUANUCO'),
(1067, 090102, 'HUANUCO', 'HUANUCO', 'CHINCHAO'),
(1068, 090103, 'HUANUCO', 'HUANUCO', 'CHURUBAMBA'),
(1069, 090104, 'HUANUCO', 'HUANUCO', 'MARGOS'),
(1070, 090105, 'HUANUCO', 'HUANUCO', 'QUISQUI'),
(1071, 090106, 'HUANUCO', 'HUANUCO', 'SAN FRANCISCO DE CAYRAN'),
(1072, 090107, 'HUANUCO', 'HUANUCO', 'SAN PEDRO DE CHAULAN'),
(1073, 090108, 'HUANUCO', 'HUANUCO', 'SANTA MARIA DEL VALLE'),
(1074, 090109, 'HUANUCO', 'HUANUCO', 'YARUMAYO'),
(1075, 090110, 'HUANUCO', 'HUANUCO', 'AMARILIS'),
(1076, 090111, 'HUANUCO', 'HUANUCO', 'PILLCO MARCA'),
(1077, 090201, 'HUANUCO', 'AMBO', 'AMBO'),
(1078, 090202, 'HUANUCO', 'AMBO', 'CAYNA'),
(1079, 090203, 'HUANUCO', 'AMBO', 'COLPAS'),
(1080, 090204, 'HUANUCO', 'AMBO', 'CONCHAMARCA'),
(1081, 090205, 'HUANUCO', 'AMBO', 'HUACAR'),
(1082, 090206, 'HUANUCO', 'AMBO', 'SAN FRANCISCO'),
(1083, 090207, 'HUANUCO', 'AMBO', 'SAN RAFAEL'),
(1084, 090208, 'HUANUCO', 'AMBO', 'TOMAY-KICHWA'),
(1085, 090601, 'HUANUCO', 'LEONCIO PRADO', 'RUPA-RUPA'),
(1086, 090602, 'HUANUCO', 'LEONCIO PRADO', 'DANIEL ALOMIA ROBLES'),
(1087, 090603, 'HUANUCO', 'LEONCIO PRADO', 'HERMILIO VALDIZAN'),
(1088, 090604, 'HUANUCO', 'LEONCIO PRADO', 'LUYANDO'),
(1089, 090605, 'HUANUCO', 'LEONCIO PRADO', 'MARIANO DAMASO BERAUN'),
(1090, 090606, 'HUANUCO', 'LEONCIO PRADO', 'JOSE CRESPO Y CASTILLO'),
(1091, 090701, 'HUANUCO', 'PACHITEA', 'PANAO'),
(1092, 090702, 'HUANUCO', 'PACHITEA', 'CHAGLLA'),
(1093, 090704, 'HUANUCO', 'PACHITEA', 'MOLINO'),
(1094, 090706, 'HUANUCO', 'PACHITEA', 'UMARI'),
(1095, 090801, 'HUANUCO', 'PUERTO INCA', 'HONORIA'),
(1096, 090802, 'HUANUCO', 'PUERTO INCA', 'PUERTO INCA'),
(1097, 090803, 'HUANUCO', 'PUERTO INCA', 'CODO DEL POZUZO'),
(1098, 090804, 'HUANUCO', 'PUERTO INCA', 'TOURNAVISTA'),
(1099, 090805, 'HUANUCO', 'PUERTO INCA', 'YUYAPICHIS'),
(1100, 091001, 'HUANUCO', 'LAURICOCHA', 'JESUS'),
(1101, 091002, 'HUANUCO', 'LAURICOCHA', 'BAÑOS'),
(1102, 091003, 'HUANUCO', 'LAURICOCHA', 'SAN FRANCISCO DE ASIS'),
(1103, 091004, 'HUANUCO', 'LAURICOCHA', 'QUEROPALCA'),
(1104, 091005, 'HUANUCO', 'LAURICOCHA', 'SAN MIGUEL DE CAURI'),
(1105, 091006, 'HUANUCO', 'LAURICOCHA', 'RONDOS'),
(1106, 091007, 'HUANUCO', 'LAURICOCHA', 'JIVIA'),
(1107, 091101, 'HUANUCO', 'YAROWILCA', 'CHAVINILLO'),
(1108, 091102, 'HUANUCO', 'YAROWILCA', 'APARICIO POMARES'),
(1109, 091103, 'HUANUCO', 'YAROWILCA', 'CAHUAC'),
(1110, 091104, 'HUANUCO', 'YAROWILCA', 'CHACABAMBA'),
(1111, 091105, 'HUANUCO', 'YAROWILCA', 'JACAS CHICO'),
(1112, 091106, 'HUANUCO', 'YAROWILCA', 'OBAS'),
(1113, 091107, 'HUANUCO', 'YAROWILCA', 'PAMPAMARCA'),
(1114, 091108, 'HUANUCO', 'YAROWILCA', 'CHORAS'),
(1115, 100201, 'ICA', 'CHINCHA', 'CHINCHA ALTA'),
(1116, 100202, 'ICA', 'CHINCHA', 'CHAVIN'),
(1117, 100203, 'ICA', 'CHINCHA', 'CHINCHA BAJA'),
(1118, 100204, 'ICA', 'CHINCHA', 'EL CARMEN'),
(1119, 100205, 'ICA', 'CHINCHA', 'GROCIO PRADO'),
(1120, 100206, 'ICA', 'CHINCHA', 'SAN PEDRO DE HUACARPANA'),
(1121, 100207, 'ICA', 'CHINCHA', 'SUNAMPE'),
(1122, 100208, 'ICA', 'CHINCHA', 'TAMBO DE MORA'),
(1123, 100209, 'ICA', 'CHINCHA', 'ALTO LARAN'),
(1124, 100210, 'ICA', 'CHINCHA', 'PUEBLO NUEVO'),
(1125, 100211, 'ICA', 'CHINCHA', 'SAN JUAN DE YANAC'),
(1126, 100401, 'ICA', 'PISCO', 'PISCO'),
(1127, 100402, 'ICA', 'PISCO', 'HUANCANO'),
(1128, 100403, 'ICA', 'PISCO', 'HUMAY'),
(1129, 100404, 'ICA', 'PISCO', 'INDEPENDENCIA'),
(1130, 100405, 'ICA', 'PISCO', 'PARACAS'),
(1131, 100406, 'ICA', 'PISCO', 'SAN ANDRES'),
(1132, 100407, 'ICA', 'PISCO', 'SAN CLEMENTE'),
(1133, 100408, 'ICA', 'PISCO', 'TUPAC AMARU INCA'),
(1134, 100101, 'ICA', 'ICA', 'ICA'),
(1135, 100102, 'ICA', 'ICA', 'LA TINGUIÑA'),
(1136, 100103, 'ICA', 'ICA', 'LOS AQUIJES'),
(1137, 100104, 'ICA', 'ICA', 'PARCONA'),
(1138, 100105, 'ICA', 'ICA', 'PUEBLO NUEVO'),
(1139, 100106, 'ICA', 'ICA', 'SALAS'),
(1140, 100107, 'ICA', 'ICA', 'SAN JOSE DE LOS MOLINOS'),
(1141, 100108, 'ICA', 'ICA', 'SAN JUAN BAUTISTA'),
(1142, 100109, 'ICA', 'ICA', 'SANTIAGO'),
(1143, 100110, 'ICA', 'ICA', 'SUBTANJALLA'),
(1144, 100111, 'ICA', 'ICA', 'YAUCA DEL ROSARIO'),
(1145, 100112, 'ICA', 'ICA', 'TATE'),
(1146, 100113, 'ICA', 'ICA', 'PACHACUTEC'),
(1147, 100114, 'ICA', 'ICA', 'OCUCAJE'),
(1148, 100301, 'ICA', 'NAZCA', 'NAZCA'),
(1149, 100302, 'ICA', 'NAZCA', 'CHANGUILLO'),
(1150, 100303, 'ICA', 'NAZCA', 'EL INGENIO'),
(1151, 100304, 'ICA', 'NAZCA', 'MARCONA'),
(1152, 100305, 'ICA', 'NAZCA', 'VISTA ALEGRE'),
(1153, 100501, 'ICA', 'PALPA', 'PALPA'),
(1154, 100502, 'ICA', 'PALPA', 'LLIPATA'),
(1155, 100503, 'ICA', 'PALPA', 'RIO GRANDE'),
(1156, 100504, 'ICA', 'PALPA', 'SANTA CRUZ'),
(1157, 100505, 'ICA', 'PALPA', 'TIBILLO'),
(1158, 110701, 'JUNIN', 'SATIPO', 'SATIPO'),
(1159, 110702, 'JUNIN', 'SATIPO', 'COVIRIALI'),
(1160, 110703, 'JUNIN', 'SATIPO', 'LLAYLLA'),
(1161, 110704, 'JUNIN', 'SATIPO', 'MAZAMARI'),
(1162, 110705, 'JUNIN', 'SATIPO', 'PAMPA HERMOSA'),
(1163, 110706, 'JUNIN', 'SATIPO', 'PANGOA'),
(1164, 110707, 'JUNIN', 'SATIPO', 'RIO NEGRO'),
(1165, 110708, 'JUNIN', 'SATIPO', 'RIO TAMBO'),
(1166, 110801, 'JUNIN', 'CHANCHAMAYO', 'CHANCHAMAYO'),
(1167, 110802, 'JUNIN', 'CHANCHAMAYO', 'SAN RAMON'),
(1168, 110803, 'JUNIN', 'CHANCHAMAYO', 'VITOC'),
(1169, 110804, 'JUNIN', 'CHANCHAMAYO', 'SAN LUIS DE SHUARO'),
(1170, 110805, 'JUNIN', 'CHANCHAMAYO', 'PICHANAQUI'),
(1171, 110806, 'JUNIN', 'CHANCHAMAYO', 'PERENE'),
(1172, 110201, 'JUNIN', 'CONCEPCION', 'CONCEPCION'),
(1173, 110202, 'JUNIN', 'CONCEPCION', 'ACO'),
(1174, 110203, 'JUNIN', 'CONCEPCION', 'ANDAMARCA'),
(1175, 110204, 'JUNIN', 'CONCEPCION', 'COMAS'),
(1176, 110205, 'JUNIN', 'CONCEPCION', 'COCHAS'),
(1177, 110206, 'JUNIN', 'CONCEPCION', 'CHAMBARA'),
(1178, 110207, 'JUNIN', 'CONCEPCION', 'HEROINAS TOLEDO'),
(1179, 110208, 'JUNIN', 'CONCEPCION', 'MANZANARES'),
(1180, 110209, 'JUNIN', 'CONCEPCION', 'MARISCAL CASTILLA'),
(1181, 110210, 'JUNIN', 'CONCEPCION', 'MATAHUASI'),
(1182, 110211, 'JUNIN', 'CONCEPCION', 'MITO'),
(1183, 110212, 'JUNIN', 'CONCEPCION', 'NUEVE DE JULIO'),
(1184, 110213, 'JUNIN', 'CONCEPCION', 'ORCOTUNA'),
(1185, 110214, 'JUNIN', 'CONCEPCION', 'SANTA ROSA DE OCOPA'),
(1186, 110215, 'JUNIN', 'CONCEPCION', 'SAN JOSE DE QUERO'),
(1187, 110101, 'JUNIN', 'HUANCAYO', 'HUANCAYO'),
(1188, 110103, 'JUNIN', 'HUANCAYO', 'CARHUACALLANGA'),
(1189, 110104, 'JUNIN', 'HUANCAYO', 'COLCA'),
(1190, 110105, 'JUNIN', 'HUANCAYO', 'CULLHUAS'),
(1191, 110106, 'JUNIN', 'HUANCAYO', 'CHACAPAMPA'),
(1192, 110107, 'JUNIN', 'HUANCAYO', 'CHICCHE'),
(1193, 110108, 'JUNIN', 'HUANCAYO', 'CHILCA'),
(1194, 110109, 'JUNIN', 'HUANCAYO', 'CHONGOS ALTO'),
(1195, 110112, 'JUNIN', 'HUANCAYO', 'CHUPURO'),
(1196, 110113, 'JUNIN', 'HUANCAYO', 'EL TAMBO'),
(1197, 110114, 'JUNIN', 'HUANCAYO', 'HUACRAPUQUIO'),
(1198, 110116, 'JUNIN', 'HUANCAYO', 'HUALHUAS'),
(1199, 110118, 'JUNIN', 'HUANCAYO', 'HUANCAN'),
(1200, 110119, 'JUNIN', 'HUANCAYO', 'HUASICANCHA'),
(1201, 110120, 'JUNIN', 'HUANCAYO', 'HUAYUCACHI'),
(1202, 110121, 'JUNIN', 'HUANCAYO', 'INGENIO'),
(1203, 110122, 'JUNIN', 'HUANCAYO', 'PARIAHUANCA'),
(1204, 110123, 'JUNIN', 'HUANCAYO', 'PILCOMAYO'),
(1205, 110124, 'JUNIN', 'HUANCAYO', 'PUCARA'),
(1206, 110125, 'JUNIN', 'HUANCAYO', 'QUICHUAY'),
(1207, 110126, 'JUNIN', 'HUANCAYO', 'QUILCAS'),
(1208, 110127, 'JUNIN', 'HUANCAYO', 'SAN AGUSTIN'),
(1209, 110128, 'JUNIN', 'HUANCAYO', 'SAN JERONIMO DE TUNAN'),
(1210, 110131, 'JUNIN', 'HUANCAYO', 'SANTO DOMINGO DE ACOBAMBA'),
(1211, 110132, 'JUNIN', 'HUANCAYO', 'SAÑO'),
(1212, 110133, 'JUNIN', 'HUANCAYO', 'SAPALLANGA'),
(1213, 110134, 'JUNIN', 'HUANCAYO', 'SICAYA'),
(1214, 110136, 'JUNIN', 'HUANCAYO', 'VIQUES'),
(1215, 110901, 'JUNIN', 'CHUPACA', 'CHUPACA'),
(1216, 110902, 'JUNIN', 'CHUPACA', 'AHUAC'),
(1217, 110903, 'JUNIN', 'CHUPACA', 'CHONGOS BAJO'),
(1218, 110904, 'JUNIN', 'CHUPACA', 'HUACHAC'),
(1219, 110905, 'JUNIN', 'CHUPACA', 'HUAMANCACA CHICO'),
(1220, 110906, 'JUNIN', 'CHUPACA', 'SAN JUAN DE YSCOS'),
(1221, 110907, 'JUNIN', 'CHUPACA', 'SAN JUAN DE JARPA'),
(1222, 110908, 'JUNIN', 'CHUPACA', 'TRES DE DICIEMBRE'),
(1223, 110909, 'JUNIN', 'CHUPACA', 'YANACANCHA'),
(1224, 110301, 'JUNIN', 'JAUJA', 'JAUJA'),
(1225, 110302, 'JUNIN', 'JAUJA', 'ACOLLA'),
(1226, 110303, 'JUNIN', 'JAUJA', 'APATA'),
(1227, 110304, 'JUNIN', 'JAUJA', 'ATAURA'),
(1228, 110305, 'JUNIN', 'JAUJA', 'CANCHAYLLO'),
(1229, 110306, 'JUNIN', 'JAUJA', 'EL MANTARO'),
(1230, 110307, 'JUNIN', 'JAUJA', 'HUAMALI'),
(1231, 110308, 'JUNIN', 'JAUJA', 'HUARIPAMPA'),
(1232, 110309, 'JUNIN', 'JAUJA', 'HUERTAS'),
(1233, 110310, 'JUNIN', 'JAUJA', 'JANJAILLO'),
(1234, 110311, 'JUNIN', 'JAUJA', 'JULCAN'),
(1235, 110312, 'JUNIN', 'JAUJA', 'LEONOR ORDOÑEZ'),
(1236, 110313, 'JUNIN', 'JAUJA', 'LLOCLLAPAMPA'),
(1237, 110314, 'JUNIN', 'JAUJA', 'MARCO'),
(1238, 110315, 'JUNIN', 'JAUJA', 'MASMA'),
(1239, 110316, 'JUNIN', 'JAUJA', 'MOLINOS'),
(1240, 110317, 'JUNIN', 'JAUJA', 'MONOBAMBA'),
(1241, 110318, 'JUNIN', 'JAUJA', 'MUQUI'),
(1242, 110319, 'JUNIN', 'JAUJA', 'MUQUIYAUYO'),
(1243, 110320, 'JUNIN', 'JAUJA', 'PACA'),
(1244, 110321, 'JUNIN', 'JAUJA', 'PACCHA'),
(1245, 110322, 'JUNIN', 'JAUJA', 'PANCAN'),
(1246, 110323, 'JUNIN', 'JAUJA', 'PARCO'),
(1247, 110324, 'JUNIN', 'JAUJA', 'POMACANCHA'),
(1248, 110325, 'JUNIN', 'JAUJA', 'RICRAN'),
(1249, 140402, 'LIMA', 'CAÑETE', 'CALANGO'),
(1250, 140403, 'LIMA', 'CAÑETE', 'CERRO AZUL'),
(1251, 140404, 'LIMA', 'CAÑETE', 'COAYLLO'),
(1252, 140405, 'LIMA', 'CAÑETE', 'CHILCA'),
(1253, 140406, 'LIMA', 'CAÑETE', 'IMPERIAL'),
(1254, 140407, 'LIMA', 'CAÑETE', 'LUNAHUANA'),
(1255, 140408, 'LIMA', 'CAÑETE', 'MALA'),
(1256, 140409, 'LIMA', 'CAÑETE', 'NUEVO IMPERIAL'),
(1257, 140410, 'LIMA', 'CAÑETE', 'PACARAN'),
(1258, 140411, 'LIMA', 'CAÑETE', 'QUILMANA'),
(1259, 140412, 'LIMA', 'CAÑETE', 'SAN ANTONIO'),
(1260, 140413, 'LIMA', 'CAÑETE', 'SAN LUIS'),
(1261, 140414, 'LIMA', 'CAÑETE', 'SANTA CRUZ DE FLORES'),
(1262, 140415, 'LIMA', 'CAÑETE', 'ZUÑIGA'),
(1263, 140416, 'LIMA', 'CAÑETE', 'ASIA'),
(1264, 140301, 'LIMA', 'CANTA', 'CANTA'),
(1265, 140302, 'LIMA', 'CANTA', 'ARAHUAY'),
(1266, 140303, 'LIMA', 'CANTA', 'HUAMANTANGA'),
(1267, 140304, 'LIMA', 'CANTA', 'HUAROS'),
(1268, 140305, 'LIMA', 'CANTA', 'LACHAQUI'),
(1269, 140306, 'LIMA', 'CANTA', 'SAN BUENAVENTURA'),
(1270, 140307, 'LIMA', 'CANTA', 'SANTA ROSA DE QUIVES'),
(1271, 140801, 'LIMA', 'HUARAL', 'HUARAL'),
(1272, 140802, 'LIMA', 'HUARAL', 'ATAVILLOS ALTOS'),
(1273, 140803, 'LIMA', 'HUARAL', 'ATAVILLOS BAJO'),
(1274, 140804, 'LIMA', 'HUARAL', 'AUCALLAMA'),
(1275, 140805, 'LIMA', 'HUARAL', 'CHANCAY'),
(1276, 140806, 'LIMA', 'HUARAL', 'IHUARI'),
(1277, 140807, 'LIMA', 'HUARAL', 'LAMPIAN'),
(1278, 140808, 'LIMA', 'HUARAL', 'PACARAOS'),
(1279, 140809, 'LIMA', 'HUARAL', 'SAN MIGUEL DE ACOS'),
(1280, 140810, 'LIMA', 'HUARAL', 'VEINTISIETE DE NOVIEMBRE'),
(1281, 140811, 'LIMA', 'HUARAL', 'SANTA CRUZ DE ANDAMARCA'),
(1282, 140812, 'LIMA', 'HUARAL', 'SUMBILCA'),
(1283, 140601, 'LIMA', 'HUAROCHIRI', 'MATUCANA'),
(1284, 140602, 'LIMA', 'HUAROCHIRI', 'ANTIOQUIA'),
(1285, 140603, 'LIMA', 'HUAROCHIRI', 'CALLAHUANCA'),
(1286, 140604, 'LIMA', 'HUAROCHIRI', 'CARAMPOMA'),
(1287, 140605, 'LIMA', 'HUAROCHIRI', 'SAN PEDRO DE CASTA'),
(1288, 140606, 'LIMA', 'HUAROCHIRI', 'CUENCA'),
(1289, 140607, 'LIMA', 'HUAROCHIRI', 'CHICLA'),
(1290, 140608, 'LIMA', 'HUAROCHIRI', 'HUANZA'),
(1291, 140609, 'LIMA', 'HUAROCHIRI', 'HUAROCHIRI'),
(1292, 140610, 'LIMA', 'HUAROCHIRI', 'LAHUAYTAMBO'),
(1293, 140611, 'LIMA', 'HUAROCHIRI', 'LANGA'),
(1294, 140612, 'LIMA', 'HUAROCHIRI', 'MARIATANA'),
(1295, 140613, 'LIMA', 'HUAROCHIRI', 'RICARDO PALMA'),
(1296, 140614, 'LIMA', 'HUAROCHIRI', 'SAN ANDRES DE TUPICOCHA'),
(1297, 140615, 'LIMA', 'HUAROCHIRI', 'SAN ANTONIO'),
(1298, 140616, 'LIMA', 'HUAROCHIRI', 'SAN BARTOLOME'),
(1299, 140617, 'LIMA', 'HUAROCHIRI', 'SAN DAMIAN'),
(1300, 140618, 'LIMA', 'HUAROCHIRI', 'SANGALLAYA'),
(1301, 140619, 'LIMA', 'HUAROCHIRI', 'SAN JUAN DE TANTARANCHE'),
(1302, 140620, 'LIMA', 'HUAROCHIRI', 'SAN LORENZO DE QUINTI'),
(1303, 140621, 'LIMA', 'HUAROCHIRI', 'SAN MATEO'),
(1304, 140622, 'LIMA', 'HUAROCHIRI', 'SAN MATEO DE OTAO'),
(1305, 140623, 'LIMA', 'HUAROCHIRI', 'SAN PEDRO DE HUANCAYRE'),
(1306, 140624, 'LIMA', 'HUAROCHIRI', 'SANTA CRUZ DE COCACHACRA'),
(1307, 140625, 'LIMA', 'HUAROCHIRI', 'SANTA EULALIA'),
(1308, 140626, 'LIMA', 'HUAROCHIRI', 'SANTIAGO DE ANCHUCAYA'),
(1309, 140627, 'LIMA', 'HUAROCHIRI', 'SANTIAGO DE TUNA'),
(1310, 140628, 'LIMA', 'HUAROCHIRI', 'SANTO DOMINGO DE LOS OLLEROS'),
(1311, 140629, 'LIMA', 'HUAROCHIRI', 'SURCO'),
(1312, 140630, 'LIMA', 'HUAROCHIRI', 'HUACHUPAMPA'),
(1313, 140631, 'LIMA', 'HUAROCHIRI', 'LARAOS'),
(1314, 140632, 'LIMA', 'HUAROCHIRI', 'SAN JUAN DE IRIS'),
(1315, 140201, 'LIMA', 'CAJATAMBO', 'CAJATAMBO'),
(1316, 140205, 'LIMA', 'CAJATAMBO', 'COPA'),
(1317, 140206, 'LIMA', 'CAJATAMBO', 'GORGOR'),
(1318, 140207, 'LIMA', 'CAJATAMBO', 'HUANCAPON'),
(1319, 140208, 'LIMA', 'CAJATAMBO', 'MANAS'),
(1320, 140501, 'LIMA', 'HUAURA', 'HUACHO'),
(1321, 140502, 'LIMA', 'HUAURA', 'AMBAR'),
(1322, 140504, 'LIMA', 'HUAURA', 'CALETA DE CARQUIN'),
(1323, 140505, 'LIMA', 'HUAURA', 'CHECRAS'),
(1324, 140506, 'LIMA', 'HUAURA', 'HUALMAY'),
(1325, 140507, 'LIMA', 'HUAURA', 'HUAURA'),
(1326, 140508, 'LIMA', 'HUAURA', 'LEONCIO PRADO'),
(1327, 140509, 'LIMA', 'HUAURA', 'PACCHO'),
(1328, 140511, 'LIMA', 'HUAURA', 'SANTA LEONOR'),
(1329, 140512, 'LIMA', 'HUAURA', 'SANTA MARIA'),
(1330, 140513, 'LIMA', 'HUAURA', 'SAYAN'),
(1331, 140516, 'LIMA', 'HUAURA', 'VEGUETA'),
(1332, 140901, 'LIMA', 'BARRANCA', 'BARRANCA'),
(1333, 140902, 'LIMA', 'BARRANCA', 'PARAMONGA'),
(1334, 140903, 'LIMA', 'BARRANCA', 'PATIVILCA'),
(1335, 140904, 'LIMA', 'BARRANCA', 'SUPE'),
(1336, 140905, 'LIMA', 'BARRANCA', 'SUPE PUERTO'),
(1337, 141001, 'LIMA', 'OYON', 'OYON'),
(1338, 141002, 'LIMA', 'OYON', 'NAVAN'),
(1339, 141003, 'LIMA', 'OYON', 'CAUJUL'),
(1340, 141004, 'LIMA', 'OYON', 'ANDAJES'),
(1341, 141005, 'LIMA', 'OYON', 'PACHANGARA'),
(1342, 141006, 'LIMA', 'OYON', 'COCHAMARCA'),
(1343, 140101, 'LIMA', 'LIMA', 'LIMA'),
(1344, 140104, 'LIMA', 'LIMA', 'BREÑA'),
(1345, 140111, 'LIMA', 'LIMA', 'LINCE'),
(1346, 140114, 'LIMA', 'LIMA', 'MAGDALENA DEL MAR'),
(1347, 140115, 'LIMA', 'LIMA', 'MIRAFLORES'),
(1348, 140117, 'LIMA', 'LIMA', 'PUEBLO LIBRE'),
(1349, 140124, 'LIMA', 'LIMA', 'SAN ISIDRO'),
(1350, 140125, 'LIMA', 'LIMA', 'BARRANCO'),
(1351, 140127, 'LIMA', 'LIMA', 'SAN MIGUEL'),
(1352, 140133, 'LIMA', 'LIMA', 'JESUS MARIA'),
(1353, 140103, 'LIMA', 'LIMA', 'ATE'),
(1354, 140107, 'LIMA', 'LIMA', 'CHACLACAYO'),
(1355, 140109, 'LIMA', 'LIMA', 'LA VICTORIA'),
(1356, 140110, 'LIMA', 'LIMA', 'LA MOLINA'),
(1357, 140112, 'LIMA', 'LIMA', 'LURIGANCHO'),
(1358, 140135, 'LIMA', 'LIMA', 'EL AGUSTINO'),
(1359, 140137, 'LIMA', 'LIMA', 'SAN JUAN DE LURIGANCHO'),
(1360, 140138, 'LIMA', 'LIMA', 'SAN LUIS'),
(1361, 140139, 'LIMA', 'LIMA', 'CIENEGUILLA'),
(1362, 140143, 'LIMA', 'LIMA', 'SANTA ANITA'),
(1363, 140102, 'LIMA', 'LIMA', 'ANCON'),
(1364, 140705, 'LIMA', 'YAUYOS', 'AZÁNGARO'),
(1365, 140706, 'LIMA', 'YAUYOS', 'CACRA'),
(1366, 140707, 'LIMA', 'YAUYOS', 'CARANIA'),
(1367, 140708, 'LIMA', 'YAUYOS', 'COCHAS'),
(1368, 140709, 'LIMA', 'YAUYOS', 'COLONIA'),
(1369, 140710, 'LIMA', 'YAUYOS', 'CHOCOS'),
(1370, 140711, 'LIMA', 'YAUYOS', 'HUAMPARA'),
(1371, 140712, 'LIMA', 'YAUYOS', 'HUANCAYA'),
(1372, 140713, 'LIMA', 'YAUYOS', 'HUANGASCAR'),
(1373, 140714, 'LIMA', 'YAUYOS', 'HUANTAN'),
(1374, 140715, 'LIMA', 'YAUYOS', 'HUAÑEC'),
(1375, 140716, 'LIMA', 'YAUYOS', 'LARAOS'),
(1376, 140717, 'LIMA', 'YAUYOS', 'LINCHA'),
(1377, 140718, 'LIMA', 'YAUYOS', 'MIRAFLORES'),
(1378, 140719, 'LIMA', 'YAUYOS', 'OMAS'),
(1379, 140720, 'LIMA', 'YAUYOS', 'QUINCHES'),
(1380, 140721, 'LIMA', 'YAUYOS', 'QUINOCAY'),
(1381, 140722, 'LIMA', 'YAUYOS', 'SAN JOAQUIN'),
(1382, 140723, 'LIMA', 'YAUYOS', 'SAN PEDRO DE PILAS'),
(1383, 140724, 'LIMA', 'YAUYOS', 'TANTA'),
(1384, 140725, 'LIMA', 'YAUYOS', 'TAURIPAMPA'),
(1385, 140726, 'LIMA', 'YAUYOS', 'TUPE'),
(1386, 140727, 'LIMA', 'YAUYOS', 'TOMAS'),
(1387, 140728, 'LIMA', 'YAUYOS', 'VIÑAC'),
(1388, 140729, 'LIMA', 'YAUYOS', 'VITIS'),
(1389, 140730, 'LIMA', 'YAUYOS', 'HONGOS'),
(1390, 140731, 'LIMA', 'YAUYOS', 'MADEAN'),
(1391, 140732, 'LIMA', 'YAUYOS', 'PUTINZA'),
(1392, 140733, 'LIMA', 'YAUYOS', 'CATAHUASI'),
(1393, 150201, 'LORETO', 'ALTO AMAZONAS', 'YURIMAGUAS'),
(1394, 150202, 'LORETO', 'ALTO AMAZONAS', 'BALSAPUERTO'),
(1395, 150205, 'LORETO', 'ALTO AMAZONAS', 'JEBEROS'),
(1396, 150206, 'LORETO', 'ALTO AMAZONAS', 'LAGUNAS'),
(1397, 150210, 'LORETO', 'ALTO AMAZONAS', 'SANTA CRUZ'),
(1398, 150211, 'LORETO', 'ALTO AMAZONAS', 'TENIENTE CESAR LOPEZ ROJAS'),
(1399, 150701, 'LORETO', 'DATEM DEL MARAÑON', 'BARRANCA'),
(1400, 150702, 'LORETO', 'DATEM DEL MARAÑON', 'ANDOAS'),
(1401, 150703, 'LORETO', 'DATEM DEL MARAÑON', 'CAHUAPANAS'),
(1402, 150704, 'LORETO', 'DATEM DEL MARAÑON', 'MANSERICHE'),
(1403, 150705, 'LORETO', 'DATEM DEL MARAÑON', 'MORONA'),
(1404, 150706, 'LORETO', 'DATEM DEL MARAÑON', 'PASTAZA'),
(1405, 150301, 'LORETO', 'LORETO', 'NAUTA'),
(1406, 150302, 'LORETO', 'LORETO', 'PARINARI'),
(1407, 150303, 'LORETO', 'LORETO', 'TIGRE'),
(1408, 150304, 'LORETO', 'LORETO', 'URARINAS'),
(1409, 150305, 'LORETO', 'LORETO', 'TROMPETEROS'),
(1410, 150601, 'LORETO', 'MARISCAL RAMON CASTILLA', 'RAMON CASTILLA'),
(1411, 150602, 'LORETO', 'MARISCAL RAMON CASTILLA', 'PEBAS'),
(1412, 150603, 'LORETO', 'MARISCAL RAMON CASTILLA', 'YAVARI'),
(1413, 150604, 'LORETO', 'MARISCAL RAMON CASTILLA', 'SAN PABLO'),
(1414, 150101, 'LORETO', 'MAYNAS', 'IQUITOS'),
(1415, 150102, 'LORETO', 'MAYNAS', 'ALTO NANAY'),
(1416, 150103, 'LORETO', 'MAYNAS', 'FERNANDO LORES'),
(1417, 150104, 'LORETO', 'MAYNAS', 'LAS AMAZONAS'),
(1418, 150105, 'LORETO', 'MAYNAS', 'MAZAN'),
(1419, 150106, 'LORETO', 'MAYNAS', 'NAPO'),
(1420, 150107, 'LORETO', 'MAYNAS', 'PUTUMAYO'),
(1421, 150108, 'LORETO', 'MAYNAS', 'TORRES CAUSANA'),
(1422, 150110, 'LORETO', 'MAYNAS', 'INDIANA'),
(1423, 150111, 'LORETO', 'MAYNAS', 'PUNCHANA'),
(1424, 150112, 'LORETO', 'MAYNAS', 'BELEN'),
(1425, 150113, 'LORETO', 'MAYNAS', 'SAN JUAN BAUTISTA'),
(1426, 150114, 'LORETO', 'MAYNAS', 'TNTE. MANUEL CLAVERO'),
(1427, 150401, 'LORETO', 'REQUENA', 'REQUENA'),
(1428, 150402, 'LORETO', 'REQUENA', 'ALTO TAPICHE'),
(1429, 150403, 'LORETO', 'REQUENA', 'CAPELO'),
(1430, 150404, 'LORETO', 'REQUENA', 'EMILIO SAN MARTIN'),
(1431, 150405, 'LORETO', 'REQUENA', 'MAQUIA'),
(1432, 150406, 'LORETO', 'REQUENA', 'PUINAHUA'),
(1433, 150407, 'LORETO', 'REQUENA', 'SAQUENA'),
(1434, 150408, 'LORETO', 'REQUENA', 'SOPLIN'),
(1435, 150409, 'LORETO', 'REQUENA', 'TAPICHE'),
(1436, 150410, 'LORETO', 'REQUENA', 'JENARO HERRERA'),
(1437, 150411, 'LORETO', 'REQUENA', 'YAQUERANA'),
(1438, 150501, 'LORETO', 'UCAYALI', 'CONTAMANA'),
(1439, 150502, 'LORETO', 'UCAYALI', 'VARGAS GUERRA'),
(1440, 150503, 'LORETO', 'UCAYALI', 'PADRE MARQUEZ'),
(1441, 150504, 'LORETO', 'UCAYALI', 'PAMPA HERMOSA'),
(1442, 150505, 'LORETO', 'UCAYALI', 'SARAYACU'),
(1443, 150506, 'LORETO', 'UCAYALI', 'INAHUAYA'),
(1444, 160101, 'MADRE DE DIOS', 'TAMBOPATA', 'TAMBOPATA'),
(1445, 160102, 'MADRE DE DIOS', 'TAMBOPATA', 'INAMBARI'),
(1446, 160103, 'MADRE DE DIOS', 'TAMBOPATA', 'LAS PIEDRAS'),
(1447, 160104, 'MADRE DE DIOS', 'TAMBOPATA', 'LABERINTO'),
(1448, 160201, 'MADRE DE DIOS', 'MANU', 'HUEPETUHE'),
(1449, 160202, 'MADRE DE DIOS', 'MANU', 'FITZCARRALD'),
(1450, 160203, 'MADRE DE DIOS', 'MANU', 'MADRE DE DIOS'),
(1451, 160204, 'MADRE DE DIOS', 'MANU', 'HUEPETUE'),
(1452, 160301, 'MADRE DE DIOS', 'TAHUAMANU', 'IÑAPARI'),
(1453, 160302, 'MADRE DE DIOS', 'TAHUAMANU', 'IBERIA'),
(1454, 160303, 'MADRE DE DIOS', 'TAHUAMANU', 'TAHUAMANU'),
(1455, 170101, 'MOQUEGUA', 'MARISCAL NIETO', 'MOQUEGUA'),
(1456, 170102, 'MOQUEGUA', 'MARISCAL NIETO', 'CARUMAS'),
(1457, 170103, 'MOQUEGUA', 'MARISCAL NIETO', 'CUCHUMBAYA'),
(1458, 170104, 'MOQUEGUA', 'MARISCAL NIETO', 'SAN CRISTOBAL'),
(1459, 170105, 'MOQUEGUA', 'MARISCAL NIETO', 'TORATA'),
(1460, 170106, 'MOQUEGUA', 'MARISCAL NIETO', 'SAMEGUA'),
(1461, 170201, 'MOQUEGUA', 'GENERAL SANCHEZ CERRO', 'OMATE'),
(1462, 170202, 'MOQUEGUA', 'GENERAL SANCHEZ CERRO', 'COALAQUE'),
(1463, 170203, 'MOQUEGUA', 'GENERAL SANCHEZ CERRO', 'CHOJATA'),
(1464, 170204, 'MOQUEGUA', 'GENERAL SANCHEZ CERRO', 'ICHUÑA'),
(1465, 170205, 'MOQUEGUA', 'GENERAL SANCHEZ CERRO', 'LA CAPILLA'),
(1466, 170206, 'MOQUEGUA', 'GENERAL SANCHEZ CERRO', 'LLOQUE'),
(1467, 170207, 'MOQUEGUA', 'GENERAL SANCHEZ CERRO', 'MATALAQUE'),
(1468, 170208, 'MOQUEGUA', 'GENERAL SANCHEZ CERRO', 'PUQUINA'),
(1469, 170209, 'MOQUEGUA', 'GENERAL SANCHEZ CERRO', 'QUINISTAQUILLAS'),
(1470, 170210, 'MOQUEGUA', 'GENERAL SANCHEZ CERRO', 'UBINAS'),
(1471, 140105, 'LIMA', 'LIMA', 'CARABAYLLO'),
(1472, 140106, 'LIMA', 'LIMA', 'COMAS'),
(1473, 140119, 'LIMA', 'LIMA', 'PUENTE PIEDRA'),
(1474, 140122, 'LIMA', 'LIMA', 'RIMAC'),
(1475, 140126, 'LIMA', 'LIMA', 'SAN MARTIN DE PORRES'),
(1476, 140129, 'LIMA', 'LIMA', 'SANTA ROSA'),
(1477, 140134, 'LIMA', 'LIMA', 'INDEPENDENCIA'),
(1478, 140142, 'LIMA', 'LIMA', 'LOS OLIVOS'),
(1479, 140108, 'LIMA', 'LIMA', 'CHORRILLOS'),
(1480, 140113, 'LIMA', 'LIMA', 'LURIN'),
(1481, 140116, 'LIMA', 'LIMA', 'PACHACAMAC'),
(1482, 140118, 'LIMA', 'LIMA', 'PUCUSANA'),
(1483, 140120, 'LIMA', 'LIMA', 'PUNTA HERMOSA'),
(1484, 140121, 'LIMA', 'LIMA', 'PUNTA NEGRA'),
(1485, 140123, 'LIMA', 'LIMA', 'SAN BARTOLO'),
(1486, 140128, 'LIMA', 'LIMA', 'SANTA MARIA DEL MAR'),
(1487, 140130, 'LIMA', 'LIMA', 'SANTIAGO DE SURCO'),
(1488, 140131, 'LIMA', 'LIMA', 'SURQUILLO'),
(1489, 140132, 'LIMA', 'LIMA', 'VILLA MARIA DEL TRIUNFO'),
(1490, 140136, 'LIMA', 'LIMA', 'SAN JUAN DE MIRAFLORES'),
(1491, 140140, 'LIMA', 'LIMA', 'SAN BORJA'),
(1492, 140141, 'LIMA', 'LIMA', 'VILLA EL SALVADOR'),
(1493, 140701, 'LIMA', 'YAUYOS', 'YAUYOS'),
(1494, 140702, 'LIMA', 'YAUYOS', 'ALIS'),
(1495, 140703, 'LIMA', 'YAUYOS', 'AYAUCA'),
(1496, 140704, 'LIMA', 'YAUYOS', 'AYAVIRI'),
(1497, 170211, 'MOQUEGUA', 'GENERAL SANCHEZ CERRO', 'YUNGA'),
(1498, 170301, 'MOQUEGUA', 'ILO', 'ILO'),
(1499, 170302, 'MOQUEGUA', 'ILO', 'EL ALGARROBAL'),
(1500, 170303, 'MOQUEGUA', 'ILO', 'PACOCHA'),
(1501, 180301, 'PASCO', 'OXAPAMPA', 'OXAPAMPA'),
(1502, 180302, 'PASCO', 'OXAPAMPA', 'CHONTABAMBA'),
(1503, 180303, 'PASCO', 'OXAPAMPA', 'HUANCABAMBA'),
(1504, 180304, 'PASCO', 'OXAPAMPA', 'PUERTO BERMUDEZ'),
(1505, 180305, 'PASCO', 'OXAPAMPA', 'VILLA RICA'),
(1506, 180306, 'PASCO', 'OXAPAMPA', 'POZUZO'),
(1507, 180307, 'PASCO', 'OXAPAMPA', 'PALCAZU'),
(1508, 180101, 'PASCO', 'PASCO', 'CHAUPIMARCA'),
(1509, 180103, 'PASCO', 'PASCO', 'HUACHON'),
(1510, 180104, 'PASCO', 'PASCO', 'HUARIACA'),
(1511, 180105, 'PASCO', 'PASCO', 'HUAYLLAY'),
(1512, 180106, 'PASCO', 'PASCO', 'NINACACA'),
(1513, 180107, 'PASCO', 'PASCO', 'PALLANCHACRA'),
(1514, 180108, 'PASCO', 'PASCO', 'PAUCARTAMBO'),
(1515, 180109, 'PASCO', 'PASCO', 'SAN FRANCISCO DE ASIS DE YARUSYACAN'),
(1516, 180110, 'PASCO', 'PASCO', 'SIMON BOLIVAR'),
(1517, 180111, 'PASCO', 'PASCO', 'TICLACAYAN'),
(1518, 180112, 'PASCO', 'PASCO', 'TINYAHUARCO'),
(1519, 180113, 'PASCO', 'PASCO', 'VICCO'),
(1520, 180114, 'PASCO', 'PASCO', 'YANACANCHA'),
(1521, 180201, 'PASCO', 'DANIEL ALCIDES CARRION', 'YANAHUANCA'),
(1522, 180202, 'PASCO', 'DANIEL ALCIDES CARRION', 'CHACAYAN'),
(1523, 180203, 'PASCO', 'DANIEL ALCIDES CARRION', 'GOYLLARISQUIZGA'),
(1524, 180204, 'PASCO', 'DANIEL ALCIDES CARRION', 'PAUCAR'),
(1525, 180205, 'PASCO', 'DANIEL ALCIDES CARRION', 'SAN PEDRO DE PILLAO'),
(1526, 180206, 'PASCO', 'DANIEL ALCIDES CARRION', 'SANTA ANA DE TUSI'),
(1527, 180207, 'PASCO', 'DANIEL ALCIDES CARRION', 'TAPUC'),
(1528, 180208, 'PASCO', 'DANIEL ALCIDES CARRION', 'VILCABAMBA'),
(1529, 190301, 'PIURA', 'HUANCABAMBA', 'HUANCABAMBA'),
(1530, 190302, 'PIURA', 'HUANCABAMBA', 'CANCHAQUE'),
(1531, 190303, 'PIURA', 'HUANCABAMBA', 'HUARMACA'),
(1532, 190304, 'PIURA', 'HUANCABAMBA', 'SONDOR'),
(1533, 190305, 'PIURA', 'HUANCABAMBA', 'SONDORILLO'),
(1534, 190306, 'PIURA', 'HUANCABAMBA', 'EL CARMEN DE LA FRONTERA'),
(1535, 190307, 'PIURA', 'HUANCABAMBA', 'SAN MIGUEL DE EL FAIQUE'),
(1536, 190308, 'PIURA', 'HUANCABAMBA', 'LALAQUIZ'),
(1537, 190401, 'PIURA', 'MORROPON', 'CHULUCANAS'),
(1538, 190402, 'PIURA', 'MORROPON', 'BUENOS AIRES'),
(1539, 190403, 'PIURA', 'MORROPON', 'CHALACO'),
(1540, 190404, 'PIURA', 'MORROPON', 'MORROPON'),
(1541, 190405, 'PIURA', 'MORROPON', 'SALITRAL'),
(1542, 190406, 'PIURA', 'MORROPON', 'SANTA CATALINA DE MOSSA'),
(1543, 190407, 'PIURA', 'MORROPON', 'SANTO DOMINGO'),
(1544, 190408, 'PIURA', 'MORROPON', 'LA MATANZA'),
(1545, 190409, 'PIURA', 'MORROPON', 'YAMANGO'),
(1546, 190410, 'PIURA', 'MORROPON', 'SAN JUAN DE BIGOTE'),
(1547, 190101, 'PIURA', 'PIURA', 'PIURA'),
(1548, 190103, 'PIURA', 'PIURA', 'CASTILLA'),
(1549, 190104, 'PIURA', 'PIURA', 'CATACAOS'),
(1550, 190105, 'PIURA', 'PIURA', 'LA ARENA'),
(1551, 190106, 'PIURA', 'PIURA', 'LA UNION'),
(1552, 190107, 'PIURA', 'PIURA', 'LAS LOMAS'),
(1553, 190109, 'PIURA', 'PIURA', 'TAMBO GRANDE'),
(1554, 190113, 'PIURA', 'PIURA', 'CURA MORI'),
(1555, 190114, 'PIURA', 'PIURA', 'EL TALLAN'),
(1556, 190801, 'PIURA', 'SECHURA', 'SECHURA'),
(1557, 190802, 'PIURA', 'SECHURA', 'VICE'),
(1558, 190803, 'PIURA', 'SECHURA', 'BERNAL'),
(1559, 190804, 'PIURA', 'SECHURA', 'BELLAVISTA DE LA UNION'),
(1560, 190805, 'PIURA', 'SECHURA', 'CRISTO NOS VALGA'),
(1561, 190806, 'PIURA', 'SECHURA', 'RINCONADA-LLICUAR'),
(1562, 190201, 'PIURA', 'AYABACA', 'AYABACA'),
(1563, 190202, 'PIURA', 'AYABACA', 'FRIAS'),
(1564, 190203, 'PIURA', 'AYABACA', 'LAGUNAS'),
(1565, 190204, 'PIURA', 'AYABACA', 'MONTERO'),
(1566, 190205, 'PIURA', 'AYABACA', 'PACAIPAMPA'),
(1567, 190206, 'PIURA', 'AYABACA', 'SAPILLICA'),
(1568, 190207, 'PIURA', 'AYABACA', 'SICCHEZ'),
(1569, 190208, 'PIURA', 'AYABACA', 'SUYO'),
(1570, 190209, 'PIURA', 'AYABACA', 'JILILI'),
(1571, 190210, 'PIURA', 'AYABACA', 'PAIMAS'),
(1572, 190501, 'PIURA', 'PAITA', 'PAITA'),
(1573, 190502, 'PIURA', 'PAITA', 'AMOTAPE'),
(1574, 190503, 'PIURA', 'PAITA', 'ARENAL'),
(1575, 190504, 'PIURA', 'PAITA', 'LA HUACA'),
(1576, 190505, 'PIURA', 'PAITA', 'COLAN'),
(1577, 190506, 'PIURA', 'PAITA', 'TAMARINDO'),
(1578, 190507, 'PIURA', 'PAITA', 'VICHAYAL'),
(1579, 190601, 'PIURA', 'SULLANA', 'SULLANA'),
(1580, 190602, 'PIURA', 'SULLANA', 'BELLAVISTA'),
(1581, 190603, 'PIURA', 'SULLANA', 'LANCONES'),
(1582, 190604, 'PIURA', 'SULLANA', 'MARCAVELICA'),
(1583, 190605, 'PIURA', 'SULLANA', 'MIGUEL CHECA'),
(1584, 190606, 'PIURA', 'SULLANA', 'QUERECOTILLO'),
(1585, 190607, 'PIURA', 'SULLANA', 'SALITRAL'),
(1586, 190608, 'PIURA', 'SULLANA', 'IGNACIO ESCUDERO'),
(1587, 190701, 'PIURA', 'TALARA', 'PARIÑAS'),
(1588, 190702, 'PIURA', 'TALARA', 'EL ALTO'),
(1589, 190703, 'PIURA', 'TALARA', 'LA BREA'),
(1590, 190704, 'PIURA', 'TALARA', 'LOBITOS'),
(1591, 190705, 'PIURA', 'TALARA', 'MANCORA'),
(1592, 190706, 'PIURA', 'TALARA', 'LOS ORGANOS'),
(1593, 200201, 'PUNO', 'AZÁNGARO', 'AZÁNGARO'),
(1594, 200202, 'PUNO', 'AZÁNGARO', 'ACHAYA'),
(1595, 200203, 'PUNO', 'AZÁNGARO', 'ARAPA'),
(1596, 200204, 'PUNO', 'AZÁNGARO', 'ASILLO'),
(1597, 200205, 'PUNO', 'AZÁNGARO', 'CAMINACA'),
(1598, 200206, 'PUNO', 'AZÁNGARO', 'CHUPA'),
(1599, 200207, 'PUNO', 'AZÁNGARO', 'JOSE DOMINGO CHOQUEHUANCA'),
(1600, 200208, 'PUNO', 'AZÁNGARO', 'MUÑANI'),
(1601, 200210, 'PUNO', 'AZÁNGARO', 'POTONI'),
(1602, 200212, 'PUNO', 'AZÁNGARO', 'SAMAN'),
(1603, 200213, 'PUNO', 'AZÁNGARO', 'SAN ANTON'),
(1604, 200214, 'PUNO', 'AZÁNGARO', 'SAN JOSE'),
(1605, 200215, 'PUNO', 'AZÁNGARO', 'SAN JUAN DE SALINAS'),
(1606, 200216, 'PUNO', 'AZÁNGARO', 'SANTIAGO DE PUPUJA'),
(1607, 200217, 'PUNO', 'AZÁNGARO', 'TIRAPATA'),
(1608, 200301, 'PUNO', 'CARABAYA', 'MACUSANI'),
(1609, 200302, 'PUNO', 'CARABAYA', 'AJOYANI'),
(1610, 200303, 'PUNO', 'CARABAYA', 'AYAPATA'),
(1611, 200304, 'PUNO', 'CARABAYA', 'COASA'),
(1612, 200305, 'PUNO', 'CARABAYA', 'CORANI'),
(1613, 200306, 'PUNO', 'CARABAYA', 'CRUCERO'),
(1614, 200307, 'PUNO', 'CARABAYA', 'ITUATA'),
(1615, 200308, 'PUNO', 'CARABAYA', 'OLLACHEA'),
(1616, 200309, 'PUNO', 'CARABAYA', 'SAN GABAN'),
(1617, 200310, 'PUNO', 'CARABAYA', 'USICAYOS'),
(1618, 200501, 'PUNO', 'HUANCANE', 'HUANCANE'),
(1619, 200502, 'PUNO', 'HUANCANE', 'COJATA'),
(1620, 200504, 'PUNO', 'HUANCANE', 'INCHUPALLA'),
(1621, 200506, 'PUNO', 'HUANCANE', 'PUSI'),
(1622, 200507, 'PUNO', 'HUANCANE', 'ROSASPATA'),
(1623, 200508, 'PUNO', 'HUANCANE', 'TARACO'),
(1624, 200509, 'PUNO', 'HUANCANE', 'VILQUE CHICO'),
(1625, 200511, 'PUNO', 'HUANCANE', 'HUATASANI'),
(1626, 201301, 'PUNO', 'MOHO', 'MOHO'),
(1627, 201302, 'PUNO', 'MOHO', 'CONIMA'),
(1628, 201303, 'PUNO', 'MOHO', 'TILALI'),
(1629, 201304, 'PUNO', 'MOHO', 'HUAYRAPATA'),
(1630, 200101, 'PUNO', 'PUNO', 'PUNO'),
(1631, 200102, 'PUNO', 'PUNO', 'ACORA'),
(1632, 200103, 'PUNO', 'PUNO', 'ATUNCOLLA'),
(1633, 200104, 'PUNO', 'PUNO', 'CAPACHICA'),
(1634, 200105, 'PUNO', 'PUNO', 'COATA'),
(1635, 200106, 'PUNO', 'PUNO', 'CHUCUITO'),
(1636, 200107, 'PUNO', 'PUNO', 'HUATA'),
(1637, 200108, 'PUNO', 'PUNO', 'MAÑAZO'),
(1638, 200109, 'PUNO', 'PUNO', 'PAUCARCOLLA'),
(1639, 200110, 'PUNO', 'PUNO', 'PICHACANI'),
(1640, 200111, 'PUNO', 'PUNO', 'SAN ANTONIO'),
(1641, 200112, 'PUNO', 'PUNO', 'TIQUILLACA'),
(1642, 200113, 'PUNO', 'PUNO', 'VILQUE'),
(1643, 200114, 'PUNO', 'PUNO', 'PLATERIA'),
(1644, 200115, 'PUNO', 'PUNO', 'AMANTANÍ'),
(1645, 200401, 'PUNO', 'CHUCUITO', 'JULI'),
(1646, 200402, 'PUNO', 'CHUCUITO', 'DESAGUADERO'),
(1647, 200403, 'PUNO', 'CHUCUITO', 'HUACULLANI'),
(1648, 200406, 'PUNO', 'CHUCUITO', 'PISACOMA'),
(1649, 200407, 'PUNO', 'CHUCUITO', 'POMATA'),
(1650, 200410, 'PUNO', 'CHUCUITO', 'ZEPITA'),
(1651, 200412, 'PUNO', 'CHUCUITO', 'KELLUYO'),
(1652, 201001, 'PUNO', 'YUNGUYO', 'YUNGUYO'),
(1653, 201002, 'PUNO', 'YUNGUYO', 'UNICACHI'),
(1654, 201003, 'PUNO', 'YUNGUYO', 'ANAPIA'),
(1655, 201004, 'PUNO', 'YUNGUYO', 'COPANI'),
(1656, 201005, 'PUNO', 'YUNGUYO', 'CUTURAPI'),
(1657, 201006, 'PUNO', 'YUNGUYO', 'OLLARAYA'),
(1658, 201007, 'PUNO', 'YUNGUYO', 'TINICACHI'),
(1659, 201201, 'PUNO', 'EL COLLAO', 'ILAVE'),
(1660, 201202, 'PUNO', 'EL COLLAO', 'PILCUYO'),
(1661, 201203, 'PUNO', 'EL COLLAO', 'SANTA ROSA'),
(1662, 201204, 'PUNO', 'EL COLLAO', 'CAPASO'),
(1663, 201205, 'PUNO', 'EL COLLAO', 'CONDURIRI'),
(1664, 200801, 'PUNO', 'SANDIA', 'SANDIA'),
(1665, 200803, 'PUNO', 'SANDIA', 'CUYOCUYO'),
(1666, 200804, 'PUNO', 'SANDIA', 'LIMBANI'),
(1667, 200805, 'PUNO', 'SANDIA', 'PHARA'),
(1668, 200806, 'PUNO', 'SANDIA', 'PATAMBUCO'),
(1669, 200807, 'PUNO', 'SANDIA', 'QUIACA'),
(1670, 200808, 'PUNO', 'SANDIA', 'SAN JUAN DEL ORO'),
(1671, 200810, 'PUNO', 'SANDIA', 'YANAHUAYA'),
(1672, 200811, 'PUNO', 'SANDIA', 'ALTO INAMBARI'),
(1673, 200812, 'PUNO', 'SANDIA', 'SAN PEDRO DE PUTINA PUNCO'),
(1674, 201101, 'PUNO', 'SAN ANTONIO DE PUTINA', 'PUTINA'),
(1675, 201102, 'PUNO', 'SAN ANTONIO DE PUTINA', 'PEDRO VILCA APAZA'),
(1676, 201103, 'PUNO', 'SAN ANTONIO DE PUTINA', 'QUILCAPUNCU'),
(1677, 201104, 'PUNO', 'SAN ANTONIO DE PUTINA', 'ANANEA'),
(1678, 201105, 'PUNO', 'SAN ANTONIO DE PUTINA', 'SINA'),
(1679, 200601, 'PUNO', 'LAMPA', 'LAMPA'),
(1680, 200602, 'PUNO', 'LAMPA', 'CABANILLA'),
(1681, 200603, 'PUNO', 'LAMPA', 'CALAPUJA'),
(1682, 200604, 'PUNO', 'LAMPA', 'NICASIO'),
(1683, 200605, 'PUNO', 'LAMPA', 'OCUVIRI'),
(1684, 200606, 'PUNO', 'LAMPA', 'PALCA'),
(1685, 200607, 'PUNO', 'LAMPA', 'PARATIA'),
(1686, 200608, 'PUNO', 'LAMPA', 'PUCARA'),
(1687, 200609, 'PUNO', 'LAMPA', 'SANTA LUCIA'),
(1688, 200610, 'PUNO', 'LAMPA', 'VILAVILA'),
(1689, 200701, 'PUNO', 'MELGAR', 'AYAVIRI'),
(1690, 200702, 'PUNO', 'MELGAR', 'ANTAUTA'),
(1691, 200703, 'PUNO', 'MELGAR', 'CUPI'),
(1692, 200704, 'PUNO', 'MELGAR', 'LLALLI'),
(1693, 200705, 'PUNO', 'MELGAR', 'MACARI'),
(1694, 200706, 'PUNO', 'MELGAR', 'NUÑOA'),
(1695, 200707, 'PUNO', 'MELGAR', 'ORURILLO'),
(1696, 200708, 'PUNO', 'MELGAR', 'SANTA ROSA'),
(1697, 200709, 'PUNO', 'MELGAR', 'UMACHIRI'),
(1698, 200901, 'PUNO', 'SAN ROMAN', 'JULIACA'),
(1699, 200902, 'PUNO', 'SAN ROMAN', 'CABANA'),
(1700, 200903, 'PUNO', 'SAN ROMAN', 'CABANILLAS'),
(1701, 200904, 'PUNO', 'SAN ROMAN', 'CARACOTO'),
(1702, 210201, 'SAN MARTIN', 'HUALLAGA', 'SAPOSOA'),
(1703, 210202, 'SAN MARTIN', 'HUALLAGA', 'PISCOYACU'),
(1704, 210203, 'SAN MARTIN', 'HUALLAGA', 'SACANCHE'),
(1705, 210204, 'SAN MARTIN', 'HUALLAGA', 'TINGO DE SAPOSOA'),
(1706, 210205, 'SAN MARTIN', 'HUALLAGA', 'ALTO SAPOSOA'),
(1707, 210206, 'SAN MARTIN', 'HUALLAGA', 'EL ESLABON'),
(1708, 210401, 'SAN MARTIN', 'MARISCAL CACERES', 'JUANJUI'),
(1709, 210402, 'SAN MARTIN', 'MARISCAL CACERES', 'CAMPANILLA'),
(1710, 210403, 'SAN MARTIN', 'MARISCAL CACERES', 'HUICUNGO'),
(1711, 210404, 'SAN MARTIN', 'MARISCAL CACERES', 'PACHIZA'),
(1712, 210405, 'SAN MARTIN', 'MARISCAL CACERES', 'PAJARILLO'),
(1713, 210701, 'SAN MARTIN', 'BELLAVISTA', 'BELLAVISTA'),
(1714, 210702, 'SAN MARTIN', 'BELLAVISTA', 'SAN RAFAEL'),
(1715, 210703, 'SAN MARTIN', 'BELLAVISTA', 'SAN PABLO'),
(1716, 210704, 'SAN MARTIN', 'BELLAVISTA', 'ALTO BIAVO'),
(1717, 210705, 'SAN MARTIN', 'BELLAVISTA', 'HUALLAGA'),
(1718, 210706, 'SAN MARTIN', 'BELLAVISTA', 'BAJO BIAVO'),
(1719, 210801, 'SAN MARTIN', 'TOCACHE', 'TOCACHE'),
(1720, 210802, 'SAN MARTIN', 'TOCACHE', 'NUEVO PROGRESO'),
(1721, 210803, 'SAN MARTIN', 'TOCACHE', 'POLVORA'),
(1722, 210804, 'SAN MARTIN', 'TOCACHE', 'SHUNTE'),
(1723, 210805, 'SAN MARTIN', 'TOCACHE', 'UCHIZA'),
(1724, 210101, 'SAN MARTIN', 'MOYOBAMBA', 'MOYOBAMBA'),
(1725, 210102, 'SAN MARTIN', 'MOYOBAMBA', 'CALZADA'),
(1726, 210103, 'SAN MARTIN', 'MOYOBAMBA', 'HABANA'),
(1727, 210104, 'SAN MARTIN', 'MOYOBAMBA', 'JEPELACIO'),
(1728, 210105, 'SAN MARTIN', 'MOYOBAMBA', 'SORITOR'),
(1729, 210106, 'SAN MARTIN', 'MOYOBAMBA', 'YANTALO'),
(1730, 210301, 'SAN MARTIN', 'LAMAS', 'LAMAS'),
(1731, 210303, 'SAN MARTIN', 'LAMAS', 'BARRANQUITA'),
(1732, 210304, 'SAN MARTIN', 'LAMAS', 'CAYNARACHI'),
(1733, 210305, 'SAN MARTIN', 'LAMAS', 'CUÑUMBUQUI'),
(1734, 210306, 'SAN MARTIN', 'LAMAS', 'PINTO RECODO'),
(1735, 210307, 'SAN MARTIN', 'LAMAS', 'RUMISAPA'),
(1736, 210311, 'SAN MARTIN', 'LAMAS', 'SHANAO'),
(1737, 210313, 'SAN MARTIN', 'LAMAS', 'TABALOSOS'),
(1738, 210314, 'SAN MARTIN', 'LAMAS', 'ZAPATERO'),
(1739, 210315, 'SAN MARTIN', 'LAMAS', 'ALONSO DE ALVARADO'),
(1740, 210316, 'SAN MARTIN', 'LAMAS', 'SAN ROQUE DE CUMBAZA'),
(1741, 210501, 'SAN MARTIN', 'RIOJA', 'RIOJA'),
(1742, 210502, 'SAN MARTIN', 'RIOJA', 'POSIC'),
(1743, 210503, 'SAN MARTIN', 'RIOJA', 'YORONGOS'),
(1744, 210504, 'SAN MARTIN', 'RIOJA', 'YURACYACU'),
(1745, 210505, 'SAN MARTIN', 'RIOJA', 'NUEVA CAJAMARCA'),
(1746, 210506, 'SAN MARTIN', 'RIOJA', 'ELIAS SOPLIN'),
(1747, 210507, 'SAN MARTIN', 'RIOJA', 'SAN FERNANDO'),
(1748, 210508, 'SAN MARTIN', 'RIOJA', 'PARDO MIGUEL'),
(1749, 210509, 'SAN MARTIN', 'RIOJA', 'AWAJUN'),
(1750, 210601, 'SAN MARTIN', 'SAN MARTIN', 'TARAPOTO'),
(1751, 210602, 'SAN MARTIN', 'SAN MARTIN', 'ALBERTO LEVEAU'),
(1752, 210604, 'SAN MARTIN', 'SAN MARTIN', 'CACATACHI'),
(1753, 210606, 'SAN MARTIN', 'SAN MARTIN', 'CHAZUTA'),
(1754, 210607, 'SAN MARTIN', 'SAN MARTIN', 'CHIPURANA'),
(1755, 210608, 'SAN MARTIN', 'SAN MARTIN', 'EL PORVENIR'),
(1756, 210609, 'SAN MARTIN', 'SAN MARTIN', 'HUIMBAYOC'),
(1757, 210610, 'SAN MARTIN', 'SAN MARTIN', 'JUAN GUERRA'),
(1758, 210611, 'SAN MARTIN', 'SAN MARTIN', 'MORALES'),
(1759, 210612, 'SAN MARTIN', 'SAN MARTIN', 'PAPAPLAYA'),
(1760, 210616, 'SAN MARTIN', 'SAN MARTIN', 'SAN ANTONIO'),
(1761, 210619, 'SAN MARTIN', 'SAN MARTIN', 'SAUCE'),
(1762, 210620, 'SAN MARTIN', 'SAN MARTIN', 'SHAPAJA'),
(1763, 210621, 'SAN MARTIN', 'SAN MARTIN', 'LA BANDA DE SHILCAYO'),
(1764, 210901, 'SAN MARTIN', 'PICOTA', 'PICOTA'),
(1765, 210902, 'SAN MARTIN', 'PICOTA', 'BUENOS AIRES'),
(1766, 210903, 'SAN MARTIN', 'PICOTA', 'CASPIZAPA'),
(1767, 210904, 'SAN MARTIN', 'PICOTA', 'PILLUANA'),
(1768, 210905, 'SAN MARTIN', 'PICOTA', 'PUCACACA'),
(1769, 210906, 'SAN MARTIN', 'PICOTA', 'SAN CRISTOBAL'),
(1770, 210907, 'SAN MARTIN', 'PICOTA', 'SAN HILARION'),
(1771, 210908, 'SAN MARTIN', 'PICOTA', 'TINGO DE PONASA'),
(1772, 210909, 'SAN MARTIN', 'PICOTA', 'TRES UNIDOS'),
(1773, 210910, 'SAN MARTIN', 'PICOTA', 'SHAMBOYACU'),
(1774, 211001, 'SAN MARTIN', 'EL DORADO', 'SAN JOSE DE SISA'),
(1775, 211002, 'SAN MARTIN', 'EL DORADO', 'AGUA BLANCA'),
(1776, 211003, 'SAN MARTIN', 'EL DORADO', 'SHATOJA'),
(1777, 211004, 'SAN MARTIN', 'EL DORADO', 'SAN MARTIN'),
(1778, 211005, 'SAN MARTIN', 'EL DORADO', 'SANTA ROSA'),
(1779, 220101, 'TACNA', 'TACNA', 'TACNA'),
(1780, 220102, 'TACNA', 'TACNA', 'CALANA'),
(1781, 220104, 'TACNA', 'TACNA', 'INCLAN'),
(1782, 220107, 'TACNA', 'TACNA', 'PACHIA'),
(1783, 220108, 'TACNA', 'TACNA', 'PALCA'),
(1784, 220109, 'TACNA', 'TACNA', 'POCOLLAY'),
(1785, 220110, 'TACNA', 'TACNA', 'SAMA'),
(1786, 220111, 'TACNA', 'TACNA', 'ALTO DE LA ALIANZA'),
(1787, 220112, 'TACNA', 'TACNA', 'CIUDAD NUEVA'),
(1788, 220113, 'TACNA', 'TACNA', 'CORONEL GREGORIO ALBARRACIN LANCHIPA'),
(1789, 220301, 'TACNA', 'JORGE BASADRE', 'LOCUMBA'),
(1790, 220302, 'TACNA', 'JORGE BASADRE', 'ITE'),
(1791, 220303, 'TACNA', 'JORGE BASADRE', 'ILABAYA'),
(1792, 220201, 'TACNA', 'TARATA', 'TARATA'),
(1793, 220205, 'TACNA', 'TARATA', 'HEROES ALBARRACIN'),
(1794, 220206, 'TACNA', 'TARATA', 'ESTIQUE'),
(1795, 220207, 'TACNA', 'TARATA', 'ESTIQUE PAMPA'),
(1796, 220210, 'TACNA', 'TARATA', 'SITAJARA'),
(1797, 220211, 'TACNA', 'TARATA', 'SUSAPAYA'),
(1798, 220212, 'TACNA', 'TARATA', 'TARUCACHI'),
(1799, 220213, 'TACNA', 'TARATA', 'TICACO'),
(1800, 220401, 'TACNA', 'CANDARAVE', 'CANDARAVE'),
(1801, 220402, 'TACNA', 'CANDARAVE', 'CAIRANI'),
(1802, 220403, 'TACNA', 'CANDARAVE', 'CURIBAYA'),
(1803, 220404, 'TACNA', 'CANDARAVE', 'HUANUARA'),
(1804, 220405, 'TACNA', 'CANDARAVE', 'QUILAHUANI'),
(1805, 220406, 'TACNA', 'CANDARAVE', 'CAMILACA'),
(1806, 230101, 'TUMBES', 'TUMBES', 'TUMBES'),
(1807, 230102, 'TUMBES', 'TUMBES', 'CORRALES'),
(1808, 230103, 'TUMBES', 'TUMBES', 'LA CRUZ'),
(1809, 230104, 'TUMBES', 'TUMBES', 'PAMPAS DE HOSPITAL'),
(1810, 230105, 'TUMBES', 'TUMBES', 'SAN JACINTO'),
(1811, 230106, 'TUMBES', 'TUMBES', 'SAN JUAN DE LA VIRGEN'),
(1812, 230201, 'TUMBES', 'CONTRALMIRANTE VILLAR', 'ZORRITOS'),
(1813, 230202, 'TUMBES', 'CONTRALMIRANTE VILLAR', 'CASITAS'),
(1814, 230203, 'TUMBES', 'CONTRALMIRANTE VILLAR', 'CANOAS DE PUNTA SAL'),
(1815, 230301, 'TUMBES', 'ZARUMILLA', 'ZARUMILLA'),
(1816, 230302, 'TUMBES', 'ZARUMILLA', 'MATAPALO'),
(1817, 230303, 'TUMBES', 'ZARUMILLA', 'PAPAYAL'),
(1818, 230304, 'TUMBES', 'ZARUMILLA', 'AGUAS VERDES'),
(1819, 250301, 'UCAYALI', 'ATALAYA', 'RAIMONDI'),
(1820, 250302, 'UCAYALI', 'ATALAYA', 'TAHUANIA'),
(1821, 250303, 'UCAYALI', 'ATALAYA', 'YURUA'),
(1822, 250304, 'UCAYALI', 'ATALAYA', 'SEPAHUA'),
(1823, 250101, 'UCAYALI', 'CORONEL PORTILLO', 'CALLERIA'),
(1824, 250102, 'UCAYALI', 'CORONEL PORTILLO', 'YARINACOCHA'),
(1825, 250103, 'UCAYALI', 'CORONEL PORTILLO', 'MASISEA'),
(1826, 250104, 'UCAYALI', 'CORONEL PORTILLO', 'CAMPOVERDE'),
(1827, 250105, 'UCAYALI', 'CORONEL PORTILLO', 'IPARIA'),
(1828, 250106, 'UCAYALI', 'CORONEL PORTILLO', 'NUEVA REQUENA'),
(1829, 250107, 'UCAYALI', 'CORONEL PORTILLO', 'MANANTAY'),
(1830, 250201, 'UCAYALI', 'PADRE ABAD', 'PADRE ABAD'),
(1831, 250202, 'UCAYALI', 'PADRE ABAD', 'IRAZOLA'),
(1832, 250203, 'UCAYALI', 'PADRE ABAD', 'CURIMANA'),
(1833, 250401, 'UCAYALI', 'PURUS', 'PURUS'),
(1834, 010205, 'AMAZONAS', 'BAGUA', 'BAGUA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `uma`
--

CREATE TABLE `uma` (
  `IdUma` int(11) NOT NULL,
  `Descripcion` varchar(100) NOT NULL,
  `UsuarioCrea` int(11) NOT NULL,
  `FechaCrea` datetime NOT NULL DEFAULT current_timestamp(),
  `Estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `uma`
--

INSERT INTO `uma` (`IdUma`, `Descripcion`, `UsuarioCrea`, `FechaCrea`, `Estado`) VALUES
(1, 'BOLSA', 12, '2022-01-21 14:03:13', 1),
(2, 'BOTELL', 12, '2022-01-21 14:15:23', 1),
(3, 'BULTOS', 12, '2022-01-21 14:16:34', 1),
(4, 'CAJAS', 12, '2022-01-21 14:22:28', 1),
(5, 'GALON', 12, '2022-01-21 14:24:15', 1),
(6, 'JUEGO', 12, '2022-01-21 14:26:59', 1),
(7, 'KILOGR', 12, '2022-01-21 14:27:45', 1),
(8, 'LTRS', 12, '2022-01-21 14:35:46', 1),
(9, 'METRO', 12, '2022-01-21 14:39:42', 1),
(10, 'MILLAR', 12, '2022-01-21 14:40:04', 1),
(11, 'PAQUET', 12, '2022-01-21 14:42:50', 1),
(12, 'PAR', 12, '2022-01-21 14:44:56', 1),
(13, 'PIEZAS', 12, '2022-01-21 14:03:13', 1),
(14, 'PLANCH', 12, '2022-01-21 14:15:23', 1),
(15, 'PLIEGO', 12, '2022-03-01 09:19:13', 1),
(16, 'RESMA', 12, '2022-03-08 10:38:16', 1),
(17, 'ROLLO', 12, '2022-03-08 10:51:52', 1),
(18, 'UNIDAD', 12, '2022-03-08 10:58:10', 1),
(19, 'SCHT', 12, '2022-03-21 10:22:02', 1),
(20, 'CNMTRS\r\n', 12, '2022-03-21 10:22:02', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `dni_usuario` varchar(8) NOT NULL,
  `apellido` varchar(200) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL,
  `date_create` datetime NOT NULL DEFAULT current_timestamp(),
  `user_create` int(11) NOT NULL,
  `date_update` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_update` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `id_perfil` int(11) NOT NULL,
  `IdCentroConsumo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `dni_usuario`, `apellido`, `nombre`, `username`, `password`, `date_create`, `user_create`, `date_update`, `user_update`, `estado`, `id_perfil`, `IdCentroConsumo`) VALUES
(12, '46376778', 'MONTALVO BARBOZA', 'SMITH JESUS', 'SMONTALVO', 'e478d1b0d97bfdd6508a29432d7ff5b2ece5e2f926b877a249aabadb3790d05b', '2021-04-05 15:52:19', 1, '2022-03-21 14:29:32', 12, 1, 1, 1),
(20, '50505050', 'SALAZAR PAREDES', 'SAUL', 'ssaul', 'e478d1b0d97bfdd6508a29432d7ff5b2ece5e2f926b877a249aabadb3790d05b', '2022-01-11 00:34:57', 12, '2022-02-21 11:47:40', 12, 1, 8, 3),
(21, '40205060', 'HUAMANCHUMO CAPUNAY', 'HERNAN', 'hernanh', 'bb8111befcad4efeaf4e42b2866b43c8b209239759f3b762686c1bc54ca583ba', '2022-02-16 11:15:45', 12, '2022-03-14 15:37:14', 21, 1, 1, 1),
(22, '65464654', 'MARTINES', 'JONATAHN LUIS', 'martines', '024b6af6d24a3595798de2914a7d4e2757581302d8d057fd4187331d4705f740', '2022-03-08 12:20:04', 12, '2022-03-14 14:54:28', 12, 0, 1, 2),
(23, '98756456', 'RAMIREX', 'JOSE', 'sjesus', 'e478d1b0d97bfdd6508a29432d7ff5b2ece5e2f926b877a249aabadb3790d05b', '2022-03-08 12:50:31', 12, '2022-03-14 14:54:24', 0, 0, 1, 2),
(24, '40404040', 'AVENDAÑO', 'NEDY', 'NAVENDANOS', 'cb6f3ba16a6ddc7ae4f79f410abcd4187de72f269908baad3b3849e415271cd2', '2022-03-08 12:50:37', 21, '2022-03-11 10:07:09', 12, 1, 8, 1),
(25, '76464552', 'SANCHEZ MANRIQUE', 'VENUS SOLANGE', 'VENUS', '012d56ec9d57555bd60b5f7eabc37f32edf2fe47d77de735e7d575bbb4abf7a0', '2022-03-22 15:58:35', 12, '2022-03-22 16:15:24', 0, 1, 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`id_cargo`);

--
-- Indices de la tabla `cargo_funcion`
--
ALTER TABLE `cargo_funcion`
  ADD PRIMARY KEY (`id_cargofuncion`),
  ADD UNIQUE KEY `id_cargo_UQ` (`id_cargo`,`id_funcion`),
  ADD KEY `id_cargo` (`id_cargo`),
  ADD KEY `id_funcion` (`id_funcion`);

--
-- Indices de la tabla `ccalidad`
--
ALTER TABLE `ccalidad`
  ADD PRIMARY KEY (`IdCcalidad`),
  ADD KEY `IdComprarepliegue` (`IdComprarepliegue`);

--
-- Indices de la tabla `centroconsumo`
--
ALTER TABLE `centroconsumo`
  ADD PRIMARY KEY (`IdCentroConsumo`);

--
-- Indices de la tabla `clase`
--
ALTER TABLE `clase`
  ADD PRIMARY KEY (`IdClase`),
  ADD KEY `IdFamilia` (`IdFamilia`);

--
-- Indices de la tabla `colaborador`
--
ALTER TABLE `colaborador`
  ADD PRIMARY KEY (`id_colaborador`),
  ADD UNIQUE KEY `id_personal_UQ` (`id_personal`),
  ADD UNIQUE KEY `nro_contrato` (`nro_contrato`),
  ADD KEY `id_personal` (`id_personal`),
  ADD KEY `id_cago` (`id_cargo`),
  ADD KEY `id_pedido` (`id_pedido`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`IdCompra`),
  ADD KEY `IdTipoDocumento` (`IdTipoDocumento`),
  ADD KEY `IdSucursal` (`IdSucursal`),
  ADD KEY `IdProveedor` (`IdProveedor`),
  ADD KEY `IdProceso` (`IdProceso`),
  ADD KEY `IdTipoIngreso` (`IdTipoIngreso`);

--
-- Indices de la tabla `comprarepliegue`
--
ALTER TABLE `comprarepliegue`
  ADD PRIMARY KEY (`IdComprarepliegue`),
  ADD KEY `IdTipoDocumento` (`IdTipoDocumento`),
  ADD KEY `IdSucursal` (`IdSucursal`),
  ADD KEY `IdProveedor` (`IdProveedor`),
  ADD KEY `IdProceso` (`IdProceso`),
  ADD KEY `IdTipoIngreso` (`IdTipoIngreso`);

--
-- Indices de la tabla `detalleccalidad`
--
ALTER TABLE `detalleccalidad`
  ADD PRIMARY KEY (`IdDetalleCcalidad`),
  ADD KEY `IdCcalidad` (`IdCcalidad`);

--
-- Indices de la tabla `detallecompra`
--
ALTER TABLE `detallecompra`
  ADD PRIMARY KEY (`IdDetalleCompra`),
  ADD KEY `IdCompra` (`IdCompra`),
  ADD KEY `IdTarjetaProd` (`IdProducto`),
  ADD KEY `IdTarjeta` (`IdTarjetaMov`),
  ADD KEY `IdProducto` (`IdProducto`);

--
-- Indices de la tabla `detallecomprarepliegue`
--
ALTER TABLE `detallecomprarepliegue`
  ADD PRIMARY KEY (`IdDetallecomprarepliegue`),
  ADD KEY `IdProducto` (`IdProducto`),
  ADD KEY `IdComprarepliegue` (`IdComprarepliegue`);

--
-- Indices de la tabla `detalleformato`
--
ALTER TABLE `detalleformato`
  ADD PRIMARY KEY (`IdDetFormato`),
  ADD KEY `IdFormato` (`IdFormato`);

--
-- Indices de la tabla `detallerequerimiento`
--
ALTER TABLE `detallerequerimiento`
  ADD PRIMARY KEY (`IdDetRequerimiento`),
  ADD KEY `IdRequerimiento` (`IdRequerimiento`),
  ADD KEY `IdProducto` (`IdProducto`);

--
-- Indices de la tabla `detallesalida`
--
ALTER TABLE `detallesalida`
  ADD PRIMARY KEY (`IdDetalleSalida`),
  ADD KEY `IdSalida` (`IdSalida`),
  ADD KEY `IdProducto` (`IdProducto`),
  ADD KEY `IdTarjetaMov` (`IdTarjetaMov`);

--
-- Indices de la tabla `estadoprod`
--
ALTER TABLE `estadoprod`
  ADD PRIMARY KEY (`IdEstado`);

--
-- Indices de la tabla `extornar`
--
ALTER TABLE `extornar`
  ADD PRIMARY KEY (`IdExtornar`),
  ADD KEY `IdTipoExtornar` (`IdTipoExtornar`);

--
-- Indices de la tabla `familia`
--
ALTER TABLE `familia`
  ADD PRIMARY KEY (`IdFamilia`);

--
-- Indices de la tabla `fase`
--
ALTER TABLE `fase`
  ADD PRIMARY KEY (`IdFase`);

--
-- Indices de la tabla `formato`
--
ALTER TABLE `formato`
  ADD PRIMARY KEY (`IdFormato`);

--
-- Indices de la tabla `funcion`
--
ALTER TABLE `funcion`
  ADD PRIMARY KEY (`id_funcion`),
  ADD UNIQUE KEY `funcion` (`funcion`);

--
-- Indices de la tabla `gerencia`
--
ALTER TABLE `gerencia`
  ADD PRIMARY KEY (`id_gerencia`),
  ADD UNIQUE KEY `gerencia` (`gerencia`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`id_horario`),
  ADD UNIQUE KEY `hora` (`hora`);

--
-- Indices de la tabla `modulo`
--
ALTER TABLE `modulo`
  ADD PRIMARY KEY (`id_modulo`),
  ADD UNIQUE KEY `modulo` (`modulo`);

--
-- Indices de la tabla `pedido_cargo`
--
ALTER TABLE `pedido_cargo`
  ADD PRIMARY KEY (`id_pedidocargo`),
  ADD KEY `id_pedido` (`id_pedido`),
  ADD KEY `id_cargo` (`id_cargo`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id_perfil`);

--
-- Indices de la tabla `perfil_modulo`
--
ALTER TABLE `perfil_modulo`
  ADD PRIMARY KEY (`id_perfilmodulo`),
  ADD UNIQUE KEY `id_perfil` (`id_perfil`,`id_modulo`),
  ADD UNIQUE KEY `id_perfil_2` (`id_perfil`,`id_modulo`),
  ADD KEY `id_perfil_fk` (`id_perfil`),
  ADD KEY `id_modulo_fk` (`id_modulo`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`id_personal`),
  ADD KEY `id_cargo` (`id_cargo`),
  ADD KEY `dni` (`dni`,`id_gerencia`);

--
-- Indices de la tabla `personalsalida`
--
ALTER TABLE `personalsalida`
  ADD PRIMARY KEY (`IdPersonal`),
  ADD KEY `IdCentroConsumo` (`IdCentroConsumo`),
  ADD KEY `id_cargo` (`id_cargo`);

--
-- Indices de la tabla `proceso`
--
ALTER TABLE `proceso`
  ADD PRIMARY KEY (`IdProceso`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`IdProducto`),
  ADD KEY `IdClase` (`IdClase`),
  ADD KEY `IdUma` (`IdUma`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`IdProveedor`);

--
-- Indices de la tabla `requerimiento`
--
ALTER TABLE `requerimiento`
  ADD PRIMARY KEY (`IdRequerimiento`),
  ADD KEY `IdFase` (`IdFase`);

--
-- Indices de la tabla `responsable`
--
ALTER TABLE `responsable`
  ADD PRIMARY KEY (`id_responsable`);

--
-- Indices de la tabla `salida`
--
ALTER TABLE `salida`
  ADD PRIMARY KEY (`IdSalida`),
  ADD KEY `IdSucursal` (`IdSucursal`),
  ADD KEY `IdProceso` (`IdProceso`),
  ADD KEY `IdCentroConsumo` (`IdCentroConsumo`),
  ADD KEY `IdPersonalRec` (`IdPersonalRec`);

--
-- Indices de la tabla `stockprod`
--
ALTER TABLE `stockprod`
  ADD PRIMARY KEY (`IdStockProd`),
  ADD KEY `IdSucursal` (`IdSucursal`),
  ADD KEY `IdTarjetaProd` (`IdProducto`),
  ADD KEY `IdProducto` (`IdProducto`);

--
-- Indices de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  ADD PRIMARY KEY (`IdSucursal`);

--
-- Indices de la tabla `tarjetamovimiento`
--
ALTER TABLE `tarjetamovimiento`
  ADD PRIMARY KEY (`IdTarjetaMov`),
  ADD KEY `IdSucursal` (`IdSucursal`),
  ADD KEY `IdTarjetaProd` (`IdProducto`),
  ADD KEY `IdProducto` (`IdProducto`);

--
-- Indices de la tabla `tarjetaproducto`
--
ALTER TABLE `tarjetaproducto`
  ADD PRIMARY KEY (`IdTarjetaProd`),
  ADD KEY `IdProducto` (`IdProducto`),
  ADD KEY `IdEstado` (`IdEstado`);

--
-- Indices de la tabla `tipodocumento`
--
ALTER TABLE `tipodocumento`
  ADD PRIMARY KEY (`IdTipoDocumento`);

--
-- Indices de la tabla `tipoextornar`
--
ALTER TABLE `tipoextornar`
  ADD PRIMARY KEY (`IdTipoExtornar`);

--
-- Indices de la tabla `tipoingreso`
--
ALTER TABLE `tipoingreso`
  ADD PRIMARY KEY (`IdTipoIngreso`);

--
-- Indices de la tabla `ubigeo`
--
ALTER TABLE `ubigeo`
  ADD PRIMARY KEY (`id_ubigeo`);

--
-- Indices de la tabla `uma`
--
ALTER TABLE `uma`
  ADD PRIMARY KEY (`IdUma`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `username` (`username`,`dni_usuario`),
  ADD KEY `id_perrfil` (`id_perfil`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `id_cargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT de la tabla `cargo_funcion`
--
ALTER TABLE `cargo_funcion`
  MODIFY `id_cargofuncion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT de la tabla `ccalidad`
--
ALTER TABLE `ccalidad`
  MODIFY `IdCcalidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de la tabla `centroconsumo`
--
ALTER TABLE `centroconsumo`
  MODIFY `IdCentroConsumo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `clase`
--
ALTER TABLE `clase`
  MODIFY `IdClase` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT de la tabla `colaborador`
--
ALTER TABLE `colaborador`
  MODIFY `id_colaborador` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `IdCompra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT de la tabla `comprarepliegue`
--
ALTER TABLE `comprarepliegue`
  MODIFY `IdComprarepliegue` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de la tabla `detalleccalidad`
--
ALTER TABLE `detalleccalidad`
  MODIFY `IdDetalleCcalidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT de la tabla `detallecompra`
--
ALTER TABLE `detallecompra`
  MODIFY `IdDetalleCompra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT de la tabla `detallecomprarepliegue`
--
ALTER TABLE `detallecomprarepliegue`
  MODIFY `IdDetallecomprarepliegue` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de la tabla `detalleformato`
--
ALTER TABLE `detalleformato`
  MODIFY `IdDetFormato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `detallerequerimiento`
--
ALTER TABLE `detallerequerimiento`
  MODIFY `IdDetRequerimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT de la tabla `detallesalida`
--
ALTER TABLE `detallesalida`
  MODIFY `IdDetalleSalida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `estadoprod`
--
ALTER TABLE `estadoprod`
  MODIFY `IdEstado` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `extornar`
--
ALTER TABLE `extornar`
  MODIFY `IdExtornar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `familia`
--
ALTER TABLE `familia`
  MODIFY `IdFamilia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `fase`
--
ALTER TABLE `fase`
  MODIFY `IdFase` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `formato`
--
ALTER TABLE `formato`
  MODIFY `IdFormato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `funcion`
--
ALTER TABLE `funcion`
  MODIFY `id_funcion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=232;

--
-- AUTO_INCREMENT de la tabla `gerencia`
--
ALTER TABLE `gerencia`
  MODIFY `id_gerencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `horario`
--
ALTER TABLE `horario`
  MODIFY `id_horario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `modulo`
--
ALTER TABLE `modulo`
  MODIFY `id_modulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `pedido_cargo`
--
ALTER TABLE `pedido_cargo`
  MODIFY `id_pedidocargo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `id_perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `perfil_modulo`
--
ALTER TABLE `perfil_modulo`
  MODIFY `id_perfilmodulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=279;

--
-- AUTO_INCREMENT de la tabla `personal`
--
ALTER TABLE `personal`
  MODIFY `id_personal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1429;

--
-- AUTO_INCREMENT de la tabla `personalsalida`
--
ALTER TABLE `personalsalida`
  MODIFY `IdPersonal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `proceso`
--
ALTER TABLE `proceso`
  MODIFY `IdProceso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `IdProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1794;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `IdProveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `requerimiento`
--
ALTER TABLE `requerimiento`
  MODIFY `IdRequerimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT de la tabla `responsable`
--
ALTER TABLE `responsable`
  MODIFY `id_responsable` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `salida`
--
ALTER TABLE `salida`
  MODIFY `IdSalida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `stockprod`
--
ALTER TABLE `stockprod`
  MODIFY `IdStockProd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2083;

--
-- AUTO_INCREMENT de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  MODIFY `IdSucursal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `tarjetamovimiento`
--
ALTER TABLE `tarjetamovimiento`
  MODIFY `IdTarjetaMov` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2350;

--
-- AUTO_INCREMENT de la tabla `tarjetaproducto`
--
ALTER TABLE `tarjetaproducto`
  MODIFY `IdTarjetaProd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `tipodocumento`
--
ALTER TABLE `tipodocumento`
  MODIFY `IdTipoDocumento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipoextornar`
--
ALTER TABLE `tipoextornar`
  MODIFY `IdTipoExtornar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipoingreso`
--
ALTER TABLE `tipoingreso`
  MODIFY `IdTipoIngreso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `ubigeo`
--
ALTER TABLE `ubigeo`
  MODIFY `id_ubigeo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1835;

--
-- AUTO_INCREMENT de la tabla `uma`
--
ALTER TABLE `uma`
  MODIFY `IdUma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ccalidad`
--
ALTER TABLE `ccalidad`
  ADD CONSTRAINT `ccalidad_ibfk_1` FOREIGN KEY (`IdComprarepliegue`) REFERENCES `comprarepliegue` (`IdComprarepliegue`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `clase`
--
ALTER TABLE `clase`
  ADD CONSTRAINT `clase_ibfk_1` FOREIGN KEY (`IdFamilia`) REFERENCES `familia` (`IdFamilia`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`IdSucursal`) REFERENCES `sucursal` (`IdSucursal`) ON UPDATE CASCADE,
  ADD CONSTRAINT `compra_ibfk_2` FOREIGN KEY (`IdProveedor`) REFERENCES `proveedor` (`IdProveedor`) ON UPDATE CASCADE,
  ADD CONSTRAINT `compra_ibfk_3` FOREIGN KEY (`IdTipoDocumento`) REFERENCES `tipodocumento` (`IdTipoDocumento`) ON UPDATE CASCADE,
  ADD CONSTRAINT `compra_ibfk_4` FOREIGN KEY (`IdProceso`) REFERENCES `proceso` (`IdProceso`) ON UPDATE CASCADE,
  ADD CONSTRAINT `compra_ibfk_5` FOREIGN KEY (`IdTipoIngreso`) REFERENCES `tipoingreso` (`IdTipoIngreso`);

--
-- Filtros para la tabla `comprarepliegue`
--
ALTER TABLE `comprarepliegue`
  ADD CONSTRAINT `comprarepliegue_ibfk_1` FOREIGN KEY (`IdSucursal`) REFERENCES `sucursal` (`IdSucursal`) ON UPDATE CASCADE,
  ADD CONSTRAINT `comprarepliegue_ibfk_2` FOREIGN KEY (`IdProveedor`) REFERENCES `proveedor` (`IdProveedor`) ON UPDATE CASCADE,
  ADD CONSTRAINT `comprarepliegue_ibfk_3` FOREIGN KEY (`IdTipoDocumento`) REFERENCES `tipodocumento` (`IdTipoDocumento`) ON UPDATE CASCADE,
  ADD CONSTRAINT `comprarepliegue_ibfk_4` FOREIGN KEY (`IdProceso`) REFERENCES `proceso` (`IdProceso`) ON UPDATE CASCADE,
  ADD CONSTRAINT `comprarepliegue_ibfk_5` FOREIGN KEY (`IdTipoIngreso`) REFERENCES `tipoingreso` (`IdTipoIngreso`);

--
-- Filtros para la tabla `detalleccalidad`
--
ALTER TABLE `detalleccalidad`
  ADD CONSTRAINT `detalleccalidad_ibfk_1` FOREIGN KEY (`IdCcalidad`) REFERENCES `ccalidad` (`IdCcalidad`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `detallecompra`
--
ALTER TABLE `detallecompra`
  ADD CONSTRAINT `detallecompra_ibfk_1` FOREIGN KEY (`IdCompra`) REFERENCES `compra` (`IdCompra`) ON UPDATE CASCADE,
  ADD CONSTRAINT `detallecompra_ibfk_3` FOREIGN KEY (`IdTarjetaMov`) REFERENCES `tarjetamovimiento` (`IdTarjetaMov`) ON UPDATE CASCADE,
  ADD CONSTRAINT `detallecompra_ibfk_4` FOREIGN KEY (`IdProducto`) REFERENCES `producto` (`IdProducto`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `detallecomprarepliegue`
--
ALTER TABLE `detallecomprarepliegue`
  ADD CONSTRAINT `detallecomprarepliegue_ibfk_1` FOREIGN KEY (`IdProducto`) REFERENCES `producto` (`IdProducto`) ON UPDATE CASCADE,
  ADD CONSTRAINT `detallecomprarepliegue_ibfk_2` FOREIGN KEY (`IdComprarepliegue`) REFERENCES `comprarepliegue` (`IdComprarepliegue`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalleformato`
--
ALTER TABLE `detalleformato`
  ADD CONSTRAINT `detalleformato_ibfk_1` FOREIGN KEY (`IdFormato`) REFERENCES `formato` (`IdFormato`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `detallerequerimiento`
--
ALTER TABLE `detallerequerimiento`
  ADD CONSTRAINT `detallerequerimiento_ibfk_1` FOREIGN KEY (`IdRequerimiento`) REFERENCES `requerimiento` (`IdRequerimiento`) ON UPDATE CASCADE,
  ADD CONSTRAINT `detallerequerimiento_ibfk_2` FOREIGN KEY (`IdProducto`) REFERENCES `producto` (`IdProducto`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `detallesalida`
--
ALTER TABLE `detallesalida`
  ADD CONSTRAINT `detallesalida_ibfk_1` FOREIGN KEY (`IdProducto`) REFERENCES `producto` (`IdProducto`) ON UPDATE CASCADE,
  ADD CONSTRAINT `detallesalida_ibfk_2` FOREIGN KEY (`IdSalida`) REFERENCES `salida` (`IdSalida`) ON UPDATE CASCADE,
  ADD CONSTRAINT `detallesalida_ibfk_3` FOREIGN KEY (`IdTarjetaMov`) REFERENCES `tarjetamovimiento` (`IdTarjetaMov`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `extornar`
--
ALTER TABLE `extornar`
  ADD CONSTRAINT `extornar_ibfk_1` FOREIGN KEY (`IdTipoExtornar`) REFERENCES `tipoextornar` (`IdTipoExtornar`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `personalsalida`
--
ALTER TABLE `personalsalida`
  ADD CONSTRAINT `personalsalida_ibfk_1` FOREIGN KEY (`IdCentroConsumo`) REFERENCES `centroconsumo` (`IdCentroConsumo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `personalsalida_ibfk_2` FOREIGN KEY (`id_cargo`) REFERENCES `cargo` (`id_cargo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`IdUma`) REFERENCES `uma` (`IdUma`) ON UPDATE CASCADE,
  ADD CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`IdClase`) REFERENCES `clase` (`IdClase`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `requerimiento`
--
ALTER TABLE `requerimiento`
  ADD CONSTRAINT `requerimiento_ibfk_1` FOREIGN KEY (`IdFase`) REFERENCES `fase` (`IdFase`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `salida`
--
ALTER TABLE `salida`
  ADD CONSTRAINT `salida_ibfk_1` FOREIGN KEY (`IdSucursal`) REFERENCES `sucursal` (`IdSucursal`) ON UPDATE CASCADE,
  ADD CONSTRAINT `salida_ibfk_2` FOREIGN KEY (`IdProceso`) REFERENCES `proceso` (`IdProceso`) ON UPDATE CASCADE,
  ADD CONSTRAINT `salida_ibfk_3` FOREIGN KEY (`IdCentroConsumo`) REFERENCES `centroconsumo` (`IdCentroConsumo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `salida_ibfk_4` FOREIGN KEY (`IdPersonalRec`) REFERENCES `personalsalida` (`IdPersonal`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `stockprod`
--
ALTER TABLE `stockprod`
  ADD CONSTRAINT `stockprod_ibfk_1` FOREIGN KEY (`IdProducto`) REFERENCES `producto` (`IdProducto`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tarjetamovimiento`
--
ALTER TABLE `tarjetamovimiento`
  ADD CONSTRAINT `tarjetamovimiento_ibfk_1` FOREIGN KEY (`IdProducto`) REFERENCES `producto` (`IdProducto`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tarjetaproducto`
--
ALTER TABLE `tarjetaproducto`
  ADD CONSTRAINT `tarjetaproducto_ibfk_2` FOREIGN KEY (`IdEstado`) REFERENCES `estadoprod` (`IdEstado`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
