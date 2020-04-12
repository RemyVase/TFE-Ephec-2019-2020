-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 12, 2020 at 05:03 PM
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
WHERE conversation.id_assoc = id
UNION
SELECT id_assoc FROM assocConvers
WHERE assocConvers.id_assoc =id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `messageCheckAssocToAssocConv` (IN `idEnv` INT, IN `IdRec` INT)  BEGIN
SELECT conversation.id_convers FROM conversation
JOIN assocConvers on assocConvers.id_convers = conversation.id_convers
WHERE (assocConvers.id_assoc = idEnv and conversation.id_assoc = idRec) or (assocConvers.id_assoc = idRec and conversation.id_assoc = idEnv);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `messageCheckEnvoyeurLastMessage` (IN `idConv` INT)  BEGIN
SELECT messages.id_envoyeur FROM messages
WHERE messages.id_convers = idConv
ORDER BY messages.id_message DESC
LIMIT 1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `messageCheckSiEnvoyeurDansAssoc` (IN `idUser` INT)  BEGIN
SELECT users.id_assoc FROM users
WHERE users.id_user = idUser;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `messageCheckSiFraude` (IN `idConv` INT, IN `idUser` INT)  BEGIN
SELECT userConvers.id_convers FROM userConvers
WHERE userConvers.id_user = idUser and userConvers.id_convers = idConv;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `messageCheckSiFraudeAssoc` (IN `idConv` INT, IN `idAssoc` INT)  BEGIN
SELECT assocConvers.id_convers FROM assocConvers
WHERE assocConvers.id_convers = idConv
AND assocConvers.id_assoc = idAssoc;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `messageCheckSiFraudeAssocConvers` (IN `idConv` INT, IN `idAssoc` INT)  BEGIN
SELECT conversation.id_convers FROM conversation
WHERE conversation.id_convers = idConv
AND conversation.id_assoc = idAssoc;
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

CREATE DEFINER=`root`@`localhost` PROCEDURE `messageLierConversationToAssoc` (IN `idEnv` INT, IN `idConv` INT)  NO SQL
BEGIN
INSERT INTO assocConvers(id_assoc, id_convers) values(idEnv,idConv);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `messageLu` (IN `idConv` INT)  BEGIN
UPDATE messages 
SET messages.lu_destinataire = 1
WHERE messages.id_convers = idConv;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `messageRecupAllConversAssocUser` (IN `idAssoc` INT, IN `idUser` INT)  BEGIN
SELECT * FROM(
SELECT users.pseudo_user, conversation.id_convers, messages.date_message, messages.contenu_message,messages.lu_destinataire 
FROM conversation
JOIN messages ON messages.id_convers = conversation.id_convers
JOIN userConvers ON userConvers.id_convers = conversation.id_convers
JOIN users ON users.id_user = userConvers.id_user
WHERE userConvers.id_user = idUser and messages.date_message in (SELECT max(date_message) FROM messages GROUP BY id_convers)
UNION
SELECT users.pseudo_user, conversation.id_convers, messages.date_message, messages.contenu_message,messages.lu_destinataire  
FROM conversation
JOIN messages ON messages.id_convers = conversation.id_convers
JOIN userConvers ON userConvers.id_convers = conversation.id_convers
JOIN users ON users.id_user = userConvers.id_user
WHERE conversation.id_assoc = idAssoc and messages.date_message in (SELECT max(date_message) FROM messages GROUP BY id_convers)
UNION
SELECT users.pseudo_user, conversation.id_convers, messages.date_message, messages.contenu_message,messages.lu_destinataire  
FROM conversation
JOIN messages ON messages.id_convers = conversation.id_convers
JOIN assocConvers ON assocConvers.id_convers = conversation.id_convers
JOIN users ON users.id_user = messages.id_envoyeur
WHERE assocConvers.id_assoc = idAssoc and messages.date_message in (SELECT max(date_message) FROM messages GROUP BY id_convers)) as TMP
ORDER BY TMP.lu_destinataire ASC, TMP.date_message DESC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `messageRecupAllConversationsAssoc` (IN `id` INT)  NO SQL
BEGIN
SELECT * FROM(
SELECT users.pseudo_user, conversation.id_convers, messages.date_message, messages.contenu_message,messages.lu_destinataire 
FROM conversation
JOIN messages ON messages.id_convers = conversation.id_convers
JOIN users ON users.id_user = messages.id_envoyeur
WHERE conversation.id_assoc = id and messages.date_message in (SELECT max(date_message) FROM messages GROUP BY id_convers)
UNION
SELECT users.pseudo_user, conversation.id_convers, messages.date_message, messages.contenu_message,messages.lu_destinataire 
FROM conversation
JOIN messages ON messages.id_convers = conversation.id_convers
JOIN assocConvers ON assocConvers.id_convers = conversation.id_convers
JOIN users ON users.id_user = messages.id_envoyeur
WHERE assocConvers.id_assoc = id and messages.date_message in (SELECT max(date_message) FROM messages GROUP BY id_convers)) as tmp
ORDER BY tmp.lu_destinataire ASC, TMP.date_message DESC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `messageRecupAllConversationsUser` (IN `id` INT)  BEGIN
SELECT users.pseudo_user, conversation.id_convers, messages.date_message, messages.contenu_message, associations.nom_assoc,messages.lu_destinataire 
FROM conversation
JOIN messages ON messages.id_convers = conversation.id_convers
JOIN userConvers ON userConvers.id_convers = conversation.id_convers
JOIN users ON users.id_user = userConvers.id_user
JOIN associations ON associations.id_assoc = conversation.id_assoc
WHERE userConvers.id_user = id and messages.date_message in (SELECT max(date_message) FROM messages GROUP BY id_convers)
ORDER BY messages.lu_destinataire ASC, TMP.date_message DESC;
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
SELECT offresDons.titre_offre, offresDons.desc_offre, offresDons.ville_offre, offresDons.etat_offre, offresDons.img, users.pseudo_user,users.id_user, offresDons.typeObjet_offre, offresDons.typeAnimal_offre FROM offresDons
JOIN users ON users.id_user = offresDons.id_user
WHERE id_offre = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `recupOneAssoc` (IN `id` INT)  BEGIN
SELECT * FROM associations
WHERE id_assoc = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `recupOneDemande` (IN `id` INT)  BEGIN
SELECT associations.nom_assoc, demandesDons.titre_demande, demandesDons.desc_demande, demandesDons.ville_demande, demandesDons.img, demandesDons.typeAnimal_demande, demandesDons.typeObjet_demande, associations.id_assoc FROM demandesDons
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
-- Table structure for table `assocConvers`
--

CREATE TABLE `assocConvers` (
  `id_assocConvers` int(11) NOT NULL,
  `id_convers` int(11) NOT NULL,
  `id_assoc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `assocConvers`
--

INSERT INTO `assocConvers` (`id_assocConvers`, `id_convers`, `id_assoc`) VALUES
(4, 21, 1000001),
(5, 21, 1000000),
(6, 21, 1000000);

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

--
-- Dumping data for table `associations`
--

INSERT INTO `associations` (`id_assoc`, `nom_assoc`, `adresse_assoc`, `email_assoc`, `tel_assoc`, `site_assoc`, `desc_assoc`, `face_assoc`, `insta_assoc`, `nbPlaceQuarant_assoc`, `nbPlaceRegle_assoc`, `img`, `typeAnimal_assoc`) VALUES
(1000000, 'totoAssoc', 'totoAssoc', 'totoAssoc', 'totoAssoc', 'totoAssoc', 'totoAssoc', 'totoAssoc', 'totoAssoc', 5, 7, '../img/img_assoc/chatAdopte7100462.jpeg', 'Chat'),
(1000001, 'testAssoc', 'testAssoc', 'testAssoc', 'testAssoc', 'testAssoc', 'testAssoc', 'testAssoc', 'testAssoc', 4, 4, '../img/img_assoc/chienOubli1624332.jpeg', 'Chien'),
(1000002, 'TitiAssoc', 'TitiAssoc', 'TitiAssoc@TitiAssoc.com', 'TitiAssoc', 'TitiAssoc', 'TitiAssoc', 'TitiAssoc', 'TitiAssoc', 5, 8, '../img/img_assoc/chatOrigami84972743.png', 'Chien'),
(1000003, 'TutuAssoc', 'TutuAssoc', 'TutuAssoc@TutuAssoc.com', 'TutuAssoc', 'TutuAssoc', 'TutuAssoc', 'TutuAssoc', 'TutuAssoc', 2, 1, '../img/img_assoc/chatCouverture54966342.jpeg', 'Chat');

-- --------------------------------------------------------

--
-- Table structure for table `conversation`
--

CREATE TABLE `conversation` (
  `id_convers` int(11) NOT NULL,
  `id_assoc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `conversation`
--

INSERT INTO `conversation` (`id_convers`, `id_assoc`) VALUES
(21, 1000000),
(22, 1000000);

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

--
-- Dumping data for table `demandesDons`
--

INSERT INTO `demandesDons` (`id_demande`, `id_assoc`, `titre_demande`, `desc_demande`, `dateCrea_demande`, `img`, `ville_demande`, `typeAnimal_demande`, `typeObjet_demande`) VALUES
(1, 1000000, 'totoTest3', 'totoTest3', '2020-04-08 18:46:19', '../img/img_demande/chienOubli52145066.jpeg', 'totoTest3', 'Chien', 'Bien-être'),
(2, 1000000, 'totoTest4', 'totoTest4', '2020-04-08 18:46:38', '../img/img_demande/chienDors74930104.jpeg', 'totoTest4', 'Chien', 'Bien-être'),
(3, 1000001, 'testTest', 'testTest', '2020-04-08 18:49:26', '../img/img_demande/chienDors52921221.jpeg', 'testTest', 'Chien', 'Bien-être');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id_message` int(11) NOT NULL,
  `id_envoyeur` int(11) NOT NULL,
  `contenu_message` text NOT NULL,
  `date_message` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_convers` int(11) NOT NULL,
  `lu_destinataire` tinyint(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id_message`, `id_envoyeur`, `contenu_message`, `date_message`, `id_convers`, `lu_destinataire`) VALUES
(57, 5, 'Salut Toto\n', '2020-04-11 16:01:06', 21, 1),
(58, 1, 'Salut mec comment va ?', '2020-04-11 16:01:24', 21, 1),
(59, 5, 'Ca m\'intéresse ! ', '2020-04-11 16:01:42', 21, 1),
(60, 1, 'Ah parfait ca ! ', '2020-04-11 16:01:59', 21, 1),
(61, 1, 'Bonjour Dudu cet article m\'intéresse', '2020-04-11 16:02:29', 21, 1),
(62, 1, 'test', '2020-04-11 16:06:43', 21, 1),
(63, 1, 'test', '2020-04-11 16:08:51', 22, 1),
(64, 8, 'duuuuuuuuuu', '2020-04-11 16:09:15', 22, 1),
(65, 5, 'test', '2020-04-12 16:58:36', 21, 1);

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

--
-- Dumping data for table `offresDons`
--

INSERT INTO `offresDons` (`id_offre`, `id_user`, `titre_offre`, `desc_offre`, `ville_offre`, `etat_offre`, `dateCrea_offre`, `img`, `typeObjet_offre`, `typeAnimal_offre`) VALUES
(1, 1, 'totoTest', 'totoTest', 'totoTest', 'Neuf', '2020-04-08 18:45:31', '../img/img_offre/chatArbre41277041.jpg', 'Jouet', 'Chat'),
(2, 1, 'totoTest2', 'totoTest2', 'totoTest2', 'Neuf', '2020-04-08 18:45:52', '../img/img_offre/chienListe29964887.jpeg', 'Bien-être', 'Chien'),
(3, 8, 'duduTest', 'duduTest', 'duduTest', 'Très usé', '2020-04-08 18:47:05', '../img/img_offre/chienSolo75121455.jpeg', 'Bien-être', 'Chien'),
(4, 7, 'dedeTest', 'dedeTest', 'dedeTest', 'Neuf', '2020-04-08 18:47:35', '../img/img_offre/chiotsEnsemble43238047.jpeg', 'Jouet', 'Chat');

-- --------------------------------------------------------

--
-- Table structure for table `userConvers`
--

CREATE TABLE `userConvers` (
  `id_userconvers` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_convers` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `userConvers`
--

INSERT INTO `userConvers` (`id_userconvers`, `id_user`, `id_convers`) VALUES
(11, 8, 22);

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
(1, 'toto', 'toto@hotmail.com', '31f7a65e315586ac198bd798b6629ce4903d0899476d5741a9f32e2e521b6a66', '2020-04-08 16:42:51', 1000000),
(2, 'tata', 'tata@hotmail.com', 'd1c7c99c6e2e7b311f51dd9d19161a5832625fb21f35131fba6da62513f0c099', '2020-04-08 16:43:01', 1000000),
(3, 'titi', 'titi@hotmail.com', 'cce66316b4c1c59df94a35afb80cecd82d1a8d91b554022557e115f5c275f515', '2020-04-08 16:43:10', 1000002),
(4, 'tutu', 'tutu@hotmail.com', 'eb0295d98f37ae9e95102afae792d540137be2dedf6c4b00570ab1d1f355d033', '2020-04-08 16:43:22', 1000003),
(5, 'test', 'test@hotmail.com', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08', '2020-04-08 16:43:33', 1000001),
(6, 'truc', 'truc@hotmail.com', 'fe6b57e537d2ff888ead8bc8484965b34838088143d9d7f12c82c964104be641', '2020-04-08 16:43:54', NULL),
(7, 'dede', 'dede@hotmail.com', 'bfccfeb7726160d74f8a18407853846aab2ebd57db1dc32409acd6aefc7c4b33', '2020-04-08 16:44:04', NULL),
(8, 'dudu', 'dudu@hotmail.com', '4fc75659c5daf27dbe58301c1eaaf4bfc97a026ed5319e87a36a9e65f44b8cc6', '2020-04-08 16:44:15', NULL);

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
-- Indexes for table `assocConvers`
--
ALTER TABLE `assocConvers`
  ADD PRIMARY KEY (`id_assocConvers`),
  ADD KEY `idConvInd` (`id_convers`),
  ADD KEY `idAssocInd` (`id_assoc`);

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
  ADD PRIMARY KEY (`id_userconvers`),
  ADD KEY `id_convers` (`id_convers`),
  ADD KEY `foreign_user` (`id_user`) USING BTREE;

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
  MODIFY `id_animal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assocConvers`
--
ALTER TABLE `assocConvers`
  MODIFY `id_assocConvers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `associations`
--
ALTER TABLE `associations`
  MODIFY `id_assoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000004;

--
-- AUTO_INCREMENT for table `conversation`
--
ALTER TABLE `conversation`
  MODIFY `id_convers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `demandesDons`
--
ALTER TABLE `demandesDons`
  MODIFY `id_demande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id_message` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `offresDons`
--
ALTER TABLE `offresDons`
  MODIFY `id_offre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `userConvers`
--
ALTER TABLE `userConvers`
  MODIFY `id_userconvers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adoption`
--
ALTER TABLE `adoption`
  ADD CONSTRAINT `adoption_ibfk_1` FOREIGN KEY (`id_assoc`) REFERENCES `associations` (`id_assoc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `assocConvers`
--
ALTER TABLE `assocConvers`
  ADD CONSTRAINT `assocconvers_ibfk_1` FOREIGN KEY (`id_assoc`) REFERENCES `associations` (`id_assoc`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `assocconvers_ibfk_2` FOREIGN KEY (`id_convers`) REFERENCES `conversation` (`id_convers`) ON DELETE CASCADE ON UPDATE CASCADE;

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
