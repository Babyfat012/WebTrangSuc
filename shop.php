<?php
    require "lib/DataProvider.php";
    $rowsPerPage = 6;
    $pageNum = 1;
    if(isset($_GET["page"])){
        $pageNum = $_GET["page"];
    }
    $offset = ($pageNum - 1) * $rowsPerPage;
    
    
?>
<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="meta description">

    <title>Shop :: DNX - Jewelry Store e-Commerce Bootstrap 4 Template</title>

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

                                        <li class="mega-menu-item"><a href="single-product.html"
                                                                      class="mega-item-title">Single
                                                Products</a>
                                            <ul>
                                                <li><a href="single-product.html">Single Product</a></li>
                                                <li><a href="single-product-normal.html">Single Product Normal</a></li>
                                                <li><a href="single-product-group.html">Single Product Group</a></li>
                                                <li><a href="single-product-external.html">Single Product External</a>
                                                </li>
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
                        <h1>Shop</h1>
                        <ul class="breadcrumb">
                            <li><a href="index.html">Home</a></li>
                            <li><a href="index.html" class="active">Shop</a></li>
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
                <!-- Sidebar Area Start -->
                <div class="col-lg-3 mt-5 mt-lg-0 order-last order-lg-first">
                    <div id="sidebar-area-wrap">
                        <!-- Single Sidebar Item Start -->
                        <div class="single-sidebar-wrap">
                            <h2 class="sidebar-title">Shop By</h2>
                            <div class="sidebar-body">
                                <div class="shopping-option">
                                    <h3>Shopping Options</h3>
                                    <form action="shop.php" method="get">
                                        <div class="shopping-option-item">
                                            <h4>Jewelry</h4>

                                            <ul class="sidebar-list">
                                                <li>
                                                    <input type="checkbox" value="NKL" name="NKL">
                                                    <label class="form-check-label" for="Necklace"
                                                           style="font-family: 'Droid Serif'; font-style: italic; color: #202020; font-size: 1.4rem">Necklace</label>
                                                </li>
                                                <?php
                                                    
                                                    $sql = "SELECT * FROM loaisanpham";
                                                    
                                                    $result = ExecuteQuery($sql);
                                                    if ($result->num_rows > 0) {
                                                        while ($row = $result->fetch_array()) {
                                                            $str =
                                                            $str = '<li><input type="checkbox" value="' . $row['malsp'] . '"name="' . $row['tenloaisp'] . '">';
                                                            $str = $str . '<label class="form-check-label" for="' . $row['tenloaisp'] . '" style="font-family:' . "'Droid Serif'" . '; font-style: italic; color: #202020; font-size: 1.4rem">' . $row['tenloaisp'] . '</label></li>';
                                                            echo $str;
                                                        }
                                                    }
                                                ?>

                                            </ul>
                                        </div>

                                        <div class="shopping-option-item">
                                            <h4>Gender</h4>
                                            <ul class="sidebar-list">
                                                <li>
                                                    <input type="checkbox" value="M" name="Men">
                                                    <label class="form-check-label" for="Necklace"
                                                           style="font-family: 'Droid Serif'; font-style: italic; color: #202020; font-size: 1.4rem">Men</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" value="F" name="Women">
                                                    <label class="form-check-label" for="Necklace"
                                                           style="font-family: 'Droid Serif'; font-style: italic; color: #202020; font-size: 1.4rem">Women</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" value="U" name="Unisex">
                                                    <label class="form-check-label" for="Necklace"
                                                           style="font-family: 'Droid Serif'; font-style: italic; color: #202020; font-size: 1.4rem">Unisex</label>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="shopping-option-item">
                                            <h4>Price</h4>

                                            <input type="number" id="min" name="min" min="1" style="width: 75px"
                                                   onchange="setMin()">
                                            <span>to</span>
                                            <input type="number" id="max" name="max" style="width: 75px">

                                        </div>

                                        <div class="shopping-option-item">
                                            <a><input  type="submit" value="Search" style="width: 200px; border-radius: 50px; background-color:white; border: 1px solid grey" ></a>
                                        </div>
                                        
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Single Sidebar Item End -->

                        <!-- Single Sidebar Item End -->
                    </div>
                </div>
                <!-- Sidebar Area End -->

                <!-- Shop Page Content Start -->
                <div class="col-lg-9">
                    <div class="shop-page-content-wrap">
                       

                        <div class="shop-page-products-wrap">
                            <div class="products-wrapper">
                                <div class="row">
                                    <?php
                                        $sql = "SELECT * FROM sanpham" .
                                            " LIMIT $offset, $rowsPerPage";
                                        $result = ExecuteQuery($sql);                                        if($result->num_rows > 0){
                                            while($row = $result->fetch_array()){
                                                echo '<div class="col-lg-4 col-sm-6">';
                                                echo'<div class="single-product-item text-center">';
                                                echo '<figure class="product-thumb">';
                                                switch ($row['maloaisp'])
                                                {
                                                    case 'BRL':
                                                        $str = '<a href="single-product.php?id='.$row['idsanpham'].'"><img src="assets/img/Bracelet/'.$row['hinhanh'].'"
                                                                                   alt="Products" class="img-fluid"></a>';
                                                        echo $str;
                                                        break;
                                                    case 'NKL':
                                                        $str = '<a href="single-product.php?id='.$row['idsanpham'].'"><img src="assets/img/Necklace/'.$row['hinhanh'].'"
                                                                                   alt="Products" class="img-fluid"></a>';
                                                        echo $str;
                                                        break;
                                                    case 'RG':
                                                        $str = '<a href="single-product.php?id='.$row['idsanpham'].'"><img src="assets/img/Ring/'.$row['hinhanh'].'"
                                                                                   alt="Products" class="img-fluid"></a>';
                                                        echo $str;
                                                        break;
                                                }
                                                echo '</figure>';
                                                echo '<div class="product-details">';
                                                echo '<h2><a href="single-product.php?id='.$row['idsanpham'].'">'.$row['tensp'].'</a></h2>';
                                                echo '<span class="price">'.$row['dongia'].'</span>';
                                                echo '<a href="single-product.html" class="btn btn-add-to-cart">+ Add to Cart</a>';
                                                echo ' </div></div>';
                                                echo '</div>';
                                            }
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="products-settings-option d-block d-md-flex">
                            <nav class="page-pagination">
                                <ul class="pagination">
                                    <?php
                                        $sql = "SELECT COUNT(*) AS numrows FROM sanpham";
                                        $result = ExecuteQuery($sql);
                                        $row = $result->fetch_array();
                                        $numrows = $row['numrows'];
                                        $maxPage = ceil($numrows / $rowsPerPage);
                                        $self = "shop.php";
                                        $nav = '';
                                        for($page = 1; $page <= $maxPage; $page++){
                                            if($page == $pageNum)
                                            {
                                                $nav = $nav. '<li><a class="current">'.$pageNum.'</a></li>';
                                            }
                                            else{
                                                $nav = $nav . ' <li><a href="shop.php?page='.$page.'">'.$page.'</a></li>';
                                            }
                                        }
                                        
                                        if($pageNum > 1){
                                            $page = $pageNum - 1;
                                            $prev = '<li><a href="shop.php?page='.$page.'" aria-label="Previous">&lt;</a></li>';
                                            $first = '<li><a href="shop.php?page=1" aria-label="Previous">&laquo;</a></li>';
                                        }else
                                        {
                                            $prev = '<li style="display: none"><a href="shop.php?page='.$page.'" aria-label="Previous">&lt;</a></li>';
                                            $first = '<li style="display: none;"><a href="shop.php?page=1" aria-label="Previous">&laquo;</a></li>';
                                        }
                                        
                                        if($pageNum < $maxPage){
                                            $page = $pageNum + 1;
                                            $next = '<li><a href="shop.php?page='.$page.'" aria-label="Next">&gt;</a></li>';
                                            $last = '<li><a href="shop.php?page='.$maxPage.'" aria-label="Next">&raquo;</a></li>';
                                        }else
                                        {
                                            $next = '';
                                            $last = '';
                                        }
                                        echo $first . $prev . $nav . $next . $last;
                                    
                                    
                                    ?>
                                </ul>
                            </nav>
                           

                           
                        </div>
                    </div>
                </div>
                <!-- Shop Page Content End -->
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

    <!-- Start All Modal Content -->
    <!--== Product Quick View Modal Area Wrap ==-->
    <div class="modal fade" id="quickView" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><img src="assets/img/cancel.png" alt="Close" class="img-fluid"/></span>
                </button>
                <div class="modal-body">
                    <div class="quick-view-content single-product-page-content">
                        <div class="row">
                            <!-- Product Thumbnail Start -->
                            <div class="col-lg-5 col-md-6">
                                <div class="product-thumbnail-wrap">
                                    <div class="product-thumb-carousel owl-carousel">
                                        <div class="single-thumb-item">
                                            <a href="single-product.html"><img class="img-fluid"
                                                                               src="assets/img/single-pro-thumb.jpg"
                                                                               alt="Product"/></a>
                                        </div>

                                        <div class="single-thumb-item">
                                            <a href="single-product.html"><img class="img-fluid"
                                                                               src="assets/img/single-pro-thumb-2.jpg"
                                                                               alt="Product"/></a>
                                        </div>

                                        <div class="single-thumb-item">
                                            <a href="single-product.html"><img class="img-fluid"
                                                                               src="assets/img/single-pro-thumb-3.jpg"
                                                                               alt="Product"/></a>
                                        </div>

                                        <div class="single-thumb-item">
                                            <a href="single-product.html"><img class="img-fluid"
                                                                               src="assets/img/single-pro-thumb-4.jpg"
                                                                               alt="Product"/></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Product Thumbnail End -->

                            <!-- Product Details Start -->
                            <div class="col-lg-7 col-md-6 mt-5 mt-md-0">
                                <div class="product-details">
                                    <h2><a href="single-product.html">Crown Summit Backpack</a></h2>

                                    <div class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>

                                    <span class="price">$52.00</span>

                                    <div class="product-info-stock-sku">
                                        <span class="product-stock-status">In Stock</span>
                                        <span class="product-sku-status ml-5"><strong>SKU</strong> MH03</span>
                                    </div>

                                    <p class="products-desc">Ideal for cold-weathered training worked lorem ipsum
                                        outdoors,
                                        the Chaz Hoodie promises superior warmth with every wear. Thick material blocks
                                        out
                                        the wind as ribbed cuffs and bottom band seal in body heat Lorem ipsum dolor sit
                                        amet, consectetur adipisicing elit. Enim, reprehenderit.</p>
                                    <div class="shopping-option-item">
                                        <h4>Color</h4>
                                        <ul class="color-option-select d-flex">
                                            <li class="color-item black">
                                                <div class="color-hvr">
                                                    <span class="color-fill"></span>
                                                    <span class="color-name">Black</span>
                                                </div>
                                            </li>

                                            <li class="color-item green">
                                                <div class="color-hvr">
                                                    <span class="color-fill"></span>
                                                    <span class="color-name">green</span>
                                                </div>
                                            </li>

                                            <li class="color-item orange">
                                                <div class="color-hvr">
                                                    <span class="color-fill"></span>
                                                    <span class="color-name">Orange</span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="product-quantity d-flex align-items-center">
                                        <div class="quantity-field">
                                            <label for="qty">Qty</label>
                                            <input type="number" id="qty" min="1" max="100" value="1"/>
                                        </div>

                                        <a href="cart.html" class="btn btn-add-to-cart">Add to Cart</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Product Details End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--== Product Quick View Modal Area End ==-->
    <!-- End All Modal Content -->

    <!-- Scroll to Top Start -->
    <a href="#" class="scrolltotop"><i class="fa fa-angle-up"></i></a>
    <!-- Scroll to Top End -->


    <!--=======================Javascript============================-->

    <script>
        function setMin() {
            var min = document.getElementById("min").value;
            document.getElementById("max").setAttribute("min", min);
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

    <!--=== Active Js ===-->
    <script src="assets/js/active.js"></script>
</body>

</html>