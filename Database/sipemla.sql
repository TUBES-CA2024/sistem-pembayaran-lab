-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2025 at 08:49 AM
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
(17, 'A10'),
(20, 'A123');

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
('1302021', 'alif', 'Teknik Informatika', 1, 'Islam', 'alif@gmail.com', '132', 'Laki-Laki', 'afe', 'assets/img/profil/679de3e1e5596.jpg', 1),
('1302022', 'daf', 'Teknik Informatika', 1, 'Islam', 'dawd@gmail.com', 'efsf', 'Laki-Laki', 'daw', 'assets/img/profil/679d1ae4bbbd1.jpg', 1);

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
('011', 'Pemrograman Mobile', 3),
('012', 'Sistem Operasi', 3),
('013', 'Akuntansi', 3),
('014', 'Design Grafis', 3),
('123', 'eqe2', 2);

-- --------------------------------------------------------

--
-- Table structure for table `matkul_select`
--

CREATE TABLE `matkul_select` (
  `id` int(11) NOT NULL,
  `stambuk` varchar(15) NOT NULL,
  `kodematakuliah` varchar(25) NOT NULL,
  `idtagihan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `idpembayaran` int(11) NOT NULL,
  `idtagihan` int(11) DEFAULT NULL,
  `tanggal_pembayaran` date DEFAULT NULL,
  `jumlah_pembayaran` bigint(20) DEFAULT NULL,
  `status` enum('Lunas','Belum Lunas') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tagihan`
--

CREATE TABLE `tagihan` (
  `idtagihan` int(11) NOT NULL,
  `stambuk` varchar(15) DEFAULT NULL,
  `jumlah_tagihan` bigint(20) DEFAULT NULL,
  `angkatan` year(4) DEFAULT NULL,
  `tahun_akademik` varchar(9) DEFAULT NULL,
  `semester` enum('Genap','Ganjil') DEFAULT NULL,
  `matakuliah` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tagihan`
--

INSERT INTO `tagihan` (`idtagihan`, `stambuk`, `jumlah_tagihan`, `angkatan`, `tahun_akademik`, `semester`, `matakuliah`) VALUES
(35, '1302022', 50000, '2022', '2024/2025', 'Genap', 'Basis Data 1'),
(36, '1302022', 110000, '2022', '2024/2025', 'Genap', 'Algoritma, Jaringan'),
(37, '1302022', 50000, '2022', '2024/2025', 'Genap', 'Basis Data 1'),
(38, '1302021', 50000, '2022', '2024/2025', 'Genap', 'Struktur Data'),
(47, '1302022', 50000, '2022', '2024/2025', 'Genap', 'Basis Data 1'),
(48, '1302022', 110000, '2022', '2024/2025', 'Genap', 'Algoritma, Jaringan'),
(49, '1302022', 50000, '2022', '2024/2025', 'Genap', 'Basis Data 1'),
(50, '1302021', 50000, '2022', '2024/2025', 'Genap', 'Struktur Data');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` enum('Admin','Kepala Lab','Mahasiswa') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `username`, `password`, `role`) VALUES
(1, 'Admin', 'Admin', 'Admin'),
(2, 'KepalaLab1', 'kepalalab1', 'Kepala Lab'),
(62, '1302022', '123', 'Mahasiswa'),
(63, '130', '123', 'Mahasiswa'),
(64, 'admin@gmail.com', '123', 'Admin');

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
  ADD KEY `idtagihan` (`idtagihan`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`idpembayaran`),
  ADD KEY `idtagihan` (`idtagihan`);

--
-- Indexes for table `tagihan`
--
ALTER TABLE `tagihan`
  ADD PRIMARY KEY (`idtagihan`),
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
  MODIFY `idkelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `matkul_select`
--
ALTER TABLE `matkul_select`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=354;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `idpembayaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tagihan`
--
ALTER TABLE `tagihan`
  MODIFY `idtagihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

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
  ADD CONSTRAINT `idtagihan` FOREIGN KEY (`idtagihan`) REFERENCES `tagihan` (`idtagihan`),
  ADD CONSTRAINT `matkul_select_ibfk_1` FOREIGN KEY (`kodematakuliah`) REFERENCES `matakuliah` (`kodematakuliah`),
  ADD CONSTRAINT `matkul_select_ibfk_2` FOREIGN KEY (`stambuk`) REFERENCES `mahasiswa` (`stambuk`);

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`idtagihan`) REFERENCES `tagihan` (`idtagihan`);

--
-- Constraints for table `tagihan`
--
ALTER TABLE `tagihan`
  ADD CONSTRAINT `stambuk` FOREIGN KEY (`stambuk`) REFERENCES `mahasiswa` (`stambuk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
