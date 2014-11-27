# Host: localhost  (Version: 5.6.16)
# Date: 2014-11-27 20:20:12
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

INSERT INTO `bagian` VALUES (0,'Surat Keluar','0'),(1,'Surat Masuk','0'),(2,'Kepala Staff','0'),(3,'Admin','0');

#
# Structure for table "kategori"
#

DROP TABLE IF EXISTS `kategori`;
CREATE TABLE `kategori` (
  `idkategori` varchar(11) NOT NULL DEFAULT '',
  `keterangan_kategori` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idkategori`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "kategori"
#

INSERT INTO `kategori` VALUES ('B','Surat Biasa'),('PENG','Surat Pengumuman'),('SKEP','Surat Keputusan'),('SPENG','Surat Pengantar'),('SPRINT','Surat Perintah'),('ST','Surat Tugas'),('UND','Surat Undangan');

#
# Structure for table "logs"
#

DROP TABLE IF EXISTS `logs`;
CREATE TABLE `logs` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `idusers` varchar(255) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

#
# Data for table "logs"
#

INSERT INTO `logs` VALUES (1,'1134010049','2014-11-09 14:54:38'),(2,'70','2014-11-25 10:29:33'),(3,'1134010050','2014-11-25 10:29:41'),(4,'1134010049','2014-11-25 10:45:10'),(5,'70','2014-11-25 11:06:55'),(6,'1134010049','2014-11-25 11:07:21'),(7,'1134010049','2014-11-25 11:17:29'),(8,'1134010049','2014-11-25 13:25:36'),(9,'100','2014-11-25 16:22:18'),(10,'1134010049','2014-11-25 16:30:53'),(11,'1134010049','2014-11-25 20:28:34'),(12,'1134010049','2014-11-25 22:09:52'),(13,'1134010049','2014-11-26 05:12:22'),(14,'1134010049','2014-11-26 10:01:53'),(15,'1134010049','2014-11-26 11:53:21'),(16,'1134010049','2014-11-27 00:04:24'),(17,'1134010049','2014-11-27 12:11:56');

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
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idpegawai`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "pegawai"
#

INSERT INTO `pegawai` VALUES ('100','Berry','','','02/09/1993','','','nophoto.jpg','0','2014-11-25 16:21:48'),('1134010049','Ardi Pratama','Surabaya','Surabaya','02/09/1993','09810280128','8923893824','iljvtgnutptoqvd.jpeg','0','2014-11-09 16:09:14'),('1134010050','Budi Purnomo','','','02/09/1993','','','nophoto.jpg','0','2014-11-09 15:58:00'),('1134010051','Ani Susilo','','','02/09/1993','','','nophoto.jpg','0','2014-11-16 20:12:58'),('1134010052','Liliana Kartika','','','02/09/1993','','','nophoto.jpg','0','2014-11-16 20:16:53'),('70','Ardha Herdianto','','','02/09/1993','','','nophoto.jpg','0','2014-11-24 23:29:55');

#
# Structure for table "surat"
#

DROP TABLE IF EXISTS `surat`;
CREATE TABLE `surat` (
  `idsurat` varchar(30) NOT NULL DEFAULT '' COMMENT 'NO SURAT',
  `jenis_surat` varchar(10) DEFAULT NULL COMMENT 'Masuk / Keluar',
  `tanggal_surat` date DEFAULT NULL COMMENT 'Tanggal yang tertera pada surat',
  `idkategori` varchar(255) DEFAULT NULL,
  `perihal` text,
  `tujuan` varchar(255) DEFAULT NULL COMMENT 'Sebagai catatan tambahan untuk memperjelas surat',
  `asal_surat` varchar(45) DEFAULT NULL COMMENT 'asal surat, bisa dari instansi internal atau eksternal',
  `disposisi` varchar(255) DEFAULT NULL COMMENT 'Disposisi surat',
  `kata_kunci` varchar(255) DEFAULT NULL COMMENT 'Kata kunci yang berhubungan dengan surat',
  `delete` varchar(1) DEFAULT '0' COMMENT 'DELETE = status data terdelet, 1 adalah file delete, 2 tidak delete',
  `posting` varchar(255) DEFAULT NULL COMMENT 'Di posting oleh idusers',
  `public` varchar(1) DEFAULT '0' COMMENT 'status, 1=publikasi, 0=private',
  `lampiran` varchar(255) DEFAULT 'no_lampiran.jpeg' COMMENT 'Lampiran berupa gambar, gambar surat',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'tanggal surat di insert/ update oleh sistem',
  PRIMARY KEY (`idsurat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "surat"
#

INSERT INTO `surat` VALUES ('Ardha/1001','masuk','1993-09-02','SPENG','Pengajuan Daana','Kermawa','Dekan','','','1','1134010049','0','1','2014-11-26 13:46:09'),('B/110/1000/HIMA/2014','masuk','2016-09-02','PENG','Surat Jaminan Kesehatan','','Himatifa','','','0','1134010049','1','2','2014-11-26 05:32:15'),('PENG/103/FAKULTAS/8/2014/5473e','keluar','2014-07-29','PENG','Surat Tugas-2012',NULL,'KERMAWA',NULL,NULL,'0','1134010051','1','no_lampiran.jpeg','2014-11-25 09:52:31'),('PENG/105/KERMAW/4/2014/547458a','keluar','2014-11-13','ST','Surat Penjagan event-2005',NULL,NULL,NULL,NULL,'0','1134010049','1','no_lampiran.jpeg','2014-11-25 17:23:35'),('PENG/112/KERMAW/6/2014/54754be','keluar','2014-01-19','ST','Surat Penjagan event-2000',NULL,NULL,NULL,NULL,'1','1134010051','1','no_lampiran.jpeg','2014-11-26 10:41:22'),('PENG/122/REKTORAT/4/2014/54745','keluar','2014-11-09','SPENG','Surat Tugas-2013',NULL,NULL,NULL,NULL,'0','1134010051','1','no_lampiran.jpeg','2014-11-25 17:23:33'),('PENG/242/FAKULTAS/8/2014/54752','masuk','2014-05-16','SPRINT','Surat permohonan santri-2006',NULL,NULL,NULL,NULL,'0','1134010051','1','no_lampiran.jpeg','2014-11-26 08:03:21'),('PENG/273/DEKAN/2/2014/5473eef7','keluar','2014-08-23','B','Surat permohonan santri-2000',NULL,'KERMAWA',NULL,NULL,'0','1134010050','0','no_lampiran.jpeg','2014-11-25 09:52:39'),('PENG/367/KERMAW/4/2014/5473eee','keluar','2014-10-13','UND','Surat Tugas-2011',NULL,'KERMAWA',NULL,NULL,'0','1134010049','0','no_lampiran.jpeg','2014-11-25 09:52:30'),('PENG/878/KERMAW/9/2014/54754be','masuk','2014-06-29','ST','Surat Tugas-2003',NULL,NULL,NULL,NULL,'1','1134010051','1','no_lampiran.jpeg','2014-11-26 10:41:24'),('PENG/967/DEKAN/3/2014/5473eef5','keluar','2014-10-03','PENG','Surat Tugas-2007',NULL,'KERMAWA',NULL,NULL,'0','1134010051','1','no_lampiran.jpeg','2014-11-25 09:52:37'),('SB/147/KERMAW/3/2014/5473eef30','keluar','2014-10-08','ST','Surat Pengantar Dosen-2001',NULL,'KERMAWA',NULL,NULL,'0','1134010050','0','no_lampiran.jpeg','2014-11-25 09:52:35'),('SB/270/FAKULTAS/9/2014/547458a','keluar','2014-11-20','ST','Surat Penjagan event-2005',NULL,NULL,NULL,NULL,'1','1134010051','0','no_lampiran.jpeg','2014-11-25 17:23:36'),('SB/295/KERMAW/4/2014/5473ef11b','keluar','0000-00-00','SPRINT','Surat Pengantar Dosen-2009',NULL,'KERMAWA',NULL,NULL,'0','1134010051','1','no_lampiran.jpeg','2014-11-25 09:53:05'),('SB/3/FAKULTAS/8/2014/547458a71','keluar','2014-01-04','SKEP','Surat Pengantar Dosen-2006',NULL,NULL,NULL,NULL,'0','1134010049','0','no_lampiran.jpeg','2014-11-25 17:23:35'),('SB/338/KERMAW/12/2014/5473ef09','keluar','2014-06-28','SPRINT','Surat Tugas-2004',NULL,'KERMAWA',NULL,NULL,'0','1134010050','0','no_lampiran.jpeg','2014-11-25 09:52:57'),('SB/39/DEKAN/12/2014/5473eeeb80','keluar','2014-06-13','B','Surat permohonan santri-2000',NULL,'KERMAWA',NULL,NULL,'0','1134010051','1','no_lampiran.jpeg','2014-11-25 09:52:27'),('SB/393/KERMAW/1/2014/5473eef39','keluar','2014-08-30','SPENG','Surat Pengantar Dosen-2013',NULL,'KERMAWA',NULL,NULL,'0','1134010049','1','no_lampiran.jpeg','2014-11-25 09:52:35'),('SB/426/DEKAN/6/2014/547526da90','masuk','2014-12-18','SPENG','Surat permohonan santri-2004',NULL,NULL,NULL,NULL,'1','1134010049','1','no_lampiran.jpeg','2014-11-26 08:03:22'),('SB/498/REKTORAT/5/2014/5473eef','keluar','2014-03-07','SPRINT','Surat Penjagan event-2004',NULL,'KERMAWA',NULL,NULL,'0','1134010051','0','no_lampiran.jpeg','2014-11-25 09:52:38'),('SB/650/FAKULTAS/12/2014/547458','keluar','2014-09-01','ST','Surat Penjagan event-2007',NULL,NULL,NULL,NULL,'0','1134010049','0','no_lampiran.jpeg','2014-11-25 17:23:35'),('SB/659/REKTORAT/4/2014/5473ef1','keluar','2014-01-08','UND','Surat Pengantar Dosen-2006',NULL,'KERMAWA',NULL,NULL,'0','1134010051','0','no_lampiran.jpeg','2014-11-25 09:53:12'),('SB/805/FAKULTAS/11/2014/547458','keluar','2014-08-26','SKEP','Surat Tugas-2005\r\n','','','','','1','1134010049','1','2','2014-11-25 17:23:37'),('SB/81/KERMAW/8/2014/5473eeeee6','keluar','2014-11-03','SPENG','Surat Penjagan event-2008',NULL,'KERMAWA',NULL,NULL,'0','1134010049','0','no_lampiran.jpeg','2014-11-25 09:52:30'),('SB/810/KERMAW/1/2014/547458a6e','keluar','2014-01-02','UND','Surat Pengantar Dosen-2010',NULL,NULL,NULL,NULL,'0','1134010049','0','no_lampiran.jpeg','2014-11-25 17:23:34'),('SB/898/DEKAN/3/2014/54754be38b','masuk','2014-02-07','B','Surat Pengantar Dosen-2002',NULL,NULL,NULL,NULL,'1','1134010050','1','no_lampiran.jpeg','2014-11-26 10:41:23'),('SB/950/KERMAW/8/2014/547458a95','keluar','2014-09-14','SPRINT','Surat Tugas-2002',NULL,NULL,NULL,NULL,'1','1134010050','1','no_lampiran.jpeg','2014-11-25 17:23:37'),('SKEP/139/DEKAN/3/2014/5473eef4','keluar','2014-04-17','UND','Surat permohonan santri-2001',NULL,'KERMAWA',NULL,NULL,'0','1134010051','0','no_lampiran.jpeg','2014-11-25 09:52:36'),('SKEP/313/KERMAW/7/2014/5473eef','keluar','2014-06-24','B','Surat Pengantar Dosen-2000',NULL,'KERMAWA',NULL,NULL,'0','1134010051','1','no_lampiran.jpeg','2014-11-25 09:52:33'),('SKEP/512/DEKAN/4/2014/5473eeee','keluar','2014-01-08','B','Surat permohonan santri-2005',NULL,'KERMAWA',NULL,NULL,'0','1134010051','1','no_lampiran.jpeg','2014-11-25 09:52:30'),('SKEP/621/REKTORAT/5/2014/54754','masuk','2014-03-30','SPENG','Surat Tugas-2010',NULL,NULL,NULL,NULL,'1','1134010050','1','no_lampiran.jpeg','2014-11-26 10:41:24'),('SKEP/684/FAKULTAS/11/2014/5473','keluar','2014-09-23','SPENG','Surat permohonan santri-2002',NULL,'KERMAWA',NULL,NULL,'0','1134010049','1','no_lampiran.jpeg','2014-11-25 09:53:11'),('SKEP/695/KERMAW/10/2014/547458','keluar','2014-02-02','SPENG','Surat permohonan santri-2007',NULL,NULL,NULL,NULL,'1','1134010051','1','no_lampiran.jpeg','2014-11-25 17:23:37'),('SKEP/743/FAKULTAS/9/2014/5473e','keluar','2014-07-16','SPENG','Surat Penjagan event-2002',NULL,'KERMAWA',NULL,NULL,'0','1134010051','1','no_lampiran.jpeg','2014-11-25 09:52:58'),('SKEP/987/REKTORAT/1/2014/5473e','keluar','2014-10-28','UND','Surat permohonan santri-2014',NULL,'KERMAWA',NULL,NULL,'0','1134010049','0','no_lampiran.jpeg','2014-11-25 09:52:35'),('SPENG/277/KERMAW/2/2014/5473ee','keluar','2014-02-20','SPRINT','Surat Penjagan event-2011',NULL,'KERMAWA',NULL,NULL,'0','1134010051','0','no_lampiran.jpeg','2014-11-25 09:52:31'),('SPENG/280/DEKAN/5/2014/5473eef','keluar','2014-08-11','PENG','Surat Penjagan event-2013',NULL,'KERMAWA',NULL,NULL,'0','1134010050','1','no_lampiran.jpeg','2014-11-25 09:52:38'),('SPENG/289/FAKULTAS/4/2014/5474','keluar','2014-12-25','SPENG','Surat Pengantar Dosen-2003',NULL,NULL,NULL,NULL,'0','1134010051','0','no_lampiran.jpeg','2014-11-25 17:23:36'),('SPENG/321/KERMAW/2/2014/547458','masuk','2014-12-23','SPENG','Surat permohonan santri-2006',NULL,NULL,NULL,NULL,'0','1134010049','1','no_lampiran.jpeg','2014-11-25 17:23:34'),('SPENG/43/KERMAW/5/2014/547458a','keluar','2014-12-15','PENG','Surat Penjagan event-2004',NULL,NULL,NULL,NULL,'0','1134010050','0','no_lampiran.jpeg','2014-11-25 17:23:36'),('SPENG/522/DEKAN/10/2014/5473ee','masuk','2014-04-11','PENG','Surat permohonan santri-2006',NULL,'KERMAWA',NULL,NULL,'0','1134010050','1','no_lampiran.jpeg','2014-11-25 09:52:32'),('SPENG/678/FAKULTAS/3/2014/5475','keluar','2014-04-07','ST','Surat Tugas-2000',NULL,NULL,NULL,NULL,'1','1134010049','1','no_lampiran.jpeg','2014-11-26 08:03:22'),('SPENG/723/DEKAN/8/2014/5473eee','keluar','2014-11-02','UND','Surat permohonan santri-2013',NULL,'KERMAWA',NULL,NULL,'0','1134010050','1','no_lampiran.jpeg','2014-11-25 09:52:31'),('SPENG/774/FAKULTAS/5/2014/5473','keluar','2014-12-19','SKEP','Surat Penjagan event-2002',NULL,'KERMAWA',NULL,NULL,'0','1134010049','0','no_lampiran.jpeg','2014-11-25 09:52:39'),('SPENG/904/FAKULTAS/5/2014/5473','keluar','2014-10-14','SPENG','Surat Tugas-2000',NULL,'KERMAWA',NULL,NULL,'0','1134010050','0','no_lampiran.jpeg','2014-11-25 09:52:30'),('SPENG/943/KERMAW/10/2014/5473e','keluar','2014-03-10','PENG','Surat Pengantar Dosen-2007',NULL,'KERMAWA',NULL,NULL,'0','1134010049','0','no_lampiran.jpeg','2014-11-25 09:52:39'),('SPENG/944/KERMAW/3/2014/5473ef','keluar','2014-09-19','SPRINT','Surat Pengantar Dosen-2001',NULL,'KERMAWA',NULL,NULL,'0','1134010049','0','no_lampiran.jpeg','2014-11-25 09:53:05'),('SPERINT/172/REKTORAT/6/2014/54','keluar','2014-03-13','UND','Surat Tugas-2008',NULL,NULL,NULL,NULL,'0','1134010051','1','no_lampiran.jpeg','2014-11-25 17:23:36'),('SPERINT/260/DEKAN/5/2014/54745','keluar','2014-01-09','SPRINT','Surat permohonan santri-2014',NULL,NULL,NULL,NULL,'0','1134010051','0','no_lampiran.jpeg','2014-11-25 17:23:32'),('SPERINT/276/DEKAN/5/2014/54745','keluar','2014-06-05','ST','Surat Pengantar Dosen-2004',NULL,NULL,NULL,NULL,'0','1134010049','1','no_lampiran.jpeg','2014-11-25 17:23:31'),('SPERINT/360/DEKAN/6/2014/5473e','keluar','2014-01-09','SPRINT','Surat Penjagan event-2011',NULL,'KERMAWA',NULL,NULL,'0','1134010051','1','no_lampiran.jpeg','2014-11-25 09:52:31'),('SPERINT/525/REKTORAT/2/2014/54','keluar','2014-12-26','ST','Surat Tugas-2009',NULL,'KERMAWA',NULL,NULL,'0','1134010051','0','no_lampiran.jpeg','2014-11-25 09:53:13'),('SPERINT/527/DEKAN/2/2014/54745','keluar','2014-06-22','ST','Surat permohonan santri-2001',NULL,NULL,NULL,NULL,'0','1134010051','0','no_lampiran.jpeg','2014-11-25 17:23:35'),('SPERINT/71/KERMAW/3/2014/54745','keluar','2014-10-20','SPRINT','Surat Tugas-2003',NULL,NULL,NULL,NULL,'1','1134010050','1','no_lampiran.jpeg','2014-11-25 17:23:37'),('SPERINT/750/REKTORAT/12/2014/5','keluar','2014-02-09','SPENG','Surat Pengantar Dosen-2009',NULL,'KERMAWA',NULL,NULL,'0','1134010051','1','no_lampiran.jpeg','2014-11-25 09:52:39'),('SPERINT/764/KERMAW/10/2014/547','keluar','2014-05-23','SPRINT','Surat Penjagan event-2004',NULL,'KERMAWA',NULL,NULL,'0','1134010049','1','no_lampiran.jpeg','2014-11-25 09:52:30'),('SPERINT/770/DEKAN/10/2014/5473','keluar','2014-05-13','UND','Surat permohonan santri-2006',NULL,'KERMAWA',NULL,NULL,'0','1134010051','0','no_lampiran.jpeg','2014-11-25 09:52:30'),('SPERINT/828/KERMAW/3/2014/5473','keluar','2014-12-12','ST','Surat Tugas-2000',NULL,'KERMAWA',NULL,NULL,'0','1134010051','1','no_lampiran.jpeg','2014-11-25 09:52:58'),('SPERINT/844/FAKULTAS/8/2014/54','keluar','2014-05-15','SPENG','Surat Penjagan event-2005',NULL,NULL,NULL,NULL,'0','1134010051','0','no_lampiran.jpeg','2014-11-25 17:23:32'),('SPERINT/887/DEKAN/1/2014/54754','keluar','2014-02-22','SPRINT','Surat Penjagan event-2013',NULL,NULL,NULL,NULL,'1','1134010050','0','no_lampiran.jpeg','2014-11-26 10:41:24'),('SPERINT/980/REKTORAT/11/2014/5','keluar','2014-05-05','SKEP','Surat Pengantar Dosen-2002',NULL,NULL,NULL,NULL,'0','1134010051','1','no_lampiran.jpeg','2014-11-25 17:23:35'),('ST/180/REKTORAT/7/2014/5473eef','keluar','2014-11-21','UND','Surat Tugas-2009',NULL,'KERMAWA',NULL,NULL,'0','1134010051','0','no_lampiran.jpeg','2014-11-25 09:52:38'),('ST/215/FAKULTAS/1/2014/547458a','keluar','2014-08-04','SPENG','Surat permohonan santri-2013',NULL,NULL,NULL,NULL,'0','1134010050','1','no_lampiran.jpeg','2014-11-25 17:23:29'),('ST/321/FAKULTAS/7/2014/5473eee','keluar','2014-02-11','SPRINT','Surat Penjagan event-2013',NULL,'KERMAWA',NULL,NULL,'0','1134010051','1','no_lampiran.jpeg','2014-11-25 09:52:31'),('ST/347/FAKULTAS/6/2014/547458a','keluar','2014-05-13','PENG','Surat permohonan santri-2001',NULL,NULL,NULL,NULL,'1','1134010050','1','no_lampiran.jpeg','2014-11-25 17:23:33'),('ST/41/REKTORAT/5/2014/5473eeee','keluar','2014-10-26','B','Surat Pengantar Dosen-2009',NULL,'KERMAWA',NULL,NULL,'0','1134010050','1','no_lampiran.jpeg','2014-11-25 09:52:30'),('ST/439/FAKULTAS/5/2014/5473eef','keluar','2014-11-24','SPENG','Surat Penjagan event-2000',NULL,'KERMAWA',NULL,NULL,'1','1134010049','1','no_lampiran.jpeg','2014-11-25 09:52:33'),('ST/477/FAKULTAS/5/2014/5473eef','keluar','2014-01-06','ST','Surat Pengantar Dosen-2000',NULL,'KERMAWA',NULL,NULL,'1','1134010049','1','no_lampiran.jpeg','2014-11-25 09:52:32'),('ST/552/FAKULTAS/6/2014/5473eef','keluar','2014-07-13','SPENG','Surat Tugas-2005',NULL,'KERMAWA',NULL,NULL,'1','1134010051','0','no_lampiran.jpeg','2014-11-25 09:52:35'),('ST/611/FAKULTAS/4/2014/547458a','keluar','2014-05-06','SPRINT','Surat permohonan santri-2010',NULL,NULL,NULL,NULL,'1','1134010050','1','no_lampiran.jpeg','2014-11-25 17:23:30'),('ST/668/FAKULTAS/8/2014/547458a','keluar','2014-12-22','SPRINT','Surat permohonan santri-2008',NULL,NULL,NULL,NULL,'1','1134010051','0','no_lampiran.jpeg','2014-11-25 17:23:35'),('ST/687/DEKAN/10/2014/5473eef3e','keluar','2014-12-09','SPRINT','Surat Tugas-2002',NULL,'KERMAWA',NULL,NULL,'1','1134010051','0','no_lampiran.jpeg','2014-11-25 09:52:35'),('ST/889/REKTORAT/12/2014/547526','masuk','2014-10-13','SKEP','Surat permohonan santri-2011',NULL,NULL,NULL,NULL,'1','1134010050','0','no_lampiran.jpeg','2014-11-26 08:03:23'),('ST/935/FAKULTAS/11/2014/5473ef','keluar','2014-12-15','UND','Surat Penjagan event-2006',NULL,'KERMAWA',NULL,NULL,'0','1134010049','1','no_lampiran.jpeg','2014-11-25 09:52:57'),('ST/942/FAKULTAS/4/2014/5473eef','keluar','2014-05-16','ST','Surat Tugas-2008',NULL,'KERMAWA',NULL,NULL,'0','1134010051','1','no_lampiran.jpeg','2014-11-25 09:52:39'),('UND/143/FAKULTAS/1/2014/547458','keluar','2014-06-15','SPRINT','Surat permohonan santri-2001',NULL,NULL,NULL,NULL,'0','1134010049','0','no_lampiran.jpeg','2014-11-25 17:23:36'),('UND/162/KERMAW/6/2014/5473eef4','keluar','2014-11-22','SKEP','Surat Pengantar Dosen-2012',NULL,'KERMAWA',NULL,NULL,'0','1134010050','1','no_lampiran.jpeg','2014-11-25 09:52:36'),('UND/185/KERMAW/2/2014/5473eef2','keluar','2014-01-25','SPRINT','Surat Tugas-2006',NULL,'KERMAWA',NULL,NULL,'0','1134010050','0','no_lampiran.jpeg','2014-11-25 09:52:34'),('UND/193/REKTORAT/6/2014/547458','keluar','2014-08-17','UND','Surat Pengantar Dosen-2014',NULL,NULL,NULL,NULL,'0','1134010051','1','no_lampiran.jpeg','2014-11-25 17:23:36'),('UND/194/REKTORAT/2/2014/5473ee','keluar','2014-10-24','SPRINT','Surat Penjagan event-2009',NULL,'KERMAWA',NULL,NULL,'0','1134010049','1','no_lampiran.jpeg','2014-11-25 09:52:32'),('UND/238/DEKAN/3/2014/5473eef0f','keluar','2014-12-16','B','Surat permohonan santri-2013',NULL,'KERMAWA',NULL,NULL,'0','1134010050','0','no_lampiran.jpeg','2014-11-25 09:52:32'),('UND/349/REKTORAT/1/2014/5473ee','keluar','2014-08-23','B','Surat Tugas-2001',NULL,'KERMAWA',NULL,NULL,'0','1134010051','1','no_lampiran.jpeg','2014-11-25 09:52:39'),('UND/395/REKTORAT/3/2014/5473ef','keluar','2014-08-15','SPENG','Surat Tugas-2003',NULL,'KERMAWA',NULL,NULL,'0','1134010051','1','no_lampiran.jpeg','2014-11-25 09:52:58'),('UND/502/FAKULTAS/6/2014/5473ee','keluar','2014-12-04','SPRINT','Surat Pengantar Dosen-2006',NULL,'KERMAWA',NULL,NULL,'0','1134010050','0','no_lampiran.jpeg','2014-11-25 09:52:32'),('UND/513/FAKULTAS/8/2014/5473ee','keluar','2014-04-01','B','Surat Penjagan event-2008',NULL,'KERMAWA',NULL,NULL,'0','1134010049','1','no_lampiran.jpeg','2014-11-25 09:52:35'),('UND/566/DEKAN/5/2014/5473eeef5','keluar','2014-02-11','B','Surat Pengantar Dosen-2004',NULL,'KERMAWA',NULL,NULL,'0','1134010051','1','no_lampiran.jpeg','2014-11-25 09:52:31'),('UND/728/DEKAN/2/2014/5473ef121','keluar','2014-05-17','PENG','Surat Pengantar Dosen-2002',NULL,'KERMAWA',NULL,NULL,'0','1134010049','1','no_lampiran.jpeg','2014-11-25 09:53:06'),('UND/778/KERMAW/2/2014/5473eef6','keluar','2014-01-09','ST','Surat Pengantar Dosen-2007',NULL,'KERMAWA',NULL,NULL,'0','1134010050','1','no_lampiran.jpeg','2014-11-25 09:52:38'),('UND/826/FAKULTAS/12/2014/5473e','keluar','2014-11-17','ST','Surat Tugas-2006',NULL,'KERMAWA',NULL,NULL,'0','1134010051','0','no_lampiran.jpeg','2014-11-25 09:52:57');

#
# Structure for table "tujuan"
#

DROP TABLE IF EXISTS `tujuan`;
CREATE TABLE `tujuan` (
  `idsurat` varchar(255) DEFAULT NULL,
  `idtujuan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "tujuan"
#

INSERT INTO `tujuan` VALUES ('B/110/1000/HIMA/2014','tujuan5'),('B/110/1000/HIMA/2014','tujuan5'),('B/110/1000/HIMA/2014','tujuan5');

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

INSERT INTO `users` VALUES ('100','abmjehaboqit6','0'),('1134010049','abmjehaboqit6','1'),('1134010050','abmjehaboqit6','1'),('1134010051','abmjehaboqit6','0'),('1134010052','abmjehaboqit6','0'),('70','abmjehaboqit6','1');
