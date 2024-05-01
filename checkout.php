<?php
    session_start();
    require 'lib/lib.php';
    var_dump( $_SESSION['cart']);
    if(!isset($_SESSION['cart']) || empty($_SESSION['cart']))
    {
        header('Location:cart.php');
    }
    if(!isLogin())
    {
        header('Location:login-register.php');
    }else
    {
        $sql = "SELECT * FROM khachhang WHERE taikhoankh = '".$_SESSION['userName']."'";
        $result = executeQuery($sql);
        $user = $result->fetch_array();
    }
    
    if(isset($_POST['orderbtn'])){
        $sql1 = "SELECT * FROM hoadon";
        $result = executeQuery($sql1);
        $ID = "BILL";
        
        if(isset($_POST['total']))
        
        if($result->num_rows > 0){
            $j = 1;
            $flag = false;
            while($flag == false){
                $flag = true;
                $result = executeQuery($sql1);
                
                while($row = $result->fetch_array())
                {
                    $temp = $ID . $j;
                    if( "$temp"== "$row[idhoadon]")
                    {
                        
                        $flag = false;
                        break;
                    }
                }
                if($flag == true)
                    break;
                $j++;
            }
            $ID = $ID . $j;
        }else
            $ID = "BILL1";
        if($_POST['addressSelect'] == "Myaddress"){
            if(isset($_POST['total']) && isset($_POST['paymentmethod'])){
                $total = $_POST['total'];
                $pttt  = $_POST['paymentmethod'];
                $sql1 = "INSERT INTO `hoadon`(idhoadon, taikhoankh, hoten, sodienthoai, sonha, tentp, tenquan, tenphuong, ngaymua, phuongthucthanhtoan, trangthai, tongtien)".
                    " VALUES('$ID', "."'".$_SESSION['userName']."', "."'$user[hoten]','$user[sodienthoai]', '$user[sonha]', '$user[tentp]', '$user[tenquan]', '$user[tenphuong]', CURRENT_DATE(), $pttt, 1, $total)";
                echo $sql1;
                executeQuery($sql1);
            }
           
            
        }
        else {
            if(isset($_POST['fullname']) && isset($_POST['phone']) && isset($_POST['city']) && isset($_POST['district']) && isset($_POST['ward']) && isset($_POST['address']) && isset($_POST['total']) && isset($_POST['paymentmethod']) ){
                $fullname = $_POST['fullname'];
                $phone = $_POST['phone'];
                $city = $_POST['city'];
                $district = $_POST['district'];
                $ward = $_POST['ward'];
                $address = $_POST['address'];
                $total = $_POST['total'];
                $paymentmethod = $_POST['paymentmethod'];
                $sql1 = "INSERT INTO `hoadon`(idhoadon, taikhoankh, hoten, sodienthoai, sonha, tentp, tenquan, tenphuong, ngaymua, phuongthucthanhtoan, trangthai, tongtien)".
                    " VALUES('$ID', "."'".$_SESSION['userName']."'".",'$fullname','$phone', '$address', '$city', '$district', '$ward', CURRENT_DATE(), $paymentmethod, 1, $total)";
                echo $sql1;
                
                executeQuery($sql1);
                
            }
        
        }
        for($i = 0; $i < count($_SESSION['cart']); $i++)
        {
            $sql = "SELECT * FROM sanpham WHERE idsanpham = '".$_SESSION['cart'][$i][0]."'";
            $result = executeQuery($sql);;
            $product = $result->fetch_array();
            $idproduct = $_SESSION['cart'][$i][0];
            $quantity = $_SESSION['cart'][$i][1];
            $price = $product['dongia'];
            $sql = "INSERT INTO `chitiethoadon`(idhoadon,idsanpham,soluong,dongia) VALUES".
                "('$ID', '$idproduct', $quantity, $price)";
            executeQuery($sql);
        }
        array_splice($_SESSION['cart'], 0, count($_SESSION['cart']));
        header('Location:index.php');
    }
    

    
    
    ?>
<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="meta description">

    <title>Checkout :: DNX - Jewelry Store e-Commerce Bootstrap 4 Template</title>

    <!--=== Favicon ===-->
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon"/>

    <!--== Google Fonts ==-->
    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Droid+Serif:400,400i,700,700i"/>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700"/>
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
                    <h1>Checkout</h1>
                    <ul class="breadcrumb">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="shop-left-full-wide.html">Shop</a></li>
                        <li><a href="#" class="active">Checkout</a></li>
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
        <!--== Checkout Page Content Area ==-->
        <div class="row">
            <div class="col-12">
                <!-- Checkout Login Coupon Accordion Start -->
               
                <!-- Checkout Login Coupon Accordion End -->
            </div>
        </div>
        <form action="checkout.php" method="post">
        <div class="row">
            <!-- Checkout Billing Details -->
            <div class="col-lg-6">
                <div class="checkout-billing-details-wrap">
                    <h2>Billing Details</h2>
                    <div class="billing-form-wrap">
                       

                            <div class="single-input-item">
                                <label for="country_2" class="required">address</label>
                                <select name="addressSelect" id="address" onchange="setaddress()">
                                    <option value="Myaddress">My address:</option>
                                    <option value="NewAdddress">New Adddess</option>
                                </select>
                            </div>

                            <div class="ship-to-different single-form-row show" id="myadd" style="display: block" >
                                <h2>Receiver: <?php echo $user['hoten'];?></h2>
                                <p style="font-size: 1.9rem"><strong>Phone:</strong> <?php echo $user['sodienthoai'];?></p>
                                <p style="font-size: 1.9rem"><strong>Address:</strong> <?php echo $user['sonha'].", ".$user['tenphuong'].", ".$user['tenquan'].", ".$user['tentp'];?></p>



                            </div>

                            <div class="checkout-box-wrap">
                               
                                <div class="ship-to-different single-form-row " id="newadd">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="single-input-item">
                                                <label for="f_name_2" class="required">Fullname</label>
                                                <input name="fullname" type="text" id="f_name_2" placeholder="Fullname"/>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="single-input-item">
                                                <label for="l_name_2" class="required">Phone</label>
                                                <input name="phone" type="text" id="l_name_2" placeholder="Phone"/>
                                            </div>
                                        </div>
                                    </div>
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
                                            <option value="Ward 3">Ward 3</option>
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

                                    <div class="single-input-item">
                                        <label for="f_name_2" class="required">Address</label>
                                        <input name="address" type="text" id="address" placeholder="Address"/>
                                    </div>

                                  


                                  

                                    
                                </div>
                            </div>

                           
                    </div>
                </div>
            </div>

            <!-- Order Summary Details -->
            <div class="col-lg-6 mt-5 mt-lg-0">
                <div class="order-summary-details">
                    <h2>Your Order Summary</h2>
                    <div class="order-summary-content">
                        <!-- Order Summary Table -->
                        <div class="order-summary-table table-responsive text-center">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Products</th>
                                    <th>Total</th>
                                </tr>
                                </thead>

                                <tbody>
                                
                                <?php
                                    $total = 0;
                                    for($i = 0; $i < count($_SESSION['cart']); $i++) {
                                        
                                        $sql = "SELECT * FROM sanpham WHERE idsanpham = '".$_SESSION['cart'][$i][0]."'";
                                        $result = executeQuery($sql);
                                        $row = $result->fetch_array();
                                        echo '<tr>';
                                        echo '<td><a href="single-product.php?id='.$row['idsanpham'].'">'.$row['tensp'].' <strong> × '.$_SESSION['cart'][$i][1].'</strong></a></td>';
                                        echo '<td>$'.$row['dongia'].'</td>';
                                        echo '</tr>';
                                        $total += $row['dongia'];
                                    }
                                    echo '<input type="hidden" name="total" value="'.$total.'">';
                                ?>
                                </tbody>
                                <tfoot>
                                
                                <tr>
                                    <td>Total Amount</td>
                                    <td><strong>$ <?php echo $total ?></strong></td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>

                        <!-- Order Payment Method -->
                        <div class="order-payment-method">
                            <div class="single-payment-method show">
                                <div class="payment-method-name">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="cashon" name="paymentmethod" value="1"
                                               class="custom-control-input" checked/>
                                        <label class="custom-control-label" for="cashon">Cash On Delivery</label>
                                    </div>
                                </div>
                                <div class="payment-method-details" data-method="cash">
                                    <p>Pay with cash upon delivery.</p>
                                </div>
                            </div>

                            <div class="single-payment-method">
                                <div class="payment-method-name">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="directbank" name="paymentmethod" value="0"
                                               class="custom-control-input"/>
                                        <label class="custom-control-label" for="directbank">Direct Bank
                                            Transfer</label>
                                    </div>
                                </div>
                                <div class="payment-method-details" data-method="bank">
                                    <p>Make your payment directly into our bank account. Please use your Order ID as the
                                        payment reference. Your order will not be shipped until the funds have cleared
                                        in our account.</p>
                                </div>
                            </div>

                            

                            <div class="summary-footer-area">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="terms" required/>
                                    <label class="custom-control-label" for="terms">I have read and agree to the website
                                        <a
                                                href="index.html">terms and conditions.</a></label>
                                </div>

                                <button type="submit" name="orderbtn" value="order" class="btn-add-to-cart"> Place Order</button>
                            </div>
                       

                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
        <!--== Checkout Page Content End ==-->
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
    
    function setaddress(){
        if(document.getElementById("address").value == 'Myaddress')
        {
            document.getElementById('myadd').style.display = "block";
            document.getElementById('newadd').style.display = "none";
            document.getElementById('myadd').classList.add("show");
            document.getElementById('newadd').classList.remove("show");

        }else
        {
            document.getElementById('myadd').style.display = "none";
            document.getElementById('newadd').style.display = "block";
            document.getElementById('myadd').classList.remove("show");
            document.getElementById('newadd').classList.add("show");
        }
    }
    
    
    
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