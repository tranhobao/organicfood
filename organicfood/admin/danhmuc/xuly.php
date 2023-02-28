<?php
    include("../../connect.php");
    

    if(isset($_POST['themdanhmuc'])){
        $idloai = $_POST['iddanhmuc'];
        $tenloai = $_POST['tendanhmuc'];
        $query = "SELECT * FROM groupsp WHERE id = '$idloai'";
        $result = $db->query($query);
        if(mysqli_num_rows($result) == 0){
            $sql_them = "INSERT INTO groupsp(id,name) VALUE('".$idloai."','".$tenloai."')";
            mysqli_query($db,$sql_them);
            header("Location:index.php");
        }
        else{header("Location:add.php?them");}
       
    }
    else{
        if(isset($_GET['query'])=='xoa'){
            $id = $_GET['iddanhmuc'];
            $query1 = "Select * from product where groupid = '$id'";
            $ktr = $db->query($query1);
            if(mysqli_num_rows($ktr) != 0){
                header("Location:index.php");
            }
            else{
                $sql_xoa = "DELETE FROM groupsp Where id = '$id' ";
                mysqli_query($db,$sql_xoa);
                header("Location:index.php");
            }
        }
        else{
            if(isset($_POST['suadanhmuc'])){
                $idloai = $_GET['iddanhmuc'];
                $tenloai = $_POST['tendanhmuc'];
                $sql_sua= "UPDATE groupsp set name='".$tenloai."' where id = '$idloai' ";
                mysqli_query($db,$sql_sua);
                header("Location:index.php");
            }
        }
    }
?>