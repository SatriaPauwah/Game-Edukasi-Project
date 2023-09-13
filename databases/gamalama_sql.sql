-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2023 at 09:13 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gamalama_sql`
--

-- --------------------------------------------------------

--
-- Table structure for table `bencana_tte`
--

CREATE TABLE `bencana_tte` (
  `id_bencanatte` int(11) NOT NULL,
  `bencana` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bencana_tte`
--

INSERT INTO `bencana_tte` (`id_bencanatte`, `bencana`) VALUES
(1, '1990 - 1998'),
(2, '1989 - 1990'),
(18, 'dwdwd');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `id_user` varchar(30) NOT NULL,
  `nama_kelas` varchar(30) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `literasi_tte`
--

CREATE TABLE `literasi_tte` (
  `id_literasitte` int(11) NOT NULL,
  `id_bencana` int(11) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `literasi_tte`
--

INSERT INTO `literasi_tte` (`id_literasitte`, `id_bencana`, `deskripsi`, `foto`) VALUES
(4, 0, 'Ternate adalah kota rempah dengan sumber daya alam yang berlimpah, maka dari itu ternate sering menalamai penjajahan, maka', '');

-- --------------------------------------------------------

--
-- Table structure for table `rps_tte`
--

CREATE TABLE `rps_tte` (
  `id_rpstte` int(11) NOT NULL,
  `nama_rps` varchar(255) NOT NULL,
  `link_rps` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rps_tte`
--

INSERT INTO `rps_tte` (`id_rpstte`, `nama_rps`, `link_rps`, `deskripsi`) VALUES
(1, 'kejadian 1212', 'youtube.com', 'haaaaasxsnxjsnx');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `pass` varchar(30) NOT NULL,
  `level` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `nama`, `pass`, `level`, `foto`) VALUES
(1, 'admin', 'test', '123', 'admin', ''),
(2, 'student', 'Raihan', '123', 'student', ''),
(3, 'teacher', 'Raihan2', '123', 'teacher', ''),
(19, 'asprak', 'www QQQ', '$2y$10$NvaYV5QH8xCfH3xE9cl1C.B', 'student', '');

-- --------------------------------------------------------

--
-- Table structure for table `waiting_list`
--

CREATE TABLE `waiting_list` (
  `id_pendaftar` int(11) NOT NULL,
  `nama_depan` varchar(255) NOT NULL,
  `nama_belakang` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bencana_tte`
--
ALTER TABLE `bencana_tte`
  ADD PRIMARY KEY (`id_bencanatte`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `literasi_tte`
--
ALTER TABLE `literasi_tte`
  ADD PRIMARY KEY (`id_literasitte`);

--
-- Indexes for table `rps_tte`
--
ALTER TABLE `rps_tte`
  ADD PRIMARY KEY (`id_rpstte`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `waiting_list`
--
ALTER TABLE `waiting_list`
  ADD PRIMARY KEY (`id_pendaftar`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bencana_tte`
--
ALTER TABLE `bencana_tte`
  MODIFY `id_bencanatte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `literasi_tte`
--
ALTER TABLE `literasi_tte`
  MODIFY `id_literasitte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rps_tte`
--
ALTER TABLE `rps_tte`
  MODIFY `id_rpstte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `waiting_list`
--
ALTER TABLE `waiting_list`
  MODIFY `id_pendaftar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
