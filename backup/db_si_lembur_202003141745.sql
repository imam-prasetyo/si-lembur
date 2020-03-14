-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.11-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             10.3.0.5771
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for db_si_lembur
CREATE DATABASE IF NOT EXISTS `db_si_lembur` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `db_si_lembur`;

-- Dumping structure for table db_si_lembur.config
CREATE TABLE IF NOT EXISTS `config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `value` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table db_si_lembur.config: ~1 rows (approximately)
/*!40000 ALTER TABLE `config` DISABLE KEYS */;
INSERT INTO `config` (`id`, `name`, `value`, `description`, `date_created`, `date_updated`) VALUES
	(1, 'jam_mulai', '17:30', 'Jam mulai lembur', '2020-03-14 16:55:44', '2020-03-14 16:55:44');
/*!40000 ALTER TABLE `config` ENABLE KEYS */;

-- Dumping structure for table db_si_lembur.pegawai
CREATE TABLE IF NOT EXISTS `pegawai` (
  `id_pegawai` int(11) NOT NULL AUTO_INCREMENT,
  `npp` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `nama_pegawai` varchar(50) NOT NULL,
  PRIMARY KEY (`id_pegawai`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_si_lembur.pegawai: ~1 rows (approximately)
/*!40000 ALTER TABLE `pegawai` DISABLE KEYS */;
INSERT INTO `pegawai` (`id_pegawai`, `npp`, `id_unit`, `nama_pegawai`) VALUES
	(1, 81772, 1, 'Chandra Nala Budi Satria'),
	(2, 80086, 1, 'Imam Prasetyo');
/*!40000 ALTER TABLE `pegawai` ENABLE KEYS */;

-- Dumping structure for table db_si_lembur.trx_lembur
CREATE TABLE IF NOT EXISTS `trx_lembur` (
  `id_trx_lembur` int(11) NOT NULL AUTO_INCREMENT,
  `id_pegawai` int(11) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `tanggal_trx_lembur` date NOT NULL,
  `alasan_trx_lembur` varchar(100) NOT NULL,
  PRIMARY KEY (`id_trx_lembur`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_si_lembur.trx_lembur: ~0 rows (approximately)
/*!40000 ALTER TABLE `trx_lembur` DISABLE KEYS */;
INSERT INTO `trx_lembur` (`id_trx_lembur`, `id_pegawai`, `jam_mulai`, `jam_selesai`, `tanggal_trx_lembur`, `alasan_trx_lembur`) VALUES
	(1, 2, '17:30:00', '18:30:00', '2020-03-14', '12312312');
/*!40000 ALTER TABLE `trx_lembur` ENABLE KEYS */;

-- Dumping structure for table db_si_lembur.unit
CREATE TABLE IF NOT EXISTS `unit` (
  `id_unit` int(11) NOT NULL AUTO_INCREMENT,
  `unit` varchar(50) NOT NULL,
  PRIMARY KEY (`id_unit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_si_lembur.unit: ~0 rows (approximately)
/*!40000 ALTER TABLE `unit` DISABLE KEYS */;
/*!40000 ALTER TABLE `unit` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
