-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 09 Wrz 2021, 16:39
-- Wersja serwera: 10.4.20-MariaDB
-- Wersja PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `pak_comment_db`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `email` text COLLATE utf8_polish_ci NOT NULL,
  `comment` text COLLATE utf8_polish_ci NOT NULL,
  `comment_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `comments`
--

INSERT INTO `comments` (`id`, `name`, `email`, `comment`, `comment_time`) VALUES
(1, 'nick', 'n234b@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sed lacus eget tortor luctus fermentum. Aliquam porttitor vulputate quam, sed lacinia felis. In hac habitasse platea dictumst. Nunc quis velit interdum, pulvinar enim ut, efficitur diam. Nulla ut purus nunc. Integer commodo gravida placerat. Mauris sed ultrices neque. Cras non dui vel nunc mattis vulputate ac eget arcu. Vivamus consectetur, felis vitae sollicitudin elementum, risus tellus maximus est, quis finibus nulla nunc at nunc. Duis in lorem nunc. Duis vestibulum in sapien at blandit. Curabitur quis sollicitudin magna, vel varius tellus. Donec ac urna vehicula, lacinia turpis non, faucibus felis. Vivamus sit amet lacinia magna. Quisque rhoncus nec eros ac interdum. Vestibulum et lorem non lectus elementum venenatis. ', '2021-08-19 15:52:05'),
(51, 'anonim', 'asdfg@gmail.com', '****', '2021-08-25 16:47:50');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
