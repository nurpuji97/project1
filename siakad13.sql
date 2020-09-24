-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2020 at 07:36 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.1.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siakad13`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id` int(10) UNSIGNED NOT NULL,
  `listabsen_id` int(11) DEFAULT NULL,
  `siswa_id` int(11) DEFAULT NULL,
  `per1` int(11) DEFAULT NULL,
  `per2` int(11) DEFAULT NULL,
  `per3` int(11) DEFAULT NULL,
  `per4` int(11) DEFAULT NULL,
  `per5` int(11) DEFAULT NULL,
  `per6` int(11) DEFAULT NULL,
  `per7` int(11) DEFAULT NULL,
  `per8` int(11) DEFAULT NULL,
  `per9` int(11) DEFAULT NULL,
  `per10` int(11) DEFAULT NULL,
  `per11` int(11) DEFAULT NULL,
  `per12` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `buatsoal`
--

CREATE TABLE `buatsoal` (
  `id` int(10) UNSIGNED NOT NULL,
  `list_ujian_id` int(11) DEFAULT NULL,
  `question_number` int(11) DEFAULT NULL,
  `soal_text` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `soal_gambar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buatsoal`
--

INSERT INTO `buatsoal` (`id`, `list_ujian_id`, `question_number`, `soal_text`, `soal_gambar`, `created_at`, `updated_at`) VALUES
(25, 9, 1, 'Apa itu LAN', NULL, '2020-05-13 01:26:21', NULL),
(26, 9, 2, 'Apa Itu WAN', NULL, NULL, NULL),
(27, 9, 3, 'apa itu PC', NULL, NULL, NULL),
(29, 11, 1, 'apa fungsi dari keyboard', NULL, '2020-05-24 07:21:38', '2020-05-24 07:21:38'),
(30, 11, 2, 'apa fungsi scanner', NULL, '2020-05-24 07:21:58', '2020-05-24 07:21:58'),
(31, 11, 3, 'Apa Itu CPU', NULL, '2020-05-24 07:22:30', '2020-05-24 07:22:30'),
(33, 12, 1, 'arti dari bhineka tunggal ika', NULL, '2020-05-30 10:11:38', '2020-05-30 10:12:22'),
(34, 12, 2, 'isi dari sila pertama dari pancasila', NULL, '2020-05-30 10:11:52', '2020-05-30 10:13:01'),
(35, 12, 3, 'isi dari sila kedua dari pancasila', NULL, '2020-05-30 10:13:21', '2020-05-30 10:13:21');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id` int(10) NOT NULL,
  `nip` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `npwp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_guru` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_kelamin` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `agama` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_pernikahan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_pegawai` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gelar_pendidikan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lulusan_universitas` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `telp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id`, `nip`, `npwp`, `nama_guru`, `user_id`, `avatar`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_pernikahan`, `status_pegawai`, `gelar_pendidikan`, `lulusan_universitas`, `alamat`, `telp`, `created_at`, `updated_at`) VALUES
(6, '47347616643022', NULL, 'Lina Siti Hasanah', 17, NULL, 'perempuan', 'Bekasi', '1983-04-02', 'Islam', NULL, 'Non PNS', 'S.T', 'Universitas Muhammadiyah Jakarta', NULL, NULL, '2020-07-07 05:37:52', '2020-07-07 06:39:17'),
(7, '20254070189001', NULL, 'Gun Gun Gunawan', 18, NULL, 'laki-laki', 'Garut', '1989-08-10', 'Islam', NULL, 'Non PNS', 'S.Pd', 'STKIP Garut', NULL, NULL, '2020-07-07 05:49:25', '2020-07-07 06:38:52'),
(8, '20253101191001', NULL, 'Tri Rosita', 19, NULL, 'perempuan', 'Bekasi', '1991-07-12', 'Islam', NULL, 'Non PNS', 'S.S', 'STIBA JIA', NULL, NULL, '2020-07-07 05:51:31', '2020-07-07 06:08:41'),
(9, '20281389191004', NULL, 'Hj. Maisari', 20, NULL, 'perempuan', 'Bekasi', '1991-08-17', 'Islam', NULL, 'Non PNS', 'S.Pd', 'Universitas Negeri Jakarta', NULL, NULL, '2020-07-07 05:57:56', '2020-07-07 06:08:50'),
(10, '20258057196001', NULL, 'M Robi', 21, NULL, 'laki-laki', 'Bekasi', '1996-04-02', 'Islam', NULL, 'Non PNS', 'S. Kom', 'STMIKA Nusa Mandiri', NULL, NULL, '2020-07-07 06:12:13', '2020-07-07 06:12:13');

-- --------------------------------------------------------

--
-- Table structure for table `jawabujian`
--

CREATE TABLE `jawabujian` (
  `id` int(10) UNSIGNED NOT NULL,
  `soal_ujian_id` int(11) DEFAULT NULL,
  `is_correct` int(11) DEFAULT NULL,
  `jawaban` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jawabujian`
--

INSERT INTO `jawabujian` (`id`, `soal_ujian_id`, `is_correct`, `jawaban`, `created_at`, `updated_at`) VALUES
(1, 25, 0, 'MetroPolitan Area Network', NULL, NULL),
(2, 25, 1, 'Local Area Network', NULL, NULL),
(3, 25, 0, 'Wide Area Network', NULL, NULL),
(4, 26, 1, 'Wide Area Network', NULL, NULL),
(5, 26, 0, 'Local Area Network', NULL, NULL),
(6, 26, 0, 'Internet', NULL, NULL),
(7, 27, 0, 'Pesonal Central', NULL, NULL),
(8, 27, 0, 'personal Crisis', NULL, NULL),
(9, 27, 1, 'Personal Computer', NULL, NULL),
(10, 29, 0, 'untuk memasukkan gambar', '2020-05-24 07:43:08', '2020-05-24 07:43:08'),
(11, 29, 0, 'mencetak data', '2020-05-24 07:44:26', '2020-05-24 07:44:26'),
(12, 29, 1, 'memasukkan huruf, angka dan tanda baca', '2020-05-24 07:45:11', '2020-05-24 07:45:11'),
(13, 29, 0, 'memasukkan gambar', '2020-05-24 07:45:31', '2020-05-24 07:45:31'),
(14, 30, 0, 'memasukkan huruf, angka dan tanda baca', '2020-05-24 08:08:33', '2020-05-24 08:08:33'),
(15, 30, 0, 'mencetak data', '2020-05-24 08:08:48', '2020-05-24 08:08:48'),
(16, 30, 0, 'menampilkan warna dan gambar', '2020-05-24 08:09:13', '2020-05-24 08:09:13'),
(17, 30, 1, 'memasukkan data berupa gambar dan warna', '2020-05-24 08:09:34', '2020-05-24 08:09:34'),
(18, 31, 1, 'Central Processing Unit', '2020-05-24 08:12:03', '2020-05-24 08:12:03'),
(20, 31, 0, 'Central Prosses Unit', '2020-05-24 08:13:05', '2020-05-24 08:13:05'),
(21, 31, 0, 'Certain Prosedure Unit', '2020-05-24 08:13:25', '2020-05-24 08:13:25'),
(22, 31, 0, 'Control Procedural United', '2020-05-24 08:18:02', '2020-05-24 08:18:02'),
(23, 33, 0, 'test1', '2020-05-30 10:13:42', '2020-05-30 10:13:42'),
(24, 33, 1, 'berbeda beda tapi satu jua', '2020-05-30 10:14:10', '2020-05-30 10:14:10'),
(25, 33, 0, 'test4', '2020-05-30 10:14:18', '2020-05-30 10:14:18'),
(26, 35, 1, 'kemanusiaan yang adil dan beradab', '2020-05-30 10:14:42', '2020-05-30 10:14:42'),
(27, 35, 0, 'test5', '2020-05-30 10:14:51', '2020-05-30 10:14:51'),
(28, 35, 0, 'test7', '2020-05-30 10:15:00', '2020-05-30 10:15:00'),
(29, 34, 0, 'test6', '2020-05-30 10:15:16', '2020-05-30 10:15:16'),
(30, 34, 0, 'test8', '2020-05-30 10:15:24', '2020-05-30 10:15:24'),
(31, 34, 1, 'ketuhanan yang maha esa', '2020-05-30 10:15:40', '2020-05-30 10:15:40');

-- --------------------------------------------------------

--
-- Table structure for table `jurnalsikap`
--

CREATE TABLE `jurnalsikap` (
  `id` int(10) UNSIGNED NOT NULL,
  `tanggal` date DEFAULT NULL,
  `siswa_id` int(11) DEFAULT NULL,
  `kelas_id` int(11) DEFAULT NULL,
  `catatan_perilaku` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nilaikarakter_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(10) NOT NULL,
  `tingkat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kompeahli_id` int(11) DEFAULT NULL,
  `rombel` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `tingkat`, `kompeahli_id`, `rombel`, `created_at`, `updated_at`) VALUES
(8, 'X', 1, 'XTKJ1', '2020-07-03 21:17:03', '2020-07-03 21:17:03'),
(9, 'X', 1, 'XTKJ2', '2020-07-03 21:17:16', '2020-07-03 21:17:16'),
(10, 'X', 1, 'XTKJ3', '2020-07-03 21:17:35', '2020-07-03 21:17:35'),
(11, 'X', 3, 'XAK1', '2020-07-03 21:18:13', '2020-07-03 21:18:13'),
(12, 'X', 3, 'XAK2', '2020-07-03 21:18:25', '2020-07-03 21:18:25'),
(13, 'X', 4, 'XDKV1', '2020-07-03 21:18:42', '2020-07-03 21:18:42'),
(14, 'XI', 1, 'XITKJ1', '2020-07-03 21:19:11', '2020-07-03 21:19:11'),
(15, 'XI', 1, 'XITKJ2', '2020-07-03 21:19:26', '2020-07-03 21:19:26'),
(16, 'XI', 1, 'XITKJ3', '2020-07-03 21:19:49', '2020-07-03 21:19:49'),
(17, 'XI', 3, 'XIAK1', '2020-07-03 21:20:06', '2020-07-03 21:20:06'),
(18, 'XI', 4, 'XIDKV1', '2020-07-03 21:20:38', '2020-07-03 21:20:38'),
(19, 'XII', 1, 'XIITKJ1', '2020-07-03 21:21:22', '2020-07-03 21:21:22'),
(20, 'XII', 1, 'XIITKJ2', '2020-07-03 21:21:42', '2020-07-03 21:21:42'),
(21, 'XII', 1, 'XIITKJ3', '2020-07-03 21:21:57', '2020-07-03 21:21:57'),
(22, 'XII', 3, 'XIIAK1', '2020-07-03 21:22:13', '2020-07-03 21:22:13'),
(23, 'XI', 3, 'XIAK2', '2020-07-03 21:22:41', '2020-07-03 21:22:41'),
(24, 'XII', 4, 'XIIDKV1', '2020-07-03 21:23:04', '2020-07-03 21:23:04');

-- --------------------------------------------------------

--
-- Table structure for table `kompeahli`
--

CREATE TABLE `kompeahli` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_kom` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kompeahli`
--

INSERT INTO `kompeahli` (`id`, `nama_kom`, `created_at`, `updated_at`) VALUES
(1, 'Teknik Komputer Jaringan', '2020-02-29 07:00:48', '2020-02-29 07:00:48'),
(3, 'Akutansi', '2020-02-29 07:06:25', '2020-02-29 07:06:25'),
(4, 'Desain Komunikasi Visual', '2020-07-03 21:16:11', '2020-07-03 21:16:11');

-- --------------------------------------------------------

--
-- Table structure for table `kompedas`
--

CREATE TABLE `kompedas` (
  `id` int(10) UNSIGNED NOT NULL,
  `kode_komdas` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_komdas` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kompedas`
--

INSERT INTO `kompedas` (`id`, `kode_komdas`, `nama_komdas`, `created_at`, `updated_at`) VALUES
(1, '1.1', 'Mengenal Pancasila', '2020-03-01 23:21:05', '2020-03-01 23:21:05'),
(3, '1.2', 'Menerapkan Dasar Pemograman Web', '2020-03-01 23:26:00', '2020-03-01 23:26:00');

-- --------------------------------------------------------

--
-- Table structure for table `lemkokin`
--

CREATE TABLE `lemkokin` (
  `id` int(10) UNSIGNED NOT NULL,
  `list_skor_kinerja_id` int(11) DEFAULT NULL,
  `komponen` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_komponen` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lemkokin`
--

INSERT INTO `lemkokin` (`id`, `list_skor_kinerja_id`, `komponen`, `sub_komponen`, `no`, `created_at`, `updated_at`) VALUES
(2, 4, 'persiapan', 'pemangan kabel LAN', 1, NULL, NULL),
(3, 4, 'proses', 'kriping kabel rj45', 1, NULL, NULL),
(4, 4, 'hasil', 'connect kabel LAN', 1, NULL, NULL),
(10, 5, 'persiapan', 'mengenal pancasila', 1, '2020-04-03 08:39:11', '2020-04-03 08:39:11'),
(11, 4, 'proses', 'memasukan alamat IP', 1, '2020-04-07 08:01:43', '2020-04-07 08:01:43'),
(12, 5, 'proses', 'memahami UUD 1945', 1, '2020-04-20 07:22:52', '2020-04-20 07:22:52'),
(13, 6, 'persiapan', 'memahami kabel jaringan', 1, '2020-04-20 07:49:13', '2020-04-20 07:49:13'),
(14, 6, 'proses', 'kriping kabel lan', 1, '2020-04-20 07:49:35', '2020-04-20 07:49:35'),
(15, 6, 'hasil', 'ping koneksi kedua pc', 1, '2020-04-20 07:49:53', '2020-04-20 07:49:53'),
(16, 1, 'persiapan', 'test 1', 1, '2020-04-24 09:47:38', '2020-04-24 09:47:38'),
(17, 7, 'persiapan', 'test 1', 1, '2020-05-27 09:56:20', '2020-05-27 09:56:20'),
(18, 7, 'proses', 'test 2', 1, '2020-05-27 09:56:36', '2020-05-27 09:56:36'),
(19, 7, 'hasil', 'test 3', 1, '2020-05-27 09:56:51', '2020-05-27 09:56:51');

-- --------------------------------------------------------

--
-- Table structure for table `listabsen`
--

CREATE TABLE `listabsen` (
  `id` int(10) UNSIGNED NOT NULL,
  `guru_id` int(11) DEFAULT NULL,
  `mapel_id` int(11) DEFAULT NULL,
  `semester_id` int(11) DEFAULT NULL,
  `kelas_id` int(11) DEFAULT NULL,
  `ruangan_id` int(11) DEFAULT NULL,
  `hari` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jam` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tugas` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `botugpend` int(11) DEFAULT NULL,
  `botugpelak` int(11) DEFAULT NULL,
  `botugkesim` int(11) DEFAULT NULL,
  `botugtamp` int(11) DEFAULT NULL,
  `botugbaca` int(11) DEFAULT NULL,
  `b_ter` int(11) DEFAULT NULL,
  `b_kem` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `listskorkinerja`
--

CREATE TABLE `listskorkinerja` (
  `id` int(10) UNSIGNED NOT NULL,
  `guru_id` int(11) DEFAULT NULL,
  `mapel_id` int(11) DEFAULT NULL,
  `semester_id` int(11) DEFAULT NULL,
  `kelas_id` int(11) DEFAULT NULL,
  `ruangan_id` int(11) DEFAULT NULL,
  `model_skor` enum('proyek','praktik') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_model_skor` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bobot_persiapan` int(11) DEFAULT NULL,
  `bobot_proses` int(11) DEFAULT NULL,
  `bobot_hasil` int(11) DEFAULT NULL,
  `deskripsi` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `listskorkinerja`
--

INSERT INTO `listskorkinerja` (`id`, `guru_id`, `mapel_id`, `semester_id`, `kelas_id`, `ruangan_id`, `model_skor`, `jenis_model_skor`, `bobot_persiapan`, `bobot_proses`, `bobot_hasil`, `deskripsi`, `created_at`, `updated_at`) VALUES
(2, 3, 2, 4, 3, 3, 'proyek', 'nilai_akhir', 40, 40, 20, 'proyek berubah kinerja  tugas 1', '2020-03-29 08:50:58', '2020-04-27 22:37:48'),
(4, 1, 1, 3, 2, 2, 'proyek', 'nilai_akhir', 30, 50, 20, 'test', '2020-03-29 07:21:22', '2020-05-20 09:28:28'),
(6, 4, 3, 5, 5, 1, 'praktik', 'praktik_2', 30, 50, 20, 'test', '2020-04-20 07:39:11', '2020-04-24 09:50:28'),
(7, 4, 2, 4, 2, 2, 'proyek', 'nilai_akhir', 30, 50, 20, 'test 1', '2020-05-27 09:55:24', '2020-05-27 10:33:52');

-- --------------------------------------------------------

--
-- Table structure for table `listujian`
--

CREATE TABLE `listujian` (
  `id` int(10) UNSIGNED NOT NULL,
  `guru_id` int(11) DEFAULT NULL,
  `mapel_id` int(11) DEFAULT NULL,
  `kelas_id` int(11) DEFAULT NULL,
  `semester_id` int(11) DEFAULT NULL,
  `ruangan_id` int(11) DEFAULT NULL,
  `exam_datetime` datetime DEFAULT NULL,
  `exam_end` datetime DEFAULT NULL,
  `exam_duration` int(11) DEFAULT NULL,
  `total_question` int(11) DEFAULT NULL,
  `jenis_ujian` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_mapel` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`id`, `nama_mapel`, `jp`, `created_at`, `updated_at`) VALUES
(1, 'Ilmu Pengetahuan Sosial', '2', '2020-02-28 00:15:16', '2020-02-28 00:23:26'),
(2, 'Pendidikan Kewarganegaran', '2', '2020-02-28 00:25:30', '2020-02-28 00:25:30'),
(3, 'Prakter Teknik Komputer dan Jaringan', '4', '2020-03-03 19:30:32', '2020-03-03 19:30:32'),
(4, 'Etika Profesi', '2', '2020-07-03 21:23:46', '2020-07-03 21:23:46'),
(5, 'Bahasa Indonesia', '2', '2020-07-03 21:24:00', '2020-07-03 21:24:00'),
(6, 'Bahasa Inggris', '2', '2020-07-03 21:24:13', '2020-07-03 21:24:13'),
(7, 'Bahasa Jepang', '2', '2020-07-03 21:24:24', '2020-07-03 21:24:24'),
(8, 'Akutansi MYOB', '4', '2020-07-03 21:25:17', '2020-07-03 21:25:17'),
(9, 'Bahasa Jepang', '2', '2020-07-03 21:25:30', '2020-07-03 21:25:30'),
(10, 'Fisika', '2', '2020-07-03 21:25:59', '2020-07-03 21:25:59'),
(11, 'KImia', '2', '2020-07-03 21:26:11', '2020-07-03 21:26:11'),
(12, 'Produktiv DKV', '2', '2020-07-03 21:26:26', '2020-07-03 21:26:26');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_02_03_054853_create_siswa_table', 1),
(4, '2020_02_10_071126_create_guru_table', 2),
(5, '2020_02_13_150142_create_kelas_table', 3),
(6, '2020_02_14_143204_create_nilaikarakter_table', 4),
(7, '2020_02_14_144049_create_nilaikarakter_table', 5),
(8, '2020_02_14_150357_create_semester_table', 6),
(9, '2020_02_15_033109_create_rombel_table', 7),
(10, '2020_02_15_074902_create_jurnalsikap_table', 8),
(11, '2020_02_15_144323_create_jurnalsikap_table', 9),
(12, '2020_02_19_031218_create_pernyataandiri_table', 10),
(13, '2020_02_19_034501_create_penilaiandiri_table', 11),
(14, '2020_02_21_155930_create_pernyataanteman_table', 12),
(15, '2020_02_22_061223_create_penilaianteman_table', 13),
(16, '2020_02_28_065739_create_mapel_table', 14),
(17, '2020_02_29_071625_create_komke_table', 15),
(18, '2020_02_29_134927_create_kompeahli_table', 16),
(19, '2020_02_29_143239_create_kompedasar_table', 17),
(20, '2020_03_02_061327_create_kompedas_table', 18),
(21, '2020_03_02_070206_create_ujianonline_table', 19),
(22, '2020_03_03_021302_create_listujian_table', 20),
(23, '2020_03_04_024544_create_buatsoal_table', 21),
(24, '2020_03_05_071501_create_buatjawaban_table', 21),
(25, '2020_03_17_062347_create_buatjawab_table', 22),
(26, '2020_03_17_144309_create_buatjawaban_table', 23),
(27, '2020_03_17_145424_create_buatjawab_table', 24),
(28, '2020_03_17_160058_create_jawabsoal_table', 25),
(29, '2020_03_26_144122_create_listskorkinerja_table', 26),
(30, '2020_03_29_131342_create_listskinerja_table', 27),
(31, '2020_03_31_145319_create_lemkokin_table', 28),
(32, '2020_04_26_071447_create_reprakems_table', 29),
(33, '2020_05_05_145019_create_nilairaport_table', 30),
(34, '2020_05_07_153712_create_absensiswa_table', 31),
(35, '2020_05_20_160148_create_rekniltu_table', 32),
(36, '2020_05_21_162726_create_listabsen_table', 33),
(37, '2020_05_23_155537_create_absensi_table', 34),
(38, '2020_06_30_141930_create_ruangan_table', 35);

-- --------------------------------------------------------

--
-- Table structure for table `nilaikarakter`
--

CREATE TABLE `nilaikarakter` (
  `id` int(10) UNSIGNED NOT NULL,
  `nuppk` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nilaikarakter`
--

INSERT INTO `nilaikarakter` (`id`, `nuppk`, `created_at`, `updated_at`) VALUES
(2, 'Integritas', '2020-02-14 08:07:41', '2020-02-14 08:07:41'),
(3, 'Religius', '2020-02-14 08:07:58', '2020-02-14 08:07:58'),
(4, 'Nasionalis', '2020-02-14 08:08:09', '2020-02-14 08:08:09'),
(5, 'Mandiri', '2020-02-14 08:08:16', '2020-02-14 08:08:16'),
(6, 'Gotong-royong', '2020-02-14 08:08:33', '2020-02-14 08:08:33');

-- --------------------------------------------------------

--
-- Table structure for table `nilairaport`
--

CREATE TABLE `nilairaport` (
  `id` int(10) UNSIGNED NOT NULL,
  `siswa_id` int(11) DEFAULT NULL,
  `mapel_id` int(11) DEFAULT NULL,
  `semester_id` int(11) DEFAULT NULL,
  `kelas_id` int(11) DEFAULT NULL,
  `b_ter` int(11) DEFAULT NULL,
  `b_kem` int(11) DEFAULT NULL,
  `nilai_tugas` int(11) DEFAULT NULL,
  `nilai_pts` int(11) DEFAULT NULL,
  `nilai_pas` int(11) DEFAULT NULL,
  `jml_nilai_ter` int(11) DEFAULT NULL,
  `nilai_prak` int(11) DEFAULT NULL,
  `nilai_pro` int(11) DEFAULT NULL,
  `jml_nilai_kem` int(11) DEFAULT NULL,
  `nilai_raport` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penilaiandiri`
--

CREATE TABLE `penilaiandiri` (
  `id` int(10) UNSIGNED NOT NULL,
  `siswa_id` int(11) DEFAULT NULL,
  `kelas_id` int(11) DEFAULT NULL,
  `semester_id` int(11) DEFAULT NULL,
  `pernyataandiri_id` int(11) DEFAULT NULL,
  `pilihan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penilaiandiri`
--

INSERT INTO `penilaiandiri` (`id`, `siswa_id`, `kelas_id`, `semester_id`, `pernyataandiri_id`, `pilihan`, `created_at`, `updated_at`) VALUES
(10, 16, 3, 3, 1, 'ya', '2020-02-19 20:25:33', '2020-02-19 20:25:33'),
(66, 77, 2, 3, 1, 'tidak', '2020-02-21 08:02:52', '2020-02-21 08:02:52'),
(67, 77, 2, 3, 3, 'ya', '2020-02-21 08:08:49', '2020-02-21 08:08:49'),
(68, 77, 2, 3, 4, 'ya', '2020-02-21 08:35:26', '2020-02-21 08:35:26'),
(69, 77, 2, 3, 5, 'ya', '2020-02-21 08:35:42', '2020-02-21 08:35:42'),
(70, 77, 2, 3, 6, 'ya', '2020-02-21 08:35:59', '2020-02-21 08:35:59'),
(71, 77, 2, 3, 7, 'tidak', '2020-02-21 08:36:12', '2020-02-21 08:36:12'),
(72, 80, 3, 3, 1, 'tidak', '2020-02-21 23:35:47', '2020-02-21 23:35:47');

-- --------------------------------------------------------

--
-- Table structure for table `penilaianteman`
--

CREATE TABLE `penilaianteman` (
  `id` int(10) UNSIGNED NOT NULL,
  `siswa_id` int(11) DEFAULT NULL,
  `kelas_id` int(11) DEFAULT NULL,
  `semester_id` int(11) DEFAULT NULL,
  `pernyataanteman_id` int(11) DEFAULT NULL,
  `pilihan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penilaianteman`
--

INSERT INTO `penilaianteman` (`id`, `siswa_id`, `kelas_id`, `semester_id`, `pernyataanteman_id`, `pilihan`, `created_at`, `updated_at`) VALUES
(1, 77, 2, 3, 1, 'ya', '2020-02-21 23:36:50', '2020-02-21 23:36:50'),
(2, 80, 3, 3, 1, 'tidak', '2020-02-21 23:52:47', '2020-02-21 23:52:47');

-- --------------------------------------------------------

--
-- Table structure for table `pernyataandiri`
--

CREATE TABLE `pernyataandiri` (
  `id` int(10) UNSIGNED NOT NULL,
  `pernyataan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pernyataandiri`
--

INSERT INTO `pernyataandiri` (`id`, `pernyataan`, `created_at`, `updated_at`) VALUES
(1, 'saya mencontek pada saat mengerjakan penilaian', '2020-02-18 20:36:50', '2020-02-18 20:36:50'),
(3, 'saya berani mengakui kesalahan saya', '2020-02-18 20:39:39', '2020-02-18 20:39:39'),
(4, 'saya datang ke sekolah tepat waktu', '2020-02-18 20:39:58', '2020-02-18 20:39:58'),
(5, 'saya belajar sungguh - sungguh', '2020-02-18 20:40:18', '2020-02-18 20:40:18'),
(6, 'saya meminta maaf jika saya melakukan salah', '2020-02-18 20:40:57', '2020-02-18 20:40:57'),
(7, 'saya mengembalikan barang yang saya pinjam', '2020-02-18 20:41:21', '2020-02-18 20:41:21');

-- --------------------------------------------------------

--
-- Table structure for table `pernyataanteman`
--

CREATE TABLE `pernyataanteman` (
  `id` int(10) UNSIGNED NOT NULL,
  `pernyataan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pernyataanteman`
--

INSERT INTO `pernyataanteman` (`id`, `pernyataan`, `created_at`, `updated_at`) VALUES
(1, 'Teman saya tidak mencotek dalam mengerjakan ujian', '2020-02-21 23:07:16', '2020-02-21 23:07:16'),
(3, 'teman saya melaporkan data atau informasi apa adanya', '2020-02-21 23:09:31', '2020-02-21 23:09:31');

-- --------------------------------------------------------

--
-- Table structure for table `rekniltu`
--

CREATE TABLE `rekniltu` (
  `id` int(10) UNSIGNED NOT NULL,
  `siswa_id` int(11) DEFAULT NULL,
  `mapel_id` int(11) DEFAULT NULL,
  `semester_id` int(11) DEFAULT NULL,
  `kelas_id` int(11) DEFAULT NULL,
  `tug1` int(11) DEFAULT NULL,
  `tug2` int(11) DEFAULT NULL,
  `tug3` int(11) DEFAULT NULL,
  `tug4` int(11) DEFAULT NULL,
  `tug5` int(11) DEFAULT NULL,
  `tug6` int(11) DEFAULT NULL,
  `tug7` int(11) DEFAULT NULL,
  `tug8` int(11) DEFAULT NULL,
  `tug9` int(11) DEFAULT NULL,
  `tug10` int(11) DEFAULT NULL,
  `tug11` int(11) DEFAULT NULL,
  `tug12` int(11) DEFAULT NULL,
  `nilai_tugas` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reprakems`
--

CREATE TABLE `reprakems` (
  `id` int(10) UNSIGNED NOT NULL,
  `siswa_id` int(11) DEFAULT NULL,
  `mapel_id` int(11) DEFAULT NULL,
  `semester_id` int(11) DEFAULT NULL,
  `kelas_id` int(11) DEFAULT NULL,
  `praktik_1` int(11) DEFAULT NULL,
  `praktik_2` int(11) DEFAULT NULL,
  `praktik_3` int(11) DEFAULT NULL,
  `praktik_4` int(11) DEFAULT NULL,
  `nilai_prak` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rombel`
--

CREATE TABLE `rombel` (
  `id` int(10) UNSIGNED NOT NULL,
  `siswa_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kelas_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rombel`
--

INSERT INTO `rombel` (`id`, `siswa_id`, `kelas_id`, `created_at`, `updated_at`) VALUES
(1, '78', '22', '2020-07-26 22:33:23', '2020-07-26 22:33:23'),
(2, '79', '22', '2020-07-26 22:33:41', '2020-07-26 22:33:41');

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `id` int(10) UNSIGNED NOT NULL,
  `kode_ruangan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_ruangan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`id`, `kode_ruangan`, `nama_ruangan`, `created_at`, `updated_at`) VALUES
(4, 'R.2-1', 'Ruang Kelas 2.1', '2020-07-03 20:59:16', '2020-07-03 20:59:16'),
(5, 'R.2-2', 'Ruang Kelas 2.2', '2020-07-03 20:59:50', '2020-07-03 20:59:50'),
(6, 'R.2-3', 'Ruang Kelas 2.3', '2020-07-03 21:00:06', '2020-07-03 21:00:06'),
(7, 'R.2-4', 'Ruang kepala sekolah', '2020-07-03 21:01:22', '2020-07-03 21:01:22'),
(8, 'R.2-5', 'Rauangan Ekstrakulikuler', '2020-07-03 21:02:52', '2020-07-03 21:02:52'),
(9, 'R.2-6', 'Ruang Kelas 2.4', '2020-07-03 21:03:07', '2020-07-03 21:03:07'),
(10, 'R.2-7', 'Ruang Kelas 2.5', '2020-07-03 21:03:21', '2020-07-03 21:03:21'),
(11, 'R.3-1', 'Ruang Kelas 3.1', '2020-07-03 21:04:02', '2020-07-03 21:04:02'),
(12, 'R.3-2', 'Ruang Kelas 3.2', '2020-07-03 21:04:24', '2020-07-03 21:04:24'),
(13, 'R.3-3', 'Ruang Kelas 3.3', '2020-07-03 21:05:21', '2020-07-03 21:05:21'),
(14, 'R.3-4', 'Ruangan Kesiswaan dan HUBIN', '2020-07-03 21:06:04', '2020-07-03 21:06:04'),
(15, 'R.3-5', 'Ruang Kelas 3.4', '2020-07-03 21:07:12', '2020-07-03 21:07:12'),
(16, 'R.3-6', 'Ruangan Guru', '2020-07-03 21:07:34', '2020-07-03 21:07:34'),
(17, 'R.3-7', 'Ruang Kelas 3.5', '2020-07-03 21:08:18', '2020-07-03 21:08:18'),
(18, 'R.4-1', 'Ruang Kelas 4.1', '2020-07-03 21:09:41', '2020-07-03 21:09:41'),
(19, 'R.4-2', 'Ruang Kelas 4.2', '2020-07-03 21:10:07', '2020-07-03 21:10:07'),
(20, 'R.4-3', 'Ruang Kelas 4.3', '2020-07-03 21:11:39', '2020-07-03 21:11:39'),
(21, 'R.4-5', 'Ruang Kelas 4.5', '2020-07-03 21:12:32', '2020-07-03 21:12:32'),
(22, 'R.4-6', 'Ruang Kelas 4.6', '2020-07-03 21:12:57', '2020-07-03 21:12:57'),
(23, 'R.4-7', 'Ruang Kelas 4.7', '2020-07-03 21:13:20', '2020-07-03 21:13:20'),
(24, 'Lab 01', 'Ruangan Lab Komputer 1', '2020-07-03 21:14:07', '2020-07-03 21:15:32'),
(25, 'Lab 02', 'Ruangan Lab Komputer 2', '2020-07-03 21:15:03', '2020-07-03 21:15:03');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `id` int(10) UNSIGNED NOT NULL,
  `semester` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahunpelajaran` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`id`, `semester`, `tahunpelajaran`, `created_at`, `updated_at`) VALUES
(3, 'Semester I', '2020/2021', '2020-02-14 08:57:31', '2020-02-14 08:57:31'),
(4, 'Semester II', '2020/2021', '2020-02-14 09:01:25', '2020-02-14 09:01:25'),
(5, 'Semester I', '2021/2022', '2020-02-18 19:45:52', '2020-02-18 19:45:52');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` int(10) NOT NULL,
  `nis` varchar(13) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nisn` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jeniskelamin` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempatlahir` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggallahir` date DEFAULT NULL,
  `agama` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `statuskeluarga` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `anakke` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `telprumah` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sekolahasal` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `nis`, `nisn`, `nama`, `user_id`, `avatar`, `jeniskelamin`, `tempatlahir`, `tanggallahir`, `agama`, `statuskeluarga`, `anakke`, `alamat`, `telprumah`, `sekolahasal`, `created_at`, `updated_at`) VALUES
(78, '1718.10.021', NULL, 'Parida Hanum', 6, NULL, 'perempuan', 'Bekasi', '2003-07-08', 'Islam', NULL, NULL, NULL, NULL, NULL, '2020-07-07 04:36:51', '2020-07-07 04:36:51'),
(79, '1718.10.022', NULL, 'Putri Yasmin', 7, NULL, 'perempuan', 'Bekasi', '2003-04-22', 'Islam', NULL, NULL, NULL, NULL, NULL, '2020-07-07 04:39:05', '2020-07-07 04:39:05'),
(80, '1718.10.023', NULL, 'Rafliana Hanami', 8, NULL, 'perempuan', 'Bekasi', '2003-02-18', 'Islam', NULL, NULL, NULL, NULL, NULL, '2020-07-07 04:40:14', '2020-07-07 04:40:14'),
(81, '1718.10.024', NULL, 'Vinna Ainun Zachroh', 9, NULL, 'perempuan', 'Jakarta', '2003-11-11', 'Islam', NULL, NULL, NULL, NULL, NULL, '2020-07-07 04:41:50', '2020-07-07 04:41:50'),
(82, '1718.10.032', NULL, 'Widya Astuti', 10, NULL, 'perempuan', 'Jakarta', '2003-08-19', 'Islam', NULL, NULL, NULL, NULL, NULL, '2020-07-07 04:43:34', '2020-07-07 04:43:34'),
(83, '1819.10.051', NULL, 'Nurul', 12, NULL, 'perempuan', 'Jakarta', '2003-08-03', 'Islam', NULL, NULL, NULL, NULL, NULL, '2020-07-07 04:45:26', '2020-07-07 04:45:26'),
(84, '1819.10.041', NULL, 'Panji Maulana', 13, NULL, 'laki-laki', 'Bekasi', '2004-07-17', 'Islam', NULL, NULL, NULL, NULL, NULL, '2020-07-07 04:46:28', '2020-07-07 04:48:50'),
(85, '1819.10.042', NULL, 'Puri Retno Wardani', 14, NULL, 'perempuan', 'Jakarta', '2004-02-18', 'Islam', NULL, NULL, NULL, NULL, NULL, '2020-07-07 04:50:27', '2020-07-07 04:50:27'),
(86, '1819.10.044', NULL, 'Tegar Aldiansyah', 15, NULL, 'laki-laki', 'Bekasi', '2004-10-03', 'Islam', NULL, NULL, NULL, NULL, NULL, '2020-07-07 04:51:37', '2020-07-07 04:51:37'),
(87, '1819.10.055', NULL, 'Zulfikar Ali', 16, NULL, 'laki-laki', 'Bekasi', '2004-03-23', 'Islam', NULL, NULL, NULL, NULL, NULL, '2020-07-07 04:53:44', '2020-07-07 04:53:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'puji', 'puji@ymail.com', NULL, '$2y$10$.e6DQ4phB66X7iPTDKnq2.AdirlTJN8MT1SIn6I7LKU5MztNrW2PC', 'Z3ijiPkoBcImuvMNEKmrYWlURGxxTwz1UI0kxbxtQpsZQAYEgrHhEauOPtLm', '2020-02-11 23:34:05', '2020-02-11 23:34:05'),
(4, 'guru', 'rena. s. pd', 'rena@ymail.com', NULL, '$2y$10$BhCQcgRtApjSkWteFJkph.uNZCjH6MsP8M5XDVhaDJLPzd9L011mO', 'P8EN0PeOu6R3Cl3yiknXde2ytx8AC987sLPW7VlEBHJJcCu9Fnk7G6G2kzEp', '2020-02-12 23:07:17', '2020-02-12 23:07:17'),
(5, 'tu', 'jeje', 'jeje@ymail.com', NULL, '$2y$10$ydLJtABWh5EVL8Rl4pkQsu5tzkW/P9YyaMLUNOMQX4bFMhho21pPC', '1pPze2Tr31FzBxmybwzJTmPsKMP0eMBpH0YFcFMxyuXsF7sFqgdgsAeXH2EG', '2020-02-17 08:07:13', '2020-02-17 08:07:13'),
(6, 'siswa', 'Parida Hanum', 'parida@ymali.com', NULL, '$2y$10$.k6mRknqeb3v5PavP7yqde5Uk.e09irlLD3pTV.rGh4LaqBgOZXaG', 'jgECcrcR0M3LQcOSvbRJYVJIMEUvK82rvYAZJQEegZqjYKitnnftnYzxPw8Z', '2020-07-07 04:36:51', '2020-07-07 04:36:51'),
(7, 'siswa', 'Putri Yasmin', 'putri@ymail.com', NULL, '$2y$10$CSMxBz5gYTH4jKshWETEH.8fgCapuyvbDNsO8u.qLUsERQepAwSQm', 'DlYcnHG3F2fEFcYhcfw4wqO30XRuTC1xBQgwXWEgiBuKMIMLHIYLkA2nh4gL', '2020-07-07 04:39:05', '2020-07-07 04:39:05'),
(8, 'siswa', 'Rafliana Hanami', 'hanami@ymail.com', NULL, '$2y$10$Fep0.Vqg0zrvZsvO.qc6sOFGEQtsg5/KlzjLLxbTVeT1jCpijHeQG', '2FjSrJBYdsbtW0VdRpNAGvAAWoAtsM7k44l9mqy8SuWpYP48R4Lt7XF99liO', '2020-07-07 04:40:13', '2020-07-07 04:40:13'),
(9, 'siswa', 'Vinna Ainun Zachroh', 'vina@ymail.com', NULL, '$2y$10$CkP9hefifbJyxfTUmHRbjuz0npTX0I8TX8CkSY4YwUXVs/YhozmJG', 'ETzs9EWHPOhcFUZ56FRnEtaCH8FXuwafOP46wnZprmfwjCbZIGOrm1RN1xEx', '2020-07-07 04:41:50', '2020-07-07 04:41:50'),
(10, 'siswa', 'Widya Astuti', 'astuti@ymail.com', NULL, '$2y$10$jQbgR7yJ.vjpCCHquI847eXAx3u553sy4pUB6.kS1FvuVUoSDGmy.', 'hf7fi0QJLPSuzW4MDy9XL8OgF9Mgi7JIcu24r1rrV05lWHyf8yZj51bdCReO', '2020-07-07 04:43:34', '2020-07-07 04:43:34'),
(12, 'siswa', 'Nurul', 'Nurul@ymail.com', NULL, '$2y$10$9SqGKuTD8WJX5DfEBCroEez3zxFULEtq/11OlulCU/raY.vBsoG/G', 'Ibik1tpN7M8tczZ5GKXaoLCFHVrKGXoE04MRycTZuSATj1O4g12bbesBuQPD', '2020-07-07 04:45:26', '2020-07-07 04:45:26'),
(13, 'siswa', 'Panji Maulana', 'panji@ymail.com', NULL, '$2y$10$CclatDn20SrYKT8Yzru24.6LP9mL32upIg9ykeJ8f5MpCVcQvsIqu', 'G6kSaFPvl1PnKOm12ifRtW8VA3q6m4H19kcSdLkQ7mhJrTUBRT8q1Ql5yrr7', '2020-07-07 04:46:28', '2020-07-07 04:46:28'),
(14, 'siswa', 'Puri Retno Wardani', 'puri@ymail.com', NULL, '$2y$10$jQV43AZRI.nAo0/C2DarzO5778Mh6S30SjpC.q86nehonrqNrOh8G', 'N0k91d4lutc24zEttSU19LtDsHEYnI5AAMQ3OYc6bD4M7T9mD2efqlzw4tlQ', '2020-07-07 04:50:27', '2020-07-07 04:50:27'),
(15, 'siswa', 'Tegar Aldiansyah', 'tegar@ymail.com', NULL, '$2y$10$4zMKxKXyEwxuW7H4BVXDn.WHfRshMyfCwHenrnbN0vOaojXkAkvU2', 'QQjNI1dPjoLdVmqk03DSxToBDawHiaYlKFkHrgxI2klQc3FTashx1wakCFFU', '2020-07-07 04:51:37', '2020-07-07 04:51:37'),
(16, 'siswa', 'Zulfikar Ali', 'ali@ymail.com', NULL, '$2y$10$ly3mdzjgfNDjFdVvlii3T.I70kjm989v4wLl.ZtC5oHshYt8zHK5K', 'z6oPrK7L5f1NbcqiTxlpcwk8ppZmRuD7aBoHHqJtqP4BACoQLlkyzlzHnps3', '2020-07-07 04:53:44', '2020-07-07 04:53:44'),
(17, 'guru', 'LINA SITI HASANAH', 'lina@ymail.com', NULL, '$2y$10$3C7m0LJdSUqSuBUCLa48fe61mzWB4CQrIdZ2SVonseDgHhbexv84S', 'fwonvxreTpcIGeJr4lX6XmluNnXU6GbNFYzKXWd1ZUUJKgIm6kVpsCD0H2RH', '2020-07-07 05:37:52', '2020-07-07 05:37:52'),
(18, 'guru', 'GUN GUN GUNAWAN', 'gungun@ymail.com', NULL, '$2y$10$SdGvG3RWME7yi6Vif4x.i.Rv83QzV2v1pXO2DyvvwiwDFe8/1Ih9W', '8tx5m5XkSxGdXMhLrxuFGqFuwq4eRGC3M3rTLqCM1zP8Pb0eFFAMKc3qUYor', '2020-07-07 05:49:25', '2020-07-07 05:49:25'),
(19, 'guru', 'Tri Rosita', 'tri@ymail.com', NULL, '$2y$10$r/BXqp3pqbo7qxcNGg2egOKE6VT1JvWXgVp56/3bGQHQVrT8g1ShC', 'BbJW0BDeqFPCylyphJ56rlJatFZwfG9xUiyg5DyAiSabblbhp57zhHkocrhc', '2020-07-07 05:51:31', '2020-07-07 05:51:31'),
(20, 'guru', 'Hj. Maisari', 'maisari@ymail.com', NULL, '$2y$10$zja2Nq9SYmmjefSDdWn48ekUBnGYZr7oiKmNn65MxTzdgU3P3BeB2', 'R4BZoVKsuPDck9qmQEiWmEmdfrlYSQhxJGH7Yau5p1qGqCUEmolb1Fx7P6Rc', '2020-07-07 05:57:56', '2020-07-07 05:57:56'),
(21, 'tu', 'M Robi', 'robi@ymail.com', NULL, '$2y$10$Y2X9tyzG1bmqigBOnA4OUuY0hDHwOGIOgi17JVeUKC/lFY.G9bB1u', '8k2YPwl2eXZi0BNCPxnCLOUgYnL3s5GGXKe4TrKX3tFZvnS1agesy0zlhkZe', '2020-07-07 06:12:13', '2020-07-07 06:12:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buatsoal`
--
ALTER TABLE `buatsoal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jawabujian`
--
ALTER TABLE `jawabujian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jurnalsikap`
--
ALTER TABLE `jurnalsikap`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kompeahli`
--
ALTER TABLE `kompeahli`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kompedas`
--
ALTER TABLE `kompedas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lemkokin`
--
ALTER TABLE `lemkokin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `listabsen`
--
ALTER TABLE `listabsen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `listskorkinerja`
--
ALTER TABLE `listskorkinerja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `listujian`
--
ALTER TABLE `listujian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilaikarakter`
--
ALTER TABLE `nilaikarakter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilairaport`
--
ALTER TABLE `nilairaport`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `penilaiandiri`
--
ALTER TABLE `penilaiandiri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penilaianteman`
--
ALTER TABLE `penilaianteman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pernyataandiri`
--
ALTER TABLE `pernyataandiri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pernyataanteman`
--
ALTER TABLE `pernyataanteman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rekniltu`
--
ALTER TABLE `rekniltu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reprakems`
--
ALTER TABLE `reprakems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rombel`
--
ALTER TABLE `rombel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `buatsoal`
--
ALTER TABLE `buatsoal`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `jawabujian`
--
ALTER TABLE `jawabujian`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `jurnalsikap`
--
ALTER TABLE `jurnalsikap`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `kompeahli`
--
ALTER TABLE `kompeahli`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kompedas`
--
ALTER TABLE `kompedas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lemkokin`
--
ALTER TABLE `lemkokin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `listabsen`
--
ALTER TABLE `listabsen`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `listskorkinerja`
--
ALTER TABLE `listskorkinerja`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `listujian`
--
ALTER TABLE `listujian`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `nilaikarakter`
--
ALTER TABLE `nilaikarakter`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `nilairaport`
--
ALTER TABLE `nilairaport`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penilaiandiri`
--
ALTER TABLE `penilaiandiri`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `penilaianteman`
--
ALTER TABLE `penilaianteman`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pernyataandiri`
--
ALTER TABLE `pernyataandiri`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pernyataanteman`
--
ALTER TABLE `pernyataanteman`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rekniltu`
--
ALTER TABLE `rekniltu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reprakems`
--
ALTER TABLE `reprakems`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rombel`
--
ALTER TABLE `rombel`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
