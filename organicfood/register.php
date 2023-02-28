<?php
   include('connect.php');
   session_start();
   if(isset($_POST['username'])){
      $username = $_POST['username']; 
      $query = "SELECT * FROM USER WHERE username = '$username'";
      $result = $db->query($query);  
      $password = md5($_POST['password']);
      $fullname = $_POST['fullName'];
      $phone = $_POST['phone'];
      $email = $_POST['email'];
      $address = $_POST['diachi'];
      date_default_timezone_set('Asia/Ho_Chi_Minh');
      $date = date_create();
      // print_r ($date);
      // echo date("Y-m-d H:i:s");
      // exit;
      $created_at = date("Y-m-d H:i:s");
      $idmax = $db->query("SELECT max(id) from user");
	   $row = mysqli_fetch_array($idmax);
      $id = $row[0]+1 ;
      if(mysqli_num_rows($result) != 0){
         $alert = 'Tên đăng nhập đã tồn tại ';

      }else{
         $sql = "INSERT INTO user(id,name,username,password,email,address,phone,updated_at,created_at,position,tinhtrang)
            values ('$id','$fullname','$username','$password','$email','$address','$phone','$created_at','$created_at',2,0)";
         $db->query($sql);
         
      
      }
      
      
   }
?>


<!doctype html>
<html class="no-js" lang="zxx">
   <head>
      <title>Register- eCommerce Bootstrap4 Template</title>
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
                        <li>Đăng ký</li>
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
               <div class="col-lg-8 offset-lg-2">
                  <div class="register_page_form">
                     <form action="register.php" method="POST">
                        <div class="row">

                        <div class="col-12">
                              <div class="input_text">
                                 <label for="R_N12">Tài khoản<span>*</span></label>
                                 <input id="R_N12" type="text" name="username" required title="Vui lòng nhập tên tài khoản"> 
                              </div>
                              <?php if(isset($alert)): ?>
                              <section class="alert alert-danger"><?=$alert?></section>
                              <?php endif; ?>
                           </div>
                           <div class="col-12">
                              <div class="input_text">
                                 <label for="R_N11">Mật khẩu<span>*</span></label>
                                 <input id="R_N11" type="password" name="password" required pattern=".{6,}" title="Mật khẩu phải từ 6 ký tự">    
                              </div>
                           </div>
                           <div class="col-12">
                              <div class="input_text">
                                 <label for="R_N11">Nhập lại mật khẩu<span>*</span></label>
                                 <input id="R_N11" type="password" name="repassword" required 
                                 oninput="if(value!=password.value){document.getElementById('checkPass').innerHTML='Mật khẩu không trùng khớp'}else{document.getElementById('checkPass').innerHTML=' '}">
                                 <span id="checkPass" style="color: red; margin-bottom: 10px;"></span>  
                              </div>
                           </div>

                           <div class="col-12">
                              <div class="input_text">
                                 <label for="R_N5  ">Họ và tên<span>*</span></label>
                                 <input id="R_N" type="text" name="fullName" required> 
                              </div>
                           <div class="col-12">
                              <div class="input_text">
                                 <label for="R_N">Địa chỉ email: </label>
                                 <input id="R_N" type="email" name="email" pattern=".+@.+(\.[a-z]{2,3}){1,2}" > 
                              </div>
                           </div>
                           <div class="col-12" >
                              <div class="input_text">
                                 <label for="R_N5">Số điện thoại<span>*</span></label>
                                 <input id="R_N5" type="text" name="phone" pattern="\d{10}" required title="Số điện thoại không đúng" >  
                              </div>
                           </div>
                           <div class="col-12">
                              <div class="input_text">
                                 <label for="R_N12">Địa chỉ<span>*</span></label>
                                 <input id="R_N12" type="text" name="diachi" required> 
                              </div>
                           </div>      
                           <div class="col-12">
                              <div class="login_submit">
                                 <a href="login.php"><input value="Đăng Ký" type="submit"></a>
                              </div>
                           </div>
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