<?php

/**
 * Simple Core v.1
 * Struktur core / Index
 * - Function
 * - Home , ex : login, logout, etc
 * - Surat
 * - Pegawai
 * - Report
 * - Users
 * 
 */

//function lock($hak_akses){
//    if(get_login('idbagian') != $hak_akses) exit('Restricted');
//}
//
function filter($input){
    $input=trim($input);
    $input=strip_tags($input);
    $input=nl2br($input);
    $input=addslashes($input);
    $input=stripslashes($input);
    $input=str_ireplace("'", "%", $input);
    $input=str_ireplace( "''", '%', $input );
    $input=str_ireplace( '""', '%', $input );
    $query = preg_replace( '|(?<!%)%s|', "'%s'", $input );
    $input=htmlentities($input, ENT_QUOTES);
    $input=ltrim($input);
    $input=rtrim($input);
return $input;
}

function encrypt($string=null){
   // if($string==null) exit('Cek parameter');
    
    $key='abcdefghijklmnopqrstuvwxyz1234567890';
    $result=crypt($string,$key);
    return $result;    
}

function random($length = 15, $symbol = false , $case_sensitive = false ){    
    $chars = 'abcdefghijklmnopqrstuvwxyz';
        if ( $case_sensitive)
 	     	$chars .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';    
  		if ( $symbol )
            $chars .= '!@#$%^&*()';    
    		$str = '';
            
        for($i=0;$i < $length; $i++ )
  		        $str .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
    		return $str;
	    }

//=================================================================
//=========================PROSES LOGIN============================
//=================================================================

if(isset($_POST['login'])){
    $id=$_POST['id'];
    $password=encrypt($_POST['password']);
    
    $query=mysql_query("select * from pegawai where idpegawai='$id' and password='$password'") ;
    
    if(mysql_num_rows($query)>0){
        $result=mysql_fetch_array($query);
        
        $_SESSION['idusers']=$result['idpegawai'];
        $_SESSION['login']=true;
        
        $catch=$_SESSION['idusers'];
        
        mysql_query("insert into `logs` (idusers,aksi) values ('$catch','login')");
        
        header('Location:./?page=dashboard');
    }else{
        $message='Gagal Login';
    }
}

//=================================================================
//=========================TAMBAH PEGAWAI==========================
//=================================================================

if(isset($_POST['tambah_pegawai'])){
    $nip=$_POST['nip'];
    $nama=$_POST['nama'];
    $tl=$_POST['tl'];
    $alamat=$_POST['alamat'];
    $kota=$_POST['kota'];
    $telepon=$_POST['telepon'];
    $ponsel=$_POST['ponsel'];
    
    //Default password
    $password=encrypt('1234');
    
    //Bagian
    $bagian=$_POST['bagian'];
    
    if(isset($_FILES['foto']['tmp_name'])){
        $new_name=random().'.jpeg';

        $target_path = './img/foto/';
        $target_path = $target_path . basename($new_name); 
        $foto=$new_name;
        
        if(move_uploaded_file($_FILES['foto']['tmp_name'], $target_path)) {
            
        } else{
            $failed=1;
            $foto='nophoto.jpg';
        }
    }else{
        $foto='nophoto.jpg';
    }
    
    $query=mysql_query("insert into pegawai (idpegawai,idbagian,nama,alamat,kota,tanggal_lahir,telepon,ponsel,foto,password) values ('$nip','$bagian','$nama','$alamat','$kota','$tl','$telepon','$ponsel','$foto','$password')") or die(mysql_error());
    
    capture('menambahkan pegawai');
    
    if($query){
        $success=1;
    }else{
        mysql_error();
    }
}

//=================================================================
//=========================PROSES EDIT PEGAWAI=====================
//=================================================================

if(isset($_POST['edit_pegawai'])){
    $old=$_POST['old'];
    
    $nip=$_POST['nip'];
    $nama=$_POST['nama'];
    $tl=$_POST['tl'];
    $alamat=$_POST['alamat'];
    $kota=$_POST['kota'];
    $telepon=$_POST['telepon'];
    $ponsel=$_POST['ponsel'];
    
    if(isset($_FILES['foto']['tmp_name'])){
        $new_name=random().'.jpeg';

        $target_path = './img/foto/';
        $target_path = $target_path . basename($new_name); 
        $foto=$new_name;
        
        if(move_uploaded_file($_FILES['foto']['tmp_name'], $target_path)) {

        } else{
            $failed=1;
            $foto='nophoto.jpg';
        }
    }else{
        $foto=$_POST['old_foto'];
    }
    
    
    $update="
    update pegawai set 
    idpegawai='$nip',
    nama='$nama',
    tanggal_lahir='$tl',
    alamat='$alamat',
    kota='$kota',
    telepon='$telepon',
    ponsel='$ponsel',
    foto='$foto'
    
    where idpegawai='$old'
    ";
    
    $query=mysql_query($update) or die(mysql_error());
    capture("mengubah data pegawai $idpegawai");
    
}

//=================================================================
//=========================UPDATE PROFIL===========================
//=================================================================

if(isset($_POST['update_personal'])){
    $old=$_SESSION['idusers'];
    
    $nip=$_POST['nip'];
    $nama=$_POST['nama'];
    $alamat=$_POST['alamat'];
    $kota=$_POST['kota'];
    $telepon=$_POST['telepon'];
    $ponsel=$_POST['ponsel'];
    
    $update=mysql_query("update pegawai set idpegawai='$nip', nama='$nama', alamat='$alamat',kota='$kota',telepon='$telepon',ponsel='$ponsel' where idpegawai='$old'");
    $update2=mysql_query("update users set idusers='$nip' where idusers='$old'");
    $update3=mysql_query("update surat set posting='$nip' where posting='$old'");
    
    $_SESSION['idusers']=$nip;
    
    if($update && $update2){
        $success=1;
    }
}



//=================================================================
//=========================PROSES TAMBAH BAGIAN====================
//=================================================================

if(isset($_POST['tambah_bagian'])){
    $keterangan=$_POST['keterangan'];
    
    if(mysql_fetch_row(mysql_query("select * from bagian where keterangan='$keterangan'")) < 1){
        $query=mysql_query("insert into bagian values ('','$keterangan','0')");
        if($query){
            $success=1;
        }else{
         exit('error');   
        }
    }else{
        $failed=1;
    }    
}

//=================================================================
//=========================PROSES TAMBAH SURAT=====================
//=================================================================

if(isset($_POST['tambah_surat'])){
    $id=$_POST['idsurat'];
    $jenis_surat=$_POST['jenis_surat'];
    
    $tanggal_surat=$_POST['tanggal_surat'];
    $tanggal_surat=explode('/',$tanggal_surat);
    $tanggal_surat=$tanggal_surat[2].'-'.$tanggal_surat[1].'-'.$tanggal_surat[0];
   // echo $tanggal_surat;
   // exit();
    $kategori=$_POST['kategori'];
    $perihal=$_POST['perihal'];
    $publikasi=$_POST['publikasi'];
    
    $disposisi=$_POST['disposisi'];
    
    $tujuan=$_POST['tujuan'];
    $idtujuan=strtoupper(str_replace(' ','-',$_POST['tujuan']));
    
    $nama_tujuan=$_POST['tujuan'];
    $alamat_tujuan=$_POST['alamat_tujuan'];
    
    $nama_asal=$_POST['nama_asal'];
    $alamat_asal=$_POST['alamat_asal'];
    
    
    $keyword=$_POST['keyword'];
    $posting=get_login('idpegawai');
     
   /**
    * JIKA LAMPIRAN MENGGUNAKAN UPLOAD 
    * HILANGKAN KOMENTAR DIBAWAH INI
    * 
    */
    //   $foto=$_POST['lampiran'];
    if(isset($_FILES['lampiran']['tmp_name'])){
        $new_name=random().'.jpeg';
    
        $target_path = './img/surat/';
        $target_path = $target_path . basename($new_name); 
        $foto=$new_name;
        
        if(move_uploaded_file($_FILES['lampiran']['tmp_name'], $target_path)) {
            
        } else{
            $failed=1;
            $foto='no_lampiran.jpeg';
        }
    }else{
        $foto='no_lampiran.jpeg';
    }
    
    $query=mysql_query("INSERT INTO surat (idsurat, jenis_surat, tanggal_surat, idkategori ,perihal, disposisi,catatan,publikasi,lampiran) VALUES ('$id','$jenis_surat', '$tanggal_surat','$kategori','$perihal','$disposisi','$keyword','$publikasi','$foto')") or die(mysql_error());
    $query2=mysql_query("insert into tujuan (idsurat,nama_tujuan,alamat_tujuan) values ('$id','$nama_tujuan','$alamat_tujuan')") or die(mysql_error());
    $query3=mysql_query("insert into asal (idsurat,nama_asal,alamat_asal) values ('$id','$nama_asal','$alamat_asal') ") or die(mysql_error());
    $query4=mysql_query("insert into posting values ('$posting','$id') ") or die(mysql_error());
    
    capture("Input surat $id");
    
    if($query){
    
        $success=1;
        
        if(SMS_GATEWAY == true){
            $text="$tanggal_surat - $id - Surat $jenis_surat - $perihal";
            $send=true;
        }
    
    }
/**
 *  CATATAN : LAMPIRAN AKAN DIBUAT DINAMIK;
 * Saat ini cuma ada 1 lampiran, next update beberapa lampiran
 * v.1.1 
 */
 
    
}

//=================================================================
//=========================UPDATE SURAT=====================
//=================================================================

if(isset($_POST['update_surat'])){
    $old=$_POST['old_idsurat'];
    
    $id=$_POST['idsurat'];
    $jenis_surat=$_POST['jenis_surat'];
    $tanggal_surat=$_POST['tanggal_surat'];
    $perihal=$_POST['perihal'];
    $kategori=$_POST['kategori'];
    $publikasi=$_POST['publikasi'];
    
    $disposisi=$_POST['disposisi'];
    $catatan=$_POST['tujuan'];
   // $asal_surat=$_POST['asal_surat'];
  //  $keyword=$_POST['keyword'];
    //$posting=get_login('idpegawai');
    
    $nama_tujuan=$_POST['tujuan'];
    $alamat_tujuan=$_POST['alamat_tujuan'];
    
    $nama_asal=$_POST['nama_asal'];
    $alamat_asal=$_POST['alamat_asal'];
    
    //$nama_tujuan=$_POST['tujuan'];
   // $alamat_tujuan=$_POST['tujuan_surat'];
   /**
    * JIKA LAMPIRAN MENGGUNAKAN UPLOAD 
    * HILANGKAN KOMENTAR DIBAWAH INI
    * 
    */
    //$foto=$_POST['lampiran'];
    
      
    if(isset($_FILES['lampiran']['tmp_name'])){
        
        $new_name=random().'.jpeg';
    
        $target_path = './img/surat/';
        $target_path = $target_path . basename($new_name); 
        $foto=$new_name;
        
        if(move_uploaded_file($_FILES['lampiran']['tmp_name'], $target_path)) {
            if($_POST['old_lampiran'] != 'no_lampiran.jpeg'){
                unlink('./img/surat/'.$_POST['old_lampiran']);
            }    
        } else{
            $failed=1;
            $foto=$_POST['old_lampiran'];
        }
    }else{
        $foto=$_POST['old_lampiran'];
    }
    
    $query="UPDATE surat SET 
    idsurat='$id',
    jenis_surat='$jenis_surat', 
    tanggal_surat='$tanggal_surat',
    idkategori='$kategori',
    perihal='$perihal',
    disposisi='$disposisi',
    publikasi='$publikasi',
    catatan='$keyword',
    lampiran='$foto'
    WHERE idsurat='$old'";
    $query=mysql_query($query) or die(mysql_error());
    
    $query2=" UPDATE tujuan SET
    nama_tujuan='$nama_tujuan',
    alamat_tujuan='$alamat_tujuan'
    where idsurat='$old'
    ";
    $query2=mysql_query($query2) or die(mysql_error());
    $query3=mysql_query("update asal set idsurat='$id',nama_asal='$nama_asal',alamat_asal='$alamat_asal' where idsurat='$old'  ") or die(mysql_error());
    $query4=mysql_query("update posting set idsurat='$id' where idsurat='$old' ") or die(mysql_error());
    
    capture("Mengubah surat $id");
    
    if($query){
        $_SESSION['success']=true;
        header("Location:./?page=surat/edit&id=$id");
    }
/**
 *  CATATAN : LAMPIRAN AKAN DIBUAT DINAMIK;
 * Saat ini cuma ada 1 lampiran, next update beberapa lampiran
 * v.1.1 
 */
 
    
}

//=================================================================
//=========================CHANGE PASSWORD=========================
//=================================================================

if(isset($_POST['change-password'])){
    $aktif=$_SESSION['idusers'];
    $query=mysql_query("select * from users where idusers='$aktif' ");
    $cek=mysql_fetch_array($query);
    
    $get_old=$cek['password'];
    $old_input=encrypt($_POST['old']);
    $new_input=encrypt($_POST['new']);
    $renew_input=encrypt($_POST['renew']);
    

    if($get_old != $old_input){
        $failed=1;
    }else if($new_input != $renew_input){
        $failed=2;
    }else{
        $query=mysql_query("update users set password='$new_input' where idusers='$aktif' ");
        $success=1;
    }

}

//=================================================================
//=========================CARI LAPORAN============================
//=================================================================

if(isset($_POST['cari_laporan'])){
    $tanggal_awal=$_POST['tanggal_awal'];
    $bulan_awal=$_POST['bulan_awal'];
    $tahun_awal=$_POST['tahun_awal'];    

    $tanggal_akhir=$_POST['tanggal_akhir'];
    $bulan_akhir=$_POST['bulan_akhir'];
    $tahun_akhir=$_POST['tahun_akhir'];
    
    $dari="$tahun_awal-$bulan_awal-$tanggal_awal";
    $sampai="$tahun_akhir-$bulan_akhir-$tanggal_akhir";
    //echo $dari.'Sampai'.$sampai;
    
    $berdasar=$_POST['berdasar'];
    //$result=cari_laporan($dari,$sampai,$berdasar);
    $query=mysql_query("select * from surat where $berdasar between '$dari' and '$sampai' and `delete`='0'");
}

//=================================================================
//=========================PUBLIKASI===============================
//=================================================================
if(isset($_GET['publikasi']) && isset($_GET['id'])){
    $publikasi=$_GET['publikasi'];
    $id=$_GET['id'];
    
    $proses=mysql_query("update surat set public='$publikasi' where idsurat='$id'") or die(mysql_error());
    if($proses){
        header('Location:./?page=surat/index');
    }else{
        mysql_error();
    }
}


//=================================================================
//=========================IMPORT FILE EXCEL=======================
//=================================================================

if(isset($_POST['import_file'])){
        // menggunakan class phpExcelReader
    include "./lib/excel_reader2.php";
    
    // koneksi ke mysql
//    mysql_connect("dbHost", "dbUser", "dbPass");
//    mysql_select_db("dbname");
    
    // membaca file excel yang diupload
    $data = new Spreadsheet_Excel_Reader($_FILES['userfile']['tmp_name']);
    
    // membaca jumlah baris dari data excel
    $baris = $data->rowcount($sheet_index=0);
    
    // nilai awal counter untuk jumlah data yang sukses dan yang gagal diimport
    $sukses = 0;
    $gagal = 0;
    
    // import data excel mulai baris ke-2 (karena baris pertama adalah nama kolom)
    for ($i=2; $i<=$baris; $i++)
    {
      // membaca data nim (kolom ke-1)
      $idsurat = $data->val($i, 1);
      // membaca data nama (kolom ke-2)
      $perihal = $data->val($i, 4);
      // membaca data alamat (kolom ke-3)
//      $alamat = $data->val($i, 3);
    
      // setelah data dibaca, sisipkan ke dalam tabel mhs
      $query = "INSERT INTO surat (idsurat,perihal) VALUES ('$idsurat', '$perihal')";
      $hasil = mysql_query($query);
    
      // jika proses insert data sukses, maka counter $sukses bertambah
      // jika gagal, maka counter $gagal yang bertambah
      if ($hasil) $sukses++;
      else $gagal++;
    }
    
    // tampilan status sukses dan gagal
    echo "<h3>Proses import data selesai.</h3>";
    echo "<p>Jumlah data yang sukses diimport : ".$sukses."<br>";
    echo "Jumlah data yang gagal diimport : ".$gagal."</p>";
}

//=================================================================
//=========================UPDATE HAK AKSES========================
//=================================================================

if(isset($_POST['update_hak_akses'])){
    $jumlah=count($_POST['hak_akses']);
    //print_r($_POST['hak_akses']);
    //exit();
    for($i=0;$i<$jumlah;$i++){
        $id=$_POST['id'][$i];
        $bagian=$_POST['hak_akses'][$i];
        
        $update=mysql_query("update pegawai set idbagian='$bagian' where idpegawai='$id' ");
    }
   
    $success=1;
}

//=================================================================
//=========================MENU CARI ==============================
//=================================================================

if(isset($_POST['cari'])){

    $cari = $_POST['cari'];
    
    if($cari=='tanggal'){
        $tanggal=$_POST['tahun'].'-'.$_POST['bulan'].'-'.$_POST['tanggal'];
        $query=mysql_query("select * from surat where tanggal_surat='$tanggal' and `delete`=0 and public=1") or die();
    
    }

}

//=================================================================
//=========================CETAK LAPORAN===========================
//=================================================================

if(isset($_POST['cetak_laporan'])){
    $tanggal_awal=$_POST['tanggal_awal'];
    $bulan_awal=$_POST['bulan_awal'];
    $tahun_awal=$_POST['tahun_awal'];    

    $tanggal_akhir=$_POST['tanggal_akhir'];
    $bulan_akhir=$_POST['bulan_akhir'];
    $tahun_akhir=$_POST['tahun_akhir'];
    
    $dari="$tahun_awal-$bulan_awal-$tanggal_awal";
    $sampai="$tahun_akhir-$bulan_akhir-$tanggal_akhir";
    
}

//=================================================================
//=========================DATA RESTORE============================
//=================================================================


if(isset($_GET['page']) && $_GET['page']=='sampah/restore' && isset($_GET['id'])){
    $id=$_GET['id'];
    $update=mysql_query("update surat set `deleted`='0' where idsurat='$id' ");
    $_SESSION['message']=true;
    header('Location:./?page=sampah/index');
}

//=================================================================
//=========================RESET PASSWORD==========================
//=================================================================
if(isset($_POST['reset-password'])){
    $id=$_POST['id'];
    $password=encrypt($_POST['password']);
    
    $query=mysql_query("update pegawai set password='$password' where idpegawai='$id'") or die(mysql_error());
    if($query){
        $success=true;
        $_POST['id-reset']=$id;
    }
}

?>

