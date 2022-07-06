-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 07 mai 2022 à 19:48
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion_etudiant`
--

-- --------------------------------------------------------

--
-- Structure de la table `absence`
--

CREATE TABLE `absence` (
  `semaine` text NOT NULL,
  `groupe` varchar(40) NOT NULL,
  `module` varchar(40) NOT NULL,
  `date` text NOT NULL,
  `justification` text NOT NULL,
  `nom` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `absence`
--

INSERT INTO `absence` (`semaine`, `groupe`, `module`, `date`, `justification`, `nom`) VALUES
('2022-W20', 'INFO-3B', 'Structures de Données', ' 18/05/2022', '', 'HachemEnicar Mohamed'),
('2022-W20', 'INFO1-B', 'selected', ' 17/05/2022', '1', 'hech med'),
('2022-W21', 'INFO1-B', 'Programmation C++', ' 25/05/2022', '', 'hech med'),
('2022-W21', 'INFO3-B', 'Web Developpment', '23/05/2022 ', '', 'HachemEnicar Mohamed');

-- --------------------------------------------------------

--
-- Structure de la table `enseignant`
--

CREATE TABLE `enseignant` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `login` text NOT NULL,
  `pass` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `enseignant`
--

INSERT INTO `enseignant` (`id`, `nom`, `prenom`, `login`, `pass`) VALUES
(1, 'HachemProf', 'Mohamed', 'Hachemmohamed@gmail.com', 'dd2ff995035302cb35a27a35ba1c30dd'),
(2, 'hamma', 'prof', 'hama@gmail.com', 'e2ef524fbf3d9fe611d5a8e90fefdc9c'),
(3, 'hachem', 'mohamed', 'hechemmohamed9@gmail.com', 'dd2ff995035302cb35a27a35ba1c30dd');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `cin` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `pwd` varchar(40) NOT NULL,
  `cpwd` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `adresse` text NOT NULL,
  `classe` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`cin`, `nom`, `prenom`, `pwd`, `cpwd`, `email`, `adresse`, `classe`) VALUES
(7246137, 'HachemEnicar', 'Mohamed', '63de92f670bfc6145a9d5809f1dcc4d9', '63de92f670bfc6145a9d5809f1dcc4d9', 'hech@enicar.tn', 'Ben arous', 'INFO3-B'),
(11111111, 'hech', 'med', '1bbd886460827015e5d605ed44252251', '1bbd886460827015e5d605ed44252251', 'Gfeji@gmaol.com', 'TUNISSS', 'INFO1-B');

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

CREATE TABLE `groupe` (
  `nom_groupe` varchar(20) NOT NULL,
  `nombre_etudiant` int(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `Description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `groupe`
--

INSERT INTO `groupe` (`nom_groupe`, `nombre_etudiant`, `email`, `Description`) VALUES
('INFO1-A', 25, 'INFO1A@enicar.com', 'Info1-A est un groupe d\'étudiants de l\'Enicarthage pour l\'année 2021/2022 qui passent la 1ere année ingénierie en génie informatique. '),
('INFO1-B', 25, 'INFO1-B@enicarthage.com', 'Info1-B est un groupe d\\\'étudiants de l\\\'Enicarthage pour l\\\'année 2021/2022 qui passent la 1ere année ingénierie en génie informatique.'),
('INFO1-C', 25, 'INFO1-C@enicarthage.com', 'Info1-C est un groupe d\\\'étudiants de l\\\'Enicarthage pour l\\\'année 2021/2022 qui passent la 1ere année ingénierie en génie informatique.'),
('INFO2-A ', 18, 'INFO2-A@enicarthage.com', 'INFO2-A est un groupe d\\\'étudiants de l\\\'Enicarthage pour l\\\'année 2021/2022 qui passent la 1ere année ingénierie en génie informatique.'),
('INFO2-B', 30, 'INFO2-B@enicar.com', 'INFO2-B est un groupe d\\\'étudiants de l\\\'Enicarthage pour l\\\'année 2021/2022 qui passent la 1ere année ingénierie en génie informatique.'),
('INFO2-C', 30, 'INFO1-C@enicar.com', 'INFO2-Cest un groupe d\\\'étudiants de l\\\'Enicarthage pour l\\\'année 2021/2022 qui passent la 1ere année ingénierie en génie informatique.'),
('INFO2-D', 20, 'INFO2-D@enicar.com', 'INFO2-D est un groupe d\\\'étudiants de l\\\'Enicarthage pour l\\\'année 2021/2022 qui passent la 1ere année ingénierie en génie informatique.'),
('INFO2-E', 14, 'INFO2-E@enicar.com', 'INFO2-E est un groupe d\\\'étudiants de l\\\'Enicarthage pour l\\\'année 2021/2022 qui passent la 1ere année ingénierie en génie informatique.');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `enseignant`
--
ALTER TABLE `enseignant`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`cin`);

--
-- Index pour la table `groupe`
--
ALTER TABLE `groupe`
  ADD PRIMARY KEY (`nom_groupe`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `enseignant`
--
ALTER TABLE `enseignant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `cin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11111112;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
