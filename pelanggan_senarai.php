<?php
    include("sambungan.php");
	include("pekerja_menu.php");
?>

<link rel="stylesheet" href="asenarai.css">
<table class="pelanggan">
    <caption>SENARAI NAMA PELANGGAN</caption>
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Password</th>
        <th colspan="2">Tindakan</th>
    </tr>

    <?php
        $sql = "select * from pelanggan";
        $result = mysqli_query($sambungan, $sql);
        while($pelanggan = mysqli_fetch_array($result)) {
        $no_telefon = $pelanggan["no_telefon"];
        echo "<tr>  <td>$pelanggan[no_telefon]</td>
                    <td class='nama'>$pelanggan[nama_pelanggan]</td>
                    <td>$pelanggan[password]</td>
                    <td>
                        <a href='pelanggan_update.php?no_telefon=$no_telefon'>
                            <img src='imej/update.png'>
                        </a>
                    </td>
                    <td>
                        <a href='javascript:padam(\"$no_telefon\");'>
                            <img src='imej/delete.png'>
                        </a>
                    </td>
               </tr>";
        }
    ?>
</table>

<script>
    function padam(id)    {
        if (confirm("Adakah anda ingin padam") == true) {
            window.location="pelanggan_delete.php?no_telefon=" + id;
        }
    }
</script>
