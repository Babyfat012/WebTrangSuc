<?php

    if(isset($_POST['register_submit']))
    {
        if(!empty($_POST['register_name']) && !empty($_POST['register_username']) && !empty($_POST['register_password']))
        {
            $name = trim($_POST['register_name']);
            $username = trim($_POST['register_username']);
            $password = trim($_POST['register_password']);
            $trangthaitk = 1;
            $passwordHash = md5($password);
            $sql = "INSERT INTO `manager` (hoten, taikhoan, matkhau, trangthaitk) VALUES ('$name', '$username', '$passwordHash', '$trangthaitk')";
            echo $sql;
            $result = executeQuery($sql);
        }
    }
?>

<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Admin Register</h4>
            <form class="forms-sample" action="quantri.php?page_layout=dangky" method="post">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="register_name" id="register_name" placeholder="Name" required>
                </div>

                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" name="register_username" id="register_username" placeholder="Username" required>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword4">Password</label>
                    <input type="password" class="form-control" name="register_password" id="register_password" placeholder="Password" required>
                </div>

                <button type="submit" class="btn btn-primary me-2" name="register_submit" id="register_submit">Submit</button>
                <button class="btn btn-light">Cancel</button>
            </form>
        </div>
    </div>
</div>
