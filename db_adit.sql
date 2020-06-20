-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 07, 2020 at 11:16 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_adit`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `password` varchar(65) NOT NULL,
  `foto` varchar(60) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `nama`, `password`, `foto`, `create_at`) VALUES
(1, 'admin', 'Bambang', '$2y$10$ZdYqIyoTsOavtxeAdg14tOx195hEUboURNd5NC1NoXA5QKUoi22dq', 'default.png', '2020-05-26 20:56:18'),
(4, 'tanto', 'tanto', '$2y$10$zlrQMfHPQh3Oy9nOgeDyzOCMdxi/b6NzFX/4P2GT7KkLBinJg4Oou', '7d30fbf37012e94dfbf5a372213d6a0d.jpg', '2020-06-05 22:46:15');

-- --------------------------------------------------------

--
-- Table structure for table `guru_kelas`
--

CREATE TABLE `guru_kelas` (
  `id_guru_kelas` int(11) NOT NULL,
  `id_gtk` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guru_kelas`
--

INSERT INTO `guru_kelas` (`id_guru_kelas`, `id_gtk`, `id_kelas`) VALUES
(1, 2, 2),
(2, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`) VALUES
(2, 'kelas 1'),
(3, 'kelas 2'),
(4, 'Kelas 3');

-- --------------------------------------------------------

--
-- Table structure for table `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `kode_mapel` varchar(30) NOT NULL,
  `nama_mapel` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`kode_mapel`, `nama_mapel`) VALUES
('ips', 'Ilmu Pengetahuan alam'),
('mtk', 'Matematika');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id_pendaftaran` int(11) NOT NULL,
  `kode_pendaftaran` varchar(30) NOT NULL,
  `nisn` int(11) NOT NULL,
  `tanggal` date NOT NULL DEFAULT current_timestamp(),
  `id_tahun_ajaran` int(11) NOT NULL,
  `status` enum('terima','tolak','menunggu') NOT NULL DEFAULT 'menunggu'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nisn` int(30) NOT NULL,
  `nama_siswa` varchar(60) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `tempat_lahir` varchar(60) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `nama_ortu` varchar(60) NOT NULL,
  `telepon_ortu` varchar(13) NOT NULL,
  `alamat_ortu` text NOT NULL,
  `pekerjaan_ortu` varchar(30) NOT NULL,
  `penghasilan_ortu` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tahun_ajaran`
--

CREATE TABLE `tahun_ajaran` (
  `id_tahun_ajaran` int(11) NOT NULL,
  `tahun_mulai` varchar(10) NOT NULL,
  `tahun_akhir` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tahun_ajaran`
--

INSERT INTO `tahun_ajaran` (`id_tahun_ajaran`, `tahun_mulai`, `tahun_akhir`) VALUES
(2, '2020', '2021'),
(3, '2019', '2020');

-- --------------------------------------------------------

--
-- Table structure for table `tenaga_kependidikan`
--

CREATE TABLE `tenaga_kependidikan` (
  `id_tenaga_kependidikan` int(11) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `foto` varchar(60) NOT NULL,
  `nip` varchar(30) DEFAULT NULL,
  `nik` varchar(30) DEFAULT NULL,
  `kelamin` enum('L','P') NOT NULL,
  `tempat_lahir` varchar(60) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` varchar(25) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `hak_akses` enum('guru','pegawai') NOT NULL,
  `password` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tenaga_kependidikan`
--

INSERT INTO `tenaga_kependidikan` (`id_tenaga_kependidikan`, `nama`, `foto`, `nip`, `nik`, `kelamin`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `telepon`, `hak_akses`, `password`) VALUES
(2, 'Siti Nurbaya', 'default.png', '123', '', 'P', 'Yogyakarta', '2020-05-30', 'islam', 'jln.Magelang', '08812423814', 'guru', '$2y$10$7eRHRM66sVMKWw.6.WHPRuwEC7zHL8WW/mNhQ5IEvcZjhJ7HQxOU2'),
(3, 'Yanto', 'default.png', '124', '', 'P', 'Yogyakarta', '2020-05-30', 'islam', 'jln.Magelang', '08812423814', 'pegawai', '$2y$10$7eRHRM66sVMKWw.6.WHPRuwEC7zHL8WW/mNhQ5IEvcZjhJ7HQxOU2'),
(4, 'Test nama', '26a4e536e9f5d9221d117eb70b28e09a.jpg', '12345', '00328529208', 'L', 'Yogyakarta', '2020-06-09', 'islam', 'jogja', '08812423814', 'guru', '$2y$10$20PuwmA6tWq4OZ0soaVtZu5OoUqjVPJZK08h793Ale4SGca2rdFoq');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `guru_kelas`
--
ALTER TABLE `guru_kelas`
  ADD PRIMARY KEY (`id_guru_kelas`),
  ADD KEY `id_gtk` (`id_gtk`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`kode_mapel`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`),
  ADD KEY `nisn` (`nisn`),
  ADD KEY `id_tahun_ajaran` (`id_tahun_ajaran`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nisn`);

--
-- Indexes for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  ADD PRIMARY KEY (`id_tahun_ajaran`);

--
-- Indexes for table `tenaga_kependidikan`
--
ALTER TABLE `tenaga_kependidikan`
  ADD PRIMARY KEY (`id_tenaga_kependidikan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `guru_kelas`
--
ALTER TABLE `guru_kelas`
  MODIFY `id_guru_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id_pendaftaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `nisn` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  MODIFY `id_tahun_ajaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tenaga_kependidikan`
--
ALTER TABLE `tenaga_kependidikan`
  MODIFY `id_tenaga_kependidikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `guru_kelas`
--
ALTER TABLE `guru_kelas`
  ADD CONSTRAINT `guru_kelas_ibfk_1` FOREIGN KEY (`id_gtk`) REFERENCES `tenaga_kependidikan` (`id_tenaga_kependidikan`),
  ADD CONSTRAINT `guru_kelas_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`);

--
-- Constraints for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD CONSTRAINT `pendaftaran_ibfk_1` FOREIGN KEY (`nisn`) REFERENCES `siswa` (`nisn`),
  ADD CONSTRAINT `pendaftaran_ibfk_2` FOREIGN KEY (`id_tahun_ajaran`) REFERENCES `tahun_ajaran` (`id_tahun_ajaran`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
