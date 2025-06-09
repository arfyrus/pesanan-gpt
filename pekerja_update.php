<?php
include("sambungan.php");
include("pekerja_menu.php");

if (isset($_POST['submit'])) {
    $id_pelanggan = $_POST['id_pelanggan'];
    $nama_pekerja = $_POST['nama_pekerja'];
    $password = $_POST['password'];

    $sql = "UPDATE pekerja SET nama_pekerja='$nama_pekerja', password='$password' WHERE id_pelanggan='$id_pelanggan'";
    $result = mysqli_query($sambungan, $sql);
    if ($result == true)
        echo "<h4>Berjaya kemaskini</h4>";
    else
        echo "<h4>Ralat: $sql<br>" . mysqli_error($sambungan) . "</h4>";
}

if (isset($_GET['id_pelanggan']))
    $id_pelanggan = $_GET['id_pelanggan'];

$sql = "SELECT * FROM pekerja WHERE id_pelanggan='$id_pelanggan'";
$result = mysqli_query($sambungan, $sql);

while ($pekerja = mysqli_fetch_array($result)) {
    $password = $pekerja['password'];
    $nama_pekerja = $pekerja['nama_pekerja'];
}
?>

<link rel="stylesheet" href="aborang.css">
<link rel="stylesheet" href="abutton.css">

<h3 class="panjang">KEMASKINI JURUJUAL</h3>
<form class="panjang" action="pekerja_update.php" method="post">
    <table>
        <tr>
            <td>ID Jurujual</td>
            <td><input type="text" name="id_pelanggan" value="<?php echo $id_pelanggan; ?>"></td>
        </tr>
        <tr>
            <td>Nama Jurujual</td>
            <td><input type="text" name="nama_pekerja" value="<?php echo $nama_pekerja; ?>"></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="text" name="password" value="<?php echo $password; ?>"></td>
        </tr>
    </table>
    <button class="update" type="submit" name="submit">Update</button>
</form>

