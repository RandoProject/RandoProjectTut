-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mar 21 Janvier 2014 à 19:33
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `site_rando`
--

-- --------------------------------------------------------

--
-- Structure de la table `rando`
--

CREATE TABLE IF NOT EXISTS `rando` (
  `code` int(10) NOT NULL AUTO_INCREMENT,
  `titre` varchar(150) NOT NULL,
  `parcour` point DEFAULT NULL,
  `longueur` float unsigned NOT NULL,
  `duree` time NOT NULL,
  `difficulté` int(1) NOT NULL,
  `descriptif` text NOT NULL,
  `note` int(1) DEFAULT NULL,
  `point_eau` tinyint(1) DEFAULT NULL,
  `denivele` int(4) DEFAULT NULL,
  `equipement` varchar(150) DEFAULT NULL,
  `date_insertion` datetime NOT NULL,
  `valide` tinyint(1) NOT NULL,
  `parcours` blob NOT NULL,
  `région` varchar(2) NOT NULL,
  `photo_principale` int(10) NOT NULL,
  `auteur` varchar(30) NOT NULL,
  `galerie` int(10) DEFAULT NULL,
  PRIMARY KEY (`code`),
  KEY `région` (`région`),
  KEY `photo_principale` (`photo_principale`),
  KEY `auteur` (`auteur`),
  KEY `galerie` (`galerie`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `rando`
--

INSERT INTO `rando` (`code`, `titre`, `parcour`, `longueur`, `duree`, `difficulté`, `descriptif`, `note`, `point_eau`, `denivele`, `equipement`, `date_insertion`, `valide`, `parcours`, `région`, `photo_principale`, `auteur`, `galerie`) VALUES
(1, 'Randonnée à Thérondels', '', 15, '04:45:00', 2, 'La presqu’île de Laussac, depuis le village de Thérondels, tout proche des monts du Cantal : une approche facile des gorges sauvages de la Truyère et du plan d’eau de Sarrans, avec des points de vue exceptionnels.', 0, 1, 0, '', '2014-01-15 14:30:00', 1, 0x612e677078, '16', 0, 'Pat', 0),
(2, 'Randonnée à Conques', '', 7, '02:30:00', 1, 'Dans cet austère et sauvage paysage, au confluent des gorges creusées par l’Ouche et de la vallée du Dourdou, se niche le site de Conques, rayonnant de lumière et semblant figé par le temps.', 0, 1, 0, '', '2014-01-15 14:35:00', 1, 0x622e677078, '16', 0, 'Pat', 0),
(3, 'Randonnée à La Capelle-Balaguier', '', 15, '03:45:00', 2, 'A l’ouest de Villeneuve, le causse de Salvagnac offre aux randonneurs des chemins ancestraux, marqués de l’usure des charrois d’antan, bordés de murettes en pierres sèches et de buis épaiset parfumés.', 0, 1, 0, '', '2014-01-15 14:40:00', 1, 0x632e677078, '16', 0, 'Pat', 0);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `rando`
--
ALTER TABLE `rando`
  ADD CONSTRAINT `rando_ibfk_1` FOREIGN KEY (`région`) REFERENCES `regions` (`num_region`),
  ADD CONSTRAINT `rando_ibfk_2` FOREIGN KEY (`photo_principale`) REFERENCES `photo` (`numéro`),
  ADD CONSTRAINT `rando_ibfk_3` FOREIGN KEY (`auteur`) REFERENCES `membre` (`pseudo`),
  ADD CONSTRAINT `rando_ibfk_4` FOREIGN KEY (`galerie`) REFERENCES `galerie` (`numéro`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
