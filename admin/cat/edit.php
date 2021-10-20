<?php
require_once '../inc/header.php';
require_once '../inc/leftbar.php';
?>

<!-- end Topbar -->

<!-- ========== Left Sidebar Start ========== -->

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
                        <h4 class="page-title">Sửa thông tin danh mục</h4>
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
                        $cat_id = $_GET['cat_id'];
                        $select = "SELECT * FROM cat WHERE cat_id={$cat_id}";
                        if ($mysqli->query($select)) {
                            $arCat = mysqli_fetch_assoc($mysqli->query($select));
                        }
                        if (isset($_POST['submit'])) {
                            $cat_name = $_POST['cat_name'];
                            $parent_id = $_POST['parent_id'];

                            $query = "UPDATE cat SET cat_name = '{$cat_name}',parent_id = '{$parent_id}' WHERE cat_id = '{$cat_id}'";
                            $result = $mysqli->query($query);
                            if ($result) {
                                echo  '<script type="text/javascript">
                                        function Redirect() {
                                        window.location="http://localhost/admin/cat/index.php";
                                        }
                                        Redirect();
                                        </script>';
                            } else {
                                echo "Loi, khong the sua danh muc";
                            }
                        }
                        ?>
                        <form id="demo-form" method="POST">
                            <div class="form-group">
                                <label for="">Tên danh mục* :</label>
                                <input type="text" class="form-control" value="<?php echo $arCat['cat_name'] ?>" name="cat_name" id="cat_name" required="">
                            </div>

                            <div class="form-group">
                                <label for="">ID cha * :</label>
                                <select class="form-control" name="cat_id">
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