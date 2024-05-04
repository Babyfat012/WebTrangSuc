<?php
    session_start();
    require 'lib/lib.php';
    if(!isset($_SESSION['cart'])){
        if(!isset($_SESSION['cart'])){
            $_SESSION['cart'] = [];
        }
    }
    
    
    if(isset($_POST['addToCart']))
    {
        $id = $_POST['id'];
        $quantity = $_POST['quantity'];
        addToCart($id, $quantity);
    }
   var_dump($_SESSION['cart']);
    
    
    
    $rowsPerPage = 6;
    $pageNum = 1;
    $self ="Ring.php";
    $root = "Ring.php";
    $where = "(maloaisp = 'RG')";
    
    if(isset($_GET["page"])){
        $pageNum = $_GET["page"];
    }
    $offset = ($pageNum - 1) * $rowsPerPage;

    if(isset($_GET['key']))
    {
        $key = $_GET['key'];
        if($where == "(maloaisp = 'RG')"){
            $where .= " AND (tensp LIKE '%" . $key . "%')" ;
            $self = "Ring.php?key=$key";
            
        }
        else{
            $where .= " AND (tensp LIKE '%" . $key . "%')" ;
            $self .= "&key=$key";
        }
        
    }
   
    
    
   
    
    if(isset($_GET['Gender']))
    {
        $gender = $_GET['Gender'];
        if($where != "(maloaisp = 'RG')"){
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
                $self .= "Gender[]=$gender[$i]&";
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
            if ($where != "(maloaisp = 'RG')"){
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
    echo $where;
    
    


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
                    <form action="Ring.php" method="get">
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
                            if(isset($_GET['min'])){
                                echo '<input type="hidden" name="min" value="' . $_GET['min'] . '"/>';
                            }
                            if( isset($_GET['max'])){
                                echo '<input type="hidden" name="max" value="' . $_GET['max'] . '"/>';}
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
                            <li><a href="index.php">Home</a></li>
                            <li><a href="shop.php" class="active">Shop</a></li>
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
                                    <form action="Ring.php" method="get">
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
                                                    echo ' <input type="number" onchange="setMin()" id="min" name="min" min="1" style="width: 75px"';
                                                }
                                                echo '<span>to</span>';
                                                if(isset($_GET['max'])){
                                                    echo '<input type="number" onchange="setMin()" id="max" name="max" style="width: 75px" value="'.$_GET['max'].'">';
                                                }else
                                                    echo '<input type="number" onchange="setMin()" id="max" name="max" style="width: 75px">'
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
                                                echo '<span class="price">'.'$'.number_format( $row['dongia'],2,".",",").'</span>';
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
                                            $sql .= " WHERE " . $where . " AND (soluong > 0)";
                                        $result = ExecuteQuery($sql);
                                        $row = $result->fetch_array();
                                        
                                        $numrows = $row['numrows'];
                                        if($numrows > 0){
                                            $maxPage = ceil($numrows / $rowsPerPage);
                                            if($self != "Ring.php"){
                                                $self .= "&";
                                            }
                                            else
                                                $self .= '?';
                                            $nav = '';
                                          
                                            if($self != "Ring.php"){
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
    <?php
        include_once 'Footer.php';
    ?>
    <!-- Footer Area End -->

    

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