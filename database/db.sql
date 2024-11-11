-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2024 at 09:44 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('0','1') NOT NULL COMMENT '0 = Superadmin, 1 = Admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `email`, `password`, `level`) VALUES
(1, 'superadmin@example.com', '$2y$10$lu/tDArNQnkPHMTOk0a1qe8tN/J.wtbVvFoPZSpWSNiH5qhBcdr4e', '0'),
(2, 'admin@example.com', '$2y$10$Ax1zueUUn85LKg3322Axpun1Tst1uf.r3/qgWJpAC6JB93MJck/sy', '1');

-- --------------------------------------------------------

--
-- Table structure for table `peserta_master`
--

CREATE TABLE `peserta_master` (
  `id_peserta` int(11) NOT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `nama_depan` varchar(50) DEFAULT NULL,
  `nama_belakang` varchar(50) DEFAULT NULL,
  `kelas` varchar(20) DEFAULT NULL,
  `contact` varchar(15) DEFAULT NULL,
  `plotting` varchar(50) DEFAULT NULL,
  `status_peserta` varchar(20) DEFAULT NULL,
  `barcode` varchar(225) DEFAULT NULL,
  `status_presensi` varchar(20) DEFAULT NULL,
  `tgl_input` date DEFAULT NULL,
  `tgl_present` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peserta_master`
--

INSERT INTO `peserta_master` (`id_peserta`, `nama_lengkap`, `nama_depan`, `nama_belakang`, `kelas`, `contact`, `plotting`, `status_peserta`, `barcode`, `status_presensi`, `tgl_input`, `tgl_present`) VALUES
(1, 'Amelia Putri Noviansyah', 'Amelia', 'Noviansyah', 'X-ULW', '6283840416978', 'BUS-1', 'SISWA', 'cek', 'PREPARE', NULL, NULL),
(2, 'Dummy Kipe', 'Kipe', '2', 'X-KUL-3', '86135451', 'BUS-2', 'GURU', 'http://localhost/ParTel-Presensi/checkingQR/2', 'SUCCESS', '2024-11-06', NULL),
(3, '1', '1', '1', 'X-ULW', '453434', 'BUS-1', 'SISWA', 'http://localhost/ParTel-Presensi/checkingQR/3', 'SUCCESS', '2024-11-06', '2024-11-07 08:19:52'),
(7, 'Excel Checking 1', 'Excel', 'checking 1', 'X-ULW', '46465', 'BIS-1', 'SISWA', 'checkingQR/7', 'SUCCESS', '2024-11-06', NULL),
(8, 'Excel Checking 2', 'Excel', 'checking 2', 'X-PH', '1231312', 'BIS-2', 'GURU', 'checkingQR/8', 'PREPARE', '2024-11-06', NULL),
(9, 'Excel Checking 3', 'Excel', 'checking 3', 'X-KUL-1', '123131', 'BIS-3', 'SISWA', 'checkingQR/9', 'PREPARE', '2024-11-06', NULL),
(10, 'ceking live', 'live', 'live', 'X-KUL-2', '8465145454', 'BUS-3', 'GURU', 'checkingQR/10', 'SUCCESS', '2024-11-07', '2024-11-07 08:17:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `peserta_master`
--
ALTER TABLE `peserta_master`
  ADD PRIMARY KEY (`id_peserta`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `peserta_master`
--
ALTER TABLE `peserta_master`
  MODIFY `id_peserta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
