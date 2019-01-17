-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 20 Cze 2017, 04:51
-- Wersja serwera: 10.1.16-MariaDB
-- Wersja PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `jscore`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kluby`
--

CREATE TABLE `kluby` (
  `id_kluby` int(11) NOT NULL,
  `nazwa` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `adres` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `kod_pocztowy` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `wojewodztwo` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `barwy` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `data_powstania` date DEFAULT NULL,
  `herb_img` text COLLATE utf8_polish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `kluby`
--

INSERT INTO `kluby` (`id_kluby`, `nazwa`, `adres`, `kod_pocztowy`, `wojewodztwo`, `barwy`, `data_powstania`, `herb_img`) VALUES
(1, 'Legia Warszawa', 'ul. Łazienkowska 3', '00-449 Warszawa', 'mazowieckie', 'czerwono-biało-zielono-czarne', '1916-03-01', 'legia.jpg'),
(2, 'Lech Poznań', 'ul. Bułgarska 17', '60-320 Poznań', 'wielkopolskie', 'niebiesko-białe ', '1920-08-01', 'lech.jpg'),
(3, 'Jagiellonia Białystok', 'ul. Legionowa 28', '15-281 Białystok', 'podlaskie', 'żółto-czerwone', '1932-01-27', 'jaga.jpg'),
(4, 'Lechia Gdańsk', 'ul. Pokoleń Lechii Gdańsk 1', '80-560 Gdańsk', 'pomorskie', 'biało-zielone', '1945-03-15', 'lechia.jpg'),
(5, 'Korona Kielce', 'ul. Ściegiennego 8', '25-033 Kielce', 'świętokrzyskie', 'żółto-czerwone', '1973-07-10', 'korona.jpg'),
(6, 'Wisła Kraków', 'ul. Reymonta 22', '30-059 Kraków', 'małopolskie', 'czerwono-biało-niebieskie', '1906-05-18', 'wisla.jpg'),
(7, 'Pogoń Szczecin', 'ul. Karłowicza 28', '71-102 Szczecin', 'zachodniopomorskie', 'granatowo-bordowe', '1948-04-21', 'pogon.jpg'),
(8, 'Termalica Nieciecza', 'ws. Nieciecza 199', '33-240 Żabno', 'małopolskie', 'pomarańczowo-żółto-niebieskie', '1922-05-12', 'termalica.jpg'),
(9, 'Zagłębie Lubin', 'ul. Marii Skłodowskiej-Curie 98', '59-301 Lubin', 'dolnośląskie', 'miedziano-biało-zielone', '1945-09-10', 'zaglebie.jpg'),
(10, 'Piast Gliwice', 'ul. Okrzei 20', '44-100 Gliwice', 'śląskie', 'niebiesko-czerwone', '1945-06-18', 'piast.jpg'),
(11, 'Śląsk Wrocław', 'ul. Oporowska 62', '53-434 Wrocław', 'dolnośląskie', 'zielono-biało-czerwone', '1947-03-20', 'slask.jpg'),
(12, 'Wisła Płock', 'ul. Łukasiewicza 34', '09-400 Płock', 'mazowieckie', 'niebiesko-biało-niebieskie', '1947-02-21', 'plock.jpg'),
(13, 'Arka Gdynia', 'ul. Olimpijska 5', '81-538 Gdynia', 'pomorskie', 'żółto-niebieskie', '1929-06-11', 'arka.jpg'),
(14, 'Cracovia Kraków', 'ul. Wielicka 101', '30-552 Kraków', 'małopolskie', 'biało-czerwone', '1906-06-13', 'cracovia.jpg'),
(15, 'Górnik Łęczna', 'al. Jana Pawła II 13', '21-010 Łęczna', 'lubelskie', 'zielono-czarne', '1979-09-20', 'leczna.jpg'),
(16, 'Ruch Chorzów', 'ul. Cicha 6', '41-506 Chorzów', 'śląskie', 'niebiesko-białe', '1920-04-20', 'chorzow.jpg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `mecze`
--

CREATE TABLE `mecze` (
  `id_mecze` int(11) NOT NULL,
  `kolejka` int(11) DEFAULT NULL,
  `gol_gospodarz` int(11) DEFAULT NULL,
  `gol_gosc` int(11) DEFAULT NULL,
  `gol_gospodarz_half` int(11) DEFAULT NULL,
  `gol_gosc_half` int(11) DEFAULT NULL,
  `data` varchar(30) COLLATE utf8_polish_ci DEFAULT NULL,
  `liczba_widzow` varchar(20) COLLATE utf8_polish_ci DEFAULT NULL,
  `id_sezonu` int(11) NOT NULL,
  `id_stadionu` int(11) NOT NULL,
  `id_trener_gospodarz` int(11) NOT NULL,
  `id_trener_gosc` int(11) NOT NULL,
  `id_klubu_gospodarz` int(11) NOT NULL,
  `id_klubu_gosc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `mecze`
--

INSERT INTO `mecze` (`id_mecze`, `kolejka`, `gol_gospodarz`, `gol_gosc`, `gol_gospodarz_half`, `gol_gosc_half`, `data`, `liczba_widzow`, `id_sezonu`, `id_stadionu`, `id_trener_gospodarz`, `id_trener_gosc`, `id_klubu_gospodarz`, `id_klubu_gosc`) VALUES
(1, 1, 2, 1, 1, 0, '2017-06-01 18:00', '23 356', 1, 1, 1, 3, 1, 3);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sezony`
--

CREATE TABLE `sezony` (
  `id_sezony` int(11) NOT NULL,
  `nazwa_sezonu` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `sezony`
--

INSERT INTO `sezony` (`id_sezony`, `nazwa_sezonu`) VALUES
(1, '2016/2017'),
(2, '2017/2018');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sklady`
--

CREATE TABLE `sklady` (
  `id_sklady` int(11) NOT NULL,
  `minuty_od` int(11) DEFAULT NULL,
  `minuty_do` int(11) DEFAULT NULL,
  `typ_skladu` varchar(2) COLLATE utf8_polish_ci DEFAULT NULL,
  `Kluby_id_kluby` int(11) NOT NULL,
  `id_zawodnik` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `sklady`
--

INSERT INTO `sklady` (`id_sklady`, `minuty_od`, `minuty_do`, `typ_skladu`, `Kluby_id_kluby`, `id_zawodnik`) VALUES
(1, 0, 90, 'P', 1, 1),
(2, 45, 90, 'R', 1, 2),
(3, 0, 90, 'P', 1, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `stadiony`
--

CREATE TABLE `stadiony` (
  `id_stadiony` int(11) NOT NULL,
  `nazwa_stadionu` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `ilosc_miejsc` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `id_klub` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `stadiony`
--

INSERT INTO `stadiony` (`id_stadiony`, `nazwa_stadionu`, `ilosc_miejsc`, `id_klub`) VALUES
(1, 'Stadion Miejski Legii Warszawa im. Marszałka ', '30 967', 1),
(2, 'INEA Stadion', '43 269', 2),
(3, 'Stadion Miejski w Białymstoku\r\n', '22 386', 3),
(4, 'Stadion Energa Gdańsk', '41 620', 4),
(5, 'Kolporter Arena', '15 700', 5),
(6, 'Stadion Miejski w Krakowie', '33 326', 6),
(7, 'Stadion Miejski w Szczecinie im. Floriana Kry', '18 027', 7),
(8, 'Stadion Sportowy Bruk-Bet Termalica', '4 666', 8),
(9, 'Stadion Zagłębia Lubin', '16 068', 9),
(10, 'Stadion Miejski w Gliwicach', '9 913', 10),
(11, 'Stadion Miejski we Wrocławiu', '45 105', 11),
(12, 'Stadion im. Kazimierza Górskiego w Płocku', '10 978', 12),
(13, 'Stadion Miejski w Gdyni', '15 139', 13),
(14, 'Stadion Cracovii im. Józefa Piłsudskiego', '14 572', 14),
(15, 'Stadion Górnika Łęczna', '7 496', 15),
(16, 'Stadion Miejski w Chorzowie', '9300', 16);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `trenerzy`
--

CREATE TABLE `trenerzy` (
  `id_trenerzy` int(11) NOT NULL,
  `trener_imie` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `trener_nazwisko` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `trenerzy`
--

INSERT INTO `trenerzy` (`id_trenerzy`, `trener_imie`, `trener_nazwisko`) VALUES
(1, 'Jacek', 'Magiera'),
(2, 'Nenad', 'Bjelica'),
(3, 'Michał', 'Probierz'),
(4, 'Piotr ', 'Nowak'),
(5, 'Maciej', 'Bartoszek'),
(6, 'Kiko', 'Ramírez'),
(7, 'Maciej', 'Skorża'),
(8, 'Marcin', 'Węglewski'),
(9, 'Piotr', 'Stokowiec'),
(10, 'Dariusz', 'Wdowczyk'),
(11, 'Jan', 'Urban'),
(12, 'Marcin', 'Kaczmarek'),
(13, 'Leszek', 'Ojrzyński'),
(14, 'Jacek', 'Zieliński'),
(15, 'Franciszek', 'Smuda'),
(16, 'Krzysztof', 'Warzycha');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `userId` int(11) UNSIGNED NOT NULL,
  `userLogin` varchar(20) NOT NULL,
  `userHaslo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`userId`, `userLogin`, `userHaslo`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zawodnicy`
--

CREATE TABLE `zawodnicy` (
  `id_zawodnicy` int(11) NOT NULL,
  `imie` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `nazwisko` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `kraj` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `data_urodzenia` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `wzrost` decimal(2,0) DEFAULT NULL,
  `waga` decimal(2,0) DEFAULT NULL,
  `nr_koszulki` int(11) DEFAULT NULL,
  `Kluby_id_kluby` int(11) NOT NULL,
  `Sezony_id_sezony` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `zawodnicy`
--

INSERT INTO `zawodnicy` (`id_zawodnicy`, `imie`, `nazwisko`, `kraj`, `data_urodzenia`, `wzrost`, `waga`, `nr_koszulki`, `Kluby_id_kluby`, `Sezony_id_sezony`) VALUES
(1, 'Arkadiusz', 'Malarz', 'Polska', '1980-06-19', '99', '86', 1, 1, 1),
(2, 'Artur', 'Jędrzejczyk', 'Polska', '1987-11-04', '99', '78', 55, 1, 2);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `kluby`
--
ALTER TABLE `kluby`
  ADD PRIMARY KEY (`id_kluby`);

--
-- Indexes for table `mecze`
--
ALTER TABLE `mecze`
  ADD PRIMARY KEY (`id_mecze`),
  ADD KEY `fk_Mecze_Sezony_idx` (`id_sezonu`),
  ADD KEY `fk_Mecze_Stadiony1_idx` (`id_stadionu`),
  ADD KEY `fk_Mecze_Trenerzy1_idx` (`id_trener_gospodarz`),
  ADD KEY `fk_Mecze_Trenerzy2_idx` (`id_trener_gosc`),
  ADD KEY `fk_Mecze_Kluby1_idx` (`id_klubu_gospodarz`),
  ADD KEY `fk_Mecze_Kluby2_idx` (`id_klubu_gosc`);

--
-- Indexes for table `sezony`
--
ALTER TABLE `sezony`
  ADD PRIMARY KEY (`id_sezony`);

--
-- Indexes for table `sklady`
--
ALTER TABLE `sklady`
  ADD PRIMARY KEY (`id_sklady`),
  ADD KEY `fk_Sklady_Kluby1_idx` (`Kluby_id_kluby`),
  ADD KEY `fk_Sklady_Zawodnicy1_idx` (`id_zawodnik`);

--
-- Indexes for table `stadiony`
--
ALTER TABLE `stadiony`
  ADD PRIMARY KEY (`id_stadiony`),
  ADD KEY `fk_Stadiony_Kluby1_idx` (`id_klub`);

--
-- Indexes for table `trenerzy`
--
ALTER TABLE `trenerzy`
  ADD PRIMARY KEY (`id_trenerzy`);

--
-- Indexes for table `zawodnicy`
--
ALTER TABLE `zawodnicy`
  ADD PRIMARY KEY (`id_zawodnicy`),
  ADD KEY `fk_Zawodnicy_Kluby1_idx` (`Kluby_id_kluby`),
  ADD KEY `fk_Zawodnicy_Sezony1_idx` (`Sezony_id_sezony`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `kluby`
--
ALTER TABLE `kluby`
  MODIFY `id_kluby` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT dla tabeli `mecze`
--
ALTER TABLE `mecze`
  MODIFY `id_mecze` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT dla tabeli `sezony`
--
ALTER TABLE `sezony`
  MODIFY `id_sezony` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT dla tabeli `sklady`
--
ALTER TABLE `sklady`
  MODIFY `id_sklady` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT dla tabeli `stadiony`
--
ALTER TABLE `stadiony`
  MODIFY `id_stadiony` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT dla tabeli `trenerzy`
--
ALTER TABLE `trenerzy`
  MODIFY `id_trenerzy` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT dla tabeli `zawodnicy`
--
ALTER TABLE `zawodnicy`
  MODIFY `id_zawodnicy` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `mecze`
--
ALTER TABLE `mecze`
  ADD CONSTRAINT `fk_Mecze_Kluby1` FOREIGN KEY (`id_klubu_gospodarz`) REFERENCES `kluby` (`id_kluby`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Mecze_Kluby2` FOREIGN KEY (`id_klubu_gosc`) REFERENCES `kluby` (`id_kluby`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Mecze_Sezony` FOREIGN KEY (`id_sezonu`) REFERENCES `sezony` (`id_sezony`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Mecze_Stadiony1` FOREIGN KEY (`id_stadionu`) REFERENCES `stadiony` (`id_stadiony`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Mecze_Trenerzy1` FOREIGN KEY (`id_trener_gospodarz`) REFERENCES `trenerzy` (`id_trenerzy`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Mecze_Trenerzy2` FOREIGN KEY (`id_trener_gosc`) REFERENCES `trenerzy` (`id_trenerzy`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `sklady`
--
ALTER TABLE `sklady`
  ADD CONSTRAINT `fk_Sklady_Kluby1` FOREIGN KEY (`Kluby_id_kluby`) REFERENCES `kluby` (`id_kluby`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Sklady_Zawodnicy1` FOREIGN KEY (`id_zawodnik`) REFERENCES `zawodnicy` (`id_zawodnicy`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `stadiony`
--
ALTER TABLE `stadiony`
  ADD CONSTRAINT `fk_Stadiony_Kluby1` FOREIGN KEY (`id_klub`) REFERENCES `kluby` (`id_kluby`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `zawodnicy`
--
ALTER TABLE `zawodnicy`
  ADD CONSTRAINT `fk_Zawodnicy_Kluby1` FOREIGN KEY (`Kluby_id_kluby`) REFERENCES `kluby` (`id_kluby`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Zawodnicy_Sezony1` FOREIGN KEY (`Sezony_id_sezony`) REFERENCES `sezony` (`id_sezony`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
