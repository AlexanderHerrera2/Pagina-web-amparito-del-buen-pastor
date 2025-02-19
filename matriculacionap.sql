-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:33065
-- Tiempo de generación: 26-11-2024 a las 01:40:59
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `matriculacionap`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto_de_emergencia`
--

CREATE TABLE `contacto_de_emergencia` (
  `idContacto` int(11) NOT NULL,
  `nombreContacto` varchar(100) NOT NULL,
  `relacionContacto` varchar(50) NOT NULL,
  `telefonoContacto` varchar(20) NOT NULL,
  `idEstudiante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `contacto_de_emergencia`
--

INSERT INTO `contacto_de_emergencia` (`idContacto`, `nombreContacto`, `relacionContacto`, `telefonoContacto`, `idEstudiante`) VALUES
(1, 'Maria Flores', 'Madre', '0983072018', 11),
(2, 'Maria Flores', 'Madre', '0983072018', 12),
(3, 'Maria Flores', 'Madre', '0983072018', 14),
(4, 'Maria Flores', 'Madre', '0983072018', 15),
(5, 'Maria Flores', 'Madre', '0983072018', 16),
(6, 'Maria Flores', 'Madre', '0983072018', 17),
(7, 'Maria Flores', 'Madre', '0983072018', 18),
(8, 'Maria Flores', 'Madre', '0983072018', 20),
(9, 'Maria Flores', 'Madre', '0983072018', 21);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `idCurso` int(11) NOT NULL,
  `nombreCurso` varchar(100) NOT NULL,
  `maxEstudiantes` int(11) NOT NULL,
  `estudiantesMatriculados` int(11) DEFAULT 0,
  `cursoDescripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`idCurso`, `nombreCurso`, `maxEstudiantes`, `estudiantesMatriculados`, `cursoDescripcion`) VALUES
(1, 'Inicial 1', 20, 3, 'Aquí comienzan los mas pequeños.'),
(2, 'Inicial 2', 20, 4, 'Inicial 2.'),
(3, 'Preparatoria', 20, 2, 'Preparatoria.'),
(4, 'Segundo', 20, 0, 'Segundo.'),
(5, 'Tercer', 20, 1, 'Tercero.'),
(6, 'Cuarto', 20, 2, 'Cuarto.'),
(7, 'Quinto', 20, 0, 'Quinto.'),
(8, 'Sexto', 20, 0, 'Sexto.'),
(9, 'Septimo', 20, 0, 'Septimo.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `idEstudiante` int(11) NOT NULL,
  `nombresEstudiante` varchar(50) NOT NULL,
  `apellidosEstudiante` varchar(50) NOT NULL,
  `fechaDeNacimiento` date NOT NULL,
  `genero` enum('Masculino','Femenino') NOT NULL,
  `direccionEstudiante` varchar(255) NOT NULL,
  `ciudad` varchar(50) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `códigoPostal` varchar(10) NOT NULL,
  `cedulaEstudiante` varchar(20) NOT NULL,
  `estadoDeMatricula` enum('pendiente','confirmado','rechazado') DEFAULT 'pendiente',
  `creadoEl` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`idEstudiante`, `nombresEstudiante`, `apellidosEstudiante`, `fechaDeNacimiento`, `genero`, `direccionEstudiante`, `ciudad`, `estado`, `códigoPostal`, `cedulaEstudiante`, `estadoDeMatricula`, `creadoEl`) VALUES
(1, 'Kevin', 'Herrera', '2001-08-12', 'Masculino', 'Pifo', 'Quito', 'Pichincha', '170175', '1756122543', 'pendiente', '2024-11-04 23:23:09'),
(2, 'Mini Elias', '', '2024-10-30', 'Masculino', 'Pifo', 'Fransisco de Orellana', 'Pichincha', '170175', '1777777777', 'pendiente', '2024-11-04 23:37:40'),
(4, 'Pepito', 'Elisiano', '2024-10-30', 'Masculino', 'Pifo', 'Fransisco de Orellana', 'Pichincha', '170175', '1748568476', 'pendiente', '2024-11-04 23:42:52'),
(5, 'Maria', 'Elisiano', '2024-10-30', 'Masculino', 'Pifo', 'Fransisco de Orellana', 'Pichincha', '170175', '1748564589', 'pendiente', '2024-11-04 23:44:27'),
(6, 'Julieta', 'Elisiano', '2024-10-30', 'Masculino', 'Pifo', 'Fransisco de Orellana', 'Pichincha', '170175', '1748526479', 'pendiente', '2024-11-04 23:45:38'),
(8, 'Alexander', 'Herrera', '2024-11-01', 'Masculino', 'Pifo', 'Fransisco de Orellana', 'Pichincha', '170175', '1755122543', 'pendiente', '2024-11-05 00:16:50'),
(10, 'Ale', 'Tirado', '2024-11-01', 'Masculino', 'Pifo', 'Fransisco de Orellana', 'Pichincha', '170175', '1756122443', 'pendiente', '2024-11-05 00:20:05'),
(11, 'Lucas', 'Alimania', '2024-11-01', 'Masculino', 'Pifo', 'Quito', 'Pichincha', '170175', '1789455655', 'pendiente', '2024-11-06 21:42:12'),
(12, 'Lucas', 'Alimania', '2024-11-09', 'Masculino', 'Pifo', 'Quito', 'Pichincha', '170175', '178945565K', 'pendiente', '2024-11-06 22:14:11'),
(14, 'Lucas', 'Alimania', '2024-11-01', 'Masculino', 'Pifo', 'Quito', 'Pichincha', '170175', '178945565g', 'pendiente', '2024-11-07 15:03:50'),
(15, 'Lucas', 'Alimania', '2024-11-01', 'Masculino', 'Pifo', 'Quito', 'Pichincha', '170175', '178945565H', 'pendiente', '2024-11-07 15:04:12'),
(16, 'Lucas', 'Alimania', '2024-10-30', 'Masculino', 'Pifo', 'Quito', 'Pichincha', '170175', '1789455654', 'pendiente', '2024-11-07 15:09:24'),
(17, 'Lucas', 'Alimania', '2024-11-03', 'Masculino', 'Pifo', 'Quito', 'Pichincha', '170175', '1789455j54', 'pendiente', '2024-11-07 15:19:33'),
(18, 'Lucas', 'Alimania', '2024-10-31', 'Masculino', 'Pifo', 'Quito', 'Pichincha', '170175', '1789457543', 'pendiente', '2024-11-07 15:25:17'),
(20, 'Lucas', 'Alimania', '2024-10-31', 'Masculino', 'Pifo', 'Quito', 'Pichincha', '170175', '1789457547', 'pendiente', '2024-11-07 15:27:16'),
(21, 'Lucas', 'Alimania', '2024-11-01', 'Masculino', 'Pifo', 'Quito', 'Pichincha', '170175', '1789457544', 'pendiente', '2024-11-07 15:27:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matriculas`
--

CREATE TABLE `matriculas` (
  `idMatricula` int(11) NOT NULL,
  `idEstudiante` int(11) NOT NULL,
  `idCurso` int(11) NOT NULL,
  `fechaMatricula` datetime DEFAULT NULL,
  `estadoMatricula` enum('pendiente','confirmado','rechazado') DEFAULT 'pendiente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `matriculas`
--

INSERT INTO `matriculas` (`idMatricula`, `idEstudiante`, `idCurso`, `fechaMatricula`, `estadoMatricula`) VALUES
(1, 5, 1, '2024-11-04 00:00:00', 'pendiente'),
(2, 6, 1, '2024-11-04 00:00:00', 'pendiente'),
(3, 6, 1, '2024-11-04 00:00:00', 'confirmado'),
(4, 8, 2, '2024-11-04 00:00:00', 'pendiente'),
(5, 10, 2, '2024-11-04 00:00:00', 'confirmado'),
(6, 11, 1, '2024-11-06 00:00:00', 'pendiente'),
(7, 12, 3, '2024-11-06 00:00:00', 'pendiente'),
(8, 14, 2, '2024-11-07 00:00:00', 'pendiente'),
(9, 15, 5, '2024-11-07 00:00:00', 'pendiente'),
(10, 16, 2, '2024-11-07 00:00:00', 'pendiente'),
(11, 17, 3, '2024-11-07 00:00:00', 'pendiente'),
(12, 18, 6, '2024-11-07 00:00:00', 'pendiente'),
(13, 20, 6, '2024-11-07 00:00:00', 'pendiente'),
(14, 21, 1, '2024-11-07 00:00:00', 'pendiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `representante`
--

CREATE TABLE `representante` (
  `idRepresentante` int(11) NOT NULL,
  `nombresRepresentante` varchar(50) NOT NULL,
  `apellidosRepresentante` varchar(50) NOT NULL,
  `correoRepresentante` varchar(100) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `relacionConElEstudiante` varchar(50) NOT NULL,
  `idEstudiante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `representante`
--

INSERT INTO `representante` (`idRepresentante`, `nombresRepresentante`, `apellidosRepresentante`, `correoRepresentante`, `telefono`, `relacionConElEstudiante`, `idEstudiante`) VALUES
(1, 'Elias', 'Elisiano', 'elis@gmail.com', '0987654321', 'Madre', 5),
(2, 'Elias', 'Elisiano', 'elis@gmail.com', '0987654321', 'Madre', 6),
(3, 'Marco', 'Herrera', 'pa@gmail.com', '98349102', 'Madre', 1),
(4, 'Marco', 'Herrera', 'apa@gmail.com', '98349102', 'Madre', 8),
(5, 'Marco', 'Herrera', 'aas@gmail.com', '98349102', 'Padre', 10),
(6, 'Juanito', 'Alimania', 'juanito@gmail.com', '0987654321', 'Padre', 11),
(7, 'Juanito', 'Alimania', 'juanito@gmail.com', '0987654321', 'Padre', 12),
(8, 'Juanito', 'Alimania', 'juanito@gmail.com', '0987654321', 'Padre', 14),
(9, 'Juanito', 'Alimania', 'juanito@gmail.com', '0987654321', 'Padre', 15),
(10, 'Juanito', 'Alimania', 'juanito@gmail.com', '0987654321', 'Padre', 16),
(11, 'Juanito', 'Alimania', 'juanito@gmail.com', '0987654321', 'Padre', 17),
(12, 'Juanito', 'Alimania', 'juanito@gmail.com', '0987654324', 'Padre', 18),
(13, 'Juanito', 'Alimania', 'juanito@gmail.com', '0987654324', 'Padre', 20),
(14, 'Juanito', 'Alimania', 'juanito@gmail.com', '0987654324', 'Padre', 21);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contacto_de_emergencia`
--
ALTER TABLE `contacto_de_emergencia`
  ADD PRIMARY KEY (`idContacto`),
  ADD KEY `idEstudiante` (`idEstudiante`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`idCurso`);

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`idEstudiante`),
  ADD UNIQUE KEY `cedulaEstudiante` (`cedulaEstudiante`);

--
-- Indices de la tabla `matriculas`
--
ALTER TABLE `matriculas`
  ADD PRIMARY KEY (`idMatricula`),
  ADD KEY `idEstudiante` (`idEstudiante`),
  ADD KEY `idCurso` (`idCurso`);

--
-- Indices de la tabla `representante`
--
ALTER TABLE `representante`
  ADD PRIMARY KEY (`idRepresentante`),
  ADD KEY `idEstudiante` (`idEstudiante`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contacto_de_emergencia`
--
ALTER TABLE `contacto_de_emergencia`
  MODIFY `idContacto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `idCurso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  MODIFY `idEstudiante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `matriculas`
--
ALTER TABLE `matriculas`
  MODIFY `idMatricula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `representante`
--
ALTER TABLE `representante`
  MODIFY `idRepresentante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `contacto_de_emergencia`
--
ALTER TABLE `contacto_de_emergencia`
  ADD CONSTRAINT `contacto_de_emergencia_ibfk_1` FOREIGN KEY (`idEstudiante`) REFERENCES `estudiantes` (`idEstudiante`) ON DELETE CASCADE;

--
-- Filtros para la tabla `matriculas`
--
ALTER TABLE `matriculas`
  ADD CONSTRAINT `matriculas_ibfk_1` FOREIGN KEY (`idEstudiante`) REFERENCES `estudiantes` (`idEstudiante`) ON DELETE CASCADE,
  ADD CONSTRAINT `matriculas_ibfk_2` FOREIGN KEY (`idCurso`) REFERENCES `cursos` (`idCurso`) ON DELETE CASCADE;

--
-- Filtros para la tabla `representante`
--
ALTER TABLE `representante`
  ADD CONSTRAINT `representante_ibfk_1` FOREIGN KEY (`idEstudiante`) REFERENCES `estudiantes` (`idEstudiante`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
