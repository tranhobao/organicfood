<html lang="en">
   <head>
      <title>CodePen</title>
      <?php
         include('../pages_admin/head.php');    
         ?>
   </head>
   <body translate="no" data-new-gr-c-s-check-loaded="14.1006.0" data-gr-ext-installed="">
      <nav class="mnb navbar navbar-default navbar-fixed-top">
         <div class="container-fluid">
            <div class="navbar-header">
               <div style="padding: 15px 0;">
                  <a href="#" id="msbo"><i class="ic fa fa-bars"></i></a>
               </div>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
               <ul class="nav navbar-nav navbar-right">
                  <li class="dropdown">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Draude Oba <span class="caret"></span></a>
                     <ul class="dropdown-menu">
                        <li><a href="#">Settings</a></li>
                        <li><a href="#">Upgrade</a></li>
                        <li><a href="#">Help</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Đăng xuất</a></li>
                     </ul>
                  </li>
               </ul>
               <form class="navbar-form navbar-right">
                  <input type="text" class="form-control" placeholder="Search...">
               </form>
            </div>
         </div>
      </nav>
      <!--msb: main sidebar-->
      <div class="msb" id="msb">
         <nav class="navbar navbar-default" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
               <div class="brand-wrapper">
                  <!-- Brand -->
                  <div class="brand-name-wrapper">
                     <a class="navbar-brand" href="../index.php">
                     ADMIN 
                     </a>
                  </div>
               </div>
            </div>
            <!-- Main Menu -->
            <div class="side-menu-container">
               <ul class="nav navbar-nav">
                  <li><a href="../index.php"><i class="fa fa-dashboard"></i> Trang chính</a></li>
                  <!-- Dropdown-->
                  <li class="panel panel-default" id="dropdown">
                     <a href="../danhmuc/index.php">
                     <i class="fa fa-diamond"></i> Quản lý danh mục
                     </a>
                  </li>
                  <!--Chinh sua sản phẩm-->
                  <li class="panel panel-default" id="dropdown">
                     <a href="../sanpham/index.php">
                     <i class="fa fa-diamond"></i> Quản lý sản phẩm 
                     </a>
                  </li>
                  <!--End -->
                  <!--Quản lý tin tức-->
                  <li class="panel panel-default" id="dropdown">
                     <a href="index.php">
                     <i class="fa fa-diamond"></i> Quản lý tin tức
                     </a>
                  </li>
                  <!--end-->
                  <!--Quản lý người dùng-->
                  <li class="panel panel-default" id="dropdown">
                     <a  href="../nguoidung/index.php">
                     <i class="fa fa-diamond"></i> Quản lý người dùng
                     </a>
                  </li>
                  <!--end-->
               </ul>
            </div>
            <!-- /.navbar-collapse -->
         </nav>
      </div>
      <!--main content wrapper-->
      <div class="mcw">
         <!--navigation here-->
         <!--main content view-->
         <div class="cv">
            <div>
               <div class="inbox">
                  <div class="inbox-bx container-fluid">
                     <div class="row">
                        <div class="col-md-2">
                           <ul>
                              <li><a href="#">Danh sách tin tức</a></li>
                              <li><a href="#">Thêm tin tức</a></li>
                              <li><a href="#">Sửa tin tức</a></li>
                              <li><a href="#">Xóa tin tức</a></li>
                           </ul>
                        </div>
                        <div class="col-md-10">
                           <div class="panel-body">
                              <table class="table table-bordered">
                              <thead>
                                 <tr>
                                    <th>STT</th>
                                    <th>Tên tin tức</th>
                                    <th>Chi tiết tin </th>
                                    <th>Hình ảnh</th>
                                    <th>Ngày cập nhật giá</th>
                                 </tr>
                              </thead>
                              <tbody>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <?php
         include('../pages_admin/footer.php');
         ?>
   </body>
</html>