-- phpMyAdmin SQL Dump
-- version 4.0.2
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Jeu 24 Juillet 2014 à 17:06
-- Version du serveur: 5.6.11-log
-- Version de PHP: 5.3.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `jlf`
--

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

CREATE TABLE IF NOT EXISTS `membres` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(100) NOT NULL,
  `pass` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `date_enregistrement` datetime NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `pseudo` (`pseudo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Contenu de la table `membres`
--

INSERT INTO `membres` (`ID`, `pseudo`, `pass`, `date_enregistrement`) VALUES
(4, 'Roxanne7_', 'd94a3a08310b0ee0fa69694ddd5a0e58a95da05e', '2014-07-23 13:56:18'),
(5, 'fsfd', '95cb0bfd2977c761298d9624e4b4d4c72a39974a', '2014-07-23 14:00:55'),
(6, 'gfdf', '74d101856d26f2db17b39bd22d3204021eb0bf7d', '2014-07-23 14:01:31'),
(7, 'Rx', 'b444ac06613fc8d63795be9ad0beaf55011936ac', '2014-07-23 14:03:07'),
(8, 'jose', '1c07d420be049c37be5a0dde5b88712d48cd4f03', '2014-07-23 14:03:22'),
(9, 'czec', 'e73879d54c3f56fc2805c615fba2a0bdb5f82766', '2014-07-23 14:03:38'),
(10, 'Roxanne7', '0f6ed5d0223639b299ab9934053b4a30a3d33620', '2014-07-23 14:27:04'),
(11, 'Roxy', '48c00c4dd91abfe0c1ed16f23983fd0f90978160', '2014-07-23 14:32:50'),
(12, 'gszge', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '2014-07-23 14:34:14'),
(13, 'ggggggg', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '2014-07-23 14:34:19'),
(14, 'csqc', '14ac8505a0acfc9facc29a5d596dcb57f506895a', '2014-07-23 14:35:21'),
(15, 'truc', '48c00c4dd91abfe0c1ed16f23983fd0f90978160', '2014-07-23 14:35:26'),
(16, 'test 1', '2f3c6b82e94acbefbdcc4ac1d00fcfb416892355', '2014-07-23 14:43:10'),
(17, 'troc', '7283fd53922cad6917b517bf43bd08bb42311131', '2014-07-23 14:44:37'),
(18, 'fsdfsdfsdf', 'fa2d2d53109150c8e66c10508e00b223a304d866', '2014-07-23 14:44:48'),
(19, 'dd', '388ad1c312a488ee9e12998fe097f2258fa8d5ee', '2014-07-24 14:30:23'),
(20, 'f&lt;sd', '2ba0271b57c42ef11fe3d21b27fdc3c8adf2eb54', '2014-07-24 14:31:06');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
