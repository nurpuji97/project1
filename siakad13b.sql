-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Jun 2020 pada 17.04
-- Versi server: 10.1.34-MariaDB
-- Versi PHP: 7.1.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siakad13b`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi`
--

CREATE TABLE `absensi` (
  `id` int(10) UNSIGNED NOT NULL,
  `listabsen_id` int(10) UNSIGNED NOT NULL,
  `siswa_id` int(10) UNSIGNED NOT NULL,
  `per1` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `buatsoal`
--

CREATE TABLE `buatsoal` (
  `id` int(10) UNSIGNED NOT NULL,
  `list_ujian_id` int(10) UNSIGNED NOT NULL,
  `question_number` int(11) DEFAULT NULL,
  `soal_text` text COLLATE utf8mb4_unicode_ci,
  `soal_gambar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `id` int(10) UNSIGNED NOT NULL,
  `nip` varchar(8) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `npwp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_guru` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `jawabujian`
--

CREATE TABLE `jawabujian` (
  `id` int(10) UNSIGNED NOT NULL,
  `buat_soal_id` int(10) UNSIGNED NOT NULL,
  `is_correct` int(11) DEFAULT NULL,
  `jawaban` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurnalsikap`
--

CREATE TABLE `jurnalsikap` (
  `id` int(10) UNSIGNED NOT NULL,
  `tanggal` date DEFAULT NULL,
  `siswa_id` int(10) UNSIGNED NOT NULL,
  `kelas_id` int(10) UNSIGNED NOT NULL,
  `nilaikarakter_id` int(10) UNSIGNED NOT NULL,
  `catatan_perilaku` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id` int(10) UNSIGNED NOT NULL,
  `tingkat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kompeahli_id` int(10) UNSIGNED NOT NULL,
  `rombel` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kompeahli`
--

CREATE TABLE `kompeahli` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_kom` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `lemkokin`
--

CREATE TABLE `lemkokin` (
  `id` int(10) UNSIGNED NOT NULL,
  `list_skor_kinerja_id` int(10) UNSIGNED NOT NULL,
  `komponen` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_komponen` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `listabsen`
--

CREATE TABLE `listabsen` (
  `id` int(10) UNSIGNED NOT NULL,
  `guru_id` int(10) UNSIGNED NOT NULL,
  `mapel_id` int(10) UNSIGNED NOT NULL,
  `semester_id` int(10) UNSIGNED NOT NULL,
  `kelas_id` int(10) UNSIGNED NOT NULL,
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
-- Struktur dari tabel `listskorkinerja`
--

CREATE TABLE `listskorkinerja` (
  `id` int(10) UNSIGNED NOT NULL,
  `guru_id` int(10) UNSIGNED NOT NULL,
  `mapel_id` int(10) UNSIGNED NOT NULL,
  `semester_id` int(10) UNSIGNED NOT NULL,
  `kelas_id` int(10) UNSIGNED NOT NULL,
  `model_skor` enum('praktik','proyek') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_model_skor` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bobot_persiapan` int(11) DEFAULT NULL,
  `bobot_proses` int(11) DEFAULT NULL,
  `bobot_hasil` int(11) DEFAULT NULL,
  `deskripsi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `listujian`
--

CREATE TABLE `listujian` (
  `id` int(10) UNSIGNED NOT NULL,
  `guru_id` int(10) UNSIGNED NOT NULL,
  `mapel_id` int(10) UNSIGNED NOT NULL,
  `semester_id` int(10) UNSIGNED NOT NULL,
  `kelas_id` int(10) UNSIGNED NOT NULL,
  `exam_datetime` datetime DEFAULT NULL,
  `exam_end` datetime DEFAULT NULL,
  `exam_duration` int(11) DEFAULT NULL,
  `total_question` int(11) DEFAULT NULL,
  `jenis_ujian` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel`
--

CREATE TABLE `mapel` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_mapel` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_06_12_012203_create_siswa_table', 1),
(4, '2020_06_12_012509_create_guru_table', 1),
(5, '2020_06_12_015901_create_kompeahli_table', 1),
(6, '2020_06_12_020059_create_kelas_table', 1),
(7, '2020_06_12_030401_create_nilaikarakter_table', 1),
(8, '2020_06_12_031402_create_jurnalsikap_table', 1),
(9, '2020_06_12_031714_create_mapel_table', 1),
(10, '2020_06_12_032358_create_semester_table', 1),
(11, '2020_06_12_032444_create_listujian_table', 1),
(12, '2020_06_12_150812_create_rombel_table', 1),
(13, '2020_06_12_151716_create_buatsoal_table', 1),
(14, '2020_06_12_152510_create_jawabujian_table', 1),
(15, '2020_06_12_153228_create_listskorkinerja_table', 1),
(16, '2020_06_12_153708_create_lemkokin_table', 1),
(17, '2020_06_12_154305_create_reprakems_table', 1),
(18, '2020_06_12_155138_create_rekniltu_table', 1),
(19, '2020_06_12_155538_create_nilairaport_table', 1),
(20, '2020_06_12_160055_create_listabsen_table', 1),
(21, '2020_06_12_160532_create_absensi_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilaikarakter`
--

CREATE TABLE `nilaikarakter` (
  `id` int(10) UNSIGNED NOT NULL,
  `nuppk` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilairaport`
--

CREATE TABLE `nilairaport` (
  `id` int(10) UNSIGNED NOT NULL,
  `siswa_id` int(10) UNSIGNED NOT NULL,
  `mapel_id` int(10) UNSIGNED NOT NULL,
  `semester_id` int(10) UNSIGNED NOT NULL,
  `kelas_id` int(10) UNSIGNED NOT NULL,
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
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekniltu`
--

CREATE TABLE `rekniltu` (
  `id` int(10) UNSIGNED NOT NULL,
  `siswa_id` int(10) UNSIGNED NOT NULL,
  `mapel_id` int(10) UNSIGNED NOT NULL,
  `semester_id` int(10) UNSIGNED NOT NULL,
  `kelas_id` int(10) UNSIGNED NOT NULL,
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
-- Struktur dari tabel `reprakems`
--

CREATE TABLE `reprakems` (
  `id` int(10) UNSIGNED NOT NULL,
  `siswa_id` int(10) UNSIGNED NOT NULL,
  `mapel_id` int(10) UNSIGNED NOT NULL,
  `semester_id` int(10) UNSIGNED NOT NULL,
  `kelas_id` int(10) UNSIGNED NOT NULL,
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
-- Struktur dari tabel `rombel`
--

CREATE TABLE `rombel` (
  `id` int(10) UNSIGNED NOT NULL,
  `siswa_id` int(10) UNSIGNED NOT NULL,
  `kelas_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `semester`
--

CREATE TABLE `semester` (
  `id` int(10) UNSIGNED NOT NULL,
  `Semester` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahunpelajaran` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id` int(10) UNSIGNED NOT NULL,
  `nis` varchar(8) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nisn` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `absensi_listabsen_id_foreign` (`listabsen_id`),
  ADD KEY `absensi_siswa_id_foreign` (`siswa_id`);

--
-- Indeks untuk tabel `buatsoal`
--
ALTER TABLE `buatsoal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `buatsoal_list_ujian_id_foreign` (`list_ujian_id`);

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`),
  ADD KEY `guru_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `jawabujian`
--
ALTER TABLE `jawabujian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jawabujian_buat_soal_id_foreign` (`buat_soal_id`);

--
-- Indeks untuk tabel `jurnalsikap`
--
ALTER TABLE `jurnalsikap`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jurnalsikap_siswa_id_foreign` (`siswa_id`),
  ADD KEY `jurnalsikap_kelas_id_foreign` (`kelas_id`),
  ADD KEY `jurnalsikap_nilaikarakter_id_foreign` (`nilaikarakter_id`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kelas_kompeahli_id_foreign` (`kompeahli_id`);

--
-- Indeks untuk tabel `kompeahli`
--
ALTER TABLE `kompeahli`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `lemkokin`
--
ALTER TABLE `lemkokin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lemkokin_list_skor_kinerja_id_foreign` (`list_skor_kinerja_id`);

--
-- Indeks untuk tabel `listabsen`
--
ALTER TABLE `listabsen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `listabsen_guru_id_foreign` (`guru_id`),
  ADD KEY `listabsen_mapel_id_foreign` (`mapel_id`),
  ADD KEY `listabsen_semester_id_foreign` (`semester_id`),
  ADD KEY `listabsen_kelas_id_foreign` (`kelas_id`);

--
-- Indeks untuk tabel `listskorkinerja`
--
ALTER TABLE `listskorkinerja`
  ADD PRIMARY KEY (`id`),
  ADD KEY `listskorkinerja_guru_id_foreign` (`guru_id`),
  ADD KEY `listskorkinerja_mapel_id_foreign` (`mapel_id`),
  ADD KEY `listskorkinerja_semester_id_foreign` (`semester_id`),
  ADD KEY `listskorkinerja_kelas_id_foreign` (`kelas_id`);

--
-- Indeks untuk tabel `listujian`
--
ALTER TABLE `listujian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `listujian_guru_id_foreign` (`guru_id`),
  ADD KEY `listujian_mapel_id_foreign` (`mapel_id`),
  ADD KEY `listujian_semester_id_foreign` (`semester_id`),
  ADD KEY `listujian_kelas_id_foreign` (`kelas_id`);

--
-- Indeks untuk tabel `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nilaikarakter`
--
ALTER TABLE `nilaikarakter`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nilairaport`
--
ALTER TABLE `nilairaport`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nilairaport_siswa_id_foreign` (`siswa_id`),
  ADD KEY `nilairaport_mapel_id_foreign` (`mapel_id`),
  ADD KEY `nilairaport_semester_id_foreign` (`semester_id`),
  ADD KEY `nilairaport_kelas_id_foreign` (`kelas_id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `rekniltu`
--
ALTER TABLE `rekniltu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rekniltu_siswa_id_foreign` (`siswa_id`),
  ADD KEY `rekniltu_mapel_id_foreign` (`mapel_id`),
  ADD KEY `rekniltu_semester_id_foreign` (`semester_id`),
  ADD KEY `rekniltu_kelas_id_foreign` (`kelas_id`);

--
-- Indeks untuk tabel `reprakems`
--
ALTER TABLE `reprakems`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reprakems_siswa_id_foreign` (`siswa_id`),
  ADD KEY `reprakems_mapel_id_foreign` (`mapel_id`),
  ADD KEY `reprakems_semester_id_foreign` (`semester_id`),
  ADD KEY `reprakems_kelas_id_foreign` (`kelas_id`);

--
-- Indeks untuk tabel `rombel`
--
ALTER TABLE `rombel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rombel_siswa_id_foreign` (`siswa_id`),
  ADD KEY `rombel_kelas_id_foreign` (`kelas_id`);

--
-- Indeks untuk tabel `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `siswa_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT untuk tabel `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `buatsoal`
--
ALTER TABLE `buatsoal`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `guru`
--
ALTER TABLE `guru`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jawabujian`
--
ALTER TABLE `jawabujian`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jurnalsikap`
--
ALTER TABLE `jurnalsikap`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kompeahli`
--
ALTER TABLE `kompeahli`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `lemkokin`
--
ALTER TABLE `lemkokin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `listabsen`
--
ALTER TABLE `listabsen`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `listskorkinerja`
--
ALTER TABLE `listskorkinerja`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `listujian`
--
ALTER TABLE `listujian`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `nilaikarakter`
--
ALTER TABLE `nilaikarakter`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `nilairaport`
--
ALTER TABLE `nilairaport`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `rekniltu`
--
ALTER TABLE `rekniltu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `reprakems`
--
ALTER TABLE `reprakems`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `rombel`
--
ALTER TABLE `rombel`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `semester`
--
ALTER TABLE `semester`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD CONSTRAINT `absensi_listabsen_id_foreign` FOREIGN KEY (`listabsen_id`) REFERENCES `listabsen` (`id`),
  ADD CONSTRAINT `absensi_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id`);

--
-- Ketidakleluasaan untuk tabel `buatsoal`
--
ALTER TABLE `buatsoal`
  ADD CONSTRAINT `buatsoal_list_ujian_id_foreign` FOREIGN KEY (`list_ujian_id`) REFERENCES `listujian` (`id`);

--
-- Ketidakleluasaan untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `guru_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `jawabujian`
--
ALTER TABLE `jawabujian`
  ADD CONSTRAINT `jawabujian_buat_soal_id_foreign` FOREIGN KEY (`buat_soal_id`) REFERENCES `buatsoal` (`id`);

--
-- Ketidakleluasaan untuk tabel `jurnalsikap`
--
ALTER TABLE `jurnalsikap`
  ADD CONSTRAINT `jurnalsikap_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`),
  ADD CONSTRAINT `jurnalsikap_nilaikarakter_id_foreign` FOREIGN KEY (`nilaikarakter_id`) REFERENCES `nilaikarakter` (`id`),
  ADD CONSTRAINT `jurnalsikap_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id`);

--
-- Ketidakleluasaan untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_kompeahli_id_foreign` FOREIGN KEY (`kompeahli_id`) REFERENCES `kompeahli` (`id`);

--
-- Ketidakleluasaan untuk tabel `lemkokin`
--
ALTER TABLE `lemkokin`
  ADD CONSTRAINT `lemkokin_list_skor_kinerja_id_foreign` FOREIGN KEY (`list_skor_kinerja_id`) REFERENCES `listskorkinerja` (`id`);

--
-- Ketidakleluasaan untuk tabel `listabsen`
--
ALTER TABLE `listabsen`
  ADD CONSTRAINT `listabsen_guru_id_foreign` FOREIGN KEY (`guru_id`) REFERENCES `guru` (`id`),
  ADD CONSTRAINT `listabsen_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`),
  ADD CONSTRAINT `listabsen_mapel_id_foreign` FOREIGN KEY (`mapel_id`) REFERENCES `mapel` (`id`),
  ADD CONSTRAINT `listabsen_semester_id_foreign` FOREIGN KEY (`semester_id`) REFERENCES `semester` (`id`);

--
-- Ketidakleluasaan untuk tabel `listskorkinerja`
--
ALTER TABLE `listskorkinerja`
  ADD CONSTRAINT `listskorkinerja_guru_id_foreign` FOREIGN KEY (`guru_id`) REFERENCES `guru` (`id`),
  ADD CONSTRAINT `listskorkinerja_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`),
  ADD CONSTRAINT `listskorkinerja_mapel_id_foreign` FOREIGN KEY (`mapel_id`) REFERENCES `mapel` (`id`),
  ADD CONSTRAINT `listskorkinerja_semester_id_foreign` FOREIGN KEY (`semester_id`) REFERENCES `semester` (`id`);

--
-- Ketidakleluasaan untuk tabel `listujian`
--
ALTER TABLE `listujian`
  ADD CONSTRAINT `listujian_guru_id_foreign` FOREIGN KEY (`guru_id`) REFERENCES `guru` (`id`),
  ADD CONSTRAINT `listujian_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`),
  ADD CONSTRAINT `listujian_mapel_id_foreign` FOREIGN KEY (`mapel_id`) REFERENCES `mapel` (`id`),
  ADD CONSTRAINT `listujian_semester_id_foreign` FOREIGN KEY (`semester_id`) REFERENCES `semester` (`id`);

--
-- Ketidakleluasaan untuk tabel `nilairaport`
--
ALTER TABLE `nilairaport`
  ADD CONSTRAINT `nilairaport_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`),
  ADD CONSTRAINT `nilairaport_mapel_id_foreign` FOREIGN KEY (`mapel_id`) REFERENCES `mapel` (`id`),
  ADD CONSTRAINT `nilairaport_semester_id_foreign` FOREIGN KEY (`semester_id`) REFERENCES `semester` (`id`),
  ADD CONSTRAINT `nilairaport_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id`);

--
-- Ketidakleluasaan untuk tabel `rekniltu`
--
ALTER TABLE `rekniltu`
  ADD CONSTRAINT `rekniltu_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`),
  ADD CONSTRAINT `rekniltu_mapel_id_foreign` FOREIGN KEY (`mapel_id`) REFERENCES `mapel` (`id`),
  ADD CONSTRAINT `rekniltu_semester_id_foreign` FOREIGN KEY (`semester_id`) REFERENCES `semester` (`id`),
  ADD CONSTRAINT `rekniltu_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id`);

--
-- Ketidakleluasaan untuk tabel `reprakems`
--
ALTER TABLE `reprakems`
  ADD CONSTRAINT `reprakems_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`),
  ADD CONSTRAINT `reprakems_mapel_id_foreign` FOREIGN KEY (`mapel_id`) REFERENCES `mapel` (`id`),
  ADD CONSTRAINT `reprakems_semester_id_foreign` FOREIGN KEY (`semester_id`) REFERENCES `semester` (`id`),
  ADD CONSTRAINT `reprakems_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id`);

--
-- Ketidakleluasaan untuk tabel `rombel`
--
ALTER TABLE `rombel`
  ADD CONSTRAINT `rombel_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`),
  ADD CONSTRAINT `rombel_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id`);

--
-- Ketidakleluasaan untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
