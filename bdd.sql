-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
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


-- Dumping database structure for projetsite
CREATE DATABASE IF NOT EXISTS `projetsite` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `projetsite`;

-- Dumping structure for table projetsite.abonnement
CREATE TABLE IF NOT EXISTS `abonnement` (
  `idSub` int NOT NULL AUTO_INCREMENT,
  `nomSub` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'Abonnement non-defini',
  `prixSub` float DEFAULT '999.99',
  `dureeSub` int DEFAULT NULL,
  `descSub` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`idSub`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table projetsite.abonnement: ~5 rows (approximately)
DELETE FROM `abonnement`;
INSERT INTO `abonnement` (`idSub`, `nomSub`, `prixSub`, `dureeSub`, `descSub`) VALUES
	(1, 'Abonnement Acces Salle', 15, 31, 'Accés à la salle de sport et aux équipements sportifs'),
	(2, 'Abonnement Salle + Cours', 35, 31, 'Accés à la salle de sport, aux équipements sportifs et au cours de sport'),
	(3, 'Abonnement Acces Piscine', 12, 31, 'Accès libre à la piscine sauf pendant les cours de sports aquatiques'),
	(4, 'Abonnement Piscine + Cours', 28, 31, 'Accès libre à la piscine et aux cours de sports aquatiques'),
	(5, 'Abonnement Tout Compris', 45, 31, 'Accès libre a tout les services de la salle de sport');

-- Dumping structure for table projetsite.cour
CREATE TABLE IF NOT EXISTS `cour` (
  `idCour` int NOT NULL AUTO_INCREMENT,
  `nomCour` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'Cour non-defini',
  `dureeCour` time DEFAULT NULL,
  `profCour` int DEFAULT NULL,
  `abonCour` int DEFAULT NULL,
  PRIMARY KEY (`idCour`),
  KEY `FK__prof` (`profCour`),
  KEY `FK_cour_typologie` (`abonCour`),
  CONSTRAINT `FK__prof` FOREIGN KEY (`profCour`) REFERENCES `prof` (`idProf`),
  CONSTRAINT `FK_cour_typologie` FOREIGN KEY (`abonCour`) REFERENCES `typologie` (`idTypo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table projetsite.cour: ~2 rows (approximately)
DELETE FROM `cour`;
INSERT INTO `cour` (`idCour`, `nomCour`, `dureeCour`, `profCour`, `abonCour`) VALUES
	(1, 'Pilates', '00:30:00', 1, 2),
	(2, 'Aerobics', '01:00:00', 2, 2);

-- Dumping structure for table projetsite.estinscrit
CREATE TABLE IF NOT EXISTS `estinscrit` (
  `User` int NOT NULL AUTO_INCREMENT,
  `Cour` int NOT NULL DEFAULT '0',
  `DateHeure` timestamp NOT NULL,
  PRIMARY KEY (`User`,`Cour`,`DateHeure`),
  KEY `FK_estinscrit_planning` (`Cour`,`DateHeure`),
  CONSTRAINT `FK_estinscrit_planning` FOREIGN KEY (`Cour`, `DateHeure`) REFERENCES `planning` (`Cour`, `DateHeure`),
  CONSTRAINT `FK_estinscrit_users` FOREIGN KEY (`User`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table projetsite.estinscrit: ~0 rows (approximately)
DELETE FROM `estinscrit`;
INSERT INTO `estinscrit` (`User`, `Cour`, `DateHeure`) VALUES
	(1, 2, '2024-05-22 17:00:00');

-- Dumping structure for event projetsite.expireAbo
DELIMITER //
CREATE EVENT `expireAbo` ON SCHEDULE EVERY 1 DAY STARTS '2024-02-08 00:00:01' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
	UPDATE users SET typeAbonnement = NULL WHERE finAbonnement < CURRENT_DATE();
	UPDATE users SET finAbonnement = NULL WHERE finAbonnement < CURRENT_DATE();
END//
DELIMITER ;

-- Dumping structure for event projetsite.expireCour
DELIMITER //
CREATE EVENT `expireCour` ON SCHEDULE EVERY 1 DAY STARTS '2024-04-27 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
	DELETE FROM planning WHERE DateHeure < CURRENT_DATE();
END//
DELIMITER ;

-- Dumping structure for table projetsite.planning
CREATE TABLE IF NOT EXISTS `planning` (
  `Cour` int NOT NULL,
  `DateHeure` timestamp NOT NULL,
  `nbPlaces` int DEFAULT NULL,
  `nbPlacesLibre` int DEFAULT NULL,
  PRIMARY KEY (`Cour`,`DateHeure`),
  CONSTRAINT `FK_planning_cour` FOREIGN KEY (`Cour`) REFERENCES `cour` (`idCour`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table projetsite.planning: ~1 rows (approximately)
DELETE FROM `planning`;
INSERT INTO `planning` (`Cour`, `DateHeure`, `nbPlaces`, `nbPlacesLibre`) VALUES
	(2, '2024-05-22 17:00:00', 30, 30);

-- Dumping structure for table projetsite.prof
CREATE TABLE IF NOT EXISTS `prof` (
  `idProf` int NOT NULL AUTO_INCREMENT,
  `login` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `mail` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `pwd` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nomProf` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `prenomProf` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`idProf`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table projetsite.prof: ~1 rows (approximately)
DELETE FROM `prof`;
INSERT INTO `prof` (`idProf`, `login`, `mail`, `pwd`, `nomProf`, `prenomProf`) VALUES
	(1, 'jsmith', 'johnsmith@fakemail.fr', 'jsmith', 'Smith', 'John'),
	(2, 'admin', 'adamin@fakemail.fr', 'admin', 'Min', 'Ada');

-- Dumping structure for table projetsite.typoabon
CREATE TABLE IF NOT EXISTS `typoabon` (
  `abonnement` int NOT NULL,
  `typo` int NOT NULL,
  PRIMARY KEY (`abonnement`,`typo`),
  KEY `FK_typoabon_typologie` (`typo`),
  CONSTRAINT `FK_typoabon_abonnement` FOREIGN KEY (`abonnement`) REFERENCES `abonnement` (`idSub`),
  CONSTRAINT `FK_typoabon_typologie` FOREIGN KEY (`typo`) REFERENCES `typologie` (`idTypo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table projetsite.typoabon: ~10 rows (approximately)
DELETE FROM `typoabon`;
INSERT INTO `typoabon` (`abonnement`, `typo`) VALUES
	(1, 1),
	(2, 1),
	(5, 1),
	(2, 2),
	(5, 2),
	(3, 3),
	(4, 3),
	(5, 3),
	(4, 4),
	(5, 4);

-- Dumping structure for table projetsite.typologie
CREATE TABLE IF NOT EXISTS `typologie` (
  `idTypo` int NOT NULL AUTO_INCREMENT,
  `nomTypo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idTypo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table projetsite.typologie: ~4 rows (approximately)
DELETE FROM `typologie`;
INSERT INTO `typologie` (`idTypo`, `nomTypo`) VALUES
	(1, 'AccesSalle'),
	(2, 'AccesCoursSalle'),
	(3, 'AccesPiscine'),
	(4, 'AccesCoursPiscine');

-- Dumping structure for table projetsite.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `login` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `mail` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `pwd` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `typeAbonnement` int DEFAULT NULL,
  `finAbonnement` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_login` (`login`),
  KEY `FK_users_abonnement` (`typeAbonnement`),
  CONSTRAINT `FK_users_abonnement` FOREIGN KEY (`typeAbonnement`) REFERENCES `abonnement` (`idSub`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table projetsite.users: ~1 rows (approximately)
DELETE FROM `users`;
INSERT INTO `users` (`id`, `login`, `mail`, `pwd`, `typeAbonnement`, `finAbonnement`) VALUES
	(1, 'admin', 'admin@fake.fr', 'admin', 2, '2024-06-20 22:00:00');

-- Dumping structure for trigger projetsite.updateaboUser
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `updateaboUser` BEFORE UPDATE ON `users` FOR EACH ROW BEGIN
    IF NEW.typeAbonnement IS NOT NULL THEN
        SET @delai = (SELECT dureeSub FROM ABONNEMENT WHERE IdSub = NEW.typeAbonnement);
        SET NEW.finAbonnement = CURRENT_DATE() + INTERVAL @delai DAY;
   ELSE
   	SET NEW.finAbonnement = NULL;
   END IF;
    
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
