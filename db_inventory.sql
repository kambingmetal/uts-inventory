-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2025 at 01:44 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_inventory`
--

CREATE TABLE `tb_inventory` (
  `id_barang` int(10) NOT NULL,
  `kode_barang` varchar(20) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `jumlah_barang` int(10) NOT NULL,
  `satuan_barang` varchar(20) NOT NULL,
  `harga_beli` double(20,2) NOT NULL,
  `status_barang` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_inventory`
--

INSERT INTO `tb_inventory` (`id_barang`, `kode_barang`, `nama_barang`, `jumlah_barang`, `satuan_barang`, `harga_beli`, `status_barang`) VALUES
(1, 'BRG006', 'Proyektor Epson X1', 10, 'pcs', 4500000.00, 1),
(3, 'BRG008', 'Mic Wireless', 0, 'pcs', 850000.00, 0),
(8, 'BRG001', 'Pulpen Hitam', 100, 'pcs', 1500.00, 1),
(9, 'BRG002', 'Buku Tulis', 200, 'pcs', 3500.00, 1),
(10, 'BRG003', 'Pensil 2B', 150, 'pcs', 1200.00, 1),
(11, 'BRG004', 'Penghapus', 75, 'pcs', 800.00, 1),
(12, 'BRG005', 'Rautan', 60, 'pcs', 1000.00, 1),
(13, 'BRG006', 'Stabilo', 90, 'pcs', 5000.00, 1),
(14, 'BRG007', 'Map Plastik', 40, 'pcs', 2000.00, 1),
(15, 'BRG008', 'Kertas A4', 300, 'rim', 45000.00, 1),
(16, 'BRG009', 'Spidol Board', 120, 'pcs', 5500.00, 1),
(17, 'BRG010', 'Tinta Printer', 50, 'botol', 65000.00, 1),
(18, 'BRG011', 'Lakban Bening', 80, 'roll', 2500.00, 1),
(19, 'BRG012', 'Gunting Kertas', 35, 'pcs', 7500.00, 1),
(20, 'BRG013', 'Penggaris 30cm', 110, 'pcs', 2000.00, 1),
(21, 'BRG014', 'Binder Clip', 130, 'box', 9000.00, 1),
(22, 'BRG015', 'Sticky Note', 95, 'pad', 3000.00, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_inventory`
--
ALTER TABLE `tb_inventory`
  ADD PRIMARY KEY (`id_barang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_inventory`
--
ALTER TABLE `tb_inventory`
  MODIFY `id_barang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
