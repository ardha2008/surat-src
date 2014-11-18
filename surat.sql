# Host: localhost  (Version: 5.6.16)
# Date: 2014-11-16 10:44:17
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

INSERT INTO `bagian` VALUES (1,'Staff','0'),(2,'Kepala Staff','0'),(3,'Admin','0');

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
  `tanggal_surat` date DEFAULT NULL COMMENT 'Tanggal yang tertera pada surat',
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

INSERT INTO `surat` VALUES ('100/188/98/UND/99','keluar','0000-00-00','Surat pengajuan Akte Lahir 2','Ini surat tembusan dari Departemen Tetangga','Kermawa','Badan LPPP','surat,undangan,tembusan,900','0','Ardha Herdiantoooo','0','nophoto.jpg','2014-11-09 14:06:48'),('110/KERMA/001/0001','masuk','0000-00-00','Pendirian UKM Software Enginer3','Wow','','','','0','Ardha Herdiantoooo','1',NULL,'2014-11-09 14:35:34'),('19/UUP/991','masuk','0000-00-00','Surat Pengajuan Beasiswa','Pengajuan beasiswa\r\n','Rektorat','','','0','Ardha Herdiantoooo','1','nophoto.jpg','2014-11-09 14:12:46'),('900/UND/440','keluar','0000-00-00','Undangan Rapat','','','','surat,undangan,kementrian','0','Ardha Herdiantoooo','0','hedcqjyhuvvuzgc.jpeg','2014-11-09 13:10:01'),('PENG/108/REKTORAT/6/2014/54639','masuk','2013-10-21','Surat Pengantar Dosen-2007',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-13 00:51:12'),('PENG/124/KERMAW/4/2014/5463ec6','keluar','2013-10-17','Surat permohonan santri-2011',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-13 06:25:27'),('PENG/131/REKTORAT/3/2014/54639','keluar','2011-03-22','Surat Penjagan event-2000',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-13 00:51:12'),('PENG/146/DEKAN/5/2014/54639e0f','keluar','2013-01-23','Surat Pengantar Dosen-2011',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-13 00:51:11'),('PENG/187/DEKAN/9/2014/5463ec6c','masuk','2012-01-13','Surat Pengantar Dosen-2008',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-13 06:25:32'),('PENG/402/REKTORAT/5/2014/54639','keluar','2011-03-02','Surat Penjagan event-2009',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-13 00:51:11'),('PENG/445/REKTORAT/1/2014/5463e','keluar','2013-07-28','Surat Tugas-2000',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-13 06:25:29'),('PENG/596/KERMAW/8/2014/5463ec6','masuk','2011-04-09','Surat Pengantar Dosen-2011',NULL,NULL,NULL,NULL,'1',NULL,'0',NULL,'2014-11-13 08:46:54'),('PENG/778/REKTORAT/7/2014/54639','masuk','2012-05-24','Surat Pengantar Dosen-2001',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-13 00:50:31'),('PENG/866/REKTORAT/1/2014/5463e','keluar','2010-06-09','Surat Pengantar Dosen-2004',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-13 06:25:29'),('PENG/867/FAKULTAS/2/2014/54639','masuk','2012-03-14','Surat Tugas-2014',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-13 00:51:11'),('SB/145/KERMAW/5/2014/5463f63ba','masuk','2014-08-23','Surat permohonan santri-2012',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-13 07:07:23'),('SB/26/REKTORAT/8/2014/5463f63f','masuk','2014-10-23','Surat Pengantar Dosen-2008',NULL,NULL,NULL,NULL,'1',NULL,'1',NULL,'2014-11-13 08:46:16'),('SB/301/FAKULTAS/5/2014/5463ec6','keluar','2014-06-26','Surat permohonan santri-2007',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-13 06:25:31'),('SB/307/REKTORAT/10/2014/54639d','masuk','2013-08-14','Surat Penjagan event-2001',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-13 00:50:31'),('SB/328/KERMAW/11/2014/54639de5','masuk','2011-02-15','Surat Tugas-2014',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-13 00:50:29'),('SB/369/FAKULTAS/3/2014/5463ec6','keluar','2011-01-08','Surat permohonan santri-2009',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-13 06:25:31'),('SB/387/KERMAW/12/2014/54639e0f','keluar','2014-07-24','Surat permohonan santri-2006',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-13 00:51:11'),('SB/44/REKTORAT/10/2014/54639de','masuk','2014-10-20','Surat Penjagan event-2003',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-13 00:50:30'),('SB/55/REKTORAT/5/2014/5463ec6c','keluar','2011-02-20','Surat permohonan santri-2014',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-13 06:25:32'),('SB/552/FAKULTAS/4/2014/5463ec6','keluar','2010-11-17','Surat Tugas-2006',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-13 06:25:35'),('SB/587/DEKAN/3/2014/5463f63adb','masuk','2014-03-01','Surat permohonan santri-2002',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-13 07:07:22'),('SB/588/DEKAN/3/2014/5463ec6d99','masuk','2013-07-05','Surat Pengantar Dosen-2009',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-13 06:25:33'),('SB/74/DEKAN/12/2014/5463f63ceb','masuk','2014-12-04','Surat Pengantar Dosen-2012',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-13 07:07:24'),('SB/897/KERMAW/4/2014/5463ec6e1','keluar','2014-01-16','Surat Tugas-2010',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-13 06:25:34'),('SKEP/117/FAKULTAS/5/2014/54639','masuk','2010-09-18','Surat Tugas-2011',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-13 00:51:12'),('SKEP/232/KERMAW/8/2014/54639de','keluar','2014-08-17','Surat permohonan santri-2010',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-13 00:50:30'),('SKEP/265/DEKAN/1/2014/54639de5','masuk','2014-07-17','Surat Penjagan event-2007',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-13 00:50:29'),('SKEP/358/DEKAN/3/2014/54639e0f','masuk','2011-11-30','Surat Tugas-2002',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-13 00:51:11'),('SKEP/459/FAKULTAS/9/2014/54639','keluar','2013-05-14','Surat Pengantar Dosen-2011',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-13 00:51:13'),('SKEP/681/KERMAW/3/2014/54639de','keluar','2012-05-10','Surat Pengantar Dosen-2001',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-13 00:50:29'),('SKEP/687/FAKULTAS/1/2014/5463e','masuk','2014-12-22','Surat Pengantar Dosen-2014',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-13 06:25:33'),('SKEP/693/FAKULTAS/9/2014/54639','masuk','2013-12-07','Surat permohonan santri-2011',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-13 00:50:31'),('SKEP/715/KERMAW/3/2014/5463ec6','masuk','2010-05-26','Surat Penjagan event-2004',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-13 06:25:34'),('SKEP/864/FAKULTAS/10/2014/5463','masuk','2013-06-21','Surat Tugas-2010',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-13 00:50:30'),('SKEP/897/DEKAN/11/2014/5463ec6','masuk','2010-08-12','Surat Penjagan event-2012',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-13 06:25:33'),('SKEP/92/DEKAN/6/2014/5463ec6bc','keluar','2011-06-14','Surat Penjagan event-2007',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-13 06:25:31'),('SPENG/131/REKTORAT/2/2014/5463','keluar','2014-06-17','Surat Tugas-2010',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-13 00:51:10'),('SPENG/206/DEKAN/5/2014/5463ec6','keluar','2012-03-28','Surat Tugas-2007',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-13 06:25:30'),('SPENG/260/KERMAW/7/2014/54639e','keluar','2011-04-11','Surat permohonan santri-2008',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-13 00:51:05'),('SPENG/282/FAKULTAS/12/2014/546','masuk','2013-11-15','Surat Pengantar Dosen-2012',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-13 06:25:32'),('SPENG/384/DEKAN/2/2014/5463ec6','keluar','2012-12-21','Surat Tugas-2003',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-13 06:25:34'),('SPENG/405/FAKULTAS/8/2014/5463','masuk','2012-10-02','Surat Tugas-2002',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-13 06:25:31'),('SPENG/413/KERMAW/2/2014/5463ec','masuk','2014-11-16','Surat Pengantar Dosen-2004',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-13 06:25:32'),('SPENG/820/FAKULTAS/4/2014/5463','keluar','2011-02-24','Surat Penjagan event-2003',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-13 06:25:31'),('SPERINT/172/REKTORAT/8/2014/54','keluar','2014-05-22','Surat Pengantar Dosen-2014',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-13 07:07:25'),('SPERINT/234/REKTORAT/8/2014/54','keluar','2012-08-07','Surat Penjagan event-2010',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-13 06:25:32'),('SPERINT/276/DEKAN/5/2014/5463e','keluar','2011-06-05','Surat Pengantar Dosen-2004',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-13 06:25:32'),('SPERINT/325/KERMAW/9/2014/5463','masuk','2013-03-06','Surat permohonan santri-2014',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-13 00:51:12'),('SPERINT/490/FAKULTAS/3/2014/54','masuk','2014-09-09','Surat Penjagan event-2004',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-13 07:07:25'),('SPERINT/549/DEKAN/2/2014/5463e','keluar','2011-01-20','Surat Pengantar Dosen-2012',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-13 06:25:31'),('SPERINT/674/FAKULTAS/2/2014/54','masuk','2011-04-03','Surat permohonan santri-2009',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-13 06:25:34'),('SPERINT/709/REKTORAT/1/2014/54','keluar','2014-01-11','Surat Penjagan event-2010',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-13 00:51:13'),('SPERINT/73/DEKAN/1/2014/5463f6','masuk','2014-06-13','Surat permohonan santri-2010',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-13 07:07:26'),('SPERINT/733/REKTORAT/12/2014/5','keluar','2011-10-19','Surat Penjagan event-2000',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-13 00:51:07'),('SPERINT/804/FAKULTAS/1/2014/54','keluar','2013-11-03','Surat permohonan santri-2002',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-13 00:51:13'),('SPERINT/848/DEKAN/6/2014/5463f','masuk','2014-06-01','Surat Penjagan event-2012',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-13 07:07:24'),('SPERINT/950/KERMAW/4/2014/5463','keluar','2011-01-12','Surat permohonan santri-2002',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-13 00:51:12'),('ST/100/REKTORAT/5/2014/54639de','masuk','2010-07-08','Surat permohonan santri-2002',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-13 00:50:32'),('ST/108/DEKAN/3/2014/5463ec6f37','masuk','2012-10-27','Surat Penjagan event-2013',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-13 06:25:35'),('ST/125/REKTORAT/9/2014/54639e0','masuk','2011-09-18','Surat permohonan santri-2013',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-13 00:51:11'),('ST/215/FAKULTAS/1/2014/5463ec6','keluar','2012-08-04','Surat permohonan santri-2013',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-13 06:25:31'),('ST/301/DEKAN/4/2014/54639e1163','keluar','2014-01-10','Surat Tugas-2002',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-13 00:51:13'),('ST/347/KERMAW/3/2014/5463ec6c6','masuk','2011-08-28','Surat Pengantar Dosen-2004',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-13 06:25:32'),('ST/375/FAKULTAS/10/2014/54639e','masuk','2012-05-09','Surat Penjagan event-2012',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-13 00:51:11'),('ST/43/REKTORAT/10/2014/54639e0','masuk','2010-01-01','Surat Tugas-2010',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-13 00:51:10'),('ST/457/REKTORAT/11/2014/5463f6','keluar','2014-07-01','Surat Tugas-2007',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-13 07:07:27'),('ST/514/KERMAW/1/2014/5463ec6bb','keluar','2012-01-10','Surat permohonan santri-2013',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-13 06:25:31'),('ST/582/DEKAN/10/2014/5463ec6e9','keluar','0000-00-00','Surat permohonan santri-2013\r\n','','','','','0','Ardi Pratama','0',NULL,'2014-11-13 07:09:43'),('ST/603/DEKAN/3/2014/5463ec692c','keluar','2012-01-04','Surat Penjagan event-2004',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-13 06:25:29'),('ST/737/REKTORAT/10/2014/54639e','keluar','2011-07-20','Surat Tugas-2000',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-13 00:51:10'),('ST/809/KERMAW/8/2014/54639e0e2','keluar','2010-07-23','Surat Pengantar Dosen-2000',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-13 00:51:10'),('ST/865/REKTORAT/1/2014/5463ec6','masuk','2011-07-10','Surat Tugas-2011',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-13 06:25:31'),('ST/915/KERMAW/12/2014/54639e0e','keluar','2012-09-03','Surat Tugas-2011',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-13 00:51:10'),('UND/133/FAKULTAS/8/2014/5463f6','keluar','2014-10-12','Surat Tugas-2013',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-13 07:07:24'),('UND/159/REKTORAT/6/2014/54639e','masuk','0000-00-00','Surat Pengantar Dosen-2004',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-13 00:51:12'),('UND/203/FAKULTAS/10/2014/5463e','masuk','2013-11-11','Surat Penjagan event-2010',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-13 06:25:31'),('UND/507/FAKULTAS/3/2014/5463ec','keluar','2011-12-30','Surat Penjagan event-2006',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-13 06:25:33'),('UND/692/DEKAN/10/2014/5463ec6e','keluar','2012-02-14','Surat Tugas-2013',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-13 06:25:34'),('UND/731/DEKAN/5/2014/54639e0ac','masuk','2011-04-06','Surat Penjagan event-2008',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-13 00:51:06'),('UND/945/REKTORAT/8/2014/5463ec','keluar','2014-09-15','Surat Pengantar Dosen-2010',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-13 06:25:31'),('UND/972/DEKAN/10/2014/5463ec6d','keluar','2013-05-29','Surat Penjagan event-2008',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-13 06:25:33');

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
