<?php
    session_start();
    if(!isset($_SESSION['cart'])){
        $_SESSION['cart'] = [];
    }
    require "lib/lib.php";
    
    if (isset($_GET['delProduct']) && isset($_GET['delProduct']) >= 0) {
        $index = $_GET['delProduct'];
        $sql1 = "SELECT * FROM sanpham WHERE idsanpham = '" . $_SESSION['cart'][$index][0] . "'";
        $result = executeQuery($sql1);
        $row = $result->fetch_array();
        
        $sql2 = "UPDATE sanpham SET soluong = " . ($row['soluong'] + $_SESSION['cart'][$index][1]) . " WHERE idsanpham = '" . $_SESSION['cart'][$index][0] . "'";
        executeQuery($sql2);
        array_splice($_SESSION['cart'], $_GET['delProduct'], 1);
        header('location:index.php');
    } ?>

<?php
    if(isset($_POST['addToCart']))
    {
        $id = $_POST['id'];
        $quantity = $_POST['quantity'];
        addToCart($id, $quantity);
        header('location: single-product.php?id='.$id);
        
    }
?>


<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="meta description">

    <title>DNX - Jewelry Store e-Commerce Bootstrap 4 Template</title>

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
    <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<!--== Header Area Start ==-->
    <?php
        include_once "Header.php";
    ?>
<!--== Header Area End ==-->

<!--== Search Box Area Start ==-->

<!--== Search Box Area End ==-->

<!--== Banner // Slider Area Start ==-->
<section id="banner-area">
    <div class="ruby-container">
        <div class="row">
            <div class="col-lg-12">
                <div id="banner-carousel" class="owl-carousel">
                    <!-- Banner Single Carousel Start -->
                    <div class="single-carousel-wrap slide-item-1">
                        <div class="banner-caption text-center text-lg-left">
                            <h4>Rubby Store</h4>
                            <h2>Ring Solitaire Princess</h2>
                            <p>Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.</p>
                            <a href="shop.php" class="btn-long-arrow">Shop Now</a>
                        </div>
                    </div>
                    <!-- Banner Single Carousel End -->

                    <!-- Banner Single Carousel Start -->
                    <div class="single-carousel-wrap slide-item-2">
                        <div class="banner-caption text-center text-lg-left">
                            <h4>New Collection 2017</h4>
                            <h2>Beautiful Earrings</h2>
                            <p>Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.</p>
                            <a href="shop.php" class="btn-long-arrow">Shop Now</a>
                        </div>
                    </div>
                    <!-- Banner Single Carousel End -->
                </div>
            </div>
        </div>
    </div>
</section>
<!--== Banner Slider End ==-->

<!--== About Us Area Start ==-->
<section id="aboutUs-area" class="pt-9">
    <div class="ruby-container">
        <div class="row">
            <div class="col-lg-6">
                <!-- About Image Area Start -->
                <div class="about-image-wrap">
                    <a href="#"><img src="assets/img/about-img.png" alt="About Us" class="img-fluid"/></a>
                </div>
                <!-- About Image Area End -->
            </div>

            <div class="col-lg-6 m-auto">
                <!-- About Text Area Start -->
                <div class="about-content-wrap ml-0 ml-lg-5 mt-5 mt-lg-0">
                    <h2>About Us</h2>
                    <h3>WE ARE VISIONARY</h3>
                    <div class="about-text">
                        <p>Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum
                            est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum
                            formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc
                            nobis videntur parum clari, fiant sollemnes in futurum.</p>

                        <p>Typi noni habented claritatem insitamed ested usused legentis in iis qui facit eorum
                            claritatem. Investigationes demonstraverunt lectores legere me lius quod ii loreem ipsum ius
                            delour legunt saepius.</p>

                        <a href="#" class="btn btn-long-arrow">Learn More</a>


                        <h4 class="vertical-text">WHO WE ARE?</h4>
                    </div>
                </div>
                <!-- About Text Area End -->
            </div>
        </div>
    </div>
</section>
<!--== About Us Area End ==-->

<!--== New Collection Area Start ==-->
<section id="new-collection-area" class="p-9">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <!-- Section Title Start -->
                <div class="section-title">
                    <h2>Collection Products</h2>
                    <p>Best products on sale.</p>
                </div>
                <!-- Section Title End -->
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="new-collection-tabs">

                    <!-- Tab Menu Area Start -->
                    <ul class="nav tab-menu-wrap" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="active" id="feature-products-tab" data-toggle="tab" href="#feature-products"
                               role="tab" aria-controls="feature-products-tab" aria-selected="true">Necklaces</a>
                        </li>
                        <li class="nav-item">
                            <a id="new-products-tab" data-toggle="tab" href="#new-products" role="tab"
                               aria-controls="new-products" aria-selected="false">Bracelets</a>
                        </li>
                        <li class="nav-item">
                            <a id="onsale-tab" data-toggle="tab" href="#onsale" role="tab" aria-controls="onsale"
                               aria-selected="false">Rings</a>
                        </li>
                    </ul>
                    <!-- Tab Menu Area End -->

                    <!-- Tab Content Area Start -->
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="feature-products" role="tabpanel"
                             aria-labelledby="feature-products-tab">
                            <div class="products-wrapper">
                                <div class="products-carousel owl-carousel">
                                    <!-- Single Product Item -->
                                    <?php
                                        $sql = "SELECT * FROM sanpham WHERE maloaisp like '%NKL%'";
                                        $result = executeQuery($sql);
                                        if($result->num_rows > 0){
                                            while($row = $result->fetch_array())
                                            {
                                                $str = '<div class="single-product-item text-center">' .
                                                    '<figure class="product-thumb">'.
                                                    '<a href="single-product.php?id=' . $row['idsanpham'].' "><img src="assets/img/Necklace/'. $row['hinhanh'] .'"'.
                                                    'alt="Products" class="img-fluid"></a>' .
                                                    ' </figure>' .
                                                    '<div class="product-details">' .
                                                    '<h2><a href="single-product.php?id='. $row['idsanpham'] .'">'. $row['tensp'] .'</a></h2>'.
                                                    '<span class="price">$' . number_format($row['dongia'],2,".","," ) . '</span>' .
                                                    '<form action="index" method="post">'.
                                                    '<input type="hidden" name="id" value="'.$row['idsanpham'].'">'.
                                                    '<input type="hidden" name="quantity" value="1">'.
                                                    '<button type="submit" class="btn btn-add-to-cart">+ Add to Cart</button>'.
                                                    '</form>'.
                                                    '</div>' .
                                                    '</div>';
                                                    
                                                    
                                                echo $str;
                                                    
                                            }
                                        }
                                    ?>
                                    
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="new-products" role="tabpanel" aria-labelledby="new-products-tab">
                            <div class="products-wrapper">
                                <div class="products-carousel owl-carousel">h
                                    <!-- Single Product Item -->
                                    <?php
                                        $sql = "SELECT * FROM sanpham WHERE maloaisp like '%BRL%'";
                                        $result = executeQuery($sql);
                                        if($result->num_rows > 0){
                                            while($row = $result->fetch_array())
                                            {
                                                $str = '<div class="single-product-item text-center">' .
                                                    '<figure class="product-thumb">'.
                                                    '<a href="single-product.php?id=' . $row['idsanpham'].' "><img src="assets/img/Bracelet/'. $row['hinhanh'] .'"'.
                                                    'alt="Products" class="img-fluid"></a>' .
                                                    ' </figure>' .
                                                    '<div class="product-details">' .
                                                    '<h2><a href="single-product.php?id=' . $row['idsanpham'].' ">'. $row['tensp'] .'</a></h2>'.
                                                    '<span class="price">$' . number_format($row['dongia'],2,".","," ) . '</span>' .
                                                    '<form action="index" method="post">'.
                                                    '<input type="hidden" name="id" value="'.$row['idsanpham'].'">'.
                                                    '<input type="hidden" name="quantity" value="1">'.
                                                    '<button type="submit" class="btn btn-add-to-cart">+ Add to Cart</button>'.
                                                    '</form>'.
                                                    '</div>' .
                                                    '</div>';
                                                
                                                
                                                echo $str;
                                                
                                            }
                                        }
                                    ?>
                                    <!-- Single Product Item -->

                                    
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="onsale" role="tabpanel" aria-labelledby="onsale-tab">
                            <div class="products-wrapper">
                                <div class="products-carousel owl-carousel">
                                    <!-- Single Product Item -->
                                    <?php
                                        $sql = "SELECT * FROM sanpham WHERE maloaisp like '%RG%'";
                                        $result = executeQuery($sql);
                                        if($result->num_rows > 0){
                                            while($row = $result->fetch_array())
                                            {
                                                $str = '<div class="single-product-item text-center">' .
                                                    '<figure class="product-thumb">'.
                                                    '<a href="single-product.php?id=' . $row['idsanpham'].' "><img src="assets/img/Ring/'. $row['hinhanh'] .'"'.
                                                    'alt="Products" class="img-fluid"></a>' .
                                                    ' </figure>' .
                                                    '<div class="product-details">' .
                                                    '<h2><a href="single-product.php?id=' . $row['idsanpham'].' ">'. $row['tensp'] .'</a></h2>'.
                                                    '<span class="price">$' . number_format($row['dongia'],2,".","," ) . '</span>' .
                                                    '<form action="index" method="post">'.
                                                    '<input type="hidden" name="id" value="'.$row['idsanpham'].'">'.
                                                    '<input type="hidden" name="quantity" value="1">'.
                                                    '<button type="submit" class="btn btn-add-to-cart">+ Add to Cart</button>'.
                                                    '</form>'.                                                    '</div>' .
                                                    '</div>';
                                                
                                                
                                                echo $str;
                                                
                                            }
                                        }
                                    ?>
                                    <!-- Single Product Item -->

                                   
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Tab Content Area End -->
                </div>
            </div>
        </div>
    </div>
</section>
<!--== New Collection Area End ==-->

<!--== Products by Category Area Start ==-->
<div id="product-categories-area">
    <div class="ruby-container">
        <div class="row">
            <div class="col-lg-3">
                <div class="large-size-cate">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="single-cat-item">
                                <figure class="category-thumb">
                                  <img src="assets/img/women-cat.jpg" alt="Women Category"
                                                     class="img-fluid"/>
                                </figure>
                            </div>
                        </div>

                        
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="small-size-cate">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="single-cat-item">
                                <figure class="category-thumb">
                                    <a href="#"><img src="assets/img/LoaiSP/jewelry.png" alt="Men Category"
                                                     class="img-fluid"/></a>

                                    <figcaption class="category-name">
                                        <a href="shop.php">Jewellery</a>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="single-cat-item">
                                <figure class="category-thumb">
                                    <a href="Ring.php"><img src="assets/img/LoaiSP/Ring.png" alt="Men Category"
                                                     class="img-fluid"  "/></a>

                                    <figcaption class="category-name">
                                        <a href="Ring.php">Rings</a>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="single-cat-item">
                                <figure class="category-thumb">
                                    <a href="Necklace.php"><img src="assets/img/LoaiSP/Necklace.jpeg" alt="Men Category"
                                                     class="img-fluid"/></a>

                                    <figcaption class="category-name">
                                        <a href="Necklace.php">Necklaces</a>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="single-cat-item">
                                <figure class="category-thumb">
                                    <a href="Bracelet.php"><img src="assets/img/LoaiSP/Bracelet.jpeg" alt="Men Category"
                                                     class="img-fluid"/></a>

                                    <figcaption class="category-name">
                                        <a href="Bracelet.php">Bracelet</a>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="large-size-cate">
                    <div class="row">
                        

                        <div class="col-sm-12">
                            <div class="single-cat-item">
                                <figure class="category-thumb">
                                    <img src="assets/img/men-cat.jpg" alt="Men Category" class="img-fluid"/>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
<!--== Products by Category Area End ==-->



<!--== Testimonial Area Start ==-->
<section id="testimonial-area">
    <div class="ruby-container">
        <div class="testimonial-wrapper">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h2>What People Say</h2>
                        <p>Testimonials</p>
                    </div>
                    <!-- Section Title End -->
                </div>
            </div>

            <div class="row">
                <div class="col-lg-7 m-auto text-center">
                    <div class="testimonial-content-wrap">
                        <div id="testimonialCarousel" class="owl-carousel">
                            <div class="single-testimonial-item">
                                <p>These guys have been absolutely outstanding. When I needed them they came through in
                                    a big way! I know that if you buy this theme, you'll get the one thing we all look
                                    for when we buy on Themeforest, and that's real support for the craziest of
                                    requests!</p>

                                <h3 class="client-name">Luis Manrata</h3>
                                <span class="client-email">you@email.here</span>
                            </div>

                            <div class="single-testimonial-item">
                                <p>These guys have been absolutely outstanding. When I needed them they came through in
                                    a big way! I know that if you buy this theme, you'll get the one thing we all look
                                    for when we buy on Themeforest, and that's real support for the craziest of
                                    requests!</p>

                                <h3 class="client-name">John Dibba</h3>
                                <span class="client-email">you@email.here</span>
                            </div>

                            <div class="single-testimonial-item">
                                <p>These guys have been absolutely outstanding. When I needed them they came through in
                                    a big way! I know that if you buy this theme, you'll get the one thing we all look
                                    for when we buy on Themeforest, and that's real support for the craziest of
                                    requests!</p>

                                <h3 class="client-name">Alex Tuntuni</h3>
                                <span class="client-email">you@email.here</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--== Testimonial Area End ==-->

<!--== Blog Area Start ==-->

<!--== Blog Area End ==-->



<!-- Footer Area Start -->
    <?php
        include_once 'Footer.php';
    
    ?>
<!-- Footer Area End -->


<!-- Start All Modal Content -->

<!-- End All Modal Content -->

<!-- Scroll to Top Start -->
<a href="#" class="scrolltotop"><i class="fa fa-angle-up"></i></a>
<!-- Scroll to Top End -->


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

<!--=== Dang nhap User Js ===-->
<script src="assets/js/user-login.js"></script>


</body>

</html>