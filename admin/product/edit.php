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
                        <?php
                        $product_id = $_GET['product_id'];
                        $select = "SELECT * FROM product WHERE product_id={$product_id}";
                        if ($mysqli->query($select)) {
                            $arProduct = mysqli_fetch_assoc($mysqli->query($select));
                        }
                        if (isset($_POST['submit'])) {
                            $product_name = $_POST['product_name'];
                            $product_describe = $_POST['product_describe'];
                            $picture = $_FILES['picture']['name'];
                            $cat_id = $_POST['cat_id'];
                            $product_detail = $_POST['product_detail'];
                            $price = $_POST['price'];
                            $parent_id = $_POST['parent_id'];
                            $source=$_POST['source'];
                            if ($picture == '') {
                                $query = "UPDATE product SET product_name = '{$product_name}',product_describe = '{$product_describe}', cat_id = '{$cat_id}', product_detail='{$product_detail}',price='{$price}', parent_id = '{$parent_id}' , source = '{$source}'WHERE product_id = '{$product_id}'";
                                $result = $mysqli->query($query);
                                if ($result) {
                                    echo  '<script type="text/javascript">
                                    function Redirect() {
                                    window.location="http://localhost/admin/doan/product/index.php";
                                    }
                                    Redirect();
                                    </script>';
                                } else {
                                    echo "Loi, khong the sua tin tuc";
                                }
                            } else if ($picture != '') {
                                $arFile = explode('.', $picture);
                                $Typefile = end($arFile);
                                $newFileName = $arNews['news_name']  . time() . '.' . $Typefile;

                                $tmpName = $_FILES['picture']['tmp_name'];
                                $resultUpload = move_uploaded_file($tmpName, '../../Uploads/shop97/images/product/' . $newFileName);
                                $query2 = "UPDATE product SET product_name = '{$product_name}',product_describe = '{$product_describe}', cat_id='{$cat_id}', picture='{$newFileName}', product_detail='{$product_detail}',price='{$price}', parent_id='{$parent_id}', source = '{$source}' WHERE product_id = '{$product_id}'";
                                $result2 = $mysqli->query($query2);
                                if ($result2) {
                                    echo  '<script type="text/javascript">
                                    function Redirect() {
                                    window.location="http://localhost/admin/doan/product/index.php";
                                    }
                                    Redirect();
                                    </script>';
                                } else {
                                    echo "Lỗi! Không thể sửa truyện";
                                }
                            }
                        }
                        ?>

                        <div class="alert alert-warning d-none fade show">
                            <h4 class="mt-0">Oh snap!</h4>
                            <p class="mb-0">This form seems to be invalid :(</p>
                        </div>

                        <div class="alert alert-info d-none fade show">
                            <h4 class="mt-0">Yay!</h4>
                            <p class="mb-0">Everything seems to be ok :)</p>
                        </div>

                        <form id="demo-form" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="">Tên sản phẩm* :</label>
                                <input type="text" class="form-control" value="<?php echo $arProduct['product_name']; ?>" name="product_name" id="product_name" required="">
                            </div>

                            <div class="form-group">
                                <label for="">Mô tả sản phẩm * :</label>

                                <textarea name="product_describe" value=""><?php echo $arProduct['product_describe'] ?></textarea>
                                <script>
                                    CKEDITOR.replace('product_describe');
                                </script>
                            </div>

                            <div class="form-group">
                                <label for="">Hình ảnh * :</label>
                                <?php echo $arProduct['picture']; ?>
                                <input type="file" class="form-control" value="<?php echo $arProduct['picture']; ?>" name="picture" id="picture" required="">
                            </div>

                            <div class="form-group">
                                <label for="">ID danh mục * :</label>
                                <select class="form-control" name="cat_id">
                                    <?php
                                    $query = "SELECT * FROM cat";
                                    $result = $mysqli->query($query);
                                    while ($arCAT = mysqli_fetch_assoc($result)) {
                                    ?>
                                        <option selected value="<?php echo $arCAT['cat_id'] ?>">
                                            <?php echo $arCAT['cat_name'] ?>
                                        </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                                
                            </div>
                            <div class="form-group">
                                <label for="">Chi tiết sản phẩm * :</label>
                                <textarea name="product_detail" value=""><?php echo $arProduct['product_detail'] ?></textarea>
                                <script>
                                    CKEDITOR.replace('product_detail');
                                </script>
                            </div>
                            <div class="form-group">
                                <label for="">Giá* :</label>
                                <input type="text" class="form-control" value="<?php echo $arProduct['price']; ?>" name="price" id="price" required="">
                            </div>
                            <div class="form-group">
                                <label for="">ID cha* :</label>
                                <select class="form-control" name="parent_id">
                                    <?php
                                    $query4 = "SELECT * FROM cat";
                                    $result4 = $mysqli->query($query4);
                                    while ($arCat = mysqli_fetch_assoc($result4)) {
                                    ?>
                                        <option selected value="<?php echo $arCat['parent_id'] ?>">
                                            <?php echo $arCat['cat_name'] ?>
                                        </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Phân loại* :</label>
                                <select class="form-control" name="source_id">
                                    <?php
                                    $query1 = "SELECT * FROM source";
                                    $result1 = $mysqli->query($query1);
                                    while ($arSource = mysqli_fetch_assoc($result1)) {
                                    ?>
                                        <option selected value="<?php echo $arSource['source_id'] ?>">
                                            <?php echo $arSource['source_name'] ?>
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
<?php
require_once '../inc/footer.php';
?>