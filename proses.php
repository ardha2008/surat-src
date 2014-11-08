<?php

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
    
    $query=mysql_query("select * from users where idusers='$id' and password='$password'") ;
    
    if(mysql_num_rows($query)>0){
        $result=mysql_fetch_array($query);
        
        $_SESSION['idusers']=$result['idusers'];
        $_SESSION['login']=true;
        
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
    $password=encrypt($tl);
    
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
    
    $query=mysql_query("insert into pegawai (idpegawai,nama,alamat,kota,tanggal_lahir,telepon,ponsel,foto) values ('$nip','$nama','$alamat','$kota','$tl','$telepon','$ponsel','$foto')");
    $query2=mysql_query("insert into users values('$nip','$password','$bagian')") ;
    
    if($query){
        $success=1;
    }else{
        mysql_error();
    }
}

//=================================================================
//=========================UPDATE PERSONAL=========================
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
//=========================PROSES TAMBAH BAGIAN====================
//=================================================================

if(isset($_POST['tambah_surat'])){
    $id=$_POST['idsurat'];
    $jenis_surat=$_POST['jenis_surat'];
    $tanggal_surat=$_POST['tanggal_surat'];
    $perihal=$_POST['perihal'];
    
    $catatan=$_POST['catatan'];
    $asal_surat=$_POST['asal_surat'];
    $keyword=$_POST['keyword'];
    $posting=get_login('nama');
    
    $query=mysql_query("insert into surat values ('$id','$jenis_surat','$tanggal_surat','$perihal','$catatan','$asal_surat','$keyword','0','$posting','')") or die(mysql_error());
    if($query){
        $success=1;
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
 
?>