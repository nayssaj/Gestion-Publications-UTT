-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mer 15 Juin 2016 à 00:14
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=97 ;

--
-- Contenu de la table `Auteur`
--

INSERT INTO `Auteur` (`id`, `organisation`, `equipe`, `nom`, `prenom`) VALUES
(1, 'UTT', ‘CREIDD’, 'Michel', 'Dupont'),
(2, 'UTT', ‘GAMMA3’, 'Amédée', 'Durand'),
(3, 'UTT', ‘tech-CICO’, 'Jean', 'Sarkozy'),
(4, 'UTT', ‘tech-CICO', 'Paul', 'Hollande'),
(5, 'UTT', 'GAMMA3', 'Pierre', 'Andriot'),
(6, 'UTT', 'tech-CICO', 'Enzo', 'Martin'),
(7, 'UTT', ‘CREIDD’, 'Alain', 'Ribery'),
(8, 'UTT', 'tech-CICO', 'Thierry', 'Benzema'),
(9, 'UTT', 'tech-CICO', 'Pauline', 'Messi'),
(10, 'UTT', 'GAMMA3', 'Mathilde', 'Griezmann'),
(11, 'UTT', ‘CREID’, 'Laurence', 'Gilbert'),
(12, 'UTT', 'GAMMA3', 'Amelie', 'Schneider'),
(13, 'UTT', 'tech-CICO', 'Sophie', 'Bernales'),
(14, 'UTT', 'GAMMA3', 'Isabelle', 'Loriette'),
(15, 'UTT', 'tech-CICO', 'Marie', 'Toury'),
(16, 'UTC’, ‘site’, 'Kevin', 'Grosges'),
(17, 'UTBM’, ‘quelqepart’, 'Corentin', 'Obama'),
(18, 'UTBM’, ‘loin’, 'Nathalie', 'Trump'),
(19, 'UTBM’, ‘aese’, 'Le Mercier', 'Marc'),
(20, 'UTBM’, ‘sdsdza’, 'Asterix', 'Legaulois'),
(21, ‘UTC’, 'tech-CICO', 'Obelix', 'Legaulois'),
(23, 'UTT', 'tech-CICO', 'Schneider', 'Léo'),
(24, 'IUT Descartes', 'TC', ‘fernand ', 'Raphael'),
(26, 'UTT', ‘LOSI’, 'abc', 'derp'),
(27, 'UPMC', 'hohoho', ‘gérard’, ‘baptiste’),
(28, 'UTT', 'CREIDD', 'Obama ', 'Barack'),
(29, 'Elysée', 'UPMC', 'Chirac', 'Jacques'),

-- --------------------------------------------------------

--
-- Structure de la table `Comptes`
--

CREATE TABLE IF NOT EXISTS `Comptes` (
  `utilisateur_id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(100) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  `droit_utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`utilisateur_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=85 ;

--
-- Contenu de la table `Comptes`
--

INSERT INTO `Comptes` (`utilisateur_id`, `login`, `mdp`, `droit_utilisateur`) VALUES
(1, 'jglm', '1234', 1),
(2, 'OscarW', 'azerty', 0);

-- --------------------------------------------------------

--
-- Structure de la table `Publication`
--

CREATE TABLE IF NOT EXISTS `Publication` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre_article` varchar(500) NOT NULL,
  `reference_publication` varchar(500) NOT NULL,
  `annee` int(11) NOT NULL,
  `categorie` varchar(25) NOT NULL,
  `lieu` varchar(100) DEFAULT NULL,
  `statut` varchar(20) NOT NULL,
  `date_ajout` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=60 ;

--
-- Contenu de la table `Publication`
--

INSERT INTO `Publication` (`id`, `titre_article`, `reference_publication`, `annee`, `categorie`, `lieu`, `statut`, `date_ajout`) VALUES
(1, ‘des élans sauvages ’, ‘Ils sont en amazonie je crois’, 2015, 'OS', NULL, 'publie', '2015-10-01'),
(2, ‘des saumons d’élevages’, ‘plutôt commun finalement’, 2016, 'RF', NULL, 'Publié', '2016-05-02'),
(3, ‘des galinettes cendrées’, ‘On va faire un petit laché’, 2013, 'RF', NULL, 'Publié', '2013-05-24'),
(4, ‘des serpents raides’, ‘C’est …concept’, 2016, 'OS', NULL, 'Publié', '2016-02-16'),
(5, ‘des goélants dorés’, ‘ah ca c est rare’, 2011, 'OS', NULL, 'label rouge', '2011-02-26'),
(6, ‘des grenouilles atrophiées’, ‘on va tomber à cours d’animaux ‘, 2019, 'RF', NULL, 'revision', '0000-00-00'),
(7, ‘des gazelles anorexiques’, ‘Tellement de pression sociale…’, 2019, 'OS', NULL, 'publie', '0000-00-00'),
(8, ‘des phacochères sévères’, ‘un comportement plutôt rare’, 2016, 'RII’, NULL, 'soumis', '0000-00-00'),
(9, ‘des hirondelles racistes’, ‘Et pourtant elle migrent au primptemps’, 2016, 'RI', NULL, 'revision', '0000-00-00'),
(10,’des rhinocéros crapahuteurs’, ‘Ils éteignent même plus les feux …’, 2016, 'RI', NULL, 'revision', '0000-00-00'),
(11,’’, 'elysée.fr', 2018, 'TD', NULL, 'revision', '2016-05-30'),


-- --------------------------------------------------------

--
-- Structure de la table `redige`
--

CREATE TABLE IF NOT EXISTS `redige` (
  `Publication_id` int(11) NOT NULL,
  `Auteur_id` int(11) NOT NULL,
  `place` int(11) NOT NULL,
  PRIMARY KEY (`Publication_id`,`Auteur_id`),
  KEY `redige_Auteur` (`Auteur_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `redige`
--

INSERT INTO `redige` (`Publication_id`, `Auteur_id`, `place`) VALUES
(1, 1, 2),
(1, 4, 3),
(1, 5, 1),
(1, 6, 4),
(2, 2, 1),
(2, 8, 2),
(3, 5, 1),
(3, 9, 2),
(4, 3, 1),
(4, 11, 2),
(5, 10, 1),
(6, 24, 1),
(6, 23, 2),
(7, 29, 1),
(7, 16, 2),
(8, 13, 1),
(9, 14, 1),
(10, 15, 1);
(11, 7, 1);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `Comptes`
--
ALTER TABLE `Comptes`
  ADD CONSTRAINT `Comptes_ibfk_1` FOREIGN KEY (`utilisateur_id`) REFERENCES `Auteur` (`id`),
  ADD CONSTRAINT `Comptes_ibfk_2` FOREIGN KEY (`utilisateur_id`) REFERENCES `Auteur` (`id`);

--
-- Contraintes pour la table `redige`
--
ALTER TABLE `redige`
  ADD CONSTRAINT `redige_Auteur` FOREIGN KEY (`Auteur_id`) REFERENCES `Auteur` (`id`),
  ADD CONSTRAINT `redige_Publication` FOREIGN KEY (`Publication_id`) REFERENCES `Publication` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;





















-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mer 15 Juin 2016 à 00:14
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=97 ;

--
-- Contenu de la table `Auteur`
--

INSERT INTO `Auteur` (`id`, `organisation`, `equipe`, `nom`, `prenom`) VALUES
(1, 'UTT', 'CREIDD', 'Michel', 'Dupont'),
(2, 'UTT', 'GAMMA3', 'Amédée', 'Durand'),
(3, 'UTT', 'tech-CICO', 'Jean', 'Sarkozy'),
(4, 'UTT', 'tech-CICO', 'Paul', 'Hollande'),
(5, 'UTT', 'GAMMA3', 'Pierre', 'Andriot'),
(6, 'UTT', 'tech-CICO', 'Enzo', 'Martin'),
(7, 'UTT', 'CREIDD', 'Alain', 'Ribery'),
(8, 'UTT', 'tech-CICO', 'Thierry', 'Benzema'),
(9, 'UTT', 'tech-CICO', 'Pauline', 'Messi'),
(10, 'UTT', 'GAMMA3', 'Mathilde', 'Griezmann'),
(11, 'UTT', 'CREID', 'Laurence', 'Gilbert'),
(12, 'UTT', 'GAMMA3', 'Amelie', 'Schneider'),
(13, 'UTT', 'tech-CICO', 'Sophie', 'Bernales'),
(14, 'UTT', 'GAMMA3', 'Isabelle', 'Loriette'),
(15, 'UTT', 'tech-CICO', 'Marie', 'Toury'),
(16, 'UTC', 'site', 'Kevin', 'Grosges'),
(17, 'UTBM', 'quelqepart', 'Corentin', 'Obama'),
(18, 'UTBM', 'loin', 'Nathalie', 'Trump'),
(19, 'UTBM', 'aese', 'Le Mercier', 'Marc'),
(20, 'UTBM', 'sdsdza', 'Asterix', 'Legaulois'),
(21, 'UTC', 'tech-CICO', 'Obelix', 'Legaulois'),
(23, 'UTT', 'tech-CICO', 'Schneider', 'Léo'),
(24, 'IUT Descartes', 'TC', 'fernand ', 'Raphael'),
(26, 'UTT', 'LOSI', 'abc', 'derp'),
(27, 'UPMC', 'hohoho', 'gérard', 'baptiste'),
(28, 'UTT', 'CREIDD', 'Obama ', 'Barack'),
(29, 'Elysée', 'UPMC', 'Chirac', 'Jacques');

-- --------------------------------------------------------

--
-- Structure de la table `Comptes`
--

CREATE TABLE IF NOT EXISTS `Comptes` (
  `utilisateur_id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(100) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  `droit_utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`utilisateur_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=85 ;

--
-- Contenu de la table `Comptes`
--

INSERT INTO `Comptes` (`utilisateur_id`, `login`, `mdp`, `droit_utilisateur`) VALUES
(1, 'jglm', '1234', 1),
(2, 'OscarW', 'azerty', 0);

-- --------------------------------------------------------

--
-- Structure de la table `Publication`
--

CREATE TABLE IF NOT EXISTS `Publication` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre_article` varchar(500) NOT NULL,
  `reference_publication` varchar(500) NOT NULL,
  `annee` int(11) NOT NULL,
  `categorie` varchar(25) NOT NULL,
  `lieu` varchar(100) DEFAULT NULL,
  `statut` varchar(20) NOT NULL,
  `date_ajout` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=60 ;

--
-- Contenu de la table `Publication`
--

INSERT INTO 'Publication' ('id', 'titre_article', 'reference_publication', 'annee', 'categorie', 'lieu', 'statut', 'date_ajout') VALUES
(1, 'Des élans sauvages ', 'Ils sont en amazonie je crois', 2015, 'OS', NULL, 'publie', '2015-10-01'),
(2, 'Des saumons d’élevages', 'plutôt commun finalement', 2016, 'RF', NULL, 'Publié', '2016-05-02'),
(3, 'Des galinettes cendrées', 'On va faire un petit laché', 2013, 'RF', NULL, 'Publié', '2013-05-24'),
(4, 'Des serpents raides', 'C’est …concept', 2016, 'OS', NULL, 'Publié', '2016-02-16'),
(5, 'Des goélants dorés', 'ah ca c est rare', 2011, 'OS', NULL, 'label rouge', '2011-02-26'),
(6, 'Des grenouilles atrophiées', 'on va tomber à cours d’animaux ', 2019, 'RF', NULL, 'revision', '0000-00-00'),
(7, 'Des gazelles anorexiques', 'Tellement de pression sociale…', 2019, 'OS', NULL, 'publie', '0000-00-00'),
(8, 'Des phacochères sévères', 'un comportement plutôt rare', 2016, 'RII', NULL, 'soumis', '0000-00-00'),
(9, 'Des hirondelles racistes', 'Et pourtant elle migrent au primptemps', 2016, 'RI', NULL, 'revision', '0000-00-00'),
(10,'Des rhinocéros crapahuteurs', 'Ils éteignent même plus les feux …', 2016, 'RI', NULL, 'revision', '0000-00-00'),
(11,'', 'elysée.fr', 2018, 'TD', NULL, 'revision', '2016-05-30');


-- --------------------------------------------------------

--
-- Structure de la table `redige`
--

CREATE TABLE IF NOT EXISTS `redige` (
  `Publication_id` int(11) NOT NULL,
  `Auteur_id` int(11) NOT NULL,
  `place` int(11) NOT NULL,
  PRIMARY KEY (`Publication_id`,`Auteur_id`),
  KEY `redige_Auteur` (`Auteur_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `redige`
--

INSERT INTO `redige` (`Publication_id`, `Auteur_id`, `place`) VALUES
(1, 1, 2),
(1, 4, 3),
(1, 5, 1),
(1, 6, 4),
(2, 2, 1),
(2, 8, 2),
(3, 5, 1),
(3, 9, 2),
(4, 3, 1),
(4, 11, 2),
(5, 10, 1),
(6, 24, 1),
(6, 23, 2),
(7, 29, 1),
(7, 16, 2),
(8, 13, 1),
(9, 14, 1),
(10, 15, 1),
(11, 7, 1);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `Comptes`
--
ALTER TABLE `Comptes`
  ADD CONSTRAINT `Comptes_ibfk_1` FOREIGN KEY (`utilisateur_id`) REFERENCES `Auteur` (`id`),
  ADD CONSTRAINT `Comptes_ibfk_2` FOREIGN KEY (`utilisateur_id`) REFERENCES `Auteur` (`id`);

--
-- Contraintes pour la table `redige`
--
ALTER TABLE `redige`
  ADD CONSTRAINT `redige_Auteur` FOREIGN KEY (`Auteur_id`) REFERENCES `Auteur` (`id`),
  ADD CONSTRAINT `redige_Publication` FOREIGN KEY (`Publication_id`) REFERENCES `Publication` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

