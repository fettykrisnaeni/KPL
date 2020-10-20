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
    <title>Manajemen User</title>
    <?php include"../../templates/header.php"; ?>
    <script>
        function get_posisi(){
            var level = document.forms["user-create"]["level"].value;                
            if (level == "admin") {
                document.getElementById("posisi").innerHTML=
                '<option value="admin">Admin</option>';
            }
            if (level == "user") {
                document.getElementById("posisi").innerHTML = 
                '<option value="teller">Teller</option>' +
                '<option value="cs">CS</option>';
            }
        }
        function get_posisi1(){                
            var level1 = document.forms["user-update"]["level"].value;
            if (level1 == "admin") {
                document.getElementById("posisi1").innerHTML=
                '<option value="admin">Admin</option>';
            }
            if (level1 == "user") {
                document.getElementById("posisi1").innerHTML = 
                '<option value="teller">Teller</option>' +
                '<option value="cs">CS</option>';
            }
        }
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
                  <h4 class="page-title"><i class="fa fa-users"></i>&emsp;Manajemen User</h4>
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
                            <h4><b>Daftar User</b></h4>
                            <hr>
                            <div>
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createModal" style="margin-left:800px;"><i class="fa fa-plus"></i>  Tambah User</button>
                            </div>
                            <table class="table table-striped mt-3" style="background-color: white;">
                                <thead>
                                    <tr>
                                        <th><b>No.</b></th>
                                        <th><b>Username</b></th>
                                        <th><b>Nama</b></th>
                                        <th><b>Level</b></th>
                                        <th><b>Posisi</b></th>
                                        <th><b>Action</b></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        require_once('../../db/connection.php');
                                        //tambah user
                                        if (isset($_POST['submit'])) {
                                            $username = $_POST['username'];
                                            $nama = $_POST['nama'];
                                            $password = $_POST['password'];
                                            $password = md5($password);
                                            $level = $_POST['level'];
                                            $posisi = $_POST['posisi'];
                                            if (mysqli_connect_errno()){
                                                die ("Could not connect to the database: <br />".
                                                mysqli_connect_error( ));
                                            }
                                            $query = "INSERT INTO user (username, nama, password, level, posisi) VALUES ('$username', '$nama', '$password', '$level', '$posisi')";
                                            $result = mysqli_query($connection,$query);
                                            echo "<script>
                                                    alert('User berhasil ditambahkan.');
                                                    document.location.href = 'daftarUser.php';
                                                 </script>
                                            ";
                                        } else {
                                            $error = true;
                                        }

                                        //update
                                        if (isset($_POST['update'])) {                                    
                                            $nama = $_POST['nama'];
                                            $password = $_POST['password'];
                                            $password = md5($password);
                                            $level = $_POST['level'];
                                            $posisi = $_POST['posisi'];
                                            if (mysqli_connect_errno()){
                                                die ("Could not connect to the database: <br />".
                                                mysqli_connect_error( ));
                                            }
                                            $query = "UPDATE user SET nama = '$nama', password = '$password', level = '$level', posisi = '$posisi' WHERE id_user = '{$_GET['id']}'";
                                            $result = mysqli_query($connection, $query);
                                            echo "<script>
                                                    alert('Data berhasil diubah.');
                                                    document.location.href = 'daftarUser.php';
                                                 </script>
                                            ";
                                        } else {
                                            $error = true;
                                        }

                                        //delete
                                        if(isset($_GET['iddelete'])){
                                            $id = $_GET['iddelete'];
                                            $query = "DELETE FROM user WHERE id_user='$id'";
                                            $result = mysqli_query($connection,$query);
                                            echo "<script>
                                                    alert('User berhasil dihapus.');
                                                    document.location.href = 'daftarUser.php';
                                                 </script>
                                            ";
                                        }
                                        if (mysqli_connect_errno()){
                                            die ("Could not connect to the database: <br />".
                                            mysqli_connect_error( ));
                                        }

                                        //tampilkan user
                                        $query = "SELECT * FROM user";
                                        $result = mysqli_query($connection,$query);
                                        //assign a query
                                        if (!$result) {
                                            die ("Could not query the database: <br/>". mysqli_error($connection));
                                        }
                                        $i = 1;
                                        while ($row = mysqli_fetch_array($result)){
                                            echo '<tr>';
                                            echo '<td >'.$i.'</td>';
                                            echo '<td>'.$row['username'].'</td>';                    
                                            echo '<td>'.$row['nama'].'</td>';
                                            echo '<td>'.$row['level'].'</td>';
                                            echo '<td>'.$row['posisi'].'</td>';
                                            echo '<td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="daftarUser.php?id='.$row['id_user'].'"><button type="button" class="btn btn-dark"><i class="fa fa-pencil"></i>  Edit</button></a>&emsp;<a href="daftarUser.php?iddelete='.$row['id_user'].'"><button type="button" class="btn btn-danger"><i class="fa fa-trash-o"></i>  Delete</button></a></div>
                                            </td>';
                                            echo '</tr>';
                                            $i++;
                                        }
                                        echo '</tbody>';
                                        echo '</table>';
                                        $i = 0;
                                    ?>
                                </tbody>
                            </table>
                        </div>

                        <!-- Modal Add -->
                        <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle"><b>Tambah User</b></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div> 
                                    <div class="modal-body">
                                        <form id="user-create" method="POST">
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" class="form-control" name="username" placeholder="Username" required minlength="3">
                                            </div>
                                            <div class="form-group">
                                                <label>Nama</label>
                                                <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" required minlength="3">
                                            </div>
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" class="form-control" name="password" placeholder="Password" required minlength="3">
                                            </div>
                                            <div>
                                                <label>Level</label>
                                                <select class="form-control" name="level" onchange="get_posisi()" required>
                                                    <option value="">-- Pilih Level --</option>
                                                    <option value="admin">Admin</option>
                                                    <option value="user">User</option>
                                                </select>
                                            </div>
                                            <div>
                                                <label>Posisi</label>
                                                <select class="form-control" name="posisi" id="posisi" required>
                                                    <option value="">-- Pilih Posisi --</option>                                    
                                                </select>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="submit" name="submit" class="btn btn-success">
                                            </div>
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
                                        <h5 class="modal-title" id="exampleModalLongTitle"><b>Edit User</b></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div> 
                                    <div class="modal-body">
                                            <form id="user-update" method="POST">  
                                            <div class="form-group">
                                                <label>Nama</label>
                                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" required minlength="3">
                                            </div>
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" class="form-control" id="password" name="password" placeholder="password" required minlength="3">
                                            </div>
                                            <div>
                                                <label>Level</label>
                                                <select class="form-control" name="level" onchange="get_posisi1()" required>
                                                    <option value="">-- Pilih Level --</option>
                                                    <option value="admin">Admin</option>
                                                    <option value="user">User</option>
                                                </select>
                                            </div>
                                            <div>
                                                <label>Posisi</label>
                                                <select class="form-control" name="posisi" id="posisi1" required>
                                                    <option value="">-- Pilih Posisi --</option>                                    
                                                </select>
                                            </div>                            
                                            <div class="modal-footer">
                                                <input type="submit" name="update" class="btn btn-success">
                                            </div>
                                        </form>
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
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <?php include"../../templates/footer.php"; ?>
    </body>
    <?php
        if(isset($error) && isset($_POST['submit'])){?>
            <script type="text/javascript">
                $("#createModal").modal();
            </script>
    <?php
        }
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $query = "SELECT * FROM user WHERE id_user='$id'";
            $query1 = mysqli_query($connection,$query);
            $id = mysqli_fetch_array($query1);
            ?>
            <script type="text/javascript">
                $("#editModal").modal();
                $('#nama').val('<?=$id['nama']?>');
                $('#password').val('<?=$id['password']?>');
                $('#level').val('<?=$id['level']?>');
                $('#posisi').val('<?=$id['posisi']?>');
            </script>
    <?php        
        }
        mysqli_close($connection);
    ?>
</html>