-- phpMyAdmin SQL Dump
-- version 4.6.6deb4+deb9u1
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Dim 05 Décembre 2021 à 17:05
-- Version du serveur :  10.3.31-MariaDB-0+deb10u1
-- Version de PHP :  7.3.31-1~deb10u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `dblolabussie`
--

-- --------------------------------------------------------

--
-- Structure de la table `Liste`
--

CREATE TABLE `Liste` (
  `idListe` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `idMembre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `Liste`
--

INSERT INTO `Liste` (`idListe`, `nom`, `idMembre`) VALUES
(1, 'premiere liste', 1),
(2, 'menage', 1),
(3, 'travail', 1);

-- --------------------------------------------------------

--
-- Structure de la table `Membre`
--

CREATE TABLE `Membre` (
  `idMembre` int(11) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `mdp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `Membre`
--

INSERT INTO `Membre` (`idMembre`, `pseudo`, `mdp`) VALUES
(1, 'lou', '$2y$10$joTXSrDDnXlblc8/eNH2qeFqST.NUMSxq3g1IzhAzGEM/zOAeJb02');

-- --------------------------------------------------------

--
-- Structure de la table `Tache`
--

CREATE TABLE `Tache` (
  `intitule` text NOT NULL,
  `complete` int(1) NOT NULL,
  `idTache` int(11) NOT NULL,
  `idListe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `Tache`
--

INSERT INTO `Tache` (`intitule`, `complete`, `idTache`, `idListe`) VALUES
('premiere tache', 0, 1, 1),
('deuxieme tache', 0, 2, 1),
('aspirateur', 0, 3, 2),
('vaisselle', 0, 4, 2),
('poussiere', 0, 5, 2),
('carreaux', 0, 6, 2),
('finir projet php', 0, 7, 3);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `Liste`
--
ALTER TABLE `Liste`
  ADD PRIMARY KEY (`idListe`),
  ADD KEY `foreign_idMembre` (`idMembre`);

--
-- Index pour la table `Membre`
--
ALTER TABLE `Membre`
  ADD PRIMARY KEY (`idMembre`);

--
-- Index pour la table `Tache`
--
ALTER TABLE `Tache`
  ADD PRIMARY KEY (`idTache`),
  ADD KEY `idListe` (`idListe`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `Liste`
--
ALTER TABLE `Liste`
  MODIFY `idListe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `Membre`
--
ALTER TABLE `Membre`
  MODIFY `idMembre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `Tache`
--
ALTER TABLE `Tache`
  MODIFY `idTache` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `Liste`
--
ALTER TABLE `Liste`
  ADD CONSTRAINT `foreign_idMembre` FOREIGN KEY (`idMembre`) REFERENCES `Membre` (`idMembre`);

--
-- Contraintes pour la table `Tache`
--
ALTER TABLE `Tache`
  ADD CONSTRAINT `foreign_idListe` FOREIGN KEY (`idListe`) REFERENCES `Liste` (`idListe`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
