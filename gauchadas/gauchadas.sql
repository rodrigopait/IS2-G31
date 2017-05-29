-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 29-05-2017 a las 23:41:28
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gauchada`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificacion`
--

CREATE TABLE `calificacion` (
  `id_registrado` int(11) NOT NULL,
  `comentario` text NOT NULL,
  `id_rango` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categau`
--

CREATE TABLE `categau` (
  `id_categoria` int(11) NOT NULL,
  `id_gauchada` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Volcado de datos para la tabla `categau`
--

INSERT INTO `categau` (`id_categoria`, `id_gauchada`) VALUES
(1, 1),
(1, 3),
(2, 2),
(7, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_cat` int(11) NOT NULL,
  `tipocategoria` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_cat`, `tipocategoria`) VALUES
(1, 'viajes'),
(2, 'animales y mascotas'),
(3, 'antiguedades'),
(4, 'arte y artesanias'),
(5, 'instrumentos musicales'),
(6, 'salud'),
(7, 'trabajo'),
(8, 'construccion'),
(9, 'Musica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `id_compra` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `total` int(11) NOT NULL,
  `cant_creditos` int(11) NOT NULL,
  `id_credito` int(11) NOT NULL,
  `id_registrado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`id_compra`, `fecha`, `total`, `cant_creditos`, `id_credito`, `id_registrado`) VALUES
(1, '0000-00-00', 0, 0, 0, 0),
(2, '0000-00-00', 10, 1, 2, 9),
(3, '0000-00-00', 10, 1, 2, 9),
(4, '2017-05-27', 10, 1, 2, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `credito`
--

CREATE TABLE `credito` (
  `id_credito` int(11) NOT NULL,
  `valor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `credito`
--

INSERT INTO `credito` (`id_credito`, `valor`) VALUES
(1, 5),
(2, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foto`
--

CREATE TABLE `foto` (
  `id_foto` int(11) NOT NULL,
  `foto` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `foto`
--

INSERT INTO `foto` (`id_foto`, `foto`) VALUES
(1, 'img/post-sample-image.jpg'),
(2, 'img/logo-gauchada.jpg'),
(3, 'img/cachorro.jpg'),
(4, 'img/Bariloche.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gauchada`
--

CREATE TABLE `gauchada` (
  `id_gauchada` int(11) NOT NULL,
  `titulo` text CHARACTER SET utf8 NOT NULL,
  `descripcion` text CHARACTER SET utf8 NOT NULL,
  `ciudad` text CHARACTER SET utf8 NOT NULL,
  `fecha_ini` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `id_foto` int(11) DEFAULT NULL,
  `id_registrado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `gauchada`
--

INSERT INTO `gauchada` (`id_gauchada`, `titulo`, `descripcion`, `ciudad`, `fecha_ini`, `fecha_fin`, `id_foto`, `id_registrado`) VALUES
(1, 'Busco acompañante de viaje\r\n\r\n', 'Soy camionero y busco una persona que me acompañe en mi viaje hasta Rawson porque sufro problemas de sueño.\r\n\r\nSaldriamos el primer fin de semana de octubre y retornariamos el fin de semana siguiente.\r\n\r\n* Condicion fundamental: debe cebar buenos mates', 'La Plata', '2017-05-08', '2017-10-05', 1, 5),
(2, 'Se busca dueño para cachorritos', 'Mi perra tuvo cachorros y no los puedo mantener, se busca familia responsable.', 'La Plata', '2017-05-10', '2017-05-19', 3, 1),
(3, 'Necesito viajar hasta Bariloche', 'busco gente que viaje para el sur y le sobre un lugar en el vehiculo.', 'Rosario', '2017-05-12', '2017-05-31', 4, 3),
(4, 'Se necesita cocinera', 'nuestra cocinera se enfermo y necesitamos ayuda para mantener alimentados a los chicos del comedor.', 'Villa Gessel', '2017-05-29', '2017-05-31', 2, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `postula`
--

CREATE TABLE `postula` (
  `id_registrado` int(11) NOT NULL,
  `id_gauchada` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `postula`
--

INSERT INTO `postula` (`id_registrado`, `id_gauchada`) VALUES
(3, 2),
(3, 3),
(5, 3),
(9, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rango`
--

CREATE TABLE `rango` (
  `id_rango` int(11) NOT NULL,
  `descripcion` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rango`
--

INSERT INTO `rango` (`id_rango`, `descripcion`) VALUES
(1, 'bueno'),
(2, 'malo'),
(3, 'neutral');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registrado`
--

CREATE TABLE `registrado` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usu` text CHARACTER SET utf8 NOT NULL,
  `password` text CHARACTER SET utf8 NOT NULL,
  `mail` text CHARACTER SET utf8 NOT NULL,
  `ciudad` text CHARACTER SET utf8 NOT NULL,
  `creditos` int(11) NOT NULL,
  `telefono` int(13) DEFAULT NULL,
  `id_rep` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `registrado`
--

INSERT INTO `registrado` (`id_usuario`, `nombre_usu`, `password`, `mail`, `ciudad`, `creditos`, `telefono`, `id_rep`) VALUES
(1, 'facundomedero', '', 'facumedero@hotmail.com', 'laplata', 0, 6546464, 2),
(3, 'francotagliero', '', 'francotagliero@hotmail.com', 'la plata', 0, 35464, 2),
(4, 'federicosanchez', '', 'fedesanchez@gmail.com', 'rosario', 0, 654846156, 3),
(5, 'rodrigopait', '', 'rodripait@hotmail.com', 'mar de ajo', 0, 4876848, 3),
(6, 'camila', '', 'cami@hotmail.com', 'mar de ajo', 0, NULL, 2),
(7, 'pai', 'paipai', 'pai@gauchadas.com', 'la plata', 0, 123, 2),
(9, 'gauchada', 'gauchada', 'gauchada@gaucahda.com', 'la plata', 22, 0, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reputacion`
--

CREATE TABLE `reputacion` (
  `id_rep` int(11) NOT NULL,
  `rango` int(11) NOT NULL,
  `descripcion` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reputacion`
--

INSERT INTO `reputacion` (`id_rep`, `rango`, `descripcion`) VALUES
(1, -1, 'Irresponsable'),
(2, 0, 'Observador'),
(3, 1, 'Cuplidor'),
(4, 11, 'Solidario'),
(5, 21, 'Profesional'),
(6, 31, 'Experto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usu` text CHARACTER SET utf8 NOT NULL,
  `password` text CHARACTER SET utf8 NOT NULL,
  `mail` text CHARACTER SET utf8 NOT NULL,
  `tipo_adm` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre_usu`, `password`, `mail`, `tipo_adm`) VALUES
(1, 'rodrigopait', 'rodri', 'rpait@gmail.com', 0),
(2, 'facundomedero', 'facu', 'fmedero@gmail.com', 0),
(3, 'francotagliero', 'fran', 'ftagliero@gmail.com', 0),
(4, 'federicosanchez', 'fede', 'fsanchez@gmail.com', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `calificacion`
--
ALTER TABLE `calificacion`
  ADD PRIMARY KEY (`id_registrado`);
ALTER TABLE `calificacion` ADD FULLTEXT KEY `comentario` (`comentario`);

--
-- Indices de la tabla `categau`
--
ALTER TABLE `categau`
  ADD PRIMARY KEY (`id_categoria`,`id_gauchada`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_cat`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`id_compra`),
  ADD UNIQUE KEY `nro_compra` (`id_compra`);

--
-- Indices de la tabla `credito`
--
ALTER TABLE `credito`
  ADD PRIMARY KEY (`id_credito`);

--
-- Indices de la tabla `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`id_foto`);

--
-- Indices de la tabla `gauchada`
--
ALTER TABLE `gauchada`
  ADD PRIMARY KEY (`id_gauchada`);

--
-- Indices de la tabla `postula`
--
ALTER TABLE `postula`
  ADD PRIMARY KEY (`id_registrado`,`id_gauchada`);

--
-- Indices de la tabla `rango`
--
ALTER TABLE `rango`
  ADD PRIMARY KEY (`id_rango`);

--
-- Indices de la tabla `registrado`
--
ALTER TABLE `registrado`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `reputacion`
--
ALTER TABLE `reputacion`
  ADD PRIMARY KEY (`id_rep`),
  ADD UNIQUE KEY `id_rep` (`id_rep`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `credito`
--
ALTER TABLE `credito`
  MODIFY `id_credito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `foto`
--
ALTER TABLE `foto`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `gauchada`
--
ALTER TABLE `gauchada`
  MODIFY `id_gauchada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `rango`
--
ALTER TABLE `rango`
  MODIFY `id_rango` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `registrado`
--
ALTER TABLE `registrado`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `reputacion`
--
ALTER TABLE `reputacion`
  MODIFY `id_rep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
