-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: iun. 08, 2020 la 08:49 PM
-- Versiune server: 10.4.11-MariaDB
-- Versiune PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `shop`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `bag`
--

CREATE TABLE `bag` (
  `id` int(255) NOT NULL,
  `id_produs` int(255) DEFAULT NULL,
  `denumire` varchar(100) DEFAULT NULL,
  `categorie` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `pret` int(100) DEFAULT NULL,
  `cantitate` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `bag`
--

INSERT INTO `bag` (`id`, `id_produs`, `denumire`, `categorie`, `pret`, `cantitate`) VALUES
(1, 7, 'bluza cu maneci bufante', 'femei', 80, 4),
(2, 8, 'pantaloni scurti', 'femei', 100, 4),
(3, 1, 'tricou polo slim fit', 'barbati', 40, 2);

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `bag`
--
ALTER TABLE `bag`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_produs` (`id_produs`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `bag`
--
ALTER TABLE `bag`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constrângeri pentru tabele eliminate
--

--
-- Constrângeri pentru tabele `bag`
--
ALTER TABLE `bag`
  ADD CONSTRAINT `fk_produs_id` FOREIGN KEY (`id_produs`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
