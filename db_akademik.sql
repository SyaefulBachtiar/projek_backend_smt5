-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Nov 2024 pada 13.35
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_akademik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `account`
--

CREATE TABLE `account` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `account`
--

INSERT INTO `account` (`id`, `name`, `email`, `password`, `role_id`) VALUES
(1, 'abda', 'abda@gmail.com', '$2y$10$7H4P/tpKjK4ZJEuEJqczheiwJUvRgTyddTvhjaxma8rm5yTu2iat.', 'admin'),
(2, 'abde', 'abde@gmail.com', '$2y$10$7H4P/tpKjK4ZJEuEJqczheiwJUvRgTyddTvhjaxma8rm5yTu2iat.', 'user');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(3, '2024-11-16-063354', 'App\\Database\\Migrations\\Account', 'default', 'App', 1732329625, 1),
(4, '2024-11-23-023827', 'App\\Database\\Migrations\\TblMahasiswa', 'default', 'App', 1732329625, 1),
(5, '2024-11-23-030225', 'App\\Database\\Migrations\\TblMahasiswa', 'default', 'App', 1732331027, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblmahasiswa`
--

CREATE TABLE `tblmahasiswa` (
  `id_mhs` int(11) UNSIGNED NOT NULL,
  `npm` varchar(16) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `create_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tblmahasiswa`
--

INSERT INTO `tblmahasiswa` (`id_mhs`, `npm`, `nama`, `alamat`, `tanggal_lahir`, `jenis_kelamin`, `email`, `foto`, `create_date`) VALUES
(1, '433785520122001', 'abda', 'karawang', '2014-11-04', 'laki-laki', 'abda@gmail.com', '123', '2024-11-23 01:26:00'),
(2, '433785520122002', 'Abde', 'Karawang', '2024-11-07', 'laki - lak', 'abde@gmail.com', '123', '2024-11-22 23:05:00'),
(3, '433785520122001', 'abda', 'karawang', '2014-11-04', 'lakilaki', 'abda@gmail.com', '123', '2024-11-23 01:26:00'),
(4, '433785520122002', 'Abde', 'Karawang', '2024-11-07', 'lakilaki', 'abde@gmail.com', '123', '2024-11-22 23:05:00'),
(5, '', 'Sule', 'hahs', '2000-11-11', 'L', 'sule@gmail.com', NULL, NULL),
(6, '4337855201220034', 'rano', 'karawang', '2000-11-11', 'L', 'rano@gmail.com', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tblmahasiswa`
--
ALTER TABLE `tblmahasiswa`
  ADD PRIMARY KEY (`id_mhs`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tblmahasiswa`
--
ALTER TABLE `tblmahasiswa`
  MODIFY `id_mhs` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
