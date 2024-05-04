<?php

if(isset($_GET['temptk']) && !empty($_GET['temptk'])) {
    $taikhoanedit = $_GET['temptk'];
    $sql = "SELECT * FROM khachhang WHERE taikhoankh='" . $taikhoanedit ."'";
    $result = executeQuery($sql);
    if($result->num_rows > 0) {
        $row = $result->fetch_array();
        $ward = $row['tenphuong'];
        $district = $row['tenquan'];
        $city = $row['tentp'];
    } else {
        // Xử lý trường hợp không tìm thấy dữ liệu
        echo "Không tìm thấy dữ liệu cho tài khoản này.";
    }
} else {
    // Xử lý trường hợp không có biến 'temptk' hoặc giá trị của nó là rỗng
    echo "Không có tài khoản được chọn để chỉnh sửa.";
}
?>

<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">EDIT USER</h4>
            <form class="forms-sample" action="updateUser.php" method="post">
                <?php
                    echo"<input type='hidden' name='temptk' id='temptk' value=". $taikhoanedit .">";
                ?>
                <div class="form-group">
                    <label>NAME</label>
                    <input type="text" class="form-control" name="name" id="name" value="<?php echo($row['hoten']); ?>">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail3">EMAIL</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo($row['email']); ?>">
                </div>

                <div class="form-group">
                    <label>ADDRESS</label>
                    <input type="text" class="form-control" name="home_number" id="home_number" value="<?php echo($row['sonha']); ?>">
                </div>

                <?php
                    function isCheckWard($value, $ward)
                    {
                        if($value === $ward)
                        {
                            echo 'selected';
                        }
                    }
                ?>

                <div class="form-group">
                    <label for="ward">WARD</label>
                    <select class="form-control form-control-lg" id="ward" name="ward">
                        <option value="-1">Select ward</option>
                        <option value="Ward 1" <?php isCheckWard("Ward 1",$ward);?> >Ward 1</option>
                        <option value="Ward 2" <?php isCheckWard("Ward 2",$ward);?>>Ward 2</option>
                        <option value="Ward 3" <?php isCheckWard("Ward 3",$ward);?>>Ward 3</option>
                        <option value="Ward 4" <?php isCheckWard("Ward 4",$ward);?>>Ward 4</option>
                        <option value="Ward 5" <?php isCheckWard("Ward 5",$ward);?>>Ward 5</option>
                        <option value="Ward 6" <?php isCheckWard("Ward 6",$ward);?>>Ward 6</option>
                        <option value="Ward 7" <?php isCheckWard("Ward 7",$ward);?>>Ward 7</option>
                        <option value="Ward 8" <?php isCheckWard("Ward 8",$ward);?>>Ward 8</option>
                        <option value="Ward 9" <?php isCheckWard("Ward 9",$ward);?>>Ward 9</option>
                        <option value="Ward 10" <?php isCheckWard("Ward 10",$ward);?>>Ward 10</option>
                        <option value="Ward 11" <?php isCheckWard("Ward 11",$ward);?>>Ward 11</option>
                        <option value="Ward 12" <?php isCheckWard("Ward 12",$ward);?>>Ward 12</option>


                    </select>
                </div>

                <?php
                function isCheckDistrict($value, $district)
                {
                    if($value === $district)
                    {
                        echo 'selected';
                    }
                }
                ?>

                <div class="form-group">
                    <label for="district">DISTRICT</label>
                    <select class="form-control form-control-lg" id="district" name="district">
                        <option value="-1">Select district</option>
                        <option value="District 1" <?php isCheckDistrict("District 1",$district);?>>District 1</option>
                        <option value="District 2" <?php isCheckDistrict("District 2",$district);?>>District 2</option>
                        <option value="District 3" <?php isCheckDistrict("District 3",$district);?>>District 3</option>
                        <option value="District 4" <?php isCheckDistrict("District 4",$district);?>>District 4</option>
                        <option value="District 5" <?php isCheckDistrict("District 5",$district);?>>District 5</option>
                        <option value="District 6" <?php isCheckDistrict("District 6",$district);?>>District 6</option>
                        <option value="District 7" <?php isCheckDistrict("District 7",$district);?>>District 7</option>
                        <option value="District 8" <?php isCheckDistrict("District 8",$district);?>>District 8</option>
                        <option value="District 9" <?php isCheckDistrict("District 9",$district);?>>District 9</option>
                        <option value="District 10" <?php isCheckDistrict("District 10",$district);?>>District 10</option>
                        <option value="District 11" <?php isCheckDistrict("District 11",$district);?>>District 11</option>
                        <option value="District 12" <?php isCheckDistrict("District 12",$district);?>>District 12</option>
                    </select>
                </div>

                <?php
                function isCheckCity($value, $city)
                {
                    if($value === $city)
                    {
                        echo 'selected';
                    }
                }
                ?>


                <div class="form-group">
                    <label for="city">CITY</label>
                    <select class="form-control form-control-lg" id="city" name="city">
                        <option value="-1">Select city</option>
                        <option value="Ho Chi Minh" <?php isCheckCity("Ho Chi Minh",$city);?>>Ho Chi Minh</option>
                        <option value="Ha Noi" <?php isCheckCity("Ha Noi",$city);?>>Ha Noi</option>
                        <option value="Hai Phong" <?php isCheckCity("Hai Phong",$city);?>>Hai Phong</option>
                        <option value="Da Nang" <?php isCheckCity("Da Nang",$city);?>>Da Nang</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Phone Number</label>
                    <input type="text" class="form-control" name="phone" id="phone" value="<?php echo($row['sodienthoai']); ?>">
                </div>

                <button type="submit" name="submit" id="submit" class="btn btn-primary me-2">Edit</button>
                <button type="reset" class="btn btn-light">Cancel</button>
            </form>
        </div>
    </div>
</div>

