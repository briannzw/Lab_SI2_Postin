-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Jun 2022 pada 15.52
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `post.in`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `post`
--

CREATE TABLE `post` (
  `id` varchar(32) NOT NULL,
  `user` varchar(64) NOT NULL,
  `caption` varchar(256) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `post`
--

INSERT INTO `post` (`id`, `user`, `caption`, `created_at`) VALUES
('1', 'user_01', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut e', '2022-06-12 16:41:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` varchar(32) NOT NULL,
  `name` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(32) DEFAULT NULL,
  `admin` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `last_login` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `username`, `password`, `avatar`, `admin`, `created_at`, `last_login`) VALUES
('6118b2a943acc2.78631959', 'Administrator', 'admin@mail.com', 'admin', '$2y$10$hRi1qju2KOeEPcBZ0wYfhu/PN5e9Wl.ddWeDTds8Uokad764X9D1a', NULL, 1, '2021-08-14 23:22:33', '2022-06-12 08:44:26'),
('62a5e25fc75b33.17790395', 'aa', 'aa@aa.com', 'aa', '$2y$10$Ae8MqiQtYFXCT2TYDbk7qu7EyhlU95qv7qrxb/WTaurxLjzyGYBNq', NULL, 0, '2022-06-12 12:55:59', '2022-06-12 08:38:09'),
('62a5e8b1621f44.48183918', 'aa', 'aaa@aa.com', 'aaaa', '$2y$10$gCzYT2urBBwJ7Bom44/.juctWMAlYoiXCtCUxzOGkkMd6wVTx.YAC', NULL, 0, '2022-06-12 13:22:57', '2022-06-12 08:23:54');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
