-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 17, 2022 at 11:56 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `biblioteca`
--

-- --------------------------------------------------------

--
-- Table structure for table `autor`
--

DROP TABLE IF EXISTS `autor`;
CREATE TABLE IF NOT EXISTS `autor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `fechanac` date NOT NULL,
  `nacionalidad` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `autor`
--

INSERT INTO `autor` (`id`, `nombre`, `fechanac`, `nacionalidad`) VALUES
(1, 'Charles Dickens', '1812-02-07', 'Reino Unido'),
(2, 'Miguel de Cervantes Saavedra', '1516-04-22', 'España'),
(3, 'Fiodor Dostoievsky', '1821-11-11', 'Rusia');

-- --------------------------------------------------------

--
-- Table structure for table `libro`
--

DROP TABLE IF EXISTS `libro`;
CREATE TABLE IF NOT EXISTS `libro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `paginas` int(11) NOT NULL,
  `genero` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `idautor` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idautor` (`idautor`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `libro`
--

INSERT INTO `libro` (`id`, `titulo`, `paginas`, `genero`, `idautor`) VALUES
(1, 'Grandes esperanzas', 664, 'Drama', 1),
(2, 'David Copperfield', 716, 'Narrativa', 1),
(3, 'Cuento de Navidad', 112, 'Narrativa', 1),
(4, 'Don Quijote de La Mancha', 1250, 'Novela', 2),
(5, 'Novelas ejemplares', 530, 'Novela', 2),
(6, 'Viaje del Parnaso', 216, 'Poesia', 2),
(7, 'Noches blancas', 72, 'Novela', 3),
(8, 'Los hermanos Karamazov', 1120, 'Novela', 3);

-- --------------------------------------------------------

--
-- Table structure for table `prestamo`
--

DROP TABLE IF EXISTS `prestamo`;
CREATE TABLE IF NOT EXISTS `prestamo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `idlibro` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idlibro` (`idlibro`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `prestamo`
--

INSERT INTO `prestamo` (`id`, `fecha`, `idlibro`) VALUES
(21, '2022-01-10', 1),
(22, '2022-01-10', 2),
(23, '2022-01-10', 8),
(24, '2022-01-10', 3),
(25, '2022-01-12', 5),
(26, '2022-01-12', 4),
(27, '2022-01-12', 5),
(28, '2022-01-12', 8),
(29, '2022-01-12', 4),
(30, '2022-01-12', 2),
(31, '2022-01-12', 5),
(32, '2022-01-12', 8),
(33, '2022-01-12', 6),
(34, '2022-01-12', 2),
(35, '2022-01-14', 8),
(36, '2022-01-14', 7),
(37, '2022-01-14', 8),
(38, '2022-01-14', 1),
(39, '2022-01-14', 2),
(40, '2022-01-14', 6);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `libro`
--
ALTER TABLE `libro`
  ADD CONSTRAINT `libro_ibfk_1` FOREIGN KEY (`idautor`) REFERENCES `autor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prestamo`
--
ALTER TABLE `prestamo`
  ADD CONSTRAINT `prestamo_ibfk_1` FOREIGN KEY (`idlibro`) REFERENCES `libro` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
