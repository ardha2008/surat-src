﻿# Host: localhost  (Version: 5.6.16)
# Date: 2014-11-18 09:44:08
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
# Structure for table "daemons"
#

DROP TABLE IF EXISTS `daemons`;
CREATE TABLE `daemons` (
  `Start` text NOT NULL,
  `Info` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "daemons"
#

/*!40000 ALTER TABLE `daemons` DISABLE KEYS */;
/*!40000 ALTER TABLE `daemons` ENABLE KEYS */;

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

INSERT INTO `pegawai` VALUES ('1134010049','Ardi Pratama','Surabaya','Surabaya','02/09/1993','09810280128','8923893824','iljvtgnutptoqvd.jpeg','0','2014-11-09 16:09:14'),('1134010050','Budi Purnomo','','','02/09/1993','','','nophoto.jpg','0','2014-11-09 15:58:00'),('1134010051','Ani Susilo','','','02/09/1993','','','nophoto.jpg','0','2014-11-16 20:12:58'),('1134010052','Liliana Kartika','','','02/09/1993','','','nophoto.jpg','0','2014-11-16 20:16:53');

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

INSERT INTO `surat` VALUES ('100/188/98/UND/99','keluar','0000-00-00','Surat pengajuan Akte Lahir 2','Ini surat tembusan dari Departemen Tetangga','Kermawa','Badan LPPP','surat,undangan,tembusan,900','0','Ardha Herdiantoooo','0','nophoto.jpg','2014-11-09 14:06:48'),('110/KERMA/001/0001','masuk','0000-00-00','Pendirian UKM Software Enginer3','Wow','','','','0','Ardha Herdiantoooo','1',NULL,'2014-11-09 14:35:34'),('19/UUP/991','masuk','0000-00-00','Surat Pengajuan Beasiswa','Pengajuan beasiswa\r\n','Rektorat','','','0','Ardha Herdiantoooo','1','nophoto.jpg','2014-11-09 14:12:46'),('900/UND/440','keluar','0000-00-00','Undangan Rapat','','','','surat,undangan,kementrian','0','Ardha Herdiantoooo','0','hedcqjyhuvvuzgc.jpeg','2014-11-09 13:10:01'),('PENG/108/REKTORAT/6/2014/54639','masuk','2013-10-21','Surat Pengantar Dosen-2007',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-13 00:51:12'),('PENG/124/KERMAW/4/2014/5463ec6','keluar','2013-10-17','Surat permohonan santri-2011',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-13 06:25:27'),('PENG/131/REKTORAT/3/2014/54639','keluar','2011-03-22','Surat Penjagan event-2000',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-13 00:51:12'),('PENG/146/DEKAN/5/2014/54639e0f','keluar','2013-01-23','Surat Pengantar Dosen-2011',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-13 00:51:11'),('PENG/187/DEKAN/9/2014/5463ec6c','masuk','2012-01-13','Surat Pengantar Dosen-2008',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-13 06:25:32'),('PENG/285/REKTORAT/3/2014/546a0','keluar','2014-05-17','Surat Tugas-2003',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-17 21:03:50'),('PENG/307/REKTORAT/10/2014/546a','masuk','2014-08-14','Surat Penjagan event-2001',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-17 21:03:47'),('PENG/402/REKTORAT/5/2014/54639','keluar','2011-03-02','Surat Penjagan event-2009',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-13 00:51:11'),('PENG/445/REKTORAT/1/2014/5463e','keluar','2013-07-28','Surat Tugas-2000',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-13 06:25:29'),('PENG/494/REKTORAT/2/2014/546a0','keluar','2014-05-04','Surat Tugas-2009',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-17 21:03:50'),('PENG/596/KERMAW/8/2014/5463ec6','masuk','2011-04-09','Surat Pengantar Dosen-2011',NULL,NULL,NULL,NULL,'1',NULL,'0',NULL,'2014-11-13 08:46:54'),('PENG/62/KERMAW/12/2014/546a003','keluar','2014-03-17','Surat Tugas-2001',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-17 21:03:39'),('PENG/778/REKTORAT/7/2014/54639','masuk','2012-05-24','Surat Pengantar Dosen-2001',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-13 00:50:31'),('PENG/778/REKTORAT/7/2014/546a0','masuk','2014-05-24','Surat Pengantar Dosen-2001',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-17 21:03:48'),('PENG/866/REKTORAT/1/2014/5463e','keluar','2010-06-09','Surat Pengantar Dosen-2004',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-13 06:25:29'),('PENG/867/FAKULTAS/2/2014/54639','masuk','2012-03-14','Surat Tugas-2014',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-13 00:51:11'),('PENG/87/KERMAW/9/2014/546a0044','masuk','2014-04-07','Surat permohonan santri-2007',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-17 21:03:48'),('PENG/997/FAKULTAS/12/2014/546a','keluar','2014-07-02','Surat Tugas-2007',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-17 21:03:52'),('SB/145/KERMAW/5/2014/5463f63ba','masuk','2014-08-23','Surat permohonan santri-2012',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-13 07:07:23'),('SB/203/REKTORAT/4/2014/546a004','keluar','2014-06-20','Surat Tugas-2011',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-17 21:03:47'),('SB/26/REKTORAT/8/2014/5463f63f','masuk','2014-10-23','Surat Pengantar Dosen-2008',NULL,NULL,NULL,NULL,'1',NULL,'1',NULL,'2014-11-13 08:46:16'),('SB/266/KERMAW/4/2014/546a00450','keluar','2014-10-15','Surat Tugas-2013',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-17 21:03:49'),('SB/301/FAKULTAS/5/2014/5463ec6','keluar','2014-06-26','Surat permohonan santri-2007',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-13 06:25:31'),('SB/303/FAKULTAS/12/2014/546a00','keluar','2014-10-15','Surat Penjagan event-2014',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-17 21:03:50'),('SB/307/REKTORAT/10/2014/54639d','masuk','2013-08-14','Surat Penjagan event-2001',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-13 00:50:31'),('SB/328/KERMAW/11/2014/54639de5','masuk','2011-02-15','Surat Tugas-2014',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-13 00:50:29'),('SB/333/FAKULTAS/9/2014/546a004','keluar','2014-06-07','Surat Penjagan event-2003',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-17 21:03:48'),('SB/352/KERMAW/11/2014/546a0048','masuk','2014-07-04','Surat permohonan santri-2005',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-17 21:03:52'),('SB/369/FAKULTAS/3/2014/5463ec6','keluar','2011-01-08','Surat permohonan santri-2009',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-13 06:25:31'),('SB/387/KERMAW/12/2014/54639e0f','keluar','2014-07-24','Surat permohonan santri-2006',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-13 00:51:11'),('SB/44/REKTORAT/10/2014/54639de','masuk','2014-10-20','Surat Penjagan event-2003',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-13 00:50:30'),('SB/46/DEKAN/12/2014/546a004887','keluar','2014-08-15','Surat Tugas-2004',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-17 21:03:52'),('SB/524/FAKULTAS/1/2014/546a004','keluar','2014-12-03','Surat Tugas-2005',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-17 21:03:49'),('SB/55/REKTORAT/5/2014/5463ec6c','keluar','2011-02-20','Surat permohonan santri-2014',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-13 06:25:32'),('SB/55/REKTORAT/5/2014/546a0044','keluar','2014-02-20','Surat permohonan santri-2014',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-17 21:03:48'),('SB/552/FAKULTAS/4/2014/5463ec6','keluar','2010-11-17','Surat Tugas-2006',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-13 06:25:35'),('SB/587/DEKAN/3/2014/5463f63adb','masuk','2014-03-01','Surat permohonan santri-2002',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-16 23:59:05'),('SB/588/DEKAN/3/2014/5463ec6d99','masuk','2013-07-05','Surat Pengantar Dosen-2009',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-13 06:25:33'),('SB/74/DEKAN/12/2014/5463f63ceb','masuk','2014-12-04','Surat Pengantar Dosen-2012',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-13 07:07:24'),('SB/741/KERMAW/4/2014/546a00474','masuk','2014-12-01','Surat Pengantar Dosen-2001',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-17 21:03:51'),('SB/780/DEKAN/6/2014/546a0049ac','masuk','2014-11-30','Surat Penjagan event-2005',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-17 21:03:53'),('SB/809/DEKAN/1/2014/546a004956','masuk','2014-01-01','Surat Penjagan event-2000',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-17 21:03:53'),('SB/872/FAKULTAS/11/2014/546a00','masuk','2014-03-01','Surat permohonan santri-2002',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-17 21:03:47'),('SB/897/KERMAW/4/2014/5463ec6e1','keluar','2014-01-16','Surat Tugas-2010',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-13 06:25:34'),('SB/94/KERMAW/11/2014/546a0048c','keluar','2014-02-10','Surat Penjagan event-2010',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-17 21:03:52'),('SKEP/117/FAKULTAS/5/2014/54639','masuk','2010-09-18','Surat Tugas-2011',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-13 00:51:12'),('SKEP/225/REKTORAT/5/2014/546a0','keluar','2014-06-22','Surat Tugas-2013',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-17 21:03:51'),('SKEP/232/KERMAW/8/2014/54639de','keluar','2014-08-17','Surat permohonan santri-2010',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-13 00:50:30'),('SKEP/265/DEKAN/1/2014/54639de5','masuk','2014-07-17','Surat Penjagan event-2007',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-13 00:50:29'),('SKEP/346/DEKAN/9/2014/546a0043','masuk','2014-11-11','Surat permohonan santri-2002',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-17 21:03:47'),('SKEP/358/DEKAN/3/2014/54639e0f','masuk','2011-11-30','Surat Tugas-2002',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-13 00:51:11'),('SKEP/398/KERMAW/9/2014/546a004','keluar','2014-02-16','Surat Pengantar Dosen-2003',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-17 21:03:52'),('SKEP/459/FAKULTAS/9/2014/54639','keluar','2013-05-14','Surat Pengantar Dosen-2011',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-13 00:51:13'),('SKEP/487/REKTORAT/2/2014/546a0','masuk','2014-10-11','Surat Pengantar Dosen-2002',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-17 21:03:44'),('SKEP/507/REKTORAT/7/2014/546a0','keluar','2014-10-12','Surat permohonan santri-2004',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-17 21:03:54'),('SKEP/61/KERMAW/11/2014/546a003','keluar','2014-07-26','Surat permohonan santri-2006',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-17 21:03:43'),('SKEP/66/KERMAW/11/2014/546a004','masuk','2014-10-28','Surat Tugas-2012',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-17 21:03:47'),('SKEP/681/KERMAW/3/2014/54639de','keluar','2012-05-10','Surat Pengantar Dosen-2001',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-13 00:50:29'),('SKEP/687/FAKULTAS/1/2014/5463e','masuk','2014-12-22','Surat Pengantar Dosen-2014',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-13 06:25:33'),('SKEP/693/FAKULTAS/9/2014/54639','masuk','2013-12-07','Surat permohonan santri-2011',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-13 00:50:31'),('SKEP/693/FAKULTAS/9/2014/546a0','masuk','2014-12-07','Surat permohonan santri-2011',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-17 21:03:48'),('SKEP/71/FAKULTAS/6/2014/546a00','masuk','2014-07-03','Surat permohonan santri-2007',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-17 21:03:48'),('SKEP/715/KERMAW/3/2014/5463ec6','masuk','2010-05-26','Surat Penjagan event-2004',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-13 06:25:34'),('SKEP/770/DEKAN/10/2014/546a004','keluar','2014-05-13','Surat permohonan santri-2006',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-17 21:03:53'),('SKEP/803/DEKAN/2/2014/546a0044','keluar','2014-11-20','Surat Pengantar Dosen-2002',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-17 21:03:48'),('SKEP/829/KERMAW/12/2014/546a00','keluar','2014-12-06','Surat Tugas-2011',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-17 21:03:49'),('SKEP/847/FAKULTAS/10/2014/546a','keluar','2014-02-09','Surat Tugas-2005',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-17 21:03:53'),('SKEP/864/FAKULTAS/10/2014/5463','masuk','2013-06-21','Surat Tugas-2010',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-13 00:50:30'),('SKEP/897/DEKAN/11/2014/5463ec6','masuk','2010-08-12','Surat Penjagan event-2012',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-13 06:25:33'),('SKEP/92/DEKAN/6/2014/5463ec6bc','keluar','2011-06-14','Surat Penjagan event-2007',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-13 06:25:31'),('SKEP/92/DEKAN/6/2014/546a00440','keluar','2014-06-14','Surat Penjagan event-2007',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-17 21:03:48'),('SKEP/970/FAKULTAS/6/2014/546a0','keluar','2014-08-03','Surat Penjagan event-2014',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-17 21:03:48'),('SPENG/131/REKTORAT/2/2014/5463','keluar','2014-06-17','Surat Tugas-2010',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-13 00:51:10'),('SPENG/206/DEKAN/5/2014/5463ec6','keluar','2012-03-28','Surat Tugas-2007',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-13 06:25:30'),('SPENG/260/KERMAW/7/2014/54639e','keluar','2011-04-11','Surat permohonan santri-2008',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-13 00:51:05'),('SPENG/282/FAKULTAS/12/2014/546','masuk','2013-11-15','Surat Pengantar Dosen-2012',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-13 06:25:32'),('SPENG/310/FAKULTAS/3/2014/546a','masuk','2014-07-03','Surat Pengantar Dosen-2010',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-17 21:03:51'),('SPENG/377/FAKULTAS/4/2014/546a','masuk','2014-03-21','Surat Penjagan event-2005',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-17 21:03:40'),('SPENG/384/DEKAN/2/2014/5463ec6','keluar','2012-12-21','Surat Tugas-2003',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-13 06:25:34'),('SPENG/405/FAKULTAS/8/2014/5463','masuk','2012-10-02','Surat Tugas-2002',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-13 06:25:31'),('SPENG/413/KERMAW/2/2014/5463ec','masuk','2014-11-16','Surat Pengantar Dosen-2004',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-13 06:25:32'),('SPENG/416/FAKULTAS/12/2014/546','keluar','2014-05-30','Surat Pengantar Dosen-2000',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-17 21:03:53'),('SPENG/463/DEKAN/9/2014/546a004','masuk','2014-08-05','Surat Pengantar Dosen-2011',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-17 21:03:50'),('SPENG/660/REKTORAT/5/2014/546a','masuk','2014-03-23','Surat Tugas-2010',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-17 21:03:50'),('SPENG/774/DEKAN/7/2014/546a004','keluar','2014-12-05','Surat Pengantar Dosen-2007',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-17 21:03:44'),('SPENG/783/REKTORAT/1/2014/546a','masuk','2014-03-02','Surat permohonan santri-2004',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-17 21:03:49'),('SPENG/79/DEKAN/8/2014/546a0048','keluar','2014-08-18','Surat Penjagan event-2013',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-17 21:03:52'),('SPENG/814/DEKAN/3/2014/546a004','masuk','2014-05-15','Surat permohonan santri-2002',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-17 21:03:53'),('SPENG/820/FAKULTAS/4/2014/5463','keluar','2011-02-24','Surat Penjagan event-2003',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-13 06:25:31'),('SPENG/865/REKTORAT/1/2014/546a','masuk','2014-07-10','Surat Tugas-2011',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-17 21:03:47'),('SPENG/88/REKTORAT/6/2014/546a0','keluar','2014-04-29','Surat Penjagan event-2010',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-17 21:03:42'),('SPERINT/172/REKTORAT/8/2014/54','keluar','2014-05-22','Surat Pengantar Dosen-2014',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-13 07:07:25'),('SPERINT/234/REKTORAT/8/2014/54','keluar','2012-08-07','Surat Penjagan event-2010',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-13 06:25:32'),('SPERINT/237/DEKAN/10/2014/546a','masuk','2014-08-07','Surat Tugas-2007',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-17 21:03:54'),('SPERINT/276/DEKAN/5/2014/5463e','keluar','2011-06-05','Surat Pengantar Dosen-2004',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-13 06:25:32'),('SPERINT/325/KERMAW/9/2014/5463','masuk','2013-03-06','Surat permohonan santri-2014',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-13 00:51:12'),('SPERINT/367/KERMAW/7/2014/546a','masuk','2014-06-12','Surat permohonan santri-2002',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-17 21:03:48'),('SPERINT/403/REKTORAT/8/2014/54','keluar','2014-03-16','Surat Tugas-2001',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-17 21:03:51'),('SPERINT/473/REKTORAT/4/2014/54','masuk','2014-12-20','Surat Pengantar Dosen-2006',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-17 21:03:52'),('SPERINT/490/FAKULTAS/3/2014/54','masuk','2014-09-09','Surat Penjagan event-2004',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-16 23:59:24'),('SPERINT/549/DEKAN/2/2014/5463e','keluar','2011-01-20','Surat Pengantar Dosen-2012',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-13 06:25:31'),('SPERINT/622/REKTORAT/8/2014/54','masuk','2014-06-18','Surat Tugas-2012',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-17 21:03:47'),('SPERINT/674/FAKULTAS/2/2014/54','masuk','2011-04-03','Surat permohonan santri-2009',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-13 06:25:34'),('SPERINT/709/REKTORAT/1/2014/54','keluar','2014-01-11','Surat Penjagan event-2010',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-13 00:51:13'),('SPERINT/73/DEKAN/1/2014/5463f6','masuk','2014-06-13','Surat permohonan santri-2010',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-16 23:58:55'),('SPERINT/733/REKTORAT/12/2014/5','keluar','2011-10-19','Surat Penjagan event-2000',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-13 00:51:07'),('SPERINT/803/FAKULTAS/7/2014/54','masuk','2014-09-29','Surat permohonan santri-2013',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-17 21:03:54'),('SPERINT/804/FAKULTAS/1/2014/54','keluar','2013-11-03','Surat permohonan santri-2002',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-13 00:51:13'),('SPERINT/820/REKTORAT/10/2014/5','keluar','2014-06-17','Surat Penjagan event-2008',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-17 21:03:48'),('SPERINT/848/DEKAN/6/2014/5463f','masuk','2014-06-01','Surat Penjagan event-2012',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-13 07:07:24'),('SPERINT/90/KERMAW/12/2014/546a','keluar','2014-04-20','Surat Tugas-2003',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-17 21:03:48'),('SPERINT/950/KERMAW/4/2014/5463','keluar','2011-01-12','Surat permohonan santri-2002',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-13 00:51:12'),('ST/100/REKTORAT/5/2014/54639de','masuk','2010-07-08','Surat permohonan santri-2002',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-13 00:50:32'),('ST/108/DEKAN/3/2014/5463ec6f37','masuk','2012-10-27','Surat Penjagan event-2013',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-13 06:25:35'),('ST/125/REKTORAT/9/2014/54639e0','masuk','2011-09-18','Surat permohonan santri-2013',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-13 00:51:11'),('ST/215/FAKULTAS/1/2014/5463ec6','keluar','2012-08-04','Surat permohonan santri-2013',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-13 06:25:31'),('ST/236/FAKULTAS/11/2014/546a00','masuk','2014-01-02','Surat Penjagan event-2003',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-17 21:03:45'),('ST/301/DEKAN/4/2014/54639e1163','keluar','2014-01-10','Surat Tugas-2002',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-13 00:51:13'),('ST/326/FAKULTAS/4/2014/546a004','masuk','2014-03-02','Surat Pengantar Dosen-2001',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-17 21:03:52'),('ST/347/KERMAW/3/2014/5463ec6c6','masuk','2011-08-28','Surat Pengantar Dosen-2004',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-13 06:25:32'),('ST/375/FAKULTAS/10/2014/54639e','masuk','2012-05-09','Surat Penjagan event-2012',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-13 00:51:11'),('ST/387/DEKAN/4/2014/546a004603','masuk','2014-01-26','Surat Penjagan event-2003',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-17 21:03:50'),('ST/43/REKTORAT/10/2014/54639e0','masuk','2010-01-01','Surat Tugas-2010',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-13 00:51:10'),('ST/438/FAKULTAS/8/2014/546a004','keluar','2014-02-01','Surat Penjagan event-2014',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-17 21:03:47'),('ST/457/REKTORAT/11/2014/5463f6','keluar','2014-07-01','Surat Tugas-2007',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-17 00:06:23'),('ST/490/KERMAW/5/2014/546a0046c','masuk','2014-03-18','Surat permohonan santri-2014',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-17 21:03:50'),('ST/514/KERMAW/1/2014/5463ec6bb','keluar','2012-01-10','Surat permohonan santri-2013',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-13 06:25:31'),('ST/567/FAKULTAS/12/2014/546a00','keluar','2014-02-27','Surat Pengantar Dosen-2010',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-17 21:03:48'),('ST/582/DEKAN/10/2014/5463ec6e9','keluar','0000-00-00','Surat permohonan santri-2013\r\n','','','','','0','Ardi Pratama','0',NULL,'2014-11-13 07:09:43'),('ST/590/KERMAW/3/2014/546a0048a','keluar','2014-04-15','Surat Penjagan event-2006',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-17 21:03:52'),('ST/603/DEKAN/3/2014/5463ec692c','keluar','2012-01-04','Surat Penjagan event-2004',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-13 06:25:29'),('ST/605/FAKULTAS/10/2014/546a00','keluar','2014-02-18','Surat permohonan santri-2000',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-17 21:03:43'),('ST/620/REKTORAT/4/2014/546a004','masuk','2014-06-11','Surat Tugas-2001',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-17 21:03:54'),('ST/737/REKTORAT/10/2014/54639e','keluar','2011-07-20','Surat Tugas-2000',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-13 00:51:10'),('ST/78/DEKAN/8/2014/546a0044df3','masuk','2014-12-19','Surat Pengantar Dosen-2005',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-17 21:03:48'),('ST/809/KERMAW/8/2014/54639e0e2','keluar','2010-07-23','Surat Pengantar Dosen-2000',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-13 00:51:10'),('ST/865/REKTORAT/1/2014/5463ec6','masuk','2011-07-10','Surat Tugas-2011',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-13 06:25:31'),('ST/885/KERMAW/2/2014/546a0047c','keluar','2014-06-30','Surat Pengantar Dosen-2001',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-17 21:03:51'),('ST/891/DEKAN/11/2014/546a00491','keluar','2014-10-23','Surat permohonan santri-2011',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-17 21:03:53'),('ST/915/KERMAW/12/2014/54639e0e','keluar','2012-09-03','Surat Tugas-2011',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-13 00:51:10'),('ST/99/DEKAN/7/2014/546a0043e25','masuk','2014-04-11','Surat Penjagan event-2003',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-17 21:03:47'),('UND/114/KERMAW/11/2014/546a004','masuk','2014-03-29','Surat Pengantar Dosen-2006',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-17 21:03:54'),('UND/133/FAKULTAS/8/2014/5463f6','keluar','2014-10-12','Surat Tugas-2013',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-13 07:07:24'),('UND/159/REKTORAT/6/2014/54639e','masuk','0000-00-00','Surat Pengantar Dosen-2004',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-13 00:51:12'),('UND/203/FAKULTAS/10/2014/5463e','masuk','2013-11-11','Surat Penjagan event-2010',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-13 06:25:31'),('UND/236/FAKULTAS/12/2014/546a0','keluar','2014-12-26','Surat Tugas-2005',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-17 21:03:47'),('UND/300/DEKAN/12/2014/546a0048','masuk','2014-06-11','Surat Pengantar Dosen-2008',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-17 21:03:52'),('UND/320/FAKULTAS/11/2014/546a0','masuk','2014-12-16','Surat Pengantar Dosen-2006',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-17 21:03:45'),('UND/465/FAKULTAS/3/2014/546a00','keluar','2014-12-24','Surat permohonan santri-2007',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-17 21:03:49'),('UND/507/FAKULTAS/3/2014/5463ec','keluar','2011-12-30','Surat Penjagan event-2006',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-13 06:25:33'),('UND/565/DEKAN/5/2014/546a003d9','keluar','2014-01-21','Surat Penjagan event-2004',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-17 21:03:41'),('UND/575/REKTORAT/2/2014/546a00','keluar','2014-10-20','Surat Pengantar Dosen-2004',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-17 21:03:54'),('UND/582/REKTORAT/11/2014/546a0','masuk','2014-07-25','Surat permohonan santri-2008',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-17 21:03:42'),('UND/598/DEKAN/1/2014/546a003ee','keluar','2014-12-25','Surat permohonan santri-2011',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-17 21:03:42'),('UND/639/REKTORAT/7/2014/546a00','keluar','2014-07-05','Surat Penjagan event-2003',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-17 21:03:46'),('UND/692/DEKAN/10/2014/5463ec6e','keluar','2012-02-14','Surat Tugas-2013',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-13 06:25:34'),('UND/731/DEKAN/5/2014/54639e0ac','masuk','2011-04-06','Surat Penjagan event-2008',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-13 00:51:06'),('UND/859/FAKULTAS/2/2014/546a00','masuk','2014-06-06','Surat Tugas-2013',NULL,NULL,NULL,NULL,'0',NULL,'1',NULL,'2014-11-17 21:03:49'),('UND/945/REKTORAT/8/2014/5463ec','keluar','2014-09-15','Surat Pengantar Dosen-2010',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-13 06:25:31'),('UND/972/DEKAN/10/2014/5463ec6d','keluar','2013-05-29','Surat Penjagan event-2008',NULL,NULL,NULL,NULL,'0',NULL,'0',NULL,'2014-11-13 06:25:33');

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

INSERT INTO `users` VALUES ('1134010049','abmjehaboqit6','3'),('1134010050','abmjehaboqit6','2'),('1134010051','abmjehaboqit6','1'),('1134010052','abmjehaboqit6','1');
