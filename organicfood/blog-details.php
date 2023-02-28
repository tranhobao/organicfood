<?php
   include('connect.php');
   $id = (int)$_GET['id'];
   $query = $db->query("SELECT * FROM news WHERE id = $id ");
   $detail_blog = $query->fetch_object();
   session_start();

?>
<!doctype html>
<html class="no-js" lang="zxx">
   <head>
      <title>Blog Details - Organic, Food Html5 Template</title>
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
                           <a href="index.php">Trang chủ ></a>
                        </li>
                        <li>Tin tức</li>
                     </ul>
                  </nav>
               </div>
            </div>
         </div>
      </div>
      <!--breadcrumb area end-->
      <!--blog details area start-->      
      <div class="blog_details_area">
         <div class="container">
            <div class="row">
               <div class="col-lg-3 col-md-8">
                  <div class="blog_details_left">
                     <div class="blog_left_sidebar mb-50">
                        <div class="blog_sidebar_img">
                           <img src="assets/img/blog/4.jpg" alt="">    
                        </div>
                        <div class="blog_sidebar_img_content">
                           <p>On the other hand, dislike men who are so beguiled and the demoralized by the charms of pleasure of the moment.</p>
                           <h4>Tayeb rayed</h4>
                           <div class="blog_sidebar_social">
                              <ul>
                                 <li><a href="https://www.facebook.com/vohoangyenmodel"><i class="icofont icofont-social-facebook"></i></a></li>
                                 <li><a href="https://twitter.com/blackpink_lisa?fbclid=IwAR20IyOX2MhITymprTtH-MkUKduPhehMAj_2V13KK9uVWhHniNg30F7pnp8"><i class="icofont icofont-social-twitter"></i></a></li>
                                 <li><a href="https://www.instagram.com/ngoctrinh89/?fbclid=IwAR21QQFIbbYGFqCpL1EXNOQ2InIcNBeedTGPcFPrrQh2otlgPi0DSWMXB1g"><i class="fa fa-instagram"></i></a></li>
                                 <li><a href="https://www.youtube.com/channel/UCqECaJ8Gagnn7YCbPEzWH6g"><i class="fa fa-youtube"></i></a></li>
                              </ul>
                           </div>
                        </div>
                     </div>
                     <div class="blog_left_sidebar mb-50">
                        <h3>Bài viết gần đây</h3>
                        <?php
                           $con = mysqli_connect('localhost', 'root', '', 'qlbh');
                           $sql = 'select *from news limit 4';
                           $result = mysqli_query($con,$sql);
                           while($row = mysqli_fetch_array($result,1)){
                               echo '<div class="recent_post mb-30">
                                       <div class="recent_post_title">
                                           <a href="blog-details.php?id='.$row['id'].'"><img src="'."assets/img/blog/".''.$row['thumbnail'].'" alt=""></a>    
                                       </div>
                                       <div class="recent_post_content">
                                           <h4><a href="blog-details.php?id='.$row['id'].'">"'.$row['title'].'"</a></h4>
                                           <span class="post_date">"'.$row['updated_at'].'"</span>   
                                       </div>   
                                   </div>';
                           }
                           ?>
                     </div>
                  </div>
               </div>
               <div class="col-lg-9 col-md-12">
                  <div class="blog_details_info">
                     
                     <div class="blog_meta">
                           <ul>
                              <li>Fashion</li>
                              <li><?php echo $detail_blog->updated_at; ?></li>
                           </ul>   
                     </div>
                     <h2><?php echo $detail_blog->title; ?></h2> 
                     <div class="blog_details_img">
                           <img src="assets/img/blog/<?php echo $detail_blog->thumbnail; ?>" alt="">    
                     </div>   
                     <div class="post_excerpt">
                     <?php echo $detail_blog->content; ?>
                     </div>
                       
                        
                     
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!--blog details area end-->    
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