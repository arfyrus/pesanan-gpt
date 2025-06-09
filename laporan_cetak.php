<?php
    include("sambungan.php");
	include("pekerja_menu.php");
?>

<link rel="stylesheet" href="asenarai.css">
<link rel="stylesheet" href="abutton.css">

<main>
    <div id="printarea">
    <?php
       if (isset($_POST['submit'])) {           
            $no_telefon = $_POST['no_telefon'];
            $tarikh = $_POST['tarikh'];
            $pilih = $_POST['pilih'];
           
            $sql = "select * from pelanggan where no_telefon = '$no_telefon' "; 
            $result = mysqli_query($sambungan, $sql);
            $pelanggan = mysqli_fetch_array($result);
            $nama_pelanggan = $pelanggan['nama_pelanggan'];
        
            if ($pilih == 1) {
                echo "<table>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Bilangan</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                        </tr>";
                
                $bayaran = 0;
                
                $sql = "select * from pesanan 
                join makanan on pesanan.id_makanan = makanan.id_makanan
                where pesanan.no_telefon = '$no_telefon' and pesanan.tarikh = '$tarikh' ";

                $result = mysqli_query($sambungan, $sql);
                while($pesanan = mysqli_fetch_array($result)) {  
                     $jumlah = $pesanan['bilangan'] * $pesanan['harga'];
                     $jumlah_format = number_format($jumlah, 2);    
                     echo "<tr> <td>$pesanan[id_makanan]</td>
                                <td>$pesanan[nama_makanan]</td>
                                <td>$pesanan[bilangan]</td>
                                <td>RM $pesanan[harga]</td>
                                <td>RM $jumlah_format</td>
                           </tr>";
                     $bayaran = $bayaran + $jumlah;
                }
                $bayaran_format = number_format($bayaran, 2);
                
                echo "<br><td colspan = 3><td>Jumlah Bayaran</td><td>RM $bayaran_format</td></tr>";
                echo "<caption><img class=logo src='imej/logo.png'><br><img src='imej/namakedai.png' width=400><br>
                          Nama : $nama_pelanggan Tarikh : $tarikh</caption>
                      </table>"; 
            }
           
            if ($pilih == 2) {             
                echo "<table>
                        <tr>
                            <th>Tarikh</th>
                            <th>ID</th>
                            <th>Makanan</th>
                            <th>Bilangan</th>
                        </tr>";
                            
                $sql = "select * from pesanan 
                join makanan on pesanan.id_makanan = makanan.id_makanan
                where pesanan.no_telefon = '$no_telefon' order by tarikh asc";

                $result = mysqli_query($sambungan, $sql);
                while($pesanan = mysqli_fetch_array($result)) {
                     echo "<tr> <td>$pesanan[tarikh]</td>
                                <td>$pesanan[id_makanan]</td>
                                <td>$pesanan[nama_makanan]</td>
                                <td>$pesanan[bilangan]</td>
                           </tr>";
                }
                echo "<caption>SENARAI TEMPAHAN<br><br>
                         Nama : $nama_pelanggan</caption>
                      </table>"; 
            }
       }
    ?>
    </div>
    <center><button class="cetak" onclick="printPageArea()">Cetak</button></center>
</main>

<script>
    function printPageArea(){
        var printContent = document.getElementById("printarea").innerHTML;
        var originalContent = document.body.innerHTML;
        document.body.innerHTML = printContent;
        window.print();
        document.body.innerHTML = originalContent;
    }
</script>
