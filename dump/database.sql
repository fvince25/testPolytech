-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 21 avr. 2021 à 08:44
-- Version du serveur :  5.7.26
-- Version de PHP :  7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `test_polytech`
--

CREATE DATABASE IF NOT EXISTS `testpolytech`
/*!40100 DEFAULT CHARACTER SET utf8 */;
USE `testpolytech`;

-- --------------------------------------------------------

--
-- Structure de la table `countries`
--

DROP TABLE IF EXISTS `countries`;
CREATE TABLE IF NOT EXISTS `countries` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `countries`
--

INSERT INTO `countries` (`id`, `name`) VALUES
(4, 'Belgique'),
(2, 'Chine'),
(7, 'Finlande'),
(1, 'France'),
(6, 'Italie'),
(5, 'Pays Bas'),
(3, 'USA');

-- --------------------------------------------------------

--
-- Structure de la table `persons`
--

DROP TABLE IF EXISTS `persons`;
CREATE TABLE IF NOT EXISTS `persons` (
  `uid` varchar(50) NOT NULL,
  `firstName` varchar(200) NOT NULL,
  `lastName` varchar(200) NOT NULL,
  `country_id` smallint(6) NOT NULL,
  PRIMARY KEY (`uid`),
  KEY `country_id` (`country_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `persons`
--

INSERT INTO `persons` (`uid`, `firstName`, `lastName`, `country_id`) VALUES
('5678TYUI90IO', 'Mamadou', 'Diallof', 2),
('607da36bdf671', 'Olivier', 'Tergali', 2),
('607da56900b0c', 'Laurent', 'Manaudou', 1),
('607edbc6c03b7', 'RicRac', 'Mama', 2),
('607edc64030a9', 'tifany', 'Williams', 2),
('607ede1fd3bc9', 'ouragan', 'nino', 1),
('607ee3b80c116', 'Marty', 'Tellor', 5),
('607f0cf54fe44', 'Coralie', 'Bergam', 7);

-- --------------------------------------------------------

--
-- Structure de la table `souscripteur`
--

DROP TABLE IF EXISTS `souscripteur`;
CREATE TABLE IF NOT EXISTS `souscripteur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `nationalite` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `souscripteur`
--

INSERT INTO `souscripteur` (`id`, `prenom`, `nom`, `nationalite`) VALUES
(1, 'toto', 'sousou', 'france'),
(2, 'titi', 'coucou', 'espagne'),
(29, 'eeefffff', 'zzzz', 'italy'),
(30, 'ttzzzz', 'Gougou', 'france'),
(31, 'titi', 'lolo', 'italy'),
(32, 'ertert', 'frerer', 'italy'),
(33, 'aaaaa', 'aaaaa', 'france'),
(34, 'zzzz', 'zzzz', 'autre'),
(35, 'aeaze', 'azeaze', 'autre'),
(36, 'dsfsdf', 'dddqsd', 'espagne'),
(37, 'qsqsd', 'xqsxq', 'italy');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `uid` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `email` varchar(256) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `firstName` varchar(256) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `lastName` varchar(256) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(1024) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`uid`, `email`, `firstName`, `lastName`, `password`) VALUES
('607e9c43b8bd9', 'aa@aa.fr', 'zazaz', 'zizi', '$2y$10$te5tTWulI/Qdt/k4UBljrOZ8kSPBRxZCkyR8.8f5MZOwAdxVmyAni'),
('607ea4792b1e4', 'bb@bb.fr', 'Loulou', 'Didi', '$2y$10$xn4trJGqVHzHrj60nAnLM.iE6.FoOGTJ7F0p7FnDfDAq0adt/EmKS'),
('607ee5aeab4f2', 'andre@andre.fr', 'Anfré', 'Malabar', '$2y$10$uZW7ULyyy9OspEQKKkVG0uElfQXFw0Yr6xU9FFgfCFe5TRu7.4h8G'),
('607ee5f5e6fb3', 'andre1@andre1.fr', 'Anfré', 'Malabar', '$2y$10$ZnPkvMYUT/4j70i9R01IJ.PZ9S7KlVBPzmu34f/LN.TvvXHUm6WGy'),
('607ee67c99dad', 'A@a.fr', 'Tocard', 'Libon', '$2y$10$Zry7tcWC6fhMoZykhF0F5eCGtcOIC8BscWLfWokyIY3RIwA3TRNbe'),
('607f438362989', 'david@vincent.fr', 'David', 'Vincent', '$2y$10$V7qBWooZWN9.D6cCT3dnCOv1YKV2LbBQClQb3JH3edpKnYjlb7kuO'),
('607f448db142b', 'paul@martin.fr', 'Paul', 'Martin', '$2y$10$i0BFOTNRwnStqXXdGfeTo.KHg5lOY4pYtrNOeXVId1TWH/fgHR/P6'),
('607f44d3c19d9', 'martin@paul.fr', 'martin', 'Paul', '$2y$10$KL7xurSNcd79MmdhwWQRHeNyCiH2dabJT0ncX/nFh2L2k678x9vke');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `persons`
--
ALTER TABLE `persons`
  ADD CONSTRAINT `persons_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
