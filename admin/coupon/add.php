<?php

require_once '../inc/header.php';
require_once '../inc/leftbar.php';
?>
<!-- Left Sidebar End -->

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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                                <li class="breadcrumb-item active"></li>
                            </ol>
                        </div>
                        <h4 class="page-title">Thêm sự kiện</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                     
                        <?php
                        if (isset($_POST['submit'])) {

                            $coupon_name = $_POST['coupon_name'];
                            $coupon_code = $_POST['coupon_code'];
                            
                            $coupon_value = $_POST['coupon_value'];
                            $coupon_number = $_POST['coupon_number'];
                            $query = "INSERT INTO coupon (coupon_name,coupon_code,coupon_value,coupon_number) VALUE('$coupon_name',$coupon_code,$coupon_value,$coupon_number)";
                            $result = $mysqli->query($query);
                            if ($result) {
                                echo  '<script type="text/javascript">
                                function Redirect() {
                                window.location="http://localhost/admin/doan/coupon/index.php";
                                }
                                Redirect();
                                </script>';
                            } else {
                                echo "Lỗi! Không thể thêm truyện";
                            }
                        }
                        ?>
                        <form id="formCat" data-parsley-validate="" method="POST">

                            <div class="form-group">
                                <label for="">Tên sự kiện* :</label>
                                <input type="text" id="coupon_name" class="form-control" name="coupon_name" required="">
                            </div>
                            <div class="form-group">
                                <label for="">Mã giảm giá* :</label>
                                <input type="text" id="coupon_code" class="form-control" name="coupon_code" required="">
                            </div>
                         
                            <div class="form-group">
                                <label for="">Hệ số giá trị * :</label>
                                <input type="text" id="coupon_value" class="form-control" name="coupon_value" required="">
                            </div>
                            <div class="form-group">
                                <label for="">Số lượng mã giảm * :</label>
                                <input type="text" id="coupon_number" class="form-control" name="coupon_number" required="">
                            </div>

                            <div class="form-group mb-0">
                                <input type="submit" name="submit" class="btn btn-success" value="Thêm">
                            </div>

                        </form>
                    </div> <!-- end card-box-->
                </div> <!-- end col-->
            </div>
            <!-- end row-->
            <?php
            require_once '../inc/footer.php';

            ?>