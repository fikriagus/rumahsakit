-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Nov 2023 pada 17.24
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mypoliklinik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_dokter`
--

CREATE TABLE `tb_dokter` (
  `id_dokter` varchar(50) NOT NULL,
  `nama_dokter` varchar(50) NOT NULL,
  `spesialis` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_dokter`
--

INSERT INTO `tb_dokter` (`id_dokter`, `nama_dokter`, `spesialis`, `alamat`, `no_telp`) VALUES
('599bfb5f-f150-4943-9131-0d66742d1025', 'Dr. Julius Robert Oppenheimer', 'Atomic Bomb', 'Amerika', '0987898789789'),
('6ef45db8-8e43-40e9-8365-b49526c7a268', 'Dr. Budi', 'All Role', 'Padangan', '0897778687');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_obat`
--

CREATE TABLE `tb_obat` (
  `id_obat` varchar(50) NOT NULL,
  `nama_obat` varchar(200) NOT NULL,
  `ket_obat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_obat`
--

INSERT INTO `tb_obat` (`id_obat`, `nama_obat`, `ket_obat`) VALUES
('4c89a44e-165a-439e-867f-c8cc5d5ff131', 'bodreksin', 'obat panas'),
('a8ab6013-35e7-43ee-a645-eb9dbd1a9c60', 'bodrek 2', 'obat sakit'),
('f99aaf3f-65b8-11ee-8d32-a81e8405b5a9', 'komik', 'obat batuk'),
('f99af5fc-65b8-11ee-8d32-a81e8405b5a9', 'paracetamol', 'obat abit'),
('f99b1f02-65b8-11ee-8d32-a81e8405b5a9', 'ultraflu', 'obat flu'),
('f99b442c-65b8-11ee-8d32-a81e8405b5a9', 'amoxsilin', 'obat pereda nyeri'),
('f99b68cf-65b8-11ee-8d32-a81e8405b5a9', 'promag', 'obat mag');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pasien`
--

CREATE TABLE `tb_pasien` (
  `id_pasien` varchar(50) NOT NULL,
  `nomor_identitas` varchar(30) NOT NULL,
  `nama_pasien` varchar(50) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_pasien`
--

INSERT INTO `tb_pasien` (`id_pasien`, `nomor_identitas`, `nama_pasien`, `jenis_kelamin`, `alamat`, `no_telp`) VALUES
('8931ebe6-6d1d-4678-ab2d-b3145718911e', '0909890808', '9e983926-43c5-4690-aa91-1d5eee2eb5fd', 'L', 'sby', '029809809'),
('ee2fc223-c1ab-4314-8cc1-beac7a485b3b', '0900802888', 'f34f3381-266b-4cb2-ae5a-91249fca6ae5', 'L', 'sidoarjo', '0898778998');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penyakit`
--

CREATE TABLE `tb_penyakit` (
  `id_penyakit` varchar(50) NOT NULL,
  `nama_penyakit` varchar(50) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_penyakit`
--

INSERT INTO `tb_penyakit` (`id_penyakit`, `nama_penyakit`, `keterangan`) VALUES
('83cd7fe4-c06e-454d-a011-74764ba99d43', 'Demam Sedang', 'Demam dengan suhu tubuh 39,1 derajat Celcius'),
('edf986e6-b9a3-45dd-bd7b-e5ec17031a94', 'Hiperpireksia', 'Demam dengan suhu diatasa 41,1 derajat celcius');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_perawat`
--

CREATE TABLE `tb_perawat` (
  `id_perawat` varchar(50) NOT NULL,
  `nama_perawat` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_perawat`
--

INSERT INTO `tb_perawat` (`id_perawat`, `nama_perawat`, `alamat`, `no_telp`) VALUES
('4cc25209-a564-4276-a8f0-7522f1f8b869', 'Taqim', 'Bojonegoro', '087675765'),
('a03304c2-54b3-4d24-881e-dba63c2b0170', 'bambang', 'surabaya', '0878878');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_poliklinik`
--

CREATE TABLE `tb_poliklinik` (
  `id_poli` varchar(50) NOT NULL,
  `nama_poli` varchar(50) NOT NULL,
  `gedung` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_poliklinik`
--

INSERT INTO `tb_poliklinik` (`id_poli`, `nama_poli`, `gedung`) VALUES
('0a63512e-2448-44f2-8358-557d1bd5d6a3', 'Poli Gigi', 'G.LT.2'),
('1693a677-a77d-474d-8707-27eccd034934', 'Poli Mata', 'Lt 6'),
('4b8f35a8-676f-11ee-8ec5-a81e8405b5a9', 'Poli THT', 'A.L.2'),
('4b8f61e9-676f-11ee-8ec5-a81e8405b5a9', 'Poli Umum', 'H.L.3'),
('7ccd45e3-547b-4a81-ad0f-6052725a0d1a', 'Poli Mata', 'A.L.2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_regis_pasien`
--

CREATE TABLE `tb_regis_pasien` (
  `id_regis` varchar(50) NOT NULL,
  `nama_pasien` varchar(50) NOT NULL,
  `keluhan` text NOT NULL,
  `id_poli` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_regis_pasien`
--

INSERT INTO `tb_regis_pasien` (`id_regis`, `nama_pasien`, `keluhan`, `id_poli`) VALUES
('9e983926-43c5-4690-aa91-1d5eee2eb5fd', 'sdada', 'sdasdas', '4b8f61e9-676f-11ee-8ec5-a81e8405b5a9'),
('f34f3381-266b-4cb2-ae5a-91249fca6ae5', 'supri', 'panas', '4b8f61e9-676f-11ee-8ec5-a81e8405b5a9');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rekammedis`
--

CREATE TABLE `tb_rekammedis` (
  `id_rm` varchar(50) NOT NULL,
  `id_pasien` varchar(50) NOT NULL,
  `keluhan` varchar(100) NOT NULL,
  `id_dokter` varchar(50) NOT NULL,
  `diagnosa` varchar(50) NOT NULL,
  `id_poli` varchar(50) NOT NULL,
  `tgl_periksa` date NOT NULL,
  `biaya` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rm_obat`
--

CREATE TABLE `tb_rm_obat` (
  `id` int(11) NOT NULL,
  `id_rm` varchar(50) NOT NULL,
  `id_obat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` varchar(50) NOT NULL,
  `nama_user` varchar(80) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` enum('1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `username`, `password`, `level`) VALUES
('b3d6d406-5555-11ee-b7a7-a81e8405b5a9', 'Fikri Agus Tiyanto', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', '1');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_dokter`
--
ALTER TABLE `tb_dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indeks untuk tabel `tb_obat`
--
ALTER TABLE `tb_obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indeks untuk tabel `tb_pasien`
--
ALTER TABLE `tb_pasien`
  ADD PRIMARY KEY (`id_pasien`),
  ADD KEY `nama_pasien` (`nama_pasien`);

--
-- Indeks untuk tabel `tb_penyakit`
--
ALTER TABLE `tb_penyakit`
  ADD PRIMARY KEY (`id_penyakit`);

--
-- Indeks untuk tabel `tb_perawat`
--
ALTER TABLE `tb_perawat`
  ADD PRIMARY KEY (`id_perawat`);

--
-- Indeks untuk tabel `tb_poliklinik`
--
ALTER TABLE `tb_poliklinik`
  ADD PRIMARY KEY (`id_poli`);

--
-- Indeks untuk tabel `tb_regis_pasien`
--
ALTER TABLE `tb_regis_pasien`
  ADD PRIMARY KEY (`id_regis`);

--
-- Indeks untuk tabel `tb_rekammedis`
--
ALTER TABLE `tb_rekammedis`
  ADD PRIMARY KEY (`id_rm`),
  ADD KEY `id_dokter` (`id_dokter`),
  ADD KEY `id_poli` (`id_poli`),
  ADD KEY `diagnosa` (`diagnosa`),
  ADD KEY `keluhan` (`keluhan`),
  ADD KEY `tb_rekammedis_ibfk_5` (`id_pasien`);

--
-- Indeks untuk tabel `tb_rm_obat`
--
ALTER TABLE `tb_rm_obat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_rm` (`id_rm`),
  ADD KEY `id_obat` (`id_obat`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_rm_obat`
--
ALTER TABLE `tb_rm_obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_pasien`
--
ALTER TABLE `tb_pasien`
  ADD CONSTRAINT `tb_pasien_ibfk_1` FOREIGN KEY (`nama_pasien`) REFERENCES `tb_regis_pasien` (`id_regis`);

--
-- Ketidakleluasaan untuk tabel `tb_rekammedis`
--
ALTER TABLE `tb_rekammedis`
  ADD CONSTRAINT `tb_rekammedis_ibfk_2` FOREIGN KEY (`id_dokter`) REFERENCES `tb_dokter` (`id_dokter`),
  ADD CONSTRAINT `tb_rekammedis_ibfk_3` FOREIGN KEY (`id_poli`) REFERENCES `tb_poliklinik` (`id_poli`),
  ADD CONSTRAINT `tb_rekammedis_ibfk_4` FOREIGN KEY (`diagnosa`) REFERENCES `tb_penyakit` (`id_penyakit`),
  ADD CONSTRAINT `tb_rekammedis_ibfk_5` FOREIGN KEY (`id_pasien`) REFERENCES `tb_regis_pasien` (`id_regis`);

--
-- Ketidakleluasaan untuk tabel `tb_rm_obat`
--
ALTER TABLE `tb_rm_obat`
  ADD CONSTRAINT `tb_rm_obat_ibfk_1` FOREIGN KEY (`id_rm`) REFERENCES `tb_rekammedis` (`id_rm`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_rm_obat_ibfk_2` FOREIGN KEY (`id_obat`) REFERENCES `tb_obat` (`id_obat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
