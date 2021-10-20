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
                        <h4 class="page-title">Quản lý liên hệ</h4>
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
                                                <th data-priority="1">ID</th>
                                                <th data-priority="3">Tên liên hệ</th>
                                                <th data-priority="1">Địa chỉ</th>
                                                <th data-priority="3">Email</th>
                                                <th data-priority="3">Số điện thoại</th>
                                                <th data-priority="6">Tiêu đề</th>
                                                <th data-priority="6">Nội dung</th>
                                                <th data-priority="6">Chức năng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $queryTSD = "SELECT count(*) AS TSD FROM contact ";
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

                                            $query = "SELECT * FROM contact ORDER BY contact_id DESC LIMIT $offset, $item_per_page";
                                            $result = $mysqli->query($query);
                                            while ($arContact = mysqli_fetch_assoc($result)) {
                                            ?>
                                                <tr>
                                                <tr class="formSanpham">
                                                    <td><?php echo $arContact['contact_id'] ?></td>
                                                    <td><?php echo $arContact['contact_name'] ?></td>
                                                    <td><?php echo $arContact['address'] ?></td>
                                                    <td><?php echo $arContact['email'] ?></td>
                                                    <td><?php echo $arContact['phone'] ?></td>
                                                    <td><?php echo $arContact['title'] ?></td>
                                                    <td><?php echo $arContact['content'] ?></td>
                                                    <td class="center">
                                                        <a href="edit.php?contact_id=<?php echo $arContact['contact_id'] ?>" title="" class="btn btn-primary"><i class="fa fa-edit "></i> Sửa</a>
                                                        <a href="delete.php?contact_id=<?php echo $arContact['contact_id'] ?>" onclick="return confirm ('Ban co muon xoa danh muc nay khong ?')" title="" class="btn btn-danger"><i class="fe-trash-2"></i> Xóa</a>
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
</div>
<?php
require_once '../inc/footer.php';
?>