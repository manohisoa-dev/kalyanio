-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 05 oct. 2020 à 08:33
-- Version du serveur :  10.3.23-MariaDB
-- Version de PHP : 7.3.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `agnaroc1_kalyanio`
--

-- --------------------------------------------------------

--
-- Structure de la table `fournisseurs`
--

CREATE TABLE `fournisseurs` (
  `id` int(11) NOT NULL,
  `nom` varchar(200) NOT NULL,
  `apropos` text DEFAULT NULL,
  `tel` varchar(20) NOT NULL,
  `mail` varchar(200) DEFAULT NULL,
  `adresse` varchar(200) DEFAULT NULL,
  `ville` varchar(200) DEFAULT NULL,
  `siteweb` varchar(200) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `fournisseurs`
--

INSERT INTO `fournisseurs` (`id`, `nom`, `apropos`, `tel`, `mail`, `adresse`, `ville`, `siteweb`, `facebook`, `created_at`, `updated_at`) VALUES
(1, 'Tsena soamanantombo', 'tsenan\'ny tantsaha', '033 85 968 54', 'tsena@gmail.com', 'Mahamasina', 'Antananarivo', 'aucun', 'aucun', '2020-10-04 20:33:59', '2020-10-04 20:33:59');

-- --------------------------------------------------------

--
-- Structure de la table `ingredient_fournisseurs`
--

CREATE TABLE `ingredient_fournisseurs` (
  `id` int(11) NOT NULL,
  `ingredient_id` int(11) NOT NULL,
  `fournisseur_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ingredient_fournisseurs`
--

INSERT INTO `ingredient_fournisseurs` (`id`, `ingredient_id`, `fournisseur_id`, `created_at`, `updated_at`) VALUES
(1, 5, 1, '2020-10-04 20:34:16', '2020-10-04 20:34:16');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `fournisseurs`
--
ALTER TABLE `fournisseurs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ingredient_fournisseurs`
--
ALTER TABLE `ingredient_fournisseurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `fournisseurs`
--
ALTER TABLE `fournisseurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `ingredient_fournisseurs`
--
ALTER TABLE `ingredient_fournisseurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
