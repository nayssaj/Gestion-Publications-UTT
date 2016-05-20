-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Ven 13 Mai 2016 à 20:05
-- Version du serveur: 5.5.47-0ubuntu0.14.04.1
-- Version de PHP: 5.5.9-1ubuntu4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `Gestion_Publication_UTT`
--

-- --------------------------------------------------------

--
-- Structure de la table `Auteur`
--

CREATE TABLE IF NOT EXISTS `Auteur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `organisation` varchar(50) NOT NULL,
  `equipe` varchar(25) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;


-- --------------------------------------------------------

--
-- Structure de la table `Comptes`
--

CREATE TABLE IF NOT EXISTS `Comptes` (
  `Auteur_id` int(11) DEFAULT NULL,
  `statut` varchar(25) NOT NULL,
  `login` varchar(50) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  PRIMARY KEY (`login`),
  UNIQUE KEY `Auteur_id` (`Auteur_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Publication`
--

CREATE TABLE IF NOT EXISTS `Publication` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre_article` varchar(25) NOT NULL,
  `reference_publication` varchar(25) NOT NULL,
  `annee` int(11) NOT NULL,
  `categorie` varchar(25) NOT NULL,
  `lieu` varchar(25) DEFAULT NULL,
  `statut` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;


-- --------------------------------------------------------

--
-- Structure de la table `redige`
--

CREATE TABLE IF NOT EXISTS `redige` (
  `Publication_id` int(11) NOT NULL,
  `Auteur_id` int(11) NOT NULL,
  PRIMARY KEY (`Publication_id`,`Auteur_id`),
  KEY `redige_Auteur` (`Auteur_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `Comptes`
--
ALTER TABLE `Comptes`
  ADD CONSTRAINT `Comptes_Auteur` FOREIGN KEY (`Auteur_id`) REFERENCES `Auteur` (`id`);

--
-- Contraintes pour la table `redige`
--
ALTER TABLE `redige`
  ADD CONSTRAINT `redige_Auteur` FOREIGN KEY (`Auteur_id`) REFERENCES `Auteur` (`id`),
  ADD CONSTRAINT `redige_Publication` FOREIGN KEY (`Publication_id`) REFERENCES `Publication` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
