<?php

require_once 'inc/header.php';

$cart = (isset($_SESSION['cart'])) ? $_SESSION['cart'] : [];
// echo "<pre>";
// print_r($cart);


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
                        <!-- <li class="icon-li"><strong>Giỏ hàng</strong> </li> -->
                    </ul>
                </div>
                <!-- <script type="text/javascript">
    $(".link-site-more").hover(function () { $(this).find(".s-c-n").show(); }, function () { $(this).find(".s-c-n").hide(); });
</script> -->
            </div>
        </div>
    </div>
</div>


<div class="main">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <script src="app/services/orderServices.js"></script>
                <script src="app/controllers/orderController.js"></script>
                <div class="cart-content" ng-controller="orderController" ng-init="initOrderCartController()">
                    <h1 class="title"><span>Giỏ hàng của tôi</span></h1>
                    <div class="steps clearfix">
                        <ul class="clearfix">
                            <li class="cart active col-md-2 col-xs-12 col-sm-4 col-md-offset-3 col-sm-offset-0 col-xs-offset-0"><span><i class="glyphicon glyphicon-shopping-cart"></i></span><span>Giỏ hàng của tôi</span><span class="step-number"><a>1</a></span></li>
                            <li class="payment col-md-2 col-xs-12 col-sm-4"><span><i class="glyphicon glyphicon-usd"></i></span><span>Thanh toán</span><span class="step-number"><a>2</a></span></li>
                            <li class="finish col-md-2 col-xs-12 col-sm-4"><span><i class="glyphicon glyphicon-ok"></i></span><span>Hoàn tất</span><span class="step-number"><a>3</a></span></li>
                        </ul>
                    </div>
                    <div class="cart-block">
                        <div class="cart-info table-responsive">
                            <table class="table product-list">
                                <thead>
                                    <tr>

                                        <th>Hình ảnh</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Giá</th>
                                        <th>Số lượng</th>
                                        <th>Thành tiền</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $total_price = 0; ?>
                                    <?php foreach ($cart as $key => $value) :
                                        $total_price += ($value['price'] * $value['quantity']);
                                    ?>
                                        <tr>
                                        <form action="javascript:void(0)" method="POST">
                                            <td class="image">
                                                <a href="chi-tiet.php?product_id=<?php echo $value['product_id'] ?>"> <img src="Uploads/shop97/images/product/<?php echo $value['picture'] ?>" class="img-responsive" /></a>
                                            </td>
                                            <td class="des">
                                                <h2><a href="chi-tiet.php?product_id=<?php echo $value['product_id'] ?>"><?php echo $value['name']; ?></a></h2>

                                            </td>

                                            <td class="price">
                                                <p id="cart_price_item<?php echo $value['product_id'] ?>"><?php echo number_format($value['price'], 0, ',', '.') ?></p>
                                            </td>
                                            <td class="cart_quantity">
                                            
                                                
                                                    <div class="buttons_added">
                                                        <input class="minus is-form" name="submit" onclick="editQuantity(<?php echo $value['product_id']?>,-1)" type="submit" value="-">
                                                        <input type="hidden" id="price<?php echo $value['product_id']?>" name="product_id" value="<?php echo $value['price'] ?>">
                                                        <input type="hidden" id="action" name="action" value="update">
                                                        <input aria-label="quantity" id="quantity<?php echo $value['product_id']?>" class="input-qty" name="quantity" max="20" min="1" name="" type="number" value="<?php echo $value['quantity']?>">
                                                        <input class="plus is-form" name="submit" onclick="editQuantity(<?php echo $value['product_id']?>,+1)" type="submit" value="+">
                                                    </div>
                                                

                                            </td>
                                            <td class="amount">
                                                <lable class="cart_total_price" id="cart_total_item<?php echo $value['product_id']?>"><?php echo number_format(($value['price'] * $value['quantity']), 0, ',', '.') ?></lable>
                                              
                                            </td>

                                            <td><a href="ajax/deleteCart.php?product_id=<?php echo $value['product_id'] ?>" onclick="return confirm ('Bạn có muốn xóa đơn hàng này không ?')" class=" btn btn-danger">Xóa</a> </td>

                                        </form>
                                        </tr>
                                    <?php endforeach; ?>

                                </tbody>
                                <script type="text/javascript">
                                    function editQuantity(d,numchange) {
                                        
                                        const b = Number($('#quantity'+d).val())+numchange;
                                        const c = $('#action').val();
                                        const a = $('#price'+d).val();
                                     
                                        $.ajax({
                                            type: 'POST',
                                            url: 'cart.php',
                                          
                                            data: {
                                                product_id: d,
                                                quantity: b,
                                                action: c,
                                                price: a,
                                            },
                                            success: (data) => {
                                               
                                                $('#cart_total_item'+d).html(data*a);                                            
                                            },
                                            error: () => {
                                                alert('Có Lỗi Xảy Ra')
                                            }
                                        })
                                        $.ajax({
                                            type: 'POST',
                                            url: 'ajax/updateCart.php',
                                          
                                            data: {
                                                product_id: d,
                                                quantity: b,
                                                action: c,
                                                price: a,
                                            },
                                            success: (data) => {
                                               
                                                $('#tongtien').html(data)                                         
                                            },
                                            error: () => {
                                                alert('Có Lỗi Xảy Ra')
                                            }
                                        })

                                        return false;
                                    }
                                </script>
                                
                                          
                            </table>
                        </div>
                        <div class="clearfix text-right">
                            <span><b>Tổng thanh toán:</b></span>
                            <span class="pay-price">
                                <span id="tongtien"><?php echo number_format($total_price,0,',','.')?></span> đ
                            </span>
                        </div>
                        <?php if($total_price>0){?>
                        <div class="button text-right">

                            <a class="btn btn-default" href="san-pham" onclick="">Tiếp tục mua hàng</a>
                            <a class="btn btn-primary" href="thanh-toan">Tiến hành thanh toán</a>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .buttons_added {
        opacity: 1;
        display: inline-block;
        display: -ms-inline-flexbox;
        display: inline-flex;
        white-space: nowrap;
        vertical-align: top;
    }

    .is-form {
        overflow: hidden;
        position: relative;
        background-color: #f9f9f9;
        height: 2.2rem;
        width: 1.9rem;
        padding: 0;
        text-shadow: 1px 1px 1px #fff;
        border: 1px solid #ddd;
    }

    .is-form:focus,
    .input-text:focus {
        outline: none;
    }

    .is-form.minus {
        border-radius: 4px 0 0 4px;
    }

    .is-form.plus {
        border-radius: 0 4px 4px 0;
    }

    .input-qty {
        background-color: #fff;
        height: 2.2rem;
        text-align: center;
        font-size: 1rem;
        display: inline-block;
        vertical-align: top;
        margin: 0;
        border-top: 1px solid #ddd;
        border-bottom: 1px solid #ddd;
        border-left: 0;
        border-right: 0;
        padding: 0;
    }

    .input-qty::-webkit-outer-spin-button,
    .input-qty::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
</style>
<script>
    //<![CDATA[
    $('input.input-qty').each(function() {
        var $this = $(this),
            qty = $this.parent().find('.is-form'),
            min = Number($this.attr('min')),
            max = Number($this.attr('max'))
        if (min == 0) {
            var d = 0
        } else d = min
        $(qty).on('click', function() {
            if ($(this).hasClass('minus')) {
                if (d > min) d += -1
            } else if ($(this).hasClass('plus')) {
                var x = Number($this.val()) + 1
                if (x <= max) d += 1
            }
            $this.attr('value', d).val(d)
        })
    })
    //]]>
</script>
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