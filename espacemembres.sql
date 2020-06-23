-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 23 juin 2020 à 15:35
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `espacemembres`
--

-- --------------------------------------------------------

--
-- Structure de la table `chat`
--

CREATE TABLE `chat` (
  `ID` int(11) NOT NULL,
  `pseudo` varchar(20) NOT NULL,
  `message` varchar(350) NOT NULL,
  `date_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `chat`
--

INSERT INTO `chat` (`ID`, `pseudo`, `message`, `date_time`) VALUES
(1, 'staline', 'Je test', '2020-02-27 13:05:19'),
(2, 'NEW', 'testtroll', '2020-06-23 09:40:28'),
(3, 'NEW', 'le chat marche', '2020-06-23 09:48:01'),
(4, 'NEW', 'Bonjour le chat', '2020-06-23 09:56:12'),
(5, 'NEW', 'Bonjour le chat', '2020-06-23 09:57:18'),
(6, 'NEW', 'Bonjour le chat', '2020-06-23 09:57:40'),
(7, 'NEW', 'Cette fois ça marche', '2020-06-23 09:57:50'),
(8, 'NEW', 'Cette fois ça marche', '2020-06-23 10:03:55'),
(9, 'teste', 'ça marche niquel', '2020-06-23 10:46:36'),
(10, 'zapata', 'bah oui ça marche', '2020-06-23 11:07:11'),
(11, 'zapata', 'bah oui ça marche', '2020-06-23 11:21:48');

-- --------------------------------------------------------

--
-- Structure de la table `donneesmembre`
--

CREATE TABLE `donneesmembre` (
  `ID` int(11) NOT NULL,
  `adresse` varchar(150) NOT NULL,
  `téléphone` int(100) NOT NULL,
  `metier` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

CREATE TABLE `groupe` (
  `id` int(11) NOT NULL,
  `statut` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `livredor`
--

CREATE TABLE `livredor` (
  `ID` int(11) NOT NULL,
  `pseudo` varchar(30) NOT NULL,
  `post` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

CREATE TABLE `membres` (
  `ID` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_inscription` date NOT NULL,
  `statut` int(11) NOT NULL DEFAULT 0,
  `ID_groupe` int(11) NOT NULL,
  `avatar` varchar(150) NOT NULL DEFAULT 'logoEthicode.png'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`ID`, `pseudo`, `pass`, `email`, `date_inscription`, `statut`, `ID_groupe`, `avatar`) VALUES
(1, 'trolleur', 'pol', 'trolleurhotmail.com', '2020-01-26', 0, 0, 'logoEthicode.png'),
(2, 'gaspard', 'pol', 'trolleur@hotmail.com', '2020-01-26', 0, 0, 'logoEthicode.png'),
(8, 'staline', 'pol', 'staline@moscou.com', '2020-01-28', 0, 3, 'logoEthicode.png'),
(9, 'salazar', 'pol', 'salazar@portugal.com', '2020-01-28', 0, 3, 'logoEthicode.png'),
(10, 'edouard', 'pol', 'edouard@gmail.com', '2020-01-28', 0, 4, 'logoEthicode.png'),
(11, 'napoleon', 'pol', 'napoleon@gmail.fr', '2020-01-28', 0, 3, 'logoEthicode.png'),
(28, 'fabrice', '$2y$10$X2TcrdD/scMqA4i1bzM7LuAHMaYqEohgGsv6tE3BV2T5CGvQ.OIou', 'fabrice@hotmail.com', '2020-02-07', 0, 1, 'logoEthicode.png'),
(20, 'gabriel', 'pol', 'gaby@hotmail.com', '2020-01-30', 0, 1, 'logoEthicode.png'),
(26, 'morgane', '$2y$10$rPK9aqM7PHrV1k.Y3V9AIO15Zl/ScRaSPHHenZxjQxiN9FBf02/s.', 'morg@troll.com', '2020-01-31', 0, 1, 'logoEthicode.png'),
(65, 'zapata', '$2y$10$bNB9Rfx6stEGU0TGqO9R2umaoDDyWbwAcZFZ/lTiZQm3SHxSy1mKe', 'zapata@zapatest.fr', '2020-06-23', 0, 3, '65.jpg'),
(64, 'NEW', '$2y$10$4V0THi9uvreaWrjl2bjqr.WSCOUCCZGwC49UHbl3N4iudwlCiC1wW', 'pol@pol.fr', '2020-06-23', 0, 1, '64.png'),
(63, 'teste', 'polpol', 'troll@test.fr', '2020-06-23', 0, 1, '63.png');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `donneesmembre`
--
ALTER TABLE `donneesmembre`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `groupe`
--
ALTER TABLE `groupe`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `livredor`
--
ALTER TABLE `livredor`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `membres`
--
ALTER TABLE `membres`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `chat`
--
ALTER TABLE `chat`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `donneesmembre`
--
ALTER TABLE `donneesmembre`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `groupe`
--
ALTER TABLE `groupe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `livredor`
--
ALTER TABLE `livredor`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `membres`
--
ALTER TABLE `membres`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
