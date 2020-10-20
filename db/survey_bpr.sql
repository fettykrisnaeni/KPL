-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2020 at 08:22 PM
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
(6, 'NSB00033 ', 'cukup', 'tabungan', 'mmmmmm', '2020-02-06 16:18:54');

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
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `level`, `posisi`) VALUES
(1, 'fetty krisnaeni', 'nana', '518d5f3401534f5c6c21977f12f60989', 'user', 'cs'),
(2, 'fetty', 'nana1', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin'),
(3, 'nanaa', 'nanaa', 'f0c6deb931656895e8a4f02f953ac39e', 'user', 'teller'),
(4, 'marta', 'marta', 'a763a66f984948ca463b081bf0f0e6d0', 'user', 'teller'),
(5, 'zahra', 'zahra', '01e50c681c0b05ff22686b3e0f7290d3', 'user', 'cs'),
(6, 'Fetty Krisnaeni', 'fetty', 'f5953a02b855b12381540a54368353c0', 'user', 'cs'),
(10, 'mam', 'mam', 'b735b0c78e12553e91397a3ff19f8fd1', 'admin', 'admin'),
(11, 'nama', 'nama', 'e3555ebe8b7daf4a9966f8130fb3a93f', 'user', 'cs');

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
