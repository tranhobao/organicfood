

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin</title>
    <?php
        include('pages_admin/head.php');
        
    ?>
    <link rel="stylesheet" href="pages_admin/admin.css">
</head>
<body>
<nav class="mnb navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <i class="ic fa fa-bars"></i>
        </button>
        <div style="padding: 15px 0;">
           <a href="#" id="msbo"><i class="ic fa fa-bars"></i></a>
        </div>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
        <li hidden><a href="../login.php?action=dangxuat">Đăng xuất</a></li>
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
              <a class="navbar-brand" href="index.php">
                ADMIN 
              </a>
            </div>
          </div>
  
        </div>
  
        <!-- Main Menu -->
        <div class="side-menu-container">
          <ul class="nav navbar-nav">
  
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Trang chính</a></li>

            <!-- Dropdown-->
            <li class="panel panel-default" id="dropdown">
              <a href="danhmuc/index.php">
                <i class="fa fa-diamond"></i> Quản lý danh mục
              
              </a>
              
            </li>

            <!--Chinh sua sản phẩm-->
            <li class="panel panel-default" id="dropdown">
              <a href="sanpham/index.php">
                <i class="fa fa-diamond"></i> Quản lý sản phẩm 
              </a>
            </li>
            <!--End -->

            <!--Quản lý tin tức-->
            <li class="panel panel-default" id="dropdown">
              <a href="tintuc/index.php">
                <i class="fa fa-diamond"></i> Quản lý tin tức
                
              </a>
            </li>
            <!--end-->

            <!--Quản lý người dùng-->
            <li class="panel panel-default" id="dropdown">
              <a  href="nguoidung/index.php">
                <i class="fa fa-diamond"></i> Quản lý người dùng
               
              </a>
            </li>

            <!--Quản lý hóa đơn-->
            <li class="panel panel-default" id="dropdown">
              <a  href="hoadon/index.php">
                <i class="fa fa-diamond"></i> Quản lý hóa đơn 
               
              </a>
            </li>
            <!--end-->
            <li class="panel panel-default" id="dropdown">
              <a  href="thongke/index.php">
                <i class="fa fa-diamond"></i> Thống kê                 
              </a>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </nav>  
  </div>
  <!--main content wrapper-->

 
  <div class="mcw">  
         <div class="inbox-bx container-fluid">
           <div class="row">
           <div class="container">
		<div class="panel panel-primarys">
			<div class="panel-headings">
				
			</div>
            <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-product-hunt" style="font-size: 70px;"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge">
                                        <?php
                                            $con = mysqli_connect("localhost","root","","qlbh");
                                            $result=mysqli_query($con,"SELECT count(*) as total from product");
                                            $data=mysqli_fetch_assoc($result);
                                            echo $data['total'];
                                        ?>
                                                  
                                            </div>
                                            
                                            <div>Sản phẩm!</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="sanpham/index.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">Xem chi tiết</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-green">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-area-chart" style="font-size: 70px;"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge">
                                            <?php
                                            $con = mysqli_connect("localhost","root","","qlbh");
                                            $result=mysqli_query($con,"SELECT count(*) as total from news");
                                            $data=mysqli_fetch_assoc($result);
                                            echo $data['total'];
                                        ?>
                                            </div>
                                            <div>Tin tức</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="tintuc/index.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">Xem chi tiết</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-yellow">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-shopping-cart" style="font-size: 70px;"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge">
                                            <?php
                                            $con = mysqli_connect("localhost","root","","qlbh");
                                            $result=mysqli_query($con,"SELECT count(*) as total from cart");
                                            $data=mysqli_fetch_assoc($result);
                                            echo $data['total'];
                                        ?> 
                                            </div>
                                            <div>Hóa đơn</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="hoadon/index.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">Xem chi tiết</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-red">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-users" style="font-size: 70px;"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                          <div class="huge">
                                          <?php
                                            $con = mysqli_connect("localhost","root","","qlbh");
                                            $result=mysqli_query($con,"SELECT count(*) as total from user");
                                            $data=mysqli_fetch_assoc($result);
                                            echo $data['total'];
                                            ?>  
                                            </div>
                                            
                                            <div>Người dùng!</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="nguoidung/index.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">Xem chi tiết</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>           
             </div>
           </div>
         </div>
       </div>
      </div>
    </div>
  </div>

    <!--main content view-->

  </div>
    <?php
        include('pages_admin/footer.php');
    ?>

</body>
</html>