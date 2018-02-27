-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 27, 2018 at 09:07 AM
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
-- Database: `starterkit`
--

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User'),
(3, 'logsecurity', 'Log Security'),
(4, 'users', 'Users adalah daftar nama personil Waroeng SS yang dapat menggunakan Inventory Sistem (Master Data)');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

DROP TABLE IF EXISTS `login_attempts`;
CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `logsecurity`
--

DROP TABLE IF EXISTS `logsecurity`;
CREATE TABLE IF NOT EXISTS `logsecurity` (
  `lsID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `lsAction` varchar(30) NOT NULL,
  `lsIp` varchar(45) DEFAULT NULL,
  `lsPlatform` varchar(45) DEFAULT NULL,
  `lsBrowser` varchar(45) DEFAULT NULL,
  `lsBrowserVersion` varchar(45) DEFAULT NULL,
  `lsDescription` varchar(100) DEFAULT NULL,
  `createdDate` datetime NOT NULL,
  `createdUserID` int(11) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`lsID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `logsecurity`
--

INSERT INTO `logsecurity` (`lsID`, `lsAction`, `lsIp`, `lsPlatform`, `lsBrowser`, `lsBrowserVersion`, `lsDescription`, `createdDate`, `createdUserID`) VALUES
(1, 'login_gagal', '::1', 'Windows 10', 'Firefox', '58.0', '', '2018-02-27 15:55:23', 1),
(2, 'login_berhasil', '::1', 'Windows 10', 'Firefox', '58.0', '', '2018-02-27 15:55:47', 1),
(3, 'ganti_password_gagal', '::1', 'Windows 10', 'Firefox', '58.0', '', '2018-02-27 15:57:55', 1),
(4, 'ganti_password_berhasil', '::1', 'Windows 10', 'Firefox', '58.0', 'berhasil mengubah password', '2018-02-27 15:58:07', 1),
(5, 'login_berhasil', '::1', 'Windows 10', 'Firefox', '58.0', '', '2018-02-27 15:58:13', 1),
(6, 'logout_berhasil', '::1', 'Windows 10', 'Firefox', '58.0', '', '2018-02-27 15:59:57', 1),
(7, 'login_gagal', '::1', 'Windows 10', 'Firefox', '58.0', '', '2018-02-27 16:04:21', 1),
(8, 'login_berhasil', '::1', 'Windows 10', 'Firefox', '58.0', '', '2018-02-27 16:04:26', 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `roleID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `roleName` varchar(40) NOT NULL,
  `roleAlias` varchar(50) NOT NULL,
  PRIMARY KEY (`roleID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`roleID`, `roleName`, `roleAlias`) VALUES
(1, 'super_admin', 'Super Admin');

-- --------------------------------------------------------

--
-- Table structure for table `roles_groups`
--

DROP TABLE IF EXISTS `roles_groups`;
CREATE TABLE IF NOT EXISTS `roles_groups` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `roleID` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_roles_groups_groups` (`group_id`),
  KEY `FK_roles_groups_roles` (`roleID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles_groups`
--

INSERT INTO `roles_groups` (`id`, `roleID`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `outletID` int(11) NOT NULL,
  `roleID` int(11) NOT NULL,
  `image` varchar(20) DEFAULT 'default.jpg',
  `changePwd` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`, `outletID`, `roleID`, `image`, `changePwd`) VALUES
(1, '::1', 'administrator', '$2y$08$FYgj5tOTQRoSGij.OY0enepvAg2RUscXFP/FH9NPscsuuw9oSodgu', NULL, 'candrasaputra@live.com', NULL, NULL, NULL, NULL, 1268889823, 1519722266, 2, 'Candra Saputra', '-', 'Staf', '81373961140', 34, 1, 'default.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

DROP TABLE IF EXISTS `users_groups`;
CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `roles_groups`
--
ALTER TABLE `roles_groups`
  ADD CONSTRAINT `FK_roles_groups_groups` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_roles_groups_roles` FOREIGN KEY (`roleID`) REFERENCES `roles` (`roleID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `FK_users_groups_groups` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
