-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-10-2016 a las 05:18:49
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `corea_library`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `CARNET` int(11) NOT NULL DEFAULT '0',
  `NOMBRES_ALUMNO` varchar(15) DEFAULT NULL,
  `APELLIDOS_ALUMNO` varchar(15) DEFAULT NULL,
  `DIRECCION` varchar(50) DEFAULT NULL,
  `FECHA` date DEFAULT NULL COMMENT 'Fecha de nacimiento\r\n',
  `SEXO` tinyint(1) DEFAULT NULL,
  `GRADO_CODIGO_GRADO` int(11) NOT NULL,
  `DEPARTAMENTO_ID_DEPARTAMENTO` int(11) NOT NULL,
  `MUNICIPIO_ID_MUNICIPIO` int(11) NOT NULL,
  `NOMBRES_ENCARGADO` varchar(50) DEFAULT NULL,
  `APELLIDOS_ENCARGADO` varchar(200) DEFAULT NULL,
  `TELEFONO` int(11) DEFAULT NULL,
  `GENERO_ENCARGADO` tinyint(1) DEFAULT NULL,
  `ID_PARENTESCO` int(11) DEFAULT NULL,
  `ID_PROFESION` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignatura`
--

CREATE TABLE `asignatura` (
  `CODIGO_ASIGNATURA` int(11) NOT NULL,
  `NOMBRE_ASIGNATURA` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `asignatura`
--

INSERT INTO `asignatura` (`CODIGO_ASIGNATURA`, `NOMBRE_ASIGNATURA`) VALUES
(1, 'MATEMÃTICAS'),
(2, 'Lenguaje y literatura'),
(3, 'Ciencias naturales'),
(4, 'Estudios sociales'),
(5, 'Ingles'),
(6, 'BIOLOGÃA'),
(7, 'QUÃMICA'),
(8, 'FÃSICA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autor`
--

CREATE TABLE `autor` (
  `CODIGO_AUTOR` int(11) NOT NULL,
  `NOMBRE_AUTOR` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conf`
--

CREATE TABLE `conf` (
  `id_conf` int(11) NOT NULL,
  `nom_iinstitucion` varchar(200) DEFAULT NULL,
  `logo` blob
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `ID_DEPARTAMENTO` int(11) NOT NULL,
  `NOMBRE_DEPARTAMENTO` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`ID_DEPARTAMENTO`, `NOMBRE_DEPARTAMENTO`) VALUES
(1, 'AHUACHAPAN'),
(2, 'CABAÑAS'),
(3, 'CHALATENANGO'),
(4, 'CUSCATLAN'),
(5, 'LA LIBERTAD'),
(6, 'LA PAZ'),
(7, 'LA UNION'),
(8, 'MORAZAN'),
(9, 'SAN MIGUEL.'),
(10, 'SAN SALVADOR'),
(11, 'SANTA ANA'),
(12, 'SAN VICENTE'),
(13, 'SONSONATE'),
(14, 'USULUTAN');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `editorial`
--

CREATE TABLE `editorial` (
  `CODIGO_EDITORIAL` int(11) NOT NULL,
  `NOMBRE_EDITORIAL` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejemplar_libro`
--

CREATE TABLE `ejemplar_libro` (
  `ID_EJEMPLAR` int(11) NOT NULL,
  `CODIGO_EJEMPLAR` int(11) DEFAULT NULL,
  `ID_LIBRO` int(11) DEFAULT NULL,
  `DESCRIPCION_FISICA` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` tinyint(1) DEFAULT '0' COMMENT '0: Disponible\r\n1: Prestado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `CODIGO_EMPLEADO` int(11) NOT NULL DEFAULT '0',
  `NOMBRE_EMPLEADO` varchar(45) DEFAULT NULL,
  `APELLIDO_EMPLEADO` varchar(45) DEFAULT NULL,
  `USUARIO_CODIGO_USUARIO` int(11) NOT NULL,
  `MUNICIPIO_ID_MUNICIPIO` int(11) NOT NULL,
  `DEPARTAMENTO_ID_DEPARTAMENTO` int(11) DEFAULT NULL,
  `GENERO` char(2) DEFAULT NULL,
  `ID_PROFESION` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grado`
--

CREATE TABLE `grado` (
  `CODIGO_GRADO` int(11) NOT NULL,
  `DESCRIPCION_GRADO` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `grado`
--

INSERT INTO `grado` (`CODIGO_GRADO`, `DESCRIPCION_GRADO`) VALUES
(1, 'kinder'),
(2, 'preparatoria'),
(3, '1ª'),
(4, '2ª'),
(5, '3ª'),
(6, '4ª'),
(7, '5ª'),
(8, '6ª'),
(9, '7ª'),
(10, '8ª'),
(11, '9ª'),
(12, '1ª año de bachiller'),
(13, '2ª año de bachiller'),
(14, '3ª año de bachiller');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro`
--

CREATE TABLE `libro` (
  `CODIGO_LIBRO` int(11) NOT NULL DEFAULT '0',
  `TITULO LIBRO` varchar(45) DEFAULT NULL,
  `UBICACION` varchar(45) DEFAULT NULL,
  `AUTOR_CODIGO_AUTOR` int(11) DEFAULT NULL,
  `EDITORIAL_CODIGO_EDITORIAL` int(11) NOT NULL,
  `ASIGNATURA_CODIGO_ASIGNATURA` int(11) NOT NULL,
  `EJEMPLAR_LIBRO_ID_EJEMPLAR` int(11) DEFAULT NULL,
  `TIPO_LIBRO` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `nombre_item` varchar(50) DEFAULT NULL,
  `id_parent_item` int(11) DEFAULT NULL,
  `url` varchar(200) DEFAULT NULL,
  `nivel_acceso` int(3) DEFAULT NULL,
  `icono` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`id_menu`, `nombre_item`, `id_parent_item`, `url`, `nivel_acceso`, `icono`) VALUES
(14, 'Realizar Préstamo', 2, 'prestamos/prestar.php', 1, ' '),
(15, 'Registro de Préstamos', 2, 'prestamos/prestamos.php', 1, ' '),
(16, 'Alumnos', 3, 'mantenimientos/principales/alumnos.php', 1, NULL),
(17, 'Empleados', 3, 'mantenimientos/principales/empleados.php', 2, NULL),
(18, 'Libros', 3, 'mantenimientos/principales/libros.php', 1, NULL),
(19, 'Autrores', 3, 'mantenimientos/principales/autores.php', 1, NULL),
(20, 'Usuarios', 3, 'mantenimientos/principales/usuarios.php', 2, NULL),
(21, 'Asignatura', 4, 'mantenimientos/secundarios/asignatura.php', 2, NULL),
(22, 'Editorial', 4, 'mantenimientos/secundarios/editorial_libros.php', 1, NULL),
(23, 'Grado', 4, 'mantenimientos/secundarios/grado.php', 2, NULL),
(24, 'Parentesco', 4, 'mantenimientos/secundarios/parentesco.php', 1, NULL),
(25, 'Rol de Usuario', 4, 'mantenimientos/secundarios/roles.php', 3, NULL),
(26, 'Tipo de Libro', 4, 'mantenimientos/secundarios/tipo_libro.php', 1, NULL),
(27, 'Salir del Sistema', 6, 'logout.php', 1, NULL),
(28, 'Administrar Usuario', 6, 'usuario.php', 1, NULL),
(29, 'Menú', 3, 'mantenimientos/principales/menu.php', 3, NULL),
(30, 'Profesiones', 4, 'mantenimientos/secundarios/profesion.php', 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu_principal`
--

CREATE TABLE `menu_principal` (
  `id_menu_principal` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  `nivel_acceso` int(11) DEFAULT NULL,
  `icono` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `menu_principal`
--

INSERT INTO `menu_principal` (`id_menu_principal`, `nombre`, `url`, `nivel_acceso`, `icono`) VALUES
(1, 'Inicio', 'index.php', 1, 'fa fa-home fa-fw'),
(2, 'Prestamos', '#', 1, 'fa fa-bars fa-fw'),
(3, 'Mantenimientos Principales', '#', 1, 'fa fa-star fa-fw'),
(4, 'Manatenimientos Secundarios', '#', 1, 'fa fa-flag fa-fw'),
(5, 'Configuraciones', 'configuraciones.php', 3, 'fa fa-gears fa-fw'),
(6, 'AdministraciÃ³n de usuario', '#', 1, 'fa fa-user fa-fw');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipio`
--

CREATE TABLE `municipio` (
  `ID_MUNICIPIO` int(11) NOT NULL,
  `NOMBRE_MUNICIPIO` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DEPARTAMENTO_ID_DEPARTAMENTO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `municipio`
--

INSERT INTO `municipio` (`ID_MUNICIPIO`, `NOMBRE_MUNICIPIO`, `DEPARTAMENTO_ID_DEPARTAMENTO`) VALUES
(1, 'AHUACHAPAN', 1),
(2, 'ATIQUIZAYA', 1),
(3, 'SAN FRANCISCO MENEND', 1),
(4, 'TACUBA', 1),
(5, 'CONCEPCION DE ATACO', 1),
(6, 'JUJUTLA', 1),
(7, 'GUAYMANGO', 1),
(8, 'APANECA', 1),
(9, 'SAN PEDRO PUXTLA', 1),
(10, 'SAN LORENZO', 1),
(11, 'TURIN', 1),
(12, 'EL REFUGIO', 1),
(13, 'SENSUNTEPEQUE', 2),
(14, 'ILOBASCO', 2),
(15, 'VICTORIA', 2),
(16, 'SAN ISIDRO', 2),
(17, 'JUTIAPA', 2),
(18, 'TEJUTEPEQUE', 2),
(19, 'DOLORES', 2),
(20, 'CINQUERA', 2),
(21, 'GUACOTECTI', 2),
(22, 'CHALATENANGO', 3),
(23, 'NUEVA CONCEPCION', 3),
(24, 'LA PALMA', 3),
(25, 'TEJUTLA', 3),
(26, 'LA REINA', 3),
(27, 'ARCATAO', 3),
(28, 'SAN IGNACIO', 3),
(29, 'DULCE NOMBRE DE MARI', 3),
(30, 'CITALA', 3),
(31, 'AGUA CALIENTE', 3),
(32, 'CONCEPCION QUEZALTEP', 3),
(33, 'NUEVA TRINIDAD', 3),
(34, 'LAS VUELTAS', 3),
(35, 'COMALAPA', 3),
(36, 'SAN RAFAEL', 3),
(37, 'SAN JOSE LAS FLORES', 3),
(38, 'OJOS DE AGUA', 3),
(39, 'NOMBRE DE JESUS', 3),
(40, 'POTONICO', 3),
(41, 'SAN FRANCISCO MORAZA', 3),
(42, 'SANTA RITA', 3),
(43, 'LA LAGUNA', 3),
(44, 'SAN ISIDRO LABRADOR', 3),
(45, 'SAN ANTONIO DE LA CR', 3),
(46, 'EL PARAISO', 3),
(47, 'SAN MIGUEL DE MERCED', 3),
(48, 'SAN LUIS DEL CARMEN', 3),
(49, 'SAN JOSE CANCASQUE', 3),
(50, 'SAN ANTONIO LOS RANC', 3),
(51, 'EL CARRIZAL', 3),
(52, 'SAN FERNANDO', 3),
(53, 'AZACUALPA', 3),
(54, 'SAN FRANCISCO LEMPA', 3),
(55, 'COJUTEPEQUE', 4),
(56, 'SUCHITOTO', 4),
(57, 'SAN PEDRO PERULAPAN', 4),
(58, 'SAN JOSE GUAYABAL', 4),
(59, 'TENANCINGO', 4),
(60, 'SAN RAFAEL CEDROS', 4),
(61, 'CANDELARIA', 4),
(62, 'EL CARMEN', 4),
(63, 'MONTE SAN JUAN', 4),
(64, 'SAN CRISTOBLA', 4),
(65, 'SANTA CRUZ MICHAPA', 4),
(66, 'SAN BARTOLOME PERULA', 4),
(67, 'SAN RAMON', 4),
(68, 'EL ROSARIO', 4),
(69, 'ORATORIO DE CONCEPCI', 4),
(70, 'SANTA CRUZ ANALQUITO', 4),
(71, 'SANTA TECLA', 5),
(72, 'QUEZALTEPEQUE', 5),
(73, 'CIUDAD ARCE', 5),
(74, 'SAN JUAN OPICO', 5),
(75, 'COLON', 5),
(76, 'PUERTO DE LA LIBERTA', 5),
(77, 'ANTIGUO CUSCATLAN', 5),
(78, 'COMASAGUA', 5),
(79, 'SAN PABLO TACACHICO', 5),
(80, 'JAYAQUE', 5),
(81, 'HUIZUCAR', 5),
(82, 'TEPECOYO', 5),
(83, 'TEOTEPEQUE', 5),
(84, 'CHILTIUPAN', 5),
(85, 'NUEVO CUSCATLAN', 5),
(86, 'TAMANIQUE', 5),
(87, 'SACACOYO', 5),
(88, 'SAN JOSE VILLA NUEVA', 5),
(89, 'ZARAGOZA', 5),
(90, 'TALNIQUE', 5),
(91, 'SAN MATIAS', 5),
(92, 'JICALAPA', 5),
(93, 'ZACATECOLUCA', 6),
(94, 'SANTIAGO NONUALCO', 6),
(95, 'SAN JUAN NONUALCO', 6),
(96, 'SAN PEDRO MASAHUAT', 6),
(97, 'OLOCUILTA', 6),
(98, 'SAN PEDRO NONUALCO', 6),
(99, 'SAN FRANCISCO CHINAM', 6),
(100, 'SAN JUAN TALPA', 6),
(101, 'EL ROSARIO', 6),
(102, 'SAN RAFAEL OBRAJUELO', 6),
(103, 'SANTA MARIA OSTUMA', 6),
(104, 'SAN LUIS TALPA', 6),
(105, 'SAN ANTONIO MASAHUAT', 6),
(106, 'SAN MIGUEL TEPEZONTE', 6),
(107, 'SAN JUAN TEPEZONTES', 6),
(108, 'TAPALHUACA', 6),
(109, 'CUYULTITAN', 6),
(110, 'PARAISO DE OSORIO', 6),
(111, 'SAN EMIGDIO', 6),
(112, 'JERUSALEN', 6),
(113, 'MERCEDES LA CEIBA', 6),
(114, 'SAN LUIS LA HERRADUR', 6),
(115, 'LA UNION', 7),
(116, 'SANTA ROSA DE LIMA', 7),
(117, 'PASAQUINA', 7),
(118, 'SAN ALEJO', 7),
(119, 'ANAMOROS', 7),
(120, 'EL CARMEN', 7),
(121, 'CONCHAGUA', 7),
(122, 'EL SAUCE', 7),
(123, 'LISLIQUE', 7),
(124, 'YUCUAYQUIN', 7),
(125, 'NUEVA ESPARTA', 7),
(126, 'POLOROS', 7),
(127, 'BOLIVAR', 7),
(128, 'CONCEPCION DE ORIENT', 7),
(129, 'INTIPUCA', 7),
(130, 'SAN JOSE LA FUENTE', 7),
(131, 'YAYANTIQUE', 7),
(132, 'MEANGUERA DEL GOLFO', 7),
(133, 'SAN FRANCISCO GOTERA', 8),
(134, 'JOCORO', 8),
(135, 'CORINTO', 8),
(136, 'SOCIEDAD', 8),
(137, 'CACAOPERA', 8),
(138, 'GUATAJIAG?A', 8),
(139, 'EL DIVISADERO', 8),
(140, 'JOCOAITIQUE', 8),
(141, 'OSICALA', 8),
(142, 'CHILANGA', 8),
(143, 'MEANGUERA', 8),
(144, 'TOROLA', 8),
(145, 'SAN SIMON', 8),
(146, 'DELICIAS DE CONCEPCI', 8),
(147, 'JOATECA', 8),
(148, 'ARAMBALA', 8),
(149, 'LOLOTIQUILLO', 8),
(150, 'YAMABAL', 8),
(151, 'YOLOAIQUIN', 8),
(152, 'SAN CARLOS', 8),
(153, 'EL ROSARIO', 8),
(154, 'PERQUIN', 8),
(155, 'SENSEMBRA', 8),
(156, 'GUALOCOCTI', 8),
(157, 'SAN FERNANDO', 8),
(158, 'SAN ISIDRO', 8),
(159, 'SAN MIGUEL', 9),
(160, 'CHINAMECA', 9),
(161, 'EL TRANSITO', 9),
(162, 'CIUDAD BARRIOS', 9),
(163, 'CHIRILAGUA', 9),
(164, 'SESORI', 9),
(165, 'SAN RAFAEL ORIENTE', 9),
(166, 'MONCAGUA', 9),
(167, 'LOLOTIQUE', 9),
(168, 'SAN JORGE', 9),
(169, 'CHAPELTIQUE', 9),
(170, 'SAN GERARDO', 9),
(171, 'CAROLINA', 9),
(172, 'QUELEPA', 9),
(173, 'SAN LUIS DE LA REINA', 9),
(174, 'NUEVO EDEN DE SAN JU', 9),
(175, 'NUEVA GUADALUPE', 9),
(176, 'ULUAZAPA', 9),
(177, 'COMACARAN', 9),
(178, 'SAN ANTONIO DEL MOSC', 9),
(179, 'SAN SALVADOR', 10),
(180, 'CIUDAD DELGADO', 10),
(181, 'MEJICANOS', 10),
(182, 'SOYAPANGO', 10),
(183, 'CUSCATANCINGO', 10),
(184, 'SAN MARCOS', 10),
(185, 'ILOPANGO', 10),
(186, 'NEJAPA', 10),
(187, 'APOPA', 10),
(188, 'SAN MARTIN', 10),
(189, 'PANCHIMALCO', 10),
(190, 'AGUILARES', 10),
(191, 'TONACATEPEQUE', 10),
(192, 'SANTO TOMAS', 10),
(193, 'SANTIAGO TEXACUANGOS', 10),
(194, 'EL PAISNAL', 10),
(195, 'GUAZAPA', 10),
(196, 'AYUTUXTEPEQUE', 10),
(197, 'ROSARIO DE MORA', 10),
(198, 'SANTA ANA', 11),
(199, 'CHALCHUAPA', 11),
(200, 'METAPAN', 11),
(201, 'COATEPEQUE', 11),
(202, 'EL CONGO', 11),
(203, 'TEXISTEPEQUE', 11),
(204, 'CANDELARIA LA FRONTE', 11),
(205, 'SAN SEBASTIAN SALITR', 11),
(206, 'SANTA ROSA GUACHIPIL', 11),
(207, 'SANTIAGO DE LA FRONT', 11),
(208, 'EL PORVENIR', 11),
(209, 'MASAHUAT', 11),
(210, 'SAN ANTONIO PAJONAL', 11),
(211, 'SAN VICENTE', 12),
(212, 'TECOLUCA', 12),
(213, 'SAN SEBASTIAN', 12),
(214, 'APASTEPEQUE', 12),
(215, 'SAN ESTEBAN CATARINA', 12),
(216, 'SAN ILDEFONSO', 12),
(217, 'SANTA CLARA', 12),
(218, 'SAN LORENZO', 12),
(219, 'VERAPAZ', 12),
(220, 'GUADALUPE', 12),
(221, 'SANTO DOMINGO', 12),
(222, 'SAN CAYETANO ISTEPEQ', 12),
(223, 'NUEVO TEPETITAN', 12),
(224, 'SONSONATE', 13),
(225, 'IZALCO', 13),
(226, 'ACAJUTLA', 13),
(227, 'ARMENIA', 13),
(228, 'NAHUIZALCO', 13),
(229, 'JUAYUA', 13),
(230, 'SAN JULIAN', 13),
(231, 'SONZACATE', 13),
(232, 'SAN ANTONIO DEL MONT', 13),
(233, 'NAHULINGO', 13),
(234, 'CUISNAHUAT', 13),
(235, 'SANTA CATARINA MASAH', 13),
(236, 'CALUCO', 13),
(237, 'SANTA ISABEL ISHUATA', 13),
(238, 'SALCOATITAN', 13),
(239, 'SANTO DOMINGO DE GUZ', 13),
(240, 'USULUTAN', 14),
(241, 'JIQUILISCO', 14),
(242, 'BERLIN', 14),
(243, 'SANTIAGO DE MARIA', 14),
(244, 'JUCUAPA', 14),
(245, 'SANTA ELENA', 14),
(246, 'JUCUARAN', 14),
(247, 'SAN AGUSTIN', 14),
(248, 'OZATLAN', 14),
(249, 'ESTANZUELAS', 14),
(250, 'MERCEDES UMA?A', 14),
(251, 'ALEGRIA', 14),
(252, 'CONCEPCION BATRES', 14),
(253, 'SAN FRANCISCO JAVIER', 14),
(254, 'PUERTO EL TRIUNFO', 14),
(255, 'TECAPAN', 14),
(256, 'SAN DIONISIO', 14),
(257, 'EREGUAYQUIN', 14),
(258, 'SANTA MARIA', 14),
(259, 'NUEVA GRANADA', 14),
(260, 'EL TRIUNFO', 14),
(261, 'SAN BUENAVENTURA', 14),
(262, 'CALIFORNIA', 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel_acceso`
--

CREATE TABLE `nivel_acceso` (
  `id_nivel_acceso` int(11) NOT NULL,
  `nombre_nivel` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `nivel_acceso`
--

INSERT INTO `nivel_acceso` (`id_nivel_acceso`, `nombre_nivel`) VALUES
(1, 'EDITOR DE CONTENIDO'),
(2, 'ADMINISTRADOR'),
(3, 'SUPER USUARIO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parentesco`
--

CREATE TABLE `parentesco` (
  `ID_PARENTESCO` int(11) NOT NULL,
  `DESCRIPCION_PARENTESCO` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `parentesco`
--

INSERT INTO `parentesco` (`ID_PARENTESCO`, `DESCRIPCION_PARENTESCO`) VALUES
(1, 'madre'),
(2, 'padre'),
(3, 'abuelo'),
(4, 'tio'),
(5, 'hermano'),
(6, 'tia'),
(7, 'abuela');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamo`
--

CREATE TABLE `prestamo` (
  `ID_PRESTAMO` int(11) NOT NULL,
  `ALUMNO_CARNET` int(11) NOT NULL,
  `FECHA_PRESTAMO` date DEFAULT NULL,
  `FECHA_DEVOLUCION` date NOT NULL,
  `FECHA_DEVUELTO` date DEFAULT NULL,
  `LIBRO_CODIGO_LIBRO` int(11) NOT NULL,
  `EMPLEADO_CODIGO_EMPLEADO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesion`
--

CREATE TABLE `profesion` (
  `ID_PROFESION` int(11) NOT NULL,
  `NOMBRE_PROFESION` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `profesion`
--

INSERT INTO `profesion` (`ID_PROFESION`, `NOMBRE_PROFESION`) VALUES
(2, 'DOCTOR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `ID_ROL` int(11) NOT NULL,
  `NOMBRE_ROL` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DESCRIPCION_ROL` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NIVEL_ACCESSO` int(3) DEFAULT NULL COMMENT 'Los niveles de acceso serán 3:\r\n1: Publicador de contenido\r\n2: Administrador\r\n3: SuperUsuario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`ID_ROL`, `NOMBRE_ROL`, `DESCRIPCION_ROL`, `NIVEL_ACCESSO`) VALUES
(1, 'ADMINISTRADOR', 'ACCESO A PERSONAL ADMINISTRATIVO', 2),
(3, 'SECRETARÃ­A', 'ACCESO A PERSONAL ', 1),
(4, 'ALUMNO', 'ACCESO A ALUMNOS', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_libro`
--

CREATE TABLE `tipo_libro` (
  `ID_TIPO_LIBRO` int(11) NOT NULL,
  `NOMBRE_TIPO_LIBRO` varchar(30) DEFAULT NULL,
  `DIAS_PRESTAMO` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_libro`
--

INSERT INTO `tipo_libro` (`ID_TIPO_LIBRO`, `NOMBRE_TIPO_LIBRO`, `DIAS_PRESTAMO`) VALUES
(1, 'OBRA', NULL),
(2, 'LIBRO DE TEXTO', NULL),
(3, 'AÃ Ã‰', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `CODIGO_USUARIO` int(11) NOT NULL,
  `NOMBRE_USUARIO` varchar(45) DEFAULT NULL,
  `CONTRA` varchar(45) NOT NULL,
  `ROL_ID_ROL` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`CODIGO_USUARIO`, `NOMBRE_USUARIO`, `CONTRA`, `ROL_ID_ROL`) VALUES
(101, 'carmen.mejia', '1112', 1),
(102, 'david.perez', '9776', 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`CARNET`),
  ADD KEY `fk_GRADO_CODIGO_GRADO_idx` (`GRADO_CODIGO_GRADO`),
  ADD KEY `fk_ALUMNO_MUNICIPIO1_idx` (`MUNICIPIO_ID_MUNICIPIO`),
  ADD KEY `DEPARTAMENTO_ID_DEPARTAMENTO` (`DEPARTAMENTO_ID_DEPARTAMENTO`),
  ADD KEY `ID_PARENTESCO` (`ID_PARENTESCO`),
  ADD KEY `ID_PROFESION` (`ID_PROFESION`);

--
-- Indices de la tabla `asignatura`
--
ALTER TABLE `asignatura`
  ADD PRIMARY KEY (`CODIGO_ASIGNATURA`);

--
-- Indices de la tabla `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`CODIGO_AUTOR`);

--
-- Indices de la tabla `conf`
--
ALTER TABLE `conf`
  ADD PRIMARY KEY (`id_conf`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`ID_DEPARTAMENTO`);

--
-- Indices de la tabla `editorial`
--
ALTER TABLE `editorial`
  ADD PRIMARY KEY (`CODIGO_EDITORIAL`);

--
-- Indices de la tabla `ejemplar_libro`
--
ALTER TABLE `ejemplar_libro`
  ADD PRIMARY KEY (`ID_EJEMPLAR`),
  ADD UNIQUE KEY `CODIGO_EJEMPLAR` (`CODIGO_EJEMPLAR`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`CODIGO_EMPLEADO`,`USUARIO_CODIGO_USUARIO`,`MUNICIPIO_ID_MUNICIPIO`),
  ADD KEY `CODIGO_USUARIO_idx` (`USUARIO_CODIGO_USUARIO`),
  ADD KEY `fk_EMPLEADO_MUNICIPIO1_idx` (`MUNICIPIO_ID_MUNICIPIO`),
  ADD KEY `DEPARTAMENTO_ID_DEPARTAMENTO` (`DEPARTAMENTO_ID_DEPARTAMENTO`),
  ADD KEY `ID_PROFESION` (`ID_PROFESION`);

--
-- Indices de la tabla `grado`
--
ALTER TABLE `grado`
  ADD PRIMARY KEY (`CODIGO_GRADO`);

--
-- Indices de la tabla `libro`
--
ALTER TABLE `libro`
  ADD PRIMARY KEY (`CODIGO_LIBRO`),
  ADD KEY `fk_LIBROS_AUTOR_idx` (`AUTOR_CODIGO_AUTOR`),
  ADD KEY `fk_LIBROS_EDITORIAL1_idx` (`EDITORIAL_CODIGO_EDITORIAL`),
  ADD KEY `fk_LIBROS_ASIGNATURA1_idx` (`ASIGNATURA_CODIGO_ASIGNATURA`),
  ADD KEY `fk_EJEMPLAR_LIBRO_ID_EJEMPLAR_idx` (`EJEMPLAR_LIBRO_ID_EJEMPLAR`),
  ADD KEY `tipo_libro_fk` (`TIPO_LIBRO`);

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indices de la tabla `menu_principal`
--
ALTER TABLE `menu_principal`
  ADD PRIMARY KEY (`id_menu_principal`);

--
-- Indices de la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD PRIMARY KEY (`ID_MUNICIPIO`),
  ADD KEY `fk_MUNICIPIO_DEPARTAMENTO1_idx` (`DEPARTAMENTO_ID_DEPARTAMENTO`);

--
-- Indices de la tabla `nivel_acceso`
--
ALTER TABLE `nivel_acceso`
  ADD PRIMARY KEY (`id_nivel_acceso`);

--
-- Indices de la tabla `parentesco`
--
ALTER TABLE `parentesco`
  ADD PRIMARY KEY (`ID_PARENTESCO`);

--
-- Indices de la tabla `prestamo`
--
ALTER TABLE `prestamo`
  ADD PRIMARY KEY (`ID_PRESTAMO`),
  ADD KEY `fk_PRESTAMO_ALUMNO1_idx` (`ALUMNO_CARNET`),
  ADD KEY `fk_PRESTAMO_LIBROS1_idx` (`LIBRO_CODIGO_LIBRO`),
  ADD KEY `fk_PRESTAMO_EMPLEADOS1_idx` (`EMPLEADO_CODIGO_EMPLEADO`);

--
-- Indices de la tabla `profesion`
--
ALTER TABLE `profesion`
  ADD PRIMARY KEY (`ID_PROFESION`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`ID_ROL`);

--
-- Indices de la tabla `tipo_libro`
--
ALTER TABLE `tipo_libro`
  ADD PRIMARY KEY (`ID_TIPO_LIBRO`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`CODIGO_USUARIO`),
  ADD KEY `IdRol_idx` (`ROL_ID_ROL`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asignatura`
--
ALTER TABLE `asignatura`
  MODIFY `CODIGO_ASIGNATURA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `autor`
--
ALTER TABLE `autor`
  MODIFY `CODIGO_AUTOR` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `conf`
--
ALTER TABLE `conf`
  MODIFY `id_conf` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `editorial`
--
ALTER TABLE `editorial`
  MODIFY `CODIGO_EDITORIAL` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `grado`
--
ALTER TABLE `grado`
  MODIFY `CODIGO_GRADO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT de la tabla `menu_principal`
--
ALTER TABLE `menu_principal`
  MODIFY `id_menu_principal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `nivel_acceso`
--
ALTER TABLE `nivel_acceso`
  MODIFY `id_nivel_acceso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `parentesco`
--
ALTER TABLE `parentesco`
  MODIFY `ID_PARENTESCO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `profesion`
--
ALTER TABLE `profesion`
  MODIFY `ID_PROFESION` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `ID_ROL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tipo_libro`
--
ALTER TABLE `tipo_libro`
  MODIFY `ID_TIPO_LIBRO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `CODIGO_USUARIO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD CONSTRAINT `alumno_fk` FOREIGN KEY (`ID_PARENTESCO`) REFERENCES `parentesco` (`ID_PARENTESCO`),
  ADD CONSTRAINT `alumno_fk1` FOREIGN KEY (`ID_PROFESION`) REFERENCES `profesion` (`ID_PROFESION`),
  ADD CONSTRAINT `fk_ALUMNO_MUNICIPIO1` FOREIGN KEY (`MUNICIPIO_ID_MUNICIPIO`) REFERENCES `municipio` (`ID_MUNICIPIO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_DEPARTAMENTO_ID` FOREIGN KEY (`DEPARTAMENTO_ID_DEPARTAMENTO`) REFERENCES `departamento` (`ID_DEPARTAMENTO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `grado_fk` FOREIGN KEY (`GRADO_CODIGO_GRADO`) REFERENCES `grado` (`CODIGO_GRADO`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `empleado_fk` FOREIGN KEY (`DEPARTAMENTO_ID_DEPARTAMENTO`) REFERENCES `departamento` (`ID_DEPARTAMENTO`),
  ADD CONSTRAINT `empleado_fk1` FOREIGN KEY (`ID_PROFESION`) REFERENCES `profesion` (`ID_PROFESION`),
  ADD CONSTRAINT `empleado_fk2` FOREIGN KEY (`USUARIO_CODIGO_USUARIO`) REFERENCES `usuario` (`CODIGO_USUARIO`),
  ADD CONSTRAINT `fk_EMPLEADO_MUNICIPIO1` FOREIGN KEY (`MUNICIPIO_ID_MUNICIPIO`) REFERENCES `municipio` (`ID_MUNICIPIO`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `libro`
--
ALTER TABLE `libro`
  ADD CONSTRAINT `editorial_fk` FOREIGN KEY (`EDITORIAL_CODIGO_EDITORIAL`) REFERENCES `editorial` (`CODIGO_EDITORIAL`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `libro_fk` FOREIGN KEY (`ASIGNATURA_CODIGO_ASIGNATURA`) REFERENCES `asignatura` (`CODIGO_ASIGNATURA`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tipo_libro_fk` FOREIGN KEY (`TIPO_LIBRO`) REFERENCES `tipo_libro` (`ID_TIPO_LIBRO`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD CONSTRAINT `fk_MUNICIPIO_DEPARTAMENTO1` FOREIGN KEY (`DEPARTAMENTO_ID_DEPARTAMENTO`) REFERENCES `departamento` (`ID_DEPARTAMENTO`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `prestamo`
--
ALTER TABLE `prestamo`
  ADD CONSTRAINT `fk_ALUMNO_CARNET` FOREIGN KEY (`ALUMNO_CARNET`) REFERENCES `alumno` (`CARNET`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_EMPLEADO_CODIGO_EMPLEADO` FOREIGN KEY (`EMPLEADO_CODIGO_EMPLEADO`) REFERENCES `empleado` (`CODIGO_EMPLEADO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_LIBRO_CODIGO_LIBRO` FOREIGN KEY (`LIBRO_CODIGO_LIBRO`) REFERENCES `libro` (`CODIGO_LIBRO`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `USUARIO_fk` FOREIGN KEY (`ROL_ID_ROL`) REFERENCES `rol` (`ID_ROL`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
