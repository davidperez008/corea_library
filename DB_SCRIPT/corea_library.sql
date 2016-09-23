-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-09-2016 a las 08:20:32
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
  `PRIMER_NOMBRE` varchar(15) DEFAULT NULL,
  `SEGUNDO_NOMBRE` varchar(15) DEFAULT NULL,
  `PRIMER_APELLIDO` varchar(15) DEFAULT NULL,
  `SEGUNDO_APELLIDO` varchar(15) DEFAULT NULL,
  `DIRECCION` varchar(50) DEFAULT NULL,
  `FECHA` date DEFAULT NULL COMMENT 'Fecha de nacimiento\r\n',
  `SEXO` tinyint(1) DEFAULT NULL,
  `GRADO_CODIGO_GRADO` int(11) NOT NULL,
  `ENCARGADO_ALUMNOS_CODIGO_ENCARGADO` int(11) DEFAULT NULL,
  `DEPARTAMENTO_ID_DEPARTAMENTO` int(11) NOT NULL,
  `MUNICIPIO_ID_MUNICIPIO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`CARNET`, `PRIMER_NOMBRE`, `SEGUNDO_NOMBRE`, `PRIMER_APELLIDO`, `SEGUNDO_APELLIDO`, `DIRECCION`, `FECHA`, `SEXO`, `GRADO_CODIGO_GRADO`, `ENCARGADO_ALUMNOS_CODIGO_ENCARGADO`, `DEPARTAMENTO_ID_DEPARTAMENTO`, `MUNICIPIO_ID_MUNICIPIO`) VALUES
(1, 'DAVID', 'ALEJANDRO', 'PEREZ', 'MORAN', 'xsc', '1993-10-16', 2, 13, 1, 6, 12),
(2, 'Gabriela', 'CRISTINA', 'PEREZ', 'MORAN', 'ds', '2000-05-09', 1, 12, 1, 6, 1),
(3, 'DANGER', '', 'PEREZ', '', '', '2006-11-24', 2, 1, 1, 6, 2),
(10, 'jose', '', 'lopez', 'perez', 'colonia campo verde', '2000-02-01', 2, 12, 1, 6, 9),
(11, 'rosa', 'maria', 'perez', 'anaya', 'colonia guadalupe', '2000-10-01', 1, 5, 2, 6, 12),
(12, 'ana', 'luz', 'valencia', 'cruz', 'ciudad credisa ', '2001-09-09', 1, 11, 6, 6, 12),
(13, 'jaime ', 'antonio', 'gonzalez', 'ochoa', ' villa lourdes', '2001-10-15', 2, 13, 4, 6, 9),
(14, 'alicia', 'nicole', 'castro', 'vega', 'campo verde', '1999-08-12', 1, 11, 7, 6, 9),
(15, 'astrid', 'veraly', 'cuellar', 'jerez', 'colonia guadalupe ', '1996-05-12', 1, 2, 1, 6, 12),
(16, 'juan', 'carlos', 'alvarado', 'alvarado', 'colonia jardines casa#5', '2001-01-13', 2, 12, 2, 6, 13),
(17, 'marcos ', 'noe', 'mendez', 'pereira', 'colonia el milagro', '1999-12-12', 2, 3, 7, 6, 14),
(18, 'martha', 'yanett', 'elias', 'perez', 'colonia abrego', '1998-12-12', 1, 14, 3, 6, 13),
(19, 'valeria', 'alexandra', 'otero', 'perez', 'colonia los alpes', '2000-08-09', 1, 2, 1, 6, 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignatura`
--

CREATE TABLE `asignatura` (
  `CODIGO_ASIGNATURA` int(11) NOT NULL DEFAULT '0',
  `NOMBRE ASIGNATURA` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `asignatura`
--

INSERT INTO `asignatura` (`CODIGO_ASIGNATURA`, `NOMBRE ASIGNATURA`) VALUES
(1, 'matemáticas '),
(2, 'Lenguaje y literatura '),
(3, 'Ciencias naturales '),
(4, 'Estudios sociales '),
(5, 'Ingles '),
(6, 'biología '),
(7, 'química '),
(8, 'física ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autor`
--

CREATE TABLE `autor` (
  `CODIGO_AUTOR` int(11) NOT NULL,
  `NOMBRE_AUTOR` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `autor`
--

INSERT INTO `autor` (`CODIGO_AUTOR`, `NOMBRE_AUTOR`) VALUES
(1, 'Roberto Bolaños '),
(2, 'Victor Amela '),
(3, 'Vladimir Nabokov'),
(4, 'Charles Dickens'),
(5, 'Rosalino vazquez '),
(6, 'Paul Tippens'),
(7, 'Alejandro Dumas '),
(8, 'Aristoteles '),
(9, 'Paulo Coelho '),
(10, 'Isabel Allende  ');

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
(1, 'Ahuachapán'),
(2, 'Santa Ana '),
(3, 'Sonsonate '),
(4, 'Chalatenango'),
(5, 'La Libertad'),
(6, 'San Salvador'),
(7, 'Cuscatlán '),
(8, 'La Paz'),
(9, 'Cabañas'),
(10, 'San Vicente'),
(11, 'Usulután'),
(12, 'San Miguel'),
(13, 'Morazán'),
(14, 'La Unión ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `editorial`
--

CREATE TABLE `editorial` (
  `CODIGO_EDITORIAL` int(11) NOT NULL,
  `NOMBRE_EDITORIAL` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `editorial`
--

INSERT INTO `editorial` (`CODIGO_EDITORIAL`, `NOMBRE_EDITORIAL`) VALUES
(1, 'Santillana'),
(2, 'Ediciones '),
(3, 'ESE'),
(4, 'Patria'),
(6, 'Addison-Wesley'),
(7, 'La ceiba'),
(8, 'Anaya');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejemplar_libro`
--

CREATE TABLE `ejemplar_libro` (
  `ID_EJEMPLAR` int(11) NOT NULL,
  `CODIGO_EJEMPLAR` int(11) DEFAULT NULL,
  `ID_LIBRO` int(11) DEFAULT NULL,
  `TIPO_CUBIERTA` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DESCRIPCION_FISICA` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ejemplar_libro`
--

INSERT INTO `ejemplar_libro` (`ID_EJEMPLAR`, `CODIGO_EJEMPLAR`, `ID_LIBRO`, `TIPO_CUBIERTA`, `DESCRIPCION_FISICA`) VALUES
(1, 1, 1, 'pasta dura', 'edicion 2004'),
(2, 2, 1, 'pasta blanda', '2ª edición, año 2003, paginas 168'),
(3, 3, 3, 'pasta dura', 'año 2000, 3ª edición, paginas 301'),
(4, 4, 4, 'pasta dura', '6ª edición, año 2008, paginas 195'),
(5, 5, 5, 'pasta blanda ', '1ª edición, año 2005, paginas 455'),
(6, 6, 6, 'pasta dura', '2ª edición, año 2000, paginas 130');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `CODIGO_EMPLEADO` int(11) NOT NULL DEFAULT '0',
  `NOMBRE_EMPLEADO` varchar(45) DEFAULT NULL,
  `APELLIDO_EMPLEADO` varchar(45) DEFAULT NULL,
  `USUARIO_CODIGO_USUARIO` int(11) NOT NULL,
  `MUNICIPIO_ID_MUNICIPIO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`CODIGO_EMPLEADO`, `NOMBRE_EMPLEADO`, `APELLIDO_EMPLEADO`, `USUARIO_CODIGO_USUARIO`, `MUNICIPIO_ID_MUNICIPIO`) VALUES
(1, 'carmen rosibel ', 'mejía ', 101, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encargado_alumno`
--

CREATE TABLE `encargado_alumno` (
  `CODIGO_ENCARGADO` int(11) NOT NULL DEFAULT '0',
  `NOMBRES_ENCARGADO` varchar(45) DEFAULT NULL,
  `APELLIDOS_ENCARGADO` varchar(45) DEFAULT NULL,
  `DIRECCION` varchar(45) DEFAULT NULL,
  `TELEFONO` int(11) DEFAULT NULL,
  `PARENTESCO_IDPARENTESCO` int(11) DEFAULT NULL,
  `MUNICIPIO_ID_MUNICIPIO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `encargado_alumno`
--

INSERT INTO `encargado_alumno` (`CODIGO_ENCARGADO`, `NOMBRES_ENCARGADO`, `APELLIDOS_ENCARGADO`, `DIRECCION`, `TELEFONO`, `PARENTESCO_IDPARENTESCO`, `MUNICIPIO_ID_MUNICIPIO`) VALUES
(1, 'jose jeremias ', 'otero perez', 'colonia reparto las arboledas', 61627080, 2, 12),
(2, 'Maria Antonia ', 'Cruz Chavez', 'colonia los ángeles ', 71234576, 1, 5),
(3, 'david antonio', 'perez ramos', 'colonia las arboledas ', 75125468, 5, 12),
(4, 'juan alberto', 'valencia ochoa', 'colonia los alpes ', 78094576, 4, 13),
(5, 'berta jazmin', 'urias zavala', 'colonia campo verde', 78052341, 6, 9),
(6, 'ana maría ', 'lopez duarte', 'colonia palo negro', 76547612, 7, 4),
(7, 'javier noe ', 'castro espinoza ', 'colonia santa teresa ', 61345679, 2, 14),
(8, 'rosa elva ', 'moran rubio', 'colonia villa lourdes ', 77895601, 1, 9);

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
(1, 'kinder '),
(2, 'preparatoria '),
(3, '1ª'),
(4, '2ª'),
(5, '3ª'),
(6, '4ª'),
(7, '5ª'),
(8, '6ª'),
(9, '7ª'),
(10, '8ª'),
(11, '9ª'),
(12, '1ª año de bachiller '),
(13, '2ª año de bachiller'),
(14, '3ª año de bachiller ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro`
--

CREATE TABLE `libro` (
  `CODIGO_LIBRO` int(11) NOT NULL DEFAULT '0',
  `TITULO LIBRO` varchar(45) DEFAULT NULL,
  `UBICACION` varchar(45) DEFAULT NULL,
  `CANTIDAD EN EXISTENCIA` int(11) DEFAULT NULL,
  `AUTOR_CODIGO_AUTOR` int(11) DEFAULT NULL,
  `EDITORIAL_CODIGO_EDITORIAL` int(11) NOT NULL,
  `ASIGNATURA_CODIGO_ASIGNATURA` int(11) NOT NULL,
  `EJEMPLAR_LIBRO_ID_EJEMPLAR` int(11) DEFAULT NULL,
  `TIPO_LIBRO` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `libro`
--

INSERT INTO `libro` (`CODIGO_LIBRO`, `TITULO LIBRO`, `UBICACION`, `CANTIDAD EN EXISTENCIA`, `AUTOR_CODIGO_AUTOR`, `EDITORIAL_CODIGO_EDITORIAL`, `ASIGNATURA_CODIGO_ASIGNATURA`, `EJEMPLAR_LIBRO_ID_EJEMPLAR`, `TIPO_LIBRO`) VALUES
(1, 'matemáticas  ', 'modulo 2', 4, 2, 1, 1, 1, NULL),
(2, 'física ', 'modulo 4', 6, 4, 1, 8, 2, NULL),
(3, 'english', 'modulo 1', 10, 5, 6, 5, 5, NULL),
(4, 'biologia', 'modulo 3', 7, 9, 7, 6, 6, NULL),
(5, 'literatura ', 'modulo 6', 9, 4, 4, 2, 3, NULL),
(6, 'sociales y cívica ', 'modulo 2', 9, 8, 8, 4, 3, NULL);

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
(1, 'turin', 1),
(2, 'Apaneca', 1),
(3, 'Metapan', 2),
(4, 'El congo', 2),
(5, 'Armenia', 3),
(6, 'Izalco', 3),
(7, ' la palma', 4),
(8, 'Comalapa', 4),
(9, 'Colon', 5),
(10, 'santa tecla', 5),
(11, 'Apopa', 6),
(12, 'Soyapango', 6),
(13, 'San marcos ', 6),
(14, 'San martin', 6),
(15, 'Candelaria', 7),
(16, 'Olocuilta', 8),
(17, 'Ilobasco', 9),
(18, 'Verapaz', 10),
(19, 'Berlin', 11),
(20, 'Chinameca', 12),
(21, 'Corinto', 13),
(22, 'Lislique', 14);

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

--
-- Volcado de datos para la tabla `prestamo`
--

INSERT INTO `prestamo` (`ID_PRESTAMO`, `ALUMNO_CARNET`, `FECHA_PRESTAMO`, `FECHA_DEVOLUCION`, `FECHA_DEVUELTO`, `LIBRO_CODIGO_LIBRO`, `EMPLEADO_CODIGO_EMPLEADO`) VALUES
(1, 10, '2016-08-20', '2016-08-23', NULL, 2, 1),
(2, 16, '2016-08-19', '2016-08-22', NULL, 2, 1),
(3, 13, '2016-08-18', '2016-08-21', NULL, 4, 1),
(4, 15, '2016-08-17', '2016-08-20', '2016-08-21', 5, 1),
(5, 16, '2016-08-01', '2016-08-04', '2016-08-03', 5, 1),
(6, 19, '2016-07-19', '2016-07-22', NULL, 6, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `ID_ROL` int(11) NOT NULL,
  `NOMBRE_ROL` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DESCRIPCION_ROL` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`ID_ROL`, `NOMBRE_ROL`, `DESCRIPCION_ROL`) VALUES
(1, 'Administrador', 'La ostia'),
(3, 'SecretarÃ­a', 'Acceso a personal administrativo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_libro`
--

CREATE TABLE `tipo_libro` (
  `ID_TIPO_LIBRO` int(11) NOT NULL,
  `NOMBRE_TIPO_LIBRO` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `CODIGO_USUARIO` int(11) NOT NULL DEFAULT '0',
  `NOMBRE_USUARIO` varchar(45) DEFAULT NULL,
  `CONTRA` varchar(45) NOT NULL,
  `ROL_ID_ROL` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`CODIGO_USUARIO`, `NOMBRE_USUARIO`, `CONTRA`, `ROL_ID_ROL`) VALUES
(101, 'carmen.mejia', '1112', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`CARNET`),
  ADD KEY `fk_ALUMNO_PADRES_ALUMNOS1_idx` (`ENCARGADO_ALUMNOS_CODIGO_ENCARGADO`),
  ADD KEY `fk_GRADO_CODIGO_GRADO_idx` (`GRADO_CODIGO_GRADO`),
  ADD KEY `fk_ALUMNO_MUNICIPIO1_idx` (`MUNICIPIO_ID_MUNICIPIO`),
  ADD KEY `DEPARTAMENTO_ID_DEPARTAMENTO` (`DEPARTAMENTO_ID_DEPARTAMENTO`);

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
  ADD PRIMARY KEY (`ID_EJEMPLAR`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`CODIGO_EMPLEADO`,`USUARIO_CODIGO_USUARIO`,`MUNICIPIO_ID_MUNICIPIO`),
  ADD KEY `CODIGO_USUARIO_idx` (`USUARIO_CODIGO_USUARIO`),
  ADD KEY `fk_EMPLEADO_MUNICIPIO1_idx` (`MUNICIPIO_ID_MUNICIPIO`);

--
-- Indices de la tabla `encargado_alumno`
--
ALTER TABLE `encargado_alumno`
  ADD PRIMARY KEY (`CODIGO_ENCARGADO`),
  ADD KEY `IdParentesco_idx` (`PARENTESCO_IDPARENTESCO`),
  ADD KEY `fk_ENCARGADO_ALUMNO_MUNICIPIO1_idx` (`MUNICIPIO_ID_MUNICIPIO`);

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
  ADD KEY `fk_EJEMPLAR_LIBRO_ID_EJEMPLAR_idx` (`EJEMPLAR_LIBRO_ID_EJEMPLAR`);

--
-- Indices de la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD PRIMARY KEY (`ID_MUNICIPIO`),
  ADD KEY `fk_MUNICIPIO_DEPARTAMENTO1_idx` (`DEPARTAMENTO_ID_DEPARTAMENTO`);

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
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `ID_ROL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tipo_libro`
--
ALTER TABLE `tipo_libro`
  MODIFY `ID_TIPO_LIBRO` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD CONSTRAINT `fk_ALUMNO_MUNICIPIO1` FOREIGN KEY (`MUNICIPIO_ID_MUNICIPIO`) REFERENCES `municipio` (`ID_MUNICIPIO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ALUMNO_PADRES_ALUMNOS1` FOREIGN KEY (`ENCARGADO_ALUMNOS_CODIGO_ENCARGADO`) REFERENCES `encargado_alumno` (`CODIGO_ENCARGADO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_DEPARTAMENTO_ID` FOREIGN KEY (`DEPARTAMENTO_ID_DEPARTAMENTO`) REFERENCES `departamento` (`ID_DEPARTAMENTO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_GRADO_CODIGO_GRADO` FOREIGN KEY (`GRADO_CODIGO_GRADO`) REFERENCES `grado` (`CODIGO_GRADO`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `fk_EMPLEADO_MUNICIPIO1` FOREIGN KEY (`MUNICIPIO_ID_MUNICIPIO`) REFERENCES `municipio` (`ID_MUNICIPIO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_USUARIO_CODIGO_USUARIO` FOREIGN KEY (`USUARIO_CODIGO_USUARIO`) REFERENCES `usuario` (`CODIGO_USUARIO`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `encargado_alumno`
--
ALTER TABLE `encargado_alumno`
  ADD CONSTRAINT `fk_ENCARGADO_ALUMNO_MUNICIPIO1` FOREIGN KEY (`MUNICIPIO_ID_MUNICIPIO`) REFERENCES `municipio` (`ID_MUNICIPIO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_PARENTESCO_ID_PARENTESCO` FOREIGN KEY (`PARENTESCO_IDPARENTESCO`) REFERENCES `parentesco` (`ID_PARENTESCO`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `libro`
--
ALTER TABLE `libro`
  ADD CONSTRAINT `fk_EJEMPLAR_LIBRO_ID_EJEMPLAR_LIBRO` FOREIGN KEY (`EJEMPLAR_LIBRO_ID_EJEMPLAR`) REFERENCES `ejemplar_libro` (`ID_EJEMPLAR`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_LIBROS_ASIGNATURA_LIBRO` FOREIGN KEY (`ASIGNATURA_CODIGO_ASIGNATURA`) REFERENCES `asignatura` (`CODIGO_ASIGNATURA`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_LIBROS_AUTOR_LIBRO` FOREIGN KEY (`AUTOR_CODIGO_AUTOR`) REFERENCES `autor` (`CODIGO_AUTOR`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_LIBROS_EDITORIAL_LIBRO` FOREIGN KEY (`EDITORIAL_CODIGO_EDITORIAL`) REFERENCES `editorial` (`CODIGO_EDITORIAL`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
