<?php 
    include("../../connect.php");
    if(isset($_GET['code'])){
        $id = $_GET['code'];
        $sql_update = "UPDATE cart SET cart_status=0 WHERE Id='".$id."'";
        $query = mysqli_query($db,$sql_update);
        header('Location:index.php');
    }

?>