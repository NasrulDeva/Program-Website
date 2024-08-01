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

    <title>Deva - Dashboard</title>

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
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
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
                                                Ph</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="getph"></div>
                                            <div class="d-inline">
                                                <span class="h6 mb-0 font-weight-bold text-gray-800" style="padding-top: 10px;">Min : </span>
                                                <span class="h6 mb-0 font-weight-bold text-gray-800" style="padding-top: 10px;" id="minPh"></span>
                                                <span class="h6 mb-0 font-weight-bold text-gray-800" style="padding-top: 10px;">Max : </span>
                                                <span class="h6 mb-0 font-weight-bold text-gray-800" style="padding-top: 10px;" id="maxPh"></span>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-tint fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Suhu</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="getsuhu"></div>
                                            <div class="d-inline">
                                                <span class="h6 mb-0 font-weight-bold text-gray-800" style="padding-top: 10px;">Min : </span>
                                                <span class="h6 mb-0 font-weight-bold text-gray-800" style="padding-top: 10px;" id="minSuhu"></span>
                                                <span class="h6 mb-0 font-weight-bold text-gray-800" style="padding-top: 10px;">Max : </span>
                                                <span class="h6 mb-0 font-weight-bold text-gray-800" style="padding-top: 10px;" id="maxSuhu"></span>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-thermometer-empty fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Kekeruhan
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800" id="getkekeruhan">kekeruhan</div>
                                                    <div class="d-inline">
                                                        <span class="h6 mb-0 font-weight-bold text-gray-800" style="padding-top: 10px;">Min : </span>
                                                        <span class="h6 mb-0 font-weight-bold text-gray-800" style="padding-top: 10px;" id="minNTU"></span>
                                                        <span class="h6 mb-0 font-weight-bold text-gray-800" style="padding-top: 10px;">Max : </span>
                                                        <span class="h6 mb-0 font-weight-bold text-gray-800" style="padding-top: 10px;" id="maxNTU"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-caret-down fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Ketinggian Air</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="getketinggian"></div>
                                            <div class="d-inline">
                                                <span class="h6 mb-0 font-weight-bold text-gray-800" style="padding-top: 10px;">Min : </span>
                                                <span class="h6 mb-0 font-weight-bold text-gray-800" style="padding-top: 10px;" id="minWaterLevel"></span>
                                                <span class="h6 mb-0 font-weight-bold text-gray-800" style="padding-top: 10px;">Max : </span>
                                                <span class="h6 mb-0 font-weight-bold text-gray-800" style="padding-top: 10px;" id="maxWaterLevel"></span>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-bullhorn fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content water level -->
                    <div class="row">
                        <!-- Water Level | Node 1 -->
                        <div class="col-4 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                PH Up
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="getnode1"></div>
                                            <div class="h6 mb-0 font-weight-bold text-gray-800" style="padding-top: 10px;"></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-level-up-alt fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Water Level | Node 2 -->
                        <div class="col-4 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                PH Down
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="getnode2"></div>
                                            <div class="h6 mb-0 font-weight-bold text-gray-800" style="padding-top: 10px;"></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-level-up-alt fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Water Level | Node 3 -->
                        <div class="col-4 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                Garam
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800" id="getnode3"></div>
                                                    <div class="h6 mb-0 font-weight-bold text-gray-800" style="padding-top: 10px;"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-level-up-alt fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Content Row -->
                    <div class="row">

                        <div class="col-lg-12 mb-4">

                            <!-- Illustrations -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Data Riwayat</h6>
                                </div>
                                <div class="card-body">
                                    
                                        <table id="checkout-list" class="list-group"></table>
                                    
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row">

                        <div class="col-lg-12 mb-4">

                            <!-- Illustrations -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Riwayat Pemberian Obat</h6>
                                </div>
                                <div class="card-body">
                                    
                                        <table id="checkin-list" class="list-group"></table>
                                    
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
    var node1Ref = database.ref('/data/');
    node1Ref.on('value', (snapshot) => {
    var data = snapshot.val();
    updateNode1(data);
    });

    // Listen for changes in Node 1
    var node2Ref = database.ref('/limit/');
    node2Ref.on('value', (snapshot) => {
    var data = snapshot.val();
    updateNode2(data);
    });

    // Function to update Node 1
    function updateNode1(data) {
        if (data) {
        document.getElementById('getph').innerText = data.ph || 'N/A';
        document.getElementById('getsuhu').innerText = data.suhu + " ℃" || 'N/A';
        document.getElementById('getkekeruhan').innerText = data.kekeruhan + " NTU" || 'N/A';
        document.getElementById('getketinggian').innerText = data.ketinggian + " cm" || 'N/A';
        document.getElementById('getnode1').innerText = data.waterlevel1 + " %" || 'N/A';
        document.getElementById('getnode2').innerText = data.waterlevel2 + " %" || 'N/A';
        document.getElementById('getnode3').innerText = data.waterlevel3 + " %" || 'N/A';
        } else {
        console.error('Node 1 data is null');
        }
    }

    // Function to update Node 1
    function updateNode2(data) {
        if (data) {
        document.getElementById('minPh').innerText = data.minPh || 'N/A';
        document.getElementById('maxPh').innerText = data.maxPh || 'N/A';
        document.getElementById('minSuhu').innerText = data.minSuhu + " ℃" || 'N/A';
        document.getElementById('maxSuhu').innerText = data.maxSuhu + " ℃" || 'N/A';
        document.getElementById('minNTU').innerText = data.minNTU + " NTU" || 'N/A';
        document.getElementById('maxNTU').innerText = data.maxNTU + " NTU" || 'N/A';
        document.getElementById('minWaterLevel').innerText = data.minLevel || 'N/A';
        document.getElementById('maxWaterLevel').innerText = data.maxLevel || 'N/A';
        } else {
        console.error('Node 1 data is null');
        }
    }

    // Function to update Check Out list
    function updateCheckOutList(data) {
        var checkoutList = document.getElementById('checkout-list');
        checkoutList.innerHTML = ''; // Clear existing list

        // Create table
        var table = document.createElement('table');
        table.className = 'table table-striped';

        // Create thead element
        var thead = document.createElement('thead');
        var headerRow = document.createElement('tr');

        // Define table headers
        var headers = ['No', 'Tanggal', 'PH', 'Suhu (℃)', 'Kekeruhan', 'Ketinggian'];
        headers.forEach(headerText => {
            var th = document.createElement('th');
            th.scope = 'col';
            th.innerText = headerText;
            headerRow.appendChild(th);
        });

        thead.appendChild(headerRow);
        table.appendChild(thead);

        // Create tbody element
        var tbody = document.createElement('tbody');

        var counter = 1;
        for (var key in data) {
            if (data.hasOwnProperty(key)) {
                var row = document.createElement('tr');

                var tdCounter = document.createElement('td');
                tdCounter.innerText = counter;
                row.appendChild(tdCounter);

                var tdTanggal = document.createElement('td');
                tdTanggal.innerText = data[key].tanggal;
                row.appendChild(tdTanggal);

                // var tdPemberianObat = document.createElement('td');
                // tdPemberianObat.innerText = data[key].pemberian_obat;
                // row.appendChild(tdPemberianObat);

                // var tdPenggantianAir = document.createElement('td');
                // tdPenggantianAir.innerText = data[key].penggantian_air;
                // row.appendChild(tdPenggantianAir);

                var tdPH = document.createElement('td');
                tdPH.innerText = data[key].ph;
                row.appendChild(tdPH);

                var tdSuhu = document.createElement('td');
                tdSuhu.innerText = data[key].suhu + ' ℃';
                row.appendChild(tdSuhu);

                var tdKekeruhan = document.createElement('td');
                tdKekeruhan.innerText = data[key].kekeruhan;
                row.appendChild(tdKekeruhan);

                var tdKetinggian = document.createElement('td');
                tdKetinggian.innerText = data[key].ketinggian;
                row.appendChild(tdKetinggian);

                tbody.appendChild(row);
                counter++;
            }
        }

        table.appendChild(tbody);
        checkoutList.appendChild(table);
    }

    // Function to update Check Out list
    function updateCheckInList(data) {
        var checkinList = document.getElementById('checkin-list');
        checkinList.innerHTML = ''; // Clear existing list

        // Create table
        var table = document.createElement('table');
        table.className = 'table table-striped';

        // Create thead element
        var thead = document.createElement('thead');
        var headerRow = document.createElement('tr');

        // Define table headers
        var headers = ['No', 'Tanggal', 'Jenis Obat', 'Nilai(mL)'];
        headers.forEach(headerText => {
            var th = document.createElement('th');
            th.scope = 'col';
            th.innerText = headerText;
            headerRow.appendChild(th);
        });

        thead.appendChild(headerRow);
        table.appendChild(thead);

        // Create tbody element
        var tbody = document.createElement('tbody');

        var counter = 1;
        for (var key in data) {
            if (data.hasOwnProperty(key)) {
                var row = document.createElement('tr');

                var tdCounter = document.createElement('td');
                tdCounter.innerText = counter;
                row.appendChild(tdCounter);

                var tdTanggal = document.createElement('td');
                tdTanggal.innerText = data[key].timestamp;
                row.appendChild(tdTanggal);

                var tdPemberianObat = document.createElement('td');
                tdPemberianObat.innerText = data[key].jenis_obat;
                row.appendChild(tdPemberianObat);

                var tdPenggantianAir = document.createElement('td');
                tdPenggantianAir.innerText = data[key].ml;
                row.appendChild(tdPenggantianAir);

                tbody.appendChild(row);
                counter++;
            }
        }

        table.appendChild(tbody);
        checkinList.appendChild(table);
    }

    // Listen for changes in Check Out node
    var checkoutRef = database.ref('/data_riwayat');
    checkoutRef.on('value', (snapshot) => {
        var data = snapshot.val();
        updateCheckOutList(data);
    });

    // Listen for changes in Check Out node
    var checkinRef = database.ref('/riwayat_obat');
    checkinRef.on('value', (snapshot) => {
        var data = snapshot.val();
        updateCheckInList(data);
    });
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