-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 16 nov. 2022 à 12:35
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `apisama`
--

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20221115120435', '2022-11-15 13:22:51', 5410),
('DoctrineMigrations\\Version20221116094527', '2022-11-16 09:45:36', 2726);

-- --------------------------------------------------------

--
-- Structure de la table `subscribe`
--

DROP TABLE IF EXISTS `subscribe`;
CREATE TABLE IF NOT EXISTS `subscribe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `subscribe`
--

INSERT INTO `subscribe` (`id`, `name`, `type`, `price`) VALUES
(1, 'CANAL+', 'DECOUVERTE', 5000),
(2, 'MALIVISION', 'MALIVISION', 12000),
(3, 'CANAL+', 'DECOUVERTE + CANAL', 15000),
(4, 'HORONYA', 'HORONYA', 15000),
(5, 'MALIVISION', 'MALIVISION + CANAL', 20000),
(6, 'HORONYA', 'VIP HORONYA + CANAL', 25000);

-- --------------------------------------------------------

--
-- Structure de la table `subscribe_option`
--

DROP TABLE IF EXISTS `subscribe_option`;
CREATE TABLE IF NOT EXISTS `subscribe_option` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subscribe_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_45743697C72A4771` (`subscribe_id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `subscribe_option`
--

INSERT INTO `subscribe_option` (`id`, `subscribe_id`, `name`, `price`) VALUES
(1, 1, 'AUCUN', NULL),
(2, 1, 'Adulte', 0),
(3, 1, 'Novelas et A+', 500),
(4, 1, 'ENFANT', 1000),
(5, 1, 'InfoSport+', 1000),
(8, 1, 'Documentaire', 3500),
(9, 1, 'Compl. MALIVISION', 7000),
(11, 1, 'Compl. DCV+CANAL', 10000),
(12, 1, 'Compl. Horonya', 10000),
(13, 1, 'Option CANAL+', 10000),
(14, 1, 'Waati Horonya', 22500),
(15, 2, 'AUCUN', NULL),
(16, 2, 'Adulte', 0),
(17, 2, 'Novelas et A+', 500),
(18, 2, 'Planete+', 1000),
(19, 2, 'InfoSport+', 1000),
(20, 2, 'Compl. Horonya', 3000),
(21, 2, 'Compl. MALIVISION', 8000),
(22, 2, 'Option CANAL+', 10000),
(23, 2, 'Waati Horonya', 22500),
(24, 3, 'AUCUN', NULL),
(25, 3, 'Adulte', 0),
(26, 3, 'Novelas et A+', 500),
(27, 3, 'ENFANT', 1000),
(28, 3, 'InfoSport+', 1000),
(29, 3, 'Documentaire', 3500),
(30, 3, 'Compl. MLV+CANAL', 5000),
(31, 3, 'Waati Horonya', 22500),
(32, 4, 'AUCUN', NULL),
(33, 4, 'Adulte 3 HRV/VIP', 0),
(34, 4, 'Compl. HRN>HRN+CANAL', 10000),
(35, 4, 'Compl. Horonya', 10000),
(36, 4, 'Compl. CANAL+', 10000),
(37, 5, 'AUCUN', NULL),
(38, 5, 'Adulte', 0),
(39, 5, 'Novelas et A+', 500),
(40, 5, 'Planete+', 1000),
(41, 5, 'InfoSport+', 1000),
(42, 5, 'Compl. MLV+CANAL>HRN+CANAL', 5000),
(43, 5, 'Waati Horonya', 22500),
(44, 6, 'AUNCUN', NULL),
(45, 6, 'Adulte', 0);

-- --------------------------------------------------------

--
-- Structure de la table `subscribe_term`
--

DROP TABLE IF EXISTS `subscribe_term`;
CREATE TABLE IF NOT EXISTS `subscribe_term` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subscribe_id` int(11) DEFAULT NULL,
  `term` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_amount` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_12FEAAB5C72A4771` (`subscribe_id`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `subscribe_term`
--

INSERT INTO `subscribe_term` (`id`, `subscribe_id`, `term`, `discount_amount`) VALUES
(1, 1, '1MOIS', NULL),
(2, 1, '2MOIS', NULL),
(3, 1, '3MOIS', 1500),
(4, 1, '4MOIS', 2000),
(5, 1, '5MOIS', 2500),
(6, 1, '6MOIS', 4500),
(7, 1, '7MOIS', 5200),
(8, 1, '8MOIS', 6000),
(9, 1, '9MOIS', 6700),
(10, 1, '10MOIS', 7500),
(11, 1, '11MOIS', 8200),
(12, 1, '12MOIS', 12000),
(13, 2, '1MOIS', NULL),
(14, 2, '2MOIS', NULL),
(15, 2, '3MOIS', 4000),
(16, 2, '4MOIS', 5300),
(17, 2, '5MOIS', 6600),
(18, 2, '6MOIS', 14000),
(19, 2, '7MOIS', 16300),
(20, 2, '8MOIS', 18600),
(21, 2, '9MOIS', 21000),
(22, 2, '10MOIS', 23300),
(23, 2, '11MOIS', 25600),
(24, 2, '12MOIS', 36000),
(25, 3, '1MOIS', NULL),
(26, 3, '2MOIS', NULL),
(27, 3, '3MOIS', 1500),
(28, 3, '4MOIS', 2000),
(29, 3, '5MOIS', 2500),
(30, 3, '6MOIS', 4500),
(31, 3, '7MOIS', 5200),
(32, 3, '8MOIS', 6000),
(33, 3, '9MOIS', 6700),
(34, 3, '10MOIS', 7500),
(35, 3, '11MOIS', 8200),
(36, 3, '12MOIS', 12000),
(37, 4, '1MOIS', NULL),
(38, 4, '2MOIS', NULL),
(39, 4, '3MOIS', 5000),
(40, 4, '4MOIS', 6600),
(41, 4, '5MOIS', 8300),
(42, 4, '6MOIS', 18000),
(43, 4, '7MOIS', 21000),
(44, 4, '8MOIS', 24000),
(45, 4, '9MOIS', 27000),
(46, 4, '10MOIS', 30000),
(47, 4, '11MOIS', 33000),
(48, 4, '12MOIS', 45000),
(49, 5, '1MOIS', NULL),
(50, 5, '2MOIS', NULL),
(51, 5, '3MOIS', NULL),
(52, 5, '4MOIS', NULL),
(53, 5, '5MOIS', NULL),
(54, 5, '6MOIS', NULL),
(55, 5, '7MOIS', NULL),
(56, 5, '8MOIS', NULL),
(57, 5, '9MOIS', NULL),
(58, 5, '10MOIS', NULL),
(59, 5, '11MOIS', NULL),
(60, 5, '12MOIS', NULL),
(61, 6, '1MOIS', NULL),
(62, 6, '2MOIS', NULL),
(63, 6, '3MOIS', 5000),
(64, 6, '4MOIS', 6600),
(65, 6, '5MOIS', 8300),
(66, 6, '6MOIS', 18000),
(67, 6, '7MOIS', 21000),
(68, 6, '8MOIS', 24000),
(69, 6, '9MOIS', 27000),
(70, 6, '10MOIS', 30000),
(71, 6, '11MOIS', 33000),
(72, 6, '12MOIS', 45000);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `subscribe_option`
--
ALTER TABLE `subscribe_option`
  ADD CONSTRAINT `FK_45743697C72A4771` FOREIGN KEY (`subscribe_id`) REFERENCES `subscribe` (`id`);

--
-- Contraintes pour la table `subscribe_term`
--
ALTER TABLE `subscribe_term`
  ADD CONSTRAINT `FK_12FEAAB5C72A4771` FOREIGN KEY (`subscribe_id`) REFERENCES `subscribe` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
