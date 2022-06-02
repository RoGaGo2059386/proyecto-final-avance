-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-06-2022 a las 00:48:39
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `basededatos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comorbilidad`
--

CREATE TABLE `comorbilidad` (
  `comID` int(11) NOT NULL,
  `cc` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comorbilidad`
--

INSERT INTO `comorbilidad` (`comID`, `cc`, `descripcion`) VALUES
(11, 6565656, 'bbbbbbbbasdas'),
(12, 6565656, 'budufagsf'),
(14, 11111111, 'kkouioklñjñm'),
(15, 6565656, 'wwwwwwww');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historia_clinica`
--

CREATE TABLE `historia_clinica` (
  `cc` int(11) NOT NULL,
  `descripcion` varchar(5000) NOT NULL,
  `grupo_sanguineo` varchar(2) NOT NULL,
  `RH` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `historia_clinica`
--

INSERT INTO `historia_clinica` (`cc`, `descripcion`, `grupo_sanguineo`, `RH`) VALUES
(6565656, 'Dear sir, thank you for this thorough tutorial. It helped me a lot to develop my application which is in PostgreSQL. It is basically the same just with a minor change in the dbcontroller file. Thank you so much for taking your time in doing this :D', 'AB', '-'),
(11111111, 'asdasdasdasdasdasdasdasdasdasdasd', 'B', '-'),
(1113688304, 'Gracias por el tutorial, me ha sido de mucha ayuda.\r\nUna pregunta que ojala alguien la responda, ¿por que cuando hay un único registro este no es visible en la pagina pero si en la base de datos con phpmyadmin? hice la prueba ingresando varios registros para luego borrarlos y dejar solo uno, cuando hago esto ese único registro no es visible en la pagina pero como ya mencioné, si es se puede ver en la base de datos.\r\n\r\n1\r\n\r\n', 'O', '-');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicacion`
--

CREATE TABLE `medicacion` (
  `medID` int(11) NOT NULL,
  `cc` int(11) NOT NULL,
  `descripcion` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `medicacion`
--

INSERT INTO `medicacion` (`medID`, `cc`, `descripcion`) VALUES
(1, 6565656, 'iahsgfbka apisfhaipsufgahsj aksjnfdkjasfhiapusfhbasijpfbhasif'),
(2, 6565656, ':;_ñ'),
(3, 11111111, 'hola,'),
(6, 6565656, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prueba_covid`
--

CREATE TABLE `prueba_covid` (
  `pruebaID` int(11) NOT NULL,
  `cc` int(10) NOT NULL,
  `info_prueba` varchar(10000) NOT NULL,
  `incapacidad` varchar(2) NOT NULL,
  `fecha_prueba` date NOT NULL,
  `fecha_sospecha` date NOT NULL,
  `fecha_notificacion` date NOT NULL,
  `fecha_fin_aislamiento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `prueba_covid`
--

INSERT INTO `prueba_covid` (`pruebaID`, `cc`, `info_prueba`, `incapacidad`, `fecha_prueba`, `fecha_sospecha`, `fecha_notificacion`, `fecha_fin_aislamiento`) VALUES
(2, 2222222, 'sadasdhajsdhpoisah dpasoidjasiod aosijdasijdáoisdj', 'si', '2020-10-23', '2020-09-10', '2020-10-20', '2021-02-02'),
(3, 6565656, 'adihgpiasjdhapiusdhpaiusnn poa sjdaisj. askdjasoidjasó, aspidjasoida; dasldk', 'no', '2021-09-11', '2021-08-30', '0000-00-00', '2021-11-10'),
(4, 6565656, 'kjfbakljhfakjsfñf', '', '2021-10-10', '2021-10-01', '2021-10-20', '2021-12-10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `restriccion`
--

CREATE TABLE `restriccion` (
  `resID` int(11) NOT NULL,
  `cc` int(11) NOT NULL,
  `descripcion` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `restriccion`
--

INSERT INTO `restriccion` (`resID`, `cc`, `descripcion`) VALUES
(1, 11111111, 'no se puede beber alcohol');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajadores`
--

CREATE TABLE `trabajadores` (
  `cc` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `cargo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `trabajadores`
--

INSERT INTO `trabajadores` (`cc`, `nombre`, `cargo`) VALUES
(2222222, 'Fernando', 'Auxiliar'),
(6565656, 'fgfdfgdfg', 'xczxczxc'),
(11111111, 'asdsd', 'zccxzczxc'),
(1113688304, 'Ronaldo Garcia Gonzalez', 'Auxiliar');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comorbilidad`
--
ALTER TABLE `comorbilidad`
  ADD PRIMARY KEY (`comID`,`cc`);

--
-- Indices de la tabla `historia_clinica`
--
ALTER TABLE `historia_clinica`
  ADD PRIMARY KEY (`cc`);

--
-- Indices de la tabla `medicacion`
--
ALTER TABLE `medicacion`
  ADD PRIMARY KEY (`medID`,`cc`),
  ADD KEY `cc` (`cc`);

--
-- Indices de la tabla `prueba_covid`
--
ALTER TABLE `prueba_covid`
  ADD PRIMARY KEY (`pruebaID`,`cc`);

--
-- Indices de la tabla `restriccion`
--
ALTER TABLE `restriccion`
  ADD PRIMARY KEY (`resID`,`cc`),
  ADD KEY `restriccion_ibfk_1` (`cc`);

--
-- Indices de la tabla `trabajadores`
--
ALTER TABLE `trabajadores`
  ADD PRIMARY KEY (`cc`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comorbilidad`
--
ALTER TABLE `comorbilidad`
  MODIFY `comID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `medicacion`
--
ALTER TABLE `medicacion`
  MODIFY `medID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `prueba_covid`
--
ALTER TABLE `prueba_covid`
  MODIFY `pruebaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `restriccion`
--
ALTER TABLE `restriccion`
  MODIFY `resID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `historia_clinica`
--
ALTER TABLE `historia_clinica`
  ADD CONSTRAINT `historia_clinica_ibfk_1` FOREIGN KEY (`cc`) REFERENCES `trabajadores` (`cc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `medicacion`
--
ALTER TABLE `medicacion`
  ADD CONSTRAINT `medicacion_ibfk_1` FOREIGN KEY (`cc`) REFERENCES `historia_clinica` (`cc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `restriccion`
--
ALTER TABLE `restriccion`
  ADD CONSTRAINT `restriccion_ibfk_1` FOREIGN KEY (`cc`) REFERENCES `historia_clinica` (`cc`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
