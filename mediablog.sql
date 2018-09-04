-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 03, 2018 at 10:23 PM
-- Server version: 10.0.34-MariaDB-0ubuntu0.16.04.1
-- PHP Version: 7.0.30-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mediablog`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `idartikel` int(2) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `isi` varchar(500) NOT NULL,
  `img` text NOT NULL,
  `kategori` text NOT NULL,
  `visitor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`idartikel`, `judul`, `isi`, `img`, `kategori`, `visitor`) VALUES
(38, 'Siswa Siswi Berprestasi', '  Siswa-siswi SMA/K di Jakarta bersaing menunjukkan kemampuan wirausaha pada Regional Student Company Competition 2018 yang diselenggarakan oleh Prestasi Junior Indonesia (PJI) bersama Citi Indonesia (Citibank) dan PT AIG Insurance Indonesia (AIG Indonesia) di Atrium Green Pramuka Square, Sabtu (28/7). Artikel ini telah tayang di Kompas.com dengan judul "Melatih Wirausaha Siswa SMA/K melalui Aplikasi Simulasi Perusahaan", https://edukasi.kompas.com/read/2018/07/29/12562', '12.png', ' pendidikan , kesehatan ,', 0),
(39, 'BACK TO BASIC (B2B) 2018', 'Back to Basic adalah ospec jurusan teknik elektro yang bertujuan untuk mengenalkan teknik elektro kepada mahasiswa baru 2018 dari tanggal 4-7 Agustus 2018. Kegiatan dimulai dari penerimaan mahasiswa baru dari pekan kampus dan dilanjutkan dengan pengenalan panitia beserta memberikan instruksi untuk acara pada tanggal 6 Agustus 2018. Pada tanggal 6 A..', '11.png', ' pendidikan ,', 2),
(40, 'Presiden Joko Widodo untuk mempromosikan pesta olahraga', '    Banyak cara dilakukan Presiden Joko Widodo untuk mempromosikan pesta olahraga Asian Games 2018 yang akan berlangsung sebulan mendatang di Jakarta dan Palembang. Sebelumnya, Jokowi masif mempromosikan Asian Games ke-18 itu lewat jaket berwarna-warni bergambarkan simbol-simbol Asian Games. Kali ini, Jokowi mempromosikan gelaran Asian Games 2018 melalui video blog atau vlog, saat ia berolahraga bersama sang cucu, Jan Ethes.\r\n\r\nArtikel ini telah tayang di Kompas.com dengan judul "Vlog: Olahraga ', '3.png', ' politik , kesehatan ,', 3);

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `idkomentar` int(2) NOT NULL,
  `idartikel` int(2) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `komen` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`idkomentar`, `idartikel`, `nama`, `email`, `komen`) VALUES
(2, 29, 'annan', 'haha@haha.com', 'ahajhahaa hhjaha'),
(3, 29, 'annan', 'haha@haha.com', 'ahajhahaa hhjaha'),
(4, 30, 'yahya', 'yahya@yahya.com', 'yahya yahaya'),
(5, 30, 'yahya', 'yahya@yahya.com', 'yahya yahaya');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `iduser` int(2) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `alamat` varchar(40) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `nama`, `alamat`, `email`, `password`) VALUES
(1, 'yahya', 'geneng, wonogiri, jawa tengah', 'yahya@yahya.com', 'yahya'),
(18, 'edo saputra', 'wonogiri jawa tengah', 'edo@edo.com', 'edo'),
(19, 'randi', 'wonogiri jawa tengah', 'randi@randi.com', 'radni');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`idartikel`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`idkomentar`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `idartikel` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `idkomentar` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
