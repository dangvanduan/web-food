<?php
require_once 'inc/header.php';
?>

<!--Template--
--End-->
</div>
</div>
</div>
</div>






<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<div class="main">
    <div class="container">
        <div class="row">
            <div class="col-md-3">

                <div class="menu-product">
                    <h3>
                        <span>
                            Sản phẩm
                        </span>
                    </h3>
                    <ul class='level0'>
                    <?php $sql = "SELECT * FROM cat where parent_id = 0";
                                $qr =$mysqli->query($sql);
                                while ($rdm = $qr->fetch_assoc()){
                                    
                                ?>
                        <li class="child"><span><a href=''><?php echo $rdm['cat_name']?></a></span><span class='open-close'><i class='fa fa-angle-down'></i></span>
                                
                            <ul class='level1 hiddg\en-xs'>                             
                            <?php 
                                $catid=$rdm['cat_id'];
                                $sqlc = "SELECT * FROM cat where parent_id = $catid";
                                $qrc =$mysqli->query($sqlc);
                                while ($rc = $qrc->fetch_assoc()){
                                    $nameReplace = utf8ToLatin($rc['cat_name']);
                                    $ul = $nameReplace . '-' . $rc['cat_id'];
                                ?>
                                <li><span><a href='<?php echo $ul; ?>'><i class='fa fa-check'></i> <?php echo $rc['cat_name']?></a></span></li>
                               
                                <?php } ?>
                            </ul class='level1 hidden-xs'>
                        </li>
                                    <?php } ?>
                    </ul class='level0'>
                </div>
                <script type="text/javascript">
                    $(document).ready(function() {
                        $('.menu-product li.child .open-close').on('click', function() {
                            $(this).removeAttr('href');
                            var element = $(this).parent('li');
                            if (element.hasClass('open')) {
                                element.removeClass('open');
                                element.children('ul').slideUp();
                            } else {
                                element.addClass('open');
                                element.children('ul').slideDown();
                            }
                        });
                    });
                </script>
            </div>
            <div class="col-md-9">

                <div class="breadcrumb clearfix">
                    <ul>
                        <li itemtype="http://shema.org/Breadcrumb" itemscope="" class="home">
                            <a title="Đến trang chủ" href="/" itemprop="url"><span itemprop="title">Trang chủ</span></a>
                        </li>
                        <li class="icon-li"><strong>Sản phẩm</strong> </li>
                    </ul>
                </div>
                <script type="text/javascript">
                    $(".link-site-more").hover(function() {
                        $(this).find(".s-c-n").show();
                    }, function() {
                        $(this).find(".s-c-n").hide();
                    });
                </script>

                <div class="main-product product-content rows clearfix">
                    <div class="product">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 pull-right tool text-right">
                            <!-- <select id="sort-by" onchange="window.location.href = this.options[this.selectedIndex].value">
                                <option selected="selected" value="">Mặc định</option>
                                <option value="nguon-am-thuc.php?source=1">Ẩm thực Việt</option>
                                <option value="nguon-am-thuc.php?source=2">Ẩm thực Á</option>
                                <option value="nguon-am-thuc.php?source=3">Ẩm thực Âu</option>
                                
                            </select> -->
                            <select id="sort-by" onchange="window.location.href = this.options[this.selectedIndex].value">
                                    <option selected value="">Mặc định</option>
                                    <?php
                                    $query1 = "SELECT * FROM source";
                                    $result1 = $mysqli->query($query1);
                                    while ($arSource = mysqli_fetch_assoc($result1)) {
                                    ?>  
                                        
                                        <option value="nguon-am-thuc.php?source_id=<?php echo $arSource['source_id'] ?>">
                                            <?php echo $arSource['source_name'] ?>
                                        </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 pull-right tool text-right">
                            <div class="row"><span>Sắp xếp </span></div>
                        </div>
                        <div style="clear: both">
                        </div>
                        <div class="product-title">
                            <h1 style="margin-top: -30px">Sản phẩm</h1>
                        </div>
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
                        $queryTSD = "SELECT count(*) AS TSD FROM product ";
                        $resultTSD = $mysqli->query($queryTSD);
                        $arTmp = mysqli_fetch_assoc($resultTSD);
                        $tongSoDong = $arTmp['TSD'];
                        // row count
                        $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page']:12;
                        // Tổng số trang
                        $tongsoTrang = ceil($tongSoDong / $item_per_page);
                        // trang hiện tại
                        $current_page = !empty($_GET['page']) ? $_GET['page']:1;
                       
                        //offset
                        $offset = ($current_page - 1) * $item_per_page;

                        ?>
                        <?php
                        $query = "SELECT * FROM product ORDER BY product_id DESC LIMIT $offset, $item_per_page";
                        $result = $mysqli->query($query);
                        while ($arPro =  mysqli_fetch_assoc($result)) {
                            $nameReplace = utf8ToLatin($arPro['product_name']);
                            $product_id = $arPro['product_id'];
                            $url = $nameReplace . '-v' . $product_id;
                        ?>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <div class="product-item 1000151360 products-resize">
                                    <div class="image">
                                        <a class="image-resize" href="<?php echo $url; ?>"><img alt="Tomato sp" src="Uploads/shop97/images/product/<?php echo $arPro['picture'] ?>"></a>
                                    </div>
                                    <div class="name"><a href="<?php echo $url;?>"> <?php echo $arPro['product_name'] ?></a></div>
                                    <div class="price">
                                        <span class="pro-price"><?php echo number_format($arPro['price'],0,',','.')?> ₫</span>
                                    </div>
                                    
                                    <div class="addcart">
                                    
                                        <a href="javascript:void(0)" class="add2cart" onclick="addCart(<?php echo $arPro['product_id'] ?>,'add')" name="submit">Mua hàng</a>
                                                                                            
                                    </div>
                                </div>
                            </div>
                      
                        <?php
                        }
                        ?>

                    </div>
                    <script type="text/javascript">
                    function addCart(a,b) {
						$.ajax({
							url: 'cart.php',
							type: 'POST',
							cache: false,
							data: {
								product_id: a,
                                action: b,

							},
							success: (data) => {
								// $('#shopcart').html(data)
								alert('Thêm Giỏ Hàng Thành Công')
							},
							error: () => {
								alert('Có Lỗi Xảy Ra')
							}
						})
                        $.ajax({
							url: 'ajax/dem_gio_hang.php',
							type: 'POST',
							cache: false,
							data: {
								product_id: a,
                                action: b,

							},
							success: (data) => {
								$('#demgiohang').html(data)
							},
							error: () => {
								alert('Có Lỗi Xảy Ra')
							}
						})
						return false;
					} 
                    </script>
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
                <!--Template--
--End-->
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
                        "Logo": "Uploads/shop97/images/product/rsz_highlands-coffee.jpg",
                        "Index": 1,
                        "Inactive": false
                    }, {
                        "Id": 3,
                        "ShopId": 97,
                        "Name": "samsung",
                        "Link": "#",
                        "Logo": "Uploads/shop97/images/product/rsz_kfc-logo.jpg",
                        "Index": 2,
                        "Inactive": false
                    }, {
                        "Id": 4,
                        "ShopId": 97,
                        "Name": "black",
                        "Link": "#",
                        "Logo": "Uploads/shop97/images/product/rsz_logo-trà-sữa-gong-cha.png",
                        "Index": 3,
                        "Inactive": false
                    }, {
                        "Id": 5,
                        "ShopId": 97,
                        "Name": "LG",
                        "Link": "#",
                        "Logo": "Uploads/shop97/images/product/rsz_lotteria-vietnam.jpg",
                        "Index": 4,
                        "Inactive": false
                    }, {
                        "Id": 6,
                        "ShopId": 97,
                        "Name": "Sony",
                        "Link": "#",
                        "Logo": "Uploads/shop97/images/product/rsz_tải_xuống.png",
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