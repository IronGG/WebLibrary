-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 05 Octobre 2020 à 11:53
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bdwebprojet`
--
create database BDWebProjet;
use BDWebProjet;

-- --------------------------------------------------------

--
-- Structure de la table `t_categorie`
--

CREATE TABLE `t_categorie` (
  `idCategorie` int(11) NOT NULL,
  `catName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `t_categorie`
--

INSERT INTO `t_categorie` (`idCategorie`, `catName`) VALUES
(2, 'Shõnen'),
(3, 'Shõjo'),
(4, 'Kodomo'),
(5, 'Seinen'),
(6, 'Josei'),
(7, 'Webtoon'),
(8, 'Manhwa');

-- --------------------------------------------------------

--
-- Structure de la table `t_evaluer`
--

CREATE TABLE `t_evaluer` (
  `idLivre` int(11) NOT NULL,
  `idUtilisateur` int(11) NOT NULL,
  `evaNote` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_livre`
--

CREATE TABLE `t_livre` (
  `idLivre` int(11) NOT NULL,
  `livCouverture` varchar(50) NOT NULL,
  `livTitre` varchar(50) NOT NULL,
  `livChapitre` int(11) NOT NULL,
  `livExtrait` varchar(50) NOT NULL,
  `livResume` text NOT NULL,
  `livAuteur` varchar(50) NOT NULL,
  `livEditeur` varchar(50) NOT NULL,
  `livAnnee` date NOT NULL,
  `idUtilisateur` int(11) NOT NULL,
  `idCategorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_utilisateur`
--

CREATE TABLE `t_utilisateur` (
  `idUtilisateur` int(11) NOT NULL,
  `utiPseudo` varchar(50) NOT NULL,
  `utiDate` date NOT NULL,
  `utiPassword` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `t_utilisateur`
--

INSERT INTO `t_utilisateur` (`idUtilisateur`, `utiPseudo`, `utiDate`, `utiPassword`) VALUES
(1, 'Chiwou', '2020-09-11', 'mdppassecurisédutout');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `t_categorie`
--
ALTER TABLE `t_categorie`
  ADD PRIMARY KEY (`idCategorie`),
  ADD UNIQUE KEY `ID_t_categorie_IND` (`idCategorie`);

--
-- Index pour la table `t_evaluer`
--
ALTER TABLE `t_evaluer`
  ADD PRIMARY KEY (`idUtilisateur`,`idLivre`),
  ADD UNIQUE KEY `ID_t_evaluer_IND` (`idUtilisateur`,`idLivre`),
  ADD KEY `FKt_e_t_l_IND` (`idLivre`);

--
-- Index pour la table `t_livre`
--
ALTER TABLE `t_livre`
  ADD PRIMARY KEY (`idLivre`),
  ADD UNIQUE KEY `ID_t_livre_IND` (`idLivre`),
  ADD KEY `FKt_appartenir_IND` (`idCategorie`),
  ADD KEY `FKt_proposer_IND` (`idUtilisateur`);

--
-- Index pour la table `t_utilisateur`
--
ALTER TABLE `t_utilisateur`
  ADD PRIMARY KEY (`idUtilisateur`),
  ADD UNIQUE KEY `ID_t_utilisateur_IND` (`idUtilisateur`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `t_categorie`
--
ALTER TABLE `t_categorie`
  MODIFY `idCategorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `t_livre`
--
ALTER TABLE `t_livre`
  MODIFY `idLivre` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `t_utilisateur`
--
ALTER TABLE `t_utilisateur`
  MODIFY `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `t_evaluer`
--
ALTER TABLE `t_evaluer`
  ADD CONSTRAINT `FKt_e_t_l_FK` FOREIGN KEY (`idLivre`) REFERENCES `t_livre` (`idLivre`),
  ADD CONSTRAINT `FKt_e_t_u` FOREIGN KEY (`idUtilisateur`) REFERENCES `t_utilisateur` (`idUtilisateur`);

--
-- Contraintes pour la table `t_livre`
--
ALTER TABLE `t_livre`
  ADD CONSTRAINT `FKt_appartenir_FK` FOREIGN KEY (`idCategorie`) REFERENCES `t_categorie` (`idCategorie`),
  ADD CONSTRAINT `FKt_proposer_FK` FOREIGN KEY (`idUtilisateur`) REFERENCES `t_utilisateur` (`idUtilisateur`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
