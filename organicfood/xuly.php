<?php 
    include("connect.php");
    if(isset($_GET['trangthai'])){
        $id = $_GET['trangthai'];
        $sql_update = "UPDATE cart SET cart_status=2 WHERE Id='".$id."'";
        $query = mysqli_query($db,$sql_update);
        header('Location:my-account.php');
    }

?>