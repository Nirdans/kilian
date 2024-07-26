-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : sam. 13 mai 2023 à 15:18
-- Version du serveur : 10.4.25-MariaDB
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `kilian`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `visible` int(11) NOT NULL DEFAULT 1,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `visible`, `date`) VALUES
(1, 'admin', 'admin', 1, '2023-05-13 14:13:02');

-- --------------------------------------------------------

--
-- Structure de la table `gestion_roles`
--

CREATE TABLE `gestion_roles` (
  `id` int(11) NOT NULL,
  `admin` int(11) NOT NULL,
  `compte_admin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `gestion_roles`
--

INSERT INTO `gestion_roles` (`id`, `admin`, `compte_admin`) VALUES
(3, 1, 1),
(4, 1, 2),
(5, 1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `historique_connexion`
--

CREATE TABLE `historique_connexion` (
  `id` int(11) NOT NULL,
  `in_out` varchar(255) NOT NULL,
  `admin` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `roles_compte_admin`
--

CREATE TABLE `roles_compte_admin` (
  `id` int(11) NOT NULL,
  `intituler` varchar(255) NOT NULL,
  `admin` int(11) NOT NULL,
  `visible` int(11) NOT NULL DEFAULT 1,
  `page` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `roles_compte_admin`
--

INSERT INTO `roles_compte_admin` (`id`, `intituler`, `admin`, `visible`, `page`) VALUES
(1, 'Gestion des utilisateurs', 1, 1, 'gestion_compte.php'),
(2, 'Attribuer rôle(s)', 1, 1, 'role_user.php'),
(3, 'Historique de connexion', 1, 1, 'historique_connexion.php');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `gestion_roles`
--
ALTER TABLE `gestion_roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin` (`admin`),
  ADD KEY `compte_admin` (`compte_admin`);

--
-- Index pour la table `historique_connexion`
--
ALTER TABLE `historique_connexion`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `roles_compte_admin`
--
ALTER TABLE `roles_compte_admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin` (`admin`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `gestion_roles`
--
ALTER TABLE `gestion_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `historique_connexion`
--
ALTER TABLE `historique_connexion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `roles_compte_admin`
--
ALTER TABLE `roles_compte_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `roles_compte_admin`
--
ALTER TABLE `roles_compte_admin`
  ADD CONSTRAINT `roles_compte_admin_ibfk_1` FOREIGN KEY (`admin`) REFERENCES `admin` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
