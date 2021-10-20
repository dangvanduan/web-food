<?php

require_once 'inc/header.php';
?>

<!--Template--
--End-->
</div>
</div>
</div>
</div>



<div class="container">
    <div class="row">
        <div class="col-md-12">
            <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
            <script src="app/services/moduleServices.js"></script>
            <script src="app/controllers/moduleController.js"></script>
            <!--Begin-->
            <div class="slider-wrapper slideshow-content" ng-controller="moduleController" ng-init="initSlideshowController('Slideshows')">
                <div id="slider" class="nivoSlider">
                    <a href="{{item.Link}}" target="_self" class="nivo-imageLink" ng-repeat="item in Slideshows">
                        <img alt="{{item.Name}}" ng-src="{{item.Image}}" />
                    </a>
                </div>
            </div>
            <script type="text/javascript">
                $(document).ready(function() {
                    $('#slider').nivoSlider({
                        effect: 'fold,fade,sliceDown',
                        width: 1280,
                        height: 533,
                        animSpeed: 500,
                        pauseTime: 5000,
                        startSlide: 0, //Set starting Slide (0 index)
                        directionNav: true, //Next &amp; Prev
                        directionNavHide: true
                    });
                });
            </script>
            <!--End-->
            <script type="text/javascript">
                window.Slideshows = [{
                    "Id": 440,
                    "ShopId": 97,
                    "Name": "slide01",
                    "Image": "Uploads/shop97/images/slide/slide_1.jpg",
                    "Link": "#",
                    "Index": 1,
                    "Inactive": false,
                    "Timestamp": "AAAAAAAo2mg="
                }, {
                    "Id": 441,
                    "ShopId": 97,
                    "Name": "slide02",
                    "Image": "Uploads/shop97/images/slide/slide_2.jpg",
                    "Link": "#",
                    "Index": 2,
                    "Inactive": false,
                    "Timestamp": "AAAAAAAo2mk="
                }];
            </script>
        </div>
    </div>
</div>


<div class="adv">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="box-html">
                    <p><img alt="" src="Uploads/shop97/images/slide/banner_top.jpg" /></p>

                </div>

                <script src="app/services/productServices.js"></script>
                <script src="app/controllers/productController.js"></script>
                <!--Begin-->
                <div class="main-product product-content owl-carousel" ng-controller="productController" ng-init="initProductHotSlideController('ProductHotSlides')">
                    <div class="default-title">

                    </div>
                    <div class="product-slide">
                        <div class="product-wrapper" id="product-hot-slide">
                            <div class="product-item 1000151352" ng-repeat="item in ProductHotSlides">
                                <?php
                                $query2 = "SELECT * FROM product LIMIT 1";
                                $result2 = $mysqli->query($query2);
                                while ($arPro = mysqli_fetch_assoc($result2)) {
                                ?>
                                    <div class="image">
                                        <a class="image-resize" href="Uploads/shop97/images/product/<?php echo $arPro['picture'] ?>"><img class="first-img" ng-src="{{item.Image}}" data-original="{{item.Image}}" alt="{{item.Name}}" title="{{item.Name}}"></a>
                                    </div>
                                    <div class="name"><a href="san-pham/{{item.Code}}.html"><?php echo $arPro['product_name'] ?></a></div>
                                    <div class="price" ng-if="ConfigProduct.ShowPrice==true">

                                        <span ng-if="item.IsPromotion==false&&item.Price>0" class="pro-price"><?php echo $arPro['price'] ?> ₫</span>

                                    </div>

                                    <div class="addcart" ng-if="ConfigProduct.AllowOrder==true">
                                        <button class="add2cart" onclick="AddToCard(item)">Mua hàng</button>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>

                        </div>
                        <div class="controls boxprevnext">
                            <a class="prev prevlogo"><i class="fa fa-angle-left"></i></a>
                            <a class="next nextlogo"><i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
                <script type="text/javascript">
                    $(document).ready(function() {
                        var owlproductslide2 = $("#product-hot-slide");
                        owlproductslide2.owlCarousel({
                            autoPlay: true,
                            autoPlay: 5000,
                            items: 5,
                            slideSpeed: 1000,
                            pagination: false,
                            itemsDesktop: [1200, 5],
                            itemsDesktopSmall: [980, 4],
                            itemsTablet: [767, 2],
                            itemsMobile: [480, 1]
                        });
                        $(".product-slide .nextlogo").click(function() {
                            owlproductslide2.trigger('owl.next');
                        })
                        $(".product-slide .prevlogo").click(function() {
                            owlproductslide2.trigger('owl.prev');
                        })
                    });
                </script>
                <!--End-->
                <script type="text/javascript">

                </script>
            </div>
        </div>
    </div>
</div>


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
                    <form action="" method='POST'>
                        <ul class='level0'>
                            <?php $sql = "SELECT * FROM cat where parent_id = 0";
                            $qr = $mysqli->query($sql);
                            while ($rdm = $qr->fetch_assoc()) {
                            ?>
                                <li class="child"><span><a href=''><?php echo $rdm['cat_name'] ?></a></span><span class='open-close'><i class='fa fa-angle-down'></i></span>

                                    <ul class='level1 hiddg\en-xs'>


                                        <?php
                                        $catid = $rdm['cat_id'];
                                        $sqlc = "SELECT * FROM cat where parent_id = $catid";
                                        $qrc = $mysqli->query($sqlc);
                                        while ($rc = $qrc->fetch_assoc()) {
                                            $cat_id = $rc['cat_id'];
                                            $name = $rc['cat_name'];
                                            $nameReplace = utf8ToLatin($name);
                                            $url = $nameReplace . '-' . $cat_id ;
                                        ?>

                                            <li><span><a href="<?php echo $url; ?>"><i class='fa fa-check'></i> <?php echo $rc['cat_name'] ?></a></span></li>

                                        <?php } ?>
                                    </ul class='level1 hidden-xs'>
                                </li>
                            <?php } ?>
                        </ul class='level0'>
                    </form>

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
                <script src="app/services/moduleServices.js"></script>
                <script src="app/controllers/moduleController.js"></script>
                <!--Begin-->
                <div class="box-adv" ng-controller="moduleController" ng-init="initAdvMenuController('AdvMenus')">
                    <div class="adv-block">
                        <div class="adv-item" ng-repeat="item in AdvMenus">
                            <a href="{{item.Link}}">
                                <img ng-src="{{item.Image}}" alt="{{item.Name}}" class="img-responsive">
                            </a>
                        </div>
                    </div>
                </div>
                <!--End-->
                <!-- <script type="text/javascript">
    window.AdvMenus = [{"Id":5844,"ShopId":97,"AdvType":1,"AdvTypeName":"Menu 2 bên","Name":"1","Image":"/Uploads/shop97/images/adv/left_1.png","ImageThumbnai":"/Uploads/shop97/_thumbs/images/adv/left_1.png","Link":"#","IsVideo":false,"Index":4,"Inactive":false,"Timestamp":"AAAAAAAo2mw="},{"Id":5845,"ShopId":97,"AdvType":1,"AdvTypeName":"Menu 2 bên","Name":"2","Image":"/Uploads/shop97/images/adv/left_2.png","ImageThumbnai":"/Uploads/shop97/_thumbs/images/adv/left_2.png","Link":"#","IsVideo":false,"Index":5,"Inactive":false,"Timestamp":"AAAAAAAo2m0="}];
</script> -->
                <div class="news-left">
                    <span class="menu-content">Bài viết nổi bật</span>
                    <?php
                    $query = "SELECT * FROM news  LIMIT 5";
                    $result = $mysqli->query($query);
                    while ($arNews =  mysqli_fetch_assoc($result)) {
                        $nameReplacea = utf8ToLatin($arNews['news_name']);
                        $ul = $nameReplacea . '-' . $arNews['news_id'].'-kieu'.$arNews['type_news'];
                    ?>
                        <div class="news-left-item">
                            <div class="post-thumb col">
                                <a href="<?php echo $ul;?>"><img alt="Tặng 1 b&#225;nh pizza miễn ph&#237; cho ng&#224;y sinh nhật của bạn" src="Uploads/shop97/images/news/<?php echo $arNews['picture'] ?>" class="imageFeatured"></a>
                            </div>
                            <div class="new-left-cont col">
                                <div class="name"><a href="<?php echo $ul; ?>"><span><?php echo substr($arNews['detail_text'], 0, 60) . '...'; ?></span></a></div>
                            </div>
                            <div class="des clear">
                                <p><?php echo $arNews['news_name'] ?></p>

                            </div>
                        </div>
                    <?php
                    }
                    ?>

                </div>
            </div>
            <div class="col-md-9">

                <div class="main-product product-content rows clearfix">
                    <div class="product">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 pull-right tool text-right">
                            <select id="sort-by" onchange="window.location.href = this.options[this.selectedIndex].value">
                                <option selected="selected" value=" ?sort=index&amp;order =asc">Mặc định</option>
                                <option value="trang-chu.php?source=DESC">Giá giảm dần</option>
                                <option value="trang-chu.php?source=ASC">Giá tăng dần</option>
                                <input type="hidden" id="source" name="source" value="">

                            </select>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 pull-right tool text-right">
                            <div class="row"><span> </span></div>
                        </div>
                        <div style="clear: both">
                        </div>
                        <div class="product-title">
                            <h1 style="margin-top: -30px">Sản phẩm</h1>
                        </div>
                    </div>
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
                    <div class="product-wrapper">
                        <?php

                        $queryTSD = "SELECT count(*) AS TSD FROM product ";

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

                        ?>
                        <?php
                        if (isset($_GET['source'])) {
                            $source = $_GET["source"];
                            $query = "SELECT * FROM product ORDER BY price $source LIMIT $offset, $item_per_page";
                        } else {
                            $query = "SELECT * FROM product LIMIT $offset, $item_per_page";
                        }

                        $result = $mysqli->query($query);
                        while ($arPro =  mysqli_fetch_assoc($result)) {
                            $product_id = $arPro['product_id'];
                            $name = $arPro['product_name'];
                            $nameReplace = utf8ToLatin($arPro['product_name']);
                            $url = $nameReplace . '-v' . $arPro['product_id'];
                        ?>

                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <div class="product-item 1000151360 products-resize">
                                    <div class="image">
                                        <a class="image-resize" href="<?php echo $url; ?>"><img alt="Tomato sp" src="Uploads/shop97/images/product/<?php echo $arPro['picture'] ?>"></a>
                                    </div>
                                    <div class="name"><a href="<?php echo $url; ?>"><?php echo $arPro['product_name'] ?></a></div>
                                    <div class="price">
                                        <span class="pro-price"><?php echo number_format($arPro['price'], 0, ',', '.') ?> ₫</span>
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
                        function addCart(a, b) {
                            $.ajax({
                                url: 'cart.php',
                                type: 'POST',
                                cache: false,
                                data: {
                                    product_id: a,
                                    action: b,
                                },
                                success: (data) => {
                                    $('#shopcart').html(data)
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


                <div class="news-laste owl-carousel">
                    <div class="titles">
                        <span>Tin ẩm thực</span>
                    </div>
                    <div class="news-slide">
                        <div class="news-block" id="news-home">
                            <?php
                            $query1 = "SELECT * FROM news ";
                            $result1 = $mysqli->query($query1);
                            while ($arNews = mysqli_fetch_assoc($result1)) {
                            ?>
                                <div class="">
                                    <div class="news-laste-item">

                                        <div class="post-thumb">
                                            <a href="detail_news.php?news_id=<?php echo $arNews['news_id'] ?>&type_news=<?php echo $arNews['type_news'] ?>"><img alt="Khuyến m&#227;i thứ 2, thứ 4, thứ 6 h&#224;ng tuần Khuyến m&#227;i thứ 2, thứ 4, thứ 6 h&#224;ng tuần" src="Uploads/shop97/images/news/<?php echo $arNews['picture'] ?>" class="imageFeatured"></a>
                                        </div><!-- /blog-alt-image -->

                                        <div class="name"><a href="detail_news.php?news_id=<?php echo $arNews['news_id'] ?>&type_news=<?php echo $arNews['type_news'] ?>">Khuyến m&#227;i thứ 2, thứ 4, thứ 6 h&#224;ng tuần Khuyến m&#227;i thứ 2, thứ 4, thứ 6 h&#224;ng tuần</a></div>
                                        <div class="des">
                                            <p><?php echo $arNews['news_name'] ?></p>

                                        </div>
                                    </div>
                                </div>

                            <?php
                            }
                            ?>
                        </div>
                        <div class="controls boxprevnext">
                            <a class="prev prevlogo"><i class="fa fa-angle-left"></i></a>
                            <a class="next nextlogo"><i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
                <script type="text/javascript">
                    $(document).ready(function() {
                        var owlproductslide2 = $("#news-home");
                        owlproductslide2.owlCarousel({
                            autoPlay: true,
                            autoPlay: 5000,
                            items: 4,
                            slideSpeed: 1000,
                            pagination: false,
                            itemsDesktop: [1200, 4],
                            itemsDesktopSmall: [980, 3],
                            itemsTablet: [767, 2],
                            itemsMobile: [480, 1]
                        });
                        $(".news-slide .nextlogo").click(function() {
                            owlproductslide2.trigger('owl.next');
                        })
                        $(".news-slide .prevlogo").click(function() {
                            owlproductslide2.trigger('owl.prev');
                        })
                    });
                </script>
            </div>
        </div>
    </div>
</div>
<?php

require_once 'inc/footer.php';
?>