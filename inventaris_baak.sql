-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2023 at 12:04 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventaris_baak`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(20) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `gambar` varchar(266) NOT NULL DEFAULT 'dist1.png',
  `deskripsi` text NOT NULL,
  `stok` int(20) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `harga` int(20) NOT NULL,
  `id_kategori` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `gambar`, `deskripsi`, `stok`, `satuan`, `harga`, `id_kategori`) VALUES
(24, 'Ievan', 'download.jpeg', '1', 1, 'buah', 1, 1),
(25, 'ievan', 'images1.jpeg', 'askdjgkasjgaseg', 1, 'buah', 10000, 1),
(26, 'Ievan', 'images_(1).jpeg', 'uu', 1, 'Pilih satuan Barang', 9000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(20) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Alat Tulis'),
(2, 'Elektronik'),
(3, 'Makanan');

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id_notifikasi` int(20) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `isi` text NOT NULL,
  `id_user` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id_request` int(20) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_user` int(20) NOT NULL,
  `id_barang` int(20) NOT NULL,
  `jumlah` int(20) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(20) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `jenis_transaksi` varchar(255) NOT NULL,
  `jumlah` int(20) NOT NULL,
  `id_barang` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(20) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `role`, `password`) VALUES
(8, 'Admin', 'admin@gmail.com', 'Admin', '$2y$10$W71O5xbtKyo/wW5j1D0YFOE1ac2l7kolpqFHU8Zj3XcG4YgSwjXHC'),
(9, 'Ievan', 'ievan@gmail.com', 'User', '$2y$10$EnlpOAxWY5xV.86CyShSj.Vi0biMnH49z8FHKTuI1mq.ym2PPckwy');

-- --------------------------------------------------------

--
-- Table structure for table `verifikasi`
--

CREATE TABLE `verifikasi` (
  `id_verifikasi` int(20) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `catatan` text NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `gambar` (`gambar`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id_notifikasi`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id_request`),
  ADD KEY `id_user_request` (`id_user`),
  ADD KEY `id_barang_request` (`id_barang`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `verifikasi`
--
ALTER TABLE `verifikasi`
  ADD PRIMARY KEY (`id_verifikasi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id_notifikasi` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id_request` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `verifikasi`
--
ALTER TABLE `verifikasi`
  MODIFY `id_verifikasi` int(20) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `id_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

--
-- Constraints for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD CONSTRAINT `id_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `id_barang_request` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`),
  ADD CONSTRAINT `id_user_request` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `id_barang` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
