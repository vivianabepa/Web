-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-09-2014 a las 06:36:27
-- Versión del servidor: 5.6.20
-- Versión de PHP: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `estudiantes_web`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE IF NOT EXISTS `estudiantes` (
  `Codigo` text COLLATE utf8_spanish_ci NOT NULL,
  `Nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `Apellido` text COLLATE utf8_spanish_ci NOT NULL,
  `Correo` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`Codigo`, `Nombre`, `Apellido`, `Correo`) VALUES
('12112009', 'Andrea', 'Castañeda', 'andrecastan@hotmail.com'),
('12112022', 'Jenniffer', 'González', 'rosanegra2323@gmail.com'),
('12112004', 'Mario David', 'Otalvaro', 'mariootalvaro@gmail.com'),
('12112034', 'Alejandra', 'Soto', 'malala1016@hotmail.com'),
('', '', '', ''),
('', '', '', ''),
('', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE IF NOT EXISTS `notas` (
`IDNota` int(255) NOT NULL,
  `Nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `Porcentaje` int(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`IDNota`, `Nombre`, `Porcentaje`) VALUES
(2, 'Taller1', 20),
(3, 'Taller2', 25),
(4, 'Taller3', 25),
(5, 'Taller4', 30);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas_estudiantes`
--

CREATE TABLE IF NOT EXISTS `notas_estudiantes` (
  `Codigo` text COLLATE utf8_spanish_ci NOT NULL,
  `IDNota` int(255) NOT NULL,
  `Valor_Nota` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `notas_estudiantes`
--

INSERT INTO `notas_estudiantes` (`Codigo`, `IDNota`, `Valor_Nota`) VALUES
('12112009', 2, 5),
('12112022', 2, 5),
('12112004', 2, 4),
('12112022', 3, 4),
('12112009', 4, 5),
('12112022', 4, 3),
('12112004', 4, 1),
('12112009', 3, 5),
('12112004', 3, 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
 ADD PRIMARY KEY (`IDNota`), ADD UNIQUE KEY `IDNota` (`IDNota`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `notas`
--
ALTER TABLE `notas`
MODIFY `IDNota` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
