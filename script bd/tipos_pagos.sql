-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-11-2022 a las 23:26:47
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tipos_pagos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apis_pago`
--

CREATE TABLE `apis_pago` (
  `id` int(15) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `api_key1` varchar(255) DEFAULT NULL,
  `api_key2` varchar(255) DEFAULT NULL,
  `api_key3` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `apis_pago`
--

INSERT INTO `apis_pago` (`id`, `nombre`, `api_key1`, `api_key2`, `api_key3`) VALUES
(1, 'tropipay', 'fb6c6d264feec5e72802a97ec0fd4017', NULL, NULL),
(2, 'wells fargo', 'NXp43wxU5JMX6dGF', 'PVqOVoMm0CMdmwHxcXQ77ABISW9guX1N', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `apis_pago`
--
ALTER TABLE `apis_pago`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `apis_pago`
--
ALTER TABLE `apis_pago`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
