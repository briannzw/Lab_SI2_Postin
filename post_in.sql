-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Jun 2022 pada 18.25
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
  `image` varchar(32) NOT NULL,
  `caption` varchar(256) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `post`
--

INSERT INTO `post` (`id`, `user`, `image`, `caption`, `created_at`) VALUES
('1', 'user_01', 'http://picsum.photos/200/200', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut e', '2022-06-12 16:41:13'),
('62a61255d5f929.21504992', 'aa', '', 'test', '2022-06-12 23:20:37'),
('62a6127aef5dc6.95101977', 'aa', '', 'test', '2022-06-12 23:21:14'),
('62a61326dff211.23229821', 'admin', '', 'I\'m admin', '2022-06-12 23:24:06');

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
('6118b2a943acc2.78631959', 'Administrator', 'admin@mail.com', 'admin', '$2y$10$KNFkU8Uyj/PPKm4GOs0nj.E.eXiof3Wjhku8wBGL6yZs4dOerpsEO', NULL, 1, '2021-08-14 23:22:33', '2022-06-12 11:23:51'),
('62a5e8b1621f44.48183918', 'aa', 'aaa@aa.com', 'aaaa', '$2y$10$gCzYT2urBBwJ7Bom44/.juctWMAlYoiXCtCUxzOGkkMd6wVTx.YAC', NULL, 0, '2022-06-12 13:22:57', '2022-06-12 08:23:54'),
('62a60b39d527a1.86801851', 'aa', 'aa@aa.com', 'aa', '$2y$10$cChlcdCuSfzNnl6nF0oIueMdzIsowJC4nfTwS3Ha5jFVNhhyzMYv6', NULL, 0, '2022-06-12 15:50:17', '2022-06-12 10:52:38');

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
