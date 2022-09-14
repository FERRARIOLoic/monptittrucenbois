-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 14 sep. 2022 à 09:01
-- Version du serveur : 5.7.33
-- Version de PHP : 7.4.19

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
-- Structure de la table `addresses_ships`
--

CREATE TABLE `addresses_ships` (
  `id_adress_ship` int(11) NOT NULL,
  `addresses_ship_address` varchar(50) DEFAULT NULL,
  `addresses_ship_address_more` varchar(50) DEFAULT NULL,
  `addresses_ship_postal_code` varchar(50) DEFAULT NULL,
  `addresses_ship_city` varchar(50) DEFAULT NULL,
  `addresses_ship_type` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `carriers`
--

CREATE TABLE `carriers` (
  `id_carrier` int(11) NOT NULL,
  `carriers_name` varchar(50) NOT NULL,
  `carriers_number` varchar(12) DEFAULT NULL,
  `carriers_email` varchar(320) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `carriers_prices`
--

CREATE TABLE `carriers_prices` (
  `id_carriers_price` int(11) NOT NULL,
  `carriers_prices_max_weight` int(11) DEFAULT NULL,
  `carriers_prices_price` decimal(4,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `contacts_forms`
--

CREATE TABLE `contacts_forms` (
  `id_contact_form` int(11) NOT NULL,
  `contacts_form_message` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `errors`
--

CREATE TABLE `errors` (
  `id` int(10) NOT NULL,
  `category` varchar(20) NOT NULL,
  `text_error` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `errors`
--

INSERT INTO `errors` (`id`, `category`, `text_error`) VALUES
(1, 'none', 'Aucun soucis rencontré'),
(2, 'connect', 'La connexion à la base de donnée à échouée'),
(3, 'mail', 'L\'adresse mail existe déjà');

-- --------------------------------------------------------

--
-- Structure de la table `events`
--

CREATE TABLE `events` (
  `id_event` int(11) NOT NULL,
  `events_name` varchar(100) NOT NULL,
  `events_description` varchar(1000) NOT NULL,
  `events_start_date` date NOT NULL,
  `events_end_date` date NOT NULL
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
-- Structure de la table `lk_adresses`
--

CREATE TABLE `lk_adresses` (
  `id_client` int(11) NOT NULL,
  `id_adress_ship` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `lk_carriers_prices`
--

CREATE TABLE `lk_carriers_prices` (
  `id_carrier` int(11) NOT NULL,
  `id_carriers_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `lk_contact_form`
--

CREATE TABLE `lk_contact_form` (
  `id_contact_form` int(11) NOT NULL,
  `id_client` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `lk_events_products`
--

CREATE TABLE `lk_events_products` (
  `id_product` int(11) NOT NULL,
  `id_event` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `lk_logs_users`
--

CREATE TABLE `lk_logs_users` (
  `id_client` int(11) NOT NULL,
  `id_log` int(11) NOT NULL
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
  `logs_url` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE `orders` (
  `id_order` int(11) NOT NULL,
  `orders_order_date` datetime NOT NULL,
  `orders_weight` int(11) DEFAULT NULL,
  `orders_price` decimal(4,2) DEFAULT NULL,
  `orders_payed` int(11) DEFAULT NULL,
  `orders_delivered` int(11) DEFAULT NULL,
  `id_gift` int(11) DEFAULT NULL,
  `id_carrier` int(11) NOT NULL,
  `id_client` int(11) NOT NULL
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
  `id_product_category` int(11) NOT NULL,
  `id_wood` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id_product`, `products_name`, `products_description`, `products_price`, `products_weight`, `id_product_category`, `id_wood`) VALUES
(1, 'Pot à crayon', NULL, 20, 200, 2, 2),
(2, 'Bol', 'Fabrique en chantournage', 20, 200, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `products_categories`
--

CREATE TABLE `products_categories` (
  `id_product_category` int(11) NOT NULL,
  `categories` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `products_categories`
--

INSERT INTO `products_categories` (`id_product_category`, `categories`) VALUES
(1, 'Arts de la table'),
(2, 'Bureautique'),
(3, 'Jouets'),
(4, 'Decoration');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `users_id` int(11) NOT NULL,
  `users_admin` int(3) NOT NULL DEFAULT '0',
  `users_category` int(2) NOT NULL DEFAULT '0',
  `users_gender` int(11) DEFAULT NULL,
  `users_lastname` varchar(30) DEFAULT NULL,
  `users_firstname` varchar(30) DEFAULT NULL,
  `users_email` varchar(320) NOT NULL,
  `users_phone_number` char(5) DEFAULT NULL,
  `users_birthdate` date DEFAULT NULL,
  `users_password` varchar(255) DEFAULT NULL,
  `registered_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `validated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `activated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`users_id`, `users_admin`, `users_category`, `users_gender`, `users_lastname`, `users_firstname`, `users_email`, `users_phone_number`, `users_birthdate`, `users_password`, `registered_at`, `validated_at`, `activated_at`) VALUES
(1, 1, 0, 1, 'FERRARIO', 'Loic', 'loicf@gmail.com', '', '1982-09-13', 'moi', '2022-09-09 15:44:33', '2022-09-09 15:44:33', '2022-09-12 22:43:54'),
(2, 0, 3, 3, '', '', 'vh@cvxngcb.ocm', '', '1900-01-01', '$2y$10$WrKtFEom.FqyRnfKTVqQQ.wTGOW.p0TdDfq6nUQ3EY0tZvMvmwrbe', '2022-09-12 13:38:25', '2022-09-12 13:38:25', '2022-09-12 13:38:25');

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
(1, 'Frêne'),
(2, 'Chene');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `addresses_ships`
--
ALTER TABLE `addresses_ships`
  ADD PRIMARY KEY (`id_adress_ship`);

--
-- Index pour la table `carriers`
--
ALTER TABLE `carriers`
  ADD PRIMARY KEY (`id_carrier`);

--
-- Index pour la table `carriers_prices`
--
ALTER TABLE `carriers_prices`
  ADD PRIMARY KEY (`id_carriers_price`);

--
-- Index pour la table `contacts_forms`
--
ALTER TABLE `contacts_forms`
  ADD PRIMARY KEY (`id_contact_form`);

--
-- Index pour la table `errors`
--
ALTER TABLE `errors`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id_event`);

--
-- Index pour la table `gifts`
--
ALTER TABLE `gifts`
  ADD PRIMARY KEY (`id_gift`);

--
-- Index pour la table `lk_adresses`
--
ALTER TABLE `lk_adresses`
  ADD PRIMARY KEY (`id_client`,`id_adress_ship`),
  ADD KEY `id_adress_ship` (`id_adress_ship`);

--
-- Index pour la table `lk_carriers_prices`
--
ALTER TABLE `lk_carriers_prices`
  ADD PRIMARY KEY (`id_carrier`,`id_carriers_price`),
  ADD KEY `id_carriers_price` (`id_carriers_price`);

--
-- Index pour la table `lk_contact_form`
--
ALTER TABLE `lk_contact_form`
  ADD PRIMARY KEY (`id_contact_form`,`id_client`),
  ADD KEY `id_client` (`id_client`);

--
-- Index pour la table `lk_events_products`
--
ALTER TABLE `lk_events_products`
  ADD PRIMARY KEY (`id_product`,`id_event`),
  ADD KEY `id_event` (`id_event`);

--
-- Index pour la table `lk_logs_users`
--
ALTER TABLE `lk_logs_users`
  ADD PRIMARY KEY (`id_client`,`id_log`),
  ADD KEY `id_log` (`id_log`);

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
  ADD PRIMARY KEY (`id_log`);

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_gift` (`id_gift`),
  ADD KEY `id_carrier` (`id_carrier`),
  ADD KEY `id_client` (`id_client`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `id_product_category` (`id_product_category`),
  ADD KEY `id_wood` (`id_wood`);

--
-- Index pour la table `products_categories`
--
ALTER TABLE `products_categories`
  ADD PRIMARY KEY (`id_product_category`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`);

--
-- Index pour la table `woods`
--
ALTER TABLE `woods`
  ADD PRIMARY KEY (`id_wood`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `addresses_ships`
--
ALTER TABLE `addresses_ships`
  MODIFY `id_adress_ship` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `carriers`
--
ALTER TABLE `carriers`
  MODIFY `id_carrier` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `carriers_prices`
--
ALTER TABLE `carriers_prices`
  MODIFY `id_carriers_price` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `contacts_forms`
--
ALTER TABLE `contacts_forms`
  MODIFY `id_contact_form` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `errors`
--
ALTER TABLE `errors`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `products_categories`
--
ALTER TABLE `products_categories`
  MODIFY `id_product_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `woods`
--
ALTER TABLE `woods`
  MODIFY `id_wood` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `lk_adresses`
--
ALTER TABLE `lk_adresses`
  ADD CONSTRAINT `lk_adresses_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `users` (`users_id`),
  ADD CONSTRAINT `lk_adresses_ibfk_2` FOREIGN KEY (`id_adress_ship`) REFERENCES `addresses_ships` (`id_adress_ship`);

--
-- Contraintes pour la table `lk_carriers_prices`
--
ALTER TABLE `lk_carriers_prices`
  ADD CONSTRAINT `lk_carriers_prices_ibfk_1` FOREIGN KEY (`id_carrier`) REFERENCES `carriers` (`id_carrier`),
  ADD CONSTRAINT `lk_carriers_prices_ibfk_2` FOREIGN KEY (`id_carriers_price`) REFERENCES `carriers_prices` (`id_carriers_price`);

--
-- Contraintes pour la table `lk_contact_form`
--
ALTER TABLE `lk_contact_form`
  ADD CONSTRAINT `lk_contact_form_ibfk_1` FOREIGN KEY (`id_contact_form`) REFERENCES `contacts_forms` (`id_contact_form`),
  ADD CONSTRAINT `lk_contact_form_ibfk_2` FOREIGN KEY (`id_client`) REFERENCES `users` (`users_id`);

--
-- Contraintes pour la table `lk_events_products`
--
ALTER TABLE `lk_events_products`
  ADD CONSTRAINT `lk_events_products_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`),
  ADD CONSTRAINT `lk_events_products_ibfk_2` FOREIGN KEY (`id_event`) REFERENCES `events` (`id_event`);

--
-- Contraintes pour la table `lk_logs_users`
--
ALTER TABLE `lk_logs_users`
  ADD CONSTRAINT `lk_logs_users_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `users` (`users_id`),
  ADD CONSTRAINT `lk_logs_users_ibfk_2` FOREIGN KEY (`id_log`) REFERENCES `logs` (`id_log`);

--
-- Contraintes pour la table `lk_products_orders`
--
ALTER TABLE `lk_products_orders`
  ADD CONSTRAINT `lk_products_orders_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id_order`),
  ADD CONSTRAINT `lk_products_orders_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`);

--
-- Contraintes pour la table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_gift`) REFERENCES `gifts` (`id_gift`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`id_carrier`) REFERENCES `carriers` (`id_carrier`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`id_client`) REFERENCES `users` (`users_id`);

--
-- Contraintes pour la table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`id_product_category`) REFERENCES `products_categories` (`id_product_category`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`id_wood`) REFERENCES `woods` (`id_wood`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
