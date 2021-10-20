<h1>Xóa tên tin tức</h1>
<?php
require_once '../../util/dbConnect.php';
$contact_id = $_GET['contact_id'];
$query = "DELETE FROM contact WHERE contact_id = '{$contact_id}'";
$result = $mysqli->query($query);
if ($result) {
    HEADER("Location: index.php?msg=Xoa lien he thanh cong!");
}else {
    HEADER("Location: index.php?msg=Xoa lien he khong thanh cong!");
}
?>