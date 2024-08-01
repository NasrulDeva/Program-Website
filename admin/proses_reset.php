<?php
session_start();
require '../koneksi.php'; // File konfigurasi database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $newPassword = $_POST['newPassword'];

    // Update password
    $stmt = $koneksi->query("UPDATE user SET password = '$newPassword' WHERE id = 1");

    if ($stmt) {
        $_SESSION['message'] = "Password berhasil direset!";
        $_SESSION['message_type'] = "success";
    } else {
        $_SESSION['message'] = "Terjadi kesalahan, coba lagi.";
        $_SESSION['message_type'] = "error";
    }
    header("Location: resetPassword.php");
    exit();
} else {
    header("Location: resetPassword.php");
    exit();
}
?>