-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2021 at 03:25 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cookaja`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jawaban_forum`
--

CREATE TABLE `jawaban_forum` (
  `id` int(11) NOT NULL,
  `id_pertanyaan` int(11) NOT NULL,
  `id_username` int(11) NOT NULL,
  `isi_konten` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `id_resep` int(11) NOT NULL,
  `nama_kategori` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `metode_pembayaran`
--

CREATE TABLE `metode_pembayaran` (
  `id` int(11) NOT NULL,
  `id_pembayaran` int(11) NOT NULL,
  `metode` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `kodeBayar` int(60) NOT NULL,
  `tglBayar` datetime NOT NULL,
  `total` int(11) NOT NULL,
  `noRek` int(120) NOT NULL,
  `status` varchar(120) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pertanyaan_forum`
--

CREATE TABLE `pertanyaan_forum` (
  `id` int(11) NOT NULL,
  `id_username` varchar(60) NOT NULL,
  `isi_konten` text NOT NULL,
  `comment` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `resep`
--

CREATE TABLE `resep` (
  `id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `namaResep` varchar(60) NOT NULL,
  `kategori` varchar(120) NOT NULL,
  `bahan` text NOT NULL,
  `tutorial` text NOT NULL,
  `tgl` datetime NOT NULL,
  `berbayar` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sponsor`
--

CREATE TABLE `sponsor` (
  `id` int(11) NOT NULL,
  `nama_sponsor` varchar(60) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ulasan_resep`
--

CREATE TABLE `ulasan_resep` (
  `id` int(11) NOT NULL,
  `ulasan` text NOT NULL,
  `bintang` int(5) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `email` varchar(120) NOT NULL,
  `password` varchar(60) NOT NULL,
  `vip_start` datetime NOT NULL,
  `vip_end` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jawaban_forum`
--
ALTER TABLE `jawaban_forum`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pertanyaan` (`id_pertanyaan`),
  ADD KEY `id_username` (`id_username`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_resep` (`id_resep`);

--
-- Indexes for table `metode_pembayaran`
--
ALTER TABLE `metode_pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pembayaran` (`id_pembayaran`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `pertanyaan_forum`
--
ALTER TABLE `pertanyaan_forum`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_username` (`id_username`);

--
-- Indexes for table `resep`
--
ALTER TABLE `resep`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sponsor`
--
ALTER TABLE `sponsor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ulasan_resep`
--
ALTER TABLE `ulasan_resep`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`id`);

--
-- Constraints for table `jawaban_forum`
--
ALTER TABLE `jawaban_forum`
  ADD CONSTRAINT `jawaban_forum_ibfk_1` FOREIGN KEY (`id_pertanyaan`) REFERENCES `pertanyaan_forum` (`id`);

--
-- Constraints for table `kategori`
--
ALTER TABLE `kategori`
  ADD CONSTRAINT `kategori_ibfk_1` FOREIGN KEY (`id_resep`) REFERENCES `resep` (`id`);

--
-- Constraints for table `metode_pembayaran`
--
ALTER TABLE `metode_pembayaran`
  ADD CONSTRAINT `metode_pembayaran_ibfk_1` FOREIGN KEY (`id_pembayaran`) REFERENCES `pembayaran` (`id`);

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id`) REFERENCES `admin` (`id`),
  ADD CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Constraints for table `pertanyaan_forum`
--
ALTER TABLE `pertanyaan_forum`
  ADD CONSTRAINT `pertanyaan_forum_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`id`);

--
-- Constraints for table `resep`
--
ALTER TABLE `resep`
  ADD CONSTRAINT `resep_ibfk_1` FOREIGN KEY (`id`) REFERENCES `admin` (`id`);

--
-- Constraints for table `sponsor`
--
ALTER TABLE `sponsor`
  ADD CONSTRAINT `sponsor_ibfk_1` FOREIGN KEY (`id`) REFERENCES `resep` (`id`);

--
-- Constraints for table `ulasan_resep`
--
ALTER TABLE `ulasan_resep`
  ADD CONSTRAINT `ulasan_resep_ibfk_1` FOREIGN KEY (`id`) REFERENCES `resep` (`id`),
  ADD CONSTRAINT `ulasan_resep_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id`) REFERENCES `ulasan` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
