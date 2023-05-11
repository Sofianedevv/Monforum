-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 04 mai 2023 à 17:44
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `forum`
--

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_topic` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id`, `content`, `id_user`, `id_topic`, `created_at`) VALUES
(1, '', 1, 0, '2023-03-10 15:33:35'),
(18, 'ùmù,lmù*', 1, 1, '2023-03-10 15:41:30'),
(20, 'ùklmlm', 1, 1, '2023-03-10 15:41:43'),
(21, 'mlm\r\n', 1, 1, '2023-03-10 15:41:53'),
(22, 'erzerzr', 2, 1, '2023-03-10 16:07:33'),
(24, 'ezrzerzer', 2, 1, '2023-03-10 16:07:41'),
(25, 'lololio', 2, 5, '2023-03-10 16:09:19'),
(27, 'uioyuioy', 2, 5, '2023-03-10 16:09:26'),
(28, 'ioiuo', 2, 4, '2023-03-10 16:09:39'),
(29, 'ioiuo', 2, 4, '2023-03-10 16:09:42'),
(31, 'ioiuo', 2, 4, '2023-03-10 16:09:54'),
(34, 'ée(g&quot;tref', 3, 5, '2023-05-04 17:28:43'),
(36, 'je suis d&#039;accord\r\n', 4, 6, '2023-05-04 17:31:38'),
(38, 'Saluut !', 5, 7, '2023-05-04 17:34:05'),
(40, 'Je te conseille breaking bad sur netflix', 6, 8, '2023-05-04 17:35:33'),
(42, 'hello', 6, 7, '2023-05-04 17:35:59'),
(43, 'hello', 6, 7, '2023-05-04 17:36:03'),
(44, 'Je prefere php', 6, 9, '2023-05-04 17:37:48'),
(45, 'Je prefere php', 6, 9, '2023-05-04 17:37:51'),
(46, 'Non JS c&#039;est mieux !!', 7, 9, '2023-05-04 17:38:48'),
(47, 'Non JS c&#039;est mieux !!', 7, 9, '2023-05-04 17:38:53');

-- --------------------------------------------------------

--
-- Structure de la table `topic`
--

CREATE TABLE `topic` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `topic`
--

INSERT INTO `topic` (`id`, `title`, `id_user`, `created_at`) VALUES
(1, 'Qu&#039;est-ce que PHP?', 1, '0000-00-00 00:00:00'),
(2, 'Symfony plus facile que PHP sans framework?', 1, '0000-00-00 00:00:00'),
(5, 'aled', 2, '2023-03-10 16:08:37'),
(6, 'Beau forum', 3, '2023-05-04 17:28:31'),
(7, 'Salut tous le monde !', 4, '2023-05-04 17:31:24'),
(8, 'Salut, des séries a me conseiller  ? ', 5, '2023-05-04 17:33:56'),
(9, 'Vous êtes plutôt php ou js ? ', 6, '2023-05-04 17:36:39'),
(11, 'Qui peu me conseiller un bon restau asiatique sur Paris ?', 7, '2023-05-04 17:39:54');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nickname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `picture_profil` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `nickname`, `password`, `picture_profil`) VALUES
(1, 'admin@admin.com', 'admin', '$2y$10$J1cWwmtWgHHQBRn9aSoMWuTv22R9SVUncN1p.dcKNdgpbudyATpQ.', '10032023102921s23.jpg'),
(2, 'soso@soso.com', 'soso', '$2y$10$hhLK0MdJSkPw8/kxFYeG4e1C886Bzqa.095ejZdFg9UlOBXgStORO', '10032023160712iphone.jpg'),
(3, 'azer@azer.fr', 'sosodev', '$2y$10$s28mhEJxV.h6dyPPI4Gte.h8.SSCjqOTiFsLlekvL4OfIsRxhBw36', '04052023172726pexels-alex-kinkate-205926.jpg'),
(4, 'paul@paul.fr', 'Paul', '$2y$10$Zn9GIlikLAoF0DgrJwiFY.VP.zcmic910Wa3YdKWWkK7scxfvgAP.', '04052023173045pexels-pixabay-220453.jpg'),
(5, 'marie@marie.fr', 'Marie', '$2y$10$CC9B2sL7lMqXfbBDKeK7.OXr2E36NoeukinLc333BCzUxd86AtHd2', '04052023173223pexels-pixabay-415829.jpg'),
(6, 'marc@marc.fr', 'Marc', '$2y$10$H4j5RPm8bmONP9EPAFrhI.IOlAuIj84Qvb8/6jC6YezHArMQu5PKe', '04052023173503pexels-sindre-fs-1040881.jpg'),
(7, 'max@max.fr', 'Maxence', '$2y$10$SHl/UdCcjvdwPJ3kLu94sO2clgQIXnU4XOJTBaF5sCryNt.egWRTe', '04052023173718pexels-andrew-personal-training-697509.jpg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT pour la table `topic`
--
ALTER TABLE `topic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
