-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2018 at 04:07 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ta`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_account`
--

CREATE TABLE `tb_account` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_account`
--

INSERT INTO `tb_account` (`id_user`, `username`, `password`) VALUES
(1, 'zahid0', 'rahasia'),
(2, 'dida', 'dida'),
(3, 'user', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `tb_posting`
--

CREATE TABLE `tb_posting` (
  `id_posting` int(11) NOT NULL,
  `judul` text NOT NULL,
  `content` longtext NOT NULL,
  `foto` text NOT NULL,
  `nim` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_posting`
--

INSERT INTO `tb_posting` (`id_posting`, `judul`, `content`, `foto`, `nim`) VALUES
(6, 'Orang Mabuk', 'ads asd asd asd asd asd asd as dasd asd asd as a a a a a a as a  asd asd a sd asd as da sd asd a sd as d as da sd a sd as da sd a sd a sd as d as da sd asd a sd as da sd a sd as da sd a sd as da sd a', 'photos/MSI Dragon.png', '6701174099'),
(7, 'Orang Gila', 'ads asd asd asd asd asd asd as dasd asd asd as a a a a a a as a  asd asd a sd asd as da sd asd a sd as d as da sd a sd as da sd a sd a sd as d as da sd asd a sd as da sd a sd as da sd a sd as da sd a', 'photos/16.jpg', '6701171118');

-- --------------------------------------------------------

--
-- Table structure for table `tb_profile`
--

CREATE TABLE `tb_profile` (
  `nim` varchar(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `fakultas` varchar(3) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `hobi` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_profile`
--

INSERT INTO `tb_profile` (`nim`, `nama`, `kelas`, `fakultas`, `jk`, `hobi`, `alamat`, `id_user`) VALUES
('6701171118', 'Dida Pradana', 'D3MI-41-01', 'FIT', 'Laki-laki', 'Main, Tidur', 'Jl. Adhyaksa Raya No.34B', 2),
('6701174009', 'Orang', '', '', '', '', '', 3),
('6701174099', 'Zahid Musthofainal Akhyar', 'D3MI-41-01', 'FIT', 'Laki-laki', 'Minum, Main', 'Jl. Adhyaksa Raya No.34B', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_account`
--
ALTER TABLE `tb_account`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tb_posting`
--
ALTER TABLE `tb_posting`
  ADD PRIMARY KEY (`id_posting`),
  ADD KEY `nim` (`nim`);

--
-- Indexes for table `tb_profile`
--
ALTER TABLE `tb_profile`
  ADD PRIMARY KEY (`nim`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_account`
--
ALTER TABLE `tb_account`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_posting`
--
ALTER TABLE `tb_posting`
  MODIFY `id_posting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_posting`
--
ALTER TABLE `tb_posting`
  ADD CONSTRAINT `tb_posting_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `tb_profile` (`nim`);

--
-- Constraints for table `tb_profile`
--
ALTER TABLE `tb_profile`
  ADD CONSTRAINT `tb_profile_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_account` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
