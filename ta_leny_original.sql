/*
SQLyog Ultimate v12.4.3 (64 bit)
MySQL - 10.4.10-MariaDB : Database - ta_leny
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
  `clock_in` time DEFAULT NULL,
  `clock_out` time DEFAULT NULL,
  `activity` varchar(100) DEFAULT NULL,
  `remarks` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`nik`,`date`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `absensi` */

insert  into `absensi`(`nik`,`date`,`clock_in`,`clock_out`,`activity`,`remarks`) values 
('2020','2020-12-09','21:52:20','21:53:08','add fitur bank','WFH'),
('2020','2020-12-10','15:45:48','15:46:07','Update data master bank','WFH'),
('2020','2020-12-11','23:58:43',NULL,NULL,NULL),
('2020','2020-12-19','22:43:44','22:43:56','testing','testing');

/*Table structure for table `absensi_old` */

DROP TABLE IF EXISTS `absensi_old`;

CREATE TABLE `absensi_old` (
  `nik` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `time` time DEFAULT NULL,
  `status` enum('IN','OUT') NOT NULL,
  `activity` varchar(50) DEFAULT NULL,
  `remarks` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`nik`,`date`,`status`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `absensi_old` */

insert  into `absensi_old`(`nik`,`date`,`time`,`status`,`activity`,`remarks`) values 
('2020','2020-08-19','08:00:00','IN','kerja lapangan','cek poin'),
('2020','2020-08-19','12:00:00','OUT','jalan','ok'),
('2020','2020-09-04','10:25:00','IN','masuk sore','projeck BCA'),
('2020','2020-09-04','10:25:33','OUT','aa','aa'),
('2020','2020-09-13','09:47:41','IN','test 1','test 2'),
('2020','2020-10-15','05:22:51','IN','test','test'),
('2020','2020-12-05','06:16:55','IN','work visit',''),
('2021','2020-09-03','07:41:45','IN','main ML','Langsung ok'),
('2021','2020-09-03','07:42:00','OUT','siap','ok'),
('2021','2020-09-04','04:03:29','IN','Pendingan JOB','Harian'),
('admin','2020-09-02','05:42:33','OUT','main ML','Pulang kuy'),
('admin','2020-09-03','05:38:24','IN','aa','aa'),
('admin','2020-09-03','06:50:53','OUT','main ML','coba ya');

/*Table structure for table `bank` */

DROP TABLE IF EXISTS `bank`;

CREATE TABLE `bank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `bank` */

insert  into `bank`(`id`,`name`) values 
(1,'Bank Rakyat Indonesia (BRI)'),
(2,'Bank Mandiri'),
(3,'Bank Central Asia (BCA)'),
(4,'Bank Negara Indonesia (BNI)'),
(5,'Bank Tabungan Negara (BTN)'),
(6,'Bank CIMB Niaga'),
(7,'Bank BTPN'),
(8,'Panin Bank'),
(9,'Bank OCBC NISP'),
(10,'Bank Maybank Indonesia');

/*Table structure for table `client` */

DROP TABLE IF EXISTS `client`;

CREATE TABLE `client` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `npwp` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

/*Data for the table `client` */

insert  into `client`(`id`,`name`,`address`,`phone`,`npwp`) values 
(1,'CV. Maju Mundur','Jakarta','021-31264587','12.345.645.9-412.000'),
(2,'PT Maju Terus','Jakarta','021-31264588','12.345.645.9-412.001'),
(3,'PT Anugrah','Jakarta','021-31264589','12.345.645.9-412.002'),
(4,'PT Sejahtera','Jakarta','021-31264590','12.345.645.9-412.003'),
(6,'Bank ABC','Jakarta','021-31264592','12.345.645.9-412.005'),
(7,'Bank BUO','Jakarta','021-31264593','12.345.645.9-412.006'),
(8,'Bank Kota','Jakarta','021-31264594','12.345.645.9-412.007'),
(9,'PT Satu Dua Tiga','Jakarta','021-31264595','12.345.645.9-412.008'),
(10,'PT Sehat Terus','Jakarta','021-31264596','12.345.645.9-412.009'),
(11,'PT Panjang Umur','Jakarta','021-31264597','12.345.645.9-412.010'),
(12,'PT Adi Karya','Jakarta','021-31264598','12.345.645.9-412.011'),
(13,'PT Lancar Jaya','Jakarta','021-31264599','12.345.645.9-412.012'),
(14,'PT Makmur Sentosa','Jakarta','021-31264600','12.345.645.9-412.013'),
(15,'PT. ayoo','Bogor','123456789','123-13-45-55552'),
(17,NULL,NULL,NULL,NULL);

/*Table structure for table `coba` */

DROP TABLE IF EXISTS `coba`;

CREATE TABLE `coba` (
  `nik` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `day` varchar(15) DEFAULT NULL,
  `clock_in` time DEFAULT NULL,
  `clock_out` time DEFAULT NULL,
  `remarks` varchar(50) DEFAULT NULL,
  `note` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `coba` */

insert  into `coba`(`nik`,`date`,`day`,`clock_in`,`clock_out`,`remarks`,`note`) values 
('2020','2020-12-01','Tuesday',NULL,NULL,NULL,NULL),
('2020','2020-12-02','Wednesday',NULL,NULL,NULL,NULL),
('2020','2020-12-03','Thursday',NULL,NULL,NULL,NULL),
('2020','2020-12-04','Friday',NULL,NULL,NULL,NULL),
('2020','2020-12-05','Saturday',NULL,NULL,NULL,NULL),
('2020','2020-12-06','Sunday',NULL,NULL,NULL,NULL),
('2020','2020-12-07','Monday',NULL,NULL,NULL,NULL),
('2020','2020-12-08','Tuesday',NULL,NULL,NULL,NULL),
('2020','2020-12-09','Wednesday',NULL,NULL,NULL,NULL),
('2020','2020-12-10','Thursday',NULL,NULL,NULL,NULL),
('2020','2020-12-11','Friday',NULL,NULL,NULL,NULL),
('2020','2020-12-12','Saturday',NULL,NULL,NULL,NULL),
('2020','2020-12-13','Sunday',NULL,NULL,NULL,NULL),
('2020','2020-12-14','Monday',NULL,NULL,NULL,NULL),
('2020','2020-12-15','Tuesday',NULL,NULL,NULL,NULL),
('2020','2020-12-16','Wednesday',NULL,NULL,NULL,NULL),
('2020','2020-12-17','Thursday',NULL,NULL,NULL,NULL),
('2020','2020-12-18','Friday',NULL,NULL,NULL,NULL),
('2020','2020-12-19','Saturday',NULL,NULL,NULL,NULL),
('2020','2020-12-20','Sunday',NULL,NULL,NULL,NULL),
('2020','2020-12-21','Monday',NULL,NULL,NULL,NULL),
('2020','2020-12-22','Tuesday',NULL,NULL,NULL,NULL),
('2020','2020-12-23','Wednesday',NULL,NULL,NULL,NULL),
('2020','2020-12-24','Thursday',NULL,NULL,NULL,NULL),
('2020','2020-12-25','Friday',NULL,NULL,NULL,NULL),
('2020','2020-12-26','Saturday',NULL,NULL,NULL,NULL),
('2020','2020-12-27','Sunday',NULL,NULL,NULL,NULL),
('2020','2020-12-28','Monday',NULL,NULL,NULL,NULL),
('2020','2020-12-29','Tuesday',NULL,NULL,NULL,NULL),
('2020','2020-12-30','Wednesday',NULL,NULL,NULL,NULL),
('2020','2020-12-31','Thursday',NULL,NULL,NULL,NULL);

/*Table structure for table `cuti` */

DROP TABLE IF EXISTS `cuti`;

CREATE TABLE `cuti` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nik` varchar(20) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `activity` varchar(100) DEFAULT NULL,
  `remarks` varchar(100) DEFAULT NULL,
  `status` enum('Approve','Pending','Cancel') DEFAULT NULL,
  `adddate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `cuti` */

insert  into `cuti`(`id`,`nik`,`date`,`activity`,`remarks`,`status`,`adddate`) values 
(1,'2020','2020-12-12','Cuti Tahunan','','Approve','2020-12-12 12:29:16'),
(2,'2020','2020-12-14','Cuti Tahunan','urusan keluarga','Cancel','2020-12-09 09:04:07'),
(3,'2020','2020-12-15','Cuti Tahunan','Urusan keluarga','Approve','2020-12-10 03:46:28'),
(4,'2020','2020-12-16','Cuti Tahunan','Urusan keluarga','Approve','2020-12-10 03:46:37'),
(5,'2020','2020-12-13','Cuti Tahunan','lagi males','Cancel','2020-12-16 09:48:02'),
(6,'2020','2020-12-22','Cuti Tahunan','a','Approve',NULL),
(7,'2020003','2020-12-16','Cuti Haid','testing','Approve',NULL);

/*Table structure for table `employee` */

DROP TABLE IF EXISTS `employee`;

CREATE TABLE `employee` (
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
  `allowance` varchar(20) DEFAULT NULL,
  `overtime_allowance` varchar(20) DEFAULT NULL,
  `education_level` varchar(5) DEFAULT NULL,
  `education_major` varchar(30) DEFAULT NULL,
  `institution_name` varchar(30) DEFAULT NULL,
  `graduation_year` year(4) DEFAULT NULL,
  `billing_rate` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`nik`,`id_client`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `employee` */

insert  into `employee`(`nik`,`name`,`id_client`,`position`,`birth_date`,`birth_place`,`gender`,`blood_type`,`marital_status`,`religion`,`cityzenship`,`phone`,`email`,`id_type`,`id_number`,`card_expired`,`street`,`city`,`country`,`state`,`original_street`,`original_city`,`npwp`,`ptkp_code`,`ptkp_name`,`allowance`,`overtime_allowance`,`education_level`,`education_major`,`institution_name`,`graduation_year`,`billing_rate`) values 
('2020','Wahyudi','1','IT Software Quality Assurance','2020-08-14','Bogor','Male','as','Married','Islam','Bogor','12332','khkhjk@gmail.com','11213','1233','Depok','Seumur Hidup','Jl. Salak 3 No. 75, ','Depok','Indonesia','Jawa Barat','Jl. Salak 3 No. 75, ','Depok','12.345.678','TK/0','50000000','','','S1','TI',0000,'31/3/2021'),
('2020001','Leny Andriani','1','IT Software Quality Assurance','0000-00-00','Jakarta','Female','B','Single','Islam','Indonesia','6,28789E+12','nonlenyandriani@gmail.com','KTP','3,27602E+14','Depok','Seumur Hidup','Jl. Salak 3 No. 75, ','Depok','Indonesia','Jawa Barat','Jl. Salak 3 No. 75, ','Depok','12.345.678','TK/0','50000000','','','S1','TI',2000,'31/3/2021'),
('20200016','Joko Nugroho','1','IT Software Quality Assurance','2020-10-01','Jakarta','Laki-laki','o','Single','Islam','aa','123456','joko_nugraha@gmail.com','a','a','a','a','a','a','a','a','a','a','a',NULL,'a','a','a','a','a',0000,'2020-10-18'),
('2020002','Rida Sinta','2','IT Software Quality Assurance','0000-00-00','Jakarta','Female','O','Single','Islam','Indonesia','6,28789E+12','nonlenyandriani@gmail.com','KTP','3,27602E+14','Depok','Seumur Hidup','Jl. Salak 3 No. 76, ','Depok','Indonesia','Jawa Barat','Jl. Salak 3 No. 76, ','Depok','12.345.678','TK/0','50000001','','','S1','TI',2000,'31/3/2022'),
('2020003','Zaza Nur','3','IT Software Quality Assurance','0000-00-00','Jakarta','Female','A','Single','Islam','Indonesia','6,28789E+12','nonlenyandriani@gmail.com','KTP','3,27602E+14','Depok','Seumur Hidup','Jl. Salak 3 No. 77, ','Depok','Indonesia','Jawa Barat','Jl. Salak 3 No. 77, ','Depok','12.345.678','TK/0','50000002','','','S1','TI',2000,'31/3/2023'),
('2020004','Anissa','4','IT Software Quality Assurance','0000-00-00','Jakarta','Female','A','Single','Islam','Indonesia','6,28789E+12','nonlenyandriani@gmail.com','KTP','3,27602E+14','Depok','Seumur Hidup','Jl. Salak 3 No. 78, ','Depok','Indonesia','Jawa Barat','Jl. Salak 3 No. 78, ','Depok','12.345.678','TK/0','50000003','','','S1','TI',2000,'31/3/2024'),
('2020005','Dewi Utami','5','IT Software Quality Assurance','0000-00-00','Jakarta','Female','A','Single','Islam','Indonesia','6,28789E+12','nonlenyandriani@gmail.com','KTP','3,27602E+14','Depok','Seumur Hidup','Jl. Salak 3 No. 79, ','Depok','Indonesia','Jawa Barat','Jl. Salak 3 No. 79, ','Depok','12.345.678','TK/0','50000004','','','S1','TI',2000,'31/3/2025'),
('2020006','Aisyah Sholehah','6','IT Software Quality Assurance','0000-00-00','Bogor','Female','A','Single','Islam','Indonesia','6,28789E+12','nonlenyandriani@gmail.com','KTP','3,27602E+14','Depok','Seumur Hidup','Jl. Salak 3 No. 80, ','Depok','Indonesia','Jawa Barat','Jl. Salak 3 No. 80, ','Depok','12.345.678','TK/0','50000005','','','S1','TI',2000,'31/3/2026'),
('2020007','Dara Lestari','7','IT Software Quality Assurance','0000-00-00','Bandung','Female','A','Single','Islam','Indonesia','6,28789E+12','nonlenyandriani@gmail.com','KTP','3,27602E+14','Depok','Seumur Hidup','Jl. Salak 3 No. 81, ','Depok','Indonesia','Jawa Barat','Jl. Salak 3 No. 81, ','Depok','12.345.678','TK/0','50000006','','','S1','TI',2000,'31/3/2027'),
('2020008','Oki','8','IT Software Quality Assurance','0000-00-00','Medan','Male','A','Single','Islam','Indonesia','6,28789E+12','nonlenyandriani@gmail.com','KTP','3,27602E+14','Depok','Seumur Hidup','Jl. Salak 3 No. 82, ','Depok','Indonesia','Jawa Barat','Jl. Salak 3 No. 82, ','Depok','12.345.678','TK/0','50000007','','','S1','TI',2000,'31/3/2028'),
('2020009','Eko','9','IT Software Quality Assurance','0000-00-00','Jakarta','Male','B','Single','Islam','Indonesia','6,28789E+12','nonlenyandriani@gmail.com','KTP','3,27602E+14','Depok','Seumur Hidup','Jl. Salak 3 No. 83, ','Depok','Indonesia','Jawa Barat','Jl. Salak 3 No. 83, ','Depok','12.345.678','TK/0','50000008','','','S1','TI',2000,'31/3/2029'),
('2020010','oka','10','IT Software Quality Assurance','0000-00-00','Jakarta','Male','B','Single','Islam','Indonesia','6,28789E+12','nonlenyandriani@gmail.com','KTP','3,27602E+14','Depok','Seumur Hidup','Jl. Salak 3 No. 84, ','Depok','Indonesia','Jawa Barat','Jl. Salak 3 No. 84, ','Depok','12.345.678','TK/0','50000009','','','S1','TI',2000,'31/3/2030'),
('2020011','Dita','11','IT Software Quality Assurance','0000-00-00','Jakarta','Female','B','Single','Islam','Indonesia','6,28789E+12','nonlenyandriani@gmail.com','KTP','3,27602E+14','Depok','Seumur Hidup','Jl. Salak 3 No. 85, ','Depok','Indonesia','Jawa Barat','Jl. Salak 3 No. 85, ','Depok','12.345.678','TK/0','50000010','','','S1','TI',2000,'31/3/2031'),
('2020012','Dinda','12','IT Software Quality Assurance','0000-00-00','Jakarta','Female','B','Single','Islam','Indonesia','6,28789E+12','nonlenyandriani@gmail.com','KTP','3,27602E+14','Depok','Seumur Hidup','Jl. Salak 3 No. 86, ','Depok','Indonesia','Jawa Barat','Jl. Salak 3 No. 86, ','Depok','12.345.678','TK/0','50000011','','','S1','TI',2000,'31/3/2032'),
('2020013','Dini','13','IT Software Quality Assurance','0000-00-00','Jakarta','Female','B','Single','Islam','Indonesia','6,28789E+12','nonlenyandriani@gmail.com','KTP','3,27602E+14','Depok','Seumur Hidup','Jl. Salak 3 No. 87, ','Depok','Indonesia','Jawa Barat','Jl. Salak 3 No. 87, ','Depok','12.345.678','TK/0','50000012','','','S1','TI',2000,'31/3/2033'),
('2020014','Tika','14','IT Software Quality Assurance','0000-00-00','Jakarta','Female','B','Single','Islam','Indonesia','6,28789E+12','nonlenyandriani@gmail.com','KTP','3,27602E+14','Depok','Seumur Hidup','Jl. Salak 3 No. 88, ','Depok','Indonesia','Jawa Barat','Jl. Salak 3 No. 88, ','Depok','12.345.678','TK/0','50000013','','','S1','TI',2000,'31/3/2034'),
('2020015','Tiwi','15','IT Software Quality Assurance','0000-00-00','Jakarta','Female','B','Single','Islam','Indonesia','6,28789E+12','nonlenyandriani@gmail.com','KTP','3,27602E+14','Depok','Seumur Hidup','Jl. Salak 3 No. 89, ','Depok','Indonesia','Jawa Barat','Jl. Salak 3 No. 89, ','Depok','12.345.678','TK/0','50000014','','','S1','TI',2000,'31/3/2035');

/*Table structure for table `employee_bank` */

DROP TABLE IF EXISTS `employee_bank`;

CREATE TABLE `employee_bank` (
  `nik` varchar(10) DEFAULT NULL,
  `name_of_bank` varchar(50) DEFAULT NULL,
  `bank_account` varchar(50) DEFAULT NULL,
  `salary` varchar(50) DEFAULT NULL,
  `contract_of_period` int(5) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `employee_bank` */

insert  into `employee_bank`(`nik`,`name_of_bank`,`bank_account`,`salary`,`contract_of_period`,`status`) values 
('2020','Bank Negara Indonesia (BNI)','123456','45000000',1,'active'),
('2020004','Panin Bank','123456','4500000',1,'inactive');

/*Table structure for table `employee_status` */

DROP TABLE IF EXISTS `employee_status`;

CREATE TABLE `employee_status` (
  `nik` varchar(10) NOT NULL,
  `join_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `inactive_date` date DEFAULT NULL,
  `inactive_reason` varchar(100) DEFAULT NULL,
  `contract_of_period` int(5) NOT NULL,
  `cuti` int(2) DEFAULT NULL,
  `upddate` datetime DEFAULT NULL,
  PRIMARY KEY (`nik`,`contract_of_period`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `employee_status` */

insert  into `employee_status`(`nik`,`join_date`,`end_date`,`inactive_date`,`inactive_reason`,`contract_of_period`,`cuti`,`upddate`) values 
('2020','2020-10-01','2020-09-01','2020-10-31','Job start',1,2,NULL),
('2020','2020-03-04','2021-03-31','0000-00-00','',2,5,'2020-12-20 15:35:28'),
('2020001','2020-10-31','2020-10-01','2020-10-31','',1,2,NULL),
('20200016','2020-07-08','2021-11-30','0000-00-00','',1,5,NULL);

/*Table structure for table `list_cuti` */

DROP TABLE IF EXISTS `list_cuti`;

CREATE TABLE `list_cuti` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `count_cuti` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `list_cuti` */

insert  into `list_cuti`(`id`,`name`,`count_cuti`) values 
(1,'Cuti Tahunan',12),
(2,'Cuti Haid',1),
(3,'Cuti Pindahan',1),
(4,'Cuti Nikah',3),
(6,'Cuti Keluarga Serumah Meninggal',2),
(7,'Cuti Keluarga Meninggal',1);

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

/*Table structure for table `report_absensi` */

DROP TABLE IF EXISTS `report_absensi`;

CREATE TABLE `report_absensi` (
  `nik` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `day` varchar(15) DEFAULT NULL,
  `clock_in` time DEFAULT NULL,
  `clock_out` time DEFAULT NULL,
  `activity` varchar(50) DEFAULT NULL,
  `remarks` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`nik`,`date`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `report_absensi` */

insert  into `report_absensi`(`nik`,`date`,`day`,`clock_in`,`clock_out`,`activity`,`remarks`) values 
('2020','2020-12-01','Tuesday',NULL,NULL,NULL,'Lupa Absen Datang'),
('2020','2020-12-02','Wednesday',NULL,NULL,NULL,'Lupa Absen Datang'),
('2020','2020-12-03','Thursday',NULL,NULL,NULL,'Lupa Absen Datang'),
('2020','2020-12-04','Friday',NULL,NULL,NULL,'Lupa Absen Datang'),
('2020','2020-12-05','Saturday',NULL,NULL,NULL,'Weekend'),
('2020','2020-12-06','Sunday',NULL,NULL,NULL,'Weekend'),
('2020','2020-12-07','Monday',NULL,NULL,NULL,'Lupa Absen Datang'),
('2020','2020-12-08','Tuesday',NULL,NULL,NULL,'Lupa Absen Datang'),
('2020','2020-12-09','Wednesday','21:52:20','21:53:08','add fitur bank','WFH'),
('2020','2020-12-10','Thursday','15:45:48','15:46:07','Update data master bank','WFH'),
('2020','2020-12-11','Friday','23:58:43',NULL,NULL,'Lupa Absen Pulang'),
('2020','2020-12-12','Saturday',NULL,NULL,NULL,'Cuti Tahunan'),
('2020','2020-12-13','Sunday',NULL,NULL,NULL,'Cuti Tahunan'),
('2020','2020-12-14','Monday',NULL,NULL,NULL,'Cuti Tahunan'),
('2020','2020-12-15','Tuesday',NULL,NULL,NULL,'Cuti Tahunan'),
('2020','2020-12-16','Wednesday',NULL,NULL,NULL,'Cuti Tahunan'),
('2020','2020-12-17','Thursday',NULL,NULL,NULL,'Lupa Absen Datang'),
('2020','2020-12-18','Friday',NULL,NULL,NULL,'Lupa Absen Datang'),
('2020','2020-12-19','Saturday','22:43:44','22:43:56','testing','testing'),
('2020','2020-12-20','Sunday',NULL,NULL,NULL,'Weekend'),
('2020','2020-12-21','Monday',NULL,NULL,NULL,'Lupa Absen Datang'),
('2020','2020-12-22','Tuesday',NULL,NULL,NULL,'Cuti Tahunan'),
('2020','2020-12-23','Wednesday',NULL,NULL,NULL,'Lupa Absen Datang'),
('2020','2020-12-24','Thursday',NULL,NULL,NULL,'Lupa Absen Datang'),
('2020','2020-12-25','Friday',NULL,NULL,NULL,'Lupa Absen Datang'),
('2020','2020-12-26','Saturday',NULL,NULL,NULL,'Weekend'),
('2020','2020-12-27','Sunday',NULL,NULL,NULL,'Weekend'),
('2020','2020-12-28','Monday',NULL,NULL,NULL,'Lupa Absen Datang'),
('2020','2020-12-29','Tuesday',NULL,NULL,NULL,'Lupa Absen Datang'),
('2020','2020-12-30','Wednesday',NULL,NULL,NULL,'Lupa Absen Datang'),
('2020','2020-12-31','Thursday',NULL,NULL,NULL,'Lupa Absen Datang');

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
('2020','Wahyudi','2020-09-13','08:00:00','17:00:00',0,NULL,'Tanggal Merah Hari raya'),
('2020','Wahyudi','2020-12-14','18:00:00','21:00:00',3,NULL,'aaa'),
('admin','Leni','2020-09-01','17:00:00','22:00:00',4,NULL,'ngerjain Project'),
('admin','Leni','2020-09-03','16:00:00','20:00:00',5,NULL,'Rapihin berkas');

/*Table structure for table `user_login` */

DROP TABLE IF EXISTS `user_login`;

CREATE TABLE `user_login` (
  `username` varchar(20) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `level` enum('staff','manager','supervisor','admin') DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `user_login` */

insert  into `user_login`(`username`,`name`,`level`,`password`,`status`) values 
('2020','Wahyudi','staff','123','active'),
('2020001','Leny Andriani','staff','123','active'),
('20200016','Joko Nugroho','staff','123','active'),
('2020002','Rida Sinta','staff','123','active'),
('2020003','Zaza Nur','staff','123','active'),
('2020004','Anissa','staff','123','active'),
('2020005','Dewi Utami','staff','123','active'),
('2020006','Aisyah Sholehah','staff','123','active'),
('2020007','Dara Lestari','staff','123','active'),
('2020008','Oki','staff','123','active'),
('2020009','Eko','staff','123','active'),
('2020010','oka','staff','123','active'),
('2020011','Dita','staff','123','active'),
('2020012','Dinda','staff','123','active'),
('2020013','Dini','staff','123','active'),
('2020014','Tika','staff','123','active'),
('2020015','Tiwi','staff','123','active'),
('admin','Leni','admin','admin','active'),
('bayunk','Bayunk','manager','123','active');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
