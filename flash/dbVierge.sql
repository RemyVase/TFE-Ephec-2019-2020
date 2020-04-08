-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 08, 2020 at 04:40 PM
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
CREATE DEFINER=`root`@`localhost` PROCEDURE `addIdAssocIntoUser` (IN `idAssoc` INT, IN `idUser` INT)  BEGIN
UPDATE users
SET id_assoc = idAssoc
WHERE id_user = idUser;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ajoutAnimal` (IN `id` INT, IN `nom` VARCHAR(255), IN `age` VARCHAR(255), IN `ville` VARCHAR(255), IN `descr` TEXT, IN `img` VARCHAR(255), IN `typeAnimal` VARCHAR(255))  BEGIN
INSERT INTO adoption(id_assoc, nom_animal, age_animal, ville_animal, desc_animal,img_animal,type_animal) VALUES(id,nom,age,ville,descr,img,typeAnimal);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ajoutAssoc` (IN `nom` VARCHAR(255), IN `adresse` VARCHAR(255), IN `email` VARCHAR(255), IN `tel` VARCHAR(255), IN `site` VARCHAR(255), IN `descr` TEXT, IN `face` VARCHAR(255), IN `insta` VARCHAR(255), IN `placesQ` INT, IN `placesR` INT, IN `img` VARCHAR(255), IN `typeAnimal` VARCHAR(255))  BEGIN
INSERT INTO associations(nom_assoc, adresse_assoc,  email_assoc, tel_assoc, site_assoc, desc_assoc, face_assoc, insta_assoc, nbPlaceQuarant_assoc, nbPlaceRegle_assoc, img, typeAnimal_assoc) values (nom, adresse, email, tel, site, descr, face, insta, placesQ, placesR, img, typeAnimal);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ajoutDemande` (IN `id` INT, IN `titre` VARCHAR(255), IN `descr` TEXT, IN `img` VARCHAR(255), IN `ville` VARCHAR(255), IN `typeAnimal` VARCHAR(255), IN `typeObjet` VARCHAR(255))  BEGIN 
INSERT INTO demandesDons(id_assoc, titre_demande, desc_demande,img, ville_demande,typeAnimal_demande, typeObjet_demande) VALUES(id,titre,descr,img,ville,typeAnimal,typeObjet);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ajoutMembreAssoc` (IN `pseudo` VARCHAR(255), IN `id` INT)  BEGIN
UPDATE users
SET id_assoc = id
WHERE pseudo_user = pseudo;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ajoutOffre` (IN `id` INT, IN `titre` VARCHAR(255), IN `descr` TEXT, IN `ville` VARCHAR(255), IN `etat` VARCHAR(255), IN `img` VARCHAR(255), IN `typeAnimal` VARCHAR(255), IN `typeObjet` VARCHAR(255))  BEGIN
INSERT INTO offresDons(id_user, titre_offre, desc_offre, ville_offre, etat_offre,img,typeAnimal_offre, typeObjet_offre) VALUES (id,titre,descr,ville,etat,img,typeAnimal, typeObjet);
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

CREATE DEFINER=`root`@`localhost` PROCEDURE `checkAssocAnimal` (IN `idAssoc` INT, IN `idAnimal` INT)  BEGIN
SELECT * FROM adoption
WHERE id_assoc = idAssoc and id_animal = idAnimal;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `checkAssocDemande` (IN `idAssoc` INT, IN `idDemande` INT)  BEGIN
SELECT * FROM demandesDons
WHERE id_assoc = idAssoc and id_demande = idDemande;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `checkDemande` (IN `id` INT, IN `titre` VARCHAR(255), IN `ville` VARCHAR(255))  BEGIN
SELECT id_demande FROM demandesDons
WHERE id_assoc = id and titre_demande = titre and ville_demande = ville;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `checkMail` (IN `email` VARCHAR(255))  BEGIN
select id_user from users
where email = mail_user; 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `checkNbAnimaux` ()  BEGIN
SELECT COUNT(id_animal) FROM adoption;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `checkNbAnimauxTypeAnimal` (IN `type` VARCHAR(255))  BEGIN
SELECT COUNT(id_animal) FROM adoption
WHERE type_animal = type;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `checkNbAssoc` ()  BEGIN
SELECT COUNT(id_assoc) FROM associations;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `checkNbAssocTypeAnimal` (IN `type` VARCHAR(255))  BEGIN
SELECT COUNT(id_assoc) FROM associations
WHERE typeAnimal_assoc = type;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `checkNbDemande` ()  BEGIN
SELECT COUNT(id_demande) FROM demandesDons;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `checkNbDemandeTypeAnimal` (IN `type` VARCHAR(255))  BEGIN
SELECT COUNT(id_demande) FROM demandesDons
WHERE typeAnimal_demande = type;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `checkNbDemandeTypeObjet` (IN `type` VARCHAR(255))  BEGIN
SELECT COUNT(id_demande) FROM demandesDons
WHERE typeObjet_demande = type;
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

CREATE DEFINER=`root`@`localhost` PROCEDURE `checkNbOffreEtat` (IN `etat` VARCHAR(255))  BEGIN
SELECT COUNT(id_offre) FROM offresDons
WHERE etat_offre = etat;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `checkNbOffreTypeAnimal` (IN `type` VARCHAR(255))  BEGIN
SELECT COUNT(id_offre) FROM offresDons
WHERE typeAnimal_offre = type;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `checkNbOffreTypeObjet` (IN `type` VARCHAR(255))  BEGIN
SELECT COUNT(id_offre) FROM offresDons
WHERE typeObjet_offre = type;
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

CREATE DEFINER=`root`@`localhost` PROCEDURE `checkSiDejaDansAssoc` (IN `pseudo` VARCHAR(255))  BEGIN
SELECT id_assoc FROM users
WHERE pseudo_user = pseudo;
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

CREATE DEFINER=`root`@`localhost` PROCEDURE `messageCheckAssocConv` (IN `id` INT)  BEGIN
SELECT id_assoc FROM conversation
WHERE id_assoc = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `messageCheckUserConv` (IN `idEnvoyeur` INT, IN `idAssoc` INT)  BEGIN
SELECT userConvers.id_convers FROM userConvers
JOIN conversation ON conversation.id_convers = userConvers.id_convers
WHERE (userConvers.id_user = idEnvoyeur and conversation.id_assoc = idAssoc) or (userConvers.id_user = idAssoc and conversation.id_assoc = idEnvoyeur);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `messageCheckUserConv2` (IN `id` INT)  BEGIN
SELECT id_user FROM userConvers
WHERE id_user = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `messageCreateConvers` (IN `idAssoc` INT)  BEGIN
INSERT INTO conversation(id_assoc) values (idAssoc);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `messageEnvoiMessage` (IN `idEnvoyeur` INT, IN `idConvers` INT, IN `message` TEXT)  BEGIN
INSERT INTO messages(messages.id_envoyeur, messages.id_convers,messages.contenu_message) values (idEnvoyeur,idConvers,message);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `messageLierConversation` (IN `idEnvoyeur` INT, IN `idConvers` INT)  BEGIN
INSERT INTO userConvers (id_user, id_convers) values(idEnvoyeur,idConvers);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `messageRecupAllConversAssocUser` (IN `idAssoc` INT, IN `idUser` INT)  BEGIN
SELECT users.pseudo_user, conversation.id_convers, messages.date_message, messages.contenu_message 
FROM conversation
JOIN messages ON messages.id_convers = conversation.id_convers
JOIN userConvers ON userConvers.id_convers = conversation.id_convers
JOIN users ON users.id_user = userConvers.id_user
WHERE (userConvers.id_user = id and conversation.id_assoc = idAssoc) and messages.date_message in (SELECT max(date_message) FROM messages GROUP BY id_convers);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `messageRecupAllConversationsAssoc` (IN `id` INT)  NO SQL
BEGIN
SELECT users.pseudo_user, conversation.id_convers, messages.date_message, messages.contenu_message 
FROM conversation
JOIN messages ON messages.id_convers = conversation.id_convers
JOIN userConvers ON userConvers.id_convers = conversation.id_convers
JOIN users ON users.id_user = userConvers.id_user
WHERE conversation.id_assoc = id and messages.date_message in (SELECT max(date_message) FROM messages GROUP BY id_convers);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `messageRecupAllConversationsUser` (IN `id` INT)  BEGIN
SELECT users.pseudo_user, conversation.id_convers, messages.date_message, messages.contenu_message 
FROM conversation
JOIN messages ON messages.id_convers = conversation.id_convers
JOIN userConvers ON userConvers.id_convers = conversation.id_convers
JOIN users ON users.id_user = userConvers.id_user
WHERE userConvers.id_user = id and messages.date_message in (SELECT max(date_message) FROM messages GROUP BY id_convers);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `messageRecupAllMessage` (IN `id` INT)  BEGIN
SELECT messages.contenu_message, messages.id_envoyeur, messages.date_message, users.pseudo_user FROM messages
JOIN users on users.id_user = messages.id_envoyeur
WHERE messages.id_convers = id
ORDER BY messages.id_message ASC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `messageTakeLastConvCree` ()  BEGIN
SELECT * FROM conversation ORDER BY id_convers DESC LIMIT 1;
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

CREATE DEFINER=`root`@`localhost` PROCEDURE `modifOffre` (IN `id` INT, IN `titre` VARCHAR(255), IN `descr` TEXT, IN `ville` VARCHAR(255))  BEGIN
UPDATE offresDons
SET titre_offre = titre, desc_offre = descr, ville_offre = ville
WHERE id_offre = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `modifSelectAnimal` (IN `id` INT, IN `typeAnimal` VARCHAR(255))  BEGIN
UPDATE adoption
SET type_animal = typeAnimal
WHERE id_animal = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `modifSelectAssoc` (IN `id` INT, IN `typeAnimal` VARCHAR(255))  BEGIN
UPDATE associations
SET typeAnimal_assoc = typeAnimal
WHERE id_assoc = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `modifSelectDemande` (IN `id` INT, IN `typeAnimal` VARCHAR(255), IN `typeObjet` VARCHAR(255))  BEGIN
UPDATE demandesDons
SET typeAnimal_demande = typeAnimal, typeObjet_demande = typeObjet
WHERE id_demande = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `modifSelectOffre` (IN `id` INT, IN `etat` VARCHAR(255), IN `typeAnimal` VARCHAR(255), IN `typeObjet` VARCHAR(255))  BEGIN
UPDATE offresDons
SET etat_offre = etat, typeAnimal_offre = typeAnimal, typeObjet_offre = typeObjet
WHERE id_offre = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `recupAllAnimaux` (IN `nbAnimaux` INT, IN `nbPage` INT)  BEGIN
SELECT * FROM adoption
JOIN associations
ON associations.id_assoc = adoption.id_assoc
LIMIT nbPage,nbAnimaux;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `recupAllAnimauxTypeAnimal` (IN `nbAnimaux` INT, IN `nbPage` INT, IN `type` VARCHAR(255))  BEGIN
SELECT * FROM adoption
JOIN associations
ON associations.id_assoc = adoption.id_assoc
WHERE adoption.type_animal = type
LIMIT nbPage,nbAnimaux;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `recupAllAssoc` (IN `nbAssoc` INT, IN `nbPage` INT)  BEGIN
SELECT * FROM associations LIMIT nbPage,nbAssoc;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `recupAllAssocTypeAnimal` (IN `nbAssoc` INT, IN `nbPage` INT, IN `typeAnimal` VARCHAR(255))  BEGIN
SELECT * FROM associations 
WHERE typeAnimal_assoc = typeAnimal
LIMIT nbPage,nbAssoc;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `recupAllDemandes` (IN `nbDemande` INT, IN `nbPage` INT)  BEGIN
SELECT * FROM demandesDons LIMIT nbPage,nbDemande;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `recupAllDemandesTypeAnimal` (IN `nbDemande` INT, IN `nbPage` INT, IN `type` VARCHAR(255))  BEGIN
SELECT * FROM demandesDons 
WHERE typeAnimal_demande = type
LIMIT nbPage,nbDemande;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `recupAllDemandesTypeObjet` (IN `nbDemande` INT, IN `nbPage` INT, IN `type` VARCHAR(255))  BEGIN
SELECT * FROM demandesDons 
WHERE typeObjet_demande = type
LIMIT nbPage,nbDemande;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `recupAllMembre` ()  BEGIN
SELECT pseudo_user FROM users;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `recupAllMembreAssoc` (IN `id` INT)  BEGIN
SELECT pseudo_user FROM users
WHERE id_assoc = id;
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

CREATE DEFINER=`root`@`localhost` PROCEDURE `recupAllOffresEtat` (IN `nbOffre` INT, IN `nbPage` INT, IN `etat` VARCHAR(255))  BEGIN
SELECT * FROM offresDons 
WHERE etat_offre = etat 
LIMIT nbPage,nbOffre;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `recupAllOffresTypeAnimal` (IN `nbOffre` INT, IN `nbPage` INT, IN `type` VARCHAR(255))  BEGIN
SELECT * FROM offresDons 
WHERE typeAnimal_offre = type
LIMIT nbPage,nbOffre;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `recupAllOffresTypeObjet` (IN `nbOffre` INT, IN `nbPage` INT, IN `type` VARCHAR(255))  BEGIN
SELECT * FROM offresDons 
WHERE typeObjet_offre = type
LIMIT nbPage,nbOffre;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `recupIdAssoc` (IN `nom` VARCHAR(255))  BEGIN 
SELECT id_assoc from associations
WHERE nom_assoc = nom;
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
SELECT offresDons.titre_offre, offresDons.desc_offre, offresDons.ville_offre, offresDons.etat_offre, offresDons.img, users.pseudo_user, offresDons.typeObjet_offre, offresDons.typeAnimal_offre FROM offresDons
JOIN users ON users.id_user = offresDons.id_user
WHERE id_offre = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `recupOneAssoc` (IN `id` INT)  BEGIN
SELECT * FROM associations
WHERE id_assoc = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `recupOneDemande` (IN `id` INT)  BEGIN
SELECT associations.nom_assoc, demandesDons.titre_demande, demandesDons.desc_demande, demandesDons.ville_demande, demandesDons.img, demandesDons.typeAnimal_demande, demandesDons.typeObjet_demande FROM demandesDons
JOIN associations ON associations.id_assoc = demandesDons.id_assoc
WHERE demandesDons.id_demande = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `supprimerMembreAssoc` (IN `pseudo` VARCHAR(255), IN `id` INT)  BEGIN
UPDATE users SET id_assoc = NULL
WHERE users.pseudo_user = pseudo;
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
  `img_animal` varchar(255) NOT NULL,
  `type_animal` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `img` varchar(255) NOT NULL,
  `typeAnimal_assoc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `conversation`
--

CREATE TABLE `conversation` (
  `id_convers` int(11) NOT NULL,
  `id_assoc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `ville_demande` varchar(255) NOT NULL,
  `typeAnimal_demande` varchar(255) NOT NULL,
  `typeObjet_demande` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id_message` int(11) NOT NULL,
  `id_envoyeur` int(11) NOT NULL,
  `contenu_message` text NOT NULL,
  `date_message` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_convers` int(11) NOT NULL
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
  `img` varchar(255) NOT NULL,
  `typeObjet_offre` varchar(255) NOT NULL,
  `typeAnimal_offre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `userConvers`
--

CREATE TABLE `userConvers` (
  `id_user` int(11) NOT NULL,
  `id_convers` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Indexes for table `conversation`
--
ALTER TABLE `conversation`
  ADD PRIMARY KEY (`id_convers`),
  ADD KEY `id_assoc` (`id_assoc`);

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
  ADD KEY `id_convers` (`id_convers`);

--
-- Indexes for table `offresDons`
--
ALTER TABLE `offresDons`
  ADD PRIMARY KEY (`id_offre`),
  ADD KEY `offresdons_ibfk_1` (`id_user`);

--
-- Indexes for table `userConvers`
--
ALTER TABLE `userConvers`
  ADD PRIMARY KEY (`id_user`,`id_convers`),
  ADD KEY `id_convers` (`id_convers`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `FK_idAssoc` (`id_assoc`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adoption`
--
ALTER TABLE `adoption`
  MODIFY `id_animal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `associations`
--
ALTER TABLE `associations`
  MODIFY `id_assoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000000;

--
-- AUTO_INCREMENT for table `conversation`
--
ALTER TABLE `conversation`
  MODIFY `id_convers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `demandesDons`
--
ALTER TABLE `demandesDons`
  MODIFY `id_demande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id_message` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `offresDons`
--
ALTER TABLE `offresDons`
  MODIFY `id_offre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adoption`
--
ALTER TABLE `adoption`
  ADD CONSTRAINT `adoption_ibfk_1` FOREIGN KEY (`id_assoc`) REFERENCES `associations` (`id_assoc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `conversation`
--
ALTER TABLE `conversation`
  ADD CONSTRAINT `conversation_ibfk_1` FOREIGN KEY (`id_assoc`) REFERENCES `associations` (`id_assoc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `demandesDons`
--
ALTER TABLE `demandesDons`
  ADD CONSTRAINT `demandesdons_ibfk_1` FOREIGN KEY (`id_assoc`) REFERENCES `associations` (`id_assoc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`id_envoyeur`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`id_convers`) REFERENCES `conversation` (`id_convers`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `offresDons`
--
ALTER TABLE `offresDons`
  ADD CONSTRAINT `offresdons_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `userConvers`
--
ALTER TABLE `userConvers`
  ADD CONSTRAINT `userconvers_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `userconvers_ibfk_2` FOREIGN KEY (`id_convers`) REFERENCES `conversation` (`id_convers`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_idAssoc` FOREIGN KEY (`id_assoc`) REFERENCES `associations` (`id_assoc`) ON DELETE SET NULL ON UPDATE SET NULL;
