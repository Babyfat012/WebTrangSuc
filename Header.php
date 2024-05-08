<?php
 if(isset($_SESSION['userName'])){
     $sql = "SELECT * FROM khachhang WHERE taikhoankh='".$_SESSION['userName']."'";
     $result = executeQuery($sql);
     $row = $result->fetch_array();
     if($row['trangthaitk'] == '0')
     {
         header("location:logout.php");
     }
 }
 
?>
<header id="header-area">
    <div class="ruby-container">
        <div class="row">
            <!-- Logo Area Start -->
            <div class="col-2 col-lg-1 col-xl-2 m-auto">
                <a href="index.php" class="logo-area">
                    <img src="assets/img/logo.png" alt="Logo" class="img-fluid"/>
                </a>
            </div>
            <!-- Logo Area End -->
            
            <!-- Navigation Area Start -->
            <div class="col-2 col-lg-9 col-xl-8 m-auto">
                <div class="main-menu-wrap">
                    <nav id="mainmenu">
                        <ul>
                            <li class=""><a href="index.php">Home</a></li>
                            <li ><a href="shop.php">Jewerlry</a></li>
                            
                            <li ><a href="Necklace.php">Necklaces</a></li>
                            <li ><a href="Bracelet.php">Bracelets</a></li>
                            <li><a href="Ring.php">Rings</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- Navigation Area End -->
            
            <!-- Header Right Meta Start -->
            <div class="col-8 col-lg-2 m-auto" id="header-right">
                <div class="header-right-meta text-right">
                    <ul>
                        <li><a href="#" class="modal-active"><i class="fa fa-search"></i></a></li>
                        <li class="shop-cart"><a href="cart.php"><i class="fa fa-shopping-bag"></i> <span
                                        class="count"><?php echo count($_SESSION['cart']);?></span></a>
                            <div class="mini-cart">
                                <div class="mini-cart-body">
                                    
                                    <?php
                                        if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])){
                                            for($i=0; $i<count($_SESSION['cart']); $i++){
                                                $sql = "SELECT * FROM sanpham WHERE idsanpham = '". $_SESSION['cart'][$i][0] ."'";
                                                $result = executeQuery($sql);
                                                $row = $result->fetch_array();
                                                switch($row['maloaisp']){
                                                    case 'NKL':
                                                        $folder = 'assets/img/Necklace/';
                                                        break;
                                                    case 'BRL':
                                                        $folder = 'assets/img/Bracelet/';
                                                        break;
                                                    case 'RG':
                                                        $folder = 'assets/img/Ring/';
                                                        break;
                                                }
                                                echo '<div class="single-cart-item d-flex">';
                                                echo '<figure class="product-thumb">';
                                                echo '<a href="single-product.php?id='.$row['idsanpham'].'"><img class="img-fluid" src="'.$folder.$row['hinhanh'].'"';
                                                echo ' alt="Products"/></a>';
                                                echo '</figure>';
                                                echo '<div class="product-details">';
                                                echo '<h2><a href="single-product.php?id='.$row['idsanpham'].'">'.$row['tensp'].'</a></h2>';
                                                echo '<div class="cal d-flex align-items-center">';
                                                echo '<span class="quantity">'.$_SESSION['cart'][$i][1].'</span>';
                                                echo '<span class="multiplication">X</span>';
                                                echo '<span class="price">$'.number_format($row['dongia'],2,".","," ).'</span>';
                                                echo '</div>';
                                                echo '</div>';
                                              
                                                echo '</div>';
                                                
                                            }
                                        
                                        }
                                    ?>
                                    
                                    
                                </div>
                                <?php if(isset($_SESSION['cart']))
                                    {
                                        if(count($_SESSION['cart']) > 0){
                                            echo '<div class="mini-cart-footer">';
                                            echo '<a href="checkout.php" class="btn-add-to-cart">Checkout</a>';
                                            echo '</div>';
                                        }else
                                        {
                                            echo '<div class="mini-cart-footer">';
                                            echo '<a href="shop.php" class="btn-add-to-cart">SHOP NOW</a>';
                                            echo '</div>';
                                        }
                                    }?>
                                
                            </div>
                        </li>
                        <?php
                        if(isset($_SESSION['userName'])){?>
                            <li style="margin-left:30px; " class="settings"><a href="my-account.php?url=info"><i class="fa fa-user"> <?php echo $_SESSION['userName']?></i></a>
                        <div class="site-settings d-block d-sm-flex">
                            <dl class="my-account">
                                <dt>My Account</dt>
                                <dd><a href="my-account.php?url=info">Profile</a></dd>
                                <dd><a href="my-account.php?url=order">My order</a></dd>
                                <dd><a href="logout.php">Sign Out</a></dd>
                            </dl>
                        </div>
                        </li>
                        <?php
                        } else {
                        ?>
                        <li class="settings" >
                            <a href="login-register.php#login" ><i class="fa fa-user" style="margin-left: 10px"></i></a>
                            <div class="site-settings d-block d-sm-flex" ">
                                <dl class="my-account">
                                    <dt>My Account</dt>
                                    <dd><a href="login-register.php?url=signin">Sign In</a></dd>
                                    <dd><a href="login-register.php?url=signup">Sign Up</a></dd>

                                </dl>
                            </div>
                        </li>
                        <?php
                        }
                        ?>

                       
                    
                    </ul>
                </div>
            </div>
            <!-- Header Right Meta End -->
        </div>
    </div>
</header>

<div class="body-popup-modal-area">
    <span class="modal-close"><img src="assets/img/cancel.png" alt="Close" class="img-fluid"/></span>
    <div class="modal-container d-flex">
        <div class="search-box-area">
            <div class="search-box-form">
                <form action="shop.php" method="get">
                    <input type="search" name="key" placeholder="type keyword and hit enter"/>
                    <button class="btn" type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>