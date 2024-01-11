-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           8.0.30 - MySQL Community Server - GPL
-- SE du serveur:                Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour projetsite
CREATE DATABASE IF NOT EXISTS `projetsite` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `projetsite`;

-- Listage de la structure de table projetsite. abonnement
CREATE TABLE IF NOT EXISTS `abonnement` (
  `idSub` int NOT NULL AUTO_INCREMENT,
  `nomSub` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'Abonnement non-defini',
  `prixSub` float DEFAULT '999.99',
  `dureeSub` int DEFAULT NULL,
  `descSub` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`idSub`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table projetsite.abonnement : ~0 rows (environ)

-- Listage de la structure de table projetsite. cour
CREATE TABLE IF NOT EXISTS `cour` (
  `idCour` int NOT NULL AUTO_INCREMENT,
  `nomCour` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'Cour non-defini',
  `dureeCour` time DEFAULT NULL,
  `profCour` int DEFAULT NULL,
  PRIMARY KEY (`idCour`),
  KEY `FK__prof` (`profCour`),
  CONSTRAINT `FK__prof` FOREIGN KEY (`profCour`) REFERENCES `prof` (`idProf`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table projetsite.cour : ~0 rows (environ)

-- Listage de la structure de table projetsite. estinscrit
CREATE TABLE IF NOT EXISTS `estinscrit` (
  `User` int NOT NULL AUTO_INCREMENT,
  `Cour` int NOT NULL,
  `DateHeure` timestamp NOT NULL,
  PRIMARY KEY (`User`,`Cour`,`DateHeure`),
  KEY `FK_estinscrit_planning` (`Cour`,`DateHeure`),
  CONSTRAINT `FK_estinscrit_planning` FOREIGN KEY (`Cour`, `DateHeure`) REFERENCES `planning` (`Cour`, `DateHeure`),
  CONSTRAINT `FK_estinscrit_users` FOREIGN KEY (`User`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table projetsite.estinscrit : ~0 rows (environ)

-- Listage de la structure de table projetsite. planning
CREATE TABLE IF NOT EXISTS `planning` (
  `Cour` int NOT NULL,
  `DateHeure` timestamp NOT NULL,
  `nbPlaces` int DEFAULT NULL,
  `nbPlacesLibre` int DEFAULT NULL,
  PRIMARY KEY (`Cour`,`DateHeure`),
  CONSTRAINT `FK_planning_cour` FOREIGN KEY (`Cour`) REFERENCES `cour` (`idCour`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table projetsite.planning : ~0 rows (environ)

-- Listage de la structure de table projetsite. prof
CREATE TABLE IF NOT EXISTS `prof` (
  `idProf` int NOT NULL AUTO_INCREMENT,
  `nomProf` varchar(80) DEFAULT NULL,
  `prenomProf` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idProf`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table projetsite.prof : ~0 rows (environ)

-- Listage de la structure de table projetsite. typoabon
CREATE TABLE IF NOT EXISTS `typoabon` (
  `abonnement` int NOT NULL,
  `typo` int NOT NULL,
  PRIMARY KEY (`abonnement`,`typo`),
  KEY `FK_typoabon_typologie` (`typo`),
  CONSTRAINT `FK_typoabon_abonnement` FOREIGN KEY (`abonnement`) REFERENCES `abonnement` (`idSub`),
  CONSTRAINT `FK_typoabon_typologie` FOREIGN KEY (`typo`) REFERENCES `typologie` (`idTypo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table projetsite.typoabon : ~0 rows (environ)

-- Listage de la structure de table projetsite. typologie
CREATE TABLE IF NOT EXISTS `typologie` (
  `idTypo` int NOT NULL AUTO_INCREMENT,
  `nomTypo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idTypo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table projetsite.typologie : ~0 rows (environ)

-- Listage de la structure de table projetsite. users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `login` varchar(20) DEFAULT NULL,
  `mail` varchar(50) DEFAULT NULL,
  `pwd` varchar(40) DEFAULT NULL,
  `typeAbonnement` int DEFAULT NULL,
  `finAbonnement` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_users_abonnement` (`typeAbonnement`),
  CONSTRAINT `FK_users_abonnement` FOREIGN KEY (`typeAbonnement`) REFERENCES `abonnement` (`idSub`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table projetsite.users : ~0 rows (environ)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
