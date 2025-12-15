-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2025 at 06:37 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_airent`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500');

-- --------------------------------------------------------

--
-- Table structure for table `kebaya`
--

CREATE TABLE `kebaya` (
  `id` int(11) NOT NULL,
  `nama_kebaya` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga_sewa` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `status` enum('Tersedia','Disewa') DEFAULT 'Tersedia'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kebaya`
--

INSERT INTO `kebaya` (`id`, `nama_kebaya`, `deskripsi`, `harga_sewa`, `gambar`, `status`) VALUES
(1, 'Kebaya Kutu Baru ', 'Kebaya klasik dengan sentuhan modern warna rose pink, cocok untuk acara formal ataupun kasual.', 150000, '788770937_kebayakutubaru.jpeg', 'Tersedia'),
(2, 'Kebaya Janggan Sekar', 'Kebaya janggan warna navy dengan detail bordiran bunga padi, include dengan rok', 250000, '1352996357_kebayajanggannavy.jpeg', 'Tersedia'),
(3, 'Kebaya Encim Modern Bordir', 'Kebaya ini dirancang dengan gaya modern, Model lengan panjang memberikan tampilan elegan dan sopan, Cocok untuk berbagai acara. Include dengan rok batik', 265000, '1053267532_Kebaya Encim Modern Bordir.jpeg', 'Disewa'),
(4, 'Kebaya Brokat Mahogani', 'kebaya bahan brukat, full furing, rok songket lilit', 250000, '1765235159_kebayaBrukatMahogani.jpeg', 'Tersedia'),
(5, 'Atasan Kebaya Janggan', 'MATERIAL : Organdy Embroidery\r\nukuran S to M\r\nAda tali pengikat dibagian belakang(Adjust-able), Bagian depan memakai kancing mutiara.', 175000, '172354696_jangganbabyblue.jpeg', 'Tersedia'),
(6, 'One Set Kebaya Shaumi Modern', 'warna burgundy\r\nUkuran LD 95\r\n', 275000, '440378697_kebayashaumi.jpeg', 'Disewa');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `id_kebaya` int(11) NOT NULL,
  `nama_penyewa` varchar(100) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `tanggal_sewa` date NOT NULL,
  `alamat` text NOT NULL,
  `status_transaksi` varchar(20) DEFAULT 'Menunggu'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `id_kebaya`, `nama_penyewa`, `no_hp`, `tanggal_sewa`, `alamat`, `status_transaksi`) VALUES
(2, 1, 'adzimah', '08981221956', '2025-12-25', 'Jl.Aminah Syukur', 'Menunggu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kebaya`
--
ALTER TABLE `kebaya`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kebaya`
--
ALTER TABLE `kebaya`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
