-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 10, 2022 at 05:42 PM
-- Server version: 5.7.24
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `contenu` varchar(255) NOT NULL,
  `fichier` varchar(50) NOT NULL,
  `id_auteur` int(255) NOT NULL,
  `nom_auteur` varchar(50) NOT NULL,
  `prenom_auteur` varchar(50) NOT NULL,
  `date_creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `contenu`, `fichier`, `id_auteur`, `nom_auteur`, `prenom_auteur`, `date_creation`) VALUES
(2, 'ertttre', 'image (1).jpg', 6, 'Elie', '', '2022-05-10 00:54:54'),
(3, 'Salut! mitady sakafo e!!!', 'image (3).jpg', 6, 'Elie', '', '2022-05-10 00:56:53'),
(4, 'arrttt', 'image (4).jpg', 6, 'Aina', 'Aina', '2022-05-10 01:10:43'),
(5, 'Salut!!!', '', 6, 'Aina', 'Elie', '2022-05-10 01:16:26'),
(6, 'Sariko ito', '', 9, 'rivo', 'rivo', '2022-05-10 05:32:59'),
(7, 'sariko', '', 9, 'rivo', 'rivo', '2022-05-10 05:35:05'),
(8, 'za io', '1309683561-far_cry_1920_x_1200-dc7e381016.jpg', 9, 'rivo', 'rivo', '2022-05-10 05:38:51'),
(9, 'zaze', '52965.jpg', 12, 'zoky', 'zoky', '2022-05-10 09:48:32'),
(10, 'zaze', '52965.jpg', 12, 'zoky', 'zoky', '2022-05-10 09:49:16'),
(11, 'retert', '061211.jpg', 12, 'zoky', 'zoky', '2022-05-10 09:49:40'),
(12, 'ertert', '1309683471-tomb_raider_1920_x_1080-0133d78075.jpg', 13, 'test', 'aaa', '2022-05-10 10:55:42');

-- --------------------------------------------------------

--
-- Table structure for table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE IF NOT EXISTS `commentaire` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `id_article` int(255) NOT NULL,
  `value` varchar(50) NOT NULL,
  `nom_auteur` varchar(50) NOT NULL,
  `prenom_auteur` varchar(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `commentaire`
--

INSERT INTO `commentaire` (`id`, `id_article`, `value`, `nom_auteur`, `prenom_auteur`, `date`) VALUES
(1, 2, 'tsara be!!!', 'Aina', 'Elie', '2022-05-10 02:41:09'),
(2, 2, 'Manja be !!!', 'Aina', 'Elie', '2022-05-10 03:06:50'),
(3, 2, 'Sure aki a ;)', 'rivo', 'rivo', '2022-05-10 03:08:59'),
(4, 5, '', 'rivo', 'rivo', '2022-05-10 03:13:22'),
(5, 3, 'manasa oooo!!!', 'zoky', 'zoky', '2022-05-10 07:48:02'),
(6, 10, 'akoryy eeee!!!!', 'zoky', 'zoky', '2022-05-10 07:50:22'),
(7, 7, 'Akory!!!!\r\n', 'Elie', 'elie', '2022-05-10 14:25:19'),
(8, 4, 'Tsara', 'Elie', 'elie', '2022-05-10 15:46:31'),
(9, 4, 'Otrin?', 'Elie', 'elie', '2022-05-10 15:52:31'),
(10, 6, 'aiza io', 'Elie', 'elie', '2022-05-10 15:56:22'),
(11, 11, 'Prix?', 'Elie', 'elie', '2022-05-10 15:56:40'),
(12, 9, 'firy corde io?', 'Elie', 'elie', '2022-05-10 15:57:21');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE IF NOT EXISTS `tb_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `name`, `username`, `email`, `password`) VALUES
(13, 'test', 'aaa', 'eliea@gmail.com', '4297f44b13955235245b2497399d7a93'),
(12, 'zoky', 'zoky', 'adray@gmail.com', '4297f44b13955235245b2497399d7a93'),
(11, 'KOTO', 'Randria', 'randria@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(10, 'adry', 'adry', 'adry@gmail.com', '202cb962ac59075b964b07152d234b70'),
(14, 'Elie', 'elie', 'elie@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(15, 'JAQUE', 'Aimee', 'aime@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
