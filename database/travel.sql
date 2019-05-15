-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2019 at 04:56 PM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travel`
--

-- --------------------------------------------------------

--
-- Table structure for table `bayar`
--

CREATE TABLE `bayar` (
  `id_bayar` varchar(20) NOT NULL,
  `id_booking` varchar(20) DEFAULT NULL,
  `harga` varchar(20) DEFAULT NULL,
  `subtotal` varchar(50) DEFAULT NULL,
  `jml_bayar` varchar(50) DEFAULT NULL,
  `jenis_bayar` varchar(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `biaya_jemput` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data_armada`
--

CREATE TABLE `data_armada` (
  `id_armada` varchar(20) NOT NULL,
  `jumlah` int(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data_jadwal`
--

CREATE TABLE `data_jadwal` (
  `id_jadwal` varchar(20) NOT NULL,
  `nama_jurusan` varchar(20) DEFAULT NULL,
  `harga` int(20) DEFAULT NULL,
  `jam_berangkat` int(20) DEFAULT NULL,
  `kapasitas` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_jadwal`
--

INSERT INTO `data_jadwal` (`id_jadwal`, `nama_jurusan`, `harga`, `jam_berangkat`, `kapasitas`) VALUES
('JDWL-000001', 'JOGJA-KEBUMEN', 70000, 20, '10'),
('JDWL-000002', 'JOGJA-MAJENANG', 100000, 10, '20');

-- --------------------------------------------------------

--
-- Table structure for table `data_jurusan`
--

CREATE TABLE `data_jurusan` (
  `id_jurusan` varchar(20) NOT NULL,
  `nama_jurusan` varchar(20) DEFAULT NULL,
  `harga` int(20) DEFAULT NULL,
  `jam_berangkat` int(20) DEFAULT NULL,
  `kapasitas` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_jurusan`
--

INSERT INTO `data_jurusan` (`id_jurusan`, `nama_jurusan`, `harga`, `jam_berangkat`, `kapasitas`) VALUES
('JR-000001', 'JOJGA - PANGANDARAN', 180000, 9, '20'),
('JR-000002', 'JOGJA - PANGANDARAN ', 180000, 16, '20');

-- --------------------------------------------------------

--
-- Table structure for table `data_karyawan`
--

CREATE TABLE `data_karyawan` (
  `id_karyawan` varchar(20) NOT NULL,
  `nama_karyawan` varchar(20) DEFAULT NULL,
  `jabatan` varchar(20) DEFAULT NULL,
  `jenis_kelamin` varchar(20) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `no_telp` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_karyawan`
--

INSERT INTO `data_karyawan` (`id_karyawan`, `nama_karyawan`, `jabatan`, `jenis_kelamin`, `alamat`, `no_telp`) VALUES
('KRY-000002', 'kmji', 'Operator', 'Perempuan', 'kio', 79),
('KRY-000003', 'uyguyg', 'Super Admin', 'Laki - Laki', 'ytgrf', 987),
('KRY-000004', 'dsd', 'Operator', 'Perempuan', 'efe', 212);

-- --------------------------------------------------------

--
-- Table structure for table `data_pelanggan`
--

CREATE TABLE `data_pelanggan` (
  `id_pelanggan` varchar(20) NOT NULL,
  `email` varchar(15) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(25) NOT NULL,
  `nama_pelanggan` varchar(20) DEFAULT NULL,
  `jenis_kelamin` varchar(20) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `no_telp` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_pelanggan`
--

INSERT INTO `data_pelanggan` (`id_pelanggan`, `email`, `username`, `password`, `nama_pelanggan`, `jenis_kelamin`, `alamat`, `no_telp`) VALUES
('PLG-000004', 'raka@gmail.com', 'raka', 'raka', 'Raka', 'Laki-laki', 'Panorama', 89723),
('PLG-000005', 'hakko@gmail.com', 'hakko', 'hakko', 'Hakko', 'Perempuan', 'Gg Haji Salim', 872136127),
('PLG-000006', 'putri@gmail.com', 'putri', 'putri', 'putri', NULL, 'cipadung', 921938781),
('PLG-000007', 'putrimariahulfa', 'putrimu', 'putri123', 'putri m', NULL, 'jl cipadung', 2147483647),
('PLG-000008', 'kakaw@gmail.com', 'kakaw', 'bd42f75a454c53cfde13e2399', 'kakaw', NULL, 'cipadung', 9821973),
('PLG-000009', 'lur@gmail.com', 'lut', 'cdb0b6889f4def26f43951b2d', 'lutfi', NULL, 'hg', 7263716);

-- --------------------------------------------------------

--
-- Table structure for table `data_supir`
--

CREATE TABLE `data_supir` (
  `id_supir` varchar(20) NOT NULL,
  `nama_supir` varchar(20) DEFAULT NULL,
  `jenis_kelamin` varchar(20) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `no_telp` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data_user`
--

CREATE TABLE `data_user` (
  `id_user` varchar(20) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `level` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_user`
--

INSERT INTO `data_user` (`id_user`, `username`, `password`, `level`) VALUES
('1', 'raka', '123', 'pelanggan');

-- --------------------------------------------------------

--
-- Table structure for table `det_bayar`
--

CREATE TABLE `det_bayar` (
  `id_det_bayar` varchar(20) NOT NULL,
  `id_bayar` varchar(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `det_pembayaran`
--

CREATE TABLE `det_pembayaran` (
  `id_det_bayar` varchar(20) NOT NULL,
  `id_bayar` varchar(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `det_trans_booking`
--

CREATE TABLE `det_trans_booking` (
  `id_det_trans_booking` varchar(50) DEFAULT NULL,
  `id_booking` varchar(20) DEFAULT NULL,
  `id_jurusan` varchar(20) DEFAULT NULL,
  `id_supir` varchar(20) DEFAULT NULL,
  `harga` varchar(20) DEFAULT NULL,
  `jumlah_tiket` int(11) DEFAULT NULL,
  `total_bayar` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `is_users`
--

CREATE TABLE `is_users` (
  `id_user` int(3) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `Alamat` varchar(50) NOT NULL,
  `telepon` varchar(13) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `hak_akses` enum('Super Admin','Manajer','Gudang') NOT NULL,
  `status` enum('aktif','blokir') NOT NULL DEFAULT 'aktif',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `is_users`
--

INSERT INTO `is_users` (`id_user`, `username`, `nama_user`, `password`, `email`, `Alamat`, `telepon`, `foto`, `hak_akses`, `status`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'superadmin', '17c4520f6cfd1ab53d8745e84681eb49', 'superadmin@gmail.com', '', '085669919769', 'user-default.png', 'Super Admin', 'aktif', '2017-04-01 08:15:15', '2019-01-25 09:00:23'),
(2, 'hanind', 'Hanind Kadina Putri', 'd2d3aeb539ae58ebcc8ef50ee9906b89', 'hkadinaputri@gmail.com', '', '09128976', 'kadina.png', 'Manajer', 'aktif', '2017-04-01 08:15:15', '2019-05-15 13:30:51'),
(3, 'Lutfi', 'Lutfi Kesumat', '202cb962ac59075b964b07152d234b70', 'Lutfi@gmail.com', '', '08597861327', '', 'Gudang', 'aktif', '2017-04-01 08:15:15', '2019-05-15 13:29:32'),
(4, 'Hakko', 'hakko', 'd3d1cf96197c803f1b5331d3a236fc55', NULL, '', NULL, NULL, '', 'aktif', '2019-05-11 14:10:32', '2019-05-11 14:10:32'),
(5, 'Hakko', 'hakko', 'd3d1cf96197c803f1b5331d3a236fc55', NULL, '', NULL, NULL, '', 'aktif', '2019-05-11 14:10:32', '2019-05-11 14:10:32'),
(6, 'iki', 'iki', '71fd94a0d995244544c153158bbbefc5', NULL, '', NULL, NULL, '', 'aktif', '2019-05-12 18:32:40', '2019-05-12 18:32:40'),
(7, 'raka', 'Raka kakaw', 'e5b2a975d9b73165bcc8b5e63ce488ff', 'kakaw@gmail.com', 'cipadung', '087654422', NULL, '', 'aktif', '2019-05-15 11:48:16', '2019-05-15 11:48:16'),
(8, 'mj', 'Rizki Aditia', '3e089c076bf1ec3a8332280ee35c28d4', 'Rizki@gmail.com', 'Cilengkrang', '087654462', NULL, '', 'aktif', '2019-05-15 11:50:00', '2019-05-15 11:50:00'),
(9, 'hakko', '', 'd3d1cf96197c803f1b5331d3a236fc55', '', '', '', NULL, '', 'aktif', '2019-05-15 12:33:07', '2019-05-15 12:33:07');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` varchar(20) NOT NULL,
  `nama_jurusan` varchar(20) DEFAULT NULL,
  `harga` int(20) DEFAULT NULL,
  `jam_berangkat` time DEFAULT NULL,
  `kapasitas` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `nama_jurusan`, `harga`, `jam_berangkat`, `kapasitas`) VALUES
('JDWL-000001', 'JOGJA-KEBUMEN', 70000, '08:00:00', '-23');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` varchar(50) NOT NULL,
  `nama_jurusan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`) VALUES
('JUR-1001 ', 'Yogyakarta-Bandung (Baltos)'),
('JUR-1002 ', 'Yogyakarta-Bandung (Cibiru)'),
('JUR-1003 ', 'Bandung (Baltos) - Yogyakarta'),
('JUR-1004 ', 'Bandung (Cibiru) - Yogyakarta');

-- --------------------------------------------------------

--
-- Table structure for table `ktp`
--

CREATE TABLE `ktp` (
  `nik` varchar(20) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `ttl` date DEFAULT NULL,
  `jk` varchar(50) DEFAULT NULL,
  `alamat` text,
  `rt` int(11) DEFAULT NULL,
  `rw` int(11) DEFAULT NULL,
  `kel` varchar(50) DEFAULT NULL,
  `kec` varchar(50) DEFAULT NULL,
  `agama` enum('Islam','Kristen','Katolik','Hindu','Budha') DEFAULT NULL,
  `status_kawin` enum('Kawin','Belum Kawin') DEFAULT NULL,
  `pekerjaan` varchar(50) DEFAULT NULL,
  `kewarganegaraan` enum('WNI','WNA') DEFAULT NULL,
  `masa_berlaku` varchar(50) DEFAULT 'SEUMUR HIDUP'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ktp`
--

INSERT INTO `ktp` (`nik`, `nama`, `tempat_lahir`, `ttl`, `jk`, `alamat`, `rt`, `rw`, `kel`, `kec`, `agama`, `status_kawin`, `pekerjaan`, `kewarganegaraan`, `masa_berlaku`) VALUES
('NIK-000003', 'Elsa SN', 'Bogor', '2019-03-06', 'Laki-Laki', 'Sleman', 3, 2, 'Sleman', 'Sleman', 'Kristen', 'Belum Kawin', 'Pelajar', NULL, 'Seumur Hidup'),
('NIK-000004', 'ffq', 'rqwrq', '2019-02-27', 'Perempuan', 'rqwrq', 0, 1, 'rwr', 'rqwrq', 'Budha', 'Kawin', 'rq', NULL, 'qrq');

-- --------------------------------------------------------

--
-- Table structure for table `pembatalan`
--

CREATE TABLE `pembatalan` (
  `id_pembatalan` varchar(20) NOT NULL,
  `tgl_pembatalan` date DEFAULT NULL,
  `id_pembelian` varchar(20) DEFAULT NULL,
  `tgl_pembelian` date DEFAULT NULL,
  `tgl_berangkat` date DEFAULT NULL,
  `jumlah_tiket` int(11) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL,
  `jumlah_tiket_kembali` int(11) DEFAULT NULL,
  `jumlah_uang_kembali` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` varchar(20) NOT NULL,
  `id_pembelian` varchar(20) DEFAULT NULL,
  `id_jurusan` varchar(20) DEFAULT NULL,
  `tgl_transaksi` date DEFAULT NULL,
  `subtotal` int(50) DEFAULT NULL,
  `jumlah_bayar` int(50) DEFAULT NULL,
  `jenis_bayar` varchar(20) DEFAULT NULL,
  `status` enum('Lunas','Belum Lunas') DEFAULT 'Lunas'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pembelian`, `id_jurusan`, `tgl_transaksi`, `subtotal`, `jumlah_bayar`, `jenis_bayar`, `status`) VALUES
('PBYR-2019-0001', 'PBL-2019-0002', NULL, '2019-05-15', 360000, 360000, NULL, 'Lunas'),
('PBYR-2019-0002', 'PBL-2019-0002', NULL, '2019-05-15', 40000, 360000, NULL, 'Lunas');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` varchar(20) NOT NULL,
  `id_user` varchar(20) DEFAULT NULL,
  `tgl_pembelian` date DEFAULT NULL,
  `id_jadwal` varchar(20) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `tgl_berangkat` date DEFAULT NULL,
  `jumlah_tiket` int(11) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL,
  `nama_user` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_user`, `tgl_pembelian`, `id_jadwal`, `harga`, `tgl_berangkat`, `jumlah_tiket`, `subtotal`, `nama_user`) VALUES
('PBL-2019-0001', '4', '2019-05-15', 'JDWL-000001', 20000, '2019-05-23', 2, 40000, 'PLG-000009'),
('PBL-2019-0002', '7', '2019-05-15', 'JDWL-000001', 120000, '2019-05-16', 1, 120000, 'Raka kakaw');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bayar`
--
ALTER TABLE `bayar`
  ADD PRIMARY KEY (`id_bayar`);

--
-- Indexes for table `data_armada`
--
ALTER TABLE `data_armada`
  ADD PRIMARY KEY (`id_armada`);

--
-- Indexes for table `data_jadwal`
--
ALTER TABLE `data_jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `data_jurusan`
--
ALTER TABLE `data_jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `data_karyawan`
--
ALTER TABLE `data_karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `data_pelanggan`
--
ALTER TABLE `data_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `data_supir`
--
ALTER TABLE `data_supir`
  ADD PRIMARY KEY (`id_supir`);

--
-- Indexes for table `data_user`
--
ALTER TABLE `data_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `det_bayar`
--
ALTER TABLE `det_bayar`
  ADD PRIMARY KEY (`id_det_bayar`);

--
-- Indexes for table `det_pembayaran`
--
ALTER TABLE `det_pembayaran`
  ADD PRIMARY KEY (`id_det_bayar`);

--
-- Indexes for table `is_users`
--
ALTER TABLE `is_users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `level` (`hak_akses`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `ktp`
--
ALTER TABLE `ktp`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `pembatalan`
--
ALTER TABLE `pembatalan`
  ADD PRIMARY KEY (`id_pembatalan`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `is_users`
--
ALTER TABLE `is_users`
  MODIFY `id_user` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
