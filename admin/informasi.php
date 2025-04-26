<?php include 'header.php' ?>

        <!-- content -->
        <div class="content">
            <div class="container">
                <div class="box">
                    <div class="box-header">
                        Informasi
                    </div>
                    <div class="box-body">
                        <a href="tambah-informasi.php" class="text-green"><i class="fa fa-plus"></i> Tambah Informasi</a>
                        
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
                                    <th>Judul</th>
                                    <th>Keterangan</th>
                                    <th>Gambar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 1;

                                    $where = " WHERE 1=1 ";
                                    if(isset($_GET['key'])){
                                        $where .= " AND judul LIKE '%".addslashes($_GET['key'])."%' ";
                                    }

                                    $informasi = mysqli_query($conn, "SELECT * FROM informasi $where ORDER BY id DESC");
                                    if(mysqli_num_rows($informasi) > 0){
                                        while($i = mysqli_fetch_array($informasi)){
                                ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $i['judul'] ?></td>
                                    <td><?= substr($i['keterangan'], 0, 100) ?></td>
                                    <td><img src="../uploads/informasi/<?= $i['gambar'] ?>" width="100px" alt=""></td>
                                    <td>
                                        <a href="edit-informasi.php?id=<?= $i['id'] ?>" title="Edit data" class="text-blue"><i class="fa fa-edit"></i> Edit</a> |
                                        <a href="hapus.php?idinformasi=<?= $i['id'] ?>" onclick="return confirm('Yakin ingin hapus?')" title="Hapus data" class="text-red"><i class="fa fa-times"></i> Hapus</a>
                                    </td>
                                </tr>
                                <?php }}else{ ?>
                                    <tr>
                                        <td colspan="5">Data tidak ada</td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

<?php include 'footer.php' ?>