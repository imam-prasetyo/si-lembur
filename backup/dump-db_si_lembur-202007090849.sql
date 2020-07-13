-- MySQL dump 10.13  Distrib 5.5.62, for Win64 (AMD64)
--
-- Host: localhost    Database: db_si_lembur
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.38-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `t_absensi_approval`
--

DROP TABLE IF EXISTS `t_absensi_approval`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_absensi_approval` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_divisi` int(11) DEFAULT NULL,
  `id_pegawai` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_absensi_approval`
--

LOCK TABLES `t_absensi_approval` WRITE;
/*!40000 ALTER TABLE `t_absensi_approval` DISABLE KEYS */;
INSERT INTO `t_absensi_approval` VALUES (2,2,5);
/*!40000 ALTER TABLE `t_absensi_approval` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_activity_log`
--

DROP TABLE IF EXISTS `t_activity_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_activity_log` (
  `id` varchar(64) NOT NULL,
  `log_user` varchar(50) NOT NULL,
  `log_type` varchar(50) DEFAULT NULL,
  `log_action` text,
  `log_item` varchar(50) DEFAULT NULL,
  `log_assign_to` varchar(50) DEFAULT NULL,
  `log_assign_type` varchar(50) DEFAULT NULL,
  `log_datetime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_activity_log`
--

LOCK TABLES `t_activity_log` WRITE;
/*!40000 ALTER TABLE `t_activity_log` DISABLE KEYS */;
INSERT INTO `t_activity_log` VALUES ('5ee6fb690de10660844204','5ee6fa23d172c578363335','update config','update config : 2 Sistem Informasi Lembur','Update config succcessfully!','5ee6fa23d172c578363335','update config','2020-06-15 11:39:05'),('5ee6fb6d3be00561510245','5ee6fa23d172c578363335','update config','update config : 1 Sistem Informasi Lembur','Update config succcessfully!','5ee6fa23d172c578363335','update config','2020-06-15 11:39:09'),('5ee6fb948536f334588756','5ee6fa23d172c578363335','update config','update config : 5 p455word!','Update config succcessfully!','5ee6fa23d172c578363335','update config','2020-06-15 11:39:48'),('5ee6fc012362e428938032','5ee6fa23d172c578363335','logout','logout','5ee6fa23d172c578363335 logged out!','system','logout : end of session','2020-06-15 11:41:37'),('5ee6febfe0511554465431','5e25291521ebe108868699','login','login','Login succcessfully!','system','login success','2020-06-15 11:53:19'),('5ee70e1b9c9fa831326329','5e25291521ebe108868699','create divisi','create divisi :  ITD','Create divisi succcessfully!','5e25291521ebe108868699','create divisi','2020-06-15 12:58:51'),('5ee70e238ec27774251645','5e25291521ebe108868699','update divisi','update divisi :  ','','5e25291521ebe108868699','update divisi','2020-06-15 12:58:59'),('5ee70e28171d1894894211','5e25291521ebe108868699','update divisi','update divisi :  ','','5e25291521ebe108868699','update divisi','2020-06-15 12:59:04'),('5ee70e41e27bb652176523','5e25291521ebe108868699','update divisi','update divisi : 1 FND','Update user succcessfully!','5e25291521ebe108868699','update divisi','2020-06-15 12:59:29'),('5ee70e480221e802133321','5e25291521ebe108868699','update divisi','update divisi :  ','','5e25291521ebe108868699','update divisi','2020-06-15 12:59:36'),('5ee70e4e255e0727246480','5e25291521ebe108868699','update divisi','update divisi : 2 PGD','Update user succcessfully!','5e25291521ebe108868699','update divisi','2020-06-15 12:59:42'),('5ee70e5469cc6412126829','5e25291521ebe108868699','update divisi','update divisi :  ','','5e25291521ebe108868699','update divisi','2020-06-15 12:59:48'),('5ee70e60584ee638614717','5e25291521ebe108868699','delete divisi','delete divisi : 1','','5e25291521ebe108868699','delete divisi','2020-06-15 13:00:00'),('5ee70e64371a1353556288','5e25291521ebe108868699','delete divisi','delete divisi : 2','','5e25291521ebe108868699','delete divisi','2020-06-15 13:00:04'),('5ee70e6af3ddb811614612','5e25291521ebe108868699','delete divisi','delete divisi : 1','','5e25291521ebe108868699','delete divisi','2020-06-15 13:00:10'),('5ee70e6fa9380745716723','5e25291521ebe108868699','delete divisi','delete divisi : 2','','5e25291521ebe108868699','delete divisi','2020-06-15 13:00:15'),('5ee711c1c1b56116155042','5e25291521ebe108868699','delete divisi','delete divisi : 2','','5e25291521ebe108868699','delete divisi','2020-06-15 13:14:25'),('5ee7124a8477f096049107','5e25291521ebe108868699','delete divisi','delete divisi : 1','','5e25291521ebe108868699','delete divisi','2020-06-15 13:16:42'),('5ee7124d66a1f290808769','5e25291521ebe108868699','delete divisi','delete divisi : 2','Delete divisi succcessfully!','5e25291521ebe108868699','delete divisi','2020-06-15 13:16:45'),('5ee712dbbaead546341077','5e25291521ebe108868699','logout','logout','5e25291521ebe108868699 logged out!','system','logout : end of session','2020-06-15 13:19:07'),('5ee713d33b7c9618216837','5e25291521ebe108868699','login','login','Login succcessfully!','system','login success','2020-06-15 13:23:15'),('5ee71a0b0b6c3185961806','5e25291521ebe108868699','logout','logout','5e25291521ebe108868699 logged out!','system','logout : end of session','2020-06-15 13:49:47'),('5eec2850eb369185306668','5e25291521ebe108868699','login','login','Login succcessfully!','system','login success','2020-06-19 09:52:00'),('5eec6899b0b26425250293','5e25291521ebe108868699','create unit','create unit :  ','','5e25291521ebe108868699','create unit','2020-06-19 14:26:17'),('5eec68a8b0dea141899073','5e25291521ebe108868699','create divisi','create divisi :  ITD','Create divisi succcessfully!','5e25291521ebe108868699','create divisi','2020-06-19 14:26:32'),('5eec68b38ce79216176945','5e25291521ebe108868699','create unit','create unit :  ','','5e25291521ebe108868699','create unit','2020-06-19 14:26:43'),('5eec68b700086612659314','5e25291521ebe108868699','create unit','create unit :  CBS','Create unit succcessfully!','5e25291521ebe108868699','create unit','2020-06-19 14:26:47'),('5eec69ae01868148793369','5e25291521ebe108868699','create unit','create unit :  ','','5e25291521ebe108868699','create unit','2020-06-19 14:30:54'),('5eec69b8d8a00910832220','5e25291521ebe108868699','create unit','create unit :  ','','5e25291521ebe108868699','create unit','2020-06-19 14:31:04'),('5eec69bbaca17568112153','5e25291521ebe108868699','create unit','create unit :  ITS','Create unit succcessfully!','5e25291521ebe108868699','create unit','2020-06-19 14:31:07'),('5eec6b14c2f32750334747','5e25291521ebe108868699','update unit','update unit :  ','','5e25291521ebe108868699','update unit','2020-06-19 14:36:52'),('5eec6b4c9b96d444796884','5e25291521ebe108868699','update unit','update unit : 10 ','Update unit succcessfully!','5e25291521ebe108868699','update unit','2020-06-19 14:37:48'),('5eec6b5718eab458739391','5e25291521ebe108868699','update unit','update unit :  ','','5e25291521ebe108868699','update unit','2020-06-19 14:37:59'),('5eec6b5bdaaeb137224920','5e25291521ebe108868699','update unit','update unit : 10 ','Update unit succcessfully!','5e25291521ebe108868699','update unit','2020-06-19 14:38:03'),('5eec6b6668ba9061303853','5e25291521ebe108868699','update unit','update unit :  ','','5e25291521ebe108868699','update unit','2020-06-19 14:38:14'),('5eec6b6b03958311381629','5e25291521ebe108868699','update unit','update unit : 10 ','Update unit succcessfully!','5e25291521ebe108868699','update unit','2020-06-19 14:38:19'),('5eec6b7095326370408763','5e25291521ebe108868699','delete unit','delete unit : 11','Delete unit succcessfully!','5e25291521ebe108868699','delete unit','2020-06-19 14:38:24'),('5eec6b8d25923151330243','5e25291521ebe108868699','delete unit','delete unit : 10','Delete unit succcessfully!','5e25291521ebe108868699','delete unit','2020-06-19 14:38:53'),('5eec7366bd1be013310491','5e25291521ebe108868699','update config','update config : 5 BNISyariah123','Update config succcessfully!','5e25291521ebe108868699','update config','2020-06-19 15:12:22'),('5ef035e72f5b1967543880','dev.nalachandra@gmail.com','login','login','This account or password is not match!','system','login error','2020-06-22 11:39:03'),('5ef035ede8855972946569','5e25291521ebe108868699','login','login','Login succcessfully!','system','login success','2020-06-22 11:39:09'),('5ef065b5c063e315709274','5e25291521ebe108868699','create unit','create unit :  CBS','Create unit succcessfully!','5e25291521ebe108868699','create unit','2020-06-22 15:03:01'),('5ef0bf8c61b12112872150','5e25291521ebe108868699','login','login','Login succcessfully!','system','login success','2020-06-22 21:26:20'),('5ef0c6792fcdf220217224','5e25291521ebe108868699','create pegawai','create pegawai :  81770','Create pegawai succcessfully!','5e25291521ebe108868699','create pegawai','2020-06-22 21:55:53'),('5ef0c67f130ab451052512','5e25291521ebe108868699','delete pegawai','delete pegawai : 3','Delete pegawai succcessfully!','5e25291521ebe108868699','delete pegawai','2020-06-22 21:55:59'),('5ef0c67f81859293368990','5e25291521ebe108868699','delete pegawai','delete pegawai : ','Delete pegawai succcessfully!','5e25291521ebe108868699','delete pegawai','2020-06-22 21:55:59'),('5ef0c685d0a37712262492','5e25291521ebe108868699','delete pegawai','delete pegawai : 2','','5e25291521ebe108868699','delete pegawai','2020-06-22 21:56:05'),('5ef0c68dc0b2b777305197','5e25291521ebe108868699','delete pegawai','delete pegawai : 1','Delete pegawai succcessfully!','5e25291521ebe108868699','delete pegawai','2020-06-22 21:56:13'),('5ef0c880bbc30355993733','5e25291521ebe108868699','create pegawai','create pegawai :  81772','Create pegawai succcessfully!','5e25291521ebe108868699','create pegawai','2020-06-22 22:04:32'),('5ef0c8b558470488715601','5e25291521ebe108868699','update pegawai','update pegawai :  ','','5e25291521ebe108868699','update pegawai','2020-06-22 22:05:25'),('5ef0c8bab1d15098019747','5e25291521ebe108868699','update pegawai','update pegawai :  ','','5e25291521ebe108868699','update pegawai','2020-06-22 22:05:30'),('5ef0c931b7574519964297','5e25291521ebe108868699','update pegawai','update pegawai :  ','','5e25291521ebe108868699','update pegawai','2020-06-22 22:07:29'),('5ef0c93829ef2003701589','5e25291521ebe108868699','update pegawai','update pegawai :  ','','5e25291521ebe108868699','update pegawai','2020-06-22 22:07:36'),('5ef0c95728150757086186','5e25291521ebe108868699','update pegawai','update pegawai : 4 81772','Update pegawai succcessfully!','5e25291521ebe108868699','update pegawai','2020-06-22 22:08:07'),('5ef0c96267286458572831','5e25291521ebe108868699','create unit','create unit :  SCS','Create unit succcessfully!','5e25291521ebe108868699','create unit','2020-06-22 22:08:18'),('5ef0c978415d7301842233','5e25291521ebe108868699','update pegawai','update pegawai :  ','','5e25291521ebe108868699','update pegawai','2020-06-22 22:08:40'),('5ef0c983f1dbc543041546','5e25291521ebe108868699','update pegawai','update pegawai : 4 81773','Update pegawai succcessfully!','5e25291521ebe108868699','update pegawai','2020-06-22 22:08:51'),('5ef0c9d531db7243118123','5e25291521ebe108868699','update pegawai','update pegawai : 4 81772','Update pegawai succcessfully!','5e25291521ebe108868699','update pegawai','2020-06-22 22:10:13'),('5ef0c9da51b74134123084','5e25291521ebe108868699','update pegawai','update pegawai : 4 81772','Update pegawai succcessfully!','5e25291521ebe108868699','update pegawai','2020-06-22 22:10:18'),('5ef0c9e88cbf3420381792','5e25291521ebe108868699','delete pegawai','delete pegawai : 4','Delete pegawai succcessfully!','5e25291521ebe108868699','delete pegawai','2020-06-22 22:10:32'),('5ef212d1e6947110199860','5e25291521ebe108868699','login','login','Login succcessfully!','system','login success','2020-06-23 21:33:53'),('5ef212ea4a5cc882716211','5e25291521ebe108868699','logout','logout','5e25291521ebe108868699 logged out!','system','logout : end of session','2020-06-23 21:34:18'),('5ef4201f23ed3212360120','5e25291521ebe108868699','login','login','Login succcessfully!','system','login success','2020-06-25 10:55:11'),('5ef4203fc7067749940293','5e25291521ebe108868699','update pegawai','update pegawai : 2 81772','Update pegawai succcessfully!','5e25291521ebe108868699','update pegawai','2020-06-25 10:55:43'),('5ef420455f3af365718700','5e25291521ebe108868699','delete pegawai','delete pegawai : 2','Delete pegawai succcessfully!','5e25291521ebe108868699','delete pegawai','2020-06-25 10:55:49'),('5ef43c30ddd9f499444112','5e25291521ebe108868699','logout','logout','5e25291521ebe108868699 logged out!','system','logout : end of session','2020-06-25 12:54:56'),('5ef4af53ea566187735246','5e25291521ebe108868699','login','login','Login succcessfully!','system','login success','2020-06-25 21:06:11'),('5ef4b7fd4b2e7011416447','5e25291521ebe108868699','create jabatan','create jabatan :  AMGR','Create jabatan succcessfully!','5e25291521ebe108868699','create jabatan','2020-06-25 21:43:09'),('5ef4b81b9b150823387952','5e25291521ebe108868699','create jabatan','create jabatan :  ','','5e25291521ebe108868699','create jabatan','2020-06-25 21:43:39'),('5ef4b83f9b9e7712714328','5e25291521ebe108868699','create jabatan','create jabatan :  General Manager','Create jabatan succcessfully!','5e25291521ebe108868699','create jabatan','2020-06-25 21:44:15'),('5ef4b84705b47633911883','5e25291521ebe108868699','update jabatan','update jabatan :  ','','5e25291521ebe108868699','update jabatan','2020-06-25 21:44:23'),('5ef4b84ad0a75468440776','5e25291521ebe108868699','delete jabatan','delete jabatan : 1','Delete jabatan succcessfully!','5e25291521ebe108868699','delete jabatan','2020-06-25 21:44:26'),('5ef4ba87754ff440577270','5e25291521ebe108868699','create pegawai','create pegawai :  81772','Create pegawai succcessfully!','5e25291521ebe108868699','create pegawai','2020-06-25 21:53:59'),('5ef4bbec67b92625916356','5e25291521ebe108868699','create jabatan','create jabatan :  AMGR','Create jabatan succcessfully!','5e25291521ebe108868699','create jabatan','2020-06-25 21:59:56'),('5ef4bbf39e643609926706','5e25291521ebe108868699','update pegawai','update pegawai : 3 81772','Update pegawai succcessfully!','5e25291521ebe108868699','update pegawai','2020-06-25 22:00:03'),('5ef4bbf8a6f30346928671','5e25291521ebe108868699','delete pegawai','delete pegawai : 3','Delete pegawai succcessfully!','5e25291521ebe108868699','delete pegawai','2020-06-25 22:00:08'),('5ef4bc0605a46899853831','5e25291521ebe108868699','create pegawai','create pegawai :  81772','Create pegawai succcessfully!','5e25291521ebe108868699','create pegawai','2020-06-25 22:00:22'),('5ef4bd8fb7e18518612823','5e25291521ebe108868699','logout','logout','5e25291521ebe108868699 logged out!','system','logout : end of session','2020-06-25 22:06:55'),('5ef76eafa93d8921800203','5e25291521ebe108868699','login','login','Login succcessfully!','system','login success','2020-06-27 23:07:11'),('5ef77a8f43888349376890','5e25291521ebe108868699','create pegawai absensi approval','create pegawai absensi approval :  2 4','Create pegawai absensi approval succcessfully!','5e25291521ebe108868699','create pegawai absensi approval','2020-06-27 23:57:51'),('5ef77a95ac623905669914','5e25291521ebe108868699','delete pegawai','delete pegawai : 1','Delete pegawai succcessfully!','5e25291521ebe108868699','delete pegawai','2020-06-27 23:57:57'),('5ef77bf755c30412524542','5e25291521ebe108868699','delete pegawai absensi approval','delete pegawai absensi approval : 1','Delete pegawai absensi approval succcessfully!','5e25291521ebe108868699','delete pegawai absensi approval','2020-06-28 00:03:51'),('5ef77bfe99797347332144','5e25291521ebe108868699','create pegawai absensi approval','create pegawai absensi approval :  2 4','Create pegawai absensi approval succcessfully!','5e25291521ebe108868699','create pegawai absensi approval','2020-06-28 00:03:58'),('5ef77c9107921782396888','5e25291521ebe108868699','create pegawai','create pegawai :  12345','Create pegawai succcessfully!','5e25291521ebe108868699','create pegawai','2020-06-28 00:06:25'),('5ef77c9be719b862780224','5e25291521ebe108868699','update pegawai absensi approval','update pegawai absensi approval : 2 2 5','Update pegawai absensi approval succcessfully!','5e25291521ebe108868699','update pegawai absensi approval','2020-06-28 00:06:35'),('5f034b49abbab964537274','5e25291521ebe108868699','login','login','Login succcessfully!','system','login success','2020-07-06 23:03:21'),('5f034b59aaada973246356','5e25291521ebe108868699','logout','logout','5e25291521ebe108868699 logged out!','system','logout : end of session','2020-07-06 23:03:37'),('5f05eb55652bd771603039','5e25291521ebe108868699','login','login','Login succcessfully!','system','login success','2020-07-08 22:50:45'),('5f05eb8d2478c139646618','5e25291521ebe108868699','logout','logout','5e25291521ebe108868699 logged out!','system','logout : end of session','2020-07-08 22:51:41');
/*!40000 ALTER TABLE `t_activity_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_config`
--

DROP TABLE IF EXISTS `t_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `value` varchar(100) NOT NULL,
  `description` text,
  `date_create` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_config`
--

LOCK TABLES `t_config` WRITE;
/*!40000 ALTER TABLE `t_config` DISABLE KEYS */;
INSERT INTO `t_config` VALUES (1,'title_tab','Sistem Informasi Lembur','Title tab website','0000-00-00 00:00:00','2020-06-15 11:39:09'),(2,'title','Sistem Informasi Lembur','Title website','0000-00-00 00:00:00','2020-06-15 11:39:04'),(3,'logo','logo.png','Logo website','0000-00-00 00:00:00','0000-00-00 00:00:00'),(4,'start_year','2020','Start year website','0000-00-00 00:00:00','2020-06-15 10:31:29'),(5,'password_default','BNISyariah123','Password default user login',NULL,'2020-06-19 15:12:22'),(6,'jam_mulai','17:00','Jam mulai lembur',NULL,NULL);
/*!40000 ALTER TABLE `t_config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_divisi`
--

DROP TABLE IF EXISTS `t_divisi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_divisi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `divisi` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_divisi`
--

LOCK TABLES `t_divisi` WRITE;
/*!40000 ALTER TABLE `t_divisi` DISABLE KEYS */;
INSERT INTO `t_divisi` VALUES (1,'FND'),(2,'ITD');
/*!40000 ALTER TABLE `t_divisi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_jabatan`
--

DROP TABLE IF EXISTS `t_jabatan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_jabatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jabatan` varchar(50) NOT NULL,
  `kode_jabatan` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_jabatan`
--

LOCK TABLES `t_jabatan` WRITE;
/*!40000 ALTER TABLE `t_jabatan` DISABLE KEYS */;
INSERT INTO `t_jabatan` VALUES (1,'General Manager','GM'),(2,'Deputy General Manager','DGM'),(3,'Manager Koordinator','MANKO'),(4,'Manager','MGR'),(5,'Asisten Manager','AMGR');
/*!40000 ALTER TABLE `t_jabatan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_pegawai`
--

DROP TABLE IF EXISTS `t_pegawai`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_pegawai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_unit` int(11) NOT NULL,
  `id_jabatan` int(11) DEFAULT NULL,
  `npp` varchar(7) NOT NULL,
  `nama_pegawai` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_pegawai`
--

LOCK TABLES `t_pegawai` WRITE;
/*!40000 ALTER TABLE `t_pegawai` DISABLE KEYS */;
INSERT INTO `t_pegawai` VALUES (4,12,3,'81772','Chandra Nala'),(5,12,2,'12345','Abdul Sholeh');
/*!40000 ALTER TABLE `t_pegawai` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_trx_lembur`
--

DROP TABLE IF EXISTS `t_trx_lembur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_trx_lembur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pegawai` int(11) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `tanggal_trx_lembur` date NOT NULL,
  `tanggal_trx_input` datetime NOT NULL,
  `alasan_trx_lembur` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_trx_lembur`
--

LOCK TABLES `t_trx_lembur` WRITE;
/*!40000 ALTER TABLE `t_trx_lembur` DISABLE KEYS */;
INSERT INTO `t_trx_lembur` VALUES (1,4,'17:00:00','17:00:00','2020-07-08','2020-07-08 22:49:48','asdw');
/*!40000 ALTER TABLE `t_trx_lembur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_unit`
--

DROP TABLE IF EXISTS `t_unit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_unit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_divisi` varchar(100) DEFAULT NULL,
  `unit` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_unit`
--

LOCK TABLES `t_unit` WRITE;
/*!40000 ALTER TABLE `t_unit` DISABLE KEYS */;
INSERT INTO `t_unit` VALUES (1,'1','FRM'),(2,'1','SAS'),(3,'1','SAK1'),(4,'1','SAK2'),(5,'1','SLE1'),(6,'1','SLE2'),(7,'1','AKP'),(8,'1','AKP'),(9,'1','TAX'),(12,'2','CBS'),(13,'2','SCS');
/*!40000 ALTER TABLE `t_unit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_user`
--

DROP TABLE IF EXISTS `t_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_user` (
  `id` varchar(100) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `password` varchar(500) NOT NULL,
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y',
  `is_deleted` enum('Y','N') NOT NULL DEFAULT 'Y',
  `last_login` datetime NOT NULL,
  `last_prev_login` datetime NOT NULL,
  `date_create` datetime NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_user`
--

LOCK TABLES `t_user` WRITE;
/*!40000 ALTER TABLE `t_user` DISABLE KEYS */;
INSERT INTO `t_user` VALUES ('5e25291521ebe108868699','Chandra Nala','Budi Satria','Chandra Nala Budi Satria','dev.nalachandra@gmail.com','default.png','$2y$10$60gX9Omwcu9AO4quAEPgQO0giV0moIN2ZjFyVwyaIECS4xwN7vkF6','Y','N','2020-07-08 22:50:45','2020-07-06 23:03:21','0000-00-00 00:00:00','2020-05-27 14:21:19'),('5ee6fa23d172c578363335','Imam','Prasetyo','Imam Prasetyo','awifrm.fnd@gmail.com','default.png','$2y$10$60gX9Omwcu9AO4quAEPgQO0giV0moIN2ZjFyVwyaIECS4xwN7vkF6','Y','Y','2020-06-15 11:35:43','2020-06-15 11:33:40','2020-06-15 11:33:40','2020-06-15 11:33:40');
/*!40000 ALTER TABLE `t_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `vw_absensi_approval`
--

DROP TABLE IF EXISTS `vw_absensi_approval`;
/*!50001 DROP VIEW IF EXISTS `vw_absensi_approval`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `vw_absensi_approval` (
  `id` tinyint NOT NULL,
  `divisi` tinyint NOT NULL,
  `npp` tinyint NOT NULL,
  `nama_pegawai` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `vw_config`
--

DROP TABLE IF EXISTS `vw_config`;
/*!50001 DROP VIEW IF EXISTS `vw_config`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `vw_config` (
  `id` tinyint NOT NULL,
  `name` tinyint NOT NULL,
  `value` tinyint NOT NULL,
  `description` tinyint NOT NULL,
  `date_create` tinyint NOT NULL,
  `date_update` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `vw_pegawai_absensi_approval`
--

DROP TABLE IF EXISTS `vw_pegawai_absensi_approval`;
/*!50001 DROP VIEW IF EXISTS `vw_pegawai_absensi_approval`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `vw_pegawai_absensi_approval` (
  `id` tinyint NOT NULL,
  `npp` tinyint NOT NULL,
  `nama_pegawai` tinyint NOT NULL,
  `id_divisi` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `vw_pegawai_unit`
--

DROP TABLE IF EXISTS `vw_pegawai_unit`;
/*!50001 DROP VIEW IF EXISTS `vw_pegawai_unit`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `vw_pegawai_unit` (
  `id` tinyint NOT NULL,
  `nama_pegawai` tinyint NOT NULL,
  `npp` tinyint NOT NULL,
  `unit` tinyint NOT NULL,
  `jabatan` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `vw_pegawai_unit_divisi`
--

DROP TABLE IF EXISTS `vw_pegawai_unit_divisi`;
/*!50001 DROP VIEW IF EXISTS `vw_pegawai_unit_divisi`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `vw_pegawai_unit_divisi` (
  `id` tinyint NOT NULL,
  `id_unit` tinyint NOT NULL,
  `npp` tinyint NOT NULL,
  `nama_pegawai` tinyint NOT NULL,
  `id_divisi` tinyint NOT NULL,
  `id_jabatan` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `vw_trx_lembur_today`
--

DROP TABLE IF EXISTS `vw_trx_lembur_today`;
/*!50001 DROP VIEW IF EXISTS `vw_trx_lembur_today`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `vw_trx_lembur_today` (
  `id` tinyint NOT NULL,
  `nama_pegawai` tinyint NOT NULL,
  `divisi` tinyint NOT NULL,
  `unit` tinyint NOT NULL,
  `waktu_input` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `vw_unit_divisi`
--

DROP TABLE IF EXISTS `vw_unit_divisi`;
/*!50001 DROP VIEW IF EXISTS `vw_unit_divisi`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `vw_unit_divisi` (
  `id` tinyint NOT NULL,
  `unit` tinyint NOT NULL,
  `divisi` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Dumping events for database 'db_si_lembur'
--

--
-- Dumping routines for database 'db_si_lembur'
--

--
-- Final view structure for view `vw_absensi_approval`
--

/*!50001 DROP TABLE IF EXISTS `vw_absensi_approval`*/;
/*!50001 DROP VIEW IF EXISTS `vw_absensi_approval`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013  SQL SECURITY DEFINER */
/*!50001 VIEW `vw_absensi_approval` AS select `a`.`id` AS `id`,`b`.`divisi` AS `divisi`,`c`.`npp` AS `npp`,`c`.`nama_pegawai` AS `nama_pegawai` from ((`t_absensi_approval` `a` join `t_divisi` `b` on((`a`.`id_divisi` = `b`.`id`))) join `t_pegawai` `c` on((`a`.`id_pegawai` = `c`.`id`))) order by `c`.`nama_pegawai`,`b`.`divisi` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vw_config`
--

/*!50001 DROP TABLE IF EXISTS `vw_config`*/;
/*!50001 DROP VIEW IF EXISTS `vw_config`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013  SQL SECURITY DEFINER */
/*!50001 VIEW `vw_config` AS select `t_config`.`id` AS `id`,`t_config`.`name` AS `name`,`t_config`.`value` AS `value`,`t_config`.`description` AS `description`,`t_config`.`date_create` AS `date_create`,`t_config`.`date_update` AS `date_update` from `t_config` where (`t_config`.`name` <> 'logo') */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vw_pegawai_absensi_approval`
--

/*!50001 DROP TABLE IF EXISTS `vw_pegawai_absensi_approval`*/;
/*!50001 DROP VIEW IF EXISTS `vw_pegawai_absensi_approval`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013  SQL SECURITY DEFINER */
/*!50001 VIEW `vw_pegawai_absensi_approval` AS select `a`.`id` AS `id`,`a`.`npp` AS `npp`,`a`.`nama_pegawai` AS `nama_pegawai`,`b`.`id_divisi` AS `id_divisi` from (((`t_pegawai` `a` join `t_unit` `b` on((`a`.`id_unit` = `b`.`id`))) join `t_divisi` `c` on((`b`.`id_divisi` = `c`.`id`))) join `t_jabatan` `d` on((`a`.`id_jabatan` = `d`.`id`))) where (`d`.`kode_jabatan` in ('GM','DGM','MANKO')) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vw_pegawai_unit`
--

/*!50001 DROP TABLE IF EXISTS `vw_pegawai_unit`*/;
/*!50001 DROP VIEW IF EXISTS `vw_pegawai_unit`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013  SQL SECURITY DEFINER */
/*!50001 VIEW `vw_pegawai_unit` AS select `a`.`id` AS `id`,`a`.`nama_pegawai` AS `nama_pegawai`,`a`.`npp` AS `npp`,`b`.`unit` AS `unit`,`c`.`jabatan` AS `jabatan` from ((`t_pegawai` `a` join `t_unit` `b` on((`a`.`id_unit` = `b`.`id`))) join `t_jabatan` `c` on((`a`.`id_jabatan` = `c`.`id`))) order by `a`.`nama_pegawai`,`a`.`npp`,`b`.`unit` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vw_pegawai_unit_divisi`
--

/*!50001 DROP TABLE IF EXISTS `vw_pegawai_unit_divisi`*/;
/*!50001 DROP VIEW IF EXISTS `vw_pegawai_unit_divisi`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013  SQL SECURITY DEFINER */
/*!50001 VIEW `vw_pegawai_unit_divisi` AS select `a`.`id` AS `id`,`a`.`id_unit` AS `id_unit`,`a`.`npp` AS `npp`,`a`.`nama_pegawai` AS `nama_pegawai`,`b`.`id_divisi` AS `id_divisi`,`a`.`id_jabatan` AS `id_jabatan` from ((`t_pegawai` `a` join `t_unit` `b` on((`a`.`id_unit` = `b`.`id`))) join `t_divisi` `c` on((`b`.`id_divisi` = `c`.`id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vw_trx_lembur_today`
--

/*!50001 DROP TABLE IF EXISTS `vw_trx_lembur_today`*/;
/*!50001 DROP VIEW IF EXISTS `vw_trx_lembur_today`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013  SQL SECURITY DEFINER */
/*!50001 VIEW `vw_trx_lembur_today` AS select `a`.`id` AS `id`,`b`.`nama_pegawai` AS `nama_pegawai`,`d`.`divisi` AS `divisi`,`c`.`unit` AS `unit`,`a`.`tanggal_trx_input` AS `waktu_input` from (((`t_trx_lembur` `a` join `t_pegawai` `b` on((`a`.`id_pegawai` = `b`.`id`))) join `t_unit` `c` on((`b`.`id_unit` = `c`.`id`))) join `t_divisi` `d` on((`c`.`id_divisi` = `d`.`id`))) order by `a`.`tanggal_trx_lembur` desc */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vw_unit_divisi`
--

/*!50001 DROP TABLE IF EXISTS `vw_unit_divisi`*/;
/*!50001 DROP VIEW IF EXISTS `vw_unit_divisi`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013  SQL SECURITY DEFINER */
/*!50001 VIEW `vw_unit_divisi` AS select `a`.`id` AS `id`,`a`.`unit` AS `unit`,`b`.`divisi` AS `divisi` from (`t_unit` `a` join `t_divisi` `b` on((`a`.`id_divisi` = `b`.`id`))) order by `b`.`divisi`,`a`.`unit` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-07-09  8:49:36
