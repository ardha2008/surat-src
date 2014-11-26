<?php 

require_once 'config.php';
//mysqli_connect('localhost','root','','surat');

$jenis=array('SPENG','SB','UND','ST','PENG','SPERINT','SKEP');
$wow=array_rand($jenis);
$no_urut=rand(1,1000);
$asal=array('KERMAW','DEKAN','FAKULTAS','REKTORAT');
$asal_x=array_rand($asal);
$bulan=rand(1,12);
$tahun='2014';

$idsurat=$jenis[$wow].'/'.$no_urut.'/'.$asal[$asal_x].'/'.$bulan.'/'.$tahun.'/'.uniqid();

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

$posting=array('1134010049','1134010050','1134010051','1134010051');
$posting_x=array_rand($posting);
$posting_b=$posting[$posting_x];

for($i=1;$i<=50;$i++){
    $a=mysql_query("insert into surat (idsurat,jenis_surat,tanggal_surat,idkategori,posting,perihal,public) values ('$idsurat','$srt','$tgl_surat','$kategori_b','$posting_b','$perihal_b',$public) ",$koneksi) or die(mysql_error());
}


?>