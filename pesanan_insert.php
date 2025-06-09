<?php
    include("sambungan.php");

    $no_telefon = $_POST["no_telefon"];
    $id_makanan = $_POST["id_makanan"];
    $bilangan = $_POST["bilangan"];

    date_default_timezone_set("Asia/Kuala_Lumpur");
    $today = date('Y-m-d');

    $sql = "insert into pesanan values('$no_telefon', '$id_makanan', '$today', $bilangan)";
    $result = mysqli_query($sambungan, $sql);
    if ($result == true)
        echo "<script>alert('Makanan berjaya ditempah')</script>";
    else
        echo "<script>alert('Makanan sudah ditempah...Klik pesanan')</script>";

    echo "<script>window.location='index.php'</script>";
?>
