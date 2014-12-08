<?php 

function get_pegawai($order_by='created_at'){
    $query=mysql_query("select * from pegawai a, users b, bagian c where b.idusers=a.idpegawai and b.idbagian=c.idbagian order by $order_by DESC");
    return $query;
}

function get_surat_by($by,$kondisi,$limit=null){
    $query=mysql_query("select * from surat where $by='$kondisi' order by $by ASC limit $limit") or die(mysql_error());
    return $query;
}

function get_surat_count(){
    $query=mysql_query("select b.keterangan_kategori as kategori ,count(*) as jumlah from surat a , kategori b where a.idkategori=b.idkategori group by a.idkategori");
    return $query;
}

function get_last_pegawai($order_by='created_at',$limit=5){
    $query=mysql_query('select * from pegawai order by created_at DESC limit 5 ');
    return $query;
}

function get_bagian($order_by='idbagian'){
    $query=mysql_query("select * from bagian order by $order_by ASC");
    return $query;
}

function get_login($tampil){
    $aktif=$_SESSION['idusers'];
    $query=mysql_query("select * from users a, pegawai b, bagian c where a.idusers=b.idpegawai and a.idusers='$aktif' and a.idbagian=c.idbagian");
    $data=mysql_fetch_array($query);
    return $data[$tampil];
}

function get_kategori($order_by='idkategori'){
    $query=mysql_query("select * from kategori order by $order_by DESC");
    return $query;
}

function get_count_posting(){
    $query=mysql_query("select nama,count(*) as jumlah from surat a, pegawai b where a.posting=b.idpegawai group by nama");
    return $query;
}

function get_surat($get='all'){
    switch ($get){ 
	case 'all' : $query=mysql_query("select * from surat order by tanggal_surat DESC");
	break;

	case 'masuk' : $query=mysql_query("select * from surat where jenis_surat='masuk' and `delete`='0' order by tanggal_surat DESC");
	break;

	case 'keluar' : $query=mysql_query("select * from surat where jenis_surat='keluar' and `delete`='0' order by tanggal_surat DESC");
	break;

	default :
    $query=mysql_query("select * from surat order by created_at DESC");
    }
    return $query;
}

function get_surat_row($jenis='masuk',$limit='5'){
    $query=mysql_query("select * from surat where jenis_surat='$jenis' order by tanggal_surat DESC limit $limit");
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
    $query=mysql_query("select * from `logs` a, users b ,pegawai c,bagian d where a.idusers=b.idusers and b.idusers=c.idpegawai and b.idbagian=d.idbagian order by time DESC limit 5");
    return $query;
}

function get_one_pegawai($id){
    $query=mysql_query("select * from pegawai a, users b where b.idusers=a.idpegawai and a.idpegawai='$id'");
    return $query;
}

function riwayat($posting){
    $query=mysql_query("select * from surat where posting='$posting' order by created_at DESC");
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

//==================================LAPORAN LAPORAN==============================================================
function cari_laporan($dari,$sampai,$berdasar='surat'){
    $query=mysql_query("select * from surat where tanggal_surat between '$dari' and '$sampai' and `delete`='0' ");
    return $query;   
}

//==================================SAMPAH ======================================================================

function get_sampah($filter='semua'){
    
    if($filter=='semua'){
        $query=mysql_query("select * from surat where `delete`='1' order by jenis_surat DESC");    
    }
    
    if($filter=='masuk'){
        $query=mysql_query("select * from surat where jenis_surat='masuk' and `delete`='1' order by jenis_surat DESC");    
    }
    
    if($filter=='keluar'){
        $query=mysql_query("select * from surat where jenis_surat='keluar' and `delete`='1' order by jenis_surat DESC");    
    }
    
    return $query;
}

function count_sampah($filter='all'){
    
    switch($filter){
        
        case 'masuk':
        $query=mysql_query("select count(*) as jumlah from surat where jenis_surat='masuk' and `delete`='1' ");
        break;
        
        case 'keluar':
        $query=mysql_query("select count(*) as jumlah from surat where jenis_surat='keluar' and `delete`='1' ");
        break;
        
        default:
        $query=mysql_query("select count(*) as jumlah from surat where `delete`='1' ");
        break;
    }
    
    $return=mysql_fetch_array($query);
    return $return['jumlah'] ;
}


//=====================================LOCK=============================================================

function lock($i){
    if(get_login('idbagian')!=$i){
        require './module/security/lock.php';
        die();
    }
}
?>