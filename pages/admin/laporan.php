<?php
    session_start();
    session_write_close();
    if($_SESSION['level'] != "admin"){
        header("location:../../index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>   
    <title>Hasil Survey</title>
    <?php include"../../templates/header.php";
    include "../../db/connection.php"; 
    ?>

    <link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.1/themes/base/jquery-ui.css" rel="stylesheet" />
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.1/jquery-ui.min.js"></script>    
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
                  <h4 class="page-title"><i class="fa fa-list"></i>&emsp;Laporan</h4>
                </div>
              </div>              
            </div>
            <!-- Page Title Header Ends-->

            <div class="row">
              <div class="col-md-12 grid-margin">
                <div class="card" style="border: 1px; border-style: solid; border-color: #B0C4DE">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-lg-12 kategori rounded" style="background-color: white;">
                        <h5>Lihat Data Survey Berdasarkan:</h5>
                        <div class="well">
                          <div class="alert alert-info" style="background-color: #faf8f0"> 
                            <form style='margin-right:300px; margin-top:0px' action='' method='GET'>                     
                              <table>
                                <tr>
                                  <td><p>Pilih User:</p></td>
                                  <td>&emsp;</td>
                                  <td><p>Dari tanggal:</p></td>
                                  <td>&emsp;</td>
                                  <td><p>Sampai tanggal:</p></td>
                                </tr>
                                <tr>
                                  <td style='width:600px'>
                                    <select class='form-control' name='user' style='width:200px' >          
                                      <option   style value='' select='selected' >-- Nama User --</option>
                                      <?php 
                                        $namauser = mysqli_query($connection,"SELECT * FROM user where level='user' ");
                                        while ($a = mysqli_fetch_array($namauser)){
                                          echo "<option value='$a[id_user]'>$a[nama]</option>";
                                        }
                                      ?>
                                    </select>
                                  </td>
                                  <td>
                                    &emsp;
                                  </td>
                                  <td style='width:600px'>
                                    <input style='padding:4px width:400px'  title='tanggal' placeholder='tanggal awal' type='date' class='form-control' name='tgl_awal' id='tbDate' />  
                                  </td>
                                  <td>
                                    &emsp;
                                  </td>
                                  <td style='width:600px'>
                                    <input style='padding:4px width:400px'  title='tanggal' placeholder='tanggal akhir' type='date' class='form-control' name='tgl_akhir' id='tbDate' />
                                  </td>
                                  <td>
                                    &emsp;
                                  </td>
                                  <td>
                                    <input type="submit" style='margin-top:-4px' class='btn btn-info btn-sm' value='Lihat Data'>
                                  </td>
                                </tr>
                              </table>                          
                            </form>                        
                          </div>
                        </div>
                        <p><font color="red"> -- Silakan pilih data survey yang akan Anda rekap sebelum mengunduhnya -- </font></p>
                      </div>  
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12 grid-margin">
                <div class="card" style="border: 1px; border-style: solid; border-color: #B0C4DE">
                  <div class="card-body">
                    <div class="row">                      
                      <div class="col-lg-12 kategori rounded" style="background-color: white;">                       
                        <h4><b>Data Hasil Survey</b></h4>                        
                        <hr>
                        <a class='pull-right btn btn-success btn-sm' target='_BLANK' href='rekap.php?user=<?php echo $_GET['user']; ?>&tgl_awal=<?php echo $_GET['tgl_awal']; ?>&tgl_akhir=<?php echo $_GET['tgl_akhir']; ?>' style="margin-left:750px;"><i class="fa fa-download"></i>  Rekap Hasil Survey</a><br><br>
                        <p align="center"><font //color= #8862E0> -- Data yang ditampilkan hanya 50 data survey terbaru -- </font></p>
                        <table id="example" class="table table-hover table-bordered">
                          <thead>
                            <tr>
                              <th><b>No.</b></th>
                              <th><b>Nama User</b></th>
                              <th><b>Respon</b></th>
                              <th><b>Jenis Transaksi</b></th>
                              <th><b>Keterangan</b></th>
                              <th><b>Tanggal</b></th>
                              <th><b>Posisi</b></th>
                            </tr>
                          </thead>
                          <tbody>

                             <?php 
                             $no=1;

                            if($_GET['user'] !='' && $_GET['tgl_akhir'] !='' && $_GET['tgl_awal'] !=''){
                              $data=mysqli_query($connection, "SELECT * from hasil_survey WHERE id_user='$_GET[user]' AND ((tanggal_waktu) BETWEEN '$_GET[tgl_awal]' AND '$_GET[tgl_akhir]')  ")
                              or die (mysqli_error($connection));
                            }

                            elseif($_GET['user'] =='' && $_GET['tgl_akhir'] !='' && $_GET['tgl_awal'] !=''){
                              $data=mysqli_query($connection, "SELECT * from hasil_survey WHERE tanggal_waktu BETWEEN '$_GET[tgl_awal]' AND '$_GET[tgl_akhir]'  ")
                              or die (mysql_error($connection));
                            }

                            elseif($_GET['user'] !='' && $_GET['tgl_akhir'] =='' && $_GET['tgl_awal'] ==''){
                              $data=mysqli_query($connection, "SELECT * from hasil_survey WHERE id_user='$_GET[user]' ")
                              or die (mysqli_error($connection));
                                }

                            elseif($_GET['user'] =='' && $_GET['tgl_akhir'] =='' && $_GET['tgl_awal'] =='') {
                              $data=mysqli_query($connection, "SELECT * from hasil_survey ORDER by tanggal_waktu DESC LIMIT 50")
                              or die (mysqli_error($connection));
                            }
                                
                            while ($row = mysqli_fetch_array($data)){ 
                                            $user=mysqli_query($connection, "SELECT * from user where id_user=$row[id_user]");
                                            $oke = mysqli_fetch_array($user);
                            ?>
                                        
                              <tr>
                                <td><?php echo $no; ?>
                                                <td><?php echo $oke['nama']; ?></td>
                                                <td><?php echo $row['respon']; ?></td>
                                <td><?php echo $row['jenis_transaksi']; ?></td>
                                <td><?php echo $row['keterangan']; ?></td>
                                <td><?php echo $row['tanggal_waktu']; ?></td>
                                <td><?php echo $oke['posisi']; ?></td>                                
                              </tr>
                            <?php $no++; } ?>
                          </tbody>
                        </table>
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

<script>
    $(document).ready(function () {
        $('input[id$=tbDate]').datepicker({});
    });
</script>