-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 26, 2017 at 06:47 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gallery_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

DROP TABLE IF EXISTS `photos`;
CREATE TABLE IF NOT EXISTS `photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `filename` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `size` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `title`, `description`, `filename`, `type`, `size`) VALUES
(1, 'Landscape', 'This is the first image inserted manually to the database', 'land.jpg', 'image', 11),
(2, 'Just some test title', 'Another test description', '', 'png', 20),
(3, 'Just some test title', 'Another test description', '', 'png', 20),
(4, 'Just some test title', 'Another test description', '', 'png', 20),
(5, 'Just some test title', 'Another test description', '', 'png', 20),
(6, 'Just some test title', 'Another test description', '', 'png', 20),
(7, 'Just some test title', 'Another test description', '', 'png', 20),
(8, 'Just some test title', 'Another test description', '', 'png', 20),
(9, 'Just some test title', 'Another test description', '', 'png', 20),
(10, 'Just some test title', 'Another test description', '', 'png', 20),
(11, 'Just some test title', 'Another test description', '', 'png', 20),
(12, 'Just some test title', 'Another test description', '', 'png', 20),
(13, 'Just some test title', 'Another test description', '', 'png', 20),
(14, 'Just some test title', 'Another test description', '', 'png', 20),
(15, 'Just some test title', 'Another test description', '', 'png', 20),
(16, 'Just some test title', 'Another test description', '', 'png', 20),
(17, 'Just some test title', 'Another test description', '', 'png', 20),
(18, 'Just some test title', 'Another test description', '', 'png', 20),
(19, 'Just some test title', 'Another test description', '', 'png', 20),
(20, 'Just some test title', 'Another test description', '', 'png', 20),
(21, 'Just some test title', 'Another test description', '', 'png', 20),
(22, 'Just some test title', 'Another test description', '', 'png', 20),
(23, 'Just some test title', 'Another test description', '', 'png', 20),
(24, 'Just some test title', 'Another test description', '', 'png', 20),
(25, 'Just some test title', 'Another test description', '', 'png', 20),
(26, 'Just some test title', 'Another test description', '', 'png', 20),
(27, 'Just some test title', 'Another test description', '', 'png', 20),
(28, 'Just some test title', 'Another test description', '', 'png', 20),
(29, 'Just some test title', 'Another test description', '', 'png', 20),
(30, 'Just some test title', 'Another test description', '', 'png', 20),
(31, 'Just some test title', 'Another test description', '', 'png', 20),
(32, 'Just some test title', 'Another test description', '', 'png', 20),
(33, 'Just some test title', 'Another test description', '', 'png', 20),
(34, 'Just some test title', 'Another test description', '', 'png', 20),
(35, 'Just some test title', 'Another test description', '', 'png', 20),
(36, 'Just some test title', 'Another test description', '', 'png', 20),
(37, 'Just some test title', 'Another test description', '', 'png', 20),
(38, 'Just some test title', 'Another test description', '', 'png', 20),
(39, 'Just some test title', 'Another test description', '', 'png', 20),
(40, 'Just some test title', 'Another test description', '', 'png', 20),
(41, 'Just some test title', 'Another test description', '', 'png', 20),
(42, 'Just some test title', 'Another test description', '', 'png', 20),
(43, 'Just some test title', 'Another test description', '', 'png', 20),
(44, 'Just some test title', 'Another test description', '', 'png', 20),
(45, 'Just some test title', 'Another test description', '', 'png', 20),
(46, 'Just some test title', 'Another test description', '', 'png', 20),
(47, 'Just some test title', 'Another test description', '', 'png', 20),
(48, 'Just some test title', 'Another test description', '', 'png', 20),
(49, 'Just some test title', 'Another test description', '', 'png', 20);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `first_name`, `last_name`) VALUES
(1, 'rico', '123', 'John', 'Doe'),
(2, 'superman', '1234', 'Klark', 'Kent'),
(3, 'spiderman', '1234', 'Peter', 'Louis'),
(4, 'JustUpdated', '', '', ''),
(10, 'Ant-Man', '1234', 'Scott', 'Lang'),
(8, 'ClaraJ', '12345', 'Clara', 'Jones'),
(9, 'ClaraM', '12345', 'Clara', 'Mones'),
(11, 'Phoenix', '1234', 'Jean', 'Grey-Summers'),
(12, 'JustUpdated', '1234', 'Jean', 'Grey-Summers'),
(13, 'JustUpdated', '', '', ''),
(14, 'Phoenix', '1234', 'Jean', 'Grey-Summers'),
(15, 'Phoenix', '1234', 'Jean', 'Grey-Summers'),
(16, 'JustUpdated', '1234', 'Jean', 'Grey-Summers'),
(17, 'JustUpdated', '1234', 'Jean', 'Grey-Summers'),
(18, 'Phoenix', '1234', 'Jean', 'Grey-Summers'),
(19, 'Phoenix', '1234', 'Jean', 'Grey-Summers'),
(20, 'Phoenix', '1234', 'Jean', 'Grey-Summers'),
(21, 'JustUpdated', '1234', 'Jean', 'Grey-Summers'),
(22, 'JustUpdated', '1234', 'Jean', 'Grey-Summers'),
(23, 'JustUpdated', '', '', ''),
(24, 'JustUpdated', '', '', ''),
(25, 'JustUpdated', '', '', ''),
(26, 'JustUpdated', '', '', ''),
(27, 'JustUpdated', '', '', ''),
(28, 'Phoenix', '1234', 'Jean', 'Grey-Summers'),
(29, 'Phoenix', '1234', 'Jean', 'Grey-Summers'),
(30, 'JustUpdated', '', '', ''),
(31, 'Phoenix', '1234', 'Jean', 'Grey-Summers'),
(32, 'Phoenix', '1234', 'Jean', 'Grey-Summers'),
(33, 'JustUpdated', '1234', 'Jean', 'Grey-Summers'),
(34, 'JustUpdated', '1234', 'Jean', 'Grey-Summers'),
(35, 'JustUpdated', '1234', 'Jean', 'Grey-Summers');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
