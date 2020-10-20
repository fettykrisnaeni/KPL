<?php
    session_start();
    session_write_close();
    if(!empty($_SESSION['level'])){
        if($_SESSION['level'] == "user"){
            header("location:user.php");
        }else{
            if($_SESSION['level'] == "admin"){
            header("location:dashboard.php");
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
  <head>    
    <title>Login</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/iconfonts/ionicons/css/ionicons.css">
    <link rel="stylesheet" href="assets/vendors/iconfonts/typicons/src/font/typicons.css">
    <link rel="stylesheet" href="assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.addons.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="assets/css/shared/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="assets/images/icon_header.png" />

    <script>
      function validateForm(){
        var x = document.forms["formLogin"]["username"].value;
        var y = document.forms["formLogin"]["password"].value;
        if(x == "" && y == ""){
          alert("LOGIN GAGAL. Silakan isi Username dan Password Anda.");
          return false;
        }if(x == ""){
          alert("LOGIN GAGAL. Silakan isi Username dan Password Anda.");
          return false;
        }if(y == ""){
          alert("LOGIN GAGAL. Silakan isi Username dan Password Anda.");
          return false;
        }
      }
    </script>
    <style>
      hr {
        border: 0;
        height: 1px;
        background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));
      }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
          <div class="row w-100">
            <div class="col-lg-4 mx-auto">
              <div class="auto-form-wrapper">
                <form action="controller/login.php" method="POST" name="formLogin" onsubmit="return validateForm()">
                  <img src="assets/images/bpr1.png" width="350" height="50">
                  <!-- <img src="assets/images/icon_header.png" width="75" height="75""> -->
                  <p align="center"><br><font face="Cambria" size="5" color="#043353"><b>( ASAH )</b></font><br><font face="Andalus" size="5" color="#043353">APLIKASI SURVEY<br>KEPUASAN NASABAH</font></p><hr>
                  <h4 align="center">LOGIN</h4>
                  <div class="form-group">
                    <label class="label">Username:</label>
                    <div class="input-group">
                      <input type="text" name="username" class="form-control" placeholder="Username">
                      <div class="input-group-append">
                        <span class="input-group-text">
                          <i class="mdi mdi-check-circle-outline"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="label">Password:</label>
                    <div class="input-group">
                      <input type="password" name="password" class="form-control" placeholder="Password">
                      <div class="input-group-append">
                        <span class="input-group-text">
                          <i class="mdi mdi-check-circle-outline"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <button class="btn btn-primary submit-btn btn-block">Sign In</button><br>
                  </div>                  
                </form>
              </div>              
              <p class="footer-text text-center"><br>Copyright &copy; 2020 <a href="http://www.gunungrizki.com/" target="_blank">BPR Gunung Rizki</a>. All rights reserved.</p>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="assets/vendors/js/vendor.bundle.addons.js"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="assets/js/shared/off-canvas.js"></script>
    <script src="assets/js/shared/misc.js"></script>
    <!-- endinject -->
  </body>
</html>