-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2024 at 10:34 AM
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
  `status_presensi` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peserta_master`
--

INSERT INTO `peserta_master` (`id_peserta`, `nama_lengkap`, `nama_depan`, `nama_belakang`, `kelas`, `contact`, `plotting`, `status_peserta`, `status_presensi`) VALUES
(1, 'Amelia Putri Noviansyah', 'Amelia', 'Noviansyah', 'X ULW', '6283840416978', 'BUS-1', 'SISWA', 'PREPARE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `peserta_master`
--
ALTER TABLE `peserta_master`
  ADD PRIMARY KEY (`id_peserta`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `peserta_master`
--
ALTER TABLE `peserta_master`
  MODIFY `id_peserta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;