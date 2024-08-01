<?php
// Aktifkan session
session_start();

if($_SESSION['status'] == "login")
{
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Deva - Edit Limit</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Firebase App (the core Firebase SDK) is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/8.6.8/firebase-app.js"></script>
    <!-- Add Firebase products that you want to use -->
    <script src="https://www.gstatic.com/firebasejs/8.6.8/firebase-database.js"></script>

</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <div class="d-flex justify-content-center align-items-center mt-10">
                <img src="logo.png" width="200">
            </div>
            
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-text mx-3">Monitoring Kolam <sup></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="editLimit.php">
                    <i class="fas fa-fw fa-pen"></i>
                    <span>Edit Limit</span></a>
            </li>

            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="profile.php">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Profil</span></a>
            </li>

            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="https://wa.me/+6281238286645" target="_blank">
                    <i class="fas fa-fw fa-question-circle"></i>
                    <span>Bantuan</span></a>
            </li>

            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <!-- <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div> -->

            <!-- Sidebar Message -->
            <div class="sidebar-card d-none d-lg-flex">
                <h5>Sumde Betta</h5>
                <p class="text-center mb-2">Jl. M.T.Haryono GgII No.15A RT/RW 04/03, Kedungwaru, Bago</p>
                <br>
                <a href="https://linktr.ee/Sumdebetta" class="btn btn-light" target="_blank">Hubungi Kami</a>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"></span>
                                <img class="img-profile rounded-circle"
                                    src="../img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Limit Dashboard</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Ph
                                            </div>
                                            <div class="h6 mb-0 font-weight-bold text-gray-800" style="padding-top: 10px;">Min : <p id="getMinPh"></p>Max : <p id="getMaxPh"></p></div>
                                            <!-- Form for updating Ph -->
                                            <form id="phForm">
                                                <input type="text" id="phInputMin" class="form-control mb-2" placeholder="Enter min Ph value">
                                                <input type="text" id="phInputMax" class="form-control mb-2" placeholder="Enter max Ph value">
                                                <button type="button" class="btn btn-primary" onclick="updatePh()">Update</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Suhu Card -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Suhu
                                            </div>
                                            <div class="h6 mb-0 font-weight-bold text-gray-800" style="padding-top: 10px;">Min : <p id="getMinSuhu"></p>Max : <p id="getMaxSuhu"></p></div>
                                            <!-- Form for updating Suhu -->
                                            <form id="suhuForm">
                                                <input type="text" id="suhuInputMin" class="form-control mb-2" placeholder="Enter min Suhu value">
                                                <input type="text" id="suhuInputMax" class="form-control mb-2" placeholder="Enter max Suhu value">
                                                <button type="button" class="btn btn-success" onclick="updateSuhu()">Update</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Kekeruhan Card -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Kekeruhan
                                            </div>
                                            <div class="h6 mb-0 font-weight-bold text-gray-800" style="padding-top: 10px;">Min : <p id="getMinNTU"></p>Max : <p id="getMaxNTU"></p></div>
                                            <!-- Form for updating Kekeruhan -->
                                            <form id="kekeruhanForm">
                                                <input type="text" id="kekeruhanInputMin" class="form-control mb-2" placeholder="Enter min Kekeruhan value">
                                                <input type="text" id="kekeruhanInputMax" class="form-control mb-2" placeholder="Enter max Kekeruhan value">
                                                <button type="button" class="btn btn-info" onclick="updateKekeruhan()">Update</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Ketinggian Air Card -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Ketinggian Air
                                            </div>
                                            <div class="h6 mb-0 font-weight-bold text-gray-800" style="padding-top: 10px;">Min : <p id="getMinLevel"></p>Max : <p id="getMaxLevel"></p></div>
                                            <!-- Form for updating Ketinggian -->
                                            <form id="ketinggianForm">
                                                <input type="text" id="ketinggianInputMin" class="form-control mb-2" placeholder="Enter min Ketinggian value">
                                                <input type="text" id="ketinggianInputMax" class="form-control mb-2" placeholder="Enter max Ketinggian value">
                                                <button type="button" class="btn btn-warning" onclick="updateKetinggian()">Update</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; 2024</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/chart-area-demo.js"></script>
    <script src="../js/demo/chart-pie-demo.js"></script>

    <!-- Firebase Configuration and Initialization -->
<script>
    // Your web app's Firebase configuration
    var firebaseConfig = {
        apiKey: "AIzaSyCC3q3_ENzR33ajT-zVhPEaUuSjbxmeDBc",
        authDomain: "devaapps-d5f1a.firebaseapp.com",
        databaseURL: "https://devaapps-d5f1a-default-rtdb.firebaseio.com",
        projectId: "devaapps-d5f1a",
        storageBucket: "devaapps-d5f1a.appspot.com",
        messagingSenderId: "104740342535",
        appId: "1:104740342535:web:46b110f3a23156fbe453a2"
    };
    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);

    // Reference to the database
    var database = firebase.database();

        // Listen for changes in Node 1
        var node1Ref = database.ref('/limit/');
    node1Ref.on('value', (snapshot) => {
        var data = snapshot.val();
        updateNode1(data);
    });

    // Function to update Node 1
    function updateNode1(data) {
        if (data) {
        document.getElementById('getMinPh').innerText = data.minPh || 'N/A';
        document.getElementById('getMaxPh').innerText = data.maxPh || 'N/A';
        document.getElementById('getMinSuhu').innerText = data.minSuhu + " ℃" || 'N/A';
        document.getElementById('getMaxSuhu').innerText = data.maxSuhu + " ℃" || 'N/A';
        document.getElementById('getMinNTU').innerText = data.minNTU + " NTU" || 'N/A';
        document.getElementById('getMaxNTU').innerText = data.maxNTU + " NTU" || 'N/A';
        document.getElementById('getMinLevel').innerText = data.minLevel + " cm" || 'N/A';
        document.getElementById('getMaxLevel').innerText = data.maxLevel + " cm" || 'N/A';
        } else {
        console.error('Node 1 data is null');
        }
    }

    // Function to update Ph in Firebase
    function updatePh() {
        var phInputMin = document.getElementById('phInputMin').value;
        var phInputMax = document.getElementById('phInputMax').value;

        if (phInputMin && phInputMax) {
            var updates = {};
            updates['/limit/minPh'] = phInputMin;
            updates['/limit/maxPh'] = phInputMax;
            firebase.database().ref().update(updates).then(() => {
                alert('Min & Max Ph updated successfully');
            }).catch((error) => {
                console.error('Error updating Min & Max Ph:', error);
                alert('Error updating Min & Max Ph:', error);
            });
        } else {
            alert('Please enter a valid Min & Max Ph value');
        }
    }

    // Function to update Suhu in Firebase
    function updateSuhu() {
        var suhuInputMin = document.getElementById('suhuInputMin').value;
        var suhuInputMax = document.getElementById('suhuInputMax').value;

        if (suhuInputMin && suhuInputMax) {
            var updates = {};
            updates['/limit/minSuhu'] = suhuInputMin;
            updates['/limit/maxSuhu'] = suhuInputMax;
            firebase.database().ref().update(updates).then(() => {
                alert('Min & Max Suhu updated successfully');
            }).catch((error) => {
                console.error('Error updating Min & Max Suhu:', error);
                alert('Error updating Min & Max Suhu:', error);
            });
        } else {
            alert('Please enter a valid Min & Max Suhu value');
        }
    }

    // Function to update Kekeruhan in Firebase
    function updateKekeruhan() {
        var kekeruhanInputMin = document.getElementById('kekeruhanInputMin').value;
        var kekeruhanInputMax = document.getElementById('kekeruhanInputMax').value;

        if (kekeruhanInputMin && kekeruhanInputMax) {
            var updates = {};
            updates['/limit/minNTU'] = kekeruhanInputMin;
            updates['/limit/maxNTU'] = kekeruhanInputMax;

            firebase.database().ref().update(updates).then(() => {
                alert('Min & Max Kekeruhan updated successfully');
            }).catch((error) => {
                console.error('Min & Max Error updating Kekeruhan:', error);
                alert('Min & Max NTU update Error');
            });
        } else {
            alert('Please enter a valid Min & Max Kekeruhan value');
        }
    }

    // Function to update Ketinggian in Firebase
    function updateKetinggian() {
        var ketinggianInputMin = document.getElementById('ketinggianInputMin').value;
        var ketinggianInputMax = document.getElementById('ketinggianInputMax').value;

        if (ketinggianInputMin && ketinggianInputMax) {
            var updates = {};
            updates['/limit/minLevel'] = ketinggianInputMin;
            updates['/limit/maxLevel'] = ketinggianInputMax;

            firebase.database().ref().update(updates).then(() => {
                alert('Min & Max Ketinggian updated successfully');
            }).catch((error) => {
                console.error('Min & Max Error updating Ketinggian:', error);
                alert('Min & Max Water Level update Error');
            });
        } else {
            alert('Please enter a valid Min & Max Ketinggian value');
        }
    }
</script>

</body>

</html>

<?php
}
else {
    header("location:../index.php");
    exit();
}
?>