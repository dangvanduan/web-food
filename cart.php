<?php
require_once 'util/dbConnect.php';
$product_id=$_POST['product_id'];
// if(isset($_GET['product_id'])){
//     $product_id=$_GET['product_id'];
// }

$sum=0;
// $action=(isset($_GET['action'])) ? $_GET['action'] : 'add';
// $quantity=(isset($_GET['quantity'])) ? $_GET['quantity'] : 1;
$action=$_POST['action'];
$quantity=$_POST['quantity'];
if($quantity <= 0){
    $quantity = 1;
}


// session_destroy();
// die();
$query = "SELECT * FROM product  WHERE product_id=$product_id";
$result = $mysqli->query($query);
if($result){
    $arPro=mysqli_fetch_assoc($result);
}

$item=[
    'product_id'=>$arPro['product_id'],
    'name'=>$arPro['product_name'],
    'picture'=>$arPro['picture'],
    'price'=>$arPro['price'],
    'quantity'=>$quantity,
];
if($action == 'add'){
if(isset($_SESSION['cart'][$product_id])){
    $_SESSION['cart'][$product_id]['quantity'] += $quantity;   
}else{
    $_SESSION['cart'][$product_id] = $item;
}
}
if($action == 'update'){
    $_SESSION['cart'][$product_id]['quantity'] = $quantity;  
    
    echo $quantity; 
    
}
if($action == 'delete'){
    unset($_SESSION['cart'][$product_id]);
}


// header('location: gio-hang.php');

// echo "<pre>";
// print_r($_SESSION['cart']);
