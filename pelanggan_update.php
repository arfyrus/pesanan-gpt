<?php
    include("sambungan.php");
    include("pekerja_menu.php");

	if (isset($_POST["submit"])) {
        $no_telefon = $_POST["no_telefon"];
		$password = $_POST["password"];
		$nama_pelanggan = $_POST["nama_pelanggan"];

		$sql = "update pelanggan 
                set password = '$password', nama_pelanggan = '$nama_pelanggan' 
                where no_telefon = '$no_telefon'";
		$result = mysqli_query($sambungan, $sql);
		if ($result == true)
			echo "<h4>Berjaya kemaskini</h4>";
		else
			echo "<h4>Ralat : $sql<br>".mysqli_error($sambungan)."</h4>";
	}

    if (isset($_GET["no_telefon"]))
		$no_telefon = $_GET["no_telefon"];

	$sql = "select * from pelanggan where no_telefon = '$no_telefon' ";
	$result = mysqli_query($sambungan, $sql);
	while($pelanggan = mysqli_fetch_array($result)) {
		$nama_pelanggan = $pelanggan["nama_pelanggan"];
		$password = $pelanggan["password"];
	}
?>

<link rel="stylesheet" href="aborang.css">
<link rel="stylesheet" href="abutton.css">

<h3 class="panjang">KEMASKINI PELANGGAN</h3>
<form class="panjang" action="pelanggan_update.php" method="post">
    <table>
        <tr>
            <td>ID Pelanggan</td>
            <td><input type="text" name="no_telefon" value="<?php echo $no_telefon; ?>"></td>
        </tr>
        <tr>
            <td>Nama Pelanggan</td>
            <td><input type="text" name="nama_pelanggan" value="<?php echo $nama_pelanggan; ?>"></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="text" name="password" value="<?php echo $password; ?>"></td>
        </tr>
    </table>
    <button class="update" type="submit" name="submit">Update</button>
</form>
