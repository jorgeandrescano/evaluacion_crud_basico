-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-05-2022 a las 00:35:29
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `crud_evaluacion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ambiente`
--

CREATE TABLE `ambiente` (
  `idAmbiente` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `numeroComputadores` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ambiente`
--

INSERT INTO `ambiente` (`idAmbiente`, `descripcion`, `numeroComputadores`) VALUES
(801, 'Piso 8-1', 20),
(805, 'Piso 8-5', 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `novedad`
--

CREATE TABLE `novedad` (
  `idReporte` int(11) NOT NULL,
  `idAmbiente` int(11) NOT NULL,
  `idTipoNovedad` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `fechaRegistro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `novedad`
--

INSERT INTO `novedad` (`idReporte`, `idAmbiente`, `idTipoNovedad`, `descripcion`, `fechaRegistro`) VALUES
(1, 801, 1, 'Vidrio roto', '2022-05-18 16:43:30'),
(3, 801, 2, 'Sin servicio', '2022-05-18 16:44:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiponovedad`
--

CREATE TABLE `tiponovedad` (
  `idTipoNovedad` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tiponovedad`
--

INSERT INTO `tiponovedad` (`idTipoNovedad`, `nombre`) VALUES
(1, 'Infraestructura'),
(2, 'Internet');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ambiente`
--
ALTER TABLE `ambiente`
  ADD PRIMARY KEY (`idAmbiente`);

--
-- Indices de la tabla `novedad`
--
ALTER TABLE `novedad`
  ADD PRIMARY KEY (`idReporte`),
  ADD KEY `idAmbiente` (`idAmbiente`),
  ADD KEY `idTipoNovedad` (`idTipoNovedad`);

--
-- Indices de la tabla `tiponovedad`
--
ALTER TABLE `tiponovedad`
  ADD PRIMARY KEY (`idTipoNovedad`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ambiente`
--
ALTER TABLE `ambiente`
  MODIFY `idAmbiente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=806;

--
-- AUTO_INCREMENT de la tabla `novedad`
--
ALTER TABLE `novedad`
  MODIFY `idReporte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `novedad`
--
ALTER TABLE `novedad`
  ADD CONSTRAINT `novedad_ibfk_1` FOREIGN KEY (`idAmbiente`) REFERENCES `ambiente` (`idAmbiente`),
  ADD CONSTRAINT `novedad_ibfk_2` FOREIGN KEY (`idTipoNovedad`) REFERENCES `tiponovedad` (`idTipoNovedad`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
