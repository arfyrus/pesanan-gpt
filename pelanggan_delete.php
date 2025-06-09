<?php
    include("sambungan.php");

    $no_telefon = $_GET["no_telefon"];

    $sql = "delete from pelanggan where no_telefon = '$no_telefon' ";
    $result = mysqli_query($sambungan, $sql);	

    echo "<script>window.location='pelanggan_senarai.php'</script>";
?>
