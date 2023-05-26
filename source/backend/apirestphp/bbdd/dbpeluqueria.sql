-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 23-05-2023 a las 21:54:41
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
-- Base de datos: `dbpeluqueria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita`
--

CREATE TABLE `cita` (
  `id_cita` int NOT NULL,
  `hora` time NOT NULL,
  `fecha` date NOT NULL,
  `id_cliente` int NOT NULL,
  `id_tipocorte` int NOT NULL,
  `id_corte` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int NOT NULL,
  `nombre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellido` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `dni` varchar(9) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `movil` int DEFAULT NULL,
  `id_rol` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `corte`
--

CREATE TABLE `corte` (
  `id_corte` int NOT NULL,
  `nombre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `descripcion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `precio` int NOT NULL,
  `id_tipocorte` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `corte`
--

INSERT INTO `corte` (`id_corte`, `nombre`, `descripcion`, `precio`, `id_tipocorte`) VALUES
(1, 'French Crop', 'El cabello se corta corto en los lados y la parte trasera, mientras que la parte superior se deja un poco más larga y se peina hacia adelante o ligeramente hacia arriba.', 25, 1),
(2, 'Caesar', 'El cabello se corta en capas cortas y se cepilla hacia adelante, creando una línea recta en la parte frontal. Los lados y la parte posterior también se cortan cortos.', 20, 2),
(3, 'Quiff', 'La parte superior se corta más larga y se peina hacia arriba y hacia atrás, creando un efecto de volumen y textura. Los lados pueden ser cortos o degradados.', 30, 1),
(4, 'Mohawk', 'Los lados se rasuran o se cortan muy cortos, dejando una franja de cabello largo en la parte superior que se peina hacia arriba. Puede haber diferentes variaciones, como el Mohawk falso.', 35, 3),
(5, 'Flat Top', 'El cabello se corta a una longitud uniforme en la parte superior y luego se peina hacia arriba y se aplana, creando una apariencia plana y cuadrada en la parte superior de la cabeza.', 30, 4),
(6, 'Slicked Back', 'El cabello se corta en capas cortas en los lados y la parte posterior, mientras que la parte superior se deja lo suficientemente larga como para peinarla hacia atrás con un producto de peinado.', 25, 5),
(7, 'Faux Hawk', 'Similar al Mohawk, pero en lugar de afeitar los lados, se degradan o se cortan cortos. La parte central se peina hacia arriba para crear una cresta, pero de forma menos drástica que el Mohawk tradicional.', 30, 1),
(8, 'Comb Over', 'El cabello se corta corto en los lados y se peina hacia un lado con un acabado elegante. Puede haber diferentes variaciones, como el Comb Over Fade.', 25, 2),
(9, 'Taper', 'Los lados y la parte posterior se cortan gradualmente más cortos, mientras que la parte superior se puede dejar más larga. El resultado es un aspecto limpio y bien definido.', 20, 6),
(10, 'Crew Cut', 'El cabello se corta muy corto en los lados y la parte posterior, mientras que la parte superior se corta uniformemente. Es un corte de bajo mantenimiento y se adapta a diferentes formas de cara.', 20, 2),
(11, 'High and Tight', 'Los lados y la parte posterior se cortan muy cortos o se rasuran, mientras que la parte superior se mantiene corta pero ligeramente más larga que los lados. Se logra un contraste definido.', 25, 7),
(12, 'Texturizado', 'Se utiliza técnicas de corte y navaja para agregar textura y movimiento al cabello. Es un corte versátil que se puede estilizar de diferentes formas.', 30, 1),
(13, 'Longitud Media', 'El cabello se corta a una longitud media, permitiendo una variedad de estilos y peinados. Puede ser un corte en capas o uniforme, dependiendo de la preferencia del cliente.', 30, 9),
(14, 'Razor Fade', 'Se utiliza una navaja para crear un efecto de degradado en los lados y la parte posterior. La transición es suave y nítida, creando un aspecto limpio y bien definido.', 35, 1),
(15, 'Afro', 'Se trabaja con el cabello rizado o texturizado para mantener la longitud y la forma natural del afro. Puede requerir técnicas de recorte y mantenimiento regular.', 25, 8),
(16, 'Long Pompadour', 'El cabello se deja más largo en la parte superior y se peina hacia atrás con volumen y altura. Los lados se mantienen cortos para resaltar el estilo del pompadour.', 30, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `id` int NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellido` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `dni` varchar(9) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `movil` int DEFAULT NULL,
  `id_rol` int NOT NULL DEFAULT '1',
  `pass` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int NOT NULL,
  `rol` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT 'usuario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `rol`) VALUES
(1, 'admin'),
(2, 'usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_corte`
--

CREATE TABLE `tipo_corte` (
  `id_tipo_corte` int NOT NULL,
  `nombre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_corte`
--

INSERT INTO `tipo_corte` (`id_tipo_corte`, `nombre`) VALUES
(1, 'Moderno'),
(2, 'Clásico'),
(3, 'Audaz'),
(4, 'Estructurado'),
(5, 'Elegante'),
(6, 'Gradual'),
(7, 'Militar'),
(8, 'Estilizado'),
(9, 'Natural'),
(10, 'Retro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellido` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `dni` varchar(9) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `movil` int DEFAULT NULL,
  `id_rol` int NOT NULL,
  `pass` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cita`
--
ALTER TABLE `cita`
  ADD PRIMARY KEY (`id_cita`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_tipocorte` (`id_tipocorte`),
  ADD KEY `id_corte` (`id_corte`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_rol` (`id_rol`);

--
-- Indices de la tabla `corte`
--
ALTER TABLE `corte`
  ADD PRIMARY KEY (`id_corte`),
  ADD KEY `id_tipocorte` (`id_tipocorte`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_rol` (`id_rol`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_corte`
--
ALTER TABLE `tipo_corte`
  ADD PRIMARY KEY (`id_tipo_corte`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dni` (`dni`),
  ADD KEY `email` (`email`),
  ADD KEY `id_rol` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cita`
--
ALTER TABLE `cita`
  MODIFY `id_cita` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `corte`
--
ALTER TABLE `corte`
  MODIFY `id_corte` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_corte`
--
ALTER TABLE `tipo_corte`
  MODIFY `id_tipo_corte` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cita`
--
ALTER TABLE `cita`
  ADD CONSTRAINT `cita_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `roles_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Filtros para la tabla `corte`
--
ALTER TABLE `corte`
  ADD CONSTRAINT `tipocorte_ibfk_1` FOREIGN KEY (`id_tipocorte`) REFERENCES `tipo_corte` (`id_tipo_corte`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `rol_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
