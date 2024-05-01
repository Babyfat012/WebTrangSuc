<?php
    require '../lib/DataProvider.php';

    if(isset($_POST['submit'])) {
        // Lấy dữ liệu từ form
        $name = $_POST['name'];
        $email = $_POST['email'];
        $home_number = $_POST['home_number'];
        $ward = $_POST['ward'];
        $district = $_POST['district'];
        $city = $_POST['city'];
        $phone = $_POST['phone'];

        // Kiểm tra xem các trường dữ liệu có đầy đủ không
        if (!empty($name) && !empty($email) && !empty($home_number) && !empty($ward) && !empty($district) && !empty($city) && !empty($phone)) {
            // Lấy giá trị 'temptk' từ form trước đó
            $taikhoanedit = $_POST['temptk'];
            echo $taikhoanedit;
            // Chuẩn bị truy vấn SQL để cập nhật dữ liệu
            $sql = "UPDATE khachhang SET hoten='$name', email='$email', sonha='$home_number', tenphuong='$ward', tenquan='$district', tentp='$city', sodienthoai='$phone' WHERE taikhoankh='$taikhoanedit'";

            // Thực thi truy vấn
            $result = executeQuery($sql);
        }
        header("location: quantri.php?page_layout=danhsachuser");
    }
?>
