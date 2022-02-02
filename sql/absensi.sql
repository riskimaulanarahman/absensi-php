-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 02, 2022 at 09:42 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absensi`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id` int(11) NOT NULL,
  `rfid` int(11) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `nidn` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jam_masuk` time DEFAULT NULL,
  `jam_istirahat` time DEFAULT NULL,
  `jam_kembali` time DEFAULT NULL,
  `jam_pulang` time DEFAULT NULL,
  `kegiatan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id`, `rfid`, `nama`, `nidn`, `tanggal`, `jam_masuk`, `jam_istirahat`, `jam_kembali`, `jam_pulang`, `kegiatan`) VALUES
(24, 99003, 'wulan', '0019293', '2022-02-01', '08:44:28', NULL, NULL, NULL, NULL),
(25, 99003, 'wulan', '0019293', '2022-02-02', '11:01:11', NULL, NULL, NULL, NULL),
(26, 99002, 'Muhammad Rafli', '1234566', '2022-02-02', '11:08:15', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `setting_status`
--

CREATE TABLE `setting_status` (
  `id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setting_status`
--

INSERT INTO `setting_status` (`id`, `status`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `status_absen`
--

CREATE TABLE `status_absen` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_absen`
--

INSERT INTO `status_absen` (`id`, `status`) VALUES
(1, 'Jam Masuk'),
(2, 'Jam Istirahat'),
(3, 'Jam Kembali'),
(4, 'Jam Pulang');

-- --------------------------------------------------------

--
-- Table structure for table `tahunbulan`
--

CREATE TABLE `tahunbulan` (
  `id` int(11) NOT NULL,
  `tahun` varchar(255) DEFAULT NULL,
  `bulan` varchar(255) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tahunbulan`
--

INSERT INTO `tahunbulan` (`id`, `tahun`, `bulan`, `jumlah`) VALUES
(1, '2022', '1', 31),
(2, '2022', '2', 28);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `rfid` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nidn` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL,
  `photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `rfid`, `username`, `password`, `nidn`, `nama`, `jenis_kelamin`, `tgl_lahir`, `alamat`, `jabatan`, `email`, `level`, `photo`) VALUES
(1242, 99002, 'rafli', 'e821a8bfc2c786f275e5d5ea94d519a7', '1234566', 'Muhammad Rafli', 'Laki - Laki', '2001-12-03', 'Purwakarta', 'wakil ketua', 'com0312@gmail.com', 'Karyawan', NULL),
(1243, 99003, 'wulan', 'aae79912250d18756900f742270de7e1', '0019293', 'wulan', 'Laki - Laki', '2001-12-03', '', 'Karyawan', '', 'Karyawan', NULL),
(1244, 0, 'admin', '21232f297a57a5a743894a0e4a801fc3', '1234567890', 'Admin', '', '2001-12-03', '', 'administrator', '', 'Administrator', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rfid_1` (`rfid`);

--
-- Indexes for table `setting_status`
--
ALTER TABLE `setting_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_absen`
--
ALTER TABLE `status_absen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tahunbulan`
--
ALTER TABLE `tahunbulan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rfid` (`rfid`),
  ADD UNIQUE KEY `username` (`username`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `setting_status`
--
ALTER TABLE `setting_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `status_absen`
--
ALTER TABLE `status_absen`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tahunbulan`
--
ALTER TABLE `tahunbulan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1247;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absensi`
--
ALTER TABLE `absensi`
  ADD CONSTRAINT `rfid_1` FOREIGN KEY (`rfid`) REFERENCES `user` (`rfid`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
