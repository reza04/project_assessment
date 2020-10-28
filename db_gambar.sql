-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Okt 2020 pada 11.18
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_gambar`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_gambar`
--

CREATE TABLE `tb_gambar` (
  `id_gambar` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `file` varchar(150) DEFAULT NULL,
  `jenis_produk` varchar(50) DEFAULT NULL,
  `harga` bigint(20) DEFAULT NULL,
  `deskripsi` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_gambar`
--

INSERT INTO `tb_gambar` (`id_gambar`, `nama`, `file`, `jenis_produk`, `harga`, `deskripsi`) VALUES
(78, 'Belender', '4AKq0cfzFc.jpg', 'Perabotan', 100000, 'Barang dijamin'),
(84, 'Kompor miyako', '5c5becace22ae.jpg', 'Perabotan', 20000, 'murah'),
(86, 'Gelas', '10180926_1.jpg', 'Perabotan', 50000, 'Gelas kaca'),
(91, 'Laptop Lenovo', 'multimedia-lenovo-laptop-500x500.png', 'Elektronik', 9999999, 'laptop Lenovo'),
(92, 'laptop Asus', 'Asus-A409FJ-Silver-1-3-500x500.jpg', 'Elektronik', 799999, 'Laptop Asus'),
(93, 'Kompor miyako', '5c5becace22ae.jpg', 'Perabotan', 100000, 'Kompor\"'),
(94, 'Blender', '4AKq0cfzFc.jpg', 'Elektronik', 99000, 'Blender Buah'),
(95, 'Laptop HP', 'hp-laptop-500x500.jpg', 'Elektronik', 5000000, 'Laptop HP'),
(96, 'MI TV', 'tvMI.jpg', 'Elektronik', 4999999, 'Mi tv'),
(97, 'Kulkas LG', 'kulkas.jpg', 'Elektronik', 4999999, 'Kulkas dingin'),
(98, 'Laptop HP', 'review_laptop_HP_14_AMD_ryzen_bukalapak.jpg', 'Elektronik', 10000000, 'Laptop HP ori'),
(103, 'Ducati Scrambler', 'Ducati-Scrambler-Icon-F.jpg', 'Transportasi', 1000000000, 'Montor Gede'),
(104, 'Minuman BOba', '3669725125.jpg', 'Minuman', 20000, 'Minuman yang menyegarkan\"'),
(105, 'Krudung Ceria', 'ks_zoya_-_ceria_depan_grey.jpg', 'Pakaian', 59000, 'Krudung yang nyaman dikepala dan sejuk'),
(106, 'HP Anang', 'WhatsApp Image 2020-10-27 at 15.03.01.jpeg', 'Lainnya', 999999, 'Minus barang bekas pakai selama 1 thn');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_gambar`
--
ALTER TABLE `tb_gambar`
  ADD PRIMARY KEY (`id_gambar`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_gambar`
--
ALTER TABLE `tb_gambar`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
