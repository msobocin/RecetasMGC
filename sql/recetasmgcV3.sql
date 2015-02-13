-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 13 Lut 2015, 15:21
-- Wersja serwera: 5.6.20
-- Wersja PHP: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `recetasmgc`
--
CREATE DATABASE IF NOT EXISTS `recetasmgc` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `recetasmgc`;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ingredientes`
--

CREATE TABLE IF NOT EXISTS `ingredientes` (
`id` int(11) NOT NULL,
  `ingrediente` text NOT NULL,
  `unidad` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Zrzut danych tabeli `ingredientes`
--

INSERT INTO `ingredientes` (`id`, `ingrediente`, `unidad`) VALUES
(1, 'Leche', 'litro/s'),
(2, 'Arroz', 'kg/kgs');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `platos`
--

CREATE TABLE IF NOT EXISTS `platos` (
`id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `descripcion` text NOT NULL,
  `preparacion` text NOT NULL,
  `tiempo` double NOT NULL,
  `cuantas_personas` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Zrzut danych tabeli `platos`
--

INSERT INTO `platos` (`id`, `nombre`, `descripcion`, `preparacion`, `tiempo`, `cuantas_personas`) VALUES
(1, 'Arroz con Leche', 'Arroz con Leche es perfecto postre para toda la familia', 'Mesclar Arroz Con Leche', 4, 6);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `recetas`
--

CREATE TABLE IF NOT EXISTS `recetas` (
`id` int(11) NOT NULL,
  `id_plato` int(11) NOT NULL,
  `id_ingredientes` int(11) NOT NULL,
  `cantidad` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Zrzut danych tabeli `recetas`
--

INSERT INTO `recetas` (`id`, `id_plato`, `id_ingredientes`, `cantidad`) VALUES
(1, 1, 1, '2'),
(2, 1, 2, '1/2');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `ingredientes`
--
ALTER TABLE `ingredientes`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `platos`
--
ALTER TABLE `platos`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recetas`
--
ALTER TABLE `recetas`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `ingredientes`
--
ALTER TABLE `ingredientes`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT dla tabeli `platos`
--
ALTER TABLE `platos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT dla tabeli `recetas`
--
ALTER TABLE `recetas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
