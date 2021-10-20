<?php
$connect1 = mysqli_connect("localhost", "root", "", "doan2");
if (isset($_GET['tuNgay']) && isset($_GET['denNgay'])) {
    $tuNgay = $_GET['tuNgay'];    
    $denNgay = $_GET['denNgay'];   
    // $tongdoanhthu=0;
    $sql1 = "SELECT * FROM transaction  WHERE order_day BETWEEN '$tuNgay' AND '$denNgay'";
    $result1 = mysqli_query($connect1, $sql1);
   
    
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

                <form action="" method="POST">
                    <strong><lable>Từ ngày: </lable></strong><?php echo $tuNgay?>               
                    <strong><lable> đến ngày: </lable></strong><?php echo $denNgay?></br>
                    <!-- <strong><lable>Tổng doanh thu:</lable></strong><?php echo $tongdoanhthu;?> -->
                </form>

                <form method="post" action="export.php">
                    <a href="doanh-thu.php" class="btn btn-primary">Trở về</a>
                    <input type="submit" name="export" class="btn btn-success" value="Xuất file Excel" />
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
                    while ($row1 = mysqli_fetch_array($result1)) {
                        echo '  
       <tr>  
         <td>' . $row1["transaction_id"] . '</td>  
         <td>' . $row1["user_id"] . '</td>  
         <td>' . $row1["name"] . '</td>  
         <td>' . $row1["phone"] . '</td>  
         <td>' . $row1["email"] . '</td>
         <td>' . $row1["address"] . '</td>
         <td>' . $row1["sum_money"] . '</td>
         <td>' . $row1["order_day"] . '</td>
       </tr>  
        ';
                    }
                    ?>
                   
                </table>
                <br />

            </div>
        </div>
        
                    
                    
    <?php } ?>
    </body>
           
    </html>