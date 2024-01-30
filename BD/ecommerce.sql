-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 30-01-2024 a las 17:35:59
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ecommerce`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `direccion` text NOT NULL,
  `cedula` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `email`, `pass`, `nombre`, `direccion`, `cedula`) VALUES
(1, 'nose@hotmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'noseaa', 'uwu', ''),
(2, 'nico@gmail.com', 'b8b4b727d6f5d1b61fff7be687f7970f', 'nicole', '', ''),
(3, 'alex@nose.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Alexander Alegria', '1 de Mayo', ''),
(4, 'vinicio@hotmail.com', 'a013a0cc7ce0e29cd01b04dbf0e34181', 'Vinicio ', '1 de mayo', '0201062619');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleventas`
--

CREATE TABLE `detalleventas` (
  `id` int(11) NOT NULL,
  `idProd` int(5) NOT NULL,
  `idVenta` int(5) NOT NULL,
  `cantidad` int(5) NOT NULL,
  `precio` double NOT NULL,
  `subTotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalleventas`
--

INSERT INTO `detalleventas` (`id`, `idProd`, `idVenta`, `cantidad`, `precio`, `subTotal`) VALUES
(11, 13, 17, 2, 23, 46),
(12, 13, 18, 3, 23, 69),
(13, 13, 19, 3, 23, 69),
(15, 13, 20, 6, 23, 138),
(16, 13, 21, 4, 23, 92),
(18, 13, 22, 5, 23, 115),
(20, 13, 23, 2, 23, 46),
(21, 16, 24, 2, 12, 24),
(22, 13, 25, 13, 12, 156),
(24, 16, 27, 1, 12, 12),
(25, 16, 28, 1, 12, 12),
(26, 16, 29, 2, 12, 24),
(27, 16, 30, 1, 12, 12),
(28, 19, 31, 3, 20, 60),
(29, 13, 32, 4, 12, 48),
(30, 16, 32, 1, 12, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `filename` varchar(250) NOT NULL DEFAULT '',
  `filesize` int(11) NOT NULL DEFAULT 0,
  `web_path` varchar(250) NOT NULL DEFAULT '',
  `system_path` varchar(250) NOT NULL DEFAULT '',
  `test` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `files`
--

INSERT INTO `files` (`id`, `filename`, `filesize`, `web_path`, `system_path`, `test`) VALUES
(1, 'vista-frontal-camiseta-blanca-aislada_125540-1194.jpg', 29324, '/ecommerce/upload/1.jpg', 'C:/xampp/htdocs/ecommerce/upload/1.jpg', 0),
(2, 'pantalonn.jpg', 3450, '/ecommerce/upload/2.jpg', 'C:/xampp/htdocs/ecommerce/upload/2.jpg', 0),
(3, 'cropped-pantalones.jpg', 98906, '/ecommerce/upload/3.jpg', 'C:/xampp/htdocs/ecommerce/upload/3.jpg', 0),
(4, 'file.jpg', 42142, '/ecommerce/upload/4.jpg', 'C:/xampp/htdocs/ecommerce/upload/4.jpg', 0),
(5, 'pantalonn.jpg', 3450, '/ecommerce/upload/5.jpg', 'C:/xampp/htdocs/ecommerce/upload/5.jpg', 0),
(6, 'cropped-pantalones.jpg', 98906, '/ecommerce/upload/6.jpg', 'C:/xampp/htdocs/ecommerce/upload/6.jpg', 0),
(7, 'pantalonn.jpg', 3450, '/ecommerce/upload/7.jpg', 'C:/xampp/htdocs/ecommerce/upload/7.jpg', 0),
(8, 'pantalonn.jpg', 3450, '/ecommerce/upload/8.jpg', 'C:/xampp/htdocs/ecommerce/upload/8.jpg', 0),
(9, 'file.jpg', 42142, '/ecommerce/upload/9.jpg', 'C:/xampp/htdocs/ecommerce/upload/9.jpg', 0),
(10, 'cropped-pantalones.jpg', 98906, '/ecommerce/upload/10.jpg', 'C:/xampp/htdocs/ecommerce/upload/10.jpg', 0),
(11, 'cropped-pantalones.jpg', 98906, '/ecommerce/upload/11.jpg', 'C:/xampp/htdocs/ecommerce/upload/11.jpg', 0),
(12, 'cropped-pantalones.jpg', 98906, 'ecommerce/uploadfile.jpg', 'C:/xampp/htdocs/ecommerce/upload/12.jpg', 0),
(13, 'vista-frontal-camiseta-blanca-aislada_125540-1194.jpg', 29324, '/ecommerce/upload/13.jpg', 'C:/xampp/htdocs/ecommerce/upload/13.jpg', 0),
(15, 'cropped-pantalones.jpg', 98906, '/ecommerce/upload/15.jpg', 'C:/xampp/htdocs/ecommerce/upload/15.jpg', 0),
(16, 'pantalonn.jpg', 3450, '/ecommerce/upload/16.jpg', 'C:/xampp/htdocs/ecommerce/upload/16.jpg', 0),
(28, 'upload/12_0.jpeg', 85359, '/ecommerce/upload/12_0.jpeg', 'C:/xampp/htdocs/ecommerce/upload/12_0.jpeg', 0),
(29, 'upload/12_1.jpeg', 73994, '/ecommerce/upload/12_1.jpeg', 'C:/xampp/htdocs/ecommerce/upload/12_1.jpeg', 0),
(30, 'upload/16_0.jpeg', 53998, '/ecommerce/upload/16_0.jpeg', 'C:/xampp/htdocs/ecommerce/upload/16_0.jpeg', 0),
(31, 'upload/16_1.jpeg', 56339, '/ecommerce/upload/16_1.jpeg', 'C:/xampp/htdocs/ecommerce/upload/16_1.jpeg', 0),
(32, 'upload/17_0.png', 107967, '/ecommerce/upload/17_0.png', 'C:/xampp/htdocs/ecommerce/upload/17_0.png', 0),
(33, 'upload/18_0.png', 1763857, '/ecommerce/upload/18_0.png', 'C:/xampp/htdocs/ecommerce/upload/18_0.png', 0),
(34, 'upload/19_0.png', 107967, '/ecommerce/upload/19_0.png', 'C:/xampp/htdocs/ecommerce/upload/19_0.png', 0),
(35, 'upload/20_0.png', 1763857, '/ecommerce/upload/20_0.png', 'C:/xampp/htdocs/ecommerce/upload/20_0.png', 0),
(36, 'upload/21_0.png', 107967, '/ecommerce/upload/21_0.png', 'C:/xampp/htdocs/ecommerce/upload/21_0.png', 0),
(37, 'upload/22_0.png', 1763857, '/ecommerce/upload/22_0.png', 'C:/xampp/htdocs/ecommerce/upload/22_0.png', 0),
(38, 'upload/23_0.png', 323404, '/ecommerce/upload/23_0.png', 'C:/xampp/htdocs/ecommerce/upload/23_0.png', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `precio` double NOT NULL,
  `existencia` int(5) NOT NULL,
  `descripcion` varchar(400) NOT NULL,
  `activo` tinyint(1) DEFAULT 1,
  `categoria` varchar(255) DEFAULT NULL,
  `talla` varchar(255) DEFAULT NULL,
  `tipo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `precio`, `existencia`, `descripcion`, `activo`, `categoria`, `talla`, `tipo`) VALUES
(13, 'Pantalones bonitos', 12, 23, 'asndf', 1, 'temporada', 'S', 'camisa'),
(16, 'sad', 12, 23, 'adad', 1, 'temporada', 'S', ''),
(18, 'pan', 12, 32, 'jsdba', 1, 'estudiante', NULL, NULL),
(19, 'Pantalon uwu', 20, 31, 'Nose', 1, 'niño', NULL, NULL),
(20, 'Panss', 12, 23, 'nose', 1, 'hombre', 'S', NULL),
(22, 'Camiseta', 21, 32, 'nose', 1, 'mujer', NULL, NULL),
(23, 'Panaa', 12, 23, 'uwu', 1, 'mujer', 'S', 'camisa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_files`
--

CREATE TABLE `productos_files` (
  `producto_id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos_files`
--

INSERT INTO `productos_files` (`producto_id`, `file_id`) VALUES
(13, 15),
(13, 16),
(13, 19),
(16, 30),
(16, 31),
(18, 33),
(19, 34),
(20, 35),
(22, 37),
(23, 38);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recibe`
--

CREATE TABLE `recibe` (
  `id` int(5) NOT NULL,
  `idCli` int(5) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `direccion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `recibe`
--

INSERT INTO `recibe` (`id`, `idCli`, `nombre`, `email`, `direccion`) VALUES
(3, 1, 'noseaa', 'nose@hotmail.com', 'uwu'),
(37, 3, '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `pass`, `nombre`) VALUES
(2, 'hola@hotmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'hola'),
(3, 'bryan@nose.com', 'a01610228fe998f515a72dd730294d87', 'Bryan Shiguango'),
(6, 'nicole@hotmail.com', 'b8b4b727d6f5d1b61fff7be687f7970f', 'Nicole Anahi'),
(7, 'xd@hotmail.com', 'a01610228fe998f515a72dd730294d87', 'xd'),
(8, 'admin@admin.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `idCli` int(5) NOT NULL,
  `idPago` varchar(255) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `idCli`, `idPago`, `fecha`) VALUES
(1, 1, 'ch_3ORmlKK3mpQlvJke00WeM6HW', '2023-12-26 21:22:28'),
(2, 1, 'ch_3ORmuXK3mpQlvJke1FxNPuUk', '2023-12-26 21:31:58'),
(3, 1, 'ch_3ORmxYK3mpQlvJke11MBSURv', '2023-12-26 21:35:05'),
(4, 1, 'ch_3ORn04K3mpQlvJke0qhf1jzx', '2023-12-26 21:37:41'),
(5, 1, 'ch_3ORn0oK3mpQlvJke0gWDp4nu', '2023-12-26 21:38:27'),
(6, 1, 'ch_3ORn7vK3mpQlvJke16xbJ6m1', '2023-12-26 21:45:48'),
(7, 1, 'ch_3ORnCJK3mpQlvJke1XJrJFkM', '2023-12-26 21:50:21'),
(8, 1, 'ch_3ORnElK3mpQlvJke0OWbKqNa', '2023-12-26 21:52:52'),
(9, 1, 'ch_3ORnkwK3mpQlvJke17lvCo8n', '2023-12-26 22:26:07'),
(10, 1, 'ch_3ORnseK3mpQlvJke03AmUoV3', '2023-12-26 22:34:05'),
(11, 1, 'ch_3ORntJK3mpQlvJke02rgRzTa', '2023-12-26 22:34:47'),
(12, 1, 'ch_3ORnv2K3mpQlvJke0SHuPwjE', '2023-12-26 22:36:33'),
(13, 1, 'ch_3ORnwHK3mpQlvJke05juQ3Gh', '2023-12-26 22:37:50'),
(14, 1, 'ch_3ORnxuK3mpQlvJke1igfXVpJ', '2023-12-26 22:39:31'),
(15, 1, 'ch_3ORoAFK3mpQlvJke0o1GEOAO', '2023-12-26 22:52:16'),
(16, 1, 'ch_3OS4AUK3mpQlvJke1hkWXLCC', '2023-12-27 15:57:34'),
(17, 1, 'ch_3OSU85K3mpQlvJke0TUyWD77', '2023-12-28 19:40:48'),
(18, 1, 'ch_3OSUdcK3mpQlvJke10mq2uZ8', '2023-12-28 20:13:23'),
(19, 1, 'ch_3OSUeDK3mpQlvJke0k52cL6y', '2023-12-28 20:14:00'),
(20, 1, 'ch_3OSUnTK3mpQlvJke0of70fMe', '2023-12-28 20:23:34'),
(21, 1, 'ch_3OUd5UK3mpQlvJke0noJrekj', '2024-01-03 17:39:02'),
(22, 1, 'ch_3OUu89K3mpQlvJke1PO1898O', '2024-01-04 11:50:54'),
(23, 1, 'ch_3OVhohK3mpQlvJke0emkqtTj', '2024-01-06 16:54:07'),
(24, 1, 'ch_3OYNzdK3mpQlvJke03rw173E', '2024-01-14 02:20:29'),
(25, 1, 'ch_3OYO3oK3mpQlvJke1IfRSMcX', '2024-01-14 02:24:47'),
(26, 1, 'ch_3OYO4RK3mpQlvJke0lQiIt1J', '2024-01-14 02:25:26'),
(27, 1, 'ch_3OYO8GK3mpQlvJke1kZSWf5o', '2024-01-14 02:29:23'),
(28, 1, 'ch_3ObQJJK3mpQlvJke0gkkQgAI', '2024-01-22 11:25:19'),
(29, 1, 'ch_3ObmyjK3mpQlvJke1cWJD03t', '2024-01-23 11:37:35'),
(30, 1, 'ch_3Od3wyK3mpQlvJke01gOMp01', '2024-01-26 23:57:02'),
(31, 3, 'ch_3OdgjuK3mpQlvJke1Ul5PUQF', '2024-01-28 17:22:08'),
(32, 1, 'ch_3OdxrWK3mpQlvJke0DAxKClc', '2024-01-29 11:39:10'),
(33, 1, 'ch_3OeJx5K3mpQlvJke0aZbc8Av', '2024-01-30 11:14:21'),
(34, 1, 'ch_3OeJy4K3mpQlvJke1pUV61kz', '2024-01-30 11:15:22'),
(35, 1, 'ch_3OeK85K3mpQlvJke0M5Dd6AS', '2024-01-30 11:25:43');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kEmail` (`email`);

--
-- Indices de la tabla `detalleventas`
--
ALTER TABLE `detalleventas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkidProd` (`idProd`) USING BTREE,
  ADD KEY `fkidVenta` (`idVenta`) USING BTREE;

--
-- Indices de la tabla `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `recibe`
--
ALTER TABLE `recibe`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fkIdCli` (`idCli`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kEmail` (`email`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkidCli` (`idCli`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `detalleventas`
--
ALTER TABLE `detalleventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `recibe`
--
ALTER TABLE `recibe`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalleventas`
--
ALTER TABLE `detalleventas`
  ADD CONSTRAINT `idPro` FOREIGN KEY (`idProd`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idVenta` FOREIGN KEY (`idVenta`) REFERENCES `ventas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `idCli` FOREIGN KEY (`idCli`) REFERENCES `clientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
