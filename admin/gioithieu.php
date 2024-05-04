<!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h4 class="font-weight-bold mb-0">Admin Dashboard</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-title text-md-center text-xl-left">ORDERS</p>
                            <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                                <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">34040</h3>
                                <i class="ti-shopping-cart-full icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-title text-md-center text-xl-left">CUSTOMERS</p>
                            <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                                <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">47033</h3>
                                <i class="ti-user icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-title text-md-center text-xl-left">PRODUCTS</p>
                            <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                                <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">40016</h3>
                                <i class="ti-package icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-title text-md-center text-xl-left">MANAGERS</p>
                            <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                                <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">61344</h3>
                                <i class="ti-settings icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
                echo'<div class="col-md-12 grid-margin stretch-card">';
                echo'<div class="card">';
                echo'<div class="card-body">';
                echo'<p class="card-title mb-0">Top Products</p>';
                echo'<div class="table-responsive">';
                echo'<table class="table table-hover">';
                echo'<thead>';
                echo'<tr>';
                echo'<th>PRODUCT</th>';
                echo'<th>PICTURE</th>';
                echo'<th>TYPE</th>';
                echo'<th>PRICE</th>';
                echo'<th>SELL</th>';
                echo'</tr>';
                echo'</thead>';

                echo'<tbody>';
                $sql = " SELECT SUM(soluong)as soluong, idsanpham FROM chitiethoadon GROUP BY idsanpham ORDER BY soluong DESC ";
                $result = executeQuery($sql);
                if($result-> num_rows>0)
                {
                    while($row = $result->fetch_array())
                    {
                        $sql = " SELECT * FROM sanpham WHERE idsanpham = '" . $row['idsanpham'] . "'";
                        $PRODUCT = executeQuery($sql);
                        $product = $PRODUCT->fetch_array();
                                echo'<tr>';
                                echo'<td>' . $product['tensp'] . '</td>';
                                switch($product['maloaisp'])
                                {
                                    case 'BRL':
                                        echo "<td><img src='../assets/img/Bracelet/" . $product["hinhanh"] . "'></td>";
                                        echo'<td>Bracelet</td>';
                                        break;
                                    case 'NKL':
                                        echo "<td><img src='../assets/img/Necklace/" . $product["hinhanh"] . "'></td>";
                                        echo'<td>Necklace</td>';
                                        break;
                                    case 'RG':
                                        echo "<td><img src='../assets/img/Ring/" . $product["hinhanh"] . "'></td>";
                                        echo'<td>Ring</td>';
                                        break;
                                }
                                echo'<td> $' . number_format($product['dongia'] ,2 , "." ,",");
                                echo'<td>' . $row['soluong'] . '</td>';
                                echo'<tr>';
                    }
                }
                echo'</tbody>';
                echo'</table>';
                echo'</div>';
                echo'</div>';
                echo'</div>';
                echo'</div>';
                echo'</div>';
                echo'</div>';

            ?>

