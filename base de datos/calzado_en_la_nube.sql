-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-05-2022 a las 07:00:21
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `calzado_en_la_nube`
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
(1, 'deportivo'),
(2, 'casual'),
(3, 'elegante'),
(4, 'formal'),
(5, 'informal');

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
(6, '2022-04-20', 5, '40000.00', 1015994112),
(7, '2021-04-05', 3, '420000.00', 1015994113),
(8, '2022-03-05', 4, '520000.00', 1015994116),
(9, '2022-02-05', 2, '240000.00', 1015994112),
(10, '2021-01-05', 1, '100000.00', 1015994116);

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
  `NIT` int(11) NOT NULL,
  `nombre_emp` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `telefono_emp` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `direccion_emp` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `fk_id_propi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `empresas`
--

INSERT INTO `empresas` (`NIT`, `nombre_emp`, `telefono_emp`, `direccion_emp`, `fk_id_propi`) VALUES
(1, 'sarashoes', '3001235645', 'cra 5#9-5', 1015994114),
(2, 'Saker tienda', '3152024835', 'cra 3#9-5', 1015994115),
(3, 'Maranatha Shoes', '3142696735', 'cra 2 #9-5', 1015994114),
(4, 'La bodega del calzado', '3106696194', 'cra 7 #9-5', 1015994115);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_pdto` int(11) NOT NULL,
  `nombre_pdto` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `descripcion_pdto` varchar(150) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `valor_pdto` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `fk_empresa` int(11) NOT NULL,
  `fk_codigo_categ` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_pdto`, `nombre_pdto`, `descripcion_pdto`, `valor_pdto`, `stock`, `fk_empresa`, `fk_codigo_categ`) VALUES
(1, 'sandalias adidas', 'sandalia para dama de color rosada con cinta ancha', '40000.00', 20, 1, 1),
(2, 'Tennis arcoiris', 'tennis con suela baja de color azul,morado,verde,amarillo para hombre', '100000.00', 2, 3, 2),
(3, 'botas campestres', 'Bota de color negra de caucho con plataforma alta para caballero', '120000.00', 3, 4, 3),
(4, 'botines llaneros', 'calzado con tacon ancho, color cafe para dama', '130000.00', 4, 5, 3),
(5, 'zapato elegantes', 'zapato comodo para homnbre con tacon medio', '140000.00', 10, 6, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `login` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tipo_usuario` enum('consumidor','usuario') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombres`, `telefono`, `direccion`, `login`, `password`, `email`, `tipo_usuario`) VALUES
(1015994112, 'Jesus Nicolas', '3208646917', 'Calle2 sur #19', 'jesus2021*', 'Jesus2021Contraseña', 'jesus.ayerbe29@gnmail.com', 'consumidor'),
(1015994113, 'Jose Manuel', '3205680912', 'CRA 3 #3 45', 'jose2021*', 'Jose2021Contraseña', 'jose.manuel29@gnmail.com', 'consumidor'),
(1015994114, 'David Octavio', '3104657891', 'CALLE 9 sur 5 14', 'david2021*', 'David2021Contraseña', 'david.octavio29@gnmail.com', 'usuario'),
(1015994115, 'Maria Catalina', '3152345687', 'Cra7 sur MZ12 CS13', 'maria2021*', 'maria2021Contraseña', 'maria.catalina29@gnmail.com', 'usuario'),
(1015994116, 'Bonifacio Rafael', '3216780231', 'Calle 41 # 5 21', 'uribe2021*', 'Uribe2021Contraseña', 'uribe.ruiz29@gnmail.com', 'consumidor');

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
  ADD KEY `fk_id_propi` (`fk_id_propi`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_pdto`),
  ADD UNIQUE KEY `contiene` (`fk_empresa`),
  ADD KEY `clasifican` (`fk_codigo_categ`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

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
  MODIFY `id_pdto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`fk_usuario`) REFERENCES `usuarios` (`id_usuario`);

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
  ADD CONSTRAINT `empresas_ibfk_2` FOREIGN KEY (`fk_id_propi`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`fk_codigo_categ`) REFERENCES `categoria` (`codigo_categoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
