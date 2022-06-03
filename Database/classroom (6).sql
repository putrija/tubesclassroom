-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2022 at 03:42 AM
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
  `jwbn_siswa` text NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'diserahkan',
  `nilai` int(11) UNSIGNED DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jawaban`
--

INSERT INTO `jawaban` (`id`, `id_tugas`, `iduser`, `jwbn_siswa`, `status`, `nilai`) VALUES
(31, 49, 31, '2759-jawaban_putrija.pdf', 'dinilai', 100),
(32, 48, 32, 'sebuah cabang matematika yang mempelajari hubungan yang meliputi panjang dan sudut segitiga', 'diserahkan', 0),
(33, 49, 32, '6968-jawaban_reza.pdf', 'diserahkan', 0),
(34, 48, 33, 'Trigonometri adalah berkaitan dengan sin, cos, tan', 'diserahkan', 0),
(35, 48, 34, 'Trigonometri adalah Konsep kesebangunan segitiga siku-siku. ', 'diserahkan', 0),
(36, 49, 34, '3145-jawaban_recindy.pdf', 'diserahkan', 0),
(37, 51, 31, '8640-jawaban_putrija.pdf', 'dinilai', 100),
(38, 51, 33, '2619-jawaban_anhar.pdf', 'diserahkan', 0);

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
(77, 'Matematika', 'Semester 1', 'Trigonometri', 'XII MIA 12', 'f4Q93Mk1', 'IBU SITI'),
(78, 'FISIKA', 'Semester 1', 'Gaya', 'XII MIA 12', 'xEVwyC1F', 'PAK BUDI');

-- --------------------------------------------------------

--
-- Table structure for table `posting`
--

CREATE TABLE `posting` (
  `id_posting` int(11) NOT NULL,
  `postingan` varchar(255) NOT NULL,
  `iduser` int(10) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posting`
--

INSERT INTO `posting` (`id_posting`, `postingan`, `iduser`, `id_kelas`, `created_at`) VALUES
(50, 'Selamat datang di kelas Matematika yang akan diajarkan oleh saya.', 30, 77, '2022-06-02 21:31:42'),
(51, 'Selamat siang anak-anak, kelas seperti biasa\r\n', 35, 78, '2022-06-02 22:03:33');

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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `jenis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tugas`
--

INSERT INTO `tugas` (`id_tugas`, `idkelas`, `nama`, `description`, `upload`, `date`, `created_at`, `jenis`) VALUES
(48, 77, 'Trigonometri', 'Trigonometri adalah?', '8802-', '0000-00-00', '2022-06-02 21:41:53', 'pertanyaan'),
(49, 77, 'Soal Trigonometri', 'Jika sin A = 3/5, A sudut pada kuadran II, maka cos A =', '7895-', '2022-07-09', '2022-06-02 21:44:39', 'tugas'),
(50, 77, 'Trigonometri', 'Berikut adalah rumus Trigonometri', '1070-Identitas trigonometri.jpg', '0000-00-00', '2022-06-02 21:45:44', 'materi'),
(51, 78, 'Gaya', 'Kerjakan soal berikut di buku latihan', '5429-gaya.jpg', '2022-06-11', '2022-06-02 21:58:58', 'tugas');

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
(30, 'siti', '54eefb4ecb912a0f9465e58f5b5967c3c43eadff', 'IBU SITI', 'siti@gmail.com', '2022-06-02 21:26:54'),
(31, 'putrija', '8dd79c49d0be6850d0c633f2c2435db2bacbd0cb', 'PUTRIJA BR MALAU', 'putrija@gmail.com', '2022-06-02 21:29:08'),
(32, 'reza', 'b96dbf74436b3f73db2f27c2fb7c966eb1f47360', 'MUHAMMAD REZA', 'reza@gmail.com', '2022-06-02 21:49:06'),
(33, 'anhar', '70879268f10667d8d30d272272e063976b3d8f9a', 'AL ANHAR SUFI', 'anhar@gmail.com', '2022-06-02 21:52:05'),
(34, 'recindy', '5a53cfd49189f8b59eab4f13a15632583e3cb098', 'RECINDY NATALIA', 'recindy@gmail.com', '2022-06-02 21:54:10'),
(35, 'budi', '83161a62f22277c65a6cdb7ebc314f218c376c63', 'PAK BUDI', 'budi@gmail.com', '2022-06-02 21:56:56');

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
(139, 30, 77, 'teacher'),
(140, 31, 77, 'student'),
(141, 32, 77, 'student'),
(142, 33, 77, 'student'),
(143, 34, 77, 'student'),
(144, 35, 78, 'teacher'),
(145, 31, 78, 'student'),
(146, 32, 78, 'student'),
(147, 33, 78, 'student');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_forum`
-- (See below for the actual view)
--
CREATE TABLE `v_forum` (
`id_tugas` int(11)
,`idkelas` int(11)
,`nama` mediumtext
,`jenis` varchar(255)
,`created_at` timestamp
);

-- --------------------------------------------------------

--
-- Structure for view `v_forum`
--
DROP TABLE IF EXISTS `v_forum`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_forum`  AS SELECT `tugas`.`id_tugas` AS `id_tugas`, `tugas`.`idkelas` AS `idkelas`, `tugas`.`nama` AS `nama`, `tugas`.`jenis` AS `jenis`, `tugas`.`created_at` AS `created_at` FROM `tugas` ;

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
-- Indexes for table `posting`
--
ALTER TABLE `posting`
  ADD PRIMARY KEY (`id_posting`),
  ADD KEY `iduser` (`iduser`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `idkelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `posting`
--
ALTER TABLE `posting`
  MODIFY `id_posting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id_tugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `user_level`
--
ALTER TABLE `user_level`
  MODIFY `iduserlevel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
