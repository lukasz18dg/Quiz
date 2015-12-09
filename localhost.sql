-- phpMyAdmin SQL Dump
-- version 3.5.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Czas wygenerowania: 19 Lut 2013, 22:12
-- Wersja serwera: 5.5.29
-- Wersja PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `projekt`
--
CREATE DATABASE `projekt` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `projekt`;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `odpowiedzi_uzytkownika`
--

CREATE TABLE IF NOT EXISTS `odpowiedzi_uzytkownika` (
  `id_odpowiedzi_uzytkownika` int(255) NOT NULL AUTO_INCREMENT,
  `id_uzytkownika` int(255) NOT NULL,
  `id_testu` int(255) NOT NULL,
  `odpowiedz` mediumtext CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `wynik` int(255) NOT NULL,
  `sprawdzony` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_odpowiedzi_uzytkownika`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `przedmioty`
--

CREATE TABLE IF NOT EXISTS `przedmioty` (
  `id_przedmiotu` int(255) NOT NULL AUTO_INCREMENT,
  `przedmiot` tinytext CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id_przedmiotu`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Zrzut danych tabeli `przedmioty`
--

INSERT INTO `przedmioty` (`id_przedmiotu`, `przedmiot`) VALUES
(1, 'Brak kategori'),
(2, 'Polski');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pytania_i_odpowiedzi`
--

CREATE TABLE IF NOT EXISTS `pytania_i_odpowiedzi` (
  `id_pytania` int(255) NOT NULL AUTO_INCREMENT,
  `pytanie` mediumtext CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `odpowiedz` mediumtext CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `typ_pytania` varchar(1) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `poprawna_odpowiedz` mediumtext CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `tworca_pytania` int(255) NOT NULL,
  PRIMARY KEY (`id_pytania`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

--
-- Zrzut danych tabeli `pytania_i_odpowiedzi`
--

INSERT INTO `pytania_i_odpowiedzi` (`id_pytania`, `pytanie`, `odpowiedz`, `typ_pytania`, `poprawna_odpowiedz`, `tworca_pytania`) VALUES
(1, 'A', 'a<!59%6>b<!59%6>', 'J', '2', 1),
(2, 'B', 'c<!59%6>b<!59%6>', 'W', '1<$%#>', 1),
(3, 'SkÄ…d pochodzi nazwa OÅ›wiecenie?', '', 'T', '', 1),
(4, 'SkÄ…d pochodzi nazwa oÅ›wiecenia?', 'z Å‚Ä…cznej<!59%6>', 'W', '2<$%#>', 1),
(5, 'ÅºÅºÅº', 'ÅºÅºÅº<!59%6>', 'W', '1<$%#>2<$%#>', 1),
(6, 'Å‚', 'z<!59%6>', 'W', '2<$%#>', 1),
(7, 'Å‚Å‚', 'Ã³<!59%6>', 'W', '2<$%#>', 1),
(8, 'Å‚Å¼Å¼ÅºÅ¼Åº', 'Å‚Å¼ÅºÅ¼ÅºÅ¼Åº<!59%6>', 'W', '2<$%#>', 1),
(9, 'Å‚Ã³Å¼', 'Å‚Ã³Å¼<!59%6>', 'W', '2<$%#>', 1),
(10, 'Å‚Ä…Å›', '', 'T', '', 1),
(11, '6', '6<!59%6>', 'W', '2<$%#>', 1),
(12, 'rt', 'rt<!59%6>', 'J', '2', 1),
(13, 'Å‚Ã³ÅºÅ¼Ä‡', 'Å‚<!59%6>', 'J', '2', 1),
(14, 'dfsdff', 'dsfsdf<!59%6>', 'W', '1<$%#>2<$%#>', 1),
(15, 'gsfg', 'Å‚Å‚Å‚Å‚<!59%6>', 'W', '2<$%#>', 1),
(16, 'łżź', 'łżź', 'a', 'łźż', 5),
(17, 'aa', '', 'T', '', 1),
(18, 'tretr', 'ttertert<!59%6>', 'J', '1', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `test`
--

CREATE TABLE IF NOT EXISTS `test` (
  `id_testu` int(255) NOT NULL AUTO_INCREMENT,
  `tworca` int(255) NOT NULL,
  `pytania` mediumtext CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `przedmiot` int(255) NOT NULL,
  `dozwolony` mediumtext CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `nazwa_testu` tinytext CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id_testu`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Zrzut danych tabeli `test`
--

INSERT INTO `test` (`id_testu`, `tworca`, `pytania`, `przedmiot`, `dozwolony`, `nazwa_testu`) VALUES
(1, 1, '1<!59%6>2<!59%6>3', 2, 'Nie mam pojecia', 'OÅ›wiecenie'),
(2, 1, '4', 2, 'Nie mam pojecia', 'Ä„Ä†Ä„Ä„Ä„'),
(3, 1, '5', 1, 'Nie mam pojecia', 'QÅTYZXCÅº'),
(4, 1, '6', 1, 'Nie mam pojecia', 'Å‚Ã³'),
(5, 1, '7', 1, 'Nie mam pojecia', 'Å‚Å‚'),
(6, 1, '8', 2, 'Nie mam pojecia', 'Å‚Ã³Å¼ÅºÅºÅ¼'),
(7, 1, '9', 1, 'Nie mam pojecia', 'Å‚Ã³Å‚'),
(8, 1, '10', 2, 'Nie mam pojecia', 'Å‚Å¼Åº'),
(9, 1, '11', 1, 'Nie mam pojecia', 'Å‚Ã³Å¼ÅºÅ¼Åº'),
(10, 1, '12', 1, 'Nie mam pojecia', 'Å‚Ã³Å¼ÅºÅ¼Åºx'),
(11, 1, '13', 1, 'Nie mam pojecia', 'ÅSDAÅASZXÅºÃ³â‚¬'),
(12, 1, '14', 2, 'Nie mam pojecia', 'Å‚Å¼ÅºÅ¼ÅºÄ‡Å¼Ä‡'),
(13, 1, '15', 2, 'Nie mam pojecia', 'Å‚Å¼ÅºÅ¼Åº'),
(14, 1, '17', 1, 'Nie mam pojecia', 'Å‚Å¼Åºc'),
(15, 1, '18', 2, 'Nie mam pojecia', 'łżźźćżćż');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE IF NOT EXISTS `uzytkownicy` (
  `id_uzytkownika` int(255) NOT NULL AUTO_INCREMENT,
  `login` varchar(25) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `haslo` varchar(40) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `moc` varchar(1) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `email` varchar(70) CHARACTER SET utf8 COLLATE utf8_polish_ci DEFAULT NULL,
  `klasa` varchar(2) CHARACTER SET utf8 COLLATE utf8_polish_ci DEFAULT NULL,
  `litera` varchar(5) CHARACTER SET utf8 COLLATE utf8_polish_ci DEFAULT NULL,
  PRIMARY KEY (`id_uzytkownika`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id_uzytkownika`, `login`, `haslo`, `moc`, `email`, `klasa`, `litera`) VALUES
(1, 'Admin', '7ae7a24fc34645787cd4d447e661a1c47ec7e52b', 'A', NULL, NULL, NULL),
(2, 'Nauczyciel', '7ae7a24fc34645787cd4d447e661a1c47ec7e52b', 'M', NULL, NULL, NULL),
(3, 'Uczen', '7ae7a24fc34645787cd4d447e661a1c47ec7e52b', 'S', NULL, '4', 'c');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
