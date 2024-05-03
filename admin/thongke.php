<?php
    echo'<div class="main-panel">';
    echo'<div class="content-wrapper">';
    echo'<div class="row">';
    echo'<h4>REPORT</h4>';
    echo'<div class="col-md-12 grid-margin stretch-card">';
    echo'<div class="card">';
    echo'<div class="card-body">';
    echo'<div class="table-responsive">';
    echo'<table class="table table-hover">';

    echo'<thead>';
    echo'<tr>';
    echo'<th>VIEW</th>';
    echo'<th>NAME</th>';
    echo'<th>USERNAME</th>';
    echo'<th>PHONE</th>';
    echo'<th>ADDRESS</th>';
    echo'<th>WARD</th>';
    echo'<th>DISTRICT</th>';
    echo'<th>CITY</th>';
    echo'<th>TOTAL</th>';
    echo'<th>NUMBER OF BILLS</th>';

    echo'</tr>';
    echo'</thead>';
    echo'<tbody>';

    $sql = "SELECT COUNT(idhoadon) as 'tongsobill', taikhoankh, SUM(tongtien) as tongtien FROM hoadon WHERE trangthai = 1 GROUP BY taikhoankh  ORDER BY tongtien DESC";
    $result = executeQuery($sql);
    if($result->num_rows > 0)
    {
        while($row = $result->fetch_array())
        {
            $sql = "SELECT * FROM khachhang WHERE taikhoankh = '" . $row['taikhoankh'] . "'";
            $USER = executeQuery($sql);
            if($USER->num_rows > 0)
            {
                while($user = $USER->fetch_array())
                {
                    echo'<tr>';
                    echo'<td><button type="button" class="btn btn-primary">View</button></td>';
                    echo'<td>' . $user['hoten'] . '</td>';
                    echo'<td>' . $user['taikhoankh'] . '</td>';
                    echo'<td>' . $user['sodienthoai'] . '</td>';
                    echo'<td>' . $user['sonha'] . '</td>';
                    echo'<td>' . $user['tenphuong'] . '</td>';
                    echo'<td>' . $user['tenquan'] . '</td>';
                    echo'<td>' . $user['tentp'] . '</td>';
                    echo'<td> $' . number_format($row['tongtien'] ,2 , "." ,",");
                    echo'<td>' . $row['tongsobill'] . '</td>';
                }
            }
        }
    }

?>