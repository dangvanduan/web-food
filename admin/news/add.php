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
                        <h4 class="page-title">Thêm tin tức</h4>
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
                            if ($_POST['news_name']) {
                                $news_name = $_POST['news_name'];
                                $created_at = $_POST['created_at'];
                                $detail_text = $_POST['detail_text'];
                                $type_news = $_POST['type_news'];
                            }
                            $filename = $_FILES['picture']['name'];
                            $arFile = explode('.', $filename);
                            $Typefile = end($arFile);
                            $newFileName = $_POST['news_name'] . '-' . time() . '.' . $Typefile;
                            $tmpName = $_FILES['picture']['tmp_name'];
                            $resultUpload = move_uploaded_file($tmpName, '../../Uploads/shop97/images/news/' . $newFileName);


                            if ($resultUpload) {
                                $query = "INSERT INTO news (news_name,created_at,detail_text,picture,type_news) VALUE('{$news_name}','{$created_at}','{$detail_text}','{$newFileName}','{$type_news}')";
                                $result = $mysqli->query($query);
                            }
                            if (isset($result)) {
                                echo  '<script type="text/javascript">
                                function Redirect() {
                                window.location="http://localhost/admin/doan/news/index.php";
                                }
                                Redirect();
                                </script>';
                            } else {
                                echo "Lỗi! Không thể thêm tin tức";
                            }
                        }
                        ?>

                        <form id="demo-form" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="">Tên tin tức* :</label>
                                <input type="text" class="form-control" name="news_name" id="news_name" required="">
                            </div>

                            <div class="form-group">
                                <label for="">Ngày đăng * :</label>
                                <input type="text" id="created_at" class="form-control" name="created_at" required="">
                            </div>
                            <div class="form-group">
                                <label for="">Chi tiết * :</label>
                                <textarea name="detail_text"></textarea>
                                <script>
                                    CKEDITOR.replace('detail_text');
                                </script>
                            </div>
                            <div class="form-group">
                                <label for="">Hình ảnh * :</label>
                                <input type="file" class="form-control" name="picture" id="picture" required="">
                            </div>

                            <div class="form-group">
                                <label for="">Loại tin tức * :</label>
                                <input type="text" class="form-control" name="type_news" id="type_news" required="">
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