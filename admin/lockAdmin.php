<?php
    require '../lib/DataProvider.php';

    if(isset($_POST['lockAdmin']))
    {
        $taikhoan = $_POST['lockAdmin'];
        $sql = " SELECT trangthaitk FROM manager WHERE taikhoan = '" . $taikhoan . "'";
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
        $update_sql = "UPDATE manager SET trangthaitk = '$new_status' WHERE taikhoan = '$taikhoan' ";
        $update_result = executeQuery($update_sql);
        header('location: quantri.php?page_layout=danhsachadmin');
    }
