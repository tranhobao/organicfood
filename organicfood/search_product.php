<?php
    include('connect.php');

    if(isset($_GET['keyword'])){
        $a = $_GET['keyword'];
    }else{
        $a = '';

    }

    
    $abcde = $db->query("SELECT * FROM product WHERE name like '%$a %' Order By  id ASC LIMIT 8 ");
    // while($pro = $abcde->fetch_object()){
    // $item = [
    //      $pro->id      
        
    //     ];
        
    // }
    // echo '<pre >';
    // print_r($item);
    

    // if(isset($_GET['trang'])){
    //     $page = $_GET['trang'];
    //     if($page > $trang)
    //         $page = 1;
    //     if($page < 1){
    //         $page = +$trang + -1;
    //     }
    // }
    // else{
    //     $page = 1;
    // }
    // if( $page == 1){
    //     $abcde = $db->query("SELECT * FROM product WHERE name like '%$a %' Order By  id ASC LIMIT 8 ");
    // }else{
    //     $begin = $page
    //     $abcde = $db->query("SELECT * FROM product WHERE name like '%$a %' Order By  id ASC LIMIT 8 ");
    // }
    

    

?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Shop page - Organic Food Html5 Template</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
		
		<!-- all css here -->
        <?php
            include('pages/import.php');
        ?>
    </head>
    <body>
            <!-- Add your site or application content here -->
            <?php
                include('pages/menu.php');
            ?>

			<div class="breadcrumb_container">
				<div class="container-fluid">
					<div class="row">
						<div class="col-12">     
							<nav>
						<ul>
							<li>
								<a href="index.php">Trang chủ ></a>
							</li>
							<li>Sản Phẩm</li>
						</ul>
					</nav>
						</div>
					</div> 
				</div>        
			</div>
         	<div class="organic_food_wrapper">        
                <!--- shop_wrapper area  -->
                <div class="shop_wrapper ptb-90">
                    <div class="container-fluid">
                        <div class="row">
                            
                            <div class="col-lg-9 col-md-12 col-12">
                                <div class="categories_banner">
                                    <div class="categories_banner_inner">
                                        <img src="assets/img/banner/shop.jpg" alt="">
                                    </div>
                                    <h3>SHOP</h3>
                                </div>
                                <div class="tav_menu_wrapper">
                                    <div class="row align-items-center">
                                        <div class="col-lg-6 col-md-7 col-sm-6">
                                            <div class="tab_menu shop_menu">
                                                <div class="tab_menu_inner">
                                                    <ul class="nav" role="tablist">
                                                        <li><a  class="active" data-toggle="tab" href="#shop_active" role="tab" aria-controls="shop_active" aria-selected="true"><i class="fa fa-th" aria-hidden="true"></i></a></li>

                                                        <li><a data-toggle="tab" href="#featured_active" role="tab" aria-controls="featured_active" aria-selected="false"><i class="fa fa-list" aria-hidden="true"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="tab_menu_right">    
                                                    <p>There are 14 products.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-5 col-sm-6">
                                            <div class="Relevance">
                                                <span>Lọc :</span>
                                                <div class="dropdown dropdown-shop">
                                                    <select name="drop" id="dropdown">
                                                        <option value="1">Relevance</option>   
                                                        <option value="2">Name, A to Z</option>
                                                        <option value="2">Name, Z to A</option>
                                                        <option value="2">Price, low to high</option>
                                                        <option value="2">Price, high to low</option>
                                                    </select>
                                                </div>
                                            </div>    
                                        </div>    
                                    </div>
                                </div> 
                                <div class="tab_product_wrapper">
                                    <div class="tab-content">

                                    
                                        <div class="tab-pane fade show active" id="shop_active" >
                                            <div class="row">
                                            
                                                <?php 
                                                    while($spshop = $abcde->fetch_object()) :
                                                ?>
                                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                                    <div class="single__product">
                                                        <div class="single_product__inner">
                                                            <span class="new_badge">new</span>
                                                            <div class="product_img">
                                                                <a href="product-details.php?id=<?php echo $spshop->id;?>&groupid=<?php echo $spshop->groupid;?>">
                                                                    <img src="<?= $spshop->image ?>" alt="">
                                                                </a>
                                                            </div>
                                                            <div class="product__content text-center">
                                                                <div class="produc_desc_info">
                                                                    <div class="product_title">
                                                                        <h4><a href="product-details.php?id=<?php echo $spshop->id;?>&groupid=<?php echo $spshop->groupid;?>">
                                                                        <?= $spshop->name ?></a></h4>
                                                                    </div>
                                                                    <div class="product_price">
                                                                    <?php if($spshop->pricenew > 0) : ?>
                                                                        <s style="color:#5555; font-size:14px; font-weight:600;"><?= number_format($spshop->price) ?>VND</s>
                                                                        <p><?= number_format($spshop->pricenew) ?>VND</p>
                                                                        
                                                                    <?php else : ?>
                                                                        <p><?= number_format($spshop->price) ?>VND</p>
                                                                    <?php endif ?>
                                                                    </div>
                                                                </div>
                                                                <div class="product__hover">
                                                                    <ul>
                                                                        <li><a href="add.php?id=<?php echo $spshop->id;?>&groupid=<?php echo $spshop->groupid;?>"><i class="ion-android-cart"></i></a></li>
                                                                        <li><a class="cart-fore" href="#" data-toggle="modal" data-target="#my_modal"  title="Quick View" ><i class="ion-android-open"></i></a></li>
                                                                        <li><a href="product-details.php?id=<?php echo $spshop->id;?>&groupid=<?php echo $spshop->groupid;?>"><i class="ion-clipboard"></i></a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> 
                                                <?php endwhile; ?>

                                            </div>
                                        </div>
                                        
                                    </div>  
                                   
                                </div>
                                <div class="shop_pagination">
                                    <div class="row align-items-center">   
                                        
                                        <div class="col-lg-6 offset-lg-2 col-md-6 col-sm-6">
                                            <div class="page_list_clearfix text-center">
                                                <ul>
                                                    <li class="prev"><a href="#"><i class="zmdi zmdi-chevron-left"></i> Previous</a></li>
                                                    <li>  <input class="form-control" type="text" id="page_index" value=" <?php if(!isset($page)) $page = 1; echo $page; ?> "></li>
                                                    <li class="next"> <a type="submit" onclick="this.href='search_product.php?trang=' + ( +document.getElementById('page_index').value + +1) "> Next <i class="zmdi zmdi-chevron-right"></i></a></li>
                                                </ul> 
                                            </div>         
                                        </div>
                                    </div>          
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>   
                <!--- shop_wrapper area end  -->

                
                
                 <!-- footer start -->
                <footer class="footer pt-90">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-3 col-md-12 col-xs-12">
                                <!--Single Footer-->
                                <div class="single_footer widget">
                                    <div class="single_footer_widget_inner">
                                        <div class="footer_logo">
                                            <a href="#"><img src="assets/img/logo/logo_footer.png" alt=""></a>
                                        </div>
                                        <div class="footer_content">
                                            <p>Địa chỉ: 273 An Dương Vương - Phường 3 - Quận 5 - TP Hồ Chí Minh </p>
                                            <p>Điện thoại: 0283 835 2309.</p>
                                            <p>Email:  freshfoodBamBo@gmail.com</p>
                                        </div>
                                        <div class="footer_social">
                                            <h4>Liên hệ qua:</h4>
                                            <div class="footer_social_icon">
                                                <a href="https://twitter.com/blackpink_lisa?fbclid=IwAR20IyOX2MhITymprTtH-MkUKduPhehMAj_2V13KK9uVWhHniNg30F7pnp8"><i class="fa fa-twitter"></i></a>
                                                <a href="https://www.instagram.com/ngoctrinh89/?fbclid=IwAR21QQFIbbYGFqCpL1EXNOQ2InIcNBeedTGPcFPrrQh2otlgPi0DSWMXB1g"><i class="fa fa-instagram"></i></a>
                                                <a href="https://www.facebook.com/vohoangyenmodel"><i class="fa fa-facebook"></i></a>
                                                <a href="https://www.youtube.com/channel/UCqECaJ8Gagnn7YCbPEzWH6g"><i class="fa fa-youtube"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--Single Footer-->
                            </div>
                            <div class="col-lg-6 col-md-12 col-xs-12">
                                <div class="footer_menu_list d-flex justify-content-between">
                                    <!--Single Footer-->
                                    <div class="single_footer widget">
                                        <div class="single_footer_widget_inner">
                                            <div class="footer_title">
                                                <h2>Products</h2>
                                            </div>
                                            <div class="footer_menu">
                                                <ul>
                                                <li><a href="index.php?#spnoibat">Sản Phẩm Nổi Bật</a></li>
                                                <li><a href="index.php?#spmoi">Sản Phẩm Mới</a></li>
                                                <li><a href="index.php?#spbanchay">Sản Phẩm Bán Chạy</a></li>
                                                <li><a href="index.php?#spshop">Sản Phẩm Của Shop</a></li>
                                                <li><a href="#"> My account</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Single footer end-->   
                                    <!--Single footer start-->   
                                    <div class="single_footer widget">
                                        <div class="single_footer_widget_inner">   
                                            <div class="footer_title">
                                                <h2>Login</h2>
                                            </div>
                                            <div class="footer_menu">
                                                <ul>
                                                    <li><a href="#">Sitemap</a></li>
                                                    <li><a href="#"> Stores</a></li>
                                                    <li><a href="#"> Login</a></li>
                                                    <li><a href="#"> Contact us</a></li>
                                                    <li><a href="#"> My account</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Single Footer end-->
                                    <!--Single footer start-->   
                                    <div class="single_footer widget">
                                        <div class="single_footer_widget_inner">   
                                            <div class="footer_title">
                                                <h2> Your account </h2>
                                            </div>
                                            <div class="footer_menu">
                                                <ul>
                                                    <li><a href="#">Personal info</a></li>
                                                    <li><a href="#"> Orders</a></li>
                                                    <li><a href="#"> Login</a></li>
                                                    <li><a href="#"> Credit slips</a></li>
                                                    <li><a href="#"> Addresses</a></li>
                                                </ul> 
                                            </div>
                                        </div>
                                    </div>
                                    <!--Single Footer end-->
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-12 col-xs-12">
                                <div class="footer_title">
                                    <h2> Join Our Newsletter Now </h2>
                                </div>
                                <div class="footer_news_letter">
                                    <p>Get E-mail updates about our latest shop and special offers.</p>
                                    <div class="newsletter_form">
                                        <form action="#">
                                            <input type="email" required placeholder="Your Email Address">
                                            <input type="submit" value="Subscribe">
                                        </form>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    
                    <div class="copyright">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-xs-12">
                                    <div class="copyright_text">
                                        <p>Copyright 2018 <a href="#">Organicfood</a>. All Rights Reserved</p>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-xs-12">
                                    <div class="footer_mastercard text-right">
                                        <a href="#"><img src="assets/img/brand/payment.png" alt=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </footer>
                
                <!-- footer end -->

            </div>
           
           
           <!--organicfood wrapper end--> 
           
             <!-- modal area start --> 
           <div class="modal fade" id="my_modal" tabindex="-1" role="dialog"  aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="modal-body shop">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-5 col-md-5 col-sm-12">
                                        <div class="product-flags madal">  
                                            <div class="tab-content" id="pills-tabContent">
                                                <div class="tab-pane fade show active" id="imgeone" role="tabpanel" >
                                                    <div class="product_tab_img">
                                                        <a href="#"><img src="assets/img/cart/nav12.jpg" alt=""></a>    
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="imgetwo" role="tabpanel">
                                                    <div class="product_tab_img">
                                                        <a href="#"><img src="assets/img/cart/nav11.jpg" alt=""></a>    
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="imgethree" role="tabpanel">
                                                    <div class="product_tab_img">
                                                        <a href="#"><img src="assets/img/cart/nav13.jpg" alt=""></a>    
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="products_tab_button  modals">    
                                                <ul class="nav product_navactive" role="tablist">
                                                    <li >
                                                        <a class="nav-link active" data-toggle="tab" href="#imgeone" role="tab" aria-controls="imgeone" aria-selected="false"><img src="assets/img/cart/nav.jpg" alt=""></a>
                                                    </li>
                                                    <li>
                                                         <a class="nav-link" data-toggle="tab" href="#imgetwo" role="tab" aria-controls="imgetwo" aria-selected="false"><img src="assets/img/cart/nav1.jpg" alt=""></a>
                                                    </li>
                                                    <li>
                                                       <a class="nav-link button_three" data-toggle="tab" href="#imgethree" role="tab" aria-controls="imgethree" aria-selected="false"><img src="assets/img/cart/nav2.jpg" alt=""></a>
                                                    </li>
                                                </ul>
                                            </div>    
                                        </div>  
                                    </div> 
                                    <div class="col-lg-7 col-md-7 col-sm-12">
                                        <div class="modal_right">
                                            <div class="shop_reviews">
                                                <div class="demo_product">
                                                    <h2>Sprite Yoga Straps1</h2> 
                                                </div>
                                                <div class="current_price">
                                                    <span class="regular">$64.99</span>    
                                                    <span class="regular_price" >$78.99</span>    
                                                </div>
                                                <div class="product_information product_modal">
                                                    <div id="product_modal_content">
                                                        <p>Short-sleeved blouse with feminine draped sleeve detail.</p>    
                                                    </div>
                                                    <div class="product_variants">
                                                        <div class="product_variants_item modal_item">
                                                            <span class="control_label">Size</span>
                                                            <select id="group_1">
                                                                <option value="1">S</option>
                                                                <option value="2" selected="selected">M</option>
                                                                <option value="3">L</option>
                                                            </select>    
                                                        </div>   
                                                        
                                                       <div class="quickview_plus_minus">
                                                            <span class="control_label">Quantity</span>
                                                            <div class="quickview_plus_minus_inner">
                                                                <div class="cart-plus-minus">
                                                                    <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                                </div>
                                                               <div class="add_button add_modal">
                                                                    <button type="submit"> Add to cart</button> 
                                                                </div>
                                                            </div>    
                                                        </div> 
                                                        
                                                        <div class="cart_description">
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>    
                                                        </div> 
                                                    </div>
                                                </div>   
                                            </div>    
                                        </div>    
                                    </div>    
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="social-share">
                                            <h3>Share this product</h3>
                                            <ul>
                                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                            </ul>    
                                        </div>    
                                    </div>    
                                </div>     
                            </div>
                        </div>    
                    </div>
                </div>
            </div> 
            
    
          <!-- modal area end --> 
            
  
		
		
		<!-- all js here -->
        <script src="assets/js/vendor/jquery-1.12.0.min.js"></script>
        <script src="assets/js/popper.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery-ui.js"></script>
        <script src="assets/js/isotope.pkgd.min.js"></script>
        <script src="assets/js/imagesloaded.pkgd.min.js"></script>
        <script src="assets/js/jquery.counterup.min.js"></script>
        <script src="assets/js/waypoints.min.js"></script>
        <script src="assets/js/ajax-mail.js"></script>
        <script src="assets/js/owl.carousel.min.js"></script>
        <script src="assets/js/plugins.js"></script>
        <script src="assets/js/main.js"></script>
    </body>

</html>
