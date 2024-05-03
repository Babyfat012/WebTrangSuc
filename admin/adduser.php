<?php

if(isset($_POST['submit']))
{
    if(isset($_POST['name']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['home_number']) && isset($_POST['ward']) && isset($_POST['district']) && isset($_POST['city']) && isset($_POST['phone']) && isset($_POST['trangthaitk'])) {
        $sql = "INSERT INTO khachhang(hoten, taikhoankh, matkhau, email, sonha, tenphuong, tenquan, tentp, sodienthoai, trangthaitk) VALUES ("
            . "'" . $_POST['name'] ."'," .
            "'" . $_POST['username'] ."'," .
            "'" . $_POST['password'] ."'," .
            "'" . $_POST['email'] ."'," .
            "'" . $_POST['home_number'] ."'," .
            "'" . $_POST['ward'] ."'," .
            "'" . $_POST['district'] ."'," .
            "'" . $_POST['city'] ."'," .
            "'" . $_POST['phone'] ."'," .
            "'" . $_POST['trangthaitk'] . "'" .
            ")";
        echo($sql);
        $result = executeQuery($sql);
        header('location: quantri.php?page_layout=danhsachuser');

    }
}

?>

<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">ADD USER</h4>
            <form class="forms-sample" action="quantri.php?page_layout=adduser" method="post">

                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                </div>

                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" name="username" id="username" placeholder="Username">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword4">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail3">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                </div>

                <div class="form-group">
                    <label>Home Number</label>
                    <input type="text" class="form-control" name="home_number" id="home_number" placeholder="Home Number">
                </div>


                <div class="form-group">
                    <label for="ward">WARD</label>
                    <select class="form-control form-control-lg" id="ward" name="ward">
                        <option value="-1">Select ward</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="9">10</option>

                    </select>
                </div>

                <div class="form-group">
                    <label for="district">DISTRICT</label>
                    <select class="form-control form-control-lg" id="district" name="district">
                        <option value="-1">Select district</option>
                        <option value="Binh Tan">Binh Tan</option>
                        <option value="6">6</option>
                        <option value="12">12</option>
                        <option value="Nha Be">Nha Be</option>
                        <option value="Tan Binh">Tan Binh</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="city">CITY</label>
                    <select class="form-control form-control-lg" id="city" name="city">
                        <option value="-1">Select city</option>
                        <option value="Ho Chi Minh">Ho Chi Minh</option>
                        <option value="Ha Noi">Ha Noi</option>
                        <option value="Vung Tau">Vung Tau</option>
                        <option value="Da Lat">Da Lat</option>
                        <option value="Nha Trang">Nha Trang</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Phone Number</label>
                    <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone">
                </div>

                    <input type="hidden" class="form-control" name="trangthaitk" id="trangthaitk" value="1" placeholder="Phone">

                <button type="submit" name="submit" id="submit" class="btn btn-primary me-2">Add</button>
                <button type="reset" class="btn btn-light">Cancel</button>
            </form>
        </div>
    </div>
</div>


