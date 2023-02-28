<?php
   require_once ('../db/dbhelper.php');
   require_once ('../common/utility.php'); 
?>
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
                  <ul class="nav navbar-nav navbar-right">
        <li hidden><a href="../../login.php?action=dangxuat">Đăng xuất</a></li>
          </li>
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
                     <a  href="thongke/index.php">
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
				<h2 class="text-center">Quản Lý Tin Tức</h2>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-lg-6">
						<a href="upload.php">
							<button class="btn btn-success" style="margin-bottom: 15px;">Thêm Tin Tức</button>
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
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th width="50px">STT</th>
							<th style="text-align: center;">Title</th>
							<th style="text-align: center;">Thumbnail</th>
							<th style="text-align: center;">Content</th>
                     <th style="text-align: center;">Ngày Cập Nhật</th>
							<th width="50px"></th>
							<th width="50px"></th>
						</tr>
					</thead>
					<tbody>
<?php
//Lay danh sach danh muc tu database
$limit = 3;
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
$sql = 'select * from news where 1 '.$additional.' limit '.$firstIndex.', '.$limit;

$categoryList = executeResult($sql);

$sql         = 'select count(id) as total from news where 1 '.$additional;
$countResult = executeSingleResult($sql);
$number      = 0;
if ($countResult != null) {
	$count  = $countResult['total'];
	$number = ceil($count/$limit);
}

foreach ($categoryList as $item) {
	echo '<tr>
				<th>'.(++$firstIndex).'</th>
				<th style = "text-align:center;">'.$item['title'].'</th>
				<th class="thumbnail"><img src="'."../../assets/img/blog/".$item['thumbnail'].'" style="max-width: 150px;"></th>
				<th style="text-align: center;">'.$item['content'].'</th>
				<th style="text-align: center;">'.$item['updated_at'].'</th>

				<th>
					<a href="add.php?id='.$item['id'].'"><button class="btn btn-warning">Sửa</button></a>
				</th>
				<th>
					<button class="btn btn-danger" onclick="deleteCategory('.$item['id'].')">Xoá</button>
				</th>
			</tr>';
}
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