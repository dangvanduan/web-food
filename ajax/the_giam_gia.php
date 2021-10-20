<?php 
require_once '../util/dbConnect.php';
$sum_total=0;
$coupon_id=$_POST['coupon_id'];
$coupon_value=$_POST['coupon_value'];
$total_price=$_POST['total_price'];
$query="SELECT * FROM coupon WHERE coupon_id = $coupon_id";
$result = $mysqli->query($query);
if($result)
{
    $arCoupon=mysqli_fetch_assoc($result);
    $coupon_value=$arCoupon['coupon_value'];
}

$sum_total = $coupon_value * $total_price;
echo $sum_total;

?>
