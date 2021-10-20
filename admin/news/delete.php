<h1>Xóa tên tin tức</h1>
<?php
require_once '../../util/dbConnect.php';
$news_id = $_GET['news_id'];
$query = "DELETE FROM news WHERE news_id = '{$news_id}'";
$result = $mysqli->query($query);
if ($result) {
    HEADER("Location: ../news?msg=Xoa tin tuc thanh cong!");
}else {
    HEADER("Location: ../news?msg=Xoa tin tuc khong thanh cong!");
}
?>