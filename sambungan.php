<?php
    $nama_database = "pesanan";

    $sambungan = mysqli_connect("localhost", "root", "", $nama_database);
    if (!$sambungan) {
        die("Sambungan gagal");
    }
?>

<link href="https://fonts.googleapis.com/css2?family=Geist+Mono:wght@100..900&display=swap" rel="stylesheet">
