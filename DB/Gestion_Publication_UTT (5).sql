-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mar 14 Juin 2016 à 00:05
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=85 ;

--
-- Contenu de la table `Auteur`
--

INSERT INTO `Auteur` (`id`, `organisation`, `equipe`, `nom`, `prenom`) VALUES
(1, 'UTT', 'ABC', 'Michel', 'Dupont'),
(2, 'UTT', 'ABC', 'Amédée', 'Durand'),
(3, 'UTT', 'ABC', 'Jean', 'Sarkozy'),
(4, 'UTT', 'ABC', 'Paul', 'Hollande'),
(5, 'UTT', 'ABC', 'Pierre', 'Andriot'),
(6, 'UTT', 'ABC', 'Enzo', 'Martin'),
(7, 'UTT', 'ABC', 'Alain', 'Ribery'),
(8, 'UTT', 'ABC', 'Thierry', 'Benzema'),
(9, 'UTT', 'ABC', 'Pauline', 'Messi'),
(10, 'UTT', 'ABC', 'Mathilde', 'Griezmann'),
(11, 'UTT', 'ABC', 'Laurence', 'Gilbert'),
(12, 'UTT', 'ABC', 'Amelie', 'Schneider'),
(13, 'UTT', 'ABC', 'Sophie', 'Bernales'),
(14, 'UTT', 'ABC', 'Isabelle', 'Loriette'),
(15, 'UTT', 'ABC', 'Marie', 'Toury'),
(16, 'UTT', 'ABC', 'Kevin', 'Grosges'),
(17, 'UTT', 'ABC', 'Corentin', 'Obama'),
(18, 'UTT', 'ABC', 'Nathalie', 'Trump'),
(19, 'UTT', 'tech-CICO', 'Le Mercier', 'Marc'),
(20, 'UTT', 'Petitbonum', 'Asterix', 'Legaulois'),
(21, 'UTT', 'Babaorum', 'Obelix', 'Legaulois'),
(23, 'UTT', 'ISI', 'Schneider', 'Léo'),
(24, 'IUT Descartes', 'TC', 'Le Mercier ', 'Raphael'),
(26, 'UTT', 'blabla', 'abc', 'derp'),
(27, 'UPMC', 'hohoho', 'xyz', 'omg'),
(28, 'UTT', 'CREIDD', 'Obama ', 'Barack'),
(29, 'Elysée', 'UPMC', 'Chirac', 'Jacques'),
(30, 'SIGAA', 'DEPRO', 'Satoshi Sakuraba', 'Celso'),
(31, 'UTT', 'LOSI', 'Cynthia Santos', 'Andréa'),
(32, 'UTT', 'LOSI', 'Prins', 'Christian'),
(33, 'UTT', 'dep', 'AAAA', 'aaaa'),
(34, 'UTT', 'dep', 'BBBB', 'bbbb'),
(35, 'UTT', 'dep', 'CCCC', 'cccc'),
(36, 'UTT', 'rezg', 'rezgrezg', 'rezgrezg'),
(37, 'UTT', 'ISI', 'Noël', 'Père'),
(39, 'UTT', 'ISI', 'Le Mercier', 'Jean-Gabriel'),
(40, 'UTT', 'LASMIS', 'Matt', 'Groening'),
(47, 'UTT', 'LASMIS', 'Oscar', 'Wilde'),
(48, 'UTT', 'LM2S', 'Verne', 'Jules'),
(55, 'UTT', 'tech-CICO', 'McCarty', 'Cormac'),
(56, 'UTT', 'ERA', 'Maupassant', 'Guy'),
(57, 'UTT', 'tech-CICO', 'Christie', 'Agatha'),
(58, 'UTT', 'LM2S', 'Poirot', 'Hercule'),
(59, 'Western', 'Tu creuse', 'Morricone', 'Ennio'),
(60, 'UTT', 'texico', 'Eastwood', 'Clint'),
(82, 'UTT', 'mdr', 'Boon', 'Dany'),
(83, 'garezg', 'argar', 'zaegf', 'gazg'),
(84, 'UTT', 'LASMIS', 'Pika', 'Pika');

-- --------------------------------------------------------

--
-- Structure de la table `Comptes`
--

CREATE TABLE IF NOT EXISTS `Comptes` (
  `utilisateur_id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(100) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  PRIMARY KEY (`utilisateur_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=85 ;

--
-- Contenu de la table `Comptes`
--

INSERT INTO `Comptes` (`utilisateur_id`, `login`, `mdp`) VALUES
(1, 'jglm', '1234'),
(2, 'OscarW', 'azerty'),
(48, 'Julou', 'xyz'),
(55, 'CormacM', '123'),
(56, 'guigui', '123'),
(57, 'AgathaC', 'aze'),
(58, 'HerculeP', '123'),
(84, 'pika', 'pika');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Contenu de la table `Publication`
--

INSERT INTO `Publication` (`id`, `titre_article`, `reference_publication`, `annee`, `categorie`, `lieu`, `statut`, `date_ajout`) VALUES
(1, 'SuperSuper', 'LabelLabel', 2015, 'OS', NULL, 'rodin', '2015-10-01'),
(2, 'le_super_titre_2', 'ref_2', 2016, 'RF', NULL, 'Publié', '2016-05-02'),
(3, 'le_super_titre_3', 'ref_3', 2013, 'RF', NULL, 'Publié', '2013-05-24'),
(4, 'le_super_titre_4', 'ref_4', 2016, 'OS', NULL, 'Publié', '2016-02-16'),
(5, 'fzaagft', 'gzagzgfa', 2011, 'OS', NULL, 'label rouge', '2011-02-26'),
(19, 'BestEvah', 'J''ai vraiment plus d''idée', 2019, 'RF', NULL, 'revision', '0000-00-00'),
(22, 'titre', 'lien', 2019, 'OS', NULL, 'publie', '0000-00-00'),
(23, 'titre', 'agagf', 2016, 'RI', NULL, 'soumis', '0000-00-00'),
(24, 'zgagrag', 'rezgearg', 2016, 'RI', NULL, 'revision', '0000-00-00'),
(25, 'fereagfreg', 'ezgfezag', 2016, 'RI', NULL, 'revision', '0000-00-00'),
(26, 'Moi président', 'elysée.fr', 2018, 'TD', NULL, 'revision', '2016-05-30'),
(28, 'Work-troop scheduling for road network accessibility after a major earthquake.', 'Electronic Notes in Discrete Mathematics 52, 317–324.', 2016, 'RI', NULL, 'publie', '2016-05-30'),
(29, 'Modeling and solving the road network rehabilitation problem after a major earthquake.', '16ème congrès de la Société Française de Recherche Opérationnelle et d''Aide à la Décision (ROADEF)', 2016, 'CF', 'Marseille', 'publie', '2016-05-30'),
(30, 'ergrezg', 'ezgg', 2016, 'RI', NULL, 'soumis', '0000-00-00'),
(31, 'ergrezg', 'ezgg', 2016, 'RI', NULL, 'soumis', '2016-05-30'),
(32, 'mangez des pommes', 'Journal officiel', 2022, 'RF', NULL, 'soumis', '2016-05-30'),
(33, 'Rapport de LO07', 'lienBidon', 2016, 'TD', NULL, 'revision', '2016-06-09'),
(34, 'Rapport de LO07 2', 'lienBidon2', 2016, 'TD', NULL, 'revision', '2016-06-09');

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
(1, 1, 4),
(1, 6, 2),
(1, 12, 3),
(1, 59, 5),
(1, 82, 1),
(2, 15, 0),
(3, 5, 0),
(3, 13, 0),
(4, 3, 0),
(4, 10, 0),
(5, 1, 5),
(5, 15, 3),
(5, 16, 2),
(5, 18, 1),
(5, 83, 4),
(19, 23, 0),
(19, 24, 0),
(22, 26, 0),
(22, 27, 0),
(23, 26, 0),
(24, 4, 0),
(25, 7, 0),
(25, 9, 0),
(26, 28, 0),
(26, 29, 0),
(28, 30, 0),
(28, 31, 0),
(28, 32, 0),
(29, 33, 0),
(29, 34, 0),
(29, 35, 0),
(30, 36, 0),
(31, 36, 0),
(32, 29, 0),
(32, 37, 0),
(33, 23, 0),
(33, 39, 0),
(34, 23, 0),
(34, 39, 0);

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
