-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 19 mars 2018 à 00:13
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
-- Base de données :  `codeopensource`
--

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `token` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'modo'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `token`, `role`) VALUES
(4, 'Code@Open Source', 'code@opensource', '279a4cf6d7f8da1ddc113bb946b9273d9d938683', 'super_admin', 'admin'),
(5, 'Eyesnet', 'eyesnet@opensource', '279a4cf6d7f8da1ddc113bb946b9273d9d938683', 'AQ9UMnE6MM5lAZCUWjQeKDHjnmPesQ', 'modo');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `post_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `name`, `email`, `comment`, `post_id`, `date`, `seen`) VALUES
(2, 'CodeOpen', 'code@opensource.com', 'we will make his group great ! Thanks for sharing with us', 4, '2018-03-18 11:55:12', 1),
(3, 'Tester', 'code@opensource.com', 'thanks for such kind of initiation', 4, '2018-03-18 13:21:22', 1),
(4, 'Eyesnet', 'CodeOpenSource@facebook.com', 'Well mentioned !', 3, '2018-03-18 13:22:30', 1);

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `writer` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `date` datetime NOT NULL,
  `posted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `writer`, `image`, `date`, `posted`) VALUES
(1, 'Great Design', 'having a great website is important ! We designed it', 'code@opensource', '25.jpg', '2018-03-18 15:20:54', 1),
(2, 'Find the project on Github', 'For now we are using github', 'code@opensource', '26.jpg', '2018-03-18 15:21:06', 1),
(3, 'If you have any project you can share', 'We designed thegroup to all people looking for open source project and those who wants to share with others.', 'code@opensource', 'default.jpg', '2018-03-18 13:20:04', 1),
(4, 'Introducing Code@Open source group', 'The term &quot;open source&quot; refers to something people can modify and share because its design is publicly accessible.\r\n\r\n&quot;Source code&quot; is the part of software that most computer users don\'t ever see; it\'s the code computer programmers can manipulate to change how a piece of software a &quot;program&quot; or &quot;application&quot; works. Programmers who have access to a computer program\'s source code can improve that program by adding features to it or fixing parts that don\'t always work correctly and so on...\r\n\r\nWe designed this group to all people looking for open source project and those who wants to share with others.\r\n\r\nJoin others and let know your friends about this new group.', 'code@opensource', '22.jpg', '2018-03-18 11:49:06', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
