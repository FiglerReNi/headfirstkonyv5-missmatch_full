/*
SQLyog Ultimate v12.4.3 (64 bit)
MySQL - 10.1.38-MariaDB : Database - mismatch
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`mismatch` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_hungarian_ci */;

USE `mismatch`;

/*Table structure for table `mismatch_category` */

DROP TABLE IF EXISTS `mismatch_category`;

CREATE TABLE `mismatch_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(50) COLLATE utf8_hungarian_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

/*Data for the table `mismatch_category` */

insert  into `mismatch_category`(`id`,`category`) values 
(1,'Appearance'),
(2,'Entertainment'),
(3,'Food'),
(4,'People'),
(5,'Activities');

/*Table structure for table `mismatch_response` */

DROP TABLE IF EXISTS `mismatch_response`;

CREATE TABLE `mismatch_response` (
  `response_id` int(20) NOT NULL AUTO_INCREMENT,
  `response` tinyint(1) NOT NULL,
  `user_id` int(20) DEFAULT NULL,
  `topic_id` int(20) DEFAULT NULL,
  PRIMARY KEY (`response_id`),
  KEY `user_id` (`user_id`),
  KEY `topic_id` (`topic_id`),
  CONSTRAINT `mismatch_response_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `mismatch_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `mismatch_response_ibfk_2` FOREIGN KEY (`topic_id`) REFERENCES `mismatch_topic` (`topic_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=226 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

/*Data for the table `mismatch_response` */

insert  into `mismatch_response`(`response_id`,`response`,`user_id`,`topic_id`) values 
(151,2,7,1),
(152,1,7,2),
(153,2,7,3),
(154,2,7,4),
(155,1,7,5),
(156,1,7,6),
(157,1,7,7),
(158,2,7,8),
(159,1,7,9),
(160,2,7,10),
(161,0,7,11),
(162,0,7,12),
(163,0,7,13),
(164,0,7,14),
(165,1,7,15),
(166,1,7,16),
(167,1,7,17),
(168,0,7,18),
(169,2,7,19),
(170,2,7,20),
(171,0,7,21),
(172,2,7,22),
(173,1,7,23),
(174,1,7,24),
(175,0,7,25),
(176,1,8,1),
(177,1,8,2),
(178,1,8,3),
(179,2,8,4),
(180,2,8,5),
(181,2,8,6),
(182,2,8,7),
(183,2,8,8),
(184,1,8,9),
(185,2,8,10),
(186,0,8,11),
(187,0,8,12),
(188,0,8,13),
(189,1,8,14),
(190,1,8,15),
(191,0,8,16),
(192,0,8,17),
(193,2,8,18),
(194,0,8,19),
(195,2,8,20),
(196,0,8,21),
(197,2,8,22),
(198,2,8,23),
(199,0,8,24),
(200,0,8,25),
(201,1,9,1),
(202,1,9,2),
(203,1,9,3),
(204,2,9,4),
(205,2,9,5),
(206,2,9,6),
(207,2,9,7),
(208,1,9,8),
(209,1,9,9),
(210,1,9,10),
(211,1,9,11),
(212,1,9,12),
(213,0,9,13),
(214,2,9,14),
(215,2,9,15),
(216,0,9,16),
(217,1,9,17),
(218,1,9,18),
(219,0,9,19),
(220,0,9,20),
(221,2,9,21),
(222,2,9,22),
(223,1,9,23),
(224,2,9,24),
(225,2,9,25);

/*Table structure for table `mismatch_topic` */

DROP TABLE IF EXISTS `mismatch_topic`;

CREATE TABLE `mismatch_topic` (
  `topic_id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`topic_id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `mismatch_topic_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `mismatch_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

/*Data for the table `mismatch_topic` */

insert  into `mismatch_topic`(`topic_id`,`name`,`category_id`) values 
(1,'Tattoos',1),
(2,'Gold chains',1),
(3,'Body piercings',1),
(4,'Cowboy boots',1),
(5,'Long hair',1),
(6,'Reality TV',2),
(7,'Professional wrestling',2),
(8,'Horror movies',2),
(9,'Easy listening music',2),
(10,'The opera',2),
(11,'Sushi',3),
(12,'Spam',3),
(13,'Spicy food',3),
(14,'Peanut butter & banana sandwiches',3),
(15,'Martinis',3),
(16,'Howard Stern',4),
(17,'Bill Gates',4),
(18,'Barbara Streisand',4),
(19,'Hugh Hefner',4),
(20,'Martha Stewart',4),
(21,'Yoga',5),
(22,'Weightlifting',5),
(23,'Cube puzzles',5),
(24,'Karaoke',5),
(25,'Hiking',5);

/*Table structure for table `mismatch_user` */

DROP TABLE IF EXISTS `mismatch_user`;

CREATE TABLE `mismatch_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) COLLATE utf8_hungarian_ci NOT NULL COMMENT 'teszt',
  `pass` varchar(40) COLLATE utf8_hungarian_ci NOT NULL,
  `join_date` datetime NOT NULL,
  `first_name` varchar(50) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `last_name` varchar(50) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `gender` varchar(10) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `city` varchar(50) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `state` varchar(2) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `picture` varchar(50) COLLATE utf8_hungarian_ci DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

/*Data for the table `mismatch_user` */

insert  into `mismatch_user`(`user_id`,`username`,`pass`,`join_date`,`first_name`,`last_name`,`gender`,`birthdate`,`city`,`state`,`picture`) values 
(7,'figlerr','8cb2237d0679ca88db6464eac60da96345513964','2019-05-12 16:28:59','Figler','Renáta','Female','1985-06-21','Budapest','HU','kep.jpg'),
(8,'teszt','8cb2237d0679ca88db6464eac60da96345513964','2019-05-12 17:34:54','Figler','Anikó','Female','1990-08-07','Budapest','HU','kepa.jpg'),
(9,'teszt1','8cb2237d0679ca88db6464eac60da96345513964','2019-05-18 13:07:19','Teszt','Reni','Female','0000-00-00','Budapest','HU','letoltes.jpg');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
