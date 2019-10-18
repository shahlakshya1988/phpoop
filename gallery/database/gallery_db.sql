-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 18, 2019 at 02:32 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

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
  `author` varchar(255) NOT NULL,
  `body` longtext NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `photo_id` (`photo_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `photo_id`, `author`, `body`, `datetime`) VALUES
(1, 8, 'my name', 'some datra', '2019-10-15 14:46:20'),
(2, 8, 'my1 name', 'some datra 1', '2019-10-15 14:46:20'),
(4, 9, 'comment 1', 'comment body 1', '2019-10-15 17:54:21'),
(5, 9, 'comment 2', 'comment body 2', '2019-10-15 17:54:29');

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

DROP TABLE IF EXISTS `photos`;
CREATE TABLE IF NOT EXISTS `photos` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `filename` varchar(255) NOT NULL,
  `caption` varchar(255) NOT NULL,
  `alternate_text` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `size` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `title`, `description`, `filename`, `caption`, `alternate_text`, `type`, `size`) VALUES
(12, 'Photo 2', '', '_large_image_3.jpg', '', '', 'image/jpeg', 165053),
(11, 'Photo 1', '', '_large_image_1.jpg', '', '', 'image/jpeg', 479843),
(13, 'Photo 3', '', '_large_image_4.jpg', '', '', 'image/jpeg', 554659),
(14, 'Photo 4', '', 'image-1.jpg', '', '', 'image/jpeg', 328747),
(15, 'photo 5', '', 'images_2.jpg', '', '', 'image/jpeg', 18578),
(16, 'Photo 7', '', 'images-1 copy.jpg', '', '', 'image/jpeg', 28947),
(17, 'Photo 7', '', 'images-3 copy.jpg', '', '', 'image/jpeg', 18096),
(18, 'Photo 8', '', 'images-4.jpg', '', '', 'image/jpeg', 23270),
(19, 'Photo 8', '', 'images-9.jpg', '', '', 'image/jpeg', 21108);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `first_name`, `last_name`, `user_image`) VALUES
(1, 'rico', '123', 'John', 'Doe', 'user.jpg'),
(2, 'edwin', '123', 'Edwin', 'Diaz', ''),
(27, 'rico23', '123', 'ricofirstname', 'ricolastname', 'vehicledetails_img_4-12.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
