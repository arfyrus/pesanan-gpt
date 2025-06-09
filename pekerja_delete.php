<?php
include("sambungan.php");
include("pekerja_menu.php");

$idjururjual = $_GET["id_pelanggan"];

$sql = "DELETE FROM pekerja WHERE id_pelanggan = $id_pelanggan";
$result = mysqli_query($sambungan, $sql);

echo "<script>window.location='pekerja_senarai.php'</script>";
?>
