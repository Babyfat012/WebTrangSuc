<?php
    session_start();
    if(isset($_SESSION['taikhoan']))
    {
        unset($_SESSION['taikhoan']);
        header('location: index.php');
    }
    else
    {
        header('location: index.php');
    }

?>
