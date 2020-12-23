-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2020 at 03:43 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `annonces`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_annonce`
--

CREATE TABLE `t_annonce` (
  `A_idannonce` int(11) NOT NULL,
  `A_titre` varchar(255) NOT NULL,
  `A_cout_loyer` int(11) NOT NULL,
  `A_cout_charges` int(11) NOT NULL,
  `A_type_chauffage` varchar(255) NOT NULL,
  `A_superficie` int(11) NOT NULL,
  `A_description` varchar(255) NOT NULL,
  `A_adresse` varchar(255) NOT NULL,
  `A_ville` varchar(255) NOT NULL,
  `A_CP` varchar(255) NOT NULL,
  `A_date_creation` date NOT NULL DEFAULT current_timestamp(),
  `A_etat` varchar(255) NOT NULL,
  `A_U_mail` varchar(255) NOT NULL,
  `A_E_id_engie` int(11) DEFAULT NULL,
  `A_T_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_annonce`
--

INSERT INTO `t_annonce` (`A_idannonce`, `A_titre`, `A_cout_loyer`, `A_cout_charges`, `A_type_chauffage`, `A_superficie`, `A_description`, `A_adresse`, `A_ville`, `A_CP`, `A_date_creation`, `A_etat`, `A_U_mail`, `A_E_id_engie`, `A_T_type`) VALUES
(150, 'Immeuble', 550, 1500, 'Collectif', 100, 'la description', '4 rue raoul follereau', 'arles', '13200', '2020-12-22', 'brouillon', 'a@a.a', 1, 'T3'),
(151, 'Immeuble', 550, 1500, 'Collectif', 100, 'la description', '4 rue raoul follereau', 'arles', '13200', '2020-12-22', 'brouillon', 'a@a.a', 1, 'T3'),
(152, 'Immeuble', 550, 1500, 'Collectif', 100, 'la description', '4 rue raoul follereau', 'arles', '13200', '2020-12-22', 'brouillon', 'a@a.a', 1, 'T3'),
(153, 'Immeuble', 550, 1500, 'Individuel', 100, 'la description', '4 rue raoul follereau', 'arles', '13200', '2020-12-22', 'brouillon', 'a@a.a', 1, 'T3'),
(154, 'Immeuble', 550, 1500, 'Individuel', 100, 'la description', '4 rue raoul follereau', 'arles', '13200', '2020-12-22', 'brouillon', 'a@a.a', 1, 'T3'),
(155, 'Immeuble', 550, 1500, 'Individuel', 100, 'la description', '4 rue raoul follereau', 'arles', '13200', '2020-12-22', 'brouillon', 'a@a.a', 1, 'T3'),
(156, 'Maison 5 pièces', 2000, 20000, 'Collectif', 296, 'La description', '4 rue Raoul Follereau', 'Arles', '13200', '2020-12-22', 'brouillon', 'a@a.a', 1, 'T5'),
(157, 'Maison 5 pièces', 2000, 20000, 'Collectif', 296, 'La description', '4 rue Raoul Follereau', 'Arles', '13200', '2020-12-22', 'brouillon', 'a@a.a', 1, 'T5'),
(158, 'Maison 5 pièces', 2000, 20000, 'Collectif', 296, 'La description', '4 rue Raoul Follereau', 'Arles', '13200', '2020-12-22', 'brouillon', 'a@a.a', 1, 'T5'),
(159, 'Maison 5 pièces', 2000, 20000, 'Collectif', 296, 'La description', '4 rue Raoul Follereau', 'Arles', '13200', '2020-12-22', 'brouillon', 'a@a.a', 1, 'T5'),
(160, 'Maison 5 pièces', 2000, 20000, 'Collectif', 296, 'La description', '4 rue Raoul Follereau', 'Arles', '13200', '2020-12-22', 'brouillon', 'a@a.a', 1, 'T5'),
(161, 'Maison 5 pièces', 2000, 20000, 'Collectif', 296, 'La description', '4 rue Raoul Follereau', 'Arles', '13200', '2020-12-22', 'brouillon', 'a@a.a', 1, 'T5'),
(162, 'Maison 5 pièces', 2000, 20000, 'Collectif', 296, 'La description', '4 rue Raoul Follereau', 'Arles', '13200', '2020-12-22', 'brouillon', 'a@a.a', 1, 'T5'),
(163, 'Maison 5 pièces', 2000, 20000, 'Collectif', 296, 'La description', '4 rue Raoul Follereau', 'Arles', '13200', '2020-12-22', 'brouillon', 'a@a.a', 1, 'T5'),
(164, 'Maison 5 pièces', 2000, 20000, 'Collectif', 296, 'La description', '4 rue Raoul Follereau', 'Arles', '13200', '2020-12-22', 'brouillon', 'a@a.a', 1, 'T5'),
(165, 'Maison 5 pièces', 2000, 20000, 'Collectif', 296, 'La description', '4 rue Raoul Follereau', 'Arles', '13200', '2020-12-22', 'brouillon', 'a@a.a', 1, 'T5'),
(166, 'Maison 5 pièces', 2000, 20000, 'Collectif', 296, 'La description', '4 rue Raoul Follereau', 'Arles', '13200', '2020-12-22', 'brouillon', 'a@a.a', 1, 'T5'),
(167, 'test', 9, 9, 'Collectif', 9, 'hvftybybu', 'hyg', 'uygbyu', '59595', '2020-12-22', 'brouillon', 'a@a.a', 1, 'T1'),
(168, 'test', 9, 9, 'Collectif', 9, 'hvftybybu', 'hyg', 'uygbyu', '59595', '2020-12-22', 'brouillon', 'a@a.a', 1, 'T1'),
(169, 'Maison 5 pièces', 1500, 2000, 'Collectif', 150, 'La description', '4 allée des Maures', 'Miramas', '13140', '2020-12-22', 'brouillon', 'matduf13@live.fr', 1, 'T6'),
(170, 'rfcdsrfc', 5286, 563, 'Individuel', 3863, '386', '683', '386', '638', '2020-12-22', 'brouillon', 'matduf13@live.fr', 2, 'T1'),
(171, 'btyh', 52, 52, 'Collectif', 752, '75225', '257', '725', '527', '2020-12-22', 'brouillon', 'matduf13@live.fr', 1, 'T1'),
(172, 'rthb', 5885, 8, 'Collectif', 85, '85', '85', '87', '85', '2020-12-22', 'brouillon', 'matduf13@live.fr', 1, 'T1'),
(174, 'Appartement 6 pièces', 2500, 2000, 'Collectif', 99, '', '4 Rue Raoul Follereau', 'Arles', '13200', '2020-12-22', 'brouillon', 'matduf13@live.fr', NULL, 'T6'),
(175, 'hy', 58, 58, 'Collectif', 58, '58', '58', '58', '58', '2020-12-22', 'brouillon', 'matduf13@live.fr', 1, 'T1'),
(184, 'vy', 58, 58, 'Collectif', 58, '58', '58', '58', '58', '2020-12-22', 'brouillon', 'matduf13@live.fr', 1, 'T1'),
(190, 'kiki', 25, 25, 'Collectif', 25, '25', '25', '25', '25', '2020-12-22', 'brouillon', 'matduf13@live.fr', 4, 'T1'),
(191, 'azertyuiopazertyuiopazertyuiopazertyuiop', 58, 58, 'Collectif', 58, '58', '58', '58', '58', '2020-12-22', 'brouillon', 'matduf13@live.fr', 4, 'T1');

-- --------------------------------------------------------

--
-- Table structure for table `t_energie`
--

CREATE TABLE `t_energie` (
  `E_id_engie` int(11) NOT NULL,
  `E_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_energie`
--

INSERT INTO `t_energie` (`E_id_engie`, `E_description`) VALUES
(1, 'Fioul'),
(2, 'Électrique'),
(3, 'Gaz'),
(4, 'Non renseigné');

-- --------------------------------------------------------

--
-- Table structure for table `t_message`
--

CREATE TABLE `t_message` (
  `M_dateheure_message` datetime NOT NULL,
  `M_texte_message` varchar(255) NOT NULL,
  `M_U_mail` varchar(255) NOT NULL,
  `M_A_idannonce` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `t_photo`
--

CREATE TABLE `t_photo` (
  `P_idphoto` int(11) NOT NULL,
  `P_titre` varchar(255) NOT NULL,
  `P_nom` varchar(255) NOT NULL,
  `P_A_idannonce` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_photo`
--

INSERT INTO `t_photo` (`P_idphoto`, `P_titre`, `P_nom`, `P_A_idannonce`) VALUES
(30, '', '1-perspective-150.jpg', 150),
(31, '', '2-porto-vecchio-le-dommaine-de-la-tour-achat-villa-neuve-luxe-4-150.jpg', 150),
(32, '', '3-perspective-150.jpg', 150),
(33, '', '4-2ca8de3489629239b6142afcfa273a3fa1b8d5ba-150.jpg', 150),
(34, '', '1-e098a554fff7a4ac04e1e6137a67e7547ff4a8da-151.jpg', 151),
(35, '', '2-perspective-27161-151.jpg', 151),
(36, '', '3-perspective-151.jpg', 151),
(37, '', '4-2ca8de3489629239b6142afcfa273a3fa1b8d5ba-151.jpg', 151),
(38, '', '1-2ca8de3489629239b6142afcfa273a3fa1b8d5ba-152.jpg', 152),
(39, '', '2-perspective-27161-152.jpg', 152),
(40, '', '3-perspective-152.jpg', 152),
(41, '', '4-2ca8de3489629239b6142afcfa273a3fa1b8d5ba-152.jpg', 152),
(42, '', '1-porto-vecchio-le-dommaine-de-la-tour-achat-villa-neuve-luxe-4-153.jpg', 153),
(43, '', '2-perspective-27161-153.jpg', 153),
(44, '', '3-perspective-153.jpg', 153),
(45, '', '4-2ca8de3489629239b6142afcfa273a3fa1b8d5ba-153.jpg', 153),
(46, '', '1-2ca8de3489629239b6142afcfa273a3fa1b8d5ba-154.jpg', 154),
(47, '', '2-perspective-27161-154.jpg', 154),
(48, '', '3-perspective-154.jpg', 154),
(49, '', '4-2ca8de3489629239b6142afcfa273a3fa1b8d5ba-154.jpg', 154),
(50, '', '1-perspective-155.jpg', 155),
(51, '', '2-perspective-27161-155.jpg', 155),
(52, '', '3-perspective-155.jpg', 155),
(53, '', '4-2ca8de3489629239b6142afcfa273a3fa1b8d5ba-155.jpg', 155),
(54, '', '1-porto-vecchio-le-dommaine-de-la-tour-achat-villa-neuve-luxe-4-156.jpg', 156),
(55, '', '1-perspective-157.jpg', 157),
(56, '', '1-perspective-27161-158.jpg', 158),
(57, '', '1-2ca8de3489629239b6142afcfa273a3fa1b8d5ba-159.jpg', 159),
(58, '', '1-a22256fda2caf153ce4249e91545f546d2f2b566-160.jpg', 160),
(59, '', '1-e098a554fff7a4ac04e1e6137a67e7547ff4a8da-161.jpg', 161),
(60, '', '1-ybhrtybhtyhbt-162.jpg', 162),
(61, '', '1-rtbyhtyhbt-163.jpg', 163),
(62, '', '1-rtbyht-164.jpg', 164),
(63, '', '1-rtbhyty-165.jpg', 165),
(64, '', '1-hnbgybngybgyby-166.jpg', 166),
(65, '', '1-wallhaven-103929-167.png', 167),
(66, '', '1-zaq7XMr-168.gif', 168),
(67, '', '1-bryhty-169.jpg', 169),
(68, '', '1-bryhty-170.jpg', 170),
(69, '', '1-2ca8de3489629239b6142afcfa273a3fa1b8d5ba-171.jpg', 171),
(70, '', '1-ybhrtybhtyhbt-172.jpg', 172),
(71, '', '1-rtbhyty-175.jpg', 175),
(72, '', '1-bryjbyyrbu-184.jpg', 184),
(73, '', '1-bryjbyyrbu-190.jpg', 190),
(74, '', '1-porto-vecchio-le-dommaine-de-la-tour-achat-villa-neuve-luxe-4-191.jpg', 191);

-- --------------------------------------------------------

--
-- Table structure for table `t_typemaison`
--

CREATE TABLE `t_typemaison` (
  `T_type` varchar(255) NOT NULL,
  `T_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_typemaison`
--

INSERT INTO `t_typemaison` (`T_type`, `T_description`) VALUES
('T1', '1 pièce'),
('T2', '2 pièces'),
('T3', '3 pièces'),
('T4', '4 pièces'),
('T5', '5 pièces'),
('T6', '6 pièces');

-- --------------------------------------------------------

--
-- Table structure for table `t_utilisateur`
--

CREATE TABLE `t_utilisateur` (
  `U_mail` varchar(255) NOT NULL,
  `U_mdp` varchar(255) NOT NULL,
  `U_pseudo` varchar(255) NOT NULL,
  `U_nom` varchar(255) NOT NULL,
  `U_prenom` varchar(255) NOT NULL,
  `U_isAdmin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_utilisateur`
--

INSERT INTO `t_utilisateur` (`U_mail`, `U_mdp`, `U_pseudo`, `U_nom`, `U_prenom`, `U_isAdmin`) VALUES
('a@a.a', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 'matduf13', 'Dufour', 'Mattéo', 0),
('aa@aa.aa', 'e0c9035898dd52fc65c41454cec9c4d2611bfb37', 'azertyuiopazertyuiopazertyuiop', 'rgd', 'gtrg', 0),
('aaa@aaa.aaa', '7e240de74fb1ed08fa08d38063f6a6a91462a815', 'josephstalineaime', 'tgr', 'tr', 0),
('matduf13@live.fr', '1fa2ef4755a9226cb9a0a4840bd89b158ac71391', 'matduf', 'Dufour', 'Mattéo', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_annonce`
--
ALTER TABLE `t_annonce`
  ADD PRIMARY KEY (`A_idannonce`),
  ADD KEY `FK_annonce_utilisateur` (`A_U_mail`),
  ADD KEY `FK_annonce_energie` (`A_E_id_engie`),
  ADD KEY `FK_annonce_typeMaison` (`A_T_type`);

--
-- Indexes for table `t_energie`
--
ALTER TABLE `t_energie`
  ADD PRIMARY KEY (`E_id_engie`);

--
-- Indexes for table `t_message`
--
ALTER TABLE `t_message`
  ADD PRIMARY KEY (`M_U_mail`,`M_A_idannonce`),
  ADD KEY `FK_message_utilisateur` (`M_U_mail`),
  ADD KEY `FK_message_annonce` (`M_A_idannonce`);

--
-- Indexes for table `t_photo`
--
ALTER TABLE `t_photo`
  ADD PRIMARY KEY (`P_idphoto`),
  ADD KEY `FK_photo_annonce` (`P_A_idannonce`);

--
-- Indexes for table `t_typemaison`
--
ALTER TABLE `t_typemaison`
  ADD PRIMARY KEY (`T_type`);

--
-- Indexes for table `t_utilisateur`
--
ALTER TABLE `t_utilisateur`
  ADD PRIMARY KEY (`U_mail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_annonce`
--
ALTER TABLE `t_annonce`
  MODIFY `A_idannonce` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=192;

--
-- AUTO_INCREMENT for table `t_energie`
--
ALTER TABLE `t_energie`
  MODIFY `E_id_engie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `t_photo`
--
ALTER TABLE `t_photo`
  MODIFY `P_idphoto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_annonce`
--
ALTER TABLE `t_annonce`
  ADD CONSTRAINT `FK_annonce_energie` FOREIGN KEY (`A_E_id_engie`) REFERENCES `t_energie` (`E_id_engie`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_annonce_typeMaison` FOREIGN KEY (`A_T_type`) REFERENCES `t_typemaison` (`T_type`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_annonce_utilisateur` FOREIGN KEY (`A_U_mail`) REFERENCES `t_utilisateur` (`U_mail`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `t_message`
--
ALTER TABLE `t_message`
  ADD CONSTRAINT `FK_message_annonce` FOREIGN KEY (`M_A_idannonce`) REFERENCES `t_annonce` (`A_idannonce`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_message_utilisateur` FOREIGN KEY (`M_U_mail`) REFERENCES `t_utilisateur` (`U_mail`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `t_photo`
--
ALTER TABLE `t_photo`
  ADD CONSTRAINT `FK_photo_annonce` FOREIGN KEY (`P_A_idannonce`) REFERENCES `t_annonce` (`A_idannonce`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
