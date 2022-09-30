-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : jeu. 29 sep. 2022 à 13:40
-- Version du serveur : 5.7.33
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `monptittrucenbois`
--

-- --------------------------------------------------------

--
-- Structure de la table `addresses`
--

CREATE TABLE `addresses` (
  `id_adress` int(11) NOT NULL,
  `addresses_address` varchar(50) DEFAULT NULL,
  `addresses_address_more` varchar(50) DEFAULT NULL,
  `addresses_postal_code` varchar(50) DEFAULT NULL,
  `addresses_city` varchar(50) DEFAULT NULL,
  `addresses_type` int(11) DEFAULT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `addresses`
--

INSERT INTO `addresses` (`id_adress`, `addresses_address`, `addresses_address_more`, `addresses_postal_code`, `addresses_city`, `addresses_type`, `id_user`) VALUES
(1, '11 rue de l&#39;enclos des rosiers', '', '80160', 'Prouzel', 1, 1),
(3, '11 rue de l&#39;enclos des rosiers', '', '80160', 'Prouzel', 0, 1),
(4, '11 rue de l&#39;enclos des rosiers', '', '80160', 'Prouzel', 0, 1),
(5, '11 rue de l&#39;enclos des rosiers', '', '80160', 'Prouzel', 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `carriers`
--

CREATE TABLE `carriers` (
  `id_carrier` int(11) NOT NULL,
  `carriers_name` varchar(50) NOT NULL,
  `carriers_phone` varchar(12) DEFAULT NULL,
  `carriers_email` varchar(320) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id_category` int(11) NOT NULL,
  `categories_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id_category`, `categories_name`) VALUES
(1, 'Arts de la table'),
(2, 'Décoration'),
(3, 'Bureautique'),
(4, 'Jouets');

-- --------------------------------------------------------

--
-- Structure de la table `contacts_forms`
--

CREATE TABLE `contacts_forms` (
  `id_contact_form` int(11) NOT NULL,
  `contacts_form_message` varchar(500) DEFAULT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `events`
--

CREATE TABLE `events` (
  `id_event` int(11) NOT NULL,
  `events_name` varchar(100) NOT NULL,
  `events_description` varchar(1000) NOT NULL,
  `events_start_date` date NOT NULL,
  `events_end_date` date NOT NULL,
  `id_product` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `gifts`
--

CREATE TABLE `gifts` (
  `id_gift` int(11) NOT NULL,
  `gifts_type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `lk_products_orders`
--

CREATE TABLE `lk_products_orders` (
  `id_order` int(11) NOT NULL,
  `id_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `logs`
--

CREATE TABLE `logs` (
  `id_log` int(11) NOT NULL,
  `logs_date_log` date DEFAULT NULL,
  `logs_url` varchar(500) DEFAULT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE `orders` (
  `id_order` int(11) NOT NULL,
  `orders_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `orders_weight` int(11) DEFAULT NULL,
  `orders_price` decimal(4,2) DEFAULT NULL,
  `orders_payed` int(11) DEFAULT NULL,
  `orders_delivered` int(11) DEFAULT NULL,
  `orders_ship_number` varchar(50) DEFAULT NULL,
  `id_product` int(5) NOT NULL,
  `orders_quantity` int(5) NOT NULL,
  `id_gift` int(11) DEFAULT NULL,
  `id_carrier` int(11) DEFAULT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `prices`
--

CREATE TABLE `prices` (
  `id_price` int(11) NOT NULL,
  `carriers_max_weight` int(11) DEFAULT NULL,
  `carriers_price` decimal(4,2) DEFAULT NULL,
  `id_carrier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id_product` int(11) NOT NULL,
  `products_name` varchar(50) DEFAULT NULL,
  `products_description` varchar(500) DEFAULT NULL,
  `products_price` int(11) NOT NULL,
  `products_weight` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `id_wood` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id_product`, `products_name`, `products_description`, `products_price`, `products_weight`, `id_category`, `id_wood`) VALUES
(1, 'Assiette creuse', 'Recouverte d&#39;un vernis alimentaire permanent&#13;&#10;Laver à la main avec du produit vaisselle (pas de lave vaisselle)', 30, 20, 1, 2),
(2, 'Boite ovale', 'Boite vernie avec motif pyrogravé (plusieurs motifs au choix)', 30, 100, 2, 5),
(3, 'Sous-verre (lot de 6)', 'Motif pyrogravé (plusieurs motifs au choix), épaisseur de 5mm, plusieurs couches de vernis', 30, 30, 1, 5),
(4, 'Bol (grand)', 'Recouvert d&#39;un vernis alimentaire permanent &#13;&#10;Laver à la main avec du produit vaisselle (pas de lave vaisselle)', 20, 100, 1, 2),
(5, 'Bol (petit)', 'Recouvert d&#39;un vernis alimentaire permanen&#13;&#10;Laver à la main avec du produit vaisselle (pas de lave vaisselle)', 16, 100, 1, 2),
(6, 'Casse-noix', 'Avec maillet', 110, 150, 1, 2),
(7, 'Coquetier', 'Recouvert d&#39;un vernis alimentaire permanent&#13;&#10;Laver à la main avec du produit vaisselle (pas de lave vaisselle)&#13;&#10;', 15, 50, 1, 2),
(8, 'Coupe (grande)', '', 150, 150, 1, 2),
(9, 'Coupe (petite)', '', 80, 120, 1, 3),
(10, 'Mortier pilon', '', 50, 120, 1, 2),
(11, 'Rond de serviette', 'Vernis, personnalisable', 10, 30, 1, 2),
(12, 'Saladier (sans bord)', '', 45, 150, 1, 3),
(13, 'Saladier (avec bord)', '', 45, 150, 1, 3),
(14, 'Porte charcuterie (paon)', '', 300, 200, 1, 5),
(15, 'Porte charcuterie (cygne)', '', 200, 200, 1, 5),
(16, 'Porte lettres', 'Peint, personnalisable', 35, 100, 3, 5),
(17, 'Porte lettres avec pot à crayon', 'Peint, personnalisable', 45, 150, 3, 5),
(18, 'Tableau pense-bête', 'Ardoisé avec repose craie, personnalisable', 40, 100, 3, 5),
(19, 'Tirelire', '', 30, 50, 3, 5),
(20, 'Boite ', 'Couvercle compris', 20, 200, 3, 4),
(21, 'Crayon avec support', 'Modèle unique', 30, 30, 3, 2),
(22, 'Pot à crayon', '', 20, 50, 3, 1),
(23, 'Pot à crayon personnalisé', 'Personnalisable (forme ou prénom)', 30, 50, 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `types`
--

CREATE TABLE `types` (
  `id_type` int(11) NOT NULL,
  `types_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `types`
--

INSERT INTO `types` (`id_type`, `types_name`) VALUES
(1, 'Particulier');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `users_admin` tinyint(4) DEFAULT NULL,
  `users_gender` tinyint(4) DEFAULT NULL,
  `users_lastname` varchar(30) DEFAULT NULL,
  `users_firstname` varchar(30) DEFAULT NULL,
  `users_email` varchar(320) NOT NULL,
  `users_phone` char(10) DEFAULT NULL,
  `users_birthdate` date DEFAULT NULL,
  `users_password` varchar(255) DEFAULT NULL,
  `users_contact` varchar(255) DEFAULT NULL,
  `users_created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `users_validated_at` datetime DEFAULT NULL,
  `users_connected_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `users_type` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `users_admin`, `users_gender`, `users_lastname`, `users_firstname`, `users_email`, `users_phone`, `users_birthdate`, `users_password`, `users_contact`, `users_created_at`, `users_validated_at`, `users_connected_at`, `users_type`) VALUES
(1, 1, 2, 'FERRARIO', 'Loïc', 'loicifone@gmail.com', '0682614374', '1982-09-13', '$2y$10$aHn4M6Ofni/fB1S2LWVrP.6j8zZnDqDqvfpXP6eB8BPvDA/iJhDqi', NULL, '2022-09-28 10:56:52', '2022-09-28 10:56:52', '2022-09-28 10:56:52', 1),
(2, NULL, NULL, NULL, NULL, 'loicf@gmail.com', NULL, NULL, '$2y$10$Yhy3oB8YIyCCCUwsrjof5ewqMHLZhZNjISQIOLFjn3BrQvOZ9lTci', NULL, '2022-09-28 16:46:57', '2022-09-28 16:46:57', '2022-09-28 16:47:24', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `woods`
--

CREATE TABLE `woods` (
  `id_wood` int(11) NOT NULL,
  `woods_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `woods`
--

INSERT INTO `woods` (`id_wood`, `woods_name`) VALUES
(1, 'Chêne'),
(2, 'Hêtre'),
(3, 'Frêne'),
(4, 'Merisier'),
(5, 'Contreplaqué');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id_adress`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `carriers`
--
ALTER TABLE `carriers`
  ADD PRIMARY KEY (`id_carrier`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_category`);

--
-- Index pour la table `contacts_forms`
--
ALTER TABLE `contacts_forms`
  ADD PRIMARY KEY (`id_contact_form`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id_event`),
  ADD KEY `id_product` (`id_product`);

--
-- Index pour la table `gifts`
--
ALTER TABLE `gifts`
  ADD PRIMARY KEY (`id_gift`);

--
-- Index pour la table `lk_products_orders`
--
ALTER TABLE `lk_products_orders`
  ADD PRIMARY KEY (`id_order`,`id_product`),
  ADD KEY `id_product` (`id_product`);

--
-- Index pour la table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id_log`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_gift` (`id_gift`),
  ADD KEY `id_carrier` (`id_carrier`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `orders_ibfk_4` (`id_product`);

--
-- Index pour la table `prices`
--
ALTER TABLE `prices`
  ADD PRIMARY KEY (`id_price`),
  ADD KEY `id_carrier` (`id_carrier`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `id_category` (`id_category`),
  ADD KEY `id_wood` (`id_wood`);

--
-- Index pour la table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id_type`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `id_type` (`users_type`);

--
-- Index pour la table `woods`
--
ALTER TABLE `woods`
  ADD PRIMARY KEY (`id_wood`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id_adress` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `carriers`
--
ALTER TABLE `carriers`
  MODIFY `id_carrier` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `contacts_forms`
--
ALTER TABLE `contacts_forms`
  MODIFY `id_contact_form` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `events`
--
ALTER TABLE `events`
  MODIFY `id_event` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `gifts`
--
ALTER TABLE `gifts`
  MODIFY `id_gift` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `logs`
--
ALTER TABLE `logs`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `prices`
--
ALTER TABLE `prices`
  MODIFY `id_price` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `types`
--
ALTER TABLE `types`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `woods`
--
ALTER TABLE `woods`
  MODIFY `id_wood` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`user_id`);

--
-- Contraintes pour la table `contacts_forms`
--
ALTER TABLE `contacts_forms`
  ADD CONSTRAINT `contacts_forms_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`user_id`);

--
-- Contraintes pour la table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`);

--
-- Contraintes pour la table `lk_products_orders`
--
ALTER TABLE `lk_products_orders`
  ADD CONSTRAINT `lk_products_orders_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id_order`),
  ADD CONSTRAINT `lk_products_orders_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`);

--
-- Contraintes pour la table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `logs_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`user_id`);

--
-- Contraintes pour la table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_gift`) REFERENCES `gifts` (`id_gift`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`id_carrier`) REFERENCES `carriers` (`id_carrier`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `orders_ibfk_4` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`);

--
-- Contraintes pour la table `prices`
--
ALTER TABLE `prices`
  ADD CONSTRAINT `prices_ibfk_1` FOREIGN KEY (`id_carrier`) REFERENCES `carriers` (`id_carrier`);

--
-- Contraintes pour la table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id_category`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`id_wood`) REFERENCES `woods` (`id_wood`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`users_type`) REFERENCES `types` (`id_type`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
