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
    echo'<th>NAME</th>';
    echo'<th>USERNAME</th>';
    echo'<th>PASSWORD</th>';
    echo'<th>STATUS</th>';
    echo'<th>ACTION</th>';
    echo'</tr>';
    echo'</thead>';

    echo'<tbody>';
    if($result->num_rows > 0)
    {
        while($row = $result->fetch_array())
        {
            echo'<tr>';
            echo '<td>' . $row['hoten'] . '</td>';
            echo '<td>' . $row['taikhoan'] . '</td>';
            echo '<td>' . $row['matkhau'] . '</td>';
            switch($row['trangthaitk'])
            {
                case 0:
                    echo'<td><label class="badge badge-outline-danger">Locked</label></td>';
                    break;
                case 1:
                    echo'<td><label class="badge badge-outline-primary">Active</label></td>';
                    break;
            }
            echo'<td>';
            if($row['trangthaitk'] == 1)
            {
                echo"<form action='lockAdmin.php' method='post' onsubmit='return DelLock(\"" . $row['hoten'] . "\")'  >";
                echo '<button type="submit" class="btn btn-link" name=""><i class="ti-lock"></i></button>';
            }
            else
            {
                echo"<form action='lockAdmin.php' method='post' onsubmit='return DelActive(\"" . $row['hoten'] . "\")'  >";
                echo '<button type="submit" class="btn btn-link" name=""><i class="ti-unlock"></i></button>';
            }
            echo'<input type="hidden" name="lockAdmin" value="'. $row['taikhoan'] .'">';
            echo'</form>';
            echo'</td>';
            echo'</tr>';
        }
    }
    echo'</tbody>';
    echo'</table>';
    echo'</div>';
    echo'</div>';
    echo'</div>';
    echo'</div>';
?>

<script>
    function DelLock(name)
    {
        return confirm("Are you sure to lock admin: " + name + " ?");
    }
    function DelActive(name)
    {
        return confirm("Are you sure to active admin: " + name + " ?");
    }
</script>
