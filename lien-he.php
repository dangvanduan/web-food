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
                    <li class="icon-li"><strong>Liên hệ</strong> </li>
    </ul>
</div>
<script type="text/javascript">
    $(".link-site-more").hover(function () { $(this).find(".s-c-n").show(); }, function () { $(this).find(".s-c-n").hide(); });
</script>

<script src="http://maps.google.com/maps/api/js?key=AIzaSyBO93-_2pxx4UBTNduADxfoWpsFrHAFKsA&sensor=true" type="text/javascript"></script>
<script src="app/services/contactServices.js"></script>
<script src="app/controllers/contactController.js"></script>
    <!--Begin-->
    <div class="contact-content clearfix" ng-controller="contactController" ng-init="initController('Shop','Maps')">
        <h1 class="title">
            <span>
                Thông tin liên hệ
            </span>
        </h1>
        <div class="contact-block clearfix">
            <div class="row">
                <div class="col-md-3">
                    <a href="/">
                        <img class="img-responsive" src="{{shop.Logo}}" />
                    </a>
                </div>
                <div class="col-md-9">
                    <div class="contact-info">
                        <div class="docs"><b class="name">{{shop.Name}}</b></div>
                        <div class="docs">
                            <i class="fa fa-map-marker"></i>
                            <b>Địa chỉ:</b> {{shop.Address}}
                        </div>
                        <div class="docs">
                            <i class="fa fa-phone"></i>
                            <b>Điện thoại:</b> {{shop.Phone}}
                        </div>
                        <div class="docs">
                            <i class="fa fa-mobile"></i>
                            <b>Hotline</b> {{shop.Hotline}}
                        </div>
                        <div class="docs">
                            <i class="fa fa-fax"></i>
                            <b>Fax:</b> {{shop.Fax}}
                        </div>
                        <div class="docs">
                            <i class="fa fa-envelope"></i>
                            <a href="mailto:{{shop.Email}}">{{shop.Email}}</a>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="" />
            <h3 class="title">Gửi thông tin liên hệ</h3>
            <div class="description">
                Xin vui lòng điền các yêu cầu vào mẫu dưới đây và gửi cho chúng tôi. Chúng tôi
                sẽ trả lời bạn ngay sau khi nhận được. Xin chân thành cảm ơn!
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="contact-feedback">
                        <form ng-submit="sendContact()">
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon glyphicon-user"></i></span>
                                <input type="text" placeholder="Họ tên" ng-model="Name" class="form-control" required />
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
                                <input type="text" placeholder="Địa chỉ" ng-model="Address" class="form-control" />
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                <input type="email" placeholder="Email" ng-model="Email" class="form-control" required />
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                                <input type="text" placeholder="Điện thoại" ng-model="Phone" class="form-control" required />
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-list-alt"></i></span>
                                <input type="text" placeholder="Tiêu đề" ng-model="Title" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <textarea placeholder="Nội dung" class="form-control" rows="3" ng-model="Content" required></textarea>
                            </div>
                            <button class="btn btn-default" type="submit">Gửi</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="map clearfix">
                        <div class="map-canvas" id="map_canvas"></div>
                        <div class="map-information" ng-if="Maps.length>1">
                            <ul class="clearfix">
                                <li ng-repeat="item in Maps">
                                    <div>
                                        <a onclick="moveToMaker({{item.Id}}); return false;" href="javascript:void(0)">
                                            {{item.Name}}
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var map;
        var infowindow;
        var marker = new Array();
        var old_id = 0;
        var infoWindowArray = new Array();
        var infowindow_array = new Array();
        function initialize() {
            var defaultLatLng = new google.maps.LatLng(10.845064529472292, 106.636744831799320);

            var myOptions = { zoom: 16, center: defaultLatLng, scrollwheel: true, mapTypeId: google.maps.MapTypeId.ROADMAP };
            map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
            map.setCenter(defaultLatLng);

            if (Maps.length <= 0) {
                var arrLatLng = new google.maps.LatLng(10.845064529472292, 106.636744831799320);
                var myHtml = "<div class='map-description'> <strong>" + firstMap.Name + "</strong><br/>Địa chỉ: <span>" + firstMap.Address + "</span><br/>Điện thoại: <span>" + firstMap.Phone + "</span><br/></div>";
                infoWindowArray[firstMap.Id] = myHtml;
                loadMarker(arrLatLng, infoWindowArray[firstMap.Id], firstMap.Id);
            }

            $.each(Maps, function (index, it) {
                var arrLatLng = new google.maps.LatLng(it.PosX, it.PosY);
                var myHtml = "<div class='map-description'> <strong>" + it.Name + "</strong><br/>Địa chỉ: <span>" + it.Address + "</span><br/>Điện thoại: <span>" + it.Phone + "</span><br/></div>";
                infoWindowArray[it.Id] = myHtml;
                loadMarker(arrLatLng, infoWindowArray[it.Id], it.Id);
            });


            moveToMaker(firstMap.Id);
        }
        function loadMarker(myLocation, myInfoWindow, id) {
            marker[id] = new google.maps.Marker({ position: myLocation, map: map, visible: true });
            var popup = myInfoWindow;
            infowindow_array[id] = new google.maps.InfoWindow({ content: popup });
            google.maps.event.addListener(marker[id], 'click', function () {
                if (id == old_id) return;
                if (old_id > 0)
                    infowindow_array[old_id].close();
                infowindow_array[id].open(map, marker[id]);
                old_id = id;
            });
            google.maps.event.addListener(infowindow_array[id], 'closeclick', function () { old_id = 0; });
        }
        function moveToMaker(id) {
            var location = marker[id].position;
            map.setCenter(location);
            if (old_id > 0)
                infowindow_array[old_id].close();
            infowindow_array[id].open(map, marker[id]);
            old_id = id;
        }
    </script>
    <!--End-->
<script type="text/javascript">
    var firstMap= {"Id":97,"ShopId":0,"Name":"CÔNG TY TNHH PHÁT TRIỂN CÔNG NGHỆ RUNTIME","Address":"5/12A Quang Trung, P.14, Q.Gò Vấp, Tp.Hồ Chí Minh","Phone":" (08) 85 85 66 38","PosX":10.844895933994351,"PosY":106.636744831799320,"Index":0,"Inactive":false};
    var Maps= [];
    window.Maps = Maps;
    window.Shop = {"Name":"CÔNG TY TNHH PHÁT TRIỂN CÔNG NGHỆ RUNTIME","Email":"info@runtime.vn","Phone":" (08) 85 85 66 38","Logo":"/Uploads/shop97/images/logo.png","Fax":" (08) 85 85 66 38","Website":"http://www.runtime.vn","Hotline":"0908770095","Address":"5/12A Quang Trung, P.14, Q.Gò Vấp, Tp.Hồ Chí Minh","Fanpage":"https://www.facebook.com/runtime.vn","Google":null,"Facebook":"https://www.facebook.com/runtime.vn","Youtube":null,"Twitter":null,"IsBanner":false,"IsFixed":false,"BannerImage":null};
    $(document).ready(function () {
        initialize();
    });
</script>
                    </div>
                    <div class="col-md-3">

<script src="app/services/moduleServices.js"></script>
<script src="app/controllers/moduleController.js"></script>
    <!--Begin-->
    <div class="box-support-online" ng-controller="moduleController" ng-init="initSupportOnlineController('Shop','SupportOnlines')">
        <h3><span>Hỗ trợ trực tuyến</span></h3>
        <div class="support-online-block">
            <div class="support-hotline">
                HOTLINE<br><span>{{shop.Hotline}}</span>
            </div>
            <div class="support-item" ng-repeat="item in SupportOnlines">
                <div class="name">
                    {{item.FullName}}  <b>{{item.Phone}}</b>
                </div>
                <ul>
                    <li ng-if="item.Skype!=''&&item.Skype!=null">
                        <a ng-href="skype:{{item.Skype}}?chat" title="{{item.FullName}}">
                            <img width="70" src="http://www.skypeassets.com/i/scom/images/skype-buttons/chatbutton_32px.png">
                        </a>
                    </li>
                    <li ng-if="item.Viber!=''&&item.Viber!=null" class="social">
                        <a href="tel:{{item.Viber}}" title="{{item.FullName}}" target="_blank"> <img src="Images/icon-viber.png" alt="Viber"></a>
                        <span class="phone"><a href="tel:{{item.Viber}}" title="{{item.FullName}}" target="_blank">{{item.Viber}} </a></span>
                    </li>
                    <li ng-if="item.Zalo!=''&&item.Zalo!=null" class="social">
                        <a href="tel:{{item.Zalo}}" title="{{item.FullName}}" target="_blank"> <img src="Images/icon-zalo.png" alt="Zalo"></a>
                        <span class="phone"><a href="tel:{{item.Zalo}}" title="{{item.FullName}}" target="_blank">{{item.Zalo}} </a></span>
                    </li>
                    <li ng-if="item.Facebook!=''&&item.Facebook!=null" class="social">
                        <a href="{{item.Facebook}}" title="{{item.FullName}}" target="_blank"> <img src="Images/icon-facebook.png" alt="Facebook"></a>
                        <span class="phone"><a href="{{item.Facebook}}" title="{{item.FullName}}" target="_blank">{{item.FullName}} </a></span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!--End-->
<script type="text/javascript">
    window.Shop = {"Name":"CÔNG TY TNHH PHÁT TRIỂN CÔNG NGHỆ RUNTIME","Email":"info@runtime.vn","Phone":" (08) 85 85 66 38","Logo":"Uploads/shop97/images/logo.png","Fax":" (08) 85 85 66 38","Website":"http://www.runtime.vn","Hotline":"0908770095","Address":"5/12A Quang Trung, P.14, Q.Gò Vấp, Tp.Hồ Chí Minh","Fanpage":"https://www.facebook.com/runtime.vn","Google":null,"Facebook":"https://www.facebook.com/runtime.vn","Youtube":null,"Twitter":null,"IsBanner":false,"IsFixed":false,"BannerImage":null};
    window.SupportOnlines = [{"Id":24,"ShopId":97,"FullName":"Mr.Trường","Position":"Giám đốc","Yahoo":"truongka04","Skype":"truong.vt","Viber":null,"Zalo":null,"Facebook":null,"Phone":"0908770095","Phone1":null,"Email":null,"Address":null,"Avatar":null,"Company":null,"Index":1,"Inactive":false}];
</script>                    </div>
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
    </script>
    <!--End-->
<script type="text/javascript">
    window.Partners = [{"Id":2,"ShopId":97,"Name":"nokia","Link":"#","Logo":"Uploads/shop97/images/product/nokia_logo.jpeg","Index":1,"Inactive":false},{"Id":3,"ShopId":97,"Name":"samsung","Link":"#","Logo":"Uploads/shop97/images/product/samsung.png","Index":2,"Inactive":false},{"Id":4,"ShopId":97,"Name":"black","Link":"#","Logo":"Uploads/shop97/images/product/blackberry.png","Index":3,"Inactive":false},{"Id":5,"ShopId":97,"Name":"LG","Link":"#","Logo":"Uploads/shop97/images/product/LGlogo.png","Index":4,"Inactive":false},{"Id":6,"ShopId":97,"Name":"Sony","Link":"#","Logo":"Uploads/shop97/images/product/Sony_Ericsson85.png","Index":5,"Inactive":false}];
</script>                        </div>
                    </div>
                </div>
            </div>
  
<?php 
require_once 'inc/footer.php';
?>