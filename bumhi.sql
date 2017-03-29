-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-03-2017 a las 03:15:35
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `bumhi`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_delegaciones`
--

CREATE TABLE IF NOT EXISTS `cat_delegaciones` (
  `claveDele` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `nombreDelegacion` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`claveDele`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `cat_delegaciones`
--

INSERT INTO `cat_delegaciones` (`claveDele`, `nombreDelegacion`) VALUES
('1', 'Azcapotzalco, Ciudad de México DF'),
('2', 'Benito Juárez, Ciudad de México DF'),
('3', 'Cuajimalpa de Morelos, Ciudad de México DF'),
('4', 'Cuauhtémoc, Ciudad de México DF'),
('5', 'Iztacalco, Ciudad de México DF'),
('6', 'Iztapalapa, Ciudad de México DF'),
('7', 'Miguel Hidalgo, Ciudad de México DF'),
('8', 'Milpa Alta, Ciudad de México DF');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_exposiciones`
--

CREATE TABLE IF NOT EXISTS `cat_exposiciones` (
  `claveExposicion` int(6) NOT NULL AUTO_INCREMENT,
  `nombreExposicion` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Salas_claveSala` int(6) DEFAULT NULL,
  `descripcion` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `coleccion` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `estado` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`claveExposicion`),
  KEY `Cat_Exposiciones_Salas_FK` (`Salas_claveSala`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `cat_exposiciones`
--

INSERT INTO `cat_exposiciones` (`claveExposicion`, `nombreExposicion`, `Salas_claveSala`, `descripcion`, `coleccion`, `estado`) VALUES
(1, 'gfjh', 4, 'gfghjfgh', 'gfhjfgh', 'Exponiendose'),
(2, 'Chango Marango', 5, 'Es un chango', 'Ninguna', 'Exponiendose');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleservicios`
--

CREATE TABLE IF NOT EXISTS `detalleservicios` (
  `Museos_clave_museo` int(6) NOT NULL AUTO_INCREMENT,
  `Servicios_claveServicios` int(6) NOT NULL,
  `descripcion` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `costo` int(3) NOT NULL,
  PRIMARY KEY (`Museos_clave_museo`,`Servicios_claveServicios`),
  KEY `FK_ASS_10` (`Servicios_claveServicios`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `detalleservicios`
--

INSERT INTO `detalleservicios` (`Museos_clave_museo`, `Servicios_claveServicios`, `descripcion`, `costo`) VALUES
(7, 1, 'Guarda objetos durante la visita al museo', 10),
(7, 2, 'Guarda los automÃ³viles de los visitantes mientras se encuentran en el museo', 40),
(7, 6, 'Comida de la mas alta calidad.', 0),
(7, 7, 'Recorridos con guÃ­a por todo el museo', 150),
(8, 1, 'jhkljl', 76889),
(8, 2, 'ghhjjkh', 5678),
(8, 6, 'akjhajahk llslsls', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `museos`
--

CREATE TABLE IF NOT EXISTS `museos` (
  `claveMuseo` int(6) NOT NULL AUTO_INCREMENT,
  `nombreMuseo` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `tipo` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `Usuarios_clave` int(6) DEFAULT NULL,
  `Cat_Delegaciones_claveDele` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numeroTelefono` int(10) NOT NULL,
  `calle` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `numero` int(11) NOT NULL,
  `horarioApertura` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `horarioCierre` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `cuota` int(6) NOT NULL,
  `descripcion` varchar(125) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`claveMuseo`),
  KEY `Museos_Cat_Delegaciones_FK` (`Cat_Delegaciones_claveDele`),
  KEY `Museos_Usuarios_FK` (`Usuarios_clave`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `museos`
--

INSERT INTO `museos` (`claveMuseo`, `nombreMuseo`, `tipo`, `Usuarios_clave`, `Cat_Delegaciones_claveDele`, `numeroTelefono`, `calle`, `numero`, `horarioApertura`, `horarioCierre`, `cuota`, `descripcion`) VALUES
(7, 'Antropologia', 'Arqueología e historia', 1, '7', 556678447, 'Hidalgo', 15, '09:00', '06:00', 70, 'hghjghjg'),
(8, 'gfhjg', 'ghjk', 1, '8', 456789, 'retyui', 456, 'rdrtfygghj', 'gfhjkj', 554, 'fghaghafagfahgaf'),
(11, 'fghjkhlj', 'gfhj', NULL, '3', 4567, 'fghjkl', 567, 'dfgh', 'dfghj', 45, 'fgfhjhkjlÃ±lkghjkfhj');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salas`
--

CREATE TABLE IF NOT EXISTS `salas` (
  `claveSala` int(6) NOT NULL AUTO_INCREMENT,
  `nombreSala` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Museos_claveMuseo` int(6) NOT NULL,
  `temporal` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `fechaInicio` date NOT NULL,
  `fechaFinal` date NOT NULL,
  `descripcion` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`claveSala`),
  KEY `Salas_Museos_FK` (`Museos_claveMuseo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `salas`
--

INSERT INTO `salas` (`claveSala`, `nombreSala`, `Museos_claveMuseo`, `temporal`, `fechaInicio`, `fechaFinal`, `descripcion`) VALUES
(3, 'Hola2', 11, 'No', '8888-05-04', '6787-05-04', 'ghjhklllhkl'),
(4, 'ghjgh', 8, 'No', '1990-06-05', '2000-07-08', 'gakhgahjgahjakga'),
(5, 'IntroducciÃ³n a la antropologÃ', 7, 'No', '2000-10-16', '2017-05-05', 'Figuras de arqueologÃ­a de la prehistoria. ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE IF NOT EXISTS `servicios` (
  `claveServicios` int(6) NOT NULL AUTO_INCREMENT,
  `nombreServicio` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`claveServicios`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`claveServicios`, `nombreServicio`) VALUES
(1, 'Paqueteria'),
(2, 'Estacionamiento'),
(6, 'Restaurante'),
(7, 'Audio guÃ­a ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `clave` int(6) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `contrasena` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `rol` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`clave`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`clave`, `nombre`, `contrasena`, `correo`, `rol`) VALUES
(1, 'Luis', '12345', 'alex-15@hotmail.com', 'Administrador'),
(5, 'Andres', '123456789', 'andres@gmail.com', 'Administrador'),
(6, 'Adriana Blanco', 'blanco123', 'adri@outlook.com', 'Administrador');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cat_exposiciones`
--
ALTER TABLE `cat_exposiciones`
  ADD CONSTRAINT `Cat_Exposiciones_Salas_FK` FOREIGN KEY (`Salas_claveSala`) REFERENCES `salas` (`claveSala`);

--
-- Filtros para la tabla `detalleservicios`
--
ALTER TABLE `detalleservicios`
  ADD CONSTRAINT `FK_ASS_10` FOREIGN KEY (`Servicios_claveServicios`) REFERENCES `servicios` (`claveServicios`),
  ADD CONSTRAINT `FK_ASS_9` FOREIGN KEY (`Museos_clave_museo`) REFERENCES `museos` (`claveMuseo`);

--
-- Filtros para la tabla `museos`
--
ALTER TABLE `museos`
  ADD CONSTRAINT `Museos_Cat_Delegaciones_FK` FOREIGN KEY (`Cat_Delegaciones_claveDele`) REFERENCES `cat_delegaciones` (`claveDele`),
  ADD CONSTRAINT `Museos_Usuarios_FK` FOREIGN KEY (`Usuarios_clave`) REFERENCES `usuarios` (`clave`);

--
-- Filtros para la tabla `salas`
--
ALTER TABLE `salas`
  ADD CONSTRAINT `Salas_Museos_FK` FOREIGN KEY (`Museos_claveMuseo`) REFERENCES `museos` (`claveMuseo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
