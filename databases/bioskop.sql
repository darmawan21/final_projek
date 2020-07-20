-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Jul 2020 pada 17.25
-- Versi server: 10.1.40-MariaDB
-- Versi PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bioskop`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_banner`
--

CREATE TABLE `tabel_banner` (
  `id_banner` int(20) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `rating` varchar(50) NOT NULL,
  `genre` varchar(50) NOT NULL,
  `durasi` varchar(50) NOT NULL,
  `sinopsis` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_banner`
--

INSERT INTO `tabel_banner` (`id_banner`, `gambar`, `judul`, `rating`, `genre`, `durasi`, `sinopsis`) VALUES
(2, 'avenger.jpg', 'Avengers Endgame', '8.1', 'Action,  Adventure, Fantasy', '3h 1m', 'para Avengers pun berusaha untuk memulihkan tatanan alam semesta. Avengers yang tersisa seperti Steve Rogers/Captain America (Chris Evans), Natasha Romanoff/Black Widow (Scarlett Johansson) hingga Thor (Chris Hemsworth) mendapat bantuan dari Carol Danvers/Captain Marvel (Brie Larson).'),
(3, 'golira.png', 'Rampage', '6.5', 'Action, Adventure, Fantasy', '1h 47m', 'Primatologist Davis Okoye shares an unshakable bond with George, an extraordinarily intelligent, silverback gorilla that\'s been in his care since birth. When a rogue genetic experiment goes wrong, it causes George, a wolf and a reptile to grow to a monstrous size. As the mutated beasts embark on a path of destruction, Okoye teams up with a discredited genetic engineer and the military to secure an antidote and prevent a global catastrophe.'),
(4, 'starwars.jpg', 'Star Wars: The Rise of Skywalker', '6.7', 'Action,  Science fiction, Fantasy', '2h 22m', 'When it\'s discovered that the evil Emperor Palpatine did not die at the hands of Darth Vader, the rebels must race against the clock to find out his whereabouts. Finn and Poe lead the Resistance to put a stop to the First Order\'s plans to form a new Empire, while Rey anticipates her inevitable confrontation with Kylo Ren. Warning: Some flashing-lights scenes in this film may affect photosensitive viewers.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_bookings`
--

CREATE TABLE `tabel_bookings` (
  `id_booking` int(11) NOT NULL,
  `id_ticket` varchar(30) NOT NULL,
  `id_theater` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `id_show` int(11) NOT NULL,
  `id_screens` int(11) NOT NULL,
  `no_seats` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `ticket_date` date NOT NULL,
  `date` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_bookings`
--

INSERT INTO `tabel_bookings` (`id_booking`, `id_ticket`, `id_theater`, `id`, `id_show`, `id_screens`, `no_seats`, `amount`, `ticket_date`, `date`, `status`) VALUES
(7, 'BKID6238290', 1, 2, 1, 1, 2, 140000, '2020-07-20', '2020-07-20', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_detail_theaters`
--

CREATE TABLE `tabel_detail_theaters` (
  `id_detail` int(12) NOT NULL,
  `id_theaters` int(12) NOT NULL,
  `nama_theaters` varchar(30) NOT NULL,
  `id_film` int(12) NOT NULL,
  `judul` varchar(30) NOT NULL,
  `genre` varchar(30) NOT NULL,
  `durasi` time NOT NULL,
  `rating` varchar(20) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `tanggal_tayang` date NOT NULL,
  `jumlah` double NOT NULL,
  `harga` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_nowplaying`
--

CREATE TABLE `tabel_nowplaying` (
  `id_nowplaying` int(11) NOT NULL,
  `id_kota` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `rating` varchar(50) NOT NULL,
  `genre` varchar(50) NOT NULL,
  `durasi` varchar(50) NOT NULL,
  `sinopsis` varchar(1000) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_nowplaying`
--

INSERT INTO `tabel_nowplaying` (`id_nowplaying`, `id_kota`, `gambar`, `judul`, `rating`, `genre`, `durasi`, `sinopsis`, `status`) VALUES
(1, 1, '1.jpg', 'Avengers Endgame', '8.1', 'Action,  Science fiction, Fantasy', '3h 2m', 'Adrift in space with no food or water, Tony Stark sends a message to Pepper Potts as his oxygen supply starts to dwindle. Meanwhile, the remaining Avengers -- Thor, Black Widow, Captain America and Bruce Banner -- must figure out a way to bring back their vanquished allies for an epic showdown with Thanos -- the evil demigod who decimated the planet and the universe.', 0),
(2, 1, '2.jpg', 'Rampage', '6.5', 'Action,  Adventure, Fantasy', '1h 47m', 'Primatologist Davis Okoye shares an unshakable bond with George, an extraordinarily intelligent, silverback gorilla that\'s been in his care since birth. When a rogue genetic experiment goes wrong, it causes George, a wolf and a reptile to grow to a monstrous size. As the mutated beasts embark on a path of destruction, Okoye teams up with a discredited genetic engineer and the military to secure an antidote and prevent a global catastrophe.', 0),
(3, 1, '3.jpg', 'Star Wars: The Rise of Skywalker', '6.7', 'Action,  Science fiction, Fantasy', '2h 22m', 'When it\'s discovered that the evil Emperor Palpatine did not die at the hands of Darth Vader, the rebels must race against the clock to find out his whereabouts. Finn and Poe lead the Resistance to put a stop to the First Order\'s plans to form a new Empire, while Rey anticipates her inevitable confrontation with Kylo Ren. Warning: Some flashing-lights scenes in this film may affect photosensitive viewers.', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_screens`
--

CREATE TABLE `tabel_screens` (
  `id_screens` int(11) NOT NULL,
  `id_theater` int(11) NOT NULL,
  `nama_screens` varchar(110) NOT NULL,
  `seats` int(11) NOT NULL,
  `charge` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_screens`
--

INSERT INTO `tabel_screens` (`id_screens`, `id_theater`, `nama_screens`, `seats`, `charge`) VALUES
(1, 1, 'Screen 1', 100, 70000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_show`
--

CREATE TABLE `tabel_show` (
  `id_show` int(11) NOT NULL,
  `id_nowplaying` int(11) NOT NULL,
  `id_screens` int(11) NOT NULL,
  `id_st` int(11) NOT NULL,
  `id_theater` int(11) NOT NULL,
  `id_kota` int(11) NOT NULL,
  `tanggal_tayang` date NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_show`
--

INSERT INTO `tabel_show` (`id_show`, `id_nowplaying`, `id_screens`, `id_st`, `id_theater`, `id_kota`, `tanggal_tayang`, `harga`) VALUES
(1, 1, 1, 1, 1, 1, '2020-07-01', 400000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_show_time`
--

CREATE TABLE `tabel_show_time` (
  `id_st` int(11) NOT NULL,
  `id_screens` int(11) NOT NULL,
  `nama_show_time` varchar(100) NOT NULL,
  `jam_tayang` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_show_time`
--

INSERT INTO `tabel_show_time` (`id_st`, `id_screens`, `nama_show_time`, `jam_tayang`) VALUES
(1, 1, 'CINEMAXX THEATRE', '10:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_upcoming`
--

CREATE TABLE `tabel_upcoming` (
  `id_upcoming` int(20) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `genre` varchar(50) NOT NULL,
  `sinopsis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_upcoming`
--

INSERT INTO `tabel_upcoming` (`id_upcoming`, `gambar`, `judul`, `genre`, `sinopsis`) VALUES
(3, 'unnamed.jpg', 'Legion', 'Action | Adventure', 'lorem'),
(5, 'hqdefault.jpg', 'Avengers: Endgame', 'Family', 'Lorem');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kota`
--

CREATE TABLE `tb_kota` (
  `id_kota` int(11) NOT NULL,
  `nama_kota` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kota`
--

INSERT INTO `tb_kota` (`id_kota`, `nama_kota`) VALUES
(1, 'Solo'),
(2, 'Semarang'),
(3, 'Yogyakarta'),
(4, 'Jakarta'),
(5, 'Bandung');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_theater`
--

CREATE TABLE `tb_theater` (
  `id_theater` int(11) NOT NULL,
  `id_kota` int(11) NOT NULL,
  `nama_theater` varchar(50) NOT NULL,
  `nomer` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_theater`
--

INSERT INTO `tb_theater` (`id_theater`, `id_kota`, `nama_theater`, `nomer`) VALUES
(1, 1, 'Grand XXI', '(0271) 733721'),
(2, 1, 'Solo Paragon XXI', '(0271) 7881921'),
(3, 1, 'XXI Solo Square', '(0271) 7654221'),
(4, 1, 'The Park XXI', '(0271) 7891321'),
(5, 2, 'DP Mall XXI', '(024) 86400021'),
(6, 2, 'Citra XXI', '(024) 8415971'),
(7, 2, 'Cinepolis Java Mall', '(024) 8410011'),
(8, 2, 'Java Supermall', '(024) 8410008'),
(9, 3, 'Empire XXI Yogyakarta', '(0274) 551021'),
(10, 3, 'CGV Cinemas - Hartono Mall', '(021) 29200100'),
(11, 3, 'Cinépolis Lippo Plaza Jogja', '(0274) 2922833'),
(12, 3, 'Cinema XXI Plaza Ambarrukmo', '(0274) 4331221'),
(13, 4, 'Kota Kasablanka XXI', '(021) 29465221'),
(14, 4, 'Kemang Village XXI', '(021) 29056866'),
(15, 4, 'CGV Cinemas Green Pramuka Square Mall', '(021) 29624566'),
(16, 4, 'CGV Cinemas Sunter Mall', '0812-8418-4678'),
(17, 5, 'CGV BEC Mall', '(022) 20510051'),
(18, 5, 'CGV Miko Mall', '(022) 85444160'),
(19, 5, 'TSM XXI', '(022) 86012557'),
(20, 5, 'Ciwalk XXI', '(022) 2061017');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `level`) VALUES
(1, 'admin', '$2y$10$tbWR7ogmbLwbln6xnlCfHenY3Ml/9SWuwbXdPj8nN43JGKqjLrQmy', 'admin'),
(2, 'user', '$2y$10$EsNtMvvjFKvT0dlo4.Kim.3TCp4PENsjd6moHV1w0yWSpJ0uzM0D.', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tabel_banner`
--
ALTER TABLE `tabel_banner`
  ADD PRIMARY KEY (`id_banner`);

--
-- Indeks untuk tabel `tabel_bookings`
--
ALTER TABLE `tabel_bookings`
  ADD PRIMARY KEY (`id_booking`);

--
-- Indeks untuk tabel `tabel_detail_theaters`
--
ALTER TABLE `tabel_detail_theaters`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indeks untuk tabel `tabel_nowplaying`
--
ALTER TABLE `tabel_nowplaying`
  ADD PRIMARY KEY (`id_nowplaying`),
  ADD KEY `id_kota` (`id_kota`);

--
-- Indeks untuk tabel `tabel_screens`
--
ALTER TABLE `tabel_screens`
  ADD PRIMARY KEY (`id_screens`);

--
-- Indeks untuk tabel `tabel_show`
--
ALTER TABLE `tabel_show`
  ADD PRIMARY KEY (`id_show`);

--
-- Indeks untuk tabel `tabel_show_time`
--
ALTER TABLE `tabel_show_time`
  ADD PRIMARY KEY (`id_st`);

--
-- Indeks untuk tabel `tabel_upcoming`
--
ALTER TABLE `tabel_upcoming`
  ADD PRIMARY KEY (`id_upcoming`);

--
-- Indeks untuk tabel `tb_kota`
--
ALTER TABLE `tb_kota`
  ADD PRIMARY KEY (`id_kota`);

--
-- Indeks untuk tabel `tb_theater`
--
ALTER TABLE `tb_theater`
  ADD PRIMARY KEY (`id_theater`),
  ADD KEY `id_kota` (`id_kota`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tabel_banner`
--
ALTER TABLE `tabel_banner`
  MODIFY `id_banner` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tabel_bookings`
--
ALTER TABLE `tabel_bookings`
  MODIFY `id_booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tabel_detail_theaters`
--
ALTER TABLE `tabel_detail_theaters`
  MODIFY `id_detail` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tabel_nowplaying`
--
ALTER TABLE `tabel_nowplaying`
  MODIFY `id_nowplaying` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tabel_screens`
--
ALTER TABLE `tabel_screens`
  MODIFY `id_screens` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tabel_show`
--
ALTER TABLE `tabel_show`
  MODIFY `id_show` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tabel_show_time`
--
ALTER TABLE `tabel_show_time`
  MODIFY `id_st` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tabel_upcoming`
--
ALTER TABLE `tabel_upcoming`
  MODIFY `id_upcoming` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_kota`
--
ALTER TABLE `tb_kota`
  MODIFY `id_kota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_theater`
--
ALTER TABLE `tb_theater`
  MODIFY `id_theater` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
