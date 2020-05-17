-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 21 sep. 2019 à 10:47
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'modo',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `token`, `role`) VALUES
(1, 'Franck', 'franckndi5@gmail.com', 'Mindourou5', '121ygew', 'admin'),
(2, 'Franck', 'franckndi5@gmail.com', 'b2322649dc0256b8b0707342d198351de43517d3', '121ygew', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `post_id` int(11) NOT NULL,
  `date_comment` datetime NOT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `name`, `email`, `comment`, `post_id`, `date_comment`, `seen`) VALUES
(1, 'ndi', 'franckndi5@gmail.com', 'super cet article', 2, '2019-09-20 12:35:25', 0),
(2, 'ordy', 'franck5@gmail.com', 'très intéressant!', 2, '2019-09-20 12:36:27', 0),
(3, 'audrey', 'audrey@gmail.com', 'super cool cet article ,faudrait que tu nous en fasse plus de ce genre', 4, '2019-09-20 16:36:58', 0),
(4, 'Franck', 'ordinateur5@gmail.com', 'c\'est vraiment une machine dans un champ', 4, '2019-09-20 17:36:29', 0);

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `writer` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'post.png',
  `date_post` datetime NOT NULL,
  `posted` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `writer`, `image`, `date_post`, `posted`) VALUES
(1, 'Creer un blog en PHP', 'Dans ce tutoriel, nous allons apprendre comment créer un blog en \r\n\r\nPHP  et cela pas a pas tout en restant superficiel et pour obtenir neamoins un résultat plutôt cool Dans ce tutoriel, nous allons apprendre comment créer un blog en PHP  et cela pas a pas tout en restant superficiel et pour obtenir neamoins un résultat plutôt cool Dans ce tutoriel, \r\n\r\nnous allons apprendre comment créer un blog en PHP  et cela pas a pas tout en restant superficiel et pour obtenir neamoins un résultat plutôt cool Dans ce tutoriel, nous allons apprendre comment créer un blog en PHP  et cela pas a pas tout en restant superficiel et pour obtenir neamoins un résultat plutôt cool Dans ce tutoriel, nous allons apprendre comment créer un blog en PHP  et cela pas a pas tout en restant superficiel et pour obtenir neamoins un résultat plutôt cool Dans ce tutoriel, nous allons apprendre comment créer un blog en PHP  et cela pas a pas tout en restant superficiel et pour obtenir neamoins un résultat plutôt cool Dans ce tutoriel, nous allons apprendre comment créer un blog en PHP  et cela pas a pas tout en restant superficiel et pour obtenir neamoins un résultat plutôt cool\r\nDans ce tutoriel, nous allons apprendre comment créer un blog en PHP  et cela pas a pas tout en restant superficiel et pour obtenir neamoins un résultat plutôt cool\r\n\r\nDans ce tutoriel, nous allons apprendre comment créer un blog en PHP  et cela pas a pas tout en restant superficiel et pour obtenir neamoins un résultat plutôt cool\r\n\r\nDans ce tutoriel, nous allons apprendre comment créer un blog en \r\n\r\nPHP  et cela pas a pas tout en restant superficiel et pour obtenir neamoins un résultat plutôt cool Dans ce tutoriel, nous allons apprendre comment créer un blog en PHP  et cela pas a pas tout en restant superficiel et pour obtenir neamoins un résultat plutôt cool Dans ce tutoriel, \r\n\r\nnous allons apprendre comment créer un blog en PHP  et cela pas a pas tout en restant superficiel et pour obtenir neamoins un résultat plutôt cool Dans ce tutoriel, nous allons apprendre comment créer un blog en PHP  et cela pas a pas tout en restant superficiel et pour obtenir neamoins un résultat plutôt cool Dans ce tutoriel, nous allons apprendre comment créer un blog en PHP  et cela pas a pas tout en restant superficiel et pour obtenir neamoins un résultat plutôt cool Dans ce tutoriel, nous allons apprendre comment créer un blog en PHP  et cela pas a pas tout en restant superficiel et pour obtenir neamoins un résultat plutôt cool Dans ce tutoriel, nous allons apprendre comment créer un blog en PHP  et cela pas a pas tout en restant superficiel et pour obtenir neamoins un résultat plutôt cool\r\nDans ce tutoriel, nous allons apprendre comment créer un blog en PHP  et cela pas a pas tout en restant superficiel et pour obtenir neamoins un résultat plutôt cool\r\n\r\nDans ce tutoriel, nous allons apprendre comment créer un blog en PHP  et cela pas a pas tout en restant superficiel et pour obtenir neamoins un résultat plutôt cool\r\n\r\nDans ce tutoriel, nous allons apprendre comment créer un blog en \r\n\r\nPHP  et cela pas a pas tout en restant superficiel et pour obtenir neamoins un résultat plutôt cool Dans ce tutoriel, nous allons apprendre comment créer un blog en PHP  et cela pas a pas tout en restant superficiel et pour obtenir neamoins un résultat plutôt cool Dans ce tutoriel, \r\n\r\nnous allons apprendre comment créer un blog en PHP  et cela pas a pas tout en restant superficiel et pour obtenir neamoins un résultat plutôt cool Dans ce tutoriel, nous allons apprendre comment créer un blog en PHP  et cela pas a pas tout en restant superficiel et pour obtenir neamoins un résultat plutôt cool Dans ce tutoriel, nous allons apprendre comment créer un blog en PHP  et cela pas a pas tout en restant superficiel et pour obtenir neamoins un résultat plutôt cool Dans ce tutoriel, nous allons apprendre comment créer un blog en PHP  et cela pas a pas tout en restant superficiel et pour obtenir neamoins un résultat plutôt cool Dans ce tutoriel, nous allons apprendre comment créer un blog en PHP  et cela pas a pas tout en restant superficiel et pour obtenir neamoins un résultat plutôt cool\r\nDans ce tutoriel, nous allons apprendre comment créer un blog en PHP  et cela pas a pas tout en restant superficiel et pour obtenir neamoins un résultat plutôt cool\r\n\r\nDans ce tutoriel, nous allons apprendre comment créer un blog en PHP  et cela pas a pas tout en restant superficiel et pour obtenir neamoins un résultat plutôt cool\r\n\r\nDans ce tutoriel, nous allons apprendre comment créer un blog en \r\n\r\nPHP  et cela pas a pas tout en restant superficiel et pour obtenir neamoins un résultat plutôt cool Dans ce tutoriel, nous allons apprendre comment créer un blog en PHP  et cela pas a pas tout en restant superficiel et pour obtenir neamoins un résultat plutôt cool Dans ce tutoriel, \r\n\r\nnous allons apprendre comment créer un blog en PHP  et cela pas a pas tout en restant superficiel et pour obtenir neamoins un résultat plutôt cool Dans ce tutoriel, nous allons apprendre comment créer un blog en PHP  et cela pas a pas tout en restant superficiel et pour obtenir neamoins un résultat plutôt cool Dans ce tutoriel, nous allons apprendre comment créer un blog en PHP  et cela pas a pas tout en restant superficiel et pour obtenir neamoins un résult\r\n\r\n', 'franckndi5@gmail.com', 'post.png', '2019-09-18 16:24:49', 1),
(2, 'Découvrir MailDev', 'MailDev is a simple way to test your project\'s generated emails during development with an easy to use web interface that runs on your machine built on top of Node.js\r\n\r\nDans ce tutoriel, nous allons apprendre comment créer un blog en PHP et cela pas a pas tout en restant superficiel et pour obtenir neamoins un résultat plutôt cool Dans ce tutoriel, nous allons apprendre comment créer un blog en PHP et cela pas a pas tout en restant superficiel et pour obtenir neamoins un résultat plutôt cool Dans ce tutoriel, nous allons apprendre comment créer un blog en PHP et cela pas a pas tout en restant superficiel et pour obtenir neamoins un résultat plutôt cool Dans ce tutoriel, nous allons apprendre comment créer un blog en PHP et cela pas a pas tout en restant superficiel et pour obtenir neamoins un résultat plutôt cool Dans ce tutoriel, nous allons apprendre comment créer un blog en PHP et cela pas a pas tout en restant superficiel et pour obtenir neamoins un résultat plutôt cool \r\n\r\nblog en PHP et cela pas a pas tout en restant superficiel et pour obtenir neamoins un résultat plutôt cool Dans ce tutoriel, nous allons apprendre comment créer un blog en PHP et cela pas a pas tout en restant superficiel et pour obtenir neamoins un résultat plutôt cool Dans ce tutoriel, nous \r\n\r\nMailDev is a simple way to test your project\\\'s generated emails during development with an easy to use web interface that runs on your machine built on top of Node.js\\r\\n\\r\\nDans ce tutoriel, nous allons apprendre comment créer un blog en PHP et cela pas a pas tout en restant superficiel et pour obtenir neamoins un résultat plutôt cool Dans ce tutoriel, nous allons apprendre comment créer un blog en PHP et cela pas a pas tout en restant superficiel et pour obtenir neamoins un résultat plutôt cool Dans ce tutoriel, nous allons apprendre comment créer un blog en PHP et cela pas a pas tout en restant superficiel et pour obtenir neamoins un résultat plutôt cool Dans ce tutoriel, nous allons apprendre comment créer un blog en PHP et cela pas a pas tout en restant superficiel et pour obtenir neamoins un résultat plutôt cool Dans ce tutoriel, nous allons apprendre comment créer un blog en PHP et cela pas a pas tout en restant superficiel et pour obtenir neamoi\r\n\r\nallons apprendre comment créer un blog en PHP et cela pas a pas tout en restant superficiel et pour obtenir neamoins un résultat plutôt cool Dans ce tutoriel, nous allons apprendre comment créer un blur\r\n\r\nDans ce tutoriel, nous allons apprendre comment créer un blog en PHP et cela pas a pas tout en restant superficiel et pour obtenir neamoins u', 'franckndi5@gmail.com', 'post.png', '2019-09-18 16:32:52', 1),
(3, 'Internet Pour réussir!', 'LE Monde a changé , nous allons apprendre comment créer un blog en \r\n\r\nPHP  et cela pas a pas tout en restant superficiel et pour obtenir neamoins un résultat plutôt cool Dans ce tutoriel, nous allons apprendre comment créer un blog en PHP  et cela pas a pas tout en restant superficiel et pour obtenir neamoins un résultat plutôt cool Dans ce tutoriel, \r\n\r\nnous allons apprendre comment créer un blog en PHP  et cela pas a pas tout en restant superficiel et pour obtenir neamoins un résultat plutôt cool Dans ce tutoriel, nous allons apprendre comment créer un blog en PHP  et cela pas a pas tout en restant superficiel et pour obtenir neamoins un résultat plutôt cool Dans ce tutoriel, nous allons apprendre comment créer un blog en PHP  et cela pas a pas tout en restant superficiel et pour obtenir neamoins un résultat plutôt cool Dans ce tutoriel, nous allons apprendre comment créer un blog en PHP  et cela pas a pas tout en restant superficiel et pour obtenir neamoins un résultat plutôt cool Dans ce tutoriel, nous allons apprendre comment créer un blog en PHP  et cela pas a pas tout en restant superficiel et pour obtenir neamoins un résultat plutôt cool\r\nDans ce tutoriel, nous allons apprendre comment créer un blog en PHP  et cela pas a pas tout en restant superficiel et pour obtenir neamoins un résultat plutôt cool\r\n\r\nDans ce tutoriel, nous allons apprendre comment créer un blog en PHP  et cela pas a pas tout en restant superficiel et pour obtenir neamoins un résultat plutôt cool\r\n\r\nDans ce tutoriel, nous allons apprendre comment créer un blog en \r\n\r\nPHP  et cela pas a pas tout en restant superficiel et pour obtenir neamoins un résultat plutôt cool Dans ce tutoriel, nous allons apprendre comment créer un blog en PHP  et cela pas a pas tout en restant superficiel et pour obtenir neamoins un résultat plutôt cool Dans ce tutoriel, \r\n\r\nnous allons apprendre comment créer un blog en PHP  et cela pas a pas tout en restant superficiel et pour obtenir neamoins un résultat plutôt cool Dans ce tutoriel, nous allons apprendre comment créer un blog en PHP  et cela pas a pas tout en restant superficiel et pour obtenir neamoins un résultat plutôt cool Dans ce tutoriel, nous allons apprendre comment créer un blog en PHP  et cela pas a pas tout en restant superficiel et pour obtenir neamoins un résultat plutôt cool Dans ce tutoriel, nous allons apprendre comment créer un blog en PHP  et cela pas a pas tout en restant superficiel et pour obtenir neamoins un résultat plutôt cool Dans ce tutoriel, nous allons apprendre comment créer un blog en PHP  et cela pas a pas tout en restant superficiel et pour obtenir neamoins un résultat plutôt cool\r\nDans ce tutoriel, nous allons apprendre comment créer un blog en PHP  et cela pas a pas tout en restant superficiel et pour obtenir neamoins un résultat plutôt cool\r\n\r\nDans ce tutoriel, nous allons apprendre comment créer un blog en PHP  et cela pas a pas tout en restant superficiel et pour obtenir neamoins un résultat plutôt cool\r\n\r\nDans ce tutoriel, nous allons apprendre comment créer un blog en \r\n\r\nPHP  et cela pas a pas tout en restant superficiel et pour obtenir neamoins un résultat plutôt cool Dans ce tutoriel, nous allons apprendre comment créer un blog en PHP  et cela pas a pas tout en restant superficiel et pour obtenir neamoins un résultat plutôt cool Dans ce tutoriel, \r\n\r\nnous allons apprendre comment créer un blog en PHP  et cela pas a pas tout en restant superficiel et pour obtenir neamoins un résultat plutôt cool Dans ce tutoriel, nous allons apprendre comment créer un blog en PHP  et cela pas a pas tout en restant superficiel et pour obtenir neamoins un résultat plutôt cool Dans ce tutoriel, nous allons apprendre comment créer un blog en PHP  et cela pas a pas tout en restant superficiel et pour obtenir neamoins un résultat plutôt cool Dans ce tutoriel, nous allons apprendre comment créer un blog en PHP  et cela pas a pas tout en restant superficiel et pour obtenir neamoins un résultat plutôt cool Dans ce tutoriel, nous allons apprendre comment créer un blog en PHP  et cela pas a pas tout en restant superficiel et pour obtenir neamoins un résultat plutôt cool\r\nDans ce tutoriel, nous allons apprendre comment créer un blog en PHP  et cela pas a pas tout en restant superficiel et pour obtenir neamoins un résultat plutôt cool\r\n\r\nDans ce tutoriel, nous allons apprendre comment créer un blog en PHP  et cela pas a pas tout en restant superficiel et pour obtenir neamoins un résultat plutôt cool\r\n\r\nDans ce tutoriel, nous allons apprendre comment créer un blog en \r\n\r\nPHP  et cela pas a pas tout en restant superficiel et pour obtenir neamoins un résultat plutôt cool Dans ce tutoriel, nous allons apprendre comment créer un blog en PHP  et cela pas a pas tout en restant superficiel et pour obtenir neamoins un résultat plutôt cool Dans ce tutoriel, \r\n\r\nnous allons apprendre comment créer un blog en PHP  et cela pas a pas tout en restant superficiel et pour obtenir neamoins un résultat plutôt cool Dans ce tutoriel, nous allons apprendre comment créer un blog en PHP  et cela pas a pas tout en restant superficiel et pour obtenir neamoins un résultat plutôt cool Dans ce tutoriel, nous allons apprendre comment créer un blog en PHP  et cela pas a pas tout en restant superficiel et pour obtenir neamoins un résult\r\n\r\n', 'franckndi5@gmail.com', 'post.png', '2019-09-18 16:24:49', 0),
(4, 'Découvrir JavaScript en 20 minutes', 'javascript est un langage de programmation oriente objet qui nous permet de faire des tas de chose a simple way to test your project\'s generated emails during development with an easy to use web interface that runs on your machine built on top of Node.js\r\n\r\nDans ce tutoriel, nous allons apprendre comment créer un blog en PHP et cela pas a pas tout en restant superficiel et pour obtenir neamoins un résultat plutôt cool Dans ce tutoriel, nous allons apprendre comment créer un blog en PHP et cela pas a pas tout en restant superficiel et pour obtenir neamoins un résultat plutôt cool Dans ce tutoriel, nous allons apprendre comment créer un blog en PHP et cela pas a pas tout en restant superficiel et pour obtenir neamoins un résultat plutôt cool Dans ce tutoriel, nous allons apprendre comment créer un blog en PHP et cela pas a pas tout en restant superficiel et pour obtenir neamoins un résultat plutôt cool Dans ce tutoriel, nous allons apprendre comment créer un blog en PHP et cela pas a pas tout en restant superficiel et pour obtenir neamoins un résultat plutôt cool \r\n\r\nblog en PHP et cela pas a pas tout en restant superficiel et pour obtenir neamoins un résultat plutôt cool Dans ce tutoriel, nous allons apprendre comment créer un blog en PHP et cela pas a pas tout en restant superficiel et pour obtenir neamoins un résultat plutôt cool Dans ce tutoriel, nous \r\n\r\nMailDev is a simple way to test your project\\\'s generated emails during development with an easy to use web interface that runs on your machine built on top of Node.js\\r\\n\\r\\nDans ce tutoriel, nous allons apprendre comment créer un blog en PHP et cela pas a pas tout en restant superficiel et pour obtenir neamoins un résultat plutôt cool Dans ce tutoriel, nous allons apprendre comment créer un blog en PHP et cela pas a pas tout en restant superficiel et pour obtenir neamoins un résultat plutôt cool Dans ce tutoriel, nous allons apprendre comment créer un blog en PHP et cela pas a pas tout en restant superficiel et pour obtenir neamoins un résultat plutôt cool Dans ce tutoriel, nous allons apprendre comment créer un blog en PHP et cela pas a pas tout en restant superficiel et pour obtenir neamoins un résultat plutôt cool Dans ce tutoriel, nous allons apprendre comment créer un blog en PHP et cela pas a pas tout en restant superficiel et pour obtenir neamoi\r\n\r\nallons apprendre comment créer un blog en PHP et cela pas a pas tout en restant superficiel et pour obtenir neamoins un résultat plutôt cool Dans ce tutoriel, nous allons apprendre comment créer un blur\r\n\r\nDans ce tutoriel, nous allons apprendre comment créer un blog en PHP et cela pas a pas tout en restant superficiel et pour obtenir neamoins u', 'franckndi5@gmail.com', 'post.png', '2019-09-18 16:32:52', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
