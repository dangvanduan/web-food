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
                    <a href="../index.php">
                        <i class="la la-dashboard"></i>
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
                        <h4 class="page-title">Cập nhật thông tin người dùng</h4>
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
                        $user_id = $_GET['user_id'];
                        $select = "SELECT * FROM users WHERE user_id={$user_id}";
                        if ($mysqli->query($select)) {
                            $arUser = mysqli_fetch_assoc($mysqli->query($select));
                        }
                        if (isset($_POST['submit'])) {
                            $user_name = $_POST['user_name'];
                            $password = md5($_POST['password']);
                            $full_name = $_POST['full_name'];
                            $phone = $_POST['phone'];
                            $address = $_POST['address'];
                            $query = "UPDATE users SET password = '{$password}', full_name='{$full_name}', phone = '{$phone}', address='{$address}' WHERE user_id = '{$user_id}'";
                            $result = $mysqli->query($query);
                            if ($result) {
                                echo  '<script type="text/javascript">
                                function Redirect() {
                                window.location="http://localhost/admin/users/index.php";
                                }
                                Redirect();
                                </script>';
                            } else {
                                echo "Loi, khong the sua nguoi dung";
                            }
                        }
                        ?>

                        <form id="formEditUser" method="POST">
                            <div class="form-group">
                                <label for="">Tên tài khoản * : </label></br>
                                <td><?php echo $arUser['user_name']; ?></td>
                            </div>
                            <div class="form-group">
                                <label for="">Password * :</label>
                                <input type="password" value="<?php echo $arUser['password']; ?>" class="form-control" name="password" required="">
                            </div>
                            <div class="form-group">
                                <label for="">Tên đầy đủ * :</label>
                                <input type="text" value="<?php echo $arUser['full_name']; ?>" class="form-control" name="full_name" required="">
                            </div>

                            <div class="form-group">
                                <label for="">Số điện thoại * :</label>
                                <input type="text" value="<?php echo $arUser['phone']; ?> " class="form-control" name="phone" required="">
                            </div>
                            <div class="form-group">
                                <label for="">Địa chỉ * :</label>
                                <input type="text" value="<?php echo $arUser['address']; ?>" class="form-control" name="address" required="">
                            </div>

                            <div class="form-group mb-0">
                                <input type="submit" name="submit" class="btn btn-success" value="Sửa">
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