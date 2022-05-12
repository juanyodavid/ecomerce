<?php session_start();

    if(isset($_SESSION['nombre'])){
        header('location: menu.php');
    }else{
        header ('location: login/index.html#tologin');
    }
        
?>