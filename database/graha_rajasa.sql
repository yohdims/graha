-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2020 at 06:31 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `graha_rajasa`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `kode_barang` varchar(50) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `stok` int(5) NOT NULL,
  `harga_beli` decimal(10,0) NOT NULL,
  `harga_jual` decimal(10,0) NOT NULL,
  `deskripsi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `kode_barang`, `id_supplier`, `nama_barang`, `stok`, `harga_beli`, `harga_jual`, `deskripsi`) VALUES
(0, 'WIP13x23436', 3, 'wiper', 1, '5000', '10000', 'ff'),
(1, 'WIP11x01236', 3, 'wiper SOS', 2, '10000', '20000', 'ff'),
(3, 'PEL13n01336', 5, 'PEL', 2, '15000', '25000', 'PEL BADASS'),
(4, 'Sapu73b02356', 5, 'Sapu', 2, '100000', '120000', 'Sapu BadAss'),
(5, 'Sap9eb557f5', 5, 'Sapu Lidi', 9, '7500', '12000', 'Sapu Lidi Bad ass');

-- --------------------------------------------------------

--
-- Table structure for table `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `id_det_penjualan` int(11) NOT NULL,
  `id_penjualan` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` decimal(11,0) NOT NULL,
  `diskon` decimal(10,0) DEFAULT NULL,
  `subtotal` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `det_order_barang`
--

CREATE TABLE `det_order_barang` (
  `id_det_order_brg` int(11) NOT NULL,
  `id_order_barang` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `subtotal` decimal(10,0) NOT NULL,
  `status` enum('keranjang','menunggu','acc','diorder','selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_barang`
--

CREATE TABLE `order_barang` (
  `id_order_barang` int(11) NOT NULL,
  `tanggal_order_brg` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_barang`
--

INSERT INTO `order_barang` (`id_order_barang`, `tanggal_order_brg`, `id_user`) VALUES
(6, '2020-05-30 22:44:55', 3),
(7, '2020-07-07 10:55:18', 3),
(8, '0000-00-00 00:00:00', 3);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `id_user`, `tanggal`) VALUES
(1, 2, '2020-04-02 20:19:22'),
(29, 2, '2020-04-13 09:15:37'),
(30, 2, '2020-04-21 13:05:18'),
(32, 2, '2020-06-01 00:02:50'),
(33, 2, '0000-00-00 00:00:00'),
(34, 2, '2020-07-07 11:25:10');

-- --------------------------------------------------------

--
-- Table structure for table `retur_barang`
--

CREATE TABLE `retur_barang` (
  `id_retur_barang` int(11) NOT NULL,
  `id_det_penjualan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_retur` datetime NOT NULL DEFAULT current_timestamp(),
  `tanggal_pengembalian` date NOT NULL,
  `alasan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_telp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama`, `alamat`, `email`, `no_telp`) VALUES
(3, 'denso', 'jombor', 'denso@gmail.com', '0982848725'),
(4, 'vibas', 'magelang', 'pin@gmail.com', '0239u40252'),
(5, 'anu', 'baloi', 'abd@gmail.com', '0988723472');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(30) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_lengkap`, `username`, `password`, `level`) VALUES
(1, '', 'admin', 'admin', 'admin'),
(2, 'Kasir', 'kasir', 'kasir', 'kasir'),
(3, 'Yohanes Dimas Rosa Suteja', 'gudang', 'gudang', 'gudang'),
(4, 'ikaaaaaaaaaaa', 'ika', 'ika', 'gudang');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_supplier` (`id_supplier`);

--
-- Indexes for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD PRIMARY KEY (`id_det_penjualan`),
  ADD KEY `id_penjualan` (`id_penjualan`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `det_order_barang`
--
ALTER TABLE `det_order_barang`
  ADD PRIMARY KEY (`id_det_order_brg`),
  ADD KEY `id_order_barang` (`id_order_barang`),
  ADD KEY `id_supplier` (`id_supplier`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `order_barang`
--
ALTER TABLE `order_barang`
  ADD PRIMARY KEY (`id_order_barang`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `retur_barang`
--
ALTER TABLE `retur_barang`
  ADD PRIMARY KEY (`id_retur_barang`),
  ADD KEY `id_det_penjualan` (`id_det_penjualan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  MODIFY `id_det_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `det_order_barang`
--
ALTER TABLE `det_order_barang`
  MODIFY `id_det_order_brg` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_barang`
--
ALTER TABLE `order_barang`
  MODIFY `id_order_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `retur_barang`
--
ALTER TABLE `retur_barang`
  MODIFY `id_retur_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD CONSTRAINT `detail_penjualan_ibfk_1` FOREIGN KEY (`id_penjualan`) REFERENCES `penjualan` (`id_penjualan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_penjualan_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `det_order_barang`
--
ALTER TABLE `det_order_barang`
  ADD CONSTRAINT `det_order_barang_ibfk_1` FOREIGN KEY (`id_order_barang`) REFERENCES `order_barang` (`id_order_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `det_order_barang_ibfk_2` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `det_order_barang_ibfk_3` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_barang`
--
ALTER TABLE `order_barang`
  ADD CONSTRAINT `order_barang_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `retur_barang`
--
ALTER TABLE `retur_barang`
  ADD CONSTRAINT `retur_barang_ibfk_1` FOREIGN KEY (`id_det_penjualan`) REFERENCES `detail_penjualan` (`id_det_penjualan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
