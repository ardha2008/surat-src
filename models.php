<?php 

function get_pegawai($order_by='created_at'){
    $query=mysql_query("select * from pegawai a, bagian b where a.idbagian=b.idbagian order by $order_by DESC");
    return $query;
}

function get_surat_by($by,$kondisi,$limit=null){
    $query=mysql_query("select * from surat where $by='$kondisi' order by $by ASC limit $limit") or die(mysql_error());
    return $query;
}

function get_surat_count(){
    $query=mysql_query("SELECT b.keterangan_kategori as kategori,count(*) as jumlah FROM surat a, kategori b where a.idkategori=b.idkategori  group by a.idkategori");
    return $query;
}

function get_last_pegawai($order_by='created_at',$limit=5){
    $query=mysql_query('select * from pegawai order by created_at DESC limit 5 ');
    return $query;
}

function get_bagian($order_by='idbagian'){
    $query=mysql_query("select * from bagian order by $order_by DESC");
    return $query;
}

function get_login($tampil){
    $aktif=$_SESSION['idusers'];
    $query=mysql_query("select * from pegawai a, bagian b where a.idbagian=b.idbagian and a.idpegawai='$aktif'");
    $data=mysql_fetch_array($query);
    return $data[$tampil];
}

function get_kategori($order_by='idkategori'){
    $query=mysql_query("select * from kategori order by $order_by DESC");
    return $query;
}

function get_count_posting(){
    $query=mysql_query("select nama,count(*) as jumlah from surat a, pegawai b, posting c where c.idpegawai=b.idpegawai group by nama") or die(mysql_error());
    return $query;
}

function get_surat($get='all'){
    switch ($get){ 
	case 'all' : $query=mysql_query("select * from surat a, tujuan b, asal c where a.idsurat=b.idsurat and c.idsurat=a.idsurat order by tanggal_surat DESC");
	break;

	case 'masuk' : $query=mysql_query("select * from surat a, tujuan b, asal c where a.idsurat=b.idsurat and c.idsurat=a.idsurat and deleted='0' and jenis_surat='masuk' order by tanggal_surat DESC");
	break;

	case 'keluar' : $query=mysql_query("select * from surat a, tujuan b, asal c where a.idsurat=b.idsurat and c.idsurat=a.idsurat and deleted='0' and jenis_surat='keluar' order by tanggal_surat DESC");
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
    
    $query=mysql_query("select * from surat a, tujuan b,posting c, pegawai d, asal e where a.idsurat='$id' and e.idsurat=a.idsurat and a.idsurat=b.idsurat and a.idsurat=c.idsurat and c.idpegawai=d.idpegawai") or die(mysql_error());
    return $query;
}

function get_last_surat($order_by='created_at',$limit=5){
    $query=mysql_query('select * from surat order by created_at DESC limit 5 ');
    return $query;
}

function get_last_login(){
    $query=mysql_query("select * from `logs` a, pegawai b where a.idusers=b.idpegawai order by waktu DESC limit 5");
    return $query;
}

function get_one_pegawai($id){
    $query=mysql_query("select * from pegawai where idpegawai='$id'");
    return $query;
}

function riwayat($posting){
    $query=mysql_query("select * from posting a, pegawai b, surat c where a.idpegawai='$posting' and a.idpegawai=b.idpegawai and a.idsurat=c.idsurat and c.deleted='0' order by c.created_at DESC");
   // echo "select * from posting a, pegawai b, surat c where a.idpegawai='$posting' and a.idpegawai=b.idpegawai and a.idsurat=c.idsurat and c.deleted='0' order by c.created_at DESC";
   // exit();
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
    $query=mysql_query("select * from surat where tanggal_surat between '$dari' and '$sampai' and `deleted`='0' ");
    return $query;   
}

function laporan_hari($hari){
    $query=mysql_query("select * from surat where created_at like '%$hari%' order by created_at DESC") or die(mysql_error());
    return $query;
}

function count_hari($berdasar='jenis_surat',$hari){
    $query=mysql_query("select $berdasar, count(*) as jumlah from surat where deleted='0' group by $berdasar order by created_at DESC");
    return $query;
}

function laporan_bulan($bulan){
    $tahun=date('Y');
    $query=mysql_query("select * from surat where tanggal_surat between '$tahun-$bulan-01' and '$tahun-$bulan-31' and deleted='0' ") or die(mysql_error());
    return $query;
}

function count_bulan($bulan){
    $tahun=date('Y');
    $query=mysql_query("select jenis_surat,count(*) as jumlah from surat where tanggal_surat between '$tahun-$bulan-01' and '$tahun-$bulan-31' and deleted='0' group by jenis_surat  ") or die(mysql_error());
    return $query;
}

function pegawai_harian($hari){
    $query=mysql_query("SELECT nama,count(*) as jumlah FROM posting a,surat b,pegawai c where a.idsurat=b.idsurat and a.idpegawai=c.idpegawai and b.deleted=0 and b.created_at LIKE '%$hari%' group by a.idpegawai order by jumlah DESC") or die(mysql_error());
    return $query;    
}

function pegawai_logs($hari){
    
    $query=mysql_query("select * from logs a,pegawai b where a.idusers=b.idpegawai and waktu LIKE '%$hari%' order by created_at DESC") or die(mysql_error());
    return $query;    
}

function pegawai_bulanan($bulan){
    $tahun=date('Y');
    $query=mysql_query("SELECT nama,count(*) as jumlah FROM posting a,surat b,pegawai c where a.idsurat=b.idsurat and a.idpegawai=c.idpegawai and b.deleted=0 and tanggal_surat between '$tahun-$bulan-01' and '$tahun-$bulan-31' group by a.idpegawai order by jumlah DESC") or die(mysql_error());
    return $query;    
}

function pegawai_logs_bulanan($bulan){
    $tahun=date('Y');
    $query=mysql_query("select * from logs a,pegawai b where a.idusers=b.idpegawai and waktu between '$tahun-$bulan-01' and '$tahun-$bulan-31' order by waktu DESC") or die(mysql_error());
    return $query;    
}

function pegawai_seluruh(){
    $query=mysql_query("SELECT nama,count(*) as jumlah FROM posting a,surat b,pegawai c where a.idsurat=b.idsurat and a.idpegawai=c.idpegawai and b.deleted=0 group by a.idpegawai") or die(mysql_error());
    return $query;
}
//==================================SAMPAH ======================================================================

function get_sampah($filter='semua'){
    
    if($filter=='semua'){
        $query=mysql_query("select * from surat where `deleted`='1' order by jenis_surat DESC");    
    }
    
    if($filter=='masuk'){
        $query=mysql_query("select * from surat where jenis_surat='masuk' and `deleted`='1' order by jenis_surat DESC");    
    }
    
    if($filter=='keluar'){
        $query=mysql_query("select * from surat where jenis_surat='keluar' and `deleted`='1' order by jenis_surat DESC");    
    }
    
    return $query;
}

function count_sampah($filter='all'){
    
    switch($filter){
        
        case 'masuk':
        $query=mysql_query("select count(*) as jumlah from surat where jenis_surat='masuk' and `deleted`='1' ");
        break;
        
        case 'keluar':
        $query=mysql_query("select count(*) as jumlah from surat where jenis_surat='keluar' and `deleted`='1' ");
        break;
        
        default:
        $query=mysql_query("select count(*) as jumlah from surat where `deleted`='1' ");
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

function capture($aksi){
    $id=get_login('idpegawai');
    $query=mysql_query("insert into `logs` (idusers,aksi) values ('$id','$aksi')");
    return true;
}
?>