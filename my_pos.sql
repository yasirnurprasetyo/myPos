-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 13 Jun 2020 pada 09.39
-- Versi Server: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_pos`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `jk` char(1) NOT NULL,
  `tlpn` varchar(13) DEFAULT NULL,
  `alamat` text NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`customer_id`, `nama`, `jk`, `tlpn`, `alamat`, `created`, `updated`) VALUES
(1, 'Tukijan', 'L', '0812663554', 'Cangkringan, Sleman', '2020-05-24 12:17:08', NULL),
(2, 'Poniyem', 'P', '0812636565', 'Minggir, Sleman', '2020-05-24 12:17:39', NULL),
(3, 'Wardoyo', 'L', '081237665621', 'Jogokriyan', '2020-05-27 17:42:18', NULL),
(4, 'Yupini', 'P', '02132132423', 'Klaten', '2020-06-06 00:04:58', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `nama`, `created`, `updated`) VALUES
(1, 'Makanan Ringan', '2020-05-24 14:36:40', NULL),
(2, 'Minuman Ringan', '2020-05-24 14:36:40', NULL),
(4, 'Obat-obatan', '2020-05-24 14:36:40', NULL),
(5, 'Barang ', '2020-05-24 16:54:19', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `p_item`
--

CREATE TABLE `p_item` (
  `item_id` int(11) NOT NULL,
  `barcode` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `stock` int(11) NOT NULL DEFAULT '0',
  `image` varchar(100) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `p_item`
--

INSERT INTO `p_item` (`item_id`, `barcode`, `nama`, `kategori_id`, `unit_id`, `harga`, `stock`, `image`, `created`, `updated`) VALUES
(1, 'B001', 'Permen', 1, 4, 250, 60, 'item-200525-4dc2a01986.png', '2020-05-24 15:45:40', '2020-05-25 07:58:40'),
(21, 'B003', 'Alat Makan', 5, 4, 8500, 90, 'item-200525-1405a7b24a.PNG', '2020-05-25 12:40:02', NULL),
(22, 'B004', 'Tempat Sampah', 5, 4, 8500, 109, 'item-200525-0cf6a21b19.PNG', '2020-05-25 12:43:09', NULL),
(23, 'B005', 'Tas Belanja', 5, 4, 12500, 50, 'item-200525-71b7e6ccc4.PNG', '2020-05-25 12:43:33', NULL),
(24, 'B006', 'Trolli Belanja', 5, 4, 54500, 0, 'item-200525-88722ecd12.PNG', '2020-05-25 12:44:04', NULL),
(25, 'B007', 'Komputer', 5, 4, 40000, 7, 'item-200527-7b17fa5566.png', '2020-05-27 17:29:03', NULL),
(26, 'B008', 'Pepsodent', 4, 4, 6000, 100, 'item-200605-af9e274cc6.jpg', '2020-06-06 00:06:46', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `suplier`
--

CREATE TABLE `suplier` (
  `suplier_id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tlpn` varchar(13) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `suplier`
--

INSERT INTO `suplier` (`suplier_id`, `nama`, `tlpn`, `alamat`, `deskripsi`, `created`, `updated`) VALUES
(1, 'Toko B', '0812366515', 'Wirobrajan, Kota Yogyakarta', 'Suplier Alat Masak Dapur', '2020-05-23 12:50:03', '2020-05-24 06:40:25'),
(6, 'Toko A', '08128362123', 'Gondokusuman, Kota Yogyakarta', 'Suplier Alat Tulis dan Kantor', '2020-05-24 11:36:40', '2020-05-24 06:36:40'),
(7, 'Toko C', '022123837284', 'Girisubo, Gunung Kidul', 'Suplier Bahan Sembako\r\n', '2020-05-27 11:02:52', NULL),
(8, 'Toko D', '0123862153', 'Wirobrajan, Kota Yogyakarta', 'Suplier Makanan dan Minuman', '2020-06-06 00:05:34', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_cart`
--

CREATE TABLE `t_cart` (
  `cart_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `diskon_item` int(11) DEFAULT NULL,
  `total` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_cart`
--

INSERT INTO `t_cart` (`cart_id`, `item_id`, `harga`, `qty`, `diskon_item`, `total`, `user_id`) VALUES
(2, 1, 250, 4, NULL, 1000, 2),
(3, 23, 12500, 3, NULL, 37500, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_sales`
--

CREATE TABLE `t_sales` (
  `sales_id` int(11) NOT NULL,
  `nota` varchar(50) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `total` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  `grand_total` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `kembalian` int(11) NOT NULL,
  `catatan` text NOT NULL,
  `tanggal` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_sales`
--

INSERT INTO `t_sales` (`sales_id`, `nota`, `customer_id`, `total`, `diskon`, `grand_total`, `bayar`, `kembalian`, `catatan`, `tanggal`, `user_id`, `created`) VALUES
(1, 'TRX2004290001', 2, 58250, 250, 58000, 60000, 2000, 'Lunas', '2020-04-20', 1, '2020-05-29 20:15:39'),
(2, 'TRX2005290002', NULL, 3750, 50, 3700, 4000, 300, 'Lunas', '2020-05-29', 1, '2020-05-29 20:16:06'),
(3, 'TRX2005290003', NULL, 68750, 50, 68700, 70000, 1300, 'Lunas', '2020-05-29', 1, '2020-05-29 20:17:07'),
(4, 'TRX2005300001', NULL, 672, 100, 572, 90000000, 89999428, 'uyrf', '2020-05-30', 1, '2020-05-30 19:50:33'),
(5, 'TRX2006120001', NULL, 9000, 1000, 8000, 10000, 2000, 'Lunas', '2020-06-12', 1, '2020-06-12 23:48:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_sales_detail`
--

CREATE TABLE `t_sales_detail` (
  `detail_id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `diskon_item` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_sales_detail`
--

INSERT INTO `t_sales_detail` (`detail_id`, `sales_id`, `item_id`, `harga`, `qty`, `diskon_item`, `total`) VALUES
(1, 1, 1, 250, 5, 0, 1250),
(2, 1, 22, 8500, 2, 0, 17000),
(3, 1, 25, 40000, 1, 0, 40000),
(4, 3, 22, 8500, 8, 0, 68000),
(5, 3, 1, 250, 5, 100, 750),
(6, 4, 1, 250, 3, 26, 672),
(7, 5, 1, 250, 2, 0, 500),
(8, 5, 22, 8500, 1, 0, 8500);

--
-- Trigger `t_sales_detail`
--
DELIMITER $$
CREATE TRIGGER `stock_min` AFTER INSERT ON `t_sales_detail` FOR EACH ROW BEGIN 
	UPDATE p_item SET stock = stock - NEW.qty
    WHERE item_id = NEW.item_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_stock`
--

CREATE TABLE `t_stock` (
  `stock_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `type` enum('in','out') NOT NULL,
  `detail` varchar(200) DEFAULT NULL,
  `suplier_id` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `date` date NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_stock`
--

INSERT INTO `t_stock` (`stock_id`, `item_id`, `type`, `detail`, `suplier_id`, `qty`, `date`, `created`, `user_id`) VALUES
(5, 1, 'in', 'Kulakan', 6, 10, '2020-05-26', '2020-05-26 11:06:44', 1),
(7, 1, 'in', 'Tambahan', 6, 100, '2020-05-26', '2020-05-26 15:24:30', 1),
(8, 1, 'out', 'Rusak', NULL, 5, '2020-05-26', '2020-05-26 15:25:01', 1),
(9, 1, 'out', 'Kadaluarsa', NULL, 8, '2020-05-26', '2020-05-26 15:26:02', 1),
(10, 21, 'in', 'Kulakan', 1, 100, '2020-05-26', '2020-05-26 23:22:46', 1),
(11, 23, 'in', 'Kulakan', 1, 60, '2020-05-26', '2020-05-26 23:23:02', 1),
(12, 22, 'in', 'Kulakan', 1, 150, '2020-05-27', '2020-05-27 15:09:35', 1),
(13, 25, 'in', 'Kulakan', 6, 10, '2020-05-27', '2020-05-27 17:29:53', 1),
(14, 25, 'out', 'Rusak', NULL, 1, '2020-05-27', '2020-05-27 17:30:28', 1),
(15, 26, 'in', 'Kulakan', 6, 100, '2020-06-12', '2020-06-13 01:15:47', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `unit`
--

CREATE TABLE `unit` (
  `unit_id` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `unit`
--

INSERT INTO `unit` (`unit_id`, `nama`, `created`, `updated`) VALUES
(1, 'Kilo', '2020-05-24 14:37:16', NULL),
(2, 'Gram', '2020-05-24 14:37:16', '2020-05-24 09:38:28'),
(4, 'Buah', '2020-05-24 16:20:36', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `level` int(1) NOT NULL COMMENT '1:admin, 2:kasir'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `nama`, `alamat`, `level`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Yasir Nur Prasetya', 'Berbah', 1),
(2, 'kasir', '8691e4fc53b99da544ce86e22acba62d13352eff', 'Tata', 'Berbah', 2),
(3, 'paijo', '33ca1335e7e0d3fdf92194e62d232b8a8236eb50', 'Paijo', 'Solo', 2),
(4, 'paiyem', 'a94ef28048a2d0a23a36fc173c49381fc62e2d4d', 'Paiyem', 'Kalasan', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `p_item`
--
ALTER TABLE `p_item`
  ADD PRIMARY KEY (`item_id`),
  ADD UNIQUE KEY `barcode` (`barcode`),
  ADD KEY `kategori_id` (`kategori_id`),
  ADD KEY `unit_id` (`unit_id`);

--
-- Indexes for table `suplier`
--
ALTER TABLE `suplier`
  ADD PRIMARY KEY (`suplier_id`);

--
-- Indexes for table `t_cart`
--
ALTER TABLE `t_cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `t_sales`
--
ALTER TABLE `t_sales`
  ADD PRIMARY KEY (`sales_id`);

--
-- Indexes for table `t_sales_detail`
--
ALTER TABLE `t_sales_detail`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `t_stock`
--
ALTER TABLE `t_stock`
  ADD PRIMARY KEY (`stock_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `suplier_id` (`suplier_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`unit_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `p_item`
--
ALTER TABLE `p_item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `suplier`
--
ALTER TABLE `suplier`
  MODIFY `suplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `t_sales`
--
ALTER TABLE `t_sales`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `t_sales_detail`
--
ALTER TABLE `t_sales_detail`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `t_stock`
--
ALTER TABLE `t_stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `p_item`
--
ALTER TABLE `p_item`
  ADD CONSTRAINT `p_item_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`kategori_id`),
  ADD CONSTRAINT `p_item_ibfk_2` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`unit_id`);

--
-- Ketidakleluasaan untuk tabel `t_cart`
--
ALTER TABLE `t_cart`
  ADD CONSTRAINT `t_cart_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `p_item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_cart_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `t_sales_detail`
--
ALTER TABLE `t_sales_detail`
  ADD CONSTRAINT `t_sales_detail_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `p_item` (`item_id`);

--
-- Ketidakleluasaan untuk tabel `t_stock`
--
ALTER TABLE `t_stock`
  ADD CONSTRAINT `t_stock_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `p_item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_stock_ibfk_2` FOREIGN KEY (`suplier_id`) REFERENCES `suplier` (`suplier_id`),
  ADD CONSTRAINT `t_stock_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
