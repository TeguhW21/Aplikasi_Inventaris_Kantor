-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 20, 2025 at 11:58 PM
-- Server version: 8.2.0
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_inventaris`
--

-- --------------------------------------------------------

--
-- Table structure for table `alokasi_barang`
--

CREATE TABLE `alokasi_barang` (
  `id` int NOT NULL,
  `barang_id` int NOT NULL,
  `cabang_id` int NOT NULL,
  `gedung_id` int NOT NULL,
  `lantai_id` int NOT NULL,
  `ruangan_id` int NOT NULL,
  `user_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `alokasi_barang`
--

INSERT INTO `alokasi_barang` (`id`, `barang_id`, `cabang_id`, `gedung_id`, `lantai_id`, `ruangan_id`, `user_id`, `created_at`) VALUES
(5, 1, 1, 1, 1, 1, 2, '2025-03-20 19:58:16'),
(6, 2, 1, 1, 2, 3, 1, '2025-03-20 23:20:20');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int NOT NULL,
  `nama` varchar(100) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `kondisi` enum('Baik','Rusak','Perlu Perbaikan') NOT NULL,
  `kategori_id` int NOT NULL,
  `harga` decimal(12,2) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `deskripsi` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nama`, `foto`, `kondisi`, `kategori_id`, `harga`, `tanggal_pembelian`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'Meja Kantor', 'foto_meja_67dc54e399a10.png', 'Perlu Perbaikan', 1, 1500000.00, '2024-03-01', 'Meja kantor kayu jati', '2025-03-20 13:52:04', '2025-03-20 23:37:45'),
(2, 'Laptop Dell', 'laptop_67dc5505d279b.jpg', 'Baik', 2, 8500000.00, '2024-02-15', 'Laptop Dell Core i7', '2025-03-20 13:52:04', '2025-03-20 17:48:53'),
(3, 'Printer Epson', 'printer_67dc561a0c21c.png', 'Baik', 2, 2500000.00, '2024-01-10', 'Printer Epson L3110', '2025-03-20 13:52:04', '2025-03-20 17:53:30');

-- --------------------------------------------------------

--
-- Table structure for table `cabang`
--

CREATE TABLE `cabang` (
  `id` int NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cabang`
--

INSERT INTO `cabang` (`id`, `nama`, `alamat`, `created_at`) VALUES
(1, 'Cabang Jakarta', 'Jl. Sudirman No.1, Jakarta', '2025-03-20 13:52:04'),
(2, 'Cabang Surabaya', 'Jl. Ahmad Yani No.2, Surabaya', '2025-03-20 13:52:04'),
(4, 'Cabang Bandung', 'Jl. Soekarno-Hatta ', '2025-03-20 21:41:07');

-- --------------------------------------------------------

--
-- Table structure for table `gedung`
--

CREATE TABLE `gedung` (
  `id` int NOT NULL,
  `cabang_id` int NOT NULL,
  `nama` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `gedung`
--

INSERT INTO `gedung` (`id`, `cabang_id`, `nama`, `created_at`) VALUES
(1, 1, 'Gedung A', '2025-03-20 13:52:04'),
(2, 1, 'Gedung B', '2025-03-20 13:52:04'),
(3, 2, 'Gedung C', '2025-03-20 13:52:04'),
(5, 4, 'Gedung A', '2025-03-20 23:20:38');

-- --------------------------------------------------------

--
-- Table structure for table `history_alokasi`
--

CREATE TABLE `history_alokasi` (
  `id` int NOT NULL,
  `barang_id` int NOT NULL,
  `cabang_id` int NOT NULL,
  `gedung_id` int NOT NULL,
  `lantai_id` int NOT NULL,
  `ruangan_id` int NOT NULL,
  `user_id` int NOT NULL,
  `tanggal_alokasi` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `history_alokasi`
--

INSERT INTO `history_alokasi` (`id`, `barang_id`, `cabang_id`, `gedung_id`, `lantai_id`, `ruangan_id`, `user_id`, `tanggal_alokasi`) VALUES
(2, 1, 1, 1, 1, 1, 1, '2025-03-20 12:58:16'),
(3, 1, 1, 2, 2, 2, 1, '2025-03-20 13:08:22'),
(4, 1, 1, 1, 1, 3, 2, '2025-03-20 15:50:57'),
(5, 1, 1, 1, 1, 1, 2, '2025-03-20 16:14:34'),
(6, 2, 1, 1, 2, 3, 1, '2025-03-20 16:20:20');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_barang`
--

CREATE TABLE `kategori_barang` (
  `id` int NOT NULL,
  `nama` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kategori_barang`
--

INSERT INTO `kategori_barang` (`id`, `nama`, `created_at`) VALUES
(1, 'Furniture', '2025-03-20 13:52:04'),
(2, 'Elektronik', '2025-03-20 13:52:04'),
(3, 'ATK', '2025-03-20 13:52:04');

-- --------------------------------------------------------

--
-- Table structure for table `lantai`
--

CREATE TABLE `lantai` (
  `id` int NOT NULL,
  `cabang_id` int NOT NULL,
  `gedung_id` int NOT NULL,
  `nama` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `lantai`
--

INSERT INTO `lantai` (`id`, `cabang_id`, `gedung_id`, `nama`, `created_at`) VALUES
(1, 1, 1, 'Lantai 1', '2025-03-20 13:52:04'),
(2, 1, 1, 'Lantai 2', '2025-03-20 13:52:04'),
(3, 1, 2, 'Lantai 1', '2025-03-20 13:52:04'),
(6, 4, 5, 'Lantai 1', '2025-03-20 23:25:02');

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `id` int NOT NULL,
  `cabang_id` int NOT NULL,
  `gedung_id` int NOT NULL,
  `lantai_id` int NOT NULL,
  `nama` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`id`, `cabang_id`, `gedung_id`, `lantai_id`, `nama`, `created_at`) VALUES
(1, 1, 1, 1, 'Ruang Meeting', '2025-03-20 13:52:04'),
(2, 1, 1, 1, 'Ruang IT', '2025-03-20 13:52:04'),
(3, 1, 1, 2, 'Ruang HR', '2025-03-20 13:52:04'),
(5, 4, 5, 6, 'Lobby', '2025-03-20 23:25:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('Super Admin','Admin Cabang') NOT NULL,
  `cabang_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`, `role`, `cabang_id`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'admin@example.com', '$2a$12$JkgGU3kpym5.S1OLNCByHOBVyrdCD9PF8fl07z9R4s28YB.LJDK06', 'Super Admin', NULL, '2025-03-20 13:52:04', '2025-03-20 13:53:26'),
(2, 'Admin Jakarta', 'admin_jakarta@example.com', '$2a$12$ClKvGjz81s8Br7TABx3T4Om1yxzhG/MCkPZO7lVZIzzan2dFn1D4W', 'Admin Cabang', 1, '2025-03-20 13:52:04', '2025-03-20 13:53:37'),
(3, 'Admin Surabaya', 'admin_surabaya@example.com', '$2a$12$zk8W/izlt/CwKCFrEhQcgusuy9O1BVP0Exq2T.AduYR3.gOgvJoyi', 'Admin Cabang', 2, '2025-03-20 13:52:04', '2025-03-20 13:53:48'),
(4, 'Ujang', 'ujang@example.com', '$2y$10$cN8kQLT1Te6I6oBfTiurU.AlwlwfMmvFQtRj8fNdo7MbSpjDEE7cS', 'Admin Cabang', 4, '2025-03-20 21:42:36', '2025-03-20 21:42:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alokasi_barang`
--
ALTER TABLE `alokasi_barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barang_id` (`barang_id`),
  ADD KEY `cabang_id` (`cabang_id`),
  ADD KEY `gedung_id` (`gedung_id`),
  ADD KEY `lantai_id` (`lantai_id`),
  ADD KEY `ruangan_id` (`ruangan_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indexes for table `cabang`
--
ALTER TABLE `cabang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gedung`
--
ALTER TABLE `gedung`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cabang_id` (`cabang_id`);

--
-- Indexes for table `history_alokasi`
--
ALTER TABLE `history_alokasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barang_id` (`barang_id`),
  ADD KEY `cabang_id` (`cabang_id`),
  ADD KEY `gedung_id` (`gedung_id`),
  ADD KEY `lantai_id` (`lantai_id`),
  ADD KEY `ruangan_id` (`ruangan_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `kategori_barang`
--
ALTER TABLE `kategori_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lantai`
--
ALTER TABLE `lantai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gedung_id` (`gedung_id`),
  ADD KEY `lantai_ibfk_2` (`cabang_id`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lantai_id` (`lantai_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alokasi_barang`
--
ALTER TABLE `alokasi_barang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cabang`
--
ALTER TABLE `cabang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gedung`
--
ALTER TABLE `gedung`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `history_alokasi`
--
ALTER TABLE `history_alokasi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kategori_barang`
--
ALTER TABLE `kategori_barang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lantai`
--
ALTER TABLE `lantai`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alokasi_barang`
--
ALTER TABLE `alokasi_barang`
  ADD CONSTRAINT `alokasi_barang_ibfk_1` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `alokasi_barang_ibfk_2` FOREIGN KEY (`cabang_id`) REFERENCES `cabang` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `alokasi_barang_ibfk_3` FOREIGN KEY (`gedung_id`) REFERENCES `gedung` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `alokasi_barang_ibfk_4` FOREIGN KEY (`lantai_id`) REFERENCES `lantai` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `alokasi_barang_ibfk_5` FOREIGN KEY (`ruangan_id`) REFERENCES `ruangan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `alokasi_barang_ibfk_6` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategori_barang` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `gedung`
--
ALTER TABLE `gedung`
  ADD CONSTRAINT `gedung_ibfk_1` FOREIGN KEY (`cabang_id`) REFERENCES `cabang` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `history_alokasi`
--
ALTER TABLE `history_alokasi`
  ADD CONSTRAINT `history_alokasi_ibfk_1` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `history_alokasi_ibfk_2` FOREIGN KEY (`cabang_id`) REFERENCES `cabang` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `history_alokasi_ibfk_3` FOREIGN KEY (`gedung_id`) REFERENCES `gedung` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `history_alokasi_ibfk_4` FOREIGN KEY (`lantai_id`) REFERENCES `lantai` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `history_alokasi_ibfk_5` FOREIGN KEY (`ruangan_id`) REFERENCES `ruangan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `history_alokasi_ibfk_6` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `lantai`
--
ALTER TABLE `lantai`
  ADD CONSTRAINT `lantai_ibfk_1` FOREIGN KEY (`gedung_id`) REFERENCES `gedung` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lantai_ibfk_2` FOREIGN KEY (`cabang_id`) REFERENCES `cabang` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Constraints for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD CONSTRAINT `ruangan_ibfk_1` FOREIGN KEY (`lantai_id`) REFERENCES `lantai` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
