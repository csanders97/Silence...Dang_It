-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 10, 2018 at 03:18 AM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `category` text NOT NULL,
  `type` text NOT NULL,
  `parent` text NOT NULL,
  `html` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `category`, `type`, `parent`, `html`) VALUES
(1, 'Home', 'Main', 'None', '<section class=\"home\"><h1>HOME</h1><hr /></section>'),
(2, 'About', 'Main', 'None', '<section class=\"about\"><h1>About</h1><hr/></section>'),
(3, 'Contact', 'Main', 'None', '<section class=\"contact\"><h1>Contact</h1><hr/></section>'),
(4, 'History', 'Sub', 'About', '<section class=\"history\"><h1>History/h1></section>'),
(5, 'Mission', 'Sub', 'About', '<section class=\"mission\"><h1>Mission</h1></section>'),
(16, 'Locations', 'Sub', 'Contact', '<section class=\"locations\"><h1>Locations</h1></section>'),
(17, 'Email', 'Sub', 'Contact', '<section class=\"email\"><h1>Email</h1></section>');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
