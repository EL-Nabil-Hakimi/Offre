-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3307
-- Généré le : dim. 17 déc. 2023 à 17:06
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
-- Base de données : `job`
--

-- --------------------------------------------------------

--
-- Structure de la table `offre`
--

CREATE TABLE `offre` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) DEFAULT NULL,
  `paye` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `offre`
--

INSERT INTO `offre` (`id`, `image`, `titre`, `description`, `date`, `user_id`, `paye`) VALUES
(59, '../uploads/IMG-657c288e3f2671.86097766Simplon_fb_logo.jpg', '📢📢 We are hiring !!!', 'Vous êtes développeur.euse web et vous maîtrisez JAVA?\r\n\r\nRejoignez l&#039;équipe Simplon et partagez votre passion pour le numérique avec nos apprenants !\r\n', '2023-12-15', 16, 'maroc'),
(60, '../uploads/IMG-657c28aa4e62c7.84038063Business-Ideas-for-Women-Entrepreneurs.png', '🚨Je suis à la recherche des profils suivants:', '✔️Développeur AS400\r\n✔️Développeur Front-End Angular\r\n✔️Développeur Full Stack JAVA\r\n✔️MOA confirmé', '2023-12-15', 16, 'France'),
(61, '../uploads/IMG-657c28c6233c41.16527139360_F_648391979_uMz6EwAlKNIJnK9r46UpTiM17nT8GuLl.jpg', '🚨 Bonjour à tous mes contacts LinkedIn,', 'Aujourd&#039;hui, nous sommes plus de 100 000 🚀 sur LinkedIn, et je tiens à vous remercier pour votre confiance. Je souhaite vous encourager à partager davantage nos offres d&#039;emploi afin de contribuer à l&#039;intégration professionnelle des jeunes s', '2023-12-15', 16, 'Maroc'),
(62, '../uploads/IMG-657eea7527dd86.618716308.jpg', 'OFRE 1', 'OFRRE OFRRE OFFRE ', '2023-12-17', 15, 'MAROC');

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id`, `role`) VALUES
(1, 'ADMIN'),
(2, 'CANDIDAT');

-- --------------------------------------------------------

--
-- Structure de la table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `approved` int(11) DEFAULT NULL,
  `notification` int(11) NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `offreid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `status`
--

INSERT INTO `status` (`id`, `approved`, `notification`, `userid`, `offreid`) VALUES
(20, 1, 1, 16, 61),
(21, -1, 1, 16, 59),
(22, 1, 1, 18, 59),
(23, -1, 1, 18, 61),
(24, 1, 1, 18, 60),
(25, 1, 1, 19, 59),
(26, -1, 1, 19, 61);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `role_id`) VALUES
(15, 'Niama', 'Niama@c.c', '$2y$10$/1l3YkHleR120.SRtmn9D.7f1fA2zeTHOdUPuROkCrIl1bLCP0hN2', 1),
(16, 'Nabil', 'Nabil@gmail.com', '$2y$10$tdbiVR7.fJXkIPyJYI4kseC3pluPrKtf3yh7oXBRPHOnVfGLqxNKG', 1),
(17, 'Amin', 'Amin@a.c', '$2y$10$saMTpX.u4vswVDSmlOye2.tggdR5X6z1jvijZQZVfBOwQWCs0uau6', 1),
(18, 'AMIN', 'AMIN@AMIN.C', '$2y$10$6KHRhCYsTjTyHt9fdKzXS.ZvMUuiShHh433Iq5RhmBZ0UQ0TYjKXu', 2),
(19, 'YASSIN', 'yassine@gmail.com', '$2y$10$Sd8wCcXbm8XnACQIn.Fxy.49NZwFUvpLqFP18wojlO.nQ5ageOWGy', 2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `offre`
--
ALTER TABLE `offre`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_userid` (`userid`),
  ADD KEY `fk_offreid` (`offreid`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_role_id` (`role_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `offre`
--
ALTER TABLE `offre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `offre`
--
ALTER TABLE `offre`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `status`
--
ALTER TABLE `status`
  ADD CONSTRAINT `fk_offreid` FOREIGN KEY (`offreid`) REFERENCES `offre` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_userid` FOREIGN KEY (`userid`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_role_id` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
