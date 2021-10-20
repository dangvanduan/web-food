
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
                    <div class="col-md-12">

<div class="breadcrumb clearfix">
    <ul>
                    <li itemtype="http://shema.org/Breadcrumb" itemscope="" class="home">
                        <a title="Đến trang chủ" href="/" itemprop="url"><span itemprop="title">Trang chủ</span></a>
                    </li>
                    <li class="icon-li"><strong>Tìm kiếm</strong> </li>
    </ul>
</div>
<!-- <script type="text/javascript">
    $(".link-site-more").hover(function () { $(this).find(".s-c-n").show(); }, function () { $(this).find(".s-c-n").hide(); });
</script> -->
<?php
$key=$_GET['search'];
$queryTSD = "SELECT count(*) AS TSD FROM product WHERE product_name LIKE '%$key%'";
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


$conn = mysqli_connect("localhost", "root", "", "doan2");
if (isset($_GET['search']) && !empty($_GET['search'])) {
    
    $sql = "SELECT * FROM product WHERE product_name LIKE '%$key%' LIMIT $offset, $item_per_page";
    $result = $mysqli->query($sql);
} else {
    echo "Vui lòng nhập từ khóa vào khung tìm kiếm";
}

?>

<div class="main-product product-content clearfix">
    <h1 class="title clearfix"><span>Kết quả tìm kiếm với "<strong><?php echo $key?></strong>"</span></h1>
    <div class="product-wrapper rows">
    <?php
    while ($arPro = mysqli_fetch_assoc($result)) { ?>
            <div class="col-md-3 col-sm-3 col-xs-12">
                <div class="product-item 1000151360 products-resize">
                    <div class="image">
                        <a class="image-resize" href="chi-tiet.php?product_id=<?php echo $arPro['product_id']?>"><img alt="Shup t&#244;m" src="/Uploads/shop97/images/product/<?php echo $arPro['picture']?>"></a>
                    </div>
                    <div class="name"><a href="chi-tiet.php?product_id=<?php echo $arPro['product_id']?>"><?php echo $arPro['product_name']?></a></div>
                            <div class="price">
                                    <span class="pro-price"><?php echo $arPro['price']?>₫</span>
                            </div>
                            <div class="addcart">
                            <button class="add2cart" onclick="window.location.href='cart.php?product_id=<?php echo $arPro['product_id']?>&action=add'">Mua hàng</button>
                            </div>
                </div>
            </div>
            <?php
            }
            ?>
    </div>
</div>              </div>
            </div>
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
    <!-- <div class="partner-content owl-carousel" ng-controller="moduleController" ng-init="initPartnerController('Partners')">
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
        $(document).ready(function () {
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
            $(".partner-content .nextlogo").click(function () {
                owl.trigger('owl.next');
            });
            $(".partner-content .prevlogo").click(function () {
                owl.trigger('owl.prev');
            });
        });
    </script> -->
    <!--End-->
<script type="text/javascript">
    window.Partners = [{"Id":2,"ShopId":97,"Name":"nokia","Link":"#","Logo":"/Uploads/shop97/images/product/nokia_logo.jpeg","Index":1,"Inactive":false},{"Id":3,"ShopId":97,"Name":"samsung","Link":"#","Logo":"/Uploads/shop97/images/product/samsung.png","Index":2,"Inactive":false},{"Id":4,"ShopId":97,"Name":"black","Link":"#","Logo":"/Uploads/shop97/images/product/blackberry.png","Index":3,"Inactive":false},{"Id":5,"ShopId":97,"Name":"LG","Link":"#","Logo":"/Uploads/shop97/images/product/LGlogo.png","Index":4,"Inactive":false},{"Id":6,"ShopId":97,"Name":"Sony","Link":"#","Logo":"/Uploads/shop97/images/product/Sony_Ericsson85.png","Index":5,"Inactive":false}];
</script>                        </div>
                    </div>
                </div>
            </div>   
<?php 
require_once 'inc/footer.php';
?>