/*
SQLyog Ultimate v12.4.3 (64 bit)
MySQL - 5.5.27 : Database - ta_leny
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`ta_leny` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `ta_leny`;

/*Table structure for table `absensi` */

DROP TABLE IF EXISTS `absensi`;

CREATE TABLE `absensi` (
  `nik` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `time` time DEFAULT NULL,
  `status` enum('IN','OUT') NOT NULL,
  `activity` varchar(50) DEFAULT NULL,
  `remarks` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`nik`,`date`,`status`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `absensi` */

insert  into `absensi`(`nik`,`date`,`time`,`status`,`activity`,`remarks`) values 
('2020','2020-08-19','08:00:00','IN','kerja lapangan','cek poin'),
('2020','2020-08-19','12:00:00','OUT','jalan','ok'),
('2020','2020-09-04','10:25:00','IN','masuk sore','projeck BCA'),
('2020','2020-09-04','10:25:33','OUT','aa','aa'),
('2020','2020-09-13','09:47:41','IN','test 1','test 2'),
('2021','2020-09-03','07:41:45','IN','main ML','Langsung ok'),
('2021','2020-09-03','07:42:00','OUT','siap','ok'),
('2021','2020-09-04','04:03:29','IN','Pendingan JOB','Harian'),
('admin','2020-09-02','05:42:33','OUT','main ML','Pulang kuy'),
('admin','2020-09-03','05:38:24','IN','aa','aa'),
('admin','2020-09-03','06:50:53','OUT','main ML','coba ya');

/*Table structure for table `client` */

DROP TABLE IF EXISTS `client`;

CREATE TABLE `client` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `npwp` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `client` */

insert  into `client`(`id`,`name`,`address`,`phone`,`npwp`) values 
(1,'CV. Maju Mundur','Jakarta','021-31264587','12.345.645.9-412.000'),
(2,'PT Maju Terus','Jakarta','021-31264588','12.345.645.9-412.001'),
(3,'PT Anugrah','Jakarta','021-31264589','12.345.645.9-412.002'),
(4,'PT Sejahtera','Jakarta','021-31264590','12.345.645.9-412.003'),
(5,'PT Raya Insan','Jakarta','021-31264591','12.345.645.9-412.004'),
(6,'Bank ABC','Jakarta','021-31264592','12.345.645.9-412.005'),
(7,'Bank BUO','Jakarta','021-31264593','12.345.645.9-412.006'),
(8,'Bank Kota','Jakarta','021-31264594','12.345.645.9-412.007'),
(9,'PT Satu Dua Tiga','Jakarta','021-31264595','12.345.645.9-412.008'),
(10,'PT Sehat Terus','Jakarta','021-31264596','12.345.645.9-412.009'),
(11,'PT Panjang Umur','Jakarta','021-31264597','12.345.645.9-412.010'),
(12,'PT Adi Karya','Jakarta','021-31264598','12.345.645.9-412.011'),
(13,'PT Lancar Jaya','Jakarta','021-31264599','12.345.645.9-412.012'),
(14,'PT Makmur Sentosa','Jakarta','021-31264600','12.345.645.9-412.013'),
(15,'PT. ayoo','Bogor','123456789','123-13-45-55552');

/*Table structure for table `karyawan` */

DROP TABLE IF EXISTS `karyawan`;

CREATE TABLE `karyawan` (
  `nik` varchar(10) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `id_client` varchar(5) NOT NULL,
  `position` varchar(30) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `birth_place` varchar(20) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `blood_type` varchar(2) DEFAULT NULL,
  `marital_status` varchar(10) DEFAULT NULL,
  `religion` varchar(10) DEFAULT NULL,
  `cityzenship` varchar(20) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `id_type` varchar(10) DEFAULT NULL,
  `id_number` varchar(50) DEFAULT NULL,
  `card_expired` varchar(20) DEFAULT NULL,
  `street` varchar(150) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `country` varchar(20) DEFAULT NULL,
  `state` varchar(20) DEFAULT NULL,
  `original_street` varchar(150) DEFAULT NULL,
  `original_city` varchar(20) DEFAULT NULL,
  `npwp` varchar(50) DEFAULT NULL,
  `ptkp_code` varchar(10) DEFAULT NULL,
  `ptkp_name` varchar(30) DEFAULT NULL,
  `name_of_bank` varchar(20) DEFAULT NULL,
  `bank_account` varchar(20) DEFAULT NULL,
  `salary` varchar(10) DEFAULT NULL,
  `allowance` varchar(20) DEFAULT NULL,
  `overtime_allowance` varchar(20) DEFAULT NULL,
  `education_level` varchar(5) DEFAULT NULL,
  `education_major` varchar(30) DEFAULT NULL,
  `institution_name` varchar(30) DEFAULT NULL,
  `graduation_year` year(4) DEFAULT NULL,
  `join_date` date DEFAULT NULL,
  `contract_of_period` int(5) DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `billing_rate` varchar(10) DEFAULT NULL,
  `employee_status` varchar(20) DEFAULT NULL,
  `inactived_date` date DEFAULT NULL,
  `inactive_reason` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`nik`,`id_client`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `karyawan` */

insert  into `karyawan`(`nik`,`name`,`id_client`,`position`,`birth_date`,`birth_place`,`gender`,`blood_type`,`marital_status`,`religion`,`cityzenship`,`phone`,`email`,`id_type`,`id_number`,`card_expired`,`street`,`city`,`country`,`state`,`original_street`,`original_city`,`npwp`,`ptkp_code`,`ptkp_name`,`name_of_bank`,`bank_account`,`salary`,`allowance`,`overtime_allowance`,`education_level`,`education_major`,`institution_name`,`graduation_year`,`join_date`,`contract_of_period`,`end_date`,`billing_rate`,`employee_status`,`inactived_date`,`inactive_reason`) values 
('2020','Wahyudi','1','IT Software Quality Assurance','2020-08-14','Bogor','Male','as','Married','Islam','Bogor','12332','khkhjk@gmail.com','11213','1233','Depok','Seumur Hidup','Jl. Salak 3 No. 75, ','Depok','Indonesia','Jawa Barat','Jl. Salak 3 No. 75, ','Depok','12.345.678','TK/0','TIDAK KAWIN, 0 ANAK','ABC','123456789','50000000','','','S1','TI',0000,'0000-00-00',1,'0000-00-00','31/3/2021','50000000','0000-00-00',''),
('2020001','Leny Andriani','1','IT Software Quality Assurance','0000-00-00','Jakarta','Female','B','Single','Islam','Indonesia','6,28789E+12','nonlenyandriani@gmail.com','KTP','3,27602E+14','Depok','Seumur Hidup','Jl. Salak 3 No. 75, ','Depok','Indonesia','Jawa Barat','Jl. Salak 3 No. 75, ','Depok','12.345.678','TK/0','TIDAK KAWIN, 0 ANAK','ABC','123456789','50000000','','','S1','TI',2000,'0000-00-00',1,'0000-00-00','31/3/2021','50000000','0000-00-00',''),
('2020002','Rida Sinta','2','IT Software Quality Assurance','0000-00-00','Jakarta','Female','O','Single','Islam','Indonesia','6,28789E+12','nonlenyandriani@gmail.com','KTP','3,27602E+14','Depok','Seumur Hidup','Jl. Salak 3 No. 76, ','Depok','Indonesia','Jawa Barat','Jl. Salak 3 No. 76, ','Depok','12.345.678','TK/0','TIDAK KAWIN, 0 ANAK','ABC','123456790','50000001','','','S1','TI',2000,'0000-00-00',1,'0000-00-00','31/3/2022','50000001','0000-00-00',''),
('2020003','Zaza Nur','3','IT Software Quality Assurance','0000-00-00','Jakarta','Female','A','Single','Islam','Indonesia','6,28789E+12','nonlenyandriani@gmail.com','KTP','3,27602E+14','Depok','Seumur Hidup','Jl. Salak 3 No. 77, ','Depok','Indonesia','Jawa Barat','Jl. Salak 3 No. 77, ','Depok','12.345.678','TK/0','TIDAK KAWIN, 0 ANAK','ABC','123456791','50000002','','','S1','TI',2000,'0000-00-00',1,'0000-00-00','31/3/2023','50000002','0000-00-00',''),
('2020004','Anissa','4','IT Software Quality Assurance','0000-00-00','Jakarta','Female','A','Single','Islam','Indonesia','6,28789E+12','nonlenyandriani@gmail.com','KTP','3,27602E+14','Depok','Seumur Hidup','Jl. Salak 3 No. 78, ','Depok','Indonesia','Jawa Barat','Jl. Salak 3 No. 78, ','Depok','12.345.678','TK/0','TIDAK KAWIN, 0 ANAK','ABC','123456792','50000003','','','S1','TI',2000,'0000-00-00',1,'0000-00-00','31/3/2024','50000003','0000-00-00',''),
('2020005','Dewi Utami','5','IT Software Quality Assurance','0000-00-00','Jakarta','Female','A','Single','Islam','Indonesia','6,28789E+12','nonlenyandriani@gmail.com','KTP','3,27602E+14','Depok','Seumur Hidup','Jl. Salak 3 No. 79, ','Depok','Indonesia','Jawa Barat','Jl. Salak 3 No. 79, ','Depok','12.345.678','TK/0','TIDAK KAWIN, 0 ANAK','ABC','123456793','50000004','','','S1','TI',2000,'0000-00-00',1,'0000-00-00','31/3/2025','50000004','0000-00-00',''),
('2020006','Aisyah Sholehah','6','IT Software Quality Assurance','0000-00-00','Bogor','Female','A','Single','Islam','Indonesia','6,28789E+12','nonlenyandriani@gmail.com','KTP','3,27602E+14','Depok','Seumur Hidup','Jl. Salak 3 No. 80, ','Depok','Indonesia','Jawa Barat','Jl. Salak 3 No. 80, ','Depok','12.345.678','TK/0','TIDAK KAWIN, 0 ANAK','ABC','123456794','50000005','','','S1','TI',2000,'0000-00-00',1,'0000-00-00','31/3/2026','50000005','0000-00-00',''),
('2020007','Dara Lestari','7','IT Software Quality Assurance','0000-00-00','Bandung','Female','A','Single','Islam','Indonesia','6,28789E+12','nonlenyandriani@gmail.com','KTP','3,27602E+14','Depok','Seumur Hidup','Jl. Salak 3 No. 81, ','Depok','Indonesia','Jawa Barat','Jl. Salak 3 No. 81, ','Depok','12.345.678','TK/0','TIDAK KAWIN, 0 ANAK','ABC','123456795','50000006','','','S1','TI',2000,'0000-00-00',1,'0000-00-00','31/3/2027','50000006','0000-00-00',''),
('2020008','Oki','8','IT Software Quality Assurance','0000-00-00','Medan','Male','A','Single','Islam','Indonesia','6,28789E+12','nonlenyandriani@gmail.com','KTP','3,27602E+14','Depok','Seumur Hidup','Jl. Salak 3 No. 82, ','Depok','Indonesia','Jawa Barat','Jl. Salak 3 No. 82, ','Depok','12.345.678','TK/0','TIDAK KAWIN, 0 ANAK','ABC','123456796','50000007','','','S1','TI',2000,'0000-00-00',1,'0000-00-00','31/3/2028','50000007','0000-00-00',''),
('2020009','Eko','9','IT Software Quality Assurance','0000-00-00','Jakarta','Male','B','Single','Islam','Indonesia','6,28789E+12','nonlenyandriani@gmail.com','KTP','3,27602E+14','Depok','Seumur Hidup','Jl. Salak 3 No. 83, ','Depok','Indonesia','Jawa Barat','Jl. Salak 3 No. 83, ','Depok','12.345.678','TK/0','TIDAK KAWIN, 0 ANAK','ABC','123456797','50000008','','','S1','TI',2000,'0000-00-00',1,'0000-00-00','31/3/2029','50000008','0000-00-00',''),
('2020010','oka','10','IT Software Quality Assurance','0000-00-00','Jakarta','Male','B','Single','Islam','Indonesia','6,28789E+12','nonlenyandriani@gmail.com','KTP','3,27602E+14','Depok','Seumur Hidup','Jl. Salak 3 No. 84, ','Depok','Indonesia','Jawa Barat','Jl. Salak 3 No. 84, ','Depok','12.345.678','TK/0','TIDAK KAWIN, 0 ANAK','ABC','123456798','50000009','','','S1','TI',2000,'0000-00-00',1,'0000-00-00','31/3/2030','50000009','0000-00-00',''),
('2020011','Dita','11','IT Software Quality Assurance','0000-00-00','Jakarta','Female','B','Single','Islam','Indonesia','6,28789E+12','nonlenyandriani@gmail.com','KTP','3,27602E+14','Depok','Seumur Hidup','Jl. Salak 3 No. 85, ','Depok','Indonesia','Jawa Barat','Jl. Salak 3 No. 85, ','Depok','12.345.678','TK/0','TIDAK KAWIN, 0 ANAK','ABC','123456799','50000010','','','S1','TI',2000,'0000-00-00',1,'0000-00-00','31/3/2031','50000010','0000-00-00',''),
('2020012','Dinda','12','IT Software Quality Assurance','0000-00-00','Jakarta','Female','B','Single','Islam','Indonesia','6,28789E+12','nonlenyandriani@gmail.com','KTP','3,27602E+14','Depok','Seumur Hidup','Jl. Salak 3 No. 86, ','Depok','Indonesia','Jawa Barat','Jl. Salak 3 No. 86, ','Depok','12.345.678','TK/0','TIDAK KAWIN, 0 ANAK','ABC','123456800','50000011','','','S1','TI',2000,'0000-00-00',1,'0000-00-00','31/3/2032','50000011','0000-00-00',''),
('2020013','Dini','13','IT Software Quality Assurance','0000-00-00','Jakarta','Female','B','Single','Islam','Indonesia','6,28789E+12','nonlenyandriani@gmail.com','KTP','3,27602E+14','Depok','Seumur Hidup','Jl. Salak 3 No. 87, ','Depok','Indonesia','Jawa Barat','Jl. Salak 3 No. 87, ','Depok','12.345.678','TK/0','TIDAK KAWIN, 0 ANAK','ABC','123456801','50000012','','','S1','TI',2000,'0000-00-00',1,'0000-00-00','31/3/2033','50000012','0000-00-00',''),
('2020014','Tika','14','IT Software Quality Assurance','0000-00-00','Jakarta','Female','B','Single','Islam','Indonesia','6,28789E+12','nonlenyandriani@gmail.com','KTP','3,27602E+14','Depok','Seumur Hidup','Jl. Salak 3 No. 88, ','Depok','Indonesia','Jawa Barat','Jl. Salak 3 No. 88, ','Depok','12.345.678','TK/0','TIDAK KAWIN, 0 ANAK','ABC','123456802','50000013','','','S1','TI',2000,'0000-00-00',1,'0000-00-00','31/3/2034','50000013','0000-00-00',''),
('2020015','Tiwi','15','IT Software Quality Assurance','0000-00-00','Jakarta','Female','B','Single','Islam','Indonesia','6,28789E+12','nonlenyandriani@gmail.com','KTP','3,27602E+14','Depok','Seumur Hidup','Jl. Salak 3 No. 89, ','Depok','Indonesia','Jawa Barat','Jl. Salak 3 No. 89, ','Depok','12.345.678','TK/0','TIDAK KAWIN, 0 ANAK','ABC','123456803','50000014','','','S1','TI',2000,'0000-00-00',1,'0000-00-00','31/3/2035','50000014','0000-00-00','');

/*Table structure for table `position` */

DROP TABLE IF EXISTS `position`;

CREATE TABLE `position` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `position` */

insert  into `position`(`id`,`name`) values 
(1,'IT Software Quality Assurance'),
(5,'GA');

/*Table structure for table `spl` */

DROP TABLE IF EXISTS `spl`;

CREATE TABLE `spl` (
  `nik` varchar(20) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `date` date NOT NULL,
  `clock_in` time DEFAULT NULL,
  `clock_out` time DEFAULT NULL,
  `total_hour` int(11) DEFAULT NULL,
  `convertion_hour` varchar(20) DEFAULT NULL,
  `activity` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`nik`,`date`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `spl` */

insert  into `spl`(`nik`,`name`,`date`,`clock_in`,`clock_out`,`total_hour`,`convertion_hour`,`activity`) values 
('2020','Wahyudi','2020-09-04','18:00:00','21:00:00',3,NULL,'aaa'),
('2020','Wahyudi','2020-09-13','08:00:00','17:00:00',0,NULL,'Tanggal Merah Hari raya'),
('admin','Leni','2020-09-01','17:00:00','22:00:00',4,NULL,'ngerjain Project'),
('admin','Leni','2020-09-03','16:00:00','20:00:00',5,NULL,'Rapihin berkas');

/*Table structure for table `user_login` */

DROP TABLE IF EXISTS `user_login`;

CREATE TABLE `user_login` (
  `username` varchar(20) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `role_id` int(1) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `user_login` */

insert  into `user_login`(`username`,`name`,`role_id`,`password`) values 
('2020','Wahyudi',0,'123'),
('2020003','aa',0,'123'),
('2020004','aa',0,'123'),
('2020005','aa',0,'123'),
('2020006','aa',0,'123'),
('2020007','aa',0,'123'),
('2020008','aa',0,'123'),
('2020009','aa',0,'123'),
('2020010','aa',0,'123'),
('2020011','aa',0,'123'),
('2020012','aa',0,'123'),
('2020013','aa',0,'123'),
('2020014','aa',0,'123'),
('2020015','aa',0,'123'),
('2021','Bayunk',1,'123'),
('admin','Leni',1,'admin');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
