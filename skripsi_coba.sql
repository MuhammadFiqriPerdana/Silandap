-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2022 at 03:10 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi_coba`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `id_barang` int(11) NOT NULL,
  `kode_barang` varchar(50) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `kategori` varchar(25) NOT NULL,
  `kondisi` varchar(25) NOT NULL,
  `stok` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `kepemilikan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_barang`
--

INSERT INTO `tbl_barang` (`id_barang`, `kode_barang`, `nama_barang`, `kategori`, `kondisi`, `stok`, `foto`, `kepemilikan`) VALUES
(1, 'A001', 'Tang Crimping 05', 'Alat', 'Baik', 29, '12.png', 'TKJ'),
(5, 'B001', 'RJ45', 'Bahan', '', 37, 's', 'TKJ'),
(6, 'B002', 'RJ11', 'Bahan', '', 44, 'sad', 'TKJ'),
(7, 'B003', 'Kabel Lan', 'Bahan', '', 31, 'sa', 'TKJ'),
(8, 'A12', 'IPCAM EZVIZ ', 'Alat', 'Baik', 50, '', 'TKJ'),
(9, 'A031', 'Switch', 'Alat', 'Baik', 35, '', 'TKJ'),
(10, '1', 'sda', 'Alat', 'Baik', 20, '', ''),
(11, '31231', 'Switch Cisco RV160W', 'Alat', 'Rusak', 0, '', 'TKJ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_peminjaman`
--

CREATE TABLE `tbl_peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `id_user` varchar(10) NOT NULL,
  `id_barang` varchar(10) NOT NULL,
  `jumlah` varchar(10) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `waktu_pinjam` varchar(100) NOT NULL,
  `status_verifikasi` varchar(100) NOT NULL,
  `kepemilikan` varchar(100) NOT NULL,
  `kondisi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_peminjaman`
--

INSERT INTO `tbl_peminjaman` (`id_peminjaman`, `id_user`, `id_barang`, `jumlah`, `tgl_pinjam`, `waktu_pinjam`, `status_verifikasi`, `kepemilikan`, `kondisi`) VALUES
(69, '7', '1', '6', '2022-07-09', '3', 'Sudah Terverifikasi', 'TKJ', 'Baik'),
(70, '6', '1', '1', '2022-07-09', '2', 'Sudah Terverifikasi', 'TKJ', 'Baik'),
(71, '6', '1', '1', '2022-07-09', '1', 'Sudah Terverifikasi', 'TKJ', 'Baik'),
(72, '6', '9', '1', '2022-07-09', '2', 'Sudah Terverifikasi', 'TKJ', 'Baik'),
(73, '6', '1', '4', '2022-07-02', '1', 'Sudah Terverifikasi', 'TKJ', 'Baik'),
(75, '7', '1', '12', '2022-07-09', '5', 'Sudah Terverifikasi', 'TKJ', 'Baik'),
(76, '7', '5', '3', '2022-07-09', '2', 'Sudah Terverifikasi', 'TKJ', 'Baik'),
(77, '7', '6', '5', '2022-07-08', '5', 'Sudah Terverifikasi', 'TKJ', 'Baik'),
(78, '7', '7', '8', '2022-06-26', '1', 'Sudah Terverifikasi', 'TKJ', 'Baik'),
(79, '7', '6', '1', '2022-07-09', '4', 'Belum Terverifikasi', 'TKJ', 'Baik'),
(80, '7', '7', '3', '2022-07-09', '4', 'Belum Terverifikasi', 'TKJ', 'Baik');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengembalian`
--

CREATE TABLE `tbl_pengembalian` (
  `id_pengembalian` int(11) NOT NULL,
  `id_pin` int(11) NOT NULL,
  `tgl_kembali` date NOT NULL,
  `waktu_kembali` varchar(12) NOT NULL,
  `kondisi` varchar(21) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pengembalian`
--

INSERT INTO `tbl_pengembalian` (`id_pengembalian`, `id_pin`, `tgl_kembali`, `waktu_kembali`, `kondisi`) VALUES
(12, 72, '2022-07-09', '2', 'Baik'),
(13, 70, '2022-07-09', '1', 'Baik');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nm_user` varchar(200) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` int(11) NOT NULL,
  `jurusan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nm_user`, `username`, `password`, `level`, `jurusan`) VALUES
(1, 'Muhammad Fiqri Perdana', 'dana', '21cb4e4be93c09542ffa73b2b5cb95ea', 1, 'TKJ'),
(5, 'Omar Muhammad Altoumi Alsyaibani, S.Pd', 'omar', 'd4466cce49457cfea18222f5a7cd3573', 4, 'TKJ'),
(6, 'Aji Triwerdaya, S.Kom', 'aji', '8d045450ae16dc81213a75b725ee2760', 2, 'TKJ'),
(7, 'Rastra Feryd Permana, S.Pd', 'rastra', '076bda8c1060654a3d511357c617effa', 2, 'TKJ'),
(8, 'Enny Chairany', 'enny', 'd9d38a38c9710d07a48bd599d96294e6', 3, '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_berita_acara_peminjaman`
--

CREATE TABLE `tb_berita_acara_peminjaman` (
  `id_berita_acara_peminjaman` int(11) NOT NULL,
  `id_peminjaman` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_berita_acara_peminjaman`
--

INSERT INTO `tb_berita_acara_peminjaman` (`id_berita_acara_peminjaman`, `id_peminjaman`) VALUES
(50, '70'),
(51, '70'),
(52, '70'),
(53, '70'),
(54, '70'),
(55, '70'),
(56, '70'),
(57, '70'),
(58, '72'),
(59, '73'),
(60, '75'),
(61, '76'),
(62, '77'),
(63, '78');

-- --------------------------------------------------------

--
-- Table structure for table `tb_berita_acara_pengembalian`
--

CREATE TABLE `tb_berita_acara_pengembalian` (
  `id_berita_acara_pengembalian` int(11) NOT NULL,
  `id_pengembalian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_berita_acara_pengembalian`
--

INSERT INTO `tb_berita_acara_pengembalian` (`id_berita_acara_pengembalian`, `id_pengembalian`) VALUES
(6, 12),
(7, 13);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tbl_peminjaman`
--
ALTER TABLE `tbl_peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_pengguna` (`id_user`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tbl_pengembalian`
--
ALTER TABLE `tbl_pengembalian`
  ADD PRIMARY KEY (`id_pengembalian`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tb_berita_acara_peminjaman`
--
ALTER TABLE `tb_berita_acara_peminjaman`
  ADD PRIMARY KEY (`id_berita_acara_peminjaman`),
  ADD KEY `id_peminjaman` (`id_peminjaman`);

--
-- Indexes for table `tb_berita_acara_pengembalian`
--
ALTER TABLE `tb_berita_acara_pengembalian`
  ADD PRIMARY KEY (`id_berita_acara_pengembalian`),
  ADD KEY `id_pengembalian` (`id_pengembalian`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_peminjaman`
--
ALTER TABLE `tbl_peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `tbl_pengembalian`
--
ALTER TABLE `tbl_pengembalian`
  MODIFY `id_pengembalian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_berita_acara_peminjaman`
--
ALTER TABLE `tb_berita_acara_peminjaman`
  MODIFY `id_berita_acara_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `tb_berita_acara_pengembalian`
--
ALTER TABLE `tb_berita_acara_pengembalian`
  MODIFY `id_berita_acara_pengembalian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
