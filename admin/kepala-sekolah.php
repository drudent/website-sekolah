<?php include 'header.php' ?>


        <!-- content -->
        <div class="content">
            <div class="container">
                <div class="box">
                    <div class="box-header">
                        Kepala Sekolah
                    </div>
                    <div class="box-body">
                            <?php
                            if(isset($_GET['success'])){
                                echo "<div class='alert alert-success'>".$_GET['success']."</div>";
                            }
                        ?>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" name="nama" placeholder="Nama Kepala Sekolah" value="<?= $d->nama_kepsek ?>" class="input-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">Sambutan</label>
                                <textarea type="text" name="sambutan" placeholder="Sambutan Kepala Sekolah" class="input-control" id="keterangan"><?= $d->sambutan_kepsek ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Foto</label>
                                <img src="../uploads/identitas/<?= $d->foto_kepsek ?>" width="200px" class="image" alt="">
                                <input type="hidden" name="foto_lama" value="<?= $d->foto_kepsek ?>">
                                <input type="file" name="foto_baru" class="input-control">
                            </div>

                            <input type="submit" name="submit" value="Simpan Perubahan" class="button button-green">

                        </form>


                        <?php
                            if(isset($_POST['submit'])){
                                $nama = addslashes(ucwords($_POST['nama']));
                                $sambutan = addslashes($_POST['sambutan']);
                                $currdate = date('Y-m-d H:i:s');
                                
                                //validasi dan simpan foto 
                                if($_FILES['foto_baru']['name'] != ''){

                                    $filename = $_FILES['foto_baru']['name'];
                                    $tmpname = $_FILES['foto_baru']['tmp_name'];
                                    $filesize = $_FILES['foto_baru']['size'];
                                    
                                    $formatfile = pathinfo($filename, PATHINFO_EXTENSION);
                                    $rename ='kepsek'.time().'.'.$formatfile;

                                    $allowedtype = array('png', 'jpg', 'jpeg', 'gif');

                                    if(!in_array($formatfile, $allowedtype)){
                                        echo '<div class="alert alert-error">Format file foto kepala sekolah harus sesuai.</div>';
                                        return false;
                                    }elseif($filesize > 1000000){
                                        echo '<div class="alert alert-error">Ukuran file tidak boleh lebih dari 1 MB.</div>';
                                        return false;
                                    }else{
                                        if(file_exists("../uploads/identitas/".$_POST['foto_lama'])){
                                            unlink("../uploads/identitas/".$_POST['foto_lama']);
                                        }

                                        move_uploaded_file($tmpname, "../uploads/identitas/".$rename);
                                    }
                                }else{
                                    //echo 'User tidak ganti foto';
                                    $rename = $_POST['foto_lama'];
                                }

                                $update = mysqli_query($conn, "UPDATE pengaturan SET
                                    nama_kepsek = '".$nama."',
                                    sambutan_kepsek = '".$sambutan."',
                                    foto_kepsek = '".$rename."',
                                    updated_at = '".$currdate."'
                                    WHERE id = '".$d->id."'
                                ");
                                if($update){
                                    echo "<script>window.location='kepala-sekolah.php?success=Edit Data Berhasil'</script>";
                                }else{
                                    echo 'Gagal diedit.'.mysqli_error($conn);
                                }
                            }
                        ?>
                        
                    </div>
                </div>
            </div>
        </div>

<?php include 'footer.php' ?> 