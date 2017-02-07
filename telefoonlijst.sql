-- phpMyAdmin SQL Dump
-- version 4.2.7
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Feb 05, 2017 at 11:11 AM
-- Server version: 5.5.41-log
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `telefoonlijst`
--
CREATE DATABASE IF NOT EXISTS `telefoonlijst` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `telefoonlijst`;

-- --------------------------------------------------------

--
-- Table structure for table `afdelingen`
--

CREATE TABLE IF NOT EXISTS `afdelingen` (
`id` int(11) NOT NULL,
  `naam` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `afdelingen`
--

INSERT INTO `afdelingen` (`id`, `naam`) VALUES
(1, 'Applicatie Ontwikkeling'),
(2, 'ICT Beheer');

-- --------------------------------------------------------

--
-- Table structure for table `contacten`
--

CREATE TABLE IF NOT EXISTS `contacten` (
`id` int(11) NOT NULL,
  `afdeling_id` int(11) DEFAULT NULL,
  `voornaam` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `achternaam` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `foto` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `adres` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postcode` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL,
  `plaats` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefoon` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=25 ;

--
-- Dumping data for table `contacten`
--

INSERT INTO `contacten` (`id`, `afdeling_id`, `voornaam`, `achternaam`, `foto`, `adres`, `postcode`, `plaats`, `telefoon`, `email`) VALUES
(2, NULL, 'Marianne de', 'Kok', '', 'Platananhof 11', '1234DF', 'Delfgauw', '0612345678', ''),
(17, 1, 'Marcel van der', 'Linden', 'default.jpg', 'Agnes Croesinklaan 8', '2345HJ', 'Schipluiden', '061234567', 'mlinden@rocmondriaan.nl'),
(18, 1, 'Susan van der', 'Linden', 'default.jpg', 'Agnes Croesinklaan 8', '2345FG', 'Schipluiden', '0153808019', 'geen@dft.nl'),
(20, NULL, 'Okke van der', 'Linden', 'default.jpg', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `diploma`
--

CREATE TABLE IF NOT EXISTS `diploma` (
  `contact_id` int(11) NOT NULL,
  `opleiding_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `diploma`
--

INSERT INTO `diploma` (`contact_id`, `opleiding_id`) VALUES
(17, 1),
(17, 4),
(18, 1),
(18, 2),
(18, 4);

-- --------------------------------------------------------

--
-- Table structure for table `fos_user`
--

CREATE TABLE IF NOT EXISTS `fos_user` (
`id` int(11) NOT NULL,
  `contact_id` int(11) DEFAULT NULL,
  `username` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_canonical` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `confirmation_token` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=23 ;

--
-- Dumping data for table `fos_user`
--

INSERT INTO `fos_user` (`id`, `contact_id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `confirmation_token`, `password_requested_at`, `roles`) VALUES
(1, 2, 'mkok', 'mkok', 'm.kok@rocmondriaan.com', 'm.kok@rocmondriaan.com', 1, NULL, '$2y$13$dB3lkJXNJ1U.y.PUvb2K2Oo4pmsefKAb2oYAxEAZIYKoGC77bcTba', '2017-02-05 11:06:05', NULL, NULL, 'a:1:{i:0;s:10:"ROLE_ADMIN";}'),
(17, 17, 'mjlinden', 'mjlinden', 'mlinden@rocmondriaan.nl', 'mlinden@rocmondriaan.nl', 1, NULL, '$2y$13$oBdBXd9ztYMPi639n2FqmOse/qpzQ30c4bgWI6hiO4g4Letwz9mVC', '2017-02-05 10:07:27', NULL, NULL, 'a:0:{}'),
(18, 18, 'slinden', 'slinden', 'susan@susan.nl', 'susan@susan.nl', 1, NULL, '$2y$13$r7rMCUwRZ6D3.MlIsSxTs.4/oZZ8QUVSfgTmt7LWxUGHDLrmyvNrO', '2017-02-05 10:54:55', NULL, NULL, 'a:0:{}'),
(19, 20, 'olinden', 'olinden', 'default@fos.nl', 'default@fos.nl', 1, NULL, '$2y$13$h.ayClLj6gbb2qrYEYi49.lxx1CxaQ5j354V12OWT88UKkVFrOeyO', NULL, NULL, NULL, 'a:0:{}');

-- --------------------------------------------------------

--
-- Table structure for table `opleidingen`
--

CREATE TABLE IF NOT EXISTS `opleidingen` (
`id` int(11) NOT NULL,
  `naam` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `opleidingen`
--

INSERT INTO `opleidingen` (`id`, `naam`) VALUES
(1, 'MAVO'),
(2, 'HAVO'),
(3, 'VWO'),
(4, 'Applicatie Ontwikkelaar'),
(5, 'ICT Beheer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `afdelingen`
--
ALTER TABLE `afdelingen`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacten`
--
ALTER TABLE `contacten`
 ADD PRIMARY KEY (`id`), ADD KEY `IDX_ADAF7696C5BE90E3` (`afdeling_id`);

--
-- Indexes for table `diploma`
--
ALTER TABLE `diploma`
 ADD PRIMARY KEY (`contact_id`,`opleiding_id`), ADD KEY `IDX_EC218957E7A1254A` (`contact_id`), ADD KEY `IDX_EC218957844BD0B0` (`opleiding_id`);

--
-- Indexes for table `fos_user`
--
ALTER TABLE `fos_user`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `UNIQ_957A647992FC23A8` (`username_canonical`), ADD UNIQUE KEY `UNIQ_957A6479C05FB297` (`confirmation_token`), ADD UNIQUE KEY `UNIQ_957A6479E7A1254A` (`contact_id`);

--
-- Indexes for table `opleidingen`
--
ALTER TABLE `opleidingen`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `afdelingen`
--
ALTER TABLE `afdelingen`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `contacten`
--
ALTER TABLE `contacten`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `fos_user`
--
ALTER TABLE `fos_user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `opleidingen`
--
ALTER TABLE `opleidingen`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `contacten`
--
ALTER TABLE `contacten`
ADD CONSTRAINT `FK_ADAF7696C5BE90E3` FOREIGN KEY (`afdeling_id`) REFERENCES `afdelingen` (`id`);

--
-- Constraints for table `diploma`
--
ALTER TABLE `diploma`
ADD CONSTRAINT `FK_EC218957844BD0B0` FOREIGN KEY (`opleiding_id`) REFERENCES `opleidingen` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `FK_EC218957E7A1254A` FOREIGN KEY (`contact_id`) REFERENCES `contacten` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `fos_user`
--
ALTER TABLE `fos_user`
ADD CONSTRAINT `FK_957A6479E7A1254A` FOREIGN KEY (`contact_id`) REFERENCES `contacten` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
