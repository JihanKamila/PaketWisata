-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Agu 2024 pada 21.21
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbwisata`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id` int(11) NOT NULL,
  `Nama_Pemesan` varchar(30) NOT NULL,
  `No_HP` varchar(15) NOT NULL,
  `Tanggal_Pesan` date DEFAULT current_timestamp(),
  `Waktu_Pelaksanaan` int(2) NOT NULL,
  `Paket` varchar(100) NOT NULL,
  `Jumlah_Peserta` int(3) NOT NULL,
  `Harga` decimal(10,0) NOT NULL,
  `Tagihan` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`id`, `Nama_Pemesan`, `No_HP`, `Tanggal_Pesan`, `Waktu_Pelaksanaan`, `Paket`, `Jumlah_Peserta`, `Harga`, `Tagihan`) VALUES
(29, 'Jihan', '0897653049', '2024-08-07', 3, 'transportasi,hiburan', 2, 1200000, 7200000),
(31, 'velic', '089765778345', '2024-08-07', 6, 'transportasi', 2, 1200000, 14400000),
(32, 'kamila', '0877982608124', '2024-08-07', 1, 'penginapan', 1, 1000000, 1000000),
(33, 'kamila', '0877982608124', '2024-08-07', 1, 'trip,transportasi', 1, 1200000, 1200000),
(34, 'Yunis', '08123456789', '2024-08-07', 2, 'penginapan', 2, 1000000, 4000000),
(35, 'Yunis', '08123456789', '2024-08-07', 1, 'makanan', 2, 500000, 1000000),
(36, 'Yunis', '08123456789', '2024-08-07', 4, 'penginapan', 2, 1000000, 8000000),
(40, 'velic', '0897653049', '2024-08-08', 3, 'trip,transportasi', 2, 1200000, 7200000),
(41, 'Jihan Kamila', '0897653049', '2024-08-08', 2, 'makanan', 2, 500000, 2000000),
(56, 'velis', '0853346780', '2024-08-08', 2, 'penginapan,transportasi', 4, 2200000, 17600000),
(57, 'Jihan', '0897653049', '2024-08-08', 1, 'transportasi', 3, 1200000, 3600000),
(58, 'Jihan', '0897653049', '2024-08-08', 1, 'transportasi,makanan', 3, 1700000, 5100000),
(59, 'Jihan', '0897653049', '2024-08-08', 1, 'transportasi,makanan', 3, 1700000, 5100000),
(60, 'Jihan Kamila', '0897653049', '2024-08-08', 3, 'penginapan', 2, 1000000, 6000000),
(63, 'Jihan Kamila', '0897653049', '2024-08-08', 3, 'transportasi', 2, 1200000, 7200000),
(66, 'velic', '089765778345', '2024-08-08', 2, 'transportasi,makanan', 2, 1700000, 6800000),
(67, 'jihan', '089765778345', '2024-08-08', 2, 'penginapan,makanan', 2, 1500000, 6000000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
