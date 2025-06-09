<?php
include("sambungan.php");

$id_makanan = $_GET['id_makanan'];

$sql = "DELETE FROM makanan WHERE id_makanan='$id_makanan'";
$result = mysqli_query($sambungan, $sql);

echo "<script>window.location='makanan_senarai.php'</script>";
?>
