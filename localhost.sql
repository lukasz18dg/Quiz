-- phpMyAdmin SQL Dump
-- version 3.5.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Czas wygenerowania: 19 Lut 2013, 15:53
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
CREATE DATABASE `projekt` DEFAULT CHARACTER SET utf8 COLLATE utf8_polish_ci;
USE `projekt`;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `odpowiedzi_uzytkownika`
--

CREATE TABLE IF NOT EXISTS `odpowiedzi_uzytkownika` (
  `id_odpowiedzi_uzytkownika` int(255) NOT NULL AUTO_INCREMENT,
  `id_uzytkownika` int(255) NOT NULL,
  `id_testu` int(255) NOT NULL,
  `odpowiedz` mediumtext COLLATE utf8_polish_ci NOT NULL,
  `wynik` int(255) NOT NULL,
  `sprawdzony` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_odpowiedzi_uzytkownika`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `przedmioty`
--

CREATE TABLE IF NOT EXISTS `przedmioty` (
  `id_przedmiotu` int(255) NOT NULL AUTO_INCREMENT,
  `przedmiot` tinytext COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id_przedmiotu`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=2 ;

--
-- Zrzut danych tabeli `przedmioty`
--

INSERT INTO `przedmioty` (`id_przedmiotu`, `przedmiot`) VALUES
(1, 'Brak kategori');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pytania_i_odpowiedzi`
--

CREATE TABLE IF NOT EXISTS `pytania_i_odpowiedzi` (
  `id_pytania` int(255) NOT NULL AUTO_INCREMENT,
  `pytanie` mediumtext COLLATE utf8_polish_ci NOT NULL,
  `odpowiedz` mediumtext COLLATE utf8_polish_ci NOT NULL,
  `typ_pytania` varchar(1) COLLATE utf8_polish_ci NOT NULL,
  `poprawna_odpowiedz` mediumtext COLLATE utf8_polish_ci NOT NULL,
  `tworca_pytania` int(255) NOT NULL,
  PRIMARY KEY (`id_pytania`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `test`
--

CREATE TABLE IF NOT EXISTS `test` (
  `id_testu` int(255) NOT NULL AUTO_INCREMENT,
  `tworca` int(255) NOT NULL,
  `pytania` mediumtext COLLATE utf8_polish_ci NOT NULL,
  `przedmiot` int(255) NOT NULL,
  `dozwolony` mediumtext COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id_testu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE IF NOT EXISTS `uzytkownicy` (
  `id_uzytkownika` int(255) NOT NULL AUTO_INCREMENT,
  `login` varchar(25) COLLATE utf8_polish_ci NOT NULL,
  `haslo` varchar(40) COLLATE utf8_polish_ci NOT NULL,
  `moc` varchar(1) COLLATE utf8_polish_ci NOT NULL,
  `email` varchar(70) COLLATE utf8_polish_ci DEFAULT NULL,
  `klasa` varchar(2) COLLATE utf8_polish_ci DEFAULT NULL,
  `litera` varchar(5) COLLATE utf8_polish_ci DEFAULT NULL,
  PRIMARY KEY (`id_uzytkownika`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=4 ;

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
