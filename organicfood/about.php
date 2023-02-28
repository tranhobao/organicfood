
<?php
   include('connect.php');
   
   session_start();

?>
<!doctype html>
<html class="no-js" lang="zxx">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <title>About - eCommerce Bootstrap4 Template</title>
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
                        <li>Giới thiệu</li>
                     </ul>
                  </nav>
               </div>
            </div>
         </div>
      </div>
      <!--breadcrumb area end--> 
      <!--about section area start-->
      <div class="about_section">
         <div class="container">
            <div class="row">
               <div class="col-lg-10 offset-lg-1 col-md-12 text-center">
                  <div class="about_section_one">
                     <h2>Chào Mừng Đến Với Organicfood Store</h2>
                     <p?>Organicfood là công ty thương mại điện tử chuyên cung cấp các thực phẩm hữu cơ 
                        và tự nhiên với chuỗi cửa hàng thực phẩm hữu cơ với mục tiêu giúp người tiêu dùng Việt
                        Nam có một cuộc sống khỏe mạnh hơn thông qua những loại thực phẩm hữu cơ có chứng nhận,
                        thực phẩm tự nhiên và không có nguồn gốc biến đổi gene (GMO). Chúng tôi lựa chọn các
                        loại thực phẩm hữu cơ, thực phẩm tự nhiên từ các nhà sản xuất, các công ty trong và 
                        ngoài nước thông qua quá trình lựa chọn kỹ càng về khả năng cung ứng, các giấy chứng
                        nhận tiêu chuẩn do các tổ chức uy tín thế giới cấp. Chúng tôi yêu thích những gì 
                        chúng tôi làm và chúng tôi đam mê những lợi ích của một lối sống lành mạnh, tìm nguồn
                        cung cấp sản phẩm hữu cơ chất lượng cao nhất cho khách hàng và cung cấp dịch vụ giao hàng
                        tận nhà tốt nhất.</p>
                     <p>Chúng tôi hoàn toàn tin tưởng rằng những sản phẩm tạo ra từ quá trình canh
                        tác và sản xuất theo phương thức hữu cơ và tự nhiên tốt cho cơ thể mọi người, tốt hơn cho 
                        cộng đồng và tốt hơn cho hành tinh mà chúng ta đang sống.</p> 
                     <p>Một lần nữa, Organicfood.vn được
                        sáng lập bởi các nhà sáng lập muốn tạo dựng một cộng đồng thực phẩm sạch, dựa trên nền tảng 
                        hữu cơ (organic) và thuần từ thiên nhiên, nhằm mang lại sức khoẻ tốt nhất cho cộng đồng.</p>
                  </div>
                  <div class="about__store__btn">
                     <a href="contact.php">Liên Hệ Chúng Tôi</a>    
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!--about section area end-->
      <!-- about area start-->
      <div class="about_chooseUs_area">
         <div class="container-fluid">
            <div class="row no-gutters">
               <div class="col-xl-6 col-lg-12 col-md-12">
                  <div class="video__wrape__area" style="background-image:url(assets/img/banner/about1.jpg)">
                     <div class="video__inner">
                        <a class="video__trigger" href="https://www.youtube.com/watch?v=cDDWvj_q-o8"><i class="zmdi zmdi-play"></i></a>    
                     </div>
                  </div>
               </div>
               <div class="col-xl-6 col-lg-12 col-md-12">
                  <div class="about_choose_content">
                     <h3>Why Choose Us?</h3>
                     <div class="choose_content_inner">
                        <div class="single_choose_us">
                           <div class="choose_us mb-50">
                              <div class="choose_icone">
                                 <i class="zmdi zmdi-favorite-outline"></i>
                              </div>
                              <div class="choose_details">
                                 <h4>Free Gift Box</h4>
                                 <p>Gói hàng chuyển phát được đóng gói cẩn thận tránh ảnh hưởng đến chất lượng sản phẩm. </p>
                              </div>
                           </div>
                           <div class="choose_us">
                              <div class="choose_icone">
                                 <i class="zmdi zmdi-truck"></i>
                              </div>
                              <div class="choose_details">
                                 <h4>Delivery</h4>
                                 <p>Dịch vụ chuyển hàng, dịch vụ giao hàng tận nơi nhanh, uy tín với chi phí thấp.</p>
                              </div>
                           </div>
                        </div>
                        <div class="single_choose_us">
                           <div class="choose_us  mb-50">
                              <div class="choose_icone">
                                 <i class="zmdi zmdi-refresh-alt"></i>
                              </div>
                              <div class="choose_details">
                                 <h4>Money Back</h4>
                                 <p>Hoàn tiền không giới hạn cho các chi tiêu tại Organicfood Store. </p>
                              </div>
                           </div>
                           <div class="choose_us">
                              <div class="choose_icone"><i class="zmdi zmdi-time"></i>  </div>
                              <div class="choose_details">
                                 <h4>Support 24/7</h4>
                                 <p>Hỗ trợ trực tuyến 24/7. Organicfood luôn quan tâm đến sức khỏe cộng đồng. </p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- about area end -->
      <!--about team area start--> 
      
      <!--about team area end--> 
      <!--testimonial area start--> 
      
      <!--testimonial area end-->  
      <div class="organic_food_wrapper">
         <!--Brand logo start-->  
         
         <!--Brand logo end-->   
         <?php
            include('pages/footer.php');
         ?>
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