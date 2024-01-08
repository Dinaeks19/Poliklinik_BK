-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2024 at 04:58 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `poliklinikuas`
--

-- --------------------------------------------------------

--
-- Table structure for table `daftar_poli`
--

CREATE TABLE `daftar_poli` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_pasien` int(11) UNSIGNED NOT NULL,
  `id_jadwal` int(11) UNSIGNED NOT NULL,
  `keluhan` text NOT NULL,
  `no_antrian` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `daftar_poli`
--

INSERT INTO `daftar_poli` (`id`, `id_pasien`, `id_jadwal`, `keluhan`, `no_antrian`) VALUES
(21, 18, 6, 'demam', 1),
(22, 17, 6, 'demam', 2);

-- --------------------------------------------------------

--
-- Table structure for table `detail_periksa`
--

CREATE TABLE `detail_periksa` (
  `id` int(10) NOT NULL,
  `id_periksa` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_periksa`
--

INSERT INTO `detail_periksa` (`id`, `id_periksa`, `id_obat`) VALUES
(99, 1, 7),
(100, 2, 8),
(101, 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `no_hp` varchar(50) DEFAULT NULL,
  `id_poli` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id`, `nama`, `alamat`, `no_hp`, `id_poli`) VALUES
(3, 'dr. I Ketut Suardana, Sp.PD', 'jakarta', '12345679', 1),
(4, 'dr. Sigit Prasea Kurniawan,Sp.PD', 'semarang', '1111111', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_periksa`
--

CREATE TABLE `jadwal_periksa` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_dokter` int(11) UNSIGNED NOT NULL,
  `hari` enum('senin','selasa','rabu','kamis','jumat') NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `aktif` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal_periksa`
--

INSERT INTO `jadwal_periksa` (`id`, `id_dokter`, `hari`, `jam_mulai`, `jam_selesai`, `aktif`) VALUES
(5, 1, 'senin', '01:15:00', '02:15:00', ''),
(6, 2, 'selasa', '04:15:00', '05:15:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id` int(11) NOT NULL,
  `nama_obat` varbinary(50) NOT NULL,
  `kemasan` varchar(35) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id`, `nama_obat`, `kemasan`, `harga`) VALUES
(6, 0x416d6c6f646970696e207461626c6574203130206d67, 'ktk 3 x 11 tablet', 8750),
(7, 0x476c696d657072696465207461626c65742031206d67, 'ktk 3 x 10 table', 30000),
(8, 0x49627570726f66656e207461626c657420343030206d67, 'kotak 10 x 10 tablet', 28000),
(9, 0x4b616c7369756d204c616b74617420284b616c6b29207461626c657420353030206d67, 'btl 1000 tablet', 69000),
(10, 0x4d6574666f726d696e2048434c207461626c657420353030206d67, 'ktk 10 x 10 tablet', 8000),
(11, 0x4f62617420426174756b20486974616d20284f2e422e48292063616972616e, 'btl 200 ml', 378000),
(12, 0x50617261736574616d6f6c207461626c657420353030206d67, 'ktk 10 x 10 tablet', 20000),
(13, 0x41435420284172746573756e617465207461626c6574203530206d67202b20416d6f6469617175696e6520616e6879647269, '2 blister @ 12 tablet / kotak', 44),
(14, 0x41435420284172746573756e617465207461626c6574203530206d67202b20416d6f6469617175696e6520616e6879647269, '3 blister @ 8 tablet / kotak', 44),
(15, 0x416c62656e6461736f6c2073757370656e736920323030206d672f35206d6c, 'Ktk 10 btl @ 10 ml', 6),
(16, 0x416c62656e64617a6f6c207461626c65742f207461626c6574206b756e79616820343030206d67, 'ktk 5 x 6 tablet', 16),
(17, 0x416c6f707572696e6f6c207461626c657420333030206d67, 'ktk 10 x 10 tablet', 33),
(18, 0x416c7072617a6f6c616d207461626c657420302c3235206d67, 'ktk 10 x 10 tablet', 64),
(19, 0x416c7072617a6f6c616d207461626c657420302c35206d67, 'ktk 10 x 10 tablet', 77),
(20, 0x416c7072617a6f6c616d207461626c65742031206d67, 'ktk 10 x 10 tablet', 118),
(21, 0x416d62726f786f6c207369727570203135206d672f6d6c, 'btl 60 ml ', 5),
(22, 0x416d62726f786f6c207369727570203330206d67, 'ktk 10 x 10 tablet', 21),
(23, 0x416d696c6f72696461207461626c65742035206d67, 'ktk 10 x 10 tablet', 12),
(24, 0x416d696e6f66696c696e20696e6a656b7369203234206d672f6d6c, 'ktk 30 ampul @ 10 ml', 118),
(25, 0x416d6f6b736973696c696e207369727570206b6572696e6720313235206d672f2035206d6c, 'btl 60 ml', 5),
(26, 0x416d706973696c696e206b61706c657420353030206d67, 'ktk 10 x 10 kaplet', 62400);

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `no_ktp` varchar(255) NOT NULL,
  `no_hp` varchar(50) DEFAULT NULL,
  `no_rm` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id`, `nama`, `alamat`, `no_ktp`, `no_hp`, `no_rm`) VALUES
(17, 'Dina Etikasari', 'semarang', '234567890', '12567', '1'),
(18, 'anisa', 'jakarta', '45677899', '12345679', '2'),
(19, 'etika', 'bandung', '456789443', '12567', '3');

-- --------------------------------------------------------

--
-- Table structure for table `periksa`
--

CREATE TABLE `periksa` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_dokter` int(10) UNSIGNED NOT NULL,
  `id_pasien` int(10) UNSIGNED NOT NULL,
  `tgl_periksa` datetime NOT NULL,
  `catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `periksa`
--

INSERT INTO `periksa` (`id`, `id_dokter`, `id_pasien`, `tgl_periksa`, `catatan`) VALUES
(1, 4, 17, '2024-01-06 00:26:00', 'batuk pilek'),
(2, 4, 18, '2024-01-06 00:52:00', 'demam');

-- --------------------------------------------------------

--
-- Table structure for table `poli`
--

CREATE TABLE `poli` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama_poli` varchar(25) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `poli`
--

INSERT INTO `poli` (`id`, `nama_poli`, `keterangan`) VALUES
(1, 'poli gigi', 'pemeriksaan gigi dan gusi'),
(2, 'poli tht', 'pemeriksaan telinga dan tenggorokan');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','dokter','pasien') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`) VALUES
(1, 'dina', '$2y$10$AGF3g8gpFBhMEIT3njImWeVof4EvkzRqnZtfu01aW8aXMCr2tOvAi', 'admin'),
(19, 'eti', '$2y$10$NOh2rHb0L62YptsWBWKtKeIJoBLT.ci7VQvD2I0ZdUCpYjW3.DiK6', 'pasien'),
(20, '', '$2y$10$xfmJgBUjKVUlQAyKwNCt5eDHKaaUPNFvuf.bG0lWEROknR/Zf0VaW', ''),
(21, 'sari', '$2y$10$C39QZulib8xSfi9qPObga.iURdVovpkYas/j07QFyIhxVOqE9vFa2', 'dokter'),
(22, 'popo', '$2y$10$cTqzJ13llFjCYmpOiYUE2.YsPHzvO.vDqHOEhIDKTd02AvNhunDxC', 'admin'),
(23, 'nana', '$2y$10$sEYA8BhkbZ9KILpUh10MvOeVt0m8/oaitxV1.ODeV.YL7GaSt3DkS', 'admin'),
(24, 'jarjit', '$2y$10$DLUpJaILqP4YWnUe.N6q1eB6N/Di7AgZn8fU/hA4VHTlRmvUOffUm', 'dokter'),
(25, 'mail', '$2y$10$WZLSZd9S56jORXYIOQsVbOoAOcZrAs9tC0Ld15xeQNWt0hm.GE8u2', 'dokter'),
(26, 'susanti', '$2y$10$b95EkZ3W3nqhyjPUF33GIuFuCQ5bPDLfyhbUxOb.yTqbNU8mZzpcq', 'pasien'),
(27, 'ipin', '$2y$10$GcKtrTc183muoQlS3U4N.OomWT2lWHIHTzOvqxDNlGoSLO6mfeUmm', 'dokter'),
(28, 'admin', '$2y$10$4EpAMLzQ3Kss8UADPQLCIOZlJMKTye/fit/F67WAHZfDPXJobPRA6', 'admin'),
(29, 'upin', '$2y$10$3BnSiX.Ia7sazYU9J7I9I.Nh4CqY9a/D/pC4LVuhB0Xafirsag0xa', 'dokter'),
(30, 'meimei', '$2y$10$nl51tFBLVJ1H0kau1wTyD.pdGSMp1hf3uLT2oceeYysbrdgHWikry', 'pasien');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daftar_poli`
--
ALTER TABLE `daftar_poli`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_daftar_poli_pasien` (`id_pasien`),
  ADD KEY `fk_daftar_poli_dokter` (`id_jadwal`);

--
-- Indexes for table `detail_periksa`
--
ALTER TABLE `detail_periksa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_dokter_poli` (`id_poli`);

--
-- Indexes for table `jadwal_periksa`
--
ALTER TABLE `jadwal_periksa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_jadwal_periksa_dokter` (`id_dokter`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `periksa`
--
ALTER TABLE `periksa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `poli`
--
ALTER TABLE `poli`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `daftar_poli`
--
ALTER TABLE `daftar_poli`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `detail_periksa`
--
ALTER TABLE `detail_periksa`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jadwal_periksa`
--
ALTER TABLE `jadwal_periksa`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `periksa`
--
ALTER TABLE `periksa`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `poli`
--
ALTER TABLE `poli`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
