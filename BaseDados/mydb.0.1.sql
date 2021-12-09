/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50721
Source Host           : localhost:3306
Source Database       : mydb

Target Server Type    : MYSQL
Target Server Version : 50721
File Encoding         : 65001

Date: 2021-11-25 19:59:08
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `anime`
-- ----------------------------
DROP TABLE IF EXISTS `anime`;
CREATE TABLE `anime` (
  `animeId` int(11) NOT NULL AUTO_INCREMENT,
  `animeName` varchar(45) NOT NULL,
  `animeImagemURL` varchar(255) NOT NULL,
  `animeJapaneseName` varchar(45) DEFAULT NULL,
  `animeSinopse` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`animeId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of anime
-- ----------------------------
INSERT INTO anime VALUES ('1', 'Mirai Nikki', 'imagens/mirai.jpg', null, null);
INSERT INTO anime VALUES ('2', 'Code Geass', 'imagens/codegeass.jpg', null, null);
INSERT INTO anime VALUES ('3', 'Re:Zero kara Hajimeru Isekai Seikatsu', 'imagens/rezero.jpg', null, null);

-- ----------------------------
-- Table structure for `animecategorias`
-- ----------------------------
DROP TABLE IF EXISTS `animecategorias`;
CREATE TABLE `animecategorias` (
  `animeCategoriaId` int(11) NOT NULL,
  `categoriaAnimeId` int(11) NOT NULL,
  PRIMARY KEY (`animeCategoriaId`,`categoriaAnimeId`),
  KEY `fk_Categorias_has_Anime_Anime1_idx` (`categoriaAnimeId`),
  KEY `fk_Categorias_has_Anime_Categorias_idx` (`animeCategoriaId`),
  CONSTRAINT `fk_Categorias_has_Anime_Anime1` FOREIGN KEY (`categoriaAnimeId`) REFERENCES `anime` (`animeId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Categorias_has_Anime_Categorias` FOREIGN KEY (`animeCategoriaId`) REFERENCES `categorias` (`categoriaId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of animecategorias
-- ----------------------------
INSERT INTO animecategorias VALUES ('1', '1');
INSERT INTO animecategorias VALUES ('2', '1');
INSERT INTO animecategorias VALUES ('3', '1');
INSERT INTO animecategorias VALUES ('4', '1');
INSERT INTO animecategorias VALUES ('1', '2');
INSERT INTO animecategorias VALUES ('8', '2');
INSERT INTO animecategorias VALUES ('16', '2');
INSERT INTO animecategorias VALUES ('17', '2');
INSERT INTO animecategorias VALUES ('4', '3');
INSERT INTO animecategorias VALUES ('17', '3');
INSERT INTO animecategorias VALUES ('18', '3');

-- ----------------------------
-- Table structure for `categorias`
-- ----------------------------
DROP TABLE IF EXISTS `categorias`;
CREATE TABLE `categorias` (
  `categoriaId` int(11) NOT NULL AUTO_INCREMENT,
  `categoriaName` varchar(45) NOT NULL,
  PRIMARY KEY (`categoriaId`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of categorias
-- ----------------------------
INSERT INTO categorias VALUES ('1', 'Action');
INSERT INTO categorias VALUES ('2', 'Mystery');
INSERT INTO categorias VALUES ('3', 'Supernatural');
INSERT INTO categorias VALUES ('4', 'Suspense');
INSERT INTO categorias VALUES ('5', 'Iyashikei');
INSERT INTO categorias VALUES ('6', 'Kodomomuke');
INSERT INTO categorias VALUES ('7', 'Slice of Life');
INSERT INTO categorias VALUES ('8', 'Mecha');
INSERT INTO categorias VALUES ('9', 'Isekai');
INSERT INTO categorias VALUES ('10', 'Harem');
INSERT INTO categorias VALUES ('11', 'Ecchi');
INSERT INTO categorias VALUES ('12', 'Josei');
INSERT INTO categorias VALUES ('13', 'Seinen');
INSERT INTO categorias VALUES ('15', 'Shonen');
INSERT INTO categorias VALUES ('16', 'Sci-Fi');
INSERT INTO categorias VALUES ('17', 'Drama');
INSERT INTO categorias VALUES ('18', 'Fantasy');
INSERT INTO categorias VALUES ('20', 'Shoujo');

-- ----------------------------
-- Table structure for `episodios`
-- ----------------------------
DROP TABLE IF EXISTS `episodios`;
CREATE TABLE `episodios` (
  `episodioId` int(11) NOT NULL AUTO_INCREMENT,
  `episodioName` varchar(45) NOT NULL,
  `episodioURL` varchar(255) NOT NULL,
  `episodioAnimeId` int(11) NOT NULL,
  PRIMARY KEY (`episodioId`),
  KEY `fk_episodios_Anime1_idx` (`episodioAnimeId`),
  CONSTRAINT `fk_episodios_Anime1` FOREIGN KEY (`episodioAnimeId`) REFERENCES `anime` (`animeId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of episodios
-- ----------------------------
INSERT INTO episodios VALUES ('1', 'Amigos', 'LINK', '1');
INSERT INTO episodios VALUES ('2', 'Friends', 'Link2', '1');
INSERT INTO episodios VALUES ('3', 'ASDADAD', 'sadasdasd', '2');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(45) NOT NULL,
  `userEmail` varchar(255) NOT NULL,
  `userImageURL` varchar(255) NOT NULL,
  `userPass` varchar(45) NOT NULL,
  `userEstate` enum('Enable','Disable') NOT NULL DEFAULT 'Enable',
  `usersAdmin` enum('Admin','User') NOT NULL DEFAULT 'User',
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO users VALUES ('1', 'Master Perv3rt', 'orlando@gmail.com', 'imagens/lelouch.jpg', '202cb962ac59075b964b07152d234b70', 'Enable', 'User');