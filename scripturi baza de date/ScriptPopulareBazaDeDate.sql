-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2020 at 04:59 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
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
-- Dumping data for table `products`
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
