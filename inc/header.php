<?php
require_once 'util/dbConnect.php';
require_once "util/utf8ToLatinUtil.php";
$cart = (isset($_SESSION['cart'])) ? $_SESSION['cart'] : [];
?>

<!DOCTYPE html>
<html class="no-js" lang="vi">

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <meta charset="UTF-8" />
    <title>VIE Food</title>
    <meta content="RUNECOM06" name="description" />
    <meta content="" name="keywords" />
    <link href="Uploads/shop97/images/logo.png" rel="shortcut icon" type="image/x-icon" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="fb:app_id" content="227481454296289" />

    <meta content="vi_VN" property="og:locale" />
    <meta content="website" property="og:type" />
    <meta content="VIE Food" property="og:title" />
    <meta content="RUNECOM06" property="og:description" />
    <meta content="http://runecom06.runtime.vn" property="og:image" />
    <meta content="http://runecom06.runtime.vn/trang-chu.html" property="og:url" />
    <meta content="VIE Food" property="og:site_name" />

    <link href="assets/100006/fonts/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="App_Themes/Home/common.css" rel="stylesheet" type="text/css" />
    <link href="assets/100006/js/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
    <link href="assets/100006/js/nivo-slider/nivo-slider.css" rel="stylesheet" type="text/css" media="all">
    <link href="assets/100006/js/owl.carousel/owl.carousel.css" rel="stylesheet" type="text/css" media="all">
    <link href="assets/100006/css/settings.css" rel="stylesheet" type="text/css" media="all">
    <script src="assets/100006/js/jquery.min.1.11.0.js"></script>
    <script src="assets/100006/js/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/100006/js/nivo-slider/jquery.nivo.slider.js" type="text/javascript"></script>
    <script src="assets/100006/js/owl.carousel/owl.carousel.js" type="text/javascript"></script>
    <script src="assets/100006/js/option_selection.js" type="text/javascript"></script>
    <script src="assets/100006/js/api.jquery.js" type="text/javascript"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" type="text/css" href="/assets/100006/fonts/opensans/css/opensans.css">

    <script>
        function calplacementtooltip(e) {
            left = e.offset().left - $('.product-wrapper').offset().left;
            if (left < 30) return 'right';
            right = -e.offset().right + $('.product-wrapper').offset().right;
            if (right < 30) return 'left';
            return 'left';
        }
    </script>
    <script data-target=".products-resize" data-parent=".product-wrapper" data-img-box=".image" src="assets/100006/js/fixheightproduct.js"></script>
    <script src="Scripts/common/common.js" type="text/javascript"></script>
    <script src="Scripts/common/jquery.cookie.js" type="text/javascript"></script>
    <script src="Scripts/common/mycard.js" type="text/javascript"></script>
    <script src="Scripts/lazyLoad/jquery.lazyload.min.js" type="text/javascript"></script>

    <script src="Scripts/angularJS/angular.min.js"></script>
    <script src="Scripts/angularJS/angular-sanitize.min.js"></script>
    <script type="text/javascript" src="Scripts/angular-loading-spinner/spin.min.js"></script>
    <script type="text/javascript" src="Scripts/angular-loading-spinner/angular-spinner.min.js"></script>
    <script type="text/javascript" src="Scripts/angular-loading-spinner/angular-loading-spinner.js"></script>
    <script src="app/appMain.js"></script>
    <script src="app/directives/directive.js"></script>
    <script src="app/directives/angular-summernote.js"></script>
    <script src="app/directives/paging.js"></script>
    <script src="app/services/ajaxServices.js"></script>
    <script src="app/services/alertsServices.js"></script>
    <link href="http://static.runtime.vn/App_Themes/RUN006/style.css" rel="stylesheet" type="text/css" />
    <link href="http://static.runtime.vn/App_Themes/RUN006/responsive.css" rel="stylesheet" type="text/css" />




</head>

<body ng-app="appMain" style="">
    <div id="fb-root"></div>
    <script>
        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6&appId=227481454296289";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>


    <div class="wrapper page-home">

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="header">

                        <script src="/Scripts/common/login.js" type="text/javascript"></script>
                        <section class="top-link clearfix">
                            <div class="">
                                <div class="">
                                    <div class="col-md-12">
                                        <ul class="nav navbar-nav topmenu-contact pull-left hidden-sm hidden-xs">
                                            <li><i class="fa fa-phone"></i> <span>Hotline:0908770095</span></li>
                                        </ul>
                                        <ul class="nav navbar-nav navbar-right topmenu  hidden-xs hidden-sm">
                                            <li class="order-check"><a href="kiem-tra-don-hang"><i class="fa fa-pencil-square-o"></i> Kiểm tra đơn hàng</a></li>
                                            <li class="order-cart"><a href="gio-hang"><i class="fa fa-shopping-cart"></i>Giỏ hàng(<lable id="demgiohang"><?php echo count($cart) ?></lable>)</a></li>
                                           
                                            <?php
                                            if (isset($_SESSION['users'])) {
                                                $info = $_SESSION['users'];
                                            ?>
                                                
                                                <li class="account-login"><a href="trang-chu"><i class="fa fa-sign-in"></i>HI<?php echo " " . $info['full_name'] ?> </a></li>
                                                <li class="account-login"><a href="ma-giam-gia"><i class="fa fa-sign-in"></i>Mã giảm giá</a></li>
                                                <li class="account-register"><a href="logout"><i class="fa fa-key"></i>Đăng xuất</a></li>
                                            <?php
                                            } else {

                                            ?>
                                                <li class="account-login"><a href="dang-nhap"><i class="fa fa-sign-in"></i> Đăng nhập </a></li>
                                                <li class="account-register"><a href="dang-ky"><i class="fa fa-key"></i> Đăng ký </a></li>
                                            <?php
                                            }
                                            ?>

                                        </ul>
                                        <div class="show-mobile hidden-lg hidden-md">
                                            <div class="quick-user">
                                                <div class="quickaccess-toggle">
                                                    <i class="fa fa-user"></i>
                                                </div>
                                                <div class="inner-toggle">
                                                    <ul class="login links">
                                                        <li>
                                                            <a href="dang-ky"><i class="fa fa-sign-in"></i> Đăng ký</a>
                                                        </li>
                                                        <li><span></span></a></li>
                                                        <li><a href="dang-nhap"><i class="fa fa-key"></i> Đăng nhập</a></li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="quick-access">
                                                <div class="quickaccess-toggle">
                                                    <i class="fa fa-list"></i>
                                                </div>
                                                <div class="inner-toggle">
                                                    <ul class="links">
                                                        <li><a id="mobile-wishlist-total" href="kiem-tra-don-hang" class="wishlist"><i class="fa fa-pencil-square-o"></i> Kiểm tra đơn hàng</a></li>
                                                        <li><a href="gio-hang" class="shoppingcart"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>


                        <section class="header-content clearfix">
                            <div class="bg_header ">
                                <div id="Header">
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                        <a href="trang-chu"><img class="logo" alt="C&#212;NG TY TNHH PH&#193;T TRIỂN C&#212;NG NGHỆ RUNTIME" src="Uploads/shop97/images/logo.png"></a>
                                    </div>

                                    <div class="top top-search col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                        <form class="search" action="tim-kiem" method="GET">
                                            <input type="text" name="search">
                                            <input type="submit" name="submit" value="Tìm kiếm">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </section>


                        <section class="header-bottom navigation-menu clearfix">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-6 col-md-7 col-sm-12 col-xs-12 visible-sm visible-xs navbar-top">
                                        <div class="navbar-header">
                                            <button class="navbar-toggle fa fa-th-list" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse"></button>
                                        </div>
                                        <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
                                            <ul class='main-nav nav navbar-nav menu'>
                                                <li class="menu level0"><a class='' href='trang-chu'><span>Trang chủ</span></a></li>
                                                <li class="menu level0"><a class='' href='san-pham'><span>Sản phẩm</span></a></li>
                                                <li class="menu level0"><a class='' href='tin-tuc'><span>Tin tức</span></a></li>
                                                <li class="menu level0"><a class='' href='gioi-thieu'><span>Giới thiệu</span></a></li>
                                                <li class="menu level0"><a class='' href='lien-he'><span>Liên hệ</span></a></li>
                                            </ul class='main-nav nav navbar-nav menu'>
                                        </nav>
                                    </div>
                                    <div class="Menu col-lg-12 col-md-12 col-sm-12 col-xs-12 visible-lg visible-md">
                                        <nav>
                                            <ul class='main-nav nav navbar-nav menu'>
                                                <li class="menu level0"><a class='' href='trang-chu'><span>Trang chủ</span></a>
                                                    <div class='menu-caret'></div>
                                                </li>
                                                <li class="s">/</li>
                                                <li class="menu level0"><a class='' href='san-pham'><span>Sản phẩm</span></a>
                                                    <div class='menu-caret'></div>
                                                </li>
                                                <li class="s">/</li>
                                                <li class="menu level0"><a class='' href='tin-tuc'><span>Tin tức</span></a>
                                                    <div class='menu-caret'></div>
                                                </li>
                                                <li class="s">/</li>
                                                <li class="menu level0"><a class='' href='gioi-thieu'><span>Giới thiệu</span></a>
                                                    <div class='menu-caret'></div>
                                                </li>
                                                <li class="s">/</li>
                                                <li class="menu level0"><a class='' href='lien-he'><span>Liên hệ</span></a>
                                                    <div class='menu-caret'></div>
                                                </li>
                                                <li class="s">/</li>
                                            </ul class='main-nav nav navbar-nav menu'>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <script type="text/javascript">
                            $(document).ready(function() {
                                var str = location.href.toLowerCase();
                                $("ul.menu li:first-child").addClass("active");
                                $("ul.menu li a").each(function() {
                                    if (str.indexOf(this.href.toLowerCase()) >= 0) {
                                        $("ul.menu li").removeClass("active");
                                        $(this).parent().addClass("active");
                                    }
                                });
                            });
                        </script>