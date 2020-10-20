<?php
	session_start();
	session_write_close();
	if($_SESSION['level'] != "user"){
		header("location:../../index.php");
	}
    $id_user = $_SESSION = ['id_user'];
?>


<html>
<head>
	<title>Survey Kepuasan Nasabah</title>
	<?php include "../../templates/header.php"; ?>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <style>
      hr {
        border: 0;
        height: 1px;
        background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));
      }
    </style>
</head>

<body style="background-color: #5F9EA0">
	<?php include "../../templates/navbar.php"; ?>

      	<div class="container">
            <div class="row py-5">
                <div class="col-lg-12">
                    <br><br><p align="center"><font size="5" color="#faf8f0"><b>FORMULIR SURVEY KEPUASAN NASABAH</b></font></p><hr>
                </div>
                <div class="col-lg-12 kategori rounded" style="background-color: #faf8f0; border: 1px; border-style: solid; border-color: #B0C4DE" align="center">
                    <div class="col-lg-12">
                    
                    <?php 
                        require_once '../../db/connection.php';
                            
                        $datanasabah = "SELECT max(id_nasabah) as idnasabah FROM hasil_survey";
                        $hasilnasabah = mysqli_query($connection,$datanasabah);
                        $datanasabah  = mysqli_fetch_array($hasilnasabah);
                        $nimnasabah = $datanasabah['idnasabah'];

                        //mengatur 6 karakter sebagai jumalh karakter yang tetap
                        //mengatur 3 karakter untuk jumlah karakter yang berubah-ubah
                        $noUrutnasabah = (int) substr($nimnasabah, 3, 5);
                        $noUrutnasabah++;

                        //menjadikan 201353 sebagai 6 karakter yang tetap
                        $char = "NSB";
                        //%03s untuk mengatur 3 karakter di belakang 201353
                        $idnasabah = $char . sprintf("%05s", $noUrutnasabah);


                        require_once('../../db/connection.php');

                        //edit
                        if (isset($_POST['update'])){
                            $username = $_POST['username'];
                            $password = $_POST['password'];
                            $password = md5($password);
                            
                            $query= "UPDATE user SET password='{$password}', username='{$username}' WHERE id_user='{$_GET['id']}'";
                            $result= mysqli_query($connection,$query);
                            echo "<script>
                                    alert('Username dan Password berhasil diubah.');
                                    document.location.href = 'user.php';
                                </script>
                            ";
                        }
                        if (isset($_POST['batal'])) {
                          header("location:user.php");
                        }
                                
                    ?>

                    <form method="POST" action="../../controller/respon.php">
                        <table>
                            <input type='text' class='form-control' name='id_nasabah' value='<?php echo "$idnasabah "?>' style="visibility: hidden;">
                            <tr>
                                <td colspan="9">
                                    <h5>Bagaimana Penilaian Anda Terhadap Pelayanan Kami?</h5>
                                </td>
                            </tr>
                            <tr><td><br></td></tr>
                            <tr style="text-align: center;">
                                <th><img src="../../assets/images/sangat_tidak_puass.png" width="125" height="125" style="border: 2px solid #5F9EA0;"><br><input type="radio" name="respon" value="sangat tidak puas" required> Sangat Tidak Puas</th>
                                <th>&emsp;</th>
                                <th><img src="../../assets/images/tidak_puas.png" width="125" height="125" style="border: 2px solid #5F9EA0"><br><input type="radio" name="respon" value="tidak puas" required> Tidak Puas</th>
                                <th>&emsp;</th>
                                <th><img src="../../assets/images/cukup.png"width="125" height="125" style="border: 2px solid #5F9EA0"><br><input type="radio" name="respon" value="cukup" required> Cukup</th>
                                <th>&emsp;</th>
                                <th><img src="../../assets/images/puas.png" width="125" height="125" style="border: 2px solid #5F9EA0"><br><input type="radio" name="respon" value="puas" required> Puas</th>
                                <th>&emsp;</th>
                                <th><img src="../../assets/images/sangat_puass.png" width="125" height="125" style="border: 2px solid #5F9EA0"><br><input type="radio" name="respon" value="sangat puas" required> Sangat Puas</th>
                            </tr>
                            <tr><td><br></td></tr>
                            <tr>
                                <td><h6>Jenis Transaksi</h6></td>
                                <td><b>:</b></td>
                                <td colspan="7">
                                    <select name="transaksi" class="form-control" required>
                                        <option value="">-- Pilih Jenis Transaksi --</option>
                                        <option value="tabungan">1. Tabungan</option>
                                        <option value="deposito">2. Deposito</option>
                                        <option value="kredit">3. Kredit</option>
                                    </select>
                                </td>
                            </tr>
                            <tr><td><br></td></tr>
                            <tr>
                                <td><h6>Keterangan</h6></td>
                                <td><b>:</b></td>
                                <td colspan="7">
                                    <div class="form-group">
                                        <textarea name='keterangan' class="form-control" rows="3" placeholder="Silakan isi kritik dan saran." required></textarea>
                                    </div>
                                </td>
                            </tr>                            
                            <tr>
                                <td colspan="9"><center><button type="submit" name="submit" class="btn btn-primary btn-lg">Submit</button></center></td>
                            </tr>
                        </table><br>
                    </form>
                    </div>
        		</div>
			</div>
		</div>
	

    <!-- Modal Update -->
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle"><b>Edit Profil</b></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div> 
                    <div class="modal-body">
                        <form id="user-update" method="POST">  
                          <div class="form-group row">
                            <label for="staticPosisi" class="col-sm-2 col-form-label"><strong>Posisi</strong></label>
                            <div class="col-sm-8">
                              <input type="text" readonly class="form-control-plaintext" id="staticPosisi" value="   <?php echo $id['posisi'] ?>">
                            </div>
                          </div>
                        
                          <div class="form-group row">
                            <label for="inputusername" class="col-sm-2 col-form-label"><strong>Username</strong></label>
                            <div class="col-sm-8">
                              <input type="username" disabled class="form-control" id="username" placeholder="username" value="<?php echo $id['username'] ?>">
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="inputusername" class="col-sm-2 col-form-label"><strong>Username Baru</strong></label>
                            <div class="col-sm-8">
                              <input type="username" name="username" class="form-control" id="username1" placeholder="Username" required>
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label"><strong>Password Lama</strong></label>
                            <div class="col-sm-8 align-self-center">
                              <input type="password" disabled class="form-control" id="inputPassword" placeholder="Password" value="<?php echo $id['password'] ?>">
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label"><Strong>Password Baru</Strong></label>
                            <div class="col-sm-8 align-self-center">
                              <input type="password" name="password" class="form-control" id="inputPassword1" placeholder="Password" required>
                            </div>
                          </div>

                          <button type="submit" name="update" class="btn btn-primary text-justify">Submit</button>
                          <a href="user.php"><button type="button" name="batal" class="btn btn-danger">Batal</button></a>                            
                        </form>
                    </div>
                </div>
            </div>
        </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container-fluid clearfix">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright &copy; 2020 <a href="http://www.gunungrizki.com/" target="_blank">BPR Gunung Rizki</a>. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i> by Nana</span>
        </div>
    </footer>

</body>
<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT * FROM user WHERE id_user='$id'";
        $query1 = mysqli_query($connection,$query);
        $id = mysqli_fetch_array($query1);
?>
    <script type="text/javascript">
        $("#editModal").modal();
        $('#staticPosisi').val('<?=$id['posisi']?>');
        $('#username').val('<?=$id['username']?>');
        $('#inputPassword').val('<?=$id['password']?>');
    </script>
<?php        
    }
    mysqli_close($connection);
?>
</html>