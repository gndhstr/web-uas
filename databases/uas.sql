-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 23 Nov 2022 pada 18.42
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `nip` varchar(10) NOT NULL,
  `nama_dosen` varchar(45) NOT NULL,
  `login_id_login` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`nip`, `nama_dosen`, `login_id_login`) VALUES
('8120938098', 'Bayu Al Ghazali S.Pd. M.T', 2),
('7682936543', 'Hari Wijayantol S.Pd. M.T', 2),
('8757906543', 'Lil Bimo Nus Nus S.E N.uk ', 2),
('7682936547', 'Prof. Bayu TOT S.Pd. M.T', 2),
('7682936580', 'Prof. Irfan Azizuzizuy S.Pd. M.T', 3),
('7682936546', 'Surya Adi S.Pd. M.T', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id_login` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `jabatan` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id_login`, `nama`, `username`, `password`, `jabatan`) VALUES
(1, 'admin abc', 'admin', '0192023a7bbd73250516f069df18b500', 'admin'),
(2, 'tendik', 'tendik', 'b8f8d5eba982ebdb42956582a429524f', 'tendik'),
(3, 'tendik2', 'tendik2', '672feb69fd27f91e69718084264528d1', 'tendik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `matkul`
--

CREATE TABLE `matkul` (
  `kode_matkul` varchar(5) NOT NULL,
  `nama_matkul` varchar(45) NOT NULL,
  `jadwal_matkul` date NOT NULL,
  `dosen_nama_dosen` varchar(45) NOT NULL,
  `login_id_login` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `matkul`
--

INSERT INTO `matkul` (`kode_matkul`, `nama_matkul`, `jadwal_matkul`, `dosen_nama_dosen`, `login_id_login`) VALUES
('BI067', 'Bahasa Indonesia', '2023-02-15', 'Agus Marno S.Pd. M.T', 2),
('JM8UT', 'Bahasa Jawa', '2022-11-24', 'Bayu Al Ghazali S.Pd. M.T', 2),
('PK069', 'Pendidikan Konservasi', '2023-02-17', 'Hari Wijayanto S.Pd. M.T', 2),
('PW070', 'Pemrograman Web', '2023-02-15', 'Surya Adi S.Pd. M.T', 2),
('SC069', 'Sistem Cerdas', '2023-02-18', 'Prof. Irfan Azizuzizuy S.Pd. M.T', 3);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nama_dosen`,`login_id_login`),
  ADD KEY `fk_dosen_login1_idx` (`login_id_login`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`);

--
-- Indeks untuk tabel `matkul`
--
ALTER TABLE `matkul`
  ADD PRIMARY KEY (`kode_matkul`,`dosen_nama_dosen`,`login_id_login`),
  ADD KEY `fk_matkul_dosen_idx` (`dosen_nama_dosen`),
  ADD KEY `fk_matkul_login1_idx` (`login_id_login`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD CONSTRAINT `dosen_ibfk_1` FOREIGN KEY (`login_id_login`) REFERENCES `login` (`id_login`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_dosen_login1` FOREIGN KEY (`login_id_login`) REFERENCES `login` (`id_login`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `matkul`
--
ALTER TABLE `matkul`
  ADD CONSTRAINT `fk_matkul_login` FOREIGN KEY (`login_id_login`) REFERENCES `login` (`id_login`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `matkul_ibfk_1` FOREIGN KEY (`dosen_nama_dosen`) REFERENCES `dosen` (`nama_dosen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `matkul_ibfk_2` FOREIGN KEY (`login_id_login`) REFERENCES `login` (`id_login`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
