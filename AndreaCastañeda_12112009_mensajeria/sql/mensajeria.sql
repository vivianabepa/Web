-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-10-2014 a las 04:57:07
-- Versión del servidor: 5.6.20
-- Versión de PHP: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `mensajeria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deslikes`
--

CREATE TABLE IF NOT EXISTS `deslikes` (
`dlikeID` int(255) NOT NULL,
  `dlikeUserID` int(255) NOT NULL,
  `dlikePostID` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favoritos`
--

CREATE TABLE IF NOT EXISTS `favoritos` (
`favID` int(255) NOT NULL,
  `favUserID` int(255) NOT NULL,
  `favPostID` int(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `favoritos`
--

INSERT INTO `favoritos` (`favID`, `favUserID`, `favPostID`) VALUES
(1, 1, 2),
(2, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `likes`
--

CREATE TABLE IF NOT EXISTS `likes` (
`likeID` int(255) NOT NULL,
  `likeUserID` int(255) NOT NULL,
  `likePostID` int(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `likes`
--

INSERT INTO `likes` (`likeID`, `likeUserID`, `likePostID`) VALUES
(7, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones`
--

CREATE TABLE IF NOT EXISTS `publicaciones` (
`postID` int(255) NOT NULL,
  `titulo` text COLLATE utf8_bin NOT NULL,
  `contenido` text COLLATE utf8_bin NOT NULL,
  `postUserID` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `publicaciones`
--

INSERT INTO `publicaciones` (`postID`, `titulo`, `contenido`, `postUserID`) VALUES
(1, 'Post numero 1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '1'),
(2, 'Este es otro post', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est', '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `usuarioID` text COLLATE utf8_bin NOT NULL,
  `Nombre` text COLLATE utf8_bin NOT NULL,
  `contrasena` text COLLATE utf8_bin NOT NULL,
  `Correo` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuarioID`, `Nombre`, `contrasena`, `Correo`) VALUES
('1', 'Andrecastan', '1234', 'andrecastan@hotmail.com'),
('2', 'Lolo', '4321', 'lolo@hotmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `deslikes`
--
ALTER TABLE `deslikes`
 ADD PRIMARY KEY (`dlikeID`);

--
-- Indices de la tabla `favoritos`
--
ALTER TABLE `favoritos`
 ADD PRIMARY KEY (`favID`);

--
-- Indices de la tabla `likes`
--
ALTER TABLE `likes`
 ADD PRIMARY KEY (`likeID`);

--
-- Indices de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
 ADD PRIMARY KEY (`postID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `deslikes`
--
ALTER TABLE `deslikes`
MODIFY `dlikeID` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `favoritos`
--
ALTER TABLE `favoritos`
MODIFY `favID` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `likes`
--
ALTER TABLE `likes`
MODIFY `likeID` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
MODIFY `postID` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
