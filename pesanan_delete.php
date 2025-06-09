<?php
    include("sambungan.php");

    $id_makanan = $_GET["id_makanan"];
    $no_telefon = $_GET["no_telefon"];
    $tarikh = $_GET["tarikh"];

    $sql = "delete from pesanan where id_makanan = '$id_makanan' and no_telefon = '$no_telefon' and tarikh = '$tarikh' ";
    $result = mysqli_query($sambungan, $sql);

    echo "<script>window.location='pesanan_senarai.php'</script>";
?>
