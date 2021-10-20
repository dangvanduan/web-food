<?php
require_once "../util/dbConnect.php";
$total_price = 0;
$cart = (isset($_SESSION['cart'])) ? $_SESSION['cart'] : [];

$product_id=$_POST['product_id'];
$price = $_POST['price'];
$action=$_POST['action'];
$quantity = $_POST['quantity'];
if ($quantity <= 0) {
    $quantity = 1;
}


$query = "SELECT * FROM product  WHERE product_id=$product_id";
$result = $mysqli->query($query);
if ($result) {
    $arPro = mysqli_fetch_assoc($result);
}

$item = [
    'product_id' => $arPro['product_id'],
    'name' => $arPro['product_name'],
    'picture' => $arPro['picture'],
    'price' => $arPro['price'],
    'quantity' => $quantity,
];
if($action == 'update'){
    $_SESSION['cart'][$product_id]['quantity'] = $quantity;
    foreach ($cart as $key => $value) :
        $total_price += ($value['price'] * $value['quantity']);

    endforeach;
    echo number_format($total_price,0,',','.');
}

 

?>


