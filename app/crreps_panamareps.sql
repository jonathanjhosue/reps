-- phpMyAdmin SQL Dump
-- version 3.4.8
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 29-02-2012 a las 10:00:56
-- Versión del servidor: 5.1.60
-- Versión de PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `crreps_panamareps`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `activities`
--

CREATE TABLE IF NOT EXISTS `activities` (
  `product_id` mediumint(8) unsigned NOT NULL COMMENT 'PK de la actividad. De igual manera es el identificador (FK) de producto del cual hereda los datos comúnes.',
  `duration` varchar(15) NOT NULL COMMENT 'Duración de la actividad.',
  `age_min` tinyint(3) unsigned NOT NULL COMMENT 'Edad mínima requerida para efectuar la actividad.',
  `age_max` tinyint(3) unsigned NOT NULL COMMENT 'Edad máxima requerida para efectuar la actividad.',
  `pax_min` tinyint(3) unsigned NOT NULL COMMENT 'Número de pax mínimo para efectuar la actividad.',
  `pax_max` tinyint(3) unsigned NOT NULL COMMENT 'Número de pax máximo para efectuar la actividad.',
  PRIMARY KEY (`product_id`),
  KEY `fk_activity_product` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Almacena los datos de un producto del catálogo. Un producto ';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `activity_notes`
--

CREATE TABLE IF NOT EXISTS `activity_notes` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT 'PK de la nota de actividad.',
  `activity_id` mediumint(8) unsigned NOT NULL COMMENT 'Identificador de la actividad a la cual se refiere la nota.',
  `language_id` tinyint(3) unsigned NOT NULL COMMENT 'Identificador del lenguaje en el cual está escrita la nota.',
  `text` varchar(60) NOT NULL COMMENT 'Texto de la nota.',
  PRIMARY KEY (`id`),
  KEY `fk_activity_note_activity` (`activity_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Almacena texto correspondiente a notas relacionadas con las ' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `activity_schedules`
--

CREATE TABLE IF NOT EXISTS `activity_schedules` (
  `idactivity_schedule` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT 'PK del plan de tiempos.',
  `product_id` mediumint(8) unsigned NOT NULL COMMENT 'Identificador de la actividad a la que pertenece el plan de tiempos.',
  `language_id` tinyint(3) unsigned NOT NULL COMMENT 'Identificador del lenguaje en el que está escrito el plan de tiempos.',
  `text` varchar(50) NOT NULL COMMENT 'Texto del plan de tiempos.',
  PRIMARY KEY (`idactivity_schedule`),
  KEY `fk_schedule_activity` (`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Almacena la descripción de horario de una actividad, cada de' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `activity_types`
--

CREATE TABLE IF NOT EXISTS `activity_types` (
  `activity_fk` mediumint(8) unsigned NOT NULL,
  `idactivity_type` mediumint(8) unsigned NOT NULL COMMENT 'PK de la actividad',
  PRIMARY KEY (`activity_fk`,`idactivity_type`),
  KEY `fk_activity_type_activity` (`activity_fk`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Almacena la información de los tipos que cada actividad pued';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `activity_wtbrings`
--

CREATE TABLE IF NOT EXISTS `activity_wtbrings` (
  `idactivity_wtbring` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT 'PK del wtbring.',
  `product_id` mediumint(8) unsigned NOT NULL COMMENT 'Identificador de la actividad a la cual pertence la lista de artículos.',
  `language_id` tinyint(3) unsigned NOT NULL COMMENT 'Indentificador del lenguje en el que está escrito el wtbring.',
  `text` varchar(60) NOT NULL COMMENT 'Texto con la lista de artículos recomendados.',
  PRIMARY KEY (`idactivity_wtbring`),
  KEY `fk_activity_wtbring_activity` (`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Almacena el texto que especifica los artículos recomendados ' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hotels`
--

CREATE TABLE IF NOT EXISTS `hotels` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT 'PK del hotel.',
  `product_id` mediumint(8) unsigned NOT NULL,
  `hotel_category_id` tinyint(3) unsigned NOT NULL,
  `child_age_max` tinyint(2) unsigned DEFAULT NULL,
  `infant_age_max` tinyint(2) unsigned DEFAULT NULL,
  `child_age_min` tinyint(2) DEFAULT NULL,
  `infant_age_min` tinyint(2) DEFAULT NULL,
  `check_in` time NOT NULL,
  `check_out` time NOT NULL,
  `restaurant` tinyint(1) NOT NULL DEFAULT '0',
  `bar` tinyint(1) NOT NULL DEFAULT '0',
  `swimmingpool` tinyint(1) NOT NULL DEFAULT '0',
  `wet_bar` tinyint(1) NOT NULL DEFAULT '0',
  `wheelchair_accessible` tinyint(1) NOT NULL DEFAULT '0',
  `internet` tinyint(1) NOT NULL DEFAULT '0',
  `business_center` tinyint(1) NOT NULL DEFAULT '0',
  `fitness_center` tinyint(1) NOT NULL DEFAULT '0',
  `private_car_park` tinyint(1) NOT NULL DEFAULT '0',
  `gift_shop` tinyint(1) NOT NULL DEFAULT '0',
  `tour_desk` tinyint(1) NOT NULL DEFAULT '0',
  `certifications` tinyint(1) NOT NULL DEFAULT '0',
  `certifications_details` varchar(50) DEFAULT NULL,
  `free_shuttle_service` tinyint(1) NOT NULL DEFAULT '0',
  `freeshuttleservice_details` varchar(50) DEFAULT NULL,
  `laundry_service` tinyint(1) NOT NULL DEFAULT '0',
  `gardens` tinyint(1) NOT NULL DEFAULT '0',
  `nature_trails` tinyint(1) NOT NULL DEFAULT '0' COMMENT '	',
  `socialfunctions_services` tinyint(1) NOT NULL DEFAULT '0',
  `golf_court` tinyint(1) NOT NULL DEFAULT '0',
  `tennis_court` tinyint(1) NOT NULL DEFAULT '0',
  `conference_facilities` tinyint(1) NOT NULL DEFAULT '0',
  `conferencefacilities_details` varchar(50) DEFAULT NULL,
  `childcare` tinyint(1) NOT NULL DEFAULT '0',
  `lift` tinyint(1) NOT NULL DEFAULT '0',
  `spa` tinyint(1) NOT NULL DEFAULT '0',
  `beauty_salon` tinyint(1) unsigned zerofill NOT NULL DEFAULT '0',
  `room_service` tinyint(1) NOT NULL DEFAULT '0',
  `concierge` tinyint(1) NOT NULL DEFAULT '0',
  `i18n_dining&drinking` varchar(30) NOT NULL,
  `vegetarian` tinyint(1) NOT NULL DEFAULT '0',
  `kosher` tinyint(1) NOT NULL DEFAULT '0',
  `i18n_roomnotes` varchar(30) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_hotels_products` (`product_id`),
  KEY `fk_hotels_hotel_categories` (`hotel_category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Almacena los datos un producto correspondiente a hospedaje.' AUTO_INCREMENT=41 ;

--
-- Volcado de datos para la tabla `hotels`
--

INSERT INTO `hotels` (`id`, `product_id`, `hotel_category_id`, `child_age_max`, `infant_age_max`, `child_age_min`, `infant_age_min`, `check_in`, `check_out`, `restaurant`, `bar`, `swimmingpool`, `wet_bar`, `wheelchair_accessible`, `internet`, `business_center`, `fitness_center`, `private_car_park`, `gift_shop`, `tour_desk`, `certifications`, `certifications_details`, `free_shuttle_service`, `freeshuttleservice_details`, `laundry_service`, `gardens`, `nature_trails`, `socialfunctions_services`, `golf_court`, `tennis_court`, `conference_facilities`, `conferencefacilities_details`, `childcare`, `lift`, `spa`, `beauty_salon`, `room_service`, `concierge`, `i18n_dining&drinking`, `vegetarian`, `kosher`, `i18n_roomnotes`) VALUES
(1, 1, 1, 4, 15, 10, 11, '10:30:00', '13:01:00', 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 'iso900', 1, 'aisx fss 100', 1, 1, 1, 1, 1, 1, 1, 'salones', 1, 1, 1, 1, 1, 1, 'hdad_1', 1, 1, 'hrn_1'),
(2, 2, 2, 11, 12, 10, 12, '13:00:00', '00:01:00', 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 1, 'detalle de fss', 1, 0, 0, 0, 0, 0, 0, '', 0, 1, 0, 0, 0, 0, 'hdad_2', 1, 0, 'hrn_2'),
(18, 23, 7, 10, 16, 6, 11, '17:15:00', '17:15:00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, '', 0, 0, '0'),
(19, 24, 1, 4, 16, 6, 12, '17:18:00', '17:18:00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, '', 0, 0, '0'),
(20, 25, 5, 10, 16, 8, 11, '18:02:00', '18:02:00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, '', 0, 0, '0'),
(28, 33, 1, 10, 14, 8, 11, '18:57:00', '18:57:00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, '', 0, 0, '0'),
(29, 34, 1, 10, 14, 8, 12, '19:22:00', '19:22:00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, '', 0, 0, '0'),
(30, 36, 1, 8, 45, 6, 41, '19:22:00', '19:22:00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, '', 0, 0, '0'),
(32, 38, 1, 8, 13, 6, 9, '19:22:00', '19:22:00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, '', 0, 0, '0'),
(33, 39, 1, 14, 25, 8, 16, '19:22:00', '19:22:00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, '', 0, 0, '0'),
(34, 40, 4, 8, 11, 2, 9, '20:13:00', '20:13:00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, '', 0, 0, '0'),
(36, 42, 5, 6, 10, 3, 7, '23:15:00', '23:15:00', 1, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 'sdsd551', 1, 'sadfds5', 1, 0, 0, 1, 0, 0, 1, 'edfdsfasd51', 0, 0, 0, 0, 0, 0, '', 1, 0, '0'),
(37, 43, 1, 16, 18, 15, 17, '23:48:00', '23:48:00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, '', 0, 0, '0'),
(38, 44, 1, 10, 16, 0, 11, '13:26:00', '13:26:00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, '', 0, 0, '0'),
(39, 45, 6, 12, 15, 15, 35, '08:27:00', '02:59:00', 1, 0, 1, 1, 1, 0, 0, 1, 1, 1, 1, 1, 'id 500', 0, '', 1, 1, 1, 1, 1, 1, 1, 'gsfdgsfd ', 1, 1, 1, 0, 1, 1, '', 0, 1, '0'),
(40, 46, 1, 12, 15, 2, 13, '11:30:00', '11:30:00', 1, 1, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 'xx', 1, 'detalle', 0, 1, 0, 1, 0, 0, 0, '', 0, 0, 1, 0, 1, 1, '', 1, 1, '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hotel_categories`
--

CREATE TABLE IF NOT EXISTS `hotel_categories` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT COMMENT 'PK de la categoría de hotel.',
  `category_name` varchar(20) NOT NULL COMMENT 'Nombre de categoría de hotel.',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Almacena las categorías en las cuales los hoteles se caracte' AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `hotel_categories`
--

INSERT INTO `hotel_categories` (`id`, `category_name`) VALUES
(1, 'Luxury Hotel'),
(2, 'Boutique Hotel'),
(3, 'Eco-Lodge'),
(4, 'Bed & Breatfast'),
(5, '5 Star Hotel'),
(6, '4 Star Hotel'),
(7, '3 Star Hotel');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `i18n_keys`
--

CREATE TABLE IF NOT EXISTS `i18n_keys` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `language` varchar(5) NOT NULL,
  `type` varchar(45) NOT NULL,
  `owner_id` mediumint(9) NOT NULL,
  `key` varchar(30) NOT NULL,
  `value` varchar(300) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `owner_id_UNIQUE` (`owner_id`,`language`,`type`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=382 ;

--
-- Volcado de datos para la tabla `i18n_keys`
--

INSERT INTO `i18n_keys` (`id`, `language`, `type`, `owner_id`, `key`, `value`) VALUES
(1, 'en', 'HOTEL_DININGANDDRINKING', 1, 'hdad_1', 'TEXTO DE PRUEBA DE DINING AND DRINKING PARA INTERNACIONALIZACION'),
(2, 'en', 'PRODUCT_DIRECTION', 1, 'hdesc_1', 'texto de prueba de direction'),
(3, 'en', 'PRODUCT_DESCRIPTION', 1, 'hdirec_1', 'texto de prueba de description'),
(4, 'en', 'HOTEL_ROOMNOTES', 1, 'hrn_1', 'texto de prueba de notas'),
(5, 'en', 'ROOM_DESCRIPTION', 1, 'rdesc_1', 'texto de room description'),
(6, 'en', 'ROOM_DESCRIPTION', 2, 'rdesc_2', 'texto de descripcion 2'),
(7, 'en', 'REVIEW', 1, 'rev_1', 'texto del review para prueba de internacionalizacion'),
(8, 'en', 'REVIEW', 2, 'rev_2', 'Texto del review 2 pRUEBA bv'),
(9, 'en', 'REVIEW', 3, 'rev_3', 'texto con el review 3'),
(10, 'en', 'ROOM_INCLUDE', 1, 'rincl_1', 'texto de room include'),
(11, 'en', 'ROOM_INCLUDE', 2, 'rincl_2', 'texto de include 2'),
(34, 'en', 'PRODUCT_DESCRIPTION', 23, '', 'asdfsadfaa'),
(35, 'en', 'PRODUCT_DIRECTION', 23, '', 'sdfasdf'),
(36, 'en', 'PRODUCT_DESCRIPTION', 24, '', 'sdfsdafas'),
(37, 'en', 'PRODUCT_DIRECTION', 24, '', 'sadfsadfasdf'),
(38, 'en', 'PRODUCT_DESCRIPTION', 25, '', 'descrioc'),
(39, 'en', 'PRODUCT_DIRECTION', 25, '', 'sadfas sdf escriben'),
(50, 'en', 'PRODUCT_DESCRIPTION', 31, '', '4534v  wertwert'),
(51, 'en', 'PRODUCT_DIRECTION', 31, '', 'wer wertrew te'),
(54, 'en', 'PRODUCT_DESCRIPTION', 33, '', 'ewrlkweqrjlqwe'),
(55, 'en', 'PRODUCT_DIRECTION', 33, '', 'qwerkjnqwerkljn'),
(56, 'en', 'PRODUCT_DESCRIPTION', 34, '', 'sdafasdf'),
(57, 'en', 'PRODUCT_DIRECTION', 34, '', 'asdfasdfsdf'),
(58, 'en', 'PRODUCT_DESCRIPTION', 36, '', 'sdafasdf'),
(59, 'en', 'PRODUCT_DIRECTION', 36, '', 'asdfasdfsdf'),
(60, 'en', 'PRODUCT_DESCRIPTION', 37, '', 'sdafasdf'),
(61, 'en', 'PRODUCT_DIRECTION', 37, '', 'asdfasdfsdf'),
(62, 'en', 'PRODUCT_DESCRIPTION', 38, '', 'sdafasdf'),
(63, 'en', 'PRODUCT_DIRECTION', 38, '', 'asdfasdfsdf'),
(64, 'en', 'PRODUCT_DESCRIPTION', 39, '', 'sdafasdf'),
(65, 'en', 'PRODUCT_DIRECTION', 39, '', 'asdfasdfsdf'),
(66, 'en', 'PRODUCT_DESCRIPTION', 40, '', 'asfsdaf'),
(67, 'en', 'PRODUCT_DIRECTION', 40, '', 'asdfdsafsdfasdf'),
(68, 'en', 'PRODUCT_DESCRIPTION', 41, '', 'sadfsdf'),
(69, 'en', 'PRODUCT_DIRECTION', 41, '', 'asdfasdfsadf'),
(70, 'en', 'PRODUCT_DESCRIPTION', 19, '', 'sdfasfdasdf asf sdaf en'),
(71, 'en', 'PRODUCT_DIRECTION', 19, '', 'asdgfgdsgfdf  en'),
(79, 'en', 'HOTEL_DININGANDDRINKING', 19, '', 'dfgdfsg dfsgs fdgfdg f 69 en'),
(80, 'en', 'HOTEL_ROOMNOTES', 19, '', 'notes insaf dfd 1'),
(86, 'es', 'PRODUCT_DESCRIPTION', 19, '', 'texto en espanol desc'),
(89, 'es', 'PRODUCT_DIRECTION', 19, '', 'texto en espanol'),
(90, 'pt', 'PRODUCT_DESCRIPTION', 19, '', 'desacx pt'),
(91, 'pt', 'PRODUCT_DIRECTION', 19, '', 'text pt'),
(92, 'es', 'HOTEL_DININGANDDRINKING', 19, '', '4654ret es'),
(93, 'pt', 'HOTEL_DININGANDDRINKING', 19, '', 'wertwret pt'),
(94, 'es', 'HOTEL_ROOMNOTES', 19, '', 'notes es'),
(95, 'pt', 'HOTEL_ROOMNOTES', 19, '', 'notes pt'),
(96, 'es', 'PRODUCT_DESCRIPTION', 24, '', ''),
(97, 'pt', 'PRODUCT_DESCRIPTION', 24, '', ''),
(98, 'es', 'PRODUCT_DIRECTION', 24, '', ''),
(99, 'pt', 'PRODUCT_DIRECTION', 24, '', ''),
(100, 'en', 'HOTEL_DININGANDDRINKING', 24, '', ''),
(101, 'es', 'HOTEL_DININGANDDRINKING', 24, '', ''),
(102, 'pt', 'HOTEL_DININGANDDRINKING', 24, '', ''),
(103, 'en', 'HOTEL_ROOMNOTES', 24, '', ''),
(104, 'es', 'HOTEL_ROOMNOTES', 24, '', ''),
(105, 'pt', 'HOTEL_ROOMNOTES', 24, '', ''),
(106, 'en', 'ROOM_DESCRIPTION', 31, '', 'sadfdsaf fdsafas dfsdo'),
(107, 'en', 'ROOM_INCLUDE', 32, '', 'jhjkhjkhj uhuu'),
(108, 'en', 'ROOM_INCLUDE', 33, '', 'fdg sdfg261261 '),
(109, 'en', 'ROOM_DESCRIPTION', 30, '', 'cddddddddddddddddfxo'),
(110, 'es', 'ROOM_DESCRIPTION', 30, '', 'sdddddddddddddddfo'),
(111, 'pt', 'ROOM_DESCRIPTION', 30, '', 'xxxxxxxxxxxxxxxxxco'),
(112, 'en', 'ROOM_INCLUDE', 30, '', ''),
(113, 'es', 'ROOM_DESCRIPTION', 31, '', 'sdfatrrgghhj hjo'),
(114, 'pt', 'ROOM_DESCRIPTION', 31, '', 'okjg jh12654'),
(115, 'en', 'ROOM_DESCRIPTION', 32, '', 'fgsdfgo'),
(116, 'es', 'ROOM_DESCRIPTION', 32, '', 'sdfg gbhjo'),
(117, 'pt', 'ROOM_DESCRIPTION', 32, '', 'iiiiiiiiiiiiimko'),
(118, 'en', 'ROOM_DESCRIPTION', 33, '', 'cccccccccccccccfo'),
(119, 'es', 'ROOM_DESCRIPTION', 33, '', 'ddddddddddddfo'),
(120, 'pt', 'ROOM_DESCRIPTION', 33, '', 'bbbbbbbbbbbbbbgo fgfgf'),
(121, 'en', 'PRODUCT_DESCRIPTION', 42, '', 'fdfdsa'),
(122, 'es', 'PRODUCT_DESCRIPTION', 42, '', 'erwtret'),
(123, 'pt', 'PRODUCT_DESCRIPTION', 42, '', 'gpidjsgiop 0''09'),
(124, 'en', 'PRODUCT_DIRECTION', 42, '', 'fdsamngbjg 456854'),
(125, 'es', 'PRODUCT_DIRECTION', 42, '', 'fdg,knjsdklfg 4564'),
(126, 'pt', 'PRODUCT_DIRECTION', 42, '', 'g,knfklg 21564'),
(127, 'en', 'HOTEL_DININGANDDRINKING', 42, '', 'fgfd gsfg 648'),
(128, 'es', 'HOTEL_DININGANDDRINKING', 42, '', 'fd gfg s456484'),
(129, 'pt', 'HOTEL_DININGANDDRINKING', 42, '', 'fgsfd g564684'),
(130, 'en', 'HOTEL_ROOMNOTES', 42, '', 'glhsi h'),
(131, 'es', 'HOTEL_ROOMNOTES', 42, '', 'hsdflh fgi'),
(132, 'pt', 'HOTEL_ROOMNOTES', 42, '', 'ldskhgfkdl89899'),
(133, 'es', 'REVIEW', 2, '', 'texto del review para pruebafgf'),
(134, 'pt', 'REVIEW', 2, '', ''),
(135, 'en', 'REVIEW', 5, '', ''),
(136, 'es', 'REVIEW', 5, '', 'mbmbj'),
(137, 'pt', 'REVIEW', 5, '', 'mnvbhb'),
(138, 'en', 'REVIEW', 4, '', 'kioasd fosadif'),
(139, 'es', 'REVIEW', 4, '', ',kn,nk sdfksadf as'),
(140, 'pt', 'REVIEW', 4, '', 'mnbmnb asdfasdfasdf'),
(141, 'es', 'REVIEW', 3, '', ''),
(142, 'pt', 'REVIEW', 3, '', ',bjbj'),
(143, 'en', 'REVIEW', 6, '', ''),
(144, 'es', 'REVIEW', 6, '', 'es dfd'),
(145, 'pt', 'REVIEW', 6, '', 'jholasd'),
(146, 'en', 'PRODUCT_DESCRIPTION', 44, '', 'asdfasdf '),
(147, 'en', 'PRODUCT_DIRECTION', 44, '', 'asd fsadf sadf'),
(148, 'es', 'PRODUCT_DESCRIPTION', 44, '', 'mgjh'),
(149, 'pt', 'PRODUCT_DESCRIPTION', 44, '', ''),
(150, 'es', 'PRODUCT_DIRECTION', 44, '', ''),
(151, 'pt', 'PRODUCT_DIRECTION', 44, '', ''),
(152, 'en', 'HOTEL_DININGANDDRINKING', 44, '', 'texto en ingles'),
(153, 'es', 'HOTEL_DININGANDDRINKING', 44, '', ''),
(154, 'pt', 'HOTEL_DININGANDDRINKING', 44, '', ''),
(155, 'en', 'HOTEL_ROOMNOTES', 44, '', ''),
(156, 'es', 'HOTEL_ROOMNOTES', 44, '', ''),
(157, 'pt', 'HOTEL_ROOMNOTES', 44, '', 'jojo jo'),
(158, 'en', 'ROOM_DESCRIPTION', 39, '', ' asdf asdf'),
(159, 'es', 'ROOM_DESCRIPTION', 39, '', ' asdfs ad'),
(160, 'pt', 'ROOM_DESCRIPTION', 39, '', 'sdfsda '),
(161, 'en', 'ROOM_DESCRIPTION', 40, '', ''),
(162, 'es', 'ROOM_DESCRIPTION', 40, '', ''),
(163, 'pt', 'ROOM_DESCRIPTION', 40, '', ''),
(164, 'en', 'ROOM_DESCRIPTION', 41, '', 'texto en'),
(165, 'es', 'ROOM_DESCRIPTION', 41, '', 'texto eesp'),
(166, 'pt', 'ROOM_DESCRIPTION', 41, '', 'texto pt'),
(167, 'en', 'REVIEW', 7, '', ''),
(168, 'es', 'REVIEW', 7, '', 'texto en espanol'),
(169, 'pt', 'REVIEW', 7, '', ''),
(170, 'en', 'REVIEW', 8, '', 'sonriendo como cada vez, como aquella vez'),
(171, 'es', 'REVIEW', 8, '', ''),
(172, 'pt', 'REVIEW', 8, '', ''),
(173, 'en', 'REVIEW', 9, '', ''),
(174, 'es', 'REVIEW', 9, '', ''),
(175, 'pt', 'REVIEW', 9, '', ''),
(176, 'en', 'REVIEW', 10, '', ''),
(177, 'es', 'REVIEW', 10, '', ''),
(178, 'pt', 'REVIEW', 10, '', ''),
(179, 'en', 'PRODUCT_DESCRIPTION', 45, '', 'texto descripciuon'),
(180, 'es', 'PRODUCT_DESCRIPTION', 45, '', 'texto en espanol es'),
(181, 'pt', 'PRODUCT_DESCRIPTION', 45, '', 'texto en portugues'),
(182, 'en', 'PRODUCT_DIRECTION', 45, '', 'direction en piip'),
(183, 'es', 'PRODUCT_DIRECTION', 45, '', 'direccion es p'),
(184, 'pt', 'PRODUCT_DIRECTION', 45, '', 'direccion ptp pl'),
(185, 'en', 'HOTEL_DININGANDDRINKING', 45, '', 'texto d&d en fg'),
(186, 'es', 'HOTEL_DININGANDDRINKING', 45, '', 'texto d&d es fg'),
(187, 'pt', 'HOTEL_DININGANDDRINKING', 45, '', 'texto d&d pt fg'),
(188, 'en', 'ROOM_DESCRIPTION', 43, '', ''),
(189, 'es', 'ROOM_DESCRIPTION', 43, '', 'des'),
(190, 'pt', 'ROOM_DESCRIPTION', 43, '', ''),
(191, 'en', 'ROOM_DESCRIPTION', 44, '', ''),
(192, 'es', 'ROOM_DESCRIPTION', 44, '', ''),
(193, 'pt', 'ROOM_DESCRIPTION', 44, '', 'sdf sdf '),
(194, 'en', 'REVIEW', 11, '', 'tedsfads '),
(195, 'es', 'REVIEW', 11, '', 'sgvsfdg'),
(196, 'pt', 'REVIEW', 11, '', 'cfdhgsfd'),
(197, 'en', 'REVIEW', 12, '', 'fgdfg sd'),
(198, 'es', 'REVIEW', 12, '', ''),
(199, 'pt', 'REVIEW', 12, '', ''),
(200, 'en', 'REVIEW', 14, '', 'bdfs sdfg '),
(201, 'es', 'REVIEW', 14, '', 'es gfh'),
(202, 'pt', 'REVIEW', 14, '', 'fdg spt'),
(203, 'en', 'REVIEW', 15, '', ''),
(204, 'es', 'REVIEW', 15, '', 'bcg'),
(205, 'pt', 'REVIEW', 15, '', ''),
(206, 'en', 'PRODUCT_DESCRIPTION', 46, '', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cill'),
(207, 'es', 'PRODUCT_DESCRIPTION', 46, '', 'descripcion rr asdf ds'),
(208, 'pt', 'PRODUCT_DESCRIPTION', 46, '', 'descripcion port asdf '),
(209, 'en', 'PRODUCT_DIRECTION', 46, '', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cill'),
(210, 'es', 'PRODUCT_DIRECTION', 46, '', 'descripcion esrr'),
(211, 'pt', 'PRODUCT_DIRECTION', 46, '', 'eee'),
(212, 'en', 'HOTEL_DININGANDDRINKING', 46, '', 'texto en ff'),
(213, 'es', 'HOTEL_DININGANDDRINKING', 46, '', 'texto esff'),
(214, 'pt', 'HOTEL_DININGANDDRINKING', 46, '', 'ddff'),
(215, 'en', 'ROOM_DESCRIPTION', 45, '', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cill'),
(216, 'es', 'ROOM_DESCRIPTION', 45, '', 'hku'),
(217, 'pt', 'ROOM_DESCRIPTION', 45, '', ''),
(218, 'en', 'ROOM_DESCRIPTION', 46, '', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cill'),
(219, 'es', 'ROOM_DESCRIPTION', 46, '', ''),
(220, 'pt', 'ROOM_DESCRIPTION', 46, '', ''),
(221, 'en', 'ROOM_DESCRIPTION', 47, '', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cill'),
(222, 'es', 'ROOM_DESCRIPTION', 47, '', ''),
(223, 'pt', 'ROOM_DESCRIPTION', 47, '', ''),
(224, 'en', 'ROOM_DESCRIPTION', 48, '', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cill'),
(225, 'es', 'ROOM_DESCRIPTION', 48, '', ''),
(226, 'pt', 'ROOM_DESCRIPTION', 48, '', ''),
(227, 'en', 'REVIEW', 16, '', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cill'),
(228, 'es', 'REVIEW', 16, '', 'dfg hhh '),
(229, 'pt', 'REVIEW', 16, '', 'dsgdfg gg hhh'),
(230, 'en', 'REVIEW', 17, '', 'PRUEBA'),
(231, 'es', 'REVIEW', 17, '', 'FDSA'),
(232, 'pt', 'REVIEW', 17, '', 'ASDF'),
(233, 'en', 'REVIEW', 18, '', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cill'),
(234, 'es', 'REVIEW', 18, '', 'pppfg dfg'),
(235, 'pt', 'REVIEW', 18, '', 'fgf g f'),
(236, 'en', 'HOTEL_ROOMNOTES', 46, '', 'asdfasdfr ddd'),
(237, 'es', 'HOTEL_ROOMNOTES', 46, '', 'asdfsd es ddd'),
(238, 'pt', 'HOTEL_ROOMNOTES', 46, '', 'sdsad pt dddd'),
(239, 'en', 'ROOM_INCLUDE', 0, '', 'sfdsf'),
(240, 'es', 'ROOM_INCLUDE', 0, '', 'sdfasdf'),
(241, 'pt', 'ROOM_INCLUDE', 0, '', 'asdfsdf'),
(244, 'en', 'ROOM_INCLUDE', 45, '', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqu'),
(245, 'es', 'ROOM_INCLUDE', 45, '', 'dfgfdg vv'),
(246, 'pt', 'ROOM_INCLUDE', 45, '', 'gfhdgf hgf rfrf'),
(247, 'en', 'ROOM_INCLUDE', 46, '', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, '),
(248, 'es', 'ROOM_INCLUDE', 46, '', 'rtrd'),
(249, 'pt', 'ROOM_INCLUDE', 46, '', 'ptsdfgh'),
(250, 'en', 'ROOM_INCLUDE', 47, '', 'citation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cill'),
(251, 'es', 'ROOM_INCLUDE', 47, '', 'fsde'),
(252, 'pt', 'ROOM_INCLUDE', 47, '', ''),
(253, 'en', 'ROOM_INCLUDE', 48, '', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cill'),
(254, 'es', 'ROOM_INCLUDE', 48, '', ''),
(255, 'pt', 'ROOM_INCLUDE', 48, '', ''),
(256, 'en', 'REVIEW', 19, '', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cill'),
(257, 'es', 'REVIEW', 19, '', 'ee sfdgsfd'),
(258, 'pt', 'REVIEW', 19, '', 'popo fdgfsdg'),
(259, 'en', 'REVIEW', 20, '', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cill'),
(260, 'es', 'REVIEW', 20, '', ''),
(261, 'pt', 'REVIEW', 20, '', ''),
(262, 'en', 'REVIEW', 21, '', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cill'),
(263, 'es', 'REVIEW', 21, '', ''),
(264, 'pt', 'REVIEW', 21, '', ''),
(265, 'es', 'PRODUCT_DESCRIPTION', 1, '', ''),
(266, 'pt', 'PRODUCT_DESCRIPTION', 1, '', ''),
(267, 'es', 'PRODUCT_DIRECTION', 1, '', ''),
(268, 'pt', 'PRODUCT_DIRECTION', 1, '', ''),
(269, 'es', 'HOTEL_ROOMNOTES', 1, '', ''),
(270, 'pt', 'HOTEL_ROOMNOTES', 1, '', ''),
(271, 'es', 'HOTEL_DININGANDDRINKING', 1, '', ''),
(272, 'pt', 'HOTEL_DININGANDDRINKING', 1, '', ''),
(273, 'en', 'PRODUCT_DESCRIPTION', 2, '', 'texto rpeue'),
(274, 'es', 'PRODUCT_DESCRIPTION', 2, '', ''),
(275, 'pt', 'PRODUCT_DESCRIPTION', 2, '', ''),
(276, 'en', 'PRODUCT_DIRECTION', 2, '', ''),
(277, 'es', 'PRODUCT_DIRECTION', 2, '', ''),
(278, 'pt', 'PRODUCT_DIRECTION', 2, '', ''),
(279, 'en', 'HOTEL_ROOMNOTES', 2, '', ''),
(280, 'es', 'HOTEL_ROOMNOTES', 2, '', ''),
(281, 'pt', 'HOTEL_ROOMNOTES', 2, '', ''),
(282, 'en', 'HOTEL_DININGANDDRINKING', 2, '', ''),
(283, 'es', 'HOTEL_DININGANDDRINKING', 2, '', ''),
(284, 'pt', 'HOTEL_DININGANDDRINKING', 2, '', ''),
(285, 'es', 'PRODUCT_DESCRIPTION', 23, '', ''),
(286, 'pt', 'PRODUCT_DESCRIPTION', 23, '', ''),
(287, 'es', 'PRODUCT_DIRECTION', 23, '', ''),
(288, 'pt', 'PRODUCT_DIRECTION', 23, '', ''),
(289, 'en', 'HOTEL_ROOMNOTES', 23, '', ''),
(290, 'es', 'HOTEL_ROOMNOTES', 23, '', ''),
(291, 'pt', 'HOTEL_ROOMNOTES', 23, '', ''),
(292, 'en', 'HOTEL_DININGANDDRINKING', 23, '', ''),
(293, 'es', 'HOTEL_DININGANDDRINKING', 23, '', ''),
(294, 'pt', 'HOTEL_DININGANDDRINKING', 23, '', ''),
(295, 'es', 'PRODUCT_DESCRIPTION', 33, '', ''),
(296, 'pt', 'PRODUCT_DESCRIPTION', 33, '', ''),
(297, 'es', 'PRODUCT_DIRECTION', 33, '', ''),
(298, 'pt', 'PRODUCT_DIRECTION', 33, '', ''),
(299, 'en', 'HOTEL_ROOMNOTES', 33, '', ''),
(300, 'es', 'HOTEL_ROOMNOTES', 33, '', ''),
(301, 'pt', 'HOTEL_ROOMNOTES', 33, '', ''),
(302, 'en', 'HOTEL_DININGANDDRINKING', 33, '', ''),
(303, 'es', 'HOTEL_DININGANDDRINKING', 33, '', ''),
(304, 'pt', 'HOTEL_DININGANDDRINKING', 33, '', ''),
(305, 'es', 'PRODUCT_DESCRIPTION', 25, '', ''),
(306, 'pt', 'PRODUCT_DESCRIPTION', 25, '', ''),
(307, 'es', 'PRODUCT_DIRECTION', 25, '', ''),
(308, 'pt', 'PRODUCT_DIRECTION', 25, '', ''),
(309, 'en', 'HOTEL_ROOMNOTES', 25, '', ''),
(310, 'es', 'HOTEL_ROOMNOTES', 25, '', ''),
(311, 'pt', 'HOTEL_ROOMNOTES', 25, '', ''),
(312, 'en', 'HOTEL_DININGANDDRINKING', 25, '', ''),
(313, 'es', 'HOTEL_DININGANDDRINKING', 25, '', ''),
(314, 'pt', 'HOTEL_DININGANDDRINKING', 25, '', ''),
(315, 'es', 'PRODUCT_DESCRIPTION', 34, '', ''),
(316, 'pt', 'PRODUCT_DESCRIPTION', 34, '', ''),
(317, 'es', 'PRODUCT_DIRECTION', 34, '', ''),
(318, 'pt', 'PRODUCT_DIRECTION', 34, '', ''),
(319, 'en', 'HOTEL_ROOMNOTES', 34, '', ''),
(320, 'es', 'HOTEL_ROOMNOTES', 34, '', ''),
(321, 'pt', 'HOTEL_ROOMNOTES', 34, '', ''),
(322, 'en', 'HOTEL_DININGANDDRINKING', 34, '', ''),
(323, 'es', 'HOTEL_DININGANDDRINKING', 34, '', ''),
(324, 'pt', 'HOTEL_DININGANDDRINKING', 34, '', ''),
(325, 'es', 'PRODUCT_DESCRIPTION', 36, '', ''),
(326, 'pt', 'PRODUCT_DESCRIPTION', 36, '', ''),
(327, 'es', 'PRODUCT_DIRECTION', 36, '', ''),
(328, 'pt', 'PRODUCT_DIRECTION', 36, '', ''),
(329, 'en', 'HOTEL_ROOMNOTES', 36, '', ''),
(330, 'es', 'HOTEL_ROOMNOTES', 36, '', ''),
(331, 'pt', 'HOTEL_ROOMNOTES', 36, '', ''),
(332, 'en', 'HOTEL_DININGANDDRINKING', 36, '', ''),
(333, 'es', 'HOTEL_DININGANDDRINKING', 36, '', ''),
(334, 'pt', 'HOTEL_DININGANDDRINKING', 36, '', ''),
(336, 'es', 'PRODUCT_DESCRIPTION', 38, '', ''),
(337, 'pt', 'PRODUCT_DESCRIPTION', 38, '', ''),
(338, 'es', 'PRODUCT_DIRECTION', 38, '', ''),
(339, 'pt', 'PRODUCT_DIRECTION', 38, '', ''),
(340, 'en', 'HOTEL_ROOMNOTES', 38, '', ''),
(341, 'es', 'HOTEL_ROOMNOTES', 38, '', ''),
(342, 'pt', 'HOTEL_ROOMNOTES', 38, '', ''),
(343, 'en', 'HOTEL_DININGANDDRINKING', 38, '', ''),
(344, 'es', 'HOTEL_DININGANDDRINKING', 38, '', ''),
(345, 'pt', 'HOTEL_DININGANDDRINKING', 38, '', ''),
(346, 'es', 'PRODUCT_DESCRIPTION', 39, '', ''),
(347, 'pt', 'PRODUCT_DESCRIPTION', 39, '', ''),
(348, 'es', 'PRODUCT_DIRECTION', 39, '', ''),
(349, 'pt', 'PRODUCT_DIRECTION', 39, '', ''),
(350, 'en', 'HOTEL_ROOMNOTES', 39, '', ''),
(351, 'es', 'HOTEL_ROOMNOTES', 39, '', ''),
(352, 'pt', 'HOTEL_ROOMNOTES', 39, '', ''),
(353, 'en', 'HOTEL_DININGANDDRINKING', 39, '', ''),
(354, 'es', 'HOTEL_DININGANDDRINKING', 39, '', ''),
(355, 'pt', 'HOTEL_DININGANDDRINKING', 39, '', ''),
(356, 'es', 'PRODUCT_DESCRIPTION', 40, '', ''),
(357, 'pt', 'PRODUCT_DESCRIPTION', 40, '', ''),
(358, 'es', 'PRODUCT_DIRECTION', 40, '', ''),
(359, 'pt', 'PRODUCT_DIRECTION', 40, '', ''),
(360, 'en', 'HOTEL_ROOMNOTES', 40, '', ''),
(361, 'es', 'HOTEL_ROOMNOTES', 40, '', ''),
(362, 'pt', 'HOTEL_ROOMNOTES', 40, '', ''),
(363, 'en', 'HOTEL_DININGANDDRINKING', 40, '', ''),
(364, 'es', 'HOTEL_DININGANDDRINKING', 40, '', ''),
(365, 'pt', 'HOTEL_DININGANDDRINKING', 40, '', ''),
(366, 'en', 'PRODUCT_DESCRIPTION', 43, '', ''),
(367, 'es', 'PRODUCT_DESCRIPTION', 43, '', ''),
(368, 'pt', 'PRODUCT_DESCRIPTION', 43, '', ''),
(369, 'en', 'PRODUCT_DIRECTION', 43, '', ''),
(370, 'es', 'PRODUCT_DIRECTION', 43, '', ''),
(371, 'pt', 'PRODUCT_DIRECTION', 43, '', ''),
(372, 'en', 'HOTEL_ROOMNOTES', 43, '', ''),
(373, 'es', 'HOTEL_ROOMNOTES', 43, '', ''),
(374, 'pt', 'HOTEL_ROOMNOTES', 43, '', ''),
(375, 'en', 'HOTEL_DININGANDDRINKING', 43, '', ''),
(376, 'es', 'HOTEL_DININGANDDRINKING', 43, '', ''),
(377, 'pt', 'HOTEL_DININGANDDRINKING', 43, '', ''),
(379, 'en', 'HOTEL_ROOMNOTES', 45, '', ''),
(380, 'es', 'HOTEL_ROOMNOTES', 45, '', ''),
(381, 'pt', 'HOTEL_ROOMNOTES', 45, '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT 'PK de la imagen.',
  `image_name` varchar(80) NOT NULL COMMENT 'Nombre del archivo de imagen.',
  `owner_type` varchar(45) NOT NULL,
  `owner_id` mediumint(9) NOT NULL,
  `dir` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Almacena el nombre de los archivos de imagen asociados a los' AUTO_INCREMENT=338 ;

--
-- Volcado de datos para la tabla `images`
--

INSERT INTO `images` (`id`, `image_name`, `owner_type`, `owner_id`, `dir`) VALUES
(1, 'vrissiana beach hotel cyprus protaras pool.jpg', 'HOTEL', 1, '1'),
(2, 'Spisesal.jpg', 'HOTEL', 2, '2'),
(3, 'toledo-15.JPG', 'HOTEL', 1, '3'),
(4, '', 'image/png', 23, ''),
(5, '', 'image/jpeg', 23, ''),
(6, '', 'image/jpeg', 23, ''),
(7, '', 'image/jpeg', 23, ''),
(8, '', 'image/jpeg', 23, ''),
(9, '', 'image/jpeg', 24, ''),
(10, '', 'image/jpeg', 24, ''),
(11, '', 'image/jpeg', 24, ''),
(12, '', 'image/jpeg', 24, ''),
(13, '', 'image/jpeg', 24, ''),
(14, '', '', 25, ''),
(15, '', '', 25, ''),
(16, '', '', 25, ''),
(17, '', '', 25, ''),
(18, '', '', 25, ''),
(19, '', '', 31, ''),
(20, '', '', 31, ''),
(21, '', '', 31, ''),
(22, '', '', 31, ''),
(23, '', '', 31, ''),
(24, 'hotelsilver.jpg', 'HOTEL', 33, '24'),
(25, 'hotel-egypt.jpg', 'HOTEL', 33, '25'),
(26, 'codigo-binario.', 'HOTEL', 33, ''),
(27, 'codigo.jpg', 'HOTEL', 33, ''),
(28, 'banner.png', 'HOTEL', 33, ''),
(29, '004-p.png', 'HOTEL', 33, ''),
(30, 'binario.jpg', 'HOTEL', 33, ''),
(31, 'hotel-egypt.jpg', 'HOTEL', 40, '31'),
(32, 'binario.jpg', 'HOTEL', 41, ''),
(33, 'cambio.jpg', 'HOTEL', 41, ''),
(34, 'codigo.jpg', 'HOTEL', 41, ''),
(35, 'Codigo-Binario.', 'HOTEL', 41, ''),
(36, 'agujero-negro.j', 'HOTEL', 41, ''),
(42, '34.jpg', 'HOTEL', 43, '42'),
(43, 'codigo-binario.jpg', 'HOTEL', 43, '43'),
(44, 'Codigo-Binario.jpg', 'HOTEL', 43, '44'),
(45, 'codigo-fuente2.jpg', 'HOTEL', 43, '45'),
(46, 'codigo_fuente.jpg', 'HOTEL', 43, '46'),
(253, 'hotel013.jpg', 'HOTEL', 42, '253'),
(254, 'cmasmas.png', 'HOTEL', 42, ''),
(255, '', 'HOTEL', 42, ''),
(256, '', 'HOTEL', 42, ''),
(257, '', 'HOTEL', 42, ''),
(258, 'underwater-hotel-istanbul.jpg', 'HOTEL', 44, '258'),
(259, 'millenium-hotel-dubai-pool.jpg', 'HOTEL', 44, '259'),
(260, 'hotelsilver.jpg', 'HOTEL', 44, '260'),
(261, 'hotel1255.jpg', 'HOTEL', 44, '261'),
(263, 'hotelsilver.jpg', 'HOTEL', 44, '263'),
(264, 'toledo-15.JPG', 'HOTEL', 45, '264'),
(265, 'vrissiana beach hotel cyprus protaras pool.jpg', 'HOTEL', 45, '265'),
(266, 'mandri10.jpg', 'HOTEL', 45, '266'),
(270, 'codigo-binario.jpg', 'HOTEL', 0, '270'),
(271, 'Codigo-Binario.jpg', 'HOTEL', 0, '271'),
(272, 'codigo-fuente2.jpg', 'HOTEL', 0, '272'),
(273, 'codigo_fuente.jpg', 'HOTEL', 0, '273'),
(274, 'fondo1.jpeg', 'HOTEL', 0, '274'),
(275, 'binario.jpg', 'HOTEL', 45, '275'),
(276, 'Fondo-del-Universo-1.jpeg', 'HOTEL', 45, '276'),
(277, 'hotelsilver.jpg', 'HOTEL', 46, '277'),
(279, 'hotel1255.jpg', 'HOTEL', 46, '279'),
(280, 'hotel226.jpg', 'HOTEL', 46, '280'),
(290, 'hotel55.jpg', 'HOTEL', 46, '290'),
(291, 'hotel013.jpg', 'HOTEL', 46, '291'),
(292, 'millenium-hotel-dubai-pool.jpg', 'HOTEL', 1, '292'),
(293, 'Spisesal.jpg', 'HOTEL', 1, '293'),
(294, 'hotelsilver.jpg', 'HOTEL', 1, '294'),
(295, 'hotel-egypt.jpg', 'HOTEL', 2, '295'),
(296, '', 'HOTEL', 2, ''),
(297, '', 'HOTEL', 2, ''),
(298, '', 'HOTEL', 2, ''),
(299, 'vrissiana beach hotel cyprus protaras pool.jpg', 'HOTEL', 23, '299'),
(300, 'underwater-hotel-istanbul.jpg', 'HOTEL', 23, '300'),
(301, '', 'HOTEL', 23, ''),
(302, '', 'HOTEL', 23, ''),
(303, '', 'HOTEL', 23, ''),
(304, 'hotels-in-gambia.jpg', 'HOTEL', 24, '304'),
(305, '404c0e08416a23ab0d34bb3a72d812e4_1272958375.jpg', 'HOTEL', 24, '305'),
(306, '', 'HOTEL', 24, ''),
(307, '', 'HOTEL', 24, ''),
(308, '', 'HOTEL', 24, ''),
(309, 'underwater-hotel-istanbul.jpg', 'HOTEL', 25, '309'),
(310, 'monaco.jpg', 'HOTEL', 25, '310'),
(311, '', 'HOTEL', 25, ''),
(312, '', 'HOTEL', 25, ''),
(313, '', 'HOTEL', 25, ''),
(314, 'Ecuador_Montanita_hotels.JPG', 'HOTEL', 34, '314'),
(315, '', 'HOTEL', 34, ''),
(316, '', 'HOTEL', 34, ''),
(317, '', 'HOTEL', 34, ''),
(318, '', 'HOTEL', 34, ''),
(319, 'apeiron_18.jpg', 'HOTEL', 36, '319'),
(320, '', 'HOTEL', 36, ''),
(321, '', 'HOTEL', 36, ''),
(322, '', 'HOTEL', 36, ''),
(323, '', 'HOTEL', 36, ''),
(324, 'hotel1255.jpg', 'HOTEL', 38, '324'),
(325, '', 'HOTEL', 38, ''),
(326, '', 'HOTEL', 38, ''),
(327, '', 'HOTEL', 38, ''),
(328, '', 'HOTEL', 38, ''),
(329, '5255555.jpeg', 'HOTEL', 39, '329'),
(330, '', 'HOTEL', 39, ''),
(331, '', 'HOTEL', 39, ''),
(332, '', 'HOTEL', 39, ''),
(333, '', 'HOTEL', 39, ''),
(334, '', 'HOTEL', 40, ''),
(335, '', 'HOTEL', 40, ''),
(336, '', 'HOTEL', 40, ''),
(337, '', 'HOTEL', 40, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `locations`
--

CREATE TABLE IF NOT EXISTS `locations` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT 'PK de la localidad.',
  `location_name` varchar(30) NOT NULL COMMENT 'Nombre de la localidad.',
  `region_id` smallint(5) unsigned NOT NULL COMMENT 'Identificador de la región a la cual pertenece la localidad.',
  PRIMARY KEY (`id`),
  KEY `region_id` (`region_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Almacena la localidad, o ubicación específica dentro de una ' AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `locations`
--

INSERT INTO `locations` (`id`, `location_name`, `region_id`) VALUES
(1, 'San Jose City', 1),
(2, 'Airport Area', 1),
(3, 'Savegre Valley', 1),
(4, 'Turrialba', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT 'PK del producto.',
  `location_id` mediumint(8) unsigned NOT NULL COMMENT 'Identificador de la localidad geográfica en la cual se encuentra el producto.',
  `gpslatitude` varchar(30) NOT NULL COMMENT 'Latitude en la que se encuentra el producto.',
  `gpslongitude` varchar(30) NOT NULL COMMENT 'Longitud en la que se encuentra el producto.',
  `product_name` varchar(45) NOT NULL COMMENT 'Nombre por defecto del producto.',
  `i18n_description` varchar(30) NOT NULL,
  `i18n_direction` varchar(30) DEFAULT NULL,
  `map` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_name_UNIQUE` (`product_name`),
  KEY `fk_product_location` (`location_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Almacena los datos de un producto del catálogo. Un producto ' AUTO_INCREMENT=47 ;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `location_id`, `gpslatitude`, `gpslongitude`, `product_name`, `i18n_description`, `i18n_direction`, `map`) VALUES
(1, 1, '25', '36', 'hotel 1', 'hdesc_1', 'hdirec_1', 'http://maps.google.co.cr/maps?hl=es&ll=9.93765,-84.094328&spn=0.001709,0.003557&sll=9.93765,-84.0943'),
(2, 1, '25', '36', 'hotel 2', 'hdesc_2', 'hdirec_2', ''),
(3, 1, '25', '36', 'hotel 3', 'hdesc_3', 'hdirec_3', NULL),
(4, 3, '25', '36', 'hotel 4', 'hdesc_4', 'hdirec_4', NULL),
(5, 1, '25', '36', 'hotel 5', 'hdesc_5', 'hdirec_5', NULL),
(6, 4, '25', '36', 'hotel 6', 'hdesc_6', 'hdirec_6', NULL),
(7, 1, '25', '36', 'hotel 7', 'hdesc_7', 'hdirec_7', NULL),
(23, 3, 'werdsvfsad', '4325235', 'sadfsadf', '', NULL, ''),
(24, 1, '453425', '23453425', 'jolad', '', NULL, ''),
(25, 3, '3453 456', 'rt54562 24', 'prueba general', '', NULL, ''),
(33, 1, '45', '43534', 'jodsafod`', '', NULL, ''),
(34, 1, '345334534', '5435', 'sdfasd', '', NULL, ''),
(36, 1, '345334534', '5435', 'sdfasd dfd', '', NULL, ''),
(38, 1, '345334534', '5435', 'sdfasd dfdfdw', '', NULL, ''),
(39, 1, '345334534', '5435', 'sdfasd dfdfuu', '', NULL, ''),
(40, 4, '435435', '345435', 'Hola prueba', '', NULL, ''),
(42, 3, '4531', '456451', 'prueba imagenes1', '', NULL, ''),
(43, 1, '435', '2345', 'fghfg', '', NULL, ''),
(44, 1, '456', '4551', 'pdfuasdof', '', NULL, ''),
(45, 3, '1516', '8486', 'HOtel de prueba 6', '', NULL, ''),
(46, 1, '145r d', '16r d', 'hotel de pruebar', '', NULL, 'http://maps.google.co.cr/?ll=9.798329,-84.070575&spn=0.001784,0.003557&t=h&z=19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `regions`
--

CREATE TABLE IF NOT EXISTS `regions` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT 'PK de región.',
  `region_name` varchar(25) NOT NULL COMMENT 'Nombre de la región',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Almacena el registro de regiones de un país. Por ejemplo, la' AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `regions`
--

INSERT INTO `regions` (`id`, `region_name`) VALUES
(1, 'Central Valley'),
(2, 'Northean Region'),
(3, 'North Pacific'),
(4, 'Central Pacific'),
(5, 'South Pacific'),
(6, 'North Caribbean'),
(7, 'South Caribbean');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reviews`
--

CREATE TABLE IF NOT EXISTS `reviews` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT 'PK del comentario.',
  `product_id` mediumint(8) unsigned NOT NULL COMMENT 'Identificador del producto al cual se refiere el comentario.',
  `staff` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Símbolo que indica qué tipo de persona hizo el comentario. S:staff, T:traveller',
  `i18n_review` varchar(30) NOT NULL COMMENT 'Texto del comentario.',
  `review_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_review_product` (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Almacena los comentarios realizados acerca del producto, tan' AUTO_INCREMENT=22 ;

--
-- Volcado de datos para la tabla `reviews`
--

INSERT INTO `reviews` (`id`, `product_id`, `staff`, `i18n_review`, `review_date`) VALUES
(1, 1, 1, 'rev_1', '2012-01-07'),
(3, 42, 1, 'rev_3', '2012-01-15'),
(8, 44, 1, '', '0000-00-00'),
(9, 42, 0, '', '2012-02-01'),
(10, 42, 0, '', '2012-02-01'),
(11, 45, 1, '', '2012-02-04'),
(12, 45, 1, '', '2012-02-04'),
(14, 45, 1, '', '2012-02-04'),
(15, 45, 1, '', '2012-02-04'),
(16, 46, 0, '', '2012-02-04'),
(18, 46, 1, '', '2012-02-04'),
(19, 46, 0, '', '2012-02-15'),
(20, 46, 0, '', '2012-02-22'),
(21, 46, 1, '', '2012-02-22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rooms`
--

CREATE TABLE IF NOT EXISTS `rooms` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT 'PK de la habitación.',
  `hotel_id` mediumint(8) unsigned NOT NULL COMMENT 'Identificador del hotel al cual pertenece la habitación.',
  `category` varchar(30) NOT NULL COMMENT 'Categoría de la habitación según el proveedor.',
  `count` smallint(5) unsigned NOT NULL COMMENT 'Cantidad de habitaciones que el proveedor ofrece.',
  `i18n_description` varchar(45) DEFAULT NULL,
  `i18n_include` varchar(45) DEFAULT NULL,
  `suite_bathrooms` tinyint(1) NOT NULL DEFAULT '0',
  `free_internet` tinyint(1) NOT NULL DEFAULT '0',
  `air_conditioning` tinyint(1) NOT NULL DEFAULT '0',
  `orthopedic_matresses` tinyint(1) NOT NULL DEFAULT '0',
  `telephone` tinyint(1) NOT NULL DEFAULT '0',
  `alarm_clock` tinyint(1) NOT NULL DEFAULT '0',
  `cable_tv` tinyint(1) NOT NULL DEFAULT '0',
  `desk_&_chair` tinyint(1) NOT NULL DEFAULT '0',
  `jacuzzi` tinyint(1) NOT NULL DEFAULT '0',
  `hairdryer` tinyint(1) NOT NULL DEFAULT '0',
  `minibar` tinyint(1) NOT NULL DEFAULT '0',
  `coffee_maker` tinyint(1) NOT NULL DEFAULT '0',
  `microwave` tinyint(1) NOT NULL DEFAULT '0',
  `refrigerator` tinyint(1) NOT NULL DEFAULT '0',
  `iron_&_ironing_board` tinyint(1) NOT NULL DEFAULT '0',
  `safe_deposit_box` tinyint(1) NOT NULL DEFAULT '0',
  `fan` tinyint(1) NOT NULL DEFAULT '0',
  `make_up_mirror` tinyint(1) NOT NULL DEFAULT '0',
  `balcony` tinyint(1) NOT NULL DEFAULT '0',
  `private_garden` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_rooms_hotels` (`hotel_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Almacena los datos de habitaciones que el proveedor de hospe' AUTO_INCREMENT=49 ;

--
-- Volcado de datos para la tabla `rooms`
--

INSERT INTO `rooms` (`id`, `hotel_id`, `category`, `count`, `i18n_description`, `i18n_include`, `suite_bathrooms`, `free_internet`, `air_conditioning`, `orthopedic_matresses`, `telephone`, `alarm_clock`, `cable_tv`, `desk_&_chair`, `jacuzzi`, `hairdryer`, `minibar`, `coffee_maker`, `microwave`, `refrigerator`, `iron_&_ironing_board`, `safe_deposit_box`, `fan`, `make_up_mirror`, `balcony`, `private_garden`) VALUES
(1, 1, 'Deluxe', 15, 'rdesc_1', 'rincl_1', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(2, 1, 'Standar', 25, 'rdesc_2', 'rincl_2', 1, 0, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1),
(3, 1, 'Premiun', 5, 'rdesc_3', 'rincl_3', 1, 1, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(30, 42, 'sadf b xxxxccuu', 33, NULL, NULL, 0, 0, 1, 0, 0, 0, 1, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0),
(39, 44, 'sdafds', 0, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(40, 44, '', 0, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(41, 45, 'Room type 1', 5, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 0, 0, 0, 0, 1, 1, 1, 1),
(43, 45, 'type 2', 96, NULL, NULL, 1, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0),
(44, 45, 'type 3', 26, NULL, NULL, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0),
(45, 46, '54634gfh 5', 1, NULL, NULL, 1, 0, 0, 1, 1, 0, 0, 1, 1, 1, 1, 1, 1, 0, 0, 1, 1, 0, 0, 1),
(46, 46, 'categoria 2', 10, NULL, NULL, 1, 0, 0, 0, 1, 0, 1, 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0),
(47, 46, 'ddd', 6, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(48, 46, 'categoria 4', 12, NULL, NULL, 1, 0, 0, 0, 1, 0, 1, 1, 1, 0, 1, 1, 1, 0, 1, 1, 1, 0, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `room_rates`
--

CREATE TABLE IF NOT EXISTS `room_rates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `season_id` int(11) NOT NULL,
  `room_id` mediumint(8) unsigned NOT NULL COMMENT 'Identificador de la habitación a la cual aplica la tarifa.',
  `single` float unsigned DEFAULT '0' COMMENT 'Tarifa neta en ocupación single.',
  `double` float unsigned DEFAULT '0' COMMENT 'Tarifa neta en ocupación double.',
  `triple` float unsigned DEFAULT '0' COMMENT 'Tarifa net en ocupación triple.',
  `quadruple` float unsigned DEFAULT '0' COMMENT 'Tarifa net en ocupación quadruple.',
  `child` float unsigned DEFAULT '0' COMMENT 'Tarifa neta en ocupación child.',
  `infant` float unsigned DEFAULT '0' COMMENT 'Tarifa rack en ocupación infant.',
  PRIMARY KEY (`season_id`,`room_id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_room_rate_room` (`room_id`),
  KEY `fk_room_rates_season1` (`season_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Almacena las tarifas de una habitación particular en un rang' AUTO_INCREMENT=75 ;

--
-- Volcado de datos para la tabla `room_rates`
--

INSERT INTO `room_rates` (`id`, `season_id`, `room_id`, `single`, `double`, `triple`, `quadruple`, `child`, `infant`) VALUES
(48, 16, 45, 9, 2, 3, 4, 5, 6),
(52, 16, 46, 1, NULL, NULL, 8, 5, NULL),
(62, 16, 47, 1, NULL, NULL, NULL, NULL, 4),
(63, 16, 48, NULL, 6, NULL, NULL, NULL, NULL),
(51, 17, 45, 3, NULL, 5, 6, NULL, 8),
(61, 17, 46, NULL, 8, NULL, 4, NULL, 6),
(57, 17, 47, NULL, NULL, NULL, NULL, 3, NULL),
(60, 17, 48, NULL, 10, NULL, 4, NULL, NULL),
(49, 25, 45, 56, 7, 5, 9, 10, 10),
(69, 25, 46, 4, 7, 8, 8, 10, 45),
(55, 25, 47, NULL, 1, 2, 7, 3, NULL),
(58, 25, 48, 7, 8, 7, 8, 8, 8),
(64, 26, 45, NULL, 123, 12, 123, 12, NULL),
(65, 26, 46, NULL, NULL, 3, NULL, 5, 5),
(66, 26, 47, NULL, NULL, 5, 6, NULL, NULL),
(67, 26, 48, NULL, 9, 8, NULL, NULL, NULL),
(50, 28, 45, 11, 20, NULL, NULL, 21, NULL),
(54, 28, 46, 46, NULL, NULL, NULL, 5, NULL),
(56, 28, 47, NULL, 6, NULL, NULL, NULL, 4),
(59, 28, 48, 5, 5, 5, 6, 6, 6),
(74, 31, 45, NULL, NULL, NULL, 8, 10, 10),
(70, 31, 46, NULL, 27, NULL, NULL, 10, 7),
(71, 31, 47, 5, 1, 2, 7, 3, NULL),
(72, 31, 48, 6, NULL, NULL, NULL, 6, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seasons`
--

CREATE TABLE IF NOT EXISTS `seasons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hotel_id` mediumint(8) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_season_hotels1` (`hotel_id`),
  KEY `fk_seasons_2` (`parent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Volcado de datos para la tabla `seasons`
--

INSERT INTO `seasons` (`id`, `hotel_id`, `name`, `date_start`, `date_end`, `parent_id`) VALUES
(1, 42, NULL, '2012-01-30', '2012-01-30', NULL),
(2, 42, NULL, '2012-01-30', '2012-01-30', NULL),
(3, 42, NULL, '2012-06-30', '2012-01-30', NULL),
(4, 42, NULL, '2012-01-30', '2012-08-30', NULL),
(5, 42, NULL, '2012-01-30', '2012-01-30', NULL),
(6, 42, NULL, '2012-01-30', '2012-01-30', NULL),
(7, 42, NULL, '2012-01-30', '2012-01-30', NULL),
(8, 42, NULL, '0000-00-00', '2012-04-30', NULL),
(9, 24, NULL, '2012-01-30', '2012-01-30', NULL),
(10, 24, NULL, '2012-01-30', '2012-01-30', NULL),
(11, 42, NULL, '2032-01-01', '2032-01-01', NULL),
(12, 42, NULL, '2032-11-01', '2032-12-01', NULL),
(13, 45, 'semana santa', '2024-01-01', '2032-12-18', NULL),
(15, 45, 'alta', '2021-03-01', '2017-06-10', NULL),
(16, 46, 'altass', '2012-01-09', '2012-04-19', NULL),
(17, 46, 'bajase', '2012-05-01', '2012-07-12', NULL),
(25, 46, 'semana santas', '2012-04-09', '2012-04-19', 16),
(26, 46, 'pruebas', '2012-03-08', '2012-04-08', 16),
(28, 46, '63p', '2012-07-13', '2012-11-03', 17),
(31, 46, '', '2012-11-04', '2012-11-10', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT 'PK del usuario.',
  `username` varchar(50) NOT NULL COMMENT 'Nombre de usuario en el sistema.',
  `password` char(40) NOT NULL COMMENT 'Password de usuario en el sistema.',
  `first_name` varchar(32) DEFAULT NULL COMMENT 'Nombre del usuario.',
  `last_name` varchar(32) DEFAULT NULL COMMENT 'Apellido del usuario',
  `rol` varchar(5) NOT NULL DEFAULT 'guest' COMMENT 'Rol de usuario registrado: ''guest'' usuario normal y ''admin'' es usuario administrador.',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Almacena la información de autenticación para el ingreso al ' AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `first_name`, `last_name`, `rol`) VALUES
(1, 'betauser@costaricareps.com', '6b1096e814df4940561f5d522edb38c5c58929f8', 'Beta', 'User', 'guest'),
(2, 'jonathan', '6b1096e814df4940561f5d522edb38c5c58929f8', 'Jonathan', 'Sanchez', 'admin'),
(3, 'usuario', '6b1096e814df4940561f5d522edb38c5c58929f8', 'Usuario', 'Prueba', 'admin');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `activities`
--
ALTER TABLE `activities`
  ADD CONSTRAINT `fk_activity_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `hotels`
--
ALTER TABLE `hotels`
  ADD CONSTRAINT `fk_hotels_hotel_categories` FOREIGN KEY (`hotel_category_id`) REFERENCES `hotel_categories` (`id`) ON UPDATE NO ACTION;

--
-- Filtros para la tabla `locations`
--
ALTER TABLE `locations`
  ADD CONSTRAINT `region_id` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_product_location` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON UPDATE NO ACTION;

--
-- Filtros para la tabla `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `fk_review_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `fk_rooms_hotels` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`product_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `room_rates`
--
ALTER TABLE `room_rates`
  ADD CONSTRAINT `fk_room_rates_season1` FOREIGN KEY (`season_id`) REFERENCES `seasons` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_room_rate_room` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `seasons`
--
ALTER TABLE `seasons`
  ADD CONSTRAINT `fk_seasons_2` FOREIGN KEY (`parent_id`) REFERENCES `seasons` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
