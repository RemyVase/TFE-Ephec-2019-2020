-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 04, 2020 at 09:55 PM
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
CREATE DEFINER=`root`@`localhost` PROCEDURE `ajoutAnimal` (IN `id` INT, IN `nom` VARCHAR(255), IN `age` VARCHAR(255), IN `ville` VARCHAR(255), IN `descr` TEXT, IN `statut` VARCHAR(255))  BEGIN
INSERT INTO adoption(id_assoc, nom_animal, age_animal, ville_animal, desc_animal,statut_animal) VALUES(id,nom,age,ville,descr,statut);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ajoutDemande` (IN `id` INT, IN `titre` VARCHAR(255), IN `descr` TEXT)  BEGIN 
INSERT INTO demandesDons(id_assoc, titre_demande, desc_demande) VALUES(id,titre,descr);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ajoutOffre` (IN `id` INT, IN `titre` VARCHAR(255), IN `descr` TEXT, IN `ville` VARCHAR(255), IN `etat` VARCHAR(255))  BEGIN
INSERT INTO offresDons(id_user, titre_offre, desc_offre, ville_offre, etat_offre) VALUES (id,titre,descr,ville,etat);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ajoutUser` (IN `pseudo` VARCHAR(255), IN `email` VARCHAR(255), IN `password` VARCHAR(255))  BEGIN
INSERT INTO users(pseudo_user, mail_user, mdp_user) values (pseudo, email, password);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `checkMail` (IN `email` VARCHAR(255))  BEGIN
select id_user from users
where email = mail_user; 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `checkPassword` (IN `id` INT)  BEGIN
SELECT mdp_user FROM users
WHERE id_user = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `checkPseudo` (IN `pseudo` VARCHAR(255))  BEGIN
select id_user from users
where pseudo = pseudo_user; 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `connexionUser` (IN `pseudo` VARCHAR(255), IN `passwd` VARCHAR(255))  BEGIN
SELECT id_user, pseudo_user, mail_user, date_user  FROM users 
WHERE passwd = mdp_user AND (pseudo = pseudo_user OR pseudo = mail_user); 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteAnimal` (IN `id` INT)  BEGIN
DELETE FROM adoption
WHERE id_animal = id;
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
WHERE id__animal = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `modifDemande` ()  BEGIN 
UPDATE demandesDons
SET titre_demande = titre, desc_demande = descr
WHERE id_demande = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `modifOffre` (IN `id` INT, IN `titre` VARCHAR(255), IN `descr` TEXT, IN `ville` VARCHAR(255), IN `etat` VARCHAR(255))  BEGIN
UPDATE offresDons
SET titre_offre = titre, desc_offre = descr, ville_offre = ville, etat_offre = etat
WHERE id_offre = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `recupAllAnimaux` ()  BEGIN
SELECT * FROM adoption;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `recupAllDemandes` ()  BEGIN
SELECT * FROM demandesDons;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `recupAllOffres` ()  BEGIN
SELECT * FROM offresDons;
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
  `statut_animal` varchar(255) NOT NULL,
  `date_animal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `associations`
--

CREATE TABLE `associations` (
  `id_assoc` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nom_assoc` varchar(255) NOT NULL,
  `adresse_assoc` varchar(255) NOT NULL,
  `email_assoc` varchar(255) NOT NULL,
  `tel_assoc` varchar(255) NOT NULL,
  `site_assoc` varchar(255) NOT NULL,
  `desc_assoc` text NOT NULL,
  `face_assoc` varchar(255) NOT NULL,
  `insta_assoc` varchar(255) NOT NULL,
  `nbPlaceQuarant_assoc` int(11) NOT NULL,
  `nbPlaceRegle_assoc` int(11) NOT NULL
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
  `dateCrea_demande` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `dateCrea_offre` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `offresDons`
--

INSERT INTO `offresDons` (`id_offre`, `id_user`, `titre_offre`, `desc_offre`, `ville_offre`, `etat_offre`, `dateCrea_offre`) VALUES
(2, 14, 'Arbre', 'super arbre à chat avec deux hamac, trois coquillages et cinq étages', 'Pont-à-Celles', 'Neuf', '2020-03-04 21:02:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `pseudo_user` varchar(255) NOT NULL,
  `mail_user` varchar(255) NOT NULL,
  `mdp_user` varchar(255) NOT NULL,
  `date_user` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `pseudo_user`, `mail_user`, `mdp_user`, `date_user`) VALUES
(14, 'toto', 'toto@hotmail.com', '31f7a65e315586ac198bd798b6629ce4903d0899476d5741a9f32e2e521b6a66', '2020-02-29 14:32:58'),
(15, 'remy', 'remy.vase3@hotmail.fr', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08', '2020-02-29 17:23:29');

-- --------------------------------------------------------

--
-- Table structure for table `users_associations`
--

CREATE TABLE `users_associations` (
  `id_user` int(11) NOT NULL,
  `id_assoc` int(11) NOT NULL
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
  ADD PRIMARY KEY (`id_assoc`),
  ADD KEY `id_user` (`id_user`);

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
-- Indexes for table `users_associations`
--
ALTER TABLE `users_associations`
  ADD PRIMARY KEY (`id_user`,`id_assoc`),
  ADD KEY `id_assoc` (`id_assoc`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adoption`
--
ALTER TABLE `adoption`
  MODIFY `id_animal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `associations`
--
ALTER TABLE `associations`
  MODIFY `id_assoc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `demandesDons`
--
ALTER TABLE `demandesDons`
  MODIFY `id_demande` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id_message` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `offresDons`
--
ALTER TABLE `offresDons`
  MODIFY `id_offre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adoption`
--
ALTER TABLE `adoption`
  ADD CONSTRAINT `adoption_ibfk_1` FOREIGN KEY (`id_assoc`) REFERENCES `associations` (`id_assoc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `associations`
--
ALTER TABLE `associations`
  ADD CONSTRAINT `associations_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

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

--
-- Constraints for table `users_associations`
--
ALTER TABLE `users_associations`
  ADD CONSTRAINT `users_associations_ibfk_1` FOREIGN KEY (`id_assoc`) REFERENCES `associations` (`id_assoc`),
  ADD CONSTRAINT `users_associations_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);
