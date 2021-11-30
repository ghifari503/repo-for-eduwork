-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 30, 2021 at 07:20 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_apotek2`
--

-- --------------------------------------------------------

--
-- Table structure for table `detil_kasir`
--

DROP TABLE IF EXISTS `detil_kasir`;
CREATE TABLE IF NOT EXISTS `detil_kasir` (
  `id_detil_kasir` int(11) NOT NULL AUTO_INCREMENT,
  `id_kasir` int(11) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `usia` int(11) NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  PRIMARY KEY (`id_detil_kasir`),
  KEY `detil_kasir_ibfk_1` (`id_kasir`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detil_kasir`
--

INSERT INTO `detil_kasir` (`id_detil_kasir`, `id_kasir`, `nama_lengkap`, `tanggal_lahir`, `alamat`, `usia`, `jenis_kelamin`) VALUES
(1, 1, 'Kasir A', '2000-11-01', 'Alamat', 20, 'Laki-Laki');

-- --------------------------------------------------------

--
-- Table structure for table `detil_transaksi`
--

DROP TABLE IF EXISTS `detil_transaksi`;
CREATE TABLE IF NOT EXISTS `detil_transaksi` (
  `id_detil_transaksi` int(11) NOT NULL AUTO_INCREMENT,
  `id_transaksi` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `nama_obat` varchar(255) NOT NULL,
  `harga_obat` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  PRIMARY KEY (`id_detil_transaksi`),
  KEY `id_transaksi` (`id_transaksi`),
  KEY `id_obat` (`id_obat`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detil_transaksi`
--

INSERT INTO `detil_transaksi` (`id_detil_transaksi`, `id_transaksi`, `id_obat`, `nama_obat`, `harga_obat`, `qty`) VALUES
(1, 1, 1, 'Procold', 12000, 1),
(2, 1, 2, 'Vitalong C', 20000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_obat`
--

DROP TABLE IF EXISTS `jenis_obat`;
CREATE TABLE IF NOT EXISTS `jenis_obat` (
  `id_jenis_obat` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jenis_obat` varchar(255) NOT NULL,
  PRIMARY KEY (`id_jenis_obat`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_obat`
--

INSERT INTO `jenis_obat` (`id_jenis_obat`, `nama_jenis_obat`) VALUES
(1, 'Kapsul'),
(2, 'Tablet');

-- --------------------------------------------------------

--
-- Table structure for table `kasir`
--

DROP TABLE IF EXISTS `kasir`;
CREATE TABLE IF NOT EXISTS `kasir` (
  `id_kasir` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id_kasir`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kasir`
--

INSERT INTO `kasir` (`id_kasir`, `username`, `email`, `password`) VALUES
(1, 'kasirA', 'kasirA@example.com', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `kustomer`
--

DROP TABLE IF EXISTS `kustomer`;
CREATE TABLE IF NOT EXISTS `kustomer` (
  `id_kustomer` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kustomer` varchar(255) NOT NULL,
  `no_telepon` varchar(15) NOT NULL,
  PRIMARY KEY (`id_kustomer`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kustomer`
--

INSERT INTO `kustomer` (`id_kustomer`, `nama_kustomer`, `no_telepon`) VALUES
(1, 'John Josh', '087876765412'),
(2, 'Nina Baba', '087876565432');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

DROP TABLE IF EXISTS `obat`;
CREATE TABLE IF NOT EXISTS `obat` (
  `id_obat` int(11) NOT NULL AUTO_INCREMENT,
  `nama_obat` varchar(255) NOT NULL,
  `harga_obat` int(11) NOT NULL,
  `stok_obat` int(11) NOT NULL,
  `id_jenis_obat` int(11) NOT NULL,
  PRIMARY KEY (`id_obat`),
  KEY `id_jenis_obat` (`id_jenis_obat`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id_obat`, `nama_obat`, `harga_obat`, `stok_obat`, `id_jenis_obat`) VALUES
(1, 'Procold', 12000, 20, 2),
(2, 'Vitalong C', 20000, 15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

DROP TABLE IF EXISTS `transaksi`;
CREATE TABLE IF NOT EXISTS `transaksi` (
  `id_transaksi` int(11) NOT NULL AUTO_INCREMENT,
  `id_kasir` int(11) NOT NULL,
  `id_kustomer` int(11) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `total_kembali` int(11) NOT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  PRIMARY KEY (`id_transaksi`),
  KEY `id_kasir` (`id_kasir`),
  KEY `id_kustomer` (`id_kustomer`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_kasir`, `id_kustomer`, `total_bayar`, `total_kembali`, `tanggal_transaksi`) VALUES
(1, 1, 1, 50000, 18000, '2021-11-30 00:00:00');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detil_kasir`
--
ALTER TABLE `detil_kasir`
  ADD CONSTRAINT `detil_kasir_ibfk_1` FOREIGN KEY (`id_kasir`) REFERENCES `kasir` (`id_kasir`);

--
-- Constraints for table `detil_transaksi`
--
ALTER TABLE `detil_transaksi`
  ADD CONSTRAINT `detil_transaksi_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`),
  ADD CONSTRAINT `detil_transaksi_ibfk_2` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`);

--
-- Constraints for table `obat`
--
ALTER TABLE `obat`
  ADD CONSTRAINT `obat_ibfk_1` FOREIGN KEY (`id_jenis_obat`) REFERENCES `jenis_obat` (`id_jenis_obat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_kasir`) REFERENCES `kasir` (`id_kasir`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_kustomer`) REFERENCES `kustomer` (`id_kustomer`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
