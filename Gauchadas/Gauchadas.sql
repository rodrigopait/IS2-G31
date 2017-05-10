-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 10-05-2017 a las 17:59:13
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `Gauchadas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Calificacion`
--

CREATE TABLE `Calificacion` (
  `Id_Usuario` text CHARACTER SET utf8 NOT NULL,
  `comentario` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Categoria`
--

CREATE TABLE `Categoria` (
  `id_cat` int(11) NOT NULL,
  `descripcion` text CHARACTER SET utf8 NOT NULL,
  `titulo` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Compra`
--

CREATE TABLE `Compra` (
  `nro_compra` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `total` int(11) NOT NULL,
  `cant_creditos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Foto`
--

CREATE TABLE `Foto` (
  `id_foto` int(11) NOT NULL,
  `foto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Gauchada`
--

CREATE TABLE `Gauchada` (
  `Id_Gauchada` int(11) NOT NULL,
  `titulo` text CHARACTER SET utf8 NOT NULL,
  `descripcion` text CHARACTER SET utf8 NOT NULL,
  `ciudad` text CHARACTER SET utf8 NOT NULL,
  `fecha_ini` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `id_foto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Gauchada`
--

INSERT INTO `Gauchada` (`Id_Gauchada`, `titulo`, `descripcion`, `ciudad`, `fecha_ini`, `fecha_fin`, `id_foto`) VALUES
(1, 'Busco acompa?ante de viaje', 'Soy camionero y busco una persona que me acompa?e en mi viaje hasta Rawson porque sufro problemas de sue?o.\r\n\r\nSaldr?amos el primer fin de semana de octubre y retornar?amos el fin de semana siguiente.\r\n\r\n* Condici?n fundamental: debe cebar buenos mates', 'La Plata', '2017-05-08', '2017-10-05', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Postula`
--

CREATE TABLE `Postula` (
  `Id_Usuario` int(11) NOT NULL,
  `Id_Gauchada` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Registrado`
--

CREATE TABLE `Registrado` (
  `Id_Registrado` int(11) NOT NULL,
  `nombre_usu` text CHARACTER SET utf8 NOT NULL,
  `ciudad` text CHARACTER SET utf8 NOT NULL,
  `creditos` int(11) NOT NULL,
  `telefono` int(13) DEFAULT NULL,
  `nro_compra` int(11) NOT NULL,
  `id_rep` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Reputacion`
--

CREATE TABLE `Reputacion` (
  `id_rep` int(11) NOT NULL,
  `descripcion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuario`
--

CREATE TABLE `Usuario` (
  `Id_Usuario` int(11) NOT NULL,
  `nombre_usu` text CHARACTER SET utf8 NOT NULL,
  `passworld` text CHARACTER SET utf8 NOT NULL,
  `mail` text CHARACTER SET utf8 NOT NULL,
  `tipo_adm` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Usuario`
--

INSERT INTO `Usuario` (`Id_Usuario`, `nombre_usu`, `passworld`, `mail`, `tipo_adm`) VALUES
(1, 'rodrigo', 'hola', 'mail', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Calificacion`
--
ALTER TABLE `Calificacion`
  ADD PRIMARY KEY (`Id_Usuario`(50));
ALTER TABLE `Calificacion` ADD FULLTEXT KEY `comentario` (`comentario`);

--
-- Indices de la tabla `Categoria`
--
ALTER TABLE `Categoria`
  ADD PRIMARY KEY (`id_cat`);

--
-- Indices de la tabla `Compra`
--
ALTER TABLE `Compra`
  ADD PRIMARY KEY (`nro_compra`),
  ADD UNIQUE KEY `nro_compra` (`nro_compra`);

--
-- Indices de la tabla `Foto`
--
ALTER TABLE `Foto`
  ADD PRIMARY KEY (`id_foto`);

--
-- Indices de la tabla `Gauchada`
--
ALTER TABLE `Gauchada`
  ADD PRIMARY KEY (`Id_Gauchada`);

--
-- Indices de la tabla `Postula`
--
ALTER TABLE `Postula`
  ADD PRIMARY KEY (`Id_Usuario`,`Id_Gauchada`);

--
-- Indices de la tabla `Registrado`
--
ALTER TABLE `Registrado`
  ADD PRIMARY KEY (`Id_Registrado`);

--
-- Indices de la tabla `Reputacion`
--
ALTER TABLE `Reputacion`
  ADD PRIMARY KEY (`id_rep`),
  ADD UNIQUE KEY `id_rep` (`id_rep`);

--
-- Indices de la tabla `Usuario`
--
ALTER TABLE `Usuario`
  ADD PRIMARY KEY (`Id_Usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Compra`
--
ALTER TABLE `Compra`
  MODIFY `nro_compra` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Foto`
--
ALTER TABLE `Foto`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Gauchada`
--
ALTER TABLE `Gauchada`
  MODIFY `Id_Gauchada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `Registrado`
--
ALTER TABLE `Registrado`
  MODIFY `Id_Registrado` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Reputacion`
--
ALTER TABLE `Reputacion`
  MODIFY `id_rep` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Usuario`
--
ALTER TABLE `Usuario`
  MODIFY `Id_Usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
