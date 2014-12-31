<?php

session_start();
ob_start();

//===DEFINISI======================
define('nama_aplikasi','Surat Keluar Masuk');

//=================KONFIGURASI SMS GATEWAY=============
//PROTOTYPE 1
define('SMS_GATEWAY',false);
define('SMS_TUJUAN','089677052285');
define('SMS_PASSWORD','ardha');
define('SMS_SERVER','192.168.43.1:9090'); //Berupa IP SMS Gateway server : xxx.xxx.xxx.xxx:port

//error_reporting(0);
//===============================================
//==============DATABASE CONFIG==================
//===============================================

$host = 'localhost'; //Host koneksi
$user = 'root'; //Username database
$pass = ''; //Default root = kosong
$db = 'surat-rb'; //Nama database

$koneksi = mysql_connect($host, $user, $pass) or die(mysql_error()) or die('Check connection');
mysql_select_db($db, $koneksi) or die('select database');


//================================================
//================================================
require 'models.php';
require 'proses.php';

//===========MOBILE DETECT=============
require_once 'lib/Mobile_Detect.php';

$diakses=new Mobile_Detect;
//=====================================

?>