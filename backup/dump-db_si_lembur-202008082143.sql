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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_absensi_approval`
--

LOCK TABLES `t_absensi_approval` WRITE;
/*!40000 ALTER TABLE `t_absensi_approval` DISABLE KEYS */;
INSERT INTO `t_absensi_approval` VALUES (2,1,3),(3,1,9),(4,1,1);
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
INSERT INTO `t_activity_log` VALUES ('5f193370f22e4446558269','5e25291521ebe108868699','login','login','Login succcessfully!','system','login success','2020-07-23 13:51:28'),('5f19a7192ae01000912546','5e25291521ebe108868699','login','login','Login succcessfully!','system','login success','2020-07-23 22:04:57'),('5f19adca00b60810231584','5e25291521ebe108868699','print report','print report :  ','','5e25291521ebe108868699','print report','2020-07-23 22:33:30'),('5f19adce185ae133606983','5e25291521ebe108868699','print report','print report :  ','','5e25291521ebe108868699','print report','2020-07-23 22:33:34'),('5f19ade195d7d251447666','5e25291521ebe108868699','print report','print report :  ','','5e25291521ebe108868699','print report','2020-07-23 22:33:53'),('5f19ae1f8cb76234285221','5e25291521ebe108868699','print report','print report :  ','','5e25291521ebe108868699','print report','2020-07-23 22:34:55'),('5f19ae23375d9210318104','5e25291521ebe108868699','print report','print report :  ','','5e25291521ebe108868699','print report','2020-07-23 22:34:59'),('5f19ae27aa323970318290','5e25291521ebe108868699','print report','print report :  ','','5e25291521ebe108868699','print report','2020-07-23 22:35:03'),('5f19ae6b6c95e473994664','5e25291521ebe108868699','print report','print report :  ','','5e25291521ebe108868699','print report','2020-07-23 22:36:11'),('5f19ae706a702853199678','5e25291521ebe108868699','print report','print report :  ','','5e25291521ebe108868699','print report','2020-07-23 22:36:16'),('5f19ae806f51d134721922','5e25291521ebe108868699','print report','print report :  ','','5e25291521ebe108868699','print report','2020-07-23 22:36:32'),('5f19ae84eb1ca200240016','5e25291521ebe108868699','print report','print report :  ','','5e25291521ebe108868699','print report','2020-07-23 22:36:36'),('5f19aeb187a72295331016','5e25291521ebe108868699','print report','print report : 1 2020-07-23','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-07-23 22:37:21'),('5f19aeb2b18c9129686427','5e25291521ebe108868699','print report','print report : 1 2020-07-23','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-07-23 22:37:22'),('5f19aeb9b4803162470272','5e25291521ebe108868699','print report','print report : 1 2020-07-23','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-07-23 22:37:29'),('5f19aeb9e2619287761159','5e25291521ebe108868699','print report','print report : 1 2020-07-23','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-07-23 22:37:29'),('5f19aec27a2d0026569011','5e25291521ebe108868699','print report','print report : 1 2020-07-23','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-07-23 22:37:38'),('5f19aec2b0967081801575','5e25291521ebe108868699','print report','print report : 1 2020-07-23','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-07-23 22:37:38'),('5f19af0ee1fa4880823467','5e25291521ebe108868699','print report','print report : 1 2020-07-23','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-07-23 22:38:54'),('5f19af0f1aca0770437712','5e25291521ebe108868699','print report','print report : 1 2020-07-23','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-07-23 22:38:55'),('5f19af151bf69525999912','5e25291521ebe108868699','print report','print report : 1 2020-07-23','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-07-23 22:39:01'),('5f19af15b4eb2719519603','5e25291521ebe108868699','print report','print report : 1 2020-07-23','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-07-23 22:39:01'),('5f19afea56667463439348','5e25291521ebe108868699','print report','print report : 1 2020-07-23','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-07-23 22:42:34'),('5f19afea93730128678303','5e25291521ebe108868699','print report','print report : 1 2020-07-23','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-07-23 22:42:34'),('5f19b06388cbd914755353','5e25291521ebe108868699','print report','print report : 1 2020-07-23','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-07-23 22:44:35'),('5f19b06451f0c045321928','5e25291521ebe108868699','print report','print report : 1 2020-07-23','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-07-23 22:44:36'),('5f19b0a7c83f5482745073','5e25291521ebe108868699','print report','print report : 1 2020-07-23','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-07-23 22:45:43'),('5f19b0a820d93235087810','5e25291521ebe108868699','print report','print report : 1 2020-07-23','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-07-23 22:45:44'),('5f19b13b95157611070377','5e25291521ebe108868699','print report','print report : 1 2020-07-23','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-07-23 22:48:11'),('5f19b13bc3aa7418242424','5e25291521ebe108868699','print report','print report : 1 2020-07-23','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-07-23 22:48:11'),('5f19b16f41534723146217','5e25291521ebe108868699','print report','print report : 1 2020-07-23','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-07-23 22:49:03'),('5f19b1850b256631472085','5e25291521ebe108868699','print report','print report : 1 2020-07-23','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-07-23 22:49:25'),('5f19b18539212726108459','5e25291521ebe108868699','print report','print report : 1 2020-07-23','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-07-23 22:49:25'),('5f19b1d41d09b325600604','5e25291521ebe108868699','print report','print report : 1 2020-07-23','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-07-23 22:50:44'),('5f19b1d44eefd101417017','5e25291521ebe108868699','print report','print report : 1 2020-07-23','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-07-23 22:50:44'),('5f19b230624de677005336','5e25291521ebe108868699','print report','print report : 1 2020-07-23','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-07-23 22:52:16'),('5f19b32bf2fbc546213561','5e25291521ebe108868699','print report','print report : 1 2020-07-23','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-07-23 22:56:27'),('5f19b32c34b60274260291','5e25291521ebe108868699','print report','print report : 1 2020-07-23','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-07-23 22:56:28'),('5f19b39be575a104652238','5e25291521ebe108868699','update pegawai','update pegawai : 9 73441','Update pegawai succcessfully!','5e25291521ebe108868699','update pegawai','2020-07-23 22:58:19'),('5f19b3abb3830304329867','5e25291521ebe108868699','update pegawai','update pegawai : 1 73043','Update pegawai succcessfully!','5e25291521ebe108868699','update pegawai','2020-07-23 22:58:35'),('5f19b3b69992f106006759','5e25291521ebe108868699','update pegawai','update pegawai : 3 73071','Update pegawai succcessfully!','5e25291521ebe108868699','update pegawai','2020-07-23 22:58:46'),('5f19b3c4aa229067628428','5e25291521ebe108868699','create pegawai absensi approval','create pegawai absensi approval :  1 1','Create pegawai absensi approval succcessfully!','5e25291521ebe108868699','create pegawai absensi approval','2020-07-23 22:59:00'),('5f19b3c8d9470550626800','5e25291521ebe108868699','create pegawai absensi approval','create pegawai absensi approval :  1 3','Create pegawai absensi approval succcessfully!','5e25291521ebe108868699','create pegawai absensi approval','2020-07-23 22:59:04'),('5f19b3cda6f04020888832','5e25291521ebe108868699','create pegawai absensi approval','create pegawai absensi approval :  1 9','Create pegawai absensi approval succcessfully!','5e25291521ebe108868699','create pegawai absensi approval','2020-07-23 22:59:09'),('5f19b3d1e340f222450897','5e25291521ebe108868699','create pegawai absensi approval','create pegawai absensi approval :  1 1','Create pegawai absensi approval succcessfully!','5e25291521ebe108868699','create pegawai absensi approval','2020-07-23 22:59:13'),('5f19b3da28872172171478','5e25291521ebe108868699','delete pegawai absensi approval','delete pegawai absensi approval : 1','Delete pegawai absensi approval succcessfully!','5e25291521ebe108868699','delete pegawai absensi approval','2020-07-23 22:59:22'),('5f1a34b460445724276083','5e25291521ebe108868699','login','login','Login succcessfully!','system','login success','2020-07-24 08:09:08'),('5f1a7eb012047823705607','5e25291521ebe108868699','login','login','Login succcessfully!','system','login success','2020-07-24 13:24:48'),('5f1a89e1edf6f842150665','5e25291521ebe108868699','logout','logout','5e25291521ebe108868699 logged out!','system','logout : end of session','2020-07-24 14:12:33'),('5f1a8a432877e570572663','1','login','login','Login succcessfully!','system','login success','2020-07-24 14:14:11'),('5f1a8a4d21a0b403635717','1','create input lembur','create input lembur : 1 2020-07-24 14:14:21','Create input lembur succcessfully!','1','create input lembur','2020-07-24 14:14:21'),('5f1a8a4fe703d866917360','1','logout','logout','1 logged out!','system','logout : end of session','2020-07-24 14:14:23'),('5f1a8a82edfb4563996511','5e25291521ebe108868699','login','login','Login succcessfully!','system','login success','2020-07-24 14:15:14'),('5f1a8a92a7630934422836','5e25291521ebe108868699','print report','print report : 1 2020-07-24','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-07-24 14:15:30'),('5f1a8a96c92e8724298573','5e25291521ebe108868699','print report','print report : 1 2020-07-24','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-07-24 14:15:34'),('5f1a8bceea08a262311317','5e25291521ebe108868699','print report','print report : 1 2020-07-24','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-07-24 14:20:46'),('5f1a8bcf36458986446105','5e25291521ebe108868699','print report','print report : 1 2020-07-24','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-07-24 14:20:47'),('5f1a8bffc9b73312887307','5e25291521ebe108868699','print report','print report : 1 2020-07-22','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-07-24 14:21:35'),('5f1a8c3d722bf012191017','5e25291521ebe108868699','print report','print report : 1 2020-07-22','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-07-24 14:22:37'),('5f1a8c3dbdd04856193692','5e25291521ebe108868699','print report','print report : 1 2020-07-22','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-07-24 14:22:37'),('5f1a8c5421af7171695902','5e25291521ebe108868699','print report','print report : 1 2020-07-24','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-07-24 14:23:00'),('5f1a8c54635c0790742559','5e25291521ebe108868699','print report','print report : 1 2020-07-24','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-07-24 14:23:00'),('5f1a8d54bee9a285102228','5e25291521ebe108868699','print report','print report :  ','','5e25291521ebe108868699','print report','2020-07-24 14:27:16'),('5f1a8d5a4512f811280175','5e25291521ebe108868699','print report','print report : 1 2020-07-24','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-07-24 14:27:22'),('5f1a8d5a7a2f4705908646','5e25291521ebe108868699','print report','print report : 1 2020-07-24','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-07-24 14:27:22'),('5f1a8d99743f6960123153','5e25291521ebe108868699','print report','print report : 1 2020-07-24','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-07-24 14:28:25'),('5f1a8d99a60b1909295660','5e25291521ebe108868699','print report','print report : 1 2020-07-24','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-07-24 14:28:25'),('5f1a8dd2e0d50022991648','5e25291521ebe108868699','print report','print report :  ','','5e25291521ebe108868699','print report','2020-07-24 14:29:22'),('5f1a8dd6cf13f522343222','5e25291521ebe108868699','print report','print report : 1 2020-07-24','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-07-24 14:29:26'),('5f1a8dd71fe11697716591','5e25291521ebe108868699','print report','print report : 1 2020-07-24','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-07-24 14:29:27'),('5f1a8e86a90ad523612856','5e25291521ebe108868699','print report','print report : 1 2020-07-24','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-07-24 14:32:22'),('5f1a8e86de335151982132','5e25291521ebe108868699','print report','print report : 1 2020-07-24','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-07-24 14:32:22'),('5f1a92787d211915485689','5e25291521ebe108868699','print report','print report : 1 2020-07-24','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-07-24 14:49:12'),('5f1a9278ba197553757074','5e25291521ebe108868699','print report','print report : 1 2020-07-24','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-07-24 14:49:12'),('5f1a929bdf455654019148','5e25291521ebe108868699','print report','print report : 1 2020-07-24','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-07-24 14:49:47'),('5f1a929c66fe6922780113','5e25291521ebe108868699','print report','print report : 1 2020-07-24','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-07-24 14:49:48'),('5f1a95ae38c6b346260991','5e25291521ebe108868699','print report','print report : 1 2020-07-24','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-07-24 15:02:54'),('5f1a95af16148970369821','5e25291521ebe108868699','print report','print report : 1 2020-07-24','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-07-24 15:02:55'),('5f1a9621789dc007214885','5e25291521ebe108868699','print report','print report : 1 2020-07-24','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-07-24 15:04:49'),('5f1a9622aed15840880261','5e25291521ebe108868699','print report','print report : 1 2020-07-24','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-07-24 15:04:50'),('5f1a9951edc35483769456','5e25291521ebe108868699','print report','print report : 1 2020-07-24','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-07-24 15:18:25'),('5f1a996688c50745501384','5e25291521ebe108868699','print report','print report : 1 2020-07-24','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-07-24 15:18:46'),('5f1a9966f3494009139946','5e25291521ebe108868699','print report','print report : 1 2020-07-24','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-07-24 15:18:46'),('5f1aa26865a12272606711','5e25291521ebe108868699','print report','print report : 1 2020-07-24','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-07-24 15:57:12'),('5f1aa26ab4d8d271165864','5e25291521ebe108868699','print report','print report : 1 2020-07-24','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-07-24 15:57:14'),('5f1aa5d48817a249698986','5e25291521ebe108868699','logout','logout','5e25291521ebe108868699 logged out!','system','logout : end of session','2020-07-24 16:11:48'),('5f20b4ac4e952154529779','5e25291521ebe108868699','login','login','Login succcessfully!','system','login success','2020-07-29 06:28:44'),('5f20bc009db4c419085891','5e25291521ebe108868699','print report','print report : 1 2020-07-24','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-07-29 07:00:00'),('5f20bc050fd26536217787','5e25291521ebe108868699','print report','print report : 1 2020-07-24','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-07-29 07:00:05'),('5f20be606b565563109765','5e25291521ebe108868699','print report','print report : 1 2020-07-24','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-07-29 07:10:08'),('5f20be6273550356367649','5e25291521ebe108868699','print report','print report : 1 2020-07-24','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-07-29 07:10:10'),('5f20beef7f045394424042','5e25291521ebe108868699','print report','print report : 1 2020-07-24','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-07-29 07:12:31'),('5f20bef062243639616032','5e25291521ebe108868699','print report','print report : 1 2020-07-24','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-07-29 07:12:32'),('5f20bf50e73ec557083643','5e25291521ebe108868699','print report','print report : 1 2020-07-24','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-07-29 07:14:08'),('5f20bf526ee86939747852','5e25291521ebe108868699','print report','print report : 1 2020-07-24','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-07-29 07:14:10'),('5f20bf9bc3b8a327918307','5e25291521ebe108868699','print report','print report : 1 2020-07-24','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-07-29 07:15:23'),('5f20bf9c87d8c591968923','5e25291521ebe108868699','print report','print report : 1 2020-07-24','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-07-29 07:15:24'),('5f20c5268f5b7975811622','5e25291521ebe108868699','print report','print report : 1 2020-07-24','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-07-29 07:39:02'),('5f20c5281f67d238335229','5e25291521ebe108868699','print report','print report : 1 2020-07-24','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-07-29 07:39:04'),('5f20c5b9b9804801872892','5e25291521ebe108868699','print report','print report : 1 2020-07-24','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-07-29 07:41:29'),('5f20c5bb236af217820656','5e25291521ebe108868699','print report','print report : 1 2020-07-24','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-07-29 07:41:31'),('5f20db71a2de1968227568','5e25291521ebe108868699','login','login','Login succcessfully!','system','login success','2020-07-29 09:14:09'),('5f20db7c9350e676854853','5e25291521ebe108868699','print report','print report : 1 2020-07-24','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-07-29 09:14:20'),('5f20db7e26e78807907885','5e25291521ebe108868699','print report','print report : 1 2020-07-24','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-07-29 09:14:22'),('5f20dc51387fd076815910','5e25291521ebe108868699','print report','print report : 1 2020-07-24','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-07-29 09:17:53'),('5f20dc5229e60557982299','5e25291521ebe108868699','print report','print report : 1 2020-07-24','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-07-29 09:17:54'),('5f20dc88059c2217620815','5e25291521ebe108868699','print report','print report : 1 2020-07-24','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-07-29 09:18:48'),('5f20dc88c0dea655335057','5e25291521ebe108868699','print report','print report : 1 2020-07-24','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-07-29 09:18:48'),('5f2118f5c6548966702183','5e25291521ebe108868699','login','login','Login succcessfully!','system','login success','2020-07-29 13:36:37'),('5f21192e550cc330598877','5e25291521ebe108868699','print report','print report : 1 2020-07-24','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-07-29 13:37:34'),('5f2119303f2ba248068651','5e25291521ebe108868699','print report','print report : 1 2020-07-24','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-07-29 13:37:36'),('5f2119abd6e05674075147','5e25291521ebe108868699','print report','print report : 1 2020-07-24','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-07-29 13:39:39'),('5f2119adbebe8216083037','5e25291521ebe108868699','print report','print report : 1 2020-07-24','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-07-29 13:39:41'),('5f211a805f5e6052465109','5e25291521ebe108868699','print report','print report : 1 2020-07-24','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-07-29 13:43:12'),('5f211a828fa27713389963','5e25291521ebe108868699','print report','print report : 1 2020-07-24','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-07-29 13:43:14'),('5f211b0e7d893670838372','5e25291521ebe108868699','print report','print report : 1 2020-07-24','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-07-29 13:45:34'),('5f211b1153bde332553695','5e25291521ebe108868699','print report','print report : 1 2020-07-24','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-07-29 13:45:37'),('5f211bcbc9505819675911','5e25291521ebe108868699','print report','print report : 1 2020-07-24','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-07-29 13:48:43'),('5f211bce316b6713870242','5e25291521ebe108868699','print report','print report : 1 2020-07-24','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-07-29 13:48:46'),('5f27957179c10558970709','5e25291521ebe108868699','login','login','Login succcessfully!','system','login success','2020-08-03 11:41:21'),('5f27961a904db568323926','5e25291521ebe108868699','print report','print report : 1 2020-07-24','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-08-03 11:44:10'),('5f27961ca0381676588515','5e25291521ebe108868699','print report','print report : 1 2020-07-24','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-08-03 11:44:12'),('5f27993c5c3b5193854880','5e25291521ebe108868699','print report','print report : 1 2020-07-24','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-08-03 11:57:32'),('5f27993e45164943867715','5e25291521ebe108868699','print report','print report : 1 2020-07-24','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-08-03 11:57:34'),('5f27b672621ce789283800','5e25291521ebe108868699','login','login','Login succcessfully!','system','login success','2020-08-03 14:02:10'),('5f27b68607bde124229950','5e25291521ebe108868699','print report','print report : 1 2020-07-24','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-08-03 14:02:30'),('5f27b68a8b7c0305661356','5e25291521ebe108868699','print report','print report : 1 2020-07-24','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-08-03 14:02:34'),('5f27b6a328223760972533','5e25291521ebe108868699','print report','print report : 1 2020-07-24','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-08-03 14:02:59'),('5f27b722b3c43388549117','5e25291521ebe108868699','print report','print report : 1 2020-07-24','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-08-03 14:05:06'),('5f27b724dc125735427474','5e25291521ebe108868699','print report','print report : 1 2020-07-24','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-08-03 14:05:08'),('5f27ba77e495b870206684','5e25291521ebe108868699','print report','print report : 1 2020-07-24','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-08-03 14:19:19'),('5f27bf9c39080422284463','5e25291521ebe108868699','print report','print report : 1 2020-07-24','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-08-03 14:41:16'),('5f27bf9dc8554919754483','5e25291521ebe108868699','print report','print report : 1 2020-07-24','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-08-03 14:41:17'),('5f27c4e667a04715392817','5e25291521ebe108868699','print report','print report : 1 2020-07-24','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-08-03 15:03:50'),('5f27c4e7ad789818448716','5e25291521ebe108868699','print report','print report : 1 2020-07-24','Generate Print Report Overtime','5e25291521ebe108868699','print report','2020-08-03 15:03:51');
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_config`
--

LOCK TABLES `t_config` WRITE;
/*!40000 ALTER TABLE `t_config` DISABLE KEYS */;
INSERT INTO `t_config` VALUES (1,'title_tab','Shift &amp; Overtime System','Title tab website','0000-00-00 00:00:00','2020-07-12 15:09:52'),(2,'title','Shift &amp; Overtime System','Title website','0000-00-00 00:00:00','2020-07-12 15:09:58'),(3,'logo','logo.png','Logo website','0000-00-00 00:00:00','0000-00-00 00:00:00'),(4,'start_year','2020','Start year website','0000-00-00 00:00:00','2020-06-15 10:31:29'),(5,'password_default','BNISyariah123','Password default user login',NULL,'2020-06-19 15:12:22'),(6,'jam_mulai','17:00','Jam mulai lembur',NULL,NULL),(7,'header_report_overtime','Report Overtime','Header Report Overtime',NULL,NULL),(8,'header_report_shifting','Report Shifting','Header Report Shifting',NULL,NULL);
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
  `deskripsi` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_divisi`
--

LOCK TABLES `t_divisi` WRITE;
/*!40000 ALTER TABLE `t_divisi` DISABLE KEYS */;
INSERT INTO `t_divisi` VALUES (1,'FND','Finance Division');
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
  `password` varchar(500) CHARACTER SET latin1 NOT NULL,
  `nama_pegawai` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_pegawai`
--

LOCK TABLES `t_pegawai` WRITE;
/*!40000 ALTER TABLE `t_pegawai` DISABLE KEYS */;
INSERT INTO `t_pegawai` VALUES (1,2,3,'73043','$2y$10$BMwJTgZZD55tsnLAJJbKuu9QYsBzbohs3Y8j56mhfxwMsAZ8Ad4jC','OTIK ANDJAR LUKITOWATI'),(2,4,5,'73045','$2y$10$BMwJTgZZD55tsnLAJJbKuu9QYsBzbohs3Y8j56mhfxwMsAZ8Ad4jC','ACHMAD TURMUDHY'),(3,1,1,'73071','$2y$10$BMwJTgZZD55tsnLAJJbKuu9QYsBzbohs3Y8j56mhfxwMsAZ8Ad4jC','ZEFRI ANANTA'),(4,5,5,'73158','$2y$10$BMwJTgZZD55tsnLAJJbKuu9QYsBzbohs3Y8j56mhfxwMsAZ8Ad4jC','HERU BUDIARTO'),(5,6,5,'73174','$2y$10$BMwJTgZZD55tsnLAJJbKuu9QYsBzbohs3Y8j56mhfxwMsAZ8Ad4jC','M. MARUF PURNAWAN'),(6,7,5,'73224','$2y$10$BMwJTgZZD55tsnLAJJbKuu9QYsBzbohs3Y8j56mhfxwMsAZ8Ad4jC','ANDRI WIBOWO'),(7,8,5,'73263','$2y$10$BMwJTgZZD55tsnLAJJbKuu9QYsBzbohs3Y8j56mhfxwMsAZ8Ad4jC','HANA ANDRIANA PUTRI'),(8,8,5,'73277','$2y$10$BMwJTgZZD55tsnLAJJbKuu9QYsBzbohs3Y8j56mhfxwMsAZ8Ad4jC','DONIE CRISTO'),(9,3,3,'73441','$2y$10$BMwJTgZZD55tsnLAJJbKuu9QYsBzbohs3Y8j56mhfxwMsAZ8Ad4jC','AHMAD FADRI MALIK'),(10,5,5,'73459','$2y$10$BMwJTgZZD55tsnLAJJbKuu9QYsBzbohs3Y8j56mhfxwMsAZ8Ad4jC','FERY FIRMANSYAH'),(11,9,5,'73581','$2y$10$BMwJTgZZD55tsnLAJJbKuu9QYsBzbohs3Y8j56mhfxwMsAZ8Ad4jC','NOVIANTI'),(12,9,5,'73620','$2y$10$BMwJTgZZD55tsnLAJJbKuu9QYsBzbohs3Y8j56mhfxwMsAZ8Ad4jC','MUHAMAD FARID RAMADHAN'),(13,4,5,'73639','$2y$10$BMwJTgZZD55tsnLAJJbKuu9QYsBzbohs3Y8j56mhfxwMsAZ8Ad4jC','DEWI MAYASARI'),(14,10,5,'74015','$2y$10$BMwJTgZZD55tsnLAJJbKuu9QYsBzbohs3Y8j56mhfxwMsAZ8Ad4jC','RAHMAT SETIAWAN'),(15,8,5,'74085','$2y$10$BMwJTgZZD55tsnLAJJbKuu9QYsBzbohs3Y8j56mhfxwMsAZ8Ad4jC','FADJRIAH RISTIANA'),(16,11,5,'74424','$2y$10$BMwJTgZZD55tsnLAJJbKuu9QYsBzbohs3Y8j56mhfxwMsAZ8Ad4jC','CENTA PUSPITA RAHMI'),(17,11,5,'74500','$2y$10$BMwJTgZZD55tsnLAJJbKuu9QYsBzbohs3Y8j56mhfxwMsAZ8Ad4jC','ASEP ABIDIN'),(18,7,5,'74519','$2y$10$BMwJTgZZD55tsnLAJJbKuu9QYsBzbohs3Y8j56mhfxwMsAZ8Ad4jC','WIDYA DWI PRATIWI'),(19,8,5,'75740','$2y$10$BMwJTgZZD55tsnLAJJbKuu9QYsBzbohs3Y8j56mhfxwMsAZ8Ad4jC','RIZKY ABDULLAH'),(20,6,5,'75783','$2y$10$BMwJTgZZD55tsnLAJJbKuu9QYsBzbohs3Y8j56mhfxwMsAZ8Ad4jC','ABDUL HAMIM'),(21,5,5,'75808','$2y$10$BMwJTgZZD55tsnLAJJbKuu9QYsBzbohs3Y8j56mhfxwMsAZ8Ad4jC','FAZRIE TAUFIK LUBIS'),(22,8,5,'76335','$2y$10$BMwJTgZZD55tsnLAJJbKuu9QYsBzbohs3Y8j56mhfxwMsAZ8Ad4jC','ADI YUNAN'),(23,9,5,'76531','$2y$10$BMwJTgZZD55tsnLAJJbKuu9QYsBzbohs3Y8j56mhfxwMsAZ8Ad4jC','FAHMI AKBAR'),(24,9,5,'76689','$2y$10$BMwJTgZZD55tsnLAJJbKuu9QYsBzbohs3Y8j56mhfxwMsAZ8Ad4jC','MUHAMMAD HARKAN SEPTIAN'),(25,12,5,'76839','$2y$10$BMwJTgZZD55tsnLAJJbKuu9QYsBzbohs3Y8j56mhfxwMsAZ8Ad4jC','FENY KARNIA'),(26,9,5,'77346','$2y$10$BMwJTgZZD55tsnLAJJbKuu9QYsBzbohs3Y8j56mhfxwMsAZ8Ad4jC','RIDWAN'),(27,12,5,'77457','$2y$10$BMwJTgZZD55tsnLAJJbKuu9QYsBzbohs3Y8j56mhfxwMsAZ8Ad4jC','TB DEDDY INDRA JAYA'),(28,6,5,'77656','$2y$10$BMwJTgZZD55tsnLAJJbKuu9QYsBzbohs3Y8j56mhfxwMsAZ8Ad4jC','NURHASANAH'),(29,9,5,'77677','$2y$10$BMwJTgZZD55tsnLAJJbKuu9QYsBzbohs3Y8j56mhfxwMsAZ8Ad4jC','INDAH PUSPITA SARI'),(30,11,5,'77931','$2y$10$BMwJTgZZD55tsnLAJJbKuu9QYsBzbohs3Y8j56mhfxwMsAZ8Ad4jC','EDI SUROSO'),(31,9,5,'78193','$2y$10$BMwJTgZZD55tsnLAJJbKuu9QYsBzbohs3Y8j56mhfxwMsAZ8Ad4jC','HELMI MARSSUGARA'),(32,9,5,'78264','$2y$10$BMwJTgZZD55tsnLAJJbKuu9QYsBzbohs3Y8j56mhfxwMsAZ8Ad4jC','ANISSA KUSUARDINI'),(33,9,5,'78514','$2y$10$BMwJTgZZD55tsnLAJJbKuu9QYsBzbohs3Y8j56mhfxwMsAZ8Ad4jC','ANITA FAUZIAH'),(34,4,5,'78515','$2y$10$BMwJTgZZD55tsnLAJJbKuu9QYsBzbohs3Y8j56mhfxwMsAZ8Ad4jC','ANDHIKA RAHMAN'),(35,9,5,'79435','$2y$10$BMwJTgZZD55tsnLAJJbKuu9QYsBzbohs3Y8j56mhfxwMsAZ8Ad4jC','MUH. AKRAM BAHARUDDIN'),(36,12,5,'79609','$2y$10$BMwJTgZZD55tsnLAJJbKuu9QYsBzbohs3Y8j56mhfxwMsAZ8Ad4jC','WULAN MEGA SARI'),(37,5,5,'79610','$2y$10$BMwJTgZZD55tsnLAJJbKuu9QYsBzbohs3Y8j56mhfxwMsAZ8Ad4jC','TOPAN ARIYUS SAPUTRA'),(38,7,5,'80086','$2y$10$BMwJTgZZD55tsnLAJJbKuu9QYsBzbohs3Y8j56mhfxwMsAZ8Ad4jC','IMAM PRASETYO'),(39,9,5,'80207','$2y$10$BMwJTgZZD55tsnLAJJbKuu9QYsBzbohs3Y8j56mhfxwMsAZ8Ad4jC','HARUN M ANANDA SIREGAR'),(40,9,5,'80433','$2y$10$BMwJTgZZD55tsnLAJJbKuu9QYsBzbohs3Y8j56mhfxwMsAZ8Ad4jC','RIZKY BAYU PUTRANTO'),(41,4,5,'81299','$2y$10$BMwJTgZZD55tsnLAJJbKuu9QYsBzbohs3Y8j56mhfxwMsAZ8Ad4jC','SAFIRA BANI QURROTA AINI'),(42,10,5,'81300','$2y$10$BMwJTgZZD55tsnLAJJbKuu9QYsBzbohs3Y8j56mhfxwMsAZ8Ad4jC','BENNY SETYAWAN'),(43,6,5,'81737','$2y$10$BMwJTgZZD55tsnLAJJbKuu9QYsBzbohs3Y8j56mhfxwMsAZ8Ad4jC','GALUH SETIOWATI HARSONO'),(44,12,5,'81741','$2y$10$BMwJTgZZD55tsnLAJJbKuu9QYsBzbohs3Y8j56mhfxwMsAZ8Ad4jC','DINA ANDYANI PERTIWI'),(45,4,5,'81745','$2y$10$BMwJTgZZD55tsnLAJJbKuu9QYsBzbohs3Y8j56mhfxwMsAZ8Ad4jC','MAHARANI SONNIA FITRI'),(46,11,5,'81057','$2y$10$BMwJTgZZD55tsnLAJJbKuu9QYsBzbohs3Y8j56mhfxwMsAZ8Ad4jC','JONI WIARTO'),(47,10,5,'81648','$2y$10$BMwJTgZZD55tsnLAJJbKuu9QYsBzbohs3Y8j56mhfxwMsAZ8Ad4jC','TYAS HAYUWATI'),(48,9,5,'80154','$2y$10$BMwJTgZZD55tsnLAJJbKuu9QYsBzbohs3Y8j56mhfxwMsAZ8Ad4jC','DIANA LESTARI'),(49,9,5,'73076','$2y$10$BMwJTgZZD55tsnLAJJbKuu9QYsBzbohs3Y8j56mhfxwMsAZ8Ad4jC','SANTOSO SLAMET'),(50,7,5,'00123','$2y$10$BMwJTgZZD55tsnLAJJbKuu9QYsBzbohs3Y8j56mhfxwMsAZ8Ad4jC','AMELIA YASTI YANITA'),(51,11,5,'00456','$2y$10$BMwJTgZZD55tsnLAJJbKuu9QYsBzbohs3Y8j56mhfxwMsAZ8Ad4jC','HARTIKA AZIS');
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
INSERT INTO `t_trx_lembur` VALUES (1,1,'17:00:00','20:00:00','2020-07-24','2020-07-24 14:14:21','ASDW');
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_unit`
--

LOCK TABLES `t_unit` WRITE;
/*!40000 ALTER TABLE `t_unit` DISABLE KEYS */;
INSERT INTO `t_unit` VALUES (1,'1','GM FND'),(2,'1','MANKO FIN'),(3,'1','MANKO DEV'),(4,'1','AKP'),(5,'1','SLE2'),(6,'1','IKI'),(7,'1','FRM'),(8,'1','SAS'),(9,'1','SLE1'),(10,'1','SAK2'),(11,'1','SAK1'),(12,'1','TAX');
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
INSERT INTO `t_user` VALUES ('5e25291521ebe108868699','Chandra Nala','Budi Satria','Chandra Nala Budi Satria','dev.nalachandra@gmail.com','default.png','$2y$10$60gX9Omwcu9AO4quAEPgQO0giV0moIN2ZjFyVwyaIECS4xwN7vkF6','Y','N','2020-08-03 14:02:10','2020-08-03 11:41:21','0000-00-00 00:00:00','2020-05-27 14:21:19'),('5ee6fa23d172c578363335','Imam','Prasetyo','Imam Prasetyo','awifrm.fnd@gmail.com','default.png','$2y$10$60gX9Omwcu9AO4quAEPgQO0giV0moIN2ZjFyVwyaIECS4xwN7vkF6','Y','Y','2020-06-15 11:35:43','2020-06-15 11:33:40','2020-06-15 11:33:40','2020-06-15 11:33:40');
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
  `id_pegawai` tinyint NOT NULL,
  `nama_pegawai` tinyint NOT NULL,
  `jabatan` tinyint NOT NULL
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
  `id_divisi` tinyint NOT NULL,
  `kode_jabatan` tinyint NOT NULL
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
  `id_pegawai` tinyint NOT NULL,
  `npp` tinyint NOT NULL,
  `nama_pegawai` tinyint NOT NULL,
  `id_unit` tinyint NOT NULL,
  `divisi` tinyint NOT NULL,
  `unit` tinyint NOT NULL,
  `id_divisi` tinyint NOT NULL,
  `jam_mulai` tinyint NOT NULL,
  `jam_selesai` tinyint NOT NULL,
  `tanggal_lembur` tinyint NOT NULL,
  `tanggal_input` tinyint NOT NULL,
  `alasan` tinyint NOT NULL
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
/*!50001 VIEW `vw_absensi_approval` AS select `a`.`id` AS `id`,`b`.`divisi` AS `divisi`,`c`.`npp` AS `npp`,`c`.`id` AS `id_pegawai`,`c`.`nama_pegawai` AS `nama_pegawai`,`d`.`jabatan` AS `jabatan` from (((`t_absensi_approval` `a` join `t_divisi` `b` on((`a`.`id_divisi` = `b`.`id`))) join `t_pegawai` `c` on((`a`.`id_pegawai` = `c`.`id`))) join `t_jabatan` `d` on((`c`.`id_jabatan` = `d`.`id`))) order by `c`.`nama_pegawai`,`b`.`divisi` */;
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
/*!50001 VIEW `vw_pegawai_absensi_approval` AS select `a`.`id` AS `id`,`a`.`npp` AS `npp`,`a`.`nama_pegawai` AS `nama_pegawai`,`b`.`id_divisi` AS `id_divisi`,`d`.`kode_jabatan` AS `kode_jabatan` from (((`t_pegawai` `a` join `t_unit` `b` on((`a`.`id_unit` = `b`.`id`))) join `t_divisi` `c` on((`b`.`id_divisi` = `c`.`id`))) join `t_jabatan` `d` on((`a`.`id_jabatan` = `d`.`id`))) where (`d`.`kode_jabatan` in ('GM','DGM','MANKO')) */;
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
/*!50001 VIEW `vw_trx_lembur_today` AS select `a`.`id` AS `id`,`a`.`id_pegawai` AS `id_pegawai`,`b`.`npp` AS `npp`,`b`.`nama_pegawai` AS `nama_pegawai`,`b`.`id_unit` AS `id_unit`,`d`.`divisi` AS `divisi`,`c`.`unit` AS `unit`,`c`.`id_divisi` AS `id_divisi`,`a`.`jam_mulai` AS `jam_mulai`,`a`.`jam_selesai` AS `jam_selesai`,`a`.`tanggal_trx_lembur` AS `tanggal_lembur`,`a`.`tanggal_trx_input` AS `tanggal_input`,`a`.`alasan_trx_lembur` AS `alasan` from (((`t_trx_lembur` `a` join `t_pegawai` `b` on((`a`.`id_pegawai` = `b`.`id`))) join `t_unit` `c` on((`b`.`id_unit` = `c`.`id`))) join `t_divisi` `d` on((`c`.`id_divisi` = `d`.`id`))) order by `a`.`tanggal_trx_lembur` desc */;
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

-- Dump completed on 2020-08-08 21:43:40
