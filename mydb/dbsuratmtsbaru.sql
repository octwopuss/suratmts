-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Jun 2018 pada 17.24
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbsuratmts`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `email`, `name`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin@admin.com', 'Admin', '$2y$10$lff5C/Zx0LXY06l0J9zHtuGH3uJRW72SlMoLYPVJDcqW/h6lgMCva', 'asKjBlfQm35JdaXDUtyNpV288IhGf8gk7mDkncElLNEDQyNoMOJtsDnKy2bN', NULL, NULL),
(2, 'admin2@admin.com', 'admin2', '$2y$10$wSgP4o1DsmK/rN7e0tH7TOps13FQUTftTmUc2K2.qrJYTiepZm1gG', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_surat`
--

CREATE TABLE `detail_surat` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `tipe_surat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_surat` int(11) NOT NULL,
  `notif` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '0: sedang diproses; 1: diterima; 2: ditolak',
  `user_notif` int(11) NOT NULL DEFAULT '0',
  `comment` longtext COLLATE utf8mb4_unicode_ci,
  `ttd` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(4, '2014_10_12_100000_create_password_resets_table', 1),
(5, '2018_01_22_033408_create_admin_table', 1),
(6, '2018_01_22_034157_create_student_table', 1),
(7, '2018_01_27_010155_create_surat_test_table', 2),
(8, '2018_01_27_163121_create_jenis_surat_table', 2),
(9, '2018_01_30_030046_add_student_f_k_to_surat_test', 3),
(11, '2018_02_01_035110_add_notif_field', 4),
(12, '2018_02_02_022359_add_status_field', 5),
(13, '2018_02_16_034706_add_nomor_surat_field', 6),
(18, '2018_03_10_103418_create_surat_1_a_table', 7),
(19, '2018_03_10_103506_create_surat_1_b_table', 7),
(20, '2018_03_10_103604_create_detail_surat_table', 7),
(21, '2018_03_10_142153_add_users_field', 8),
(24, '2018_03_17_152504_create_detail_surat_table', 9),
(25, '2018_03_19_125310_add_nim_nama_field_to_1b', 10),
(26, '2018_03_20_002933_add_jurusan_student', 11),
(27, '2018_03_20_003215_add_fk_student_to_surat', 12),
(28, '2018_03_20_015950_drop_bidang_pilihan_from_surat', 13),
(29, '2018_03_21_114653_add_nim_nama_bidang', 14),
(31, '2018_03_22_002110_create_ttd_nomor_surat_table', 15),
(32, '2018_03_22_123554_create_ttd_table', 16),
(33, '2018_03_22_130624_add_tipe_id_surat_to_nomor_surat', 17),
(34, '2018_03_22_211141_add_info_to_student', 18),
(36, '2018_03_23_033334_add_status_surat', 19),
(37, '2018_03_23_123513_add_user_notif', 20),
(38, '2018_03_24_101152_add_comment_field', 21),
(39, '2018_03_26_225928_add_kegunaan_field', 22),
(40, '2018_03_27_003430_add_komentar_field', 23),
(41, '2018_03_27_110011_add_judul_tesis_field', 23),
(42, '2018_04_09_195127_create_suratmasuk_table', 24),
(43, '2018_04_09_202151_add_tanggal_field', 25),
(45, '2018_04_09_211540_add_scansurat_field', 26),
(46, '2018_04_26_135000_add_keterangan_field', 27),
(47, '2018_05_01_120552_add_judultesis_storettd', 28),
(48, '2018_05_01_194358_add_penerima_tglmsk_field', 29),
(49, '2018_05_01_214045_add_status_seminar_field', 30),
(52, '2018_05_05_023330_add_semester_1b', 31),
(53, '2018_05_05_121139_add_semester_surat1a', 32);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nomor_surat`
--

CREATE TABLE `nomor_surat` (
  `id` int(10) UNSIGNED NOT NULL,
  `nomor` int(11) NOT NULL DEFAULT '0',
  `tipe_nomor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tipe_surat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_surat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `student`
--

CREATE TABLE `student` (
  `id` int(10) UNSIGNED NOT NULL,
  `nim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` tinyint(3) UNSIGNED DEFAULT NULL COMMENT '1:laki-laki;2:perempuan',
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `major_id` int(10) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `bidang_pilihan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat_rumah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instansi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat_instansi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telepon_instansi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `judul_tesis` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_seminar` int(11) DEFAULT NULL COMMENT '1:Sudah;2:Belum',
  `semester` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `student`
--

INSERT INTO `student` (`id`, `nim`, `nama`, `email`, `password`, `gender`, `phone`, `photo`, `major_id`, `remember_token`, `created_at`, `updated_at`, `bidang_pilihan`, `alamat_rumah`, `instansi`, `alamat_instansi`, `telepon_instansi`, `judul_tesis`, `status_seminar`, `semester`) VALUES
(1, 'H1G115237', 'Yohanes Hendro Wicaksono', 'yohanes@email.com', '$2y$10$gxUYzdNNYN3tosMIZTaWpuRBA8bmxS26FTAXsWBtjZxFkeC0jjqIO', 1, '081251525997', '', 1, 'ybjWUcMm06SDSBzdzgjmk81d3h2uHM8FYtACD9SvY5AwPb6zG7A8pgmqp2Q9', NULL, NULL, 'Matematika', 'Jl. Thamrin no.41', 'TI', 'Banjarmasin', '0533321728', 'Permeabilitas Tanah di Kalimantan Timur', 0, NULL),
(2, 'H1G115230', 'Student Test 2', 'student@test.com', '$2y$10$k8NOI0RF6flT8VBhGqUJoeIBuT88neCm/cynhA9rmBqEyl0y1.hQ6', 1, '081251525522', '', 2, '0h8sOmEkUCiv3ihPSAMHEC4qC26Q25YZtWHczp1bqk7KhjfNEcpgHXgSyCrS', NULL, '2018-05-04 10:07:05', 'Fisika', 'Banjarmasin', 'TI', 'Banjarbaru', '0533321728', 'Penentuan Skala Prioritas Penanganan Jalan Kota di Banjarmasin', 0, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `suratmasuk`
--

CREATE TABLE `suratmasuk` (
  `id` int(10) UNSIGNED NOT NULL,
  `pengirim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_surat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `perihal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tanggal` date NOT NULL,
  `file_surat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penerima` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_diterima` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_1_a`
--

CREATE TABLE `surat_1_a` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bidang_pilihan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_rumah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instansi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_instansi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp_instansi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keperluan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `kegunaan_surat` longtext COLLATE utf8mb4_unicode_ci,
  `semester` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_1_b`
--

CREATE TABLE `surat_1_b` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bidang_pilihan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_rumah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instansi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_instansi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp_instansi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keperluan_data` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instansi_tujuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_tujuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `alasan_keperluan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `judul_tesis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ba_seminar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ttd`
--

CREATE TABLE `ttd` (
  `id` int(10) UNSIGNED NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0',
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NIP` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ttd`
--

INSERT INTO `ttd` (`id`, `active`, `nama`, `NIP`, `jabatan`) VALUES
(1, 0, 'Dr. Mahmud, S.T., M.T.', '19740107 199802 1 001', 'Ketua'),
(2, 1, 'Dr. Eng. Irfan Presetia, S.T., M.T.', '19851026 200812 1 001', 'Sekretaris');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `detail_surat`
--
ALTER TABLE `detail_surat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nomor_surat`
--
ALTER TABLE `nomor_surat`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nomor` (`nomor`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`(191));

--
-- Indeks untuk tabel `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `suratmasuk`
--
ALTER TABLE `suratmasuk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `surat_1_a`
--
ALTER TABLE `surat_1_a`
  ADD PRIMARY KEY (`id`),
  ADD KEY `surat_1_a_student_id_foreign` (`student_id`);

--
-- Indeks untuk tabel `surat_1_b`
--
ALTER TABLE `surat_1_b`
  ADD PRIMARY KEY (`id`),
  ADD KEY `surat_1_b_student_id_foreign` (`student_id`);

--
-- Indeks untuk tabel `ttd`
--
ALTER TABLE `ttd`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `detail_surat`
--
ALTER TABLE `detail_surat`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT untuk tabel `nomor_surat`
--
ALTER TABLE `nomor_surat`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `student`
--
ALTER TABLE `student`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `suratmasuk`
--
ALTER TABLE `suratmasuk`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `surat_1_a`
--
ALTER TABLE `surat_1_a`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `surat_1_b`
--
ALTER TABLE `surat_1_b`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ttd`
--
ALTER TABLE `ttd`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `surat_1_a`
--
ALTER TABLE `surat_1_a`
  ADD CONSTRAINT `surat_1_a_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`);

--
-- Ketidakleluasaan untuk tabel `surat_1_b`
--
ALTER TABLE `surat_1_b`
  ADD CONSTRAINT `surat_1_b_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
