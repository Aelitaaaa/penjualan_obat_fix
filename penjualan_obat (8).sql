-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2024 at 05:13 AM
-- Server version: 10.4.28-MariaDB
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
  `kode_pembelian` varchar(8) NOT NULL,
  `kode_obat` varchar(7) NOT NULL,
  `jumlah` int(7) NOT NULL,
  `harga_satuan` decimal(10,0) NOT NULL,
  `subtotal` decimal(10,0) NOT NULL,
  `total_pembelian` decimal(10,0) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_pembelian`
--

INSERT INTO `detail_pembelian` (`id_detail_pembelian`, `kode_pembelian`, `kode_obat`, `jumlah`, `harga_satuan`, `subtotal`, `total_pembelian`, `created_at`, `updated_at`) VALUES
(18, 'KDBL009', 'KNDN01', 12, '10000', '120000', NULL, '2024-09-09 17:00:00', '2024-09-09 19:18:44'),
(19, 'KDBL009', 'KNDN01', 1, '10000', '10000', NULL, '2024-09-09 17:00:00', '2024-09-09 19:43:59'),
(24, 'KD13', 'BDX01', 1, '7000', '7000', NULL, '2024-09-09 17:00:00', '2024-09-10 17:48:51'),
(25, 'KD12', 'BDX01', 3, '7000', '21000', NULL, '2024-09-09 17:00:00', '2024-09-10 08:39:29'),
(45, 'KDBL0002', 'NND001', 10, '15000', '150000', NULL, '2024-10-03 13:49:04', '2024-10-03 13:49:04');

-- --------------------------------------------------------

--
-- Table structure for table `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `id_detail_penjualan` int(7) NOT NULL,
  `kode_penjualan` varchar(7) NOT NULL,
  `kode_obat` varchar(7) NOT NULL,
  `jumlah` int(7) NOT NULL,
  `harga_satuan` decimal(10,2) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `total_penjualan` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detail_resep`
--

CREATE TABLE `detail_resep` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_resep` char(10) NOT NULL,
  `kode_obat` varchar(7) NOT NULL,
  `jumlah_obat` int(11) NOT NULL,
  `dosis` varchar(255) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `harga_satuan` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dokters`
--

CREATE TABLE `dokters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis` enum('umum','spesialis') DEFAULT NULL,
  `spesialis` varchar(50) DEFAULT NULL,
  `telp` varchar(15) NOT NULL,
  `tarif` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dokters`
--

INSERT INTO `dokters` (`id`, `nama`, `jenis`, `spesialis`, `telp`, `tarif`, `created_at`, `updated_at`) VALUES
(1, 'Riva', 'umum', NULL, '1231234', 100000, '2024-10-09 03:14:25', '2024-10-09 03:14:25'),
(2, 'dzaky', 'spesialis', 'THT', '0112', 12141, '2024-10-10 07:30:21', '2024-10-10 07:30:21');

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
-- Table structure for table `jadwals`
--

CREATE TABLE `jadwals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_dokter` bigint(20) UNSIGNED NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jadwals`
--

INSERT INTO `jadwals` (`id`, `id_dokter`, `id_pasien`, `tanggal`, `waktu`, `created_at`, `updated_at`) VALUES
(4, 2, 2, '2024-10-11', '15:25:00', '2024-10-10 08:25:43', '2024-10-10 08:25:43'),
(7, 2, 9, '2024-10-30', '15:44:00', '2024-10-10 08:41:04', '2024-10-10 08:41:04'),
(9, 2, 2, '2024-09-30', '00:00:00', '2024-10-11 03:10:36', '2024-10-11 03:10:36');

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
(5, '2024_08_30_034543_add_updated_at_to_pembelian_obat_table', 2),
(6, '2024_09_01_190235_create_obat_table', 3),
(8, '2024_09_05_071640_create_rekam_medis_table', 3),
(10, '2024_09_18_091350_create_jadwals_table', 5),
(12, '2014_10_12_000000_create_users_table', 6),
(13, '2014_10_12_100000_create_password_resets_table', 6),
(14, '2019_08_19_000000_create_failed_jobs_table', 6),
(15, '2019_12_14_000001_create_personal_access_tokens_table', 6),
(16, '2024_08_30_034543_add_updated_at_to_pembelian_obat_table', 6),
(17, '2024_09_01_190235_create_obat_table', 6),
(21, '2024_09_05_071640_create_rekam_medis_table', 7),
(22, '2024_09_12_083452_create_resep_table', 7),
(24, '2024_09_18_095737_jadwals', 8),
(27, '2024_09_23_091230_new_pembayaran', 9),
(28, '2024_10_02_090517_create_detail_resep_table', 10),
(30, '2024_09_05_070723_create_dokters_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id_obat` int(20) NOT NULL,
  `kode_suplier` varchar(7) NOT NULL,
  `kode_obat` varchar(7) NOT NULL,
  `nama_obat` varchar(255) NOT NULL,
  `harga_beli` decimal(10,2) NOT NULL,
  `harga_jual` decimal(10,2) NOT NULL,
  `jumlah_obat` int(255) NOT NULL,
  `unit` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id_obat`, `kode_suplier`, `kode_obat`, `nama_obat`, `harga_beli`, `harga_jual`, `jumlah_obat`, `unit`, `created_at`, `updated_at`) VALUES
(15, 'SP013', 'ANTGN02', 'Antangin', '12000.00', '20000.00', 50, 'Sachet', '2024-09-09 17:00:00', '2024-09-25 03:52:38'),
(14, 'SP0002', 'KNDN01', 'Konidin', '12.00', '15.00', 20, 'Botol', '2024-09-03 17:00:00', '2024-10-02 02:46:22'),
(23, 'SP0005', 'KNMX002', 'Konimex', '12.00', '15.00', 0, 'Strip', '2024-09-23 06:37:28', '2024-09-25 06:44:24'),
(24, 'SP0026', 'KNMX003', 'Kontrexin', '12.00', '15.00', 20, 'Strip', '2024-09-25 04:11:31', '2024-10-09 04:13:33'),
(22, 'SP014', 'KNTX02', 'Kontrexin Isi 20', '10000.00', '15000.00', 10, 'Strip', '2024-09-20 06:16:06', '2024-09-20 06:16:06'),
(4, 'SP0011', 'MXG01', 'Mixagrip', '3000.00', '5000.00', 2, 'Strip', '2024-08-30 17:00:00', '2024-10-11 03:09:07'),
(18, 'SP013', 'NND001', 'Nindi', '15000.00', '20000.00', 11, 'Strip', '2024-09-09 17:00:00', '2024-10-03 13:49:04'),
(8, 'SP0023', 'NZP01', 'Neozep', '20.00', '23.00', 10, 'Strip', '2024-09-08 17:00:00', '2024-09-25 06:45:16'),
(2, 'SP014', 'PCMX01', 'Paramex', '10.00', '12.00', 10, 'Strip', '2024-08-30 17:00:00', '2024-09-25 06:45:27');

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
  `keluhan` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `nama_pasien`, `jenis_kelamin`, `tanggal_lahir`, `nomor_telepon`, `alamat`, `keluhan`, `created_at`, `updated_at`) VALUES
(2, 'Karinaa', 'wanita', '2007-02-21', '08493635343', 'Cirebon', 'cakit kepala', '2024-09-30 02:53:47', '2024-09-30 02:53:47'),
(3, 'Ijan\r\n', 'pria', '2006-07-20', '0898327737', 'Bimasakti', 'Telingan congek', '2024-09-19 08:49:22', '0000-00-00 00:00:00'),
(5, 'Edward', 'pria', '2006-03-03', '089883534', 'Cileungsi', 'Kesurupan', '2024-09-19 08:49:28', '0000-00-00 00:00:00'),
(6, 'Debby', 'pria', '2000-01-11', '087438743870', 'Karanggan', 'mabok air cebok', '2024-09-19 08:49:42', '0000-00-00 00:00:00'),
(7, 'Timun', 'pria', '1995-11-04', '08983623733', 'Citeureup', 'Bibir merah merona', '2024-09-19 08:50:07', '0000-00-00 00:00:00'),
(8, 'Manda', 'pria', '2006-11-20', '087463834675', 'Cawang', 'Tenggorokan nyangkut ', '2024-09-19 08:50:18', '0000-00-00 00:00:00'),
(9, 'Nando', 'pria', '1999-05-20', '08532537375', 'Bengkulu', '', '2024-09-03 10:23:33', '0000-00-00 00:00:00'),
(10, 'Kevin', 'pria', '2005-03-14', '082898786858', 'Manggarai', '', '2024-09-03 10:23:59', '0000-00-00 00:00:00'),
(11, 'Kevin lagi', 'pria', '2006-09-01', '08973872238', 'Surabaya', '', '2024-09-04 02:44:27', '0000-00-00 00:00:00'),
(12, 'Ronaldo', 'pria', '2005-09-23', '0894387348', 'bayyy', '', '2024-09-04 02:44:27', '0000-00-00 00:00:00'),
(13, 'Amandaaa', 'pria', '2009-01-12', '08794349', 'Golf', '', '2024-09-04 09:26:01', '2024-09-04 09:26:01'),
(14, 'Amandaaa', 'wanita', '2005-09-08', '085645645', 'rf', '', '2024-09-04 09:26:27', '2024-09-04 09:26:27');

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
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_resep` char(10) NOT NULL,
  `biaya_dokter` decimal(15,2) NOT NULL,
  `biaya_obat` decimal(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_obat`
--

CREATE TABLE `pembelian_obat` (
  `id_pembelian` int(7) NOT NULL,
  `kode_pembelian` varchar(8) NOT NULL,
  `kode_suplier` varchar(7) NOT NULL,
  `total_pembelian` decimal(10,0) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembelian_obat`
--

INSERT INTO `pembelian_obat` (`id_pembelian`, `kode_pembelian`, `kode_suplier`, `total_pembelian`, `created_at`, `updated_at`) VALUES
(33, 'KDBL0002', 'SP013', '150000', '2024-09-25 06:47:08', '2024-10-03 13:49:04');

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
-- Table structure for table `rekam_medis`
--

CREATE TABLE `rekam_medis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `id_dokter` bigint(20) UNSIGNED NOT NULL,
  `diagnosis` text NOT NULL,
  `tindakan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `resep`
--

CREATE TABLE `resep` (
  `kode_resep` char(10) NOT NULL,
  `nama_resep` varchar(255) NOT NULL,
  `daftar_obat` text NOT NULL,
  `id_rekam_medis` bigint(20) UNSIGNED NOT NULL,
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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suplier`
--

INSERT INTO `suplier` (`id_suplier`, `kode_suplier`, `nama_suplier`, `alamat`, `nomor_telepon`, `created_at`, `updated_at`) VALUES
(2, 'SP0002', 'Chemicals', 'Gunungputri Utara', '088743545300', '2024-08-31 16:09:06', '2024-09-25 03:40:25'),
(4, 'SP0003', 'Man Farmasi', 'Gang Sawo', '08362563798', '2024-08-31 16:09:06', '2024-09-25 02:05:50'),
(5, 'SP0004', 'Kevarma', 'Tlajung Udik', '0873864354', '2024-08-31 16:09:06', '2024-09-25 02:05:57'),
(6, 'SP0005', 'PharmaLink', 'Cagak', '08765436483', '2024-08-31 16:09:06', '2024-09-25 02:06:09'),
(7, 'SP0006', 'Anugrah Medika', 'Kranggan', '08665372376', '2024-08-31 16:09:06', '2024-09-25 02:06:17'),
(8, 'SP0007', 'Sehat Farma', 'Cibaduyut', '0873645345', '2024-08-31 16:09:06', '2024-09-25 02:06:35'),
(9, 'SP0008', 'Nusantara Medis', 'Nambo', '08769237837', '2024-08-31 16:09:06', '2024-09-25 02:06:46'),
(10, 'SP0009', 'Prima Apotek', 'Cibinong', '0865634584', '2024-08-31 16:09:06', '2024-09-25 02:06:59'),
(11, 'SP0010', 'Harapan Medika', 'Pasar Minggu', '08957829483', '2024-08-31 16:09:06', '2024-09-25 02:07:19'),
(12, 'SP0011', 'Kevmistry', 'CIbinong', '08966545', '2024-09-04 06:34:27', '2024-09-25 02:07:36'),
(19, 'SP0020', 'jjjj', 'eeee', '90239309', '2024-09-10 19:03:11', '2024-09-25 02:07:07'),
(22, 'SP0022', 'HIX', 'EHWDJKN', '0843934736', '2024-09-25 02:21:38', '2024-09-25 02:21:38'),
(23, 'SP0023', 'PT MY', 'Hai disiin', '0895337289080', '2024-09-25 02:52:07', '2024-09-25 02:52:07'),
(24, 'SP0024', 'oi2iewoi', 'ijwoiw', '0895337200', '2024-09-25 03:07:13', '2024-09-25 03:07:13'),
(25, 'SP0025', 'Mineral', 'DIsini ajaa', '08932798637', '2024-10-04 06:48:14', '2024-10-04 06:49:03'),
(26, 'SP0026', 'helloww', 'Baybay', '08393872800', '2024-10-07 03:18:03', '2024-10-07 03:18:03'),
(27, 'SP0027', 'ioioio', 'jkbhbjn', '0889790989889', '2024-10-11 02:39:48', '2024-10-11 02:39:48'),
(28, 'SP0028', 'allamakk', 'allamakkkkk', '0898767898778', '2024-10-11 02:57:57', '2024-10-11 02:58:37'),
(14, 'SP013', 'SourGrapes', 'Ciwidey', '089832872', '2024-09-04 09:07:15', '2024-09-04 09:07:15'),
(18, 'SP014', 'Dayum', 'Didieu', '089378734', '2024-09-10 10:19:18', '2024-09-10 10:19:18'),
(20, 'SP021', 'ejwjnew', 'wjnejew', '0843983493', '2024-09-11 02:06:35', '2024-10-04 06:48:31');

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
  ADD PRIMARY KEY (`id_detail_pembelian`);

--
-- Indexes for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD PRIMARY KEY (`id_detail_penjualan`),
  ADD UNIQUE KEY `kode_penjualan` (`kode_penjualan`,`kode_obat`);

--
-- Indexes for table `detail_resep`
--
ALTER TABLE `detail_resep`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dokters`
--
ALTER TABLE `dokters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dokters_telp_unique` (`telp`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jadwals`
--
ALTER TABLE `jadwals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jadwals_id_dokter_foreign` (`id_dokter`),
  ADD KEY `jadwals_id_pasien_foreign` (`id_pasien`);

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
  ADD UNIQUE KEY `id_obat` (`id_obat`);

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
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pembayaran_kode_resep_foreign` (`kode_resep`);

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
-- Indexes for table `rekam_medis`
--
ALTER TABLE `rekam_medis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rekam_medis_id_pasien_foreign` (`id_pasien`),
  ADD KEY `rekam_medis_id_dokter_foreign` (`id_dokter`);

--
-- Indexes for table `resep`
--
ALTER TABLE `resep`
  ADD PRIMARY KEY (`kode_resep`),
  ADD KEY `resep_id_rekam_medis_foreign` (`id_rekam_medis`);

--
-- Indexes for table `stock_opname`
--
ALTER TABLE `stock_opname`
  ADD PRIMARY KEY (`id_opname`);

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
  MODIFY `id_detail_pembelian` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `detail_resep`
--
ALTER TABLE `detail_resep`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dokters`
--
ALTER TABLE `dokters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jadwals`
--
ALTER TABLE `jadwals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembelian_obat`
--
ALTER TABLE `pembelian_obat`
  MODIFY `id_pembelian` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

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
-- AUTO_INCREMENT for table `rekam_medis`
--
ALTER TABLE `rekam_medis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stock_opname`
--
ALTER TABLE `stock_opname`
  MODIFY `id_opname` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `suplier`
--
ALTER TABLE `suplier`
  MODIFY `id_suplier` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwals`
--
ALTER TABLE `jadwals`
  ADD CONSTRAINT `jadwals_id_dokter_foreign` FOREIGN KEY (`id_dokter`) REFERENCES `dokters` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jadwals_id_pasien_foreign` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`) ON DELETE CASCADE;

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_kode_resep_foreign` FOREIGN KEY (`kode_resep`) REFERENCES `resep` (`kode_resep`) ON DELETE CASCADE;

--
-- Constraints for table `rekam_medis`
--
ALTER TABLE `rekam_medis`
  ADD CONSTRAINT `rekam_medis_id_dokter_foreign` FOREIGN KEY (`id_dokter`) REFERENCES `dokters` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rekam_medis_id_pasien_foreign` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`) ON DELETE CASCADE;

--
-- Constraints for table `resep`
--
ALTER TABLE `resep`
  ADD CONSTRAINT `resep_id_rekam_medis_foreign` FOREIGN KEY (`id_rekam_medis`) REFERENCES `rekam_medis` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
