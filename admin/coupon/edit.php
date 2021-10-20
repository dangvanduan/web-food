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
                                <h4 class="page-title">Sửa thông tin sự kiện</h4>
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
                                $coupon_id = $_GET['coupon_id'];
                                $select = "SELECT * FROM coupon WHERE coupon_id={$coupon_id}";
                                if ($mysqli->query($select)) {
                                    $arCoupon = mysqli_fetch_assoc($mysqli->query($select));
                                }
                                if (isset($_POST['submit'])) {
                                    
                                    $coupon_name = $_POST['coupon_name'];
                                    $coupon_code = $_POST['coupon_code'];
                                    
                                    $coupon_value = $_POST['coupon_value'];            
                                    $coupon_number = $_POST['coupon_number'];                     
                                   
                                    $query = "UPDATE coupon SET coupon_id = {$coupon_id}, coupon_name = '{$coupon_name}',coupon_code = {$coupon_code}, coupon_value = {$coupon_value}, coupon_number = {$coupon_number}  WHERE coupon_id = {$coupon_id}";
                                    $result = $mysqli->query($query);
                                    if ($result) {
                                        echo  '<script type="text/javascript">
                                        function Redirect() {
                                        window.location="http://localhost/doan/coupon/index.php";
                                        }
                                        Redirect();
                                        </script>';
                                    } else {
                                        echo "Lỗi";
                                    }
                                }
                                ?>
                                <form id="demo-form" method="POST" >
                                    <div class="form-group">
                                        <label for="">ID * :</label>
                                        <label for=""><?php echo $arCoupon['coupon_id']?></label>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Tên sự kiện * :</label>
                                        <input type="text" id="coupon_name" value="<?php echo $arCoupon['coupon_name']?>" class="form-control" name="coupon_name" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Mã giảm giá * :</label>
                                        <input type="text" id="product_id" value="<?php echo $arCoupon['coupon_code']?>" class="form-control" name="coupon_code" required="">
                                    </div>
      
                                    <div class="form-group">
                                        <label for="">Hệ số giá trị * :</label>
                                        <input type="text" id="coupon_value" value="<?php echo $arCoupon['coupon_value']?>" class="form-control" name="coupon_value" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Số lượng mã giảm * :</label>
                                        <input type="text" id="coupon_number" value="<?php echo $arCoupon['coupon_number']?>" class="form-control" name="coupon_number" required="">
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