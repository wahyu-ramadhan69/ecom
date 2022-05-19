-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2022 at 07:46 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fruitables`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `user_id`, `nama`, `email`, `alamat`, `foto`) VALUES
(4, 13, 'ikhlasul', 'wahyu.ramadhani6969@gmail.com', 'jauhhh', NULL),
(9, 22, 'dewobytes', 'dewo@gmail.com', 'siapasldjask jdbaks dbaskbdhas bshhdb,asb dugxnc baosh bdaslkj bd', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `kategori`) VALUES
(1, 'sayur'),
(2, 'buah'),
(5, 'sayur kering');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga` int(50) NOT NULL,
  `qty` int(50) NOT NULL,
  `total_harga` int(50) NOT NULL,
  `user` varchar(100) NOT NULL,
  `satuan` varchar(100) NOT NULL,
  `nama_file` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`id`, `nama_produk`, `harga`, `qty`, `total_harga`, `user`, `satuan`, `nama_file`) VALUES
(1, 'tomat', 3000, 1, 6000, 'pembeli', 'kg', 'product-53.jpg'),
(37, 'kentang', 10000, 1, 10000, 'wahyu', 'kg', 'kentang1.jpg'),
(55, 'terong bulat', 3500, 1, 3500, 'wahyu', 'kg', 'terong_bulat1.jpg'),
(56, 'terong bulat', 3500, 1, 3500, 'wahyu', 'kg', 'terong_bulat1.jpg'),
(59, 'bawang', 20000, 1, 20000, 'ikhlasul', 'kg', 'bawang1.jpg'),
(60, 'tomat', 6000, 1, 6000, 'ikhlasul', 'kg', 'tomat_(1).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `nama_file` varchar(255) NOT NULL,
  `tipe_file` varchar(255) NOT NULL,
  `ukuran_file` double NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `slug_nama_produk` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `qty` int(50) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `satuan` enum('kg','ikat') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `nama_file`, `tipe_file`, `ukuran_file`, `nama_produk`, `slug_nama_produk`, `harga`, `kategori`, `deskripsi`, `qty`, `waktu`, `satuan`) VALUES
(20, 'tomat_(1).jpg', 'image/jpeg', 1820.16, 'tomat', 'tomat', 6000, 'buah', '<p>tomat segar&nbsp;<br />\r\n.<br />\r\n.<br />\r\n#tomat segar #tomat terbaik #tomat&nbsp; murah</p>', 20, '2020-12-16 02:15:24', 'kg'),
(21, 'jagung_1.jpg', 'image/jpeg', 531.64, 'jagung', 'jagung', 12000, 'buah', '<p>jagung organik berkualitas tinggi</p>', 20, '2020-12-16 02:33:05', 'kg'),
(22, 'cabai_hijau.jpg', 'image/jpeg', 2064.36, 'cabai hijau', 'cabai-hijau', 35000, 'sayur', '<p>cabai hijau segar terbaik</p>', 17, '2021-01-10 06:15:04', 'kg'),
(23, 'kentang1.jpg', 'image/jpeg', 2823.68, 'kentang', 'kentang', 10000, 'sayur', '<p>kentang segar pilihan </p>', 28, '2021-01-16 08:08:35', 'kg'),
(24, 'terong_bulat1.jpg', 'image/jpeg', 614.07, 'terong bulat', 'terong-bulat', 3500, 'sayur', '<p>terong hijau bulat kualitas super</p>', 8, '2021-01-07 16:31:40', 'kg'),
(30, 'bawang1.jpg', 'image/jpeg', 1833.64, 'bawang', 'bawang', 20000, 'buah', '<p>bawang putih terbaik</p>', 1, '2021-01-16 08:08:35', 'kg'),
(31, 'image_6.jpg', 'image/jpeg', 186.07, 'sayur', 'sayur', 1233, 'sayur', '<p>sayur terbaik</p>', 19, '2021-05-27 05:33:31', 'kg'),
(32, 'product-3.jpg', 'image/jpeg', 93.06, 'daun seledri', 'daun-seledri', 2000, 'sayur', '<p>jejeje</p>', 20, '2021-01-15 20:36:29', 'ikat');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `qty` int(50) NOT NULL,
  `total_harga` int(100) NOT NULL,
  `nama_pembeli` varchar(50) NOT NULL,
  `kodepos` varchar(10) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `catatan` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `user` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `metode_pembayaran` varchar(30) NOT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `nama_produk`, `qty`, `total_harga`, `nama_pembeli`, `kodepos`, `alamat`, `email`, `catatan`, `tanggal`, `user`, `status`, `metode_pembayaran`, `foto`) VALUES
(68, 'terong bulat', 1, 3500, 'ikhlasul', '2323', 'jauhhh', 'rewolreman94@gmail.com', 'fewfwefw', '2021-01-07', 'ikhlasul', 'Barang Diterima', 'COD', 'terong_bulat1.jpg'),
(69, 'cabai hijau', 2, 70000, 'ikhlasul', '2323', 'jauhhh', 'wahyu.ramadhani6969@gmail.com', 'cepet', '2021-01-10', 'ikhlasul', 'Dalam Pengiriman', 'COD', 'kentang1.jpg'),
(70, 'kentang', 1, 10000, 'ikhlasul', '2323', 'jauhhh', 'wahyu.ramadhani6969@gmail.com', 'cepet', '2021-01-10', 'ikhlasul', 'Sedang di proses', 'COD', 'kentang1.jpg'),
(71, 'bawang', 1, 20000, 'ikhlasul', '2323', 'jauhhh', 'wahyu.ramadhani6969@gmail.com', 'cepat', '2021-01-16', 'ikhlasul', 'Dalam Pengiriman', 'COD', 'kentang1.jpg'),
(72, 'kentang', 1, 10000, 'ikhlasul', '2323', 'jauhhh', 'wahyu.ramadhani6969@gmail.com', 'cepat', '2021-01-16', 'ikhlasul', 'Sedang di proses', 'COD', 'kentang1.jpg'),
(73, 'sayur', 1, 1233, 'ikhlasul', '2020', 'jauhhh', 'wahyu.ramadhani6969@gmail.com', 'cepattt', '2021-05-27', 'ikhlasul', 'Sedang di proses', 'BNI', 'image_6.jpg'),
(74, 'sayur', 1, 1233, 'ikhlasul', '2020', 'jauhhh', 'wahyu.ramadhani6969@gmail.com', 'cepattt', '2021-05-27', 'ikhlasul', 'Sedang di proses', 'BNI', 'image_6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `level`) VALUES
(2, 'wahyu', 'fruitablesshop@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Admin'),
(13, 'ikhlasul', 'wahyu.ramadhani6969@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Pembeli'),
(22, 'dewobytes', 'dewo@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Pembeli');

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) DEFAULT NULL,
  `token` varchar(128) DEFAULT NULL,
  `tanggal_dibuat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `tanggal_dibuat`) VALUES
(9, 'fruitablesshop@gmail.com', 'cAruZrIFAaTssHMG3SXfihZKyprvdrRzBxfK00E/acI=', 1608087704),
(10, 'sarif9735@gmail.com', 'ABikXz49pQ127u6vejwO4M1WSTGRcOKNZxZL2d8HEbw=', 1608800397),
(11, 'rewolreman94@gmail.com', '3xTBscp/LJS0pCZpuNQZu7toxuRoRo+jxaMml5zfiPw=', 1609160810),
(12, 'rewolreman94@gmail.com', 'JETZAls9Vt4hvranT28tRNW9rFaPxjkRF5eb1evcosU=', 1609160863);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
