<?php include 'header.php' ?>

        <!-- content -->
        <div class="content">
            <div class="container">
                <div class="box">
                    <div class="box-header">
                        Galeri
                    </div>
                    <div class="box-body">
                        <a href="tambah-galeri.php" class="text-green"><i class="fa fa-plus"></i> Tambah Galeri</a>
                        
                        <?php
                            if(isset($_GET['success'])){
                                echo "<div class='alert alert-success'>".$_GET['success']."</div>";
                            }
                        ?>
                        <form action="">
                            <div class="input-group">
                                <input type="text" name="key" placeholder="Pencarian">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                        
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Foto</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 1;

                                    $where = " WHERE 1=1 ";
                                    if(isset($_GET['key'])){
                                        $where .= " AND keterangan LIKE '%".addslashes($_GET['key'])."%' ";
                                    }

                                    $galeri = mysqli_query($conn, "SELECT * FROM galeri $where ORDER BY id DESC");
                                    if(mysqli_num_rows($galeri) > 0){
                                        while($i = mysqli_fetch_array($galeri)){
                                ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><img src="../uploads/galeri/<?= $i['foto'] ?>" width="100px" alt=""></td>
                                    <td><?= $i['keterangan'] ?></td>
                                    <td>
                                        <a href="edit-galeri.php?id=<?= $i['id'] ?>" title="Edit data" class="text-blue"><i class="fa fa-edit"></i> Edit</a> |
                                        <a href="hapus.php?idgaleri=<?= $i['id'] ?>" onclick="return confirm('Yakin ingin hapus?')" title="Hapus data" class="text-red"><i class="fa fa-times"></i> Hapus</a>
                                    </td>
                                </tr>
                                <?php }}else{ ?>
                                    <tr>
                                        <td colspan="4">Data tidak ada</td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

<?php include 'footer.php' ?>