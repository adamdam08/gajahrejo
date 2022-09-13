-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2020 at 10:58 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gajahrejo`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `id_user` int(32) NOT NULL,
  `namabarang` varchar(255) NOT NULL,
  `descbarang` text NOT NULL,
  `jenisbarang` varchar(50) NOT NULL,
  `hargabarang` int(10) NOT NULL,
  `jumlahbarang` int(200) NOT NULL,
  `diskon` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `id_user`, `namabarang`, `descbarang`, `jenisbarang`, `hargabarang`, `jumlahbarang`, `diskon`, `status`) VALUES
(1, 1, 'Adada', 'adadad', 'coffee', 55555, 999, 10, NULL),
(2, 1, 'Adada', 'adadad', 'coffee', 55555, 999, 10, NULL),
(31, 5, 'me', 'me me me me me', 'other', 2000, 2, 20, NULL),
(35, 5, 'apel', 'apel malang', 'coffee', 9000, 3, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `barangimg`
--

CREATE TABLE `barangimg` (
  `id_img` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barangimg`
--

INSERT INTO `barangimg` (`id_img`, `id_barang`, `image`) VALUES
(1, 1, 'wp41296182.jpg'),
(2, 1, 'yrriexpdi3l6avlcgrudqv6ovz7lkbcm_002.jpg'),
(3, 1, 'yume2.png'),
(4, 1, 'zxc2.PNG'),
(5, 2, 'iwtep.jpg'),
(6, 2, 'iwtep1.jpg'),
(7, 2, 'iwtep2.jpg'),
(8, 2, 'JOI-waifu-wednesday-kosaki-onodera-5.jpg'),
(9, 3, 'asphalt-texture-road-away.jpg'),
(10, 3, 'asthemoon.jpg'),
(11, 3, 'asthemoon2.jpg'),
(12, 3, 'cdeea59ea8a0e25b03aad8a0e3744862.jpg'),
(13, 4, 'kumpulkan.jpg'),
(14, 6, 'kumpulkan1.jpg'),
(15, 7, 'kumpulkan2.jpg'),
(16, 9, 'kumpulkan3.jpg'),
(17, 10, 'kumpulkan4.jpg'),
(18, 11, 'kumpulkan5.jpg'),
(19, 12, 'kumpulkan6.jpg'),
(20, 13, 'kumpulkan7.jpg'),
(21, 14, 'kumpulkan8.jpg'),
(22, 15, 'kumpulkan9.jpg'),
(23, 18, 'kumpulkan10.jpg'),
(24, 19, 'kumpulkan11.jpg'),
(25, 20, 'kumpulkan12.jpg'),
(26, 21, 'kumpulkan13.jpg'),
(27, 22, 'kumpulkan14.jpg'),
(28, 23, 'kumpulkan15.jpg'),
(29, 24, 'kumpulkan16.jpg'),
(30, 25, 'kumpulkan17.jpg'),
(31, 26, 'kumpulkan18.jpg'),
(32, 30, '1.jpg'),
(33, 30, '2.jpg'),
(34, 30, '3.jpg'),
(35, 30, '4.jpg'),
(36, 31, 'monevjar_pengolahan_citra_farhan.JPG'),
(38, 35, '11.jpg'),
(39, 35, '21.jpg'),
(40, 35, '31.jpg'),
(41, 35, '41.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ereceipt`
--

CREATE TABLE `ereceipt` (
  `namapenjual` varchar(10) NOT NULL,
  `namabarang` varchar(100) NOT NULL,
  `alamatpenjual` text NOT NULL,
  `namapembeli` varchar(10) NOT NULL,
  `alamatpembeli` text NOT NULL,
  `jumlahbarang` int(200) NOT NULL,
  `hargabarang` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `favourite`
--

CREATE TABLE `favourite` (
  `id_favourite` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `favourite`
--

INSERT INTO `favourite` (`id_favourite`, `id_barang`, `id_user`) VALUES
(4, 2, 1),
(5, 1, 1),
(6, 3, 1),
(7, 1, 5),
(8, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(12) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_pembeli` int(11) DEFAULT NULL,
  `status_login` tinyint(1) NOT NULL,
  `nama_pembeli` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `status_pembelian` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `id_barang`, `id_pembeli`, `status_login`, `nama_pembeli`, `alamat`, `telepon`, `jumlah`, `status_pembelian`) VALUES
(5, 2, 5, 1, 'bakwan', 'malang rt 01 01', '6281246082297', 2, NULL),
(6, 2, NULL, 0, 'nisa', 'ntah', '3413412', 2, NULL),
(11, 35, 6, 1, 'farhan', 'solo', '127491244124', 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(256) NOT NULL,
  `forename` varchar(32) NOT NULL,
  `surname` varchar(32) NOT NULL,
  `address` varchar(256) NOT NULL,
  `city` varchar(32) NOT NULL,
  `province` varchar(32) NOT NULL,
  `post_code` int(11) NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `forename`, `surname`, `address`, `city`, `province`, `post_code`, `telepon`, `date_created`) VALUES
(1, 'adam', '$2y$10$aX//weCEV/1IpxErnY7Rju5rZqdEWdROtFL2iWF37eBw5uOQSn.Ie', 'Adam', 'Rahmawan', 'Jl.Pangeran Diponegoro NO.91', 'Trenggalek', 'Jawa Timur', 66315, '085815368964', 1604400166),
(2, 'adamdam08', '$2y$10$43HE8.pcWOEDpAlJImucFu8JPmRDOH1mluCDYPhLNwqgBzIyQW9Yq', 'Adam', 'Rachmawan', 'Jl.Pangeran Diponegoro NO.91', 'Trenggalek', 'Jawa Timur', 66315, '085815368965', 1604478767),
(5, 'bakwan', '$2y$10$GofOBp4B0HM/Cpaq.V1siedxDnhWxYVCvCIHp3T3vMpNxRmbMelxS', 'bakwan', 'coklat', 'malang rt 01 01', 'Malang', 'Jawa Timur', 2412, '6281246082297', 1604936143),
(6, 'farhan', '$2y$10$JUYKFa567MKlWghX/MiEp.8xK8duhT.xF8DRKtTcoKmlSLp/59KYi', 'farhan', 'fadhilah', 'solo', 'surakarta', 'jawa tengah', 3451, '127491244124', 1604999061);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `barangimg`
--
ALTER TABLE `barangimg`
  ADD PRIMARY KEY (`id_img`);

--
-- Indexes for table `favourite`
--
ALTER TABLE `favourite`
  ADD PRIMARY KEY (`id_favourite`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `barangimg`
--
ALTER TABLE `barangimg`
  MODIFY `id_img` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `favourite`
--
ALTER TABLE `favourite`
  MODIFY `id_favourite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
