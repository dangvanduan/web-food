<h1>Xóa giao dịch</h1>
<?php
require_once '../../util/dbConnect.php';
$transaction_id = $_GET['transaction_id'];
$query = "DELETE FROM transaction WHERE transaction_id = '{$transaction_id}'";
$result = $mysqli->query($query);
if ($result) {
    HEADER("Location: ../transaction?msg=Xoa giao dich thanh cong!");
}else {
    HEADER("Location: ../transaction?msg=Xoa giao dich khong thanh cong!");
}
?>