-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Nov 2021 pada 15.34
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apoteksehat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `apoteker`
--

CREATE TABLE `apoteker` (
  `id` int(11) NOT NULL,
  `nama` varchar(56) NOT NULL,
  `umur` int(11) NOT NULL,
  `bio` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `apoteker`
--

INSERT INTO `apoteker` (`id`, `nama`, `umur`, `bio`) VALUES
(1, 'Lintang', 23, 'Seorang Apoteker Muda.'),
(3, 'Bening', 22, 'Apoteker paling Muda'),
(4, 'Nugroho', 25, 'Apoteker Ganteng'),
(5, 'Naily', 21, 'Apoteker junior'),
(6, 'Agni', 26, 'Banyak Pengalaman'),
(7, 'Aditya', 24, 'Maskulin, Periang dan Murah Senyum'),
(8, 'Yoga', 29, 'Paling senior dibanding yang lain'),
(9, 'Putri', 28, 'Manis, Cantik, Sholehah'),
(10, 'Elfiana', 27, 'Banyak Pengalaman, sedikit jutek'),
(11, 'Shela', 20, 'Baru Magang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama` varchar(56) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `nama`, `keterangan`) VALUES
(1, 'Sakit Kepala', 'Kumpulan obat sakit kepala.'),
(2, 'Obat Gatal', 'Kumpulan obat untuk gatal-gatal.'),
(3, 'Obat Batuk', 'Kumpulan obat untuk batuk'),
(4, 'Sakit Perut', 'Kumpulan obat untuk sakit perut'),
(5, 'Masuk Angin', 'Kumpulan Obat untuk masuk angin'),
(6, 'Stamina', 'Kumpulan obat untuk menjaga daa tahan tubuh');

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `id` int(11) NOT NULL,
  `nama` varchar(56) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `detail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`id`, `nama`, `stok`, `harga`, `kategori_id`, `detail`) VALUES
(1, 'Betametason', 15, 20000, 2, 'Obat gatal karena jamur'),
(2, 'Ibuprofen', 5, 200000, 1, 'Untuk meredakan sakit kepala.'),
(3, 'Antangin Cair', 10, 2500, 5, 'Antangin Cair obat masuk angin'),
(4, 'Bodrex Tablet', 30, 1500, 1, 'Bodrex obat sakit kepala'),
(5, 'GPU', 11, 15000, 5, 'GPU untuk pijat urut'),
(6, 'Komix', 9, 2000, 3, 'Komix untuk meredakan batuk'),
(7, 'Promag', 12, 2500, 4, 'Promag meredakan sakit maag'),
(8, 'Extrajoss', 7, 9000, 6, 'Untuk menaikkan stamina'),
(9, 'Puyer Bintang 7', 5, 2500, 1, 'Untuk sakit kepala'),
(10, 'Balsem Geliga', 2, 15000, 5, 'Untuk mengatasi pegal-pegal, masuk angin dan keseleo');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembeli`
--

CREATE TABLE `pembeli` (
  `id` int(11) NOT NULL,
  `nama` varchar(56) NOT NULL,
  `umur` int(11) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembeli`
--

INSERT INTO `pembeli` (`id`, `nama`, `umur`, `alamat`) VALUES
(1, 'Asmuni', 52, 'Lasem, Rembang.'),
(2, 'Wildan', 23, 'Wonogiri'),
(3, 'Aliya', 20, 'Pati'),
(4, 'Ita', 26, 'Juwana'),
(5, 'Purnomo', 33, 'Pamotan'),
(6, 'Khusnul', 18, 'Purwodadi'),
(7, 'Alex', 27, 'Madiun'),
(8, 'Rizki', 28, 'Banyuwangi'),
(9, 'Padiono', 43, 'Kudus'),
(10, 'Made', 47, 'Bali');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `pembeli_id` int(11) NOT NULL,
  `obat_id` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `apoteker_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `pembeli_id`, `obat_id`, `jumlah`, `total`, `apoteker_id`) VALUES
(1, 1, 1, 2, 40000, 1),
(2, 2, 3, 1, 2500, 3),
(3, 3, 1, 3, 60000, 11),
(4, 4, 4, 6, 9000, 10),
(5, 5, 5, 1, 15000, 8),
(6, 6, 9, 4, 10000, 5),
(7, 7, 8, 2, 18000, 7),
(8, 8, 6, 2, 4000, 4),
(9, 10, 10, 1, 15000, 8),
(10, 9, 7, 4, 10000, 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `apoteker`
--
ALTER TABLE `apoteker`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_kategori` (`kategori_id`);

--
-- Indeks untuk tabel `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pembeli` (`pembeli_id`),
  ADD KEY `fk_obat` (`obat_id`),
  ADD KEY `fk_apoteker` (`apoteker_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `apoteker`
--
ALTER TABLE `apoteker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `obat`
--
ALTER TABLE `obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `pembeli`
--
ALTER TABLE `pembeli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD CONSTRAINT `fk_kategori` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`);

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `fk_apoteker` FOREIGN KEY (`apoteker_id`) REFERENCES `apoteker` (`id`),
  ADD CONSTRAINT `fk_obat` FOREIGN KEY (`obat_id`) REFERENCES `obat` (`id`),
  ADD CONSTRAINT `fk_pembeli` FOREIGN KEY (`pembeli_id`) REFERENCES `pembeli` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
