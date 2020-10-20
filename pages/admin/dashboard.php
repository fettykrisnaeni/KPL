<?php
    session_start();
    session_write_close();
    if($_SESSION['level'] != "admin"){
        header("location:../../index.php");
    }

    require_once('../../db/connection.php');

    $admin = "SELECT COUNT(id_user) as admin FROM user WHERE level='admin'";
    $jmlAdmin = mysqli_query($connection,$admin);
    $adm = mysqli_fetch_array($jmlAdmin);
    $ad = $adm['admin'];

    $user = "SELECT COUNT(id_user) as id FROM user WHERE level='user'";
    $jmlUser = mysqli_query($connection,$user);
    $oke = mysqli_fetch_array($jmlUser);
    $a = $oke['id'];

    $all = "SELECT COUNT(id_nasabah) as id_nasabah1 FROM hasil_survey WHERE YEAR(tanggal_waktu) = YEAR(CURRENT_DATE()) AND MONTH(tanggal_waktu) = MONTH(CURRENT_DATE())";
    $jmlAll = mysqli_query($connection,$all);
    $oke1 = mysqli_fetch_array($jmlAll);
    $b = $oke1['id_nasabah1'];

    $today = "SELECT COUNT(id_nasabah) as id_nasabah2 FROM hasil_survey WHERE YEAR(tanggal_waktu) = YEAR(CURRENT_DATE()) AND MONTH(tanggal_waktu) = MONTH(CURRENT_DATE()) AND DAY(tanggal_waktu) = DAY(CURRENT_DATE())";
    $jmlToday = mysqli_query($connection,$today);
    $oke2 = mysqli_fetch_array($jmlToday);
    $c = $oke2['id_nasabah2'];

?>

<!DOCTYPE html>
<html lang="en">
  <head>   
    <title>Dashboard</title>
    <?php include"../../templates/header.php"; ?>

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
      <!-- navcar+sidebar -->
      <?php include"../../templates/sidebar.php"; ?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <!-- Page Title Header Starts-->
            <div class="row page-title-header">
              <div class="col-12">
                <div class="page-header">
                  <h4 class="page-title"><i class="fa fa-home"></i>&emsp;Dashboard</h4>                  
                </div>
              </div>              
            </div>
            <!-- Page Title Header Ends-->
            <div class="row">
              <div class="col-md-12 grid-margin" align="center">
                <div class="card" style="background-color: lightgrey; border: 1px; border-style: solid; border-color: #B0C4DE">
                  <div class="card-body">
                    <div class="well">
                      <div class="alert alert-info" style="background-color: #faf8f0">
                        <font face="Cambria" size="4"><b>Selamat Datang "<?php echo $_SESSION[nama] ?>"<br>di Aplikasi Survey Kepuasan Nasabah BPR Gunung Rizki<br>Silakan Bertugas Kembali<br></b></font>
                      </div>  
                    </div> 
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 grid-margin" align="center">
                <div class="card"  style="border: 2px; border-style: solid; border-color: #B0C4DE">                  
                  <br><p><font size="4" color="#043353"><b> INFORMASI APLIKASI SURVEY KEPUASAN NASABAH </b></font></p>
                  <hr>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-lg-1 col-md-6 mt-md-0 mt-4">
                        <div class="d-flex">
                          <div class="wrapper">
                            <h5 class="mb-0 font-weight-medium text-primary">Admin:</h5>
                            <h3 class="mb-0 font-weight-semibold"><?php echo $ad ?></h3>
                          </div>
                        </div>
                      </div>                    
                      <div class="col-lg-2 col-md-6 mt-md-0 mt-4">
                        <div class="d-flex">
                          <div class="wrapper">
                            <h5 class="mb-0 font-weight-medium text-primary">Teller & CS:</h5>
                            <h3 class="mb-0 font-weight-semibold"><?php echo $a ?></h3>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-6 mt-md-0 mt-4">
                        <div class="d-flex">
                          <div class="wrapper">
                            <h5 class="mb-0 font-weight-medium text-primary">Responden Bulan Ini:</h5>
                            <h3 class="mb-0 font-weight-semibold"><?php echo $b ?></h3>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-6 mt-md-0 mt-4">
                        <div class="d-flex">
                          <div class="wrapper">
                            <h5 class="mb-0 font-weight-medium text-primary">Responden Hari Ini:</h5>
                            <h3 class="mb-0 font-weight-semibold"><?php echo $c ?></h3>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-6 mt-md-0 mt-4">
                        <div class="d-flex">
                          <div class="wrapper">
                            <h5 class="mb-0 font-weight-medium text-primary">Tingkat Kepuasan Nasabah:</h5>
                            <h3 class="mb-0 font-weight-semibold">
                              <?php
                                $sql = "SELECT SUM(respon = 'sangat tidak puas') As stp,
                                  SUM(respon = 'tidak puas') As tp,
                                  SUM(respon = 'cukup') As c,
                                  SUM(respon = 'puas') As p,
                                  SUM(respon = 'sangat puas') As sp
                                  FROM hasil_survey WHERE MONTH(tanggal_waktu) = MONTH(CURRENT_DATE())";
                                $result = mysqli_query($connection,$sql);
                                
                                $hasil = mysqli_fetch_array($result);
                                  $stp = $hasil['stp'];
                                  $tp = $hasil['tp'];
                                  $c = $hasil['c'];
                                  $p = $hasil['p'];
                                  $sp = $hasil['sp'];

                                if (($sp=="") && ($sp=="") && ($sp=="") && ($sp=="")) {
                                  echo "-";
                                }else {
                                  if (($sp>=$p) && ($sp>=$c) && ($sp>=$tp) && ($sp>=$stp)){
                                  echo "Sangat Puas";
                                  }elseif (($p>=$sp) && ($p>=$c) && ($p>=$tp) && ($p>=$stp)) {
                                    echo "Puas";
                                  }elseif (($c>=$sp) && ($c>=$p) && ($c>=$tp) && ($c>=$stp)) {
                                    echo "Cukup";
                                  }elseif (($tp>=$sp) && ($tp>=$p) && ($tp>=$c) && ($tp>=$stp)) {
                                    echo "Tidak Puas";
                                  }elseif (($stp>=$sp) && ($stp>=$p) && ($stp>=$c) && ($stp>=$tp)) {
                                    echo "Sangat Tidak Puas";
                                  }elseif (($sp=="") & ($sp=="") & ($sp=="") & ($sp=="")) {
                                    echo "-";
                                  }
                                }                                
                              ?>                                
                            </h3>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>            
          </div>
        </div>
      </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <?php include"../../templates/footer.php"; ?>
  </body>
</html>