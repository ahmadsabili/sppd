-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 09 Jan 2023 pada 09.03
-- Versi server: 10.6.9-MariaDB-log
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sppd`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `biaya_perjalanan`
--

CREATE TABLE `biaya_perjalanan` (
  `id_biaya_perjalanan` int(11) NOT NULL,
  `kota_id` int(11) NOT NULL,
  `golongan_id` int(11) NOT NULL,
  `lumpsum` int(11) NOT NULL,
  `penginapan` int(11) NOT NULL,
  `transportasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `biaya_perjalanan`
--

INSERT INTO `biaya_perjalanan` (`id_biaya_perjalanan`, `kota_id`, `golongan_id`, `lumpsum`, `penginapan`, `transportasi`) VALUES
(1, 1, 1, 150000, 200000, 100000),
(2, 2, 1, 200000, 300000, 400000),
(4, 3, 1, 900000, 800000, 7000000),
(6, 2, 2, 700000, 450000, 200000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `golongan`
--

CREATE TABLE `golongan` (
  `id_golongan` int(11) NOT NULL,
  `nama_golongan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `golongan`
--

INSERT INTO `golongan` (`id_golongan`, `nama_golongan`) VALUES
(1, 'III'),
(2, 'IV'),
(3, 'IIa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kendaraan`
--

CREATE TABLE `kendaraan` (
  `id_kendaraan` int(11) NOT NULL,
  `nama_kendaraan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kendaraan`
--

INSERT INTO `kendaraan` (`id_kendaraan`, `nama_kendaraan`) VALUES
(1, 'Mobil Dinas'),
(2, 'Pesawat'),
(3, 'Motor');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kota`
--

CREATE TABLE `kota` (
  `id_kota` int(11) NOT NULL,
  `nama_kota` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kota`
--

INSERT INTO `kota` (`id_kota`, `nama_kota`) VALUES
(1, 'Kota Palembang'),
(2, 'Kabupaten Muara Enim'),
(3, 'Kota Padang'),
(4, 'Kabupaten Lahat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kuitansi`
--

CREATE TABLE `kuitansi` (
  `id_kuitansi` int(11) NOT NULL,
  `sppd_id` int(11) NOT NULL,
  `biaya_perjalanan_id` int(11) NOT NULL,
  `diterima_dari` varchar(255) NOT NULL,
  `untuk_pembayaran` varchar(255) NOT NULL,
  `total_lumpsum` int(11) NOT NULL,
  `total_penginapan` int(11) NOT NULL,
  `total_transportasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kuitansi`
--

INSERT INTO `kuitansi` (`id_kuitansi`, `sppd_id`, `biaya_perjalanan_id`, `diterima_dari`, `untuk_pembayaran`, `total_lumpsum`, `total_penginapan`, `total_transportasi`) VALUES
(6, 9, 2, '-', 'biaya perjalanan', 600000, 900000, 400000),
(7, 10, 5, '-', 'dinas', 1500000, 1350000, 200000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nppd`
--

CREATE TABLE `nppd` (
  `id_nppd` int(11) NOT NULL,
  `pegawai_id` varchar(255) NOT NULL,
  `tujuan_perjalanan` varchar(255) NOT NULL,
  `kota_id` int(11) NOT NULL,
  `kendaraan_id` int(11) NOT NULL,
  `tanggal_pergi` date NOT NULL,
  `tanggal_pulang` date NOT NULL,
  `lama_perjalanan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nppd`
--

INSERT INTO `nppd` (`id_nppd`, `pegawai_id`, `tujuan_perjalanan`, `kota_id`, `kendaraan_id`, `tanggal_pergi`, `tanggal_pulang`, `lama_perjalanan`) VALUES
(7, '1', 'Tidak ada tujuan', 4, 3, '2022-12-26', '2022-12-27', 2),
(8, '1,2', 'Liburan', 2, 1, '2023-01-03', '2023-01-05', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `pangkat` varchar(255) NOT NULL,
  `golongan_id` int(11) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `unit_kerja` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nip`, `nama`, `pangkat`, `golongan_id`, `jabatan`, `unit_kerja`) VALUES
(1, '13818313', 'Arifin Hakim, S.E., M.M. Sp', 'Pembina', 1, 'Kepala Bagian Administrasi', 'Balai Desa Salatiga'),
(2, '1371731831913', 'Manjalita, S.Pd., M.Pd.', 'Pembina Muda', 2, 'Sekretaris Bagian Administrasi', 'Balai Desa Salatiga');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perjalanan_dinas`
--

CREATE TABLE `perjalanan_dinas` (
  `id_perjalanan_dinas` int(11) NOT NULL,
  `spt_id` int(11) NOT NULL,
  `pegawai_id` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `hasil` varchar(255) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `perjalanan_dinas`
--

INSERT INTO `perjalanan_dinas` (`id_perjalanan_dinas`, `spt_id`, `pegawai_id`, `keterangan`, `hasil`, `tanggal`) VALUES
(3, 5, 1, '', 'Tidur di rapat', '2023-01-03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil_instansi`
--

CREATE TABLE `profil_instansi` (
  `id_profil_instansi` int(11) NOT NULL,
  `nama_instansi` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `kode_pos` varchar(255) NOT NULL,
  `no_telp` varchar(255) NOT NULL,
  `fax` varchar(255) NOT NULL,
  `pimpinan_tertinggi` varchar(255) NOT NULL,
  `nama_pimpinan_tertinggi` varchar(255) NOT NULL,
  `nip_pimpinan_tertinggi` varchar(255) NOT NULL,
  `jabatan_pimpinan_tertinggi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `profil_instansi`
--

INSERT INTO `profil_instansi` (`id_profil_instansi`, `nama_instansi`, `keterangan`, `alamat`, `kota`, `kode_pos`, `no_telp`, `fax`, `pimpinan_tertinggi`, `nama_pimpinan_tertinggi`, `nip_pimpinan_tertinggi`, `jabatan_pimpinan_tertinggi`) VALUES
(1, 'BADAN PENGELOLA KEUANGAN DAN ASET DAERAH', 'KANTOR PUSAT', 'JL BUKIT BESAR, PALEMBANG, SUMATERA SELATAN', 'PALEMBANG', '27362', '0819381', '2323131', 'KEPALA', 'ARIFIN', '2873287819793871983', 'PEMBINA UTAMA MADYA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sppd`
--

CREATE TABLE `sppd` (
  `id_sppd` int(11) NOT NULL,
  `spt_id` int(11) NOT NULL,
  `pegawai_id` int(11) NOT NULL,
  `no_sppd` varchar(255) NOT NULL,
  `pejabat_pemberi_perintah` varchar(255) NOT NULL,
  `instansi` varchar(255) NOT NULL,
  `mata_anggaran` varchar(255) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sppd`
--

INSERT INTO `sppd` (`id_sppd`, `spt_id`, `pegawai_id`, `no_sppd`, `pejabat_pemberi_perintah`, `instansi`, `mata_anggaran`, `keterangan`) VALUES
(9, 6, 1, 'adhgdh/1383', 'Cao Cao', 'Kominfo', '2021 PLUS', '-'),
(10, 6, 2, 'adhgdh/1383', 'Cao Cao', 'Kominfo', '2021 PLUS', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `spt`
--

CREATE TABLE `spt` (
  `id_spt` int(11) NOT NULL,
  `nppd_id` int(11) NOT NULL,
  `no_spt` varchar(255) DEFAULT NULL,
  `dasar_hukum` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `spt`
--

INSERT INTO `spt` (`id_spt`, `nppd_id`, `no_spt`, `dasar_hukum`) VALUES
(5, 7, 'ABC/2022/2014', 'RUUKUHP'),
(6, 8, '12/2/3', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ttd_kuitansi`
--

CREATE TABLE `ttd_kuitansi` (
  `id_ttd_kuitansi` int(11) NOT NULL,
  `nama_kabag` varchar(255) NOT NULL,
  `nip_kabag` varchar(255) NOT NULL,
  `nama_bendahara` varchar(255) NOT NULL,
  `nip_bendahara` varchar(255) NOT NULL,
  `nama_pptk` varchar(255) NOT NULL,
  `nip_pptk` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ttd_kuitansi`
--

INSERT INTO `ttd_kuitansi` (`id_ttd_kuitansi`, `nama_kabag`, `nip_kabag`, `nama_bendahara`, `nip_bendahara`, `nama_pptk`, `nip_pptk`) VALUES
(1, 'ROSDANER, S.Pd. MM', '135155555555', 'MAREDI', '34567836373', 'Ujang MM', '2876376287232');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `pegawai_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `role`, `pegawai_id`) VALUES
(2, '13818313', '$2y$10$rd1WCcJCG/Bjc90WnfGG0O8oDXDAgXRMsgeJsH4ItaFNABnIJE9PS', 'user', 1),
(3, '1371731831913', '$2y$10$/4MxkiQZlL6Zk6rAb/WOXeA8cjoeiEOWVa8Xilbd4hFgcACsUHYMm', 'user', 2),
(4, 'admin', '$2y$10$/4MxkiQZlL6Zk6rAb/WOXeA8cjoeiEOWVa8Xilbd4hFgcACsUHYMm', 'admin', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `biaya_perjalanan`
--
ALTER TABLE `biaya_perjalanan`
  ADD PRIMARY KEY (`id_biaya_perjalanan`),
  ADD KEY `kota_id` (`kota_id`),
  ADD KEY `golongan_id` (`golongan_id`);

--
-- Indeks untuk tabel `golongan`
--
ALTER TABLE `golongan`
  ADD PRIMARY KEY (`id_golongan`);

--
-- Indeks untuk tabel `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`id_kendaraan`);

--
-- Indeks untuk tabel `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id_kota`);

--
-- Indeks untuk tabel `kuitansi`
--
ALTER TABLE `kuitansi`
  ADD PRIMARY KEY (`id_kuitansi`),
  ADD KEY `sppd_id` (`sppd_id`),
  ADD KEY `biaya_perjalanan_id` (`biaya_perjalanan_id`);

--
-- Indeks untuk tabel `nppd`
--
ALTER TABLE `nppd`
  ADD PRIMARY KEY (`id_nppd`),
  ADD KEY `pegawai_id` (`pegawai_id`),
  ADD KEY `kendaraan_id` (`kendaraan_id`),
  ADD KEY `pegawai_id_2` (`pegawai_id`),
  ADD KEY `kota_id` (`kota_id`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD KEY `golongan_id` (`golongan_id`);

--
-- Indeks untuk tabel `perjalanan_dinas`
--
ALTER TABLE `perjalanan_dinas`
  ADD PRIMARY KEY (`id_perjalanan_dinas`),
  ADD KEY `spt_id` (`spt_id`),
  ADD KEY `pegawai_id` (`pegawai_id`);

--
-- Indeks untuk tabel `profil_instansi`
--
ALTER TABLE `profil_instansi`
  ADD PRIMARY KEY (`id_profil_instansi`);

--
-- Indeks untuk tabel `sppd`
--
ALTER TABLE `sppd`
  ADD PRIMARY KEY (`id_sppd`),
  ADD KEY `spt_id` (`spt_id`),
  ADD KEY `pegawai_id` (`pegawai_id`);

--
-- Indeks untuk tabel `spt`
--
ALTER TABLE `spt`
  ADD PRIMARY KEY (`id_spt`),
  ADD KEY `nppd_id` (`nppd_id`);

--
-- Indeks untuk tabel `ttd_kuitansi`
--
ALTER TABLE `ttd_kuitansi`
  ADD PRIMARY KEY (`id_ttd_kuitansi`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `pegawai_id` (`pegawai_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `biaya_perjalanan`
--
ALTER TABLE `biaya_perjalanan`
  MODIFY `id_biaya_perjalanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `golongan`
--
ALTER TABLE `golongan`
  MODIFY `id_golongan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kendaraan`
--
ALTER TABLE `kendaraan`
  MODIFY `id_kendaraan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kota`
--
ALTER TABLE `kota`
  MODIFY `id_kota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kuitansi`
--
ALTER TABLE `kuitansi`
  MODIFY `id_kuitansi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `nppd`
--
ALTER TABLE `nppd`
  MODIFY `id_nppd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `perjalanan_dinas`
--
ALTER TABLE `perjalanan_dinas`
  MODIFY `id_perjalanan_dinas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `profil_instansi`
--
ALTER TABLE `profil_instansi`
  MODIFY `id_profil_instansi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `sppd`
--
ALTER TABLE `sppd`
  MODIFY `id_sppd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `spt`
--
ALTER TABLE `spt`
  MODIFY `id_spt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `ttd_kuitansi`
--
ALTER TABLE `ttd_kuitansi`
  MODIFY `id_ttd_kuitansi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `biaya_perjalanan`
--
ALTER TABLE `biaya_perjalanan`
  ADD CONSTRAINT `biaya_perjalanan_ibfk_1` FOREIGN KEY (`kota_id`) REFERENCES `kota` (`id_kota`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `biaya_perjalanan_ibfk_2` FOREIGN KEY (`golongan_id`) REFERENCES `golongan` (`id_golongan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kuitansi`
--
ALTER TABLE `kuitansi`
  ADD CONSTRAINT `kuitansi_ibfk_1` FOREIGN KEY (`sppd_id`) REFERENCES `sppd` (`id_sppd`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `nppd`
--
ALTER TABLE `nppd`
  ADD CONSTRAINT `nppd_ibfk_1` FOREIGN KEY (`kota_id`) REFERENCES `kota` (`id_kota`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nppd_ibfk_2` FOREIGN KEY (`kendaraan_id`) REFERENCES `kendaraan` (`id_kendaraan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `pegawai_ibfk_1` FOREIGN KEY (`golongan_id`) REFERENCES `golongan` (`id_golongan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `perjalanan_dinas`
--
ALTER TABLE `perjalanan_dinas`
  ADD CONSTRAINT `perjalanan_dinas_ibfk_1` FOREIGN KEY (`spt_id`) REFERENCES `spt` (`id_spt`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `sppd`
--
ALTER TABLE `sppd`
  ADD CONSTRAINT `sppd_ibfk_1` FOREIGN KEY (`spt_id`) REFERENCES `spt` (`id_spt`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sppd_ibfk_2` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `spt`
--
ALTER TABLE `spt`
  ADD CONSTRAINT `spt_ibfk_1` FOREIGN KEY (`nppd_id`) REFERENCES `nppd` (`id_nppd`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
