<?php
require_once '../inc/header.php';
require_once '../inc/leftbar.php';
?>

<!-- end Topbar -->

<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">

    <div class="slimscroll-menu">

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul class="metismenu" id="side-menu">

                <li class="menu-title">Navigation</li>

                <li>
                    <a href="javascript: void(0);">
                        <i class="la la-dashboard"></i>
                        <span class="badge badge-info badge-pill float-right"></span>
                        <span> Dashboards </span>
                    </a>
                    
                </li>
                <li>
                    <a href="../users">
                        <i class="fe-users"></i>
                        <span> Quản lý người dùng </span>

                    </a>

                </li>

                <li>
                    <a href="../cat">
                        <i class="la la-briefcase"></i>
                        <span>Quản lý danh mục </span>
                    </a>
                </li>

                <li>
                    <a href="../news">
                        <i class="la la-coffee"></i>
                        <span> Quản lý tin tức </span>
                    </a>
                </li>

                <li>
                    <a href="../product">
                        <i class="la la-bullhorn"></i>

                        <span>Quản lý sản phẩm </span>
                    </a>

                </li>

                <li>
                    <a href="../contact">
                        <i class="fe-phone"></i>
                        <span>Quản lý liên hệ </span>

                    </a>

                </li>
            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
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
                        <h4 class="page-title">Thêm người dùng</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->


            <div class="row">
                <div class="col-12">
                    <div class="card-box">

                        <div class="alert alert-warning d-none fade show">
                            <h4 class="mt-0">Oh snap!</h4>
                            <p class="mb-0">This form seems to be invalid :(</p>
                        </div>

                        <div class="alert alert-info d-none fade show">
                            <h4 class="mt-0">Yay!</h4>
                            <p class="mb-0">Everything seems to be ok :)</p>
                        </div>
                        <?php

                        if (isset($_POST['submit'])) {

                            $user_name = $_POST['user_name'];
                            $password = md5($_POST['password']);
                            $full_name = $_POST['full_name'];
                            $phone = $_POST['phone'];
                            $address = $_POST['address'];
                            //Bắt lỗi trùng tài khoản
                            $query1 = "SELECT * FROM users WHERE user_name='$user_name'";
                            $result1 = $mysqli->query($query1);
                            $count = mysqli_num_rows($result1);
                            if ($count != 0) {
                                echo "Tài khoản đã tồn tại, vui lòng chọn tài khoản khác";
                            } else {

                                $query = "INSERT INTO users (user_name,password,full_name,phone,address) VALUE('{$user_name}','{$password}','{$full_name}','{$phone}','{$address}')";
                                $result = $mysqli->query($query);
                                if ($result) {
                                echo  '<script type="text/javascript">
                                function Redirect() {
                                window.location="http://localhost/admin/users/index.php";
                                }
                                Redirect();
                                </script>';
                                } else {
                                    echo "Lỗi! Không thể thêm truyện";
                                }
                            }
                        }
                        ?>
                        <form id="formUser" role="form" data-parsley-validate="" method="POST">
                            <div class="form-group">
                                <label for="email">Tên tài khoản * :</label>
                                <input type="email" id="user_name" class="form-control" name="user_name" data-parsley-trigger="change" required="">
                            </div>
                            <div class="form-group">
                                <label for="">Password * :</label>
                                <input type="password" id="password" class="form-control" name="password" data-parsley-trigger="change" required="">
                            </div>
                            <div class="form-group">
                                <label for="">Tên đầy đủ * :</label>
                                <input type="text" class="form-control" name="full_name" id="full_name" required="">
                            </div>

                            <div class="form-group">
                                <label for="">Số điện thoại * :</label>
                                <input type="text" class="form-control" name="phone" id="phone" required="">
                            </div>
                            <div class="form-group">
                                <label for="">Địa chỉ * :</label>
                                <input type="text" class="form-control" name="address" id="address" required="">
                            </div>

                            <div class="form-group mb-0">
                                <input type="submit" name="submit" class="btn btn-success" value="Thêm">
                            </div>

                        </form>
                    </div> <!-- end card-box-->
                </div> <!-- end col-->
            </div>
            <!-- end row-->



        </div> <!-- end .p-3-->

    </div> <!-- end slimscroll-menu-->
</div>
<!-- /Right-bar -->

<!-- Right bar overlay-->
<?php
require_once '../inc/footer.php';
?>