-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2017 at 08:37 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dm`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `sn` int(11) NOT NULL AUTO_INCREMENT,
  `c` int(11) NOT NULL,
  `cplus` int(11) NOT NULL,
  `ooad` int(11) NOT NULL,
  PRIMARY KEY (`sn`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=116 ;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`sn`, `c`, `cplus`, `ooad`) VALUES
(1, 1, 1, 0),
(2, 1, 1, 1),
(3, 1, 1, 1),
(4, 1, 0, 1),
(5, 0, 0, 0),
(6, 1, 0, 1),
(7, 0, 0, 1),
(8, 1, 1, 1),
(9, 0, 0, 1),
(10, 1, 1, 1),
(11, 0, 1, 1),
(12, 1, 1, 1),
(13, 0, 0, 1),
(14, 1, 1, 1),
(15, 1, 1, 1),
(16, 1, 1, 1),
(17, 1, 1, 1),
(18, 1, 1, 1),
(19, 1, 1, 1),
(20, 1, 1, 1),
(21, 0, 0, 0),
(22, 1, 0, 1),
(23, 1, 1, 1),
(24, 1, 0, 0),
(25, 1, 0, 0),
(26, 1, 1, 1),
(27, 1, 0, 0),
(28, 0, 0, 1),
(29, 1, 1, 1),
(30, 1, 0, 1),
(31, 1, 0, 1),
(32, 1, 1, 1),
(33, 1, 1, 0),
(34, 0, 0, 0),
(35, 1, 1, 0),
(36, 0, 0, 1),
(37, 1, 1, 1),
(38, 1, 1, 1),
(39, 1, 1, 1),
(40, 1, 0, 0),
(41, 1, 0, 0),
(42, 1, 1, 1),
(43, 1, 1, 1),
(44, 1, 0, 1),
(45, 1, 0, 1),
(46, 0, 0, 1),
(47, 1, 0, 0),
(48, 1, 1, 1),
(49, 1, 1, 1),
(50, 1, 0, 0),
(51, 1, 1, 1),
(52, 1, 1, 1),
(53, 1, 0, 1),
(54, 1, 0, 0),
(55, 1, 0, 1),
(56, 1, 1, 1),
(57, 0, 0, 1),
(58, 1, 0, 0),
(59, 1, 1, 1),
(60, 0, 0, 0),
(61, 1, 0, 0),
(62, 1, 1, 1),
(63, 1, 1, 0),
(64, 0, 0, 1),
(65, 0, 0, 1),
(66, 1, 1, 1),
(67, 1, 1, 1),
(68, 0, 0, 0),
(69, 1, 0, 1),
(70, 0, 1, 0),
(71, 1, 0, 1),
(72, 0, 0, 0),
(73, 1, 0, 1),
(74, 1, 1, 1),
(75, 1, 0, 1),
(76, 0, 0, 1),
(77, 1, 1, 1),
(78, 1, 0, 1),
(79, 1, 0, 1),
(80, 1, 0, 1),
(81, 1, 1, 1),
(82, 1, 0, 0),
(83, 1, 0, 0),
(84, 1, 1, 1),
(85, 1, 0, 1),
(86, 0, 1, 0),
(87, 1, 1, 1),
(88, 0, 0, 0),
(89, 0, 0, 1),
(90, 0, 1, 1),
(91, 0, 1, 1),
(92, 1, 0, 1),
(93, 1, 0, 1),
(94, 1, 1, 1),
(96, 1, 0, 0),
(98, 0, 0, 1),
(99, 1, 1, 0),
(100, 1, 0, 0),
(110, 0, 0, 0),
(112, 1, 0, 1),
(113, 1, 0, 0),
(114, 0, 0, 0),
(115, 1, 1, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
