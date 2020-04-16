-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 10 avr. 2020 à 15:51
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `techcarebdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `idCategorie` int(11) NOT NULL AUTO_INCREMENT,
  `Categorie` varchar(255) NOT NULL,
  PRIMARY KEY (`idCategorie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `faq`
--

DROP TABLE IF EXISTS `faq`;
CREATE TABLE IF NOT EXISTS `faq` (
  `idFAQ` int(11) NOT NULL AUTO_INCREMENT,
  `Question` varchar(255) NOT NULL,
  `Reponse` text NOT NULL,
  `Datcreation` date NOT NULL,
  PRIMARY KEY (`idFAQ`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `forum`
--

DROP TABLE IF EXISTS `forum`;
CREATE TABLE IF NOT EXISTS `forum` (
  `idForum` int(11) NOT NULL AUTO_INCREMENT,
  `idAuteur` int(11) NOT NULL,
  `Sujet` varchar(255) NOT NULL,
  `Contenu` text NOT NULL,
  `Datecreation` datetime NOT NULL,
  `Datemodification` datetime DEFAULT NULL,
  `idReponse` varchar(255) DEFAULT NULL,
  `Categorie` int(11) NOT NULL,
  PRIMARY KEY (`idForum`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `idMessage` int(11) NOT NULL AUTO_INCREMENT,
  `idAuteur` int(11) NOT NULL,
  `idDestinataire` int(11) NOT NULL,
  `Message` text NOT NULL,
  `Datecreation` datetime NOT NULL,
  PRIMARY KEY (`idMessage`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `profil`
--

DROP TABLE IF EXISTS `profil`;
CREATE TABLE IF NOT EXISTS `profil` (
  `idProfil` int(11) NOT NULL AUTO_INCREMENT,
  `Mintemperature` int(11) NOT NULL,
  `Maxtemperature` int(11) NOT NULL,
  `Mincardiaque` int(11) NOT NULL,
  `Maxcardiaque` int(11) NOT NULL,
  `Minmicro` int(11) NOT NULL,
  `maxmicro` int(11) NOT NULL,
  PRIMARY KEY (`idProfil`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `score`
--

DROP TABLE IF EXISTS `score`;
CREATE TABLE IF NOT EXISTS `score` (
  `idScore` int(11) NOT NULL AUTO_INCREMENT,
  `Type` int(11) NOT NULL,
  `Valeur` int(11) NOT NULL,
  PRIMARY KEY (`idScore`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `test`
--

DROP TABLE IF EXISTS `test`;
CREATE TABLE IF NOT EXISTS `test` (
  `idPretest` int(11) NOT NULL AUTO_INCREMENT,
  `NumeroSecu` int(11) NOT NULL,
  `idProfil` int(11) NOT NULL,
  `Examinateur` int(11) NOT NULL,
  `Type` int(11) NOT NULL,
  `Score` int(11) NOT NULL,
  PRIMARY KEY (`idPretest`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `ticket`
--

DROP TABLE IF EXISTS `ticket`;
CREATE TABLE IF NOT EXISTS `ticket` (
  `idTicket` int(11) NOT NULL AUTO_INCREMENT,
  `idUtilisateur` int(11) NOT NULL,
  `Objet` varchar(255) NOT NULL,
  `Contenu` text NOT NULL,
  `Statut` int(11) NOT NULL,
  `Datecreation` datetime NOT NULL,
  `Datemodification` datetime DEFAULT NULL,
  `Datefermerture` datetime DEFAULT NULL,
  PRIMARY KEY (`idTicket`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `NumeroSecu` int(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Motdepasse` varchar(255) NOT NULL,
  `Prenom` text NOT NULL,
  `Nom` text NOT NULL,
  `DateNaissance` date NOT NULL,
  `Adresse` text NOT NULL,
  `Type` int(11) NOT NULL,
  PRIMARY KEY (`idUtilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
