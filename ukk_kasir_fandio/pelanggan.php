<?php
// Cek sesi Login
session_start();
include "koneksi.php";
if(!isset($_SESSION['user'])) {
    header("location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Tabel Pelanggan</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">Aplikasi Kasir</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Menu</div>
                            <a class="nav-link" href="index.php">
                                Dashboard
                            </a>
                            <a class="nav-link" href="pelanggan.php">
                                Pelanggan
                            </a>
                            <a class="nav-link" href="produk.php">
                                Produk / Barang
                            </a>
                            <a class="nav-link" href="pembelian.php">
                                Pembelian
                            </a>
                            <a class="nav-link" href="logout.php">
                                Logout
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Tabel Pelanggan</h1>
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Alamat</th>
                                    <th>Nomor Telepon</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <?php
                                $no = 1;
                                $query = "Select * from pelanggan";
                                $result = mysqli_query($koneksi,$query);
                                while ($d = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <td><?php echo $no++;?></td>
                                    <td><?php echo $d['nama_pelanggan'];?></td>
                                    <td><?php echo $d['alamat'];?></td>
                                    <td><?php echo $d['nomor_telepon'];?></td>
                                    <td>
                                        <a class="btn btn-danger" href="delete_pelanggan.php?id_pelanggan=<?php echo $d['id_pelanggan']; ?>">delete</a> 
                                        <a class="btn btn-primary" href="edit_pelanggan.php?id_pelanggan=<?php echo $d['id_pelanggan']; ?>">edit</a></td>
                                </tr>
                                <?php
                                }
                                ?>
                        </table>
                        <a class="btn btn-success" href="tambah_pelanggan.php">Tambah Pelanggan</a>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Ahmad Fandio Fakhrudin</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
