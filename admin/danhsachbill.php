<?php
    require '../lib/DataProvider.php';

    $sql = "SELECT * FROM hoadon";
    $result = executeQuery($sql);
    //partial
    echo'<div class="main-panel">';
    echo'<div class="content-wrapper">';
    echo'<div class="row">';
    echo'<div class="col-md-12 grid-margin">';
    echo'<div class="d-flex justify-content-between align-items-center">';
    echo'<div>';
    echo'<h4 class="font-weight-bold mb-0">BILL MANAGEMENT</h4>';
    echo'</div>';
    echo'</div>';
    echo'</div>';
    echo'</div>';
    echo'<div class="row">';
    echo'<div class="col-md-12 grid-margin stretch-card">';
    echo'<div class="card">';
    echo'<div class="card-body">';
    echo'<div class="table-responsive">';
    echo'<table class="table table-hover">';

    echo'<thead>';
    echo'<tr>';
    echo'<th>BILL ID</th>';
    echo'<th>BILL ACCOUNT</th>';
//    echo'<th>PHONE</th>';
//    echo'<th>EMAIL</th>';
    echo'<th>HOME NUMBER</th>';
    echo'<th>WARD</th>';
    echo'<th>DISTRICT</th>';
    echo'<th>CITY</th>';
    echo'<th>BUY DATE</th>';
    echo'<th>BILL STATUS</th>';
    echo'<th>PAYMENT METHOD</th>';
    echo'<th>PRICE</th>';
    echo'<th>CHANGE STATUS</th>';

echo'</tr>';

    echo'</thead>';

    echo'<tbody>';

    if($result->num_rows > 0 )
    {
        while($row = $result->fetch_array())
        {
            echo'<tr>';
            echo'<td>' . $row['idhoadon'] . '</td>';
            echo'<td>' . $row['taikhoankh'] . '</td>';
//            echo'<td>' . $row['sodienthoai'] . '</td>';
//            echo'<td>' . $row['email'] . '</td>';
            echo'<td>' . $row['sonha'] . '</td>';
            echo'<td>' . $row['tenphuong'] . '</td>';
            echo'<td>' . $row['tenquan'] . '</td>';
            echo'<td>' . $row['tentp'] . '</td>';
            echo'<td>' . $row['ngaymua'] . '</td>';

            switch ($row['trangthai'])
            {
                case 0: echo '<td><label class="badge badge-outline-info">Confirmed</label></td>';
                    break;
                case 1: echo '<td><label class="badge badge-outline-success">Completed</label></td>';
                    break;
                case -1: echo '<td><label class="badge badge-outline-danger">Canceled</label></td>';
                    break;
            }

            switch ($row['phuongthucthanhtoan'])
            {
                case 0: echo '<td>Transfer</td>';
                    break;
                case 1: echo '<td>Cash</td>';
                    break;
            }

            echo'<td>' . $row['tongtien'] . '</td>';

            echo'<td>';
            echo "<form method='post' action='updateBillStatus.php'>";
            echo'<input type="hidden" name="update_id" id="update_id" value="' . $row['idhoadon'] . '">';
            echo'<div class="form-group">';
            echo'<select class="form-control" id="status" name="status">';
            echo'<option value="-999" >Select status</option>';
            echo'<option value="0" >Confirmed</option>';
            echo'<option value="-1"  >Canceled</option>';
            echo'<option value="1" >Completed</option>';
            echo'</select>';
            echo'</div>';
            echo'<button type="submit" value="submit" name="submit" class="btn btn-primary me-2">Submit</button>';
            echo'</form>';
            echo'</td>';

            echo '</tr>';
        }
    }

    echo '</tbody>';

    echo '</table>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';

?>
