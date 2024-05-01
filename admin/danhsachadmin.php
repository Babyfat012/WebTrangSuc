<?php
    $sql = "SELECT * FROM manager";
    $result = executeQuery($sql);

    echo'<div class="col-lg-12 grid-margin stretch-card">';
    echo'<div class="card">';
    echo'<div class="card-body">';
    echo'<h4 class="card-title">Admin Management</h4>';
    echo'<div class="table-responsive">';
    echo'<table class="table table-striped">';
    echo'<thead>';
    echo'<tr>';
    echo'<th>Full Name</th>';
    echo'<th>Username</th>';
    echo'<th>Password</th>';
    echo'<th>Account Status</th>';
    echo'</tr>';
    echo'</thead>';

    echo'<tbody>';
    if($result->num_rows > 0)
    {
        while($row = $result->fetch_array())
        {
            echo '<td>' . $row['hoten'] . '</td>';
            echo '<td>' . $row['taikhoan'] . '</td>';
            echo '<td>' . $row['matkhau'] . '</td>';
            echo '<td>' . $row['trangthaitk'] . '</td>';
        }
    }
    echo'</tbody>';
    echo'</table>';
    echo'</div>';
    echo'</div>';
    echo'</div>';
    echo'</div>';



?>
