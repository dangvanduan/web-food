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
                        <li class="icon-li"><strong>Tin tức</strong> </li>
                    </ul>
                </div>
                <script type="text/javascript">
                    $(".link-site-more").hover(function() {
                        $(this).find(".s-c-n").show();
                    }, function() {
                        $(this).find(".s-c-n").hide();
                    });
                </script>
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
    
    
                <div class="news-content">
                    <h1 class="title"><span>Tin tức</span></h1>
                    <div class="news-block clearfix">
                        <?php
                        $query = "SELECT * FROM news LIMIT 5";
                        $result = $mysqli->query($query);
                        while ($arNews =  mysqli_fetch_assoc($result)) {
                            $rename = utf8ToLatin($arNews['news_name']);
                            $url = $rename . '-' . $arNews['news_id'].'-kieu'. $arNews['type_news'];
                        ?>
                            <div class="news-item clearfix">
                                <div class="col-md-3 col-sm-4 col-xs-12 image">
                                    <a href="<?php echo $url; ?>">
                                        <img src="Uploads/shop97/images/news/<?php echo $arNews['picture'] ?>" class="img-responsive lazy-img" data-original="Uploads/shop97/images/news/<?php echo $arNews['picture'] ?>" alt="Tặng 1 b&#225;nh pizza miễn ph&#237; cho ng&#224;y sinh nhật của bạn" />
                                    </a>
                                </div>
                                <div class="col-md-9 col-sm-8 col-xs-12 news-info ">
                                    <h2 class="name"><a href="<?php echo $url; ?>"><?php echo $arNews['news_name']?></a></h2>
                                    <p class="date"><?php echo $arNews['created_at'] ?></p>
                                    <div class="desc">
                                        <p><?php echo substr($arNews['detail_text'], 0, 60) . '...'; ?></p>
                                        
                                        <!-- <form action="" method="POST">
                                            <button name="layma" type="submit"> Lấy mã </button>
                                        </form> -->
                                        
                                    </div>
                                </div>
                               
                                
                            </div>
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
                        <li><a href='tin-tuc.php'>Tin khuyến mãi</a></li>
                        <li><a href='tin-tuc.php'>Tin ẩm thực</a></li>
                    </ul class='level0'>
                </div>

                <div class="news-left">
                    <span class="menu-content">Bài viết nổi bật</span>
                    <?php
                    $queryTSD = "SELECT count(*) AS TSD FROM news ";
                    $resultTSD = $mysqli->query($queryTSD);
                    $arTmp = mysqli_fetch_assoc($resultTSD);
                    $tongSoDong = $arTmp['TSD'];
                    // tổng số sản phâm trên 1 trang
                    $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page']:5;
                    // Tổng số trang
                    $tongsoTrang = ceil($tongSoDong / $item_per_page);
                    // trang hiện tại
                    $current_page = !empty($_GET['page']) ? $_GET['page']:1;
                   
                    //offset
                    $offset = ($current_page - 1) * $item_per_page;


                    $query = "SELECT * FROM news  LIMIT $offset, $item_per_page";
                    $result = $mysqli->query($query);
                    while ($arNews =  mysqli_fetch_assoc($result)) {
                        $renames = utf8ToLatin($arNews['news_name']);
                        $urls = $renames . '-' . $arNews['news_id'].'-kieu'. $arNews['type_news'];
                    ?>
                        <div class="news-left-item">
                            <div class="post-thumb col">
                                <a href="<?php echo $urls;?>"><img alt="" src="Uploads/shop97/images/news/<?php echo $arNews['picture'] ?>" class="imageFeatured"></a>
                            </div>
                            <div class="new-left-cont col">
                                <div class="name"><a href="<?php echo $urls;?>"><span><?php echo substr($arNews['news_name'], 0, 60) . '...'; ?></span></a></div>
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