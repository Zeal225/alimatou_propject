-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 08 Septembre 2020 à 22:46
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `restaurant`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `id_client` int(100) NOT NULL AUTO_INCREMENT,
  `nom_client` varchar(50) NOT NULL,
  `prenoms_client` varchar(100) NOT NULL,
  `email_client` varchar(100) NOT NULL,
  `mot_de_passe_client` varchar(50) NOT NULL,
  `conf_mot_de_passe_client` varchar(50) NOT NULL,
  `adresse_livraison_client` varchar(100) NOT NULL,
  PRIMARY KEY (`id_client`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`id_client`, `nom_client`, `prenoms_client`, `email_client`, `mot_de_passe_client`, `conf_mot_de_passe_client`, `adresse_livraison_client`) VALUES
(20, 'COULY', 'ALIMA', 'coulibalyalia@gmail.com', 'Bonjour', 'Bonjour', ''),
(21, 'AFSATOU', 'COULIBALY', 'coulibalyafsa@gmail.com', 'Afsa', 'Afsa', '');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE IF NOT EXISTS `commande` (
  `id_cmd` int(10) NOT NULL AUTO_INCREMENT,
  `date_cmd` date NOT NULL,
  PRIMARY KEY (`id_cmd`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `coupon`
--

CREATE TABLE IF NOT EXISTS `coupon` (
  `id_coupon` int(20) NOT NULL AUTO_INCREMENT,
  `libelle_coupon` varchar(20) NOT NULL,
  PRIMARY KEY (`id_coupon`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=70 ;

--
-- Contenu de la table `coupon`
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
-- Structure de la table `entree_produit`
--

CREATE TABLE IF NOT EXISTS `entree_produit` (
  `id_entree_produit` int(10) NOT NULL AUTO_INCREMENT,
  `date_entree_produit` date NOT NULL,
  `qte_entree_produit` int(10) NOT NULL,
  PRIMARY KEY (`id_entree_produit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL DEFAULT '0',
  `remise` int(3) NOT NULL,
  `prix` float NOT NULL DEFAULT '0',
  `id_cmd` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_cmd` (`id_cmd`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=46 ;

--
-- Contenu de la table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `remise`, `prix`, `id_cmd`) VALUES
(10, 'HAMBURGER SPYCY', 6650, 5, 7000, 0),
(11, 'BIG HAMBURGER', 5915, 9, 6500, 0),
(12, 'HAMBURGER STEAK', 3760, 6, 4000, 0),
(13, 'BURGER CRISPY', 5400, 10, 6000, 0),
(14, 'PIZZA', 8500, 15, 10000, 0),
(15, 'MANAICHE', 7120, 11, 8000, 0),
(16, 'PIZZA', 7500, 25, 10000, 0),
(17, 'PIZZA JAMBON CRU', 7200, 10, 8000, 0),
(18, 'PIZZA VEGETARIEN AUX LEGUMES', 9500, 5, 10000, 0),
(19, 'PIZZA MAGARITA', 9215, 3, 9500, 0),
(20, 'PIZZA AUX CHAMPIGNONS', 6650, 5, 7000, 0),
(30, 'ICE CREAM VANILLE', 1000, 0, 1000, 0),
(31, 'ICE CREAM AMERICAINE', 1000, 0, 1000, 0),
(32, 'ICE CREAM FRAISE', 1000, 0, 1000, 0),
(33, 'ICE CREAM OREO', 1000, 0, 1000, 0),
(34, 'ICE CREAM PASSION', 1000, 0, 1000, 0),
(35, 'ICE CREAM KINDER', 1000, 0, 1000, 0),
(36, 'ICE CREAM CHOCOLAT', 1000, 0, 1000, 0),
(38, 'ICE CREAM PRALINE/NOISETTE', 1000, 0, 1000, 0),
(39, 'ICE CREAM RHUM RAISIN', 1000, 0, 1000, 0),
(45, '', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE IF NOT EXISTS `produit` (
  `id_produit` int(10) NOT NULL AUTO_INCREMENT,
  `id_entree_produit` varchar(10) NOT NULL,
  `libelle_produit` varchar(50) NOT NULL,
  `cat_produit` varchar(50) NOT NULL,
  PRIMARY KEY (`id_produit`),
  KEY `id_entree_produit` (`id_entree_produit`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`id_produit`, `id_entree_produit`, `libelle_produit`, `cat_produit`) VALUES
(1, '0', 'ail', 'VÃ©gÃ©taux (LÃ©gumes)'),
(2, '0', 'ail', 'VÃ©gÃ©taux (LÃ©gumes)'),
(3, '0', 'ail', 'Charcuterie'),
(4, '0', 'ail', 'VÃ©gÃ©taux (LÃ©gumes)'),
(5, '0', 'ail', 'VÃ©gÃ©taux (LÃ©gumes)');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
