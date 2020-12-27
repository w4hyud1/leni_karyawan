-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2020 at 09:56 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ta_leny`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `nik` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `clock_in` time DEFAULT NULL,
  `clock_out` time DEFAULT NULL,
  `activity` varchar(100) DEFAULT NULL,
  `remarks` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`nik`, `date`, `clock_in`, `clock_out`, `activity`, `remarks`) VALUES
('2020', '2020-12-09', '21:52:20', '21:53:08', 'add fitur bank', 'WFH'),
('2020', '2020-12-10', '15:45:48', '15:46:07', 'Update data master bank', 'WFH'),
('2020', '2020-12-11', '23:58:43', NULL, NULL, NULL),
('2020', '2020-12-19', '22:43:44', '22:43:56', 'testing', 'testing'),
('2020', '2020-12-20', '14:29:56', '14:30:12', 'tambah fitur', 'WFH');

-- --------------------------------------------------------

--
-- Table structure for table `absensi_old`
--

CREATE TABLE `absensi_old` (
  `nik` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `time` time DEFAULT NULL,
  `status` enum('IN','OUT') NOT NULL,
  `activity` varchar(50) DEFAULT NULL,
  `remarks` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absensi_old`
--

INSERT INTO `absensi_old` (`nik`, `date`, `time`, `status`, `activity`, `remarks`) VALUES
('2020', '2020-08-19', '08:00:00', 'IN', 'kerja lapangan', 'cek poin'),
('2020', '2020-08-19', '12:00:00', 'OUT', 'jalan', 'ok'),
('2020', '2020-09-04', '10:25:00', 'IN', 'masuk sore', 'projeck BCA'),
('2020', '2020-09-04', '10:25:33', 'OUT', 'aa', 'aa'),
('2020', '2020-09-13', '09:47:41', 'IN', 'test 1', 'test 2'),
('2020', '2020-10-15', '05:22:51', 'IN', 'test', 'test'),
('2020', '2020-12-05', '06:16:55', 'IN', 'work visit', ''),
('2021', '2020-09-03', '07:41:45', 'IN', 'main ML', 'Langsung ok'),
('2021', '2020-09-03', '07:42:00', 'OUT', 'siap', 'ok'),
('2021', '2020-09-04', '04:03:29', 'IN', 'Pendingan JOB', 'Harian'),
('admin', '2020-09-02', '05:42:33', 'OUT', 'main ML', 'Pulang kuy'),
('admin', '2020-09-03', '05:38:24', 'IN', 'aa', 'aa'),
('admin', '2020-09-03', '06:50:53', 'OUT', 'main ML', 'coba ya');

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id`, `name`) VALUES
(1, 'Bank Rakyat Indonesia (BRI)'),
(2, 'Bank Mandiri'),
(3, 'Bank Central Asia (BCA)'),
(4, 'Bank Negara Indonesia (BNI)'),
(5, 'Bank Tabungan Negara (BTN)'),
(6, 'Bank CIMB Niaga'),
(7, 'Bank BTPN'),
(8, 'Panin Bank'),
(9, 'Bank OCBC NISP'),
(10, 'Bank Maybank Indonesia');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(5) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `npwp` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `name`, `address`, `phone`, `npwp`) VALUES
(18, 'PT BANK MANDIRI (PERSERO)', 'JL. JEND GATOT SUBROTO BLOK - NO. 36-38, SENAYAN, KEBAYORAN BARU, JAKARTA SELATAN 12190', '', '01.061.173.9-093.000'),
(19, 'PT BANK TABUNGAN PENSIUNAN NASIONAL, TBK', 'JL. DR IDE ANAK AGUNG GDE AGUNG KAV. 5.5-5.6, SETIABUDI, JAKARTA SELATAN 12950', '', '01.139.797.3-091.000'),
(20, 'PT DIPO STAR FINANCE', 'JL. ASIA AFRIKA, SENTRAL SENAYAN II LANTAI 3, GELORA, TANAH ABANG, JAKARTA PUSAT, DKI JAKARTA 10270', '', '01.367.850.3-091.000'),
(21, 'PT AXA FINANCIAL INDONESIA', 'GEDUNG AXA TOWER KUNINGAN CITY LT. 17, JL. PROF. DR. SATRIO KAV. 18, KARET, SETIABUDI, JAKARTA SELAT', '', '01.334.086.4-073.000'),
(22, 'PT AXA MANDIRI FINANCIAL SERVICES', 'GEDUNG AXA TOWER KUNINGAN CITY LT. 9, JL. PROF. DR. SATRIO KAV. 18, KARET, SETIABUDI, JAKARTA SELATA', '', '01.554.608.8-062.000'),
(23, 'PT CHUBB LIFE INSURANCE INDONESIA', 'GD. PODIUM THAMRIN NINE (ACE SQUARE) LANTAI 6, KEBON MELATI, TANAH ABANG, JAKARTA BARAT, DKI JAKARTA', '', '01.371.400.1-038.000'),
(24, 'PT DWIWIRA LESTARI JAYA', 'JL. BELATUK NO. 06, TEMINDUNG PERMAI, SUNGAI PINANG, SAMARINDA, KALIMANTAN TIMUR 75119', '', '01.684.592.7-725.000'),
(25, 'PT BANK UOB INDONESIA', 'JL. MH. THAMRIN NO. 10, KEBON MELATI, TANAH ABANG, JAKARTA PUSAT, DKI JAKARTA 10230', '', '01.308.443.9-091.000'),
(26, 'PT ZURICH TOPAS LIFE', 'GD. MAYAPADA TOWER II LANTAI 3, 3A,& 5, JL. JEND SUDIRMAN KAV 27, KARET, SETIABUDI, JAKARTA SELATAN,', '', '01.374.976.7-011.000');

-- --------------------------------------------------------

--
-- Table structure for table `coba`
--

CREATE TABLE `coba` (
  `nik` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `day` varchar(15) DEFAULT NULL,
  `clock_in` time DEFAULT NULL,
  `clock_out` time DEFAULT NULL,
  `remarks` varchar(50) DEFAULT NULL,
  `note` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coba`
--

INSERT INTO `coba` (`nik`, `date`, `day`, `clock_in`, `clock_out`, `remarks`, `note`) VALUES
('2020', '2020-12-01', 'Tuesday', NULL, NULL, NULL, NULL),
('2020', '2020-12-02', 'Wednesday', NULL, NULL, NULL, NULL),
('2020', '2020-12-03', 'Thursday', NULL, NULL, NULL, NULL),
('2020', '2020-12-04', 'Friday', NULL, NULL, NULL, NULL),
('2020', '2020-12-05', 'Saturday', NULL, NULL, NULL, NULL),
('2020', '2020-12-06', 'Sunday', NULL, NULL, NULL, NULL),
('2020', '2020-12-07', 'Monday', NULL, NULL, NULL, NULL),
('2020', '2020-12-08', 'Tuesday', NULL, NULL, NULL, NULL),
('2020', '2020-12-09', 'Wednesday', NULL, NULL, NULL, NULL),
('2020', '2020-12-10', 'Thursday', NULL, NULL, NULL, NULL),
('2020', '2020-12-11', 'Friday', NULL, NULL, NULL, NULL),
('2020', '2020-12-12', 'Saturday', NULL, NULL, NULL, NULL),
('2020', '2020-12-13', 'Sunday', NULL, NULL, NULL, NULL),
('2020', '2020-12-14', 'Monday', NULL, NULL, NULL, NULL),
('2020', '2020-12-15', 'Tuesday', NULL, NULL, NULL, NULL),
('2020', '2020-12-16', 'Wednesday', NULL, NULL, NULL, NULL),
('2020', '2020-12-17', 'Thursday', NULL, NULL, NULL, NULL),
('2020', '2020-12-18', 'Friday', NULL, NULL, NULL, NULL),
('2020', '2020-12-19', 'Saturday', NULL, NULL, NULL, NULL),
('2020', '2020-12-20', 'Sunday', NULL, NULL, NULL, NULL),
('2020', '2020-12-21', 'Monday', NULL, NULL, NULL, NULL),
('2020', '2020-12-22', 'Tuesday', NULL, NULL, NULL, NULL),
('2020', '2020-12-23', 'Wednesday', NULL, NULL, NULL, NULL),
('2020', '2020-12-24', 'Thursday', NULL, NULL, NULL, NULL),
('2020', '2020-12-25', 'Friday', NULL, NULL, NULL, NULL),
('2020', '2020-12-26', 'Saturday', NULL, NULL, NULL, NULL),
('2020', '2020-12-27', 'Sunday', NULL, NULL, NULL, NULL),
('2020', '2020-12-28', 'Monday', NULL, NULL, NULL, NULL),
('2020', '2020-12-29', 'Tuesday', NULL, NULL, NULL, NULL),
('2020', '2020-12-30', 'Wednesday', NULL, NULL, NULL, NULL),
('2020', '2020-12-31', 'Thursday', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cuti`
--

CREATE TABLE `cuti` (
  `id` int(10) NOT NULL,
  `nik` varchar(20) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `activity` varchar(100) DEFAULT NULL,
  `remarks` varchar(100) DEFAULT NULL,
  `status` enum('Approve','Pending','Cancel') DEFAULT NULL,
  `adddate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cuti`
--

INSERT INTO `cuti` (`id`, `nik`, `date`, `activity`, `remarks`, `status`, `adddate`) VALUES
(1, '2020', '2020-12-12', 'Cuti Tahunan', '', 'Approve', '2020-12-12 12:29:16'),
(2, '2020', '2020-12-14', 'Cuti Tahunan', 'urusan keluarga', 'Cancel', '2020-12-09 09:04:07'),
(3, '2020', '2020-12-15', 'Cuti Tahunan', 'Urusan keluarga', 'Approve', '2020-12-10 03:46:28'),
(4, '2020', '2020-12-16', 'Cuti Tahunan', 'Urusan keluarga', 'Approve', '2020-12-10 03:46:37'),
(5, '2020', '2020-12-13', 'Cuti Tahunan', 'lagi males', 'Cancel', '2020-12-16 09:48:02'),
(6, '2020', '2020-12-22', 'Cuti Tahunan', 'a', 'Approve', NULL),
(7, '2020003', '2020-12-16', 'Cuti Haid', 'testing', 'Approve', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

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
  `billing_rate` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`nik`, `name`, `id_client`, `position`, `birth_date`, `birth_place`, `gender`, `blood_type`, `marital_status`, `religion`, `cityzenship`, `phone`, `email`, `id_type`, `id_number`, `card_expired`, `street`, `city`, `country`, `state`, `original_street`, `original_city`, `npwp`, `ptkp_code`, `ptkp_name`, `allowance`, `overtime_allowance`, `education_level`, `education_major`, `institution_name`, `graduation_year`, `billing_rate`) VALUES
('20170039', 'TERRY TIFANY MANDAGIE', '19', 'IT Software Quality Assurance', '1990-02-21', 'MANADO', 'MALE', 'B', 'Married', 'Katolik', 'DKI JAKARTA', '089699727786', 'terrymandagie@gmail.com', 'KTP', '3175032102900004', 'SEUMUR HIDUP', 'CIPINANG PULO NO. 8 RT 011 RW 012, CIPINANG BESAR UTARA, JATINEGARA', 'DKI JAKARTA', 'INDONESIA', 'JAKARTA TIMUR', 'CIPINANG PULO NO. 8 RT 011 RW 012, CIPINANG BESAR UTARA, JATINEGARA', 'DKI JAKARTA', '66.912.711.0-002.000', 'K/0', NULL, '', '', 'S1', 'TEKNIK INFORMATIKA', 'UNIVERSITAS ADVENT INDONESIA', 2013, '');

-- --------------------------------------------------------

--
-- Table structure for table `employee_bank`
--

CREATE TABLE `employee_bank` (
  `nik` varchar(10) DEFAULT NULL,
  `name_of_bank` varchar(50) DEFAULT NULL,
  `bank_account` varchar(50) DEFAULT NULL,
  `salary` varchar(50) DEFAULT NULL,
  `contract_of_period` int(5) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee_status`
--

CREATE TABLE `employee_status` (
  `nik` varchar(10) NOT NULL,
  `join_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `inactive_date` date DEFAULT NULL,
  `inactive_reason` varchar(100) DEFAULT NULL,
  `contract_of_period` int(5) NOT NULL,
  `cuti` int(2) DEFAULT NULL,
  `upddate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_status`
--

INSERT INTO `employee_status` (`nik`, `join_date`, `end_date`, `inactive_date`, `inactive_reason`, `contract_of_period`, `cuti`, `upddate`) VALUES
('20170039', '2018-08-17', '2021-01-31', NULL, NULL, 3, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `list_cuti`
--

CREATE TABLE `list_cuti` (
  `id` int(5) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `count_cuti` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `list_cuti`
--

INSERT INTO `list_cuti` (`id`, `name`, `count_cuti`) VALUES
(1, 'Cuti Tahunan', 12),
(2, 'Cuti Haid', 1),
(3, 'Cuti Pindahan', 1),
(4, 'Cuti Nikah', 3),
(6, 'Cuti Keluarga Serumah Meninggal', 1),
(7, 'Cuti Keluarga Meninggal', 2);

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `id` int(5) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`id`, `name`) VALUES
(1, 'IT Software Quality Assurance');

-- --------------------------------------------------------

--
-- Table structure for table `report_absensi`
--

CREATE TABLE `report_absensi` (
  `nik` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `day` varchar(15) DEFAULT NULL,
  `clock_in` time DEFAULT NULL,
  `clock_out` time DEFAULT NULL,
  `activity` varchar(50) DEFAULT NULL,
  `remarks` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report_absensi`
--

INSERT INTO `report_absensi` (`nik`, `date`, `day`, `clock_in`, `clock_out`, `activity`, `remarks`) VALUES
('2020', '2020-12-01', 'Tuesday', NULL, NULL, NULL, 'Lupa Absen Datang'),
('2020', '2020-12-02', 'Wednesday', NULL, NULL, NULL, 'Lupa Absen Datang'),
('2020', '2020-12-03', 'Thursday', NULL, NULL, NULL, 'Lupa Absen Datang'),
('2020', '2020-12-04', 'Friday', NULL, NULL, NULL, 'Lupa Absen Datang'),
('2020', '2020-12-05', 'Saturday', NULL, NULL, NULL, 'Weekend'),
('2020', '2020-12-06', 'Sunday', NULL, NULL, NULL, 'Weekend'),
('2020', '2020-12-07', 'Monday', NULL, NULL, NULL, 'Lupa Absen Datang'),
('2020', '2020-12-08', 'Tuesday', NULL, NULL, NULL, 'Lupa Absen Datang'),
('2020', '2020-12-09', 'Wednesday', '21:52:20', '21:53:08', 'add fitur bank', 'WFH'),
('2020', '2020-12-10', 'Thursday', '15:45:48', '15:46:07', 'Update data master bank', 'WFH'),
('2020', '2020-12-11', 'Friday', '23:58:43', NULL, NULL, 'Lupa Absen Pulang'),
('2020', '2020-12-12', 'Saturday', NULL, NULL, NULL, 'Cuti Tahunan'),
('2020', '2020-12-13', 'Sunday', NULL, NULL, NULL, 'Cuti Tahunan'),
('2020', '2020-12-14', 'Monday', NULL, NULL, NULL, 'Cuti Tahunan'),
('2020', '2020-12-15', 'Tuesday', NULL, NULL, NULL, 'Cuti Tahunan'),
('2020', '2020-12-16', 'Wednesday', NULL, NULL, NULL, 'Cuti Tahunan'),
('2020', '2020-12-17', 'Thursday', NULL, NULL, NULL, 'Lupa Absen Datang'),
('2020', '2020-12-18', 'Friday', NULL, NULL, NULL, 'Lupa Absen Datang'),
('2020', '2020-12-19', 'Saturday', '22:43:44', '22:43:56', 'testing', 'testing'),
('2020', '2020-12-20', 'Sunday', '14:29:56', '14:30:12', 'tambah fitur', 'WFH'),
('2020', '2020-12-21', 'Monday', NULL, NULL, NULL, 'Lupa Absen Datang'),
('2020', '2020-12-22', 'Tuesday', NULL, NULL, NULL, 'Cuti Tahunan'),
('2020', '2020-12-23', 'Wednesday', NULL, NULL, NULL, 'Lupa Absen Datang'),
('2020', '2020-12-24', 'Thursday', NULL, NULL, NULL, 'Lupa Absen Datang'),
('2020', '2020-12-25', 'Friday', NULL, NULL, NULL, 'Lupa Absen Datang'),
('2020', '2020-12-26', 'Saturday', NULL, NULL, NULL, 'Weekend'),
('2020', '2020-12-27', 'Sunday', NULL, NULL, NULL, 'Weekend'),
('2020', '2020-12-28', 'Monday', NULL, NULL, NULL, 'Lupa Absen Datang'),
('2020', '2020-12-29', 'Tuesday', NULL, NULL, NULL, 'Lupa Absen Datang'),
('2020', '2020-12-30', 'Wednesday', NULL, NULL, NULL, 'Lupa Absen Datang'),
('2020', '2020-12-31', 'Thursday', NULL, NULL, NULL, 'Lupa Absen Datang');

-- --------------------------------------------------------

--
-- Table structure for table `spl`
--

CREATE TABLE `spl` (
  `nik` varchar(20) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `date` date NOT NULL,
  `clock_in` time DEFAULT NULL,
  `clock_out` time DEFAULT NULL,
  `total_hour` int(11) DEFAULT NULL,
  `convertion_hour` varchar(20) DEFAULT NULL,
  `activity` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spl`
--

INSERT INTO `spl` (`nik`, `name`, `date`, `clock_in`, `clock_out`, `total_hour`, `convertion_hour`, `activity`) VALUES
('2020', 'Wahyudi', '2020-09-13', '08:00:00', '17:00:00', 0, NULL, 'Tanggal Merah Hari raya'),
('2020', 'Wahyudi', '2020-12-14', '18:00:00', '21:00:00', 3, NULL, 'aaa'),
('admin', 'Leni', '2020-09-01', '17:00:00', '22:00:00', 4, NULL, 'ngerjain Project'),
('admin', 'Leni', '2020-09-03', '16:00:00', '20:00:00', 5, NULL, 'Rapihin berkas');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `username` varchar(20) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `level` enum('staff','manager','supervisor','admin') DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`username`, `name`, `level`, `password`, `status`) VALUES
('', NULL, NULL, NULL, NULL),
('1802006', 'Leny Andriani', 'admin', 'lenyandr', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`nik`,`date`);

--
-- Indexes for table `absensi_old`
--
ALTER TABLE `absensi_old`
  ADD PRIMARY KEY (`nik`,`date`,`status`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cuti`
--
ALTER TABLE `cuti`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`nik`,`id_client`);

--
-- Indexes for table `employee_status`
--
ALTER TABLE `employee_status`
  ADD PRIMARY KEY (`nik`,`contract_of_period`);

--
-- Indexes for table `list_cuti`
--
ALTER TABLE `list_cuti`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report_absensi`
--
ALTER TABLE `report_absensi`
  ADD PRIMARY KEY (`nik`,`date`);

--
-- Indexes for table `spl`
--
ALTER TABLE `spl`
  ADD PRIMARY KEY (`nik`,`date`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `cuti`
--
ALTER TABLE `cuti`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `list_cuti`
--
ALTER TABLE `list_cuti`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
