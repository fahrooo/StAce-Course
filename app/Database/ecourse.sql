-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Des 2021 pada 06.47
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecourse`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_mapel`
--

CREATE TABLE `data_mapel` (
  `kode_mapel` int(11) NOT NULL,
  `nama_mapel` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_mapel`
--

INSERT INTO `data_mapel` (`kode_mapel`, `nama_mapel`) VALUES
(100, 'HTML Dasar'),
(101, 'CSS Dasar'),
(102, 'JavaScript Dasar'),
(103, 'JavaScript Intermediate'),
(104, 'Intro to Coding'),
(105, 'UI/UX Design Mastery'),
(106, 'Unix Command Line Dasar'),
(107, 'Cloud Computing Dasar'),
(108, 'Linux Dasar'),
(109, 'C++ Dasar'),
(110, 'React Dasar'),
(111, 'PHP Dasar'),
(112, 'Python Dasar'),
(114, 'Database MySQL Dasar'),
(115, 'Laravel Dasar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pengajar`
--

CREATE TABLE `data_pengajar` (
  `id_pengajar` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jk` varchar(25) NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `kode_mapel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_pengajar`
--

INSERT INTO `data_pengajar` (`id_pengajar`, `nama`, `jk`, `no_hp`, `email`, `alamat`, `kode_mapel`) VALUES
(209837811, 'Elvan Aristides', 'Laki-Laki', '089124354223', 'teacher@gmail.com', 'Jln. Cimahi No. 2 RT 7/RW 1 Desa Cilembu Kecamatan Ciamis', 100),
(209837812, 'Arzan Ravindra', 'Laki-Laki', '087654563443', 'teacher@gmail.com', 'Jln. Cimahi No. 2 RT 7/RW 1 Desa Cilembu Kecamatan Ciamis', 101),
(209837813, 'Bonita Tanya Suhaila', 'Perempuan', '087656372823', 'bonitatanya@gmail.com', 'Jln. Cimahi No. 2 RT 7/RW 1 Desa Cilembu Kecamatan Ciamis', 102),
(209837814, 'Ghali Daniyal', 'Laki-Laki', '082637278394', 'ghalidaniyal@gmail.com', 'Jln. Cimahi No. 2 RT 7/RW 1 Desa Cilembu Kecamatan Ciamis', 103),
(209837815, 'Akalanka Mirza Zahair', 'Laki-Laki', '089124354223', 'teacher@gmail.com', 'Jln. Baru No. 14 Desa Lemahabang Kulon Kec. Lemahabang', 104),
(209837816, 'Barra Rafeyfa Zayan', 'Laki-Laki', '089124354223', 'teacher@gmail.com', 'Jln. Baru No. 14 Desa Lemahabang Kulon Kec. Lemahabang', 105),
(209837817, 'Denada Parmadita Gantari ', 'Perempuan', '089124354223', 'teacher@gmail.com', 'Jln. Cimahi No. 2 RT 7/RW 1 Desa Cilembu Kecamatan Ciamis', 106),
(209837818, 'Eliana Nastiti Shireen', 'Perempuan', '089124354223', 'teacher@gmail.com', 'Jln. Baru No. 14 Desa Lemahabang Kulon Kec. Lemahabang', 107),
(209837819, 'Fabian Mikko Labib', 'Laki-Laki', '089124354223', 'teacher@gmail.com', 'Jln. Baru No. 14 Desa Lemahabang Kulon Kec. Lemahabang', 108),
(209837821, 'Felice Milena Arisanti', 'Perempuan', '089124354223', 'teacher@gmail.com', 'Jln. Baru No. 14 Desa Lemahabang Kulon Kec. Lemahabang', 110),
(209837822, 'Gauri Anum Basimah', 'Perempuan', '087654563443', 'teacher@gmail.com', 'Jln. Cimahi No. 2 RT 7/RW 1 Desa Cilembu Kecamatan Ciamis', 111),
(209837823, 'Naufal Altezza', 'Laki-Laki', '087654563443', 'teacher@gmail.com', 'Jln. Cimahi No. 2 RT 7/RW 1 Desa Cilembu Kecamatan Ciamis', 112),
(209837824, 'Gabino Arthur', 'Laki-Laki', '089124354223', 'teacher@gmail.com', 'Jln. Baru No. 14 Desa Lemahabang Kulon Kec. Lemahabang', 114),
(209837825, 'Indira Myesha', 'Perempuan', '089124354223', 'teacher@gmail.com', 'Jln. Baru No. 14 Desa Lemahabang Kulon Kec. Lemahabang', 115);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_siswa`
--

CREATE TABLE `data_siswa` (
  `id_siswa` int(11) NOT NULL,
  `id_pengajar` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jk` varchar(25) NOT NULL,
  `tmpt_lahir` varchar(50) NOT NULL,
  `tgl_lahir` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_hp_siswa` varchar(15) NOT NULL,
  `nama_ortu` varchar(100) NOT NULL,
  `no_hp_ortu` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_siswa`
--

INSERT INTO `data_siswa` (`id_siswa`, `id_pengajar`, `nama`, `jk`, `tmpt_lahir`, `tgl_lahir`, `alamat`, `email`, `no_hp_siswa`, `nama_ortu`, `no_hp_ortu`) VALUES
(106387001, 209837811, 'Pariz Rahman N', 'Laki-Laki', 'Cirebon', '29 February 2001', 'Jl. Ciawi No. 12 Desa Ciawi Kecamatan Sedong', 'parisrn20@gmail.com', '085658665154', 'Nana Suryana', '082453239794'),
(106387002, 209837812, 'Fahro Nur Fauzi', 'Laki-Laki', 'Cirebon', '28 August 2002', 'Jln. Cimahi No. 2 RT 7/RW 1 Desa Cilembu Kecamatan Ciamis', 'fafa2808@gmail.com', '087654563443', 'Alexandro', '089124354223'),
(106387003, 209837821, 'Gilang Indra Permana', 'Laki-Laki', 'Cirebon', '22 January 2002', 'Jln. Baru No. 14 Desa Lemahabang Kulon Kec. Lemahabang', 'gilangindra@gmail.com', '089124354223', 'Carlotte', '087654563443'),
(106387004, 209837825, 'Raihan Duta Assidiqi', 'Laki-Laki', 'Cirebon', '09 December 2002', 'Jln. Cimahi No. 2 RT 7/RW 1 Desa Cilembu Kecamatan Ciamis', 'rd.assidiqi@yahoo.co.id', '087654563443', 'Brewoco', '089124354223');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_transaksi`
--

CREATE TABLE `data_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `nama_course` varchar(100) NOT NULL,
  `harga` varchar(25) NOT NULL,
  `tgl_transaksi` varchar(25) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_transaksi`
--

INSERT INTO `data_transaksi` (`id_transaksi`, `id_siswa`, `nama_course`, `harga`, `tgl_transaksi`, `status`) VALUES
(1, 106387001, 'HTML Dasar', '120000', '03-12-2021', 'Belum Bayar'),
(4, 106387002, 'CSS Dasar', '120000', '03-12-2021', 'Belum Bayar'),
(5, 106387003, 'React Dasar', '200000', '03-12-2021', 'Belum Bayar'),
(7, 106387004, 'Laravel Dasar', '250000', '03-12-2021', 'Belum Bayar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `role` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_mapel`
--
ALTER TABLE `data_mapel`
  ADD PRIMARY KEY (`kode_mapel`);

--
-- Indeks untuk tabel `data_pengajar`
--
ALTER TABLE `data_pengajar`
  ADD PRIMARY KEY (`id_pengajar`),
  ADD KEY `kode_mapel` (`kode_mapel`);

--
-- Indeks untuk tabel `data_siswa`
--
ALTER TABLE `data_siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `id_pengajar` (`id_pengajar`) USING BTREE;

--
-- Indeks untuk tabel `data_transaksi`
--
ALTER TABLE `data_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_siswa`
--
ALTER TABLE `data_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106387005;

--
-- AUTO_INCREMENT untuk tabel `data_transaksi`
--
ALTER TABLE `data_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `data_pengajar`
--
ALTER TABLE `data_pengajar`
  ADD CONSTRAINT `data_pengajar_ibfk_1` FOREIGN KEY (`kode_mapel`) REFERENCES `data_mapel` (`kode_mapel`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `data_siswa`
--
ALTER TABLE `data_siswa`
  ADD CONSTRAINT `data_siswa_ibfk_1` FOREIGN KEY (`id_pengajar`) REFERENCES `data_pengajar` (`id_pengajar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `data_transaksi`
--
ALTER TABLE `data_transaksi`
  ADD CONSTRAINT `data_transaksi_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `data_siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
