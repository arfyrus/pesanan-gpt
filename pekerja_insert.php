<?php
include("sambungan.php");
include("pekerja_menu.php");

if (isset($_POST["submit"])) {
    $id_pelanggan = $_POST["id_pelanggan"];
    $password = $_POST["password"];
    $nama_pekerja = $_POST["nama_pekerja"];

    $sql = "INSERT INTO pekerja VALUES ('$id_pelanggan', '$password', '$nama_pekerja')";
    $result = mysqli_query($sambungan, $sql);
    if ($result == true)
        echo "<h4>Berjaya tambah</h4>";
    else 
        echo "<h4>Ralat: $sql<br>" . mysqli_error($sambungan) . "</h4>";
    }
?>

<link rel="stylesheet" href="aborang.css">
<link rel="stylesheet" href="abutton.css">

<h3 class="panjang">BORANG TAMBAH JURUJUAL</h3>
<form class="panjang" action="pekerja_insert.php" method="post">
    <table>
        <tr>
            <td>ID Jurujual</td>
            <td><input required type="text" name="id_pelanggan"></td>
        </tr>
        <tr>
            <td>Nama Jurujual</td>
            <td><input type="text" name="nama_pekerja"></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="text" name="password" placeholder="max: 8 char"></td>
        </tr>
    </table>
    <button class="tambah" type="submit" name="submit">Tambah</button>
</form>
