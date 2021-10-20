<?php
require_once "../util/dbConnect.php";


$product_id = $_POST['product_id'];
$num = $_POST['num'];
$price = $_POST['price'];


$_SESSION['cart'][$product_id] += $num;

$t_price = $_SESSION['cart'][$product_id] * $price;



?>

<?php echo $_SESSION['cart'][$item_id] ?>