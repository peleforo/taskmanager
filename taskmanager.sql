-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : Dim 18 juil. 2021 à 23:54
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
  `service` int(11) NOT NULL DEFAULT 1,
  `equipe` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `collaborateur`
--

INSERT INTO `collaborateur` (`idCollaborateur`, `nomCollaborateur`, `emailCollaborateur`, `motdepasse`, `numeroCollaborateur`, `fonctionCollaborateur`, `service`, `equipe`) VALUES
(1, '--', '--', '--', '--', '--', 1, 1),
(2, 'roland', 'roland@gmail.com', 'de271790913ea81742b7d31a70d85f50a3d3e5ae', '0757034213', 'stagiaire', 2, 1),
(3, 'kakpo victoire corine marie-yvana ', 'corinekakpo17@gmail.com', '41d7e72d0a9acd8b224fa6ca8eba5c91fa966316', '0102134562', 'coordinatrice', 2, 1),
(11, 'ruan', 'ruan@gmail.com', 'de271790913ea81742b7d31a70d85f50a3d3e5ae', '0809761234', 'stagiaire', 2, 1),
(12, 'ismael kone', 'ismaelpeleforokone@gmail.com', 'de271790913ea81742b7d31a70d85f50a3d3e5ae', '0748046883', 'stagiaire', 2, 1),
(13, 'jonathan', 'jon@gmail.com', 'de271790913ea81742b7d31a70d85f50a3d3e5ae', '0748046883', 'technicien', 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `dossier`
--

CREATE TABLE `dossier` (
  `idDossier` int(11) NOT NULL,
  `debutDossier` date DEFAULT NULL,
  `finDossier` date DEFAULT NULL,
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
  `qteMateriel` int(11) NOT NULL,
  `spec` enum('standard','parabole','poteau') DEFAULT NULL,
  `projetConcerne` int(11) NOT NULL DEFAULT 1,
  `commis` int(11) NOT NULL DEFAULT 1,
  `equipe` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `dossier`
--

INSERT INTO `dossier` (`idDossier`, `debutDossier`, `finDossier`, `enregistrementDossier`, `descriptif`, `statutDossier`, `nomClient`, `numeroClient`, `emailClient`, `typeDeMaison`, `villeDistrict`, `commune`, `zone`, `qteMateriel`, `spec`, `projetConcerne`, `commis`, `equipe`) VALUES
(0, NULL, NULL, '2021-07-14 09:52:07', '', 'en cours', '', '', '', '', '', '', '', 0, 'poteau', 1, 1, 1),
(555567, NULL, NULL, '2021-07-14 15:36:46', '', 'en cours', 'tata', '58303948', '', '', '', '', '', 0, NULL, 3, 1, 1),
(749833, '2021-07-15', '2021-07-16', '2021-07-14 11:29:49', 'terminer', 'valide', 'TOTO', '67828393903', 'toto@gmail.com', '', '', '', '', 0, 'parabole', 3, 1, 1),
(970830, '2021-07-14', NULL, '2021-07-14 16:19:15', '', 'en cours', 'UIUR', '38402002', '', '', '', '', '', 0, 'poteau', 3, 1, 1),
(986542, NULL, NULL, '2021-07-14 09:59:50', '', 'en cours', 'LUPINE', '0123456789', '', '', '', '', '', 0, 'parabole', 2, 1, 1),
(999999, '2021-07-14', NULL, '2021-07-14 18:49:30', '', 'en cours', 'JEAN', '0565478321', '', '', '', '', '', 0, 'poteau', 3, 1, 1),
(4759473, NULL, NULL, '2021-07-14 10:28:33', '', 'en cours', 'LOLO', '0123456789', '', '', '', '', '', 0, 'poteau', 2, 1, 1),
(6563883, '2021-07-14', NULL, '2021-07-14 18:43:01', '', 'en cours', 'LOLITA', '0565478321', '', '', '', '', '', 0, 'poteau', 4, 1, 1),
(123345678, '2021-07-14', '2021-07-15', '2021-07-14 09:52:03', '', 'en cours', 'LUPIN', '0748046883', '', '', '', '', '', 0, 'poteau', 3, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `equipe`
--

CREATE TABLE `equipe` (
  `idEquipe` int(11) NOT NULL,
  `nomEquipe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `equipe`
--

INSERT INTO `equipe` (`idEquipe`, `nomEquipe`) VALUES
(1, 'Equipe A'),
(2, 'Equipe B');

-- --------------------------------------------------------

--
-- Structure de la table `etape`
--

CREATE TABLE `etape` (
  `idEtape` int(11) NOT NULL,
  `nomEtape` varchar(255) NOT NULL,
  `statutEtape` enum('pas encore commencer','en cours','valide') NOT NULL,
  `debutEtape` date DEFAULT NULL,
  `finEtape` date DEFAULT NULL,
  `ordre` int(11) NOT NULL,
  `doss` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `etape`
--

INSERT INTO `etape` (`idEtape`, `nomEtape`, `statutEtape`, `debutEtape`, `finEtape`, `ordre`, `doss`) VALUES
(95, 'ETUDE', 'valide', NULL, '2021-07-14', 0, 123345678),
(96, 'RECEPTION DE RESSOURCES', 'valide', NULL, '2021-07-14', 0, 123345678),
(97, 'IMPLANTATION DE POTEAUX', 'pas encore commencer', NULL, NULL, 0, 123345678),
(98, 'CABLAGE', 'valide', NULL, '2021-07-14', 0, 123345678),
(99, 'RACCORDEMENT', 'valide', NULL, '2021-07-14', 0, 123345678),
(100, 'CONFIGURATION', 'valide', NULL, '2021-07-14', 0, 123345678),
(101, 'RECU', 'valide', NULL, '2021-07-14', 0, 123345678),
(102, 'ETUDE', 'pas encore commencer', NULL, NULL, 0, 986542),
(103, 'RECEPTION DE RESSOURCES', 'pas encore commencer', NULL, NULL, 0, 986542),
(106, 'IMPLANTATION DE POTEAUX', 'pas encore commencer', NULL, NULL, 0, 986542),
(107, 'CABLAGE', 'pas encore commencer', NULL, NULL, 0, 986542),
(108, 'RACCORDEMENT', 'pas encore commencer', NULL, NULL, 0, 986542),
(109, 'CONFIGURATION', 'pas encore commencer', NULL, NULL, 0, 986542),
(110, 'RECU', 'pas encore commencer', NULL, NULL, 0, 986542),
(111, 'ETUDE', 'pas encore commencer', NULL, NULL, 0, 4759473),
(112, 'RECEPTION DE RESSOURCES', 'pas encore commencer', NULL, NULL, 0, 4759473),
(113, 'IMPLANTATION DE POTEAUX', 'pas encore commencer', NULL, NULL, 0, 4759473),
(114, 'CABLAGE', 'pas encore commencer', NULL, NULL, 0, 4759473),
(115, 'RACCORDEMENT', 'pas encore commencer', NULL, NULL, 0, 4759473),
(116, 'CONFIGURATION', 'pas encore commencer', NULL, NULL, 0, 4759473),
(117, 'RECU', 'pas encore commencer', NULL, NULL, 0, 4759473),
(118, 'ETUDE', 'valide', '2021-07-15', '2021-07-15', 0, 749833),
(119, 'RECEPTION DE RESSOURCES', 'valide', NULL, '2021-07-16', 0, 749833),
(120, 'CABLAGE', 'en cours', NULL, NULL, 0, 749833),
(121, 'RACCORDEMENT', 'en cours', NULL, NULL, 0, 749833),
(122, 'CONFIGURATION', 'en cours', NULL, NULL, 0, 749833),
(123, 'RECU', 'en cours', NULL, NULL, 0, 749833),
(130, 'ETUDE', 'pas encore commencer', NULL, NULL, 1, 555567),
(131, 'ETUDE', 'pas encore commencer', NULL, NULL, 1, 970830),
(132, 'CABLAGE', 'pas encore commencer', NULL, NULL, 2, 970830),
(133, 'ETUDE', 'valide', NULL, '2021-07-14', 1, 6563883),
(134, 'RECEPTION DE RESSOURCES', 'en cours', NULL, NULL, 2, 6563883),
(135, 'IMPLANTATION DE POTEAUX', 'pas encore commencer', NULL, NULL, 3, 6563883),
(136, 'CABLAGE', 'pas encore commencer', NULL, NULL, 4, 6563883),
(137, 'RACCORDEMENT', 'pas encore commencer', NULL, NULL, 5, 6563883),
(138, 'CONFIGURATION', 'pas encore commencer', NULL, NULL, 6, 6563883),
(139, 'RECU', 'pas encore commencer', NULL, NULL, 7, 6563883),
(140, 'ETUDE', 'valide', NULL, '2021-07-14', 0, 999999),
(141, 'RECEPTION DE RESSOURCES', 'valide', NULL, '2021-07-14', 0, 999999),
(142, 'IMPLANTATION DE POTEAUX', 'pas encore commencer', NULL, NULL, 0, 999999),
(143, 'CABLAGE', 'valide', NULL, '2021-07-14', 0, 999999),
(144, 'RACCORDEMENT', 'valide', NULL, '2021-07-14', 0, 999999),
(145, 'CONFIGURATION', 'valide', NULL, '2021-07-14', 0, 999999),
(146, 'RECU', 'valide', NULL, '2021-07-14', 0, 999999);

-- --------------------------------------------------------

--
-- Structure de la table `etat`
--

CREATE TABLE `etat` (
  `etat` enum('validé','en cours','en attente','reporté','perdu') NOT NULL DEFAULT 'en cours'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `fichier`
--

CREATE TABLE `fichier` (
  `idFichier` int(11) NOT NULL,
  `nomFichier` text NOT NULL,
  `url` varchar(500) NOT NULL,
  `dossier` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `fichier`
--

INSERT INTO `fichier` (`idFichier`, `nomFichier`, `url`, `dossier`) VALUES
(1, 'BOBO', 'media/2020_02_13_23_36_IMG_2283.JPG', 986542),
(2, 'RECU', 'media/2020_02_20_07_46_IMG_2551.JPG', 749833),
(3, 'configuration', 'media/2020_02_13_23_36_IMG_2283.JPG', 749833);

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
(5, 'CLUSTER', 1);

-- --------------------------------------------------------

--
-- Structure de la table `ressource`
--

CREATE TABLE `ressource` (
  `idRessource` int(11) NOT NULL,
  `nomRessource` varchar(255) NOT NULL,
  `modeleRessource` varchar(255) NOT NULL,
  `qte` int(11) NOT NULL,
  `dateObtention` date NOT NULL,
  `dossierConcerne` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ressource`
--

INSERT INTO `ressource` (`idRessource`, `nomRessource`, `modeleRessource`, `qte`, `dateObtention`, `dossierConcerne`) VALUES
(1, 'CABLE FO', '12', 80, '0000-00-00', 749833),
(2, 'CABLE FO', '24', 100, '0000-00-00', 749833),
(3, 'CABLE FO', '48', 100, '0000-00-00', 749833),
(4, 'PARABOLE', 'CANAL', 1, '0000-00-00', 986542);

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
  ADD KEY `service` (`service`),
  ADD KEY `equipe` (`equipe`);

--
-- Index pour la table `dossier`
--
ALTER TABLE `dossier`
  ADD PRIMARY KEY (`idDossier`),
  ADD KEY `projetConcerné` (`projetConcerne`),
  ADD KEY `commis` (`commis`),
  ADD KEY `equipe` (`equipe`);

--
-- Index pour la table `equipe`
--
ALTER TABLE `equipe`
  ADD PRIMARY KEY (`idEquipe`);

--
-- Index pour la table `etape`
--
ALTER TABLE `etape`
  ADD PRIMARY KEY (`idEtape`),
  ADD KEY `doss` (`doss`);

--
-- Index pour la table `etat`
--
ALTER TABLE `etat`
  ADD PRIMARY KEY (`etat`);

--
-- Index pour la table `fichier`
--
ALTER TABLE `fichier`
  ADD PRIMARY KEY (`idFichier`),
  ADD KEY `dossier` (`dossier`);

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
  ADD PRIMARY KEY (`idRessource`),
  ADD KEY `dossier` (`dossierConcerne`);

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
  MODIFY `idCollaborateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `equipe`
--
ALTER TABLE `equipe`
  MODIFY `idEquipe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `etape`
--
ALTER TABLE `etape`
  MODIFY `idEtape` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT pour la table `fichier`
--
ALTER TABLE `fichier`
  MODIFY `idFichier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `projet`
--
ALTER TABLE `projet`
  MODIFY `idProjet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `ressource`
--
ALTER TABLE `ressource`
  MODIFY `idRessource` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `service`
--
ALTER TABLE `service`
  MODIFY `idService` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `dossier`
--
ALTER TABLE `dossier`
  ADD CONSTRAINT `dossier_ibfk_2` FOREIGN KEY (`commis`) REFERENCES `collaborateur` (`idCollaborateur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dossier_ibfk_4` FOREIGN KEY (`projetConcerne`) REFERENCES `projet` (`idProjet`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dossier_ibfk_5` FOREIGN KEY (`equipe`) REFERENCES `equipe` (`idEquipe`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `etape`
--
ALTER TABLE `etape`
  ADD CONSTRAINT `etape_ibfk_1` FOREIGN KEY (`doss`) REFERENCES `dossier` (`idDossier`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `fichier`
--
ALTER TABLE `fichier`
  ADD CONSTRAINT `fichier_ibfk_1` FOREIGN KEY (`dossier`) REFERENCES `dossier` (`idDossier`);

--
-- Contraintes pour la table `ressource`
--
ALTER TABLE `ressource`
  ADD CONSTRAINT `ressource_ibfk_1` FOREIGN KEY (`dossierConcerne`) REFERENCES `dossier` (`idDossier`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
