-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-08-2019 a las 07:56:45
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
-- Estructura de tabla para la tabla `cursoprofesores`
--

CREATE TABLE `cursoprofesores` (
  `id_cursoprofesor` int(11) NOT NULL,
  `id_profesor` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cursoprofesores`
--

INSERT INTO `cursoprofesores` (`id_cursoprofesor`, `id_profesor`, `id_curso`) VALUES
(1, 17, 1),
(2, 17, 6),
(3, 3, 1),
(4, 3, 3),
(5, 3, 4),
(6, 3, 8),
(7, 3, 5),
(8, 16, 1),
(9, 16, 6),
(10, 16, 2),
(11, 16, 7),
(12, 16, 3),
(13, 16, 4),
(14, 16, 8),
(15, 16, 5),
(16, 16, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `id_curso` int(11) NOT NULL,
  `nombre_curso` varchar(60) NOT NULL,
  `grado_curso` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id_curso`, `nombre_curso`, `grado_curso`) VALUES
(1, 'Álgebra I', 'PRIMERO'),
(2, 'Álgebra II', 'SEGUNDO'),
(3, 'Matemática III', 'TERCERO'),
(4, 'Otro curso', 'TERCERO'),
(5, 'curso de quinto', 'QUINTO'),
(6, 'otro mas', 'PRIMERO'),
(7, 'alguno más', 'TERCERO'),
(8, 'uno de cuarto', 'CUARTO'),
(9, 'mate', 'QUINTO');

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
(1, 'ARMANDO', 'HINOJOSA CCAMA', 1, '1992-12-28'),
(2, 'VANESSA', 'QUISPE QUISPE', 0, '1990-01-01'),
(3, 'FEDERICO', 'TORRES CASTILLO', 1, '1985-05-05'),
(13, 'RODRIGO', 'CASTILLO CASTILLO', 0, '2017-07-05'),
(14, 'JUAN CARLOS', 'HINOJOSA CCAMA', 1, '2019-08-02'),
(15, 'MARCO ANTONIO', 'HINOJOSA OLAVE', 1, '2006-05-03'),
(16, 'TITO', 'FERNANDEZ LUQUE', 1, '1987-09-10'),
(17, 'ANA MARIA', 'CUADROS CUADROS', 0, '1989-09-25'),
(18, 'ANA SANTANA', 'QUISPE QUISPE', 0, '2013-09-28'),
(19, 'ANA CLOTILDE', 'XYAASD ASDAS', 0, '2005-10-05'),
(20, 'ASJDH JA', 'ALSñF NASKJN', 1, '2020-02-02'),
(21, 'PEPE LUIS', 'APELOSADS NSDN', 1, '2012-06-03');

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

--
-- Volcado de datos para la tabla `matriculas`
--

INSERT INTO `matriculas` (`id_matricula`, `id_alumno`, `grado_matricula`, `fecha`) VALUES
(5, 13, 'PRIMERO', '2019-08-30'),
(6, 14, 'PRIMERO', '2019-08-30'),
(7, 15, 'QUINTO', '2019-08-30'),
(8, 21, 'SEGUNDO', '2019-08-31');

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
  `segundo_trimestre` int(2) DEFAULT NULL,
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

--
-- Volcado de datos para la tabla `profesoresasignados`
--

INSERT INTO `profesoresasignados` (`id_profesorasignado`, `id_profesor`, `grado_profesor`, `fecha`) VALUES
(2, 16, 'PRIMERO', '2019-08-02'),
(3, 17, 'TERCERO', '2019-08-30'),
(4, 18, 'PRIMERO', '2019-08-30'),
(5, 19, 'TERCERO', '2019-08-30'),
(6, 20, 'QUINTO', '2019-08-30');

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
(1, 'armando', '$2y$10$/htUh75KedZTeeD9hsHBEulUk/gULsDl8xuMSd2/5lBpUMs/yFlpO', 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJleHAiOjE1NjcyOTcxNzIsImF1ZCI6IjQ5ZDQ2NWVhOTAxZTUyMzQ1YTYxMmY1ZjAxMzRiNGJmNjBiZTM2MTUiLCJkYXRhIjp7ImlkIjoiMSIsInVzZXJuYW1lIjoiYXJtYW5kbyIsIm5vbWJyZXMiOiIiLCJhcGVsbGlkb3MiOiIiLCJzZXhvIjoiIiwicm9sZSI6IjEifX0.4ArzVJb_xXUz-iILZbFGjKFOGTZf5TPjC7Q0U0TWYcM'),
(2, 'padre', '$2y$10$/htUh75KedZTeeD9hsHBEulUk/gULsDl8xuMSd2/5lBpUMs/yFlpO', 3, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJleHAiOjE1NjcyOTQ5NzMsImF1ZCI6IjQ5ZDQ2NWVhOTAxZTUyMzQ1YTYxMmY1ZjAxMzRiNGJmNjBiZTM2MTUiLCJkYXRhIjp7ImlkIjoiMiIsInVzZXJuYW1lIjoicGFkcmUiLCJub21icmVzIjoiIiwiYXBlbGxpZG9zIjoiIiwic2V4byI6IiIsInJvbGUiOiIzIn19.3O5jzYAWC4AeXpbbUvfvRkEtgo1PgZrhNGQ2voLmxJ8'),
(3, 'profesor', '$2y$10$/htUh75KedZTeeD9hsHBEulUk/gULsDl8xuMSd2/5lBpUMs/yFlpO', 2, '--'),
(13, 'rodrcas', '$2y$10$Xz6NqlERBklseFM8pTGFSuKU5f0jkyxnxTZHFh2eEm6KjJm.XDD/K', 3, '--'),
(14, 'juanhin', '$2y$10$HdtqS7AlRvqPb8poIVHrju/SPmdjuc6U.d6dUnbaNC3MmHRPumAJu', 3, '--'),
(15, 'marchin', '$2y$10$eHDBcpGCKF8oHyYms7B50ukvgAIm2wPbKq0YlMTma8hRZy86TRvS6', 3, '--'),
(16, 'titofer', '$2y$10$.CYfDHPFH63ovwVDTg10J.0.Grd.Z.4QjmacMpreNDAV6UMXyBM2m', 2, '--'),
(17, 'ana cua', '$2y$10$cjYFa77U6MmGNLNXhAOMT.kZvttvTpLef.FF3hDanRwBuP8tUo6Ay', 2, '--'),
(18, 'ana qui', '$2y$10$BM6.UR/hPE6vhaTjEnocAeHV9DfG94pZ9mAqAPAumX0wnsUwgScVS', 2, '--'),
(19, 'anazxya', '$2y$10$PzH0uLKlJWXFGaW1mMDAZuyNIMOxQUWKlcLp3gckhMAjWk6X5C5uG', 2, '--'),
(20, 'asjdals', '$2y$10$NKtJGFtEfjgSyNajdk1tfeQh7AB36QIyofIs1BrLKQXIAYd9Q6J8S', 2, '--'),
(21, 'pepeape', '$2y$10$bezi.T7/6XUkdVHldWmVVeuHHnMzOrODpnEMjH2f.EJOvwQydsXPa', 3, '--');

--
-- Índices para tablas volcadas
--

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
-- AUTO_INCREMENT de la tabla `cursoprofesores`
--
ALTER TABLE `cursoprofesores`
  MODIFY `id_cursoprofesor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `matriculas`
--
ALTER TABLE `matriculas`
  MODIFY `id_matricula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `id_profesorasignado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

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
