<?php
session_start();
    include 'koneksi.php';
    $identitas = mysqli_query($conn, "SELECT * FROM pengaturan ORDER BY id DESC LIMIT 1");
    $d = mysqli_fetch_object($identitas);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Halaman Login</title>
        <link rel="icon" href="uploads/identitas/<?= $d->favicon ?>">
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>

    <body>
        <!--login page-->
        <div class="login-page">
            <div class="box box-login">
                <div class="box-header text-center">
                    Login
                </div>
                <div class="box-body">
                    <?php 
                        if(isset($_GET['msg'])){
                            echo "<div class= 'alert alert-error'>".$_GET['msg']."</div>";
                        }
                    ?> 
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="Username">Username</label>
                            <input type="text" name="user" placeholder="Username" id="" class="input-control">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="pw" placeholder="Password" id="" class="input-control">
                        </div>
                        <input class="button" type="submit" name="submit" value="Login">
                    </form>

                    <?php
                        if(isset($_POST['submit'])){
                            $user = mysqli_real_escape_string($conn, $_POST['user']);
                            $pw = mysqli_real_escape_string($conn, $_POST['pw']);

                            $cek = mysqli_query($conn, "SELECT * FROM pengguna WHERE username = '".$user."'");
                            if(mysqli_num_rows($cek) > 0){
                                $d = mysqli_fetch_object($cek);
                                if(md5($pw) == $d->password){
                                    $_SESSION['status_login'] = true;
                                    $_SESSION['uid'] = $d->id;
                                    $_SESSION['uname'] = $d->nama;
                                    $_SESSION['ulevel'] = $d->level;

                                    echo "<script>window.location = 'admin/index.php'</script>";
                                    
                                }else{
                                    echo '<div class="alert alert-error">Password salah</div>';
                                }
                            }else{
                                echo '<div class="alert alert-error">Username tidak ditemukan</div>';
                            }
                        } 
                    ?>
                </div>
                <div class="box-footer text-center">
                    <a href="index.php"><i class="fa fa-arrow-left"></i> Halaman Utama</a>
                </div>
            </div>
        </div>
    </body>
</html>