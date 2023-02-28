<?php  
    session_start();
    include ('connect.php');
    $id = !empty($_GET['id']) ? (int)$_GET['id'] : 0;
    $groupid = (int)$_GET['groupid'];
    $quantity = isset($_GET['quantity']) ? (Int)$_GET['quantity'] : 1;
    $action = !empty($_GET['action']) ? $_GET['action'] : 'add';
    $query = $db->query("SELECT * FROM product WHERE id = $id ");
    $pro = $query->fetch_object();

    

    if($pro && $action == 'add'){
        
        if(isset($_SESSION['cart'][$id])){
            $_SESSION['cart'][$id]['quantity'] += $quantity;
        }
        else{
            $item = [
                
                'id'=> $pro->id,
                'name'=> $pro->name,
                'price'=> $pro->pricenew ? $pro->pricenew : $pro->price,//neu co giam gia thi: 'price'=> $pro->pricenew ? $pro->pricenew : $pro->price,
                'image'=> $pro->image,
                'groupid'=>$pro->$groupid,
                'quantity'=> (int)$quantity,
                ];

            $_SESSION['cart'][$id] = $item;

            }
            header('location: index.php');
        }
    //xoa
    if($action == 'delete'){
        if(isset($_SESSION['cart'][$id])){
            unset($_SESSION['cart'][$id]);
            if(empty($_SESSION['cart']))
                unset($_SESSION['cart']);
        }
        header('location: cart.php');
    }
    //update
    if($action =='update'){
        if($quantity === 0){
            unset($_SESSION['cart'][$id]);
            if(empty($_SESSION['cart']))
                unset($_SESSION['cart']);
        }
        elseif($quantity < 0 )
            $quantity = 1;
        if(isset($_SESSION['cart'][$id])){
            $_SESSION['cart'][$id]['quantity'] = $quantity;
        }
       

        header('location: cart.php');
    }
    //clear
    if(isset($_GET['xoatatca']) && $_GET['xoatatca'] == 1){
        unset($_SESSION['cart']);
        header('location: cart.php');
    }

    

    echo '<pre >';
    print_r($_SESSION['cart']);
    
?>


