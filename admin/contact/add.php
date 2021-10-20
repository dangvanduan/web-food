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
                        <h4 class="page-title">Thêm liên hệ</h4>
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
                            $contact_name = $_POST['contact_name'];
                            $address = $_POST['address'];
                            $email = $_POST['email'];
                            $phone = $_POST['phone'];
                            $title = $_POST['title'];
                            $content = $_POST['content'];

                            $query = "INSERT INTO contact (contact_name,address,email,phone,title,content) VALUE('{$contact_name}','{$address}','{$email}','{$phone}','{$title}','{$content}')";
                            $result = $mysqli->query($query);
                            if ($result) {
                                echo  '<script type="text/javascript">
                                function Redirect() {
                                window.location="http://localhost/admin/doan/contact/index.php";
                                }
                                Redirect();
                                </script>';
                            } else {
                                echo "Lỗi! Không thể thêm liên hệ";
                            }
                        }
                        ?>

                        <form id="demo-form" method="POST" >
                            <div class="form-group">
                                <label for="">Tên liên hệ* :</label>
                                <input type="text" class="form-control" name="contact_name" id="contact_name" required="">
                            </div>

                            <div class="form-group">
                                <label for="">Địa chỉ * :</label>
                                <input type="text" id="address" class="form-control" name="address" required="">
                            </div>
                            <div class="form-group">
                                <label for="">Email * :</label>
                                <input type="text" id="email" class="form-control" name="email" required="">
                            </div>
                            <div class="form-group">
                                <label for="">Điện thoại * :</label>
                                <input type="text" class="form-control" name="phone" id="phone" required="">
                            </div>

                            <div class="form-group">
                                <label for="">Tiêu đề * :</label>
                                <input type="text" class="form-control" name="title" id="title" required="">
                            </div>
                            <div class="form-group">
                                <label for="">Nội dung * :</label>
                                <input type="text" class="form-control" name="content" id="content" required="">
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

<?php
require_once '../inc/footer.php';
?>