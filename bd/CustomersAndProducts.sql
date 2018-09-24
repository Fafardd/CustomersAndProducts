-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 24 Septembre 2018 à 16:30
-- Version du serveur :  5.6.37
-- Version de PHP :  7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `CustomersAndProducts`
--

-- --------------------------------------------------------

--
-- Structure de la table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `other_details` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `customers`
--

INSERT INTO `customers` (`id`, `number`, `name`, `phone`, `other_details`, `created`, `modified`) VALUES
(2, 12345, 'Kevin Fafard', '5145145144', 'Jeune gamer', '2018-09-24 15:34:21', '2018-09-24 15:34:21');

-- --------------------------------------------------------

--
-- Structure de la table `customer_product`
--

CREATE TABLE IF NOT EXISTS `customer_product` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `other_details` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `type_id` int(11) NOT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `store_quantity` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `created`, `modified`, `type_id`, `color`, `store_quantity`) VALUES
(2, 'Manette de jeu', 25.99, '2018-09-21 14:53:35', '2018-09-21 14:53:35', 5, 'Blanc', 25);

-- --------------------------------------------------------

--
-- Structure de la table `types`
--

CREATE TABLE IF NOT EXISTS `types` (
  `id` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `types`
--

INSERT INTO `types` (`id`, `description`) VALUES
(4, 'Produits électroménagers'),
(5, 'Produits électroniques');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `created`, `modified`) VALUES
(1, 'kev@hotmail.com', '$2y$10$o0goUaFDPtyl.MkFZBqEUOZdrE8ieN/.JBM.F6W7bVGk8j.4L8L7y', '2018-09-21 12:56:53', '2018-09-21 13:02:04'),
(2, 'admin@admin.com', '$2y$10$YDw4Ywy10k4Suld0aoJ8Xut9rho762XZrLPx9Zj0Jp1zi9WKi.aU2', '2018-09-21 12:57:47', '2018-09-21 12:57:47'),
(3, 'test@test.com', '$2y$10$tnpUABfz.nXaPpk.3U14J.AFQwwKCP/d8pjYEzWcg3dSenmdTfEZ6', '2018-09-21 13:03:16', '2018-09-21 13:03:16'),
(4, 'test2@test.com', '$2y$10$/beSpAuRCjpf2vEPgJf4rOMXjEaVmStGZ.zkvJT/k/yN232rw6ZZq', '2018-09-21 13:16:35', '2018-09-21 13:16:35'),
(5, 'test789@test.com', '$2y$10$/ngC7r1P3avPsCdFi6sU/ekvbVa1/OxckShts2ENUYZqMQhB706r6', '2018-09-21 13:25:38', '2018-09-21 13:25:38'),
(6, 'adminadmin@admin.com', '$2y$10$CES/AEN5R.NbZY4E.DySGuIRICb4kTDOFmEgevW6PhYmXVyIMeZsu', '2018-09-21 13:26:16', '2018-09-21 13:26:16'),
(7, 'qwerty@test.com', '$2y$10$2sgh.IS1f8jGd03mW0asdO6f4TZ/JuNHEELDmHfsH8XXuSCV9vEPW', '2018-09-21 13:28:53', '2018-09-21 13:28:53'),
(8, 'kevin1@hotmail.com', '$2y$10$ZJU2KT4X4OXjkUAsKfIVAO3SGP5Xal2UrdkR6crUT9sa.Tk0aJcZ.', '2018-09-21 13:31:04', '2018-09-21 13:31:04'),
(9, 'asdf@hotmail.com', '$2y$10$.ysGUzIEbEBkdb/QoCJNSumAIznAot.9KobFaRxPqqDs7a2oArRhG', '2018-09-21 13:32:35', '2018-09-21 13:32:35'),
(10, 'kev@vendeur.com', '$2y$10$DSHtMisx9SoEO2hA.42wJufjtmaLojbb1BoEpBGjLkSXPRp1f1ZGa', '2018-09-24 15:01:15', '2018-09-24 15:01:15');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `customer_product`
--
ALTER TABLE `customer_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_id` (`type_id`);

--
-- Index pour la table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `customer_product`
--
ALTER TABLE `customer_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `customer_product`
--
ALTER TABLE `customer_product`
  ADD CONSTRAINT `customer_product_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `customer_product_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Contraintes pour la table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
