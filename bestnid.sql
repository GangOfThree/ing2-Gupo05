-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-06-2015 a las 21:09:08
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `bestnid`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
`ID_CAT` int(11) NOT NULL,
  `nombreCat` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`ID_CAT`, `nombreCat`) VALUES
(1, 'Otros'),
(2, 'Electrodomestico'),
(3, 'Electronica'),
(4, 'Inmueble'),
(5, 'Games'),
(6, 'Mueble'),
(7, 'Musica'),
(8, 'Movies'),
(9, 'Ropa'),
(10, 'Servicios'),
(11, 'Vehiculos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oferta`
--

CREATE TABLE IF NOT EXISTS `oferta` (
`ID_OFE` int(11) NOT NULL,
  `Motivo` varchar(300) NOT NULL,
  `user` int(11) NOT NULL,
  `sub` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta`
--

CREATE TABLE IF NOT EXISTS `pregunta` (
`ID_PREG` int(11) NOT NULL,
  `Contenido` varchar(400) NOT NULL,
  `Fecha` date NOT NULL,
  `user` int(11) NOT NULL,
  `sub` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subasta`
--

CREATE TABLE IF NOT EXISTS `subasta` (
`ID_SUB` int(11) NOT NULL,
  `Titulo` varchar(30) NOT NULL,
  `Descripcion` varchar(200) NOT NULL,
  `Fec_init` date NOT NULL,
  `Fec_fin` date NOT NULL,
  `Foto` varchar(100) NOT NULL,
  `Activo` tinyint(1) NOT NULL DEFAULT '1',
  `user` int(11) NOT NULL,
  `cate` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `subasta`
--

INSERT INTO `subasta` (`ID_SUB`, `Titulo`, `Descripcion`, `Fec_init`, `Fec_fin`, `Foto`, `Activo`, `user`, `cate`) VALUES
(20, 'Coche', 'Es rapido', '2015-06-06', '2015-07-06', 'img/AuCQYIzfg-5AI1PrFeRK5BjekEYDYcX0wi0h76IqAQ2E.jpg', 1, 47, 11),
(21, 'Kriptonita', 'piedra', '2015-06-06', '2015-07-02', 'img/kriptonita.jpg', 1, 47, 1),
(22, 'Llama', 'es mansita', '2015-06-06', '2015-07-03', 'img/llama.jpg', 1, 48, 1),
(23, 'Marco', 'es lindo', '2015-06-06', '2015-06-30', 'img/marco.jpg', 1, 48, 6),
(24, 'Silla de computadora', 'Esta nueva', '2015-06-06', '2015-07-06', 'img/silla.jpg', 0, 49, 6),
(25, 'Silla', 'silla de computadora nueva', '2015-06-06', '2015-07-02', 'img/llama.jpg', 1, 49, 2),
(26, 'Silla de computadora', 'una silla', '2015-06-07', '2015-06-30', 'img/silla.jpg', 1, 49, 6),
(27, 'Gato', 'un gato', '2015-06-07', '2015-07-06', 'img/Los-gatos-nos-ignoran-1.jpg', 1, 50, 5),
(28, 'Escoba nueva', 'es linda', '2015-06-07', '2015-07-06', 'img/brm-55.png', 0, 51, 1),
(29, 'Guitarra criolla', 'Como nueva', '2015-06-07', '2015-07-06', 'img/uno-de-los_1365073505643.png', 0, 51, 1),
(30, 'hoal', 'swheder', '2015-06-07', '2015-06-23', 'img/brm-55.png', 0, 51, 5),
(31, 'lalal', 'lalxascw', '2015-06-07', '2015-06-30', 'img/lalalalalal.jpg', 0, 51, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
`ID_USR` int(11) NOT NULL,
  `DNI` int(8) NOT NULL,
  `Nombre` varchar(60) NOT NULL,
  `Apellido` varchar(60) NOT NULL,
  `Fecha_reg` date NOT NULL,
  `Mail` varchar(70) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Nro_tarjeta` int(20) NOT NULL,
  `Admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID_USR`, `DNI`, `Nombre`, `Apellido`, `Fecha_reg`, `Mail`, `Password`, `Nro_tarjeta`, `Admin`) VALUES
(47, 123456, 'Miguel', 'Guerra', '2015-06-06', 'lala@a.com', 'holahola', 12345, 0),
(48, 1234567, 'Cristian', 'Alvarado', '2015-06-06', 'a@a.com', '123456', 124567, 0),
(49, 134324, 'Lucas', 'Cuevas', '2015-06-06', 'lucas@bestnid.com', '123456', 14424132, 0),
(50, 37968423, 'Florencia', 'Barrau', '2015-06-07', 'flpys_31@hotmail.com', '123456', 123456789, 0),
(51, 1234567, 'Mauricio', 'Bracco', '2015-06-07', 'mauricio@hotmail.com', 'mauricio', 1345678, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE IF NOT EXISTS `venta` (
`NRO_VEN` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Motivo` varchar(300) NOT NULL,
  `Monto` double NOT NULL,
  `sub` int(11) NOT NULL,
  `user_ven` int(11) NOT NULL,
  `user_comp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
 ADD PRIMARY KEY (`ID_CAT`);

--
-- Indices de la tabla `oferta`
--
ALTER TABLE `oferta`
 ADD PRIMARY KEY (`ID_OFE`);

--
-- Indices de la tabla `pregunta`
--
ALTER TABLE `pregunta`
 ADD PRIMARY KEY (`ID_PREG`);

--
-- Indices de la tabla `subasta`
--
ALTER TABLE `subasta`
 ADD PRIMARY KEY (`ID_SUB`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`ID_USR`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
 ADD PRIMARY KEY (`NRO_VEN`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
MODIFY `ID_CAT` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `oferta`
--
ALTER TABLE `oferta`
MODIFY `ID_OFE` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pregunta`
--
ALTER TABLE `pregunta`
MODIFY `ID_PREG` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `subasta`
--
ALTER TABLE `subasta`
MODIFY `ID_SUB` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
MODIFY `ID_USR` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
MODIFY `NRO_VEN` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
