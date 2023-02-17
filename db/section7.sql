-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 18 fév. 2023 à 00:35
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `section7`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `mail` varchar(30) NOT NULL,
  `password` varchar(10) NOT NULL,
  `date_creation` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `mail`, `password`, `date_creation`) VALUES
(1, 'section7@gmail.com', 'section7', '2023-02-15 03:04:09');

-- --------------------------------------------------------

--
-- Structure de la table `connexion`
--

CREATE TABLE `connexion` (
  `id_c` int(11) NOT NULL,
  `mail` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `id_member` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `connexion`
--

INSERT INTO `connexion` (`id_c`, `mail`, `password`, `id_member`) VALUES
(1, 'alfousseni@gmail.com', 'azerty', 1),
(2, 'alfousseni@gmail.com', 'azerty', 2),
(5, 'cdwmc@wm.com', 'azerty', 5),
(6, 'cdwmc@wm.com', 'azerty', 6);

-- --------------------------------------------------------

--
-- Structure de la table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `mail` varchar(30) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `dev_cred` int(11) NOT NULL,
  `grade` varchar(30) NOT NULL,
  `Recompenses` text NOT NULL,
  `github` text NOT NULL,
  `tel` int(11) NOT NULL,
  `country` varchar(30) NOT NULL,
  `Adresse` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `dates_accession` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `members`
--

INSERT INTO `members` (`id`, `mail`, `user_name`, `dev_cred`, `grade`, `Recompenses`, `github`, `tel`, `country`, `Adresse`, `password`, `dates_accession`) VALUES
(1, 'alfousseni@gmail.com', 'AlfTech', 100, 'Soldat', ',LEGION D\'HONNEURS,LEGION D\'HONNEURS', 'https://github.com/Alfousseni', 2147483647, 'SENEGAL', 'DAKAR', 'azerty', '2023-02-17 22:52:35'),
(2, 'alfousseni@gmail.com', 'AlfTech', 100, 'Soldat', ',LEGION D\'HONNEURS,LEGION D\'HONNEURS', 'https://github.com/Alfousseni', 2147483647, 'SENEGAL', 'DAKAR', 'azerty', '2023-02-17 22:54:34'),
(5, 'cdwmc@wm.com', 'admin@alfousseni.com', 0, 'Soldat', '', 'https://learn.microsoft.com/fr-fr/visualstudio/ide/reference/rename?view=vs-2022', 0, 'ddlmw', 'wc', 'azerty', '2023-02-17 22:57:58'),
(6, 'cdwmc@wm.com', 'admin@alfousseni.com', 0, 'Soldat', '', 'https://learn.microsoft.com/fr-fr/visualstudio/ide/reference/rename?view=vs-2022', 0, 'ddlmw', 'wc', 'azerty', '2023-02-17 22:58:22');

-- --------------------------------------------------------

--
-- Structure de la table `missions`
--

CREATE TABLE `missions` (
  `mission_id` int(11) NOT NULL,
  `wording` varchar(30) NOT NULL,
  `instruction` text NOT NULL,
  `devcred` int(11) NOT NULL,
  `date_creation` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `missions`
--

INSERT INTO `missions` (`mission_id`, `wording`, `instruction`, `devcred`, `date_creation`) VALUES
(1, 'drapaux', 'effectuer un jeux de drapaux', 100, '2023-02-15 02:42:51'),
(2, 'gestionnaire de section7', 'Objectif : Mettre en place un système efficace pour suivre les missions de la Section 7 et enregistrer les contributions de chaque membre de la communauté.\r\n\r\nDéveloppement d\'un site / application / logiciel : Ce système sera développé sous forme de site / application / logiciel qui permettra de répertorier les missions au fur et à mesure de leur arrivée. Il sera également possible de suivre les liens vers les différents repositories GitHub des participants.\r\n\r\nListe des préceptes de la Section 7 : La base de données inclura également une liste des préceptes de la Section 7, ce qui permettra aux membres de la communauté de s\'y référer en tout temps.\r\n\r\nDesign propre : Le site / application / logiciel sera conçu de manière claire et attrayante, afin de permettre une utilisation facile et intuitive.\r\n\r\nPortfolio de la Section 7 : Ce projet servira de portfolio pour la Section 7 et de vitrine pour les contributions de chaque membre. Il permettra également de montrer les réalisations de la communauté à l\'extérieur.\r\nFonctionnalités++\r\nToutes les fonctionnalités supplémentaires, telles que l\'authentification, le blog, seront appréciées et potentiellement décorées.\r\nDébriefing de la mission\r\nDimanche 19 Février 2023 a 18h sur TikTok et Twitch', 100, '2023-02-16 01:18:41'),
(4, 'Algorithmique', 'faites un algorithme', 120, '2023-02-18 00:08:23'),
(5, 'Algorithmique', 'faites un algorithme', 120, '2023-02-18 00:08:37');

-- --------------------------------------------------------

--
-- Structure de la table `realisations`
--

CREATE TABLE `realisations` (
  `id_realisation` int(11) NOT NULL,
  `id_membre` int(11) NOT NULL,
  `id_mission` int(11) NOT NULL,
  `date_realisation` datetime NOT NULL,
  `github_project` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `realisations`
--

INSERT INTO `realisations` (`id_realisation`, `id_membre`, `id_mission`, `date_realisation`, `github_project`) VALUES
(1, 1, 2, '2023-02-17 23:04:09', 'https://github.com/Alfousseni/section7.git'),
(2, 1, 1, '2023-02-17 23:07:23', 'https://learn.microsoft.com/fr-fr/visualstudio/ide/reference/rename?vi'),
(3, 1, 1, '2023-02-17 23:08:03', 'https://learn.microsoft.com/fr-fr/visualstudio/ide/reference/rename?vi'),
(4, 1, 1, '2023-02-17 23:08:12', 'https://learn.microsoft.com/fr-fr/visualstudio/ide/reference/rename?vi'),
(5, 1, 1, '2023-02-17 23:09:17', 'https://learn.microsoft.com/fr-fr/visualstudio/ide/reference/rename?vi');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `connexion`
--
ALTER TABLE `connexion`
  ADD PRIMARY KEY (`id_c`),
  ADD KEY `id_member` (`id_member`);

--
-- Index pour la table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `missions`
--
ALTER TABLE `missions`
  ADD PRIMARY KEY (`mission_id`);

--
-- Index pour la table `realisations`
--
ALTER TABLE `realisations`
  ADD PRIMARY KEY (`id_realisation`),
  ADD KEY `realisations_ibfk_1` (`id_membre`),
  ADD KEY `realisations_ibfk_2` (`id_mission`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `connexion`
--
ALTER TABLE `connexion`
  MODIFY `id_c` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `missions`
--
ALTER TABLE `missions`
  MODIFY `mission_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `realisations`
--
ALTER TABLE `realisations`
  MODIFY `id_realisation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `connexion`
--
ALTER TABLE `connexion`
  ADD CONSTRAINT `connexion_ibfk_1` FOREIGN KEY (`id_member`) REFERENCES `members` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `realisations`
--
ALTER TABLE `realisations`
  ADD CONSTRAINT `realisations_ibfk_1` FOREIGN KEY (`id_membre`) REFERENCES `members` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `realisations_ibfk_2` FOREIGN KEY (`id_mission`) REFERENCES `missions` (`mission_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
