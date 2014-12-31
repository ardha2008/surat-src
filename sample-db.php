<?php 

require_once 'config.php';
//mysqli_connect('localhost','root','','surat');
ini_set('max_execution_time', 300);

for($i=1;$i<=200;$i++){

$jenis=array('SPENG','SB','UND','ST','PENG','SPERINT','SKEP');
$wow=array_rand($jenis);
$no_urut=rand(1,1000);
$asal=array('KERMAW','DEKAN','FAKULTAS','REKTORAT');
$asal_x=array_rand($asal);
$bulan=rand(1,12);
$tahun='2014';

$idsurat=$jenis[$wow].'/'.uniqid().'/'.$no_urut.'/'.$asal[$asal_x].'/'.$bulan.'/'.$tahun.'/'.uniqid();

$tipe=array('keluar','masuk');
$tipe_x=array_rand($tipe);
$srt=$tipe[$tipe_x];
//echo ;

$tgl_surat=rand(2014,2014).'-'.rand(1,12).'-'.rand(1,30);

$perihal=array(
	'Surat permohonan santri',
	'Surat Pengantar Dosen',
	'Surat Penjagan event',
	'Surat Tugas'
	);

$perihal_x=array_rand($perihal);
$perihal_b=$perihal[$perihal_x].'-'.rand(2000,2014);
$public=rand(0,1);
//echo $public;

$kategori=array('B','PENG','SKEP','SPENG','SPRINT','ST','UND');
$kategori_x=array_rand($kategori);
$kategori_b=$kategori[$kategori_x];

$posting=array('1134010051','1134010052','1134010053','1134010054');
$posting_x=array_rand($posting);
$posting_b=$posting[$posting_x];

$tujuan=array('a','b','c','d','e','f','g','h');
$tujuan_x=array_rand($tujuan);
$tujuan_b=$tujuan[$tujuan_x];

$deleted=rand(0,1);
//echo $tujuan_b;

//exit();

    $a=mysql_query("
    insert into surat 
    (idsurat,jenis_surat,tanggal_surat,idkategori,perihal,deleted,publikasi) values 
    ('$idsurat','$srt','$tgl_surat','$kategori_b','$perihal_b','$deleted','$public') ",$koneksi) or die(mysql_error());

    $b=mysql_query("insert into posting (idpegawai,idsurat) values ('$posting_b','$idsurat')",$koneksi) or die(mysql_error());
    $c=mysql_query("insert into asal (idsurat,nama_asal,alamat_asal) values ('$idsurat','UPN JATIM','Jalan Rungkut')",$koneksi) or die(mysql_error());
    $d=mysql_query("insert into tujuan (idsurat,nama_tujuan,alamat_tujuan) values ('$idsurat','UPN JATIM','Jalan Rungkut')");
}


?>