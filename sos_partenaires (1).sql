-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 14 Juin 2015 à 00:07
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `sos_partenaires`
--

-- --------------------------------------------------------

--
-- Structure de la table `niveau`
--

CREATE TABLE IF NOT EXISTS `niveau` (
  `id_niveau` int(11) NOT NULL AUTO_INCREMENT,
  `niveau` text NOT NULL,
  PRIMARY KEY (`id_niveau`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `niveau`
--

INSERT INTO `niveau` (`id_niveau`, `niveau`) VALUES
(1, 'novice'),
(2, 'débutant'),
(3, 'intermédiaire'),
(4, 'expert'),
(5, 'professionnel');

-- --------------------------------------------------------

--
-- Structure de la table `recherche`
--

CREATE TABLE IF NOT EXISTS `recherche` (
  `id` int(255) NOT NULL,
  `sport` text NOT NULL,
  `niveau` text NOT NULL,
  `lieu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `sport`
--

CREATE TABLE IF NOT EXISTS `sport` (
  `id_sport` int(255) NOT NULL AUTO_INCREMENT,
  `nom` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_sport`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Contenu de la table `sport`
--

INSERT INTO `sport` (`id_sport`, `nom`) VALUES
(1, 'Football'),
(2, 'Tennis'),
(3, 'Volley-Ball'),
(4, 'Football American'),
(5, 'Rugby'),
(6, 'Golf'),
(7, 'Ping-Pong'),
(8, 'Handball'),
(9, 'Canoë-Kayak'),
(10, 'Pétanque'),
(11, 'Voile'),
(12, 'Natation'),
(13, 'Athlétisme'),
(14, 'karaté'),
(15, 'randonnée'),
(16, 'Running'),
(17, 'badminton'),
(18, 'Tir'),
(19, 'Gymnastique'),
(20, 'Equitation'),
(21, 'Cyclisme sur route'),
(22, 'VTT'),
(23, 'Planche à voile'),
(24, 'Box');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_utilisateur` int(255) NOT NULL AUTO_INCREMENT,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `adresse` text NOT NULL,
  `ville` text NOT NULL,
  `code_postal` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` int(255) NOT NULL,
  `nom_utilisateur` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  PRIMARY KEY (`id_utilisateur`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
