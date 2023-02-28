
<?php
   include('connect.php');
  
   $dsspshop = $db->query("SELECT * FROM product Order By  id ASC LIMIT 8");
   $dsspshoppe = $db->query("SELECT * FROM product Order By  id ASC LIMIT 5");
   $dsloaisp = $db->query("SELECT * FROM groupsp");
//$test = $db->query("SELECT * FROM product,groupsp WHERE product.groupid = groupsp.id ORDER BY product.id DESC LIMIT 6");
    $sql_pro = $db->query("SELECT * FROM product Order By id DESC LIMIT 8");
   
    $tukhoa = isset($_GET['tukhoa']) ? $_GET['tukhoa'] : '';
    $groupid = isset($_GET['groupid']) ? $_GET['groupid'] : '';
    $sql_trang = $db->query("SELECT * FROM product where name like '%$tukhoa%'");
    $row_count = mysqli_num_rows($sql_trang);
    $trang = ceil($row_count/8);
    if(isset($_GET['trang'])){
        $page = $_GET['trang'];
        if($page > $trang)
            $page = 1;
        if($page < 1){
            $page = +$trang + -1;
        }
    }
    else{
        $page = 1;
    }
    $begin = ($page - 1)*8;

    $sql = " select * from product where name like '%$tukhoa%' LIMIT $begin,8 ";
    $result = mysqli_query($db,$sql);
    
    if(isset($_GET['tukhoa'])){
        $tukhoa = $_GET['tukhoa'];
        $sql = " select * from product where name like '%$tukhoa%' LIMIT $begin,8 ";
        $result = mysqli_query($db,$sql);
    }
    // else{
    //     $tukhoa = '';
    //     $sql = " select * from product where name like '%$tukhoa%' Order By  id ASC LIMIT $begin,8";
    //     $result = mysqli_query($db,$sql);
    // }

    if(isset($_GET['groupid'])){
        $groupid = $_GET['groupid'];
        $sql = " select * from product where groupid like $groupid LIMIT $begin,8";
        $result = mysqli_query($db,$sql);
    }
    else{
        $groupid = 0;
        $sql = " select * from product LIMIT $begin,8";
        $result = mysqli_query($db,$sql);
    }
    
    session_start();
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
							<li>Shop</li>
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
                            <div class="col-lg-3 col-md-8 col-12">
                                <div class="shop_sidebar">
                                	<div class="block_categories">
										<div class="category_top_menu widget">
											<div class="widget_title">
												<h3>Danh mục sản phẩm</h3>
											</div>
											<ul class="shop_toggle">

                                            
                                            <?php
                                                while($danhsachloai = $dsloaisp->fetch_object()):
                                                    $id = $danhsachloai->id;
                                                    $dssp = $db->query("SELECT * FROM product WHERE groupid=$id");
                                            ?>        
                                                                           
                                                <li><a style="font-weight:600 " href="shop.php?groupid=<?php echo $danhsachloai->id; ?>" >
                                                <?php echo $danhsachloai->name?> </a>
                                                <?php endwhile; ?>
											</ul>   
                                        

										</div>
									</div>
									<div class="search_filters_wrapper">
									    <div class="price_filter widget">
											<div class="widget_title">
												<h3>filter By price</h3>
											</div>
											<div class="search_filters widget">
												<div id="slider-range"></div>
												<input type="text" name="text" id="amount" />    
											</div>
									    </div>    
									</div>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-12 col-12" id="spinshop">
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

                                                        <!-- <li><a data-toggle="tab" href="#featured_active" role="tab" aria-controls="featured_active" aria-selected="false"><i class="fa fa-list" aria-hidden="true"></i></a></li> -->
                                                    </ul>
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
                                                    while($row = mysqli_fetch_array($result)){

                                                ?>
                                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                                        <div class="single__product">
                                                            <div class="single_product__inner">
                                                                <div class="product_img">
                                                                    <a href="product-details.php?id=<?php echo $row['id'];?>&groupid=<?php echo $row['groupid']?>">
                                                                    <img src="assets/img/product/<?php echo $row['image']?>" alt="">
                                                                    </a>
                                                                </div>
                                                                <div class="product__content text-center">
                                                                    <div class="produc_desc_info">
                                                                    <div class="product_title">
                                                                        <h4><a href="product-details.php?id=<?php echo $row['id'];?>&groupid=<?php echo $row['groupid']?>"><?php echo $row['name'] ?></a></h4>
                                                                    </div>
                                                                    <div class="product_price">
                                                                    <?php if($row['pricenew'] > 0) : ?>
                                                                                <s style="color:#5555; font-size:14px; font-weight:600;"><?= number_format($row['price']) ?>VND</s>
                                                                                <p><?= number_format($row['pricenew']) ?>VND</p>
                                                                            <?php else : ?>
                                                                                <p><?= number_format($row['price']) ?>VND</p>
                                                                            <?php endif ?>
                                                                    </div>
                                                                    </div>
                                                                    <div class="product__hover">
                                                                    <ul>
                                                                        <?php if($row['soluong'] != 0){?>
                                                                            <li><a href="add.php?id=<?php echo $row['id'];?>"><i class="ion-android-cart"></i></a></li>
                                                                        <?php }else{ ?>         
                                                                            <li><a href=""><i class="ion-android-cart"></i></a></li>
                                                                            <?php }?>
                                                                        <li><a href="product-details.php?id=<?php echo $row['id'];?>&groupid=<?php echo $row['groupid']?>"><i class="ion-clipboard"></i></a></li>
                                                                    </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php
                                                    }
                                                ?>

                                        
                                    </div>  
                                   
                                </div>
                                
                                <div class="shop_pagination">
                                    <div class="row align-items-center">   
                                        
                                        <div class="col-lg-6 offset-lg-2 col-md-6 col-sm-6">
                                            <div class="page_list_clearfix text-center">
                                                <ul>
                                                    <li class="prev"><a type="submit" onclick="this.href='shop.php?<?php if($groupid != 0) echo 'groupid='.$groupid; ?>&tukhoa=<?php echo isset($tukhoa)?$tukhoa:'' ?>&trang=' + ( +document.getElementById('page_index').value + -1) "><i class="zmdi zmdi-chevron-left"></i> Previous</a></li>
                                                    <li style="width:100px"><input class="form-control" type="text" id="page_index" value=" <?php if(!isset($page)) $page = 1; echo $page; ?> "></a> </li>
                                                    <li class="next"> <a type="submit" onclick="this.href='shop.php?<?php if($groupid != 0) echo 'groupid='.$groupid; ?>&tukhoa=<?php echo isset($tukhoa)?$tukhoa:'' ?>&trang=' + ( +document.getElementById('page_index').value + +1) "> Next <i class="zmdi zmdi-chevron-right"></i></a></li>
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

                <!--Brand logo start-->  
                
                <!--Brand logo end-->   
                
                 <!-- footer start -->
                 <footer class="footer pt-90">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-3 col-md-12 col-xs-12">
                                <!--Single Footer-->
                                <div class="single_footer widget">
                                <div class="single_footer_widget_inner">
                                    <div class="footer_logo">
                                        <a href="index.php"><img src="assets/img/logo/logo_footer.png" alt=""></a>
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
                            <div class="col-lg-5 col-md-12 col-xs-12">
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
                                            
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!--Single footer end-->   
                                <!--Single footer start-->   
                                <div class="single_footer widget">
                                    <div class="single_footer_widget_inner">
                                        
                                    </div>
                                </div>
                                <!--Single Footer end-->
                                <!--Single footer start-->   
                                <div class="single_footer widget">
                                    <div class="single_footer_widget_inner">
                                        <div class="footer_title">
                                            <h2>About</h2>
                                        </div>
                                        <div class="footer_menu">
                                            <ul>
                                            
                                            <li><a href="index.php"> Stores</a></li>
                                            <li><a href="blog.php"> Blog</a></li>
                                            <li><a href="contact.php"> Contact us</a></li>
                                            
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
