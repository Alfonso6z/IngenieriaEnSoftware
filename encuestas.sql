-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-12-2018 a las 12:38:38
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.10

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
-- Estructura de tabla para la tabla `asignarestudio`
--

CREATE TABLE `asignarestudio` (
  `idLogin` int(11) NOT NULL,
  `idEstudio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuestionarios`
--

CREATE TABLE `cuestionarios` (
  `idCuestionario` int(11) NOT NULL,
  `cuenombre` varchar(20) NOT NULL,
  `idEstudio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(6, 'Jose', 'e10adc3949ba59abbe56e057f20f883e', 'Ortega', 'jose@gmail.com', 'Encuestador'),
(7, 'Chuby', 'e10adc3949ba59abbe56e057f20f883e', 'Cruz', 'chuby@gmail.com', 'Analista');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reactivos`
--

CREATE TABLE `reactivos` (
  `idReactivo` int(11) NOT NULL,
  `pregunta` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `IDcuestionario` int(11) NOT NULL,
  `idTipoReactivo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas`
--

CREATE TABLE `respuestas` (
  `idRespuesta` int(11) NOT NULL,
  `respuesta` varchar(20) NOT NULL,
  `idReactivo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Volcado de datos para la tabla `tiporeactivo`
--

INSERT INTO `tiporeactivo` (`idTipoReactivo`, `nombre`) VALUES
(2, 'Opción múltiple'),
(3, 'Relaciona Columnas');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asignarestudio`
--
ALTER TABLE `asignarestudio`
  ADD KEY `idLogin` (`idLogin`),
  ADD KEY `idEstudio` (`idEstudio`);

--
-- Indices de la tabla `cuestionarios`
--
ALTER TABLE `cuestionarios`
  ADD PRIMARY KEY (`idCuestionario`),
  ADD KEY `idEstudio` (`idEstudio`);

--
-- Indices de la tabla `estudios`
--
ALTER TABLE `estudios`
  ADD PRIMARY KEY (`idEstudio`),
  ADD KEY `idEstudio` (`idEstudio`);

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`idLogin`),
  ADD KEY `rol` (`rol`),
  ADD KEY `rol_2` (`rol`);

--
-- Indices de la tabla `reactivos`
--
ALTER TABLE `reactivos`
  ADD PRIMARY KEY (`idReactivo`),
  ADD KEY `IDcuestionario` (`IDcuestionario`),
  ADD KEY `idTipoReactivo` (`idTipoReactivo`);

--
-- Indices de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD PRIMARY KEY (`idRespuesta`),
  ADD KEY `idReactivo` (`idReactivo`);

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
  ADD PRIMARY KEY (`idTipoReactivo`),
  ADD KEY `idTipoReactivo` (`idTipoReactivo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cuestionarios`
--
ALTER TABLE `cuestionarios`
  MODIFY `idCuestionario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estudios`
--
ALTER TABLE `estudios`
  MODIFY `idEstudio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `login`
--
ALTER TABLE `login`
  MODIFY `idLogin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `reactivos`
--
ALTER TABLE `reactivos`
  MODIFY `idReactivo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  MODIFY `idRespuesta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tiporeactivo`
--
ALTER TABLE `tiporeactivo`
  MODIFY `idTipoReactivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asignarestudio`
--
ALTER TABLE `asignarestudio`
  ADD CONSTRAINT `asignarestudio_ibfk_1` FOREIGN KEY (`idLogin`) REFERENCES `login` (`idLogin`) ON UPDATE CASCADE,
  ADD CONSTRAINT `asignarestudio_ibfk_2` FOREIGN KEY (`idEstudio`) REFERENCES `estudios` (`idEstudio`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `cuestionarios`
--
ALTER TABLE `cuestionarios`
  ADD CONSTRAINT `cuestionarios_ibfk_1` FOREIGN KEY (`idEstudio`) REFERENCES `estudios` (`idEstudio`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`rol`) REFERENCES `roles` (`idRol`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `reactivos`
--
ALTER TABLE `reactivos`
  ADD CONSTRAINT `reactivos_ibfk_1` FOREIGN KEY (`IDcuestionario`) REFERENCES `cuestionarios` (`idCuestionario`) ON UPDATE CASCADE,
  ADD CONSTRAINT `reactivos_ibfk_2` FOREIGN KEY (`idTipoReactivo`) REFERENCES `tiporeactivo` (`idTipoReactivo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD CONSTRAINT `respuestas_ibfk_1` FOREIGN KEY (`idReactivo`) REFERENCES `reactivos` (`idReactivo`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
