-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2019 at 06:14 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

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
  `email` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `first_name`, `last_name`, `password`, `alamat`, `contact`, `bio`, `email`, `image`) VALUES
('A0001', 'Sugar', 'Muhammad', 'Taftazani Adi', 'fiend', 'Jl. Gorongan V', '085393051298', 'Information System', 'm.taftazani123@gmail.com', 'icon.png');

-- --------------------------------------------------------

--
-- Table structure for table `detail_ekstra`
--

CREATE TABLE `detail_ekstra` (
  `id_ekstra` int(11) NOT NULL,
  `id_jenis` int(11) DEFAULT NULL,
  `pemakaian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_ekstra`
--

INSERT INTO `detail_ekstra` (`id_ekstra`, `id_jenis`, `pemakaian`) VALUES
(56, 1, 0),
(56, 2, 0),
(56, 3, 0),
(56, 4, 0),
(56, 5, 0),
(56, 6, 0),
(57, 1, 0),
(57, 2, 0),
(57, 3, 0),
(57, 4, 0),
(57, 5, 0),
(57, 6, 0),
(58, 1, -11),
(58, 2, 0),
(58, 3, 0),
(58, 4, 0),
(58, 5, 0),
(58, 6, 0),
(59, 1, 0),
(59, 2, 0),
(59, 3, 0),
(59, 4, 0),
(59, 5, 0),
(59, 6, 0),
(60, 1, 0),
(60, 2, 0),
(60, 3, 0),
(60, 4, 0),
(60, 5, 0),
(60, 6, 0),
(61, 1, 0),
(61, 2, 0),
(61, 3, 0),
(61, 4, 0),
(61, 5, 0),
(61, 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `detail_penyajian`
--

CREATE TABLE `detail_penyajian` (
  `id_powder` int(11) NOT NULL,
  `id_penyajian` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_penyajian`
--

INSERT INTO `detail_penyajian` (`id_powder`, `id_penyajian`, `harga`) VALUES
(32, 1, 12000),
(32, 2, 14000),
(32, 3, 10000),
(33, 1, 12000),
(33, 2, 14000),
(34, 1, 12000),
(34, 2, 14000),
(35, 1, 12000),
(35, 2, 14000),
(36, 1, 12000),
(36, 2, 14000),
(37, 1, 12000),
(37, 2, 14000),
(38, 1, 12000),
(38, 2, 14000),
(39, 1, 13000),
(39, 2, 15000),
(39, 3, 10000),
(40, 1, 13000),
(40, 2, 15000),
(41, 1, 13000),
(41, 2, 15000),
(42, 1, 12000),
(42, 2, 14000),
(43, 1, 12000),
(43, 2, 14000),
(44, 1, 12000),
(44, 2, 14000),
(45, 1, 13000),
(45, 2, 15000),
(45, 3, 10000),
(46, 1, 13000),
(46, 2, 15000),
(46, 3, 10000),
(47, 4, 15000),
(48, 4, 15000),
(49, 4, 15000),
(50, 4, 15000),
(51, 5, 10000),
(52, 5, 10000);

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
  `id_region` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`no_nota`, `id_powder`, `id_penyajian`, `id_topping`, `jumlah`, `id_region`) VALUES
(2, 32, 1, 27, 15000, 1),
(3, 34, 1, 27, 15000, 1),
(4, 32, 1, 24, 15000, 1),
(5, 32, 1, 24, 15000, 1),
(6, 32, 1, 24, 15000, 1),
(7, 32, 1, 24, 15000, 1),
(8, 32, 1, 24, 15000, 1);

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
(1, 10, 50000),
(2, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ekstra`
--

CREATE TABLE `ekstra` (
  `id_ekstra` int(11) NOT NULL,
  `nama_ekstra` varchar(20) NOT NULL,
  `stock_awal` float NOT NULL,
  `penambahan` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `sisa` float NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `id_region` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ekstra`
--

INSERT INTO `ekstra` (`id_ekstra`, `nama_ekstra`, `stock_awal`, `penambahan`, `total`, `sisa`, `satuan`, `id_region`) VALUES
(56, 'Susu Putih', 10, 0, 0, 8.19999, 'Liter', 1),
(57, 'Susu Coklat', 10, 0, 0, 10, 'Liter', 1),
(58, 'Cup', 100, 0, 0, 65, 'Cup', 1),
(59, 'Yakult', 50, 0, 0, 48, 'Botol', 1),
(60, 'Bubble', 10, 0, 0, 10, 'Bungkus', 1),
(61, 'Sirup', 10, 0, 0, 10, 'Liter', 1);

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
(4, 'Choco Premium'),
(5, 'Yakult'),
(6, 'Fresh And Juice');

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
  `id_staff` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jual`
--

INSERT INTO `jual` (`no_nota`, `tanggal`, `waktu`, `nama_pembeli`, `total_awal`, `diskon`, `total`, `status`, `id_staff`) VALUES
(2, '2019-10-26', '15:04:25', 'Bambang', 15000, 0, 15000, 'Success', 'S0003'),
(3, '2019-10-25', '15:25:08', 'Bambang', 15000, 0, 15000, 'Success', 'S0003'),
(4, '2019-10-30', '10:00:37', 'Testing', 15000, 0, 15000, 'Success', 'S0003'),
(5, '2019-10-30', '10:06:02', 'Coba', 15000, 0, 15000, 'Success', 'S0003'),
(6, '2019-10-30', '10:53:34', 'Bajang', 15000, 0, 15000, 'Success', 'S0003'),
(7, '2019-10-30', '11:02:34', 'Rogue', 15000, 0, 15000, 'Success', 'S0003'),
(8, '2019-10-30', '11:04:51', 'Cuk', 15000, 0, 15000, 'Success', 'S0003');

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
(3, 'Hot'),
(4, 'Yakult'),
(5, 'Juice');

-- --------------------------------------------------------

--
-- Table structure for table `powder`
--

CREATE TABLE `powder` (
  `id_powder` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `nama_powder` varchar(20) NOT NULL,
  `stock_awal` int(11) NOT NULL,
  `penambahan` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `sisa` int(11) NOT NULL,
  `id_region` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `powder`
--

INSERT INTO `powder` (`id_powder`, `id_jenis`, `nama_powder`, `stock_awal`, `penambahan`, `total`, `sisa`, `id_region`) VALUES
(32, 1, 'Choco Bar', 30, 0, 30, 14, 1),
(33, 1, 'Choco Oreo', 20, 0, 20, 20, 1),
(34, 1, 'Choco Mint', 25, 0, 25, 22, 1),
(35, 1, 'Westham', 15, 0, 15, 16, 1),
(36, 1, 'Taro', 20, 0, 20, 20, 1),
(37, 1, 'Thai Tea', 30, 0, 30, 29, 1),
(38, 1, 'Vanila Latte', 20, 0, 20, 20, 1),
(39, 2, 'Green Tea', 30, 0, 30, 28, 1),
(40, 2, 'Forrest Gump', 25, 0, 25, 24, 1),
(41, 2, 'Red Velvet', 20, 0, 20, 20, 1),
(42, 3, 'Choco Avocado', 30, 0, 30, 29, 1),
(43, 3, 'Choco Cheese', 30, 0, 30, 30, 1),
(44, 3, 'Choco Milow', 25, 0, 25, 25, 1),
(45, 4, 'Choco Hazel', 20, 0, 20, 20, 1),
(46, 4, 'Choco Rum', 25, 0, 25, 25, 1),
(47, 5, 'Green Tea Yakult', 20, 0, 20, 18, 1),
(48, 5, 'Forestgum Yakult', 30, 0, 30, 29, 1),
(49, 5, 'Taro Yakult', 25, 0, 25, 23, 1),
(50, 5, 'Thai Tea Yakult', 40, 0, 40, 38, 1),
(51, 6, 'Lychee Aloevera', 20, 0, 20, 19, 1),
(52, 6, 'Lychee Rainbow', 25, 0, 25, 23, 1);

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
(2, 'Kaliurang', 'Jl. Kaliurang'),
(3, 'Janti', 'jl janti no 123');

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
  `email` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id_staff`, `Nama`, `username`, `password`, `contact`, `alamat`, `email`, `image`) VALUES
('S0001', 'farid', '42d', '42d', '081328455575', 'Jl. Kalasan', '42d@gmail.com', 'icon.png'),
('S0002', 'kiki', 'kiki', 'kiki', '0819556564', 'sleman', 'oke@gmail.com', ''),
('S0003', 'Melon', 'melon', 'poltergeist', '0853', 'skip', 'm.taftazani123@gmail.com', ''),
('S0004', 'Kocheng', 'Kocheng', 'barbar', '0812345678900', 'jogja', 'kocheng@gmail.com', ''),
('S0005', 'Oyen', 'Oyen', 'oyen', '08', 'jalanan', 'barbar@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `topping`
--

CREATE TABLE `topping` (
  `id_topping` int(11) NOT NULL,
  `nama_topping` varchar(20) NOT NULL,
  `harga` int(11) NOT NULL,
  `stock_awal` int(11) NOT NULL,
  `penambahan` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `sisa` int(11) NOT NULL,
  `id_region` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topping`
--

INSERT INTO `topping` (`id_topping`, `nama_topping`, `harga`, `stock_awal`, `penambahan`, `total`, `sisa`, `id_region`) VALUES
(24, 'Bubble', 3000, 20, 0, 20, 11, 1),
(25, 'Jelly', 3000, 15, 0, 15, 14, 1),
(26, 'Oreo', 3000, 17, 0, 17, 17, 1),
(27, 'Aloevera', 3000, 15, 0, 15, 3, 1),
(28, 'Popping Boba', 4000, 25, 0, 25, 25, 1),
(29, 'Rainbow Jelly', 4000, 30, 0, 30, 30, 1);

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
  ADD KEY `id_ekstra` (`id_ekstra`),
  ADD KEY `id_jenis` (`id_jenis`);

--
-- Indexes for table `detail_penyajian`
--
ALTER TABLE `detail_penyajian`
  ADD KEY `id_powder` (`id_powder`),
  ADD KEY `id_penyajian` (`id_penyajian`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD KEY `no_nota` (`no_nota`),
  ADD KEY `id_powder` (`id_powder`),
  ADD KEY `id_topping` (`id_topping`),
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
  ADD KEY `id_staff` (`id_staff`);

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
  ADD KEY `id_jenis` (`id_jenis`),
  ADD KEY `powder_ibfk_2` (`id_region`);

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
-- AUTO_INCREMENT for table `diskon`
--
ALTER TABLE `diskon`
  MODIFY `id_diskon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ekstra`
--
ALTER TABLE `ekstra`
  MODIFY `id_ekstra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `jenis_menu`
--
ALTER TABLE `jenis_menu`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jual`
--
ALTER TABLE `jual`
  MODIFY `no_nota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `penyajian`
--
ALTER TABLE `penyajian`
  MODIFY `id_penyajian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `powder`
--
ALTER TABLE `powder`
  MODIFY `id_powder` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `region`
--
ALTER TABLE `region`
  MODIFY `id_region` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `topping`
--
ALTER TABLE `topping`
  MODIFY `id_topping` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_ekstra`
--
ALTER TABLE `detail_ekstra`
  ADD CONSTRAINT `detail_ekstra_ibfk_1` FOREIGN KEY (`id_ekstra`) REFERENCES `ekstra` (`id_ekstra`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_ekstra_ibfk_2` FOREIGN KEY (`id_jenis`) REFERENCES `jenis_menu` (`id_jenis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_penyajian`
--
ALTER TABLE `detail_penyajian`
  ADD CONSTRAINT `detail_penyajian_ibfk_1` FOREIGN KEY (`id_powder`) REFERENCES `powder` (`id_powder`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_penyajian_ibfk_2` FOREIGN KEY (`id_penyajian`) REFERENCES `penyajian` (`id_penyajian`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_ibfk_2` FOREIGN KEY (`id_powder`) REFERENCES `powder` (`id_powder`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_transaksi_ibfk_4` FOREIGN KEY (`id_topping`) REFERENCES `topping` (`id_topping`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_transaksi_ibfk_5` FOREIGN KEY (`id_penyajian`) REFERENCES `penyajian` (`id_penyajian`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_transaksi_ibfk_6` FOREIGN KEY (`no_nota`) REFERENCES `jual` (`no_nota`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_transaksi_ibfk_7` FOREIGN KEY (`id_region`) REFERENCES `region` (`id_region`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `jual_ibfk_1` FOREIGN KEY (`id_staff`) REFERENCES `staff` (`id_staff`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `powder`
--
ALTER TABLE `powder`
  ADD CONSTRAINT `powder_ibfk_1` FOREIGN KEY (`id_jenis`) REFERENCES `jenis_menu` (`id_jenis`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `powder_ibfk_2` FOREIGN KEY (`id_region`) REFERENCES `region` (`id_region`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `topping`
--
ALTER TABLE `topping`
  ADD CONSTRAINT `topping_ibfk_1` FOREIGN KEY (`id_region`) REFERENCES `region` (`id_region`) ON DELETE NO ACTION ON UPDATE NO ACTION;

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `e_detail_ekstra` ON SCHEDULE EVERY 1 DAY STARTS '2019-10-28 15:20:43' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE detail_ekstra SET pemakaian = 0$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
