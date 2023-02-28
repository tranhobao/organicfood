
<?php
   include('connect.php');
   $id = (int)$_GET['id'];
   $groupid = (int)$_GET['groupid'];
   $query = $db->query("SELECT * FROM product WHERE id = $id ");
   $detail = $query->fetch_object();
   $splienquan = $db->query("SELECT * FROM product WHERE groupid = $groupid");
   session_start();

?>
<!doctype html>
<html class="no-js" lang="zxx">
   <head>
      <title>Product Details -  eCommerce Bootstrap4 Template</title>
      <?php
        include('pages/import.php');
      ?>
   </head>
   <body>
      <!-- Add your site or application content here -->
      <?php
        include('pages/menu.php');
      ?>
      <!--breadcrumb area start-->
      <div class="breadcrumb_container">
         <div class="container-fluid">
            <div class="row">
               <div class="col-12">
                  <nav>
                     <ul>
                        <li>
                           <a href="index.php">Trang chủ></a>
                        </li>
                        <li>Chi tiết sản phẩm</li>
                     </ul>
                  </nav>
               </div>
            </div>
         </div>
      </div>
      <!--breadcrumb area end-->
      <!-- primary block area -->
      <div class="table_primary_block pt-100">
         <div class="container">
            <div class="row">
               <div class="col-lg-5 col-md-5 col-sm-12">
                  <div class="product-flags">
                     <div class="tab-content">
                        <div class="tab-pane fade show active" id="tabone" role="tabpanel" >
                           <div class="product_tab_img">
                              <img src="assets/img/product/<?= $detail->image ?>" alt=""></>    
                           </div>
                        </div>                        
                     </div>                     
                  </div>
               </div>
               <div class="col-lg-7 col-md-7 col-sm-12">
                  <div class="product__details_content">
                     <div class="demo_product">
                        <h2><?= $detail->name ?></h2>
                     </div>
                     <div class="product_comments_block">
                        <div class="comments_note clearfix">
                           <i class="fa fa-star" aria-hidden="true"></i>
                           <i class="fa fa-star" aria-hidden="true"></i>
                           <i class="fa fa-star" aria-hidden="true"></i>
                           <i class="fa fa-star" aria-hidden="true"></i>
                           <i class="fa fa-star" aria-hidden="true"></i>
                        </div>
                        
                     </div>
                     <div class="current_price">
                        <span>
                           <?php if($detail->pricenew > 0) : ?>
                              <s style="color:#5555; font-size:18px;"><?= number_format($detail->price) ?>VND</s>
                              <p style="color:#78a206; font-size:30px;font-weight:700;"><?= number_format($detail->pricenew) ?>VND</p>
                              
                           <?php else : ?>
                              <p><?= number_format($detail->price) ?>VND</p>
                           <?php endif ?>
                        </span>    
                     </div>
                     <div class="product_information">
                        <div id="product_description_short">
                           <p><?= $detail->detail ?></p>
                        </div>
                        <div class="product_variants">                          
                           <div class="quickview_plus_minus">
                           <?php if($detail->soluong != 0){?>
                              <span class="control_label">SỐ LƯỢNG</span>
                              <div class="quickview_plus_minus_inner">
                                 <form action="add.php" method='get'>
                                    <input type="hidden" name="id" value = "<?= $detail->id; ?>">
                                    <input type="hidden" name="action" value="add">
                                   
                                    <input type="number" min="1" name="quantity" value="<?= $item['quantity'];?>"">
                                   
                                    <input type="submit" value="Thêm Vào Giỏ" size="40">
                                    <?php }else{?>
                                       <label style="font-weight:1000; font-size:30px; color:#78a206">Hết Hàng</label>
                                    <?php }?>
                                 </form>
                              </div>
                           </div>
                           <div class="product-availability">
                              <span id="availability">
                              <i class="zmdi zmdi-check"></i>
                              In stock    
                              </span>    
                           </div>
                           <div class="social-sharing">
                              <span>Share</span>
                              <ul>
                                 <li><a href="https://www.facebook.com/vohoangyenmodel"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                 <li><a href="https://twitter.com/blackpink_lisa?fbclid=IwAR20IyOX2MhITymprTtH-MkUKduPhehMAj_2V13KK9uVWhHniNg30F7pnp8"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                 <li><a href="https://www.instagram.com/ngoctrinh89/?fbclid=IwAR21QQFIbbYGFqCpL1EXNOQ2InIcNBeedTGPcFPrrQh2otlgPi0DSWMXB1g"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                 <li><a href="https://www.youtube.com/channel/UCqECaJ8Gagnn7YCbPEzWH6g"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                              </ul>
                           </div>
                           <div class="block-reassurance">
                              <ul>
                                 <li>
                                    <img src="assets/img/cart/cart1.png" alt="">
                                    <span>Security policy (edit with Customer reassurance module)</span>
                                 </li>
                                 <li>
                                    <img src="assets/img/cart/cart2.png" alt="">
                                    <span>Delivery policy (edit with Customer reassurance module)</span>
                                 </li>
                                 <li>
                                    <img src="assets/img/cart/cart3.png" alt="">
                                    <span>Return policy (edit with Customer reassurance module)</span>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            
         </div>
      </div>
   
      <!--Features product area-->
      <div class="product_page_tab ptb-100">
         <div class="container">
            <div class="row">
               <div class="col-12">
                  <div class="section_title text-left">
                     <h3> Sản Phẩm Liên Quan </h3>
                  </div>
               </div>
            </div>
            <div class="row">
            
               <div class="features_product_active owl-carousel">
               <?php
                  while($sp = $splienquan->fetch_object()) : ?>
                  <div class="col-lg-2">
                     <div class="single__product">
                        <div class="single_product__inner">
                           <span class="new_badge">new</span>
                           <div class="product_img">
                              <a href="product-details.php?id=<?php echo $sp->id;?>&groupid=<?php echo $sp->groupid?>">
                              <img src="assets/img/product/<?php echo $sp->image;?>" alt="">
                              </a>
                           </div>
                           <div class="product__content text-center">
                              <div class="produc_desc_info">
                                 <div class="product_title">
                                    <h4><a href="product-details.php?id=<?php echo $sp->id;?>&groupid=<?php echo $sp->groupid?>"><?php echo $sp->name;?></a></h4>
                                 </div>
                                 <div class="product_price">
                                    <?php if($sp->pricenew > 0) : ?>
                                       <s style="color:#5555; font-size:18px;"><?= number_format($sp->price) ?>đ</s>
                                       <p><?= number_format($sp->pricenew) ?>đ</p>
                                       
                                    <?php else : ?>
                                       <p><?= number_format($sp->price) ?>đ</p>
                                    <?php endif ?>
                                 </div>
                                 </div>
                              <div class="product__hover">
                                 <ul>
                                 <?php if($sp->soluong != 0){?>
                                    <li><a href="add.php?id=<?php echo $sp->id;?>"><i class="ion-android-cart"></i></a></li>
                                 <?php }else{?>
                                    <li><a><i class="ion-android-cart"></i></a></li>
                                 <?php }?>   
                                    <li><a href="product-details.php?id=<?php echo $sp->id;?>&groupid=<?php echo $sp->groupid?>""><i class="ion-clipboard"></i></a></li>
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
      <!--Features product end-->
      <?php
        include('pages/footer.php');
      ?>
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
                                          <select id="group_2">
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
                              <a href="https://twitter.com/blackpink_lisa?fbclid=IwAR20IyOX2MhITymprTtH-MkUKduPhehMAj_2V13KK9uVWhHniNg30F7pnp8"><i class="fa fa-twitter"></i></a>
                              <a href="https://www.instagram.com/ngoctrinh89/?fbclid=IwAR21QQFIbbYGFqCpL1EXNOQ2InIcNBeedTGPcFPrrQh2otlgPi0DSWMXB1g"><i class="fa fa-instagram"></i></a>
                              <a href="https://www.facebook.com/vohoangyenmodel"><i class="fa fa-facebook"></i></a>
                              <a href="https://www.youtube.com/channel/UCqECaJ8Gagnn7YCbPEzWH6g"><i class="fa fa-youtube"></i></a>
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
      <script src="assets/js/isotope.pkgd.min.js"></script>
      <script src="assets/js/imagesloaded.pkgd.min.js"></script>
      <script src="assets/js/jquery-ui.js"></script>
      <script src="assets/js/jquery.counterup.min.js"></script>
      <script src="assets/js/waypoints.min.js"></script>
      <script src="assets/js/ajax-mail.js"></script>
      <script src="assets/js/owl.carousel.min.js"></script>
      <script src="assets/js/plugins.js"></script>
      <script src="assets/js/main.js"></script>
   </body>
</html>