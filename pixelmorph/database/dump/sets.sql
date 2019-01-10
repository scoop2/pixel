-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 09. Jan 2019 um 13:01
-- Server-Version: 10.1.28-MariaDB
-- PHP-Version: 7.1.11




/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `pixelmorph`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `sets`
--



--
-- Daten für Tabelle `sets`
--

INSERT INTO `sets` (`id`, `active`, `promo`, `setorder`, `released`, `title`, `setlength`, `bpm`, `filename`, `filetype`, `cover`, `description`, `clicks`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2017-03-09 03:51:05', 'Zauberwesen Pokes Around The World', 75, 121, 'zauberwesen_pokes_around_the_world.mp3', 'mp3', 'zauberwesen.jpg', 'Begleite das Zauberwesen auf seiner Reise um die Welt. Es kennt viele geheimnisvolle Orte. Manche kann man nicht so einfach anschauen - aber hören und wer richtig zuhören kann, dem wird sie das Zauberwesen sichtbar machen.', 0, '2017-09-09 01:51:05', '2017-09-09 01:51:05'),
(2, 1, 0, 1, '2016-10-07 03:51:05', 'Pegasi und Reiterhorden', 68, 125, 'pegasi_und_reiterhorden.mp3', 'mp3', 'rackzoohm.jpg', 'Cinematisches Set mit Fantasy Themen mit Tracks die eigentlich für den Club gedacht sind.', 0, '2017-09-09 01:51:05', '2017-09-09 01:51:05'),
(3, 1, 0, 1, '2018-11-24 03:51:05', 'NaturalSelection', 73, 125, 'naturalselection.mp3', 'mp3', 'naturalselection.jpg', 'Ich atme tief ein. Scheint Freiheit zu sein.', 0, '2017-09-09 01:51:05', '2017-09-09 01:51:05'),
(4, 1, 0, 1, '2016-02-05 03:51:05', 'Liquid Session In Hamburg I', 75, 123, 'liquid_session_in_hamburg_01.mp3', 'mp3', 'liquid1.jpg', 'Der erste Streich in Hamburg.', 0, '2017-09-09 01:51:05', '2017-09-09 01:51:05'),
(5, 1, 0, 1, '2016-02-09 03:51:05', 'Liquid Session In Hamburg II', 62, 120, 'liquid_session_in_hamburg_02.mp3', 'mp3', 'liquid2.jpg', 'Und der zweite folgt zu gleich.', 0, '2017-09-09 01:51:05', '2017-09-09 01:51:05'),
(6, 1, 0, 1, '2017-01-04 03:51:05', 'Keine Bademeister Bitte!', 82, 122, 'keine_bademeister_bitte.mp3', 'mp3', 'bademeister.jpg', 'Titel ist ernst zu nehmen, ihr werdet es hassen :)', 0, '2017-09-09 01:51:05', '2017-09-09 01:51:05'),
(7, 1, 0, 1, '2017-07-11 03:51:05', 'Dubno', 73, 122, 'dubno.mp3', 'mp3', 'dubno.jpg', 'Einer nannte seinen Sound mal Schneckno, da kam mir Dubno in den Sinn.', 0, '2017-09-09 01:51:05', '2017-09-09 01:51:05'),
(8, 1, 0, 1, '2017-07-11 03:51:05', 'Autophan', 53, 122, 'autophan.mp3', 'mp3', 'autophan.jpg', 'Verliere jedes Gefühl für Zeit. Ein Lächeln rast vorbei. Von Bergen eingerahmt.', 0, '2017-09-09 01:51:05', '2017-09-09 01:51:05'),
(9, 1, 0, 1, '2018-01-02 03:51:05', 'Zauberwesen makes her way to the east landamarks', 78, 115, 'waves_becoming_landmarks.mp3', 'mp3', 'landmark.jpg', 'Musik schwingt immer gleich, im Kopf erhält sie erst ihre ganz persönliche Gestalt.', 0, '2017-09-09 01:51:05', '2017-09-09 01:51:05'),
(10, 1, 0, 1, '2018-01-11 03:51:05', 'Etwas Herzblut Gereicht', 114, 123, 'etwas_herzblut_gereicht.mp3', 'mp3', 'herzblut.jpg', 'Derjenige der mein Herzblut auf der Tanzfläche fließen sehen will, der spielet bitte doch solche Musik.', 0, '2017-09-09 01:51:05', '2017-09-09 01:51:05'),
(11, 1, 0, 1, '2018-12-09 03:51:05', 'Endzeiten', 89, 124, 'endzeit.mp3', 'mp3', NULL, 'Die Endzeit bahnt sich nur an, aber jemand drückte den Knopf und alles wurde wieder gut.', 0, NULL, NULL);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `sets`
--
ALTER TABLE `sets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `sets`
--
ALTER TABLE `sets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
