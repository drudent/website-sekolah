<?php include 'header.php' ?>

<div class="section">
    <div class="container">
        <h3 class="text-center">Informasi</h3>
        <?php
            $informasi = mysqli_query($conn, "SELECT * FROM informasi ORDER BY id DESC");
            if(mysqli_num_rows($informasi) > 0){
                while($i = mysqli_fetch_array($informasi)){
        ?>
            <div class="col-4">
                <a href="detail-informasi.php?id=<?= $i['id'] ?>" class="thumbnail-link">
                    <div class="thumbnail-box">
                        <div class="thumbnail-img" style="background-image: url('uploads/informasi/<?= $i['gambar'] ?> ');"></div>
                        <div class="thumbnail-text"><?= substr($i['judul'], 0, 50) ?></div>
                    </div>
                </a>
                </div>
        <?php }}else{?>
            Tidak ada data.
        <?php } ?>
    </div>
</div>

<?php include 'footer.php' ?>