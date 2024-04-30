<?php
$folder = "../assets/img/";
require'../lib/DataProvider.php';

if(isset($_POST['submit'])) {
    $type = $_POST['type'];
    switch ($type)
    {
        case 'BRL':
            $folder = $folder . "Bracelet/";
            break;
        case 'NKL':
            $folder = $folder . "Necklace/";
            break;
        case 'RG':
            $folder = $folder . "Ring/";
            break;
    }
    $target_file = $folder . basename($_FILES["pic"]["name"]);
    $allowupload = true;
    $i = 0;
    do {
        if (file_exists($target_file)) {
            $i++;
            $target_file = $folder . $i . basename($_FILES["pic"]["name"]);
        }
    } while (file_exists($target_file));
    move_uploaded_file($_FILES["pic"]["tmp_name"], $target_file);

    // Hinh anh sp
    if(!empty($_FILES['pic']))
    {
        echo 'co anh?';
        echo basename($_FILES['pic']['name']);
    }
    else
        echo 'kh co';
    // Cap nhat

    $id = $_POST['id'];
    $name = $_POST['name'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $material = $_POST['material'];
    $color = $_POST['color'];
    $size = $_POST['size'];
    $gender = $_POST['gender'];
    $description = $_POST['description'];
    $image = $_FILES['pic']['name'];

    if($image != NULL)
    {
        $sql = "UPDATE sanpham SET tensp='$name', soluong=$quantity, dongia=$price, chatlieu='$material', mausac='$color', kichthuoc=$size, gioitinh='$gender', maloaisp='$type', mota='$description', hinhanh='$image' WHERE idsanpham = '$id'";
        echo($sql);
        $result = executeQuery($sql);
    }
    else
    {
        $sql = "UPDATE sanpham SET tensp='$name', soluong=$quantity, dongia=$price, chatlieu='$material', mausac='$color', kichthuoc=$size, gioitinh='$gender', maloaisp='$type', mota='$description' WHERE idsanpham = '$id'";
        echo($sql);
        $result = executeQuery($sql);
    }
    header('location: quantri.php?page_layout=danhsachsp');

}

?>