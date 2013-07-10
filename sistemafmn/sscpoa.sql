-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 12-03-2012 a las 06:42:00
-- Versión del servidor: 5.5.8
-- Versión de PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `sscpoa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autores`
--

CREATE TABLE IF NOT EXISTS `autores` (
  `id_autor` int(15) NOT NULL AUTO_INCREMENT,
  `nom_autor` text COLLATE utf8_unicode_ci NOT NULL,
  `ape_autor` text COLLATE utf8_unicode_ci NOT NULL,
  `pais_autor` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_autor`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcar la base de datos para la tabla `autores`
--

INSERT INTO `autores` (`id_autor`, `nom_autor`, `ape_autor`, `pais_autor`) VALUES
(2, 'Carlos', 'Mendoza', 'Venezuela');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dependencias`
--

CREATE TABLE IF NOT EXISTS `dependencias` (
  `id_dep` int(15) NOT NULL AUTO_INCREMENT,
  `rif_dep` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `nom_dep` text COLLATE utf8_unicode_ci NOT NULL,
  `dir_dep` longtext COLLATE utf8_unicode_ci NOT NULL,
  `telf_dep` int(11) NOT NULL,
  PRIMARY KEY (`id_dep`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Volcar la base de datos para la tabla `dependencias`
--

INSERT INTO `dependencias` (`id_dep`, `rif_dep`, `nom_dep`, `dir_dep`, `telf_dep`) VALUES
(4, '123456', '', '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id_login` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `contrasena` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_login`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=34 ;

--
-- Volcar la base de datos para la tabla `login`
--

INSERT INTO `login` (`id_login`, `login`, `contrasena`) VALUES
(25, 'gregory', 'gregory'),
(29, 'prueba', 'prueba'),
(31, 'leo', 'leo'),
(33, 'carlos', 'carlos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientos`
--

CREATE TABLE IF NOT EXISTS `movimientos` (
  `id_mov` int(15) NOT NULL AUTO_INCREMENT,
  `id_usu` int(15) NOT NULL,
  `id_dep` int(15) NOT NULL,
  `id_obras` int(15) NOT NULL,
  `solic_mov` text COLLATE utf8_unicode_ci NOT NULL,
  `fec_mov` date NOT NULL,
  PRIMARY KEY (`id_mov`),
  UNIQUE KEY `id_usu` (`id_usu`),
  UNIQUE KEY `id_dep` (`id_dep`),
  UNIQUE KEY `id_obras` (`id_obras`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `movimientos`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `obras`
--

CREATE TABLE IF NOT EXISTS `obras` (
  `id_obra` int(15) NOT NULL AUTO_INCREMENT,
  `id_autor` int(15) NOT NULL,
  `id_premio` int(15) NOT NULL,
  `id_dep` int(15) NOT NULL,
  `nom_obra` text COLLATE utf8_unicode_ci NOT NULL,
  `tip_obra` text COLLATE utf8_unicode_ci NOT NULL,
  `fec_obra` date NOT NULL,
  `dimen_obra` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `colec_obra` text COLLATE utf8_unicode_ci NOT NULL,
  `cond_obra` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_obra`),
  KEY `id_dep` (`id_dep`),
  KEY `id_autor` (`id_autor`),
  KEY `id_premio` (`id_premio`),
  KEY `id_dep_2` (`id_dep`),
  KEY `id_autor_2` (`id_autor`),
  KEY `id_premio_2` (`id_premio`),
  KEY `id_dep_3` (`id_dep`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `obras`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `obrasmov`
--

CREATE TABLE IF NOT EXISTS `obrasmov` (
  `id_movob` int(15) NOT NULL AUTO_INCREMENT,
  `id_mov` int(15) NOT NULL,
  `id_obras` int(15) NOT NULL,
  PRIMARY KEY (`id_movob`),
  KEY `id_mov` (`id_mov`),
  KEY `id_obras` (`id_obras`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `obrasmov`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `premios`
--

CREATE TABLE IF NOT EXISTS `premios` (
  `id_premio` int(15) NOT NULL AUTO_INCREMENT,
  `nom_premio` text COLLATE utf8_unicode_ci NOT NULL,
  `fec_premio` date NOT NULL,
  `event_premio` text COLLATE utf8_unicode_ci NOT NULL,
  `pais_premio` int(30) NOT NULL,
  `ciudad_premio` int(30) NOT NULL,
  PRIMARY KEY (`id_premio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `premios`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT COMMENT 'clave primaria',
  `id_login` int(11) NOT NULL,
  `ci_usu` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `nom_usu` text COLLATE utf8_unicode_ci NOT NULL,
  `ape_usu` text COLLATE utf8_unicode_ci NOT NULL,
  `tip_usu` text COLLATE utf8_unicode_ci NOT NULL,
  `dep_usu` text COLLATE utf8_unicode_ci NOT NULL,
  `cargo_usu` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `id_login` (`id_login`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=36 ;

--
-- Volcar la base de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `id_login`, `ci_usu`, `nom_usu`, `ape_usu`, `tip_usu`, `dep_usu`, `cargo_usu`) VALUES
(27, 25, '13528736', 'Gregory', 'Lozada', 'Administrador', 'registro', 'Jefe de Registro'),
(31, 29, '16474582', 'sasdas', 'asdasd', 'Supervisor', 'registro', 'Jefe de Registro'),
(35, 33, '16474581', 'Carlos', 'Mendoza', 'Administrador', 'registro', 'Jefe de Registro');

--
-- Filtros para las tablas descargadas (dump)
--

--
-- Filtros para la tabla `movimientos`
--
ALTER TABLE `movimientos`
  ADD CONSTRAINT `movimientos_ibfk_1` FOREIGN KEY (`id_usu`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `movimientos_ibfk_2` FOREIGN KEY (`id_dep`) REFERENCES `dependencias` (`id_dep`),
  ADD CONSTRAINT `movimientos_ibfk_3` FOREIGN KEY (`id_obras`) REFERENCES `obras` (`id_obra`);

--
-- Filtros para la tabla `obras`
--
ALTER TABLE `obras`
  ADD CONSTRAINT `obras_ibfk_1` FOREIGN KEY (`id_autor`) REFERENCES `autores` (`id_autor`),
  ADD CONSTRAINT `obras_ibfk_2` FOREIGN KEY (`id_premio`) REFERENCES `premios` (`id_premio`),
  ADD CONSTRAINT `obras_ibfk_3` FOREIGN KEY (`id_dep`) REFERENCES `dependencias` (`id_dep`);

--
-- Filtros para la tabla `obrasmov`
--
ALTER TABLE `obrasmov`
  ADD CONSTRAINT `obrasmov_ibfk_1` FOREIGN KEY (`id_mov`) REFERENCES `movimientos` (`id_mov`),
  ADD CONSTRAINT `obrasmov_ibfk_2` FOREIGN KEY (`id_obras`) REFERENCES `obras` (`id_obra`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_login`) REFERENCES `login` (`id_login`) ON DELETE CASCADE ON UPDATE CASCADE;
