/*
SQLyog Professional v12.5.1 (64 bit)
MySQL - 10.1.38-MariaDB : Database - perpus
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`perpus` /*!40100 DEFAULT CHARACTER SET latin1 */;

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
  `isdeleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_buku`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_buku` */

/*Table structure for table `tbl_kategori` */

DROP TABLE IF EXISTS `tbl_kategori`;

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(3) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(30) NOT NULL,
  `isdeleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_kategori` */

/*Table structure for table `tbl_member` */

DROP TABLE IF EXISTS `tbl_member`;

CREATE TABLE `tbl_member` (
  `id_member` varchar(30) NOT NULL,
  `nama_member` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_member`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_member` */

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
  `id_role` int(3) NOT NULL,
  `password` varchar(100) NOT NULL,
  `isdeleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_user` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
