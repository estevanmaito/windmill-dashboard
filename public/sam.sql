-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 07 juil. 2023 à 23:06
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
  `id` int NOT NULL,
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
  `id` int NOT NULL,
  `name` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `id` int NOT NULL,
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
  `id` int NOT NULL,
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
  `id` int NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_type_id` int NOT NULL,
  `location_id` int NOT NULL,
  `item_location` text NOT NULL,
  `description` text NOT NULL,
  `owner_id` int NOT NULL,
  `price_per_unit` decimal(8,2) NOT NULL,
  `unit_id` int NOT NULL,
  `avaible` blob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_item_type_id` (`item_type_id`),
  KEY `fk_location_id` (`location_id`),
  KEY `fk_owner_id` (`owner_id`),
  KEY `fk_unit_id` (`unit_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `item_leased`
--

DROP TABLE IF EXISTS `item_leased`;
CREATE TABLE IF NOT EXISTS `item_leased` (
  `id` int NOT NULL,
  `item_id` int NOT NULL,
  `renter_id` int NOT NULL,
  `time_from` timestamp NOT NULL,
  `time_to` timestamp NOT NULL,
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `item_type`
--

DROP TABLE IF EXISTS `item_type`;
CREATE TABLE IF NOT EXISTS `item_type` (
  `id` int NOT NULL,
  `type_name` varchar(64) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `location`
--

DROP TABLE IF EXISTS `location`;
CREATE TABLE IF NOT EXISTS `location` (
  `id` int NOT NULL,
  `postal_code` varchar(16) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `country_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `country_id` (`country_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `location`
--

INSERT INTO `location` (`id`, `postal_code`, `name`, `description`, `country_id`) VALUES
(4, '46546', 'yrec', 'scfehg, qsdfg', 1);

-- --------------------------------------------------------

--
-- Structure de la table `unit`
--

DROP TABLE IF EXISTS `unit`;
CREATE TABLE IF NOT EXISTS `unit` (
  `id` int NOT NULL,
  `unit_name` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user_account`
--

DROP TABLE IF EXISTS `user_account`;
CREATE TABLE IF NOT EXISTS `user_account` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `location_id` int NOT NULL,
  `location_details` text NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `registration_time` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  KEY `location_id` (`location_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `user_account`
--

INSERT INTO `user_account` (`id`, `username`, `password`, `location_id`, `location_details`, `phone`, `mobile`, `email`, `registration_time`) VALUES
(1, 'yousra', 'gghhyygg', 4, 'something.................', '0694268432', '0654471147', 'yousra@gmail.com', '2023-07-04 11:56:48'),
(2, 'tag', 'motdepasse', 4, '<rgb>', '060904474', '05781625', 'slssssss@gmail.com', '2023-07-04 13:16:02'),
(3, 'may', 'password', 1, 'Some location details', '067829826', 'may@gmail.com', '2023-07-05 14:11:20', '0000-00-00 00:00:00'),
(5, 'new_user', 'password123', 1, 'New user location details', '06781826', 'newUser@gmail.com', '2023-07-05 21:17:35', '0000-00-00 00:00:00'),
(6, 'yousrabr', 'dfg', 5, 'new loc details', '0696812339', '0696812339', 'barhmiyousra@gmail.com', '2023-07-06 08:37:43');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
