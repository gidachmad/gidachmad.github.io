-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Jun 2021 pada 14.13
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kopi_abah_ambu`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `idadmin` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`idadmin`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$ZsK2TusGsTBHtslrscOsXeF66gl3Z7p2/dTksSRK7pDNYRZfv/rOe');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_kontak`
--

CREATE TABLE `jenis_kontak` (
  `idjeniskontak` int(11) NOT NULL,
  `namajeniskontak` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_kontak`
--

INSERT INTO `jenis_kontak` (`idjeniskontak`, `namajeniskontak`) VALUES
(1, 'Owner'),
(2, 'Developer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_produk`
--

CREATE TABLE `jenis_produk` (
  `idjenis` int(11) NOT NULL,
  `namajenis` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_produk`
--

INSERT INTO `jenis_produk` (`idjenis`, `namajenis`) VALUES
(1, 'Arabika'),
(2, 'Mocacino');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kontak`
--

CREATE TABLE `kontak` (
  `idkontak` int(11) NOT NULL,
  `tipekontak` int(11) NOT NULL,
  `namakontak` varchar(30) NOT NULL,
  `tentang` text NOT NULL,
  `line` varchar(20) NOT NULL,
  `instagram` varchar(20) NOT NULL,
  `whatsapp` varchar(20) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kontak`
--

INSERT INTO `kontak` (`idkontak`, `tipekontak`, `namakontak`, `tentang`, `line`, `instagram`, `whatsapp`, `gambar`) VALUES
(1, 1, 'Garid Achmad Fachrudin', '  Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae porro amet facilis iusto minima, nemo dolores optio quo ea ullam blanditiis excepturi tempore sit nulla in omnis quis mollitia quasi. Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa assumenda quo explicabo voluptas. Dolor fugit inventore unde, suscipit voluptas magni facere debitis similique eos, quaerat nemo omnis, dolores ratione id.', 'Garid Achmad Fachrud', '334444447766', 'whatsapp.com', '1609763737279.jpg'),
(2, 2, 'Gid Achmad Ahlul Fadli', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae porro amet facilis iusto minima, nemo dolores optio quo ea ullam blanditiis excepturi tempore sit nulla in omnis quis mollitia quasi. Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa assumenda quo explicabo voluptas. Dolor fugit inventore unde, suscipit voluptas magni facere debitis similique eos, quaerat nemo omnis, dolores ratione id.', 'line.com', 'intagram.com', '0899999877', '1609763737279.jpg'),
(3, 2, 'Khoirul Fahmi', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae porro amet facilis iusto minima, nemo dolores optio quo ea ullam blanditiis excepturi tempore sit nulla in omnis quis mollitia quasi. Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa assumenda quo explicabo voluptas. Dolor fugit inventore unde, suscipit voluptas magni facere debitis similique eos, quaerat nemo omnis, dolores ratione id.', 'fahmie0810', 'khoirulfahmi44', '62895345860230', '1609763737279.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `idproduk` int(11) NOT NULL,
  `namaproduk` varchar(100) NOT NULL,
  `jenisproduk` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`idproduk`, `namaproduk`, `jenisproduk`, `gambar`, `deskripsi`, `harga`) VALUES
(7, 'kopi luwak white kopi enak', 1, '904-kopiluwak.jpg', 'rasanya enak', 30000),
(9, 'kopi robusta', 2, '378-kopirobusta.jpg', 'mantep reuyy', 250000),
(10, 'kopi abc', 2, '343-timeline_20200904_053205.jpg', 'Kopi Arabika diduga pertama kali diklasifikasikan oleh seorang ilmuan Swedia bernama Carl Linnaeus pada tahun 1753. Jenis Kopi yang memiliki kandungan kafeina sebasar 0.8-1.4% ini awalnya berasal dari Brasil dan Etiopia. ', 30000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tentang`
--

CREATE TABLE `tentang` (
  `idtentang` int(11) NOT NULL,
  `judul` varchar(20) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tentang`
--

INSERT INTO `tentang` (`idtentang`, `judul`, `deskripsi`, `gambar`) VALUES
(1, 'kopi abah ambu onlin', '      ini tentang kopi yang enak', '747-steampunk.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Indeks untuk tabel `jenis_kontak`
--
ALTER TABLE `jenis_kontak`
  ADD PRIMARY KEY (`idjeniskontak`);

--
-- Indeks untuk tabel `jenis_produk`
--
ALTER TABLE `jenis_produk`
  ADD PRIMARY KEY (`idjenis`);

--
-- Indeks untuk tabel `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`idkontak`),
  ADD KEY `kontak_to_jenis_kontak` (`tipekontak`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`idproduk`),
  ADD KEY `produk_to_jenis` (`jenisproduk`);

--
-- Indeks untuk tabel `tentang`
--
ALTER TABLE `tentang`
  ADD PRIMARY KEY (`idtentang`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jenis_produk`
--
ALTER TABLE `jenis_produk`
  MODIFY `idjenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kontak`
--
ALTER TABLE `kontak`
  MODIFY `idkontak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `idproduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tentang`
--
ALTER TABLE `tentang`
  MODIFY `idtentang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kontak`
--
ALTER TABLE `kontak`
  ADD CONSTRAINT `kontak_to_jenis_kontak` FOREIGN KEY (`tipekontak`) REFERENCES `jenis_kontak` (`idjeniskontak`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_to_jenis` FOREIGN KEY (`jenisproduk`) REFERENCES `jenis_produk` (`idjenis`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
