<?php
    session_start();
    if(isset($_SESSION['taikhoan']))
    {
        session_destroy();
        header('location: index.php');
    }
    else
    {
        header('location: index.php');
    }

?>
