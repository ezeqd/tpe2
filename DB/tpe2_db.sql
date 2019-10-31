-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-10-2019 a las 21:28:45
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
(7, 'Rosario', 16000),
(8, 'Ayacucho', 17700),
(9, 'Olavarria', 26000);

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
(14, 'Babasonicos', '2021-03-23', 'QWA', 1);

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
-- Indices de la tabla `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`id_evento`),
  ADD KEY `ciudades` (`id_ciudad`);

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
-- AUTO_INCREMENT de la tabla `evento`
--
ALTER TABLE `evento`
  MODIFY `id_evento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `evento`
--
ALTER TABLE `evento`
  ADD CONSTRAINT `ciudades` FOREIGN KEY (`id_ciudad`) REFERENCES `ciudad` (`id_ciudad`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
