-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Agu 2024 pada 05.13
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 7.4.4

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
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `laporan_omset`
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
-- Dumping data untuk tabel `laporan_omset`
--

INSERT INTO `laporan_omset` (`id_laporan`, `kode_penjualan`, `kode_pembelian`, `tanggal_laporan`, `total_penjualan`, `total_pembelian`, `total_keuntungan`) VALUES
(1, 'KDJL001', 'KDBL001', '2024-08-15', 0.00, 0.00, 0.000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `id_obat` int(20) NOT NULL,
  `kode_suplier` varchar(7) NOT NULL,
  `kode_obat` varchar(7) NOT NULL,
  `nama_obat` varchar(255) NOT NULL,
  `harga_obat` decimal(65,0) NOT NULL,
  `jumlah_obat` int(255) NOT NULL,
  `Satuan` varchar(15) NOT NULL,
  `total_harga_obat` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`id_obat`, `kode_suplier`, `kode_obat`, `nama_obat`, `harga_obat`, `jumlah_obat`, `Satuan`, `total_harga_obat`) VALUES
(6, 'SP006', 'ANTGN01', 'Antangin', 2000, 20, 'Sachet', 40000.00),
(3, 'SP003', 'BDX01', 'Bodrex Extra', 7000, 10, 'Strip', 70000.00),
(9, 'SP009', 'INZ001', 'Inzana', 10000, 10, 'Strip', 100000.00),
(7, 'SP007', 'KNMX01', 'Konimax', 5000, 12, 'Strip', 60000.00),
(4, 'SP004', 'MXG01', 'Mixagrip', 5000, 5, 'Strip', 25000.00),
(8, 'SP008', 'NZP01', 'Neozep', 3000, 10, 'Strip', 30000.00),
(2, 'SP002', 'PCMX01', 'Paramex', 12000, 10, 'Strip', 120000.00),
(1, 'SP001', 'PCTML01', 'Paracetamol', 10000, 3, 'Strip', 30000.00),
(10, 'SP010', 'PND01', 'Panadol', 5000, 15, 'Strip', 75000.00),
(5, 'SP005', 'PRMG01', 'Promag', 10000, 11, 'Strip', 110000.00);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` int(20) NOT NULL,
  `nama_pasien` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `nomor_telepon` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `nama_pasien`, `alamat`, `tanggal_lahir`, `nomor_telepon`) VALUES
(1, 'Nindia Nur', 'Cicadas', '2007-08-08', '087535635'),
(2, 'Karina', 'Kota Bogor', '2007-02-21', '08493635343'),
(3, 'Ijan\r\n', 'Bogor', '2006-07-20', '0898327737'),
(5, 'Edward', 'Kedep', '2006-03-03', '089883534'),
(6, 'Debby', 'Jln. Soekarno-Hatta', '2000-01-11', '087438743870'),
(7, 'Timun', 'Gang Sawo', '1995-11-04', '08983623733'),
(8, 'Manda', 'Gang Tempe', '2006-11-20', '087463834675'),
(9, 'Nando', 'CIlacap', '1999-05-20', '08532537375'),
(10, 'Kevin', 'Cikeas', '2005-03-14', '082898786858');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian_obat`
--

CREATE TABLE `pembelian_obat` (
  `id_pembelian` int(20) NOT NULL,
  `kode_pembelian` varchar(7) NOT NULL,
  `kode_obat` varchar(7) NOT NULL,
  `kode_suplier` varchar(7) NOT NULL,
  `harga_obat` decimal(10,2) NOT NULL,
  `jumlah_pembelian` int(20) NOT NULL,
  `total_harga` decimal(10,2) NOT NULL,
  `tanggal_pembelian` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pembelian_obat`
--

INSERT INTO `pembelian_obat` (`id_pembelian`, `kode_pembelian`, `kode_obat`, `kode_suplier`, `harga_obat`, `jumlah_pembelian`, `total_harga`, `tanggal_pembelian`) VALUES
(1, 'KDBL001', 'PCTML01', 'SP001', 10000.00, 3, 30000.00, '2024-08-20'),
(2, 'KDBL002', 'PCMX01', 'SP002', 10000.00, 12, 12000.00, '2024-08-15'),
(3, 'KDBL003', 'BDX01', 'SP003', 2000.00, 12, 12000.00, '2024-08-15'),
(4, 'KDBL004', 'MXG01', 'SP004', 0.00, 0, 0.00, '2024-08-15'),
(5, 'KDBL005', 'PRMG01', 'SP005', 0.00, 0, 0.00, '2024-08-15'),
(6, 'KDBL006', 'ANTGN01', 'SP006', 0.00, 0, 0.00, '2024-08-15'),
(7, 'KDBL007', 'KNMX01', 'SP007', 0.00, 0, 0.00, '2024-08-15'),
(8, 'KDBL008', 'NZP01', 'SP008', 0.00, 0, 0.00, '2024-08-15'),
(9, 'KDBL009', 'INZ001', 'SP009', 0.00, 0, 0.00, '2024-08-15'),
(10, 'KDBL010', 'PND01', 'SP010', 0.00, 0, 0.00, '2024-08-15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan_obat`
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
-- Dumping data untuk tabel `penjualan_obat`
--

INSERT INTO `penjualan_obat` (`id_penjualan`, `kode_penjualan`, `kode_obat`, `id_pasien`, `jumlah`, `total_harga_penjualan`, `tanggal_penjualan`) VALUES
(1, 'KDJL001', 'PCTML01', 1, 1, 10000.00, '0000-00-00'),
(2, 'KDJL002', 'PCMX01', 2, 1, 0.00, '2024-08-16'),
(3, 'KDJL003', 'BDX01', 3, 2, 0.00, '2024-08-16'),
(4, 'KDJL004', 'MXG01', 5, 1, 0.00, '2024-08-16'),
(5, 'KDJL005', 'PRMG01', 6, 1, 0.00, '2024-08-16'),
(6, 'KDJL006', 'ANTGN01', 7, 1, 0.00, '2024-08-16'),
(7, 'KDJL007', 'KNMX01', 8, 2, 0.00, '2024-08-16'),
(8, 'KDJL008', 'NZP01', 9, 1, 0.00, '2024-08-16'),
(9, 'KDJL009', 'INZ001', 10, 1, 0.00, '2024-08-16'),
(10, 'KDJL010', 'PND01', 10, 1, 0.00, '2024-08-16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
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
-- Struktur dari tabel `stock_opname`
--

CREATE TABLE `stock_opname` (
  `id_opname` int(20) NOT NULL,
  `kode_obat` varchar(7) NOT NULL,
  `jumlah_obat` int(11) NOT NULL,
  `minus` int(20) NOT NULL,
  `harga_obat` decimal(10,2) NOT NULL,
  `total_kerugian` decimal(10,2) NOT NULL,
  `tanggal_opname` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `stock_opname`
--

INSERT INTO `stock_opname` (`id_opname`, `kode_obat`, `jumlah_obat`, `minus`, `harga_obat`, `total_kerugian`, `tanggal_opname`) VALUES
(1, 'PCTML01', 0, 0, 0.00, 0.00, '2024-08-15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `suplier`
--

CREATE TABLE `suplier` (
  `id_suplier` int(20) NOT NULL,
  `kode_suplier` varchar(7) NOT NULL,
  `nama_suplier` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `nomor_telepon` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `suplier`
--

INSERT INTO `suplier` (`id_suplier`, `kode_suplier`, `nama_suplier`, `alamat`, `nomor_telepon`) VALUES
(1, 'SP001', 'Kimia Farma', 'Cawang', '0897878544'),
(2, 'SP002', 'Chemicals ', 'Gunungputri Utara', '09874354534'),
(4, 'SP003', 'Man Farmasi', 'Gang Sawo', '08362563798'),
(5, 'SP004', 'Kevarma', 'Tlajung Udik', '0873864354'),
(6, 'SP005', 'PharmaLink', 'Cagak', '08765436483'),
(7, 'SP006', 'Anugrah Medika\r\n', 'Kranggan', '08665372376'),
(8, 'SP007', 'Sehat Farma\r\n', 'Cibaduyut', '0873645345'),
(9, 'SP008', 'Nusantara Medis\r\n', 'Nambo', '08769237837'),
(10, 'SP009', 'Prima Apotek', 'Cibinong', '0865634584'),
(11, 'SP010', 'Harapan Medika', 'Pasar Minggu', '08957829483');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
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
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `laporan_omset`
--
ALTER TABLE `laporan_omset`
  ADD PRIMARY KEY (`id_laporan`),
  ADD UNIQUE KEY `kode_pembelian` (`kode_pembelian`),
  ADD UNIQUE KEY `kode_penjualan` (`kode_penjualan`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`kode_obat`),
  ADD UNIQUE KEY `id_obat` (`id_obat`),
  ADD UNIQUE KEY `kode_suplier` (`kode_suplier`);

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pembelian_obat`
--
ALTER TABLE `pembelian_obat`
  ADD PRIMARY KEY (`kode_pembelian`),
  ADD UNIQUE KEY `id_pembelian` (`id_pembelian`),
  ADD UNIQUE KEY `kode_obat` (`kode_obat`,`kode_suplier`),
  ADD KEY `kode_suplier` (`kode_suplier`);

--
-- Indeks untuk tabel `penjualan_obat`
--
ALTER TABLE `penjualan_obat`
  ADD PRIMARY KEY (`kode_penjualan`),
  ADD UNIQUE KEY `id_penjualan` (`id_penjualan`),
  ADD UNIQUE KEY `kode_obat` (`kode_obat`,`id_pasien`),
  ADD KEY `id_pasien` (`id_pasien`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `stock_opname`
--
ALTER TABLE `stock_opname`
  ADD PRIMARY KEY (`id_opname`),
  ADD UNIQUE KEY `kode_obat` (`kode_obat`);

--
-- Indeks untuk tabel `suplier`
--
ALTER TABLE `suplier`
  ADD PRIMARY KEY (`kode_suplier`),
  ADD UNIQUE KEY `id_suplier` (`id_suplier`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `laporan_omset`
--
ALTER TABLE `laporan_omset`
  MODIFY `id_laporan` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `pembelian_obat`
--
ALTER TABLE `pembelian_obat`
  MODIFY `id_pembelian` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `penjualan_obat`
--
ALTER TABLE `penjualan_obat`
  MODIFY `id_penjualan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `stock_opname`
--
ALTER TABLE `stock_opname`
  MODIFY `id_opname` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `suplier`
--
ALTER TABLE `suplier`
  MODIFY `id_suplier` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `laporan_omset`
--
ALTER TABLE `laporan_omset`
  ADD CONSTRAINT `laporan_omset_ibfk_1` FOREIGN KEY (`kode_penjualan`) REFERENCES `penjualan_obat` (`kode_penjualan`),
  ADD CONSTRAINT `laporan_omset_ibfk_2` FOREIGN KEY (`kode_pembelian`) REFERENCES `pembelian_obat` (`kode_pembelian`);

--
-- Ketidakleluasaan untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD CONSTRAINT `obat_ibfk_1` FOREIGN KEY (`kode_suplier`) REFERENCES `suplier` (`kode_suplier`);

--
-- Ketidakleluasaan untuk tabel `pembelian_obat`
--
ALTER TABLE `pembelian_obat`
  ADD CONSTRAINT `pembelian_obat_ibfk_1` FOREIGN KEY (`kode_suplier`) REFERENCES `suplier` (`kode_suplier`),
  ADD CONSTRAINT `pembelian_obat_ibfk_2` FOREIGN KEY (`kode_obat`) REFERENCES `obat` (`kode_obat`);

--
-- Ketidakleluasaan untuk tabel `penjualan_obat`
--
ALTER TABLE `penjualan_obat`
  ADD CONSTRAINT `penjualan_obat_ibfk_1` FOREIGN KEY (`kode_obat`) REFERENCES `obat` (`kode_obat`),
  ADD CONSTRAINT `penjualan_obat_ibfk_2` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`);

--
-- Ketidakleluasaan untuk tabel `stock_opname`
--
ALTER TABLE `stock_opname`
  ADD CONSTRAINT `stock_opname_ibfk_1` FOREIGN KEY (`kode_obat`) REFERENCES `obat` (`kode_obat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
