<?php

// if(!isset($_SESSION['cart'])){
//    session_start();}
   include('connect.php');
   $sp = !empty($_SESSION['cart']) ? $_SESSION['cart'] : [];

?>
<?php
   if(isset($_GET['action'])=='dangxuat'){
      unset($_SESSION['login']);
      unset($_SESSION['cart']);
      unset($_SESSION['id_khachhang']);
      unset($_SESSION['hoten']);
      unset($_SESSION['diachi']);
      unset($_SESSION['sdt']);
      header('Location:index.php');
   }
?>
<div class="organic_food_wrapper">
   <header class="header sticky-header">
      <div class="container-fluid">
         <div class="row">
            <div class="col-12">
               <div class="header_wrapper_inner">
                  <div class="logo col-xs-12">
                     <a href="index.php">
                     <img src="assets/img/logo/logo.png" alt="">
                     </a>
                  </div>
                  <div class="main_menu_inner">
                     <div class="menu">
                        <nav>
                           <ul>
                              <li class="active"><a href="index.php">Trang chủ</a>                                                    
                              </li>
                              <li><a href="about.php">Giới thiệu</a> </li>
                              <li><a href="shop.php">Sản phẩm</a>  </li>
                              <li><a href="blog.php">Tin tức</a>
                              </li>
                              <li><a href="contact.php">Liên hệ</a></li>
                           </ul>
                        </nav>
                     </div>
                     <div class="mobile-menu d-lg-none">
                        <nav>
                           <ul>
                              <li class="active"><a href="index.php">Trang chủ</a>                                                    
                              </li>
                              <li><a href="about.php">Giới thiệu</a> </li>
                              <li><a href="shop.php">Sản phẩm</a>  </li>
                              <li><a href="blog.php">Tin tức</a>
                              </li>
                              <li><a href="contact.php">Liên hệ</a></li>
                           </ul>
                        </nav>
                     </div>
                  </div>
                  <div class="header_right_info d-flex">
                     <div class="search_box">
                        <div class="search_inner">
                           
                              <!-- <input type="text" id="search_inp" placeholder="Tìm kiếm sản phẩm"> </input>
                              
                              <button><a class="btn" onclick="this.href='search_product.php?keyword=' + document.getElementById('search_inp').value;"> </a>
                              <i class="ion-ios-search"></i></button> -->
                              <form action="shop.php?" method="get">
                              <input type="text" placeholder="Tìm kiếm sản phẩm" name="tukhoa">
                              <button type="submit"><i class="ion-ios-search"></i></button>
                           </form>
                        </div>
                     </div>
                     
                     <div class="mini__cart">
                        <div class="mini_cart_inner">
                           <div class="cart_icon">
                              <a href="cart.php">
                              <span class="cart_icon_inner">
                              <i class="ion-android-cart"></i>
                              <?php 
                                 // if(isset($_SESSION['login']))
                                 {
                                 if(isset($_SESSION['cart'])){
                                 $tongtien = 0;
                                 $n = 1;
                                 $t = 0;
                                 foreach($sp as $item) {
                                    $thanhtien = $item['quantity'] * $item['price'];
                                    $tongtien += $thanhtien;
                                    $t += $item['quantity'];}
                                 
                              ?>    
                                                  
                              <span class="cart_count"><?php echo number_format($t) ?></span>
                              </span>
                              <span class="item_total"><?php echo number_format($tongtien) ?></span>
                              <?php }else {?>
                                 <span class="cart_count">0</span>
                              </span>
                              <span class="item_total">0VND</span>
                           
                              <?php 
                                 }}
                              ?> 
                              </a>                                                         
                           </div>
                        <!--Mini Cart Box-->
                         
                        <div class="mini_cart_box cart_box_one">
                        <?php 
                              // if(isset($_SESSION['login']))
                              {
                                 if(isset($_SESSION['cart'])){
                                 $tongtien = 0;
                                 $n = 0;
                                 $t = 0;
                                 foreach($sp as $item) {
                                    $thanhtien = $item['quantity'] * $item['price'];
                                    $tongtien += $thanhtien;
                                    $t += $item['quantity'];
                                    $n++;
                                 
                              ?>  
                           <div class="mini_cart_item">
                              <div class="mini_cart_img">
                                 <a href="product-details.php?id=<?php echo $item['id'];?>&groupid=<?php echo $item['groupid'];?>">
                                 <img src="assets/img/product/<?= $item['image'] ?>" alt=""" alt="">
                                 <span class="cart_count"><?php echo $n ?></span>
                                 </a>
                              </div>
                              <div class="cart_info">
                                 <h5><a href="product-details.php?id=<?php echo $item['id'];?>&groupid=<?php echo $item['groupid'];?>"><?php echo $item['name'] ?></a></h5>
                                 <span class="cart_price"><?php echo number_format($item['price']) ?>VND</span>
                              </div>
                              <div class="cart_remove">
                              <a href="add.php?id=<?php echo $item['id'];?>&action=delete"><i class="zmdi zmdi-delete"></i></a>
                              </div>
                           </div>
                           <?php 
                                 }
                              ?>
                           <div class="price_content">
                              <div class="cart_subtotals">
                                 <div class="price_inline">
                                    <span class="label">Tiền Hàng </span>
                                    <span class="value"><?php echo number_format($tongtien) ?>VND</span>
                                 </div>
                                 <div class="price_inline">
                                    <span class="label">Tiền Ship </span>
                                    <span class="value">30,000VND</span>
                                 </div>
                              </div>
                              <div class="cart-total-price">
                                 <span class="label">TỔNG CỘNG </span>
                                 <span class="value"><?php echo number_format($tongtien+30000) ?>VND</span>
                              </div>
                           </div>
                           <div class="min_cart_checkout">
                           <a href="checkout.php">THANH TOÁN</a>
                           </div>
                           <?php 
                                 }}
                              ?> 
                        </div>
                        <!--Mini Cart Box End -->
                        
                              

                           
                        </div>
                     </div> 
                     <div class="header_account">
                        <div class="account_inner">
                           <a href="#"><i class="ion-gear-b"></i></a>
                        </div>
                        <div class="content-setting-dropdown">
                           <div class="language-selector-wrapper">
                              <div class="user_info_top">
                                 <ul>
                                    
                                    <?php
                                          if(isset($_SESSION['login'])){ ?>
                                             <li><a href="my-account.php">Tài khoản      
                                             <?php echo $_SESSION['login'];
                                          }
                                             ?>
                                    </a></li>
                                    <?php
                                       if(isset($_SESSION['login'])){
                                          echo '<li hidden><a href="login.php">Đăng nhập</a></li>';
                                       }else{
                                          echo '<li><a href="login.php">Đăng nhập</a></li>';
                                          echo '<li ><a href="register.php">Đăng ký</a></li>';
                                       }
                                    ?>      
                                      <?php
                                       if(!isset($_SESSION['login'])){
                                          echo '<li hidden><a href="login.php?action=dangxuat">Đăng xuất</a></li>';
                                       }else{
                                          echo '<li><a href="login.php?action=dangxuat">Đăng xuất</a></li>';
                                       }
                                    ?> 
                                    
                                 </ul>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </header>
</div>
