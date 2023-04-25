-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 22-04-2023 a las 10:02:59
-- Versión del servidor: 8.0.30
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `peluqueriadb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citacorte`
--

CREATE TABLE `citacorte` (
  `id_cita` int NOT NULL,
  `fecha_cita` date DEFAULT NULL,
  `hora_cita` time DEFAULT NULL,
  `id_cliente` int DEFAULT NULL,
  `id_empleado` int DEFAULT NULL,
  `id_tipocorte` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int NOT NULL,
  `nombre_cliente` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `apellido1_cliente` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `apellido2_cliente` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `dni_cliente` varchar(20) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `telefonomovil_cliente` varchar(15) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `nombreusuario_cliente` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `correo_cliente` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `id_rol` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cortepelo`
--

CREATE TABLE `cortepelo` (
  `id_cortepelo` int NOT NULL,
  `nombre_cortepelo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `descripcion_cortepelo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `precio_cortepelo` int DEFAULT NULL,
  `id_tipocorte` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `cortepelo`
--

INSERT INTO `cortepelo` (`id_cortepelo`, `nombre_cortepelo`, `descripcion_cortepelo`, `precio_cortepelo`, `id_tipocorte`) VALUES
(1, 'Corte de pelo clásico', 'Corte de pelo atemporal en el que se corta el cabello a una longitud uniforme en la parte superior y se reduce en la parte inferior.', 20, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `id_empleado` int NOT NULL,
  `nombre_empleado` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `apellido1_empleado` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `apellido2_empleado` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `dni_empleado` varchar(20) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `correo_empleado` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `nombreusuario_empleado` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `id_rol` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int NOT NULL,
  `descripcion_rol` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `id_usuario` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `descripcion_rol`, `id_usuario`) VALUES
(1, 'empleado', 1),
(2, 'cliente', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipocorte`
--

CREATE TABLE `tipocorte` (
  `id_tipocorte` int NOT NULL,
  `nombre_tipocorte` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `descripcion_tipocorte` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `id_cortepelo` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tipocorte`
--

INSERT INTO `tipocorte` (`id_tipocorte`, `nombre_tipocorte`, `descripcion_tipocorte`, `id_cortepelo`) VALUES
(1, 'Pelo corto', 'Cortes para pelo corto.', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int NOT NULL,
  `nombre_usuario` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `password_usuario` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre_usuario`, `password_usuario`) VALUES
(1, 'pepe', '$2y$10$cgaFTDCABqWpxpyGCDxysukF.YXBCrVpyIym/iYYaky84uaoZFJha'),
(2, 'luisa', '$2y$10$OnQaCcA/jAcDIp2BpO.e3.GnEqBCgjWNmTVF8lMFBdlmAtLP3JVJG');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citacorte`
--
ALTER TABLE `citacorte`
  ADD PRIMARY KEY (`id_cita`),
  ADD KEY `id_cliente` (`id_cliente`,`id_empleado`,`id_tipocorte`),
  ADD KEY `citacorte_ibfk_2` (`id_empleado`),
  ADD KEY `citacorte_ibfk_3` (`id_tipocorte`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`),
  ADD KEY `id_rol` (`id_rol`);

--
-- Indices de la tabla `cortepelo`
--
ALTER TABLE `cortepelo`
  ADD PRIMARY KEY (`id_cortepelo`),
  ADD KEY `id_tipocorte` (`id_tipocorte`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id_empleado`),
  ADD KEY `id_rol` (`id_rol`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `tipocorte`
--
ALTER TABLE `tipocorte`
  ADD PRIMARY KEY (`id_tipocorte`),
  ADD KEY `id_cortepelo` (`id_cortepelo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citacorte`
--
ALTER TABLE `citacorte`
  MODIFY `id_cita` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cortepelo`
--
ALTER TABLE `cortepelo`
  MODIFY `id_cortepelo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id_empleado` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipocorte`
--
ALTER TABLE `tipocorte`
  MODIFY `id_tipocorte` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `citacorte`
--
ALTER TABLE `citacorte`
  ADD CONSTRAINT `citacorte_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `citacorte_ibfk_2` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id_empleado`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `citacorte_ibfk_3` FOREIGN KEY (`id_tipocorte`) REFERENCES `tipocorte` (`id_tipocorte`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Filtros para la tabla `cortepelo`
--
ALTER TABLE `cortepelo`
  ADD CONSTRAINT `cortepelo_ibfk_1` FOREIGN KEY (`id_tipocorte`) REFERENCES `tipocorte` (`id_tipocorte`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `empleado_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Filtros para la tabla `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `roles_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Filtros para la tabla `tipocorte`
--
ALTER TABLE `tipocorte`
  ADD CONSTRAINT `tipocorte_ibfk_1` FOREIGN KEY (`id_cortepelo`) REFERENCES `cortepelo` (`id_cortepelo`) ON DELETE RESTRICT ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
