-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2022 at 08:37 AM
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
(1, 'sindy', 'Cost', NULL, 1),
(2, 'ibrahim', 'Benefit', NULL, 1),
(3, 'sil', 'Cost', NULL, 1),
(4, 'Membaca buku', NULL, NULL, 1),
(5, 'Membaca buku', NULL, NULL, 1);

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
(1, 'sindy', 1),
(2, 'ibrahim', 1),
(3, 'Maulana', 1),
(4, 'frans', 1),
(5, 'eewr', 1),
(6, 'traass', 1),
(7, 'eew', 1);

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
(1, 1, 3, 'ini ini in', NULL),
(2, 3, 6, 'kjlasdkjlkjladsgjkldgs', NULL);

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
(1, 'ibrahim', 1),
(2, 'ibrahim', 1),
(3, 'Membaca buku', 1),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `criteria`
--
ALTER TABLE `criteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `data_alternatif`
--
ALTER TABLE `data_alternatif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `topic`
--
ALTER TABLE `topic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
