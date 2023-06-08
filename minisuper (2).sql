-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-06-2023 a las 05:26:05
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `minisuper`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `abonos`
--

CREATE TABLE `abonos` (
  `idAbono` int(10) NOT NULL,
  `cliente` text NOT NULL,
  `abono` double NOT NULL,
  `deudaTotal` double NOT NULL,
  `fechaAbono` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `idCliente` int(10) NOT NULL,
  `cliente` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`idCliente`, `cliente`) VALUES
(1, 'Maria del Carmen Gutierrez'),
(2, 'Jose Miguel Castillo Fuentes'),
(3, 'Juan Maldonado Perez'),
(4, 'Susana Hernandez Hernandez'),
(5, 'Francisco Mendez Ponce');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compraproductos`
--

CREATE TABLE `compraproductos` (
  `idComProd` int(10) NOT NULL,
  `seccion` text NOT NULL,
  `nomProd` text NOT NULL,
  `cantidad` double NOT NULL,
  `fechaCompra` date NOT NULL,
  `ttComProd` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `compraproductos`
--

INSERT INTO `compraproductos` (`idComProd`, `seccion`, `nomProd`, `cantidad`, `fechaCompra`, `ttComProd`) VALUES
(1, 'Dulcería', 'Goma de mascar Trident Xtra Care Cool 13.6g', 1, '2023-06-01', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compraprov`
--

CREATE TABLE `compraprov` (
  `idComProv` int(10) NOT NULL,
  `nomProv` text NOT NULL,
  `cosCom` double NOT NULL,
  `fechaCom` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deudas`
--

CREATE TABLE `deudas` (
  `idDeuCli` int(10) NOT NULL,
  `cliente` text NOT NULL,
  `deudaIni` double NOT NULL,
  `fechaDeuda` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perdidaproductos`
--

CREATE TABLE `perdidaproductos` (
  `idPerProd` int(10) NOT NULL,
  `seccion` text NOT NULL,
  `nomProd` text NOT NULL,
  `cantidad` double NOT NULL,
  `fechaPerd` date NOT NULL,
  `perdida` double NOT NULL,
  `motivo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perecederos`
--

CREATE TABLE `perecederos` (
  `idPere` int(10) NOT NULL,
  `nomProd` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idProd` int(10) NOT NULL,
  `nomProd` text NOT NULL,
  `seccion` text NOT NULL,
  `cosProd` double NOT NULL,
  `venProd` double NOT NULL,
  `utilBruProd` double NOT NULL,
  `uniMed` text NOT NULL,
  `perecedero` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idProd`, `nomProd`, `seccion`, `cosProd`, `venProd`, `utilBruProd`, `uniMed`, `perecedero`) VALUES
(1, 'Aceite Capullo 845ml', 'Abarrotes', 53.5, 63.5, 10.5, 'unidades', 0),
(2, 'Aceite Nutrioli 946ml', 'Abarrotes', 50, 60, 10, 'unidades', 0),
(3, 'Aceite 1 2 3, 1Lto', 'Abarrotes', 52, 62, 10, 'unidades', 0),
(4, 'Champinones Herdez rebanados 186g', 'Enlatados', 23.5, 28.5, 5, 'unidades', 0),
(5, 'Elote dorado La Costena 410g', 'Enlatados', 12.5, 15, 2.5, 'unidades', 0),
(6, 'Atun Tuny clasico en agua 140g', 'Enlatados', 19.5, 23.5, 4, 'unidades', 0),
(7, 'Leche Lala entera 1Lto', 'Lácteos', 26, 31, 5, 'unidades', 1),
(8, 'Leche Nutri entera 1Lto', 'Lácteos', 11.5, 25.5, 4, 'unidades', 1),
(9, 'Queso amarillo Fud fundido 140g', 'Lácteos', 30.5, 36.5, 6, 'unidades', 1),
(10, 'Papas Sabritas crujientes flamin hot 45g', 'Botanas', 15, 18, 3, 'unidades', 0),
(11, 'Doritos Sabritas dinamita chile y limon 65g', 'Botanas', 15, 18, 3, 'unidades', 0),
(12, 'Takis Barcel fuego 56g', 'Botanas', 14, 16.5, 2.5, 'unidades', 0),
(13, 'Chocolate blanco Hersheys cookies and crean 43g', 'Dulcería', 10, 12, 2, 'unidades', 0),
(14, 'Goma de mascar Trident Xtra Care Cool 13.6g', 'Dulcería', 9, 11, 2, 'unidades', 0),
(15, 'Skwinkles Salsagueti sandia 70g', 'Dulcería', 23, 27.5, 4.5, 'unidades', 0),
(16, 'Pelon Pelo Rico tamarindo 30g', 'Dulcería', 10.5, 13, 2.5, 'unidades', 0),
(17, 'Galletas Gamesa Marias 170g', 'Harinas y pan', 20, 24, 4, 'unidades', 0),
(18, 'Galletas Gamesa Saladitas 186g', 'Harinas y pan', 19.5, 23.5, 4, 'unidades', 0),
(19, 'Tortillas 1 kg', 'Harinas y pan', 20, 24, 4, 'kg', 1),
(20, 'Pan dulce 1pza', 'Harinas y pan', 7, 8.5, 1.5, 'unidades', 1),
(21, 'Tomate Saladet 1kg', 'Frutas y verduras', 25, 30, 5, 'kg', 1),
(22, 'Cebolla blanca 1kg', 'Frutas y verduras', 17, 21, 4, 'kg', 1),
(23, 'Chile Jalapeno Cuaresmeno 1kg', 'Frutas y verduras', 30, 36, 6, 'kg', 1),
(24, 'Platano 1kg', 'Frutas y verduras', 22, 26.5, 4.5, 'kg', 1),
(25, 'Refresco Coca-Cola 3Lts', 'Bebidas', 43, 51, 8, 'unidades', 0),
(26, 'Refresco Coca-Cola vidrio 500ml', 'Bebidas', 17, 20.5, 3.5, 'unidades', 0),
(27, 'Jugo del Valle mango 1Lto', 'Bebidas', 20, 24, 4, 'unidades', 0),
(28, 'Sopa instantanea Maruchan camaron 64g', 'Alimentos preparados', 14, 17.5, 3.5, 'unidades', 0),
(29, 'Spaguetti La Moderna 250g', 'Alimentos preparados', 11, 13.5, 2.5, 'unidades', 0),
(30, 'Salchicha de pavo Chimex 640g', 'Alimentos preparados', 30, 36, 6, 'unidades', 0),
(31, 'Shampoo Caprice 750ml', 'Higiene personal', 36, 43, 7, 'unidades', 0),
(32, 'Jabon Palmolive 150g', 'Higiene personal', 18, 21.5, 3.5, 'unidades', 0),
(33, 'Pasta dental Colgate 125ml', 'Higiene personal', 35, 42, 7, 'unidades', 0),
(34, 'prueba', 'Frutas y verduras', 10, 20, 10, 'Kilogramos', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `idProveedor` int(10) NOT NULL,
  `nomProv` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`idProveedor`, `nomProv`) VALUES
(1, 'Coca Cola'),
(2, 'Gamesa'),
(3, 'Sabritas'),
(4, 'Barcel'),
(5, 'Tortillas maiz'),
(6, 'Pan'),
(7, 'Quesos'),
(8, 'Pepsi'),
(9, 'Tortillas harina');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(10) NOT NULL,
  `nombre` text NOT NULL,
  `contra` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nombre`, `contra`) VALUES
(1, 'Nancy Cruz', 'nancy123'),
(2, 'Amador Cruz', 'amador123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventaproductos`
--

CREATE TABLE `ventaproductos` (
  `idVentaProd` int(10) NOT NULL,
  `fechaVen` date NOT NULL,
  `ttVen` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ventaproductos`
--

INSERT INTO `ventaproductos` (`idVentaProd`, `fechaVen`, `ttVen`) VALUES
(1, '2023-06-04', 54);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `abonos`
--
ALTER TABLE `abonos`
  ADD PRIMARY KEY (`idAbono`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idCliente`);

--
-- Indices de la tabla `compraproductos`
--
ALTER TABLE `compraproductos`
  ADD PRIMARY KEY (`idComProd`);

--
-- Indices de la tabla `compraprov`
--
ALTER TABLE `compraprov`
  ADD PRIMARY KEY (`idComProv`);

--
-- Indices de la tabla `deudas`
--
ALTER TABLE `deudas`
  ADD PRIMARY KEY (`idDeuCli`);

--
-- Indices de la tabla `perdidaproductos`
--
ALTER TABLE `perdidaproductos`
  ADD PRIMARY KEY (`idPerProd`);

--
-- Indices de la tabla `perecederos`
--
ALTER TABLE `perecederos`
  ADD PRIMARY KEY (`idPere`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idProd`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`idProveedor`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- Indices de la tabla `ventaproductos`
--
ALTER TABLE `ventaproductos`
  ADD PRIMARY KEY (`idVentaProd`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
