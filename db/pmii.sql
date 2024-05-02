-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 02, 2024 at 03:23 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pmii`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id_cart` int NOT NULL,
  `id_user` int NOT NULL,
  `id_produk` int NOT NULL,
  `qty_cart` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mapaba`
--

CREATE TABLE `mapaba` (
  `id_mapaba` int NOT NULL,
  `id_user` int NOT NULL,
  `tempat_mapaba` varchar(100) NOT NULL,
  `tanggal_mapaba` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `mapaba`
--

INSERT INTO `mapaba` (`id_mapaba`, `id_user`, `tempat_mapaba`, `tanggal_mapaba`) VALUES
(2, 10, '2024-05-02', 'Komisariat Universitas Cendikia Abditama');

-- --------------------------------------------------------

--
-- Table structure for table `pkd`
--

CREATE TABLE `pkd` (
  `id_pkd` int NOT NULL,
  `id_user` int NOT NULL,
  `tempat_pkd` varchar(100) NOT NULL,
  `tanggal_pkd` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pkd`
--

INSERT INTO `pkd` (`id_pkd`, `id_user`, `tempat_pkd`, `tanggal_pkd`) VALUES
(1, 10, '2024-05-02', 'Univ Esa Unggul');

-- --------------------------------------------------------

--
-- Table structure for table `pkl`
--

CREATE TABLE `pkl` (
  `id_pkl` int NOT NULL,
  `id_user` int NOT NULL,
  `tempat_pkl` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tanggal_pkl` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pkl`
--

INSERT INTO `pkl` (`id_pkl`, `id_user`, `tempat_pkl`, `tanggal_pkl`) VALUES
(1, 10, '2024-05-09', 'Univ Tangerang Raya');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` int NOT NULL,
  `gambar_produk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga_produk`, `gambar_produk`) VALUES
(16, 'Jas Almamater', 200000, 'ALMETT PMII.jpg'),
(17, 'Gordon PMII', 50000, 'GORDON PMII.jpg'),
(18, 'Peci PMII', 100000, 'PECI PMII.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int NOT NULL,
  `id_pesanan` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `id_user` int NOT NULL,
  `id_produk` int NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `total_transaksi` int NOT NULL,
  `bukti_bayar` varchar(50) NOT NULL,
  `komisariat` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `status_transaksi` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_pesanan`, `id_user`, `id_produk`, `tanggal_transaksi`, `total_transaksi`, `bukti_bayar`, `komisariat`, `status_transaksi`) VALUES
(21, 'KBTNG-1714629730', 10, 18, '2024-05-02', 100000, 'Bukti transfer.jpeg', 'Insan Pembangunan', 'Transaksi Selesai'),
(22, 'KBTNG-1714657609', 10, 16, '2024-05-02', 200000, 'Bukti transfer.jpeg', 'Insan Pembangunan', 'Transaksi Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `nik` int NOT NULL,
  `npm` int NOT NULL,
  `nama_user` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nomor_hp` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ttl` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `asal_kampus` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `alamat` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `status` varchar(50) NOT NULL,
  `pengajuan` varchar(20) NOT NULL DEFAULT 'no',
  `level` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nik`, `npm`, `nama_user`, `email`, `password`, `nomor_hp`, `ttl`, `asal_kampus`, `alamat`, `status`, `pengajuan`, `level`) VALUES
(9, 123, 123, 'Admin', 'admin@pmii.com', '7815696ecbf1c96e6894b779456d330e', '123', 'Dummy', 'Dummy', 'Dummy', '', 'no', 2),
(10, 30432342, 2020134431, 'Anang akbar', 'asd@asd.com', '7815696ecbf1c96e6894b779456d330e', '08992898292', 'Tangerang, 19 Mei 1999', 'Insan Pembangunan', 'Kp. Bitung', 'PKL', 'no', 1),
(11, 3605, 123, 'Andri Hidayat', 'andrih316@gmail.com', '202cb962ac59075b964b07152d234b70', '081287276707', 'Jakarta, 19 Juni 1997', 'Insan Pembangunan', 'Kp. Margasari Rt.05 Rw.06 Curug Kulon kecamatan Curug Kab. Tangerang-Banten Kode Pos : 15810', 'PKD', 'no', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`);

--
-- Indexes for table `mapaba`
--
ALTER TABLE `mapaba`
  ADD PRIMARY KEY (`id_mapaba`);

--
-- Indexes for table `pkd`
--
ALTER TABLE `pkd`
  ADD PRIMARY KEY (`id_pkd`);

--
-- Indexes for table `pkl`
--
ALTER TABLE `pkl`
  ADD PRIMARY KEY (`id_pkl`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `mapaba`
--
ALTER TABLE `mapaba`
  MODIFY `id_mapaba` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pkd`
--
ALTER TABLE `pkd`
  MODIFY `id_pkd` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pkl`
--
ALTER TABLE `pkl`
  MODIFY `id_pkl` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
