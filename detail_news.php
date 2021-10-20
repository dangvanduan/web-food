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
            <div class="col-md-9">

                <div class="breadcrumb clearfix">
                    <ul>
                        <li itemtype="http://shema.org/Breadcrumb" itemscope="" class="home">
                            <a title="Đến trang chủ" href="/" itemprop="url"><span itemprop="title">Trang chủ</span></a>
                        </li>
                        <li itemtype="http://shema.org/Breadcrumb" itemscope="" class="icon-li">
                            <a title="Tin tức" href="/tin-tuc.html" itemprop="url"><span itemprop="title">Tin tức</span></a>
                        </li>
                        <li class="icon-li"><strong>Khuyến m&#227;i thứ 3, thứ 5 h&#224;ng tuần</strong> </li>
                    </ul>
                </div>
                <script type="text/javascript">
                    $(".link-site-more").hover(function() {
                        $(this).find(".s-c-n").show();
                    }, function() {
                        $(this).find(".s-c-n").hide();
                    });
                </script>

                <div class="news-detail">
                    <div class="news-block">
                        <?php
                        $news_id = $_GET['news_id'];
                        $query = "SELECT * FROM news WHERE news_id='{$news_id}'";
                        $result = $mysqli->query($query);
                        while ($arNews =  mysqli_fetch_assoc($result)) {
                        ?>
                            <h1><?php echo $arNews['news_name'] ?></h1>
                            <div class="date"><?php echo $arNews['created_at'] ?></div>
                            <div class="content">
                                <p><?php echo $arNews['detail_text'] ?></p>

                            </div>
                        <?php
                        }
                        ?>
                        <div class="social-group">
                            <!-- AddThis Button BEGIN -->
                            <div class="addthis_toolbox addthis_default_style">
                                <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>


                                <a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
                                <a class="addthis_counter addthis_pill_style addthis_nonzero"></a>
                            </div>
                            <script type="text/javascript" src="/scripts/addthis/addthis_widget.js#pubid=ra-5334d6387b03b532"></script>
                            <!-- AddThis Button END -->
                        </div>
                    </div>
                    <div class="news-other">

                        <h3><span>Tin tức liên quan</span></h3>
                        <?php
                        $type_news = $_GET['type_news'];
                        $query2 = "SELECT * FROM news WHERE type_news = '{$type_news}' AND news_id!='{$news_id}'
        ORDER BY RAND(`news_id`)
        LIMIT 3 ";
                        $result2 = $mysqli->query($query2);
                        while ($arNews = mysqli_fetch_assoc($result2)) {
                        ?>
                            <ul>
                                <li><a href="detail_news.php?news_id=<?php echo $arNews['news_id'] ?>&type_news=<?php echo $arNews['type_news'] ?>"><?php echo $arNews['news_name'] ?> (<?php echo $arNews['created_at'] ?>)</a></li>
                            </ul>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-md-3">

                <div class="menu-news">
                    <h3>
                        <span>
                            Tin tức
                        </span>
                    </h3>
                    <ul class='level0'>
                        <li><a class='active' href='tin-tuc'>Tin khuyến mãi</a></li>
                        <li><a href='tin-tuc'>Tin ẩm thực</a></li>
                    </ul class='level0'>
                </div>

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
                        "Logo": "/Uploads/shop97/images/product/rsz_highlands-coffee.jpg",
                        "Index": 1,
                        "Inactive": false
                    }, {
                        "Id": 3,
                        "ShopId": 97,
                        "Name": "samsung",
                        "Link": "#",
                        "Logo": "/Uploads/shop97/images/product/rsz_kfc-logo.jpg",
                        "Index": 2,
                        "Inactive": false
                    }, {
                        "Id": 4,
                        "ShopId": 97,
                        "Name": "black",
                        "Link": "#",
                        "Logo": "/Uploads/shop97/images/product/rsz_logo-trà-sữa-gong-cha.png",
                        "Index": 3,
                        "Inactive": false
                    }, {
                        "Id": 5,
                        "ShopId": 97,
                        "Name": "LG",
                        "Link": "#",
                        "Logo": "/Uploads/shop97/images/product/rsz_lotteria-vietnam.jpg",
                        "Index": 4,
                        "Inactive": false
                    }, {
                        "Id": 6,
                        "ShopId": 97,
                        "Name": "Sony",
                        "Link": "#",
                        "Logo": "/Uploads/shop97/images/product/rsz_tải_xuống.png",
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