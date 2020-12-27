/*
SQLyog Ultimate v12.4.3 (64 bit)
MySQL - 10.1.32-MariaDB : Database - ta_leny
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
('20200040','2020-12-21','21:07:57','21:08:14','Update Data','WFH'),
('20200040','2020-12-22','21:08:59',NULL,NULL,NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

/*Data for the table `client` */

insert  into `client`(`id`,`name`,`address`,`phone`,`npwp`) values 
(18,'PT BANK MANDIRI (PERSERO)','JL. JEND GATOT SUBROTO BLOK - NO. 36-38, SENAYAN, KEBAYORAN BARU, JAKARTA SELATAN 12190','','01.061.173.9-093.000'),
(19,'PT BANK TABUNGAN PENSIUNAN NASIONAL, TBK','JL. DR IDE ANAK AGUNG GDE AGUNG KAV. 5.5-5.6, SETIABUDI, JAKARTA SELATAN 12950','','01.139.797.3-091.000'),
(20,'PT DIPO STAR FINANCE','JL. ASIA AFRIKA, SENTRAL SENAYAN II LANTAI 3, GELORA, TANAH ABANG, JAKARTA PUSAT, DKI JAKARTA 10270','','01.367.850.3-091.000'),
(21,'PT AXA FINANCIAL INDONESIA','GEDUNG AXA TOWER KUNINGAN CITY LT. 17, JL. PROF. DR. SATRIO KAV. 18, KARET, SETIABUDI, JAKARTA SELAT','','01.334.086.4-073.000'),
(22,'PT AXA MANDIRI FINANCIAL SERVICES','GEDUNG AXA TOWER KUNINGAN CITY LT. 9, JL. PROF. DR. SATRIO KAV. 18, KARET, SETIABUDI, JAKARTA SELATA','','01.554.608.8-062.000'),
(23,'PT CHUBB LIFE INSURANCE INDONESIA','GD. PODIUM THAMRIN NINE (ACE SQUARE) LANTAI 6, KEBON MELATI, TANAH ABANG, JAKARTA BARAT, DKI JAKARTA','','01.371.400.1-038.000'),
(24,'PT DWIWIRA LESTARI JAYA','JL. BELATUK NO. 06, TEMINDUNG PERMAI, SUNGAI PINANG, SAMARINDA, KALIMANTAN TIMUR 75119','','01.684.592.7-725.000'),
(25,'PT BANK UOB INDONESIA','JL. MH. THAMRIN NO. 10, KEBON MELATI, TANAH ABANG, JAKARTA PUSAT, DKI JAKARTA 10230','','01.308.443.9-091.000'),
(26,'PT ZURICH TOPAS LIFE','GD. MAYAPADA TOWER II LANTAI 3, 3A,& 5, JL. JEND SUDIRMAN KAV 27, KARET, SETIABUDI, JAKARTA SELATAN,','','01.374.976.7-011.000');

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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `cuti` */

insert  into `cuti`(`id`,`nik`,`date`,`activity`,`remarks`,`status`,`adddate`) values 
(8,'20200040','2020-12-07','Cuti Tahunan','Urusan keluarga','Cancel','2020-12-22 09:13:18'),
(9,'20200040','2019-12-08','Cuti Tahunan','Urusan keluarga','Approve','2020-12-22 09:13:38'),
(12,'20170039','2020-12-01','Cuti Tahunan','aa','Approve',NULL),
(13,'20170039','2020-12-02','Cuti Tahunan','bb','Approve',NULL),
(14,'20200040','2020-12-01','Mangkir','Tidak Masuk Kerja','Approve',NULL);

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
  `education_level` varchar(5) DEFAULT NULL,
  `education_major` varchar(30) DEFAULT NULL,
  `institution_name` varchar(30) DEFAULT NULL,
  `graduation_year` year(4) DEFAULT NULL,
  `billing_rate` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`nik`,`id_client`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `employee` */

insert  into `employee`(`nik`,`name`,`id_client`,`position`,`birth_date`,`birth_place`,`gender`,`blood_type`,`marital_status`,`religion`,`cityzenship`,`phone`,`email`,`id_type`,`id_number`,`card_expired`,`street`,`city`,`country`,`state`,`original_street`,`original_city`,`npwp`,`ptkp_code`,`ptkp_name`,`education_level`,`education_major`,`institution_name`,`graduation_year`,`billing_rate`) values 
('20170039','TERRY TIFANY MANDAGIE','19','IT Software Quality Assurance','1990-02-21','MANADO','MALE','B','Married','Katolik','DKI JAKARTA','089699727786','terrymandagie@gmail.com','KTP','3175032102900004','SEUMUR HIDUP','CIPINANG PULO NO. 8 RT 011 RW 012, CIPINANG BESAR UTARA, JATINEGARA','DKI JAKARTA','INDONESIA','JAKARTA TIMUR','CIPINANG PULO NO. 8 RT 011 RW 012, CIPINANG BESAR UTARA, JATINEGARA','DKI JAKARTA','66.912.711.0-002.000','K/0',NULL,'S1','TEKNIK INFORMATIKA','UNIVERSITAS ADVENT INDONESIA',2013,''),
('20200040','Wahyudi','18','IT Software Quality Assurance','1991-03-29','Bogor','Male','A','Married','Islam','123','123456789','wahyudi.bayunk@gmail.com','KTP','123456789','Life Time','Jl. R. H. Panji Kp. Masjid','Bogor','Indonesia','Jawa Barat','Jl. R. H. Panji Kp. Masjid','Bogor','123456789','123456',NULL,'SI','IT','Universitas Indraprasta',2016,'2020');

/*Table structure for table `employee_bank` */

DROP TABLE IF EXISTS `employee_bank`;

CREATE TABLE `employee_bank` (
  `nik` varchar(10) NOT NULL,
  `name_of_bank` varchar(50) DEFAULT NULL,
  `bank_account` varchar(50) DEFAULT NULL,
  `salary` varchar(50) DEFAULT NULL,
  `contract_of_period` int(5) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT NULL,
  PRIMARY KEY (`nik`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `employee_bank` */

insert  into `employee_bank`(`nik`,`name_of_bank`,`bank_account`,`salary`,`contract_of_period`,`status`) values 
('20200040',NULL,NULL,NULL,NULL,NULL);

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
  `status` varchar(20) DEFAULT 'Active',
  `upddate` datetime DEFAULT NULL,
  PRIMARY KEY (`nik`,`contract_of_period`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `employee_status` */

insert  into `employee_status`(`nik`,`join_date`,`end_date`,`inactive_date`,`inactive_reason`,`contract_of_period`,`cuti`,`status`,`upddate`) values 
('20170039','2018-08-17','2021-01-31','0000-00-00','',3,10,'Active','2020-12-26 19:41:51'),
('20200040','2020-10-25','2021-10-31','0000-00-00','',1,1,'Active','2020-12-26 19:41:51');

/*Table structure for table `list_cuti` */

DROP TABLE IF EXISTS `list_cuti`;

CREATE TABLE `list_cuti` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `count_cuti` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `list_cuti` */

insert  into `list_cuti`(`id`,`name`,`count_cuti`) values 
(1,'Cuti Tahunan',12),
(2,'Cuti Haid',1),
(3,'Cuti Pindahan',1),
(4,'Cuti Nikah',3),
(6,'Cuti Keluarga Serumah Meninggal',1),
(7,'Cuti Keluarga Meninggal',2);

/*Table structure for table `list_national_holiday` */

DROP TABLE IF EXISTS `list_national_holiday`;

CREATE TABLE `list_national_holiday` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name_holiday` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `list_national_holiday` */

insert  into `list_national_holiday`(`id`,`name_holiday`,`date`) values 
(3,'Hari Raya Natal','2020-12-25'),
(4,'Cuti Bersama Natal','2020-12-24'),
(5,'Cuti Bersama Tahun Baru','2020-12-31');

/*Table structure for table `position` */

DROP TABLE IF EXISTS `position`;

CREATE TABLE `position` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `position` */

insert  into `position`(`id`,`name`) values 
(1,'IT Software Quality Assurance');

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
('20200040','2020-12-01','Tuesday',NULL,NULL,'Mangkir','Tidak Masuk Kerja'),
('20200040','2020-12-02','Wednesday',NULL,NULL,NULL,'Mangkir'),
('20200040','2020-12-03','Thursday',NULL,NULL,NULL,'Mangkir'),
('20200040','2020-12-04','Friday',NULL,NULL,NULL,'Mangkir'),
('20200040','2020-12-05','Saturday',NULL,NULL,NULL,'Weekend'),
('20200040','2020-12-06','Sunday',NULL,NULL,NULL,'Weekend'),
('20200040','2020-12-07','Monday',NULL,NULL,NULL,'Mangkir'),
('20200040','2020-12-08','Tuesday',NULL,NULL,NULL,'Mangkir'),
('20200040','2020-12-09','Wednesday',NULL,NULL,NULL,'Mangkir'),
('20200040','2020-12-10','Thursday',NULL,NULL,NULL,'Mangkir'),
('20200040','2020-12-11','Friday',NULL,NULL,NULL,'Mangkir'),
('20200040','2020-12-12','Saturday',NULL,NULL,NULL,'Weekend'),
('20200040','2020-12-13','Sunday',NULL,NULL,NULL,'Weekend'),
('20200040','2020-12-14','Monday',NULL,NULL,NULL,'Mangkir'),
('20200040','2020-12-15','Tuesday',NULL,NULL,NULL,'Mangkir'),
('20200040','2020-12-16','Wednesday',NULL,NULL,NULL,'Mangkir'),
('20200040','2020-12-17','Thursday',NULL,NULL,NULL,'Mangkir'),
('20200040','2020-12-18','Friday',NULL,NULL,NULL,'Mangkir'),
('20200040','2020-12-19','Saturday',NULL,NULL,NULL,'Weekend'),
('20200040','2020-12-20','Sunday',NULL,NULL,NULL,'Weekend'),
('20200040','2020-12-21','Monday','21:07:57','21:08:14','Update Data','WFH'),
('20200040','2020-12-22','Tuesday','21:08:59',NULL,NULL,'Lupa Absen Pulang'),
('20200040','2020-12-23','Wednesday',NULL,NULL,NULL,'Mangkir'),
('20200040','2020-12-24','Thursday',NULL,NULL,NULL,'Cuti Bersama Natal'),
('20200040','2020-12-25','Friday',NULL,NULL,NULL,'Hari Raya Natal'),
('20200040','2020-12-26','Saturday',NULL,NULL,NULL,'Weekend'),
('20200040','2020-12-27','Sunday',NULL,NULL,NULL,'Weekend'),
('20200040','2020-12-28','Monday',NULL,NULL,NULL,'Mangkir'),
('20200040','2020-12-29','Tuesday',NULL,NULL,NULL,'Mangkir'),
('20200040','2020-12-30','Wednesday',NULL,NULL,NULL,'Mangkir'),
('20200040','2020-12-31','Thursday',NULL,NULL,NULL,'Cuti Bersama Tahun Baru');

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
('1802006','Leny Andriani','admin','lenyandr','active'),
('20170039','TERRY TIFANY MANDAGIE','staff','123','active'),
('20200040','Wahyudi','staff','123','active'),
('admin','Admin','admin','admin','active');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
