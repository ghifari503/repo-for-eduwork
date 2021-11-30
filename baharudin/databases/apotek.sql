-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2021 at 11:27 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apotek`
--

-- --------------------------------------------------------

--
-- Table structure for table `bentuk_obat`
--

CREATE TABLE `bentuk_obat` (
  `id_bentuk` int(11) NOT NULL,
  `bentuk` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bentuk_obat`
--

INSERT INTO `bentuk_obat` (`id_bentuk`, `bentuk`) VALUES
(1, 'kaplet'),
(2, 'tablet'),
(3, 'sirup'),
(4, 'kapsul'),
(5, 'tetes'),
(6, 'plast');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_obat`
--

CREATE TABLE `kategori_obat` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori_obat`
--

INSERT INTO `kategori_obat` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Antibiotik'),
(2, 'Vitamin'),
(3, 'Obat Flu'),
(4, 'Kecantikan'),
(5, 'Demam'),
(6, 'Mata');

-- --------------------------------------------------------

--
-- Table structure for table `komputer`
--

CREATE TABLE `komputer` (
  `id_komputer` int(11) NOT NULL,
  `nama_komputer` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `komputer`
--

INSERT INTO `komputer` (`id_komputer`, `nama_komputer`) VALUES
(1, 'Komputer-1'),
(2, 'Komputer-2');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id_obat` int(11) NOT NULL,
  `nama_obat` varchar(32) NOT NULL,
  `id_bentuk` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `banyak_stok` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id_obat`, `nama_obat`, `id_bentuk`, `id_kategori`, `banyak_stok`, `harga`) VALUES
(1, 'Amoxicillin', 1, 1, 21, 5000),
(2, 'Vitamin C IPI', 2, 2, 30, 7500),
(3, 'Tremenza', 3, 3, 21, 25000),
(4, 'Nourish Beauty', 6, 4, 42, 20000),
(5, 'Enervon-C', 2, 2, 81, 2500),
(6, 'Diva Collagen', 3, 4, 5, 50000),
(7, 'Bodrexin Drops', 5, 5, 44, 15000),
(8, 'Imunped', 3, 2, 12, 70000),
(9, 'Tetracycline', 4, 1, 50, 10000),
(10, 'Insto Reguler', 5, 6, 27, 17000);

-- --------------------------------------------------------

--
-- Table structure for table `operator`
--

CREATE TABLE `operator` (
  `id_operator` int(11) NOT NULL,
  `nama_operator` varchar(32) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(16) NOT NULL,
  `id_komputer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `operator`
--

INSERT INTO `operator` (`id_operator`, `nama_operator`, `alamat`, `no_hp`, `id_komputer`) VALUES
(1, 'Baharudin', 'Jombang', '082233344441', 1),
(2, 'Pratama', 'Surabaya', '081223334444', 2);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `id_operator` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `kuantitas` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `tgl_transaksi`, `id_operator`, `id_obat`, `kuantitas`, `total_harga`) VALUES
(1, '2021-11-28', 1, 1, 2, 10000),
(2, '2021-11-28', 2, 7, 1, 15000),
(3, '2021-11-28', 1, 6, 2, 100000),
(4, '2021-11-28', 1, 5, 10, 25000),
(5, '2021-11-29', 2, 8, 2, 140000),
(6, '2021-11-29', 2, 10, 3, 51000),
(7, '2021-11-29', 1, 4, 3, 60000),
(8, '2021-11-29', 1, 9, 3, 30000),
(9, '2021-11-30', 1, 3, 1, 25000),
(10, '2021-11-30', 2, 2, 2, 15000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bentuk_obat`
--
ALTER TABLE `bentuk_obat`
  ADD PRIMARY KEY (`id_bentuk`);

--
-- Indexes for table `kategori_obat`
--
ALTER TABLE `kategori_obat`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `komputer`
--
ALTER TABLE `komputer`
  ADD PRIMARY KEY (`id_komputer`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`),
  ADD KEY `fk_kategori_obat` (`id_kategori`),
  ADD KEY `fk_bentuk_obat` (`id_bentuk`);

--
-- Indexes for table `operator`
--
ALTER TABLE `operator`
  ADD PRIMARY KEY (`id_operator`),
  ADD KEY `fk_komputer` (`id_komputer`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `fk_obat` (`id_obat`),
  ADD KEY `fk_operator` (`id_operator`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bentuk_obat`
--
ALTER TABLE `bentuk_obat`
  MODIFY `id_bentuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kategori_obat`
--
ALTER TABLE `kategori_obat`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `komputer`
--
ALTER TABLE `komputer`
  MODIFY `id_komputer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `operator`
--
ALTER TABLE `operator`
  MODIFY `id_operator` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `obat`
--
ALTER TABLE `obat`
  ADD CONSTRAINT `fk_bentuk_obat` FOREIGN KEY (`id_bentuk`) REFERENCES `bentuk_obat` (`id_bentuk`),
  ADD CONSTRAINT `fk_kategori_obat` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_obat` (`id_kategori`);

--
-- Constraints for table `operator`
--
ALTER TABLE `operator`
  ADD CONSTRAINT `fk_komputer` FOREIGN KEY (`id_komputer`) REFERENCES `komputer` (`id_komputer`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `fk_obat` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`),
  ADD CONSTRAINT `fk_operator` FOREIGN KEY (`id_operator`) REFERENCES `operator` (`id_operator`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
