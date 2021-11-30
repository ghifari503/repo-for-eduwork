-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 30, 2021 at 09:58 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Apotek`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `total_harga` int(100) NOT NULL,
  `total_bayar` int(100) NOT NULL,
  `total_kembalian` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_detail`, `id_transaksi`, `total_harga`, `total_bayar`, `total_kembalian`) VALUES
(1, 1, 80000, 100000, 20000),
(2, 2, 500000, 1000000, 500000),
(3, 3, 50000, 50000, 0),
(4, 4, 50000, 50000, 0),
(5, 5, 15000, 20000, 5000),
(6, 6, 150000, 150000, 0),
(7, 7, 30000, 50000, 20000),
(8, 8, 2500, 5000, 2500),
(9, 9, 250000, 250000, 0),
(10, 10, 18000, 20000, 2000);

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id_obat` int(11) NOT NULL,
  `nama_obat` varchar(200) NOT NULL,
  `stok_obat` int(30) NOT NULL,
  `tgl_kadaluwarsa` date NOT NULL,
  `harga_obat` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id_obat`, `nama_obat`, `stok_obat`, `tgl_kadaluwarsa`, `harga_obat`) VALUES
(1, 'Paracetamol', 200, '2021-12-31', 20000),
(2, 'Panadol', 150, '2022-02-17', 50000),
(3, 'Paramex', 10, '2021-12-31', 10000),
(4, 'Bodrex', 40, '2022-01-21', 5000),
(5, 'Tolak angin', 300, '2022-02-11', 3000),
(6, 'Bodrexin', 500, '2022-02-24', 1000),
(7, 'Promag', 70, '2021-12-11', 500),
(8, 'Betadin', 30, '2022-03-18', 5000),
(9, 'Amoxicillin', 500, '2022-06-23', 10000),
(10, 'Ambroxol', 150, '2022-05-27', 10000);

-- --------------------------------------------------------

--
-- Table structure for table `pembeli`
--

CREATE TABLE `pembeli` (
  `id_pembeli` int(11) NOT NULL,
  `nama_pembeli` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembeli`
--

INSERT INTO `pembeli` (`id_pembeli`, `nama_pembeli`) VALUES
(1, 'Syahrul'),
(2, 'Ulum'),
(3, 'Suki'),
(4, 'Yanti'),
(5, 'Ilah'),
(6, 'Rani'),
(7, 'Amin'),
(8, 'Robi'),
(9, 'Daerobi'),
(10, 'Ahmad');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `id_pembeli` int(11) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `jumlah_transaksi` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_obat`, `id_pembeli`, `tgl_transaksi`, `jumlah_transaksi`) VALUES
(1, 1, 1, '2021-11-29', 4),
(2, 2, 2, '2021-11-29', 10),
(3, 4, 6, '2021-11-30', 10),
(4, 9, 1, '2021-11-30', 5),
(5, 6, 5, '2021-11-29', 15),
(6, 8, 4, '2021-11-27', 30),
(7, 9, 3, '2021-11-29', 3),
(8, 7, 1, '2021-11-30', 5),
(9, 2, 6, '2021-11-30', 5),
(10, 5, 8, '2021-11-29', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_transaksi` (`id_transaksi`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`id_pembeli`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `fk_obat` (`id_obat`),
  ADD KEY `fk_pembeli` (`id_pembeli`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pembeli`
--
ALTER TABLE `pembeli`
  MODIFY `id_pembeli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `fk_obat` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`),
  ADD CONSTRAINT `fk_pembeli` FOREIGN KEY (`id_pembeli`) REFERENCES `pembeli` (`id_pembeli`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
