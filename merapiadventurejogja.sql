/*
SQLyog Professional v12.09 (64 bit)
MySQL - 10.1.21-MariaDB : Database - merapiadventurejogja
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
  `letak_foto` int(1) NOT NULL,
  PRIMARY KEY (`id_photo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `m_photo` */

/*Table structure for table `m_promo` */

DROP TABLE IF EXISTS `m_promo`;

CREATE TABLE `m_promo` (
  `id_promo` int(11) NOT NULL AUTO_INCREMENT,
  `nama_promo` varchar(50) NOT NULL,
  `isi_promo` varchar(100) NOT NULL,
  `harga_promo` varchar(25) NOT NULL,
  `level_promo` int(1) NOT NULL,
  PRIMARY KEY (`id_promo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `m_promo` */

insert  into `m_promo`(`id_promo`,`nama_promo`,`isi_promo`,`harga_promo`,`level_promo`) values (1,'SHORT ROUTE',' Start basecamp/hotel\r\n Museum sisa hartaku\r\n Batu wajah/alien\r\n Bunker Kaliadem\r\n Pasir Panas\r\n Tre','350',0),(2,'MEDIUM ROUTE','dafdsf','450',0),(3,'LONG ROUTE','isi','550',0),(4,'SUNRISE ROUTE','satu, dua, tiga','400',1);

/*Table structure for table `m_users` */

DROP TABLE IF EXISTS `m_users`;

CREATE TABLE `m_users` (
  `id_user` bigint(50) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) DEFAULT NULL,
  `password` blob,
  `name` varchar(100) DEFAULT NULL,
  `level` varchar(20) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `m_users` */

insert  into `m_users`(`id_user`,`username`,`password`,`name`,`level`,`create_at`,`updated_at`) values (1,'user','ee11cbb19052e40b07aac0ca060c23ee','user','1','2017-11-12 03:30:50','0000-00-00 00:00:00'),(13,'admin','21232f297a57a5a743894a0e4a801fc3','admin','0','2017-11-01 10:26:47','0000-00-00 00:00:00');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
