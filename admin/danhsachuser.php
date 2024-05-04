<?php

$sql = "SELECT * FROM khachhang";

$result = executeQuery($sql);

echo'<div class="col-lg-12 grid-margin stretch-card">';
echo'<div class="card">';
echo'<div class="card-body">';
echo'<h4 class="card-title">USER MANAGEMENT</h4>';
echo'<a href="quantri.php?page_layout=adduser"><button type="button" class="btn btn-primary btn-lg">ADD USER</button></a>';
echo'<div class="table-responsive">';
echo'<table class="table table-striped">';
echo'<thead>';
echo'<tr>';
echo'<th>NAME</th>';
echo'<th>EMAIL</th>';
echo'<th>ADDRESS</th>';
echo'<th>WARD</th>';
echo'<th>DISTRICT</th>';
echo'<th>CITY</th>';
echo'<th>PHONE</th>';
echo'<th>STATUS</th>';
echo'<th>EDIT</th>';
echo'<th>ACTION</th>';

echo'</tr>';
echo'</thead>';

if($result->num_rows > 0)
{
    $i = 1;
    while ($row = $result->fetch_array())
    {
        echo'<tr>';
        echo'<td>' . $row['hoten'] . '</td>';
        echo'<td>' . $row['email'] . '</td>';
        echo'<td>' . $row['sonha'] . '</td>';
        echo'<td>' . $row['tenphuong'] . '</td>';
        echo'<td>' . $row['tenquan'] . '</td>';
        echo'<td>' . $row['tentp'] . '</td>';
        echo'<td>' . $row['sodienthoai'] . '</td>';
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
        echo "<form method='get' action='editUser.php'>";
        echo '<a href="quantri.php?page_layout=editUser&temptk='.$row['taikhoankh'].'"><i class="ti-pencil"></i></a>';
        echo'</form>';
        echo'</td>';

        // Thêm chức năng lock và unlock tài khoản
        echo'<td>';
        if($row['trangthaitk'] == 1)
        {
            echo "<form method='get' action='lockUser.php' onsubmit='return DelLock(\"" . $row['hoten'] . "\")'>";
            echo '<button type="submit" class="btn btn-link" name="lockUser"><i class="ti-lock"></i></button>';
        }
        else
        {
            echo "<form method='get' action='lockUser.php' onsubmit='return DelUnlock(\"" . $row['hoten'] . "\")'>";
            echo '<button type="submit" class="btn btn-link" name="unlockUser"><i class="ti-unlock"></i></button>';
        }
        echo "<input type='hidden' name='temptk' value='" . $row['taikhoankh'] . "'>";
        echo'</form>';
        echo'</td>';

        echo'</tr>';
    }
}
?>

<script>
    function DelLock(name)
    {
        return confirm("Are you sure to lock user: " + name + " ?");
    }
    function DelUnlock(name)
    {
        return confirm("Are you sure to unlock user: " + name + " ?");
    }
</script>
