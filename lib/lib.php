<?php
    require "DataProvider.php";
    function addProduct($id, $stock,$name,$type, $price, $description, $image, $material, $color, $size)
    {
        $sql ="INSERT INTO `sanpham` (`idsanpham`, `soluong`, `tensp`, `maloaisp`, `dongia`, `mota`, `hinhanh`, `chatlieu`, `mausac`, `kichthuoc`)" .
            "VALUES ('$id', $stock, '$name', '$type', $price, '$description', '$image', '$material', '$color', $size)";
        
        $result = executeQuery($sql);
        
    }
    ?>

