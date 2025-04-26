<?php
    session_start();
    include '../koneksi.php';
    if(!isset($_SESSION['status_login'])){
        echo "<script>window.location = '../login.php?msg=Harap login terlebih dahulu.'</script>";
    }
    date_default_timezone_set("Asia/Jakarta");

    $identitas = mysqli_query($conn, "SELECT * FROM pengaturan ORDER BY id DESC LIMIT 1");
    $d = mysqli_fetch_object($identitas);
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="icon" href="../uploads/identitas/<?= $d->favicon ?>">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Panel Admin - <?= $d->nama ?></title>
        <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script>
            tinymce.init({
                selector: '#keterangan'
            });
        </script>
    </head>

    <body class="bg-light">

        <!--menu mobile-->
        <div class="box-menu-mobile" id="mobileMenuAdmin">
            <span onclick="hideMobileMenu()">Tutup</span>
            <ul class="text-center">
                <li><a href="index.php">Dasboard</a></li>
                <?php if($_SESSION['ulevel'] == 'Super Admin'){ ?>
                    <li><a href="pengguna.php">Pengguna</a></li>
                <?php } elseif($_SESSION['ulevel'] == 'Admin'){ ?>
                    <li><a href="galeri.php">Galeri</a></li>
                    <li><a href="informasi.php">Informasi</a></li>
                    <li><a href="identitas-sekolah.php">Identitas Sekolah</a></li>
                    <li><a href="tentang-sekolah.php">Tentang Sekolah</a></li>
                    <li><a href="kepala-sekolah.php">Kepala Sekolah</a></li>
                <?php } ?>
                    <li><a href="ubah-password.php">Ubah Password</a></li>
                    <li><a href="logout.php">Keluar</a></li>
            </ul>
        </div>
        <!-- navbar -->
        <div class="navbar">
            <div class="container">

                <!--navbar brand--> 
                <h2 class="nav-brand float-left"><a href="index.php"><?= $d->nama ?></a></h2>

                <!-- navbar menu --> 
                 <ul class="nav-menu">
                    <li><a href="index.php">Dasboard</a></li>

                    <?php if($_SESSION['ulevel'] == 'Super Admin'){ ?>
                        <li><a href="pengguna.php">Pengguna</a></li>
                    <?php } elseif($_SESSION['ulevel'] == 'Admin'){ ?>
                        <li><a href="galeri.php">Galeri</a></li>
                        <li><a href="informasi.php">Informasi</a></li>
                        <li>
                            <a href="#">Pengaturan <i class="fa fa-caret-down"></i></a>
                            <!-- sub menu --> 
                            <ul class="dropdown">
                                <li><a href="identitas-sekolah.php">Identitas Sekolah</a></li>
                                <li><a href="tentang-sekolah.php">Tentang Sekolah</a></li>
                                <li><a href="kepala-sekolah.php">Kepala Sekolah</a></li>
                            </ul>
                        </li>
                   <?php } ?>
                    
                    <li>
                        <a href="#"><?= $_SESSION['uname'] ?> (<?= $_SESSION['ulevel'] ?>)<i class="fa fa-caret-down"></i></a>
                        <ul class="dropdown">
                            <li><a href="ubah-password.php">Ubah Password</a></li>
                            <li><a href="logout.php">Keluar</a></li>
                        </ul>
                    </li>
                 </ul>
                 <div class="clearfix"></div>
            </div>
            <div class="mobile-menu-btn text-center mobile-menu-btn-admin">
                <a href="#" onclick="showMobileMenu()">Menu</a>
            </div>
        </div>
