<?php 
    include ("func.php");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Stok Barang Koperasi</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">DK Koperasi</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        
                        <a class="dropdown-item" href="logout.php">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Menu</div>
                            <a class="nav-link" href="index.php">
                                <div class="fa fa-home"></div>
                                Kembali ke Menu Utama
                            </a>
                            <a class="nav-link" href="dkprod.php">
                                <div class="fa fa-industry"></div>
                                Produk Dua Kelinci
                            </a>
                            <a class="nav-link" href="prt.php">
                                <div class="fa fa-industry"></div>
                                Peralatan Rumah Tangga
                            </a>
                            <a class="nav-link" href="skl.php">
                                <div class="fa fa-industry"></div>
                                Peralatan Sekolah
                            </a>
                            <a class="nav-link" href="produk.php">
                                <div class="fa fa-industry"></div>
                                Lihat Semua Produk
                            </a>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">List Produk Koperasi</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Lihat Data</li>
                        </ol>
                        <div class="card mb-4">
                            <a type="button" class="btn btn-primary" href="form.input.php">Tambah Data</a>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Stok Barang Koperasi
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Nama Produk</th>
                                                <th scope="col">Kategori</th>
                                                <th scope="col">Stok</th>
                                                <th scope="col">Update</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php
                                        $q=$db->prepare("select * from produk order by nama_produk desc");
                                        $q->execute();
                                        $no=0;
                                        while($r=$q->fetch()){ $no++;
                                        ?>
                                        <tr>
                                            <td scope="row"><?php echo $no;?></td>
                                            <td><?php echo $r["nama_produk"];?></td>
                                            <td><?php echo $r["kategori"];?></td>
                                            <td class="tab-col"><?php echo $r["stok"];?></td>
                                            <td class="tab-col">
                                                <a class="btn btn-danger float-right btn-sm" href="form.action.php?action=hapus&id=<?php echo $r["nama_produk"]; ?>" role="button" onclick="return confirm('Are you sure want to delete this?');">Hapus</a>
                                                <a class="btn btn-success float-right btn-sm" href="form.edit.php?action=ubah&id=<?php echo $r["nama_produk"]; ?>" role="button">Edit</a>
                                            </td>
                                            </tr>
                                        <?php } ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
</html>
