<?php
    session_start();
    require 'lib/lib.php';
    if(isset($_GET['delProduct']) && isset($_GET['delProduct']) >= 0)
    {
        $index = $_GET['delProduct'];
        $sql1 = "SELECT * FROM sanpham WHERE idsanpham = '".$_SESSION['cart'][$index][0]."'";
        $result = executeQuery($sql1);
        $row = $result->fetch_array();
        
        $sql2 = "UPDATE sanpham SET soluong = ". ($row['soluong'] + $_SESSION['cart'][$index][1]) ." WHERE idsanpham = '".$_SESSION['cart'][$index][0] . "'";
        executeQuery($sql2);
        array_splice($_SESSION['cart'],$_GET['delProduct'],1);
        header('location:cart.php');
    }
    ?>

<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="meta description">

    <title>Cart :: DNX - Jewelry Store e-Commerce Bootstrap 4 Template</title>

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
    <script>
        function isNumber(evt){
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
        }
    </script>

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<!--== Header Area Start ==-->
<?php include_once "Header.php"?>
<!--== Header Area End ==-->

<!--== Search Box Area Start ==-->

<!--== Search Box Area End ==-->

<!--== Page Title Area Start ==-->
<div id="page-title-area">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="page-title-content">
                    <h1>Shopping Cart</h1>
                    <ul class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="shop.php">Shop</a></li>
                        <li><a href="cart.php" class="active">Cart</a></li>
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
        <!-- Cart Page Content Start -->
        <div class="row">
            <div class="col-lg-12">
                <!-- Cart Table Area -->
                <div class="cart-table table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th class="pro-thumbnail">Thumbnail</th>
                            <th class="pro-title">Product</th>
                            <th class="pro-price">Price</th>
                            <th class="pro-quantity">Quantity</th>
                            <th class="pro-subtotal">Total</th>
                            <th class="pro-remove">Remove</th>
                        </tr>
                        </thead>
                        
                        <tbody>
                        <?php
                            $total = 0;
                            if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])){
                                for($i=0; $i<count($_SESSION['cart']); $i++){
                                    $sql = "SELECT * FROM sanpham WHERE idsanpham = '".$_SESSION['cart'][$i][0]."'";
                                    $result = executeQuery($sql);
                                    $row = $result->fetch_array();
                                    switch($row['maloaisp'])
                                    {
                                        case 'NKL':
                                            $pic = "assets/img/Necklace/".$row['hinhanh'];
                                            break;
                                        case 'BRL':
                                            $pic = "assets/img/Bracelet/".$row['hinhanh'];
                                            break;
                                        case 'RG':
                                            $pic = "assets/img/Ring/".$row['hinhanh'];
                                            break;
                                    }
                                    
                                    echo '    <tr>
                            <td class="pro-thumbnail"><a href="single-product.php?id='.$_SESSION['cart'][$i][0].'"><img class="img-fluid" src="'.$pic.'"
                                                                       alt="Product"/></a></td>
                            <td class="pro-title"><a href="single-product.php?id='.$_SESSION['cart'][$i][0].'">'.$row['tensp'].'</a></td>
                            <td class="pro-price"><span>$'.number_format($row['dongia'],2,".",",") .'</span></td>
                            <td class="pro-quantity">
                                <div class="pro-qty"><input type="text" id="'.$i.'" onchange="setValue(this.id)" onkeypress="return isNumber(event)" inputmode="numeric" value="'.$_SESSION['cart'][$i][1].'"></div>
                            </td>
                            <td class="pro-subtotal"><span>$'.number_format( $row['dongia']*$_SESSION['cart'][$i][1],2,".",",").'</span></td>
                            <td class="pro-remove"><a href="cart.php?delProduct='.$i.'"><i class="fa fa-trash-o"></i></a></td>
                        </tr>';
                                    $total += $row['dongia']*$_SESSION['cart'][$i][1];
                                }
                            }else{
                                echo '<tr>';
                                echo '<td colspan="6">YOUR CART IS EMPTY</td>';
                                echo '</tr>';
                                echo '<tr>';
                                echo '<td colspan="6"><a href="shop.php" class="btn btn-add-to-cart">SHOP NOW</a></td>';
                                echo '</tr>';
                            }
                        ?>
                        </tbody>
                    </table>
                </div>

               
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 ml-auto">
                <!-- Cart Calculation Area -->
                <?php
                    if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])){
                        echo ' <div class="cart-calculator-wrapper">
                    <h3>Cart Totals: $'.number_format($row['dongia'],2,".",",").'</h3>
                    <a href="checkout.php" class="btn-add-to-cart">Proceed To Checkout</a>
                </div>';
                    }
                
                ?>
               
            </div>
        </div>
        <!-- Cart Page Content End -->
    </div>
</div>
<!--== Page Content Wrapper End ==-->

<!-- Footer Area Start -->
<?php include_once "Footer.php"?>
<!-- Footer Area End -->

<!-- Scroll to Top Start -->
<a href="#" class="scrolltotop"><i class="fa fa-angle-up"></i></a>
<!-- Scroll to Top End -->


<!--=======================Javascript============================-->
    
    <script>
        function setValue(index){
            
            var quantity = document.getElementById(index).value;
            if(quantity <= 0)
                quantity = 1;
            console.log(quantity);
            window.location.href = "updateCart.php?index="+index+"&quantity="+quantity;
            
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