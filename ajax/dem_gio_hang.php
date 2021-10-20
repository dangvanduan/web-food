<?php
require_once "../util/dbConnect.php";
$cart=(isset($_SESSION['cart'])) ? $_SESSION['cart'] : [];
if(isset($_POST['product_id'])){
    $product_id=$_POST['product_id'];
}
if(isset($_POST['action'])){
    $action=$_POST['action'];
}

echo count($cart);
?>