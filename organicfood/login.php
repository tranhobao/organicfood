<?php
   session_start();
   include('connect.php');
   if(isset($_POST['login'])){
      $username = $_POST['username'];
      $password = md5($_POST['password']);
      $sql = "SELECT * FROM user WHERE username= '$username' AND password= '$password'";
      $row = mysqli_query($db, $sql);

      if(mysqli_num_rows($row) > 0){
         $result = mysqli_fetch_array($row);
         $_SESSION['login'] = $result['username'];
         $_SESSION['id_khachhang']= $result['id'];

         $_SESSION['hoten']= $result['name'];
         $_SESSION['diachi']= $result['address'];
         $_SESSION['sdt']= $result['phone'];

         if($result['tinhtrang'] == 1){
            $alert = "Tài khoản của bạn đã bị khóa !! ";
         }else if($result['position'] == 1){
               $_SESSION['log_admin'] = $result['position'];
               header('Location:admin/index.php');
               }else{
                  header("Location:index.php");
               }

      }else{
         $alert = "Tên đăng nhập hoặc mật khẩu không đúng, vui lòng nhập lại !! ";        
      }
   }  
?>
  
<!doctype html>
<html class="no-js" lang="zxx">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <title>Login - eCommerce Bootstrap4 Template</title>
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1">
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
                        <li>Đăng nhập</li>
                     </ul>
                  </nav>
               </div>
            </div>
         </div>
      </div>
      <!--breadcrumb area end-->
      <!--login section start-->
      <div class="page_login_section">
         <div class="container">
            <div class="row">
               <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-10 offset-sm-1">
                  <div class="login_page_form">

                     <form action="" autocomplete="off" method="POST">
                        <div class="row">
                        <?php if(isset($alert)):?>
                              <section class="alert alert-danger" style="margin-bottom: 10px; margin-left: 15px"><?=$alert?></section>
                           <?php endif; ?>
                           <div class="col-12">
                              <div class="input_text">
                                 <label for="name">Tên tài khoản <span>*</span></label>
                                 <input id="name" type="text" name="username">    
                              </div>
                           </div>
                           <div class="col-12">
                              <div class="input_text">
                                 <label for="password">Mật khẩu <span>*</span></label>
                                 <input id="password" type="password" name="password"> 
                              </div>
                           </div>
                           <div class="col-12">
                              <div class="login_submit">
                                 <input class="inline" value="Đăng nhập" name="login" type="submit">
                                 <label class="inline" for="rememberme">
                                 <input id="rememberme" type="checkbox">
                                 Ghi nhớ mật khẩu	
                                 </label>   
                              </div>
                           </div>
                           <p style="padding-top: 15px; padding-left:140px; color:gray;">Tạo tài khoản ngay 
                           <i class="fas fa-hand-point-right"></i> 
                           <a href="register.php" style="color: black;">Đăng ký</a></p>
                        </div>
                     </form>

                  </div>
               </div>
            </div>
         </div>
      </div>
      <!--login section end-->
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