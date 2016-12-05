-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2016 at 02:01 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_ekoperasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE IF NOT EXISTS `anggota` (
`id_anggota` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `jk` varchar(1) NOT NULL,
  `tempat_lahir` varchar(25) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `username_anggota` varchar(20) NOT NULL,
  `password_anggota` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nama`, `jk`, `tempat_lahir`, `tgl_lahir`, `alamat`, `no_telp`, `username_anggota`, `password_anggota`) VALUES
(1, 'Dika', 'P', 'Malang', '2016-10-05', 'alamat malang', '89098', 'dika', '0192023a7bbd73250516f069df18b500');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_angsuran`
--

CREATE TABLE IF NOT EXISTS `tbl_angsuran` (
  `id_angsuran` varchar(100) NOT NULL,
  `tgl_angsuran` date NOT NULL,
  `angsuranke` int(11) NOT NULL,
  `id_pinjaman` varchar(100) NOT NULL,
  `image` varchar(500) NOT NULL,
  `acc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_angsuran`
--

INSERT INTO `tbl_angsuran` (`id_angsuran`, `tgl_angsuran`, `angsuranke`, `id_pinjaman`, `image`, `acc`) VALUES
('ANGSUR-FK-20161101090710', '2016-11-01', 1, 'PINJAM-FK-20161030093716', 'Tulips5.jpg', 0),
('ANGSUR-FK-20161102090531', '2016-11-02', 1, 'PINJAM-FK-20161102090340', 'Chrysanthemum.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pinjaman`
--

CREATE TABLE IF NOT EXISTS `tbl_pinjaman` (
  `id_pinjaman` varchar(100) NOT NULL,
  `tgl_pinjaman` varchar(25) NOT NULL,
  `jml_pinjaman` int(11) NOT NULL,
  `kali_angsur` int(11) NOT NULL,
  `jml_angsur` int(11) NOT NULL,
  `bunga` int(11) NOT NULL,
  `total_angsur` int(11) NOT NULL,
  `cicilanke` int(11) NOT NULL,
  `Keterangan` text NOT NULL,
  `id_anggota` int(15) NOT NULL,
  `acc` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pinjaman`
--

INSERT INTO `tbl_pinjaman` (`id_pinjaman`, `tgl_pinjaman`, `jml_pinjaman`, `kali_angsur`, `jml_angsur`, `bunga`, `total_angsur`, `cicilanke`, `Keterangan`, `id_anggota`, `acc`, `status`) VALUES
('PINJAM-FK-20161030093716', '2016-10-30', 1000000, 12, 87500, 1050000, 0, 1, '<p><strong>laknlaksd laskdla</strong></p><p><strong>as\\dad</strong></p><p><strong>asdad</strong></p>', 0, 1, 0),
('PINJAM-FK-20161101091759', '2016-11-01', 500000, 5, 110000, 10, 550000, 0, '<p>asfaf</p>', 1, 1, 0),
('PINJAM-FK-20161102082507', '2016-11-02', 10000000, 12, 858333, 3, 10300000, 0, '<p>bondo kawin</p>', 1, 1, 0),
('PINJAM-FK-20161102090340', '2016-11-02', 2000000, 12, 170000, 2, 2040000, 1, '<p>usaha</p>', 1, 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
 ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `tbl_angsuran`
--
ALTER TABLE `tbl_angsuran`
 ADD PRIMARY KEY (`id_angsuran`), ADD KEY `id_pinjamnan` (`id_pinjaman`);

--
-- Indexes for table `tbl_pinjaman`
--
ALTER TABLE `tbl_pinjaman`
 ADD PRIMARY KEY (`id_pinjaman`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
