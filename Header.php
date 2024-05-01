<header id="header-area">
    <div class="ruby-container">
        <div class="row">
            <!-- Logo Area Start -->
            <div class="col-2 col-lg-1 col-xl-2 m-auto">
                <a href="index.html" class="logo-area">
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
                            <li class="dropdown-show"><a href="shop.html">Jewerlry</a></li>
                            
                            <li class="dropdown-show"><a href="shop.html">Necklaces</a></li>
                            <li class="dropdown-show"><a href="shop.html">Bracelets</a></li>
                            <li class="dropdown-show"><a href="shop.html">Rings</a></li>
                            
                            <li><a href="contact.html">Contact Us</a></li>
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
                        <li class="shop-cart"><a href="#"><i class="fa fa-shopping-bag"></i> <span
                                        class="count">3</span></a>
                            <div class="mini-cart">
                                <div class="mini-cart-body">
                                    <div class="single-cart-item d-flex">
                                        <figure class="product-thumb">
                                            <a href="#"><img class="img-fluid" src="assets/img/product-1.jpg"
                                                             alt="Products"/></a>
                                        </figure>

                                        <div class="product-details">
                                            <h2><a href="#">Sprite Yoga Companion</a></h2>
                                            <div class="cal d-flex align-items-center">
                                                <span class="quantity">3</span>
                                                <span class="multiplication">X</span>
                                                <span class="price">$77.00</span>
                                            </div>
                                        </div>
                                        <a href="#" class="remove-icon"><i class="fa fa-trash-o"></i></a>
                                    </div>
                                    <div class="single-cart-item d-flex">
                                        <figure class="product-thumb">
                                            <a href="#"><img class="img-fluid" src="assets/img/product-2.jpg"
                                                             alt="Products"/></a>
                                        </figure>
                                        <div class="product-details">
                                            <h2><a href="#">Yoga Companion Kit</a></h2>
                                            <div class="cal d-flex align-items-center">
                                                <span class="quantity">2</span>
                                                <span class="multiplication">X</span>
                                                <span class="price">$6.00</span>
                                            </div>
                                        </div>
                                        <a href="#" class="remove-icon"><i class="fa fa-trash-o"></i></a>
                                    </div>
                                    <div class="single-cart-item d-flex">
                                        <figure class="product-thumb">
                                            <a href="#"><img class="img-fluid" src="assets/img/product-3.jpg"
                                                             alt="Products"/></a>
                                        </figure>
                                        <div class="product-details">
                                            <h2><a href="#">Sprite Yoga Companion Kit</a></h2>
                                            <div class="cal d-flex align-items-center">
                                                <span class="quantity">1</span>
                                                <span class="multiplication">X</span>
                                                <span class="price">$116.00</span>
                                            </div>
                                        </div>
                                        <a href="#" class="remove-icon"><i class="fa fa-trash-o"></i></a>
                                    </div>
                                </div>
                                <div class="mini-cart-footer">
                                    <a href="checkout.html" class="btn-add-to-cart">Checkout</a>
                                </div>
                            </div>
                        </li>
                        <?php
                        if(isset($_SESSION['userName'])){ ?>
                            <li class="settings"><a href="" onclick="onClickUserIcon()"><i class="fa fa-user"> <?php echo $_SESSION['fullName']?></i></a>
                        <div class="site-settings d-block d-sm-flex">
                            <dl class="my-account">
                                <dt>My Account</dt>
                                <dd><a href="#">Dashboard</a></dd>
                                <dd><a href="#">Profile</a></dd>
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
                                    <dd><a href="login-register.php">Sign In</a></dd>
                                    <dd><a href="login-register.php">Sign Up</a></dd>

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