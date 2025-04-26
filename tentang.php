<?php include 'header.php' ?>

<div class="section">
    <div class="container">
        <h3 class="text-center">Tentang Sekolah</h3>
        <div class="text-center" style="margin-bottom: 5px;">
            <img src="uploads/identitas/<?= $d->foto_sekolah ?>" width="75%" class="image sekolah-img">
        </div>
        <?= $d->tentang ?>
    </div>
</div>

<?php include 'footer.php' ?>
