<?php 
    session_start();
    unset($_SESSION['users']);
    unset($_SESSION['cart']);
    header('Location:dang-nhap.php');

?>