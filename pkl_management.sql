-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2024 at 12:00 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pkl_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `keterangan` enum('Masuk','Alpa','Telat','Sakit') NOT NULL,
  `tanggal` date NOT NULL,
  `jam_masuk` time DEFAULT NULL,
  `foto_in` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id`, `user_id`, `keterangan`, `tanggal`, `jam_masuk`, `foto_in`) VALUES
(1, 3, 'Masuk', '2024-01-10', '10:07:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `instansi`
--

CREATE TABLE `instansi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_auth` int(11) DEFAULT NULL,
  `nama_instansi` varchar(50) NOT NULL,
  `npsn` varchar(15) NOT NULL,
  `jenis_sekolah` enum('negeri','swasta') NOT NULL DEFAULT 'negeri',
  `alamat` varchar(100) NOT NULL,
  `telepon` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `instansi`
--

INSERT INTO `instansi` (`id`, `id_auth`, `nama_instansi`, `npsn`, `jenis_sekolah`, `alamat`, `telepon`) VALUES
(1, 9, 'Pasimdan', '00993183', 'swasta', 'Pasim Prana', '00839842'),
(2, 11, 'SMEA', '001381713', 'negeri', 'gwaegWEG', '735614'),
(5, NULL, 'SMK 1 Kota Sukabumi', '1221239', 'negeri', 'Benteng', '095629379403'),
(6, 18, 'Hayyatan Thoyiiba', '00928381', 'negeri', 'Hatoy', '0895295830204'),
(7, 19, 'SMK 2 Kota Sukabumi', '01239012', 'negeri', 'Jl Pelabuhan 2', '0895348062299');

-- --------------------------------------------------------

--
-- Table structure for table `jurnal`
--

CREATE TABLE `jurnal` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_mentor` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `foto_jr` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jurnal`
--

INSERT INTO `jurnal` (`id`, `id_siswa`, `id_mentor`, `keterangan`, `foto_jr`) VALUES
(1, 3, 3, 'asdas', '1704856002.pdf'),
(2, 3, 3, 'asdsaw', '1704856923.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `log_pengajuan`
--

CREATE TABLE `log_pengajuan` (
  `id` int(11) NOT NULL,
  `id_pengajuan` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `komentar` varchar(200) NOT NULL,
  `status_log` enum('Draft','Diserahkan','Ditunda','Diterima','Ditolak') NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `log_pengajuan`
--

INSERT INTO `log_pengajuan` (`id`, `id_pengajuan`, `username`, `komentar`, `status_log`, `timestamp`) VALUES
(1, 4, 'admin', 'Tes', 'Ditunda', '2024-01-11 15:24:01'),
(3, 4, 'admin', 'Selamat', 'Diterima', '2024-01-11 15:25:10'),
(4, 4, 'admin', 'Ditolak', 'Ditolak', '2024-01-16 14:28:06'),
(5, 4, 'rico22', 'oke', 'Draft', '2024-01-16 15:33:27'),
(8, 4, 'admin', 'tunda ya', 'Ditunda', '2024-01-16 15:36:17'),
(9, 4, 'rico22', 'iya', 'Ditunda', '2024-01-16 15:36:31'),
(10, 5, 'admin', 'Tunggu ya', 'Ditunda', '2024-01-17 04:43:42'),
(11, 5, 'smea2', 'Baik', 'Ditunda', '2024-01-17 04:43:50'),
(12, 5, 'admin', 'sudah di acc', 'Diterima', '2024-01-17 04:44:03');

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_mentor` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `file_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`id`, `id_siswa`, `id_mentor`, `keterangan`, `file_name`) VALUES
(1, 2, 2, 'asdsd', '1704856039.pdf'),
(2, 2, 2, 'asdasd', '1704856832.pdf'),
(3, 2, 2, 'tes', '1704858354.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `mentor`
--

CREATE TABLE `mentor` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_auth` int(11) NOT NULL,
  `nama_mentor` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `jenis_kelamin` enum('pria','wanita') NOT NULL,
  `agama` varchar(50) NOT NULL,
  `no_telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(2, '2023_11_05_020653_create_absensi_table', 1),
(3, '2023_11_05_060803_create_instansi_table', 1),
(4, '2023_11_05_154706_create_staff_table', 1),
(5, '2023_11_05_160657_create_tim_table', 1),
(6, '2023_11_05_162742_create_siswa_table', 1),
(7, '2023_11_05_163119_create_pembimbing_table', 1),
(8, '2023_11_05_165201_create_mentor_table', 1),
(9, '2023_11_05_171224_create_jurnal_table', 1),
(10, '2023_11_21_145839_pengajuan', 1),
(11, '2024_01_09_125123_create_pengajuans_table', 2),
(12, '2024_01_09_174033_materi_tabels', 2);

-- --------------------------------------------------------

--
-- Table structure for table `pembimbing`
--

CREATE TABLE `pembimbing` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_auth` int(11) NOT NULL,
  `id_instansi` int(11) NOT NULL,
  `nama_pembimbing` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `jenis_kelamin` enum('pria','wanita') NOT NULL,
  `agama` varchar(50) NOT NULL,
  `no_telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembimbing`
--

INSERT INTO `pembimbing` (`id`, `id_auth`, `id_instansi`, `nama_pembimbing`, `tgl_lahir`, `alamat`, `jenis_kelamin`, `agama`, `no_telp`) VALUES
(1, 6, 1, 'Siti Aisyah', '2024-01-15', 'Jl Pipit no 5k', 'wanita', 'islam', '089535860395'),
(12, 20, 7, 'Samuel Silalahi', '2000-03-07', 'Benteng', 'pria', 'kristen', '085683020583');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_instansi` int(11) NOT NULL,
  `id_tim` int(11) NOT NULL,
  `id_staff` int(11) DEFAULT NULL,
  `dokumen` varchar(50) NOT NULL,
  `status_pengajuan` enum('Draft','Diserahkan','Ditunda','Diterima','Ditolak') NOT NULL DEFAULT 'Draft'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengajuan`
--

INSERT INTO `pengajuan` (`id`, `id_instansi`, `id_tim`, `id_staff`, `dokumen`, `status_pengajuan`) VALUES
(4, 1, 2, NULL, '1704857878.pdf', 'Ditunda'),
(5, 7, 5, NULL, '1705466585.pdf', 'Diterima');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_auth` int(11) NOT NULL,
  `id_instansi` int(11) NOT NULL,
  `nis` int(11) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `jenis_kelamin` enum('pria','wanita') NOT NULL,
  `agama` varchar(50) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `jurusan` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `id_auth`, `id_instansi`, `nis`, `nama_siswa`, `tgl_lahir`, `alamat`, `jenis_kelamin`, `agama`, `no_telp`, `jurusan`) VALUES
(4, 12, 2, 93210214, 'Haikal Mulya P', '2024-02-07', 'Pipit', 'pria', 'kong hu cu', '262425', 'Rekayasa Perangkat Lunak'),
(5, 7, 1, 8278192, 'Budi', '2024-01-23', 'Nanggeleng', 'pria', 'kong hu cu', '082793820382', 'Rekayasa Perangkat Lunak'),
(6, 13, 1, 73434535, 'Rio Andria', '2024-01-29', 'Cibereum', 'pria', 'kong hu cu', '085683760937', 'Teknik Komputer Jaringan'),
(7, 21, 7, 201231, 'Riska Maulidia', '2004-01-02', 'Kebon Jeruk', 'pria', 'islam', '083294020291', 'Rekayasa Perangkat Lunak'),
(8, 22, 7, 9219381, 'Ridho Pamungkas', '2024-01-31', 'Kelapa Gading', 'pria', 'kristen', '08613535113', 'Teknik Komputer Jaringan');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_auth` int(11) NOT NULL,
  `nama_staff` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `jenis_kelamin` enum('pria','wanita') NOT NULL,
  `agama` varchar(50) NOT NULL,
  `no_telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `id_auth`, `nama_staff`, `tgl_lahir`, `alamat`, `jenis_kelamin`, `agama`, `no_telp`) VALUES
(1, 16, 'Eko Satriani', '2024-01-10', 'Alamat Saja', 'pria', 'islam', '085638590284'),
(3, 23, 'rizky gumelar', '2024-01-01', 'Kp Rambutan', 'pria', 'kong hu cu', '0865413513');

-- --------------------------------------------------------

--
-- Table structure for table `tim`
--

CREATE TABLE `tim` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_instansi` int(11) NOT NULL,
  `id_pembimbing` int(11) NOT NULL,
  `id_siswa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tim`
--

INSERT INTO `tim` (`id`, `id_instansi`, `id_pembimbing`, `id_siswa`) VALUES
(2, 1, 1, '5|6'),
(5, 7, 12, '7|8');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL,
  `role` enum('admin','mentor','siswa','staff','instansi','pembimbing') NOT NULL,
  `status` enum('aktif','inaktif') NOT NULL DEFAULT 'aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `role`, `status`) VALUES
(1, 'Admin', 'admin', 'admin@gmail.cxom', '$2y$10$wn.m0VAM5Z6NUZyGCKi4veeqagUwwIOy7yq/yfo9wkLH3XkCDXhKO', 'admin', 'aktif'),
(2, 'Mentor', 'mentor', 'mentor@gamil.com', '$2y$10$ublt.rZk9qIgCEuBvV0M1uvfklAt9E4aF4oKgwxXMMr2IG6M6twcq', 'mentor', 'aktif'),
(3, 'User', 'user', 'user@ggamil.com', '$2y$10$6bdUlD6oTyn07GB85Fx.puE3I16ZQ9KImECRL.qSl2QeSsf4XD5Em', 'siswa', 'aktif'),
(4, 'instansi', 'instansi', 'instansi@gmail.com', '$2y$10$cCv7zs/0JfPfeuBwRm0saOI0XOF2mFYmC6Ou1kSUnGWYHcbHQxJ5i', 'instansi', 'aktif'),
(5, 'Staff', 'staff', 'staff@gmail.com', '$2y$10$S3nj750.c9xt9d43P2oLueOizE5hrmoAJ6beTqNrcKRafdVOLImRC', 'staff', 'aktif'),
(6, 'Hosea Sawayn', 'rkreiger', 'heathcote.rosalind@example.net', '$2y$10$U51SmuKThBVzJIoUIX4dV.puIRLE1fP8uLFbaFp6tYiU3.9WhIsF6', 'pembimbing', 'inaktif'),
(7, 'Fritz Carter', 'von.juston', 'greenholt.benton@example.net', '$2y$10$iKuqmqmXrcNuopoefC4lT.rzCfA9NyZfdV9ZOxHTtQgtzmJx63IF2', 'siswa', 'aktif'),
(9, 'Jamal Balistreri', 'rico22', 'urobel@example.net', '$2y$10$wn.m0VAM5Z6NUZyGCKi4veeqagUwwIOy7yq/yfo9wkLH3XkCDXhKO', 'instansi', 'aktif'),
(10, 'Cleo Donnelly', 'crona.adele', 'labadie.anderson@example.com', '$2y$10$tJFh/c.DbF05iXaOrvSzRO1vILom1XA7mU./oofWlRLddmEFPjWeC', 'admin', 'aktif'),
(11, 'Kitty Kirlin', 'heiden', 'jaquelin04@example.com', '$2y$10$YByckTDzcaVEvOL00XVG1eyGzZdmNthhZRknkIU4LVwlXVQdBslw6', 'instansi', 'aktif'),
(12, 'Kieran Gutkowski', 'alfonzo86', 'beier.carmen@example.com', '$2y$10$0gmyLK4LfuVWXtqOaBuple9RwWez3Ujmz9v7v8BgDmbPI9E2cvBka', 'siswa', 'aktif'),
(13, 'Whitney Yost', 'hobart47', 'jovani.braun@example.org', '$2y$10$WARBbwAbMo1hYxDWyR.j3el.rEpMgNM4Lo2QAd7zdaXG6gYs5quTe', 'siswa', 'aktif'),
(14, 'Gussie Windler', 'antoinette47', 'lindsay.kris@example.com', '$2y$10$4e6CYEUTxK/S9XxNVnNyLOWgaJCDT7TiRWeoSntTniLFsFpT7iiwq', 'mentor', 'inaktif'),
(15, 'Dr. Johnathon Koepp DVM', 'jschulist', 'assunta11@example.net', '$2y$10$oPah83o3pbAryQTUE7.ngO/62QZJvpBKcBLQ.h/i6bAIlY2crmkJW', 'admin', 'inaktif'),
(16, 'Eko Satriani', 'eko', 'eko@mail.com', '$2y$10$jzYkl3rChxDeEZczqFEHFu/PXaMjngXtcIk7/X338RJHWjTSeh8Ia', 'staff', 'inaktif'),
(18, 'Hayyatan Thoyiiba', 'hatoy', 'hatoy@mail.com', '$2y$10$DR6Kxfb4FSgOHkDdUVZ48.hbHEY0oHG9JJfUixl6r4xoFRrk2hnI6', 'instansi', 'aktif'),
(19, 'SMK 2 Kota Sukabumi', 'smea2', 'smea@mail.com', '$2y$10$YDaTyMQ9HgEPLBf9cKAME.e1Gr3u0pPG4q9PTt/enRbP8u3VkG7n6', 'instansi', 'inaktif'),
(20, 'Samuel Silalahi', 'samuel', 'samuel@mail.com', '$2y$10$8u48CAFZC3QRYASYeKM/7.l6Wz5Hs/PvEQHAcJb9NCi0m4g7mtlZG', 'pembimbing', 'inaktif'),
(21, 'Riska Maulidia', 'riska', 'riska@mail.com', '$2y$10$lrjCF0liCLTIiOXxLaUziu4dqP0j58/AvyAuY1cg7VvmyLcGM09cS', 'siswa', 'inaktif'),
(22, 'Ridho Pamungkas', 'Ridho', 'ridho@mail.com', '$2y$10$O4rpdcX5mBAXUJScWFrcZ.s1Tj9cpGmv6NMK1svtuAhgpXfzuYxne', 'siswa', 'inaktif'),
(23, 'rizky gumelar', 'Rizki', 'rizki@mail.com', '$2y$10$l0bWzYwWhm9qlZZ3OHHpOu90Ce0NXG.35d7dhOM1aVQKXa88wc7Le', 'staff', 'inaktif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instansi`
--
ALTER TABLE `instansi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jurnal`
--
ALTER TABLE `jurnal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_pengajuan`
--
ALTER TABLE `log_pengajuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mentor`
--
ALTER TABLE `mentor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembimbing`
--
ALTER TABLE `pembimbing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tim`
--
ALTER TABLE `tim`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `instansi`
--
ALTER TABLE `instansi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jurnal`
--
ALTER TABLE `jurnal`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `log_pengajuan`
--
ALTER TABLE `log_pengajuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mentor`
--
ALTER TABLE `mentor`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pembimbing`
--
ALTER TABLE `pembimbing`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tim`
--
ALTER TABLE `tim`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
