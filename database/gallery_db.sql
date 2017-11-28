-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 28, 2017 at 05:26 AM
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
  `title` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `filename` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `size` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `title`, `description`, `filename`, `type`, `size`) VALUES
(1, 'Just some test title', 'Another test description', '', 'png', 20),
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
(36, 'Next Challenge', '', 'NextChallenge2.jpg', 'image/jpeg', 93923);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `first_name`, `last_name`) VALUES
(1, 'superman', '123', 'Clark', 'Kent'),
(2, 'superman', '123', 'Clark', 'Kent'),
(3, 'mizi', '123', 'elad', 'ron'),
(4, 'mizi', '123', 'elad', 'ron');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
