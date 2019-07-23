-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  mar. 23 juil. 2019 à 14:04
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `pimballcrous`
--

-- --------------------------------------------------------

--
-- Structure de la table `info`
--

CREATE TABLE `info` (
  `id_info` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  `theme` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `info`
--

INSERT INTO `info` (`id_info`, `titre`, `contenu`, `theme`, `date`) VALUES
(1, 'C\'est quoi un DSE ?', 'Le DSE est le Dossier Social Etudiant', 'Bourse', '2019-06-20'),
(2, 'Comment créer un DSE ?', 'Pour faire une demande de bourse et/ou logement rendez-vous sur \"https://www.messerrvices.etudiant.gouv.fr/\" et cliquez sur la rubrique DSE', 'Bourse', '2019-06-20'),
(3, 'C\'est quand les création du DSE ?', 'La constitution du Dossier Social Etudiant se fait entre LE 15 JANVIER ET LE 15 MAI', 'Bourse', '2019-06-20'),
(4, 'Assistance sociale', 'Une assistance social est à la disposition de tous les étudiants qui en ont besoin (sur rendez-vous)  ', 'service social', '2019-06-20'),
(5, 'Assistance sociale \"Son rôle\"', 'L\'assistance social proposé au étudiants se charge des les accueillir ainsi que de les accompagner sur des problèmes d\'ordre matériel, personnel, de santé qu\'ils peuvent rencontrer au cour de leurs études', 'service social', '2019-06-20'),
(6, 'Aides spécifiques', 'Les aides spécifique peuvent être de 2 natures soit une ALLOCATION ANNUELLE soit UNE AIDE PONCTUELLE\r\n(Toutes les informations sur leurs attributions sur le site de votre Crous)', 'service social', '2019-06-20'),
(7, 'Aides spécifiques \"DÉPANNAGE FINANCIER EXCEPTIONNEL\"', 'En effet une possibilité d\'aide financière est proposé aux étudiants grâce aux aides spécifiques', 'service social', '2019-06-20'),
(8, 'Assistance sociale \"Liaison\"', 'L\'assistance social peut faire la liaison ou indiquer aux étudiants des services SOCIAUX ou SPÉCIALISE (médicaux, juridiques, universitaires) susceptible de compléter sont action', 'service social', '2019-06-20'),
(9, 'Assistance sociale \"Le handicap\"', 'L\'assistance social accueille les étudiants. Il a pour vocation de leur offrir un lieu dans lequel ils pourront trouver : renseignements, une aide pour l\'organisation ainsi que tous ce qui pourrait participer au bon déroulement de leurs études', 'service social', '2019-06-20'),
(10, 'Logement et DSE', 'Le DSE (Dossier Social Étudiant) est obligatoire à toute demande de logement ou de bourse', 'logement', '2019-06-20'),
(11, 'Logement, quand faire la demande ?', 'Chaque années faite votre demande dès l\'ouverture des DSE soit LE 15 JANVIER', 'logement', '2019-06-20'),
(12, 'Logement, à quand une réponse ?', 'Après votre demande de logement vous recevrez une réponce PAR MAIL VERS LE 25 JUIN', 'logement', '2019-06-20'),
(13, 'Dossier Social Étudiant unique ?', 'Chaque étudiant constitue un UNIQUE dossir même si il est candidat à l\'entrée dans plusieurs établissements ou si il sollicite plusieurs aides, et ce quelle que soit l\'académie', 'logement', '2019-06-20'),
(14, 'Combien de VŒUX de logement possibles ?', 'Chaque étudiant peuvent saisir jusqu’à 6 VŒUX MAXIMUM (2 VŒUX PAR SECTEURS GÉOGRAPHIQUES) et la possibilité de les modifier jusqu\'à la MI JUIN', 'logement', '2019-06-20'),
(15, 'Cité\'U Kezaco ?', 'Cité\'U vous propose de payer votre loyer en ligne et de télécharger votre ATTESTATION DE RÉSIDENT (nécessaire pour votre demande de d\'aide au logement à la CAF)', 'logement', '2019-06-20'),
(16, 'Lokaviz Kezaco ?', 'Lokaviz T\'aides à trouver ton logement chez un particulier et ce GRATUITEMENT', 'logement', '2019-06-20'),
(17, 'Les Restaurants Universitaires ou RU', 'Il y a 24 Restaurant Universitaire au sein du Crous de Bourgogne Franche-Comté', 'restauration', '2019-06-20'),
(18, 'Les Repas du RU', 'Grâce aux Restaurants Universitaire il est possible de manger un repas par jour pour 3,25€', 'restauration', '2019-06-20'),
(19, 'IZLY Kézaco ?', 'IZLY , le paiement sans contact, avec votre carte Étudiant(pass\'UBFC) ou l\'application mobile. En toute sérénité !!\r\n(Plus d\'informations sur les site de votre Crous)', 'restauration', '2019-06-20'),
(20, 'CONCOURS et TREMPLINS', 'Des Concours ainsi que des tremplins professionnels sont organisés durant toute l\'année Universitaire', 'vie étudiante-culture', '2019-06-20'),
(21, 'Le dispositif CULTURE ACTIONS', 'Programme qui soutient et viens en aide aux étudiants pour réaliser leurs projets', 'vie étudiante-culture', '2019-06-20'),
(22, 'Cité Internationale du Jeu', 'Lieux où les étudiants peuvent passer des moments de détente autour du domaine vidéo-ludique ou ludique et puissent ainsi rencontrer et s\'amuser avec d\'autres étudiants (toutes les informations sur les lieux et horaires sur le site de votre Crous)', 'vie étudiante-culture', '2019-06-20'),
(23, 'Le Cube', 'Le Club Universitaire Bourgogne D’Échecs, vous propose des animations autour du célèbre jeu', 'vie étudiante-culture', '2019-06-20');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id_info`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `info`
--
ALTER TABLE `info`
  MODIFY `id_info` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
