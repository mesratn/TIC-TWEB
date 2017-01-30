-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 24 Janvier 2017 à 23:41
-- Version du serveur :  5.7.16-0ubuntu0.16.04.1
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
  `ID` int(10) UNSIGNED NOT NULL,
  `Nom` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `etape`
--

CREATE TABLE `etape` (
  `Nom` varchar(50) NOT NULL,
  `Numero` int(11) NOT NULL,
  `Instructions` text NOT NULL,
  `ID_recette` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `ingredient`
--

CREATE TABLE `ingredient` (
  `ID_recette` int(10) UNSIGNED NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Quantite` int(10) UNSIGNED NOT NULL,
  `Unite` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

CREATE TABLE `note` (
  `ID_recette` int(10) UNSIGNED NOT NULL,
  `Note` int(10) UNSIGNED NOT NULL,
  `Commentaire` text NOT NULL,
  `Pseudo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `recette`
--

CREATE TABLE `recette` (
  `ID` int(10) UNSIGNED NOT NULL,
  `Nom` varchar(100) NOT NULL,
  `Pseudo` varchar(50) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `recette_categorie`
--

CREATE TABLE `recette_categorie` (
  `ID_recette` int(10) UNSIGNED NOT NULL,
  `ID_categorie` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `etape`
--
ALTER TABLE `etape`
  ADD KEY `etape_recette` (`ID_recette`);

--
-- Index pour la table `ingredient`
--
ALTER TABLE `ingredient`
  ADD KEY `ingredient_recette` (`ID_recette`);

--
-- Index pour la table `note`
--
ALTER TABLE `note`
  ADD KEY `note_recette` (`ID_recette`);

--
-- Index pour la table `recette`
--
ALTER TABLE `recette`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `recette_categorie`
--
ALTER TABLE `recette_categorie`
  ADD KEY `categorie_id` (`ID_recette`);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `etape`
--
ALTER TABLE `etape`
  ADD CONSTRAINT `etape_recette` FOREIGN KEY (`ID_recette`) REFERENCES `recette` (`ID`);

--
-- Contraintes pour la table `ingredient`
--
ALTER TABLE `ingredient`
  ADD CONSTRAINT `ingredient_recette` FOREIGN KEY (`ID_recette`) REFERENCES `recette` (`ID`);

--
-- Contraintes pour la table `note`
--
ALTER TABLE `note`
  ADD CONSTRAINT `note_recette` FOREIGN KEY (`ID_recette`) REFERENCES `recette` (`ID`);

--
-- Contraintes pour la table `recette_categorie`
--
ALTER TABLE `recette_categorie`
  ADD CONSTRAINT `categorie_id` FOREIGN KEY (`ID_recette`) REFERENCES `categorie` (`ID`),
  ADD CONSTRAINT `recette_id` FOREIGN KEY (`ID_recette`) REFERENCES `recette` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
