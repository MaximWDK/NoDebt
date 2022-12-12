-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  localhost
-- Généré le :  Lun 23 Mai 2022 à 20:19
-- Version du serveur :  5.7.29
-- Version de PHP :  5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `in21b10116`
--

-- --------------------------------------------------------

--
-- Structure de la table `caracteriser`
--

CREATE TABLE `caracteriser` (
  `did` int(11) NOT NULL,
  `tid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `depense`
--

CREATE TABLE `depense` (
  `did` int(11) NOT NULL,
  `dateHeure` datetime NOT NULL,
  `montant` decimal(15,2) NOT NULL,
  `libelle` varchar(50) NOT NULL,
  `uid` int(11) NOT NULL,
  `gid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `depense`
--

INSERT INTO `depense` (`did`, `dateHeure`, `montant`, `libelle`, `uid`, `gid`) VALUES
(1, '2020-05-05 23:25:00', '25.00', 'Modif', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

CREATE TABLE `facture` (
  `fid` int(11) NOT NULL,
  `scan` varchar(50) DEFAULT NULL,
  `did` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

CREATE TABLE `groupe` (
  `gid` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `devise` varchar(50) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `groupe`
--

INSERT INTO `groupe` (`gid`, `nom`, `devise`, `uid`) VALUES
(1, 'Maxim', '€', 1);

-- --------------------------------------------------------

--
-- Structure de la table `participer`
--

CREATE TABLE `participer` (
  `uid` int(11) NOT NULL,
  `gid` int(11) NOT NULL,
  `estConfirme` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `participer`
--

INSERT INTO `participer` (`uid`, `gid`, `estConfirme`) VALUES
(1, 1, 1),
(2, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `tag`
--

CREATE TABLE `tag` (
  `tid` int(11) NOT NULL,
  `tag` varchar(50) DEFAULT NULL,
  `gid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `courriel` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `motPasse` varchar(300) NOT NULL,
  `estActif` tinyint(1) NOT NULL,
  `pdp` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`uid`, `courriel`, `nom`, `prenom`, `motPasse`, `estActif`, `pdp`) VALUES
(1, 'maxim.leonet@gmail.com', 'Léonet', 'Maxim', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 1, 1),
(2, 'invited.user@gmail.com', 'Invited', 'User', '3b8dc258df46afc7a8de05427473e6cb832da1c34b6cc2bce771f25369441bc9e45cc91241deaf0d604c39421ee579717e365ec99cdba09b2d8b8478e69bb2eb', 1, 1),
(3, 'justineerisium@gmail.com', 'Justine', 'Erisium', 'c5b066e15ce7203b00fd47cdecde15e81cebf88f2324a7c6994b0acf2fc2944462f9ce98ad095887476ce9d490bbddd155e67b45d6eaa3ae4586cefcd14233f8', 1, 1),
(4, 'm.leonet@student.helmo.be', 'Maxim', 'Léonet', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `versement`
--

CREATE TABLE `versement` (
  `uid` int(11) NOT NULL,
  `uid_1` int(11) NOT NULL,
  `gid` int(11) NOT NULL,
  `dateHeure` datetime NOT NULL,
  `montant` decimal(15,2) NOT NULL,
  `estConfirme` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `caracteriser`
--
ALTER TABLE `caracteriser`
  ADD PRIMARY KEY (`did`,`tid`),
  ADD KEY `tid` (`tid`);

--
-- Index pour la table `depense`
--
ALTER TABLE `depense`
  ADD PRIMARY KEY (`did`),
  ADD KEY `uid` (`uid`),
  ADD KEY `gid` (`gid`);

--
-- Index pour la table `facture`
--
ALTER TABLE `facture`
  ADD PRIMARY KEY (`fid`),
  ADD KEY `did` (`did`);

--
-- Index pour la table `groupe`
--
ALTER TABLE `groupe`
  ADD PRIMARY KEY (`gid`),
  ADD KEY `uid` (`uid`);

--
-- Index pour la table `participer`
--
ALTER TABLE `participer`
  ADD PRIMARY KEY (`uid`,`gid`),
  ADD KEY `gid` (`gid`);

--
-- Index pour la table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`tid`),
  ADD KEY `gid` (`gid`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `courriel` (`courriel`);

--
-- Index pour la table `versement`
--
ALTER TABLE `versement`
  ADD PRIMARY KEY (`uid`,`uid_1`,`gid`,`dateHeure`),
  ADD KEY `uid_1` (`uid_1`),
  ADD KEY `gid` (`gid`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `depense`
--
ALTER TABLE `depense`
  MODIFY `did` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `facture`
--
ALTER TABLE `facture`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `groupe`
--
ALTER TABLE `groupe`
  MODIFY `gid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `tag`
--
ALTER TABLE `tag`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `caracteriser`
--
ALTER TABLE `caracteriser`
  ADD CONSTRAINT `caracteriser_ibfk_1` FOREIGN KEY (`did`) REFERENCES `depense` (`did`),
  ADD CONSTRAINT `caracteriser_ibfk_2` FOREIGN KEY (`tid`) REFERENCES `tag` (`tid`);

--
-- Contraintes pour la table `depense`
--
ALTER TABLE `depense`
  ADD CONSTRAINT `depense_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`),
  ADD CONSTRAINT `depense_ibfk_2` FOREIGN KEY (`gid`) REFERENCES `groupe` (`gid`);

--
-- Contraintes pour la table `facture`
--
ALTER TABLE `facture`
  ADD CONSTRAINT `facture_ibfk_1` FOREIGN KEY (`did`) REFERENCES `depense` (`did`);

--
-- Contraintes pour la table `groupe`
--
ALTER TABLE `groupe`
  ADD CONSTRAINT `groupe_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`);

--
-- Contraintes pour la table `participer`
--
ALTER TABLE `participer`
  ADD CONSTRAINT `participer_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`),
  ADD CONSTRAINT `participer_ibfk_2` FOREIGN KEY (`gid`) REFERENCES `groupe` (`gid`);

--
-- Contraintes pour la table `tag`
--
ALTER TABLE `tag`
  ADD CONSTRAINT `tag_ibfk_1` FOREIGN KEY (`gid`) REFERENCES `groupe` (`gid`);

--
-- Contraintes pour la table `versement`
--
ALTER TABLE `versement`
  ADD CONSTRAINT `versement_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`),
  ADD CONSTRAINT `versement_ibfk_2` FOREIGN KEY (`uid_1`) REFERENCES `users` (`uid`),
  ADD CONSTRAINT `versement_ibfk_3` FOREIGN KEY (`gid`) REFERENCES `groupe` (`gid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
