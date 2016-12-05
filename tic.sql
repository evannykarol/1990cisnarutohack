-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.1.13-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win32
-- HeidiSQL Versión:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Volcando estructura de base de datos para servi_controltic
CREATE DATABASE IF NOT EXISTS `servi_controltic` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `servi_controltic`;


-- Volcando estructura para tabla servi_controltic.catalogs
CREATE TABLE IF NOT EXISTS `catalogs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `catalogs` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `viewcatalog` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` char(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla servi_controltic.catalogs: ~12 rows (aproximadamente)
/*!40000 ALTER TABLE `catalogs` DISABLE KEYS */;
INSERT INTO `catalogs` (`id`, `catalogs`, `description`, `viewcatalog`, `icon`, `status`) VALUES
	(1, 'Clientes', 'Clientes', 'index.client', 'fa-user', 'n'),
	(2, 'Infraestructura', 'Infraestructura', 'index.infraestructura', 'fa-tasks', 'n'),
	(3, 'Ticket', 'Ticket', 'index.hostingedit', 'fa-tasks', 'n'),
	(4, 'Permisos', 'Permisos', 'index.permission', 'fa-lock', 'n'),
	(5, 'hosting', 'Hosting', 'index.hosting', 'fa-tasks', 'n'),
	(6, 'Usuario', 'Usuario', 'index.user', 'fa-users', 'n'),
	(7, 'Catalogo', 'Catalogo', 'index.catalog', 'fa-users', 'n'),
	(8, 'Servicio Hosting', 'Servicio Hosting', 'index.servicehosting', 'fa-users', 'n'),
	(9, 'Action Pack', 'Action Pack', 'index.actionpack', 'fa-users', 'n'),
	(10, 'Correo', 'Correo', 'index.email', 'fa-users', 'n'),
	(11, 'CRUD', 'Generar CRUD', 'index.crud', 'fa-users', 'n'),
	(12, 'Configuracion', 'Configuracion', 'index.configuration', 'fa-users', 'n');
/*!40000 ALTER TABLE `catalogs` ENABLE KEYS */;


-- Volcando estructura para tabla servi_controltic.client
CREATE TABLE IF NOT EXISTS `client` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla servi_controltic.client: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `client` DISABLE KEYS */;
INSERT INTO `client` (`id`, `name`, `address`, `phone`, `id_user`) VALUES
	(1, 'evanny karol', '5 calle norte ', '9631449674', NULL);
/*!40000 ALTER TABLE `client` ENABLE KEYS */;


-- Volcando estructura para tabla servi_controltic.crud
CREATE TABLE IF NOT EXISTS `crud` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `package` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `tablename` varchar(255) DEFAULT NULL,
  `migration` varchar(255) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `controller` varchar(255) DEFAULT NULL,
  `views` varchar(255) DEFAULT NULL,
  `modal` varchar(255) DEFAULT NULL,
  `timestamps` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla servi_controltic.crud: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `crud` DISABLE KEYS */;
INSERT INTO `crud` (`id`, `package`, `title`, `tablename`, `migration`, `model`, `controller`, `views`, `modal`, `timestamps`, `created_at`, `updated_at`) VALUES
	(1, 'Laravel', 'producto', 'productos', NULL, NULL, NULL, NULL, 'yes', NULL, NULL, NULL),
	(6, 'Laravel', 'cisco', 'ciscos', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `crud` ENABLE KEYS */;


-- Volcando estructura para tabla servi_controltic.crudtables
CREATE TABLE IF NOT EXISTS `crudtables` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `required` varchar(50) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `key` varchar(50) DEFAULT NULL,
  `order` varchar(50) DEFAULT NULL,
  `id_crud` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla servi_controltic.crudtables: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `crudtables` DISABLE KEYS */;
INSERT INTO `crudtables` (`id`, `name`, `title`, `required`, `type`, `key`, `order`, `id_crud`) VALUES
	(1, 'nombre', NULL, '1', 'text', '0', '1', '1'),
	(2, 'precio', NULL, '1', 'text', '0', '2', '1'),
	(3, 'checar', NULL, '1', '1', '1', '3', '1'),
	(4, 'revisar', NULL, '1', '1', '1', '4', '1'),
	(16, 'nombre', 'Nombre', 'optional', 'text', NULL, '1', '6'),
	(17, 'correo', 'Correo', 'optional', 'email', NULL, '2', '6'),
	(18, 'telefono', 'telefono cel', 'optional', 'text', NULL, '3', '6');
/*!40000 ALTER TABLE `crudtables` ENABLE KEYS */;


-- Volcando estructura para tabla servi_controltic.department
CREATE TABLE IF NOT EXISTS `department` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla servi_controltic.department: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `department` DISABLE KEYS */;
INSERT INTO `department` (`id`, `name`) VALUES
	(1, 'Soporte Tecnico');
/*!40000 ALTER TABLE `department` ENABLE KEYS */;


-- Volcando estructura para tabla servi_controltic.domain
CREATE TABLE IF NOT EXISTS `domain` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `type_domain` varchar(50) DEFAULT NULL,
  `id_hosting` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_hosting` (`id_hosting`),
  CONSTRAINT `FK_domain_hosting` FOREIGN KEY (`id_hosting`) REFERENCES `hosting` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla servi_controltic.domain: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `domain` DISABLE KEYS */;
/*!40000 ALTER TABLE `domain` ENABLE KEYS */;


-- Volcando estructura para tabla servi_controltic.email
CREATE TABLE IF NOT EXISTS `email` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla servi_controltic.email: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `email` DISABLE KEYS */;
INSERT INTO `email` (`id`, `user`, `email`, `password`) VALUES
	(1, 'evanny', 'evannykarol@serbicrece.com', 'cisco_1990');
/*!40000 ALTER TABLE `email` ENABLE KEYS */;


-- Volcando estructura para tabla servi_controltic.eventos
CREATE TABLE IF NOT EXISTS `eventos` (
  `idEvento` int(11) NOT NULL,
  `nombreE` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Volcando datos para la tabla servi_controltic.eventos: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `eventos` DISABLE KEYS */;
INSERT INTO `eventos` (`idEvento`, `nombreE`, `descripcion`, `fecha`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Primer evento', 'Hola', '2016-11-24', 1, '2016-11-12 14:11:41', '0000-00-00 00:00:00'),
	(2, 'Evento 1', 'Probando', '2017-01-01', 1, '2016-11-12 19:58:34', '2016-11-12 19:58:34'),
	(3, 'Programacion', 'vamo a programa', '2016-12-12', 1, '2016-11-12 19:59:01', '2016-11-12 19:59:01');
/*!40000 ALTER TABLE `eventos` ENABLE KEYS */;


-- Volcando estructura para tabla servi_controltic.hosting
CREATE TABLE IF NOT EXISTS `hosting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '0',
  `business` varchar(50) NOT NULL DEFAULT '0',
  `note` longtext,
  `date_create` varchar(50) NOT NULL DEFAULT '0',
  `date_vence` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla servi_controltic.hosting: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `hosting` DISABLE KEYS */;
INSERT INTO `hosting` (`id`, `name`, `business`, `note`, `date_create`, `date_vence`) VALUES
	(1, '1&1', 'ServiCrece', 'nota ', '12.16.2016', '19.15.2016'),
	(2, 'other', 'introx', 'nota', '0', '0');
/*!40000 ALTER TABLE `hosting` ENABLE KEYS */;


-- Volcando estructura para tabla servi_controltic.hosting_user
CREATE TABLE IF NOT EXISTS `hosting_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `ip_server` varchar(50) DEFAULT NULL,
  `user` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `note` varchar(50) DEFAULT NULL,
  `id_hosting` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_hosting` (`id_hosting`),
  CONSTRAINT `FK_hosting_user_hosting` FOREIGN KEY (`id_hosting`) REFERENCES `hosting` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla servi_controltic.hosting_user: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `hosting_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `hosting_user` ENABLE KEYS */;


-- Volcando estructura para tabla servi_controltic.language
CREATE TABLE IF NOT EXISTS `language` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla servi_controltic.language: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `language` DISABLE KEYS */;
INSERT INTO `language` (`id`, `name`, `code`) VALUES
	(1, 'Español', 'es'),
	(2, 'Ingles', 'en');
/*!40000 ALTER TABLE `language` ENABLE KEYS */;


-- Volcando estructura para tabla servi_controltic.messages
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(50) DEFAULT NULL,
  `messages` longtext,
  `id_user` varchar(50) DEFAULT NULL,
  `is_read` tinytext,
  `is_send` tinytext,
  `for_users` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla servi_controltic.messages: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` (`id`, `subject`, `messages`, `id_user`, `is_read`, `is_send`, `for_users`, `created_at`) VALUES
	(1, 'Hola como estas', '<p><img alt="" src="http://assets.pokemon.com/assets/cms2/img/watch-pokemon-tv/seasons/season19/season19_ep11_ss01.jpg" /></p>\r\n\r\n<h2 style="font-style:italic;">que me cuentas me gusta pokemon hahah</h2>\r\n', '1', '0', '0', 2, '2016-12-01 18:12:19'),
	(2, 'Hola como estas', '<p><img alt="" src="http://assets.pokemon.com/assets/cms2/img/watch-pokemon-tv/seasons/season19/season19_ep11_ss01.jpg" /></p>\r\n\r\n<h2 style="font-style:italic;">que me cuentas me gusta pokemon hahah</h2>\r\n', '2', '1', '0', 1, '2016-12-03 23:58:59');
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;


-- Volcando estructura para tabla servi_controltic.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla servi_controltic.migrations: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2016_11_22_012717_ciscos', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;


-- Volcando estructura para tabla servi_controltic.moduls
CREATE TABLE IF NOT EXISTS `moduls` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `icon` varchar(50) DEFAULT NULL,
  `path` varchar(50) DEFAULT NULL,
  `table_name` varchar(50) DEFAULT NULL,
  `migration` varchar(50) DEFAULT NULL,
  `model` varchar(50) DEFAULT NULL,
  `controller` varchar(50) DEFAULT NULL,
  `views` varchar(50) DEFAULT NULL,
  `sorting` varchar(50) DEFAULT NULL,
  `is_softdelete` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `id_moduls_group` int(11) DEFAULT NULL,
  `block` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla servi_controltic.moduls: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `moduls` DISABLE KEYS */;
INSERT INTO `moduls` (`id`, `name`, `icon`, `path`, `table_name`, `migration`, `model`, `controller`, `views`, `sorting`, `is_softdelete`, `is_active`, `id_moduls_group`, `block`) VALUES
	(1, 'proyecto', 'fa fa-user', NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, 0, 1, NULL),
	(2, 'otros', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL);
/*!40000 ALTER TABLE `moduls` ENABLE KEYS */;


-- Volcando estructura para tabla servi_controltic.moduls_group
CREATE TABLE IF NOT EXISTS `moduls_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_group` varchar(50) NOT NULL DEFAULT '0',
  `sorting_group` varchar(50) NOT NULL DEFAULT '0',
  `icon_group` varchar(50) NOT NULL DEFAULT '0',
  `is_group` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla servi_controltic.moduls_group: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `moduls_group` DISABLE KEYS */;
INSERT INTO `moduls_group` (`id`, `name_group`, `sorting_group`, `icon_group`, `is_group`) VALUES
	(1, 'public', '1', 'fa fa-user', 0);
/*!40000 ALTER TABLE `moduls_group` ENABLE KEYS */;


-- Volcando estructura para tabla servi_controltic.open_port
CREATE TABLE IF NOT EXISTS `open_port` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aplication` varchar(50) DEFAULT NULL,
  `port` varchar(50) DEFAULT NULL,
  `solicitó` varchar(50) DEFAULT NULL,
  `id_hosting` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_hosting` (`id_hosting`),
  CONSTRAINT `FK_open_port_hosting` FOREIGN KEY (`id_hosting`) REFERENCES `hosting` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla servi_controltic.open_port: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `open_port` DISABLE KEYS */;
/*!40000 ALTER TABLE `open_port` ENABLE KEYS */;


-- Volcando estructura para tabla servi_controltic.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla servi_controltic.password_resets: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;


-- Volcando estructura para tabla servi_controltic.permission_catalogs
CREATE TABLE IF NOT EXISTS `permission_catalogs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_users` int(11) NOT NULL,
  `id_catalogs` int(11) NOT NULL,
  `create` bit(1) DEFAULT NULL,
  `read` bit(1) DEFAULT NULL,
  `update` bit(1) DEFAULT NULL,
  `delete` bit(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla servi_controltic.permission_catalogs: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `permission_catalogs` DISABLE KEYS */;
INSERT INTO `permission_catalogs` (`id`, `id_users`, `id_catalogs`, `create`, `read`, `update`, `delete`) VALUES
	(1, 1, 1, b'1', b'1', b'1', b'0'),
	(2, 1, 2, b'1', b'1', b'0', b'0'),
	(3, 1, 3, b'1', b'1', b'1', b'1'),
	(4, 1, 4, b'1', b'1', b'1', b'1'),
	(5, 1, 5, b'1', b'1', b'1', b'1');
/*!40000 ALTER TABLE `permission_catalogs` ENABLE KEYS */;


-- Volcando estructura para tabla servi_controltic.permission_crud
CREATE TABLE IF NOT EXISTS `permission_crud` (
  `id` int(11) DEFAULT NULL,
  `id_roles` int(11) DEFAULT NULL,
  `id_crud` int(11) DEFAULT NULL,
  `create` int(11) DEFAULT NULL,
  `read` int(11) DEFAULT NULL,
  `update` int(11) DEFAULT NULL,
  `delete` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla servi_controltic.permission_crud: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `permission_crud` DISABLE KEYS */;
/*!40000 ALTER TABLE `permission_crud` ENABLE KEYS */;


-- Volcando estructura para tabla servi_controltic.privileges
CREATE TABLE IF NOT EXISTS `privileges` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla servi_controltic.privileges: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `privileges` DISABLE KEYS */;
INSERT INTO `privileges` (`id`, `name`) VALUES
	(1, 'SuperAdmin');
/*!40000 ALTER TABLE `privileges` ENABLE KEYS */;


-- Volcando estructura para tabla servi_controltic.productos
CREATE TABLE IF NOT EXISTS `productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `precio` varchar(50) DEFAULT NULL,
  `checar` varchar(50) DEFAULT NULL,
  `revisar` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla servi_controltic.productos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` (`id`, `nombre`, `precio`, `checar`, `revisar`) VALUES
	(10, 'evannykarol@jho', 'j', 'lkjl', 'kjl');
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;


-- Volcando estructura para tabla servi_controltic.remote_access
CREATE TABLE IF NOT EXISTS `remote_access` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `users` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `assigned` varchar(50) DEFAULT NULL,
  `permision` varchar(50) DEFAULT NULL,
  `area` varchar(50) DEFAULT NULL,
  `id_hosting` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_hosting` (`id_hosting`),
  CONSTRAINT `FK_remote_access_hosting` FOREIGN KEY (`id_hosting`) REFERENCES `hosting` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla servi_controltic.remote_access: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `remote_access` DISABLE KEYS */;
INSERT INTO `remote_access` (`id`, `users`, `password`, `assigned`, `permision`, `area`, `id_hosting`) VALUES
	(1, 'Administrador', 'superman', 'balmedar', 'todos', 'desarrollo', 1);
/*!40000 ALTER TABLE `remote_access` ENABLE KEYS */;


-- Volcando estructura para tabla servi_controltic.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla servi_controltic.roles: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
	(1, 'Administrador', 'dasd', '2016-11-23 12:05:14', '2016-11-23 14:11:02'),
	(2, 'test', 'asd', '2016-11-23 15:49:38', '2016-11-23 15:49:38');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;


-- Volcando estructura para tabla servi_controltic.roles_privileges
CREATE TABLE IF NOT EXISTS `roles_privileges` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_roles` int(11) DEFAULT NULL,
  `id_moduls` int(11) DEFAULT NULL,
  `is_create` varchar(50) DEFAULT NULL,
  `is_read` varchar(50) DEFAULT NULL,
  `is_update` varchar(50) DEFAULT NULL,
  `is_delete` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla servi_controltic.roles_privileges: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `roles_privileges` DISABLE KEYS */;
/*!40000 ALTER TABLE `roles_privileges` ENABLE KEYS */;


-- Volcando estructura para tabla servi_controltic.service_hosting
CREATE TABLE IF NOT EXISTS `service_hosting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `administrator` varchar(50) DEFAULT NULL,
  `user` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `note` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla servi_controltic.service_hosting: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `service_hosting` DISABLE KEYS */;
INSERT INTO `service_hosting` (`id`, `administrator`, `user`, `password`, `note`) VALUES
	(1, 'SERVICRECE.COM', 'USUARIOS', 'CISCO', NULL),
	(2, 'introx.com', 'servicrece', 'ci', NULL);
/*!40000 ALTER TABLE `service_hosting` ENABLE KEYS */;


-- Volcando estructura para tabla servi_controltic.service_host_domain
CREATE TABLE IF NOT EXISTS `service_host_domain` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `namedomain` varchar(50) DEFAULT NULL,
  `function` varchar(50) DEFAULT NULL,
  `note` varchar(50) DEFAULT NULL,
  `id_service_hosting` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_service_hosting` (`id_service_hosting`),
  CONSTRAINT `FK_service_host_domain_service_hosting` FOREIGN KEY (`id_service_hosting`) REFERENCES `service_hosting` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla servi_controltic.service_host_domain: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `service_host_domain` DISABLE KEYS */;
/*!40000 ALTER TABLE `service_host_domain` ENABLE KEYS */;


-- Volcando estructura para tabla servi_controltic.settings
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `value` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla servi_controltic.settings: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` (`id`, `name`, `value`, `created_at`, `updated_at`) VALUES
	(1, 'ApplicationName', 'Aqui Nombre de aplicaciones', NULL, '2016-11-28 15:23:06'),
	(2, 'ApplicationDesc', 'servicrece', NULL, '2016-11-28 15:23:06'),
	(3, 'CompanyName', 'servicrece', NULL, '2016-11-28 15:23:06'),
	(4, 'EmailSystem', 'evannykarol1990@hotmail.com', NULL, '2016-11-28 15:23:06'),
	(5, 'MainLanguaje', 'es', NULL, '2016-11-28 15:23:06'),
	(6, 'DateFormat', 'd-m-y', NULL, '2016-11-28 15:23:06'),
	(7, 'Logotipo', 'logo.png', NULL, NULL);
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;


-- Volcando estructura para tabla servi_controltic.ticket
CREATE TABLE IF NOT EXISTS `ticket` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `description` longtext,
  `id_department` varchar(50) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `priority` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `id_users` varchar(50) DEFAULT NULL,
  `id_users_assign` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla servi_controltic.ticket: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `ticket` DISABLE KEYS */;
INSERT INTO `ticket` (`id`, `title`, `description`, `id_department`, `type`, `priority`, `status`, `id_users`, `id_users_assign`, `created_at`, `updated_at`) VALUES
	(5, 'das', '<p><img alt="" src="http://assets.pokemon.com/assets/cms2/img/watch-pokemon-tv/seasons/season19/season19_ep11_ss01.jpg" /></p>\n\n<h2 style="font-style:italic;">que me cuentas me gusta pokemon hahah</h2>\n', '1', '1', '1', '1', '1', NULL, '2016-12-04 01:57:27', NULL);
/*!40000 ALTER TABLE `ticket` ENABLE KEYS */;


-- Volcando estructura para tabla servi_controltic.ticket_comment
CREATE TABLE IF NOT EXISTS `ticket_comment` (
  `id_ticket_comment` int(10) NOT NULL AUTO_INCREMENT,
  `id_ticket` int(10) DEFAULT NULL,
  `id_users` int(10) DEFAULT NULL,
  `comment` longtext,
  `is_read` tinytext,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_ticket_comment`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla servi_controltic.ticket_comment: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `ticket_comment` DISABLE KEYS */;
INSERT INTO `ticket_comment` (`id_ticket_comment`, `id_ticket`, `id_users`, `comment`, `is_read`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 'hola como estas', NULL, '2016-11-02 00:41:38', '2016-11-02 00:41:38'),
	(6, 1, 2, 'bien y tu', NULL, '2016-11-02 00:44:46', '2016-11-02 00:44:46'),
	(7, 1, 1, 'bioen', NULL, '2016-11-02 00:45:14', '2016-11-02 00:45:14'),
	(8, 1, 1, 'que me cuenta', NULL, '2016-11-02 00:45:23', '2016-11-02 00:45:23');
/*!40000 ALTER TABLE `ticket_comment` ENABLE KEYS */;


-- Volcando estructura para tabla servi_controltic.ticket_priority
CREATE TABLE IF NOT EXISTS `ticket_priority` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `translate` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla servi_controltic.ticket_priority: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `ticket_priority` DISABLE KEYS */;
INSERT INTO `ticket_priority` (`id`, `name`, `translate`) VALUES
	(1, 'Low', 'Low'),
	(2, 'Medium', 'Medium'),
	(3, 'High', 'High'),
	(4, 'Urgent', 'Urgent');
/*!40000 ALTER TABLE `ticket_priority` ENABLE KEYS */;


-- Volcando estructura para tabla servi_controltic.ticket_status
CREATE TABLE IF NOT EXISTS `ticket_status` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `translate` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla servi_controltic.ticket_status: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `ticket_status` DISABLE KEYS */;
INSERT INTO `ticket_status` (`id`, `name`, `translate`) VALUES
	(1, 'New', 'New'),
	(2, 'Wait', 'Wait'),
	(3, 'Resolved', 'Resolved'),
	(4, 'Close', 'Close');
/*!40000 ALTER TABLE `ticket_status` ENABLE KEYS */;


-- Volcando estructura para tabla servi_controltic.ticket_type
CREATE TABLE IF NOT EXISTS `ticket_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla servi_controltic.ticket_type: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `ticket_type` DISABLE KEYS */;
INSERT INTO `ticket_type` (`id`, `name`) VALUES
	(1, 'ticket'),
	(2, 'intencia');
/*!40000 ALTER TABLE `ticket_type` ENABLE KEYS */;


-- Volcando estructura para tabla servi_controltic.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `area` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_roles` int(11) DEFAULT NULL,
  `language` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `user` (`user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla servi_controltic.users: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `user`, `name`, `first_name`, `email`, `area`, `id_roles`, `language`, `status`, `password`, `photo`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'evanny', 'Evanny Karol', 'hernandez', 'evannykarol@hotmail.com', 'DESARROLLO WEB', 1, 'en', 'active', '$2y$10$itroih8s2tgTyD6eE8QOD.p8jkW.8vyIV56kWQ3RLz4pzFP65NeRO', 'default.jpg', 'yWBU2PDVEoPOpdMXi4q1oyK9CAOqTcUG9WZCl4CHIykBMOitfRzaAEhbf1Vq', '2016-10-31 16:24:47', '2016-12-03 23:34:26'),
	(2, 'karol', 'karol', 'gacia', 'evannykarol1990@gmail.com', 'desarrollo web', 1, 'en', 'active', '', NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
