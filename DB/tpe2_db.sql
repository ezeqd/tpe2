-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-11-2019 a las 21:43:10
-- Versión del servidor: 10.1.39-MariaDB
-- Versión de PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tpe2_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE `ciudad` (
  `id_ciudad` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `capacidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`id_ciudad`, `nombre`, `capacidad`) VALUES
(1, 'Tandil', 100000),
(2, 'Necochea', 50000),
(3, 'Azul', 1000),
(4, 'Mar del Plata', 300000),
(5, 'Mendoza', 240000),
(6, 'CABA', 12000),
(8, 'Ayacucho', 17700),
(10, 'd', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `id_comentario` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `comentario` varchar(255) NOT NULL,
  `puntaje` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`id_comentario`, `id_usuario`, `comentario`, `puntaje`) VALUES
(1, 6, 'Prueba', 1),
(2, 6, 'Prueba2', 1),
(3, 6, 'Prueba3', 1),
(4, 6, 'Prueba4', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE `evento` (
  `id_evento` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `fecha` date NOT NULL,
  `organizador` varchar(100) NOT NULL,
  `id_ciudad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `evento`
--

INSERT INTO `evento` (`id_evento`, `nombre`, `fecha`, `organizador`, `id_ciudad`) VALUES
(2, 'Red Hot Chili Peppers', '2020-12-27', 'HTMS', 5),
(8, 'Luciano Pereira', '2020-03-12', 'GRR', 1),
(13, 'El Indio', '2019-09-10', 'HDD', 4),
(14, 'Babasonicos', '2021-03-23', 'QWA', 1),
(15, 'AAA', '2019-11-12', 'fff', 3),
(24, 'EEE', '0000-00-00', '111', 1),
(25, '132', '0000-00-00', '', 1),
(26, '11111', '0000-00-00', '', 1),
(27, '2222', '0000-00-00', '', 1),
(28, '3333', '0000-00-00', '', 1),
(29, 'S', '0000-00-00', '', 1),
(30, 'DD', '0000-00-00', '', 1),
(31, 'DD', '0000-00-00', '', 1),
(32, 'DD', '0000-00-00', '', 1),
(33, 'DD', '0000-00-00', '', 1),
(34, 'DD', '0000-00-00', '', 1),
(35, 'DD', '0000-00-00', '', 1),
(36, '11', '0000-00-00', '', 1),
(37, '11', '0000-00-00', '', 1),
(38, '1112', '0000-00-00', '', 1),
(39, '11', '0000-00-00', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen`
--

CREATE TABLE `imagen` (
  `id_imagen` int(11) NOT NULL,
  `url_imagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `imagen`
--

INSERT INTO `imagen` (`id_imagen`, `url_imagen`) VALUES
(1, 'imagenes/eventos/5dc5c91828353.'),
(2, 'imagenes/eventos/5dc5c96d0b82a.'),
(3, 'imagenes/eventos/5dc5c98d42514.'),
(4, 'imagenes/eventos/5dc5c99a7103d.'),
(5, 'imagenes/eventos/5dc5c9ca15db5.jpg'),
(6, 'imagenes/eventos/5dc5c9dd7032e.jpg'),
(7, 'imagenes/eventos/5dc5c9f2d9171.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `email` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `email`, `password`) VALUES
(1, 'nadie@tpe2.com', '$2y$10$XUbrWPtjwGQwoG8spEtlC.98WSFoqLKmgjOVHuCF9y8fiXWKttv2.'),
(5, 'profe@tpe2.com', '$2y$10$dOP3bFO1IRuRsAJTSd1MO.e9PyNgFjAVcXupckMVE4nS6cwctSexi'),
(6, 'a@tpe2.com', '$2y$10$4Mz0UYp9GS/eBqjlNTC3c.IWCOOPidx8NT1TzfZFDEAaHqkpJOgd6'),
(7, 'b@tpe2.com', '$2y$10$1ghkoLoWIVA9g.cdD/Js0eFA/uHPDN1Mzqv.57N9qSMWlUi6ehjCy');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`id_ciudad`);

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`id_evento`),
  ADD KEY `ciudades` (`id_ciudad`);

--
-- Indices de la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD PRIMARY KEY (`id_imagen`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  MODIFY `id_ciudad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `evento`
--
ALTER TABLE `evento`
  MODIFY `id_evento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `imagen`
--
ALTER TABLE `imagen`
  MODIFY `id_imagen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `evento`
--
ALTER TABLE `evento`
  ADD CONSTRAINT `ciudades` FOREIGN KEY (`id_ciudad`) REFERENCES `ciudad` (`id_ciudad`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
