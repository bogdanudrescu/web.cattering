-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.0.24a-community-nt


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
  `id` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(500) NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
 (21,'Ulei picant',1);
/*!40000 ALTER TABLE `meals` ENABLE KEYS */;


--
-- Definition of table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `user_id` int(10) unsigned NOT NULL,
  `meal_id` int(10) unsigned NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` (`id`,`user_id`,`meal_id`,`date`) VALUES 
 (15,1,14,'2010-01-18'),
 (16,1,21,'2010-01-18');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;


--
-- Definition of table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `user` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `type` int(10) unsigned NOT NULL default '0' COMMENT '0 - default user, 1 - admin',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
