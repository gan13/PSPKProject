-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2017 at 05:55 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ahp`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `alternatif_id` int(11) NOT NULL,
  `nama_alternatif` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`alternatif_id`, `nama_alternatif`) VALUES
(1, 'cauhid'),
(2, 'kerudung'),
(4, 'piscok'),
(5, 'roti kukus hejo');

-- --------------------------------------------------------

--
-- Table structure for table `alternatif_nilai`
--

CREATE TABLE `alternatif_nilai` (
  `alternatif_nilai_id` int(11) NOT NULL,
  `kriteria_id` int(11) NOT NULL,
  `alternatif_id_dari` int(11) NOT NULL,
  `alternatif_id_tujuan` int(11) NOT NULL,
  `nilai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alternatif_nilai`
--

INSERT INTO `alternatif_nilai` (`alternatif_nilai_id`, `kriteria_id`, `alternatif_id_dari`, `alternatif_id_tujuan`, `nilai`) VALUES
(64, 1, 1, 2, 3),
(65, 1, 1, 4, 4),
(66, 1, 2, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `kriteria_id` int(11) NOT NULL,
  `nama_kriteria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`kriteria_id`, `nama_kriteria`) VALUES
(1, 'provit besar'),
(2, 'modal produksi kecil'),
(3, 'dibutuhkan orang'),
(4, 'biaya promosi kecil'),
(5, 'harga bisa ditentukan sendiri'),
(8, 'bisa berkembang/bukan musiman'),
(9, 'barang mudah dijangkau oleh konsumen');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria_nilai`
--

CREATE TABLE `kriteria_nilai` (
  `kriteria_nilai_id` int(11) NOT NULL,
  `b_id` int(11) NOT NULL,
  `kriteria_id_dari` int(11) NOT NULL,
  `kriteria_id_tujuan` int(11) NOT NULL,
  `nilai` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria_nilai`
--

INSERT INTO `kriteria_nilai` (`kriteria_nilai_id`, `b_id`, `kriteria_id_dari`, `kriteria_id_tujuan`, `nilai`) VALUES
(51, 3, 1, 2, 4),
(52, 3, 1, 3, 3),
(53, 3, 1, 4, 2),
(54, 3, 1, 5, 3),
(55, 3, 2, 3, 5),
(56, 3, 2, 4, 6),
(57, 3, 2, 5, 2),
(58, 3, 3, 4, 1),
(59, 3, 3, 5, 6),
(60, 3, 4, 5, 4);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `user_id` int(11) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL,
  `akses` enum('admin','user') NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`user_id`, `nama`, `username`, `password`, `akses`, `photo`) VALUES
(1, 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'ava-c4ca4238a0b923820dcc509a6f75849b.jpg'),
(2, 'user', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`alternatif_id`);

--
-- Indexes for table `alternatif_nilai`
--
ALTER TABLE `alternatif_nilai`
  ADD PRIMARY KEY (`alternatif_nilai_id`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`kriteria_id`);

--
-- Indexes for table `kriteria_nilai`
--
ALTER TABLE `kriteria_nilai`
  ADD PRIMARY KEY (`kriteria_nilai_id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `alternatif_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `alternatif_nilai`
--
ALTER TABLE `alternatif_nilai`
  MODIFY `alternatif_nilai_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `kriteria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `kriteria_nilai`
--
ALTER TABLE `kriteria_nilai`
  MODIFY `kriteria_nilai_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
