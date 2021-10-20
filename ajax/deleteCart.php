<?php
require_once '../util/dbConnect.php';
unset($_SESSION['cart'][$_GET['product_id']]);
header("LOCATION: /../gio-hang.php");

?>