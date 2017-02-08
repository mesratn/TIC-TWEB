-- phpMyAdmin SQL Dump
-- version 4.6.5.1
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:8889
-- Généré le :  Mer 08 Février 2017 à 18:24
-- Version du serveur :  5.6.34
-- Version de PHP :  5.6.28

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
  `ID` int(50) UNSIGNED NOT NULL,
  `Nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`ID`, `Nom`) VALUES
(1, 'Dessert'),
(2, 'Pizza'),
(3, 'Legume'),
(4, 'Japonais'),
(5, 'Fruit'),
(6, 'Soupe');

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
  `ID` int(50) UNSIGNED NOT NULL,
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
  `Pseudo` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `note`
--

INSERT INTO `note` (`ID_recette`, `Note`, `Commentaire`, `Pseudo`, `Email`, `Date`) VALUES
(1, 5, 'Superbe recette', 'BLU', '', '2017-02-02 00:00:00'),
(1, 1, 'LOL, une recette ? Une blague oui !!', 'NON', '', '2017-02-02 00:00:00'),
(1, 1, 'Bof ;(', 'Baba', 'baba@baba.fr', '2017-02-08 18:24:17');

-- --------------------------------------------------------

--
-- Structure de la table `recette`
--

CREATE TABLE `recette` (
  `ID` int(50) UNSIGNED NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Pseudo` varchar(50) NOT NULL,
  `Description` text,
  `Difficulte` varchar(50) NOT NULL,
  `Temps` int(50) DEFAULT NULL,
  `Date` date NOT NULL,
  `Size` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `recette`
--

INSERT INTO `recette` (`ID`, `Nom`, `Pseudo`, `Description`, `Difficulte`, `Temps`, `Date`, `Size`) VALUES
(1, 'Chocolat', 'Nada', 'Blabla', 'Facile', 20, '2017-02-02', 0);

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
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `list_recette_categorie`
--
ALTER TABLE `list_recette_categorie`
  ADD KEY `frk_categorie_recette` (`ID_categorie`),
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
ALTER TABLE `recette`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `ID` int(50) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `ingredient`
--
ALTER TABLE `ingredient`
  MODIFY `ID` int(50) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `recette`
--
ALTER TABLE `recette`
  MODIFY `ID` int(50) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
  ADD CONSTRAINT `frk_categorie_recette` FOREIGN KEY (`ID_categorie`) REFERENCES `categorie` (`ID`),
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
