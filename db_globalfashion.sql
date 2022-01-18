-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table db_globalfashion.data_karyawan
CREATE TABLE IF NOT EXISTS `data_karyawan` (
  `id_karyawan` int(11) NOT NULL AUTO_INCREMENT,
  `nm_karyawan` varchar(50) NOT NULL,
  `usia_karyawan` int(11) NOT NULL,
  `pendidikan` int(11) NOT NULL,
  `pengalaman` int(11) NOT NULL,
  `nilai_test` int(11) NOT NULL,
  `nilai_fuzzy` int(11) NOT NULL,
  PRIMARY KEY (`id_karyawan`),
  CONSTRAINT `FK_data_karyawan_rule_nilai` FOREIGN KEY (`id_karyawan`) REFERENCES `rule_nilai` (`id_karyawan`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

-- Dumping data for table db_globalfashion.data_karyawan: ~16 rows (approximately)
/*!40000 ALTER TABLE `data_karyawan` DISABLE KEYS */;
INSERT INTO `data_karyawan` (`id_karyawan`, `nm_karyawan`, `usia_karyawan`, `pendidikan`, `pengalaman`, `nilai_test`, `nilai_fuzzy`) VALUES
	(11, 'Supadmi', 37, 1, 77, 80, 65),
	(12, 'Giyatmi', 22, 2, 9, 10, 45),
	(13, 'Ajeng Rizkita Pawestri', 20, 2, 1, 25, 40),
	(14, 'Dewi Suryaningsih', 37, 2, 12, 25, 45),
	(15, 'Ika Irawati', 20, 2, 1, 85, 55),
	(16, 'Zulva Khoirima', 21, 2, 3, 90, 60),
	(17, 'Anita Herawati', 33, 2, 36, 85, 70),
	(18, 'Eka Mawarni Ayuningsih', 23, 2, 4, 65, 46),
	(19, 'Ririn Setiani', 24, 2, 10, 70, 64),
	(20, 'Suyatmi', 37, 2, 48, 65, 53),
	(21, 'Anis Mufidah', 22, 2, 4, 87, 62),
	(22, 'Titik Yulianti', 22, 2, 2, 77, 54),
	(23, 'Murni Setyaningsih', 23, 2, 2, 72, 51),
	(24, 'Triningsih', 29, 2, 17, 77, 68),
	(25, 'Siti Rohani', 24, 2, 5, 87, 65),
	(26, 'Adhika Bhisana', 22, 3, 7, 80, 76);
/*!40000 ALTER TABLE `data_karyawan` ENABLE KEYS */;

-- Dumping structure for table db_globalfashion.kriteria
CREATE TABLE IF NOT EXISTS `kriteria` (
  `id_kriteria` int(11) NOT NULL AUTO_INCREMENT,
  `nm_kriteria` varchar(50) NOT NULL,
  `nm_rendah` varchar(50) NOT NULL,
  `nm_sedang` varchar(50) NOT NULL,
  `nm_tinggi` varchar(50) NOT NULL,
  `batas_rendah` int(11) NOT NULL,
  `batas_sedang` int(11) NOT NULL,
  `batas_tinggi` int(11) NOT NULL,
  PRIMARY KEY (`id_kriteria`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table db_globalfashion.kriteria: ~4 rows (approximately)
/*!40000 ALTER TABLE `kriteria` DISABLE KEYS */;
INSERT INTO `kriteria` (`id_kriteria`, `nm_kriteria`, `nm_rendah`, `nm_sedang`, `nm_tinggi`, `batas_rendah`, `batas_sedang`, `batas_tinggi`) VALUES
	(1, 'Usia', 'Muda', 'Dewasa', 'Tua', 20, 25, 30),
	(2, 'Pendidikan', 'SMP', 'SMA/SMK', 'Diploma', 1, 2, 3),
	(3, 'Pengalaman', 'Sedikit', 'Sedang', 'Banyak', 2, 6, 10),
	(4, 'Nilai Test', 'Rendah', 'Sedang', 'Tinggi', 60, 70, 80);
/*!40000 ALTER TABLE `kriteria` ENABLE KEYS */;

-- Dumping structure for table db_globalfashion.nilai_derajat
CREATE TABLE IF NOT EXISTS `nilai_derajat` (
  `id_derajat` int(11) NOT NULL AUTO_INCREMENT,
  `id_karyawan` int(11) DEFAULT NULL,
  `usia_muda` float DEFAULT NULL,
  `usia_dewasa` float DEFAULT NULL,
  `usia_tua` float DEFAULT NULL,
  `pend_smp` float DEFAULT NULL,
  `pend_sma` float DEFAULT NULL,
  `pend_diploma` float DEFAULT NULL,
  `peng_sedikit` float DEFAULT NULL,
  `peng_sedang` float DEFAULT NULL,
  `peng_banyak` float DEFAULT NULL,
  `nilai_rendah` float DEFAULT NULL,
  `nilai_sedang` float DEFAULT NULL,
  `nilai_tinggi` float DEFAULT NULL,
  PRIMARY KEY (`id_derajat`),
  KEY `Index 2` (`id_karyawan`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=latin1;

-- Dumping data for table db_globalfashion.nilai_derajat: ~16 rows (approximately)
/*!40000 ALTER TABLE `nilai_derajat` DISABLE KEYS */;
INSERT INTO `nilai_derajat` (`id_derajat`, `id_karyawan`, `usia_muda`, `usia_dewasa`, `usia_tua`, `pend_smp`, `pend_sma`, `pend_diploma`, `peng_sedikit`, `peng_sedang`, `peng_banyak`, `nilai_rendah`, `nilai_sedang`, `nilai_tinggi`) VALUES
	(53, 12, 0.6, 0.4, 0, 0, 1, 0, 0, 0.25, 0.75, 1, 0, 0),
	(54, 13, 1, 0, 0, 0, 1, 0, 1, 0, 0, 1, 0, 0),
	(55, 14, 0, 0, 1, 0, 1, 0, 0, 0, 1, 1, 0, 0),
	(56, 15, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 1),
	(57, 16, 0.8, 0.2, 0, 0, 1, 0, 0.75, 0.25, 0, 0, 0, 1),
	(58, 17, 0, 0, 1, 0, 1, 0, 0, 0, 1, 0, 0, 1),
	(59, 18, 0.4, 0.6, 0, 0, 1, 0, 0.5, 0.5, 0, 0.5, 0.5, 0),
	(60, 19, 0.2, 0.8, 0, 0, 1, 0, 0, 0, 1, 0, 1, 0),
	(61, 20, 0, 0, 1, 0, 1, 0, 0, 0, 1, 0.5, 0.5, 0),
	(62, 21, 0.6, 0.4, 0, 0, 1, 0, 0.5, 0.5, 0, 0, 0, 1),
	(63, 22, 0.6, 0.4, 0, 0, 1, 0, 1, 0, 0, 0, 0.3, 0.7),
	(64, 23, 0.4, 0.6, 0, 0, 1, 0, 1, 0, 0, 0, 0.8, 0.2),
	(65, 24, 0, 0.2, 0.8, 0, 1, 0, 0, 0, 1, 0, 0.3, 0.7),
	(66, 25, 0.2, 0.8, 0, 0, 1, 0, 0.25, 0.75, 0, 0, 0, 1),
	(67, 11, 0, 0, 1, 1, 0, 0, 0, 0, 1, 0, 0, 1),
	(68, 26, 0.6, 0.4, 0, 0, 0, 1, 0, 0.75, 0.25, 0, 0, 1);
/*!40000 ALTER TABLE `nilai_derajat` ENABLE KEYS */;

-- Dumping structure for table db_globalfashion.rule_fuzzy
CREATE TABLE IF NOT EXISTS `rule_fuzzy` (
  `id_rule_fuzzy` int(11) NOT NULL AUTO_INCREMENT,
  `usia` varchar(50) NOT NULL,
  `pendidikan` varchar(50) NOT NULL,
  `pengalaman` varchar(50) NOT NULL,
  `nilai_test` varchar(50) NOT NULL,
  `hasil` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_rule_fuzzy`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=latin1;

-- Dumping data for table db_globalfashion.rule_fuzzy: ~76 rows (approximately)
/*!40000 ALTER TABLE `rule_fuzzy` DISABLE KEYS */;
INSERT INTO `rule_fuzzy` (`id_rule_fuzzy`, `usia`, `pendidikan`, `pengalaman`, `nilai_test`, `hasil`) VALUES
	(1, 'SMP', 'Muda', 'Sedikit', 'Rendah', 40),
	(2, 'SMP', 'Muda', 'Sedikit', 'Sedang', 40),
	(3, 'SMP', 'Muda', 'Sedikit', 'Tinggi', 50),
	(4, 'SMP', 'Muda', 'Sedang', 'Rendah', 40),
	(5, 'SMP', 'Muda', 'Sedang', 'Sedang', 50),
	(6, 'SMP', 'Muda', 'Sedang', 'Tinggi', 60),
	(7, 'SMP', 'Muda', 'Banyak', 'Rendah', 45),
	(8, 'SMP', 'Muda', 'Banyak', 'Sedang', 55),
	(9, 'SMP', 'Muda', 'Banyak', 'Tinggi', 65),
	(10, 'SMP', 'Dewasa', 'Sedikit', 'Rendah', 40),
	(11, 'SMP', 'Dewasa', 'Sedikit', 'Sedang', 40),
	(12, 'SMP', 'Dewasa', 'Sedikit', 'Tinggi', 50),
	(13, 'SMP', 'Dewasa', 'Sedang', 'Rendah', 40),
	(14, 'SMP', 'Dewasa', 'Sedang', 'Sedang', 50),
	(15, 'SMP', 'Dewasa', 'Sedang', 'Tinggi', 60),
	(16, 'SMP', 'Dewasa', 'Banyak', 'Rendah', 45),
	(17, 'SMP', 'Dewasa', 'Banyak', 'Sedang', 55),
	(18, 'SMP', 'Dewasa', 'Banyak', 'Tinggi', 65),
	(19, 'SMP', 'Tua', 'Sedikit', 'Rendah', 40),
	(20, 'SMP', 'Tua', 'Sedikit', 'Sedang', 40),
	(21, 'SMP', 'Tua', 'Sedikit', 'Tinggi', 50),
	(22, 'SMP', 'Tua', 'Sedang', 'Rendah', 40),
	(23, 'SMP', 'Tua', 'Sedang', 'Sedang', 50),
	(24, 'SMP', 'Tua', 'Sedang', 'Tinggi', 60),
	(25, 'SMP', 'Tua', 'Banyak', 'Rendah', 45),
	(26, 'SMP', 'Tua', 'Banyak', 'Sedang', 55),
	(27, 'SMP', 'Tua', 'Banyak', 'Tinggi', 65),
	(28, 'SMA', 'Muda', 'Sedikit', 'Rendah', 40),
	(29, 'SMA', 'Muda', 'Sedikit', 'Sedang', 45),
	(30, 'SMA', 'Muda', 'Sedikit', 'Tinggi', 55),
	(31, 'SMA', 'Muda', 'Sedang', 'Rendah', 40),
	(32, 'SMA', 'Muda', 'Sedang', 'Sedang', 55),
	(33, 'SMA', 'Muda', 'Sedang', 'Tinggi', 65),
	(34, 'SMA', 'Muda', 'Banyak', 'Rendah', 45),
	(35, 'SMA', 'Muda', 'Banyak', 'Sedang', 60),
	(36, 'SMA', 'Muda', 'Banyak', 'Tinggi', 70),
	(37, 'SMA', 'Dewasa', 'Sedikit', 'Rendah', 40),
	(38, 'SMA', 'Dewasa', 'Sedikit', 'Sedang', 50),
	(39, 'SMA', 'Dewasa', 'Sedikit', 'Tinggi', 60),
	(40, 'SMA', 'Dewasa', 'Sedang', 'Rendah', 40),
	(41, 'SMA', 'Dewasa', 'Sedang', 'Sedang', 60),
	(42, 'SMA', 'Dewasa', 'Sedang', 'Tinggi', 70),
	(43, 'SMA', 'Dewasa', 'Banyak', 'Rendah', 50),
	(44, 'SMA', 'Dewasa', 'Banyak', 'Sedang', 65),
	(45, 'SMA', 'Dewasa', 'Banyak', 'Tinggi', 75),
	(46, 'SMA', 'Tua', 'Sedikit', 'Rendah', 40),
	(47, 'SMA', 'Tua', 'Sedikit', 'Sedang', 45),
	(48, 'SMA', 'Tua', 'Sedikit', 'Tinggi', 55),
	(49, 'SMA', 'Tua', 'Sedang', 'Rendah', 40),
	(50, 'SMA', 'Tua', 'Sedang', 'Sedang', 55),
	(51, 'SMA', 'Tua', 'Sedang', 'Tinggi', 65),
	(52, 'SMA', 'Tua', 'Banyak', 'Rendah', 45),
	(53, 'SMA', 'Tua', 'Banyak', 'Sedang', 60),
	(54, 'SMA', 'Tua', 'Banyak', 'Tinggi', 70),
	(55, 'Diploma', 'Muda', 'Sedikit', 'Rendah', 45),
	(56, 'Diploma', 'Muda', 'Sedikit', 'Sedang', 50),
	(57, 'Diploma', 'Muda', 'Sedikit', 'Tinggi', 60),
	(58, 'Diploma', 'Muda', 'Sedang', 'Rendah', 45),
	(59, 'Diploma', 'Muda', 'Sedang', 'Sedang', 60),
	(60, 'Diploma', 'Muda', 'Sedang', 'Tinggi', 70),
	(61, 'Diploma', 'Muda', 'Banyak', 'Rendah', 50),
	(62, 'Diploma', 'Muda', 'Banyak', 'Sedang', 65),
	(63, 'Diploma', 'Muda', 'Banyak', 'Tinggi', 75),
	(64, 'Diploma', 'Dewasa', 'Sedikit', 'Rendah', 50),
	(65, 'Diploma', 'Dewasa', 'Sedikit', 'Sedang', 60),
	(66, 'Diploma', 'Dewasa', 'Sedikit', 'Tinggi', 70),
	(67, 'Diploma', 'Dewasa', 'Sedang', 'Rendah', 60),
	(68, 'Diploma', 'Dewasa', 'Sedang', 'Sedang', 70),
	(69, 'Diploma', 'Dewasa', 'Sedang', 'Tinggi', 80),
	(70, 'Diploma', 'Dewasa', 'Banyak', 'Rendah', 70),
	(71, 'Diploma', 'Dewasa', 'Banyak', 'Sedang', 80),
	(72, 'Diploma', 'Dewasa', 'Banyak', 'Tinggi', 90),
	(73, 'Diploma', 'Tua', 'Sedikit', 'Rendah', 50),
	(74, 'Diploma', 'Tua', 'Sedikit', 'Sedang', 55),
	(75, 'Diploma', 'Tua', 'Sedikit', 'Tinggi', 65),
	(76, 'Diploma', 'Tua', 'Sedang', 'Rendah', 50),
	(77, 'Diploma', 'Tua', 'Sedang', 'Sedang', 65),
	(78, 'Diploma', 'Tua', 'Sedang', 'Tinggi', 75),
	(79, 'Diploma', 'Tua', 'Banyak', 'Rendah', 55),
	(80, 'Diploma', 'Tua', 'Banyak', 'Sedang', 70),
	(81, 'Diploma', 'Tua', 'Banyak', 'Tinggi', 80);
/*!40000 ALTER TABLE `rule_fuzzy` ENABLE KEYS */;

-- Dumping structure for table db_globalfashion.rule_nilai
CREATE TABLE IF NOT EXISTS `rule_nilai` (
  `id_rule` int(11) NOT NULL AUTO_INCREMENT,
  `id_karyawan` int(11) DEFAULT NULL,
  `id_kriteria` int(11) DEFAULT NULL,
  `id_rule_fuzzy` int(11) DEFAULT NULL,
  `rule1` float DEFAULT NULL,
  `rule2` float DEFAULT NULL,
  `rule3` float DEFAULT NULL,
  `rule4` float DEFAULT NULL,
  `rule5` float DEFAULT NULL,
  `rule6` float DEFAULT NULL,
  `rule7` float DEFAULT NULL,
  `rule8` float DEFAULT NULL,
  `rule9` float DEFAULT NULL,
  `rule10` float DEFAULT NULL,
  `rule11` float DEFAULT NULL,
  `rule12` float DEFAULT NULL,
  `rule13` float DEFAULT NULL,
  `rule14` float DEFAULT NULL,
  `rule15` float DEFAULT NULL,
  `rule16` float DEFAULT NULL,
  `rule17` float DEFAULT NULL,
  `rule18` float DEFAULT NULL,
  `rule19` float DEFAULT NULL,
  `rule20` float DEFAULT NULL,
  `rule21` float DEFAULT NULL,
  `rule22` float DEFAULT NULL,
  `rule23` float DEFAULT NULL,
  `rule24` float DEFAULT NULL,
  `rule25` float DEFAULT NULL,
  `rule26` float DEFAULT NULL,
  `rule27` float DEFAULT NULL,
  `rule28` float DEFAULT NULL,
  `rule29` float DEFAULT NULL,
  `rule30` float DEFAULT NULL,
  `rule31` float DEFAULT NULL,
  `rule32` float DEFAULT NULL,
  `rule33` float DEFAULT NULL,
  `rule34` float DEFAULT NULL,
  `rule35` float DEFAULT NULL,
  `rule36` float DEFAULT NULL,
  `rule37` float DEFAULT NULL,
  `rule38` float DEFAULT NULL,
  `rule39` float DEFAULT NULL,
  `rule40` float DEFAULT NULL,
  `rule41` float DEFAULT NULL,
  `rule42` float DEFAULT NULL,
  `rule43` float DEFAULT NULL,
  `rule44` float DEFAULT NULL,
  `rule45` float DEFAULT NULL,
  `rule46` float DEFAULT NULL,
  `rule47` float DEFAULT NULL,
  `rule48` float DEFAULT NULL,
  `rule49` float DEFAULT NULL,
  `rule50` float DEFAULT NULL,
  `rule51` float DEFAULT NULL,
  `rule52` float DEFAULT NULL,
  `rule53` float DEFAULT NULL,
  `rule54` float DEFAULT NULL,
  `rule55` float DEFAULT NULL,
  `rule56` float DEFAULT NULL,
  `rule57` float DEFAULT NULL,
  `rule58` float DEFAULT NULL,
  `rule59` float DEFAULT NULL,
  `rule60` float DEFAULT NULL,
  `rule61` float DEFAULT NULL,
  `rule62` float DEFAULT NULL,
  `rule63` float DEFAULT NULL,
  `rule64` float DEFAULT NULL,
  `rule65` float DEFAULT NULL,
  `rule66` float DEFAULT NULL,
  `rule67` float DEFAULT NULL,
  `rule68` float DEFAULT NULL,
  `rule69` float DEFAULT NULL,
  `rule70` float DEFAULT NULL,
  `rule71` float DEFAULT NULL,
  `rule72` float DEFAULT NULL,
  `rule73` float DEFAULT NULL,
  `rule74` float DEFAULT NULL,
  `rule75` float DEFAULT NULL,
  `rule76` float DEFAULT NULL,
  `rule77` float DEFAULT NULL,
  `rule78` float DEFAULT NULL,
  `rule79` float DEFAULT NULL,
  `rule80` float DEFAULT NULL,
  `rule81` float DEFAULT NULL,
  PRIMARY KEY (`id_rule`),
  KEY `Index 2` (`id_karyawan`,`id_kriteria`,`id_rule_fuzzy`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

-- Dumping data for table db_globalfashion.rule_nilai: ~16 rows (approximately)
/*!40000 ALTER TABLE `rule_nilai` DISABLE KEYS */;
INSERT INTO `rule_nilai` (`id_rule`, `id_karyawan`, `id_kriteria`, `id_rule_fuzzy`, `rule1`, `rule2`, `rule3`, `rule4`, `rule5`, `rule6`, `rule7`, `rule8`, `rule9`, `rule10`, `rule11`, `rule12`, `rule13`, `rule14`, `rule15`, `rule16`, `rule17`, `rule18`, `rule19`, `rule20`, `rule21`, `rule22`, `rule23`, `rule24`, `rule25`, `rule26`, `rule27`, `rule28`, `rule29`, `rule30`, `rule31`, `rule32`, `rule33`, `rule34`, `rule35`, `rule36`, `rule37`, `rule38`, `rule39`, `rule40`, `rule41`, `rule42`, `rule43`, `rule44`, `rule45`, `rule46`, `rule47`, `rule48`, `rule49`, `rule50`, `rule51`, `rule52`, `rule53`, `rule54`, `rule55`, `rule56`, `rule57`, `rule58`, `rule59`, `rule60`, `rule61`, `rule62`, `rule63`, `rule64`, `rule65`, `rule66`, `rule67`, `rule68`, `rule69`, `rule70`, `rule71`, `rule72`, `rule73`, `rule74`, `rule75`, `rule76`, `rule77`, `rule78`, `rule79`, `rule80`, `rule81`) VALUES
	(33, 12, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.25, 0, NULL, 0.6, 0, 0, 0, 0, 0, 0.25, 0, 0, 0.4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
	(34, 13, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
	(35, 14, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
	(36, 15, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
	(37, 16, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.75, 0, 0, 0.25, 0, 0, 0, 0, 0, 0.2, 0, 0, 0.2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
	(38, 17, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
	(39, 18, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.4, 0.4, 0, 0.4, 0.4, NULL, 0, 0, 0, 0.5, 0.5, 0, 0.5, 0.5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
	(40, 19, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.2, 0, 0, 0, 0, 0, 0, 0, 0, 0.8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
	(41, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.5, 0.5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
	(42, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.5, 0, 0, 0.5, 0, 0, 0, 0, 0, 0.4, 0, 0, 0.4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
	(43, 22, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.3, 0.6, 0, 0, 0, 0, 0, 0, 0, 0, 0.4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
	(44, 23, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.4, 0.2, 0, 0, 0, 0, 0, 0, 0, 0, 0.2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
	(45, 24, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.2, 0.2, 0, 0, 0, 0, 0, 0, 0, 0.3, 0.7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
	(46, 25, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.2, 0, 0, 0.2, 0, 0, 0, 0, 0, 0.25, 0, 0, 0.75, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
	(47, 11, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
	(48, 26, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.6, 0, 0, 0.25, 0, 0, 0, 0, 0, 0, 0, 0, 0.25, 0, 0, 0, 0, 0, 0, 0, 0, 0);
/*!40000 ALTER TABLE `rule_nilai` ENABLE KEYS */;

-- Dumping structure for table db_globalfashion.user_login
CREATE TABLE IF NOT EXISTS `user_login` (
  `id_login` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id_login`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_globalfashion.user_login: ~1 rows (approximately)
/*!40000 ALTER TABLE `user_login` DISABLE KEYS */;
INSERT INTO `user_login` (`id_login`, `nama`, `username`, `password`) VALUES
	(1, 'Dhika', 'admin', 'admin');
/*!40000 ALTER TABLE `user_login` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
