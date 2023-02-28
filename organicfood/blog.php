<?php
   include('connect.php');
   $sql_trang = $db->query("SELECT * FROM news");
   $row_count = mysqli_num_rows($sql_trang);
   $trang = ceil($row_count/6);
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
   if( $page == 1){
      $begin = 1;
   }else{
      $begin = ($page*6)-6;
   }
   $blog = $db->query("SELECT * FROM news Order By  id ASC LIMIT $begin,6");
   session_start();
?>
<!doctype html>
<html class="no-js" lang="zxx">
   <head>
      <title>Blog-eCommerce Bootstrap4 Template</title>
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
      <!--blog area start-->
      <div class="blog_list_area">
         <div class="container">
            <div class="row">
               <?php
                  while($tin = $blog->fetch_object()) : ?>
                  <div class="col-lg-4 col-md-6 col-sm-12">
                     <div class="single_blog_list">
                        <div class="blog__thumb">
                              <a href="blog-details.php?id=<?php echo $tin->id;?>"><img src="assets/img/blog/<?php echo $tin->thumbnail;?>" alt=""></a>    
                        </div>
                        <div class="post__content">
                              <h3><a href="blog-details.php?id=<?php echo $tin->id;?>"><?php echo $tin->title;?></a></h3>
                              <ul>
                                 <li><a href="blog-details.php?id=<?php echo $tin->id;?>">Xem thêm.....</a></li>
                                 <li class="post_date"><?php echo $tin->updated_at;?></li>
                              </ul>    
                        </div>
                     </div>    
                  </div>  
               <?php endwhile; ?>          
            </div>
         </div>
         <div class="shop_pagination">
            <div class="row align-items-center">   
                  
                  <div class=" offset-lg-9 ">
                     <div class="page_list_clearfix text-center">
                        <ul>
                              <li class="prev"><a type="submit" onclick="this.href='blog.php?trang=' + ( +document.getElementById('page_blog').value + -1) "><i class="zmdi zmdi-chevron-left"></i> Previous</a></li>
                              <li style="width:100px"><input class="form-control" type="text" id="page_blog" value=" <?php if(!isset($page)) $page = 1; echo $page; ?> "></a> </li>
                              <li class="next"> <a type="submit" onclick="this.href='blog.php?trang=' + ( +document.getElementById('page_blog').value + +1) "> Next <i class="zmdi zmdi-chevron-right"></i></a></li>
                        </ul> 
                     </div>         
                  </div>
            </div>          
         </div>
      </div>
      
      <!--blog area end-->
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
