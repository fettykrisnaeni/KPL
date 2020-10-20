<?php
  session_start();
  error_reporting(1);

  session_write_close();
  if($_SESSION['level'] != "user"){
    header("location:../../index.php");
  }
  $id_user = $_SESSION['id_user'];
    
?>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top shadow-lg" style="background-color: #e6e6e6">  <!-- #043353 #e6e6e6 -->
    <div class="container">
      <a class="navbar-brand" href="user.php">
        <!-- <img src="../../assets/images/bpr.png" alt="" width="275" height="40"> -->
        <img src="../../assets/images/bpr1.png" alt="" width="275" height="40">
      </a>
      <div class="collapse navbar-collapse" id="navbarResponsive" style="color: #043353;">        
        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown d-none d-xl-inline-block user-dropdown" >
              <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false" style="color: #043353;"><i class="fa fa-user"></i>&emsp;<b><?php echo $_SESSION[nama] ?></b></a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown" >
                <div class="dropdown-header text-center">
                  <i class="fa fa-user"></i>
                  <p class="mb-1 mt-3 font-weight-semibold">User: <?php echo $_SESSION[nama] ?></p>
                  <p class="font-weight-light text-muted mb-0">Posisi: <?php echo $_SESSION[posisi] ?></p>
                </div>
                <hr>
                <form ><a href="../../pages/user/user.php?id=<?php echo $id_user?>" class="dropdown-item"><i class="fa fa-fw fa-gear"></i> Edit Profil</a></form>
                <a href="../../controller/logout.php" class="dropdown-item" ><i class="fa fa-fw fa-power-off"></i> Sign Out</a>
              </div>
            </li>
        </ul>
      </div>
    </div>
  </nav>
