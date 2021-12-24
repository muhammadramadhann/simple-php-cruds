-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2021 at 05:30 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `latihan_crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `konfirmasi_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id`, `email`, `username`, `password`, `konfirmasi_password`) VALUES
(1, 'ramadhannkurniawan@gmail.com', 'ramadhanman', '$2y$10$3pOorOuP0xMzZxFn36VIrO.fMV5KrdkL3kmspvjLZt/P0QDhrYDEu', 'Arsenal14.'),
(2, 'admin123@gmail.com', 'admin_1', '$2y$10$e4nTc5WjAo9RVwt0dmh0NOH3N57cUmtNmiPaVIsFLQos7O71s.g/u', '$2y$10$BlGu/0OReAvAfjEEwyNFhOPXqDUaGXutv27tVmKMSysfHnkDzYj7a'),
(3, 'siadmin@gmail.com', 'admin_gantenk', '$2y$10$UQ4GweOkPmeZAAv9wwWGkubv3eCnLEGiHt/8N.4rfGhBmbSMrvL2u', '$2y$10$gKyb59TtIxm9Te8vCnfS..DjfEmFuhPCbJAZEFkPXEI0g6auUm/wa'),
(4, 'siadmin@gmail.com', 'admin', '$2y$10$GX96Z84PBDGiBEikDpLmReWEMcny2B/J1sQTzcU8TFXXUrC966dti', '$2y$10$t5hdjBDpXhx3Fs2kpwrzjuSsa4XSatF0303Tz1b8pL4EuYxt6.hbK'),
(5, 'admin@gmail.com', 'admin02', '$2y$10$VIl3LWqE74BRJdLhyoahJOaQQzhKB7dWkjiPKsuP2cZI27NwtzcgG', '$2y$10$ZUgGODY4MOhT1zBe9CAuw.nqAKHiehtUS7AGLetm72Wvdi8/VR1Sa'),
(6, 'siadmin@gmail.com', 'admin03', '$2y$10$xiQe2ctXaoerAEaVE8/ZG.GALyBWNJKXGUts2kplgg/TLb4/9VZN6', '$2y$10$rq/E6NCDb65oAOR8XpqFbeqCWt1SF0jxyyvaZuS5LlkND4nA.98AO'),
(7, 'siadmin@gmail.com', 'admin05', '$2y$10$nAiEh39OrcgHO4JKm2DFqutug7zIWxwxpBtqEyeLlJ45B.A.McJde', '$2y$10$7mcu66Z4fW4O3V04/7D/9.jreZ4J9yFsr8pbvv3AVa45ZXokw67jO'),
(8, 'ramadhanman24@gmail.com', 'dhanman', '$2y$10$IQ/qJYKbLj.Q7SyIV/eRIeZ.AnkaFC5NPpLWMnuYjAXlZa4gQs6AG', '$2y$10$Ni.4b/r4EOL4i9L8zQTafutbSYuMNt8H/ruEBzjh65PP9ciIqgsyS');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penumpang`
--

CREATE TABLE `tb_penumpang` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `asal` varchar(100) NOT NULL,
  `tujuan` varchar(100) NOT NULL,
  `maskapai` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_penumpang`
--

INSERT INTO `tb_penumpang` (`id`, `nama`, `tanggal_lahir`, `jenis_kelamin`, `asal`, `tujuan`, `maskapai`) VALUES
(106514078, 'Siti Maemunah', '1979-11-22', 'Wanita', 'Jakarta', 'Malang', 'Batik Air'),
(685931394, 'Andi Budiman', '2000-02-01', 'Pria', 'Semarang', 'Padang', 'Lion Air'),
(806923945, 'Indah Mustika', '1993-04-16', 'Wanita', 'Batam', 'Jakarta', 'Indonesia Air Asia'),
(1015072080, 'Erik Budiarto', '1982-09-30', 'Pria', 'Samarinda', 'Manado', 'NAM Air'),
(1269798602, 'Febina Tasya', '2001-02-02', 'Wanita', 'Medan', 'Jakarta', 'Citilink'),
(1428211079, 'Januar', '1972-03-24', 'Pria', 'Jakarta', 'Jayapura', 'Batik Air'),
(1568608964, 'Bahar Komarudin', '1964-10-12', 'Pria', 'Bandung', 'Surabaya', 'Wings Air'),
(1942030923, 'Muhammad Rifqi', '1995-06-08', 'Pria', 'Jakarta', 'Lombok', 'Garuda Indonesia'),
(1986264506, 'Aliska Kirana', '2015-09-25', 'Wanita', 'Padang', 'Jakarta', 'Indonesia Air Asia'),
(2018436992, 'Hayati', '1988-01-10', 'Wanita', 'Padang', 'Jakarta', 'Indonesia Air Asia');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_penumpang`
--
ALTER TABLE `tb_penumpang`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
