<?php
    session_start();
    require 'lib/lib.php';
    
    if(isset($_REQUEST['id'])) {
        $id = $_REQUEST['id'];
        $sql = "SELECT * FROM sanpham where idsanpham = '$id'";
        $result = executeQuery($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_array();
            $name = $row['tensp'];
            $price = $row['dongia'];
            $description = $row['mota'];
            $photo = $row['hinhanh'];
            $material = $row['chatlieu'];
            $color = $row['mausac'];
            $size = $row['kichthuoc'];
            $type = $row['maloaisp'];
            $gender = $row['gioitinh'];
            $quantity = $row['soluong'];
            
        } else
            echo 'Not found';
    }
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

    <title>Jewelry Store HPV</title>

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
    <?php
        include 'Header.php';
    ?>
<!--== Header Area End ==-->

<!--== Search Box Area Start ==-->
<!--== Search Box Area End ==-->

<!--== Page Title Area Start ==-->
<div id="page-title-area">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="page-title-content">
                    <ul class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="shop.php">Shop</a></li>
                        <li><a href="#" class="active"><?php echo $name ?></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--== Page Title Area End ==-->

<!--== Page Content Wrapper Start ==-->
<div id="page-content-wrapper" class="p-9">
    <div class="ruby-container">
        <div class="row">
            <!-- Single Product Page Content Start -->
            <div class="col-lg-12">
                <div class="single-product-page-content">
                    <div class="row">
                        <!-- Product Thumbnail Start -->
                        <div class="col-lg-5">
                            <div class="product-thumbnail-wrap">
                                <div class="product-thumb-carousel owl-carousel">
                                    <div class="single-thumb-item">
                                        <?php
                                            switch ($type) {
                                                case 'BRL':
                                                    $folder = 'assets/img/Bracelet/';
                                                    break;
                                                case 'NKL':
                                                    $folder = 'assets/img/Necklace/';
                                                    break;
                                                case 'RG':
                                                    $folder = 'assets/img/Ring/';
                                            }
                                            $str= '<img class="img-fluid"src="'.$folder.$photo.'"alt="Product"/>';
                                            echo $str;
                                        ?>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Product Thumbnail End -->

                        <!-- Product Details Start -->
                        <div class="col-lg-7 mt-5 mt-lg-0">
                            <div class="product-details">
                                <h2><?php echo $name ?></a></h2>
                                <span class="price">$<?php echo number_format($price,2,".",",")  ?></span>
                                <div class="product-info-stock-sku">
                                    <span class="product-sku-status"><strong>Gender:</strong> <?php  switch ($gender)
                                            {
                                            case 'F': echo 'Female';
                                            break;
                                            case 'M': echo 'Male';
                                            break;
                                            case 'U': echo 'Unisex';
                                            break;
                                        }?> </span>
                                </div>
                                <div class="product-info-stock-sku">
                                    <span class="product-sku-status "><strong>Material:</strong> <?php echo $material ?> </span>
                                </div>
                                <div class="product-info-stock-sku">
                                    <span class="product-sku-status"><strong>Color:</strong> <?php echo $color ?> </span>
                                </div>
                                <div class="product-info-stock-sku">
                                    <span class="product-sku-status"><strong>Size:</strong> <?php echo $size ?> </span>
                                </div>
                                <div class="product-info-stock-sku">
                                    <span class="product-sku-status"><strong>Available:</strong> <?php echo $quantity ?> </span>
                                </div>

                              
                                
                                
                                <div class="product-quantity d-flex align-items-center">
                                    <form  method="post">
                                        <input type="hidden" name="id" value="<?php echo $id ?>">
                                        <?php
                                            if($quantity > 0)
                                            {
                                                echo ' <div class="quantity-field">';
                                                echo '<label for="qty">Quantity</label>';
                                                echo '<input type="number" name="quantity" id="qty" min="1" max="'.$quantity.'" value="1"/>';
                                                echo '<button type="submit" name="addToCart" value="addCart" style="border:1px solid #c5c5c5;" class="btn btn-add-to-cart">Add to Cart</button>';
                                                echo '</div>';
                                            }else
                                            {
                                                echo ' <div class="quantity-field">';
                                                echo '<h3> Out of stock </h3>';
                                                echo '</div>';
                                                
                                                
                                            }
                                        ?>

                                     
                                      

                                    </form>
                                </div>
                                <div class="product-full-info-reviews">
                                    <!-- Single Product tab Menu -->
                                    <nav class="nav" id="nav-tab">
                                        <a class="active" id="description-tab" data-toggle="tab" href="#description">Description</a>
                                    </nav>
                                    <!-- Single Product tab Menu -->

                                    <!-- Single Product tab Content -->
                                    <div class="tab-content" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="description">
                                            <p><?php echo $description ?></p>
                                        </div>


                                    </div>
                                    <!-- Single Product tab Content -->
                                </div>
                            </div>
                        </div>
                        <!-- Product Details End -->
                    </div>

                   
                </div>
            </div>
            <!-- Single Product Page Content End -->
        </div>
    </div>
</div>
<!--== Page Content Wrapper End ==-->

<!-- Footer Area Start -->
    <?php
        include_once 'Footer.php';
    ?>
<!-- Footer Area End -->

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

</body>

</html>