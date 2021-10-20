<?php

require_once '../inc/header.php';
require_once '../inc/leftbar.php';
// require_once '../../Classes/PHPExcel.php';

// if(isset($_POST['btnExport'])){
//     $objExcel = new PHPExcel();
//     $objExcel->setActiveSheetIndex(0);
//     $sheet= $objExcel->getActiveSheet()->setTitle('');

//     $row_Count = 1;
//     $sheet->setCellValue('A'.$row_Count,'ID giao dịch');
//     $sheet->setCellValue('B'.$row_Count,'ID người mua');
//     $sheet->setCellValue('C'.$row_Count,'Tên người mua');
//     $sheet->setCellValue('D'.$row_Count,'Số điện thoại');
//     $sheet->setCellValue('E'.$row_Count,'Email');
//     $sheet->setCellValue('F'.$row_Count,'Địa chỉ');
//     $sheet->setCellValue('G'.$row_Count,'Tổng tiền');
//     $sheet->setCellValue('H'.$row_Count,'Ngày đặt hàng');
//     $result1=$mysqli->query("SELECT * FROM transaction");
//     while($row=mysqli_fetch_assoc($result1)){
//         $row_Count++;
//         $sheet->setCellValue('A'.$row_Count,$row['transaction_id']);
//         $sheet->setCellValue('B'.$row_Count,$row['user_id']);
//         $sheet->setCellValue('C'.$row_Count,$row['user_name']);
//         $sheet->setCellValue('D'.$row_Count,$row['phone']);
//         $sheet->setCellValue('E'.$row_Count,$row['email']);
//         $sheet->setCellValue('F'.$row_Count,$row['address']);
//         $sheet->setCellValue('G'.$row_Count,$row['sum_money']);
//         $sheet->setCellValue('H'.$row_Count,$row['order_day']);

//         $objWriter=new PHPExcel_Writer_Excel2007($objExcel);
//         $filename='export.xlsx';
//         $objWriter->save($filename);

//         header('Content-Dispostion: attachment; filename="'.$filename.'"');
//         header('Content-type: application/vnd.openxmlformatsofficedocument.spreadsheetml.sheet');
//         header('Content-Length'.filesize($filename));
//         header('Content-Transfer-Encoding:binary');
//         header('Cache-control: must-revalidate');
//         header('Prama: no-cache');
//         readfile($filename);
//         return;
//     }

// }
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

                        <?php
                        
                        ?>
                        <form action="../../admin/doanh-thu.php" method="POST">
                        <button name="btnExport" type="submit">Xem báo cáo<i class="fe-calendar"></i></button>
                        </form>
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

                                                <th data-priority="1">ID</th>
                                                <th data-priority="1">ID người mua</th>
                                                <th data-priority="3">Tên người mua</th>
                                                <th data-priority="6">Số điện thoại</th>
                                                <th data-priority="6">Email</th>
                                                <th data-priority="6">Địa chỉ</th>
                                                <th data-priority="6">Tổng tiền đơn hàng</th>
                                                <th data-priority="6">Ngày mua</th>
                                                <th data-priority="6">Chức năng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $queryTSD = "SELECT count(*) AS TSD FROM transaction ";
                                            $resultTSD = $mysqli->query($queryTSD);
                                            $arTmp = mysqli_fetch_assoc($resultTSD);
                                            $tongSoDong = $arTmp['TSD'];
                                            // tổng số sản phâm trên 1 trang
                                            $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page']:6;
                                            // Tổng số trang
                                            $tongsoTrang = ceil($tongSoDong / $item_per_page);
                                            // trang hiện tại
                                            $current_page = !empty($_GET['page']) ? $_GET['page']:1;
                                           
                                            //offset
                                            $offset = ($current_page - 1) * $item_per_page;

                                            $query = "SELECT * FROM transaction ORDER BY transaction_id DESC LIMIT $offset, $item_per_page ";
                                            $result = $mysqli->query($query);
                                            while ($arTran = mysqli_fetch_assoc($result)) {
                                            ?>
                                                <tr class="<?php echo $cl ?> gradeX">
                                                    <td><?php echo $arTran['transaction_id'] ?></td>
                                                    <td><?php echo $arTran['user_id'] ?></td>
                                                    <td><?php echo $arTran['name']; ?></td>
                                                    <td><?php echo $arTran['phone']; ?></td>
                                                    <td><?php echo $arTran['email']; ?></td>
                                                    <td><?php echo $arTran['address']; ?></td>
                                                    <td><?php echo $arTran['sum_money']; ?></td>
                                                    <td><?php echo $arTran['order_day']; ?></td>


                                                    <td class="center" >
                                                        <a href="edit.php?transaction_id=<?php echo $arTran['transaction_id'] ?>" title="" class="btn btn-primary"><i class="fa fa-edit "></i> Sửa</a>
                                                        <a href="delete.php?transaction_id=<?php echo $arTran['transaction_id'] ?>" onclick="return confirm ('Bạn có muốn xóa mục này không?')" title="" class="btn btn-danger"><i class="fe-trash-2"></i> Xóa</a></br>                          
                                                        <a href="detail.php?transaction_id=<?php echo $arTran['transaction_id'] ?>&sum_money=<?php echo $arTran['sum_money']?>" title="" class="btn btn-primary"><i class="fa fa-edit "></i>Chi tiết</a>
                                                            
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                            ?>

                                        </tbody>
                                    </table>
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
            <div class="text-right  clear" style="float: right; ">
                                    <div class="row">
                                    <?php 
                                        include './../phan-trang.php'
                                    ?>
                                    </div>
                                </div>
        </div> <!-- container -->

    </div> <!-- content -->
    <?php

    require_once '../inc/footer.php';

    ?>