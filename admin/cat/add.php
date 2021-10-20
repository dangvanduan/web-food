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
                        <h4 class="page-title">Thêm danh mục</h4>
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
                            $cat_name = $_POST['cat_name'];
                            $parent_id = $_POST['parent_id'];

                            $query = "INSERT INTO cat (cat_name,parent_id) VALUE('{$cat_name}','{$parent_id}')";
                            $result = $mysqli->query($query);
                            if ($result) {
                                echo  '<script type="text/javascript">
                                function Redirect() {
                                window.location="http://localhost/admin/cat/index.php";
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
                                <label for="">Tên danh mục* :</label>
                                <input type="text" class="form-control" name="cat_name" id="cat_name" required="">
                            </div>
                            <div class="form-group">
                                <label for="">ID cha * :</label>
                                <select class="form-control" name="parent_id">
                                    <?php
                                    $query = "SELECT * FROM cat";
                                    $result = $mysqli->query($query);
                                    while ($arCAT = mysqli_fetch_assoc($result)) {
                                    ?>
                                        <option value="<?php echo $arCAT['parent_id'] ?>">
                                            <?php echo $arCAT['cat_name'] ?>
                                        </option>
                                    <?php
                                    }
                                    ?>
                                </select>
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