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
                        <li class="icon-li"><strong>Kiểm tra đơn hàng</strong> </li>
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
                <script src="app/services/orderServices.js"></script>
                <script src="app/controllers/orderController.js"></script>
                <div class="order-tracking-content clearfix" ng-controller="orderController" ng-init="initController()">
                    <h1 class="title"><span>Kiểm tra đơn hàng</span></h1>
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

                            <div class="table-responsive clearfix order-tracking-info">
                                <table class="table table-mycart">
                                    <thead>
                                        <tr>
                                            <th>ID giao dịch</th>
                                            <th>Tên người mua</th>
                                            <th>Thành tiền</th>
                                            <th>Thanh toán</th>
                                            <th>Ngày mua</th>
                                            <th>Chi tiết</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        if (!isset($_SESSION['users'])) {
                                            echo "Vui lòng đăng nhập để xem chi tiết đơn hàng";
                                        } else {
                                            $info = $_SESSION['users'];
                                            $user_id = $info['user_id'];
                                            $queryTSD = "SELECT count(*) AS TSD FROM transaction WHERE user_id= $user_id ORDER BY transaction_id DESC";

                                            $resultTSD = $mysqli->query($queryTSD);
                                            $arTmp = mysqli_fetch_assoc($resultTSD);
                                            $tongSoDong = $arTmp['TSD'];
                                            // tổng số sản phâm trên 1 trang
                                            $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 12;
                                            // Tổng số trang
                                            $tongsoTrang = ceil($tongSoDong / $item_per_page);
                                            // trang hiện tại
                                            $current_page = !empty($_GET['page']) ? $_GET['page'] : 1;

                                            //offset
                                            $offset = ($current_page - 1) * $item_per_page;
                                            $query = "SELECT * FROM transaction WHERE user_id = $user_id ORDER BY transaction_id DESC LIMIT $offset, $item_per_page";
                                            $result = $mysqli->query($query);
                                            while ($arTran = mysqli_fetch_assoc($result)) {
                                                $nameReplace = 'chi-tiet-don-hang';
                                                $url = $nameReplace . '-' . $arTran['transaction_id'].'-'.$arTran['total'];
                                        ?>
                                                <tr>
                                                    <td><?php echo $arTran['transaction_id']; ?></td>
                                                    <td><?php echo $arTran['name']; ?></td>
                                                    <td><?php echo $arTran['sum_money']; ?></td> 
                                                    <td><?php echo $arTran['total']?></td>                                   
                                                    <td><?php echo $arTran['order_day']; ?></td>
                                                    <!-- chi-tiet-don-hang.php?transaction_id=150&sum_money=49300 -->
                                                    <td><a href="<?php echo $url; ?>">Xem chi tiết</a></td>

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
                                <!-- <a class="btn btn-default" href="/don-hang.php">Trở về danh sách đơn hàng</a> -->
                                <a class="btn btn-primary" href="san-pham.php">Tiếp tục mua hàng</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="text-center  clear">
    <div class="row">
        <nav>
            <ul class="pagination">
                <?php
                if(isset($_SESSION['users'])){
                    include './phan-trang.php';
                }else{

                }
                
                ?>
            </ul>
        </nav>
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