<?php 

if(isset($_POST['upload'])){
    print_r($_POST);
}

?>

<form method="post" enctype="multipart/form-data">
    <input type="text" name="files1"/>
    <input type="text" name="files2"/>
    <input type="text" name="files3"/>
    <button name="upload">Upload</button>
</form>