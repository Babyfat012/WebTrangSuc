<script>
    function DelProduct(name)
    {
        return confirm("Are you sure to delete product: " + name + " ?");
    }
</script>
<?php


    $sql ='SELECT * FROM sanpham';

    $result = executeQuery($sql);

    // Hien thi ket qua
    echo'<div class="col-lg-12 grid-margin stretch-card"">';
        echo'<div class="card">';
            echo'<div class="card-body">';
                echo'<h4 class="card-title">Product Management</h4>';
                echo'<a href="quantri.php?page_layout=addProduct"><button type="button" class="btn btn-primary btn-lg">Add Product</button></a>';
                    echo'<div class="table-responsive pt-3">';
                        echo'<table class="table table-bordered" >';
                            echo'<thead>';
                                    echo'<tr>';

                                    echo'<th>EDIT</th>';
                                    echo'<th>DELETE</th>';
                                        echo'<th>NAME</th>';
                                    echo'<th>PICTURE</th>';
                                    echo'<th>MATERIAL</th>';
                                    echo'<th>COLOR</th>';
                                    echo'<th>SIZE</th>';
                                    echo'<th>QUANTITY</th>';
                                    echo'<th>PRICE</th>';
                                    echo'<th>GENDER</th>';
                                    echo'<th>TYPE</th>';

                                    echo'</tr>';
    if($result->num_rows > 0) {
        $i = 1;
        while ($row = $result->fetch_array()) {
            echo '<tr>';

            echo'<td>';
            echo "<form method='get' action='editproduct.php'>";
            echo '<a href="quantri.php?page_layout=editproduct&edit_id='.$row['idsanpham'].'"><i class="ti-pencil"></i></a>';
            echo'</form>';
            echo'</td>';

            echo'<td>';
            echo " <form method='post' action='quantri.php?page_layout=danhsachsp' onsubmit='return DelProduct(\"" . $row['tensp'] . "\")'> ";
            echo "<input type='hidden' name='del_id' value='" . $row['idsanpham'] . "'>";
            echo '<button type="submit" name="deleteBtn" value="delete"  class="btn btn-outline-secondary btn-light btn-rounded btn-icon btn-lg"><i class="ti-trash"></i></button>';
            echo'</form>';
            echo'</td>';

            echo '<td>' . $row['tensp'] . '</td>';
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
            echo '<td>' . $row['chatlieu'] . '</td>';
            echo '<td>' . $row['mausac'] . '</td>';
            echo '<td>' . $row['kichthuoc'] . '</td>';
            echo '<td>' . $row['soluong'] . '</td>';
            echo '<td>$' .number_format($row['dongia'],2,".",",") . '</td>';
            switch($row['gioitinh'])
            {
                case 'F':
                    echo '<td>Women</td>';
                    break;
                case 'M':
                    echo '<td>Men</td>';
                    break;
                case 'U':
                    echo '<td>Unisex</td>';
                    break;

            }
            switch($row['maloaisp'])
            {
                case 'BRL':
                    echo '<td>Bracelet</td>';
                    break;
                case 'NKL':
                    echo '<td>Necklace</td>';
                    break;
                case 'RG':
                    echo '<td>Ring</td>';
                    break;

            }

            echo '</tr>';
        }
    }
    echo'</table>';

?>
