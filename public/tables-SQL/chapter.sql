-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  Dim 17 nov. 2019 à 18:08
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
-- Structure de la table `chapter`
--

CREATE TABLE `chapter` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `category_id` int(11) NOT NULL,
  `graph_title` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `graph_namex` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `graph_namey` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `graph_colorone` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `graph_type` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `graph_value` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `graph_subtitle` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `graph_urljson` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `graph_csvurl` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `graph_csvfilename` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `graph_csvtextdatas` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `graph_arrayjson` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `graph_seriesnamejson` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `graph_urlapi` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `graph_apifilters` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `chapter`
--

INSERT INTO `chapter` (`id`, `title`, `content`, `image`, `created_at`, `category_id`, `graph_title`, `graph_namex`, `graph_namey`, `graph_colorone`, `graph_type`, `graph_value`, `graph_subtitle`, `graph_urljson`, `graph_csvurl`, `graph_csvfilename`, `graph_csvtextdatas`, `graph_arrayjson`, `graph_seriesnamejson`, `graph_urlapi`, `graph_apifilters`) VALUES
(1, 'Article avec jeux de couleurs', 'Lorem Ipsum', 'https://3.bp.blogspot.com/-Mt5fcfICh0s/XcSeGi5G5AI/AAAAAAAAA9c/Cef7M8EHtGUc_Jcz5bp5nADgve6Du38ZQCLcBGAsYHQ/s1600/background2.jpg', '2019-11-06 12:36:29', 2, 'Title Billy', 'Billy nameX', 'Billy nameY', 'coloration_2', 'column', '$ dollars', 'Billy subtitle', '/symfovue14/public/csv_files/demoJSON4.json', 'http://localhost/symfovue14/public/csv_files/emissionTest.csv', 'emissionTest', 'City name;Emissions (tCO2-eq)\r\nBatangas;457288.0\r\nBarreiro;290849.0\r\nBenicia;688706.0\r\nBelo Horizonte;3241713.0\r\nBasel;1105753.0', '[\r\n[63934, 72503, 77177, 89658, 107031, 209931, 157133, 164175],\r\n[64916, 24064, 29742, 29851, 32490, 30282, 38121, 40434],\r\n[11744, 17722, 16005, 19771, 20185, 24377, 32147, 39387],\r\n[null, null, 7988, 12169, 15112, 22452, 34400, 34227],\r\n[62908, 5948, 8105, 11248, 8989, 11816, 18274, 18111],\r\n[61908, 4948, 7105, 10248, 6989, 10816, 17274, 16111]\r\n]', '[\r\n[\'Peugeot\'],\r\n[\'Citroen\'],\r\n[\'Renault\'],\r\n[\'Ferrari\'],\r\n[\'Porsche\'],\r\n[\'Ford\'],\r\n]', NULL, NULL),
,
,
;


--
-- Index pour les tables déchargées
--

--
-- Index pour la table `chapter`
--
ALTER TABLE `chapter`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_F981B52E12469DE2` (`category_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `chapter`
--
ALTER TABLE `chapter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `chapter`
--
ALTER TABLE `chapter`
  ADD CONSTRAINT `FK_F981B52E12469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
