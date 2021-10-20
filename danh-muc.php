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
                        <!-- <li itemtype="http://shema.org/Breadcrumb" itemscope="" class="category17 icon-li">
                            <div class="link-site-more">
                                <a title="" href="/san-pham/thuc-don-chinh-1391" itemprop="url">
                                    <span itemprop="title">THỰC ĐƠN CH&#205;NH</span>
                                </a>
                            </div>
                        </li> -->
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

                <div class="main-product product-content rows clearfix">
                    <div class="product">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 pull-right tool text-right">
                            <select id="sort-by" onchange="window.location.href = this.options[this.selectedIndex].value">
                                <option selected="selected" value=" ?sort=index&amp;order =asc">Mặc định</option>
                                <option value=" ?sort=price&amp;order =asc">Gi&#225; tăng dần</option>
                                <option value=" ?sort=price&amp;order =desc">Gi&#225; giảm dần</option>
                                <option value=" ?sort=name&amp;order =asc">T&#234;n sản phẩm: A to Z</option>
                                <option value=" ?sort=name&amp;order =desc">T&#234;n sản phẩm: Z to A</option>
                            </select>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 pull-right tool text-right">
                            <div class="row"><span>Sắp xếp </span></div>
                        </div>
                        <div style="clear: both">
                        </div>
                        <?php
                            $query = "SELECT * FROM cat WHERE cat_id={$_GET['cat_id']} ";
                            $result = $mysqli->query($query);
                           
                        while($arCat = mysqli_fetch_assoc($result)){
                        ?>
                       
                        <div class="product-title">
                            <h1 style="margin-top: -30px"><?php echo $arCat['cat_name'] ?></h1>
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                    <style>
    .page-item {
        border:1px solid #ccc;
        padding: 5px 9px;
        color:red;
    }
    .current_page{
        background-color:#000;
        color:#FFF;
    }
    
    </style>
                    <div class="product-wrapper">
                        <?php
                            $queryTSD = "SELECT count(*) AS TSD FROM product WHERE cat_id={$_GET['cat_id']}";
                            $resultTSD = $mysqli->query($queryTSD);
                            $arTmp = mysqli_fetch_assoc($resultTSD);
                            $tongSoDong = $arTmp['TSD'];
                            // tổng số sản phâm trên 1 trang
                            $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page']:12;
                            // Tổng số trang
                            $tongsoTrang = ceil($tongSoDong / $item_per_page);
                            // trang hiện tại
                            $current_page = !empty($_GET['page']) ? $_GET['page']:1;
                           
                            //offset
                            $offset = ($current_page - 1) * $item_per_page;
                      
                            $query1 = "SELECT * FROM product WHERE cat_id={$_GET['cat_id']} LIMIT $offset, $item_per_page ";
                            $result1 = $mysqli->query($query1);
                                       
                        while ($arPro = mysqli_fetch_assoc($result1)) {           
                            $nameReplacea = utf8ToLatin($arPro['product_name']);
                            $url = "doan/" . $nameReplacea . '-' . $arPro['product_id'].'.html' ;
                        ?>

                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <div class="product-item 1000151360 products-resize">
                                    <div class="image">
                                        <a class="image-resize" href="<?php echo $url; ?>"><img alt="Tomato sp" src="Uploads/shop97/images/product/<?php echo $arPro['picture']?>"></a>
                                    </div>
                                    <div class="name"><a href="<?php echo $url; ?>"><?php echo $arPro['product_name']?></a></div>
                                    <div class="price">
                                        <span class="pro-price"><?php echo number_format($arPro['price'],0,',','.')?> ₫</span>
                                    </div>
                                    <div class="addcart">
                                        <button class="add2cart" onclick="AddToCard(47307,1)">Mua hàng</button>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>

                    </div>
                    <div class="text-center  clear">
                        <div class="row">
                            <nav>
                                <ul class="pagination">
                                <?php 
                                    include './phan-trang.php'
                                ?>
                                </ul>
                            </nav>
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