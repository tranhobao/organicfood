<?php
   require_once ('../db/dbhelper.php');
   require_once ('../common/utility.php'); 
   include_once ('user.php');
?>
<?php
 $user = new user();
    //Khóa/Mở người dùng
    if (!isset($_GET['statusname']) || $_GET['statusname'] == ''){
        echo "<script>'window.location = 'userlist.php'</script>";
    }else{

        $name = $_GET['statusname'];
        $changeStatusUser = $user->changeStatusUser($name);
    } 
?>
<html lang="en">
   <head>
      <title>Admin</title>
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
                  <


                  <!--Quản lý người dùng-->
                  <li class="panel panel-default" id="dropdown">
                     <a  href="index.php">
                     <i class="fa fa-diamond"></i> Quản lý người dùng
                     </a>
                  </li>
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
         <!-----Code của t nè---->
         <div class="container">
		<div class="panel panel-primarys">
			<div class="panel-headings">
				<h2 class="text-center">Quản Lý Người Dùng</h2>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-lg-6">
						<a href="add.php?them">
							<button class="btn btn-success" style="margin-bottom: 15px;">Thêm Người Dùng</button>
						</a>
					</div>
					<div class="col-lg-6">
						<form method="get">
						  <div class="form-group" style="width: 200px; float: right;">
						    <input type="text" class="form-control" placeholder="Searching..." id="s" name="s">
						  </div>
						</form>
					</div>
				</div>
            <?php
                                    if (isset($changeStatusUser)){
                                        echo $changeStatusUser;
                                    }
                            ?>
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th width="50px">STT</th>
							<th>Tên Người Dùng</th>
							<th>Địa Chỉ</th>
							<th>Số Điện Thoại</th>
							<th>Quyền truy cập</th>
							<th>Ngày cập nhật</th>
                     <th>Trạng thái</th>
							<th width="50px"></th>
							<th width="50px"></th>
						</tr>
					</thead>
					<tbody>
<?php
//Lay danh sach danh muc tu database
$limit = 10;
$page  = 1;
if (isset($_GET['page'])) {
	$page = $_GET['page'];
}
if ($page <= 0) {
	$page = 1;
}
$firstIndex = ($page-1)*$limit;

$s = '';
if (isset($_GET['s'])) {
	$s = $_GET['s'];
}

//trang can lay san pham, so phan tu tren 1 trang: $limit
$additional = '';

if (!empty($s)) {
	$additional = ' and name like "%'.$s.'%" ';
}
$sql = 'select * from user where 1 '.$additional.' limit '.$firstIndex.', '.$limit;

$categoryList = executeResult($sql);

$sql         = 'select count(id) as total from user where 1 '.$additional;
$countResult = executeSingleResult($sql);


$number      = 0;
if ($countResult != null) {
	$count  = $countResult['total'];
	$number = ceil($count/$limit);
}

foreach ($categoryList as $item) {
   ?>
	   <tr>
				<td><?php echo ++$firstIndex ?></td>
				<td><?php echo $item['name'] ?></td>
				<td><?php echo $item['address'] ?></td>
				<td><?php echo $item['phone'] ?></td>
				<td><?php echo $item['position'] ?></td>
				<td><?php echo $item['updated_at'] ?></td>
            <td>
            <?php
               if($item['tinhtrang'] == 0){
                  echo '<button type="button" class="btn btn-outline btn-success">Hoạt động</button>';
               }else{
                  echo '<button type="button" class="btn btn-outline btn-danger">Khóa</button>';
               }
            ?>
            </td>
				<td>
            <a href="add.php?sua&iduser=<?php echo $item['id'] ?>"><button class="btn btn-info">Sửa</button></a>
				</td>
				<td>
            <?php 
               $ten = $item['name'];
               echo "<a href='?statusname=$ten' ><button type='button' class='btn btn-warning'>Mở / Khóa</button></a>";
               ?>
               </td>
            </tr>
<?php }
?>
</tbody>
				</table>
				<!-- Bai toan phan trang -->
<?=paginarion($number, $page, '&s='.$s)?>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		function deleteCategory(id) {
			var option = confirm('Bạn có chắc chắn muốn xoá danh mục này không?')
			if(!option) {
				return;
			}

			console.log(id)
			//ajax - lenh post
			$.post('ajax.php', {
				'id': id,
				'action': 'delete'
			}, function(data) {
				location.reload()
			})
		}
	</script>
      </div>
      <?php
         include('../pages_admin/footer.php');
         ?>
   </body>
</html>