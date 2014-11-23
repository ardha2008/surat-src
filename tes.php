<?php 
require_once 'config.php';

if(isset($_POST['upload'])){
    
    $result=explode(' ',$_POST['cari']);
    //print_r($result);
    $str_query = "select * from surat where ";
    for($i=0;$i<count($result);$i++){
 //       echo $result[$i] . "-";
        if($i == 0)
        {
            $str_query = $str_query . " catatan like '%$result[$i]%' ";
        }else
        {
            $str_query = $str_query . " or catatan like '%$result[$i]%'";
        }
    } 
    $variable_disek = mysql_query($str_query);
    $variable_disek=mysql_fetch_array($variable_disek);
    print_r($variable_disek);
//echo $str_query;
    //$query=mysql_query();
}

?>

<form method="post" enctype="multipart/form-data">
    <input type="text" name="cari"/>
    <button name="upload">Upload</button>
</form>