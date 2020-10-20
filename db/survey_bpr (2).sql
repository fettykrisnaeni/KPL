-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2020 at 10:39 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `survey_bpr`
--
CREATE DATABASE IF NOT EXISTS `survey_bpr` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `survey_bpr`;

-- --------------------------------------------------------

--
-- Table structure for table `hasil_survey`
--

CREATE TABLE IF NOT EXISTS `hasil_survey` (
  `id_user` int(50) NOT NULL,
  `id_nasabah` varchar(50) NOT NULL,
  `respon` varchar(20) NOT NULL,
  `jenis_transaksi` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal_waktu` datetime NOT NULL,
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hasil_survey`
--

INSERT INTO `hasil_survey` (`id_user`, `id_nasabah`, `respon`, `jenis_transaksi`, `keterangan`, `tanggal_waktu`) VALUES
(1, 'NSB00001 ', 'cukup', 'tabungan', 'asdf', '2020-01-17 11:04:00'),
(1, 'NSB00003 ', 'tidak puas', 'tabungan', 'asdfg', '2020-01-18 05:04:46'),
(3, 'NSB00004 ', 'puas', 'deposito', 'asdff', '2020-01-21 05:05:50'),
(1, 'NSB00005 ', 'puas', 'deposito', 'aaaa', '2020-01-22 10:01:50'),
(3, 'NSB00006 ', 'sangat puas', 'kredit', 'asdkjk', '2020-01-22 10:06:26'),
(3, 'NSB00007 ', 'puas', 'deposito', 'asss', '2020-01-22 10:07:18'),
(1, 'NSB00008 ', 'sangat puas', 'tabungan', 'asddd', '2020-01-22 11:48:33'),
(4, 'NSB00009 ', 'puas', 'kredit', 'aaaa', '2020-01-26 06:53:17'),
(4, 'NSB00010 ', 'tidak puas', 'deposito', 'asdf', '2020-01-26 07:30:37'),
(4, 'NSB00011 ', 'sangat puas', 'tabungan', 'asdf', '2020-01-26 07:30:48'),
(4, 'NSB00012 ', 'cukup', 'tabungan', 'asdf', '2020-01-26 07:31:00'),
(4, 'NSB00013 ', 'sangat tidak puas', '', 'alksjd', '2020-01-26 07:31:12'),
(4, 'NSB00014 ', 'cukup', 'deposito', 'alskj', '2020-01-26 07:31:30'),
(5, 'NSB00015 ', 'sangat puas', 'deposito', 'alksjfdh', '2020-01-26 07:31:58'),
(5, 'NSB00016 ', 'tidak puas', 'tabungan', 'alskdjhdf', '2020-01-26 07:32:11'),
(5, 'NSB00017 ', 'cukup', 'deposito', 'alskdj', '2020-01-26 07:32:21'),
(5, 'NSB00018 ', 'puas', 'tabungan', 'alskdjf', '2020-01-26 07:32:32'),
(5, 'NSB00019 ', 'puas', 'deposito', 'alksdhhf', '2020-01-26 07:32:42'),
(3, 'NSB00020 ', 'puas', 'tabungan', 'asdddd', '2020-01-26 07:33:33'),
(3, 'NSB00021 ', 'cukup', 'tabungan', 'alllksks', '2020-01-26 07:33:44'),
(3, 'NSB00022 ', 'sangat puas', 'deposito', 'askdj', '2020-01-26 07:33:59'),
(3, 'NSB00023 ', 'puas', 'tabungan', 'mmmmmm', '2020-02-03 09:31:47'),
(6, 'NSB00024 ', 'puas', 'tabungan', 'aaaaaaaaaaa', '2020-02-05 14:14:43'),
(6, 'NSB00025 ', '', 'tabungan', 'aaaaaaaaaaaaa', '2020-02-05 14:16:33'),
(3, 'NSB00026 ', 'cukup', 'tabungan', 'zzzzzzzzzz', '2020-02-05 16:15:24'),
(3, 'NSB00027 ', '', 'tabungan', 'zzzzzzzzzz', '2020-02-05 16:15:40'),
(6, 'NSB00028 ', 'sangat tidak puas', 'tabungan', 'asff', '2020-02-06 04:09:57'),
(6, 'NSB00029 ', 'sangat puas', 'deposito', 'asddf', '2020-02-06 08:53:53'),
(6, 'NSB00030 ', 'sangat puas', 'deposito', 'asddf', '2020-02-06 08:54:40'),
(6, 'NSB00031 ', 'puas', 'kredit', 'assssssssssss', '2020-02-06 11:55:50'),
(6, 'NSB00032 ', 'cukup', 'tabungan', 'mmmmm', '2020-02-06 16:17:50'),
(6, 'NSB00033 ', 'cukup', 'tabungan', 'mmmmmm', '2020-02-06 16:18:54'),
(6, 'NSB00034 ', 'sangat puas', 'deposito', 'baik', '2020-02-07 05:29:29'),
(6, 'NSB00035 ', 'puas', 'deposito', 'baik', '2020-02-07 10:17:04'),
(6, 'NSB00036 ', 'sangat tidak puas', 'tabungan', 'waw', '2020-02-28 17:33:26'),
(6, 'NSB00037 ', 'sangat puas', 'deposito', 'aaa', '2020-02-29 05:41:55'),
(6, 'NSB00038 ', 'puas', 'tabungan', 'gjhkl', '2020-02-29 13:14:18'),
(6, 'NSB00039 ', 'cukup', 'tabungan', 'cvnm', '2020-03-01 09:11:36'),
(6, 'NSB00040 ', 'sangat puas', 'deposito', 'sangat baik', '2020-03-04 21:37:52'),
(6, 'NSB00041 ', 'sangat puas', 'tabungan', 'pelayanan baik', '2020-05-04 15:20:40'),
(6, 'NSB00042 ', 'cukup', 'kredit', 'kurang sopan', '2020-05-04 15:21:15'),
(6, 'NSB00043 ', 'puas', 'deposito', 'ramah', '2020-05-04 15:21:28');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(50) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(20) NOT NULL,
  `posisi` varchar(20) NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `id_user` (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `level`, `posisi`) VALUES
(1, 'Nadira Syafarina', 'nadira', '5a80873c9023d65558359cfd56b70cdf', 'user', 'cs'),
(2, 'Fetty Krisnaeni', 'admin', 'e00cf25ad42683b3df678c61f42c6bda', 'admin', 'admin'),
(3, 'Iva Nisa Pertiwi', 'iva', '78ecfcd18394b3b7073c4846c3b44477', 'user', 'teller'),
(4, 'Marta Dwi Kurniati', 'marta', '17d3bc461c7594dd9b719bcc21afcc47', 'user', 'teller'),
(5, 'Zahra Nur Fadilah', 'zahra', 'bc664fdaf9648c8e893a4ea33b683b62', 'user', 'cs'),
(6, 'Fetty Krisnaeni', 'fetty', '6554bd693e55451fd33a080509d758ea', 'user', 'cs'),
(10, 'Nana', 'nana', 'd95fce38f50fe71dc904c4e641495b5f', 'admin', 'admin');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hasil_survey`
--
ALTER TABLE `hasil_survey`
  ADD CONSTRAINT `hasil_survey_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
