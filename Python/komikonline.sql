-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2021 at 05:13 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `komikonline`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `username` varchar(30) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `alamat` varchar(90) NOT NULL,
  `notlp` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`username`, `nama`, `password`, `email`, `alamat`, `notlp`) VALUES
('admin', 'Yogi Wijaya', 'admin', 'yogiwijaya00@gmail.com', 'Jl.Raya Perancis No.43', '081517686886'),
('user', 'YogiTan', 'user', 'xtrainzblaze00@gmail.com', 'Jl. Raya Prancis No.43, Kosambi Tim., Kec. Kosambi', '081517686886');

-- --------------------------------------------------------

--
-- Table structure for table `bkomik`
--

CREATE TABLE `bkomik` (
  `id` varchar(10) NOT NULL,
  `judul` varchar(40) DEFAULT NULL,
  `mangaka` varchar(25) DEFAULT NULL,
  `penerbit` varchar(30) DEFAULT NULL,
  `gambar` varchar(1000) DEFAULT NULL,
  `kondisi` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bkomik`
--

INSERT INTO `bkomik` (`id`, `judul`, `mangaka`, `penerbit`, `gambar`, `kondisi`) VALUES
('1', 'Solo Leveling', 'Yogi', 'UBM', '31477.jpg', 0),
('2', 'Tales Of Demond God', 'Chris', 'UBM', 'Tales-of-Demons-and-Gods-1.jpg', -1),
('3', 'The Last Human', 'Halim', 'Gramedia', '23429-1.jpg', 0),
('4', 'I\'m a Evil God', 'Ryuki', 'Gramedia', '44409.jpg', -1);

--
-- Triggers `bkomik`
--
DELIMITER $$
CREATE TRIGGER `buystock` AFTER UPDATE ON `bkomik` FOR EACH ROW IF NEW.kondisi = -1 THEN
	UPDATE skomik SET
    stockk=stockk-1 WHERE id=NEW.id;
END IF
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `skomik`
--

CREATE TABLE `skomik` (
  `id` varchar(10) NOT NULL,
  `stockk` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `skomik`
--

INSERT INTO `skomik` (`id`, `stockk`) VALUES
('1', 15),
('2', 21),
('3', 9),
('4', 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `bkomik`
--
ALTER TABLE `bkomik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skomik`
--
ALTER TABLE `skomik`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
