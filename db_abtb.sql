-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 07 Feb 2023 pada 12.34
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_abtb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bis`
--

CREATE TABLE `bis` (
  `kode_bis` int(11) NOT NULL,
  `nama_bis` varchar(40) NOT NULL,
  `kursi` varchar(20) NOT NULL,
  `jam_berangkat` time NOT NULL,
  `kelas` enum('Premium','Reguler') NOT NULL,
  `harga` int(25) NOT NULL,
  `keterangan` text NOT NULL,
  `rute` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bis`
--

INSERT INTO `bis` (`kode_bis`, `nama_bis`, `kursi`, `jam_berangkat`, `kelas`, `harga`, `keterangan`, `rute`, `image`) VALUES
(10, 'TransJabodetabek Jakarta', '20', '09:00:00', 'Premium', 30000, 'Ac, Hiburan, Kursi Recliner, Hotspot\r\n\r\nRute\r\n\r\nBundaran HI - Summarecon Mall Bekasi \r\n', 'Jakarta - Bekasi', 'TJimage.jpg'),
(11, 'TransJabodetabek Jakarta', '20', '15:00:00', 'Reguler', 15000, 'Ac, Kursi Recliner\r\n\r\nRute\r\n\r\nBundaran HI - Summarecon Mall Bekasi', 'Jakarta - Bekasi', 'TJimage.jpg'),
(12, 'TransJabodetabek Jakarta', '20', '08:00:00', 'Premium', 30000, 'Ac, Hiburan, Kursi Recliner, Hotspot', 'Jakarta - Tangerang', 'TJimage.jpg'),
(13, 'TransJabodetabek Jakarta', '20', '15:00:00', 'Reguler', 15000, 'Ac, Kursi Recliner', 'Jakarta - Tangerang', 'TJimage.jpg'),
(14, 'TransJabodetabek Jakarta', '20', '09:00:00', 'Premium', 30000, 'Ac, Hiburan, Kursi Recliner, Hotspot', 'Jakarta - Depok', 'TJimage.jpg'),
(15, 'TransJabodetabek Jakarta', '20', '16:00:00', 'Reguler', 15000, 'Ac, Kursi Recliner', 'Jakarta - Depok', 'TJimage.jpg'),
(16, 'TransJabodetabek Jakarta', '20', '07:00:00', 'Premium', 30000, 'Ac, Hiburan, Kursi Recliner, Hotspot', 'Jakarta - Bogor', 'TJimage.jpg'),
(17, 'TransJabodetabek Jakarta', '20', '12:30:00', 'Reguler', 15000, 'Ac, Kursi Recliner', 'Jakarta - Bogor', 'TJimage.jpg'),
(18, 'TransJabodetabek Bekasi', '20', '06:40:00', 'Premium', 30000, 'Ac, Hiburan, Kursi Recliner, Hotspot\r\nRute\r\nSummarecon Mall Bekasi - Bundaran HI', 'Bekasi - Jakarta', 'TJimageBksi.jpg'),
(19, 'TransJabodetabek Bekasi', '20', '05:00:00', 'Reguler', 15000, 'Ac, Kursi Recliner\r\nRute\r\nSummarecon Mall Bekasi - Bundaran HI', 'Bekasi - Jakarta', 'TJimageBksi.jpg'),
(20, 'TransJabodetabek Bekasi', '20', '07:30:00', 'Premium', 30000, 'Ac, Hiburan, Kursi Recliner, Hotspot', 'Bekasi - Tangerang', 'TJimageBksi.jpg'),
(21, 'TransJabodetabek Bekasi', '20', '09:00:00', 'Reguler', 15000, 'Ac, Kursi Recliner', 'Bekasi - Tangerang', 'TJimageBksi.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pesan`
--

CREATE TABLE `detail_pesan` (
  `id_pesan` varchar(11) NOT NULL,
  `kode_bis` int(11) NOT NULL,
  `harga` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_pesan`
--

INSERT INTO `detail_pesan` (`id_pesan`, `kode_bis`, `harga`) VALUES
('ABTB001', 10, 'Rp.30.000'),
('ABTB002', 11, 'Rp.25.000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pesan` varchar(11) NOT NULL,
  `email` varchar(35) NOT NULL,
  `kode_bis` int(11) NOT NULL,
  `rute` text NOT NULL,
  `harga` int(255) NOT NULL,
  `tgl_berangkat` date NOT NULL,
  `jam_berangkat` time NOT NULL,
  `kursi` enum('1','2','3','4') NOT NULL,
  `status` enum('sudah terbayar','menunggu pembayaran') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`id_pesan`, `email`, `kode_bis`, `rute`, `harga`, `tgl_berangkat`, `jam_berangkat`, `kursi`, `status`) VALUES
('ABTB005', 'muhammadilyas@gmail.com', 11, 'Jakarta - Bekasi', 15000, '2019-06-24', '15:00:00', '2', 'menunggu pembayaran'),
('ABTB006', 'muhammadilyas@gmail.com', 14, 'Jakarta - Depok', 30000, '2019-06-30', '09:00:00', '3', 'menunggu pembayaran'),
('ABTB007', 'muhammadbiben@gmail.com', 12, 'Jakarta - Tangerang', 30000, '2019-06-24', '08:00:00', '1', 'menunggu pembayaran'),
('ABTB008', 'muhammadbiben@gmail.com', 19, 'Bekasi - Jakarta', 15000, '2019-06-30', '05:00:00', '4', 'menunggu pembayaran'),
('ABTB009', 'sofyanarifin@gmail.com', 20, 'Bekasi - Tangerang', 30000, '2019-06-24', '07:30:00', '4', 'menunggu pembayaran'),
('ABTB010', 'sofyanarifin@gmail.com', 21, 'Bekasi - Tangerang', 15000, '2019-06-30', '09:00:00', '1', 'menunggu pembayaran'),
('ABTB011', 'awalnp@gmail.com', 16, 'Jakarta - Bogor', 30000, '2019-06-24', '07:00:00', '2', 'menunggu pembayaran'),
('ABTB012', 'awalnp@gmail.com', 17, 'Jakarta - Bogor', 15000, '2019-06-30', '12:30:00', '2', 'menunggu pembayaran'),
('ABTB013', 'muhammadilyas@gmail.com', 11, 'Jakarta - Bekasi', 15000, '2019-06-17', '15:00:00', '2', 'menunggu pembayaran'),
('ABTB014', 'muhammadilyas@gmail.com', 11, 'Jakarta - Bekasi', 15000, '2019-06-18', '15:00:00', '1', 'menunggu pembayaran'),
('ABTB015', 'muhammadilyas@gmail.com', 10, 'Jakarta - Bekasi', 30000, '2019-06-20', '09:00:00', '3', 'menunggu pembayaran'),
('ABTB016', 'muhammadilyas@gmail.com', 10, 'Jakarta - Bekasi', 30000, '2019-06-27', '09:00:00', '1', 'menunggu pembayaran'),
('ABTB017', 'muhammadilyas@gmail.com', 15, 'Jakarta - Depok', 15000, '2023-01-31', '16:00:00', '2', 'menunggu pembayaran');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id_role` int(1) NOT NULL,
  `nama_role` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id_role`, `nama_role`) VALUES
(1, 'administrator'),
(2, 'penumpang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_pesan` varchar(11) NOT NULL,
  `email` varchar(35) NOT NULL,
  `kode_bis` int(11) NOT NULL,
  `tgl_berangkat` date NOT NULL,
  `kursi` enum('1','2','3','4') NOT NULL,
  `status` enum('belum terbayar','sudah terbayar') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_pesan`, `email`, `kode_bis`, `tgl_berangkat`, `kursi`, `status`) VALUES
('ABTB000', 'sofyanarifin@gmail.com', 20, '2019-05-01', '2', 'sudah terbayar'),
('ABTB001', 'muhammadilyas@gmail.com', 12, '2019-06-23', '2', 'sudah terbayar'),
('ABTB002', 'awal.np@gmail.com', 16, '2019-06-01', '3', 'sudah terbayar'),
('ABTB003', 'muhammadbiben@gmail.com', 10, '2019-06-05', '2', 'sudah terbayar'),
('ABTB004', 'muhammadilyas@gmail.com', 17, '2019-06-01', '2', 'sudah terbayar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(2) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(50) NOT NULL,
  `id_role` int(1) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `no_telp`, `email`, `password`, `id_role`, `image`) VALUES
(4, 'Eko Nur Ramadhani', '089521649714', 'ekonurramadhani@gmail.com', '5e8667a439c68f5145dd2fcbecf02209', 1, 'dhani1.jpg'),
(5, 'Muhammad Ilyas', '083878946871', 'muhammadilyas@gmail.com', '25d55ad283aa400af464c76d713c07ad', 2, 'ilyas.jpg'),
(6, 'Muhammad Biben Arfuan', '089676480953', 'muhammadbiben@gmail.com', '25d55ad283aa400af464c76d713c07ad', 2, 'biben.jpg'),
(7, 'Sofyan Arifin Hidayat', '0895383285900', 'sofyanarifin@gmail.com', '25d55ad283aa400af464c76d713c07ad', 2, 'sofyan.jpg'),
(8, 'Awal Nur Pajri', '085888751875', 'awalnp@gmail.com', '25d55ad283aa400af464c76d713c07ad', 2, 'awal.jpg'),
(9, 'john doe', '089521649714', 'john@mayer.com', '1e9306f8e83a018905c5706cfbc9fca6', 2, 'default.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `token` varchar(255) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bis`
--
ALTER TABLE `bis`
  ADD PRIMARY KEY (`kode_bis`);

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_role` (`id_role`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bis`
--
ALTER TABLE `bis`
  MODIFY `kode_bis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
