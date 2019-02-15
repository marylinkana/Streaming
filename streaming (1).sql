-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Dim 29 Avril 2018 à 15:17
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `streaming`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id_cat` int(11) NOT NULL,
  `libelle` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`id_cat`, `libelle`) VALUES
(1, 'ACTION'),
(2, 'ROMANCE'),
(3, 'ANIME'),
(4, 'COMEDIE'),
(5, 'DRAME');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `id_com` int(11) NOT NULL,
  `description` text NOT NULL,
  `id_u` int(11) NOT NULL,
  `id_se` int(11) DEFAULT NULL,
  `id_f` int(5) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `commentaires`
--

INSERT INTO `commentaires` (`id_com`, `description`, `id_u`, `id_se`, `id_f`) VALUES
(1, 'Super ', 2, 11, NULL),
(2, 'trop trop méga cool génialissime', 3, 1, NULL),
(3, 'trop bien, top', 4, NULL, 2),
(4, 'trop bien, top', 1, 1, NULL),
(5, 'trop bien, top', 1, 2, NULL),
(6, 'trop bien, top', 1, 3, NULL),
(7, 'trop bien, top', 1, 4, NULL),
(8, 'trop bien, top', 1, 5, NULL),
(9, 'trop bien, top', 1, NULL, 1),
(10, 'trop bien, top', 1, NULL, 2),
(11, 'trop bien, top', 1, NULL, 3),
(12, 'trop bien, top', 1, NULL, 4),
(13, 'trop bien, top', 1, NULL, 5),
(14, 'trop bien, top', 1, NULL, 6),
(15, 'trop bien, top', 1, NULL, 7),
(16, 'trop trop bien', 2, 1, NULL),
(17, 'trop trop bien', 2, 2, NULL),
(18, 'trop trop bien', 2, 3, NULL),
(19, 'trop trop nul', 3, 1, NULL),
(20, 'trop trop nul', 4, 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `dislikes`
--

CREATE TABLE `dislikes` (
  `id` int(11) NOT NULL,
  `id_se` int(11) DEFAULT NULL,
  `id_f` int(11) DEFAULT NULL,
  `id_u` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `dislikes`
--

INSERT INTO `dislikes` (`id`, `id_se`, `id_f`, `id_u`) VALUES
(5, 1, NULL, 6),
(6, 2, NULL, 6),
(7, 4, NULL, 6),
(8, 5, NULL, 7),
(9, NULL, 1, 6),
(10, NULL, 1, 7),
(11, NULL, 2, 6),
(12, NULL, 3, 7),
(13, NULL, 4, 6),
(14, NULL, 4, 7),
(15, NULL, 5, 7),
(16, NULL, 6, 6);

-- --------------------------------------------------------

--
-- Structure de la table `episodes`
--

CREATE TABLE `episodes` (
  `id_episodes` smallint(5) NOT NULL,
  `nom_episodes` text,
  `num_episodes` int(11) DEFAULT NULL,
  `duree_episodes` time DEFAULT NULL,
  `lien_episodes` varchar(255) DEFAULT NULL,
  `id_se` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `episodes`
--

INSERT INTO `episodes` (`id_episodes`, `nom_episodes`, `num_episodes`, `duree_episodes`, `lien_episodes`, `id_se`) VALUES
(1, 'EPISCORP 1', 1, '00:41:00', '<iframe width="100%" height="480" src="https://www.youtube.com/embed/1bdfAOn4zD8?ecver=2"  frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>', 1),
(2, 'EPIGIMM 1', 1, '00:50:22', '<iframe width="100%" height="480" src="https://www.youtube.com/embed/2rVy3RBJmNo?ecver=2" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>', 2),
(3, 'EPISCORP 2', 2, '00:41:22', '<iframe width="100%" height="480" src="https://www.youtube.com/embed/X6UqTmRAApw" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>', 1),
(4, 'EPIGIMM 2', 2, '00:30:59', '<iframe width="100%" height="480" src="https://www.youtube.com/embed/owaq_tIdnMk" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>', 2),
(5, 'EPIHEROES 1', 1, '00:37:54', '<iframe width="100%" height="480" src="https://www.youtube.com/embed/8aZMc01CunM" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>', 3),
(6, 'EPIHEROES 2', 2, '00:40:35', '<iframe width="100%" height="480" src="https://www.youtube.com/embed/uI2xF3ye0I4" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>', 3);

-- --------------------------------------------------------

--
-- Structure de la table `film`
--

CREATE TABLE `film` (
  `id_f` int(11) NOT NULL,
  `titre` varchar(255) DEFAULT NULL,
  `desc_f` text,
  `duree_f` time DEFAULT NULL,
  `lien_f` varchar(255) DEFAULT NULL,
  `lien_trailer` varchar(255) DEFAULT NULL,
  `id_cat` smallint(5) NOT NULL,
  `image_f` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `film`
--

INSERT INTO `film` (`id_f`, `titre`, `desc_f`, `duree_f`, `lien_f`, `lien_trailer`, `id_cat`, `image_f`) VALUES
(1, 'blackpanter', 'ACTION', '02:00:00', '<iframe width="100%" height="480" src="https://www.youtube.com/embed/hfhlrkQngwU" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>', '<iframe width="100%" height="480" src="https://www.youtube.com/embed/r_XtTHNjSYc" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>', 1, 'https://lemuslimpost.com/wp-content/uploads/2018/02/Black-Panther.jpg'),
(2, '300', 'DRAME', '01:30:00', '<iframe width="100%" height="480" src="https://www.youtube.com/embed/vX3HuybRsBk" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>', '<iframe width="100%" height="480" src="https://www.youtube.com/embed/1R2HpgDVrFc" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>', 5, 'http://i0.kym-cdn.com/entries/icons/original/000/018/227/300.jpg'),
(3, 'AMOR', 'ROMANCE', '02:00:21', '<iframe width="100%" height="480" src="https://www.youtube.com/embed/kDEPIFp9FAs" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>', '<iframe width="100%" height="480" src="https://www.youtube.com/embed/NoVE5VvDYVs" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>', 2, 'https://http2.mlstatic.com/cd-destilando-amor-gaviota-angelica-rivero-pepe-aguilar-D_NQ_NP_885125-MLM25387270273_022017-F.jpg'),
(4, 'FULL METAL', 'ANIME', '02:14:30', '<iframe width="100%" height="480" src="https://www.youtube.com/embed/slf-tE3gJyk" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>', '<iframe width="100%" height="480" src="https://www.youtube.com/embed/2uq34TeWEdQ" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>', 3, 'http://www.imagespourtoi.com/lesimages/full-metal-alchemist/image-full-metal-alchemist-1.jpg'),
(5, 'FIREPROOF', 'ROMANCE', '02:12:34', '<iframe width="100%" height="480" src="https://www.youtube.com/embed/skelO9DKue8" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>', '<iframe width="100%" height="480" src="https://www.youtube.com/embed/cZ9xkT8syW4" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>', 2, 'http://www.wedding-officiant.ca/backend/wp-content/uploads/2013/05/fireproof-Image.jpg'),
(6, 'WAR ROOM', 'ACTION', '01:59:34', '<iframe width="100%" height="480" src="https://www.youtube.com/embed/Q9GwqBXUSKw" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>', '<iframe width="100%" height="480" src="https://www.youtube.com/embed/7A0s6ApFkpc" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>', 1, 'http://www.communityrc.org/wp-content/uploads/Screen-Shot-2015-08-28-at-2.12.03-PM-640x480.jpg'),
(7, 'HUNTER X HUNTER', 'ANIME', '01:35:19', '<iframe width="100%" height="480" src="https://www.youtube.com/embed/sX5F2PG0GEA" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>', '<iframe width="100%" height="480" src="https://www.youtube.com/embed/6t5sU31Z6xw" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>', 3, 'http://adala-news.fr/wp-content/uploads/2012/11/Hunter-x-Hunter-Movie.jpg'),
(8, 'JAMEL PILAMI', 'COMEDI', '02:10:35', '<iframe width="100%" height="480" src="https://www.youtube.com/embed/W1y6-0-FWR8?list=PLkZU4l-OUBEGuJ7EuUkVQFEb7xXfIIPPW" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>', '<iframe width="100%" height="480" src="https://www.youtube.com/embed/3hlkB-bzEwc" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>', 4, 'http://www.dailymars.net/wp-content/uploads/2012/04/marsupilami.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `id_se` int(11) DEFAULT NULL,
  `id_f` int(11) DEFAULT NULL,
  `id_u` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `likes`
--

INSERT INTO `likes` (`id`, `id_se`, `id_f`, `id_u`) VALUES
(1, 1, NULL, 2),
(2, 2, NULL, 3),
(7, 1, NULL, 1),
(8, 1, NULL, 2),
(9, 1, NULL, 3),
(50, 1, NULL, 4),
(11, 1, NULL, 5),
(12, 2, NULL, 1),
(13, 2, NULL, 2),
(14, 3, NULL, 1),
(15, 3, NULL, 2),
(16, 3, NULL, 3),
(17, 4, NULL, 1),
(18, 5, NULL, 1),
(19, 5, NULL, 2),
(20, 5, NULL, 3),
(21, 5, NULL, 4),
(22, 5, NULL, 5),
(23, 0, 6, 1),
(24, 0, 6, 2),
(25, 0, 6, 3),
(26, 0, 6, 1),
(27, 0, 7, 2),
(28, 0, 7, 3),
(29, 0, 7, 4),
(30, 0, 7, 5),
(31, 0, 7, 6),
(32, 0, 7, 7),
(54, 2, NULL, 4),
(34, NULL, 1, 2),
(35, NULL, 1, 3),
(53, NULL, 2, 1),
(37, NULL, 3, 1),
(38, NULL, 3, 2),
(39, NULL, 4, 1),
(40, NULL, 4, 2),
(41, NULL, 4, 3),
(42, NULL, 4, 4),
(43, NULL, 4, 5),
(44, NULL, 5, 1),
(45, NULL, 5, 2),
(46, NULL, 5, 3),
(47, NULL, 5, 4);

-- --------------------------------------------------------

--
-- Structure de la table `regarder`
--

CREATE TABLE `regarder` (
  `id_films` int(11) NOT NULL,
  `id_u` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `serie`
--

CREATE TABLE `serie` (
  `id_se` int(11) NOT NULL,
  `titre_se` varchar(255) NOT NULL,
  `nomb_ep` int(10) NOT NULL,
  `id_cat` smallint(5) NOT NULL,
  `image_se` varchar(255) DEFAULT NULL,
  `desc_se` text,
  `lien_se` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `serie`
--

INSERT INTO `serie` (`id_se`, `titre_se`, `nomb_ep`, `id_cat`, `image_se`, `desc_se`, `lien_se`) VALUES
(1, 'SCORPION', 20, 5, 'https://pbs.twimg.com/profile_images/746125619226763264/U1mBmzg-_400x400.jpg', 'SCIENCE', '<iframe width="100%" height="480" src="https://www.youtube.com/embed/JjaXs6_s2TQ" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>'),
(2, 'GRIM', 30, 1, 'https://static.next-episode.net/tv-shows-images/huge/grimm.jpg', 'FANDASTIQUE', '<iframe width="100%" height="480" src="https://www.youtube.com/embed/nAYVBZEVHrU" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>'),
(3, 'HEROES', 200, 4, 'http://coulissesmedias.com/wp-content/uploads/2014/02/Heroes.jpg', 'FICTION', '<iframe width="100%" height="480" src="https://www.youtube.com/embed/pXKzp-dcS2I" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>'),
(4, 'NARUTO SHIPUDEN', 600, 3, 'https://i.skyrock.net/6106/86936106/pics/3180915655_1_4_qgRDm4ue.png', 'ANIME', '<iframe width="100%" height="480" src="https://www.youtube.com/embed/n-9X9ZGlX2o" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>'),
(5, 'THE BEST', 90, 2, 'http://www.tvsf.fr/wp-content/uploads/2014/08/PLL.jpg', 'ROMANCE', '<iframe width="100%" height="480" src="https://www.youtube.com/embed/tKF2zBS8j7U" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_u` int(11) NOT NULL,
  `nom_user` varchar(50) DEFAULT NULL,
  `prenom_user` varchar(50) DEFAULT NULL,
  `datedeb_abo` timestamp NULL DEFAULT NULL,
  `datefin_abo` timestamp NULL DEFAULT NULL,
  `mdp_user` varchar(255) DEFAULT NULL,
  `login` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id_u`, `nom_user`, `prenom_user`, `datedeb_abo`, `datefin_abo`, `mdp_user`, `login`) VALUES
(1, 'azerty', NULL, NULL, NULL, '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 'boby'),
(2, 'dylan', NULL, NULL, NULL, 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'bibo'),
(3, 'vialle', 'thibaut', NULL, NULL, '90795a0ffaa8b88c0e250546d8439bc9c31e5a5e', 'toto'),
(4, 'fargo', 'test', NULL, NULL, 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'test'),
(5, 'test', 'test', NULL, NULL, 'test', 'test'),
(6, 'paku', 'paku', NULL, NULL, 'ffbdcb6949ae829a4cf2aa836b6187a198ee9988', 'paku'),
(7, 'k', 'k', NULL, NULL, '13fbd79c3d390e5d6585a21e11ff5ec1970cff0c', 'baba');

-- --------------------------------------------------------

--
-- Structure de la table `visionner`
--

CREATE TABLE `visionner` (
  `id_episodes` int(50) NOT NULL DEFAULT '0',
  `id_u` int(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_cat`);

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id_com`),
  ADD KEY `id_u` (`id_u`),
  ADD KEY `id_serie` (`id_se`),
  ADD KEY `id_f` (`id_f`);

--
-- Index pour la table `dislikes`
--
ALTER TABLE `dislikes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_serie` (`id_se`),
  ADD KEY `id_user` (`id_u`);

--
-- Index pour la table `episodes`
--
ALTER TABLE `episodes`
  ADD PRIMARY KEY (`id_episodes`),
  ADD KEY `id_se` (`id_se`);

--
-- Index pour la table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id_f`),
  ADD KEY `id_cat` (`id_cat`);

--
-- Index pour la table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_serie` (`id_se`),
  ADD KEY `id_user` (`id_u`),
  ADD KEY `id_f` (`id_f`);

--
-- Index pour la table `regarder`
--
ALTER TABLE `regarder`
  ADD PRIMARY KEY (`id_films`,`id_u`),
  ADD KEY `id_u` (`id_u`);

--
-- Index pour la table `serie`
--
ALTER TABLE `serie`
  ADD PRIMARY KEY (`id_se`),
  ADD UNIQUE KEY `id_cat` (`id_cat`),
  ADD KEY `id_cat_2` (`id_cat`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_u`);

--
-- Index pour la table `visionner`
--
ALTER TABLE `visionner`
  ADD PRIMARY KEY (`id_episodes`,`id_u`),
  ADD KEY `id_u` (`id_u`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id_com` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT pour la table `dislikes`
--
ALTER TABLE `dislikes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT pour la table `episodes`
--
ALTER TABLE `episodes`
  MODIFY `id_episodes` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `film`
--
ALTER TABLE `film`
  MODIFY `id_f` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT pour la table `serie`
--
ALTER TABLE `serie`
  MODIFY `id_se` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_u` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
