<?php
    require "DataProvider.php";
    function addProduct($id, $stock,$name,$type, $price, $description, $image, $material, $color, $size, $gender)
    {
        $sql ="INSERT INTO `sanpham` (`idsanpham`, `soluong`, `tensp`, `maloaisp`, `dongia`, `mota`, `hinhanh`, `chatlieu`, `mausac`, `kichthuoc`, `gioitinh`)" .
            "VALUES ('$id', $stock, '$name', '$type', $price, '$description', '$image', '$material', '$color', $size, '$gender')";
        
        $result = executeQuery($sql);
        
    }
    ?>

