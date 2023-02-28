<?php
    session_start();
    include('connect.php');
    $id_khachhang = $_SESSION['id_khachhang'];
    $query = "select max(Id) from cart";
    $result = mysqli_query($db,$query);
    $row = mysqli_fetch_array($result);
    $id_cart = $row[0] + 1;
    $products = $_SESSION['cart'];
    $insert_cart = "INSERT into cart(Id, id_khachhang,cart_status) VALUE ('" . $id_cart . "' , '" . $id_khachhang . "',1)";
    $cart_query = mysqli_query($db, $insert_cart);
    if($cart_query){
        foreach($products as $item){
            $id_sanpham = $item['id'];
            $name_sanpham = $item['name'];
            $image_sanpham = $item['image'];
            $soluong = $item['quantity'];
            $price = $item['pricenew'] ? $item['pricenew'] : $item['price'];

            $insert_order_details = "INSERT into cart_details(id_cart ,id_sanpham,name_sanpham,soluong_sanpham,price_sanpham,image_sanpham)
             VALUE ('".$id_cart."','".$id_sanpham."','".$name_sanpham."','".$soluong."','".$price."','".$image_sanpham."')";
            mysqli_query($db,$insert_order_details);
            
            $soluongsp = $db->query("SELECT * from product where id = '$id_sanpham' ");
            $sua = $soluongsp->fetch_object();
            $suasoluong = number_format($sua->soluong) - $soluong ; 
            $sql_sua= "UPDATE product set soluong='".$suasoluong."' where id = '$id_sanpham' ";
            mysqli_query($db,$sql_sua);
        }
    }
    unset($_SESSION['cart']);
    header('location: camon.php');

?>