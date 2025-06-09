<?php
    include("sambungan.php");
    include("pelanggan_menu.php");

    if (isset($_POST["submit"])) {
        $userid = $_POST["userid"];
        $password = $_POST["password"];

        $jumpa = FALSE;

        if ($jumpa == FALSE) {
            $sql = "SELECT * FROM pelanggan";
            $result = mysqli_query($sambungan, $sql);
            while ($pelanggan = mysqli_fetch_array($result)) {
                if ($pelanggan["no_telefon"] == $userid && $pelanggan["password"] == $password) {
                    $jumpa = TRUE;
                    $_SESSION["idpengguna"] = $pelanggan["no_telefon"];
                    $_SESSION["nama"] = $pelanggan["nama_pelanggan"];
                    $_SESSION["status"] = "pelanggan";
                    break;
                }
            }
        }

        if ($jumpa == FALSE) {
            $sql = "SELECT * FROM pekerja";
            $result = mysqli_query($sambungan, $sql);
            while ($pekerja = mysqli_fetch_array($result)) {
                if ($pekerja["id_pekerja"] == $userid && $pekerja["password"] == $password) {
                    $jumpa = TRUE;
                    $_SESSION["idpengguna"] = $pekerja["id_pekerja"];
                    $_SESSION["nama"] = $pekerja["nama_pekerja"];
                    $_SESSION["status"] = "pekerja";
                    break;
                }
            }
        }

        if ($jumpa == TRUE) {
            if ($_SESSION["status"] == "pelanggan") {
                header("Location: index.php");
            } else if ($_SESSION["status"] == "pekerja") {
                header("Location: pekerja_menu.php");
            }
        echo "<script>alert('ID pengguna atau kata laluan salah!');</script>";
        }
    }
?>

<link rel="stylesheet" href="abutton.css">
<link rel="stylesheet" href="aborang.css">

<h3 class="pendek">LOG IN</h3>
<form class="pendek" action="login.php" method="post">
    <table>
        <tr>
            <td><img src="imej/user.png"></td>
            <td><input type="text" name="userid" placeholder="idpengguna"></td>
        </tr>
        <tr>
            <td><img src="imej/lock.png"></td>
            <td><input type="password" name="password" placeholder="katalaluan"></td>
        </tr>
    </table>
    <button class="login" type="submit" name="submit">Login</button>
    <button class="signup" type="button" onclick="window.location='signup.php'">Sign Up</button>
</form>
