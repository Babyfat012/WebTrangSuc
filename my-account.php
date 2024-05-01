
<?php
session_start();
require 'lib/lib.php';
?>
<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="meta description">

    <title>Dashboard :: DNX - Jewelry Store e-Commerce Bootstrap 4 Template</title>

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
                        <li class="shop-cart"><a href="#"><i class="fa fa-shopping-bag"></i> <span
                                class="count">3</span></a>
                            <div class="mini-cart">
                                <div class="mini-cart-body">
                                    <div class="single-cart-item d-flex">
                                        <figure class="product-thumb">
                                            <a href="#"><img class="img-fluid" src="assets/img/product-1.jpg"
                                                             alt="Products"/></a>
                                        </figure>

                                        <div class="product-details">
                                            <h2><a href="#">Sprite Yoga Companion</a></h2>
                                            <div class="cal d-flex align-items-center">
                                                <span class="quantity">3</span>
                                                <span class="multiplication">X</span>
                                                <span class="price">$77.00</span>
                                            </div>
                                        </div>
                                        <a href="#" class="remove-icon"><i class="fa fa-trash-o"></i></a>
                                    </div>
                                    <div class="single-cart-item d-flex">
                                        <figure class="product-thumb">
                                            <a href="#"><img class="img-fluid" src="assets/img/product-2.jpg"
                                                             alt="Products"/></a>
                                        </figure>
                                        <div class="product-details">
                                            <h2><a href="#">Yoga Companion Kit</a></h2>
                                            <div class="cal d-flex align-items-center">
                                                <span class="quantity">2</span>
                                                <span class="multiplication">X</span>
                                                <span class="price">$6.00</span>
                                            </div>
                                        </div>
                                        <a href="#" class="remove-icon"><i class="fa fa-trash-o"></i></a>
                                    </div>
                                    <div class="single-cart-item d-flex">
                                        <figure class="product-thumb">
                                            <a href="#"><img class="img-fluid" src="assets/img/product-3.jpg"
                                                             alt="Products"/></a>
                                        </figure>
                                        <div class="product-details">
                                            <h2><a href="#">Sprite Yoga Companion Kit</a></h2>
                                            <div class="cal d-flex align-items-center">
                                                <span class="quantity">1</span>
                                                <span class="multiplication">X</span>
                                                <span class="price">$116.00</span>
                                            </div>
                                        </div>
                                        <a href="#" class="remove-icon"><i class="fa fa-trash-o"></i></a>
                                    </div>
                                </div>
                                <div class="mini-cart-footer">
                                    <a href="checkout.html" class="btn-add-to-cart">Checkout</a>
                                </div>
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
                    <h1>Dashboard</h1>
                    <ul class="breadcrumb">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="login-register.html" class="active">Dashboard</a></li>
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
            <div class="col-lg-12">
                <!-- My Account Page Start -->
                <div class="myaccount-page-wrapper">
                    <!-- My Account Tab Menu Start -->
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="myaccount-tab-menu nav" role="tablist">
                                <a href="#account-info" data-toggle="tab" id="info" class="active"><i class="fa fa-user"></i> Account Details</a>

                                <a href="#orders" data-toggle="tab" id="ord"><i class="fa fa-cart-arrow-down"></i> Orders</a>

                               

                                <a href="#address" data-toggle="tab" id="addr"><i class="fa fa-map-marker"></i> Password</a>

                              

                                <a href="login-register.html"><i class="fa fa-sign-out"></i> Logout</a>
                            </div>
                        </div>
                        <!-- My Account Tab Menu End -->

                        <!-- My Account Tab Content Start -->
                        <div class="col-lg-9 mt-5 mt-lg-0">
                            <div class="tab-content" id="myaccountContent">
                                <!-- Single Tab Content Start -->
                                
                                <!-- Single Tab Content End -->

                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade" id="orders" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3>Orders</h3>

                                        <div class="myaccount-table table-responsive text-center">
                                            <?php
                                                
                                                $sql = "SELECT * FROM hoadon WHERE taikhoankh = '".$_SESSION['userName']."'";
                                                $result = executeQuery($sql);
                                                if($result->num_rows > 0){
                                                    while($row = $result->fetch_assoc()){
                                                        echo '<table class="table table-bordered">';
                                                        echo ' <thead class="thead-light">';
                                                        echo '<tr>';
                                                        echo '<th>Order</th>
                                                              <th>Date</th>
                                                              <th>Status</th>
                                                              <th>Total</th>
                                                              <th>Action</th>';
                                                        echo '</tr>';
                                                        echo '</thead>';
                                                        echo '<tbody>';
                                                        echo '<thead>';
                                                        echo '<tr>';
                                                        echo '<th>'.$row['idhoadon'].'</th>';
                                                        echo '<th>'.$row['ngaymua'].'</th>';
                                                        switch($row['trangthai'])
                                                        {
                                                            case 0: echo '<th>Confirm</th>';
                                                            break;
                                                            case 1: echo '<th>Complete</th>';
                                                            break;
                                                            case -1: echo '<th>Cancel</th>';
                                                        }
                                                        echo '<th>'.$row['tongtien'].'</th>';
                                                        echo '<th><a href="cart.html" class="btn-add-to-cart">View</a></th>';
                                                        echo '</tr>';
                                                        echo '</thead>';
                                                        $sql1 = "SELECT CT.idsanpham, CT.dongia, .CT.soluong, SP.hinhanh, SP.tensp, SP.maloaisp FROM chitiethoadon CT, sanpham SP WHERE idhoadon ='". "$row[idhoadon]' AND CT.idsanpham = SP.idsanpham";
                                                        echo $sql1;
                                                        $result1 = executeQuery($sql1);
                                                        if($result1->num_rows > 0){
                                                            while($row1 = $result1->fetch_array()){
                                                                echo '<tr>';
                                                                echo '<td style="width: 20%" class="pro-thumbnail"><a href="single-product.php?id='.$row1['idsanpham'].'"><img'.'>';
                                                                switch($row1['maloaisp'])
                                                                {
                                                                    case 'NKL':
                                                                        echo ' <img class="img-fluid" src="assets/img/Necklace/'.$row1['hinhanh'].'"
                                                                                               alt="Product"/></a></td>';
                                                                        $type = "Necklace";
                                                                        break;
                                                                    case 'BRL':
                                                                        echo ' <img class="img-fluid" src="assets/img/Bracelet/'.$row1['hinhanh'].'"
                                                                                               alt="Product"/></a></td>';
                                                                        $type = "Bracelet";
                                                                        
                                                                        break;
                                                                    case 'RG':
                                                                        echo ' <img class="img-fluid" src="assets/img/Ring/'.$row1['hinhanh'].'"
                                                                                               alt="Product"/></a></td>';
                                                                        $type = "Ring";
                                                                        
                                                                        break;
                                                                }
                                                                echo '<td  colspan="4">';
                                                                echo '<a href="single-product.php?id='.$row1['idsanpham'].'"><h4>'.$row1['tensp'].'</h4></a>';
                                                                echo '<hr>';
                                                                echo '<p style="text-align: left; font-weight: 700">Type:'.$type.'</p>
                                                        <p style="text-align: left; font-weight: 700">Price:'.$row1['dongia'].'</p>
                                                        <p style="text-align: left; font-weight: 700">Quantity: '.$row1['soluong'][0].'</p>';
                                                                echo '</td>';
                                                                echo '</tr>';
                                                            }
                                                        }
                                                        echo '</tbody>';
                                                        echo '</table>';
                                                        
                                                       
                                                        
                                                    }
                                                }
                                            ?>
                                            
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Tab Content End -->

                                <!-- Single Tab Content Start -->
                               
                                <!-- Single Tab Content End -->

                                <!-- Single Tab Content Start -->
                               
                                <!-- Single Tab Content End -->

                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade" id="address" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3>Change password</h3>

                                        <div class="account-details-form">
                                            <form action="#">

                                                <fieldset>
                                                    <legend>Password change</legend>
                                                    <div class="single-input-item">
                                                        <label for="current-pwd" class="required">Current
                                                            Password</label>
                                                        <input type="password" id="current-pwd"
                                                               placeholder="Current Password"/>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="single-input-item">
                                                                <label for="new-pwd" class="required">New
                                                                    Password</label>
                                                                <input type="password" id="new-pwd"
                                                                       placeholder="New Password"/>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <div class="single-input-item">
                                                                <label for="confirm-pwd" class="required">Confirm
                                                                    Password</label>
                                                                <input type="password" id="confirm-pwd"
                                                                       placeholder="Confirm Password"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>

                                                <div class="single-input-item">
                                                    <button class="btn-login btn-add-to-cart">Save Changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Tab Content End -->
                                <?php
                                    $sql = "SELECT * FROM khachhang WHERE taikhoankh = '".$_SESSION['userName']."'";
                                    
                                    $result = executeQuery($sql);
                                    if($result->num_rows > 0){
                                        $customer = $result->fetch_array();
                                    }
                                    
                                ?>
                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade show active" id="account-info" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3>Account Details</h3>

                                        <div class="account-details-form">
                                            <form action="#">
                                                <div class="single-input-item">
                                                    <label for="display-name" class="required">Username</label>
                                                    <h3>Sog1n123</h3>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="single-input-item">
                                                            <label for="first-name" class="required">Fullname</label>
                                                            <input type="text" id="first-name"
                                                                   placeholder="Fullname" value="<?php echo $customer['hoten'] ?>"/>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="single-input-item">
                                                            <label for="last-name" class="required">Phone</label>
                                                            <input type="text" id="last-name" value="<?php echo $customer['sodienthoai'] ?>" placeholder="Phone"/>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="single-input-item">
                                                    <label for="email" class="required">Email Addres</label>
                                                    <input type="email" id="email" placeholder="Email Address" value="<?php echo $customer['email'] ?>"/>
                                                </div>
                                                
                                                <fieldset>
                                                    <legend>Address</legend>
                                                    <div class="single-input-item">
                                                        <label for="city" class="required" >Province / City</label>
                                                        <select name="city" id="city" ">
                                                        <option value=""> Select a city</option>
                                                        <option value="Hồ Chí Minh">Hồ Chí Minh</option>
                                                        <option value="Hà Nội">Hà Nội</option>
                                                        <option value="Đà Nẵng">Đà Nẵng</option>
                                                        <option value="Hải Phòng">Hải Phòng</option>
                                                        </select>
                                                    </div>

                                                    <div class="single-input-item" id="districtform">
                                                        <label for="district" class="required" >District</label>
                                                        <select name="district" id="district" >
                                                            <option value="-1"> Select a District
                                                            </option>
                                                            <option value="District 1">District 1</option>
                                                            <option value="District 2">District 2</option>
                                                            <option value="District 3">District 3</option>
                                                            <option value="District 4">District 4</option>
                                                            <option value="District 5">District 5</option>
                                                            <option value="District 6">District 6</option>
                                                            <option value="District 7">District 7</option>
                                                            <option value="District 8">District 8</option>
                                                            <option value="District 9">District 9</option>
                                                            <option value="District 10">District 10</option>
                                                            <option value="District 11">District 11</option>
                                                            <option value="District 12">District 12</option>


                                                        </select>
                                                    </div>

                                                    <div class="single-input-item" id="wardform">
                                                        <label for="ward" class="required" >Ward</label>
                                                        <select name="ward" id="ward">
                                                            <option value=""> Select a Ward</option>
                                                            <option value="Ward 1">Ward 1</option>
                                                            <option value="Ward 2">Ward 2</option>
                                                            <option value="Ward 3" selected>Ward 3</option>
                                                            <option value="Ward 4">Ward 4</option>
                                                            <option value="Ward 5">Ward 5</option>
                                                            <option value="Ward 6">Ward 6</option>
                                                            <option value="Ward 7">Ward 7</option>
                                                            <option value="Ward 8">Ward 8</option>
                                                            <option value="Ward 9">Ward 9</option>
                                                            <option value="Ward 10">Ward 10</option>
                                                            <option value="Ward 11">Ward 11</option>
                                                            <option value="Ward 12">Ward 12</option>
                                                        </select>
                                                    </div>
                                                </fieldset>
                                                
                                               
                                                <div class="single-input-item">
                                                    <button class="btn-login btn-add-to-cart">Save Changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Tab Content End -->
                            </div>
                        </div>
                        <!-- My Account Tab Content End -->
                    </div>
                </div>
                <!-- My Account Page End -->
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

    <script>
        <?php
            if(isset($_GET['url'])) {
                switch($_GET['url']) {
                    case 'order':
                    {
        ?>
        document.getElementById("info").classList.remove("active")
        document.getElementById("ord").classList.add("active")
        document.getElementById("addr").classList.remove("active")
        document.getElementById("account-info").classList.remove("show")
        document.getElementById("account-info").classList.remove("active")
        document.getElementById("orders").classList.add("show")
        document.getElementById("orders").classList.add("active")
        document.getElementById("address").classList.remove("show")
        document.getElementById("address").classList.remove("active")


        <?php
                    break;
                    }
        case 'info':
            {
                ?>
        document.getElementById("info").classList.add("active")
        document.getElementById("ord").classList.remove("active")
        document.getElementById("addr").classList.remove("active")
        document.getElementById("account-info").classList.add("show")
        document.getElementById("account-info").classList.add("active")
        document.getElementById("orders").classList.remove("show")
        document.getElementById("orders").classList.remove("active")
        document.getElementById("address").classList.remove("show")
        document.getElementById("address").classList.remove("active")
            <?php
            break;
            }
            case 'address':
            {
                    ?>
        document.getElementById("info").classList.remove("active")
        document.getElementById("ord").classList.remove("active")
        document.getElementById("addr").classList.add("active")
        document.getElementById("account-info").classList.remove("show")
        document.getElementById("account-info").classList.remove("active")
        document.getElementById("orders").classList.remove("show")
        document.getElementById("orders").classList.remove("active")
        document.getElementById("address").classList.add("show")
        document.getElementById("address").classList.add("active")
                <?php
            break;
            }
                }
            }
        ?>
        
       
        
    </script>
<!--=======================Javascript============================-->
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

<!--=== Active Js ===-->
<script src="assets/js/active.js"></script>
</body>

</html>