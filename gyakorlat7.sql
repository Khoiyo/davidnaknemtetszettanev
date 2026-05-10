CREATE DATABASE IF NOT EXISTS `gyakorlat7` CHARACTER SET utf8mb4 COLLATE utf8mb4_hungarian_ci;
USE `gyakorlat7`;
CREATE TABLE IF NOT EXISTS `felhasznalok` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `csaladi_nev` varchar(45) NOT NULL DEFAULT '',
  `uto_nev` varchar(45) NOT NULL DEFAULT '',
  `bejelentkezes` varchar(12) NOT NULL DEFAULT '',
  `jelszo` varchar(40) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`), UNIQUE KEY `uq_bejelentkezes` (`bejelentkezes`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;
INSERT INTO `felhasznalok` (`id`,`csaladi_nev`,`uto_nev`,`bejelentkezes`,`jelszo`) VALUES
(1,'Családi_1','Utónév_1','Login1',SHA1('login1')),(2,'Családi_2','Utónév_2','Login2',SHA1('login2')),(3,'Családi_3','Utónév_3','Login3',SHA1('login3')),(4,'Családi_4','Utónév_4','Login4',SHA1('login4')),(5,'Családi_5','Utónév_5','Login5',SHA1('login5')),(6,'Családi_6','Utónév_6','Login6',SHA1('login6')),(7,'Családi_7','Utónév_7','Login7',SHA1('login7')),(8,'Családi_8','Utónév_8','Login8',SHA1('login8')),(9,'Családi_9','Utónév_9','Login9',SHA1('login9')),(10,'Családi_10','Utónév_10','Login10',SHA1('login10')),(11,'Családi_11','Utónév_11','Login11',SHA1('login11')),(12,'Családi_12','Utónév_12','Login12',SHA1('login12'))
ON DUPLICATE KEY UPDATE csaladi_nev=VALUES(csaladi_nev), uto_nev=VALUES(uto_nev), jelszo=VALUES(jelszo);
CREATE TABLE IF NOT EXISTS `kepek` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `fajlnev` varchar(255) NOT NULL,
  `eredeti_nev` varchar(255) NOT NULL,
  `feltolto_id` int unsigned NULL,
  `letrehozva` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`), KEY `feltolto_id` (`feltolto_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;
CREATE TABLE IF NOT EXISTS `uzenetek` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `nev` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `uzenet` text NOT NULL,
  `kuldo_nev` varchar(100) NOT NULL DEFAULT 'Vendég',
  `kuldes_ideje` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;
