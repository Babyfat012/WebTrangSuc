<?php
    session_start();
    require 'lib/lib.php';
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
                    " VALUES('$ID', "."'".$_SESSION['userName']."', "."'$user[hoten]','$user[sodienthoai]', '$user[sonha]', '$user[tentp]', '$user[tenquan]', '$user[tenphuong]', CURRENT_DATE(), $pttt, 0, $total)";
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
                    " VALUES('$ID', "."'".$_SESSION['userName']."'".",'$fullname','$phone', '$address', '$city', '$district', '$ward', CURRENT_DATE(), $paymentmethod, 0, $total)";
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
        header('Location:my-account.php?url=order');
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
    <?php include_once "Header.php"?>
<!--== Search Box Area End ==-->

<!--== Page Title Area Start ==-->
<div id="page-title-area">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="page-title-content">
                    <h1>Checkout</h1>
                    <ul class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="cart.php">Cart</a></li>
                        <li><a href="checkout.php" class="active">Checkout</a></li>
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
                                        echo '<td>$'.number_format($row['dongia'],2,".",",") .'</td>';
                                        echo '</tr>';
                                        $total += $row['dongia']*$_SESSION['cart'][$i][1];
                                    }
                                    echo '<input type="hidden" name="total" value="'.$total.'">';
                                ?>
                                </tbody>
                                <tfoot>
                                
                                <tr>
                                    <td>Total Amount</td>
                                    <td><strong>$ <?php echo  number_format($total,2,".",",") ?></strong></td>
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
    <?php include_once "Footer.php"?>

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