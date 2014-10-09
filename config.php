<?php session_start();
ob_start();

//===============================================
//==============DATABASE CONFIG==================
//===============================================

$host='localhost'; //Host koneksi
$user='root';   //Username database
$pass='';       //Default root = kosong
$db='surat';    //Nama database

$koneksi=mysql_connect($host,$user,$pass) or die(mysql_error());
mysql_select_db($db,$koneksi);

?>