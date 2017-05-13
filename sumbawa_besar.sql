-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2017 at 08:52 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sumbawa_besar`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(33) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `id_hotel` int(11) NOT NULL,
  `nama_hotel` text NOT NULL,
  `gambar` text NOT NULL,
  `no_telepon` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `kode_wilayah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`id_hotel`, `nama_hotel`, `gambar`, `no_telepon`, `alamat`, `latitude`, `longitude`, `kode_wilayah`) VALUES
(1, 'Hotel Pules', 'prewed.jpg', '02745654', 'jl. mataram', -7.7919537, 110.3655663, 2),
(2, 'Hotel Ibis Malioboro', 'hotel-ibis-yogyakarta.jpg', '027465865', 'jl. malioboro', -7.793026, 110.3642944, 2);

-- --------------------------------------------------------

--
-- Table structure for table `kabar_wisata`
--

CREATE TABLE `kabar_wisata` (
  `id_kabarwisata` int(11) NOT NULL,
  `isi_kabarwisata` text NOT NULL,
  `judul` text NOT NULL,
  `hari` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` char(5) NOT NULL,
  `gambar` text NOT NULL,
  `alamat` text NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kabar_wisata`
--

INSERT INTO `kabar_wisata` (`id_kabarwisata`, `isi_kabarwisata`, `judul`, `hari`, `tanggal`, `jam`, `gambar`, `alamat`, `latitude`, `longitude`) VALUES
(1, 'festivel kuliner nusantara dalam rangka peringatan maulid nabi Muhammad SAW. akan ada diskon besar - besaran dengan beragam aneka masakan se nusantara.\r\nmenampilkan aneka seni budaya dengan beragam adat nusantara menjadi penghibur dalam menikmati sajian nusantara bagi anda.', 'festival kuliner nusantara', 'Rabu', '2017-05-10', '15:00', 'kuliner_nusantara.jpg', 'jl. malioboro', 7.7937417, 110.3634223),
(2, '<p>aneka lampion akan menghiasi sepanjang jalan malioboro dalam rangka festival lampion ramadhan. tentunya akan menjadi pemandangan menakjubkan terutama bagi anda yang menyenangi foto selfie.</p>\r\n', 'festival ramadhan', 'Jumat', '2017-05-12', '19:00', 'lantern-festival.png', 'jl. malioboro', -7.7503417, 110.3676223);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Wisata Sejarah'),
(2, 'Wisata Kuliner'),
(3, 'Wisata Religi'),
(5, 'Wisata Alam');

-- --------------------------------------------------------

--
-- Table structure for table `restoran`
--

CREATE TABLE `restoran` (
  `id_restoran` int(11) NOT NULL,
  `nama_restoran` text NOT NULL,
  `gambar` text NOT NULL,
  `alamat` text NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `kode_wilayah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restoran`
--

INSERT INTO `restoran` (`id_restoran`, `nama_restoran`, `gambar`, `alamat`, `latitude`, `longitude`, `kode_wilayah`) VALUES
(1, 'Solaria', 'solaria.jpg', 'jl. malioboro', -7.7931168, 110.3638727, 2),
(2, 'Gudeg Yu Djum', 'gudeg-yu-djum.jpg', 'jl. panembahan senopati', -7.8047867, 110.3646903, 2);

-- --------------------------------------------------------

--
-- Table structure for table `spbu`
--

CREATE TABLE `spbu` (
  `id_spbu` int(11) NOT NULL,
  `nama_spbu` text NOT NULL,
  `gambar` text NOT NULL,
  `alamat` text NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `kode_wilayah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spbu`
--

INSERT INTO `spbu` (`id_spbu`, `nama_spbu`, `gambar`, `alamat`, `latitude`, `longitude`, `kode_wilayah`) VALUES
(1, 'SPBU 44-55115', 'wisudaa.jpg', 'JL. Sultan Agung, No. 66, Gunungketur Pakualaman, 55111, Gunungketur, Pakualaman, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55166', -7.8070985, 110.3577809, 2),
(2, 'SPBU Pertamina 44.551.04', '3201414_-vrByRWmHzFh-giUgQu7myAMiTK2Bc1jfsog_XD1fHk.jpg', 'Jl. Sugeng Jeroni, Patangpuluhan, Wirobrajan, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55124', -7.8116847, 110.3490903, 2);

-- --------------------------------------------------------

--
-- Table structure for table `wilayah`
--

CREATE TABLE `wilayah` (
  `kode_wilayah` int(11) NOT NULL,
  `nama_wilayah` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wilayah`
--

INSERT INTO `wilayah` (`kode_wilayah`, `nama_wilayah`) VALUES
(1, 'Sleman'),
(2, 'Kota Yogyakarta'),
(3, 'Bantul');

-- --------------------------------------------------------

--
-- Table structure for table `wisata`
--

CREATE TABLE `wisata` (
  `kode_wisata` int(11) NOT NULL,
  `nama_wisata` text NOT NULL,
  `deskripsi` text NOT NULL,
  `alamat` text NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `gambar` text NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `kode_wilayah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wisata`
--

INSERT INTO `wisata` (`kode_wisata`, `nama_wisata`, `deskripsi`, `alamat`, `latitude`, `longitude`, `gambar`, `id_kategori`, `kode_wilayah`) VALUES
(2, 'Monumen Jogja Kembali', '<p>Monumen Jogja Kembali atau biasa disebut dengan monjali merupakan sebuah monumen diorama yang menceritakan tentang masa perjuangan kemerdekaan Indonesia saat pemerintahannya berpusat di kota Yogyakarta.</p>\r\n', 'jl. monjali', -7.7495904, 110.3696068, 'Monumen-Jogja-Kembali.jpg', 1, 1),
(3, 'Kuliner Malioboro', '<p>beraneka masakan kuliner khas kota Yogyakarta berjajar di sepanjang jalan Malioboro. beragam cita rasa dan disajikan musisi jalanan sebagai ciri khas dari kawasan Malioboro akan membuat memory tersendiri bagi anda untuk merindukan kembali ketempat itu.</p>\r\n', 'jl. malioboro', -7.7937417, 110.3634223, 'Pecel-Senggol-Pasar-Beringharjo-3-www.indrindro.com_.jpg', 2, 2),
(4, 'Pantai Parangtritis', '<p>deskripsi pantai parangtritis deskripsi pantai parangtritis deskripsi pantai parangtritis deskripsi pantai parangtritis deskripsi pantai parangtritis deskripsi pantai parangtritis deskripsi pantai parangtritis deskripsi pantai parangtritis deskripsi pantai parangtritis deskripsi pantai parangtritis deskripsi pantai parangtritis deskripsi pantai parangtritis deskripsi pantai parangtritis deskripsi pantai parangtritis deskripsi pantai parangtritis deskripsi pantai parangtritis deskripsi pantai parangtritis deskripsi pantai parangtritis deskripsi pantai parangtritis deskripsi pantai parangtritis deskripsi pantai parangtritis deskripsi pantai parangtritis deskripsi pantai parangtritis deskripsi pantai parangtritis deskripsi pantai parangtritis deskripsi pantai parangtritis deskripsi pantai parangtritis deskripsi pantai parangtritis deskripsi pantai parangtritis deskripsi pantai parangtritis deskripsi pantai parangtritis deskripsi pantai parangtritis deskripsi pantai parangtritis deskripsi pantai parangtritis deskripsi pantai parangtritis deskripsi pantai parangtritis deskripsi pantai parangtritis deskripsi pantai parangtritis deskripsi pantai parangtritis deskripsi pantai parangtritis deskripsi pantai parangtritis deskripsi pantai parangtritis deskripsi pantai parangtritis deskripsi pantai parangtritis</p>\r\n', 'jl. parangtritis', -8.0285951, 110.3265073, 'Sumber-panoramio.jpg', 5, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`id_hotel`),
  ADD KEY `kode_wilayah` (`kode_wilayah`);

--
-- Indexes for table `kabar_wisata`
--
ALTER TABLE `kabar_wisata`
  ADD PRIMARY KEY (`id_kabarwisata`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `restoran`
--
ALTER TABLE `restoran`
  ADD PRIMARY KEY (`id_restoran`),
  ADD KEY `kode_wilayah` (`kode_wilayah`);

--
-- Indexes for table `spbu`
--
ALTER TABLE `spbu`
  ADD PRIMARY KEY (`id_spbu`),
  ADD KEY `kode_wilayah` (`kode_wilayah`);

--
-- Indexes for table `wilayah`
--
ALTER TABLE `wilayah`
  ADD PRIMARY KEY (`kode_wilayah`);

--
-- Indexes for table `wisata`
--
ALTER TABLE `wisata`
  ADD PRIMARY KEY (`kode_wisata`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `kode_wilayah` (`kode_wilayah`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `id_hotel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `kabar_wisata`
--
ALTER TABLE `kabar_wisata`
  MODIFY `id_kabarwisata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `restoran`
--
ALTER TABLE `restoran`
  MODIFY `id_restoran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `spbu`
--
ALTER TABLE `spbu`
  MODIFY `id_spbu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `wilayah`
--
ALTER TABLE `wilayah`
  MODIFY `kode_wilayah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `wisata`
--
ALTER TABLE `wisata`
  MODIFY `kode_wisata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `hotel`
--
ALTER TABLE `hotel`
  ADD CONSTRAINT `hotel_ibfk_1` FOREIGN KEY (`kode_wilayah`) REFERENCES `wilayah` (`kode_wilayah`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `restoran`
--
ALTER TABLE `restoran`
  ADD CONSTRAINT `restoran_ibfk_1` FOREIGN KEY (`kode_wilayah`) REFERENCES `wilayah` (`kode_wilayah`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `spbu`
--
ALTER TABLE `spbu`
  ADD CONSTRAINT `spbu_ibfk_1` FOREIGN KEY (`kode_wilayah`) REFERENCES `wilayah` (`kode_wilayah`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wisata`
--
ALTER TABLE `wisata`
  ADD CONSTRAINT `wisata_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wisata_ibfk_2` FOREIGN KEY (`kode_wilayah`) REFERENCES `wilayah` (`kode_wilayah`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
