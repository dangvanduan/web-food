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
                        <h4 class="page-title">Thêm sản phẩm</h4>
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
                            if ($_POST['product_name']) {
                                $product_name = $_POST['product_name'];
                                $product_describe = $_POST['product_describe'];
                                $cat_id = $_POST['cat_id'];
                                $product_detail = $_POST['product_detail'];
                                $price = $_POST['price'];
                                $parent_id = $_POST['parent_id'];
                                      
                            $filename = $_FILES['picture']['name'];
                            $arFile = explode('.', $filename);
                            $Typefile = end($arFile);
                            $newFileName = $_POST['product_name'] . '-' . time() . '.' . $Typefile;
                            $tmpName = $_FILES['picture']['tmp_name'];
                            $resultUpload = move_uploaded_file($tmpName, '../../Uploads/shop97/images/product/' . $newFileName);


                            if ($resultUpload) {
                                $query = "INSERT INTO product (product_name,product_describe,picture,cat_id,product_detail,price,parent_id) VALUE('{$product_name}','{$product_describe}','{$newFileName}','{$cat_id}','{$product_detail}','{$price}','{$parent_id}')";
                                $result = $mysqli->query($query);
                            }
                            if (isset($result)) {
                                echo  '<script type="text/javascript">
                                function Redirect() {
                                window.location="http://localhost/admin/doan/product/index.php";
                                }
                                Redirect();
                                </script>';
                            } else {
                                echo "Lỗi! Không thể thêm tin tức";
                            }
                        }
                    }
                        ?>


                        <form id="demo-form" method="POST" enctype="multipart/form-data" class="frmAdd">
                            <div class="form-group">
                                <label for="">Tên sản phẩm* :</label>
                                <input type="text" class="form-control" name="product_name" id="product_name" required="">
                            </div>

                            <div class="form-group">
                                <label for="">Mô tả sản phẩm * :</label>
                                <textarea name="product_describe"></textarea>
                                <script>
                                    CKEDITOR.replace('product_describe');
                                </script>
                            </div>

                            <div class="form-group">
                                <label for="">Hình ảnh * :</label>
                                
                                <input type="file" class="form-control" name="picture"  required="">
                            </div>

                            <div class="form-group">
                                <label for="">ID danh mục * :</label>
                                <select class="form-control" name="cat_id">
                                    <?php
                                    $query = "SELECT * FROM cat";
                                    $result = $mysqli->query($query);
                                    while ($arCAT = mysqli_fetch_assoc($result)) {
                                    ?>
                                        <option value="<?php echo $arCAT['cat_id'] ?>">
                                            <?php echo $arCAT['cat_name'] ?>
                                        </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Chi tiết sản phẩm * :</label>
                                <textarea name="product_detail"></textarea>
                                <script>
                                    CKEDITOR.replace('product_detail');
                                </script>
                            </div>
                            <div class="form-group">
                                <label for="">Giá * :</label>
                                <input type="text" id="price" class="form-control" name="price" required="">
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
                            <div class="form-group">
                                <label for="">Phân loại * :</label>
                                <select class="form-control" name="source_id">
                                    <?php
                                    $query1 = "SELECT * FROM source";
                                    $result1 = $mysqli->query($query1);
                                    while ($arSource = mysqli_fetch_assoc($result1)) {
                                    ?>
                                        <option value="<?php echo $arSource['source_id'] ?>">
                                            <?php echo $arSource['source_name'] ?>
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



        </div> <!-- end .p-3-->

    </div> <!-- end slimscroll-menu-->
</div>
<!-- /Right-bar -->

<?php
require_once '../inc/footer.php';
?>