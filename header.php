<?php
    include 'koneksi.php';
    date_default_timezone_set("Asia/Jakarta");

    $identitas = mysqli_query($conn, "SELECT * FROM pengaturan ORDER BY id DESC LIMIT 1");
    $d = mysqli_fetch_object($identitas);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="uploads/identitas/<?= $d->favicon ?>">
    <title>Website <?= $d->nama ?></title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <!--menu mobile-->
    <div class="box-menu-mobile" id="mobileMenu">
        <span onclick="hideMobileMenu()">Tutup</span>
        <ul class="text-center">
            <li><a href="index.php">Beranda</a></li>
            <li><a href="tentang.php">Tentang Sekolah</a></li>
            <li><a href="galeri.php">Galeri</a></li>
            <li><a href="informasi.php">Informasi</a></li>
            <li><a href="kontak.php">Kontak</a></li>
        </ul>
    </div>

    <!--header-->
    <div class="header">
        <div class="container">
            <div class="header-logo">
                <img src="uploads/identitas/<?= $d->logo?>" width="70" alt="">
                <h2><a href="#"><?= $d->nama?></a></h2>
            </div>
            <ul class="header-menu">
                <li><a href="index.php">Beranda</a></li>
                <li><a href="tentang.php">Tentang Sekolah</a></li>
                <li><a href="galeri.php">Galeri</a></li>
                <li><a href="informasi.php">Informasi</a></li>
                <li><a href="kontak.php">Kontak</a></li>
            </ul>

            <div class="mobile-menu-btn text-center">
                <a href="#" onclick="showMobileMenu()">Menu</a>
            </div>
        </div>
    </div>
