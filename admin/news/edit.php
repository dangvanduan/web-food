<?php
require_once '../inc/header.php';
require_once '../inc/leftbar.php';
?>

<!-- end Topbar -->

<!-- ========== Left Sidebar Start ========== -->

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
                        <h4 class="page-title">Sửa thông tin sản phẩm</h4>
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

                        $news_id = $_GET['news_id'];
                        $select = "SELECT * FROM news WHERE news_id={$news_id}";
                        if ($mysqli->query($select)) {
                            $arNews = mysqli_fetch_assoc($mysqli->query($select));
                        }
                        if (isset($_POST['submit'])) {
                            $news_name = $_POST['news_name'];
                            $created_at = $_POST['created_at'];
                            $detail_text = $_POST['detail_text'];
                            $picture = $_FILES['picture']['name'];
                            $type_news = $_POST['type_news'];
                            if ($picture = '') {
                                $query = "UPDATE news SET news_name = '{$news_name}',created_at = '{$created_at}', detail_text='{$detail_text}', type_news='{$type_news}' WHERE news_id = '{$news_id}'";
                                $result = $mysqli->query($query);
                                if ($result) {
                                    echo  '<script type="text/javascript">
                                    function Redirect() {
                                    window.location="http://localhost/admin/doan/news/index.php";
                                    }
                                    Redirect();
                                    </script>';
                                } else {
                                    echo "Lỗi, không thể sửa";
                                }
                            } else if ($picture != '') {
                                $arFile = explode('.', $picture);
                                $Typefile = end($arFile);
                                $newFileName = $arNews['news_name']  . time() . '.' . $Typefile;

                                $tmpName = $_FILES['picture']['tmp_name'];
                                $resultUpload = move_uploaded_file($tmpName, '../../Uploads/shop97/images/news/' . $newFileName);
                                $query2 = "UPDATE news SET news_name = '{$news_name}',created_at = '{$created_at}', detail_text='{$detail_text}', picture='{$newFileName}', type_news='{$type_news}' WHERE news_id = '{$news_id}'";
                                $result2 = $mysqli->query($query2);
                                if ($result2) {
                                    echo  '<script type="text/javascript">
                                    function Redirect() {
                                    window.location="http://localhost/admin/news/index.php";
                                    }
                                    Redirect();
                                    </script>';
                                } else {
                                    echo "Lỗi! Không thể sửa truyện";
                                }
                            }
                        }
                        ?>

                        <form id="demo-form" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="">Tên tin tức* :</label>
                                <input type="text" class="form-control" value="<?php echo $arNews['news_name'] ?>" name="news_name" id="news_name" required="">
                            </div>

                            <div class="form-group">
                                <label for="">Ngày đăng * :</label>
                                <input type="text" id="created_at" value="<?php echo $arNews['created_at'] ?>" class="form-control" name="created_at" required="">
                            </div>
                            <div class="form-group">
                                <label for="">Chi tiết * :</label>
                                <textarea name="detail_text" value=""><?php echo $arNews['detail_text']?></textarea>
                                <script>
                                CKEDITOR.replace('detail_text');
                                </script>
                            </div>
                            <div class="form-group">
                                <label for="">Hình ảnh * :</label>
                                <?php echo $arNews['picture']; ?>
                                <input type="file" class="form-control" value="<?php echo $arNews['picture'] ?>" name="picture" id="picture" required="">
                            </div>

                            <div class="form-group">
                                <label for="">Loại tin tức * :</label>
                                <input type="text" class="form-control" value="<?php echo $arNews['type_news'] ?>" name="type_news" id="type_news" required="">
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