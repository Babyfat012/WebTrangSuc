<?php

    require'../lib/DataProvider.php';

    if(isset($_GET['del_id']))
    {
        $sql = "UPDATE sanpham SET soluong = 0 WHERE idsanpham='" . $_GET['del_id'] . "'";
        $result =executeQuery($sql);
        header('location: quantri.php?page_layout=danhsachsp');
    }

    $sql ='SELECT * FROM sanpham';

    $result = executeQuery($sql);

    // Hien thi ket qua
    echo'<div class="col-lg-12 grid-margin stretch-card">';
        echo'<div class="card">';
            echo'<div class="card-body">';
                echo'<h4 class="card-title">Product Management</h4>';
                echo'<a href="quantri.php?page_layout=addProduct"><button type="button" class="btn btn-primary btn-lg">Add Product</button></a>';
                    echo'<div class="table-responsive pt-3">';
                        echo'<table class="table table-bordered">';
                            echo'<thead>';
                                    echo'<tr>';

                                    echo'<th>Edit</th>';
                                    echo'<th>Delete</th>';
                                    echo'<th>Ordinal number</th>';
                                    echo'<th>Jewelry name</th>';
                                    echo'<th>Picture</th>';
                                    echo'<th>Material</th>';
                                    echo'<th>Color</th>';
                                    echo'<th>Size</th>';
                                    echo'<th>Quantity</th>';
                                    echo'<th>Price</th>';
                                    echo'<th>Gender</th>';
                                    echo'<th>Type</th>';
                                    echo'<th>Description</th>';

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
            echo "<form method='get' action='danhsachsp.php'>";
            echo "<input type='hidden' name='del_id' value='" . $row['idsanpham'] . "'>";
            echo '<button type="submit" onclick="return Del(\'' . $row['tensp'] . '\')" class="btn btn-outline-secondary btn-light btn-rounded btn-icon btn-lg"><i class="ti-trash"></i></button>';
            echo'</form>';
            echo'</td>';

            echo '<td>' . $i . '</td>';
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
            echo '<td>' . $row['dongia'] . '</td>';
            echo '<td>' . $row['gioitinh'] . '</td>';
            echo '<td>' . $row['maloaisp'] . '</td>';
            echo '<td>' . $row['mota'] . '</td>';

            echo '</tr>';
            $i++;
        }
    }
    echo'</table>';

?>
<script>
    function Del(name)
    {
        return confirm("Are you sure to delete product: " + name + " ?");
    }
</script>