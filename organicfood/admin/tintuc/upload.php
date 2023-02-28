<?php
require_once ('../db/dbhelper.php');
require_once ('../../connect.php');


$id = $title = $thumbnail = $content = '';
if (!empty($_POST)) {
	if (isset($_POST['title'])) {
		$title = $_POST['title'];
		$title = str_replace('"', '\\"', $title);
	}
	if (isset($_POST['id'])) {
		$id = $_POST['id'];
	}
	
	if (isset($_FILES['thumbnail'])){
		$file = $_FILES['thumbnail'];
		$file_name = $file['name'];
		move_uploaded_file($file['tmp_name'],'product/'.$file_name);
	}

	if (isset($_POST['content'])) {
		$content = $_POST['content'];
		$content = str_replace('"', '\\"', $content);
	}
	
    if (!empty($title)) {
		$created_at = $updated_at = date('Y-m-d H:s:i');
		//Luu vao database
		if ($id == '') {
			$sql = 'insert into news(title, thumbnail, content, created_at, updated_at) values ("'.$title.'", "'.$file_name.'", "'.$content.'", "'.$created_at.'", "'.$updated_at.'")';
		} else {
			$sql = 'update news set title = "'.$title.'", updated_at = "'.$updated_at.'", thumbnail = "'.$image.'", content = "'.$content.'" where id = '.$id;
		}

		execute($sql);

		header('Location: index.php');
		die();
	}
}

if (isset($_GET['id'])) {
	$id      = $_GET['id'];
	$sql     = 'select * from news where id = '.$id;
	$product = executeSingleResult($sql);
	if ($product != null) {
		$title       = $product['title'];
		$file_name   = $product['thumbnail'];
		$content     = $product['content'];
	}
}
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

	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Thêm Tin Tức</h2>
			</div>
			<div class="panel-body">
				<form  action="" method="post" enctype="multipart/form-data">
					<div class="form-group">
					  <label for="title">Tên Tiêu Đề:</label>
					  <input type="text" name="id" value="<?=$id?>" hidden="true">
					  <input required="true" type="text" class="form-control" id="title" name="title" value="<?=$title?>">
					</div>
					<div class="form-group">
					  <label for="thumbnail">Hình ảnh:</label>
					  <input required="true" type="file" class="form-control" id="thumbnail" name="thumbnail" value="<?=$file_name?>">
					</div>
					<div class="form-group">
					  <label for="content">Nội Dung:</label>
					  <textarea class="form-control" rows="5" name="content" id="content" values="<?=$content?>"></textarea>
					</div>
					<button class="btn btn-success">Lưu</button>
				</form>
			</div>
		</div>
	</div>
<!---
	<script type="text/javascript">
		function updateThumbnail() {
			$('#img_image').attr('src', $('#image').val())
		}

		$(function() {
			//doi website load noi dung => xu ly phan js
			$('#content').summernote({
			  height: 350
			});
		})
	</script>
	--->
</body>
</html>