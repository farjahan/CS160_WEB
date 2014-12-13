-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 07, 2014 at 07:39 AM
-- Server version: 5.6.21-log
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pvault`
--

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE IF NOT EXISTS `documents` (
  `did` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(30) NOT NULL,
  `expdate` date DEFAULT NULL,
  `comment` varchar(50) DEFAULT NULL,
  `uploadTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `filePath` varchar(100) DEFAULT NULL,
  `uid` int(11) NOT NULL,
  PRIMARY KEY (`did`),
  KEY `uid` (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`did`, `filename`, `expdate`, `comment`, `uploadTime`, `filePath`, `uid`) VALUES
(29, 'asdfgh', '2014-12-27', '', '2014-12-07 01:16:29', 'C:/wamp/www/storage/Pvault.png', 2),
(30, 'asdfgh', '2014-12-27', '', '2014-12-07 02:13:16', 'C:/wamp/www/storage/Pvault.png', 2),
(31, 'cat', '2015-02-28', '', '2014-12-07 02:21:32', 'C:/wamp/www/storage/cat.jpg', 2),
(32, 'cs160', '2015-02-20', 'cs160', '2014-12-07 03:56:54', 'C:/wamp/www/storage/WeeklyProjectMeetingMinutes.pdf', 2);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `documents_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
