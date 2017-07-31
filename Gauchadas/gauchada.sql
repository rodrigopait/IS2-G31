-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-08-2017 a las 01:48:02
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

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
  `id_calificacion` int(11) NOT NULL,
  `comentario` text NOT NULL,
  `id_puntuacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `calificacion`
--

INSERT INTO `calificacion` (`id_calificacion`, `comentario`, `id_puntuacion`) VALUES
(3, 'Lo dejo impecable', 1),
(4, 'sa', 2);

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
(1, 7),
(1, 8),
(1, 9),
(2, 2),
(2, 7),
(7, 4),
(7, 6),
(8, 9),
(8, 12),
(24, 10);

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
(1, 'general'),
(2, 'animales y mascotas'),
(3, 'antiguedades'),
(4, 'arte y artesanias'),
(5, 'instrumentos musicales'),
(6, 'salud'),
(7, 'trabajo'),
(8, 'construccion'),
(9, 'musica'),
(10, 'viajes'),
(24, 'decoracion');

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
(4, '2017-05-27', 10, 1, 2, 9),
(5, '2017-07-19', 50, 1, 3, 9),
(6, '2017-07-15', 50, 1, 3, 1);

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
(2, 10),
(3, 50);

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
(4, 'img/Bariloche.jpg'),
(6, 'img/auto-sucio.jpg'),
(7, 'img/user.png');

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
  `id_registrado` int(11) NOT NULL,
  `id_aceptado` int(11) DEFAULT NULL,
  `id_calificacion` int(11) DEFAULT NULL,
  `id_preggau` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `gauchada`
--

INSERT INTO `gauchada` (`id_gauchada`, `titulo`, `descripcion`, `ciudad`, `fecha_ini`, `fecha_fin`, `id_foto`, `id_registrado`, `id_aceptado`, `id_calificacion`, `id_preggau`) VALUES
(1, 'Busco acompañante de viaje\r\n\r\n', 'Soy camionero y busco una persona que me acompañe en mi viaje hasta Rawson porque sufro problemas de sueño.\r\n\r\nSaldriamos el primer fin de semana de octubre y retornariamos el fin de semana siguiente.\r\n\r\n* Condicion fundamental: debe cebar buenos mates', 'La Plata', '2017-05-08', '2017-11-30', 1, 6, NULL, NULL, 67),
(2, 'Se busca dueño para cachorritos', 'Mi perra tuvo cachorros y no los puedo mantener, se busca familia responsable.', 'La Plata', '2017-05-10', '2017-08-02', 3, 9, 1, 4, 64),
(3, 'Necesito viajar hasta Bariloche', 'busco gente que viaje para el sur y le sobre un lugar en el vehiculo.', 'Rosario', '2017-05-12', '2017-05-31', 4, 3, NULL, NULL, NULL),
(4, 'Se necesita cocinera', 'nuestra cocinera se enfermo y necesitamos ayuda para mantener alimentados a los chicos del comedor.', 'Villa Gessel', '2017-05-29', '2017-08-01', 2, 4, NULL, NULL, 61),
(6, 'Busco lavador de autos', 'Se busca lavador de autos con experiencia preferentemente de la localidad de La Plata, debido a que mi auto tiene mucha mugre.', 'La Plata', '2017-05-30', '2017-07-28', 6, 10, 4, 3, 33),
(7, 'hola', 'hola', 'la plata', '2017-06-27', '2017-08-04', 2, 9, NULL, NULL, 55),
(8, 'comprobacion ', 'anda todo bien por aca', 'lp', '2017-07-18', '2017-07-27', 2, 9, NULL, NULL, 54),
(9, 'esta es mi primer gauchada', 'holaaa....comenten', 'tucuman', '2017-07-21', '2017-07-29', 2, 1, NULL, NULL, 63),
(12, 'testeando', 'hola', 'catamarca', '2017-07-31', '2017-08-13', 2, 1, NULL, NULL, 65);

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
(1, 1),
(1, 2),
(1, 4),
(1, 6),
(3, 1),
(3, 2),
(3, 6),
(4, 6),
(5, 3),
(5, 6),
(7, 6),
(9, 1),
(9, 3),
(9, 6),
(11, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preggau`
--

CREATE TABLE `preggau` (
  `id_preggau` int(11) NOT NULL,
  `id_gauchada` int(11) NOT NULL,
  `id_pregunta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `preggau`
--

INSERT INTO `preggau` (`id_preggau`, `id_gauchada`, `id_pregunta`) VALUES
(29, 4, 35),
(30, 4, 36),
(31, 4, 37),
(32, 6, 38),
(33, 6, 39),
(34, 1, 40),
(35, 1, 41),
(36, 1, 42),
(37, 1, 43),
(38, 8, 44),
(39, 8, 45),
(40, 8, 46),
(41, 8, 47),
(42, 9, 48),
(43, 9, 49),
(44, 9, 50),
(45, 9, 51),
(46, 1, 52),
(47, 1, 53),
(48, 1, 54),
(49, 1, 55),
(50, 1, 56),
(51, 8, 57),
(52, 8, 58),
(53, 8, 59),
(54, 8, 60),
(55, 7, 61),
(56, 1, 62),
(57, 1, 63),
(58, 4, 64),
(59, 4, 64),
(60, 4, 66),
(61, 4, 67),
(62, 1, 68),
(63, 9, 69),
(64, 2, 70),
(65, 12, 71),
(66, 1, 72),
(67, 1, 73);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta`
--

CREATE TABLE `pregunta` (
  `id_pregunta` int(11) NOT NULL,
  `pregunta` text NOT NULL,
  `id_registrado` int(11) NOT NULL,
  `id_respuesta` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pregunta`
--

INSERT INTO `pregunta` (`id_pregunta`, `pregunta`, `id_registrado`, `id_respuesta`) VALUES
(35, 'cuantos chicos son?', 9, 56),
(36, 'que platos preparan habitualmente??', 9, NULL),
(37, 'osea que ahora anda todo bien??', 9, NULL),
(38, 'donde lo metiste que está asi de sucio??', 9, 58),
(39, 'esto no anda ni pa tras', 9, NULL),
(40, 'es muy largo el viaje?\r\n', 1, 70),
(41, 'cebo bien al final?', 9, 74),
(43, 'no me ueda claro donde vamos?', 1, 66),
(44, 'seguro que anda todo bien??', 1, 59),
(45, 'pero segurisimo que anda todo bien bien??', 1, 64),
(46, 'mmmmm estoy dudando', 1, 62),
(47, 'yyy??', 1, 81),
(52, 'daada', 1, 73),
(54, 'vdsfvfd', 1, 76),
(56, 'bla bla bla bla bla...bla bla', 1, 77),
(57, 'a', 1, 83),
(58, 'b', 1, NULL),
(59, 'c', 1, NULL),
(60, 'd', 1, NULL),
(61, '??todo bien por aca??', 5, NULL),
(62, 'por su pollo', 9, NULL),
(64, 'supongo que si', 9, NULL),
(65, 'supongo que si', 9, NULL),
(68, 'estas seguro??', 9, NULL),
(69, 'hola...hace calor??', 9, NULL),
(70, 'cuantos perritos te quedan?', 1, NULL),
(71, 'hola anda todo bien??', 9, NULL),
(72, 'quee??', 1, NULL),
(73, 'hols??', 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puntuacion`
--

CREATE TABLE `puntuacion` (
  `id_puntuacion` int(11) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `puntuacion`
--

INSERT INTO `puntuacion` (`id_puntuacion`, `descripcion`) VALUES
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
  `puntos` int(11) NOT NULL,
  `id_rep` int(11) NOT NULL,
  `tipo_adm` int(11) DEFAULT '0',
  `id_foto` int(11) DEFAULT '6'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `registrado`
--

INSERT INTO `registrado` (`id_usuario`, `nombre_usu`, `password`, `mail`, `ciudad`, `creditos`, `telefono`, `puntos`, `id_rep`, `tipo_adm`, `id_foto`) VALUES
(1, 'facundomedero', '123456', 'facumedero@hotmail.com', 'laplata', 1, 6546464, -1, 2, 0, 7),
(3, 'francotagliero', 'francotagliero', 'francotagliero@hotmail.com', 'la plata', 0, 35464, 20, 2, 0, 7),
(4, 'federicosanchez', '', 'fedesanchez@gmail.com', 'rosario', 0, 654846156, 0, 3, 0, 7),
(5, 'rodrigopait', '123456', 'rodripait@hotmail.com', 'mar de ajo', 0, 4876848, 30, 3, 0, 7),
(6, 'camila', 'camila', 'cami@hotmail.com', 'mar de ajo', 0, 0, 0, 2, 0, 7),
(7, 'ulises', 'gauchadas', 'ulises@gauchadas.com', 'la plata', 0, 123, 0, 2, 1, 7),
(9, 'gauchada', 'gauchada', 'gauchada@gaucahda.com', 'la plata', 18, 0, 1000, 2, 0, 7),
(10, 'rodrigo', 'rodrigo', 'rodri@hotmail.com', 'La Plata', 0, 1234, 0, 2, 0, 7),
(11, 'bruno', '123123', 'bruno@hotmail.com', 'La Plata', 0, 2147483647, 0, 2, 0, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reputacion`
--

CREATE TABLE `reputacion` (
  `id_rep` int(11) NOT NULL,
  `rango_min` int(11) NOT NULL,
  `rango_max` int(11) NOT NULL,
  `descripcion` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reputacion`
--

INSERT INTO `reputacion` (`id_rep`, `rango_min`, `rango_max`, `descripcion`) VALUES
(1, -1000000, -1, 'Irresponsable'),
(2, 0, 0, 'Observador'),
(3, 1, 10, 'Cumplidor'),
(4, 11, 20, 'Solidario'),
(5, 21, 30, 'Profesional'),
(6, 31, 1000000, 'Experto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuesta`
--

CREATE TABLE `respuesta` (
  `id_respuesta` int(11) NOT NULL,
  `respuesta` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `respuesta`
--

INSERT INTO `respuesta` (`id_respuesta`, `respuesta`) VALUES
(56, 'demasiados para el personal que tenemos'),
(57, 'demasiados para el personal que tenemos'),
(58, 'no tengo idea'),
(59, 'para mi anda todo perfecto'),
(60, 'estoy mus feliz de que asi seaa'),
(61, 'andaba todo re bien'),
(62, 'yo tmb'),
(63, 'yo tmb'),
(64, 'no estaria tan seguro\r\n'),
(67, 'si, creo'),
(68, 'dfvdvd'),
(69, 'alalalalallla'),
(70, 're largo'),
(71, 'seeeee'),
(72, 'seee'),
(73, 'holi dada'),
(74, 'claro que si'),
(76, 'vdfvdvd'),
(77, 'llueve sobre mojado'),
(78, 'clro que si, papa!!!\r\n'),
(79, 'sdcdecvsfv'),
(80, 'claro que si'),
(81, 'y? que??'),
(83, 'abc'),
(84, 'whats'),
(85, 'solo 5');

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
  ADD PRIMARY KEY (`id_calificacion`);
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
-- Indices de la tabla `preggau`
--
ALTER TABLE `preggau`
  ADD PRIMARY KEY (`id_preggau`);

--
-- Indices de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  ADD PRIMARY KEY (`id_pregunta`);

--
-- Indices de la tabla `puntuacion`
--
ALTER TABLE `puntuacion`
  ADD PRIMARY KEY (`id_puntuacion`);

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
-- Indices de la tabla `respuesta`
--
ALTER TABLE `respuesta`
  ADD PRIMARY KEY (`id_respuesta`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `calificacion`
--
ALTER TABLE `calificacion`
  MODIFY `id_calificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `credito`
--
ALTER TABLE `credito`
  MODIFY `id_credito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `foto`
--
ALTER TABLE `foto`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `gauchada`
--
ALTER TABLE `gauchada`
  MODIFY `id_gauchada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `preggau`
--
ALTER TABLE `preggau`
  MODIFY `id_preggau` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  MODIFY `id_pregunta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT de la tabla `puntuacion`
--
ALTER TABLE `puntuacion`
  MODIFY `id_puntuacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `registrado`
--
ALTER TABLE `registrado`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `reputacion`
--
ALTER TABLE `reputacion`
  MODIFY `id_rep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `respuesta`
--
ALTER TABLE `respuesta`
  MODIFY `id_respuesta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
