<?php 
   session_start();
   if(!isset($_SESSION['login'])){
      header("Location:login.php");}
   include('connect.php');
   $products = !empty($_SESSION['cart']) ? $_SESSION['cart'] : []; 
   $hoten = $_SESSION['hoten'];
   $diachi = $_SESSION['diachi'];
   $sdt = $_SESSION['sdt'];  
?>

<!doctype html>
<html class="no-js" lang="zxx">
   <head>
      <title>Checkout- eCommerce Bootstrap4 Template</title>
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
      <div class="breadcrumb_container ">
         <div class="container-fluid">
            <div class="row">
               <div class="col-12">
                  <nav>
                     <ul>
                        <li>
                           <a href="index.php">Trang chủ ></a>
                        </li>
                        <li>Check out</li>
                     </ul>
                  </nav>
               </div>
            </div>
         </div>
      </div>
      <!--breadcrumb area end-->
      <!--Checkout page section-->
      <div class="Checkout_page_section">
         <div class="container">
            <div class="checkout-form">
               <div class="row">
                  <div class="col-lg-6 col-md-6">
                     <form action="#">
                        <h3>CHI TIẾT ĐƠN HÀNG</h3>
                        <div class="row">
                           
                           <div class="col-12 mb-30">
                              <label for="b_c_name">Họ Và Tên <span>*</span></label>
                              <input id="b_c_name" type="text" value="<?php if(isset($hoten)) echo $hoten ?>">     
                           </div>
                           <div class="col-12 mb-30">
                              <label>Địa Chỉ <span>*</span></label>
                              <input placeholder="Địa chỉ" type="text" value="<?php if(isset($diachi)) echo $diachi ?>">     
                           </div>
                           <div class="col-12 mb-30">
                              <input placeholder="Thông tin bổ sung" type="text">     
                           </div>
                           <div class="col-12 mb-30">
                              <label for="b_city">Số Điện Thoại <span>*</span></label>
                              <input id="b_city" placeholder="Phone number" type="text" value="<?php if(isset($sdt)) echo $sdt ?>">     
                           </div>
                        </div>      
                     </form>
                  </div>
                  <div class="col-lg-6 col-md-6">
                     <div class="order-wrapper">
                        <h3>HÓA ĐƠN</h3>
                        <div class="order-table table-responsive mb-30">
                           <table>
                              <thead>
                                 <tr>
                                    <th class="product-name">Product</th>
                                    <th class="product-total">Total</th>
                                 </tr>
                              </thead>
                              <tbody>
                              <?php 
                                 $tongtien = 0;
                                 $n = 0;
                                 $t = 0;
                                 foreach($products as $item) {
                                    $thanhtien = $item['quantity'] * $item['price'];
                                    $tongtien += $thanhtien;
                                    $t += $item['quantity'];
                                    $n++;
                                 
                              ?>
                                 <tr>
                                    <td class="product-name"> <?php echo $item['name']; ?> x <strong><?php echo $item['quantity']; ?></strong></td>
                                    <td class="amount"><?php echo $thanhtien; ?></td>
                                 </tr>
                                 <?php 
                                 }
                              ?>

                              </tbody>
                              <tfoot>
                                 <tr>
                                    <th>Phí Ship</th>
                                    <td>30,000</td>
                                 </tr>
                                 <tr>
                                    <th>Tổng Tiền</th>
                                    <td><strong><?php echo number_format($tongtien+30000) ?></strong></td>
                                 </tr>
                              </tfoot>
                           </table>
                        </div>
                        <div class="payment-method">
                           
                           <div class="order-button">
                           <a href="thanhtoan.php"><button  type="submit" alert("Đặt hàng thành công");>Đặt hàng</button></a>
                           
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!--Checkout page section end-->
      <!--organicfood wrapper start--> 
      <div class="footer_food_wrapper">
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
</footer><!-- footer end -->
      </div>
      <!--organicfood wrapper end--> 
      <!-- all js here -->
      <script src="assets/js/vendor/jquery-1.12.0.min.js"></script>
      <script src="assets/js/popper.js"></script>
      <script src="assets/js/bootstrap.min.js"></script>
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