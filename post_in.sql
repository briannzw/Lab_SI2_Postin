-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Jun 2022 pada 12.55
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
('62a61255d5f929.21504992', 'aa', 'img_62a716babbd1c738856530.jpg', 'tes', '2022-06-12 23:20:37'),
('62a61326dff211.23229821', 'admin', '', 'I\'m admin', '2022-06-12 23:24:06'),
('62a61811b3c976.38269861', 'admin', '', 'alo', '2022-06-12 23:45:05'),
('62a61ab054a0e7.81672608', 'admin', '', 'test123', '2022-06-12 23:56:16'),
('62a70083c8ac81.48545243', 'admin', '', 'test', '2022-06-13 16:16:51'),
('62a701da1ffff5.83665195', 'admin', 'img_62a7159048036553847673.png', 'test', '2022-06-13 16:22:34'),
('62a701fb5eede8.23220837', 'admin', 'img_62a71411164fa584854130.jpg', 'test', '2022-06-13 16:23:07');

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
('6118b2a943acc2.78631959', 'Administrator', 'admin@mail.com', 'admin', '$2y$10$KNFkU8Uyj/PPKm4GOs0nj.E.eXiof3Wjhku8wBGL6yZs4dOerpsEO', '6118b2a943acc278631959.png', 1, '2021-08-14 23:22:33', '2022-06-13 05:48:42'),
('62a5e8b1621f44.48183918', 'aa', 'aaa@aa.com', 'aaaa', '$2y$10$gCzYT2urBBwJ7Bom44/.juctWMAlYoiXCtCUxzOGkkMd6wVTx.YAC', '', 0, '2022-06-12 13:22:57', '2022-06-12 08:23:54'),
('62a6ef1de5fc78.16513731', 'aa', 'aa@aa.com', 'aa', '$2y$10$7pAGpau0wUvfTTQKEyvULuxHQ7V6TL/6pXZErCNvR/bTkiIpY2hQq', '', 0, '2022-06-13 08:02:37', '2022-06-13 03:02:40');

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
