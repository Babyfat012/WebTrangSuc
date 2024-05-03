<?php
    session_start();
    require '../lib/lib.php';
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
                                   
                               
                                       
                                        <h3 style=" font-family: 'Droid Serif'; margin-top:20px ">Username:   Sog1n090</h3></span>
                                        <p style=" font-family: 'Droid Serif' ; margin-top:10px"><strong>Fullname: </strong>Nguyen Vinh</p>
                                        <p style=" font-family: 'Droid Serif';"><strong>Address: </strong>102/6 Hoa Hung, Ward 13, District 10, TPHCM</p>
                        
                                    
                                    
                                    
                                    
                                    <a href="login-register.html"><i class="fa fa-sign-out"></i> Back</a>
                                </div>
                            </div>
                            <!-- My Account Tab Menu End -->
                            
                            <!-- My Account Tab Content Start -->
                            <div class="col-lg-9 mt-5 mt-lg-0">
                                <div class="tab-content" id="myaccountContent">
                                    <!-- Single Tab Content Start -->
                                    
                                    <!-- Single Tab Content End -->
                                    
                                    <!-- Single Tab Content Start -->
                                    <div class="tab-pane fade show active" id="orders" role="tabpanel">
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
                                                                case 0: echo '<th>Confirmed</th>';
                                                                    break;
                                                                case 1: echo '<th>Completed</th>';
                                                                    break;
                                                                case -1: echo '<th>Canceled</th>';
                                                            }
                                                            echo '<th>$'.number_format($row['tongtien'],2,".",",") .'</th>';
                                                            echo '<th><a href="../cart.html" class="btn-add-to-cart">View</a></th>';
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
                                                        <p style="text-align: left; font-weight: 700">Price:$'.number_format($row1['dongia']) .'</p>
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
                                   
                                    <!-- Single Tab Content End -->
                                   
                                    <!-- Single Tab Content Start -->
                                   
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
            
            </div>
        </div>
    </div>
</body>
</html>