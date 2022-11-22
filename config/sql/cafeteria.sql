-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-11-2022 a las 15:31:41
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cafeteria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblinventario`
--

CREATE TABLE `tblinventario` (
  `inv_id` int(30) UNSIGNED NOT NULL,
  `inv_nombre_producto` varchar(50) NOT NULL,
  `inv_referencia` varchar(50) NOT NULL,
  `inv_precio` int(10) UNSIGNED NOT NULL,
  `inv_peso` int(10) UNSIGNED NOT NULL,
  `inv_categoria` varchar(50) NOT NULL,
  `inv_stock` int(10) UNSIGNED NOT NULL,
  `inv_fecha_creacion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblinventario`
--

INSERT INTO `tblinventario` (`inv_id`, `inv_nombre_producto`, `inv_referencia`, `inv_precio`, `inv_peso`, `inv_categoria`, `inv_stock`, `inv_fecha_creacion`) VALUES
(1, 'Pandebono', '000111', 1000, 4, 'Harinas', 10, '2022-11-21'),
(2, 'Empanada', '000432', 1200, 10, 'Fritanga', 30, '2022-11-21'),
(3, 'Jugo HIT', '000138', 2500, 44, 'Bebidas', 100, '2022-11-21'),
(4, 'Papas Margarita', '000123', 1800, 115, 'Empaquetados', 15, '2022-11-21'),
(5, 'Agua Brisa', '000148', 3000, 600, 'Bebidas', 5, '2022-11-21'),
(6, 'Cafe', '00456', 1200, 56, 'Bebidas', 19, '2022-11-21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblventa_producto`
--

CREATE TABLE `tblventa_producto` (
  `ven_pro_id` int(30) UNSIGNED NOT NULL,
  `tblinventario_inv_id` int(30) UNSIGNED NOT NULL,
  `ven_pro_cantidad_vendida` int(10) UNSIGNED NOT NULL,
  `ven_pro_precio` int(10) UNSIGNED NOT NULL,
  `ven_pro_valor_total` int(10) UNSIGNED NOT NULL,
  `ven_pro_fecha_registro` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblventa_producto`
--

INSERT INTO `tblventa_producto` (`ven_pro_id`, `tblinventario_inv_id`, `ven_pro_cantidad_vendida`, `ven_pro_precio`, `ven_pro_valor_total`, `ven_pro_fecha_registro`) VALUES
(1, 6, 2, 1200, 2400, '2022-11-21');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tblinventario`
--
ALTER TABLE `tblinventario`
  ADD PRIMARY KEY (`inv_id`);

--
-- Indices de la tabla `tblventa_producto`
--
ALTER TABLE `tblventa_producto`
  ADD PRIMARY KEY (`ven_pro_id`),
  ADD KEY `tblinventario_inv_id` (`tblinventario_inv_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tblinventario`
--
ALTER TABLE `tblinventario`
  MODIFY `inv_id` int(30) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tblventa_producto`
--
ALTER TABLE `tblventa_producto`
  MODIFY `ven_pro_id` int(30) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tblventa_producto`
--
ALTER TABLE `tblventa_producto`
  ADD CONSTRAINT `tblventa_producto_ibfk_1` FOREIGN KEY (`tblinventario_inv_id`) REFERENCES `tblinventario` (`inv_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
