-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Agu 2023 pada 07.16
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lainskincare`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'lainskincareadministrator', 'l@inSkincar3administrator'),
(2, 'ADMINISTRATOR', '$2y$10$I9O.1yV8GCpB8X4MkDZt..oordTGyueMI3FiprPmeSyL3aZFUfEd6'),
(3, 'YADI SUTIADI', '$2y$10$j1TybYgwtwrnbfb9ZcsDVegUGKsqI9n7kaNu5m9hWE/6i3tyISgN2'),
(4, 'YADI', '$2y$10$Jd9rhY34S//rS8sacYgL/e1zgkO.hQAU3DAzs3pa8aVEGNrg1Gr9m');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan`
--

CREATE TABLE `pesan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pesan` text NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pesan`
--

INSERT INTO `pesan` (`id`, `nama`, `email`, `pesan`, `tanggal`, `phone`) VALUES
(1, 'Yadi Sutiadi', 'yadisutiya@gmail.com', 'lorem ipsum', '2023-07-25 06:42:27', ''),
(2, 'Yadi Sutiadi', 'yadisutiya@gmail.com', 'lorem', '2023-07-25 06:53:08', '085941841040'),
(3, 'Yadi Sutiadi', 'yadisutiya@gmail.com', 'lorem', '2023-07-25 07:05:23', '085941841040'),
(4, 'Yadi Sutiadi', 'yadisutiya@gmail.com', 'testting', '2023-07-25 07:32:09', '123456789'),
(5, 'iday', 'idaymedia96@gmail.com', 'percobaan kirm pesan.', '2023-07-25 07:33:03', '0099'),
(6, 'suhada', 'suhada@gmail.com', 'pesan testing', '2023-07-25 07:40:17', '00000'),
(7, 'test', 'test@gmail.com', 'testing', '2023-07-25 07:52:53', '0088'),
(8, 'heru', 'heru@gmail.com', 'herus test', '2023-07-25 08:01:57', '1212'),
(9, 'YADI SUTADI1', 'yadisutiya12@gmail.com', 'testing pesan', '2023-07-25 11:43:05', '001122');

-- --------------------------------------------------------

--
-- Struktur dari tabel `qr_codes`
--

CREATE TABLE `qr_codes` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `point` int(11) DEFAULT NULL,
  `status` enum('scanned','not_scanned') NOT NULL DEFAULT 'not_scanned'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `qr_codes`
--

INSERT INTO `qr_codes` (`id`, `code`, `point`, `status`) VALUES
(1, '', 1, 'not_scanned'),
(2, '1', 1, 'not_scanned'),
(3, '2', 1, 'not_scanned'),
(4, '3', 1, 'not_scanned'),
(5, '4', 1, 'not_scanned'),
(6, '1', 2, 'not_scanned'),
(7, '2', 2, 'not_scanned'),
(8, '3', 2, 'not_scanned'),
(9, '4', 2, 'not_scanned'),
(10, '1688', 1, 'not_scanned'),
(11, '1596', 1, 'not_scanned'),
(12, '1856', 1, 'not_scanned'),
(13, '1774', 1, 'not_scanned'),
(14, '72', 3, 'not_scanned'),
(15, '546', 3, 'not_scanned'),
(16, '52', 3, 'not_scanned'),
(17, '1541', 3, 'not_scanned'),
(18, '310', 1, 'not_scanned'),
(19, '1218', 2, 'not_scanned'),
(20, '1803', 4, 'not_scanned'),
(21, '1373', 3, 'not_scanned'),
(22, '1416', 1, 'not_scanned'),
(23, '1153', 3, 'not_scanned'),
(24, '962', 4, 'not_scanned'),
(25, '1411', 4, 'not_scanned'),
(26, '1238', 3, 'not_scanned'),
(27, '5', 1, 'not_scanned'),
(28, '1130', 3, 'not_scanned'),
(29, '797', 2, 'not_scanned'),
(30, '485', 1, 'not_scanned'),
(31, '982', 1, 'not_scanned'),
(32, '1111', 1, 'not_scanned'),
(33, '1165', 2, 'not_scanned'),
(34, '1122', 2, 'not_scanned'),
(35, '1757', 1, 'not_scanned'),
(36, '865', 865, 'not_scanned'),
(37, '1661', 1661, 'not_scanned'),
(38, '522', 522, 'not_scanned'),
(39, '1962', 1, 'not_scanned'),
(40, '652', 2, 'not_scanned'),
(41, '51', 2, 'not_scanned'),
(42, '1382', 2, 'not_scanned'),
(43, '1132', 3, 'not_scanned'),
(44, '1686', 2, 'not_scanned'),
(45, '1454', 2, 'not_scanned'),
(46, '1344', 1, 'not_scanned'),
(47, '205', 3, 'not_scanned'),
(48, '166', 3, 'not_scanned'),
(49, '1942', 3, 'not_scanned'),
(50, '1135', 1, 'not_scanned'),
(51, '92', 3, 'not_scanned'),
(52, '1642', 3, 'not_scanned'),
(53, '1642', 3, 'not_scanned'),
(54, '1466', 3, 'not_scanned'),
(55, '1466', 3, 'not_scanned');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nomor_hp` varchar(20) NOT NULL,
  `alamat_lengkap` varchar(255) NOT NULL,
  `poin` int(11) DEFAULT 0,
  `password` varchar(255) NOT NULL,
  `confirm_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `nomor_hp`, `alamat_lengkap`, `poin`, `password`, `confirm_password`) VALUES
(1, 'Yadi Sutiadi', '+6285941841040', 'kp sawo desa citatah kecamatan cipatat bandung barat', 4, '', ''),
(2, 'iday', '0881010273743', 'Kemayoran, Jakarta pusat', 0, '', ''),
(3, '', '', '', 0, '', ''),
(4, '', '', '', 0, '', ''),
(5, '', '', '', 0, '', ''),
(6, 'agus santoso', '', 'kemayoran, jakarta pusat.', 0, '', ''),
(7, 'dinda', '', 'kp sawo desa citatah kecamatan cipatat bandung barat', 0, '', ''),
(8, 'dinda', '', 'kp sawo desa citatah kecamatan cipatat bandung barat', 0, '', ''),
(9, 'dinda', '', 'kp sawo desa citatah kecamatan cipatat bandung barat', 0, '', ''),
(10, 'rinda', '0888888881', 'tangerang', 0, '', ''),
(11, 'JUNI', '123456789', 'BANDUNG', 0, '', ''),
(12, 'INDAH APRILIA', '987654321', 'BUAH BATU BANDUNG', 0, '', ''),
(13, 'INDAH APRILIA', '987654321', 'BUAH BATU BANDUNG', 0, '', ''),
(14, '', '1122', 'KP CILOK\r\n\r\n', 0, '', ''),
(15, '', '3344', 'KP REMAN', 0, '', ''),
(16, 'idris2', '3344', 'kp reman lagi', 0, '', ''),
(17, 'heru', '7788', 'bandung', 0, '', ''),
(18, 'liana', '000', 'bandung', 0, '', ''),
(19, 'Septian', '00', 'bandung', 7, '$2y$10$jbsDMBm.LleOZ/PJ2bM4getAdFmDy0jZw8LqnwQeLMynHVwGJvAae', ''),
(20, 'YADI SUTIADI1', '0881010273743', 'kp sawi mekar rt 003 rw 22 desa citatah kecamatan cipatat kabupaten bandung barat jawa barat indonesia', 0, '$2y$10$HekCIHtDNkfsENlkhgZaH.dDRMAbKHBph7WBVw17aVOWQwFdDNjD6', ''),
(21, 'guest', '112233', 'Jakarta', 0, '$2y$10$3qTfNdsWWTZO8PHtBzYrb.9mJPqBOpNOv5.Vi/T4v65GTh.TDrndC', ''),
(22, 'IMELDA', '0099', 'RAJAMANDALA', 0, '$2y$10$GszGhxKs275zGce6SUvZLuqFWRyFUynPrdb7rWhcSZr2wiZ1GrO0i', ''),
(23, 'ARMAN', '0099', 'KP SAWO', 0, '$2y$10$t73UNFy2nlNKYXxjaVClXu4hygBIIRvw40/2sMUAbU5Fo9kxq0fSC', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `nomor_hp` varchar(20) NOT NULL,
  `alamat_lengkap` text NOT NULL,
  `points` int(11) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `qr_codes`
--
ALTER TABLE `qr_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `qr_codes`
--
ALTER TABLE `qr_codes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
