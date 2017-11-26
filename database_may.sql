/*
SQLyog Ultimate v11.21 (64 bit)
MySQL - 5.6.31 : Database - merapiadventurejogja
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`merapiadventurejogja` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `merapiadventurejogja`;

/*Table structure for table `m_photo` */

DROP TABLE IF EXISTS `m_photo`;

CREATE TABLE `m_photo` (
  `id_photo` int(11) NOT NULL AUTO_INCREMENT,
  `nama_photo` varchar(50) NOT NULL,
  `desc_photo` varchar(500) NOT NULL,
  `file_photo` varchar(50) NOT NULL,
  `letak_photo` int(1) NOT NULL,
  PRIMARY KEY (`id_photo`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

/*Data for the table `m_photo` */

insert  into `m_photo`(`id_photo`,`nama_photo`,`desc_photo`,`file_photo`,`letak_photo`) values (16,'Merapi','Merapi Jogja','cc3304b2e13a65b52d1da1e3b7c324c4.jpeg',0),(19,'Merapi','Jogja','2e3da79d748cc6fd0b492b2af727ce49.jpg',1),(20,'Heru','fsdafdasf','8e97b6b36071e0052fc9beaab9ef8ae2.png',0);

/*Table structure for table `m_promo` */

DROP TABLE IF EXISTS `m_promo`;

CREATE TABLE `m_promo` (
  `id_promo` int(11) NOT NULL AUTO_INCREMENT,
  `nama_promo` varchar(50) NOT NULL,
  `isi_promo` varchar(500) NOT NULL,
  `harga_promo` varchar(25) NOT NULL,
  `level_promo` int(1) NOT NULL,
  PRIMARY KEY (`id_promo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `m_promo` */

insert  into `m_promo`(`id_promo`,`nama_promo`,`isi_promo`,`harga_promo`,`level_promo`) values (1,'SHORT ROUTE 1','Start basecamp/hotel,\r\nMini Museum,\r\nBatu wajah/alien,\r\nBunker Kaliadem,\r\nTrek basah Kalikuning \r\n( durasi 2 jam )','350',0),(2,'SHORT ROUTE 2','Start basecamp/hotel,\r\nMini Museum,\r\nBatu wajah/alien,\r\n Rumah Mbah Marijan,\r\nTrek basah Kalikuning \r\n( durasi 2 jam )','350',0),(3,'MEDIUM ROUTE','Start basecamp/hotel,\r\nMuseum sisa hartaku,\r\nBatu wajah/alien,\r\nBunker Kaliadem,\r\nPasir Panas,\r\nPetilasan Mbah Marijan,\r\nTrek basah Kalikuning \r\n( durasi 2 jam )','450',0),(4,'LONG ROUTE',' Start basecamp/hotel,\r\n Museum sisa hartaku,\r\n Makam Mbah Marijan,\r\n Batu wajah/alien,\r\n Bunker Kaliadem,\r\n Pasir Panas,\r\n Petilasan Mbah Marijan,\r\n Trek basah Kalikuning \r\n( durasi 3 jam )','650',0),(5,'SUNRISE ','Start dari basecamp/hotel,\r\n Coffe and Tea,\r\n Bunker Kaliadem,\r\n Pasir panas,\r\n Batu wajah/batu alien,\r\n Museum sisa hartaku,\r\n Trek basah Kalikuning \r\n( berangkat pukul 04.30 WIB)','400',1);

/*Table structure for table `m_users` */

DROP TABLE IF EXISTS `m_users`;

CREATE TABLE `m_users` (
  `id_user` bigint(50) NOT NULL,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `level` varchar(20) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `m_users` */

insert  into `m_users`(`id_user`,`username`,`password`,`name`,`level`,`create_at`,`updated_at`) values (0,'wal','2f70101cd97aa4896dd9732721ba8e38','wal','1','2017-11-15 06:24:30','0000-00-00 00:00:00');

/*Table structure for table `m_users_blob` */

DROP TABLE IF EXISTS `m_users_blob`;

CREATE TABLE `m_users_blob` (
  `id_user` bigint(50) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) DEFAULT NULL,
  `password` blob,
  `name` varchar(100) DEFAULT NULL,
  `level` varchar(20) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `m_users_blob` */

insert  into `m_users_blob`(`id_user`,`username`,`password`,`name`,`level`,`create_at`,`updated_at`) values (1,'merapi','ee11cbb19052e40b07aac0ca060c23ee','user','0','2017-11-21 13:18:48','0000-00-00 00:00:00'),(13,'rayzalzero','21232f297a57a5a743894a0e4a801fc3','admin','0','2017-11-21 13:18:23','0000-00-00 00:00:00');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
