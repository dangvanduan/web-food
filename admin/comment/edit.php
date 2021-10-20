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
                        <h4 class="page-title">Sửa thông tin bình luận</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                        <?php
                        $comment_id = $_GET['comment_id'];
                        $select = "SELECT * FROM comment WHERE comment_id={$comment_id}";
                        if ($mysqli->query($select)) {
                            $arCmt = mysqli_fetch_assoc($mysqli->query($select));
                        }
                        if (isset($_POST['submit'])) {
                            $user_id = $_POST['user_id'];
                            $product_id = $_POST['product_id'];
                          
                            $content = $_POST['content'];
                            $created_at = $_POST['created_at'];
                            
                            $parent_id = $_POST['parent_id'];
                            $query = "UPDATE comment SET product_id = '{$product_id}',content = '{$content}', created_at='{$created_at}', parent_id = '{$parent_id}' WHERE comment_id = '{$comment_id}'";
                            $result = $mysqli->query($query);
                                if ($result) {
                                    echo  '<script type="text/javascript">
                                    function Redirect() {
                                    window.location="http://localhost/doan/admin/comment/index.php";
                                    }
                                    Redirect();
                                    </script>';
                                } else {
                                    echo "Lỗi";
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
                                <label for="">ID người dùng* :</label>
                                <?php echo $arCmt['user_id']; ?>
                                
                            </div>

                            <div class="form-group">
                                <label for="">ID sản phẩm * :</label>
                                <input type="text" class="form-control" value="<?php echo $arCmt['product_id']; ?>" name="product_id" id="product_id" required="">
                                
                            </div>
                            <div class="form-group">
                                <label for="">Nội dung* :</label>
                                <input type="text" class="form-control" value="<?php echo $arCmt['content']; ?>" name="content" id="content" required="">
                                
                            </div>
                            <div class="form-group">
                                <label for="">Ngày đăng* :</label>
                                <input type="text" class="form-control" value="<?php echo $arCmt['created_at']; ?>" name="created_at" id="created_at" required="">
                                
                            </div>
                            <div class="form-group">
                                <label for="">ID cha* :</label>
                                <input type="text" class="form-control" value="<?php echo $arCmt['parent_id']; ?>" name="parent_id" id="parent_id" required="">
                                
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