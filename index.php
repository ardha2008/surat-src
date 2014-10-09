<?php require 'header.php'; ?>    
    <hr />
    
<?php 
    if(isset($_SESSION['login']) && $_SESSION['login']==true){
        if(isset($_GET['page'])){
            require_once 'module/'.$_GET['page'].'.php';
        }
    }else{
        require_once 'module/home.php';
    } 

?>
<?php require 'footer.php'; ?>