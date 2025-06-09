<?php
    include("sambungan.php");
    include("pekerja_menu.php");

	$no_telefon = $_POST["no_telefon"];

	$sql = "select * from pelanggan where no_telefon = '$no_telefon'";

	$result = mysqli_query($sambungan, $sql);
	while($pelanggan = mysqli_fetch_array($result)) {
            $nama_pelanggan = $pelanggan["nama_pelanggan"];
            $password = $pelanggan["password"];
	}
?>

<link rel="stylesheet" href="asenarai.css">
<link rel="stylesheet" href="abutton.css">

<main>
    <table class="maklumat">
        <caption>MAKLUMAT PELANGGAN</caption>
        <tr>
            <th>Perkara</th>
            <th>Maklumat</th>
        </tr>
        <tr>
            <td class="maklumat">ID pelanggan</td>
            <td class="maklumat"><?php echo $no_telefon; ?></td>
        </tr>
        <tr>
            <td class="maklumat">Nama</td>
            <td class="maklumat"><?php echo $nama_pelanggan; ?></td>
        </tr>
        <tr>
            <td class="maklumat">Password</td>
            <td class="maklumat"><?php echo $password; ?></td>
        </tr>
    </table>
</main>
