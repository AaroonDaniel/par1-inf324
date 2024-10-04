-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3308
-- Tiempo de generación: 04-10-2024 a las 18:00:08
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
-- Base de datos: `bddaniel`
--
CREATE DATABASE IF NOT EXISTS `bddaniel` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bddaniel`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catastro`
--
-- Creación: 01-10-2024 a las 23:46:25
--

CREATE TABLE `catastro` (
  `id` int(11) NOT NULL,
  `zona` varchar(255) DEFAULT NULL,
  `x_inicial` decimal(10,4) DEFAULT NULL,
  `y_inicial` decimal(10,4) DEFAULT NULL,
  `x_final` decimal(10,4) DEFAULT NULL,
  `y_final` decimal(10,4) DEFAULT NULL,
  `superficie` decimal(10,2) DEFAULT NULL,
  `distrito` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `catastro`
--

INSERT INTO `catastro` (`id`, `zona`, `x_inicial`, `y_inicial`, `x_final`, `y_final`, `superficie`, `distrito`) VALUES
(1010, 'Cota cota', -16.5300, -68.1095, -16.5290, -68.1085, 245.36, 'distrito 5'),
(1225, 'Calacoto', -16.5285, -68.1125, -16.5275, -68.1115, 400.00, 'Distrito 19'),
(1235, 'Zona Sur', -16.5235, -68.1235, -16.5225, -68.1225, 350.00, 'Distrito 19'),
(1236, 'Centro', -16.5035, -68.1355, -16.5025, -68.1345, 120.00, 'Distrito 12'),
(1259, 'Villa Fátima', -16.4835, -68.1212, -16.4825, -68.1202, 180.00, 'Distrito 9'),
(1478, 'Achumani', -16.5200, -68.1055, -16.5190, -68.1048, 500.00, 'Distrito 18'),
(2002, 'Sopocachi', -16.4976, -68.1325, -16.4968, -68.1318, 280.00, 'Distrito 5'),
(2369, 'San Pedro', -16.5085, -68.1412, -16.5075, -68.1402, 95.00, 'Distrito 10'),
(3321, 'Obrajes', -16.5250, -68.1140, -16.5240, -68.1130, 350.00, 'Distrito 15'),
(3362, 'Miraflores', -16.5000, -68.1287, -16.4990, -68.1278, 200.00, 'Distrito 7');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_per`
--
-- Creación: 01-10-2024 a las 23:46:25
--

CREATE TABLE `cat_per` (
  `ci` int(11) DEFAULT NULL,
  `id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cat_per`
--

INSERT INTO `cat_per` (`ci`, `id`) VALUES
(112233, 1235),
(112233, 2002),
(122663, 3362),
(122663, 1478),
(159632, 2369),
(188251, 1236),
(258141, 1236),
(312541, 1225),
(159632, 3321),
(112233, 3321),
(122663, 1259),
(258141, 1010);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--
-- Creación: 02-10-2024 a las 00:25:40
-- Última actualización: 04-10-2024 a las 14:20:52
--

CREATE TABLE `persona` (
  `ci` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `paterno` varchar(255) DEFAULT NULL,
  `materno` varchar(255) DEFAULT NULL,
  `contraseña` varchar(200) DEFAULT NULL,
  `rol` varchar(50) NOT NULL DEFAULT 'usuario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`ci`, `nombre`, `paterno`, `materno`, `contraseña`, `rol`) VALUES
(112233, 'Jhonatan Henry', 'Mendoza', 'Huanca', '112233', 'usuario'),
(122663, 'Miguel', 'Mendoza', 'Condori', '122663', 'usuario'),
(159632, 'Ismael', 'Mendoza', 'Cadena', '159632', 'usuario'),
(188251, 'Ana', 'Rodriguez', 'Torrez', '188251', 'usuario'),
(258141, 'Ester', 'Conde', 'Mendoza', '258141', 'usuario'),
(312541, 'Paola', 'Medina', 'Lopez', '312541', 'usuario'),
(555555, 'Admin', 'ApellidoPaterno', 'ApellidoMaterno', '123456', 'admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `catastro`
--
ALTER TABLE `catastro`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cat_per`
--
ALTER TABLE `cat_per`
  ADD KEY `fk_cat_per_persona` (`ci`),
  ADD KEY `fk_cat_per_catastro` (`id`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`ci`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cat_per`
--
ALTER TABLE `cat_per`
  ADD CONSTRAINT `fk_cat_per_catastro` FOREIGN KEY (`id`) REFERENCES `catastro` (`id`),
  ADD CONSTRAINT `fk_cat_per_persona` FOREIGN KEY (`ci`) REFERENCES `persona` (`ci`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
