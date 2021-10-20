<?php
$connect = mysqli_connect("localhost", "root", "", "doan2");
$sql = "SELECT * FROM transaction  WHERE order_day BETWEEN '2021-05-25' AND '2021-05-29'";  
$result = mysqli_query($connect, $sql);
?>
<html>  
 <head>  
  <title>Export MySQL data to Excel in PHP</title>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
 </head>  
 <body>  
  <div class="container">  
   <br />  
   <br />  
   <br />  
   <div class="table-responsive">  
    <h2 align="center">Bảng doanh thu</h2><br /> 
    
    <form action="doanh-thu-thang.php" method="GET">
    <lable>Từ ngày</lable>
    <input name="tuNgay" type="text" value="2021-05-20">
    <lable>đến ngày</lable>
    <input name="denNgay" type="text" value="2021-06-20">
    <input name="chonNgay" type="submit" value="Xem">
    </form>
  
    <table class="table table-bordered">
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
     <?php
     while($row = mysqli_fetch_array($result))  
     {  
        echo '  
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
     ?>
    </table>
    <br />
    <form method="post" action="export.php">
     <input type="submit" name="export" class="btn btn-success" value="Xuất file Excel" />
    </form>
   </div>  
  </div>  
 </body>  
</html>
