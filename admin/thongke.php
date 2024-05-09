<?php
    echo'<div class="main-panel">';
    echo'<div class="content-wrapper">';
    echo'<h4>REPORTS</h4>';
    echo'<div class="row">';

    $where = '';
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

    ?>

    <form method="get" action="quantri.php">
        <input type="hidden" name="page_layout" value="thongke">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <td><button type="submit" name="reportBtn" value="reportBtn" class="btn btn-success">Reports</button></td>
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
    echo'<th>ORDER AMOUNT</th>';

    echo'</tr>';
    echo'</thead>';
    echo'<tbody>';

    if(isset($_GET['reportBtn']))
    {
        if($where == '')
        {
            $sql = "SELECT COUNT(idhoadon) as 'tongsobill', taikhoankh, SUM(tongtien) as tongtien FROM hoadon WHERE trangthai = 1 GROUP BY taikhoankh  ORDER BY tongtien DESC";
        }
        else
        {
            $sql = "SELECT COUNT(idhoadon) as 'tongsobill', taikhoankh, SUM(tongtien) as tongtien FROM hoadon WHERE trangthai = 1 AND ". $where ." GROUP BY taikhoankh  ORDER BY tongtien DESC";
        }
    }
    else
    {
        $sql = "SELECT COUNT(idhoadon) as 'tongsobill', taikhoankh, SUM(tongtien) as tongtien FROM hoadon WHERE trangthai = 1 GROUP BY taikhoankh  ORDER BY tongtien DESC";

    }
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
                    echo'<form action="orderlist.php" method="post">';
                    echo'<input type="hidden" name="user" value="'. $user['taikhoankh'] .'">';
                    echo'<td><button type="submit" name="view" value="view" class="btn btn-primary">View</button></td>';
                    echo'</form>';
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