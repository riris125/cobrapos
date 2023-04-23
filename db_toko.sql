-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2023 at 05:41 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_toko`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `id_barang` varchar(255) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_barang` text NOT NULL,
  `merk` varchar(255) NOT NULL,
  `harga_beli` varchar(255) NOT NULL,
  `harga_jual` varchar(255) NOT NULL,
  `satuan_barang` varchar(255) NOT NULL,
  `stok` text NOT NULL,
  `tgl_input` varchar(255) NOT NULL,
  `tgl_update` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `id_barang`, `id_kategori`, `nama_barang`, `merk`, `harga_beli`, `harga_jual`, `satuan_barang`, `stok`, `tgl_input`, `tgl_update`) VALUES
(1, 'BR001', 1, 'Pensil', 'Fabel Castel', '1500', '3000', 'PCS', '91', '6 October 2020, 0:41', NULL),
(2, 'BR002', 5, 'Sabun', 'Lifeboy', '1800', '3000', 'PCS', '18', '6 October 2020, 0:41', '6 October 2020, 0:54'),
(3, 'BR003', 1, 'Pulpen', 'Standard', '1500', '2000', 'PCS', '60', '6 October 2020, 1:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `tgl_input` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `tgl_input`) VALUES
(1, 'ATK', '7 May 2017, 10:23'),
(5, 'Sabun', '7 May 2017, 10:28'),
(6, 'Snack', '6 October 2020, 0:19'),
(7, 'Minuman', '6 October 2020, 0:20');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id_login` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id_login`, `user`, `pass`) VALUES
(1, 'admin', '$2y$10$gejrJgFK59e7Y3buijB14OZDbjAzEvZzJVU/APOekE5SkF/5qq1dy'),
(2, 'kasir', '$2y$10$EkiZ.lu36X0demlmlE8HxenTqwZ/MrXSmhhN.P1hE8sTeVt3YbGBW');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id_member` int(11) NOT NULL,
  `nm_member` varchar(255) NOT NULL,
  `alamat_member` text NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `NIK` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id_member`, `nm_member`, `alamat_member`, `telepon`, `email`, `NIK`) VALUES
(1, 'Fauzan', 'Jogja', '081234567895', 'fauzan@gmail.com', '3402151005860001'),
(2, 'Herdianto K', 'Bantul', '085739964961', 'riris125@gmail.com', '3402151005860005'),
(3, 'Andi', 'Sleman', '088924049888', 'andi@mail.com', '3402151005860000');

-- --------------------------------------------------------

--
-- Table structure for table `nota`
--

CREATE TABLE `nota` (
  `id_nota` int(11) NOT NULL,
  `id_barang` varchar(255) NOT NULL,
  `id_member` int(11) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `tanggal_input` varchar(255) NOT NULL,
  `periode` varchar(255) DEFAULT NULL,
  `no_faktur` varchar(255) NOT NULL,
  `id_penjualan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `nota`
--

INSERT INTO `nota` (`id_nota`, `id_barang`, `id_member`, `jumlah`, `total`, `tanggal_input`, `periode`, `no_faktur`, `id_penjualan`) VALUES
(63, 'BR002', 1, '2', '6000', '21 Maret 2023, 8:18', '3-2023', '123', 26),
(64, 'BR001', 1, '1', '3000', '21 Maret 2023, 8:18', '3-2023', '123', 27),
(65, 'BR002', 1, '2', '6000', '21 Maret 2023, 8:18', '3-2023', '444', 26),
(66, 'BR001', 1, '1', '3000', '21 Maret 2023, 8:18', '3-2023', '444', 27),
(67, 'BR002', 1, '2', '6000', '21 April 2023, 8:18', '4-2023', '22', 26),
(68, 'BR001', 1, '1', '3000', '21 April 2023, 8:18', '4-2023', '22', 27),
(69, 'BR002', 1, '2', '6000', '21 April 2023, 8:18', '4-2023', '55', 26),
(70, 'BR001', 1, '1', '3000', '21 April 2023, 8:18', '4-2023', '55', 27),
(71, 'BR002', 1, '2', '6000', '21 April 2023, 8:18', '4-2023', '11', 26),
(72, 'BR001', 1, '1', '3000', '21 April 2023, 8:18', '4-2023', '11', 27),
(73, 'BR002', 1, '2', '6000', '21 April 2023, 8:18', '4-2023', '111', 26),
(74, 'BR001', 1, '1', '3000', '21 April 2023, 8:18', '4-2023', '111', 27),
(75, 'BR002', 1, '1', '3000', '23 April 2023, 11:32', '4-2023', '321', 29),
(76, 'BR001', 1, '1', '3000', '23 April 2023, 11:32', '4-2023', '321', 30),
(77, 'BR003', 1, '10', '20000', '23 April 2023, 11:33', '4-2023', '321', 31),
(78, 'BR001', 2, '1', '3000', '23 April 2023, 12:54', '4-2023', '42342', 34),
(79, 'BR001', 2, '1', '3000', '23 April 2023, 16:29', '4-2023', '42342', 35),
(80, 'BR002', 2, '1', '3000', '23 April 2023, 16:29', '4-2023', '42342', 36);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `id_barang` varchar(255) NOT NULL,
  `id_login` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `tanggal_input` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `toko`
--

CREATE TABLE `toko` (
  `id_toko` int(11) NOT NULL,
  `nama_toko` varchar(255) NOT NULL,
  `alamat_toko` text NOT NULL,
  `tlp` varchar(255) NOT NULL,
  `nama_pemilik` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `toko`
--

INSERT INTO `toko` (`id_toko`, `nama_toko`, `alamat_toko`, `tlp`, `nama_pemilik`) VALUES
(1, 'CV Daruttaqwa', 'Ujung Harapan', '081234567890', 'Fauzan Falah');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`id_nota`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indexes for table `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`id_toko`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nota`
--
ALTER TABLE `nota`
  MODIFY `id_nota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `toko`
--
ALTER TABLE `toko`
  MODIFY `id_toko` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
