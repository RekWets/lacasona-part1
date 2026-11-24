/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 100417
Source Host           : localhost:3306
Source Database       : lacasona

Target Server Type    : MYSQL
Target Server Version : 100417
File Encoding         : 65001

Date: 2022-11-01 09:57:09
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for historial
-- ----------------------------
DROP TABLE IF EXISTS `historial`;
CREATE TABLE `historial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_trabajador` int(11) DEFAULT NULL,
  `fecha` varchar(255) DEFAULT NULL,
  `hora_entrada` varchar(255) DEFAULT NULL,
  `hora_salida` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of historial
-- ----------------------------
INSERT INTO `historial` VALUES ('8', '3', '2022-11-01', '04:31:12', null);

-- ----------------------------
-- Table structure for trabajadores
-- ----------------------------
DROP TABLE IF EXISTS `trabajadores`;
CREATE TABLE `trabajadores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cedula` varchar(255) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `apellido` varchar(255) DEFAULT '',
  `direccion` text DEFAULT NULL,
  `fecha_nacimiento` varchar(255) DEFAULT NULL,
  `edad` varchar(3) DEFAULT NULL,
  `area` varchar(255) DEFAULT NULL,
  `estado` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of trabajadores
-- ----------------------------
INSERT INTO `trabajadores` VALUES ('2', '5123684', 'Jose ', 'Dominguez', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', '2022-12-31', '12', 'RRHH', 'Activo', null, null);
INSERT INTO `trabajadores` VALUES ('3', '9513624', 'Alberto', 'Mañizalez', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', '2022-12-31', '12', 'RRHH', 'Activo', null, null);

-- ----------------------------
-- Table structure for usuarios
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT '',
  `usuario` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `rol` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of usuarios
-- ----------------------------
INSERT INTO `usuarios` VALUES ('1', 'Administrador', 'admin@mail.com', '1234', 'Administrador');
INSERT INTO `usuarios` VALUES ('2', 'Usuario', 'user@mail.com', '1234', 'Usuario');
SET FOREIGN_KEY_CHECKS=1;
