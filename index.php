<?php include 'header.php' ?>

    <!--banner-->
    <div class="banner" style="background-image: url('uploads/identitas/<?= $d->foto_sekolah ?>')">
        <div class="banner-text">
            <div class="container">
                <h3>Selamat datang di <?= $d->nama?></h3>
                <p>Sekolah</p>
            </div>
        </div>
    </div>

    <!--sambutan-->
    <div class="section">
        <div class="container text-center">
            <h3>Sambutan Kepala Sekolah</h3>
            <img class="kepsek-img" src="uploads/identitas/<?= $d->foto_kepsek?>" width="200px" alt="">
            <h4><?= $d->nama_kepsek?></h4>
            <p><?= $d->sambutan_kepsek?></p>
        </div>
    </div>
    
    <!--informasi-->
    <div class="section" id="informasi">
        <div class="container text-center">
            <h3>Informasi Terbaru</h3>
            <?php
                $informasi = mysqli_query($conn, "SELECT * FROM informasi ORDER bY id DESC LIMIT 8");
                if(mysqli_num_rows($informasi) > 0){
                    while($j = mysqli_fetch_array($informasi)){
            ?>
                <div class="col-4">
                    <a href="detail-informasi.php?id=<?= $j['id'] ?>" class="thumbnail-link">
                        <div class="thumbnail-box">
                            <div class="thumbnail-img" style="background-image: url('uploads/informasi/<?= $j['gambar'] ?> ');"></div>
                            <div class="thumbnail-text"><?= substr($j['judul'], 0, 50) ?></div>
                        </div>
                    </a>
                </div>
            <?php }}else{?>
                Tidak ada data.
            <?php } ?>
        </div>
    </div>

    <?php include 'footer.php' ?>
