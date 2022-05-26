-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2022 at 10:17 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

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
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id` varchar(10) NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `role` enum('GURU') NOT NULL,
  `id_kelas` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id`, `id_user`, `role`, `id_kelas`) VALUES
('G001', 33, 'GURU', 'K001');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` varchar(10) NOT NULL,
  `id_guru` varchar(10) NOT NULL,
  `nama_kelas` varchar(100) NOT NULL,
  `bagian` varchar(100) NOT NULL,
  `mapel` varchar(100) NOT NULL,
  `ruang` varchar(100) NOT NULL,
  `kode_kelas` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `id_guru`, `nama_kelas`, `bagian`, `mapel`, `ruang`, `kode_kelas`) VALUES
('K001', 'G001', 'SBD 21', ' teknologi informasi', 'sistem basis data', '102', 'b1j54mqv');

-- --------------------------------------------------------

--
-- Table structure for table `murid`
--

CREATE TABLE `murid` (
  `id` varchar(10) NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `role` enum('MURID') NOT NULL,
  `id_kelas` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `nama_user` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama_user`, `email`, `Created_at`) VALUES
(1, 'admin', '$2y$10$YUgrqufmksozuj1VtDN1C.8DwEPPBOx3AMT5yFCeYCUsResux2qBq', 'Admin Anhar', 'admin@gmail.com', '2021-11-13 02:28:01'),
(6, 'admin3', '$2y$10$7QGWGfFoBpnO/0kF79LQ3ulVtr0FKJPh77PKbN7RzumVlxnwsIW.e', 'admin sss', 'admin3@gmail.com', '2021-11-18 02:41:54'),
(17, 'admin2', '$2y$10$1T4FRmIgNEPdyj5kbrlD5O23xmk7iO/EZZnKISgM74s.ZlJWBlHSi', 'admin dodo', 'admin2@gmail.com', '2021-12-10 04:54:21'),
(18, 'admin4', '$2y$10$QCjBinThkpsjZ7FaM04D7eztjyd3AlL3usKOfUFP2SdS4onihpMHy', 'Admin joko', 'admin4@gmail.com', '2021-12-10 04:54:59'),
(33, 'abc', '$2y$10$3yPIrsLR1JU4KBDWuixtD.eaqN3ZoBer9u9sNKeN8vSA4jP6LZGqC', 'coba user', 'cobauser@gmail.com', '2022-05-23 06:08:27'),
(34, 'qwerty', '$2y$10$wgDguPHxyG7TF10o2Wp14eX4lT/S/MZTtIHPk/g2oFq6anPr/R37.', 'wassup@gmail.com', 'wassup@gmail.com', '2022-05-23 06:14:49'),
(36, 'ayok', '$2y$10$4ktDHPhnB914VJGRgWJsUesEK84INBchowzxL73FDO1.KADlLQB.W', 'jaya putra', 'jaya@gmail.com', '2022-05-23 16:45:39'),
(37, 'uye', '$2y$10$vhssQCx1.m7XEFKXOf21C.nQ9oxWQOk/ZQiAhQz3Za1MGxQ5soZJ2', 'zhongli', 'zhongli@gmail.com', '2022-05-23 16:47:23'),
(38, 'asw', '$2y$10$CA3ITSkDlWQPLPO075is9.KU4aVGYoFbfmDZj10.wDjApU7nnyPdK', 'aswer', 'aswer@gmail.com', '2022-05-24 07:26:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_guru` (`id_guru`);

--
-- Indexes for table `murid`
--
ALTER TABLE `murid`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `nama_user` (`nama_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
