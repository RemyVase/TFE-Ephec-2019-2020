-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 24, 2020 at 01:59 PM
-- Server version: 5.7.26
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `tfe`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `ajoutAnimal` (IN `id` INT, IN `nom` VARCHAR(255), IN `age` VARCHAR(255), IN `ville` VARCHAR(255), IN `descr` TEXT, IN `img` VARCHAR(255))  BEGIN
INSERT INTO adoption(id_assoc, nom_animal, age_animal, ville_animal, desc_animal,img_animal) VALUES(id,nom,age,ville,descr,img);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ajoutAssoc` (IN `id` INT, IN `nom` VARCHAR(255), IN `adresse` VARCHAR(255), IN `email` VARCHAR(255), IN `tel` VARCHAR(255), IN `site` VARCHAR(255), IN `descr` TEXT, IN `face` VARCHAR(255), IN `insta` VARCHAR(255), IN `placesQ` INT, IN `placesR` INT, IN `img` VARCHAR(255))  BEGIN

INSERT INTO associations(id_user, nom_assoc, adresse_assoc,  email_assoc, tel_assoc, site_assoc, desc_assoc, face_assoc, insta_assoc, nbPlaceQuarant_assoc, nbPlaceRegle_assoc, img) values (id, nom, adresse, email, tel, site, descr, face, insta, placesQ, placesR, img);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ajoutDemande` (IN `id` INT, IN `titre` VARCHAR(255), IN `descr` TEXT, IN `img` VARCHAR(255), IN `ville` VARCHAR(255))  BEGIN 
INSERT INTO demandesDons(id_assoc, titre_demande, desc_demande,img, ville_demande) VALUES(id,titre,descr,img,ville);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ajoutOffre` (IN `id` INT, IN `titre` VARCHAR(255), IN `descr` TEXT, IN `ville` VARCHAR(255), IN `etat` VARCHAR(255), IN `img` VARCHAR(255))  BEGIN
INSERT INTO offresDons(id_user, titre_offre, desc_offre, ville_offre, etat_offre,img) VALUES (id,titre,descr,ville,etat,img);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ajoutUser` (IN `pseudo` VARCHAR(255), IN `email` VARCHAR(255), IN `password` VARCHAR(255))  BEGIN
INSERT INTO users(pseudo_user, mail_user, mdp_user) values (pseudo, email, password);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `checkAnimal` (IN `nom` VARCHAR(255), IN `age` VARCHAR(255), IN `ville` VARCHAR(255))  BEGIN
SELECT id_animal FROM adoption
WHERE nom_animal = nom && age_animal = age && ville_animal = ville;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `checkAssoc` (IN `nom` VARCHAR(255))  BEGIN 
SELECT id_assoc FROM associations
WHERE nom_assoc = nom;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `checkAssocDemande` (IN `idAssoc` INT, IN `idDemande` INT)  BEGIN
SELECT * FROM demandesDons
WHERE id_assoc = idAssoc and id_demande = idDemande;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `checkMail` (IN `email` VARCHAR(255))  BEGIN
select id_user from users
where email = mail_user; 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `checkNbAnimaux` ()  BEGIN
SELECT COUNT(id_animal) FROM adoption;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `checkNbAssoc` ()  BEGIN
SELECT COUNT(id_assoc) FROM associations;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `checkNbDemande` ()  BEGIN
SELECT COUNT(id_demande) FROM demandesDons;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `checkNbMesOffres` (IN `id` INT)  BEGIN
SELECT COUNT(*) FROM offresDons
WHERE id_user = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `checkNbNosAnimaux` (IN `id` INT)  BEGIN
SELECT COUNT(*) FROM adoption
WHERE id_assoc = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `checkNbNosDemandes` (IN `id` INT)  BEGIN
SELECT COUNT(id_demande) FROM demandesDons
WHERE id_assoc = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `checkNbOffre` ()  BEGIN
SELECT COUNT(id_offre) FROM offresDons;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `checkOffre` (IN `id` INT, IN `titre` VARCHAR(255), IN `descr` TEXT)  BEGIN
SELECT * FROM offresDons
WHERE id_user = id and titre_offre = titre and desc_offre = descr;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `checkPassword` (IN `id` INT)  BEGIN
SELECT mdp_user FROM users
WHERE id_user = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `checkPseudo` (IN `pseudo` VARCHAR(255))  BEGIN
select id_user from users
where pseudo = pseudo_user; 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `checkUserAnnonce` (IN `idUser` INT, IN `idAnnonce` INT)  BEGIN
SELECT * FROM offresDons
WHERE id_user = idUser and id_offre = idAnnonce;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `checkUserIntoAssoc` (IN `id` INT)  BEGIN
SELECT id_assoc FROM associations
WHERE id_user = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `connexionUser` (IN `pseudo` VARCHAR(255), IN `passwd` VARCHAR(255))  BEGIN
SELECT id_user, pseudo_user, mail_user, date_user, id_assoc  FROM users 
WHERE passwd = mdp_user AND (pseudo = pseudo_user OR pseudo = mail_user); 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteAnimal` (IN `id` INT)  BEGIN
DELETE FROM adoption
WHERE id_animal = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteAssoc` (IN `id` INT)  BEGIN
DELETE FROM associations
WHERE id_assoc = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteDemande` (IN `id` INT)  BEGIN
DELETE FROM demandesDons
WHERE id_demande = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteOffre` (IN `id` INT)  BEGIN
DELETE FROM offresDons
WHERE id_offre = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `gestionDeCompte` (IN `id` INT, IN `passwd` VARCHAR(255))  BEGIN 
UPDATE users
SET mdp_user = passwd
WHERE id_user = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `modifAnimal` (IN `id` INT, IN `nom` VARCHAR(255), IN `age` VARCHAR(255), IN `ville` VARCHAR(255), IN `descr` TEXT, IN `statut` VARCHAR(255))  BEGIN
UPDATE adoption
SET nom_animal = nom, age_animal = age, ville_animal = ville, desc_animal = descr, statut_animal = statut
WHERE id_animal = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `modifAssoc` (IN `id` VARCHAR(255), IN `nom` VARCHAR(255), IN `adresse` VARCHAR(255), IN `email` VARCHAR(255), IN `tel` VARCHAR(255), IN `site` VARCHAR(255), IN `descr` TEXT, IN `face` VARCHAR(255), IN `insta` VARCHAR(255), IN `placesQ` INT, IN `placesR` INT)  BEGIN
UPDATE associations
SET nom_assoc = nom, adresse_assoc = adresse, email_assoc = email, tel_assoc = tel, site_assoc = site, desc_assoc = descr, face_assoc = face, insta_assoc = insta, nbPlaceQuarant_assoc = placesQ, nbPlaceRegle_assoc = placesR
WHERE id_assoc = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `modifDemande` (IN `id` INT, IN `titre` VARCHAR(255), IN `ville` VARCHAR(255), IN `descr` VARCHAR(255))  BEGIN 
UPDATE demandesDons
SET titre_demande = titre, desc_demande = descr, ville_demande = ville
WHERE id_demande = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `modifImgAnimal` (IN `id` INT, IN `img` VARCHAR(255))  BEGIN
UPDATE adoption
SET img_animal = img
WHERE id_animal = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `modifImgAssoc` (IN `id` INT, IN `img` VARCHAR(255))  BEGIN
UPDATE associations
SET img = img
WHERE id_assoc = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `modifImgDemande` (IN `id` INT, IN `img` VARCHAR(255))  BEGIN
UPDATE demandesDons
SET img = img
WHERE id_demande = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `modifImgOffre` (IN `id` INT, IN `img` VARCHAR(255))  BEGIN
UPDATE offresDons
SET img = img
WHERE id_offre = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `modifOffre` (IN `id` INT, IN `titre` VARCHAR(255), IN `descr` TEXT, IN `ville` VARCHAR(255), IN `etat` VARCHAR(255))  BEGIN
UPDATE offresDons
SET titre_offre = titre, desc_offre = descr, ville_offre = ville, etat_offre = etat
WHERE id_offre = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `recupAllAnimaux` (IN `nbAnimaux` INT, IN `nbPage` INT)  BEGIN
SELECT * FROM adoption
JOIN associations
ON associations.id_assoc = adoption.id_assoc
LIMIT nbPage,nbAnimaux;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `recupAllAssoc` (IN `nbAssoc` INT, IN `nbPage` INT)  BEGIN
SELECT * FROM associations LIMIT nbPage,nbAssoc;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `recupAllDemandes` (IN `nbDemande` INT, IN `nbPage` INT)  BEGIN
SELECT * FROM demandesDons LIMIT nbPage,nbDemande;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `recupAllMesOffres` (IN `nbOffre` INT, IN `nbPage` INT, IN `id` INT)  BEGIN
SELECT * FROM offresDons
WHERE id_user = id
LIMIT nbPage, nbOffre;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `recupAllNosAnimaux` (IN `nbAnimaux` INT, IN `nbPage` INT, IN `id` INT)  BEGIN
SELECT * FROM adoption
JOIN associations
ON associations.id_assoc = adoption.id_assoc
WHERE adoption.id_assoc = id
LIMIT nbPage,nbAnimaux;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `recupAllNosDemandes` (IN `nbDemande` INT, IN `nbPage` INT, IN `id` INT)  BEGIN
SELECT * FROM demandesDons
WHERE id_assoc = id
LIMIT nbPage,nbDemande;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `recupAllOffres` (IN `nbOffre` INT, IN `nbPage` INT)  BEGIN
SELECT * FROM offresDons LIMIT nbPage,nbOffre;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `recupMonAssoc` (IN `id` INT)  BEGIN 
SELECT * FROM associations
JOIN users on users.id_assoc = associations.id_assoc
WHERE users.id_user = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `recupOneAnimal` (IN `id` INT)  BEGIN 
SELECT * FROM adoption
JOIN associations
ON associations.id_assoc = adoption.id_assoc
WHERE adoption.id_animal = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `recupOneAnnonce` (IN `id` INT)  BEGIN
SELECT offresDons.titre_offre, offresDons.desc_offre, offresDons.ville_offre, offresDons.etat_offre, offresDons.img, users.pseudo_user FROM offresDons
JOIN users ON users.id_user = offresDons.id_user
WHERE id_offre = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `recupOneAssoc` (IN `id` INT)  BEGIN
SELECT * FROM associations
WHERE id_assoc = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `recupOneDemande` (IN `id` INT)  BEGIN
SELECT associations.nom_assoc, demandesDons.titre_demande, demandesDons.desc_demande, demandesDons.ville_demande, demandesDons.img FROM demandesDons
JOIN associations ON associations.id_assoc = demandesDons.id_assoc
WHERE demandesDons.id_demande = id;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `adoption`
--

CREATE TABLE `adoption` (
  `id_animal` int(11) NOT NULL,
  `id_assoc` int(11) NOT NULL,
  `nom_animal` varchar(255) NOT NULL,
  `age_animal` varchar(255) NOT NULL,
  `ville_animal` varchar(255) NOT NULL,
  `desc_animal` text NOT NULL,
  `statut_animal` varchar(255) NOT NULL DEFAULT 'dispo',
  `date_animal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `img_animal` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `adoption`
--

INSERT INTO `adoption` (`id_animal`, `id_assoc`, `nom_animal`, `age_animal`, `ville_animal`, `desc_animal`, `statut_animal`, `date_animal`, `img_animal`) VALUES
(1, 1, 'Jean-Charles', '15 ans ', 'PAC', 'Cooooool', 'Disponible', '2020-03-17 15:36:56', '../img/img_adoption/chienListe.jpeg'),
(2, 1, 'Alfred', '30 ans', 'Luttre', 'Pas coooool', 'Disponible', '2020-03-17 15:40:51', '../img/img_adoption/chiensGestion.jpeg'),
(3, 1, 'Adebayor', '8ans ', 'Pont-à-Celles', 'Câlin à souhait cherche une famille pour profiter de sa retraite.', 'dispo', '2020-03-17 15:41:42', '../img/img_adoption/chienDors.jpeg'),
(5, 6, 'Charles', '2ans', 'Luttre', 'Gentil', 'dispo', '2020-03-17 16:12:32', '../img/img_adoption/chatCoussin.jpeg'),
(6, 1, 'Pedro', '6 ans ', 'Bruxelles', 'Gentils, pas méchant, lol ', 'dispo', '2020-03-19 22:21:01', '../img/img_adoption/chienSolo.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `associations`
--

CREATE TABLE `associations` (
  `id_assoc` int(11) NOT NULL,
  `nom_assoc` varchar(255) NOT NULL,
  `adresse_assoc` varchar(255) NOT NULL,
  `email_assoc` varchar(255) NOT NULL,
  `tel_assoc` varchar(255) NOT NULL,
  `site_assoc` varchar(255) NOT NULL,
  `desc_assoc` text NOT NULL,
  `face_assoc` varchar(255) NOT NULL,
  `insta_assoc` varchar(255) NOT NULL,
  `nbPlaceQuarant_assoc` int(11) NOT NULL,
  `nbPlaceRegle_assoc` int(11) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `associations`
--

INSERT INTO `associations` (`id_assoc`, `nom_assoc`, `adresse_assoc`, `email_assoc`, `tel_assoc`, `site_assoc`, `desc_assoc`, `face_assoc`, `insta_assoc`, `nbPlaceQuarant_assoc`, `nbPlaceRegle_assoc`, `img`) VALUES
(1, 'testLOLILOL', 'testLOL', 'test@hotmail.com', '0477080641', 'zegzLOLOLOLOL', 'egzgzeg', 'ezgzeg', 'zegzeg', 2, 2, '../img/img_assoc/chienOubli.jpeg'),
(2, 'ezr', 'ezr', 'ezr', 'ezr', 'zer', 'zer', 'zer', 'zer', 2, 1, '../img/img_assoc/chatOrigami.png'),
(3, 'zaer', 'zera', 'zeraze', 'zerzerezrezrzer', 'zerzer', 'ezrezr', 'zerezr', 'ezrzer', 2, 3, ''),
(4, 'azer', 'zaer', 'zera', 'azer', 'azer', 'zaer', 'azer', 'azer', 5, 6, ''),
(5, 'zer', 'zer', 'zer', 'zer', 'zer', 'zer', 'zer', 'zer', 1, 8, ''),
(6, 'zer', 'zer', 'zer', 'zer', 'try', 'rty', 'rty', 'rty', 5, 4, ''),
(7, 'tata', 'tata', 'tata@hotmail.com', '0477080641', 'tata', 'tata', 'tata', 'tata', 3, 10, '../img/img_assoc/chatCoussin.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `demandesDons`
--

CREATE TABLE `demandesDons` (
  `id_demande` int(11) NOT NULL,
  `id_assoc` int(11) NOT NULL,
  `titre_demande` varchar(255) NOT NULL,
  `desc_demande` text NOT NULL,
  `dateCrea_demande` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `img` varchar(255) NOT NULL,
  `ville_demande` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `demandesDons`
--

INSERT INTO `demandesDons` (`id_demande`, `id_assoc`, `titre_demande`, `desc_demande`, `dateCrea_demande`, `img`, `ville_demande`) VALUES
(4, 1, 'test', 'testestestestestestest', '2020-03-23 16:08:51', '../img/img_demande/chienOubli.jpeg', 'Luttre'),
(5, 1, 'test', 'test', '2020-03-23 16:11:19', '../img/img_demande/chatAdopte2.jpeg', ''),
(6, 1, 'collier', 'collier pour grands chiens de type husky', '2020-03-23 16:58:10', '../img/img_demande/chienSauve.jpeg', 'pac');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id_message` int(11) NOT NULL,
  `id_receveur` int(11) NOT NULL,
  `id_envoyeur` int(11) NOT NULL,
  `contenu_message` text NOT NULL,
  `date_message` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `offresDons`
--

CREATE TABLE `offresDons` (
  `id_offre` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `titre_offre` varchar(255) NOT NULL,
  `desc_offre` text NOT NULL,
  `ville_offre` varchar(255) NOT NULL,
  `etat_offre` varchar(255) NOT NULL,
  `dateCrea_offre` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `offresDons`
--

INSERT INTO `offresDons` (`id_offre`, `id_user`, `titre_offre`, `desc_offre`, `ville_offre`, `etat_offre`, `dateCrea_offre`, `img`) VALUES
(3, 14, 'test53400', 'test', 'test', 'test', '2020-03-23 15:54:40', '../img/img_offre/chatArbre.jpg'),
(4, 14, 'test', 'test', 'test', 'test', '2020-03-23 16:19:03', '../img/img_offre/chatAdopte3.jpeg'),
(5, 14, 'test', 'test', 'test', 'test', '2020-03-23 16:20:09', '../img/img_offre/chatAdopte3.jpeg'),
(6, 14, 'test2', 'test', 'test', 'test', '2020-03-23 16:24:44', '../img/img_offre/chatCouverture.jpeg'),
(7, 51, 'Arbre à chat2', 'Arbre à chat à 5 étages ', 'Luttre', 'Presque neuf', '2020-03-24 11:11:43', '../img/img_offre/chatTriste.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `pseudo_user` varchar(255) NOT NULL,
  `mail_user` varchar(255) NOT NULL,
  `mdp_user` varchar(255) NOT NULL,
  `date_user` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_assoc` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `pseudo_user`, `mail_user`, `mdp_user`, `date_user`, `id_assoc`) VALUES
(14, 'toto', 'toto@hotmail.com', '31f7a65e315586ac198bd798b6629ce4903d0899476d5741a9f32e2e521b6a66', '2020-02-29 14:32:58', 1),
(15, 'remy', 'remy.vase3@hotmail.fr', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08', '2020-02-29 17:23:29', 2),
(16, 'ergerg', 'ereerg@erbgzeg.com', 'cb07764c395219c9967b1106b50de58e279ca6cd4d279b8cf8a8b7ae39d96313', '2020-03-07 18:17:00', 3),
(17, 'tonton', 'tonton@hotmail.com', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08', '2020-03-16 09:45:46', 4),
(30, 'tutu', 'tutu@hotmail.com', 'eb0295d98f37ae9e95102afae792d540137be2dedf6c4b00570ab1d1f355d033', '2020-03-16 10:19:29', 5),
(33, 'tata', 'tata@hotmail.com', 'd1c7c99c6e2e7b311f51dd9d19161a5832625fb21f35131fba6da62513f0c099', '2020-03-16 10:29:53', 6),
(47, 'dada', 'dada@hotmail.be', '47c7ef39cfa6b7bd1286d9c83424f322741549e849ad1af19a8416e861434da5', '2020-03-16 10:53:37', 7),
(48, 'titi', 'titi@hotmail.com', 'cce66316b4c1c59df94a35afb80cecd82d1a8d91b554022557e115f5c275f515', '2020-03-16 10:56:33', NULL),
(49, 'roro', 'roro@hotmail.be', '530fe0e0d55493c93d3140b0f8fc929323ec34a82ddeb60bbf5090e5e3b49b5e', '2020-03-16 11:01:18', NULL),
(50, 'roro1', 'roro4@hotmail.be', '530fe0e0d55493c93d3140b0f8fc929323ec34a82ddeb60bbf5090e5e3b49b5e', '2020-03-16 11:03:18', NULL),
(51, 'truc', 'truc@hotmail.com', 'fe6b57e537d2ff888ead8bc8484965b34838088143d9d7f12c82c964104be641', '2020-03-16 11:06:12', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adoption`
--
ALTER TABLE `adoption`
  ADD PRIMARY KEY (`id_animal`),
  ADD KEY `adoption_ibfk_1` (`id_assoc`);

--
-- Indexes for table `associations`
--
ALTER TABLE `associations`
  ADD PRIMARY KEY (`id_assoc`);

--
-- Indexes for table `demandesDons`
--
ALTER TABLE `demandesDons`
  ADD PRIMARY KEY (`id_demande`),
  ADD KEY `id_assoc` (`id_assoc`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id_message`),
  ADD KEY `id_envoyeur` (`id_envoyeur`),
  ADD KEY `id_receveur` (`id_receveur`);

--
-- Indexes for table `offresDons`
--
ALTER TABLE `offresDons`
  ADD PRIMARY KEY (`id_offre`),
  ADD KEY `offresdons_ibfk_1` (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adoption`
--
ALTER TABLE `adoption`
  MODIFY `id_animal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `associations`
--
ALTER TABLE `associations`
  MODIFY `id_assoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `demandesDons`
--
ALTER TABLE `demandesDons`
  MODIFY `id_demande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id_message` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `offresDons`
--
ALTER TABLE `offresDons`
  MODIFY `id_offre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adoption`
--
ALTER TABLE `adoption`
  ADD CONSTRAINT `adoption_ibfk_1` FOREIGN KEY (`id_assoc`) REFERENCES `associations` (`id_assoc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `demandesDons`
--
ALTER TABLE `demandesDons`
  ADD CONSTRAINT `demandesdons_ibfk_1` FOREIGN KEY (`id_assoc`) REFERENCES `associations` (`id_assoc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`id_envoyeur`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`id_receveur`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `offresDons`
--
ALTER TABLE `offresDons`
  ADD CONSTRAINT `offresdons_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
