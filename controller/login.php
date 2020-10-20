<?php

session_start();

include '../db/connection.php';

$username = $_POST['username'];
$password = $_POST['password'];
$password = md5($password);

$query = mysqli_query($connection,"SELECT * FROM user WHERE username='$username' and password='$password'");
$check = mysqli_num_rows($query);

if($check > 0){
    $data = mysqli_fetch_assoc($query);
    $_SESSION['id_user'] = $data["id_user"];
    if($data['level'] == 'user'){
        // Create Session
        $_SESSION['username'] = "$username";
        $_SESSION['level'] = "user";
        $_SESSION['id_user'] = $data["id_user"];
        $_SESSION['nama'] = $data["nama"];
        $_SESSION['posisi'] = $data["posisi"];
        session_write_close();
        header("location:../pages/user/user.php");
    }else{
        $_SESSION['username'] = "$username";
        $_SESSION['level'] = "admin";
        $_SESSION['id_user'] = $data["id_user"];
        $_SESSION['nama'] = $data["nama"];
        $_SESSION['posisi'] = $data["posisi"];
        session_write_close();
        header("location:../pages/admin/dashboard.php");
    }
}else{    
    header("location:../index.php");
    session_write_close();
}
mysqli_close($connection);
?>