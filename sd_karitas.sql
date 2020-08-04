-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Jul 2020 pada 21.39
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Struktur dari tabel `admin`
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
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `nama`, `password`, `foto`, `create_at`) VALUES
(1, 'admin', 'Bambang', '$2y$10$ZdYqIyoTsOavtxeAdg14tOx195hEUboURNd5NC1NoXA5QKUoi22dq', 'default.png', '2020-05-26 20:56:18'),
(4, 'tanto', 'tanto', '$2y$10$zlrQMfHPQh3Oy9nOgeDyzOCMdxi/b6NzFX/4P2GT7KkLBinJg4Oou', '7d30fbf37012e94dfbf5a372213d6a0d.jpg', '2020-06-05 22:46:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru_kelas`
--

CREATE TABLE `guru_kelas` (
  `id_guru_kelas` int(11) NOT NULL,
  `id_gtk` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `guru_kelas`
--

INSERT INTO `guru_kelas` (`id_guru_kelas`, `id_gtk`, `id_kelas`) VALUES
(7, 2, 5),
(8, 2, 6),
(9, 2, 7),
(10, 2, 9),
(20, 7, 5),
(21, 7, 6),
(22, 7, 7),
(23, 7, 8),
(24, 7, 9),
(25, 7, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru_mengajar`
--

CREATE TABLE `guru_mengajar` (
  `id_guru_mengajar` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `kode_mapel` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `guru_mengajar`
--

INSERT INTO `guru_mengajar` (`id_guru_mengajar`, `id_guru`, `id_kelas`, `kode_mapel`) VALUES
(2, 2, 5, 'mtk'),
(3, 2, 6, 'ips');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`) VALUES
(5, 'kelas 1'),
(6, 'kelas 2'),
(7, 'kelas 3'),
(8, 'kelas 4'),
(9, 'kelas 5'),
(10, 'kelas 6'),
(11, 'Kelas 6 a');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel_kelas`
--

CREATE TABLE `mapel_kelas` (
  `kode_mapel` varchar(30) NOT NULL,
  `id_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mapel_kelas`
--

INSERT INTO `mapel_kelas` (`kode_mapel`, `id_kelas`) VALUES
('mtk', 5),
('ips', 5),
('ips', 6),
('ips', 9),
('PKN', 5),
('PKN', 6),
('PKN', 7),
('PKN', 8),
('PKN', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `kode_mapel` varchar(30) NOT NULL,
  `nama_mapel` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`kode_mapel`, `nama_mapel`) VALUES
('ipa', 'Ilmu Pengetahuan alam'),
('ips', 'Ilmu Pengetahuan alam'),
('mtk', 'Matematika'),
('PKN', 'Pendidikan Kewarganegaraan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `nisn` int(30) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_tahun_ajaran` int(11) NOT NULL,
  `kode_mapel` varchar(30) NOT NULL,
  `nilai_harian` varchar(30) NOT NULL,
  `nilai_uts` varchar(30) NOT NULL,
  `nilai_uas` varchar(30) NOT NULL,
  `nilai_total` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `nisn`, `id_kelas`, `id_tahun_ajaran`, `kode_mapel`, `nilai_harian`, `nilai_uts`, `nilai_uas`, `nilai_total`) VALUES
(4, 11234, 5, 4, 'mtk', '90', '90', '80', '87');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id_pendaftaran` int(11) NOT NULL,
  `kode_pendaftaran` varchar(30) NOT NULL,
  `nisn` int(11) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT current_timestamp(),
  `id_tahun_ajaran` int(11) NOT NULL,
  `status` enum('terima','tolak','menunggu') NOT NULL DEFAULT 'menunggu'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pendaftaran`
--

INSERT INTO `pendaftaran` (`id_pendaftaran`, `kode_pendaftaran`, `nisn`, `tanggal`, `id_tahun_ajaran`, `status`) VALUES
(3, '20/0001', 12345, '2020-06-08 22:32:31', 3, 'terima'),
(6, '20/0002', 91393904, '2020-06-09 01:24:46', 3, 'terima'),
(7, '20/0003', 44321, '2020-06-09 01:26:18', 3, 'tolak'),
(8, '20/0004', 12345689, '2020-06-15 14:38:04', 3, 'terima'),
(11, '20/0005', 4534737, '2020-06-21 15:36:59', 3, 'tolak'),
(12, '20/0006', 11234, '2020-06-26 21:31:06', 3, 'terima'),
(13, '20/0007', 3293, '2020-07-11 13:04:47', 4, 'menunggu'),
(14, '20/0008', 32424, '2020-07-11 13:27:42', 4, 'menunggu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_kelas`
--

CREATE TABLE `riwayat_kelas` (
  `id_riwayat` int(11) NOT NULL,
  `nisn` int(30) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_tahun_ajaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `riwayat_kelas`
--

INSERT INTO `riwayat_kelas` (`id_riwayat`, `nisn`, `id_kelas`, `id_tahun_ajaran`) VALUES
(5, 44321, 5, 3),
(6, 91393904, 5, 3),
(8, 12345, 5, 3),
(9, 12345, 6, 3),
(10, 91393904, 6, 3),
(11, 12345689, 5, 3),
(12, 12345, 7, 3),
(13, 12345689, 6, 3),
(15, 12345689, 7, 3),
(16, 12345, 6, 3),
(17, 12345, 7, 3),
(18, 11234, 5, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `nisn` int(30) NOT NULL,
  `nama_siswa` varchar(60) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `id_kelas` int(11) NOT NULL,
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

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`nisn`, `nama_siswa`, `jenis_kelamin`, `id_kelas`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `nama_ortu`, `telepon_ortu`, `alamat_ortu`, `pekerjaan_ortu`, `penghasilan_ortu`) VALUES
(3293, 'RIZKI123$24', 'L', 5, 'Yogyakarta1', '2020-07-01', 'FISJEF2', 'FNJEKFNEKF', 'JNFEWF', '9029830', 'NFJENFKENFRE', 'FNJEFNEEF', '21232324'),
(11234, 'aryo', 'L', 5, 'Yogyakarta', '2020-06-10', 'islam', 'jogja', 'bambang', '07287653', 'joigja', 'karyawan', '100000'),
(12345, 'Agung herkules', 'P', 8, 'Yogyakarta', '2020-06-01', 'islam', 'sleman', 'bambang', '098789876512', 'jogja', 'karyawan', '100000'),
(32424, '32435353', 'L', 5, '332', '2020-07-22', 'W2323', 'FEWFEWF', 'FEWFEWF', '322424', 'EFEFREFRE', 'EFWFEWF', '323232'),
(44321, 'warsito', 'L', 6, 'Yogyakarta', '2020-06-03', 'islam', 'jogja', 'Nursiyah', '35353', 'jogja', 'karyawan', '100000'),
(4534737, 'Aditya', 'L', 5, 'Sleman', '1945-06-11', 'islam', 'Sleman', 'Riski', '098756756', 'Sleman', 'Swasta', '20000000'),
(12345689, 'adit', 'P', 8, 'Yogyakarta', '2020-06-02', 'islam', 'jogja', 'Bambang', '07832682', 'jogja', 'karyawan', '100000'),
(91393904, 'Siti Nurbaya', 'L', 10, 'Yogyakarta', '2020-06-01', 'islam', 'jogja', 'Bambang', '07832682', 'jogja', 'karyawan', '100000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahun_ajaran`
--

CREATE TABLE `tahun_ajaran` (
  `id_tahun_ajaran` int(11) NOT NULL,
  `tahun_mulai` varchar(10) NOT NULL,
  `tahun_akhir` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tahun_ajaran`
--

INSERT INTO `tahun_ajaran` (`id_tahun_ajaran`, `tahun_mulai`, `tahun_akhir`) VALUES
(3, '2019', '2020'),
(4, '2020', '2021');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tenaga_kependidikan`
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
-- Dumping data untuk tabel `tenaga_kependidikan`
--

INSERT INTO `tenaga_kependidikan` (`id_tenaga_kependidikan`, `nama`, `foto`, `nip`, `nik`, `kelamin`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `telepon`, `hak_akses`, `password`) VALUES
(2, 'Siti Nurbaya', 'default.png', '1245678', '', 'P', 'Yogyakarta', '2020-05-30', 'islam', 'jln.Magelang', '08812423814', 'guru', '$2y$10$7eRHRM66sVMKWw.6.WHPRuwEC7zHL8WW/mNhQ5IEvcZjhJ7HQxOU2'),
(5, 'aryo', 'default.png', '123', '123', 'L', 'Yogyakarta', '2020-06-23', 'islam', 'jogja', '08812423814', 'pegawai', '$2y$10$iFlTngnocsM2DKxXfIAa4exokWJZgAkBOTfDFcL02NJX7koS4qi3S'),
(6, 'adit', 'default.png', '3434', '6666', 'P', 'medan', '2015-06-06', 'islam', 'sleman', '87877', 'pegawai', '$2y$10$xdHfGUUJY.t/qwCxylBMduKFpqXI9c704Q/UWrhIkz2v6mnhs1LXC'),
(7, 'lance', 'default.png', '333', '33342', 'L', 'Sleman', '2020-05-30', 'islam', 'sleman', '765747', 'guru', '$2y$10$7eRHRM66sVMKWw.6.WHPRuwEC7zHL8WW/mNhQ5IEvcZjhJ7HQxOU2');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `guru_kelas`
--
ALTER TABLE `guru_kelas`
  ADD PRIMARY KEY (`id_guru_kelas`),
  ADD KEY `id_gtk` (`id_gtk`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indeks untuk tabel `guru_mengajar`
--
ALTER TABLE `guru_mengajar`
  ADD PRIMARY KEY (`id_guru_mengajar`),
  ADD KEY `id_guru` (`id_guru`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `kode_mapel` (`kode_mapel`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `mapel_kelas`
--
ALTER TABLE `mapel_kelas`
  ADD KEY `kode_mapel` (`kode_mapel`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indeks untuk tabel `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`kode_mapel`);

--
-- Indeks untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_tahun_ajaran` (`id_tahun_ajaran`),
  ADD KEY `kode_mapel` (`kode_mapel`),
  ADD KEY `nisn` (`nisn`);

--
-- Indeks untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`),
  ADD KEY `nisn` (`nisn`),
  ADD KEY `id_tahun_ajaran` (`id_tahun_ajaran`);

--
-- Indeks untuk tabel `riwayat_kelas`
--
ALTER TABLE `riwayat_kelas`
  ADD PRIMARY KEY (`id_riwayat`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_tahun_ajaran` (`id_tahun_ajaran`),
  ADD KEY `nisn` (`nisn`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nisn`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indeks untuk tabel `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  ADD PRIMARY KEY (`id_tahun_ajaran`);

--
-- Indeks untuk tabel `tenaga_kependidikan`
--
ALTER TABLE `tenaga_kependidikan`
  ADD PRIMARY KEY (`id_tenaga_kependidikan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `guru_kelas`
--
ALTER TABLE `guru_kelas`
  MODIFY `id_guru_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `guru_mengajar`
--
ALTER TABLE `guru_mengajar`
  MODIFY `id_guru_mengajar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id_pendaftaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `riwayat_kelas`
--
ALTER TABLE `riwayat_kelas`
  MODIFY `id_riwayat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `nisn` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=913939042;

--
-- AUTO_INCREMENT untuk tabel `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  MODIFY `id_tahun_ajaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tenaga_kependidikan`
--
ALTER TABLE `tenaga_kependidikan`
  MODIFY `id_tenaga_kependidikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `guru_kelas`
--
ALTER TABLE `guru_kelas`
  ADD CONSTRAINT `guru_kelas_ibfk_1` FOREIGN KEY (`id_gtk`) REFERENCES `tenaga_kependidikan` (`id_tenaga_kependidikan`) ON DELETE CASCADE,
  ADD CONSTRAINT `guru_kelas_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`);

--
-- Ketidakleluasaan untuk tabel `guru_mengajar`
--
ALTER TABLE `guru_mengajar`
  ADD CONSTRAINT `guru_mengajar_ibfk_1` FOREIGN KEY (`id_guru`) REFERENCES `tenaga_kependidikan` (`id_tenaga_kependidikan`),
  ADD CONSTRAINT `guru_mengajar_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`),
  ADD CONSTRAINT `guru_mengajar_ibfk_3` FOREIGN KEY (`kode_mapel`) REFERENCES `mata_pelajaran` (`kode_mapel`);

--
-- Ketidakleluasaan untuk tabel `mapel_kelas`
--
ALTER TABLE `mapel_kelas`
  ADD CONSTRAINT `mapel_kelas_ibfk_1` FOREIGN KEY (`kode_mapel`) REFERENCES `mata_pelajaran` (`kode_mapel`),
  ADD CONSTRAINT `mapel_kelas_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`);

--
-- Ketidakleluasaan untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`),
  ADD CONSTRAINT `nilai_ibfk_2` FOREIGN KEY (`id_tahun_ajaran`) REFERENCES `tahun_ajaran` (`id_tahun_ajaran`),
  ADD CONSTRAINT `nilai_ibfk_3` FOREIGN KEY (`kode_mapel`) REFERENCES `mata_pelajaran` (`kode_mapel`),
  ADD CONSTRAINT `nilai_ibfk_4` FOREIGN KEY (`nisn`) REFERENCES `siswa` (`nisn`);

--
-- Ketidakleluasaan untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD CONSTRAINT `pendaftaran_ibfk_2` FOREIGN KEY (`id_tahun_ajaran`) REFERENCES `tahun_ajaran` (`id_tahun_ajaran`),
  ADD CONSTRAINT `pendaftaran_ibfk_3` FOREIGN KEY (`nisn`) REFERENCES `siswa` (`nisn`);

--
-- Ketidakleluasaan untuk tabel `riwayat_kelas`
--
ALTER TABLE `riwayat_kelas`
  ADD CONSTRAINT `riwayat_kelas_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`),
  ADD CONSTRAINT `riwayat_kelas_ibfk_2` FOREIGN KEY (`id_tahun_ajaran`) REFERENCES `tahun_ajaran` (`id_tahun_ajaran`),
  ADD CONSTRAINT `riwayat_kelas_ibfk_3` FOREIGN KEY (`nisn`) REFERENCES `siswa` (`nisn`);

--
-- Ketidakleluasaan untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
