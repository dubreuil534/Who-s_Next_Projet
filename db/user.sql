-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2016 at 12:48 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tp_dof`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id (clef principale) utilisateur',
  `username` varchar(128) NOT NULL COMMENT 'Username',
  `email` varchar(128) NOT NULL,
  `age` varchar(128) NOT NULL COMMENT 'Prénom',
  `password` varchar(256) NOT NULL COMMENT 'Nom',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Table des utilisateurs du site' AUTO_INCREMENT=206 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `age`, `password`) VALUES
(195, 'dubreuil534', 'dubreuil534@hotmail.com', '24', '$2y$10$7LqyG4aoE//f9QkB.KEoFuknmC9YC39wYtQdmrgOU/ua7IGwvrAVG'),
(198, 'Olga123', 'amis123@hotmail.com', '17', '$2y$10$e/I.ThHSFGjkQrwzjiynU.ZizpAohLzGX/O15n56DrYI5fWEvMOqq'),
(203, 'flavy1223', 'flaby@hotmail.com', '24', '$2y$10$FIFrzVUv.sqh4ntRsnwJp.oZSYsQzN6gsqn1dZTcsoRZ7c0qDTG4u');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
