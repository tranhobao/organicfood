<?php 
	include("../../connect.php");

?>


<!DOCTYPE html>
<html>
<head>
	<title>Thêm/Sửa Danh sách người dùng</title>
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
	$idmax = $db->query("SELECT max(id) from user");
	$id = mysqli_fetch_array($idmax);
	
			
?>
		<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Thêm Người Dùng</h2>
			</div>
			<div class="panel-body">
				<form method="post" action="xuly.php">
					<div class="form-group">
						<label for="name">ID Người dùng (<?php echo $id[0] ?>):</label>
						<input type="text" class="form-control"  name="iduser">
						
						<label for="name">Họ, tên người dùng:</label>
						<input type="text" class="form-control" name="tenuser">
						<label for="address">Địa chỉ: </label>
						<input type="text" class="form-control" name="address">
						<label for="phone">Số điện thoại: </label>
						<input type="text" class="form-control" name="phone" pattern="\d{10}" required title="Số điện thoại không đúng"  >
						<label for="username">Tên đăng nhập: </label>
						<input type="text" class="form-control" name="username" required title="Vui lòng nhập tên tài khoản" >

						
						<label for="pass">Mật khẩu: </label>
						<input type="password" class="form-control" name="password"  required pattern=".{6,}" title="Mật khẩu phải từ 6 ký tự" >
						<label for="pass">Nhập lại mật khẩu: </label>
                		<input type="password" class="form-control" name="repassword" required oninput="if(value!=password.value){document.getElementById('checkPass.').innerHTML='Mật khẩu không trùng khớp'}else{document.getElementById('checkPass').innerHTML=' '}">
						<span id="checkPass" style="color: red; margin-bottom: 10px;"></span> 
						<br>
						<label for="position">Phân quyền:</label>
						
							<select name="position" id="position">
							<option value="1">Admin</option>
							<option value="2">Người dùng</option>
							</select>
						<p></p>
						<input type="submit" class="btn btn-success" name="themuser" value="Thêm">
					</div>
					
				</form>
			</div>
		</div>
	</div>
	<?php } 
	else{
		if(isset($_GET['sua'])){
			$iduser = $_GET['iduser'];
			$sql = $db->query("SELECT * FROM user Where id = '$iduser' ");
            $gettt = $sql->fetch_object();
		echo '
		<div class="container">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h2 class="text-center">Chỉnh sửa thông tin người dùng</h2>
				</div>
				<div class="panel-body">
					<form method="post" action="xuly.php?iduser='.$iduser.'">
						<div class="form-group">
							<label for="name">Tên người dùng:</label>
							<input type="text" class="form-control" name="tenuser" value="'.$gettt->name.'">
							<label for="address">Địa chỉ:</label>
							<input type="text" class="form-control" name="address" value="'.$gettt->address.'">
							<label for="phone">Số điện thoại:</label>
							<input type="text" class="form-control" name="phone" pattern="\d{10}" required title="Số điện thoại không đúng"  value="'.$gettt->phone.'" >
							<br>
							<label for="position">Phân quyền:</label>
							<select name="position" id="position">'?>
							<?php
							
								if(isset($_GET['iduser'])){
									if(($gettt->position)==1){ $position ="Admin";
									echo '<option selected value="'.$gettt->position.'">'.$position.'</option>';
									echo '<option value="2">Người dùng</option>';}
									else{
										$position ="Người dùng";
										echo '<option selected value="'.$gettt->position.'">'.$position.'</option>';
										echo '<option value="1">Admin</option>';}
									}
								
								
							
							?>
							<?php echo '
							
							
								
							</select>
							<p></p>
							<input type="submit" class="btn btn-success" name="suauser" value="Sửa">
						</div>
						
					</form>
				</div>
			</div>
		</div>
		';}}?>
</body>
</html>