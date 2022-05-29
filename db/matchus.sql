-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 29 Maj 2022, 03:42
-- Wersja serwera: 10.4.17-MariaDB
-- Wersja PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `matchus`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `user_id_sender` varchar(255) NOT NULL,
  `user_id_receiver` int(11) NOT NULL,
  `comment` text NOT NULL,
  `rate` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `comment`
--

INSERT INTO `comment` (`id`, `user_id_sender`, `user_id_receiver`, `comment`, `rate`, `date`) VALUES
(3, '8', 8, 'asasdasd', 5, '2022-05-29 00:51:51'),
(4, '8', 8, 'dghjhasdfdb', 5, '2022-05-29 00:51:56'),
(5, '8', 8, 'sdfsdfsdfs', 3, '2022-05-29 01:05:39'),
(6, '8', 8, 'asdasd', 4, '2022-05-29 01:07:00'),
(7, '3', 8, 'dasdasdasdasdasd', 5, '2022-05-29 01:45:27'),
(8, '3', 8, 'dupa', 5, '2022-05-29 01:46:37'),
(9, '3', 8, 'dasdasdasdasdas', 1, '2022-05-29 02:11:24'),
(10, '3', 8, 'dasdasdadas', 1, '2022-05-29 02:11:29'),
(11, '3', 3, 'elo elo', 5, '2022-05-29 02:57:56'),
(12, '3', 3, 'dadadas', 4, '2022-05-29 02:58:07');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `private_message`
--

CREATE TABLE `private_message` (
  `id` int(11) NOT NULL,
  `user_id_sender` int(11) NOT NULL,
  `user_id_receiver` int(11) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `steamid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`id`, `name`, `avatar`, `steamid`) VALUES
(3, 'Pajac', 'https://avatars.cloudflare.steamstatic.com/a545343e20e80b495b881984fd0fdb5bd2f5ab2d_full.jpg', '76561198439925662'),
(8, 'Raxi', 'https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/5d/5d177889d6d7d266aed0fd32994157e40b10733c_full.jpg', '76561198843056624');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user_info`
--

CREATE TABLE `user_info` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `discord_tag` varchar(255) NOT NULL,
  `languages` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `user_info`
--

INSERT INTO `user_info` (`id`, `client_id`, `discord_tag`, `languages`) VALUES
(1, 8, 'raxi#1234', '');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `private_message`
--
ALTER TABLE `private_message`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT dla tabeli `private_message`
--
ALTER TABLE `private_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT dla tabeli `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
