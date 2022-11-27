/*
SQLyog Community v13.0.0 (64 bit)
MySQL - 10.1.10-MariaDB : Database - machine
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`machine` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `machine`;

/*Table structure for table `akun` */

DROP TABLE IF EXISTS `akun`;

CREATE TABLE `akun` (
  `username` varchar(10) NOT NULL,
  `pass` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `nohp` varchar(20) NOT NULL,
  `status` enum('aktif','tidak') NOT NULL,
  `admin` enum('0','1') NOT NULL,
  `jmlh_pinjam` int(11) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `akun` */

insert  into `akun`(`username`,`pass`,`nama`,`alamat`,`nohp`,`status`,`admin`,`jmlh_pinjam`) values 
('admin','admin','Aministrator','Server','14045','aktif','1',0),
('nanda','nanda','Nanda Mahendra','Dewata','08123','aktif','0',1),
('reg','reg','Register','Wakanda 4 Evah','112','aktif','0',1);

/*Table structure for table `buku` */

DROP TABLE IF EXISTS `buku`;

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `pengarang` varchar(50) NOT NULL,
  `jenis` enum('fiksi','nonfiksi') NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `buku` */

insert  into `buku`(`id`,`judul`,`pengarang`,`jenis`,`stok`) values 
(5,'Pengabdi Netijen','Geraldy Tan','fiksi',25),
(7,'Si Kumal ','Dipa Utomo','nonfiksi',42),
(10,'Fenomena Kematian','Ninik Yap','fiksi',18),
(12,'Perjalanan Dinas','Yusran Lapananda','nonfiksi',20),
(13,'Wonderful You','SOBATMUSLIMAH','fiksi',12),
(14,'LISTEN LIKE A DOG','Jeff Lazarus','nonfiksi',20),
(15,'Super Mom With Happy','TRI SUMARNI','fiksi',23),
(16,'Hidup di Atas Patahan','Jimpe Rachman','nonfiksi',12),
(18,'Rentang Kisah','Gita Savitri DEvi','nonfiksi',13),
(19,'AGPH (Agen Patah Hati)','YUUKAGEM','nonfiksi',28),
(20,'INDIGO','Roy Kiyoshi','fiksi',28),
(25,'Tuhan Tidak Perlu Dibela','Abdurrahman Wahid','nonfiksi',49),
(27,'Ardhan','Valencia Anggana','fiksi',31),
(28,'Bukan Cinderella','	Dheti Azmi','fiksi',33),
(29,'Brondong','GRACE_YUI','fiksi',35),
(30,'Max Havelaar (2018)','Max Havelaar','fiksi',13),
(31,'Dimsum Martabak','Matchamallow','fiksi',22),
(37,'Kebijakan Publik (e3) ','Prof. Said Zainal','nonfiksi',0),
(39,'Arpeggio of Blue Steel','Ark Perfomance','nonfiksi',29),
(42,'RETURN','Stan Muelen','nonfiksi',31),
(43,'Heart of Leadership','Mark Miller','nonfiksi',5),
(44,'Lupakan Mantanmu!','O.Solihin','nonfiksi',31),
(45,'SELF DISRUPTION','Rhenald Kasali','nonfiksi',23),
(48,'Sea You Soon','HAPPY ROSE','fiksi',13),
(50,'Elegi Renjana','Stefani Bella','fiksi',23);

/*Table structure for table `keranjang` */

DROP TABLE IF EXISTS `keranjang`;

CREATE TABLE `keranjang` (
  `id` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `keranjang` */

insert  into `keranjang`(`id`,`username`) values 
('10',''),
('44',''),
('25',''),
('19','');

/*Table structure for table `pinjam` */

DROP TABLE IF EXISTS `pinjam`;

CREATE TABLE `pinjam` (
  `id_pinjam` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL,
  `peminjam` varchar(20) NOT NULL,
  `tglpinjam` date NOT NULL,
  `tglkembali` date NOT NULL,
  `status` enum('kembali','pinjam') NOT NULL,
  `denda` int(11) NOT NULL,
  PRIMARY KEY (`id_pinjam`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `pinjam` */

insert  into `pinjam`(`id_pinjam`,`id`,`peminjam`,`tglpinjam`,`tglkembali`,`status`,`denda`) values 
(1,5,'nanda','2018-07-01','2018-07-08','kembali',1000),
(2,14,'nanda','2018-07-01','2018-07-08','kembali',0),
(3,5,'nanda','2018-07-01','2018-07-08','pinjam',0),
(4,0,'','2018-07-01','2018-07-08','pinjam',0),
(5,5,'','2018-07-01','2018-07-08','pinjam',0),
(6,20,'reg','2018-07-03','2018-07-10','pinjam',0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
