-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2023 at 09:45 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_detailkegiatan`
--

CREATE TABLE `tb_detailkegiatan` (
  `id_detailkegiatan` int(11) NOT NULL,
  `kode_kegiatan` varchar(45) NOT NULL,
  `hari` date DEFAULT NULL,
  `id_kegiatan` int(11) NOT NULL,
  `id_narasumber` int(11) NOT NULL,
  `id_room` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kegiatan`
--

CREATE TABLE `tb_kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `kode_kegiatan` varchar(45) NOT NULL,
  `nama_kegiatan` varchar(45) NOT NULL,
  `jam` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_narasumber`
--

CREATE TABLE `tb_narasumber` (
  `id_narasumber` int(11) NOT NULL,
  `kode_narasumber` varchar(45) NOT NULL,
  `materi` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pegawai`
--

CREATE TABLE `tb_pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `kode_pegawai` varchar(45) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `jk` varchar(45) NOT NULL,
  `no_hp` int(11) NOT NULL,
  `agama` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pendaftaran`
--

CREATE TABLE `tb_pendaftaran` (
  `id_pendaftaran` int(11) NOT NULL,
  `kode_pendaftaran` varchar(45) NOT NULL,
  `status_kehadiran` varchar(45) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `id_detailkegiatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_room`
--

CREATE TABLE `tb_room` (
  `id_room` int(11) NOT NULL,
  `room` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_detailkegiatan`
--
ALTER TABLE `tb_detailkegiatan`
  ADD PRIMARY KEY (`id_detailkegiatan`),
  ADD UNIQUE KEY `kode_kegiatan_UNIQUE` (`kode_kegiatan`),
  ADD KEY `fk_tb_detailkegiatan_tb_kegiatan_idx` (`id_kegiatan`),
  ADD KEY `fk_tb_detailkegiatan_tb_narasumber1_idx` (`id_narasumber`),
  ADD KEY `fk_tb_detailkegiatan_tb_room1_idx` (`id_room`);

--
-- Indexes for table `tb_kegiatan`
--
ALTER TABLE `tb_kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`),
  ADD UNIQUE KEY `kode_kegiatan_UNIQUE` (`kode_kegiatan`);

--
-- Indexes for table `tb_narasumber`
--
ALTER TABLE `tb_narasumber`
  ADD PRIMARY KEY (`id_narasumber`),
  ADD UNIQUE KEY `kode_narasumber_UNIQUE` (`kode_narasumber`);

--
-- Indexes for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD UNIQUE KEY `kode_pegawai_UNIQUE` (`kode_pegawai`),
  ADD UNIQUE KEY `no_hp_UNIQUE` (`no_hp`);

--
-- Indexes for table `tb_pendaftaran`
--
ALTER TABLE `tb_pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`),
  ADD UNIQUE KEY `kode_pendaftaran_UNIQUE` (`kode_pendaftaran`),
  ADD KEY `fk_tb_pendaftaran_tb_pegawai1_idx` (`id_pegawai`),
  ADD KEY `fk_tb_pendaftaran_tb_detailkegiatan1_idx` (`id_detailkegiatan`);

--
-- Indexes for table `tb_room`
--
ALTER TABLE `tb_room`
  ADD PRIMARY KEY (`id_room`),
  ADD UNIQUE KEY `room_UNIQUE` (`room`),
  ADD UNIQUE KEY `password_UNIQUE` (`password`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_detailkegiatan`
--
ALTER TABLE `tb_detailkegiatan`
  MODIFY `id_detailkegiatan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_kegiatan`
--
ALTER TABLE `tb_kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_detailkegiatan`
--
ALTER TABLE `tb_detailkegiatan`
  ADD CONSTRAINT `fk_tb_detailkegiatan_tb_kegiatan` FOREIGN KEY (`id_kegiatan`) REFERENCES `tb_kegiatan` (`id_kegiatan`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tb_detailkegiatan_tb_narasumber1` FOREIGN KEY (`id_narasumber`) REFERENCES `tb_narasumber` (`id_narasumber`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tb_detailkegiatan_tb_room1` FOREIGN KEY (`id_room`) REFERENCES `tb_room` (`id_room`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tb_pendaftaran`
--
ALTER TABLE `tb_pendaftaran`
  ADD CONSTRAINT `fk_tb_pendaftaran_tb_detailkegiatan1` FOREIGN KEY (`id_detailkegiatan`) REFERENCES `tb_detailkegiatan` (`id_detailkegiatan`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tb_pendaftaran_tb_pegawai1` FOREIGN KEY (`id_pegawai`) REFERENCES `tb_pegawai` (`id_pegawai`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
