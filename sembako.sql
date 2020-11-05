-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 27 Okt 2020 pada 08.40
-- Versi Server: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sembako`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Struktur dari tabel `items`
--

CREATE TABLE `items` (
  `id_item` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_lokasi` int(11) NOT NULL,
  `nama_item` varchar(225) NOT NULL,
  `merk` varchar(225) NOT NULL,
  `harga` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  `deskripsi` varchar(225) NOT NULL,
  `foto` varchar(225) NOT NULL,
  `terjual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `items`
--

INSERT INTO `items` (`id_item`, `id_kategori`, `id_lokasi`, `nama_item`, `merk`, `harga`, `qty`, `diskon`, `deskripsi`, `foto`, `terjual`) VALUES
(1, 2, 3, 'Daging Ayam Berkualitas', 'Frozen', 47000, 19, 10, 'Daging Ayam utuh berkualitas tinggi', '2099878612494-4948793_full-chicken-png-free-background-daging-ayam-segar.png', 1),
(2, 6, 3, 'Sirup Marjan Bervariasi rasa', 'Marjan', 39500, 88, 20, 'Sirup Marjan Bervariasi Marjan', '1451697730marjan-syrup-citra-sukses-international-sirup-png-292_292.png', 2),
(3, 5, 1, 'Minya Goreng Filma 2L', 'Filma', 27000, 900, 0, 'Minyak Goreng Filma\r\n\r\nHasil Buah Sawi Pilihan \r\n\r\nmengandung Vitamin D & E\r\n\r\nHalal\r\nIsi Bersih : 2L', '203313024minyak-png-4-Transparent-Images-Free.png', 3),
(5, 3, 6, 'Beras BerlianSAE', 'BerlianSAE', 74500, 29, 65, 'Beras BerlianSAE\r\nBeras Pilihan anda SEHAT, AMAN, ENAK\r\nDiproduksi menggunakan Teknologi pertanian ramah lingkungan\r\n\r\nBEBAS DARI RESIDU PESTISIDA\r\n\r\nHALAL\r\nBerat Bersih : 2kg', '310509819beras-png-min.png', 4),
(6, 4, 2, 'Berbagai macam Snack keluarga', 'Macam Macam', 29000, 8, 0, 'Berbagai Macam Jenis Snack', '500868236246-2465291_snacks-pirate-brands-pirates-booty-aged-white-cheddar.png', 6),
(7, 1, 2, 'Sayuran berkulitas Import', 'Import', 15000, 84, 0, 'Sayuran Berkualitas Import', '49812435SEKEN-Produksi-Sayur-Mayur-Sulteng-Meningkat-Drastis.png', 14);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
(1, 'Sayuran'),
(2, 'Daging'),
(3, 'Beras'),
(4, 'Snack'),
(5, 'Minyak'),
(6, 'Minuman');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasi`
--

CREATE TABLE `lokasi` (
  `id_lokasi` int(11) NOT NULL,
  `lokasi` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lokasi`
--

INSERT INTO `lokasi` (`id_lokasi`, `lokasi`) VALUES
(1, 'Tangerang'),
(2, 'Jakarta'),
(3, 'Depok'),
(4, 'Bogor'),
(5, 'Bandung'),
(6, 'Bekasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `members`
--

CREATE TABLE `members` (
  `id_member` int(11) NOT NULL,
  `id_lokasi` int(11) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `telepon` int(11) NOT NULL,
  `no_rekening` int(11) NOT NULL,
  `kode_pos` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `foto` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `members`
--

INSERT INTO `members` (`id_member`, `id_lokasi`, `nama`, `email`, `password`, `telepon`, `no_rekening`, `kode_pos`, `alamat`, `foto`) VALUES
(1, 3, 'Alfharizky Fauzi1', 'alfha.a@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 123123, 123123, 123123, 'disitu kok\r\nasdadadsadadasdada', '5582placeholder.png'),
(4, 1, 'Alfharizky Fauzi', 'alfharizky@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 1267890, 2147483647, 12345, 'di mana mana hatiku senang', '9159846985582placeholder.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `judul_menu` varchar(225) NOT NULL,
  `caption` varchar(225) NOT NULL,
  `status` int(11) NOT NULL,
  `konten` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_menu`, `judul_menu`, `caption`, `status`, `konten`) VALUES
(1, 'About', 'Informasi tentang kami', 1, 'Sembako Merupakan Toko Online yang memberikan kenyamanan kepada pelanggan dan tetap terhubung dengan kami, yang menyediakan berbagai macam kebutuhan sembilan barang pokok anda, kami siap melayani anda\r\n\r\nTerima kasih,\r\n\r\nOwner'),
(2, 'Contact', 'Hubungi Kami', 1, '<b>Customer Service</b> <br/>\r\n<p>Alfharizky Fauzi: +628123456789</p>'),
(3, 'Legal', 'Legalitas Website', 2, 'Seluruh konten yang berada di website ini adalah legal dan bersertifikat'),
(4, 'Copyright', 'Hak cipta website', 2, 'Website kami memiliki hak cipta yang dilindungi oleh undang-undang'),
(5, 'Privacy', 'Privasi website', 2, 'Beberapa konten diwebsite kami adalah privasi dan illegal untuk mengambil konten tersebut tanpa izin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_detail`
--

CREATE TABLE `order_detail` (
  `id_od` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `invoice_number` int(20) NOT NULL,
  `qty` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `order_detail`
--

INSERT INTO `order_detail` (`id_od`, `id_item`, `invoice_number`, `qty`, `total_harga`) VALUES
(27, 7, 125578, 1, 6615000),
(28, 5, 125578, 1, 259875),
(29, 6, 16857, 1, 290000),
(30, 2, 16857, 1, 3164400),
(31, 7, 329041500, 1, 6615000),
(32, 7, 129041551, 2, 13230000),
(33, 6, 129041554, 1, 290000),
(34, 7, 417102024, 3, 45000),
(35, 7, 423102037, 2, 30000),
(36, 5, 423102037, 1, 26075),
(37, 2, 423102037, 1, 31600);

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_group`
--

CREATE TABLE `order_group` (
  `id_og` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `invoice_number` int(20) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `bp` varchar(225) NOT NULL,
  `status` int(11) NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `order_group`
--

INSERT INTO `order_group` (`id_og`, `id_member`, `invoice_number`, `total_bayar`, `bp`, `status`, `tgl`) VALUES
(13, 1, 125578, 6874875, '1755placeholder.png', 3, '2020-10-01 07:25:30'),
(14, 1, 16857, 3454400, '', 0, '2020-10-01 07:25:49'),
(15, 4, 329041500, 6615000, '971placeholder.png', 2, '2020-10-01 08:00:43'),
(16, 1, 129041551, 13230000, '2036515460hp-wireless-classic-desktop-120x120.jpg', 1, '2020-10-01 10:51:58'),
(17, 1, 129041554, 290000, '1442330533Fujitsu_4GB_1x4GB_2Rx8_DDR3-1600_U_ECC-120x120.jpg', 3, '2020-10-01 10:54:52'),
(18, 4, 417102024, 45000, '', 0, '2020-10-17 11:24:53'),
(19, 4, 423102037, 30000, '', 0, '2020-10-22 18:37:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `testimoni`
--

CREATE TABLE `testimoni` (
  `id_testimoni` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `testimoni` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `testimoni`
--

INSERT INTO `testimoni` (`id_testimoni`, `id_member`, `testimoni`) VALUES
(4, 1, 'iTech sangat membantu sekali untuk membeli barang elektronik udah murah ongkos kirimnya gratis pula thanks itech ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id_item`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id_od`);

--
-- Indexes for table `order_group`
--
ALTER TABLE `order_group`
  ADD PRIMARY KEY (`id_og`);

--
-- Indexes for table `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`id_testimoni`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id_lokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id_od` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `order_group`
--
ALTER TABLE `order_group`
  MODIFY `id_og` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `id_testimoni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
