-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2022 at 02:14 AM
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
  `teacher` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`idkelas`, `namakelas`, `bagian`, `mapel`, `ruang`, `kodekelas`, `teacher`) VALUES
(64, 'A', 'B', 'C', 'D', 'FVB1h0qQ', 'Putrija Malau'),
(65, 'C', 'C', 'C', 'C', 'sLQjFPwX', 'rei cantik banget'),
(66, 'a', 'a', 'a', 'a', 'xIiZyC5m', 'z'),
(67, 'a', 'a', 'a', 'a', 'qFljJ3uv', 'Santiiiiiii');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `id_p_tugas` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `id_tugas` int(11) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `nilai`, `id_p_tugas`, `iduser`, `id_tugas`, `status`) VALUES
(3, 99, 1, 2, 1, ''),
(4, 9, 0, 0, 1, 'dinilai');

-- --------------------------------------------------------

--
-- Table structure for table `pengumpulan_tugas`
--

CREATE TABLE `pengumpulan_tugas` (
  `id` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `id_tugas` int(11) NOT NULL,
  `jwbn_siswa` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengumpulan_tugas`
--

INSERT INTO `pengumpulan_tugas` (`id`, `iduser`, `id_tugas`, `jwbn_siswa`) VALUES
(1, 2, 1, 'a');

-- --------------------------------------------------------

--
-- Table structure for table `tugas`
--

CREATE TABLE `tugas` (
  `id_tugas` int(200) NOT NULL,
  `idkelas` int(200) NOT NULL,
  `nama` text NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL,
  `create` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tugas`
--

INSERT INTO `tugas` (`id_tugas`, `idkelas`, `nama`, `description`, `date`, `create`) VALUES
(1, 66, 'x', 'x', '2022-05-30', '2022-05-26 17:48:07'),
(2, 66, 'Ea non aut quod sunt', 'Eveniet consequatur', '1991-02-02', '2022-05-26 17:48:07'),
(3, 66, 'hai', 'hai', '2022-05-28', '2022-05-26 20:12:43'),
(4, 66, 'c', 'c', '2022-05-28', '2022-05-26 20:35:52');

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
(1, 'a', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'a', 'a@gmail.com', '2022-05-26 18:24:54'),
(2, 'putrija', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Putrija Malau', 'putrijamalau23@gmail.com', '2022-05-26 18:24:54'),
(3, 'bintang', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Bintang Kiyowo', 'bintang@gmail.com', '2022-05-26 18:24:54'),
(4, 'marsel', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Marselino', 'marsel@gmail.com', '2022-05-26 18:24:54'),
(5, 'wony', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Wony', 'wony@gmail.com', '2022-05-26 18:24:54'),
(6, 'halohalo', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'halohalobandung', 'halo@gmail.com', '2022-05-26 18:24:54'),
(7, 'rei', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'rei cantik banget', 'rei@gmail.com', '2022-05-26 18:24:54'),
(8, 'sayang', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'sayang banget loh', 'sayang@gmail.com', '2022-05-26 18:24:54'),
(9, 'z', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'z', 'z@gmail.com', '2022-05-26 18:24:54'),
(10, 'santi', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Santiiiiiii', 'santi@gmail.com', '2022-05-26 18:24:54'),
(11, 'thor rodriquez', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Ipsum mollitia est p', 'dujeg@mailinator.com', '2022-05-26 18:27:39'),
(12, 'cleo stein', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Labore odio ut ipsum', 'beqi@mailinator.com', '2022-05-26 18:27:39');

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
(106, 2, 64, 'teacher'),
(107, 7, 64, 'student'),
(108, 7, 65, 'teacher'),
(109, 9, 66, 'teacher'),
(110, 9, 64, 'student'),
(111, 2, 66, 'student'),
(112, 10, 67, 'teacher');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `pengumpulan_tugas`
--
ALTER TABLE `pengumpulan_tugas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id_tugas`);

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
-- AUTO_INCREMENT for table `forum`
--
ALTER TABLE `forum`
  MODIFY `idforum` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `idkelas` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pengumpulan_tugas`
--
ALTER TABLE `pengumpulan_tugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id_tugas` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_level`
--
ALTER TABLE `user_level`
  MODIFY `iduserlevel` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
