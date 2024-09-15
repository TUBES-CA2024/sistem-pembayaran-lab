-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2024 at 03:19 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipemla`
--

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `idkelas` int(11) NOT NULL,
  `namekelas` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`idkelas`, `namekelas`) VALUES
(1, 'A1'),
(2, 'A2'),
(3, 'A3'),
(4, 'A4'),
(5, 'A5'),
(6, 'A6'),
(7, 'A7'),
(8, 'A8'),
(9, 'B1'),
(10, 'B2'),
(11, 'B3'),
(12, 'B4'),
(13, 'C1'),
(14, 'C2'),
(15, 'C3'),
(16, 'C4');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `stambuk` varchar(15) NOT NULL,
  `nama` varchar(80) NOT NULL,
  `prodi` enum('Teknik Informatika','Sistem Informasi') NOT NULL,
  `idkelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`stambuk`, `nama`, `prodi`, `idkelas`) VALUES
('13020200318', 'syahrin', 'Teknik Informatika', 6),
('13020210134', 'Nasrullah', 'Teknik Informatika', 1),
('13020210202', 'Naufal', 'Teknik Informatika', 3),
('13120210004', 'arya', 'Sistem Informasi', 1),
('13120210005', 'furqon', 'Sistem Informasi', 1);

-- --------------------------------------------------------

--
-- Table structure for table `matakuliah`
--

CREATE TABLE `matakuliah` (
  `kodematakuliah` varchar(25) NOT NULL,
  `namamatakuliah` varchar(40) NOT NULL,
  `sks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `matakuliah`
--

INSERT INTO `matakuliah` (`kodematakuliah`, `namamatakuliah`, `sks`) VALUES
('001', 'Algoritma Dan Pemrograman 1', 1),
('002', 'Algoritma Dan Pemrograman 2', 1),
('003', 'Struktur Data', 1),
('004', 'Pengantar Teknologi Informasi', 1),
('005', 'Basis Data 1', 1),
('006', 'Elektronika Dasar', 1),
('007', 'Basis Data 2', 1),
('008', 'Pemrograman Berorientasi Objek', 1),
('009', 'Pemrograman Web', 1),
('010', 'Jaringan Komputer', 1),
('011', 'Pemrograman Mobile', 1),
('012', 'Sistem Operasi', 1),
('013', 'Akuntansi', 1),
('014', 'Design Grafis', 1);

-- --------------------------------------------------------

--
-- Table structure for table `matkul_select`
--

CREATE TABLE `matkul_select` (
  `id` int(11) NOT NULL,
  `stambuk` varchar(15) NOT NULL,
  `kodematakuliah` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `matkul_select`
--

INSERT INTO `matkul_select` (`id`, `stambuk`, `kodematakuliah`) VALUES
(2, '13020200318', '004'),
(3, '13020200318', '001'),
(4, '13020200318', '002'),
(5, '13020200318', '009'),
(60, '13120210004', '010'),
(61, '13120210004', '013'),
(62, '13120210004', '014'),
(65, '13120210005', '009'),
(66, '13120210005', '010'),
(67, '13020210202', '008'),
(68, '13020210202', '009'),
(69, '13020210202', '010');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `idpembayaran` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `stambuk` varchar(15) NOT NULL,
  `waktupembayaran` date NOT NULL,
  `nominal` bigint(20) NOT NULL,
  `status` enum('Lunas','Belum Lunas','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`idpembayaran`, `iduser`, `stambuk`, `waktupembayaran`, `nominal`, `status`) VALUES
(4, 1, '13120210004', '0000-00-00', 165000, 'Belum Lunas'),
(5, 1, '13020200318', '2024-02-13', 220000, 'Lunas'),
(6, 1, '13020200318', '0000-00-00', 110000, 'Belum Lunas');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` enum('Admin','Kepala Lab') CHARACTER SET utf8mb4 COLLATE utf8mb4_estonian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `username`, `password`, `role`) VALUES
(1, 'Admin1', 'Admin123', 'Admin'),
(2, 'KepalaLab1', 'kepalalab1', 'Kepala Lab'),
(3, 'KepalaLab2', 'kepalalab2', 'Kepala Lab'),
(11, 'KepalaLab3', 'kepalalab3', 'Kepala Lab');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`idkelas`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`stambuk`),
  ADD KEY `idkelas` (`idkelas`);

--
-- Indexes for table `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`kodematakuliah`);

--
-- Indexes for table `matkul_select`
--
ALTER TABLE `matkul_select`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kodematakuliah` (`kodematakuliah`),
  ADD KEY `stambuk` (`stambuk`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`idpembayaran`),
  ADD KEY `iduser` (`iduser`),
  ADD KEY `stambuk` (`stambuk`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `idkelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `matkul_select`
--
ALTER TABLE `matkul_select`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `idpembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`idkelas`) REFERENCES `kelas` (`idkelas`);

--
-- Constraints for table `matkul_select`
--
ALTER TABLE `matkul_select`
  ADD CONSTRAINT `matkul_select_ibfk_1` FOREIGN KEY (`kodematakuliah`) REFERENCES `matakuliah` (`kodematakuliah`),
  ADD CONSTRAINT `matkul_select_ibfk_2` FOREIGN KEY (`stambuk`) REFERENCES `mahasiswa` (`stambuk`);

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`),
  ADD CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`stambuk`) REFERENCES `mahasiswa` (`stambuk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
