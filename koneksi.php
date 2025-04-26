<?php
    // Define constants for database credentials
    define('DB_HOST', 'localhost');
    define('DB_USER', 'r0y3nc');
    define('DB_PASS', 'p@sSr0y3ncW0rd');
    define('DB_NAME', 'sekolah');

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); // Enable error reporting for debugging

    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if (!$conn) {
        die('Gagal terhubung ke database: ' . mysqli_connect_error());
    }

    // Automatically close the connection when the script ends
    register_shutdown_function(function() use ($conn) {
        if ($conn) {
            mysqli_close($conn);
        }
    });
?>
