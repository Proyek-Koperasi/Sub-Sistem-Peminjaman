-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2016 at 01:58 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_koperasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `id_anggota` int(11) NOT NULL,
  `noKtp_ang` varchar(35) NOT NULL,
  `nama_ang` varchar(50) NOT NULL,
  `tempat_lahir_ang` varchar(35) NOT NULL,
  `tgl_lahir_ang` date NOT NULL,
  `jk_ang` varchar(10) NOT NULL,
  `alamat_ang` varchar(75) NOT NULL,
  `IdProvinsi` int(11) NOT NULL,
  `IdKota` int(11) NOT NULL,
  `pekerjaan_ang` varchar(30) NOT NULL,
  `alamatkerja_ang` varchar(75) NOT NULL,
  `telp_ang` varchar(15) NOT NULL,
  `email_ang` varchar(35) NOT NULL,
  `user_ang` varchar(30) NOT NULL,
  `password_ang` varchar(20) NOT NULL,
  `level` varchar(10) DEFAULT NULL,
  `status_ang` varchar(20) NOT NULL,
  `pas_foto_ang` varchar(50) NOT NULL,
  `ktp_ang` varchar(50) NOT NULL,
  `tgl_daftar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
