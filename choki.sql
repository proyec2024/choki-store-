-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.0.30 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para choki
CREATE DATABASE IF NOT EXISTS `choki` /*!40100 DEFAULT CHARACTER SET utf8mb3 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `choki`;

-- Volcando estructura para tabla choki.card
CREATE TABLE IF NOT EXISTS `card` (
  `id` int NOT NULL AUTO_INCREMENT,
  `producto` int NOT NULL DEFAULT '0',
  `cantidad` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_card_producto` (`producto`),
  CONSTRAINT `FK_card_producto` FOREIGN KEY (`producto`) REFERENCES `producto` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla choki.card: ~0 rows (aproximadamente)

-- Volcando estructura para tabla choki.categoria
CREATE TABLE IF NOT EXISTS `categoria` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla choki.categoria: ~1 rows (aproximadamente)
REPLACE INTO `categoria` (`id`, `nombre`) VALUES
	(1, 'TENIS');

-- Volcando estructura para tabla choki.marcas
CREATE TABLE IF NOT EXISTS `marcas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla choki.marcas: ~1 rows (aproximadamente)
REPLACE INTO `marcas` (`id`, `nombre`) VALUES
	(1, 'NIKE');

-- Volcando estructura para tabla choki.persona
CREATE TABLE IF NOT EXISTS `persona` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL DEFAULT '0',
  `apellido` varchar(50) NOT NULL DEFAULT '0',
  `email` varchar(100) NOT NULL DEFAULT '0',
  `password` varchar(100) NOT NULL DEFAULT '0',
  `rol` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_persona_roles` (`rol`),
  CONSTRAINT `FK_persona_roles` FOREIGN KEY (`rol`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla choki.persona: ~1 rows (aproximadamente)
REPLACE INTO `persona` (`id`, `nombre`, `apellido`, `email`, `password`, `rol`) VALUES
	(5, 'johan', 'palacios', 'correo@correo.com', '12345678', 1);

-- Volcando estructura para tabla choki.producto
CREATE TABLE IF NOT EXISTS `producto` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` text,
  `descripcion` text,
  `categoria` int DEFAULT NULL,
  `marca` int DEFAULT NULL,
  `cantidad` int DEFAULT NULL,
  `precio` decimal(20,6) DEFAULT NULL,
  `thumb` text,
  PRIMARY KEY (`id`),
  KEY `FK_producto_categoria` (`categoria`),
  KEY `FK_producto_marcas` (`marca`),
  CONSTRAINT `FK_producto_categoria` FOREIGN KEY (`categoria`) REFERENCES `categoria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_producto_marcas` FOREIGN KEY (`marca`) REFERENCES `marcas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla choki.producto: ~3 rows (aproximadamente)
REPLACE INTO `producto` (`id`, `nombre`, `descripcion`, `categoria`, `marca`, `cantidad`, `precio`, `thumb`) VALUES
	(5, 'rgera', 'aergaerg', 1, 1, 32, 324324.000000, 'uploads/1366_2000.jpeg'),
	(6, 'efwfwe', 'wefwefwe', 1, 1, 23, 2354.000000, 'uploads/cquibdo-34-jpg_40481246_20220812191332.jpg'),
	(7, '324234', '4324234', 1, 1, 23, 3243.000000, 'uploads/OIP.jpeg');

-- Volcando estructura para tabla choki.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla choki.roles: ~2 rows (aproximadamente)
REPLACE INTO `roles` (`id`, `nombre`) VALUES
	(1, 'ADMIN'),
	(2, 'CLIENTE');

-- Volcando estructura para tabla choki.venta
CREATE TABLE IF NOT EXISTS `venta` (
  `id` int NOT NULL AUTO_INCREMENT,
  `persona` int NOT NULL DEFAULT '0',
  `producto` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_venta_persona` (`persona`),
  KEY `FK_venta_producto` (`producto`),
  CONSTRAINT `FK_venta_persona` FOREIGN KEY (`persona`) REFERENCES `persona` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_venta_producto` FOREIGN KEY (`producto`) REFERENCES `producto` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla choki.venta: ~0 rows (aproximadamente)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
