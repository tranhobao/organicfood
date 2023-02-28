<?php 
	include("../../connect.php");

	

?>
<!DOCTYPE html>
<html>
<head>
	<title>Thêm/Sửa Danh Mục Sản Phẩm</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<?php if(isset($_GET['them'])){
	$idmax = $db->query("SELECT max(id) from groupsp");
	$id = mysqli_fetch_array($idmax);
	echo '
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Thêm Danh Mục Sản Phẩm</h2>
			</div>
			<div class="panel-body">
				<form method="post" action="xuly.php">
					<div class="form-group">
						<label for="name">Id Danh Mục('.$id[0].'):</label>
						<input type="number" min="1" class="form-control"  name="iddanhmuc">
						
						<label for="name">Tên Danh Mục:</label>
						<input type="text" class="form-control" name="tendanhmuc">
						<p></p>
						<input type="submit" class="btn btn-success" name="themdanhmuc" value="Thêm">
					</div>
					
				</form>
			</div>
		</div>
	</div>';}
	else{
		if(isset($_GET['sua'])){
			$iddanhmuc = $_GET['iddanhmuc'];
			$sql = $db->query("SELECT * FROM groupsp Where id = '$iddanhmuc' ");
            $gettt = $sql->fetch_object();
		echo '
		<div class="container">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h2 class="text-center">Sửa Danh Mục Sản Phẩm</h2>
				</div>
				<div class="panel-body">
					<form method="post" action="xuly.php?iddanhmuc='.$iddanhmuc.'">
						<div class="form-group">
							<label for="name">Tên Danh Mục:</label>
							<input type="text" class="form-control" name="tendanhmuc" value="'.$gettt->name.'">
							<p></p>
							<input type="submit" class="btn btn-success" name="suadanhmuc" value="Sửa">
						</div>
						
					</form>
				</div>
			</div>
		</div>';}
	}
?>
	

</body>
</html>