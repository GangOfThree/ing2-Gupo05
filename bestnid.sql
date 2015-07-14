-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-07-2015 a las 20:39:38
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
  `nombreCat` varchar(20) NOT NULL,
  `Activa` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`ID_CAT`, `nombreCat`, `Activa`) VALUES
(1, 'Otros', 1),
(2, 'Electrodomestico', 1),
(3, 'Electronica', 1),
(4, 'Inmueble', 1),
(5, 'Games', 1),
(6, 'Mueble', 1),
(7, 'Musica', 1),
(8, 'Movies', 1),
(9, 'Ropa', 1),
(10, 'Servicios', 1),
(11, 'Vehiculos', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificacion`
--

CREATE TABLE IF NOT EXISTS `notificacion` (
`ID_NTF` int(11) NOT NULL,
  `Origen` varchar(60) NOT NULL,
  `Destino` int(30) NOT NULL,
  `Fecha` date NOT NULL,
  `Hora` time NOT NULL,
  `Mensaje` varchar(600) NOT NULL,
  `Leido` tinyint(4) NOT NULL DEFAULT '0',
  `Borrado` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `notificacion`
--

INSERT INTO `notificacion` (`ID_NTF`, `Origen`, `Destino`, `Fecha`, `Hora`, `Mensaje`, `Leido`, `Borrado`) VALUES
(64, 'Bestnid', 49, '2015-07-14', '18:25:01', 'Elegiste el ganador para tu subasta:"Silla de computadora"<br><u><b>Datos del ganador</b></u><br><b>Nombre: </b>Cristian<br><b>Apellido: </b>Alvarado<br><b>E-mail: </b>a@a.com<br><u><b>Datos de la subasta</b></u><br><b>Monto recaudado: </b>$210', 0, 0),
(65, 'Bestnid', 48, '2015-07-14', '18:25:01', 'Ganaste la subasta:"Silla de computadora"<br><u><b>Datos del vendedor</b></u><br><b>Nombre: </b>Lucas<br><b>Apellido: </b>Cuevas<br><b>E-mail: </b>lucas@bestnid.com<br><u><b>Datos de la subasta</b></u><br><b>Monto a abonar: </b>$300', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oferta`
--

CREATE TABLE IF NOT EXISTS `oferta` (
`ID_OFE` int(11) NOT NULL,
  `Motivo` varchar(300) NOT NULL,
  `Monto` double NOT NULL DEFAULT '1',
  `user` int(11) NOT NULL,
  `sub` int(11) NOT NULL,
  `Fecha` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `oferta`
--

INSERT INTO `oferta` (`ID_OFE`, `Motivo`, `Monto`, `user`, `sub`, `Fecha`) VALUES
(13, 'Lo necesito para mi pc', 100, 48, 33, '2015-06-16'),
(14, 'Lo necesito para mi trabajo', 20000, 48, 20, '2015-07-16'),
(15, 'Se me romppio el mio', 50, 50, 33, '2015-07-17'),
(16, 'Me gusta la patente', 27000, 49, 20, '2015-07-17'),
(18, 'me gusta', 100, 49, 22, '2015-07-22'),
(19, 'Se me romppio el mio peor', 50, 51, 33, '2015-07-28'),
(20, 'Se me romppio el mio mucho peor', 50, 52, 33, '2015-07-28'),
(21, 'lalalala', 50, 53, 33, '2015-07-28'),
(23, 'es muylindoooooo', 7, 48, 27, '2015-07-31'),
(24, 'Me gusta la madera y mi casa es toda de madera, FIN', 2000, 49, 23, '2015-07-13'),
(25, 'Ultimamente no me siento muy comodo en mi silla', 300, 48, 26, '2015-07-13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta`
--

CREATE TABLE IF NOT EXISTS `pregunta` (
`ID_PREG` int(11) NOT NULL,
  `Contenido` varchar(400) NOT NULL,
  `Fecha` date NOT NULL,
  `user` int(11) NOT NULL,
  `sub` int(11) NOT NULL,
  `respuesta` int(11) DEFAULT NULL,
  `eliminado` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pregunta`
--

INSERT INTO `pregunta` (`ID_PREG`, `Contenido`, `Fecha`, `user`, `sub`, `respuesta`, `eliminado`) VALUES
(26, 'En nuevo?', '2015-06-27', 50, 33, 28, 0),
(27, 'Es inalambrico?', '2015-06-27', 51, 33, NULL, 0),
(28, 'Hola!, si es nuevo', '2015-06-27', 49, 33, NULL, 0),
(29, 'Hola es nuevo?', '2015-06-27', 48, 33, NULL, 1),
(30, 'Hola es nuevo??', '2015-06-27', 48, 33, 31, 0),
(31, 'si es nuevo', '2015-06-27', 49, 33, NULL, 0),
(32, 'Hola solo pasaba por aca...', '2015-07-13', 49, 23, NULL, 0);

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
  `cate` int(11) NOT NULL,
  `Cancelado` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `subasta`
--

INSERT INTO `subasta` (`ID_SUB`, `Titulo`, `Descripcion`, `Fec_init`, `Fec_fin`, `Foto`, `Activo`, `user`, `cate`, `Cancelado`) VALUES
(20, 'Coche', 'Es rapido', '2015-06-06', '2015-06-27', 'img/AuCQYIzfg-5AI1PrFeRK5BjekEYDYcX0wi0h76IqAQ2E.jpg', 0, 47, 11, 0),
(21, 'Kriptonita', 'piedra', '2015-06-06', '2015-07-02', 'img/kriptonita.jpg', 0, 47, 1, 0),
(22, 'Llama', ' es mansita', '2015-06-06', '2015-07-03', 'img/llama.jpg', 0, 48, 1, 0),
(23, 'Marco', '    es lindo', '2015-06-06', '2015-07-28', 'img/marco.jpg', 1, 48, 1, 0),
(24, 'Silla de computadora', 'Esta nueva', '2015-06-06', '2015-07-06', 'img/silla.jpg', 0, 49, 6, 1),
(25, 'Llama', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent orci lacus, tincidunt quis porttitor nec, tempus malesuada justo. Sed luctus ligula ex, sed vestibulum turpis condimentum sit posuere.', '2015-06-06', '2015-06-26', 'img/llama.jpg', 0, 49, 2, 0),
(26, 'Silla de computadora', 'una silla', '2015-06-07', '2015-07-05', 'img/silla.jpg', 0, 49, 6, 0),
(27, 'Gato', 'un gato', '2015-06-07', '2015-07-06', 'img/Los-gatos-nos-ignoran-1.jpg', 0, 50, 5, 0),
(28, 'Escoba nueva', 'es linda', '2015-06-07', '2015-07-06', 'img/brm-55.png', 0, 51, 1, 1),
(29, 'Guitarra criolla', 'Como nueva', '2015-06-07', '2015-07-06', 'img/uno-de-los_1365073505643.png', 0, 51, 1, 1),
(33, 'Mouse', 'tecnologicoooo', '2015-06-25', '2015-06-30', 'img/mk_wm1000_ci.jpg', 0, 49, 3, 0);

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
  `Admin` tinyint(1) NOT NULL DEFAULT '0',
  `userActivo` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID_USR`, `DNI`, `Nombre`, `Apellido`, `Fecha_reg`, `Mail`, `Password`, `Nro_tarjeta`, `Admin`, `userActivo`) VALUES
(47, 123456, 'Miguel', 'Guerra', '2015-06-06', 'lala@a.com', 'holahola', 12345, 0, 1),
(48, 1234567, 'Cristian', 'Alvarado', '2015-06-06', 'a@a.com', '123456', 124567, 1, 1),
(49, 134324, 'Lucas', 'Cuevas', '2015-06-06', 'lucas@bestnid.com', '123456', 14424132, 0, 1),
(50, 37968423, 'Florencia', 'Barrau', '2015-06-07', 'flpys_31@hotmail.com', '123456', 123456789, 0, 1),
(51, 1234567, 'Mauricio', 'Bracco', '2015-06-07', 'mauricio@hotmail.com', 'mauricio', 1345678, 0, 1),
(52, 122234, 'Walter', 'Solis', '2015-06-27', 'walter@bestnid.com', '123456', 122345, 0, 1),
(53, 12445, 'Francisco', 'fulanito', '2015-07-01', '3244@gmail.com', 'qwerty', 949494, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE IF NOT EXISTS `venta` (
`NRO_VEN` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Motivo` varchar(300) NOT NULL,
  `Monto` double NOT NULL,
  `Monto_dueno` double NOT NULL,
  `sub` int(11) NOT NULL,
  `user_ven` int(11) NOT NULL,
  `user_comp` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`NRO_VEN`, `Fecha`, `Motivo`, `Monto`, `Monto_dueno`, `sub`, `user_ven`, `user_comp`) VALUES
(45, '2015-07-14', 'Ultimamente no me siento muy comodo en mi silla', 210, 90, 26, 49, 48);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
 ADD PRIMARY KEY (`ID_CAT`);

--
-- Indices de la tabla `notificacion`
--
ALTER TABLE `notificacion`
 ADD PRIMARY KEY (`ID_NTF`);

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
MODIFY `ID_CAT` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `notificacion`
--
ALTER TABLE `notificacion`
MODIFY `ID_NTF` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT de la tabla `oferta`
--
ALTER TABLE `oferta`
MODIFY `ID_OFE` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT de la tabla `pregunta`
--
ALTER TABLE `pregunta`
MODIFY `ID_PREG` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT de la tabla `subasta`
--
ALTER TABLE `subasta`
MODIFY `ID_SUB` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
MODIFY `ID_USR` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
MODIFY `NRO_VEN` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;
DELIMITER $$
--
-- Eventos
--
CREATE DEFINER=`root`@`localhost` EVENT `finalizar_subastas` ON SCHEDULE EVERY 1 SECOND STARTS '2015-06-25 00:00:00' ON COMPLETION PRESERVE ENABLE DO UPDATE subasta
	SET Activo=0
	WHERE Activo=1 and Fec_fin < current_date()$$

DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
