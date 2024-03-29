<?php

include_once "app/database/models/Category.php";
include_once "app/database/models/Subcategory.php";

$categoryObject = new Category;
$categoryRead = $categoryObject->read();
$subcategoryObject = new Subcategory;
$subcategoryRead=$subcategoryObject->read();

?>

<header class="header-area gray-bg clearfix">
    <div class="header-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="logo">
                        <a href="index.php">
                            <img alt="" src="assets/img/logo/logo.png">
                        </a>
                    </div>
                </div>
                <div class="col-lg-9 col-md-8 col-6">
                    <div class="header-bottom-right">
                        <div class="main-menu">
                            <nav>
                                <ul>
                                    <li class="top-hover"><a href="index.php">home</a>
                                    </li>
                                    <li class="top-hover"><a href="shop.php">shop</a>


                                    </li>
                                   
                                   
                                    <li class="mega-menu-position top-hover"><a href="shop.php">Categories</a>
                                        <ul class="mega-menu">
                                          <?php

                                          if ($categoryRead) {
                                             $categories = $categoryRead->fetch_all(MYSQLI_ASSOC);
                                             
                                             foreach ($categories as $key => $category) {?>
                                                   
                                                   <li>
                                                        <ul>
                                                            <li class="mega-menu-title"><a class="h5 text-success" href="#shop-catigory-1"><?= $category['name_en'] ?></a></li>
                                                            <?php 
                                                            if ($subcategoryRead) {
                                                             $subcategories = $subcategoryRead->fetch_all(MYSQLI_ASSOC);
                                                            //  print_r($subcategories);die;
                                                             foreach ($subcategories as $index => $subcategory) {?>
                                                            
                                                            <li><a href="shop.php?sub=<?= $subcategory['id'] ?>"><?= $subcategory['name_en'] ?></a></li>
                                                            <?php }}?>
                                                        </ul>
                                                    </li>


                                             <?php }}?>  
                                            
                                           
                                        </ul>
                                    </li>
                                    <li><a href="about-us.php">about</a></li>
                                    <li><a href="contact.php">contact</a></li>

                                </ul>
                            </nav>
                        </div>
                        <div class="header-currency">
                        <?php
                            if (isset($_SESSION['user'])) { ?>
                                <span class="digit"><?= $_SESSION['user']->first_name . ' ' . $_SESSION['user']->last_name ?> <i class="ti-angle-down"></i></span>
                                <div class="dollar-submenu">
                                    <ul>
                                        <li><a href="my-account.php">My Account</a></li>
                                        <li><a href="logout.php">Logout</a></li>
                                    </ul>
                                </div>
                            <?php } else { ?>
                                <span class="digit">Welcome <i class="ti-angle-down"></i></span>
                                <div class="dollar-submenu">
                                    <ul>
                                        <li><a href="register.php">Register</a></li>
                                        <li><a href="login.php">Login</a></li>
                                    </ul>
                                </div>
                            <?php } ?>
                            </div>
                        </div>
                    
                    </div>
                </div>
            </div>
            <div class="mobile-menu-area">
                <div class="mobile-menu">
                    <nav id="mobile-menu-active">
                        <ul class="menu-overflow">
                            <li><a href="#">HOME</a>
                                <ul>
                                    <li><a href="index.php">home version 1</a></li>
                                    <li><a href="index-2.php">home version 2</a></li>
                                </ul>
                            </li>
                            <li><a href="#">pages</a>
                                <ul>
                                    <li><a href="about-us.php">about us </a></li>
                                    <li><a href="shop.php">shop Grid</a></li>
                                    <li><a href="shop-list.php">shop list</a></li>
                                    <li><a href="product-details.php">product details</a></li>
                                    <li><a href="cart-page.php">cart page</a></li>
                                    <li><a href="checkout.php">checkout</a></li>
                                    <li><a href="wishlist.php">wishlist</a></li>
                                    <li><a href="my-account.php">my account</a></li>
                                    <li><a href="login-register.php">login / register</a></li>
                                    <li><a href="contact.php">contact</a></li>
                                </ul>
                            </li>
                            <li><a href="shop.php"> Shop </a>
                                <ul>
                                    <li><a href="#">Categories 01</a>
                                        <ul>
                                            <li><a href="shop.php">Aconite</a></li>
                                            <li><a href="shop.php">Ageratum</a></li>
                                            <li><a href="shop.php">Allium</a></li>
                                            <li><a href="shop.php">Anemone</a></li>
                                            <li><a href="shop.php">Angelica</a></li>
                                            <li><a href="shop.php">Angelonia</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Categories 02</a>
                                        <ul>
                                            <li><a href="shop.php">Balsam</a></li>
                                            <li><a href="shop.php">Baneberry</a></li>
                                            <li><a href="shop.php">Bee Balm</a></li>
                                            <li><a href="shop.php">Begonia</a></li>
                                            <li><a href="shop.php">Bellflower</a></li>
                                            <li><a href="shop.php">Bergenia</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Categories 03</a>
                                        <ul>
                                            <li><a href="shop.php">Caladium</a></li>
                                            <li><a href="shop.php">Calendula</a></li>
                                            <li><a href="shop.php">Carnation</a></li>
                                            <li><a href="shop.php">Catmint</a></li>
                                            <li><a href="shop.php">Celosia</a></li>
                                            <li><a href="shop.php">Chives</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Categories 04</a>
                                        <ul>
                                            <li><a href="shop.php">Daffodil</a></li>
                                            <li><a href="shop.php">Dahlia</a></li>
                                            <li><a href="shop.php">Daisy</a></li>
                                            <li><a href="shop.php">Diascia</a></li>
                                            <li><a href="shop.php">Dusty Miller</a></li>
                                            <li><a href="shop.php">Dame’s Rocket</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="#">BLOG</a>
                                <ul>
                                    <li><a href="blog-masonry.php">Blog Masonry</a></li>
                                    <li><a href="#">Blog Standard</a>
                                        <ul>
                                            <li><a href="blog-left-sidebar.php">left sidebar</a></li>
                                            <li><a href="blog-right-sidebar.php">right sidebar</a></li>
                                            <li><a href="blog-no-sidebar.php">no sidebar</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Post Types</a>
                                        <ul>
                                            <li><a href="blog-details-standerd.php">Standard post</a></li>
                                            <li><a href="blog-details-audio.php">audio post</a></li>
                                            <li><a href="blog-details-video.php">video post</a></li>
                                            <li><a href="blog-details-gallery.php">gallery post</a></li>
                                            <li><a href="blog-details-link.php">link post</a></li>
                                            <li><a href="blog-details-quote.php">quote post</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="contact.php"> Contact us </a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>