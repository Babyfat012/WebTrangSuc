
<?php
session_start();
require 'lib/lib.php';
if(!isLogin()){
    header('Location: login-register.php');
}

if(isset($_POST['apply'])){
    if(isset($_POST['name']) && isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['city']) && isset($_POST['district']) && isset($_POST['ward']) &&  isset($_POST['street']) )
    {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $city = $_POST['city'];
        $district = $_POST['district'];
        $ward = $_POST['ward'];
        $street = $_POST['street'];
        $sql = "UPDATE khachhang SET hoten = '$name', sodienthoai = '$phone', email = '$email', sonha = '$street', tenquan = '$district', tenphuong = '$ward', tentp = '$city' WHERE taikhoankh = '".$_SESSION['userName']."'";
        echo $sql;
        executeQuery($sql);
        
    }
}

if(isset($_POST['change']))
{
    if(isset($_POST['oldPass']) && isset($_POST['newPass']) && isset($_POST['newPassConf']) && $_POST['oldPass'] != "" && $_POST['newPass'] != "" && $_POST['newPassConf'] != "") {
        $oldPass = md5($_POST['oldPass']);
        $newPass = md5($_POST['newPass']);
        $confirmPass = md5($_POST['newPassConf']);
        $sql = "SELECT * FROM khachhang WHERE taikhoankh = '".$_SESSION['userName']."'";
        echo $sql;
        $ACC = executeQuery($sql);
        $acc = $ACC->fetch_array();
        if ($oldPass == $acc['matkhau'] && $newPass == $confirmPass) {
            $sql = "UPDATE khachhang SET matkhau = '$newPass' WHERE taikhoankh = '" . $_SESSION['userName'] . "'";
            executeQuery($sql);
        } else {
            echo '<script>alert("Password was wrong")</script>';
        }
    }else{
        echo '<script>alert("Password was wrong")</script>';
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
                    <h1>Dashboard</h1>
                    <ul class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="my-account.php" class="active">My account</a></li>
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

                              

                                <a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a>
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
                                                        echo '<th>'.date("d-m-Y", strtotime($row['ngaymua'])).'</th>';
                                                        switch($row['trangthai'])
                                                        {
                                                            case 0: echo '<th style="color: blue">Confirmed</th>';
                                                            break;
                                                            case 1: echo '<th style="color: green">Completed</th>';
                                                            break;
                                                            case -1: echo '<th style="color: red">Canceled</th>';
                                                        }
                                                        
                                                        echo '<th>$'.number_format($row['tongtien'],2,".",",") .'</th>';
                                                        echo '<form action="detailBill.php" method="post"> >';
                                                        echo '<input type="hidden" name="id" value="'.$row['idhoadon'].'">';
                                                        echo '<input type="hidden" name="user" value="'.$row['taikhoankh'] .'">';
                                                        echo '<th><button name="view" value="view" type="submit" class="btn-add-to-cart">View</button></th>';
                                                        echo '</form>';
                                                        echo '</tr>';
                                                        echo '</thead>';
                                                        $sql1 = "SELECT CT.idsanpham, CT.dongia, .CT.soluong, SP.hinhanh, SP.tensp, SP.maloaisp FROM chitiethoadon CT, sanpham SP WHERE idhoadon ='". "$row[idhoadon]' AND CT.idsanpham = SP.idsanpham";
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
                                                        <p style="text-align: left; font-weight: 700">Price:$'.number_format($row1['dongia'],2,".",".") .'</p>
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
                                            <form action="my-account.php" method="POST">

                                                <fieldset>
                                                    <legend>Password change</legend>
                                                    <div class="single-input-item">
                                                        <label for="current-pwd" class="required">Current
                                                            Password</label>
                                                        <input type="password" name="oldPass" id="current-pwd"
                                                               placeholder="Current Password"/>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="single-input-item">
                                                                <label for="new-pwd" class="required">New
                                                                    Password</label>
                                                                <input type="password" id="new-pwd" name="newPass"
                                                                       placeholder="New Password"/>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <div class="single-input-item">
                                                                <label for="confirm-pwd" class="required">Confirm
                                                                    Password</label>
                                                                <input type="password" id="confirm-pwd" name="newPassConf"
                                                                       placeholder="Confirm Password"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>

                                                <div class="single-input-item">
                                                    <button type="submit" name="change" value="change" class="btn-login btn-add-to-cart">Save Changes</button>
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
                                            <form action="my-account.php" method="post" onsubmit="return checkForm()">
                                                <div class="single-input-item">
                                                    <label for="display-name" class="required">Username</label>
                                                    <h3><?php echo $_SESSION['userName'] ?></h3>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="single-input-item">
                                                            <label for="first-name" class="required" id="nameError">Fullname</label>
                                                            <input type="text" id="first-name"
                                                                   placeholder="Fullname" name="name" value="<?php echo $customer['hoten'] ?>"/>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="single-input-item">
                                                            <label for="last-name" class="required" id="phoneError">Phone</label>
                                                            <input type="text" id="last-name" name="phone" value="<?php echo $customer['sodienthoai'] ?>" placeholder="Phone"/>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="single-input-item">
                                                    <label for="email" class="required" id="emailError">Email Addres</label>
                                                    <input type="email" id="email" name="email" placeholder="Email Address" value="<?php echo $customer['email'] ?>"/>
                                                </div>
                                                
                                                <fieldset>
                                                    <?php function isSelected($str1, $str2)
                                                    {
                                                        if($str1 == $str2)
                                                            echo "selected";
                                                        
                                                    } ?>
                                                    <legend>Address</legend>
                                                    <div class="single-input-item"  >
                                                        <label for="city" class="required" id="cityError" >Province / City</label>
                                                        <select name="city" id="city" ">
                                                        <option value="-1"> Select a city</option>
                                                        <option value="Ho Chi Minh" <?php isSelected($customer['tentp'],"Ho Chi Minh");?> >Ho Chi Minh</option>
                                                        <option value="Ha Noi" <?php isSelected($customer['tentp'],"Ha Noi");?>>Ha Noi</option>
                                                        <option value="Da Nang" <?php isSelected($customer['tentp'],"Da Nang");?>>Da Nang</option>
                                                        <option value="Hai Phong" <?php isSelected($customer['tentp'],"Hai Phong");?>>Hai Phong</option>
                                                        </select>
                                                    </div>

                                                    <div class="single-input-item" >
                                                        <label for="district" class="required" id="districtError" >District</label>
                                                        <select name="district" id="district" >
                                                            <option value="-1"> Select a District
                                                            </option>
                                                            <option value="District 1" <?php isSelected($customer['tenquan'],"District 1");?>>District 1</option>
                                                            <option value="District 2" <?php isSelected($customer['tenquan'],"District 2");?>>District 2</option>
                                                            <option value="District 3" <?php isSelected($customer['tenquan'],"District 3");?>>District 3</option>
                                                            <option value="District 4" <?php isSelected($customer['tenquan'],"District 4");?>>District 4</option>
                                                            <option value="District 5" <?php isSelected($customer['tenquan'],"District 5");?>>District 5</option>
                                                            <option value="District 6" <?php isSelected($customer['tenquan'],"District 6");?>>District 6</option>
                                                            <option value="District 7" <?php isSelected($customer['tenquan'],"District 7");?>>District 7</option>
                                                            <option value="District 8" <?php isSelected($customer['tenquan'],"District 8");?>>District 8</option>
                                                            <option value="District 9" <?php isSelected($customer['tenquan'],"District 9");?>>District 9</option>
                                                            <option value="District 10" <?php isSelected($customer['tenquan'],"District 10");?>>District 10</option>
                                                            <option value="District 11" <?php isSelected($customer['tenquan'],"District 11");?>>District 11</option>
                                                            <option value="District 12" <?php isSelected($customer['tenquan'],"District 12");?>>District 12</option>
                                                            
                                                        </select>
                                                    </div>
                                                    <div class="single-input-item" >
                                                        <label for="ward" class="required" id="wardError">Ward</label>
                                                        <select name="ward" id="ward">
                                                            <option value="Ward 1" <?php isSelected($customer['tenphuong'],"Ward 1");?>>Ward 1</option>
                                                            <option value="Ward 2" <?php isSelected($customer['tenphuong'],"Ward 2");?>>Ward 2</option>
                                                            <option value="Ward 3" <?php isSelected($customer['tenphuong'],"Ward 3");?>>Ward 3</option>
                                                            <option value="Ward 4" <?php isSelected($customer['tenphuong'],"Ward 4");?>>Ward 4</option>
                                                            <option value="Ward 5" <?php isSelected($customer['tenphuong'],"Ward 5");?>>Ward 5</option>
                                                            <option value="Ward 6" <?php isSelected($customer['tenphuong'],"Ward 6");?>>Ward 6</option>
                                                            <option value="Ward 7" <?php isSelected($customer['tenphuong'],"Ward 7");?>>Ward 7</option>
                                                            <option value="Ward 8" <?php isSelected($customer['tenphuong'],"Ward 8");?>>Ward 8</option>
                                                            <option value="Ward 9" <?php isSelected($customer['tenphuong'],"Ward 9");?>>Ward 9</option>
                                                            <option value="Ward 10" <?php isSelected($customer['tenphuong'],"Ward 10");?>>Ward 10</option>
                                                            <option value="Ward 11" <?php isSelected($customer['tenphuong'],"Ward 11");?>>Ward 11</option>
                                                            <option value="Ward 12" <?php isSelected($customer['tenphuong'],"Ward 12");?>>Ward 12</option>
                                                        </select>
                                                    </div>

                                                    <div class="single-input-item" >
                                                        <label for="ward" class="required" id="streetError">Address</label>
                                                        <input name="street" id="street" value="<?php echo $customer['sonha'];?>">
                                                    </div>
                                                </fieldset>
                                                
                                               
                                                <div class="single-input-item">
                                                    <button name="apply" value="edit"  class="btn-login btn-add-to-cart" type="submit" ">Save Changes</button>
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
    <?php include_once "Footer.php"?>

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
        
       
        function checkForm(){
            flag = true;
            var name = document.getElementById("first-name").value;
            var phone = document.getElementById("last-name").value;
            var email = document.getElementById("email").value;
            var city = document.getElementById("city").value;
            var district = document.getElementById("district").value;
            var ward = document.getElementById("ward").value;
            var street = document.getElementById("street").value;
            var regExEmail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
            var regExPhoneNum = /^(0|84)(2(0[3-9]|1[0-6|8|9]|2[0-2|5-9]|3[2-9]|4[0-9]|5[1|2|4-9]|6[0-3|9]|7[0-7]|8[0-9]|9[0-4|6|7|9])|3[2-9]|5[5|6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])([0-9]{7})$\b/;

            if(city == '-1'){
                document.getElementById("cityError").style.color= "red";
                flag = false;
            }else
                document.getElementById("cityError").style.color= "black";

            if(district == '-1'){
                document.getElementById("districtError").style.color="red";
                flag = false;
            }else
                document.getElementById("districtError").style.color= "black";
            
            if(ward == '-1'){
                document.getElementById("wardError").style.color="red";
                flag = false;
            }else
                document.getElementById("wardError").style.color="black";
            
            if(street.trim() == "")
            {
                document.getElementById("streetError").style.color = "red";
                flag = false;
            }else
                document.getElementById("streetError").style.color = "black";

            if(name.trim() == "")
            {
                document.getElementById("nameError").style.color = "red";
                flag = false;
            }else
                document.getElementById("nameError").style.color = "black";

            if(phone.trim() == "" || !regExPhoneNum.test(phone))
            {
                document.getElementById("phoneError").style.color = "red";
                flag = false;
            }else
                document.getElementById("phoneError").style.color = "black";

            if(email.trim() == "" || !regExEmail.test(email))
            {
                document.getElementById("emailError").style.color = "red";
                flag = false;
            }else
                document.getElementById("emailError").style.color = "black";
            
            
            if(flag == false){
                alert(" Please complete all information");
            }
            console.log(flag);
            return flag;


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