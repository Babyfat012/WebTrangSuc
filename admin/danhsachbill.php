<?php
    $where = '';
    if(isset($_GET['filterBtn']))
    {
        if(isset($_GET['status']) && $_GET['status'] != -999)
        {
            $status = $_GET['status'];
            if($where != '')
            {
                $where .= " AND ( trangthai = '" . $status . "')";
            }
            else
            {
                $where .= " ( trangthai = '" . $status . "')";
            }
        }

        if(isset($_GET['city']) && $_GET['city'] != -1)
        {
            $city = $_GET['city'];
            if($where != '')
            {
                $where .= " AND ( tentp = '" . $city . "')";
            }
            else
            {
                $where .= " ( tentp = '" . $city . "')";
            }
        }

        if(isset($_GET['from']) || isset($_GET['to']))
        {
            if(isset($_GET['from']))
            {
                $from = $_GET['from'];
            }
            else
            {
                $from = null;
            }
            if(isset($_GET['to']))
            {
                $to = $_GET['to'];
            }
            else
            {
                $to = null;
            }

            if($from != null || $to != null)
            {
                if($where != '')
                {
                    $where .= " AND (";
                }
                else
                {
                    $where .= " (";
                }
                if($from != null && $to != null)
                {
                    $where .= " ngaymua BETWEEN '$from' AND '$to'";
                }
                else if($from != null)
                {
                    $where .= " ngaymua BETWEEN '$from' AND CURRENT_DATE() ";
                }
                else if($to != null)
                {
                    $where .= "ngaymua BETWEEN '' AND '$to' ";
                }
                $where .= " )";
            }
        }
    }

    echo'<div class="main-panel">';
    echo'<div class="content-wrapper">';

?>
<form method="get" action="quantri.php">
    <input type="hidden" name="page_layout" value="danhsachbill">
<div class="row">
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <td><button type="submit" name="filterBtn" value="filterBtn" class="btn btn-primary">Filter</button></td>
                        <td>

                                <select style="width: 150px; height: 40px" name="status">
                                    <option value="-999" selected>Bill Status</option>
                                    <?php if(isset($_GET['status']) && $_GET['status'] == 0) {echo '<option value="0" selected>Confirmed</option>';} else {echo '<option value="0">Confirmed</option>';}?>
                                    <?php if(isset($_GET['status']) && $_GET['status'] == 1) {echo '<option value="1" selected>Completed</option>';} else {echo '<option value="1">Completed</option>';}?>
                                    <?php if(isset($_GET['status']) && $_GET['status'] == -1) {echo '<option value="-1" selected>Canceled</option>';} else {echo '<option value="-1">Canceled</option>';}?>
                                </select>

                        </td>
                        <td>
                            <select style="width: 150px; height: 40px" name="city">
                                <option value="-1" selected>City</option>
                                <?php if(isset($_GET['city']) && $_GET['city'] == "Ho Chi Minh") {echo '<option value="Ho Chi Minh" selected>Ho Chi Minh</option>';} else {echo '<option value="Ho Chi Minh">Ho Chi Minh</option>';}?>
                                <?php if(isset($_GET['city']) && $_GET['city'] == "Ha Noi") {echo '<option value="Ha Noi" selected>Ha Noi</option>';} else {echo '<option value="Ha Noi">Ha Noi</option>';}?>
                                <?php if(isset($_GET['city']) && $_GET['city'] == "Hai Phong") {echo '<option value="Hai Phong" selected>Hai Phong</option>';} else {echo '<option value="Hai Phong">Hai Phong</option>';}?>
                                <?php if(isset($_GET['city']) && $_GET['city'] == "Da Nang") {echo '<option value="Da Nang" selected>Da Nang</option>';} else {echo '<option value="Da Nang">Da Nang</option>';}?>
                            </select>
                        </td>
                        <td>
                            <label for="from">From: </label>
                            <?php if(isset($_GET['from'])) {echo '<input style="width: 150px; height: 40px" id="from" name="from" type="date" value= "' .$_GET['from'] . '">';} else{echo '<input style="width: 150px; height: 40px" id="from" name="from" type="date">';}?>
                        </td>
                        <td>
                            <label for="to">To: </label>
                            <?php if(isset($_GET['from'])) {echo '<input style="width: 150px; height: 40px" id="to" name="to" type="date" value= "' .$_GET['to'] . '">';} else{echo '<input style="width: 150px; height: 40px" id="to" name="to" type="date">';}?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
</form>


<?php

    $sql = "SELECT * FROM hoadon";
    if(isset($_GET['filterBtn']))
    {
        if($where != '')
        {
            $sql .= " WHERE " . $where;
        }
    }
    $sql .= " ORDER BY ngaymua DESC";
    $result = executeQuery($sql);
    //partial


    echo'<div class="row">';
    echo'<h4>BILL MANAGEMENT</h4>';
    echo'<div class="col-md-12 grid-margin stretch-card">';
    echo'<div class="card">';
    echo'<div class="card-body">';
    echo'<div class="table-responsive">';
    echo'<table class="table table-hover">';

    echo'<thead>';
    echo'<tr>';
    echo'<th>VIEW</th>';
    echo'<th>ID</th>';
    echo'<th>ACCOUNT</th>';
//    echo'<th>PHONE</th>';
//    echo'<th>EMAIL</th>';
    echo'<th>ADDRESS</th>';
    echo'<th>WARD</th>';
    echo'<th>DISTRICT</th>';
    echo'<th>CITY</th>';
    echo'<th>DATE</th>';
    echo'<th>STATUS</th>';
    echo'<th>PAYMENT</th>';
    echo'<th>TOTAL</th>';
    echo'<th>CHANGE STATUS</th>';

echo'</tr>';

    echo'</thead>';

    echo'<tbody>';

    if($result->num_rows > 0 )
    {
        while($row = $result->fetch_array())
        {
            echo'<tr>';
            echo'<form action="quantri.php" method="post">';
            echo'<input type="hidden" name="page_layout" value="detailBill">';
            echo'<input type="hidden" name="id" value="'. $row['idhoadon'] . '">';
            echo'<input type="hidden" name="user" value="'. $row['taikhoankh'] . '">';
            echo'<td><button type="submit" name="view" value="view" class="btn btn-info">View</button></td>';
            echo'</form>';
            echo'<td>' . $row['idhoadon'] . '</td>';
            echo'<td>' . $row['taikhoankh'] . '</td>';
//            echo'<td>' . $row['sodienthoai'] . '</td>';
//            echo'<td>' . $row['email'] . '</td>';
            echo'<td>' . $row['sonha'] . '</td>';
            echo'<td>' . $row['tenphuong'] . '</td>';
            echo'<td>' . $row['tenquan'] . '</td>';
            echo'<td>' . $row['tentp'] . '</td>';
            echo'<td>' . date("d-m-Y", strtotime($row['ngaymua']))  . '</td>';

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

            echo'<td> $' . number_format($row['tongtien'] ,2 , "." ,",");

            if($row['trangthai'] == 0)
            {
                echo'<td>';
                echo "<form method='post' action='updateBillStatus.php'>";
                echo'<input type="hidden" name="update_id" id="update_id" value="' . $row['idhoadon'] . '">';
                echo'<div class="form-group">';
                echo'<select class="form-control" id="status" name="status">';
                echo'<option value="-999" >Select status</option>';
                echo'<option value="-1"  >Canceled</option>';
                echo'<option value="1" >Completed</option>';
                echo'</select>';
                echo'</div>';
                echo'<button type="submit" value="submit" name="submit" class="btn btn-primary me-2">Submit</button>';
                echo'</form>';
                echo'</td>';
            }
            else
            {
                echo'<td></td>';
            }
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
