-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbblood`
--
CREATE DATABASE IF NOT EXISTS `dbblood` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `dbblood`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` varchar(12) NOT NULL,
  `password` varchar(8) NOT NULL,
  `passlast` date NOT NULL,
  `tuser` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `password`, `passlast`, `tuser`) VALUES
('admin', 'admin', '2021-12-01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bgroup`
--

CREATE TABLE `bgroup` (
  `ID` int(11) NOT NULL,
  `name` varchar(5) NOT NULL,
  `number` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bgroup`
--

INSERT INTO `bgroup` (`ID`, `name`, `number`) VALUES
(1, 'A+ve', NULL),
(2, 'A-ve', NULL),
(3, 'AB+ve', NULL),
(4, 'AB-ve', NULL),
(5, 'B+ve', NULL),
(6, 'B-ve', NULL),
(7, 'O+ve', NULL),
(8, 'O-ve', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `name` varchar(40) NOT NULL,
  `email` varchar(65) NOT NULL,
  `comment` varchar(2000) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `donorlog`
--

CREATE TABLE `donorlog` (
  `id` varchar(10) NOT NULL,
  `password` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbdonor`
--

CREATE TABLE `tbdonor` (
  `dname` varchar(30) NOT NULL,
  `image` varchar(50) NOT NULL,
  `sex` varchar(7) NOT NULL,
  `dnumber` varchar(12) NOT NULL,
  `demail` varchar(30) NOT NULL,
  `daddress` varchar(40) NOT NULL,
  `dblood` varchar(5) NOT NULL,
  `id` varchar(10) NOT NULL,
  `lddate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bgroup`
--
ALTER TABLE `bgroup`
  ADD UNIQUE KEY `blood` (`name`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`time`);

--
-- Indexes for table `donorlog`
--
ALTER TABLE `donorlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbdonor`
--
ALTER TABLE `tbdonor`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
