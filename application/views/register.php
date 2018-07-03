<!DOCTYPE html>
<html lang="zxx">
<head>
    <script src="<?php echo base_url('assets/')?>js/jquery.nicescroll.js"></script>
    <script src="<?php echo base_url('assets/')?>vue.js"></script>
    <title>Esteem  An Admin Panel Category Flat Bootstrap Responsive Website Template | Admin Login  :: w3layouts</title>
    <!-- custom-theme -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Esteem Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
        function hideURLbar(){ window.scrollTo(0,1); } </script>
    <link href="<?php echo base_url('assets/')?>css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php echo base_url('assets/')?>css/component.css" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php echo base_url('assets/')?>css/style_grid.css" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php echo base_url('assets/')?>css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php echo base_url('assets/')?>css/font-awesome.css" rel="stylesheet">
    <script type="text/javascript" src="<?php echo base_url('assets/')?>js/jquery-2.1.4.min.js"></script>
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
</head>
<body>
<div class="wthree_agile_admin_info">
    <div class="w3_agileits_top_nav">
        <ul id="gn-menu" class="gn-menu-main">

            <!-- //nav_agile_w3l -->
            <li class="second logo admin"><h1><a href="main-page.html"><i class="fa fa-graduation-cap" aria-hidden="true"></i>Esteem </a></h1></li>

            <li class="second w3l_search admin_login">

                <form action="#" method="post">
                    <input type="search" name="search" placeholder="Search here..." required="">
                    <button class="btn btn-default" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                </form>

            </li>
            <li class="second full-screen">
                <section class="full-top">
                    <button id="toggle"><i class="fa fa-arrows-alt" aria-hidden="true"></i></button>
                </section>
            </li>

        </ul>

    </div>
    <div class="clearfix"></div>
    <!-- //w3_agileits_top_nav-->

    <!-- /inner_content-->
    <div id="lg">
        <div class="inner_content">
            <!-- /inner_content_w3_agile_info-->
            <div class="inner_content_w3_agile_info">

                <div class="registration admin_agile">

                    <div class="signin-form profile admin">
                        <h2>Admin Login</h2>
                        <div class="login-form">
                            <form action="<?php echo site_url('Welcome/logincheck')?>" method="post">
                                <input type="text" name="name" value="Username" required="">
                                <input type="password" name="password" value="Password" required="">
                                <div class="tp">
                                    <input type="submit" value="LOGIN">
                                </div>
                            </form>
                        </div>
                        <div class="login-social-grids admin_w3">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="<?php echo site_url('Welcome/register')?>"><i class="fa fa-rss"></i></a></li>
                            </ul>
                        </div>
                        <!--                    <h6><a href="main-page.html">Back To Home</a><h6>-->
                    </div>

                </div>
                <!-- //inner_content_w3_agile_info-->
            </div>
            <!-- //inner_content-->
        </div>
    </div>
    <!-- banner -->
    <!--copy rights start here-->
    <div class="copyrights">
        <p>© 2017 Esteem. All Rights Reserved | Design by  <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
    </div>
    <!--copy rights end here-->
    <!-- js -->


    <script src="<?php echo base_url('assets/')?>js/modernizr.custom.js"></script>

    <script src="<?php echo base_url('assets/')?>js/classie.js"></script>
    <script src="<?php echo base_url('assets/')?>js/gnmenu.js"></script>
    <script>
        new gnMenu( document.getElementById( 'gn-menu' ) );
    </script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>
    <script type="text/javascript">
        google.maps.event.addDomListener(window, 'load', init);
        function init() {
            var mapOptions = {
                zoom: 11,
                center: new google.maps.LatLng(40.6700, -73.9400),
                styles: [{"featureType":"all","elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#000000"},{"lightness":40}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#000000"},{"lightness":16}]},{"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":17},{"weight":1.2}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":21}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":16}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":19}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":17}]}]
            };
            var mapElement = document.getElementById('map');
            var map = new google.maps.Map(mapElement, mapOptions);
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(40.6700, -73.9400),
                map: map,
            });
        }
    </script>
    <script src="<?php echo base_url('assets/')?>js/prettymaps.js"></script>
    <script>

        $(function(){
            //default
            $('.map-canvas').prettyMaps({
                address: 'Melbourne, Australia',
                image: 'map-icon.png',
                hue: '#FF0000',
                saturation: -20
            });

            //red map example
            $('#default-map-btn').on('click', function(){
                $('.map-canvas').prettyMaps();
            });

            //green map example
            $('#green-map-btn').on('click', function(){
                $('.map-canvas').prettyMaps({
                    address: 'Melbourne, Australia',
                    image: 'map-icon.png',
                    hue: '#00FF55',
                    saturation: -30
                });
            });

            //blue map example
            $('#blue-map-btn').on('click', function(){
                $('.map-canvas').prettyMaps({
                    address: 'Melbourne, Australia',
                    image: 'map-icon.png',
                    hue: '#0073FF',
                    saturation: -30,
                    zoom: 16,
                    panControl: true,
                    zoomControl: true,
                    mapTypeControl: true,
                    scaleControl: true,
                    streetViewControl: true,
                    overviewMapControl: true,
                    scrollwheel: false,
                });
            });

            //grey map example
            $('#grey-map-btn').on('click', function(){
                $('.map-canvas').prettyMaps({
                    address: 'Melbourne, Australia',
                    image: 'map-icon.png',
                    saturation: -100,
                    lightness: 10
                });
            });
        });

    </script>
    <!-- //js -->
    <script src="<?php echo base_url('assets/')?>js/screenfull.js"></script>
    <script>
        $(function () {
            $('#supported').text('Supported/allowed: ' + !!screenfull.enabled);

            if (!screenfull.enabled) {
                return false;
            }



            $('#toggle').click(function () {
                screenfull.toggle($('#container')[0]);
            });
        });
    </script>

    <script src="<?php echo base_url('assets/')?>js/scripts.js"></script>

    <script type="text/javascript" src="<?php echo base_url('assets/')?>js/bootstrap-3.1.1.min.js"></script>


</body>
</html>