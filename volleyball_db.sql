-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Nov 2023 pada 14.16
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
-- Database: `volleyball_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `matches`
--

CREATE TABLE `matches` (
  `id` int(11) NOT NULL,
  `team1_id` int(11) NOT NULL,
  `team2_id` int(11) NOT NULL,
  `score_team1` int(11) DEFAULT NULL,
  `score_team2` int(11) DEFAULT NULL,
  `time` time DEFAULT NULL,
  `location` varchar(255) NOT NULL,
  `preview` varchar(255) NOT NULL DEFAULT 'Close'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `matches`
--

INSERT INTO `matches` (`id`, `team1_id`, `team2_id`, `score_team1`, `score_team2`, `time`, `location`, `preview`) VALUES
(1, 1, 2, 3, 0, '17:00:00', 'Japan', 'Close');

-- --------------------------------------------------------

--
-- Struktur dari tabel `players`
--

CREATE TABLE `players` (
  `id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `number` int(11) NOT NULL,
  `nation` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `players`
--

INSERT INTO `players` (`id`, `team_id`, `name`, `number`, `nation`, `age`, `height`, `weight`, `photo`) VALUES
(1, 1, 'Malson Holgate', 17, 'England', 20, 192, 60, 'image/atlet tim 1.png'),
(2, 2, 'Masahiro Yamadiga', 10, 'Japan', 21, 189, 78, 'image/atlet tim 2.png'),
(3, 1, 'Michael Kiane', 12, 'England', 24, 197, 89, 'image/society2.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `teams`
--

CREATE TABLE `teams` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `poin` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `teams`
--

INSERT INTO `teams` (`id`, `name`, `logo`, `poin`) VALUES
(1, 'Society', 'image/club1.png', 12),
(2, 'Blueray', 'image/club2.png', 15);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL DEFAULT '''image/foto-profil.jpg''',
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `email`, `username`, `photo`, `password`, `role`) VALUES
(2, 'muhammad.khadziq059@mhs.unsoed.ac.id', 'mkhadziqq', 'image/foto-profil.jpg', '$2y$10$ZcdGT2iLgZuhZljzzujnKe8qIv2hOCCC9K48Uj6z31PMc4T6t.8w6', 'user'),
(3, 'muhammadkhadziq26@gmail.com', 'khadziq', 'image/foto-profil.jpg', '$2y$10$lMBGW8srMr1akDvYdByU2Os4hEOw/ZjCnNg174qLSJ0QcPJRvPqci', 'admin'),
(4, 'izan@gmail.com', 'izan', 'image/foto-profil.jpg', '$2y$10$1.3aUUafRP9.zYmdaqflduTGl1yFyfsTYWDi40S4ItMJVZEbhbsgG', 'user');

-- --------------------------------------------------------

--
-- Struktur dari tabel `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `video`
--

INSERT INTO `video` (`id`, `link`) VALUES
(1, 'https://www.youtube.com/embed/NnE-HbbLeqs?si=q2WjrNXnku-EEAG5'),
(2, 'https://www.youtube.com/embed/NnE-HbbLeqs?si=q2WjrNXnku-EEAG5'),
(3, 'https://www.youtube.com/embed/Eb5kpTucbfU?si=13IQYfhroaleb5e3'),
(4, 'https://www.youtube.com/embed/Eb5kpTucbfU?si=13IQYfhroaleb5e3'),
(5, 'https://www.youtube.com/embed/NnE-HbbLeqs?si=q2WjrNXnku-EEAG5'),
(6, 'https://www.youtube.com/embed/Eb5kpTucbfU?si=13IQYfhroaleb5e3'),
(7, 'https://www.youtube.com/embed/Eb5kpTucbfU?si=13IQYfhroaleb5e3'),
(8, 'https://www.youtube.com/embed/NnE-HbbLeqs?si=q2WjrNXnku-EEAG5'),
(9, 'https://www.youtube.com/embed/Eb5kpTucbfU?si=13IQYfhroaleb5e3'),
(10, 'https://www.youtube.com/embed/Eb5kpTucbfU?si=13IQYfhroaleb5e3'),
(11, 'https://www.youtube.com/embed/NnE-HbbLeqs?si=q2WjrNXnku-EEAG5'),
(12, 'https://www.youtube.com/embed/Eb5kpTucbfU?si=13IQYfhroaleb5e3'),
(13, 'https://www.youtube.com/embed/Eb5kpTucbfU?si=13IQYfhroaleb5e3'),
(14, 'https://www.youtube.com/embed/NnE-HbbLeqs?si=q2WjrNXnku-EEAG5'),
(15, 'https://www.youtube.com/embed/Eb5kpTucbfU?si=13IQYfhroaleb5e3'),
(16, 'https://www.youtube.com/embed/Eb5kpTucbfU?si=13IQYfhroaleb5e3'),
(17, 'https://www.youtube.com/embed/NnE-HbbLeqs?si=q2WjrNXnku-EEAG5'),
(18, 'https://www.youtube.com/embed/Eb5kpTucbfU?si=13IQYfhroaleb5e3'),
(19, 'https://www.youtube.com/embed/NErgJVCFmxU?si=89aJII2p19ktb6TK'),
(20, 'https://www.youtube.com/embed/xWMyNvycQJg?si=-98sdtP6EGKhnKFe'),
(21, 'https://www.youtube.com/embed/o4dJGT7S9Jc?si=RYyQn0kS0pncfamV');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `team1_id` (`team1_id`,`team2_id`);

--
-- Indeks untuk tabel `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`),
  ADD KEY `team_id` (`team_id`);

--
-- Indeks untuk tabel `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `matches`
--
ALTER TABLE `matches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `players`
--
ALTER TABLE `players`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `matches`
--
ALTER TABLE `matches`
  ADD CONSTRAINT `matches_ibfk_1` FOREIGN KEY (`team1_id`) REFERENCES `teams` (`id`),
  ADD CONSTRAINT `matches_ibfk_2` FOREIGN KEY (`team2_id`) REFERENCES `teams` (`id`);

--
-- Ketidakleluasaan untuk tabel `players`
--
ALTER TABLE `players`
  ADD CONSTRAINT `players_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
