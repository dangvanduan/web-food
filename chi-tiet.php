<?php
require_once 'inc/header.php';
?>
<!--Template--
--End-->
</div>
</div>
</div>
</div>







<div class="main">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

                <script src="app/services/moduleServices.js"></script>
                <script src="app/controllers/moduleController.js"></script>
                <!--Begin-->
                <div class="box-sale-policy" ng-controller="moduleController" ng-init="initSalePolicyController('Shop')">
                    <h3><span>Chính sách bán hàng</span></h3>
                    <div class="sale-policy-block">
                        <ul>
                            <li>Giao hàng TOÀN QUỐC</li>
                            <li>Thanh toán khi nhận hàng</li>
                            <li>Đổi trả trong <span>15 ngày</span></li>
                            <li>Hoàn ngay tiền mặt</li>
                            <li>Chất lượng đảm bảo</li>
                            <li>Miễn phí vận chuyển:<span>Đơn hàng từ 3 món trở lên</span></li>
                        </ul>
                    </div>
                    <div class="buy-guide">
                        <h3>Hướng Dẫn Mua Hàng</h3>
                        <ul>
                            <li>
                                Mua hàng trực tiếp tại website
                                <b> {{shop.Website}}</b>
                            </li>
                            <li>
                                Gọi điện thoại <strong>
                                    {{shop.Hotline}}
                                </strong> để mua hàng
                            </li>
                            <li>
                                Mua tại Trung tâm CSKH:<br />
                                <strong>{{shop.Address}}</strong>
                                <a href="/ban-do.html" rel="nofollow" target="_blank">Xem Bản Đồ</a>
                            </li>
                            <li>
                                Mua sỉ/buôn xin gọi <strong>
                                    {{shop.Hotline}}
                                </strong> để được
                                hỗ trợ.
                            </li>
                        </ul>
                    </div>
                </div>
                <!--End-->
                <script type="text/javascript">
                    window.Shop = {
                        "Name": "CÔNG TY TNHH PHÁT TRIỂN CÔNG NGHỆ RUNTIME",
                        "Email": "info@runtime.vn",
                        "Phone": " (08) 85 85 66 38",
                        "Logo": "Uploads/shop97/images/logo.png",
                        "Fax": " (08) 85 85 66 38",
                        "Website": "http://www.runtime.vn",
                        "Hotline": "0908770095",
                        "Address": "5/12A Quang Trung, P.14, Q.Gò Vấp, Tp.Hồ Chí Minh",
                        "Fanpage": "https://www.facebook.com/runtime.vn",
                        "Google": null,
                        "Facebook": "https://www.facebook.com/runtime.vn",
                        "Youtube": null,
                        "Twitter": null,
                        "IsBanner": false,
                        "IsFixed": false,
                        "BannerImage": null
                    };
                </script>
                <div class="box-product">
                    <h3>
                        <span>
                            Sản phẩm Hot
                        </span>
                    </h3>
                    <div class="box-product-block">
                        <?php
                        $query = "SELECT * FROM product ORDER BY product_id DESC LIMIT 5";
                        $result = $mysqli->query($query);
                        while ($arPro =  mysqli_fetch_assoc($result)) {
                        ?>
                            <div class="item">
                                <div class="image">
                                    <a href="chi-tiet.php?product_id=<?php echo $arPro['product_id'] ?>" title="Tomato sp">
                                        <img class="img-responsive lazy-img" src="Uploads/shop97/images/product/<?php echo $arPro['picture'] ?>" data-original="Uploads/shop97/images/product/<?php $arPro['picture'] ?>" alt="Tomato sp" title="Tomato sp" />
                                    </a>
                                </div>
                                <div class="name">
                                    <a href="chi-tiet.php?product_id=<?php echo $arPro['product_id'] ?>" title="Tomato sp"><?php echo $arPro['product_name'] ?></a>
                                </div>
                                <div class="rating">
                                    <div class="rating-1">
                                        <span class="rating-img">
                                        </span>
                                    </div>
                                </div>
                                <div class="price">
                                    <span class="price-new"><?php echo number_format($arPro['price'], 0, ',', '.') ?> ₫</span>
                                </div>
                                <div class="button text-center">
                                    <a class="btn btn-default btn-add-cart" href="javascript:void(0)" onclick="window.location.href='cart.php?product_id=<?php echo $arPro['product_id'] ?>&action=add'">Mua</a>
                                </div>
                            </div>
                        <?php
                        }
                        ?>

                    </div>
                </div>
            </div>
            <div class="col-md-9">

                <div class="breadcrumb clearfix">
                    <ul>
                        <li itemtype="http://shema.org/Breadcrumb" itemscope="" class="home">
                            <a title="Đến trang chủ" href="/" itemprop="url"><span itemprop="title">Trang chủ</span></a>
                        </li>
                        <li itemtype="http://shema.org/Breadcrumb" itemscope="" class="category17 icon-li">
                            <div class="link-site-more">
                                <a title="" href="/san-pham/thuc-don-chinh-1391" itemprop="url">
                                    <!-- <span itemprop="title">THỰC ĐƠN CH&#205;NH</span> -->
                                </a>
                            </div>
                        </li>
                        <!-- <li class="productname icon-li"><strong>Supreme</strong> </li> -->
                    </ul>
                </div>
                <script type="text/javascript">
                    $(".link-site-more").hover(function() {
                        $(this).find(".s-c-n").show();
                    }, function() {
                        $(this).find(".s-c-n").hide();
                    });
                </script>

                <link href="Scripts/smoothproducts/smoothproducts.css" rel="stylesheet" type="text/css" />
                <script src="Scripts/smoothproducts/smoothproducts.js" type="text/javascript"></script>
                <script src="app/services/productServices.js"></script>
                <script src="app/controllers/productController.js"></script>
                <div class="product-detail clearfix relative hidden" ng-controller="productController" ng-init="initController(47308)">
                    <span us-spinner="{radius:5, width:3, length: 3}"></span>
                    <!--Begin-->
                    <?php
                    $product_id = $_GET['product_id'];
                    $query = "SELECT * FROM product WHERE product_id='{$product_id}'";
                    $result = $mysqli->query($query);
                    while ($arPro = mysqli_fetch_assoc($result)) {
                        $product_id = $arPro['product_id'];
                    ?>
                        <div class="product-block clearfix">
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-12 product-image clearfix">
                                    <div class="sp-loading"><img src="Uploads/shop97/images/product/<?php echo $arPro['picture'] ?>" alt=""><br></div>
                                    <div class="sp-wrap">
                                        <a href="Uploads/shop97//images/product/Mỳ quảng thập cẩm-1621222120.jpeg" ng-repeat="item in ProductImages"><img src="{{item.Image}}"></a>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 clearfix">

                                    <form method="POST">
                                        <h2><?php echo $arPro['product_name'] ?></h2>
                                        <h1><?php echo number_format($arPro['price'], 0, ',', '.') ?> đ</h1>
                                        <div class="quantity clearfix">
                                            <label>Số lượng</label>
                                            <div class="quantity-input">
                                                <input type="number" value="<?php echo $quantity;?>" class="text" id="quantity" name="quantity" ng-model="InputQuantity" ng-init="InputQuantity=1" />
                                            </div>

                                            <input type="hidden" name="product_id" value="<?php echo $arPro['product_id'] ?>"> </input>
                                        </div>
                                        <p><?php echo $arPro['product_detail'] ?></p>
                                        <div class="button">
                                            <a href="" class="btn btn-primary" onclick="addCart(<?php echo $arPro['product_id'] ?>,'add')"> Thêm giỏ hàng</a>

                                            <a href="/gio-hang" class="btn btn-primary" onclick="addCart(<?php echo $arPro['product_id'] ?>,'add')"> Mua ngay</a>
                                        </div>
                                    </form>
                                    <script type="text/javascript">
                                    const c = $('#quantity').val();
                                        function addCart(a, b) {
                                            $.ajax({
                                                url: 'cart.php',
                                                type: 'POST',
                                                cache: false,
                                                data: {
                                                    product_id: a,
                                                    action: b,
                                                    quantity:c,

                                                },
                                                success: (data) => {
                                                    // $('#shopcart').html(data)
                                                    alert('Thêm Giỏ Hàng Thành Công')
                                                },
                                                error: () => {
                                                    alert('Có Lỗi Xảy Ra')
                                                }
                                            })
                                            return false;
                                        }
                                    </script>
                                    <div class="call">
                                        <p class="title">Để lại số điện thoại, chúng tôi sẽ tư vấn ngay sau từ 5 › 10 phút</p>
                                        <div class="input">
                                            <div class="input-group">
                                                <input class="form-control" ng-model="CustomerPhone" onblur="if(this.value=='')this.value='Nhập số điện thoại...'" onfocus="if(this.value=='Nhập số điện thoại...')this.value=''" value="Nhập số điện thoại..." type="text">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-primary" type="button" ng-click="callMe()"><i class="fa fa-phone"></i> Gọi lại cho tôi</button>
                                                </span>

                                            </div>
                                        </div>
                                    </div>




                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                    <div class="product-tabs">
                        <ul class="nav nav-tabs">
                            <li role="presentation" ng-class="{'active':$index==0}" ng-repeat="item in ProductTabs">
                                <a data-toggle="tab" href="#tab{{$index+1}}">{{item.Name}}</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade in" ng-class="{'active':$index==0}" id="tab{{$index+1}}" ng-repeat="item in ProductTabs">
                                <div ng-bind-html="item.Content|unsafe"></div>
                            </div>
                        </div>
                    </div>
                    <!--End-->
                    <div class="modal fade" id="modalMyCart" tabindex="-1" role="dialog" aria-labelledby="modalMyCartLabel" aria-hidden="true">
                        <div class="modal-dialog  modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                        &times;
                                    </button>
                                    <h4 class="modal-title" id="modalMyCartLabel">Bạn có {{OrderDetails.length}} sản phẩm trong giỏ hàng.</h4>
                                </div>
                                <div class="modal-body">
                                    <table class="table" style="width:100%;">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Tên sản phẩm</th>
                                                <th>Số lượng</th>
                                                <th>Giá tiền</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="line-item" ng-repeat="item in OrderDetails">
                                                <td class="item-image">
                                                    <img ng-src="{{item.ProductImage}}" class="img-responsive" style="max-height:60px;" />
                                                </td>
                                                <td class="item-title">
                                                    <a href="/san-pham/{{item.ProductCode}}.html">
                                                        {{item.ProductName}}<br>
                                                        <span ng-if="item.IsVariant==true">{{item.VariantName}}</span>
                                                    </a>
                                                </td>
                                                <td class="item-quantity">
                                                    <input type="number" class="text" ng-model="item.Quantity" ng-change="updateItemCart(item)" />
                                                </td>
                                                <td class="item-price">{{item.Amount|number:0}}₫</td>
                                                <td class="item-delete"><a ng-click="removeItemCart(item)" href="javascript:void(0)">Xóa</a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="total-price-modal">
                                                Tổng cộng : <span class="item-total">{{ Amount| number:0 }}₫</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row margin-top-10">
                                        <div class="col-lg-6">
                                            <div class="comeback text-left">
                                                <a href="san-pham.html">
                                                    <i class="fa fa-chevron-circle-left "></i> Tiếp tục mua hàng
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 text-right">
                                            <div class="buttons btn-modal-cart">
                                                <a class="btn btn-default" href="thanh-toan.html">
                                                    Đặt hàng
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="modalCallMe" tabindex="-1" role="dialog" aria-labelledby="modalCallMeLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <h2>Cám ơn Qúy Khách đã liên hệ đặt hàng</h2>
                                    <p>Shop sẽ gọi lại để tư vấn cho Quý khách hàng trong thời gian sớm nhất</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">
                                        OK
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="comment_product">
                    <!-- Commnent Form -->
                    <?php
                    if (isset($_SESSION['users'])) {
                        $info = $_SESSION['users'];
                        $user_id = $info['user_id'];
                        $product_id = $_GET['product_id'];
                    ?>
                        <h4>Viết bình luận...<span class="glyphincon glyphicon-pencil"></span></h4>
                        <form id="comment" action="" method="POST">
                            <div class="form-group">
                                <textarea class="form-control" name="content" row="3"></textarea>
                            </div>
                            <div class="form-group mb-0">
                                <input type="submit" name="submit" class="" value="Gửi">
                            </div>
                        </form>
                        <?php
                        if (isset($_POST['submit'])) {

                            $content = $_POST['content'];
                            if (empty($content)) {
                                echo "<script>alert('Vui lòng nhập vào khung bình luận!')</script>";
                            } else {
                                $query11 = "INSERT INTO comment(user_id,product_id,content) VALUE($user_id,$product_id,'$content')";
                                $result11 = $mysqli->query($query11);
                                if ($result11) {
                                    echo "<script>alert('Gửi đánh giá thành công!')</script>";
                                } else {
                                    echo "Không thể bình luận";
                                }
                            }
                        }
                        ?>
                </div>
                <hr>
            <?php
                    } else {
            ?>
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Vui lòng đănh nhập để bình luận! </strong><a href="dang-nhap.php"> Login </a>
                </div>
            <?php
                    }
            ?>
            <?php


            $select12 = "SELECT users.user_id,users.full_name,comment.parent_id,comment.product_id,comment.comment_id,comment.comment_id,comment.content,comment.created_at FROM users INNER JOIN comment ON users.user_id=comment.user_id  WHERE product_id={$product_id} AND parent_id=0 ORDER BY product_id DESC";
            if (isset($_SESSION['users'])) {
                $full_name = $info['full_name'];
            }
            $result12 = $mysqli->query($select12);
            while ($arComment = mysqli_fetch_assoc($result12)) {

            ?>
                <div class="comment">
                    <div class="form-group">
                        <span><img src="Uploads/shop97/images/avatar.jpg" alt="" width=50px height=50px;><?php echo " " . $arComment['full_name'] ?></span>
                        <h5>Ngày đăng: <?php echo $arComment['created_at'] ?></h5>
                        <p><?php echo $arComment['content'] ?></p>
                        <button class="nut-tra-loi"><a href="tra-loi-binh-luan.php?product_id=<?php echo $arComment['product_id'] ?>&comment_id=<?php echo $arComment['comment_id'] ?>">Trả lời <i class='fas fa-comments'></i></a></button>
                        <hr>
                    </div>
                </div>
                <?php
                $comment_id = $arComment['comment_id'];
                $select13 = "SELECT users.user_id,users.full_name,comment.parent_id,comment.product_id,comment.comment_id,comment.comment_id,comment.content,comment.created_at FROM users INNER JOIN comment ON users.user_id=comment.user_id WHERE product_id={$product_id} AND parent_id={$comment_id}";
                if (isset($_SESSION['users'])) {
                    $full_name = $info['full_name'];
                }
                $result13 = $mysqli->query($select13);
                while ($arComment = mysqli_fetch_assoc($result13)) {
                ?>
                    <div class="comment">
                        <div class="form-groupCon">
                            <span><img src="Uploads/shop97/images/avatar.jpg" alt="" width=50px height=50px;><?php echo " " . $arComment['full_name'] ?></span>
                            <h5>Ngày đăng: <?php echo $arComment['created_at'] ?></h5>
                            <p><?php echo $arComment['content'] ?></p>
                            <a href="tra-loi-binh-luan.php?product_id=<?php echo $arComment['product_id'] ?>&comment_id=<?php echo $arComment['comment_id'] ?>">Trả lời <i class='fas fa-comments'></i></a>
                            <hr>
                        </div>
                    </div>
            <?php
                }
            }
            ?>


            <style>
                .form-groupCon {
                    margin-left: 30px;
                    padding-left: 50px;
                    padding-top: 10px;
                    background-color: #FBEFFB;
                }

                .form-group {
                    padding: 20px;

                    background-color: #E0E6F8;
                }

                .nut-tra-loi {
                    padding: 5px;
                }
            </style>
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