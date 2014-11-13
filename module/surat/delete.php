<?php

if(isset($_GET['id'])){
    
    $id=$_GET['id'];
    $delete=mysql_query("update surat set `delete`=1 where idsurat='$id'");
    
    if($delete){
        $_SESSION['delete']=true;
        header('Location:./?page=surat/index');
    }else{
        die('ID TIDAK ADA');
    }
}

?>