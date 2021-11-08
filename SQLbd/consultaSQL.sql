-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.7.33 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para test
DROP DATABASE IF EXISTS `test`;
CREATE DATABASE IF NOT EXISTS `test` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci */;
USE `test`;

-- Volcando estructura para tabla test.celdas
DROP TABLE IF EXISTS `celdas`;
CREATE TABLE IF NOT EXISTS `celdas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `placa` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tipovehiculo` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tipocobro` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `horaingreso` time DEFAULT NULL,
  `horasalida` time DEFAULT NULL,
  `iniciomensualidad` date DEFAULT NULL,
  `finmensualidad` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_celdas_cobro` (`tipocobro`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla test.celdas: ~50 rows (aproximadamente)
DELETE FROM `celdas`;
/*!40000 ALTER TABLE `celdas` DISABLE KEYS */;
INSERT INTO `celdas` (`id`, `placa`, `tipovehiculo`, `tipocobro`, `estado`, `horaingreso`, `horasalida`, `iniciomensualidad`, `finmensualidad`) VALUES
	(1, 'gkx85e', 'AUTOMOVIL', 'horas', 0, '14:17:00', NULL, NULL, NULL),
	(2, NULL, 'AUTOMOVIL', 'mensualidad', 0, NULL, NULL, NULL, NULL),
	(3, 'abc34', 'AUTOMOVIL', NULL, 0, NULL, NULL, NULL, NULL),
	(4, 'abc34', 'AUTOMOVIL', 'horas', 1, NULL, NULL, NULL, NULL),
	(5, 'abc34', 'AUTOMOVIL', 'mensualidad', 1, NULL, NULL, NULL, NULL),
	(6, 'gkx85e', 'AUTOMOVIL', 'mensualidad', 1, NULL, NULL, NULL, NULL),
	(7, 'lur79c', 'AUTOMOVIL', 'horas', 1, '00:00:08', NULL, NULL, NULL),
	(8, 'lur79c', 'AUTOMOVIL', 'mensualidad', 1, '00:00:08', NULL, NULL, NULL),
	(9, 'abc34', 'AUTOMOVIL', 'mensualidad', 1, '08:43:00', NULL, NULL, NULL),
	(10, NULL, 'AUTOMOVIL', NULL, 0, NULL, NULL, NULL, NULL),
	(11, NULL, 'AUTOMOVIL', NULL, 0, NULL, NULL, NULL, NULL),
	(12, NULL, 'AUTOMOVIL', NULL, 0, NULL, NULL, NULL, NULL),
	(13, NULL, 'AUTOMOVIL', NULL, 1, NULL, NULL, NULL, NULL),
	(14, NULL, 'AUTOMOVIL', NULL, 0, NULL, NULL, NULL, NULL),
	(15, NULL, 'AUTOMOVIL', NULL, 0, NULL, NULL, NULL, NULL),
	(16, NULL, 'AUTOMOVIL', NULL, 0, NULL, NULL, NULL, NULL),
	(17, NULL, 'AUTOMOVIL', NULL, 0, NULL, NULL, NULL, NULL),
	(18, NULL, 'AUTOMOVIL', NULL, 0, NULL, NULL, NULL, NULL),
	(19, NULL, 'AUTOMOVIL', NULL, 0, NULL, NULL, NULL, NULL),
	(20, NULL, 'AUTOMOVIL', NULL, 0, NULL, NULL, NULL, NULL),
	(21, NULL, 'CAMION', NULL, 0, NULL, NULL, NULL, NULL),
	(22, NULL, 'CAMION', NULL, 0, NULL, NULL, NULL, NULL),
	(23, 'lur79c', 'CAMION', 'horas', 0, '10:54:00', NULL, NULL, NULL),
	(24, NULL, 'CAMION', NULL, 0, NULL, NULL, NULL, NULL),
	(25, NULL, 'CAMION', NULL, 0, NULL, NULL, NULL, NULL),
	(26, NULL, 'CAMION', NULL, 0, NULL, NULL, NULL, NULL),
	(27, NULL, 'CAMION', NULL, 0, NULL, NULL, NULL, NULL),
	(28, NULL, 'CAMION', NULL, 0, NULL, NULL, NULL, NULL),
	(29, NULL, 'CAMION', NULL, 0, NULL, NULL, NULL, NULL),
	(30, NULL, 'CAMION', NULL, 0, NULL, NULL, NULL, NULL),
	(31, NULL, 'CAMION', NULL, 0, NULL, NULL, NULL, NULL),
	(32, NULL, 'CAMION', NULL, 0, NULL, NULL, NULL, NULL),
	(33, NULL, 'CAMION', NULL, 0, NULL, NULL, NULL, NULL),
	(34, NULL, 'CAMION', NULL, 0, NULL, NULL, NULL, NULL),
	(35, NULL, 'CAMION', NULL, 0, NULL, NULL, NULL, NULL),
	(36, NULL, 'CAMION', NULL, 0, NULL, NULL, NULL, NULL),
	(37, NULL, 'CAMION', NULL, 0, NULL, NULL, NULL, NULL),
	(38, NULL, 'CAMION', NULL, 0, NULL, NULL, NULL, NULL),
	(39, NULL, 'CAMION', NULL, 0, NULL, NULL, NULL, NULL),
	(40, NULL, 'CAMION', NULL, 0, NULL, NULL, NULL, NULL),
	(41, NULL, 'MOTO', NULL, 0, NULL, NULL, NULL, NULL),
	(42, NULL, 'MOTO', NULL, 0, NULL, NULL, NULL, NULL),
	(43, NULL, 'MOTO', NULL, 0, NULL, NULL, NULL, NULL),
	(44, NULL, 'MOTO', NULL, 0, NULL, NULL, NULL, NULL),
	(45, NULL, 'MOTO', NULL, 0, NULL, NULL, NULL, NULL),
	(46, NULL, 'MOTO', NULL, 0, NULL, NULL, NULL, NULL),
	(47, NULL, 'MOTO', NULL, 0, NULL, NULL, NULL, NULL),
	(48, NULL, 'MOTO', NULL, 0, NULL, NULL, NULL, NULL),
	(49, NULL, 'MOTO', NULL, 0, NULL, NULL, NULL, NULL),
	(50, NULL, 'MOTO', NULL, 0, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `celdas` ENABLE KEYS */;

-- Volcando estructura para tabla test.clientes
DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellidos` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla test.clientes: ~3 rows (aproximadamente)
DELETE FROM `clientes`;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` (`id`, `nombres`, `apellidos`, `email`) VALUES
	(1, 'JUAN', 'PEREZ', 'JUAN@GMAIL.COM'),
	(2, 'LUIS', 'GOMEZ', 'LUIS@GMAIL.COM'),
	(3, 'CARLOS', 'ZAPATA', 'CARLOS@GMAIL.COM');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;

-- Volcando estructura para tabla test.factura
DROP TABLE IF EXISTS `factura`;
CREATE TABLE IF NOT EXISTS `factura` (
  `id` int(11) NOT NULL,
  `placa` text COLLATE utf8_spanish_ci NOT NULL,
  `ingreso` time NOT NULL,
  `salida` time NOT NULL,
  `iniciomensualidad` date NOT NULL,
  `finmensualidad` date NOT NULL,
  `pago` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla test.factura: ~0 rows (aproximadamente)
DELETE FROM `factura`;
/*!40000 ALTER TABLE `factura` DISABLE KEYS */;
/*!40000 ALTER TABLE `factura` ENABLE KEYS */;

-- Volcando estructura para tabla test.usuario
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `password` text COLLATE utf8_spanish_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla test.usuario: ~1 rows (aproximadamente)
DELETE FROM `usuario`;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`id`, `name`, `email`, `password`) VALUES
	(1, NULL, 'jhonfredy@outlook.com', '$2y$10$Wlvbq3EciuZyLuGBz0GGaealvMQ/1i4kaTEcMsNmuVeeO5uLYyj.2'),
	(2, 'luis valencia', 'all033@hotmail.com', '$2y$10$g6U5vCwPq2MN9EVP8wpTReEVUmukrklnjlIh1QZ1ZpUhX3c9.XmJ2');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
