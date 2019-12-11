-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Des 2019 pada 10.09
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kas_masjid`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kaskeluars`
--

CREATE TABLE `kaskeluars` (
  `id` int(10) UNSIGNED NOT NULL,
  `tgl_kas_keluar` date NOT NULL,
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kasmasuks`
--

CREATE TABLE `kasmasuks` (
  `id` int(10) UNSIGNED NOT NULL,
  `tgl_kas_masuk` date NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kass`
--

CREATE TABLE `kass` (
  `id` int(10) UNSIGNED NOT NULL,
  `tgl` date NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `masuk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keluar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kass`
--

INSERT INTO `kass` (`id`, `tgl`, `nama`, `keterangan`, `jumlah`, `jenis`, `masuk`, `keluar`, `created_at`, `updated_at`) VALUES
(2, '2019-12-05', 'Dede Lesmana', 'Infaq', '400000', 'masuk', '400000', '0', '2019-12-09 23:03:49', '2019-12-09 23:03:49'),
(3, '2019-12-05', 'Wildan', 'Jariyah', '40000', 'masuk', '40000', '0', '2019-12-09 23:04:03', '2019-12-09 23:04:03'),
(4, '2019-12-06', 'Lesmana Jr', 'Infaq', '450000', 'masuk', '450000', '0', '2019-12-09 23:04:19', '2019-12-09 23:04:19'),
(5, '2019-12-10', 'Dede Putra', 'Infaq', '320000', 'masuk', '320000', '0', '2019-12-09 23:04:43', '2019-12-09 23:04:43'),
(6, '2019-12-05', '-', 'Beli Cat Baru', '40000', 'keluar', '0', '40000', '2019-12-09 23:29:54', '2019-12-09 23:42:09'),
(7, '2019-12-05', '-', 'Beli Kursi Baru', '430000', 'keluar', '0', '400000', '2019-12-09 23:31:08', '2019-12-09 23:42:01'),
(8, '2019-12-06', '-', 'Bayar Honor Mubaligh', '400000', 'keluar', '0', '400000', '2019-12-09 23:31:32', '2019-12-09 23:31:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_12_05_061253_create_kasmasuks_table', 1),
(4, '2019_12_09_072002_create_kaskeluars_table', 1),
(5, '2019_12_10_044054_create_kass_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@masterkas.com', '$2y$10$UQXMGCi2rMI6PdSY6BxwJezUdCpQi5PG1Ut.PwdE6di1UhuzVp3qa', 'cNrzCR4aykBks3TXXdLCYnmtaR2asPxBYzq70f7pxKMi1pLfYHzluN0M1N2u', '2019-12-09 22:44:18', '2019-12-09 22:44:18');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kaskeluars`
--
ALTER TABLE `kaskeluars`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kasmasuks`
--
ALTER TABLE `kasmasuks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kass`
--
ALTER TABLE `kass`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kaskeluars`
--
ALTER TABLE `kaskeluars`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kasmasuks`
--
ALTER TABLE `kasmasuks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kass`
--
ALTER TABLE `kass`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
