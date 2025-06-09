<?php
    include("sambungan.php");
    include("pekerja_menu.php");
?>

<link rel="stylesheet" href="aborang.css">
<link rel="stylesheet" href="abutton.css">

<main>
    <h3 class="panjang">CARIAN PELANGGAN</h3>
    <form class="panjang" action="pelanggan_maklumat.php" method="post">
        <table>
            <tr>
                <td>Pelanggan</td>
                <td>
                    <select name="no_telefon">
                    <?php
                        $sql = "select * from pelanggan";
                        $data = mysqli_query($sambungan, $sql);
                        while($pelanggan = mysqli_fetch_array($data)){
                            echo "<option value='$pelanggan[no_telefon]'>
                            $pelanggan[nama_pelanggan]</option>";
                        }
                    ?>
                    </select>
                </td>
            </tr>
        </table>
        <button class="cari" type="submit" name="submit">Cari</button>
    </form>
</main>
