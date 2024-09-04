-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 03, 2024 at 12:29 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penjualan_obat`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_pembelian`
--

CREATE TABLE `detail_pembelian` (
  `id_detail_pembelian` int(7) NOT NULL,
  `kode_pembelian` varchar(7) NOT NULL,
  `kode_obat` varchar(7) NOT NULL,
  `jumlah` int(7) NOT NULL,
  `harga_satuan` decimal(10,0) NOT NULL,
  `subtotal` decimal(10,0) NOT NULL,
  `total_pembelian` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(7) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `deksripsi` text NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `laporan_omset`
--

CREATE TABLE `laporan_omset` (
  `id_laporan` int(7) NOT NULL,
  `kode_penjualan` varchar(7) NOT NULL,
  `kode_pembelian` varchar(7) NOT NULL,
  `tanggal_laporan` date NOT NULL,
  `total_penjualan` decimal(10,2) NOT NULL,
  `total_pembelian` decimal(10,2) NOT NULL,
  `total_keuntungan` decimal(10,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laporan_omset`
--

INSERT INTO `laporan_omset` (`id_laporan`, `kode_penjualan`, `kode_pembelian`, `tanggal_laporan`, `total_penjualan`, `total_pembelian`, `total_keuntungan`) VALUES
(1, 'KDJL001', 'KDBL001', '2024-08-15', '0.00', '0.00', '0.000');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_08_30_034543_add_updated_at_to_pembelian_obat_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id_obat` int(20) NOT NULL,
  `kode_suplier` varchar(7) NOT NULL,
  `kode_obat` varchar(7) NOT NULL,
  `nama_obat` varchar(255) NOT NULL,
  `harga_obat` decimal(65,0) NOT NULL,
  `jumlah_obat` int(255) NOT NULL,
  `Satuan` varchar(15) NOT NULL,
  `total_harga_obat` decimal(10,0) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id_obat`, `kode_suplier`, `kode_obat`, `nama_obat`, `harga_obat`, `jumlah_obat`, `Satuan`, `total_harga_obat`, `create_at`, `update_at`) VALUES
(6, 'SP006', 'ANTGN01', 'Antangin', '2000', 20, 'Sachet', '40000', '2024-08-31 12:49:10', '0000-00-00 00:00:00'),
(3, 'SP003', 'BDX01', 'Bodrex Extra', '7000', 10, 'Strip', '70000', '2024-08-31 12:49:10', '0000-00-00 00:00:00'),
(9, 'SP009', 'INZ001', 'Inzana', '10000', 10, 'Strip', '100000', '2024-08-31 12:49:10', '0000-00-00 00:00:00'),
(7, 'SP007', 'KNMX01', 'Konimax', '5000', 12, 'Strip', '60000', '2024-08-31 12:49:10', '0000-00-00 00:00:00'),
(4, 'SP004', 'MXG01', 'Mixagrip', '5000', 5, 'Strip', '25000', '2024-08-31 12:49:10', '0000-00-00 00:00:00'),
(8, 'SP008', 'NZP01', 'Neozep', '3000', 10, 'Strip', '30000', '2024-08-31 12:49:10', '0000-00-00 00:00:00'),
(2, 'SP002', 'PCMX01', 'Paramex', '12000', 10, 'Strip', '120000', '2024-08-31 12:49:10', '0000-00-00 00:00:00'),
(1, 'SP001', 'PCTML01', 'Paracetamol', '10000', 3, 'Strip', '30000', '2024-08-31 12:49:10', '0000-00-00 00:00:00'),
(10, 'SP010', 'PND01', 'Panadol', '5000', 15, 'Strip', '75000', '2024-08-31 12:49:10', '0000-00-00 00:00:00'),
(5, 'SP005', 'PRMG01', 'Promag', '10000', 11, 'Strip', '110000', '2024-08-31 12:49:10', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` int(20) NOT NULL,
  `nama_pasien` varchar(255) NOT NULL,
  `jenis_kelamin` enum('pria','wanita') NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `nomor_telepon` varchar(13) NOT NULL,
  `alamat` text NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `nama_pasien`, `jenis_kelamin`, `tanggal_lahir`, `nomor_telepon`, `alamat`, `create_at`, `update_at`) VALUES
(1, 'Nindia Nur', 'pria', '2007-08-08', '087535635', 'Gang Sawo\r\n', '2024-09-03 10:21:48', '0000-00-00 00:00:00'),
(2, 'Karina', 'wanita', '2007-02-21', '08493635343', 'Cirebon', '2024-09-03 10:22:04', '0000-00-00 00:00:00'),
(3, 'Ijan\r\n', 'pria', '2006-07-20', '0898327737', 'Bimasakti', '2024-09-03 10:22:17', '0000-00-00 00:00:00'),
(5, 'Edward', 'pria', '2006-03-03', '089883534', 'Cileungsi', '2024-09-03 10:22:28', '0000-00-00 00:00:00'),
(6, 'Debby', 'pria', '2000-01-11', '087438743870', 'Karanggan', '2024-09-03 10:22:41', '0000-00-00 00:00:00'),
(7, 'Timun', 'pria', '1995-11-04', '08983623733', 'Citeureup', '2024-09-03 10:23:02', '0000-00-00 00:00:00'),
(8, 'Manda', 'pria', '2006-11-20', '087463834675', 'Cawang', '2024-09-03 10:23:22', '0000-00-00 00:00:00'),
(9, 'Nando', 'pria', '1999-05-20', '08532537375', 'Bengkulu', '2024-09-03 10:23:33', '0000-00-00 00:00:00'),
(10, 'Kevin', 'pria', '2005-03-14', '082898786858', 'Manggarai', '2024-09-03 10:23:59', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_obat`
--

CREATE TABLE `pembelian_obat` (
  `id_pembelian` int(7) NOT NULL,
  `kode_pembelian` varchar(7) NOT NULL,
  `kode_suplier` varchar(7) NOT NULL,
  `total_pembelian` decimal(10,0) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembelian_obat`
--

INSERT INTO `pembelian_obat` (`id_pembelian`, `kode_pembelian`, `kode_suplier`, `total_pembelian`, `create_at`, `update_at`) VALUES
(1, 'KDBL001', 'SP001', '0', '2024-09-01 14:18:35', '2024-09-01 14:18:35');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan_obat`
--

CREATE TABLE `penjualan_obat` (
  `id_penjualan` int(20) NOT NULL,
  `kode_penjualan` varchar(7) NOT NULL,
  `kode_obat` varchar(7) NOT NULL,
  `id_pasien` int(7) NOT NULL,
  `jumlah` int(20) NOT NULL,
  `total_harga_penjualan` decimal(10,2) NOT NULL,
  `tanggal_penjualan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penjualan_obat`
--

INSERT INTO `penjualan_obat` (`id_penjualan`, `kode_penjualan`, `kode_obat`, `id_pasien`, `jumlah`, `total_harga_penjualan`, `tanggal_penjualan`) VALUES
(1, 'KDJL001', 'PCTML01', 1, 1, '10000.00', '0000-00-00'),
(2, 'KDJL002', 'PCMX01', 2, 1, '0.00', '2024-08-16'),
(3, 'KDJL003', 'BDX01', 3, 2, '0.00', '2024-08-16'),
(4, 'KDJL004', 'MXG01', 5, 1, '0.00', '2024-08-16'),
(5, 'KDJL005', 'PRMG01', 6, 1, '0.00', '2024-08-16'),
(6, 'KDJL006', 'ANTGN01', 7, 1, '0.00', '2024-08-16'),
(7, 'KDJL007', 'KNMX01', 8, 2, '0.00', '2024-08-16'),
(8, 'KDJL008', 'NZP01', 9, 1, '0.00', '2024-08-16'),
(9, 'KDJL009', 'INZ001', 10, 1, '0.00', '2024-08-16'),
(10, 'KDJL010', 'PND01', 10, 1, '0.00', '2024-08-16');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stock_opname`
--

CREATE TABLE `stock_opname` (
  `id_opname` int(20) NOT NULL,
  `kode_obat` varchar(7) NOT NULL,
  `jumlah_sistem` int(11) NOT NULL,
  `jumlah_fisik` int(11) NOT NULL,
  `minus` int(20) NOT NULL,
  `harga_obat` decimal(10,2) NOT NULL,
  `total_kerugian` decimal(10,2) NOT NULL,
  `tanggal_opname` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stock_opname`
--

INSERT INTO `stock_opname` (`id_opname`, `kode_obat`, `jumlah_sistem`, `jumlah_fisik`, `minus`, `harga_obat`, `total_kerugian`, `tanggal_opname`) VALUES
(1, 'PCTML01', 0, 0, 0, '0.00', '0.00', '2024-08-15'),
(2, 'PCMX01', 10, 0, 0, '12000.00', '0.00', '2024-08-28');

-- --------------------------------------------------------

--
-- Table structure for table `suplier`
--

CREATE TABLE `suplier` (
  `id_suplier` int(20) NOT NULL,
  `kode_suplier` varchar(7) NOT NULL,
  `nama_suplier` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `nomor_telepon` varchar(13) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suplier`
--

INSERT INTO `suplier` (`id_suplier`, `kode_suplier`, `nama_suplier`, `alamat`, `nomor_telepon`, `create_at`, `update_at`) VALUES
(1, 'SP001', 'Kimia Farma', 'Cawang', '0897878544', '2024-08-31 16:09:06', '0000-00-00 00:00:00'),
(2, 'SP002', 'Chemicals ', 'Gunungputri Utara', '09874354534', '2024-08-31 16:09:06', '0000-00-00 00:00:00'),
(4, 'SP003', 'Man Farmasi', 'Gang Sawo', '08362563798', '2024-08-31 16:09:06', '0000-00-00 00:00:00'),
(5, 'SP004', 'Kevarma', 'Tlajung Udik', '0873864354', '2024-08-31 16:09:06', '0000-00-00 00:00:00'),
(6, 'SP005', 'PharmaLink', 'Cagak', '08765436483', '2024-08-31 16:09:06', '0000-00-00 00:00:00'),
(7, 'SP006', 'Anugrah Medika\r\n', 'Kranggan', '08665372376', '2024-08-31 16:09:06', '0000-00-00 00:00:00'),
(8, 'SP007', 'Sehat Farma\r\n', 'Cibaduyut', '0873645345', '2024-08-31 16:09:06', '0000-00-00 00:00:00'),
(9, 'SP008', 'Nusantara Medis\r\n', 'Nambo', '08769237837', '2024-08-31 16:09:06', '0000-00-00 00:00:00'),
(10, 'SP009', 'Prima Apotek', 'Cibinong', '0865634584', '2024-08-31 16:09:06', '0000-00-00 00:00:00'),
(11, 'SP010', 'Harapan Medika', 'Pasar Minggu', '08957829483', '2024-08-31 16:09:06', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'dzaky', 'dzakyputrafardian@gmail.com', NULL, '$2y$10$91vmxGElSPL.ZdOYiAtvH.ETAL9guyASlHFSjevZL.kmhIojnPKQ.', NULL, '2024-08-15 20:16:34', '2024-08-15 20:16:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  ADD PRIMARY KEY (`id_detail_pembelian`),
  ADD UNIQUE KEY `kode_pembelian` (`kode_pembelian`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `laporan_omset`
--
ALTER TABLE `laporan_omset`
  ADD PRIMARY KEY (`id_laporan`),
  ADD UNIQUE KEY `kode_pembelian` (`kode_pembelian`),
  ADD UNIQUE KEY `kode_penjualan` (`kode_penjualan`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`kode_obat`),
  ADD UNIQUE KEY `id_obat` (`id_obat`),
  ADD UNIQUE KEY `kode_suplier` (`kode_suplier`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pembelian_obat`
--
ALTER TABLE `pembelian_obat`
  ADD PRIMARY KEY (`kode_pembelian`),
  ADD UNIQUE KEY `id_pembelian` (`id_pembelian`,`kode_suplier`);

--
-- Indexes for table `penjualan_obat`
--
ALTER TABLE `penjualan_obat`
  ADD PRIMARY KEY (`kode_penjualan`),
  ADD UNIQUE KEY `id_penjualan` (`id_penjualan`),
  ADD UNIQUE KEY `kode_obat` (`kode_obat`,`id_pasien`),
  ADD KEY `id_pasien` (`id_pasien`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `stock_opname`
--
ALTER TABLE `stock_opname`
  ADD PRIMARY KEY (`id_opname`),
  ADD UNIQUE KEY `kode_obat` (`kode_obat`);

--
-- Indexes for table `suplier`
--
ALTER TABLE `suplier`
  ADD PRIMARY KEY (`kode_suplier`),
  ADD UNIQUE KEY `id_suplier` (`id_suplier`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  MODIFY `id_detail_pembelian` int(7) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(7) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laporan_omset`
--
ALTER TABLE `laporan_omset`
  MODIFY `id_laporan` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pembelian_obat`
--
ALTER TABLE `pembelian_obat`
  MODIFY `id_pembelian` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `penjualan_obat`
--
ALTER TABLE `penjualan_obat`
  MODIFY `id_penjualan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stock_opname`
--
ALTER TABLE `stock_opname`
  MODIFY `id_opname` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `suplier`
--
ALTER TABLE `suplier`
  MODIFY `id_suplier` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
