<?php
    include '../koneksi.php';

    if(isset($_GET['idpengguna'])){
        $del = mysqli_query($conn, "DELETE FROM pengguna WHERE id = '".$_GET['idpengguna']."' ");
        echo "<script>window.location = 'pengguna.php'</script>";
    }

    if(isset($_GET['idgaleri'])){

        $galeri = mysqli_query($conn, "SELECT foto FROM galeri WHERE id = '".$_GET['idgaleri']."'");
        if(mysqli_num_rows($galeri) > 0){
            $i = mysqli_fetch_object($galeri);

            if(file_exists("../uploads/galeri/".$i->foto)){
                unlink("../uploads/galeri/".$i->foto);
            }
        }

        $del = mysqli_query($conn, "DELETE FROM galeri WHERE id = '".$_GET['idgaleri']."' ");
        echo "<script>window.location = 'galeri.php'</script>";
    }

    if(isset($_GET['idinformasi'])){

        $informasi = mysqli_query($conn, "SELECT gambar FROM informasi WHERE id = '".$_GET['idinformasi']."'");
        if(mysqli_num_rows($informasi) > 0){
            $i = mysqli_fetch_object($informasi);

            if(file_exists("../uploads/informasi/".$i->gambar)){
                unlink("../uploads/informasi/".$i->gambar);
            }
        }

        $del = mysqli_query($conn, "DELETE FROM informasi WHERE id = '".$_GET['idinformasi']."' ");
        echo "<script>window.location = 'informasi.php'</script>";
    }
?>