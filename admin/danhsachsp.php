<?php

    require'../lib/DataProvider.php';

    $sql ='SELECT * FROM sanpham';

    $result = executeQuery($sql);

    // Hien thi ket qua
    echo'<div class="col-lg-12 grid-margin stretch-card">';
        echo'<div class="card">';
            echo'<div class="card-body">';
                echo'<h4 class="card-title">Product Management</h4>';
                    echo'<div class="table-responsive pt-3">';
                        echo'<table class="table table-bordered">';
                            echo'<thead>';
                                    echo'<tr>';
                                    echo'<th>Ordinal number</th>';
                                    echo'<th>Jewelry name</th>';
                                    echo'<th>Material</th>';
                                    echo'<th>Color</th>';
                                    echo'<th>Size</th>';
                                    echo'<th>Quantity</th>';
                                    echo'<th>Price</th>';
                                    echo'<th>Picture</th>';
                                    echo'</tr>';
    if($result->num_rows > 0) {
        $i = 1;
        while ($row = $result->fetch_array()) {
            echo '<tr>';
            echo '<td>' . $i . '</td>';
            echo '<td>' . $row['tensp'] . '</td>';
            echo '<td>' . $row['chatlieu'] . '</td>';
            echo '<td>' . $row['mausac'] . '</td>';
            echo '<td>' . $row['kichthuoc'] . '</td>';
            echo '<td>' . $row['soluong'] . '</td>';
            echo '<td>' . $row['dongia'] . '</td>';
            switch ($row['maloaisp'])
            {
                case 'NKL':
                    echo "<td><img src='../assets/img/Necklace/" . $row["hinhanh"] . "'></td>";
                    break;
                case 'BRL':
                    echo "<td><img src='../assets/img/Bracelet/" . $row["hinhanh"] . "'></td>";
                    break;
                case 'RG':
                    echo "<td><img src='../assets/img/Ring/" . $row["hinhanh"] . "'></td>";
                    break;
            }
            echo '</tr>';
            $i++;
        }
    }
    echo'</table>';
?>
