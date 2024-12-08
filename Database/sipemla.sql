-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2024 at 04:53 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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
(16, 'C4'),
(24, 'A10');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `stambuk` varchar(15) NOT NULL,
  `nama` varchar(80) NOT NULL,
  `prodi` enum('Teknik Informatika','Sistem Informasi') NOT NULL,
  `idkelas` int(11) NOT NULL,
  `namaagama` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telepon` varchar(15) DEFAULT NULL,
  `jeniskelamin` enum('Laki-Laki','Perempuan') DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `isCompleted` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`stambuk`, `nama`, `prodi`, `idkelas`, `namaagama`, `email`, `telepon`, `jeniskelamin`, `alamat`, `foto`, `isCompleted`) VALUES
('13020220221', 'Muhammad Akbar', 'Teknik Informatika', 3, 'Islam', 'alif@gmail.com', '082268156621', 'Laki-Laki', 'Sudiang', 'assets/img/profil/67505522c4f12.png', 1),
('13020220222', 'Indah Purnawan', 'Sistem Informasi', 10, 'Islam', 'indah@gmail.com', '082268165521', 'Perempuan', 'Kolaka', 'assets/img/profil/675058f046fd0.jpg', 1),
('13020220223', 'Muhammad Alif Maulana', 'Teknik Informatika', 6, 'Islam', 'alif@gmail.com', '082268156621', 'Laki-Laki', 'sudiang', 'assets/img/profil/67505490d8788.png', 1);

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
('001', 'Algoritma Dan Pemrograman 1', 3),
('002', 'Algoritma Dan Pemrograman 2', 3),
('003', 'Struktur Data', 3),
('004', 'Pengantar Teknologi Informasi', 3),
('005', 'Basis Data 1', 3),
('006', 'Elektronika Dasar', 3),
('007', 'Basis Data 2', 3),
('008', 'Pemrograman Berorientasi Objek', 3),
('009', 'Pemrograman Web', 3),
('010', 'Jaringan Komputer', 3),
('011', 'Pemrograman Mobile', 1),
('012', 'Sistem Operasi', 1),
('013', 'Akuntansi', 1),
('014', 'Design Grafis', 1),
('015', 'Sastra Mesin', 3);

-- --------------------------------------------------------

--
-- Table structure for table `matkul_select`
--

CREATE TABLE `matkul_select` (
  `id` int(11) NOT NULL,
  `stambuk` varchar(15) NOT NULL,
  `kodematakuliah` varchar(25) NOT NULL,
  `idpembayaran` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `matkul_select`
--

INSERT INTO `matkul_select` (`id`, `stambuk`, `kodematakuliah`, `idpembayaran`) VALUES
(473, '13020220222', '012', 183),
(474, '13020220223', '014', 184),
(475, '13020220223', '015', 184),
(476, '13020220221', '003', 185),
(477, '13020220221', '004', 185);

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
(183, 1, '13020220222', '2024-12-05', 55000, 'Belum Lunas'),
(184, 1, '13020220223', '2024-12-05', 110000, 'Lunas'),
(185, 1, '13020220221', '2024-12-31', 110000, 'Lunas');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` enum('Admin','Kepala Lab','Mahasiswa') DEFAULT NULL,
  `stambuk` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `username`, `password`, `role`, `stambuk`) VALUES
(1, 'Admin', 'Admin', 'Admin', 'Admin123'),
(2, 'KepalaLab1', 'kepalalab1', 'Kepala Lab', NULL),
(22, '13020220301', 'mhs#2024', 'Mahasiswa', '13020220301'),
(51, '13020220223', 'mhs#2024', 'Mahasiswa', '13020220223'),
(54, '13020220221', 'mhs#2024', 'Mahasiswa', '13020220221'),
(55, '13020220222', 'mhs#2024', 'Mahasiswa', '13020220222');

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
  ADD KEY `stambuk` (`stambuk`),
  ADD KEY `idpembayaran` (`idpembayaran`);

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
  MODIFY `idkelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `matkul_select`
--
ALTER TABLE `matkul_select`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=478;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `idpembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=186;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

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
  ADD CONSTRAINT `idpembayaran` FOREIGN KEY (`idpembayaran`) REFERENCES `pembayaran` (`idpembayaran`),
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
