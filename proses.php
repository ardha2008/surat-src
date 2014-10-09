<?php

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
 
?>