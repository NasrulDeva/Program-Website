<?php
session_start();
date_default_timezone_set('Asia/Jakarta');

$hostname 	= 'localhost';
$username 	= 'root';
$password 	= '';
$dbname 	= 'devaapps';
$conn = mysqli_connect($hostname, $username, $password, $dbname);

if (isset($_POST['submit-otp'])) {
    $nomor = mysqli_escape_string($conn, $_POST['nomor']);
    if ($nomor) {
        mysqli_query($conn, "DELETE FROM otp WHERE nomor = '$nomor'");
        $otp = rand(100000, 999999);
        $waktu = time();
        mysqli_query($conn, "INSERT INTO otp (nomor, otp, waktu) VALUES ('$nomor', '$otp', '$waktu')");
        $data = [
            'target' => $nomor,
            'message' => "Password Baru Anda: $otp\nMasukkan dalam waktu 5 menit"
        ];

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_HTTPHEADER, array("Authorization: DwkSaY95D_-3u7NAV!P@"));
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($curl, CURLOPT_URL, "https://api.fonnte.com/send");
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        $result = curl_exec($curl);
        curl_close($curl);

        echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: 'OTP berhasil dikirim'
                });
              </script>";
    }
} elseif (isset($_POST['submit-login'])) {
    $otp = mysqli_escape_string($conn, $_POST['otp']);
    $nomor = mysqli_escape_string($conn, $_POST['nomor']);
    $q = mysqli_query($conn, "SELECT * FROM otp WHERE nomor = '$nomor' AND otp = '$otp'");
    $row = mysqli_num_rows($q);
    $r = mysqli_fetch_array($q);
    if ($row) {
        if (time() - $r['waktu'] <= 300) {
            $email = $_POST['email'];
            $data = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");
            if (mysqli_num_rows($data) > 0) {
                $_SESSION['username'] = $email;
                $_SESSION['status'] = "login";
                $_SESSION['bukanadmin'] = "logout";
                header("Location: admin/index.php");
                exit();
            } else {
                echo "<script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            text: 'User tidak ditemukan'
                        }).then(function() {
                            window.location = 'forgot-password.php';
                        });
                      </script>";
            }
        } else {
            echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: 'Password expired'
                    }).then(function() {
                        window.location = 'forgot-password.php';
                    });
                  </script>";
        }
    } else {
        echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: 'Password salah'
                }).then(function() {
                    window.location = 'forgot-password.php';
                });
              </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form OTP - Get OTP</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <style>
        .form-container {
            margin: 100px auto;
            box-shadow: 0 0 15px -2px lightgray;
            width: 100%;
            max-width: 600px;
            padding: 20px;
            box-sizing: border-box;
            background-color: #fff;
            border-radius: 10px;
        }

        .form-container h1 {
            text-align: center;
        }

        .form-group {
            margin-bottom: 10px;
        }
    </style>
</head>
<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-6 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Lupa Password?</h1>
                                        <h6>Jangan khawatir kamu bisa melakukan reset password dengan mengisi form nomor whatsapp dibawah untuk mendapatkan <b>Password baru sementara</b> dalam 5 menit...</h6>
                                    </div>
                                    <form method="POST" action="" accept-charset="utf-8" class="user">
                                    
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="nomor" name="nomor" placeholder="Enter your phone number" required>
                                        </div>
                                        
                                        <?php if (isset($_POST['submit-otp']) && !empty($nomor)) : ?>
                                            <div class="form-group">
                                                <input type="email" class="form-control form-control-user" id="email" name="email" placeholder="Enter your email" required>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-user" id="otp" name="otp" placeholder="Enter New Password" required>
                                            </div>
                                        <?php endif; ?>
                                        <?php if (!isset($_POST['submit-otp'])) : ?>
                                            <button type="submit" id="btn-otp" class="btn btn-primary btn-user btn-block" name="submit-otp">Request New Password</button>
                                        <?php else : ?>
                                            <button type="submit" id="btn-login" class="btn btn-success btn-user btn-block" name="submit-login">Login</button>
                                        <?php endif; ?>
                                        
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="index.php">Sudah ingat?</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>