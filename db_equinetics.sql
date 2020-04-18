/*
SQLyog Community v8.71 
MySQL - 5.5.5-10.4.10-MariaDB : Database - db_controleventoscoronavirus
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `formulario` */

DROP TABLE IF EXISTS `formulario`;

CREATE TABLE `formulario` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id registro',
  `cod_eve` varchar(4) DEFAULT NULL COMMENT 'Codigo de evento',
  `nom_eve` varchar(300) DEFAULT NULL COMMENT 'Nombre del evento',
  `fec_not` date DEFAULT NULL COMMENT 'Fecha de notificación del evento',
  `semana` tinyint(4) DEFAULT NULL COMMENT 'Semana',
  `año` tinyint(4) DEFAULT NULL COMMENT 'Año',
  `cod_pre` varchar(4) DEFAULT NULL COMMENT 'Código del prestador',
  `cod_sub` varchar(100) DEFAULT NULL COMMENT 'Código subindice',
  `pri_nom_` varchar(100) DEFAULT NULL COMMENT 'Primer nombre',
  `seg_nom_` varchar(100) DEFAULT NULL COMMENT 'Segundo nombre',
  `pri_ape_` varchar(100) DEFAULT NULL COMMENT 'Primer apellido',
  `seg_ape_` varchar(100) DEFAULT NULL COMMENT 'Seundo apellido',
  `tip_ide_` varchar(2) DEFAULT NULL COMMENT 'Tipo de identificación',
  `num_ide_` varchar(15) DEFAULT NULL COMMENT 'Número de identificación',
  `edad_` tinyint(4) DEFAULT NULL COMMENT 'Edad Paciente',
  `uni_med_` varchar(2) DEFAULT NULL COMMENT 'Unidad de medida de la edad',
  `nacionali_` varchar(100) DEFAULT NULL COMMENT 'Nacionalidad',
  `nombre_nacionalidad` varchar(100) DEFAULT NULL COMMENT 'Nombre de la nacionalidad',
  `sexo_` char(1) DEFAULT NULL COMMENT 'Sexo del paciente',
  `cod_pais_o` tinyint(4) DEFAULT NULL COMMENT 'Códio del país de ocurrencia',
  `cod_dpto_o` tinyint(4) DEFAULT NULL COMMENT 'Código del departamento de ocurrencia',
  `cod_mun_o` tinyint(4) DEFAULT NULL COMMENT 'Códio del municipio de ocurrencia',
  `area_` tinyint(4) DEFAULT NULL COMMENT 'Area de ocurrencia',
  `localidad_` varchar(200) DEFAULT NULL COMMENT 'Localidad de ocurrencia',
  `cen_pobla_` varchar(200) DEFAULT NULL COMMENT 'Cabecera municipal/Centro Poblado/Rural disperso de ocurrencia',
  `vereda_` varchar(200) DEFAULT NULL COMMENT 'Vereda/Zona  de ocurrencia',
  `bar_ver_` varchar(200) DEFAULT NULL COMMENT 'Cabebara municipal/Bartro Verdo/Rural disperso',
  `dir_res_` varchar(200) DEFAULT NULL COMMENT 'Dirección de residencia del paciente',
  `ocupacion_` varchar(4) DEFAULT NULL COMMENT 'Ocupacion del paciente',
  `tip_ss_` varchar(4) DEFAULT NULL COMMENT 'Tipo de régimen en salud',
  `cod_ase_` varchar(4) DEFAULT NULL COMMENT 'Código de aseguradora',
  `per_etn_` varchar(2) DEFAULT NULL COMMENT 'Pertenencía étnica',
  `nom_grupo_` varchar(100) DEFAULT NULL COMMENT 'Nombre del grupo étnico',
  `estrato` tinyint(4) DEFAULT NULL COMMENT 'Estrato del paciente',
  `gp_discapa` tinyint(1) DEFAULT NULL COMMENT 'Discapacitado',
  `gp_desplaz` tinyint(1) DEFAULT NULL COMMENT 'Desplazado',
  `gp_migrant` tinyint(1) DEFAULT NULL COMMENT 'Migrante',
  `gp_carcela` tinyint(1) DEFAULT NULL COMMENT 'Carcelario',
  `gp_gestan` tinyint(1) DEFAULT NULL COMMENT 'Gestante',
  `sem_ges` tinyint(1) DEFAULT NULL COMMENT 'Semanas de gestación',
  `gp_indigen` tinyint(1) DEFAULT NULL COMMENT 'Indigena',
  `gp_pobicbf` tinyint(1) DEFAULT NULL COMMENT 'Población infantil a caro del ICBF',
  `gp_mad_com` tinyint(1) DEFAULT NULL COMMENT 'Madres comunitarias',
  `gp_desmovi` tinyint(1) DEFAULT NULL COMMENT 'Desmovilizados',
  `gp_psiquia` tinyint(1) DEFAULT NULL COMMENT 'Centros Psiquiatricos',
  `gp_vic_vio` tinyint(1) DEFAULT NULL COMMENT 'Victimas de violencia',
  `gp_otros` tinyint(1) DEFAULT NULL COMMENT 'Otros grupos poblacionales',
  `asintomatico` tinyint(1) DEFAULT NULL COMMENT 'Paciente asintomático',
  `tos` tinyint(1) DEFAULT NULL COMMENT 'Paciente con tos',
  `fiebre` tinyint(1) DEFAULT NULL COMMENT 'Paciente con fiebre cuantificada >=38°',
  `odinofagia` tinyint(1) DEFAULT NULL COMMENT 'Paciente con odinofagia',
  `dif_res` tinyint(1) DEFAULT NULL COMMENT 'Paciente con dificultad respiratoria',
  `adinamia` tinyint(1) DEFAULT NULL COMMENT 'Paciente con fatiga/adinamia',
  `fec_nac` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `formulario` */

insert  into `formulario`(`id`,`cod_eve`,`nom_eve`,`fec_not`,`semana`,`año`,`cod_pre`,`cod_sub`,`pri_nom_`,`seg_nom_`,`pri_ape_`,`seg_ape_`,`tip_ide_`,`num_ide_`,`edad_`,`uni_med_`,`nacionali_`,`nombre_nacionalidad`,`sexo_`,`cod_pais_o`,`cod_dpto_o`,`cod_mun_o`,`area_`,`localidad_`,`cen_pobla_`,`vereda_`,`bar_ver_`,`dir_res_`,`ocupacion_`,`tip_ss_`,`cod_ase_`,`per_etn_`,`nom_grupo_`,`estrato`,`gp_discapa`,`gp_desplaz`,`gp_migrant`,`gp_carcela`,`gp_gestan`,`sem_ges`,`gp_indigen`,`gp_pobicbf`,`gp_mad_com`,`gp_desmovi`,`gp_psiquia`,`gp_vic_vio`,`gp_otros`,`asintomatico`,`tos`,`fiebre`,`odinofagia`,`dif_res`,`adinamia`,`fec_nac`) values (1,'1','1','2020-03-12',NULL,NULL,NULL,NULL,'1','1','1','1','0','1',1,NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,0,0,1,0,0,'2020-03-19'),(2,'2','2','2020-03-20',NULL,NULL,NULL,NULL,'2','2','2','2','1','2',2,NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,1,1,1,1,1,'2020-03-06'),(3,'3','3','2020-03-25',NULL,NULL,NULL,NULL,'3','3','3','3','4','3',3,NULL,NULL,NULL,'1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,1,0,0,0,0,'2020-03-26');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
