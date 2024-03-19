-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2+deb7u1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Lun 11 Janvier 2016 à 00:25
-- Version du serveur: 5.6.25
-- Version de PHP: 5.4.35

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `fullluck_ok6x`
--

-- --------------------------------------------------------

--
-- Structure de la table `nb_online`
--

CREATE TABLE IF NOT EXISTS `nb_online` (
  `ip` varchar(15) NOT NULL,
  `time` bigint(16) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `nb_online`
--

INSERT INTO `nb_online` (`ip`, `time`) VALUES
('90.20.90.62', 1452468284);

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `autheur` varchar(255) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  `timestamp` bigint(20) NOT NULL,
  `ip` varchar(16) NOT NULL,
  `images` text NOT NULL,
  `badge` varchar(255) NOT NULL,
  `badge2` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `news`
--

INSERT INTO `news` (`id`, `autheur`, `titre`, `contenu`, `timestamp`, `ip`, `images`, `badge`, `badge2`) VALUES
(1, 'admin', '[SUR] Site mis en ligne officiellement !', 'Le site est officiellement en ligne ! Maintenant Ã  vous de partager ce que vous souhaitez avec des sources sÃ»r ou non ! Tous sujet acceptÃ© Ã  condition que vous restiez polie et courtois !\r\n\r\nN''hÃ©sitez pas Ã  partager notre page et Ã  nous rejoindre sur facebook et twitter (sur le cotÃ© ->), pour que les informations soit Ã  profusion !\r\n\r\nImportant : Si l''information est de sources vous devez mettre la balise [SUR] au dÃ©but de votre titre ! Si la balise n''est pas mise, alors la sources n''est pas sÃ»r et donc vous induirez surement en erreur vos futur lecteurs !', 0, '92.160.226.131', 'http://www.zupimages.net/up/15/50/re88.jpg', '/img/badge/admin.png', ''),
(2, 'TOMCO984', '[SUR] Chute du Bitcoin', 'Le cours du Bitcoin a chutÃ© brutalement et Ã  perdu 9% en seulement 1 jour (35â‚¬).\r\n\r\nLe 26/12 le Bitcoin Ã©tait Ã  415â‚¬\r\n\r\nActuellement (27/12) le bitcoin est Ã  385â‚¬  et Ã  l''air de s''Ãªtre un peu stabilisÃ© mais rien n''est sure et cela est probable qu''il continu dans sa chute.', 0, '90.53.70.119', 'https://bitcoin.org/img/icons/opengraph.png', '/img/badge/user.png', ''),
(3, 'admin', '[SUR] La sÃ©curitÃ© des mots de passe', 'Les mots de passe sont cryptÃ© avec un systÃ¨me qu''on appel SALTS. Cette fonction permet de crypter le mot de passe avec un suffixe et un prÃ©fixe, donc il est impossible Ã  dÃ©crypter.\r\n\r\nLe principe est simple ! Le mot de passe est cryptÃ© comme ceci : SUFFIXE.MOTDEPASSE.PREFIXE\r\n\r\nPour le dÃ©crypter  il faudrait Ã©ventuellement savoir le suffixe et le prÃ©fixe, mais mÃªme avec cela, il vous faudrait le mot de passe de l''utilisateur car il est cryptÃ© avec le suffixe et le prÃ©fixe, donc une chaine de caractÃ¨re bien spÃ©cifique a lui mÃªme.\r\n\r\nSur ce site nous utilisons ce systÃ¨me lÃ  pour que nos utilisateurs soit en pleine confiance et que mÃªme si quelqu''un venais Ã  entrer dans nos bases de donnÃ©es qu''il ne puisse pas avoir accÃ¨s Ã  votre compte !', 0, '90.19.120.82', 'http://khalifa-chokri.com/ck/wp-content/uploads/2014/11/5b01e5b8f939355d1b38858b23b1e4d8.jpg', '/img/badge/admin.png', ''),
(4, 'dualshocks', '[SUR] Youtube - Musique de fond', 'Vous Ãªtes dÃ©jÃ  dans l''aventure pour devenir un Youtubeur ? Et vous chercher des musiques pour vos intros, outros sans se prendre un "strike" (avertissement pour atteinte aux droits d''auteur) ? \r\n\r\nRecherchez dÃ¨s Ã  prÃ©sent : "NoCopyrightSounds", cette chaÃ®ne vous propose des musiques sans Copyrigth, c''est Ã  dire sans droits d''auteurs. Vous n''aurez aucun souci avec Youtube Ã  l''avenir. \r\n\r\nPs : Vous pouvez remercier la chaÃ®ne et proposer d''Ã©couter la musique en entier Ã  vos abonnÃ©s en inscrivant le lien de la musique dans votre description.', 0, '80.15.105.16', 'http://zupimages.net/up/15/53/nkn6.png', '/img/badge/user.png', ''),
(5, 'darklaserpower_41', '[SUR] Creation de votre propre launcher minecraft', 'Bonjour,\r\nAujourd''hui ,Je vous montre un petit service fait pour crÃ©er votre propre serveur minecraft.\r\nil vous faut un compte launchmycraft (nom du service) pour pouvoir creer votre serveur.\r\nvous pouvez aussi le relier a votre serveur mineraft.\r\n\r\nNom:LaunchMyCraft\r\n\r\nType:Service de crÃ©ation et personnalisation de launchers \r\n\r\nLien:https://www.launchmycraft.fr\r\n\r\nJ''espere que ce petit service GRATUIT vous plaira ;)', 0, '77.201.160.22', 'http://youreyesonly.free.fr/stock/minecraft.png', '/img/badge/user.png', ''),
(6, 'sabangok', 'Le site Furkan TV', 'Notre page facebook : https://www.facebook.com/Fu----n-TV-14981-------2626/\r\n\r\nNotre site web provisoire : furk-----.com/fu-----tv\r\n\r\nNâ€™hÃ©sitez pas Ã  liker notre page , est de visiter notre site !\r\n\r\nDans notre site web vous trouverez des astuce de **** , de jeu en ligne , des jeu **** , des vidÃ©os , des images, la radio , la mÃ©tÃ©o , de la musique a volontÃ© gratuitement, il y a aussi un chat en ligne, vous pourrez nous envoyer des vidÃ©os, des images, de l''audio, du texte....\r\n', 0, '78.230.213.223', 'http://furkbook.olympe.in/-(.PNG', '/img/badge/user.png', '');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `ID_Utilisateur` bigint(20) NOT NULL AUTO_INCREMENT,
  `login` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(255) NOT NULL,
  `Compte_Active` enum('0','1') NOT NULL DEFAULT '1',
  `Clef_Activation` varchar(20) NOT NULL,
  `privilege` varchar(255) NOT NULL,
  `badge` varchar(255) NOT NULL,
  `badge2` varchar(255) NOT NULL,
  `points` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_Utilisateur`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`ID_Utilisateur`, `login`, `password`, `email`, `Compte_Active`, `Clef_Activation`, `privilege`, `badge`, `badge2`, `points`) VALUES
(1, 'admin', '9492fdf7d35ec1337fdf14bc611b1024', 'skyled.neoxx@gmail.com', '1', 'afhknpv6', 'root', '/img/badge/admin.png', '', '0'),
(2, 'Persephone1719', '687d6852e803b0f2f927cf80264110cd', 'marion.valkyrie@laposte.net', '1', 'bdhjpsx3', 'premium', '/img/badge/premium.png', '', '0'),
(3, 'TOMCO984', '81ae63ebcc8b28923112f8f15ec6f7dd', 'tomco984@live.fr', '1', 'bjpwxz46', 'free', '/img/badge/user.png', '', '0'),
(4, 'farsight', '198386701617c0730249cf3280a61e1e', 'maellebras1003@gmail.com', '1', 'cfmpq268', 'free', '/img/badge/tribal.png', '', '0'),
(5, 'expyri', '9492fdf7d35ec1337fdf14bc611b1024', 'sentr.maginot@gmail.com', '1', 'adfnsw48', 'free', '/img/badge/user.png', '', '0'),
(6, 'BeenzZ', '86c3deb18d89aa333884dfae4c36b196', 'laurent.celian@gmail.com', '1', 'cdopqt01', 'free', '/img/badge/tribal.png', '', '0'),
(7, 'onsestvusurlivehost', '3b4e17a2cf511e9c1aa836311f08a012', 'niketesfreres@dawdlo.com', '1', 'ceknou08', 'free', '/img/badge/user.png', '', '0'),
(8, 'SkyZoH', '79a321f77453173508977e91440f0971', 'tay-fun@live.fr', '1', 'egnuw346', 'free', '/img/badge/user.png', '', '0'),
(9, 'dualshocks', '51a8130336283ffcf3838334b7b401b6', 'matteo60350@gmail.com', '1', 'acevy569', 'free', '/img/badge/user.png', '', '0'),
(10, 'darklaserpower_41', 'f88bd9c9d8470bf5bae6c826e87c5511', 'livehostcompte.alexis@gmail.com', '1', 'moquz035', 'free', '/img/badge/user.png', '', '0'),
(11, 'sabangok', '8004229d55500779337c02c60239f8fb', 'furkanc@hotmail.fr', '1', 'bdflosvw', 'free', '/img/badge/user.png', '', '0'),
(12, 'FaaBy', 'a8b7be738ec45ddbf006b31cf6b5e23e', 'TheSmiix@gmail.com', '1', 'dfrstuv1', 'free', '/img/badge/user.png', '', '0'),
(13, 'cavelas', '4e5c32edc97e9bb33f4a96d157c16c1b', 'lefebvre.remy123@gmail.com', '1', 'amnovz39', 'free', '/img/badge/user.png', '', '0');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
