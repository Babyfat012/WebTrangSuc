<?php
    require "DataProvider.php";
    
    function addProduct($id, $stock,$name,$type, $price, $description, $image, $material, $color, $size, $gender)
    {
        $sql ="INSERT INTO `sanpham` (`idsanpham`, `soluong`, `tensp`, `maloaisp`, `dongia`, `mota`, `hinhanh`, `chatlieu`, `mausac`, `kichthuoc`, `gioitinh`)" .
            "VALUES ('$id', $stock, '$name', '$type', $price, ".'"'.$description.'"'.", '$image', '$material', '$color', $size, '$gender')";
        
        $result = executeQuery($sql);
        
    }
    
    function addToCart($id, $quantity){
        if(!isset($_SESSION['cart'])){
            $_SESSION['cart'] = [];
        }
        $sql = "SELECT * FROM sanpham WHERE idsanpham = '$id' ";
        $result = executeQuery($sql);
        $row = $result->fetch_array();
        if($row['soluong'] > 0)
        {
            $sql = "UPDATE sanpham SET soluong =". ($row['soluong']-$quantity) ." WHERE idsanpham = '$id' ";
            executeQuery($sql);
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
       
    }
    
    function isLogin(){
        if(isset($_SESSION['userName']) && !empty($_SESSION['userName'])){
            return true;
        }
        return false;
    }
    

    
    ?>



    

