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
                                <h4 class="page-title">Sửa thông tin đơn hàng</h4>
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
                                $cart_id = $_GET['cart_id'];
                                $select = "SELECT * FROM cart WHERE cart_id={$cart_id}";
                                if ($mysqli->query($select)) {
                                    $arCart = mysqli_fetch_assoc($mysqli->query($select));
                                }
                                if (isset($_POST['submit'])) {
                                    $transaction_id = $_POST['transaction_id'];
                                    $product_name = $_POST['product_name'];
                                    $product_id = $_POST['product_id'];
                                    $amount = $_POST['amount'];
                                    $price = $_POST['price'];                                
                                   
                                    $query = "UPDATE cart SET transaction_id = {$transaction_id}, product_name = '{$product_name}',product_id = {$product_id},amount = {$amount}, price = {$price} WHERE cart_id = {$cart_id}";
                                    $result = $mysqli->query($query);
                                    if ($result) {
                                        echo  '<script type="text/javascript">
                                        function Redirect() {
                                        window.location="http://localhost/doan/admin/cart/index.php";
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
                                        <label for="">ID giao dịch* :</label>
                                        <input type="text" class="form-control" value="<?php echo $arCart['transaction_id']?>" name="transaction_id" id="transaction_id" required="">
                                    </div>

                                    <div class="form-group">
                                        <label for="">Tên sản phẩm * :</label>
                                        <input type="text" id="product_name" value="<?php echo $arCart['product_name']?>" class="form-control" name="product_name" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="">ID sản phẩm * :</label>
                                        <input type="text" id="product_id" value="<?php echo $arCart['product_id']?>" class="form-control" name="product_id" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Số lượng * :</label>
                                        <input type="text" id="amount" value="<?php echo $arCart['amount']?>" class="form-control" name="amount" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Giá * :</label>
                                        <input type="text" id="price" value="<?php echo $arCart['price']?>" class="form-control" name="price" required="">
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