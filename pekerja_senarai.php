<?php
    include("sambungan.php");
    include("pekerja_menu.php");
?>

<link rel="stylesheet" href="asenarai.css">
<table class="pekerja">
    <caption>SENARAI NAMA JURUJUAL</caption>
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Pasword</th>
        <th colspan="2">Tindakan</th>
    </tr>

<?php
$sql = "SELECT * FROM pekerja";
$result = mysqli_query($sambungan, $sql);
while ($pekerja = mysqli_fetch_array($result)) {
    $id_pelanggan = $pekerja['id_pelanggan'];
    echo "<tr> <td>$pekerja[id_pelanggan]</td>
    <td class='nama'>$pekerja[nama_pekerja]</td>
    <td>$pekerja[password]</td>
    <td>
    <a href='pekerja_update.php?id_pelanggan=$id_pelanggan'>
    <img src='imej/update.png'>
    </a>
    </td>
    <td>
    <a href='javascript:padam(\"$id_pelanggan\")'>
    <img src='imej/delete.png'>
    </a>
    </td>
    </tr>";
}
?>
</table>

<script>
    function padam(id) {
        if (confirm("Adakah anda ingin padam") == true) {
            window.location = "pekerja_delete.php?id_pelanggan=" + id;
        }
    }
</script>
