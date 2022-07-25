-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2022 at 04:50 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `websaw_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `calculate`
--

CREATE TABLE `calculate` (
  `id` int(11) NOT NULL,
  `data_alternatif_id` int(11) DEFAULT NULL,
  `topic_id` int(11) DEFAULT NULL,
  `criteria_id` int(11) DEFAULT NULL,
  `sub_kriteria_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `calculate`
--

INSERT INTO `calculate` (`id`, `data_alternatif_id`, `topic_id`, `criteria_id`, `sub_kriteria_id`) VALUES
(1, 1, 3, 1, 4),
(2, 1, 3, 2, 7),
(3, 1, 3, 3, 3),
(4, 1, 3, 4, 5),
(5, 1, 3, 5, 6),
(6, 2, 3, 1, 15),
(7, 2, 3, 2, 7),
(8, 2, 3, 3, 6),
(9, 2, 3, 4, 17),
(10, 2, 3, 5, 13),
(29, 8, 3, 1, 8),
(30, 8, 3, 2, 11),
(31, 8, 3, 3, 4),
(32, 8, 3, 4, 16),
(33, 8, 3, 5, 13),
(34, 1, 1, 1, 1),
(35, 1, 1, 2, 7),
(36, 1, 1, 3, 2),
(37, 1, 1, 4, 5),
(38, 1, 1, 5, 3),
(39, 3, 3, 1, 9),
(40, 3, 3, 2, 11),
(41, 3, 3, 3, 4),
(42, 3, 3, 4, 16),
(43, 3, 3, 5, 13),
(108, 5, 3, 1, 15),
(109, 5, 3, 2, 12),
(110, 5, 3, 3, 4),
(111, 5, 3, 4, 16),
(112, 5, 3, 5, 13),
(113, 4, 3, 1, 8),
(114, 4, 3, 2, 10),
(115, 4, 3, 3, 6),
(116, 4, 3, 4, 16),
(117, 4, 3, 5, 13);

-- --------------------------------------------------------

--
-- Table structure for table `criteria`
--

CREATE TABLE `criteria` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `sts` enum('Cost','Benefit') DEFAULT NULL,
  `bobot` float DEFAULT NULL,
  `cond` int(10) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `criteria`
--

INSERT INTO `criteria` (`id`, `name`, `sts`, `bobot`, `cond`) VALUES
(1, 'Waktu pengiriman', 'Cost', 5, 1),
(2, 'Jarak', 'Benefit', 7, 1),
(3, 'Biaya', 'Cost', 8, 1),
(4, 'Armada', 'Cost', 9, 1),
(5, 'Garansi', 'Benefit', 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `data_alternatif`
--

CREATE TABLE `data_alternatif` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `cond` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_alternatif`
--

INSERT INTO `data_alternatif` (`id`, `name`, `cond`) VALUES
(1, 'A1', 1),
(2, 'A2', 1),
(3, 'A3', 1),
(4, 'A4', 1),
(5, 'A5', 1),
(6, 'A6', 1),
(7, 'A7', 1),
(8, 'A8', 1),
(9, 'A9', 1);

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `id` int(11) NOT NULL,
  `topic_id` int(11) DEFAULT NULL,
  `data_alternatif_id` int(11) DEFAULT NULL,
  `hasil` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`id`, `topic_id`, `data_alternatif_id`, `hasil`) VALUES
(1, 3, 1, 12),
(2, 3, 2, 9.23),
(3, 3, 3, 11.5),
(4, 3, 4, 10.34),
(5, 3, 5, 7.65),
(6, 3, 8, 15.41);

-- --------------------------------------------------------

--
-- Table structure for table `sub_kriteria`
--

CREATE TABLE `sub_kriteria` (
  `id` int(11) NOT NULL,
  `criteria_id` int(11) DEFAULT NULL,
  `score` float DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `cond` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_kriteria`
--

INSERT INTO `sub_kriteria` (`id`, `criteria_id`, `score`, `description`, `cond`) VALUES
(1, 1, 2, 'Lambat', 1),
(2, 3, 6, 'Sedang', 1),
(3, 5, 12, 'Selamanya', 1),
(4, 3, 5, 'Mahal', 1),
(5, 4, 12, 'Darat', 1),
(6, 3, 11, 'Murah', 1),
(7, 2, 10, 'Jawa dan Bali', 1),
(8, 1, 3, 'Cepat', 1),
(9, 1, 4, 'Sangat cepat', 1),
(10, 2, 3, 'Kecamatan', 1),
(11, 2, 20, 'Se-indonesia', 1),
(12, 2, 15, 'Sumatera', 1),
(13, 5, 15, '6 Bulan', 1),
(14, 5, 10, '4 Minggu', 1),
(15, 1, 2, 'Sangat Lambat', 1),
(16, 4, 13, 'Laut udara', 1),
(17, 4, 5, 'Udara', 1);

-- --------------------------------------------------------

--
-- Table structure for table `topic`
--

CREATE TABLE `topic` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `cond` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `topic`
--

INSERT INTO `topic` (`id`, `name`, `cond`) VALUES
(1, 'Menentukan jodoh terbaik', 1),
(2, 'Menentukan waktu makan terbaik', 1),
(3, 'Menentukan jadwal tidur yang baik', 1),
(4, 'Menentukan Paket terbaik', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calculate`
--
ALTER TABLE `calculate`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_alternatif_id` (`data_alternatif_id`),
  ADD KEY `topic_id` (`topic_id`),
  ADD KEY `criteria_id` (`criteria_id`),
  ADD KEY `sub_kriteria_id` (`sub_kriteria_id`);

--
-- Indexes for table `criteria`
--
ALTER TABLE `criteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_alternatif`
--
ALTER TABLE `data_alternatif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topic_id` (`topic_id`),
  ADD KEY `data_alternatif_id` (`data_alternatif_id`);

--
-- Indexes for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `criteria_id` (`criteria_id`);

--
-- Indexes for table `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `calculate`
--
ALTER TABLE `calculate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `criteria`
--
ALTER TABLE `criteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `data_alternatif`
--
ALTER TABLE `data_alternatif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `topic`
--
ALTER TABLE `topic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `calculate`
--
ALTER TABLE `calculate`
  ADD CONSTRAINT `calculate_ibfk_1` FOREIGN KEY (`data_alternatif_id`) REFERENCES `data_alternatif` (`id`),
  ADD CONSTRAINT `calculate_ibfk_2` FOREIGN KEY (`topic_id`) REFERENCES `topic` (`id`),
  ADD CONSTRAINT `calculate_ibfk_3` FOREIGN KEY (`criteria_id`) REFERENCES `criteria` (`id`),
  ADD CONSTRAINT `calculate_ibfk_4` FOREIGN KEY (`sub_kriteria_id`) REFERENCES `sub_kriteria` (`id`);

--
-- Constraints for table `result`
--
ALTER TABLE `result`
  ADD CONSTRAINT `result_ibfk_1` FOREIGN KEY (`topic_id`) REFERENCES `topic` (`id`),
  ADD CONSTRAINT `result_ibfk_2` FOREIGN KEY (`data_alternatif_id`) REFERENCES `data_alternatif` (`id`);

--
-- Constraints for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  ADD CONSTRAINT `sub_kriteria_ibfk_1` FOREIGN KEY (`criteria_id`) REFERENCES `criteria` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
