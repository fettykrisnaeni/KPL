<?php
  session_start();
  error_reporting(1);
  
  session_write_close();
  if($_SESSION['level'] != "admin"){
    header("location:../../index.php");
  }
  $id_user = $_SESSION['id_user'];
    
?>

      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center" style="background-color: white;">
          <img src="../../assets/images/bpr.png" width="320" height="63">
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center">
          <h4><b><font face="Cambria" size="5" color="#043353">ASAH - Aplikasi Survey Kepuasan Nasabah</font></b></h4>
          <ul class="navbar-nav ml-auto">            
            <li class="nav-item dropdown d-none d-xl-inline-block user-dropdown" >
              <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-user"></i>&emsp;<b><?php echo $_SESSION[nama] ?></b></a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown" >
                <div class="dropdown-header text-center">
                  <i class="fa fa-user"></i> 
                  <p class="mb-1 mt-3 font-weight-semibold">User: <?php echo $_SESSION[nama] ?></p>
                  <p class="font-weight-light text-muted mb-0">Posisi: <?php echo $_SESSION[posisi] ?></p>
                </div>
                <hr>
                <a href="../../controller/logout.php" class="dropdown-item" ><i class="fa fa-fw fa-power-off"></i> Sign Out</a>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav" style="list-style-type:none;">
            <li class="nav-item nav-profile">
              <a href="dashboard.php" class="nav-link">
                <div class="profile-image">
                  <img src="../../assets/images/icon_header.png" width="40" height="40">
                  <!-- <i class="fa fa-user"></i> -->
                </div>
                <div class="text-wrapper">
                  <p class="profile-name"><b> User: <?php echo $_SESSION[nama] ?></b></p>
                  <p class="designation"> Posisi: <?php echo $_SESSION[posisi] ?></p>
                </div>
              </a>
            </li>
            <li class="nav-item nav-category">Menu Administrator</li>
            <li class="nav-item">
              <a class="nav-link" href="dashboard.php">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Manajemen User</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="../../pages/admin/daftarUser.php">Daftar User</a>
                  </li>
                  <!-- <li class="nav-item">
                    <a class="nav-link" href="#">Tambah User</a>
                  </li> -->                  
                </ul>
              </div>
            </li>            
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <i class="menu-icon typcn typcn-document-add"></i>
                <span class="menu-title">Hasil Survey</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="../../pages/admin/grafik.php">Grafik Keseluruhan</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../../pages/admin/grafikPosisi.php">Grafik Per Posisi</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../../pages/admin/grafikUser.php">Grafik Per User</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../../pages/admin/laporan.php">Laporan</a>
                  </li>
                </ul>
              </div>
            </li>
          </ul>
        </nav>
        