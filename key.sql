-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2020 at 01:39 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `key`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `usertype` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `user`, `pass`, `usertype`) VALUES
(1, 'd14e9eda18f5f3e2b9258e2036a80cf4abcb8998', 'bba122d054be7e0a1c6f6cf956c8d490e3c3ab00', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE IF NOT EXISTS `rooms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `room_name` varchar(50) NOT NULL,
  `keycode` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room_name`, `keycode`, `status`) VALUES
(1, 'Room1', 'key1', 'available'),
(2, 'Room2', 'key2', 'available'),
(3, 'Room3', 'key3', 'available'),
(4, 'Room4', 'key4', 'borrowed'),
(5, 'Room5', 'key5', 'available'),
(6, 'Room6', 'key6', 'available'),
(7, 'Room7', 'key7', 'available'),
(8, 'Room8', 'key8', 'available'),
(9, 'Room9', 'key9', 'available'),
(12, 'Room10', 'key10', 'available'),
(13, 'Room11', 'key11', 'available'),
(14, 'Room12', 'key12', 'available'),
(15, 'Room13', 'key13', 'available'),
(16, 'Room14', 'key14', 'available');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `room` varchar(50) NOT NULL,
  `b_time` varchar(50) NOT NULL,
  `r_time` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `position`, `description`, `room`, `b_time`, `r_time`, `status`) VALUES
(1, 'Jolina Arcina', 'Student BS Info 2A', 'Meeting', '1', '2020/03/19 07:03 pm', '2020/03/21 09:03 am', 'returned'),
(2, 'Enrique Guevarra', 'OJT MIS', 'Meeting', '2', '2020/03/20 03:03 am', '2020/03/20 03:03 am', 'returned'),
(5, 'Jolina Guevarra', 'Shooting Guard', 'TES Meeting', '1', '2020/03/20 06:03 am', '2020/03/21 09:03 am', 'returned'),
(6, 'q', 'w', 'e', '3', '2020/03/21 08:03 am', '2020/03/23 06:03 am', 'returned'),
(7, 'Jolina gwapa', 'labot hangin', 'nothing', '6', '2020/03/23 06:03 am', '2020/03/23 06:03 am', 'returned'),
(8, 'as', 'df', 'ghj', '9', '2020/03/23 11:03 am', '2020/03/23 11:03 am', 'returned'),
(9, '1', '2', '3', '4', '2020/03/23 11:03 am', '', 'borrowed');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
