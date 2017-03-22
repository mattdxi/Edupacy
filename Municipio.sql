-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 22-03-2017 a las 19:39:20
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `Municipio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita`
--

CREATE TABLE `cita` (
  `id_cita` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `id_tramites` int(11) NOT NULL,
  `nombres` varchar(50) DEFAULT NULL,
  `apellidos` varchar(30) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `estado` int(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cita`
--

INSERT INTO `cita` (`id_cita`, `fecha`, `hora`, `id_tramites`, `nombres`, `apellidos`, `telefono`, `estado`) VALUES
(49, '2017-03-22', '11:00:00', 1, 'Miguel Atocha', 'TzabTah', '9837003641', 1),
(50, '2017-03-23', '09:00:00', 1, 'dsad', 'dsad', '9843324765', 1),
(52, '2017-03-24', '09:30:00', 1, 'uhbytv', 'rttrf', '1234567898', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `id_depa` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`id_depa`, `nombre`, `id_usuario`) VALUES
(3, 'actas de nacimientos', 2),
(4, 'curps', 4),
(5, 'divorcios', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Req_tramite`
--

CREATE TABLE `Req_tramite` (
  `id_tramite` int(11) NOT NULL,
  `Descripcion` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Req_tramite`
--

INSERT INTO `Req_tramite` (`id_tramite`, `Descripcion`) VALUES
(1, 'Original del certificado de nacimiento (nacido vivo) o constancia de nacimiento, expedido por el sector salud'),
(1, 'Cartilla de vacunación'),
(1, 'Original y copia del acta de nacimiento de ambos padres (actualizadas)'),
(1, 'Original y copia del acta de matrimonio civil (opcional)');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tramites`
--

CREATE TABLE `tramites` (
  `id` int(11) NOT NULL,
  `especificacion` varchar(100) NOT NULL,
  `tramite` varchar(150) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  `id_departamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tramites`
--

INSERT INTO `tramites` (`id`, `especificacion`, `tramite`, `estado`, `id_departamento`) VALUES
(1, 'actas de nacimiento >0 años <18 años', 'Registro de Nacimiento', 1, 3),
(2, 'actas de nacimiento >18 años < 50 años', 'Registro de Nacimiento', 0, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `rfc` varchar(13) NOT NULL,
  `password` varchar(20) NOT NULL,
  `tipo` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `rfc`, `password`, `tipo`) VALUES
(2, 'miguel', 'TATM960510SK2', 'miguel', 0),
(4, 'atocha', 'TATM960510SK3', 'atocha', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cita`
--
ALTER TABLE `cita`
  ADD PRIMARY KEY (`id_cita`),
  ADD KEY `id_tramites` (`id_tramites`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`id_depa`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `Req_tramite`
--
ALTER TABLE `Req_tramite`
  ADD KEY `id_tramite` (`id_tramite`);

--
-- Indices de la tabla `tramites`
--
ALTER TABLE `tramites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_departamento` (`id_departamento`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cita`
--
ALTER TABLE `cita`
  MODIFY `id_cita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `id_depa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `tramites`
--
ALTER TABLE `tramites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cita`
--
ALTER TABLE `cita`
  ADD CONSTRAINT `cita_ibfk_1` FOREIGN KEY (`id_tramites`) REFERENCES `tramites` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD CONSTRAINT `departamento_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `Req_tramite`
--
ALTER TABLE `Req_tramite`
  ADD CONSTRAINT `req_tramite_ibfk_1` FOREIGN KEY (`id_tramite`) REFERENCES `tramites` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
