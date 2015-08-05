# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.42)
# Database: curso_laravel
# Generation Time: 2015-08-05 05:29:26 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table cat_libros
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cat_libros`;

CREATE TABLE `cat_libros` (
  `ISBN` varchar(64) NOT NULL DEFAULT '',
  `titulo` varchar(256) NOT NULL DEFAULT '',
  `autor` varchar(256) NOT NULL DEFAULT '',
  PRIMARY KEY (`ISBN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table editoriales
# ------------------------------------------------------------

DROP TABLE IF EXISTS `editoriales`;

CREATE TABLE `editoriales` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(64) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `editoriales` WRITE;
/*!40000 ALTER TABLE `editoriales` DISABLE KEYS */;

INSERT INTO `editoriales` (`id`, `nombre`)
VALUES
	(1,'Alfaguara'),
	(2,'Porrua'),
	(3,'Prensas Ciencias');

/*!40000 ALTER TABLE `editoriales` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table libros
# ------------------------------------------------------------

DROP TABLE IF EXISTS `libros`;

CREATE TABLE `libros` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `autor` varchar(256) NOT NULL DEFAULT '',
  `titulo` varchar(256) NOT NULL DEFAULT '',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `editorial_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_editoriales` (`editorial_id`),
  CONSTRAINT `fk_editoriales` FOREIGN KEY (`editorial_id`) REFERENCES `editoriales` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table persona
# ------------------------------------------------------------

DROP TABLE IF EXISTS `persona`;

CREATE TABLE `persona` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(256) NOT NULL DEFAULT '',
  `apellido_paterno` varchar(256) NOT NULL DEFAULT '',
  `apellido_materno` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table persona_libro
# ------------------------------------------------------------

DROP TABLE IF EXISTS `persona_libro`;

CREATE TABLE `persona_libro` (
  `id_persona` int(11) unsigned NOT NULL,
  `id_libro` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id_persona`,`id_libro`),
  KEY `fk_libro_persona` (`id_libro`),
  CONSTRAINT `fk_libro_persona` FOREIGN KEY (`id_libro`) REFERENCES `libros` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_persona_libro` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table usuarios
# ------------------------------------------------------------

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL DEFAULT '',
  `persona_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_persona` (`persona_id`),
  CONSTRAINT `fk_persona` FOREIGN KEY (`persona_id`) REFERENCES `persona` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
