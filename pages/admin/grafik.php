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
    <?php include"../../templates/header.php"; ?>
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
                  <h4 class="page-title"><i class="fa fa-bar-chart-o"></i>&emsp;Hasil Survey Keseluruhan</h4>
                </div>
              </div>              
            </div>
            <!-- Page Title Header Ends-->
            <div class="row">
              <div class="col-md-12 grid-margin">
                <div class="card" style="border: 1px; border-style: solid; border-color: #B0C4DE">
                  <div class="p-4 border-bottom bg-light">
                    <h4 class="card-title mb-0"><b>Grafik Survey Keseluruhan Bulan Ini</b></h4>
                  </div>
                  <div class="card-body">

                    <script type="text/javascript" src="../../assets/fusion/JS/jquery-1.4.js"></script>
                    <script type="text/javascript" src="../../assets/fusion/JS/jquery.fusioncharts.js"></script>
                    <script type="text/javascript">

                    $('#tabletest').convertToFusionCharts({
                      swfPath: "../../assets/fusion/Charts/",
                      type: "MSColumn3D",
                      data: "#tabletest",
                      dataFormat: "HTMLTable",
                      width:950,
                      height:500,
                    });
                    </script>
                    <div class="panel-body">
                      <table id="myHTMLTable" border="0" cellpadding="5" class="table table-striped">
                        <tr>
                        <th><font size=2 face=tahoma>Data</font></th> 
                        <th><font size=2 face=tahoma>Sangat Tidak Puas</font></th>
                        <th><font size=2 face=tahoma>Tidak Puas</font></th>
                        <th><font size=2 face=tahoma>Cukup</font></th>
                        <th><font size=2 face=tahoma>Puas</font></th>
                        <th><font size=2 face=tahoma>Sangat Puas</font></th>
                        </tr>
                      <?php
                      require_once('../../db/connection.php');

                      $sql = "SELECT SUM(respon = 'sangat tidak puas') As stp,
                                  SUM(respon = 'tidak puas') As tp,
                                  SUM(respon = 'cukup') As c,
                                  SUM(respon = 'puas') As p,
                                  SUM(respon = 'sangat puas') As sp
                                  FROM hasil_survey WHERE YEAR(tanggal_waktu) = YEAR(CURRENT_DATE()) AND MONTH(tanggal_waktu) = MONTH(CURRENT_DATE())";
                      $result = mysqli_query($connection,$sql);
                      
                      $oke = mysqli_fetch_array($result);
                        $a = $oke['stp'];
                        $b = $oke['tp'];
                        $c = $oke['c'];
                        $d = $oke['p'];
                        $e = $oke['sp'];
                        $tot = $a+$b+$c+$d+$e;
                        
                        $pa = ROUND(($a / $tot) * 100);
                        $pb = ROUND(($b / $tot) * 100);
                        $pc = ROUND(($c / $tot) * 100);
                        $pd = ROUND(($d / $tot) * 100);
                        $pe = ROUND(($e / $tot) * 100);
                          echo "<tr>
                            <td><font size=3 face=tahoma>Jumlah Respon</font></td>
                            <td><font size=2 face=tahoma>$a</font></td>
                            <td><font size=2 face=tahoma>$b</font></td>
                            <td><font size=2 face=tahoma>$c</font></td>
                            <td><font size=2 face=tahoma>$d</font></td>
                            <td><font size=2 face=tahoma>$e</font></td>
                            </tr>
                            <tr >
                            <td><font size=3 face=tahoma>Presentase</font></td>
                            <td><font size=2 face=tahoma>$pa%</font></td>
                            <td><font size=2 face=tahoma>$pb%</font></td>
                            <td><font size=2 face=tahoma>$pc%</font></td>
                            <td><font size=2 face=tahoma>$pd%</font></td>
                            <td><font size=2 face=tahoma>$pe%</font></td>
                            </tr>";  
                      ?>
                    
                      </table>
                      <script type="text/javascript">
                      $('#myHTMLTable').convertToFusionCharts({
                        swfPath: "../../assets/fusion/Charts/",
                        type: "MSColumn3D",
                        data: "#myHTMLTable",
                        dataFormat: "HTMLTable",
                        width:950,
                        height:500,
                      });
                      </script>
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