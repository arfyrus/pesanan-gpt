<?php
include("sambungan.php");
include("pekerja_menu.php");

if (isset($_POST['submit'])) {
    $id_makanan = $_POST['id_makanan'];
    $nama_makanan = $_POST['nama_makanan'];
    $harga = $_POST['harga'];
    $id_pekerja = $_POST['id_pekerja'];

    $namafail = $id_makanan.".png";
    $sementara = $_FILES['namafail']['tmp_name'];
    move_uploaded_file($sementara, "imej/".basename($namafail));

    $sql = "INSERT INTO makanan values ('$id_makanan', '$nama_makanan', '$namafail', '$harga', '$id_pekerja')";
    $result = mysqli_query($sambungan, $sql);
    if ($result == true)
        echo "<h4>Rekod berjaya disimpan</h4>";
    else
        echo "<h4>Ralat: $sql<br>".mysqli_error($sambungan)."</h4>";}
?>

<link rel="stylesheet" href="aborang.css">
<link rel="stylesheet" href="abutton.css">

<h3 class="panjang">BORANG TAMBAH MAKANAN</h3>
<form class="panjang" action="makanan_insert.php" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>ID Makanan</td>
            <td><input required type="text" name="id_makanan"></td>
        </tr>
        <tr>
            <td>Nama Makanan</td>
            <td><input type="text" name="nama_makanan"></td>
        </tr>
        <tr>
            <td>Gambar 350x320</td>
            <td><input type="file" name="namafail" accept=".png,.jpg"></td>
        </tr>
        <tr>
            <td>Harga</td>
            <td><input type="text" name="harga"></td>
        </tr>
        <tr>
            <td>pekerja</td>
            <td>
                <select name="id_pelanggan">
                <?php
                    $sql = "SELECT * FROM pekerja";
                    $data = mysqli_query($sambungan, $sql);
                    while ($pekerja = mysqli_fetch_array($result)) {
                        echo "<option value='$pekerja[id_pelanggan]'>$pekerja[nama_pekerja]</option>";
                    }
                ?>
                </select>
            </td>
        </tr>
    </table>
    <button class="tambah" type="submit" name="submit">Tambah</button>
</form>
