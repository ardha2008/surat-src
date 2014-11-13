<?php

session_start();
ob_start();

//error_reporting(0);
//===============================================
//==============DATABASE CONFIG==================
//===============================================

$host = 'localhost'; //Host koneksi
$user = 'root'; //Username database
$pass = ''; //Default root = kosong
$db = 'surat'; //Nama database

$koneksi = mysql_connect($host, $user, $pass) or die(mysql_error()) or die('Check connection');
mysql_select_db($db, $koneksi) or die('select database');


//================================================
//================================================
require 'models.php';
require 'proses.php';



?>