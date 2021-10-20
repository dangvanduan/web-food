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
                <div class="menu-account">
                    <h3>
                        <span>
                            Tài khoản
                        </span>
                    </h3>
                    <ul>
                        <li><a href="dang-nhap"><i class="fa fa-sign-in"></i> Đăng nhập</a></li>
                        <li><a href="dang-ky"><i class="fa fa-key"></i> Đăng ký</a></li>
                        <li><a href="thay-doi-mat-khau"><i class="fa fa-key"></i> Quên mật khẩu</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-9">

                <div class="breadcrumb clearfix">
                    <ul>
                        <li itemtype="http://shema.org/Breadcrumb" itemscope="" class="home">
                            <a title="Đến trang chủ" href="/" itemprop="url"><span itemprop="title">Trang chủ</span></a>
                        </li>
                        <li class="icon-li"><strong>Đăng ký tài khoản</strong> </li>
                    </ul>
                </div>
                <script type="text/javascript">
                    $(".link-site-more").hover(function() {
                        $(this).find(".s-c-n").show();
                    }, function() {
                        $(this).find(".s-c-n").hide();
                    });
                </script>
                <script src="app/services/accountServices.js"></script>
                <script src="app/controllers/accountController.js"></script>
                <div class="register-content clearfix" ng-controller="accountController" ng-init="initRegisterController()">
                    <h1 class="title"><span>Đăng ký tài khoản</span></h1>
                    <div ng-if="IsError" class="alert alert-danger fade in">
                        <button data-dismiss="alert" class="close"></button>
                        <i class="fa-fw fa fa-times"></i>
                        <strong>Error!</strong>
                        <span ng-bind-html="Message"></span>
                    </div>
                    <div ng-if="IsSuccess" class="alert alert-success fade in">
                        <button data-dismiss="alert" class="close"></button>
                        <i class="fa-fw fa fa-check"></i>
                        <strong>Success!</strong> Đăng ký thành công.
                    </div>
                    <div ng-if="InValid" class="alert alert-danger fade in">
                        <button data-dismiss="alert" class="close"></button>
                        <i class="fa-fw fa fa-times"></i>
                        <strong>Error!</strong>
                        <span ng-bind-html="Message"></span>
                    </div>
                    <div class="col-md-8 col-md-offset-2 col-xs-12 col-sm-12 col-xs-offset-0 col-sm-offset-0">


                        
                            <h2><span>Thông tin tài khoản</span></h2>

                            <?php
                            $mess = "";
                            if (isset($_POST['submit'])) {
                                $user_name = $_POST['user_name'];
                                $password = md5($_POST['password']);
                                $RePassword = md5($_POST['RePassword']);
                                $fullname = $_POST['fullname'];
                                $phone = $_POST['phone'];
                                $address = $_POST['address'];
                                if ($_POST['password'] != $_POST['RePassword']) {
                                    $mess = "Password và Repassword không khớp";
                                }
                                $query = "SELECT * FROM users WHERE user_name='$user_name'";
                                $result = $mysqli->query($query);
                                $count = mysqli_num_rows($result);

                                if ($count != 0) {
                                    $mess = "Tài khoản đã tồn tại, vui lòng chọn tài khoản khác!";
                                } else {
                                    $query1 = "INSERT INTO users (user_name,password,full_name,phone,address) VALUE('{$user_name}','{$password}','{$fullname}','{$phone}','{$address}')";
                                    $result1 = $mysqli->query($query1);
                                    if ($result1) {
                                        echo '<script type="text/javascript"> alert("Đăng ký tài khoản thành công");</script>';
                                        echo  '<script type="text/javascript">
                                        function Redirect() {
                                        window.location="http://localhost/doan/dang-nhap.php";
                                        }
                                        Redirect();
                                        </script>';
                                        $mess = "Đăng ký tài khoản thành công!";
                                    } else {
                                        $mess = "Lỗi, không thể đăng ký tài khoản";
                                    }
                                }
                            }
                            ?>
                            <form class="form-horizontal" ng-submit="register()" method="POST">
                            <h6><span style="color:red;"><?php echo $mess; ?></span></h6>
                            <div class="form-group">
                                <label for="Code" class="col-sm-3 control-label">Tài khoản<span class="warning">(*)</span></label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" name="user_name" ng-model="Code" required="true" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="Password" class="col-sm-3 control-label">Mật khẩu<span class="warning">(*)</span></label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" name="password" ng-model="Password" required="true" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="RePassword" class="col-sm-3 control-label">Nhập lại mật khẩu<span class="warning">(*)</span></label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" name="RePassword" ng-model="RePassword" />
                                </div>
                            </div>
                            <h2>Thông tin cá nhân</h2>
                            <div class="form-group">
                                <label for="Name" class="col-sm-3 control-label">Họ tên<span class="warning">(*)</span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="fullname" ng-model="Name" required="true" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-3 control-label">Điện thoại</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="phone" ng-model="Phone" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-3 control-label">Địa chỉ</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="address" ng-model="Address" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-4 col-sm-8">
                                    <button type="submit" name="submit" class="btn btn-primary">Đăng ký</button>
                                </div>
                            </div>
                        </form>
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