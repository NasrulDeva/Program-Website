<?php
// Aktifkan session
session_start();

//menghubungkan koneksi
include 'koneksi.php';

// Menangkap data yang dikirim dari form
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    //menyeleksi data admin
    $data = mysqli_query($koneksi,"select * from user where email='$email' and password='$password'");

    //menghitung jumlah data
    $cek = mysqli_num_rows($data);

    if($cek > 0) {
        $_SESSION['username'] = $email;
        $_SESSION['password'] = $password;
        $_SESSION['status'] = "login";
        $_SESSION['bukanadmin'] = "logout";
        header("location:admin/index.php");
        exit();
    } else {
        $_SESSION['pesan'] = "gagal";
        header("location:index.php?pesan=gagal");
        exit();
    }
} else {
    header("location:index.php");
    exit();
}
?>