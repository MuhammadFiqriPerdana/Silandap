-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Jul 2023 pada 09.57
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

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
-- Struktur dari tabel `tbl_barang`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_barang`
--

INSERT INTO `tbl_barang` (`id_barang`, `kode_barang`, `nama_barang`, `kategori`, `kondisi`, `stok`, `foto`, `kepemilikan`) VALUES
(1, 'A001', 'Tang Crimping 05', 'Alat', 'Baik', 24, '12.png', 'TKJ'),
(5, 'B001', 'RJ45', 'Bahan', '', 37, 's', 'TKJ'),
(6, 'B002', 'RJ11', 'Bahan', '', 44, 'sad', 'TKJ'),
(7, 'B003', 'Kabel Lan', 'Bahan', '', 31, 'sa', 'TKJ'),
(8, 'A12', 'IPCAM EZVIZ ', 'Alat', 'Baik', 50, '', 'TKJ'),
(9, 'A031', 'Switch', 'Alat', 'Baik', 35, '', 'TKJ'),
(10, '1', 'sda', 'Alat', 'Baik', 20, '', ''),
(11, '31231', 'Switch Cisco RV160W', 'Alat', 'Rusak', 0, '', 'TKJ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_peminjaman`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_peminjaman`
--

INSERT INTO `tbl_peminjaman` (`id_peminjaman`, `id_user`, `id_barang`, `jumlah`, `tgl_pinjam`, `waktu_pinjam`, `status_verifikasi`, `kepemilikan`, `kondisi`) VALUES
(82, '1', '1', '1', '2023-07-26', '1', 'Sedang Diipinjam', '', ''),
(84, '195', '1', '1', '2023-07-26', '1', 'Sedang  Dipinjam', '', ''),
(85, '19', '1', '1', '2023-07-26', '2', 'Sedang  Dipinjam', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengembalian`
--

CREATE TABLE `tbl_pengembalian` (
  `id_pengembalian` int(11) NOT NULL,
  `id_pin` int(11) NOT NULL,
  `tgl_kembali` date NOT NULL,
  `waktu_kembali` varchar(12) NOT NULL,
  `kondisi` varchar(21) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_pengembalian`
--

INSERT INTO `tbl_pengembalian` (`id_pengembalian`, `id_pin`, `tgl_kembali`, `waktu_kembali`, `kondisi`) VALUES
(12, 72, '2022-07-09', '2', 'Baik'),
(13, 70, '2022-07-09', '1', 'Baik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `id_siswa` int(11) NOT NULL,
  `nisn` varchar(255) NOT NULL,
  `nama_siswa` varchar(255) NOT NULL,
  `kelas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`id_siswa`, `nisn`, `nama_siswa`, `kelas`) VALUES
(3, '0085526631', 'Aditya Hanse Jefferson', 'X TJKT A'),
(4, '0087209113', 'Ahmad Alamsyah', 'X TJKT A'),
(5, '0086200330', 'Ahmad Farros Distiar', 'X TJKT A'),
(6, '0077795250', 'Ahmad Lifaldi', 'X TJKT A'),
(7, '0079714935', 'Ahmad Reza Fahlevy', 'X TJKT A'),
(8, '0074505258', 'Alvando Wendi Saga Putra', 'X TJKT A'),
(9, '0084175970', 'Daffa Alfianoor', 'X TJKT A'),
(10, '0081697771', 'Daffares Putra Ridanta', 'X TJKT A'),
(11, '0085819568', 'Dika Jira Pratama', 'X TJKT A'),
(12, '0088567529', 'Dwi Kresna Nataprawira', 'X TJKT A'),
(13, '0085004503', 'Farhan Dwi Wijaksono', 'X TJKT A'),
(15, '0081496475', 'Hamdan Yuwanda', 'X TJKT A'),
(16, '0087935612', 'Hertian Zaidan Zidna fann', 'X TJKT A'),
(17, '0072595946', 'Irham Maulana Aditio', 'X TJKT A'),
(18, '0084048158', 'Lintanivia Naichel P', 'X TJKT A'),
(19, '0088855852', 'Maiza Kayla Salsabilla', 'X TJKT A'),
(20, '0073127717', 'Muhammad Abid Raihan', 'X TJKT A'),
(21, '0088488614', 'Muhammad Aulia Rahman', 'X TJKT A'),
(22, '0083789214', 'Muhammad Bima Syuja', 'X TJKT A'),
(23, '0147934579', 'Muhammad Denis Raditya', 'X TJKT A'),
(24, '0078733582', 'Muhammad Eksa Luthfi Hafizi', 'X TJKT A'),
(25, '0075683356', 'Muhammad Ezzar Wibisono', 'X TJKT A'),
(26, '0088344640', 'Muhammad Farrel Aditya Pratama', 'X TJKT A'),
(27, '0072604033', 'Muhammad Isa Ansyari', 'X TJKT A'),
(28, '0077829409', 'Muhammad Rafa', 'X TJKT A'),
(29, '0086574331', 'Muhammad Rizki Maulana Hidayat', 'X TJKT A'),
(30, '0073934815', 'Muhammad Rizky Saputra', 'X TJKT A'),
(31, '0075569202', 'Olyvia Ein Jilia Simbolon', 'X TJKT A'),
(32, '0085190723', 'Rafael Bona Napitupulu', 'X TJKT A'),
(33, '0077717785', 'Rizky Aerio Pasha', 'X TJKT A'),
(34, '0063199933', 'Syamsu Rizal', 'X TJKT A'),
(35, '0086651701', 'Syifa Cahaya Qalbu', 'X TJKT A'),
(36, '0078744590', 'Yulia Hafizah', 'X TJKT A'),
(37, '0076033449', 'Ahmad Sultan', 'X TJKT B'),
(38, '0078769043', 'Aida Salsalbella', 'X TJKT B'),
(39, '0064078309', 'Aldo Natanael Sihaloho', 'X TJKT B'),
(40, '0083743734', 'Alla Aina Malihayati', 'X TJKT B'),
(41, '0087638018', 'Anggis Ahmaddin', 'X TJKT B'),
(42, '0086863657', 'Azahra Loviana Pradista', 'X TJKT B'),
(43, '0081991471', 'Chelsea Aurel Tuwonaung', 'X TJKT B'),
(44, '0083924507', 'Chyntia Indahsari', 'X TJKT B'),
(45, '3073043899', 'Diva Nadya', 'X TJKT B'),
(46, '0082669597', 'Fabian Alfath Yardan', 'X TJKT B'),
(47, '0086299672', 'Iqbal Ahmad Ghazali', 'X TJKT B'),
(48, '0086863914', 'Larasati Kumala Dewi', 'X TJKT B'),
(49, '0076717568', 'Lucky Denta Pratama', 'X TJKT B'),
(50, '0088227430', 'Muhamad Arhan Bagus Pratama', 'X TJKT B'),
(51, '0086852245', 'Muhamad Rizani', 'X TJKT B'),
(52, '0087720372', 'Muhammad Ais Erianto', 'X TJKT B'),
(53, '0071287296', 'Muhammad Alif Setyawan', 'X TJKT B'),
(54, '0085146338', 'Muhammad Azka Alvindra', 'X TJKT B'),
(55, '0074001400', 'Muhammad Farhad Benazir', 'X TJKT B'),
(56, '0088780578', 'Muhammad Risfa Walhisa', 'X TJKT B'),
(57, '0083181605', 'Muhammad Rizal Ramdani', 'X TJKT B'),
(58, '0083127032', 'Muhammad Rofi Fadli', 'X TJKT B'),
(59, '0073739661', 'Mukti Junia', 'X TJKT B'),
(60, '0073985540', 'Musahidah', 'X TJKT B'),
(61, '0073147817', 'Mutiara Anggun Oktaviani', 'X TJKT B'),
(62, '0072198852', 'Novia Sisilia Mangasti', 'X TJKT B'),
(63, '0083171926', 'Nur Izzah Maulani', 'X TJKT B'),
(64, '0079702197', 'Nusaibah Noor As Sunnah', 'X TJKT B'),
(65, '0071611334', 'Rachma Wafiq Azizah', 'X TJKT B'),
(66, '0079685651', 'Rahma Septiani Waibasar', 'X TJKT B'),
(68, '0082693279', 'Rizkya Nadya Putri', 'X TJKT B'),
(69, '0075107271', 'Siti Rokhamah', 'X TJKT B'),
(70, '3081115873', 'Sri Yuniarty Puspasari', 'X TJKT B'),
(71, '0073937354', 'Syahrul Afli Rahman', 'X TJKT B'),
(72, '0076087104', 'Tiara Faaza Nandita', 'X TJKT B'),
(73, '0075934704', 'Vicko Chandra Kristo Pristanto', 'X TJKT B'),
(74, '0076670949', 'Agda Dude Rafael', 'XI TJKT A'),
(75, '0078054755', 'Agrecia Kartika Puteri', 'XI TJKT A'),
(76, '0074131771', 'Alya Wahidah', 'XI TJKT A'),
(77, '0072453242', 'Dawwas Ahmad Raharjo', 'XI TJKT A'),
(78, '3087877310', 'Gusti Putri Shireen', 'XI TJKT A'),
(79, '0067248754', 'Hernando Tri Saputera', 'XI TJKT A'),
(80, '0073241862', 'Jagat Banjarnegara', 'XI TJKT A'),
(81, '0065861717', 'M. Gehan Junior', 'XI TJKT A'),
(82, '0074938845', 'M. Raffi Padillah', 'XI TJKT A'),
(83, '0068849978', 'Mahdiah', 'XI TJKT A'),
(85, '0079712990', 'Maniagung Setyo Putro', 'XI TJKT A'),
(86, '0079049185', 'Marzelo Javier', 'XI TJKT A'),
(87, '0076108402', 'Muhammad Fachri', 'XI TJKT A'),
(88, '0063777076', 'Muhammad Farazdaq', 'XI TJKT A'),
(89, '0073171938', 'Muhammad Kevin Harada', 'XI TJKT A'),
(90, '0064473241', 'Muhammad Nizar Farros', 'XI TJKT A'),
(91, '0071361525', 'Muhammad Raffa Azisha', 'XI TJKT A'),
(92, '0072240492', 'Muhammad Rafi Wirawan', 'XI TJKT A'),
(93, '0071116694', 'Muhammad Rizky Islami', 'XI TJKT A'),
(94, '0072367838', 'Muhammad Rohan Rifqi', 'XI TJKT A'),
(95, '0073044242', 'Muhammad Sandy Afif', 'XI TJKT A'),
(96, '0075973620', 'Nadzril Dwi Mahesha', 'XI TJKT A'),
(97, '0074496828', 'Nauraya Yuwanita Rachma', 'XI TJKT A'),
(98, '0078605568', 'Niko Aji Saputra', 'XI TJKT A'),
(99, '0077607901', 'Nopi Ayu Astuti', 'XI TJKT A'),
(100, '0076451629', 'Ragazzo Atilla Vivaldi Hermawan', 'XI TJKT A'),
(101, '0074660554', 'Rahayu Nur Utami', 'XI TJKT A'),
(102, '0062790233', 'Ratu Adellya Intan Aulia', 'XI TJKT A'),
(103, '0061596243', 'Reza Ahmat Rizky', 'XI TJKT A'),
(104, '0073090538', 'Rifky Ardiansyah', 'XI TJKT A'),
(105, '0076441867', 'Sandi Akhmad', 'XI TJKT A'),
(106, '0079408707', 'Syeril Galas Abdi Ariij Nur Ilaahi', 'XI TJKT A'),
(107, '0078062898', 'Yuyun Fatmawati', 'XI TJKT A'),
(108, '0078345995', 'Abdillah Fajrianor', 'XI TJKT B'),
(109, '0077288116', 'Adam Galyh Al Affan', 'XI TJKT B'),
(110, '0061698190', 'Ahmad Dhany Pratama', 'XI TJKT B'),
(111, '0075397727', 'Akhmad Rasya Alfina Rahman', 'XI TJKT B'),
(112, '0074771943', 'Alim Chairul Rasyid', 'XI TJKT B'),
(113, '0062873574', 'Ares Gibran Ray', 'XI TJKT B'),
(114, '0063197669', 'Arrahman Hudallinnas', 'XI TJKT B'),
(115, '0075352114', 'Cindi Cintia Cahyani', 'XI TJKT B'),
(116, '0074275024', 'Davin Zevatama Sulistya', 'XI TJKT B'),
(117, '0064189583', 'Desy Nadya Puspitasari', 'XI TJKT B'),
(118, '0066492879', 'Dicki Kristuaji', 'XI TJKT B'),
(119, '0077216240', 'Erdoni Alpharo Cesario Saragih .S', 'XI TJKT B'),
(120, '0066541285', 'Hijrian Halifi', 'XI TJKT B'),
(121, '0074017432', 'Jabat Handono Joyotirto', 'XI TJKT B'),
(122, '0057125766', 'Lukman', 'XI TJKT B'),
(123, '0064299558', 'M. Farhan Ramadhani', 'XI TJKT B'),
(124, '0068705774', 'Merida', 'XI TJKT B'),
(125, '0069799979', 'Michael Lovian Ajinanda', 'XI TJKT B'),
(126, '0072113349', 'Muhammad Aka Hade Putra', 'XI TJKT B'),
(127, '0082211454', 'Muhammad Faisal Ansyari', 'XI TJKT B'),
(128, '0061689716', 'Muhammad Galih Agus Riyanto', 'XI TJKT B'),
(129, '0071478364', 'Muhammad Naufal Dzakwan Muhtaram', 'XI TJKT B'),
(130, '0074467301', 'Muhammad Rafa Rahmadhan', 'XI TJKT B'),
(131, '0075235932', 'Muhammad Rasyid Afandy', 'XI TJKT B'),
(132, '0078194737', 'Muhammad Riezki Nur Alif', 'XI TJKT B'),
(133, '0073002448', 'Muhammad Rizky Auryn', 'XI TJKT B'),
(134, '0069221757', 'Nabil Heza Hanafi', 'XI TJKT B'),
(135, '0064406279', 'Nofia Fertikasari', 'XI TJKT B'),
(136, '0075614416', 'Nur Nazimah', 'XI TJKT B'),
(137, '0066363473', 'Ramadhan Putra Perdana', 'XI TJKT B'),
(138, '0074638846', 'Rico Arya Pratama', 'XI TJKT B'),
(139, '0071947102', 'Shofiah', 'XI TJKT B'),
(140, '3071425517', 'Zulfa Azizah', 'XI TJKT B'),
(141, '0078695497', 'Abrar Bima Pratama', 'XI TJKT C'),
(142, '0079166407', 'Adela Pranita Puteri', 'XI TJKT C'),
(143, '0075782872', 'Adhipramana Aryaputra', 'XI TJKT C'),
(144, '0074747128', 'Ahmad Khairi', 'XI TJKT C'),
(145, '0084097766', 'Alfayet Romdoni', 'XI TJKT C'),
(146, '0061072162', 'Ariz Ahmad', 'XI TJKT C'),
(147, '0062130495', 'Chelsea Leonidas Zulaikah', 'XI TJKT C'),
(148, '0062069167', 'Daffa Rahmandha Setyawan', 'XI TJKT C'),
(149, '0078275278', 'Desti Fatimatuzzahra', 'XI TJKT C'),
(150, '0066403693', 'Dyan Ayu Novitasari', 'XI TJKT C'),
(151, '0077048951', 'Fasya Handry Perdana', 'XI TJKT C'),
(152, '0051245855', 'Hafiz Dwi Kuncoro', 'XI TJKT C'),
(153, '0075369565', 'Imaduddin Riyadh', 'XI TJKT C'),
(154, '0064397073', 'Juanda', 'XI TJKT C'),
(155, '0074953864', 'Luthfi Haditya Pranata', 'XI TJKT C'),
(156, '0057956272', 'M. Shidiq Antapati', 'XI TJKT C'),
(157, '0067858809', 'Mirna', 'XI TJKT C'),
(158, '0071567797', 'Mochammad Affan Al Fatih', 'XI TJKT C'),
(159, '0079999879', 'Muhammad Aldian Nurrasyd', 'XI TJKT C'),
(160, '0076708836', 'Muhammad Felix Fauzi', 'XI TJKT C'),
(161, '0078875810', 'Muhammad Haikal Al Musyafar', 'XI TJKT C'),
(162, '0078215121', 'Muhammad Nizar Ferrado', 'XI TJKT C'),
(163, '0064323977', 'Muhammad Rasya Agustiyan', 'XI TJKT C'),
(164, '0067884379', 'Muhammad Reza', 'XI TJKT C'),
(165, '0071376299', 'Muhammad Rizki Ananda', 'XI TJKT C'),
(166, '0075734509', 'Naila Husna', 'XI TJKT C'),
(167, '0064776689', 'Nur Ajrini Rizki Fadhilah', 'XI TJKT C'),
(168, '0075347890', 'Nurul Dwi Pangesti', 'XI TJKT C'),
(169, '0063929240', 'Putut Aji Widiarto', 'XI TJKT C'),
(170, '0067040536', 'Riandhika Tri Anggono', 'XI TJKT C'),
(171, '0078061983', 'Sidiq Aryo Seno', 'XI TJKT C'),
(172, '0072003648', 'Zahra Eka Stefany', 'XI TJKT C'),
(173, '0063254474', 'Ade Yoga Aditama Putra', 'XII TJKT A'),
(174, '0057675815', 'Ahmad Hafiz Zulkarnain', 'XII TJKT A'),
(175, '0054363633', 'Akhmad Rizwar Afdhal', 'XII TJKT A'),
(176, '0051446775', 'Asyifa Qhonita Auliya Seha', 'XII TJKT A'),
(177, '0054360722', 'David Alonso Napitupulu', 'XII TJKT A'),
(178, '0067029464', 'Dena Erinda Anta Negara', 'XII TJKT A'),
(179, '0058946809', 'Dhea Arimbi Almalita', 'XII TJKT A'),
(180, '0062755840', 'Dylan Ammar Ori Axniva', 'XII TJKT A'),
(181, '0068266787', 'Failasufa Irawan', 'XII TJKT A'),
(182, '0063490464', 'Hector Janu Pangestu', 'XII TJKT A'),
(183, '0058042061', 'Irky Ardyansyah', 'XII TJKT A'),
(184, '0063216640', 'Lintang Aji Saka', 'XII TJKT A'),
(185, '0056089781', 'Lusiana Gina Anita', 'XII TJKT A'),
(186, '0051532937', 'Melisa Agustina', 'XII TJKT A'),
(187, '0052401149', 'Muhammad Abi Arizky', 'XII TJKT A'),
(188, '0064772275', 'Muhammad Bintang', 'XII TJKT A'),
(189, '0052992618', 'Muhammad Luthfi Noor', 'XII TJKT A'),
(190, '0067533752', 'Muhammad Maulana Azhar', 'XII TJKT A'),
(191, '0062067217', 'Muhammad Nauval Nuruzzaini', 'XII TJKT A'),
(192, '0052392765', 'Muhammad Romadhoni Panca Octa', 'XII TJKT A'),
(193, '0051826159', 'Muhammad Tamirul Umam', 'XII TJKT A'),
(194, '0069260268', 'Muhammad Yusuf Habibie', 'XII TJKT A'),
(195, '0064242615', 'Musyaffa Kemal Pasha', 'XII TJKT A'),
(196, '0063087187', 'Mutia Nanda', 'XII TJKT A'),
(197, '0068715851', 'Nadia Aulia', 'XII TJKT A'),
(198, '0062189479', 'Novrieza Rizki Fadillah', 'XII TJKT A'),
(199, '0065463732', 'Oksi Fitria Hawini', 'XII TJKT A'),
(200, '0063717874', 'Putri Yuwanda', 'XII TJKT A'),
(201, '0068609232', 'Ulfa Syifa Saputri', 'XII TJKT A'),
(202, '0066081094', 'Veronika Putri Rosari', 'XII TJKT A'),
(203, '0077707512', 'Zahra Andina', 'XII TJKT A'),
(204, '0066031955', 'Zeta Atmajaya Akhdan', 'XII TJKT A'),
(205, '0063995534', 'Ahmad Afrizal Rahman', 'XII TJKT B'),
(206, '0050891574', 'Ahmad Nawawi', 'XII TJKT B'),
(207, '0051300820', 'Ahmad Zidan', 'XII TJKT B'),
(208, '0069923233', 'Ahmad Zulqarnain Nk', 'XII TJKT B'),
(209, '0063875396', 'Ajahra Saupa', 'XII TJKT B'),
(210, '0063184253', 'Daffa Dziibaan Khoiri', 'XII TJKT B'),
(211, '0066445240', 'David Adzana Yoga Pratama', 'XII TJKT B'),
(212, '0052266201', 'Enggal Setiawan', 'XII TJKT  B'),
(213, '0063111260', 'Fatiekhu Muhamad Andika', 'XII TJKT B'),
(214, '0048203662', 'Fikri Rahman', 'XII TJKT B'),
(215, '0063016438', 'Gadis Tita Nadina', 'XII TJKT B'),
(216, '0066536340', 'Gusti Muhammad Maulana Zakirin', 'XII TJKT B'),
(217, '0055248036', 'Hairun Nisya Latifah', 'XII TJKT B'),
(218, '0067458148', 'Ibnu Aji Perdana', 'XII TJKT B'),
(219, '0063774213', 'Irally Merindra', 'XII TJKT B'),
(220, '0067011241', 'M. Saddam Henry Sukardi', 'XII TJKT B'),
(221, '0061237810', 'Muhammad Adhiyat Rahmanadie', 'XII TJKT B'),
(222, '0042084013', 'Muhammad Bima Prasetyo Ariansyah', 'XII TJKT B'),
(223, '0061358173', 'Muhammad Faisal', 'XII TJKT B'),
(224, '0064449128', 'Muhammad Kusuma', 'XII TJKT B'),
(225, '0068018752', 'Muhammad Lutfi', 'XII TJKT B'),
(226, '0064484214', 'Muhammad Yoga Pratama', 'XII TJKT B'),
(227, '0065830230', 'Nanda Dalexandro', 'XII TJKT B'),
(228, '0059373073', 'Nazmania', 'XII TJKT B'),
(229, '0037297290', 'Nova Andika', 'XII TJKT B'),
(230, '0046584497', 'Novaryanur Ramadhani', 'XII TJKT B'),
(231, '0053541494', 'Octovia Ayu Pusparani', 'XII TJKT B'),
(232, '0051046563', 'Rahmatullah', 'XII TJKT B'),
(233, '0065590106', 'Rina Nuraini', 'XII TJKT B'),
(234, '0061818136', 'Rosi Sukma Pratiwi', 'XII TJKT B'),
(235, '0064510857', 'Rosinanda Kyato', 'XII TJKT B'),
(236, '0059488150', 'Siti Maisarah', 'XII TJKT B'),
(238, '0067091338', 'Siti Nasywa Pratiwi', 'XII TJKT B'),
(239, '0061617407', 'Surya Saputra', 'XII TJKT B'),
(240, '0063077166', 'Syeriel Azzahra Rizky', 'XII TJKT B');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nm_user` varchar(200) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` int(11) NOT NULL,
  `jurusan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nm_user`, `username`, `password`, `level`, `jurusan`) VALUES
(1, 'Muhammad Fiqri Perdana', 'dana', '21cb4e4be93c09542ffa73b2b5cb95ea', 1, 'TKJ'),
(5, 'Omar Muhammad Altoumi Alsyaibani, S.Pd', 'omar', 'd4466cce49457cfea18222f5a7cd3573', 4, 'TKJ'),
(6, 'Aji Triwerdaya, S.Kom', 'aji', '8d045450ae16dc81213a75b725ee2760', 2, 'TKJ'),
(7, 'Rastra Feryd Permana, S.Pd', 'rastra', '076bda8c1060654a3d511357c617effa', 2, 'TKJ'),
(8, 'Enny Chairany', 'enny', 'd9d38a38c9710d07a48bd599d96294e6', 3, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_berita_acara_peminjaman`
--

CREATE TABLE `tb_berita_acara_peminjaman` (
  `id_berita_acara_peminjaman` int(11) NOT NULL,
  `id_peminjaman` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_berita_acara_peminjaman`
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
(63, '78'),
(64, '82');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_berita_acara_pengembalian`
--

CREATE TABLE `tb_berita_acara_pengembalian` (
  `id_berita_acara_pengembalian` int(11) NOT NULL,
  `id_pengembalian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_berita_acara_pengembalian`
--

INSERT INTO `tb_berita_acara_pengembalian` (`id_berita_acara_pengembalian`, `id_pengembalian`) VALUES
(6, 12),
(7, 13);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `tbl_peminjaman`
--
ALTER TABLE `tbl_peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_pengguna` (`id_user`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tbl_pengembalian`
--
ALTER TABLE `tbl_pengembalian`
  ADD PRIMARY KEY (`id_pengembalian`);

--
-- Indeks untuk tabel `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `tb_berita_acara_peminjaman`
--
ALTER TABLE `tb_berita_acara_peminjaman`
  ADD PRIMARY KEY (`id_berita_acara_peminjaman`),
  ADD KEY `id_peminjaman` (`id_peminjaman`);

--
-- Indeks untuk tabel `tb_berita_acara_pengembalian`
--
ALTER TABLE `tb_berita_acara_pengembalian`
  ADD PRIMARY KEY (`id_berita_acara_pengembalian`),
  ADD KEY `id_pengembalian` (`id_pengembalian`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_barang`
--
ALTER TABLE `tbl_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tbl_peminjaman`
--
ALTER TABLE `tbl_peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT untuk tabel `tbl_pengembalian`
--
ALTER TABLE `tbl_pengembalian`
  MODIFY `id_pengembalian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=241;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_berita_acara_peminjaman`
--
ALTER TABLE `tb_berita_acara_peminjaman`
  MODIFY `id_berita_acara_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT untuk tabel `tb_berita_acara_pengembalian`
--
ALTER TABLE `tb_berita_acara_pengembalian`
  MODIFY `id_berita_acara_pengembalian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
