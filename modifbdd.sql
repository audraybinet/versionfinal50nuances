-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Jeu 12 Mars 2020 à 20:10
-- Version du serveur :  5.7.29-0ubuntu0.18.04.1
-- Version de PHP :  7.2.24-0ubuntu0.18.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `authentication`
--

-- --------------------------------------------------------

--
-- Structure de la table `abonnements`
--

CREATE TABLE `abonnements` (
  `id` int(11) NOT NULL,
  `abonnement` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `clients_courses`
--

CREATE TABLE `clients_courses` (
  `course_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `clients_courses`
--

INSERT INTO `clients_courses` (`course_id`, `user_id`) VALUES
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(1, 6),
(3, 6),
(4, 6);

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

CREATE TABLE `cours` (
  `id` int(11) NOT NULL,
  `nameCours` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `cours`
--

INSERT INTO `cours` (`id`, `nameCours`) VALUES
(1, 'pole dance'),
(2, 'cérceaux aériens'),
(3, 'sirsana'),
(4, 'exotic pole');

-- --------------------------------------------------------

--
-- Structure de la table `course_slots`
--

CREATE TABLE `course_slots` (
  `id` int(11) NOT NULL,
  `slots` datetime NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `course_slots`
--

INSERT INTO `course_slots` (`id`, `slots`, `course_id`) VALUES
(1, '2020-03-14 11:30:00', 1),
(2, '2020-03-17 12:30:00', 3),
(3, '2020-03-21 11:30:00', 1),
(4, '2020-04-06 19:00:00', 4);

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `content` longtext NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `published_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `roles`
--

INSERT INTO `roles` (`id`, `role`) VALUES
(1, 'utilisateur'),
(2, 'admin'),
(3, 'utilisateur'),
(4, 'admin'),
(5, 'admin'),
(6, 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) CHARACTER SET utf8 NOT NULL,
  `lastname` varchar(50) CHARACTER SET utf8 NOT NULL,
  `password` varchar(60) CHARACTER SET utf8 NOT NULL,
  `register_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `email` varchar(150) CHARACTER SET utf8 NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `password`, `register_at`, `email`, `role_id`) VALUES
(2, 'audrey', 'binet', '$2y$10$88M0KZ5x.JXMovDBCyxVneDNfEvdPJMfzIdTpeXsaLLPN5NKlBVrG', '2020-03-04 09:25:05', 'audraychemical@live.fr', 2),
(5, 'Tiphaine', 'BINET', '$2y$10$nZmOyQFPuDDMVY7uMjxGbuRzE5ExE2QU8Jx8TAS1RyTGVijpn0G66', '2020-03-06 14:22:18', 'tiphaine.binet@live.fr', 2),
(6, 'noe', 'kisungu', '$2y$10$RWelmvXX4mPbb9V.5lbNm..qyS17nW/V3veIGv7gcL/VZx1MFPpWe', '2020-03-06 14:46:08', 'joyeuxnono@live.fr', 2),
(7, 'peggy', 'alfred', '$2y$10$CVTw4o3qc26UPffw0RtjJ.U/JqY/vEWdAaEWx30njsYAQtScT/8H6', '2020-03-12 20:04:50', 'peggyalfred@gmail.com', 2);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `abonnements`
--
ALTER TABLE `abonnements`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `clients_courses`
--
ALTER TABLE `clients_courses`
  ADD PRIMARY KEY (`course_id`,`user_id`),
  ADD KEY `FK_users` (`user_id`);

--
-- Index pour la table `cours`
--
ALTER TABLE `cours`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `course_slots`
--
ALTER TABLE `course_slots`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_cours_slot` (`course_id`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_posts_users` (`user_id`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UK_user` (`email`),
  ADD KEY `FK_users_roles` (`role_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `abonnements`
--
ALTER TABLE `abonnements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `cours`
--
ALTER TABLE `cours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `course_slots`
--
ALTER TABLE `course_slots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `clients_courses`
--
ALTER TABLE `clients_courses`
  ADD CONSTRAINT `FK_cours` FOREIGN KEY (`course_id`) REFERENCES `cours` (`id`),
  ADD CONSTRAINT `FK_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `course_slots`
--
ALTER TABLE `course_slots`
  ADD CONSTRAINT `FK_cours_slot` FOREIGN KEY (`course_id`) REFERENCES `cours` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `FK_posts_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_users_roles` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
