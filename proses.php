<?php

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

if(isset($_POST['login'])){
    $id=$_POST['id'];
    $password=sha1($_POST['password']);
    
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

if(isset($_POST['tambah_pegawai'])){
    $nip=$_POST['nip'];
    $nama=$_POST['nama'];
    $tl=$_POST['tl'];
    $alamat=$_POST['alamat'];
    $kota=$_POST['kota'];
    $telepon=$_POST['telepon'];
    $ponsel=$_POST['ponsel'];
    
    $new_name=random().'.jpeg';
    
    $target_path = './img/foto/';
    $target_path = $target_path . basename($new_name); 
    $foto=$new_name;
    
    if(move_uploaded_file($_FILES['foto']['tmp_name'], $target_path)) {
        
    } else{
        $failed=1;
    }
    
    $query=mysql_query("insert into pegawai values ('$nip','$nama','$alamat','$kota','$tl','$telepon','$ponsel','$foto','0','0')");
    
    if($query){
        $success=1;
    }else{
        mysql_error();
    }
}
 
?>