-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 26 juin 2021 à 19:15
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `taskmanager`
--

-- --------------------------------------------------------

--
-- Structure de la table `collaborateur`
--

CREATE TABLE `collaborateur` (
  `idCollaborateur` int(11) NOT NULL,
  `nomCollaborateur` varchar(255) NOT NULL,
  `emailCollaborateur` varchar(255) NOT NULL,
  `motdepasse` varchar(255) NOT NULL,
  `numeroCollaborateur` varchar(255) NOT NULL,
  `fonctionCollaborateur` varchar(255) NOT NULL,
  `service` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `collaborateur`
--

INSERT INTO `collaborateur` (`idCollaborateur`, `nomCollaborateur`, `emailCollaborateur`, `motdepasse`, `numeroCollaborateur`, `fonctionCollaborateur`, `service`) VALUES
(1, '--', '--', '--', '--', '--', 1),
(2, 'roland', 'roland@gmail.com', 'de271790913ea81742b7d31a70d85f50a3d3e5ae', '0757034213', 'stagiaire', 2),
(3, 'kakpo victoire corine marie-yvana ', 'corinekakpo17@gmail.com', '41d7e72d0a9acd8b224fa6ca8eba5c91fa966316', '0102134562', 'coordinatrice', 2),
(9, 'julien', 'jul@gmail.com', '41d7e72d0a9acd8b224fa6ca8eba5c91fa966316', '0748046883', 'BOULOT', 1),
(11, 'ruan', 'ruan@gmail.com', 'de271790913ea81742b7d31a70d85f50a3d3e5ae', '0809761234', 'stagiaire', 2),
(12, 'ismael kone', 'ismaelpeleforokone@gmail.com', 'de271790913ea81742b7d31a70d85f50a3d3e5ae', '0748046883', 'stagiaire', 2);

-- --------------------------------------------------------

--
-- Structure de la table `dossier`
--

CREATE TABLE `dossier` (
  `idDossier` int(11) NOT NULL,
  `debutDossier` date NOT NULL,
  `finDossier` datetime NOT NULL,
  `enregistrementDossier` timestamp NOT NULL DEFAULT current_timestamp(),
  `descriptif` varchar(255) NOT NULL,
  `statutDossier` enum('en cours','en attente','reporte','valide','perdu') NOT NULL,
  `nomClient` varchar(255) NOT NULL,
  `numeroClient` varchar(255) NOT NULL,
  `emailClient` varchar(255) NOT NULL,
  `typeDeMaison` varchar(255) NOT NULL,
  `villeDistrict` varchar(255) NOT NULL,
  `commune` varchar(255) NOT NULL,
  `zone` varchar(255) NOT NULL,
  `projetConcerne` int(11) NOT NULL DEFAULT 1,
  `commis` int(11) NOT NULL DEFAULT 1,
  `ressourceDossier` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `dossier`
--

INSERT INTO `dossier` (`idDossier`, `debutDossier`, `finDossier`, `enregistrementDossier`, `descriptif`, `statutDossier`, `nomClient`, `numeroClient`, `emailClient`, `typeDeMaison`, `villeDistrict`, `commune`, `zone`, `projetConcerne`, `commis`, `ressourceDossier`) VALUES
(5437, '0000-00-00', '0000-00-00 00:00:00', '2021-06-22 15:55:31', 'HELLO', 'en cours', 'julien', '0565478321', 'jul@gmail.com', 'DUPLEX', 'YAMOUSSSOUKRO', 'YAMOUSSOUKRO', 'LAC', 3, 1, 1),
(6477, '0000-00-00', '0000-00-00 00:00:00', '2021-06-25 22:50:04', 'hello\r\n', 'valide', 'REY', '082669492943', 'rey@gmail.com', 'immeuble', 'korhogo', 'korhogo', 'soba', 2, 1, 1),
(58435, '0000-00-00', '0000-00-00 00:00:00', '2021-06-22 15:54:12', 'hello', 'valide', 'rahim', '0123456789', 'ra@gmail.com', 'basse', 'abidjan', 'plateau', 'cité administrative', 2, 1, 1),
(65467, '0000-00-00', '0000-00-00 00:00:00', '2021-06-26 11:12:36', 'hello', 'en cours', 'REMI', '2721463854', 'remi@yahou.com', 'triplex', 'abidjan', 'cocody', 'st jean', 5, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `etape`
--

CREATE TABLE `etape` (
  `idEtape` int(11) NOT NULL,
  `nomEtape` varchar(255) NOT NULL,
  `statutEtape` enum('validé','en cours','en attente','reporté','perdu') NOT NULL,
  `finEtape` timestamp NOT NULL DEFAULT current_timestamp(),
  `projet` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `etat`
--

CREATE TABLE `etat` (
  `etat` enum('validé','en cours','en attente','reporté','perdu') NOT NULL DEFAULT 'en cours'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

CREATE TABLE `projet` (
  `idProjet` int(11) NOT NULL,
  `nomProjet` varchar(255) NOT NULL,
  `serviceCommis` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `projet`
--

INSERT INTO `projet` (`idProjet`, `nomProjet`, `serviceCommis`) VALUES
(1, '--', 1),
(2, 'OBOX', 1),
(3, 'OFIBRE', 1),
(4, 'CABLAGE IMMMEUBLE', 1),
(5, 'CLUTER', 1);

-- --------------------------------------------------------

--
-- Structure de la table `ressource`
--

CREATE TABLE `ressource` (
  `idRessource` int(11) NOT NULL,
  `nomRessource` varchar(255) NOT NULL,
  `modeleRessource` varchar(255) NOT NULL,
  `nombreRessource` int(11) NOT NULL,
  `dateObtention` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ressource`
--

INSERT INTO `ressource` (`idRessource`, `nomRessource`, `modeleRessource`, `nombreRessource`, `dateObtention`) VALUES
(1, '--', '--', 0, '2021-06-22 13:24:05');

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

CREATE TABLE `service` (
  `idService` int(11) NOT NULL,
  `nomService` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `service`
--

INSERT INTO `service` (`idService`, `nomService`) VALUES
(1, '--'),
(2, 'FTTH');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `collaborateur`
--
ALTER TABLE `collaborateur`
  ADD PRIMARY KEY (`idCollaborateur`),
  ADD KEY `service` (`service`);

--
-- Index pour la table `dossier`
--
ALTER TABLE `dossier`
  ADD PRIMARY KEY (`idDossier`),
  ADD KEY `projetConcerné` (`projetConcerne`),
  ADD KEY `commis` (`commis`),
  ADD KEY `ressourceDossier` (`ressourceDossier`);

--
-- Index pour la table `etape`
--
ALTER TABLE `etape`
  ADD PRIMARY KEY (`idEtape`),
  ADD KEY `projet` (`projet`);

--
-- Index pour la table `etat`
--
ALTER TABLE `etat`
  ADD PRIMARY KEY (`etat`);

--
-- Index pour la table `projet`
--
ALTER TABLE `projet`
  ADD PRIMARY KEY (`idProjet`),
  ADD KEY `serviceCommis` (`serviceCommis`);

--
-- Index pour la table `ressource`
--
ALTER TABLE `ressource`
  ADD PRIMARY KEY (`idRessource`);

--
-- Index pour la table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`idService`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `collaborateur`
--
ALTER TABLE `collaborateur`
  MODIFY `idCollaborateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `etape`
--
ALTER TABLE `etape`
  MODIFY `idEtape` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `projet`
--
ALTER TABLE `projet`
  MODIFY `idProjet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `ressource`
--
ALTER TABLE `ressource`
  MODIFY `idRessource` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `service`
--
ALTER TABLE `service`
  MODIFY `idService` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `collaborateur`
--
ALTER TABLE `collaborateur`
  ADD CONSTRAINT `collaborateur_ibfk_1` FOREIGN KEY (`service`) REFERENCES `service` (`idService`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `dossier`
--
ALTER TABLE `dossier`
  ADD CONSTRAINT `dossier_ibfk_2` FOREIGN KEY (`commis`) REFERENCES `collaborateur` (`idCollaborateur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dossier_ibfk_3` FOREIGN KEY (`ressourceDossier`) REFERENCES `ressource` (`idRessource`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dossier_ibfk_4` FOREIGN KEY (`projetConcerne`) REFERENCES `projet` (`idProjet`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `etape`
--
ALTER TABLE `etape`
  ADD CONSTRAINT `etape_ibfk_1` FOREIGN KEY (`projet`) REFERENCES `projet` (`idProjet`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
