-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2022 at 11:03 AM
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
-- Database: `saw_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `criteria`
--

CREATE TABLE `criteria` (
  `Id` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Score` int(11) DEFAULT NULL,
  `Bobot` int(255) DEFAULT NULL,
  `Sts` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `Id` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `detail_criteria`
--

CREATE TABLE `detail_criteria` (
  `Id` int(11) NOT NULL,
  `Title_id` int(11) DEFAULT NULL,
  `Criteria_id` int(11) DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Score` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `detail_data`
--

CREATE TABLE `detail_data` (
  `Id` int(11) NOT NULL,
  `Title_id` int(11) DEFAULT NULL,
  `Data_id` int(11) DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `detail_result`
--

CREATE TABLE `detail_result` (
  `Id` int(11) NOT NULL,
  `Result_id` int(11) DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Score` int(11) DEFAULT NULL,
  `Rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `Id` int(11) NOT NULL,
  `Data_id` int(11) DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Score` int(11) DEFAULT NULL,
  `Rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `title`
--

CREATE TABLE `title` (
  `Id` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `criteria`
--
ALTER TABLE `criteria`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `detail_criteria`
--
ALTER TABLE `detail_criteria`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Title_id` (`Title_id`),
  ADD KEY `Criteria_id` (`Criteria_id`);

--
-- Indexes for table `detail_data`
--
ALTER TABLE `detail_data`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Title_id` (`Title_id`),
  ADD KEY `Data_id` (`Data_id`);

--
-- Indexes for table `detail_result`
--
ALTER TABLE `detail_result`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Result_id` (`Result_id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Data_id` (`Data_id`);

--
-- Indexes for table `title`
--
ALTER TABLE `title`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `criteria`
--
ALTER TABLE `criteria`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_criteria`
--
ALTER TABLE `detail_criteria`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_data`
--
ALTER TABLE `detail_data`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_result`
--
ALTER TABLE `detail_result`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `title`
--
ALTER TABLE `title`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_criteria`
--
ALTER TABLE `detail_criteria`
  ADD CONSTRAINT `detail_criteria_ibfk_1` FOREIGN KEY (`Title_id`) REFERENCES `title` (`Id`),
  ADD CONSTRAINT `detail_criteria_ibfk_2` FOREIGN KEY (`Criteria_id`) REFERENCES `criteria` (`Id`);

--
-- Constraints for table `detail_data`
--
ALTER TABLE `detail_data`
  ADD CONSTRAINT `detail_data_ibfk_1` FOREIGN KEY (`Title_id`) REFERENCES `title` (`Id`),
  ADD CONSTRAINT `detail_data_ibfk_2` FOREIGN KEY (`Data_id`) REFERENCES `data` (`Id`);

--
-- Constraints for table `detail_result`
--
ALTER TABLE `detail_result`
  ADD CONSTRAINT `detail_result_ibfk_1` FOREIGN KEY (`Result_id`) REFERENCES `result` (`Id`);

--
-- Constraints for table `result`
--
ALTER TABLE `result`
  ADD CONSTRAINT `result_ibfk_1` FOREIGN KEY (`Data_id`) REFERENCES `data` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
