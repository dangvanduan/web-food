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

                </div>
            </div>
            <div class="col-md-9">

                <div class="breadcrumb clearfix">
                    <ul>
                        <li itemtype="http://shema.org/Breadcrumb" itemscope="" class="home">
                            <a title="Đến trang chủ" href="/" itemprop="url"><span itemprop="title">Trang chủ</span></a>
                        </li>
                        <li class="icon-li"><strong>Đăng nhập</strong> </li>
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
                <div class="login-content clearfix" ng-controller="accountController" ng-init="initController()">
                    <h1 class="title"><span>Nhập mã giảm giá</span></h1>
                    <div ng-if="IsError" class="alert alert-danger fade in">
                        <button data-dismiss="alert" class="close"></button>
                        <i class="fa-fw fa fa-times"></i>
                        <strong>Error!</strong>
                        <span ng-bind-html="Message"></span>
                    </div>
                    <div ng-if="IsSuccess" class="alert alert-success fade in">
                        <button data-dismiss="alert" class="close"></button>
                        <i class="fa-fw fa fa-check"></i>
                        <strong>Success!</strong> Đăng nhập thành công.
                    </div>
                    <div ng-if="InValid" class="alert alert-danger fade in">
                        <button data-dismiss="alert" class="close"></button>
                        <i class="fa-fw fa fa-times"></i>
                        <strong>Error!</strong>
                        <span ng-bind-html="Message"></span>
                    </div>



                    <div class="col-md-6 col-md-offset-3 col-xs-12 col-sm-12 col-xs-offset-0 col-sm-offset-0">
                        <?php
                        $mess = '';
                        if(isset($_SESSION['users'])){
                            $info=$_SESSION['users'];
                            $user_id=$info['user_id'];
                                       
                        if(isset($_POST['nhapma'])){
                            $coupon_code=$_POST['magiamgia'];
                            $query = "SELECT * FROM coupon WHERE coupon_code='$coupon_code'";
                            $result1 = $mysqli->query($query);
                            while($row=mysqli_fetch_row($result1))
                            {
                                $coupon_id=$row['0'];
                                $coupon_name=$row['1'];
                                $coupon_value=$row['4'];               
                                $coupon_number=$row['5'];         
                            }
                           
                            $count = mysqli_num_rows($result1);
                            $query1 = "SELECT * FROM ticket WHERE coupon_code='$coupon_code'";
                            $result2 = $mysqli->query($query1);
                            $count1 = mysqli_num_rows($result2);
                            if($count==1 && $count1==1)
                            {
                                $mess='Mã này bạn đã có';
                            }
                            else if($count==1 && $count1!=1 ){
                                $query3="INSERT INTO ticket(user_id,coupon_id,coupon_name,coupon_code,coupon_value) VALUE ($user_id,$coupon_id,$coupon_name,$coupon_code,$coupon_value)";
                                $result3 = $mysqli->query($query3);
                                echo '<script type="text/javascript"> alert("Thêm mã giảm giá Thành Công")</script>';
                                $coupon_number=$coupon_number-1;
                                $query4="UPDATE coupon SET coupon_number = {$coupon_number} WHERE coupon_id={$coupon_id}";
                                $result4 = $mysqli->query($query4);

                            }else{
                                $mess="Mã nhập vào sai";
                            }
                      
                        }
                        ?>
                        <form action="" method="POST">
                            <input type="text" name="magiamgia">
                            <button type="submit" name="nhapma">Nhập mã</button>
                        </form>
                        <br/>
                        <h6><span style="color:red;"><?php echo $mess; ?></span></h6>
                        <table class="table table-bordered table-inverse table-hover">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên mã</th>
                                    <th>Mã giảm giá</th>
                               

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM ticket WHERE user_id=$user_id";
                                $result = $mysqli->query($sql);
                                while ($arTicket = mysqli_fetch_assoc($result)) {
                                ?>
                                    <tr>
                                        <td><?php echo $arTicket['coupon_id'] ?></td>
                                        <td><?php echo $arTicket['coupon_name'] ?></td>
                                        <td><?php echo $arTicket['coupon_code'] ?></td>
                                  
                                                                                                              
                                    </tr>
                                <?php
                                }
                            }
                                ?>

                            </tbody>
                        </table>
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