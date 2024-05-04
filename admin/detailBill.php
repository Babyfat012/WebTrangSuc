<?php
if(isset($_POST['view']))
{
    if(isset($_POST['id']) && isset($_POST['user']))
    $id = $_POST['id'] ;
    $user = $_POST['user'];
   
}else{
    header("location:index.php");
}
    
?>

<head>




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

<!--== Page Content Wrapper Start ==-->
<div id="page-content-wrapper" class="p-9">
    <div class="container">
        <!-- Cart Page Content Start -->
        <div class="row">
            <div class="col-lg-12">
                <!-- Cart Table Area -->
                <div class="cart-table table-responsive">
                    <div>
                        <?php
                            $sql = "SELECT * FROM hoadon WHERE idhoadon = '".$id."'";
                            $BILL = executeQuery($sql);
                            if($BILL->num_rows > 0){
                                $bill = $BILL->fetch_array();
                            }else
                                header("location:my-account.php");
                            
                        ?>
                        <h2 style="font-family: 'Droid Serif'">ID BILL: <?php echo $bill['idhoadon']; ?></h2>
                        <h2 style="font-family: 'Droid Serif'">Username: <?php echo $bill['taikhoankh']; ?></h2>
                        <h4 style="font-family: 'Droid Serif'">Receiver: <?php echo $bill['hoten']; ?></h4>
                        <h4 style="font-family: 'Droid Serif'">Phone: <?php echo $bill['sodienthoai']; ?></h4>
                        <h4 style="font-family: 'Droid Serif'">Address: <?php echo $bill['sonha'] .", ".$bill['tenphuong'] .", ".$bill['tenquan'] .", ".$bill['tentp']; ?> </h4>
                        <?php
                            switch ($bill['trangthai']){
                                case -1:
                                    echo ' <h4 style="font-family: \'Droid Serif\'; color: red">Status: Canceled</h4>';
                                    break;
                                case 0:
                                    echo ' <h4 style="font-family: \'Droid Serif\'; color: blue">Status: Confirmed</h4>';
                                    break;
                                case 1:
                                    echo ' <h4 style="font-family: \'Droid Serif\'; color: green">Status: Completed</h4>';
                                    break;
                                    
                            }
                        ?>
                        

                    </div>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th style="font-size: 2rem" class="pro-thumbnail">Thumbnail</th>
                            <th style="font-size: 2rem" class="pro-title">Product</th>
                            <th style="font-size: 2rem" class="pro-price">Price</th>
                            <th style="font-size: 2rem" class="pro-quantity">Quantity</th>
                            <th style="font-size: 2rem" class="pro-subtotal">Total</th>
                            
                        </tr>
                        </thead>
                        <tbody>
                     
                            <?php
                                $sql = "SELECT * FROM chitiethoadon WHERE idhoadon = '".$bill['idhoadon']."'";
                                $DETAIL = executeQuery($sql);
                                if($DETAIL->num_rows > 0){
                                    while($detail = $DETAIL->fetch_array()){
                                        $sql = "SELECT * FROM sanpham WHERE idsanpham = '".$detail['idsanpham']."'";
                                        $PRODUCT = executeQuery($sql);
                                        $product = $PRODUCT->fetch_array();
                                        switch($product['maloaisp']){
                                            case 'BRL':
                                                {
                                                    $folder = "assets/img/Bracelet/";
                                                    break;
                                                }
                                            case 'NKL':
                                                {
                                                    $folder = "assets/img/Necklace/";
                                                    break;
                                                }
                                            case 'RG':
                                                {
                                                    $folder = "assets/img/Ring/";
                                                    break;
                                                }
                                        }
                                        echo '<tr>';
                                        echo '<td style="font-size: 2rem" class="pro-thumbnail"><img style="width: 100px;height: 100px" class="img-fluid" src="'.$folder.$product['hinhanh'].'"
                                                                       alt="Product"/></td>';
                                        echo '<td style="font-size: 2rem" class="pro-title">'.$product['tensp'].'l</td>';
                                        echo '<td style="font-size: 2rem" class="pro-price"><span>$'.number_format($detail['dongia'],2,".",",").'</span></td>';
                                        echo '<td style="font-size: 2rem" class="pro-quantity">'.$detail['soluong'].'</td>';
                                        echo '<td style="font-size: 2rem" class="pro-subtotal"><span>$'.number_format($detail['soluong']*$detail['dongia'],2,".",",").'</span></td>';
                                        echo '</tr>';
                                    }
                                }
                            ?>
                           
                        </tbody>
                    </table>
                </div>

                <!-- Cart Update Option -->
               
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 ml-auto">
                <!-- Cart Calculation Area -->
                <div class="cart-calculator-wrapper">
                    <h3>Bill Totals: $<?php echo number_format($bill['tongtien'],2,".",",") ?></h3>
                </div>
            </div>
        </div>
        <!-- Cart Page Content End -->
    </div>
</div>
<!--== Page Content Wrapper End ==-->



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

