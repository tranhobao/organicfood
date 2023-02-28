<?php
require_once ('../db/dbhelper.php');
require_once ('../common/utility.php'); 
include("../../connect.php")
?>
<html lang="en">
   <head>
      <title>Admin</title>
      <?php
         include('../pages_admin/head.php');    
         include("../../pages/import.php");
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
      ul{
         
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
               <form class="navbar-form navbar-right" action="index.php">
                  <input type="text" class="form-control" placeholder="Search..." name="tukhoa">
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
                     <a href="index.php">
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
                     <a  href="../thongke/index.php">
                        <i class="fa fa-diamond"></i> Thống kê                 
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
         <!---Phần bên t copy qua-->
         <div class="container">
		<div class="panel panel-primarys">
			<div class="panel-headings">
				<h2 class="text-center">Quản Lý Sản Phẩm</h2>
			</div>
			<div class="panel-body">
				<a href="upload.php?them">
					<button class="btn btn-success" style="margin-bottom: 15px;">Thêm Sản Phẩm</button>
				</a>
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th width="50px">STT</th>
							<th>Hình Ảnh</th>
							<th>Tên Sản Phẩm</th>
                     <th>Số Lượng</th>
							<th>Giá Sản Phẩm</th>
                     <th>Giá Sale</th>
							<th>Danh Mục</th>
                     <th>Ngày Nhập</th>
							<th width="50px"></th>
							<th width="50px"></th>
						</tr>
					</thead>
					<tbody>
<?php
$tukhoa = isset($_GET['tukhoa']) ? $_GET['tukhoa'] : '';
$sql_trang = $db->query("SELECT * FROM product where name like '%$tukhoa%'");
$row_count = mysqli_num_rows($sql_trang);
$trang = ceil($row_count/10);
if(isset($_GET['trang'])){
   $page = $_GET['trang'];
   if($page > $trang)
       $page = 1;
   if($page < 1){
       $page = +$trang ;
   }
}
else{
   $page = 1;
}
$begin = ($page - 1)*10;


//Lay danh sach danh muc tu database
$them = $db->query("SELECT * from product where name like '%$tukhoa%' OR price like '%$tukhoa%'  LIMIT $begin,10 ");

$firstIndex = 0;
while ($sp = $them->fetch_object()) {
	echo '<tr>
				<th>'.(++$firstIndex).'</th>
				<th class="image"><img src="'."../../assets/img/product/".''.$sp->image.'"> </th>
				<th style = "text-align:center;">'.$sp->name.'</th>
            <th style = "text-align:center;">'.$sp->soluong.'</th>
				<th style = "text-align:center;">'.$sp->price.'</th>';?>

            <?php if(($sp->pricenew)>0 )echo '<th style = "text-align:center;">'.$sp->pricenew.'</th>';
                  else echo'<th style = "text-align:center;">'.$sp->price.'</th>';
            ?>
<?php echo'            
				<th style = "text-align:center;">'.$sp->groupid.'</th>
            <th style = "text-align:center;">'.$sp->updated_at.'</th>
				<th>
					<a href="upload.php?sua&idsanpham='.$sp->id.'"><button class="btn btn-warning">Sửa</button></a>
				</th>
				<th>
            <a href="xuly.php?query=xoa&idsanpham='.$sp->id.'"><button class="btn btn-warning">Xóa</button></a>
				</th>
			</tr>';
}
?>


</tbody>
				</table>

 
      <div class="row">
         <div class="col-lg-9 col-md-12 col-12">
            <div class="shop_pagination">
               <div class="row align-items-center">   
                     
                  <div class="col-lg-6 offset-lg-2 col-md-6 col-sm-6">
                     <div class="page_list_clearfix text-center">
                        <ul>
                              <li class="prev"><a type="submit" onclick="this.href='index.php?tukhoa=<?php echo isset($tukhoa)?$tukhoa:'' ?>&trang=' + ( +document.getElementById('page_index').value + -1) "><i class="zmdi zmdi-chevron-left"></i> Previous</a></li>
                              <li style="width:100px"><input class="form-control" type="text" id="page_index" value=" <?php if(!isset($page)) $page = 1; echo $page; ?> "></a> </li>
                              <li class="next"> <a type="submit" onclick="this.href='index.php?tukhoa=<?php echo isset($tukhoa)?$tukhoa:'' ?>&trang=' + ( +document.getElementById('page_index').value + +1) "> Next <i class="zmdi zmdi-chevron-right"></i></a></li>
                        </ul> 
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