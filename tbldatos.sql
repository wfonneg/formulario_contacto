-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 12-03-2021 a las 22:04:17
-- Versión del servidor: 5.7.14
-- Versión de PHP: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `base_proimpo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbldatos`
--

CREATE TABLE `tbldatos` (
  `id` int(11) NOT NULL,
  `nombres` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellidos` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cedula` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `direccion` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `barrio` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ciudad` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `pais` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbldatos`
--

INSERT INTO `tbldatos` (`id`, `nombres`, `apellidos`, `cedula`, `telefono`, `direccion`, `barrio`, `ciudad`, `pais`) VALUES
(741, 'Antonella', 'Fonnegra', '3444', '54545', 'Calle 34', 'Porvenir', 'Cali', 'Colombia');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbldatos`
--
ALTER TABLE `tbldatos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbldatos`
--
ALTER TABLE `tbldatos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=748;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
