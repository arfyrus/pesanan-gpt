<?php
    include("sambungan.php");
    include("pelanggan_menu.php");

    echo "<link rel='stylesheet' href='abutton.css'>";
    echo "<main class='menu'>";

    $sql = "SELECT * FROM makanan";
    $result = mysqli_query($sambungan, $sql);

    if (isset($_SESSION["idpengguna"])) {
        $no_telefon = $_SESSION["idpengguna"];
        while ($makanan = mysqli_fetch_array($result)) {
            echo "<figure>
                    <img class='home' src='imej/$makanan[gambar]'>
                    <figcaption>
                        <form method='post' action='pesanan_insert.php'>
                            Bilangan <input type='number' min=1 max=50 value=1 name=bilangan>
                            <input type='hidden' name='no_telefon' value='$no_telefon'>
                            <input type='hidden' name='id_makanan' value='$makanan[id_makanan]'>
                            <button class='tempah' type='submit' name='submit'>Tempah</button>
                        </form>
                    </figcaption>
                </figure>";
        }
    } else
        while ($makanan = mysqli_fetch_array($result)) {
            echo "<figure><img class='home' src='imej/$makanan[gambar]'></figure>";
        }
    echo "</main>";
?>
