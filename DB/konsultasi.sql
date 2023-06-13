-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Jun 2023 pada 06.32
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `konsultasi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `email`) VALUES
(1, 'alvika', '11e01fc6fbe051e7074e594784e44519', 'alvikaajiandrianty@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `advokat`
--

CREATE TABLE `advokat` (
  `id_advokat` int(11) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_tlp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `advokat`
--

INSERT INTO `advokat` (`id_advokat`, `nama_lengkap`, `username`, `password`, `jenis_kelamin`, `foto`, `email`, `no_tlp`) VALUES
(2, 'Neneng Pipit Adrianty', 'pipit', '5c40ee0ae05c339a9f8502d29a49541d', 'Wanita', 'DSCF1496.jpg', 'pipit@gmail.com', '08979382175');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jawab_konsultasi`
--

CREATE TABLE `jawab_konsultasi` (
  `id_jawab_konsultasi` int(11) NOT NULL,
  `id_advokat` int(11) NOT NULL,
  `id_konsultasi` int(11) NOT NULL,
  `isi_jawab` text NOT NULL,
  `show_jawab` int(2) NOT NULL,
  `tgl_jawab` varchar(100) NOT NULL,
  `jam_jawab` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jawab_konsultasi`
--

INSERT INTO `jawab_konsultasi` (`id_jawab_konsultasi`, `id_advokat`, `id_konsultasi`, `isi_jawab`, `show_jawab`, `tgl_jawab`, `jam_jawab`) VALUES
(21, 2, 26, '<p>Waalaikumsalam wr wb.</p>\r\n\r\n<p>Terima kasih atas kepercayaan Saudara kepada halo JPN. Adapun jawaban Kami atas pertanyaan Saudara adalah sebagai berikut:</p>\r\n\r\n<p>Perceraian hendaknya menjadi pilihan terakhir bagi pasangan suami istri setelah semua upaya telah ditempuh untuk menjaga keutuhan rumah tangga. Secara umum, pengaturan masalah perceraian di Indonesia terdapat dalam&nbsp;UU Perkawinan, PP 9/1975,&nbsp;dan&nbsp;KHI&nbsp;bagi yang beragama Islam.</p>\r\n\r\n<p>Dalam&nbsp;Pasal 39 UU Perkawinan&nbsp;diatur sebagai berikut.</p>\r\n\r\n<p>Perceraian hanya dapat dilakukan di depan sidang pengadilan setelah pengadilan yang bersangkutan berusaha dan tidak berhasil mendamaikan kedua belah pihak.</p>\r\n\r\n<p>Untuk melakukan perceraian harus ada cukup alasan, bahwa antara suami istri itu tidak akan dapat hidup rukun sebagai suami istri.</p>\r\n\r\n<p>Tata cara perceraian di depan sidang pengadilan diatur dalam peraturan perundangan tersendiri.</p>\r\n\r\n<p>Selain itu,&nbsp;Pasal 115 KHI&nbsp; menegaskan bahwa perceraian hanya dapat dilakukan di depan sidang Pengadilan Agama setelah Pengadilan Agama berusaha dan tidak berhasil mendamaikan kedua belah pihak.</p>\r\n\r\n<p>Maka berdasarkan&nbsp;Pasal 39 ayat (1) UU Perkawinan maupun Pasal 115 KHI, perceraian hanya dapat dilakukan di depan sidang pengadilan. Yang dimaksud dengan pengadilan menurut&nbsp;Pasal 1 huruf b PP 9/1975&nbsp;adalah&nbsp;Pengadilan Agama bagi mereka yang beragama Islam dan Pengadilan Negeri bagi yang lainnya.</p>\r\n\r\n<p>Jika Perceraian Tidak Dilakukan Melalui Pengadilan, dari penjelasan di atas dapat diketahui bahwa baik menurut hukum positif yang terdapat dalam UU Perkawinan dan PP 9/1975 maupun menurut hukum Islam,&nbsp;perceraian itu hanya sah apabila melalui proses sidang di pengadilan. Jadi, menjawab pertanyaan Anda, jika perceraian tanpa sidang pengadilan yang hanya dilakukan dengan surat pernyataan cerai adalah tidak sah.</p>\r\n\r\n<p>Demikian Kami sampaikan, apabila Saudara masih memiliki pertanyaan lain yang ingin disampaikan, Saudara dapat berkonsultasi secara langsung ke Pos Pelayanan Hukum Kami yang berada di Kantor Pengacara Negara pada Kejaksaan Negeri Sambas secara gratis.</p>\r\n', 1, '2023-06-13', '05:58:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_konsultasi`
--

CREATE TABLE `kategori_konsultasi` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `deskripsi_kategori` varchar(250) NOT NULL,
  `icon_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori_konsultasi`
--

INSERT INTO `kategori_konsultasi` (`id_kategori`, `nama_kategori`, `deskripsi_kategori`, `icon_kategori`) VALUES
(6, 'Pidana', 'Masalah tentang pidana korupsi', 'handcuffs1.png'),
(7, 'Hukum Waris', 'Mengenai masalah hukum waris yang salah', 'mediator1.png'),
(8, 'Pernikahan & Penceraian', 'Masalah Mengenai Pernikahan dan penceraian', 'couple.png'),
(9, 'Buruh dan ketenagakerjaan', 'Masalah mengenai ketenagakerjaan', 'crowd.png'),
(10, 'Hutang Piutang', 'Mengenai Masalah Hutang Piutang', 'calculate.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konsultasi`
--

CREATE TABLE `konsultasi` (
  `id_konsultasi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status_konsultasi` int(2) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `deskripsi_masalah` text NOT NULL,
  `privasi` int(2) NOT NULL,
  `tgl_isi` varchar(100) NOT NULL,
  `time_isi` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `konsultasi`
--

INSERT INTO `konsultasi` (`id_konsultasi`, `id_user`, `status_konsultasi`, `id_kategori`, `judul`, `deskripsi_masalah`, `privasi`, `tgl_isi`, `time_isi`) VALUES
(25, 92, 0, 10, 'TIDAK MEMBAYAR HUTANG DILAPORKAN POLISI KARENA PENIPUAN', '<p>A meminjam uang kepada B sebesar Rp.20.000.000, setiap minggu terdapat angsuran, kebetulan karena A tidak punya uang A baru 6 kali membayar angsuran, karena A beberapa kali sudah tidak membayar angsuran tersebut, maka B mengancam akan melaporkan A ke polisi karena telah melakukan penipuan?<br />\r\n<br />\r\nApakah A bisa dipenjara karena tidak mampu membayar hutang tersebut?</p>\r\n', 1, '2023-06-13', '10:38:02'),
(26, 92, 1, 8, 'PERCERAIAN DI LUAR PENGADILAN', '<p>Assalamualaikum, JPN. Izinkan saya bertanya.</p>\r\n\r\n<p>Saya dan istri bersepakat untuk bercerai tetapi hanya dengan membuat surat pernyataan cerai di atas materai dengan disaksikan oleh 2 (dua) orang saksi. Pernikahan saya dan istri memiliki surat kawin yang sah. Apakah perceraian yang kami lakukan tersebut sah menurut hukum? Ataukah kami harus melakukan perceraian melalui Pengadilan Agama?</p>\r\n', 0, '2023-06-13', '10:38:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `no_whatsapp` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_lengkap`, `username`, `email`, `password`, `no_whatsapp`, `jenis_kelamin`) VALUES
(92, 'Nanda Marta', 'nanda', 'nanda@gmail.com', '517035c51b4e006a6aa51ba13b8eeec3', '08979382175', 'Pria'),
(93, 'rizki agung', 'rizki', 'rizki@gmail.com', '9592638716b04b52fe6e041429822a79', '0897938215', 'Pria');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `advokat`
--
ALTER TABLE `advokat`
  ADD PRIMARY KEY (`id_advokat`);

--
-- Indeks untuk tabel `jawab_konsultasi`
--
ALTER TABLE `jawab_konsultasi`
  ADD PRIMARY KEY (`id_jawab_konsultasi`);

--
-- Indeks untuk tabel `kategori_konsultasi`
--
ALTER TABLE `kategori_konsultasi`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `konsultasi`
--
ALTER TABLE `konsultasi`
  ADD PRIMARY KEY (`id_konsultasi`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `advokat`
--
ALTER TABLE `advokat`
  MODIFY `id_advokat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `jawab_konsultasi`
--
ALTER TABLE `jawab_konsultasi`
  MODIFY `id_jawab_konsultasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `kategori_konsultasi`
--
ALTER TABLE `kategori_konsultasi`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `konsultasi`
--
ALTER TABLE `konsultasi`
  MODIFY `id_konsultasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
