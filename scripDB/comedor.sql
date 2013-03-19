-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-03-2013 a las 17:24:36
-- Versión del servidor: 5.5.27-log
-- Versión de PHP: 5.4.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `comedor`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `escuela`
--

CREATE TABLE IF NOT EXISTS `escuela` (
  `id_escuela` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id_escuela`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `escuela`
--

INSERT INTO `escuela` (`id_escuela`, `nombre`) VALUES
(1, 'Educacion'),
(2, 'Psicologia'),
(3, 'Comunicacion social');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE IF NOT EXISTS `estudiante` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` char(30) NOT NULL,
  `apellido` char(30) NOT NULL,
  `correo_electronico` char(30) NOT NULL,
  `cedula` char(30) NOT NULL,
  `fk_escuela` int(10) DEFAULT NULL,
  `fk_facultad` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cedula` (`cedula`),
  KEY `fk_escuela` (`fk_escuela`),
  KEY `fk_facultad` (`fk_facultad`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`id`, `nombre`, `apellido`, `correo_electronico`, `cedula`, `fk_escuela`, `fk_facultad`) VALUES
(3, '', '', '', '', NULL, NULL),
(4, 'Marisol', 'Deoliveira', 'deoliveiram44@hotmail.com', '16971207', NULL, NULL),
(5, 'Ken', 'MeLoMama', 'asda@ken.com', '8221312331', NULL, NULL),
(6, 'AndrÃ©s', 'SÃ¡nchez', 'andreslaley@msn.com', '18589097', NULL, NULL),
(7, 'Jose', 'Perez', 'joseperez@gmail.com', '1', NULL, NULL),
(24, 'andres', 'sanchez', 'andreslaley@msn.com', '18589096', NULL, NULL),
(28, 'andres', 'sanchez', 'andreslaley@msn.com', '2', NULL, NULL),
(29, 'Carlos', 'Corro', 'carlos@gmial.com', '19465199', NULL, NULL),
(30, 'jose', 'perez', 'ada@wwa.com', '4', NULL, NULL),
(31, 'asda', 'asdas', 'asd@asd.com', '5', NULL, NULL),
(33, 'asdad', 'asda', 'asda@mads.com', '6', NULL, NULL),
(34, 'sadas', 'asdasd', 'akensu@hotmail.com', '12123', NULL, NULL),
(35, 'Jose', 'peresoso', 'peresoso@sadad.com', '3030', NULL, NULL),
(36, 'dasd', 'asdasd', 'asdasda@asd.com', '213123', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facultad`
--

CREATE TABLE IF NOT EXISTS `facultad` (
  `id_facultad` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id_facultad`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `facultad`
--

INSERT INTO `facultad` (`id_facultad`, `nombre`) VALUES
(1, 'Medicina');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajador`
--

CREATE TABLE IF NOT EXISTS `trabajador` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `cedula` char(10) NOT NULL,
  `nombre` char(30) NOT NULL,
  `apellido` char(30) NOT NULL,
  `correo_electronico` varchar(50) DEFAULT NULL,
  `escuela` varchar(50) DEFAULT NULL,
  `facultad` varchar(50) DEFAULT NULL,
  `departamento` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cedula` (`cedula`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `trabajador`
--

INSERT INTO `trabajador` (`id`, `cedula`, `nombre`, `apellido`, `correo_electronico`, `escuela`, `facultad`, `departamento`) VALUES
(1, '6022338', 'Alexandra', 'Vargas', NULL, NULL, NULL, NULL),
(2, '313123', 'asdas', 'asdasd', 'asdasd@asdas.com', NULL, NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
