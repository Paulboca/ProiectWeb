-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: iul. 04, 2020 la 07:27 PM
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
-- Structură tabel pentru tabel `admins`
--

CREATE TABLE `admins` (
  `id` int(255) NOT NULL,
  `fName` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_cs DEFAULT NULL,
  `lName` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_cs DEFAULT NULL,
  `email` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_cs DEFAULT NULL,
  `passwd` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_cs DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `admins`
--

INSERT INTO `admins` (`id`, `fName`, `lName`, `email`, `passwd`) VALUES
(1, 'admin', 'admin', 'admin@admin', 'admin');

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
  `cantitate` int(100) DEFAULT NULL,
  `id_client` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `bag`
--

INSERT INTO `bag` (`id`, `id_produs`, `denumire`, `categorie`, `pret`, `cantitate`, `id_client`) VALUES
(4, 1, 'Tricou polo Slim Fit  ', 'Barbati', 40, 1, 1581644438),
(6, 2, 'Pantaloni din amestec de in', 'Barbati', 90, 1, 747046509),
(7, 1, 'Tricou polo Slim Fit  ', 'Barbati', 40, 1, 747046509);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `products`
--

CREATE TABLE `products` (
  `id` int(32) NOT NULL,
  `denumire` varchar(50) NOT NULL,
  `descriere` varchar(400) NOT NULL,
  `compozitie` varchar(100) NOT NULL,
  `categorie` varchar(30) NOT NULL,
  `pret` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `products`
--

INSERT INTO `products` (`id`, `denumire`, `descriere`, `compozitie`, `categorie`, `pret`) VALUES
(1, 'Tricou polo Slim Fit  ', 'Tricou polo de jerseu moale, cu mâneci scurte, cu guler și cu fenta cu nasturi. ', 'Bumbac 95%, Elastan 5%', 'Barbati', 40),
(2, 'Pantaloni din amestec de in', 'Pantaloni din tesătură răcoroasă de in si bumbac, cu talie înaltă cu elastic si snur ascuns, cu șliț cu fermoar si cu nasture.', 'Strat exterior: In 55%, Bumbac 45%; Căptușeala buzunarului: Bumbac 100%', 'Barbati', 90),
(3, 'Jachetă de denim cu imprimeu ', 'Jachetă confecționată din denim prespălat de bumbac, cu imprimeu, cu guler, cu nasturi pe toată lungimea în față, cu buzunare cu clapă și nasture la piept, cu buzunare laterale cu refileți. Nasturi la manșete și baretă reglabilă cu nasturi pe laterale', 'Bumbac 100% ,Căptușeala buzunarului: Poliester 55%, Bumbac 45%\r\n', 'Barbati', 200),
(4, 'Cămașă de bumbac Regular Fit ', 'Cămașă din țesătură de bumbac, cu mâneci scurte, cu guler răsfrânt, cu fentă clasică cu nasturi în față.\r\n', 'Bumbac 100%', 'Barbati', 50),
(5, 'Cardigan cu fermoar', 'Cardigan reiat din fir moale, cu guler ridicat mic, cu fermoar pe toată lungimea în față, cu buzunare laterale și cu bordură reiată la manșete și la bază.', 'Bumbac 76%, Poliester 23%, Elastan 1%\r\n', 'Barbati', 130),
(6, 'Rochie din amestec de in ', 'Rochie până la gambă, din țesătură de in și bumbac, cu decolteu ușor în V, cu bretele înguste reglabile', 'Strat exterior: In 55%, Bumbac 45% , Căptușeală: Bumbac 100%\r\n\r\n', 'Femei', 140),
(7, 'Bluză cu mâneci bufante', 'Bluză din țesătură cu aspect apretat, cu secțiune decupată la spate și cu șnururi care se leagă în spatele gâtului și pe mijloc la spate', 'Bumbac 100%\r\n', 'Femei', 80),
(8, 'Pantaloni scurti ', 'Pantaloni scurți din denim gros de bumbac, cu talie înaltă cu elastic, pliuri și cordon detașabil, cu șliț cu fermoar și cu nasturi', 'Strat exterior: Bumbac 97%, Alte fibre 3%, Căptușeala buzunarului: Poliester 65%, Bumbac 35%\r\n', 'Femei', 100),
(9, 'Sacou dama din in ', 'Sacou din amestec de in cu croială lejeră, cu revere crestate, cu pernițe la umeri pentru a defini silueta și cu fente la manșete. Șnururi care se leagă în față, două buzunare cu clapă în față și șliț la spate. ', 'Lyocell 59%, In 41% , Căptușeală: Poliester 100%\r\n', 'Femei', 499),
(10, 'Salopeta scurta ', 'Salopetă scurtă din țesătură de viscoză ușor drapată, cu decolteu în V, cu bretele înguste reglabile, cu cusătură elastică îngustă în talie și cu buzunare laterale.\r\n', 'Viscoză 100%\r\n', 'Femei', 60),
(11, 'Rochie de jerseu cu volane ', 'rochie de jerseu pentru fetite , fara maneci , cu decolteu rotund.\r\n', 'Bumbac 95%, Elastan 5%', 'Copii', 40),
(12, 'Tricou cu dungi ', 'Tricou cu dungi pentru fetite, cu maneci scurte , decolteu rotund.\r\n', 'Bumbac 100%\r\n', 'Copii', 25),
(13, 'Pantaloni scurti cu cordon ', 'Pantaloni scurți din țesătură subțire de bumbac, cu elastic reglabil în talie, cu pliuri în față și cu cordon moale detașabil. \r\n', 'Bumbac 100%\r\n', 'Copii', 50),
(14, 'Pantaloni scurti cu imprimeu ', 'Pantaloni scurți până la genunchi din jerseu de bumbac cu imprimeu, cu elastic îmbrăcat și cu șnur în talie și cu buzunare false în față.\r\n', 'Bumbac 100%\r\n', 'Copii', 40),
(15, 'Tricou polo baieti ', 'Tricou polo din bumbac , cu guler reiat si nasturi, cu maneci scurte.', 'Bumbac 100%', 'Copii', 30),
(16, 'Set din in , 2 bucati pentru baieti ', 'Camasa cu guler deschis si pantaloni scurti.\r\n', 'In 100%', 'Copii', 100),
(17, 'Tricou clasic cu imprimeu pentru baieti ', 'Tricou clasic din jerseu moale de bumbac, cu motiv și cu margini nefinisate la răscroiala gâtului și la mâneci.\r\n', 'Bumbac 100%', 'Copii', 20);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `fName` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_cs DEFAULT NULL,
  `lName` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_cs DEFAULT NULL,
  `email` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_cs DEFAULT NULL,
  `passwd` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_cs DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `users`
--

INSERT INTO `users` (`id`, `fName`, `lName`, `email`, `passwd`) VALUES
(1, 'ss', 'ss', 'ss@ss', 'ss'),
(2, 'aa', 'aa', 'aa@aa', 'aa'),
(3, 'qq', 'qq', 'qq@qq', 'qq'),
(5, 'qweqwradflaksnflafjhadorfheoqihfdlasnfljdsbguowehoifnaslnfjdbgobaflnbsjlkfbadjlbfalbflkasbfasljbflas', 'aa', 'rr@rr', 'rr'),
(6, 'Alexandru', 'asdasd', 'tt@tt', 'tt');

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_email_admins` (`email`);

--
-- Indexuri pentru tabele `bag`
--
ALTER TABLE `bag`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_produs` (`id_produs`,`id_client`) USING BTREE;

--
-- Indexuri pentru tabele `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uniqueEmail` (`email`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pentru tabele `bag`
--
ALTER TABLE `bag`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pentru tabele `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
