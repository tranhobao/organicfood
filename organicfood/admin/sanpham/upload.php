<?php
require_once ('../db/dbhelper.php');
require_once ('../../connect.php');
include("../../connect.php");

?>
<!DOCTYPE html>
<html>
<head>
	<title>Thêm/Sửa Sản Phẩm</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

	<!-- summernote -->
	<!-- include summernote css/js -->
	<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
</head>
<body>
<?php if(isset($_GET['them'])){
	$idmax = $db->query("SELECT max(id) from product");
	$id = mysqli_fetch_array($idmax);
	
	echo '

	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Thêm Sản Phẩm</h2>
			</div>
			<div class="panel-body">
				<form  action="xuly.php" method="post" >

					<label for="name">Id Sản Phẩm('.$id[0].'):</label>
					<input type="number" min="1" class="form-control"  name="idsanpham" >
					
					<label for="name">Tên Sản Phẩm:</label>
					<input type="text" class="form-control" name="tensanpham" >
				
					<label for="price">Chọn Danh Mục:</label>
					<select class="form-control" name="iddanhmuc" >'?>
						<?php
						$sql = $db->query("SELECT * FROM groupsp ");
						

						while ($tt = $sql->fetch_object()) {
								echo '<option value="'.$tt->id.'">'.$tt->name.'</option>';
						}
						?>
						<?php echo '
					</select>
				
					<label for="price">Giá Bán:</label>
					<input type="number" min="1000" class="form-control" name="giasanpham" >

					<label for="price">Số Lượng:</label>
					<input type="number" min="1" class="form-control" name="soluongsanpham" >

					<label for="image">Hình ảnh:</label>
					<input type="file" class="form-control" name="hinhanhsanpham" >
				
					<label for="content">Nội Dung:</label>
					<textarea class="form-control" rows="5" name="noidungsanpham" ></textarea>
					<p></p>
			
					<input type="submit" class="btn btn-success" name="themsanpham" value="Thêm">
				</form>
			</div>
		</div>
	</div>';} 
	else{
		if(isset($_GET['sua'])){
			$idsanpham = $_GET['idsanpham'];
			$sql = $db->query("SELECT * FROM product Where id = '$idsanpham' ");
            $gettt = $sql->fetch_object();
			$price = $gettt->pricenew>0 ? $gettt->pricenew : $gettt->price;
			echo '

	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Sửa Sản Phẩm</h2>
			</div>
			<div class="panel-body">
				<form  action="xuly.php?idsanpham='.$idsanpham.'" method="post" >

					<label for="name">Tên Sản Phẩm:</label>
					<input type="text" class="form-control" name="tensanpham" value="'.$gettt->name.'" >
				
					<label for="price">Chọn Danh Mục:</label>
					<select class="form-control" name="iddanhmuc" >';?>
						<?php
						$sql = $db->query("SELECT * FROM groupsp ");
						while ($tt = $sql->fetch_object()) {
							if($tt->id == $gettt->groupid)
								echo '<option selected value="'.$tt->id.'">'.$tt->name.'</option>';
							else
							echo '<option value="'.$tt->id.'">'.$tt->name.'</option>';
							

						}
						?>
						<?php echo'
					</select>
				
					<label for="price">Giá Bán:</label>
					<input type="number" min="1000" class="form-control" name="giasanpham" value="'.$price.'">

					<label for="price">Số Lượng:</label>
					<input type="number" min="1" class="form-control" name="soluongsanpham" value="'.$gettt->soluong.'" >
					
					<label for="image">Hình ảnh:</label>
					<input type="file" class="form-control" name="hinhanhsanpham" >
					
					<label for="content">Nội Dung:</label>
					<textarea class="form-control" rows="5" name="noidungsanpham" value="'.$gettt->detail.'" ></textarea>
				
					<p></p>
			
					<input type="submit" class="btn btn-success" name="suasanpham" value="Sửa">
				</form>
			</div>
		</div>
	</div>';}
			}


?>

</body>
</html>