<h1>Xóa tên sản phẩm </h1>
<?php
require_once '../../util/dbConnect.php';
$contact_id = $_GET['contact_id'];
$query = "DELETE FROM product WHERE contact_id = '{$contact_id}'";
$result = $mysqli->query($query);
if ($result) {
    HEADER("Location: ../contact?msg=Xoa san pham thanh cong!");
}else {
    HEADER("Location: ../contact?msg=Xoa san pham khong thanh cong!");
}
?>