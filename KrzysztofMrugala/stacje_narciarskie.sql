-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2024 at 11:46 AM
-- Wersja serwera: 10.4.28-MariaDB
-- Wersja PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stacje_narciarskie`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `opinie`
--

CREATE TABLE `opinie` (
  `id` int(11) NOT NULL,
  `id_stacji` int(11) NOT NULL,
  `imie` varchar(30) NOT NULL,
  `opinia` text NOT NULL,
  `data` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `opinie`
--

INSERT INTO `opinie` (`id`, `id_stacji`, `imie`, `opinia`, `data`) VALUES
(1, 1, 'Krzysztof', 'Super', '2024-04-19'),
(2, 2, 'Krzysztof', 'tez super', '2024-04-19'),
(3, 3, 'Krzysztof', 'najs', '2024-04-19');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `stacje`
--

CREATE TABLE `stacje` (
  `id_stacji` int(10) UNSIGNED NOT NULL,
  `nazwa` varchar(40) NOT NULL,
  `orczyki` tinyint(3) UNSIGNED DEFAULT NULL,
  `krzeselka` tinyint(3) UNSIGNED DEFAULT NULL,
  `gondole/kolejki` tinyint(3) UNSIGNED DEFAULT NULL,
  `nasniezanie` char(3) DEFAULT NULL,
  `oswietlenie` char(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `stacje`
--

INSERT INTO `stacje` (`id_stacji`, `nazwa`, `orczyki`, `krzeselka`, `gondole/kolejki`, `nasniezanie`, `oswietlenie`) VALUES
(1, 'Jaworzyna Krynicka', 6, 2, 1, 'tak', 'tak'),
(2, 'Dwie Doliny - Muszyna Wierchomla', 5, 2, 0, 'tak', 'tak'),
(3, 'Korbielów Pilsko', 6, 2, 0, 'tak', 'tak'),
(4, 'Kluszkowce Czorsztyn Ski', 2, 2, 0, 'tak', 'tak'),
(5, 'Laskowa - Kamionna', 1, 1, 0, 'tak', 'tak'),
(6, 'Zakopane - Kasprowy Wierch', 0, 2, 1, 'nie', 'nie'),
(7, 'Szczyrk - Beskid Sport Arena', 2, 1, 0, 'tak', 'tak'),
(8, 'Jurgów Ski', 4, 2, 0, 'tak', 'tak'),
(9, 'Witów-Ski', 0, 1, 0, 'tak', 'tak'),
(10, 'Zakopane - Polana Szymoszkowa', 0, 2, 0, 'tak', 'tak'),
(11, 'Myślenice Chełm', 1, 2, 0, 'tak', 'tak'),
(12, 'Podstolice', 2, 0, 0, 'tak', 'tak'),
(13, 'Koninki Ostoja Górska', 3, 1, 0, 'nie', 'tak'),
(14, 'Lubomierz', 2, 0, 0, 'tak', 'tak'),
(15, 'Rzyki Czarny Groń', 1, 2, 0, 'tak', 'tak'),
(16, 'Rytro Ryterski Raj', 2, 1, 0, 'tak', 'tak'),
(17, 'Spytkowice Beskid', 2, 1, 0, 'tak', 'tak'),
(18, 'Zawoja Mosorny Groń', 0, 1, 0, 'tak', 'tak'),
(19, 'Białka Tatrzańska', 7, 9, 0, 'tak', 'tak'),
(20, 'Wisła Soszów', 3, 1, 0, 'tak', 'tak');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `trasy`
--

CREATE TABLE `trasy` (
  `id_trasy` int(10) UNSIGNED NOT NULL,
  `id_stacji` int(10) UNSIGNED NOT NULL,
  `nazwa` varchar(50) NOT NULL,
  `dlugosc` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `trasy`
--

INSERT INTO `trasy` (`id_trasy`, `id_stacji`, `nazwa`, `dlugosc`) VALUES
(1, 1, 'I - rodzinna', 2600),
(2, 1, 'II - rodzinna', 900),
(3, 1, 'IIa - rodzinna', 900),
(4, 1, 'III - rodzinna', 650),
(5, 1, 'IV - rodzinna', 1000),
(6, 1, 'V - FIS', 1000),
(7, 1, 'VI - rodzinna', 1050),
(8, 2, 'Trasa nr 1 - FIS', 1800),
(9, 2, 'Trasa nr 2 - FIS', 550),
(10, 2, 'Trasa nr 4 - FIS', 1000),
(11, 2, 'Trasa nr 5', 750),
(12, 2, 'Trasa nr 6', 950),
(13, 2, 'Trasa nr 7', 1750),
(14, 2, 'Trasa nr 8', 1150),
(15, 3, '1 - Solisko - Kamienna', 730),
(16, 3, '2 - Solisko - Kamienna', 850),
(17, 3, '3 - Solisko - Kamienna', 790),
(18, 3, '4 - Buczynka - Hala Szczawiny', 1500),
(19, 3, '5 - Pilsko - Hala Szczawiny', 2650),
(20, 3, '5a - Pilsko - Hala Miziowa', 980),
(21, 3, '6 - Kopiec - Hala Miziowa', 800),
(22, 3, '7 - Hala Miziowa - Hala Szczawiny', 950),
(23, 3, '8 - Kopiec - Hala Miziowa', 680),
(24, 4, '1 - niebiesko/czerwona', 1500),
(25, 4, '2 - niebieska', 460),
(26, 4, '3 - FIS czerwona', 900),
(27, 4, '6 - czerwona', 900),
(28, 4, '7 - niebieska', 500),
(29, 5, 'Trasa nr 1', 2000),
(30, 5, 'Trasa nr 2', 1300),
(31, 5, 'Trasa nr 3', 240),
(32, 5, 'Trasa nr 4', 250),
(33, 6, 'Trasa w Kotle Goryczkowym', 1770),
(34, 6, 'Trasa w Kotle Gąsienicowym', 1200),
(35, 6, 'Szlak narciarski z Hali Gąsienicowej', 8500),
(36, 6, 'Nartostrada z Hali Goryczkowej', 3500),
(37, 7, 'Trasa 1', 1200),
(38, 7, 'Trasa 2', 1000),
(39, 7, 'Trasa 3', 800),
(40, 7, 'Trasa 4', 200),
(41, 7, 'Trasa 5', 220),
(42, 8, '1 - trasa narciarska', 750),
(43, 8, '2 - trasa narciarska', 1150),
(44, 8, '3 - trasa narciarska FIS', 950),
(45, 8, '4 - trasa narciarska', 210),
(46, 8, '5 - trasa narciarska', 950),
(47, 8, '6 - trasa narciarska', 400),
(48, 8, '7 - trasa narciarska', 120),
(49, 9, 'trasa narciarska', 1000),
(50, 9, 'trasa narciarska dla początkujących', 120),
(51, 10, 'trasa czerwona', 1340),
(52, 10, 'trasa niebieska', 400),
(53, 11, 'trasa narciarska 1 FIS', 900),
(54, 11, 'trasa narciarska 2', 1100),
(55, 11, 'trasa narciarska 3', 180),
(56, 12, '1 - trasa narciarska', 350),
(57, 12, '2 - trasa narciarska', 600),
(58, 12, '3 - trasa narciarska', 220),
(59, 13, 'A - trasa narciarska', 1450),
(60, 13, 'B - trasa narciarska', 50),
(61, 13, 'C - trasa narciarska', 350),
(62, 13, 'D - trasa narciarska', 200),
(63, 13, 'E - trasa narciarska', 350),
(64, 14, '1 - trasa narciarska', 700),
(65, 14, '2 - trasa narciarska', 1000),
(66, 14, '3 - trasa narciarska', 160),
(67, 14, '4 - trasa narciarska sportowa', 700),
(68, 14, '5 - trasa narciarska', 500),
(69, 15, '1 - trasa narciarska', 700),
(70, 15, '2 - trasa narciarska', 700),
(71, 15, '3 - trasa narciarska', 450),
(72, 15, '4 - trasa narciarska', 100),
(73, 16, '1 - czerwona przy wyciągu krzesełkowym', 700),
(74, 16, '2 - niebieska przy wyciągu krzesełkowym', 1200),
(75, 16, '3 - niebieska przy wyciągu orczykowym', 220),
(76, 17, '1 - trasa narciarska', 700),
(77, 17, '2 - trasa narciarska', 250),
(78, 17, '3 - trasa narciarska', 1050),
(79, 18, '1 - czerwona FIS', 1380),
(80, 19, '1 - trasa narciarska FIS', 780),
(81, 19, '2 - trasa narcirska FIS', 900),
(82, 19, '2a - trasa narciarska', 1070),
(83, 19, '2b - trasa narciarska', 1160),
(84, 19, '3 - trasa narciarska', 1480),
(85, 19, '4 - trasa narciarska', 1430),
(86, 19, '4a - trasa narciarska', 350),
(87, 19, '5 - trasa narciarska', 350),
(88, 19, '6 - trasa narciarska', 710),
(89, 19, '6a - trasa narciarska', 650),
(90, 19, '7 - trasa narciarska', 1900),
(91, 19, '8 - trasa narciarska', 1200),
(92, 19, '8a - trasa narciarska', 500),
(93, 19, '9 - trasa narciarska', 900),
(94, 19, '10 - trasa narciarska', 900),
(95, 19, 'B1 - trasa narciarska', 380),
(96, 19, 'B2 - trasa narciarska', 190),
(97, 19, 'B3 - trasa narciarska', 220),
(98, 20, '1 - trasa narciarska', 900),
(99, 20, '2 - trasa narciarska', 1300),
(100, 20, '3 - trasa narciarska', 1900);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `opinie`
--
ALTER TABLE `opinie`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `stacje`
--
ALTER TABLE `stacje`
  ADD PRIMARY KEY (`id_stacji`);

--
-- Indeksy dla tabeli `trasy`
--
ALTER TABLE `trasy`
  ADD PRIMARY KEY (`id_trasy`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `opinie`
--
ALTER TABLE `opinie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stacje`
--
ALTER TABLE `stacje`
  MODIFY `id_stacji` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `trasy`
--
ALTER TABLE `trasy`
  MODIFY `id_trasy` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
