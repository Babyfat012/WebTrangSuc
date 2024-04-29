<?php
    require "DataProvider.php";
    
    function addProduct($id, $stock,$name,$type, $price, $description, $image, $material, $color, $size, $gender)
    {
        $sql ="INSERT INTO `sanpham` (`idsanpham`, `soluong`, `tensp`, `maloaisp`, `dongia`, `mota`, `hinhanh`, `chatlieu`, `mausac`, `kichthuoc`, `gioitinh`)" .
            "VALUES ('$id', $stock, '$name', '$type', $price, '$description', '$image', '$material', '$color', $size, '$gender')";
        
        $result = executeQuery($sql);
        
    }
    
    function addToCart($id, $quantity){
        if(!isset($_SESSION['cart'])){
            $_SESSION['cart'] = [];
        }
        $flag = true;
        $product = [$id,$quantity];
        for($i = 0; $i < count($_SESSION['cart']); $i++){
            if($_SESSION['cart'][$i][0] == $product[0]){
               $flag = false;
               break;
            }
        }
        if($flag){
            $_SESSION['cart'][] = $product;
        }
        else
            $_SESSION['cart'][$i][1] += $quantity;
       
        
    }
    
    ?>

    

