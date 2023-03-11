-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2023 at 05:09 AM
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
-- Database: `ujikom2023_bankmini`
--

DELIMITER $$
--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `total_saldo` (`kelas` VARCHAR(50)) RETURNS INT(11)  BEGIN    
    DECLARE jumlah int;    
    SELECT sum(saldo) into jumlah
    FROM nasabah where kd_kelas = kelas group by kd_kelas; 
    
    RETURN jumlah;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `kd_kelas` varchar(15) NOT NULL,
  `jurusan` varchar(30) NOT NULL,
  `jumlah_siswa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`kd_kelas`, `jurusan`, `jumlah_siswa`) VALUES
('Guru', 'Semua jurusan', 0),
('XIIAKL1', 'Akuntansi dan Keungan Lembaga', 35),
('XIIAKL2', 'Akuntansi dan Keungan Lembaga', 36),
('XIIAKL3', 'Akuntansi dan Keungan Lembaga', 34),
('XIIAKL4', 'Akuntansi dan Keungan Lembaga', 36),
('XIIRPL1', 'Rekayasa Perangkat Lunak', 34),
('XIIRPL2', 'Rekayasa Perangkat Lunak', 35),
('XIIRPL3', 'Rekayasa Perangkat Lunak', 36),
('XIIRPL4', 'Rekayasa Perangkat Lunak', 35);

-- --------------------------------------------------------

--
-- Table structure for table `nasabah`
--

CREATE TABLE `nasabah` (
  `no_rek` varchar(50) NOT NULL,
  `nisn_nik` varchar(16) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `kd_kelas` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `saldo` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nasabah`
--

INSERT INTO `nasabah` (`no_rek`, `nisn_nik`, `nama`, `kd_kelas`, `alamat`, `no_telp`, `saldo`, `username`, `password`) VALUES
('111111', '11111', 'Dwi Arin Fajriyani', 'Guru', 'Angkrek No. 90', '0888', 900000, '', ''),
('213412', '2273621', 'Ren', 'Guru', 'Sumedang', '8738281', 900000, '', ''),
('267890', '1234567890', 'Cynthia Dewi', 'XIIRPL1', 'sumedang utara', '082211', 750000, 'cynthia@gmail.com', '$2y$10$urdE6XuiN9/5o/rM6uK5jel7lV6dMqYA1RVe6/b90HT9ZBQiF4UZW');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `kd_petugas` varchar(50) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `kd_kelas` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` enum('1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`kd_petugas`, `nama`, `kd_kelas`, `alamat`, `no_telp`, `username`, `password`, `role_id`) VALUES
('P001', 'Petugas 1', 'XIIAKL2', 'Jatigede Sumedang', '082219098876', 'petugas@gmail.com', '$2y$10$urdE6XuiN9/5o/rM6uK5jel7lV6dMqYA1RVe6/b90HT9ZBQiF4UZW', '2'),
('P002', 'Administrator', 'XIIAKL2', 'Sumedang Selatan', '0822', 'admin@gmail.com', '$2y$10$urdE6XuiN9/5o/rM6uK5jel7lV6dMqYA1RVe6/b90HT9ZBQiF4UZW', '1');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `kd_transaksi` varchar(50) NOT NULL,
  `tanggal` datetime NOT NULL,
  `no_rek` varchar(50) NOT NULL,
  `jenis_transaksi` enum('ST','TR') NOT NULL,
  `kd_petugas` varchar(10) NOT NULL,
  `nominal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`kd_transaksi`, `tanggal`, `no_rek`, `jenis_transaksi`, `kd_petugas`, `nominal`) VALUES
('BM-230217-0001', '2023-02-17 09:54:29', '267890', 'ST', 'P001', 50000);

--
-- Triggers `transaksi`
--
DELIMITER $$
CREATE TRIGGER `kurangi_saldo` AFTER INSERT ON `transaksi` FOR EACH ROW update nasabah set saldo=saldo - new.nominal WHERE no_rek=new.no_rek and new.jenis_transaksi = "TR"
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tambah_saldo` AFTER INSERT ON `transaksi` FOR EACH ROW update nasabah set saldo=saldo + new.nominal WHERE no_rek=new.no_rek and new.jenis_transaksi = "ST"
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `no_rek_kd_petugas` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `no_rek_kd_petugas`, `email`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'P001', 'dwiarinf@gmail.com', '$2y$10$SlEVOYH1KO85t493I4Gi0uSwZtP9oHB5rBIE97psWrsw2Pa8ivp3W', 1, 1, '0000-00-00 00:00:00'),
(2, '267890', 'cynthia@gmail.com', '$2y$10$urdE6XuiN9/5o/rM6uK5jel7lV6dMqYA1RVe6/b90HT9ZBQiF4UZW', 3, 1, '0000-00-00 00:00:00'),
(3, '111111', 'dwi@gmail.com', '$2y$10$iG9LbTbJYCFQUfYLSyOv6OUVbeSbfteVzsRqGmYcnZP4b0qgEEVB.', 3, 1, '0000-00-00 00:00:00'),
(4, 'P002', 'opt@gmail.com', '$2y$10$mNxfq9dhwBNtspuXcYUrl.WtlsQ6cQtMPrYMVNVDcLqw2SLUCcwHK', 2, 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Petugas'),
(3, 'Nasabah');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kd_kelas`);

--
-- Indexes for table `nasabah`
--
ALTER TABLE `nasabah`
  ADD PRIMARY KEY (`no_rek`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`kd_petugas`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`kd_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
