<?php
    session_start();
    session_write_close();
    if($_SESSION['level'] != "admin"){
        header("location:.././index.php");
    }
    require_once('../../db/connection.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>   
    <title>Hasil Survey</title>
    <?php include"../../templates/header.php"; ?>
    <script>
            
    </script>
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
                  <h4 class="page-title"><i class="fa fa-bar-chart-o"></i>&emsp;Hasil Survey Per User</h4>
                </div>
              </div>              
            </div>
            <!-- Page Title Header Ends-->
            
            <script type="text/javascript" src="../../assets/fusion/JS/jquery-1.4.js"></script>
            <script type="text/javascript" src="../../assets/fusion/JS/jquery.fusioncharts.js"></script>
    
            <?php         
              $sql="SELECT * from user WHERE level='user'";
              $result = mysqli_query($connection,$sql); 
                while($row = mysqli_fetch_array($result)){
                  $sql1 = "SELECT SUM(respon = 'sangat tidak puas') As stp,
                  SUM(respon = 'tidak puas') As tp,
                  SUM(respon = 'cukup') As c,
                  SUM(respon = 'puas') As p,
                  SUM(respon = 'sangat puas') As sp
                  FROM hasil_survey where id_user='$row[id_user]'";
                  $result1 = mysqli_query($connection,$sql1);
                  
                  $oke = mysqli_fetch_array($result1);
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
                  
                  ?>

                  <div class="row">
                    <div class="col-md-12 grid-margin">
                      <div class="card" style="border: 1px; border-style: solid; border-color: #B0C4DE">
                        <div class="p-4 border-bottom bg-light">
                          <h4 class="card-title mb-0"><b>Grafik Survey: <?php echo"$row[nama]";?></b></h4>
                        </div>
                        <div class="card-body">            
                            <table id="myHTMLTable<?php echo"$row[id_user]";?>" border="0" cellpadding="5" class="table table-striped">
                              <tr>
                                <th><font size=2 face=tahoma>Data</font></th> 
                                <th><font size=2 face=tahoma>Sangat Tidak Puas</font></th>
                                <th><font size=2 face=tahoma>Tidak Puas</font></th>
                                <th><font size=2 face=tahoma>Cukup</font></th>
                                <th><font size=2 face=tahoma>Puas</font></th>
                                <th><font size=2 face=tahoma>Sangat Puas</font></th>
                              </tr>
                                
                              <tr>
                                <td><font size=3 face=tahoma>Jumlah Respon</font></td>
                                <td><font size=2 face=tahoma><?php echo"$a";?></font></td>
                                <td><font size=2 face=tahoma><?php echo"$b";?></font></td>
                                <td><font size=2 face=tahoma><?php echo"$c";?></font></td>
                                <td><font size=2 face=tahoma><?php echo"$d";?></font></td>
                                <td><font size=2 face=tahoma><?php echo"$e";?></font></td>
                              </tr>
                              <tr >
                                <td><font size=3 face=tahoma>Presentase</font></td>
                                <td><font size=2 face=tahoma><?php echo"$pa%";?></font></td>
                                <td><font size=2 face=tahoma><?php echo"$pb%";?></font></td>
                                <td><font size=2 face=tahoma><?php echo"$pc%";?></font></td>
                                <td><font size=2 face=tahoma><?php echo"$pd%";?></font></td>
                                <td><font size=2 face=tahoma><?php echo"$pe%";?></font></td>
                              </tr>                     
                            
                            </table>
                            <script type="text/javascript">
                            $('#myHTMLTable<?php echo"$row[id_user]";?>').convertToFusionCharts({
                              swfPath: "../../assets/fusion/Charts/",
                              type: "MSColumn3D",
                              data: "#myHTMLTable<?php echo"$row[id_user]";?>",
                              dataFormat: "HTMLTable",
                              width:950,
                              height:500,
                            });
                            </script>
                          </div>
                        </div>
                      </div>
                    </div>
                  <br>
                <?php } ?>
          </div>
        </div>
      </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <?php include"../../templates/footer.php"; ?>
  </body>
</html>