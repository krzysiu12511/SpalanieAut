-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 28 Wrz 2022, 12:06
-- Wersja serwera: 10.4.24-MariaDB
-- Wersja PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `test`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `auta`
--

CREATE TABLE `auta` (
  `ID` int(6) UNSIGNED NOT NULL,
  `nazwa` varchar(30) NOT NULL,
  `status` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `auta`
--

INSERT INTO `auta` (`ID`, `nazwa`, `status`) VALUES
(1, 'Bmw', b'1'),
(3, 'Opel', b'1'),
(4, 'Porsche', b'1');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ikony`
--

CREATE TABLE `ikony` (
  `id_ikony` int(6) UNSIGNED NOT NULL,
  `nazwa` varchar(30) NOT NULL,
  `status` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `ikony`
--

INSERT INTO `ikony` (`id_ikony`, `nazwa`, `status`) VALUES
(1, 'electric_bolt', b'1'),
(2, 'sensors', b'1'),
(3, 'houseboat ', b'1'),
(6, 'carpenter', b'1');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ikony_user`
--

CREATE TABLE `ikony_user` (
  `id` int(6) NOT NULL,
  `data` date NOT NULL,
  `id_ikony` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rutyna`
--

CREATE TABLE `rutyna` (
  `id` int(6) NOT NULL,
  `data` date NOT NULL,
  `pierwsza` bit(1) NOT NULL,
  `druga` bit(1) NOT NULL,
  `trzecia` bit(1) NOT NULL,
  `czwarta` bit(1) NOT NULL,
  `piata` bit(1) NOT NULL,
  `szosta` bit(1) NOT NULL,
  `siodma` bit(1) NOT NULL,
  `osma` bit(1) NOT NULL,
  `dziewiata` bit(1) NOT NULL,
  `dziesiata` bit(1) NOT NULL,
  `jedenasta` bit(1) NOT NULL,
  `dwunasta` bit(1) NOT NULL,
  `trzynasta` bit(1) NOT NULL,
  `czternasta` bit(1) NOT NULL,
  `pietnasta` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `rutyna`
--

INSERT INTO `rutyna` (`id`, `data`, `pierwsza`, `druga`, `trzecia`, `czwarta`, `piata`, `szosta`, `siodma`, `osma`, `dziewiata`, `dziesiata`, `jedenasta`, `dwunasta`, `trzynasta`, `czternasta`, `pietnasta`) VALUES
(64, '2022-09-01', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0'),
(65, '2022-09-02', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0'),
(66, '2022-09-03', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0'),
(67, '2022-09-04', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0'),
(68, '2022-09-05', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0'),
(69, '2022-09-06', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0'),
(70, '2022-09-07', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0'),
(71, '2022-09-08', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0'),
(72, '2022-09-09', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0'),
(73, '2022-09-10', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0'),
(74, '2022-09-11', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0'),
(75, '2022-09-12', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0'),
(76, '2022-09-13', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0'),
(77, '2022-09-14', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0'),
(78, '2022-09-15', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0'),
(79, '2022-09-16', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0'),
(80, '2022-09-17', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0'),
(81, '2022-09-18', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0'),
(82, '2022-09-19', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0'),
(83, '2022-09-20', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0'),
(84, '2022-09-21', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0'),
(85, '2022-09-22', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0'),
(86, '2022-09-23', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0'),
(87, '2022-09-24', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0'),
(88, '2022-09-25', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0'),
(89, '2022-09-26', b'1', b'1', b'1', b'1', b'1', b'1', b'1', b'1', b'1', b'1', b'1', b'1', b'1', b'1', b'1'),
(90, '2022-09-27', b'1', b'1', b'1', b'1', b'1', b'1', b'1', b'1', b'1', b'1', b'1', b'1', b'1', b'1', b'1'),
(91, '2022-09-28', b'0', b'0', b'1', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0'),
(92, '2022-09-29', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0'),
(93, '2022-09-30', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sesja`
--

CREATE TABLE `sesja` (
  `ID` int(255) UNSIGNED NOT NULL,
  `sesja` varchar(100) NOT NULL,
  `data` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `sesja`
--

INSERT INTO `sesja` (`ID`, `sesja`, `data`) VALUES
(6, 'bq9f6pbnsntu14e9diuohu8cnu', '2022-09-09 11:44:44'),
(7, 'rvnqt7cbo7vgubroftckpm9b8a', '2022-09-09 12:13:54'),
(8, 'lq3b51d0392qkner15ajuuo4rl', '2022-09-12 06:12:21'),
(9, 'nbiv8agmbjhmphi9kg81s3lkqr', '2022-09-12 08:13:34'),
(10, 'mholphvridqq4b4e0fun56qbe6', '2022-09-13 06:12:42'),
(11, 'taf7b3anbt15u248grnqtite52', '2022-09-14 06:33:52'),
(12, '41eu1jfpgl6557f8nrv9g9gis1', '2022-09-15 06:18:33'),
(13, 'k50sjbuhcvn1bbout44uiavcoa', '2022-09-16 06:04:24'),
(14, '13i9jmskhn0gbpblhrtv5jo5e1', '2022-09-19 06:02:27'),
(15, '8gsg8adfncolpuo3skov7c9b3l', '2022-09-19 09:54:42'),
(16, '4sebqls9ifiu0uq4j35etg3l75', '2022-09-21 22:00:00'),
(17, '6g8bb28dbhoil8t5cgtsuqdl6o', '2022-09-26 22:00:00'),
(18, 'o6mn0psdbvd7romo6cgdvcds44', '2022-09-27 22:00:00');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `spalanie`
--

CREATE TABLE `spalanie` (
  `id` int(6) UNSIGNED NOT NULL,
  `stanLicznika` int(6) NOT NULL,
  `iloscLitrow` decimal(6,2) NOT NULL DEFAULT 0.00,
  `DataTankowania` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_auta` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `spalanie`
--

INSERT INTO `spalanie` (`id`, `stanLicznika`, `iloscLitrow`, `DataTankowania`, `id_auta`) VALUES
(100, 0, '55.08', '2022-08-31 22:00:00', 1),
(101, 1500, '51.00', '2022-09-26 22:00:00', 1),
(102, 800, '50.00', '2022-09-15 22:00:00', 1),
(104, 2300, '57.00', '2022-09-26 22:00:00', 1),
(105, 222, '333.00', '2022-09-26 22:00:00', 1),
(106, 43243, '222.00', '2022-09-26 22:00:00', 1),
(107, 4444, '444.00', '2022-09-26 22:00:00', 1),
(108, 333, '333.00', '2022-09-26 22:00:00', 1),
(109, 3333, '3333.00', '2022-09-26 22:00:00', 1),
(110, 3333, '3333.00', '2022-09-26 22:00:00', 3),
(111, 3334, '1.00', '2022-09-26 22:00:00', 3);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE `user` (
  `ID` int(10) UNSIGNED NOT NULL,
  `login` varchar(10) NOT NULL,
  `pass` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`ID`, `login`, `pass`) VALUES
(1, 'admin', 'admin');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `auta`
--
ALTER TABLE `auta`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `ikony`
--
ALTER TABLE `ikony`
  ADD PRIMARY KEY (`id_ikony`);

--
-- Indeksy dla tabeli `ikony_user`
--
ALTER TABLE `ikony_user`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `rutyna`
--
ALTER TABLE `rutyna`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `sesja`
--
ALTER TABLE `sesja`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `spalanie`
--
ALTER TABLE `spalanie`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `auta`
--
ALTER TABLE `auta`
  MODIFY `ID` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT dla tabeli `ikony`
--
ALTER TABLE `ikony`
  MODIFY `id_ikony` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT dla tabeli `ikony_user`
--
ALTER TABLE `ikony_user`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT dla tabeli `rutyna`
--
ALTER TABLE `rutyna`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT dla tabeli `sesja`
--
ALTER TABLE `sesja`
  MODIFY `ID` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT dla tabeli `spalanie`
--
ALTER TABLE `spalanie`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT dla tabeli `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
