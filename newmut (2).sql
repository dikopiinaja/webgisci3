-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 14, 2021 at 04:38 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newmut`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_driver`
--

DROP TABLE IF EXISTS `tb_driver`;
CREATE TABLE IF NOT EXISTS `tb_driver` (
  `id_supir` int(11) NOT NULL,
  `nama_supir` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `id_mobil` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`id_supir`),
  KEY `id_mobil` (`id_mobil`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_driver`
--

INSERT INTO `tb_driver` (`id_supir`, `nama_supir`, `tempat_lahir`, `tanggal_lahir`, `no_hp`, `email`, `id_mobil`, `status`) VALUES
(12, 'Kunsarifan', 'Jakarta', '1997-06-18', '0812676767', 'Kunsarifan18@gmail.com', 7, 'askajsdkasj');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jadwal`
--

DROP TABLE IF EXISTS `tb_jadwal`;
CREATE TABLE IF NOT EXISTS `tb_jadwal` (
  `id_jadwal` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_berangkat` datetime DEFAULT NULL,
  `tgl_sampai` datetime DEFAULT NULL,
  `asal` int(11) NOT NULL,
  `tujuan` int(11) NOT NULL,
  `ongkos` int(11) NOT NULL,
  `mobil` int(11) NOT NULL,
  `kategori` int(11) NOT NULL,
  `tgl_dibuat` datetime DEFAULT NULL,
  PRIMARY KEY (`id_jadwal`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jadwal`
--

INSERT INTO `tb_jadwal` (`id_jadwal`, `tgl_berangkat`, `tgl_sampai`, `asal`, `tujuan`, `ongkos`, `mobil`, `kategori`, `tgl_dibuat`) VALUES
(44, '2021-04-10 16:01:00', '2021-04-11 16:01:00', 9, 12, 160000, 15, 1, '2021-04-10 00:00:00'),
(45, '2021-04-10 16:35:00', '2021-04-11 16:36:00', 9, 9, 300000, 14, 1, '2021-04-10 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

DROP TABLE IF EXISTS `tb_kategori`;
CREATE TABLE IF NOT EXISTS `tb_kategori` (
  `id_kategori` int(10) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Perjalanan Jarak Jauh');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mobil`
--

DROP TABLE IF EXISTS `tb_mobil`;
CREATE TABLE IF NOT EXISTS `tb_mobil` (
  `id_mobil` int(11) NOT NULL AUTO_INCREMENT,
  `nama_mobil` varchar(50) NOT NULL,
  `noplat` varchar(50) NOT NULL,
  `kapasitas` int(11) NOT NULL,
  `tipe` varchar(50) NOT NULL,
  PRIMARY KEY (`id_mobil`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_mobil`
--

INSERT INTO `tb_mobil` (`id_mobil`, `nama_mobil`, `noplat`, `kapasitas`, `tipe`) VALUES
(7, 'Jazz terbaru', 'B 003', 10, 'Sedang'),
(8, 'Luxio', 'R 1234  KRY', 12, 'Besar'),
(13, 'Mobilio', 'B 0001 Ac', 4, 'Kecil'),
(14, 'Xenia', 'R 2200 AB', 12, 'Sedang'),
(15, 'ELF', 'R 000 aa', 12, 'Besar');

-- --------------------------------------------------------

--
-- Table structure for table `tb_notifikasi`
--

DROP TABLE IF EXISTS `tb_notifikasi`;
CREATE TABLE IF NOT EXISTS `tb_notifikasi` (
  `id_notif` int(10) NOT NULL AUTO_INCREMENT,
  `judul` varchar(50) DEFAULT NULL,
  `pesan` text,
  PRIMARY KEY (`id_notif`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_notifikasi`
--

INSERT INTO `tb_notifikasi` (`id_notif`, `judul`, `pesan`) VALUES
(23, 'Jadwal telah ditambahkan', 'Jadwal ditambahkan '),
(22, 'Jadwal telah ditambahkan', 'Jadwal ditambahkan ');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penumpang`
--

DROP TABLE IF EXISTS `tb_penumpang`;
CREATE TABLE IF NOT EXISTS `tb_penumpang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_tiket` varchar(100) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `no_identitas` int(11) DEFAULT NULL,
  `id_jadwal` int(11) DEFAULT NULL,
  `kursi` varchar(50) DEFAULT NULL,
  `tgl_pesan` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_penumpang`
--

INSERT INTO `tb_penumpang` (`id`, `no_tiket`, `nama`, `no_identitas`, `id_jadwal`, `kursi`, `tgl_pesan`) VALUES
(3, 'T002', 'Kunsarifan', 2147483647, 44, '1', '2021-04-13 13:26:29'),
(4, 'T003', 'Intan', 30303030, 44, '1', '2021-04-14 15:12:49'),
(5, 'T003', 'Safitri', 2147483647, 44, '2', '2021-04-14 15:12:49'),
(6, 'T004', 'Raka', 12345, 44, '1', '2021-04-14 15:18:04'),
(7, 'T004', 'Indah', 54321, 44, '2', '2021-04-14 15:18:04');

-- --------------------------------------------------------

--
-- Table structure for table `tb_perjalanan`
--

DROP TABLE IF EXISTS `tb_perjalanan`;
CREATE TABLE IF NOT EXISTS `tb_perjalanan` (
  `id_perjalanan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_perjalanan` varchar(50) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `Latlong` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_perjalanan`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_perjalanan`
--

INSERT INTO `tb_perjalanan` (`id_perjalanan`, `nama_perjalanan`, `latitude`, `longitude`, `Latlong`) VALUES
(9, 'Cilacap', '-7.667441482726056', '108.97404626427051', '-7.667441482726056 ,108.97404626427051 '),
(10, 'Bandung', '-6.871892962887516', '107.56634502588045', '-6.871892962887516 , 107.56634502588045'),
(11, 'Jakarta', '-6.18424616128059', '106.82950140891063', '-6.18424616128059 , 106.82950140891063'),
(12, 'Sukabumi', '-6.926426847059551', '106.89548740446014', '-6.926426847059551 , 106.89548740446014'),
(13, 'Jogjakarta', '-7.8089631205593895', '110.35975217081076', '-7.8089631205593895 , 110.35975217081076'),
(17, 'Indramayu', '-6.32621808201486', '108.31418630877516', '-6.32621808201486 , 108.31418630877516'),
(18, 'Pemalang', '-6.850077654785543', '109.09502058944469', '-6.850077654785543 , 109.09502058944469');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tiket`
--

DROP TABLE IF EXISTS `tb_tiket`;
CREATE TABLE IF NOT EXISTS `tb_tiket` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `no_tiket` varchar(50) DEFAULT NULL,
  `id_jadwal` int(10) DEFAULT NULL,
  `nama_pemesan` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `no_telpon` varchar(20) DEFAULT NULL,
  `alamat` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_tiket`
--

INSERT INTO `tb_tiket` (`id`, `no_tiket`, `id_jadwal`, `nama_pemesan`, `email`, `no_telpon`, `alamat`) VALUES
(1, 'T001', 37, 'Kunsarifan', 'kunsarifan18@gmail.com', '081217878787', 'test'),
(2, 'T002', 44, 'kunsarifan', 'sarifankun@gmail.com', '081211981268', 'Jl. Patimura No. 42 RT 03/04 Buntu Kec. Kroya Kab,. Cilacap'),
(3, 'T003', 44, 'Intan Safitri', 'sarifankun@gmail.com', '081211981268', 'Buntu Cilacap'),
(4, 'T004', 44, 'Raka Indra', 'sarifankun@gmail.com', '02121121', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `tb_travel`
--

DROP TABLE IF EXISTS `tb_travel`;
CREATE TABLE IF NOT EXISTS `tb_travel` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nama_travel` varchar(50) DEFAULT NULL,
  `nama_pemilik` varchar(50) DEFAULT NULL,
  `alamat` text,
  `no_hp` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `facebook` varchar(50) DEFAULT NULL,
  `instagram` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_travel`
--

INSERT INTO `tb_travel` (`id`, `nama_travel`, `nama_pemilik`, `alamat`, `no_hp`, `email`, `facebook`, `instagram`) VALUES
(1, 'New Mutiara Travel', 'Imam Sutaryo', 'Jl. Patimura No. 40 RT. 03/04 Buntu, Kec. Kroya Kab, Cilacap', '08787878878', 'newmutiara@gmail.com', 'www.facebook.com/newmutiara', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE IF NOT EXISTS `tb_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `user_email` varchar(50) DEFAULT NULL,
  `user_password` varchar(50) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `name`, `user_name`, `user_email`, `user_password`, `is_active`, `role`) VALUES
(1, 'Administrator', 'admin', 'kunsarifan18@gmail.com', 'f865b53623b121fd34ee5426c792e5c33af8c227', 1, 1),
(2, 'Supir', 'Kunsarifan', 'kunsarifan@gmail.com', '9e3ad7fd766a6fbfad02394e85ffb5d464440b5e', 1, 2);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_driver`
--
ALTER TABLE `tb_driver`
  ADD CONSTRAINT `tb_driver_ibfk_1` FOREIGN KEY (`id_mobil`) REFERENCES `tb_mobil` (`id_mobil`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
