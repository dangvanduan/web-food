<?php

require_once 'inc/header.php';

?>
</div>
</div>
</div>
</div>


<div class="main">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <script src="app/services/orderServices.js"></script>
                <script src="app/controllers/orderController.js"></script>
                <div class="payment-content" ng-controller="orderController" ng-init="initCheckoutController()">
                    <h1 class="title"><span>Thanh toán</span></h1>
                    <div class="steps clearfix">
                        <ul class="clearfix">
                            <li class="cart active col-md-2 col-xs-12 col-sm-4 col-md-offset-3 col-sm-offset-0 col-xs-offset-0"><span><i class="glyphicon glyphicon-shopping-cart"></i></span><span>Giỏ hàng của tôi</span><span class="step-number"><a>1</a></span></li>
                            <li class="payment active col-md-2 col-xs-12 col-sm-4"><span><i class="glyphicon glyphicon-usd"></i></span><span>Thanh toán</span><span class="step-number"><a>2</a></span></li>
                            <li class="finish col-md-2 col-xs-12 col-sm-4"><span><i class="glyphicon glyphicon-ok"></i></span><span>Hoàn tất</span><span class="step-number"><a>3</a></span></li>
                        </ul>
                    </div>
                    <div class="payment-title text-center hidden">
                        <h3>
                            GIAO HÀNG TOÀN QUỐC - THANH TOÁN KHI NHẬN HÀNG - 15 NGÀY ĐỔI TRẢ MIỄN PHÍ
                        </h3>
                        <div>
                            Nếu gặp khó khăn trong việc đặt hàng xin hãy gọi<b class="hotline"> 0908770095 </b>
                            để được hỗ trợ tốt nhất.
                        </div>
                    </div>
                    <form class="payment-block clearfix" id="checkout-container" action="" method="POST">
                        <?php
                        // foreach ($cart as $key =>$value) {
                        ?>
                        <div class="col-md-4 col-sm-12 col-xs-12 payment-step step2">
                            <h4>1. Địa chỉ thanh toán và giao hàng</h4>
                            <div class="step-preview clearfix">

                                <div class="info-user" ng-if="CustomerId>0">
                                    <label>Người nhận:<span>{{CustomerName}}</span></label>
                                    <label>Điện thoại:<span>{{CustomerPhone}}</span></label>
                                    <label>Email:<span>{{CustomerEmail}}</span></label>
                                    <label>Địa chỉ:<span>{{CustomerAddress}}</span></label>

                                    <div class="edit-button">
                                        <a href="#modalAccount"><i class="fa fa-pencil-square-o"></i></a>
                                    </div>
                                </div>

                                <h2 class="title">Thông tin giao hàng</h2>
                                <?php
                                $sum_final = 0;
                                if (isset($_SESSION['users'])) {
                                    $users = $_SESSION['users'];

                                    if (isset($_POST['user_name'])) {
                                        $user_id = $users['user_id'];
                                        $user_name = $_POST['user_name'];
                                        $phone = $_POST['phone'];
                                        $email = $_POST['email'];
                                        $address = $_POST['address'];
                                        $order_day = date("Y-m-d H:i:s");

                                        if (isset($_POST['coupon_value'])) {
                                            $coupon_value = $_POST['coupon_value'];
                                            $total_price = 0;
                                            $total = 0;
                                            foreach ($cart as $value) {
                                                $total_price += ($value['price'] * $value['quantity']) * (1 - $coupon_value);
                                                $total += ($value['price'] * $value['quantity']);
                                            }
                                            $sum_final = $total_price;
                                            // $query = "INSERT INTO transaction (user_id,name,phone,email,address,sum_money,total,order_day) VALUE('{$user_id}','{$user_name}','{$phone}','{$email}','{$address}','{$total_price}','{$total}','{$order_day}')";
                                            // $result = $mysqli->query($query);
                                            // if ($result) {
                                            //     $transaction_id = $mysqli->insert_id;
                                            //     foreach ($cart as $value) {

                                            //         $query1 = "INSERT INTO cart (transaction_id,product_name,product_id,amount,price) VALUE('{$transaction_id}','{$value['name']}','{$value['product_id']}','{$value['quantity']}','{$value['price']}') ";
                                            //         $result1 = $mysqli->query($query1);
                                            //     }
                                            //     unset($_SESSION['cart']);
                                            //     echo '<script type="text/javascript"> alert("Đặt hàng thành công");</script>';
                                            // }
                                        }
                                    }
                                ?>
                                    <div class="form-block" ng-show="IsOtherAddress==true">
                                        
                                        <div class="form-group"><input class="form-control" placeholder="Họ & Tên" name="user_name" value="<?php echo $users['full_name'] ?>" type="text" /></div>
                                        <div class="form-group"><input class="form-control" placeholder="Số điện thoại" name="phone" value="<?php echo $users['phone'] ?>" type="text" /></div>
                                        <div class="form-group"><input class="form-control" placeholder="Email" name="email" value="<?php echo $users['user_name'] ?>" type="text" /></div>
                                        <div class="form-group"><input class="form-control" placeholder="Địa chỉ" name="address" value="<?php echo $users['address'] ?>" type="text" /></div>
                                        <div class="form-group">
											<select id="thanhpho" class="form-control">
												<option value="">---Chọn quận/huyện---
												<option value="Hòa Vang">Hòa Vang
												<option value="Thanh Khê">Thanh Khê
												<option value="Cẩm Lệ">Cẩm Lệ
												<option value="Sơn Trà">Sơn Trà
												<option value="Ngũ Hành Sơn">Ngũ Hành Sơn
												<option value="Liên Chiểu">Liên Chiểu
												<option value="Hải Châu">Hải Châu											
											</select>
										</div>
                                    </div>
                                <?php
                                } else {
                                ?>
                                    <div class="alert alert-danger">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <strong>Vui lòng đănh nhập để mua hàng! </strong><a href="dang-nhap"> Login </a>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12 col-xs-12 payment-step step3">
                            <h4>2. CHI TIẾT ĐƠN HÀNG</h4>
                            <table class="table table-bordered table-inverse table-hover">
                                <thead>
                                    <tr>
                                        <th>Tên sản phẩm </th>
                                        <th>Giá </th>
                                        <th>Số lượng </th>
                                        <th>Thành tiền </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $total_price = 0;
                                    foreach ($cart as $key => $value) {
                                        $total_price += ($value['price'] * $value['quantity']);
                                    ?>
                                        <tr>
                                            <td><?php echo $value['name'] ?></td>
                                            <td><?php echo $value['price'] ?></td>
                                            <td><?php echo $value['quantity'] ?></td>
                                            <td><?php echo ($value['price'] * $value['quantity']) ?></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <!-- <h4>2. Thanh toán và vận chuyển</h4>
            <div class="step-preview clearfix">
                <h2 class="title">Vận chuyển</h2>
                <div class="form-group ">
                    <select class="form-control" ng-model="ShippingRateId"
                            ng-options="item.Id as item.Name for item in ShippingRates" ng-change="changeShippingRate()"></select>
                </div>
                <h2 class="title">Thanh toán</h2>
                <div class="radio" ng-repeat="item in PaymentMethods">
                    <label>
                        <input type="radio" value="{{item.Id}}" name="optionsRadios" ng-model="PaymentMethodId" ng-click="changePaymentMethod(item.Id)" />
                        {{item.Name}}
                    </label>
                </div>
            </div> -->
                        </div>
                        <div class="col-md-4 col-sm-12 col-xs-12 payment-step step1">
                            <h4>3. Thông tin đơn hàng</h4>
                            <div class="step-preview">
                                <div class="cart-info">
                                    <div class="cart-items">
                                        <div class="cart-item clearfix" ng-repeat="item in OrderDetails">
                                            <span class="image pull-left" style="margin-right:10px;">
                                                <a href="san-pham/{{item.ProductCode}}.html">
                                                    <img src="{{item.ProductImage}}" class="img-responsive" />
                                                </a>
                                            </span>
                                            <div class="product-info pull-left">
                                                <span class="product-name">
                                                    <a href="san-pham/{{item.ProductCode}}.html">{{item.ProductName}}</a> x <span>{{item.Quantity | number:0}}</span>
                                                </span>
                                                <p class="note" ng-if="item.IsVariant==true">{{item.VariantName}}</p>
                                            </div>
                                            <span class="price">{{item.Amount | number:0}} ₫</span>
                                        </div>
                                    </div>
                                    <div class="total-price">
                                        Thành tiền <label id="thanh_tien"><?php echo $total_price ?></label>
                                    </div>

                                    <div class="total-payment">
                                        Thanh toán <span id="thanh_toan"><?php echo $sum_final ?> ₫</span>
                                    </div>
                                    <div class="total_payment">
                                        <h3>Thẻ giảm giá</h3>
                                        <select class="form-control" name="coupon_value">
                                            <?php
                                            if (isset($_SESSION['users'])) {
                                                $info = $_SESSION['users'];
                                                $user_id = $info['user_id'];
                                                echo $user_id = $info['user_id'];
                                                $query = "SELECT * FROM ticket WHERE $user_id=user_id";
                                                $result = $mysqli->query($query);
                                                while ($arTicket = mysqli_fetch_assoc($result)) {
                                            ?>
                                                <option id="giamgia<?php echo $arTicket['coupon_id']?>" onclick="thegiamgia(<?php echo $arTicket['coupon_id'] ?>)" value="<?php echo $arTicket['coupon_value'] ?>">
                                                    <?php echo $arTicket['coupon_name'] ?>
                                                </option>
                                            <?php
                                                }
                                            }

                                           
                                            ?>
                                        </select>
                                    </div>
                                    <script type="text/javascript">
                                        function thegiamgia(a) {
                                            const b = $('#giamgia'+a).val();     
                                            const c= $('#thanh_tien').val();                               
                                            alert(a)
                                                alert(b)
                                                alert(c)
                                            $.ajax({
                                                type: 'POST',
                                                url: 'ajax/thanh_tien.php',                                     
                                                data: {
                                                    coupon_id: a,
                                                    coupon_value: b,
                                                    total_price: c,                                        
                                                },
                                                success: (data) => {
                                                    $('#thanh_toan').html(data*b);
                                                },
                                                error: () => {
                                                    alert('Có Lỗi Xảy Ra')
                                                }
                                            })
                                            return false;
                                        }
                                    </script>
                                    <style type="text/css">
                                    .button-submit{
                                        margin-right:5px;
                                    }
                                    .btn btn-default{
                                        padding-right:5px;
                                    }
                                    </style>                                                             
                                    <div class="button-submit">   
                                        <?php
                                            $_SESSION['sum_final']=$sum_final;
                                        ?>
                                        
                                        <a class="btn btn-primary" href="hoan-tat.php" type="button">Hoàn tất</a>    
                                        <button class="btn btn-default" type="submit">Tính tiền</button>                                                                                                                                            
                                    </div>
                                  
                                </div>
                            </div>
                        </div>
                        <?php
                        // }
                        ?>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>


<div class="partner">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <link href="Scripts/owl-carousel/owl.carousel.css" rel="stylesheet" />
                <link href="Scripts/owl-carousel/owl.theme.css" rel="stylesheet" />
                <script src="Scripts/owl-carousel/owl.carousel.min.js"></script>
                <script src="app/services/moduleServices.js"></script>
                <script src="app/controllers/moduleController.js"></script>
                <!--Begin-->
                <div class="partner-content owl-carousel" ng-controller="moduleController" ng-init="initPartnerController('Partners')">
                    <h3 class="title">Đối tác</h3>
                    <div class="partner-block">
                        <div class="partner-item" ng-repeat="item in Partners">
                            <a href="{{item.Link}}" target="_blank" title="{{item.Name}}">
                                <img ng-src="{{item.Logo}}" alt="{{item.Name}}" class="img-responsive" />
                            </a>
                        </div>
                    </div>
                    <div class="boxprevnext">
                        <a class="prev prevlogo"><i class="fa fa-angle-left"></i></a>
                        <a class="next nextlogo"><i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
                <script type="text/javascript">
                    $(document).ready(function() {
                        var owl = $(".partner-block");
                        owl.owlCarousel({
                            autoPlay: true,
                            autoPlay: 5000,
                            items: 6,
                            slideSpeed: 1000,
                            pagination: false,
                            itemsDesktop: [1200, 6],
                            itemsDesktopSmall: [980, 5],
                            itemsTablet: [767, 4],
                            itemsMobile: [480, 2]
                        });
                        $(".partner-content .nextlogo").click(function() {
                            owl.trigger('owl.next');
                        });
                        $(".partner-content .prevlogo").click(function() {
                            owl.trigger('owl.prev');
                        });
                    });
                </script>
                <!--End-->
                <script type="text/javascript">
                    window.Partners = [{
                        "Id": 2,
                        "ShopId": 97,
                        "Name": "nokia",
                        "Link": "#",
                        "Logo": "/Uploads/shop97/images/product/nokia_logo.jpeg",
                        "Index": 1,
                        "Inactive": false
                    }, {
                        "Id": 3,
                        "ShopId": 97,
                        "Name": "samsung",
                        "Link": "#",
                        "Logo": "/Uploads/shop97/images/product/samsung.png",
                        "Index": 2,
                        "Inactive": false
                    }, {
                        "Id": 4,
                        "ShopId": 97,
                        "Name": "black",
                        "Link": "#",
                        "Logo": "/Uploads/shop97/images/product/blackberry.png",
                        "Index": 3,
                        "Inactive": false
                    }, {
                        "Id": 5,
                        "ShopId": 97,
                        "Name": "LG",
                        "Link": "#",
                        "Logo": "/Uploads/shop97/images/product/LGlogo.png",
                        "Index": 4,
                        "Inactive": false
                    }, {
                        "Id": 6,
                        "ShopId": 97,
                        "Name": "Sony",
                        "Link": "#",
                        "Logo": "/Uploads/shop97/images/product/Sony_Ericsson85.png",
                        "Index": 5,
                        "Inactive": false
                    }];
                </script>
            </div>
        </div>
    </div>
</div>
<?php
require_once 'inc/footer.php';
?>