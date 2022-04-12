-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-09-2020 a las 01:37:27
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `anecdotario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acudientes`
--

CREATE TABLE `acudientes` (
  `Idacudientes` int(11) NOT NULL,
  `Cedula` int(15) NOT NULL,
  `Nombres` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Apellidos` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Direccion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Telefono` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `E_mail` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acudientesanotaciones`
--

CREATE TABLE `acudientesanotaciones` (
  `Idacudientes` int(11) NOT NULL,
  `Idanotaciones` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anotaciones`
--

CREATE TABLE `anotaciones` (
  `Idanotaciones` int(11) NOT NULL,
  `Codigo` int(10) NOT NULL,
  `Idasignaturas` int(11) NOT NULL,
  `Idestudiantes` int(11) NOT NULL,
  `Idprofesores` int(11) NOT NULL,
  `Idacudientes` int(11) NOT NULL,
  `Tipo_Falta` int(3) NOT NULL,
  `Nombre_Falta` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `Descargos` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Fecha_Anotacion` date NOT NULL,
  `Novedades` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignaturas`
--

CREATE TABLE `asignaturas` (
  `Idasignaturas` int(11) NOT NULL,
  `Codigo` int(10) NOT NULL,
  `Nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `asignaturas`
--

INSERT INTO `asignaturas` (`Idasignaturas`, `Codigo`, `Nombre`) VALUES
(18, 14, 'Religion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `Idestudiantes` int(11) NOT NULL,
  `Codigo` int(10) NOT NULL,
  `Nombres` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Apellidos` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Fecha_Nacimiento` date NOT NULL,
  `Tipo_Sangre` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `Eps` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Grado` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Direccion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Telefono` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `E_mail` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantesanotaciones`
--

CREATE TABLE `estudiantesanotaciones` (
  `Idestudiantes` int(11) NOT NULL,
  `Idanotaciones` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE `profesores` (
  `Idprofesores` int(11) NOT NULL,
  `Cedula` int(15) NOT NULL,
  `Nombres` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Apellidos` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Telefono` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `E_mail` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesoresanotaciones`
--

CREATE TABLE `profesoresanotaciones` (
  `Idprofesores` int(11) NOT NULL,
  `Idanotaciones` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acudientes`
--
ALTER TABLE `acudientes`
  ADD PRIMARY KEY (`Idacudientes`);

--
-- Indices de la tabla `acudientesanotaciones`
--
ALTER TABLE `acudientesanotaciones`
  ADD KEY `Idacudientes` (`Idacudientes`),
  ADD KEY `Idanotaciones` (`Idanotaciones`);

--
-- Indices de la tabla `anotaciones`
--
ALTER TABLE `anotaciones`
  ADD PRIMARY KEY (`Idanotaciones`),
  ADD KEY `Codigo` (`Codigo`),
  ADD KEY `Idasignaturas` (`Idasignaturas`),
  ADD KEY `Idestudiantes` (`Idestudiantes`),
  ADD KEY `Idprofesores` (`Idprofesores`),
  ADD KEY `Idacudientes` (`Idacudientes`);

--
-- Indices de la tabla `asignaturas`
--
ALTER TABLE `asignaturas`
  ADD PRIMARY KEY (`Idasignaturas`);

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`Idestudiantes`);

--
-- Indices de la tabla `estudiantesanotaciones`
--
ALTER TABLE `estudiantesanotaciones`
  ADD KEY `Idestudiantes` (`Idestudiantes`),
  ADD KEY `Idanotaciones` (`Idanotaciones`);

--
-- Indices de la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`Idprofesores`);

--
-- Indices de la tabla `profesoresanotaciones`
--
ALTER TABLE `profesoresanotaciones`
  ADD KEY `Idprofesores` (`Idprofesores`),
  ADD KEY `Idanotaciones` (`Idanotaciones`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acudientes`
--
ALTER TABLE `acudientes`
  MODIFY `Idacudientes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `anotaciones`
--
ALTER TABLE `anotaciones`
  MODIFY `Idanotaciones` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `asignaturas`
--
ALTER TABLE `asignaturas`
  MODIFY `Idasignaturas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  MODIFY `Idestudiantes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `profesores`
--
ALTER TABLE `profesores`
  MODIFY `Idprofesores` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `anotaciones`
--
ALTER TABLE `anotaciones`
  ADD CONSTRAINT `anotaciones_ibfk_1` FOREIGN KEY (`Idasignaturas`) REFERENCES `asignaturas` (`Idasignaturas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `anotaciones_ibfk_2` FOREIGN KEY (`Idestudiantes`) REFERENCES `estudiantes` (`Idestudiantes`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `anotaciones_ibfk_3` FOREIGN KEY (`Idprofesores`) REFERENCES `profesores` (`Idprofesores`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `anotaciones_ibfk_4` FOREIGN KEY (`Idacudientes`) REFERENCES `acudientes` (`Idacudientes`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
