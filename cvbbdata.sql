-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Bulan Mei 2020 pada 13.51
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cvbb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(10) NOT NULL,
  `harga_barang` int(50) NOT NULL,
  `nama_barang` varchar(150) NOT NULL,
  `images_barang` varchar(50) NOT NULL,
  `satuan_barang` varchar(20) NOT NULL,
  `status_barang` tinyint(1) NOT NULL,
  `id_category` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `harga_barang`, `nama_barang`, `images_barang`, `satuan_barang`, `status_barang`, `id_category`) VALUES
(1, 85000, 'Kotak Hitam Putih', 'Kotak Hitam Putih.jpeg', '4 pcs', 1, 1),
(2, 135000, 'Kingdom Aestetic', 'Kingdom Aestetic.jpeg', '4 pcs', 1, 1),
(3, 90000, 'Creamy Gloom', 'Creamy Gloom.jpeg', '4 pcs', 1, 1),
(4, 150000, 'Dreamy Aestetic', 'Dreamy Aestetic.jpeg', '4 pcs', 1, 1),
(5, 50000, 'Wood Shelf', 'Wood Shelf.jpeg', '4 pcs', 1, 1),
(6, 35000, 'Wood', 'Wood.jpeg', '4 pcs', 1, 1),
(7, 250000, 'Wiremesh', 'Wiremesh.jpeg', '10 meter', 1, 2),
(8, 300000, 'Kawat Beton', 'Kawat Beton.jpeg', '5 meter', 1, 2),
(9, 180000, 'Kawat Baja', 'Kawat Baja.jpeg', '2 meter', 1, 2),
(10, 230000, 'Besi Kanal C', 'Besi Kanal C.jpeg', 'batang', 1, 4),
(11, 10000, 'Paku Logam', 'Paku Logam.jpeg', '100 gram', 1, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `category`
--

CREATE TABLE `category` (
  `id_category` int(10) NOT NULL,
  `nama_category` varchar(50) NOT NULL,
  `status_category` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `category`
--

INSERT INTO `category` (`id_category`, `nama_category`, `status_category`) VALUES
(1, 'Keramik', 1),
(2, 'Kawat', 1),
(3, 'Paku', 1),
(4, 'Besi', 1),
(5, 'Kayu', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cat_barang`
--

CREATE TABLE `cat_barang` (
  `id_pembelian` int(10) NOT NULL,
  `id_barang` int(10) NOT NULL,
  `qty_barang` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `cat_barang`
--

INSERT INTO `cat_barang` (`id_pembelian`, `id_barang`, `qty_barang`) VALUES
(1, 1, 1),
(1, 4, 0),
(1, 7, 2),
(1, 8, 2),
(2, 9, 1),
(2, 10, 1),
(4, 1, 1),
(4, 2, 1),
(4, 3, 3),
(4, 9, 5),
(5, 1, 1),
(5, 2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `iklan`
--

CREATE TABLE `iklan` (
  `id_iklan` int(15) NOT NULL,
  `foto_iklan` varchar(50) NOT NULL,
  `nama_iklan` varchar(150) NOT NULL,
  `status_iklan` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `iklan`
--

INSERT INTO `iklan` (`id_iklan`, `foto_iklan`, `nama_iklan`, `status_iklan`) VALUES
(1, 'Besi Bangunan Sale.png', 'Besi Bangunan Sale', 1),
(2, 'Keramik Sale.png', 'Keramik Sale', 1),
(3, 'Besi Tronton Sale.png', 'Besi Tronton Sale', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kasir`
--

CREATE TABLE `kasir` (
  `id_kasir` int(8) NOT NULL,
  `nama_kasir` varchar(150) NOT NULL,
  `telepon_kasir` varchar(15) NOT NULL,
  `email_kasir` varchar(150) NOT NULL,
  `alamat_kasir` varchar(150) NOT NULL,
  `foto_kasir` varchar(150) NOT NULL,
  `status_kasir` tinyint(1) NOT NULL,
  `password_kasir` varchar(50) NOT NULL,
  `key_kasir` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kasir`
--

INSERT INTO `kasir` (`id_kasir`, `nama_kasir`, `telepon_kasir`, `email_kasir`, `alamat_kasir`, `foto_kasir`, `status_kasir`, `password_kasir`, `key_kasir`) VALUES
(1, 'Clarissa Caroline', '081386869168', 'carolineclarissa@ymail.com', 'Komp Mekar Sederhana Raya no 1', 'Clarissa Caroline.jpeg', 1, '827ccb0eea8a706c4c34a16891f84e7b', 0),
(2, 'Francisca Nadia', '081223459575', 'cisca_09@yahoo.com', 'Jalan Setra Indah Utara II no 6', 'Francisca Nadia.jpeg', 0, '827ccb0eea8a706c4c34a16891f84e7b', 0),
(3, 'Anastasia Levina', '085318078809', 'angelina.levina@gmail.com', 'Komp. Setra Duta Purnama J1-10', 'Anastasia Levina.jpeg', 1, '2e37c65976bc391c4dd12985692623f4', 839534),
(4, 'Steven Nugroho', '087823330581', 'stevennugroho@gmail.com', 'Jalan Babakan Jeruk V no 3', 'Steven Nugroho.jpeg', 1, '827ccb0eea8a706c4c34a16891f84e7b', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(10) NOT NULL,
  `nama_pembeli` varchar(150) NOT NULL,
  `telepon_pembeli` varchar(20) NOT NULL,
  `email_pembeli` varchar(150) NOT NULL,
  `totalharga` int(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status_pembayaran` tinyint(1) NOT NULL,
  `id_kasir` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `nama_pembeli`, `telepon_pembeli`, `email_pembeli`, `totalharga`, `date`, `status_pembayaran`, `id_kasir`) VALUES
(1, 'Anastasia Levina', '085318078809', 'angelina.levina@gmail.com', 1185000, '2020-05-20 10:26:18', 1, 3),
(2, 'Marya', '085454450899', 'marsyarenalda@yahoo.com', 410000, '2020-05-20 10:23:23', 0, 1),
(4, 'Vanessa', '0892000009', 'vanessaenes@gmail.com', 1390000, '2020-05-20 10:34:54', 0, 1),
(5, 'Fey', '0896528939', 'fey@gmail.com', 220000, '2020-05-20 10:36:48', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_category` (`id_category`);

--
-- Indeks untuk tabel `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indeks untuk tabel `cat_barang`
--
ALTER TABLE `cat_barang`
  ADD KEY `id_pembelian` (`id_pembelian`,`id_barang`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indeks untuk tabel `iklan`
--
ALTER TABLE `iklan`
  ADD PRIMARY KEY (`id_iklan`);

--
-- Indeks untuk tabel `kasir`
--
ALTER TABLE `kasir`
  ADD PRIMARY KEY (`id_kasir`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`),
  ADD KEY `id_kasir` (`id_kasir`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `iklan`
--
ALTER TABLE `iklan`
  MODIFY `id_iklan` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kasir`
--
ALTER TABLE `kasir`
  MODIFY `id_kasir` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `cat_barang`
--
ALTER TABLE `cat_barang`
  ADD CONSTRAINT `cat_barang_ibfk_1` FOREIGN KEY (`id_pembelian`) REFERENCES `pembelian` (`id_pembelian`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cat_barang_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);

--
-- Ketidakleluasaan untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `pembelian_ibfk_2` FOREIGN KEY (`id_kasir`) REFERENCES `kasir` (`id_kasir`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
