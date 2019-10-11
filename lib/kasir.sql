-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2019 at 11:13 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kasir`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` char(5) NOT NULL,
  `username` varchar(15) NOT NULL,
  `first_name` varchar(15) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `password` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `contact` varchar(13) NOT NULL,
  `bio` text NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `first_name`, `last_name`, `password`, `alamat`, `contact`, `bio`, `email`) VALUES
('A0001', 'Sugar', 'Muhammad', 'Taftazani Adi', 'fiend', 'Jl. Gorongan V', '085393051298', 'Information System', 'm.taftazani123@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `detail_ekstra`
--

CREATE TABLE `detail_ekstra` (
  `id_detail_ekstra` int(11) NOT NULL,
  `id_ekstra` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `pemakaian` int(11) NOT NULL,
  `id_region` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_penyajian`
--

CREATE TABLE `detail_penyajian` (
  `id_powder` int(11) NOT NULL,
  `id_penyajian` int(11) NOT NULL,
  `id_region` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_penyajian`
--

INSERT INTO `detail_penyajian` (`id_powder`, `id_penyajian`, `id_region`) VALUES
(23, 1, 1),
(23, 2, 1),
(23, 3, 1),
(23, 1, 2),
(23, 2, 2),
(23, 3, 2),
(25, 1, 1),
(25, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `no_nota` int(11) NOT NULL,
  `id_powder` int(11) NOT NULL,
  `id_penyajian` int(11) DEFAULT NULL,
  `id_topping` int(11) DEFAULT NULL,
  `jumlah` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `id_region` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `diskon`
--

CREATE TABLE `diskon` (
  `id_diskon` int(11) NOT NULL,
  `total_diskon` int(11) NOT NULL,
  `min_pembelian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diskon`
--

INSERT INTO `diskon` (`id_diskon`, `total_diskon`, `min_pembelian`) VALUES
(1, 10, 50000);

-- --------------------------------------------------------

--
-- Table structure for table `ekstra`
--

CREATE TABLE `ekstra` (
  `id_ekstra` int(11) NOT NULL,
  `nama_ekstra` varchar(20) NOT NULL,
  `stock_awal` float NOT NULL,
  `sisa` float NOT NULL,
  `id_region` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ekstra`
--

INSERT INTO `ekstra` (`id_ekstra`, `nama_ekstra`, `stock_awal`, `sisa`, `id_region`) VALUES
(20, 'Susu Putih', 20, 0, 1),
(21, 'Susu Putih', 20, 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_menu`
--

CREATE TABLE `jenis_menu` (
  `id_jenis` int(11) NOT NULL,
  `nama_jenis` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_menu`
--

INSERT INTO `jenis_menu` (`id_jenis`, `nama_jenis`) VALUES
(1, 'Basic'),
(2, 'Premium'),
(3, 'Soklat'),
(4, 'Yakult'),
(5, 'Fresh and Juice');

-- --------------------------------------------------------

--
-- Table structure for table `jual`
--

CREATE TABLE `jual` (
  `no_nota` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `nama_pembeli` varchar(50) NOT NULL,
  `total_awal` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `status` enum('Process','Success') NOT NULL DEFAULT 'Process',
  `id_staff` char(5) NOT NULL,
  `id_region` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penyajian`
--

CREATE TABLE `penyajian` (
  `id_penyajian` int(11) NOT NULL,
  `nama_penyajian` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyajian`
--

INSERT INTO `penyajian` (`id_penyajian`, `nama_penyajian`) VALUES
(1, 'Basic'),
(2, 'PM'),
(3, 'Hot');

-- --------------------------------------------------------

--
-- Table structure for table `powder`
--

CREATE TABLE `powder` (
  `id_powder` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `nama_powder` varchar(20) NOT NULL,
  `harga` int(11) NOT NULL,
  `stock_awal` int(11) NOT NULL,
  `sisa` int(11) NOT NULL,
  `id_region` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `powder`
--

INSERT INTO `powder` (`id_powder`, `id_jenis`, `nama_powder`, `harga`, `stock_awal`, `sisa`, `id_region`) VALUES
(23, 1, 'Choco Bar', 10000, 20, 0, 1),
(24, 1, 'Choco Bar', 10000, 20, 0, 2),
(25, 2, 'Choco Hazel', 15000, 20, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE `region` (
  `id_region` int(11) NOT NULL,
  `nama_region` varchar(30) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`id_region`, `nama_region`, `alamat`) VALUES
(1, 'Seturan', 'Jl. Seturan Raya'),
(2, 'Kaliurang', 'Jl. Kaliurang');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id_staff` char(5) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `contact` varchar(13) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id_staff`, `Nama`, `username`, `password`, `contact`, `alamat`, `email`) VALUES
('S0001', 'farid', '42d', '42d', '081328455575', 'kalsan', '42d@gmail.com'),
('S0002', 'kiki', 'kiki', 'kiki', '0819556564', 'sleman', 'oke@gmail.com'),
('S0003', 'Melon', 'melon', 'poltergeist', '0853', 'skip', 'm.taftazani123@gmail.com'),
('S0004', 'Kocheng', 'Kocheng', 'barbar', '0812345678900', 'jogja', 'kocheng@gmail.com'),
('S0005', 'Oyen', 'Oyen', 'oyen', '08', 'jalanan', 'barbar@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `topping`
--

CREATE TABLE `topping` (
  `id_topping` int(11) NOT NULL,
  `nama_topping` varchar(20) NOT NULL,
  `harga` int(11) NOT NULL,
  `stock_awal` int(11) NOT NULL,
  `penggunaan` int(11) NOT NULL,
  `id_region` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topping`
--

INSERT INTO `topping` (`id_topping`, `nama_topping`, `harga`, `stock_awal`, `penggunaan`, `id_region`) VALUES
(20, 'Oreo', 3000, 25, 0, 2),
(21, 'Oreo', 3000, 25, 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `detail_ekstra`
--
ALTER TABLE `detail_ekstra`
  ADD PRIMARY KEY (`id_detail_ekstra`),
  ADD KEY `id_ekstra` (`id_ekstra`),
  ADD KEY `id_jenis` (`id_jenis`),
  ADD KEY `id_region` (`id_region`);

--
-- Indexes for table `detail_penyajian`
--
ALTER TABLE `detail_penyajian`
  ADD KEY `id_powder` (`id_powder`),
  ADD KEY `id_penyajian` (`id_penyajian`),
  ADD KEY `id_region` (`id_region`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD KEY `no_nota` (`no_nota`),
  ADD KEY `id_powder` (`id_powder`),
  ADD KEY `id_topping` (`id_topping`),
  ADD KEY `id_jadwal` (`id_jadwal`),
  ADD KEY `id_penyajian` (`id_penyajian`),
  ADD KEY `id_region` (`id_region`);

--
-- Indexes for table `diskon`
--
ALTER TABLE `diskon`
  ADD PRIMARY KEY (`id_diskon`);

--
-- Indexes for table `ekstra`
--
ALTER TABLE `ekstra`
  ADD PRIMARY KEY (`id_ekstra`),
  ADD KEY `id_region` (`id_region`),
  ADD KEY `id_region_2` (`id_region`);

--
-- Indexes for table `jenis_menu`
--
ALTER TABLE `jenis_menu`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `jual`
--
ALTER TABLE `jual`
  ADD PRIMARY KEY (`no_nota`),
  ADD KEY `id_staff` (`id_staff`),
  ADD KEY `id_region` (`id_region`);

--
-- Indexes for table `penyajian`
--
ALTER TABLE `penyajian`
  ADD PRIMARY KEY (`id_penyajian`);

--
-- Indexes for table `powder`
--
ALTER TABLE `powder`
  ADD PRIMARY KEY (`id_powder`),
  ADD KEY `id_jenis` (`id_jenis`);

--
-- Indexes for table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`id_region`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id_staff`);

--
-- Indexes for table `topping`
--
ALTER TABLE `topping`
  ADD PRIMARY KEY (`id_topping`),
  ADD KEY `id_region` (`id_region`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_ekstra`
--
ALTER TABLE `detail_ekstra`
  MODIFY `id_detail_ekstra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `diskon`
--
ALTER TABLE `diskon`
  MODIFY `id_diskon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ekstra`
--
ALTER TABLE `ekstra`
  MODIFY `id_ekstra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `jenis_menu`
--
ALTER TABLE `jenis_menu`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jual`
--
ALTER TABLE `jual`
  MODIFY `no_nota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `penyajian`
--
ALTER TABLE `penyajian`
  MODIFY `id_penyajian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `powder`
--
ALTER TABLE `powder`
  MODIFY `id_powder` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `region`
--
ALTER TABLE `region`
  MODIFY `id_region` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `topping`
--
ALTER TABLE `topping`
  MODIFY `id_topping` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_ekstra`
--
ALTER TABLE `detail_ekstra`
  ADD CONSTRAINT `detail_ekstra_ibfk_1` FOREIGN KEY (`id_ekstra`) REFERENCES `ekstra` (`id_ekstra`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_ekstra_ibfk_2` FOREIGN KEY (`id_jenis`) REFERENCES `jenis_menu` (`id_jenis`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_ekstra_ibfk_3` FOREIGN KEY (`id_region`) REFERENCES `region` (`id_region`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `detail_penyajian`
--
ALTER TABLE `detail_penyajian`
  ADD CONSTRAINT `detail_penyajian_ibfk_1` FOREIGN KEY (`id_powder`) REFERENCES `powder` (`id_powder`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_penyajian_ibfk_2` FOREIGN KEY (`id_penyajian`) REFERENCES `penyajian` (`id_penyajian`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_penyajian_ibfk_3` FOREIGN KEY (`id_region`) REFERENCES `region` (`id_region`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_ibfk_2` FOREIGN KEY (`id_powder`) REFERENCES `powder` (`id_powder`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_transaksi_ibfk_4` FOREIGN KEY (`id_topping`) REFERENCES `topping` (`id_topping`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_transaksi_ibfk_5` FOREIGN KEY (`id_penyajian`) REFERENCES `penyajian` (`id_penyajian`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_transaksi_ibfk_6` FOREIGN KEY (`no_nota`) REFERENCES `jual` (`no_nota`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_transaksi_ibfk_7` FOREIGN KEY (`id_region`) REFERENCES `region` (`id_region`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ekstra`
--
ALTER TABLE `ekstra`
  ADD CONSTRAINT `ekstra_ibfk_1` FOREIGN KEY (`id_region`) REFERENCES `region` (`id_region`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ekstra_ibfk_2` FOREIGN KEY (`id_region`) REFERENCES `region` (`id_region`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `jual`
--
ALTER TABLE `jual`
  ADD CONSTRAINT `jual_ibfk_1` FOREIGN KEY (`id_staff`) REFERENCES `staff` (`id_staff`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jual_ibfk_2` FOREIGN KEY (`id_region`) REFERENCES `region` (`id_region`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `powder`
--
ALTER TABLE `powder`
  ADD CONSTRAINT `powder_ibfk_1` FOREIGN KEY (`id_jenis`) REFERENCES `jenis_menu` (`id_jenis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `topping`
--
ALTER TABLE `topping`
  ADD CONSTRAINT `topping_ibfk_1` FOREIGN KEY (`id_region`) REFERENCES `region` (`id_region`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
