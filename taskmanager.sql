-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 09 juil. 2021 à 00:12
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
  `spec` enum('standard','parabole','poteau','') DEFAULT 'standard',
  `projetConcerne` int(11) NOT NULL DEFAULT 1,
  `commis` int(11) NOT NULL DEFAULT 1,
  `equipe` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `dossier`
--

INSERT INTO `dossier` (`idDossier`, `debutDossier`, `finDossier`, `enregistrementDossier`, `descriptif`, `statutDossier`, `nomClient`, `numeroClient`, `emailClient`, `typeDeMaison`, `villeDistrict`, `commune`, `zone`, `qteMateriel`, `spec`, `projetConcerne`, `commis`, `equipe`) VALUES
(9, '0000-00-00', '0000-00-00', '2021-06-25 22:50:04', 'hello\r\n', 'en attente', 'ismo pele', '082669492934', 'rus@gmail.com', 'immeuble', 'DOHa', '', 'A COTE DU PRe', 0, '', 1, 1, 2),
(8463, '2021-07-04', NULL, '2021-07-02 14:11:40', 'bnjur', 'en attente', 'GEORGES', '+225754964957221', 'georges@gmail.com', 'BASSE', 'ELIMA', 'ELIMA', 'ELIMA', 0, '', 2, 2, 1),
(8639, NULL, NULL, '2021-07-08 10:14:36', 'hello', 'en cours', 'JULIEN', '0565478321', 'emil@gmail.cm', 'basse', 'abidjan', 'abobo', 'sagbe', 0, '', 3, 1, 1),
(9695, NULL, NULL, '2021-07-02 14:51:32', 'BONJOUR', 'en attente', 'HILARY', '+225469265935', 'HILA@gmail.com', 'triplex', 'abidjan', 'yop', 'niangon', 0, '', 4, 1, 1),
(9953, NULL, NULL, '2021-07-08 12:10:00', '', 'en cours', 'UZIA', '2721463854', 'ul@gmail.com', '', 'ez', '', '', 0, '', 1, 1, 1),
(26739, NULL, NULL, '2021-07-08 10:34:50', 'hello', 'en cours', 'JULL', '0987654321', 'ope@gmail.cm', 'basse', 'abengourou', 'abengourou', 'abengourou', 0, '', 2, 1, 1),
(56487, NULL, NULL, '2021-07-08 20:16:48', '', 'en cours', 'koukou', '0565478321', '', '', '', '', '', 0, 'standard', 1, 1, 1),
(58434, '2021-07-03', '0000-00-00', '2021-06-22 15:54:12', 'hello MAN', 'valide', 'rahim', '0123456789', 'ra@gmail.com', 'basse', 'abidjan', 'plateau', 'cité administrative', 0, 'standard', 2, 1, 2),
(58435, NULL, NULL, '2021-07-08 10:43:47', '', 'en cours', 'UIJZ', '0123456789', '', '', '', '', '', 0, '', 5, 1, 1),
(65467, '0000-00-00', '0000-00-00', '2021-06-26 11:12:36', 'hello', 'en cours', 'REMI', '2721463854', 'remi@yahou.com', 'triplex', 'abidjan', 'cocody', 'st jean', 0, '', 5, 1, 1),
(74769, NULL, NULL, '2021-07-08 10:21:10', 'hello', 'en cours', 'UIL', '0123456789', 'izz@gmail.com', 'immeuble', 'abengourou', 'abengourou', 'abengourou', 0, '', 2, 1, 1),
(99504, NULL, NULL, '2021-07-08 12:08:31', '', 'en cours', 'UZIA', '2721463854', '', '', '', '', '', 0, '', 2, 1, 1),
(543743, '2021-07-03', '0000-00-00', '2021-06-22 15:55:31', 'HELLO', 'en cours', 'voyons', '0565478321', 'jul@gmail.com', 'DUPLEX', 'YAMOUSSSOUKRO', 'YAMOUSSOUKRO', 'LAC', 0, '', 3, 1, 1),
(849303, NULL, NULL, '2021-07-08 12:17:05', '', 'en cours', 'RUZE', '680958902', '', '', '', '', '', 0, '', 3, 1, 1),
(884044, NULL, NULL, '2021-07-08 12:55:25', '', 'en cours', 'UEOZIZ', '38402002', '', '', '', '', '', 0, '', 2, 1, 1),
(5784749, NULL, NULL, '2021-07-05 12:05:59', 'dossier urgent', 'en cours', 'KOUA', '084562842', 'koua@gmail.com', 'basse', 'ABIDJAN', 'plateau', 'cité administrative', 0, 'standard', 4, 1, 1),
(7123456, '2021-07-05', NULL, '2021-07-05 09:23:39', 'CLIENT DISPONIBLE', 'en attente', 'DJEDJE MOISE', '0565478321', 'MOISE@FIBRE', 'immeuble', 'ABIDJAN', 'cocody', 'cité administrative', 0, 'standard', 3, 1, 1),
(8837302, '2021-07-09', NULL, '2021-07-08 13:46:28', 'hello', 'en cours', 'KONE ismo pele', '0123456789', 'peleforo1999@gmail.com', '', 'DOHA', 'DOHA', '', 0, '', 1, 1, 1);

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
  `statutEtape` enum('en cours','valide') NOT NULL,
  `finEtape` date NOT NULL,
  `doss` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `etape`
--

INSERT INTO `etape` (`idEtape`, `nomEtape`, `statutEtape`, `finEtape`, `doss`) VALUES
(1, 'ETUDE', 'valide', '2021-07-15', 8837302),
(2, 'RECEPTION DE RESSOURCES', 'en cours', '0000-00-00', 8837302),
(3, 'CABLAGE', 'en cours', '0000-00-00', 8837302),
(4, 'RACCORDEMENT', 'valide', '0000-00-00', 8837302),
(5, 'CONFIGURATION', 'en cours', '0000-00-00', 8837302),
(6, 'RECU', '', '0000-00-00', 8837302),
(7, 'ETUDE', 'en cours', '0000-00-00', 56487),
(8, 'RECEPTION DE RESSOURCES', 'valide', '0000-00-00', 56487),
(9, 'CABLAGE', 'valide', '0000-00-00', 56487),
(10, 'RACCORDEMENT', 'valide', '0000-00-00', 56487),
(11, 'CONFIGURATION', 'en cours', '0000-00-00', 56487),
(12, 'RECU', 'en cours', '0000-00-00', 56487);

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
  MODIFY `idEtape` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `projet`
--
ALTER TABLE `projet`
  MODIFY `idProjet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `ressource`
--
ALTER TABLE `ressource`
  MODIFY `idRessource` int(11) NOT NULL AUTO_INCREMENT;

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
-- Contraintes pour la table `ressource`
--
ALTER TABLE `ressource`
  ADD CONSTRAINT `ressource_ibfk_1` FOREIGN KEY (`dossierConcerne`) REFERENCES `dossier` (`idDossier`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
