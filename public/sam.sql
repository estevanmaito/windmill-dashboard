-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 18 août 2023 à 15:23
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sam`
--

-- --------------------------------------------------------

--
-- Structure de la table `charge`
--

DROP TABLE IF EXISTS `charge`;
CREATE TABLE IF NOT EXISTS `charge` (
  `id` int NOT NULL AUTO_INCREMENT,
  `unit_id` int NOT NULL,
  `user_id` int NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL,
  `statut` varchar(255) NOT NULL,
  `montant` decimal(8,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_unit_id` (`unit_id`),
  KEY `fk_user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `country`
--

DROP TABLE IF EXISTS `country`;
CREATE TABLE IF NOT EXISTS `country` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `country`
--

INSERT INTO `country` (`id`, `name`) VALUES
(1, 'maroc');

-- --------------------------------------------------------

--
-- Structure de la table `grade`
--

DROP TABLE IF EXISTS `grade`;
CREATE TABLE IF NOT EXISTS `grade` (
  `id` int NOT NULL AUTO_INCREMENT,
  `item_leased_id` int NOT NULL,
  `grade_category_id` int NOT NULL,
  `user_from` int NOT NULL,
  `user_to` int NOT NULL,
  `grade` decimal(3,1) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_item_leased_id` (`item_leased_id`),
  KEY `fk_grade_category_id` (`grade_category_id`),
  KEY `fk_user_from` (`user_from`),
  KEY `fk_user_to` (`user_to`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `grade_category`
--

DROP TABLE IF EXISTS `grade_category`;
CREATE TABLE IF NOT EXISTS `grade_category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category_name` varchar(64) NOT NULL,
  `item_type_id` int NOT NULL,
  `who_grades` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_item_type_id` (`item_type_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE IF NOT EXISTS `item` (
  `id` int NOT NULL AUTO_INCREMENT,
  `item_name` varchar(255) NOT NULL,
  `item_type_id` int NOT NULL,
  `location_id` int NOT NULL,
  `item_location` text NOT NULL,
  `description` text NOT NULL,
  `owner_id` int NOT NULL,
  `price_per_unit` decimal(8,2) NOT NULL,
  `unit_id` int NOT NULL,
  `avaible` blob,
  `titrePropriete` blob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_item_type_id` (`item_type_id`),
  KEY `fk_location_id` (`location_id`),
  KEY `fk_owner_id` (`owner_id`),
  KEY `fk_unit_id` (`unit_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8450 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `item`
--

INSERT INTO `item` (`id`, `item_name`, `item_type_id`, `location_id`, `item_location`, `description`, `owner_id`, `price_per_unit`, `unit_id`, `avaible`, `titrePropriete`) VALUES
(8446, 'immeuble', 1, 5, 'sidi maarouf', 'petite appartement ', 1, '9999.97', 5, '', '');
INSERT INTO `item` (`id`, `item_name`, `item_type_id`, `location_id`, `item_location`, `description`, `owner_id`, `price_per_unit`, `unit_id`, `avaible`, `titrePropriete`) VALUES
(8324, 'bayti', 2, 5, 'salam', 'aaaaeaeeaeea', 29, '10000.00', 4, '');
INSERT INTO `item` (`id`, `item_name`, `item_type_id`, `location_id`, `item_location`, `description`, `owner_id`, `price_per_unit`, `unit_id`, `avaible`, `titrePropriete`) VALUES
(8187, 'yyyyyyy', 2, 4, 'salam', 'uhaGBQ', 23, '5555.00', 5, '', ''),
(8449, 'ddd', 2, 5, 'hau', 'alke', 15, '6564.00', 5, NULL, 0x43617074757265206427c3a96372616e20323032332d30372d3035203130343030312e706e67);

-- --------------------------------------------------------

--
-- Structure de la table `item_leased`
--

DROP TABLE IF EXISTS `item_leased`;
CREATE TABLE IF NOT EXISTS `item_leased` (
  `id` int NOT NULL AUTO_INCREMENT,
  `item_id` int NOT NULL,
  `renter_id` int NOT NULL,
  `time_from` datetime NOT NULL,
  `time_to` datetime NOT NULL,
  `unit_id` int NOT NULL,
  `price_per_unit` decimal(8,2) NOT NULL,
  `discount` decimal(8,2) NOT NULL,
  `fee` decimal(8,2) NOT NULL,
  `price_total` decimal(8,2) NOT NULL,
  `rentier_grade_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  PRIMARY KEY (`id`),
  KEY `fk_item_id` (`item_id`),
  KEY `fk_unit_id` (`unit_id`),
  KEY `fk_renter_id` (`renter_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `item_leased`
--

INSERT INTO `item_leased` (`id`, `item_id`, `renter_id`, `time_from`, `time_to`, `unit_id`, `price_per_unit`, `discount`, `fee`, `price_total`, `rentier_grade_description`) VALUES
(1, 8324, 14, '2023-05-02 11:21:09', '2024-01-04 11:21:09', 5, '9999.00', '200.00', '0.00', '9799.00', 'nice'),
(4, 5, 25, '2023-05-02 11:21:09', '2023-07-31 11:21:09', 4, '2422.00', '200.00', '0.00', '2222.00', 'nice');

-- --------------------------------------------------------

--
-- Structure de la table `item_type`
--

DROP TABLE IF EXISTS `item_type`;
CREATE TABLE IF NOT EXISTS `item_type` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type_name` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `item_type`
--

INSERT INTO `item_type` (`id`, `type_name`) VALUES
(1, 'appartement\r\n'),
(2, 'villa\r\n');

-- --------------------------------------------------------

--
-- Structure de la table `location`
--

DROP TABLE IF EXISTS `location`;
CREATE TABLE IF NOT EXISTS `location` (
  `id` int NOT NULL AUTO_INCREMENT,
  `postal_code` varchar(16) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `country_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `country_id` (`country_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `location`
--

INSERT INTO `location` (`id`, `postal_code`, `name`, `description`, `country_id`) VALUES
(4, '46546', 'oujda', 'scfehg, qsdfg', 1),
(1, '46546', 'essaouira', 'sdftuiogfd', 1),
(5, '11997', 'Casablanca', 'qsrtyuivsddnsduhfuetrg', 1),
(7, '179956', 'Rabat', 'zDJBzjrgz', 1);

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type_role` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id`, `type_role`) VALUES
(1, 'Administrateur'),
(2, 'Propriétaire'),
(3, 'Locataire');

-- --------------------------------------------------------

--
-- Structure de la table `unit`
--

DROP TABLE IF EXISTS `unit`;
CREATE TABLE IF NOT EXISTS `unit` (
  `id` int NOT NULL AUTO_INCREMENT,
  `unit_name` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `unit`
--

INSERT INTO `unit` (`id`, `unit_name`) VALUES
(5, 'sedrtyuikolp'),
(4, 'azerty\r\n');

-- --------------------------------------------------------

--
-- Structure de la table `user_account`
--

DROP TABLE IF EXISTS `user_account`;
CREATE TABLE IF NOT EXISTS `user_account` (
  `id` int NOT NULL AUTO_INCREMENT,
  `role_id` int NOT NULL,
  `location_id` int NOT NULL,
  `username` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(64) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `registration_time` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  KEY `location_id` (`location_id`),
  KEY `fk_role_id` (`role_id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `user_account`
--

INSERT INTO `user_account` (`id`, `role_id`, `location_id`, `username`, `password`, `phone`, `mobile`, `email`, `registration_time`) VALUES
(1, 1, 4, 'yousra', 'gghhyygg', '0694268432', '0654471147', 'yousra@gmail.com', '2023-07-17 10:31:12'),
(16, 2, 1, 'marouane', 'password', '0695173726', '178921548', 'marouane@gmail.com', '2023-05-17 10:31:12'),
(3, 2, 4, 'maha', 'mphus', '0678952134', '0522106644', 'maha@gmail.com', '2023-07-16 11:47:00'),
(19, 2, 5, 'hamza', 'azertuio', '0678995566', '0545123698', 'hamza@gmail.com', '2023-07-17 12:42:11'),
(15, 2, 7, 'simo', 'cggg', '178921548', '178921548', 'simobr100@gmail.com', '2023-07-17 10:31:12'),
(17, 3, 5, 'wissal', 'azerty', '0678963102', '0522361455', 'wissal@gmail.com', '2023-07-17 10:31:12'),
(14, 3, 7, 'simobr05', '44', '0695173726', '0695173726', 'mar@gmail.com', '2023-07-17 10:31:12'),
(18, 3, 4, 'aajli', 'qwerty', '178921548', '178921548', 'ji@h', '2023-07-17 10:31:12'),
(21, 3, 5, 'aajlidcdcd', 'ddcdcdcd', '178921548', '178921548', 'ji@hccs', '2023-06-26 08:50:00'),
(20, 2, 1, 'amin', 'azertyu', '0696812339', '178921548', 'barhmiyousra@gmail.com', '2023-07-17 11:48:35'),
(22, 2, 5, 'boubou', 'gbcvc', '0695173726', '0696812339', 'boubou@gmail.com', '2023-06-27 10:42:00'),
(23, 2, 4, 'chaimaa', 'cc', '178921548', '0696812339', 'chaimaa@gmail.ma', '2023-07-25 10:42:40'),
(29, 2, 5, 'halima', 'boubou', '0645395427', '0500000000', 'halima@gmail.com', '2023-07-28 15:43:00'),
(25, 3, 7, 'sabrina', 'jjjj', '067841288', '0578661598', 'maj@gmail.com', '2023-07-29 16:17:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
