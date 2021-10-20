<?php
require_once 'inc/header.php';
?>

<!--Template--
--End-->
</div>
</div>
</div>
</div>





<div class="adv">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="breadcrumb clearfix">
                    <ul>
                        <li itemtype="http://shema.org/Breadcrumb" itemscope="" class="home">
                            <a title="Đến trang chủ" href="/" itemprop="url"><span itemprop="title">Trang chủ</span></a>
                        </li>
                        <li class="icon-li"><strong>Kiểm tra chi tiết đơn hàng</strong> </li>
                    </ul>
                </div>
                <script type="text/javascript">
                    $(".link-site-more").hover(function() {
                        $(this).find(".s-c-n").show();
                    }, function() {
                        $(this).find(".s-c-n").hide();
                    });
                </script>
            </div>
        </div>
    </div>
</div>


<div class="main">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <script src="/app/services/orderServices.js"></script>
                <script src="/app/controllers/orderController.js"></script>
                <div class="order-tracking-content clearfix" ng-controller="orderController" ng-init="initController()">
                    <h1 class="title"><span>Chi tiết đơn hàng</span></h1>
                    <div class="order-tracking-block">
                        <div class="alert alert-danger" ng-if="Id<0">
                            Không tìm thấy đơn hàng trong hệ thống. Vui lòng kiểm tra lại mã đơn hàng hoặc số
                            điện thoại của bạn.
                        </div>
                        <form class="form-inline order-input" ng-submit="searchOrder()">
                            <div class="form-group">
                                <label>Nhập mã đơn hàng</label>
                                <input type="text" class="form-control" placeholder="Mã số đơn hàng (VD:123456789)" ng-model="AutoCode" ng-required='true' />

                                <button class="btn btn-primary">Xem ngay</button>
                            </div>
                        </form>
                        <div>
                            <style>
                                .page-item {
                                    border: 1px solid #ccc;
                                    padding: 5px 9px;
                                    color: red;
                                }

                                .current_page {
                                    background-color: #000;
                                    color: #FFF;
                                }
                            </style>
                           
                            <h2>Lịch sử mua hàng</h2>
                            <?php
                            $transaction_id=$_GET["transaction_id"];
                            $query="SELECT * FROM transaction WHERE transaction_id={$transaction_id}";
                        
                            if($mysqli->query($query)){
                                $arTransactions=mysqli_fetch_assoc($mysqli->query($query));
                                echo 'Tên người mua: '. $arTransactions['name'].'<br>';
                                echo 'Số điện thoại: '. $arTransactions['phone'].'<br>';
                                echo 'EmailL: '. $arTransactions['email'].'<br>';
                                echo 'Địa chỉ: ' . $arTransactions['address'];
                            }
                            ?>
                            <div class="table-responsive clearfix order-tracking-info">
                                <table class="table table-mycart">
                                    <thead>
                                        <tr>
                                            <th>ID đơn hàng</th>
                                            <th>ID giao dịch</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Số lượng</th>
                                            <th>Giá</th>
                                            <th>Thành tiền</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        if (!isset($_GET['transaction_id'])) {
                                            echo "Vui lòng đăng nhập để xem chi tiết đơn hàng";
                                        } else {

                                            $transaction_id = $_GET['transaction_id'];
                                            $query = "SELECT * FROM cart WHERE transaction_id=$transaction_id ";
                                            $result = $mysqli->query($query);
                                            while ($arTran = mysqli_fetch_assoc($result)) {
                                        ?>
                                                <tr>
                                                    <td><?php echo $arTran['cart_id'] ?></td>
                                                    <td><?php echo $arTran['transaction_id']; ?></td>
                                                    <td><?php echo $arTran['product_name']; ?></td>
                                                    <td><?php echo $arTran['amount']; ?></td>
                                                    <td><?php echo $arTran['price']; ?></td>
                                                    <td><?php echo ($arTran['amount']*$arTran['price']);?></td>


                                                </tr>

                                        <?php
                                            }
                                        }
                                        ?>
                                        <tr>
                                            <!-- <td colspan="3" class="border-right">
                                <div class="box-customer-content">
                                    <div class="title"><span>Thông tin giao hàng</span></div>
                                    <div>[Anh/Chị]<b> {{DeliveryName}}</b></div>
                                    <div>
                                        {{DeliveryEmail}} |
                                        {{DeliveryAddress}} |
                                        {{DeliveryPhone}}
                                    </div>
                                </div>
                                <div class="box-customer-content">
                                    <div class="title"><span>Thông tin thanh toán</span></div>
                                    <div>[Anh/Chị]<b>{{CustomerName}}</b></div>
                                    <div>
                                        {{CustomerEmail}} |
                                        {{CustomerAddress}} |
                                        {{CustomerPhone}}
                                    </div>
                                </div>
                            </td> -->
                                            <td colspan="4">
                                                <table class="table">
                                                    <tbody>
                                                        <!-- <tr>
                                                            <td class="text-left"><b>Tổng tiền thanh toán</b></td>
                                                            <td class="text-right ">
                                                                <b class="total-payment">
                                                                    {{Amount|number:0}}
                                                                </b>
                                                                <p class="note"></p>
                                                            </td>
                                                        </tr> -->
                                                        <!-- <tr class="text-center order-stt">
                                            <td colspan="2">
                                                <div>Trạng thái đơn hàng</div>
                                                <div><b>{{ShipmentStateName}}</b></div>
                                            </td>
                                        </tr> -->
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="button text-right">
                                <?php if (isset($_GET['sum_money'])) {
                                    $sum_money = $_GET['sum_money'];
                                ?>
                                <label>Tổng tiền đơn hàng : </label><?php echo number_format($sum_money,0,',','.'); ?> đ
                                <?php } ?><br/>
                                <a class="btn btn-default" href="kiem-tra-don-hang">Trở về danh sách đơn hàng</a>
                                <a class="btn btn-primary" href="san-pham">Tiếp tục mua hàng</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="partner">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <link href="/Scripts/owl-carousel/owl.carousel.css" rel="stylesheet" />
                <link href="/Scripts/owl-carousel/owl.theme.css" rel="stylesheet" />
                <script src="/Scripts/owl-carousel/owl.carousel.min.js"></script>
                <script src="/app/services/moduleServices.js"></script>
                <script src="/app/controllers/moduleController.js"></script>
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
                        "Logo": "Uploads/shop97/images/product/nokia_logo.jpeg",
                        "Index": 1,
                        "Inactive": false
                    }, {
                        "Id": 3,
                        "ShopId": 97,
                        "Name": "samsung",
                        "Link": "#",
                        "Logo": "Uploads/shop97/images/product/samsung.png",
                        "Index": 2,
                        "Inactive": false
                    }, {
                        "Id": 4,
                        "ShopId": 97,
                        "Name": "black",
                        "Link": "#",
                        "Logo": "Uploads/shop97/images/product/blackberry.png",
                        "Index": 3,
                        "Inactive": false
                    }, {
                        "Id": 5,
                        "ShopId": 97,
                        "Name": "LG",
                        "Link": "#",
                        "Logo": "Uploads/shop97/images/product/LGlogo.png",
                        "Index": 4,
                        "Inactive": false
                    }, {
                        "Id": 6,
                        "ShopId": 97,
                        "Name": "Sony",
                        "Link": "#",
                        "Logo": "Uploads/shop97/images/product/Sony_Ericsson85.png",
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