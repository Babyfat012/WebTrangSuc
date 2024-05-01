<?php
    session_start();
require 'lib/lib.php';
if(isset($_GET['index']) && isset($_GET['quantity']))
{
    $sql = "SELECT * FROM sanpham WHERE idsanpham = '".$_SESSION['cart'][$_GET['index']][0]."'";
    $result = executeQuery($sql);
    $row = $result->fetch_array();
    $index = $_GET['index'];
    $quantity = $_GET['quantity'];
    $total = $_SESSION['cart'][$index][1] + $row['soluong'];

    if($quantity > $total ){
        addToCart($_SESSION['cart'][$index][0],$row['soluong']);

    }
    elseif($quantity > $_SESSION['cart'][$index][1]){
        addToCart($_SESSION['cart'][$index][0],($quantity-$_SESSION['cart'][$index][1]));
       
        

    }elseif($quantity < $_SESSION['cart'][$index][1]){
        $sql1 = "UPDATE sanpham SET soluong = ".($row['soluong']+($_SESSION['cart'][$index][1] - $quantity))." WHERE idsanpham = '".$_SESSION['cart'][$index][0] ."'";
        executeQuery($sql1);
        $_SESSION['cart'][$index][1] = $quantity;
   
        

    }
    header('location:cart.php');
    
    
    
}
?>
