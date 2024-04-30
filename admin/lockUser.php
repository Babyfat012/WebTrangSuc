<?php
    require'../lib/DataProvider.php';

    if(isset($_GET['temptk']))
    {
        $taikhoan = $_GET['temptk'];
        $sql = "SELECT trangthaitk FROM khachhang WHERE taikhoankh = '" . $taikhoan . "'";
        $result = executeQuery($sql);
        $row = $result->fetch_array();
        $current_status = $row['trangthaitk'];
        if($current_status == 1)
        {
            $new_status = 0;
        }
        else
        {
            $new_status = 1;
        }
        $update_sql = "UPDATE khachhang SET trangthaitk = '$new_status' WHERE taikhoankh = '$taikhoan' ";
        $update_result = executeQuery($update_sql);
        header('location: quantri.php?page_layout=danhsachuser');
    }


?>
