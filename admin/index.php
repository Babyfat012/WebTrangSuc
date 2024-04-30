<?php
    ob_start();
    session_start();
    require '../lib/db.inc';
    require '../lib/DataProvider.php';

    if(isset($_POST['submit']))
    {
        $taikhoan = $_POST['taikhoan'];
        $matkhau = $_POST['matkhau'];

        if(isset($taikhoan) && isset($matkhau))
        {
            $sql = "SELECT * FROM manager WHERE taikhoan='$taikhoan' AND matkhau='$matkhau'";
            $result = executeQuery($sql);
            if($result->num_rows > 0)
            {
                $_SESSION['taikhoan'] = $taikhoan;
                $_SESSION['matkhau'] = $matkhau;
                header('location: quantri.php');
            }
            else if($taikhoan == '')
            {
                echo '<script>alert("Please enter username.");</script>';

            }
            else if($matkhau == '')
            {
                echo '<script>alert("Please enter password.");</script>';

            }
            else
            {
                echo '<script>alert("Invalid account. Please try again.");</script>';
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>RoyalUI Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="./vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="./vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="./css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="./images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="./images/logo.svg" alt="logo">
              </div>
              <h6 class="font-weight-light">Sign in to admin page.</h6>
                <?php
                    if(!isset($_SESSION['taikhoan']))
                    {
                ?>
              <form class="pt-3" action="" method="post">
                <div class="form-group">
                  <input type="text" id="taikhoan" name="taikhoan" class="form-control form-control-lg" placeholder="Username">
                </div>
                <div class="form-group">
                  <input type="password" id="matkhau" name="matkhau" class="form-control form-control-lg" placeholder="Password">
                </div>
                <div class="mt-3">
                    <button type="submit" name="submit" id="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN IN</button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Keep me signed in
                    </label>
                  </div>
                </div>
              </form>
                <?php
                    }
                    else
                    {
                        header('location: quantri.php');
                    }
                ?>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="./vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="./js/off-canvas.js"></script>
  <script src="./js/hoverable-collapse.js"></script>
  <script src="./js/template.js"></script>
  <script src="./js/todolist.js"></script>
  <!-- endinject -->

  <script>
      function validateForm() {
          var username = document.getElementById('taikhoan').value;
          var password = document.getElementById('matkhau').value;

          if (username === '') {
              alert('Please enter username.');
              return false; // Ngăn form được submit
          }
          else if(password === '')
          {
              alert('Please enter password.')
              return false;
          }
          else
          {
              return true; // Cho phép form được submit
          }
      }
  </script>
</body>

</html>
