-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 09. Jan 2019 um 13:01
-- Server-Version: 10.1.28-MariaDB
-- PHP-Version: 7.1.11

-- Daten für Tabelle `tags_sets`
--

INSERT INTO `tags_sets` (`id`, `setid`, `tag`, `rate`) VALUES
(19, 1, 11, 10),
(20, 1, 3, 4),
(43, 2, 14, 8),
(44, 2, 5, 9),
(45, 2, 1, 4),
(49, 3, 5, 9),
(50, 3, 14, 6),
(51, 3, 8, 6),
(60, 4, 5, 7),
(61, 4, 14, 8),
(62, 4, 13, 3),
(69, 5, 3, 7),
(70, 5, 8, 8),
(71, 5, 13, 4),
(72, 5, 12, 5),
(82, 6, 3, 7),
(83, 6, 3, 7),
(84, 6, 5, 10),
(85, 6, 9, 3),
(92, 7, 12, 7),
(93, 7, 6, 5),
(94, 7, 14, 3),
(99, 8, 1, 8),
(100, 8, 5, 6),
(101, 8, 6, 5),
(117, 9, 11, 10),
(118, 9, 3, 7),
(119, 9, 9, 4),
(120, 9, 4, 6),
(121, 9, 8, 6),
(122, 9, 14, 5),
(126, 10, 8, 10),
(127, 10, 5, 8),
(129, 11, 15, 2);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `tags_sets`
--
ALTER TABLE `tags_sets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `tags_sets`
--
ALTER TABLE `tags_sets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
