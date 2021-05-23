-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 10, 2021 at 07:57 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `api`
--

-- --------------------------------------------------------

--
-- Table structure for table `modulo`
--

CREATE TABLE `modulo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codigo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `curso` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `horas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profesor_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `modulo`
--

INSERT INTO `modulo` (`id`, `nombre`, `codigo`, `curso`, `horas`, `profesor_id`) VALUES
(1, 'Desarrollo web en entorno servidor', 'DWES', '2º DAW', '160', 4),
(2, 'Desarrollo web en entorno cliente', 'DWEC', '2º DAW', '140', 3),
(3, 'Diseño de interfaces Web', 'DIW', '2º DAW', '120', 1),
(4, 'Despliegue de aplicaciones Web', 'DAW', '2º DAW', '120', 2),
(5, 'Lenguajes de marcas y sistemas de gestión de información', 'LMSGI', '2º DAW', '96', 2);

-- --------------------------------------------------------

--
-- Table structure for table `profesor`
--

CREATE TABLE `profesor` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `papellido` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sapellido` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profesor`
--

INSERT INTO `profesor` (`id`, `nombre`, `papellido`, `sapellido`) VALUES
(1, 'Susana', 'Valverde', ''),
(2, 'Beatriz', 'de Miguel', 'Ramírez'),
(3, 'Luis Miguel', 'Fernandez', ''),
(4, 'Fernando Domingo', 'Ruiz', '');

-- --------------------------------------------------------

--
-- Table structure for table `profesor_modulo`
--

CREATE TABLE `profesor_modulo` (
  `profesor_id` int(11) NOT NULL,
  `modulo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `modulo`
--
ALTER TABLE `modulo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_ECF1CF36E52BD977` (`profesor_id`);

--
-- Indexes for table `profesor`
--
ALTER TABLE `profesor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profesor_modulo`
--
ALTER TABLE `profesor_modulo`
  ADD PRIMARY KEY (`profesor_id`,`modulo_id`),
  ADD KEY `IDX_ED9E4392E52BD977` (`profesor_id`),
  ADD KEY `IDX_ED9E4392C07F55F5` (`modulo_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `modulo`
--
ALTER TABLE `modulo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `profesor`
--
ALTER TABLE `profesor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `modulo`
--
ALTER TABLE `modulo`
  ADD CONSTRAINT `FK_ECF1CF36E52BD977` FOREIGN KEY (`profesor_id`) REFERENCES `profesor` (`id`);

--
-- Constraints for table `profesor_modulo`
--
ALTER TABLE `profesor_modulo`
  ADD CONSTRAINT `FK_ED9E4392C07F55F5` FOREIGN KEY (`modulo_id`) REFERENCES `modulo` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_ED9E4392E52BD977` FOREIGN KEY (`profesor_id`) REFERENCES `profesor` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
