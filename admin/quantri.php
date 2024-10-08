<?php

    ob_start();
    session_start();
    require '../lib/db.inc';
    require '../lib/lib.php';
    if(!isset($_SESSION['taikhoan']))
    {
        header('location: index.php');
    }
    if(isset($_POST['deleteBtn'])){
        if(isset($_POST['del_id']))
        {
            $sql = "UPDATE sanpham SET soluong = 0 WHERE idsanpham='" . $_POST['del_id'] . "'";
            $result =executeQuery($sql);
            header("location:quantri.php?page_layout=danhsachsp");
        }
    }

    $sql = "SELECT * FROM manager WHERE taikhoan = '".$_SESSION['taikhoan']."'";
    $result = executeQuery($sql);
    $row = $result->fetch_array();
    if($row['trangthaitk'] == '0')
    {
        header("location:dangxuat.php");
    }


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin WebTrangSuc</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="images/favicon.png" />

</head>

<body>
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            <a class="" href="quantri.php"><img src="assets/img/logo-black.png" class="me-2" alt="logo"/></a>
            <a class="navbar-brand brand-logo-mini" href="quantri.php"><img src="assets/img/logo-black.png" alt="logo"/></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="ti-view-list"></span>
            </button>
            <ul class="navbar-nav mr-lg-2">
                <li class="nav-item nav-search d-none d-lg-block">
                    <div class="input-group">
                        <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                <span class="input-group-text" id="search">
                  <i class="ti-search"></i>
                </span>
                        </div>
                        <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now" aria-label="search" aria-describedby="search">
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item nav-profile dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
                            <i class="ti-user"></i>
                            <span>Hello, <?php if(isset($_SESSION['taikhoan'])) {echo $_SESSION['taikhoan'];} ?></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                        <a class="dropdown-item" href="quantri.php?page_layout=danhsachadmin">
                            <i class="ti-settings text-primary"></i>
                            Settings
                        </a>
                        <a class="dropdown-item" href="dangxuat.php">
                            <i class="ti-power-off text-primary"></i>
                            Logout
                        </a>
                    </div>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                <span class="ti-view-list"></span>
            </button>
        </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="quantri.php">
                        <i class="ti-home menu-icon"></i>
                        <span class="menu-title">Home</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                        <i class="ti-view-list-alt menu-icon"></i>
                        <span class="menu-title">Management</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="auth">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="quantri.php?page_layout=danhsachuser"> Customer Management </a></li>
                            <li class="nav-item"> <a class="nav-link" href="quantri.php?page_layout=danhsachsp"> Product Management </a></li>
                            <li class="nav-item"> <a class="nav-link" href="quantri.php?page_layout=danhsachbill"> Bill Management </a></li>
                            <li class="nav-item"> <a class="nav-link" href="quantri.php?page_layout=danhsachadmin"> Admin Management </a></li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="quantri.php?page_layout=thongke">
                        <i class="ti-bar-chart-alt menu-icon"></i>
                        <span class="menu-title">Reports</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                        <i class="ti-user menu-icon"></i>
                        <span class="menu-title">Account</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-basic">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="quantri.php?page_layout=dangky">Add</a></li>
                            <li class="nav-item"> <a class="nav-link" href="dangxuat.php">Log Out</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pages/tables/basic-table.html">

                    </a>
                </li>

            </ul>
        </nav>
        <!-- partial -->
        <?php
        if(isset($_GET['page_layout']))
        {
            switch ($_GET["page_layout"])
            {
                case 'danhsachsp':include_once './danhsachsp.php';
                    break;
                case 'editproduct':include_once './editproduct.php';
                    break;
                case 'danhsachuser':include_once './danhsachuser.php';
                    break;
                case 'adduser':include_once './adduser.php';
                    break;
                case 'editUser': include_once './editUser.php';
                    break;
                case 'addProduct': include_once './addProduct.php';
                    break;
                case 'danhsachbill': include_once './danhsachbill.php';
                    break;
                case 'dangky': include_once './dangky.php';
                    break;
                case 'danhsachadmin': include_once './danhsachadmin.php';
                    break;
                case 'thongke': include_once './thongke.php';
                    break;
            }
        }
        else if(isset($_POST['page_layout']))
        {
            echo'<div style="width: 100%">';
            include_once './detailBill.php';
            echo'</div>';
        }
        else
        {
            include_once './gioithieu.php';
        }



        ?>
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<script>

    function check(){
        var regNumber = /^[0-9]+$/;
        var regFloat = /^\d*\.\d+$/;
        var stock = document.getElementById("stock").value;
        var type = document.getElementById("type").value;
        var size = document.getElementById("size").value;
        var price = document.getElementById("price").value;
        var gender = document.getElementById("gender").value;
        console.log(size);
        console.log(stock);
        flag = true;
        if((regFloat.test(size) || regNumber.test(size)) && parseFloat(size) >0){
            document.getElementById("errorSize").style.display = "none";

        }else{
            flag = false;

            document.getElementById("errorSize").innerHTML = "Data is wrong";
            document.getElementById("errorSize").style.display = "block";
            document.getElementById("errorSize").style.color = "red";

        }


        if(!regNumber.test(stock) || parseInt(stock) < 0){
            flag = false;

            document.getElementById("errorStock").innerHTML = "Data is wrong";
            document.getElementById("errorStock").style.display = "block";
            document.getElementById("errorStock").style.color = "red";

        }else
            document.getElementById("errorStock").style.display = "none";

        if((regFloat.test(price) || regNumber.test(price)) && parseFloat(price)>0){
            document.getElementById("errorPrice").style.display = "none";

        }else{
            flag = false;

            document.getElementById("errorPrice").innerHTML = "Data is wrong";
            document.getElementById("errorPrice").style.display = "block";
            document.getElementById("errorPrice").style.color = "red";

        }


        if(type == -1){
            document.getElementById("errorType").innerHTML = "Data is wrong";
            document.getElementById("errorType").style.display = "block";
            document.getElementById("errorType").style.color = "red";

            flag = false;
        }else
            document.getElementById("errorType").style.display = "none";

        if(gender == -1){
            document.getElementById("errorGender").innerHTML = "Data is wrong";
            document.getElementById("errorGender").style.display = "block";
            document.getElementById("errorGender").style.color = "red";

            flag = false;
        }else
            document.getElementById("errorGender").style.display = "none";

        return flag;


    }



    function ImagesFileAsURL() {
        var fileSelected = document.getElementById('pic').files;
        if (fileSelected.length > 0) {
            var fileToLoad = fileSelected[0];
            var fileReader = new FileReader();
            fileReader.onload = function(fileLoaderEvent) {
                var srcData = fileLoaderEvent.target.result;
                var newImage = document.createElement('img');
                newImage.src = srcData;
                newImage.style.width = "250px";
                document.getElementById('displayImg').innerHTML = newImage.outerHTML;
            }
            fileReader.readAsDataURL(fileToLoad);
        }
    }
</script>


<script>
    function ImagesFileAsURL() {
        var fileSelected = document.getElementById('pic').files;
        if (fileSelected.length > 0) {
            var fileToLoad = fileSelected[0];
            var fileReader = new FileReader();
            fileReader.onload = function(fileLoaderEvent) {
                var srcData = fileLoaderEvent.target.result;
                var newImage = document.createElement('img');
                newImage.src = srcData;
                newImage.style.width = "250px";
                document.getElementById('displayImg').innerHTML = newImage.outerHTML;

                var display = document.getElementById('displayImg');
                display.style.width="250px";
                display.src = srcData;
                display.outerHTML;
            }
            fileReader.readAsDataURL(fileToLoad);
        }
    }</script>


<!-- plugins:js -->
<script src="vendors/base/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<script src="vendors/chart.js/Chart.min.js"></script>
<script src="js/jquery.cookie.js" type="text/javascript"></script>
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="js/off-canvas.js"></script>
<script src="js/hoverable-collapse.js"></script>
<script src="js/template.js"></script>
<script src="js/todolist.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="js/dashboard.js"></script>
<!-- End custom js for this page-->

</body>

</html>
