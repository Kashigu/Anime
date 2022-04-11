/*
Navicat MySQL Data Transfer

Source Server         : papPortugal2021
Source Server Version : 80027
Source Host           : localhost:3306
Source Database       : mydb

Target Server Type    : MYSQL
Target Server Version : 80027
File Encoding         : 65001

Date: 2022-04-11 13:56:59
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `anime`
-- ----------------------------
DROP TABLE IF EXISTS `anime`;
CREATE TABLE `anime` (
  `animeId` int NOT NULL AUTO_INCREMENT,
  `animeName` varchar(45) NOT NULL,
  `animeImagemURL` varchar(255) NOT NULL,
  `animeJapaneseName` varchar(45) DEFAULT NULL,
  `animeSinopse` varchar(255) DEFAULT NULL,
  `animeFirstImageURL` varchar(255) DEFAULT NULL,
  `animeTotalEpisodes` int NOT NULL,
  PRIMARY KEY (`animeId`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb3;

-- ----------------------------
-- Records of anime
-- ----------------------------
INSERT INTO `anime` VALUES ('1', 'The Future Diary', 'imagens/mirai.jpg', 'Mirai Nikki', null, 'imagens/mirainikkiF.jpg', '24');
INSERT INTO `anime` VALUES ('2', 'Code Geass: Lelouch of the Rebellion', 'imagens/codegeass.jpg', 'Code Geass: Hangyaku no Lelouch', null, 'imagens/codegeassF.jpg', '24');
INSERT INTO `anime` VALUES ('3', 'Re:ZERO -Starting Life in Another World-', 'imagens/rezero.jpg', 'Re:Zero kara Hajimeru Isekai Seikatsu', null, 'imagens/rezeroF.jpg', '24');
INSERT INTO `anime` VALUES ('43', 'Evangelion', 'imagens/evange.jpg', 'Evangelion2.0', '<p>tem tetas</p>', 'imagens/scale_1200.png', '24');

-- ----------------------------
-- Table structure for `animecategorias`
-- ----------------------------
DROP TABLE IF EXISTS `animecategorias`;
CREATE TABLE `animecategorias` (
  `animeCategoriaId` int NOT NULL,
  `categoriaAnimeId` int NOT NULL,
  PRIMARY KEY (`animeCategoriaId`,`categoriaAnimeId`),
  KEY `fk_Categorias_has_Anime_Anime1_idx` (`categoriaAnimeId`),
  KEY `fk_Categorias_has_Anime_Categorias_idx` (`animeCategoriaId`),
  CONSTRAINT `fk_Categorias_has_Anime_Anime1` FOREIGN KEY (`categoriaAnimeId`) REFERENCES `anime` (`animeId`),
  CONSTRAINT `fk_Categorias_has_Anime_Categorias` FOREIGN KEY (`animeCategoriaId`) REFERENCES `categorias` (`categoriaId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- ----------------------------
-- Records of animecategorias
-- ----------------------------
INSERT INTO `animecategorias` VALUES ('1', '1');
INSERT INTO `animecategorias` VALUES ('2', '1');
INSERT INTO `animecategorias` VALUES ('3', '1');
INSERT INTO `animecategorias` VALUES ('4', '1');
INSERT INTO `animecategorias` VALUES ('1', '2');
INSERT INTO `animecategorias` VALUES ('8', '2');
INSERT INTO `animecategorias` VALUES ('16', '2');
INSERT INTO `animecategorias` VALUES ('17', '2');
INSERT INTO `animecategorias` VALUES ('4', '3');
INSERT INTO `animecategorias` VALUES ('17', '3');
INSERT INTO `animecategorias` VALUES ('18', '3');
INSERT INTO `animecategorias` VALUES ('1', '43');
INSERT INTO `animecategorias` VALUES ('8', '43');
INSERT INTO `animecategorias` VALUES ('16', '43');
INSERT INTO `animecategorias` VALUES ('17', '43');

-- ----------------------------
-- Table structure for `categorias`
-- ----------------------------
DROP TABLE IF EXISTS `categorias`;
CREATE TABLE `categorias` (
  `categoriaId` int NOT NULL AUTO_INCREMENT,
  `categoriaName` varchar(45) NOT NULL,
  PRIMARY KEY (`categoriaId`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb3;

-- ----------------------------
-- Records of categorias
-- ----------------------------
INSERT INTO `categorias` VALUES ('1', 'Action');
INSERT INTO `categorias` VALUES ('2', 'Mystery');
INSERT INTO `categorias` VALUES ('3', 'Supernatural');
INSERT INTO `categorias` VALUES ('4', 'Suspense');
INSERT INTO `categorias` VALUES ('5', 'Iyashikei');
INSERT INTO `categorias` VALUES ('6', 'Kodomomuke');
INSERT INTO `categorias` VALUES ('7', 'Slice of Life');
INSERT INTO `categorias` VALUES ('8', 'Mecha');
INSERT INTO `categorias` VALUES ('9', 'Isekai');
INSERT INTO `categorias` VALUES ('10', 'Harem');
INSERT INTO `categorias` VALUES ('11', 'Ecchi');
INSERT INTO `categorias` VALUES ('12', 'Josei');
INSERT INTO `categorias` VALUES ('13', 'Seinen');
INSERT INTO `categorias` VALUES ('15', 'Shonen');
INSERT INTO `categorias` VALUES ('16', 'Sci-Fi');
INSERT INTO `categorias` VALUES ('17', 'Drama');
INSERT INTO `categorias` VALUES ('18', 'Fantasy');
INSERT INTO `categorias` VALUES ('20', 'Shoujo');

-- ----------------------------
-- Table structure for `episodios`
-- ----------------------------
DROP TABLE IF EXISTS `episodios`;
CREATE TABLE `episodios` (
  `episodioId` int NOT NULL AUTO_INCREMENT,
  `episodioName` varchar(45) NOT NULL,
  `episodioNameJap` varchar(45) NOT NULL,
  `episodioURL` varchar(255) NOT NULL,
  `episodioAnimeId` int NOT NULL,
  `episodioNr` varchar(45) NOT NULL,
  `episodioTipe` varchar(45) NOT NULL,
  `episodioTotal` int NOT NULL,
  PRIMARY KEY (`episodioId`),
  KEY `fk_episodios_Anime1_idx` (`episodioAnimeId`),
  CONSTRAINT `fk_episodios_Anime1` FOREIGN KEY (`episodioAnimeId`) REFERENCES `anime` (`animeId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

-- ----------------------------
-- Records of episodios
-- ----------------------------
INSERT INTO `episodios` VALUES ('1', 'Amigos', '', 'videos/11-24_EUW1-5624020232_02.webm', '1', '1', 'video/webm', '0');
INSERT INTO `episodios` VALUES ('2', 'Friends', '', 'videos/Lux.exe.mp4', '1', '2', 'video/mp4', '0');
INSERT INTO `episodios` VALUES ('3', 'ASDADAD', '', 'videos/11-24_EUW1-5624020232_02.webm', '2', '1', 'video/webm', '0');

-- ----------------------------
-- Table structure for `redes`
-- ----------------------------
DROP TABLE IF EXISTS `redes`;
CREATE TABLE `redes` (
  `redeId` int NOT NULL AUTO_INCREMENT,
  `redeTipe` enum('watching','completed','onhold','dropped','plan','favorite','like') NOT NULL,
  `redeAnimeId` int NOT NULL,
  `redeUserId` int NOT NULL,
  PRIMARY KEY (`redeId`),
  KEY `fk_redes_Anime1_idx` (`redeAnimeId`),
  KEY `fk_redes_users1_idx` (`redeUserId`),
  CONSTRAINT `fk_redes_Anime1` FOREIGN KEY (`redeAnimeId`) REFERENCES `anime` (`animeId`),
  CONSTRAINT `fk_redes_users1` FOREIGN KEY (`redeUserId`) REFERENCES `users` (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3;

-- ----------------------------
-- Records of redes
-- ----------------------------
INSERT INTO `redes` VALUES ('1', 'watching', '2', '12');
INSERT INTO `redes` VALUES ('2', 'watching', '1', '12');
INSERT INTO `redes` VALUES ('3', 'favorite', '3', '12');
INSERT INTO `redes` VALUES ('6', 'favorite', '1', '13');
INSERT INTO `redes` VALUES ('7', 'watching', '2', '13');
INSERT INTO `redes` VALUES ('10', 'completed', '2', '12');
INSERT INTO `redes` VALUES ('11', 'favorite', '2', '12');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `userId` int NOT NULL AUTO_INCREMENT,
  `userName` varchar(45) NOT NULL,
  `userEmail` varchar(255) NOT NULL,
  `userImageURL` varchar(255) NOT NULL,
  `userPass` varchar(45) NOT NULL,
  `userEstate` enum('Enable','Disable') NOT NULL DEFAULT 'Enable',
  `usersAdmin` enum('Admin','User') NOT NULL DEFAULT 'User',
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb3;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('12', 'Master Perv3rt', 'orlandojslopes@gmail.com', 'imagens/lelouch.jpg', '5a50c52ca6ad103d7c9dc45a879e496f', 'Enable', 'Admin');
INSERT INTO `users` VALUES ('13', 'Chentric', 'chentri@gmail.com', 'imagens/chentric.jpg', '202cb962ac59075b964b07152d234b70', 'Disable', 'User');
INSERT INTO `users` VALUES ('14', 'Master', 'orlando@gmail.com', 'imagens/user.png', '5a50c52ca6ad103d7c9dc45a879e496f', 'Enable', 'User');
INSERT INTO `users` VALUES ('15', 'pilinha', 'orlandoes@gmail.com', 'imagens/user.png', '202cb962ac59075b964b07152d234b70', 'Enable', 'User');
