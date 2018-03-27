-- phpMyAdmin SQL Dump
-- version 4.3.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Mar 28 Juillet 2015 à 02:52
-- Version du serveur :  5.5.42
-- Version de PHP :  5.6.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `vinostar`
--

-- --------------------------------------------------------

--
-- Structure de la table `content`
--

CREATE TABLE `content` (
  `id` int(11) NOT NULL,
  `attribut` varchar(150) NOT NULL,
  `title_fr` varchar(150) DEFAULT NULL,
  `title_en` varchar(150) DEFAULT NULL,
  `text_fr` text,
  `text_en` text,
  `button_fr` varchar(150) DEFAULT NULL,
  `button_en` varchar(150) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `content`
--

INSERT INTO `content` (`id`, `attribut`, `title_fr`, `title_en`, `text_fr`, `text_en`, `button_fr`, `button_en`) VALUES
(1, 'about1', 'Lorem ipsum dolor ?', 'Lorem ipsum dolor ? en', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo harum voluptas non repudiandae veniam ex assumenda pariatur mollitia similique excepturi. In voluptate, earum minus voluptatibus vel, architecto corporis fugiat mollitia!', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo harum voluptas non repudiandae veniam ex assumenda pariatur mollitia similique excepturi. In voluptate, earum minus voluptatibus vel, architecto corporis fugiat mollitia! en', 'contactez nous !', 'contact us !'),
(2, 'about2', 'Lorem ipsum dolor ?', 'Lorem ipsum dolor ? en', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo harum voluptas non repudiandae veniam ex assumenda pariatur mollitia similique excepturi. In voluptate, earum minus voluptatibus vel, architecto corporis fugiat mollitia!', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo harum voluptas non repudiandae veniam ex assumenda pariatur mollitia similique excepturi. In voluptate, earum minus voluptatibus vel, architecto corporis fugiat mollitia! en', NULL, NULL),
(3, 'service_title1', 'Titre colonne gauche', 'Left column title', NULL, NULL, NULL, NULL),
(4, 'service_1_1', 'Sous titre 1', 'Subtitle 1', 'lorem ipsums dolor', 'lorem ipsums dolor en', NULL, NULL),
(5, 'service_1_2', 'Sous titre 2', 'Subtitle 2', 'lorem ipsums dolor', 'lorem ipsums dolor en', NULL, NULL),
(6, 'service_1_3', 'Sous titre 3', 'Subtitle 3', 'lorem ipsums dolor', 'lorem ipsums dolor en', NULL, NULL),
(7, 'service_title2', 'Titre colonne centrale', 'Central column title', NULL, NULL, NULL, NULL),
(8, 'service_2_1', 'Sous titre 1', 'Subtitle 1', 'lorem ipsums dolor', 'lorem ipsums dolor en', NULL, NULL),
(9, 'service_2_2', 'Sous titre 2', 'Subtitle 2', 'lorem ipsums dolor', 'lorem ipsums dolor en', NULL, NULL),
(10, 'service_2_3', 'Sous titre 3', 'Subtitle 3', 'lorem ipsums dolor', 'lorem ipsums dolor en', NULL, NULL),
(11, 'service_title3', 'Titre colonne de droite', 'Right column title', NULL, NULL, NULL, NULL),
(12, 'service_3_1', 'Sous titre 1', 'Subtitle 1', 'lorem ipsums dolor', 'lorem ipsums dolor en', NULL, NULL),
(13, 'service_3_2', 'Sous titre 2', 'Subtitle 2', 'lorem ipsums dolor', 'lorem ipsums dolor en', NULL, NULL),
(14, 'service_3_3', 'Sous titre 3', 'Subtitle 3', 'lorem ipsums dolor', 'lorem ipsums dolor en', NULL, NULL),
(15, 'news_title', 'Ne ratez plus nos nouveautés, abonnez vous !', 'Don''t mess any news, subscribe !', NULL, NULL, NULL, NULL),
(16, 'section_title', 'A propos', 'About', NULL, NULL, NULL, NULL),
(17, 'section_title', 'Services', 'Services', NULL, NULL, NULL, NULL),
(18, 'section_title', 'Nouveautés', 'News', NULL, NULL, NULL, NULL),
(19, 'section_wine_title', 'Vin', 'Wine', NULL, NULL, NULL, NULL),
(20, 'section_wine_title', 'Région', 'Country', NULL, NULL, NULL, NULL),
(21, 'section_wine_title', 'Vigneron', 'Winemaker', NULL, NULL, NULL, NULL),
(22, 'wine_colg', 'accompagnements', 'accompagnements EN', NULL, NULL, 'Le commander', 'Get it'),
(23, 'wine_cold1', 'Arôme', 'Arôme EN', NULL, NULL, 'Retour aux vins', 'Back to wine list'),
(24, 'wine_cold2', 'La cuvée', 'La cuvée EN', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `home_articles`
--

CREATE TABLE `home_articles` (
  `id` int(10) unsigned NOT NULL,
  `title_fr` varchar(150) NOT NULL,
  `title_en` varchar(150) NOT NULL,
  `text_fr` text NOT NULL,
  `text_en` text NOT NULL,
  `image` varchar(150) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `home_articles`
--

INSERT INTO `home_articles` (`id`, `title_fr`, `title_en`, `text_fr`, `text_en`, `image`, `created_at`) VALUES
(1, 'Titre 1', 'Title 1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo harum voluptas non repudiandae veniam ex assumenda pariatur mollitia similique excepturi. In voluptate, earum minus voluptatibus vel, architecto corporis fugiat mollitia!', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo harum voluptas non repudiandae veniam ex assumenda pariatur mollitia similique excepturi. In voluptate, earum minus voluptatibus vel, architecto corporis fugiat mollitia! en', '', '2015-07-01'),
(2, 'Titre 2', 'Title 2', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo harum voluptas non repudiandae veniam ex assumenda pariatur mollitia similique excepturi. In voluptate, earum minus voluptatibus vel, architecto corporis fugiat mollitia!', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo harum voluptas non repudiandae veniam ex assumenda pariatur mollitia similique excepturi. In voluptate, earum minus voluptatibus vel, architecto corporis fugiat mollitia! en', '', '2015-06-18'),
(3, 'Titre 3', 'Title 3', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo harum voluptas non repudiandae veniam ex assumenda pariatur mollitia similique excepturi. In voluptate, earum minus voluptatibus vel, architecto corporis fugiat mollitia!', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo harum voluptas non repudiandae veniam ex assumenda pariatur mollitia similique excepturi. In voluptate, earum minus voluptatibus vel, architecto corporis fugiat mollitia! en', '', '2015-07-17'),
(15, 'Titre 4', 'Title 4', 'bla', 'bla en', '15.jpg', '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `home_newsletter`
--

CREATE TABLE `home_newsletter` (
  `id` int(11) NOT NULL,
  `email` varchar(150) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `home_newsletter`
--

INSERT INTO `home_newsletter` (`id`, `email`) VALUES
(1, 'erwin.schwartz.etudiant@gmail.com'),
(2, 'erwin.schwartz.pro@gmail.com'),
(3, 'marie.nicolet@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `home_search`
--

CREATE TABLE `home_search` (
  `id` int(10) unsigned NOT NULL,
  `placeholder_fr` varchar(150) NOT NULL,
  `placeholder_en` varchar(150) NOT NULL,
  `button_fr` varchar(150) NOT NULL,
  `button_en` varchar(150) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `home_search`
--

INSERT INTO `home_search` (`id`, `placeholder_fr`, `placeholder_en`, `button_fr`, `button_en`) VALUES
(1, 'Recherche..', 'Search...', 'Rechercher', 'Search');

-- --------------------------------------------------------

--
-- Structure de la table `menu`
--

CREATE TABLE `menu` (
  `id` int(10) unsigned NOT NULL,
  `page_fr` varchar(30) NOT NULL,
  `page_en` varchar(30) NOT NULL,
  `link` varchar(150) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `menu`
--

INSERT INTO `menu` (`id`, `page_fr`, `page_en`, `link`) VALUES
(1, 'vinostar', 'vinostar', 'index.php'),
(2, 'les vignerons', 'the winemakers', 'les_vignerons.php'),
(3, 'les vins', 'the wine', 'les_vins.php'),
(4, 'contact', 'contact', 'contact.php');

-- --------------------------------------------------------

--
-- Structure de la table `slider`
--

CREATE TABLE `slider` (
  `id` int(10) unsigned NOT NULL,
  `title_fr` varchar(150) NOT NULL,
  `title_en` varchar(150) NOT NULL,
  `text_fr` text NOT NULL,
  `text_en` text NOT NULL,
  `textlink_fr` varchar(150) DEFAULT NULL,
  `textlink_en` varchar(150) DEFAULT NULL,
  `link` varchar(150) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `slider`
--

INSERT INTO `slider` (`id`, `title_fr`, `title_en`, `text_fr`, `text_en`, `textlink_fr`, `textlink_en`, `link`, `image`, `created_at`) VALUES
(9, 'Nos Vignerons', 'Our Winemarkers', 'Venez découvrir notre sélection de vignerons français, respectueux de la qualité et de la richesse de la nature.', 'Have a look on our selection of french winemarker, respectful of the quality and the wealth of the nature.', 'Découvrez les vignerons', 'Discover the winemarkers', 'http://localhost:8888/Vinostar_php/les_vignerons.php', '9.jpg', NULL),
(10, 'Nos vins', 'Our wines', 'Venez découvrir notre selection de vin.', 'Come discover our wine selection.', 'Découvrez notre catalogue', 'Discover our  catalog', 'http://localhost:8888/Vinostar_php/les_vins.php', '10.jpg', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL,
  `pseudo` varchar(20) NOT NULL,
  `password` varchar(150) NOT NULL,
  `level` varchar(15) NOT NULL DEFAULT 'user',
  `created_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `password`, `level`, `created_at`) VALUES
(1, 'superadmin', 'e9199ade6b932bbcabc0ca5f633923c5a4f91b9c211c39b8d96a258520170bd6020d4d9e18165dd618c444d185284d8f11f4fb1e971f3ed129e80213dc988e5f', 'superadmin', '2015-06-15 00:00:00'),
(26, 'user', 'd8e0154c42ec5b764e750bb9d41f2780024ef8561388e693736ed8269b6a2142dd6525944014fcfdd5831cbbbb5b476d8258d4ee5ec6662be58f10ba9a002274', 'user', '0000-00-00 00:00:00'),
(27, 'Blaeste', '47e871620a74ae9adc4272b0a945d0e9d5619bffccc8d44aa25a933a114ba3d0d7e9b2abfc1d0fae1b19a8ea27685009023b67cee364ebfc7bf4e6403ae7ed82', 'admin', '0000-00-00 00:00:00'),
(28, 'Exou', '86a0a838819d2bae75511cb98798c6814a1f777980868878d9247f379f49d0c82d2f0e24ad84a765246ede945913c07651db5533043cf0abe204b2ece4d27134', 'admin', '0000-00-00 00:00:00'),
(29, 'test', 'bf15e29de46cbcedd29fcf78d79eec3e43b9bf5ceaade13f5fc73bfefe3feaa12c98102da02a751302623836943bae6124f101d5761cfae45d9312c5fb27a777', 'user', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `vignerons`
--

CREATE TABLE `vignerons` (
  `id` int(10) unsigned NOT NULL,
  `nom` varchar(150) NOT NULL,
  `region` varchar(150) NOT NULL,
  `histoire_fr` text NOT NULL,
  `histoire_en` text NOT NULL,
  `domaine_fr` text NOT NULL,
  `domaine_en` text NOT NULL,
  `citation_fr` varchar(150) NOT NULL,
  `citation_en` varchar(150) NOT NULL,
  `adresse` varchar(200) NOT NULL,
  `coordonee` varchar(150) NOT NULL,
  `mail` varchar(150) NOT NULL,
  `tel` varchar(50) NOT NULL,
  `img` varchar(150) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `vignerons`
--

INSERT INTO `vignerons` (`id`, `nom`, `region`, `histoire_fr`, `histoire_en`, `domaine_fr`, `domaine_en`, `citation_fr`, `citation_en`, `adresse`, `coordonee`, `mail`, `tel`, `img`) VALUES
(1, 'Arnaud de Villaneuve', 'Provence', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate. EN', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate. EN', 'lorem', 'lorem EN', 'Scea Les Mesclances 3583 Chemin du Moulin Premier - 83260 La Crau, France', '43.154629, 6.122239', 'arnauddevilleneuve@me.com', '+33 4 94 12 10 95', ''),
(2, 'Jean-Luc Burguet', 'Bourgogne', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate. EN', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate. EN', 'lorem', 'lorem EN', 'SARL Burguet Alain 18 rue de L''Eglise 21220 Gevrey Chambertin, France', '47.226513, 4.968056', 'domainealainburguet@wanadoo.fr', '+33 3 80 79 29 90', ''),
(3, 'Patricia Teiller', 'Pays de la Loire', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate. EN', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate. EN', 'lorem', 'loren EN', '13 route de la Gare 18510 Menetou-Salon ', '47.231076, 2.613936', 'domaine-Teiller@wanadoo.fr', '+33 2 48 64 80 71', ''),
(4, 'Jean Luc Terrier', 'Bourgogne', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate. EN', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate. EN', 'lorem', 'lorem EN', 'La Cuette- Route D54- 71960 Davaye', '46.299179, 4.756233', 'fterrier@collovrayterrier.com', '+33 3 85 35 86 51', ''),
(5, 'Laurent Juillot', 'Bourgogne', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate. EN', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate. EN', 'lorem', 'lorem EN', '59 Grande Rue - 71640 Mercurey, France', '46.834229, 4.721714', 'sylviane@domaine-michel-juillot.fr', '+33 3 85 98 99 89', ''),
(6, 'Phillipe Viret', 'Côtes du Rhône', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate. EN', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate. EN', 'lorem', 'lorem EN', 'EARL Clos du Paradis, domaine Viret, 26110 Saint Maurice-sur-Eygues', '44.304753, 4.999068', 'domaineviret@domaine-viret.com', '+33 4 75 27 62 77', '');

-- --------------------------------------------------------

--
-- Structure de la table `wine`
--

CREATE TABLE `wine` (
  `id` int(11) NOT NULL,
  `attribut` varchar(150) NOT NULL,
  `name` varchar(150) NOT NULL,
  `vigneron` varchar(150) NOT NULL,
  `robe` varchar(150) NOT NULL,
  `ab` tinyint(1) NOT NULL DEFAULT '0',
  `bi` tinyint(1) NOT NULL DEFAULT '0',
  `vn` tinyint(1) NOT NULL DEFAULT '0',
  `ar` tinyint(1) NOT NULL DEFAULT '0',
  `ap` tinyint(1) NOT NULL DEFAULT '0',
  `vr` tinyint(1) NOT NULL DEFAULT '0',
  `g` tinyint(1) NOT NULL DEFAULT '0',
  `gi` tinyint(1) NOT NULL DEFAULT '0',
  `vb` tinyint(1) NOT NULL DEFAULT '0',
  `vp` tinyint(1) NOT NULL DEFAULT '0',
  `po` tinyint(1) NOT NULL DEFAULT '0',
  `f` tinyint(1) NOT NULL DEFAULT '0',
  `forc` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `acidite` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `duree` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `sucre` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `tanim` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `persistance` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `region` varchar(150) NOT NULL,
  `year` decimal(10,0) NOT NULL,
  `prix` decimal(10,2) NOT NULL,
  `arome_fr` text NOT NULL,
  `arome_en` text NOT NULL,
  `cuve_fr` text NOT NULL,
  `cuve_en` text NOT NULL,
  `img` varchar(150) NOT NULL,
  `imgwine` varchar(150) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `wine`
--

INSERT INTO `wine` (`id`, `attribut`, `name`, `vigneron`, `robe`, `ab`, `bi`, `vn`, `ar`, `ap`, `vr`, `g`, `gi`, `vb`, `vp`, `po`, `f`, `forc`, `acidite`, `duree`, `sucre`, `tanim`, `persistance`, `region`, `year`, `prix`, `arome_fr`, `arome_en`, `cuve_fr`, `cuve_en`, `img`, `imgwine`, `created_at`) VALUES
(1, 'new', 'bahhaha', 'Jean Luc Terrier', 'rouge', 1, 0, 1, 0, 0, 1, 0, 1, 0, 1, 0, 0, 90, 10, 5, 100, 20, 30, 'Savoie | Bugey', '2011', '20.00', 'Cultivés dans les régions au climat frais le Riesling développe des arômes de fruits verts (pomme verte), des notes florales et quelques pointes d’agrumes (citron, citron vert). L’acidité est élevée. Dans les régions tempérées, les arômes d’agrumes (citron vert) et de fruits à noyaux (pêche) dominent. L’acidité est moins présente. Le Riesling, par la construction lente du sucre et une bonne acidité, est un cépage idéal pour les vendanges tardives. Les vins développeront des arômes de fruits à noyaux (pêche, abricot) et de fruits exotiques (ananas, mangue). En vieillissant en bouteille les Riesling acquièrent des arômes de miel et de pain grillé, les très vieux Riesling pouvant développer des arômes fumés qui rappellent le pétrole.', 'Cultivés dans les régions au climat frais le Riesling développe des arômes de fruits verts (pomme verte), des notes florales et quelques pointes d’agrumes (citron, citron vert). L’acidité est élevée. Dans les régions tempérées, les arômes d’agrumes (citron vert) et de fruits à noyaux (pêche) dominent. L’acidité est moins présente. Le Riesling, par la construction lente du sucre et une bonne acidité, est un cépage idéal pour les vendanges tardives. Les vins développeront des arômes de fruits à noyaux (pêche, abricot) et de fruits exotiques (ananas, mangue). En vieillissant en bouteille les Riesling acquièrent des arômes de miel et de pain grillé, les très vieux Riesling pouvant développer des arômes fumés qui rappellent le pétrole. EN', 'Surplombant la cité médiévale de Turckheim, ce coteau granitique bénéficie d''un ensoleillement remarquable. C''est sur cette "terre de feu" que la légende situe le combat entre le soleil et un dragon. Cette bataille mit le feu à la colline occupée par la forêt et au printemps suivant la vigne apparut.', 'Surplombant la cité médiévale de Turckheim, ce coteau granitique bénéficie d''un ensoleillement remarquable. C''est sur cette "terre de feu" que la légende situe le combat entre le soleil et un dragon. Cette bataille mit le feu à la colline occupée par la forêt et au printemps suivant la vigne apparut. EN', 'v1.jpg', '', '2015-07-21'),
(2, 'new', 'test2', 'Jean-Luc Burguet', 'blanc', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'alsace2', '2020', '31.70', 'Cultivés dans les régions au climat frais le Riesling développe des arômes de fruits verts (pomme verte), des notes florales et quelques pointes d’agrumes (citron, citron vert). L’acidité est élevée. Dans les régions tempérées, les arômes d’agrumes (citron vert) et de fruits à noyaux (pêche) dominent. L’acidité est moins présente. Le Riesling, par la construction lente du sucre et une bonne acidité, est un cépage idéal pour les vendanges tardives. Les vins développeront des arômes de fruits à noyaux (pêche, abricot) et de fruits exotiques (ananas, mangue). En vieillissant en bouteille les Riesling acquièrent des arômes de miel et de pain grillé, les très vieux Riesling pouvant développer des arômes fumés qui rappellent le pétrole.', 'Cultivés dans les régions au climat frais le Riesling développe des arômes de fruits verts (pomme verte), des notes florales et quelques pointes d’agrumes (citron, citron vert). L’acidité est élevée. Dans les régions tempérées, les arômes d’agrumes (citron vert) et de fruits à noyaux (pêche) dominent. L’acidité est moins présente. Le Riesling, par la construction lente du sucre et une bonne acidité, est un cépage idéal pour les vendanges tardives. Les vins développeront des arômes de fruits à noyaux (pêche, abricot) et de fruits exotiques (ananas, mangue). En vieillissant en bouteille les Riesling acquièrent des arômes de miel et de pain grillé, les très vieux Riesling pouvant développer des arômes fumés qui rappellent le pétrole. EN', 'Surplombant la cité médiévale de Turckheim, ce coteau granitique bénéficie d''un ensoleillement remarquable. C''est sur cette "terre de feu" que la légende situe le combat entre le soleil et un dragon. Cette bataille mit le feu à la colline occupée par la forêt et au printemps suivant la vigne apparut.', 'Surplombant la cité médiévale de Turckheim, ce coteau granitique bénéficie d''un ensoleillement remarquable. C''est sur cette "terre de feu" que la légende situe le combat entre le soleil et un dragon. Cette bataille mit le feu à la colline occupée par la forêt et au printemps suivant la vigne apparut. EN', 'v2.jpg', '', '2015-07-08'),
(3, 'new', 'Le Maximator', 'Jean-Luc Burguet', 'champagne', 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Lorraine', '1430', '12000.00', 'Culgh fhh h ghj', 'Cultivés dans les régions au climat frais le Riesling développe des arômes de fruits verts (pomme verte), des notes florales et quelques pointes d’agrumes (citron, citron vert). L’acidité est élevée. Dans les régions tempérées, les arômes d’agrumes (citron vert) et de fruits à noyaux (pêche) dominent. L’acidité est moins présente. Le Riesling, par la construction lente du sucre et une bonne acidité, est un cépage idéal pour les vendanges tardives. Les vins développeront des arômes de fruits à noyaux (pêche, abricot) et de fruits exotiques (ananas, mangue). En vieillissant en bouteille les Riesling acquièrent des arômes de miel et de pain grillé, les très vieux Riesling pouvant développer des arômes fumés qui rappellent le pétrole. EN', 'Surplombant la cité médiévale de Turckheim, ce coteau granitique bénéficie d''un ensoleillement remarquable. C''est sur cette "terre de feu" que la légende situe le combat entre le soleil et un dragon. Cette bataille mit le feu à la colline occupée par la forêt et au printemps suivant la vigne apparut.', 'Surplombant la cité médiévale de Turckheim, ce coteau granitique bénéficie d''un ensoleillement remarquable. C''est sur cette "terre de feu" que la légende situe le combat entre le soleil et un dragon. Cette bataille mit le feu à la colline occupée par la forêt et au printemps suivant la vigne apparut. EN', 'v3.jpg', '', '2015-07-08'),
(7, 'normal', 'Pinot gris', 'Arnaud de Villaneuve', 'blanc', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Savoie | Bugey', '2011', '25.00', 'Cultivés dans les régions au climat frais le Riesling développe des arômes de fruits verts (pomme verte), des notes florales et quelques pointes d’agrumes (citron, citron vert). L’acidité est élevée. Dans les régions tempérées, les arômes d’agrumes (citron vert) et de fruits à noyaux (pêche) dominent. L’acidité est moins présente. Le Riesling, par la construction lente du sucre et une bonne acidité, est un cépage idéal pour les vendanges tardives. Les vins développeront des arômes de fruits à noyaux (pêche, abricot) et de fruits exotiques (ananas, mangue). En vieillissant en bouteille les Riesling acquièrent des arômes de miel et de pain grillé, les très vieux Riesling pouvant développer des arômes fumés qui rappellent le pétrole. TEST', 'Cultivés dans les régions au climat frais le Riesling développe des arômes de fruits verts (pomme verte), des notes florales et quelques pointes d’agrumes (citron, citron vert). L’acidité est élevée. Dans les régions tempérées, les arômes d’agrumes (citron vert) et de fruits à noyaux (pêche) dominent. L’acidité est moins présente. Le Riesling, par la construction lente du sucre et une bonne acidité, est un cépage idéal pour les vendanges tardives. Les vins développeront des arômes de fruits à noyaux (pêche, abricot) et de fruits exotiques (ananas, mangue). En vieillissant en bouteille les Riesling acquièrent des arômes de miel et de pain grillé, les très vieux Riesling pouvant développer des arômes fumés qui rappellent le pétrole. EN', 'Surplombant la cité médiévale de Turckheim, ce coteau granitique bénéficie d''un ensoleillement remarquable. C''est sur cette "terre de feu" que la légende situe le combat entre le soleil et un dragon. Cette bataille mit le feu à la colline occupée par la forêt et au printemps suivant la vigne apparut. TEST', 'Surplombant la cité médiévale de Turckheim, ce coteau granitique bénéficie d''un ensoleillement remarquable. C''est sur cette "terre de feu" que la légende situe le combat entre le soleil et un dragon. Cette bataille mit le feu à la colline occupée par la forêt et au printemps suivant la vigne apparut. EN', 'v4.jpg', '', '0000-00-00'),
(8, 'normal', 'Pinot grissd', 'Arnaud de Villaneuve', 'blanc', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Savoie | Bugey', '2011', '25.00', 'Cultivés dans les régions au climat frais le Riesling développe des arômes de fruits verts (pomme verte), des notes florales et quelques pointes d’agrumes (citron, citron vert). L’acidité est élevée. Dans les régions tempérées, les arômes d’agrumes (citron vert) et de fruits à noyaux (pêche) dominent. L’acidité est moins présente. Le Riesling, par la construction lente du sucre et une bonne acidité, est un cépage idéal pour les vendanges tardives. Les vins développeront des arômes de fruits à noyaux (pêche, abricot) et de fruits exotiques (ananas, mangue). En vieillissant en bouteille les Riesling acquièrent des arômes de miel et de pain grillé, les très vieux Riesling pouvant développer des arômes fumés qui rappellent le pétrole. TEST', 'Cultivés dans les régions au climat frais le Riesling développe des arômes de fruits verts (pomme verte), des notes florales et quelques pointes d’agrumes (citron, citron vert). L’acidité est élevée. Dans les régions tempérées, les arômes d’agrumes (citron vert) et de fruits à noyaux (pêche) dominent. L’acidité est moins présente. Le Riesling, par la construction lente du sucre et une bonne acidité, est un cépage idéal pour les vendanges tardives. Les vins développeront des arômes de fruits à noyaux (pêche, abricot) et de fruits exotiques (ananas, mangue). En vieillissant en bouteille les Riesling acquièrent des arômes de miel et de pain grillé, les très vieux Riesling pouvant développer des arômes fumés qui rappellent le pétrole. EN', 'Surplombant la cité médiévale de Turckheim, ce coteau granitique bénéficie d''un ensoleillement remarquable. C''est sur cette "terre de feu" que la légende situe le combat entre le soleil et un dragon. Cette bataille mit le feu à la colline occupée par la forêt et au printemps suivant la vigne apparut. TEST', 'Surplombant la cité médiévale de Turckheim, ce coteau granitique bénéficie d''un ensoleillement remarquable. C''est sur cette "terre de feu" que la légende situe le combat entre le soleil et un dragon. Cette bataille mit le feu à la colline occupée par la forêt et au printemps suivant la vigne apparut. EN', 'v5.jpg', '', '0000-00-00'),
(9, 'normal', 'Le cruso', 'Jean-Luc Burguet', 'rouge', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 74, 21, 63, 50, 50, 50, 'Alsace', '1800', '24.00', 'test', 'test en', 'test', 'test en', '', '', '0000-00-00'),
(10, 'normal', 'hjklm', 'Arnaud de Villaneuve', 'blanc', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Lorraine', '1789', '28.00', 'e', 'e', 'e', 'e', '', '', '0000-00-00'),
(12, 'normal', 'ds', 'Patricia Teiller', 'blanc', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 'Alsace', '1199', '12.00', 'sd', 'sd', 'sd', 'sd', '', '', '0000-00-00'),
(13, 'normal', 'sdsd', 'Patricia Teiller', 'champagne', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Savoie | Bugey', '1111', '89.00', 'sd', 'sd', 'sd', 'df', '', '', '0000-00-00'),
(14, 'normal', 'sdsdss', 'Patricia Teiller', 'champagne', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Savoie | Bugey', '1111', '89.00', 'sd', 'sd', 'sd', 'df', '', '', '0000-00-00'),
(15, 'normal', 'ggg', 'Jean Luc Terrier', 'blanc', 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Bordeaux', '1998', '9.00', 'sd', 'sfg', 'gh', 'd', '', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `winemaker`
--

CREATE TABLE `winemaker` (
  `id` int(11) NOT NULL,
  `attribut` varchar(150) NOT NULL,
  `title_fr` varchar(150) DEFAULT NULL,
  `title_en` varchar(150) DEFAULT NULL,
  `text_fr` text,
  `text_en` text,
  `button_fr` varchar(150) DEFAULT NULL,
  `button_en` varchar(150) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `winemaker`
--

INSERT INTO `winemaker` (`id`, `attribut`, `title_fr`, `title_en`, `text_fr`, `text_en`, `button_fr`, `button_en`) VALUES
(1, 'title', 'Nos vignerons', 'Our winemarker', NULL, NULL, NULL, NULL),
(2, 'bloc1', 'Des vignerons français', 'French winemaker', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Maute irure dolor in.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Maute irure dolor in. en', NULL, NULL),
(3, 'bloc2', 'Leur Histoire', 'Their history', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis. Mostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis. Mostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. en', 'voir la galerie', 'Watch the galery'),
(4, 'carte', 'Explorez', 'Explore', 'Les vignobles français', 'the french winefield', NULL, NULL),
(5, 'vigneronpersotitle1', 'Son Histoire', 'His History', NULL, NULL, NULL, NULL),
(6, 'vigneronpersotitle2', 'Domaine', 'Domain', NULL, NULL, NULL, NULL),
(7, 'vigneronpersotitle3', 'Où le trouver ?', 'Where is he ?', NULL, NULL, NULL, NULL),
(8, 'vigneronpersotitle4', 'Coordonnées', 'Contact', NULL, NULL, NULL, NULL);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `home_articles`
--
ALTER TABLE `home_articles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `home_newsletter`
--
ALTER TABLE `home_newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `home_search`
--
ALTER TABLE `home_search`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `vignerons`
--
ALTER TABLE `vignerons`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `wine`
--
ALTER TABLE `wine`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `winemaker`
--
ALTER TABLE `winemaker`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `content`
--
ALTER TABLE `content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT pour la table `home_articles`
--
ALTER TABLE `home_articles`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT pour la table `home_newsletter`
--
ALTER TABLE `home_newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `home_search`
--
ALTER TABLE `home_search`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT pour la table `vignerons`
--
ALTER TABLE `vignerons`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `wine`
--
ALTER TABLE `wine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT pour la table `winemaker`
--
ALTER TABLE `winemaker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;