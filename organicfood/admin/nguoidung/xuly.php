<?php
    include("../../connect.php");
    

    if(isset($_POST['themuser'])){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = date_create();
        $created_at = date('Y-m-d H:s:i');
        $iduser = $_POST['iduser'];
        $tenuser = $_POST['tenuser'];
        $pass = md5($_POST['password']);
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        

        $created_at = date("Y-m-d H:i:s");
        $created_at = date("Y-m-d H:i:s");
        $position = $_POST['position'];
        $username =$_POST['username'];
        $query = "SELECT * FROM user WHERE id = '$iduser'";
        $result = $db->query($query);
        $query1 = "SELECT * FROM user WHERE username = '$username'";
        $result1 = $db->query($query1);
        if(mysqli_num_rows($result) == 0){
            if(mysqli_num_rows($result1)==0){
                $sql_them = "INSERT INTO user(id,name,address,phone,username,password,created_at,updated_at,tinhtrang,position) VALUE('".$iduser."','".$tenuser."','".$address."','".$phone."','".$username."','".$pass."','".$created_at."','".$created_at."',0,1)";
                mysqli_query($db,$sql_them);
                header("Location:index.php");
            }
            else { header("Location:add.php?them");
            }
        }else { header("Location:add.php?them");
        }
    }
    else{
        if(isset($_GET['query'])=='xoa'){
            $id = $_GET['iduser'];
            
                $sql_xoa = "DELETE FROM user Where id = '$id' ";
                mysqli_query($db,$sql_xoa);
                header("Location:index.php");
            
        }
        else{
            if(isset($_POST['suauser'])){
                $iduser = $_GET['iduser'];
                $tenuser = $_POST['tenuser'];
               
                $address = $_POST['address'];
                $phone = $_POST['phone'];
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $date = date_create();
                $updated_at = date('Y-m-d H:s:i');
                $position = $_POST['position'];
                if($_POST['position']){
                $sql_sua= "UPDATE user set position='".$position."',name='".$tenuser."' ,address='".$address."' ,phone='".$phone."',updated_at='".$updated_at."' where id = '$iduser' ";
                }
                else{
                    $sql_sua= "UPDATE user set name='".$tenuser."' ,address='".$address."' ,phone='".$phone."',updated_at='".$updated_at."' where id = '$iduser' ";    
                }
                mysqli_query($db,$sql_sua);
                header("Location:index.php");
            }
        }
    }
?>