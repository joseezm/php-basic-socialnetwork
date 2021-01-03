-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 03-07-2018 a las 06:57:07
-- Versión del servidor: 5.5.20
-- Versión de PHP: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `redsocial`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones`
--

CREATE TABLE IF NOT EXISTS `publicaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `contenido` text NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `comentarios` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `publicaciones`
--

INSERT INTO `publicaciones` (`id`, `user`, `fecha`, `contenido`, `imagen`, `comentarios`) VALUES
(1, 1, '2018-07-03 00:23:29', 'estoy haciendo pruebas', 'B03048A19811.jpg', 1),
(2, 1, '2018-07-03 00:23:38', 'estoy probando las cosas', '347F73AF76A5.jpg', 1),
(3, 1, '2018-07-03 00:24:10', 'solo sin imahen', '', 1),
(4, 1, '2018-07-03 00:25:11', 'This Bootstrap tutorial contains hundreds of Bootstrap examples.\r\nWith our online editor, you can edit the code, and click on a button to view the result.', '5490E3899578.jpg', 1),
(5, 1, '2018-07-03 00:47:53', 'This Bootstrap tutorial contains hundreds of Bootstrap examples.\r\nWith our online editor, you can edit the code, and click on a button to view the result.', '3087B358786C.jpg', 1),
(6, 1, '2018-07-03 00:48:22', 'This Bootstrap tutorial contains hundreds of Bootstrap examples.\r\nWith our online editor, you can edit the code, and click on a button to view the result.', '307B7C58D4CD.jpg', 1),
(7, 1, '2018-07-03 00:51:57', 'This Bootstrap tutorial contains hundreds of Bootstrap examples.\r\nWith our online editor, you can edit the code, and click on a button to view the result.', '360222E95C8E.jpg', 1),
(8, 1, '2018-07-03 00:52:29', 'This Bootstrap tutorial contains hundreds of Bootstrap examples.\r\nWith our online editor, you can edit the code, and click on a button to view the result.', '9D9C7FE4B9BD.jpg', 1),
(9, 1, '2018-07-03 00:53:21', 'This Bootstrap tutorial contains hundreds of Bootstrap examples.\r\nWith our online editor, you can edit the code, and click on a button to view the result.', 'FCE691EF786C.jpg', 1),
(10, 1, '2018-07-03 01:00:49', 'hoy dia es un buen dia', '454BEBEA60C8.jpg', 1),
(11, 5, '2018-07-03 01:39:10', 'probando', '', 1),
(12, 5, '2018-07-03 01:39:55', 'probando', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `user` varchar(15) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `edad` int(10) DEFAULT NULL,
  `genero` int(1) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `estado` int(1) NOT NULL,
  `fecha_ing` datetime NOT NULL,
  `avatar` varchar(50) NOT NULL DEFAULT 'default.jpg',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `apellido`, `user`, `password`, `email`, `edad`, `genero`, `telefono`, `estado`, `fecha_ing`, `avatar`) VALUES
(1, 'Jose', 'Zenteno', 'jose', '123', NULL, 10, 0, '987654321', 0, '0000-00-00 00:00:00', 'default.jpg'),
(5, 'Yhann', 'Zenteno', 'yhan', '123', 'pool.zm@gmail.com', NULL, NULL, NULL, 1, '2018-07-03 01:38:41', 'default.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
