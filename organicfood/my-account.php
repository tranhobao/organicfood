<?php
   include('connect.php');
   session_start();
   $id_khachhang = isset($_SESSION['id_khachhang']) ? $_SESSION['id_khachhang'] : 0;
   $madon = $db->query("SELECT * FROM cart WHERE cart.id_khachhang = $id_khachhang ");
   $products = !empty($_SESSION['cart']) ? $_SESSION['cart'] : []; 
   $hoten = isset($_SESSION['hoten']) ? $_SESSION['hoten'] : 0;
   $diachi = isset($_SESSION['diachi']) ? $_SESSION['diachi'] : 0;
   $sdt = isset($_SESSION['sdt']) ? $_SESSION['sdt'] : 0; 
   if(isset($_GET['action'])=='dangxuat'){
      unset($_SESSION['login']);
      unset($_SESSION['cart']);
      unset($_SESSION['id_khachhang']);
      header('Location:index.php');
   }
   
?>

<!doctype html>
<html class="no-js" lang="zxx">
   <head>
      <title>My account - eCommerce Bootstrap4 Template</title>
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
                        <li><a href="index.php">Trang chủ</a> ></li>
                        <li>Tài khoản của tôi</li>
                     </ul>
                  </nav>
               </div>
            </div>
         </div>
      </div>
      <!--breadcrumb area end-->
      <!-- Start Maincontent  -->
      <section class="main-content-area my-account ptb-100">
         <div class="container">
            <div class="account-dashboard">
               <div class="row">
                  <div class="col-sm-12 col-md-3 col-lg-3">
                     <!-- Nav tabs -->
                     <ul role="tablist" class="nav flex-column dashboard-list">
                        <li><a href="#dashboard" data-toggle="tab" class="nav-link active">Thông Tin</a></li>
                        <li> <a href="#orders" data-toggle="tab" class="nav-link">Orders</a></li>
                     </ul>
                  </div>
                  <div class="col-sm-12 col-md-9 col-lg-9">
                     <!-- Tab panes -->
                     <div class="tab-content dashboard-content">
                        <div class="tab-pane fade show active" id="dashboard">
                        <form action="my-account.php" method="POST">
                           <h3>Thông Tin</h3>
                           <div class="row">
                              
                              <div class="col-12 mb-30">
                                 <label for="b_c_name">Họ Và Tên </label>
                                 <input id="name" name="name"  type="text" value="<?php echo $hoten ?>">       
                              </div>
                              <div class="col-12 mb-30">
                                 <label>Địa Chỉ</label>
                                 <input id="address" name="address" type="text" value="<?php echo $diachi ?>">     
                              </div>
                              <div class="col-12 mb-30">
                                 <label for="b_city">Số Điện Thoại</label>
                                 <input id="phone" name="phone"  type="text" value="<?php echo $sdt ?>">     
                              </div>
                              <!-- <div class="order-button">
                              <button  type="submit">thay đổi thông tin</button></button></a>
                              </div> -->
                           </div>      
                     </form>

                          
                        </div>
                        <div class="tab-pane fade" id="orders">
                           
                           <div class="block_categories">
										<div class="category_top_menu widget">
											<div class="widget_title">
												<h3>Danh Sách Đã Mua</h3>
											</div>
											<ul class="shop_toggle">
                                    <?php                                       
                                       while($hang = $madon->fetch_object()) :
                                          $id_cart = $hang->Id;
                                          $cart_status = $hang->cart_status;
                                          $donhang = $db->query("SELECT cart_details.soluong_sanpham,cart_details.price_sanpham,product.name 
                                          FROM cart_details,product 
                                          WHERE (id_cart = $id_cart) AND (id_sanpham = id)");
                                    ?>
                                            
											   <li class="has-sub"><a href="#"><?php echo $hang->Id; ?></a>
													<ul class="categorie_sub">
                                          <?php 
                                             $tongtien = 0;
                                             while($don = $donhang->fetch_object()) :
                                                $tongtien += $don->price_sanpham;    
                                          ?>
													   <li><?php echo $don->name; ?><spam style="font-weight:700;"> x </spam><?php echo $don->soluong_sanpham; ?>
                                             <spam style="float:right;"><?= number_format($don->price_sanpham) ?>VND</spam>
                                          </li>
                                          
														<?php endwhile; ?>
                                          
                                          <li>
                                             <spam style="float:left;">Tổng Tiền: </spam>
                                             <spam style="float:right;"><?php echo $tongtien; ?>VND</spam>
                                          </li>
                                          <p></p>
                                          
                                          
                                          
													</ul>
                                       <ul>
                                             <spam style="float:right;">
                                             <?php if($cart_status == 1){ echo 'ĐANG XỬ LÝ';}
                                                   else{if($cart_status == 0) {
                                                      echo '<a style="color:#78a206;" href="xuly.php?trangthai='.$hang->Id.'">ĐÃ NHẬN HÀNG</a>';}
                                                      else{echo 'ĐÃ NHẬN HÀNG';} 
                                                   }
                                                    ?>
                                             </spam>
                                          </ul>
												</li>
                                    <?php endwhile; ?>
                                    
											</ul>   
										</div>
									</div>
									
                        </div>
                             
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- End Maincontent  -->
      <?php
        include('pages/footer.php');
      ?>
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
