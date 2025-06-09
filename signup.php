<?php
    include("sambungan.php");
    include("pelanggan_menu.php");

    if (isset($_POST["submit"])) {
        $no_telefon = $_POST["no_telefon"];
        $password = $_POST["password"];
        $nama_pelanggan = $_POST["nama_pelanggan"];

        $sql = "INSERT INTO pelanggan VALUES ('$no_telefon', '$password', '$nama_pelanggan')";
        echo $sql;
        $result = mysqli_query($sambungan, $sql);
        if ($result)
            echo "<script>alert('Berjaya daftar pelanggan baru')</script>";
        else
            echo "<script>alert('Gagal daftar pelanggan baru')</script>";
        echo "<script>window.location='index.php'</script>";
    }
?>

<link rel="stylesheet" href="aborang.css">
<link rel="stylesheet" href="abutton.css">

<body>
    <h3 class="panjang">SIGN UP</h3>
    <form class="panjang" action="signup.php" method="post">
        <table>
            <tr>
                <td>No. Telefon</td>
                <td><input required type="text" name="no_telefon"
                    placeholder="cth: 0123456789" pattern="[0-9]{10}"
                    oninvalid="this.setCustomValidity('Sila masukkan 10 digit')"
                    oninput="this.setCustomValidity('')"
                    <?php
                        $sql = "SELECT * FROM pelanggan ORDER BY no_telefon DESC LIMIT 1";
                        $result = mysqli_query($sambungan, $sql);
                        $bilrekod = mysqli_num_rows($result);
                        if ($bilrekod > 0) {
                            $pelanggan = mysqli_fetch_array($result);
                            $no_telefon = ++$pelanggan["no_telefon"];
                        }
                        else
                            $no_telefon = "0123456789";
                        echo "value='$no_telefon'";
                    ?>
                >
                </td>
            </tr>
            <tr>
                <td>Nama Pelanggan</td>
                <td><input required type="text" name="nama_pelanggan"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input required type="password" name="password"></td>
            </tr>
        </table>

        <button class="tambah" type="submit" name="submit">Daftar</button>
        <button class="batal" type="button" onclick="window.location='index.php'">Batal</button>
    </form>
</body>
