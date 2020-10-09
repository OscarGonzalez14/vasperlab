-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-10-2020 a las 20:35:17
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `laboratorios`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_item_orden`
--

CREATE TABLE `detalle_item_orden` (
  `id_det_item` int(11) NOT NULL,
  `examen` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `fecha` varchar(25) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `id_paciente` varchar(10) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `categoria` varchar(125) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `numero_orden` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `estado` varchar(2) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_orden`
--

CREATE TABLE `detalle_orden` (
  `id_detalle_orden` int(11) NOT NULL,
  `empresa` varchar(100) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `numero_orden` varchar(25) DEFAULT NULL,
  `fecha` varchar(25) DEFAULT NULL,
  `estado` varchar(2) NOT NULL,
  `tipo_orden` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `examen_heces`
--

CREATE TABLE `examen_heces` (
  `id_examen_heces` int(11) NOT NULL,
  `numero_orden` varchar(25) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `color` varchar(25) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `consistencia` varchar(25) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `mucus` varchar(25) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `restos_aliment` varchar(40) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `macroscopicos` varchar(40) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `microscopicos` varchar(40) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `hematies` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `leucocitos` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `activos` varchar(100) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `quistes` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `metazoarios` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `protozoarios` varchar(25) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `observaciones` varchar(150) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `id_paciente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `examen_orina`
--

CREATE TABLE `examen_orina` (
  `id_examen_orina` int(11) NOT NULL,
  `numero_orden` varchar(25) NOT NULL,
  `color` varchar(15) DEFAULT NULL,
  `olor` varchar(15) DEFAULT NULL,
  `aspecto` varchar(25) DEFAULT NULL,
  `densidad` varchar(10) DEFAULT NULL,
  `est_leuco` varchar(15) DEFAULT NULL,
  `ph` varchar(6) DEFAULT NULL,
  `proteinas` varchar(20) DEFAULT NULL,
  `glucosa` varchar(20) DEFAULT NULL,
  `cetonas` varchar(20) DEFAULT NULL,
  `urobigilogeno` varchar(20) DEFAULT NULL,
  `bilirrubina` varchar(20) DEFAULT NULL,
  `sangre_oculta` varchar(20) DEFAULT NULL,
  `cilindros` varchar(25) DEFAULT NULL,
  `leucocitos` varchar(25) DEFAULT NULL,
  `hematies` varchar(25) DEFAULT NULL,
  `cel_epiteliales` varchar(50) DEFAULT NULL,
  `filamentos_muco` varchar(50) DEFAULT NULL,
  `bacterias` varchar(25) DEFAULT NULL,
  `cristales` varchar(25) DEFAULT NULL,
  `observaciones` varchar(150) DEFAULT NULL,
  `id_paciente` int(11) DEFAULT NULL,
  `nitritos_orina` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `examen_orina`
--

INSERT INTO `examen_orina` (`id_examen_orina`, `numero_orden`, `color`, `olor`, `aspecto`, `densidad`, `est_leuco`, `ph`, `proteinas`, `glucosa`, `cetonas`, `urobigilogeno`, `bilirrubina`, `sangre_oculta`, `cilindros`, `leucocitos`, `hematies`, `cel_epiteliales`, `filamentos_muco`, `bacterias`, `cristales`, `observaciones`, `id_paciente`, `nitritos_orina`) VALUES
(57, '8', ',KDSL', 'KSDJKJKS', 'KSAHKA', '', '', '', 'Negativo', '', '', '', '', '', '', '', '', '', '', '', '', '', 116, ''),
(58, '21-08-2020-1', 'COLOR 1', 'COLO3', 'COLO4', '', '', '', 'Negativo', '', '', '', '', '', '', '', '', '', '', '', '', '', 117, ''),
(59, '21-08-2020-4', 'amarillo', 'suigeneris', 'limpio', '1.005', '10-25 leu/ul', '6', 'NEGATIVO', 'NEGATIVO', 'NEGATIVO', 'NEGATIVO', 'NEGATIVO', 'NEGATIVO', 'NEGATIVO', '0-2 X CAMPO', 'NO SE OBSERVAN', 'ESCAMOSAS MODERADA CANTIDAD', 'NEGATIVO', 'NO SE OBSERVAN', 'NO SE OBSERVAN', '', 120, 'NEGATIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `heces`
--

CREATE TABLE `heces` (
  `id_heces` int(11) NOT NULL,
  `numero_orden` varchar(25) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `color` varchar(25) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `consistencia` varchar(40) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `mucus` varchar(40) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `restos` varchar(40) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `macroscopicos` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `microscopicos` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `hematies` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `leucocitos` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `activos` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `quistes` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `metazoarios` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `protozoarios` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `observaciones` varchar(125) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `id_paciente` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `heces`
--

INSERT INTO `heces` (`id_heces`, `numero_orden`, `color`, `consistencia`, `mucus`, `restos`, `macroscopicos`, `microscopicos`, `hematies`, `leucocitos`, `activos`, `quistes`, `metazoarios`, `protozoarios`, `observaciones`, `id_paciente`) VALUES
(33, '8', 'COLOR1', 'COLOR2', 'COLOR 3', '', '', '', '', '', '', '', '', '', '', '116'),
(34, '21-08-2020-1', ',DS.', 'JSLL', 'OSCAR', 'NSND', '', '', '', '', '', '', '', '', '', '117'),
(35, '21-08-2020-4', 'CAFE', 'PASTOSA', 'NEGATIVO', '', 'ESCASOS', 'ESCASOS', 'NO SE OBSERVAN', 'NO SE OBSERVAN', 'ENTAMOEBA COLI +', 'ENTAMOEBA COLI +', 'NO SE OBSERVAN', '', 'SANGRE OCULTA:  NEGATIVA', '120'),
(36, '21-08-2020-4', 'CAFE', 'PASTOSA', 'NEGATIVO', '', 'ESCASOS', 'ESCASOS', 'NO SE OBSERVAN', 'NO SE OBSERVAN', 'ENTAMOEBA COLI +', 'ENTAMOEBA COLI +', 'NO SE OBSERVAN', '', 'SANGRE OCULTA:  NEGATIVA', '120'),
(37, '21-08-2020-4', 'f', '', 'dd', '', 'dd', '', '', '', '', 'd', '', '', '', '120');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes_o`
--

CREATE TABLE `pacientes_o` (
  `id_paciente` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `edad` varchar(5) DEFAULT NULL,
  `cod_emp` varchar(25) DEFAULT NULL,
  `genero` varchar(25) DEFAULT NULL,
  `empresa` varchar(50) DEFAULT NULL,
  `departamento` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_vasper`
--

CREATE TABLE `usuarios_vasper` (
  `id_usuario` int(11) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fecha_ingreso` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios_vasper`
--

INSERT INTO `usuarios_vasper` (`id_usuario`, `nombres`, `telefono`, `correo`, `direccion`, `usuario`, `password`, `fecha_ingreso`) VALUES
(19, 'Andres Vaquez', '00', '--', 'ss', 'andvas', 'andvas20', '00'),
(20, 'Indufoam', '00', '---', 'ss', 'indufoam', 'indufoam20', '00'),
(21, 'oscar', '0000', '-----', 'ss', 'oscar', '12345', '0000');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `detalle_item_orden`
--
ALTER TABLE `detalle_item_orden`
  ADD PRIMARY KEY (`id_det_item`);

--
-- Indices de la tabla `detalle_orden`
--
ALTER TABLE `detalle_orden`
  ADD PRIMARY KEY (`id_detalle_orden`),
  ADD KEY `id_paciente` (`id_paciente`);

--
-- Indices de la tabla `examen_heces`
--
ALTER TABLE `examen_heces`
  ADD PRIMARY KEY (`id_examen_heces`),
  ADD KEY `id_paciente` (`id_paciente`);

--
-- Indices de la tabla `examen_orina`
--
ALTER TABLE `examen_orina`
  ADD PRIMARY KEY (`id_examen_orina`),
  ADD KEY `id_paciente` (`id_paciente`);

--
-- Indices de la tabla `heces`
--
ALTER TABLE `heces`
  ADD PRIMARY KEY (`id_heces`);

--
-- Indices de la tabla `pacientes_o`
--
ALTER TABLE `pacientes_o`
  ADD PRIMARY KEY (`id_paciente`);

--
-- Indices de la tabla `usuarios_vasper`
--
ALTER TABLE `usuarios_vasper`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `detalle_item_orden`
--
ALTER TABLE `detalle_item_orden`
  MODIFY `id_det_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;

--
-- AUTO_INCREMENT de la tabla `detalle_orden`
--
ALTER TABLE `detalle_orden`
  MODIFY `id_detalle_orden` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT de la tabla `examen_heces`
--
ALTER TABLE `examen_heces`
  MODIFY `id_examen_heces` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `examen_orina`
--
ALTER TABLE `examen_orina`
  MODIFY `id_examen_orina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT de la tabla `heces`
--
ALTER TABLE `heces`
  MODIFY `id_heces` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `pacientes_o`
--
ALTER TABLE `pacientes_o`
  MODIFY `id_paciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=267;

--
-- AUTO_INCREMENT de la tabla `usuarios_vasper`
--
ALTER TABLE `usuarios_vasper`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_orden`
--
ALTER TABLE `detalle_orden`
  ADD CONSTRAINT `detalle_orden_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes_o` (`id_paciente`);

--
-- Filtros para la tabla `examen_heces`
--
ALTER TABLE `examen_heces`
  ADD CONSTRAINT `examen_heces_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes_o` (`id_paciente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
