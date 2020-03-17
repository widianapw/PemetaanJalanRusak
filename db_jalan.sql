/*
SQLyog Enterprise v12.5.1 (64 bit)
MySQL - 10.4.11-MariaDB : Database - db_pemetaan_jalan_rusak
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `tb_broken_road` */

DROP TABLE IF EXISTS `tb_broken_road`;

CREATE TABLE `tb_broken_road` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `status` enum('0','1','2') DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `tb_broken_road_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_broken_road` */

insert  into `tb_broken_road`(`id`,`id_user`,`address`,`picture`,`status`,`description`,`created_at`,`updated_at`) values 
(13,1,'Jalan Tukad Musi VI, Denpasar Selatan, Dauh Puri Klod, Kec. Denpasar Bar., Kota Denpasar, Bali 80234','1TukadMusiVI.jpg','0','jalannya banyak lubangnya','2020-03-17 02:42:54','0000-00-00 00:00:00'),
(14,1,'Jl. Tukad Musi IV, Panjer, Kec. Denpasar Sel., Kota Denpasar, Bali 80234','2TukadMusiIV.jpg','0','jalannya banyak lubangnya','2020-03-17 02:42:54','0000-00-00 00:00:00'),
(15,1,'Jl. Tukad Musi V, Panjer, Kec. Denpasar Sel., Kota Denpasar, Bali 80234','3TukadMusiV.jpg','0','jalannya banyak lubangnya','2020-03-17 02:42:54','0000-00-00 00:00:00'),
(16,1,'Jl. Tukad Batanghari II, Panjer, Kec. Denpasar Sel., Kota Denpasar, Bali 80234','4TukadBatanghariII.jpg','0','jalannya banyak lubangnya','2020-03-17 02:42:54','0000-00-00 00:00:00'),
(17,1,'Jl. Tukad Batanghari VI, Panjer, Kec. Denpasar Sel., Kota Denpasar, Bali 80234','5TukadBatanghariII.jpg','0','jalannya banyak lubangnya','2020-03-17 02:42:54','0000-00-00 00:00:00'),
(18,1,'Jl. Tukad Batang Hari Gg. XVII, Panjer, Kec. Denpasar Sel., Kota Denpasar, Bali 80225','6TukadBatanghariGgXVII.jpg','0','jalannya banyak lubangnya','2020-03-17 02:42:54','0000-00-00 00:00:00'),
(19,1,'Jl. Tukad Pancoran II, Panjer, Kec. Denpasar Sel., Kota Denpasar, Bali 80225','7TukadPancoranII.jpg','0','jalannya banyak lubangnya','2020-03-17 02:42:54','0000-00-00 00:00:00'),
(20,1,'Jl. Tukad Banyu Poh, Panjer, Kec. Denpasar Sel., Kota Denpasar, Bali 80113','8TukadBanyuPoh.jpg','0','jalannya banyak lubangnya','2020-03-17 02:42:54','0000-00-00 00:00:00'),
(21,1,'Jl. Paku Sari, Sesetan, Kec. Denpasar Sel., Kota Denpasar, Bali 80225','9PakuSari.jpg','0','jalannya banyak lubangnya','2020-03-17 02:42:54','0000-00-00 00:00:00'),
(22,1,'Jl. Pendidikan I, Sidakarya, Kec. Denpasar Sel., Kota Denpasar, Bali','10PendidikanI.jpg','0','jalannya banyak lubangnya','2020-03-17 02:42:54','0000-00-00 00:00:00'),
(23,1,'Jl. Kerta Dalem Sari IV No.1, Sidakarya, Kec. Denpasar Sel., Kota Denpasar, Bali','11KertaDalemSariIV.jpg','0','jalannya banyak lubangnya','2020-03-17 02:42:54','0000-00-00 00:00:00'),
(24,1,'Jl. Tukad Badung XX, Renon, Kec. Denpasar Sel., Kota Denpasar, Bali 80226','12TukadBadungXX.jpg','0','jalannya banyak lubangnya','2020-03-17 02:42:54','0000-00-00 00:00:00'),
(25,1,'Jl. Tukad Badung XX E 3-25, Sidakarya, Kec. Denpasar Sel., Kota Denpasar, Bali 80224','13TukadBadungXXE.jpg','0','jalannya banyak lubangnya','2020-03-17 02:42:54','0000-00-00 00:00:00'),
(26,1,'Walet No.1, Panjer, Kec. Denpasar Sel., Kota Denpasar, Bali 80224','14Walet.jpg','0','jalannya banyak lubangnya','2020-03-17 02:42:54','0000-00-00 00:00:00'),
(27,1,'Jl. Tukad Petanu Gg. IV, Panjer, Kec. Denpasar Sel., Kota Denpasar, Bali 80225','15TukadPetanuGgIV.jpg','0','jalannya banyak lubangnya','2020-03-17 02:42:54','0000-00-00 00:00:00'),
(28,1,'Jl. Tukad Pancoran Gg. XII 2, Panjer, Kec. Denpasar Sel., Kota Denpasar, Bali 80225','16TukadPancoran.jpg','0','jalannya banyak lubangnya','2020-03-17 02:42:54','0000-00-00 00:00:00'),
(29,1,'Jl. Tukad Gangga I No.1 Dangin Puri Klod Kec. Denpasar Tim. Kota Denpasar Bali 80234','17TukadGangga.jpg','0','jalannya banyak lubangnya','2020-03-17 02:42:54','0000-00-00 00:00:00'),
(30,1,'Jl. Tukad Jinah Panjer Kec. Denpasar Selatan. Kota Denpasar Bali 80234','18TukadJinah.jpg','0','jalannya banyak lubangnya','2020-03-17 02:42:54','0000-00-00 00:00:00'),
(31,2,'Jl. Dewi Madri X 3, Sumerta Kelod, Kec. Denpasar Tim., Kota Denpasar, Bali 80239\r\n','19DewiMadri.jpg','0','jalannya banyak lubangnya','2020-03-17 02:42:54','0000-00-00 00:00:00'),
(32,2,'Jl. Terompong No. 27, Sumerta Kelod, Denpasar Timur, Panjer, Kec. Denpasar Sel., Kota Denpasar, 80239\r\n','20Terompong.jpg','0','jalannya banyak lubangnya','2020-03-17 02:42:54','0000-00-00 00:00:00'),
(33,2,' Jl. Tukad Mas No. 13d Dangin Puri Klod Kec. Denpasar Tim. Kota Denpasar Bali 80234\r\n','21TukadMas.jpg','2','jalannya banyak lubangnya','2020-03-17 02:42:54','2020-03-16 18:04:54'),
(34,1,'Jl. Nuansa Udayana Bar. Jimbaran, Kec. Kuta Sel., Kabupaten Badung,Bali 80361 ','22nuansabarat.jpg','0','jalannya banyak lubangnya','2020-03-17 02:42:54','0000-00-00 00:00:00'),
(35,1,'Jl. Nuansa Barat IV , Jimbaran, Kuta, Jimbaran, Kec. Kuta Sel., Kabupaten Badung, Bali 80361','23nuansabarativ.jpg','0','jalannya banyak lubangnya','2020-03-17 02:42:54','0000-00-00 00:00:00'),
(36,1,'Jl. Nuansa Utama XXXII No.19\r\n, Jimbaran, Kec. Kuta Sel., Kabupaten Badung,Bali 80361 ','24nuansautamaxxxii.jpg','0','jalannya banyak lubangnya','2020-03-17 02:42:54','0000-00-00 00:00:00'),
(37,1,'Jl. Nuansa Utama Selatan II\r\n, Jimbaran, Kec. Kuta Sel. Kabupaten Badung,Bali 80361 ','25nuansautamaselatanii.jpg','0','jalannya banyak lubangnya','2020-03-17 02:42:54','0000-00-00 00:00:00'),
(38,1,'Jl. Nuansa Utama Selatan VII, Jimbaran, Kec. Kuta Sel. Kabupaten Badung,Bali 80361','26nuansautamaselatanvii.jpg','0','jalannya banyak lubangnya','2020-03-17 02:42:54','0000-00-00 00:00:00'),
(39,1,'Jl. Nuansa Utama VII, Jimbaran, Kec. Kuta Sel. Kabupaten Badung,Bali 80361','27nuansautamaxii.jpg','0','jalannya banyak lubangnya','2020-03-17 02:42:54','0000-00-00 00:00:00'),
(40,1,'Jl. Nuansa Utama Selatan XXIII, Jimbaran, Kec. Kuta Sel. Kabupaten Badung,Bali 80361','28nuansautamaselatanxxiii.jpg','0','jalannya banyak lubangnya','2020-03-17 02:42:54','0000-00-00 00:00:00'),
(41,1,'Jl. Nuansa Utama Selatan XVII, Jimbaran, Kec. Kuta Sel. Kabupaten Badung,Bali 80361','29nuansautamaselatanxvii.jpg','0','jalannya banyak lubangnya','2020-03-17 02:42:54','0000-00-00 00:00:00'),
(42,1,'Jl. Nuansa Utama Selatan XI, Jimbaran, Kec. Kuta Sel. Kabupaten Badung,Bali 80361','30nuansautamaselatanxi.jpg','0','jalannya banyak lubangnya','2020-03-17 02:42:54','0000-00-00 00:00:00'),
(43,1,'Jl. Nuansa Utama XIX, Jimbaran, Kec. Kuta Sel. Kabupaten Badung,Bali 80361','31nuansautamaxix.jpg','0','jalannya banyak lubangnya','2020-03-17 02:42:54','0000-00-00 00:00:00');

/*Table structure for table `tb_detail_coordinate` */

DROP TABLE IF EXISTS `tb_detail_coordinate`;

CREATE TABLE `tb_detail_coordinate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_road` int(11) DEFAULT NULL,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `id_road` (`id_road`),
  CONSTRAINT `tb_detail_coordinate_ibfk_1` FOREIGN KEY (`id_road`) REFERENCES `tb_broken_road` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_detail_coordinate` */

insert  into `tb_detail_coordinate`(`id`,`id_road`,`latitude`,`longitude`,`created_at`,`updated_at`) values 
(13,13,-8.676927,115.229648,'2020-03-16 23:31:03','0000-00-00 00:00:00'),
(14,14,-8.676935,115.22871,'2020-03-16 23:31:28','0000-00-00 00:00:00'),
(15,14,-8.676948,115.228803,'2020-03-16 23:32:48','0000-00-00 00:00:00'),
(16,15,-8.676467,115.228917,'2020-03-17 00:52:28','0000-00-00 00:00:00'),
(17,16,-8.678407,115.229223,'2020-03-17 00:52:40','0000-00-00 00:00:00'),
(18,17,-8.680123,115.230248,'2020-03-17 00:53:14','0000-00-00 00:00:00'),
(19,18,-8.687967,115.230457,'2020-03-17 00:53:28','0000-00-00 00:00:00'),
(20,18,-8.688074,115.230979,'2020-03-17 00:53:40','0000-00-00 00:00:00'),
(21,19,-8.687888,115.229844,'2020-03-17 00:53:52','0000-00-00 00:00:00'),
(22,19,-8.688415,115.229868,'2020-03-17 00:54:06','0000-00-00 00:00:00'),
(23,20,-8.680704,115.219726,'2020-03-17 00:54:14','0000-00-00 00:00:00'),
(24,21,-8.690072,115.220214,'2020-03-17 00:55:15','0000-00-00 00:00:00'),
(25,22,-8.70254,115.228713,'2020-03-17 00:56:18','0000-00-00 00:00:00'),
(26,23,-8.697879,115.233623,'2020-03-17 00:56:33','0000-00-00 00:00:00'),
(27,24,-8.693554,115.236654,'2020-03-17 00:57:39','0000-00-00 00:00:00'),
(28,25,-8.694416,115.236022,'2020-03-17 00:57:41','0000-00-00 00:00:00'),
(29,26,-8.694067,115.232593,'2020-03-17 00:58:03','0000-00-00 00:00:00'),
(30,27,-8.693946,115.229441,'2020-03-17 00:58:17','0000-00-00 00:00:00'),
(31,28,-8.692924,115.229607,'2020-03-17 00:58:34','0000-00-00 00:00:00'),
(32,28,-8.692969,115.229864,'2020-03-17 00:58:48','0000-00-00 00:00:00'),
(33,30,-8.675248,115.22513,'2020-03-17 00:59:42','0000-00-00 00:00:00'),
(34,31,-8.663654,115.238495,'2020-03-17 01:00:17','0000-00-00 00:00:00'),
(35,32,-8.659429,115.241832,'2020-03-17 01:00:19','0000-00-00 00:00:00'),
(36,33,-8.67356,115.225325,'2020-03-17 01:00:35','0000-00-00 00:00:00'),
(37,34,-8.797316,115.182045,'2020-03-17 02:10:24','0000-00-00 00:00:00'),
(38,35,-8.800203,115.183203,'2020-03-17 02:11:19','0000-00-00 00:00:00'),
(39,36,-8.800822,115.184517,'2020-03-17 02:12:10','0000-00-00 00:00:00'),
(40,37,-8.801511,115.184445,'2020-03-17 02:21:35','0000-00-00 00:00:00'),
(41,38,-8.801967,115.185049,'2020-03-17 02:14:40','0000-00-00 00:00:00'),
(42,39,-8.798267,115.187201,'2020-03-17 02:17:58','0000-00-00 00:00:00'),
(43,40,-8.803948,115.184881,'2020-03-17 02:18:41','0000-00-00 00:00:00'),
(44,41,-8.80335,115.185249,'2020-03-17 02:19:26','0000-00-00 00:00:00'),
(45,42,-8.802691,115.185606,'2020-03-17 02:20:22','0000-00-00 00:00:00'),
(46,43,-8.80025,115.186611,'2020-03-17 02:21:03','0000-00-00 00:00:00');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `user_role` enum('admin','user') DEFAULT NULL,
  `status` enum('0','1') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`username`,`email`,`password`,`user_role`,`status`,`created_at`,`updated_at`) values 
(1,'widiana',NULL,'widiana@me.com','$2y$10$Av.ql.Wj7g9AaMfQMb551.Q155VZvxr99VNujxHxE6DXJpYt78A1S','admin','0','2020-03-16 15:26:36','2020-03-16 06:42:34'),
(2,'user',NULL,'user@me.com','$2y$10$55dEpf3iNgbgYkYYp3nz2utEr1dHAMp/dvqKRKoT10Mqno3s/6cGS','user','0','2020-03-16 07:40:12','2020-03-16 07:40:12');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
