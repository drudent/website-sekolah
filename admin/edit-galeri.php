<?php include 'header.php' ?>
<?php
    $galeri = mysqli_query($conn, "SELECT * FROM galeri WHERE id = '".$_GET['id']."'");
    if(mysqli_num_rows($galeri) == 0){
        echo "<script>window.location='galeri.php'</script>";
    }
    $p = mysqli_fetch_object($galeri);
?>

        <!-- content -->
        <div class="content">
            <div class="container">
                <div class="box">
                    <div class="box-header">
                        Edit Galeri
                    </div>
                    <div class="box-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="">Keterangan</label>
                                <input type="text" name="keterangan" placeholder="Keterangan" value="<?= $p->keterangan ?>" class="input-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">Gambar</label>
                                <img src="../uploads/galeri/<?= $p->foto ?>" width="200px" class="image" alt="">
                                <input type="hidden" name="gambar2" value="<?= $p->foto ?>">
                                <input type="file" name="gambar" class="input-control">
                            </div>
                            
                            <button type="button" class="button" onclick="window.location = 'galeri.php'">Kembali</button>
                            <input type="submit" name="submit" value="Simpan" class="button button-green">

                        </form>


                        <?php
                            if(isset($_POST['submit'])){
                                $ket = addslashes(ucwords($_POST['keterangan']));
                                $currdate = date('Y-m-d H:i:s');
                                
                                if($_FILES['gambar']['name'] != ''){
                                    //echo 'user ganti gambar';

                                    $filename = $_FILES['gambar']['name'];
                                    $tmpname = $_FILES['gambar']['tmp_name'];
                                    $filesize = $_FILES['gambar']['size'];
                                    
                                    $formatfile = pathinfo($filename, PATHINFO_EXTENSION);
                                    $rename ='galeri'.time().'.'.$formatfile;

                                    $allowedtype = array('png', 'jpg', 'jpeg', 'gif');

                                    if(!in_array($formatfile, $allowedtype)){
                                        echo '<div class="alert alert-error">Format gambar harus sesuai.</div>';
                                        return false;
                                    }elseif($filesize > 1000000){
                                        echo '<div class="alert alert-error">Ukuran file tidak boleh lebih dari 1 MB.</div>';
                                        return false;
                                    }else{
                                        if(file_exists("../uploads/galeri/".$_POST['gambar2'])){
                                            unlink("../uploads/galeri/".$_POST['gambar2']);
                                        }

                                        move_uploaded_file($tmpname, "../uploads/galeri/".$rename);
                                    }
                                }else{
                                    //echo 'User tidak ganti gambar';
                                    $rename = $_POST['gambar2'];
                                }

                                $update = mysqli_query($conn, "UPDATE galeri SET
                                    keterangan = '".$ket."',
                                    foto = '".$rename."',
                                    updated_at = '".$currdate."'
                                    WHERE id = '".$_GET['id']."'
                                ");
                                if($update){
                                    echo "<script>window.location='galeri.php?success=Edit Data Berhasil'</script>";
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