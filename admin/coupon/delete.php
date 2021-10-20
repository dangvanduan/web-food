<h1>Xóa sự kiện</h1>
<?php
require_once '../../util/dbConnect.php';
$coupon_id = $_GET['coupon_id'];
$query = "DELETE FROM coupon WHERE coupon_id = '{$coupon_id}'";
$result = $mysqli->query($query);
if ($result) {
    HEADER("Location: ../coupon?msg=Xoa su kien thanh cong!");
}else {
    HEADER("Location: ../coupon?msg=Xoa su kien khong thanh cong!");
}
?>