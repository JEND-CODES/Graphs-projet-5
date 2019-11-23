-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  Dim 17 nov. 2019 à 18:07
-- Version du serveur :  10.3.16-MariaDB
-- Version de PHP :  7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet5`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `title`, `description`) VALUES
(1, 'Actualités', NULL),
(2, 'Politique', NULL),
(3, 'Environnement', NULL),
(4, 'Débats', NULL),
(5, 'Planète', NULL),
(6, 'Documentaires', NULL),
(7, 'Sciences', NULL),
(8, 'Techniques', NULL),
(9, 'Arts', NULL),
(10, 'Culture', NULL),
(11, 'Energie', NULL),
(12, 'Education', NULL),
(13, 'Economie', NULL),
(14, 'Géopolitique', NULL),
(15, 'Pollution', NULL),
(16, 'Climat', NULL),
(17, 'Biodiversité', NULL),
(18, 'Agriculture', NULL),
(19, 'Alimentation', NULL),
(20, 'Ecologie', NULL),
(21, 'Santé', NULL),
(22, 'Société', NULL),
(23, 'Sport', NULL),
(25, 'Cinéma', NULL),
(26, 'Journalisme', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
