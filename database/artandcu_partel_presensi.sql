-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 18, 2024 at 01:22 PM
-- Server version: 10.6.19-MariaDB-cll-lve
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `artandcu_partel_presensi`
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
(1, 'superadmin@summerscape.com', '$2y$10$lu/tDArNQnkPHMTOk0a1qe8tN/J.wtbVvFoPZSpWSNiH5qhBcdr4e', '0'),
(3, 'admin1@summerscape.com', '$2y$10$yLkrNJSJSjz0QjtYp0wp3ucz1ZXLW9eDeRH4Zxk4IcrzC9dyOTUSW', '1'),
(4, 'admin2@summerscape.com', '$2y$10$2BnXItNnIWLcucnNC5qDwusnEkQF5PLNGwthH6ZNCdmB99XBjNMQu', '1'),
(5, 'admin3@summerscape.com', '$2y$10$hwO0a5FGeiNd52r6BktDUeEOqFCdqte5xQMQasY7tHgnqxNEc0sqq', '1');

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
(1, 'Amelia Putri Noviansyah', 'Amelia', 'Noviansyah', 'X-ULW', '62 83840416978', 'BIS-1', 'SISWA', 'checkingQR/1', 'SUCCESS', '2024-11-13', '2024-11-17 03:45:42'),
(2, 'Avera Rhea Azzarin', 'Avera', 'Azarin', 'X-ULW', '62 81324278945', 'BIS-1', 'SISWA', 'checkingQR/2', 'SUCCESS', '2024-11-13', '2024-11-17 03:06:48'),
(3, 'Mohammad Dhafindra Fathurrohman Rusdichori', 'Mohammad', 'Rusdichori', 'X-ULW', '62 87876924682', 'BIS-1', 'SISWA', 'checkingQR/3', 'SUCCESS', '2024-11-13', '2024-11-17 03:24:50'),
(4, 'Khalil Gibran Pratama', 'Khalil', 'Pratama', 'X-ULW', '62 82318921828', 'BIS-1', 'SISWA', 'checkingQR/4', 'SUCCESS', '2024-11-13', '2024-11-17 03:12:19'),
(5, 'Muhammad Abyakta Zachary', 'Muhammad', 'Zachary', 'X-ULW', '62 89526984332', 'BIS-1', 'SISWA', 'checkingQR/5', 'SUCCESS', '2024-11-13', '2024-11-17 02:56:41'),
(6, 'Ferrarisya Maura Ariasatya', 'Ferrarisya', 'Ariasatya', 'X-ULW', '62 85700637785', 'BIS-1', 'SISWA', 'checkingQR/6', 'SUCCESS', '2024-11-13', '2024-11-17 02:57:01'),
(7, 'Ade Salwa Zhafira', 'Ade', 'Zhafira', 'X-ULW', '62 81347968340', 'BIS-1', 'SISWA', 'checkingQR/7', 'SUCCESS', '2024-11-13', '2024-11-17 03:19:10'),
(8, 'Ayumi Annisah Fitri', 'Ayumi', 'Fitri', 'X-ULW', '62 81324641973', 'BIS-1', 'SISWA', 'checkingQR/8', 'SUCCESS', '2024-11-13', '2024-11-17 02:58:54'),
(9, 'Gheysa Kusuma Dewi', 'Gheysa', 'Dewi', 'X-ULW', '62 85163101466', 'BIS-1', 'SISWA', 'checkingQR/9', 'SUCCESS', '2024-11-13', '2024-11-17 03:40:19'),
(10, 'Muhammad Nurazrul Pribadi', 'Muhammad', 'Pribadi', 'X-ULW', '62 895616110401', 'BIS-1', 'SISWA', 'checkingQR/10', 'SUCCESS', '2024-11-13', '2024-11-17 03:11:26'),
(11, 'Rahmeisya Putri', 'Rahmeisya', 'Putri', 'X-PH', '62 81252947916', 'BIS-1', 'SISWA', 'checkingQR/11', 'SUCCESS', '2024-11-13', '2024-11-17 02:31:54'),
(12, 'Nadilla Ramadhan', 'Nadilla', 'Ramadhan', 'X-PH', '62 8817704013', 'BIS-1', 'SISWA', 'checkingQR/12', 'SUCCESS', '2024-11-13', '2024-11-17 04:21:41'),
(13, 'Nur Jihan Luthfiyah Zulfa', 'Nur', 'Zulfa', 'X-PH', '62 895387137050', 'BIS-1', 'SISWA', 'checkingQR/13', 'SUCCESS', '2024-11-13', '2024-11-17 04:15:16'),
(14, 'Muhammad Syauqi Althaf Rahmatullah', 'Muhammad', 'Rahmatullah', 'X-PH', '62 82117480971', 'BIS-1', 'SISWA', 'checkingQR/14', 'SUCCESS', '2024-11-13', '2024-11-17 04:12:14'),
(15, 'Davir Raihan Nur Akbar', 'Davir', 'Akbar', 'X-PH', '62 81221857760', 'BIS-1', 'SISWA', 'checkingQR/15', 'SUCCESS', '2024-11-13', '2024-11-17 02:54:56'),
(16, 'Iqbal Firmansyah Kurniawan', 'Iqbal', 'Kurniawan', 'X-PH', '62 881023009278', 'BIS-1', 'SISWA', 'checkingQR/16', 'SUCCESS', '2024-11-13', '2024-11-17 02:40:11'),
(17, 'Safa Astiareta', 'Safa', 'Astiareta', 'X-KUL-1', '62 85624997116', 'BIS-1', 'SISWA', 'checkingQR/17', 'SUCCESS', '2024-11-13', '2024-11-17 03:07:41'),
(18, 'Adzikra Haura', 'Adzikra', 'Haura', 'X-KUL-1', '62 82115838066', 'BIS-1', 'SISWA', 'checkingQR/18', 'SUCCESS', '2024-11-13', '2024-11-17 03:55:47'),
(19, 'Elora Iolana Adhiprawira', 'Elora', 'Adhriprawira', 'X-KUL-1', '62 89656545605', 'BIS-1', 'SISWA', 'checkingQR/19', 'SUCCESS', '2024-11-13', '2024-11-17 03:48:28'),
(20, 'Callvella Vania Herdian', 'Callvella', 'Herdian', 'X-KUL-1', '62 81319044421', 'BIS-1', 'SISWA', 'checkingQR/20', 'SUCCESS', '2024-11-13', '2024-11-17 03:20:12'),
(21, 'Gendis Agnesi Beker', 'Gendis', 'Beker', 'X-KUL-1', '62 81319044421', 'BIS-1', 'SISWA', 'checkingQR/21', 'SUCCESS', '2024-11-13', '2024-11-17 02:51:00'),
(22, 'Marsha Aurene Sujanto', 'Marsha', 'Sujanto', 'X-KUL-1', '62 85624911324', 'BIS-1', 'SISWA', 'checkingQR/22', 'SUCCESS', '2024-11-13', '2024-11-17 03:44:22'),
(23, 'Gifari Adzimatinur', 'Gifari', 'Adzimatinur', 'X-KUL-2', '62 85156515858', 'BIS-1', 'SISWA', 'checkingQR/23', 'SUCCESS', '2024-11-13', '2024-11-17 03:22:42'),
(24, 'Vikky Febrian Maulana Malik', 'Vikky', 'Malik', 'X-KUL-2', '62 83141958121', 'BIS-1', 'SISWA', 'checkingQR/24', 'SUCCESS', '2024-11-13', '2024-11-17 03:54:07'),
(25, 'Dinnara Etvriltiandrie', 'Dinnara', 'Etvriltiandrie', 'X-KUL-2', '62 89675818142', 'BIS-1', 'SISWA', 'checkingQR/25', 'SUCCESS', '2024-11-13', '2024-11-17 03:28:57'),
(26, 'Rirgy Prita Renata', 'Rirgy', 'Renata', 'X-KUL-2', '62 85720269596', 'BIS-1', 'SISWA', 'checkingQR/26', 'SUCCESS', '2024-11-13', '2024-11-17 03:47:05'),
(27, 'Syfa Melya', 'Syfa', 'Melya', 'X-KUL-2', '62 85956776083', 'BIS-1', 'SISWA', 'checkingQR/27', 'SUCCESS', '2024-11-13', '2024-11-17 03:59:47'),
(28, 'Keniesha Lukiman', 'Keneisha', 'Lukiman', 'X-KUL-2', '62 81220087266', 'BIS-1', 'SISWA', 'checkingQR/28', 'SUCCESS', '2024-11-13', '2024-11-17 03:41:06'),
(29, 'Zefanya Christella', 'Zefanya', 'Christella', 'X-KUL-3', '62 85133517287', 'BIS-1', 'SISWA', 'checkingQR/29', 'SUCCESS', '2024-11-13', '2024-11-17 02:49:00'),
(30, 'Merlinda Putri', 'Merlinda', 'Putri', 'X-KUL-3', '62 85759445935', 'BIS-1', 'SISWA', 'checkingQR/30', 'SUCCESS', '2024-11-13', '2024-11-17 04:39:35'),
(31, 'Natila Purwakanti', 'Natila', 'Purwakanti', 'X-KUL-3', '62 831880641', 'BIS-1', 'SISWA', 'checkingQR/31', 'SUCCESS', '2024-11-13', '2024-11-17 04:03:17'),
(32, 'Syifa Kirana Meylani', 'Syifa', 'Meylani', 'X-KUL-3', '62 81312393177', 'BIS-1', 'SISWA', 'checkingQR/32', 'SUCCESS', '2024-11-13', '2024-11-17 03:42:33'),
(33, 'Benaya Gagah Firganta', 'Benaya', 'Firganta', 'X-KUL-3', '62 81914360222', 'BIS-1', 'SISWA', 'checkingQR/33', 'SUCCESS', '2024-11-13', '2024-11-17 03:57:52'),
(34, 'Excellent Stevany', 'Excellent', 'Stevany', 'X-KUL-3', '62 82314601144', 'BIS-1', 'SISWA', 'checkingQR/34', 'SUCCESS', '2024-11-13', '2024-11-17 03:42:08'),
(35, 'Fitri Rohmah Noer Azizah', 'Fitri', 'Azizah', 'X-ULW', '62 85607242041', 'BIS-1', 'SISWA', 'checkingQR/35', 'PREPARE', '2024-11-13', NULL),
(36, 'Latifah Nur Darojah Pitaloka', 'Latifah', 'Pitaloka', 'X-ULW', '62 83145377255', 'BIS-2', 'SISWA', 'checkingQR/36', 'SUCCESS', '2024-11-13', '2024-11-17 03:22:06'),
(37, 'Praisya Lailia Kameela', 'Praisya', 'Kameela', 'X-ULW', '62 83894909029', 'BIS-2', 'SISWA', 'checkingQR/37', 'SUCCESS', '2024-11-13', '2024-11-17 03:18:24'),
(38, 'Desma Adhanisyach', 'Desma', 'Adanisyach', 'X-ULW', '62 87715414911', 'BIS-2', 'SISWA', 'checkingQR/38', 'SUCCESS', '2024-11-13', '2024-11-17 03:04:08'),
(39, 'Juniretta', 'Juniretta', '.', 'X-ULW', '62 89656474630', 'BIS-2', 'SISWA', 'checkingQR/39', 'SUCCESS', '2024-11-13', '2024-11-17 03:18:46'),
(40, 'Vianny Desianty Tanugraha', 'Vianny', 'Tanugraha', 'X-ULW', '62 89668214176', 'BIS-2', 'SISWA', 'checkingQR/40', 'SUCCESS', '2024-11-13', '2024-11-17 03:51:57'),
(41, 'Radisty Kirana Azzahra', 'Radisty', 'Azzahra', 'X-ULW', '62 87837641497', 'BIS-2', 'SISWA', 'checkingQR/41', 'SUCCESS', '2024-11-13', '2024-11-17 04:50:21'),
(42, 'Rizki Moch Akbar Ramadan', 'Rizki', 'Ramadan', 'X-ULW', '62 88971538159', 'BUS-3', 'SISWA', 'checkingQR/42', 'SUCCESS', '2024-11-14', '2024-11-17 03:27:46'),
(43, 'Nadia Lisyawati', 'Nadia', 'Lisyawati', 'X-ULW', '62 81220884670', 'BIS-2', 'SISWA', 'checkingQR/43', 'SUCCESS', '2024-11-13', '2024-11-17 04:22:20'),
(44, 'Regan Edria Artasatya', 'Regan', 'Artasatya', 'X-ULW', '62 85861899293', 'BIS-2', 'SISWA', 'checkingQR/44', 'SUCCESS', '2024-11-13', '2024-11-17 03:27:24'),
(45, 'Aura Cantika Keysha Sadikin', 'Aura', 'Sadikin', 'X-ULW', '62 89676075251', 'BIS-2', 'SISWA', 'checkingQR/45', 'SUCCESS', '2024-11-13', '2024-11-17 04:19:00'),
(46, 'Kafi Muhamad Wijaya', 'Kafi', 'Wijaya', 'X-PH', '62 89527867752', 'BIS-2', 'SISWA', 'checkingQR/46', 'SUCCESS', '2024-11-13', '2024-11-17 03:20:35'),
(47, 'Restu Ibrahimmovic', 'Restu', 'Ibrohimmovic', 'X-PH', '62 8998732035', 'BIS-2', 'SISWA', 'checkingQR/47', 'SUCCESS', '2024-11-13', '2024-11-17 03:10:42'),
(48, 'Rifa Pathurrahman', 'Rifa', 'Pathurrahman', 'X-PH', '62 81546903491', 'BIS-2', 'SISWA', 'checkingQR/48', 'SUCCESS', '2024-11-13', '2024-11-17 03:27:41'),
(49, 'Daviq Nur Muhammad', 'Daviq', 'Muhammad', 'X-PH', '62 8892182730', 'BIS-2', 'SISWA', 'checkingQR/49', 'SUCCESS', '2024-11-13', '2024-11-17 02:40:43'),
(50, 'Rasel Aprilia', 'Rasel', 'Aprilia', 'X-PH', '62 895710933133', 'BIS-2', 'SISWA', 'checkingQR/50', 'SUCCESS', '2024-11-13', '2024-11-17 03:50:31'),
(51, 'Shafiyah Jasmine Jannati', 'Shafiyah', 'Jannati', 'X-PH', '62 85820028592', 'BIS-2', 'SISWA', 'checkingQR/51', 'SUCCESS', '2024-11-13', '2024-11-17 03:41:54'),
(52, 'Joan Carmen Mattea Damanik', 'Joan', 'Damanik', 'X-KUL-1', '62 8111896118', 'BIS-2', 'SISWA', 'checkingQR/52', 'SUCCESS', '2024-11-13', '2024-11-17 03:03:45'),
(53, 'Syachrani Putri Nurrakhman', 'Syachrani', 'Nurrakman', 'X-KUL-1', '62 85133626506', 'BIS-2', 'SISWA', 'checkingQR/53', 'SUCCESS', '2024-11-13', '2024-11-17 03:23:00'),
(54, 'Jo,Jovanca Veronica', 'Jo,Jovanca', 'Veronica', 'X-KUL-1', '62 82219601292', 'BIS-2', 'SISWA', 'checkingQR/54', 'SUCCESS', '2024-11-13', '2024-11-17 03:37:37'),
(55, 'Kayla East Majid', 'Kayla', 'Majid', 'X-KUL-1', '62 81213589538', 'BIS-2', 'SISWA', 'checkingQR/55', 'SUCCESS', '2024-11-13', '2024-11-17 03:29:37'),
(56, 'Ghirly Oktaniara Sanjaya', 'Ghirly', 'Sanjaya', 'X-KUL-1', '62 85624813103', 'BIS-2', 'SISWA', 'checkingQR/56', 'SUCCESS', '2024-11-13', '2024-11-17 04:02:32'),
(57, 'Revan Fauzi ', 'Revan', 'Fauzi', 'X-KUL-1', '62 85179931814', 'BIS-2', 'SISWA', 'checkingQR/57', 'SUCCESS', '2024-11-13', '2024-11-17 03:29:38'),
(58, 'Rara Marina Anindya', 'Rara', 'anindya', 'X-KUL-1', '62 83851022584', 'BIS-2', 'SISWA', 'checkingQR/58', 'SUCCESS', '2024-11-13', '2024-11-17 03:33:45'),
(59, 'Nabila Maulida Azahra', 'Nabila', 'Azahra', 'X-KUL-2', '62 83872096447', 'BIS-2', 'SISWA', 'checkingQR/59', 'SUCCESS', '2024-11-13', '2024-11-17 03:47:24'),
(60, 'Dricyla Derin Supriatna', 'Dricyla', 'Supriatna', 'X-PH', '62 87861710786', 'BIS-2', 'SISWA', 'checkingQR/60', 'SUCCESS', '2024-11-13', '2024-11-17 03:59:13'),
(61, 'Naurah Khalilah Rachman Sainan', 'Naurah', 'Sainan', 'X-PH', '62 881022481937', 'BIS-2', 'SISWA', 'checkingQR/61', 'SUCCESS', '2024-11-13', '2024-11-17 03:41:29'),
(62, 'Carla Maharani Nugroho', 'Carla', 'Nugroho', 'X-KUL-2', '62 87875426326', 'BIS-2', 'SISWA', 'checkingQR/62', 'SUCCESS', '2024-11-13', '2024-11-17 03:47:04'),
(63, 'M. Abyaz Ramadhan', 'Muhammad', 'Ramadhan', 'X-KUL-2', '62 81383430410', 'BIS-2', 'SISWA', 'checkingQR/63', 'SUCCESS', '2024-11-13', '2024-11-17 02:44:24'),
(64, 'Meyko Tonsa Hamsjah', 'Meyko', 'Hamsjah', 'X-KUL-2', '62 82126697989', 'BIS-2', 'SISWA', 'checkingQR/64', 'SUCCESS', '2024-11-13', '2024-11-17 03:30:00'),
(65, 'Ciara Putri Stepani', 'Ciara', 'Stepani', 'X-PH', '62 82112728035', 'BIS-2', 'SISWA', 'checkingQR/65', 'SUCCESS', '2024-11-13', '2024-11-17 03:45:36'),
(66, 'Annisa Augustiani Maharani', 'Annisa ', 'Maharani', 'X-KUL-3', '62 83816565102', 'BIS-2', 'SISWA', 'checkingQR/66', 'SUCCESS', '2024-11-13', '2024-11-17 03:17:57'),
(67, 'Keyla Permatasari', 'Keyla ', 'Permatasari', 'X-KUL-3', '62 85781291053', 'BIS-2', 'SISWA', 'checkingQR/67', 'SUCCESS', '2024-11-13', '2024-11-17 04:00:21'),
(68, 'Ancilla Laryssa Setyadi', 'Ancilla', 'Setyadi', 'X-KUL-3', '62 82120858749', 'BIS-2', 'SISWA', 'checkingQR/68', 'SUCCESS', '2024-11-13', '2024-11-17 03:25:28'),
(69, 'Joan Jacinta Cristian', 'Joan', 'Jacinta', 'X-KUL-3', '62 85603452755', 'BIS-2', 'SISWA', 'checkingQR/69', 'SUCCESS', '2024-11-13', '2024-11-17 03:44:55'),
(70, 'Alfi  Nurdiansyah', 'Alfi ', 'Nurdiansyah', 'X-ULW', '62 82116621891', 'BIS-3', 'SISWA', 'checkingQR/70', 'SUCCESS', '2024-11-13', '2024-11-17 03:24:51'),
(71, 'Alfitra Salam Sepihara', 'Alfitra', 'Sepihara', 'X-ULW', '62 81218586548', 'BIS-3', 'SISWA', 'checkingQR/71', 'SUCCESS', '2024-11-13', '2024-11-17 03:17:23'),
(72, 'Raisha Fathan Moresby', 'Raisya', 'Moresby', 'X-ULW', '62 89699662647', 'BIS-3', 'SISWA', 'checkingQR/72', 'SUCCESS', '2024-11-13', '2024-11-17 03:09:27'),
(73, 'Daffa argya Gumilar', 'Daffa', 'Gumilar', 'X-ULW', '62 8130540733', 'BIS-3', 'SISWA', 'checkingQR/73', 'SUCCESS', '2024-11-13', '2024-11-17 02:47:35'),
(74, 'Haikal Pratama Wiguna', 'Haikal', 'Wiguna', 'X-ULW', '62 85180626665', 'BIS-3', 'SISWA', 'checkingQR/74', 'SUCCESS', '2024-11-13', '2024-11-17 03:31:33'),
(75, 'Aurelia Nikita', 'Aurelia', 'Nikita', 'X-ULW', '62 81912895108', 'BIS-3', 'SISWA', 'checkingQR/75', 'SUCCESS', '2024-11-13', '2024-11-17 03:15:07'),
(76, 'Syarifah Aqilah Lubina', 'Syarifah', 'Lubina', 'X-ULW', '62 85604213796', 'BIS-3', 'SISWA', 'checkingQR/76', 'SUCCESS', '2024-11-14', '2024-11-17 03:04:06'),
(77, 'Zulaika Adibah Andriansyah', 'Zulaika', 'Andriansyah', 'X-ULW', '62 81285052998', 'BIS-3', 'SISWA', 'checkingQR/77', 'SUCCESS', '2024-11-13', '2024-11-17 03:22:11'),
(78, 'Devin Andriani', 'Devin', 'Andriani', 'X-ULW', '62 85723576277', 'BIS-3', 'SISWA', 'checkingQR/78', 'SUCCESS', '2024-11-13', '2024-11-17 02:17:52'),
(80, 'Yuki Maharaya Muhamad Saputra', 'Yuki', 'Saputra', 'X-PH', '62 882001063463', 'BIS-3', 'SISWA', 'checkingQR/80', 'SUCCESS', '2024-11-13', '2024-11-17 02:41:02'),
(81, 'Muhammad Rizki', 'Muhammad', 'Rizki', 'X-PH', '62 81289542176', 'BIS-3', 'SISWA', 'checkingQR/81', 'SUCCESS', '2024-11-13', '2024-11-17 03:35:45'),
(82, 'Zidan Ibrahim Ramadhan', 'Zidan', 'Ramadhan', 'X-PH', '62 83863971083', 'BIS-3', 'SISWA', 'checkingQR/82', 'SUCCESS', '2024-11-13', '2024-11-17 03:21:13'),
(83, 'Aliq Putra Mulfidan', 'Aliq', 'Milfidan', 'X-PH', '62 83140975997', 'BIS-3', 'SISWA', 'checkingQR/83', 'SUCCESS', '2024-11-13', '2024-11-17 02:42:38'),
(84, 'Markus Julian Panjaitan', 'Markus', 'Panjaitan', 'X-PH', '62 82121928022', 'BIS-3', 'SISWA', 'checkingQR/84', 'SUCCESS', '2024-11-13', '2024-11-17 02:54:31'),
(85, 'Muhammad Fikri Khadafi', 'Muhammad', 'Khadafi', 'X-PH', '62 83808032509', 'BIS-3', 'SISWA', 'checkingQR/85', 'SUCCESS', '2024-11-13', '2024-11-17 02:39:19'),
(86, 'Rendy Arif Maulana', 'Rendy', 'Maulana', 'X-PH', '62 87813750191', 'BIS-3', 'SISWA', 'checkingQR/86', 'SUCCESS', '2024-11-13', '2024-11-17 03:10:16'),
(87, 'Zahran Arrasyid Suryadi', 'Zahran', 'Suryadi', 'X-KUL-1', '62 83861691615', 'BIS-3', 'SISWA', 'checkingQR/87', 'SUCCESS', '2024-11-13', '2024-11-17 02:17:09'),
(88, 'Rafhi Adzani Sutisna', 'Rafhi', 'Sutisna', 'X-KUL-1', '62 85157440359', 'BIS-3', 'SISWA', 'checkingQR/88', 'SUCCESS', '2024-11-13', '2024-11-17 03:30:51'),
(89, 'Dika Sanjaya', 'Dika', 'Sanjaya', 'X-KUL-1', '62 83101615256', 'BIS-3', 'SISWA', 'checkingQR/89', 'SUCCESS', '2024-11-13', '2024-11-17 02:28:17'),
(90, 'Ramzi Adnan Syah', 'Ramzi', 'Syah', 'X-KUL-1', '62 81312688191', 'BIS-3', 'SISWA', 'checkingQR/90', 'SUCCESS', '2024-11-13', '2024-11-17 02:57:41'),
(91, 'Muhamad Ridho', 'Muhamad', 'Ridho', 'X-KUL-1', '62 8818350592', 'BIS-3', 'SISWA', 'checkingQR/91', 'SUCCESS', '2024-11-13', '2024-11-17 02:23:31'),
(92, 'Muhammad Hadyan Rakha Kaindra', 'Muhammad', 'Kaindra', 'X-KUL-1', '62 88971903348', 'BIS-3', 'SISWA', 'checkingQR/92', 'SUCCESS', '2024-11-13', '2024-11-17 03:20:40'),
(93, 'Faurallyno Radithya Rivaldi', 'Faurallyno', 'Rivaldi', 'X-KUL-2', '62 859106958955', 'BIS-3', 'SISWA', 'checkingQR/93', 'SUCCESS', '2024-11-13', '2024-11-17 03:30:37'),
(94, 'Fattan Albarsha Kurniawan', 'Fattan', 'Kurniawan', 'X-KUL-2', '62 81221851732', 'BIS-3', 'SISWA', 'checkingQR/94', 'SUCCESS', '2024-11-13', '2024-11-17 03:02:51'),
(95, 'Abdul Raffi Nur Alim', 'Abdul', 'Alim', 'X-KUL-2', '62 82332074663', 'BIS-3', 'SISWA', 'checkingQR/95', 'SUCCESS', '2024-11-13', '2024-11-17 02:57:58'),
(96, 'Zaki Naufaldi', 'Zaki', 'Naufaldi', 'X-KUL-2', '62 881022789064', 'BIS-3', 'SISWA', 'checkingQR/96', 'SUCCESS', '2024-11-13', '2024-11-17 03:13:22'),
(97, 'Muhammad Isa', 'Muhammad', 'Isa', 'X-KUL-2', '62 8112381603', 'BIS-3', 'SISWA', 'checkingQR/97', 'SUCCESS', '2024-11-13', '2024-11-17 03:50:28'),
(98, 'Banyu Segara', 'Banyu', 'Segara', 'X-KUL-2', '62 812239011197', 'BIS-3', 'SISWA', 'checkingQR/98', 'SUCCESS', '2024-11-13', '2024-11-17 03:53:43'),
(99, 'Muhammad Nur Putra Maulana Sarapung', 'Muhammad', 'Sarapung', 'X-KUL-3', '62 82119814610', 'BIS-3', 'SISWA', 'checkingQR/99', 'SUCCESS', '2024-11-13', '2024-11-17 02:40:15'),
(100, 'Giyara Teges Catur Wardhana', 'Giyara', 'Wardhana', 'X-KUL-3', '62 81218014345', 'BIS-3', 'SISWA', 'checkingQR/100', 'SUCCESS', '2024-11-13', '2024-11-17 02:37:14'),
(101, 'Gaza Yasin Habibie', 'Gaza', 'Habibie', 'X-KUL-3', '62 81218014345', 'BIS-3', 'SISWA', 'checkingQR/101', 'SUCCESS', '2024-11-13', '2024-11-17 02:40:31'),
(102, 'Arya Surya Syah Putra', 'Arya', 'Putra', 'X-KUL-3', '62 842202802', 'BIS-3', 'SISWA', 'checkingQR/102', 'SUCCESS', '2024-11-13', '2024-11-17 03:01:42'),
(103, 'Caven Miftahul Fatih', 'Carven', 'Fatih', 'X-KUL-3', '62 87722976108', 'BIS-3', 'SISWA', 'checkingQR/103', 'SUCCESS', '2024-11-13', '2024-11-17 04:17:05'),
(104, 'Rizky Arvi Emnur', 'Rizky', 'Emnur', 'X-KUL-3', '62 895326695433', 'BIS-3', 'SISWA', 'checkingQR/104', 'SUCCESS', '2024-11-13', '2024-11-17 04:05:25'),
(105, 'Efra Baryza Dirgantara', 'Efra', 'Dirgantara', 'X-KUL-3', '62 81901204449', 'BIS-3', 'SISWA', 'checkingQR/105', 'SUCCESS', '2024-11-13', '2024-11-17 02:58:06'),
(106, 'Latisya Bilragheya', 'Latisya', 'Bilragheya', 'X-ULW', '62 81211780602', 'BIS-4', 'SISWA', 'checkingQR/106', 'SUCCESS', '2024-11-13', '2024-11-17 03:36:19'),
(107, 'Fani Dwi Anggraeni', 'Fani', 'Anggraeni', 'X-ULW', '62 81222674496', 'BIS-4', 'SISWA', 'checkingQR/107', 'SUCCESS', '2024-11-13', '2024-11-17 03:20:08'),
(108, 'Renandhita Triana Dewy', 'Renandhita', 'Dewy', 'X-ULW', '62 85861899293', 'BIS-4', 'SISWA', 'checkingQR/108', 'SUCCESS', '2024-11-13', '2024-11-17 03:35:14'),
(109, 'Mutiara Chairunnisa', 'Mutiara', 'Chairunnisa', 'X-ULW', '62 85780577483', 'BIS-4', 'SISWA', 'checkingQR/109', 'SUCCESS', '2024-11-13', '2024-11-17 03:37:06'),
(110, 'Zahra Fatimah Alamsyah', 'Zahra', 'Alamsyah', 'X-ULW', '62 88210261970', 'BIS-4', 'SISWA', 'checkingQR/110', 'SUCCESS', '2024-11-13', '2024-11-17 03:41:36'),
(111, 'Qanita Najiyah Raifa', 'Qanita', 'Raifa', 'X-ULW', '62 87861822313', 'BIS-4', 'SISWA', 'checkingQR/111', 'SUCCESS', '2024-11-13', '2024-11-17 04:02:11'),
(112, 'Farrel Achsa Fahridzi', 'Farrel', 'Fahridzi', 'X-ULW', '62 881023411016', 'BIS-4', 'SISWA', 'checkingQR/112', 'SUCCESS', '2024-11-13', '2024-11-17 02:45:43'),
(113, 'Emmanuelo Hizkia Goeitama', 'Emmanuelo', 'Goeitama', 'X-ULW', '62 82118009383', 'BIS-4', 'SISWA', 'checkingQR/113', 'SUCCESS', '2024-11-13', '2024-11-17 04:08:15'),
(114, 'Keisha Isnaeni Izzati', 'Keisha', 'Izzati', 'X-KUL-2', '62 82118682258', 'BIS-4', 'SISWA', 'checkingQR/114', 'SUCCESS', '2024-11-13', '2024-11-17 03:54:32'),
(115, 'Safira Farah Putri Salsabila', 'Safira', 'Salsabila', 'X-KUL-2', '62 89509557735', 'BIS-4', 'SISWA', 'checkingQR/115', 'SUCCESS', '2024-11-13', '2024-11-17 03:41:07'),
(116, 'Zahra Indrie Rhesiana', 'Zahra', 'Rhesiana', 'X-KUL-3', '62 88218701197', 'BIS-4', 'SISWA', 'checkingQR/116', 'SUCCESS', '2024-11-13', '2024-11-17 03:15:22'),
(117, 'Revy Syalwa Alkaila', 'Revy', 'Alkaila', 'X-PH', '62 8998732035', 'BIS-4', 'SISWA', 'checkingQR/117', 'SUCCESS', '2024-11-13', '2024-11-17 03:53:31'),
(118, 'Nadira Satoe Juliantika', 'Nadira', 'Juliantika', 'X-PH', '62 87897018582', 'BIS-4', 'SISWA', 'checkingQR/118', 'SUCCESS', '2024-11-13', '2024-11-17 03:58:53'),
(119, 'Vanya Aisha Mathariany Wiraputri', 'Vanya', 'Wiraputri', 'X-PH', '62 85861008669', 'BIS-4', 'SISWA', 'checkingQR/119', 'SUCCESS', '2024-11-13', '2024-11-17 03:18:28'),
(120, 'Vedi Attaya Widyadana', 'Vedi', 'Widyadana', 'X-KUL-1', '62 82352065930', 'BIS-4', 'SISWA', 'checkingQR/120', 'SUCCESS', '2024-11-13', '2024-11-17 02:17:58'),
(121, 'Fahra Dila Citra', 'Fahra', 'Citra', 'X-KUL-1', '62 81977993062', 'BIS-4', 'SISWA', 'checkingQR/121', 'SUCCESS', '2024-11-13', '2024-11-17 04:01:04'),
(122, 'Jasmine Almira Haifa', 'Jasmine', 'Haifa', 'X-KUL-1', '62 82229899722', 'BIS-4', 'SISWA', 'checkingQR/122', 'SUCCESS', '2024-11-13', '2024-11-17 04:09:55'),
(123, 'Nabil Ariz Valentino Nauli Simatupang', 'Nabil', 'Simatupang', 'X-KUL-1', '62 85370479615', 'BIS-4', 'SISWA', 'checkingQR/123', 'SUCCESS', '2024-11-13', '2024-11-17 03:28:22'),
(124, 'Banyu Azkaa Hadiansyah', 'Banyu', 'Hadiansyah', 'X-KUL-1', '62 88229046801', 'BIS-4', 'SISWA', 'checkingQR/124', 'SUCCESS', '2024-11-13', '2024-11-17 03:27:08'),
(125, 'Bintang Hardjadinata Kusnandar', 'Bintang', 'Kusnandar', 'X-KUL-1', '62 85158001874', 'BIS-4', 'SISWA', 'checkingQR/125', 'SUCCESS', '2024-11-13', '2024-11-17 03:28:16'),
(126, 'Parisya Adetha Balqis', 'Parisya', 'Balqis', 'X-KUL-2', '62 87734795482', 'BIS-4', 'SISWA', 'checkingQR/126', 'SUCCESS', '2024-11-13', '2024-11-17 03:29:13'),
(127, 'Mutiara Jasmine Mailindha', 'Mutiara', 'Mailindha', 'X-KUL-2', '62 83848994390', 'BIS-4', 'SISWA', 'checkingQR/127', 'SUCCESS', '2024-11-13', '2024-11-17 03:57:26'),
(128, 'Raisha Janeeta Putrianto', 'Raisha', 'Putrianto', 'X-KUL-2', '62 85720269596', 'BIS-4', 'SISWA', 'checkingQR/128', 'SUCCESS', '2024-11-13', '2024-11-17 02:52:43'),
(129, 'Ester Ursula Kahanaya Ompusunggu', 'Ester', 'Ompusunggu', 'X-KUL-2', '62 82120167394', 'BIS-4', 'SISWA', 'checkingQR/129', 'SUCCESS', '2024-11-13', '2024-11-17 03:40:00'),
(130, 'Jessy Aishka Aquinny', 'Jessy', 'Aquinny', 'X-KUL-2', '62 88802016129', 'BIS-4', 'SISWA', 'checkingQR/130', 'SUCCESS', '2024-11-13', '2024-11-17 03:34:52'),
(131, 'Alifkha Embun Dwiningrum', 'Alifkha', 'Dwiningrum', 'X-KUL-2', '62 88200164833', 'BIS-4', 'SISWA', 'checkingQR/131', 'SUCCESS', '2024-11-13', '2024-11-17 03:03:09'),
(132, 'Rafael Ferdiansyah', 'Rafael', 'Ferdiansyah', 'X-KUL-2', '62 83863810623', 'BIS-4', 'SISWA', 'checkingQR/132', 'SUCCESS', '2024-11-13', '2024-11-17 03:12:33'),
(133, 'Fernisya Cameillia Putri', 'Fernisya', 'Putri', 'X-KUL-3', '62 82262888189', 'BIS-4', 'SISWA', 'checkingQR/133', 'SUCCESS', '2024-11-13', '2024-11-17 02:44:45'),
(134, 'Aulia Salshabila Rhamadani', 'Aulia', 'Rhamadani', 'X-KUL-3', '62 87816663121', 'BIS-4', 'SISWA', 'checkingQR/134', 'SUCCESS', '2024-11-13', '2024-11-17 03:15:40'),
(135, 'Muhammad Fabian Juliandipura', 'Muhammad', 'Juliandipura', 'X-KUL-3', '62 82295684254', 'BIS-4', 'SISWA', 'checkingQR/135', 'SUCCESS', '2024-11-13', '2024-11-17 02:53:52'),
(136, 'Krisna Maulana Bagus Satrio', 'Krisna', 'Satrio', 'X-KUL-3', '62 83109882078', 'BIS-4', 'SISWA', 'checkingQR/136', 'SUCCESS', '2024-11-13', '2024-11-17 03:35:19'),
(137, 'Sangkan Pranawa', 'Sangkan', 'Pranawa', 'X-KUL-3', '62 83109882078', 'BIS-4', 'SISWA', 'checkingQR/137', 'SUCCESS', '2024-11-13', '2024-11-17 03:35:09'),
(138, 'Rafael Helza Dillian', 'Rafael', 'Dillian', 'X-KUL-3', '62 882001229512', 'BIS-4', 'SISWA', 'checkingQR/138', 'SUCCESS', '2024-11-13', '2024-11-17 03:13:26'),
(139, 'Jasmine Maharani', 'Jasmine', 'Maharani', 'X-KUL-3', '62 813202521', 'BIS-4', 'SISWA', 'checkingQR/139', 'SUCCESS', '2024-11-13', '2024-11-17 02:29:31'),
(140, 'Eko Agung Prakoso,S.Kom', 'Eko', 'Prakoso', '-', '62 82217898917', '-', 'GURU', 'checkingQR/140', 'SUCCESS', '2024-11-13', '2024-11-17 02:41:00'),
(141, 'Qoyimatul Zawuziah, S.Pd', 'Qoyimatul', 'Zawuziah', '-', '62 82218812005', '-', 'GURU', 'checkingQR/141', 'SUCCESS', '2024-11-13', '2024-11-17 02:20:21'),
(142, 'Muhammad Resnu Wildan Imani S.Pd', 'Muhammad', 'Imani', '-', '62 85862120647', '-', 'GURU', 'checkingQR/142', 'SUCCESS', '2024-11-13', '2024-11-17 03:53:07'),
(143, 'E.M. Yudha Bani Alam, S.Par', 'Yudha', 'Alam', '-', '62 89657333316', '-', 'GURU', 'checkingQR/143', 'SUCCESS', '2024-11-13', '2024-11-17 02:20:14'),
(144, 'Delifya Bunga Ayudia S.Pd', 'Delifya', 'ayudia', '-', '62 89510264438', '-', 'GURU', 'checkingQR/144', 'SUCCESS', '2024-11-13', '2024-11-17 04:20:47'),
(145, 'Calm Djunel Putra, S.S, M.Pd', 'Calm', 'Putra', '-', '62 8115011348', '-', 'GURU', 'checkingQR/145', 'SUCCESS', '2024-11-13', '2024-11-17 03:55:19'),
(146, 'Lida Nur Ratuningsih M.Pd', 'Lida ', 'Ratuningsih', '-', '62 82120984543', '-', 'GURU', 'checkingQR/146', 'SUCCESS', '2024-11-13', '2024-11-17 04:25:20'),
(147, 'kadhafiah Hilmi,S.Pd.,M.M', 'Kadhafiah', 'Hilmi', '-', '62 8122119657', '-', 'GURU', 'checkingQR/147', 'SUCCESS', '2024-11-17', NULL),
(148, 'Kusuma Nugraha S.Pd', 'Kusuma', 'Nugraha', '-', '62 81323239927', '-', 'GURU', 'checkingQR/148', 'PREPARE', '2024-11-13', NULL),
(149, 'Rohmat Rohiman S.Par.,Gr', 'Rohmat', 'Rohiman', '-', '62 82120206095', '-', 'GURU', 'checkingQR/149', 'SUCCESS', '2024-11-13', '2024-11-17 04:14:20'),
(150, 'Vina Maulanisari Sugandi S.Pd', 'Vina', 'Sugandi', '-', '62 8122081467', '-', 'GURU', 'checkingQR/150', 'SUCCESS', '2024-11-13', '2024-11-17 04:20:58'),
(151, 'Hendra Mulyana S.Pd', 'Hendra ', 'Mulyana', '-', '62 816617407', '-', 'GURU', 'checkingQR/151', 'SUCCESS', '2024-11-13', '2024-11-17 04:28:17'),
(152, 'Ai Inggit Yulinar S.Ak', 'Ai', 'Yulinar', '-', '62 81394596409', '-', 'GURU', 'checkingQR/152', 'SUCCESS', '2024-11-13', '2024-11-17 04:20:27'),
(153, 'Wawan, S.kom, M.T', 'Wawan', '.', '-', '6282117081771', '-', 'GURU', 'checkingQR/153', 'SUCCESS', '2024-11-13', '2024-11-17 02:52:43'),
(154, 'Airin Damayanti Utami', 'Airin ', 'Utami', 'XI-PAR', '62 89528927507', '-', 'SISWA', 'checkingQR/154', 'SUCCESS', '2024-11-13', '2024-11-17 02:11:29'),
(155, 'Andre US Wijaya', 'Andre', 'Wijaya', 'XI-PAR', '62 81220413076', '-', 'SISWA', 'checkingQR/155', 'SUCCESS', '2024-11-13', '2024-11-17 02:11:53'),
(156, 'Jenni Christina', 'Jenni', 'Christina', 'XI-PAR', '62 82116907689', '-', 'SISWA', 'checkingQR/156', 'SUCCESS', '2024-11-13', '2024-11-17 02:12:29'),
(157, 'Christian Nevio Handani', 'Christian', 'Handani', 'XI-PAR', '62 83873949977', '-', 'SISWA', 'checkingQR/157', 'SUCCESS', '2024-11-13', '2024-11-17 02:10:39'),
(158, 'Muhammad Farrel Putra Hadiana', 'Muhammad ', 'Hadiana', 'XI-PAR', '62 82113705158', '-', 'SISWA', 'checkingQR/158', 'SUCCESS', '2024-11-13', '2024-11-17 02:11:13'),
(159, 'Rifaldi Febriansyah', 'Rifaldi', 'Febriansyah', 'XI-PAR', '62 82126713921', '-', 'SISWA', 'checkingQR/159', 'SUCCESS', '2024-11-13', '2024-11-17 02:12:00'),
(160, 'Marsha Aqila Zahra ', 'Marsha', 'Zahra', 'XI-PAR', '62 87848164896', '-', 'SISWA', 'checkingQR/160', 'SUCCESS', '2024-11-13', '2024-11-17 02:18:23'),
(161, 'Sefrina Salsabila Hasna', 'Sefrina ', 'Salsabila', 'XI-PAR', '62 82219260714', '-', 'SISWA', 'checkingQR/161', 'SUCCESS', '2024-11-13', '2024-11-17 02:18:17'),
(162, 'Siti Nurjanah Sri Nengsih', 'Siti', 'Nengsih', 'XI-PAR', '62 82218591356', '-', 'SISWA', 'checkingQR/162', 'SUCCESS', '2024-11-13', '2024-11-17 02:18:39'),
(163, 'Ruby Nur Aprilia', 'Ruby', 'Aprilia', 'XI-PAR', '62 85722320608', '-', 'SISWA', 'checkingQR/163', 'SUCCESS', '2024-11-13', '2024-11-17 02:12:11'),
(164, 'SMK Pariwisata Telkom', 'SMK', 'Pariwisata Telkom', '-', '2131321242141', '-', 'SISWA', 'checkingQR/164', 'PREPARE', '2024-11-13', NULL),
(166, 'Ardi Ferdiansyah', 'Ardi', 'Ferdiansyah', 'X-PH', '85959151521', 'BUS-2', 'SISWA', 'checkingQR/166', 'SUCCESS', '2024-11-14', '2024-11-17 03:03:34');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `peserta_master`
--
ALTER TABLE `peserta_master`
  MODIFY `id_peserta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
