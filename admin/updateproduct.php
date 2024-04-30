<?php
    $folder = "../assets/img/";
    require'../lib/DataProvider.php';

    if(isset($_POST['submit'])) {
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

        //Ten trang suc
        if ($_POST['title'] == '') {
            $error_title = '<span style="color:red;">(*)</span>';
        } else {
            $title = $_POST['title'];
        }
        // So luong
        if ($_POST['quantity'] == '') {
            $error_quantity = '<span style="color:red;">(*)</span>';
        } else {
            $quantity = $_POST['quantity'];
        }
        //Gia
        if ($_POST['price'] == '') {
            $error_price = '<span style="color:red;">(*)</span>';
        } else {
            $price = $_POST['price'];
        }
        //Chat lieu
        if ($_POST['material'] == '') {
            $error_material = '<span style="color:red;">(*)</span>';
        } else {
            $material = $_POST['material'];
        }
        // Mau sac
        if ($_POST['color'] == '') {
            $error_color = '<span style="color:red;">(*)</span>';
        } else {
            $color = $_POST['color'];
        }
        // Kich thuoc
        if ($_POST['size'] == '') {
            $error_size = '<span style="color:red;">(*)</span>';
        } else {
            $size = $_POST['size'];
        }
        //Gioi tinh
        if ($_POST['gender'] == '') {
            $error_gender = '<span style="color:red;">(*)</span>';
        } else {
            $gender = $_POST['gender'];
        }
        // Mo ta
        if ($_POST['description'] == '') {
            $error_description = '<span style="color:red;">(*)</span>';
        } else {
            $description = $_POST['description'];
        }
        // Hinh anh sp
        if(!empty($_FILES['pic']))
        {
            echo 'co anh?';
            echo basename($_FILES['pic']['name']);
        }
        else
            echo 'kh co';
        // Cap nhat
        if (isset($id) && isset($anhsp) && isset($title) && isset($quantity) && isset($price) && isset($material) && isset($color) && isset($size) && isset($gender) && isset($description))
        {
            $sql = "UPDATE sanpham SET tensp = '$title',
                                            hinhanh = '$anhsp',
                                            dongia = '$price',
                                            soluong = '$quantity',
                                            chatlieu = '$material',
                                            mausac = '$color',
                                            kichthuoc = '$size',
                                            gioitinh = '$gender',
                                            mota = '$description',
                                        WHERE idsanpham = '$id'";
            $result = executeQuery($sql);
            echo($sql);
            header('location: quantri.php?page_layout=danhsachsp');
        }
    }

?>