-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2021 at 09:10 PM
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

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` varchar(12) NOT NULL,
  `password` varchar(8) NOT NULL,
  `passlast` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `password`, `passlast`) VALUES
('admin', 'admin', '2021-12-01');

-- --------------------------------------------------------

--
-- Table structure for table `donorlog`
--

DROP TABLE IF EXISTS `donorlog`;
CREATE TABLE `donorlog` (
  `id` varchar(12) NOT NULL,
  `password` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbdonor`
--

DROP TABLE IF EXISTS `tbdonor`;
CREATE TABLE `tbdonor` (
  `dname` varchar(30) NOT NULL,
  `image` varchar(50) NOT NULL,
  `sex` varchar(7) NOT NULL,
  `dnumber` varchar(12) NOT NULL,
  `demail` varchar(30) NOT NULL,
  `daddress` varchar(40) NOT NULL,
  `dblood` varchar(5) NOT NULL,
  `id` varchar(12) NOT NULL,
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
