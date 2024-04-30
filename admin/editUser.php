<?php
require '../lib/DataProvider.php';

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
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" id="name" value="<?php echo($row['hoten']); ?>">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail3">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo($row['email']); ?>">
                </div>

                <div class="form-group">
                    <label>Home Number</label>
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
                        <option value="1" <?php isCheckWard("1",$ward);?> >1</option>
                        <option value="2" <?php isCheckWard("2",$ward);?>>2</option>
                        <option value="3" <?php isCheckWard("3",$ward);?>>3</option>
                        <option value="4" <?php isCheckWard("4",$ward);?>>4</option>
                        <option value="5" <?php isCheckWard("5",$ward);?>>5</option>
                        <option value="6" <?php isCheckWard("6",$ward);?>>6</option>
                        <option value="7" <?php isCheckWard("7",$ward);?>>7</option>
                        <option value="8" <?php isCheckWard("8",$ward);?>>8</option>
                        <option value="9" <?php isCheckWard("9",$ward);?>>9</option>
                        <option value="9" <?php isCheckWard("10",$ward);?>>10</option>

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
                        <option value="Binh Tan" <?php isCheckDistrict("Binh Tan",$district);?>>Binh Tan</option>
                        <option value="6" <?php isCheckDistrict("6",$district);?>>6</option>
                        <option value="12" <?php isCheckDistrict("12",$district);?>>12</option>
                        <option value="Nha Be" <?php isCheckDistrict("Nha Be",$district);?>>Nha Be</option>
                        <option value="Tan Binh" <?php isCheckDistrict("Tan Binh",$district);?>>Tan Binh</option>
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
                        <option value="Vung Tau" <?php isCheckCity("Vung Tau",$city);?>>Vung Tau</option>
                        <option value="Da Lat" <?php isCheckCity("Da Lat",$city);?>>Da Lat</option>
                        <option value="Nha Trang" <?php isCheckCity("Nha Trang",$city);?>>Nha Trang</option>
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

