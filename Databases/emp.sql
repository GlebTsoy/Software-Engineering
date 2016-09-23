-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2016 at 07:51 AM
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
  `contactNum` int(16) NOT NULL,
  `email` char(50) NOT NULL,
  `dateHired` date NOT NULL,
  `dateTerminated` date DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `clearance` varchar(5) NOT NULL,
  `salaryRate` int(5) NOT NULL,
  `salarytype` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp`
--

INSERT INTO `emp` (`id`, `firstname`, `lastname`, `DOB`, `Job`, `Salary`, `gender`, `contactNum`, `email`, `dateHired`, `dateTerminated`, `username`, `password`, `clearance`, `salaryRate`, `salarytype`) VALUES
(1, 'Gleb', 'Tsoy', '1995-01-01', 'Student', 500, 'M', 12345678, 'everlivingtsoy@gmail.com', '2016-09-01', NULL, 'admin', 'admin', 'admin', 50, ''),
(2, 'Ashish', 'Jacob', '2016-09-08', 'volvo', 23324, 'M', 23, 'asdsa@as', '2016-09-07', NULL, 'abc', '123', 'user', 2, 'commission'),
(3, 'Jacob', 'Ashish', '2016-09-02', 'CEO', 123424332, 'M', 213, 'ds@fs', '2016-09-09', NULL, 'abcd', '1234', 'user', 10, 'commission');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
