-- phpMyAdmin SQL Dump
-- version 4.6.0
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Sam 18 Juin 2016 à 19:31
-- Version du serveur :  5.7.11
-- Version de PHP :  7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `boutique`
--

-- --------------------------------------------------------

--
-- Structure de la table `cat`
--

CREATE TABLE `cat` (
  `id_cat` int(11) NOT NULL,
  `nom_cat` varchar(255) NOT NULL,
  `desc_cat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `cat_items`
--

CREATE TABLE `cat_items` (
  `id_cat_items` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `items_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `items`
--

CREATE TABLE `items` (
  `id_items` int(11) NOT NULL,
  `nom_items` varchar(255) NOT NULL,
  `desc_items` text NOT NULL,
  `prix_items` float NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `items`
--

INSERT INTO `items` (`id_items`, `nom_items`, `desc_items`, `prix_items`) VALUES
(1, 'Obessive', 'Obessive pour la nuit .', 0),
(2, 'test2', 'wejferg\r\nerqgerg\r\nrerrgegregrqeq', 0),
(3, 'wefwef', 'wefwef', 0),
(4, 'rhtrnh', 'tynrtyn', 0),
(6, 'vqwr', 'ververw', 0),
(7, 'thttthr', 'tthrthrhtr', 0),
(8, 'ewrgerwgewrgergewrgerwgerwgerwgerwgwe', 'ergergerwgwerg', 0),
(9, 'test', 'weger', 0),
(10, 'vsdvsd', 'sdvsddsv', 0),
(11, 'wefwefqwgfewrgdfs', 'bdbsdfbs', 0);

-- --------------------------------------------------------

--
-- Structure de la table `pics`
--

CREATE TABLE `pics` (
  `id_pics` int(11) NOT NULL,
  `nom_pics` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `alt` varchar(255) NOT NULL,
  `items_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `pics`
--

INSERT INTO `pics` (`id_pics`, `nom_pics`, `title`, `alt`, `items_id`) VALUES
(1, 'd41d8cd98f00b204e9800998ecf8427e', '', '', 1),
(2, 'd41d8cd98f00b204e9800998ecf8427e.', '', '', 2),
(3, 'd41d8cd98f00b204e9800998ecf8427e.jpg', '', '', 3),
(4, 'd41d8cd98f00b204e9800998ecf8427e.jpg', '', '', 4),
(5, 'd41d8cd98f00b204e9800998ecf8427e.jpg', '', '', 5),
(6, 'd41d8cd98f00b204e9800998ecf8427e.jpg', '', '', 6),
(7, 'd41d8cd98f00b204e9800998ecf8427e.jpg', '', '', 7),
(8, 'd41d8cd98f00b204e9800998ecf8427e.jpg', '', '', 8),
(9, 'd41d8cd98f00b204e9800998ecf8427e.png', '', '', 9),
(10, 'd41d8cd98f00b204e9800998ecf8427e.jpg', '', '', 10),
(11, 'a946a55c0021aa8063c500a77a4f7a91.jpg', '', '', 11);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `admin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id_user`, `pseudo`, `pass`, `mail`, `admin`) VALUES
(3, 'damien', 'bd2253cd5c8fb787ec3f98fbc41fef32851b686e', 'test', NULL),
(4, 'admin', '59f9202f75e6f577f2e23b090ccf0499d1e9c9f5', 'adminmail', 1),
(5, 'test', '0f9f5efba3a1030dbb0135527105eeabc9f1dca0', 'tata', NULL),
(6, 'everwv', 'fewfwewe', 'wefwefwefwe', NULL),
(7, 'everwv', '', '', NULL);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `cat`
--
ALTER TABLE `cat`
  ADD PRIMARY KEY (`id_cat`);

--
-- Index pour la table `cat_items`
--
ALTER TABLE `cat_items`
  ADD PRIMARY KEY (`id_cat_items`);

--
-- Index pour la table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id_items`);

--
-- Index pour la table `pics`
--
ALTER TABLE `pics`
  ADD PRIMARY KEY (`id_pics`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `cat`
--
ALTER TABLE `cat`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `cat_items`
--
ALTER TABLE `cat_items`
  MODIFY `id_cat_items` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `items`
--
ALTER TABLE `items`
  MODIFY `id_items` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `pics`
--
ALTER TABLE `pics`
  MODIFY `id_pics` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
