-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 18, 2017 at 05:18 AM
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
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `photo_id` int(11) NOT NULL,
  `author` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `photo_id` (`photo_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `photo_id`, `author`, `body`, `createdDate`) VALUES
(3, 42, 'yami', 'another comment', '2017-12-12 04:35:26'),
(15, 49, 'elad', 'Hello from one of my best days.', '2017-12-17 05:24:45'),
(6, 45, 'elad', 'What can I say?', '2017-12-15 03:24:26');

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

DROP TABLE IF EXISTS `photos`;
CREATE TABLE IF NOT EXISTS `photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `caption` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `filename` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `alternate_text` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `size` int(10) NOT NULL,
  `src` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `photoCreatedDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `title`, `caption`, `description`, `filename`, `alternate_text`, `type`, `size`, `src`, `createdDate`, `updatedDate`, `photoCreatedDate`) VALUES
(50, '', '', 'What a wonderful cake', '2017_12_16_13_08_34_IMG_3168.JPG', '', 'image/jpeg', 720253, 'images\\gallery\\2017_12_16_13_08_34_IMG_3168.JPG', '2017-12-16 13:08:34', '2017-12-16 13:08:34', '2017-12-16 15:08:34'),
(43, '', '', '', 'IMG_1002.JPG', '', 'image/jpeg', 2204008, 'images\\gallery\\IMG_1002.JPG', '2017-12-01 13:59:04', '2017-12-01 13:59:04', '2017-12-01 15:59:04'),
(42, 'two of us', 'The two of us', '<p><strong>in Prague first session</strong></p>', 'IMG_0999.JPG', 'Alternate us', 'image/jpeg', 1816786, 'images\\gallery\\IMG_0999.JPG', '2017-12-01 11:31:54', '2017-12-01 11:31:54', '2017-12-01 13:31:54'),
(44, 'EmiLibi', '', 'My life', '××ž×™×œ×™×‘×™.jpg', '', 'image/jpeg', 136186, 'images/gallery\\emilibi.jpg', '2017-12-02 19:53:42', '2017-12-02 19:53:42', '2017-12-02 21:53:42'),
(45, 'Nina', '', '', 'latest 021.JPG', '', 'image/jpeg', 1021819, 'images/gallery\\latest 021.JPG', '2017-12-08 13:20:49', '2017-12-08 13:20:49', '2017-12-08 15:20:49'),
(49, 'Happy', '', 'The Wedding day', '2017_12_13_06_46_42_Elad.jpg', '', 'image/jpeg', 39352, 'images\\gallery\\2017_12_13_06_46_42_Elad.jpg', '2017-12-13 06:46:42', '2017-12-13 06:46:42', '2017-12-13 08:46:42');

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
  `image_src` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `first_name`, `last_name`, `image_src`) VALUES
(30, '', '', '', '', ''),
(23, 'superman', '123', 'klark', 'kent', 'images\\users\\2017_12_09_08_17_05_superman.jpg'),
(24, 'hulk', '123', 'bruce', 'banner', 'images\\users\\2017_12_09_08_17_14_hulk.jpg'),
(25, 'spiderman', '123', 'peter', 'parker', 'images\\users\\2017_12_09_08_17_49_spiderman.jpg'),
(29, 'starlord', '123', 'peter', 'quill', 'images\\users\\2017_12_09_15_00_12_star_lord.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
