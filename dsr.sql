-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Gostitelj: 127.0.0.1
-- Čas nastanka: 11. jan 2017 ob 15.25
-- Različica strežnika: 5.7.14
-- Različica PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Zbirka podatkov: `dsr`
--

-- --------------------------------------------------------

--
-- Struktura tabele `dogodki`
--

CREATE TABLE `dogodki` (
  `ID_Dogodki` int(11) NOT NULL,
  `ime_dogodka` varchar(70) COLLATE utf8_slovenian_ci NOT NULL,
  `datum` date NOT NULL,
  `lokacija` varchar(70) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Odloži podatke za tabelo `dogodki`
--

INSERT INTO `dogodki` (`ID_Dogodki`, `ime_dogodka`, `datum`, `lokacija`) VALUES
(24, 'Nekaj', '2017-01-21', 'MB'),
(25, 'Karkoli', '2017-01-26', 'hr'),
(26, 'ge', '2017-01-19', 'eg'),
(10, 'fw', '2017-01-12', 'beB'),
(27, 'he', '2017-01-21', 'he'),
(13, 'fw', '2017-01-12', 'beB'),
(14, 'bse', '2017-01-19', 'rb'),
(15, 'bse', '2017-01-19', 'rb'),
(16, 'ges', '2017-01-19', ''),
(19, 'ngf', '2017-01-11', ''),
(21, 'jrr', '2017-01-18', 'nr'),
(22, 'jtz', '2017-01-25', 'jtf');

-- --------------------------------------------------------

--
-- Struktura tabele `osebe`
--

CREATE TABLE `osebe` (
  `ID_Osebe` int(11) NOT NULL,
  `ime` varchar(30) COLLATE utf8_slovenian_ci NOT NULL,
  `priimek` varchar(30) COLLATE utf8_slovenian_ci NOT NULL,
  `naslov` varchar(70) COLLATE utf8_slovenian_ci NOT NULL,
  `telefonska` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `rojstni_datum` date NOT NULL,
  `facebook` varchar(70) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `opombe` varchar(70) COLLATE utf8_slovenian_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Odloži podatke za tabelo `osebe`
--

INSERT INTO `osebe` (`ID_Osebe`, `ime`, `priimek`, `naslov`, `telefonska`, `email`, `rojstni_datum`, `facebook`, `opombe`) VALUES
(1, 'Eva', 'Lol', 'Nekje', '045256', 'eny@gmail.com', '2017-01-18', 'https://www.facebook.com/EvaIsLoser', ''),
(2, 'Nodi', 'Nodek', 'V nodi deÅ¾eli', '0554f5315', 'f@gmail.com', '2017-01-19', 'https://www.facebook.com/Trgovina-Nodi-254563878003762/?fref=ts', 'trgovina nodi'),
(3, 'Milka', 'Tilka', 'Zilka', '0259562', 'zilk@gmail.com', '2017-01-11', 'https://www.facebook.com/katarina.rajh?fref=ts', '/');

--
-- Indeksi zavrženih tabel
--

--
-- Indeksi tabele `dogodki`
--
ALTER TABLE `dogodki`
  ADD PRIMARY KEY (`ID_Dogodki`);

--
-- Indeksi tabele `osebe`
--
ALTER TABLE `osebe`
  ADD PRIMARY KEY (`ID_Osebe`);

--
-- AUTO_INCREMENT zavrženih tabel
--

--
-- AUTO_INCREMENT tabele `dogodki`
--
ALTER TABLE `dogodki`
  MODIFY `ID_Dogodki` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT tabele `osebe`
--
ALTER TABLE `osebe`
  MODIFY `ID_Osebe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
