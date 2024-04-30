<?php
    
    if(isset($GET['id']))
    {
        switch($GET['id'])
        {
            case 1: {
                echo '<script></script>'
            }
        }
    }
    require 'lib/DataProvider.php';
    if(isset($_POST['register-submit'])){
        if(!empty($_POST['userName'])&&!empty($_POST['fullName'])&&!empty($_POST['eMail'])&&!empty($_POST['phoneNumber'])&&!empty($_POST['passWord'])) $userName = $_POST['userName'];
        $userName = trim($_POST['userName']);
        $fullName =  trim($_POST['fullName']);
        $eMail = trim($_POST['eMail']);
        $phoneNumber = trim ($_POST['phoneNumber']);
        $passWord = trim($_POST['passWord']);
        $repassWord =  trim($_POST['re-passWord']);
        $passWordHash = password_hash($passWord,PASSWORD_DEFAULT);
        $sql = "INSERT INTO khachhang (taikhoankh , matkhau ,email ,hoten, sodienthoai) VALUES ('$userName','$passWordHash','$eMail','$fullName','$phoneNumber')";
        $result = executeQuery($sql);
        session_start();
        $_SESSION['userName'] = $userName;
        $_SESSION['fullName'] = $fullName;
        $_SESSION['passWord'] = $passWord;
        header("Location: index.php");
    }
?>
<?php
    if(isset($_POST['login-submit'])){
        if(!empty($_POST['userName'])&&!empty($_POST['passWord'])){
            $userName = $_POST['userName'];
            $passWord = $_POST['passWord'];
            $sql = "SELECT * FROM `khachhang` WHERE taikhoankh = '$userName'";
            $result = executeQuery($sql);
            $user = $result->fetch_assoc();
            if($user){
                password_verify($passWord, $user['passWord']);
                session_start();
                $_SESSION['userName'] = $user['userName'];
                $_SESSION['passWord'] = $user['passWord'];
                $_SESSION['fullName'] = $user['fullName'];
                //print_r($_SESSION);
                header('Location:index.php');
                exit;
            }
        }
    }
?>

<!DOCTYPE html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="meta description">

    <title>Member Area :: DNX - Jewelry Store e-Commerce Bootstrap 4 Template</title>

    <!--=== Favicon ===-->
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon"/>

    <!--== Google Fonts ==-->
    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Droid+Serif:400,400i,700,700i"/>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Montserrat:400,700"/>
    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i"/>

    <!--=== Bootstrap CSS ===-->
    <link href="assets/css/vendor/bootstrap.min.css" rel="stylesheet">
    <!--=== Font-Awesome CSS ===-->
    <link href="assets/css/vendor/font-awesome.css" rel="stylesheet">
    <!--=== Plugins CSS ===-->
    <link href="assets/css/plugins.css" rel="stylesheet">
    <!--=== Main Style CSS ===-->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- Modernizer JS -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
    
    
   
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <!--== Header Area Start ==-->
    <header id="header-area" class="header__3">
        <div class="ruby-container">
            <div class="row">
                <!-- Logo Area Start -->
                <div class="col-3 col-lg-1 col-xl-2 m-auto">
                    <a href="index.html" class="logo-area">
                        <img src="assets/img/logo-black.png" alt="Logo" class="img-fluid"/>
                    </a>
                </div>
                <!-- Logo Area End -->

                <!-- Navigation Area Start -->
                <div class="col-3 col-lg-9 col-xl-8 m-auto">
                    <div class="main-menu-wrap">
                        <nav id="mainmenu">
                            <ul>
                                <li class="dropdown-show"><a href="index.html">Home</a>
                                    <ul class="dropdown-nav sub-dropdown">
                                        <li><a href="index.html">Home Layout 1</a></li>
                                        <li><a href="index2.html">Home Layout 2</a></li>
                                        <li><a href="index3.html">Home Layout 3</a></li>
                                        <li><a href="index4.html">Home Layout 4</a></li>
                                        <li><a href="index5.html">Home Layout 5</a></li>
                                        <li><a href="index6.html">Home Layout 6</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown-show"><a href="#">Shop</a>
                                    <ul class="mega-menu-wrap dropdown-nav">
                                        <li class="mega-menu-item"><a href="shop.html" class="mega-item-title">Shop
                                                Layout</a>
                                            <ul>
                                                <li><a href="shop.html">Shop Left Sidebar</a></li>
                                                <li><a href="shop-right-sidebar.html">Shop Right Sidebar</a></li>
                                                <li><a href="shop-left-full-wide.html">Shop Left Full Wide</a></li>
                                                <li><a href="shop-right-full-wide.html">Shop Right Full Wide</a></li>
                                                <li><a href="shop-full-wide.html">Shop Without Sidebar</a></li>
                                            </ul>
                                        </li>

                                        <li class="mega-menu-item"><a href="single-product.html" class="mega-item-title">Single
                                                Products</a>
                                            <ul>
                                                <li><a href="single-product.html">Single Product</a></li>
                                                <li><a href="single-product-normal.html">Single Product Normal</a></li>
                                                <li><a href="single-product-group.html">Single Product Group</a></li>
                                                <li><a href="single-product-external.html">Single Product External</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="dropdown-show"><a href="#">Pages</a>
                                    <ul class="dropdown-nav">
                                        <li><a href="cart.html">Shopping Cart</a></li>
                                        <li><a href="checkout.html">Checkout</a></li>
                                        <li><a href="compare.html">Compare</a></li>
                                        <li><a href="wishlist.html">Wishlist</a></li>
                                        <li><a href="login-register.html">Login & Register</a></li>
                                        <li><a href="my-account.html">My Account</a></li>
                                        <li><a href="404.html">404 Error</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown-show"><a href="#">Men</a>
                                    <ul class="mega-menu-wrap dropdown-nav">
                                        <li class="mega-menu-item"><a href="shop-left-full-wide.html"
                                                                      class="mega-item-title">Shirt</a>
                                            <ul>
                                                <li><a href="shop.html">Tops & Tees</a></li>
                                                <li><a href="shop.html">Polo Short Sleeve</a></li>
                                                <li><a href="shop.html">Graphic T-Shirts</a></li>
                                                <li><a href="shop.html">Jackets & Coats</a></li>
                                                <li><a href="shop.html">Fashion Jackets</a></li>
                                            </ul>
                                        </li>

                                        <li class="mega-menu-item"><a href="shop-left-full-wide.html"
                                                                      class="mega-item-title">Jeans</a>
                                            <ul>
                                                <li><a href="shop.html">Crochet</a></li>
                                                <li><a href="shop.html">Sleeveless</a></li>
                                                <li><a href="shop.html">Stripes</a></li>
                                                <li><a href="shop.html">Sweaters</a></li>
                                                <li><a href="shop.html">Hoodies</a></li>
                                            </ul>
                                        </li>

                                        <li class="mega-menu-item"><a href="shop-left-full-wide.html"
                                                                      class="mega-item-title">Shoes</a>
                                            <ul>
                                                <li><a href="shop.html">Tops & Tees</a></li>
                                                <li><a href="shop.html">Polo Short Sleeve</a></li>
                                                <li><a href="shop.html">Graphic T-Shirts</a></li>
                                                <li><a href="shop.html">Jackets & Coats</a></li>
                                                <li><a href="shop.html">Fashion Jackets</a></li>
                                            </ul>
                                        </li>

                                        <li class="mega-menu-item"><a href="shop-left-full-wide.html"
                                                                      class="mega-item-title">Watches</a>
                                            <ul>
                                                <li><a href="shop.html">Crochet</a></li>
                                                <li><a href="shop.html">Sleeveless</a></li>
                                                <li><a href="shop.html">Stripes</a></li>
                                                <li><a href="shop.html">Sweaters</a></li>
                                                <li><a href="shop.html">Hoodies</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="dropdown-show"><a href="shop-left-full-wide.html">Women</a>
                                    <ul class="mega-menu-wrap dropdown-nav">
                                        <li class="mega-menu-item"><a href="shop-left-full-wide.html"
                                                                      class="mega-item-title">Kamiz</a>
                                            <ul>
                                                <li><a href="shop.html">Tops & Tees</a></li>
                                                <li><a href="shop.html">Polo Short Sleeve</a></li>
                                                <li><a href="shop.html">Graphic T-Shirts</a></li>
                                                <li><a href="shop.html">Jackets & Coats</a></li>
                                                <li><a href="shop.html">Fashion Jackets</a></li>
                                            </ul>
                                        </li>

                                        <li class="mega-menu-item"><a href="shop-left-full-wide.html"
                                                                      class="mega-item-title">Life Style</a>
                                            <ul>
                                                <li><a href="shop.html">Crochet</a></li>
                                                <li><a href="shop.html">Sleeveless</a></li>
                                                <li><a href="shop.html">Stripes</a></li>
                                                <li><a href="shop.html">Sweaters</a></li>
                                                <li><a href="shop.html">Hoodies</a></li>
                                            </ul>
                                        </li>

                                        <li class="mega-menu-item"><a href="shop-left-full-wide.html"
                                                                      class="mega-item-title">Shoes</a>
                                            <ul>
                                                <li><a href="shop.html">Tops & Tees</a></li>
                                                <li><a href="shop.html">Polo Short Sleeve</a></li>
                                                <li><a href="shop.html">Graphic T-Shirts</a></li>
                                                <li><a href="shop.html">Jackets & Coats</a></li>
                                                <li><a href="shop.html">Fashion Jackets</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="dropdown-show"><a href="#">Blog</a>
                                    <ul class="dropdown-nav">
                                        <li><a href="blog.html">Blog Right Sidebar</a></li>
                                        <li><a href="blog-left-sidebar.html">Blog Left Sidebar</a></li>
                                        <li><a href="blog-grid.html">Blog Grid Layout</a></li>
                                        <li><a href="single-blog.html">Blog Details</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact.html">Contact Us</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- Navigation Area End -->

                <!-- Header Right Meta Start -->
                <div class="col-6 col-lg-2 m-auto">
                    <div class="header-right-meta text-right">
                        <ul>
                            <li><a href="#" class="modal-active"><i class="fa fa-search"></i></a></li>
                            <li class="settings"><a href="#"><i class="fa fa-cog"></i></a>
                                <div class="site-settings d-block d-sm-flex">
                                    <dl class="currency">
                                        <dt>Currency</dt>
                                        <dd class="current"><a href="#">USD</a></dd>
                                        <dd><a href="#">AUD</a></dd>
                                        <dd><a href="#">CAD</a></dd>
                                        <dd><a href="#">BDT</a></dd>
                                    </dl>

                                    <dl class="my-account">
                                        <dt>My Account</dt>
                                        <dd><a href="#">Dashboard</a></dd>
                                        <dd><a href="#">Profile</a></dd>
                                        <dd><a href="#">Sign</a></dd>
                                    </dl>

                                    <dl class="language">
                                        <dt>Language</dt>
                                        <dd class="current"><a href="#">English (US)</a></dd>
                                        <dd><a href="#">English (UK)</a></dd>
                                        <dd><a href="#">Chinees</a></dd>
                                        <dd><a href="#">Bengali</a></dd>
                                        <dd><a href="#">Hindi</a></dd>
                                        <dd><a href="#">Japanees</a></dd>
                                    </dl>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Header Right Meta End -->
            </div>
        </div>
    </header>
    <!--== Header Area End ==-->

    <!--== Search Box Area Start ==-->
    <div class="body-popup-modal-area">
        <span class="modal-close"><img src="assets/img/cancel.png" alt="Close" class="img-fluid"/></span>
        <div class="modal-container d-flex">
            <div class="search-box-area">
                <div class="search-box-form">
                    <form action="#" method="post">
                        <input type="search" placeholder="type keyword and hit enter"/>
                        <button class="btn" type="button"><i class="fa fa-search"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--== Search Box Area End ==-->
    <!--== Page Title Area Start ==-->
    <div id="page-title-area">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="page-title-content">
                        <h1>Member Area</h1>
                        <ul class="breadcrumb">
                            <li><a href="index.html">Home</a></li>
                            <li><a href="login-register.html" class="active">Login & Register</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--== Page Title Area End ==-->

    <!--== Page Content Wrapper Start ==-->
    <div id="page-content-wrapper" class="p-9">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 m-auto">
                    <!-- Login & Register Content Start -->
                    <div class="login-register-wrapper">
                        <!-- Login & Register tab Menu -->
                        <nav class="nav login-reg-tab-menu">
                            <a class="active" id="login-tab" data-toggle="tab" href="#login">Login</a>
                            <a id="register-tab" data-toggle="tab" href="#register">Register</a>
                        </nav>
                        <!-- Login & Register tab Menu -->
                        <div class="tab-content" id="login-reg-tabcontent">
                            <div class="tab-pane fade show active" id="login" role="tabpanel">
                                <div class="login-reg-form-wrap">
                                    <form action="login-register.php" method="post" id="form-login" >
                                        <div class="single-input-item">
                                            <input id="login-username" type="text" name="userName" placeholder="Enter Username" required/>
                                        </div>
                                        <div class="single-input-item">
                                            <input id="login-password" type="password" name ="passWord"placeholder="Enter your Password" required />
                                        </div>
                                        <div class="single-input-item">
                                            <div class="login-reg-form-meta d-flex align-items-center justify-content-between">
                                                <div class="remember-meta">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="rememberMe">
                                                        <label class="custom-control-label" for="rememberMe">Remember
                                                            Me</label>
                                                    </div>
                                                </div>
                                                <a href="#" class="forget-pwd">Forget Password?</a>
                                            </div>
                                        </div>

                                        <div class="single-input-item">
                                            <input type="submit" name="login-submit" class="btn-login" value="Login">
                                            <!--                                        <button class="btn-login">Login</button>-->
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="register" role="tabpanel">
                                <div class="login-reg-form-wrap">
                                    <form  action="login-register.php" method="post"  id="form-register" onsubmit="return checkForm()">
                                        <div class="single-input-item">
                                            <input id="userName" name="userName" type="text" placeholder="User Name" required>
                                            <div id="error_username"></div>
                                        </div>
                                        <div class="single-input-item">
                                            <input id="fullName" name="fullName" type="text" placeholder="Full Name" required/>
                                            <div id="error_fullname"></div>
                                        </div>
                                        <div class="single-input-item">
                                            <input id="eMail" name="eMail" type="email" placeholder="Enter Your Email" required/>
                                            <div id="error_email"></div>
                                        </div>

                                        <div class="single-input-item">
                                            <input id="phoneNumber" name="phoneNumber" type="text" placeholder="Phone Number" required>
                                            <div id="error_phonenumber"></div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="single-input-item">
                                                    <input id="passWord" name="passWord" type="password" placeholder="Enter Your Password" required/>
                                                    <div id="error_password"></div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="single-input-item">
                                                    <input  type="password" name="re-passWord" placeholder="Repeat Your Password" required/>
                                                </div>
                                            </div>
                                        </div>

                                        <!--                                    <div class="single-input-item">-->
                                        <!--                                        <div class="login-reg-form-meta">-->
                                        <!--                                            <div class="remember-meta">-->
                                        <!--                                                <div class="custom-control custom-checkbox">-->
                                        <!--                                                    <input type="checkbox" class="custom-control-input"-->
                                        <!--                                                           id="subnewsletter">-->
                                        <!--                                                    <label class="custom-control-label" for="subnewsletter">Subscribe-->
                                        <!--                                                        Our Newsletter</label>-->
                                        <!--                                                </div>-->
                                        <!--                                            </div>-->
                                        <!--                                        </div>-->
                                        <!--                                    </div>-->

                                        <div class="single-input-item">
                                            <input type="submit" name="register-submit" class="btn-login" value="Register">
                                            <!--                                        <button class="btn-login">Register</button>-->
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Login & Register Content End -->
                </div>
            </div>
        </div>
    </div>
    <!--== Page Content Wrapper End ==-->

    <!-- Footer Area Start -->
    <footer id="footer-area">
        <!-- Footer Call to Action Start -->
        <div class="footer-callto-action">
            <div class="ruby-container">
                <div class="callto-action-wrapper">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <!-- Single Call-to Action Start -->
                            <div class="single-callto-action d-flex">
                                <figure class="callto-thumb">
                                    <img src="assets/img/air-plane.png" alt="WorldWide Shipping"/>
                                </figure>
                                <div class="callto-info">
                                    <h2>Free Shipping Worldwide</h2>
                                    <p>On order over $150 - 7 days a week</p>
                                </div>
                            </div>
                            <!-- Single Call-to Action End -->
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <!-- Single Call-to Action Start -->
                            <div class="single-callto-action d-flex">
                                <figure class="callto-thumb">
                                    <img src="assets/img/support.png" alt="Support"/>
                                </figure>
                                <div class="callto-info">
                                    <h2>24/7 CUSTOMER SERVICE</h2>
                                    <p>Call us 24/7 at 000 - 123 - 456k</p>
                                </div>
                            </div>
                            <!-- Single Call-to Action End -->
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <!-- Single Call-to Action Start -->
                            <div class="single-callto-action d-flex">
                                <figure class="callto-thumb">
                                    <img src="assets/img/money-back.png" alt="Money Back"/>
                                </figure>
                                <div class="callto-info">
                                    <h2>MONEY BACK Guarantee!</h2>
                                    <p>Send within 30 days</p>
                                </div>
                            </div>
                            <!-- Single Call-to Action End -->
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <!-- Single Call-to Action Start -->
                            <div class="single-callto-action d-flex">
                                <figure class="callto-thumb">
                                    <img src="assets/img/cog.png" alt="Guide"/>
                                </figure>
                                <div class="callto-info">
                                    <h2>SHOPPING GUIDE</h2>
                                    <p>Quis Eum Iure Reprehenderit</p>
                                </div>
                            </div>
                            <!-- Single Call-to Action End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Call to Action End -->

        <!-- Footer Follow Up Area Start -->
        <div class="footer-followup-area">
            <div class="ruby-container">
                <div class="followup-wrapper">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <div class="follow-content-wrap">
                                <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="logo"/></a>
                                <p>Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum</p>

                                <div class="footer-social-icons">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-flickr"></i></a>
                                </div>

                                <a href="#"><img src="assets/img/payment.png" alt="Payment Method"/></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Follow Up Area End -->

        <!-- Footer Image Gallery Area Start -->
        <div class="footer-image-gallery">
            <div class="ruby-container">
                <div class="image-gallery-wrapper">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="imgage-gallery-carousel owl-carousel">
                                <div class="gallery-item">
                                    <a href="#"><img src="assets/img/gallery-img-1.jpg" alt="Gallery"/></a>
                                </div>
                                <div class="gallery-item">
                                    <a href="#"><img src="assets/img/gallery-img-2.jpg" alt="Gallery"/></a>
                                </div>
                                <div class="gallery-item">
                                    <a href="#"><img src="assets/img/gallery-img-3.jpg" alt="Gallery"/></a>
                                </div>
                                <div class="gallery-item">
                                    <a href="#"><img src="assets/img/gallery-img-4.jpg" alt="Gallery"/></a>
                                </div>
                                <div class="gallery-item">
                                    <a href="#"><img src="assets/img/gallery-img-3.jpg" alt="Gallery"/></a>
                                </div>
                                <div class="gallery-item">
                                    <a href="#"><img src="assets/img/gallery-img-2.jpg" alt="Gallery"/></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Image Gallery Area End -->

        <!-- Copyright Area Start -->
        <div class="copyright-area">
            <div class="ruby-container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="copyright-text">
                            <p><a target="_blank" href="https://www.templateshub.net">Templates Hub</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Copyright Area End -->

    </footer>
    <!-- Footer Area End -->

    <!-- Scroll to Top Start -->
    <a href="#" class="scrolltotop"><i class="fa fa-angle-up"></i></a>
    <!-- Scroll to Top End -->


    <!--=======================Javascript============================-->

    <script>

        var register = document.getElementById("register");
        register.scrollIntoView();
        
        function checkForm(){
            var userName = document.getElementById('userName').value;
            var fullName = document.getElementById('fullName').value;
            var eMail = document.getElementById('eMail').value;
            var phoneNum = document.getElementById('phoneNumber').value;
            var passWord =  document.getElementById('passWord').value;
            var regExPhoneNum = /^(0|84)(2(0[3-9]|1[0-6|8|9]|2[0-2|5-9]|3[2-9]|4[0-9]|5[1|2|4-9]|6[0-3|9]|7[0-7]|8[0-9]|9[0-4|6|7|9])|3[2-9]|5[5|6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])([0-9]{7})$\b/;
            var regExEmail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
            var flag = true;

            if(userName.length < 5 ){
                document.getElementById('error_username').innerText= 'User Name must be at least 5 characters '
                document.getElementById('error_username').style.color = "red"
                document.getElementById('error_username').style.display = "block"

                flag = false
            }else
                document.getElementById('error_username').style.display = "none"
            console.log(flag)


            if(fullName.length < 5){
                document.getElementById('error_fullname').innerText= 'Full Name must be at least 5 characters'
                document.getElementById('error_fullname').style.color = 'red'
                document.getElementById('error_fullname').style.display= 'block'
                flag = false
            }
            else {
                document.getElementById('error_fullname').style.display = "none"
            }
            if(!regExEmail.test(eMail)){
                document.getElementById('error_email').innerText = 'Please enter valid email'
                document.getElementById('error_email').style.color ="red"
                document.getElementById('error_email').style.display = 'block'
                flag = false
            }
            else {
                document.getElementById('error_email').style.display = "none"
            }
            if(!regExPhoneNum.test(phoneNum)){
                document.getElementById('error_phonenumber').innerText = 'Please enter valid phone number'
                document.getElementById('error_phonenumber').style.color ='red'
                document.getElementById('error_phonenumber').style.display = 'block'
                flag = false
            }
            else {
                document.getElementById('error_phonenumber').style.display = "none"
            }
            if(phoneNum.length > 11 || phoneNum.length < 10){
                document.getElementById('error_phonenumber').innerText='Phone number must be at least 10 and maximum 11 number';
                document.getElementById('error_phonenumber').style.color='red'
                document.getElementById('error_phonenumber').style.display = 'block'
                flag = false
            }
            else{
                document.getElementById('error_phonenumber').style.display = "none"}



            if(passWord.length < 8){
                document.getElementById('error_password').innerText =' Password must be at least 8 character';
                document.getElementById('error_password').style.color = 'red'
                flag =false
            }
            else{
                document.getElementById('error_password').style.display = "none"}
            <?php
            $checkSql = "select * from khachhang";
            $result = executeQuery($checkSql);
            if($result->num_rows > 0)
            {
                while($row = $result->fetch_array()) {
                    echo 'if(' . "'". $row['taikhoankh'] . "'"." == userName){";
                    echo "document.getElementById('error_username').innerText= 'Username exist. Try another username!!!';";
                    echo 'document.getElementById("error_username").style.display = "block";';
                    
                    echo 'document.getElementById("error_username").style.color = "red";';
                    echo 'flag = false;';
                    echo '}';
                }
            }
            ?>
            return flag
        }
    </script>
    <!--=== Jquery Min Js ===-->
    <script src="assets/js/vendor/jquery-3.3.1.min.js"></script>
    <!--=== Jquery Migrate Min Js ===-->
    <script src="assets/js/vendor/jquery-migrate-1.4.1.min.js"></script>
    <!--=== Popper Min Js ===-->
    <script src="assets/js/vendor/popper.min.js"></script>
    <!--=== Bootstrap Min Js ===-->
    <script src="assets/js/vendor/bootstrap.min.js"></script>
    <!--=== Plugins Min Js ===-->
    <script src="assets/js/plugins.js"></script>