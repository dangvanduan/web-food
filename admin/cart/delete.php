<h1>Xóa đơn hàng</h1>
<?php
require_once '../../util/dbConnect.php';
$cart_id = $_GET['cart_id'];
$query = "DELETE FROM cart WHERE cart_id = '{$cart_id}'";
$result = $mysqli->query($query);
if ($result) {
    HEADER("Location: ../cart?msg=Xoa don hang thanh cong!");
}else {
    HEADER("Location: ../cart?msg=Xoa don hang khong thanh cong!");
}
?>