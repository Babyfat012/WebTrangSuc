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
                        <option value="Ward 1" >Ward 1</option>
                        <option value="Ward 2" >Ward 2</option>
                        <option value="Ward 3" >Ward 3</option>
                        <option value="Ward 4" >Ward 4</option>
                        <option value="Ward 5" >Ward 5</option>
                        <option value="Ward 6" >Ward 6</option>
                        <option value="Ward 7" >Ward 7</option>
                        <option value="Ward 8" >Ward 8</option>
                        <option value="Ward 9" >Ward 9</option>
                        <option value="Ward 10" >Ward 10</option>
                        <option value="Ward 11" >Ward 11</option>
                        <option value="Ward 12" >Ward 12</option>

                    </select>
                </div>

                <div class="form-group">
                    <label for="district">DISTRICT</label>
                    <select class="form-control form-control-lg" id="district" name="district">
                        <option value="-1">Select district</option>
                        <option value="District 1" >District 1</option>
                        <option value="District 2" >District 2</option>
                        <option value="District 3" >District 3</option>
                        <option value="District 4" >District 4</option>
                        <option value="District 5" >District 5</option>
                        <option value="District 6" >District 6</option>
                        <option value="District 7" >District 7</option>
                        <option value="District 8" >District 8</option>
                        <option value="District 9" >District 9</option>
                        <option value="District 10" >District 10</option>
                        <option value="District 11" >District 11</option>
                        <option value="District 12" >District 12</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="city">CITY</label>
                    <select class="form-control form-control-lg" id="city" name="city">
                        <option value="-1">Select city</option>
                        <option value="Ho Chi Minh">Ho Chi Minh</option>
                        <option value="Ha Noi">Ha Noi</option>
                        <option value="Hai Phong">Hai Phong</option>
                        <option value="Da Nang">Da Nang</option>
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


