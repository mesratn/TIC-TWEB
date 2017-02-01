-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mer 01 Février 2017 à 14:33
-- Version du serveur :  5.7.17-0ubuntu0.16.04.1
-- Version de PHP :  5.6.28-1+deb.sury.org~xenial+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `marmiton`
--

CREATE DATABASE `marmiton`;
USE `marmiton`;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `ID` int(50) UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT ,
  `Nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`ID`, `Nom`) VALUES
(1, 'Dessert');

-- --------------------------------------------------------

--
-- Structure de la table `etape`
--

CREATE TABLE `etape` (
  `Nom` varchar(50) NOT NULL,
  `Numero` int(50) NOT NULL,
  `Instructions` text NOT NULL,
  `ID_recette` int(50) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `etape`
--

INSERT INTO `etape` (`Nom`, `Numero`, `Instructions`, `ID_recette`) VALUES
('Etape 1', 1, 'Faire ca', 1),
('Etape 2', 2, 'Faire autre chose', 1);

-- --------------------------------------------------------

--
-- Structure de la table `ingredient`
--

CREATE TABLE `ingredient` (
  `ID` int(50) UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `Nom` varchar(50) NOT NULL,
  `Quantite` int(50) NOT NULL,
  `Unite` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `ingredient`
--

INSERT INTO `ingredient` (`ID`, `Nom`, `Quantite`, `Unite`) VALUES
(1, 'Sucre', 200, 'g'),
(2, 'Beurre', 50, 'g');

-- --------------------------------------------------------

--
-- Structure de la table `list_recette_categorie`
--

CREATE TABLE `list_recette_categorie` (
  `ID_recette` int(50) UNSIGNED NOT NULL,
  `ID_categorie` int(50) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `list_recette_categorie`
--

INSERT INTO `list_recette_categorie` (`ID_recette`, `ID_categorie`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `list_recette_ingredient`
--

CREATE TABLE `list_recette_ingredient` (
  `ID_recette` int(50) UNSIGNED NOT NULL,
  `ID_ingredient` int(50) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `list_recette_ingredient`
--

INSERT INTO `list_recette_ingredient` (`ID_recette`, `ID_ingredient`) VALUES
(1, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

CREATE TABLE `note` (
  `ID_recette` int(50) UNSIGNED NOT NULL,
  `Note` int(50) UNSIGNED NOT NULL,
  `Commentaire` text NOT NULL,
  `Pseudo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `note`
--

INSERT INTO `note` (`ID_recette`, `Note`, `Commentaire`, `Pseudo`) VALUES
(1, 5, 'Superbe recette', 'BLU'),
(1, 1, 'LOL, une recette ? Une blague oui !!', 'NON');

-- --------------------------------------------------------

--
-- Structure de la table `recette`
--

CREATE TABLE `recette` (
  `ID` int(50) UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `Nom` varchar(50) NOT NULL,
  `Pseudo` varchar(50) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `recette`
--

INSERT INTO `recette` (`ID`, `Nom`, `Pseudo`, `Date`) VALUES
(1, 'Chocolat', 'Nada', '2017-02-02');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `categorie`
--

--
-- Index pour la table `etape`
--
ALTER TABLE `etape`
  ADD KEY `etape_recette` (`ID_recette`);

--
-- Index pour la table `ingredient`
--

--
-- Index pour la table `list_recette_categorie`
--
ALTER TABLE `list_recette_categorie`
  ADD KEY `frk_recette_categorie` (`ID_recette`);

--
-- Index pour la table `list_recette_ingredient`
--
ALTER TABLE `list_recette_ingredient`
  ADD KEY `frk_ingredient_recette` (`ID_ingredient`),
  ADD KEY `frk_recette_ingredient` (`ID_recette`);

--
-- Index pour la table `note`
--
ALTER TABLE `note`
  ADD KEY `note_recette` (`ID_recette`);

--
-- Index pour la table `recette`
--

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `etape`
--
ALTER TABLE `etape`
  ADD CONSTRAINT `etape_recette` FOREIGN KEY (`ID_recette`) REFERENCES `recette` (`ID`);

--
-- Contraintes pour la table `list_recette_categorie`
--
ALTER TABLE `list_recette_categorie`
  ADD CONSTRAINT `frk_categorie_recette` FOREIGN KEY (`ID_recette`) REFERENCES `categorie` (`ID`),
  ADD CONSTRAINT `frk_recette_categorie` FOREIGN KEY (`ID_recette`) REFERENCES `recette` (`ID`);

--
-- Contraintes pour la table `list_recette_ingredient`
--
ALTER TABLE `list_recette_ingredient`
  ADD CONSTRAINT `frk_ingredient_recette` FOREIGN KEY (`ID_ingredient`) REFERENCES `ingredient` (`ID`),
  ADD CONSTRAINT `frk_recette_ingredient` FOREIGN KEY (`ID_recette`) REFERENCES `recette` (`ID`);

--
-- Contraintes pour la table `note`
--
ALTER TABLE `note`
  ADD CONSTRAINT `note_recette` FOREIGN KEY (`ID_recette`) REFERENCES `recette` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
