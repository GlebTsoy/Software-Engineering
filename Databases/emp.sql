-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2016 at 11:48 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employee`
--

-- --------------------------------------------------------

--
-- Table structure for table `emp`
--

CREATE TABLE `emp` (
  `id` int(11) NOT NULL,
  `firstname` varchar(15) NOT NULL,
  `lastname` varchar(15) NOT NULL,
  `DOB` date NOT NULL,
  `Job` varchar(15) NOT NULL,
  `Salary` int(11) NOT NULL,
  `gender` char(1) NOT NULL,
  `contact number` int(16) NOT NULL,
  `email` char(20) NOT NULL,
  `dateHired` date NOT NULL,
  `dateTerminated` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp`
--

INSERT INTO `emp` (`id`, `firstname`, `lastname`, `DOB`, `Job`, `Salary`, `gender`, `contact number`, `email`, `dateHired`, `dateTerminated`) VALUES
(1, 'Gleb', 'Tsoy', '1995-01-01', 'Cleaning Unit', 900, '', 0, '', '0000-00-00', NULL),
(2, 'Bruce', 'Wayne', '1991-09-01', 'Batman', 0, '', 0, '', '0000-00-00', NULL),
(3, 'John', 'Doe', '2016-09-15', 'Someone', 10000, '', 0, '', '0000-00-00', NULL),
(4, 'Marry', 'Moe', '2016-09-11', 'Another One', 323232, '', 0, '', '0000-00-00', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `emp`
--
ALTER TABLE `emp`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `emp`
--
ALTER TABLE `emp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
