-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 27 mai 2020 à 16:52
-- Version du serveur :  5.7.17
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `sudoku`
--

-- --------------------------------------------------------

--
-- Structure de la table `data`
--

CREATE TABLE `data` (
  `Login` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Time` int(11) NOT NULL,
  `Level` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `data`
--

INSERT INTO `data` (`Login`, `Time`, `Level`) VALUES
('Norgh', 364, 'Beginner'),
('Norgh', 728, 'Medium'),
('Norgh', 9624, 'Expert'),
('Norgh', 604, 'Medium'),
('Norgh', 485, 'Beginner'),
('Norgh', 9692, 'Expert'),
('Norgh', 9056, 'Expert'),
('Norgh', 3013, 'Expert'),
('Norgh', 7815, 'Expert'),
('Norgh', 4215, 'Expert'),
('Norgh', 796, 'Medium'),
('Norgh', 364, 'Beginner'),
('Norgh', 4219, 'Expert'),
('Norgh', 3784, 'Expert'),
('Norgh', 616, 'Medium'),
('Norgh', 610, 'Medium'),
('Norgh', 17, 'Beginner');

-- --------------------------------------------------------

--
-- Structure de la table `editor`
--

CREATE TABLE `editor` (
  `Login` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Grid` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `editor`
--

INSERT INTO `editor` (`Login`, `Name`, `Grid`) VALUES
('Norgh', 'Testeuh', '124396857000000000000000000000010000000020000000030000000040000000050000000060000'),
('Norgh', 'Test...', '123456987000000000000000000000000000000000000000000000000000000000000000000000000');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `Nickname` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Login` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`Nickname`, `Login`, `Password`) VALUES
('Norgh', 'Norgh', '$2y$10$ZkQ4eUUrM3QOOqikYmwgpuAJVpSArN8b3b9Y.V0vVGR90eCDyP0Za');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
