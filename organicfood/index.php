<?php
    include('connect.php');
    $products = $db->query("SELECT * FROM product Order By  id DESC LIMIT 15");
    $productnew = $db->query("SELECT * FROM product Order By name ASC LIMIT 15");
    $productshop = $db->query("SELECT * FROM product WHERE groupid = 1");
    $productshopfresh = $db->query("SELECT * FROM product WHERE groupid = 2");
    $productshophuuco = $db->query("SELECT * FROM product WHERE groupid = 3");
    $productshoporga = $db->query("SELECT * FROM product WHERE groupid = 4");
    $shop = $db->query("SELECT * FROM product WHERE groupid = 4 LIMIT 1");
    $shoppe = $db->query("SELECT * FROM product WHERE (groupid = 1) OR (groupid = 3) Order By  name DESC  ");
    session_start();
   
?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
        <title>OrganicFood - eCommerce Bootstrap4 Template</title>
        <?php
            include('pages/import.php');
        ?>
    </head>
    <body>
                <?php
                    include('pages/menu.php');
                ?>
                
                <!--Slider start-->
                <div class="slider_area">
                    <div class="slider_list  owl-carousel">
                        <div class="single_slide" style="background-image: url(assets/img/slider/1.jpg);">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="slider__content">
                                            <p>Exclusive Offer -10% Off This Week</p>
                                            <h2>Live <strong>healthy</strong> with a glass</h2>
                                            <h3>of <strong>fruit juice</strong> every day</h3>  
                                            
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single_slide" style="background-image: url(assets/img/slider/2.jpg);">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="slider__content">
                                            <p>Exclusive Offer -10% Off This Week</p>
                                            <h2>We <strong>provide</strong> the best</h2> 
                                            <h3> product <strong> for you </strong></h3>
                                            
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Slider end-->
                
                <!--Banner area start-->
                <div class="banner_area home1_banner mt-30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <div class="single_banner">
                                    <a href="#">
                                        <img src="assets/img/banner/1.jpg" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="single_banner">
                                    <a href="#">
                                        <img src="assets/img/banner/2.jpg" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="single_banner banner_three">
                                    <a href="#">
                                        <img src="assets/img/banner/3.jpg" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Banner area end-->
                
                <!--Features product area-->
                <div class="features_product pt-90" id="spnoibat">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="section_title text-center">
                                    <h3> Sản phẩm nổi bật </h3>
                                    <a href = "cart.php"></a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="features_product_active owl-carousel">
                            <!-- Mo vong lap-->
                                <?php
                                    while($pro = $products->fetch_object()) : ?>
                                        <div class="col-lg-2">
                                        <div class="single__product">
                                            <div class="single_product__inner">
                                                <span class="new_badge">new</span>
                                                <div class="product_img">
                                                <a href="product-details.php?id=<?php echo $pro->id;?>&groupid=<?php echo $pro->groupid;?>">
                                                <img src="assets/img/product/<?= $pro->image ?>" alt="">
                                                    </a>
                                                </div>
                                                <div class="product__content text-center">
                                                    <div class="produc_desc_info">
                                                        <div class="product_title">
                                                            <h4><a href="product-details.php?id=<?php echo $pro->id;?>&groupid=<?php echo $pro->groupid;?>"><?= $pro->name ?></a></h4>
                                                        </div>
                                                        <div class="product_price">
                                                        <?php if($pro->pricenew > 0) { ?>
                                                            <s style="color:#5555; font-size:14px; font-weight:600;"><?= number_format($pro->price) ?>đ</s>
                                                            <p><?= number_format($pro->pricenew) ?>VND</p>
                                                            
                                                        <?php }else{ ?>
                                                            <p><?= number_format($pro->price) ?>VND</p>
                                                        <?php } ?>
                                                        </div>
                                                    </div>
                                                    <div class="product__hover">
                                                        <ul>
                                                            <?php if($pro->soluong != 0){?>
                                                            <li><a href="add.php?id=<?php echo $pro->id;?>&groupid=<?php echo $pro->groupid;?>"><i class="ion-android-cart"></i></a></li> 
                                                            <?php }else{ ?>         
                                                            <li><a><i class="ion-android-cart"></i></a></li>
                                                            <?php }?>
                                                            <li><a href="product-details.php?id=<?php echo $pro->id;?>&groupid=<?php echo $pro->groupid;?>"><i class="ion-clipboard"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile; ?>    
                                <!-- Ket thuc lap -->
                            </div>
                        </div>

                    </div>
                </div>
                <!--Features product end-->
                
                <!--Shipping area start-->
                <div class="shipping_area">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="shipping_list d-flex justify-content-between flex-xs-column">
                                    <div class="single_shipping_box d-flex">
                                        <div class="shipping_icon">
                                            <img src="assets/img/ship/1.png" alt="shipping icon">
                                        </div>
                                        <div class="shipping_content">
                                            <h6>Miễn phí giao hàng</h6>
                                            <p>với hóa đơn trên 500.000 VND</p>
                                        </div>
                                    </div>
                                    <div class="single_shipping_box one d-flex">
                                        <div class="shipping_icon">
                                            <img src="assets/img/ship/2.png" alt="shipping icon">
                                        </div>
                                        <div class="shipping_content">
                                            <h6>Hoàn trả trong 7 ngày</h6>
                                            <p>Nếu phát hiện sản phẩm lỗi</p>
                                        </div>
                                    </div>
                                    <div class="single_shipping_box two d-flex">
                                        <div class="shipping_icon">
                                            <img src="assets/img/ship/3.png" alt="shipping icon">
                                        </div>
                                        <div class="shipping_content">
                                            <h6>Ưu đãi cho thành viên</h6>
                                            <p>Giá trị lên đến 15%</p>
                                        </div>
                                    </div>
                                    <div class="single_shipping_box three d-flex">
                                        <div class="shipping_icon">
                                            <img src="assets/img/ship/4.png" alt="shipping icon">
                                        </div>
                                        <div class="shipping_content">
                                            <h6 style="margin-top: 15px;">Hỗ trợ trực tuyến 24/7</h6>                                          
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Shipping area end-->
                
                
                <!--shop product area start-->
                <div class="shop_product" id="spshop">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="shop_product_head d-flex justify-content-between mb-30">
                                    <div class="section_title space_2 text-left">
                                        <h3>shop</h3>
                                    </div>
                                     <div class="home_shop_product text-right">
                                        <ul class="product-tab-list nav d-flex flex-wrap justify-content-end" role="tablist">
                                            <li><a class="active" href="#fresh" data-toggle="tab" role="tab" aria-selected="true" aria-controls="fresh">
                                                Fresh Fruit 
                                            </a></li>                                           
                                            <li><a href="#organics" data-toggle="tab" role="tab" aria-selected="false" aria-controls="organics">Organics </a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div> 
                        </div>

                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <?php
                                    while($sh = $shop->fetch_object()) : ?>
                                <div class="shop_larg_product">
                                    <div class="single__product_2">
                                        <div class="product_img">
                                            <a href="product-details.php?id=<?php echo $sh->id;?>&groupid=<?php echo $sh->groupid;?>">
                                                <img src="assets/img/product/<?= $sh->image ?>"" alt="">
                                            </a>
                                        </div>
                                        <div class="product__content text-center">
                                            <div class="product_title">
                                                <h4><a href="product-details.php?id=<?php echo $sh->id;?>&groupid=<?php echo $sh->groupid;?>"><?= $sh->name ?></a></h4>
                                            </div>
                                            <div class="product_price">
                                                <?php if($sh->pricenew > 0) : ?>
                                                    <s style="color:#5555; font-size:14px; font-weight:600;"><?= number_format($sh->price) ?>VND</s>
                                                    <p><?= number_format($sh->pricenew) ?>VND</p>
                                                    
                                                <?php else : ?>
                                                    <p><?= number_format($sh->price) ?>VND</p>
                                                <?php endif ?>
                                            </div>
                                            <div class="product-add-to-cart">
                                            
                                            <?php if($sh->soluong != 0){?>
                                                <a href="add.php?id=<?php echo $sh->id;?>&groupid=<?php echo $sh->groupid;?>">Thêm sản phẩm</a>
                                            <?php }else{ ?>         
                                                <a >Thêm sản phẩm</a>
                                            <?php }?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endwhile; ?> 
                            </div>
                            
                            <div class="col-lg-8 col-md-6">                           
                                <div class="tab-content">
                                    <div class="tab-pane active show fade" id="fresh" role="tabpanel">
                                        <div class="row">
                                            <div class="shop-product_list owl-carousel">
                                                <?php
                                                    while(($proshop = $productshop->fetch_object()) && ($proshopfresh = $productshopfresh->fetch_object())) : ?>
                                                <div class="col-12">                                              
                                                    <div class="shop_single_prduct_item">
                                                        <div class="single__product">
                                                            <div class="single_product__inner">
                                                                <span class="new_badge">new</span>
                                                                <div class="product_img">
                                                                    <a href="product-details.php?id=<?php echo $proshop->id;?>&groupid=<?php echo $proshop->groupid;?>">
                                                                    <img src="assets/img/product/<?= $proshop->image ?>" alt="">
                                                                    </a>
                                                                </div>
                                                                <div class="product__content text-center">
                                                                    <div class="produc_desc_info">
                                                                        <div class="product_title">
                                                                            <h4><a href="product-details.php?id=<?php echo $proshop->id;?>&groupid=<?php echo $proshop->groupid;?>"><?= $proshop->name ?></a></h4>
                                                                        </div>
                                                                        <div class="product_price">
                                                                            <?php if($proshop->pricenew > 0) : ?>
                                                                                <s style="color:#5555; font-size:14px; font-weight:600;"><?= number_format($proshop->price) ?>VND</s>
                                                                                <p><?= number_format($proshop->pricenew) ?>VND</p>
                                                                            <?php else : ?>
                                                                                <p><?= number_format($proshop->price) ?>VND</p>
                                                                            <?php endif ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="product__hover">
                                                                        <ul>
                                                                            
                                                                            <?php if($proshop->soluong != 0){?>
                                                                                <li><a href="add.php?id=<?php echo $proshop->id;?>&groupid=<?php echo $proshop->groupid;?>"><i class="ion-android-cart"></i></a></li>
                                                                            <?php }else{ ?>         
                                                                                <li><a href=""><i class="ion-android-cart"></i></a></li>
                                                                            <?php }?>    
                                                                            <li><a href="product-details.php?id=<?php echo $proshop->id;?>&groupid=<?php echo $proshop->groupid;?>"><i class="ion-clipboard"></i></a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> 

                                                        <div class="single__product">
                                                            <div class="single_product__inner">
                                                                <span class="new_badge">new</span>
                                                                <div class="product_img">
                                                                    <a href="product-details.php?id=<?php echo $proshopfresh->id;?>&groupid=<?php echo $proshopfresh->groupid;?>">
                                                                    <img src="assets/img/product/<?= $proshopfresh->image ?>" alt="">
                                                                    </a>
                                                                </div>
                                                                <div class="product__content text-center">
                                                                    <div class="produc_desc_info">
                                                                        <div class="product_title">
                                                                            <h4><a href="product-details.php?id=<?php echo $proshopfresh->id;?>&groupid=<?php echo $proshopfresh->groupid;?>"><?= $proshopfresh->name ?></a></h4>
                                                                        </div>
                                                                        <div class="product_price">
                                                                            <?php if($proshopfresh->pricenew > 0) : ?>
                                                                                <s style="color:#5555; font-size:14px; font-weight:600;"><?= number_format($proshopfresh->price) ?>VND</s>
                                                                                <p><?= number_format($proshopfresh->pricenew) ?>VND</p>
                                                                            <?php else : ?>
                                                                                <p><?= number_format($proshopfresh->price) ?>VND</p>
                                                                            <?php endif ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="product__hover">
                                                                        <ul>
                                                                            
                                                                            <?php if($proshopfresh->soluong != 0){?>
                                                                                <li><a href="add.php?id=<?php echo $proshopfresh->id;?>&groupid=<?php echo $proshopfresh->groupid;?>"><i class="ion-android-cart"></i></a></li>
                                                                            <?php }else{ ?>         
                                                                                <li><a><i class="ion-android-cart"></i></a></li>
                                                                            <?php }?>  
                                                                            <li><a href="product-details.php?id=<?php echo $proshopfresh->id;?>&groupid=<?php echo $proshopfresh->groupid;?>"><i class="ion-clipboard"></i></a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>                                                            
                                                        </div>                                                                                         
                                                    </div> 
                                                </div>  
                                                <?php endwhile; ?>    
                                            <!-- Ket thuc lap -->
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="organics" role="tabpanel">
                                    
                                        <div class="row">
                                            <div class="shop-product_list owl-carousel">
                                                <?php
                                                    while(($proshophuuco = $productshophuuco->fetch_object()) && ($proshoporga = $productshoporga->fetch_object())) : ?>
                                                <div class="col-12">                                              
                                                    <div class="shop_single_prduct_item">
                                                        <div class="single__product">
                                                            <div class="single_product__inner">
                                                                <span class="new_badge">new</span>
                                                                <div class="product_img">
                                                                    <a href="product-details.php?id=<?php echo $proshophuuco->id;?>&groupid=<?php echo $proshophuuco->groupid;?>">
                                                                    <img src="assets/img/product/<?= $proshophuuco->image ?>" alt="">
                                                                    </a>
                                                                </div>
                                                                <div class="product__content text-center">
                                                                    <div class="produc_desc_info">
                                                                        <div class="product_title">
                                                                            <h4><a href="product-details.php?id=<?php echo $proshophuuco->id;?>&groupid=<?php echo $proshophuuco->groupid;?>">
                                                                            <?= $proshophuuco->name ?></a></h4>
                                                                        </div>
                                                                        <div class="product_price">
                                                                            <?php if($proshophuuco->pricenew > 0) : ?>
                                                                                <s style="color:#5555; font-size:14px; font-weight:600;"><?= number_format($proshophuuco->price) ?>VND</s>
                                                                                <p><?= number_format($proshophuuco->pricenew) ?>VND</p>
                                                                            <?php else : ?>
                                                                                <p><?= number_format($proshophuuco->price) ?>VND</p>
                                                                            <?php endif ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="product__hover">
                                                                        <ul>
                                                                            
                                                                            <?php if($proshophuuco->soluong != 0){?>
                                                                                <li><a href="add.php?id=<?php echo $proshophuuco->id;?>&groupid=<?php echo $proshophuuco->groupid;?>"><i class="ion-android-cart"></i></a></li>
                                                                            <?php }else{ ?>         
                                                                                <li><a><i class="ion-android-cart"></i></a></li>
                                                                            <?php }?>  
                                                                            <li><a href="product-details.php?id=<?php echo $proshophuuco->id;?>&groupid=<?php echo $proshophuuco->groupid;?>"><i class="ion-clipboard"></i></a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> 

                                                        <div class="single__product">
                                                            <div class="single_product__inner">
                                                                <span class="new_badge">new</span>
                                                                <div class="product_img">
                                                                    <a href="product-details.php?id=<?php echo $proshoporga->id;?>&groupid=<?php echo $proshoporga->groupid;?>">
                                                                    <img src="assets/img/product/<?= $proshoporga->image ?>" alt="">
                                                                    </a>
                                                                </div>
                                                                <div class="product__content text-center">
                                                                    <div class="produc_desc_info">
                                                                        <div class="product_title">
                                                                            <h4><a href="product-details.php?id=<?php echo $proshoporga->id;?>&groupid=<?php echo $proshoporga->groupid;?>">
                                                                            <?= $proshoporga->name ?></a></h4>
                                                                        </div>
                                                                        <div class="product_price">
                                                                            <?php if($proshoporga->pricenew > 0) : ?>
                                                                                <s style="color:#5555; font-size:14px; font-weight:600;"><?= number_format($proshoporga->price) ?>VND</s>
                                                                                <p><?= number_format($proshoporga->pricenew) ?>VND</p>
                                                                            <?php else : ?>
                                                                                <p><?= number_format($proshoporga->price) ?>VND</p>
                                                                            <?php endif ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="product__hover">
                                                                        <ul>
                                                                        
                                                                            <?php if($proshoporga->soluong != 0){?>
                                                                                <li><a href="add.php?id=<?php echo $proshoporga->id;?>&groupid=<?php echo $proshoporga->groupid;?>"><i class="ion-android-cart"></i></a></li>
                                                                            <?php }else{ ?>         
                                                                                <li><a><i class="ion-android-cart"></i></a></li>
                                                                            <?php }?>  
                                                                            <li><a href="product-details.php?id=<?php echo $proshoporga->id;?>&groupid=<?php echo $proshoporga->groupid;?>"><i class="ion-clipboard"></i></a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>                                                            
                                                        </div>                                                                                         
                                                    </div> 
                                                </div>  
                                                <?php endwhile; ?>    
                                            <!-- Ket thuc lap -->
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                               
                        </div>
                            
                    </div>
                </div>
            </div>
                <!--shop product area end-->
                
               <!--Banner area start-->
                <div class="banner_area home1_banner2 pb-90">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="single_banner">
                                    <a href="#">
                                        <img src="assets/img/banner/big-1.jpg" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="single_banner">
                                    <a href="#">
                                        <img src="assets/img/banner/big-2.jpg" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Banner area end-->
                
                
                <!--Recommended product area end-->
                
                
                
                <!--New product area-->
                <div class="new_product" id="spmoi">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="section_title space_2 text-left">
                                    <h3>Sản phẩm mới</h3>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="features_product_active owl-carousel">
                                         <!-- Mo vong lap-->
                                <?php
                                    while($pronew = $productnew->fetch_object()) : ?>
                                        <div class="col-lg-2">
                                        <div class="single__product">
                                            <div class="single_product__inner">
                                                <span class="new_badge">new</span>
                                                <div class="product_img">
                                                <a href="product-details.php?id=<?php echo $pronew->id;?>&groupid=<?php echo $pronew->groupid;?>">
                                                <img src="assets/img/product/<?= $pronew->image ?>" alt="">
                                                    </a>
                                                </div>
                                                <div class="product__content text-center">
                                                    <div class="produc_desc_info">
                                                        <div class="product_title">
                                                            <h4><a href="product-details.php?id=<?php echo $pronew->id;?>&groupid=<?php echo $pronew->groupid;?>"><?= $pronew->name ?></a></h4>
                                                        </div>
                                                        <div class="product_price">
                                                        <?php if($pronew->pricenew > 0) : ?>
                                                            <s style="color:#5555; font-size:14px; font-weight:600;"><?= number_format($pronew->price) ?>VND</s>
                                                            <p><?= number_format($pronew->pricenew) ?>VND</p>
                                                        <?php else : ?>
                                                            <p><?= number_format($pronew->price) ?>VND</p>
                                                        <?php endif ?>
                                                        </div>
                                                    </div>
                                                    <div class="product__hover">
                                                        <ul>
                                                            
                                                            <?php if($pronew->soluong != 0){?>
                                                                <li><a href="add.php?id=<?php echo $pronew->id;?>&groupid=<?php echo $pronew->groupid;?>"><i class="ion-android-cart"></i></a></li>
                                                            <?php }else{ ?>         
                                                                <li><a><i class="ion-android-cart"></i></a></li>
                                                            <?php }?> 
                                                            <li><a href="product-details.php?id=<?php echo $pronew->id;?>&groupid=<?php echo $pronew->groupid;?>"><i class="ion-clipboard"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile; ?>    
                                <!-- Ket thuc lap -->
                            </div>
                        </div>

                    </div>
                </div>
            <!--new product end-->
                
                <!--Banner area start-->
                <div class="banner_area banner_area-2 pb-90">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-3 col-md-4">
                                <div class="single_banner">
                                    <a href="#">
                                        <img src="assets/img/banner/banner-4.jpg" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-4">
                                <div class="single_banner">
                                    <a href="#">
                                        <img src="assets/img/banner/banner-5.jpg" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4">
                                <div class="single_banner">
                                    <a href="#">
                                        <img src="assets/img/banner/banner-6.jpg" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Banner area end-->
                
                
                <!--Best seller product -->
                <div class="best_seller_product" id="spbanchay">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="section_title space_2 text-left">
                                    <h3> Sản phẩm bán chạy</h3>
                                </div>
                            </div>
                        </div>                        
                        <div class="row">                       
                            <div class="col-12">                            
                                <div class="best_selling_product_list owl-carousel">
                                <?php
                                        while(($proshopp = $shoppe->fetch_object()) &&
                                         ($proshoporgan = $productshoporga->fetch_object())) : ?>
                                    <div class="best_selling_product">                                    
                                        <div class="single_small_product mb-30">
                                            <div class="product_thumb">
                                                <a href="product-details.php?id=<?php echo $proshopp->id;?>&groupid=<?php echo $proshopp->groupid;?>">
                                                    <img src="assets/img/product/<?= $proshopp->image ?>" alt="">
                                                </a>
                                            </div>
                                            <div class="product_content">
                                                <h4><a href="product-details.php?id=<?php echo $proshopp->id;?>&groupid=<?php echo $proshopp->groupid;?>"><?= $proshopp->name ?></a></h4>
                                                <div class="product_ratting">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-half-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <div class="product_price">
                                                <?php if($proshopp->pricenew > 0) : ?>
                                                    <s style="color:#5555; font-size:14px; font-weight:600;"><?= number_format($proshopp->price) ?>VND</s>
                                                    <p><?= number_format($proshopp->pricenew) ?>VND</p>
                                                <?php else : ?>
                                                    <p><?= number_format($proshopp->price) ?>VND</p>
                                                <?php endif ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="single_small_product ">
                                            <div class="product_thumb">
                                                <a href="product-details.php?id=<?php echo $proshoporgan->id;?>&groupid=<?php echo $proshoporgan->groupid;?>">
                                                    <img src="assets/img/product/<?= $proshoporgan->image ?>" alt="">
                                                </a>
                                            </div>
                                            <div class="product_content">
                                                <h4><a href="product-details.php?id=<?php echo $proshoporgan->id;?>&groupid=<?php echo $proshoporgan->groupid;?>"><?= $proshoporgan->name ?></a></h4>
                                                <div class="product_ratting">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="product_price">
                                                <?php if($proshoporgan->pricenew > 0) : ?>
                                                    <s style="color:#5555; font-size:14px; font-weight:600;"><?= number_format($proshoporgan->price) ?>VND</s>
                                                    <p><?= number_format($proshoporgan->pricenew) ?>VND</p>
                                                <?php else : ?>
                                                    <p><?= number_format($proshoporgan->price) ?>VND</p>
                                                <?php endif ?>
                                                </div>
                                            </div>
                                        </div>                                        
                                    </div>                                     
                                     <?php endwhile; ?>
                                </div>                                
                            </div>                            
                        </div>                         
                    </div>
                </div>
                <!--Best seller product  end-->

                <?php
                    include('pages/footer.php');
                ?>
                
            </div>
           
           
           
           
            
        
            
    
            
  
		
		
		<!-- all js here -->
        <script src="assets/js/vendor/jquery-1.12.0.min.js"></script>
        <script src="assets/js/popper.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.meanmenu.min.js"></script>
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
