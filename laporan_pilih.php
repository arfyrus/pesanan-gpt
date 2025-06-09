<?php
    include("sambungan.php");
	include("pekerja_menu.php");
?>

<link rel="stylesheet" href="aborang.css">
<link rel="stylesheet" href="abutton.css">

<main>
<h3 class="pendek">PILIH JENIS LAPORAN</h3>

<form class="pendek" action="laporan_cetak.php" method="post">

    <select id='pilih' name='pilih' onchange='papar_pilihan()'>
        <option value=1>Tempahan Mengikut Tarikh</option>
        <option value=2>Tempahan Mengikut Pelanggan</option>
    </select> <br>

    
    <select name="no_telefon">
        <?php
            include('sambungan.php');
            $sql = "select * from pelanggan";
            $data = mysqli_query($sambungan, $sql);
            while ($pelanggan = mysqli_fetch_array($data)) {
               echo "<option value='$pelanggan[no_telefon]'>$pelanggan[nama_pelanggan]</option>";
            }
        ?>
    </select>
        
     <div id="tarikh" style="display:block">   
        <select name="tarikh">
            <?php
                include('sambungan.php');
                $sql = "select * from pesanan group by tarikh order by tarikh desc";
                $data = mysqli_query($sambungan, $sql);
                while ($pesanan = mysqli_fetch_array($data)) {
                   echo "<option value='$pesanan[tarikh]'>$pesanan[tarikh]</option>";
                }
            ?>
        </select>
    </div>
    
    <button class="papar" name="submit" type="submit">Papar</button>
</form>
</main>

<script>
    function papar_pilihan() {
        var pilih = document.getElementById("pilih").value;
        var papartarikh = 'none';
        
        if (pilih == 1) {
            papartarikh = 'block';
        } 
        else if (pilih == 2) {
            papartarikh = 'none';
        }
        document.getElementById('tarikh').style.display = papartarikh;
    }
</script>
