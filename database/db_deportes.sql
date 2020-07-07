-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-07-2020 a las 03:41:48
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_deportes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id_comentario` int(11) NOT NULL,
  `comentario` text NOT NULL,
  `id_torneo_fk` int(11) NOT NULL,
  `votos` int(11) NOT NULL,
  `id_usuario_fk` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id_comentario`, `comentario`, `id_torneo_fk`, `votos`, `id_usuario_fk`) VALUES
(36, 'hola muy bueno', 25, 5, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deportes`
--

CREATE TABLE `deportes` (
  `id_deporte` int(11) NOT NULL,
  `deporte` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `deportes`
--

INSERT INTO `deportes` (`id_deporte`, `deporte`) VALUES
(1, 'Fútbol'),
(2, 'Básquet'),
(3, 'Rugby'),
(4, 'Automovilismo'),
(5, 'Vóley'),
(6, 'Tenis'),
(7, 'Boxeo'),
(20, 'Polo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `id_imagen` int(11) NOT NULL,
  `id_torneo_fk` int(11) NOT NULL,
  `ruta` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`id_imagen`, `id_torneo_fk`, `ruta`) VALUES
(34, 11, 'img/5f03b27493be08.15247683.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `torneos`
--

CREATE TABLE `torneos` (
  `id_torneo` int(11) NOT NULL,
  `torneo` varchar(100) NOT NULL,
  `id_deporte_fk` int(11) NOT NULL,
  `pais` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `votos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `torneos`
--

INSERT INTO `torneos` (`id_torneo`, `torneo`, `id_deporte_fk`, `pais`, `descripcion`, `votos`) VALUES
(1, 'SAF', 1, 'Argentina', 'Superliga Argentina de Fútbol.Primera división del fútbol argentino. Pasión y locura todo en un mismo lugar.', 17),
(2, 'Premier League', 1, 'Reuino Unido', 'Premier League.\r\nPrimera división del fútbol inglés. Precisión e intesidad hasta el último minuto.', 17),
(3, 'LaLiga', 1, 'España', 'Liga Española.Campeonato Nacional de Liga de Primera División de España. Los méjores haciendo gala de su buen fútbol.', 20),
(4, 'Liga Nacional', 2, 'Argentina', 'La Liga Nacional de Básquet es la máxima división del básquet argentino.', 8),
(5, 'Liga ACB', 2, 'España', 'La Liga ACB  es la principal liga de baloncesto profesional de España. Está regida por la Asociación de Clubes de Baloncesto (ACB) .', 11),
(6, 'NBA', 2, 'Estado Unidos', 'La National Basketball Association, más conocida simplemente por sus siglas NBA, es una liga privada de baloncesto profesional que se disputa en Estados Unidos desde 1946', 20),
(7, 'Torneo Argentino', 3, 'Argentina', 'Torneo Argentino de Rugby. Los miembros de la UAR compiten por el máximo trofeo de Argentina.', 9),
(8, 'Gallagher Premiership', 3, 'Reino Unido', 'La Liga de Inglaterra de Rugby.  En este campeonato se enfrentan los doce mejores equipos de Inglaterra.', 5),
(9, 'TOP 14', 3, 'Francia', 'El Rugby Top 14 es un campeonato masculino de clubes de rugby de Francia que se disputa desde 1892. Es supuestamente la mejor liga de rugby del mundo de clubes, ? y atrae a los mejores jugadores del planeta.', 11),
(11, 'Fórmula 1', 4, 'Mundial', 'Máxima competición automovilística del planeta. La tecnología de punta y los mejores pilotos reunidos para dar un show alucinante.', 20),
(12, 'Turismo Carretera', 4, 'Argentina', 'Máxima competición del automovilismo argentino.', 3),
(13, 'TC 2000', 4, 'Argentina', 'Es la versión modernizada del TC, con automóviles más modernos y adaptados que en el TC.', 1),
(14, 'Liga de Vóleibol de Argentina', 5, 'Argentina', 'La Liga de Voleibol Argentina es la máxima categoría del vóleibol argentino. Es organizada por la ACLAV desde 2003.', 4),
(15, 'Liga Femenina de Voleibol Argentino', 5, 'Argentina', 'La Liga Femenina de Voleibol Argentino es el máximo torneo de vóley femenino de la Argentina. El equipo campeón clasifica al Sudamericano de Clubes Campeones de Voleibol Femenino. ', 4),
(17, 'US Open', 6, 'Estados Unidos', 'Los mejores del ranking ATP compiten por este Grand Slam.', 14),
(25, 'Campeonato Mundial CMB Pesado', 7, 'Estados Unidos', 'Pelea por el cinturón de los pesos pesados CMB', 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contrasenia` varchar(100) NOT NULL,
  `rol` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `email`, `contrasenia`, `rol`, `nombre`, `apellido`) VALUES
(1, 'admin@admin.com', '$2y$12$L7mGvVvKC02mwiktDLg8EOlHn3WQn1s/1nyqTec28BZe19yK/d8t2', 1, 'admin', 'istrador'),
(3, 'hector@gmail.com', '$2y$10$eu33DMtdp5OTjRlhSYU0au5HQtJszygBPKW.IQgAu9iONcZK8xqs.', 0, 'Héctor', 'Liceaga'),
(6, 'fiore@gmail.com', '$2y$10$J91csd1jhzwUTrPQd.EpfuxvMDqZVtb2lG0..gAVIHdgsA9Xn02d6', 1, 'Fiore', 'Guaita');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `id_torneo_fk` (`id_torneo_fk`),
  ADD KEY `id_usuario_fk` (`id_usuario_fk`),
  ADD KEY `id_usuario_fk_2` (`id_usuario_fk`);

--
-- Indices de la tabla `deportes`
--
ALTER TABLE `deportes`
  ADD PRIMARY KEY (`id_deporte`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`id_imagen`),
  ADD KEY `fk_id_torneo` (`id_torneo_fk`);

--
-- Indices de la tabla `torneos`
--
ALTER TABLE `torneos`
  ADD PRIMARY KEY (`id_torneo`),
  ADD KEY `deporte` (`id_deporte_fk`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `deportes`
--
ALTER TABLE `deportes`
  MODIFY `id_deporte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id_imagen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `torneos`
--
ALTER TABLE `torneos`
  MODIFY `id_torneo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`id_usuario_fk`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_torneo_fk` FOREIGN KEY (`id_torneo_fk`) REFERENCES `torneos` (`id_torneo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD CONSTRAINT `id_imagen_fk` FOREIGN KEY (`id_torneo_fk`) REFERENCES `torneos` (`id_torneo`);

--
-- Filtros para la tabla `torneos`
--
ALTER TABLE `torneos`
  ADD CONSTRAINT `torneos_ibfk_1` FOREIGN KEY (`id_deporte_fk`) REFERENCES `deportes` (`id_deporte`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
