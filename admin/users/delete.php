<h1>Xóa tên danh mục </h1>
<?php
require_once '../../util/dbConnect.php';
$user_id = $_GET['user_id'];
$query = "DELETE FROM users WHERE user_id = '{$user_id}'";
$result = $mysqli->query($query);
if ($result) {
    HEADER("Location: ../users?msg=Xoa nguoi dung thanh cong!");
}else {
    HEADER("Location: ../users?msg=Xoa nguoi dung khong thanh cong!");
}
?>
