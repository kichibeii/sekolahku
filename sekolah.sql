-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 04 Feb 2017 pada 08.08
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sekolahku`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `username` varchar(12) NOT NULL,
  `password` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'sekolahketje');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ajar`
--

CREATE TABLE `ajar` (
  `id_ajar` int(11) NOT NULL,
  `id_ambil_siswa` int(11) NOT NULL,
  `id_ambil_guru` int(11) NOT NULL,
  `semester` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ajar`
--

INSERT INTO `ajar` (`id_ajar`, `id_ambil_siswa`, `id_ambil_guru`, `semester`) VALUES
(1, 1, 1, 1),
(2, 2, 2, 3),
(3, 3, 1, 2),
(4, 4, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ambil_guru`
--

CREATE TABLE `ambil_guru` (
  `id_ambil_guru` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ambil_guru`
--

INSERT INTO `ambil_guru` (`id_ambil_guru`, `id_guru`, `id_mapel`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 4, 1),
(10, 4, 0),
(11, 4, 0),
(12, 4, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ambil_siswa`
--

CREATE TABLE `ambil_siswa` (
  `id_ambil_siswa` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `semester` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ambil_siswa`
--

INSERT INTO `ambil_siswa` (`id_ambil_siswa`, `id_siswa`, `id_mapel`, `status`, `semester`) VALUES
(1, 1, 1, 0, 1),
(2, 1, 2, 0, 3),
(3, 1, 1, 0, 2),
(4, 1, 3, 0, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `nama_guru` varchar(255) NOT NULL,
  `status_sikap` int(11) NOT NULL DEFAULT '0',
  `status_wali` int(11) NOT NULL DEFAULT '0',
  `nip` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`id_guru`, `nama_guru`, `status_sikap`, `status_wali`, `nip`, `password`, `id_kelas`) VALUES
(1, 'Sahid', 1, 1, '123123123', 'Biomantap', 0),
(2, 'Alifka', 0, 0, '54321543', 'alifka', 0),
(3, 'Alifka', 0, 0, '12312310', 'normal', 0),
(4, 'Mukhib', 1, 1, '169669123', 'michaelj', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`) VALUES
(1, 'X.1'),
(2, 'X.2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` int(11) NOT NULL,
  `nama_mapel` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mapel`
--

INSERT INTO `mapel` (`id_mapel`, `nama_mapel`) VALUES
(1, 'Matematika 1'),
(2, 'FISIKA 2'),
(3, 'Sosiologi 1'),
(4, 'Bahasa Indonesia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `id_ajar` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `jenis` varchar(1) NOT NULL,
  `status_lihat` tinyint(1) NOT NULL DEFAULT '0',
  `semester` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sikap`
--

CREATE TABLE `sikap` (
  `id_sikap` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `nilai` varchar(11) NOT NULL,
  `semester` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sikap`
--

INSERT INTO `sikap` (`id_sikap`, `id_guru`, `id_siswa`, `nilai`, `semester`) VALUES
(9, 1, 1, 'A', 1),
(10, 1, 2, 'A', 1),
(11, 1, 1, 'B', 1),
(12, 1, 2, 'B', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nama_siswa` varchar(255) NOT NULL,
  `tahun_masuk` int(11) NOT NULL,
  `nis` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nama_siswa`, `tahun_masuk`, `nis`, `password`, `id_kelas`) VALUES
(1, 'James', 2016, '12345123', 'qwe', 0),
(2, 'Charlie', 2016, '12345124', 'asd', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`,`password`);

--
-- Indexes for table `ajar`
--
ALTER TABLE `ajar`
  ADD PRIMARY KEY (`id_ajar`);

--
-- Indexes for table `ambil_guru`
--
ALTER TABLE `ambil_guru`
  ADD PRIMARY KEY (`id_ambil_guru`);

--
-- Indexes for table `ambil_siswa`
--
ALTER TABLE `ambil_siswa`
  ADD PRIMARY KEY (`id_ambil_siswa`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `sikap`
--
ALTER TABLE `sikap`
  ADD PRIMARY KEY (`id_sikap`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ajar`
--
ALTER TABLE `ajar`
  MODIFY `id_ajar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ambil_guru`
--
ALTER TABLE `ambil_guru`
  MODIFY `id_ambil_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `ambil_siswa`
--
ALTER TABLE `ambil_siswa`
  MODIFY `id_ambil_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sikap`
--
ALTER TABLE `sikap`
  MODIFY `id_sikap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
