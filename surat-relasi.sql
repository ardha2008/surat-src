# Host: localhost  (Version: 5.6.16)
# Date: 2014-12-31 08:38:47
# Generator: MySQL-Front 5.3  (Build 4.100)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "asal"
#

DROP TABLE IF EXISTS `asal`;
CREATE TABLE `asal` (
  `idasal` int(11) NOT NULL AUTO_INCREMENT,
  `idsurat` varchar(30) DEFAULT NULL,
  `nama_asal` varchar(30) DEFAULT NULL,
  `alamat_asal` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idasal`),
  KEY `FK_ASAL_idx` (`idsurat`)
) ENGINE=MyISAM AUTO_INCREMENT=6601 DEFAULT CHARSET=latin1;

#
# Data for table "asal"
#

/*!40000 ALTER TABLE `asal` DISABLE KEYS */;
INSERT INTO `asal` VALUES (6601,'Ardha/001','ITS','Semolowaru');
/*!40000 ALTER TABLE `asal` ENABLE KEYS */;

#
# Structure for table "bagian"
#

DROP TABLE IF EXISTS `bagian`;
CREATE TABLE `bagian` (
  `idbagian` int(11) NOT NULL AUTO_INCREMENT,
  `keterangan` varchar(255) DEFAULT NULL,
  `deleted` varchar(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idbagian`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

#
# Data for table "bagian"
#

/*!40000 ALTER TABLE `bagian` DISABLE KEYS */;
INSERT INTO `bagian` VALUES (0,'Staf Surat Keluar','0'),(1,'Staf Surat Masuk','0'),(2,'Kepala Staff','0'),(3,'Admin','0');
/*!40000 ALTER TABLE `bagian` ENABLE KEYS */;

#
# Structure for table "berkas"
#

DROP TABLE IF EXISTS `berkas`;
CREATE TABLE `berkas` (
  `idberkas` int(11) NOT NULL AUTO_INCREMENT,
  `gambar` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idberkas`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

#
# Data for table "berkas"
#

/*!40000 ALTER TABLE `berkas` DISABLE KEYS */;
/*!40000 ALTER TABLE `berkas` ENABLE KEYS */;

#
# Structure for table "berkas_surat"
#

DROP TABLE IF EXISTS `berkas_surat`;
CREATE TABLE `berkas_surat` (
  `idsurat` varchar(30) NOT NULL DEFAULT '' COMMENT 'NO SURAT',
  `idberkas` int(11) NOT NULL,
  PRIMARY KEY (`idsurat`,`idberkas`),
  KEY `FK_BERKAS_SURAT` (`idberkas`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

#
# Data for table "berkas_surat"
#

/*!40000 ALTER TABLE `berkas_surat` DISABLE KEYS */;
/*!40000 ALTER TABLE `berkas_surat` ENABLE KEYS */;

#
# Structure for table "kategori"
#

DROP TABLE IF EXISTS `kategori`;
CREATE TABLE `kategori` (
  `idkategori` varchar(11) NOT NULL DEFAULT '',
  `keterangan_kategori` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idkategori`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

#
# Data for table "kategori"
#

/*!40000 ALTER TABLE `kategori` DISABLE KEYS */;
INSERT INTO `kategori` VALUES ('B','Surat Biasa'),('PENG','Surat Pengumuman'),('SKEP','Surat Keputusan'),('SPENG','Surat Pengantar'),('SPRINT','Surat Perintah'),('ST','Surat Tugas'),('UND','Surat Undangan');
/*!40000 ALTER TABLE `kategori` ENABLE KEYS */;

#
# Structure for table "logs"
#

DROP TABLE IF EXISTS `logs`;
CREATE TABLE `logs` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `idusers` varchar(255) DEFAULT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `aksi` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;

#
# Data for table "logs"
#

/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
INSERT INTO `logs` VALUES (1,'','2014-12-09 22:08:50',NULL),(2,'1134010049','2014-12-09 22:17:56',NULL),(3,'1134010050','2014-12-09 22:47:07','login'),(4,'1134010051','2014-12-09 23:59:37','login'),(5,'1134010051','2014-12-10 00:38:17','Input surat 001/Biasa/KERMA/2014'),(6,'1134010051','2014-12-10 00:43:09','Input surat B/1010101'),(7,'1134010051','2014-12-10 02:13:08','login'),(8,'1134010051','2014-12-10 02:17:35','Mengubah surat 110110110'),(9,'1134010050','2014-12-10 02:27:36','login'),(10,'1134010051','2014-12-10 02:28:01','login'),(11,'1134010051','2014-12-10 02:29:42','Mengubah surat 11011011'),(12,'1134010051','2014-12-10 02:30:07','Mengubah surat 11011011'),(13,'1134010051','2014-12-10 02:36:45','login'),(14,'1134010050','2014-12-10 02:39:42','login'),(15,'1134010050','2014-12-10 03:23:34','menambahkan pegawai'),(16,'1134010050','2014-12-10 03:27:22','menambahkan pegawai'),(17,'1134010050','2014-12-10 03:28:20','menambahkan pegawai'),(18,'1134010052','2014-12-10 03:28:48','login'),(19,'1134010051','2014-12-10 12:12:37','login'),(20,'1134010051','2014-12-10 12:13:07','Mengubah surat 11011011'),(21,'1134010051','2014-12-10 12:13:15','Mengubah surat 11011011'),(22,'1134010050','2014-12-10 12:13:38','login'),(23,'1134010052','2014-12-10 12:14:06','login'),(24,'1134010052','2014-12-10 12:14:39','Input surat KEL/110/2014'),(25,'1134010052','2014-12-10 12:16:31','Mengubah surat KEL/110/2014'),(26,'1134010052','2014-12-10 12:21:43','Mengubah surat KEL/110/2014'),(27,'1134010052','2014-12-10 12:23:33','Input surat Surat Masuk'),(28,'1134010052','2014-12-10 12:39:21','Mengubah surat Surat Masuk'),(29,'1134010052','2014-12-10 12:39:29','Mengubah surat Surat Masuk'),(30,'1134010049','2014-12-10 12:41:08','login'),(31,'1134010050','2014-12-10 23:09:13','login'),(32,'1134010049','2014-12-11 20:55:44','login'),(33,'1134010050','2014-12-11 20:55:58','login'),(34,'1134010050','2014-12-13 01:03:36','login'),(35,'1134010049','2014-12-13 09:49:22','login'),(36,'1134010051','2014-12-13 14:13:53','login'),(37,'1134010051','2014-12-13 15:45:47','Input surat 1923812038'),(38,'1134010049','2014-12-17 02:29:50','login'),(39,'1134010051','2014-12-17 21:35:43','login'),(40,'1134010050','2014-12-17 22:40:19','login'),(41,'1134010049','2014-12-22 14:28:39','login'),(42,'1134010049','2014-12-23 10:49:17','login'),(43,'1134010049','2014-12-28 23:28:00','login'),(44,'1134010050','2014-12-28 23:28:18','login'),(45,'1134010049','2014-12-29 05:09:05','login'),(46,'1134010049','2014-12-29 05:27:33','login'),(47,'1134010051','2014-12-30 06:58:30','login'),(48,'1134010052','2014-12-30 07:05:28','login'),(49,'1134010050','2014-12-30 07:16:25','login'),(50,'1134010051','2014-12-30 08:06:04','login'),(51,'1134010051','2014-12-31 07:16:10','login'),(52,'1134010051','2014-12-31 07:22:01','login'),(53,'1134010052','2014-12-31 07:23:07','login'),(54,'1134010051','2014-12-31 07:23:53','login'),(55,'1134010052','2014-12-31 07:24:45','login'),(56,'1134010051','2014-12-31 07:26:32','login'),(57,'1134010051','2014-12-31 07:57:57','Input surat Ardha/001/001/2015'),(58,'1134010051','2014-12-31 08:14:52','Input surat Ardha/001'),(59,'1134010051','2014-12-31 08:30:01','Mengubah surat Ardha/001'),(60,'1134010051','2014-12-31 08:31:02','Mengubah surat Ardha/001');
/*!40000 ALTER TABLE `logs` ENABLE KEYS */;

#
# Structure for table "pegawai"
#

DROP TABLE IF EXISTS `pegawai`;
CREATE TABLE `pegawai` (
  `idpegawai` varchar(30) NOT NULL,
  `idbagian` int(11) DEFAULT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `alamat` varchar(45) DEFAULT NULL,
  `kota` varchar(255) DEFAULT NULL,
  `tanggal_lahir` varchar(255) DEFAULT NULL,
  `telepon` varchar(255) DEFAULT NULL,
  `ponsel` varchar(45) DEFAULT NULL,
  `foto` varchar(255) NOT NULL DEFAULT 'nophoto.jpg',
  `deleted` varchar(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idpegawai`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

#
# Data for table "pegawai"
#

/*!40000 ALTER TABLE `pegawai` DISABLE KEYS */;
INSERT INTO `pegawai` VALUES ('1134010049',3,'Ardha Herdianto','Pucang Anom 6/40 ','Surabaya','02-09-1993','0315041653','089677052285','mgiadnsxpowdeuv.jpeg','0','2014-12-09 22:08:37','abmjehaboqit6'),('1134010050',2,'Budi Heru Toro','Perumahan Griyaloka A3/40','Sidoarjo',NULL,'03188888','081111111','no_photo.jpeg','0','2014-12-09 22:46:58','abmjehaboqit6'),('1134010051',0,'Ismail Wahyudi','Karang Ploso','Jakarta','19-02-1970','031381823','081312313','nophoto.jpg','0','2014-12-09 23:59:26','abmjehaboqit6'),('1134010052',1,'Zainal Abidin','Karamenjangan 45','Surabaya','19-02-1970','03100000','089677055228','nophoto.jpg','0','2014-12-10 03:28:20','abWMpd9uBwR.g');
/*!40000 ALTER TABLE `pegawai` ENABLE KEYS */;

#
# Structure for table "posting"
#

DROP TABLE IF EXISTS `posting`;
CREATE TABLE `posting` (
  `idpegawai` varchar(30) NOT NULL,
  `idsurat` varchar(30) NOT NULL DEFAULT '' COMMENT 'NO SURAT',
  PRIMARY KEY (`idpegawai`,`idsurat`),
  KEY `FKSURAT_PEGAWAI_idx` (`idsurat`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

#
# Data for table "posting"
#

/*!40000 ALTER TABLE `posting` DISABLE KEYS */;
INSERT INTO `posting` VALUES ('1134010051','Ardha/001');
/*!40000 ALTER TABLE `posting` ENABLE KEYS */;

#
# Structure for table "surat"
#

DROP TABLE IF EXISTS `surat`;
CREATE TABLE `surat` (
  `idsurat` varchar(30) NOT NULL DEFAULT '' COMMENT 'NO SURAT',
  `idkategori` varchar(11) DEFAULT '',
  `jenis_surat` varchar(10) DEFAULT NULL COMMENT 'Masuk / Keluar',
  `tanggal_surat` date DEFAULT NULL COMMENT 'Tanggal yang tertera pada surat',
  `perihal` text,
  `disposisi` varchar(255) DEFAULT NULL COMMENT 'Disposisi surat',
  `catatan` varchar(255) DEFAULT NULL COMMENT 'Kata kunci yang berhubungan dengan surat',
  `deleted` varchar(1) DEFAULT '0' COMMENT 'DELETE = status data terdelet, 1 adalah file delete, 0 tidak delete',
  `publikasi` varchar(1) DEFAULT '0' COMMENT 'status, 1=publikasi, 0=private',
  `lampiran` varchar(255) DEFAULT 'no_lampiran.jpeg' COMMENT 'Lampiran berupa gambar, gambar surat',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'tanggal surat di insert/ update oleh sistem',
  PRIMARY KEY (`idsurat`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

#
# Data for table "surat"
#

/*!40000 ALTER TABLE `surat` DISABLE KEYS */;
INSERT INTO `surat` VALUES ('Ardha/001','UND','keluar','2014-12-09','Surat Kelulusan','Bapak bagian','','0','0','xqlixyljhkkctki.jpeg','2014-12-31 08:14:52');
/*!40000 ALTER TABLE `surat` ENABLE KEYS */;

#
# Structure for table "tujuan"
#

DROP TABLE IF EXISTS `tujuan`;
CREATE TABLE `tujuan` (
  `idtujuan` int(11) NOT NULL AUTO_INCREMENT,
  `idsurat` varchar(30) DEFAULT NULL,
  `nama_tujuan` varchar(30) DEFAULT NULL,
  `alamat_tujuan` text,
  PRIMARY KEY (`idtujuan`),
  KEY `FKTUJUAN_idx` (`idsurat`)
) ENGINE=MyISAM AUTO_INCREMENT=8800 DEFAULT CHARSET=latin1;

#
# Data for table "tujuan"
#

/*!40000 ALTER TABLE `tujuan` DISABLE KEYS */;
INSERT INTO `tujuan` VALUES (8802,'Ardha/001','DEKAN FTI','BUDI');
/*!40000 ALTER TABLE `tujuan` ENABLE KEYS */;
