-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2021 at 09:26 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$GAji0.CiGmAK22DMLZFgM.CjFRYW07JFupiEeUsLFXlwXkIVCiXfG');

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE `kontak` (
  `idkontak` int(11) NOT NULL,
  `tipekontak` varchar(30) NOT NULL,
  `namakontak` varchar(30) NOT NULL,
  `tentang` text NOT NULL,
  `line` varchar(20) NOT NULL,
  `instagram` varchar(20) NOT NULL,
  `whatsapp` varchar(20) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`idkontak`, `tipekontak`, `namakontak`, `tentang`, `line`, `instagram`, `whatsapp`, `gambar`) VALUES
(1, '1', 'Garid Achmad Fachrudin', '      Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae porro amet facilis iusto minima, nemo dolores optio quo ea ullam blanditiis excepturi tempore sit nulla in omnis quis mollitia quasi. Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa assumenda quo explicabo voluptas. Dolor fugit inventore unde, suscipit voluptas magni facere debitis similique eos, quaerat nemo omnis, dolores ratione id.', 'Garid Achmad Fachrud', '08888888', 'waaaaa', '678-png-transparent-shopping-bag-icon-orange-shopping-bag-text-logo-coffee-shop.png'),
(2, '2', 'Gid Achmad', ' Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae porro amet facilis iusto minima, nemo dolores optio quo ea ullam blanditiis excepturi tempore sit nulla in omnis quis mollitia quasi. Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa assumenda quo explicabo voluptas. Dolor fugit inventore unde, suscipit voluptas magni facere debitis similique eos, quaerat nemo omnis, dolores ratione id.', 'line.com', 'intagram.com', '999999', '142-zelda.jpg'),
(3, '3', 'Khoirul Fahmi', '  Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae porro amet facilis iusto minima, nemo dolores optio quo ea ullam blanditiis excepturi tempore sit nulla in omnis quis mollitia quasi. Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa assumenda quo explicabo voluptas. Dolor fugit inventore unde, suscipit voluptas magni facere debitis similique eos, quaerat nemo omnis, dolores ratione id.', 'fahmie08109999', 'khoirulfahmi44', '62895345860230888', '156-coffee-mugs-1727056_1920.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `idproduk` int(11) NOT NULL,
  `namaproduk` varchar(100) NOT NULL,
  `komposisi` text NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`idproduk`, `namaproduk`, `komposisi`, `gambar`, `deskripsi`, `harga`) VALUES
(7, 'kopi luwak white kopi enak', 'kopi,susu', '904-kopiluwak.jpg', 'rasanya ajib', 30000),
(9, 'kopi robusta', 'kopi,susu,gula', '378-kopirobusta.jpg', 'mantep reuyy', 250000),
(10, 'kopi abc', 'kopi,susu', '343-timeline_20200904_053205.jpg', 'Kopi Arabika diduga pertama kali diklasifikasikan oleh seorang ilmuan Swedia bernama Carl Linnaeus pada tahun 1753. Jenis Kopi yang memiliki kandungan kafeina sebasar 0.8-1.4% ini awalnya berasal dari Brasil dan Etiopia. ', 30000),
(11, 'kopi goodday', 'gula,susu,entahlah', '130-ff.jpg', 'enak rasanya', 5000);

-- --------------------------------------------------------

--
-- Table structure for table `quote`
--

CREATE TABLE `quote` (
  `idquote` int(11) NOT NULL,
  `judul` text NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quote`
--

INSERT INTO `quote` (`idquote`, `judul`, `deskripsi`) VALUES
(1, 'Quote Tahunan', '   \"Hidup ini hanya sekali dan peluang itu juga sekali munculnya, keduanya tidak datang dua kali. mungkin\"');

-- --------------------------------------------------------

--
-- Table structure for table `review_produk`
--

CREATE TABLE `review_produk` (
  `idreview` int(11) NOT NULL,
  `namareview` varchar(20) NOT NULL,
  `deskripsireview` text NOT NULL,
  `tgl` date NOT NULL,
  `idproduk` int(11) NOT NULL,
  `rating` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review_produk`
--

INSERT INTO `review_produk` (`idreview`, `namareview`, `deskripsireview`, `tgl`, `idproduk`, `rating`) VALUES
(42, 'fahmi', ' hbhbhbhbbh', '2021-06-03', 7, 'hbhbhbh\r\n'),
(43, 'eren', 'adddad', '2021-06-07', 7, 'kurang puas'),
(44, 'irul', 'cfyvgbhjnk', '2021-06-07', 7, 'kurang puas'),
(45, 'ennnnn', 'ddddd', '2021-06-07', 7, 'sangat puas'),
(46, 'nurul', 'ttttt', '2021-06-07', 10, 'sangat puas'),
(47, 'nurul', 'ttttt', '2021-06-07', 10, 'sangat puas'),
(48, 'nurul', 'ttttt', '2021-06-07', 10, 'sangat puas'),
(49, 'mikasa', 'erennya mati', '2021-06-07', 9, 'tidak puas'),
(50, 'mikasa', 'erennya mati', '2021-06-07', 9, 'tidak puas'),
(51, 'armin', 'aaaa', '2021-06-07', 9, 'sangat puas'),
(52, 'fahmi', 'good job', '2021-06-09', 10, 'sangat puas'),
(53, 'nama', 'review', '2021-06-10', 7, 'biasa');

-- --------------------------------------------------------

--
-- Table structure for table `tentang`
--

CREATE TABLE `tentang` (
  `idtentang` int(11) NOT NULL,
  `judul` varchar(40) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tentang`
--

INSERT INTO `tentang` (`idtentang`, `judul`, `deskripsi`, `gambar`) VALUES
(1, 'kopi abah ambu ', ' kopi abah ambu adalah sebuah website yang menjual sebuah produk kopi berkualitas tinggi dengan harga yang bersahabat', '747-steampunk.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`idkontak`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`idproduk`);

--
-- Indexes for table `quote`
--
ALTER TABLE `quote`
  ADD PRIMARY KEY (`idquote`);

--
-- Indexes for table `review_produk`
--
ALTER TABLE `review_produk`
  ADD PRIMARY KEY (`idreview`);

--
-- Indexes for table `tentang`
--
ALTER TABLE `tentang`
  ADD PRIMARY KEY (`idtentang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
  MODIFY `idkontak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `idproduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `review_produk`
--
ALTER TABLE `review_produk`
  MODIFY `idreview` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `tentang`
--
ALTER TABLE `tentang`
  MODIFY `idtentang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
