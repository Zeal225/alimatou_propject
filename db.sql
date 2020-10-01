-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 01, 2020 at 12:55 AM
-- Server version: 5.7.26
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id_client` int(100) NOT NULL,
  `nom_client` varchar(50) NOT NULL,
  `prenoms_client` varchar(100) NOT NULL,
  `email_client` varchar(100) NOT NULL,
  `mot_de_passe_client` text NOT NULL,
  `adresse_livraison_client` text NOT NULL,
  `contact` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id_client`, `nom_client`, `prenoms_client`, `email_client`, `mot_de_passe_client`, `adresse_livraison_client`, `contact`) VALUES
(20, 'COULY', 'ALIMA', 'coulibalyalia@gmail.com', 'Bonjour', '', NULL),
(21, 'AFSATOU', 'COULIBALY', 'coulibalyafsa@gmail.com', 'Afsa', '', NULL),
(49, 'Tiorna', 'Coulibaly', 'tiorna.coulibaly@cinetpay.com', '$2y$10$QTEwZqaE8vM7BnczlMt2NuFh55CQwMF2q75PSzHu8eaRr.lEiWUxi', 'Deux plateaux les perles', NULL),
(50, 'Tiorna ins', 'Coulibaly', 'tiorna.coulibaly1@cinetpay.com', '$2y$10$cyxM9.bK5.oTacq9Rq67NOSzT4iR24QjGDwVBrJoqxCyAcUHxrgnu', 'Deux plateaux les perles', '49496794'),
(51, 'Tiorna ins', 'Coulibaly', 'tiorna.coulibaly1@cinetpay.com', '$2y$10$d4Gvm7ELey9idtqItAE3yOxl1UpXvh2jHKnPDSGfu8U.f8UR2Mv..', 'Deux plateaux les perles', NULL),
(52, 'Tiorna ins', 'Coulibaly', 'tiorna.coulibaly1@cinetpay.com', '$2y$10$Luuz5C9WNtNMMLvG1eUUz.YD8tyi6WbiBv4ht0ISa9GkQm2nJKJkm', 'Deux plateaux les perles', NULL),
(53, 'Tiorna ins', 'Coulibaly', 'tiorna.coulibaly1@cinetpay.com', '$2y$10$VGTGQ/Sdwwy3nZd4vkAR8uIzX67XPopwHmJeiT0NqBSDb.RTCcVKa', 'Deux plateaux les perles', NULL),
(54, 'Tiorna ins', 'Coulibaly', 'tiorna.coulibaly1@cinetpay.com', '$2y$10$XPXaxBeUl94Jr9VfMYHEHuCZU3QiYKP5a8aTKMqd.kFAOxi1ykaQ2', 'Deux plateaux les perles', NULL),
(55, 'Tiorna ins', 'Coulibaly', 'tiorna.coulibaly1@cinetpay.com', '$2y$10$10MxIgYtyL.UToTgiCPTcOVCugcLLmFa0oPhkq2RJs2Pb8N1wz2Gm', 'Deux plateaux les perles', NULL),
(56, 'Tiorna ins', 'Coulibaly', 'tiorna.coulibaly1@cinetpay.com', '$2y$10$zfJR9nm4FQz8cA1fpVCRG.iTFl95PFSwpMjdMoN4UQ1CFH3iGbv36', 'Deux plateaux les perles', '49496794'),
(57, 'Tiorna ins', 'Coulibaly', 'tiorna.coulibaly1@cinetpay.com', '$2y$10$n.ZUJtHaFYljv/Q0I.gXTeRkXb9IGNDJw/jn8OZey5Zwky90lZz7a', 'Deux plateaux les perles', '49496794');

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

CREATE TABLE `commande` (
  `id_cmd` int(10) NOT NULL,
  `date_cmd` datetime DEFAULT NULL,
  `montant` float DEFAULT NULL,
  `lieu_livraison` text,
  `status_livraison` varchar(1) DEFAULT 'N',
  `status_paiement` varchar(1) DEFAULT 'N',
  `date_livraison` date DEFAULT NULL,
  `heure_livraison` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `commandes`
--

CREATE TABLE `commandes` (
  `date_cmd` datetime DEFAULT NULL,
  `montant` float DEFAULT NULL,
  `lieu_livraison` text,
  `status_livraison` text,
  `status_paiement` text,
  `date_livraison` date DEFAULT NULL,
  `heure_livraison` text,
  `id_cmd` int(11) NOT NULL,
  `id_client` int(11) DEFAULT NULL,
  `libelle` text,
  `ref_commande` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `commandes`
--

INSERT INTO `commandes` (`date_cmd`, `montant`, `lieu_livraison`, `status_livraison`, `status_paiement`, `date_livraison`, `heure_livraison`, `id_cmd`, `id_client`, `libelle`, `ref_commande`) VALUES
('2020-09-19 14:57:20', 12975, 'Angre Oscars ', 'N', 'N', '2020-09-19', '14:56', 13, NULL, NULL, NULL),
('2020-09-19 15:06:08', 12975, 'Marcory AXB', 'N', 'N', '2020-09-19', '19:06', 14, 5, NULL, NULL),
('2020-09-19 15:15:35', 12975, 'Marcory AXB', 'N', 'N', '2020-09-19', '19:06', 15, 5, NULL, NULL),
('2020-09-19 15:38:19', 12975, 'Marcory AXB', 'N', 'N', '2020-09-19', '15:40', 16, 5, NULL, NULL),
('2020-09-19 15:39:30', 12975, 'Marcory AXB', 'N', 'N', '2020-09-19', '15:40', 17, 5, NULL, NULL),
('2020-09-19 15:40:43', 12975, 'Marcory AXB', 'N', 'N', '2020-09-19', '15:40', 18, 5, NULL, NULL),
('2020-09-19 15:42:52', 12975, 'Marcory AXB', 'N', 'N', '2020-09-19', '15:40', 19, 5, NULL, NULL),
('2020-09-19 16:01:21', 12975, 'Marcory', 'N', 'N', '2020-09-19', '16:04', 20, 5, NULL, NULL),
('2020-09-19 16:02:59', 12975, 'Marcory', 'N', 'N', '2020-09-19', '16:04', 21, 5, NULL, NULL),
('2020-09-19 16:09:48', 12975, 'Marcory', 'N', 'N', '2020-09-19', '16:04', 22, 5, NULL, NULL),
('2020-09-19 16:16:22', 12975, 'Marcory ABC', 'N', 'N', '2020-09-20', '16:20', 23, 5, NULL, NULL),
('2020-09-19 16:16:40', 12975, 'Marcory ABC', 'N', 'N', '2020-09-20', '16:20', 24, 5, NULL, NULL),
('2020-09-19 16:24:08', 12975, 'Marcory ABCD', 'N', 'N', '2020-09-19', '16:29', 25, 5, '0', NULL),
('2020-09-19 16:24:55', 12975, 'Marcory AXBD', 'N', 'N', '2020-09-19', '16:30', 26, 5, 'a:2:{i:0;s:15:\"HAMBURGER STEAK\";i:1;s:14:\"PIZZA MAGARITA\";}', NULL),
('2020-09-19 16:30:17', 12975, 'Marcory AXBG', 'N', 'N', '2020-09-26', '21:30', 27, 5, 'a:2:{i:0;s:15:\"HAMBURGER STEAK\";i:1;s:14:\"PIZZA MAGARITA\";}', NULL),
('2020-09-19 16:33:53', 12975, 'Marcory', 'N', 'N', '2020-09-19', '16:34', 28, 5, 'a:2:{i:0;s:15:\"HAMBURGER STEAK\";i:1;s:14:\"PIZZA MAGARITA\";}', NULL),
('2020-09-19 16:47:14', 100, 'Marcory ABC', 'N', 'Y', '2020-09-19', '16:50', 29, 5, 'a:1:{i:0;s:21:\"Produit de test 100 F\";}', NULL),
('2020-09-19 16:55:07', 100, 'Marcory AXB', 'Y', 'N', '2020-09-19', '19:55', 30, 5, 'a:1:{i:0;s:21:\"Produit de test 100 F\";}', NULL),
('2020-09-26 14:18:13', 1000, 'Marcory AXB', 'N', 'N', '2020-09-26', '14:19', 31, 5, 'a:1:{i:0;s:17:\"ICE CREAM PASSION\";}', NULL),
('2020-09-26 14:18:36', 1000, 'Marcory AXB', 'N', 'N', '2020-09-26', '14:19', 32, 5, 'a:1:{i:0;s:17:\"ICE CREAM PASSION\";}', NULL),
('2020-09-26 14:25:46', 5915, 'Marcory AXB', 'N', 'N', '2020-09-26', '14:25', 33, 5, 'a:1:{i:0;s:13:\"BIG HAMBURGER\";}', NULL),
('2020-09-26 15:54:27', 5915, 'Marcory', 'N', 'N', '2020-09-26', '15:54', 34, 5, 'a:1:{i:0;s:13:\"BIG HAMBURGER\";}', NULL),
('2020-09-26 15:55:57', 5915, 'Marcory', 'N', 'N', '2020-09-03', '15:55', 35, 5, 'a:1:{i:0;s:13:\"BIG HAMBURGER\";}', NULL),
('2020-09-26 15:56:35', 5915, 'Marcory', 'N', 'N', '2020-09-03', '15:55', 36, 5, 'a:1:{i:0;s:13:\"BIG HAMBURGER\";}', NULL),
('2020-09-26 18:41:21', 1000, 'Marcory', 'N', 'N', '2020-09-26', '18:41', 37, 5, 'a:1:{i:0;s:16:\"ICE CREAM FRAISE\";}', NULL),
('2020-09-26 18:44:42', 1000, 'Marcory', 'N', 'N', '2020-09-26', '18:46', 38, 5, 'a:1:{i:0;s:16:\"ICE CREAM FRAISE\";}', NULL),
('2020-09-26 18:46:36', 1000, 'Marcory', 'N', 'N', '2020-09-26', '18:46', 39, 5, 'a:1:{i:0;s:16:\"ICE CREAM FRAISE\";}', NULL),
('2020-09-26 18:46:51', 1000, 'Marcory', 'N', 'N', '2020-09-26', '18:46', 40, 5, 'a:1:{i:0;s:16:\"ICE CREAM FRAISE\";}', NULL),
('2020-09-26 18:47:10', 1000, 'Marcory ABC', 'N', 'N', '2020-09-26', '18:47', 41, 5, 'a:1:{i:0;s:16:\"ICE CREAM FRAISE\";}', NULL),
('2020-09-26 18:51:12', 7120, 'Marcory', 'N', 'N', '2020-09-26', '18:51', 42, 5, 'a:1:{i:0;s:8:\"MANAICHE\";}', NULL),
('2020-09-26 19:18:00', 5915, 'Marcory', 'N', 'N', '2020-09-26', '19:17', 43, 50, 'a:1:{i:0;s:13:\"BIG HAMBURGER\";}', NULL),
('2020-09-26 19:26:29', 5915, 'Marcory', 'Y', 'Y', '2020-09-26', '19:27', 44, 50, 'a:1:{i:0;s:13:\"BIG HAMBURGER\";}', 'CMD-20200926192629'),
('2020-09-26 19:31:19', 5915, 'Marcory', 'Y', 'Y', '2020-09-26', '19:27', 45, 50, 'a:1:{i:0;s:13:\"BIG HAMBURGER\";}', 'CMD-20200926193119'),
('2020-09-26 21:52:26', 5915, 'Marcory ABC', 'N', 'N', '2020-09-26', '21:52', 46, 50, 'a:1:{i:0;s:13:\"BIG HAMBURGER\";}', 'CMD-20200926215226');

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE `coupon` (
  `id_coupon` int(20) NOT NULL,
  `libelle_coupon` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `coupon`
--

INSERT INTO `coupon` (`id_coupon`, `libelle_coupon`) VALUES
(1, 'ADGHJ55'),
(2, 'ADGHJ55'),
(3, 'AEZTRU551'),
(4, ''),
(5, ''),
(6, 'AUJHSD45'),
(7, 'AUJHSD45'),
(8, 'AUJHSD45'),
(9, 'AUJHSD45'),
(10, 'AUJHSD45'),
(11, 'AUJHSD45'),
(12, 'AUJHSD45'),
(13, 'AUJHSD45'),
(14, 'AUJHSD45'),
(15, 'AUJHSD45'),
(16, 'AUJHSD45'),
(17, 'AUJHSD45'),
(18, 'AUJHSD45'),
(19, 'AUJHSD45'),
(20, 'AUJHSD45'),
(21, 'AUJHSD45'),
(22, 'AUJHSD45'),
(23, 'AUJHSD45'),
(24, 'AUJHSD45'),
(25, 'AUJHSD45'),
(26, 'AUJHSD45'),
(27, 'AUJHSD45'),
(28, 'AUJHSD45'),
(29, 'AUJHSD45'),
(30, 'AUJHSD45'),
(31, 'AUJHSD45'),
(32, 'AUJHSD45'),
(33, 'AUJHSD45'),
(34, 'AUJHSD45'),
(35, 'AUJHSD45'),
(36, 'AUJHSD45'),
(37, 'AUJHSD45'),
(38, 'AUJHSD45'),
(39, 'AUJHSD45'),
(40, 'AUJHSD45'),
(41, 'AUJHSD45'),
(42, 'AUJHSD45'),
(43, 'AUJHSD45'),
(44, 'AUJHSD45'),
(45, 'AUJHSD45'),
(46, 'AUJHSD45'),
(47, 'AUJHSD45'),
(48, 'AUJHSD45'),
(49, 'AUJHSD45'),
(50, 'AUJHSD45'),
(51, 'AUJHSD45'),
(52, 'AUJHSD45'),
(53, 'AUJHSD45'),
(54, 'AUJHSD45'),
(55, 'AUJHSD45'),
(56, 'jcjjc44'),
(57, 'AUJHSD45'),
(58, 'AUJHSD45'),
(59, 'AUJHSD45'),
(60, 'jcjjc44'),
(61, 'AUJHSD45'),
(62, 'AUJHSD45'),
(63, 'RIFK8652'),
(64, 'jsdk;'),
(65, 'jcjjc44'),
(66, 'jcjjc44'),
(67, 'jcjjc44'),
(68, 'jcjjc44'),
(69, 'jcjjc44');

-- --------------------------------------------------------

--
-- Table structure for table `entree_produit`
--

CREATE TABLE `entree_produit` (
  `id_entree_produit` int(10) NOT NULL,
  `date_entree_produit` date NOT NULL,
  `qte_entree_produit` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` float DEFAULT '0',
  `remise` int(11) DEFAULT NULL,
  `prix` float DEFAULT '0',
  `images` text,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `remise`, `prix`, `images`, `description`) VALUES
(10, 'HAMBURGER SPYCY', 6650, 5, 7000, '10.jpg', NULL),
(11, 'BIG HAMBURGER', 5915, 9, 6500, '11.jpg', NULL),
(12, 'HAMBURGER STEAK', 3760, 6, 4000, '12.jpg', NULL),
(13, 'BURGER CRISPY', 5400, 10, 6000, '13.jpg', NULL),
(14, 'PIZZA', 8500, 15, 10000, '14.jpg', NULL),
(15, 'MANAICHE', 7120, 11, 8000, '15.jpg', NULL),
(16, 'PIZZA', 7500, 25, 10000, '16.jpg', NULL),
(17, 'PIZZA JAMBON CRU', 7200, 10, 8000, '17.jpg', NULL),
(18, 'PIZZA VEGETARIEN AUX LEGUMES', 9500, 5, 10000, '18.jpg', NULL),
(19, 'PIZZA MAGARITA', 9215, 3, 9500, '19.jpg', NULL),
(20, 'PIZZA AUX CHAMPIGNONS', 6650, 5, 7000, '20.jpg', NULL),
(30, 'ICE CREAM VANILLE', 1000, 0, 1000, '30.jpg', NULL),
(31, 'ICE CREAM AMERICAINE', 1000, 0, 1000, '31.jpg', NULL),
(32, 'ICE CREAM FRAISE', 1000, 0, 1000, '32.jpg', NULL),
(33, 'ICE CREAM OREO', 1000, 0, 1000, '33.jpg', NULL),
(34, 'ICE CREAM PASSION', 1000, 0, 1000, '34.jpg', NULL),
(35, 'ICE CREAM KINDER', 1000, 0, 1000, '35.jpg', NULL),
(36, 'ICE CREAM CHOCOLAT', 1000, 0, 1000, '36.jpg', NULL),
(38, 'ICE CREAM PRALINE/NOISETTE', 1000, 0, 1000, '38.jpg', NULL),
(39, 'ICE CREAM RHUM RAISIN', 1000, 0, 1000, '39.jpg', NULL),
(55, 'Produit de test', 0, NULL, 12000, '13.jpg', 'Produit de test'),
(56, 'Produit de test 100 F', 0, NULL, 20000, '31.jpg', '$uploadfile_front');

-- --------------------------------------------------------

--
-- Table structure for table `produits`
--

CREATE TABLE `produits` (
  `id_produit` int(10) NOT NULL,
  `libelle_produit` varchar(50) NOT NULL,
  `description` text,
  `images` text,
  `prix` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `produits`
--

INSERT INTO `produits` (`id_produit`, `libelle_produit`, `description`, `images`, `prix`) VALUES
(6, 'Produit de test', 'Produit de test', 'teste.png', 12000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`) VALUES
(2, 'Jouby', 'coulibaly', 'jouby.coulibaly@cinetpay.com', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8'),
(6, 'Tiorna', 'coulibaly', 'abe@gmail.com', 'aad889a0318da7a23a4988386806f73cb62d938966e242b887b98f4eff96466f'),
(9, 'Tiorna  Update 2', 'Test gestion', 'tiorna11.coulibaly@cinetpay.com', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8'),
(10, 'Tiorna update', 'coulibaly Update', 'jouby11.coulibaly@cinetpay.com', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`);

--
-- Indexes for table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id_cmd`);

--
-- Indexes for table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`id_cmd`),
  ADD KEY `id_client` (`id_client`);

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`id_coupon`);

--
-- Indexes for table `entree_produit`
--
ALTER TABLE `entree_produit`
  ADD PRIMARY KEY (`id_entree_produit`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id_produit`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `commande`
--
ALTER TABLE `commande`
  MODIFY `id_cmd` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `id_cmd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `id_coupon` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `entree_produit`
--
ALTER TABLE `entree_produit`
  MODIFY `id_entree_produit` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `produits`
--
ALTER TABLE `produits`
  MODIFY `id_produit` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`id_cmd`) REFERENCES `products` (`id`);
