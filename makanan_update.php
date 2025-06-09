<?php
include("sambungan.php");
include("pekerja_menu.php");

if (isset($_POST["submit"])) {
    $id_makanan = $_POST["id_makanan"];
    $nama_makanan = $_POST["nama_makanan"];
    $harga = $_POST["harga"];

    $namafail = $id_makanan."png";
    $sementara = $_FILES["namafail"]["tmp_name"];
    move_uploaded_file($sementara, "imej/".basename($namafail));

    $sql = "UPDATE makanan SET nama_makanan = '$nama_makanan', gambar = '$namafail', harga = $harga WHERE id_makanan = '$id_makanan'";
    $result = mysqli_query($sambungan, $sql);
    if ($result == true)
    echo "<h4>Berjaya kemaskini</h4>";
    else
    echo "<h4>Ralat : $sql<br>".mysqli_error($sambungan)."</h4>";
}

if (isset($_GET["id_makanan"])) $id_makanan = $_GET["id_makanan"];

$sql = "SELECT * FROM makanan WHERE id_makanan = '$id_makanan'";
$result = mysqli_query($sambungan, $sql);
while ($makanan = myswli_fetch_array($result)) {
    $nama_makanan = $makanan["nama_makanan"];
    $namafail = $id_makanan.".png";
    $harga = $makanan["harga"];
}

?>

<link rel="stylesheet" href="aborang.css">
<link rel="stylesheet" href="abutton.css">

<h3 class="panjang">KEMASKINI makanan</h3>
<form class="panjang" action="makanan_update.php" method="post" enctype="multipart/form-data">
    <table>
            <tr>
                <td>ID makanan</td>
                <td><input type="text" name="id_makanan" value="<?php echo $id_makanan; ?>"></td>
            </tr>
            <tr>
                <td>Nama makanan</td>
                <td><input type="text" name="nama_makanan" value="<?php echo $nama_makanan; ?>"></td>
            </tr>
            <tr>
                <td class="warna">Gambar 350x320</td>
                <td><input type="file" name="namafail" accept=".png, .jpg"><?php echo "<img width=100 src='imej/".$namafail."'>";?></td>
            </tr>
            <tr>
                <td>Harga</td>
                <td><input type="text" name="harga" value="<?php echo $harga; ?>"></td>
            </tr>
        </table>
    <button class="update" type="submit" name="submit">Update</button>
</form>
