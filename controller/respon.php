<?php

session_start();

require_once '../db/connection.php';

if (isset($_POST['submit'])) {
	$iduser=$_SESSION['id_user'];
	$idnasabah=$_POST['id_nasabah'];
	$respon = $_POST['respon'];
	$transaksi = $_POST['transaksi'];
	$keterangan = $_POST['keterangan'];
	date_default_timezone_set('Asia/Jakarta');
	$tanggal_waktu = date("Y-m-d H:i:s");
	if (mysqli_connect_errno()){
        die ("Could not connect to the database: <br />".
        mysqli_connect_error( ));
    }
    
    $query1 = "INSERT INTO hasil_survey (id_user, id_nasabah, respon, jenis_transaksi, keterangan, tanggal_waktu) VALUES ('$iduser', '$idnasabah', '$respon', '$transaksi', '$keterangan', '$tanggal_waktu')";	
	$result = mysqli_query($connection, $query1);
	echo "<script>
            	alert('Terimakasih telah mengisi survey kepuasan nasabah BPR Gunung Rizki.');
                document.location.href = '../pages/user/user.php';
         </script>
    ";
}else {
	$error = true;
}


?>