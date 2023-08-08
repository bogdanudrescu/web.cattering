-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.1.34-community


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema cattering
--

CREATE DATABASE IF NOT EXISTS cattering;
USE cattering;

--
-- Definition of table `meals`
--

DROP TABLE IF EXISTS `meals`;
CREATE TABLE `meals` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(500) NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meals`
--

/*!40000 ALTER TABLE `meals` DISABLE KEYS */;
INSERT INTO `meals` (`id`,`name`,`price`) VALUES 
 (4,'Meniul zilei',12),
 (5,'Pizza Focacia (ulei masline, oregano)',5),
 (6,'Pizza Margherita (sos rosii, mozzarella)',11),
 (7,'Pizza Funghi (sos rosii, mozzarella, ciuperci)',12),
 (8,'Pizza Salami (sos rosii, mozzarella, salam)',14),
 (9,'Pizza Diavolo (sos rosii, mozzarella, salam, ardei iute)',15),
 (10,'Pizza Prosciutto (sos rosii, mozzarella, sunca presata)',14),
 (11,'Pizza Prosciutto Funghi (sos rosii, mozzarella, sunca presata, ciuperci)',15),
 (12,'Pizza Tono (sos rosii, mozzarella, ton)',14),
 (13,'Pizza Tono Cipola (sos rosii, mozzarella, ton, ceapa)',15),
 (14,'Pizza Vegetariana (sos rosii, mozzarella, ciuperci, ardei gras, ceapa, rosii)',14),
 (15,'Pizza Rustica (sos rosii, mozzarella, bacon, ciuperci, ceapa, ardei gras, ou)',16),
 (16,'Pizza Capriciosa (sos rosii, mozzarella, sunca presata, ciuperci, salam)',16),
 (17,'Pizza Calzone (sos rosii, mozzarella, sunca presata, ciuperci, salam) impaturita',16),
 (18,'Pizza Quatro Stagioni (sos rosii, mozzarella, sunca presata, ciuperci, salam, ton)',16),
 (19,'Sos pizza dulce',1);
INSERT INTO `meals` (`id`,`name`,`price`) VALUES 
 (20,'Sos pizza picant',1),
 (21,'Ulei picant',1),
 (22,'Salata de varza',6),
 (23,'Salata cu ton (salata verde, castraveti, ceapa, ton, ou, masline)',12),
 (24,'Gogosari si castraveti murati',6),
 (25,'Salata taraneasca (rosii, castraveti, ceapa, branza)',6),
 (26,'Salata Antik (rosii, castraveti, ceapa, ou, sunca presata, sos remulade, branza)',12),
 (27,'Salata greceasca (rosii, castraveti, ceapa, ardei gras, branza feta, masline, oregano)',11),
 (28,'Salata ardei copti',7),
 (29,'EXTRA OFERTA',0),
 (30,'Piept de pui la gratar  + cartofi prajiti',8),
 (31,'Snitel Antik (piept de pui , sunca presata, cascaval) + cartofi prajiti',8),
 (32,'Snitel Milanez (piept pui, ou, faina) + cartofi prajiti',7.5),
 (33,'Snitel Parizian (piept de pui, ou, pesmet) +cartofi prajiti',7.5),
 (34,'Snitel Taranesc (piept de pui, ou, fulgi de porumb) +cartofi prajiti ',8),
 (35,'Aripi de pui +cartofi prajiti',7),
 (36,'Aripi de pui Antik + cartofi prajiti',8),
 (37,'Piept de pui crocant + cartofi prajiti',7.5);
INSERT INTO `meals` (`id`,`name`,`price`) VALUES 
 (38,'Cotlet de porc la gratar + cartofi prajiti',10),
 (39,'Snitel Antik (cotlet de porc, sunca presata si cascaval) + cartofi prajiti',9),
 (40,'Snitel Milanez (cotlet de porc , ou, faina) + cartofi prajiti',8.5),
 (41,'Snitel Parizian (cotlet de porc, ou, pesmet) + cartofi prajiti',8.5),
 (42,'Piept de pui crocant + cartofi prajiti + CIORBA',10),
 (43,'Snitel Antik (piept de pui, sunca presata, cascaval) + cartofi prajiti + CIORBA',10),
 (44,'Snitel Milanez (piept pui, ou, faina) + cartofi prajiti + CIORBA',10),
 (45,'Snitel Parizian (piept de pui, ou, pesmet) +cartofi prajiti + CIORBA',10),
 (46,'Snitel Taranesc (piept de pui, ou, fulgi de porumb) +cartofi prajiti  + CIORBA',10),
 (47,'Aripi de pui +cartofi prajiti + CIORBA',10),
 (48,'Aripi de pui Antik + cartofi prajiti + CIORBA',10),
 (49,'Piept de pui crocant + cartofi prajiti + CIORBA',10),
 (50,'Cotlet de porc la gratar + cartofi prajiti + CIORBA',10),
 (51,'Snitel Antik (cotlet de porc, sunca presata si cascaval) + cartofi prajiti + CIORBA',10),
 (52,'Snitel Milanez (cotlet de porc , ou, faina) + cartofi prajiti + CIORBA',10);
INSERT INTO `meals` (`id`,`name`,`price`) VALUES 
 (53,'Snitel Parizian (cotlet de porc, ou, pesmet) + cartofi prajiti + CIORBA',10),
 (54,'GARNITURI',0),
 (55,'Cartofi prajiti 200g',5),
 (56,'Piure de cartofi 200g',5),
 (57,'Cartofi natur 200g',5),
 (58,'Legume mexicane 200g',5),
 (59,'Cartofi Antik 200g',6);
/*!40000 ALTER TABLE `meals` ENABLE KEYS */;


--
-- Definition of table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `meal_id` int(10) unsigned NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` (`id`,`user_id`,`meal_id`,`date`) VALUES 
 (40,7,4,'2010-03-22'),
 (44,1,14,'2010-02-01'),
 (46,1,56,'2010-02-02'),
 (47,1,28,'2010-02-02'),
 (48,1,27,'2010-02-03'),
 (49,1,14,'2010-02-04'),
 (50,1,23,'2010-02-05'),
 (51,6,38,'2010-02-01'),
 (52,6,30,'2010-02-02'),
 (54,7,17,'2010-02-05'),
 (55,7,16,'2010-02-01'),
 (56,6,26,'2010-02-03'),
 (58,6,27,'2010-02-04'),
 (59,7,43,'2010-02-04'),
 (60,7,4,'2010-02-02'),
 (61,6,50,'2010-02-05'),
 (62,7,4,'2010-02-03'),
 (63,9,31,'2010-02-01'),
 (64,9,15,'2010-02-02'),
 (65,9,18,'2010-02-03'),
 (66,8,4,'2010-02-02'),
 (68,8,4,'2010-02-01'),
 (69,8,15,'2010-02-05'),
 (70,8,27,'2010-02-04'),
 (71,8,14,'2010-02-03'),
 (73,2,4,'2010-02-02'),
 (74,2,4,'2010-02-04'),
 (79,2,15,'2010-02-01'),
 (80,2,43,'2010-02-03'),
 (81,2,18,'2010-02-05'),
 (87,3,16,'2010-02-01'),
 (88,3,4,'2010-02-02'),
 (89,3,26,'2010-02-03'),
 (90,3,16,'2010-02-04'),
 (91,3,4,'2010-02-05'),
 (95,5,4,'2010-02-02'),
 (96,5,31,'2010-02-01'),
 (97,5,15,'2010-02-03'),
 (98,5,4,'2010-02-04');
INSERT INTO `orders` (`id`,`user_id`,`meal_id`,`date`) VALUES 
 (99,5,15,'2010-02-05'),
 (100,4,23,'2010-02-01'),
 (101,4,4,'2010-02-02'),
 (103,4,4,'2010-02-04'),
 (104,4,4,'2010-02-05'),
 (105,4,36,'2010-02-03'),
 (106,11,26,'2010-02-01'),
 (107,11,4,'2010-02-02'),
 (108,11,15,'2010-02-03'),
 (109,11,4,'2010-02-04'),
 (110,11,27,'2010-02-05');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;


--
-- Definition of table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `type` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '0 - default user, 1 - admin',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`,`user`,`password`,`name`,`type`) VALUES 
 (1,'bogdan','bogdan','Bogdan Udrescu',1),
 (2,'nicu','nicu','Nicu Enescu',0),
 (3,'cosmin','cosmin','Cosmin Poteras',0),
 (4,'cristina','cristina','Cristina Stoian',1),
 (5,'delia','delia','Delia Botea',0),
 (6,'stefan','stefan','Stefan Udristoiu',0),
 (7,'vicentiu','vicentiu','Vicentiu Berneanu',0),
 (8,'costi','costi','Costi Bivolan',0),
 (9,'marius','marius','Marius Babuica',0),
 (10,'dan','dan','Dan Mancas',0),
 (11,'izabela','izabela','Izabela Mindak',0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
