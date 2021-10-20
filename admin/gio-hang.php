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
                        <li class="icon-li"><strong>Giỏ hàng</strong> </li>
                    </ul>
                </div>
                <!-- <script type="text/javascript">
    $(".link-site-more").hover(function () { $(this).find(".s-c-n").show(); }, function () { $(this).find(".s-c-n").hide(); });
</script> -->
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
                <div class="cart-content" ng-controller="orderController" ng-init="initOrderCartController()">
                    <h1 class="title"><span>Giỏ hàng của tôi</span></h1>
                    <div class="steps clearfix">
                        <ul class="clearfix">
                            <li class="cart active col-md-2 col-xs-12 col-sm-4 col-md-offset-3 col-sm-offset-0 col-xs-offset-0"><span><i class="glyphicon glyphicon-shopping-cart"></i></span><span>Giỏ hàng của tôi</span><span class="step-number"><a>1</a></span></li>
                            <li class="payment col-md-2 col-xs-12 col-sm-4"><span><i class="glyphicon glyphicon-usd"></i></span><span>Thanh toán</span><span class="step-number"><a>2</a></span></li>
                            <li class="finish col-md-2 col-xs-12 col-sm-4"><span><i class="glyphicon glyphicon-ok"></i></span><span>Hoàn tất</span><span class="step-number"><a>3</a></span></li>
                        </ul>
                    </div>
                    <div class="cart-block">
                        <div class="cart-info table-responsive">
                            <table class="table product-list">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Tên sản phẩm</th>
                                        <th>Giá</th>
                                        <th>Số lượng</th>
                                        <th>Thành tiền</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $product_id = $_GET['product_id'];
                                    
                                    $query = "SELECT * FROM product WHERE product_id='{$product_id}'";
                                    $result = $mysqli->query($query);
                                    
                                    while ($arPro = mysqli_fetch_assoc($result)) {
                                        $product_id = $arPro['product_id'];
                                       
                                    ?>
                                        <tr>
                                            <td class="image">
                                                <a href="chi-tiet.php?product_id=<?php echo $product_id ?>"> <img src="/Uploads/shop97/images/product/<?php echo $arPro['picture'] ?>" class="img-responsive" /></a>
                                            </td>
                                            <td class="des">
                                                <h2><a href="chi-tiet.php?product_id=<?php echo $product_id ?>"><?php echo $arPro['product_name']; ?></a></h2>

                                            </td>
                                            <td id="Price<?php echo $product_id ?>" class="price"><?php echo $arPro['price'] ?></td>
                                            <td class="quantity">
                                                <input id="numitem<?php echo $product_id ?>" onchange='Numitem(<?php echo $product_id ?>)' type="number" value="<?php $number ?>" class="text" ng-model="item.Quantity" ng-change="updateItemCart(item)" />
                                            </td>
                                            <td id="tien<?php echo $product_id ?>" class="amount">

                                            </td>
                                            <td class="remove">
                                                <a ng-click="removeItemCart(item)" href="javascript:void(0)">
                                                    <i class="glyphicon glyphicon-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>

                                </tbody>
                                <script>
                                    function Numitem(id) {
                                        const a = parseInt(document.getElementById('numitem' + id).value);
                                        console.log(a);
                                        const b = (document.getElementById('Price' + id).innerHTML);
                                        console.log(b);
                                        document.getElementById("tien" + id).innerHTML= a*b;
                                        document.getElementById("tongtien").innerHTML= a*b;

                                    }
                                </script>
                            </table>
                        </div>
                        <div class="clearfix text-right">
                            <span><b>Tổng thanh toán:</b></span>
                            <span class="pay-price">
                              <span id="tongtien"></span>đ
                            </span>
                        </div>
                        <div class="button text-right">
                            <a class="btn btn-default" href="/san-pham.php" onclick="">Tiếp tục mua hàng</a>
                            <a class="btn btn-primary" href="/thanh-toan.php">Tiến hành thanh toán</a>
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