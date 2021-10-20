<?php

require_once '../inc/header.php';
require_once '../inc/leftbar.php';
?>


<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->

<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Upvex</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                <li class="breadcrumb-item active">Responsive Table</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Quản lý giao dịch</h4>
                        <a href="add.php" title="" class="btn btn-primary"> <i class="fe-plus-circle"></i>Thêm</a>
                        <h1></h1>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                        <div class="responsive-table-plugin">
                            <div class="table-rep-plugin">
                                <div class="table-responsive" data-pattern="priority-columns">
                                    <table id="tech-companies-1" class="table table-striped">
                                        <thead>
                                            <tr>

                                                <th data-priority="1">ID đơn hàng</th>
                                                <th data-priority="1">ID giao dịch</th>
                                                <th data-priority="3">Tên sản phẩm</th>
                                                <th data-priority="6">ID sản phẩm</th>
                                                <th data-priority="6">Số lượng</th>
                                                <th data-priority="6">Giá</th>
                                                <th data-priority="6">Tổng tiền từng loại sản phẩm</th>
                                               
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php    
                                            if(!isset($_GET['sum_money'])){
                                                $sum_money=0;
                                            }else{
                                                $sum_money=$_GET['sum_money'];
                                            }                                     
                                            if(isset($_GET['transaction_id'])){
                                                $transaction_id=$_GET['transaction_id'];
                                                $query = "SELECT * FROM cart WHERE transaction_id = $transaction_id";
                                                $result = $mysqli->query($query);
                                            }
                                            
                                            while ($arCart = mysqli_fetch_assoc($result)) {
                                            ?>
                                                <tr class="<?php echo $cl ?> gradeX">
                                                    <td><?php echo $arCart['cart_id'] ?></td>
                                                    <td><?php echo $arCart['transaction_id'] ?></td>
                                                    <td><?php echo $arCart['product_name']; ?></td>
                                                    <td><?php echo $arCart['product_id']; ?></td>
                                                    <td><?php echo $arCart['amount']; ?></td>
                                                    <td><?php echo $arCart['price']; ?></td>
                                                    <td><?php echo ($arCart['amount']*$arCart['price']); ?></td>
                                                    
                                                    <td class="center" >
                                                        <a href="index.php" title="" class="btn btn-primary"><i class="fa fa-edit "></i>Trở về</a>
                                                        
                                                            
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                            ?>

                                        </tbody>
                                    </table>
                                    <h4>Tổng tiền: <?php echo $_GET['sum_money']?> đ</h4>
                                </div> <!-- end .table-responsive -->
                                <style>
    .page-item {
        border:1px solid #ccc;
        padding: 5px 9px;
        color:yellowgreen;
    }
    .current_page{
        background-color:#000;
        color:#FFF;
    }
    
    </style>
                                
                            </div> <!-- end .table-rep-plugin-->
                        </div> <!-- end .responsive-table-plugin-->
                    </div> <!-- end card-box -->
                </div> <!-- end col -->
            </div>
            <!-- end row -->
         
        </div> <!-- container -->

    </div> <!-- content -->
    <?php

    require_once '../inc/footer.php';

    ?>