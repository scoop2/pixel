-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 01. Jan 2019 um 23:31
-- Server-Version: 10.1.28-MariaDB
-- PHP-Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


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

CREATE TABLE `sets` (
  `id` int(10) UNSIGNED NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '0',
  `promo` tinyint(4) NOT NULL DEFAULT '0',
  `setorder` smallint(6) NOT NULL DEFAULT '1',
  `released` datetime DEFAULT NULL,
  `title` char(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `setlength` mediumint(9) NOT NULL DEFAULT '0',
  `bpm` smallint(6) NOT NULL DEFAULT '0',
  `filename` char(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `filetype` char(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover` char(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `sets`
--

INSERT INTO `sets` (`id`, `active`, `promo`, `setorder`, `released`, `title`, `setlength`, `bpm`, `filename`, `filetype`, `cover`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2017-03-09 03:51:05', 'Zauberwesen Pokes Around The World', 75, 121, 'zauberwesen_pokes_around_the_world.mp3', 'mp3', 'zauberwesen.jpg', 'Begleite das Zauberwesen auf seiner Reise um die Welt. Es kennt viele geheimnisvolle Orte. Manche kann man nicht so einfach anschauen - aber hören und wer richtig zuhören kann, dem wird sie das Zauberwesen sichtbar machen.', '2017-09-09 01:51:05', '2017-09-09 01:51:05'),
(2, 1, 1, 1, '2016-10-07 03:51:05', 'Sie Kamen Aus Rackzoohm', 85, 123, 'sie_kamen_aus_rackzoohm.mp3', 'mp3', 'cover.jpg', '', '2017-09-09 01:51:05', '2017-09-09 01:51:05'),
(3, 1, 1, 1, '2018-11-24 03:51:05', 'NaturalSelection', 73, 125, 'naturalselection.mp3', 'mp3', 'naturalselection.jpg', 'Ich atme tief ein. Scheint Freiheit zu sein.', '2017-09-09 01:51:05', '2017-09-09 01:51:05'),
(4, 1, 1, 1, '2016-02-05 03:51:05', 'Liquid Session In Hamburg I', 97, 123, 'liquid_session_in_hamburg_01.mp3', 'mp3', 'liquid1.jpg', 'Der erste Streich in Hamburg.', '2017-09-09 01:51:05', '2017-09-09 01:51:05'),
(5, 1, 0, 1, '2016-02-09 03:51:05', 'Liquid Session In Hamburg II', 75, 120, 'liquid_session_in_hamburg_02.mp3', 'mp3', 'liquid2.jpg', 'Und der zweite folgt zu gleich.', '2017-09-09 01:51:05', '2017-09-09 01:51:05'),
(6, 1, 0, 1, '2017-01-04 03:51:05', 'Keine Bademeister Bitte!', 75, 122, 'keine_bademeister_bitte.mp3', 'mp3', 'bademeister.jpg', 'Titel ist ernst zu nehmen, ihr werdet es hassen :)', '2017-09-09 01:51:05', '2017-09-09 01:51:05'),
(7, 1, 0, 1, '2017-07-11 03:51:05', 'Dubno', 73, 122, 'dubno.mp3', 'mp3', 'dubno.jpg', 'Einer nannte seinen Sound mal Schneckno, da kam mir Duno in dem Kopf.', '2017-09-09 01:51:05', '2017-09-09 01:51:05'),
(8, 1, 0, 1, '2017-07-11 03:51:05', 'Autophan', 53, 122, 'autophan.mp3', 'mp3', 'autophan.jpg', 'Verliere jedes Gefühl für Zeit. Ein Lächeln rast vorbei. Von Bergen eingerahmt.', '2017-09-09 01:51:05', '2017-09-09 01:51:05');

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
