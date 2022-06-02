-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2022 at 01:55 PM
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
-- Table structure for table `jawaban`
--

CREATE TABLE `jawaban` (
  `id` int(11) NOT NULL,
  `id_tugas` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `jwbn_siswa` varchar(200) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'diserahkan',
  `nilai` int(11) UNSIGNED DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jawaban`
--

INSERT INTO `jawaban` (`id`, `id_tugas`, `iduser`, `jwbn_siswa`, `status`, `nilai`) VALUES
(1, 24, 17, 'bellman1.pdf', 'dinilai', 100),
(4, 24, 19, '4813-CETAK KRS.pdf', 'diserahkan', 0),
(5, 27, 21, 'BAB_I_docc.pdf', 'diserahkan', 0),
(6, 32, 21, 'BAB_I_docc.pdf', 'dinilai', 0);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `idkelas` int(11) NOT NULL,
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
(71, 'SBD 21', 'teknologi informasi', 'Sistem basis data', '101', 'arlEUbA1', 'pak guru anhar'),
(72, 'Matematika', 'Semester 1', 'LIMIT', 'XII MIA 12', 'N2J7ygHh', 'BU SITI'),
(73, 'B. INGGRIS', 'Semester 1', 'Past Tense', 'XII MIA 12', 'qUAFR269', 'BU LENI');

-- --------------------------------------------------------

--
-- Table structure for table `tugas`
--

CREATE TABLE `tugas` (
  `id_tugas` int(11) NOT NULL,
  `idkelas` int(11) NOT NULL,
  `nama` text NOT NULL,
  `description` text NOT NULL,
  `upload` text NOT NULL,
  `date` date NOT NULL,
  `create` timestamp NOT NULL DEFAULT current_timestamp(),
  `jenis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tugas`
--

INSERT INTO `tugas` (`id_tugas`, `idkelas`, `nama`, `description`, `upload`, `date`, `create`, `jenis`) VALUES
(24, 71, 'tugas sbd pak anhar', 'kerjakan halaman 10', '4812-1657-Screenshot (14).png', '2022-06-25', '2022-05-31 18:36:32', 'tugas'),
(26, 72, 'MATERI', 'AAA', '1008-Screenshot (10).png', '0000-00-00', '2022-06-01 11:23:23', 'materi'),
(27, 72, 'Pertanyaan', 'pertanyaan', '9786-211402063_pointer.png', '0000-00-00', '2022-06-01 11:24:15', 'pertanyaan'),
(28, 72, 'a', 'a', '2352-', '0000-00-00', '2022-06-01 18:30:51', 'materi'),
(29, 73, 'Tugas 1', 'Kerjakan soal berikut', '7397-Screenshot (8).png', '2022-07-09', '2022-06-01 18:46:31', 'tugas'),
(30, 73, 'Materi1', 'materi', '5414-', '0000-00-00', '2022-06-01 18:53:31', 'materi'),
(31, 73, 'Pertanyaan1', 'pertanyaan', '4274-', '0000-00-00', '2022-06-01 18:54:01', 'pertanyaan'),
(32, 73, 'Tugas 2', 'tugas', '2079-', '2022-07-09', '2022-06-01 19:50:37', 'tugas');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
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
(16, 'guru1', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'pak guru anhar', 'anharto@gmail.com', '2022-05-31 18:26:47'),
(17, 'murid1', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'naruto uzumaki', 'narto@gmail.com', '2022-05-31 18:28:28'),
(18, 'murid2', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'sasuke uciha', 'saske@gmail.com', '2022-05-31 18:28:56'),
(19, 'murid3', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'sakura haruno', 'saruno@gmail.com', '2022-05-31 18:29:28'),
(20, 'siti', '54eefb4ecb912a0f9465e58f5b5967c3c43eadff', 'BU SITI', 'siti@gmail.com', '2022-06-01 11:15:28'),
(21, 'putrija', '8dd79c49d0be6850d0c633f2c2435db2bacbd0cb', 'PUTRIJA BR MALAU', 'putrija@gmail.com', '2022-06-01 11:18:03'),
(22, 'leni', '89281d7160fbc0867fc79c4fa3ebd0cb4e08e924', 'BU LENI', 'leni@gmail.com', '2022-06-01 18:44:13');

-- --------------------------------------------------------

--
-- Table structure for table `user_level`
--

CREATE TABLE `user_level` (
  `iduserlevel` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idkelas` int(11) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_level`
--

INSERT INTO `user_level` (`iduserlevel`, `iduser`, `idkelas`, `level`) VALUES
(119, 16, 71, 'teacher'),
(120, 17, 71, 'student'),
(121, 18, 71, 'student'),
(122, 19, 71, 'student'),
(123, 20, 72, 'teacher'),
(124, 21, 72, 'student'),
(125, 22, 73, 'teacher'),
(126, 21, 73, 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jawaban`
--
ALTER TABLE `jawaban`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`idkelas`);

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
-- AUTO_INCREMENT for table `jawaban`
--
ALTER TABLE `jawaban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `idkelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id_tugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user_level`
--
ALTER TABLE `user_level`
  MODIFY `iduserlevel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
