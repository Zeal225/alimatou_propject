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
  `mot_de_passe_client` varchar(50) NOT NULL,
  `conf_mot_de_passe_client` varchar(50) NOT NULL,
  `adresse_livraison_client` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id_client`, `nom_client`, `prenoms_client`, `email_client`, `mot_de_passe_client`, `conf_mot_de_passe_client`, `adresse_livraison_client`) VALUES
(20, 'COULY', 'ALIMA', 'coulibalyalia@gmail.com', 'Bonjour', 'Bonjour', ''),
(21, 'AFSATOU', 'COULIBALY', 'coulibalyafsa@gmail.com', 'Afsa', 'Afsa', '');

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

CREATE TABLE `commande` (
  `id_cmd` int(10) NOT NULL,
  `date_cmd` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL DEFAULT '0',
  `remise` int(3) NOT NULL,
  `prix` float NOT NULL DEFAULT '0',
  `id_cmd` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
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
-- Table structure for table `produit`
--

CREATE TABLE `produit` (
  `id_produit` int(10) NOT NULL,
  `id_entree_produit` varchar(10) NOT NULL,
  `libelle_produit` varchar(50) NOT NULL,
  `cat_produit` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `produit`
--

INSERT INTO `produit` (`id_produit`, `id_entree_produit`, `libelle_produit`, `cat_produit`) VALUES
(1, '0', 'ail', 'VÃ©gÃ©taux (LÃ©gumes)'),
(2, '0', 'ail', 'VÃ©gÃ©taux (LÃ©gumes)'),
(3, '0', 'ail', 'Charcuterie'),
(4, '0', 'ail', 'VÃ©gÃ©taux (LÃ©gumes)'),
(5, '0', 'ail', 'VÃ©gÃ©taux (LÃ©gumes)');

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
(1, 'Tiorna', 'coulibaly', 'tiorna.coulibaly@cinetpay.com', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8'),
(2, 'Jouby', 'coulibaly', 'jouby.coulibaly@cinetpay.com', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8'),
(3, 'Tiorna', 'coulibaly', 'tiorna@gmail.com', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8'),
(4, 'Tiorna', 'coulibaly', 'tiorna1@gmail.com', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8');

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cmd` (`id_cmd`);

--
-- Indexes for table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id_produit`),
  ADD KEY `id_entree_produit` (`id_entree_produit`);

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
  MODIFY `id_client` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `commande`
--
ALTER TABLE `commande`
  MODIFY `id_cmd` int(10) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `produit`
--
ALTER TABLE `produit`
  MODIFY `id_produit` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
