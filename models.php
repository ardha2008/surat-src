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

function get_last_surat($order_by='created_at',$limit=5){
    $query=mysql_query('select * from surat order by created_at DESC limit 5 ');
    return $query;
}


?>