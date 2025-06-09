<?php
    include("sambungan.php");

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
?>

<link rel="stylesheet" href="amenu.css">

<header>
    <img class="logo" src="imej/logo.png">
    <img class="kelab" src="imej/namakedai.png">
</header>

<nav>
    <ul>
        <li>
            <a href="index.php"><b>MENU</b></a>
        </li>
    </ul>
    <ul>
        <li>
           <?php
               if (isset($_SESSION["idpengguna"])) 
                   echo "<a href='pesanan_senarai.php'><b>TEMPAHAN</b></a>";
               else     
                   echo "<a href='javascript:papar();'><b>TEMPAHAN</b></a>";
            ?> 
        </li>

    </ul>
    <ul>
        <li>
           <?php
               if (isset($_SESSION["idpengguna"])) 
                   echo "<a href='logout.php'><b>LOGOUT</b></a>";
               else     
                   echo "<a href='login.php'><b>LOGIN</b></a>";
            ?>   
        </li>
    </ul>

    <?php
       if (isset($_SESSION["idpengguna"])) {
          $no_telefon = $_SESSION["idpengguna"]; 
          $sql = "select * from pelanggan where no_telefon = '$no_telefon' "; 
          $result = mysqli_query($sambungan, $sql);
          $pelanggan = mysqli_fetch_array($result);   
          # echo "Selamat datang $pelanggan[nama_pelanggan]";
       } 
    ?> 
</nav>

<script>
    function papar() {
        alert("Sila login untuk melihat pesanan");
    }
</script>
