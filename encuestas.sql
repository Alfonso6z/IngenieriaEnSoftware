-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-11-2018 a las 20:19:05
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `encuestas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuestionarios`
--

CREATE TABLE `cuestionarios` (
  `IDcuestionario` int(11) NOT NULL,
  `cuenombre` varchar(20) NOT NULL,
  `idEstudio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cuestionarios`
--

INSERT INTO `cuestionarios` (`IDcuestionario`, `cuenombre`, `idEstudio`) VALUES
(1, 'Partidos politicos', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudios`
--

CREATE TABLE `estudios` (
  `idEstudio` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `descripcion` varchar(200) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `estudios`
--

INSERT INTO `estudios` (`idEstudio`, `nombre`, `descripcion`) VALUES
(1, 'Politica', 'Se desea conocer la opinion publica acerca de los partidos politicos.'),
(2, 'Deportes', 'Se desea conocer las actividades físicas de los jóvenes'),
(3, 'Arte', 'Qué tanto conocimiento tiene la población en general');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `idLogin` int(11) NOT NULL,
  `user` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `password` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `apellido` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `email` varchar(25) COLLATE latin1_spanish_ci NOT NULL,
  `rol` varchar(20) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`idLogin`, `user`, `password`, `apellido`, `email`, `rol`) VALUES
(1, 'Alfosno', 'e10adc3949ba59abbe56e057f20f883e', 'González Zempoalteca', 'agzdn666@outlook.es', 'AdminSistema'),
(2, 'Maribel', '916a913f131c52615470330a144861f4', 'Garcia', 'marigb040593@gmail.com', 'Analista'),
(3, 'unedgaro', '202cb962ac59075b964b07152d234b70', 'corrria', 'abc@hotmail.com', 'Encuestador'),
(4, 'Eliseo', 'e10adc3949ba59abbe56e057f20f883e', 'Matrinez', 'eliseo@gmail.com', 'AdminEncuesta'),
(5, 'Marisol', 'e10adc3949ba59abbe56e057f20f883e', 'Valverde', 'hplmarisol20@gmail.com', 'AdminEncuesta'),
(6, 'Jose', 'e10adc3949ba59abbe56e057f20f883e', 'Ortega', 'jose@gmail.com', 'Encuestador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reactivos`
--

CREATE TABLE `reactivos` (
  `idReactivo` int(11) NOT NULL,
  `pregunta` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `IDcuestionario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `reactivos`
--

INSERT INTO `reactivos` (`idReactivo`, `pregunta`, `IDcuestionario`) VALUES
(1, '¿Cual es el partido politico de su preferencia?', 1),
(2, '¿Votaste en las elecciones pasadas?', 1),
(3, '¿Cual seria el partido politico que desearia quitar de la plantilla electoral?', 1),
(4, '¿Cuantos partidos politicos existen actualmente en Mexico?', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `idRol` varchar(20) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`idRol`) VALUES
('AdminEncuesta'),
('AdminSistema'),
('Analista'),
('Encuestador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiporeactivo`
--

CREATE TABLE `tiporeactivo` (
  `idTipoReactivo` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cuestionarios`
--
ALTER TABLE `cuestionarios`
  ADD PRIMARY KEY (`IDcuestionario`),
  ADD KEY `idEstudio` (`idEstudio`);

--
-- Indices de la tabla `estudios`
--
ALTER TABLE `estudios`
  ADD PRIMARY KEY (`idEstudio`);

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`idLogin`),
  ADD KEY `rol` (`rol`);

--
-- Indices de la tabla `reactivos`
--
ALTER TABLE `reactivos`
  ADD PRIMARY KEY (`idReactivo`),
  ADD KEY `IDcuestionario` (`IDcuestionario`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idRol`),
  ADD KEY `idRol` (`idRol`);

--
-- Indices de la tabla `tiporeactivo`
--
ALTER TABLE `tiporeactivo`
  ADD PRIMARY KEY (`idTipoReactivo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cuestionarios`
--
ALTER TABLE `cuestionarios`
  MODIFY `IDcuestionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `estudios`
--
ALTER TABLE `estudios`
  MODIFY `idEstudio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `login`
--
ALTER TABLE `login`
  MODIFY `idLogin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `reactivos`
--
ALTER TABLE `reactivos`
  MODIFY `idReactivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tiporeactivo`
--
ALTER TABLE `tiporeactivo`
  MODIFY `idTipoReactivo` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cuestionarios`
--
ALTER TABLE `cuestionarios`
  ADD CONSTRAINT `cuestionarios_ibfk_1` FOREIGN KEY (`idEstudio`) REFERENCES `estudios` (`idEstudio`);

--
-- Filtros para la tabla `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`rol`) REFERENCES `roles` (`idRol`);

--
-- Filtros para la tabla `reactivos`
--
ALTER TABLE `reactivos`
  ADD CONSTRAINT `reactivos_ibfk_1` FOREIGN KEY (`IDcuestionario`) REFERENCES `cuestionarios` (`IDcuestionario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
