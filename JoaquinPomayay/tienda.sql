-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-05-2025 a las 18:41:25
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleventa`
--

CREATE TABLE `detalleventa` (
  `ID` int(11) NOT NULL,
  `IDVENTA` int(11) NOT NULL,
  `IDPRODUCTO` int(11) NOT NULL,
  `PRECIOUNITARIO` decimal(20,2) NOT NULL,
  `CANTIDAD` int(11) NOT NULL,
  `DESCARGADO` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalleventa`
--

INSERT INTO `detalleventa` (`ID`, `IDVENTA`, `IDPRODUCTO`, `PRECIOUNITARIO`, `CANTIDAD`, `DESCARGADO`) VALUES
(1, 7, 7, 235.60, 1, 0),
(2, 7, 1, 179.00, 1, 0),
(3, 7, 3, 79.95, 1, 0),
(4, 8, 7, 235.60, 1, 0),
(5, 8, 1, 179.00, 1, 0),
(6, 8, 3, 79.95, 1, 0),
(7, 9, 7, 235.60, 1, 0),
(8, 9, 1, 179.00, 1, 0),
(9, 9, 3, 79.95, 1, 0),
(10, 10, 7, 235.60, 1, 0),
(11, 10, 1, 179.00, 1, 0),
(12, 10, 3, 79.95, 1, 0),
(13, 11, 1, 179.00, 1, 0),
(14, 11, 3, 79.95, 1, 0),
(15, 12, 1, 179.00, 1, 0),
(16, 12, 3, 79.95, 1, 0),
(17, 13, 1, 179.00, 1, 0),
(18, 13, 3, 79.95, 1, 0),
(19, 14, 1, 179.00, 1, 0),
(20, 14, 3, 79.95, 1, 0),
(21, 15, 2, 178.42, 1, 0),
(22, 15, 3, 79.95, 1, 0),
(23, 16, 2, 178.42, 1, 0),
(24, 16, 3, 79.95, 1, 0),
(25, 17, 2, 178.42, 1, 0),
(26, 17, 3, 79.95, 1, 0),
(27, 18, 3, 79.95, 1, 0),
(28, 19, 3, 79.95, 1, 0),
(29, 20, 3, 79.95, 1, 0),
(30, 21, 3, 79.95, 1, 0),
(31, 22, 3, 79.95, 1, 0),
(32, 23, 3, 79.95, 1, 0),
(33, 24, 3, 79.95, 1, 0),
(34, 25, 1, 179.00, 1, 0),
(35, 25, 7, 235.60, 1, 0),
(36, 25, 1, 179.00, 1, 0),
(37, 26, 6, 119.00, 1, 0),
(38, 26, 7, 235.60, 1, 0),
(39, 27, 6, 119.00, 1, 0),
(40, 27, 7, 235.60, 1, 0),
(41, 28, 6, 119.00, 1, 0),
(42, 28, 7, 235.60, 1, 0),
(43, 28, 1, 179.00, 1, 0),
(44, 29, 6, 119.00, 1, 0),
(45, 29, 7, 235.60, 1, 0),
(46, 29, 1, 179.00, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Precio` decimal(20,2) NOT NULL,
  `Descripcion` text NOT NULL,
  `Imagen` varchar(255) NOT NULL,
  `categoria` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`ID`, `Nombre`, `Precio`, `Descripcion`, `Imagen`, `categoria`) VALUES
(1, 'Zapato Cuero Zaid', 179.00, 'Zapatos de cuero zaid de buena calidad', 'https://tiendasel.vteximg.com.br/arquivos/ids/23627961-1000-1000/-te-presentamos-la-nueva-coleccion-de-zapatos-de-vestir-para-caballero-neider-hechos-con-100--cuero-para-que-puedas-lucir-zapatos-elegantes-y-pueda.jpg?v=638768991575700000', 'zapatos'),
(2, 'Bata Zapatos Casuales Hombre', 178.42, 'Zapatos elegantes marrones', 'https://pieers.com/media/catalog/product/cache/334416996b13b45056f516cf8b55981c/p/p/ppr0c900tfe_1.jpg', 'zapatos'),
(3, 'Zapato de Vestir Madison', 79.95, 'Zapato de vestir marrón de calidad ', 'https://tiendasel.vteximg.com.br/arquivos/ids/19958565-455-455/-te-presentamos-la-nueva-coleccion-de-zapatos-de-vestir-para-caballero-neider-hechos-con-100--cuero-para-que-puedas-lucir-zapatos-elegantes-y-pueda.jpg?v=638294602067570000', 'zapatos'),
(4, 'Lifestyle Ultra Fashion', 144.00, 'Zapatillas para hombre lifestyle', 'https://www.ultralon.com.pe/cdn/shop/files/UL2003M-2_1_341116a1-29ed-4ca8-aa69-d742be825b9a.jpg?v=1745368624', 'zapatilla'),
(5, 'Zapato Derby Casual ANGELO', 249.90, 'Zapato para hombre de marca derby', 'https://dauss.com.pe/cdn/shop/files/109.jpg?v=1727384199&width=416', 'zapatos'),
(6, 'Mocasines Mujer Negro', 119.00, 'Mocasines de mujer de cuero', 'https://oechsle.vteximg.com.br/arquivos/ids/17084306-1000-1000/imageUrl_1.jpg?v=638388162178930000', 'mocasines'),
(7, 'Mocasines Boston de cuero', 235.60, 'Mocasines Boston de cuero marrones', 'https://mariohernandez.vtexassets.com/arquivos/ids/213196/mocasin-virrey-cafe-premium_1.jpg?v=637891680658000000', 'mocasines'),
(8, 'Vizzano Mujeres', 129.00, 'Tacones vizzano color plomo claro', 'https://mercury.vtexassets.com/arquivos/ids/15643226-800-800?v=638398118774100000&width=800&height=800&aspect=true', 'tacones'),
(9, 'Loken Step Mujer Azu taco', 100.00, 'Tacones para mujer de marca loken step', 'https://vialepe.vtexassets.com/arquivos/ids/181942/ZAPATO-STILETTO-VESTIR-MUJER-SINTETICO-PIAZZA-TACO-7-KALU-003-AZUL-1.jpg?v=638539847025970000', 'tacones'),
(10, 'Outlet Stocklots', 89.00, 'Outlet Stocklots taco negro', 'https://vialepe.vtexassets.com/arquivos/ids/177856/ZAPATO-STILETTO-VESTIR-MUJER-SINTETICO-PIAZZA-TACO-7-DON-092-NEGRO-1.jpg?v=638539831192130000', 'tacones'),
(11, 'Zapato Milos', 167.30, 'Zapatos milos para niños', 'https://resources.claroshop.com/medios-plazavip/mkt/63b742ae6712f_cl100011m-milo-04jpg.jpg', 'zapatos'),
(12, 'Zapatos Daniel Azul', 130.00, 'Zapatos daniel azul para niños', 'https://dauss.com.pe/cdn/shop/files/86.jpg?v=1727384618&width=1946', 'zapatos'),
(13, 'Mocasines Casuales Bata', 97.93, 'Mocasines Casuales de bata', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR8s3sYxWMYsF7CDHFAI3QmkPoR0F92jXzX3w&s', 'mocasines'),
(14, 'MOCASINES JUVENILES', 119.90, 'Mocasines juveniles', 'https://www.billygin.pe/cdn/shop/products/Diapositiva81.png?v=1663880853', 'mocasines'),
(15, 'Mocasines para Mujer Modare', 139.90, 'Mocasines para mujeres', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQqD07tx9o18EKj9nPM55t7kUnpMrSzUrycug&s', 'mocasines'),
(16, 'Zapatillas de Running Switch Move', 179.00, 'Zapatillas running', 'https://oechsle.vtexassets.com/arquivos/ids/16636746/2460305.jpg?v=638339499671000000', 'zapatilla'),
(17, 'Originals Mujer Adidas Ozmillen', 429.00, 'Zapatillas para mujer originals', 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/901b03b3e00f4718b3353030d6a6cd07_9366/Zapatillas_OZMILLEN_Blanco_IF9500_01_00_standard.jpg', 'zapatilla'),
(18, 'Originals Hombre Adidas Ozmillen', 429.90, 'Originals Hombre Adidas Ozmillen', 'https://thn.pe/cdn/shop/files/ID5719_1.jpg?v=1713997108', 'zapatilla'),
(19, 'Zapato Chalada Mujer Dune', 169.91, 'Zapatos tacos para mujer', 'https://www.chalada.pe/cdn/shop/files/11-dune-4-negro-1-43247549-5209-4ac6-8637-66023506d8e5_1200x.jpg?v=1738968439', 'tacones');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `ID` int(11) NOT NULL,
  `ClaveTransaccion` varchar(250) NOT NULL,
  `PaypalDatos` text NOT NULL,
  `Fecha` datetime NOT NULL,
  `Correo` varchar(500) NOT NULL,
  `Total` decimal(60,2) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`ID`, `ClaveTransaccion`, `PaypalDatos`, `Fecha`, `Correo`, `Total`, `status`) VALUES
(1, '12345678910', '', '2025-05-11 23:34:44', 'adrianwies@gmail.com', 700.00, 'pendiente'),
(2, '12345678910', '', '2025-05-11 23:36:13', 'adrian_wv@gmail.com', 1000.00, 'pendiente'),
(3, '12345678910', '', '2025-05-11 23:36:13', 'adrian_wv@gmail.com', 1000.00, 'pendiente'),
(4, '3sprskf0e8o27th0a6gqea8dsc', '', '2025-05-11 16:45:07', 'adrianwv124@gmail.com', 533.60, 'pendiente'),
(5, '3sprskf0e8o27th0a6gqea8dsc', '', '2025-05-11 16:47:40', 'jorge@gmail.com', 613.55, 'pendiente'),
(6, '3sprskf0e8o27th0a6gqea8dsc', '', '2025-05-11 17:07:02', 'jorge1125@gmail.com', 613.55, 'pendiente'),
(7, '3sprskf0e8o27th0a6gqea8dsc', '', '2025-05-11 17:08:27', 'pao444@hotmail.com', 494.55, 'pendiente'),
(8, '3sprskf0e8o27th0a6gqea8dsc', '', '2025-05-11 17:13:55', 'sdasdsd@hotmail.com', 494.55, 'pendiente'),
(9, '3sprskf0e8o27th0a6gqea8dsc', '', '2025-05-11 17:14:44', 'dsasda@hoymai', 494.55, 'pendiente'),
(10, '3sprskf0e8o27th0a6gqea8dsc', '', '2025-05-11 17:16:12', 'adrainjorge@hotmail.com', 494.55, 'pendiente'),
(11, '3sprskf0e8o27th0a6gqea8dsc', '', '2025-05-11 17:22:31', 'smaria@hgmail.com', 258.95, 'pendiente'),
(12, '3sprskf0e8o27th0a6gqea8dsc', '', '2025-05-11 17:38:03', 'pao.7.25@hotmail.com', 258.95, 'pendiente'),
(13, '3sprskf0e8o27th0a6gqea8dsc', '', '2025-05-11 17:43:05', 'adrianyyx@hotmail.com', 258.95, 'pendiente'),
(14, '3sprskf0e8o27th0a6gqea8dsc', '', '2025-05-11 17:44:07', 'taba@hoymai', 258.95, 'pendiente'),
(15, 'v9v29tveqv6h4sd5arfhn9l86j', '', '2025-05-11 18:38:00', 'pao.7.25@hotmail.com', 258.37, 'pendiente'),
(16, 'v9v29tveqv6h4sd5arfhn9l86j', '', '2025-05-11 18:39:50', 'pao.7.25@hotmail.com', 258.37, 'pendiente'),
(17, 'v9v29tveqv6h4sd5arfhn9l86j', '', '2025-05-11 18:46:40', 'adrianyyx@hotmail.com', 258.37, 'pendiente'),
(18, 'nvqmku2tierrhqt9n25n2mbakp', '', '2025-05-11 18:47:45', 'pao.7.25@hotmail.com', 79.95, 'pendiente'),
(19, 'nvqmku2tierrhqt9n25n2mbakp', '', '2025-05-11 18:48:47', 'pao.7.25@hotmail.com', 79.95, 'pendiente'),
(20, 'e68hmt68t84f0v3bdcba4l66hf', '', '2025-05-11 18:50:45', 'ASDSASD@HY', 79.95, 'pendiente'),
(21, 'e68hmt68t84f0v3bdcba4l66hf', '', '2025-05-11 19:00:01', 'adrianyyx@hotmail.com', 79.95, 'pendiente'),
(22, 'u4nvopqjae6e6mh3qglg5r7dfi', '', '2025-05-11 19:08:15', 'jorge@gmail.com', 79.95, 'pendiente'),
(23, 'nstfpd34bie14rh73g0nf0j7vp', '', '2025-05-11 19:17:29', 'adrianyyx@hotmail.com', 79.95, 'pendiente'),
(24, '186rmrauhjpulbpffv443mjgei', '', '2025-05-11 19:24:55', 'sb-i547ej41451238@business.example.com', 79.95, 'pendiente'),
(25, 'egcrr8bnf97j0algremckfkesh', '', '2025-05-11 19:29:44', 'sb-i547ej41451238@business.example.com', 593.60, 'pendiente'),
(26, '1hoemabidlm0g21pn0qfhsv4r0', '', '2025-05-14 10:12:26', 'pao.7.25@hotmail.com', 354.60, 'pendiente'),
(27, '1hoemabidlm0g21pn0qfhsv4r0', '', '2025-05-14 10:13:20', 'pao.7.25@hotmail.com', 354.60, 'pendiente'),
(28, '1hoemabidlm0g21pn0qfhsv4r0', '', '2025-05-14 10:36:17', 'pao.7.25@hotmail.com', 533.60, 'pendiente'),
(29, '1hoemabidlm0g21pn0qfhsv4r0', '', '2025-05-14 10:42:16', 'pao.7.25@hotmail.com', 533.60, 'pendiente');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `IDVENTA` (`IDVENTA`),
  ADD KEY `IDPRODUCTO` (`IDPRODUCTO`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  ADD CONSTRAINT `detalleventa_ibfk_1` FOREIGN KEY (`IDVENTA`) REFERENCES `ventas` (`ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `detalleventa_ibfk_2` FOREIGN KEY (`IDPRODUCTO`) REFERENCES `producto` (`ID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
