<?php 
    include("../../connect.php");
    if(isset($_POST['themsanpham'])){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = date_create();
        $created_at = date('Y-m-d H:s:i');

        $id = $_POST['idsanpham'];
        $name = $_POST['tensanpham'];
        $iddanhmuc = $_POST['iddanhmuc'];
        $gia = $_POST['giasanpham'];
        $soluong = $_POST['soluongsanpham'];
        $image = $_POST['hinhanhsanpham'];
        $mota = $_POST['noidungsanpham'];

        $query = "SELECT * FROM product WHERE id = '$id'";
        $result = $db->query($query);

        if(mysqli_num_rows($result) == 0){
            $sql_them = "INSERT INTO product(id,name,detail,price,soluong,image,groupid,updated_at) 
                    VALUE('".$id."','".$name."','".$mota."','".$gia."','".$soluong."','".$image."','".$iddanhmuc."','".$created_at."')";
        mysqli_query($db,$sql_them);
        header("Location:index.php");

        }else{header("Location:upload.php?them");
        }
        
    }
    else{
        if(isset($_GET['query'])=='xoa'){
            $id = $_GET['idsanpham'];
            $sql_xoa = "DELETE FROM product Where id = '$id' ";
            mysqli_query($db,$sql_xoa);
            header("Location:index.php");
        }
        else{
            if(isset($_POST['suasanpham'])){
                $idsanpham = $_GET['idsanpham'];
                $name = $_POST['tensanpham'];
                $iddanhmuc = $_POST['iddanhmuc'];
                $gia = $_POST['giasanpham'];
                $soluong = $_POST['soluongsanpham'];
                $image = $_POST['hinhanhsanpham'];
                $mota = $_POST['noidungsanpham'];
                if($_POST['hinhanhsanpham']){
                    $sql_sua= "UPDATE product set name='".$name."',detail='".$mota."',soluong='".$soluong."',
                    pricenew='".$gia."',image='".$image."',groupid='".$iddanhmuc."' where id = '$idsanpham' ";
                }
                else{
                    $sql_sua= "UPDATE product set name='".$name."',detail='".$mota."',soluong='".$soluong."',
                    pricenew='".$gia."',groupid='".$iddanhmuc."' where id = '$idsanpham' ";
                }
                mysqli_query($db,$sql_sua);
                header("Location:index.php");
            }
        }
    }

?>