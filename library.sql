-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 12 juil. 2023 à 18:01
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `library`
--

-- --------------------------------------------------------

--
-- Structure de la table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `release_year` date NOT NULL,
  `edition_house` varchar(255) NOT NULL,
  `buy_date` date NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `pages` int(11) NOT NULL,
  `cover` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `release_year`, `edition_house`, `buy_date`, `price`, `pages`, `cover`) VALUES
(1, 'The Lord of the Rings', 'J. R. R. Tolkien', '1954-07-29', 'Allen & Unwin', '2019-01-01', 19.99, 1216, ' img/cover_1.jpg'),
(2, '  Harry Potter', 'J. K. Rowling', '1997-06-26', 'Bloomsbury', '2019-01-01', 9.99, 223, 'img/cover_2.jpg'),
(3, 'The Little Prince', 'Antoine de Saint-Exupéry', '1943-04-06', 'Reynal & Hitchcock', '2019-01-01', 6.99, 96, ' img/cover_3.jpg'),
(4, 'The Hobbit', 'J. R. R. Tolkien', '1937-09-21', 'Allen & Unwin', '2019-01-01', 14.99, 310, ' img/cover_4.jpg'),
(5, 'And Then There Were None', 'Agatha Christie', '1939-11-06', 'Collins Crime Club', '2019-01-01', 9.99, 272, ' img/cover_5.jpg'),
(6, 'Dream of the Red Chamber', 'Cao Xueqin', '1791-01-01', 'Gao E', '2019-01-01', 9.99, 2496, ' img/cover_6.jpg'),
(7, 'The Lion, the Witch and the Wardrobe', 'C. S. Lewis', '1950-10-16', 'Geoffrey Bles', '2019-01-01', 9.99, 206, ' img/cover_7.jpg'),
(8, 'She: A History of Adventure', 'H. Rider Haggard', '1887-10-01', 'Longmans, Green & Co.', '2019-01-01', 9.99, 317, ' img/cover_8.jpg'),
(9, 'The Da Vinci Code', 'Dan Brown', '2003-03-18', 'Doubleday', '2019-01-01', 9.99, 689, ' img/cover_9.jpg'),
(10, 'The Catcher in the Rye', 'J. D. Salinger', '1951-07-16', 'Little, Brown and Company', '2019-01-01', 9.99, 234, ' img/cover_10.jpg'),
(11, 'The Alchemist', 'Paulo Coelho', '1988-01-01', 'HarperTorch', '2019-01-01', 9.99, 197, ' img/cover_11.jpg'),
(12, 'The Bridges of Madison County', 'Robert James Waller', '1992-04-01', 'Warner Books', '2019-01-01', 9.99, 192, ' img/cover_12.jpg'),
(13, 'The Guardians', 'Shannon Messenger', '2002-03-08', 'Galliard', '2023-07-07', 15.00, 280, ' img/cover_13.jpg'),
(14, '        CSS avancéssss', 'Joseph R. Lewis', '2023-07-12', 'friendsof', '2023-07-07', 12.00, 150, 'img/cover_14.jpg'),
(24, 'Madame Bovary', 'Khalifa Ababacar BEYE', '2023-07-03', 'Ecole bissi corniche bi', '2023-07-12', 200.00, 150, 'img/359070576_614691727422157_5134469687868816558_n.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `friends`
--

CREATE TABLE `friends` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `friends`
--

INSERT INTO `friends` (`id`, `name`) VALUES
(1, 'Ngalla'),
(2, 'Moustapha'),
(3, 'Boubs'),
(4, 'Diallo'),
(5, 'Diagne Seye'),
(6, 'Moussa'),
(7, 'Mamadou'),
(8, 'Mouhamed'),
(9, 'Yannick'),
(10, 'Hachimou');

-- --------------------------------------------------------

--
-- Structure de la table `lend`
--

CREATE TABLE `lend` (
  `book_id` int(11) NOT NULL,
  `friend_id` int(11) NOT NULL,
  `lend_date` date NOT NULL,
  `return_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `lend`
--

INSERT INTO `lend` (`book_id`, `friend_id`, `lend_date`, `return_date`) VALUES
(1, 1, '2020-01-01', '2020-01-15'),
(1, 4, '2012-06-12', '0000-00-00'),
(1, 6, '2021-01-01', '0000-00-00'),
(3, 3, '2020-01-01', '2020-01-15'),
(6, 6, '2020-01-01', '2020-01-15'),
(8, 8, '2020-01-01', '2020-01-15'),
(9, 7, '2023-07-08', '0000-00-00'),
(9, 9, '2020-01-01', '2020-01-15'),
(10, 1, '2020-01-01', '2020-01-15'),
(11, 2, '2020-01-01', '2020-01-15'),
(12, 3, '2020-01-01', '2020-01-15'),
(13, 4, '2020-01-01', '2020-01-15');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `lend`
--
ALTER TABLE `lend`
  ADD PRIMARY KEY (`book_id`,`friend_id`),
  ADD KEY `friend_id` (`friend_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `friends`
--
ALTER TABLE `friends`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `lend`
--
ALTER TABLE `lend`
  ADD CONSTRAINT `lend_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`),
  ADD CONSTRAINT `lend_ibfk_2` FOREIGN KEY (`friend_id`) REFERENCES `friends` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
