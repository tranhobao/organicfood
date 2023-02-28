<?php
require_once ('../db/dbhelper.php');
require_once ('../common/utility.php'); 
?>
<html lang="en">
   <head>
      <title>Admin</title>
      <?php
         include('../pages_admin/head.php');    
         ?>

      <style>
      img{
         width: 50%;
         margin-left: 10px;
      }
      .image{
         width: 20%;
      }

      th{
         text-align: center; 
      }

      p{
         vertical-align: middle;
         padding-top: 25px;
      }

      </style>
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
                  <ul class="nav navbar-nav navbar-right">
                    <li hidden><a href="../../login.php?action=dangxuat">Đăng xuất</a></li>
                    </li>
                    </ul>
                  </li>
               </ul>
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
                     <a href="../tintuc/index.php">
                     <i class="fa fa-diamond"></i> Quản lý tin tức
                     </a>
                  </li>
                  <!--end-->

                  <!--Quản lý hoa don-->
                  
                  <!--end-->
                  <!--Quản lý người dùng-->
                  <li class="panel panel-default" id="dropdown">
                     <a  href="../nguoidung/index.php">
                     <i class="fa fa-diamond"></i> Quản lý người dùng
                     </a>
                  </li>
                  <!--end-->
                  <!--Quản lý hóa đơn-->
                  <li class="panel panel-default" id="dropdown">
                     <a  href="../hoadon/index.php">
                     <i class="fa fa-diamond"></i> Quản lý hóa đơn
                     </a>
                  </li>
                  <!--end-->
                  <!--Quản lý thống kê-->
                  <li class="panel panel-default" id="dropdown">
                     <a  href="index.php">
                        <i class="fa fa-diamond"></i> Thống kê                 
                     </a>
                  </li>
                  <!--end-->
            </li>
               </ul>
            </div>
            <!-- /.navbar-collapse -->
         </nav>
      </div>
      <!--main content wrapper-->
      <div class="mcw">
         <!--navigation here-->
         <!--main content view-->
         <!---Phần bên t copy qua-->
         <div class="container">
		<div class="panel panel-primarys">
			<div class="panel-headings">
				<h2 class="text-center">Thống kê doanh thu</h2>
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
                                <a href="../sanpham/index.php">
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
                                <a href="../tintuc/index.php">
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
                                <a href="../hoadon/index.php">
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
                                <a href="../nguoidung/index.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">Xem chi tiết</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

</tbody>
<div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Thống kê theo sản phẩm</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-8">
                            

                            <!-- <div class="panel panel-default"> -->
                                <!-- <div class="panel-heading">
                                    <i class="fa fa-bar-chart-o fa-fw"></i> Thống kê theo tháng
                                </div> -->
                                <!-- /.panel-heading
                                <div class="panel-body">
                                    <div id="morris-area-chart"></div>
                                </div> -->
                                <!-- /.panel-body -->
                           <!--  </div> -->
                            <!-- /.panel -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <i class="fa fa-bar-chart-o fa-fw"></i> Thống kê doanh thu
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-hover table-striped">
                                                    <thead>
                                                    <tr>
                                                    
                                                     
                                                        <th>Số lượng sản phẩm đã bán</th>
                                                      
                                                        <th>Tổng doanh thu</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                        $con = mysqli_connect("localhost","root","","qlbh");
                                                        $result = mysqli_query($con,"SELECT product.name,cart_details.soluong_sanpham,product.image FROM cart_details,product WHERE cart_details.id_sanpham = product.id");
                                                        $count = mysqli_query($con,"SELECT COUNT(soluong_sanpham) AS total FROM cart_details");
                                                        $row1 = mysqli_fetch_assoc($count);
                                                        $temp = mysqli_query($con,"SELECT SUM(price_sanpham) AS tong FROM cart_details");
                                                        $row2 = mysqli_fetch_assoc($temp);
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $row1['total'] ?></td>
                                                        <td><?php echo number_format($row2['tong']) ?></td>
                                                    </tr>
                                                    <?php  ?>                                                                                     
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- /.table-responsive -->
                                        </div>
                                        <!-- /.col-lg-4 (nested) -->
                                        <div class="col-lg-8">

                                            <div id="morris-bar-chart"></div>
                                        </div>
                                        <!-- /.col-lg-8 (nested) -->
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                            
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-8 -->
                        
                        <!-- /.col-lg-4 -->
                    </div>
                    <!-- /.row -->
                </div>
				</table>
				<!-- Bai toan phan trang -->

      </div>
      <?php
         include('../pages_admin/footer.php');
         ?>
   </body>
</html>