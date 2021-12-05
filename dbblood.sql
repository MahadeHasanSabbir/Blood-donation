-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2021 at 06:38 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+06:00";


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
-- Table structure for table `tbdonner`
--

DROP TABLE IF EXISTS `tbdonner`;
CREATE TABLE `tbdonner` (
  `dname` varchar(30) NOT NULL,
  `sex` varchar(7) NOT NULL,
  `dnumber` varchar(12) NOT NULL,
  `demail` varchar(30) NOT NULL,
  `daddress` varchar(30) NOT NULL,
  `dblood` varchar(5) NOT NULL,
  `id` varchar(12) NOT NULL,
  `lddate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbdonner`
--
ALTER TABLE `tbdonner`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
