/*
SQLyog Professional v12.5.1 (64 bit)
MySQL - 10.4.11-MariaDB : Database - dbperpus
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`dbperpus` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `dbperpus`;

/*Table structure for table `tbl_buku` */

DROP TABLE IF EXISTS `tbl_buku`;

CREATE TABLE `tbl_buku` (
  `id_buku` int(11) NOT NULL AUTO_INCREMENT,
  `judul_buku` varchar(100) NOT NULL,
  `tahun_terbit` int(4) NOT NULL,
  `penerbit` varchar(30) NOT NULL,
  `penulis` varchar(30) NOT NULL,
  `id_kategori` int(3) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `isdeleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_buku`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_buku` */

insert  into `tbl_buku`(`id_buku`,`judul_buku`,`tahun_terbit`,`penerbit`,`penulis`,`id_kategori`,`jumlah`,`isdeleted`) values 
(1,'Pintar Matematika',2015,'Erlangga','Jarno',1,3,0),
(2,'Hidup Sehat Sejati',2020,'Erlangga','Jino',1,0,1),
(3,'Kisah 1002',2020,'Bentang Pustaka','Andrea Hirata',2,0,1),
(4,'Kisah 1002',2020,'Bentang Pustaka','Andrea Hirata',2,0,1),
(5,'Kisah 1004',2020,'Bentang Pustaka','Andrea Hirata',2,0,1),
(6,'Ayah',2015,'Bentang Pustaka','Andrea Hirata',2,0,1),
(7,'Habis Gelap Terbitlah Terang',1997,'Gramedia','Anom',1,5,0),
(8,'Peraih Mimpi',2000,'Bentang Pustaka','Tere Liye',2,0,1),
(9,'Ayat Cinta',2000,'Gramedia','Arman',2,1,0),
(10,'Buku Matematika',2020,'Erlangga','Arya',1,2,0),
(12,'Hidup Sehat',2020,'Bentang Pustaka','Anom',1,0,1);

/*Table structure for table `tbl_kategori` */

DROP TABLE IF EXISTS `tbl_kategori`;

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(3) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(30) NOT NULL,
  `isdeleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_kategori` */

insert  into `tbl_kategori`(`id_kategori`,`nama_kategori`,`isdeleted`) values 
(1,'Buku Pelajaran',0),
(2,'Novel',0),
(3,'Komik',0);

/*Table structure for table `tbl_member` */

DROP TABLE IF EXISTS `tbl_member`;

CREATE TABLE `tbl_member` (
  `id_member` varchar(30) NOT NULL,
  `nama_member` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_member`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_member` */

insert  into `tbl_member`(`id_member`,`nama_member`,`alamat`,`email`,`no_telp`,`created`) values 
('M-2010001','Dharma','Jrakah 02/04','dharma.bekti16696@gmail.com','2129019201','2020-11-15 19:57:39'),
('M-2010002','Anom','Janti','dharma.bekti166@gmail.com','21291029','2020-11-15 20:08:01');

/*Table structure for table `tbl_peminjaman` */

DROP TABLE IF EXISTS `tbl_peminjaman`;

CREATE TABLE `tbl_peminjaman` (
  `id_peminjaman` varchar(30) NOT NULL,
  `id_member` varchar(30) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `tgl_pinjam` datetime NOT NULL,
  `tgl_kembali` datetime DEFAULT NULL,
  `status_pinjam` varchar(15) NOT NULL COMMENT 'Pinjam, Kembali',
  PRIMARY KEY (`id_peminjaman`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_peminjaman` */

/*Table structure for table `tbl_role` */

DROP TABLE IF EXISTS `tbl_role`;

CREATE TABLE `tbl_role` (
  `id_role` int(3) NOT NULL AUTO_INCREMENT,
  `nama_role` varchar(30) NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_role` */

insert  into `tbl_role`(`id_role`,`nama_role`) values 
(1,'Manajer'),
(2,'Pustakawan');

/*Table structure for table `tbl_user` */

DROP TABLE IF EXISTS `tbl_user`;

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama_user` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `id_role` int(3) NOT NULL,
  `password` varchar(255) NOT NULL,
  `isdeleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_user` */

insert  into `tbl_user`(`id_user`,`nama_user`,`username`,`id_role`,`password`,`isdeleted`) values 
(1,'Manager','manager',1,'b456f30873e3fbbe70dbb2e6775843d90eb5a8fb471b1b42698de889783a4d10b95f1f8114e31f970d9b71439e5ff0d281a131f0a4d061e7a81b4c69f279325f',0),
(2,'Pustakawan','pustakawan',2,'b456f30873e3fbbe70dbb2e6775843d90eb5a8fb471b1b42698de889783a4d10b95f1f8114e31f970d9b71439e5ff0d281a131f0a4d061e7a81b4c69f279325f',0),
(3,'Bekti','bekti',1,'b456f30873e3fbbe70dbb2e6775843d90eb5a8fb471b1b42698de889783a4d10b95f1f8114e31f970d9b71439e5ff0d281a131f0a4d061e7a81b4c69f279325f',0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
