-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 25. Jul 2020 um 13:49
-- Server-Version: 10.4.11-MariaDB
-- PHP-Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `cr11_Ervin_petadoption`
--
CREATE DATABASE IF NOT EXISTS `cr11_Ervin_petadoption` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `cr11_Ervin_petadoption`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `animals`
--

CREATE TABLE `animals` (
  `animal_id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fk_type_id` int(11) NOT NULL,
  `fk_location_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `animals`
--

INSERT INTO `animals` (`animal_id`, `name`, `age`, `image`, `description`, `fk_type_id`, `fk_location_id`) VALUES
(1, 'Bruno', 4, 'https://einfachtierisch.de/media/cache/article_teaser/cms/2013/02/Mops-Hund-Sand-Rennen.jpg?595617', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum laboriosam vero, hic repellendus corporis debitis maxime a at non? Dolorem voluptatem non odit, quasi in doloribus est magnam nobis delectus?\r\n', 1, 2),
(2, 'Tony', 7, 'https://m.faz.net/media1/ppmedia/3288597133/1.6192773/mmobject-still_full/nicht-mehr-muerrisch-die-als.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus repellat cum beatae aspernatur molestias, officia rem maxime explicabo eos sapiente autem veniam odit recusandae nisi fugiat quos voluptatum quae veritatis?\r\n', 1, 1),
(3, 'Mike', 12, 'https://upload.wikimedia.org/wikipedia/commons/a/a1/Campus_Cat_Augsburg.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem accusamus dolor eius deserunt aspernatur sit saepe! Voluptates sed obcaecati mollitia nobis quidem itaque reiciendis iste totam tempore, optio dicta ipsum?\r\n', 1, 3),
(4, 'Nina', 1, 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRhQAtBCy2XA803nboF3ILPGP0EIR4HW7n6GQ&usqp=CAU', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Atque reiciendis enim quas exercitationem totam nihil beatae omnis hic debitis fugit temporibus itaque porro, maiores quos, modi blanditiis tenetur corrupti aspernatur.\r\n', 1, 1),
(5, 'Lorem', 8, 'https://www.propferd.at/download/files/%7B87735B0E-A9B2-49DC-B4CD-72BF923F14D1%7D/Beau-Web.jpg', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Atque reiciendis enim quas exercitationem totam nihil beatae omnis hic debitis fugit temporibus itaque porro, maiores quos, modi blanditiis tenetur corrupti aspernatur.\r\n', 2, 2),
(6, 'Pablo', 16, 'https://zooroyal.rdss.it/magazin/wp-content/uploads/2019/05/shire-horse-schimmel-760x570.jpg', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Atque reiciendis enim quas exercitationem totam nihil beatae omnis hic debitis fugit temporibus itaque porro, maiores quos, modi blanditiis tenetur corrupti aspernatur.\r\n', 2, 3),
(7, 'Bobo', 4, 'https://media.ehorses.de/xxldetails/727/curly-horse-wallach-4jahre-120-cm-deckhengst-freizeitpferd-zuchtpferd-pleasure-pluherlin-1462727_5.jpg', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Corporis dolores porro quia repellendus laudantium sequi tenetur tempore aliquid est quaerat, itaque accusamus dolor. Assumenda totam et dolorum consequatur laudantium ipsum.\r\n', 2, 1),
(8, 'Geki', 13, 'https://thumbs.dreamstime.com/b/geko-eidechsennahaufnahmegr%C3%BCn-portr%C3%A4ttier-145130745.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, nihil maiores nam repudiandae ea quo obcaecati porro perferendis animi iure cupiditate totam ipsa eaque mollitia fugit laboriosam atque. In, exercitationem?\r\n', 3, 2),
(9, 'Scar', 33, 'https://i.pinimg.com/originals/56/89/b1/5689b176d3d5fcc6ca11e9ef162dcdaf.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, nihil maiores nam repudiandae ea quo obcaecati porro perferendis animi iure cupiditate totam ipsa eaque mollitia fugit laboriosam atque. In, exercitationem?\r\n', 3, 3),
(11, 'Dumbo', 33, 'https://readersdigest.de/media/zoo/images/Elefant-stark_901ba5960062b8dd06f47637a4e8f18d.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, nihil maiores nam repudiandae ea quo obcaecati porro perferendis animi iure cupiditate totam ipsa eaque mollitia fugit laboriosam atque. In, exercitationem?\r\n', 3, 2),
(12, 'Gloria', 50, 'https://www.toggo.de/media/fallback-papagei-10335-10110.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, nihil maiores nam repudiandae ea quo obcaecati porro perferendis animi iure cupiditate totam ipsa eaque mollitia fugit laboriosam atque. In, exercitationem?\r\n', 3, 3),
(13, 'Piggi', 1, 'https://i.pinimg.com/originals/1a/e5/bb/1ae5bb177db47c328399c30df4eeccc6.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate illum non et odit nesciunt, eaque sed, nam pariatur libero ipsam cumque, repellendus molestias odio maxime nihil ipsa enim qui sit?\r\n', 1, 3),
(25, 'OPA', 1, 'https://mediastorage.cnnbrasil.com.br/IMAGES/00/00/00/6849_67069BDFFD47E938.jpg', 'asdadsasadadadadsa', 1, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `location`
--

CREATE TABLE `location` (
  `location_id` int(11) NOT NULL,
  `loc_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip` int(11) NOT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `location`
--

INSERT INTO `location` (`location_id`, `loc_name`, `address`, `zip`, `city`, `email`, `phone`) VALUES
(1, 'Herz für Tiere', 'Hauptstrasse 1', 1220, 'Vienna', 'herzfürtiere@gmail.com', 12345678),
(2, 'Tier Hof Berlin', 'Moritzgasse 102', 10318, 'Berlin', 'tierhof@berlin.at', 495651523),
(3, 'Tiroler Tierheim', 'Bergstrasse 90', 9931, 'Ausservillgraten', 'tirol@tierheim', 98765446);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `type`
--

CREATE TABLE `type` (
  `type_id` int(11) NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `type`
--

INSERT INTO `type` (`type_id`, `type`) VALUES
(1, 'Small Animal'),
(2, 'Large Animal'),
(3, 'Exotic Animal');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pwd` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('user','admin','superadmin') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `email`, `pwd`, `status`) VALUES
(1, 'User', 'User', 'user@user.com', '$2y$10$vvEVcDGNh5YGkB65wkE3W.7PzLoKKVebyuYET4U32dg4oQRckOTQO', 'user'),
(2, 'Admin', 'Admin', 'admin@admin.com', '$2y$10$QmnPvpOE3ewSqtFthL2SXOzaDKZdYoQsk7Pc7yNUfgzvUw5g4ZHk2', 'admin'),
(5, 'Superadmin', 'Superadmin', 'superadmin@superadmin.com', '$2y$10$7JMoUhR4GD.ZnaEoq2cn8OZjDbtXyfXAhIMpTdRPpg6.UqSopCG6C', 'superadmin');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`animal_id`),
  ADD KEY `fk_type_id` (`fk_type_id`) USING BTREE,
  ADD KEY `fk_location_id` (`fk_location_id`);

--
-- Indizes für die Tabelle `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`location_id`);

--
-- Indizes für die Tabelle `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `animals`
--
ALTER TABLE `animals`
  MODIFY `animal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT für Tabelle `location`
--
ALTER TABLE `location`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `type`
--
ALTER TABLE `type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `animals`
--
ALTER TABLE `animals`
  ADD CONSTRAINT `animals_ibfk_1` FOREIGN KEY (`fk_type_id`) REFERENCES `type` (`type_id`),
  ADD CONSTRAINT `animals_ibfk_2` FOREIGN KEY (`fk_location_id`) REFERENCES `location` (`location_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
