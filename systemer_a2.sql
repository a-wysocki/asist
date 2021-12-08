-- phpMyAdmin SQL Dump
-- version 5.1.1-1.el7.remi
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Czas generowania: 08 Gru 2021, 13:42
-- Wersja serwera: 10.2.41-MariaDB
-- Wersja PHP: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `systemer_a2`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `agents`
--

CREATE TABLE `agents` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `amount_employees` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `agents`
--

INSERT INTO `agents` (`id`, `name`, `status`, `amount_employees`) VALUES
(1, 'Agent 1', 1, 1),
(2, 'Agent 2', 1, 1),
(3, 'Agent 3', 1, 1),
(4, 'Agent 4', 1, 1),
(5, 'Agent 5', 1, 1),
(6, 'Agent 6', 0, 0),
(7, 'Agent 7', 0, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `aid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `employees`
--

INSERT INTO `employees` (`id`, `aid`, `name`, `status`, `date`, `ip`) VALUES
(1, 1, 'Jan Kowalski', 1, '2021-12-07 08:54:58', '188.0.0.0'),
(2, 2, 'Jan', 1, '2021-12-07 08:55:31', '188'),
(3, 3, 'Pracownik', 1, '2021-12-07 08:55:31', '188'),
(4, 4, 'Jan', 1, '2021-12-07 08:55:31', '188'),
(5, 5, 'Jan', 1, '2021-12-07 08:55:31', '188');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `agents`
--
ALTER TABLE `agents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT dla tabeli `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
