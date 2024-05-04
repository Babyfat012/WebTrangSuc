<?php
require 'lib/DataProvider.php';
    session_start();
if(isset($_POST['register-submit'])) {
    echo $_POST['city'];
    if (!empty($_POST['userName']) && !empty($_POST['fullName']) && !empty($_POST['eMail']) && !empty($_POST['phoneNumber']) && !empty($_POST['passWord']) && !empty($_POST['houseNumbering']) &&!empty($_POST['city'])&&!empty($_POST['district'])&&!empty($_POST['ward']) ) {
        $userName = trim($_POST['userName']);
        $fullName = trim($_POST['fullName']);
        $eMail = trim($_POST['eMail']);
        $phoneNumber = trim($_POST['phoneNumber']);
        $houseNumbering = trim($_POST['houseNumbering']);
        $city = $_POST['city'];
        $district = $_POST['district'];
        $ward = $_POST['ward'];
        $passWord = trim($_POST['passWord']);
        $repassWord = trim($_POST['re-passWord']);
        $passWordHash = md5($passWord);
        
        $sql = "INSERT INTO `khachhang` (hoten, taikhoankh, matkhau , email, sonha, tenquan, tenphuong, tentp, sodienthoai, trangthaitk) VALUES ('$fullName', '$userName', '$passWordHash', '$eMail', '$houseNumbering', '$district', '$ward', '$city', '$phoneNumber',1)";
        echo $sql;
        
        $result = executeQuery($sql);
        $_SESSION['userName'] = $userName;
      
     
    }
}
?>
<?php
    $flag=0;
    if(isset($_POST['login-submit'])){
        if(!empty($_POST['userName'])&&!empty($_POST['passWord'])){
        $userName = $_POST['userName'];
        $passWord = $_POST['passWord'];
        $sql = "SELECT * FROM khachhang WHERE taikhoankh like '$userName'";
        $result = executeQuery($sql);
        $user = $result->fetch_assoc();
        if($user){
            if(md5($passWord) == $user['matkhau'] ){
                if( $user['trangthaitk'] == 1){
                    $_SESSION['userName'] = $user['taikhoankh'];
                    $_SESSION['passWord'] = $user['matkhau'];
                    $_SESSION['fullName'] = $user['hoten'];
                    header('Location:index.php');
                }else{
                    $flag = -1;
                }
               
            }else
            {
                $flag = 1;
            }
          
        }else
        {
            $flag = 1;
        }
    }
    
}
?>
<?php
if(isset($_SESSION['userName'])){
    header('Location: index.php');
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
    <?php include_once "Header.php"?>

<!--== Search Box Area End ==-->
<!--== Page Title Area Start ==-->
<div id="page-title-area">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="page-title-content">
                    <h1>Member Area</h1>
                    <ul class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="login-register.php" class="active">Login & Register</a></li>
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
                                        <?php
                                            if($flag == 1)
                                                echo '<p style="color: red" id="errorLogin">Your login information is not correct. Please try again.</p>';
                                            if($flag == -1)
                                                echo '<p style="color: red" id="errorLogin">Your account has been locked.</p>';
                                        ?>
                                        <p style="color: red" id="errorLogin"></p>
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

                                    <div class="single-input-item">
                                        <label for="city" class="required" >Province / City</label>
                                        <select name="city" id="city" ">
                                        <option value="-1"> Select a city</option>
                                        <option value="Ho Chi Minh">Ho Chi Minh</option>
                                        <option value="Ha Noi">Ha Noi</option>
                                        <option value="Da Nang">Da Nang</option>
                                        <option value="Hai Phong">Hai Phong</option>
                                        </select>
                                        <div id="errorCity"></div>

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
                                        <div id="errorDistrict"></div>

                                    </div>

                                    <div class="single-input-item" id="wardform">
                                        <label for="ward" class="required" >Ward</label>
                                        <select name="ward" id="ward">
                                            <option value="-1"> Select a Ward</option>
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
                                        <div id="errorWard"></div>
                                    </div>

                                    <div class="single-input-item">
                                        <label for="f_name_2" class="required">Address</label>
                                        <input name="address" type="text" id="address" placeholder="Address" required/>
                                        <div id="errorAddress"></div>

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
                                        <input type="submit" name="register-submit" class="btn-login" value="Register" ">
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
    <?php include_once "Footer.php"?>

<!-- Footer Area End -->

<!-- Scroll to Top Start -->
<a href="#" class="scrolltotop"><i class="fa fa-angle-up"></i></a>
<!-- Scroll to Top End -->


<!--=======================Javascript============================-->


   
<script>
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
            document.getElementById('error_username').innerText= 'User Name must be at least 5 characters ';
            document.getElementById('error_username').style.color = "red";
            document.getElementById('error_username').style.display = "block";

            flag = false
        }else
            document.getElementById('error_username').style.display = "none";


        if(fullName.length < 5){
            document.getElementById('error_fullname').innerText= 'Full Name must be at least 5 characters';
            document.getElementById('error_fullname').style.color = 'red';
            document.getElementById('error_fullname').style.display= 'block';
            flag = false
        }
        else {
            document.getElementById('error_fullname').style.display = "none";
        }
        if(!regExEmail.test(eMail)){
            document.getElementById('error_email').innerText = 'Please enter valid email';
            document.getElementById('error_email').style.color ="red";
            document.getElementById('error_email').style.display = 'block';
            flag = false
        }
        else {
            document.getElementById('error_email').style.display = "none";
        }
        if(!regExPhoneNum.test(phoneNum)){
            document.getElementById('error_phonenumber').innerText = 'Please enter valid phone number'
            document.getElementById('error_phonenumber').style.color ='red'
            document.getElementById('error_phonenumber').style.display = 'block';
            flag = false
        }
        else {
            document.getElementById('error_phonenumber').style.display = "none";
        }
        if(phoneNum.length > 11 || phoneNum.length < 10){
            document.getElementById('error_phonenumber').innerText='Phone number must be at least 10 and maximum 11 number';
            document.getElementById('error_phonenumber').style.color='red';
            document.getElementById('error_phonenumber').style.display = 'block';
            flag = false
        }
        else{
            document.getElementById('error_phonenumber').style.display = "none";
        }

        
        if(passWord.length < 8){
            document.getElementById('error_password').innerText =' Password must be at least 8 character';
            document.getElementById('error_password').style.color = 'red';
            flag = false;
        }
        else{
            document.getElementById('error_password').style.display = "none";
        }
        
        <?php
        $checkSql = "select * from `khachhang`";
        $result = executeQuery($checkSql);
        if($result->num_rows > 0)
        {
            while($row = $result->fetch_array()) {
                echo 'if(' . "'". $row['taikhoankh'] . "'"." == userName){";
                echo "document.getElementById('error_username').innerText= 'Username exist. Try another username!!!';";
                echo 'document.getElementById("error_username").style.display = "block";';

                echo 'document.getElementById("error_username").style.color = "red";';
                echo 'flag = false;';
                echo '} ';
            }
        }
        ?>
        console.log(flag)
        var city = document.getElementById("city").value;
        var district = document.getElementById("district").value;
        var ward = document.getElementById("ward").value;
        var street = document.getElementById("address").value;

        if(city == -1){
            document.getElementById('errorCity').innerText ='Select a city';
            document.getElementById('errorCity').style.color = 'red';
            flag = false;
        }
        else{
            document.getElementById('errorCity').style.display = "none";
        }

        if(ward == -1){
            document.getElementById('errorWard').innerText ='Select a ward';
            document.getElementById('errorWard').style.color = 'red';
            flag = false;
        }
        else{
            document.getElementById('errorWard').style.display = "none";
        }

        if(district == -1){
            document.getElementById('errorDistrict').innerText ='Select a ward';
            document.getElementById('errorDistrict').style.color = 'red';
            flag = false;
        }
        else{
            document.getElementById('errorDistrict').style.display = "none";
        }

        
        return flag;
       
        
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
