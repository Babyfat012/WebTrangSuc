<?php
    session_start();
    require 'lib/lib.php';
    if(isset($_POST['addToCart']))
    {
        $id = $_POST['id'];
        $quantity = $_POST['quantity'];
        addToCart($id, $quantity);
    }
   
    
    
    
    $rowsPerPage = 6;
    $pageNum = 1;
    $self ="shop.php";
    $root = "shop.php";
    if(isset($_GET["page"])){
        $pageNum = $_GET["page"];
    }
    $offset = ($pageNum - 1) * $rowsPerPage;
    $where = '';
    if(isset($_GET['key']))
    {
        $key = $_GET['key'];
        if($where == ''){
            $where = " (tensp LIKE '%" . $key . "%')" ;
            $self = "shop.php?key=$key";
            
        }
        else{
            $where .= " AND (tensp LIKE '%" . $key . "%')" ;
            $self .= "&key=$key";
        }
        
    }
   
    
    
    if(isset($_GET['type']))
    {
        $type = $_GET['type'];
        if($where != ""){
            $where .= " AND (";
            $self .= "&";
        }
        else{
            $where .= " (";
            $self .= "?";
        }
        
        for($i = 0; $i < sizeof($type); $i++){
            if($i == sizeof($type)-1)
            {
                $where .= "maloaisp LIKE '" . $type[$i] . "')";
                $self .= "type[]=$type[$i]";
            }
            else{
                $where .= "maloaisp LIKE '" . $type[$i] . "' OR ";
                $self .= "type[]=$type[$i]&";
                
            }
        }
    }
   
    
    if(isset($_GET['Gender']))
    {
        $gender = $_GET['Gender'];
        if($where != ""){
            $where .= " AND (";
            $self .= "&";
        }
        else
        {
            $where .=" (";
            $self .= "?";
        }
        
        for($i = 0; $i < sizeof($gender); $i++){
            if($i == sizeof($gender)-1)
            {
                $where .= "gioitinh LIKE '" . $gender[$i] . "')";
                $self .= "Gender[]=$gender[$i]";
            }
            else
            {
                $where .= "gioitinh LIKE '" . $gender[$i] . "' OR ";
                $self .= "Gender[]r=$gender[$i]&";
            }
        }
    }
   
    
    if(isset($_GET['min']) || isset($_GET['max']))
    {
        if(isset($_GET['min'])){
            $min = $_GET['min'];
        }else
            $min = null;
        
        if(isset($_GET['max'])){
            $max = $_GET['max'];
        }else
            $max = null;
        
        
        if($min != null || $max != null) {
            if ($where != ""){
                $where .= " AND (";
                $self .= "&";
            }
            else{
                $where .= " (";
                $self.="?";
            }
            if($min != null && $max != null) {
                $where .= " dongia >= $min AND dongia <= $max";
                $self.= "min=$min&max=$max";
            }else if($min!= null){
                $where .= " dongia >= $min";
                $self.= "min=$min";
                
            }else if($max != null){
                $where .= " dongia <= $max";
                $self.= "max=$max";
                
            }
            $where .=" )";

        }
    
        
        
    }
    echo $self;
    
    


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
    <?php
        include_once 'Header.php';
    ?>
    <!--== Header Area End ==-->

    <!--== Search Box Area Start ==-->
    <div class="body-popup-modal-area">
        <span class="modal-close"><img src="assets/img/cancel.png" alt="Close" class="img-fluid"/></span>
        <div class="modal-container d-flex">
            <div class="search-box-area">
                <div class="search-box-form">
                    <form action="shop.php" method="get">
                        <?php
                            if(isset($_GET['type']))
                            {
                                foreach($_GET['type'] as $temp){
                                    echo '<input type="hidden" name="type[]" value="' . $temp . '"/>';
                                }
                            }
                            
                            if(isset($_GET['Gender']))
                            {
                                foreach($_GET['Gender'] as $temp){
                                    echo '<input type="hidden" name="Gender[]" value="' . $temp . '"/>';
                                }
                            }
                            if(isset($_GET['min']) || isset($_GET['max'])){
                                echo '<input type="hidden" name="min" value="' . $_GET['min'] . '"/>';
                                echo '<input type="hidden" name="max" value="' . $_GET['max'] . '"/>';
                            }
                            
                        ?>
                        <input type="search" name="key" placeholder="type keyword and hit enter"/>
                        <button class="btn" type="submit"><i class="fa fa-search"></i></button>
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
                                        <?php
                                            if(isset($_GET['key']))
                                            {
                                                echo "<input type='hidden' name='key' value='".$_GET['key']."'>";
                                            }
                                        ?>

                                        <div class="shopping-option-item">
                                            <h4>Search</h4>
                                            <?php
                                                if(isset($_GET['key']))
                                                {
                                                  echo '<input type="search" name="key" placeholder="Search for name" value="'.$_GET['key'].'">';
                                                  
                                                }else
                                                    echo '<input type="search" name="key" placeholder="Search for name">
'
                                            ?>
                                        </div>
                                        
                                        
                                        <div class="shopping-option-item">
                                            <h4>Jewelry</h4>

                                            <ul class="sidebar-list">
                                                
                                                <?php
                                                    $sql = "SELECT * FROM loaisanpham";
                                                    
                                                    $result = ExecuteQuery($sql);
                                                    if ($result->num_rows > 0) {
                                                        while ($row = $result->fetch_array()) {
                                                            
                                                            if(isset($_GET['type'])){
                                                                if(in_array($row['malsp'],$type))
                                                                {
                                                                    $str = '<li><input type="checkbox" checked value="' . $row['malsp'] . '"name="' . 'type[]' . '">';
                                                                }else
                                                                    $str = '<li><input type="checkbox" value="' . $row['malsp'] . '"name="' . 'type[]' . '">';
                                                            }else
                                                                $str = '<li><input type="checkbox" value="' . $row['malsp'] . '"name="' . 'type[]' . '">';
                                                            
                                                            
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
                                                    <?php
                                                        if(isset($_GET['Gender'])){
                                                            if(in_array("M",$gender)){
                                                                echo '<input type="checkbox" checked value="M" name="Gender[]">';
                                                            }
                                                            else
                                                                echo '<input type="checkbox" value="M" name="Gender[]">';
                                                            
                                                        }else
                                                            echo '<input type="checkbox" value="M" name="Gender[]">';
                                                    ?>
                                                    <label class="form-check-label" for="Gender[]"
                                                           style="font-family: 'Droid Serif'; font-style: italic; color: #202020; font-size: 1.4rem">Men</label>
                                                </li>
                                                <li>
                                                    <?php
                                                        if(isset($_GET['Gender'])){
                                                            if(in_array("F",$gender)){
                                                                echo '<input type="checkbox" checked value="F" name="Gender[]">';
                                                            }
                                                            else
                                                                echo '<input type="checkbox" value="F" name="Gender[]">';
                                                            
                                                        }else
                                                            echo '<input type="checkbox" value="F" name="Gender[]">';
                                                    ?>
                                                    <label class="form-check-label" for="Gender[]"
                                                           style="font-family: 'Droid Serif'; font-style: italic; color: #202020; font-size: 1.4rem">Women</label>
                                                </li>
                                                <li>
                                                    <?php
                                                        if(isset($_GET['Gender'])){
                                                            if(in_array("U",$gender)){
                                                                echo '<input type="checkbox" checked value="U" name="Gender[]">';
                                                            }
                                                            else
                                                                echo '<input type="checkbox" value="U" name="Gender[]">';
                                                            
                                                        }else
                                                            echo '<input type="checkbox" value="U" name="Gender[]">';
                                                    ?>                                                    <label class="form-check-label" for="Gender[]"
                                                           style="font-family: 'Droid Serif'; font-style: italic; color: #202020; font-size: 1.4rem">Unisex</label>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="shopping-option-item">
                                            <h4>Price</h4>

                                            <?php
                                                if(isset($_GET['min'])){
                                                    echo ' <input type="number" id="min" name="min" min="1" style="width: 75px"
                                                   onchange="setMin()" value="'.$_GET['min'].'">';
                                                }
                                                else{
                                                    echo ' <input type="number" id="min" name="min" min="1" style="width: 75px"';
                                                }
                                                echo '<span>to</span>';
                                                if(isset($_GET['max'])){
                                                    echo '<input type="number" id="max" name="max" style="width: 75px" value="'.$_GET['max'].'">';
                                                }else
                                                    echo '<input type="number" id="max" name="max" style="width: 75px">'
                                            ?>
                                            

                                        </div>

                                        <div class="shopping-option-item">
                                            <a><input class="btn btn-add-to-cart"  type="submit" value="Search" style="width: 200px;" ></a>
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
                                        $sql = "SELECT * FROM sanpham WHERE (soluong > 0)";
                                        if($where != '')
                                            $sql .= " AND" . $where;
                                        $sql .= " LIMIT $offset, $rowsPerPage";
                                        $result = ExecuteQuery($sql);
                                        if($result->num_rows > 0){
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
                                                echo '<span class="price">'.'$'.$row['dongia'].'</span>';
                                                echo '<form method="post">';
                                                echo '<input type="hidden" name="id" value="'.$row['idsanpham'].'">';
                                                echo '<input type="hidden" name="quantity" value="1">';
                                                echo '<button type="submit" name="addToCart" value="addcart" class="btn btn-add-to-cart" style="border: 1px solid black;">+ Add to Cart</button>';
                                                echo '</form>';
                                                echo ' </div></div>';
                                                echo '</div>';
                                            }
                                        }else
                                        {
                                            echo '<div class="col-lg-12 col-sm-12"><h1>Browse 0 results"</h1></div>';
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
                                        if($where!='')
                                            $sql .= " WHERE " . $where . " AND (soluong > 0)";
                                        $result = ExecuteQuery($sql);
                                        $row = $result->fetch_array();
                                        
                                        $numrows = $row['numrows'];
                                        if($numrows > 0){
                                            $maxPage = ceil($numrows / $rowsPerPage);
                                            if($self != "shop.php"){
                                                $self .= "&";
                                            }
                                            else
                                                $self .= '?';
                                            $nav = '';
                                          
                                            if($self != "shop.php"){
                                                $self .= "&";
                                            }
                                            else
                                                $self .= '?';
                                            $nav = '';
                                            for($page = 1; $page <= $maxPage; $page++){
                                                if($page == $pageNum)
                                                {
                                                    $nav = $nav. '<li><a class="current">'.$pageNum.'</a></li>';
                                                }
                                                else{
                                                    $nav = $nav . ' <li><a href="'.$self.'page='.$page.'">'.$page.'</a></li>';
                                                }
                                            }
                                            
                                            if($pageNum > 1){
                                                $page = $pageNum - 1;
                                                $prev = '<li><a href="'.$self.'page='.$page.'" aria-label="Previous">&lt;</a></li>';
                                                $first = '<li><a href="'.$self.'page=1" aria-label="Previous">&laquo;</a></li>';
                                            }else
                                            {
                                                $prev = '<li style="display: none"><a href="'.$self.'page='.$page.'" aria-label="Previous">&lt;</a></li>';
                                                $first = '<li style="display: none;"><a href="'.$self.'page=1" aria-label="Previous">&laquo;</a></li>';
                                            }
                                            
                                            if($pageNum < $maxPage){
                                                $page = $pageNum + 1;
                                                $next = '<li><a href="'.$self.'page='.$page.'" aria-label="Next">&gt;</a></li>';
                                                $last = '<li><a href="'.$self.'page='.$maxPage.'" aria-label="Next">&raquo;</a></li>';
                                            }else
                                            {
                                                $next = '';
                                                $last = '';
                                            }
                                            echo $first . $prev . $nav . $next . $last;
                                        }
                                       
                                    
                                    
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