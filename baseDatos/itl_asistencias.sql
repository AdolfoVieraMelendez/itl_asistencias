/*
Navicat MySQL Data Transfer

Source Server         : ITL Server
Source Server Version : 50051
Source Host           : localhost:3306
Source Database       : itl_asistencias

Target Server Type    : MYSQL
Target Server Version : 50051
File Encoding         : 65001

Date: 2021-01-29 12:22:08
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for administradores
-- ----------------------------
DROP TABLE IF EXISTS `administradores`;
CREATE TABLE `administradores` (
  `id_admin` int(11) NOT NULL auto_increment,
  `nombre_admin` text,
  `contra` text,
  `fecha_registro` date default NULL,
  `hora_registro` time default NULL,
  `activo` int(11) default NULL,
  PRIMARY KEY  (`id_admin`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for asistencias
-- ----------------------------
DROP TABLE IF EXISTS `asistencias`;
CREATE TABLE `asistencias` (
  `id_asistencia` int(11) NOT NULL auto_increment,
  `id_usuario` int(11) default NULL,
  `fecha` date default NULL,
  `hora_entrada` time default NULL,
  `incidencia` text,
  `hora_salida` time default NULL,
  `horas_trabajadas` decimal(10,2) default NULL,
  PRIMARY KEY  (`id_asistencia`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for horarios
-- ----------------------------
DROP TABLE IF EXISTS `horarios`;
CREATE TABLE `horarios` (
  `id_horario` int(11) NOT NULL auto_increment,
  `id_usuario` int(11) default NULL,
  `turno` text,
  `d_entrada` time default NULL,
  `d_salida` time default NULL,
  `l_entrada` time default NULL,
  `l_salida` time default NULL,
  `m_entrada` time default NULL,
  `m_salida` time default NULL,
  `mi_entrada` time default NULL,
  `mi_salida` time default NULL,
  `j_entrada` time default NULL,
  `j_salida` time default NULL,
  `v_entrada` time default NULL,
  `v_salida` time default NULL,
  `s_entrada` time default NULL,
  `s_salida` time default NULL,
  `fecha_registro` date default NULL,
  PRIMARY KEY  (`id_horario`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for incapacidades
-- ----------------------------
DROP TABLE IF EXISTS `incapacidades`;
CREATE TABLE `incapacidades` (
  `id_incapacidad` int(11) NOT NULL auto_increment,
  `id_usuario` int(11) default NULL,
  `nombre_incapacidad` text,
  `fecha_incapacidad` date default NULL,
  PRIMARY KEY  (`id_incapacidad`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for usuarios
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL auto_increment,
  `clave_us` int(11) default NULL,
  `apPaterno` text,
  `apMaterno` text,
  `nom_us` text,
  `dir_us` text,
  `col_us` text,
  `cd_us` text,
  `cp_us` text,
  `nacionalidad_us` text,
  `tel_us` int(11) default NULL,
  `cel_us` bigint(11) default NULL,
  `sexo_us` text,
  `fecNac_us` date default NULL,
  `edad_us` int(11) default NULL,
  `edoCivil_us` text,
  `email_us` text,
  `imagen_us` int(11) default NULL,
  `huella_us` int(11) default NULL,
  `tipo_us` text,
  `rfc_us` text,
  `curp_us` text,
  `tiempo_us` text,
  `titulo_us` text,
  `activo` int(11) default NULL,
  PRIMARY KEY  (`id_usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
