-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2021 at 11:01 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(256) NOT NULL,
  `nama_lengkap` varchar(30) NOT NULL,
  `img_dir` varchar(256) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `nama_lengkap`, `img_dir`) VALUES
('audyruslan', '$2y$10$YJMlsasuDDlkgqAUS/.XdOeu/6/gPq1Z9dr1xAe.j40T8TtjfnD5S', 'Audy Ruslan', 'image/1638426625.png'),
('ummul', '$2y$10$k9SBhkrRusm24tCeYnPS5eLgJasPQCP30El1QmKzQ1w0DbJosdmQ.', 'Ummul Fajri Rahmat', 'image/1638959631.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_data`
--

CREATE TABLE `tb_data` (
  `id` int(11) NOT NULL,
  `no_kk` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(256) NOT NULL,
  `usia` int(11) NOT NULL,
  `pendidikan_terakhir` varchar(255) NOT NULL,
  `pekerjaan` varchar(255) NOT NULL,
  `pendapatan_perbulan` varchar(256) NOT NULL,
  `kondisi_hunian` varchar(256) NOT NULL,
  `sejahtera` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_data`
--

INSERT INTO `tb_data` (`id`, `no_kk`, `nama_lengkap`, `jenis_kelamin`, `usia`, `pendidikan_terakhir`, `pekerjaan`, `pendapatan_perbulan`, `kondisi_hunian`, `sejahtera`) VALUES
(4, '7208020701990002', 'Ummul Fajri Rahmat', 'Laki-laki', 58, 'SD', 'Tidak Bekerja', 'Rendah', 'Tidak Layak', 'Tidak'),
(5, '7208020701990003', 'Yusran Halik Larisi', 'Laki-laki', 63, 'SMA', 'Wiraswasta', 'Tinggi', 'Layak', 'Ya'),
(7, '7208020701990005', 'Sapriadi', 'Laki-laki', 39, 'SMP', 'Nelayan', 'Rendah', 'Tidak Layak', 'Tidak'),
(8, '7208020701990006', 'Fadli Nur Zaman', 'Laki-laki', 52, 'S1', 'PNS', 'Sangat Tinggi', 'Layak', 'Ya'),
(9, '7208020701990007', 'Moh. Arfhan Afandy', 'Laki-laki', 32, 'SMA', 'Tidak Bekerja', 'Rendah', 'Tidak Layak', 'Tidak'),
(10, '7208020701990004', 'Irmalia', 'Perempuan', 69, 'D3', 'Petani', 'Tinggi', 'Layak', 'Ya'),
(11, '7208020701990008', 'Fikran', 'Laki-laki', 39, 'D3', 'Nelayan', 'Cukup', 'Cukup Layak', 'Ya'),
(12, '7208020701990009', 'Moh. Nur M Tahher', 'Laki-laki', 31, 'S1', 'PNS', 'Tinggi', 'Layak', 'Ya'),
(13, '72080207019900010', 'Zulkifli', 'Laki-laki', 52, 'SMP', 'Wiraswasta', 'Rendah', 'Tidak Layak', 'Tidak'),
(14, '7208020701990001', 'Audy Ruslan', 'Laki-laki', 58, 'SMP', 'Nelayan', 'Cukup', 'Cukup Layak', 'Tidak');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id` int(11) NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `nilai` int(11) NOT NULL,
  `hasil` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`id`, `kelas`, `nilai`, `hasil`) VALUES
(1, 'Ya', 5, 0.5),
(2, 'Tidak', 5, 0.5);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kondisi`
--

CREATE TABLE `tb_kondisi` (
  `id` int(11) NOT NULL,
  `nama_kriteria` varchar(255) NOT NULL,
  `kondisi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kondisi`
--

INSERT INTO `tb_kondisi` (`id`, `nama_kriteria`, `kondisi`) VALUES
(3, 'Pendidikan Terakhir', 'SMP'),
(4, 'Pendidikan Terakhir', 'SMA'),
(6, 'Pendidikan Terakhir', 'S1'),
(7, 'Pendidikan Terakhir', 'D3'),
(9, 'Pekerjaan', 'Tidak Bekerja'),
(10, 'Pekerjaan', 'Nelayan'),
(11, 'Pekerjaan', 'Petani'),
(12, 'Pekerjaan', 'Wiraswasta'),
(13, 'Pekerjaan', 'PNS'),
(14, 'Pendapatan Perbulan', 'Cukup'),
(15, 'Pendapatan Perbulan', 'Rendah'),
(16, 'Pendapatan Perbulan', 'Tinggi'),
(17, 'Pendapatan Perbulan', 'Sangat Tinggi'),
(18, 'Kondisi Hunian', 'Layak'),
(19, 'Kondisi Hunian', 'Cukup Layak'),
(20, 'Kondisi Hunian', 'Tidak Layak'),
(22, 'Sejahtera', 'Ya'),
(23, 'Sejahtera', 'Tidak'),
(24, 'Pendidikan Terakhir', 'SD'),
(25, 'Usia', 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kriteria`
--

CREATE TABLE `tb_kriteria` (
  `id` int(11) NOT NULL,
  `nama_kriteria` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kriteria`
--

INSERT INTO `tb_kriteria` (`id`, `nama_kriteria`) VALUES
(3, 'Usia'),
(7, 'Pendidikan Terakhir'),
(8, 'Pekerjaan'),
(9, 'Pendapatan Perbulan'),
(10, 'Kondisi Hunian'),
(11, 'Sejahtera');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penduduk`
--

CREATE TABLE `tb_penduduk` (
  `id` int(11) NOT NULL,
  `no_kk` varchar(256) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_penduduk`
--

INSERT INTO `tb_penduduk` (`id`, `no_kk`, `nama_lengkap`, `jenis_kelamin`, `status`) VALUES
(1, '7208020701990001', 'Audy Ruslan', 'Laki-laki', 1),
(2, '7208020701990002', 'Ummul Fajri Rahmat', 'Laki-laki', 1),
(3, '7208020701990003', 'Yusran Halik Larisi', 'Laki-laki', 1),
(4, '7208020701990004', 'Irmalia', 'Perempuan', 1),
(5, '7208020701990005', 'Sapriadi', 'Laki-laki', 1),
(6, '7208020701990006', 'Fadli Nur Zaman', 'Laki-laki', 1),
(7, '7208020701990007', 'Moh. Arfhan Afandy', 'Laki-laki', 1),
(8, '7208020701990008', 'Fikran', 'Laki-laki', 1),
(9, '7208020701990009', 'Moh. Nur M Taher', 'Laki-laki', 1),
(10, '72080207019900010', 'Zulkifli', 'Laki-laki', 1),
(11, '72080207019900011', 'Whalid Dwi Aditya', 'Laki-laki', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `tb_data`
--
ALTER TABLE `tb_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kondisi`
--
ALTER TABLE `tb_kondisi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kriteria`
--
ALTER TABLE `tb_kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_penduduk`
--
ALTER TABLE `tb_penduduk`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_data`
--
ALTER TABLE `tb_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_kondisi`
--
ALTER TABLE `tb_kondisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tb_kriteria`
--
ALTER TABLE `tb_kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_penduduk`
--
ALTER TABLE `tb_penduduk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
