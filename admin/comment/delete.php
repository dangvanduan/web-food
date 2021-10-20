<h1>Xóa bình luận</h1>
<?php
require_once '../../util/dbConnect.php';
$comment_id = $_GET['comment_id'];
$query = "DELETE FROM comment WHERE comment_id = '{$comment_id}'";
$result = $mysqli->query($query);
if ($result) {
    HEADER("Location: ../comment?msg=Xoa san pham thanh cong!");
}else {
    HEADER("Location: ../comment?msg=Xoa san pham khong thanh cong!");
}
?>