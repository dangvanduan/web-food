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
                        <h4 class="page-title">Sửa thông tin sản phẩm</h4>
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
                        $contact_id = $_GET['contact_id'];
                        $select = "SELECT * FROM contact WHERE contact_id={$contact_id}";
                        if ($mysqli->query($select)) {
                            $arContact = mysqli_fetch_assoc($mysqli->query($select));
                        }
                        if (isset($_POST['submit'])) {
                            $contact_name = $_POST['contact_name'];
                            $address = $_POST['address'];
                            $email = $_POST['email'];
                            $phone = $_POST['phone'];
                            $title = $_POST['title'];
                            $content = $_POST['content'];
                            $query = "UPDATE contact SET contact_name = '{$contact_name}',address = '{$address}', email='{$email}', phone = '{$phone}', title='{$title}',content='{$content}' WHERE contact_id = '{$contact_id}'";
                            $result = $mysqli->query($query);
                            if ($result) {
                                echo  '<script type="text/javascript">
                                function Redirect() {
                                window.location="http://localhost/admin/contact/index.php";
                                }
                                Redirect();
                                </script>';
                            } else {
                                echo "Loi, khong the sua tin tuc";
                            }
                        }
                        ?>

                        <form id="demo-form" data-parsley-validate="" method="POST">
                            <div class="form-group">
                                <label for="">Tên liên hệ* :</label>
                                <input type="text" class="form-control" value="<?php echo $arContact['contact_name']; ?>" name="contact_name" id="contact_name" required="">
                            </div>

                            <div class="form-group">
                                <label for="">Địa chỉ * :</label>
                                <input type="text" id="address" value="<?php echo $arContact['address']; ?>" class="form-control" name="address" required="">
                            </div>
                            <div class="form-group">
                                <label for="">Email * :</label>
                                <input type="text" id="email" value="<?php echo $arContact['email']; ?>" class="form-control" name="email" required="">
                            </div>
                            <div class="form-group">
                                <label for="">Điện thoại * :</label>
                                <input type="text" class="form-control" value="<?php echo $arContact['phone']; ?>" name="phone" id="phone" required="">
                            </div>

                            <div class="form-group">
                                <label for="">Tiêu đề * :</label>
                                <input type="text" class="form-control" value="<?php echo $arContact['title']; ?>" name="title" id="title" required="">
                            </div>
                            <div class="form-group">
                                <label for="">Nội dung * :</label>
                                <input type="text" class="form-control" value="<?php echo $arContact['content']; ?>" name="content" id="content" required="">
                            </div>

                            <div class="form-group mb-0">
                                <input type="submit" name="submit"  class="btn btn-success" value="Sửa">
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