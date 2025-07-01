-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 10 juin 2025 à 21:06
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet_web_de_con_la`
--

-- --------------------------------------------------------

--
-- Structure de la table `bibliotheques`
--

CREATE TABLE `bibliotheques` (
  `id` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_livre` int(11) NOT NULL,
  `date_ajout` date DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `critiques`
--

CREATE TABLE `critiques` (
  `id` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_livre` int(11) NOT NULL,
  `note` int(11) DEFAULT NULL CHECK (`note` between 0 and 5),
  `commentaire` text DEFAULT NULL,
  `date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `livres`
--

CREATE TABLE `livres` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `anne` int(11) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `couverture` varchar(255) NOT NULL,
  `resumer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mdp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `bibliotheques`
--
ALTER TABLE `bibliotheques`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_utilisateur` (`id_utilisateur`),
  ADD KEY `id_livre` (`id_livre`);

--
-- Index pour la table `critiques`
--
ALTER TABLE `critiques`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_utilisateur` (`id_utilisateur`),
  ADD KEY `id_livre` (`id_livre`);

--
-- Index pour la table `livres`
--
ALTER TABLE `livres`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `bibliotheques`
--
ALTER TABLE `bibliotheques`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `critiques`
--
ALTER TABLE `critiques`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `livres`
--
ALTER TABLE `livres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `bibliotheques`
--
ALTER TABLE `bibliotheques`
  ADD CONSTRAINT `bibliotheques_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id`),
  ADD CONSTRAINT `bibliotheques_ibfk_2` FOREIGN KEY (`id_livre`) REFERENCES `livres` (`id`);

--
-- Contraintes pour la table `critiques`
--
ALTER TABLE `critiques`
  ADD CONSTRAINT `critiques_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id`),
  ADD CONSTRAINT `critiques_ibfk_2` FOREIGN KEY (`id_livre`) REFERENCES `livres` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
