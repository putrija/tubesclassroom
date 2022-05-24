-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2022 at 01:44 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `classroom`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `idberita` int(255) NOT NULL,
  `idkelas` int(255) NOT NULL,
  `namaberita` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE `forum` (
  `idforum` int(200) NOT NULL,
  `judul` text NOT NULL,
  `deskripsi` longtext NOT NULL,
  `attachment` text NOT NULL,
  `nilai` int(200) NOT NULL,
  `tenggat_waktu` date NOT NULL,
  `idberita` int(200) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `idkelas` int(200) NOT NULL,
  `namakelas` text NOT NULL,
  `bagian` text NOT NULL,
  `mapel` text NOT NULL,
  `ruang` text NOT NULL,
  `kodekelas` text NOT NULL,
  `deskripsi` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`idkelas`, `namakelas`, `bagian`, `mapel`, `ruang`, `kodekelas`, `deskripsi`) VALUES
(1, '', '', '', '', '0', ''),
(2, '', '', '', '', '0', ''),
(3, '2', '2', '2', '2', '0', ''),
(4, '', '', '', '', '4', ''),
(5, '', '', '', '', '0', ''),
(6, '3', '3', '3', '3', '0', ''),
(7, '', '', '', '', '5', ''),
(8, '', '', '', '', '0', ''),
(9, '4', '3', '3', '3', '0', ''),
(10, '', '', '', '', '0', ''),
(11, '', '', '', '', '9', ''),
(12, '5', '3', '3', '3', '0', ''),
(13, '', '', '', '', '0', ''),
(14, 'qq', 'qq', 'qq', 'qq', '0', ''),
(15, 'w', 'w', 'w', 'w', '0', ''),
(16, 'e', 'e', 'ee', 'e', '0', ''),
(17, 'r', 'r', 'r', 'r', '0', ''),
(18, 's', 's', 's', 's', '0', ''),
(19, 'a', 'a', 'a', 'a', '', ''),
(20, 'q', 'q', 'q', 'q', '6hj7Fgi5', ''),
(21, 'SBD', 'HALO', 'HAI', 'MATEMATIKA', 'DlqT3H5F', ''),
(22, 'SBD', 'Database', 'Algorithm', 'C', 'GnRT0pZr', ''),
(23, 'SBD', 'HALO', 'HAI', 'MATEMATIKA', 'mXSEGjNL', ''),
(24, '1', '1', '1', '1', '7Nzhsnq2', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `iduser` int(200) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `username`, `password`, `nama_user`, `email`, `created_at`) VALUES
(1, 'a', '$2y$10$A8.fFgrsm9O75UYuo/m7De0R5oDYUcrsM2FpLhhDfh5BBRJD4IkOW', 'a', 'a@gmail.com', '2022-05-24 11:40:37');

-- --------------------------------------------------------

--
-- Table structure for table `user_level`
--

CREATE TABLE `user_level` (
  `iduserlevel` int(255) NOT NULL,
  `iduser` int(255) NOT NULL,
  `idkelas` int(255) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_level`
--

INSERT INTO `user_level` (`iduserlevel`, `iduser`, `idkelas`, `level`) VALUES
(1, 0, 0, ''),
(2, 0, 0, ''),
(3, 0, 0, ''),
(4, 0, 0, ''),
(5, 0, 0, ''),
(6, 0, 0, ''),
(7, 0, 0, ''),
(8, 0, 0, ''),
(9, 0, 0, ''),
(10, 0, 0, ''),
(11, 0, 0, ''),
(12, 0, 0, ''),
(13, 0, 0, ''),
(14, 0, 0, ''),
(15, 0, 0, ''),
(16, 0, 0, ''),
(17, 0, 0, ''),
(18, 0, 0, ''),
(19, 0, 0, ''),
(20, 0, 0, ''),
(21, 0, 0, ''),
(22, 0, 0, ''),
(23, 4, 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`idberita`);

--
-- Indexes for table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`idforum`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`idkelas`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- Indexes for table `user_level`
--
ALTER TABLE `user_level`
  ADD PRIMARY KEY (`iduserlevel`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `idberita` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forum`
--
ALTER TABLE `forum`
  MODIFY `idforum` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `idkelas` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_level`
--
ALTER TABLE `user_level`
  MODIFY `iduserlevel` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
