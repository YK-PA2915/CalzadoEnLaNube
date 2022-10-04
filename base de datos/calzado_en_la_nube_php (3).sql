-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-09-2022 a las 18:41:09
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `calzado_en_la_nube_php`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `codigo_categoria` int(11) NOT NULL,
  `nombre_categoria` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`codigo_categoria`, `nombre_categoria`) VALUES
(0, ''),
(1, 'deportivo'),
(2, 'casual'),
(3, 'elegante'),
(4, 'formal'),
(5, 'informal'),
(22, 'hhghfhfh');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `id_compra` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `cantidad_pdto` int(11) NOT NULL,
  `valor_total` decimal(10,2) NOT NULL,
  `fk_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`id_compra`, `fecha`, `cantidad_pdto`, `valor_total`, `fk_usuario`) VALUES
(6, '2022-04-20', 5, '40000.00', 1),
(7, '2021-04-05', 3, '420000.00', 2),
(8, '2022-03-05', 4, '520000.00', 6),
(9, '2022-02-05', 2, '240000.00', 6),
(10, '2021-01-05', 1, '100000.00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_compra`
--

CREATE TABLE `detalle_compra` (
  `valor_total` decimal(10,2) NOT NULL,
  `domicilio` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `metodo_pago` enum('digital','fisico') COLLATE utf8mb4_spanish2_ci NOT NULL,
  `fk_producto` int(11) NOT NULL,
  `fk_compra` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `detalle_compra`
--

INSERT INTO `detalle_compra` (`valor_total`, `domicilio`, `cantidad`, `metodo_pago`, `fk_producto`, `fk_compra`) VALUES
('40000.00', 'Cra 5 17-15', 1, 'fisico', 1, 6),
('420000.00', 'Cra 5 17-16', 3, 'digital', 4, 7),
('520000.00', 'Cra 5 17-18', 4, 'fisico', 5, 8),
('240000.00', 'Cra 5 17-19', 2, 'fisico', 3, 9),
('100000.00', 'Cra 5 17-20', 1, 'digital', 2, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE `empresas` (
  `NIT` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `nombre_emp` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `telefono_emp` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `direccion_emp` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `id_propietario` int(11) NOT NULL,
  `nombre_propi` varchar(11) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `rol_id_em` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `empresas`
--

INSERT INTO `empresas` (`NIT`, `nombre_emp`, `telefono_emp`, `direccion_emp`, `id_propietario`, `nombre_propi`, `password`, `rol_id_em`) VALUES
('1', 'sarashoes', '3001235645', 'cra 5#9-5', 1015994114, '0', 'mn', 1),
('1075317893-5', 'zapaticos', '3203460642', 'pleno centro de pitalito', 1075317893, 'joselito', 'mm', 1),
('2', 'Saker tienda', '3152024835', 'cra 3#9-5', 1015994115, '0', '0', 1),
('3', 'Maranatha Shoes', '3142696735', 'cra 2 #9-5', 1015994114, '0', '0', 1),
('4', 'La bodega del calzado', '3106696194', 'cra 7 #9-5', 1015994115, '0', '0', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_pdto` int(11) NOT NULL,
  `imagen_pdto` varchar(150) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `nombre_pdto` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `descripcion_pdto` varchar(150) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `talla` enum('33','34','35','36','37','38','39','40','41','42','43') COLLATE utf8mb4_spanish2_ci NOT NULL,
  `valor_pdto` decimal(10,2) NOT NULL,
  `descuento` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `fk_codigo_categ` int(11) NOT NULL,
  `fk_empresa` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_pdto`, `imagen_pdto`, `nombre_pdto`, `descripcion_pdto`, `talla`, `valor_pdto`, `descuento`, `stock`, `fk_codigo_categ`, `fk_empresa`) VALUES
(1, '', 'sandalias adidass', 'sandalia para dama de color rosada con cinta ancha', '34', '40000.00', 0, 20, 1, '1'),
(2, '', 'Tennis arcoiris', 'tennis con suela baja de color azul,morado,verde,amarillo para hombre', '33', '100000.00', 0, 2, 2, '1'),
(3, 'img/logo.png', 'botas campestres', 'Bota de color negra de caucho con plataforma alta para caballero', '33', '120000.00', 0, 3, 3, '1'),
(4, '', 'botines llaneros', 'calzado con tacon ancho, color cafe para dama', '33', '130000.00', 0, 4, 3, '1'),
(5, '', 'zapato elegantes', 'zapato comodo para homnbre con tacon medio', '33', '140000.00', 0, 10, 4, '2'),
(41, 'img/22.jpg', 'zapato blanco', 'zapato blanco para mujer clasico', '33', '70000.00', 5000, 20, 1, '1'),
(42, 'img/elegante.jpg', 'zapato clasico', 'zapato azul oscuro para hombre formal y a la vez clasico', '33', '90000.00', 0, 15, 3, '1'),
(43, 'img/zapato_alto.jpg', 'zapato rosa', 'tenis para dama  , comodos y de buena calidad', '33', '70000.00', 1000, 15, 5, '1'),
(44, 'img/zapato_arcoiris.jpg', 'zapato Arcoiris ', 'zapato para dama con colores muy particulares de un arcoiris', '33', '130000.00', 10000, 45, 2, '1'),
(47, 'img/{67C74605-360F-4C2D-A827-320C094EA121}.png.jpg', 'hfgfh', 'fhfhf', '34', '2000.00', 0, 20, 1, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `rol` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `rol`) VALUES
(1, 'empresa'),
(2, 'cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `identificacion` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `nombres` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `apellidos` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `telefono` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `direccion` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `correo` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `rol_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `identificacion`, `username`, `nombres`, `apellidos`, `telefono`, `direccion`, `correo`, `password`, `rol_id`) VALUES
(1, 1015994112, '1015994112', 'victor ', 'murcia', '123', '', '', 'victor', 2),
(2, 1015994113, '', 'marcos', 'fidel', '', '', '', '1234', 2),
(6, 1111, '', '111', '111', '111', '111', 'arizayeimi123@gmail.com', '1', 2),
(7, 1015994116, '', '22', '22', '22', '22', 'arizayeimi123@gmail.com', '2', 2),
(8, 1006956707, '1006956707', 'YEIMI', 'PEÑA', '3223836120', 'CLL 17', 'arizayeimi28@gmail.com', 'yeimi123', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`codigo_categoria`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`id_compra`),
  ADD KEY `realizan` (`fk_usuario`);

--
-- Indices de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  ADD KEY `fk_compra` (`fk_compra`),
  ADD KEY `fk_producto` (`fk_producto`);

--
-- Indices de la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`NIT`),
  ADD KEY `crea` (`rol_id_em`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_pdto`),
  ADD KEY `clasifican` (`fk_codigo_categ`),
  ADD KEY `crean` (`fk_empresa`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `tiene` (`rol_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_pdto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`fk_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  ADD CONSTRAINT `detalle_compra_ibfk_1` FOREIGN KEY (`fk_compra`) REFERENCES `compra` (`id_compra`),
  ADD CONSTRAINT `detalle_compra_ibfk_2` FOREIGN KEY (`fk_producto`) REFERENCES `productos` (`id_pdto`);

--
-- Filtros para la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD CONSTRAINT `crea` FOREIGN KEY (`rol_id_em`) REFERENCES `roles` (`id`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `RECREA` FOREIGN KEY (`fk_empresa`) REFERENCES `empresas` (`NIT`),
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`fk_codigo_categ`) REFERENCES `categoria` (`codigo_categoria`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `tiene` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
