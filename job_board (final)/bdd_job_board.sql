-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : Dim 17 oct. 2021 à 17:54
-- Version du serveur :  5.7.31
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `job_board`
--

-- --------------------------------------------------------

--
-- Structure de la table `advertisement`
--

DROP TABLE IF EXISTS `advertisement`;
CREATE TABLE IF NOT EXISTS `advertisement` (
  `advertisementId` int(11) NOT NULL AUTO_INCREMENT,
  `companiesId` int(11) NOT NULL,
  `nom` text NOT NULL,
  `contrat` text NOT NULL,
  `salaire` text NOT NULL,
  `tempsDeTravail` text NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`advertisementId`),
  UNIQUE KEY `advertisementId` (`advertisementId`),
  KEY `companiesId` (`companiesId`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `advertisement`
--

INSERT INTO `advertisement` (`advertisementId`, `companiesId`, `nom`, `contrat`, `salaire`, `tempsDeTravail`, `description`) VALUES
(2, 2, 'Développeur Kangourou', 'CDD', '98 000 $', '67h/sem', 'Si vous êtes une personne, vous êtes fait pour notre entreprise.Donc n\'hésitez pas et postulé.'),
(3, 3, 'Chercheur informatique pygargienne', 'CDI', '25000$', '25h/sem', 'Si vous êtes Americains vous vous devez de postulez.Si vous êtes Americains vous vous devez de postulez.Si vous êtes Americains vous vous devez de postulez.Si vous êtes Americains vous vous devez de postulez.Si vous êtes Americains vous vous devez de postulez.Si vous êtes Americains vous vous devez de postulez.Si vous êtes Americains vous vous devez de postulez.Si vous êtes Americains vous vous devez de postulez.Si vous êtes Americains vous vous devez de postulez.Si vous êtes Americains vous vous devez de postulez.Si vous êtes Americains vous vous devez de postulez.Si vous êtes Americains vous vous devez de postulez.Si vous êtes Americains vous vous devez de postulez.Si vous êtes Americains vous vous devez de postulez.Si vous êtes Americains vous vous devez de postulez.Si vous êtes Americains vous vous devez de postulez.Si vous êtes Americains vous vous devez de postulez.Si vous êtes Americains vous vous devez de postulez.Si vous êtes Americains vous vous devez de postulez.Si vous êtes Americains vous vous devez de postulez.Si vous êtes Americains vous vous devez de postulez.Si vous êtes Americains vous vous devez de postulez.Si vous êtes Americains vous vous devez de postulez.Si vous êtes Americains vous vous devez de postulez.Si vous êtes Americains vous vous devez de postulez.Si vous êtes Americains vous vous devez de postulez.Si vous êtes Americains vous vous devez de postulez.Si vous êtes Americains vous vous devez de postulez.Si vous êtes Americains vous vous devez de postulez.Si vous êtes Americains vous vous devez de postulez.Si vous êtes Americains vous vous devez de postulez.Si vous êtes Americains vous vous devez de postulez.Si vous êtes Americains vous vous devez de postulez.Si vous êtes Americains vous vous devez de postulez.Si vous êtes Americains vous vous devez de postulez.Si vous êtes Americains vous vous devez de postulez.Si vous êtes Americains vous vous devez de postulez.Si vous êtes Americains vous vous devez de postulez.Si vous êtes Americains vous vous devez de postulez.Si vous êtes Americains vous vous devez de postulez.Si vous êtes Americains vous vous devez de postulez.Si vous êtes Americains vous vous devez de postulez.Si vous êtes Americains vous vous devez de postulez.\r\n'),
(7, 23, 'az', 'az', 'azz', 'zza', 'aaa'),
(8, 2, '2', '222', '222', '222', '222');

-- --------------------------------------------------------

--
-- Structure de la table `companies`
--

DROP TABLE IF EXISTS `companies`;
CREATE TABLE IF NOT EXISTS `companies` (
  `companiesId` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `lieu` varchar(50) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `description` varchar(800) NOT NULL,
  PRIMARY KEY (`companiesId`),
  KEY `companiesId` (`companiesId`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `companies`
--

INSERT INTO `companies` (`companiesId`, `nom`, `adresse`, `lieu`, `tel`, `description`) VALUES
(2, 'Société Kangourou', 'Kangourou@gmail.com', '323 rue des sauts (Australie)', '0156348943', 'Nous sommes une entreprise basé en Australie, nous essayons de dominer le marché mondial , nous apportons avec nous la libération des kangourou...'),
(3, 'L\'association des pygargues à tête blanche', 'Pygargues@outlook.fr', '1879 Schley Ave, San Antonio, TX 78210, États-Unis', '0123456789', 'Nous sommes les représentant de l\'Amerique ,America for ever !!!'),
(23, 'z', 'sss@fd.D', 'zzz', 'zzz', 'zzz'),
(27, 'la', 'la@la', 'la', 'la', 'la'),
(29, 'mmm', 'mmm@mmm.mmm', 'mmm', 'mmm', 'mm');

-- --------------------------------------------------------

--
-- Structure de la table `information`
--

DROP TABLE IF EXISTS `information`;
CREATE TABLE IF NOT EXISTS `information` (
  `informationId` int(11) NOT NULL AUTO_INCREMENT,
  `advertisementId` int(11) NOT NULL,
  `messageUser` varchar(300) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `tel` varchar(10) NOT NULL,
  PRIMARY KEY (`informationId`),
  KEY `informationId` (`informationId`),
  KEY `advertisementId` (`advertisementId`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `information`
--

INSERT INTO `information` (`informationId`, `advertisementId`, `messageUser`, `nom`, `mail`, `tel`) VALUES
(1, 2, 'lala', 'lala', 'lala', 'lal'),
(47, 7, 'aa', 'aa', 'aa', 'aa'),
(48, 7, 'aaaa', 'sss', 'aaaa', 'aaaa');

-- --------------------------------------------------------

--
-- Structure de la table `stock_people`
--

DROP TABLE IF EXISTS `stock_people`;
CREATE TABLE IF NOT EXISTS `stock_people` (
  `stock_peopleId` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `mail` varchar(75) NOT NULL,
  `mdp` varchar(100) NOT NULL,
  `role` varchar(10) DEFAULT 'user',
  PRIMARY KEY (`stock_peopleId`),
  UNIQUE KEY `stock_peopleId_2` (`stock_peopleId`),
  UNIQUE KEY `mail` (`mail`),
  UNIQUE KEY `tel` (`tel`),
  KEY `stock_peopleId` (`stock_peopleId`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `stock_people`
--

INSERT INTO `stock_people` (`stock_peopleId`, `nom`, `prenom`, `tel`, `mail`, `mdp`, `role`) VALUES
(2, 'test', 'test', 'test', 'test@test.test', 'test', 'Admin'),
(3, 'Caffray', 'Laurent', '0123456789', 'Caffraylaurent@gmail.com', 'laurent', 'Admin'),
(44, 'nom', 'prenom', 'hngf', 'mail', 'mdp', 'role'),
(47, 'kl', 'kl', 'kl', 'kl', 'kl', 'kl');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `advertisement`
--
ALTER TABLE `advertisement`
  ADD CONSTRAINT `advertisement_ibfk_1` FOREIGN KEY (`companiesId`) REFERENCES `companies` (`companiesId`);

--
-- Contraintes pour la table `information`
--
ALTER TABLE `information`
  ADD CONSTRAINT `information_ibfk_1` FOREIGN KEY (`advertisementId`) REFERENCES `advertisement` (`advertisementId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
