-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 02 feb 2020 om 23:22
-- Serverversie: 10.4.10-MariaDB
-- PHP-versie: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `conferentiecentrum`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `idorder` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` int(11) NOT NULL,
  `date` datetime DEFAULT NULL,
  `price` decimal(5,2) DEFAULT NULL,
  `status` enum('open','succes','on-hold','canceled') DEFAULT NULL,
  PRIMARY KEY (`idorder`),
  KEY `iduser` (`iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `order`
--

INSERT INTO `order` (`idorder`, `iduser`, `date`, `price`, `status`) VALUES
(20, 3, '2020-02-03 00:22:01', '310.00', 'open');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `orderline`
--

DROP TABLE IF EXISTS `orderline`;
CREATE TABLE IF NOT EXISTS `orderline` (
  `idorderline` int(11) NOT NULL AUTO_INCREMENT,
  `idorder` int(11) DEFAULT NULL,
  `idproduct` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` decimal(5,2) DEFAULT NULL,
  PRIMARY KEY (`idorderline`),
  KEY `idorder` (`idorder`),
  KEY `idproduct` (`idproduct`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `orderline`
--

INSERT INTO `orderline` (`idorderline`, `idorder`, `idproduct`, `quantity`, `price`) VALUES
(13, 20, 4, 1, '310.00');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `idproduct` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `description` varchar(400) NOT NULL,
  `code` varchar(100) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  PRIMARY KEY (`idproduct`),
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `products`
--

INSERT INTO `products` (`idproduct`, `name`, `description`, `code`, `price`) VALUES
(1, 'Ticket Waterconferentie Vrijdag', 'Dit is een toegangs ticket tot the Waterconferentie op Vrijdag', '1', '100.00'),
(2, 'Ticket Waterconferentie Zaterdag', 'Dit is een toegangs ticket tot the Waterconferentie op Zaterdag', '2', '100.00'),
(3, 'Ticket passepartout Waterconferentie', 'Met een \'passepartout\' ticket heeft u toegang tot alle dagen van een conferentie of event', '3', '190.00'),
(4, 'Lunch', 'Dit geeft u toegang tot een gratis lunch op de bijbehorende conferentie', '4', '10.00'),
(5, 'Diner', 'Dit geeft u toegang tot een gratis diner ', '5', '15.00');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(255) DEFAULT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` int(15) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `postalcode` varchar(6) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `userrol` enum('customer','admin') NOT NULL DEFAULT 'customer',
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`iduser`, `password`, `firstname`, `lastname`, `email`, `phone`, `address`, `postalcode`, `city`, `userrol`) VALUES
(1, '13-01-2020 20:27:36xvan', 'Alex', 'van der wel', 'alexvanderwelles@gmail.com', 643027288, '89, driemaster', '3904JR', 'Veenendaal', 'customer'),
(2, '$2y$10$Mpjfp4gfblaOD0e0KMHP6.wemBueANbiST4dfpxw.fRLcDIAfyCdK', 'test', 'dag', 'testdag1@gmail.com', 612345678, 'Daltonlaan 300', '1234AB', 'Utrecht', 'customer'),
(3, '$2y$10$WvTK5P9agJkytwzBl1ZgqOXHs6q0fS1KBi07VeaIIaNH7Wgm0qmAq', 'Alex', 'van der wel', 'kaas@gmail.com', 643027288, 'ejawihifa 21', '3904JR', 'Veenendaal', 'customer');

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `iduser` FOREIGN KEY (`iduser`) REFERENCES `users` (`iduser`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
