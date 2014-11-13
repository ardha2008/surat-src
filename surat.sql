# Host: localhost  (Version: 5.6.16)
# Date: 2014-11-11 15:38:44
# Generator: MySQL-Front 5.3  (Build 4.100)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "bagian"
#

DROP TABLE IF EXISTS `bagian`;
CREATE TABLE `bagian` (
  `idbagian` int(11) NOT NULL AUTO_INCREMENT,
  `keterangan` varchar(255) DEFAULT NULL,
  `deleted` varchar(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idbagian`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

#
# Data for table "bagian"
#

INSERT INTO `bagian` VALUES (1,'Biro','0'),(2,'Kepala Biro','0'),(3,'Staff','0');

#
# Structure for table "berkas"
#

DROP TABLE IF EXISTS `berkas`;
CREATE TABLE `berkas` (
  `idberkas` int(11) NOT NULL AUTO_INCREMENT,
  `idsurat` varchar(255) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idberkas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "berkas"
#


#
# Structure for table "login_logs"
#

DROP TABLE IF EXISTS `login_logs`;
CREATE TABLE `login_logs` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `idusers` varchar(255) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

#
# Data for table "login_logs"
#

INSERT INTO `login_logs` VALUES (1,'1134010049','2014-11-09 14:54:38');

#
# Structure for table "pegawai"
#

DROP TABLE IF EXISTS `pegawai`;
CREATE TABLE `pegawai` (
  `idpegawai` varchar(30) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `alamat` varchar(45) DEFAULT NULL,
  `kota` varchar(255) DEFAULT NULL,
  `tanggal_lahir` varchar(255) DEFAULT NULL,
  `telepon` varchar(255) DEFAULT NULL,
  `ponsel` varchar(45) DEFAULT NULL,
  `foto` varchar(255) NOT NULL DEFAULT 'nophoto.jpg',
  `delete` varchar(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idpegawai`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "pegawai"
#

INSERT INTO `pegawai` VALUES ('1134010049','Ardi Pratama','Surabaya','Surabaya','02/09/1993','09810280128','8923893824','iljvtgnutptoqvd.jpeg','0','2014-11-09 16:09:14'),('1134010050','Budi Purnomo','','','02/09/1993','','','nophoto.jpg','0','2014-11-09 15:58:00');

#
# Structure for table "surat"
#

DROP TABLE IF EXISTS `surat`;
CREATE TABLE `surat` (
  `idsurat` varchar(30) NOT NULL DEFAULT '' COMMENT 'NO SURAT',
  `jenis_surat` varchar(10) DEFAULT NULL COMMENT 'Masuk / Keluar',
  `tanggal_surat` varchar(255) DEFAULT NULL COMMENT 'Tanggal yang tertera pada surat',
  `perihal` text,
  `catatan` varchar(255) DEFAULT NULL COMMENT 'Sebagai catatan tambahan untuk memperjelas surat',
  `asal_surat` varchar(45) DEFAULT NULL COMMENT 'asal surat, bisa dari instansi internal atau eksternal',
  `disposisi` varchar(255) DEFAULT NULL COMMENT 'Disposisi surat',
  `kata_kunci` varchar(255) DEFAULT NULL COMMENT 'Kata kunci yang berhubungan dengan surat',
  `delete` varchar(1) DEFAULT '0' COMMENT 'DELETE = status data terdelet, 1 adalah file delete, 2 tidak delete',
  `posting` varchar(255) DEFAULT NULL COMMENT 'Di posting oleh idusers',
  `public` varchar(1) DEFAULT '0' COMMENT 'status, 1=publikasi, 0=private',
  `lampiran` varchar(255) DEFAULT NULL COMMENT 'Lampiran berupa gambar, gambar surat',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'tanggal surat di insert/ update oleh sistem',
  PRIMARY KEY (`idsurat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "surat"
#

INSERT INTO `surat` VALUES ('100/188/98/UND/99','keluar','02/09/1992','Surat pengajuan Akte Lahir 2','Ini surat tembusan dari Departemen Tetangga','Kermawa','Badan LPPP','surat,undangan,tembusan,900','0','Ardha Herdiantoooo','0','nophoto.jpg','2014-11-09 14:06:48'),('110/KERMA/001/0001','masuk','09/11/1111','Pendirian UKM Software Enginer3','Wow','','','','0','Ardha Herdiantoooo','1',NULL,'2014-11-09 14:35:34'),('19/UUP/991','masuk','02/09/1882','Surat Pengajuan Beasiswa','Pengajuan beasiswa\r\n','Rektorat','','','0','Ardha Herdiantoooo','1','nophoto.jpg','2014-11-09 14:12:46'),('900/UND/440','keluar','09/09/1993','Undangan Rapat','','','','surat,undangan,kementrian','0','Ardha Herdiantoooo','0','hedcqjyhuvvuzgc.jpeg','2014-11-09 13:10:01');

#
# Structure for table "users"
#

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `idusers` varchar(30) NOT NULL DEFAULT '',
  `password` varchar(255) DEFAULT NULL,
  `idbagian` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idusers`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "users"
#

INSERT INTO `users` VALUES ('1134010049','abmjehaboqit6','3'),('1134010050','abeJJLxmZI5Aw','2');
