<?php include 'header.php' ?>

<div class="section">
    <div class="container">

    <?php
        $informasi = mysqli_query($conn, "SELECT * FROM informasi LEFT JOIN pengguna ON pengguna.id = informasi.created_by WHERE informasi.id = '".$_GET['id']."'");
        if(mysqli_num_rows($informasi) == 0){
            echo "<script>window.location='index.php'</script>";
        }
        $p = mysqli_fetch_object($informasi);
    ?>
        <h3 class="text-center"><?= $p->judul ?></h3>
        <small>Dibuat oleh <?= $p->nama ?>, pada <?= date('d/m/Y', strtotime($p->created_at)) ?></small>
        <div class="text-center" style="margin-top: 10px;">
            <img src="uploads/informasi/<?= $p->gambar ?>" width="75%" class="image" style="height: 400px;">
        </div>
        <?= $p->keterangan ?>
    </div>
</div>

<?php include 'footer.php' ?>