-- phpMyAdmin SQL Dump
-- version 4.0.6deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Ven 25 Avril 2014 à 10:08
-- Version du serveur: 5.5.37-0ubuntu0.13.10.1
-- Version de PHP: 5.5.3-1ubuntu2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `restodeg`
--

-- --------------------------------------------------------

--
-- Structure de la table `boissons`
--

CREATE TABLE IF NOT EXISTS `boissons` (
  `id_boisson` int(3) NOT NULL AUTO_INCREMENT,
  `nom_boisson` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contenu_boisson` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tarif_boisson` float DEFAULT NULL,
  PRIMARY KEY (`id_boisson`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Contenu de la table `boissons`
--

INSERT INTO `boissons` (`id_boisson`, `nom_boisson`, `contenu_boisson`, `tarif_boisson`) VALUES
(1, 'sake', 'alcool de riz', 4.5),
(2, 'umeshu', 'alcool neutre aromatisé par macération de prunes de l''abricotier du Japon', 4.5),
(3, 'coca', 'la célèbre boisson coca cola', 3.8),
(4, 'orangina', 'a secouer ou la pulpe reste reste en bas', 3.8),
(5, 'café', 'boisson à base des fameuses graines marrons', 2.8),
(6, 'thé', 'boisson aromatisé par un infusion plus ou moins longue de végétaux', 3.8);

-- --------------------------------------------------------

--
-- Structure de la table `Commandes`
--

CREATE TABLE IF NOT EXISTS `Commandes` (
  `id_cmd` int(11) NOT NULL AUTO_INCREMENT,
  `a_emporter` tinyint(1) DEFAULT NULL,
  `livraison` tinyint(1) DEFAULT NULL,
  `cmd_en_attentes` tinyint(1) DEFAULT NULL,
  `cmd_en_cours` tinyint(1) DEFAULT NULL,
  `cmd_prêtes` tinyint(1) DEFAULT NULL,
  `cmd_livraison_en_cours` tinyint(1) DEFAULT NULL,
  `tarif_cmd` double DEFAULT NULL,
  `users_id_users` mediumint(9) NOT NULL,
  `plats_id_plats` smallint(6) NOT NULL,
  `menus_id_menus` smallint(6) NOT NULL,
  PRIMARY KEY (`id_cmd`),
  UNIQUE KEY `id_commandes_UNIQUE` (`id_cmd`),
  KEY `fk_Commandes_users1_idx` (`users_id_users`),
  KEY `fk_Commandes_plats1_idx` (`plats_id_plats`),
  KEY `fk_Commandes_menus1_idx` (`menus_id_menus`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `desserts`
--

CREATE TABLE IF NOT EXISTS `desserts` (
  `id_dessert` int(3) NOT NULL AUTO_INCREMENT,
  `nom_dessert` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contenu_dessert` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tarif_dessert` float DEFAULT NULL,
  PRIMARY KEY (`id_dessert`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Contenu de la table `desserts`
--

INSERT INTO `desserts` (`id_dessert`, `nom_dessert`, `contenu_dessert`, `tarif_dessert`) VALUES
(1, 'anko', 'une sorte de pâte obtenu à partir d''azuki qui est ensuite sucré avec du miel', 4.95),
(2, 'daifuku', 'daifuku : grande chance, est une sucrerie japonaise a base de mochi(riz glutineux) et rempli au centre avec du anko', 4.95);

-- --------------------------------------------------------

--
-- Structure de la table `entrees`
--

CREATE TABLE IF NOT EXISTS `entrees` (
  `id_entree` int(3) NOT NULL AUTO_INCREMENT,
  `nom_entree` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contenu_entree` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tarif_entree` float DEFAULT NULL,
  PRIMARY KEY (`id_entree`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Contenu de la table `entrees`
--

INSERT INTO `entrees` (`id_entree`, `nom_entree`, `contenu_entree`, `tarif_entree`) VALUES
(1, 'edamame', 'fèves immatures de soja, d''origine japonaise', 2.25),
(2, 'tsukemono', 'légumes macéré dans une saumure, du vinaigre ou encore une solution à base de sake kasu', 2.25);

-- --------------------------------------------------------

--
-- Structure de la table `livre_or`
--

CREATE TABLE IF NOT EXISTS `livre_or` (
  `id_livre_or` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime DEFAULT NULL,
  `commentaires` varchar(45) DEFAULT NULL,
  `users_id_users` mediumint(9) NOT NULL,
  PRIMARY KEY (`id_livre_or`),
  KEY `fk_livre_or_users1_idx` (`users_id_users`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `livre_or`
--

INSERT INTO `livre_or` (`id_livre_or`, `date`, `commentaires`, `users_id_users`) VALUES
(2, '2014-04-24 00:00:00', 'test', 11),
(3, '2014-04-24 00:00:00', 'test', 11),
(4, '2014-04-24 10:56:28', 'test', 11);

-- --------------------------------------------------------

--
-- Structure de la table `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
  `id_menus` smallint(6) NOT NULL,
  `nom_menus` varchar(45) NOT NULL,
  `contenu_menus` varchar(45) DEFAULT NULL,
  `tarif_menu` double NOT NULL,
  `plats_id_plats` smallint(6) NOT NULL,
  PRIMARY KEY (`id_menus`),
  KEY `fk_menus_plats1_idx` (`plats_id_plats`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `plats`
--

CREATE TABLE IF NOT EXISTS `plats` (
  `id_plats` smallint(6) NOT NULL AUTO_INCREMENT,
  `nom_plats` varchar(16) NOT NULL,
  `contenu_plats` varchar(128) DEFAULT NULL,
  `tarif_plats` double NOT NULL,
  PRIMARY KEY (`id_plats`),
  UNIQUE KEY `id_plats_UNIQUE` (`id_plats`),
  UNIQUE KEY `nom_plats_UNIQUE` (`nom_plats`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `plats`
--

INSERT INTO `plats` (`id_plats`, `nom_plats`, `contenu_plats`, `tarif_plats`) VALUES
(1, 'Onigiri thon may', 'riz, algue, thon avec mayonaise', 2),
(2, 'Onigiri saumon', 'riz, algue, saumon', 2),
(3, 'Onigiri bonite', 'riz, algue, bonite', 2),
(4, 'Katsudon', 'porc pané, oeuf, riz', 7.8),
(5, 'Gyuudon', 'lamelles de boeuf, oeuf,oignons, riz', 7.8),
(6, 'Oyakodon', 'poulet oeuf riz dashi mirin suace soja', 7);

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
  `id_reservation` mediumint(9) NOT NULL AUTO_INCREMENT,
  `num_tables` smallint(6) DEFAULT NULL,
  `horaires` datetime NOT NULL,
  `users_id_users` mediumint(9) NOT NULL,
  PRIMARY KEY (`id_reservation`),
  UNIQUE KEY `id_reservation_UNIQUE` (`id_reservation`),
  KEY `fk_reservation_users1_idx` (`users_id_users`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_users` mediumint(9) NOT NULL AUTO_INCREMENT,
  `login` varchar(45) NOT NULL,
  `password` varchar(512) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `email` varchar(45) NOT NULL,
  `nom` varchar(45) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `adresse` varchar(45) NOT NULL,
  `code_postal` varchar(45) NOT NULL,
  `ville` varchar(45) NOT NULL,
  `info_complementaire` varchar(45) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `register_date` datetime NOT NULL,
  `fidel_point` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id_users`),
  UNIQUE KEY `id_users_UNIQUE` (`id_users`),
  UNIQUE KEY `login_UNIQUE` (`login`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id_users`, `login`, `password`, `admin`, `email`, `nom`, `prenom`, `adresse`, `code_postal`, `ville`, `info_complementaire`, `birthday`, `register_date`, `fidel_point`) VALUES
(9, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, 'admin@admin.com', 'Root', 'admin', '27 rue poupoutu', '93252', 'Orgeuil', '', NULL, '1975-05-25 00:00:00', 1),
(10, 'test', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 0, 'test@test.com', 'membre', 'user', '25 rue cafto', '25252', 'bouca', '', NULL, '1985-02-25 00:00:00', 1),
(11, 'tata', '90795a0ffaa8b88c0e250546d8439bc9c31e5a5e', 0, 'tata@tata.com', 'tata', 'tata', 'tata', '25252', 'tata', '', '1990-06-25', '2014-04-24 09:46:26', 1);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `Commandes`
--
ALTER TABLE `Commandes`
  ADD CONSTRAINT `fk_Commandes_menus1` FOREIGN KEY (`menus_id_menus`) REFERENCES `menus` (`id_menus`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Commandes_plats1` FOREIGN KEY (`plats_id_plats`) REFERENCES `plats` (`id_plats`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Commandes_users1` FOREIGN KEY (`users_id_users`) REFERENCES `users` (`id_users`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `livre_or`
--
ALTER TABLE `livre_or`
  ADD CONSTRAINT `fk_livre_or_users1` FOREIGN KEY (`users_id_users`) REFERENCES `users` (`id_users`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `fk_menus_plats1` FOREIGN KEY (`plats_id_plats`) REFERENCES `plats` (`id_plats`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `fk_reservation_users1` FOREIGN KEY (`users_id_users`) REFERENCES `users` (`id_users`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
