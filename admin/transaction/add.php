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
                        <h4 class="page-title">Thêm giao dịch</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                        <!-- <div class="alert alert-warning d-none fade show">
                                    <h4 class="mt-0">Oh snap!</h4>
                                    <p class="mb-0">This form seems to be invalid :(</p>
                                </div>

                                <div class="alert alert-info d-none fade show">
                                    <h4 class="mt-0">Yay!</h4>
                                    <p class="mb-0">Everything seems to be ok :)</p>
                                </div> -->
                        <?php
                        if (isset($_POST['submit'])) {
                            $user_id = $_POST['user_id'];
                            $name = $_POST['name'];
                            $phone = $_POST['phone'];
                            $email = $_POST['email'];
                            $address = $_POST['address'];
                            $sum_money = $_POST['sum_money'];
                            

                            $query = "INSERT INTO transaction (user_id,name,phone,email,address,sum_money) VALUE($user_id,$name,'$phone','$email','$address',sum_money)";
                            $result = $mysqli->query($query);
                            if ($result) {
                                echo  '<script type="text/javascript">
                                function Redirect() {
                                window.location="http://localhost/admin/transaction/index.php";
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
                                <label for="">ID người dùng* :</label>
                                <input type="text" class="form-control" name="user_id" id="user_id" required="">
                            </div>
                            <div class="form-group">
                                <label for="">Tên người dùng* :</label>
                                <input type="text" id="name" class="form-control" name="name" required="">
                            </div>
                            <div class="form-group">
                                <label for="">Số điện thoại * :</label>
                                <input type="text" id="phone" class="form-control" name="phone" required="">
                            </div>
                            <div class="form-group">
                                <label for="">Email * :</label>
                                <input type="text" id="email" class="form-control" name="email" required="">
                            </div>
                            <div class="form-group">
                                <label for="">Địa chỉ * :</label>
                                <input type="text" id="address" class="form-control" name="address" required="">
                            </div>
                            <div class="form-group">
                                <label for="">Tổng tiền đơn hàng * :</label>
                                <input type="text" id="sum_money" class="form-control" name="sum_money" required="">
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