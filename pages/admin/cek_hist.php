<?php
    session_start();

    // Periksa apakah pengguna telah login dengan memeriksa status session
    if (!isset($_SESSION['sesi']) || $_SESSION['sesi'] !== true) {
        // Jika pengguna tidak login, alihkan ke halaman login
        echo "<script>alert('Silahkan login dahulu!');</script>";
        header("Location: index.php?p=beranda");
        exit();
    }
?>