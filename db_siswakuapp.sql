-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Bulan Mei 2019 pada 09.56
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_siswakuapp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `hobi`
--

CREATE TABLE `hobi` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_hobi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `hobi`
--

INSERT INTO `hobi` (`id`, `nama_hobi`, `created_at`, `updated_at`) VALUES
(1, 'Coding', '2019-01-17 06:59:04', '2019-01-17 06:59:04'),
(2, 'Membaca', '2019-01-17 06:59:10', '2019-01-17 06:59:10'),
(3, 'Game', '2019-01-17 06:59:18', '2019-01-17 06:59:18'),
(4, 'Hiking', '2019-01-17 06:59:29', '2019-01-17 06:59:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hobi_siswa`
--

CREATE TABLE `hobi_siswa` (
  `id_siswa` int(10) UNSIGNED NOT NULL,
  `id_hobi` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `hobi_siswa`
--

INSERT INTO `hobi_siswa` (`id_siswa`, `id_hobi`, `created_at`, `updated_at`) VALUES
(1, 1, '2019-01-17 07:01:12', '2019-01-17 07:01:12'),
(2, 3, '2019-01-17 07:02:12', '2019-01-17 07:02:12'),
(3, 1, '2019-01-17 07:03:27', '2019-01-17 07:03:27'),
(3, 2, '2019-01-17 07:03:27', '2019-01-17 07:03:27'),
(4, 3, '2019-01-17 07:04:59', '2019-01-17 07:04:59'),
(4, 4, '2019-01-17 07:04:59', '2019-01-17 07:04:59'),
(5, 3, '2019-01-17 07:05:58', '2019-01-17 07:05:58'),
(5, 4, '2019-01-17 07:05:58', '2019-01-17 07:05:58'),
(6, 1, '2019-01-17 07:06:53', '2019-01-17 07:06:53'),
(8, 1, '2019-01-17 07:08:37', '2019-01-17 07:08:37'),
(9, 1, '2019-01-17 07:09:42', '2019-01-17 07:09:42'),
(9, 2, '2019-01-17 07:09:42', '2019-01-17 07:09:42'),
(10, 3, '2019-01-17 07:10:30', '2019-01-17 07:10:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_kelas` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id`, `nama_kelas`, `created_at`, `updated_at`) VALUES
(1, 'X', '2019-01-17 06:58:37', '2019-01-17 06:58:37'),
(2, 'XI', '2019-01-17 06:58:47', '2019-01-17 06:58:47'),
(3, 'XII', '2019-01-17 06:58:52', '2019-01-17 06:58:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_12_29_220305_create_table_siswa', 1),
(4, '2019_01_01_194910_create_table_telepon', 1),
(5, '2019_01_02_191017_create_table_kelas', 1),
(6, '2019_01_03_231343_create_table_hobi', 1),
(7, '2019_01_03_232343_create_table_hobi_siswa', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id` int(10) UNSIGNED NOT NULL,
  `nisn` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `nama_siswa` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('L','P') COLLATE utf8_unicode_ci NOT NULL,
  `id_kelas` int(10) UNSIGNED NOT NULL,
  `foto` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id`, `nisn`, `nama_siswa`, `tanggal_lahir`, `jenis_kelamin`, `id_kelas`, `foto`, `created_at`, `updated_at`) VALUES
(1, '1001', 'tim berners lee', '1955-06-08', 'L', 1, '20190117080112.jpg', '2019-01-17 07:01:12', '2019-01-17 07:01:12'),
(2, '1002', 'john resig', '1984-05-08', 'L', 2, '20190117080212.jpg', '2019-01-17 07:02:12', '2019-01-17 07:02:12'),
(3, '1003', 'donald knuth', '1938-01-10', 'L', 3, '20190117080327.jpg', '2019-01-17 07:03:10', '2019-01-17 07:03:27'),
(4, '1004', 'jeffrey zeldman', '1955-01-12', 'L', 1, '20190117080459.jpg', '2019-01-17 07:04:59', '2019-01-17 07:04:59'),
(5, '1005', 'yukihiro matsumoto', '1965-04-14', 'L', 2, '20190117080558.jpg', '2019-01-17 07:05:58', '2019-01-17 07:05:58'),
(6, '1006', 'richard stallman', '1953-03-16', 'L', 1, '20190117080653.jpg', '2019-01-17 07:06:53', '2019-01-17 07:06:53'),
(7, '1007', 'rasmus lerdorf', '1968-11-22', 'L', 1, '20190117080739.jpg', '2019-01-17 07:07:39', '2019-01-17 07:07:39'),
(8, '1008', 'linus torvalds', '1969-12-28', 'L', 1, '20190117080837.jpg', '2019-01-17 07:08:37', '2019-01-17 07:08:37'),
(9, '1009', 'brendan eich', '1954-01-01', 'L', 1, '20190117080942.jpg', '2019-01-17 07:09:42', '2019-01-17 07:09:42'),
(10, '1010', 'hakom wium lie', '1962-03-04', 'L', 1, '20190117081030.jpg', '2019-01-17 07:10:30', '2019-01-17 07:10:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `telepon`
--

CREATE TABLE `telepon` (
  `id_siswa` int(10) UNSIGNED NOT NULL,
  `nomor_telepon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `telepon`
--

INSERT INTO `telepon` (`id_siswa`, `nomor_telepon`, `created_at`, `updated_at`) VALUES
(1, '085111222111', '2019-01-17 07:01:12', '2019-01-17 07:01:12'),
(2, '085111222222', '2019-01-17 07:02:12', '2019-01-17 07:02:12'),
(3, '085111222333', '2019-01-17 07:03:10', '2019-01-17 07:03:10'),
(4, '085111222444', '2019-01-17 07:04:59', '2019-01-17 07:04:59'),
(5, '085111222555', '2019-01-17 07:05:58', '2019-01-17 07:05:58'),
(6, '085111222666', '2019-01-17 07:06:53', '2019-01-17 07:06:53'),
(7, '085111222777', '2019-01-17 07:07:39', '2019-01-17 07:07:39'),
(8, '082111222888', '2019-01-17 07:08:37', '2019-01-17 07:08:37'),
(9, '082888777666', '2019-01-17 07:09:42', '2019-01-17 07:09:42'),
(10, '085333222888', '2019-01-17 07:10:30', '2019-01-17 07:10:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `level` enum('admin','operator') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `level`, `created_at`, `updated_at`) VALUES
(4, 'awan pribadi basuki', 'awan@siswaku.app', NULL, '$2y$10$VpHB/oRj3yZvG9s3Sz2lcedOsqU7/aE1ymZoGM8193kY/pOLcJv.G', 'Qi1DMv5ExfHICvHdQ46S6XsTDGs5G26hNgqZp36wY1JXHjiBU2P1xb4ittAz', 'operator', '2019-01-15 14:56:49', '2019-01-15 15:03:15'),
(6, 'admin', 'admin@siswaku.app', NULL, '$2y$10$imYTwL2JwIFwNMmwieblluNyOhY3gTFAbwNjy5CRwlhaTxEILdZP2', 'PqYCCAB73aM1pj5cq4ezPCaOVTbtYmQIBmH6uuILDm9wXRgFmalTqYN0NXg3', 'admin', '2019-01-15 15:09:57', '2019-01-15 15:21:35'),
(7, 'joni doe', 'joni@siswaku.app', NULL, '$2y$10$JBsKWbULwZIouO1AJB3aueOk6Z.b9zFTTW/u.gju5Ik2vrqbGHime', '0k1m45zuSxsWGBTmyKOkqaWhUTwrX5JnyQWKKpWLfkadSrfK0IENC0D8Cri2', 'operator', '2019-01-15 15:22:33', '2019-01-15 15:23:34');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `hobi`
--
ALTER TABLE `hobi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `hobi_siswa`
--
ALTER TABLE `hobi_siswa`
  ADD PRIMARY KEY (`id_siswa`,`id_hobi`),
  ADD KEY `hobi_siswa_id_siswa_index` (`id_siswa`),
  ADD KEY `hobi_siswa_id_hobi_index` (`id_hobi`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
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
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `siswa_nisn_unique` (`nisn`),
  ADD KEY `siswa_id_kelas_foreign` (`id_kelas`);

--
-- Indeks untuk tabel `telepon`
--
ALTER TABLE `telepon`
  ADD PRIMARY KEY (`id_siswa`),
  ADD UNIQUE KEY `telepon_nomor_telepon_unique` (`nomor_telepon`);

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
-- AUTO_INCREMENT untuk tabel `hobi`
--
ALTER TABLE `hobi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `hobi_siswa`
--
ALTER TABLE `hobi_siswa`
  ADD CONSTRAINT `hobi_siswa_id_hobi_foreign` FOREIGN KEY (`id_hobi`) REFERENCES `hobi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hobi_siswa_id_siswa_foreign` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_id_kelas_foreign` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `telepon`
--
ALTER TABLE `telepon`
  ADD CONSTRAINT `telepon_id_siswa_foreign` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
