<?php 

function get_pegawai($order_by='created_at'){
    $query=mysql_query("select * from pegawai order by $order_by DESC");
    return $query;
}

function get_last_pegawai($order_by='created_at',$limit=5){
    $query=mysql_query('select * from pegawai order by created_at DESC limit 5 ');
    return $query;
}

function get_bagian($order_by='idbagian'){
    $query=mysql_query("select * from bagian order by $order_by desc");
    return $query;
}

function get_login($tampil){
    $aktif=$_SESSION['idusers'];
    $query=mysql_query("select * from users a, pegawai b, bagian c where a.idusers=b.idpegawai and a.idusers='$aktif' and a.idbagian=c.idbagian");
    $data=mysql_fetch_array($query);
    return $data[$tampil];
}

function get_surat($get='all'){
    switch ($get){ 
	case 'all' : $query=mysql_query("select * from surat order by created_at DESC");
	break;

	case 'masuk' : $query=mysql_query("select * from surat where jenis_surat='masuk' order by created_at DESC");
	break;

	case 'keluar' : $query=mysql_query("select * from surat where jenis_surat='keluar' order by created_at DESC");
	break;

	default :
    $query=mysql_query("select * from surat order by created_at DESC");
    }
    return $query;
}

function get_surat_row($jenis='masuk',$limit='5'){
    $query=mysql_query("select * from surat where jenis_surat='$jenis' order by created_at limit $limit");
    return $query;
}

function get_one($id=null){
    if($id==null) die('Periksa parameter fungsi');
    
    $query=mysql_query("select * from surat where idsurat='$id'");
    return $query;
}

function get_last_surat($order_by='created_at',$limit=5){
    $query=mysql_query('select * from surat order by created_at DESC limit 5 ');
    return $query;
}

function get_last_login(){
    $query=mysql_query("select * from login_logs a, users b ,pegawai c,bagian d where a.idusers=b.idusers and b.idusers=c.idpegawai and b.idbagian=d.idbagian order by time limit 2");
    return $query;
}

function get_one_pegawai($id){
    $query=mysql_query("select * from pegawai a, users b where b.idusers=a.idpegawai and a.idpegawai='$id'");
    return $query;
}

//================================PEMISAH / CHART ==========================================================

function laporan($bulan='1',$jenis='keluar'){
    //if($bulan==null) $bulan=date('m');
    $query=mysql_query("select jenis_surat,YEAR(surat.tanggal_surat) as tahun, MONTH(surat.tanggal_surat) as bulan, count(*) as jumlah from surat where tanggal_surat LIKE '2014-$bulan%' group by jenis_surat,tahun, bulan");
    $data=mysql_fetch_array($query);
    return $data['jumlah'];
}

function rasio($jenis_surat='keluar'){
    $query=mysql_query("select jenis_surat,count(*) as jumlah from surat where jenis_surat='$jenis_surat' group by jenis_surat");
    $result=mysql_fetch_array($query);
    return $result['jumlah'];
}

?>