<?php  
//export.php  
$connect = mysqli_connect("localhost", "root", "", "doan2");
$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT * FROM transaction";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                    <th>ID</th>  
                    <th>ID khách hàng</th>  
                    <th>Tên</th>  
                    <th>SĐT</th>
                    <th>email</th>
                    <th>địa chỉ</th>
                    <th>tổng tiền</th>
                    <th>ngày đặt hàng</th>
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
    <td>'.$row["transaction_id"].'</td>  
    <td>'.$row["user_id"].'</td>  
    <td>'.$row["name"].'</td>  
    <td>'.$row["phone"].'</td>  
    <td>'.$row["email"].'</td>
    <td>'.$row["address"].'</td>
    <td>'.$row["sum_money"].'</td>
    <td>'.$row["order_day"].'</td>
    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=download.xls');
  echo $output;
 }
}
?>


