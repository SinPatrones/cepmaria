-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-09-2019 a las 22:39:02
-- Versión del servidor: 10.1.40-MariaDB
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
-- Base de datos: `mariadb`
--
CREATE DATABASE IF NOT EXISTS `mariadb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `mariadb`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultas`
--

CREATE TABLE `consultas` (
  `id_consulta` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `email` varchar(50) NOT NULL,
  `numero` varchar(15) NOT NULL,
  `mensaje` text NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursoprofesores`
--

CREATE TABLE `cursoprofesores` (
  `id_cursoprofesor` int(11) NOT NULL,
  `id_profesor` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `id_curso` int(11) NOT NULL,
  `nombre_curso` varchar(60) NOT NULL,
  `grado_curso` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datosusuarios`
--

CREATE TABLE `datosusuarios` (
  `id_datosusuario` int(11) NOT NULL,
  `nombres` varchar(45) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `sexo` tinyint(4) NOT NULL,
  `fecha_nacimiento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `datosusuarios`
--

INSERT INTO `datosusuarios` (`id_datosusuario`, `nombres`, `apellidos`, `sexo`, `fecha_nacimiento`) VALUES
(1, 'ADMINISTRADOR', 'APELLIDOS DEL ADMINISTRADOR', 1, '1800-12-31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matriculas`
--

CREATE TABLE `matriculas` (
  `id_matricula` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `grado_matricula` varchar(50) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notasalumnos`
--

CREATE TABLE `notasalumnos` (
  `id_notaalumno` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `id_curso` int(11) DEFAULT NULL,
  `primer_bimestre` int(2) DEFAULT NULL,
  `fecha_primer` date DEFAULT NULL,
  `segundo_bimestre` int(2) DEFAULT NULL,
  `fecha_segundo` date DEFAULT NULL,
  `tercer_bimestre` int(2) DEFAULT NULL,
  `fecha_tercer` date DEFAULT NULL,
  `cuarto_bimestre` int(2) DEFAULT NULL,
  `fecha_cuarto` date DEFAULT NULL,
  `nota_final` int(2) DEFAULT NULL,
  `fecha_final` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

CREATE TABLE `notificaciones` (
  `id_notificacion` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_reportante` int(11) NOT NULL,
  `leido` tinyint(4) NOT NULL,
  `titulo` varchar(60) NOT NULL,
  `mensaje` text NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesoresasignados`
--

CREATE TABLE `profesoresasignados` (
  `id_profesorasignado` int(11) NOT NULL,
  `id_profesor` int(11) NOT NULL,
  `grado_profesor` varchar(50) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `clave` varchar(200) NOT NULL,
  `role` int(1) NOT NULL,
  `token` varchar(400) NOT NULL DEFAULT '--'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `usuario`, `clave`, `role`, `token`) VALUES
(1, 'administrador', '$2y$10$kuK5dSks/SXgg.xOgNCu5ur6FzZHMisRO9gA5ebIscDO9dVx1P.4C', 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJleHAiOjE1Njc0NTY2NjMsImF1ZCI6IjIyMTZlOTE4NjMzYjUwOTk4Y2E5YzEwZDNmZWI5ZWI2OWNmMTg4YTYiLCJkYXRhIjp7ImlkIjoiMSIsInVzZXJuYW1lIjoiYWRtaW5pc3RyYWRvciIsIm5vbWJyZXMiOiIiLCJhcGVsbGlkb3MiOiIiLCJzZXhvIjoiIiwicm9sZSI6IjEifX0.egLLOzsyyM6al4wnXxYPcP3YO-t1RL77hEvx-w5fZME');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`id_consulta`);

--
-- Indices de la tabla `cursoprofesores`
--
ALTER TABLE `cursoprofesores`
  ADD PRIMARY KEY (`id_cursoprofesor`),
  ADD KEY `profesorcurso_idx` (`id_profesor`),
  ADD KEY `cursoasignado_idx` (`id_curso`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id_curso`);

--
-- Indices de la tabla `datosusuarios`
--
ALTER TABLE `datosusuarios`
  ADD PRIMARY KEY (`id_datosusuario`);

--
-- Indices de la tabla `matriculas`
--
ALTER TABLE `matriculas`
  ADD PRIMARY KEY (`id_matricula`),
  ADD KEY `usuariomatricula_idx` (`id_alumno`);

--
-- Indices de la tabla `notasalumnos`
--
ALTER TABLE `notasalumnos`
  ADD PRIMARY KEY (`id_notaalumno`),
  ADD KEY `alumnonota_idx` (`id_alumno`),
  ADD KEY `cursonota_idx` (`id_curso`);

--
-- Indices de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD PRIMARY KEY (`id_notificacion`),
  ADD KEY `reportado_idx` (`id_usuario`),
  ADD KEY `reportante_idx` (`id_reportante`);

--
-- Indices de la tabla `profesoresasignados`
--
ALTER TABLE `profesoresasignados`
  ADD PRIMARY KEY (`id_profesorasignado`),
  ADD KEY `profesorusuario_idx` (`id_profesor`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `usuario_UNIQUE` (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `consultas`
--
ALTER TABLE `consultas`
  MODIFY `id_consulta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cursoprofesores`
--
ALTER TABLE `cursoprofesores`
  MODIFY `id_cursoprofesor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `matriculas`
--
ALTER TABLE `matriculas`
  MODIFY `id_matricula` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `notasalumnos`
--
ALTER TABLE `notasalumnos`
  MODIFY `id_notaalumno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `id_notificacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `profesoresasignados`
--
ALTER TABLE `profesoresasignados`
  MODIFY `id_profesorasignado` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cursoprofesores`
--
ALTER TABLE `cursoprofesores`
  ADD CONSTRAINT `cursoasignadorelacion` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id_curso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `profesorcursorelacion` FOREIGN KEY (`id_profesor`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `datosusuarios`
--
ALTER TABLE `datosusuarios`
  ADD CONSTRAINT `usuarioalumno` FOREIGN KEY (`id_datosusuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
