-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Des 2021 pada 00.04
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.26

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
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `id_obat` int(11) NOT NULL,
  `nama_obat` varchar(32) NOT NULL,
  `stok_obat` int(11) NOT NULL,
  `tanggal_kadaluwarsa` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`id_obat`, `nama_obat`, `stok_obat`, `tanggal_kadaluwarsa`) VALUES
(1, 'pikangsuang', 12, '2021-12-23'),
(2, 'remason', 10, '2021-12-31'),
(3, 'panadol biru', 10, '2022-01-26'),
(4, 'panadol merah', 10, '2022-01-03'),
(5, 'madu murni', 32, '2022-02-17'),
(6, 'freshcare', 3, '2022-02-24'),
(7, 'bodrex tablet', 10, '2023-04-26'),
(8, 'entrostop dewasa', 5, '2025-04-29'),
(9, 'entrostop kid', 2, '2025-04-18'),
(10, 'antimo anak', 8, '2024-02-08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` int(11) NOT NULL,
  `nama_pasien` varchar(32) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `nama_pasien`, `tgl_lahir`, `alamat`) VALUES
(1, 'widodo', '2012-12-02', 'jl salak timur'),
(2, 'afong', '2021-12-01', 'jl in aja dulu'),
(3, 'zulfikar', '2021-11-01', 'jl kali anyar'),
(4, 'anang', '2021-11-08', 'jl kebon jeruk'),
(5, 'aldi', '2013-08-12', 'jl raya bogor'),
(6, 'bambang', '2021-11-24', 'jl in aja dulu'),
(7, 'suketi', '2021-12-13', 'jl seram '),
(8, 'sumanto', '2006-12-18', 'jl manto'),
(9, 'naruto', '2014-12-15', 'jl konoha'),
(10, 'hinata', '2013-12-02', 'jl konoha');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `jumlah_transaksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_pasien`, `id_obat`, `jumlah_transaksi`) VALUES
(1, 1, 1, 23000),
(2, 9, 10, 15000),
(3, 5, 8, 11000),
(4, 7, 2, 24000),
(5, 3, 1, 23000),
(6, 8, 5, 80000),
(7, 1, 5, 80000),
(8, 4, 9, 7000),
(9, 10, 3, 5500),
(10, 6, 4, 5500);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `fk_pasien` (`id_pasien`),
  ADD KEY `fk_obat` (`id_obat`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `fk_obat` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`),
  ADD CONSTRAINT `fk_pasien` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
