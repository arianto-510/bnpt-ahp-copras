-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Agu 2024 pada 08.32
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ahp_copras`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alternatif`
--

CREATE TABLE `alternatif` (
  `id_alternatif` int(11) NOT NULL,
  `nama_warga` varchar(255) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `telepon` varchar(12) NOT NULL,
  `jenis_kelamin` varchar(12) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `id_petugas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `alternatif`
--

INSERT INTO `alternatif` (`id_alternatif`, `nama_warga`, `nik`, `telepon`, `jenis_kelamin`, `alamat`, `id_petugas`) VALUES
(7, 'Nirwana', '9823420934', '083477426472', 'Perempuan', 'bombana', 1),
(8, 'Arya Putra', '23428090', '088124781308', 'Laki-laki', 'Perumnas', 1),
(9, 'Takwa', '9843789324', '088312427683', 'Laki-laki', 'Bombana', 5),
(10, 'Nurfia', '72490123710', '082175639283', 'Perempuan', 'Buton', 1),
(11, 'Nur Rahmatillah', '29812307122', '082275237589', 'Perempuan', 'Buton', 1),
(12, 'Andi', '7220104', '082347124251', 'Laki-laki', 'Kolaka', 5),
(13, 'Efendi', '374569465', '089832434', 'Laki-laki', 'Kolaka', 5),
(14, 'Kenzi', '28529348', '081324234', 'Laki-laki', 'Amboena', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nama_kriteria` varchar(50) NOT NULL,
  `nilai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama_kriteria`, `nilai`) VALUES
(5, 'Pendapatan', 0.50183871084216),
(6, 'Jumlah Tanggungan', 0.26282214339558),
(9, 'Pendidikan', 0.076674032386186),
(12, 'pekerjaan', 0.15866511337608);

-- --------------------------------------------------------

--
-- Struktur dari tabel `matrix`
--

CREATE TABLE `matrix` (
  `id` int(11) NOT NULL,
  `pendapatan` double NOT NULL,
  `tanggungan` double NOT NULL,
  `pendidikan` double NOT NULL,
  `pekerjaan` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `matrix`
--

INSERT INTO `matrix` (`id`, `pendapatan`, `tanggungan`, `pendidikan`, `pekerjaan`) VALUES
(1, 1, 3, 5, 3),
(2, 0.33, 1, 3, 3),
(3, 0.2, 0.33, 1, 0.33),
(4, 0.33, 0.33, 3, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian`
--

CREATE TABLE `penilaian` (
  `id_penilaian` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `skor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `perhitungan`
--

CREATE TABLE `perhitungan` (
  `id` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `pendapatan` double NOT NULL,
  `j_tanggungan` double NOT NULL,
  `pendidikan` double NOT NULL,
  `pekerjaan` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `perhitungan`
--

INSERT INTO `perhitungan` (`id`, `id_alternatif`, `pendapatan`, `j_tanggungan`, `pendidikan`, `pekerjaan`) VALUES
(15, 9, 1, 2, 2, 1),
(17, 7, 5, 2, 1, 1),
(18, 8, 2, 3, 4, 1),
(19, 10, 3, 1, 1, 2),
(20, 11, 4, 4, 1, 2),
(21, 12, 2, 4, 3, 1),
(22, 13, 3, 1, 1, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `desa_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('admin','petugas') NOT NULL,
  `jum_target` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama`, `desa_id`, `username`, `password`, `status`, `jum_target`) VALUES
(1, 'very bad', 11, 'very', 'very123', 'petugas', 2),
(3, 'Hamsah', 0, 'mira', '123456', 'admin', 0),
(4, 'Anisah', 9, 'nisa', 'petugas123', 'petugas', 0),
(5, 'Arianto', 10, 'ari', 'petugas12345', 'petugas', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_desa`
--

CREATE TABLE `tbl_desa` (
  `desa_id` int(11) NOT NULL,
  `desa` varchar(100) NOT NULL,
  `kecamatan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_desa`
--

INSERT INTO `tbl_desa` (`desa_id`, `desa`, `kecamatan_id`) VALUES
(8, 'Para', 4),
(9, 'Amboena', 1),
(10, 'Daki-daki', 1),
(11, 'Jiko', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kecamatan`
--

CREATE TABLE `tbl_kecamatan` (
  `kecamatan_id` int(11) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `slug_kec` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_kecamatan`
--

INSERT INTO `tbl_kecamatan` (`kecamatan_id`, `kecamatan`, `slug_kec`) VALUES
(1, 'Poleang Barat', 'Poleang-Barat'),
(2, 'Poleang Timur', 'Poleang-Timur'),
(4, 'Kabaena', 'Kabaena');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indeks untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indeks untuk tabel `matrix`
--
ALTER TABLE `matrix`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id_penilaian`);

--
-- Indeks untuk tabel `perhitungan`
--
ALTER TABLE `perhitungan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indeks untuk tabel `tbl_desa`
--
ALTER TABLE `tbl_desa`
  ADD PRIMARY KEY (`desa_id`);

--
-- Indeks untuk tabel `tbl_kecamatan`
--
ALTER TABLE `tbl_kecamatan`
  ADD PRIMARY KEY (`kecamatan_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id_alternatif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `matrix`
--
ALTER TABLE `matrix`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id_penilaian` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `perhitungan`
--
ALTER TABLE `perhitungan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_desa`
--
ALTER TABLE `tbl_desa`
  MODIFY `desa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tbl_kecamatan`
--
ALTER TABLE `tbl_kecamatan`
  MODIFY `kecamatan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
