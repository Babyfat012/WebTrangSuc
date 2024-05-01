<?php

    require '../lib/DataProvider.php';

    if(isset($_POST['submit']))
    {
        $status = $_POST['status'];
        $id = $_POST['update_id'];
        if($status == -999)
        {
            echo '<script>';
            echo 'alert("INVALID STATUS.");';
            echo '</script>';
            echo '<meta http-equiv="refresh" content="0;url=quantri.php?page_layout=danhsachbill">'; // Làm mới trang và điều hướng
            exit; // Dừng mã PHP
        }
        else
        {
            $sql = "UPDATE hoadon SET trangthai = '$status' WHERE idhoadon = '$id'";
            $result = executeQuery($sql);
            header('location: quantri.php?page_layout=danhsachbill');
        }

}

?>
